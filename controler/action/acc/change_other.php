<?php

	$changeOther = new changeOther();
	
	$row = $changeOther->getOldValues();
	
	getSelect($row['user_team_status'], $row['user_team_game']);
	
	$objSmarty->assign('row', $row);

	if(isset($_POST['changeOther'])) //sprawdzanie czy naciśnięto przycisk
	{
		if($changeOther->checkEmpty($_POST['user_team_name'], $_POST['user_serwer_ip'], $_POST['user_team_map'], $_POST['user_team_players']))
		{
			$changeOther->clearValues($_POST['user_team_name'], $_POST['user_serwer_ip'], $_POST['user_team_map'], $_POST['user_team_players']);
			$changeOther->doChangeOther($_POST['user_team_status'], $_POST['user_team_game']);
			$objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie dokonano zmian!', 0)); //1 - blad, 0 - nie
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Wypełij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
		
	}


class changeOther
{
	public function __construct()
	{
		require_once('./model/action/acc/change_other.php');	
		$this->modelChangeOther = new modelChangeOther;
		$this->user_id = $_SESSION['userId'];
		
	}
	
	public function getOldValues()
	{
		return $this->modelChangeOther->modelGetOldValues($this->user_id);
	}
	
	public function clearValues($user_team_name, $user_serwer_ip, $user_team_map, $user_team_players)
	{
		$this->user_team_name = $this->filterPass($user_team_name);
		$this->user_serwer_ip = $this->filterPass($user_serwer_ip);
		$this->user_team_map = $this->filterPass($user_team_map);
		$this->user_team_players = $this->filterPass($user_team_players);	
	}
	
	public function checkEmpty($user_team_name, $user_serwer_ip, $user_team_map, $user_team_players)
	{
		if(!empty($user_team_name) AND !empty($user_serwer_ip) AND !empty($user_team_map) AND !empty($user_team_players))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function filterPass($var)
	{
			return strip_tags(mysql_real_escape_string($var));
	}
	
	public function doChangeOther($user_team_status, $user_team_game)
	{
		$this->modelChangeOther->modelDoChangeOther($this->user_id, $this->user_team_name, $this->user_serwer_ip, $this->user_team_map, $this->user_team_players, $user_team_status, $user_team_game);
	}
}

?>