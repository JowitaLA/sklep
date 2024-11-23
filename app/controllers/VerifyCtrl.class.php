<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Message;
use Error;

class VerifyCtrl
{
    private $token;
    private $userToken;
    private $status;
    private $verify_message;
    private $action;

    public function action_verify()
    {
        // Pobierz token z URL
        $this->token = ParamUtils::getFromGet('token');
        $this->action = "Weryfikacja konta";

        if (!$this->token) {
            $this->verify_message = "Podano zły token.";
            return $this->generateView();
        }

        // Sprawdź czy token istnieje w bazie danych, jeżeli nie wyślij wiadomość, że token jest nieaktywny
        $this->userToken = App::getDB()->get("tokens", "id_user", [
            "token_value" => $this->token
        ]);

        if (empty($this->userToken)) {
            $this->verify_message = "Token jest nieaktywny.";
            return $this->generateView();
        }

        // Sprawdź czy użytkownik posiada status `inactve`, jeżeli nie wyślij wiadomość, że token jest nieaktywny
        $this->status = App::getDB()->get("users", "status", [
            "id_user" => $this->userToken
        ]);

        if ($this->status == "active") {
            App::getDB()->delete("tokens", [
                "id_user" => $this->userToken
            ]);

            $this->verify_message = "Konto użytkownika zostało już aktywowane.";
            return $this->generateView();
        }


        // Zmień status użytkownika na `active` (aktywując tak konto użytkownika)
        try {
            App::getDB()->update("users", [
                "status" => "active"
            ], [
                "id_user" => $this->userToken
            ]);

            // Usuń token po weryfikacji (by nie zajmował niepotrzebnie miejsca w bazie danych)
            App::getDB()->delete("tokens", [
                "id_user" => $this->userToken
            ]);

            $this->verify_message = "Aktywacja użytkownika przebiegła pomyślnie. Zaloguj się na swoje konto.";
        } catch (\PDOException $e) {
            // Obsługa błędów w przypadku wyjątku PDO
            $this->verify_message = "Wystąpił błąd podczas aktywacji konta użytkownika: " . $e;
        } catch (\Exception $e) {
            // Obsługa innych potencjalnych wyjątków
            $this->verify_message = "Wystąpił nieoczekiwany błąd: " . $e;
        }

        return $this->generateView();
    }

    public function action_resetPassword()
    {
        // Pobierz token z URL
        $this->token = ParamUtils::getFromGet('token');
        $this->action = "Resetowanie hasła";

        if (!$this->token) {
            $this->verify_message = "Podano zły token.";
            return $this->generateView();
        }

        // Sprawdź czy token istnieje w bazie danych, jeżeli nie wyślij wiadomość, że token jest nieaktywny
        $this->userToken = App::getDB()->get("tokens", "id_user", [
            "token_value" => $this->token
        ]);

        if (empty($this->userToken)) {
            $this->verify_message = "Token jest nieaktywny.";
            return $this->generateView();
        }

        $this->verify_message = "Hasło";
        return $this->generateView();
    }

    public function generateView()
    {
        App::getSmarty()->assign('title', 'Yups');
        App::getSmarty()->assign('action_title', $this->action);
        App::getSmarty()->assign('idUser', $this->userToken);
        App::getSmarty()->assign('verify_message', $this->verify_message);

        App::getSmarty()->display('VerifyView.tpl');
    }
}
