-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 06 fév. 2023 à 10:40
-- Version du serveur : 8.0.32-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `education`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int NOT NULL,
  `nom_departement` text NOT NULL,
  `description` text NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom_departement`, `description`, `updated_at`, `create_at`, `statut`) VALUES
(1, 'Orlandsupp', 'Emme', '2023-02-02 15:41:20', '2023-01-18 14:09:17', 'active'),
(2, 'kom', 'oma', '2023-01-27 13:35:04', '2023-01-18 14:09:17', 'active'),
(3, 'Leann', 'O\'Connell', '2023-01-27 13:35:46', '2023-01-18 14:09:17', 'active'),
(4, 'eeefesupprimersupprimer', '4', '2023-01-27 13:22:08', '2023-01-18 14:09:17', 'active'),
(5, 'Justus', 'Wuckert', '2023-01-18 14:09:18', '2023-01-18 14:09:18', 'active'),
(6, 'komm', 'oma', '2023-01-20 14:10:25', '2023-01-18 14:09:18', 'active'),
(7, 'Laverna', 'Stehr', '2023-01-18 14:09:18', '2023-01-18 14:09:18', 'active'),
(8, 'Aracely', 'Spencer', '2023-01-18 14:09:19', '2023-01-18 14:09:19', 'active'),
(9, 'Mozell', 'Batz', '2023-01-27 13:35:30', '2023-01-18 14:09:19', 'active'),
(10, 'Sharon', 'Bins', '2023-01-18 14:09:19', '2023-01-18 14:09:19', 'active'),
(11, 'sult', 'bonjour', '2023-01-19 02:21:26', '2023-01-19 02:21:26', 'active'),
(12, 'nvcr', 'njnjj', '2023-01-19 10:01:13', '2023-01-19 10:01:13', 'active'),
(13, 'nss', 'n', '2023-01-26 12:30:43', '2023-01-26 12:30:43', 'active'),
(14, 'ddd', 'dddd', '2023-01-26 12:35:53', '2023-01-26 12:35:53', 'active'),
(15, 'fdfdfd', 'fsdfdd', '2023-01-26 12:41:46', '2023-01-26 12:41:46', 'active'),
(16, 'wdhjwgd', 'ddwdw', '2023-01-26 13:05:40', '2023-01-26 13:05:40', 'active'),
(17, 'qqqqq', 'qqqqqdddd', '2023-01-26 13:52:02', '2023-01-26 13:52:02', 'active'),
(18, 'kjkk', 'kkk', '2023-01-27 04:02:52', '2023-01-27 04:02:52', 'active'),
(19, 'fesff', 'fesefe', '2023-01-27 13:45:51', '2023-01-27 13:45:51', 'active'),
(20, 'fhjehfs', 'oeufiehihfe', '2023-01-30 10:38:08', '2023-01-30 10:38:08', 'active'),
(21, 'hfdjf', 'fdfh', '2023-01-30 11:16:29', '2023-01-30 11:16:29', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `enroulement`
--

CREATE TABLE `enroulement` (
  `id_enroulement` int NOT NULL,
  `Annee_academique` date NOT NULL,
  `id_etudiant` int NOT NULL,
  `id_niveau` int NOT NULL,
  `id_specialite` int NOT NULL,
  `enroulement_updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enroulement_create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `enroulement`
--

INSERT INTO `enroulement` (`id_enroulement`, `Annee_academique`, `id_etudiant`, `id_niveau`, `id_specialite`, `enroulement_updated_at`, `enroulement_create_at`, `statut`) VALUES
(1, '1983-05-04', 51, 8, 9, '2023-01-18 15:02:39', '2023-01-18 15:02:39', 'active'),
(2, '2021-12-12', 90, 4, 6, '2023-01-27 17:25:57', '2023-01-18 15:02:39', 'supprimer'),
(4, '2010-01-29', 34, 1, 9, '2023-01-23 13:28:44', '2023-01-18 15:05:16', 'supprimer'),
(5, '2012-05-20', 36, 8, 9, '2023-01-18 15:05:16', '2023-01-18 15:05:16', 'active'),
(6, '1976-10-28', 16, 9, 3, '2023-01-18 15:05:17', '2023-01-18 15:05:17', 'active'),
(7, '2002-04-10', 51, 9, 2, '2023-01-18 15:05:17', '2023-01-18 15:05:17', 'active'),
(8, '1993-06-26', 33, 2, 8, '2023-01-18 15:05:17', '2023-01-18 15:05:17', 'active'),
(9, '1973-09-14', 86, 9, 10, '2023-01-18 15:05:17', '2023-01-18 15:05:17', 'active'),
(10, '1983-10-03', 97, 7, 5, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(11, '2001-11-16', 43, 8, 2, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(12, '1982-05-10', 36, 4, 7, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(13, '2018-06-06', 98, 10, 4, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(14, '2012-03-01', 42, 10, 2, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(15, '2013-04-03', 82, 5, 2, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(16, '2019-04-07', 28, 1, 6, '2023-01-18 15:05:18', '2023-01-18 15:05:18', 'active'),
(17, '2017-06-11', 76, 6, 4, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(18, '1973-05-22', 64, 10, 7, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(19, '2017-02-05', 49, 4, 2, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(20, '2022-12-30', 30, 1, 8, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(21, '1983-06-09', 94, 10, 4, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(22, '1993-01-11', 59, 2, 5, '2023-01-18 15:05:19', '2023-01-18 15:05:19', 'active'),
(23, '1997-06-16', 69, 4, 2, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(24, '1975-12-11', 42, 8, 9, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(25, '1989-03-20', 58, 9, 7, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(26, '1986-05-09', 25, 7, 4, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(27, '2007-11-13', 53, 4, 4, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(28, '2018-01-02', 2, 3, 7, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(29, '2008-11-05', 44, 5, 6, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(30, '2014-09-14', 57, 5, 6, '2023-01-18 15:05:20', '2023-01-18 15:05:20', 'active'),
(31, '1976-01-20', 2, 4, 5, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(32, '2005-09-23', 40, 4, 5, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(33, '1994-06-21', 8, 4, 6, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(34, '1976-12-28', 68, 4, 3, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(35, '1996-12-31', 59, 7, 5, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(36, '1975-08-21', 14, 1, 3, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(37, '2016-07-13', 17, 2, 5, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(38, '2002-10-26', 87, 4, 7, '2023-01-18 15:05:21', '2023-01-18 15:05:21', 'active'),
(39, '1995-02-28', 70, 8, 10, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(40, '1986-07-29', 45, 10, 7, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(41, '2009-12-20', 19, 5, 2, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(42, '2006-10-21', 59, 10, 7, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(43, '1972-12-25', 52, 6, 7, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(44, '2000-11-01', 42, 8, 6, '2023-01-18 15:05:22', '2023-01-18 15:05:22', 'active'),
(45, '1980-05-28', 1, 7, 8, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(46, '2015-12-02', 21, 2, 5, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(47, '1978-01-27', 37, 8, 6, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(48, '1994-03-12', 47, 10, 5, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(49, '2000-06-16', 96, 9, 6, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(50, '2009-01-30', 49, 6, 10, '2023-01-18 15:05:23', '2023-01-18 15:05:23', 'active'),
(51, '1994-11-10', 89, 7, 11, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(52, '1973-01-09', 55, 10, 5, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(53, '1988-12-29', 91, 7, 6, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(54, '1975-07-09', 53, 1, 11, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(55, '1996-10-19', 84, 5, 9, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(56, '2002-02-12', 99, 5, 2, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(57, '2015-01-22', 17, 5, 9, '2023-01-18 15:05:24', '2023-01-18 15:05:24', 'active'),
(58, '2022-04-20', 16, 2, 9, '2023-01-27 16:17:56', '2023-01-18 15:05:25', 'supprimer'),
(59, '2017-01-29', 7, 5, 10, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(60, '1987-06-07', 68, 10, 3, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(61, '2008-05-25', 71, 4, 2, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(62, '1981-06-12', 20, 7, 3, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(63, '2020-06-24', 30, 6, 10, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(64, '1994-08-29', 86, 4, 2, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(65, '2017-05-19', 65, 7, 11, '2023-01-18 15:05:25', '2023-01-18 15:05:25', 'active'),
(66, '1992-01-03', 76, 4, 3, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(67, '2015-04-30', 66, 10, 4, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(68, '1991-08-09', 32, 2, 3, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(69, '2003-11-14', 12, 9, 11, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(70, '2005-10-05', 41, 10, 11, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(71, '1998-10-02', 7, 9, 3, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(72, '1973-06-25', 38, 2, 11, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(73, '1979-09-07', 70, 1, 3, '2023-01-18 15:05:26', '2023-01-18 15:05:26', 'active'),
(74, '2014-10-27', 70, 5, 6, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(75, '2016-07-19', 70, 6, 8, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(76, '1981-02-05', 23, 10, 9, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(77, '2003-05-25', 31, 2, 9, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(78, '1977-08-30', 3, 4, 11, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(79, '1999-12-23', 99, 7, 6, '2023-01-18 15:05:27', '2023-01-18 15:05:27', 'active'),
(80, '2013-10-17', 45, 4, 10, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(81, '2012-06-10', 84, 3, 5, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(82, '1975-06-20', 5, 9, 4, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(83, '2014-11-20', 63, 9, 3, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(84, '1979-07-18', 95, 7, 10, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(85, '1971-05-31', 18, 7, 2, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(86, '2007-02-04', 71, 1, 7, '2023-01-18 15:05:28', '2023-01-18 15:05:28', 'active'),
(87, '1971-10-31', 93, 8, 4, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(88, '1983-10-29', 69, 8, 5, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(89, '1992-11-03', 29, 2, 4, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(90, '1989-12-10', 95, 4, 9, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(91, '1994-09-08', 99, 6, 6, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(92, '2010-09-28', 100, 3, 7, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(93, '2002-01-06', 29, 2, 2, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(94, '1995-06-13', 82, 3, 6, '2023-01-18 15:05:29', '2023-01-18 15:05:29', 'active'),
(95, '1972-12-04', 31, 8, 2, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(96, '2000-08-07', 63, 4, 10, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(97, '2013-06-26', 65, 1, 4, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(98, '2007-02-25', 61, 7, 10, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(99, '2005-07-04', 62, 8, 8, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(100, '2017-05-19', 78, 10, 8, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(101, '1998-02-07', 36, 10, 4, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(102, '1973-08-31', 64, 3, 6, '2023-01-18 15:05:30', '2023-01-18 15:05:30', 'active'),
(103, '1992-06-19', 95, 5, 2, '2023-01-18 15:05:31', '2023-01-18 15:05:31', 'active'),
(104, '2023-02-09', 3, 4, 5, '2023-01-23 12:51:13', '2023-01-23 12:51:13', 'active'),
(105, '2023-01-20', 51, 2, 2, '2023-01-28 13:34:21', '2023-01-28 13:34:21', 'active'),
(106, '2023-02-03', 101, 7, 6, '2023-02-03 16:38:15', '2023-02-03 16:38:15', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_naissance` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `etudiant_updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `etudiant_create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `date_naissance`, `image`, `etudiant_updated_at`, `etudiant_create_at`, `statut`) VALUES
(1, 'Wadesjjj', 'Travon Hammes', '1987-07-07', 'Monserrat Stehr', '2023-01-27 15:06:10', '2023-01-18 13:47:05', 'supprimer'),
(2, 'Prof. Lloyd Ullrich IIIuuu', 'Trent Kemmer', '1983-11-28', 'Winnifred Wardb', '2023-01-26 16:14:56', '2023-01-18 13:47:05', 'supprimer'),
(3, 'ssss', 'cxd', '0000-00-00', 'ddd', '2023-01-27 05:33:38', '2023-01-18 13:47:05', 'supprimer'),
(4, 'Ladarius Bosco', 'Kaitlyn Shields', '2011-12-31', 'Mrs. Alberta Yundt', '2023-01-18 13:47:05', '2023-01-18 13:47:05', 'active'),
(5, 'Prof. Mariana Hirthe', 'Monroe Bosco', '2011-03-24', 'Kailey Reinger', '2023-01-18 13:47:06', '2023-01-18 13:47:06', 'active'),
(6, 'Jamey Parker', 'Prof. Alphonso Schoen Jr.', '2010-09-20', 'Litzy Jones', '2023-01-18 13:47:06', '2023-01-18 13:47:06', 'active'),
(7, 'Myrna Nikolaus', 'Mrs. Colleen Rippin', '1976-11-23', 'Mr. Diego Flatley III', '2023-01-18 13:47:06', '2023-01-18 13:47:06', 'active'),
(8, 'Mr. Evans Rogahn Jr.', 'Nick Kuhlman DVM', '2003-01-10', 'Mikel Morissette', '2023-01-18 13:47:06', '2023-01-18 13:47:06', 'active'),
(9, 'Dakota Fritsch', 'Cathryn Frami', '2000-10-05', 'Victoria DuBuque', '2023-01-20 14:33:55', '2023-01-18 13:47:06', 'supprimer'),
(10, 'Reyna Osinski III', 'Paris O\'Connell', '1988-01-08', 'Prof. Janie Grimes DDS', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(11, 'Saige Kihn', 'Dr. Lon Hamill', '1973-10-02', 'Mrs. Sunny Schuppe', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(12, 'Dr. Antwon Goodwin', 'Danielle Ledner IV', '1987-06-11', 'Trisha Ondricka', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(13, 'Vicenta O\'Kon', 'Leopoldo Botsford', '2018-03-15', 'Beth Shields', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(14, 'Monroe Reichert', 'Rosella Rohan', '2016-02-18', 'Keely Baumbach', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(15, 'Blanche Huel', 'Jade Mills', '1970-05-03', 'Lavina Crooks MD', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(16, 'Eudora Adams', 'Maybell Kemmer', '2020-01-27', 'Felipe Parisian MD', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(17, 'Mr. Damon Braun', 'Johnathan Witting', '2002-04-07', 'Eugene Kub', '2023-01-18 13:47:07', '2023-01-18 13:47:07', 'active'),
(18, 'Oral Mayert PhD', 'Dessie Denesik DDS', '2005-05-27', 'Dr. Mathias Christiansen', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(19, 'Irving Champlin', 'Danny Greenholt', '2003-06-26', 'Stuart Brakus', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(20, 'Prof. Jazmyne Sanford II', 'Miss Gloria Goldner', '2015-05-30', 'Olaf Lang', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(21, 'Dr. Domenico Luettgen II', 'Camron Kreiger', '1982-06-10', 'Miss Brielle McGlynn I', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(22, 'Prof. Liana Hand', 'Prof. Yadira Wilkinson II', '1997-12-23', 'Rowan Wisozk', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(23, 'Kaylin Emard IV', 'Ms. Estell Mayer', '1986-06-13', 'Derick Runolfsdottir IV', '2023-01-18 13:47:08', '2023-01-18 13:47:08', 'active'),
(24, 'Francesco Leannon', 'Jarrod Casper', '1994-03-20', 'Prof. Roel Considine', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(25, 'Camren Rowe', 'Lessie Gutmann V', '2023-01-12', 'Miss Mariah Cremin', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(26, 'Dr. Halie Hodkiewicz Sr.', 'Jennyfer Bashirian', '1978-11-28', 'Mr. Hudson Stark', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(27, 'Adelia Kerluke', 'Ibrahim Grimes', '2012-03-28', 'Frances McGlynn', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(28, 'Lorine Schaden', 'Efren Moen IV', '1991-12-27', 'Garret King', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(29, 'Hilbert Hills', 'Nigel Dicki', '1996-06-04', 'Prof. Evan Pfannerstill II', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(30, 'Leon Adams', 'Nikko Reilly', '1997-09-13', 'Donnie McLaughlin', '2023-01-18 13:47:09', '2023-01-18 13:47:09', 'active'),
(31, 'Tevin Kunde Jr.', 'Ms. Taya Wehner', '1982-09-28', 'Eileen Schumm', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(32, 'Ms. Alysa Mueller', 'Miss Linnea Kertzmann', '2012-08-14', 'Miss Zaria Wunsch PhD', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(33, 'Dolores Eichmann', 'Vernice Schumm', '1970-02-21', 'Dr. Amir Kling DVM', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(34, 'Mr. Ransom Waelchi Jr.', 'Noah Towne', '2002-05-30', 'Krystal Daugherty PhD', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(35, 'Alfonso Hills', 'Irma Bartoletti', '1991-06-15', 'Muhammad Bechtelar', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(36, 'Ms. Eda Kunde', 'Fredy Borer', '1972-08-16', 'Prof. Abner Boyle', '2023-01-18 13:47:10', '2023-01-18 13:47:10', 'active'),
(37, 'Ramiro Watsica', 'Roberto Senger', '1971-09-30', 'Viva Kris', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(38, 'Daron Prohaska', 'Werner Davis', '1994-08-04', 'Sylvester Williamson', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(39, 'Dr. Brenna Steuber Jr.', 'Christiana Watsica', '1981-02-23', 'Noble Gerhold', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(40, 'Mrs. Dawn Denesik', 'Mr. Gabriel Trantow', '1987-03-17', 'Dr. Kurt Russel II', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(41, 'Prof. Dorcas McClure', 'Dr. Joany McClure MD', '1998-06-23', 'Dulce Kuphal', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(42, 'Alec Buckridge V', 'Prof. Tobin D\'Amore Jr.', '1977-03-16', 'Marisol Rodriguez', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(43, 'Helmer Goodwin', 'Madonna O\'Reilly', '1978-01-26', 'Mrs. Fay Bogisich DDS', '2023-01-18 13:47:11', '2023-01-18 13:47:11', 'active'),
(44, 'Mrs. Luisa Will III', 'Trevor Schulist DDS', '2001-04-01', 'Bennett Gorczany', '2023-01-18 13:47:12', '2023-01-18 13:47:12', 'active'),
(45, 'Chaya Huels I', 'Alexie Baumbach', '1993-05-08', 'Kenna Volkman', '2023-01-18 13:47:12', '2023-01-18 13:47:12', 'active'),
(46, 'Felipe Hintz V', 'Wellington Beatty', '1991-11-04', 'Sheldon Gerhold', '2023-01-18 13:47:12', '2023-01-18 13:47:12', 'active'),
(47, 'Brando McClure', 'Miss Violette Von Sr.', '1986-04-19', 'Liliana Littel', '2023-01-18 13:47:12', '2023-01-18 13:47:12', 'active'),
(48, 'Mr. Gonzalo Stokes', 'Dr. Greg Dare', '1989-06-02', 'Ray Ryan', '2023-01-18 13:47:12', '2023-01-18 13:47:12', 'active'),
(49, 'Miss Martina Rowe', 'Ryann Jast', '2005-09-12', 'Dejah Watsica', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(50, 'Dr. Monte Huel', 'Reginald Bernier', '1988-05-01', 'Olga Metz', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(51, 'Ms. Asa Schinner', 'Karelle Breitenberg', '1980-04-10', 'Camille McClure', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(52, 'Miss Anita Dare', 'Dr. Enid Boehm III', '2021-02-01', 'Marco Klocko II', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(53, 'Philip Hegmann DDS', 'Maryjane Nader', '2013-01-17', 'Rowena Johns', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(54, 'Heloise Schultz', 'Shawna Shields', '1989-07-22', 'Alek Skiles', '2023-01-18 13:47:13', '2023-01-18 13:47:13', 'active'),
(55, 'Eldora Morar', 'Catherine Swift', '1980-06-05', 'Abdullah Legros', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(56, 'Dr. Jude Dietrich', 'Oda Koepp', '1977-10-12', 'Alford Hackett', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(57, 'Marisol Hahn I', 'Terry McClure', '2013-12-04', 'Ezequiel Dooley', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(58, 'Richard Torp', 'Amy Durgan', '2021-09-08', 'Bret Ziemann', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(59, 'Misael Leannon II', 'Mrs. Daisy Armstrong II', '1976-06-28', 'Jannie Padberg', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(60, 'Myrna Kirlin', 'Elsa Hartmann', '1990-05-31', 'Alverta Mayert', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(61, 'Moriah Huels', 'Elton Swift', '1992-08-22', 'Ms. Rosa Kovacek IV', '2023-01-18 13:47:14', '2023-01-18 13:47:14', 'active'),
(62, 'Mr. Braulio Brown', 'Prof. Coby Conroy', '1986-06-15', 'Dr. Christopher Brown', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(63, 'Waino Aufderhar', 'Adeline Beer Jr.', '2018-03-28', 'Pablo Olson', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(64, 'Myah Stamm', 'Maximillian Oberbrunner', '1982-05-16', 'Jess Kuhn', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(65, 'Sadie Spencer PhD', 'Ashtyn Miller IV', '2014-07-10', 'Deshaun DuBuque', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(66, 'Myrl Dickinson', 'Trinity Koss', '1998-05-07', 'Ariane Pfannerstill V', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(67, 'Mr. Hiram Hermiston', 'Mrs. Kaela Brakus', '1994-04-17', 'Joanne Jakubowski', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(68, 'Sallie Keebler', 'Mrs. Althea Kunze', '1972-10-06', 'Maritza Hagenes', '2023-01-18 13:47:15', '2023-01-18 13:47:15', 'active'),
(69, 'Loy Collier IV', 'Prof. Mona Hammes', '1979-09-18', 'Gwendolyn Ullrich', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(70, 'Stewart Bode', 'Jackson Gislason', '2002-11-29', 'Prince Mayert', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(71, 'Dr. Michel Zulauf', 'Maya Weimann PhD', '1990-09-24', 'Sydnie Lakin', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(72, 'Eli Beer', 'Mr. Skye Howell', '2008-02-08', 'Dr. Libbie West III', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(73, 'Prof. Conor Armstrong I', 'Wilhelmine Sipes', '1973-01-10', 'Olga Romaguera MD', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(74, 'Mr. Russ Jast I', 'Dr. Dell Nicolas', '1999-07-22', 'Prof. Patsy Schmidt', '2023-01-18 13:47:16', '2023-01-18 13:47:16', 'active'),
(75, 'Alysson Konopelski', 'Louvenia Abbott', '1998-12-09', 'Mr. Kenyon Zieme', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(76, 'Prof. Garett Collins', 'Manuela Eichmann', '2003-09-22', 'Muhammad Koss IV', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(77, 'Nels Hegmann', 'Dr. Dolly Moore', '2019-01-20', 'Damian Rosenbaum', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(78, 'Drake Kuhic', 'Dr. Hilario Bailey', '1977-05-17', 'Amparo Christiansen V', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(79, 'Sunny Harvey', 'Rahul Kuhlman', '1989-02-27', 'Prof. Tom Wyman Jr.', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(80, 'Sandrine Gibson III', 'Shyanne Powlowski', '2002-02-24', 'Brody Harvey', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(81, 'Prof. Jennyfer Rosenbaum I', 'Prof. Elissa Lynch', '2002-04-07', 'Mariane Gerhold DVM', '2023-01-18 13:47:17', '2023-01-18 13:47:17', 'active'),
(82, 'Ned Hahn', 'Arthur Effertz', '1974-08-22', 'Micaela Fay', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(83, 'Felix DuBuque DDS', 'Charlene Schmitt DVM', '2008-11-12', 'Josefa Altenwerth', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(84, 'Loyal Turcotte', 'Prof. Ruben Beier', '2013-07-20', 'Sammy Hermiston', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(85, 'Destiny Harvey', 'Rosina Torp', '1982-07-27', 'Dahlia Brekke', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(86, 'Prof. Ella Kreiger', 'Prof. Oscar O\'Connell', '1984-08-02', 'Johnpaul Stokes', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(87, 'Stanton Padberg', 'Jannie Torp DVM', '2004-04-26', 'Lonzo Lesch', '2023-01-18 13:47:18', '2023-01-18 13:47:18', 'active'),
(88, 'Alyce Howell', 'Dr. Alisha Hill V', '1990-11-19', 'Makenna Schamberger', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(89, 'Armani O\'Hara', 'Mr. Bradford Turcotte Sr.', '1989-03-09', 'Kane Balistreri', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(90, 'Dr. Trey Grady', 'Tyree Wyman', '2021-01-21', 'Dr. Federico Pacocha DVM', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(91, 'Abby McKenzie', 'Caden Armstrong', '1992-09-17', 'Wendy Dicki', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(92, 'Dr. Cassandre Yundt PhD', 'Ms. Savanah Hudson III', '2012-09-24', 'Nick Gerlach V', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(93, 'Prof. Genoveva Yost', 'Malinda Rice', '1977-02-19', 'Gillian Kertzmann DDS', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(94, 'Jess Altenwerth', 'Gertrude Johns', '1992-03-27', 'Rosanna Osinski', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(95, 'Devon Keebler DDS', 'Prof. Nadia Pagac', '2000-10-14', 'Hunter Mitchell Sr.', '2023-01-18 13:47:19', '2023-01-18 13:47:19', 'active'),
(96, 'Gladyce Langosh', 'Mrs. Constance Braun', '1995-01-29', 'Madalyn Waelchi', '2023-01-18 13:47:20', '2023-01-18 13:47:20', 'active'),
(97, 'Dr. April Dooley III', 'Emiliano Shanahan', '2016-07-17', 'Demarcus Corkery', '2023-01-18 13:47:20', '2023-01-18 13:47:20', 'active'),
(98, 'Adam McGlynn', 'Onie Bednar', '2015-10-07', 'Gillian Hegmann Jr.', '2023-01-18 13:47:20', '2023-01-18 13:47:20', 'active'),
(99, 'Cassie Spinka', 'Ellsworth McLaughlin', '2014-02-22', 'Maria Funk DVM', '2023-01-18 13:47:20', '2023-01-18 13:47:20', 'active'),
(100, 'Serenity Bogan', 'Reynold Lueilwitz', '1994-02-23', 'Jettie Osinski', '2023-01-18 13:47:20', '2023-01-18 13:47:20', 'active'),
(101, 'komm', 'christ', '2016-02-17', 'ko', '2023-01-19 02:57:29', '2023-01-19 02:57:29', 'active'),
(102, 'kkkk', 'hhhh', '2012-02-11', 'okm', '2023-01-19 10:08:28', '2023-01-19 10:08:28', 'active'),
(103, 'gewhfehgfhe', 'fewfefewg', '2000-01-12', 'sfsfsfsfs', '2023-01-27 11:39:11', '2023-01-27 11:39:11', 'active'),
(104, 'SDSDSDSD', 'DSDSDSF', '2023-01-12', 'DSDSDS', '2023-01-27 11:40:01', '2023-01-27 11:40:01', 'active'),
(105, 'KCLSADCHJCKJSA', 'IASCKJKJCCKASKCKAJC', '2023-01-13', 'KKJJAGSHASJSCA', '2023-01-27 11:41:34', '2023-01-27 11:41:34', 'active'),
(106, 'rge', 'gergeg', '2023-01-26', 'rgege', '2023-01-27 15:14:37', '2023-01-27 15:14:37', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2023-01-16-143827', 'App\\Database\\Migrations\\User', 'default', 'App', 1673959279, 1),
(4, '2023-01-17-113630', 'App\\Database\\Migrations\\Departement', 'default', 'App', 1673959281, 1),
(5, '2023-01-17-131555', 'App\\Database\\Migrations\\Niveau', 'default', 'App', 1673962783, 2),
(6, '2023-01-17-134828', 'App\\Database\\Migrations\\Specialite', 'default', 'App', 1673964621, 3),
(8, '2023-01-17-142329', 'App\\Database\\Migrations\\Etudiant', 'default', 'App', 1674033772, 4),
(9, '2023-01-18-092859', 'App\\Database\\Migrations\\Specialite', 'default', 'App', 1674034421, 5),
(10, '2023-01-18-093506', 'App\\Database\\Migrations\\Enroulement', 'default', 'App', 1674035028, 6);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int NOT NULL,
  `nom_niveau` text NOT NULL,
  `niveau_updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `niveau_create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `nom_niveau`, `niveau_updated_at`, `niveau_create_at`, `statut`) VALUES
(1, 'Presley Aufeew', '2023-01-27 14:00:24', '2023-01-18 13:46:14', 'supprimer'),
(2, 'Payton Powlowski', '2023-01-18 13:46:14', '2023-01-18 13:46:14', 'active'),
(3, 'Verla Hamill', '2023-01-18 13:46:14', '2023-01-18 13:46:14', 'active'),
(4, 'Dr. Foster O\'Conner', '2023-01-18 13:46:14', '2023-01-18 13:46:14', 'active'),
(5, 'niveau3', '2023-01-19 12:24:43', '2023-01-18 13:46:15', 'supprimer'),
(6, 'Schuyler Cartwright DVM', '2023-01-19 11:45:06', '2023-01-18 13:46:15', 'supprimer'),
(7, 'niveau5', '2023-01-20 12:24:14', '2023-01-18 13:46:15', 'active'),
(8, 'Dr. Nolan Simonis', '2023-01-18 13:46:15', '2023-01-18 13:46:15', 'active'),
(9, 'Keely Spinka', '2023-01-18 13:46:16', '2023-01-18 13:46:16', 'active'),
(10, 'Arlene Ratke', '2023-01-18 13:46:16', '2023-01-18 13:46:16', 'active'),
(11, 'niveau1', '2023-01-18 16:56:49', '2023-01-18 16:56:49', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int NOT NULL,
  `id_departement` int NOT NULL,
  `nom_specialite` text NOT NULL,
  `description_spe` text NOT NULL,
  `specialite_updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `specialite_create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `id_departement`, `nom_specialite`, `description_spe`, `specialite_updated_at`, `specialite_create_at`, `statut`) VALUES
(2, 7, 'Brenden', 'Wisozk', '2023-01-18 14:33:38', '2023-01-18 14:33:38', 'active'),
(3, 2, 'Melvinadd', 'Sengeredd', '2023-01-30 15:09:22', '2023-01-18 14:33:38', 'active'),
(4, 7, 'mavaa', 'oma', '2023-01-27 13:36:13', '2023-01-18 14:33:38', 'active'),
(5, 6, 'Sierra', 'Dietrich', '2023-01-18 14:33:38', '2023-01-18 14:33:38', 'active'),
(6, 6, 'komm', 'oma', '2023-01-23 11:02:17', '2023-01-18 14:33:39', 'active'),
(7, 8, 'Dina', 'Rutherford', '2023-01-18 14:33:39', '2023-01-18 14:33:39', 'active'),
(8, 7, 'Duane', 'Grady', '2023-01-27 13:36:31', '2023-01-18 14:33:39', 'active'),
(9, 7, 'Ahmed', 'Miller', '2023-01-18 14:33:39', '2023-01-18 14:33:39', 'active'),
(10, 2, 'Orlando', 'Goldner', '2023-01-18 14:33:39', '2023-01-18 14:33:39', 'active'),
(11, 4, 'Lisamnerkng', 'Bernhardmrerng', '2023-02-01 11:21:44', '2023-01-18 14:33:40', 'active'),
(14, 6, 'sierraa', 'dsfewf', '2023-01-23 10:10:21', '2023-01-23 10:10:21', 'active'),
(15, 3, 'sssdd', 'dddsdsffdff', '2023-02-02 15:41:52', '2023-01-27 13:02:18', 'active'),
(16, 7, 'ddss', 'ssss', '2023-01-28 12:33:29', '2023-01-28 12:33:29', 'active'),
(17, 2, 'dddd', 'dddd', '2023-01-30 13:17:54', '2023-01-30 13:17:54', 'active'),
(18, 3, 'eeeeeee', 'eeeeee', '2023-01-30 13:19:10', '2023-01-30 13:19:10', 'active'),
(19, 2, 'sssss', 'ssssss', '2023-01-30 13:23:09', '2023-01-30 13:23:09', 'active'),
(21, 3, 'jfjf', 'jrjrfjr', '2023-01-30 15:29:13', '2023-01-30 15:29:13', 'active'),
(22, 2, 'stive', 'stive', '2023-02-02 15:36:03', '2023-02-02 15:36:03', 'active'),
(23, 1, 'yyyyyy', 'yyyyyyyyy', '2023-02-02 15:36:40', '2023-02-02 15:36:40', 'active'),
(24, 3, 'mcv', 'mcv', '2023-02-02 16:06:50', '2023-02-02 15:37:56', 'active'),
(25, 6, 'yo', 'bonjour', '2023-02-03 08:58:21', '2023-02-03 08:58:21', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_updated_at`, `user_create_at`, `statut`) VALUES
(1, 'Quinten Lehner', 'slarson@yahoo.com', '2023-01-18 12:35:40', '2023-01-18 12:35:40', 'active'),
(2, 'Marcel Beahan', 'rhiannon.hayes@hotmail.com', '2023-01-18 12:35:40', '2023-01-18 12:35:40', 'active'),
(3, 'Miss Libby Walter II', 'westley69@hotmail.com', '2023-01-18 12:35:40', '2023-01-18 12:35:40', 'active'),
(4, 'Danial Kuvalis', 'keeling.genoveva@thompson.com', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(5, 'Ms. Liana Olson', 'zoey.krajcik@hotmail.com', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(6, 'Rudy Medhurst', 'ghills@grimes.biz', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(7, 'Hope Grimes DVM', 'deichmann@hotmail.com', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(8, 'Candelario Leuschke', 'hessel.caden@blick.biz', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(9, 'Lorenz McClure', 'bailee.bogisich@mcclure.com', '2023-01-18 12:35:41', '2023-01-18 12:35:41', 'active'),
(10, 'Jarrett Rolfson', 'oberbrunner.fay@dare.org', '2023-01-18 12:35:42', '2023-01-18 12:35:42', 'active');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `enroulement`
--
ALTER TABLE `enroulement`
  ADD PRIMARY KEY (`id_enroulement`),
  ADD KEY `enroulement_id_etudiant_foreign` (`id_etudiant`),
  ADD KEY `enroulement_id_niveau_foreign` (`id_niveau`),
  ADD KEY `enroulement_id_specialite_foreign` (`id_specialite`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`),
  ADD KEY `specialite_id_departement_foreign` (`id_departement`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `enroulement`
--
ALTER TABLE `enroulement`
  MODIFY `id_enroulement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enroulement`
--
ALTER TABLE `enroulement`
  ADD CONSTRAINT `enroulement_id_etudiant_foreign` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `enroulement_id_niveau_foreign` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`),
  ADD CONSTRAINT `enroulement_id_specialite_foreign` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id_specialite`);

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `specialite_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
