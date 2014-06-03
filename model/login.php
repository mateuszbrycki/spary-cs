<?php

require_once('./class/class.db.php');

class modelLogin extends Database
{

	public function getUserPass($username, $password)
	{
		
		if(!empty($username) AND !empty($password))
		{
			$query = "SELECT user_id, user_name, user_password FROM user WHERE user_name = '$username' AND user_password = '$password'";
			$this->result = $this->dbQuery($query);
			if (!$this->result)
			{
				return false;
			
			} else {
				$num = $this->dbNumRows($this->result);
			
				if ($num != 1)
				{
					return false;
				} else {
					
				
					$this->row = $this->dbFetchArray($this->result);
	
					$_SESSION['userId'] = $this->row['user_id'];					
					return true;
				
				}
			}
		} else {
			return false;
		}
	}
	
	public function getUserAccStatus($username)
	{
			$query = "SELECT user_acc_status FROM user WHERE user_name = '$username'";	
		
			$this->result = $this->dbQuery($query);
				
			$this->row = $this->dbFetchArray($this->result);
		
			return $this->row['user_acc_status'];
		 
	}
	
}

?>