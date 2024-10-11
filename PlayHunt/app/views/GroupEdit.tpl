{extends file="options.tpl"}
{block name=top}

<div class="bottom-margin">

	<form action="{$conf->action_root}groupSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE DRUŻYN</legend></h2>
		
				<div class="pure-control-group">
					<label for="name">Nazwa drużyny:</label>
					<input id="name" type="text" placeholder="wpisz nazwę drużyny" name="name" value="{$form->name}">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="{$conf->action_root}groupsOption">Powrót</a>
				</div>
			</fieldset>
		<input type="hidden" name="id" value="{$form->id}">
	</form>	
</div>

{/block}