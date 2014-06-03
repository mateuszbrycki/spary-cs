
    <div class='nag'><span>Centrum zarządzania wiadomościami - wysyłanie wiadomości</span></div>

		<form method='POST' style='margin: 20px;'>
        	  <table>
              	<tr>
                	<td>Odbiorca:</td>
                    <td><input type='text' name='inputString' size="60" id="inputString" onkeyup="lookup(this.value);" onblur="fill();"><br>
			
						<div class="suggestionsBox" id="suggestions" style="display: none;">
						<img src="{$page}/images/upArrow.png" style="position: relative; top: -10px; left: 30px;" alt="upArrow" />
						<div class="suggestionList" id="autoSuggestionsList">
						</div></div></td>
            
          		</tr>
            	<tr>
                	<td>Tytuł wiadomosci:</td>
                    <td><input type='text' name='message_title' /></td>
                </tr>
                <tr>
                	<td>Treść wiadomości:</td>
                    <td><textarea name="message_text" cols="60" rows="10"></textarea></td>                	
                </tr>
            </table>
            
            <input type='submit' name='newMessage' value='Wyślij' />

        </form>
    
    {if isset($actionMessage)}
    	{$actionMessage}
	{/if}