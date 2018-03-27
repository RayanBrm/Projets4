-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 27 mars 2018 à 12:55
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.1.15-1+0~20180306120016.15+stretch~1.gbp78327e

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
(111, ' Marcello Argilli'),
(70, 'Alain Serres'),
(71, 'Alain serres/Anne Tonnac'),
(37, 'Alan Wildsmith'),
(54, 'Alberto Manzi'),
(24, 'Allan Baillie'),
(72, 'Ann Cameron'),
(73, 'Annemie Heymans'),
(2, 'Antoine de Saint-Exupéry'),
(29, 'Barbara Morgenroth'),
(74, 'Bernard Ashley'),
(53, 'Betsy Byars'),
(75, 'Boris Zhitkov'),
(17, 'Bruce Benamran'),
(7, 'C.S. Lewis'),
(76, 'Carla Stevens, Tomes, Jusforgues'),
(102, 'Carlo Collodi'),
(77, 'Charles Perrault'),
(14, 'Charles Perrault, Isabelle Parisot'),
(58, 'Charles Vildrac'),
(35, 'Christian Poslaniec'),
(11, 'Claude Delannoy'),
(107, 'Claude Roy'),
(114, 'Colin Thiele'),
(10, 'COLLECTIF'),
(16, 'Daniel Defoe'),
(112, 'Denis Brun'),
(78, 'Dick King-Smith'),
(79, 'Didier Blonay'),
(101, 'Edgard Allan Poe'),
(33, 'Elisabeth Van Steenwyk'),
(80, 'Elsa Morante'),
(26, 'Evelyne Brisou - Pellen'),
(81, 'Fabienne Mounier, Daniel Hénon'),
(82, 'Fanny Joly, Christophe Besse'),
(32, 'Flammarion'),
(31, 'Florence Parry Heide'),
(38, 'François Schoeser'),
(52, 'Gérard Hubert-Richou'),
(9, 'Gérard Moncomble / Sébastien Telleschi'),
(55, 'Gianni Rodari'),
(109, 'Gudrun Mebs'),
(44, 'Gudule & Katharina Grossmann-Hensel'),
(83, 'Hans Christian Andersen'),
(84, 'Henriette Bichonnier'),
(1, 'J.K. Rowling'),
(57, 'Jacqueline Cervon'),
(20, 'James Houston'),
(21, 'James Huston'),
(85, 'Jane Gardam'),
(42, 'Janusz Korczak'),
(40, 'Jean Cazalbou'),
(18, 'Jean Engels'),
(27, 'Jean Muzi'),
(86, 'Jean Olivier Héron'),
(87, 'Jean-Loup Craipeau'),
(106, 'Jean-Marie Gustave Le Clézio'),
(88, 'Jean-Pierre Andrevon'),
(105, 'Jill Murphy'),
(47, 'Joan Davenport Carris'),
(56, 'John Marsden'),
(19, 'Jonathan Reed'),
(110, 'Joyce Rockwood'),
(89, 'JP Ronssin'),
(90, 'Jules Verne'),
(45, 'Laurence Delaby'),
(30, 'Liliane Korb & Laurence Lefèvre'),
(104, 'Luke Sharp'),
(50, 'Lygia Bojunga Nunes'),
(12, 'Marabout'),
(91, 'Marcel Aymé'),
(28, 'Marcello Argilli'),
(25, 'Marie Colmont'),
(92, 'Marie-Aude Murail'),
(43, 'Marie-Christine Helgerson'),
(6, 'Marie-Hélène Delval'),
(93, 'Marie-Raymond Farré'),
(51, 'Marilyn Sachs'),
(46, 'Mary Rodgers'),
(94, 'Michel Gay'),
(95, 'Michel Tournier'),
(96, 'Mme LePrince de Beaumont'),
(5, 'Nathalie Choux'),
(97, 'Patricia Mc Kissack'),
(115, 'Patrick Vendamme'),
(22, 'Philip Curtis'),
(3, 'Philip Pullman'),
(34, 'Philippe Barbeau'),
(15, 'Priscilla Protet, Glenda Sburelin, Lewis Carroll, Sun-bong Hŏ'),
(98, 'Roald Dahl'),
(99, 'Robert Graves'),
(48, 'Robert Newton Peck'),
(4, 'Sempé / Goscinny'),
(103, 'Simon Farell, Jon Sutherland'),
(39, 'Thalie de Molènes'),
(49, 'Thomas Keneally'),
(59, 'Ursel Scheffler & Jutta Timm'),
(113, 'Viktor Petrovitch Astafiev'),
(41, 'Wanda Chotomska'),
(108, 'William Faulkner'),
(36, 'Willis Hall'),
(23, 'Xavier Armange'),
(100, 'Yvon Le Men'),
(8, 'ZEP / Shirley Anguerrand');

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`id`, `libelle`) VALUES
(1, 'CP1'),
(2, 'CE1'),
(3, 'CM1'),
(4, 'CM2'),
(5, 'CE2');

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe` bigint(20) UNSIGNED DEFAULT NULL,
  `pastille` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`id`, `classe`, `pastille`) VALUES
(3, 1, 'turtle'),
(4, 1, 'fish'),
(5, 3, 'panda'),
(3434, 2, 'eagle'),
(3435, 3, 'hen'),
(3437, 3, 'butterfly'),
(3438, 4, 'shark'),
(3439, 4, 'penguin'),
(3444, 1, 'eagle');

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

--
-- Déchargement des données de la table `Emprunt`
--

INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES
(10029, 1, '2018-01-10', '2018-03-15'),
(10010, 1, '2018-03-15', '2018-03-26'),
(10033, 3, '2018-02-01', '2018-03-15'),
(10015, 4, '2018-02-01', '2018-03-15'),
(10007, 3437, '2018-01-03', '2018-03-15'),
(10057, 3437, '2018-01-03', '2018-03-26'),
(5022, 3, '2018-03-26', '2018-03-26'),
(5055, 4, '2018-03-26', NULL),
(10060, 3444, '2018-03-26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
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

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id`, `isbn`, `titre`, `auteur`, `edition`, `parution`, `couverture`, `description`, `disponible`) VALUES
(5002, '9782081618411', 'Est-ce que les tatous entrent dans les maisons ?', 'Jonathan Reed', '', '1985-01-01', 'assets/img/livres/5002.gif', 'Aborde avec humour toutes les épreuves quotidiennes rencontrées par les enfants: que faire si on n\'arrive pas à dormir, quand on s\'ennuie, quand on a un petit frère casse-pieds, quand on ne peut pas échapper à un baiser, etc', 1),
(5005, '', 'Le passage des loups', 'James Huston', 'Flammarion', '0000-00-00', 'assets/img/livres/5005.jpeg', 'Punik, 13 ans part à la recherche de caribous disparus.', 1),
(5006, '9782081622555', 'Message extraterrestre', 'Philip Curtis', 'Flammarion', '0000-00-00', 'assets/img/livres/5006.jpeg', 'Dans le cadre d\'un échange culturel, des écoliers anglais écrivent à des écoliers français ...', 1),
(5007, '9782081618220', 'Dragon l\'ordinaire', 'Xavier Armange', 'Flammarion', '0000-00-00', 'assets/img/livres/5007.jpeg', 'Les dragons sont souvent des gens imaginatifs. Dragon l\'Ordinaire, lui, mérite bien son nom !', 1),
(5008, '9782081640283', 'Petit frère', 'Allan Baillie', 'Flammarion', '0000-00-00', 'assets/img/livres/5008.jpeg', 'Fuyant le Cambodge et les Khmers rouges, Vithy, onze ans, et son grand frère Mang tentent de rejoindre la Thaïlande.', 1),
(5009, '', 'Le cygne rouge', 'Marie Colmont', 'Flammarion', '0000-00-00', 'assets/img/livres/5009.jpeg', 'Le cygne rouge, Le Petit-frère-des-loups, Keneu l\'Etoile du Nord, le géant Robe-de-pierre, ... Parle des peuples indiens.', 1),
(5010, '9782081618343', 'L\'étrange chanson de sveti', 'Evelyne Brisou - Pellen', 'Flammarion', '0000-00-00', 'assets/img/livres/5010.jpeg', 'Sveti a été recueillie, toute petite, par une troupe de Tsiganes qui parcourent l\'Europe Centrale et la France du moyen-âge...', 1),
(5011, '9782081617780', 'Contes du monde arabe', 'Jean Muzi', 'Flammarion', '0000-00-00', 'assets/img/livres/5011.jpeg', 'Ces seize contes recueillis auprès de vieux conteurs du Moyen-Orient, appartiennent à la littérature orale arabe.', 1),
(5012, '9782081621411', 'Nouvelles d\'aujourd\'hui', 'Marcello Argilli', '', '1990-01-01', 'assets/img/livres/5012.jpeg', 'Un éventail d\'histoires courtes, à la fois cocasses, inquiétantes et tendres. La télévision, l\'école, les robots, la magie des mots, les contes, le temps, le pouvoir de l\'imagination... Autant de thèmes, traités avec humour et un sens critique décapant, qui laissent à penser, à réfléchir.', 1),
(5013, '9782081617452', 'Charlie l\'impossible', 'Barbara Morgenroth', 'Flammarion', '0000-00-00', 'assets/img/livres/5013.jpeg', 'Le rêve de Jackie, c\'est de posséder un cheval bien à elle. Elle fait de l\'équitation depuis deux ans.', 1),
(5016, '', 'L\'élixir de tante Ermolina', 'Liliane Korb & Laurence Lefèvre', 'Flammarion', '0000-00-00', 'assets/img/livres/5016.jpeg', '', 1),
(5017, '9782081619371', 'Défense d\'entrer par la fenêtre', 'Florence Parry Heide', 'Flammarion', '0000-00-00', 'assets/img/livres/5017.jpeg', 'Noah n\'est vraiment pas heureux. Quelle idée ont eu ses parents de déménager pour venir habiter dans ce lotissement désert ? C\'est déjà difficile d\'être enfant unique !', 1),
(5018, '9782081622609', 'Le prince Caspian', 'Flammarion', 'Flammarion', '0000-00-00', 'assets/img/livres/5018.jpeg', 'Ce livre est trop bien', 1),
(5019, '9782081622685', 'Trois chiens pour courir', 'Elisabeth Van Steenwyk', 'Flammarion', '0000-00-00', 'assets/img/livres/5019.jpeg', 'Scott partageait la passion des courses de chiens de traîneau avec son père. A la mort de ce dernier, les chiens sont vendus sauf Kaylah, son préféré.', 1),
(5020, '9782081618947', 'L\'odeur de la mer', 'Philippe Barbeau', 'Flammarion', '0000-00-00', 'assets/img/livres/5020.jpeg', 'Vermillon et ses dix copains de classe sont tous aussi récalcitrants à la lecture et allergiques aux mathématiques.', 1),
(5021, '9782081618879', 'Histoires horribles et pas si méchantes !', 'Christian Poslaniec', '', '1986-01-01', 'assets/img/livres/5021.jpg', 'Où Eric peut-il bien trouver toutes ces histoires qu\'il note dans son petit carnet à couverture rouge sang ? Et pourquoi chaque soir, Jacques, Eliane, sa compagne, Eric et Catherine, ses enfants, organisent-ils un concours d\'histoires toutes plus horribles les unes que les autres ? De quoi trembler et claquer des dents... mais \" pour rire \".', 1),
(5022, '', 'Akavak', 'James Houston', 'Flammarion', '0000-00-00', 'assets/img/livres/5022.jpeg', 'Akavak n\'a pas encore 14 ans. Et pourtant c\'est à lui que revient la responsabilité d\'accompagner son grand-père jusqu\'au Kokjuak, région lointaine...', 1),
(5023, '9782081622180', 'Un si petit dinosaure', 'Willis Hall', 'Flammarion', '0000-00-00', 'assets/img/livres/5023.jpeg', 'Lorsqu\'on a, comme Edgar Hollins, une vraie passion pour les animaux préhistoriques, quelle joie de trouver dans les rochers un galet bizarre qui ne peut être qu\'un oeuf de dinosaure !', 1),
(5024, '9782081617186', 'Un été aux arpents', 'Alan Wildsmith', 'Flammarion', '0000-00-00', 'assets/img/livres/5024.jpeg', '', 1),
(5025, '9782081622555', 'Message extraterrestre', 'Philip Curtis', 'Flammarion', '0000-00-00', 'assets/img/livres/5025.jpeg', '', 1),
(5027, '9782081622555', 'Message extraterrestre', 'Philip Curtis', 'Flammarion', '0000-00-00', 'assets/img/livres/5027.jpeg', '', 1),
(5029, '9782081621008', 'Gaufrette, Petit-Beurre et Chocolat', 'François Schoeser', '', '1989-01-01', 'assets/img/livres/5029.jpeg', 'Les \"inséparables\" ont peine à faire accepter leur amitié par l\'entourage. Les parents d\'Elsa s\'accommodent difficilement des relations de sa fille avec des amies d\'origine étrangère. Son attitude déclenche le départ temporaire d\'Elsa qui vit une aventure à court terme. Personnages sympathiques. Style direct coloré.', 1),
(5030, '9782081621008', 'Gaufrette, Petit-Beurre et Chocolat', 'François Schoeser', '', '1989-01-01', 'assets/img/livres/5030.jpeg', 'Les \"inséparables\" ont peine à faire accepter leur amitié par l\'entourage. Les parents d\'Elsa s\'accommodent difficilement des relations de sa fille avec des amies d\'origine étrangère. Son attitude déclenche le départ temporaire d\'Elsa qui vit une aventure à court terme. Personnages sympathiques. Style direct coloré.', 1),
(5031, '9782081621008', 'Gaufrette, Petit-Beurre et Chocolat', 'François Schoeser', '', '1989-01-01', 'assets/img/livres/5031.jpeg', 'Les \"inséparables\" ont peine à faire accepter leur amitié par l\'entourage. Les parents d\'Elsa s\'accommodent difficilement des relations de sa fille avec des amies d\'origine étrangère. Son attitude déclenche le départ temporaire d\'Elsa qui vit une aventure à court terme. Personnages sympathiques. Style direct coloré.', 1),
(5032, '9782081619593', 'Mélodine et le clochard', 'Thalie de Molènes', 'Flammarion', '0000-00-00', 'assets/img/livres/5032.jpeg', 'Un clochard sort de l\'ombre, se penche sur la vitrine éclairée de la librairie et lit passionnément un ouvrage d\'astronomie...', 1),
(5033, '9782081618695', 'Fabrice et les passeurs de l\'ombre', 'Jean Cazalbou', 'Flammarion', '0000-00-00', 'assets/img/livres/5033.jpeg', '', 1),
(5035, '', 'L\'arbre à voile', 'Wanda Chotomska', 'Flammarion', '0000-00-00', 'assets/img/livres/5035.jpeg', 'Durant un été, un grand peuplier permet à un groupe d\'enfants, tous habitants d\'une cité dortoir.......', 1),
(5036, '', 'La gloire', 'Janusz Korczak', 'Flammarion', '0000-00-00', 'assets/img/livres/5036.jpeg', '', 1),
(5037, '9782081621008', 'Gaufrette, Petit-Beurre et Chocolat', 'François Schoeser', '', '1989-01-01', 'assets/img/livres/5037.jpeg', 'Les \"inséparables\" ont peine à faire accepter leur amitié par l\'entourage. Les parents d\'Elsa s\'accommodent difficilement des relations de sa fille avec des amies d\'origine étrangère. Son attitude déclenche le départ temporaire d\'Elsa qui vit une aventure à court terme. Personnages sympathiques. Style direct coloré.', 1),
(5038, '9782081618275', 'Dans les cheminées de Paris', 'Marie-Christine Helgerson', '', '1985-01-01', 'assets/img/livres/5038.jpeg', 'Comme beaucoup de jeunes Savoyards de son âge, Benoît doit partir plusieurs mois pour ramoner les cheminées de Paris. Après un long et pénible voyage à pied, Benoît arrive enfin à Paris. Le travail est rude pour un garçon de neuf ans mais, cheminée après cheminée, Benoît devient agile. Il découvre aussi avec curiosité la vie trépidante du Paris de 1789. Que de choses il aura à raconter à son retour...', 1),
(5039, '2244458091', 'Sirène', 'Gudule & Katharina Grossmann-Hensel', '', '0000-00-00', 'assets/img/livres/5039.jpeg', '', 1),
(5040, '9782081621657', 'Dans l\'officine de maître Arnaud', 'Marie-Christine Helgerson', 'Flammarion', '0000-00-00', 'assets/img/livres/5040.jpeg', '', 1),
(5041, '9782081617155', 'Zoum et les autres', 'Laurence Delaby', 'Flammarion', '0000-00-00', 'assets/img/livres/5041.jpeg', '', 1),
(5042, '9782081618077', 'Claudine de Lyon', 'Marie-Christine Helgerson', 'Flammarion-Pere Castor', '1992-12-18', 'assets/img/livres/5042.jpeg', 'Claudine, onze ans, travaille dix heures par jour dans l\'atelier de son père, à tisser de la soie. Mais cette vie épuise la petite fille qui tombe gravement malade. Pour guérir, elle part à la campagne. Claudine veut retrouver la santé et elle n\'a pas envie de retourner à Lyon pour travailler. Ce qu\'elle désire par-dessus tout, c\'est aller à l\'école et réaliser son rêve : savoir lire, écrire et surtout dessiner.', 1),
(5043, '9782081618237', 'Une télé pas possible', 'Mary Rodgers', '', '1985-01-01', 'assets/img/livres/5043.jpeg', 'Annabel fait une découverte étonnante : son petit frère, Ben, a tellement bien bricolé le vieux poste de télé que, maintenant, il transmet les émissions du lendemain. Boris, le grand copain d\'Annabel, a tout de suite une idée. Il y a là un moyen fantastique de gagner beaucoup d\'argent. Il suffit de jouer aux courses de chevaux après avoir écouté les résultats donnés par la télé...', 1),
(5044, '9782081617582', 'La révolte de 10 x', 'Joan Davenport Carris', 'Flammarion', '0000-00-00', 'assets/img/livres/5044.jpeg', '', 1),
(5045, '9782081617117', 'Un certain monsieur 1', 'Robert Newton Peck', 'Flammarion', '0000-00-00', 'assets/img/livres/5045.jpeg', '', 1),
(5046, '', 'La cité des abeilles', 'Thomas Keneally', 'Flammarion', '0000-00-00', 'assets/img/livres/5046.jpeg', '', 1),
(5047, '', 'La fille du cirque', 'Lygia Bojunga Nunes', 'Flammarion', '0000-00-00', 'assets/img/livres/5047.jpeg', '', 1),
(5048, '9782081617070', 'Du soleil sur la joue', 'Marilyn Sachs', 'Flammarion', '0000-00-00', 'assets/img/livres/5048.jpeg', '', 1),
(5049, '9782081619210', 'Le prix d\'un coup de tête', 'Gérard Hubert-Richou', 'Flammarion', '0000-00-00', 'assets/img/livres/5049.jpeg', '', 1),
(5050, '9782081617827', 'Comme à la télé', 'Betsy Byars', 'Flammarion', '0000-00-00', 'assets/img/livres/5050.jpeg', '', 1),
(5051, '', 'Le castor Grogh et sa tribu', 'Alberto Manzi', 'Marabou', '0000-00-00', 'assets/img/livres/5051.jpeg', '', 1),
(5052, '9782010139208', 'Histoires à la courte paille', 'Gianni Rodari', 'Hachette', '0000-00-00', 'assets/img/livres/5052.jpeg', '', 1),
(5053, '9782081622739', 'J\'ai tant de chose à te dire', 'John Marsden', 'Flammarion', '0000-00-00', 'assets/img/livres/5053.jpeg', '', 1),
(5054, '9782253026990', 'Djinn la malice', 'Jacqueline Cervon', '', '1981-01-01', 'assets/img/livres/5054.jpeg', 'Leïla, petite iranienne, a dix ans. Son père l\'a promise à Karim, un homme brutal. Heureusement un djinn, lutin malicieux, la protège elle et son ami Morad.', 1),
(5055, '', 'Amadou le bouquillon', 'Charles Vildrac', 'Marabou', '0000-00-00', 'assets/img/livres/5055.jpeg', '', 0),
(5056, '9782266058261', 'Un troll dans mes croquettes', 'Ursel Scheffler & Jutta Timm', 'Kid Pocket', '0000-00-00', 'assets/img/livres/5056.jpeg', '', 1),
(10001, '', 'Pierrot ou les secrets de la nuit', 'Michel Tournier', 'Gallimard', '1991-01-01', '', 'pierre le boulanger aime Colombine sa jolie voisine.', 1),
(10002, '9782211215282', 'La vie trépidante des Bolkodaz', 'Fabienne Mounier, Daniel Hénon', '', '2014-01-01', 'assets/img/livres/10002.jpeg', 'Bienvenue sous le grand chapiteau de monsieur et madame Bolkodaz ! Découvrez sa ménagerie et son troupeau de bêtes sauvages.', 1),
(10003, '9782070312177', 'Mystère', 'Marie-Aude Murail', 'Gallimard', '1990-01-03', 'assets/img/livres/10003.jpeg', 'Quand Mystère naquit, et que ses cheveux furent bleus, on ne l\'aima pas. Quand elle eut huit ans, elle était la plus belle des petites filles et tout le monde la remarquait, ce qui énervait for la reine sa mère.', 1),
(10004, '9782070312186', 'L\'ogron', 'Alain Serres', 'Gallimard', '1991-01-04', 'assets/img/livres/10004.jpeg', 'Lorsqu\'un géant presque aussi grand qu\'une maison fait irruption dans sa classe, madame Comprenette ne perds pas son sang-froid, et demande au \"petit polisson\" de ressortir et de frapper poliment avec le dos de l\'index.', 1),
(10006, '2203117338', 'Fous de foot', 'Fanny Joly, Christophe Besse', 'Casterman', '1995-01-01', 'assets/img/livres/10006.jpeg', 'Moi, le football, c\'est ma passion. J\'en suis folle. D\'ailleurs, dans mon ancienne école, on m\'appelait la foot-folle. Donc Sonia, c\'est pas difficile de la repérer dans une cour de récréation : juste à côté du but, ou du ballon... Sauf que dans sa nouvelle école, le foot, c\'est pas tout à fait ça et Sonia va devoir déployer des trésors d\'ingéniosité pour pratiquer à nouveau sa folle passion.', 1),
(10007, '2070311600', 'Peur de rien, peur de tout', 'Jane Gardam', 'Gallimard', '1991-01-09', 'assets/img/livres/10007.jpeg', 'Le Chaton habite avec ses parents et sa petite sœur dans une ferme isolée. Le Chaton n\'est pas un chat mais une petite fille qui s\'effarouche facilement. Tout à coup, catastrophe à la ferme ! Son père se casse la jambe, et elle doit prendre les choses en main. Comment va-t-elle se débrouiller ?', 1),
(10008, '2070312305', 'Longue vie aux dodos', 'Dick King-Smith', 'Gallimard', '1990-01-11', 'assets/img/livres/10008.jpeg', 'Lourds, maladroits, patauds, mais gros et forts, les dodos vivent béatement sur leur île au milieu de l\'océan Indien, dans un climat idéal, sans le moindre ennemi. Béatrice a accepté la demande en mariage de Bertie. Personne n\'imagine que rien puisse un jour troubler leur bonheur. Personne n\'imagine l\'arrivée sur l\'île des singes de mer, ces créatures que nous, nous appelons pirates...', 1),
(10009, '9782010201424', 'Émilie et le crayon magique', 'Henriette Bichonnier', 'Hachette Jeunesse', '1984-01-11', 'assets/img/livres/10009.jpeg', 'Émilie a trouvé un crayon magique : tout ce qu\'elle dessine avec devient vrai. Et comme elle se passionne pour les châteaux forts, les seigneurs et les tournois, la voilà bientôt en plein Moyen-Âge !', 1),
(10010, '2070579786', 'A la poursuite de Kim', 'Bernard Ashley', 'Gallimard', '0000-00-00', 'assets/img/livres/10010.jpeg', 'Kim Lung, la petite Vietnamienne, part pour la première fois avec son école en classe de mer. Elle tarde à s\'endormir, le soir. Des souvenirs affluent : son père et son oncle parlant ensemble de leur fuite dramatique.', 1),
(10011, '2070312313', 'Anna, Grandpa et la tempête', 'Carla Stevens, Tomes, Jusforgues', 'Editions Gallimard', '1990-01-01', '', 'New York 1888. Une tempête de neige blanchit toute la ville. Et ce jour de blizzard, Grandpa, en visite chez sa fille, accompagne à l\'école sa petite-fille Anna pour la finale du concours d\'orthographe. Quelques incidents s\'ajoutent à la difficulté première du voyage. Tout compte fait Grandpa se fait des amis. Un récit détendu et chaleureux. Des illustrations amusantes. Cette version \"bleue de Folio cadet\" est enrichie d\'un supplément d\'informations diverses et de jeux.', 1),
(10012, '2070523085', 'La vengeance du chat Mouzoul', 'JP Ronssin', 'gallimard', '0000-00-00', 'assets/img/livres/10012.jpeg', 'Quel rapport peut-il y avoir entre l\'illustre Pimelli qui, au sommet de sa gloire, s\'en revient chanter à la Scala de Milan, et Mouzoul, un gros chat gris ?', 1),
(10013, '9782092042250', 'Gazoline et grenadine', 'Jean-Loup Craipeau', 'Nathan', '0000-00-00', 'assets/img/livres/10013.jpeg', 'Le jour où Limaunade emménage dans la rue Durasec, elle ignore que ses deux voisines sont en réalité... deux sorcières. Il est vrai que Gazoline et Grenadine (107 ans toutes les deux) ne sont pas des sorcières ordinaires : au lieu de jeter des sorts, elles jettent des ressorts et, pour se déplacer, elles n\'utilisent pas un balai, mais un... aspirâleur. Enfin ! Mais le plus extravagant, c\'est que c\'et avec cet engin qu\'elles espèrent vaincre le terrible Luisant ! Un roman construit comme un grand', 1),
(10014, '9782013233651', 'La Nuit des Bêtes', 'Jean-Pierre Andrevon', 'Livre de Poche Jeunesse', '1997-11-19', 'assets/img/livres/10014.jpeg', 'Dans une petite ville de France, tout s\'arrête : une alerte atomique est déclenchée !', 1),
(10015, '2070311880', 'La belle et la bête', 'Mme LePrince de Beaumont', 'Gallimard', '0000-00-00', 'assets/img/livres/10015.jpeg', 'Par sa beauté et sa bonté, la fille cadette d\'un très riche marchand avait mérité le nom de Belle.', 1),
(10016, '9782070669028', 'L\'escargot de Sophie', 'Michel Gay', 'Gallimard', '0000-00-00', 'assets/img/livres/10016.jpeg', 'C\'est l\'escargot de Sophie, le plus petit, mais le plus intelligent, qui gagne la course d\'escargots organisée avec ses frères aînés, les jumeaux. Comme toujours, Sophie a fait le bon choix. Regardez-la suivre son bonhomme de chemin, lors de cinq aventures faciles à lire, dont l\'héroïne est aussi drôle que déterminée. ', 1),
(10017, '2070312372', 'Le grand livre vert', 'Robert Graves', 'gallimard', '0000-00-00', 'assets/img/livres/10017.jpeg', 'Attention : le grand livre vert est un livre magique. Un livre qui donne des pouvoirs extraordinaires… Petit Jack a trouvé ce fameux livre dans le grenier où il s\'était caché pour échapper à une charmante et très ennuyeuse promenade comme les aiment… les grandes personnes. Et il lui a suffi de l\'ouvrir pour qu\'il se passe de drôles de choses. L\'oncle et la tante de Jack ne sont pas au bout de leurs surprises. ', 1),
(10018, '9782070312214', 'Riquet à la houppe', 'Charles Perrault', 'Gallimard', '0000-00-00', 'assets/img/livres/10018.jpeg', 'Une reine eut un fils très laid mais qui de l’avis de la fée qui était présente à sa naissance aurait beaucoup d’esprit ; elle lui fit don de donner de l’esprit à la personne qu’il aimerait le plus.\r\n7 ou 8 ans plus tard, la reine voisine de la mère de Riquet à la Houppe, eut deux filles diamétralement opposées : la première très belle mais qui selon la même fée qui était présente lors de la naissance de Riquet à la houppe serait très sotte, l’autre, très laide mais qui serait pleine d’esprit. P', 1),
(10019, '9782070312151', 'les vaches', 'Marcel Aymé', 'Gallimard', '0000-00-00', 'assets/img/livres/10019.jpeg', 'En partant le matin, les parents confient à Delphine et Marinette la garde du troupeau. Aux grands prés, la journée se passe bien jusqu\'au moment du retour... La Cornette, la vache qui n\'aime pas les fillettes, a disparu. Les animaux de la ferme se joignent à leurs amies pour la rechercher. Le cochon se transforme même en détective, mais l\'enquête n\'est pas si facile...', 1),
(10020, '9782070566372', 'Les aventures de Papagayo', 'Marie-Raymond Farré', 'Gallimard', '0000-00-00', 'assets/img/livres/10020.jpeg', 'Cathie Mini et sa soeur Madeleine tiennent une taverne dans le port d\'Amsterdam. Leur clientèle\r\nest composée de pirates, de toutes sortes de pirates : jeunes, vieux, beaux ou laids...Cathie et Madeleine sont deux honnêtes jeunes filles mais, à force de côtoyer de tels individus, elles se laissent entraîner dans leurs histoires, surtout quand c\'est le perroquet El Papagayo qui les raconte...', 1),
(10021, '9782070311255', 'Les extraordinaires aventures de Caterina', 'Elsa Morante', 'Gallimard', '0000-00-00', 'assets/img/livres/10021.jpeg', 'Un jour, Caterina a un peu faim, alors Rosetta, sa maman, part chercher du travail, du linge à laver, des enfants à garder. Et pendant ce temps, Caterina perd sa poupée... Heureusement, elle rencontre Tit, le gentil garçon-fée, et a bien des aventures.', 1),
(10022, '2070312321', 'Un amour de tortue', 'Roald Dahl', 'Gallimard', '0000-00-00', 'assets/img/livres/10022.jpeg', 'Le vieux mais adorable M.Hoppy est amoureux de sa voisine du dessous, Mme Silver. Mais il est bien trop timide pour le lui avouer d\'autant plus qu\'elle n\'a d\'yeux que pour Alfred, son adorable tortue qu\'elle élève sur le balcon. \r\nUn jour, désespérée qu\'Alfred ne grossisse pas davantage, elle se confie à son gentil voisin.\r\nM. Hoppy voit là, la chance de sa vie ! \r\nA l\'aide d\'une formule magique, il met en place tout un stratagème pour faire croire à Mme Silver que sa tortue grossit...', 1),
(10023, '2070312712', 'Histoires de Julien', 'Ann Cameron', 'Gallimard', '0000-00-00', 'assets/img/livres/10023.jpeg', 'Une merveille de mousse au citron, parfumée comme un radeau plein de citrons et délicieuse comme une nuit sur la mer… Un chatalogue pour passer une commande de chats. Et trois autres histoires pour faire la connaisance de Julien, qui a trop d\'imagination, de son petit frère Hugo, qui n\'hésite jamais à le croire, et de leurs parents qui, comme les lecteurs, savent entrer dans le jeu et rire avec eux.', 1),
(10024, '9782070392346', 'Rita et le renard', 'Patricia Mc Kissack', 'Gallimard', '0000-00-00', 'assets/img/livres/10024.jpeg', 'Le renard veut gober les oeufs que Rita doit apporter à Mam’zelle Viola. Il essaie de lui faire peur.\r\n-Ma chère, lui dit-il, une petite fille comme toi devrait tout simplement être terrorisée en me voyant.\r\nMais Rita n’a pas peur, et montre qu’une petite fille peut être plus rusée que le plus rusé des animaux.\r\nUn délice de conte, si plein de soleil et de malice que jamais vous n’en avez vu ou entendu de pareil.', 1),
(10025, '9782070581771', 'Ouvrez la porte au loup !', 'Yvon Le Men', 'Editions Gallimard', '1994-01-01', 'assets/img/livres/10025.jpeg', 'Parler aux enfants de leur vie de tous les jours, de l\'école, des animaux et des fleurs. Leur apprendre à jouer avec les mots et avec les images. En un mot, les entraîner à la découverte de la poésie, voilà ce qu\'a parfaitement réussi à faire Yvon Le Men.', 1),
(10027, '2070523144', 'Rosette Petipon', 'Annemie Heymans', 'Gallimard', '0000-00-00', 'assets/img/livres/10027.jpeg', 'Rosette est la plus petite d\'une famille de quatre enfants. En plus elle est la seule fille. Elle est donc un peu à part et profite de sa solitude pour imaginer toutes sortes de bêtises. ', 1),
(10029, '2070310086', 'Les marins fantômes', 'Boris Zhitkov', 'Gallimard', '0000-00-00', 'assets/img/livres/10029.jpeg', 'Chez ma grand-mère, il y avait, sur une étagère du salon, un modèle réduit de bateau qui semblait si réel qu\'on aurait dit un vrai.\r\nJ\'étais même certain que de petits hommes y vivaient, des marins minuscules de la taille d\'une allumette. Et, un jour, je voulus découvrir la vérité...', 1),
(10030, '9782038702323', 'Robur le conquérant', 'Jules Verne', 'Larousse', '0000-00-00', 'assets/img/livres/10030.jpeg', 'Un phénomène extraordinaire se produisait dans les hautes zones du ciel – phénomène dont on ne pouvait reconnaître la nature ni l\'origine. Aujourd\'hui, il apparaissait au-dessus de l\'Amérique, quarante-huit heures après au-dessus de l\'Europe, huit jours plus tard, en Asie, au-dessus du Céleste Empire. Décidément, si la trompette qui signalait son passage n\'était pas celle du Jugement dernier, qu\'était donc cette trompette ?', 1),
(10031, '2070311988', 'Le problème', 'Marcel Aymé', 'Editions Gallimard', '1989-01-01', 'assets/img/livres/10031.jpeg', '\" Les parents posèrent leurs outils contre le mur et, poussant la porte, s\'arrêtèrent au seuil de la cuisine. Assises l\'une à côté de l\'autre, en face de leurs cahiers de brouillons, Delphine et Marinette leur tournaient le dos. Elles suçaient le bout de leur porte-plume et leurs jambes se balançaient sous la table. \" Alors ? demandèrent les parents. Il se fait, ce problème ? \" Les petites devinrent rouges. Elles ôtèrent leur porte-plume de leur bouche. \"', 1),
(10032, '9782070310517', 'L\'hippopotagne', 'Didier Blonay', 'Gallimard', '0000-00-00', 'assets/img/livres/10032.jpeg', 'Autrefois dans la montagne, vivait un hippopotagne. Il rencontra un sinpin et lui demanda : \"Etes-vous le roi ?\" Mais personne n\'avait la moindre idée de la tête que pouvait avoir le roi : personne ne l\'avait jamais vu...', 1),
(10033, '2070311422', 'Histoires de chaussettes', 'Alain serres/Anne Tonnac', 'Gallimard', '0000-00-00', 'assets/img/livres/10033.jpeg', 'ertains jours, les choses ne vont pas comme on s\'y attendrait. Alain Serres est un spécialiste de ce genre de journée, où les événements les plus prévisibles dérapent en histoires abracadabrantes. Amateurs de frisson et de fous rires, à vos marques, vous allez rencontrer l\'Ambassadeur, l\'horrible Extravache et le malheureux Millfeuille', 1),
(10036, '2070312356', 'Les cygnes', 'Marcel Aymé', 'Gallimard', '0000-00-00', 'assets/img/livres/10036.jpeg', 'Malgré l\'interdiction de leurs parents, Delphine et Marinette traversent la route dès qu\'ils ont le dos tourné et partent au rendez-vous des enfants perdus. Tous les animaux orphelins sont là, attendant de trouver des parents. A la suite d\'un malentendu, les petites filles sont adoptées par... des cygnes.', 1),
(10037, '9782038702453', 'La petite sirène', 'Hans Christian Andersen', 'Larousse', '1987-01-01', 'assets/img/livres/10037.jpeg', 'La petite sirène est triste depuis qu\'elle a vu ce beau prince...\r\nComment se faire aimer d\'un homme quand on vit au fond des océans et qu\'on a une queue de poisson en guise de jambes?', 1),
(10038, '2070312453', 'Le voyage d\'Alice', 'Jean Olivier Héron', 'Gallimard', '1990-01-09', 'assets/img/livres/10038.jpeg', 'Alice est sortie de son « pays des merveilles » pour aller explorer le pays des enfants sur la planète Terre. Au cours de son long voyage, elle s\'aperçoit qu\'il n\'est pas si facile d\'être un enfant réel, que certains enfants sont même cruellement exploités et maltraités.', 1),
(10039, '2070330974', 'Les contes bleus du chat perché', 'Marcel Aymé', 'Folio Junior', '1984-01-01', 'assets/img/livres/10039.jpeg', 'Ces contes évoquent l\'univers de Delphine et Marinette, qui jouent bien des tours à leurs parents grâce à la complicité des animaux qui parlent et comprennent le langage de l\'enfance.', 1),
(10041, '2075027676', 'Vendredi ou la vie sauvage', 'Michel Tournier', 'Folio Junior', '1978-01-03', 'assets/img/livres/10041.jpeg', 'Un jour de septembre 1759, Robinson, seul survivant du naufrage de La Virginie, échoue sur l\'île de Speranza et s\'en déclare gouverneur. Aussi, quand il rencontre l\'Indien Vendredi, le tient-il naturellement pour son esclave. Mais, finalement, les rôles s\'inversent : Robinson a beaucoup à apprendre de Vendredi... \"Ce n\'est plus Robinson qui apprend la civilisation à Vendredi, c\'est Vendredi qui apprend la vie sauvage à Robinson\"', 1),
(10042, '', 'Le scarabée d\'or', 'Edgard Allan Poe', 'Folio Junior', '1981-01-01', 'assets/img/livres/10042.jpeg', 'Dans cette nouvelle, William Legrand, trouve un magnifique scarabée doré sur l\'Île Sullivan en Caroline du Sud où ce fils de bonne famille déchu est venu fuir la misère. Apparemment en or massif, le scarabée va tourmenter son esprit jusqu\'à l\'obsession. La découverte d\'un message mystérieux, esquisse griffonnée sur un vieux parchemin, va alors engendrer pour les protagonistes une série de rebondissements mêlant suspense et cryptologie.', 1),
(10044, '', 'Les aventures de pinocchio', 'Carlo Collodi', 'Folio Junior', '0000-00-00', 'assets/img/livres/10044.jpeg', 'Il y avait une fois un morceau de bois. Un beau jour, ce morceau de bois se retrouva dans la boutique d’un vieux menuisier. Tout content, le menuisier, maître Cerise, entreprit aussitôt d\'en faire un solide pied de table. Quelle ne fut pas sa stupeur d’entendre alors le bois gémir sous les coups de hache! Effrayé par ce prodige, il offrit la bûche magique à son ami Gepetto… ', 1),
(10045, '2070334163', 'La dernière Invasion', 'Simon Farell, Jon Sutherland', 'Folio Junior', '1987-10-09', 'assets/img/livres/10045.jpeg', 'Un livre don vous êtes le héros', 1),
(10046, '2070577058', 'Les récrés du petit Nicolas', 'Sempé / Goscinny', 'Gallimard-Jeunesse', '2007-01-01', 'assets/img/livres/10046.jpeg', 'Les récrés d\'Agnan, Eudes, Rufus, Alceste, Joachim, Maixent, Clotaire, Geoffroy et du Petit Nicolas ont-elles lieu entre les cours ou pendant les cours ? C\'est souvent la question que se posent le Bouillon, le surveillant, M. Mouchabière, le directeur de l\'école, et la maîtresse... Toujours est-il qu\'avec cette bande de terribles copains, personne n\'a vraiment le temps de s\'ennuyer ! Le Petit Nicolas et ses copains font à nouveau les quatre cents coups !', 1),
(10047, '2070334732', 'Le chasseur des étoiles', 'Luke Sharp', 'Folio Junior', '1987-01-11', 'assets/img/livres/10047.jpeg', 'Les Gromulans, des humanoïdes nomades qui ont fini par se fixer sur une obscure planète appelée \"Terre\", ont enlevé le Président Galactique. Vous êtes le plus redoutable chasseur de primes de tous les univers connus. Un Traqueur dont la renommée n\'est plus à faire. Aussi, c\'est à VOUS que les autorités ont fait appel pour retrouver, puis délivrer le Président. Une mission des plus dangereuses pour laquelle vous ne disposerez que de quarante-huit heures !', 1),
(10048, '2070312089', 'Amandine Malabul sorcière maladroite', 'Jill Murphy', 'Gallimard', '1990-01-01', 'assets/img/livres/10048.jpeg', 'Les débuts maladroits d\'une gentille sorcière, héroïne de plusieurs volumes.', 1),
(10049, '2070513955', 'Lullaby', 'Jean-Marie Gustave Le Clézio', 'Folio Junior', '1999-01-01', 'assets/img/livres/10049.jpeg', 'Un matin du mois d\'octobre, Lullaby décide de ne plus aller à l\'école. Elle écrit à son père, glisse dans un sac quelques objets et, empruntant le chemin des contrebandiers, part en direction de la plage. Un petit garçon qui revient de la pêche, une jolie maison grecque, mais surtout le soleil et la mer remplissent ses journées d\'ivresse et de liberté. Un jour, pourtant, il faut revenir à l\'école. Qui donc voudra croire à son étrange voyage ?', 1),
(10050, '2070622258', 'Le chat qui parlait malgré lui', 'Claude Roy', 'Gallimard-Jeunesse', '2008-01-01', 'assets/img/livres/10050.jpeg', 'Un beau matin, sans crier gare, Gaspard, le cher ami chat de Thomas, se surprend à parler. En prose, et même en vers. On aurait pour moins la tête à l\'envers. En lisant l\'histoire absolument vraie du chat parleur au terrible secret, on verra comment le noble Gaspard parvint à surmonter cet étrange avatar. Chat malin, chat poète, et génie des matous, Gaspard le beau parleur gardera-t-il son secret jusqu\'au bout ?', 1),
(10055, '2070330168', 'L\'arbre aux shouaits', 'William Faulkner', 'Folio Junior', '2010-01-03', 'assets/img/livres/10055.jpeg', 'Tout est possible un jour d\'anniversaire. Ainsi la jeune Dulcie se réveille-t-elle un matin pour découvrir un petit rouquin qui lui promet monts et merveilles : un poney, un cirque, un château et, comble, de la magie, un Arbre aux souhaits! Non seulement un arbre dont les feuilles prennent la couleur du souhait de chacun, mais un arbre qui exauce les vœux de tous, pour de vrai... ', 1),
(10056, '9782081619524', 'Le dernier das vampires', 'Willis Hall', 'Flammarion-Pere Castor', '0000-00-00', 'assets/img/livres/10056.jpeg', 'Illustrations de Babette Cole. Traduit de l\'anglais par Hervé Zitvogel.', 1),
(10057, ' 978207051406', 'L\'enfant du dimanche', 'Gudrun Mebs', 'Folio Junior', '1983-01-03', 'assets/img/livres/10057.jpeg', 'Naître un dimanche, cela porte bonheur, dit-on. La petite fille est justement née un dimanche. Pourtant à l\'orphelinat, ce jour est pour elle le pire de tous : un jour où elle reste seule, alors que tous les autres enfants sont partis avec leurs parents du dimanche. Mais tous les dimanches ne se ressemblent pas ; il en viendra un si merveilleux qu\'il transformera à jamais tous les jours de la semaine.', 1),
(10058, '2081617064 ', 'Une jument extraordinaire', 'Joyce Rockwood', 'Flammarion-Pere Castor', '2002-09-12', 'assets/img/livres/10058.jpeg', 'Le jour où un Indien creek vole à Écureuil sa jument, personne dans sa tribu ne veut l\'aider à la retrouver. Qu\'a-t-elle de si extraordinaire, cette jument ? Le jeune Cherokee, lui, le sait. Il ira seul la reprendre à l\'ennemi. Mais, face à ce qui l\'attend, que peuvent ses onze ans ? Un roman captivant dans l\'univers mythique des tribus indiennes. ', 1),
(10060, '2081618613', 'Atome Pouce', 'Marcello Argilli', 'Flammarion-Pere Castor', '1986-01-05', 'assets/img/livres/10060.gif', 'Echappé du laboratoire où il a pris forme \" presque humaine \", Atome-Pouce a bien de la chance de rencontrer Colombine. Fille d\'un éminent savant, elle a tout de suite reconnu l\'étrange petit bonhomme. C\'est un atome, elle en est certaine, il sera le petit frère qu\'elle n\'a jamais eu... Mais Atome-Pouce attire bien des convoitises. Colombine, aidée du chat Fantasio, saura-t-elle déjouer tous les pièges qui se dressent devant eux ? ', 0),
(10061, ' 2081617838', 'Le Visiteur du crépuscule', 'Denis Brun', 'Flammarion-Pere Castor', '1983-01-01', 'assets/img/livres/10061.jpeg', 'Un vieux savant grognon reçoit tous les soirs la visite d\'un étrange petit garçon qui lui raconte des histoires à dormir debout. Celle du sapin de Noël qui a pris racine dans sa chambre, celle du lion qui devient son compagnon de jeux ou encore celle de la baleine au chandail arc-en-ciel. Et si pourtant ces incroyables histoires étaient vraies ? ', 1),
(10062, '2081646986', 'Perdu dans la taïga', 'Viktor Petrovitch Astafiev', 'Flammarion-Pere Castor', '2000-01-01', 'assets/img/livres/10062.jpeg', 'Ce matin-là, le fusil à l\'épaule et la cartouchière à la ceinture, Vassioutka s\'enfonce dans l\'immense taïga. Il sait qu\'il ne doit en aucun cas quitter le sentier tracé dans l\'épaisse forêt. Mais soudain, un grand tétras s\'envole sous ses yeux. Oubliant les recommandations de sa mère, Vassioutka poursuit l\'oiseau...\r\nSous les yeux de Ghirmantcha, la barque de ses parents s\'est retournée dans les eaux du fleuve en furie. Ni le père, ni la mère ne réapparaissent...', 1),
(10063, ' 978208125041', 'Le dernier des vampires', 'Willis Hall', 'Flammarion-Pere Castor', '1988-01-03', 'assets/img/livres/10063.jpeg', 'Quelles vacances ! La famille Hollins traverse la Manche pour la première fois. Quinze jours sur le continent, c\'est l\'aventure, surtout lorsqu\'on ne sait pas lire une carte !\r\nUn soir, Albert, Euphemia et leur fils Edgar plantent la tente au pied d\'un château biscornu. A la fenêtre d\'une tourelle tremblote une lumière, une bien étrange musique s\'en échappe. Des yeux verts luisent dans la nuit!', 1),
(10064, '2081617676', 'Dix-neuf fables de renard', 'Jean Muzi', 'Flammarion-Pere Castor', '1992-09-07', 'assets/img/livres/10064.jpeg', 'Truie, dit le Loup, donne-moi un de tes petits, car j’ai faim. – Ils sont très sales, répondit-elle, je vais en laver un pour toi dans la rivière. Arrivée au bord de l’eau, elle fit signe au Loup de s’approcher…', 1),
(10065, ' 2081617889', 'Pie, l\'oiseau solitaire', 'Colin Thiele', 'Flammarion-Pere Castor', '1983-01-01', 'assets/img/livres/10065.jpeg', 'Ses premiers vols, ses premiers jeux, toute sa jeunesse, Pie les vit au milieu des siens, sur la côte sud de l\'Australie.\r\nUn jour, un aigle passe dans le ciel et toute la colonie de pies s\'amusent à le poursuivre et à l\'agacer. Bientôt, Pie se retrouve seul à se mesurer à l\'aigle qui l\'entraîne loin de son territoire. Poussé par le vent au dessus de l\'océan, Pie s\'échoue, à demi-mort d\'épuisement, sur une île.', 1),
(10066, '2081621045', 'Ernest ou le Passé composé', 'Patrick Vendamme', 'Flammarion-Pere Castor', '1995-10-01', 'assets/img/livres/10066.jpeg', 'La construction d\'une autoroute toute proche d\'un petit village bouleverse la vie des paysans. L\'hôtel-bar des Marmousset est menacé de fermeture. Et son gardien, vieil homme solitaire, cherche les moyens d\'arrêter les travaux qui menacent sa retraite. Le récit touche les problèmes inhérents au progrès de la civilisation moderne: l\'intégration des étrangers, la salubrité de l\'environnement, l\'adaptation, etc. Personnages sympathiques.', 1);

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

--
-- Déchargement des données de la table `LivreTheme`
--

INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES
(10039, 19),
(10041, 19),
(10042, 19),
(10044, 19),
(10044, 19),
(10045, 19),
(10046, 19),
(10047, 19),
(10048, 19),
(10049, 19),
(10049, 19),
(10050, 19),
(10050, 19),
(10050, 19),
(10056, 19),
(10057, 19),
(10058, 19),
(10060, 19),
(10061, 19),
(10062, 19),
(10063, 19),
(10064, 19),
(10065, 19),
(10066, 19),
(10066, 19);

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
(1, '$2y$10$6OD77JMyVkX28enTsYjhEeu2J0jlKoUEBwxP6IXh6YM6uzXZ4yF2y'),
(3443, '$2y$10$86AFzcXzbxpdR9mAPhZLl.gS1PI82DzkfLggff7OvdzGp.ga0jfFO');

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
(3, 'Eleve');

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
(17, 'main_Etoile rouge', 'Available in further update', 0),
(18, 'main_Carré Rouge', 'Available in further update', 0),
(19, '', 'Available in further update', 0);

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
(1, 'admin', 'Kenobi', 'Obi-wan', 1),
(3, 'elev1', 'Daniel', 'Antoine', 3),
(4, 'elev2', 'Eleve', 'Test', 3),
(5, 'elev3', 'Eleve', 'Test', 3),
(3434, 'eleve5a72195b50bf6', 'Toto', 'Toto', 3),
(3435, 'eleve5a721a615c49f', 'Titi', 'Titi', 3),
(3437, 'eleve5a721ebb91ba6', 'Dernier', 'Test', 3),
(3438, 'eleve5a721ed1a2437', 'Dernier', 'Dernier', 3),
(3439, 'eleve5a72229acbb97', 'Ceci', 'Text', 3),
(3443, 'prof4', 'Yoda', 'Maitre', 2),
(3444, 'eleve5aa15bce28c20', 'Salut', 'Salut', 3);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10067;

--
-- AUTO_INCREMENT pour la table `Rallye`
--
ALTER TABLE `Rallye`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3445;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
