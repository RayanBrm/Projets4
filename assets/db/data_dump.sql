-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 14 jan. 2018 à 16:39
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.2.1-1+0~20180105151615.16+stretch~1.gbpd3910a

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

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`id`, `libelle`) VALUES
(1, 'CP'),
(2, 'CE1'),
(3, 'CE2'),
(4, 'CM1'),
(5, 'CM2');

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`id`, `classe`, `pastille`) VALUES
(2, 1, 'bear'),
(3, 1, 'bee'),
(4, 1, 'bird'),
(5, 1, 'butterfly'),
(6, 1, 'cat'),
(7, 1, 'cow'),
(8, 1, 'dog'),
(9, 1, 'dolphin'),
(10, 1, 'dove'),
(11, 2, 'horse'),
(12, 2, 'hen'),
(13, 2, 'fish'),
(14, 2, 'bear'),
(15, 2, 'zebra'),
(16, 1, 'wolf'),
(17, 2, 'wolf'),
(18, 2, 'penguin'),
(19, 2, 'parrot'),
(20, 2, 'sheep'),
(21, 2, 'tiger'),
(22, 2, 'turtle'),
(23, 3, 'flamingo'),
(24, 3, 'gorilla'),
(25, 3, 'frog'),
(26, 3, 'fox'),
(27, 3, 'eagle'),
(28, 3, 'duck'),
(29, 3, 'panda'),
(30, 3, 'dolphin'),
(31, 3, 'butterfly'),
(32, 3, 'cat'),
(33, 3, 'dog'),
(34, 3, 'wolf'),
(35, 4, 'dog'),
(36, 4, 'panda'),
(37, 4, 'tiger'),
(38, 4, 'dolphin'),
(39, 4, 'elephant'),
(40, 4, 'bird'),
(41, 5, 'tiger'),
(42, 5, 'cow'),
(43, 5, 'cat'),
(44, 5, 'frog'),
(45, 5, 'flamingo'),
(46, 5, 'fish'),
(47, 5, 'horse');

--
-- Déchargement des données de la table `Emprunt`
--

INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES
(1, 3, '2018-05-05', '2018-05-25'),
(2, 3, '2018-02-10', '2018-02-21'),
(4, 4, '2018-02-18', '2018-02-28'),
(3, 4, '2018-03-15', '2018-03-19');

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id`, `isbn`, `titre`, `auteur`, `edition`, `parution`, `couverture`, `description`, `disponible`) VALUES
(1, NULL, 'Harry Potter et la chambre des secrets', 'J.K. Rowling', 'Folio Junior', '2017-10-12', 'assets/img/livres/1.jpg', '', NULL),
(2, NULL, 'Le petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', '2017-10-12', 'assets/img/livres/2.jpeg', '', NULL),
(3, NULL, 'Les Royaumes du Nord 1 : A la croisée des mondes', 'Philip Pullman', 'Gallimard', '2017-10-12', 'assets/img/livres/3.jpg', '', NULL),
(4, NULL, 'Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpeg', '', NULL),
(5, NULL, 'Mes amis de la rue', 'Nathalie Choux', 'Mango', '2017-10-12', 'assets/img/livres/5.jpg', '', NULL),
(6, NULL, 'Un petit frère pour toujours', 'Marie-Hélène Delval', 'Bayard Poche', '2017-10-12', 'assets/img/livres/6.jpg', '', NULL),
(7, NULL, 'Le monde de Narnia 1 : Le neuveu du magicien', 'C.S. Lewis', 'Folio junior', '2017-10-12', 'assets/img/livres/7.jpg', '', NULL),
(8, NULL, 'Le petit Nicolas s amuse', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/8.jpg', '', NULL),
(9, NULL, 'Titeuf : Au secours !', 'ZEP / Shirley Anguerrand', '\"\"', '2017-10-12', 'assets/img/livres/9.jpg', '', NULL),
(10, NULL, 'Mille milliards de pirates', 'Gérard Moncomble / Sébastien Telleschi', 'Milan poche', '2017-10-12', 'assets/img/livres/10.jpg', '', NULL);

--
-- Déchargement des données de la table `LivreRallye`
--

INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(10, 2),
(9, 2),
(8, 2),
(2, 3),
(4, 3);

--
-- Déchargement des données de la table `LivreTheme`
--

INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES
(1, 1),
(2, 5),
(3, 1),
(4, 6),
(5, 7),
(6, 8),
(7, 1),
(8, 6),
(9, 6),
(10, 9);

--
-- Déchargement des données de la table `Personnel`
--

INSERT INTO `Personnel` (`id`, `motdepasse`) VALUES
(52, '$2y$10$yz4DX9ZFBOO.MyCLYdiHp.ctKB8W94vXvz1U7mjVHP4RNSxUNrvoq');

--
-- Déchargement des données de la table `Rallye`
--

INSERT INTO `Rallye` (`id`, `libelle`, `date`, `nbLivre`, `theme`) VALUES
(1, 'Rallye1', '2018-01-20', NULL, NULL),
(2, 'Rallye2', '2018-02-04', NULL, NULL),
(3, 'Rallye3', '2018-05-12', NULL, NULL);

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`id`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Professeur'),
(3, 'Eleve'),
(4, 'NC');

--
-- Déchargement des données de la table `Theme`
--

INSERT INTO `Theme` (`id`, `nom`, `libelle`, `nbLivre`) VALUES
(1, 'Fantastique', 'Livres sur le theme fantastique', NULL),
(2, 'Forêt', 'Livres sur la forêt ou se déroulant à l intérieur ', NULL),
(3, 'Mer', 'Livres sur la mer ou se déroulant à l intérieur ', NULL),
(4, 'Animaux', 'Livres sur les animaux ', NULL),
(5, 'Prince et Princesse', 'Histoires de prince ou de princesse', NULL),
(6, 'Humour', 'Histoires rigolotes ou centrées sur l\'humour', NULL),
(7, 'Amitié', 'Histoires centrées sur l\'amitié des personnages', NULL),
(8, 'Emotions', 'Histoire sérieuse sur l\'apprentissage des émotions', NULL),
(9, 'Pirates', 'Histoires de pirates', NULL);

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `identifiant`, `nom`, `prenom`, `role`) VALUES
(2, 'elev1', 'Eleve', '1', 3),
(3, 'elev2', 'Eleve', '2', 3),
(4, 'elev3', 'Eleve', '3', 3),
(5, 'elev4', 'Eleve', '4', 3),
(6, 'elev5', 'Eleve', '5', 3),
(7, 'elev6', 'Eleve', '6', 3),
(8, 'elev7', 'Eleve', '7', 3),
(9, 'elev8', 'Eleve', '8', 3),
(10, 'elev9', 'Eleve', '9', 3),
(11, 'elev10', 'Eleve', '10', 3),
(12, 'elev11', 'Eleve', '11', 3),
(13, 'elev12', 'Eleve', '12', 3),
(14, 'elev13', 'Eleve', '13', 3),
(15, 'elev14', 'Eleve', '14', 3),
(16, 'elev15', 'Eleve', '15', 3),
(17, 'elev16', 'Eleve', '16', 3),
(18, 'elev17', 'Eleve', '17', 3),
(19, 'elev18', 'Eleve', '18', 3),
(20, 'elev19', 'Eleve', '19', 3),
(21, 'elev20', 'Eleve', '20', 3),
(22, 'elev21', 'Eleve', '21', 3),
(23, 'elev22', 'Eleve', '22', 3),
(24, 'elev23', 'Eleve', '23', 3),
(25, 'elev24', 'Eleve', '24', 3),
(26, 'elev25', 'Eleve', '25', 3),
(27, 'elev26', 'Eleve', '26', 3),
(28, 'elev27', 'Eleve', '27', 3),
(29, 'elev28', 'Eleve', '28', 3),
(30, 'elev29', 'Eleve', '29', 3),
(31, 'elev30', 'Eleve', '30', 3),
(32, 'elev31', 'Eleve', '31', 3),
(33, 'elev32', 'Eleve', '32', 3),
(34, 'elev33', 'Eleve', '33', 3),
(35, 'elev34', 'Eleve', '34', 3),
(36, 'elev35', 'Eleve', '35', 3),
(37, 'elev36', 'Eleve', '36', 3),
(38, 'elev37', 'Eleve', '37', 3),
(39, 'elev38', 'Eleve', '38', 3),
(40, 'elev39', 'Eleve', '39', 3),
(41, 'elev40', 'Eleve', '40', 3),
(42, 'elev41', 'Eleve', '41', 3),
(43, 'elev42', 'Eleve', '42', 3),
(44, 'elev43', 'Eleve', '43', 3),
(45, 'elev44', 'Eleve', '44', 3),
(46, 'elev45', 'Eleve', '45', 3),
(47, 'elev46', 'Eleve', '46', 3),
(52, 'admin', 'Jean-Gui', 'Ladmin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
