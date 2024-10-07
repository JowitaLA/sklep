<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">

    <title>{$page_title|default:"Tytuł domyślny"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/style_hide_intro.css">
{/if}
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{$conf->app_url}/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/js/softscroll.js"></script>
</head>
<body>

    <div id="menu" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
			<a class="pure-menu-heading" href=""><b>Strona główna</a><ul>
			
			{if count($conf->roles)>0}
				<li class="pure-menu-selected"><a href="{$conf->action_url}logout">Wyloguj</a></li>
			{else}	
				<li class="pure-menu-selected"><a href="{$conf->action_url}logout">Logowanie</a></li>
			{/if}
			<li class="pure-menu-selected"><a href="{$conf->action_url}options">Opcje</a></li>
			<li class="pure-menu-selected"><a href="{$conf->action_url}logout">Kontakt</a></li>
			<li class="pure-menu-selected"><a href="https://www.huntshowdown.com/">Główna strona gry</a></li>	
        </ul>
    </div>



<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">{$page_title|default:"Tytuł domyślny"}</h1>
        <p class="splash-subhead">
             {$page_description|default:"Opis domyślny"}
        </p>
			{if count($conf->roles)==0}
				<p>
					<a href="{$conf->action_url}login" class="logowanie">Dołącz do nas już teraz!</a>
				</p>
			{/if}
    </div>
	
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">

{block name=content} Domyślna treść zawartości {/block}

    </div>

    <div class="footer l-box is-center">
		<p>
{$page_footer|default:"Domyślna treść stopki"}
		</p>

    </div>

</div>


</body>
</html>