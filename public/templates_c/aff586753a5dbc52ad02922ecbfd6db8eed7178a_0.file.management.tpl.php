<?php
/* Smarty version 4.3.4, created on 2024-10-23 17:45:16
  from 'C:\xampp\htdocs\Sklep\app\views\templates\management.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67191a0c1cc846_25465857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aff586753a5dbc52ad02922ecbfd6db8eed7178a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\management.tpl',
      1 => 1729698315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67191a0c1cc846_25465857 (Smarty_Internal_Template $_smarty_tpl) {
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
/assets/dist/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/dashboard.rtl.css" rel="stylesheet">
</head>

<body>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main">
            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo"
                style="height: 25px; width: auto; vertical-align: middle;">
            Yups
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                    <svg class="bi">
                        <use xlink:href="#search" />
                    </svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list" />
                    </svg>
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#house-fill" />
                                    </svg>
                                    Panel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Zamówienia
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#cart" />
                                    </svg>
                                    Produkty
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#graph-up" />
                                    </svg>
                                    Analizy i raporty
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                            <span>Treść strony</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <svg class="bi">
                                    <use xlink:href="#plus-circle" />
                                </svg>
                            </a>
                        </h6>

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    O nas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Regulamin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Polityka prywatności
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Kontakt
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Zwroty i reklamacje
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Pomoc
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Sposoby Dostawy
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#gear-wide-connected" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#door-closed" />
                                    </svg>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_50845703467191a0c1cad88_67181377', 'content');
?>


        </div>
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/dashboard.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
/* {block 'content'} */
class Block_50845703467191a0c1cad88_67181377 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_50845703467191a0c1cad88_67181377',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
