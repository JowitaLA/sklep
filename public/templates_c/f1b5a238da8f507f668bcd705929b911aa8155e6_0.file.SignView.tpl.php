<?php
/* Smarty version 4.3.4, created on 2024-10-08 22:36:37
  from 'C:\xampp\htdocs\Sklep\app\views\SignView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_670597d5c6eaf2_81671585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1b5a238da8f507f668bcd705929b911aa8155e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\SignView.tpl',
      1 => 1728419796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670597d5c6eaf2_81671585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86529227670597d5c64a74_58384321', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_86529227670597d5c64a74_58384321 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_86529227670597d5c64a74_58384321',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Logowanie") {?>
		<div class="form-floating">
			<input type="text" class="form-control top-field" id="name" placeholder="name">
			<label for="name">Nazwa użytkownika</label>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control down-field" id="pass" placeholder="Password">
			<label for="pass">Hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="togglePassword"
				style="cursor: pointer;"></i>
		</div>

		<div class="text-center my-3">
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registerShow" class="form-check-label no-underline">Nie masz jeszcze konta? Zarejestruj
				się</a>
		</div>

		<div class="text-center my-3">
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPasswordShow" class="form-check-label no-underline">Nie pamiętasz hasła?</a>
		</div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Rejestracja") {?>
		<div class="form-floating">
			<input type="text" class="form-control top-field" id="registerName" placeholder="name">
			<label for="registerName">Nazwa użytkownika</label>
		</div>

		<div class="form-floating">
			<input type="email" class="form-control middle-field" id="email" placeholder="name@example.com">
			<label for="email">E-mail</label>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control middle-field" id="pass" placeholder="Password">
			<label for="pass">Hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="togglePassword"
				style="cursor: pointer;"></i>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control down-field" id="sec_pass" placeholder="Repeat Password">
			<label for="sec_pass">Powtórz hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
				id="togglePassword2" style="cursor: pointer;"></i>
		</div>


		<div class="form-check text-start my-3">
			<input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault">
				Akceptuję <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label color-orange">regulamin</a> naszej strony
				internetowej Yups.
			</label>
		</div>

		<div class="text-center my-3">
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label no-underline">Masz już konto? Zaloguj się</a>
		</div>

	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['title']->value == "Resetuj Hasło") {?>
		<div class="form-floating">
			<input type="email" class="form-control solo-field" id="email" placeholder="name@example.com">
			<label for="email">E-mail</label>
		</div>

		<div class="text-center my-3">
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="form-check-label no-underline">Nie pamiętasz e-maila? Napisz do
				nas!</a>
		</div>
	<?php }
}
}
/* {/block 'content'} */
}
