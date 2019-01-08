-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2019 at 02:54 PM
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
('user', '87', 1546894331);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `tag`, `create_time`, `user_id`, `team_id`, `post_id`, `event_id`) VALUES
(6, 'Sevilha', '2018', '2018-12-27 00:04:44', NULL, NULL, 53, 5),
(7, 'Sevilha', '2018', '2018-12-27 00:04:44', NULL, NULL, 53, 5);

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
  KEY `event_ibfk_4` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `begin_date`, `end_date`, `description`, `user_id`, `team_id`) VALUES
(5, 'Evento da vida', '2018-11-21 00:11:00', '2018-11-21 00:12:00', 'Tuamaehvukgb', 22, NULL),
(8, 'sadasasadasd', '2018-11-28 05:11:00', '2018-11-28 07:11:00', 'dasadsaasdads', 28, NULL),
(10, 'smadlmalmsdlamld', '2018-11-28 05:11:00', '2018-11-28 15:11:00', 'fknejosfnsifdf', 28, NULL),
(11, 'dsaddsda', '2018-12-03 04:12:00', '2018-12-03 18:12:00', 'dasdsad', 44, NULL),
(12, 'dsadsadsdadsasda', '2018-12-03 01:12:00', '2018-12-03 02:12:00', 'sadsdasadsadas', 44, NULL),
(13, 'mkladmslamdl', '2018-12-03 01:12:00', '2018-12-03 13:12:00', 'asdad', 44, NULL),
(14, 'dasdlakm', '2018-12-03 13:12:00', '2018-12-03 13:12:00', 'okmfokowm', 44, NULL),
(16, 'Lan Party', '2018-12-04 17:12:00', '2018-12-04 02:12:00', 'Lan Party Solidária', 29, NULL),
(17, 'ddssddsf', '2018-12-04 08:12:00', '2018-12-04 09:12:00', 'sdfdfsdfd', 29, NULL),
(18, 'sadsdaasd', '2018-12-04 05:12:00', '2018-12-04 22:12:00', 'dadss', 29, NULL),
(19, 'hello', '2018-12-04 13:12:00', '2018-12-04 06:12:00', 'sdasdadsda', 29, NULL),
(20, 'sasddsas', '2018-12-05 09:12:00', '2018-12-05 01:12:00', 'sdadsdsdssd', 47, NULL),
(21, 'ddsdsfddfd', '2018-12-05 00:12:00', '2018-12-05 01:12:00', 'dffsddffddf', 47, NULL),
(22, 'Evento', '2018-12-05 12:12:00', '2018-12-05 12:12:00', 'dsasdasdasdas', 47, NULL),
(23, 'dsdaspjsdajkl', '2018-12-05 12:12:00', '2018-12-05 06:12:00', 'sasdasdsdsd', 37, NULL),
(24, 'Evento de yii2', '2018-12-05 12:12:00', '2018-12-05 02:12:00', 'Evento', 37, NULL),
(25, 'Airsoft julio', '2018-12-05 10:12:00', '2018-12-05 13:12:00', 'sDada', 37, NULL),
(26, 'Evento', '2018-12-09 14:12:00', '2018-12-09 18:12:00', 'Jogo de futebol', 48, NULL),
(27, 'aklsdla', '2010-03-25 00:00:00', '2018-12-09 05:12:00', 'dç,aslsd', 37, NULL),
(28, 'sadasd', '2018-12-10 17:12:00', '2018-12-10 09:12:00', 'saddsaadsdsaads', 26, NULL),
(29, 'Evento', '2018-12-10 09:12:00', '2018-12-10 21:12:00', 'DSAS', 37, NULL),
(30, 'dd', '2018-12-11 04:12:00', '2018-12-11 02:12:00', 'ddd', 30, NULL),
(31, 'dsasdsd', '2018-12-11 00:12:00', '2018-12-11 18:12:00', 'sads', 30, NULL),
(32, 'Fixe', '2018-12-13 09:12:00', '2018-12-13 03:12:00', 'Evento bué fixe', 51, NULL),
(34, 'dd', '2018-12-17 02:12:00', '2018-12-17 10:12:00', 'Fixe', 52, NULL),
(35, 'sdaa', '2018-12-17 14:12:00', '2018-12-17 13:12:00', 'sdasdasd', 52, NULL),
(36, 'dfsdfsd', '2018-12-19 01:12:00', '2018-12-19 13:12:00', 'dsffsfdsdsdfdfssfdsdfsddsfsd', 63, NULL),
(37, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(40, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(41, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(42, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(43, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(44, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(45, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(46, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(47, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(48, 'Fixe', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(49, 'Hello', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'Fixe', NULL, NULL),
(50, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(51, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(52, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(53, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(54, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(55, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(56, 'adsmkldmal', '2018-12-24 19:12:00', '2018-12-24 08:12:00', 'sm amsn dkandanjksnsja', 64, NULL),
(57, 'açlsdçlal', '2018-12-26 23:12:00', '2018-12-26 17:12:00', 'laskndnskjdnknsdk', 65, NULL),
(58, 'dsdamslam', '2018-12-28 09:12:00', '2018-12-28 01:12:00', 'njsajkdjknasdasdsda', 66, NULL),
(59, 'mnasd', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'dsadasdasa', NULL, NULL),
(60, 'mnasd', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'dsadasdasa', NULL, NULL),
(61, 'Evento', '2018-11-21 00:11:00', '2018-11-21 00:11:00', 'dknasnjdnaksdn', NULL, NULL),
(64, 'mnasd', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'dsadasdasa', NULL, NULL),
(65, 'mnasd', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'dsadasdasa', NULL, NULL),
(68, 'mnasd', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'dsadasdasa', NULL, NULL),
(79, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', NULL, NULL),
(80, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', NULL, NULL),
(81, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', NULL, NULL),
(82, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', NULL, NULL),
(83, 'Sevilho', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', 70, 70),
(84, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', 70, NULL),
(85, 'Sevilhas', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', 70, NULL),
(86, 'Sev', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', 70, NULL),
(87, 'Ola', '2018-12-27 00:04:44', '2018-12-27 00:04:44', 'Ola', 70, NULL),
(89, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(90, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(91, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(92, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(93, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(94, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(95, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(96, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(97, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(98, 'FIxe', '2018-11-28 05:11:00', '2018-11-28 05:11:00', 'Fixe', NULL, NULL),
(110, 'Evento', '2019-01-07 05:01:00', '2019-01-07 17:01:00', 'Evento', 67, NULL),
(113, 'API REST', '2018-12-05 00:12:00', '2018-12-05 00:12:00', 'Fixe', 85, NULL);

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
  KEY `post_ibfk_4` (`user_id`),
  KEY `post_ibfk_3` (`event_id`),
  KEY `post_ibfk_5` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tag`, `create_time`, `image`, `user_id`, `team_id`, `event_id`) VALUES
(11, 'saasd', 'sadsdsd', 'sasdsd', '2019-01-07 14:49:23', '', 67, NULL, 20),
(12, 'Evento', 'dasd', 'dadssd', '2018-12-11 15:39:27', NULL, 37, NULL, 22),
(13, 'sassad', 'sadadssadds', 'sadsadsadsda', '2018-12-05 13:38:54', NULL, 47, NULL, 22),
(14, 'dads', 'sadsd', 'adssddd', '2018-12-05 13:42:21', NULL, 47, NULL, 20),
(15, 'dasdsad', 'sadsd', 'adssd', '2018-12-05 13:42:53', NULL, 47, NULL, 14),
(16, 'sadsadsd', 'sadsadsad', 'dassadsadd', '2018-12-05 13:45:30', NULL, 47, NULL, 20),
(17, 'dsasdsd', 'sadadssad', 'sdsadsadsadds', '2018-12-05 13:45:41', NULL, 47, NULL, 22),
(18, 'Evento FIxe', 'slsnda', 'skdmal', '2018-12-12 14:12:25', NULL, 37, NULL, 23),
(19, 'dsad', 'saddss', 'Fixe', '2018-12-11 15:59:47', NULL, 37, NULL, 24),
(20, 'dasdsd', 'dssadsad', 'ad', '2018-12-05 13:49:26', NULL, 37, NULL, 24),
(21, 'sdsdsdasad', 'sdasdsd', 'sadasdasd', '2018-12-05 13:50:03', NULL, 37, NULL, 24),
(22, 'sadsadds', 'sadadssd', 'sdsadsd', '2018-12-05 13:51:51', NULL, 37, NULL, 24),
(23, 'dadssdsd', 'sadasdsd', 'Mais um', '2018-12-05 13:52:02', NULL, 37, NULL, 24),
(24, 'maisans', 'mkadaslsa', 'assdasdss', '2018-12-05 13:53:47', NULL, 37, NULL, 24),
(25, 'lsasdpl', 'ksasdaskd', 'sadss', '2018-12-05 13:54:07', NULL, 37, NULL, 24),
(26, '24', 'dasdas', 'asadsd', '2018-12-05 13:54:21', NULL, 37, NULL, 24),
(27, 'sadsasd', 'asdasdas', 'dsadsadsd', '2018-12-05 13:55:38', NULL, 37, NULL, 24),
(28, 'Juilo', 'dasda', 'sdadsa', '2018-12-05 13:56:56', NULL, 37, NULL, 24),
(29, 'dasasdds', 'sadsadsadsad', 'sdsadsdsd', '2018-12-05 13:57:38', NULL, 37, NULL, 24),
(30, 'sadasda', 'asddsad', 'sadsasd', '2018-12-05 13:58:23', NULL, 37, NULL, 24),
(31, 'saSA', 'aAS', 'ASASA', '2018-12-05 14:02:14', NULL, 37, NULL, 24),
(32, 'Evento Yii2', 'sdashd', 'dwasdasd', '2018-12-05 14:07:07', NULL, 37, NULL, 24),
(33, 'sadsdsad', 'dasd', 'sadsadsadsda', '2018-12-05 14:08:08', NULL, 37, NULL, 24),
(34, 'Maisum', 'sasmdkajon', 'jsandkjnakd', '2018-12-05 14:08:17', NULL, 37, NULL, 24),
(38, 'Fixe', 'Dasa', '#jogos', '2018-12-09 17:48:16', NULL, 48, NULL, 26),
(41, 'saddss', 'dasdsadsd', '#sdsad', '2018-12-11 15:37:33', NULL, 37, NULL, 18),
(42, 'sdasd', 'sasdsd', '#sadsa', '2018-12-11 15:37:48', NULL, 37, NULL, 19),
(43, '#dsa', 'sadsdasdasdada', 'sdA', '2018-12-11 15:56:10', NULL, 37, NULL, 29),
(44, 'wa', 'sasad', 'saddsa', '2018-12-11 16:50:31', NULL, NULL, 30, 31),
(45, 'Fixe', 'Mais um', '#Fixolas', '2018-12-12 13:43:11', NULL, 37, NULL, 24),
(46, 'Post novo 123', 'asdnjkn', '#sakldk', '2018-12-13 12:28:14', NULL, 51, NULL, 32),
(47, 'saldklsamkl', 'kamsdklnsakds', 'sakdnsn', '2018-12-24 20:48:11', '', 64, NULL, 56),
(48, 'sadsdml', 'dsmklamdlkml', 'sdamkldmlads', '2018-12-27 00:04:33', '', 65, NULL, 57),
(49, 'dsamd', 'kdsalma', 'sçlsdaçs', '2018-12-28 09:40:49', '', 66, NULL, 58),
(50, 'saddsmdassaas', 'sads', 'dsadsasda', '2018-12-05 13:37:36', NULL, NULL, NULL, 5),
(51, 'saddsmdassaas', 'sads', 'dsadsasda', '2018-12-05 13:37:36', NULL, NULL, NULL, 5),
(52, 'saddsmdassaas', 'sads', 'dsadsasda', '2018-12-05 13:37:36', NULL, NULL, NULL, 5),
(53, 'saddsmdassaas', 'sads', 'dsadsasda', '2018-12-05 13:37:36', NULL, NULL, NULL, 5),
(54, 'saddsmdassaas', 'sads', 'dsadsasda', '2018-12-05 13:37:36', NULL, NULL, NULL, 68),
(65, 'msad', 'dsmak', 'ssad4', '2018-12-30 15:08:40', '', NULL, 70, 87),
(78, 'Hello world', 'Hello', 'Fixe', '2018-11-28 05:11:00', '', 69, NULL, 86),
(85, 'dsa', 'sada', 'dsad', '2019-01-07 14:43:10', '67jpg', 67, NULL, 110),
(86, 'sad', 'sad', 'sa', '2019-01-07 14:50:57', 'jpg', 67, NULL, 110),
(87, 'sdas', 'sd', 'sdasd', '2019-01-07 14:53:20', 'jpg', 67, NULL, 110),
(90, 'Hello world', 'Hello', 'Fixe', '2018-11-28 05:11:00', '', 85, NULL, 113);

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
(30, 'Diogo', '', '', '', '', '', '', 30),
(50, 'Equipa', '', '', '', '', '', '', 50),
(68, 'Fixe', '', '', '', '', '', '', 68),
(70, 'Fixe', '', '', '', '', '', '', 70),
(73, 'Team 2019', 'Dioos', 'sdkdam', 'dsmkdam', 'dmskam', 'mskda', 'dsad', 73),
(74, 'dsad', 'sdad', 'sd', 'asd', 'sadsad', 'sad', 'sdsad', 74),
(77, 'Team', 'Fixe', 'Fixe', 'Fixe', 'Fixe', 'Fixe', 'Fixe', 77);

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(37, 'solouser1234', 'afAg3WzYUy3ZprcvEh5p8ltHbjWgUY35', '$2y$13$H0daGV1UdGYzpPp1SBh80eAWpXFBAXroSth9k3zJYclmwkLzmGuN.', NULL, 'ldksadl@lkasmdl.com', 0, 1543593560, 1543593560),
(38, 'solouser1999', 'NWArch_D_3KA43j1uli9arGojw5eoXux', '$2y$13$8P0oSUMqEokvEMe8JiGiee05FePcgzt6aYhRQi9r4hW98wOBYj2dK', NULL, 'kfmslfdml@fkdsf.com', 10, 1543608013, 1543608013),
(39, 'teamuser1999', 'J_-yCe5aXhVGN8YTuZhGLAdLqCbZTN1s', '$2y$13$KXV4T2ZzkHYKq/QdGSFkH.oiKY.yyg3yD55wdL/58XIQrjOpBoCy6', NULL, 'dalpadasd2@dsds.com', 10, 1543608894, 1543608894),
(40, 'solouser2000', 'sB40Umx4wTRAjBYp1n-gUnWNmJXbZjbJ', '$2y$13$ZysTp1veHVvDSim/usFIE.zjMSUfZeKx1DwqsJhJKXJqXTLdOsW/.', NULL, 'nsadlajkd@fskd.xsds', 10, 1543609065, 1543609065),
(41, 'solouser12345', 'aeRGSQlsi__A5YmJhnTkGlRo_dRYD8_s', '$2y$13$dvDYOh8uiV8UtnS4M4kFkulFTcZHH79ehXJJ8drZApLH.G/XS5hkO', NULL, 'dfmkljsdf@ksmdskd.com', 10, 1543609433, 1543609433),
(42, 'daniel123456789', 'c7uy2NdDguiCqtIPQedsBAD_WaXl9W2V', '$2y$13$yTMr4ciC/6QFrQsgvKfw/.NnrVWbEA8VKoo8xSEFxdZMZufwJV4my', NULL, 'pdmapmdkls@dmklsdma.com', 10, 1543842858, 1543842858),
(43, 'dontstopmenow', '4IhKDiLyjcUkxwsd9PJQ3WZRMu6tR8WP', '$2y$13$T1f.zLGJ6/vU0xaQKqTa6emJUCCGqTaO80kiKjynASxUvNmOJn6q6', NULL, 'dontsecjfdljklcdkjm@kjerhfk.cojri', 10, 1543843198, 1543843198),
(44, 'joaodasluzes', 'tbHtjsQj0QpcYKNdJdbGpxeFqa0Eu8N-', '$2y$13$qDv2bnigGSsBp7.3UFcBTuDZskQLoW2xyoWZLmO0L91.Ik4rRaVfe', NULL, 'djandsl@sdmaksk.com', 10, 1543844077, 1543844077),
(46, 'usersolo123456789', 'HbuIjPvRfplIqdF8ivqUPjNUTRo--LEf', '$2y$13$cxkFToWWxu67McZzDgMXfOjdK9XdogF9/v8AhiibOClYhzghoq7q.', NULL, 'nfisnfd@klasd.cinqa', 10, 1544017003, 1544017003),
(47, 'novouser123456', 'n6mBjN8yaUWxPive1uAs1ECbRh2tkX1Q', '$2y$13$NcVKg688/o/H1cwy4G3xN.lPZ1sm6dVNFgue2ZYKsE81V1NlcgypG', NULL, 'ldnsfdlfklf@mklsdm.cndsjkn', 10, 1544017027, 1544017027),
(48, 'dalpendre12345', 'Xw0zhNUfK-_nSrwddXNHUPxXTyxgc46v', '$2y$13$9oj3k2NYbK1DRlOCRonr0.WlkFdcCTvsJTe38XQ1IesmVX6FFoZfO', NULL, 'diogoitoalpendre@gmail.com', 10, 1544377640, 1544377640),
(49, 'solouser2018', 'NRKGCLbrKxJbCBACftdcbSXRGYhu-hDx', '$2y$13$01e0tTXE8ulzvueftE/3VuHLp52cnPIQLbHnGYjs4T0CAOSTMQdPC', NULL, 'dkamlsda@dmakdslm.com', 10, 1544405520, 1544405520),
(50, 'teamuser1234', 'bn4joXxIoE3UtJ5hDo81Xt9gzSeichcN', '$2y$13$8wCcY19mtal7vOWMrsXNleQv6bNXHHiHHJqwlFY81x3daFuslmRNy', NULL, 'dmsdkaslmlsska@ksmdds.cdmk', 10, 1544465708, 1544465708),
(51, 'utilizador123456', 'TIYtNQADpWXKb0IFRfMFloyFK8mYuHwm', '$2y$13$oE0pHSU1n2GQZeIVurHuMeMMz2ugPHoSzB5kLPjcsh6B7PKMhFcCS', NULL, 'dsjk@ldsa.dskma', 10, 1544704006, 1544704006),
(52, 'novousersolo', 'zq85hTCrC57yV8DcbpT9gYMdgcRf_1-a', '$2y$13$wwegCWxlO6pP9wgYHlyF.uh8cH2bSGL4J0FjPRDFkZvPWtuPn6yUG', NULL, 'mksdfmdksdmldf@ksmdasl.cskmd', 0, 1545054936, 1545054936),
(53, 'novosolouser1234', 'IRRjiJ3XPdoGu12KVS--N-5m7GTC2zKn', '$2y$13$NsbgqgZsMQMSBYOQTSGCxOnthbpa4w0yTxwwRb3U.UtRLHuXgYdha', NULL, 'adnasdk@kldndssa.com', 0, 1545065057, 1545065057),
(54, 'novosolouser123456', '6348gZkQiCNHVGdnvBm0CKLEFhjUlWQh', '$2y$13$PUu.KjxOx4KoWpWe.qra3.kjJYbQTfeQDwy9lAz8ZMsxkJXFVmTYO', NULL, 'dnsjka@dskln.cmskdams', 0, 1545065664, 1545065664),
(55, 'novosolouser1999', 'n6Oh4R5AgQ7aqQVsAPG09vLSYb5GRWAJ', '$2y$13$bVnFHDUmjRGEkYtTj.cc7.htGsiW2Bj8Bxmh857LoS8wAQIh8rlRC', NULL, 'sadjs@akmsda.comds', 10, 1545065873, 1545065873),
(56, 'usersolo1234', 'eMcxb4aeGgqR01W-weY-Izzfg5bS0bt7', '$2y$13$AkX4KCD73CQKdVNA9yI6O.O7.rEo1aoTOd.ZtW4Eco1sXVD6IlTmO', NULL, 'dmjakdsk@daisd.clmdskad', 10, 1545071272, 1545071272),
(57, 'usersolo12345', 'G0FWwaZJ3qjulLfMvBIiTedXum4WDxGo', '$2y$13$ojUFlNNQj7spB0JjaYl8R.BPvUgTr6iLZYSUs02BI3JBSqGzbSOkC', NULL, 'aksmalskd@aksmdl.xias', 10, 1545072130, 1545072130),
(58, 'solouser123456789', 's6zCmdWEHLL4Bis0toj9QNO7OY5naEXR', '$2y$13$SFHUYhhE.D54IpKd4rZ0hebqe1pg8p3NwktOS5sLwpD9E7uECjzai', NULL, 'mdadklsadm@jnsansk.cndkasj', 10, 1545072421, 1545072421),
(59, 'novosoloutilizador1234', 'R5AaSuQpY5vnxxGzFsKL8x3BkdQowaz5', '$2y$13$TmTaRRfafHJ60FRkESko5evV4EWg6hL0BN17dP3aB593VrjLLERIa', '4I4YScPMU6BCD9gTYGB_-dbxvADm6ZaM_1545095222', 'dalpendre1999@gmail.com', 10, 1545095206, 1545095222),
(60, 'novoutilizador1234', 'dUEm3F0kjAJDirl58n3dmO-Q6Ci3BG6s', '$2y$13$D4QPYVdzeAAB8J3JTG9RF.vrOk3TQmUYt7ZCWhywjAT/.gsZQqtj.', '', 'ndjaskdns@dskand.ckmkmds', 10, 1545145027, 1545145027),
(61, 'diogoalpendresolo1234', 'D7ssdWnFPMGuOFm9ODGb_hxnCZvAvjyj', '$2y$13$1Ppzv25KBI1bIc.vJUR7tO9M85WOtsX8luUyvvlOTKNLi501i1egy', NULL, 'jdnakds@sdakdns.dfkmasd', 10, 1545161211, 1545161211),
(62, 'userdiogo', 'Jb4u5pgoVPhGkHjSlSVTtyxfsA_xuFVz', '$2y$13$p3hZyN.ML51BZ8ppBBql6.VEZwZ99g6yo066/qoqAmh5/NZ19nOHm', NULL, 'dsadsjk2@dakmsd.dskma', 10, 1545161243, 1545161243),
(63, 'utilizador123456789', 'Ez0Q98son2JTsBPaDn491xYX-wSXYR7k', '$2y$13$aW4eGaggsxKdKo7lzkAf3eFUe.WTAXHB6G16.w4GqYEMlDn1yok2O', NULL, 'jksndf2@fksdmsfdkl.dfksl', 10, 1545229021, 1545229021),
(64, 'dalpendre1999', '0xyLJ8p3c4LHFDTaiSWkFa3H9FRZJ3lr', '$2y$13$NDk01uMBhaYrUwl8kkJo1.Fwz1ohaPduNQy1T3lVwCI.zfwq1ckYS', NULL, 'kdlasmdklds@kmadklsmklam.clelwmal', 10, 1545684460, 1545684460),
(65, 'sevilha1234', 'mFG_5Ud3OsYEs7JOXqcAJGRDKpByp4R4', '$2y$13$NI70MDGb9pDPdbL7oqPaBOfONPKok3X7kxsMF1Ck4XTgHFeF67Mxu', NULL, 'dbajn@skamd.ckdd', 10, 1545869019, 1545869019),
(66, 'sevilha1999', 'ErF_O_rc0TW0twov-fe6DOzImqFZ2Qfc', '$2y$13$8hapBRtebGs5oLZY06bTAeHv84XP29iysbT9OWsecfALlcYJEq7WS', NULL, 'mnakjndksajdakjs@dskasdak.lmdasldkm', 10, 1545989993, 1545989993),
(67, 'sevilha2018', '6upEQp4uje4142EJDCWZLYI4DNBodcQJ', '$2y$13$wbf3OxuGdQK6mOg7lJDsc.aSujnhdZvQ0dgHSjqqesvcYlsMvniiu', NULL, 'jsndajkndskj1@dsnadaskj.com', 10, 1546087769, 1546087769),
(68, 'sevilhaTeam2018', '2H1fYetXnH3ZzkLWi-GZe5EV8LGYWOiu', '$2y$13$vPWj/eQavA60RviHz9Ze4uHma7zkdBQf2N87cT8SKAtYB6Y2OoOYy', NULL, 'dnjsadk@nsda.sdma', 10, 1546090425, 1546090425),
(69, 'teamsevilha2018', 'gTrW4ABIi-je3B5wr1Nca37bln-0YHB1', '$2y$13$Yrpc6WcnG2osHRKKmmNWgek6xbv4aNdiNMudLeoHZfHnp1bB4S2QG', NULL, 'gdhwaj@djs.dklsa', 10, 1546090567, 1546090567),
(70, 'novoutilizador2018', '4Ns9t4XvBz3U7fxfHAbXlebnO05BDvK1', '$2y$13$vX1.jHjoZninrPLz414QDODfEB0Sn8AbRbI3EX4WDxIZeAv8u879S', NULL, 'nasmds@dnlsa.sdmka', 10, 1546178690, 1546178690),
(71, 'novoano2019', 'wIVGu86iJIo1WpphJ6zorShPaIu4qJqR', '$2y$13$e9Pynq9pLClNC5y6c3oDR.Fd8i.FcoYYJHKpMMZYI3hqv14x8nJlK', NULL, 'jhdaks@dksma.msd', 10, 1546540727, 1546540727),
(72, 'dalpendre2019', 'TijhoIQHqodJPjvucGdM3mb_rG7ePkY3', '$2y$13$RmfJQRo0CI4tlCrbFN0hmuQhOJWaBx615AIdWPhaZNhV8ZNodkaKi', NULL, 'ldsklsm2@sdaks.daas', 10, 1546728291, 1546728291),
(73, 'team2019', 'olW9wMpJHs4Bafj0XW50TArW0JSlLJ-9', '$2y$13$z3rT/abUbhrB7Z/KF/zlTOoYxNkkMBzd1AhTodH20RN8NreN9P3r.', NULL, 'dnjads@dasjnd.csd', 10, 1546783682, 1546783682),
(74, 'teams2019', 'cjJoDxYHiKG6B4-Suehlyj7AsmNgIKh_', '$2y$13$lqmzhhKc1Icu3pImJaWOXO7B/rjzlLIQdMh2K2VgwNew/2YA0hUKy', NULL, 'dijaos@ksads.dska', 10, 1546784747, 1546784747),
(75, 'user2019', 'QAHj1Z78VHRFC4mX7oBqCTz_kRfst_8n', '$2y$13$prAMpvyI0NtUQjuoSMP5R.WzEv1O7tX1KKnrxhv1iXlVlEIE2b0wC', NULL, 'sadknajs@mas.sdka', 10, 1546785022, 1546785022),
(76, 'utilizador2019', '9gsbQ8ZQTvQLOF_7TCYMD6c5BadgphQg', '$2y$13$yfJPwe2Kv/GIA8p4BjpXjet9YsC7Hvlwfbow0PblTYrWYLL/0peFC', NULL, 'jfsd@dknas.dksa', 10, 1546856408, 1546856408),
(77, 'teamIPL0192', 'QxDjPbjTrM2yuOaoSX6zw4HkUCn7Pv5I', '$2y$13$MMrgzgMAWliVAtbXow8jaOZ760oxlBrKRSiIz.gPqX8gCg404m1D2', NULL, 'kndaksjd@nasdsm.dksdn', 10, 1546856919, 1546856919),
(78, 'fixe', 'y0DcjxgylAbYJM7AWPOMnPJWq-OxRyLH', '$2y$13$qiRYQT3hR8QSgwqo1l.PiOEfubWS2mpV5r4MyQPxBO6QTLfnTE8Oa', NULL, 'kads@sda.ds', 10, 1546858548, 1546858548),
(79, 'admin', '-47rLD2j6uyMnkpdq3L0Dyus0sFlz-RD', '$2y$13$8Y7dNzbqusy0/HCSERBx1erj/WEcUdmZrMmFL70ccg..DMpn0eizK', NULL, 'admin@admin.com', 10, 1546864805, 1546864805),
(83, 'leiria2019', 'HDRSX8xT_Um2pA2D3UFgtKnC1Uyi8aao', '$2y$13$r6E5d5BMduczWIfmJTgiE.CKon30kR0d8byd471pps2G9soO20ozu', NULL, 'dhasdi@kdfnfs.dkmm', 10, 1546885428, 1546885428),
(85, 'User2020', 'y0jPZ2tI8-T4QLrewDgiJr9vj9MUigf-', '$2y$13$VXhJINPXbb6CefnrfBg4AeMEw9sLHDVJ8A7UWx4C9Iv5FWvqSSFDe', NULL, 'djnsdandkas@msdadnsak.dskadk', 10, 1546890569, 1546890569),
(87, 'Utilizador2021', 'wLxhg08AzhbQGnzNyM_pEN5zlrpuWsOY', '$2y$13$YPl9quON.p8solIGp2Da/eaizACxt7zQlZYOEikS8GZPdK2bRon8O', NULL, 'djnsdandkas@msdadnsak.dskadkda', 10, 1546894331, 1546894331);

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
(26, 'Diogo', 'Asmadlkm', '2018-12-11', 'F', 26, NULL),
(29, 'Diogo', 'Alpendre', '2018-12-11', 'M', 29, NULL),
(37, 'Diogo ', 'Cruz Alpendre', '1999-03-04', 'M', 37, NULL),
(42, 'skmasdklm', 'saçsdkalmsdka', '2018-12-11', '0', 42, NULL),
(43, 'jkjgjhgukgk', 'lhkhohkhukhkh', '2018-12-05', 'M', 43, NULL),
(44, 'Joao', 'Alsdasdas', '2018-12-19', 'M', 44, NULL),
(47, 'adsasd', 'asdasdsadasd', '2018-01-31', 'M', 47, NULL),
(48, 'Diogo', 'Alpendre', '2018-03-04', 'M', 48, NULL),
(49, 'Diogo', 'Cruz Alpendre', '1999-03-04', 'M', 49, NULL),
(51, 'Diogo', 'Alpendre', '2018-12-04', 'M', 51, NULL),
(53, 'Diogo ', 'Cruz Alpendre', '1999-03-04', 'M', 53, NULL),
(54, 'Dioo', 'sdaasa', '2018-12-20', 'F', 54, NULL),
(55, 'adsasd', 'Alsdasdas', '2018-12-30', 'F', 55, NULL),
(56, 'sDS', 'assadsadasadsads', '2018-12-30', 'F', 56, NULL),
(57, 'Diogo', 'Alpendre', '2018-12-31', 'M', 57, NULL),
(58, 'Diogo', 'Alpendre', '2018-12-31', 'M', 58, NULL),
(60, 'Diodasda', 'dasdasd', '2019-01-01', 'M', 60, NULL),
(62, 'Fixe', 'Alpendre', '2018-12-04', 'M', 62, NULL),
(63, 'da', 'kalmds', '2018-12-20', 'F', 63, NULL),
(64, 'kldasn', 'sdadkank', '2018-12-04', 'F', 64, NULL),
(65, 'Diogo', 'Adkamsl', '2018-12-12', 'F', 65, NULL),
(66, 'amçsdkaml', 'klasmdlkml', '2018-12-04', 'M', 66, NULL),
(67, 'Diogo', 'Alpendre', '2018-11-27', 'M', 67, NULL),
(72, 'Diogo', 'Alpendre', '2018-12-11', 'M', 72, NULL),
(75, 'sdsada', 'sadasd', '2019-01-08', 'F', 75, NULL),
(76, 'Diogo', 'Alpendre', '2018-12-11', 'M', 76, NULL),
(87, 'Diogo', 'Alpendre', '2018-12-11', 'M', 87, NULL);

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
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `teamprofile` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
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
