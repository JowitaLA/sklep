{* Główny Widok *}

{extends file="templates/main.tpl"}

{block name=content}
   <!-- Panele -->
   <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" style="background: linear-gradient(to right, #bb3e23 50%, #df8d00 50%);">
         <div class="carousel-item active">
            <img src="{$conf->app_url}/assets/img/background/3.png" alt="Slide 1">
            <div class="container">
               <div class="carousel-caption text-start">
                  <h1>Gwarancja niskich cen</h1>
                  <p class="opacity-75">Szukaj u nas produktów w przystępnej cenie.</p>
                  <p><a class="btn btn-lg btn-primary" href="{$conf->action_url}registerShow">Dołącz do nas już teraz</a>
                  </p>
               </div>
            </div>
         </div>
         <div class="carousel-item"">
            <img src="{$conf->app_url}/assets/img/background/2.png" alt="Slide 2">
            <div class="container">
               <div class="carousel-caption">
                  <h1>Nie wiesz co kupić?</h1>
                  <p>Znajdź coś u nas dla Siebie przeszukując wiele dostępnych kategorii.</p>
                  <p><a class="btn btn-lg btn-primary" href="#categories">Nasze Kategorie</a></p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img src="{$conf->app_url}/assets/img/background/1.png" alt="Slide 3">
            <div class="container">
               <div class="carousel-caption text-end">
                  <h1>O nas</h1>
                  <p>Witamy w naszym sklepie internetowym! Jesteśmy firmą, która łączy pasję do zakupów z nowoczesnymi
                     rozwiązaniami technologicznymi, aby zapewnić naszym klientom wyjątkowe doświadczenie zakupowe.
                     Wierzymy,
                     że zakupy online są nie tylko wygodne, ale i bezpieczne, dlatego stale rozszerzamy nasz asortyment,
                     aby
                     zapewnić potrzebom każdego z Was.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Czytaj więcej...</a></p>
               </div>
            </div>
         </div>
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
   <!-- Nasze Kategorie -->
   {* <hr class="featurette-divider"  style="margin-top: 0px;"> *}
   <hr class="featurette-divider" style="height: 1px; margin: 0px 0; margin-bottom: 20px;">

   <div id="categories" class="categories">
      <h2 style="margin-top:5rem">Nasze kategorie</h2>
      <div class="circle-container ">
         {foreach $categories as $i}
            <a href="/kategoria" class="circle-item ">
               <div class="circle bg-body-tertiary">
                  <i class="link-body-emphasis {$i["icon"]}"></i>
               </div>
               <p>{$i["name"]}</p>
            </a>
         {/foreach}
      </div>
   </div>

   <hr class="featurette-divider">
   <!-- Ostatnio Dodane Produkty -->
   <div class="recent-products py-4 ">
      <div class="container marketing">
         <h2 class="text-center mb-4">Ostatnio Dodane Produkty</h2>
         <div class="row">
            {foreach $last_products as $p}
               <a href="{$conf->app_url}/productDetails?product={$p.url}" class="col-md-3 mb-4">
                  <div class="product-card bg-body-tertiary">
                  <img src="{$p.image_url}" alt="{$p.name}" class="img-fluid">
                     <h3 class="mt-3">{$p["name"]}</h3>
                     <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                     <p class="price mt-2 link-body-emphasis">
                        {{$p["price"]}|number_format:2:",":" "}&nbsp;zł
                     </p>
                     {* zmiana formatu z np. 4500.5 na 4 500,50 zł *}
                  </div>
               </a>
            {/foreach}
            <p style="text-align: right;"><a class="btn btn-lg btn-primary"
                  href="{$conf->action_url}searchProducts">Więcej...</a></p>

         </div>
      </div>
   </div>

   <hr class="featurette-divider">

   <div class="recent-products py-2 ">
      <div class="container marketing">

         <div class="row mb-2">
            <div class="col-md-6">
               <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                     <h3 class="mb-0">Zapisz się do Newsletter'a</h3>
                     <div class="mb-1 text-body-secondary">Bądź na bieżąco z naszymi najnowszymi promocjami</div>
                     <p class="card-text mb-auto">Chcesz być na bieżąco z nowościami, promocjami i ekskluzywnymi ofertami?
                        Zostaw nam swój adres mail, a będziesz pierwszą osobą, która dowie się o wszystkich nowościach w
                        naszym sklepie! </p>
                     <a href="newsletter" class="icon-link gap-1 icon-link-hover stretched-link">
                        <svg class="bi">
                           <use xlink:href="#chevron-right" />
                        </svg>
                     </a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                     <svg class="bd-placeholder-img" width="200" height="280" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title></title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                           dy=".3em">Zapisz się już teraz!</text>
                     </svg>
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                     <strong class="d-inline-block mb-2 text-success-emphasis"></strong>
                     <h3 class="mb-0">Wyślij Feedback</h3>
                     <div class="mb-1 text-body-secondary">Pomóż w ulepszeniu Yups</div>
                     <p class="mb-auto">Twoja opinia jest dla nas niezwykle ważna. To właśnie dzięki niej możemy stale
                        udoskonalać nasz sklep, eliminując potencjalne problemy i tworząc coraz to lepsze doświadczenia
                        zakupowe dla wszystkich klientów.</p>
                     <a href="feedback" class="icon-link gap-1 icon-link-hover stretched-link">
                        <svg class="bi">
                           <use xlink:href="#chevron-right" />
                        </svg>
                     </a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                     <svg class="bd-placeholder-img" width="200" height="280" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title></title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                           dy=".3em">Wyślij Feedback</text>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
{/block}