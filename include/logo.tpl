<div id='logo'>
	<div id='site_name'><p>Spary-cs.pl :: umów się z innym klanem na sparing!</p></div>
    
    {if $isLogin != true}
        <div id='login_panel_top'>
        	<h1>PANEL LOGOWANIA</h1>
            
            
            <form action='{$page}/login' method='POST' style='margin: 20px;'>
    		     <b>Login:</b> <input type='text' name='username'><br />
           		 <b>Hasło:</b> <input type='password' name='pass'><br />
            
           		 <input type='submit' value='Zaloguj' name='login' style='margin-left: 55px;'>
             </form>
        
        </div>
    {/if}
</div>