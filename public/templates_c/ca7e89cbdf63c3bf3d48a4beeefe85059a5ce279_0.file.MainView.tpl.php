<?php
/* Smarty version 4.3.4, created on 2024-11-29 02:16:31
  from 'C:\xampp\htdocs\Sklep\app\views\MainView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674915ef2e3f30_99726098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca7e89cbdf63c3bf3d48a4beeefe85059a5ce279' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\MainView.tpl',
      1 => 1732842990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674915ef2e3f30_99726098 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143683262674915ef2bc318_57943562', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block 'content'} */
class Block_143683262674915ef2bc318_57943562 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_143683262674915ef2bc318_57943562',
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
      <div class="carousel-inner" style="background: linear-gradient(to right, #bb3e23 48%, #d96912 50%, #df8d00 52%);">
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
         <div class="carousel-item"">
            <img src=" <?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
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
               <p>„YUPS!” to sklep
                  internetowy, w którym zakupisz ogromną liczbę produktów
                  użytecznych w różnych dziedzinach życia. Cechą charakterystyczną
                  naszego asortymentu jest bowiem jego wielobranżowość. Dodatkowo
                  bez względu na to, z której kategorii produkty wybierzesz, masz
                  gwarancję, że stawiamy na niezawodność za rozsądne pieniądze.</p>
               <p><a class="btn btn-lg btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
about">Czytaj więcej...</a></p>
            </div>
         </div>
      </div>
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
<!-- Nasze Kategorie -->
<hr class="featurette-divider" style="height: 1px; margin: 0px 0; margin-bottom: 20px;">

<div id="categories" class="categories">
   <h2 style="margin-top:5rem">Nasze kategorie</h2>
   <div class="circle-container ">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
      <a href="/kategoria" class="circle-item ">
         <div class="circle bg-body-tertiary">
            <i class="link-body-emphasis <?php echo $_smarty_tpl->tpl_vars['i']->value["icon"];?>
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
<div class="recent-products py-4">
   <div class="container marketing">
      <h2 class="text-center mb-4">Ostatnio Dodane Produkty</h2>
      <div class="row">
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['last_products']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/productDetails?product=<?php echo $_smarty_tpl->tpl_vars['p']->value['url'];?>
" class="col-md-3 mb-4">
            <div class="product-card bg-body-tertiary">
               <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['p']->value["url"];?>
/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
" onerror="
               let formats = ['png', 'gif'];
               let img = this;
               let index = 0;

               function tryNextFormat() {
                   if (index < formats.length) {
                       img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/<?php echo $_smarty_tpl->tpl_vars['p']->value["url"];?>
/1.' + formats[index++];
                       } else {
                           img.src = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/products/default.png';
                           }
                       }

               tryNextFormat();
               this.onerror = tryNextFormat;
               " class="img-fluid">
               <h3 class="mt-3"><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</h3>
               <div class="stars">
                  <?php $_smarty_tpl->_assignInScope('rating', (($tmp = $_smarty_tpl->tpl_vars['p']->value['rating'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));?>
                  <!-- Ustawienie wartości domyślnej dla ratingu -->
                  <?php $_smarty_tpl->_assignInScope('fullStars', floor($_smarty_tpl->tpl_vars['rating']->value));?>
                  <!-- Liczba pełnych gwiazdek -->
                  <?php $_smarty_tpl->_assignInScope('halfStar', floor($_smarty_tpl->tpl_vars['rating']->value*2)%2);?>
                  <!-- Sprawdzamy, czy jest połowa gwiazdki -->
                  <?php $_smarty_tpl->_assignInScope('emptyStars', 5-$_smarty_tpl->tpl_vars['fullStars']->value-$_smarty_tpl->tpl_vars['halfStar']->value);?>
                  <!-- Liczba pustych gwiazdek -->

                  <!-- Renderowanie pełnych gwiazdek -->
                  <?php
$__section_fullStars_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['fullStars']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_fullStars_0_total = $__section_fullStars_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_fullStars'] = new Smarty_Variable(array());
if ($__section_fullStars_0_total !== 0) {
for ($__section_fullStars_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_fullStars']->value['index'] = 0; $__section_fullStars_0_iteration <= $__section_fullStars_0_total; $__section_fullStars_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_fullStars']->value['index']++){
?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <?php
}
}
?>

                  <!-- Renderowanie pół gwiazdki -->
                  <?php if ($_smarty_tpl->tpl_vars['halfStar']->value == 1) {?>
                  <i class="fa fa-star-half" aria-hidden="true"></i>
                  <?php }?>

                  <!-- Renderowanie pustych gwiazdek -->
                  <?php
$__section_emptyStars_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['emptyStars']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_emptyStars_1_total = $__section_emptyStars_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_emptyStars'] = new Smarty_Variable(array());
if ($__section_emptyStars_1_total !== 0) {
for ($__section_emptyStars_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_emptyStars']->value['index'] = 0; $__section_emptyStars_1_iteration <= $__section_emptyStars_1_total; $__section_emptyStars_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_emptyStars']->value['index']++){
?>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <?php
}
}
?>
               </div>
               <p class="price mt-2 link-body-emphasis">
                  <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['p']->value["price"],2,","," ");?>
&nbsp;zł
               </p>
                           </div>
         </a>
         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
         <p style="text-align: right;">
            <a class="btn btn-lg btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
searchProducts">Więcej...</a>
         </p>
      </div>
   </div>
</div>

<hr class="featurette-divider">

<div class="recent-products py-2 ">
   <div class="container marketing">
      <div class="row">
         <!-- Sekcja Feedback -->
         <div class="col-md-6 d-flex align-items-stretch">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative w-100">
               <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="mb-0">Wyślij Feedback</h3>
                  <div class="mb-1 text-body-secondary">Pomóż w ulepszeniu Yups</div>
                  <p class="mb-auto">Twoja opinia jest dla nas niezwykle ważna. To właśnie dzięki niej możemy stale
                     udoskonalać nasz sklep, eliminując potencjalne problemy i tworząc coraz to lepszy sklep dla
                     wszystkich klientów.</p>
                  <a href="feedback" class="icon-link gap-1 icon-link-hover stretched-link">
                     <svg class="bi">
                        <use xlink:href="#chevron-right" />
                     </svg>
                  </a>
               </div>
               <div class="col-auto d-none d-lg-block">
                  <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                     role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                     focusable="false">
                     <title></title>
                     <rect width="100%" height="100%" fill="#55595c" />
                     <text x="50%" y="50%" fill="#eceeef" dy=".3em">Zostaw Feedback</text>
                  </svg>
               </div>
            </div>
         </div>

         <!-- Sekcja Newsletter -->
         <div class="col-md-6 d-flex align-items-stretch">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative w-100">
               <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="mb-0">Zapisz się do Newslettera</h3>
                  <div class="mb-1 text-body-secondary">Bądź na bieżąco</div>
                  <p class="mb-auto">Dołącz do naszego newslettera, aby otrzymywać najnowsze informacje o promocjach,
                     nowościach i wyjątkowych ofertach prosto na swoją skrzynkę e-mail.</p>
                  <a href="newsletter" class="icon-link gap-1 icon-link-hover stretched-link">
                     <svg class="bi">
                        <use xlink:href="#chevron-right" />
                     </svg>
                  </a>
               </div>
               <div class="col-auto d-none d-lg-block">
                  <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                     role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                     focusable="false">
                     <title></title>
                     <rect width="100%" height="100%" fill="#55595c" />
                     <text x="50%" y="50%" fill="#eceeef" dy=".3em">Zapisz się</text>
                     </svg>
                  </div>
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
