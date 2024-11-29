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
                                    <a href="{$conf->action_url}orders" class="nav-link link-body-emphasis">
                                        <i class="bi-bag-fill pe-none me-2" width="16" height="16"></i>
                                        Sprawdź Zamówienia
                                    </a>
                                </li>
                                <li>
                                    <a href="{$conf->action_url}ratings" class="nav-link active">
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

                <div class="m-2 mt-5">
                    <div class="bg-body-secondary p-3 rounded border mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center mb-3">
                                <form class="d-flex w-100" action="{$conf->action_root}ratings" method="post" role="search">
                                    <div class="input-group">
                                        <input type="text" id="search" name="search" value="{$search|default:''|escape}"
                                            placeholder="Szukaj produktów po nazwie" class="form-control"
                                            autocomplete="off">
                                        <button class="btn btn-secondary"
                                            style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Szukaj</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="{$conf->action_root}ratings" method="post">
                                    <input type="hidden" name="filter" value="rated">
                                    <button
                                        class="btn btn-outline-primary btn-sm {if $filter == 'rated'}active{/if}">Ocenione</button>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="{$conf->action_root}ratings" method="post">
                                    <input type="hidden" name="filter" value="all">
                                    <button
                                        class="btn btn-outline-primary btn-sm {if $filter == 'all'}active{/if}">Wszystkie</button>
                                </form>
                            </div>

                            <div class="col-md-4 text-center">
                                <form action="{$conf->action_root}ratings" method="post">
                                    <input type="hidden" name="filter" value="unrated">
                                    <button
                                        class="btn btn-outline-primary btn-sm {if $filter == 'unrated'}active{/if}">Nieocenione</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    {if $product|@count > 0}
                        <div class="row">
                            {foreach from=$product item=prod}
                                <div>
                                    <div class="card d-flex flex-row bg-body-secondary mb-2">
                                        <!-- Obrazek po lewej stronie -->
                                        <div class="d-flex align-items-center" style="width: 90px; height: 90px;">
                                            <img src="{$conf->app_url}/assets/img/products/{$prod["url"]}/1.jpg" alt="{$prod.name}"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                  function tryNextFormat() {
                                                      if (index < formats.length) {
                                                          img.src = '{$conf->app_url}/assets/img/products/{$prod["url"]}/1.' + formats[index++];
                                                      } else {
                                                          img.src = '{$conf->app_url}/assets/img/products/default.png';
                                                      }
                                                  } tryNextFormat(); this.onerror = tryNextFormat;">
                                        </div>

                                        <!-- Informacje o produkcie (nazwa, cena) -->
                                        <div class="card-body d-flex flex-column justify-content-center flex-grow-1">
                                            <h5 class="card-title">{$prod.name}</h5>
                                        </div>

                                        <!-- Akcje (usuń, sprawdź produkt) po prawej stronie -->
                                        <div class="d-flex align-items-center justify-content-end p-3">
                                            <form action="{$conf->app_url}/productDetails?product={$prod["url"]}" method="post"
                                                style="display:inline;">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                    title="Strona produktu">
                                                    <i class="bi bi-card-heading"></i>
                                                </button>
                                            </form>
                                            {if $prod.isRating}
                                                &nbsp;
                                                <form action="{$conf->action_url}deleteRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="{$prod.id}">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Usuń recenzję">
                                                        <i class="bi bi-trash2"></i>
                                                    </button>
                                                </form>
                                                &nbsp;
                                                <form action="{$conf->action_url}editorRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="{$prod.id}">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Edytuj recenzję">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </form>
                                            {else}
                                                &nbsp;
                                                <form action="{$conf->action_url}editorRating" method="post" style="display:inline;">
                                                    <input type="hidden" name="id_product" value="{$prod.id}">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        title="Dodaj recenzję">
                                                        <i class="bi bi-star-half"></i>
                                                    </button>
                                                </form>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                {else}
                    <p class="text-center mt-5">Nie masz produktów do oceny.</p>
                {/if}
            </div>
        </div>
        </div>
        </div>
    </section>
{/block}