{* Widok Koszyka *}

{extends file="templates/secondary.tpl"}

{block name=head}
    <style>
        .step-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 25%;
            right: 0;
            width: 85%;
            height: 2px;
            background-color: #ccc;
            z-index: -1;
            transform: translateX(50%);
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(51, 51, 51);
            border-color: rgba(233, 125, 1, 0.5);
            border: 10px;
            color: white;
            line-height: 40px;
            font-weight: bold;
            margin: 0 auto 10px auto;
            z-index: 1;
            /* Numerki muszą być na wierzchu */
        }

        .step-title {
            font-size: 14px;
            color: white;
        }

        .step.active .step-number {
            background-color: rgba(233, 125, 1);
            border-color: rgba(255, 136, 0, 0.5);
            border: 10px;
        }

        .step.back .step-number {
            background-color: rgba(255, 136, 0, 0.5);
            border-color: rgba(233, 125, 1, 0.5);
        }

        .step.active .step-title {
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="step-container">
            <!-- Step 1 -->
            <a href="{$conf->action_url}cart" class="step active">
                <div class="step-number">1</div>
                <div class="step-title">Koszyk</div>
            </a>

            <!-- Step 2 -->
            <a href="{$conf->action_url}deliveryShow" class="step active">
                <div class="step-number">2</div>
                <div class="step-title">Dostawa</div>
            </a>
            <!-- Step 3 -->
            <a class="step active">
                <div class="step-number">3</div>
                <div class="step-title">Płatność</div>
            </a>
            <!-- Step 4 -->
            <a class="step">
                <div class="step-number">4</div>
                <div class="step-title">Gotowe</div>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{/block}

{block name=content}
    <style>
        .btn-sm-custom {
            width: 2rem;
            height: 2rem;
            font-size: 1rem;
            padding: 0;
        }

        .selectable-card {
            display: flex;
            /* Flexbox dla kafelka */
            flex-direction: column;
            /* Ustawienie układu w kolumnie */
            justify-content: center;
            /* Wyśrodkowanie pionowe */
            align-items: center;
            /* Wyśrodkowanie poziome */
            border: 2px solid transparent;
            cursor: pointer;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
            border-radius: 8px;
        }

        .selectable-card img {
            width: 70%;
            /* Obraz zajmuje 70% szerokości kafelka */
            height: auto;
            /* Proporcjonalna wysokość */
            aspect-ratio: 1 / 1;
            /* Zachowanie proporcji 1:1 */
            object-fit: fill;
            /* Wypełnienie kontenera */
            border-radius: 8px;
            /* Zaokrąglenie rogów */
            display: block;
        }

        .selectable-card:hover {
            border-color: #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .selectable-card.active {
            border-color: rgba(233, 125, 1);
            box-shadow: 0 4px 12px rgba(233, 125, 1, 0.4);
            background-color: rgba(233, 125, 1, 0.1);
        }
    </style>

    <section class="pt-5 container mt-4">
        <form action="{$conf->action_url}submitPayment" method="post">
            <div class="row g-5 d-flex">
                <div class="col-md-9">
                    <div class="row py-lg-5">

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            {foreach $paymentMethods as $pay}
                                <div class="col">
                                    <div class="product-card bg-body-tertiary selectable-card">
                                        <img src="{$conf->app_url}/assets/img/payments/{$pay.icon}" data-name="{$pay["name"]}"
                                            alt="Ikona dostawy: {$pay.name}">
                                        <h3 class="mt-2">{$pay["name"]}</h3>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                        <div id="error-message" class="alert alert-danger mt-3" style="display: none;">
                            Proszę wybrać metodę płatności!
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="row py-lg-5">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Podsumowanie Zamówienia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="d-flex justify-content-between">
                                            <span>Wartość produktów:</span>
                                            <span>
                                                {$productsValue|number_format:2:",":" "} zł
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-flex justify-content-between">
                                            <span>Dostawa:</span>
                                            <span>{$deliveryValue}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="text-center mt-1">

                                Do zapłaty: <span> {$totalValue|number_format:2:",":" "} zł </span>

                            </h5>

                            <div class="text-center mt-3">
                                <input type="hidden" name="paymentMethod" id="paymentMethodValue" value="">
                                <button type="submit" class="btn btn-secondary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Kup i
                                    zapłać</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </section>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            // Sprawdź, czy została wybrana metoda płatności
            if (document.getElementById('paymentMethodValue').value === "") {
                // Zatrzymaj wysyłanie formularza
                event.preventDefault();

                // Pokaż komunikat o błędzie
                document.getElementById('error-message').style.display = 'block';
            }
        });

        document.querySelectorAll('.selectable-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Usuń klasę 'active' z innych kafelków
                document.querySelectorAll('.selectable-card').forEach(function(otherCard) {
                    otherCard.classList.remove('active');
                });

                // Dodaj klasę 'active' do klikniętego kafelka
                card.classList.add('active');

                // Pobierz metodę płatności i przypisz do ukrytego pola
                const paymentMethod = card.querySelector('img').getAttribute('data-name');
                document.getElementById('paymentMethodValue').value = paymentMethod;

                // Ukryj komunikat o błędzie, jeśli metoda została wybrana
                document.getElementById('error-message').style.display = 'none';
            });
        });
    </script>
{/block}