<?php

require_once('./class/class.db.php');

class modelSparInfo extends Database 
{
	public function modelGetSparInfo($spar_id)
	{
		$this->query = "SELECT spary.spar_date, spary.spar_time, spary.spar_players, spary.spar_serwer_ip, spary.spar_game_type, spary.spar_user_add, spary.spar_game_status, spary.spar_user_connect, user.user_team_name FROM spary, user WHERE spar_id = '$spar_id' AND spary.spar_user_add = user.user_id";
		$this->result = $this->dbQuery($this->query);
		
		return $this->result;
	}
	
	public function modelGetRows()
	{
		$this->row = $this->dbFetchArray($this->result);	
		
		return $this->row;
	}
	
	public function modelConnectUser($user_id, $spar_id)
	{
		$this->query = "UPDATE spary SET
						spar_user_connect = '$user_id'
						WHERE spar_id = '$spar_id'";
		$this->dbQuery($this->query);	
	}
	
	public function modelCheckUser($spar_id)
	{
		$this->query = "SELECT spar_user_add FROM spary WHERE spar_id = '$spar_id'";
		$this->result = $this->dbQuery($this->query);
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row['spar_user_add'];
	}
	
	public function modelGetUserAddMail($user_id)
	{
		$this->query = "SELECT user_mail FROM user WHERE user_id = '$user_id'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->row = $this->dbFetchArray($this->result);	
		
		return $this->row['user_mail'];
	}
	
	public function modelGetNumRows()
	{
		$this->num = $this->dbNumRows($this->result);
		
		return $this->num;	
	}
}

?>