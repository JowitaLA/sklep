<?php
/* Smarty version 4.3.4, created on 2024-11-27 18:11:15
  from 'C:\xampp\htdocs\Sklep\app\views\WishlistView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674752b31f6b75_67767081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ca0f9bf0bc5b74ecd17c977e695b80ff10cc327' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\WishlistView.tpl',
      1 => 1732727474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674752b31f6b75_67767081 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_468490966674752b31d5458_33903853', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_468490966674752b31d5458_33903853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_468490966674752b31d5458_33903853',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
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
wishlistShow" class="nav-link active">
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
                <div class="col-md-12 bg-body-tertiary">
                    <div class="row m-2 mt-5">
                        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['wishlistProducts']->value) > 0) {?>
                            <div class="row">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlistProducts']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                    <div class="col-md-12 mb-2">
                                        <div class="card d-flex flex-row bg-body-secondary">
                                            <!-- Obrazek po lewej stronie -->
                                            <div class="d-flex align-items-center" style="width: 90px; height: 90px;">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.jpg"
                                                    alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;"
                                                    onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                  function tryNextFormat() {
                                                      if (index < formats.length) {
                                                          img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.' + formats[index++];
                                                      } else {
                                                          img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                                      }
                                                  } tryNextFormat(); this.onerror = tryNextFormat;">
                                            </div>

                                            <!-- Informacje o produkcie (nazwa, cena) -->
                                            <div class="card-body d-flex flex-column justify-content-center flex-grow-1">
                                                <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h5>
                                                <p class="card-text"><strong>Cena:</strong> <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2,","," ");?>
&nbsp;zł</p>
                                            </div>

                                            <!-- Akcje (usuń, sprawdź produkt) po prawej stronie -->
                                            <div class="d-flex align-items-center justify-content-end p-3">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
"
                                                    method="post" style="display:inline;">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Strona produktu">
                                                        <i class="bi bi-card-heading"></i>
                                                    </button>
                                                </form>
                                                &nbsp;
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
removeToWishlist" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Usuń">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php } else { ?>
                            <p>Nie masz żadnych produktów na swojej liście życzeń.</p>
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
