<?php

require_once('./class/class.db.php');

class modelUserSpary extends Database
{
	public function modelGetUserSparAdd($user_id)
	{
		$this->query = "SELECT spar_date, spar_time, spar_server_ip, spar_game_type, spar_id
						FROM spary
						WHERE spar_user_add = '$user_id'";	
						
		$this->resultAdd = $this->dbQuery($this->query);
		
		return $this->resultAdd;
	}
	public function modelGetUserConnect($user_id)
	{
		$this->queryConnect = "SELECT spar_date, spar_time, spar_server_ip, spar_game_type
						FROM spary
						WHERE spar_user_connect = '$user_id'";	
		$this->resultConnect = $this->dbQuery($this->queryConnect);
		
		return $this->resultConnect;	
	}
	
	public function modelGetRowsAdd()
	{
		$this->rowAdd = $this->dbFetchArray($this->resultAdd);
		
		return $this->rowAdd;
	}
	
	public function modelGetRowsConnect()
	{
		$this->rowConnect = $this->dbFetchArray($this->resultConnect);
		
		return $this->rowConnect;
	}
}
?>