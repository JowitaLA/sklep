{* Widok dla Logowania, Rejestracji oraz restartu hasła *}
{extends file="templates/sign.tpl"}

{block name=content}
	{if count($conf->roles) > 0} {* Sprawdzenie, czy użytkownik jest zalogowany *}
		<form>
			<a href="{$conf->app_url}/main" class="d-flex mb-4">
				<img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
			</a>
			<h1 class="h3 mb-3 fw-normal">
				{$title}
			</h1>
			<div style="text-align: center;">
				Jesteś już zalogowany.
			</div>
			<button type="button" onclick="window.location.href='{$conf->app_url}/main'"
				class="btn btn-primary w-100 py-2 mt-2">Wróć do Strony Głównej</button>
		</form>
	{else}
		{if $title == "Logowanie"}
			<form method="post" action="{$conf->action_url}login">
				<a href="{$conf->app_url}/main" class="d-flex mb-4">
					<!-- Dodany link do strony głównej -->
					<img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
				</a>

				<div class="d-flex justify-content-between align-items-center">
					<h1 class="h3 mb-3 fw-normal">
						{$title}
					</h1>

					<button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
						data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
						<i id="theme-icon" class="bi bi-moon"></i>
					</button>
				</div>

				<div class="form-floating">
					<input type="text" class="form-control top-field" name="l_name" id="name" placeholder="name">
					<label for="name">Nazwa użytkownika</label>
				</div>

				<div class="form-floating position-relative">
					<input type="password" class="form-control middle-field" name="l_password" id="pass" placeholder="Password">
					<label for="pass">Hasło</label>
					<!-- Ikona do pokazania/ukrycia hasła -->
					<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
						id="togglePassword" style="cursor: pointer;"></i>
				</div>

				<div class="text-center my-3">
					<a href="{$conf->action_url}registerShow" class="form-check-label no-underline">Nie masz jeszcze konta?
						Zarejestruj się</a>
				</div>

				<div class="text-center my-3">
					<a href="{$conf->action_url}resetPasswordShow" class="form-check-label no-underline">Nie pamiętasz hasła?</a>
				</div>

				<!-- Przycisk submit, który wysyła formularz -->
				<button type="submit" class="btn btn-primary w-100 py-2">{$button_title}</button>
			</form>
		{/if}

		{if $title == "Rejestracja"}
			<form method="post" action="{$conf->action_url}register">
				<a href="{$conf->app_url}/main" class="d-flex mb-4">
					<!-- Dodany link do strony głównej -->
					<img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
				</a>


				<div class="d-flex justify-content-between align-items-center">
					<h1 class="h3 mb-3 fw-normal">
						{$title}
					</h1>

					<button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
						data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
						<i id="theme-icon" class="bi bi-moon"></i>
					</button>
				</div>
				<div class="form-floating">
					<input type="text" class="form-control top-field" name="r_name" id="registerName" placeholder="name">
					<label for="registerName">Nazwa użytkownika</label>
				</div>

				<div class="form-floating">
					<input type="email" class="form-control middle-field" name="r_email" id="email" placeholder="name@example.com">
					<label for="email">E-mail</label>
				</div>

				<div class="form-floating position-relative">
					<input type="password" class="form-control middle-field" name="r_first_password" id="pass"
						placeholder="Password">
					<label for="pass">Hasło</label>
					<!-- Ikona do pokazania/ukrycia hasła -->
					<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
						id="togglePassword" style="cursor: pointer;"></i>
				</div>

				<div class="form-floating position-relative">
					<input type="password" class="form-control down-field" name="r_second_password" id="sec_pass"
						placeholder="Repeat Password">
					<label for="sec_pass">Powtórz hasło</label>
					<!-- Ikona do pokazania/ukrycia hasła -->
					<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
						id="togglePassword2" style="cursor: pointer;"></i>
				</div>


				<div class="form-check text-start my-3">
					<input class="form-check-input" type="checkbox" name="terms_accepted" value="accept" id="flexCheckDefault"
						required>
					<label class="form-check-label" for="flexCheckDefault">
						Akceptuję <a href="{$conf->action_url}loginShow" class="form-check-label color-orange">regulamin</a> naszej
						strony internetowej Yups.
					</label>
				</div>

				<div class="text-center my-3">
					<a href="{$conf->action_url}loginShow" class="form-check-label no-underline">Masz już konto? Zaloguj się</a>
				</div>
				<button type="submit" class="btn btn-primary w-100 py-2">{$button_title}</button>
			</form>
		{/if}

		{if $title == "Resetuj Hasło"}
			<form>
				<a href="{$conf->app_url}/main" class="d-flex mb-4">
					<!-- Dodany link do strony głównej -->
					<img src="{$conf->app_url}/assets/img/logo.png" alt="" width="50" height="50">
				</a>


				<div class="d-flex justify-content-between align-items-center">
					<h1 class="h3 mb-3 fw-normal">
						{$title}
					</h1>

					<button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
						data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
						<i id="theme-icon" class="bi bi-moon"></i>
					</button>
				</div>
				<div class="form-floating">
					<input type="email" class="form-control solo-field" id="email" placeholder="name@example.com">
					<label for="email">E-mail</label>
				</div>

				<div class="text-center my-3">
					<a href="{$conf->action_url}loginShow" class="form-check-label no-underline">Nie pamiętasz e-maila? Napisz do
						nas!</a>
				</div>
				<button type="submit" class="btn btn-primary w-100 py-2">{$button_title}</button>

			</form>
		{/if}
	{/if}
{/block}