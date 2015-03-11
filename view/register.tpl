{if !isset($bodyaction)}
	

		<div class='nag'><span>Rejestracja</span></div>

		<form action='{$page}/register' method='POST' style='margin: 20px;'>
        
        <table>
        	<tr>
				<td><b>Login:</b></td> <td><input type='text' name='username'><br /></td>
            </tr>
            <tr>
   				<td><b>Hasło:</b></td> <td><input type='password' name='pass'><br /></td>
            </tr>
            <tr>
          		<td><b>Powtórz hasło:</b></td> <td><input type='password' name='pass_2'><br /></td>
            </tr>
            <tr>
           		<td><b>Adres e-mail:</b></td> <td><input type='text' name='mail'><br /></td>
   			</tr>
            <tr>
           		<td><b>Nazwa klanu:</b></td> <td><input type='text' name='team_name'><br /></td>
   			</tr>
            <tr>
				<td><b>Rodzaj gry:</b></td> <td><select name='game_type'>
											<option value="1">Counter Strike 1.5</option>
											<option value="2">Counter Strike 1.6</option>
											<option value="3">Counter Strike: Source</option>
											<option value="4">Counter Strike: Condition Zero</optnion>
											<option value="5">Counter Strike: Promod</optnion>
												</select></td>
			</tr>
            <td><b>Rodzaj klanu:</b></td> <td><select name='game_status'>
														<option value='1'>Steam</option>
														<option value='2'>Non Steam</option>
														</select></td>
			</tr>
            <tr>
				<td><b>Podaj ip serwera (w formacie ip:port):</b></td>
				<td><input type='text' name='serwer_ip' size="40"></td>
			</tr>
            
   		</table>
        
         <input type="checkbox" name="regulamin" style='width: auto; height: auto; margin-top: 10px;'>Akceptuję <a href='http://{$page}/regulamin' target='blank'>regulamin</a> <br />
    
         <input type='submit' value='Zarajestruj' name='register' style='margin-left: 55px;'>
				<br />
				{if isset($message)}
        			{$message}
				{/if}
		</form>
    
{else} 	
	{include file=$bodyaction}
{/if}


	
     
