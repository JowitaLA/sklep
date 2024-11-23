<?php
/* Smarty version 4.3.4, created on 2024-11-21 00:50:35
  from 'C:\xampp\htdocs\Sklep\app\views\SubpagesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673e75cbacacf9_36426446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff5ee3ca8085fe5a8afbbacad774f6db7e7241b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\SubpagesView.tpl',
      1 => 1732146635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673e75cbacacf9_36426446 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1588264908673e75cbac66d5_54203826', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'content'} */
class Block_1588264908673e75cbac66d5_54203826 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1588264908673e75cbac66d5_54203826',
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
