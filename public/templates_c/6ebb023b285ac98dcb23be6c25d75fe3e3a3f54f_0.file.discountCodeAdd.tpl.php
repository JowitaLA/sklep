<?php
/* Smarty version 4.3.4, created on 2024-11-22 22:46:39
  from 'C:\xampp\htdocs\Sklep\app\views\management\discountCodeAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6740fbbf682cd1_85743471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ebb023b285ac98dcb23be6c25d75fe3e3a3f54f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\discountCodeAdd.tpl',
      1 => 1732311718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6740fbbf682cd1_85743471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20279981526740fbbf67c970_63893624', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_20279981526740fbbf67c970_63893624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20279981526740fbbf67c970_63893624',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
createDiscountCode">
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
                Dodaj kod rabatowy
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="code_name" id="code_name" value="">
            <label for="code_name">Nazwa kodu</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="discount_value" id="discount_value" value="">
            <label for="discount_value">Wartość rabatu (procent lub zł)</label>
        </div>

        <div class="form-floating">
            <select class="form-select middle-field" name="discount_type" id="discount_type">
                <option value="percent">Procentowy</option>
                <option value="fixed">Stały</option>
            </select>
            <label for="discount_type">Typ rabatu</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Dodaj kod rabatowy</button>
    </form>
<?php
}
}
/* {/block 'content'} */
}
