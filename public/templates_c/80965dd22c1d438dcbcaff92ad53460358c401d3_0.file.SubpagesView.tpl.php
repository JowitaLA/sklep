<?php
/* Smarty version 4.3.4, created on 2024-11-25 15:24:28
  from 'C:\xampp\htdocs\sklep\app\views\SubpagesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6744889c297891_77215609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80965dd22c1d438dcbcaff92ad53460358c401d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep\\app\\views\\SubpagesView.tpl',
      1 => 1732361444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6744889c297891_77215609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14155765186744889c2929c0_74267095', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_14155765186744889c2929c0_74267095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14155765186744889c2929c0_74267095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="pt-5 container mt-4">
        <?php echo $_smarty_tpl->tpl_vars['subpage']->value['description'];?>

    </section>
<?php
}
}
/* {/block 'content'} */
}
