<?php
/* Smarty version 4.1.0, created on 2022-06-06 20:35:13
  from 'C:\xampp\htdocs\PlayHunt\app\views\ManagementUsersView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e48e1c4cc76_52658682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c437031cc184bb27a7c469b26d223c3615011794' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\ManagementUsersView.tpl',
      1 => 1654540495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e48e1c4cc76_52658682 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1989382227629e48e1c3c502_88085969', 'top');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'top'} */
class Block_1989382227629e48e1c3c502_88085969 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1989382227629e48e1c3c502_88085969',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE UŻYTKOWNIKAMI</h1></legend></center>
			<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersOption" method="post" class="pure-form pure-form-aligned">
			<legend><h3>Wyszukaj użytkownika po loginie</h3></legend>
		<fieldset>
			<input type="text" placeholder="login użytkownika" name="sf_login" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->login;?>
" />
			<button type="submit" class="pure-button pure-button-primary" style="background-color: #171644">Filtruj</button>
		</fieldset>					
			</form>
	</div>

		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew"> Dodaj użytkownika</a></center>
	</div>
</form>

<center><table id="tab_users" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Login</th>
				<th><center>Hasło</th>
				<th><center>E-mail</th>
				<th><center>Wygrane</th>
				<th><center>Przegrane</th>
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
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["password"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["email"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["wins"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["loses"];?>
</td><td><center><?php echo $_smarty_tpl->tpl_vars['r']->value["activate"];?>
</td><td><center><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit&idUser=<?php echo $_smarty_tpl->tpl_vars['r']->value['idUser'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete&idUser=<?php echo $_smarty_tpl->tpl_vars['r']->value['idUser'];?>
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
