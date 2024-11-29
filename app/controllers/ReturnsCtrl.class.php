<?php

namespace app\controllers;

require __DIR__ . '/../../lib/PHPMailer/src/Exception.php';
require __DIR__ . '/../../lib/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use PDOException;



class ReturnsCtrl
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function action_returns() // Wyświetlenie widoku dla gwarancji i zwrotów "Wpisz nr zamówienia"
    {
        // Przekaż dane do widoku
        App::getSmarty()->assign('page_title', "Zwroty i Gwarancje");
        App::getSmarty()->display('ReturnsView.tpl');
    }

    public function action_showOrderReturns() // wyświetlenie produktów na nr zamówienia do wyboru oraz wypełnienie formularza
    {
        $id_order = ParamUtils::getFromRequest('id_order');
        $isOrder = App::getDB()->has('order_items', ['id_order' => $id_order]);

        if ($isOrder) {
            try {
                // Pobranie id_product z tabeli order_items
                $orderItems = App::getDB()->select('order_items', ['id_product'], ['id_order' => $id_order]);

                if ($orderItems) {
                    // Pobranie wszystkich id_product jako tablicy
                    $productIds = array_column($orderItems, 'id_product');

                    // Pobranie danych z tabeli products dla tych id_product
                    $products = App::getDB()->select('products', ['name', 'url', 'id_product'], [
                        'id_product' => $productIds
                    ]);

                    // Przekazanie danych do widoku
                    App::getSmarty()->assign('id_order', $id_order);

                    App::getSmarty()->assign('products', $products);
                    App::getSmarty()->assign('page_title', "Zwroty i Gwarancje");
                    App::getSmarty()->display('ReturnEditorView.tpl');
                } else {
                    throw new PDOException("Nie znaleziono zamówień dla podanego ID.");
                }
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z wczytaniem zamówienia: " . $e->getMessage(), \core\Message::ERROR));
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo("returns");
            }
        } else {
            App::getMessages()->addMessage(new \core\Message("Nie ma zamówienia o takim ID", \core\Message::ERROR));
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("returns");
        }
    }

    public function action_addReturn() // zapisanie danych zwrotu do bd i wysłanie maila o zwrocie wraz z numerem zwrotu
    {
        $id_order = ParamUtils::getFromRequest('id_order') ?? null;
        $id_product = ParamUtils::getFromRequest('id_product') ?? null;
        $reason = ParamUtils::getFromRequest('reason') ?? null;

        if ($reason == null || $id_order == null || $id_product == null) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił problem podczas wysyłania zlecenia. Spróbuj jeszcze raz lub napisz do nas.", \core\Message::ERROR));
        } else {
            try {
                do {
                    $token = random_int(0, 2147483647);  // Losowa liczba w zakresie INT
                    $isTokenUnique = !App::getDB()->has("history_orders", ["id_order" => $token]);  // Sprawdzanie unikalności
                } while (!$isTokenUnique);
                App::getDB()->insert("returns_and_guarantees", [
                    "id_return" => $token,
                    "id_order" => $id_order,
                    "id_product" => $id_product,
                    "reason" => $reason,
                    "status" => "rozpatrywany"
                ]);

                $email = App::getDB()->query("
                    SELECT JSON_EXTRACT(billing_address, '$.email') AS email
                    FROM history_orders
                    WHERE id_order = :id_order;
                    ", [
                    ':id_order' => $id_order
                ])->fetchColumn();

                $email = trim($email, '"'); // Usuwa cudzysłowy

                $this->mail->addAddress($email);  // Dodano odbiorce do maila
                $message = "
                <html>
                <head>
                    <title>Informacja o numerze zwrotu</title>
                </head>
                <body>
                    <p>Dzień dobry,</p>
                    <p>Informujemy, że numer Twojego zwrotu to <strong>" . $token . "</strong>. Możesz sprawdzić jego status, klikając w poniższy link:</p>
                    <p><a href='http://localhost/sklep/public/returns'>Sprawdź status zwrotu</a></p>
                    <p>Jeżeli masz dodatkowe pytania, skontaktuj się z naszym działem obsługi klienta.</p>
                    <br>
                    <p>Pozdrawiamy,<br>Zespół Sklepu Yups</p>
                </body>
                </html>
                ";
                $this->mail->Body = $message;
                $this->send_mail();
                App::getMessages()->addMessage(new \core\Message("Zgłosiłeś zwrot produktu. Sprawdź swoją skrzynkę mailową.", \core\Message::INFO));
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił problem podczas wysyłania zlecenia. Spróbuj jeszcze raz lub napisz do nas.".$e, \core\Message::ERROR));
            }
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("returns");
    }

    public function action_statusReturn() // Sprawdzenie statusu zwrotu
    {
        $id_order = ParamUtils::getFromRequest("id_order") ?? null;
        if ($id_order == null) {
            App::getMessages()->addMessage(new \core\Message("Podałeś zły numer zwrotu. Sprawdź skrzynkę mailową bądź skontaktuj sie z naszym działem pomocy.", \core\Message::ERROR));
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('returns');
        } else {
            $status = App::getDB()->get("returns_and_guarantees", "status", ["id_order" => $id_order]);

            App::getSmarty()->assign('id_order', $id_order);
            App::getSmarty()->assign('status', $status);
            App::getSmarty()->assign('page_title', "Zwroty i Gwarancje");
            App::getSmarty()->display('ReturnStatusView.tpl');
        }
    }

    public function send_mail()
    {
        try {

            // Ustawienie języka na polski
            $this->mail->setLanguage('pl', 'phpmailer/language/');
            $this->mail->CharSet = 'UTF-8'; // Ustaw kodowanie na UTF-8

            // Konfiguracja SMTP
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.poczta.onet.pl';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'jowisz1@onet.pl';
            $this->mail->Password   = 'Ddipcdp$c1';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port       = 587;

            // Odbiorca i nadawca
            $this->mail->setFrom('jowisz1@onet.pl', 'Sklep');

            // Treść wiadomości
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Yups';

            // Wyślij wiadomość
            $this->mail->send();
        } catch (Exception $e) {
            echo "<script>console.log('Nie udało się wysłać wiadomości. Błąd: {$this->mail->ErrorInfo}');</script>";
        }
    }
}
