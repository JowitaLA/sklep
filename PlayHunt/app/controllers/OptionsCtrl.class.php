<?php

namespace app\controllers;
use PDOException;
use app\forms\OptionsSearchForm;

class OptionsCtrl{
	private $records;
	private $form;

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new OptionsSearchForm();
	}
	
	
	public function validate() {
		$this->form->login = getFromRequest('sf_login');
		return ! getMessages()->isError();
	}
	
	
	public function action_options(){
		$this->generateView(); 
	}
	
	
	public function action_groupsOption(){
			try{
				$this->records = getDB()->select("groups","*");	 
			}
			catch (PDOException $e){
				 getMessages()->addError('Wystąpił błąd podczas pobierania rekordów z tabeli groups');
					 if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			$this->generateGroupsView(); 
	}


	public function action_usersOption(){
			$this->validate();	
			$search_params = []; 
			
				if ( isset($this->form->login) && strlen($this->form->login) > 0) {
			$search_params['login[~]'] = $this->form->login.'%'; 
			}
			
			$num_params = sizeof($search_params);
			
			if ($num_params > 1) {
					$where = [ "AND" => &$search_params ];
			} else {
				$where = &$search_params;
			}
		$where ["ORDER"] = "login";
		
			try{
				$this->records = getDB()->select("users","*",$where);	 
			}
			catch (PDOException $e){
				 getMessages()->addError('Wystąpił błąd podczas pobierania rekordów z tabeli users');
					 if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			$this->generateUsersView(); 
	}

	
	public function action_bettingsOption(){
			try{
				$this->records = getDB()->select("users",[
				"[><]bettings"=>["idUser"=>"betting_creator"],
				],"*",);	 
			}
			catch (PDOException $e){
				 getMessages()->addError('Wystąpił błąd podczas pobierania rekordów z tabeli bettings');
					 if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			$this->generateBettingsView();
			
			
	}
	
	
	
	public function generateView(){
		getSmarty()->display('OptionsView.tpl');
	}
	
	
	public function generateUsersView(){
		getSmarty()->assign('records',$this->records);  // lista rekordów z bazy danych
		getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->display('ManagementUsersView.tpl');
	}
	
	
	public function generateBettingsView(){
		getSmarty()->assign('records',$this->records);  // lista rekordów z bazy danych
		getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->display('ManagementBettingsView.tpl');
	}
	
	
	public function generateGroupsView(){
		getSmarty()->assign('records',$this->records);  // lista rekordów z bazy danych
		getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->display('ManagementGroupsView.tpl');
	}
}

