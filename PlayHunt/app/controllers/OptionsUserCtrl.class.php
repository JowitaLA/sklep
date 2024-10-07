<?php

namespace app\controllers;

use app\forms\OptionsUserForm;
use app\forms\OptionsSearchForm;
use DateTime;
use PDOException;

class OptionsUserCtrl{
	private $form;
	private $search;
	
	public function __construct(){
		$this->form = new OptionsUserForm();
		$this->search = new OptionsSearchForm();
	}
	
	
	/* SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRÓW */
	
	public function validateSave() {
		//Sprawdzenie czy wszystkie dane są poprawne
		$this->form->idUser = getFromRequest('idUser',true,'Błędne wywołanie aplikacji');
		$this->form->login = getFromRequest('login',true,'Błędne wywołanie aplikacji');
		$this->form->password = getFromRequest('password',true,'Błędne wywołanie aplikacji');
		$this->form->email = getFromRequest('email',true,'Błędne wywołanie aplikacji');
		$this->search->users = getFromRequest('users',true,'Błędne wywołanie aplikacji');
		
		if ( getMessages()->isError() ) return false;

		//Sprawdzenie czy jakieś dane nie są wpisane
		if (empty(trim($this->form->login))) {
			getMessages()->addError('Wprowadź nazwę użytkownika');
		}
		if (empty(trim($this->form->password))) {
			getMessages()->addError('Wprowadź hasło użytkownika');
		}
		if (empty(trim($this->form->email))) {
			getMessages()->addError('Wprowadź e-maila użytkownika');
		}

		if ( getMessages()->isError() ) return false; //jeżeli są, zwróć błąd
		
		return ! getMessages()->isError();
	}
	
	
	/* DO EDYCJI UŻYTKOWNIKA -> SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRA IDUSER */
	
	public function validateEdit() {
		//Sprawdzenie czy id jest poprawne
		$this->form->idUser = getFromRequest('idUser',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	
	/* DO STWORZENIA NOWEGO UŻYTKOWNIKA -> BRAK PARAMETRÓW, "WYSŁANIE" PUSTEGO PARAMETRA IDUSER */
	
	public function action_userNew(){
		$this->generateView();
	}
	
	
	/* DO EDYTOWANIA -> PRZEPISANIE DANYCH USERA DO TABELI $FORM */
	
	public function action_userEdit(){
		if ( $this->validateEdit() ){
			try {
				//Weź z tabeli wiersz z podanym id użytkownika
				$record = getDB()->get("users", "*",[
					"idUser" => $this->form->idUser
				]);
				
				//Zedytuj dane użytkownika jeżeli taki istnieje
				$this->form->idUser		=	$record['idUser'];
				$this->form->login 		=	$record['login'];
				$this->form->password	=	$record['password'];
				$this->form->email		=	$record['email'];
				
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		$this->generateView();		
	}
	
	
	/*   "USUNIĘCIE" uŻYTKOWNIKA (DEZAKTYWACJA POPRZEZ ACTIVATE F) */
	
	public function action_userDelete(){
		if ( $this->validateEdit() ){
			try {
				//Zaktualizuj w wierszu z tabeli o podanym id wartość activate na false 
				$record = getDB()->update("users", ["activate"=>"F"],[
					"idUser" => $this->form->idUser
				]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		forwardTo('usersOption');
	}
	
	
	/* wPISANIE ZMIAN DO BAZY DANYCH */
	
	public function action_userSave(){
		if ($this->validateSave()) {
			try {
				//JEŻELI JEST ID UŻYTKOWNIKA (do tworzenia nowego usera)
				if ($this->form->idUser == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20 (zaczątki stronnicowania)
					$count = getDB()->count("users");
					if ($count <= 20) {
						getDB()->insert("users", [
							"login" 	=>	 $this->form->login,
							"password" 	=>	 $this->form->password,
							"email" 	=>	 $this->form->email,
						]);
						
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				
				//JEŻELI NIE MA ID UŻYTKOWNIKA (do edycji usera)
					getDB()->update("users", [
						"login" 	=>	 $this->form->login,
						"password" 	=>	 $this->form->password,
						"email" 	=>	 $this->form->email,
					], [ 
						"idUser" => $this->form->idUser
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			//Po aktualizacji bazy danych wróć do listy użytkowników
			forwardTo('usersOption');

		} else {
			$this->generateView();
		}		
	}
	
	
	/* WYGENEROWANIE WIDOKU */
	
	public function generateView(){
		getSmarty()->assign('form',$this->form);	// dane formularza dla widoku
		getSmarty()->display('UserEdit.tpl');
	}
	
}