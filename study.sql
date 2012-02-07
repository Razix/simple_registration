-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ����� ��������: ��� 05 2011 �., 16:26
-- ������ �������: 5.5.14
-- ������ PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ���� ������: `study`
--

-- --------------------------------------------------------

--
-- ��������� ������� `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- ��������� ������� `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- ��������� ������� `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access_level` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=76 ;

--
-- ���� ������ ������� `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'adminko', '4c79451b7303d65d78a93aa0d17ae8e0', 'boss'),
(68, 'firstone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(69, 'second', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(70, 'thirdone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(71, 'fourth', '4c79451b7303d65d78a93aa0d17ae8e0', NULL),
(72, 'fifthone', '4c79451b7303d65d78a93aa0d17ae8e0', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
