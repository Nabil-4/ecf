-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 mai 2023 à 14:32
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
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `descriptif` text,
  `categorie` varchar(50) DEFAULT NULL,
  `stock` int UNSIGNED DEFAULT NULL,
  `bio` varchar(20) DEFAULT NULL,
  `prix` float(5,2) DEFAULT NULL,
  `prix_promo` float(5,2) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `date_insertion` datetime DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `titre`, `descriptif`, `categorie`, `stock`, `bio`, `prix`, `prix_promo`, `tag`, `date_insertion`, `photo`) VALUES
(2, 'biere-mythos', 'sdgsg', 'alcool', 3, 'non', 14.00, 12.00, 'sucre', '2023-05-24 14:57:55', 'upload/biere-mythos.jpg'),
(3, 'ouzo', 'sghgsd', 'alcool', 4, 'non', 15.00, 11.00, 'sucre', '2023-05-24 15:01:46', 'upload/ouzo.jpg'),
(4, 'vin-blanc-assyrti', 'sgdh', 'alcool', 1, 'non', 45.00, 22.00, 'sucre', '2023-05-24 15:03:27', 'upload/vin-blanc-assyrtiko.jpg'),
(5, 'aubergines-au-the-fume', 'ghjdfhd', 'aperitif', 5, 'oui', 17.00, 4.00, 'sale', '2023-05-24 15:05:41', 'upload/aubergines-au-the-fume.jpg'),
(6, 'dolmades', 'sgdhjdh', 'aperitif', 99, 'oui', 453.00, 56.00, 'sale', '2023-05-24 15:06:49', 'upload/dolmades.jpg'),
(7, 'pistache-eigine-AOP-200g', 'hfh', 'aperitif', 8, 'oui', 56.00, 23.00, 'sale', '2023-05-24 15:43:45', 'upload/pistache-eigine-aop-200g.jpg'),
(8, 'confiture-grenade-pomme', 'dhdhd', 'miels', 5, 'oui', 850.00, 453.00, 'sucre', '2023-05-24 15:44:38', 'upload/confiture-grenade-pomme.jpg'),
(9, 'beurre-de-pistache', 'sdhgjghk', 'biscuits-et-douceurs', 77, 'oui', 8.00, 78.00, 'sale', '2023-05-24 15:45:20', 'upload/beurre-de-pistache.jpg'),
(10, 'Huile-olive-02-extra-500ml', 'dhjgjhiluesoli', 'huile-dolive', 9, 'oui', 9.00, 9.00, 'sale', '2023-05-24 15:46:02', 'upload/huile-olive-02-extra-500ml.jpg'),
(11, 'marmelade-confiture-figue-naturelle', 'dfhdfhkusgvfyqsvurgfbuyquqvfgbf', 'miels', 0, 'oui', 12.00, 12.00, 'sucre', '2023-05-25 11:00:06', 'upload/marmelade-confiture-figue-naturelle.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
