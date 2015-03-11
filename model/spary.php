<?php

require_once('./class/class.db.php');


class modelSpary extends Database
{
	public function modelGetAllSpars()
	{
		$this->query = "SELECT s.spar_date, s.spar_server_ip, s.spar_id, s.spar_game_type, s.spar_user_add, u.user_id, u.user_team_name, s.spar_game_status
				    FROM spary s
				    RIGHT JOIN user u
                    ON s.spar_user_add = u.user_id
				    WHERE s.spar_user_connect = '0'";
					
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