<?php

require_once('./class/class.db.php');

class modelInbox extends Database
{
	
	public function modelGetAllMessages($user_id)
	{
		$this->query = "SELECT * 
						FROM message 
						WHERE message_to = '$user_id' AND (message_status = '0' OR message_status = '1')
						ORDER BY message_id DESC";		
		$this->resultMessage = $this->dbQuery($this->query);	
		
		return $this->resultMessage;
	}
	
	public function modelGetUserName($user_id)
	{	
		$this->query = "SELECT user_name FROM user WHERE user_id = '$user_id'";
		$this->result = $this->dbQuery($this->query);
		$this->rowName = $this->dbFetchArray($this->result);
		
		return $this->rowName['user_name'];
	}
	
	public function modelGetRows()
	{
		$this->row = $this->dbFetchArray($this->resultMessage);
				
		return $this->row;
	}
}

?>