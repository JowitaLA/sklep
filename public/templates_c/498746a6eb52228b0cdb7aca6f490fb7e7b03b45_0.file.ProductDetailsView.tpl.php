<?php
/* Smarty version 4.3.4, created on 2024-11-21 14:25:41
  from 'C:\xampp\htdocs\Sklep\app\views\ProductDetailsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673f34d5949790_84911856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '498746a6eb52228b0cdb7aca6f490fb7e7b03b45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ProductDetailsView.tpl',
      1 => 1732195540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673f34d5949790_84911856 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1368543410673f34d5921c79_15848328', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_1368543410673f34d5921c79_15848328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1368543410673f34d5921c79_15848328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <section class="pt-5 container bg-body-tertiary mt-4 mb-4 pb-5">
        <div class=" justify-content-center row">
            <!-- Obraz po lewej stronie -->
            <div class="col-lg-8 col-md-8 d-flex flex-column">
                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['images']->value) > 0) {?>
                    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" style="height: 40rem;">
                        <div class="carousel-indicators">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image', false, NULL, 'img', array (
  'index' => true,
  'first' => true,
));
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index'];
?>
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index'] : null);?>
"
                                    class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first'] : null)) {?>active<?php }?>"
                                    aria-label="Slide <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index'] : null)+1;?>
" style="aspect-ratio: 1/1;">
                                </button>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>

                        <div class="carousel-inner">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image', false, NULL, 'img', array (
  'index' => true,
  'first' => true,
));
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index'];
?>
                                <div class="carousel-item bg-body-secondary <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['first'] : null)) {?>active<?php }?>"
                                    style="border-radius: 8px; height: 40rem;">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['url'];?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
"
                                        alt="Slide <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_img']->value['index'] : null)+1;?>
"
                                        style="border-radius: 8px; max-width: 95%; max-height: 95%;">
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Powrót</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Dalej</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <p>Brak dostępnych zdjęć dla tego produktu.</p>
                <?php }?>
            </div>

            <!-- Szczegóły produktu po prawej stronie -->
            <div class="col-lg-4 col-md-8 d-flex flex-column">

                <div class="bg-body-secondary" style="border-radius: 8px; height: 40rem;">
                    <!-- Elementy na samej górze -->
                    <div style="margin: 5%;">
                        <div class="mb-4">
                            <h2 class="fw-light"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i> 4.8
                                </div>
                                <div href="#">150 Recenzji</div>
                            </div>
                            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">
                        </div>



                        <!-- Cena produktu -->
                        <div class="link-body-emphasis mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 style="color:rgba(255, 136, 0, 0.7);"><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2,","," ");?>
&nbsp;zł
                                </h1>
                                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/addToWishlist" method="post" style="display:inline;">
                                        <input type="hidden" name="idProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                                        <input type="hidden" name="action" value='productDetails?product=<?php echo $_smarty_tpl->tpl_vars['product']->value['url'];?>
'>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            title="Dodaj do Listy Życzeń">
                                            <i class="bi bi-bookmark-heart"></i>
                                        </button>
                                    </form>
                                <?php }?>
                            </div>
                            <h7><i>Cena zawiera podatek VAT</i></h7>
                        </div>


                        <hr class="featurette-divider" style="height: 1px; margin: 10px 0; margin-bottom: 20px;">

                        <!-- Inne elementy umieszczane niżej -->
                        <div class="flex-grow-1"></div>

                        <!-- Przycisk i sekcja ilości -->
                        <div class="mt-auto flex-column align-items-center text-center">
                            <!-- Ilość produktu -->


                            <h3 style="margin-top: 2rem;"> Ilość: </h3>
                            <div style="margin-top: 2rem;">
                                <span class="ml-2" style="font-style: italic; ">Zostało <?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
 sztuk</span>
                            </div>
                            <div class="d-flex align-items-center"
                                style="justify-content: center; margin-top: 5px; margin-bottom: 20px;">
                                <a class="ring-item">
                                    <div onclick="updateValue(-1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-dash link-body-emphasis"></i>
                                    </div>
                                </a>
                                <span id="valueDisplay" name="value" class="mx-2 link-body-emphasis h5"
                                    style="margin-top: 10px"></span>
                                <a class="ring-item">
                                    <div onclick="updateValue(1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-plus link-body-emphasis"></i>
                                    </div>
                                </a>
                            </div>

                            <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addToCart">
                                <input type="hidden" name="product_ID" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                                <input type="hidden" name="quantity" id="quantityInput"> <!-- Ukryte pole dla ilości -->

                                <button type="submit" class="btn btn-secondary w-100 mt-3 link-body-emphasis"
                                    style="background-color: rgba(233, 125, 1, 0.7); border-color: rgba(255, 136, 0, 0.5); color: black">
                                    Dodaj do koszyka
                                </button>
                            </form>

                            <a class="btn btn-primary w-100 mt-2 link-body-emphasis" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showCart"
                                style="background-color: rgba(255, 136, 0, 0.5); border-color: rgba(233, 125, 1, 0.5); color: black">
                                <input type="hidden" name="product_ID" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                                <input type="hidden" name="quantity" id="quantityInput">
                                Kup teraz
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">

            <!-- Opis produktu -->
            <div class="col-lg-12 col-md-12 d-flex flex-column">
                <div class="bg-body-secondary" style="border-radius: 8px;">
                    <div class="col-lg-11 col-md-12" style="margin: 1rem;">
                        <h1>Opis</h1>
                        <div class="product-description">
                            <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                        </div>
                        <!-- Opis produktu -->
                        <div class="mb-4">
                            <h4 style="font-weight: bold;">
                                Kategorie:
                            </h4>
                            <h5><i>
                                    <?php if (count($_smarty_tpl->tpl_vars['product_categories']->value) == 0) {?>
                                        Brak kategorii dla tego produktu.
                                    <?php } else { ?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_categories']->value, 'category', false, NULL, 'catLoop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['total'];
?>
                                            <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_catLoop']->value['last'] : null)) {?>, <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?> </i>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider" style="height: 1px; margin: 10px 0;">


            <div class="col-lg-12 col-md-12 d-flex flex-column">
                <div class="bg-body-secondary" style="border-radius: 8px;">
                    <div class="col-lg-11 col-md-12" style="margin: 1rem;">
                        <h1 class="d-inline">
                            <span>Opinie</span>
                        </h1>
                        <h4 class="d-inline">
                            <i>(165)</i>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo '<script'; ?>
>
        let vault = 1; // Początkowa wartość vault

        // Funkcja do aktualizacji wartości ilości w formularzu
        function updateQuantityInput() {
            const quantityInput = document.getElementById("quantityInput");
            quantityInput.value = vault; // Przypisujemy wartość 'vault' do ukrytego pola quantityInput
        }

        // Funkcja do ustawiania początkowej wartości w elemencie span
        function initializeValue() {
            document.getElementById('valueDisplay').textContent = vault;
            updateQuantityInput(); // Ustawiamy wartość również w ukrytym polu
        }

        // Funkcja do aktualizacji wartości ilości
        function updateValue(change) {
            vault += change;

            // Zapobiegamy, aby wartość nie była mniejsza niż 0
            if (vault < 0) {
                vault = 0;
            }

            // Zapobiegamy, aby wartość nie była większa niż dostępna ilość produktu
            if (vault > 10) { // Możesz zmienić 10 na odpowiednią liczbę
                vault = 10;
            }

            // Wyświetlanie zaktualizowanej wartości
            document.getElementById('valueDisplay').textContent = vault;
            updateQuantityInput(); // Zaktualizuj wartość również w ukrytym polu
        }

        // Wywołanie funkcji initializeValue po załadowaniu strony, aby ustawić początkową wartość
        document.addEventListener('DOMContentLoaded', function() {
            initializeValue();
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
