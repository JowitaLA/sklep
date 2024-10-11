<?php
/* Smarty version 4.1.0, created on 2022-06-06 18:56:24
  from 'C:\xampp\htdocs\PlayHunt\app\views\GroupEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e31b8a9a7d7_70968729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98ac0e548a8bf506f5769d302d0534db3c67a6c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\GroupEdit.tpl',
      1 => 1654534578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e31b8a9a7d7_70968729 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1338279445629e31b8a94910_20397725', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_1338279445629e31b8a94910_20397725 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1338279445629e31b8a94910_20397725',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
groupSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE DRUŻYN</legend></h2>
		
				<div class="pure-control-group">
					<label for="name">Nazwa drużyny:</label>
					<input id="name" type="text" placeholder="wpisz nazwę drużyny" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
groupsOption">Powrót</a>
				</div>
			</fieldset>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
	</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
