<?php

namespace app\controllers;


use core\App;
use PDOException;
use app\forms\ProductsListForm;
use core\ParamUtils;

class ProductsListCtrl
{
    private $categories; //rekordy pobrane z tabeli `products` z Bazy Danych
    private $searchProducts; //rekordy pobrane z tabeli `products` z Bazy Danych
    private $records;        //rekordy z odpowiedzią

    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->searchProducts = new ProductsListForm();
    }

    public function validate()
    {
        $this->searchProducts->p_name = ParamUtils::getFromRequest('search_name_product');
        $this->searchProducts->c_id = ParamUtils::getFromRequest('choose_category');

        return ! App::getMessages()->isError();
    }

    public function categoriesList()
    {
        //pobranie rekordów z tabeli `categories`
        try {
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd z pobieraniem kategorii", \core\Message::ERROR));
        }

        App::getSmarty()->assign('categories', $this->categories);  // lista rekordów z bazy danych
    }

    public function action_searchProducts()
    {
        $this->validate();
        $this->categoriesList();

        // Przygotowanie zmiennej zapytania
        $query = "SELECT products.* FROM products";

        // Sprawdzenie, czy kategoria jest ustawiona i różna od 0
        if (isset($this->searchProducts->c_id) && $this->searchProducts->c_id != 0) {
            $categoryId = (int)$this->searchProducts->c_id; // Rzutowanie na int dla bezpieczeństwa
            $query .= " JOIN categories_products ON products.id_product = categories_products.id_product
                WHERE categories_products.id_category = $categoryId";
        }

        // Wyszukiwanie po nazwie produktu
        if (isset($this->searchProducts->p_name) && strlen($this->searchProducts->p_name) > 0) {
            // Rozdziel frazy po spacji
            $search_terms = explode(' ', strtolower($this->searchProducts->p_name));

            // Dodaj warunki dla każdej frazy
            $nameConditions = [];
            foreach ($search_terms as $term) {
                $nameConditions[] = "products.name LIKE '%" . $term . "%'"; // używamy LIKE do wyszukiwania
            }

            // Łączymy warunki w jeden
            if (strpos($query, 'WHERE') === false) {
                $query .= " WHERE "; // Dodaj WHERE, jeśli jeszcze go nie ma
            } else {
                $query .= " AND "; // Użyj AND, jeśli już jest warunek
            }

            $query .= "(" . implode(' AND ', $nameConditions) . ")";
        }

        // Wykonanie zapytania
        $this->records = App::getDB()->query($query)->fetchAll();
        $this->generateView();
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
