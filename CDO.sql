-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db713566197.db.1and1.com
-- Généré le :  Sam 11 Août 2018 à 23:47
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db713566197`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_auteur` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_auteur` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`, `prenom_auteur`) VALUES
(1, 'nomX', 'prenomX'),
(2, 'nomY', 'prenomY'),
(3, 'nomW', 'prenomW'),
(4, 'nomZ', 'prenomZ'),
(5, 'Ange', 'Michel');

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

CREATE TABLE IF NOT EXISTS `civilite` (
  `id_civil` int(11) NOT NULL AUTO_INCREMENT,
  `lib_civil` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `civilite`
--

INSERT INTO `civilite` (`id_civil`, `lib_civil`) VALUES
(1, 'Mme'),
(2, 'M.');

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `id_collection` int(11) NOT NULL AUTO_INCREMENT,
  `lib_collection` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_collection`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (`id_collection`, `lib_collection`) VALUES
(1, 'collection1'),
(2, 'collection2'),
(3, 'collection3'),
(4, 'collection4'),
(5, 'Note documentaire');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id_consult` int(11) NOT NULL AUTO_INCREMENT,
  `date_consult` datetime NOT NULL,
  `user_consult` int(6) NOT NULL,
  `doc_consult` int(10) NOT NULL,
  PRIMARY KEY (`id_consult`),
  KEY `user` (`user_consult`),
  KEY `document` (`doc_consult`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=228 ;

--
-- Contenu de la table `consultation`
--

INSERT INTO `consultation` (`id_consult`, `date_consult`, `user_consult`, `doc_consult`) VALUES
(1, '2017-12-28 21:03:49', 5, 12),
(2, '2017-12-28 21:04:08', 5, 6),
(3, '2017-12-28 21:04:24', 5, 4),
(4, '2017-12-28 21:05:01', 5, 5),
(5, '2017-12-28 21:05:02', 5, 12),
(6, '2017-12-28 21:05:10', 5, 4),
(7, '2017-12-28 21:05:15', 5, 12),
(8, '2017-12-28 21:05:38', 5, 6),
(9, '2017-12-28 21:05:50', 5, 6),
(10, '2017-12-28 21:05:54', 5, 12),
(11, '2017-12-28 21:06:22', 5, 4),
(12, '2017-12-28 21:09:52', 5, 4),
(13, '2017-12-28 21:10:07', 5, 4),
(14, '2017-12-28 21:10:13', 5, 6),
(15, '2017-12-28 21:10:16', 5, 12),
(16, '2017-12-28 21:10:34', 5, 12),
(17, '2017-12-28 21:11:06', 6, 12),
(18, '2017-12-28 21:11:34', 5, 4),
(19, '2017-12-28 21:20:05', 5, 2),
(20, '2017-12-28 21:20:29', 5, 6),
(21, '2017-12-28 21:20:38', 5, 6),
(22, '2017-12-28 21:34:32', 5, 6),
(23, '2017-12-28 21:34:39', 5, 12),
(24, '2017-12-28 21:35:51', 5, 6),
(25, '2017-12-28 21:35:56', 5, 12),
(26, '2017-12-28 21:36:44', 5, 4),
(27, '2017-12-28 21:37:57', 5, 6),
(28, '2017-12-28 21:38:02', 5, 12),
(29, '2017-12-28 21:38:50', 5, 12),
(30, '2017-12-28 21:39:02', 5, 12),
(31, '2017-12-28 21:42:49', 5, 12),
(32, '2017-12-28 21:44:28', 5, 12),
(33, '2017-12-28 21:46:45', 5, 12),
(34, '2017-12-28 21:48:01', 5, 12),
(35, '2017-12-28 21:49:05', 5, 12),
(36, '2017-12-28 21:49:25', 5, 12),
(37, '2017-12-28 21:50:53', 5, 6),
(38, '2017-12-28 21:51:26', 5, 6),
(39, '2017-12-28 21:52:10', 5, 12),
(40, '2017-12-28 21:52:20', 5, 5),
(41, '2017-12-28 21:53:17', 5, 4),
(42, '2017-12-28 21:53:31', 5, 12),
(43, '2017-12-28 21:53:40', 5, 7),
(44, '2017-12-28 21:54:51', 5, 12),
(45, '2017-12-28 21:55:13', 5, 12),
(46, '2017-12-28 21:55:39', 6, 12),
(47, '2017-12-28 21:55:51', 6, 12),
(48, '2017-12-28 21:56:45', 6, 12),
(49, '2017-12-28 21:56:57', 6, 6),
(50, '2017-12-28 21:57:18', 6, 12),
(51, '2017-12-28 21:57:39', 6, 5),
(52, '2017-12-28 21:57:46', 6, 4),
(53, '2017-12-28 21:58:04', 5, 12),
(54, '2017-12-28 22:02:44', 5, 12),
(55, '2017-12-28 22:05:24', 5, 6),
(56, '2017-12-28 22:05:31', 5, 12),
(57, '2017-12-28 22:06:56', 5, 12),
(58, '2017-12-28 22:08:47', 5, 6),
(59, '2017-12-28 22:09:01', 5, 7),
(60, '2017-12-28 22:09:42', 5, 9),
(61, '2017-12-28 22:19:07', 5, 12),
(62, '2017-12-28 22:36:45', 3, 6),
(63, '2017-12-29 11:35:56', 5, 10),
(64, '2017-12-29 11:39:28', 5, 12),
(65, '2017-12-29 14:08:00', 5, 4),
(66, '2017-12-29 14:26:52', 5, 10),
(67, '2017-12-29 14:27:22', 5, 6),
(68, '2017-12-29 14:27:41', 5, 6),
(69, '2017-12-29 14:27:58', 5, 6),
(70, '2017-12-29 14:28:12', 5, 6),
(71, '2017-12-29 17:35:12', 5, 4),
(72, '2017-12-29 17:35:30', 5, 4),
(73, '2017-12-29 17:35:33', 5, 12),
(74, '2017-12-29 17:36:13', 5, 12),
(75, '2017-12-29 17:41:35', 5, 12),
(76, '2017-12-29 17:42:45', 5, 12),
(77, '2017-12-29 17:43:26', 5, 12),
(78, '2017-12-29 17:43:37', 5, 6),
(79, '2017-12-29 17:43:40', 5, 12),
(80, '2017-12-29 17:44:18', 5, 12),
(81, '2017-12-29 17:45:20', 5, 12),
(82, '2017-12-29 17:46:40', 5, 12),
(83, '2017-12-29 17:47:00', 5, 12),
(84, '2017-12-29 17:47:54', 5, 12),
(85, '2017-12-29 17:48:18', 5, 12),
(86, '2017-12-29 17:48:27', 5, 6),
(87, '2017-12-29 17:48:29', 5, 12),
(88, '2017-12-29 17:51:26', 5, 12),
(89, '2017-12-29 17:52:32', 5, 12),
(90, '2017-12-29 17:52:35', 5, 12),
(91, '2017-12-29 17:54:12', 5, 12),
(92, '2017-12-29 17:57:39', 5, 12),
(93, '2017-12-29 17:58:09', 5, 12),
(94, '2017-12-29 17:58:32', 5, 12),
(95, '2017-12-29 17:59:13', 5, 12),
(96, '2017-12-29 18:00:38', 5, 12),
(97, '2017-12-29 18:00:46', 5, 2),
(98, '2017-12-29 18:01:04', 5, 12),
(99, '2017-12-29 18:01:51', 5, 12),
(100, '2017-12-29 18:01:56', 5, 4),
(101, '2017-12-29 18:02:01', 5, 2),
(102, '2017-12-29 18:02:04', 5, 10),
(103, '2017-12-29 18:02:07', 5, 7),
(104, '2017-12-29 18:23:09', 5, 12),
(105, '2017-12-29 18:56:38', 6, 12),
(106, '2017-12-29 18:58:10', 6, 5),
(107, '2017-12-29 18:59:34', 6, 5),
(108, '2017-12-29 18:59:35', 6, 6),
(109, '2017-12-29 18:59:42', 6, 2),
(110, '2017-12-29 18:59:47', 6, 12),
(111, '2017-12-29 19:03:16', 6, 12),
(112, '2017-12-29 19:05:04', 6, 12),
(113, '2017-12-29 19:05:27', 6, 6),
(114, '2017-12-29 19:05:33', 6, 6),
(115, '2017-12-29 19:06:53', 6, 6),
(116, '2017-12-29 19:08:13', 6, 12),
(117, '2017-12-29 19:08:22', 6, 12),
(118, '2017-12-29 19:10:04', 5, 12),
(119, '2017-12-29 20:45:47', 5, 12),
(120, '2017-12-29 20:50:54', 6, 6),
(121, '2017-12-29 20:51:17', 6, 6),
(122, '2017-12-29 21:51:50', 5, 2),
(123, '2017-12-29 22:12:01', 5, 12),
(124, '2017-12-29 22:15:29', 5, 6),
(125, '2017-12-29 22:15:49', 5, 4),
(126, '2017-12-29 22:21:53', 5, 9),
(127, '2017-12-29 22:22:13', 5, 7),
(128, '2017-12-29 22:22:48', 5, 6),
(129, '2017-12-29 22:22:52', 5, 12),
(130, '2017-12-29 22:42:57', 5, 5),
(131, '2017-12-29 22:43:04', 5, 4),
(132, '2017-12-29 23:13:34', 5, 12),
(133, '2017-12-29 23:13:53', 5, 12),
(134, '2017-12-29 23:14:52', 5, 2),
(135, '2017-12-29 23:15:03', 5, 2),
(136, '2017-12-29 23:15:22', 6, 2),
(137, '2017-12-29 23:16:25', 5, 2),
(138, '2017-12-29 23:16:38', 5, 7),
(139, '2017-12-29 23:17:15', 5, 6),
(140, '2018-01-03 10:47:18', 5, 12),
(141, '2018-01-04 15:17:44', 5, 4),
(142, '2018-01-04 15:18:16', 5, 2),
(143, '2018-01-04 15:18:29', 5, 2),
(144, '2018-01-04 15:22:12', 5, 2),
(145, '2018-01-04 15:22:28', 5, 2),
(146, '2018-01-04 16:03:18', 6, 12),
(147, '2018-01-04 16:07:28', 6, 7),
(148, '2018-01-04 16:08:32', 6, 7),
(149, '2018-01-04 16:09:15', 5, 7),
(150, '2018-01-04 16:10:03', 5, 7),
(151, '2018-01-04 16:15:36', 5, 7),
(152, '2018-01-04 16:15:56', 5, 12),
(153, '2018-01-04 16:16:06', 5, 6),
(154, '2018-01-04 16:16:15', 5, 2),
(155, '2018-01-04 16:17:24', 5, 12),
(156, '2018-01-04 16:17:33', 5, 7),
(157, '2018-01-04 16:18:50', 5, 10),
(158, '2018-01-04 16:19:00', 5, 12),
(159, '2018-01-04 16:19:00', 5, 12),
(160, '2018-01-04 16:19:44', 5, 12),
(161, '2018-01-04 16:19:49', 5, 7),
(162, '2018-01-04 17:07:59', 5, 7),
(163, '2018-01-04 17:08:29', 5, 12),
(164, '2018-01-04 17:08:36', 5, 12),
(165, '2018-01-04 17:08:52', 5, 2),
(166, '2018-01-04 17:08:57', 5, 7),
(167, '2018-01-04 17:10:19', 5, 6),
(168, '2018-01-04 17:10:37', 5, 6),
(169, '2018-01-04 17:15:20', 5, 7),
(177, '2018-01-04 17:35:36', 5, 12),
(178, '2018-01-04 18:09:38', 6, 7),
(179, '2018-01-04 18:32:26', 5, 4),
(180, '2018-01-05 14:18:29', 5, 7),
(181, '2018-01-06 09:40:17', 6, 5),
(182, '2018-01-06 09:40:23', 6, 12),
(183, '2018-01-06 09:40:33', 6, 9),
(184, '2018-01-06 09:42:03', 6, 13),
(185, '2018-01-06 11:56:00', 5, 7),
(186, '2018-01-06 11:59:35', 5, 7),
(187, '2018-01-06 12:06:21', 5, 7),
(188, '2018-01-06 12:08:32', 5, 7),
(189, '2018-01-06 12:09:28', 5, 10),
(190, '2018-01-06 12:09:32', 5, 7),
(191, '2018-01-06 12:10:36', 6, 7),
(192, '2018-01-06 12:10:42', 6, 6),
(193, '2018-01-06 12:10:46', 6, 12),
(194, '2018-01-06 12:17:39', 5, 10),
(195, '2018-01-06 16:43:51', 5, 5),
(196, '2018-01-06 17:00:47', 5, 12),
(197, '2018-01-07 11:52:53', 5, 12),
(198, '2018-01-11 09:23:21', 5, 12),
(199, '2018-01-11 09:40:27', 5, 12),
(200, '2018-01-11 09:41:39', 5, 10),
(201, '2018-01-11 09:42:59', 6, 13),
(202, '2018-01-11 14:24:36', 5, 12),
(203, '2018-01-11 14:25:08', 5, 9),
(204, '2018-01-11 17:42:58', 5, 7),
(205, '2018-01-11 17:43:07', 5, 12),
(206, '2018-01-22 10:49:28', 5, 12),
(207, '2018-01-22 10:50:15', 5, 7),
(208, '2018-01-22 10:50:18', 5, 12),
(209, '2018-01-22 10:51:16', 6, 13),
(210, '2018-01-26 11:36:06', 5, 7),
(211, '2018-01-26 11:36:15', 5, 7),
(212, '2018-01-26 11:36:19', 5, 4),
(213, '2018-01-26 11:36:37', 5, 12),
(214, '2018-01-26 11:41:45', 5, 12),
(215, '2018-02-15 23:36:46', 5, 12),
(216, '2018-02-18 12:00:51', 1, 6),
(217, '2018-02-21 19:31:06', 5, 6),
(218, '2018-02-21 20:41:40', 7, 9),
(219, '2018-02-21 20:46:51', 7, 4),
(220, '2018-02-23 18:08:14', 7, 12),
(221, '2018-03-03 16:08:20', 7, 10),
(222, '2018-03-03 16:10:09', 5, 10),
(223, '2018-03-03 16:10:32', 5, 6),
(224, '2018-03-08 19:01:05', 5, 12),
(225, '2018-04-18 18:17:35', 7, 7),
(226, '2018-04-18 18:17:41', 7, 10),
(227, '2018-07-16 10:29:59', 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `newcodif_doc` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_not` varchar(50) COLLATE utf8_bin NOT NULL,
  `class_doc` varchar(50) COLLATE utf8_bin NOT NULL,
  `type_doc` int(3) NOT NULL,
  `titre_doc` varchar(250) COLLATE utf8_bin NOT NULL,
  `sstitre_doc` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `period_doc` int(4) DEFAULT NULL,
  `form_doc` int(3) DEFAULT NULL,
  `promo_doc` int(3) DEFAULT NULL,
  `ent_doc` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `tuto_doc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `edit_doc` int(3) DEFAULT NULL,
  `date_doc` datetime NOT NULL,
  `lieu_doc` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `mention_doc` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `coll_doc` int(3) DEFAULT NULL,
  `num_doc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ISBN_doc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ISSN_doc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `lang_doc` int(3) NOT NULL,
  `dateP_doc` datetime DEFAULT NULL,
  `niveau_doc` int(3) DEFAULT NULL,
  `page_doc` int(11) DEFAULT NULL,
  `duree_doc` time DEFAULT NULL,
  `collation_doc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `somm_doc` varchar(450) COLLATE utf8_bin DEFAULT NULL,
  `resum_doc` varchar(450) COLLATE utf8_bin DEFAULT NULL,
  `lien_doc` tinyint(1) NOT NULL,
  `image_doc` tinyint(1) NOT NULL,
  `url_doc` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `control_doc` int(3) NOT NULL,
  `localisation_doc` int(3) NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `type` (`type_doc`),
  KEY `periodique` (`period_doc`),
  KEY `formation` (`form_doc`),
  KEY `promotion` (`promo_doc`),
  KEY `editeur` (`edit_doc`),
  KEY `collection` (`coll_doc`),
  KEY `langue` (`lang_doc`),
  KEY `niveau` (`niveau_doc`),
  KEY `localisation` (`localisation_doc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id_doc`, `newcodif_doc`, `id_not`, `class_doc`, `type_doc`, `titre_doc`, `sstitre_doc`, `period_doc`, `form_doc`, `promo_doc`, `ent_doc`, `tuto_doc`, `edit_doc`, `date_doc`, `lieu_doc`, `mention_doc`, `coll_doc`, `num_doc`, `ISBN_doc`, `ISSN_doc`, `lang_doc`, `dateP_doc`, `niveau_doc`, `page_doc`, `duree_doc`, `collation_doc`, `somm_doc`, `resum_doc`, `lien_doc`, `image_doc`, `url_doc`, `control_doc`, `localisation_doc`) VALUES
(2, '', 'NOT1', 'OUV1', 1, 'Les bienfaits d''Internet', 'ou comment l''araignée tisse sa toile', NULL, NULL, NULL, NULL, NULL, 2, '2017-12-06 00:00:00', NULL, NULL, NULL, NULL, '125478rr', NULL, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(4, '', 'NOT2', 'OUV1.2', 1, 'Linux', 'et ses dérivés', NULL, NULL, NULL, NULL, NULL, 1, '2017-12-03 00:00:00', NULL, NULL, NULL, NULL, '258985eer', NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(5, '', 'NOT3', 'PER1', 2, 'Programmez sans les mains !!', NULL, 2, NULL, NULL, NULL, NULL, 2, '2017-12-11 00:00:00', NULL, NULL, 4, '72', NULL, '123654', 1, NULL, 1, 75, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(6, '', 'NOT4', 'PER1.2', 2, 'Wifi & co', 'Tous sur les réseaux sans fil', 3, NULL, NULL, NULL, NULL, 1, '2017-11-15 00:00:00', NULL, NULL, 1, '7', NULL, '147852', 1, NULL, 3, 14, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(7, '', 'NOT5', 'CDR.1', 3, 'Conférence de R. Stallmann', 'Blanche Neige et les 7 Gnu', NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 00:00:00', 'Paris', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, '00:56:00', NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(9, '', 'NOT6', 'CDR.2', 3, 'Java est un complot !!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-04 00:00:00', 'New-York', NULL, NULL, NULL, NULL, NULL, 2, NULL, 4, NULL, '00:45:00', NULL, NULL, NULL, 0, 0, NULL, 1, 1),
(10, '', 'NOT8', 'OUV1.3', 1, 'La Révolution du Big-Data', 'Les données au coeur de la transformation de l''entreprise', NULL, NULL, NULL, NULL, NULL, 3, '2014-09-02 00:00:00', 'Paris', NULL, 1, NULL, NULL, NULL, 1, NULL, 1, 180, NULL, NULL, NULL, 'Qu’est-ce que le big data ? Le big data est constitué par toutes les données que nous générons à chaque instant, dont le volume global croît exponentiellement. De l’historique de navigation aux localisations GPS, jusqu’au rythme cardiaque, à la météo et au solde des comptes courants, ces données récoltées par les mobiles, applications et autres objets connectés génèrent de nouveaux usages pour les États et les entreprises.', 0, 0, NULL, 1, 1),
(12, '', 'NOT10', 'PER1.3', 2, 'Introduction à la psychologie de l''environnement digital', 'L''homme et les NTIC', 5, NULL, NULL, NULL, NULL, 4, '2002-01-04 00:00:00', 'Paris', NULL, 5, 'ND 2180', NULL, NULL, 1, NULL, 1, 14, NULL, NULL, NULL, 'Aujourd''hui, l''homme vit dans des mondes qu''il crée lui-même. Il n''est plus tout à fait en relation avec la nature, mais avec la technologie. Régulièrement en contact avec des machines, il se trouve dans un environnement de plus en plus fait de technologies liées à l''information, la connaissance et la communication, qui forment ensemble ce que nous appelons l''environnement digital. \r\nEn faisant évoluer la technologie, l''homme a évolué lui-même et', 1, 1, 'http://www.inrs.fr/media.html?refINRS=ND%202180', 1, 1),
(13, '', 'NOT11', 'RAP.1', 6, 'Les enjeux du système d''information en logistique', 'ou comment automatiser le suivi des OP', NULL, 2, 1, 'BZH & Co', 'Monsieur XXX', NULL, '2017-12-11 00:00:00', 'Avignon', NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 56, NULL, NULL, NULL, 'sdfsdfqsdfsdfsdfsqdfsdfsdffqsdfsqdfsdfsdfsqdfsdfsdsd', 0, 0, NULL, 2, 1),
(15, '', 'NOT10', 'PER1.3.1', 2, 'Introduction à la psychologie de l''environnement digital', 'L''homme et les NTIC', 5, NULL, NULL, NULL, NULL, 4, '2002-01-04 00:00:00', 'Paris', NULL, 5, 'ND 2180', NULL, NULL, 1, NULL, 1, 14, NULL, NULL, NULL, 'Aujourd''hui, l''homme vit dans des mondes qu''il crée lui-même. Il n''est plus tout à fait en relation avec la nature, mais avec la technologie. Régulièrement en contact avec des machines, il se trouve dans un environnement de plus en plus fait de technologies liées à l''information, la connaissance et la communication, qui forment ensemble ce que nous appelons l''environnement digital. \r\nEn faisant évoluer la technologie, l''homme a évolué lui-même et', 1, 1, 'http://www.inrs.fr/media.html?refINRS=ND%202180', 1, 1),
(16, '', 'NOT10', 'PER1.3.1', 2, 'Introduction à la psychologie de l''environnement digital', 'L''homme et les NTIC', 5, NULL, NULL, NULL, NULL, 4, '2002-01-04 00:00:00', 'Paris', NULL, 5, 'ND 2180', NULL, NULL, 1, NULL, 1, 14, NULL, NULL, NULL, 'Aujourd''hui, l''homme vit dans des mondes qu''il crée lui-même. Il n''est plus tout à fait en relation avec la nature, mais avec la technologie. Régulièrement en contact avec des machines, il se trouve dans un environnement de plus en plus fait de technologies liées à l''information, la connaissance et la communication, qui forment ensemble ce que nous appelons l''environnement digital. \r\nEn faisant évoluer la technologie, l''homme a évolué lui-même et', 1, 1, 'http://www.inrs.fr/media.html?refINRS=ND%202180', 1, 1),
(17, '', 'NOT10', 'PER1.3.1', 2, 'Introduction à la psychologie de l''environnement digital', 'L''homme et les NTIC', 5, NULL, NULL, NULL, NULL, 4, '2002-01-04 00:00:00', 'Paris', NULL, 5, 'ND 2180', NULL, NULL, 1, NULL, 1, 14, NULL, NULL, NULL, 'Aujourd''hui, l''homme vit dans des mondes qu''il crée lui-même. Il n''est plus tout à fait en relation avec la nature, mais avec la technologie. Régulièrement en contact avec des machines, il se trouve dans un environnement de plus en plus fait de technologies liées à l''information, la connaissance et la communication, qui forment ensemble ce que nous appelons l''environnement digital. \r\nEn faisant évoluer la technologie, l''homme a évolué lui-même et', 1, 1, 'http://www.inrs.fr/media.html?refINRS=ND%202180', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doc_auteur`
--

CREATE TABLE IF NOT EXISTS `doc_auteur` (
  `id_docauteur` int(11) NOT NULL AUTO_INCREMENT,
  `doc_docauteur` int(6) NOT NULL,
  `auteur_docauteur` int(6) NOT NULL,
  PRIMARY KEY (`id_docauteur`),
  KEY `document` (`doc_docauteur`),
  KEY `auteur` (`auteur_docauteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `doc_auteur`
--

INSERT INTO `doc_auteur` (`id_docauteur`, `doc_docauteur`, `auteur_docauteur`) VALUES
(1, 4, 2),
(2, 5, 1),
(3, 6, 5),
(4, 6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `doc_motclef`
--

CREATE TABLE IF NOT EXISTS `doc_motclef` (
  `id_docmotclef` int(11) NOT NULL AUTO_INCREMENT,
  `doc_docmotclef` int(6) NOT NULL,
  `motclef_docmotclef` int(6) NOT NULL,
  PRIMARY KEY (`id_docmotclef`),
  KEY `document` (`doc_docmotclef`),
  KEY `motclef` (`motclef_docmotclef`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `doc_motclef`
--

INSERT INTO `doc_motclef` (`id_docmotclef`, `doc_docmotclef`, `motclef_docmotclef`) VALUES
(1, 4, 3),
(2, 4, 2),
(3, 2, 1),
(4, 6, 4),
(5, 5, 3),
(6, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE IF NOT EXISTS `editeur` (
  `id_edit` int(11) NOT NULL AUTO_INCREMENT,
  `lib_edit` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_edit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`id_edit`, `lib_edit`) VALUES
(1, 'L''Harmattan'),
(2, 'La Découverte'),
(3, 'Dunod'),
(4, 'INRS');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `lib_formation` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `lib_formation`) VALUES
(1, 'SLAM'),
(2, 'SISR');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
  `lib_lang` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`id_lang`, `lib_lang`) VALUES
(1, 'FR'),
(2, 'EN');

-- --------------------------------------------------------

--
-- Structure de la table `motclef`
--

CREATE TABLE IF NOT EXISTS `motclef` (
  `id_motclef` int(11) NOT NULL AUTO_INCREMENT,
  `lib_motclef` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_motclef`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `motclef`
--

INSERT INTO `motclef` (`id_motclef`, `lib_motclef`) VALUES
(1, 'réseau'),
(2, 'Langage PHP'),
(3, 'Logiciel'),
(4, 'Langage C+'),
(5, 'Composants'),
(6, 'Base de données');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `lib_niveau` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `lib_niveau`) VALUES
(1, 'Tous'),
(2, 'Niv. V, IV'),
(3, 'Niv. III'),
(4, 'Niv. II, I');

-- --------------------------------------------------------

--
-- Structure de la table `periodique`
--

CREATE TABLE IF NOT EXISTS `periodique` (
  `id_periodique` int(11) NOT NULL AUTO_INCREMENT,
  `lib_periodique` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_periodique`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `periodique`
--

INSERT INTO `periodique` (`id_periodique`, `lib_periodique`) VALUES
(1, 'PeriodiK1'),
(2, 'PeriodiK2'),
(3, 'PeriodiK3'),
(4, 'PeriodiK4'),
(5, 'Revue Hygiène et sécurité du travail');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

CREATE TABLE IF NOT EXISTS `pret` (
  `id_prt` int(11) NOT NULL AUTO_INCREMENT,
  `dateS_prt` datetime NOT NULL,
  `dateR_prt` datetime NOT NULL,
  `user_prt` int(3) NOT NULL,
  `site_prt` int(3) NOT NULL,
  `status_prt` int(3) NOT NULL,
  `doc_prt` int(6) NOT NULL,
  PRIMARY KEY (`id_prt`),
  KEY `user` (`user_prt`),
  KEY `site` (`site_prt`),
  KEY `status-doc` (`status_prt`),
  KEY `document` (`doc_prt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pret`
--

INSERT INTO `pret` (`id_prt`, `dateS_prt`, `dateR_prt`, `user_prt`, `site_prt`, `status_prt`, `doc_prt`) VALUES
(1, '2017-12-03 00:00:00', '2017-12-30 00:00:00', 5, 1, 3, 7),
(2, '2017-12-12 00:00:00', '2018-01-12 00:00:00', 5, 1, 1, 15),
(4, '2017-12-13 00:00:00', '2017-12-18 00:00:00', 5, 1, 2, 6),
(5, '2018-03-02 00:00:00', '2018-03-17 00:00:00', 7, 1, 1, 12),
(6, '2018-01-12 00:00:00', '2018-01-31 00:00:00', 7, 1, 2, 7),
(8, '2018-02-01 00:00:00', '2018-02-19 00:00:00', 7, 1, 1, 6),
(9, '2018-03-06 00:00:00', '2018-03-23 00:00:00', 5, 2, 2, 16),
(10, '2018-03-07 00:00:00', '2018-03-31 00:00:00', 5, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `lib_promotion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `lib_promotion`) VALUES
(1, '2016-2017'),
(2, '2017-2018');

-- --------------------------------------------------------

--
-- Structure de la table `regle`
--

CREATE TABLE IF NOT EXISTS `regle` (
  `id_regle` int(11) NOT NULL AUTO_INCREMENT,
  `NB_regle` int(3) NOT NULL,
  `duree_regle` int(3) NOT NULL,
  `status_regle` int(3) NOT NULL,
  `type_regle` int(3) NOT NULL,
  PRIMARY KEY (`id_regle`),
  KEY `statut` (`status_regle`),
  KEY `typedoc` (`type_regle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reserv` int(11) NOT NULL AUTO_INCREMENT,
  `date_reserv` datetime NOT NULL,
  `user_reserv` int(3) NOT NULL,
  `doc_reserv` int(6) NOT NULL,
  PRIMARY KEY (`id_reserv`),
  KEY `user` (`user_reserv`),
  KEY `document` (`doc_reserv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reserv`, `date_reserv`, `user_reserv`, `doc_reserv`) VALUES
(17, '2017-12-29 19:08:18', 6, 16),
(21, '2017-12-29 23:15:53', 6, 2),
(22, '2018-01-04 15:18:06', 5, 4),
(28, '2018-03-09 00:00:00', 7, 5),
(29, '2018-03-03 16:08:28', 7, 10),
(30, '2018-03-03 16:10:34', 5, 6),
(34, '2018-03-08 18:07:23', 5, 16);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(11) NOT NULL AUTO_INCREMENT,
  `lib_site` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id_site`, `lib_site`) VALUES
(1, 'Avignon CDR'),
(2, 'Pertuis CDR');

-- --------------------------------------------------------

--
-- Structure de la table `status_prt`
--

CREATE TABLE IF NOT EXISTS `status_prt` (
  `id_stat_prt` int(11) NOT NULL AUTO_INCREMENT,
  `lib_stat_prt` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_stat_prt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `status_prt`
--

INSERT INTO `status_prt` (`id_stat_prt`, `lib_stat_prt`) VALUES
(1, 'Non disponible'),
(2, 'Disponible'),
(3, 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `status_user`
--

CREATE TABLE IF NOT EXISTS `status_user` (
  `id_stat_user` int(11) NOT NULL AUTO_INCREMENT,
  `lib_stat_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_stat_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `status_user`
--

INSERT INTO `status_user` (`id_stat_user`, `lib_stat_user`) VALUES
(1, 'admin'),
(2, 'apprenti'),
(3, 'formateur');

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id_suggest` int(11) NOT NULL AUTO_INCREMENT,
  `doc_suggest` int(6) NOT NULL,
  PRIMARY KEY (`id_suggest`),
  KEY `document` (`doc_suggest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `suggestion`
--

INSERT INTO `suggestion` (`id_suggest`, `doc_suggest`) VALUES
(2, 5),
(4, 7),
(3, 10),
(1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `lib_type`) VALUES
(1, 'Manuels'),
(2, 'Périodiques'),
(3, 'CD-ROM/DVD'),
(4, 'BD'),
(5, 'Romans'),
(6, 'Rapports');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CP_user` int(6) NOT NULL,
  `ville_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone_user` int(10) NOT NULL,
  `mail_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status_user` int(3) NOT NULL,
  `site_user` int(3) NOT NULL,
  `civil_user` int(3) NOT NULL,
  `promo_user` int(3) DEFAULT NULL,
  `form_user` int(3) DEFAULT NULL,
  `inscription` date NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `status` (`status_user`),
  KEY `site` (`site_user`),
  KEY `civil` (`civil_user`),
  KEY `promotion` (`promo_user`),
  KEY `formation` (`form_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mdp_user`, `adresse_user`, `CP_user`, `ville_user`, `phone_user`, `mail_user`, `status_user`, `site_user`, `civil_user`, `promo_user`, `form_user`, `inscription`) VALUES
(3, 'Dupont', 'Marcel', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'adrsse', 84000, 'ville', 682264589, 'mail@mail', 1, 1, 2, NULL, NULL, '0000-00-00'),
(5, 'Apprenti', 'Emprunteur', '7d1043473d55bfa90e8530d35801d4e381bc69f0', 'gfgfgfgfg', 84120, 'cucuron', 236589568, 'app@', 2, 2, 1, 1, 2, '0000-00-00'),
(6, 'Emprunteur', 'Formateur', 'd00b39815c187d832cef3239eb7a77580728dc47', 'qsdqsdqsqsd', 84159, 'dddddddd', 123654789, 'form@', 3, 1, 1, NULL, NULL, '0000-00-00'),
(7, 'Weber', 'Max', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'rue du soleil', 13100, 'Marseille', 685968471, 'test', 2, 2, 1, 1, 2, '0000-00-00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`doc_consult`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`type_doc`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`edit_doc`) REFERENCES `editeur` (`id_edit`),
  ADD CONSTRAINT `document_ibfk_3` FOREIGN KEY (`coll_doc`) REFERENCES `collection` (`id_collection`),
  ADD CONSTRAINT `document_ibfk_4` FOREIGN KEY (`period_doc`) REFERENCES `periodique` (`id_periodique`),
  ADD CONSTRAINT `document_ibfk_5` FOREIGN KEY (`lang_doc`) REFERENCES `langue` (`id_lang`),
  ADD CONSTRAINT `document_ibfk_6` FOREIGN KEY (`niveau_doc`) REFERENCES `niveau` (`id_niveau`),
  ADD CONSTRAINT `document_ibfk_7` FOREIGN KEY (`promo_doc`) REFERENCES `promotion` (`id_promotion`),
  ADD CONSTRAINT `document_ibfk_8` FOREIGN KEY (`form_doc`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `document_ibfk_9` FOREIGN KEY (`localisation_doc`) REFERENCES `site` (`id_site`);

--
-- Contraintes pour la table `doc_auteur`
--
ALTER TABLE `doc_auteur`
  ADD CONSTRAINT `doc_auteur_ibfk_1` FOREIGN KEY (`doc_docauteur`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `doc_motclef`
--
ALTER TABLE `doc_motclef`
  ADD CONSTRAINT `doc_motclef_ibfk_1` FOREIGN KEY (`motclef_docmotclef`) REFERENCES `motclef` (`id_motclef`),
  ADD CONSTRAINT `doc_motclef_ibfk_2` FOREIGN KEY (`doc_docmotclef`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_ibfk_1` FOREIGN KEY (`user_prt`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pret_ibfk_2` FOREIGN KEY (`site_prt`) REFERENCES `site` (`id_site`),
  ADD CONSTRAINT `pret_ibfk_3` FOREIGN KEY (`status_prt`) REFERENCES `status_prt` (`id_stat_prt`),
  ADD CONSTRAINT `pret_ibfk_4` FOREIGN KEY (`doc_prt`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `regle`
--
ALTER TABLE `regle`
  ADD CONSTRAINT `regle_ibfk_1` FOREIGN KEY (`status_regle`) REFERENCES `status_user` (`id_stat_user`),
  ADD CONSTRAINT `regle_ibfk_2` FOREIGN KEY (`type_regle`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_reserv`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`doc_reserv`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`doc_suggest`) REFERENCES `document` (`id_doc`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`status_user`) REFERENCES `status_user` (`id_stat_user`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`civil_user`) REFERENCES `civilite` (`id_civil`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`form_user`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`promo_user`) REFERENCES `promotion` (`id_promotion`),
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`site_user`) REFERENCES `site` (`id_site`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
