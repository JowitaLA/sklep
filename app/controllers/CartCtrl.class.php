<?php

namespace app\controllers;

use core\App;
use PDOException;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;


class CartCtrl
{
    private $productID;
    private $quantity;
    private $action;
    private $minVaultDelivery;

    private $discount_code;
    private $value;
    private $type;

    private $product = [];
    private $productsInfo = [];

    private $totalValue;
    private $delivery = [];
    private $deliveryAdress = [];
    private $billingAdress = [];
    private $deliveryValue;
    private $selectedDelivery;
    private $payment_method;
    private $paymentMethods = [];
    private $cart = [];




    // Dodanie produktu/produktów do koszyka
    public function action_addToCart()
    {
        $this->productID = ParamUtils::getFromRequest('product_ID');
        $this->quantity = ParamUtils::getFromRequest('quantity');

        if ($this->quantity == "0") $this->generateView();

        if (isset($this->product)) {
            // Pobierz szczegóły produktu z bazy danych
            $this->product = App::getDB()->get("products", "*", ["id_product" => $this->productID]);

            // Sprawdź dostępność produktu
            if ($this->product['amount'] < $this->quantity) {
                App::getMessages()->addMessage(new \core\Message("Nie ma wystarczającej ilości produktów w magazynie.", \core\Message::ERROR));
            }
        } else {
            App::getMessages()->addMessage(new \core\Message("Brak danych o produkcie.", \core\Message::ERROR));
        }

        if (App::getMessages()->isError()) $this->generateView();

        // Dodaj produkt do koszyka w sesji
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if ($_SESSION['cart'][$this->productID] + $this->quantity <= $this->product['amount']) {
            $_SESSION['cart'][$this->productID] += $this->quantity;
        } else {
            App::getMessages()->addMessage(new \core\Message("Przekroczono ilość dostępnych produktów.", \core\Message::ERROR));
        }

        if (App::getMessages()->isError()) $this->generateView();

        App::getMessages()->addMessage(new \core\Message("Produkt został dodany do koszyka.", \core\Message::INFO));
        $this->generateView();
    }

    // Wyświetlenie Koszyka
    public function action_cart()
    {
        $this->minVaultDelivery = App::getDB()->query('SELECT MIN(cost) FROM delivery')->fetchColumn();

        // Sprawdź, czy koszyk istnieje w sesji
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Tablica do przechowywania danych produktów

            // Iteracja po productID w koszyku
            foreach ($_SESSION['cart'] as $productID => $quantity) {
                // Pobierz dane produktu na podstawie productID (może to być zapytanie do bazy danych)
                $product = App::getDB()->get("products", ["id_product", "amount", "url", "name", "price"], ["id_product" => $productID]);

                // Jeśli produkt został znaleziony, dodaj go do tablicy
                if ($product) {
                    $this->productsInfo[$product['id_product']] = [
                        'id' => $product['id_product'],
                        'url' => $product['url'],
                        'name' => $product['name'],
                        'amount' => $product['amount'],
                        'price' => $product['price'],
                        'quantity' => $quantity // Dodajemy ilość z koszyka
                    ];
                }
            }
        }


        $this->generateCartView();
    }

    // Wyświetlenie Płatności
    public function action_payment()
    {
        $this->totalValue = SessionUtils::load('total_value', $keep = true) ?: null;  //Cena Produktów z rabatem
        $this->deliveryValue = SessionUtils::load('delivery_cost', $keep = true) ?: null; //Cena Dostawy

        $this->payment_methods();
        $this->generatePaymentView();
    }

    public function action_finalization()
    {
        // Dla `history_orders`
        $idUser = SessionUtils::load('id_user', $keep = true) ?: null;  // Jeżeli brak id_user, ustaw null
        $totalValue = SessionUtils::load('total_value', $keep = true) ?: null;  // Jeżeli brak total_value, ustaw null
        $deliveryValue = SessionUtils::load('delivery_cost', $keep = true) ?: null;  // Jeżeli brak delivery_cost, ustaw null
        $deliveryMethod = SessionUtils::load('selected_delivery', $keep = true) ?: null;  // Jeżeli brak selected_delivery, ustaw null
        $code = SessionUtils::load('code', $keep = true) ?: null;  // Jeżeli brak code, ustaw null

        // Łączenie wartości, zapewniając że mogą być null
        $totalAmount = ($totalValue ?? 0) + ($deliveryValue ?? 0);  // Użycie wartości domyślnej 0, jeśli brak
        $this->deliveryAdress = SessionUtils::load('delivery_address', $keep = true) ?: null;  // Może być null
        $this->billingAdress = SessionUtils::load('billing_address', $keep = true) ?: null;  // Może być null
        $paymentMethod = SessionUtils::load('payment_method', $keep = true) ?: null;  // Może być null

        // Dla `order_items`
        $this->cart = SessionUtils::load('cart', $keep = true) ?: null;  // Może być null

        // Generowanie tokena
        do {
            $token = random_int(0, 2147483647);  // Losowa liczba w zakresie INT
            $isTokenUnique = !App::getDB()->has("history_orders", ["id_order" => $token]);  // Sprawdzanie unikalności
        } while (!$isTokenUnique);

        // Sprawdzenie czy $code jest tablicą
        if (is_array($code)) {
            $codeId = $code["id"] ?? null;
            $codeName = $code["code"] ?? null;
            $codeValue = $code["value"] ?? null;
            $codeType = $code["type"] ?? null;
        } else {
            $codeId = $codeName = $codeValue = $codeType = null;
        }

        // Dodanie rekordu do `users_codes`
        App::getDB()->insert('users_codes', [
            'id_user' => $idUser,
            'id_code' => $codeId
        ]);

        // Dodanie zamówienia do `history_orders`
        App::getDB()->insert('history_orders', [
            'id_order' => $token,
            'id_user' => $idUser,
            'status' => "oczekujące",
            'total_amount' => $totalAmount,
            'delivery_address' => $this->deliveryAdress ? json_encode($this->deliveryAdress) : null,
            'billing_address' => $this->billingAdress ? json_encode($this->billingAdress) : null,
            'payment_method' => $paymentMethod,
            'payment_status' => "opłacono",
            'delivery_method' => $deliveryMethod,
            'delivery_status' => "oczekujące",
            'code_name' => $codeName,
            'code_value' => $codeValue,
            'code_type' => $codeType
        ]);

        $idOrder = App::getDB()->id(); // lub użyj metody zależnej od Twojej biblioteki
        //Dodanie produktów do `order_items`
        // Sprawdzenie, czy koszyk istnieje i jest tablicą
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            // Iteracja przez produkty w koszyku
            foreach ($_SESSION['cart'] as $productID => $quantity) {
                // Dodanie każdej pozycji z koszyka do tabeli order_items
                $product_cost = App::getdb()->get('products', 'price', ['id_product' => $productID]);

                App::getDB()->insert('order_items', [
                    'id_order' => $idOrder,
                    'id_product' => $productID,
                    'product_cost' => $product_cost,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            App::getMessages()->addMessage(new \core\Message("Koszyk jest pusty.", \core\Message::ERROR));
        }
        //Usunięcie zbędnych sesji
        SessionUtils::remove('total_value');
        SessionUtils::remove('delivery_cost');
        SessionUtils::remove('delivery_address');
        SessionUtils::remove('billing_address');
        SessionUtils::remove('payment_method');
        SessionUtils::remove('selected_delivery');
        SessionUtils::remove('code');
        SessionUtils::remove('cart');

        //Wygenerowanie widoku
        $this->generateFinalizationView();
    }

    public function payment_methods()
    {
        //W przyszłosci -> wywołanie wybranego formularza
        $this->paymentMethods = [
            [
                "name" => "Płatność online",
                "icon" => "online.png",
            ],
            [
                "name" => "Zapłać w lokalnym sklepie",
                "icon" => "pick_up.png",
            ],
        ];
    }

    // Wyświetlenie Dostaw
    public function action_deliveryShow()
    {
        $this->totalValue = SessionUtils::load('total_value', $keep = true) ?: null;  // Jeśli brak 'id_user' w sesji, ustawiamy null
        $idUser = SessionUtils::load('id_user', $keep = true) ?: null;  // Jeśli brak 'id_user' w sesji, ustawiamy null
        $this->delivery = App::getDB()->select('delivery', '*');
        $this->deliveryAdress = App::getDB()->get('addresses', '*', ['id_user' => $idUser, 'address_type' => 'delivery']);
        $this->billingAdress = App::getDB()->get('addresses', '*', ['id_user' => $idUser, 'address_type' => 'billing']);

        $this->generateDeliveryView();
    }

    public function action_submitPayment()
    {
        $this->payment_method = ParamUtils::getFromRequest('paymentMethod') ?: null;

        //Sprawdź czy nadal jest dana ilość produktów, jeżeli nie dodaj wiadomość "Brak jednego z produktów" oraz jeżeli jest to usuń wybraną ilość produktów
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $isOutOfStock = false; // Flaga oznaczająca brak produktów

            foreach ($_SESSION['cart'] as $productID => $quantity) {
                // Pobierz aktualną ilość produktu z bazy danych
                $product = App::getDB()->get('products', ['amount'], [
                    'id_product' => $productID
                ]);

                if (!$product || $product['amount'] < $quantity) {
                    // Jeżeli produkt nie istnieje lub jego ilość jest mniejsza niż wymagana
                    $isOutOfStock = true;
                    App::getMessages()->addMessage(
                        new \core\Message("Brak wystarczającej ilości produktu o ID: $productID", \core\Message::ERROR)
                    );
                    break; // Przerwij pętlę, jeśli brakuje produktu
                }
            }

            if (!$isOutOfStock) {
                // Jeśli wszystkie produkty są dostępne, zmniejsz ich ilość w bazie
                foreach ($_SESSION['cart'] as $productID => $quantity) {
                    App::getDB()->update('products', [
                        'amount[-]' => $quantity // Zmniejsz ilość o wybraną liczbę
                    ], [
                        'id_product' => $productID
                    ]);
                }
            } else {
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('cart');
            }
        }

        SessionUtils::store('payment_method', $this->payment_method);

        App::getRouter()->redirectTo('finalization');
    }

    public function action_submitCart()
    {
        $this->totalValue = ParamUtils::getFromRequest('totalValue') ?: null;

        SessionUtils::store('total_value', $this->totalValue);

        App::getRouter()->redirectTo('deliveryShow');
    }

    public function action_submitDelivery()
    {
        // Pobranie ceny dostawy
        $selected_delivery = ParamUtils::getFromRequest('selectedDeliveryValue') ?? null;
        SessionUtils::store('selected_delivery', $selected_delivery);

        // Pobranie wybranej metody dostawy
        $delivery_cost = ParamUtils::getFromRequest('deliveryCost') ?? null;
        SessionUtils::store('delivery_cost', $delivery_cost);

        echo "<script>console.log('$delivery_cost');</script>";
        // Pobranie danych adresu dostawy
        $delivery_address = [
            'first_name' => ParamUtils::getFromRequest('firstName'),
            'last_name' => ParamUtils::getFromRequest('lastName'),
            'email' => ParamUtils::getFromRequest('email'),
            'phone_number' => ParamUtils::getFromRequest('phone_number'),
            'street' => ParamUtils::getFromRequest('street'),
            'house_number' => ParamUtils::getFromRequest('house_number'),
            'postal_code' => ParamUtils::getFromRequest('postal_code'),
            'city' => ParamUtils::getFromRequest('city'),
            'additional_info' => ParamUtils::getFromRequest('delivery_information') ?? null,
        ];
        SessionUtils::store('delivery_address', $delivery_address);

        // Pobranie danych adresu rozliczeniowego
        $billing_address = [
            'first_name' => ParamUtils::getFromRequest('r_firstName') ?? ParamUtils::getFromRequest('firstName'),
            'last_name' => ParamUtils::getFromRequest('r_lastName') ?? ParamUtils::getFromRequest('lastName'),
            'email' => ParamUtils::getFromRequest('r_email') ?? ParamUtils::getFromRequest('email'),
            'phone_number' => ParamUtils::getFromRequest('r_phone_number') ?? ParamUtils::getFromRequest('phone_number'),
            'street' => ParamUtils::getFromRequest('r_street') ?? ParamUtils::getFromRequest('street'),
            'house_number' => ParamUtils::getFromRequest('r_house_number') ?? ParamUtils::getFromRequest('house_number'),
            'postal_code' => ParamUtils::getFromRequest('r_postal_code') ?? ParamUtils::getFromRequest('postal_code'),
            'city' => ParamUtils::getFromRequest('r_city') ?? ParamUtils::getFromRequest('city'),
        ];
        SessionUtils::store('billing_address', $billing_address);

        // Przekierowanie do strony płatności
        App::getRouter()->redirectTo('payment');
    }

    public function action_changeCart()
    {
        $this->productID = ParamUtils::getFromRequest('product_ID');
        $this->quantity = ParamUtils::getFromRequest('quantity');
        $this->action = ParamUtils::getFromRequest('action');

        if ($_SESSION['cart'][$this->productID] + 1 <= $this->quantity && $this->action == "add") {
            $_SESSION['cart'][$this->productID] += 1;
        }
        if ($_SESSION['cart'][$this->productID] - 1 >= 0 && $this->action == "remove") {
            $_SESSION['cart'][$this->productID] -= 1;
        }

        $this->cartReturn();
    }

    public function action_deleteCart()
    {
        $this->productID = ParamUtils::getFromRequest('product_ID');

        // Sprawdzenie, czy produkt istnieje w koszyku
        if (isset($_SESSION['cart'][$this->productID])) {
            // Usunięcie produktu z koszyka
            unset($_SESSION['cart'][$this->productID]);
        }

        $this->cartReturn();
    }

    public function cartReturn()
    {
        // Przekierowanie
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('cart');
    }

    public function action_applyDiscountCode()
    {
        $this->discount_code = ParamUtils::getFromRequest('discount_code');
        $idUser = SessionUtils::load('id_user', $keep = true) ?: null;  // Jeśli brak 'id_user' w sesji, ustawiamy null

        // 1. Sprawdź czy użytkownik jest zalogowany -> jeżeli nie wyślij wiadomość "Musisz być zalogowany, aby skorzystać z naszych kodów rabatowych."
        if (App::getConf()->roles != NULL) {
            $id = App::getDB()->get('discount_codes', 'id_code', ['code_name' => $this->discount_code]);
            // 2. Sprawdź czy użytkownik nie skorzystał już z kodu -> jeżeli tak, wyślij wiadomość "Skorzystałeś już z tego kodu rabatowego."
            if (App::getDB()->has('users_codes', ['id_user' => $idUser, 'id_code' => $id])) {
                App::getMessages()->addMessage(new \core\Message("Skorzystałeś już z tego kodu rabatowego", \core\Message::ERROR));
            } else {
                // 3. Dodaj do zamówienia rabat, oraz przejdź do $this->generateCartView()
                $discount_code = App::getDB()->get('discount_codes', ['discount_value', 'discount_type'], ['code_name' => $this->discount_code]);
                $this->value = $discount_code['discount_value'];
                $this->type = $discount_code['discount_type'];
            }
        } else {
            App::getMessages()->addMessage(new \core\Message("Musisz być zalogowany by skorzystać z kodu", \core\Message::ERROR));
        }
        $id = App::getDB()->get('discount_codes', 'id_code', ['code_name' => $this->discount_code]);

        $_SESSION['code'] = [
            'id' => $id,
            'code' => $this->discount_code,
            'value' => $this->value,
            'type' => $this->type,
        ];
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('cart');
    }

    public function generateCartView()
    {
        App::getSmarty()->assign('code', $_SESSION['code']['code'] ?? null,);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('value', $_SESSION['code']['value'] ?? null,);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('type', $_SESSION['code']['type'] ?? null,);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('min_vault_delivery', $this->minVaultDelivery);
        App::getSmarty()->assign('products', $this->productsInfo);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('page_title', 'Koszyk Yups');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title',       'Koszyk');          // Tytuł strony ("Yups")

        App::getSmarty()->display('CartView.tpl');                      // Plik z widokiem strony
    }

    public function generateDeliveryView()
    {
        App::getSmarty()->assign('value', $this->totalValue);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('delivery', $this->delivery);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('deliveryAdress', $this->deliveryAdress);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('billingAdress', $this->billingAdress);            // Lista rekordów z bazy danych

        App::getSmarty()->assign('page_title', 'Dostawa Yups');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title',       'Dostawa');          // Tytuł strony ("Yups")

        App::getSmarty()->display('DeliveryView.tpl');                      // Plik z widokiem strony
    }

    public function generatePaymentView()
    {
        $totalValue = $this->totalValue + $this->deliveryValue;
        App::getSmarty()->assign('paymentMethods', $this->paymentMethods);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('deliveryValue', $this->deliveryValue);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('productsValue', $this->totalValue);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('totalValue', $totalValue);            // Lista rekordów z bazy danych

        App::getSmarty()->assign('page_title', 'Płatność Yups');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title',       'Płatność');          // Tytuł strony ("Yups")

        App::getSmarty()->display('PaymentView.tpl');                      // Plik z widokiem strony
    }

    public function generateFinalizationView()
    {
        App::getSmarty()->assign('page_title', 'Gotowe');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title',       'Gotowe');          // Tytuł strony ("Yups")

        App::getSmarty()->display('FinalizationView.tpl');                      // Plik z widokiem strony
    }

    public function generateView()
    {
        $url = App::getDB()->get("products", "url", ["id_product" => $this->productID]);

        // URL z parametrem 'product'
        $action = "productDetails?product=" . $url;

        // Przekierowanie
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo($action);
    }
}
