    <div class='nag'><span>Centrum zarządzania wiadomościami - czytanie wiadomości</span></div>
    
    {if isset($row)}
    <p style='margin: 20px;'>
    	Wiadomość wysłana przez: {$row.user_name}<br />
   	 	Data wysłania wiadomości: {$row.message_send_date}<br />
    	Temat: {$row.message_title}<br />
   		Treść: <br />
    	<p style='margin: 30px;'>{$row.message_text}</p>
    	<button style='width: 92px; height: 22px; margin: 20px;'>Odpowiedz</button>
        
    	<form style='display: none; margin: 20px;' action="{$page}/message/new_message" method='POST' >
    		<table>
              	<tr>
                	<td>Odbiorca:</td>
                    <td><input type='text' name='inputString' size="60" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" value='{$row.message_from}'><br>
			
						<div class="suggestionsBox" id="suggestions" style="display: none;">
						<img src="{$page}images/upArrow.png" style="position: relative; top: -10px; left: 30px;" alt="upArrow" />
						<div class="suggestionList" id="autoSuggestionsList">
						</div></div></td>
            
          		</tr>
            	<tr>
                	<td>Tytuł wiadomosci:</td>
                    <td><input type='text' name='message_title' value='Re: {$row.message_title}'/></td>
                </tr>
                <tr>
                	<td>Treść wiadomości:</td>
                    <td><textarea name="message_text" cols="60" rows="10"></textarea></td>                	
                </tr>
            </table>
            
            <input type='submit' name='newMessage' value='Wyślij' />
    
    	</form>
        
        <script>
			$("button").click(function () {
			$("form").toggle("slow");
			});
		</script>
       </p>
    {/if}
    
    {if isset($actionMessage)}
    	{$actionMessage}
	{/if}