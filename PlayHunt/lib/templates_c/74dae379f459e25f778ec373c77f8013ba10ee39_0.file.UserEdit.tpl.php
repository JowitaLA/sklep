<?php
/* Smarty version 4.1.0, created on 2022-06-03 13:38:08
  from 'C:\xampp\htdocs\PlayHunt\app\views\UserEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6299f2a0a250a1_34867109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74dae379f459e25f778ec373c77f8013ba10ee39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\UserEdit.tpl',
      1 => 1654194670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6299f2a0a250a1_34867109 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3128616826299f2a09c2371_53524745', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_3128616826299f2a09c2371_53524745 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_3128616826299f2a09c2371_53524745',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE UŻYTKOWNIKA</legend></h2>
		
				<div class="pure-control-group">
					<label for="login">Login:</label>
					<input id="login" type="text" placeholder="wpisz nazwę użytkownika" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
				</div>
		
				<div class="pure-control-group">
					<label for="password">Hasło:</label>
					<input id="password" type="text" placeholder="wpisz hasło użytkownika" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
				</div>
				
				<div class="pure-control-group">
					<label for="email">E-mail:</label>
					<input id="email" type="text" placeholder="wpisz e-mail użytkownika" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersOption">Powrót</a>
				</div>
			</fieldset>
		<input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idUser;?>
">
	</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
