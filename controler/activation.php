<?php

	if(isset($_GET['nick']) AND isset($_GET['key']))
	{
		$activation = new Activation;
		
		if($activation->checkNickAndKey()) //sprawdzenie nicku i key'a
		{
			$activation->changeUserAccStatus(); 

			$objSmarty->assign('message', Debug::getMessage("Poprawnie aktywowano konto! Teraz możesz się zalogować. Po zalogowaniu zmień dodatkowe opcje profilu w zakładce Konto -> Zmiana innych danych!<br /> <a href='http://localhost/spary_new/login'>Logowanie</a>", 0)); //1 - blad, 0 - nie
		} else {
			$objSmarty->assign('message', Debug::getMessage('Błędne dane w linku aktywacyjnym!', 1)); //1 - blad, 0 - nie	
		}
	} else {
		$objSmarty->assign('message', Debug::getMessage('Niepoprawny link aktywacyjny!', 1)); //1 - blad, 0 - nie	
	}
	

	class Activation 
	{
		
		public function __construct() 
		{
			require_once('./model/activation.php');	
			$this->modelActivation = new modelActivation();	
			
			$this->username = $_GET['nick'];
			$this->key = $_GET['key'];
		}
		
		public function checkNickAndKey()
		{
			return $this->modelActivation->getNickAndKey($this->username, $this->key);	
		}
		
		public function changeUserAccStatus()
		{
			$this->modelActivation->makeChangeUserAccStatus($this->username, $this->key);	
		}
	}

?>