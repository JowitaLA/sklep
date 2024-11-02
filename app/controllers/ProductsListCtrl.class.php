<?php

namespace app\controllers;

use core\App;
use PDOException;
use app\forms\ProductsListForm;
use core\ParamUtils;

class ProductsListCtrl
{
    private $categories;        // rekordy pobrane z tabeli `products` z Bazy Danych
    private $searchProducts;    // rekordy pobrane z tabeli `products` z Bazy Danych
    private $records;           // rekordy z odpowiedzią

    public function __construct()
    {
        /* Utworzenie listy produktów */
        $this->searchProducts = new ProductsListForm();
    }

    public function validate()
    {
        $this->searchProducts->p_name = ParamUtils::getFromRequest('search_name_product');  // Pobranie danych z "search_name_product" 
        $this->searchProducts->c_id = ParamUtils::getFromRequest('choose_category');        // Pobranie danych z "choose_category" 

        return ! App::getMessages()->isError(); // Zwróć wiadomość z błędem, jeżeli występuje
    }

    public function categoriesList()
    {
        /* Pobranie rekordów z tabeli `categories` */
        try {
            // SELECT * FROM categories //
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem kategorii", \core\Message::ERROR));
        }

        App::getSmarty()->assign('categories', $this->categories);  // Pobranie listy rekordów z tabeli `categories` w Bazie Danych
    }

    public function action_searchProducts()
    {
        $this->validate();          // Wywołanie funkcji validate();
        $this->categoriesList();    // Wywołanie funkcji categoriesList();

        /* Przygotowanie zmiennej zapytania */
        $query = "SELECT products.* FROM products WHERE products.status='active' ";

        /* Sprawdzenie, czy jakaś kategoria została wybrana przez użytkownika (czy wartość z `choose_category` jest różna od 0) */
        if (isset($this->searchProducts->c_id) && $this->searchProducts->c_id != 0) {
            $categoryId = (int)$this->searchProducts->c_id;             // Rzutowanie na int dla bezpieczeństwa
            $query .= " JOIN categories_products ON products.id_product = categories_products.id_product
                WHERE categories_products.id_category = $categoryId";   // Dodanie zmiennej do zapytania
        }

        /* Wyszukiwanie po nazwie produktu */
        if (isset($this->searchProducts->p_name) && strlen($this->searchProducts->p_name) > 0) {
            $search_terms = explode(' ', strtolower($this->searchProducts->p_name));    // Rozdziel frazy po spacji
            $nameConditions = [];                                                       // Dodaj warunki dla każdej frazy
            foreach ($search_terms as $term) {
                $nameConditions[] = "products.name LIKE '%" . $term . "%'";             // używamy LIKE do wyszukiwania
            }

            /* Łączymy warunki w jeden */
            if (strpos($query, 'WHERE') === false) {
                $query .= " WHERE ";    // Dodaj WHERE, jeśli jeszcze go nie ma
            } else {
                $query .= " AND ";      // Użyj AND, jeśli już jest warunek
            }

            $query .= "(" . implode(' AND ', $nameConditions) . ")";
        }
        $this->records = App::getDB()->query($query)->fetchAll();   // Wykonanie zapytania
        $this->generateView();                                      // Wygenerowanie widoku z wyszukanymi produktami
    }

    public function generateView()
    {
        App::getSmarty()->assign('categories', $this->categories);  // lista rekordów z bazy danych
        App::getSmarty()->assign('searchForm', $this->searchProducts); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('records',    $this->records); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('countProducts', count($this->records)); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('searchName', $this->searchProducts->p_name); // dane formularza (wyszukiwania w tym wypadku)

        App::getSmarty()->display('ProductsListView.tpl');
    }
}
