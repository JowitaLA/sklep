<?php
/* Smarty version 4.3.4, created on 2024-11-29 03:43:53
  from 'C:\xampp\htdocs\Sklep\app\views\ProductsListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67492a6915b159_19638211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6910a41aca091549e519d15088d4f21441e06730' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ProductsListView.tpl',
      1 => 1732848232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67492a6915b159_19638211 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62487720067492a69134dd0_40133846', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_62487720067492a69134dd0_40133846 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_62487720067492a69134dd0_40133846',
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
/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
" onerror="
                            let formats = ['png', 'gif'];
                            let img = this;
                            let index = 0;

                            function tryNextFormat() {
                                if (index < formats.length) {
                                    img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['r']->value["url"];?>
/1.' + formats[index++];
                                    } else {
                                        img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                        }
                                    }

                            tryNextFormat();
                            this.onerror = tryNextFormat;
                        " class="img-fluid">
                        <h3 class="mt-3"><?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
</h3>
                        <div class="stars">
                            <?php $_smarty_tpl->_assignInScope('rating', (($tmp = $_smarty_tpl->tpl_vars['r']->value['rating'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));?>
                            <!-- Ustawienie wartości domyślnej dla ratingu -->
                            <?php $_smarty_tpl->_assignInScope('fullStars', floor($_smarty_tpl->tpl_vars['rating']->value));?>
                            <!-- Liczba pełnych gwiazdek -->
                            <?php $_smarty_tpl->_assignInScope('halfStar', floor($_smarty_tpl->tpl_vars['rating']->value*2)%2);?>
                            <!-- Sprawdzamy, czy jest połowa gwiazdki -->
                            <?php $_smarty_tpl->_assignInScope('emptyStars', 5-$_smarty_tpl->tpl_vars['fullStars']->value-$_smarty_tpl->tpl_vars['halfStar']->value);?>
                            <!-- Liczba pustych gwiazdek -->

                            <!-- Renderowanie pełnych gwiazdek -->
                            <?php
$__section_fullStars_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['fullStars']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_fullStars_0_total = $__section_fullStars_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_fullStars'] = new Smarty_Variable(array());
if ($__section_fullStars_0_total !== 0) {
for ($__section_fullStars_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_fullStars']->value['index'] = 0; $__section_fullStars_0_iteration <= $__section_fullStars_0_total; $__section_fullStars_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_fullStars']->value['index']++){
?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php
}
}
?>

                            <!-- Renderowanie pół gwiazdki -->
                            <?php if ($_smarty_tpl->tpl_vars['halfStar']->value == 1) {?>
                                <i class="fa fa-star-half" aria-hidden="true"></i>
                            <?php }?>

                            <!-- Renderowanie pustych gwiazdek -->
                            <?php
$__section_emptyStars_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emptyStars']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_emptyStars_1_total = $__section_emptyStars_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_emptyStars'] = new Smarty_Variable(array());
if ($__section_emptyStars_1_total !== 0) {
for ($__section_emptyStars_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_emptyStars']->value['index'] = 0; $__section_emptyStars_1_iteration <= $__section_emptyStars_1_total; $__section_emptyStars_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_emptyStars']->value['index']++){
?>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            <?php
}
}
?>
                        </div>
                        <p class="price mt-2 link-body-emphasis">
                            <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['r']->value["price"],2,","," ");?>
&nbsp;zł
                        </p>
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
