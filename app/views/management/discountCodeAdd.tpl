{extends file="templates/sign.tpl"}

{block name=content}
    <form method="post" action="{$conf->action_url}createDiscountCode">
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
                Dodaj kod rabatowy
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="code_name" id="code_name" value="">
            <label for="code_name">Nazwa kodu</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control middle-field" name="discount_value" id="discount_value" value="">
            <label for="discount_value">Wartość rabatu (procent lub zł)</label>
        </div>

        <div class="form-floating">
            <select class="form-select middle-field" name="discount_type" id="discount_type">
                <option value="percent">Procentowy</option>
                <option value="fixed">Stały</option>
            </select>
            <label for="discount_type">Typ rabatu</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Dodaj kod rabatowy</button>
    </form>
{/block}
