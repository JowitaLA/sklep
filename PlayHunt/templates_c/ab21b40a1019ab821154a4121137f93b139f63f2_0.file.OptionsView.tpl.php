<?php
/* Smarty version 4.1.0, created on 2022-06-02 23:09:40
  from 'C:\xampp\htdocs\PlayHunt\app\views\OptionsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62992714517b73_31320816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab21b40a1019ab821154a4121137f93b139f63f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\OptionsView.tpl',
      1 => 1654204081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62992714517b73_31320816 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1988866329629927145126c2_67934888', 'top');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_1988866329629927145126c2_67934888 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1988866329629927145126c2_67934888',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<center><h1></h2>

<div class="pure-menu pure-menu-horizontal bottom-margin">

</div>

<center>
<table id="tab_zaklady" class="pure-table pure-table-horizontal">
<thead>

</thead>
</center>
<tbody>
<table>
		Witaj w panelu zarządzania stroną PlayHunt

		<h1>ZARZĄDZANIE</h2>
		<td>
			<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
usersOption">Zarządzaj Użytkownikami</a>
		</td>
		
		<td>
			<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bettingsOption">Zarządzaj Zakładami</a>
		</td>
		
		<td>
			<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
groupsOption">Zarządzaj Grupami</a>
		</td>
		
		
</tbody>
</table>

<?php
}
}
/* {/block 'top'} */
}
