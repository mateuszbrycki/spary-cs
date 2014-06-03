<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="{$page}/style/style.css" />	
<link rel="stylesheet" href="{$page}/style/calendar.css" type="text/css" >
<link rel="stylesheet" href="{$page}/style/suggest_box.css" type="text/css" >
<link rel="stylesheet" href="{$page}/style/style_menu.css" type="text/css" >
<script language="JavaScript" type="text/javascript" src="{$page}/scripts/jquery.js"></script>
<script language="JavaScript"  type="text/javascript" src="{$page}/scripts/suggest_box.js"></script>
<script language="JavaScript"  type="text/javascript" src="{$page}/scripts/calendar_eu.js"></script>
<script language="JavaScript"  type="text/javascript" src="{$page}/scripts/menu.js"></script>



<title>{$title}</title>
</head>
<body>
	
    	{include file='./include/logo.tpl'}
    
    
    <div id='menu'>
    
    	{if $isLogin == true}
        	{include file='./include/menu.tpl'}
        {else}
         	{include file='./include/menu_2.tpl'}
        {/if}
        <div id='date'>
        <p>Dziś jest 03-08-2011 09:03</p>
        </div>

    </div>
    
    <div id='news'>
    	{include file=$body}
			
    </div>
    
    <div id='footer'>
    	<p align='center'>
        	Copyright © 2010-2011 <a href='http://{$page}'>{$page}</a> korzystanie z serwisu oznacza akceptację <a href='http://{$page}/regulamin'>regulaminu</a><br />
        	Czas jaki zajelo wygenerowanie strony: {$parase} sekund
      	</p>
    </div>
</body>
</html>