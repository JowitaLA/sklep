{extends file="templates/main.tpl"}
{block name=content}
    <section class="pt-5 container bg-body-tertiary mt-4 mb-4 pb-5">
        <div class=" justify-content-center row">
            <!-- Obraz po lewej stronie -->
            <div class="col-lg-8 col-md-8 d-flex flex-column">
                {if $images|@count > 0}
                    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" style="height: 40rem;">
                        <div class="carousel-indicators">
                            {foreach from=$images item=image name=img}
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{$smarty.foreach.img.index}"
                                    class="{if $smarty.foreach.img.first}active{/if}"
                                    aria-label="Slide {$smarty.foreach.img.index+1}" style="aspect-ratio: 1/1;">
                                </button>
                            {/foreach}
                        </div>

                        <div class="carousel-inner">
                            {foreach from=$images item=image name=img}
                                <div class="carousel-item bg-body-secondary {if $smarty.foreach.img.first}active{/if}"
                                    style="border-radius: 8px; height: 40rem;">
                                    <img src="{$conf->app_url}/assets/img/products/{$product.url}/{$image}"
                                        alt="Slide {$smarty.foreach.img.index+1}"
                                        style="border-radius: 8px; max-width: 95%; max-height: 95%;">
                                </div>
                            {/foreach}
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Powrót</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Dalej</span>
                        </button>
                    </div>
                {else}
                    <p>Brak dostępnych zdjęć dla tego produktu.</p>
                {/if}
            </div>

            <!-- Szczegóły produktu po prawej stronie -->
            <div class="col-lg-4 col-md-8 d-flex flex-column">

                <div class="bg-body-secondary" style="border-radius: 8px; height: 40rem;">
                    <!-- Elementy na samej górze -->
                    <div style="margin: 5%;">
                        <div class="mb-4">
                            <h2 class="fw-light">{$product.name}</h2>
                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stars">
                                        {assign var="rating" value=$rating.average_rating|default:0}
                                        {assign var="fullStars" value=floor($rating)}
                                        {assign var="halfStar" value=floor($rating*2) % 2}
                                        {assign var="emptyStars" value=5 - $fullStars - $halfStar}

                                        <!-- Renderowanie pełnych gwiazdek -->
                                        {section name=fullStars loop=$fullStars}
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        {/section}

                                        <!-- Renderowanie pół gwiazdki -->
                                        {if $halfStar == 1}
                                            <i class="fa fa-star-half" aria-hidden="true"></i>
                                        {/if}

                                        <!-- Renderowanie pustych gwiazdek -->
                                        {section name=emptyStars loop=$emptyStars}
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        {/section}
                                    </div>
                                    <i>{$rating}</i>
                                </div>
                                <div href="#"> {$reviews_count} Recenzj{if {$reviews_count} == 1}a{/if}{if {$reviews_count}
                                    >= 2 && {$reviews_count} <= 4}e{/if}{if {$reviews_count}> 4}i{/if}</div>
                            </div>
                            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">
                        </div>



                        <!-- Cena produktu -->
                        <div class="link-body-emphasis mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 style="color:rgba(255, 136, 0, 0.7);">{$product.price|number_format:2:",":" "}&nbsp;zł
                                </h1>
                                {if count($conf->roles)>0}
                                    <form action="{$conf->app_url}/addToWishlist" method="post" style="display:inline;">
                                        <input type="hidden" name="idProduct" value="{$product.id_product}">
                                        <input type="hidden" name="action" value='productDetails?product={$product.url}'>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            title="Dodaj do Listy Życzeń">
                                            <i class="bi bi-bookmark-heart"></i>
                                        </button>
                                    </form>
                                {/if}
                            </div>
                            <h7><i>Cena zawiera podatek VAT</i></h7>
                        </div>


                        <hr class="featurette-divider" style="height: 1px; margin: 10px 0; margin-bottom: 20px;">

                        <!-- Inne elementy umieszczane niżej -->
                        <div class="flex-grow-1"></div>

                        <!-- Przycisk i sekcja ilości -->
                        <div class="mt-auto flex-column align-items-center text-center">
                            <!-- Ilość produktu -->


                            <h3 style="margin-top: 2rem;"> Ilość: </h3>
                            <div style="margin-top: 2rem;">
                                <span class="ml-2" style="font-style: italic; ">Zostało {$product.amount} sztuk</span>
                            </div>
                            <div class="d-flex align-items-center"
                                style="justify-content: center; margin-top: 5px; margin-bottom: 20px;">
                                <a class="ring-item">
                                    <div onclick="updateValue(-1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-dash link-body-emphasis"></i>
                                    </div>
                                </a>
                                <span id="valueDisplay" name="value" class="mx-2 link-body-emphasis h5"
                                    style="margin-top: 10px"></span>
                                <a class="ring-item">
                                    <div onclick="updateValue(1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-plus link-body-emphasis"></i>
                                    </div>
                                </a>
                            </div>

                            <form method="POST" action="{$conf->action_url}addToCart">
                                <input type="hidden" name="product_ID" value="{$product.id_product}">
                                <input type="hidden" name="quantity" id="quantityInput"> <!-- Ukryte pole dla ilości -->

                                <button type="submit" class="btn btn-secondary w-100 mt-3 link-body-emphasis"
                                    style="background-color: rgba(233, 125, 1, 0.7); border-color: rgba(255, 136, 0, 0.5); color: black">
                                    Dodaj do koszyka
                                </button>
                            </form>

                            <a class="btn btn-primary w-100 mt-2 link-body-emphasis" href="{$conf->action_url}showCart"
                                style="background-color: rgba(255, 136, 0, 0.5); border-color: rgba(233, 125, 1, 0.5); color: black">
                                <input type="hidden" name="product_ID" value="{$product.id_product}">
                                <input type="hidden" name="quantity" id="quantityInput">
                                Kup teraz
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">

            <!-- Opis produktu -->
            <div class="col-lg-12 col-md-12 d-flex flex-column">
                <div class="bg-body-secondary" style="border-radius: 8px;">
                    <div class="col-lg-11 col-md-12" style="margin: 1rem;">
                        <h1>Opis</h1>
                        <div class="product-description">
                            {$product.description nofilter}
                        </div>
                        <!-- Opis produktu -->
                        <div class="mb-4">
                            <h4 style="font-weight: bold;">
                                Kategorie:
                            </h4>
                            <h5><i>
                                    {if count($product_categories) == 0}
                                        Brak kategorii dla tego produktu.
                                    {else}
                                        {foreach $product_categories as $category name=catLoop}
                                            {$category.name}{if not $smarty.foreach.catLoop.last}, {/if}
                                        {/foreach}
                                    {/if} </i>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">


            <div class="col-lg-12 col-md-12 d-flex flex-column">
                <div class="bg-body-secondary" style="border-radius: 8px;">
                    <div class="col-lg-11 col-md-12" style="margin: 1rem;">
                        <h1 class="d-inline">
                            <span>Opinie</span>
                        </h1>
                        <h4 class="d-inline">
                            <i>({$reviews_count})</i>
                        </h4>
                        <div class="row m-4">
                            {foreach from=$ratings item=r}
                                <div class="col-md-12 mb-1 mt-1">
                                    <div class="row border rounded pb-3 pt-3">
                                        <div class="col-md-3 stars">
                                            {assign var="rating" value=$r.rating|default:0}
                                            <!-- Ustawienie wartości domyślnej dla ratingu -->
                                            {assign var="fullStars" value=floor($rating)}
                                            <!-- Liczba pełnych gwiazdek -->
                                            {assign var="halfStar" value=floor($rating*2) % 2}
                                            <!-- Sprawdzamy, czy jest połowa gwiazdki -->
                                            {assign var="emptyStars" value=5 - $fullStars - $halfStar}
                                            <!-- Liczba pustych gwiazdek -->

                                            <!-- Renderowanie pełnych gwiazdek -->
                                            {section name=fullStars loop=$fullStars}
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            {/section}

                                            <!-- Renderowanie pół gwiazdki -->
                                            {if $halfStar == 1}
                                                <i class="fa fa-star-half" aria-hidden="true"></i>
                                            {/if}

                                            <!-- Renderowanie pustych gwiazdek -->
                                            {section name=emptyStars loop=$emptyStars}
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            {/section}
                                        </div>
                                        <div class="col-md-9">
                                            {$r.review}
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let vault = 1; // Początkowa wartość vault

        // Funkcja do aktualizacji wartości ilości w formularzu
        function updateQuantityInput() {
            const quantityInput = document.getElementById("quantityInput");
            quantityInput.value = vault; // Przypisujemy wartość 'vault' do ukrytego pola quantityInput
        }

        // Funkcja do ustawiania początkowej wartości w elemencie span
        function initializeValue() {
            document.getElementById('valueDisplay').textContent = vault;
            updateQuantityInput(); // Ustawiamy wartość również w ukrytym polu
        }

        // Funkcja do aktualizacji wartości ilości
        function updateValue(change) {
            vault += change;

            // Zapobiegamy, aby wartość nie była mniejsza niż 0
            if (vault < 0) {
                vault = 0;
            }

            // Zapobiegamy, aby wartość nie była większa niż dostępna ilość produktu
            if (vault > 10) { // Możesz zmienić 10 na odpowiednią liczbę
                vault = 10;
            }

            // Wyświetlanie zaktualizowanej wartości
            document.getElementById('valueDisplay').textContent = vault;
            updateQuantityInput(); // Zaktualizuj wartość również w ukrytym polu
        }

        // Wywołanie funkcji initializeValue po załadowaniu strony, aby ustawić początkową wartość
        document.addEventListener('DOMContentLoaded', function() {
            initializeValue();
        });
    </script>
{/block}