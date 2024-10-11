{extends file="options.tpl"}
{block name=top}	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE UŻYTKOWNIKAMI</h1></legend></center>
			<form action="{$conf->action_root}usersOption" method="post" class="pure-form pure-form-aligned">
			<legend><h3>Wyszukaj użytkownika po loginie</h3></legend>
		<fieldset>
			<input type="text" placeholder="login użytkownika" name="sf_login" style="width: 300px;" value="{$searchForm->login}" />
			<button type="submit" class="pure-button pure-button-primary" style="background-color: #171644">Filtruj</button>
		</fieldset>					
			</form>
	</div>

		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="{$conf->action_root}userNew"> Dodaj użytkownika</a></center>
	</div>
</form>

<center><table id="tab_users" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Login</th>
				<th><center>Hasło</th>
				<th><center>E-mail</th>
				<th><center>Wygrane</th>
				<th><center>Przegrane</th>
				<th><center>Status</th>
				<th><center>Opcje</th>
			</tr>
	
		</thead>


	<tbody>
		{foreach $records as $r}
			{strip}
				<tr>
					<td><center>{$r["login"]}</td>
					<td><center>{$r["password"]}</td>
					<td><center>{$r["email"]}</td>
					<td><center>{$r["wins"]}</td>
					<td><center>{$r["loses"]}</td>
					<td><center>{$r["activate"]}</td>
					
					<td><center>
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}userEdit&idUser={$r['idUser']}">Edytuj</a>
						&nbsp;
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}userDelete&idUser={$r['idUser']}">Usuń</a>
					</td>
					
				</tr>
			{/strip}
		{/foreach}
	</tbody>

</table>





{/block}







 