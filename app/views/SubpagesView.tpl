{* Widok dla Podstron tj: Kontakt, Regulamin, Zwroty i Reklamacje, Polityka RODO etc. *}

{extends file="templates/main.tpl"}

{block name=content}
    {* KONTAKT *}
    {if page_title == "Kontakt"}

    {/if}
    {* REGULAMIN *}
    {if page_title == "Regulamin"}

    {/if}
    {* ZWROTY I REKLAMACJE *}
    {if page_title == "Zwroty i Reklamacje"}

    {/if}
    {* POLITYKA RODO *}
    {if page_title == "Polityka RODO"}

    {/if}
    {* O NAS *}
    {if page_title == "O Nas"}

    {/if}
    {* POMOC *}
    {if page_title == "Pomoc"}

    {/if}
    {* SPOSOBY DOSTAWY *}
    {if page_title == "Sposoby Dostawy"}

    {/if}
{/block}