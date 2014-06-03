<div class='nag'><span>Przypomnanie hasła</span></div>
Za pomocą tego formularza możesz zresetować swoje hasło i otrzymać nowe na podany adres e-mail!<br>
<form action="{$page}/remember_password" method='post'>
		<table>
		<tr>
			<td width='250px'>Podaj swój login:</td> 
			<td><input type='text' name='user_login' size='40'></td> 
		</tr>
		<tr>
			<td>Podaj swój adres e-mail: </td> 
			<td><input type='text' name='user_mail' size='40'></td> 
		</tr>
		</table>
		
		<input type='submit' name='remebmer_password' value='Przypomnij'>
</form>

{if isset($message)}
	{$message}
{/if}