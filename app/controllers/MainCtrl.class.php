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
        /* Pobranie rekordów z tabeli `categories` */
        try {
            // SELECT * FROM CATEGORIES //
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem kategorii", \core\Message::ERROR));
        }

        /* Pobranie ostatnich 12 rekordów z tabeli `products` */
        try {
            $this->last_products = App::getDB()->query("SELECT * FROM products WHERE status='active' ORDER BY id_product DESC LIMIT 12");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem ostatnich produktów", \core\Message::ERROR));
        }

        /* Funkcja od generowania Widoku */
        $this->generateView();
    }

    public function generateView()
    {
        App::getSmarty()->assign('categories', $this->categories);          // Lista rekordów z bazy danych
        App::getSmarty()->assign('last_products', $this->last_products);    // Lista rekordów z bazy danych
        App::getSmarty()->assign('page_title', 'Yups');                     // Tytuł strony ("Yups")

        App::getSmarty()->display('MainView.tpl');                          // Plik z widokiem strony
    }
}
