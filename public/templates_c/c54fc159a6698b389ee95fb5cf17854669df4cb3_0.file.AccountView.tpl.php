<?php
/* Smarty version 4.3.4, created on 2024-11-27 19:03:45
  from 'C:\xampp\htdocs\Sklep\app\views\AccountView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67475f01e364d7_67913715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c54fc159a6698b389ee95fb5cf17854669df4cb3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\AccountView.tpl',
      1 => 1732727469,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67475f01e364d7_67913715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150330291467475f01e23076_69896383', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_150330291467475f01e23076_69896383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_150330291467475f01e23076_69896383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .card:hover {
            transform: scale(1.05);
            /* Powiększenie */
            filter: brightness(1.2);
            /* Rozjaśnienie */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Płynne przejścia */
        }
    </style>
    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-3">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="height:100%; top: 0; left: 0;">
                    <div class="position-sticky" style="top: 0;">
                        <div class="row py-lg-3">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
account"
                                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                                <span class="fs-4">Hej <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
!</span>
                            </a>
                            <hr style="margin-top:2%">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
account" class="nav-link active" aria-current="page">
                                        <i class="bi-house-fill pe-none me-2" width="16" height="16"></i>
                                        Panel użytkownika
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orders" class="nav-link link-body-emphasis">
                                        <i class="bi-bag-fill pe-none me-2" width="16" height="16"></i>
                                        Sprawdź Zamówienia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
ratings" class="nav-link link-body-emphasis">
                                        <i class="bi-stars pe-none me-2" width="16" height="16"></i>
                                        Wystaw Recenzje
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
returnOrderShow" class="nav-link link-body-emphasis">
                                        <i class="bi-recycle pe-none me-2" width="16" height="16"></i>
                                        Zwroty i reklamacje
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wishlistShow" class="nav-link link-body-emphasis">
                                        <i class="bi-bag-heart-fill pe-none me-2" width="16" height="16"></i>
                                        Lista Życzeń
                                    </a>
                                </li>
                                <hr>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
newsletter" class="nav-link link-body-emphasis">
                                        <i class="bi-newspaper pe-none me-2" width="16" height="16"></i>
                                        Newsletter
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
feedback" class="nav-link link-body-emphasis">
                                        <i class="bi-clipboard2-check-fill pe-none me-2" width="16" height="16"></i>
                                        Feedback
                                    </a>
                                </li>
                            </ul>
                            <hr style="margin-top: 25%;">
                            <!-- Dropdown umieszczony na dole -->
                            <div class="dropdown dropup">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main"
                                    class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</strong>
                                </a>
                                <ul class="dropdown-menu text-small shadow">
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit">Dane Osobowe</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit">Zmiana Hasła</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit">Adresy</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj się</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-9 bg-body-tertiary">
                <div class="bg-body-secondary p-3 rounded border mt-3">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <!-- Tekst: Jesteś z nami już -->
                        <div class="col d-flex justify-content-start align-items-center p-4">
                            Jesteś z nami już&nbsp;<span style="color:rgba(255, 136, 0, 0.7);"><?php echo $_smarty_tpl->tpl_vars['registerTime']->value;?>
</span>
                        </div>

                        <!-- Tekst: Zrobiłeś już u nas -->
                        <div class="col d-flex justify-content-end align-items-center p-4 ">
                            Zrobiłeś już u nas&nbsp;
                            <span style="color:rgba(255, 136, 0, 0.7);"><?php echo $_smarty_tpl->tpl_vars['purchaseCount']->value;?>
</span>&nbsp;<?php ob_start();
echo $_smarty_tpl->tpl_vars['purchaseCount']->value;
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['purchaseCount']->value;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable1 <= 4 && $_prefixVariable2 >= 1) {
ob_start();
echo $_smarty_tpl->tpl_vars['purchaseCount']->value;
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3 == 1) {?>zamówienie<?php } else { ?>zamówienia<?php }
} else { ?>zamówień<?php }?>
                        </div>
                    </div>
                    <div class="row row-cols-1">
                        <!-- Tekst: Dziękujemy -->
                        <div class="col text-center">
                            <h4 style="color:rgba(255, 136, 0, 0.7);">Dziękujemy!</h4>
                        </div>
                    </div>
                </div>


                <div class="row row-cols-1 row-cols-md-4 g-4 mt-1 mb-3">
                    <!-- Kafelek: Dane Osobowe -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-person-badge-fill display-4"></i>
                                <h5 class="card-title mt-3">Dane Osobowe</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Bezpieczeństwo -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-shield-lock-fill display-4"></i>
                                <h5 class="card-title mt-3">Bezpieczeństwo</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Newsletter -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
newsletter"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-newspaper display-4"></i>
                                <h5 class="card-title mt-3">Newsletter</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Feedback -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
feedback"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-clipboard2-check-fill display-4"></i>
                                <h5 class="card-title mt-3">Feedback</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Zamówienia -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orders"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-bag-fill display-4"></i>
                                <h5 class="card-title mt-3">Zamówienia</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Opinie -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
ratings"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-stars display-4"></i>
                                <h5 class="card-title mt-3">Opinie</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Lista Życzeń -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wishlistShow"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-bag-heart-fill display-4"></i>
                                <h5 class="card-title mt-3">Lista Życzeń</h5>
                            </div>
                        </a>
                    </div>
                    <!-- Kafelek: Zwroty i reklamacje -->
                    <div class="col">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
returnOrderShow"
                            class="card text-center text-decoration-none bg-body-secondary h-100">
                            <div class="card-body">
                                <i class="bi bi-recycle display-4"></i>
                                <h5 class="card-title mt-3">Zwroty i reklamacje</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php
}
}
/* {/block 'content'} */
}
