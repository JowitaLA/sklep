{* Widok Weryfikacji Użytkownika *}

{extends file="templates/sign.tpl"}

{block name=content}
    <form>
        <a href="{$conf->app_url}/main" class="d-flex mb-4">
            <!-- Dodany link do strony głównej -->
            <img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
        </a>
        <h1 class="h3 mb-3 fw-normal">
            Weryfikacja konta
        </h1>
        <div style="text-align: center;">
            {$verify_message}
        </div>
        {if $verify_message == "Aktywacja użytkownika przebiegła pomyślnie. Zaloguj się na swoje konto."}
            <button type="button" onclick="window.location.href='{$conf->app_url}/loginShow'"
                class="btn btn-primary w-100 py-2">Przejdź do Logowania</button>
        {else}
            <button type="button" onclick="window.location.href='{$conf->app_url}/main'"
                class="btn btn-primary w-100 py-2 mt-2">Wróć do Strony Głównej</button>
        {/if}
    </form>
{/block}