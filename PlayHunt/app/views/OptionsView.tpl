{extends file="options.tpl"}

{block name=top}

<center><h1></h2>

<div class="pure-menu pure-menu-horizontal bottom-margin">

</div>

<center>
<table id="tab_zaklady" class="pure-table pure-table-horizontal">
<thead>

</thead>
</center>
<tbody>
<table>
		Witaj w panelu zarządzania stroną PlayHunt

		<h1>ZARZĄDZANIE</h2>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}usersOption">Zarządzaj Użytkownikami</a>
		</td>
		
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}bettingsOption">Zarządzaj Zakładami</a>
		</td>
		
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}groupsOption">Zarządzaj Grupami</a>
		</td>
		
		
</tbody>
</table>

{/block}







 