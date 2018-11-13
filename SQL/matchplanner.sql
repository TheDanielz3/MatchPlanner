-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2018 at 02:18 PM
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
('user', '10', 1542059104),
('user', '11', 1542059149),
('user', '12', 1542059350),
('user', '13', 1542060380),
('user', '8', 1542047429),
('user', '9', 1542058328);

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `tag` varchar(70) NOT NULL,
  `create_time` datetime NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  `post_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`),
  KEY `event_id` (`event_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `tag`, `create_time`, `user_id`, `team_id`, `post_id`, `event_id`) VALUES
(1, 'Diogo', 'asAS', '2018-10-30 00:00:00', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `begin_date`, `end_date`, `description`, `user_id`, `team_id`) VALUES
(1, 'Jogo SCP- SLB', '2018-10-30 12:12:00', '2018-10-30 14:12:00', 'dERBI DA ANO', NULL, NULL),
(2, 'Outro', '2012-03-12 00:00:00', '2012-03-14 00:00:00', 'oUTRO EVENTO', NULL, NULL);

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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `tag` varchar(70) NOT NULL,
  `create_time` datetime NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `tag`, `create_time`, `user_id`, `team_id`, `event_id`) VALUES
(1, 'Verdades da vida', 'Verdades', '#everdade', '2018-10-30 00:00:00', 1, NULL, 1),
(2, 'Outro post', 'Post', '#scp', '2018-10-30 00:00:00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamprofiles`
--

DROP TABLE IF EXISTS `teamprofiles`;
CREATE TABLE IF NOT EXISTS `teamprofiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `members` varchar(1200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamprofiles`
--

INSERT INTO `teamprofiles` (`id`, `team_name`, `members`) VALUES
(2, 'Strilex', 'Daniel Batista, Diogo Alpendre');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'teste12345', 'e0rsb2Fl2gUqGjH42gVopviGzqB_GgQt', '$2y$13$Xx3tyRmpPzRFnvGPQsmwBOC1kaVxu0dcoim/H0K6XbIaOvnNEvnky', NULL, 'slkdsfljfn@kfnslk.com', 10, 1541517652, 1541517652),
(2, 'equipatop', 'koYgUN93EaudE2zgP99ay_GKLrZVMA72', '$2y$13$tULE70X/JmINXM4btGCuvuTkpX1QjKAfGP8epnsr15pAuh1U32kHG', NULL, 'equipatop@gmail.com', 10, 1542042277, 1542042277),
(3, 'sdadsd', 'nhzK3tObIoy3icyDLbRHsWfrCGEQO82S', '$2y$13$KRUYtNZmDYvSFzS6KN8APenTdoLvC0XZBTct2/dx8lmVzeaBWYgr2', NULL, 'sasdasd@gmail.com', 10, 1542042294, 1542042294),
(4, 'dalpendre', 'n5h7AA2oTjwDLNxkyVWAM3V8fg4rfENG', '$2y$13$pAalu9stWbDZ4C7IOk.5d.GGOjlOrI/xghgfraCoa8qPLKBfDwYnK', NULL, 'dalpendre1999@gmail.com', 10, 1542042382, 1542042382),
(5, 'pantera', 'ax34pI2PpjwYEKjzGE8nLMAuH8ZWTPX2', '$2y$13$PHZsstpDt7pzVSHqhIFe4uQYL9rCpBs8PR.9aaCjJYAAAZq9wXGW.', NULL, 'pantera@gmail.com', 10, 1542042576, 1542042576),
(6, 'diogoalpendre1999', 'SySHa-xmxFjrIDy4qRAbXIXgBdA79E2h', '$2y$13$PLBlpqKpcLoy4loM9JKC0OLfkgVy.h4ZnnmJAiLrIcPQU57LuxutO', NULL, 'guy@gmail.com', 10, 1542043728, 1542043728),
(7, 'megadeth', '7pe8IE5yYD-RS2RYdAPsrURmWGmxTIcF', '$2y$13$u0Idv14vV9.8qskZA.Av/.XlfJ1tPBFZxAdI4aJnBlT4gb8ptYtku', NULL, 'megadeth1999@gmail.com', 10, 1542043939, 1542043939),
(8, 'daniel1999', 'C7zrFCYlKvkiKahlD1zFgpX_0YwRfcJV', '$2y$13$1nieTRfOirqJJz8ZSz0M3uDxOFjdnQaGYbbwWv1Q9IxzKAQASlwW.', NULL, 'daniel1234@gmail.com', 10, 1542047429, 1542047429),
(9, 'utilizador', 'h6lLOgDyVkhfnaN409d6cb2VpvFOugDV', '$2y$13$NULWXQBsSUfSVkmHoAzeLOtp.f06vjngPgj0o4Mcb1X3hlVJYLULe', NULL, 'utilizador@gmail.com', 10, 1542058328, 1542058328),
(10, 'utilizador1999', 'z9JHOXj8besZT4s06bcd3y1Q9YwIBKAn', '$2y$13$EKQ9lK5k8.16H1Ya7fHkkusC0G.3Uk0AaOIy4wA5L0rPO2Kxo1F6.', NULL, 'utilizador1999@gmail.com', 10, 1542059104, 1542059104),
(11, 'dalpendre12345', 'P8eZmkzjDC22avGJ6YJbQyWxRn3Z0JRz', '$2y$13$E21P65KY74ILqLHsJMwB8uroiZyLzWYVZ6nQjjeWSF8CpZdyvGepC', NULL, 'dalpendre12345@gmail.com', 10, 1542059149, 1542059149),
(12, 'diogo1999', 'jG60alZh9JK1F1e7NPT6PpalZhMHDqH2', '$2y$13$qN9X7VKPjng3OGVMGNemweaOOXfYgdhcfv/1hVnUQyLL3wvPAWdwm', NULL, 'diogo1999@gmail.com', 10, 1542059350, 1542059350),
(13, 'utilizador2018', 'Y0JlWubl3R6T4vJ5lCxjGIn4WzcqLG5O', '$2y$13$09Y/ertraQoMC64u0VF4jeDNeY3yoI8vofmzPWiEgLTSYGC7aYYIu', NULL, 'utilizador2018@gmail.com', 10, 1542060380, 1542060380);

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

DROP TABLE IF EXISTS `userprofiles`;
CREATE TABLE IF NOT EXISTS `userprofiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `firstname`, `surnames`, `birthdate`, `sex`, `user_id`, `team_id`) VALUES
(1, 'Diogo', 'Alpendre', '1999-03-04', 1, 0, NULL),
(2, 'dpjsj', 'klsnmfnsdkjn', '2018-10-30', 1, 0, NULL),
(3, 'Diogo', 'Alpendre', '2018-03-04', 1, 0, NULL),
(4, 'Diogo', 'Alpendre', '1999-03-04', 1, 0, NULL);

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
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofiles` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teamprofiles` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofiles` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teamprofiles` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofiles` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teamprofiles` (`id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD CONSTRAINT `userprofiles_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teamprofiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
