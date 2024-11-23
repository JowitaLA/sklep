<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Kategorii</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj kategorii..." class="form-control"
                autocomplete="off">
        </form>
    </div>
    <div class="btn-group me-2">
            <form action="{$conf->action_url}addCategory" method="get" style="display:inline;">
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
        {foreach $categories as $category}
            <tr>
                <td>{$category.id_category}</td>
                <td>{$category.name}</td>
                <td>{$category.description|truncate:50:"..."}</td>
                <td><i class="{$category.icon}"></i></td>
                <td>{$category.who_add|default:"Nieznany"}</td>
                <td>{$category.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                <td>
                    <form method="post" action="{$conf->action_root}editCategory" class="d-inline">
                        <input type="hidden" name="idCategory" value="{$category.id_category}">
                        <button class="btn btn-sm btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    <form method="post" action="{$conf->action_root}deleteCategory" class="d-inline" 
                          onsubmit="return confirm('Czy na pewno chcesz usunąć tę kategorię?')">
                        <input type="hidden" name="idCategory" value="{$category.id_category}">
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
