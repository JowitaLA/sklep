<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main');  # Podstawowy Widok 
App::getRouter()->setLoginRoute('loginShow');   # Widok, do którego użytkownik jest przenoszony gdy nie posiada permisji

/*===========================/ Główny Widok /===========================*/

Utils::addRoute('main', 'MainCtrl');        # Wygeneruj główny widok

/*===========================/ Logowanie /===========================*/

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

Utils::addRoute('managementMain','ManagementCtrl', ["zarządzanie"]);     # Szczegóły produktu


