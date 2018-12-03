-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2018 at 01:22 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('user', '13', 1542649294),
('user', '14', 1542651416),
('user', '15', 1542652182),
('user', '16', 1542655312),
('user', '17', 1542729295),
('user', '18', 1542729380),
('user', '19', 1542730003),
('user', '20', 1542731492),
('user', '21', 1542807257),
('user', '22', 1542808215),
('user', '23', 1542823953),
('user', '24', 1543251067),
('user', '25', 1543259296),
('user', '26', 1543260600),
('user', '27', 1543260627),
('user', '28', 1543416116),
('user', '29', 1543422361),
('user', '30', 1543424982),
('user', '31', 1543425070),
('user', '32', 1543425165),
('user', '33', 1543426335),
('user', '34', 1543427664),
('user', '35', 1543427778),
('user', '36', 1543427856),
('user', '37', 1543593560),
('user', '38', 1543608013),
('user', '39', 1543608894),
('user', '40', 1543609065),
('user', '41', 1543609433),
('user', '42', 1543842858),
('user', '43', 1543843198);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1542047394, 1542047394),
('createComment', 2, 'Create comment', NULL, NULL, 1542047394, 1542047394),
('createEvent', 2, 'Create event', NULL, NULL, 1542047394, 1542047394),
('createPost', 2, 'Create post', NULL, NULL, 1542047394, 1542047394),
('deleteEvent', 2, 'Delete own event', NULL, NULL, 1542047394, 1542047394),
('deleteOwnComment', 2, 'Delete own comment', NULL, NULL, 1542047394, 1542047394),
('deletePost', 2, 'Delete own post', NULL, NULL, 1542047394, 1542047394),
('readComment', 2, 'Read comment', NULL, NULL, 1542047394, 1542047394),
('readEvent', 2, 'Read event', NULL, NULL, 1542047394, 1542047394),
('readPost', 2, 'Read post', NULL, NULL, 1542047394, 1542047394),
('updateEvent', 2, 'Update own event', NULL, NULL, 1542047394, 1542047394),
('updateOwnPost', 2, 'Update own comment', NULL, NULL, 1542047394, 1542047394),
('updatePost', 2, 'Update own post', NULL, NULL, 1542047394, 1542047394),
('user', 1, NULL, NULL, NULL, 1542047394, 1542047394);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('user', 'createComment'),
('user', 'createEvent'),
('user', 'createPost'),
('user', 'deleteEvent'),
('user', 'deleteOwnComment'),
('user', 'deletePost'),
('user', 'readComment'),
('user', 'readPost'),
('user', 'updateEvent'),
('user', 'updateOwnPost'),
('user', 'updatePost');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `tag` varchar(70) NOT NULL,
  `create_time` datetime NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  `post_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `begin_date`, `end_date`, `description`, `user_id`, `team_id`) VALUES
(4, 'Good Nightttt', '2018-03-04 10:03:00', '2018-03-04 12:12:00', 'gdfvxdvvfddd', 22, NULL),
(5, 'Evento da vida', '2018-11-21 00:11:00', '2018-11-21 00:12:00', 'Tuamaehvukgb', 22, NULL),
(6, 'Festa', '2018-11-04 10:11:00', '2018-11-10 03:11:00', 'Festas', 22, NULL),
(7, 'lsamlasksmklsmklmslaml', '2018-11-26 09:11:00', '2018-11-26 01:11:00', 'mdsamdmkskmsas', 26, NULL),
(8, 'sadasasadasd', '2018-11-28 05:11:00', '2018-11-28 07:11:00', 'dasadsaasdads', 28, NULL),
(9, 'mdsklamld', '2018-11-28 09:11:00', '2018-11-28 09:11:00', 'lkasldnsakdlsmakl', 29, NULL),
(10, 'smadlmalmsdlamld', '2018-11-28 05:11:00', '2018-11-28 15:11:00', 'fknejosfnsifdf', 28, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1540993851),
('m140506_102106_rbac_init', 1542047208),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1542047208),
('m181112_181648_init_rbac', 1542047394);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `tag` varchar(70) NOT NULL,
  `create_time` datetime NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teamprofile`
--

DROP TABLE IF EXISTS `teamprofile`;
CREATE TABLE IF NOT EXISTS `teamprofile` (
  `id` int(10) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `members` varchar(1200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(22, 'teupai', 'tuCZQFyPI0gEAE2Qt833r_iFxe2G5YV-', '$2y$13$.G3Auy10/jGeuoOhwG6HJOfiVgDy0vAV5isb0sl3CtrWtbiPsbaB2', NULL, 'teupai@tudoputa.com', 10, 1542808215, 1542808215),
(23, 'digooalpendre', 'oKCZQa9_AsxGh2jBDA8HXFFL7odRnrkR', '$2y$13$00Mq.NVsO7cuLNDOMUnQBOKgAKVbiE.YmNJOo3fdf3wU4W/JVtcqK', NULL, 'diogoalpendre@gmail.com', 10, 1542823953, 1542823953),
(24, 'utilizador', 'N3DI_XRbobnuaJYafNwNr2afERItezHb', '$2y$13$pn3JL7ah2RCPHMBbG6pQaOJxaARFHh2gooAy0Iia1mRgxP0y/zxtG', NULL, 'utilizador1999@gmail.com', 10, 1543251067, 1543251067),
(25, 'user1234', '3Knz4j7-LsZ-gXhJ2GFbZSjeXzHAd7EZ', '$2y$13$TU.YUASAOLTxIDZ4yMOkYOt7Tt9caeHEBfY6Jd.9/xdSi33ZaPXPm', NULL, 'diedkids@fm.com', 10, 1543259296, 1543259296),
(26, 'teste1234', 'aMf4PwEIYBeJGOROaHTNx_7cM_VLFSLh', '$2y$13$MkD268AOmV22Y1A4AEeR2.YLD/ucVun1S90sT07PWtw.9IvXPgOkS', NULL, 'sdfidvn@fksdfkf.com', 10, 1543260600, 1543260600),
(27, 'teste12345', 'x02zlXdyHZTIB1qnL8FdTYwWO8-ncPyg', '$2y$13$3cs.Cxa0.UwdztrZ5VsMLOh751sYG7uHqoLYYaGZ4HzrDGtZt5PO6', NULL, 'mklansldmka@fmklsdfm.com', 10, 1543260627, 1543260627),
(28, 'testemaisum', 'ueW1kArqKy-cVVKexH9gQD8UE_MilqBB', '$2y$13$1AKHWxf0Ib.JlfWYdnCoCOrtbLtt/dp.cBFK9jqekFWYjBPmVUfdW', NULL, 'lkfsdfmsdof@sdvonfd.com', 10, 1543416115, 1543416115),
(29, 'dalpendre123456789', 'EtuELMx77VSXwLnXjdp3PD9xGTynmqEE', '$2y$13$LnIXuywauGQyRAiHVrc0fubz4KjI7k9/Pi0.ukE9TSx2AJX6XLn6q', NULL, 'dasdasmda@dksldsa.com', 10, 1543422361, 1543422361),
(30, 'team1234', 'q35Jm8YnayCc9eO31LVamwaOe9KBKi1e', '$2y$13$0zZ5.xPh6y0gjXojWW0j9elNN9.KFlukzT4SP.sbEE3.Rjl7/zpAm', NULL, 'mldsad@dsds.com', 10, 1543424982, 1543424982),
(31, 'newteam', 'SYjAHmXw0RzsC0atFNu-fD1um_Wsgudn', '$2y$13$EXTIgGDBmRdRHunbNKMPZ.ClhZjfFGqlG7rDJDA7/VQabzscvjz4K', NULL, 'klndaskd@slkmdld.com', 10, 1543425070, 1543425070),
(32, 'novaequipa', 'qeGJ06e_DVfsBYVhDyB1KeDNOwBfR6j5', '$2y$13$vALVyHvg8FrHMfxGBEBDKOm9PukD2Tg.Xr8NYAgDP0f.pUnKquxgm', NULL, 'mdasdads@gmail.com', 10, 1543425165, 1543425165),
(33, 'solouser', 'km-vzqtBb2Xn5pqJdon6o9TvJecYIICJ', '$2y$13$Ft4xFmeyvshbRJYTsIwHcOt3KR2sg898kczwIEAxjuIZv9V5/Ep6u', NULL, 'dnasdsm@kmslda.com', 10, 1543426335, 1543426335),
(34, 'solouserteste', 'wZ27bcZjWrEtvA7E_gM5gsfzC6dr6Tuq', '$2y$13$RAyf2CPpoJCqQtlk0Yu/9eFoIG1s5WhLEbNEy.C2n9AEfUJDe5d.S', NULL, 'dksldf@dsds.com', 10, 1543427664, 1543427664),
(35, 'teamuserteste', 'jSWTTXSCna-QWEm_LFvAp4QYXUWO3sjh', '$2y$13$kkVQtEdnbF9ZQhCR9BKSlOjXOqd4K/jUi1rkLfCbqxQfHYD65tD0W', NULL, 'dkasd@das.com', 10, 1543427778, 1543427778),
(36, 'teamuser', '0tZr0HHtnoaEVTa0MmfS_yqbSicPYakY', '$2y$13$KrVs00NkAB4EKB5jHliiguA6oVNJSL0QxskaVhDHvq8hz4JyqqmGm', NULL, 'sads@fdsc.com', 10, 1543427856, 1543427856),
(37, 'solouser1234', 'afAg3WzYUy3ZprcvEh5p8ltHbjWgUY35', '$2y$13$H0daGV1UdGYzpPp1SBh80eAWpXFBAXroSth9k3zJYclmwkLzmGuN.', NULL, 'ldksadl@lkasmdl.com', 10, 1543593560, 1543593560),
(38, 'solouser1999', 'NWArch_D_3KA43j1uli9arGojw5eoXux', '$2y$13$8P0oSUMqEokvEMe8JiGiee05FePcgzt6aYhRQi9r4hW98wOBYj2dK', NULL, 'kfmslfdml@fkdsf.com', 10, 1543608013, 1543608013),
(39, 'teamuser1999', 'J_-yCe5aXhVGN8YTuZhGLAdLqCbZTN1s', '$2y$13$KXV4T2ZzkHYKq/QdGSFkH.oiKY.yyg3yD55wdL/58XIQrjOpBoCy6', NULL, 'dalpadasd2@dsds.com', 10, 1543608894, 1543608894),
(40, 'solouser2000', 'sB40Umx4wTRAjBYp1n-gUnWNmJXbZjbJ', '$2y$13$ZysTp1veHVvDSim/usFIE.zjMSUfZeKx1DwqsJhJKXJqXTLdOsW/.', NULL, 'nsadlajkd@fskd.xsds', 10, 1543609065, 1543609065),
(41, 'solouser12345', 'aeRGSQlsi__A5YmJhnTkGlRo_dRYD8_s', '$2y$13$dvDYOh8uiV8UtnS4M4kFkulFTcZHH79ehXJJ8drZApLH.G/XS5hkO', NULL, 'dfmkljsdf@ksmdskd.com', 10, 1543609433, 1543609433),
(42, 'daniel123456789', 'c7uy2NdDguiCqtIPQedsBAD_WaXl9W2V', '$2y$13$yTMr4ciC/6QFrQsgvKfw/.NnrVWbEA8VKoo8xSEFxdZMZufwJV4my', NULL, 'pdmapmdkls@dmklsdma.com', 10, 1543842858, 1543842858),
(43, 'dontstopmenow', '4IhKDiLyjcUkxwsd9PJQ3WZRMu6tR8WP', '$2y$13$T1f.zLGJ6/vU0xaQKqTa6emJUCCGqTaO80kiKjynASxUvNmOJn6q6', NULL, 'dontsecjfdljklcdkjm@kjerhfk.cojri', 10, 1543843198, 1543843198);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `firstname`, `surnames`, `birthdate`, `sex`, `user_id`, `team_id`) VALUES
(42, 'skmasdklm', 'saçsdkalmsdka', '2018-12-11', '0', 42, NULL),
(43, 'jkjgjhgukgk', 'lhkhohkhukhkh', '2018-12-05', 'M', 43, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_6` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_5` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`);

--
-- Constraints for table `teamprofile`
--
ALTER TABLE `teamprofile`
  ADD CONSTRAINT `teamprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `userprofile_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
