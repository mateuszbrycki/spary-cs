<?php
	
	if (isset($_GET['action'])) //sprawdzanie czy istnieje zmienna action, ktora odpowiada za podstrony podstron id->action
	{	
		$objSmarty->assign('bodyaction',Router::getViewAction()); 
		include(Router::getControlerAction());
	}
	
	if(isset($_SESSION['isLogin'])) //sprawdzanie czy użytkownik jest zalogowany
	{
		$klan = new Klan;
		$klan->getAllKlans();
		
		while($row = $klan->getRows())
		{
			$row['user_team_game'] = getSparGameType($row['user_team_game']);
			$row['user_team_status'] = getSparGameStatus($row['user_team_status']);
			
			$results[] = $row;
		}
		
		if(isset($results))
		{
			$objSmarty->assign('rows', $results);
		} else {
			$objSmarty->assign('message', Debug::getMessage('Brak klanów do wyświetlenia!', 1)); //1 - blad, 0 - nie	
		}
		
	} else {
		header('Location: '.PAGE.'/news');
	}
	
class Klan
{
	public function __construct()
	{
		require_once('./model/clans.php');
		$this->modelKlan = new modelKlan;		
	}
	
	public function getAllKlans()
	{
		return $this->modelKlan->modelGetAllKlans();	
	}
	
	public function getRows()
	{
		return $this->modelKlan->modelGetRows();	
	}
	
	
}
?>