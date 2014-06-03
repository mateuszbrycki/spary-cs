<?php

	require_once('./class/class.db.php');

	class modelChangeMail extends Database
	{
		public function getOldMail($user_id)
		{
			$this->query = "SELECT user_mail FROM user WHERE user_id = '$user_id'";
			$this->result = $this->dbQuery($this->query);
			$this->row = $this->dbFetchArray($this->result);
			
			return $this->row['user_mail'];	
		}
		
		public function getNewMailStatus($mail)
		{
			$this->query = "SELECT user_id FROM user WHERE user_mail = '$mail'";
			$this->result = $this->dbQuery($this->query);
			
			$this->num = $this->dbNumRows($this->result);
			
			if($this->num != 0)
			{
				return FALSE;	
			} else {
				return TRUE;
			}
		}
		
		public function doChangeMail($mail, $user_id)
		{
			$this->query = "UPDATE user SET
						user_mail = '$mail'
						WHERE user_id = '$user_id'";
						
			$this->dbQuery($this->query);
		}
	}

?>