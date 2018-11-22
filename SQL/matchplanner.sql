-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 12:55 PM
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
('user', '23', 1542823953);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `begin_date`, `end_date`, `description`, `user_id`, `team_id`) VALUES
(4, 'Good Nightttt', '2018-03-04 10:03:00', '2018-03-04 12:12:00', 'gdfvxdvvfddd', 22, NULL),
(5, 'Evento da vida', '2018-11-21 00:11:00', '2018-11-21 00:12:00', 'Tuamaehvukgb', 22, NULL),
(6, 'Festa', '2018-11-04 10:11:00', '2018-11-10 03:11:00', 'Festas', 22, NULL);

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

--
-- Dumping data for table `teamprofile`
--

INSERT INTO `teamprofile` (`id`, `team_name`, `members`, `user_id`) VALUES
(22, 'Your MOM', 'Tua prima,tua mae', 22);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(13, 'diogo', 'aSdJ0XhN7chi3q5L12lfq7Ze3_E5cwmM', '$2y$13$KAYZf30LxEKyrFCqGUlL7uCLXNwr7dEUbXIvlx301NS0rPRFxZEli', NULL, 'diogo@gmail.com', 10, 1542649294, 1542649294),
(14, 'daniel1234', '4_2pxjWvTGShBR3pwKgUlPd44H0BYNBl', '$2y$13$h9DA8AvnEfVOMR8CkFV/.eOwPj5Gcb3oSt93q1ABBWW3noho0RQqi', NULL, 'daniel@gmail.com', 10, 1542651416, 1542651416),
(15, 'diogoalpendre', 'XgaT9CR31eq-gwleNs8Ch9T3LXhwgrGp', '$2y$13$uCooeibmIUamvWu5Ybb9H.MxFMHbn.HpFjqQSod7WmJhG1VN0k7Ou', NULL, 'dijkjhkjhkogo@gmail.com', 10, 1542652182, 1542652182),
(16, 'daniel12345', 'EvXzTSVq7JyCOy3k3O0qxl6UGkSA2Gd_', '$2y$13$ybKOOEDAvzBiY8I.MuUey.Ox.TbAPER/p3f5C6CzITZPXaM1YK6K2', NULL, 'daniel12345@gmail.com', 10, 1542655310, 1542655310),
(17, 'YIIIIII', '_zJe5uusIfuNFNAbov-yDxlSMOBhvYR1', '$2y$13$6YKmu7fX4mV.SICitteA3e3UVVm5n82g1f2r34tsQvjX4vGCjnqZ2', NULL, 'yiiiiiiiiiiiiii@gmaim.com', 10, 1542729295, 1542729295),
(18, 'dalpendre', 'wm5GgyJbChEJHBkWTmV9YzeRteZGNu7D', '$2y$13$UDkN6YE4nKma4GRUDp5FQuk51.FxbUQ35f2mD3ahpwe0hV3zedozq', NULL, 'dalpendre1999@gmail.com', 10, 1542729380, 1542729380),
(19, 'dalpendre1999', '5qgjj95TFXwbzBBdszUetbHMYiQT7wc0', '$2y$13$QRajxJ5UfMVRFvTSQSDmQeQOhVF2dk.k7RrrJ9zVOSX09ZDxCQ8pe', NULL, 'dalpendre19999@gmail.com', 10, 1542730003, 1542730003),
(20, 'tuamae', 'FyeKo1yeoamiGLzS7iJuP5e_Oa3dlZOo', '$2y$13$hjX1OjnGlBsYYUuySIDRk.6JRIYRYZXNDMA8Y2HrejmbOngBz/8rC', NULL, 'tuamae@tuamae.com', 10, 1542731492, 1542731492),
(21, 'tuaprima', 'mBAJr0vkrZk_Cea-vi94WOXv4HVEtMw-', '$2y$13$70FZFXucsp4ja4B8Vr/RFuKyG/qETJRWia4mkPTADaZx2JhT9GhoO', NULL, 'tuaprima@tuaprima.com', 10, 1542807257, 1542807257),
(22, 'teupai', 'tuCZQFyPI0gEAE2Qt833r_iFxe2G5YV-', '$2y$13$.G3Auy10/jGeuoOhwG6HJOfiVgDy0vAV5isb0sl3CtrWtbiPsbaB2', NULL, 'teupai@tudoputa.com', 10, 1542808215, 1542808215),
(23, 'digooalpendre', 'oKCZQa9_AsxGh2jBDA8HXFFL7odRnrkR', '$2y$13$00Mq.NVsO7cuLNDOMUnQBOKgAKVbiE.YmNJOo3fdf3wU4W/JVtcqK', NULL, 'diogoalpendre@gmail.com', 10, 1542823953, 1542823953);

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
  `sex` tinyint(1) NOT NULL,
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
(20, 'tua mae', 'de quarto', '2018-12-23', 1, 20, NULL),
(21, 'gfvcvvc', 'fdfd', '2018-12-23', 1, 21, NULL),
(22, 'Diogo', 'Alpendre', '1923-12-23', 1, 22, NULL);

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
