<?php
/* Smarty version 4.3.4, created on 2024-11-05 11:57:35
  from 'C:\xampp\htdocs\Sklep\app\views\ProductDetailsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6729fa1ff2bf98_42445383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '498746a6eb52228b0cdb7aca6f490fb7e7b03b45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\ProductDetailsView.tpl',
      1 => 1730804253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6729fa1ff2bf98_42445383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7470173766729fa1ff07fb1_78827247', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_7470173766729fa1ff07fb1_78827247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7470173766729fa1ff07fb1_78827247',
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
                            <h1 style="color:rgba(255, 136, 0, 0.7); "><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2,","," ");?>
&nbsp;zł</h1>
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
                                <span id="valueDisplay" class="mx-2 link-body-emphasis h5" style="margin-top: 10px">0</span>
                                <a class="ring-item">
                                    <div onclick="updateValue(1)" class="ring bg-body-tertiary">
                                        <i class="bi bi-plus link-body-emphasis"></i>
                                    </div>
                                </a>
                            </div>

                            <!-- Przycisk dodawania do koszyka -->
                            
                            <button class="btn btn-secondary w-100 mt-3 link-body-emphasis"
                                style="background-color: rgba(233, 125, 1, 0.7); border-color: rgba(255, 136, 0, 0.5); color: black">

                                Dodaj do koszyka
                            </button>
                            <br>
                            <!-- Przycisk zakupu -->
                            <button class="btn btn-primary w-100 mt-2 link-body-emphasis"
                                style="background-color: rgba(255, 136, 0, 0.5); border-color: rgba(233, 125, 1, 0.5); color:black">
                                Kup teraz
                            </button>

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
                            <br>
                            <h4><b>
                                Kategorie:</b>
                            </h4>
                            <h5><i>
                                    <?php if (count($_smarty_tpl->tpl_vars['categories']->value) == 0) {?>
                                        Brak kategorii dla tego produktu.
                                    <?php } else { ?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category', false, NULL, 'catLoop', array (
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
        let vault = 0; // Początkowa wartość vault

        function updateValue(change) {
            vault += change;
            // Zapobiegamy, aby wartość nie była mniejsza niż 0
            if (vault < 0) {
                vault = 0;
            }
            if (vault > <?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
) {
            vault = 0;
        }
        document.getElementById('valueDisplay').textContent = vault;
        }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
