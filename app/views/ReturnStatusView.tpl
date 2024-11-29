{extends file="templates/secondary.tpl"}

{block name=content}
    <div class="container py-5">
        <h1 class="text-center pt-3">Sprawdź status zwrotu</h1>
        <p class="text-center mb-4">
        <div class="row bg-body-tertiary p-4 rounded mb-3">
            {if $status == null}
                <div class="col-md-12 text-center">
                    Wprowadzony został zły numer zwrotu.
                </div>
            {else}
                <div class="col-md-6">
                    Numer zwrotu: {$id_order}
                </div>
                <div class="col-md-6 text-end">
                    Status: {$status}
                </div>
            {/if}
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{$conf->action_url}main">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Wróć do strony
                            głównej</button>
                    </div>
                </form>
            </div>
        </div>
{/block}