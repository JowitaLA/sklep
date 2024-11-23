<?php
/* Smarty version 4.3.4, created on 2024-11-22 02:03:32
  from 'C:\xampp\htdocs\Sklep\app\views\management\categoryEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673fd864cd1742_71252923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ef11e248bf188ff9caa108ef7e7c90509908774' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\categoryEdit.tpl',
      1 => 1732237042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673fd864cd1742_71252923 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1690023581673fd864cca481_58655185', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_1690023581673fd864cca481_58655185 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1690023581673fd864cca481_58655185',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
updateCategory">
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
                Edytuj kategorię
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <input type="hidden" name="idCategory" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
"> <!-- Ukryte pole -->

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
">
            <label for="name">Nazwa kategorii</label>
        </div>

        <div class="form-floating">
            <textarea class="form-control middle-field" name="description" id="description" rows="3"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</textarea>
            <label for="description">Opis kategorii</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control down-field" name="icon" id="icon" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>
">
            <label for="icon">Ikona kategorii</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Edytuj kategorię</button>
    </form>
<?php
}
}
/* {/block 'content'} */
}
