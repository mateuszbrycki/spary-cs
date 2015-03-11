<?php

require_once('./class/class.db.php');

class modelReadMessage extends Database
{
	public function modelGetMessageInfo($message_id)
	{

		$this->query = "SELECT m.message_id, m.message_to, m.message_title, m.message_from, m.message_text, m.message_status, m.message_send_date, u.user_name
						FROM message m
						RIGHT JOIN user u
						ON m.message_from = u.user_id
						WHERE m.message_id = '$message_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		return $this->result;
	}

    public function modelDoMessageRead($message_id)
    {
        $this->query = "UPDATE message SET
						message_status = '1'
						WHERE message_id = '$message_id'";

        $this->dbQuery($this->query);
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