
<?php

/* 
funkcje uzywane w skrypcie 
*/

require_once('config.php'); //zawiera dane konfiguracyjne

	function getVar($name) 
	{
		switch ($name)
		{
			case 'title':
				return PAGE_TITLE;
				break;
			case 'autor':
				return PAGE_AUTOR;
			case 'page':
				return PAGE;
		}

	}
    
    function getServerDate() 
	{
		return date('d-m-Y H:i:s', $_SERVER['REQUEST_TIME']);	
	}
	
	function getSparGameType($var)
	{
		switch ($var) {
				
				case 1:
					$var = 'Counter Strike 1.5';
					break;
		
				case 2:	
					$var = 'Counter Strike 1.6';
					break;
		
				case 3:
					$var = 'Counter Strike: Source';
					break;
		
				case 4:
					$var = 'Counter Strike: Condition Zero';
					break;
			
				case 5:
					$var = 'Counter Strike: Promod';
					break;
				
				
				}
			return $var;
	}
	
	function getSparGameStatus($var) 
	{
		switch($var) {
		
					case 1:
						$var = 'Steam';
						break;
				
					case 2:
						$var = 'Non Steam';
						break;
		
			}
		return $var;
	}
	
	function getSelect($spar_game_status, $spar_game_type)
	{
		echo "<script type=\"text/javascript\">
  				 function wybierz()
   				{
        			sel = document.getElementsByTagName(\"select\");
        			sel[0].value=$spar_game_status;
        			sel[1].value= $spar_game_type;
  				 }
    			window.onload=wybierz;
			</script>"; 	
	}
    
 ?>