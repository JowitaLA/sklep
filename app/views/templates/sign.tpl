<!doctype html>
<html lang="pl">

<head>
	<script src="{$conf->app_url}/assets/js/color-modes.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$page_description|default:"Domyślny opis"}">
	<link rel="icon" href="{$conf->app_url}/assets/img/logo.png" type="image/png">

	<title>{$title}</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="{$conf->app_url}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="{$conf->app_url}/assets/dist/css/sign.css" rel="stylesheet">
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="sign.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
	<main class="form-sign w-100 m-auto">
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


			{block name=content} Domyślna treść zawartości {/block}

			<button class="btn btn-primary w-100 py-2" type="submit">{$button_title}</button>
		</form>
	</main>
	<script src="{$conf->app_url}/assets/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Funkcja do przełączania widoczności hasła dla logowania
			const togglePassword = document.querySelector('#togglePassword');
			if (togglePassword) {
				togglePassword.addEventListener('click', function() {
					const passwordInput = document.querySelector('#pass');
					const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
					passwordInput.setAttribute('type', type);

					// Zmiana ikony (eye / eye-slash)
					this.classList.toggle('bi-eye');
					this.classList.toggle('bi-eye-slash');
				});
			}

			// Funkcja dla drugiego pola hasła (Rejestracja)
			const togglePassword2 = document.querySelector('#togglePassword2');
			if (togglePassword2) {
				togglePassword2.addEventListener('click', function() {
					const passwordInput = document.querySelector('#sec_pass');
					const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
					passwordInput.setAttribute('type', type);

					// Zmiana ikony (eye / eye-slash)
					this.classList.toggle('bi-eye');
					this.classList.toggle('bi-eye-slash');
				});
			}
		});
	</script>
</body>

</html>