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
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="{$conf->app_url}/assets/img/background/3.png" alt="Slide 1">
            <div class="container">
               <div class="carousel-caption text-start">
                  <h1>Gwarancja niskich cen</h1>
                  <p class="opacity-75">Szukaj u nas produktów w przystępnej cenie.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Dołącz do nas już teraz</a></p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
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
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>

   <!-- Nasze Kategorie -->
   <div id="categories" class="categories">
      <h2>Nasze kategorie</h2>
      <div class="circle-container">
         <a href="/elektronika" class="circle-item">
            <div class="circle">
               <i class="bi bi-laptop"></i>
            </div>
            <p>Elektronika</p>
         </a>

         <a href="/dom-i-ogród" class="circle-item">
            <div class="circle">
               <i class="bi bi-house-door"></i>
            </div>
            <p>Dom i ogród</p>
         </a>

         <a href="/moda-i-akcesoria" class="circle-item">
            <div class="circle">
               <i class="bi bi-sunglasses"></i>
            </div>
            <p>Moda i akcesoria</p>
         </a>

         <a href="/zdrowie-i-uroda" class="circle-item">
            <div class="circle">
               <i class="fa fa-leaf"></i>
            </div>
            <p>Zdrowie i uroda</p>
         </a>

         <a href="/dzieci" class="circle-item">
            <div class="circle">
               <i class="fa fa-rocket"></i>
            </div>
            <p>Dzieci</p>
         </a>

         <a href="/sport" class="circle-item">
            <div class="circle">
               <i class="fa fa-futbol-o"></i>
            </div>
            <p>Sport</p>
         </a>

         <a href="/relaks" class="circle-item">
            <div class="circle">
               <i class="bi bi-book"></i>
            </div>
            <p>Relaks</p>
         </a>

         <a href="/motoryzacja" class="circle-item">
            <div class="circle">
               <i class="bi bi-car-front"></i>
            </div>
            <p>Motoryzacja</p>
         </a>

         <a href="/artykuły-biurowe-i-szkolne" class="circle-item">
            <div class="circle">
               <i class="bi bi-mortarboard"></i>
            </div>
            <p>Artykuły biurowe i szkolne</p>
         </a>

         <a href="/hobby-i-kolekcje" class="circle-item">
            <div class="circle">
               <i class="fa fa-magic"></i>
            </div>
            <p>Hobby i kolekcje</p>
         </a>

         <a href="/zwierzeta" class="circle-item">
            <div class="circle">
               <i class="fa fa-paw"></i>
            </div>
            <p>Zwierzęta</p>
         </a>
      </div>
   </div>

   <hr class="featurette-divider">
   <!-- Ostatnio Dodane Produkty -->
   <div class="recent-products py-4 ">
      <div class="container marketing">
         <h2 class="text-center mb-4">Ostatnio Dodane Produkty</h2>
         <div class="row">
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card" fill="var(--bs-secondary-color)">
                  <img src="{$conf->app_url}/assets/img/produkt1.jpg" alt="Produkt 1" class="img-fluid">
                  <h3 class="mt-3">Sukienka Sara Midi Orange</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                  <p class="price mt-2">99,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt2.jpg" alt="Produkt 2" class="img-fluid">
                  <h3 class="mt-3">Spodnie męskie joggery</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf006; &#xf006;</i>
                  <p class="price mt-2">129,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt3.jpg" alt="Produkt 3" class="img-fluid">
                  <h3 class="mt-3">Koszula Męska OTIS Beżowa</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf123;</i>
                  <p class="price mt-2">149,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt4.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Stół rozkładany EVERTON</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt5.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Plecak Himawari</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf123; &#xf006; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt6.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Retoo Szczotka do włosów</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf123; &#xf006; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>

            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt7.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Buty męskie Nike Dunk Low Retro White</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt8.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">GUIDO fotel wypoczynkowy</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt9.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Damskie ocieplane buty sportowe</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf123; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt10.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Mikrofon Niceboy VOICE</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf123;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt11.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Słuchawki Bezprzewodowe Sony</h3>
                  <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <a href="/elektronika" class="col-md-3 mb-4">
               <div class="product-card">
                  <img src="{$conf->app_url}/assets/img/produkt12.jpg" alt="Produkt 4" class="img-fluid">
                  <h3 class="mt-3">Konsola drewniana czarna</h3>
                  <i class="fa stars">&#xf006; &#xf006; &#xf006; &#xf006; &#xf006;</i>
                  <p class="price mt-2">179,99 PLN</p>
               </div>
            </a>
            <p style="text-align: right;"><a class="btn btn-lg btn-primary" href="#">Więcej...</a></p>

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