<?php

namespace app\controllers;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	private $password;
	private $role;
	private $idUser;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
	}
		
	public function validate() {
		$this->form-> login = getFromRequest('login');
		$this->form-> pass = getFromRequest('pass');
		
		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->form->login)) return false;
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->form->login)) {
			getMessages()->addError('Nie podano loginu');
		}
		if (empty($this->form->pass)) {
			getMessages()->addError('Nie podano hasła');
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if (getMessages()->isError())return false;
		
		// sprawdzenie, czy dane logowania poprawne
	    $this->password = getDB()->get("users", "password",[
					"login" => $this->form->login
				]);
			if ($this->form->pass == $this->password){
				addRole('user');
				
				$this->idUser = getDB()->select("users", "idUser",[
					"login" => $this->form->login]);
					
				$this->role = getDB()->get("user_roles", "idRole",[
					"idUser" => $this->idUser]);	
				
				if($this->role == '1') addRole('admin');
				if($this->role == '3') addRole('operator');
			}
			else{
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		
		
	return ! getMessages()->isError();
}

	public function action_loginShow(){
		$this->generateView(); 
	}
	
	public function action_login(){
		if ($this->validate()){
			//zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			getMessages()->addError('Poprawnie zalogowano do systemu');
			redirectTo("login.tpl");
		} else {
			//niezalogowany => pozostań na stronie logowania
			$this->generateView(); 
		}		
	}
	
	public function action_logout(){
		// 1. zakończenie sesji
		session_destroy();
		// 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
		redirectTo('login.tpl');
	}	
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		getSmarty()->display('login.tpl');
	}
}