<?php
/* Smarty version 4.3.4, created on 2024-11-21 12:40:33
  from 'C:\xampp\htdocs\Sklep\app\views\VerifyView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_673f1c3147d308_73769870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ac157d03050f435a4087d6b99e29e729bd7090' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sklep\\app\\views\\VerifyView.tpl',
      1 => 1732189231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673f1c3147d308_73769870 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1464087798673f1c314702f9_90472408', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/sign.tpl");
}
/* {block 'content'} */
class Block_1464087798673f1c314702f9_90472408 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1464087798673f1c314702f9_90472408',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['action_title']->value == "Weryfikacja konta") {?>
        <form>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex mb-4">
                <!-- Dodany link do strony głównej -->
                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="50" height="50">
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 fw-normal">
                    <?php echo $_smarty_tpl->tpl_vars['action_title']->value;?>

                </h1>

                <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                    <i id="theme-icon" class="bi bi-moon"></i>
                </button>
            </div>
            <div style="text-align: center;">
                <?php echo $_smarty_tpl->tpl_vars['verify_message']->value;?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['verify_message']->value == "Aktywacja użytkownika przebiegła pomyślnie. Zaloguj się na swoje konto.") {?>
                <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/loginShow'"
                    class="btn btn-primary w-100 py-2">Przejdź do Logowania</button>
            <?php } else { ?>
                <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main'"
                    class="btn btn-primary w-100 py-2 mt-2">Wróć do Strony Głównej</button>
            <?php }?>
        </form>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['action_title']->value == "Resetowanie hasła") {?>

        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
newPassword" id="passwordForm" >
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/main" class="d-flex mb-4">
                <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/img/logo.png" alt="" width="50" height="50">
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 fw-normal">
                    <?php echo $_smarty_tpl->tpl_vars['action_title']->value;?>

                </h1>

                <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                    <i id="theme-icon" class="bi bi-moon"></i>
                </button>
            </div>
            <div class="form-floating position-relative">
                <input type="password" class="form-control top-field" name="password" id="pass" placeholder="Password" required>
                <label for="pass">Hasło</label>
                <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer toggle-password"
                    data-target="pass" style="cursor: pointer;"></i>
            </div>
            <div class="form-floating position-relative">
                <input type="password" class="form-control down-field" name="second_password" id="sec_pass"
                    placeholder="Repeat Password" required>
                <label for="sec_pass">Powtórz hasło</label>
                <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer toggle-password"
                    data-target="sec_pass" style="cursor: pointer;"></i>
                <div id="passwordError" class="invalid-feedback">
                </div>
                <div id="passwordSecError" class="invalid-feedback">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2" id="submitButton" disabled>
            <input type="hidden" name="idUser" value="<?php echo $_smarty_tpl->tpl_vars['idUser']->value;?>
">
            Zresetuj Hasło</button>
        </form>



        <?php echo '<script'; ?>
>
            document.addEventListener("DOMContentLoaded", () => {
                const passwordField = document.getElementById("pass");
                const secondPasswordField = document.getElementById("sec_pass");
                const passwordError = document.getElementById("passwordError");
                const submitButton = document.getElementById("submitButton");
                const togglePasswordIcons = document.querySelectorAll(".toggle-password");

                // Funkcja sprawdzająca zgodność haseł
                function validatePasswords() {
                    const password = passwordField.value;
                    const secondPassword = secondPasswordField.value;

                    if (password !== secondPassword || password === "") {
                        secondPasswordField.classList.add("is-invalid");
                        passwordError.textContent =
                            "Hasła nie są takie same.";
                        return false;
                    } else {
                        if (validatePasswordRequirements()) {
                            secondPasswordField.classList.remove("is-invalid");
                            secondPasswordField.classList.add("is-valid");
                            return true;
                        } else {
                            passwordError.textContent =
                                "Hasło musi mieć co najmniej 8 znaków, zawierać wielką literę, cyfrę oraz znak specjalny.";
                            return false;
                        }
                    }
                }

                // Funkcja sprawdzająca wymagania dotyczące hasła
                function validatePasswordRequirements() {
                    const password = passwordField.value;
                    
                        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;'<>.,?/~`-]).{8,}$/;
                    
                    if (!regex.test(password)) {
                        passwordField.classList.add("is-invalid");
                        passwordError.textContent =
                            "Hasło musi mieć co najmniej 8 znaków, zawierać wielką literę, cyfrę oraz znak specjalny.";
                        return false;
                    } else {
                        passwordField.classList.remove("is-invalid");
                        passwordField.classList.add("is-valid");
                        return true;
                    }
                }

                // Główna funkcja walidacji
                function validateForm() {
                    const passwordValid = validatePasswordRequirements();
                    const passwordsMatch = validatePasswords();

                    // Aktywacja przycisku tylko jeśli wszystkie warunki są spełnione
                    submitButton.disabled = !(passwordsMatch && passwordValid);
                }

                // Walidacja podczas wpisywania
                passwordField.addEventListener("input", validateForm);
                secondPasswordField.addEventListener("input", validateForm);

                // Funkcja do pokazywania/ukrywania haseł
                togglePasswordIcons.forEach((icon) => {
                    icon.addEventListener("click", () => {
                        const targetId = icon.getAttribute("data-target");
                        const targetField = document.getElementById(targetId);
                        const isPassword = targetField.getAttribute("type") === "password";

                        targetField.setAttribute("type", isPassword ? "text" : "password");
                        icon.classList.toggle("bi-eye");
                        icon.classList.toggle("bi-eye-slash");
                    });
                });
            });
        <?php echo '</script'; ?>
>
    <?php }
}
}
/* {/block 'content'} */
}
