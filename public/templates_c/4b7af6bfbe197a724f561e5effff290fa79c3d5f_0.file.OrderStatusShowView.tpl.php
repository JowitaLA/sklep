<?php
/* Smarty version 4.3.4, created on 2024-11-28 03:20:00
  from 'C:\xampp\htdocs\Sklep\app\views\OrderStatusShowView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6747d35042dd88_75949286',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b7af6bfbe197a724f561e5effff290fa79c3d5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\OrderStatusShowView.tpl',
      1 => 1732760398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6747d35042dd88_75949286 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16661603386747d350425802_75114790', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_16661603386747d350425802_75114790 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16661603386747d350425802_75114790',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container py-5">
        <h1 class="text-center pt-3">Sprawdź status zamówienia</h1>
        <p class="text-center mb-4">
        <div class="row bg-body-tertiary p-4 rounded mb-3">
            <?php if ($_smarty_tpl->tpl_vars['status']->value == null) {?>
                <div class="col-md-12 text-center">
                    Wprowadzony został zły numer zamówienia.
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    Numer zamówienia: <?php echo $_smarty_tpl->tpl_vars['id']->value;?>

                </div>
                <div class="col-md-6 text-end">
                    Status: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                </div>
            <?php }?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Wróć do strony
                            głównej</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderStatus">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Sprawdź status
                            innego
                            zamówienia</button>
                    </div>
                </form>
            </div>
        </div>
<?php
}
}
/* {/block 'content'} */
}
