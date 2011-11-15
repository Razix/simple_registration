-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 08 2011 г., 12:40
-- Версия сервера: 5.5.14
-- Версия PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `study`
--

-- --------------------------------------------------------

--
-- Структура таблицы `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access_level` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=74 ;

--
-- Дамп данных таблицы `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'adminko', '4c79451b7303d65d78a93aa0d17ae8e0', 'boss'),
(68, 'firstone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(69, 'second', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(70, 'thirdone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(71, 'fourth', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(72, 'fifthone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(73, 'onemore', '4c79451b7303d65d78a93aa0d17ae8e0', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
