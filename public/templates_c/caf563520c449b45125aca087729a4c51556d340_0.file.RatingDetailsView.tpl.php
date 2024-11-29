<?php
/* Smarty version 4.3.4, created on 2024-11-29 02:50:17
  from 'C:\xampp\htdocs\Sklep\app\views\RatingDetailsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67491dd9c1c8c9_37261867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'caf563520c449b45125aca087729a4c51556d340' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\RatingDetailsView.tpl',
      1 => 1732814074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67491dd9c1c8c9_37261867 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27623064567491dd9c07fb8_97793568', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_27623064567491dd9c07fb8_97793568 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_27623064567491dd9c07fb8_97793568',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .star-rating {
            direction: rtl;
            display: inline-block;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input:checked~label {
            color: #ffcc00;
        }

        .star-rating input:hover~label {
            color: #ffcc00;
        }

        .star-rating input:checked:hover~label {
            color: #ffcc00;
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
                        <?php if ((isset($_smarty_tpl->tpl_vars['rating']->value['id_product'])) && $_smarty_tpl->tpl_vars['rating']->value['id_product'] != null) {?>
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
submitRating" method="post" class="form">
                                <div class="mb-3 text-center">
                                    <div class="star-rating">
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = -1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (5) : 5-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 5, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                            <input type="radio" name="rating" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" id="star<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"
                                                <?php if ((isset($_smarty_tpl->tpl_vars['rating']->value['rating'])) && $_smarty_tpl->tpl_vars['rating']->value['rating'] == $_smarty_tpl->tpl_vars['i']->value) {?>checked<?php }?> required />
                                            <label for="star<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="fa fa-star" aria-label="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 gwiazdka"></label>
                                        <?php }
}
?>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="review" class="form-label">Twoja opinia <i>(max 255 znaków)</i></label>
                                    <textarea class="form-control" id="review" name="review" rows="4" maxlength="255"
                                        required><?php echo $_smarty_tpl->tpl_vars['rating']->value['review'];?>
</textarea>

                                </div>
                                <input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['rating']->value['id_product'];?>
">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Zatwierdź opinię</button>
                                </div>
                            </form>

                        <?php } else { ?>
                            <p class="text-center">Brak produktu, któremu chcesz wystawić recenzję.
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
ratings" method="post" style="display:inline;">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Wróć do recenzji">Wróć
                                        do recenzji</button>
                                </div>
                            </form>
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
