<?php
/* Smarty version 4.3.4, created on 2024-11-22 02:26:04
  from 'C:\xampp\htdocs\Sklep\app\views\management\deliveriesList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673fddac0097d6_03426898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa1111e6e70f80d20f61a0d289f129f35038a3fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\deliveriesList.tpl',
      1 => 1732238725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673fddac0097d6_03426898 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Dostaw</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj dostawy..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addDelivery" method="get" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Dodaj możliwość dostawy</button>
            </form>
        </div>
    </div>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa</th>
            <th>Koszt</th>
            <th>Szacowany czas</th>
            <th>Utworzona przez</th>
            <th>Data utworzenia</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deliveries']->value, 'delivery');
$_smarty_tpl->tpl_vars['delivery']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['id_delivery'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['name'];?>
</td>
                <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['delivery']->value['cost'],2,","," ");?>
&nbsp;zł</td>
                <td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['estimated_time'];?>
</td>
                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['delivery']->value['who_created'] ?? null)===null||$tmp==='' ? "Nieznany" ?? null : $tmp);?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['delivery']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                <td>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editDelivery" class="d-inline">
                        <input type="hidden" name="idDelivery" value="<?php echo $_smarty_tpl->tpl_vars['delivery']->value['id_delivery'];?>
">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteDelivery" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć tę dostawę?')">
                        <input type="hidden" name="idDelivery" value="<?php echo $_smarty_tpl->tpl_vars['delivery']->value['id_delivery'];?>
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
