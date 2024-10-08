{extends file="templates/sign.tpl"}

{block name=content}
	{if $title == "Logowanie"}
		<div class="form-floating">
			<input type="text" class="form-control top-field" id="name" placeholder="name">
			<label for="name">Nazwa użytkownika</label>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control down-field" id="pass" placeholder="Password">
			<label for="pass">Hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="togglePassword"
				style="cursor: pointer;"></i>
		</div>

		<div class="text-center my-3">
			<a href="{$conf->action_url}registerShow" class="form-check-label no-underline">Nie masz jeszcze konta? Zarejestruj
				się</a>
		</div>

		<div class="text-center my-3">
			<a href="{$conf->action_url}resetPasswordShow" class="form-check-label no-underline">Nie pamiętasz hasła?</a>
		</div>
	{/if}

	{if $title == "Rejestracja"}
		<div class="form-floating">
			<input type="text" class="form-control top-field" id="registerName" placeholder="name">
			<label for="registerName">Nazwa użytkownika</label>
		</div>

		<div class="form-floating">
			<input type="email" class="form-control middle-field" id="email" placeholder="name@example.com">
			<label for="email">E-mail</label>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control middle-field" id="pass" placeholder="Password">
			<label for="pass">Hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="togglePassword"
				style="cursor: pointer;"></i>
		</div>

		<div class="form-floating position-relative">
			<input type="password" class="form-control down-field" id="sec_pass" placeholder="Repeat Password">
			<label for="sec_pass">Powtórz hasło</label>
			<!-- Ikona do pokazania/ukrycia hasła -->
			<i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
				id="togglePassword2" style="cursor: pointer;"></i>
		</div>


		<div class="form-check text-start my-3">
			<input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault">
				Akceptuję <a href="{$conf->action_url}loginShow" class="form-check-label color-orange">regulamin</a> naszej strony
				internetowej Yups.
			</label>
		</div>

		<div class="text-center my-3">
			<a href="{$conf->action_url}loginShow" class="form-check-label no-underline">Masz już konto? Zaloguj się</a>
		</div>

	{/if}

	{if $title == "Resetuj Hasło"}
		<div class="form-floating">
			<input type="email" class="form-control solo-field" id="email" placeholder="name@example.com">
			<label for="email">E-mail</label>
		</div>

		<div class="text-center my-3">
			<a href="{$conf->action_url}loginShow" class="form-check-label no-underline">Nie pamiętasz e-maila? Napisz do
				nas!</a>
		</div>
	{/if}
{/block}