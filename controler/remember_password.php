<?php

	if(isset($_POST['remebmer_password']))
	{
		$rememberPassword = new rememberPassword($_POST['user_login'], $_POST['user_mail']); 
		
		if($rememberPassword->checkEmpty($_POST['user_login'], $_POST['user_mail']))
		{
			if($rememberPassword->checkMail())
			{
				$rememberPassword->changePassword();
				//$rememberPassword->sendMessage();
				
				$objSmarty->assign('message', Debug::getMessage('Na Twój adres e-mail zostało wysłane nowe hasło.', 0));
			} else {
				$objSmarty->assign('message', Debug::getMessage('Jedna z podanych danych jest nieprawidłowa!', 1)); //1 - blad, 0 - nie
			}
		} else {
			$objSmarty->assign('message', Debug::getMessage('Wypelnij wszystkie pola!', 1)); //1 - blad, 0 - nie
		}
	}
	

class rememberPassword
{
	public function __construct($user_login, $user_mail)
	{
		require_once('./model/remember_password.php');	
		$this->modelRememberPassword = new modelRememberPassword();
		
		$this->user_name = $user_login;
		$this->user_mail = $user_mail;
		
		$this->password_random = $this->randomPassword();
		$this->password = $this->codePass($this->user_name, $this->password_random);
	}
	
	public function checkEmpty($user_name, $mail)
	{
		if(!empty($user_name) AND !empty($mail))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function checkMail()
	{
		$this->user_check_mail = $this->getMail();
		
		if($this->user_check_mail == $this->user_mail)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function getMail()
	{
		return $this->modelRememberPassword->modelGetMail($this->user_name);	
	}
	
	public function randomPassword($chars = 8) {
		$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		return substr(str_shuffle($letters), 0, $chars);
	}
	
	public function codePass($username, $password)
	{	
		$salt = '6de9gt5dse2ki';
		
		return sha1(md5($password . $salt . $username));	
	}
	
	public function changePassword()
	{
		$this->modelRememberPassword->modelChangePassword($this->password, $this->user_name);	
	}
	
	public function sendMessage()
	{
		$temat = 'Przypomnienie hasła:' . $board_config['server_mail'];
											
		$tresc = 'Twoje stare hasło został zmienione na: <br><b> ' .$this->password_random . '</b><br> Po otrzymaniu tej wiadomości bezzwłocznie zaloguj się na swoje konto i zmień hasło aby zapobiec włamaniu!<br />';

		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: spary-cs.pl' . "\r\n";
		
		$mail = mail($this->user_mail, $temat, $tresc, $headers);
	}
}

?>