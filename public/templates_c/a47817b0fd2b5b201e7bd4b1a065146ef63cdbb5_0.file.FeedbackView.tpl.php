<?php
/* Smarty version 4.3.4, created on 2024-11-29 18:43:51
  from 'C:\xampp\htdocs\Sklep\app\views\FeedbackView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6749fd57ce6f35_01144183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a47817b0fd2b5b201e7bd4b1a065146ef63cdbb5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\FeedbackView.tpl',
      1 => 1732902228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6749fd57ce6f35_01144183 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21317356776749fd57ce2637_88026792', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_21317356776749fd57ce2637_88026792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_21317356776749fd57ce2637_88026792',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container py-5">
        <h1 class="text-center pt-3">Twoja Opinia</h1>
        <p class="text-center mb-4">
            Twoja opinia jest dla nas bardzo ważna! Wypełnij poniższy formularz, aby podzielić się swoimi uwagami.
        </p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
submitFeedback">
            <div class="mb-3">
                <label for="name" class="form-label">Imię i nazwisko (opcjonalnie)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Wpisz swoje imię">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail (opcjonalnie)</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Wpisz swój e-mail">
            </div>

            <!-- Oceny poszczególnych aspektów -->
            <h4 class="mt-4">Oceń nasze usługi</h4>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>Aspekt</th>
                            <th>Ocena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dostawa</td>
                            <td>
                                <select class="form-select" id="delivery-rating" name="delivery_rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Płatności</td>
                            <td>
                                <select class="form-select" id="payment-rating" name="payment_rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Zamówienia</td>
                            <td>
                                <select class="form-select" id="order-rating" name="order-rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wyszukiwanie produktów</td>
                            <td>
                                <select class="form-select" id="search-rating" name="search_rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Funkcjonalność strony</td>
                            <td>
                                <select class="form-select" id="site-rating" name="site_rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wygląd strony</td>
                            <td>
                                <select class="form-select" id="style-rating" name="other_rating">
                                    <option value="" selected>Wybierz ocenę</option>
                                    <option value="5">(5) Doskonale</option>
                                    <option value="4">(4) Bardzo dobrze</option>
                                    <option value="3">(3) Dobrze</option>
                                    <option value="2">(2) Średnio</option>
                                    <option value="1">(1) Słabo</option>
                                    <option value="0">Nie mam zdania</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Zostaw swoją wiadomość (opcjonalnie)</label>
                <textarea class="form-control" id="message" name="message" rows="4"
                    placeholder="Co według Ciebie powinniśmy poprawić? Dlaczego taka ocena? Zostaw swoją opinię tutaj!"
                    maxlength="1000" oninput="updateCharacterCount()"></textarea>
                <div class="form-text">
                    Pozostało <span id="char-count">1000</span> znaków.
                </div>
            </div>

            <?php echo '<script'; ?>
>
                function updateCharacterCount() {
                    const textarea = document.getElementById('message');
                    const charCount = document.getElementById('char-count');
                    const remaining = 1000 - textarea.value.length;
                    charCount.textContent = remaining;
                }
            <?php echo '</script'; ?>
>



            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: rgba(233, 125, 1); border-color: rgba(255, 136, 0);">Wyślij opinię</button>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
