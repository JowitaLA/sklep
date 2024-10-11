<?php
/* Smarty version 4.1.0, created on 2022-06-06 19:04:35
  from 'C:\xampp\htdocs\PlayHunt\app\views\ManagementGroupsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e33a3a6c8d1_36181918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08c79152f7ad1e56fdb97110ee622525b5d779e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\ManagementGroupsView.tpl',
      1 => 1654535061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e33a3a6c8d1_36181918 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_807285824629e33a3a5e0e2_24357100', 'top');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_807285824629e33a3a5e0e2_24357100 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_807285824629e33a3a5e0e2_24357100',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE UŻYTKOWNIKAMI</h1></legend></center>

	</div>
		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
groupNew"> Dodaj drużynę</a></center>
	</div>
</form>

<center><table id="tab_groups" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Numer drużyny</th>
				<th><center>Nazwa drużyny</th>
				<th><center>Status</th>
				<th><center>Opcje</th>
			</tr>
	
		</thead>


	<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
			<tr><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["id"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["activate"];?>
</td><td><center><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
groupEdit&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
groupDelete&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">Usuń</a></td></tr>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>

</table>





<?php
}
}
/* {/block 'top'} */
}
