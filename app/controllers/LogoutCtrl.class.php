<?php

namespace app\controllers;


use core\App;



class LogoutCtrl
{

public function action_logout()
	{
		// 1. zakończenie sesji
		session_destroy();
		//App::getMessages()->addMessage(new \core\Message("Wylogowano", \core\Message::INFO));
		// 2. idź na stronę główną - system automatycznie przekieruje do strony logowania

		App::getRouter()->redirectTo("logoutShow");
	}

	public function action_logoutShow()
	{
		// 1. zakończenie sesji
		App::getMessages()->addMessage(new \core\Message("Wylogowano", \core\Message::INFO));
		// 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
		App::getRouter()->forwardTo("main");
	}
}