{extends file="options.tpl"}
{block name=top}	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE WALKAMI</h1></legend></center>
	</div>

		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="{$conf->action_root}bettingNew">Stwórz walkę</a></center>
	</div>
</form>

<center><table id="tab_bettings" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Założyciel Walki</th>
				<th><center>Numer Pierwszej Drużyny</th>
				<th><center>Numer Drugiej Drużyny</th>
				<th><center>Koniec Walki</th>
				<th><center>Status</th>
				<th><center>Opcje</th>
			</tr>
	
		</thead>


	<tbody>
	
		{foreach $records as $r}
			{strip}
				<tr>
					<td><center>{$r["login"]}</td>
					<td><center>{$r["group_first_id"]}</td>
					<td><center>{$r["group_second_id"]}</td>
					<td><center>{$r["when_end"]}</td>
					<td><center>{$r["activate"]}</td>
					<td><center>
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}bettingEdit&id={$r['id']}">Edytuj</a>
						&nbsp;
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}bettingDelete&id={$r['id']}">Usuń</a>
					</td>
				</tr>
			{/strip}
		{/foreach}
	</tbody>

</table>





{/block}







 