<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Użytkownicy</h1>
    <div class="col-md-6 d-none d-md-flex">
        <form class="d-flex w-100" action="{$conf->action_root}managementMain" method="post" role="search">
            <input type="text" id="search" name="search" placeholder="Szukaj..." class="form-control"
                autocomplete="off">
        </form>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="{$conf->action_url}addUser" method="get" style="display:inline;">
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
        {foreach $users as $user}
            <tr>
                <td>{$user.id_user}</td>
                <td>{$user.login}</td>
                <td>{$user.password}</td>
                <td>{$user.mail}</td>
                {if $user.name == ""}
                    <td> - </td>
                {else}
                    <td>{$user.name}</td>
                {/if}
                {if $user.surname == ""}
                    <td> - </td>
                {else}
                    <td>{$user.surname}</td>
                {/if}
                <td>{$user.register_date}</td>
                <td>{$user.last_login}</td>
                <td>{$user.status}</td>
                <td>
                    <form action="{$conf->action_url}editUser" method="post" style="display:inline;">
                        <input type="hidden" name="idUser" value="{$user.id_user}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edytuj</button>
                    </form>
                    {if $user.status != 'inactive'}
                        <form action="{$conf->action_url}changeStatusUser" method="post" style="display:inline;">
                            <input type="hidden" name="idUser" value="{$user.id_user}">
                            <input type="hidden" name="status" value="{$user.status}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Usuń</button>
                        </form>
                    {else}
                        <form action="{$conf->action_url}changeStatusUser" method="post" style="display:inline;">
                            <input type="hidden" name="idUser" value="{$user.id_user}">
                            <input type="hidden" name="status" value="{$user.status}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Aktywuj</button>
                        </form>
                    {/if}
                    <form action="{$conf->action_url}resetPass" method="post" style="display:inline;">
                        <input type="hidden" name="email" value="{$user.mail}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Resetuj hasło</button>
                    </form>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script>
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
</script>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>