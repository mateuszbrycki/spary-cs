  <div class='nag'><span>Centrum zarządzania sparingami - sparingi użytkownika</span></div>
  
   <br /> <b style='margin: 15px;'>Sparingi, które dodałeś:</b><br />
   
        {if isset($rows_user)}
         <table style='margin-left: 10px;'>
    		<tr>
        		<td width='150px'>Data:</td>
            	<td width='100px'>Godzina:</td>
        		<td width='150px'>Ip serwera:</td>
            	<td width='150px'>Gra:</td>
            	<td width='100px'></td>
        	</tr>
        	{foreach $rows_user as $row}
         	<tr>
         		<td>{$row.spar_date}</td>
           		<td>{$row.spar_time}</td>
            	<td>{$row.spar_server_ip}</td>
           		<td>{$row.spar_game_type}</td>
          	  	<td><a href='http://spary-cs.localhost/spary/edit/{$row.spar_id}'>Edytuj</a> |<a href='http://spary-cs.localhost/spary/delete/{$row.spar_id}'>Usuń</a></td>
         	</tr>
        	{/foreach}
        {else}
        	{if isset($actionMessage)}
        		{$actionMessage}
			{/if}
        {/if}
   </table>
   
   
   
   <br /> <b style='margin: 15px;'>Sparingi, do których dołączyłeś:</b><br />
    {if isset($rows_user_2)}
   <table style='margin-left: 10px;'>
    	<tr>
        	<td width='150px'>Data:</td>
            <td width='100px'>Godzina:</td>
        	<td width='150px'>Ip serwera:</td>
            <td width='150px'>Gra:</td>
            <td width='100px'></td>
        </tr>
        
        {foreach $rows_user_2 as $row_2}
         <tr>
         	<td>{$row_2.spar_date}</td>
            <td>{$row_2.spar_time}</td>
            <td>{$row_2.spar_server_ip}</td>
            <td>{$row_2.spar_game_type}</td>
            <td></td>
         </tr>
        {/foreach}
        {else}
        	{if isset($actionMessage)}
        		{$actionMessage}
			{/if}
        {/if}
   </table>