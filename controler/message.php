<?php

	if(isset($_SESSION['isLogin'])) //sprawdzanie czy użytkownik jest zalogowany
	{
		if(isset($_GET['action'])) //sprawdzanie czy wybrano akcję
		{
			$objSmarty->assign('bodyaction',Router::getViewAction()); //generowanie podstrony na podstawie $_GET['action']
			include(Router::getControlerAction());
		} else {
			$objSmarty->assign('message', Debug::getMessage('Wybierz konkretną akcję!', 1)); //1 - blad, 0 - nie
		}
	} else {
		header('Location: '.PAGE.'/news');
	}

?>