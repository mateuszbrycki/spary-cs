<?php

	if(isset($_GET['message_id'])) //sprawdzanie czy istnieje iid
	{
		$readMessage = new readMessage;
		$readMessage->getMessageInfo();
		$row = $readMessage->getRows();
		
		if($readMessage->checkRecipient() OR $readMessage->checkSender())
        {
			$objSmarty->assign('row', $row);
            $readMessage->doMessageRead();

		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Nie masz prawa do zobaczenia tej wiadomości!', 1)); //1 - blad, 0 - nie
		}
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak wiadomości do wyświetlenia!', 1)); //1 - blad, 0 - nie
	}
class readMessage
{
	public function __construct()
	{
		require_once('./model/action/message/read_message.php');
		$this->modelReadMessage = new modelReadMessage;
		
		$this->user_id = $_SESSION['userId'];	
		$this->message_id = $_GET['message_id'];
	}
	
	public function getMessageInfo()
	{
		return $this->modelReadMessage->modelGetMessageInfo($this->message_id);	
	}
	
	public function getRows()
	{
		return $this->modelReadMessage->modelGetRows();
	}
	
	public function checkSender()
	{
		$this->sender_id = $this->modelReadMessage->modelGetSender();
		
		if($this->user_id == $this->sender_id)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	} 
	
	public function checkRecipient()
	{
		$this->recipient_id = $this->modelReadMessage->modelGetRecipient();
		
		if($this->user_id == $this->recipient_id)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function checkUserName($user_id)
	{
		return $this->modelReadMessage->modelCheckuserName($user_id);	
	}

    public function doMessageRead() {
        return $this->modelReadMessage->modelDoMessageRead($this->message_id);

    }

	
}

?>