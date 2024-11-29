<?php
/* Smarty version 4.3.4, created on 2024-11-25 15:23:30
  from 'C:\xampp\htdocs\sklep\app\views\NewsletterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67448862a91b43_60220889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f97f85c83ae28e09e9821258bb76e2ad58b9a28e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\NewsletterView.tpl',
      1 => 1732544607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67448862a91b43_60220889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_138626507967448862a8de22_54312396', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_138626507967448862a8de22_54312396 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_138626507967448862a8de22_54312396',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container py-5">
        <h1 class="text-center pt-3">Zapisz się do Newslettera</h1>
        <p class="text-center mb-4">
            Dołącz do naszego newslettera, aby być na bieżąco z nowościami, promocjami i wyjątkowymi ofertami!
        </p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
submitNewsletter">
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Wpisz swój adres e-mail" required>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Zapisz się</button>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
