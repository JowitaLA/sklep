{extends file="templates/secondary.tpl"}

{block name=content}
    <div class="container py-5">
        <h1 class="text-center pt-3">Sprawdź status zamówienia</h1>
        <p class="text-center mb-4">
            Wpisz numer zamówienia by sprawdzić, jaki ma status
        </p>
        <form method="post" action="{$conf->action_url}orderStatusShow">
            <div class="mb-3">
                <label for="id_order" class="form-label">Numer Zamówienia</label>
                <input type="text" class="form-control" id="id_order" name="id_order" placeholder="Wpisz swój numer zamówienia" required>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Sprawdź</button>
            </div>
        </form>
    </div>
{/block}
