<?php
/* Smarty version 4.3.4, created on 2024-11-28 01:53:17
  from 'C:\xampp\htdocs\Sklep\app\views\OrderDetailsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6747befd627dc6_83515950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12b0e4f69b634d87f5e799d2ecfc6eff3823a588' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\OrderDetailsView.tpl',
      1 => 1732755195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6747befd627dc6_83515950 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4143340026747befd5e19e3_09446421', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_4143340026747befd5e19e3_09446421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4143340026747befd5e19e3_09446421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <style>
        .card:hover {
            transform: scale(1.01);
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
orders" class="nav-link active">
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
                <div class="col-md-12 bg-body-tertiary">
                    <div class="row m-2 mt-5 mb-5">
                        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['order']->value) > 0) {?>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="card bg-body-secondary">
                                        <!-- Pierwsza linia -->
                                        <div class="card-header">
                                            <div class="row">
                                                <!-- Lewa kolumna -->
                                                <div class="col-md-6">
                                                    <h4 class="mb-2">Nr zamówienia: <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['details']['id_order'];?>
</strong></span>
                                                    </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="mb-2 text-end">Data złożenia zamówienia: <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i><?php echo $_smarty_tpl->tpl_vars['order']->value['details']['created_at'];?>
</i></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2">Metoda płatności: <?php echo $_smarty_tpl->tpl_vars['order']->value['details']['payment_method'];?>
 <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i>(<?php echo $_smarty_tpl->tpl_vars['order']->value['details']['payment_status'];?>
)</i></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2 text-end">Metoda dostawy: <?php echo $_smarty_tpl->tpl_vars['order']->value['details']['delivery_method'];?>

                                                        <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i>(<?php echo $_smarty_tpl->tpl_vars['order']->value['details']['delivery_status'];?>
)</i></span>
                                                    </p>
                                                </div>

                                            </div>
                                            <!-- Status zamówienia na dole, wyśrodkowany -->
                                            <div class="text-center mt-3">
                                                <h5 class="mb-2 font-weight-bold">Status zamówienia:
                                                    <span
                                                        style="color:rgba(255, 136, 0, 0.7);"><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['details']['order_status'];?>
</strong></span>
                                                </h5>
                                            </div>
                                        </div>



                                        <!-- Druga linia -->
                                        <div class="card-body">
                                            <div class="row">
                                                <?php $_smarty_tpl->_assignInScope('total_sum', 0);?>
                                                <!-- zmienna do zsumowania wszystkich produktów -->
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                                    <div class="col-md-6">
                                                        <li class="m-1">
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['item']->value["image_url"];?>
/1.jpg"
                                                                alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"
                                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;"
                                                                onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                                    function tryNextFormat() {
                                                                        if (index < formats.length) {
                                                                            img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['item']->value["image_url"];?>
/1.' + formats[index++];
                                                                        } else {
                                                                            img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                                                        }
                                                                    } tryNextFormat(); this.onerror = tryNextFormat;">
                                                            <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
                                                        </li>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
 x <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value["item_cost"],2,","," ");?>
&nbsp;zł
                                                    </div>
                                                    <?php $_smarty_tpl->_assignInScope('total_sum', $_smarty_tpl->tpl_vars['total_sum']->value+($_smarty_tpl->tpl_vars['item']->value['quantity']*$_smarty_tpl->tpl_vars['item']->value["item_cost"]));?>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </div>
                                        </div>

                                        <!-- Trzecia linia -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orders">Wróć do listy zamówień</a>
                                                </div>
                                                <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['code_type'] == "percent") {?>
                                                    <?php $_smarty_tpl->_assignInScope('discount', ($_smarty_tpl->tpl_vars['total_sum']->value*$_smarty_tpl->tpl_vars['order']->value['details']['code_value']/100));?>
                                                <?php } else { ?>
                                                    <?php $_smarty_tpl->_assignInScope('discount', $_smarty_tpl->tpl_vars['order']->value['details']['code_value']);?>
                                                <?php }?>


                                                <div class="col-md-3 text-end">
                                                    <p class="mb-2"> <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['total_sum']->value,2,","," ");?>
&nbsp;zł</p>
                                                    <?php $_smarty_tpl->_assignInScope('delivery', ($_smarty_tpl->tpl_vars['order']->value['details']['total_cost']-$_smarty_tpl->tpl_vars['total_sum']->value+$_smarty_tpl->tpl_vars['discount']->value));?>

                                                    <p class="mb-2"><i>(dostawa)</i> +
                                                        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['delivery']->value,2,","," ");?>
&nbsp;zł</p>
                                                    <?php if ($_smarty_tpl->tpl_vars['discount']->value != 0) {?>
                                                        <p class="mb-2" style="color:rgba(255, 136, 0, 0.7);"><i>(kod:
                                                                <?php echo $_smarty_tpl->tpl_vars['order']->value['details']['code_name'];?>
)</i> -
                                                            <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['discount']->value,2,","," ");?>
&nbsp;zł</p>
                                                    <?php }?>
                                                    <hr width="100%">
                                                    <p class="mb-2">
                                                        <strong><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['order']->value['details']['total_cost'],2,","," ");?>
&nbsp;zł</strong>
                                                    </p>
                                                </div>
                                            </div>



                                            <p class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <h5 style="color:rgba(255, 136, 0, 0.7);">Adres dostawy: </h5>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['first_name'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['last_name'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['email'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['phone_number'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['street'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['house_number'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['postal_code'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['city'];?>
</h6>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <h5 style="color:rgba(255, 136, 0, 0.7);">Adres rozliczeń: </h5>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['first_name'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['last_name'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['email'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['phone_number'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['street'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['house_number'];?>
</h6>
                                                    <h6><?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['postal_code'];?>

                                                        <?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_billing']['city'];?>
</h6>
                                                </div>
                                            </div>
                                            <?php if ($_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['additional_info'] != null) {?>
                                                <div class="text-center"> Notka dla kuriera:
                                                    <i>"<?php echo $_smarty_tpl->tpl_vars['order_details']->value['address_shipping']['additional_info'];?>
"</i></div>
                                            <?php } else { ?>
                                                <div class="text-center"> Notka dla kuriera: <i>brak</i></div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <p>Nie masz szczegółów zamówień.</p>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orders">Wróć do listy zamówień</a>
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
