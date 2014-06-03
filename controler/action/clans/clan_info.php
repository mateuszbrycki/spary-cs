<?php

	if(isset($_GET['clan_id']))
	{
		$klanInfo = new klanInfo;
		$klanInfo->getKlanInfo();
		$num = $klanInfo->getNumRows();
		
		if($num != 0)
		{
			$row = $klanInfo->getRows();
		
			$row['user_team_game'] = getSparGameType($row['user_team_game']);
			$row['user_team_status'] = getSparGameStatus($row['user_team_status']);
		
			$row['user_team_map'] = $klanInfo->checkEmpty($row['user_team_map']);
			$row['user_team_players'] = $klanInfo->checkEmpty($row['user_team_players']);
			
			$objSmarty->assign('row', $row);
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Taki klan nie istnieje!', 1)); //1 - blad, 0 - nie	
		}
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak klanu do wyświetlenia!', 1)); //1 - blad, 0 - nie	
	}
	
class klanInfo
{
	public function __construct()
	{
		require_once('./model/action/clans/clan_info.php');
		$this->modelKlanInfo = new modelKlanInfo;	
		
		$this->klan_id = $_GET['clan_id'];
	}
	
	public function getKlanInfo()
	{
		return $this->modelKlanInfo->modelGetKlanInfo($this->klan_id);	
	}
	
	public function getRows()
	{
		return $this->modelKlanInfo->modelGetRows();	
	}
	
	public function checkEmpty($var)
	{
		if(!empty($var))
		{
			return $var;	
		} else {
			return 'brak informacji';
		}
	}
	
	public function getNumRows()
	{
		return $this->modelKlanInfo->modelGetNumRows();	
	}
}
?>