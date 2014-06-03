<?php

	$messageSend = new messageSend;
	$messageSend->getAllSendMessages();
	
	while($row = $messageSend->getRows())
	{	
		$row['message_to_name'] = $messageSend->getUserName($row['message_to']);
		$results[] = $row; // dodajesz kazdy rekord do tablicy
	}
	
	if(isset($results))
	{
		$objSmarty->assign('rows', $results);
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak wiadomości do wyświetlenia!', 1)); //1 - blad, 0 - nie	
	}

class messageSend
{
	public function __construct()
	{
		require_once('./model/action/message/send_messages.php');
		$this->modelMessageSend = new modelMessageSend;		
		
		$this->user_id = $_SESSION['userId'];
	}
	
	public function getAllSendMessages()
	{
		return $this->modelMessageSend->modelGetAllSendMessages($this->user_id);	
	}
	public function getRows()
	{
		return $this->modelMessageSend->modelGetRows();
	}
	
	public function getUserName($user_id)
	{
		return $this->modelMessageSend->modelGetUserName($user_id);	
		
	}
}

?>