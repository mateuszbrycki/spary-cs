<?php
require_once('./class/class.db.php');

class modelKlanInfo extends Database
{
	public function modelGetKlanInfo($klan_id)
	{
		$this->query = "SELECT *
						FROM user
						WHERE user_id = '$klan_id'";
						
		$this->result = $this->dbQuery($this->query);
		
		return $this->result;
	}
	
	public function modelGetRows()
	{
		$this->row = $this->dbfetchArray($this->result);
		
		return $this->row;	
	}
	
	public function modelGetNumRows()
	{
		$this->num = $this->dbNumRows($this->result);
		
		return $this->num;	
	}
}
?>