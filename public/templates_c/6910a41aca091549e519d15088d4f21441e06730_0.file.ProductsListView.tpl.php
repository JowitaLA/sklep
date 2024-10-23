<?php
/* Smarty version 4.3.4, created on 2024-10-21 17:42:18
  from 'C:\xampp\htdocs\Sklep\app\views\ProductsListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6716765a195118_24008575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6910a41aca091549e519d15088d4f21441e06730' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ProductsListView.tpl',
      1 => 1729525337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6716765a195118_24008575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2382378406716765a177d62_16397475', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_2382378406716765a177d62_16397475 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2382378406716765a177d62_16397475',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <section class="pt-5 text-center container bg-body-tertiary mt-4">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <?php if ($_smarty_tpl->tpl_vars['searchName']->value == 'NULL') {?><h1 class="fw-light">Wyszukania dla "<?php echo $_smarty_tpl->tpl_vars['searchName']->value;?>
"</h1><?php }?>
                <p class="lead text-body-secondary">Znaleźliśmy dla Ciebie <?php echo $_smarty_tpl->tpl_vars['countProducts']->value;?>

                    ofert<?php if ($_smarty_tpl->tpl_vars['countProducts']->value == '1') {?>ę<?php }
if ($_smarty_tpl->tpl_vars['countProducts']->value >= '2' && $_smarty_tpl->tpl_vars['countProducts']->value <= '4') {?>y<?php }?></p>
                <p>(w przyszłości miejsce na sortowanie po opiniach oraz cenach)</p>
            </div>
        </div>
    </section>

    <div class="container marketing bg-body-tertiary py-4" style="margin-top:10px;">
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['r']->value["url"];?>
" class="col-md-3 mb-2">
                    <div class="product-card" fill="var(--bs-secondary-color)">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['r']->value["url"];?>
/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
"
                            class="img-fluid">
                        <h3 class="mt-3"><?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
</h3>
                        <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                        <p class="price mt-2"><?php ob_start();
echo $_smarty_tpl->tpl_vars['r']->value["price"];
$_prefixVariable1 = ob_get_clean();
echo smarty_modifier_number_format($_prefixVariable1,2,","," ");?>
&nbsp;zł</p>
                    </div>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
