<?php
/* Smarty version 4.3.4, created on 2024-11-22 22:49:11
  from 'C:\xampp\htdocs\Sklep\app\views\management\discountCodeEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6740fc5762e894_79252290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fc6b7ba245898412197732a9a7264f7ea6048cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\discountCodeEdit.tpl',
      1 => 1732311792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6740fc5762e894_79252290 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15793624336740fc57623b13_46817012', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_15793624336740fc57623b13_46817012 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15793624336740fc57623b13_46817012',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
updateDiscountCode">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo po lewej stronie -->
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex align-items-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo" width="50" height="50">
            </a>

            <!-- Ikona info-circle po prawej stronie z szarym kolorem -->
            <a class="nav-link d-flex align-items-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/managementMain">
                <i class="bi bi-info-circle" style="font-size: 50px; color: #6c757d;" title="Wróć do zarządzania"></i>
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-3 fw-normal">
                Edytuj kod rabatowy
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <input type="hidden" name="idCode" value="<?php echo $_smarty_tpl->tpl_vars['discountCode']->value['id_code'];?>
"> <!-- Ukryte pole z ID kodu rabatowego -->

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="code_name" id="code_name" value="<?php echo $_smarty_tpl->tpl_vars['discountCode']->value['code_name'];?>
">
            <label for="code_name">Nazwa kodu</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="discount_value" id="discount_value" value="<?php echo $_smarty_tpl->tpl_vars['discountCode']->value['discount_value'];?>
">
            <label for="discount_value">Wartość rabatu (procent lub zł)</label>
        </div>

        <div class="form-floating">
            <select class="form-select down-field" name="discount_type" id="discount_type">
                <option value="percent" <?php if ($_smarty_tpl->tpl_vars['discountCode']->value['discount_type'] == 'percent') {?>selected<?php }?>>Procentowy</option>
                <option value="fixed" <?php if ($_smarty_tpl->tpl_vars['discountCode']->value['discount_type'] == 'fixed') {?>selected<?php }?>>Stały</option>
            </select>
            <label for="discount_type">Typ rabatu</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Edytuj kod rabatowy</button>
    </form>
<?php
}
}
/* {/block 'content'} */
}
