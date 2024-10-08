<?php
/* Smarty version 4.3.4, created on 2024-10-08 18:05:41
  from 'C:\xampp\htdocs\Sklep\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6705585564aad2_67477641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1db2df023ad2cd0013955d730d6373bd08cdc7ab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\LoginView.tpl',
      1 => 1728403457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6705585564aad2_67477641 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_95821618067055855649fe4_57402692', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_95821618067055855649fe4_57402692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_95821618067055855649fe4_57402692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<?php
}
}
/* {/block 'content'} */
}
