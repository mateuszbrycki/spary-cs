{if !isset($bodyaction)}
    <div class='nag'><span>Zarządzanie newsami</span></div>

    {if isset($rows)}
        <br /> <b style='margin: 15px;'>Aktualności:</b><br />
        <div style="margin: 20px;">
            {foreach $rows as $row}
                <b>{$row.title}</b> <br />
                <div style="font-size: 11px;">Dodał: {$row.user_name} dnia {$row.date}<br /></div>
                {$row.text}
                <br /><br />
            {/foreach}
        </div>
    {/if}
    {if isset($message)}
        {$message}
    {/if}

{else}
    {include file=$bodyaction}
{/if}