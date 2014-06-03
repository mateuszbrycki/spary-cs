<?php

	require_once('./class/class.db.php');

	class modelActivation extends Database
	{

		
		public function getNickAndKey($username, $key)
		{
			
			$this->query = "SELECT user_activation_key FROM user WHERE user_name = '$username'";
			
			$this->result = $this->dbQuery($this->query);
			
			$this->row = $this->dbFetchArray($this->result);
		
			if($this->row['user_activation_key'] == $key)
			{
				return true;	
			} else {
				return false;
			}		
		}
		
		public function makeChangeUserAccStatus($username, $key)
		{
			$this->query = "UPDATE user 
								SET	user_acc_status = 3
							 	WHERE user_name = '$username' AND user_activation_key = '$key'";
								
			$this->result = $this->dbQuery($this->query);
		}
	}

?>