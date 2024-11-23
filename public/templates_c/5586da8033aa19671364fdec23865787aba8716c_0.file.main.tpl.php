<?php
/* Smarty version 4.3.4, created on 2024-11-21 01:35:37
  from 'C:\xampp\htdocs\Sklep\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673e8059e24e63_86837007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5586da8033aa19671364fdec23865787aba8716c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\main.tpl',
      1 => 1732149306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673e8059e24e63_86837007 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/color-modes.js"><?php echo '</script'; ?>
>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Domyślny opis" ?? null : $tmp);?>
">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" type="image/png">

    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Yups" ?? null : $tmp);?>
</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/carousel.css" rel="stylesheet">
</head>

<body>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <div class="row w-100 align-items-center">
                    <!-- Lewa część - Nazwa Sklepu -->
                    <div class="col-6 col-md-3">
                        <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo"
                                style="height: 25px; width: auto; vertical-align: middle;">
                            Yups
                        </a>
                    </div>

                    <!-- Prawa część na telefonach - Przycisk menu -->
                    <div class="col-6 d-md-none d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <!-- Środkowa część - Wyszukiwarka (widoczna na desktopach) -->
                    <div class="col-md-6 d-none d-md-flex">
                        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
searchProducts" method="post"
                            role="search">                             <input class="form-control me-2" type="text" name="search_name_product"
                                placeholder="Wpisz czego szukasz" aria-label="Search"
                                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['searchForm']->value->name ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                            <div class="input-group" style="width: 300px;">
                                <select class="form-select" name="choose_category" aria-label="Wybierz kategorię">
                                    <option value="0">Kategoria</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id_category'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <button class="btn btn-primary ms-2" type="submit" style="flex-grow: 2; max-width: 150px;">
                                Szukaj
                            </button>
                        </form>
                    </div>

                    <!-- Prawa część - Koszyk, Kontakt, Login (widoczna na desktopach) -->
                    <div class="col-md-3 d-none d-md-flex justify-content-end">
                        <ul class="navbar-nav mb-2 mb-lg-0">

                            <!-- Zarządzanie -->
                            <?php if (\core\RoleUtils::inRole('zarządzanie')) {?>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
managementMain"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zarządzanie">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                </li>
                            <?php }?>

                            <!-- kontakt -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
contact" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Kontakt">
                                    <i class="bi bi-telephone"></i> <!-- Ikona telefonu -->
                                </a>
                            </li>

                            <!-- zmiana motywu -->
                            <li class="nav-item">
                                <button id="theme-toggle-btn" class="btn nav-link" type="button"
                                    aria-label="Zmień motyw" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Zmień motyw">
                                    <i id="theme-icon" class="bi bi-moon"></i>
                                </button>
                            </li>

                            <!-- rozwijane menu dla "Moje Konto" -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> Moje Konto
                                </a>
                                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                        <li><a class="dropdown-item text-center" href="#">Profil</a></li>
                                        <li><a class="dropdown-item text-center" href="#">Zamówienia</a></li>
                                        <li><a class="dropdown-item text-center" href="#">Ustawienia</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj
                                                się</a></li>
                                    <?php } else { ?>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                            <li><a class="dropdown-item text-center"
                                                    href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow">Zaloguj się</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-center"
                                                    href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registerShow">Nie masz jeszcze
                                                    konta?<br>Zarejestruj się!</a></li>
                                        <?php }?>

                                    </ul>
                            </li>

                            <!-- Koszyk z rozwijanym menu -->
                            <li class="nav-item dropdown position-relative">
                                <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-cart"></i>
                                    <span class="badge cart-badge d-none"></span> <!-- Liczba produktów w koszyku -->
                                </a>
                                <?php if ((isset($_smarty_tpl->tpl_vars['miniCart']->value)) && count($_smarty_tpl->tpl_vars['miniCart']->value) > 0) {?>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown"
                                        style="width: 30rem; max-height: 80vh; overflow-y: auto;">
                                        <?php $_smarty_tpl->_assignInScope('cartCount', 0);?>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['miniCart']->value, 'productData', false, 'productId');
$_smarty_tpl->tpl_vars['productData']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['productId']->value => $_smarty_tpl->tpl_vars['productData']->value) {
$_smarty_tpl->tpl_vars['productData']->do_else = false;
?>
                                            <li style="display: flex; align-items: center; height: 4rem;" href="#">
                                                <a class="dropdown-item text-center"
                                                    href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['productData']->value["url"];?>
"
                                                    style="display: flex; width: 100%; align-items: center;">
                                                    <!-- Obrazek -->
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['productData']->value["url"];?>
/1.jpg"
                                                        alt="<?php echo $_smarty_tpl->tpl_vars['productData']->value['name'];?>
"
                                                        style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px; border-radius: 5px;"
                                                        onerror="
                                                        let formats = ['png', 'gif'];
                                                        let img = this;
                                                        let index = 0;
                                                        
                                                        function tryNextFormat() {
                                                            if (index < formats.length) {
                                                                img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['productData']->value["url"];?>
/1.' + formats[index++];
                                                                } else {
                                                                    img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                                                    }
                                                                }

                                                        tryNextFormat();
                                                        this.onerror = tryNextFormat;
                                                    ">

                                                    <!-- Tytuł po lewej -->
                                                    <span style="flex: 7; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['productData']->value['name'];?>
</span>
                                                    <!-- Ilość i cena po prawej -->
                                                    <span style="flex: 3; text-align: right; margin-left: auto;">
                                                        <?php echo $_smarty_tpl->tpl_vars['productData']->value['quantity'];?>
 x
                                                        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['productData']->value['price'],2,","," ");?>
&nbsp;zł
                                                    </span>
                                                </a>
                                            </li>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li style="display: flex; justify-content: space-between;">
                                            <a class="dropdown-item text-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
cart"
                                                style="flex: 1; margin-right: 5px;">Przejdź do koszyka</a>
                                            <a class="dropdown-item text-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
checkout"
                                                style="flex: 1;">Przejdź do płatności</a>
                                        </li>
                                    </ul>
                                <?php } else { ?>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                                        <li><a class="dropdown-item text-center" href="#">Koszyk jest pusty</a></li>
                                    </ul>
                                <?php }?>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Rozwijane menu na telefonach -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Wyszukiwarka - Widoczna na telefonach -->
                    <div class="d-md-none">
                        <form class="d-flex flex-column mt-2" role="search">
                            <input class="form-control mb-2" type="search" placeholder="Wpisz czego szukasz"
                                aria-label="Search">
                            <div class="input-group mb-2">
                                <select class="form-select" aria-label="Wybierz kategorię">
                                    <option selected>Kategoria</option>
                                    <option value="1">Elektronika</option>
                                    <option value="2">Roślinność</option>
                                    <option value="3">Dom i Ogród</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Szukaj</button>
                        </form>
                    </div>

                    <!-- Koszyk, Kontakt, Login - Widoczne na telefonach i ustawione obok siebie -->
                    <ul class="navbar-nav d-md-none d-flex justify-content-between w-100 mt-2">
                        <!-- kontakt -->
                        <li class="nav-item flex-fill">
                            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Kontakt">
                                <i class="bi bi-telephone"></i> Kontakt
                            </a>
                        </li>
                        <!-- koszyk -->
                        <li class="nav-item flex-fill">
                            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Koszyk">
                                <i class="bi bi-cart"></i> Koszyk
                            </a>
                        </li>
                        <!-- moje konto -->
                        <li class="nav-item flex-fill dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdownMobile" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> Moje Konto
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdownMobile">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Zamówienia</a></li>
                                <li><a class="dropdown-item" href="#">Ustawienia</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Wyloguj się</a></li>
                            </ul>
                        </li>

                        <!-- zmiana motywu -->
                        <button id="theme-toggle-btn" class="btn" type="button" aria-label="Zmień motyw">
                            <i id="theme-icon" class="fa fa-moon-o"></i>
                        </button>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="alertsContainer"
            style="position: fixed; top: 10%; left: 50%; transform: translateX(-50%); z-index: 1050;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <div class="alert alert-dismissible fade show <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert"
                    style="margin-top: 5px; margin-bottom: 0px;">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1421146254673e8059e16c11_65891677', 'content');
?>


    </main>

    <hr class="featurette-divider">
    <div class="container">
        <footer class=" row row-cols-1 row-cols-sm-2 row-cols-md-5 py-1 my-4">
            <div class="col mb-3">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo"
                        style="height: 30px; width: auto; margin-bottom: 10px; vertical-align: middle;">

                    <p class="text-body-secondary">Yups</p>
                </a>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Zakupy</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Konto</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
cart" class="nav-link p-0 text-body-secondary">Koszyk</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
rodo" class="nav-link p-0 text-body-secondary">Polityka
                            prywatności</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
return_and_complaints" class="nav-link p-0 text-body-secondary">Zwroty i
                            reklamacje</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
help" class="nav-link p-0 text-body-secondary">Pomoc</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Informacje</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
delivery" class="nav-link p-0 text-body-secondary">Sposoby
                            dostawy</a></li>
                    <li class="nav-item mb-2"><a href="#categories" class="nav-link p-0 text-body-secondary">Kategorie</a>
                    </li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
statute" class="nav-link p-0 text-body-secondary">Regulamin</a>
                    </li>
                    <li class="nav-item mb-2"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
about" class="nav-link p-0 text-body-secondary">O nas</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Kontakt</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://www.facebook.com/people/Sklep-Yups/61560868432894/"
                            class="bi bi-facebook nav-link p-0 text-body-secondary"> Facebook</a></li>
                    <li class="nav-item mb-2"><a href="+48607538917"
                            class="bi bi-telephone nav-link p-0 text-body-secondary"> +48 607 538 917</a></li>
                    <li class="nav-item mb-2"><a href="Yups@spoko.pl"
                            class="bi bi-envelope nav-link p-0 text-body-secondary"> Yups@spoko.pl</a></li>

                </ul>
            </div>
        </footer>
    </div>
    <style>
        .cart-badge {
            position: absolute;
            top: 20px;
            right: -2px;
            background-color: rgba(233, 125, 1, 0.8);
            color: black;
            font-size: 7px;
            font-weight: bold;
            padding: 2px 2px;
            border-radius: 50%;
            min-width: 14px;
            min-height: 14px;
            text-align: center;
            z-index: 10;

            /* Dodane style do pełnego wyśrodkowania */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .d-none {
            display: none;
        }

        /* Ukryj rozwijane menu koszyka */
        .cart-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 9999;
            background-color: white;
            width: 200px;
            /* Szerokość menu */
        }

        /* Pokaż menu koszyka po najechaniu */
        .nav-item:hover .cart-dropdown-menu {
            display: block;
        }

        /* Stylowanie pozycji w menu koszyka */
        .cart-item {
            padding: 10px;
        }

        .cart-item a {
            text-decoration: none;
            color: black;
        }

        .cart-item a:hover {
            background-color: #f8f9fa;
        }
    </style>


    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        document.addEventListener("DOMContentLoaded", function() {
            // Pobierz wszystkie alerty
            const alerts = document.querySelectorAll('.alert');

            // Przeiteruj przez każdy alert i ustaw czas zniknięcia
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    // Użycie klasy fade, aby ukryć alert
                    alert.classList.remove('show');
                    alert.classList.add('fade');

                    // Usunięcie elementu po zakończeniu animacji
                    setTimeout(function() {
                        alert.remove();
                    }, 500); // Czas na zakończenie animacji (0.5 sekundy)
                }, 5000); // 10 sekundowe opóźnienie
            });
        });
    <?php echo '</script'; ?>
>
    <?php if ((isset($_smarty_tpl->tpl_vars['cart']->value))) {?>
        <?php $_smarty_tpl->_assignInScope('cartCount', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'quantity', false, 'productId');
$_smarty_tpl->tpl_vars['quantity']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['productId']->value => $_smarty_tpl->tpl_vars['quantity']->value) {
$_smarty_tpl->tpl_vars['quantity']->do_else = false;
?>
            <?php $_smarty_tpl->_assignInScope('cartCount', $_smarty_tpl->tpl_vars['cartCount']->value+$_smarty_tpl->tpl_vars['quantity']->value);?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php echo '<script'; ?>
>
            // Przekazanie danych koszyka z PHP do JavaScript
            const cart = <?php echo json_encode($_smarty_tpl->tpl_vars['cart']->value);?>
;
            const cartCount = <?php echo $_smarty_tpl->tpl_vars['cartCount']->value;?>
; // Liczba produktów w koszyku
            const miniCart = <?php echo json_encode($_smarty_tpl->tpl_vars['miniCart']->value);?>
;

            // Wyświetlenie koszyka w konsoli
            console.log('Zawartość koszyka:', cart);
            console.log('Liczba produktów w koszyku:', cartCount);
            console.log('Liczba mini_cart:', miniCart);

            // Aktualizacja liczby produktów w koszyku
            updateCartCount(cartCount);

            function updateCartCount(count) {
                const cartBadge = document.querySelector('.cart-badge');

                if (count > 0) {
                    cartBadge.textContent = count > 99 ? '99+' : count; // Wyświetl "99+" jeśli liczba > 99
                    cartBadge.classList.remove('d-none'); // Pokaż kółko
                } else {
                    cartBadge.classList.add('d-none'); // Ukryj kółko, jeśli koszyk jest pusty
                }
            }
        <?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php echo '<script'; ?>
>
            console.log('Brak zawartości koszyka:', cart);
        <?php echo '</script'; ?>
>
    <?php }?>
</body>


</html><?php }
/* {block 'content'} */
class Block_1421146254673e8059e16c11_65891677 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1421146254673e8059e16c11_65891677',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
