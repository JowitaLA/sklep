<?php
/* Smarty version 4.3.4, created on 2024-10-30 17:54:17
  from 'C:\xampp\htdocs\Sklep\app\views\templates\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_672264b9cfcd78_64808187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70fe4460a4ec601021c42484bc6240eadcf11886' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\edit.tpl',
      1 => 1730307256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672264b9cfcd78_64808187 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">

<head>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/color-modes.js"><?php echo '</script'; ?>
>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Domyślny opis" ?? null : $tmp);?>
">
	<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" type="image/png">

	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/edit.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<!-- Custom styles for this template -->
	<link href="edit.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
	<main class="form-sign w-100 m-auto">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1792668550672264b9cef657_24816594', 'content');
?>


			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-info<?php }?>
								  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
								  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert" style="margin-top: 5px; margin-bottom: 0px;">
					<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

				</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</main>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		document.addEventListener("DOMContentLoaded", function() {
			// Funkcja do przełączania widoczności hasła dla logowania
			const togglePassword = document.querySelector('#togglePassword');
			if (togglePassword) {
				togglePassword.addEventListener('click', function() {
					const passwordInput = document.querySelector('#pass');
					const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
					passwordInput.setAttribute('type', type);

					// Zmiana ikony (eye / eye-slash)
					this.classList.toggle('bi-eye');
					this.classList.toggle('bi-eye-slash');
				});
			}

			// Funkcja dla drugiego pola hasła (Rejestracja)
			const togglePassword2 = document.querySelector('#togglePassword2');
			if (togglePassword2) {
				togglePassword2.addEventListener('click', function() {
					const passwordInput = document.querySelector('#sec_pass');
					const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
					passwordInput.setAttribute('type', type);

					// Zmiana ikony (eye / eye-slash)
					this.classList.toggle('bi-eye');
					this.classList.toggle('bi-eye-slash');
				});
			}
		});
	<?php echo '</script'; ?>
>
</body>

</html><?php }
/* {block 'content'} */
class Block_1792668550672264b9cef657_24816594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1792668550672264b9cef657_24816594',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
