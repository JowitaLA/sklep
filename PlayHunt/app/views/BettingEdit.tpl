{extends file="options.tpl"}
{block name=top}

<div class="bottom-margin">

	<form action="{$conf->action_root}bettingSave" method="post" class="pure-form pure-form-aligned">
			<fieldset>
	
										<h2><legend>OPCJE ZAKŁADÓW</legend></h2>
		
				<div class="pure-control-group">
					<label for="creator">Założyciel:</label>
					<input id="creator" type="text" placeholder="wpisz numer użytkownika tworzącego zakładu" name="creator" value="{$form->creator}">
				</div>
		
				<div class="pure-control-group">
					<label for="firstID">Numer pierwszej drużyny:</label>
					<input id="firstID" type="text" placeholder="wpisz numer pierwszej drużyny" name="firstID" value="{$form->firstID}">
				</div>
				
				<div class="pure-control-group">
					<label for="secondID">Numer drugiej drużyny:</label>
					<input id="secondID" type="text" placeholder="wpisz numer drugiej drużyny" name="secondID" value="{$form->secondID}">
				</div>
				
				<div class="pure-control-group">
					<label for="whenEnd">Data zakończenia:</label>
					<input id="whenEnd" type="text" placeholder="wpisz datę zakończenia zakładu" name="whenEnd" value="{$form->whenEnd}">
				</div>
				
				<div class="pure-controls">
					<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
					<a class="pure-button button-secondary" href="{$conf->action_root}bettingsOption">Powrót</a>
				</div>
			</fieldset>
		<input type="hidden" name="id" value="{$form->id}">
	</form>	
</div>

{/block}