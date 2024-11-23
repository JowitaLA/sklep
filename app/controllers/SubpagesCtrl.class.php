<?php

namespace app\controllers;

use core\App;
use PDOException;



class SubpagesCtrl
{
    public function action_contact(){
        $subpage = [
            'description' => 'assets/pages/contact.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Kontakt");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_about(){
        $subpage = [
            'description' => 'assets/pages/about.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "O Nas");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_delivery(){
        $subpage = [
            'description' => 'assets/pages/delivery.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Dostawy");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_help(){
        $subpage = [
            'description' => 'assets/pages/help.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Pomoc");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_return_and_complaints(){
        $subpage = [
            'description' => 'assets/pages/return_and_complaints.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Zwrroty i Reklamacje");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_rodo(){
        $subpage = [
            'description' => 'assets/pages/rodo.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Polityka Prywatności");
        App::getSmarty()->display('SubpagesView.tpl');
    }

    public function action_statute(){
        $subpage = [
            'description' => 'assets/pages/statute.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Regulamin");
        App::getSmarty()->display('SubpagesView.tpl');
    }
}
