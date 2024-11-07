<?php
/* Smarty version 4.3.4, created on 2024-11-07 16:20:44
  from 'C:\xampp\htdocs\Sklep\app\views\management\userEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_672cdacc97cdd1_66948727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02d0ab7be72beb03a7e4a98af7b53091686d92a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\userEdit.tpl',
      1 => 1730992840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672cdacc97cdd1_66948727 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_830369303672cdacc973dd1_47285170', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/edit.tpl");
}
/* {block 'content'} */
class Block_830369303672cdacc973dd1_47285170 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_830369303672cdacc973dd1_47285170',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
updateUser">
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
                Dodaj użytkownika
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
"> <!-- Dodane ukryte pole -->

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
">
            <label for="login">Login</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control middle-field" name="mail" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mail'];?>
">
            <label for="mail">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
            <label for="name">Imię</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control down-field" name="surname" id="surname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
">
            <label for="surname">Nazwisko</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Dodaj użytkownika</button>
    </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
