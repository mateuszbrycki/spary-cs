<?php

require_once('./class/class.db.php');

class modelRegister extends Database
{	
	public function getUserName($username) /* sprawdzanie czy użytkownik o takiej nazwie już iosteniej */
	{
		
		
		$this->query = "SELECT user_name FROM user WHERE user_name = '$username'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->num = $this->dbNumRows($this->result);

		if($this->num == 0)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
			
	}
	
	public function getUserMail($mail) /* sprawdzanie czy adres e-mail jest wolny */
	{
		
		
		$this->query = "SELECT user_mail FROM user WHERE user_mail = '$mail'";
		
		$this->result = $this->dbQuery($this->query);
		
		$this->num = $this->dbNumRows($this->result);

		if($this->num == 0)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
			
	}
	
	public function addUserToDb($username, $password, $mail, $activationKey, $userStatus, $registerDate, $team_name, $game_type, $game_status, $serwer_ip)
	{
		$this->query = "INSERT INTO user (user_name, user_password, user_mail, user_acc_status, user_activation_key, user_register_date, user_team_name, user_team_game, user_team_status, user_serwer_ip)
						VALUES ('$username', '$password', '$mail', $userStatus, '$activationKey', '$registerDate', '$team_name', '$game_type', '$game_status', '$serwer_ip')";
						
		$this->dbQuery($this->query);
	}
}
?>