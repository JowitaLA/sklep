<?php

namespace app\controllers;

require __DIR__ . '/../../lib/PHPMailer/src/Exception.php';
require __DIR__ . '/../../lib/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use app\forms\LoginForm;
use app\forms\RegisterForm;


class SignCtrl
{
	private $login;
	private $register;
	private $mail;

	private $name;
	private $password;
	private $role;
	private $idUser;
	private $status;
	private $verificationLink;

	public function __construct()
	{
		//stworzenie potrzebnych obiektów
		$this->login = new LoginForm();
		$this->register = new RegisterForm();
		$this->mail = new PHPMailer(true);
	}

	public function action_login()
	{
		if ($this->validate_login()) {
			//zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			App::getMessages()->addMessage(new \core\Message("Zalogowano", \core\Message::INFO));
			RoleUtils::addRole("sklep");
			SessionUtils::store('id_user', $this->idUser);
			App::getRouter()->forwardTo('main');
		} else {
			//niezalogowany => pozostań na stronie logowania			
			$this->action_loginShow();
		}
	}

	public function validate_login()
	{
		$this->login->login = ParamUtils::getFromRequest('l_name');
		$this->login->pass = ParamUtils::getFromRequest('l_password');

		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->login->login)) {
			App::getMessages()->addMessage(new \core\Message("Brak parametrów", \core\Message::WARNING));
			return false;
		}

		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->login->login)) {
			App::getMessages()->addMessage(new \core\Message("Nie podano loginu", \core\Message::WARNING));
		}
		if (empty($this->login->pass)) {
			App::getMessages()->addMessage(new \core\Message("Nie podano hasła", \core\Message::WARNING));
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if (App::getMessages()->isWarning()) return false;

		//sprawdzenie, czy dane logowania poprawne
		// GET password From users WHERE login => $this->login->login //
		$this->password = App::getDB()->get("users", "password", [
			"login" => $this->login->login
		]);

		if ($this->login->pass == $this->password) {
			$this->idUser = App::getDB()->get("users", "id_user", [
				"login" => $this->login->login
			]);

			$this->role = App::getDB()->get("users_rangs", "id_rang", [
				"id_user" => $this->idUser
			]);

			$this->role = App::getDB()->get("rangs", "name", [
				"id_rang" => $this->role
			]);

		//sprawdzenie czy status jest `active`, jeżeli nie, wysłanie ponowne wiadomości i poinformowanie użytkownika
		$this->status = App::getDB()->get("users", "status", [
			"id_user" => $this->idUser
		]);

		if ($this->status != "active") {
			$mail = App::getDB()->get("users", "mail", [
				"id_user" => $this->idUser
			]);
			echo "<script>console.log('Użytkownik jest nieaktywny');</script>";

			if ($mail) {
				// Pobranie wszystkich tokenów dla tego użytkownika
				
				echo "<script>console.log('Pobieranie tokenów');</script>";
				$tokens = App::getDB()->select("tokens", [
					"token_value"
				], [
					"id_user" => $this->idUser
				]);


				// Usuń wszystkie tokeny użytkownika
				if ($tokens) {
					echo "<script>console.log('Usuwanie tokenów użytkownika');</script>";
					App::getDB()->delete("tokens", [
						"id_user" => $this->idUser
					]);
				}

				echo "<script>console.log('Generowanie nowego tokena dla ',$this->idUser);</script>";
				// Wygeneruj nowy token
				$this->generate_token();
				$this->mail->addAddress(
					App::getDB()->get("users", "mail", [
						"id_user" => $this->idUser
					])
				);  // Dodano odbiorce do maila
				$this->mail->Body = 'Kliknij w poniższy link, aby zweryfikować swój adres e-mail: <a href="' . $this->verificationLink . '">Potwierdź rejestrację</a>.';
				$this->send_mail();
			}
			App::getMessages()->addMessage(new \core\Message("Twoje konto nie jest aktywne bądź zostało usunięte. Wysłaliśmy do Ciebie maila, w celu aktywacji bądź odzyskania konta.", \core\Message::ERROR));
		}

		if (App::getMessages()->isError()) return false;
		if ($this->role == "user" && (empty($tokens))) RoleUtils::addRole("sklep");
		if ($this->role == "owner" && (empty($tokens))) RoleUtils::addRole("zarządzanie");
		} else {
			App::getMessages()->addMessage(new \core\Message("Niepoprawny login lub hasło", \core\Message::ERROR));
		}

		return ! App::getMessages()->isError();
	}

	public function action_loginShow()
	{
		App::getSmarty()->assign("title", "Logowanie");
		App::getSmarty()->assign("button_title", "Zaloguj się");

		App::getSmarty()->display("SignView.tpl");
	}

	public function action_register()
	{
		if ($this->validate_register()) {
			App::getDB()->insert("users", [
				"login" => $this->register->register,
				"password" => $this->register->first_password,
				"mail" => $this->register->email,
				"status" => "inactive"
			]);

			$this->idUser = App::getDB()->id();

			App::getDB()->insert("users_rangs", [
				"id_user" => $this->idUser,
				"id_rang" => "6",
			]);

			$this->generate_token();
			$this->mail->addAddress($this->register->email);  // Dodano odbiorce do maila
			$this->mail->Body = 'Kliknij w poniższy link, aby zweryfikować swój adres e-mail: <a href="' . $this->verificationLink . '">Potwierdź rejestrację</a>.';
			$this->send_mail();

			//dodany do BD => przekieruj na ekran z logowaniem
			App::getMessages()->addMessage(new \core\Message("Rejestracja przebiegła pomyślnie. Aktywuj konto klikając w link wysłany emailem", \core\Message::INFO));

			$this->action_loginShow();
		} else {
			//niezalogowany => pozostań na stronie logowania			
			$this->action_registerShow();
		}
	}

	public function validate_register()
	{
		$this->register->register 			= ParamUtils::getFromRequest('r_name');
		$this->register->email 				= ParamUtils::getFromRequest('r_email');
		$this->register->first_password 	= ParamUtils::getFromRequest('r_first_password');
		$this->register->second_password 	= ParamUtils::getFromRequest('r_second_password');
		$this->register->terms_accepted 	= ParamUtils::getFromRequest('terms_accepted');


		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->register->register)) {
			App::getMessages()->addMessage(new \core\Message("Brak parametrów", \core\Message::WARNING));
			return false;
		}

		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->register->register)) {
			App::getMessages()->addMessage(new \core\Message("Nie podano nazwy użytkownika", \core\Message::WARNING));
		}
		if (empty($this->register->email)) {
			App::getMessages()->addMessage(new \core\Message("Nie podano e-maila", \core\Message::WARNING));
		}

		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->register->fist_password) && empty($this->register->second_password)) {
			App::getMessages()->addMessage(new \core\Message("Nie podano hasła", \core\Message::WARNING));
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if (App::getMessages()->isWarning()) return false;

		//sprawdzenie, czy nazwa użytkownika ma od 5 do 20 znaków
		if (strlen($this->register->register) < '5' && strlen($this->register->register) < '20') {
			App::getMessages()->addMessage(new \core\Message("Nazwa użytkownika powinna się składać od 5 do 20 znaków.", \core\Message::ERROR));
		}

		//sprawdzenie, czy e-mail jest e-mailem 
		if (!filter_var($this->register->email, FILTER_VALIDATE_EMAIL)) {
			App::getMessages()->addMessage(new \core\Message("Podany adres e-mail jest nieprawidłowy.", \core\Message::ERROR));
		}

		//sprawdzenie, czy hasło ma przynajmniej jeden znak specjalny, liczbę, wielką literę oraz składa sie z 8 znaków
		$password = $this->register->second_password;

		if (
			strlen($password) < 8 || // Sprawdzenie długości hasła
			!preg_match('/[A-Z]/', $password) || // Sprawdzenie, czy jest wielka litera
			!preg_match('/[0-9]/', $password) || // Sprawdzenie, czy jest cyfra
			!preg_match('/[\W]/', $password) // Sprawdzenie, czy jest znak specjalny
		) {
			App::getMessages()->addMessage(new \core\Message("Hasło musi mieć co najmniej 8 znaków, zawierać przynajmniej jedną wielką literę, cyfrę oraz znak specjalny.", \core\Message::ERROR));
		}

		//sprawdzenie, czy oba hasła się pokrywają
		$password = $this->register->second_password;
		$confirmPassword = $this->register->second_password;

		if ($password !== $confirmPassword) {
			App::getMessages()->addMessage(new \core\Message("Hasła muszą być takie same.", \core\Message::ERROR));
		}

		//sprawdzenie, czy regulamin został zaakceptowany
		if (!isset($this->register->terms_accepted)) {
			App::getMessages()->addMessage(new \core\Message("Musisz zaakceptować regulamin, aby kontynuować.", \core\Message::ERROR));
		}
		if (App::getMessages()->isError()) return false;

		//sprawdzenie, czy nazwa użytkownika jest zajęta
		$this->name = App::getDB()->get("users", "login", [
			"login" => $this->register->register
		]);
		if ($this->register->register == $this->name) {
			App::getMessages()->addMessage(new \core\Message("Użytkownik z takim loginem już istnieje", \core\Message::ERROR));
		}

		//sprawdzenie, czy użytkownika email nie znajduje się w bazie danych
		$email = App::getDB()->get("users", "mail", [
			"mail" => $this->register->email
		]);
		if ($email == $this->register->email) {
			App::getMessages()->addMessage(new \core\Message("Użytkownik z takim mailem już istnieje", \core\Message::ERROR));
		}
		return ! App::getMessages()->isError();
		//pomyślne zarejestrowanie użytkownika
	}

	public function action_registerShow()
	{
		App::getSmarty()->assign("title", "Rejestracja");
		App::getSmarty()->assign("button_title", "Zarejestruj się");

		App::getSmarty()->display("SignView.tpl");
	}

	public function action_resetPassword()
	{
		// reset hasła
	}

	public function action_resetPasswordShow()
	{
		App::getSmarty()->assign("title", "Resetuj Hasło");
		App::getSmarty()->assign("button_title", "Zresetuj Hasło");

		App::getSmarty()->display("SignView.tpl");
	}

	public function generate_token()
	{
		do {
			$token = bin2hex(random_bytes(32));  // Generowanie tokena
			$isTokenUnique = !App::getDB()->has("tokens", ["token_value" => $token]);  // Sprawdzanie unikalności
		} while (!$isTokenUnique);
	
		// Tworzenie linku do weryfikacji
		$this->verificationLink = "http://localhost/sklep/public/verify?token=" . $token;

		App::getDB()->insert("tokens", [
			"id_user" => $this->idUser,
			"token_value" => $token,
		]);
	}

	public function send_mail()
	{
		try {

			// Ustawienie języka na polski
			$this->mail->setLanguage('pl', 'phpmailer/language/');

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
			$this->mail->Subject = 'Weryfikacja Sklep';

			// Wyślij wiadomość
			$this->mail->send();
			echo "<script>console.log('Wysłano wiadomość');</script>";
		} catch (Exception $e) {
			echo "<script>console.log('Nie udało się wysłać wiadomości. Błąd: {$this->mail->ErrorInfo}');</script>";
		}
	}
}
