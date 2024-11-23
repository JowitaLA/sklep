<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
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
            ]);
        if($has)
        {
            App::getMessages()->addMessage(new \core\Message("Produkt już jest na Twojej Liście Życzeń", \core\Message::ERROR));
        }
        else{
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
        $this->idProduct = ParamUtils::getFromRequest('idProduct');

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
    }

    public function action_wishlistShow()
    {
        $this->idUser = SessionUtils::load('id_user', $keep = true);

        App::getDB()->select(
            "wishlist",
            "*",
            [
                "id_user" => $this->idUser,
            ]
        );
    }
}
