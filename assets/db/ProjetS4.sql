-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 10 jan. 2018 à 11:04
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

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `nom`) VALUES
(2, 'Antoine de Saint-Exupéry'),
(7, 'C.S. Lewis'),
(9, 'Gérard Moncomble / Sébastien Telleschi'),
(1, 'J.K. Rowling'),
(6, 'Marie-Hélène Delval'),
(5, 'Nathalie Choux'),
(3, 'Philip Pullman'),
(4, 'Sempé / Goscinny'),
(8, 'ZEP / Shirley Anguerrand');

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
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

CREATE TABLE `Livre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(13) DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auteur` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parution` date DEFAULT NULL,
  `couverture` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id`, `isbn`, `titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
(1, NULL, 'Harry Potter et la chambre des secrets', 'J.K. Rowling', 'Folio Junior', '2017-10-12', 'assets/img/livres/1.jpg', ''),
(2, NULL, 'Le petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', '2017-10-12', 'assets/img/livres/2.jpeg', ''),
(3, NULL, 'Les Royaumes du Nord 1 : A la croisée des mondes', 'Philip Pullman', 'Gallimard', '2017-10-12', 'assets/img/livres/3.jpg', ''),
(4, NULL, 'Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpeg', ''),
(16, NULL, 'Mes amis de la rue', 'Nathalie Choux', 'Mango', '2017-10-12', 'assets/img/livres/5.jpg', ''),
(17, NULL, 'Un petit frère pour toujours', 'Marie-Hélène Delval', 'Bayard Poche', '2017-10-12', 'assets/img/livres/6.jpg', ''),
(18, NULL, 'Le monde de Narnia 1 : Le neuveu du magicien', 'C.S. Lewis', 'Folio junior', '2017-10-12', 'assets/img/livres/7.jpg', ''),
(19, NULL, 'Le petit Nicolas s amuse', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/8.jpg', ''),
(20, NULL, 'Titeuf : Au secours !', 'ZEP / Shirley Anguerrand', '\"\"', '2017-10-12', 'assets/img/livres/9.jpg', ''),
(21, NULL, 'Mille milliards de pirates', 'Gérard Moncomble / Sébastien Telleschi', 'Milan poche', '2017-10-12', 'assets/img/livres/10.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `LivreRallye`
--

CREATE TABLE `LivreRallye` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rallye` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LivreTheme`
--

CREATE TABLE `LivreTheme` (
  `id_livre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_theme` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Personnel`
--

CREATE TABLE `Personnel` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `motdepasse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Personnel`
--

INSERT INTO `Personnel` (`id`, `motdepasse`) VALUES
(1, '$2y$10$fw0ry7oRnmBHC4r9ZcvzGOliS0XF6GywN3xpgLL/dYghFN7bvAIgW');

-- --------------------------------------------------------

--
-- Structure de la table `Rallye`
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

CREATE TABLE `Role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`id`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Professeur'),
(3, 'Eleve'),
(4, 'NC');

-- --------------------------------------------------------

--
-- Structure de la table `Theme`
--

CREATE TABLE `Theme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbLivre` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Theme`
--

INSERT INTO `Theme` (`id`, `nom`, `libelle`, `nbLivre`) VALUES
(1, 'Fantastique', 'Livres sur le theme fantastique', 0),
(2, 'Forêt', 'Livres sur la forêt ou se déroulant à l intérieur ', 0),
(3, 'Mer', 'Livres sur la mer ou se déroulant à l intérieur ', 0),
(4, 'Animaux', 'Livres sur les animaux ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ThemeRallye`
--

CREATE TABLE `ThemeRallye` (
  `id_theme` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rallye` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifiant` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `identifiant`, `nom`, `prenom`, `role`) VALUES
(1, 'admin', 'Administrateur', 'Administrateur', 1),
(2, 'prof', 'Professeur', 'Professeur', 2),
(3, 'elev1', 'Eleve', 'Test', 3),
(4, 'elev2', 'Eleve', 'Test', 3);

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
-- Index pour la table `Disponible`
--
ALTER TABLE `Disponible`
  ADD KEY `id_livre` (`id_livre`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Rallye`
--
ALTER TABLE `Rallye`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Disponible`
--
ALTER TABLE `Disponible`
  ADD CONSTRAINT `Disponible_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
