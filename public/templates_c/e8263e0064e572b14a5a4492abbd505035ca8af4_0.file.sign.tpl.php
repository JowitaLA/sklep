<?php
/* Smarty version 4.3.4, created on 2024-10-08 22:29:02
  from 'C:\xampp\htdocs\Sklep\app\views\templates\sign.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6705960e42c6c3_20521601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8263e0064e572b14a5a4492abbd505035ca8af4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\sign.tpl',
      1 => 1728419339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6705960e42c6c3_20521601 (Smarty_Internal_Template $_smarty_tpl) {
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
/assets/dist/css/sign.css" rel="stylesheet">
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="sign.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
	<main class="form-sign w-100 m-auto">
		<form>
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex mb-4">
				<!-- Dodany link do strony głównej -->
				<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="50" height="50">
			</a>


			<div class="d-flex justify-content-between align-items-center">
				<h1 class="h3 mb-3 fw-normal">
					<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

				</h1>

				<button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
					data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
					<i id="theme-icon" class="bi bi-moon"></i>
				</button>
			</div>


			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11137702746705960e42aba0_88591083', 'content');
?>


			<button class="btn btn-primary w-100 py-2" type="submit"><?php echo $_smarty_tpl->tpl_vars['button_title']->value;?>
</button>
		</form>
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
class Block_11137702746705960e42aba0_88591083 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11137702746705960e42aba0_88591083',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
}
