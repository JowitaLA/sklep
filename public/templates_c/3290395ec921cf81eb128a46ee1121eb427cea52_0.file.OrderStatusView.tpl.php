<?php
/* Smarty version 4.3.4, created on 2024-11-28 03:13:18
  from 'C:\xampp\htdocs\Sklep\app\views\OrderStatusView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6747d1bebf4c82_18600436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3290395ec921cf81eb128a46ee1121eb427cea52' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\OrderStatusView.tpl',
      1 => 1732759986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6747d1bebf4c82_18600436 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12113917876747d1bebf0824_36198445', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_12113917876747d1bebf0824_36198445 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12113917876747d1bebf0824_36198445',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container py-5">
        <h1 class="text-center pt-3">Sprawdź status zamówienia</h1>
        <p class="text-center mb-4">
            Wpisz numer zamówienia by sprawdzić, jaki ma status
        </p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderStatusShow">
            <div class="mb-3">
                <label for="id_order" class="form-label">Numer Zamówienia</label>
                <input type="text" class="form-control" id="id_order" name="id_order" placeholder="Wpisz swój numer zamówienia" required>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Sprawdź</button>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
