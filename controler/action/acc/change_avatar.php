<?php


	if(isset($_POST['changeAvatar'])) //sprawdzanie czy naciśnięto przycisk
	{
		$changeAvatar = new changeAvatar($_POST['avatar_link']);
		$changeAvatar->doChangeAvatar();
		
		$objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie zmieniono avatar!', 0)); //1 - blad, 0 - nie
	}

class changeAvatar
{
	public function __construct($link)
	{
		require_once('./model/action/acc/change_avatar.php');	
		$this->modelChangeAvatar = new modelChangeAvatar;
		
		$this->user_id = $_SESSION['userId'];
		$this->link = $link;
	}
	
	public function doChangeAvatar()
	{
		$this->modelChangeAvatar->modelDoChangeAvatar($this->user_id, $this->link);	
	}
}
?>