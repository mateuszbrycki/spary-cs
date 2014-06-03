{if !isset($bodyaction)}
	
    {if $isLogin != true}
		<div class='nag'><span>Logowanie</span></div>

		<form action='{$page}/login' method='POST' style='margin: 20px;'>
			<b>Login:</b> <input type='text' name='username'><br />
   		 <b>Hasło:</b> <input type='password' name='pass'><br />
    
   		 <input type='submit' value='Zaloguj' name='login' style='margin-left: 55px;'>
				<br />
				{if isset($message)}
        			{$message}
				{/if}
		</form>
      {/if}
	
    
{else} 	
	{include file=$bodyaction}
{/if}


	
     
