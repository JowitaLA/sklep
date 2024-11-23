{* Widok Weryfikacji Użytkownika *}

{extends file="templates/sign.tpl"}

{block name=content}
    {if $action_title == "Weryfikacja konta"}
        <form>
            <a href="{$conf->app_url}/main" class="d-flex mb-4">
                <!-- Dodany link do strony głównej -->
                <img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 fw-normal">
                    {$action_title}
                </h1>

                <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                    <i id="theme-icon" class="bi bi-moon"></i>
                </button>
            </div>
            <div style="text-align: center;">
                {$verify_message}
            </div>
            {if $verify_message == "Aktywacja użytkownika przebiegła pomyślnie. Zaloguj się na swoje konto."}
                <button type="button" onclick="window.location.href='{$conf->app_url}/loginShow'"
                    class="btn btn-primary w-100 py-2">Przejdź do Logowania</button>
            {else}
                <button type="button" onclick="window.location.href='{$conf->app_url}/main'"
                    class="btn btn-primary w-100 py-2 mt-2">Wróć do Strony Głównej</button>
            {/if}
        </form>
    {/if}
    {if $action_title == "Resetowanie hasła"}

        <form method="post" action="{$conf->action_url}newPassword" id="passwordForm" >
            <a href="{$conf->app_url}/main" class="d-flex mb-4">
                <img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-3 fw-normal">
                    {$action_title}
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
            <input type="hidden" name="idUser" value="{$idUser}">
            Zresetuj Hasło</button>
        </form>



        <script>
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
                    {literal}
                        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;'<>.,?/~`-]).{8,}$/;
                    {/literal}
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
        </script>
    {/if}
{/block}