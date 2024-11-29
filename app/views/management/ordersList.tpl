{assign var="showInactive" value=true}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Zamówienia</h1>
    <div class="col-md-9 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
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
        {foreach $orders as $order}
            {* Używamy zmiennej do kontroli wyświetlania *}
            <tr>
                <td></td>
                <td>{$order.id_order}</td>

                <td>
                    {if $order.user_name != null}
                        {$order.user_name}
                    {else}
                        -
                    {/if}
                </td>

                <td>
                    <span class="
                            {if $order.order_status == 'oczekujące'}text-warning{/if}
                            {if $order.order_status == 'przyjęte'}text-info{/if}
                            {if $order.order_status == 'w trakcie'}text-info{/if}
                            {if $order.order_status == 'gotowe do wysyłki'}text-info{/if}
                            {if $order.order_status == 'wysłane'}text-success{/if}
                            {if $order.order_status == 'anulowane'}text-danger{/if}
                            {if $order.order_status == 'zwrot'}text-danger{/if}
                            ">
                        {$order.order_status}
                    </span>
                </td>

                <td>
                    <span class="
                            {if $order.payment_status == 'oczekujące'}text-warning{/if}
                            {if $order.payment_status == 'w trakcie'}text-info{/if}
                            {if $order.payment_status == 'opłacono'}text-info{/if}
                            {if $order.payment_status == 'nieopłacono'}text-success{/if}
                            {if $order.payment_status == 'zwrócono'}text-danger{/if}
                            {if $order.payment_status == 'błąd płatności'}text-danger{/if}
                            ">
                        {$order.payment_status}
                    </span>
                </td>

                <td>
                    <span class="
                            {if $order.delivery_status == 'oczekujące'}text-warning{/if}
                            {if $order.delivery_status == 'w trakcie'}text-info{/if}
                            {if $order.delivery_status == 'wysłane'}text-success{/if}
                            {if $order.delivery_status == 'dostarczone'}text-success{/if}
                            {if $order.delivery_status == 'anulowane'}text-danger{/if}
                            {if $order.delivery_status == 'zwrócone'}text-danger{/if}
                            {if $order.delivery_status == 'błąd dostawy'}text-danger{/if}
                            ">
                        {$order.delivery_status}
                    </span>
                </td>

                <td>
                    {assign var="shortLength" value=""}

                    {if $order.delivery_address != null}
                        {if $order.delivery_address != $shortLength}
                            <span class="lenght-short">{$shortLength}</span>
                            <span class="lenght-short" style="display: none;">
                                <h6>{$order.delivery_address.first_name}
                                    {$order.delivery_address.last_name}</h6>
                                <h6>{$order.delivery_address.email}</h6>
                                <h6>{$order.delivery_address.phone_number}</h6>
                                <h6>{$order.delivery_address.street}
                                    {$order.delivery_address.house_number}</h6>
                                <h6>{$order.delivery_address.postal_code}
                                    {$order.delivery_address.city}</h6>
                                <h6>{$order.delivery_address.additional_info}</h6>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        {else}
                            {$order.delivery_address}
                        {/if}
                    {else}
                        -
                    {/if}
                </td>

                <td>
                    {assign var="shortLength" value=""}

                    {if $order.billing_address != null}
                        {if $order.billing_address != $shortLength}
                            <span class="lenght-short">{$shortLength}</span>
                            <span class="lenght-short" style="display: none;">
                                <h6>{$order.billing_address.first_name}
                                    {$order.billing_address.last_name}</h6>
                                <h6>{$order.billing_address.email}</h6>
                                <h6>{$order.billing_address.phone_number}</h6>
                                <h6>{$order.billing_address.street}
                                    {$order.billing_address.house_number}</h6>
                                <h6>{$order.billing_address.postal_code}
                                    {$order.billing_address.city}</h6>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        {else}
                            {$order.billing_address}
                        {/if}
                    {else}
                        -
                    {/if}
                </td>

                <td>{$order.order_date}</td>

                <td>{$order.payment_method}</td>

                <td>{$order.delivery_method}</td>

                <td>{$order.total_amount}</td>

                <td>
                    {assign var="shortLength" value=""}

                    {if $order.products_list != null}
                        {if $order.products_list != $shortLength}
                            <span class="lenght-short">{$shortLength}</span>
                            <span class="lenght-short" style="display: none;">
                                <p>{$order.products_list}</p>
                            </span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        {else}
                            {$order.products_list}
                        {/if}
                    {else}
                        -
                    {/if}
                </td>

                <td>
                    <form action="{$conf->action_url}editOrder" method="post" style="display:inline;">
                        <input type="hidden" name="idOrder" value="{$order.id_order}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>

                    {if $order.order_status != "anulowane"}
                        <form action="{$conf->action_url}changeStatusOrder" method="post" style="display:inline;">
                            <input type="hidden" name="idOrder" value="{$order.id_order}">
                            <input type="hidden" name="orderStatus" value="{$order.order_status}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    {else}
                        <form action="{$conf->action_url}changeStatusOrder" method="post" style="display:inline;">
                            <input type="hidden" name="idOrder" value="{$order.id_order}">
                            <input type="hidden" name="status" value="{$order.order_status}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script>
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
</script>