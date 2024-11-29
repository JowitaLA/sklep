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
                            <!-- Dropdown umieszczony na dole -->
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
                                    <li><a class="dropdown-item" href="{$conf->action_url}userEdit">Zmiana Hasła</a>
                                    </li>
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
                        <!-- Edycja Danych -->
                        <div class="col-md-6">
                            <div class="bg-body-secondary p-3 rounded border">
                                <h5 class="text-center">Edycja Danych</h5>
                                <form action="{$conf->action_url}userEditPersonalData" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Imię</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Imię"
                                            value="{$user.name|default:''}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">Nazwisko</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            placeholder="Nazwisko" value="{$user.surname|default:''}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="mail" name="mail" placeholder="E-mail"
                                            value="{$user.mail|default:''}" required>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Edycja Haseł -->
                        <div class="col-md-6">
                            <div class="bg-body-secondary p-3 rounded border">
                                <h5 class="text-center">Edycja Haseł</h5>
                                <form action="{$conf->action_url}userEditPassword" method="POST">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Aktualne hasło</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="Wpisz aktualne hasło" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Nowe hasło</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="Wpisz nowe hasło" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Potwierdź nowe hasło</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Powtórz nowe hasło" name="confirm_password" required>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary">Zmień hasło</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Edycja Adresów -->
                    <div class="row m-2">
                        <!-- Edycja Danych -->
                        <div class="col-md-6">
                            <div class="bg-body-secondary p-3 rounded border mt-3">
                                <h5 class="text-center"> Adres Dostawy</h5>
                                <form action="{$conf->action_url}userEditDeliveryAddress" method="POST">

                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label for="firstName" class="form-label">Imię</label>
                                            <input type="text" class="form-control" name="firstName" id="firstName"
                                                placeholder="Imię" value="{$deliveryAddress.first_name|default:''}"
                                                required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać imię.
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="lastName" class="form-label">Nazwisko</label>
                                            <input type="text" class="form-control" name="lastName" id="lastName"
                                                placeholder="Nazwisko" value="{$deliveryAddress.last_name|default:''}"
                                                required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać nazwisko.
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="E-mail" value="{$deliveryAddress.email|default:''}" required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać prawidłowy e-mail.
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="phone_number" class="form-label">Numer telefonu</label>
                                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                                placeholder="+48 ___ ___ ___"
                                                value="{$deliveryAddress.phone_number|default:''}" required
                                                oninput="formatPhoneNumber(event)">
                                            <div class="invalid-feedback">
                                                Proszę wpisać numer telefonu.
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <label for="street" class="form-label">Ulica</label>
                                            <input type="text" class="form-control" name="street" id="street"
                                                placeholder="Ulica" value="{$deliveryAddress.street|default:''}" required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać ulicę.
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="house_number" class="form-label">Nr domu/lokalu</label>
                                            <input type="text" class="form-control" name="house_number" id="house_number"
                                                placeholder="Kod" value="{$deliveryAddress.house_number|default:''}"
                                                required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać numer domu/lokalu.
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="postal_code" class="form-label">Kod pocztowy</label>
                                            <input type="text" class="form-control" name="postal_code" id="postal_code"
                                                placeholder="__-___" value="{$deliveryAddress.postal_code|default:''}"
                                                required oninput="formatPostalCode(event)">
                                            <div class="invalid-feedback">
                                                Proszę wpisać kod pocztowy.
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <label for="city" class="form-label">Miasto</label>
                                            <input type="text" class="form-control" name="city" id="city"
                                                placeholder="Miasto" value="{$deliveryAddress.phone_number|default:''}"
                                                required>
                                            <div class="invalid-feedback">
                                                Proszę wpisać miasto.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary">Zapisz adres dostawy</button>
                                </form>
                                {if $isDeliveryAddress}
                                <form action="{$conf->action_url}userEditDeleteDeliveryAddress" method="POST" class="ms-3">
                                    <button type="submit" class="btn btn-danger">Usuń adres</button>
                                </form>
                                {/if}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="bg-body-secondary p-3 rounded border mt-3">
                            <h5 class="text-center"> Adres Rozliczeniowy</h5>
                            <form action="{$conf->action_url}userEditBillingAddress" method="POST">

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Imię</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName"
                                            placeholder="Imię" value="{$billingAddress.first_name|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać imię.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Nazwisko</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName"
                                            placeholder="Nazwisko" value="{$billingAddress.last_name|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać nazwisko.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="E-mail" value="{$billingAddress.email|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać prawidłowy e-mail.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="phone_number" class="form-label">Numer telefonu</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            placeholder="+48 ___ ___ ___" value="{$billingAddress.phone_number|default:''}"
                                            required oninput="formatPhoneNumber(event)">
                                        <div class="invalid-feedback">
                                            Proszę wpisać numer telefonu.
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <label for="street" class="form-label">Ulica</label>
                                        <input type="text" class="form-control" name="street" id="street"
                                            placeholder="Ulica" value="{$billingAddress.street|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać ulicę.
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="house_number" class="form-label">Nr domu/lokalu</label>
                                        <input type="text" class="form-control" name="house_number" id="house_number"
                                            placeholder="Kod" value="{$billingAddress.house_number|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać numer domu/lokalu.
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="postal_code" class="form-label">Kod pocztowy</label>
                                        <input type="text" class="form-control" name="postal_code" id="postal_code"
                                            placeholder="__-___" value="{$billingAddress.postal_code|default:''}" required
                                            oninput="formatPostalCode(event)">
                                        <div class="invalid-feedback">
                                            Proszę wpisać kod pocztowy.
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <label for="city" class="form-label">Miasto</label>
                                        <input type="text" class="form-control" name="city" id="city"
                                            placeholder="Miasto" value="{$billingAddress.phone_number|default:''}" required>
                                        <div class="invalid-feedback">
                                            Proszę wpisać miasto.
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary">Zapisz adres rozliczeniowy</button>
                            </form>
                            {if $isBillingAddress}
                            <form action="{$conf->action_url}userEditDeleteBillingAddress" method="POST" class="ms-3">
                                <button type="submit" class="btn btn-danger">Usuń adres</button>
                            </form>
                            {/if}
                        </div>
                    </div>
                </div>
                <form action="{$conf->action_url}userEditDeleteAccount" method="POST">
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-danger">Usuń konto</button>
                    </div>
                </form>
            </div>
            <div class="mt-3"></div>
        </div>
        </div>
    </section class="pt-5 container mt-4">

    <!-- FORMATOWANIE NR TELEFONU I KODU POCZTOWEGO -->
    <script>
        function formatPhoneNumber(event) {
            let input = event.target;
            let value = input.value.replace(/\D/g, ''); // Usuwa wszystkie niecyfrowe znaki

            // Upewniamy się, że numer zaczyna się od "48"
            if (value.length > 0 && !value.startsWith('48')) {
                value = '48' + value; // Dodajemy "48" na początku numeru
            }

            // Formatowanie numeru telefonu w grupach 2-cyfrowych i 3-cyfrowych
            if (value.length <= 2) {
                value = value.slice(0, 2); // Formatowanie na xx
            } else if (value.length > 2 && value.length <= 5) {
                value = value.slice(0, 2) + ' ' + value.slice(2, 5); // Formatowanie na xx xxx
            } else if (value.length > 5 && value.length <= 8) {
                value = value.slice(0, 2) + ' ' + value.slice(2, 5) + ' ' + value.slice(5, 8); // Formatowanie na xx xxx xxx
            } else if (value.length > 8) {
                value = value.slice(0, 2) + ' ' + value.slice(2, 5) + ' ' + value.slice(5, 8) + ' ' + value.slice(8,
                    11); // Formatowanie na xx xxx xxx xxx
            }

            // Ustawiamy końcowy format z +48
            input.value = '+48' + value.slice(2); // Zostawiamy tylko numer bez "48" na początku
        }




        function formatPostalCode(event) {
            let input = event.target;
            let value = input.value.replace(/\D/g, ''); // Usuwa wszystkie niecyfrowe znaki
            if (value.length > 2) {
                value = value.slice(0, 2) + '-' + value.slice(2, 5);
            }
            input.value = value;
        }
    </script>
{/block}