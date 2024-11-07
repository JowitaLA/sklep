{extends file="templates/sign.tpl"}

{block name=content}
    <form method="post" action="{$conf->action_url}updateUser">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo po lewej stronie -->
            <a href="{$conf->app_url}/main" class="d-flex align-items-center">
                <img src="{$conf->app_url}/assets/img/logo.png" alt="Logo" width="50" height="50">
            </a>

            <!-- Ikona info-circle po prawej stronie z szarym kolorem -->
            <a class="nav-link d-flex align-items-center" href="{$conf->action_url}/managementMain">
                <i class="bi bi-info-circle" style="font-size: 50px; color: #6c757d;" title="Wróć do zarządzania"></i>
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-3 fw-normal">
                Dodaj użytkownika
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <input type="hidden" name="idUser" value="{$user.id_user}"> <!-- Dodane ukryte pole -->

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="login" id="login" value="{$user.login}">
            <label for="login">Login</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control middle-field" name="mail" id="mail" value="{$user.mail}">
            <label for="mail">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="name" id="name" value="{$user.name}">
            <label for="name">Imię</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control down-field" name="surname" id="surname" value="{$user.surname}">
            <label for="surname">Nazwisko</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Dodaj użytkownika</button>
    </form>
    </div>
{/block}