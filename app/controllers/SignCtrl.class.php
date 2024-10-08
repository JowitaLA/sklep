<?php
namespace app\controllers;


use core\App;
use core\Utils;

use app\forms\LoginForm;

class SignCtrl{
	public function action_login(){
		// logowanie 
	}

	public function action_loginShow(){
		App::getSmarty()->assign("title","Logowanie");        
        App::getSmarty()->assign("button_title","Zaloguj się");               

		App::getSmarty()->display("SignView.tpl");
	}

	public function action_logout(){
		// 1. zakończenie sesji
		session_destroy();
		// 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
		redirectTo('main.tpl');
	}	

	public function action_register(){
		// rejestracja
	}

	public function action_registerShow(){
		App::getSmarty()->assign("title","Rejestracja");        
        App::getSmarty()->assign("button_title","Zarejestruj się");               

		App::getSmarty()->display("SignView.tpl");  
	}

	public function action_resetPassword(){
		// reset hasła
	}

	public function action_resetPasswordShow(){
		App::getSmarty()->assign("title","Resetuj Hasło");        
        App::getSmarty()->assign("button_title","Zresetuj Hasło");               

		App::getSmarty()->display("SignView.tpl"); 
	}
}