{extends file="templates/secondary.tpl"}

{block name=content}
    <style>
        .card:hover {
            transform: scale(1.05);
            /* Powiększenie */
            filter: brightness(1.2);
            /* Rozjaśnienie */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Płynne przejścia */
        }
    </style>
    <section class="pt-5 container mt-4">
        <div class="row g-5 d-flex">
            <div class="col-md-3">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="height:100%; top: 0; left: 0;">
                    <div class="position-sticky" style="top: 0;">
                        <div class="row py-lg-3">
                            <a href="{$conf->action_url}account"
                                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                                <span class="fs-4">Hej {$userName}!</span>
                            </a>
                            <hr style="margin-top:2%">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="{$conf->action_url}account" class="nav-link link-body-emphasis"
                                        aria-current="page">
                                        <i class="bi-house-fill pe-none me-2" width="16" height="16"></i>
                                        Panel użytkownika
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}orders" class="nav-link active">
                                        <i class="bi-bag-fill pe-none me-2" width="16" height="16"></i>
                                        Sprawdź Zamówienia
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}ratings" class="nav-link link-body-emphasis">
                                        <i class="bi-stars pe-none me-2" width="16" height="16"></i>
                                        Wystaw Recenzje
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}returnOrderShow" class="nav-link link-body-emphasis">
                                        <i class="bi-recycle pe-none me-2" width="16" height="16"></i>
                                        Zwroty i reklamacje
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}wishlistShow" class="nav-link link-body-emphasis">
                                        <i class="bi-bag-heart-fill pe-none me-2" width="16" height="16"></i>
                                        Lista Życzeń
                                    </a>
                                </li>
                                <hr>
                                <li>
                                    <a href="{$conf->action_url}newsletter" class="nav-link link-body-emphasis">
                                        <i class="bi-newspaper pe-none me-2" width="16" height="16"></i>
                                        Newsletter
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}feedback" class="nav-link link-body-emphasis">
                                        <i class="bi-clipboard2-check-fill pe-none me-2" width="16" height="16"></i>
                                        Feedback
                                    </a>
                                </li>
                            </ul>
                            <hr style="margin-top: 25%;">

                            <div class="dropdown dropup">
                                <a href="{$conf->action_url}main"
                                    class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{$conf->app_url}/assets/img/logo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong>{$userName}</strong>
                                </a>
                                <ul class="dropdown-menu text-small shadow">
                                    <li><a class="dropdown-item" href="{$conf->action_url}userEdit">Dane Osobowe</a></li>
                                    <li><a class="dropdown-item" href="{$conf->action_url}userEdit">Zmiana Hasła</a></li>
                                    <li><a class="dropdown-item" href="{$conf->action_url}userEdit">Adresy</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{$conf->action_url}logout">Wyloguj się</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 bg-body-tertiary">
                <div class="col-md-12 bg-body-tertiary">
                    <div class="row m-2 mt-5">
                        {if $orders|@count > 0}
                            <div class="row">
                                {foreach from=$orders key=idOrder item=order}
                                    <div class="col-md-12 mb-2">
                                        <div class="card bg-body-secondary">
                                            <!-- Pierwsza linia -->
                                            <div class="card-header d-flex justify-content-between">
                                                <span><strong>Nr zamówienia:</strong> {$idOrder}</span>
                                                <span><strong>Data:</strong> {$order.details.created_at}</span>
                                                <span><strong>Status:</strong> {$order.details.status}</span>
                                                <form action="{$conf->action_url}orderDetails" method="post">
                                                    <input type=hidden name="id_order" id="id_order" value="{$idOrder}">
                                                    <button type=submit class="btn btn-outline-secondary btn-sm" title="Szczegóły Zamówienia">
                                                        Szczegóły Zamówienia
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Druga linia -->
                                            <div class="card-body">
                                                {foreach from=$order.items item=item}
                                                    <div class="d-flex mb-3">
                                                        <div style="width: 90px; height: 90px;">
                                                            <img src="{$conf->app_url}/assets/img/products/{$item["url"]}/1.jpg"
                                                                alt="{$item.name}"
                                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;"
                                                                onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                                        function tryNextFormat() {
                                                                        if (index < formats.length) {
                                                                        img.src = '{$conf->app_url}/assets/img/products/{$item["url"]}/1.' + formats[index++];
                                                                        } else {
                                                                        img.src = '{$conf->app_url}/assets/img/products/default.png';
                                                                        }
                                                                        } tryNextFormat(); this.onerror = tryNextFormat;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5 class="card-title">{$item.name}</h5>
                                                        </div>
                                                    </div>
                                                {/foreach}
                                            </div>

                                            <!-- Trzecia linia -->
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-outline-primary btn-sm">Oceń</button>
                                                        <button class="btn btn-outline-success btn-sm">Skontaktuj się</button>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <button class="btn btn-outline-warning btn-sm">Reklamacja</button>
                                                        <button class="btn btn-outline-danger btn-sm">Zwrot towaru</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            </div>
                        {else}
                            <p>Nie masz żadnych zamówień.</p>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
{/block}