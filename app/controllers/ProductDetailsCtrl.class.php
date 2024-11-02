<?php

namespace app\controllers;

use core\App;
use PDOException;
use core\ParamUtils;

class ProductDetailsCtrl
{
    private $url;
    private $product;
    private $categories = [];
    private $images = [];  // Dodanie zmiennej do przechowywania obrazów

    public function action_productDetails()
    {
        // Pobranie URL produktu z parametru URL
        $this->url = ParamUtils::getFromGet('product');

        if (!$this->url) {
            App::getMessages()->addMessage(new \core\Message("Nie podano URL produktu", \core\Message::ERROR));
            echo '<script>console.log("tutaj");</script>';
            return;
        }

        // Pobranie szczegółów produktu na podstawie kolumny `url`
        try {
            $this->product = App::getDB()->get("products", "*", [
                "url" => $this->url
            ]);

            if (!$this->product) {
                App::getMessages()->addMessage(new \core\Message("Nie znaleziono produktu o podanym URL", \core\Message::ERROR));
                return;
            }

            // Przeszukiwanie folderu ze zdjęciami
            $this->loadProductImages();

            // Przekonwertowanie opisu
            $this->loadDescription();

            $sql = "
                SELECT c.name 
                FROM categories AS c
                JOIN categories_products AS cp ON c.id_category = cp.id_category
                WHERE cp.id_product = :id_product
            ";

            $params = [
                ':id_product' => $this->product['id_product']
            ];

            $this->categories = App::getDB()->query($sql, $params);
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas pobierania danych produktu", \core\Message::ERROR));
        }

        // Przekazanie danych produktu do widoku
        $this->generateView();
    }

    private function loadProductImages()
    {

        $imagesPath = "assets/img/products/{$this->url}/";  // Ścieżka do folderu ze zdjęciami
        if (is_dir($imagesPath)) {
            $this->images = array_filter(scandir($imagesPath), function ($file) use ($imagesPath) {
                return is_file($imagesPath . $file) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
            });
        }
    }

    private function loadDescription()
    {
        $this->product['description'] = nl2br($this->product['description']);
    }

    public function generateView()
    {
        App::getSmarty()->assign('product', $this->product);
        App::getSmarty()->assign('categories', $this->categories);

        App::getSmarty()->assign('images', $this->images);  // Przekazywanie obrazów do widoku
        App::getSmarty()->assign('page_title', $this->product['name']);  // Tytuł strony ("Yups")
        App::getSmarty()->display('ProductDetailsView.tpl');
    }
}
