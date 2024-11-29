<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use PDOException;



class SubpagesCtrl
{
/* DODATKOWE PODSTRONY */
public function action_feedback(){
    // Przekaż dane do widoku
    App::getSmarty()->assign('page_title', "Feedback");
    App::getSmarty()->display('FeedbackView.tpl');
}

public function action_submitFeedback(){
    $feedback["name"] = ParamUtils::getFromRequest('name')??null;
    $feedback["mail"] = ParamUtils::getFromRequest('email')??null;
    $feedback["delivery-rating"] = ParamUtils::getFromRequest('delivery-rating')??null;
    $feedback["payment-rating"] = ParamUtils::getFromRequest('payment-rating')??null;
    $feedback["order-rating"] = ParamUtils::getFromRequest('order-rating')??null;
    $feedback["search-rating"] = ParamUtils::getFromRequest('search-rating')??null;
    $feedback["site-rating"] = ParamUtils::getFromRequest('site-rating')??null;
    $feedback["style-rating"] = ParamUtils::getFromRequest('style-rating')??null;
    $feedback["message"] = ParamUtils::getFromRequest('message')??null;

    try{
        App::getDB()->insert("feedback", [
            "name" => $feedback["name"],
            "email" => $feedback["mail"],
            "delivery_rating" => $feedback["delivery-rating"],
            "payment_rating" => $feedback["payment-rating"],
            "order_rating" => $feedback["order-rating"],
            "search_rating" => $feedback["search-rating"],
            "site_rating" => $feedback["site-rating"],
            "style_rating" => $feedback["style-rating"],
            "message" => $feedback["message"],
        ]);
        App::getMessages()->addMessage(new \core\Message("Dziękujęmy za Twoją opinię!", \core\Message::INFO));
    }
    catch(PDOException $e){
        App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas zapisu Twojej opinii. Proszę, skontaktuj się z nami w celu poinformowania a zaistniałej sytuacji.", \core\Message::ERROR));
    }

    $this->action_feedback();
}

public function action_newsletter(){
    // Przekaż dane do widoku
    App::getSmarty()->assign('page_title', "Newsletter");
    App::getSmarty()->display('NewsletterView.tpl');
}

public function action_submitNewsletter(){
    $mail = ParamUtils::getFromRequest('email')??null;
    try{
        App::getDB()->insert("newsletter", [
            "mail" => $mail
        ]);
        App::getMessages()->addMessage(new \core\Message("Dziękujęmy za zapisanie się do naszego newslettera!", \core\Message::INFO));
    }
    catch(PDOException $e){
        App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas zapisania się do naszego newslettera. Proszę, skontaktuj się z nami w celu poinformowania a zaistniałej sytuacji.", \core\Message::ERROR));
    }
    
    $this->action_newsletter();
}

public function action_deleteNewsletter(){
    $feedback = [
        'description' => 'assets/pages/contact.txt',
    ];

    // Przekaż dane użytkownika do widoku
    App::getSmarty()->assign('feedback', $feedback);
    App::getSmarty()->assign('page_title', "Feedback");
    App::getSmarty()->display('FeedbackView.tpl');
}

/* EDYTOWALNE PODSTRONY */
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

    public function action_payments(){
        $subpage = [
            'description' => 'assets/pages/payments.txt',
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->assign('page_title', "Metody Płatności");
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
