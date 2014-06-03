<div class='nag'><span>Zarządzanie kontem - zmiana innych danych</span></div>

	

	<form method='POST'>
        <table style='margin: 20px;'>
    		<tr><td>Nazwa klanu:</td><td><input type='text' name='user_team_name' value='{$row.user_team_name}'></td></tr>
        	<tr>
				<td>Rodzaj klanu:</td> <td><select name='user_team_status'>
														<option value='1'>Steam</option>
														<option value='2'>Non Steam</option>
														</select></td>
			</tr>
            <tr>
				<td>Gra:</td> <td><select name='user_team_game'>
											<option value="1">Counter Strike 1.5</option>
											<option value="2">Counter Strike 1.6</option>
											<option value="3">Counter Strike: Source</option>
											<option value="4">Counter Strike: Condition Zero</optnion>
											<option value="5">Counter Strike: Promod</optnion>
												</select></td>
			</tr>
        	<tr><td>Ip serwera klanowego:</td><td><input type='text' name='user_serwer_ip' value='{$row.user_serwer_ip}'></td></tr>
            <tr><td>Mapa klanowa:</td><td><input type='text' name='user_team_map' value='{$row.user_team_map}'></td></tr>
            <tr><td>Ilość graczy w klanie:</td><td><input type='text' name='user_team_players' value='{$row.user_team_players}'></td></tr>
        </table>    
        
        <input type='submit' name='changeOther' value='Zmień'>
    </form>
	{if isset($actionMessage)}
        {$actionMessage}
	{/if}