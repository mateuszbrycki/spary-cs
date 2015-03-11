<?php

	$inbox = new Inbox;
	$inbox->getAllMessages();
	
	while($row = $inbox->getRows())
	{	
		//$row['message_from_name'] = $inbox->getUserName($row['message_from']);
		$results[] = $row; // dodajesz kazdy rekord do tablicy
	}
	
	if(isset($results))
	{
		$objSmarty->assign('rows', $results);
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak wiadomości do wyświetlenia!', 1)); //1 - blad, 0 - nie	
	}

class Inbox
{
	public function __construct()
	{
		require_once('./model/action/message/inbox.php');
		$this->modelInbox = new modelInbox;		
		
		$this->user_id = $_SESSION['userId'];
	}
	
	public function getAllMessages()
	{
		return $this->modelInbox->modelGetAllMessages($this->user_id);	
	}
	public function getRows()
	{
		return $this->modelInbox->modelGetRows();
	}
	
	public function getUserName($user_id)
	{
		return $this->modelInbox->modelGetUserName($user_id);	
		
	}
}

?>