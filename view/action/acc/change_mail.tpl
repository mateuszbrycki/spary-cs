<div class='nag'><span>Zarządzanie kontem - zmiana maila</span></div>

	
	<form method='POST'>
        <table style='margin: 20px;'>
    		<tr><td>Stary adres e-mail:</td><td><input type='text' name='old_mail'></td></tr>
        	<tr><td>Nowy adres e-mail:</td><td><input type='text' name='new_mail'></td></tr>
        	<tr><td>Powtórz nowy adres e-mail:</td><td><input type='text' name='new_mail_repeat'></td></tr>
        </table>    
        
        <input type='submit' name='changeMail' value='Zmień'>
    </form>
    

	{if isset($actionMessage)}
       {$actionMessage}
	{/if}