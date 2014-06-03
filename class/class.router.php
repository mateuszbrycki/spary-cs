<?php
/*
Klasa odpowiedzialna za routing podstron, tylko funkcje statyczne!
*/
class Router
{	
	public static function getView() //zwraca ścieżkę do widoku zmiennej z id, jeżeli nie istnieje taki  plik to włącza id news
	{
		if(isset($_GET['id']))
		{
			if(file_exists("./view/" . $_GET['id'] . ".tpl") )
			{
				return "./view/" . $_GET['id'] . ".tpl";
				
			} else {
				
				header('Location: '.PAGE.'/news');
				
			}
		}
		else 
		{
			header('Location: '.PAGE.'/news');
			
		}
	}
	
	public static function getControler() //zwraca ścieżkę do kontrolera zmiennej z id, jeżeli nie istnieje taki plik to włącza news.php
	{
		if(isset($_GET['id']))
		{
			if(file_exists("./controler/" . $_GET['id'] . ".php") )
			{
				return "./controler/" . $_GET['id'] . ".php";
				
			} else {
				return "./controler/news.php";
				
			}
		}
		else 
		{
			return "./controler/news.php";
			
		}
	}
	
	public static function getViewAction() //załącza widok podstrony wyświetlanej na podstawie zmiennej action, jeżeli plik nie istnieje to załącza  news
	{
		if(isset($_GET['action']))
		{
			if(file_exists("./view/action/" .$_GET['id'] ."/". $_GET['action'] . ".tpl") )
			{
				return "./view/action/" .$_GET['id'] ."/". $_GET['action'] . ".tpl";
				
			} else {
				
				header('Location: '.PAGE.'/news');
				
			}
		}
		else {
			header('Location: '.PAGE.'/news');
			
		}
	}
	
	public static function getControlerAction() //załącza widok podstrony wyświetlanej na podstawie zmiennej action, jeżeli plik nie istnieje to załącza  news.php
	{
		if(isset($_GET['action']))
		{
			if(file_exists("./controler/action/" .$_GET['id'] ."/". $_GET['action'] . ".php"))
			{
				return "./controler/action/" .$_GET['id'] ."/". $_GET['action'] . ".php";
				
			} else {
				return "./controler/news.php";
			}
		}
		else {
			
			return "./controler/news.php";
			
		}
	}
		
}
?>