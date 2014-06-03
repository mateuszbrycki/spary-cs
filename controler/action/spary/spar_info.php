<?php

	if(isset($_GET['spar_id']))
	{
		$sparInfo = new sparInfo;
		$sparInfo->getSparInfo();
		
		$num = $sparInfo->getNumRows();
		
		if($num != 0)
		{
			$row = $sparInfo->getRows();
		
			$row['spar_game_type'] = getSparGameType($row['spar_game_type']);
			$row['spar_game_status'] = getSparGameStatus($row['spar_game_status']);
		
			$objSmarty->assign('row', $row);
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Taki sparing nie istnieje!', 1)); //1 - blad, 0 - nie
		}
		
		if(isset($_POST['connect']))
		{
			if($sparInfo->checkUser())
			{
				$sparInfo->connectUser();
				//$sparInfo->sendMessageToUserAdd();
			
				$objSmarty->assign('actionMessage', Debug::getMessage('Dołączyłeś do sparingu.', 0)); //1 - blad, 0 - nie
			} else {
				$objSmarty->assign('actionMessage', Debug::getMessage('Nie możesz dołączyć do dodanego przez siebie sparingu!', 1)); //1 - blad, 0 - nie
			}
			
		} 
	} else {
		$objSmarty->assign('message', Debug::getMessage('Brak sparingu do wyświetlenia!', 1)); //1 - blad, 0 - nie
	}

class sparInfo
{

	public function __construct()
	{
		require_once('./model/action/spary/spar_info.php');
		$this->modelSparInfo = new modelSparInfo;
		
		$this->spar_id = $_GET['spar_id']; 
		$this->user_id = $_SESSION['userId'];	
	}
	
	public function getSparInfo()
	{
		return $this->modelSparInfo->modelGetSparInfo($this->spar_id);
	}
	
	public function getRows()
	{
		return $this->modelSparInfo->modelGetRows();	
	}
	
	public function connectUser()
	{
		$this->modelSparInfo->modelConnectUser($this->user_id, $this->spar_id);	
	}
	
	public function checkUser()
	{
		if($this->modelSparInfo->modelCheckUser($this->spar_id) != $this->user_id)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function getUserAddMail()
	{
		$this->userAddMail = $this->modelSparInfo->modelGetUserAddMail($this->user_id);	
	}
	
	public function sendMessageToUserAdd()
	{
		$this->getUserAddMail();
		
		$temat = 'Informacje o sparingu: spary-cs.pl';
											
		$tresc = 'Do jednego z dodanych przez Ciebie sparingów dołączył inny klan. Aby dowiedzieć się więcej kliknij na poniższy link:';
											
		$link =	"<a href='http://spary-cs.pl/spary/spar_info/" . $this->spar_id . "'>" . "http://spary-cs.pl/spary/spar_info/" . $this->spar_id . "</a>";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: spary-cs.pl\r\n';
										
		$wiadomosc = "
				$tresc<br />
				$link	";
 
		$mail = mail($this->userAddMail, $temat, $wiadomosc, $headers);
	}
	
	public function getNumRows()
	{
		return $this->modelSparInfo->modelGetNumRows();	
	}
	
}

?>