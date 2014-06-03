<?php

	if(isset($_POST['newMessage'])) //sprawdzanie czy naciśnięto przycisk
	{
		$newMessage = new newMessage($_POST['inputString'], $_POST['message_title'], $_POST['message_text']);
		
		if($newMessage->checkEmpty($_POST['inputString'], $_POST['message_title'], $_POST['message_text'])) //sprawdzanie pustych pól
		{
			if($newMessage->checkRecipient()) //sprawdzanie czy ktoś nie wysyła wiadomości do siebie
			{
				$newMessage->sendMessage();
			
				$objSmarty->assign('actionMessage', Debug::getMessage('Wysłano wiadomość!', 0)); //1 - blad, 0 - nie				
			} else {
				$objSmarty->assign('actionMessage', Debug::getMessage('Nie możesz wysłać wiadomości do samego siebie!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
	}
	
	
class newMessage
{
	public function __construct($recipient, $title, $text)
	{
		require_once('./model/action/message/new_message.php');	
		$this->modelNewMessage = new modelNewMessage;
		
		$this->recipient = $this->filterPass($recipient);
		$this->title = $this->filterPass($title);
		$this->text = $this->filterPass($text);
		
		$this->user_id = $_SESSION['userId'];		
		$this->recipient_id = $this->getRecipientId();
		
		$this->send_date = getServerDate();
	}
	
	public function filterPass($var)
	{
		return strip_tags(mysql_real_escape_string($var));
	}
	
	public function checkEmpty($recipient, $title, $text)
	{
		if(!empty($recipient) AND !empty($title) AND !empty($text))
		{
			return TRUE;
		} else {
			return FALSE; 
		}
	}
	
	public function checkRecipient()
	{
		if($this->user_id == $this->recipient_id)
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function getRecipientId()
	{
		return $this->modelNewMessage->modelGetRecipientId($this->recipient);
	}
	
	public function sendMessage()
	{
		
		$this->modelNewMessage->modelSendMessage($this->user_id, $this->recipient_id, $this->title, $this->text, $this->send_date);	
	}
}

?>