<?php

	require_once('./model/register.php');
	
	if(isset($_POST['register']))
	{
		$register = new Register($_POST['username'], $_POST['pass'], $_POST['pass_2'], $_POST['mail'], $_POST['team_name'], $_POST['game_type'], $_POST['game_status'], $_POST['serwer_ip']);
		
		if($register->checkEmpty($_POST['username'], $_POST['pass'], $_POST['pass_2'], $_POST['mail'],  $_POST['team_name'], $_POST['serwer_ip']))
		{
			if($register->checkPass()) /* sprawdzanie czy powtórzone hasła są takie same*/
			{
				if($register->checkUserName()) /* sprawdzanie czy użytkownik o podanej nazwie istenieje*/
				{
					if($register->validMail()) //walidacja maila
					{
						if($register->checkUserMail()) //sprawdzanie czy dany mail jest już w bazie
						{
							if(!empty($_POST['regulamin'])) //sprawdzenie czy akceptowano regulamin
							{
								//$register->sendActivationMessage();
								$register->addUserToDb();
								
								$objSmarty->assign('message', Debug::getMessage('Rejestracja przebiegła poprawnie. Na Twoją skrzynkę została wysłana wiadomość aktywacyjna. Po aktywacji konta będziesz mógł korzystać z wszystkich funkcji serwisu.', 0)); //1 - blad, 0 - nie	
							} else {
								$objSmarty->assign('message', Debug::getMessage('Musisz akceptować regulamin', 1)); //1 - blad, 0 - nie	
							}
						} else {
							$objSmarty->assign('message', Debug::getMessage('Podany adres e-mail jest już używany!', 1)); //1 - blad, 0 - nie	
						}
					} else {
						$objSmarty->assign('message', Debug::getMessage('Błędny format adresu e-mail!', 1)); //1 - blad, 0 - nie
					}
				} else {
					$objSmarty->assign('message', Debug::getMessage('Użytkownik o podanej nazwie już istnieje! Wybierz inny.', 1)); //1 - blad, 0 - nie
				}
				
			} else {
				$objSmarty->assign('message', Debug::getMessage('Podane hasła nie są takie same!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('message', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie	
		}
	}
	
	class Register
	{
		
		function __construct($username, $password, $password_2, $mail, $team_name, $game_type, $game_status, $serwer_ip)
		{
			require_once('./model/register.php');	
			$this->modelRegister = new modelRegister();
			
			$this->username = $this->filterPass($username);
			$this->password = $this->filterPass($password);
			$this->password_2 = $this->filterPass($password_2);
			$this->mail = $this->filterPass($mail);
			$this->team_name = $this->filterPass($team_name);
			$this->game_type = $game_type;
			$this->game_status = $game_status;
			$this->serwer_ip = $this->filterPass($serwer_ip);
			
			$this->password = $this->codePass($this->username, $this->password);
			$this->password_2 = $this->codePass($this->username, $this->password_2);		
			
			$this->activationKey = $this->generateActivationKey();	
			$this->userStatus = 4;
			$this->registerDate = date('d-m-Y H:i', $_SERVER['REQUEST_TIME']);
		}
		
		public function checkEmpty($username, $password, $password_2, $mail, $team_name, $serwer_ip)
		{
			if(!empty($username) AND !empty($password) AND !empty($password_2) AND !empty($mail) AND !empty($team_name) AND !empty($serwer_ip))
			{
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public function checkPass()
		{
			if($this->password == $this->password_2)
			{
				return TRUE;	
			} else {
				return FALSE;	
			}
		}
		
		public function codePass($username, $password)
		{	
			$salt = '6de9gt5dse2ki';
		
			return sha1(md5($password . $salt . $username));	
		}
		
		public function validMail()
		{
			if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $this->mail)) {
  				return false;
 			} else {
 				return true;
			}
		}
		
		public function checkUserName()
		{
			return $this->modelRegister->getUserName($this->username);
		}
		
		public function checkUserMail()
		{
			return $this->modelRegister->getUserMail($this->mail);	
		}
		
		public function filterPass($var)
		{
			return strip_tags(mysql_real_escape_string($var));
		}
		
		public function generateActivationKey()
		{
			return str_shuffle('qwertyuiopasdfghjklzxcvbnm1234567890');
		}
		
		public function sendActivationMessage()
		{
			$temat = 'Aktywacja konta: spary-cs.pl';
											
			$tresc = 'Aby aktywować konto kliknij w poniższy link: <br />';
											
			$link =	"<a href=\"http://spary-cs.pl/activation/$this->username/$this->activationKey\">http://spary-cs.pl/activation/$this->username/$this->activationKey</a>";
													
											
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: spary-cs.pl' . "\r\n";

			$wiadomosc = "
						<b>E-mail:</b> $$this->mail<br />
						$tresc<br />
						$link	";
 
			$mail = mail($this->mail, $temat, $wiadomosc, $headers);
		}
		
		public function addUserToDb()
		{
			$this->modelRegister->addUserToDb($this->username, $this->password, $this->mail, $this->activationKey, $this->userStatus, $this->registerDate, $this->team_name, $this->game_type, $this->game_status, $this->serwer_ip);	
		}
		
	}
?>