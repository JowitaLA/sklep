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

Utils::addRoute('managementMain',   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie menu zarządzania

/* PRODUKTY */
Utils::addRoute('showProducts',     'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy użytkowników
Utils::addRoute('editProduct',      'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('changeStatusProduct',    'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego użytkownika
Utils::addRoute('createProduct',    'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego użytkownika
Utils::addRoute('addProduct',       'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego użytkownika

/* ZAMÓWIENIA */
Utils::addRoute('showOrders',       'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy użytkowników
Utils::addRoute('editOrder',        'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('deleteOrder',      'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego użytkownika

/* UŻYTKOWNICY */
Utils::addRoute('showUsers',        'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy użytkowników
Utils::addRoute('editUser',         'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('updateUser',       'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('addUser',          'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('createUser',       'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika
Utils::addRoute('changeStatusUser', 'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego użytkownika



