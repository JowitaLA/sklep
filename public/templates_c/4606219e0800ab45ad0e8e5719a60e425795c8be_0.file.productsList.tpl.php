<?php
/* Smarty version 4.3.4, created on 2024-11-04 12:16:07
  from 'C:\xampp\htdocs\Sklep\app\views\management\productsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6728acf718c326_42377670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4606219e0800ab45ad0e8e5719a60e425795c8be' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\productsList.tpl',
      1 => 1730718963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6728acf718c326_42377670 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('showInactive', true);?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produkty</h1>
    <div class="col-md-9 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control" autocomplete="off">
            <button type="button" id="toggleInactive" class="btn btn-sm btn-outline-secondary" style="width:30%">Ukryj nieaktywne produkty</button>
            <input type="hidden" name="showInactive" id="showInactiveInput" value="0"> <!-- Ukryte pole -->
        </form>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addProduct" method="get" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Dodaj produkt</button>
            </form>
        </div>
    </div>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa</th>
            <th>Kategorie</th>
            <th>Opis</th>
            <th>Ilość</th>
            <th>Cena</th>
            <th>Kto dodał</th>
            <th>Data utworzenia produktu</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody id="productTable">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status_produktu'] == 'active' || $_smarty_tpl->tpl_vars['showInactive']->value == "1") {?>             <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id_produktu'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['nazwa_produktu'] != null) {?>
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['nazwa_produktu'];?>

                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td>
                    <?php $_smarty_tpl->_assignInScope('shortLength', '');?>

                    <?php if ($_smarty_tpl->tpl_vars['product']->value['kategorie'] != null) {?>
                        <?php if ($_smarty_tpl->tpl_vars['product']->value['kategorie'] != $_smarty_tpl->tpl_vars['shortLength']->value) {?>
                            <span class="lenght-short"><?php echo $_smarty_tpl->tpl_vars['shortLength']->value;?>
</span>
                            <span class="lenght-short" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['product']->value['kategorie'];?>
</span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['product']->value['kategorie'];?>

                        <?php }?>
                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td>
                    <?php $_smarty_tpl->_assignInScope('shortLength', '');?>

                    <?php if ($_smarty_tpl->tpl_vars['product']->value['opis_produktu'] != null) {?>
                        <?php if ($_smarty_tpl->tpl_vars['product']->value['opis_produktu'] != $_smarty_tpl->tpl_vars['shortLength']->value) {?>
                            <span class="lenght-short"><?php echo $_smarty_tpl->tpl_vars['shortLength']->value;?>
 </span>
                            <span class="lenght-full" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['product']->value['opis_produktu'];?>
</span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['product']->value['opis_produktu'];?>

                        <?php }?>
                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['ilosc_produktow'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['cena_produktu'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['product']->value['kto_stworzyl_produkt'] == '') {?>- <?php } else {
echo $_smarty_tpl->tpl_vars['product']->value['kto_stworzyl_produkt'];
}?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['data_utworzenia_produktu'];?>
</td>
                <td>
                    <span class="<?php if ($_smarty_tpl->tpl_vars['product']->value['status_produktu'] == 'active') {?>text-success<?php } else { ?>text-danger<?php }?>">
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['status_produktu'];?>

                    </span>
                </td>
                <td>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editProduct" method="post" style="display:inline;">
                        <input type="hidden" name="idProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_produktu'];?>
">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['status_produktu'] != 'inactive') {?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusProduct" method="post" style="display:inline;">
                            <input type="hidden" name="idProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_produktu'];?>
">
                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['status_produktu'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    <?php } else { ?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusProduct" method="post" style="display:inline;">
                            <input type="hidden" name="idProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_produktu'];?>
">
                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['status_produktu'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    <?php }?>
                </td>
            </tr>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
>
    let showInactive = true;

    document.getElementById('toggleInactive').addEventListener('click', function() {
        showInactive = !showInactive;
        document.getElementById('showInactiveInput').value = showInactive ? '0' : '1'; // Ustaw wartość w polu ukrytym
        this.textContent = showInactive ? "Ukryj nieaktywne produkty" : "Pokaż nieaktywne produkty";
        const rows = document.querySelectorAll('#productTable tr');

        rows.forEach(row => {
            const status = row.querySelector('td:nth-child(9)').textContent.trim();
            if (showInactive || status == 'active') {
                row.style.display = ''; // Wyświetl wiersz
            } else {
                row.style.display = 'none'; // Ukryj wiersz
            }
        });
    });

    document.getElementById('search').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 1; i < cells.length; i++) { // Zaczynamy od 1, aby pominąć #
                if (cells[i].textContent.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            if (match && (showInactive || cells[8].textContent.trim() !== 'inactive')) {
                row.style.display = ''; // Wyświetl wiersz
            } else {
                row.style.display = 'none'; // Ukryj wiersz
            }
        });
    });

    function toggleLength(element) {
        const shortLength = element.previousElementSibling.previousElementSibling;
        const fullLength = element.previousElementSibling;
        const icon = element.querySelector('i');

        if (fullLength.style.display === "none") {
            fullLength.style.display = "inline";
            shortLength.style.display = "none";
            icon.className = "bi bi-caret-left-fill";
        } else {
            fullLength.style.display = "none";
            shortLength.style.display = "inline";
            icon.className = "bi bi-caret-right-fill";
        }
    }
<?php echo '</script'; ?>
>
<?php }
}
