<?php

namespace app\controllers;

use app\forms\OptionsBettingForm;
use DateTime;
use PDOException;

class OptionsBettingCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new OptionsBettingForm();
	}
	
	
	/* SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRÓW */
//				- sprawdź czy id są aktualne
//				- sprawdź czy już ktoś o takim id nie walczy w innych aktualnych zakładach
//	
	
	public function validateSave() {
		//Sprawdzenie czy wszystkie dane są poprawne
		$this->form->id		 	=	getFromRequest('id',true,'Błędne wywołanie aplikacji');
		$this->form->creator	= 	getFromRequest('creator',true,'Błędne wywołanie aplikacji');
		$this->form->firstID	= 	getFromRequest('firstID',true,'Błędne wywołanie aplikacji');
		$this->form->secondID	= 	getFromRequest('secondID',true,'Błędne wywołanie aplikacji');
		$this->form->whenEnd	= 	getFromRequest('whenEnd',true,'Błędne wywołanie aplikacji');
		
		if ( getMessages()->isError() ) return false;

		//Sprawdzenie czy jakieś dane nie są wpisane
		if (empty(trim($this->form->creator))) {
			getMessages()->addError('Wprowadź numer założyciela zakładu');
		}
		if (empty(trim($this->form->firstID))) {
			getMessages()->addError('Wprowadź numer pierwszej drużyny');
		}
		if (empty(trim($this->form->secondID))) {
			getMessages()->addError('Wprowadź numer drugiej drużyny');
		}
		if (empty(trim($this->form->whenEnd))) {
			getMessages()->addError('Wprowadź datę zakończenia zakładu');
		}

		if ( getMessages()->isError() ) return false; //jeżeli są, zwróć błąd
		
		//sprawdź czy id są numerami
		
		if (! getMessages()->isError()) {
			
		if (! is_numeric ($this->form->secondID)) {
				getMessages()->addError('Numer drugiej drużyny nie jest liczbą');
			}
			
		if (! is_numeric ($this->form->firstID)) {
				getMessages()->addError('Numer pierwszej drużyny nie jest liczbą');
			}
		}
		
		
		return ! getMessages()->isError();
	}
	
	
	/* DO EDYCJI UŻYTKOWNIKA -> SPRAWDZENIE WALIDACJI PRZY POBRANIU PARAMETRA ID */
// >> DODATKOWO - gdy operator edytuje/tworzy automatycznie ma się wpisać jego id

	public function validateEdit() {
		//Sprawdzenie czy id jest poprawne
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	
	/* DO STWORZENIA NOWEGO UŻYTKOWNIKA -> BRAK PARAMETRÓW, "WYSŁANIE" PUSTEGO PARAMETRA ID */
	
	public function action_bettingNew(){
		$this->generateView();
	}
	
	
	/* DO EDYTOWANIA -> PRZEPISANIE DANYCH USERA DO TABELI $FORM */
	
	public function action_bettingEdit(){
		if ( $this->validateEdit() ){
			try {
				//Weź z tabeli wiersz z podanym id użytkownika
				$record = getDB()->get("bettings", "*",[
					"id" => $this->form->id
				]);
				
				//Zedytuj dane użytkownika jeżeli taki istnieje
				$this->form->id			=	$record['id'];
				$this->form->creator 	=	$record['betting_creator'];
				$this->form->firstID	=	$record['group_first_id'];
				$this->form->secondID	=	$record['group_second_id'];
				$this->form->whenEnd	=	$record['when_end'];
				$this->form->activate	=	$record['activate'];
				
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		$this->generateView();		
	}
	
	
	/*   "USUNIĘCIE" uŻYTKOWNIKA (DEZAKTYWACJA POPRZEZ ACTIVATE F) */
// >> DODATKOWO - wyzeruj użytkownikom głosy
	
	public function action_bettingDelete(){
		if ( $this->validateEdit() ){
			try {
				//Zaktualizuj w wierszu z tabeli o podanym id wartość activate na false 
				$record = getDB()->update("bettings", ["activate"=>"F"],[
					"id" => $this->form->id
				]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		//Wygeneruj widok.
		forwardTo('bettingsOption');
	}
	
	
	/* wPISANIE ZMIAN DO BAZY DANYCH */
// >> DODATKOWO - dodaj stronnicowanie
	
	public function action_bettingSave(){
		if ($this->validateSave()) {
			
			try {
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20 (zaczątki stronnicowania)
					$count = getDB()->count("bettings");
					if ($count <= 20) {
						getDB()->insert("bettings", [
							"betting_creator" 	=> $this->form->creator,
							"group_first_id"	=> $this->form->firstID,
							"group_second_id"	=> $this->form->secondID,
							"when_end"			=> $this->form->whenEnd,
						]);
						
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				
				//JEŻELI NIE MA ID UŻYTKOWNIKA (do edycji usera)
					getDB()->update("bettings", [
							"betting_creator" 	=> $this->form->creator,
							"group_first_id"	=> $this->form->firstID,
							"group_second_id"	=> $this->form->secondID,
							"when_end"			=> $this->form->whenEnd,
					], [ 
							"id" 				=> $this->form->id
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			//Po aktualizacji bazy danych wróć do listy użytkowników
			forwardTo('bettingsOption');

		} else {
			$this->generateView();
		}		
	}
	
	
	/* WYGENEROWANIE WIDOKU */
	
	public function generateView(){
		getSmarty()->assign('form',$this->form);	// dane formularza dla widoku
		getSmarty()->display('BettingEdit.tpl');
	}
	
}