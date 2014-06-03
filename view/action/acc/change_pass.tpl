<div class='nag'><span>Zarządzanie kontem - zmiana hasła</span></div>

	<form method='POST'>
        <table style='margin: 20px;'>
    		<tr><td>Stare hasło:</td><td><input type='password' name='old_pass'></td></tr>
        	<tr><td>Nowy hasło:</td><td><input type='password' name='new_pass'></td></tr>
        	<tr><td>Powtórz nowe hasło:</td><td><input type='password' name='new_pass_repeat'></td></tr>
        </table>    
        
        <input type='submit' name='changePass' value='Zmień'>
    </form>
    
	{if isset($actionMessage)}
       {$actionMessage}
	{/if}