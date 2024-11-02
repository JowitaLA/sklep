<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <script src="{$conf->app_url}/assets/js/color-modes.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$page_description|default:"Domyślny opis"}">
    <link rel="icon" href="{$conf->app_url}/assets/img/logo.png" type="image/png">

    <title>{$page_title|default:"Yups"}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{$conf->app_url}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$conf->app_url}/assets/dist/css/dashboard.css" rel="stylesheet">
    <link href="{$conf->app_url}/assets/dist/css/dashboard.rtl.css" rel="stylesheet">

    <!-- Dodanie jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>


<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="{$conf->action_url}main">
            <img src="{$conf->app_url}/assets/img/logo.png" alt="Logo"
                style="height: 25px; width: auto; vertical-align: middle;">
            Yups
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                    <svg class="bi">
                        <use xlink:href="#search" />
                    </svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list" />
                    </svg>
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Yups</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2"
                                    href="{$conf->action_url}managementMain" id="panel">
                                    <i class="bi bi-info-circle" style="height:20px;" fill="currentColor"></i>
                                    Panel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{$conf->action_url}showProducts"
                                    id="showProducts">
                                    <i class="bi bi-info-circle" style="height:20px;" fill="currentColor"></i>
                                    Produkty
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{$conf->action_url}showOrders"
                                    id="showOrders">
                                    <i class="bi bi-info-circle" style="height:20px;" fill="currentColor"></i>
                                    Zamówienia
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{$conf->action_url}showUsers"
                                    id="showUsers">
                                    <i class="bi bi-person-circle" style="height:20px;" fill="currentColor"></i>
                                    Użytkownicy
                                </a>
                            </li>

                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Płatności</span>
                                <a class="link-secondary" href="#" aria-label="Add a new report">
                                    <i class="bi bi-info-circle" style="height:20px;" fill="currentColor"></i>
                                </a>
                            </h6>

                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Metody płatności
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Zarządzanie fakturami
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Zwroty i gwarancje
                                    </a>
                                </li>
                            </ul>

                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Treść strony</span>
                                <a class="link-secondary" href="#" aria-label="Add a new report">
                                    <svg class="bi">
                                        <use xlink:href="#plus-circle" />
                                    </svg>
                                </a>
                            </h6>

                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        O nas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Regulamin
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Polityka prywatności
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Kontakt
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Zwroty i reklamacje
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Pomoc
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Sposoby Dostawy
                                    </a>
                                </li>
                            </ul>


                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Promocje</span>
                                <a class="link-secondary" href="#" aria-label="Add a new report">
                                    <svg class="bi">
                                        <use xlink:href="#plus-circle" />
                                    </svg>
                                </a>
                            </h6>

                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Kody rabatowe
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Newsletter
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Feedback
                                    </a>
                                </li>
                            </ul>


                            <hr class="my-3">

                            <ul class="nav flex-column mb-auto">

                                <!-- zmiana motywu -->
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Logi
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <button id="theme-toggle-btn" class="btn nav-link" type="button"
                                    aria-label="Zmień motyw" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Zmień motyw">
                                    <i id="theme-icon" class="bi bi-moon"></i> Zmień Motyw
                                </button>
                            </li>
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Dostępy i uprawnienia
                                    </a>
                                </li>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                {foreach $msgs->getMessages() as $msg}
                    <div class="alert alert-dismissible fade show {if $msg->isInfo()}alert-success{/if}
                            {if $msg->isWarning()}alert-warning{/if}
                            {if $msg->isError()}alert-danger{/if}" role="alert"
                        style="margin-top: 5px; margin-bottom: 0px;">
                        {$msg->text}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                {/foreach}
                
                <div id="content-block" class="col-md-9 ms-sm-auto col-lg-10 px-4">
                    {block name=content}
                        Domyślna treść
                    {/block}
                </div>
            </main>

        </div>
    </div>
    <script src="{$conf->app_url}/assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src="{$conf->app_url}/assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" rossorigin="anonymous">
    </script>
    {* Funkcja do dynamicznego ładowania treści *}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var $j = jQuery.noConflict();

            // Sprawdź, czy w localStorage jest zapisany aktywny panel
            var activePanel = localStorage.getItem('activePanel') ||
                'panel'; // Ustaw domyślną wartość na 'panel'

            // Ustaw aktywną zakładkę
            $j('a.nav-link').removeClass('active');
            $j("#" + activePanel).addClass('active');

            // Załaduj treść odpowiedniej zakładki
            $.ajax({
                url: $j("#" + activePanel).attr('href'), // Pobiera URL z href aktywnej zakładki
                type: "GET",
                success: function(response) {
                    console.log("Otrzymano odpowiedź z serwera:");
                    $("#content-block").html(response); // Załaduj odpowiedź do #content-block
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Błąd AJAX: " + textStatus + " " + errorThrown);
                }
            });

            // Przypisz eventy do wszystkich linków
            $j('a.nav-link').on('click', function(event) {
                event.preventDefault(); // Zapobiega domyślnemu działaniu linku

                // Usuwanie klasy 'active' ze wszystkich linków
                $j('a.nav-link').removeClass('active');

                // Dodanie klasy 'active' do klikniętego linku
                $j(this).addClass('active');

                // Zapisz ID aktywnego panelu do localStorage
                localStorage.setItem('activePanel', this.id);

                // Dynamiczne ładowanie treści (AJAX)
                $.ajax({
                    url: event.currentTarget.getAttribute(
                        'href'), // Pobiera URL z href klikniętego linku
                    type: "GET",
                    success: function(response) {
                        console.log("Otrzymano odpowiedź z serwera:");
                        $("#content-block").html(
                            response); // Załaduj odpowiedź do #content-block
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Błąd AJAX: " + textStatus + " " + errorThrown);
                    }
                });
            });
        });
    </script>
    <script>
        console.log("Start logging messages");
        const messages = {$msgs->getMessages()|json_encode};
        console.log("Messages:", messages);

        if (Array.isArray(messages)) {
            messages.forEach(msg => {
                console.log("Message:", msg.text);
            });
        } else {
            console.log("No messages found.");
        }
    </script>

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