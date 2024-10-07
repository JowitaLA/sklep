<?php

namespace app\controllers;
use app\forms\RegisterForm;

class RegisterCtrl{
	private $form;
	private $register;
	private $email;
	
	public function __construct(){
		 //stworzenie potrzebnych obiektów
		 $this->form = new RegisterForm();
	}
		
	public function validate() {
		$this->form->reg = getFromRequest('reg');
		$this->form->fPass = getFromRequest('fPass');
		$this->form->sPass = getFromRequest('sPass');
		$this->form->mail = getFromRequest('mail');
		
		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->form->reg)) return false;
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->form->reg)) {
			getMessages()->addError('Nie podano loginu');
		}
		if (empty($this->form->fPass)) {
			getMessages()->addError('Nie podano hasła');
		}
		//nie ma sensu walidować dalej, gdy brak wartości
		if (getMessages()->isError()) return false;
		
		// sprawdzenie, czy dane do zarejestrowania się są poprawne
		if (strlen($this->form->fPass)<'6') {
		getMessages()->addError('Hasło musi się składać z przynajmniej 6 znaków.');
		
		}
		if ($this->form->fPass!=$this->form->sPass) {
			getMessages()->addError('Hasła nie są takie same');
		}
		
		$this->register = getDB()->get("users", "login",[
					"login" => $this->form->reg
				]);	
			if ($this->form->reg == $this->register){	
			getMessages()->addError('Użytkownik z takim loginem już istnieje');
			}
			
		$this->email = getDB()->get("users", "email",[
					"email" => $this->form->mail
				]);
			if ($this->form->mail == $this->email){
			getMessages()->addError('Użytkownik z takim mailem już istnieje');
			}
	return ! getMessages()->isError();
	}
	
	

	public function action_registerShow(){
		$this->generateView(); 
	}
	
	public function action_register(){
		if ($this->validate()){
			
			getDB()->insert("users", [
				"login" => $this->form->reg,
				"password" => $this->form->fPass,
				"email" => $this->form->mail
			]);	
			
			$userId = getDB()->id();
			//przypisanie roli nowemu użytkownikowi
			if($userId != NULL && $userId != ""){
				getDB()->insert("user_roles",[
					"idUser" => $userId,
					"idRole" => "2"
				]);
			}
			//zarejestrowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			getMessages()->addError('Poprawnie zalogowano do systemu');
			redirectTo("mainShow");
		} else {
			//rejestracja nieudana => pozostań na stronie logowania
			$this->generateView(); 
		}		
	}	
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		getSmarty()->display('login.tpl');
	}
}