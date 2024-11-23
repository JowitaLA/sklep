<?php
/* Smarty version 4.3.4, created on 2024-11-22 01:54:25
  from 'C:\xampp\htdocs\Sklep\app\views\management\categoriesList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673fd641a45a59_51110412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a71cf9ac88e79796b76a6741137a5d13b9e34b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\categoriesList.tpl',
      1 => 1732236854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673fd641a45a59_51110412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Kategorii</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj kategorii..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-group me-2">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addCategory" method="get" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Dodaj kategorię</button>
            </form>
        </div>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Ikona</th>
            <th>Utworzona przez</th>
            <th>Data utworzenia</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
                <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['category']->value['description'],50,"...");?>
</td>
                <td><i class="<?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>
"></i></td>
                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['category']->value['who_add'] ?? null)===null||$tmp==='' ? "Nieznany" ?? null : $tmp);?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['category']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                <td>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editCategory" class="d-inline">
                        <input type="hidden" name="idCategory" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteCategory" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć tę kategorię?')">
                        <input type="hidden" name="idCategory" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Usuń</button>
                    </form>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
>
    document.getElementById('search').addEventListener('input', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let match = false;
            row.querySelectorAll('td').forEach(cell => {
                if (cell.textContent.toLowerCase().includes(filter)) {
                    match = true;
                }
            });

            row.style.display = match ? '' : 'none';
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
