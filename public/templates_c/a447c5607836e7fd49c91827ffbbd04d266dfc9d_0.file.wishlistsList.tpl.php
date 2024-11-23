<?php
/* Smarty version 4.3.4, created on 2024-11-22 01:40:14
  from 'C:\xampp\htdocs\Sklep\app\views\management\wishlistsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673fd2ee3cd980_77116370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a447c5607836e7fd49c91827ffbbd04d266dfc9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\wishlistsList.tpl',
      1 => 1732236011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673fd2ee3cd980_77116370 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listy Życzeń</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control"
                autocomplete="off">
        </form>
    </div>

    <!-- Przycisk do przełączania widoków -->
    <div>
        <button id="toggleView" class="btn btn-outline-secondary">Przełącz na widok produktów</button>
    </div>
</div>

<!-- Tabela listy życzeń -->
<table id="wishlistTable" class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa Użytkownika</th>
            <th>Produkt</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlist']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['w']->value['user'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['w']->value['product'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<!-- Tabela produktów -->
<table id="productsTable" class="table table-striped table-sm" style="display: none;">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Liczba na liście życzeń</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlistProducts']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['product_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['wishlist_count'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
>
    const toggleButton = document.getElementById('toggleView');
    const wishlistTable = document.getElementById('wishlistTable');
    const productsTable = document.getElementById('productsTable');

    toggleButton.addEventListener('click', function() {
        if (wishlistTable.style.display === 'none') {
            wishlistTable.style.display = '';
            productsTable.style.display = 'none';
            toggleButton.textContent = 'Przełącz na widok produktów';
        } else {
            wishlistTable.style.display = 'none';
            productsTable.style.display = '';
            toggleButton.textContent = 'Przełącz na widok listy życzeń';
        }
    });
<?php echo '</script'; ?>
><?php }
}
