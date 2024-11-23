<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Dostaw</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj dostawy..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="{$conf->action_url}addDelivery" method="get" style="display:inline;">
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
        {foreach $deliveries as $delivery}
            <tr>
                <td>{$delivery.id_delivery}</td>
                <td>{$delivery.name}</td>
                <td>{$delivery.cost|number_format:2:",":" "}&nbsp;zł</td>
                <td>{$delivery.estimated_time}</td>
                <td>{$delivery.who_created|default:"Nieznany"}</td>
                <td>{$delivery.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                <td>
                    <form method="post" action="{$conf->action_root}editDelivery" class="d-inline">
                        <input type="hidden" name="idDelivery" value="{$delivery.id_delivery}">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="{$conf->action_root}deleteDelivery" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć tę dostawę?')">
                        <input type="hidden" name="idDelivery" value="{$delivery.id_delivery}">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Usuń</button>
                    </form>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script>
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
</script>
