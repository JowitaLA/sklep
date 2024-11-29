<?php
/* Smarty version 4.3.4, created on 2024-11-29 17:55:57
  from 'C:\xampp\htdocs\Sklep\app\views\management\orderEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6749f21d7df717_26362654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0402532bc44cdf9752055826ee3f02d7daefe400' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\orderEdit.tpl',
      1 => 1732899354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6749f21d7df717_26362654 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9156625036749f21d7b47e2_36458103', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/edit.tpl");
}
/* {block 'content'} */
class Block_9156625036749f21d7b47e2_36458103 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9156625036749f21d7b47e2_36458103',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
updateOrder" enctype="multipart/form-data">
        <div class="d-flex align-items-center justify-content-between">
            <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id_order'];?>
"> <!-- Dodajemy ID zamówienia -->
            <input type="hidden" name="user_last_name" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['user_name'];?>
"> <!-- Dodajemy ID zamówienia -->
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex align-items-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo" width="50" height="50">
            </a>

            <a class="nav-link d-flex align-items-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/managementMain">
                <i class="bi bi-info-circle" style="font-size: 50px; color: #6c757d;" title="Wróć do zarządzania"></i>
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-3 fw-normal">Edytuj zamówienie</h1>
            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="row g-0 mb-0">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="user_name" id="user_name"
                        value="<?php echo $_smarty_tpl->tpl_vars['order']->value['user_name'];?>
">
                    <input type="hidden" class="form-control" name="id_user" id="id_user"
                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['id_user'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <label for="user_name">Login użytkownika</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="delivery_method" id="delivery_method"
                        value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_method'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <label for="delivery_method">Metoda dostawy</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="order_status" class="form-label h5">Status zamówienia</label>
                <select class="form-select" id="order_status" name="order_status">
                    <optgroup label="Status Zamówienia">
                        <option value="oczekujące" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'oczekujące') {?>selected<?php }?>>Oczekujące
                        </option>
                        <option value="przyjęte" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'przyjęte') {?>selected<?php }?>>Przyjęte</option>
                        <option value="w trakcie" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'w trakcie') {?>selected<?php }?>>W trakcie</option>
                        <option value="gotowe do wysyłki" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'gotowe do wysyłki') {?>selected<?php }?>>
                            Gotowe do wysyłki</option>
                        <option value="wysłane" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'wysłane') {?>selected<?php }?>>Wysłane</option>
                        <option value="anulowane" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'anulowane') {?>selected<?php }?>>Anulowane</option>
                        <option value="zwrot" <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 'zwrot') {?>selected<?php }?>>Zwrot</option>
                    </optgroup>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="payment_status" class="form-label h5">Status płatności</label>
                <select class="form-select" id="payment_status" name="payment_status">
                    <optgroup label="Status Płatności">
                        <option value="oczekujące" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'oczekujące') {?>selected<?php }?>>Oczekujące
                        </option>
                        <option value="w trakcie" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'w trakcie') {?>selected<?php }?>>W trakcie</option>
                        <option value="opłacono" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'opłacono') {?>selected<?php }?>>Opłacono</option>
                        <option value="nieopłacono" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'nieopłacono') {?>selected<?php }?>>Nieopłacono
                        </option>
                        <option value="zwrócono" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'zwrócono') {?>selected<?php }?>>Zwrócono</option>
                        <option value="błąd płatności" <?php if ($_smarty_tpl->tpl_vars['order']->value['payment_status'] == 'błąd płatności') {?>selected<?php }?>>Błąd
                            płatności</option>
                    </optgroup>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="delivery_status" class="form-label h5">Status dostawy</label>
                <select class="form-select" id="delivery_status" name="delivery_status">
                    <optgroup label="Status Dostawy">
                        <option value="oczekujące" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'oczekujące') {?>selected<?php }?>>Oczekujące
                        </option>
                        <option value="w trakcie" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'w trakcie') {?>selected<?php }?>>W trakcie</option>
                        <option value="wysłane" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'wysłane') {?>selected<?php }?>>Wysłane</option>
                        <option value="dostarczone" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'dostarczone') {?>selected<?php }?>>Dostarczone
                        </option>
                        <option value="anulowane" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'anulowane') {?>selected<?php }?>>Anulowane</option>
                        <option value="zwrócone" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'zwrócone') {?>selected<?php }?>>Zwrócone</option>
                        <option value="błąd dostawy" <?php if ($_smarty_tpl->tpl_vars['order']->value['delivery_status'] == 'błąd dostawy') {?>selected<?php }?>>Błąd dostawy
                        </option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Adres Dostawy</h3>
                <div class="row g-0 mb-0">
                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Imię"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['first_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="firstName">Imię</label>
                    </div>

                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nazwisko"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['last_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="lastName">Nazwisko</label>
                    </div>

                    <div class="col-12 form-floating">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="email">E-mail</label>
                    </div>

                    <div class="col-12 form-floating">
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="+48 ___ ___ ___" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                            oninput="formatPhoneNumber(event)">
                        <label for="phone_number">Numer Telefonu</label>
                    </div>

                    <div class="col-8 form-floating">
                        <input type="text" class="form-control" name="street" id="street" placeholder="Ulica"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['street'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="street">Ulica</label>
                    </div>

                    <div class="col-4 form-floating">
                        <input type="text" class="form-control" name="house_number" id="house_number" placeholder="Kod"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['house_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="house_number">Nr lokalu/mieszkania</label>
                    </div>

                    <div class="col-4 form-floating">
                        <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="__-___"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['postal_code'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                            oninput="formatPostalCode(event)">
                        <label for="postal_code">Kod pocztowy</label>
                    </div>

                    <div class="col-8 form-floating">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Miasto"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="city">Miasto</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="text-center">Adres Rozliczeń</h3>
                <div class="row g-0 mb-0">
                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="r_firstName" id="r_firstName" placeholder="Imię"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['first_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_firstName">Imię</label>
                    </div>

                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="r_lastName" id="r_lastName" placeholder="Nazwisko"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['last_name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_lastName">Nazwisko</label>
                    </div>

                    <div class="col-12 form-floating">
                        <input type="email" class="form-control" name="r_email" id="r_email" placeholder="E-mail"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_email">E-mail</label>
                    </div>

                    <div class="col-12 form-floating">
                        <input type="text" class="form-control" name="r_phone_number" id="r_phone_number"
                            placeholder="+48 ___ ___ ___" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                            oninput="formatPhoneNumber(event)">
                        <label for="r_phone_number">Numer telefonu</label>
                    </div>

                    <div class="col-8 form-floating">
                        <input type="text" class="form-control" name="r_street" id="r_street" placeholder="Ulica"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['street'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_street">Ulica</label>
                    </div>

                    <div class="col-4 form-floating">
                        <input type="text" class="form-control" name="r_house_number" id="r_house_number" placeholder="Kod"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['house_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_house_number">Nr domu/lokalu</label>
                    </div>

                    <div class="col-4 form-floating">
                        <input type="text" class="form-control" name="r_postal_code" id="r_postal_code" placeholder="__-___"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['postal_code'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                            oninput="formatPostalCode(event)">
                        <label for="r_postal_code">Kod pocztowy</label>
                    </div>

                    <div class="col-8 form-floating">
                        <input type="text" class="form-control" name="r_city" id="r_city" placeholder="Miasto"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['billing_address']['phone_number'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                        <label for="r_city">Miasto</label>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mt-2">
                <div class="row g-0 mb-0">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" name="additional_info" id="additional_info"
                            placeholder="Imię" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['order']->value['delivery_address']['additional_info'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <label for="additional_info">Dodatkowe informacje o Dostawie</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </div>
    </form>

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
<?php
}
}
/* {/block 'content'} */
}
