<div class='nag'><span>Centrum zarządzania newsami - usuwanie  newsa</span></div>

{if isset($uprawnienia)}
    <p align='center'<b>Czy na pewno chcesz usunąć ten artykuł?</b></p><br />
    <form method='POST'>
        <input type='submit' name='tak' value='TAK' /> <input type='submit' name='nie' value='NIE' />
    </form>
{else}
    {if isset($actionMessage)}
        {$actionMessage}
    {/if}
{/if}