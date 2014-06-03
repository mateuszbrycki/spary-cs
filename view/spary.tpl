{if !isset($bodyaction)}
	
    <div class='nag'><span>Centrum zarządzania sparingami - wszystkie sparingi na stronie</span></div>
 {if isset($rows)}   
   <br /> <b style='margin: 15px;'>Wszystkie sparingi:</b><br />
    <table style='margin-left: 10px;'>
    	<tr>
        	<td width='150px'>Data:</td>
        	<td width='150px'>Gra:</td>
            <td width='100px'>Rodzaj gry:</td>
            <td width='200px'>Klan:</td>
            <td width='100px'></td>
        </tr>
       {foreach $rows as $row}
       	<tr>
        	<td>{$row.spar_date}</td>
        	<td>{$row.spar_game_type}</td>
            <td>{$row.spar_game_status}</td>
            <td><a href='{$page}/clans/clan_info/{$row.user_id}'>{$row.user_team_name}</a></td>
            <td><a href='{$page}/spary/spar_info/{$row.spar_id}'>Więcej</a></td>
        </tr>
       {/foreach}
    </table> 
  {/if}  
	{if isset($message)}
        {$message}
	{/if}
    
{else} 	
	{include file=$bodyaction}
{/if}