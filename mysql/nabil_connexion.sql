-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mai 2023 à 14:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation_via`
--

-- --------------------------------------------------------

--
-- Structure de la table `nabil_connexion`
--

DROP TABLE IF EXISTS `nabil_connexion`;
CREATE TABLE IF NOT EXISTS `nabil_connexion` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL,
  `date_connexion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `nabil_connexion`
--

INSERT INTO `nabil_connexion` (`id`, `ip`, `identifiant`, `date_connexion`) VALUES
(1, '::1', 'N', '2023-05-24 10:44:23'),
(2, '::1', 'N', '2023-05-24 10:46:40'),
(3, '::1', 'L', '2023-05-24 10:46:52'),
(4, '::1', 'N', '2023-05-24 10:58:35'),
(5, '::1', 'N', '2023-05-24 10:59:04'),
(6, '::1', 'L', '2023-05-24 11:01:58'),
(7, '::1', 'L', '2023-05-24 11:03:31'),
(8, '::1', 'L', '2023-05-24 11:03:59'),
(9, '::1', 'N', '2023-05-24 11:04:14'),
(10, '::1', 'N', '2023-05-24 11:05:39'),
(11, '::1', 'L', '2023-05-24 11:05:53'),
(12, '::1', 'L', '2023-05-24 11:14:34'),
(13, '::1', 'N', '2023-05-24 11:26:09'),
(14, '::1', 'N', '2023-05-24 14:50:49'),
(15, '::1', 'N', '2023-05-24 14:57:35'),
(16, '::1', 'N', '2023-05-24 15:01:21'),
(17, '::1', 'N', '2023-05-24 15:02:47'),
(18, '::1', 'N', '2023-05-24 15:43:04'),
(19, '::1', 'L', '2023-05-25 10:57:57'),
(20, '::1', 'N', '2023-05-25 11:17:47'),
(21, '::1', 'N', '2023-05-25 11:18:15'),
(22, '::1', 'N', '2023-05-25 11:30:39'),
(23, '::1', 'N', '2023-05-25 11:52:07'),
(24, '::1', 'N', '2023-05-25 11:54:32'),
(26, '::1', 'N', '2023-05-29 20:51:44'),
(27, '::1', 'L', '2023-05-29 20:51:55'),
(28, '::1', 'N', '2023-05-29 21:09:34'),
(29, '::1', 'N', '2023-05-29 21:09:52'),
(30, '::1', 'N', '2023-05-29 21:10:27'),
(31, '::1', 'L', '2023-05-29 21:10:57'),
(32, '::1', 'N', '2023-05-29 21:12:38'),
(33, '::1', 'L', '2023-05-29 21:12:44'),
(34, '::1', 'L', '2023-05-29 21:14:54'),
(35, '::1', 'N', '2023-05-29 22:09:14'),
(37, '::1', 'N', '2023-05-30 16:11:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
