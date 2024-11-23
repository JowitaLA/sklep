{* Widok dla Podstron tj: Kontakt, Regulamin, Zwroty i Reklamacje, Polityka RODO etc. *}

{extends file="templates/secondary.tpl"}

{block name=content}
    <section class="pt-5 container mt-4">
        {$subpage.description nofilter}
    </section>
{/block}