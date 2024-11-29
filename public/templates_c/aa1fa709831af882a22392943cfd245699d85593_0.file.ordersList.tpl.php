<?php
/* Smarty version 4.3.4, created on 2024-11-29 14:36:00
  from 'C:\xampp\htdocs\Sklep\app\views\management\ordersList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6749c3405fc2e0_21652589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa1fa709831af882a22392943cfd245699d85593' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\ordersList.tpl',
      1 => 1732887302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6749c3405fc2e0_21652589 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('showInactive', true);?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Zamówienia</h1>
    <div class="col-md-9 d-none d-md-flex">
        <form class="d-flex w-100" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control"
                autocomplete="off">
            <select id="filterStatus" class="form-control" style="width: 30%; margin-left: 10px;">
                <option value="">Wszystkie</option>
                <optgroup label="Status Zamówienia">
                    <option value="order_status-oczekujące">Oczekujące</option>
                    <option value="order_status-przyjęte">Przyjęte</option>
                    <option value="order_status-w trakcie">W trakcie</option>
                    <option value="order_status-gotowe do wysyłki">Gotowe do wysyłki</option>
                    <option value="order_status-wysłane">Wysłane</option>
                    <option value="order_status-anulowane">Anulowane</option>
                    <option value="order_status-zwrot">Zwrot</option>
                </optgroup>
                <optgroup label="Status Płatności">
                    <option value="payment_status-oczekujące">Oczekujące</option>
                    <option value="payment_status-w trakcie">W trakcie</option>
                    <option value="payment_status-opłacono">Opłacono</option>
                    <option value="payment_status-nieopłacono">Nieopłacono</option>
                    <option value="payment_status-zwrócono">Zwrócono</option>
                    <option value="payment_status-błąd płatności">Błąd płatności</option>
                </optgroup>
                <optgroup label="Status Dostawy">
                    <option value="delivery_status-oczekujące">Oczekujące</option>
                    <option value="delivery_status-w trakcie">W trakcie</option>
                    <option value="delivery_status-wysłane">Wysłane</option>
                    <option value="delivery_status-dostarczone">Dostarczone</option>
                    <option value="delivery_status-anulowane">Anulowane</option>
                    <option value="delivery_status-zwrócone">Zwrócone</option>
                    <option value="delivery_status-błąd dostawy">Błąd dostawy</option>
                </optgroup>
            </select>
        </form>
    </div>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Użytkownik</th>
            <th>Status Zamówienia</th>
            <th>Status Płatności</th>
            <th>Status Dostawy</th>
            <th>Adres Dostawy</th>
            <th>Adres Rozliczeń</th>
            <th>Data Zamówienia</th>
            <th>Metoda Płatności</th>
            <th>Metoda Dostawy</th>
            <th>Kwota</th>
            <th>Produkty</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody id="orderTable">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
                        <tr>
                <td></td>
                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
</td>

                <td>
                    <?php if ($_smarty_tpl->tpl_vars['order']->value['user_name'] != null) {?>
                        <?php echo $_smarty_tpl->tpl_vars['order']->value['user_name'];?>

                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td>
                    <span class="
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'oczekujące') {?>text-warning<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'przyjęte') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'w trakcie') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'gotowe do wysyłki') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'wysłane') {?>text-success<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'anulowane') {?>text-danger<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'zwrot') {?>text-danger<?php }?>
                            ">
                        <?php echo $_smarty_tpl->tpl_vars['order']->value['order_status'];?>

                    </span>
                </td>

                <td>
                    <span class="
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'oczekujące') {?>text-warning<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'w trakcie') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'opłacono') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'nieopłacono') {?>text-success<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'zwrócono') {?>text-danger<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'błąd płatności') {?>text-danger<?php }?>
                            ">
                        <?php echo $_smarty_tpl->tpl_vars['order']->value['payment_status'];?>

                    </span>
                </td>

                <td>
                    <span class="
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'oczekujące') {?>text-warning<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'w trakcie') {?>text-info<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'wysłane') {?>text-success<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'dostarczone') {?>text-success<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'anulowane') {?>text-danger<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'zwrócone') {?>text-danger<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'błąd dostawy') {?>text-danger<?php }?>
                            ">
                        <?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_status'];?>

                    </span>
                </td>

                <td>
                    <?php $_smarty_tpl->_assignInScope('shortLength', '');?>

                    <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_address'] != null) {?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_address'] != $_smarty_tpl->tpl_vars['shortLength']->value) {?>
                            <span class="lenght-short"><?php echo $_smarty_tpl->tpl_vars['shortLength']->value;?>
</span>
                            <span class="lenght-short" style="display: none;">
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['first_name'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['last_name'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['email'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['phone_number'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['street'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['house_number'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['postal_code'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['city'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address']['additional_info'];?>
</h6>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_address'];?>

                        <?php }?>
                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td>
                    <?php $_smarty_tpl->_assignInScope('shortLength', '');?>

                    <?php if ($_smarty_tpl->tpl_vars['order']->value['billing_address'] != null) {?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value['billing_address'] != $_smarty_tpl->tpl_vars['shortLength']->value) {?>
                            <span class="lenght-short"><?php echo $_smarty_tpl->tpl_vars['shortLength']->value;?>
</span>
                            <span class="lenght-short" style="display: none;">
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['first_name'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['last_name'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['email'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['phone_number'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['street'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['house_number'];?>
</h6>
                                <h6><?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['postal_code'];?>

                                    <?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address']['city'];?>
</h6>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['order']->value['billing_address'];?>

                        <?php }?>
                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['order_date'];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['payment_method'];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_method'];?>
</td>

                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['total_amount'];?>
</td>

                <td>
                    <?php $_smarty_tpl->_assignInScope('shortLength', '');?>

                    <?php if ($_smarty_tpl->tpl_vars['order']->value['products_list'] != null) {?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value['products_list'] != $_smarty_tpl->tpl_vars['shortLength']->value) {?>
                            <span class="lenght-short"><?php echo $_smarty_tpl->tpl_vars['shortLength']->value;?>
</span>
                            <span class="lenght-short" style="display: none;">
                                <p><?php echo $_smarty_tpl->tpl_vars['order']->value['products_list'];?>
</p>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['order']->value['products_list'];?>

                        <?php }?>
                    <?php } else { ?>
                        -
                    <?php }?>
                </td>

                <td>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editOrder" method="post" style="display:inline;">
                        <input type="hidden" name="idOrder" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>

                    <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] != "anulowane") {?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusOrder" method="post" style="display:inline;">
                            <input type="hidden" name="idOrder" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
">
                            <input type="hidden" name="orderStatus" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_status'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    <?php } else { ?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changeStatusOrder" method="post" style="display:inline;">
                            <input type="hidden" name="idOrder" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
">
                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_status'];?>
">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
>
    document.getElementById('filterStatus').addEventListener('change', function() {
        const filterValue = this.value; // Pobierz wybraną wartość
        const rows = document.querySelectorAll('#orderTable tr');

        rows.forEach(row => {
            const [orderStatus, paymentStatus, deliveryStatus] = [
                row.querySelector('td:nth-child(4)').textContent.trim(),
                row.querySelector('td:nth-child(5)').textContent.trim(),
                row.querySelector('td:nth-child(6)').textContent.trim()
            ];

            // Rozdziel typ filtra i wartość
            const [type, value] = filterValue.split('-');

            // Wyświetl wiersze zgodnie z filtrem
            if (!filterValue || (type === 'order_status' && orderStatus === value) ||
                (type === 'payment_status' && paymentStatus === value) ||
                (type === 'delivery_status' && deliveryStatus === value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
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
><?php }
}
