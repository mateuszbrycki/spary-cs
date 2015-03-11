<?php

require_once('./class/class.db.php');

class modelMessageDelete extends Database
{
	
	public function modelGetAllDeleteMessages($user_id)
	{
		$this->query = "SELECT m.message_id, m.message_to, m.message_title, m.message_from, m.message_text, m.message_status, m.message_send_date, u.user_name
						FROM message m
						RIGHT JOIN user u
						ON m.message_from = u.user_id
                        WHERE m.message_to = '$user_id' AND message_status = '2'
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