# Lista Zadań Do Zrobienia
Poniżej przedstawiona jest Lista Zadań do zrobienia, w celu napisania strony internetowej. Lista zadań może się zmieniać. Po ukończeniu danego zadania, w pliku README należy zmienić ``- [ ]`` na ``- [x]``.

### Spis Treści
1. [Tło sklepu](https://github.com/JowitaLA/sklep?tab=readme-ov-file#t%C5%82o-sklepu) 
2. [Strona Główna](https://github.com/JowitaLA/sklep?tab=readme-ov-file#strona-g%C5%82%C3%B3wna)
3. [Newsletter](https://github.com/JowitaLA/sklep?tab=readme-ov-file#newsletter)
4. [Feedback](https://github.com/JowitaLA/sklep?tab=readme-ov-file#feedback)
5. [Logowanie](https://github.com/JowitaLA/sklep?tab=readme-ov-file#logowanie)
6. [Rejestracja](https://github.com/JowitaLA/sklep?tab=readme-ov-file#rejestracja)
7. [Zarządzanie](https://github.com/JowitaLA/sklep?tab=readme-ov-file#zarz%C4%85dzanie)
8. [Lista Produktów](https://github.com/JowitaLA/sklep?tab=readme-ov-file#lista-produkt%C3%B3w)
9. [Kategorie](https://github.com/JowitaLA/sklep?tab=readme-ov-file#kategorie)
10. [Produkty](https://github.com/JowitaLA/sklep?tab=readme-ov-file#produkty)
11. [Koszyk](https://github.com/JowitaLA/sklep?tab=readme-ov-file#koszyk)
12. [Historia Zamówień](https://github.com/JowitaLA/sklep?tab=readme-ov-file#historia-zam%C3%B3wie%C5%84)
13. [Płatność](https://github.com/JowitaLA/sklep?tab=readme-ov-file#p%C5%82atno%C5%9B%C4%87)
14. [O nas](https://github.com/JowitaLA/sklep?tab=readme-ov-file#o-nas)
15. [Kontakt](https://github.com/JowitaLA/sklep?tab=readme-ov-file#kontakt)
16. [Dostawy](https://github.com/JowitaLA/sklep?tab=readme-ov-file#dostawy)
17. [Regulamin](https://github.com/JowitaLA/sklep?tab=readme-ov-file#regulamin)
18. [Polityka Prywatności](https://github.com/JowitaLA/sklep?tab=readme-ov-file#polityka-prywatno%C5%9Bci)
19. [Zwroty i Reklamacje](https://github.com/JowitaLA/sklep?tab=readme-ov-file#zwroty-i-reklamacje)

## Tło Sklepu
Lista rzeczy, będące w tle tworzenia sklepu

- [x] Znalezienie i implementacja Frameworka (Amelia Framework)
- [x] Znalezienie i implementacja Stylu -> Bootstrap
    - [x] Utworzenie przycisku zmiany motywu
- [x] Połączenie Bazy Danych z Projektem
- [ ] Utworzenie Bazy Danych:
    - [x] Produkty
    - [x] Użytkownicy
    - [x] Historia Zamówień
    - [x] Kategorie
    - [x] Rangi
    - [?] Kody Rabatowe
    - [ ] Feedback
    - [ ] Newsletter
- [ ] Utworzenie Podstawowego Szablonu: 
    - [ ] Head:
        - [ ] Logo: 
            - [x] Interaktywne logo 
            - [x] Format PNG
            - [x] Po naciścięciu, przenosi do Strony Głównej
        - [ ] Wyszukiwarka:
            - [x] Miejsce na wpisanie nazwy wyszukiwanego produktu
            - [x] Miejsce na wybór kategorii
            - [ ] Wygenerowanie kategorii z tabeli `contacts` z Bazy Danych
            - [x] Przycisk `Szukaj`
            - [ ] Po uzupełnieniu wszystkiego, wyszukuje z bazy danych:
                - [ ] Produkty, zawierające podany tekst w swojej nazwie (`title` bądź `description` z tabelii `products`)
                - [ ] Produkty z danej kategorii (jak nie została wybrana => jest to `null` => czyli wyszukuje z każdej kategorii)            
        - [ ] Kontakt:
            - [x] Interaktywna ikona telefonu
            - [ ] Po naciścięciu przenosi do podstrony `Kontakt`
        - [ ] Koszyk:
            - [x] Interaktywna ikona koszyka
            - Po naciścięciu ikony koszyka:
                - Gdy są produkty w koszyku:
                    - [ ] Otwiera się miejsce z listą produktów w koszyku użytkownika
                    - [ ] Na dole wyświetla się przycisk `Otwórz koszyk`
                - Gdy nie ma produktów w koszyku:
                    - [ ] Otwiera się miejsce z napisem `Brak przedmiotów w koszyku`
        - [ ] Moje konto:
            - [x] Interaktywna ikona telefonu + napis `Moje Konto`
            - Po naciścięciu ikony konta:
                - Gdy użytkownik jest zalogowany:
                    - [ ] Wyświetla się interaktywny napis `Moje Dane`
                    - [ ] Po naciścięciu napisu, użytkownik przenoszony jest na podstronę `Dane`
                    - [ ] Wyświetla się interaktywny napis `Mój Koszyk`
                    - [ ] Po naciścięciu napisu, użytkownik przenoszony jest na podstronę `Koszyk`
                    - [ ] Wyświetla się interaktywny napis `Historia Zamówień`
                    - [ ] Po naciścięciu napisu, użytkownik przenoszony jest na podstronę `Historia Zamówień`
                - Gdy użytkownik nie jest zalogowany:
                    - [x] Wyświetla się przycisk `Zaloguj się`
                    - [x] Po naciścięciu napisu, użytkownik przenoszony jest na podstronę `Logowania` 
                    - [x] Wyświetla się interaktywny napis `Nie masz jeszcze konta? Zarejestruj się`
                    - [x] Po naciścięciu napisu, użytkownik przenoszony jest na podstronę `Rejestracja` 
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
- [x] Utworzenie pliku main.html
- [] Dodanie interaktywnych paneli:
    - [x] Panele same się mają po czasie przesuwać
    - [x] Mają wyświetlać się strzałki dzięki którym użytkownik może przesunąć między sobą panele
    - W dostępnych panelach:
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
- [ ] Dodanie `Nasze Kategorie`
    - [ ] Wygenerowanie interaktywnych ikon i nazw na podstawie `icon` i `title` z tabeli `categories` z Bazy Danych
    - [ ] Po naciśnięciu ikon, użytkownik przenoszony jest na podstronę z produktami, z danej kategorii (podstronę `Produkty`)
- [ ] Dodanie `Ostatnio Dodane Produkty`
    - [ ] Wygenerowanie 12 ostatnio dodanych produktów na podstawie `created_at` z tabeli `products` z Bazy Danych
    - [ ] Po naciśnięciu produktu, otwiera się podstrona z danym produktem

### Newsletter
- [ ] Utworzenie pliku newsletter.html
- [ ] Stworzenie wielkiego tytułu strony `Zapisz się do Newsettera`
- [ ] Dodanie krótniego opisu
- [ ] Dodanie miejsca na wpisanie maila
- [ ] Dodanie przycisku na potwierdzenie i przesłanie danych do tabeli `newsletter` w Bazie Danych
- [ ] Dodanie alertów (Np. Że E-mail został dodany)

### Feedback
- [ ] Utworzenie pliku feedback.html
- [ ] Stworzenie wielkiego tytułu strony `Zostaw Nam swoją opinię`
- [ ] Stworzenie kilku pytań z odpowiedziami do wyboru
- [ ] Dodanie przycisku `Wyślij Feedback`
- [ ] Zapisanie odpowiedzi w tabeli `feedback` w Bazie Danych
- [ ] Dodanie możliwych alertów (Np. Zaloguj się, Wysłano Twoją Opinię bądź Zaktualizowano Twoją opinię)
- [ ] Sprawdzenie czy użytkownik jest zalogowany

### Logowanie
- [x] Utworzenie pliku login.html
- [x] Utworzenie miejsca na wpisanie loginu
- [x] Utworzenie miejsca na wpisanie hasła
- [x] Utworznie przycisku `Zaloguj`
- [x] Sprawdzenie danych wpisanych przez użytkownika z Bazą Danych
- [x] Dodanie alertów (np. Źle wpisane hasło bądź login)

### Rejestracja
- [ ] Utworzenie pliku register.html
- [ ] Utworzenie miejsca na wpisanie loginu
- [ ] Utworzenie miejsca na wpisanie maila
- [ ] Utworzenie miejsca na wpisanie hasła
- [ ] Utworzenie miejsca na powtórzenie hasła
- [ ] Utworznie przycisku `Zarejestruj`
- [ ] Sprawdzenie danych wpisanych przez użytkownika z Bazą Danych
- [ ] Dodanie alertów (Np. Źle wpisane hasło bądź zajęty login)

### Zarządzanie
- [ ] Utworzenie pliku management.html
- [ ] Utworzenie listy użytkowników 
- [ ] Dodanie możliwości edycji użytkowników
- [ ] Utworzenie listy kategorii
- [ ] Dodanie możliwości edycji kategorii
- [ ] Utworzenie listy produktów
- [ ] Dodanie możliwości edycji produktów

### Lista Produktów
- [ ] Dodanie pliku products_list.html
- [ ] Wygenerowanie produktów z tego, co podał użytkownik: z nazwy, kategorii bądź daty
- [ ] Dodanie stronnicowania (maksymalna ilośc produktów np. 28 na stronę)

### Kategorie
- [ ] Dodanie pliku categories.html
- [ ] Wyświetlenie wszystkich kategorii z tabeli `categories` z Bazy Danych
- [ ] Wyświetlenie ich wszystkich tytułów i opisów
- [ ] Dodanie do każdej kategorii interakcji, przenoszącej do wszystkich przedmiotów, które posiadają kategorię wybraną przez użytkownika

### Produkty
- [ ] Utworzenie pliku product.html
- [ ] Wygenerowanie tytułu produktu
- [ ] Wygenerowanie zdjęcia produktu
- [ ] Wygenerowanie opisu produktu
- [ ] Dodanie przycisku `Kup`/`Dodaj do koszyka`
- [ ] Dodanie możliwości opini
- [ ] Dodanie produktu do koszyka użytkownika po naciśnięciu przycisku `Kup`/`Dodaj do koszyka`

### Koszyk
- [ ] Utworzenie pliku basket.html
- Gdy użytkownik dodał jakiś produkt do koszyka:
- [ ] Wygenerowanie wszystkich produktów dodanych przez użytkownika
- [ ] Dodanie miejsca do wpisania kodu
- [ ] Sprawdzenie kodu wpisanego przez użytkownika z tabelą `codes` w Bazie Danych
- [ ] Dodanie alertów (np. z wpisaniem błędnego kodu)
- [ ] Dodanie na dole przycisku `Przejdź do płatności`
- Gdy użytkownik nie dodał produktu:
- [ ] Wyświetlenie wiadomości `Nie posiadasz żadnych produktów w koszyku`

### Historia Zamówień
- [ ] Utworzenie pliku history_orders.html
- [ ] Stworzenie wielkiego tytułu strony `Historia Zamówień`
- [ ] Sprawdzenie czy użytkownik jest zalogowany
- Gdy użytkownik jest zalogowany:
    - [ ] Gdy posiada historię zamówień (nie jest null), wyświetla ją z tabeli `history_orders` z Bazy Danych
    - [ ] Gdy nie posiada histori zamówień (jest null), wyświetla się napis `Nie posiadasz jeszcze żadnej historii zamówień`
- Gdy użytkownik nie jest zalogowany:
    - [ ] Wyświetl automatycznie podstronę `Logowania`

### Płatność
- [ ] Dodanie przycisku `Kup` po którym:
    - [ ] `amount` z tabeli `products` zmieni się o `amount-1`
    - [ ] Wyskoczy alert `Płatność została zrealizowana pomyślnie`
    - [ ] zmiana statusu historii zamówień
- [ ] Dodanie przycisku `Wróć do strony głównej`, dzięki któremu użytkownik wróci na podstronę `Strona Główna`

### O Nas
- [ ] Utworzenie pliku about.html
- [ ] Stworzenie wielkiego tytułu strony `O nas`
- [ ] Stworzenie opisu związanego z informacją na temat firmy

### Kontakt
- [ ] Utworzenie pliku contact.html
- [ ] Stworzenie wielkiego tytułu strony `Kontakt`
- [ ] Stworzenie opisu związanego z Kontaktem ze stroną i pracownikami strony

### Dostawy
- [ ] Utworzenie pliku delivery.html
- [ ] Stworzenie wielkiego tytułu strony `Dostawy`
- [ ] Stworzenie opisu związanego z informacją na temat Dostaw

### Regulamin
- [ ] Utworzenie pliku statute.html
- [ ] Stworzenie wielkiego tytułu strony `Regulamin Sklepu`
- [ ] Stworzenie podpunktów regulaminu

### Polityka Prywatności
- [ ] Utworzenie pliku privacy_policy.html
- [ ] Stworzenie wielkiego tytułu strony `Polityka Prywatności`
- [ ] Stworzenie opisu związanego z Polityką Prywatności i ciasteczkami (jeżeli są)

### Zwroty i Reklamacje
- [ ] Utworzenie pliku returns_and_complaints.html
- [ ] Stworzenie wielkiego tytułu strony `Zwroty i Reklamacje`
- [ ] Stworzenie opisu związanego z informacją na temat Zwrotów i Reklamacji