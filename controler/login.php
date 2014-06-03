<?php
	


	
	if (isset($_GET['action'])) //sprawdzanie czy istnieje zmienna action, ktora odpowiada za podstrony podstron id->action
	{	
		$objSmarty->assign('bodyaction',Router::getViewAction()); 
		include(Router::getControlerAction());
		
		
	}
	
	if (isset($_POST['login'])) //po nacisnieciu przycisku tworzony jest nowy obiekt klasy login
	{
		$login = new Login($_POST['username'], $_POST['pass']);
		
		if($login->checkEmpty($_POST['username'], $_POST['pass'])) //sprawdzanie czy nie sa uste pola
		{
			/*$password = $login->codePass($username, $password);*/
						
			if($login->checkUserPass()) //sprawdzanie loginu i hasła
			{
				if($login->checkUserAccStatus()) //sprawdzanie statusu konta
				{
				
					$_SESSION['isLogin'] = true;
					header('Location: '.PAGE.'/news');

					
				} else {
					$objSmarty->assign('message', Debug::getMessage('Twoje konto nie zostało aktywowane!', 1)); //1 - blad, 0 - nie	
				}
			} else {
				$objSmarty->assign('message', Debug::getMessage('Wpisałeś złe hasło lub zły nick!', 1)); //1 - blad, 0 - nie
			}
			
		} else {
			$objSmarty->assign('message', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie	
		}
	}
	
	if(isset($_SESSION['isLogin']))
	{
		header('Location: '.PAGE.'/news');
	}

	


class Login
{	
	public $username;
	public $password;
	
	public function __construct($username, $password)
	{										
		require_once('./model/login.php');	
		$this->modelLogin = new modelLogin();
		
		$this->username = $this->filterPass($username);
		$this->password = $this->filterPass($password);
		
		$this->password = $this->codePass($this->username, $this->password);
		
		
	}
	
	
	public function checkEmpty($username, $password)
	{
		if(!empty($username) AND !empty($password))
		{
			return True;
			
		} else {
			return False;	
		}
		
	}
	
	
	public function codePass($username, $password)
	{	
		$salt = '6de9gt5dse2ki';
		
		return sha1(md5($password . $salt . $username));	
	}
	
	public function filterPass($var)
	{
		return strip_tags(mysql_real_escape_string($var));
	}
	
	public function checkUserPass()
	{	
		
		
		$this->getUserPass = $this->modelLogin->getUserPass($this->username, $this->password);
		
		return $this->getUserPass;
	}
	
	public function checkUserAccStatus()
	{
		$this->userAccStatus = $this->modelLogin->getUserAccStatus($this->username);
		if($this->userAccStatus != 4)
		{
			return true;
		} else {
			return false;	
		}
	}
	
}
?>