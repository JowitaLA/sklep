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
      <div class="carousel-inner" style="background: linear-gradient(to right, #bb3e23 48%, #d96912 50%, #df8d00 52%);">
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
            <img src=" {$conf->app_url}/assets/img/background/2.png" alt="Slide 2">
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
               <p>„YUPS!” to sklep
                  internetowy, w którym zakupisz ogromną liczbę produktów
                  użytecznych w różnych dziedzinach życia. Cechą charakterystyczną
                  naszego asortymentu jest bowiem jego wielobranżowość. Dodatkowo
                  bez względu na to, z której kategorii produkty wybierzesz, masz
                  gwarancję, że stawiamy na niezawodność za rozsądne pieniądze.</p>
               <p><a class="btn btn-lg btn-primary" href="{$conf->action_url}about">Czytaj więcej...</a></p>
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
<div class="recent-products py-4">
   <div class="container marketing">
      <h2 class="text-center mb-4">Ostatnio Dodane Produkty</h2>
      <div class="row">
         {foreach $last_products as $p}
         <a href="{$conf->app_url}/productDetails?product={$p.url}" class="col-md-3 mb-4">
            <div class="product-card bg-body-tertiary">
               <img src="{$conf->app_url}/assets/img/products/{$p["url"]}/1.jpg" alt="{$p.name}" onerror="
               let formats = ['png', 'gif'];
               let img = this;
               let index = 0;

               function tryNextFormat() {
                   if (index < formats.length) {
                       img.src = '{$conf->app_url}/assets/img/products/{$p["url"]}/1.' + formats[index++];
                       } else {
                           img.src = '{$conf->app_url}/assets/img/products/default.png';
                           }
                       }

               tryNextFormat();
               this.onerror = tryNextFormat;
               " class="img-fluid">
               <h3 class="mt-3">{$p["name"]}</h3>
               <div class="stars">
                  {assign var="rating" value=$p.rating|default:0}
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
                  {$p["price"]|number_format:2:",":" "}&nbsp;zł
               </p>
               {* zmiana formatu z np. 4500.5 na 4 500,50 zł *}
            </div>
         </a>
         {/foreach}
         <p style="text-align: right;">
            <a class="btn btn-lg btn-primary" href="{$conf->action_url}searchProducts">Więcej...</a>
         </p>
      </div>
   </div>
</div>

<hr class="featurette-divider">

<div class="recent-products py-2 ">
   <div class="container marketing">
      <div class="row">
         <!-- Sekcja Feedback -->
         <div class="col-md-6 d-flex align-items-stretch">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative w-100">
               <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="mb-0">Wyślij Feedback</h3>
                  <div class="mb-1 text-body-secondary">Pomóż w ulepszeniu Yups</div>
                  <p class="mb-auto">Twoja opinia jest dla nas niezwykle ważna. To właśnie dzięki niej możemy stale
                     udoskonalać nasz sklep, eliminując potencjalne problemy i tworząc coraz to lepszy sklep dla
                     wszystkich klientów.</p>
                  <a href="feedback" class="icon-link gap-1 icon-link-hover stretched-link">
                     <svg class="bi">
                        <use xlink:href="#chevron-right" />
                     </svg>
                  </a>
               </div>
               <div class="col-auto d-none d-lg-block">
                  <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                     role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                     focusable="false">
                     <title></title>
                     <rect width="100%" height="100%" fill="#55595c" />
                     <text x="50%" y="50%" fill="#eceeef" dy=".3em">Zostaw Feedback</text>
                  </svg>
               </div>
            </div>
         </div>

         <!-- Sekcja Newsletter -->
         <div class="col-md-6 d-flex align-items-stretch">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative w-100">
               <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="mb-0">Zapisz się do Newslettera</h3>
                  <div class="mb-1 text-body-secondary">Bądź na bieżąco</div>
                  <p class="mb-auto">Dołącz do naszego newslettera, aby otrzymywać najnowsze informacje o promocjach,
                     nowościach i wyjątkowych ofertach prosto na swoją skrzynkę e-mail.</p>
                  <a href="newsletter" class="icon-link gap-1 icon-link-hover stretched-link">
                     <svg class="bi">
                        <use xlink:href="#chevron-right" />
                     </svg>
                  </a>
               </div>
               <div class="col-auto d-none d-lg-block">
                  <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                     role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                     focusable="false">
                     <title></title>
                     <rect width="100%" height="100%" fill="#55595c" />
                     <text x="50%" y="50%" fill="#eceeef" dy=".3em">Zapisz się</text>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
{/block}