<?php
require_once('./class/class.db.php');

class modelRememberPassword extends Database
{
	public function modelGetMail($user_name)
	{
		$this->query = "SELECT user_mail FROM user WHERE user_name = '$user_name'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row['user_mail']; 
	}
	
	public function modelChangePassword($password, $user_name)
	{
		$this->query = "UPDATE user SET
						user_password = '$password'
						WHERE user_name = '$user_name'";
		$this->dbQuery($this->query);	
	}
}

?>