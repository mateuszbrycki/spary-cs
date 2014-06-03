<?php
	session_start();
	$start = microtime();
	
	require_once('./smarty/libs/Smarty.class.php');
	require_once('./class/class.router.php'); /* klasa odpowiedzialna za routing podstron */
	require_once('./class/class.debug.php');
	require_once('./functions.php'); /* funkcje używane w całym skrypcie */
	
	$objSmarty = new Smarty;
	$router = new Router;
	
	$objSmarty->template_c_dir = './templates_c/';
	$objSmarty->config_dir = './config/';
	$objSmarty->cache_dir = './cache/';
	$objSmarty->compile_dir = './templates/';

	
	
	$objSmarty->allow_php_tag = true;
	
	$page = getVar('page');
		
	$objSmarty->assign('page', getVar($page = 'page'));
	$objSmarty->assign('title', getVar($title = 'title'));
	$objSmarty->assign('autor', getVar($autor = 'autor'));
	
	
	$objSmarty->assign('body',Router::getView()); 
	include(Router::getControler());
	
	
	if(isset($_SESSION['isLogin']))
	{
		$isLogin = true;
	} else {
		$isLogin = false;
	}
	
	$objSmarty->assign('isLogin', $isLogin);
	
	
	$end = microtime();
	
	$parase = $end - $start;
	$objSmarty->assign('parase', $parase);
	$strTemplate = 'index.tpl';
	$objSmarty->display($strTemplate);
	
	
?>