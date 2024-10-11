<?php

namespace app\controllers;

use app\forms\OptionsGroupForm;
use DateTime;
use PDOException;

class OptionsGroupCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new OptionsGroupForm();
	}
	
	
	/* SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRÓW */
	
	public function validateSave() {
		//Sprawdzenie czy wszystkie dane są poprawne
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		$this->form->name = getFromRequest('name',true,'Błędne wywołanie aplikacji');
		
		if ( getMessages()->isError() ) return false;

		//Sprawdzenie czy jakieś dane nie są wpisane
		if (empty(trim($this->form->name))) {
			getMessages()->addError('Wprowadź nazwe drużyny');
		}

		if ( getMessages()->isError() ) return false; //jeżeli są, zwróć błąd
		
		return ! getMessages()->isError();
	}
	
	
	/* DO EDYCJI UŻYTKOWNIKA -> SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRA IDUSER */
	
	public function validateEdit() {
		//Sprawdzenie czy id jest poprawne
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	
	/* DO STWORZENIA NOWEGO UŻYTKOWNIKA -> BRAK PARAMETRÓW, "WYSŁANIE" PUSTEGO PARAMETRA IDUSER */
	
	public function action_groupNew(){
		$this->generateView();
	}
	
	
	/* DO EDYTOWANIA -> PRZEPISANIE DANYCH USERA DO TABELI $FORM */
	
	public function action_groupEdit(){
		if ( $this->validateEdit() ){
			try {
				//Weź z tabeli wiersz z podanym id użytkownika
				$record = getDB()->get("groups", "*",[
					"id" => $this->form->id
				]);
				
				//Zedytuj dane użytkownika jeżeli taki istnieje
				$this->form->id			=	$record['id'];
				$this->form->name		=	$record['name'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		$this->generateView();		
	}
	
	
	/*   "USUNIĘCIE" uŻYTKOWNIKA (DEZAKTYWACJA POPRZEZ ACTIVATE F) */
	
	public function action_groupDelete(){
		if ( $this->validateEdit() ){
			try {
				//Zaktualizuj w wierszu z tabeli o podanym id wartość activate na false 
				$record = getDB()->update("groups", ["activate"=>"F"],[
					"id" => $this->form->id
				]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		forwardTo('groupsOption');
	}
	
	
	/* wPISANIE ZMIAN DO BAZY DANYCH */
	
	public function action_groupSave(){
		if ($this->validateSave()) {
			try {
				//JEŻELI JEST ID UŻYTKOWNIKA (do tworzenia nowego usera)
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20 (zaczątki stronnicowania)
					$count = getDB()->count("groups");
					if ($count <= 20) {
						getDB()->insert("groups", [
							"name" => $this->form->name,
						]);
						
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else {
				//JEŻELI NIE MA ID UŻYTKOWNIKA (do edycji usera)
					getDB()->update("groups",["name"=>$this->form->name],["id" => $this->form->id]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			//Po aktualizacji bazy danych wróć do listy użytkowników
			forwardTo('groupsOption');

		} else {
			$this->generateView();
		}		
	}
	
	
	/* WYGENEROWANIE WIDOKU */
	
	public function generateView(){
		getSmarty()->assign('form',$this->form);	// dane formularza dla widoku
		getSmarty()->display('GroupEdit.tpl');
	}
	
}