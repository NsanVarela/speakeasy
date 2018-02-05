-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 fév. 2018 à 21:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_speakeasy`
--

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id_user`, `statut_connexion`) VALUES
(1, 'CONNECTE'),
(3, 'CONNECTE'),
(4, 'CONNECTE'),
(5, 'CONNECTE'),
(6, 'CONNECTE');

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `message`, `langue`, `date_envoi`, `date_lecture`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Latin', '2018-02-02 22:43:53', NULL);

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id_tag`, `libelle_tag`) VALUES
(1, 'Traduction'),
(2, 'Lorem ipsum'),
(3, 'dolor');

--
-- Déchargement des données de la table `tag_message`
--

INSERT INTO `tag_message` (`id_message`, `id_tag`) VALUES
(1, 1),
(1, 2),
(1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
