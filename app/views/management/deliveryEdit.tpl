{extends file="templates/sign.tpl"}

{block name=content}
    <form method="post" action="{$conf->action_url}updateDelivery" enctype="multipart/form-data">
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
                Edytuj dostawę
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <input type="hidden" name="idDelivery" value="{$delivery.id_delivery}"> <!-- Ukryte pole -->

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="name" id="name" value="{$delivery.name}">
            <label for="name">Nazwa dostawy</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="cost" id="cost" value="{$delivery.cost}">
            <label for="cost">Koszt dostawy (zł.gr)</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="estimated_time" id="estimated_time"
                value="{$delivery.estimated_time}">
            <label for="estimated_time">Czas dostawy</label>
        </div>

        <div class="form-floating">
            <input type="file" class="form-control down-field" name="delivery_icon" id="delivery-icon" accept="image/*">
            <label for="delivery-icon">Ikona dostawy (JPG/PNG)</label>
        </div>


        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Edytuj dostawę</button>
    </form>
{/block}