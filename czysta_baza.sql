-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 30 Gru 2010, 22:08
-- Wersja serwera: 5.0.91
-- Wersja PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `sparycs_spary`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `server` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `script` varchar(255) NOT NULL,
	`admin_mail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL auto_increment,
  `message_title` varchar(255) NOT NULL,
  `message_to` varchar(255) NOT NULL default '0',
  `message_from` varchar(255) NOT NULL,
  `message_text` text NOT NULL,
  `message_status` varchar(255) NOT NULL,
  `message_send_date` varchar(255) NOT NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


--
-- Struktura tabeli dla  `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `tytul` tinytext collate utf8_unicode_ci NOT NULL,
  `tresc` text collate utf8_unicode_ci NOT NULL,
  `data` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



--
-- Struktura tabeli dla  `spary`
--

CREATE TABLE IF NOT EXISTS `spary` (
  `spar_id` int(11) NOT NULL auto_increment,
  `spar_user_add` int(11) NOT NULL,
  `spar_user_connect` int(11) NOT NULL,
  `spar_date` varchar(255) NOT NULL,
  `spar_time` varchar(5) NOT NULL,
  `spar_game_type` int(5) NOT NULL,
  `spar_game_status` int(1) NOT NULL,
  `spar_serwer_ip` varchar(255) NOT NULL,
  `spar_players` varchar(255) NOT NULL,
  PRIMARY KEY  (`spar_id`),
  UNIQUE KEY `spar_id_2` (`spar_id`),
  KEY `spar_id` (`spar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



--
-- Struktura tabeli dla  `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_password` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `user_team_name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_team_status` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_mail` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_team_game` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_serwer_ip` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_activation_key` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_acc_status` int(1) NOT NULL,
  `user_register_date` varchar(20) character set utf8 collate utf8_polish_ci NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_team_map` varchar(255) NOT NULL,
  `user_team_players` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

