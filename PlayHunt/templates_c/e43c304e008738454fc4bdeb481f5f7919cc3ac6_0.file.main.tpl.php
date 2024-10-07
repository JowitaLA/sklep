<?php
/* Smarty version 4.1.0, created on 2022-06-06 13:38:14
  from 'C:\xampp\htdocs\PlayHunt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629de7269d5af7_91117571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e43c304e008738454fc4bdeb481f5f7919cc3ac6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\templates\\main.tpl',
      1 => 1654515436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629de7269d5af7_91117571 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">

    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
<?php if ($_smarty_tpl->tpl_vars['hide_intro']->value) {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style_hide_intro.css">
<?php }?>
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/softscroll.js"><?php echo '</script'; ?>
>
</head>
<body>

    <div id="menu" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
			<a class="pure-menu-heading" href=""><b>Strona główna</a><ul>
			
			<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
				<li class="pure-menu-selected"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj</a></li>
			<?php } else { ?>	
				<li class="pure-menu-selected"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Logowanie</a></li>
			<?php }?>
			<li class="pure-menu-selected"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
options">Opcje</a></li>
			<li class="pure-menu-selected"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Kontakt</a></li>
			<li class="pure-menu-selected"><a href="https://www.huntshowdown.com/">Główna strona gry</a></li>	
        </ul>
    </div>



<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head"><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
        <p class="splash-subhead">
             <?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>

        </p>
			<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) == 0) {?>
				<p>
					<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" class="logowanie">Dołącz do nas już teraz!</a>
				</p>
			<?php }?>
    </div>
	
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_649432146629de7269d44a9_66851904', 'content');
?>


    </div>

    <div class="footer l-box is-center">
		<p>
<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_footer']->value ?? null)===null||$tmp==='' ? "Domyślna treść stopki" ?? null : $tmp);?>

		</p>

    </div>

</div>


</body>
</html><?php }
/* {block 'content'} */
class Block_649432146629de7269d44a9_66851904 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_649432146629de7269d44a9_66851904',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
