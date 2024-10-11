<?php
/* Smarty version 4.1.0, created on 2022-06-01 21:12:35
  from 'C:\xampp\htdocs\PlayHunt\app\views\ManagementView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6297ba230865d7_24948373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce5c9154450bc962e6333c5764386eae6644a69b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PlayHunt\\app\\views\\ManagementView.tpl',
      1 => 1654110039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6297ba230865d7_24948373 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17323326776297ba23079da4_78069154', 'content');
?>








 <?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "options.tpl");
}
/* {block 'content'} */
class Block_17323326776297ba23079da4_78069154 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17323326776297ba23079da4_78069154',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['management']->value == "users") {?>
<center><h1>ZARZĄDZANIE UŻYTKOWNIKAMI</h2>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['management']->value == "groups") {?>
<center><h1>ZARZĄDZANIE DRUŻYNAMI</h2>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['management']->value == "bettings") {?>
<center><h1>ZARZĄDZANIE WALKAMI</h2>
<?php }?>



<div class="pure-menu pure-menu-horizontal bottom-margin">

</div>

<center>
<table id="tab_records" class="pure-table pure-table-horizontal">
<thead>

</thead>

<tbody>
		<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
creditList">
		<legend>Opcje wyszukiwania</legend>
		<fieldset>
		<input type="text" placeholder="wartość kredytu" name="sf_credit" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->credit;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
		</fieldset>
		</form>

</tbody>





<?php
}
}
/* {/block 'content'} */
}
