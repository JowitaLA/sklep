<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listy Życzeń</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control"
                autocomplete="off">
        </form>
    </div>

    <!-- Przycisk do przełączania widoków -->
    <div>
        <button id="toggleView" class="btn btn-outline-secondary">Przełącz na widok produktów</button>
    </div>
</div>

<!-- Tabela listy życzeń -->
<table id="wishlistTable" class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nazwa Użytkownika</th>
            <th>Produkt</th>
        </tr>
    </thead>
    <tbody>
        {foreach $wishlist as $w}
            <tr>
                <td>{$w.id}</td>
                <td>{$w.user}</td>
                <td>{$w.product}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

<!-- Tabela produktów -->
<table id="productsTable" class="table table-striped table-sm" style="display: none;">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Liczba na liście życzeń</th>
        </tr>
    </thead>
    <tbody>
        {foreach $wishlistProducts as $p}
            <tr>
                <td>{$p.product_name}</td>
                <td>{$p.wishlist_count}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script>
    const toggleButton = document.getElementById('toggleView');
    const wishlistTable = document.getElementById('wishlistTable');
    const productsTable = document.getElementById('productsTable');

    toggleButton.addEventListener('click', function() {
        if (wishlistTable.style.display === 'none') {
            wishlistTable.style.display = '';
            productsTable.style.display = 'none';
            toggleButton.textContent = 'Przełącz na widok produktów';
        } else {
            wishlistTable.style.display = 'none';
            productsTable.style.display = '';
            toggleButton.textContent = 'Przełącz na widok listy życzeń';
        }
    });
</script>