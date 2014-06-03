<?php

require_once('./class/class.db.php');

class modelNewMessage extends Database
{
	public function modelGetRecipientId($recipient)
	{
		$this->query = "SELECT user_id FROM user WHERE user_name = '$recipient'";
		$this-> result = $this->dbQuery($this->query);
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row['user_id'];	
	}
	
	public function modelSendMessage($user_id, $recipient_id, $title, $text, $date)
	{
		$this->query = "INSERT INTO message (message_title, message_to, message_from , message_text, message_status, message_send_date)
						VALUES ('$title', '$recipient_id', '$user_id', '$text', 0, '$date')";
						
		$this->dbQuery($this->query);
	}
}

?>