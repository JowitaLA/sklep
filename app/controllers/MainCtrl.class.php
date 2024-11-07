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
        App::getSmarty()->assign('categories', $this->categories);          // Lista rekordów z bazy danych
        App::getSmarty()->assign('last_products', $this->last_products);    // Lista rekordów z bazy danych
        App::getSmarty()->assign('page_title', 'Yups');                     // Tytuł strony ("Yups")

        App::getSmarty()->display('MainView.tpl');                          // Plik z widokiem strony
    }
}
