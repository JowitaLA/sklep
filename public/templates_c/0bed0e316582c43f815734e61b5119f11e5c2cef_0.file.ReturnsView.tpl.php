<?php
/* Smarty version 4.3.4, created on 2024-11-29 00:52:26
  from 'C:\xampp\htdocs\Sklep\app\views\ReturnsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6749023a434b03_75552266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bed0e316582c43f815734e61b5119f11e5c2cef' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ReturnsView.tpl',
      1 => 1732837942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6749023a434b03_75552266 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1042865056749023a42fdb6_25539515', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_1042865056749023a42fdb6_25539515 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1042865056749023a42fdb6_25539515',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container mt-5 p-5 bg-body-tertiary rounded">
        <h1 class="text-center pt-3">Zwroty i Gwarancje</h1>
        <p class="text-center mb-4">
            Wpisz numer zamówienia, którego dotyczyć ma zwrot.
        </p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showOrderReturns">
            <div class="mb-3">
                <label for="id_order" class="form-label">Wpisz numer zamówienia</label>
                <input type="text" class="form-control" id="id_order" name="id_order" placeholder="Wpisz numer zamówienia"
                    required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Przejdź dalej</button>
            </div>
        </form>

        <div class="row justify-content-end mt-3">
            <div class="col-md-6">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
statusReturn">
                    <div class="input-group">
                        <label for="id_order" class="form-label text-end"></label>
                        <input type="text" class="form-control rounded" id="id_order" name="id_order"
                            placeholder="Chcesz sprawdzić status zwrotu? Wpisz numer zwrotu" required>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">
                            Sprawdź status
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
<?php
}
}
/* {/block 'content'} */
}
