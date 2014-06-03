<?php

	if(isset($_POST['addspar']))
	{
		
		$addSpar = new addSpar($_POST['data'] ,$_POST['time'], $_POST['spar_players'], $_POST['spar_serwer_ip'], $_POST['spar_game_type'], $_POST['spar_game_status']);
		
		if($addSpar->checkEmpty( $_POST['data'] ,$_POST['time'], $_POST['spar_players'], $_POST['spar_serwer_ip']))
		{
			if($addSpar->checkData())
			{
				$addSpar->addSpar();
				$objSmarty->assign('actionMessage', Debug::getMessage('Pomyślnie dodano sparing', 0)); //1 - blad, 0 - nie
			} else {
				$objSmarty->assign('actionMessage', Debug::getMessage('Niepoprawna data!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
	}
	

class addSpar
{
	public function __construct($data, $time, $spar_players, $spar_serwer_ip, $spar_game_type, $spar_game_status)
	{
		require_once('./model/action/spary/add.php');	
		$this->modelAddSpar = new modelAddSpar();
		
		$this->data = $this->filterPass($data);
		$this->time = $this->filterPass($time);
		$this->spar_players = $this->filterPass($spar_players);
		$this->spar_serwer_ip = $this->filterPass($spar_serwer_ip);
		$this->spar_game_type = $spar_game_type;
		$this->spar_game_status = $spar_game_status;
		$this->userId = $_SESSION['userId'];
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
	
	public function filterPass($var)
	{
		return strip_tags(mysql_real_escape_string($var));
	}
	
	public function checkData()
	{
		$data = strtotime(date('d-m-Y H:i', $_SERVER['REQUEST_TIME']));
		$spar_date = strtotime($this->data . ' ' . $this->time);
							
		if($data > $spar_date) 
		{	
		 	return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function addSpar() 
	{
		$this->modelAddSpar->getAddSpar($this->data, $this->time, $this->spar_players, $this->spar_serwer_ip, $this->spar_game_type, $this->spar_game_status, $this->userId);	
	}
}
	
?>