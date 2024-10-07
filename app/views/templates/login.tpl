<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">

    <title>{$page_title|default:"Play Hunt"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/login-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/login.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/stylelog.css">
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/stylelog_hide_intro.css">
{/if}
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{$conf->app_url}/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/js/softscroll.js"></script>
</head>
<body>

    <div id="menu" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
			<a class="pure-menu-heading" href="{$conf->action_url}showMain"><b>Strona główna</a><ul>
			<li class="pure-menu-selected"><a href="{$conf->action_url}contact">Kontakt</a></li>
			<li class="pure-menu-selected"><a href="https://www.huntshowdown.com/">Główna strona gry</a></li>
			
        </ul>
    </div>

<div class="splash-container">
    <div class="splash">
			<p class="splash-subhead">
			
				<form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
					<h1> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LOGOWANIE </h1>
						<fieldset>
					
							<div class="pure-control-group">
								<label for="id_login">login: </label>
								<input id="id_login" type="text" name="login" style="width: 500px;"/>
							</div>
					
							<div class="pure-control-group">
								<label for="id_pass">hasło: </label>
								<input id="id_pass" type="password" name="pass" style="width: 500px;" /><br />
							</div>
							
							<div class="pure-controls">
								<input type="submit" value="zaloguj" class="pure-button pure-button-primary" style="background-color: #2F4F4F;width: 200px;"/>
							</div>
			
						</fieldset>
				</form>	
			</p>
		
		
		<form action="{$conf->action_root}register" method="post" class="pure-form pure-form-aligned bottom-margin">
					<h1> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; REJESTRACJA </h1>
						<fieldset>
					
							<div class="pure-control-group">
								<label for="id_reg">login: </label>
								<input id="id_reg" type="text" name="reg" style="width: 500px;"/>
							</div>
							
							<div class="pure-control-group">
								<label for="id_mail">e-mail: </label>
								<input id="id_mail" type="text" name="mail" style="width: 500px;"/>
							</div>
					
							<div class="pure-control-group">
								<label for="id_fPass">hasło: </label>
								<input id="id_fPass" type="password" name="fPass" style="width: 500px;" /><br />
							</div>
							
							<div class="pure-control-group">
								<label for="id_sPass">powtórz hasło: </label>
								<input id="id_sPass" type="password" name="sPass" style="width: 500px;" /><br />
							</div>
							
							<div class="pure-controls">
								<input type="submit" value="zarejestruj" class="pure-button pure-button-primary" style="background-color: #2F4F4F;width: 200px;" />
							</div>
			
						</fieldset>
		</form>	
    </div>
	
</div>
</div>

</body>
</html>