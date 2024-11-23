<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Kodów Rabatowych</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj kodu rabatowego..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="{$conf->action_url}addDiscountCode" method="get" style="display:inline;">
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
        {foreach $discountCodes as $code}
            <tr>
                <td>{$code.id_code}</td>
                <td>{$code.code_name}</td>
                <td>
                    {if $code.discount_type == 'percent'}
                        {$code.discount_value}% 
                    {else}
                        {$code.discount_value|number_format:2:",":" "}&nbsp;zł
                    {/if}
                </td>
                <td>{$code.discount_type|capitalize}</td>
                <td>{$code.who_created|default:"Nieznany"}</td>
                <td>{$code.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                <td>
                    <form method="post" action="{$conf->action_root}editDiscountCode" class="d-inline">
                        <input type="hidden" name="idCode" value="{$code.id_code}">
                        <button class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="{$conf->action_root}deleteDiscountCode" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć ten kod rabatowy?')">
                        <input type="hidden" name="idCode" value="{$code.id_code}">
                        <button class="btn btn-sm btn-outline-secondary">Usuń</button>
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
