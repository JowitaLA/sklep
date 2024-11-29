{extends file="templates/secondary.tpl"}

{block name=content}
    <div class="container mt-5 p-5 bg-body-tertiary rounded">
        <h1 class="text-center pt-3">Zwroty i Gwarancje</h1>
        <p class="text-center mb-4">
            Wpisz numer zamówienia, którego dotyczyć ma zwrot.
        </p>
        <form method="post" action="{$conf->action_url}showOrderReturns">
            <div class="mb-3">
                <label for="id_order" class="form-label">Wpisz numer zamówienia</label>
                <input type="text" class="form-control" id="id_order" name="id_order" placeholder="Wpisz numer zamówienia"
                    required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Przejdź dalej</button>
            </div>
        </form>

        <div class="row justify-content-end mt-3">
            <div class="col-md-6">
                <form method="post" action="{$conf->action_url}statusReturn">
                    <div class="input-group">
                        <label for="id_order" class="form-label text-end"></label>
                        <input type="text" class="form-control rounded" id="id_order" name="id_order"
                            placeholder="Chcesz sprawdzić status zwrotu? Wpisz numer zwrotu" required>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">
                            Sprawdź status
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
{/block}