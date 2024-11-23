<?php
/* Smarty version 4.3.4, created on 2024-11-21 12:47:24
  from 'C:\xampp\htdocs\Sklep\app\views\management\usersList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673f1dcc29f344_73417890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4546b1342f03064e95b381efbe8b2d810293a135' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\usersList.tpl',
      1 => 1732189642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673f1dcc29f344_73417890 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Użytkownicy</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control"
                autocomplete="off">
        </form>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addUser" method="get" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Dodaj użytkownika</button>
            </form>
        </div>
    </div>
</div>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Login</th>
            <th>Hasło</th>
            <th>E-mail</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data rejestracji</th>
            <th>Ostatnie logowanie</th>
            <th>Status</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['mail'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['name'] == '') {?>
                    <td> - </td>
                <?php } else { ?>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['surname'] == '') {?>
                    <td> - </td>
                <?php } else { ?>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
</td>
                <?php }?>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['register_date'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['last_login'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['status'];?>
</td>
                <td>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editUser" method="post" style="display:inline;">
                        <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['status'] != 'inactive') {?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusUser" method="post" style="display:inline;">
                            <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
">
                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['status'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    <?php } else { ?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusUser" method="post" style="display:inline;">
                            <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
">
                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['status'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    <?php }?>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPass" method="post" style="display:inline;">
                        <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mail'];?>
">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Resetuj hasło</button>
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
    document.getElementById('search').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 1; i < cells.length; i++) { // Zaczynamy od 1, aby pominąć # (indeks)
                if (cells[i].textContent.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = ''; // Wyświetl wiersz
            } else {
                row.style.display = 'none'; // Ukryj wiersz
            }
        });
    });
<?php echo '</script'; ?>
>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas><?php }
}
