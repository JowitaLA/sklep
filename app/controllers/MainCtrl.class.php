<?php

namespace app\controllers;

use core\App;
use PDOException;

class MainCtrl
{
    private $categories;    // Rekordy pobrane z tabeli `categories` z Bazy Danych
    private $last_products; // Rekordy pobrane z tabeli `products` z Bazy Danych

    public function action_main()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = 0;
        }

        // Pobranie rekordów z tabeli `categories`
        try {
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem kategorii", \core\Message::ERROR));
        }

        // Pobranie ostatnich 12 aktywnych produktów
        try {
            $this->last_products = App::getDB()->query("SELECT * FROM products WHERE status='active' ORDER BY id_product DESC LIMIT 12")->fetchAll();
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem ostatnich produktów", \core\Message::ERROR));
        }

        try {
            // Dodaj URL do obrazów dla każdego produktu
            foreach ($this->last_products as &$product) {
                $product['image_url'] = $this->getFirstAvailableImage($product['url']);
            }
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z ustawieniem obrazów", \core\Message::ERROR));
        }

        // Funkcja do generowania widoku
        $this->generateView();
    }

    private function mini_cart()
    {
        // Sprawdź, czy koszyk istnieje w sesji
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Tablica do przechowywania danych produktów
            $productsInfo = [];

            // Iteracja po productID w koszyku
            foreach ($_SESSION['cart'] as $productID => $quantity) {
                // Pobierz dane produktu na podstawie productID (może to być zapytanie do bazy danych)
                $product = App::getDB()->get("products", ["id_product","amount","url","name","price"], ["id_product" => $productID]);

                // Jeśli produkt został znaleziony, dodaj go do tablicy
                if ($product) {
                    $productsInfo[$product['id_product']] = [
                        'url' => $product['url'],
                        'name' => $product['name'],
                        'amount' => $product['amount'],
                        'price' => $product['price'],
                        'quantity' => $quantity // Dodajemy ilość z koszyka
                    ];
                }
            }

            return $productsInfo;
        }

        return []; // Zwróć pustą tablicę, jeśli koszyk jest pusty
    }

    /**
     * Funkcja do sprawdzania dostępności pierwszego obrazu w różnych formatach.
     */
    private function getFirstAvailableImage($url)
    {
        global $conf; // Upewnij się, że masz dostęp do zmiennej $conf
        $formats = ['jpg', 'png', 'gif']; // Dodaj inne formaty, które chcesz sprawdzić
        foreach ($formats as $format) {
            $imagePath = "assets/img/products/{$url}/1.{$format}";

            if (is_file("$imagePath")) { // Sprawdza, czy plik istnieje
                return "$imagePath"; // Zwraca pierwszą znalezioną wersję obrazu
            }
        }
        return "{$conf->app_url}/assets/img/products/default.png"; // Domyślny obraz, jeśli żaden format nie jest dostępny
    }


    public function generateView()
    {
        $miniCart = $this->mini_cart();
        App::getSmarty()->assign('categories', $this->categories);          // Lista rekordów z bazy danych
        App::getSmarty()->assign('cart', $_SESSION['cart']);          // Lista rekordów z bazy danych
        App::getSmarty()->assign('miniCart', $miniCart);          // Lista rekordów z bazy danych
        App::getSmarty()->assign('last_products', $this->last_products);    // Lista rekordów z bazy danych
        App::getSmarty()->assign('page_title', 'Yups');                     // Tytuł strony ("Yups")

        App::getSmarty()->display('MainView.tpl');                          // Plik z widokiem strony
    }
}
