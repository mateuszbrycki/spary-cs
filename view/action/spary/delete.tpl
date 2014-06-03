    <div class='nag'><span>Centrum zarządzania sparingami - usuwanie sparingów</span></div>
    
    {if isset($uprawnienia)}
    	<p align='center'<b>Czy na pewno chcesz usunąć ten sparing?</b></p><br />
    	<form method='POST'>
    		<input type='submit' name='tak' value='TAK' /> <input type='submit' name='nie' value='NIE' />
    		</form>
    {else}
     	{if isset($actionMessage)}
      		{$actionMessage}
		{/if}
    {/if}