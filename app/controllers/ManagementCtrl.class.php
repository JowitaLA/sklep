<?php

namespace app\controllers;

use core\App;
use PDOException;



class ManagementCtrl
{
    public function action_managementMain() {
        

        $this->generateView();
    }

    public function generateView()
    {
        // App::getSmarty()->assign('product', $this->product);
        // App::getSmarty()->assign('images', $this->images);  // Przekazywanie obrazów do widoku
        // App::getSmarty()->assign('page_title', $this->product['name']);  // Tytuł strony ("Yups")
        
        App::getSmarty()->display('ManagementView.tpl');
    }
}
