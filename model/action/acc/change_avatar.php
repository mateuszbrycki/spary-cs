<?php

require_once('./class/class.db.php');

class modelChangeAvatar extends Database
{
	public function modelDoChangeAvatar($user_id, $link)
	{
		$this->query = "UPDATE user SET
						user_avatar = '$link'
						WHERE user_id = '$user_id'";
		$this->dbQuery($this->query);	
	}
}

?>