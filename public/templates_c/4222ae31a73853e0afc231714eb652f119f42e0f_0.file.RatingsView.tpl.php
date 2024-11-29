<?php
/* Smarty version 4.3.4, created on 2024-11-28 16:48:26
  from 'C:\xampp\htdocs\Sklep\app\views\RatingsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674890ca4f8a47_55822289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4222ae31a73853e0afc231714eb652f119f42e0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\RatingsView.tpl',
      1 => 1732808882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674890ca4f8a47_55822289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1924766721674890ca4cc3a3_27980421', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_1924766721674890ca4cc3a3_27980421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1924766721674890ca4cc3a3_27980421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
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
account" class="nav-link link-body-emphasis"
                                        aria-current="page">
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
ratings" class="nav-link active">
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
userEdit">Zmiana Hasła</a></li>
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

                <div class="m-2 mt-5">
                    <div class="bg-body-secondary p-3 rounded border mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center mb-3">
                                <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ratings" method="post" role="search">
                                    <div class="input-group">
                                        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['search']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                                            placeholder="Szukaj produktów po nazwie" class="form-control"
                                            autocomplete="off">
                                        <button class="btn btn-secondary"
                                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Szukaj</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ratings" method="post">
                                    <input type="hidden" name="filter" value="rated">
                                    <button
                                        class="btn btn-outline-primary btn-sm <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'rated') {?>active<?php }?>">Ocenione</button>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ratings" method="post">
                                    <input type="hidden" name="filter" value="all">
                                    <button
                                        class="btn btn-outline-primary btn-sm <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'all') {?>active<?php }?>">Wszystkie</button>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ratings" method="post">
                                    <input type="hidden" name="filter" value="unrated">
                                    <button
                                        class="btn btn-outline-primary btn-sm <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'unrated') {?>active<?php }?>">Nieocenione</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['product']->value) > 0) {?>
                        <div class="row">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'prod');
$_smarty_tpl->tpl_vars['prod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->do_else = false;
?>
                                <div>
                                    <div class="card d-flex flex-row bg-body-secondary mb-2">
                                        <!-- Obrazek po lewej stronie -->
                                        <div class="d-flex align-items-center" style="width: 90px; height: 90px;">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['prod']->value["url"];?>
/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['prod']->value['name'];?>
"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                  function tryNextFormat() {
                                                      if (index < formats.length) {
                                                          img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['prod']->value["url"];?>
/1.' + formats[index++];
                                                      } else {
                                                          img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                                      }
                                                  } tryNextFormat(); this.onerror = tryNextFormat;">
                                        </div>

                                        <!-- Informacje o produkcie (nazwa, cena) -->
                                        <div class="card-body d-flex flex-column justify-content-center flex-grow-1">
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prod']->value['name'];?>
</h5>
                                        </div>

                                        <!-- Akcje (usuń, sprawdź produkt) po prawej stronie -->
                                        <div class="d-flex align-items-center justify-content-end p-3">
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['prod']->value["url"];?>
" method="post"
                                                style="display:inline;">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                    title="Strona produktu">
                                                    <i class="bi bi-card-heading"></i>
                                                </button>
                                            </form>
                                            <?php if ($_smarty_tpl->tpl_vars['prod']->value['isRating']) {?>
                                                &nbsp;
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Usuń recenzję">
                                                        <i class="bi bi-trash2"></i>
                                                    </button>
                                                </form>
                                                &nbsp;
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editorRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Edytuj recenzję">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </form>
                                            <?php } else { ?>
                                                &nbsp;
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editorRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Dodaj recenzję">
                                                        <i class="bi bi-star-half"></i>
                                                    </button>
                                                </form>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                <?php } else { ?>
                    <p class="text-center mt-5">Nie masz produktów do oceny.</p>
                <?php }?>
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
