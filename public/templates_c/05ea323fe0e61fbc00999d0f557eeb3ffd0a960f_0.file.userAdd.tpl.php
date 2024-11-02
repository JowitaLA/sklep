<?php
/* Smarty version 4.3.4, created on 2024-10-31 17:57:14
  from 'C:\xampp\htdocs\Sklep\app\views\management\userAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6723b6ea1d50f2_00909615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05ea323fe0e61fbc00999d0f557eeb3ffd0a960f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\userAdd.tpl',
      1 => 1730220018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6723b6ea1d50f2_00909615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8225412426723b6ea1ceff7_58783073', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_8225412426723b6ea1ceff7_58783073 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8225412426723b6ea1ceff7_58783073',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
createUser">
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

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="login" id="login" value="">
            <label for="login">Login</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="password" id="password" value="">
            <label for="login">Hasło</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control top-field" name="mail" id="mail" value="">
            <label for="mail">E-mail</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="name" id="name" value="">
            <label for="name">Imię</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="surname" id="surname" value="">
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
