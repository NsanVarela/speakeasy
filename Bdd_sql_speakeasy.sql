-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 fév. 2018 à 10:56
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `bdd_speakeasy`
--
CREATE DATABASE IF NOT EXISTS `bdd_speakeasy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdd_speakeasy`;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id_user` int(11) NOT NULL,
  `statut_connexion` varchar(255) NOT NULL DEFAULT 'DECONNECTE',
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `langue` varchar(255) NOT NULL,
  `date_envoi` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_lecture` datetime,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag_message`
--

DROP TABLE IF EXISTS `tag_message`;
CREATE TABLE IF NOT EXISTS `tag_message` (
  `id_message` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255),
  `prenom` varchar(255),
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `photo` blob,
  `dateNaissance` varchar(10),
  `mdp` varchar(255) NOT NULL,
  `reponse` varchar(255),
  `sexe` int(1),
  `adresse` varchar(255),
  `langue` varchar(255),
  `description` text NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `user`
--
DROP TRIGGER IF EXISTS `after_delete_inscription_trigger`;
DELIMITER $$
CREATE TRIGGER `after_delete_inscription_trigger` AFTER DELETE ON `user` FOR EACH ROW DELETE FROM connexion WHERE id_user = id_user
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_inscription_trigger`;
DELIMITER $$
CREATE TRIGGER `after_insert_inscription_trigger` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO connexion (id_user, statut_connexion) VALUES (NEW.id_user, 'CONNECTE')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `user_message`
--

DROP TABLE IF EXISTS `user_message`;
CREATE TABLE IF NOT EXISTS `user_message` (
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;