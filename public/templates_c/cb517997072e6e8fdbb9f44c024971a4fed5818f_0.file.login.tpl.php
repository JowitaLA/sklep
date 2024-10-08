<?php
/* Smarty version 4.3.4, created on 2024-10-08 17:29:25
  from 'C:\xampp\htdocs\Sklep\app\views\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67054fd52c8ef6_32931864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb517997072e6e8fdbb9f44c024971a4fed5818f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\templates\\login.tpl',
      1 => 1728401364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67054fd52c8ef6_32931864 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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

	<title>Yups</title>

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
	<link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
	<main class="form-signin w-100 m-auto">
		<form>
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex mb-4">
				<!-- Dodany link do strony głównej -->
				<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="50" height="50">
			</a>
			<h1 class="h3 mb-3 fw-normal">Zaloguj się</h1>

			<div class="form-floating">
				<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
				<label for="floatingInput">Nazwa użytkownika</label>
			</div>

			<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
				<label for="floatingPassword">Hasło</label>
			</div>

			<div class="form-check text-center my-3">
				<!-- Wyśrodkowanie napisu -->
				<a href="link_do_resetowania_hasla" class="form-check-label no-underline">Nie pamiętasz hasła?</a>
				<!-- Usunięcie podkreślenia -->
			</div>

			<button class="btn btn-primary w-100 py-2" type="submit">Zaloguj się</button>
		</form>
	</main>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
