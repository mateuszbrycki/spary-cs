{if !isset($bodyaction)}
<div class='nag'><span>Zarządzanie kontem</span></div>

	{if isset($message)}
       {$message}
	{/if}
    
{else} 	
	{include file=$bodyaction}
{/if}