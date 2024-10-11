<?php
/* Smarty version 4.3.4, created on 2024-10-11 01:57:46
  from 'C:\xampp\htdocs\Sklep\app\views\SignView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_670869faaca436_36686036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1b5a238da8f507f668bcd705929b911aa8155e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\SignView.tpl',
      1 => 1728604640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670869faaca436_36686036 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1390484327670869faabb020_08172710', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_1390484327670869faabb020_08172710 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1390484327670869faabb020_08172710',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Logowanie") {?>
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login">
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

			<div class="form-floating">
				<input type="text" class="form-control top-field" name="l_name" id="name" placeholder="name">
				<label for="name">Nazwa użytkownika</label>
			</div>

			<div class="form-floating position-relative">
				<input type="password" class="form-control middle-field" name="l_password" id="pass" placeholder="Password">
				<label for="pass">Hasło</label>
				<!-- Ikona do pokazania/ukrycia hasła -->
				<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
					id="togglePassword" style="cursor: pointer;"></i>
			</div>

			<div class="text-center my-3">
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registerShow" class="form-check-label no-underline">Nie masz jeszcze konta?
					Zarejestruj się</a>
			</div>

			<div class="text-center my-3">
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPasswordShow" class="form-check-label no-underline">Nie pamiętasz hasła?</a>
			</div>

			<!-- Przycisk submit, który wysyła formularz -->
			<button type="submit" class="btn btn-primary w-100 py-2"><?php echo $_smarty_tpl->tpl_vars['button_title']->value;?>
</button>
		</form>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Rejestracja") {?>
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register">
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
			<div class="form-floating">
				<input type="text" class="form-control top-field" name="r_name" id="registerName" placeholder="name">
				<label for="registerName">Nazwa użytkownika</label>
			</div>

			<div class="form-floating">
				<input type="email" class="form-control middle-field" name="r_email" id="email" placeholder="name@example.com">
				<label for="email">E-mail</label>
			</div>

			<div class="form-floating position-relative">
				<input type="password" class="form-control middle-field" name="r_first_password" id="pass"
					placeholder="Password">
				<label for="pass">Hasło</label>
				<!-- Ikona do pokazania/ukrycia hasła -->
				<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
					id="togglePassword" style="cursor: pointer;"></i>
			</div>

			<div class="form-floating position-relative">
				<input type="password" class="form-control down-field" name="r_second_password" id="sec_pass"
					placeholder="Repeat Password">
				<label for="sec_pass">Powtórz hasło</label>
				<!-- Ikona do pokazania/ukrycia hasła -->
				<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
					id="togglePassword2" style="cursor: pointer;"></i>
			</div>


			<div class="form-check text-start my-3">
				<input class="form-check-input" type="checkbox" name="terms_accepted" value="accept" id="flexCheckDefault"
					required>
				<label class="form-check-label" for="flexCheckDefault">
					Akceptuję <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label color-orange">regulamin</a> naszej
					strony internetowej Yups.
				</label>
			</div>

			<div class="text-center my-3">
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label no-underline">Masz już konto? Zaloguj się</a>
			</div>
			<button type="submit" class="btn btn-primary w-100 py-2"><?php echo $_smarty_tpl->tpl_vars['button_title']->value;?>
</button>
		</form>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Resetuj Hasło") {?>
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
			<div class="form-floating">
				<input type="email" class="form-control solo-field" id="email" placeholder="name@example.com">
				<label for="email">E-mail</label>
			</div>

			<div class="text-center my-3">
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label no-underline">Nie pamiętasz e-maila? Napisz do
					nas!</a>
			</div>
			<button type="submit" class="btn btn-primary w-100 py-2"><?php echo $_smarty_tpl->tpl_vars['button_title']->value;?>
</button>

		</form>
	<?php }
}
}
/* {/block 'content'} */
}
