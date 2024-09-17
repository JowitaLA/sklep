# Lista Zadań Do Zrobienia
Poniżej przedstawiona jest Lista Zadań do zrobienia, w celu napisania strony internetowej. Lista zadań może się zmieniać. Po ukończeniu danego zadania, w pliku README należy zmienić ``- [ ]`` na ``- [x]``.

## Tło Sklepu
Lista rzeczy, będące w tle tworzenia sklepu

- [ ] Znalezienie i implementacja Frameworka
- [x] Znalezienie i implementacja Stylu -> Bootstrap
- [ ] Połączenie Bazy Danych z Projektem
- [x] Utworzenie Bazy Danych:
    - [x] Produkty
    - [x] Użytkownicy
    - [x] Historia Zamówień
    - [x] Kategorie
    - [x] Rangi
- [ ] Utworzenie Podstawowego Szablonu: 
    - [ ] Head:
        - [ ] Logo: 
            - [x] Interaktywne logo 
            - [ ] Format PNG
            - [ ] Po naciścięciu, przenosi do Strony Głównej
        - [ ] Wyszukiwarka:
            - [x] Miejsce na wpisanie nazwy wyszukiwanego produktu
            - [x] Miejsce na wybór kategorii
            - [ ] Wygenerowanie kategorii z tabeli `contacts` z Bazy Danych
            - [x] Przycisk "Szukaj"
            - [ ] Po uzupełnieniu wszystkiego, wyszukuje z bazy danych:
                - [ ] Produkty, zawierające podany tekst w swojej nazwie (`title` bądź `description` z tabelii `products`)
                - [ ] Produkty z danej kategorii (jak nie została wybrana => jest to `null` => czyli wyszukuje z każdej kategorii)            
        - [ ] Kontakt:
            - [x] Interaktywna ikona telefonu
            - [ ] Po naciścięciu przenosi do podstrony "Kontakt"
        - [ ] Koszyk:
            - [x] Interaktywna ikona koszyka
            - Po naciścięciu ikony koszyka:
                - Gdy są produkty w koszyku:
                    - [ ] Otwiera się miejsce z listą produktów w koszyku użytkownika
                    - [ ] Na dole wyświetla się przycisk "Przejdź do płatności"
                - Gdy nie ma produktów w koszyku:
                    - [ ] Otwiera się miejsce z napisem "Brak przedmiotów w koszyku"
        - [ ] Moje konto:
            - [x] Interaktywna ikona telefonu + napis "Moje Konto"
            Po naciścięciu ikony konta:
                - Gdy użytkownik jest zalogowany:
                    - [ ] Wyświetla się "Moje konto"
                    - [ ] ...
                - Gdy użytkownik nie jest zalogowany:
                    - [ ] ...
    - [ ] Footer:
        - [ ] Dodanie interaktywnego Logo w formacie PNG
        - [x] Dodanie interaktywnej nazwy sklepu
        - W liście `Zakupy`:
            - [x] Dodanie interaktywnego napisu `Konto`
            - [ ] Po naciśnięciu napisu `Konto`:
                - [ ] Jeżeli użytkownik jest zalogowany przenosi na podstronę `Moje Konto`
                - [ ] Jeżeli użytkownik nie jest zalogowany przenosi na podstronę `Rejestracja` 
            - [x] Dodanie interaktywnego napisu `Koszyk`
            - [ ] Po naciśnięciu napisu `Koszyk`, przenosi na podstronę `Mój Koszyk`
            - [x] Dodanie interaktywnego napisu `Polityka prywatności`
            - [ ] Po naciśnięciu napisu `Polityka prywatności`, przenosi na podstronę `Polityka Prywatności`
            - [x] Dodanie interaktywnego napisu `Zwroty i reklamacje`
            - [ ] Po naciśnięciu napisu `Zwroty i reklamacje`, przenosi na podstronę `Zwroty i Reklamacje`
            - [x] Dodanie interaktywnego napisu `Pomoc`
            - [ ] Po naciśnięciu napisu `Pomoc`, przenosi na podstronę `Pomoc`
        - W liście `Informacje`:
            - [x] Dodanie interaktywnego napisu `Sposoby dostawy`
            - [ ] Po naciśnięciu napisu `Sposoby dostawy`, przenosi na podstronę `Sposoby Dostawy`
            - [x] Dodanie interaktywnego napisu `Kategorie`
            - [ ] Po naciśnięciu napisu `Kategorie`, przenosi na podstronę `Kategorie`
            - [x] Dodanie interaktywnego napisu `Regulamin`
            - [ ] Po naciśnięciu napisu `Regulamin`, przenosi na podstronę `Regulamin`
            - [x] Dodanie interaktywnego napisu `O nas`
            - [ ] Po naciśnięciu napisu `O nas`, przenosi na podstronę `O nas`
        - W liście `Kontakt`:
            - [x] Dodanie interaktywnej ikony Facebooka + napisu `Facebook`
            - [x] Po naciśnięciu ikony `Facebook`, przenosi na stronę `www.facebook.com`
            - [x] Dodanie interaktywnej ikony Telefonu + napisu `+48 123 456 789`
            - [x] Po naciśnięciu ikony `telefonu`, dzwoni na podany numer
            - [x] Dodanie interaktywnej ikony Poczty + napisu `Poczta@mail.com`
            - [ ] Po naciśnięciu ikony `poczty`, przenosi na podstronę `Kontakt`

## Podstrony
Lista z danymi podstronami oraz tym, co powinno się w nich znajdować

### Strona główna
- [ ] Utworzenie pliku main.html
- [ ] Dodanie interaktywnych paneli:
    - [x] Panele same się mają po czasie przesuwać
    - [x] Mają wyświetlać się strzałki dzięki którym użytkownik może przesunąć między sobą panele
    - Panele:
        - [x] Utworzenie panelu `Gwarancja niskich cen`
        - [x] Utworzenie opisu panelu `Gwarancji niskich cen`
        - [x] Utworzenie interaktywnego przycisku `Dołącz do nas już teraz` dla panelu `Gwarancja niskich cen`
        - [ ] Po naciśnięciu przycisku z panelu `Gwarancja niskich cen`, użytkownik powinien być przeniesiony na podstronę `Rejestracja`
        - [x] Utworzenie panelu `Nie wiesz co kupić`
        - [x] Utworzenie opisu panelu `Nie wiesz co kupić`
        - [x] Utworzenie interaktywnego przycisku `Nasze Kategorie` dla panelu `Nie wiesz co kupić`
        - [ ] Po naciśnięciu przycisku z panelu `Nie wiesz co kupić`, użytkownik powinien być przeniesiony na podstronę `Kategorie`
        - [x] Utworzenie panelu `O nas`
        - [x] Utworzenie opisu panelu `O nas`
        - [x] Utworzenie interaktywnego przycisku `Czytaj więcej...` dla panelu `O nas`
        - [ ] Po naciśnięciu przycisku z panelu `O nas`, użytkownik powinien być przeniesiony na podstronę `O nas`
- [ ] Dodanie `Nasze kategorie`
    - [ ] ...

### Logowanie

### Zarządzanie
- [ ] lista użytkowników wraz z możliwością edycji
- [ ] lista kategorii wraz z możliwością edycji
- [ ] lista produktów z możliwością edycji

### Koszyk

### Kontakt

### Rejestracja

### Feedback

### Regulamin

### Newsletter

### Kategorie

### Produkty

### Polityka Prywatności

### Zwroty i Reklamacje

### Dostawy

### O Nas
