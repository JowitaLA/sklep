<?php
/* Smarty version 4.1.0, created on 2022-06-03 13:53:55
  from 'C:\xampp\htdocs\PlayHunt\app\views\ManagementRolesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6299f653bf1512_46732226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e004802a553cbcd0193e3208207279712d25293e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\ManagementRolesView.tpl',
      1 => 1654257222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6299f653bf1512_46732226 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16726911496299f653be20b6_82141188', 'top');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_16726911496299f653be20b6_82141188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_16726911496299f653be20b6_82141188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE UŻYTKOWNIKAMI</h1></legend></center>
			<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
options">
			
				<legend><h3>Wyszukaj użytkownika po loginie</h3></legend>
					<fieldset>
						<input type="text" placeholder="login użytkownika" name="sf_users" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->users;?>
" /><br />
						<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
					</fieldset>
					
			</form>
	</div>
		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roleNew"> Dodaj role</a></center>
	</div>
</form>

<center><table id="tab_users" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Nazwa</th>
				<th><center>Od kiedy aktywna</th>
				<th><center>Do kiedy aktywna</th>
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
			<tr><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["roleDate"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["finishDate"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["activate"];?>
</td><td><center><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
roleEdit&idUser=<?php echo $_smarty_tpl->tpl_vars['r']->value['idRole'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
roleDelete&idUser=<?php echo $_smarty_tpl->tpl_vars['r']->value['idRole'];?>
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
