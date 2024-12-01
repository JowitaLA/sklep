<?php
/* Smarty version 4.3.4, created on 2024-11-25 16:10:42
  from 'C:\xampp\htdocs\sklep\app\views\CartView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67449372e5ca93_10291427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f191d60a0e8ddf276f8dda22cdd62a1905902a2b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\CartView.tpl',
      1 => 1732361444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67449372e5ca93_10291427 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185100206267449372e3b075_49311188', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27494767867449372e3c3a7_38361270', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'head'} */
class Block_185100206267449372e3b075_49311188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_185100206267449372e3b075_49311188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .step-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 25%;
            right: 0;
            width: 85%;
            height: 2px;
            background-color: #ccc;
            z-index: -1;
            transform: translateX(50%);
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(51, 51, 51);
            border-color: rgba(233, 125, 1, 0.5);
            border: 10px;
            color: white;
            line-height: 40px;
            font-weight: bold;
            margin: 0 auto 10px auto;
            z-index: 1;
            /* Numerki muszą być na wierzchu */
        }

        .step-title {
            font-size: 14px;
            color: white;
        }

        .step.active .step-number {
            background-color: rgba(233, 125, 1);
            border-color: rgba(255, 136, 0, 0.5);
            border: 10px;
        }

        .step.back .step-number {
            background-color: rgba(255, 136, 0, 0.5);
            border-color: rgba(233, 125, 1, 0.5);
        }

        .step.active .step-title {
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="step-container">
            <!-- Step 1 -->
            <div class="step active">
                <div class="step-number">1</div>
                <div class="step-title">Koszyk</div>
            </div>
            <!-- Step 2 -->
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-title">Dostawa</div>
            </div>
            <!-- Step 3 -->
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-title">Płatność</div>
            </div>
            <!-- Step 4 -->
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-title">Gotowe</div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'content'} */
class Block_27494767867449372e3c3a7_38361270 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_27494767867449372e3c3a7_38361270',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <style>
        .btn-sm-custom {
            width: 2rem;
            height: 2rem;
            font-size: 1rem;
            padding: 0;
        }
    </style>

    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-9">
                <div id="description" contenteditable="true" spellcheck="false" style="min-height:100%;">
                    <div class="row py-lg-5">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 100px; height: 100px;"></th>
                                    <th>Produkt</th>
                                    <th class="text-center">Liczba</th>
                                    <th>Cena</th>
                                    <th class="text-center">Akcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.jpg"
                                                    alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"
                                                    style="width: 100px; height: 100px; object-fit:contain; border-radius: 5px;border-color:black;"
                                                    onerror="
                        let formats = ['png', 'gif'];
                        let img = this;
                        let index = 0;

                        function tryNextFormat() {
                            if (index < formats.length) {
                                img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.' + formats[index++];
                            } else {
                                img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                            }
                        }

                        tryNextFormat();
                        this.onerror = tryNextFormat;
                                ">
                                        </td>
                                        <td><a
                                                href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeCart" class="me-2">
                                                    <input type="hidden" name="product_ID" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                                    <input type="hidden" name="quantity" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
">
                                                    <input type="hidden" name="action" value="add">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </form>

                                                <span id="valueDisplay-<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="mx-2"><?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
</span>

                                                <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeCart" class="ms-2">
                                                    <input type="hidden" name="product_ID" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                                    <input type="hidden" name="quantity" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
">
                                                    <input type="hidden" name="action" value="remove">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2,","," ");?>
&nbsp;zł</td>
                                        <td class="text-center">
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteCart" method="post" style="display:inline;">
                                                <input type="hidden" name="product_ID" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="Usuń"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                            <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/addToWishlist" method="post" style="display:inline;">
                                                    <input type="hidden" name="idProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                                    <input type="hidden" name="action" value='cart'>
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Dodaj do Listy Życzeń">
                                                        <i class="bi bi-bookmark-heart"></i>
                                                    </button>
                                                </form>
                                            <?php }?>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
"
                                                method="post" style="display:inline;">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                    title="Strona produktu"><i class="bi bi-card-heading"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>

                        <!-- Dodanie przycisku "Wybierz metodę dostawy" -->

                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="row py-lg-5">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Podsumowanie Koszyka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Wartość produktów:</span>
                                        <span>
                                            <?php $_smarty_tpl->_assignInScope('total', 0);?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+($_smarty_tpl->tpl_vars['product']->value['price']*$_smarty_tpl->tpl_vars['product']->value['quantity']));?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['total']->value,2,","," ");?>
 zł
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Dostawa:</span>
                                        <span>od przykład zł</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Rabat:</span>
                                        <span style="color:red">- 0 zł</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
applyDiscount">
                            <div class="input-group">
                                <input type="text" name="discount_code" class="form-control"
                                    placeholder="Wpisz kod rabatowy" aria-label="Kod rabatowy">
                                <button type="submit" class="btn btn-primary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Zatwierdź</button>
                            </div>
                        </form>

                        <h5 class="text-center mt-3">Do zapłaty: 1 350zł</h5>

                        <div class="text-center">
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
delivery" method="post">
                                <button type="submit" class="btn btn-secondary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Przejdź
                                    do Dostawy</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>
<?php
}
}
/* {/block 'content'} */
}