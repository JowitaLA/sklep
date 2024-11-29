<?php
/* Smarty version 4.3.4, created on 2024-11-27 22:56:40
  from 'C:\xampp\htdocs\Sklep\app\views\DeliveryView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67479598a8aab3_05617975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61df2f635c9945ebb11caa6940923f4987cfce14' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\DeliveryView.tpl',
      1 => 1732719336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67479598a8aab3_05617975 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7848863276747959861aa55_60436648', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1244178591674795986f3626_35771800', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'head'} */
class Block_7848863276747959861aa55_60436648 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_7848863276747959861aa55_60436648',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
cart" class="step active">
                <div class="step-number">1</div>
                <div class="step-title">Koszyk</div>
            </a>

            <!-- Step 2 -->
            <a class="step active">
                <div class="step-number">2</div>
                <div class="step-title">Dostawa</div>
            </a>
            <!-- Step 3 -->
            <a class="step">
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

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'content'} */
class Block_1244178591674795986f3626_35771800 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1244178591674795986f3626_35771800',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

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
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
submitDelivery" method="post">

            <div class="row g-5 d-flex">
                <div class="col-md-9">
                    <div class="row py-lg-5">

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['delivery']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
                                <div class="col">
                                    <div class="product-card bg-body-tertiary selectable-card" data-id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_delivery'];?>
"
                                        data-cost="<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['d']->value["cost"],2,","," ");?>
 zł" data-name="<?php echo $_smarty_tpl->tpl_vars['d']->value["name"];?>
" data-value="<?php echo $_smarty_tpl->tpl_vars['d']->value["cost"];?>
"
                                        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_delivery']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_delivery']->value['first'] : null)) {?>class="product-card bg-body-tertiary selectable-card selected"
                                        <?php }?>>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/delivery/<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
.jpg"
                                            alt="Ikona dostawy: <?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
" onerror="
                            let formats = ['png'];
                            let img = this;
                            let index = 0;

                            function tryNextFormat() {
                                if (index < formats.length) {
                                    img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/delivery/<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
.' + formats[index++];
                                } else {
                                    img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/delivery/default.jpg';
                                }
                            }

                            tryNextFormat();
                            this.onerror = tryNextFormat;
                            ">
                                        <h3 class="mt-2"><?php echo $_smarty_tpl->tpl_vars['d']->value["name"];?>
</h3>
                                        <h6><?php echo $_smarty_tpl->tpl_vars['d']->value["estimated_time"];?>
</h6>
                                        <h6><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['d']->value["cost"],2,","," ");?>
&nbsp;zł</h6>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <!-- Komunikat o błędzie jeśli nie zaznaczono żadnej opcji -->
                            <div class="invalid-feedback" id="deliveryError" style="display:none;">
                                Proszę wybrać opcje dostawy.
                            </div>
                        </div>



                        <!-- Dodanie miejsca na Adres Dostawy -->
                        <hr class="my-4">

                        <div class="">
                            <h4 class="mb-3"> Adres Dostawy</h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Imię</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Imię"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['first_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać imię.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Nazwisko</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nazwisko"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['last_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać nazwisko.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać prawidłowy e-mail.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="phone_number" class="form-label">Numer telefonu</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="+48 ___ ___ ___"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                                        oninput="formatPhoneNumber(event)">
                                    <div class="invalid-feedback">
                                        Proszę wpisać numer telefonu.
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="street" class="form-label">Ulica</label>
                                    <input type="text" class="form-control" name="street" id="street" placeholder="Ulica"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['street'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać ulicę.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="house_number" class="form-label">Nr domu/lokalu</label>
                                    <input type="text" class="form-control" name="house_number" id="house_number" placeholder="Kod"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['house_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać numer domu/lokalu.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="postal_code" class="form-label">Kod pocztowy</label>
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="__-___"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['postal_code'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                                        oninput="formatPostalCode(event)">
                                    <div class="invalid-feedback">
                                        Proszę wpisać kod pocztowy.
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="city" class="form-label">Miasto</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Miasto"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['deliveryAdress']->value['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać miasto.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="delivery-information" class="form-label">Dodatkowe informacje o Dostawie
                                        <span class="text-body-secondary">(opcjonalnie)</span></label>
                                    <input type="text" class="form-control"  name="delivery_information" id="delivery-information"
                                        placeholder="Wpisz tu informacje dla kuriera">
                                </div>
                            </div>

                            <hr class="my-4">

                        </div>
                        <div class="">
                            <h4 class="mb-3"> Adres Rozliczeniowy </h4>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="save-info">
                                <label class="form-check-label" for="save-info">Taki sam jak Adres Dostawy</label>
                            </div>
                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <label for="r_firstName" class="form-label">Imię</label>
                                    <input type="text" class="form-control" name="r_firstName" id="r_firstName" placeholder="Imię"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['first_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać imię.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="r_lastName" class="form-label">Nazwisko</label>
                                    <input type="text" class="form-control" name="r_lastName" id="r_lastName" placeholder="Nazwisko"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['last_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać nazwisko.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="r_email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="r_email" id="r_email" placeholder="E-mail"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać prawidłowy e-mail.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="r_phone_number" class="form-label">Numer telefonu</label>
                                    <input type="text" class="form-control" name="r_phone_number" id="r_phone_number"
                                        placeholder="+48 ___ ___ ___" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                                        required oninput="formatPhoneNumber(event)">
                                    <div class="invalid-feedback">
                                        Proszę wpisać numer telefonu.
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="r_street" class="form-label">Ulica</label>
                                    <input type="text" class="form-control" name="r_street" id="r_street" placeholder="Ulica"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['street'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać ulicę.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="r_house_number" class="form-label">Nr domu/lokalu</label>
                                    <input type="text" class="form-control" name="r_house_number" id="r_house_number" placeholder="Kod"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['house_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać numer domu/lokalu.
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="r_postal_code" class="form-label">Kod pocztowy</label>
                                    <input type="text" class="form-control" name="r_postal_code" id="r_postal_code" placeholder="__-___"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['postal_code'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                                        oninput="formatPostalCode(event)">
                                    <div class="invalid-feedback">
                                        Proszę wpisać kod pocztowy.
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="r_city" class="form-label">Miasto</label>
                                    <input type="text" class="form-control" name="r_city" id="r_city" placeholder="Miasto"
                                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['billingAdress']->value['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                                    <div class="invalid-feedback">
                                        Proszę wpisać miasto.
                                    </div>
                                </div>

                            </div>
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
                                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['value']->value,2,","," ");?>
 zł
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-flex justify-content-between">
                                            <span>Dostawa:</span>
                                            <span name="selectedDelivery" id="selectedDelivery"><?php echo smarty_modifier_number_format(0,2,","," ");?>

                                                zł</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="text-center mt-1">
                                <h5 class="text-center mt-1">

                                    Do zapłaty: <span id="totalAmount"></span>

                                </h5>

                            </h5>

                            <div class="text-center">
                                <input type="hidden" name="selectedDeliveryValue" id="selectedDeliveryValue" value="">
                                <input type="hidden" name="deliveryCost" id="deliveryCostValue" value="">
                                <button type="submit" class="btn btn-secondary"
                                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1);">Przejdź
                                    do Płatności</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </form>

    </section>
    </div>

    <?php echo '<script'; ?>
>
        document.querySelectorAll('.selectable-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Zmieniamy klasę zaznaczenia
                document.querySelectorAll('.selectable-card').forEach(function(otherCard) {
                    otherCard.classList.remove('selected');
                });
                card.classList.add('selected');

                // Aktualizujemy wybraną opcję dostawy w tabeli
                const cost = card.getAttribute('data-cost');
                document.getElementById('selectedDelivery').innerText = cost;

                const selectedDelivery = card.getAttribute('data-name');
                const deliveryCost = card.getAttribute('data-value');
                console.log(document.getElementById('selectedDeliveryValue'));
                console.log(document.getElementById('deliveryCostValue'));

                document.getElementById('selectedDeliveryValue').value = selectedDelivery;
                document.getElementById('deliveryCostValue').value = deliveryCost;
            });
        });
    <?php echo '</script'; ?>
>
    <!-- "DO ZAPŁATY: " -->
    <?php echo '<script'; ?>
>
        // Funkcja do aktualizacji całkowitej kwoty po dodaniu dostawy
        function updateTotalAfterDiscount() {
            // Pobieranie wartości z elementu #selectedDelivery
            var selectedDeliveryValue = parseFloat(document.getElementById("selectedDelivery").innerText.replace(",", "."));

            // Załóżmy, że <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 to zmienna PHP, którą musisz przekazać jako zmienną JavaScript, np. przez JSON
            var value = <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
; // Musisz zaktualizować tę wartość z serwera lub z JS, np. wstawiając ją do szablonu

            // Całkowity koszt
            var totalAfterDiscount = value + selectedDeliveryValue;

            // Formatowanie wyniku
            var formattedTotal = totalAfterDiscount.toFixed(2).replace(".", ",").replace(/\B(?=(\d<?php echo 3;?>
)+(?!\d))/g, " ");

            // Zaktualizowanie HTML z wynikiem
            document.getElementById("totalAmount").innerHTML = formattedTotal + " zł";
        }

        // Nasłuchiwanie kliknięcia w karty dostawy
        document.querySelectorAll('.selectable-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Zmieniamy klasę zaznaczenia
                document.querySelectorAll('.selectable-card').forEach(function(otherCard) {
                    otherCard.classList.remove('selected');
                });
                card.classList.add('selected');

                // Pobieramy koszt z atrybutu data-cost
                const cost = card.getAttribute('data-cost');
                // Ustawiamy wartość kosztu w elemencie #selectedDelivery
                document.getElementById('selectedDelivery').innerText = cost;

                // Zaktualizuj całkowity koszt
                updateTotalAfterDiscount();
            });
        });

        // Jeżeli element #selectedDelivery już zawiera wartość początkową, wywołaj funkcję na początku, aby ją zaktualizować
        window.onload = updateTotalAfterDiscount;
    <?php echo '</script'; ?>
>
    <!-- FORMATOWANIE NR TELEFONU I KODU POCZTOWEGO -->
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
    <!-- DODANIE KLASY 'ACTIVE' DO KLIKNIĘTEGO KAFELKA -->
    <?php echo '<script'; ?>
>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".selectable-card");
            const hiddenInput = document.getElementById("delivery_id");

            cards.forEach(card => {
                card.addEventListener("click", () => {
                    // Usuń klasę 'active' ze wszystkich kafelków
                    cards.forEach(c => c.classList.remove("active"));

                    // Dodaj klasę 'active' do klikniętego kafelka
                    card.classList.add("active");
                });
            });
        });
    <?php echo '</script'; ?>
>
    <!-- KOPIOWANIE DANYCH Z ADRESU DOSTAWY DO ADRESU ROZLICZENIOWEGO -->
    <?php echo '<script'; ?>
>
        function copyDeliveryToBilling() {
            if (document.getElementById('save-info').checked) {
                document.getElementById('r_firstName').value = document.getElementById('firstName').value;
                document.getElementById('r_lastName').value = document.getElementById('lastName').value;
                document.getElementById('r_email').value = document.getElementById('email').value;
                document.getElementById('r_phone_number').value = document.getElementById('phone_number').value;
                document.getElementById('r_street').value = document.getElementById('street').value;
                document.getElementById('r_house_number').value = document.getElementById('house_number').value;
                document.getElementById('r_postal_code').value = document.getElementById('postal_code').value;
                document.getElementById('r_city').value = document.getElementById('city').value;
            }
        }

        // Nasłuchiwacz na checkbox, aby reagować na zmianę zaznaczenia
        document.getElementById('save-info').addEventListener('change', function() {
            copyDeliveryToBilling();
        });

        // Nasłuchiwacze na zmiany w polach adresu dostawy, aby aktualizować dane w formularzu rozliczeniowym
        document.querySelectorAll(
                '#firstName, #lastName, #email, #phone_number, #street, #house_number, #postal_code, #city')
            .forEach(function(input) {
                input.addEventListener('input', function() {
                    if (document.getElementById('save-info').checked) {
                        copyDeliveryToBilling();
                    }
                });
            });
    <?php echo '</script'; ?>
>
    <!-- ZABLOKOWANIE EDYCJI ADRESU ROZLICZENIOWEGO PO KLIKNIĘCIU CHECKA -->
    <?php echo '<script'; ?>
>
        document.addEventListener('DOMContentLoaded', function() {
            const saveInfoCheckbox = document.getElementById('save-info');
            const firstName = document.getElementById('firstName');
            const lastName = document.getElementById('lastName');
            const email = document.getElementById('email');
            const phoneNumber = document.getElementById('phone_number');
            const street = document.getElementById('street');
            const houseNumber = document.getElementById('house_number');
            const postalCode = document.getElementById('postal_code');
            const city = document.getElementById('city');

            const rFirstName = document.getElementById('r_firstName');
            const rLastName = document.getElementById('r_lastName');
            const rEmail = document.getElementById('r_email');
            const rPhoneNumber = document.getElementById('r_phone_number');
            const rStreet = document.getElementById('r_street');
            const rHouseNumber = document.getElementById('r_house_number');
            const rPostalCode = document.getElementById('r_postal_code');
            const rCity = document.getElementById('r_city');

            // Funkcja synchronizująca adres dostawy i rozliczeniowy
            function syncBillingAddress() {
                if (saveInfoCheckbox.checked) {
                    rFirstName.value = firstName.value;
                    rLastName.value = lastName.value;
                    rEmail.value = email.value;
                    rPhoneNumber.value = phoneNumber.value;
                    rStreet.value = street.value;
                    rHouseNumber.value = houseNumber.value;
                    rPostalCode.value = postalCode.value;
                    rCity.value = city.value;

                    // Zablokowanie edycji
                    rFirstName.disabled = true;
                    rLastName.disabled = true;
                    rEmail.disabled = true;
                    rPhoneNumber.disabled = true;
                    rStreet.disabled = true;
                    rHouseNumber.disabled = true;
                    rPostalCode.disabled = true;
                    rCity.disabled = true;
                } else {
                    // Odblokowanie pól
                    rFirstName.disabled = false;
                    rLastName.disabled = false;
                    rEmail.disabled = false;
                    rPhoneNumber.disabled = false;
                    rStreet.disabled = false;
                    rHouseNumber.disabled = false;
                    rPostalCode.disabled = false;
                    rCity.disabled = false;
                }
            }

            // Synchronizowanie danych przy zmianie checkboxa
            saveInfoCheckbox.addEventListener('change', syncBillingAddress);

            // Initial sync when the page loads
            syncBillingAddress();
        });
    <?php echo '</script'; ?>
>
    <!-- WALIDACJA FORMULARZA -->
    <?php echo '<script'; ?>
>
        // Funkcja walidacji formularza
        function validateForm() {
            let isValid = true;
            const fields = [
                'firstName', 'lastName', 'email', 'phone_number', 'street', 'house_number', 'postal_code', 'city',
                'r_firstName', 'r_lastName', 'r_email', 'r_phone_number', 'r_street', 'r_house_number', 'r_postal_code',
                'r_city'
            ];

            fields.forEach(function(fieldId) {
                const field = document.getElementById(fieldId);
                const feedback = field.nextElementSibling;
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    feedback.style.display = 'block';
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            });

            return isValid;
        }

        // Funkcja sprawdzająca, czy jest zaznaczone coś z kart
        function validateSelection() {
            const selectedCard = document.querySelector('.selectable-card.selected');
            const errorMessage = document.getElementById('deliveryError');

            if (!selectedCard) {
                errorMessage.style.display = 'block'; // Wyświetl komunikat o błędzie
                return false; // Jeśli nic nie jest zaznaczone, zwraca false
            }

            errorMessage.style.display = 'none'; // Ukryj komunikat, jeśli coś jest zaznaczone
            return true; // Jeśli coś jest zaznaczone, zwraca true
        }

        // Funkcja obsługująca kliknięcie na kafelek, aby zaznaczyć wybór
        document.querySelectorAll('.selectable-card').forEach(card => {
            card.addEventListener('click', function() {
                // Zdejmij zaznaczenie ze wszystkich kafelków
                document.querySelectorAll('.selectable-card').forEach(c => c.classList.remove('selected'));

                // Zaznacz kliknięty kafelek
                this.classList.add('selected');

                // Ukryj komunikat o błędzie, gdy coś zostanie wybrane
                const errorMessage = document.getElementById('deliveryError');
                errorMessage.style.display = 'none';
            });
        });

        // Obsługa formularza
        document.querySelector('form').addEventListener('submit', function(event) {
            const isFormValid = validateForm();
            const isDeliverySelected = validateSelection(); // Walidacja opcji dostawy

            if (!isFormValid || !isDeliverySelected) {
                event.preventDefault(); // Zatrzymanie wysyłania formularza, jeśli są błędy walidacji
            }
        });

        // Usuwanie wiadomości o błędach po wpisaniu danych
        const fields = [
            'firstName', 'lastName', 'email', 'phone_number', 'street', 'house_number', 'postal_code', 'city',
            'r_firstName', 'r_lastName', 'r_email', 'r_phone_number', 'r_street', 'r_house_number', 'r_postal_code',
            'r_city'
        ];

        fields.forEach(function(fieldId) {
            const field = document.getElementById(fieldId);
            const feedback = field.nextElementSibling;

            field.addEventListener('input', function() {
                if (field.value.trim()) {
                    field.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                } else {
                    field.classList.add('is-invalid');
                    feedback.style.display = 'block';
                }
            });
        });

        // Funkcja, która usuwa walidację, gdy checkbox "Taki sam jak Adres Dostawy" jest zaznaczony
        const checkbox = document.getElementById('save-info');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Usuwanie błędów walidacji dla pól adresu do korespondencji
                const fieldsToClear = [
                    'r_firstName', 'r_lastName', 'r_email', 'r_phone_number', 'r_street', 'r_house_number',
                    'r_postal_code', 'r_city'
                ];

                fieldsToClear.forEach(function(fieldId) {
                    const field = document.getElementById(fieldId);
                    const feedback = field.nextElementSibling;
                    field.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                });
            }
        });
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'content'} */
}
