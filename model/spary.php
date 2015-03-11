<?php

require_once('./class/class.db.php');


class modelSpary extends Database
{
	public function modelGetAllSpars()
	{
		$this->query = "SELECT spary.spar_date, spary.spar_server_ip, spary.spar_id, spary.spar_game_type, spary.spar_user_add, user.user_id, user.user_team_name, spary.spar_game_status
				    FROM spary, user
				    WHERE spary.spar_user_add = user.user_id AND spary.spar_user_connect = '0'";	
					
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