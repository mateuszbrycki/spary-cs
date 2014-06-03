<?php

	if(isset($_GET['spar_id']))
	{
		$sparDelete = new sparDelete;

		if($sparDelete->checkuserId()) //sprawdzanie czy ma uprawnienia
		{
			$objSmarty->assign('uprawnienia', TRUE);
			if(isset($_POST['tak']))
			{
				$sparDelete->sparDelete();
				
				header('Location: '.PAGE.'/spary/user_spary');
			} elseif(isset($_POST['nie'])) {
				header('Location: '.PAGE.'/spary/user_spary');
			}
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Nie masz uprawnień do usuniecia tego sparingu!', 1)); //1 - blad, 0 - nie
		}
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak sparingu do usunięcia!', 1)); //1 - blad, 0 - nie
	}
	
class sparDelete
{
	
	public function __construct()
	{
		require_once('./model/action/spary/delete.php');
		$this->modelDeleteSpar = new modelDeleteSpar;
		
		$this->user_id = $_SESSION['userId'];
		$this->spar_id = $_GET['spar_id'];	
	}
	
	public function checkUserId()
	{
		if($this->modelDeleteSpar->getUserId($this->spar_id) == $this->user_id)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function sparDelete()
	{
		$this->modelDeleteSpar->modelSparDelete($this->spar_id);
	}
	
}

?>