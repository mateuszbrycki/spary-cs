	<div class='nag'><span>Zarządzanie kontem - zmiana avatara</span></div>
    
    <form method='POST' style='margin: 20px;'>
    	<table>
        	<tr>
            	<td>Podaj link do avatara:</td>
                <td><input type='text' name='avatar_link' style='width: 350px;'></td>
            </tr>
        </table>
        
        <input type='submit' name='changeAvatar' value='Zmień'>
    </form>

	{if isset($actionMessage)}
        {$actionMessage}
	{/if}
