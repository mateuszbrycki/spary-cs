<?php

require_once('./class/class.db.php');

class modelKlan extends Database
{
	public function modelGetAllKlans()
	{
		$this->query = "SELECT user_id, user_name, user_team_game, user_team_status, user_team_name FROM user";	
		$this->result = $this->dbQuery($this->query);
		
		return $this->result;
	}
	
	public function modelGetRows()
	{
		$this->row = $this->dbFetchArray($this->result);	
		
		return $this->row;
	}
}

?>