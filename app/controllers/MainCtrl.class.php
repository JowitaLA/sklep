<?php

namespace app\controllers;


use core\App;
use PDOException;



class MainCtrl
{
    private $categories;    //rekordy pobrane z tabeli `categories` z Bazy Danych
    private $last_products; //rekordy pobrane z tabeli `products` z Bazy Danych

    public function action_main()
    {
        //pobranie rekordów z tabeli `categories`
        try {
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem kategorii", \core\Message::ERROR));
        }

        //pobranie rekordów ostatnich 12 rekordów z tabeli `products`
        try {
            $this->last_products = App::getDB()->query("SELECT * FROM products ORDER BY id_product DESC LIMIT 12");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem ostatnich produktów", \core\Message::ERROR));
        }


        $this->generateView();
    }


    public function generateView()
    {
        App::getSmarty()->assign('categories', $this->categories);  // lista rekordów z bazy danych
        App::getSmarty()->assign('last_products', $this->last_products);  // lista rekordów z bazy danych

        App::getSmarty()->assign('page_title', 'Yups');
        App::getSmarty()->display('MainView.tpl');
    }
}
