<?php

namespace app\controllers;

use core\App;

class LogoutCtrl
{

	public function action_logout()
	{
		// Zakończenie sesji i Wyświetlenie widoku
		session_destroy();
		App::getRouter()->redirectTo("logoutShow");
	}

	public function action_logoutShow()
	{
		// Wyślij wiadomość z informacją o Wylogowaniu Użytkownika
		App::getMessages()->addMessage(new \core\Message("Wylogowano", \core\Message::INFO));

		// Przeniesienie użytkownika na stronę główną (System automatycznie przenosi do strony logowania)
		App::getRouter()->forwardTo("main");
	}
}
