<?php
/* Smarty version 4.3.4, created on 2024-11-29 00:51:22
  from 'C:\xampp\htdocs\Sklep\app\views\ReturnEditorView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674901fa4e2313_48004407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2cc3f04ff406719265d91bb86990b7084bdab3c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ReturnEditorView.tpl',
      1 => 1732837880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674901fa4e2313_48004407 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_31536153674901fa4d0291_87829064', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_31536153674901fa4d0291_87829064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_31536153674901fa4d0291_87829064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-12 bg-body-tertiary rounded">
                <div class="col-md-12 ">
                    <h2 class="mt-4 mb-4 text-center">Reklamacje i Zwrot</h2>
                    <h4 class="mb-3">Wybierz przedmiot, jakiego będzie dotyczyć zwrot</h4>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addReturn">
                        <div class="row mb-4">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->index = -1;
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_smarty_tpl->tpl_vars['product']->index++;
$_smarty_tpl->tpl_vars['product']->first = !$_smarty_tpl->tpl_vars['product']->index;
$__foreach_product_0_saved = $_smarty_tpl->tpl_vars['product'];
?>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check d-flex align-items-center bg-body-secondary rounded">
                                        <input class="form-check-input m-2" type="radio" name="id_product"
                                            id="product<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['product']->first) {?>checked<?php }?>>
                                        <label class="form-check-label"
                                            for="product<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                                            <div class="m-3 d-flex align-items-center">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.jpg"
                                                    alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"
                                                    style="width: 100px; height: 100px; object-fit: contain; border-radius: 5px;"
                                                    onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                function tryNextFormat() {
                                                if (index < formats.length) {
                                                img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value["url"];?>
/1.' + formats[index++];
                                                } else {
                                                img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                                                }
                                                } tryNextFormat(); this.onerror = tryNextFormat;">
                                                <h5>&nbsp;<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h5>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>

                        <h5 class="mb-3">Opisz nam, dlaczego chcesz zwrócić ten produkt</h5>
                        <div class="form-group mb-4">
                            <textarea class="form-control" name="reason" id="reason" rows="5" maxlength="1000"
                                placeholder="Wpisz powód zwrotu..." required></textarea>
                            <small class="form-text text-muted">Pozostało znaków: <span
                                    id="remainingChars">1000</span></small>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>
">
                            <button type="submit" class="btn mb-4" style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Zwróć produkt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php echo '<script'; ?>
>
        const reasonInput = document.getElementById('reason');
        const remainingChars = document.getElementById('remainingChars');

        reasonInput.addEventListener('input', () => {
            const maxLength = parseInt(reasonInput.getAttribute('maxlength'), 10);
            const currentLength = reasonInput.value.length;
            remainingChars.textContent = maxLength - currentLength;
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
