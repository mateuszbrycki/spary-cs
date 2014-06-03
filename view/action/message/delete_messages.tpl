    <div class='nag'><span>Centrum zarządzania wiadomościami - kosz</span></div>
    
    {if isset($rows)}
    	<table style='margin: 20px;'>
        <tr>
        	<td width='150px'>Nadawca:</td>
            <td width='250px'>Tytuł:</td>
            <td width='100px'><center>Data wysłania:</center></td>
            <td></td>
        </tr>
    	{foreach $rows as $row}
            	<tr>
                    <td ><a href='{$page}/clans/clan_info/{$row.message_from}'>{$row.message_from_name}</a></td>
                    <td ><a href='{$page}/message/read_message/{$row.message_id}'>{$row.message_title}</a></td>
                    <td ><center>{$row.message_send_date}</center></td>
                    <td>
                        <a href='{$page}/message/rev/{$row.message_id}' style='text-decoration: none;'><input type='submit' name='rev' value='Przywróć' /></a>
                    </td>
                </tr>
            
   		{/foreach}
        </table>
    {/if}
    
    {if isset($actionMessage)}
    	{$actionMessage}
	{/if}