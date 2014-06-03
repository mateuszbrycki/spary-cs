    <div class='nag'><span>Centrum zarządzania wiadomościami - wiadomości wysłane</span></div>
    
    {if isset($rows)}
    	<table style='margin: 20px;'>
        <tr>
        	<td width='40px'></td>
            <td width='150px'>Użytkownik:</td>
            <td width='250px'>Tytuł:</td>
            <td width='100px'>Data wysłania:</td>
        </tr>
    	{foreach $rows as $row}
            	<tr>
                	<td >
                    	{if $row.message_status != 0}
                        	<img src='{$page}/images/mail_open_2.png' width='20px' height='20px' />
                        {else}
                        	<img src='{$page}/images/mail.png' width='20px' height='20px' />
                        {/if}
                    </td>
                    <td><a href='{$page}/clans/clan_info/{$row.message_to}'>{$row.message_to_name}</a></td>
                    <td ><a href='{$page}/message/read_message/{$row.message_id}'>{$row.message_title}</a></td>
                    <td><center>{$row.message_send_date}</center></td>
                </tr>
            
   		{/foreach}
        </table>
    {/if}
    
    {if isset($actionMessage)}
    	{$actionMessage}
	{/if}