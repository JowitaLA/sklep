{extends file="options.tpl"}
{block name=top}

<div class="bottom-margin">

	<form action="{$conf->action_root}userSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE UŻYTKOWNIKA</legend></h2>
		
				<div class="pure-control-group">
					<label for="login">Login:</label>
					<input id="login" type="text" placeholder="wpisz nazwę użytkownika" name="login" value="{$form->login}">
				</div>
		
				<div class="pure-control-group">
					<label for="password">Hasło:</label>
					<input id="password" type="text" placeholder="wpisz hasło użytkownika" name="password" value="{$form->password}">
				</div>
				
				<div class="pure-control-group">
					<label for="email">E-mail:</label>
					<input id="email" type="text" placeholder="wpisz e-mail użytkownika" name="email" value="{$form->email}">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="{$conf->action_root}usersOption">Powrót</a>
				</div>
			</fieldset>
		<input type="hidden" name="idUser" value="{$form->idUser}">
	</form>	
</div>

{/block}