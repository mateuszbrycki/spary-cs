<?php

require_once('./class/class.db.php');

class modelReadMessage extends Database
{
	public function modelGetMessageInfo($message_id)
	{
		$this->query = "SELECT * FROM message WHERE message_id = '$message_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		return $this->result;
	}
	
	public function modelGetRows()
	{
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row;	
	}
	
	public function modelGetSender()
	{
		return $this->row['message_from'];
	}
	
	public function modelGetRecipient()
	{
		return $this->row['message_to'];
	}
	
	public function modelCheckuserName($user_id)
	{
		$this->query = "SELECT user_name FROM user WHERE user_id = '$user_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row['user_name'];
	}
}

?>