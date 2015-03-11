<?php

require_once('./class/class.db.php');

class modelSparInfo extends Database 
{
	public function modelGetSparInfo($spar_id)
	{
		$this->query = "SELECT s.spar_date, s.spar_time, s.spar_players, s.spar_server_ip, s.spar_game_type, s.spar_user_add, s.spar_game_status, s.spar_user_connect, u.user_team_name
                        FROM spary s, user u
                        RIGHT JOIN user u
                        ON u.user_id = s.spar_user_add
                        WHERE s.spar_id = '$spar_id'";
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