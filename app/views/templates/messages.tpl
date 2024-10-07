{if $msgs->isError()}
<div class="messages err">
	<ol>
	{foreach $msgs->getErrors() as $err}
	{strip}
		{$err}
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}

{if $msgs->isInfo()}
<div class="messages inf bottom-margin">
	<ol>
	{foreach $msgs->getInfos() as $inf}
	{strip}
		{$inf}
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
