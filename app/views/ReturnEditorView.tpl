{extends file="templates/secondary.tpl"}

{block name=content}
    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-12 bg-body-tertiary rounded">
                <div class="col-md-12 ">
                    <h2 class="mt-4 mb-4 text-center">Reklamacje i Zwrot</h2>
                    <h4 class="mb-3">Wybierz przedmiot, jakiego będzie dotyczyć zwrot</h4>
                    <form method="post" action="{$conf->action_url}addReturn">
                        <div class="row mb-4">
                            {foreach from=$products item=product}
                                <div class="col-md-6 mb-3">
                                    <div class="form-check d-flex align-items-center bg-body-secondary rounded">
                                        <input class="form-check-input m-2" type="radio" name="id_product"
                                            id="product{$product.id_product}" value="{$product.id_product}"
                                            {if $product@first}checked{/if}>
                                        <label class="form-check-label"
                                            for="product{$product.id_product}">
                                            <div class="m-3 d-flex align-items-center">
                                                <img src="{$conf->app_url}/assets/img/products/{$product["url"]}/1.jpg"
                                                    alt="{$product.name}"
                                                    style="width: 100px; height: 100px; object-fit: contain; border-radius: 5px;"
                                                    onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                function tryNextFormat() {
                                                if (index < formats.length) {
                                                img.src = '{$conf->app_url}/assets/img/products/{$product["url"]}/1.' + formats[index++];
                                                } else {
                                                img.src = '{$conf->app_url}/assets/img/products/default.png';
                                                }
                                                } tryNextFormat(); this.onerror = tryNextFormat;">
                                                <h5>&nbsp;{$product.name}</h5>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            {/foreach}
                        </div>

                        <h5 class="mb-3">Opisz nam, dlaczego chcesz zwrócić ten produkt</h5>
                        <div class="form-group mb-4">
                            <textarea class="form-control" name="reason" id="reason" rows="5" maxlength="1000"
                                placeholder="Wpisz powód zwrotu..." required></textarea>
                            <small class="form-text text-muted">Pozostało znaków: <span
                                    id="remainingChars">1000</span></small>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="id_order" value="{$id_order}">
                            <button type="submit" class="btn mb-4" style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Zwróć produkt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        const reasonInput = document.getElementById('reason');
        const remainingChars = document.getElementById('remainingChars');

        reasonInput.addEventListener('input', () => {
            const maxLength = parseInt(reasonInput.getAttribute('maxlength'), 10);
            const currentLength = reasonInput.value.length;
            remainingChars.textContent = maxLength - currentLength;
        });
    </script>
{/block}