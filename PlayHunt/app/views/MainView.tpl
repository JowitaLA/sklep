{extends file="main.tpl"}

{block name=footer}{/block}

{block name=content}

<center><h1>AKTUALNE ZAKŁADY</h2>

<div class="pure-menu pure-menu-horizontal bottom-margin">

</div>

<center>
<tr>
		<center>
	</tr>
	
<table id="tab_zaklady" class="pure-table pure-table-horizontal"
	>
{*<thead>
	
</thead>*}
</center>
<tbody>
{foreach $zaklady as $z}
{strip}
	{if $z@iteration is even by 1}
	
		<td><span style="color: #8B0000"> VS </span></td>
		<td><center>{$z["name"]}</td>
		{if $z["second_group_votes"] != 0}
		<td><center>{round($z["second_group_votes"]/($z["second_group_votes"]+$z["first_group_votes"])*100,0)}% </td>
		{else}
		<td><center> 0% </td>
		{/if}
		{if count($conf->roles)>0}
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}chooseTwo&id={$z['id']}"style="background-color: #2F4F4F">Zagłosuj</a>
		</td>
		{/if}
		</tr>
	{else}
	<tr>
		{*<td> <span style="color: #2F4F4F">{$z["id"]}. </span></td>*}
		{if count($conf->roles)>0}
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}chooseOne&id={$z['id']}" style="background-color: #2F4F4F">Zagłosuj</a>
		</td>
		{/if}
		{if $z["first_group_votes"] != 0}
		<td><center>{round($z["first_group_votes"]/($z["first_group_votes"]+$z["second_group_votes"])*100,0)}% </td>
		{else}
		<td><center> 0% </td>
		{/if}
		<td><center>{$z["name"]}</td>
{/strip}{/if}
{/foreach}
</tbody>
</table>

{/block}







 