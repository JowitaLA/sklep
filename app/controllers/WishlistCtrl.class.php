<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Route;
use core\SessionUtils;
use PDOException;



class WishlistCtrl
{
    private $idUser;
    private $idProduct;
    private $action;

    public function action_addToWishlist()
    {
        $this->idUser = SessionUtils::load('id_user', $keep = true);
        $this->idProduct = ParamUtils::getFromRequest('idProduct');
        $this->action = ParamUtils::getFromRequest('action');
        $has = App::getDB()->has(
            "wishlist",
            [
                "id_user" => $this->idUser,
                "id_product" => $this->idProduct,
            ]
        );
        if ($has) {
            App::getMessages()->addMessage(new \core\Message("Produkt już jest na Twojej Liście Życzeń", \core\Message::ERROR));
        } else {
            try {
                App::getDB()->insert(
                    "wishlist",
                    [
                        "id_user" => $this->idUser,
                        "id_product" => $this->idProduct,
                    ]
                );
                App::getMessages()->addMessage(new \core\Message("Produkt został dodany do Listy Życzeń", \core\Message::INFO));
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas dodawania produktu do Listy Życzeń", \core\Message::ERROR));
            }
        }
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo($this->action);
    }

    public function action_removeToWishlist()
    {
        $this->idUser = SessionUtils::load('id_user', $keep = true);
        $this->idProduct = ParamUtils::getFromRequest('id_product');

        try {
            App::getDB()->delete(
                "wishlist",
                [
                    "id_user" => $this->idUser,
                    "id_product" => $this->idProduct,
                ]
            );
            App::getMessages()->addMessage(new \core\Message("Produkt został usunięty z Listy Życzeń", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas usuwania produktu do Listy Życzeń", \core\Message::ERROR));
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('wishlistShow');
    }

    public function action_wishlistShow()
    {
        // Pobieramy id użytkownika z sesji
        $this->idUser = SessionUtils::load('id_user', $keep = true);

        // Pobieramy imię użytkownika lub login
        $userName = App::getDB()->get("users", "name", ["id_user" => $this->idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $this->idUser]);

        // Przypisanie do zmiennych, które mogą być użyte w widoku
        App::getSmarty()->assign('userName', $userName);
        App::getSmarty()->assign('page_title', 'Lista Życzeń');
        App::getSmarty()->assign('title', 'Lista Życzeń');

        // Pobieramy wszystkie produkty z listy życzeń użytkownika
        $wishlistItems = App::getDB()->select(
            "wishlist",
            "*",
            [
                "id_user" => $this->idUser
            ]
        );

        // Pobieramy pełne informacje o produktach na liście życzeń
        $wishlistProducts = [];
        foreach ($wishlistItems as $item) {
            $product = App::getDB()->get("products", "*", ["id_product" => $item["id_product"]]);
            $wishlistProducts[] = $product;  // Dodajemy produkt do tablicy
        }

        // Przypisujemy dane produktów do szablonu
        App::getSmarty()->assign('wishlistProducts', $wishlistProducts);

        // Wyświetlamy szablon
        App::getSmarty()->display('WishlistView.tpl');
    }
}
