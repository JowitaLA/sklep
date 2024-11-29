{extends file="templates/secondary.tpl"}

{block name=content}
    <div class="container mt-5 p-5 bg-body-tertiary rounded">
        <h1 class="text-center pt-3">Zapisz się do Newslettera</h1>
        <p class="text-center mb-4">
            Dołącz do naszego newslettera, aby być na bieżąco z nowościami, promocjami i wyjątkowymi ofertami!
        </p>
        <form method="post" action="{$conf->action_url}subscriptionNewsletter">
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Wpisz swój adres e-mail"
                    required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Zapisz się</button>
            </div>
        </form>

        <div class="row justify-content-end">
            <div class="col-md-5">
                <form method="post" action="{$conf->action_url}unsubscriptionNewsletter">
                    <div class="input-group">
                        <label for="email" class="form-label text-end">Nie chcesz dostawać już od nas wiadomości związanych z promocjami, nowościami i ofertami?</label>
                        <input type="email" class="form-control rounded" id="email" name="email"
                            placeholder="Wpisz swój adres e-mail" required>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">
                            Wypisz się
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
{/block}