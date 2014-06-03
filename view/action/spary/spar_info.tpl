<div class='nag'><span>Informacje o sparingu</span></div>

	{if isset($row)}
    
    	<table style='margin: 20px;'>
    	 <tr><td>Data:</td><td>{$row.spar_date}</td></tr>
         <tr><td>Godzina:</td><td>{$row.spar_time}</td></tr>
         <tr><td>Ilość graczy w jednej drużynie:</td><td>{$row.spar_players}</td></tr>
         <tr><td>Ip serwera na którym rozegra się sparing:</td><td>{$row.spar_serwer_ip}</td></tr>
         <tr><td>Klan dodający:</td><td><a href='http://{$page}/clans/clan_info/{$row.spar_user_add}'>{$row.user_team_name}</a></td></tr>
         <tr><td>Gra:</td><td>{$row.spar_game_type}</td></tr>
         <tr><td>Rodzaj gry:</td><td>{$row.spar_game_status}</td></tr>
        </table> 
		{if $row.spar_user_connect == 0}        
       	 	<form method='POST'>
        		<input type='submit' name='connect' value='Dołącz' />
        	</form>	
        {/if}
    {/if}
    
	{if isset($actionMessage)}
      {$actionMessage}
	{/if}