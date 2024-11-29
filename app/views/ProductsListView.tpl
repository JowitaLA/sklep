{* Widok dla Listy Produktów *}

{extends file="templates/main.tpl"}

{block name=content}
    <section class="pt-5 text-center container bg-body-tertiary mt-4">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                {if $searchName == 'NULL'}<h1 class="fw-light">Wyszukania dla "{$searchName}"</h1>{/if}
                <p class="lead text-body-secondary">Znaleźliśmy dla Ciebie {$countProducts}
                    ofert{if $countProducts == '1'}ę{/if}{if $countProducts >= '2'&& $countProducts <= '4'}y{/if}</p>
            </div>
        </div>
    </section>

    <div class="container marketing bg-body-tertiary py-4" style="margin-top:10px;">
        <div class="row">
            {foreach $records as $r}
                <a href="{$conf->app_url}/productDetails?product={$r["url"]}" class="col-md-3 mb-2">
                    <div class="product-card" fill="var(--bs-secondary-color)">
                        <img src="{$conf->app_url}/assets/img/products/{$r["url"]}/1.jpg" alt="{$r.name}" onerror="
                            let formats = ['png', 'gif'];
                            let img = this;
                            let index = 0;

                            function tryNextFormat() {
                                if (index < formats.length) {
                                    img.src = '{$conf->app_url}/assets/img/products/{$r["url"]}/1.' + formats[index++];
                                    } else {
                                        img.src = '{$conf->app_url}/assets/img/products/default.png';
                                        }
                                    }

                            tryNextFormat();
                            this.onerror = tryNextFormat;
                        " class="img-fluid">
                        <h3 class="mt-3">{$r["name"]}</h3>
                        <div class="stars">
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
                        <p class="price mt-2 link-body-emphasis">
                            {$r["price"]|number_format:2:",":" "}&nbsp;zł
                        </p>
                        {* zmiana formatu z np. 4500.5 na 4 500,50 zł *}
                    </div>
                </a>
            {/foreach}
        </div>
    </div>
{/block}