<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use PDOException;



class AccountCtrl
{
    /* Główny panel, ikony do możliwych do zrobienia kategorii */
    public function action_account()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);

        // Pobieranie daty rejestracji użytkownika
        $registerDate = App::getDB()->get("users", "register_date", ["id_user" => $idUser]);

        // Przekształcenie daty rejestracji do obiektu DateTime
        $registerDateObj = new \DateTime($registerDate);
        $currentDate = new \DateTime();  // Bieżąca data

        // Obliczenie różnicy między datą rejestracji a bieżącą datą
        $interval = $registerDateObj->diff($currentDate);

        // Formatowanie różnicy na "x lat, x miesięcy, x dni"
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        // Tworzenie tekstu do wyświetlenia
        $registerTimeText = '';
        if ($years > 0) {
            $registerTimeText .= $years . ' lat ';
        }
        if ($months > 0) {
            $registerTimeText .= $months . ' miesięcy ';
        }
        if ($days > 0) {
            $registerTimeText .= $days . ' dni';
        }

        // Pobieranie liczby zakupów użytkownika
        $purchaseCount = App::getDB()->count("history_orders", ["id_user" => $idUser]);

        // Przypisanie do zmiennej, aby mogła być wyświetlona w szablonie
        App::getSmarty()->assign('registerTime', $registerTimeText);
        App::getSmarty()->assign('purchaseCount', $purchaseCount);

        App::getSmarty()->assign('userName', $userName);  // Tytuł strony ("Yups")
        App::getSmarty()->assign('page_title', 'Panel Główny Konta');          // Tytuł strony ("Yups")
        App::getSmarty()->assign('title', 'Konto');          // Tytuł strony ("Yups")

        App::getSmarty()->display('AccountView.tpl');                      // Plik z widokiem strony
    }

    // Edycja Danych Osobowych (zmiana imienia, nazwiska, maila)
    public function action_userEdit()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);
        App::getSmarty()->assign('userName', $userName);  // Tytuł strony ("Yups")

        $user = App::getDB()->get("users", "*", ["id_user" => $idUser]) ?? null;
        $deliveryAddress = App::getDB()->get("addresses", "*", ["id_user" => $idUser, "address_type" => "delivery"]) ?? null;
        $billingAddress = App::getDB()->get("addresses", "*", ["id_user" => $idUser, "address_type" => "billing"]) ?? null;

        $isDeliveryAddress = App::getDB()->has("addresses", ["id_user" => $idUser, "address_type" => "delivery"]);
        $isBillingAddress = App::getDB()->has("addresses", ["id_user" => $idUser, "address_type" => "billing"]);

        App::getSmarty()->assign('user', $user);                            // Tytuł strony ("Yups")
        App::getSmarty()->assign('billingAddress', $billingAddress);        // Tytuł strony ("Yups")
        App::getSmarty()->assign('deliveryAddress', $deliveryAddress);      // Tytuł strony ("Yups")
        App::getSmarty()->assign('isDeliveryAddress', $isDeliveryAddress);      // Tytuł strony ("Yups")
        App::getSmarty()->assign('isBillingAddress', $isBillingAddress);      // Tytuł strony ("Yups")


        App::getSmarty()->assign('page_title', 'Dane Personalne');       // Tytuł strony ("Yups")
        App::getSmarty()->assign('title', 'Dane Personalne');          // Tytuł strony ("Yups")

        App::getSmarty()->display('PersonalView.tpl');                      // Plik z widokiem strony
    }

    public function action_userEditPassword()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        $oldPassword = App::getDB()->get("users", "password", ["id_user" => $idUser]) ?? null;

        $password = ParamUtils::getFromRequest('current_password') ?? null;
        $newPassword = ParamUtils::getFromRequest('new_password') ?? null;
        $secPassword = ParamUtils::getFromRequest('confirm_password') ?? null;

        if (password_verify($password, $oldPassword)) {
            $passwordPattern = "/^(?=.*[A-Z])(?=.*\W).{8,}$/"; // minimum 8 znaków, jedna wielka litera, jeden znak specjalny
            if (preg_match($passwordPattern, $newPassword)) {
                if ($newPassword == $secPassword) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                    try {
                        App::getDB()->update("users", ["password" => $hashedPassword], ["id_user" => $idUser]);
                        App::getMessages()->addMessage(new \core\Message("Pomyślnie zmieniono hasło", \core\Message::INFO));
                    } catch (PDOException) {
                        App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas zmiany hasła", \core\Message::ERROR));
                    }
                } else {
                    App::getMessages()->addMessage(new \core\Message("Hasła nie są takie same", \core\Message::ERROR));
                }
            } else {
                App::getMessages()->addMessage(new \core\Message("Hasło musi zawierać co najmniej 8 znaków, jedną wielką literę i jeden znak specjalny.", \core\Message::ERROR));
            }
        } else {
            App::getMessages()->addMessage(new \core\Message("Wpisałeś złe aktualne hasło", \core\Message::ERROR));
        }


        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditPersonalData()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);

        $name = ParamUtils::getFromRequest('name') ?? null;
        $surname = ParamUtils::getFromRequest('surname') ?? null;
        $mail = ParamUtils::getFromRequest('mail') ?? null;
        try {
            if ($mail == null) {
                App::getDB()->update("users", [
                    "name" => $name,
                    "surname" => $surname,
                ], ["id_user" => $idUser]);
            } else {
                App::getDB()->update("users", [
                    "name" => $name,
                    "surname" => $surname,
                    "mail" => $mail,
                ], ["id_user" => $idUser]);
            }
            App::getMessages()->addMessage(new \core\Message("Pomyślnie zmieniłeś dane", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas edycji danych", \core\Message::ERROR));
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditDeliveryAddress()
    {
        // Pobranie id użytkownika z sesji
        $idUser = SessionUtils::load("id_user", $keep = true);

        // Pobranie danych z formularza
        $firstName = ParamUtils::getFromRequest('firstName') ?? null;
        $lastName = ParamUtils::getFromRequest('lastName') ?? null;
        $email = ParamUtils::getFromRequest('email') ?? null;
        $phoneNumber = ParamUtils::getFromRequest('phone_number') ?? null;
        $street = ParamUtils::getFromRequest('street') ?? null;
        $houseNumber = ParamUtils::getFromRequest('house_number') ?? null;
        $postalCode = ParamUtils::getFromRequest('postal_code') ?? null;
        $city = ParamUtils::getFromRequest('city') ?? null;

        try {
            // Sprawdzanie, czy adres dostawy już istnieje w tabeli
            $existingAddress = App::getDB()->select("addresses", [
                "id"
            ], [
                "id_user" => $idUser,
                "address_type" => 'delivery' // Typ adresu: delivery
            ]);

            // Jeżeli adres dostawy istnieje, zaktualizuj go
            if ($existingAddress) {
                App::getDB()->update("addresses", [
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "email" => $email,
                    "phone_number" => $phoneNumber,
                    "street" => $street,
                    "house_number" => $houseNumber,
                    "postal_code" => $postalCode,
                    "city" => $city
                ], [
                    "id_user" => $idUser,
                    "address_type" => 'delivery' // Typ adresu: delivery
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie zmieniono adres dostawy", \core\Message::INFO));
            } else {
                // Jeśli adres nie istnieje, dodaj nowy
                App::getDB()->insert("addresses", [
                    "id_user" => $idUser,
                    "address_type" => 'delivery', // Typ adresu: delivery
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "email" => $email,
                    "phone_number" => $phoneNumber,
                    "street" => $street,
                    "house_number" => $houseNumber,
                    "postal_code" => $postalCode,
                    "city" => $city
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie dodano adres dostawy", \core\Message::INFO));
            }
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas edycji adresu dostawy", \core\Message::ERROR));
        }

        // Przechowywanie wiadomości i przekierowanie na stronę edycji użytkownika
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditDeleteDeliveryAddress()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);

        try {
            App::getDB()->delete("addresses", [
                "id_user" => $idUser,
                "address_type" => 'delivery', // Typ adresu: delivery
            ]);

            App::getMessages()->addMessage(new \core\Message("Pomyślnie usunięto adres dostawy", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas usuwania adresu dostawy", \core\Message::ERROR));
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditBillingAddress()
    {
        // Pobranie id użytkownika z sesji
        $idUser = SessionUtils::load("id_user", $keep = true);

        // Pobranie danych z formularza
        $firstName = ParamUtils::getFromRequest('firstName') ?? null;
        $lastName = ParamUtils::getFromRequest('lastName') ?? null;
        $email = ParamUtils::getFromRequest('email') ?? null;
        $phoneNumber = ParamUtils::getFromRequest('phone_number') ?? null;
        $street = ParamUtils::getFromRequest('street') ?? null;
        $houseNumber = ParamUtils::getFromRequest('house_number') ?? null;
        $postalCode = ParamUtils::getFromRequest('postal_code') ?? null;
        $city = ParamUtils::getFromRequest('city') ?? null;

        try {
            // Sprawdzanie, czy adres rozliczeniowy już istnieje w tabeli
            $existingAddress = App::getDB()->select("addresses", [
                "id"
            ], [
                "id_user" => $idUser,
                "address_type" => 'billing' // Typ adresu: billing
            ]);

            // Jeżeli adres rozliczeniowy istnieje, zaktualizuj go
            if ($existingAddress) {
                App::getDB()->update("addresses", [
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "email" => $email,
                    "phone_number" => $phoneNumber,
                    "street" => $street,
                    "house_number" => $houseNumber,
                    "postal_code" => $postalCode,
                    "city" => $city
                ], [
                    "id_user" => $idUser,
                    "address_type" => 'billing' // Typ adresu: billing
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie zmieniono adres rozliczeniowy", \core\Message::INFO));
            } else {
                // Jeśli adres nie istnieje, dodaj nowy
                App::getDB()->insert("addresses", [
                    "id_user" => $idUser,
                    "address_type" => 'billing', // Typ adresu: billing
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "email" => $email,
                    "phone_number" => $phoneNumber,
                    "street" => $street,
                    "house_number" => $houseNumber,
                    "postal_code" => $postalCode,
                    "city" => $city
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie dodano adres rozliczeniowy", \core\Message::INFO));
            }
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas edycji adresu rozliczeniowego", \core\Message::ERROR));
        }

        // Przechowywanie wiadomości i przekierowanie na stronę edycji użytkownika
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditDeleteBillingAddress()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);

        try {
            App::getDB()->delete("addresses", [
                "id_user" => $idUser,
                "address_type" => 'billing', // Typ adresu: billing
            ]);

            App::getMessages()->addMessage(new \core\Message("Pomyślnie usunięto adres rozliczeniowy", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas usuwania adresu rozliczeniowego", \core\Message::ERROR));
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('userEdit');
    }

    public function action_userEditDeleteAccount()
    {
        $idUser = SessionUtils::load("id_user", $keep = true);
        try {
            App::getDB()->update("users", ["status" => "inactive"], ['id_user' => $idUser]);

            App::getMessages()->addMessage(new \core\Message("Konto zostało dezaktywowane", \core\Message::INFO));
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas dezaktywacji konta", \core\Message::ERROR));
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('logout');
    }

    // Historia Zamówień (wraz z możliwością reklamacji/zwrotu)
    // Statusy Zamówień
    // Opinie i Recenzje
}
