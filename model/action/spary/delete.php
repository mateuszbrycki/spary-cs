<?php
require_once('./class/class.db.php');

class modelDeleteSpar extends Database
{
	public function getUserId($spar_id)
	{
		$this->query = "SELECT spar_user_add FROM spary WHERE spar_id = '$spar_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->row = mysql_fetch_array($this->result);
		
		return $this->row['spar_user_add'];
	}
	
	public function modelSparDelete($spar_id)
	{
		$this->query = "DELETE FROM spary WHERE spar_id = '$spar_id' LIMIT 1";
		
		$this->dbQuery($this->query);	
	}
}


?>