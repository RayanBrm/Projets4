-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 05 mars 2018 à 12:27
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.1.13-1+0~20180105151623.14+stretch~1.gbp1086fa

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
# CREATE DATABASE IF NOT EXISTS `ProjetS4` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
# USE `ProjetS4`;

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Auteur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Classe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Eleve` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe` bigint(20) UNSIGNED DEFAULT NULL,
  `pastille` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Emprunt`
--
-- Création :  jeu. 11 jan. 2018 à 13:06
--

CREATE TABLE `Emprunt` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_eleve` bigint(20) UNSIGNED DEFAULT NULL,
  `dateEmprunt` date DEFAULT NULL,
  `dateRendu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--
-- Création :  jeu. 25 jan. 2018 à 13:51
--

CREATE TABLE `Livre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auteur` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parution` date DEFAULT NULL,
  `couverture` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disponible` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LivreRallye`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `LivreRallye` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rallye` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LivreTheme`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `LivreTheme` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_theme` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Personnel`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Personnel` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `motdepasse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Rallye`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Rallye` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nbLivre` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Theme`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Theme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbLivre` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ThemeRallye`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `ThemeRallye` (
  `id_theme` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rallye` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--
-- Création :  mar. 09 jan. 2018 à 16:14
--

CREATE TABLE `Utilisateur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifiant` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD KEY `id` (`id`),
  ADD KEY `classe` (`classe`);

--
-- Index pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`);

--
-- Index pour la table `LivreRallye`
--
ALTER TABLE `LivreRallye`
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_rallye` (`id_rallye`);

--
-- Index pour la table `LivreTheme`
--
ALTER TABLE `LivreTheme`
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `Personnel`
--
ALTER TABLE `Personnel`
  ADD KEY `id` (`id`);

--
-- Index pour la table `Rallye`
--
ALTER TABLE `Rallye`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `ThemeRallye`
--
ALTER TABLE `ThemeRallye`
  ADD KEY `id_theme` (`id_theme`),
  ADD KEY `id_rallye` (`id_rallye`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Rallye`
--
ALTER TABLE `Rallye`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Contraintes pour la table `ThemeRallye`
--
ALTER TABLE `ThemeRallye`
  ADD CONSTRAINT `ThemeRallye_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id`),
  ADD CONSTRAINT `ThemeRallye_ibfk_2` FOREIGN KEY (`id_rallye`) REFERENCES `Rallye` (`id`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`role`) REFERENCES `Role` (`id`);
COMMIT;


INSERT INTO `Role` (libelle) VALUES ('Administrateur');
INSERT INTO `Role` (libelle) VALUES ('Professeur');
INSERT INTO `Role` (libelle) VALUES ('Eleve');
INSERT INTO Utilisateur (identifiant,nom,prenom,role) VALUES ('admin','Administrateur','Administrateur',1);
INSERT INTO `Personnel` (`id`, `motdepasse`) VALUES (1, '$2y$10$6OD77JMyVkX28enTsYjhEeu2J0jlKoUEBwxP6IXh6YM6uzXZ4yF2y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
