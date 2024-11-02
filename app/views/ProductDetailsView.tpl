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
                                    <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i> 4.8
                                </div>
                                <div href="#">150 Recenzji</div>
                            </div>
                            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">
                        </div>

                        <!-- Cena produktu -->
                        <div class="link-body-emphasis mb-4">
                            <h1 style="color:rgba(255, 136, 0, 0.7); ">{$product.price|number_format:2:",":" "}&nbsp;zł</h1>
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
                                <span id="valueDisplay" class="mx-2 link-body-emphasis h5" style="margin-top: 10px">0</span>
                                <a class="ring-item">
                                    <div onclick="updateValue(1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-plus link-body-emphasis"></i>
                                    </div>
                                </a>
                            </div>

                            <!-- Przycisk dodawania do koszyka -->
                            {* <button class="btn btn-secondary w-100 mt-2 link-body-emphasis">
                                Dodaj do koszyka
                            </button>
                            <br>
                            <!-- Przycisk zakupu -->
                            <button class="btn btn-primary w-100 mt-2 link-body-emphasis"
                                style="background-color: var(--bs-secondary-color); border-color: black">
                                Kup teraz
                            </button> *}

                            <button class="btn btn-secondary w-100 mt-3 link-body-emphasis"
                                style="background-color: rgba(233, 125, 1, 0.7); border-color: rgba(255, 136, 0, 0.5); color: black">

                                Dodaj do koszyka
                            </button>
                            <br>
                            <!-- Przycisk zakupu -->
                            <button class="btn btn-primary w-100 mt-2 link-body-emphasis"
                                style="background-color: rgba(255, 136, 0, 0.5); border-color: rgba(233, 125, 1, 0.5); color:black">
                                Kup teraz
                            </button>

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
                            <br>
                            <h4>
                                <span style="color: rgba(255, 136, 0, 0.5);">Kategorie:</span>
                            </h4>
                            <h5><span style="color: rgba(233, 125, 1, 0.7);">
                            {foreach $categories as $category}
                                {$category.name} 
                            {/foreach}                            
                            </span>
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
                            <i>(165)</i>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let vault = 0; // Początkowa wartość vault

        function updateValue(change) {
            vault += change;
            // Zapobiegamy, aby wartość nie była mniejsza niż 0
            if (vault < 0) {
                vault = 0;
            }
            if (vault > {$product.amount}) {
            vault = 0;
        }
        document.getElementById('valueDisplay').textContent = vault;
        }
    </script>
{/block}