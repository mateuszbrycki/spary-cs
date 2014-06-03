{if !isset($bodyaction)}
<div class='nag'><span>System prywatnych wiadomości</span></div>

	{if isset($message)}
       {$message}
	{/if}
    
{else} 	
	{include file=$bodyaction}
{/if}