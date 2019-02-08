-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2019 at 08:02 PM
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
('admin', '88', 1547040507),
('admin', '90', 1547494650),
('admin', '91', 1547552665),
('admin', '92', 1547552959),
('user', '100', 1548179102),
('user', '101', 1548180221),
('user', '102', 1548194232),
('user', '103', 1549133626),
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
('user', '43', 1543843198),
('user', '44', 1543844077),
('user', '45', 1543855163),
('user', '46', 1543855814),
('user', '47', 1544017027),
('user', '48', 1544377640),
('user', '49', 1544405520),
('user', '50', 1544465708),
('user', '51', 1544704008),
('user', '52', 1545054936),
('user', '53', 1545065057),
('user', '54', 1545065664),
('user', '55', 1545065873),
('user', '56', 1545071272),
('user', '57', 1545072130),
('user', '58', 1545072421),
('user', '59', 1545095206),
('user', '60', 1545145028),
('user', '61', 1545161211),
('user', '62', 1545161243),
('user', '63', 1545229021),
('user', '64', 1545684461),
('user', '65', 1545869019),
('user', '66', 1545989993),
('user', '67', 1546087770),
('user', '68', 1546090425),
('user', '69', 1546090567),
('user', '70', 1546178690),
('user', '71', 1546540728),
('user', '72', 1546728292),
('user', '73', 1546783682),
('user', '74', 1546784747),
('user', '75', 1546785023),
('user', '76', 1546856408),
('user', '77', 1546856919),
('user', '78', 1546858548),
('user', '79', 1546864805),
('user', '80', 1546882019),
('user', '81', 1546882338),
('user', '82', 1546882778),
('user', '83', 1546885428),
('user', '84', 1546888462),
('user', '85', 1546890569),
('user', '86', 1546894165),
('user', '87', 1546894331),
('user', '89', 1547211681),
('user', '93', 1547726887),
('user', '94', 1547727023),
('user', '95', 1548000508),
('user', '96', 1548096104),
('user', '97', 1548096756),
('user', '98', 1548097126),
('user', '99', 1548167021);

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
  KEY `user_id` (`user_id`),
  KEY `team_id` (`team_id`),
  KEY `comment_ibfk_4` (`post_id`),
  KEY `comment_ibfk_3` (`event_id`)
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
  KEY `event_ibfk_4` (`team_id`),
  KEY `event_ibfk_3` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `begin_date`, `end_date`, `description`, `user_id`, `team_id`) VALUES
(1, 'dsadk', '2019-01-24 18:30:00', '2019-01-04 11:30:00', 'sdad', NULL, 99);

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
  `image` varchar(200) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `team_id` int(10) DEFAULT NULL,
  `event_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_ibfk_3` (`event_id`),
  KEY `post_ibfk_5` (`team_id`),
  KEY `post_ibfk_4` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tag`, `create_time`, `image`, `user_id`, `team_id`, `event_id`) VALUES
(1, 'sda', 'sda', 'dasd', '2019-01-23 12:44:25', '', NULL, 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamprofile`
--

DROP TABLE IF EXISTS `teamprofile`;
CREATE TABLE IF NOT EXISTS `teamprofile` (
  `id` int(10) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `member1` varchar(100) NOT NULL,
  `member2` varchar(100) NOT NULL,
  `member3` varchar(100) NOT NULL,
  `member4` varchar(100) NOT NULL,
  `member5` varchar(100) NOT NULL,
  `member6` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teamprofile_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamprofile`
--

INSERT INTO `teamprofile` (`id`, `team_name`, `member1`, `member2`, `member3`, `member4`, `member5`, `member6`, `user_id`) VALUES
(99, 'Hello world Fixe', 'Fixe', 'd sma ', 'dsmad', 'sdam', 'smkad', 'dlsma', 99),
(100, 'fdssdfdfssdfdsffsddfsfdsfds', 'adssadsadsadsad', 'dsffdsfdsfsdsfd', 'sdsadsdadsasadads', 'sadsdsasadsadsd', 'ddsdsffsdsdffsdfdsfsdfds', 'dsffdsdfssdfdfsfsd', 100);

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
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(85, 'User20201', 'y0jPZ2tI8-T4QLrewDgiJr9vj9MUigf-', '$2y$13$VXhJINPXbb6CefnrfBg4AeMEw9sLHDVJ8A7UWx4C9Iv5FWvqSSFDe', NULL, 'djnsdandkas@msdadnsak.dskadk', 10, 1546890569, 1546890569),
(87, 'Utilizador2021', 'wLxhg08AzhbQGnzNyM_pEN5zlrpuWsOY', '$2y$13$YPl9quON.p8solIGp2Da/eaizACxt7zQlZYOEikS8GZPdK2bRon8O', NULL, 'djnsdandkas@msdadnsak.dskadkda', 10, 1546894331, 1546894331),
(89, 'Daniel', 'nT_iIH63MIEEJrNOifQBw_jQes9BXlmU', '$2y$13$/18E.Zeto388KmFO49ZYHeMkArQA2YRvuz6mEsh8yydZ1P2VsZeFu', NULL, 'ndhjsdbaj@fnjsdnj.fdknfs', 10, 1547211680, 1547211681),
(91, 'admin', 'ozx2sPiuoB6YpNcMkPe12oJ-pqeJ2pDs', '$2y$13$cLel5A8kbt6.CPwbLt6I9.BQtqhll2/fELakEMLBWh3Ebn2f1SRgG', NULL, 'admin@admin.com', 10, 1547552665, 1547552665),
(92, 'dalpendre', 'Ip27x7pZ_YoIXA2N3jeLC2yB23gNID9j', '$2y$13$eVZo0aQNz6Oh9f78sQsCfex0jiVPEkATvIe0UHMM4p5CKx4hiJb0O', NULL, 'admindalpendre@admin.com', 10, 1547552959, 1547552959),
(94, 'diogo1234', 'gpoKbvAxkccIYtMyATz--HzJfVEvsE5J', '$2y$13$XeBoxQ9NAmLY1EInZbMYR.pImIgrOKd0h6vn6QSiLt/C52PSpE02C', NULL, 'ndj@dska.kd', 10, 1547727023, 1547727023),
(95, 'dalpendre2019', '77BActhgAbcf13Ws8TMdAcfmhUuXoq0F', '$2y$13$WI5zsSxlAAAhNSmVxfp82eB7MBl6qxGmLDJ9fVmPCkQHY13ks4ydq', NULL, 'dapdksm@fmkdasm.dmfks', 10, 1548000508, 1548000508),
(96, 'Joao', '5ylF9kBWwjcAmp7VWhJDKsLIaJiKu8Je', '$2y$13$xBSbTNTNU5ZV5we5g76Dl.icxLaS7ebzVhKyPTT9Rnp7gw.tqpBPu', '', 'sdak@mkdsda.msdk', 10, 1548096103, 1548096103),
(97, 'User2019', 'dwqyOrFLuZVraPenasyUCl9nGm3OdyE8', '$2y$13$T0XkskrCADxZABC.Vg1T3uc1evfufpzBnc/2z7jOPq70RGp7hcbeG', NULL, 'dbasj@sdmka.sdm', 10, 1548096756, 1548096756),
(98, 'HelloWorld', 'dhe5WeOdLU3QLioLNGoMMt1o355GT16X', '$2y$13$tTbAFbVOkjCZwtNGEVjZAeXLio067M1RfZMNmaoZVg/SI4dre0xPC', NULL, 'jkdndsa@dmsd.dskn', 10, 1548097126, 1548097126),
(99, 'DiogoAlpendre', 'IdDwUi7aPDEotOmfunKQF0865ufUEi87', '$2y$13$F2vGf3gx1vh3S0wkWInxC.OVd35btS7zbZxu3oApLZH917uWKqLey', NULL, 'skdak@mkams.skda', 10, 1548167021, 1548167021),
(100, 'julioosoculos', '1Ym2KvLJUL8FPpjDxGSBWdI0t39jL9HE', '$2y$13$xp4/MnRXvk1qB2aZfXoW8OSbVmesA3md0kvsntFeW62B4QpjY4iHu', NULL, 'julio@julio.com', 10, 1548179102, 1548179102),
(101, 'slash1234', 'dxwBSNFyrJDxOPX6rhRjgUbqrsOO9oY8', '$2y$13$xPoqqVlaLYD8EOvjx4NFdeptw1N/uKQvsziUxuC5rml7gzybIegX2', NULL, 'hddas@djkas.kdf', 0, 1548180221, 1548180221),
(102, 'Fixe', 'SaCahxURnXvOTuHAOY4zndg4x58OK_NW', '$2y$13$SpJNXojNmA6WIxFMkzKLqOZ1AtnBs3BAuHUro7Dhih/nLfH7XYPv6', NULL, 'dkmsd@dmk.kmds', 10, 1548194232, 1548194232),
(103, 'diogocruz', 'PYcJvNcCGTYMDkjJrzzvZvCMeVVJCtVT', '$2y$13$6CQcr.so5q.yoWuorX9sIehilADGkTXo7VtZLTS59t3r.balUc2am', NULL, 'diogocruz@gmail.com', 10, 1549133626, 1549133626);

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
  KEY `userprofile_ibfk_2` (`user_id`),
  KEY `userprofile_ibfk_3` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `firstname`, `surnames`, `birthdate`, `sex`, `user_id`, `team_id`) VALUES
(85, 'Diogo', 'Cruz Alpendre', '2018-09-12', 'M', 85, NULL),
(91, 'Ihor', 'Kuzma', '2019-01-04', 'M', 91, NULL),
(96, 'Diogo', 'Alpendre', '2019-03-06', 'M', 96, NULL),
(97, 'Fixe', 'Hello', '2019-01-16', 'M', 97, NULL),
(98, 'sdsdsa', 'sdadsad', '2019-01-16', 'M', 98, NULL),
(101, 'Diogo Cruz', 'ALpendre', '2019-01-15', 'M', 101, NULL),
(102, 'sdakms', 'ndsna', '2019-01-22', 'F', 102, NULL),
(103, 'Diogo', 'Alpendre', '2018-12-11', 'M', 103, NULL);

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
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_6` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_5` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teamprofile`
--
ALTER TABLE `teamprofile`
  ADD CONSTRAINT `teamprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userprofile_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
