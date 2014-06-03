    <div class='nag'><span>Centrum zarządzania wiadomościami - skrzynka odbiorcza</span></div>
    
    {if isset($rows)}
    
    	<table style='margin: 20px;'>
        <tr>
        	<td width='20px'></td>
            <td width='100px'>Nadawca:</td>
            <td width='250px'>Tytuł:</td>
            <td width='150px'><center>Data wysłania:</center></td>
            <td></td>
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
                    <td ><a href='{$page}/clans/clan_info/{$row.message_from}'>{$row.message_from_name}</a></td>
                    <td ><a href='{$page}/message/read_message/{$row.message_id}'>{$row.message_title}</a></td>
                    <td ><center>{$row.message_send_date}</center></td>
                    <td>
                    	{if $row.message_status == 0}
                    		<a href='{$page}/message/read/{$row.message_id}' style='text-decoration: none;'><input type='button' name='read' value='Oznacz jako przeczytaną' /></a> 
                        {/if}
                        <a href='{$page}/message/delete/{$row.message_id}' style='text-decoration: none;'><input type='submit' name='delete' value='Kosz' /></a>
                    </td>
                </tr>
            
   		{/foreach}
        </table>
    {/if}
    
    {if isset($actionMessage)}
    	{$actionMessage}
	{/if}