<?php
	require_once('./class/class.db.php');

	class modelChangePass extends Database
	{
		public function modelGetUserName($user_id)
		{
			$this->query = "SELECT user_name FROM user WHERE user_id = '$user_id'";
			
			$this->result = $this->dbQuery($this->query);
			
			$this->row = $this->dbFetchArray($this->result);
			
			return $this->row['user_name'];
		}
		
		public function modelGetOldPass($user_id)
		{
			$this->query = "SELECT user_password FROM user WHERE user_id = '$user_id'";
			
			$this->result = $this->dbQuery($this->query);
			
			$this->row = $this->fbFetchArray($this->result);
			
			return $this->row['user_password'];
		}
		
		public function changePass($pass, $user_id)
		{
			$this->query = "UPDATE user SET
							user_password = '$pass'
							WHERE user_id = '$user_id'"	;
							
			$this->dbQuery($this->query);
		}
	}
?>