{if !isset($bodyaction)} 
 <div class='nag'><span>Lista klanów</span></div>
 
 {if isset($rows)}
 	<table style='margin: 20px;'>
 		{foreach $rows as $row}
    		<tr>
            	<td width='250px'>{$row.user_team_name}</td>
                <td width='250px'>{$row.user_team_game}</td>
                <td width='100px'>{$row.user_team_status}</td>
                <td><a href='{$page}/clans/clan_info/{$row.user_id}'>Więcej</a></td>            
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