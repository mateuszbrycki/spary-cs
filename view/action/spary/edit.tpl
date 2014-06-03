    <div class='nag'><span>Centrum zarządzania sparingami - edycja wybranego sparingu</span></div>
    
    
    
    
    {if isset($row)}
    
    <form name='edit_spar' action='{$id}' method='POST' style='margin: 20px;'>
    	<table>	
        	<tr>
				<td width="350px">Podaj datę:</td> 
				<td><input type='text' name='data' value='{$row.spar_date}'>

			
				<script language="JavaScript">
						new tcal ({
					// form name
						'formname': 'edit_spar',
					// input name
						'controlname': 'data'
								});
				</script>
				</td>
			</tr>
	

			<tr>
				<td>Podaj godzinę (w formacie hh:mm):</td> 
				<td><input type='text' name='time' value='{$row.spar_time}'></td>
			
			</tr>

			<tr>
				<td>Podaj ilość graczy (w jednej drużynie):</td> 
				<td><input type='text' name='spar_players' value='{$row.spar_players}'></td>
			</tr>
            
            <tr>
				<td>Podaj rodzaj serwera:</td> <td><select name='spar_game_status' value='{$row.spar_game_status}'>
														<option value='1'>Steam</option>
														<option value='2'>Non Steam</option>
														</select></td>
			</tr>
            
			<tr>
				<td>Podaj rodzaj gry:</td> <td><select name='spar_game_type' value='{$row.spar_game_type}'>
											<option value="1">Counter Strike 1.5</option>
											<option value="2">Counter Strike 1.6</option>
											<option value="3">Counter Strike: Source</option>
											<option value="4">Counter Strike: Condition Zero</optnion>
											<option value="5">Counter Strike: Promod</optnion>
												</select></td>
			</tr>
			<tr>
				<td>Podaj ip serwera (w formacie ip:port): </td>
				<td><input type='text' name='spar_serwer_ip' size="40" value='{$row.spar_serwer_ip}'></td>
			</tr>
			
			
			
			
			
		</table>
        <br />
        
    	<center><input type='submit' value='Edytuj' name='editspar' style='margin-left: 55px;'></center>
        {/if}
        
        {if isset($actionMessage)}
      		{$actionMessage}
		{/if}