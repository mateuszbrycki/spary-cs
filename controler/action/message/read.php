<?php

	if(isset($_GET['message_id'])) //sprawdzanie czy została wybrana wiadomość do edycji
	{
		$messageRead = new messageRead;
		
		if($messageRead->checkRecipient()) //sprawdzanie czy użytkownik jest właścicielem wiadomości
		{
			$messageRead->doMessageRead();
			header('Location: '.PAGE.'/message/inbox');
			
			
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Nie masz prawa do zarządzania tą wiadomościa!', 1)); //1 - blad, 0 - nie
		}
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Nie wybrano wiadomości!', 1)); //1 - blad, 0 - nie
	}

class messageRead
{
	public function __construct()
	{
		require_once('./model/action/message/read.php');	
		$this->modelMessageRead = new modelMessageRead;
		
		$this->user_id = $_SESSION['userId'];
		$this->message_id = $_GET['message_id'];
		$this->recipient_id = $this->getMessageRecipient();		
	
	}
	
	public function getMessageRecipient()
	{
		return $this->modelMessageRead->modelGetMessageRecipient($this->message_id);	
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
	
	public function doMessageRead()
	{
		$this->modelMessageRead->modelDoMessageRead($this->message_id);	
	}
}

?>