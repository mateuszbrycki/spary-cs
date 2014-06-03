<?php

	if(isset($_GET['message_id'])) //sprawdzanie czy została wybrana wiadomość do edycji
	{
		$messageDelete = new messageDelete;
		
		if($messageDelete->checkRecipient()) //sprawdzanie czy użytkownik jest właścicielem wiadomości
		{
			$messageDelete->doMessageDelete();
			header('Location: '.PAGE.'/message/inbox');
			
			
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Nie masz prawa do zarządzania tą wiadomościa!', 1)); //1 - blad, 0 - nie
		}
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Nie wybrano wiadomości!', 1)); //1 - blad, 0 - nie
	}

class messageDelete
{
	public function __construct()
	{
		require_once('./model/action/message/delete.php');	
		$this->modelMessageDelete = new modelMessageDelete;
		
		$this->user_id = $_SESSION['userId'];
		$this->message_id = $_GET['message_id'];
		$this->recipient_id = $this->getMessageRecipient();		
	
	}
	
	public function getMessageRecipient()
	{
		return $this->modelMessageDelete->modelGetMessageRecipient($this->message_id);	
	}
	
	public function checkRecipient()
	{
		if($this->user_id == $this->recipient_id)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function doMessageDelete()
	{
		$this->modelMessageDelete->modelDoMessageDelete($this->message_id);	
	}
}

?>