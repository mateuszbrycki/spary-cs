<?php

require_once('./class/class.db.php');

class modelEditSpar extends Database
{
	public function modelGetOld($id)
	{
		$this->id = $id;
		
		$this->query = "SELECT spar_date, spar_time, spar_players, spar_server_ip, spar_game_type, spar_game_status, spar_user_add
                        FROM spary
                        WHERE spar_id = '$this->id'";
		$this->result = $this->dbQuery($this->query);	
		$this->row = mysql_fetch_array($this->result);
		
		return $this->row;
	}
	
	public function modelInsertNewValues($data, $time, $spar_players, $spar_server_ip, $spar_game_type, $spar_game_status, $spar_id)
	{
		$this->query = "UPDATE spary 
							SET	spar_date = '$data',
									spar_time = '$time',
									spar_players = '$spar_players',
									spar_game_type = '$spar_game_type',
									spar_server_ip = '$spar_server_ip',
									spar_game_status = '$spar_game_status'
                            WHERE spar_id = '$spar_id' ";
		$this->dbQuery($this->query);
	}
}

?>