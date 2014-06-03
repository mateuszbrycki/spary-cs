{if !isset($bodyaction)}
		<div class='nag'><span>Aktywacja konta!</span></div>
				{if isset($message)}
        			<p>{$message}</p>
				{/if}
		
{else} 	
	{include file=$bodyaction}
{/if}