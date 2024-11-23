<?php
/* Smarty version 4.3.4, created on 2024-11-22 22:45:09
  from 'C:\xampp\htdocs\Sklep\app\views\management\discountCodesList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6740fb6534d520_41430228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1b8a8205e74bf82d2e7d571ef9dbc9cb4b06716' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\discountCodesList.tpl',
      1 => 1732311828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6740fb6534d520_41430228 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),2=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Kodów Rabatowych</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj kodu rabatowego..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addDiscountCode" method="get" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Dodaj kod rabatowy</button>
            </form>
        </div>
    </div>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa Kod</th>
            <th>Wartość Rabatu</th>
            <th>Typ Rabatu</th>
            <th>Utworzony Przez</th>
            <th>Data Utworzenia</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['discountCodes']->value, 'code');
$_smarty_tpl->tpl_vars['code']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['code']->value) {
$_smarty_tpl->tpl_vars['code']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value['id_code'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value['code_name'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['code']->value['discount_type'] == 'percent') {?>
                        <?php echo $_smarty_tpl->tpl_vars['code']->value['discount_value'];?>
% 
                    <?php } else { ?>
                        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['code']->value['discount_value'],2,","," ");?>
&nbsp;zł
                    <?php }?>
                </td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['code']->value['discount_type']);?>
</td>
                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['code']->value['who_created'] ?? null)===null||$tmp==='' ? "Nieznany" ?? null : $tmp);?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['code']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                <td>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editDiscountCode" class="d-inline">
                        <input type="hidden" name="idCode" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['id_code'];?>
">
                        <button class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteDiscountCode" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć ten kod rabatowy?')">
                        <input type="hidden" name="idCode" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['id_code'];?>
">
                        <button class="btn btn-sm btn-outline-secondary">Usuń</button>
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
