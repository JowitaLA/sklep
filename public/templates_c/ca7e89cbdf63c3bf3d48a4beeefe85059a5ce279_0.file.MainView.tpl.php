<?php
/* Smarty version 4.3.4, created on 2024-10-16 00:08:01
  from 'C:\xampp\htdocs\Sklep\app\views\MainView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_670ee7c1dea209_25236439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca7e89cbdf63c3bf3d48a4beeefe85059a5ce279' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\MainView.tpl',
      1 => 1729030078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670ee7c1dea209_25236439 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_693937051670ee7c1dcebd9_94381874', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_693937051670ee7c1dcebd9_94381874 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_693937051670ee7c1dcebd9_94381874',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Sklep\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

   <!-- Panele -->
   <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/background/3.png" alt="Slide 1">
            <div class="container">
               <div class="carousel-caption text-start">
                  <h1>Gwarancja niskich cen</h1>
                  <p class="opacity-75">Szukaj u nas produktów w przystępnej cenie.</p>
                  <p><a class="btn btn-lg btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registerShow">Dołącz do nas już teraz</a>
                  </p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/background/2.png" alt="Slide 2">
            <div class="container">
               <div class="carousel-caption">
                  <h1>Nie wiesz co kupić?</h1>
                  <p>Znajdź coś u nas dla Siebie przeszukując wiele dostępnych kategorii.</p>
                  <p><a class="btn btn-lg btn-primary" href="#categories">Nasze Kategorie</a></p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/background/1.png" alt="Slide 3">
            <div class="container">
               <div class="carousel-caption text-end">
                  <h1>O nas</h1>
                  <p>Witamy w naszym sklepie internetowym! Jesteśmy firmą, która łączy pasję do zakupów z nowoczesnymi
                     rozwiązaniami technologicznymi, aby zapewnić naszym klientom wyjątkowe doświadczenie zakupowe.
                     Wierzymy,
                     że zakupy online są nie tylko wygodne, ale i bezpieczne, dlatego stale rozszerzamy nasz asortyment,
                     aby
                     zapewnić potrzebom każdego z Was.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Czytaj więcej...</a></p>
               </div>
            </div>
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
   <!-- Nasze Kategorie -->
   <div id="categories" class="categories">
      <h2>Nasze kategorie</h2>
      <div class="circle-container">
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
            <a href="/kategoria" class="circle-item">
               <div class="circle">
                  <i class="<?php echo $_smarty_tpl->tpl_vars['i']->value["icon"];?>
"></i>
               </div>
               <p><?php echo $_smarty_tpl->tpl_vars['i']->value["name"];?>
</p>
            </a>
         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
   </div>

   <hr class="featurette-divider">
   <!-- Ostatnio Dodane Produkty -->
   <div class="recent-products py-4 ">
      <div class="container marketing">
         <h2 class="text-center mb-4">Ostatnio Dodane Produkty</h2>
         <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['last_products']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
               <a href="/elektronika" class="col-md-3 mb-4">
                  <div class="product-card" fill="var(--bs-secondary-color)">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['p']->value["image"];?>
/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
" class="img-fluid">
                     <h3 class="mt-3"><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</h3>
                     <i class="fa stars">&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</i>
                     <p class="price mt-2"><?php ob_start();
echo $_smarty_tpl->tpl_vars['p']->value["price"];
$_prefixVariable1 = ob_get_clean();
echo smarty_modifier_number_format($_prefixVariable1,2,","," ");?>
&nbsp;zł</p>
                                       </div>
               </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <p style="text-align: right;"><a class="btn btn-lg btn-primary" href="#">Więcej...</a></p>

         </div>
      </div>
   </div>

   <hr class="featurette-divider">

   <div class="recent-products py-2 ">
      <div class="container marketing">

         <div class="row mb-2">
            <div class="col-md-6">
               <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                     <h3 class="mb-0">Zapisz się do Newsletter'a</h3>
                     <div class="mb-1 text-body-secondary">Bądź na bieżąco z naszymi najnowszymi promocjami</div>
                     <p class="card-text mb-auto">Chcesz być na bieżąco z nowościami, promocjami i ekskluzywnymi ofertami?
                        Zostaw nam swój adres mail, a będziesz pierwszą osobą, która dowie się o wszystkich nowościach w
                        naszym sklepie! </p>
                     <a href="newsletter" class="icon-link gap-1 icon-link-hover stretched-link">
                        <svg class="bi">
                           <use xlink:href="#chevron-right" />
                        </svg>
                     </a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                     <svg class="bd-placeholder-img" width="200" height="280" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title></title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                           dy=".3em">Zapisz się już teraz!</text>
                     </svg>
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                     <strong class="d-inline-block mb-2 text-success-emphasis"></strong>
                     <h3 class="mb-0">Wyślij Feedback</h3>
                     <div class="mb-1 text-body-secondary">Pomóż w ulepszeniu Yups</div>
                     <p class="mb-auto">Twoja opinia jest dla nas niezwykle ważna. To właśnie dzięki niej możemy stale
                        udoskonalać nasz sklep, eliminując potencjalne problemy i tworząc coraz to lepsze doświadczenia
                        zakupowe dla wszystkich klientów.</p>
                     <a href="feedback" class="icon-link gap-1 icon-link-hover stretched-link">
                        <svg class="bi">
                           <use xlink:href="#chevron-right" />
                        </svg>
                     </a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                     <svg class="bd-placeholder-img" width="200" height="280" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title></title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                           dy=".3em">Wyślij Feedback</text>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php
}
}
/* {/block 'content'} */
}
