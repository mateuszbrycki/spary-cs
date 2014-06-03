<div class='nag'><span>Kontakt z administracją!</span></div>

<form action="{$page}/kontakt" method='post' style='margin: 20px;'>
	<table>
    	<tr>
			<td>Twój e-mail:</td><td><input type='text' name='mail' size='40'></td>
        </tr>
        <tr>
			<td>Treść wiadomości:</td><td><textarea name='wiadomosc' cols='50' rows='5'></textarea></td>
        </tr>
    </table>
    <input type='submit' name='send_mail' value='Wyślij'>	
</form>

{if isset($message)}
	{$message}
{/if}

