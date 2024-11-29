<?php
/* Smarty version 4.3.4, created on 2024-11-28 11:54:49
  from 'C:\xampp\htdocs\Sklep\app\views\NewsletterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67484bf9866ff0_07127158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2b41456f4e2b2022adf807ce6f8323e8185b1d7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\NewsletterView.tpl',
      1 => 1732791288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67484bf9866ff0_07127158 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203069089267484bf9862738_54797876', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_203069089267484bf9862738_54797876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_203069089267484bf9862738_54797876',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container mt-5 p-5 bg-body-tertiary rounded">
        <h1 class="text-center pt-3">Zapisz się do Newslettera</h1>
        <p class="text-center mb-4">
            Dołącz do naszego newslettera, aby być na bieżąco z nowościami, promocjami i wyjątkowymi ofertami!
        </p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
subscriptionNewsletter">
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Wpisz swój adres e-mail"
                    required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Zapisz się</button>
            </div>
        </form>

        <div class="row justify-content-end">
            <div class="col-md-5">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
unsubscriptionNewsletter">
                    <div class="input-group">
                        <label for="email" class="form-label text-end">Nie chcesz dostawać już od nas wiadomości związanych z promocjami, nowościami i ofertami?</label>
                        <input type="email" class="form-control rounded" id="email" name="email"
                            placeholder="Wpisz swój adres e-mail" required>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">
                            Wypisz się
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
