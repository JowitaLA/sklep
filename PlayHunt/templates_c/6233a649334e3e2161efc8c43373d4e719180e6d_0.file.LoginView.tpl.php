<?php
/* Smarty version 4.1.0, created on 2022-05-30 14:30:19
  from 'C:\xampp\htdocs\PlayHunt\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6294b8db206f48_25258570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6233a649334e3e2161efc8c43373d4e719180e6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\LoginView.tpl',
      1 => 1653913815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6294b8db206f48_25258570 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3050234886294b8db202031_98322883', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "login.tpl");
}
/* {block 'top'} */
class Block_3050234886294b8db202031_98322883 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_3050234886294b8db202031_98322883',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
	<center>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">hasło: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
		</center>
	</fieldset>
</form>	


<?php
}
}
/* {/block 'top'} */
}
