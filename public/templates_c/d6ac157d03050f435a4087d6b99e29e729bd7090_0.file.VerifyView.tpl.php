<?php
/* Smarty version 4.3.4, created on 2024-10-22 03:20:00
  from 'C:\xampp\htdocs\Sklep\app\views\VerifyView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6716fdc0e72c83_10362994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ac157d03050f435a4087d6b99e29e729bd7090' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\VerifyView.tpl',
      1 => 1729343122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6716fdc0e72c83_10362994 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10951001866716fdc0e69dd6_95342427', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_10951001866716fdc0e69dd6_95342427 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10951001866716fdc0e69dd6_95342427',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex mb-4">
            <!-- Dodany link do strony głównej -->
            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="50" height="50">
        </a>
        <h1 class="h3 mb-3 fw-normal">
            Weryfikacja konta
        </h1>
        <div style="text-align: center;">
            <?php echo $_smarty_tpl->tpl_vars['verify_message']->value;?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['verify_message']->value == "Aktywacja użytkownika przebiegła pomyślnie. Zaloguj się na swoje konto.") {?>
            <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/loginShow'"
                class="btn btn-primary w-100 py-2">Przejdź do Logowania</button>
        <?php } else { ?>
            <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main'"
                class="btn btn-primary w-100 py-2 mt-2">Wróć do Strony Głównej</button>
        <?php }?>
    </form>
<?php
}
}
/* {/block 'content'} */
}
