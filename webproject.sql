-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 10:48 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends_requests`
--

CREATE TABLE `friends_requests` (
  `user_from` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_to` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `opened` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_requests`
--

INSERT INTO `friends_requests` (`user_from`, `user_to`, `opened`, `deleted`) VALUES
('dias', 'timkabor', 0, 0),
('dias', 'medet', 0, 0),
('timkabor', 'timkabar', 0, 0),
('artem', 'timkabar', 0, 0),
('sasha', 'timkabar', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_from` varchar(500) NOT NULL,
  `user_to` varchar(500) NOT NULL,
  `msg_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`user_from`, `user_to`, `msg_body`) VALUES
('timkabor', 'artem', 'ÐšÐ°Ðº Ñ‚Ð²Ð¾Ð¸ Ð´ÐµÐ»Ð° Ð±Ñ€Ð¾'),
('timkabar', 'medet', 'sdfds'),
('timkabar', '', 'fd'),
('timkabar', 'medet', 'fds'),
('timkabar', 'medet', ''),
('timkabar', 'medet', 'fsd'),
('timkabar', 'medet', 'fsfs'),
('timkabar', 'medet', 'fdsfs'),
('timkabar', 'medet', 'hi'),
('medet', 'timkabar', 'hi'),
('medet', 'timkabar', 'how aer yoi'),
('medet', 'timkabor', 'Slama'),
('timkabor', 'medet', 'Zdarova'),
('sasha', 'sasha', 'Kak ti?'),
('sasha', 'sasha', 'ÐºÐ°Ðº Ñ‚Ð²Ð¾Ð¸ Ð´ÐµÐ»Ð°'),
('sasha', 'sasha', 'Ð¿Ð°'),
('sasha', 'medet', 'kak ti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `surname` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `friends` text NOT NULL,
  `Avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `password`, `name`, `surname`, `friends`, `Avatar`) VALUES
('timkabor', 'qwerasdf', 'Timur', 'Borgalinov', 'a:0:{}', ''),
('gogol', 'qwerasdf', 'Gogol', 'Mogol', 'a:0:{}', ''),
('timkabar', 'qwerasdf', 'Timka', 'Bimka', 'a:2:{i:0;s:5:"medet";i:1;s:4:"dias";}', 'img/timkabar_image.jpg'),
('medet', 'qwerasdf', 'Medet', 'kozah', 'a:0:{}', 'img/medet_image.jpg'),
('dias', 'qwerasdf', 'Dias', 'Ibadildin', 'a:0:{}', 'img/dias_image.jpg'),
('artem', 'qwerasdf', 'artem', 'kiforuk', 'a:0:{}', 'img/artem_image.jpg'),
('sasha', 'qwerasdf', 'sasha', 'naumov', 'a:0:{}', 'img/sasha_image.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
