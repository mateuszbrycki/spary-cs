<?php

require_once('./class/class.db.php');

class modelMessageDelete extends Database
{
	
	public function modelGetAllDeleteMessages($user_id)
	{
		$this->query = "SELECT * 
						FROM message 
						WHERE message_to = '$user_id' AND message_status = '2'
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