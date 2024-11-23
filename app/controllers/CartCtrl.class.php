<?php

namespace app\controllers;

use core\App;
use PDOException;
use core\ParamUtils;
use core\SessionUtils;



class CartCtrl
{
    private $productID;
    private $quantity;
    private $action;

    private $discount_code;

    private $product = [];
    private $productsInfo = [];
    private $promotion;


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

    // Wyświetlenie 
    public function action_cart()
    {
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

    public function action_deleteCart_applyDiscount(){
        $this->discount_code = ParamUtils::getFromRequest('discount_code');
        // 1. Sprawdź czy użytkownik jest zalogowany -> jeżeli nie wyślij wiadomość "Musisz być zalogowany, aby skorzystać z naszych kodów rabatowych."
        

        // 2. Sprawdź czy użytkownik nie skorzystał już z kodu -> jeżeli tak, wyślij wiadomość "Skorzystałeś już z tego kodu rabatowego."
        
        
        // 3. Dodaj do zamówienia rabat, oraz przejdź do $this->generateCartView()
    }

    public function generateCartView()
    {
        App::getSmarty()->assign('products', $this->productsInfo);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('promotion', $this->promotion);            // Lista rekordów z bazy danych
        App::getSmarty()->assign('page_title', 'Koszyk Yups');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title',       'Koszyk');          // Tytuł strony ("Yups")

        App::getSmarty()->display('CartView.tpl');                      // Plik z widokiem strony
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
