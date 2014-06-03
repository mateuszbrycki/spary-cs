<?php
require_once('./functions.php');

	$userSpary = new userSpary;
	$userSpary->getUserSparAdd();	
	
	
	while($row = $userSpary->getRowsAdd()) {
			$row['spar_game_type'] = getSparGameType($row['spar_game_type']);
			$results[] = $row; // dodajesz kazdy rekord do tablicy
	}
	
	if(isset($results))
	{
		$objSmarty->assign('rows_user', $results);
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak sparingów do wyświetlenia', 1)); //1 - blad, 0 - nie	
	}
	
	$userSpary->getUserSparConnect();
	
	while($row_2 = $userSpary->getRowsConnect()) {
			$row_2['spar_game_type'] = getSparGameType($row_2['spar_game_type']);
			$results_2[] = $row_2; // dodajesz kazdy rekord do tablicy
	}
	
	if(isset($results_2))
	{
		$objSmarty->assign('rows_user_2', $results_2);
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak sparingów do wyświetlenia', 1)); //1 - blad, 0 - nie
	}
	
	

class userSpary
{

	public function __construct()
	{
		require_once('./model/action/spary/user_spary.php');
		$this->modelUserSpary = new modelUserSpary;		
		
		$this->user_id = $_SESSION['userId'];
	}
	public function getUserSparAdd()
	{						
		return $this->modelUserSpary->modelGetUserSparAdd($this->user_id);						
	}
	
	public function getUserSparConnect()
	{
		return $this->modelUserSpary->modelGetUserConnect($this->user_id);		
	}
	
	public function getRowsAdd()
	{
		return $this->modelUserSpary->modelGetRowsAdd();
	}	
	
	public function getRowsConnect()
	{
		return $this->modelUserSpary->modelGetRowsConnect();
	}
	
}
?>