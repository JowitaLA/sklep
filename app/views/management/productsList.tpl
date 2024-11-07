{assign var="showInactive" value=true}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produkty</h1>
    <div class="col-md-9 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control" autocomplete="off">
            <button type="button" id="toggleInactive" class="btn btn-sm btn-outline-secondary" style="width:30%">Ukryj nieaktywne produkty</button>
            <input type="hidden" name="showInactive" id="showInactiveInput" value="0"> <!-- Ukryte pole -->
        </form>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="{$conf->action_url}addProduct" method="get" style="display:inline;">
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
        {foreach $products as $product}
            {if $product.status_produktu == 'active' || $showInactive == "1"} {* Używamy zmiennej do kontroli wyświetlania *}
            <tr>
                <td>{$product.id_produktu}</td>
                <td>
                    {if $product.nazwa_produktu != null}
                        {$product.nazwa_produktu}
                    {else}
                        -
                    {/if}
                </td>

                <td>
                    {assign var="shortLength" value=""}

                    {if $product.kategorie != null}
                        {if $product.kategorie != $shortLength}
                            <span class="lenght-short">{$shortLength}</span>
                            <span class="lenght-short" style="display: none;">{$product.kategorie}</span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        {else}
                            {$product.kategorie}
                        {/if}
                    {else}
                        -
                    {/if}
                </td>

                <td>
                    {assign var="shortLength" value=""}

                    {if $product.opis_produktu != null}
                        {if $product.opis_produktu != $shortLength}
                            <span class="lenght-short">{$shortLength} </span>
                            <span class="lenght-full" style="display: none;">{$product.opis_produktu}</span>

                            <a href="javascript:void(0);" class="toggle-lenght" onclick="toggleLength(this)">
                                <i class="bi bi-caret-right-fill"></i>
                            </a>
                        {else}
                            {$product.opis_produktu}
                        {/if}
                    {else}
                        -
                    {/if}
                </td>

                <td>{$product.ilosc_produktow}</td>
                <td>{$product.cena_produktu}</td>
                <td>{if $product.kto_stworzyl_produkt == ""}- {else}{$product.kto_stworzyl_produkt}{/if}</td>
                <td>{$product.data_utworzenia_produktu}</td>
                <td>
                    <span class="{if $product.status_produktu == 'active'}text-success{else}text-danger{/if}">
                        {$product.status_produktu}
                    </span>
                </td>
                <td>
                    <form action="{$conf->action_url}editProduct" method="post" style="display:inline;">
                        <input type="hidden" name="idProduct" value="{$product.id_produktu}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    {if $product.status_produktu != 'inactive'}
                        <form action="{$conf->action_url}changeStatusProduct" method="post" style="display:inline;">
                            <input type="hidden" name="idProduct" value="{$product.id_produktu}">
                            <input type="hidden" name="status" value="{$product.status_produktu}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    {else}
                        <form action="{$conf->action_url}changeStatusProduct" method="post" style="display:inline;">
                            <input type="hidden" name="idProduct" value="{$product.id_produktu}">
                            <input type="hidden" name="status" value="{$product.status_produktu}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    {/if}
                </td>
            </tr>
            {/if}
        {/foreach}
    </tbody>
</table>

<script>
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
</script>
