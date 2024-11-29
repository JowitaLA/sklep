<?php

namespace app\controllers;

use core\App;
use core\Messages;
use core\SessionUtils;
use core\ParamUtils;
use PDO;
use PDOException;



class RatingCtrl
{
    public function action_ratings()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);
        App::getSmarty()->assign('userName', $userName);

        // Pobranie danych z formularza
        $search = strip_tags(filter_input(INPUT_POST, 'search')) ?? ''; // Domyślnie pusty string
        $filter = strip_tags(filter_input(INPUT_POST, 'filter')) ?? "all"; // Domyślnie "all"

        // Pobranie ID produktów związanych z zamówieniami użytkownika
        $productsId = App::getDB()->query("
        SELECT DISTINCT oi.id_product
        FROM order_items oi
        JOIN history_orders ho ON oi.id_order = ho.id_order
        WHERE ho.id_user = :id_user
        ", [":id_user" => $idUser])->fetchAll(PDO::FETCH_COLUMN);

        $product = [];

        if (!empty($productsId)) {
            $conditions = [
                "id_product" => $productsId
            ];

            if (!empty($search)) {
                $conditions["name[~]"] = $search; // Wyszukiwanie po nazwie
            }

            // Pobranie danych produktów
            $productData = App::getDB()->select("products", ["id_product", "name", "url"], $conditions);

            foreach ($productData as $item) {
                // Sprawdzamy, czy produkt został oceniony przez użytkownika
                $hasRating = App::getDB()->has("product_ratings", [
                    "id_product" => $item["id_product"],
                    "id_user" => $idUser
                ]);

                // Filtrujemy produkty na podstawie wybranego filtra
                if ($filter === "rated" && !$hasRating) continue; // Tylko ocenione
                if ($filter === "unrated" && $hasRating) continue; // Tylko nieocenione

                $product[] = [
                    "id" => $item["id_product"],
                    "name" => $item["name"],
                    "url" => $item["url"],
                    "isRating" => $hasRating
                ];
            }
        }

        App::getSmarty()->assign('product', $product);
        App::getSmarty()->assign('filter', $filter); // Dodanie filtra do widoku
        App::getSmarty()->assign('hasRating', $hasRating); // Dodanie sprawdzenia czy produkt ma recenzje
        App::getSmarty()->assign('page_title', 'Dane Personalne');
        App::getSmarty()->assign('title', 'Dane Personalne');

        App::getSmarty()->display('RatingsView.tpl');
    }

    public function action_deleteRating()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $idProduct = ParamUtils::getFromRequest('id_product') ?? null;

        if ($idProduct) {
            // Sprawdź, czy ocena istnieje
            $exists = App::getDB()->has("product_ratings", [
                "id_product" => $idProduct,
                "id_user" => $idUser
            ]);

            if ($exists) {
                try {
                    // Usuń ocenę i recenzję
                    App::getDB()->delete("product_ratings", [
                        "id_product" => $idProduct,
                        "id_user" => $idUser
                    ]);
                    App::getMessages()->addMessage(new \core\Message("Usunąłeś recenzję i ocenę", \core\Message::INFO));
                } catch (PDOException $e) {
                    App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas usuwania recenzji", \core\Message::ERROR));
                }
            } else {
                App::getMessages()->addMessage(new \core\Message("Nie posiadasz recenzji na tym produkcie", \core\Message::ERROR));
            }
        }

        SessionUtils::storeMessages();
        // Przekierowanie do strony ocen
        App::getRouter()->redirectTo("ratings");
    }

    public function action_editorRating()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);
        App::getSmarty()->assign('userName', $userName);

        $idProduct = ParamUtils::getFromRequest('id_product') ?? null;

        // sprawdź czy jest już wystawiona opinia
        $isRating = App::getDB()->has("product_ratings", [
            "id_product" => $idProduct,
            "id_user" => $idUser
        ]);

        // jeżeli jest, zapisz ją w $rating
        if ($isRating) {
            $rating = App::getDB()->get("product_ratings", "*", [
                "id_product" => $idProduct,
                "id_user" => $idUser
            ]);
        }
        //jeżeli nie ma, zostaw pustą tabelę
        else {
            App::getDB()->insert("product_ratings", [
                "id_product" => $idProduct,
                "id_user" => $idUser
            ]);

            $rating = App::getDB()->get("product_ratings", "*", [
                "id_product" => $idProduct,
                "id_user" => $idUser
            ]);
        }

        // Przekierowanie do strony edytora
        App::getSmarty()->assign('rating', $rating);
        App::getSmarty()->assign('userName', $userName);
        App::getSmarty()->assign('page_title', 'Opinia');
        App::getSmarty()->assign('title', 'Opinia');

        App::getSmarty()->display('RatingDetailsView.tpl');
    }

    public function action_submitRating()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $idProduct = ParamUtils::getFromRequest('id_product') ?? null;
        $rating = ParamUtils::getFromRequest('rating') ?? null;
        $review = ParamUtils::getFromRequest('review') ?? null;

        // Sprawdzanie, czy opinia już istnieje
        $isRatingExist = App::getDB()->has("product_ratings", [
            "id_product" => $idProduct,
            "id_user" => $idUser
        ]);

        // Jeśli opinia istnieje, zaktualizuj ją, w przeciwnym razie dodaj nową
        try {
            if ($isRatingExist) {
                // Zaktualizuj istniejącą opinię
                App::getDB()->update("product_ratings", [
                    "rating" => $rating,
                    "review" => $review,
                    "created_at" => date("Y-m-d H:i:s")
                ], [
                    "id_product" => $idProduct,
                    "id_user" => $idUser
                ]);
            } else {
                // Dodaj nową opinię
                App::getDB()->insert("product_ratings", [
                    "id_product" => $idProduct,
                    "id_user" => $idUser,
                    "rating" => $rating,
                    "review" => $review,
                    "created_at" => date("Y-m-d H:i:s")
                ]);
            }
            App::getMessages()->addMessage(new \core\Message("Wystawiłeś recenzję", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas dodawania recenzji: ". $e, \core\Message::ERROR));
        }

        // Po zapisaniu opinii, możesz przekierować użytkownika na stronę z potwierdzeniem
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("ratings");
    }
}
