<?php
/* Smarty version 4.3.4, created on 2024-11-19 14:12:07
  from 'C:\xampp\htdocs\Sklep\app\views\templates\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673c8ea7d2ec77_26927868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '412982e78d0e3f510948c6109613a91e902bc237' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\order.tpl',
      1 => 1732017875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673c8ea7d2ec77_26927868 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_533721302673c8ea7cc6337_18262247', 'content');
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
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Koszyk</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Polityka
                            prywatności</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Zwroty i
                            reklamacje</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pomoc</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Informacje</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Sposoby
                            dostawy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kategorie</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Regulamin</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">O nas</a></li>
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
class Block_533721302673c8ea7cc6337_18262247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_533721302673c8ea7cc6337_18262247',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
