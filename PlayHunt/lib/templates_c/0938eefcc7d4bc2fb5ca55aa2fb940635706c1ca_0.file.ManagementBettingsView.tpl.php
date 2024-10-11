<?php
/* Smarty version 4.1.0, created on 2022-06-06 11:53:01
  from 'C:\xampp\htdocs\PlayHunt\app\views\ManagementBettingsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629dce7de8ae16_91258557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0938eefcc7d4bc2fb5ca55aa2fb940635706c1ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\ManagementBettingsView.tpl',
      1 => 1654509141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629dce7de8ae16_91258557 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1224682495629dce7de7dea2_82838011', 'top');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_1224682495629dce7de7dea2_82838011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1224682495629dce7de7dea2_82838011',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE WALKAMI</h1></legend></center>
	</div>

		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bettingNew">Stwórz walkę</a></center>
	</div>
</form>

<center><table id="tab_bettings" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Założyciel Walki</th>
				<th><center>Numer Pierwszej Drużyny</th>
				<th><center>Numer Drugiej Drużyny</th>
				<th><center>Koniec Walki</th>
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
			<tr><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["login"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["group_first_id"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["group_second_id"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["when_end"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["activate"];?>
</td><td><center><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bettingEdit&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bettingDelete&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
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
