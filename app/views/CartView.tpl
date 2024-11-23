{* Widok Koszyka *}

{extends file="templates/secondary.tpl"}

{block name=head}
    <style>
        .step-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 25%;
            right: 0;
            width: 85%;
            height: 2px;
            background-color: #ccc;
            z-index: -1;
            transform: translateX(50%);
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(51, 51, 51);
            border-color: rgba(233, 125, 1, 0.5);
            border: 10px;
            color: white;
            line-height: 40px;
            font-weight: bold;
            margin: 0 auto 10px auto;
            z-index: 1;
            /* Numerki muszą być na wierzchu */
        }

        .step-title {
            font-size: 14px;
            color: white;
        }

        .step.active .step-number {
            background-color: rgba(233, 125, 1);
            border-color: rgba(255, 136, 0, 0.5);
            border: 10px;
        }

        .step.back .step-number {
            background-color: rgba(255, 136, 0, 0.5);
            border-color: rgba(233, 125, 1, 0.5);
        }

        .step.active .step-title {
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="step-container">
            <!-- Step 1 -->
            <div class="step active">
                <div class="step-number">1</div>
                <div class="step-title">Koszyk</div>
            </div>
            <!-- Step 2 -->
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-title">Dostawa</div>
            </div>
            <!-- Step 3 -->
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-title">Płatność</div>
            </div>
            <!-- Step 4 -->
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-title">Gotowe</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{/block}

{block name=content}
    <style>
        .btn-sm-custom {
            width: 2rem;
            height: 2rem;
            font-size: 1rem;
            padding: 0;
        }
    </style>

    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-9">
                <div id="description" contenteditable="true" spellcheck="false" style="min-height:100%;">
                    <div class="row py-lg-5">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 100px; height: 100px;"></th>
                                    <th>Produkt</th>
                                    <th class="text-center">Liczba</th>
                                    <th>Cena</th>
                                    <th class="text-center">Akcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach $products as $product}
                                    <tr>
                                        <td>
                                            <a href="{$conf->app_url}/productDetails?product={$product["url"]}">
                                                <img src="{$conf->app_url}/assets/img/products/{$product["url"]}/1.jpg"
                                                    alt="{$product.name}"
                                                    style="width: 100px; height: 100px; object-fit:contain; border-radius: 5px;border-color:black;"
                                                    onerror="
                        let formats = ['png', 'gif'];
                        let img = this;
                        let index = 0;

                        function tryNextFormat() {
                            if (index < formats.length) {
                                img.src = '{$conf->app_url}/assets/img/products/{$product["url"]}/1.' + formats[index++];
                            } else {
                                img.src = '{$conf->app_url}/assets/img/products/default.png';
                            }
                        }

                        tryNextFormat();
                        this.onerror = tryNextFormat;
                                ">
                                        </td>
                                        <td><a
                                                href="{$conf->app_url}/productDetails?product={$product["url"]}">{$product.name}</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form method="POST" action="{$conf->action_url}changeCart" class="me-2">
                                                    <input type="hidden" name="product_ID" value="{$product.id}">
                                                    <input type="hidden" name="quantity" value="{$product.amount}">
                                                    <input type="hidden" name="action" value="add">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </form>

                                                <span id="valueDisplay-{$product.id}" class="mx-2">{$product.quantity}</span>

                                                <form method="POST" action="{$conf->action_url}changeCart" class="ms-2">
                                                    <input type="hidden" name="product_ID" value="{$product.id}">
                                                    <input type="hidden" name="quantity" value="{$product.amount}">
                                                    <input type="hidden" name="action" value="remove">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>{$product.price|number_format:2:",":" "}&nbsp;zł</td>
                                        <td class="text-center">
                                            <form action="{$conf->action_url}deleteCart" method="post" style="display:inline;">
                                                <input type="hidden" name="product_ID" value="{$product.id}">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="Usuń"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                            {if count($conf->roles)>0}
                                                <form action="{$conf->app_url}/addToWishlist" method="post" style="display:inline;">
                                                    <input type="hidden" name="idProduct" value="{$product.id}">
                                                    <input type="hidden" name="action" value='cart'>
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Dodaj do Listy Życzeń">
                                                        <i class="bi bi-bookmark-heart"></i>
                                                    </button>
                                                </form>
                                            {/if}
                                            <form action="{$conf->app_url}/productDetails?product={$product["url"]}"
                                                method="post" style="display:inline;">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                    title="Strona produktu"><i class="bi bi-card-heading"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>

                        <!-- Dodanie przycisku "Wybierz metodę dostawy" -->

                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="row py-lg-5">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Podsumowanie Koszyka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Wartość produktów:</span>
                                        <span>
                                            {assign var="total" value=0}
                                            {foreach $products as $product}
                                                {assign var="total" value=$total + ($product.price * $product.quantity)}
                                            {/foreach}
                                            {$total|number_format:2:",":" "} zł
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Dostawa:</span>
                                        <span>od przykład zł</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <span>Rabat:</span>
                                        <span style="color:red">- 0 zł</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <form method="post" action="{$conf->action_url}applyDiscount">
                            <div class="input-group">
                                <input type="text" name="discount_code" class="form-control"
                                    placeholder="Wpisz kod rabatowy" aria-label="Kod rabatowy">
                                <button type="submit" class="btn btn-primary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Zatwierdź</button>
                            </div>
                        </form>

                        <h5 class="text-center mt-3">Do zapłaty: 1 350zł</h5>

                        <div class="text-center">
                            <form action="{$conf->action_url}delivery" method="post">
                                <button type="submit" class="btn btn-secondary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Przejdź
                                    do Dostawy</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>
{/block}