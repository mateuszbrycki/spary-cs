<?php


	if(isset($_POST['changePass'])) //sprawdzanie czy naciśnięto przycisk
	{
		$changePass = new changePass($_POST['old_pass'], $_POST['new_pass'], $_POST['new_pass_repeat']);
		
		if($changePass->checkEmpty($_POST['old_pass'], $_POST['new_pass'], $_POST['new_pass_repeat'])) //sprawdzanie pustych pól
		{
			if($changePass->checkOldPass()) //sprawdzanie czy podane stare haslo jest poprawne
			{
				if($changePass->checkNewPass()) //sprawdzenie powtórzenia hasła
				{
					$changePass->changePass();
					$objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie zmieniono hasło!', 0)); //1 - blad, 0 - nie
				} else {
					$objSmarty->assign('actionMessage', Debug::getMessage('Powtórzone hasło nie jest prawidłowe!', 1)); //1 - blad, 0 - nie
				}
			} else {
				$objSmarty->assign('actionMessage', Debug::getMessage('Stare hasło nie jest prawidłowe!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
	}
class changePass
{
	public function __construct($old_pass, $new_pass, $new_pass_repeat)
	{
		require_once('./model/action/acc/change_pass.php');	
		$this->modelChangePass = new modelChangePass;
		
		$this->old_pass = $old_pass;
		$this->new_pass = $new_pass;
		$this->new_pass_repeat = $new_pass_repeat;
		
		$this->user_id = $_SESSION['userId'];
	}
	
	public function checkEmpty($old_pass, $new_pass, $new_pass_repeat)
	{
		if(!empty($old_pass) AND !empty($new_pass) AND !empty($new_pass_repeat))
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function getUserName() 
	{
		return $this->modelChangePass->modelGetUserName($this->user_id);
	}
	
	public function getOldPass()
	{
		return $this->modelChangePass->modelGetOldPass($this->user_id);	
	}
	public function checkOldPass() 
	{
		$this->old_pass_2 = $this->getOldPass();
		$this->user_name = $this->getUserName();
		
		
		$this->old_pass = $this->codePass($this->old_pass, $this->user_name);
		
		if($this->old_pass == $this->old_pass_2)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
		
	}
	
	public function codePass($password, $username) 
	{
		$salt = '6de9gt5dse2ki';
		return sha1(md5($password . $salt . $username));	
	}
	
	public function checkNewPass() 
	{
		if($this->new_pass == $this->new_pass_repeat)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function changePass() 
	{
		$this->new_pass = $this->codePass($this->new_pass, $this->user_name);
		$this->modelChangePass->changePass($this->new_pass, $this->user_id);
	}
}
?>