<?php
/* Smarty version 4.3.4, created on 2024-11-26 15:36:54
  from 'C:\xampp\htdocs\Sklep\app\views\management\deliveryAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6745dd06e773f0_76020207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e238172d091e36f12fc5f4e19e2595cd38af01b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\deliveryAdd.tpl',
      1 => 1732630640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6745dd06e773f0_76020207 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15745392596745dd06e70914_01962238', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_15745392596745dd06e70914_01962238 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15745392596745dd06e70914_01962238',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
createDelivery" enctype="multipart/form-data">

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
                Dodaj dostawę
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="name" id="name" value="">
            <label for="name">Nazwa dostawy</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="cost" id="cost" value="">
            <label for="cost">Koszt dostawy (zł.gr)</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="estimated_time" id="estimated_time" value="">
            <label for="estimated_time">Czas dostawy</label>
        </div>

        <div class="form-floating">
            <input type="file" class="form-control down-field" name="delivery_icon" id="delivery-icon" accept="image/*">
            <label for="delivery-icon">Ikona dostawy (JPG/PNG)</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Dodaj dostawę</button>
    </form>
<?php
}
}
/* {/block 'content'} */
}
