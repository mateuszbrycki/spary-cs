<div class='nag'><span>Zarządzanie newsami</span></div>

    {if isset($rows)}
        <table style='margin-left: 10px;'>
        <tr>
            <td width='150px'>Data dodania:</td>
            <td width='100px'>Autor:</td>
            <td width='150px'>Tytuł:</td>
            <td width='100px'></td>
        </tr>
        {foreach $rows as $row}
            <tr>
                <td>{$row.date}</td>
                <td>{$row.user_name}</td>
                <td>{$row.title}</td>
                <td><a href='http://spary-cs.localhost/news/edit/{$row.id}'>Edytuj</a> |<a href='http://spary-cs.localhost/news/delete/{$row.id}'>Usuń</a></td>
            </tr>
        {/foreach}
    {else}
        {if isset($actionMessage)}
            {$actionMessage}
        {/if}
    {/if}
</table>
