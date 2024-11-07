<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main');  # Podstawowy Widok 
App::getRouter()->setLoginRoute('loginShow');   # Widok, do którego użytkownik jest przenoszony gdy nie posiada permisji

/*===========================/ Główny Widok /===========================*/

Utils::addRoute('main', 'MainCtrl');        # Wygeneruj główny widok

/*============================/ Logowanie /============================*/

Utils::addRoute('loginShow', 'SignCtrl');                   # Wygeneruj widok Logowania
Utils::addRoute('login', 'SignCtrl');                       # Logowanie   (Sprawdzenie danych, rozpoczęcie sesji)

Utils::addRoute('registerShow', 'SignCtrl');                # Wygeneruj widok Rejestracji
Utils::addRoute('register', 'SignCtrl');                    # Rejestracja (Dodanie użytkownika do Bazy Danych)

Utils::addRoute('resetPasswordShow', 'SignCtrl');           # Wygeneruj widok Resetowania Hasła
Utils::addRoute('resetPassword', 'SignCtrl');               # Resetowanie Hasła
Utils::addRoute('verify', 'VerifyCtrl');	                # Weryfikacja tokenu rejestracyjnego

Utils::addRoute('logout', 'LogoutCtrl');                    # Wylogowanie (Zakończenie sesji)
Utils::addRoute('logoutShow', 'LogoutCtrl');                # Wylogowanie (Zakończenie sesji)

Utils::addRoute('productsShow', 'LogoutCtrl');              # Ostatnio dodane produkty
Utils::addRoute('searchProducts','ProductsListCtrl');       # Wyszukanie produktów
Utils::addRoute('productDetails','ProductDetailsCtrl');     # Szczegóły produktu


/*==========================/ Zarządzanie /==========================*/

Utils::addRoute('managementMain',               'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie menu zarządzania

/* PRODUKTY */
Utils::addRoute('showProducts',                 'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy produktów
Utils::addRoute('editProduct',                  'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie podtrony z edycją wybranego produktu
Utils::addRoute('updateProduct',                'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego produktu
Utils::addRoute('addProduct',                   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie podtrony z dodaniem wybranego produktu
Utils::addRoute('createProduct',                'ManagementCtrl', ["zarządzanie"]);     # Dodanie wybranego produktu
Utils::addRoute('changeStatusProduct',          'ManagementCtrl', ["zarządzanie"]);     # Aktywacja/Dezaktywacja wybranego produktu

/* UŻYTKOWNICY */
Utils::addRoute('showUsers',                    'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy użytkowników
Utils::addRoute('editUser',                     'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie podtrony z edycją wybranego użytkownika
Utils::addRoute('updateUser',                   'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('addUser',                      'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie podtrony z dodaniem wybranego użytkownika
Utils::addRoute('createUser',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie wybranego użytkownika
Utils::addRoute('changeStatusUser',             'ManagementCtrl', ["zarządzanie"]);     # Aktywacja/Dezaktywacja wybranego użytkownika

/* ZAMÓWIENIA */
Utils::addRoute('showOrders',                   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy zamówień
Utils::addRoute('editOrder',                    'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego zamówienia
Utils::addRoute('deleteOrder',                  'ManagementCtrl', ["zarządzanie"]);     # Zmiana statusu zamówienia

/* EDYCJA PODSTRON */
Utils::addRoute('editContact',                  'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Kontakt"
Utils::addRoute('editAbout',                    'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "O Nas"
Utils::addRoute('editDelivery',                 'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Dostawy"
Utils::addRoute('editHelp',                     'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Pomoc"
Utils::addRoute('editReturn_and_complaints',    'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Zwroty i Reklamacje"
Utils::addRoute('editRodo',                     'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Polityka RODO"
Utils::addRoute('editStatute',                  'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Regulamin"

/*==========================/ Podstrony /==========================*/

Utils::addRoute('contact',                  'ManagementCtrl');     # Wyświetlenie podstrony "Kontakt"
Utils::addRoute('about',                    'ManagementCtrl');     # Wyświetlenie podstrony "O Nas"
Utils::addRoute('delivery',                 'ManagementCtrl');     # Wyświetlenie podstrony "Dostawy"
Utils::addRoute('help',                     'ManagementCtrl');     # Wyświetlenie podstrony "Pomoc"
Utils::addRoute('return_and_complaints',    'ManagementCtrl');     # Wyświetlenie podstrony "Zwroty i Reklamacje"
Utils::addRoute('rodo',                     'ManagementCtrl');     # Wyświetlenie podstrony "Polityka RODO"
Utils::addRoute('statute',                  'ManagementCtrl');     # Wyświetlenie podstrony "Regulamin"


