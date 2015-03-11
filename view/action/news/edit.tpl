<div class='nag'><span>Centrum zarządzania newsami - dodawanie newsa</span></div>

{if isset($row)}

    <form action='{$page}/news/edit/{$row.id}' method='POST' style='margin: 20px;'>

        <table>
            <tr>
                <td><b>Tytuł:</b></td> <td><input type='text' name='title' style="width: 350px" value="{$row.title}"><br /></td>
            </tr>
            <tr>
                <td><b>Treść:</b></td> <td><textarea cols="80" rows="20" name="text" value="">{$row.text}</textarea></td>
            </tr>

        </table>
        <input type='submit' value='Dodaj' name='editNews' style='margin-left: 55px;'>
    </form>
    {/if}

{if isset($actionMessage)}
    {$actionMessage}
{/if}