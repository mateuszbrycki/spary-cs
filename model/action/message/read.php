<?php

require_once('./class/class.db.php');

class modelMessageRead extends Database
{
	public function modelGetMessageRecipient($message_id)
	{
		$this->query = "SELECT message_to FROM message WHERE message_id = '$message_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row['message_to'];
	}
	
	public function modelDoMessageRead($message_id)
	{
		$this->query = "UPDATE message SET
						message_status = '1'
						WHERE message_id = '$message_id'";
						
		$this->dbQuery($this->query);	
	}
}

?>