<?php

namespace app\controllers;
use app\forms\MainForm;
use PDOException;

class MainCtrl {
	private $records; //rekordy pobrane z bazy danych
	private $choose;
	private $form;
	private $result;
	private $user;
	
	public function __construct(){
		$this->form = new MainForm();
	}
	
	public function validate() {
		//Sprawdzenie czy wszystkie dane są poprawne
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		if ( getMessages()->isError() ) return false;
		
		return ! getMessages()->isError();
	}
	
	public function action_mainShow(){
	
		 try{
				$this->records = getDB()->query("SELECT 
				b.id,
				b.first_group_votes,
				b.second_group_votes,
				b.group_first_id,
				b.group_second_id,
				g.name 
				FROM groups g, bettings b 
				WHERE b.activate = 'T' AND b.group_second_id = g.id OR b.activate = 'T' AND b.group_first_id = g.id ORDER BY b.id");
			 } 
			 
	     catch (PDOException $e){
				 getMessages()->addError('Wystąpił błąd podczas pobierania rekordów z tabeli betting');
					 if (getConf()->debug) getMessages()->addError($e->getMessage());			
			 }
			 $this->generateView();
		 }
		 

		public function action_chooseOne(){
						if ( $this->validate() ){
				try {
						$choose = getDB()->get("bettings",["first_group_votes"],[
							"id" => $this->form->id
						]);
					} catch (PDOException $e){
						getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
						if (getConf()->debug) getMessages()->addError($e->getMessage());			
						}
						
				$this->result = $choose['first_group_votes']+'1';				
				
				try {
				getDB()->update("bettings",
				["first_group_votes" => $this->result,
				], [
				"id" => $this->form->id
				]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
				
		forwardTo('mainShow');
	}
}
	
	public function action_chooseTwo(){
						if ( $this->validate() ){
				try {
						$choose = getDB()->get("bettings",["second_group_votes"],[
							"id" => $this->form->id
						]);
					} catch (PDOException $e){
						getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
						if (getConf()->debug) getMessages()->addError($e->getMessage());			
						}
						
				$this->result = $choose['second_group_votes'] + '1';				
				
				try {
				getDB()->update("bettings",
				["second_group_votes" => $this->result,
				], [
				"id" => $this->form->id
				]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
				
		forwardTo('mainShow');
	}
}
	public function generateView(){
		getSmarty()->assign('zaklady',$this->records);  // lista rekordów z bazy danych
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		
		getSmarty()->assign('page_title','Play Hunt');
		getSmarty()->assign('page_description','Witamy na naszej stronie bukmacherskiej Play Hunt, czyli na
												stronie numer 1 w Polsce poświęconej grze Hunt Showdown oraz na
												aktualnych tam turniejach. <br/>Zagłosuj na swój ulubiony team i kibicuj im w nadchodzących walkach<br/> 
												a może właśnie to on wygra a ty zgarniesz pieniądze!');
		getSmarty()->assign('page_header','HUNT');
		getSmarty()->assign('page_footer','Wszystkie tutaj zakłady są wpełni licencjonowane i legalne.
											Zarejestruj się w dowolnym czasie i ciesz się z fantastycznej i bezpiecznej gry.');
		
		getSmarty()->display('MainView.tpl');	
	}
}
