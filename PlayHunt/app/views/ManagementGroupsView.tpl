{extends file="options.tpl"}
{block name=top}	

	<div class="bottom-margin">
		<center><h1><legend>ZARZĄDZANIE UŻYTKOWNIKAMI</h1></legend></center>

	</div>
		
	<div class="bottom-margin">
		<br>
		<center><a class="pure-button button-success" href="{$conf->action_root}groupNew"> Dodaj drużynę</a></center>
	</div>
</form>

<center><table id="tab_groups" class="pure-table pure-table-bordered">
	
		<thead>
			<tr>
				<th><center>Numer drużyny</th>
				<th><center>Nazwa drużyny</th>
				<th><center>Status</th>
				<th><center>Opcje</th>
			</tr>
	
		</thead>


	<tbody>
		{foreach $records as $r}
			{strip}
				<tr>
					<td><center>{$r["id"]}</td>
					<td><center>{$r["name"]}</td>	
					<td><center>{$r["activate"]}</td>	
					<td><center>
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}groupEdit&id={$r['id']}">Edytuj</a>
						&nbsp;
						<a class="button-small pure-button button-secondary" href="{$conf->action_url}groupDelete&id={$r['id']}">Usuń</a>
					</td>
					
				</tr>
			{/strip}
		{/foreach}
	</tbody>

</table>





{/block}







 