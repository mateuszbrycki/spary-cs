<?php

require_once('./class/class.db.php');

class modelAddSpar extends Database
{
	public function getAddSpar($data, $time, $spar_players, $spar_serwer_ip, $spar_game_type, $spar_game_status, $user_id)
	{
		$this->query = "INSERT INTO spary (spar_user_add, spar_date, spar_time, spar_game_type, spar_game_status, spar_server_ip, spar_players, spar_user_connect)
						VALUES ('$user_id', '$data', '$time', '$spar_game_type', '$spar_game_status', '$spar_serwer_ip', '$spar_players', '')";
						
		$this->result = $this->dbQuery($this->query);
	}
}

?>