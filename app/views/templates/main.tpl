<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <script src="{$conf->app_url}/assets/js/color-modes.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$page_description|default:"Domyślny opis"}">
    <link rel="icon" href="{$conf->app_url}/assets/img/logo.png" type="image/png">

    <title>Yups</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="{$conf->app_url}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$conf->app_url}/assets/dist/css/carousel.css" rel="stylesheet">
</head>

<body>

    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <div class="row w-100 align-items-center">
                    <!-- Lewa część - Nazwa Sklepu -->
                    <div class="col-6 col-md-3">
                        <a class="navbar-brand" href="{$conf->action_url}main">
                            <img src="{$conf->app_url}/assets/img/logo.png" alt="Logo"
                                style="height: 25px; width: auto; vertical-align: middle;">
                            Yups
                        </a>
                    </div>

                    <!-- Prawa część na telefonach - Przycisk menu -->
                    <div class="col-6 d-md-none d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <!-- Środkowa część - Wyszukiwarka (widoczna na desktopach) -->
                    <div class="col-md-6 d-none d-md-flex">
                        <form class="d-flex w-100" action="search.php" method="GET" role="search">
                            <input class="form-control me-2" type="text" name="search_query"
                                placeholder="Wpisz czego szukasz" aria-label="Search">
                            <div class="input-group" style="width: 300px;">
                                <select class="form-select" name="category" aria-label="Wybierz kategorię">
                                    <option value="null">Kategoria</option>
                                    <!-- Wyświetlanie kategorii z dynamicznie wypełnianej zmiennej -->
                                    {foreach $categories as $c}
                                        <option value="{$c['id_category']}">{$c['name']}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <button class="btn btn-primary ms-2" type="submit" style="flex-grow: 2; max-width: 150px;">
                                Szukaj
                            </button>
                        </form>

                        <form class="d-flex w-100" role="search">
                            <input class="form-control me-2" type="search" placeholder="Wpisz czego szukasz"
                                aria-label="Search">
                            <div class="input-group" style="width: 300px;">
                                <select class="form-select" aria-label="Wybierz kategorię">
                                    <option selected>Kategoria</option>
                                    {assign var="i" value=1}
                                    <!-- Inicjalizacja zmiennej licznikowej -->
                                    {foreach $categories as $c}
                                        <option class="option_select" value="{$i}">{$c["name"]}</option>
                                        {assign var="i" value=$i+1}
                                        <!-- Inkrementacja licznika -->
                                    {/foreach}
                                </select>
                            </div>

                            <button class="btn btn-primary ms-2" type="submit" style="flex-grow: 2; max-width: 150px;">
                                Szukaj
                            </button>
                        </form>
                    </div>

                    <!-- Prawa część - Koszyk, Kontakt, Login (widoczna na desktopach) -->
                    <div class="col-md-3 d-none d-md-flex justify-content-end">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <!-- kontakt -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Kontakt">
                                    <i class="bi bi-telephone"></i> <!-- Ikona telefonu -->
                                </a>
                            </li>
                            <!-- koszyk-->
                            <li class="nav-item">
                                <a class="nav-link text-center" href="#" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Koszyk">
                                    <i class="bi bi-cart"></i> <!-- Ikona koszyka -->
                                </a>
                            </li>

                            <!-- zmiana motywu -->
                            <li class="nav-item">
                                <button id="theme-toggle-btn" class="btn nav-link" type="button"
                                    aria-label="Zmień motyw" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Zmień motyw">
                                    <i id="theme-icon" class="bi bi-moon"></i>
                                </button>
                            </li>


                            <!-- rozwijane menu dla "Moje Konto" -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> Moje Konto
                                </a>
                                {if count($conf->roles)>0}
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                        <li><a class="dropdown-item text-center" href="#">Profil</a></li>
                                        <li><a class="dropdown-item text-center" href="#">Zamówienia</a></li>
                                        <li><a class="dropdown-item text-center" href="#">Ustawienia</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-center" href="{$conf->action_url}logout">Wyloguj
                                                się</a></li>
                                    {else}
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                            <li><a class="dropdown-item text-center"
                                                    href="{$conf->action_url}loginShow">Zaloguj się</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-center"
                                                    href="{$conf->action_url}registerShow">Nie masz jeszcze
                                                    konta?<br>Zarejestruj się!</a></li>
                                        {/if}

                                    </ul>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Rozwijane menu na telefonach -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Wyszukiwarka - Widoczna na telefonach -->
                    <div class="d-md-none">
                        <form class="d-flex flex-column mt-2" role="search">
                            <input class="form-control mb-2" type="search" placeholder="Wpisz czego szukasz"
                                aria-label="Search">
                            <div class="input-group mb-2">
                                <select class="form-select" aria-label="Wybierz kategorię">
                                    <option selected>Kategoria</option>
                                    <option value="1">Elektronika</option>
                                    <option value="2">Roślinność</option>
                                    <option value="3">Dom i Ogród</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Szukaj</button>
                        </form>
                    </div>

                    <!-- Koszyk, Kontakt, Login - Widoczne na telefonach i ustawione obok siebie -->
                    <ul class="navbar-nav d-md-none d-flex justify-content-between w-100 mt-2">
                        <!-- kontakt -->
                        <li class="nav-item flex-fill">
                            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Kontakt">
                                <i class="bi bi-telephone"></i> Kontakt
                            </a>
                        </li>
                        <!-- koszyk -->
                        <li class="nav-item flex-fill">
                            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Koszyk">
                                <i class="bi bi-cart"></i> Koszyk
                            </a>
                        </li>
                        <!-- moje konto -->
                        <li class="nav-item flex-fill dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdownMobile" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> Moje Konto
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdownMobile">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Zamówienia</a></li>
                                <li><a class="dropdown-item" href="#">Ustawienia</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Wyloguj się</a></li>
                            </ul>
                        </li>

                        <!-- zmiana motywu -->
                        <button id="theme-toggle-btn" class="btn" type="button" aria-label="Zmień motyw">
                            <i id="theme-icon" class="fa fa-moon-o"></i>
                        </button>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="alertsContainer"
            style="position: fixed; top: 10%; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {foreach $msgs->getMessages() as $msg}
                <div class="alert alert-dismissible fade show {if $msg->isInfo()}alert-success{/if}
                                                    {if $msg->isWarning()}alert-warning{/if}
                                                    {if $msg->isError()}alert-danger{/if}" role="alert"
                    style="margin-top: 5px; margin-bottom: 0px;">
                    {$msg->text}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            {/foreach}
        </div>

        {block name=content} Domyślna treść zawartości {/block}
    </main>

    <hr class="featurette-divider">
    <div class="container">
        <footer class=" row row-cols-1 row-cols-sm-2 row-cols-md-5 py-1 my-4">
            <div class="col mb-3">
                <a href="{$conf->action_url}main">
                    <img src="{$conf->app_url}/assets/img/logo.png" alt="Logo"
                        style="height: 30px; width: auto; margin-bottom: 10px; vertical-align: middle;">

                    <p class="text-body-secondary">Yups</p>
                </a>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Zakupy</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Konto</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Koszyk</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Polityka
                            prywatności</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Zwroty i
                            reklamacje</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pomoc</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Informacje</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Sposoby
                            dostawy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kategorie</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Regulamin</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">O nas</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Kontakt</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://www.facebook.com/people/Sklep-Yups/61560868432894/"
                            class="bi bi-facebook nav-link p-0 text-body-secondary"> Facebook</a></li>
                    <li class="nav-item mb-2"><a href="+48607538917"
                            class="bi bi-telephone nav-link p-0 text-body-secondary"> +48 607 538 917</a></li>
                    <li class="nav-item mb-2"><a href="Yups@spoko.pl"
                            class="bi bi-envelope nav-link p-0 text-body-secondary"> Yups@spoko.pl</a></li>

                </ul>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pobierz wszystkie alerty
            const alerts = document.querySelectorAll('.alert');

            // Przeiteruj przez każdy alert i ustaw czas zniknięcia
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    // Użycie klasy fade, aby ukryć alert
                    alert.classList.remove('show');
                    alert.classList.add('fade');

                    // Usunięcie elementu po zakończeniu animacji
                    setTimeout(function() {
                        alert.remove();
                    }, 500); // Czas na zakończenie animacji (0.5 sekundy)
                }, 5000); // 10 sekundowe opóźnienie
            });
        });
    </script>

</body>


</html>