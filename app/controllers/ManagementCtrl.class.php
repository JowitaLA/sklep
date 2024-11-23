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
    private $category;
    private $delivery;
    private $deliveries;
    private $relatedCategories;
    private $images;
    private $management;
    private $discountCode;
    private $discountCodes;

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
    // USERS
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
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                try {
                    App::getDB()->insert("users", [
                        "login" => $login,
                        "password" => $hashedPassword,
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
            u.name AS `kto_stworzyl_produkt`, -- Pobranie nazwy użytkownika
            p.created_at AS `data_utworzenia_produktu`
        FROM 
            products p
        LEFT JOIN 
            categories_products cp ON p.id_product = cp.id_product
        LEFT JOIN 
            categories c ON cp.id_category = c.id_category
        LEFT JOIN 
            users u ON p.who_created = u.id_user -- Połączenie z tabelą users
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

            $who_created = SessionUtils::load('id_user', $keep = true);

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
    // PRODUCTS
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
        $productId = $_POST['idProduct'] ?? null;
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $amount = $_POST['amount'] ?? '';
        $price = $_POST['price'] ?? '';
        $selectedCategories = $_POST['categories'] ?? [];

        if ($productId) {
            try {
                // Aktualizuj dane użytkownika
                App::getDB()->update("products", [
                    "name" => $name,
                    "description" => $description,
                    "amount" => $amount,
                    "price" => $price
                ], [
                    "id_product" => $productId
                ]);

                $this->management->messages[] = "Produkt został zedytowany pomyślnie.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji danych.";
            }

            // 1. Usuwanie kategorii, które nie są w selectedCategories
            $existingCategories = App::getDB()->select("categories_products", [
                "id_category"
            ], [
                "id_product" => $productId
            ]);

            $existingCategoryIds = array_column($existingCategories, "id_category"); // Uzyskaj tablicę ID istniejących kategorii

            // Kategoria do usunięcia to te, które są w istniejących, ale nie w selectedCategories
            $categoriesToRemove = array_diff($existingCategoryIds, $selectedCategories);

            if (!empty($categoriesToRemove)) {
                App::getDB()->delete("categories_products", [
                    "id_product" => $productId,
                    "id_category" => $categoriesToRemove
                ]);
            }

            // Dodawanie nowych kategorii z selectedCategories
            foreach ($selectedCategories as $categoryId) {
                // Sprawdź, czy kategoria już istnieje
                if (!in_array($categoryId, $existingCategoryIds)) {
                    App::getDB()->insert("categories_products", [
                        "id_product" => $productId,
                        "id_category" => $categoryId
                    ]);
                }
            }

            /* EDYCJA ZDJĘĆ */

            $url = App::getDB()->get("products", "url", [
                "id_product" => $productId
            ]);

            // Ścieżka do folderu ze zdjęciami
            $folderPath = __DIR__ . '/../../public/assets/img/products/' . $url;

            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
                $this->management->messages[] = "Folder $folderPath został utworzony.";
            }

            // Sprawdzenie, czy folder istnieje
            if (is_dir($folderPath)) {
                // Odczytanie wszystkich plików w folderze
                $files = scandir($folderPath);

                // Iteracja przez pliki
                foreach ($files as $file) {
                    // Sprawdzanie, czy plik zawiera "old" w nazwie
                    // Pełna ścieżka do pliku
                    $filePath = $folderPath . '/' . $file;
                    unlink($filePath);
                }

                /* Dodawanie nowych zdjęć bądź zamiana ich nazw */
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                $i = 1; // Zmienna do nazewnictwa plików
                foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                    $originalName = $_FILES['images']['name'][$key];
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);

                    if (is_uploaded_file($tmpName)) {
                        $originalName = $_FILES['images']['name'][$key];
                        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                        // W przypadku, gdy nie zawiera 'public/assets'
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
            } else {
                $this->management->messages[] = "Folder $folderPath nie istnieje.";
            }
        } else {
            $this->management->messages[] = "Brak ID produktu do aktualizacji.";
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
        // Sprawdź, czy idProduct zostało przesłane w formularzu
        if (isset($_POST['idProduct'])) {
            $productId = $_POST['idProduct'];

            try {
                // Pobierz dane produktu z tabeli products
                $product = App::getDB()->get("products", "*", [
                    "id_product" => $productId
                ]);

                // Sprawdź, czy produkt został znaleziony
                if (empty($product)) {
                    $this->management->messages[] = "Nie znaleziono produktu.";
                }
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd z pobieraniem produktu.";
            }

            try {
                // Pobierz wszystkie aktywne kategorie
                $this->categories = App::getDB()->select("categories", "*");
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd z pobieraniem kategorii.";
            }

            // Pobierz powiązane kategorie dla produktu
            $this->relatedCategories = App::getDB()->select("categories_products", [
                "[><]categories" => ["id_category" => "id_category"]
            ], [
                "categories.id_category",
                "categories.name" // Zakładając, że nazwa kategorii jest w kolumnie 'name'
            ], [
                "id_product" => $productId
            ]);

            // Pobierz zdjęcia produktu z folderu
            $imagesDir = __DIR__ . '/../../public/assets/img/products/' . $product['url']; // Upewnij się, że to jest odpowiednia ścieżka
            if (is_dir($imagesDir)) {
                $images = array_diff(scandir($imagesDir), ['.', '..']); // Odczytaj pliki w folderze, pomijając "." i ".."
                $this->images = array_filter($images, function ($file) {
                    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file); // Sprawdź, czy to obraz
                });
            } else {
                $this->images = [];
            }

            // Przekaż dane do widoku
            App::getSmarty()->assign('existingImages', json_encode($this->images)); // Przekazanie danych jako JSON
            App::getSmarty()->assign('messages', $this->management->messages);
            App::getSmarty()->assign('categories', $this->categories);
            App::getSmarty()->assign('relatedCategories', $this->relatedCategories); // Przekazanie powiązanych kategorii
            App::getSmarty()->assign('product', $product); // Przekazanie danych produktu
            App::getSmarty()->display('management/productEdit.tpl');
        } else {
            $this->management->messages[] = "Nie podano ID produktu.";
            App::getSmarty()->assign('messages', $this->management->messages);
            App::getSmarty()->display('management/productEdit.tpl');
        }
    }
    // CATEGORIES
    public function action_showCategories()
    {
        try {
            $this->categories = App::getDB()->select("categories", "*");
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem kategorii";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('categories', $this->categories);
        App::getSmarty()->display('management/categoriesList.tpl');
    }

    public function action_deleteCategory()
    {
        $idCategory = $_POST['idCategory'] ?? null;

        if ($idCategory === null) {
            $this->management->messages[] = "Brak ID kategorii.";
            return false;
        }
        try {
            App::getDB()->delete("categories", ["id_category" => $idCategory]);
            $this->management->messages[] = "Kategoria została pomyślnie usunięta.";
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd podczas usuwania kotegorii.";
        }
        // Zapisz wiadomości do sesji przed przekierowaniem
        $_SESSION['messages'] = $this->management->messages;

        // Przekierowanie
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_createCategory()
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon = $_POST['icon'] ?? '';
        $who_add = SessionUtils::load('id_user', $keep = true);


        // Walidacja danych (przykład)
        if (empty($name) || empty($icon) || empty($description)) {
            // Dodaj komunikat o błędzie
            $this->management->messages[] = "Nazwa, opis i ikona są wymagane.";
        } else {
            try {
                App::getDB()->insert("categories", [
                    "name" => $name,
                    "description" => $description,
                    "icon" => $icon,
                    "who_add" => $who_add
                ]);
                $this->management->messages[] = "Kategoria została dodana pomyślnie.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dodawania Kategorii.";
            }
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_addCategory()
    {
        // Przekaż dane kategorii do widoku
        App::getSmarty()->display('management/categoryAdd.tpl');
    }

    public function action_updateCategory()
    {
        $idCategory = $_POST['idCategory'] ?? null;
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $icon = $_POST['icon'] ?? null;

        if ($idCategory) {
            try {
                // Aktualizuj dane kategorii
                App::getDB()->update("categories", [
                    "name" => $name,
                    "description" => $description,
                    "icon" => $icon,
                ], [
                    "id_category" => $idCategory
                ]);

                $this->management->messages[] = "Kategoria została zaktualizowana.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji kategorii.";
            }
        } else {
            $this->management->messages[] = "Brak ID kategorii do aktualizacji.";
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_editCategory()
    {
        $idCategory = $_POST['idCategory'] ?? null;

        if ($idCategory) {
            // Pobierz dane kategorii na podstawie ID
            $this->category = App::getDB()->get("categories", "*", ["id_category" => $idCategory]);

            // Przekaż dane kategorii do widoku
            App::getSmarty()->assign('category', $this->category);
            App::getSmarty()->display('management/categoryEdit.tpl');
        } else {
            $this->management->messages[] = "Brak ID kategorii do edycji.";
            App::getRouter()->redirectTo('managementMain');
        }
    }
    //CODES
    public function action_showDiscountCodes()
    {
        try {
            $this->discountCodes = App::getDB()->select(
                "discount_codes",
                [
                    "[>]users" => ["who_created" => "id_user"]
                ],
                [
                    "discount_codes.id_code",
                    "discount_codes.code_name",
                    "discount_codes.discount_value",
                    "discount_codes.discount_type",
                    "discount_codes.created_at",
                    "users.name(who_created)"
                ]
            );
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem kodów rabatowych.";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('discountCodes', $this->discountCodes);
        App::getSmarty()->display('management/discountCodesList.tpl');
    }

    public function action_deleteDiscountCode()
    {
        $idCode = $_POST['idCode'] ?? null;

        if ($idCode === null) {
            $this->management->messages[] = "Brak ID kodu rabatowego.";
            return false;
        }

        try {
            App::getDB()->delete("discount_codes", ["id_code" => $idCode]);
            $this->management->messages[] = "Kod rabatowy został pomyślnie usunięty.";
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd podczas usuwania kodu rabatowego.";
        }

        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_createDiscountCode()
    {
        $codeName = $_POST['code_name'] ?? '';
        $discountValue = $_POST['discount_value'] ?? '';
        $discountType = $_POST['discount_type'] ?? 'percent';
        $whoCreated = SessionUtils::load('id_user', $keep = true);

        if (empty($codeName) || empty($discountValue)) {
            $this->management->messages[] = "Nazwa kodu oraz wartość rabatu są wymagane.";
        } else {
            try {
                App::getDB()->insert("discount_codes", [
                    "code_name" => $codeName,
                    "discount_value" => $discountValue,
                    "discount_type" => $discountType,
                    "who_created" => $whoCreated,
                    "created_at" => date("Y-m-d H:i:s")
                ]);
                $this->management->messages[] = "Kod rabatowy został dodany pomyślnie.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dodawania kodu rabatowego.";
            }
        }

        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_addDiscountCode()
    {
        App::getSmarty()->display('management/discountCodeAdd.tpl');
    }

    public function action_updateDiscountCode()
    {
        $idCode = $_POST['idCode'] ?? null;
        $codeName = $_POST['code_name'] ?? null;
        $discountValue = $_POST['discount_value'] ?? null;
        $discountType = $_POST['discount_type'] ?? 'percent';

        if ($idCode) {
            try {
                App::getDB()->update("discount_codes", [
                    "code_name" => $codeName,
                    "discount_value" => $discountValue,
                    "discount_type" => $discountType
                ], [
                    "id_code" => $idCode
                ]);

                $this->management->messages[] = "Kod rabatowy został zaktualizowany.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji kodu rabatowego.";
            }
        } else {
            $this->management->messages[] = "Brak ID kodu do aktualizacji.";
        }

        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_editDiscountCode()
    {
        $idCode = $_POST['idCode'] ?? null;

        if ($idCode) {
            try {
                $this->discountCode = App::getDB()->get("discount_codes", "*", ["id_code" => $idCode]);

                App::getSmarty()->assign('discountCode', $this->discountCode);
                App::getSmarty()->display('management/discountCodeEdit.tpl');
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas pobierania kodu rabatowego.";
            }
        } else {
            $this->management->messages[] = "Brak ID kodu do edycji.";
            App::getRouter()->redirectTo('managementMain');
        }
    }


    //DELIVERY
    public function action_showDeliveries()
    {
        try {
            $this->deliveries = App::getDB()->select("delivery", "*");
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem dostaw.";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('deliveries', $this->deliveries);
        App::getSmarty()->display('management/deliveriesList.tpl');
    }

    public function action_deleteDelivery()
    {
        $idDelivery = $_POST['idDelivery'] ?? null;

        if ($idDelivery === null) {
            $this->management->messages[] = "Brak ID dostawy.";
            return false;
        }
        try {
            App::getDB()->delete("delivery", ["id_delivery" => $idDelivery]);
            $this->management->messages[] = "Dostawa została pomyślnie usunięta.";
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd podczas usuwania dostawy.";
        }

        // Zapisz wiadomości do sesji przed przekierowaniem
        $_SESSION['messages'] = $this->management->messages;

        // Przekierowanie
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_createDelivery()
    {
        $name = $_POST['name'] ?? '';
        $cost = $_POST['cost'] ?? '';
        $estimated_time = $_POST['estimated_time'] ?? '';
        $who_created = SessionUtils::load('id_user', $keep = true);

        // Walidacja danych (przykład)
        if (empty($name) || empty($cost) || empty($estimated_time)) {
            $this->management->messages[] = "Nazwa, koszt i szacowany czas dostawy są wymagane.";
        } else {
            try {
                App::getDB()->insert("delivery", [
                    "name" => $name,
                    "cost" => $cost,
                    "estimated_time" => $estimated_time,
                    "who_created" => $who_created,
                    "created_at" => date("Y-m-d H:i:s"),
                ]);
                $this->management->messages[] = "Dostawa została dodana pomyślnie.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas dodawania dostawy.";
            }
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_addDelivery()
    {
        // Przekaż dane do widoku
        App::getSmarty()->display('management/deliveryAdd.tpl');
    }

    public function action_updateDelivery()
    {
        $idDelivery = $_POST['idDelivery'] ?? null;
        $name = $_POST['name'] ?? null;
        $cost = $_POST['cost'] ?? null;
        $estimated_time = $_POST['estimated_time'] ?? null;

        if ($idDelivery) {
            try {
                // Aktualizuj dane dostawy
                App::getDB()->update("delivery", [
                    "name" => $name,
                    "cost" => $cost,
                    "estimated_time" => $estimated_time,
                ], [
                    "id_delivery" => $idDelivery
                ]);

                $this->management->messages[] = "Dostawa została zaktualizowana.";
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas aktualizacji dostawy.";
            }
        } else {
            $this->management->messages[] = "Brak ID dostawy do aktualizacji.";
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_editDelivery()
    {
        $idDelivery = $_POST['idDelivery'] ?? null;

        if ($idDelivery) {
            try {
                // Pobierz dane dostawy na podstawie ID
                $this->delivery = App::getDB()->get("delivery", "*", ["id_delivery" => $idDelivery]);

                // Przekaż dane dostawy do widoku
                App::getSmarty()->assign('delivery', $this->delivery);
                App::getSmarty()->display('management/deliveryEdit.tpl');
            } catch (PDOException $e) {
                $this->management->messages[] = "Wystąpił błąd podczas pobierania danych dostawy.";
                App::getRouter()->redirectTo('managementMain');
            }
        } else {
            $this->management->messages[] = "Brak ID dostawy do edycji.";
            App::getRouter()->redirectTo('managementMain');
        }
    }
    //WISHLISTS
    public function action_showWishlists()
    {
        try {
            $wishlist = App::getDB()->query("
                SELECT 
                    w.id_wishlist AS `id`, -- ID życzenia
                    u.name AS `user`, -- Nazwa użytkownika
                    p.name AS `product` -- Nazwa produktu
                FROM 
                    wishlist w
                LEFT JOIN 
                    users u ON w.id_user = u.id_user -- Połączenie z tabelą users
                LEFT JOIN 
                    products p ON w.id_product = p.id_product -- Połączenie z tabelą products
            ")->fetchAll(); // Pobranie wszystkich wyników jako tablicy
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem listy życzeń";
        }

        try {
            $wishlistProducts = App::getDB()->query("
                SELECT 
                    p.name AS `product_name`, 
                    COUNT(w.id_product) AS `wishlist_count`
                FROM 
                    wishlist w
                LEFT JOIN 
                    products p ON w.id_product = p.id_product
                GROUP BY 
                    w.id_product
                ORDER BY 
                    wishlist_count DESC
            ")->fetchAll(); // Pobranie wszystkich wyników jako tablicy
        } catch (PDOException $e) {
            $this->management->messages[] = "Wystąpił błąd z pobieraniem danych produktów z listy życzeń";
        }

        App::getSmarty()->assign('messages', $this->management->messages);
        App::getSmarty()->assign('wishlist', $wishlist);
        App::getSmarty()->assign('wishlistProducts', $wishlistProducts);
        App::getSmarty()->display('management/wishlistsList.tpl');
    }
    // SUBPAGES
    public function action_updateSubpage()
    {
        // Ścieżka do pliku tekstowego, który chcemy zaktualizować
        $filePath = $_POST['subpage'] ?? null;

        // Sprawdź, czy żądanie POST zawiera nową treść
        if (isset($_POST['description'])) {
            // Pobierz nową treść z formularza
            $newContent = $_POST['description'];

            // Zapisz nową treść do pliku
            if (file_put_contents($filePath, $newContent) !== false) {
                // Zwróć komunikat o sukcesie
                $this->management->messages[] = "Pomyślnie zapisano zmiany.";
            } else {
                // Zwróć komunikat o błędzie, jeśli zapis się nie powiódł
                $this->management->messages[] = "Wystąpił błąd podczas zapisywania zmian.";
            }
        } else {
            // Zwróć komunikat o błędzie, jeśli brak danych w żądaniu POST
            $this->management->messages[] = "Brak danych do zapisania.";
        }

        // Zapisz wiadomości do sesji i przekieruj
        $_SESSION['messages'] = $this->management->messages;
        App::getRouter()->redirectTo('managementMain');
    }

    public function action_showContact()
    {
        $subpage = [
            'title' => 'Kontakt',
            'description' => 'assets/pages/contact.txt',
            'file' => "assets/pages/contact.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';

        App::getSmarty()->assign('messages', $this->management->messages);
        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showAbout()
    {
        $subpage = [
            'title' => 'O nas',
            'description' => 'assets/pages/about.txt',
            'file' => "assets/pages/about.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showDelivery()
    {
        $subpage = [
            'title' => 'Sposoby Dostawy',
            'description' => 'assets/pages/delivery.txt',
            'file' => "assets/pages/delivery.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showHelp()
    {
        $subpage = [
            'title' => 'Pomoc',
            'description' => 'assets/pages/help.txt',
            'file' => "assets/pages/help.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showReturn_and_complaints()
    {
        $subpage = [
            'title' => 'Zwroty i Reklamacje',
            'description' => 'assets/pages/returns_and_complaints.txt',
            'file' => "assets/pages/returns_and_complaints.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showRodo()
    {
        $subpage = [
            'title' => 'Polityka Prywatności (RODO)',
            'description' => 'assets/pages/rodo.txt',
            'file' => "assets/pages/rodo.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }

    public function action_showStatute()
    {
        $subpage = [
            'title' => 'Regulamin',
            'description' => 'assets/pages/statute.txt',
            'file' => "assets/pages/statute.txt"
        ];

        // Przetwarzanie tablicy: odczyt zawartości plików opisów
        $subpage['description'] = file_exists($subpage['description'])
            ? file_get_contents($subpage['description'])
            : 'Brak opisu dla tej podstrony.';


        // Przekaż dane użytkownika do widoku
        App::getSmarty()->assign('subpage', $subpage);
        App::getSmarty()->display('management/subpage.tpl');
    }
    // GENERATE VIEW
    public function generateView()
    {
        App::getSmarty()->display('ManagementView.tpl');
    }
}
