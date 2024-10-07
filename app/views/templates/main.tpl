<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <script src="{$conf->app_url}/assets/js/color-modes.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{$page_description|default:"Domyślny opis"}">
    <link rel="icon" href="{$conf->app_url}/assets/img/favicon.png" type="image/png">

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
                        <a class="navbar-brand" href="#">Yups</a>
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
                        <form class="d-flex w-100" role="search">
                            <input class="form-control me-2" type="search" placeholder="Wpisz czego szukasz"
                                aria-label="Search">
                            <div class="input-group" style="width: 200px;">
                                <select class="form-select" aria-label="Wybierz kategorię">
                                    <option selected>Kategoria</option>
                                    <option value="1">Elektronika</option>
                                    <option value="2">Roślinność</option>
                                    <option value="3">Dom i Ogród</option>
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
                                    <i id="theme-icon" class="fa fa-moon-o"></i>
                                </button>
                            </li>


                            <!-- rozwijane menu dla "Moje Konto" -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> Moje Konto
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                    <li><a class="dropdown-item" href="#">Profil</a></li>
                                    <li><a class="dropdown-item" href="#">Zamówienia</a></li>
                                    <li><a class="dropdown-item" href="#">Ustawienia</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Wyloguj się</a></li>
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

    {* 
    <div id="menu" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href=""><b>Strona główna</a>
        <ul>

            {if count($conf->roles)>0}
                <li class="pure-menu-selected"><a href="{$conf->action_url}logout">Wyloguj</a></li>
            {else}
                <li class="pure-menu-selected"><a href="{$conf->action_url}logout">Logowanie</a></li>
            {/if}
            <li class="pure-menu-selected"><a href="{$conf->action_url}options">Opcje</a></li>
            <li class="pure-menu-selected"><a href="{$conf->action_url}logout">Kontakt</a></li>
            <li class="pure-menu-selected"><a href="https://www.huntshowdown.com/">Główna strona gry</a></li>
        </ul>
    </div> *}
    <main>
        {block name=content} Domyślna treść zawartości {/block}
    </main>


    {* <div class="splash-container">
        <div class="splash">
            <h1 class="splash-head">{$page_title|default:"Tytuł domyślny"}</h1>
            <p class="splash-subhead">
                {$page_description|default:"Opis domyślny"}
            </p>
            {if count($conf->roles)==0}
                <p>
                    <a href="{$conf->action_url}login" class="logowanie">Dołącz do nas już teraz!</a>
                </p>
            {/if}
        </div>

    </div> *}

    <hr class="featurette-divider">
    <div class="container">
        <footer class=" row row-cols-1 row-cols-sm-2 row-cols-md-5 py-1 my-4">
            <div class="col mb-3">
                <a href="/" class="fa fa-crow d-flex align-items-center mb-3 link-body-emphasis text-decoration-none"
                    style="font-size: 25px;"></a>
                <p class="text-body-secondary">Yups</p>
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



    {* <script>
        window.onload = function() {
            const header = document.querySelector('header');
            const main = document.querySelector('main');
            const headerHeight = header.offsetHeight;
            main.style.marginTop = headerHeight + 'px'; // Ustawia margines na wysokość nagłówka
        };

        window.onresize = function() {
            const header = document.querySelector('header');
            const main = document.querySelector('main');
            const headerHeight = header.offsetHeight;
            main.style.marginTop = headerHeight +
            'px'; // Ustawia margines na wysokość nagłówka przy zmianie rozmiaru
        };
    </script> *}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>