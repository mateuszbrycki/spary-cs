<?php

	$deleteMessages = new deleteMessages;
	$deleteMessages->getAllDeleteMessages();
	
	while($row = $deleteMessages->getRows())
	{
		$results[] = $row; // dodajesz kazdy rekord do tablicy
	}
	
	if(isset($results))
	{
		$objSmarty->assign('rows', $results);
	} else {
		$objSmarty->assign('actionMessage', Debug::getMessage('Brak wiadomości do wyświetlenia!', 1)); //1 - blad, 0 - nie	
	}

class deleteMessages
{
	public function __construct()
	{
		require_once('./model/action/message/delete_messages.php');
		$this->modelMessageDelete = new modelMessageDelete;		
		
		$this->user_id = $_SESSION['userId'];
	}
	
	public function getAllDeleteMessages()
	{
		return $this->modelMessageDelete->modelGetAllDeleteMessages($this->user_id);	
	}
	public function getRows()
	{
		return $this->modelMessageDelete->modelGetRows();
	}
	
	public function getUserName($user_id)
	{
		return $this->modelMessageDelete->modelGetUserName($user_id);	
		
	}
}

?>