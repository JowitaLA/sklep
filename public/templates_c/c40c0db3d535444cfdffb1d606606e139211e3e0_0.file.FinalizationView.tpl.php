<?php
/* Smarty version 4.3.4, created on 2024-11-27 22:57:05
  from 'C:\xampp\htdocs\Sklep\app\views\FinalizationView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_674795b1cb2fd4_48449624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c40c0db3d535444cfdffb1d606606e139211e3e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\FinalizationView.tpl',
      1 => 1732704752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674795b1cb2fd4_48449624 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1914516956674795b1cacc61_82068119', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59102294674795b1cae1d4_06288862', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/secondary.tpl");
}
/* {block 'head'} */
class Block_1914516956674795b1cacc61_82068119 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_1914516956674795b1cacc61_82068119',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .step-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 25%;
            right: 0;
            width: 85%;
            height: 2px;
            background-color: #ccc;
            z-index: -1;
            transform: translateX(50%);
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(51, 51, 51);
            border-color: rgba(233, 125, 1, 0.5);
            border: 10px;
            color: white;
            line-height: 40px;
            font-weight: bold;
            margin: 0 auto 10px auto;
            z-index: 1;
            /* Numerki muszą być na wierzchu */
        }

        .step-title {
            font-size: 14px;
            color: white;
        }

        .step.active .step-number {
            background-color: rgba(233, 125, 1);
            border-color: rgba(255, 136, 0, 0.5);
            border: 10px;
        }

        .step.back .step-number {
            background-color: rgba(255, 136, 0, 0.5);
            border-color: rgba(233, 125, 1, 0.5);
        }

        .step.active .step-title {
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="step-container">
            <!-- Step 1 -->
            <a class="step active">
                <div class="step-number">1</div>
                <div class="step-title">Koszyk</div>
            </a>

            <!-- Step 2 -->
            <a class="step active">
                <div class="step-number">2</div>
                <div class="step-title">Dostawa</div>
            </a>
            <!-- Step 3 -->
            <a class="step active">
                <div class="step-number">3</div>
                <div class="step-title">Płatność</div>
            </a>
            <!-- Step 4 -->
            <a class="step active">
                <div class="step-number">4</div>
                <div class="step-title">Gotowe</div>
            </a>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'content'} */
class Block_59102294674795b1cae1d4_06288862 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_59102294674795b1cae1d4_06288862',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .btn-sm-custom {
            width: 2rem;
            height: 2rem;
            font-size: 1rem;
            padding: 0;
        }
    </style>

    <section class="pt-5 container mt-4">
        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 40vh;">
            <h3 class="mb-4 text-center">Dziękujemy za zakupy w naszym sklepie</h3>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
main" method="post">
                <button type="submit" class="btn btn-secondary"
                    style="border-color: rgba(255, 136, 0, 0.5); background-color: rgba(233, 125, 1); color: #fff;">
                    Wróć do sklepu
                </button>
            </form>
        </div>
    </section>

    </div>
<?php
}
}
/* {/block 'content'} */
}
