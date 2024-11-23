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

Utils::addRoute('resetPassShow', 'SignCtrl');               # Wygeneruj widok Prośby o reset hasła
Utils::addRoute('resetPass', 'SignCtrl');                   # Wygeneruj widok resetu hasła
Utils::addRoute('newPassword', 'SignCtrl');                 # Nowe Hasło

Utils::addRoute('resetPassword', 'VerifyCtrl');             # Weryfikacja tokenu na nowe hasło
Utils::addRoute('verify', 'VerifyCtrl');                    # Weryfikacja tokenu rejestracyjnego

Utils::addRoute('logout', 'LogoutCtrl');                    # Wylogowanie (Zakończenie sesji)
Utils::addRoute('logoutShow', 'LogoutCtrl');                # Wylogowanie (Zakończenie sesji)

/*============================/ Produkty /============================*/

Utils::addRoute('productsShow', 'LogoutCtrl');              # Ostatnio dodane produkty
Utils::addRoute('searchProducts', 'ProductsListCtrl');      # Wyszukanie produktów
Utils::addRoute('productDetails', 'ProductDetailsCtrl');    # Szczegóły produktu

/*=============================/ Koszyk /==============================*/

Utils::addRoute('addToCart', 'CartCtrl');           # Dodanie produktu do koszyka
Utils::addRoute('cart', 'CartCtrl');                # Wyświetlenie koszyka
Utils::addRoute('changeCart', 'CartCtrl');          # Wyświetlenie koszyka
Utils::addRoute('deleteCart', 'CartCtrl');          # Wyświetlenie koszyka

/*==========================/ Lista Życzeń /==========================*/

Utils::addRoute('addToWishlist', 'WishlistCtrl');           # Dodanie produktu do Listy Życzeń
Utils::addRoute('removeToWishlist', 'WishlistCtrl');        # Usunięcie produktu z Listy Życzeń
Utils::addRoute('wishlistShow', 'WishlistCtrl');            # Wyświetlenie Listy Życzeń

/*=====================/ Ustawienia Użytkownika /=====================*/


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

/* KATEGORIE */
Utils::addRoute('showCategories',                   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy kategorii
Utils::addRoute('editCategory',                    'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranej kategorii
Utils::addRoute('deleteCategory',                  'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranej kategorii
Utils::addRoute('createCategory',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie wybranego użytkownika
Utils::addRoute('addCategory',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie kategorii
Utils::addRoute('updateCategory',                   'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika

/* DOSTAWY */
Utils::addRoute('showDeliveries',                   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy dostaw
Utils::addRoute('editDelivery',                     'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranej dostawy
Utils::addRoute('deleteDelivery',                   'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranej dostawy
Utils::addRoute('createDelivery',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie wybranego użytkownika
Utils::addRoute('addDelivery',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie dostawy
Utils::addRoute('updateDelivery',                   'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego użytkownika

/* KODY RABATOWE */
Utils::addRoute('showDiscountCodes',                   'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie listy kodów pronmocyjnych
Utils::addRoute('editDiscountCode',                    'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego kodu promocyjnego
Utils::addRoute('deleteDiscountCode',                  'ManagementCtrl', ["zarządzanie"]);     # Usunięcie wybranego kodu promocyjnego
Utils::addRoute('createDiscountCode',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie wybranego kodu promocyjnego
Utils::addRoute('addDiscountCode',                   'ManagementCtrl', ["zarządzanie"]);     # Dodanie kodu promocyjnego
Utils::addRoute('updateDiscountCode',                   'ManagementCtrl', ["zarządzanie"]);     # Edycja wybranego kodu promocyjnego

/* LISTA ŻYCZEŃ */
Utils::addRoute('showWishlists',                    'ManagementCtrl', ["zarządzanie"]);     # Wyświetlenie list życzeń użytkowników (z przełączeniem na użytkowników oraz produkty)

/* EDYCJA PODSTRON */
Utils::addRoute('showContact',                  'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Kontakt"
Utils::addRoute('showAbout',                    'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "O Nas"
Utils::addRoute('showDelivery',                 'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Dostawy"
Utils::addRoute('showHelp',                     'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Pomoc"
Utils::addRoute('showReturn_and_complaints',    'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Zwroty i Reklamacje"
Utils::addRoute('showRodo',                     'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Polityka RODO"
Utils::addRoute('showStatute',                  'ManagementCtrl', ["zarządzanie"]);     # Edycja podstrony "Regulamin"

Utils::addRoute('updateSubpage',                'ManagementCtrl', ["zarządzanie"]);     # Aktualizacja dokumentu txt

/*==========================/ Podstrony /==========================*/

Utils::addRoute('contact',                  'SubpagesCtrl');     # Wyświetlenie podstrony "Kontakt"
Utils::addRoute('about',                    'SubpagesCtrl');     # Wyświetlenie podstrony "O Nas"
Utils::addRoute('delivery',                 'SubpagesCtrl');     # Wyświetlenie podstrony "Dostawy"
Utils::addRoute('help',                     'SubpagesCtrl');     # Wyświetlenie podstrony "Pomoc"
Utils::addRoute('return_and_complaints',    'SubpagesCtrl');     # Wyświetlenie podstrony "Zwroty i Reklamacje"
Utils::addRoute('rodo',                     'SubpagesCtrl');     # Wyświetlenie podstrony "Polityka RODO"
Utils::addRoute('statute',                  'SubpagesCtrl');     # Wyświetlenie podstrony "Regulamin"
