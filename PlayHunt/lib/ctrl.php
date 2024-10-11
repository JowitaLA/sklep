<?php
require_once 'init.php';

getRouter()->setDefaultRoute('mainShow'); 							// akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); 								// akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

/*=================================================*/


getRouter()->addRoute('mainShow',    	'MainCtrl');									//główna ścieżka/akcja strony Play Hunt
getRouter()->addRoute('options',    	'OptionsCtrl',		  ['admin','operator']);	//główna ścieżka/akcja opcji

getRouter()->addRoute('chooseOne',    	'MainCtrl'); 									//oddanie głosu na 1 drużynę
getRouter()->addRoute('chooseTwo',    	'MainCtrl');									//oddanie głosu na 2 drużynę

/* ZARZĄDZANIE ROLAMI, WALKAMI, DRUŻYNAMI I UŻYTKOWNIKAMI */

getRouter()->addRoute('groupsOption',   'OptionsCtrl',        ['admin','operator']);	//główna ścieżka/akcja grupy
getRouter()->addRoute('groupEdit',		'OptionsGroupCtrl',   ['admin','operator']);	//edycja grupy
getRouter()->addRoute('groupNew',		'OptionsGroupCtrl',   ['admin','operator']);	//stworzenie nowej grupy
getRouter()->addRoute('groupSave',		'OptionsGroupCtrl',   ['admin','operator']);	//"zapisanie" danych grupy do bazy danych
getRouter()->addRoute('groupDelete',	'OptionsGroupCtrl',   ['admin','operator']);	//dezaktywacja grupy


getRouter()->addRoute('bettingsOption',	'OptionsCtrl', 		  ['admin','operator']);	//główna ścieżka/akcja walk
getRouter()->addRoute('bettingEdit',	'OptionsBettingCtrl', ['admin','operator']);	//edycja walki
getRouter()->addRoute('bettingNew',		'OptionsBettingCtrl', ['admin','operator']);	//stworzenie nowej walki
getRouter()->addRoute('bettingSave',	'OptionsBettingCtrl', ['admin','operator']);	//"zapisanie" danych walki do bazy danych
getRouter()->addRoute('bettingDelete',	'OptionsBettingCtrl', ['admin','operator']);	//dezaktywacja walki

getRouter()->addRoute('usersOption',    'OptionsCtrl',		  ['admin']);				//główna ścieżka/akcja użytkowników
getRouter()->addRoute('userEdit',		'OptionsUserCtrl',	  ['admin']);				//edycja użytkownika
getRouter()->addRoute('userNew',		'OptionsUserCtrl', 	  ['admin']);				//stworzenie nowego użytkownika
getRouter()->addRoute('userSave',		'OptionsUserCtrl', 	  ['admin']);				//"zapisanie" użytkownika grupy do bazy danych	
getRouter()->addRoute('userDelete',		'OptionsUserCtrl', 	  ['admin']);				//dezaktywacja użytkownika		

/* ŚCIEŻKI/AKCJE POŚWIĘCONE NA LOGOWANIE I REJESTRACJĘ */
getRouter()->addRoute('loginShow',		'LoginCtrl');									//pokazanie widoku logowania
getRouter()->addRoute('login',     		'LoginCtrl');									//logowanie w systemie
getRouter()->addRoute('registerShow',	'RegisterCtrl');								//pokazanie widoku rejestracji
getRouter()->addRoute('register',		'RegisterCtrl');								//rejestracja w systemie
getRouter()->addRoute('logout',      	'LoginCtrl', ['user','admin']);					//umożliwienie wylogowania z systemu

getRouter()->go(); //wybiera i uruchamia odpowiednią ścieżkę na podstawie parametru 'action';