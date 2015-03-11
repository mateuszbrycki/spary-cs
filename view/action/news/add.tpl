<div class='nag'><span>Centrum zarządzania newsami - dodawanie newsa</span></div>
<form action='{$page}/news/add' method='POST' style='margin: 20px;'>

    <table>
        <tr>
            <td><b>Tytuł:</b></td> <td><input type='text' name='title' style="width: 350px"><br /></td>
        </tr>
        <tr>
            <td><b>Treść:</b></td> <td><textarea cols="80" rows="20" name="text" ></textarea></td>
        </tr>

    </table>
    <input type='submit' value='Dodaj' name='addNews' style='margin-left: 55px;'>
</form>

{if isset($actionMessage)}
    {$actionMessage}
{/if}