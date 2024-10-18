{extends file="templates/main.tpl"}
{block name=content}
    <section class="pt-5 text-center container bg-body-tertiary mt-4">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                {if $searchName == 'NULL'}<h1 class="fw-light">Wyszukania dla "{$searchName}"</h1>{/if}
                <p class="lead text-body-secondary">Znaleźliśmy dla Ciebie {$countProducts}
                    ofert{if $countProducts == '1'}ę{/if}{if $countProducts >= '2'&& $countProducts <= '4'}y{/if}</p>
                <p>(w przyszłości miejsce na sortowanie po opiniach oraz cenach)</p>
            </div>
        </div>
    </section>

    <div class="container marketing bg-body-tertiary py-4" style="margin-top:10px;">
        <div class="row">
            {foreach $records as $r}
                <a href="/elektronika" class="col-md-3 mb-2">
                    <div class="product-card" fill="var(--bs-secondary-color)">
                        <img src="{$conf->app_url}/assets/img/products/{$r["image"]}/1.jpg" alt="{$r["name"]}"
                            class="img-fluid">
                        <h3 class="mt-3">{$r["name"]}</h3>
                        <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                        <p class="price mt-2">{{$r["price"]}|number_format:2:",":" "}&nbsp;zł</p>
                    </div>
                </a>
            {/foreach}
        </div>
    </div>
{/block}