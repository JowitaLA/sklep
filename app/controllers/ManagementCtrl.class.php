<?php

namespace app\controllers;

use app\forms\ManagementForm;
use core\App;
use core\Message;
use PDOException;
use core\SessionUtils;



class ManagementCtrl
{
    private $users;
    private $products;
    private $user;
    private $categories;
    private $management;

    public function __construct()
    {
        $this->management = new ManagementForm();
    }

    public function action_managementMain()
    {
        // Odczytaj wiadomości z sesji, jeśli istnieją
        if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
            $this->management->messages = $_SESSION['messages'];
            unset($_SESSION['messages']); // Usuń wiadomości z sesji po ich odczytaniu
        }

        if (!empty($this->management->messages)) {
            foreach ($this->management->messages as $msg) {
                App::getMessages()->addMessage(new Message($msg, Message::INFO));
            }
        }

        $this->generateView();
    }

    public function action_showUsers()
    {

        try {
            $this->users = App::getDB()->select("users", "*");
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem kategorii";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('users', $this->users);
        App::getSmarty()->display('management/usersList.tpl');
    }

    public function validateChangeStatusUser()
    {
        $userId = $_POST['idUser'] ?? null;
        $userStatus = $_POST['status'] ?? null;

        if ($userId === null) {
            $this->management->messages[] = "Brak ID użytkownika.";
            return false;
        }
        if ($userStatus == "active")
            try {
                App::getDB()->update("users", ["status" => "inactive"], ["id_user" => $userId]);
                $this->management->messages[] = "Użytkownik został pomyślnie dezaktywowany.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dezaktywacji konta.";
            }
        else {
            try {
                App::getDB()->update("users", ["status" => "active"], ["id_user" => $userId]);
                $this->management->messages[] = "Użytkownik został pomyślnie aktywowany.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktywacji konta.";
            }
        }

        return empty($this->management->messages);
    }

    public function action_changeStatusUser()
    {
        $this->validateChangeStatusUser();

        // Zapisz wiadomości do sesji przed przekierowaniem
        $_SESSION['messages'] = $this->management->messages;

        // Przekierowanie
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_createUser()
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';

        // Walidacja danych (przykład)
        if (empty($login) || empty($password) || empty($mail)) {
            // Dodaj komunikat o błędzie
            $this->management->messages[] = "Login, hasło i e-mail są wymagane.";
        } else {
            $login_occupied = App::getDB()->select("users", "*", [
                'login' => $login,
            ]);
            $mail_occupied = App::getDB()->select("users", "*", [
                'mail' => $mail,
            ]);
            if (empty($login_occupied) || empty($mail_occupied)) {
                try {
                    App::getDB()->insert("users", [
                        "login" => $login,
                        "password" => $password,
                        "mail" => $mail,
                        "name" => $name,
                        "surname" => $surname,
                        "status" => "active"
                    ]);
                    $this->management->messages[] = "Użytkownik został dodany pomyślnie.";
                } catch (PDOException $e) {
                    $this->management->messages[] = "Wystąpił błąd podczas dodawania użytkownika..";
                }
            } else {
                if (empty($login_occupied)) {
                    $this->management->messages[] = "Użytkownik z takim emailem już jest.";
                } else {
                    $this->management->messages[] = "Użytkownik z takim loginem już jest.";
                }
            }
        }

        // // Haszowanie hasła
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_addUser()
    {
        // Przekaż dane użytkownika do widoku
        App::getSmarty()->display('management/userAdd.tpl');
    }

    public function action_updateUser()
    {
        $userId = $_POST['idUser'] ?? null;
        $login = $_POST['login'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';

        if ($userId) {
            try {
                // Aktualizuj dane użytkownika
                App::getDB()->update("users", [
                    "login" => $login,
                    "mail" => $mail,
                    "name" => $name,
                    "surname" => $surname
                ], [
                    "id_user" => $userId
                ]);

                $this->management->messages[] = "Dane użytkownika zostały zaktualizowane.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji danych.";
            }
        } else {
            $this->management->messages[] = "Brak ID użytkownika do aktualizacji.";
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_editUser()
    {
        $userId = $_POST['idUser'] ?? null;

        if ($userId) {
            // Pobierz dane użytkownika na podstawie ID
            $this->user = App::getDB()->get("users", "*", ["id_user" => $userId]);

            // Przekaż dane użytkownika do widoku
            App::getSmarty()->assign('user', $this->user);
            App::getSmarty()->display('management/userEdit.tpl');
        } else {
            $this->management->messages[] = "Brak ID użytkownika do edycji.";
            App::getRouter()->redirectTo('managementMain');
        }
    }

    public function action_showProducts()
    {
        try {
            $this->products = App::getDB()->query("
            SELECT 
                p.id_product AS `id_produktu`,
                p.name AS `nazwa_produktu`,
                GROUP_CONCAT(c.name SEPARATOR ', ') AS `kategorie`,
                p.description AS `opis_produktu`,
                p.url AS `url_produktu`,
                p.status AS `status_produktu`,
                p.amount AS `ilosc_produktow`,
                p.price AS `cena_produktu`,
                p.who_created AS `kto_stworzyl_produkt`,
                p.created_at AS `data_utworzenia_produktu`
            FROM 
                products p
            LEFT JOIN 
                categories_products cp ON p.id_product = cp.id_product
            LEFT JOIN 
                categories c ON cp.id_category = c.id_category
            GROUP BY 
                p.id_product;
        ")->fetchAll(); // Pobranie wszystkich wyników jako tablicy
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem produktów i kategorii";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('products', $this->products);
        App::getSmarty()->display('management/productsList.tpl');
    }

    public function action_createProduct()
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? ''; // Odbierz opis jako HTML
        $amount = $_POST['amount'] ?? '';
        $price = $_POST['price'] ?? '';
        $selectedCategories = $_POST['categories'] ?? []; // Zakładamy, że kategorie są przesyłane jako tablica

        if (empty($name) || empty($description) || empty($price)) {
            // Dodaj komunikat o błędzie
            $this->management->messages[] = "Nazwa, opis i cena są wymagane.";
        } else {
            // Generowanie unikalnego URL
            do {
                $url = bin2hex(random_bytes(32));  // Generowanie tokena
                $isUrlUnique = !App::getDB()->has("products", ["url" => $url]);  // Sprawdzanie unikalności
            } while (!$isUrlUnique);

            $who_created = SessionUtils::load($name, $keep = true);

            try {
                // Wstawianie danych produktu do bazy
                App::getDB()->insert("products", [
                    "name" => $name,
                    "description" => $description, // Zapisz opis jako HTML
                    "url" => $url,
                    "amount" => $amount,
                    "price" => $price,
                    "who_created" => $who_created
                ]);
                $this->management->messages[] = "Produkt został dodany pomyślnie.";

                $productId = App::getDB()->id(); // Pobierz ID nowo dodanego produktu

                // Dodaj kategorie do tabeli categories_products
                foreach ($selectedCategories as $categoryId) {
                    App::getDB()->insert("categories_products", [
                        "id_product" => $productId,
                        "id_category" => $categoryId
                    ]);
                }
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dodawania produktu.";
            }

            // Tworzenie folderu ze zdjęciami
            $folderPath = __DIR__ . '/../../public/assets/img/products/' . $url;

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            if (!empty($_FILES['images']['tmp_name'][0])) {
                $i = 1; // Zmienna do nazewnictwa plików
                foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                    if (is_uploaded_file($tmpName)) {
                        $originalName = $_FILES['images']['name'][$key];
                        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                        $fileName = $i . "." . $extension;

                        if (move_uploaded_file($tmpName, $folderPath . '/' . $fileName)) {
                            $this->management->messages[] = "Plik zapisany pomyślnie!";
                        } else {
                            $this->management->messages[] = "Błąd przy zapisie pliku";
                        }
                        $i++; // Inkrementacja zmiennej dla kolejnych plików
                    } else {
                        $this->management->messages[] = "Plik nie został poprawnie przesłany.";
                    }
                }
            }
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_addProduct()
    {
        try {
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem kategorii";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('categories', $this->categories);
        // Przekaż dane użytkownika do widoku
        App::getSmarty()->display('management/productAdd.tpl');
    }

    public function action_updateProduct()
    {
        $userId = $_POST['idUser'] ?? null;
        $login = $_POST['login'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';

        if ($userId) {
            try {
                // Aktualizuj dane użytkownika
                App::getDB()->update("users", [
                    "login" => $login,
                    "mail" => $mail,
                    "name" => $name,
                    "surname" => $surname
                ], [
                    "id_user" => $userId
                ]);

                $this->management->messages[] = "Dane użytkownika zostały zaktualizowane.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji danych.";
            }
        } else {
            $this->management->messages[] = "Brak ID użytkownika do aktualizacji.";
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function validateChangeStatusProduct()
    {
        $productId = $_POST['idProduct'] ?? null;
        $productStatus = $_POST['status'] ?? null;

        if ($productStatus == "active")
            try {
                App::getDB()->update("products", ["status" => "inactive"], ["id_product" => $productId]);
                $this->management->messages[] = "Produkt został pomyślnie dezaktywowany.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dezaktywacji productu.";
            }
        else {
            try {
                App::getDB()->update("products", ["status" => "active"], ["id_product" => $productId]);
                $this->management->messages[] = "Produkt został pomyślnie aktywowany.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktywacji productu.";
            }
        }

        return empty($this->management->messages);

        // Zapisz wiadomości do sesji przed przekierowaniem
        $_SESSION['messages'] = $this->management->messages;

        // Przekierowanie
        App::getRouter()->redirectTo('managementMain');
    }
    public function action_changeStatusProduct()
    {
        $this->validateChangeStatusProduct();

        // Zapisz wiadomości do sesji przed przekierowaniem
        $_SESSION['messages'] = $this->management->messages;

        // Przekierowanie
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_editProduct()
    {
        $userId = $_POST['idUser'] ?? null;

        if ($userId) {
            // Pobierz dane użytkownika na podstawie ID
            $this->user = App::getDB()->get("users", "*", ["id_user" => $userId]);

            // Przekaż dane użytkownika do widoku
            App::getSmarty()->assign('user', $this->user);
            App::getSmarty()->display('management/userEdit.tpl');
        } else {
            $this->management->messages[] = "Brak ID użytkownika do edycji.";
            App::getRouter()->redirectTo('managementMain');
        }
    }

    public function generateView()
    {
        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->display('ManagementView.tpl');
    }
}