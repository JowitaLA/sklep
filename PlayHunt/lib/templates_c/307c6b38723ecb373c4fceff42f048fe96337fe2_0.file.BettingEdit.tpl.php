<?php
/* Smarty version 4.1.0, created on 2022-06-06 18:02:25
  from 'C:\xampp\htdocs\PlayHunt\app\views\BettingEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e2511bd7aa7_67787470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307c6b38723ecb373c4fceff42f048fe96337fe2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\BettingEdit.tpl',
      1 => 1654531341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e2511bd7aa7_67787470 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_337811127629e2511b6e3e5_89986414', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_337811127629e2511b6e3e5_89986414 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_337811127629e2511b6e3e5_89986414',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bettingSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE ZAKŁADÓW</legend></h2>
		
				<div class="pure-control-group">
					<label for="creator">Założyciel:</label>
					<input id="creator" type="text" placeholder="wpisz numer użytkownika tworzącego zakładu" name="creator" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->creator;?>
">
				</div>
		
				<div class="pure-control-group">
					<label for="firstID">Numer pierwszej drużyny:</label>
					<input id="firstID" type="text" placeholder="wpisz numer pierwszej drużyny" name="firstID" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->firstID;?>
">
				</div>
				
				<div class="pure-control-group">
					<label for="secondID">Numer drugiej drużyny:</label>
					<input id="secondID" type="text" placeholder="wpisz numer drugiej drużyny" name="secondID" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->secondID;?>
">
				</div>
				
				<div class="pure-control-group">
					<label for="whenEnd">Data zakończenia:</label>
					<input id="whenEnd" type="text" placeholder="wpisz datę zakończenia zakładu" name="whenEnd" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->whenEnd;?>
">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bettingsOption">Powrót</a>
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
