{extends file="templates/secondary.tpl"}

{block name=content}
    <style>
        .star-rating {
            direction: rtl;
            display: inline-block;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input:checked~label {
            color: #ffcc00;
        }

        .star-rating input:hover~label {
            color: #ffcc00;
        }

        .star-rating input:checked:hover~label {
            color: #ffcc00;
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
                        {if isset($rating.id_product) && $rating.id_product != null}
                            <form action="{$conf->action_url}submitRating" method="post" class="form">
                                <div class="mb-3 text-center">
                                    <div class="star-rating">
                                        {for $i=5 to 1 step -1}
                                            <input type="radio" name="rating" value="{$i}" id="star{$i}"
                                                {if isset($rating.rating) && $rating.rating == $i}checked{/if} required />
                                            <label for="star{$i}" class="fa fa-star" aria-label="{$i} gwiazdka"></label>
                                        {/for}
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="review" class="form-label">Twoja opinia <i>(max 255 znaków)</i></label>
                                    <textarea class="form-control" id="review" name="review" rows="4" maxlength="255"
                                        required>{$rating.review}</textarea>

                                </div>
                                <input type="hidden" name="id_product" value="{$rating.id_product}">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Zatwierdź opinię</button>
                                </div>
                            </form>

                        {else}
                            <p class="text-center">Brak produktu, któremu chcesz wystawić recenzję.
                            <form action="{$conf->action_url}ratings" method="post" style="display:inline;">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Wróć do recenzji">Wróć
                                        do recenzji</button>
                                </div>
                            </form>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
{/block}