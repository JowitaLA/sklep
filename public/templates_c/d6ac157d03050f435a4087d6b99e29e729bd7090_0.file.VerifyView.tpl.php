<?php
/* Smarty version 4.3.4, created on 2024-10-15 20:28:54
  from 'C:\xampp\htdocs\Sklep\app\views\VerifyView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_670eb4666c48e6_00689804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ac157d03050f435a4087d6b99e29e729bd7090' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\VerifyView.tpl',
      1 => 1728999928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670eb4666c48e6_00689804 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1576616846670eb4666b68c5_10606522', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_1576616846670eb4666b68c5_10606522 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1576616846670eb4666b68c5_10606522',
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
