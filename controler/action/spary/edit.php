<?php

	if(isset($_GET['spar_id']))
	{
		$sparEdit = new sparEdit;
		$row = $sparEdit->getOld();
		
		$objSmarty->assign('id', $_GET['spar_id']);
		
		if($row['spar_user_add'] == $_SESSION['userId']) //sprawdzanie czy użytkownik który dodał to jest użytkoniwk zalogowany
		{
			$objSmarty->assign('row', $row);
			 getSelect($row['spar_game_status'], $row['spar_game_type']);
			
			if(isset($_POST['editspar']))
			{
				if($sparEdit->checkEmpty( $_POST['data'] ,$_POST['time'], $_POST['spar_players'], $_POST['spar_serwer_ip']))
				{
					$sparEdit->insertNewValues($_POST['data'] ,$_POST['time'], $_POST['spar_players'], $_POST['spar_serwer_ip'], $_POST['spar_game_type'], $_POST['spar_game_status']);
					
					$objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie edytowano sparing!', 0)); //1 - blad, 0 - nie
					
				} else {
					$objSmarty->assign('actionMessage', Debug::getMessage('Wyszytkie pola muszą być wypełnione!', 1)); //1 - blad, 0 - nie
				}
			} 
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Nie masz prawa do edycji tego sparingu!', 1)); //1 - blad, 0 - nie
		}		
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak sparingu do edycji!', 1)); //1 - blad, 0 - nie
	}


class sparEdit
{
	
	public function __construct()
	{
		require_once('./model/action/spary/edit.php');
		$this->modelEditSpar = new modelEditSpar;
		
		$this->spar_id = $_GET['spar_id'];
	}
	public function getOld()
	{
		return $this->modelEditSpar->modelGetOld($this->spar_id);
	}
	
	public function checkEmpty($data, $time, $spar_players, $spar_serwer_ip)
	{
		if(!empty($data) AND !empty($time) AND !empty($spar_players) AND !empty($spar_serwer_ip))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function insertNewValues($data, $time, $spar_players, $spar_serwer_ip, $spar_game_type, $spar_game_status)
	{
		$this->modelEditSpar->modelInsertNewValues($data, $time, $spar_players, $spar_serwer_ip, $spar_game_type, $spar_game_status, $this->spar_id);
	}
	
}

?>

