{extends file="templates/secondary.tpl"}

{block name=content}
    <style>
        .card:hover {
            transform: scale(1.01);
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
                    <div class="row m-2 mt-5 mb-5">
                        {if $order|@count > 0}
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="card bg-body-secondary">
                                        <!-- Pierwsza linia -->
                                        <div class="card-header">
                                            <div class="row">
                                                <!-- Lewa kolumna -->
                                                <div class="col-md-6">
                                                    <h4 class="mb-2">Nr zamówienia: <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><strong>{$order.details.id_order}</strong></span>
                                                    </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="mb-2 text-end">Data złożenia zamówienia: <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i>{$order.details.created_at}</i></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2">Metoda płatności: {$order.details.payment_method} <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i>({$order.details.payment_status})</i></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2 text-end">Metoda dostawy: {$order.details.delivery_method}
                                                        <span
                                                            style="color:rgba(255, 136, 0, 0.7);"><i>({$order.details.delivery_status})</i></span>
                                                    </p>
                                                </div>

                                            </div>
                                            <!-- Status zamówienia na dole, wyśrodkowany -->
                                            <div class="text-center mt-3">
                                                <h5 class="mb-2 font-weight-bold">Status zamówienia:
                                                    <span
                                                        style="color:rgba(255, 136, 0, 0.7);"><strong>{$order.details.order_status}</strong></span>
                                                </h5>
                                            </div>
                                        </div>



                                        <!-- Druga linia -->
                                        <div class="card-body">
                                            <div class="row">
                                                {assign var="total_sum" value=0}
                                                <!-- zmienna do zsumowania wszystkich produktów -->
                                                {foreach from=$order.items item=item}
                                                    <div class="col-md-6">
                                                        <li class="m-1">
                                                            <img src="{$conf->app_url}/assets/img/products/{$item["image_url"]}/1.jpg"
                                                                alt="{$item.name}"
                                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;"
                                                                onerror="let formats = ['png', 'gif']; let img = this; let index = 0; 
                                                                    function tryNextFormat() {
                                                                        if (index < formats.length) {
                                                                            img.src = '{$conf->app_url}/assets/img/products/{$item["image_url"]}/1.' + formats[index++];
                                                                        } else {
                                                                            img.src = '{$conf->app_url}/assets/img/products/default.png';
                                                                        }
                                                                    } tryNextFormat(); this.onerror = tryNextFormat;">
                                                            <span>{$item.name}</span>
                                                        </li>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        {$item.quantity} x {$item["item_cost"]|number_format:2:",":" "}&nbsp;zł
                                                    </div>
                                                    {assign var="total_sum" value=$total_sum + ($item.quantity * $item["item_cost"])}
                                                {/foreach}
                                            </div>
                                        </div>

                                        <!-- Trzecia linia -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <a href="{$conf->action_root}orders">Wróć do listy zamówień</a>
                                                </div>
                                                {if $order.details.code_type == "percent"}
                                                    {assign var="discount" value=($total_sum * $order.details.code_value / 100)}
                                                {else}
                                                    {assign var="discount" value=$order.details.code_value}
                                                {/if}


                                                <div class="col-md-3 text-end">
                                                    <p class="mb-2"> {$total_sum|number_format:2:",":" "}&nbsp;zł</p>
                                                    {assign var="delivery" value=($order.details.total_cost - $total_sum + $discount)}

                                                    <p class="mb-2"><i>(dostawa)</i> +
                                                        {$delivery|number_format:2:",":" "}&nbsp;zł</p>
                                                    {if $discount !=0}
                                                        <p class="mb-2" style="color:rgba(255, 136, 0, 0.7);"><i>(kod:
                                                                {$order.details.code_name})</i> -
                                                            {$discount|number_format:2:",":" "}&nbsp;zł</p>
                                                    {/if}
                                                    <hr width="100%">
                                                    <p class="mb-2">
                                                        <strong>{$order.details.total_cost|number_format:2:",":" "}&nbsp;zł</strong>
                                                    </p>
                                                </div>
                                            </div>



                                            <p class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <h5 style="color:rgba(255, 136, 0, 0.7);">Adres dostawy: </h5>
                                                    <h6>{$order_details.address_shipping.first_name}
                                                        {$order_details.address_shipping.last_name}</h6>
                                                    <h6>{$order_details.address_shipping.email}</h6>
                                                    <h6>{$order_details.address_shipping.phone_number}</h6>
                                                    <h6>{$order_details.address_shipping.street}
                                                        {$order_details.address_shipping.house_number}</h6>
                                                    <h6>{$order_details.address_shipping.postal_code}
                                                        {$order_details.address_shipping.city}</h6>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <h5 style="color:rgba(255, 136, 0, 0.7);">Adres rozliczeń: </h5>
                                                    <h6>{$order_details.address_billing.first_name}
                                                        {$order_details.address_billing.last_name}</h6>
                                                    <h6>{$order_details.address_billing.email}</h6>
                                                    <h6>{$order_details.address_billing.phone_number}</h6>
                                                    <h6>{$order_details.address_billing.street}
                                                        {$order_details.address_billing.house_number}</h6>
                                                    <h6>{$order_details.address_billing.postal_code}
                                                        {$order_details.address_billing.city}</h6>
                                                </div>
                                            </div>
                                            {if $order_details.address_shipping.additional_info != null}
                                                <div class="text-center"> Notka dla kuriera:
                                                    <i>"{$order_details.address_shipping.additional_info}"</i></div>
                                            {else}
                                                <div class="text-center"> Notka dla kuriera: <i>brak</i></div>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {else}
                            <p>Nie masz szczegółów zamówień.</p>
                            <a href="{$conf->action_root}orders">Wróć do listy zamówień</a>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
{/block}