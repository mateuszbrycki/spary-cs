<?php

	if(isset($_POST['changeMail'])) //sprawdzanie czy naciśnięto przycisk
	{
		$changeMail = new changeMail($_POST['old_mail'], $_POST['new_mail'], $_POST['new_mail_repeat']);
		
		if($changeMail->checkEmpty($_POST['old_mail'], $_POST['new_mail'], $_POST['new_mail_repeat']))
		{
			if($changeMail->checkOldMail()) //sprawdzanie poprawności starego adresu e-mail
			{
				if($changeMail->checkNewMails()) //sprawdzanie powtorzenia adresu
				{
					if($changeMail->validMail()) //sprawdzanie poprawności nowego maila
					{
						if($changeMail->checkNewMailStatus()) //sprawdzanie czy nowy mail jest już w bazie
						{
							$changeMail->changeMail(); //właściwa zmiana maila
							$objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie zmieniono adres e-mail!', 0)); //1 - blad, 0 - nie
						} else {
							$objSmarty->assign('actionMessage', Debug::getMessage('Podany adres e-mail jest już zajęty!', 1)); //1 - blad, 0 - nie
						}
					} else {
						$objSmarty->assign('actionMessage', Debug::getMessage('Niepoprawna forma nowego adresu e-mail!', 1)); //1 - blad, 0 - nie
					}
				} else {
					$objSmarty->assign('actionMessage', Debug::getMessage('Nowe adresy e-mail nie są jednakowe!', 1)); //1 - blad, 0 - nie
				}
			} else {
				$objSmarty->assign('actionMessage', Debug::getMessage('Stary mail nie jest poprawny!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('actionMessage', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
	}
	
class changeMail
{
	public function __construct($old_mail, $new_mail, $new_mail_repeat)
	{
		require_once('./model/action/acc/change_mail.php');	
		$this->modelChangeMail = new modelChangeMail;
		
		$this->old_mail = $this->filterPass($old_mail);
		$this->new_mail = $this->filterPass($new_mail);
		$this->new_mail_repeat = $this->filterPass($new_mail_repeat);	
		
		$this->user_id = $_SESSION['isLogin'];
		
	}
	
	public function validMail()
	{
		if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $this->new_mail)) {
  			return false;
 		} else {
 			return true;
		}
	}
	
	public function filterPass($var)
	{
		return strip_tags(mysql_real_escape_string($var));
	}
	
	public function checkEmpty($old_mail, $new_mail, $new_mail_repeat)
	{
		if(!empty($old_mail) AND !empty($new_mail) AND !empty($new_mail_repeat))
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function checkOldMail()
	{
		if($this->modelChangeMail->getOldMail($this->user_id) == $this->old_mail)
		{
			return TRUE;	
		} else {
			return FALSE;
		}
	}
	
	public function checkNewMails() 
	{
		if($this->new_mail == $this->new_mail_repeat)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function checkNewMailStatus()
	{
		return $this->modelChangeMail->getNewMailStatus($this->new_mail);	
	}
	
	public function changeMail()
	{
		$this->modelChangeMail->doChangeMail($this->new_mail, $this->user_id);	
	}
	
}

?>