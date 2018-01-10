# Initialization script for Database

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 jan. 2018 à 16:09
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ProjetS4`
--

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

DROP TABLE IF EXISTS `Role`;
CREATE TABLE IF NOT EXISTS `Role` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `Classe`;
CREATE TABLE IF NOT EXISTS `Classe` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Utilisateur`
--

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Eleve`
--

DROP TABLE IF EXISTS `Eleve`;
CREATE TABLE IF NOT EXISTS `Eleve` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe` bigint(20) UNSIGNED DEFAULT NULL,
  `pastille` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `id` (`id`),
  KEY `classe` (`classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Personnel`
--

DROP TABLE IF EXISTS `Personnel`;
CREATE TABLE IF NOT EXISTS `Personnel` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `motdepasse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Theme`
--

DROP TABLE IF EXISTS `Theme`;
CREATE TABLE IF NOT EXISTS `Theme` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbLivre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Auteur`
--

DROP TABLE IF EXISTS `Auteur`;
CREATE TABLE IF NOT EXISTS `Auteur` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Structure de la table `Livre`
--

DROP TABLE IF EXISTS `Livre`;
CREATE TABLE IF NOT EXISTS `Livre` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isbn` int(13) DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auteur` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parution` date DEFAULT NULL,
  `couverture` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `LivreTheme`
--

DROP TABLE IF EXISTS `LivreTheme`;
CREATE TABLE IF NOT EXISTS `LivreTheme` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_theme` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `id_livre` (`id_livre`),
  KEY `id_theme` (`id_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Emprunt`
--

DROP TABLE IF EXISTS `Emprunt`;
CREATE TABLE IF NOT EXISTS `Emprunt` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_eleve` bigint(20) UNSIGNED DEFAULT NULL,
  `dateEmprunt` date DEFAULT NULL,
  `dateRendu` date DEFAULT NULL,
  KEY `id_livre` (`id_livre`),
  KEY `id_eleve` (`id_eleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Structure de la table `Rallye`
--

DROP TABLE IF EXISTS `Rallye`;
CREATE TABLE IF NOT EXISTS `Rallye` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nbLivre` int(5) DEFAULT NULL,
  `theme` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Structure de la table `LivreRallye`
--

DROP TABLE IF EXISTS `LivreRallye`;
CREATE TABLE IF NOT EXISTS `LivreRallye` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rallye` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `id_livre` (`id_livre`),
  KEY `id_rallye` (`id_rallye`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD CONSTRAINT `Eleve_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`),
  ADD CONSTRAINT `Eleve_ibfk_2` FOREIGN KEY (`classe`) REFERENCES `Classe` (`id`);

--
-- Contraintes pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD CONSTRAINT `Emprunt_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id`),
  ADD CONSTRAINT `Emprunt_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD CONSTRAINT `Livre_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `Auteur` (`nom`);

--
-- Contraintes pour la table `LivreRallye`
--
ALTER TABLE `LivreRallye`
  ADD CONSTRAINT `LivreRallye_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id`),
  ADD CONSTRAINT `LivreRallye_ibfk_2` FOREIGN KEY (`id_rallye`) REFERENCES `Rallye` (`id`);

--
-- Contraintes pour la table `LivreTheme`
--
ALTER TABLE `LivreTheme`
  ADD CONSTRAINT `LivreTheme_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id`),
  ADD CONSTRAINT `LivreTheme_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id`);

--
-- Contraintes pour la table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `Personnel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`role`) REFERENCES `Role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;