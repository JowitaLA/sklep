<?php
/* Smarty version 4.3.4, created on 2024-11-29 00:53:25
  from 'C:\xampp\htdocs\Sklep\app\views\ReturnStatusView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67490275d20364_37357475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88c6e923636c8641b1845b278bd98331b01adbfd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ReturnStatusView.tpl',
      1 => 1732838004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67490275d20364_37357475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_205821202567490275d18c97_19038193', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_205821202567490275d18c97_19038193 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_205821202567490275d18c97_19038193',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container py-5">
        <h1 class="text-center pt-3">Sprawdź status zwrotu</h1>
        <p class="text-center mb-4">
        <div class="row bg-body-tertiary p-4 rounded mb-3">
            <?php if ($_smarty_tpl->tpl_vars['status']->value == null) {?>
                <div class="col-md-12 text-center">
                    Wprowadzony został zły numer zwrotu.
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    Numer zwrotu: <?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>

                </div>
                <div class="col-md-6 text-end">
                    Status: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                </div>
            <?php }?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Wróć do strony
                            głównej</button>
                    </div>
                </form>
            </div>
        </div>
<?php
}
}
/* {/block 'content'} */
}
