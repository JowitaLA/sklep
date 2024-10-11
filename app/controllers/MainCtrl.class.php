<?php

namespace app\controllers;


use core\App;
use core\Utils;



class MainCtrl {
    
    public function action_main() {
        App::getSmarty()->display("MainView.tpl");     
    }
    

    public function generateView(){
		App::getSmarty()->assign('page_title','Yups');

		App::getSmarty()->display('MainView.tpl');	
	}
}

