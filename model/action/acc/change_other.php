<?php

require_once('./class/class.db.php');

class modelChangeOther extends Database
{
	public function modelGetOldValues($user_id)
	{
		$this->query = "SELECT user_team_name, user_team_status, user_team_game, user_serwer_ip, user_team_map, user_team_players FROM user WHERE user_id = '$user_id'";
		
		$this->result = $this->dbQuery($this->query);
		$this->row = $this->dbFetchArray($this->result);
		
		return $this->row;
	}
	
	public function modelDoChangeOther($user_id, $user_team_name, $user_serwer_ip, $user_team_map, $user_team_players, $user_team_status, $user_team_game)
	{
		$this->query = "UPDATE user SET
						user_team_name = '$user_team_name',
						user_serwer_ip = '$user_serwer_ip',
						user_team_map = '$user_team_map',
						user_team_players = '$user_team_players',
						user_team_status = '$user_team_status',
						user_team_game = '$user_team_game'
						WHERE user_id = '$user_id'";
		
		$this->dbQuery($this->query);
	}
}
?>