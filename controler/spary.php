<?php

require_once('./functions.php');

	if (isset($_GET['action'])) //sprawdzanie czy istnieje zmienna action, ktora odpowiada za podstrony podstron id->action
	{	
		$objSmarty->assign('bodyaction',Router::getViewAction()); 
		include(Router::getControlerAction());
	}
	
	if(isset($_SESSION['isLogin'])) //sprawdzanie czy użytkownik jest zalogowany
	{		
		$spary = new Spary();
		$spary->getAllSpars();
		
		while($row = $spary->getRows()) {
			$row['spar_game_type'] = getSparGameType($row['spar_game_type']);
			$row['spar_game_status'] = getSparGameStatus($row['spar_game_status']);
			$results[] = $row; // dodajesz kazdy rekord do tablicy
		}
		
		
		if(isset($results))
		{
			$objSmarty->assign('rows', $results);
		} else {
			$objSmarty->assign('message', Debug::getMessage('Brak sparingów do wyświetlenia!', 1)); //1 - blad, 0 - nie	
		}
			
	} else {
		header('Location: '.PAGE.'/news');
	}
	


class Spary
{
	public function __construct()
	{
		require_once('./model/spary.php');
		$this->modelSpary = new modelSpary;		
	}
	public function getAllSpars()
	{
		return $this->modelSpary->modelGetAllSpars();
	}
	
	public function getRows()
	{
		return $this->modelSpary->modelGetRows();	
	}
	
	
	
	
}
?>