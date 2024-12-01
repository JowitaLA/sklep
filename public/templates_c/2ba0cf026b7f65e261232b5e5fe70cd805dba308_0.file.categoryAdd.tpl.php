<?php
/* Smarty version 4.3.4, created on 2024-11-26 14:21:56
  from 'C:\xampp\htdocs\Sklep\app\views\management\categoryAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6745cb746af119_95178620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ba0cf026b7f65e261232b5e5fe70cd805dba308' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\management\\categoryAdd.tpl',
      1 => 1732627312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6745cb746af119_95178620 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14144497436745cb746a8de3_46646856', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_14144497436745cb746a8de3_46646856 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14144497436745cb746a8de3_46646856',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
createCategory">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo po lewej stronie -->
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex align-items-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="Logo" width="50" height="50">
            </a>

            <!-- Ikona info-circle po prawej stronie z szarym kolorem -->
            <a class="nav-link d-flex align-items-center" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/managementMain">
                <i class="bi bi-info-circle" style="font-size: 50px; color: #6c757d;" title="Wróć do zarządzania"></i>
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-3 fw-normal">
                Dodaj kategorię
            </h1>

            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control top-field" name="name" id="name" value="">
            <label for="name">Nazwa kategorii</label>
        </div>

        <div class="form-floating">
            <textarea class="form-control middle-field" name="description" id="description" rows="5"></textarea>
            <label for="description">Opis kategorii</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control down-field" name="icon" id="icon" value="" oninput="updateIcon()">
            <label for="icon">Ikona kategorii</label>
        </div>

        <!-- Miejsce na podgląd ikony -->
        <div class="form-floating mb-3">
            <label for="icon-preview">Podgląd ikony:</label>
            <div id="icon-preview" class="d-flex justify-content-center align-items-center" style="font-size: 50px; min-height: 50px;">
                <i id="icon-display"></i>
            </div>
        </div>

        <p> Ikony kategorii można wybrać z <a href="https://www.w3schools.com/icons/fontawesome_icons_video.asp" target="_blank">tej strony</a>.</p>
        <button type="submit" class="btn btn-primary w-100 py-2 mt-1">Dodaj kategorię</button>
    </form>

    <style>
        /* Zwiększenie wysokości pola tekstowego */
        #description {
            min-height: 150px;
            max-height: 300px;
            overflow-y: auto;
        }

        /* Opcjonalnie możesz dostosować wygląd suwaka */
        #description::-webkit-scrollbar {
            width: 8px;
        }

        #description::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        #description::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        #icon-preview {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
    </style>

    <?php echo '<script'; ?>
>
        function updateIcon() {
            var iconName = document.getElementById("icon").value.trim();
            var iconElement = document.getElementById("icon-display");

            // Jeśli ikona jest dostępna w FontAwesome, wyświetl ją
            if (iconName) {
                iconElement.className = iconName;
            } else {
                iconElement.className = '';
            }
        }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}