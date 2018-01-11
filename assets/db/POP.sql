#Themes
INSERT INTO `Theme` (`nom`, `libelle`) VALUES
  ('Fantastique', 'Livres sur le theme fantastique');

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
  ('Forêt', 'Livres sur la forêt ou se déroulant à l intérieur ');

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
  ('Mer', 'Livres sur la mer ou se déroulant à l intérieur ');

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
  ('Animaux', 'Livres sur les animaux ');

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
('Prince et Princesse', 'Histoires de prince ou de princesse');

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
('Humour', "Histoires rigolotes ou centrées sur l'humour");

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
('Amitié', "Histoires centrées sur l'amitié des personnages");

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
('Emotions', "Histoire sérieuse sur l'apprentissage des émotions");

INSERT INTO `Theme` (`nom`, `libelle`) VALUES
('Pirates', "Histoires de pirates");

#Auteur
INSERT INTO Auteur (nom) VALUES ('J.K. Rowling');
INSERT INTO Auteur (nom) VALUES ('Antoine de Saint-Exupéry');
INSERT INTO Auteur (nom) VALUES ('Philip Pullman');
INSERT INTO Auteur (nom) VALUES ('Sempé / Goscinny');
INSERT INTO Auteur (nom) VALUES ('Nathalie Choux');
INSERT INTO Auteur (nom) VALUES ('Marie-Hélène Delval');
INSERT INTO Auteur (nom) VALUES ('C.S. Lewis');
INSERT INTO Auteur (nom) VALUES ('ZEP / Shirley Anguerrand');
INSERT INTO Auteur (nom) VALUES ('Gérard Moncomble / Sébastien Telleschi');

#Classe
INSERT INTO `Classe` (libelle) VALUES ('CM1');
INSERT INTO `Classe` (libelle) VALUES ('CM2');
INSERT INTO `Classe` (libelle) VALUES ('CP');
INSERT INTO `Classe` (libelle) VALUES ('CE1');
INSERT INTO `Classe` (libelle) VALUES ('CE2');

#Livres
INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Harry Potter et la chambre des secrets', 'J.K. Rowling', 'Folio Junior', '2017-10-12', 'assets/img/livres/1.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Le petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', '2017-10-12', 'assets/img/livres/2.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Les Royaumes du Nord 1 : A la croisée des mondes', 'Philip Pullman', 'Gallimard', '2017-10-12', 'assets/img/livres/3.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Mes amis de la rue', 'Nathalie Choux', 'Mango', '2017-10-12', 'assets/img/livres/5.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Un petit frère pour toujours', 'Marie-Hélène Delval', 'Bayard Poche', '2017-10-12', 'assets/img/livres/6.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Le monde de Narnia 1 : Le neuveu du magicien', 'C.S. Lewis', 'Folio junior', '2017-10-12', 'assets/img/livres/7.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Le petit Nicolas s amuse', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/8.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Titeuf : Au secours !', 'ZEP / Shirley Anguerrand', '""', '2017-10-12', 'assets/img/livres/9.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Mille milliards de pirates', 'Gérard Moncomble / Sébastien Telleschi', 'Milan poche', '2017-10-12', 'assets/img/livres/10.jpg','');

#Eleve
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'bear');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'bee');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'bird');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'butterfly');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'cat');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'cow');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'dog');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'dolphin');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'dove');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'horse');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'hen');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'fish');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'bear');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'zebra');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (1, 'wolf');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'wolf');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'penguin');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'parrot');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'sheep');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'tiger');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (2, 'turtle');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'flamingo');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'gorilla');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'frog');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'fox');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'eagle');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'duck');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'panda');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'dolphin');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'butterfly');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'cat');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'dog');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (3, 'wolf');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'dog');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'panda');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'tiger');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'dolphin');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'elephant');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (4, 'bird');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'tiger');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'cow');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'cat');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'frog');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'flamingo');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'fish');
INSERT INTO `Eleve` (`classe`, `pastille`) VALUES (5, 'horse');

#Emprunt
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (1, 3, '2018-05-05', '2018-05-25');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (2, 3, '2018-02-10', '2018-02-21');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (4, 4, '2018-02-18', '2018-02-28');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (3, 4, '2018-03-15', '2018-03-19');

#LivreRallye
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (1, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (2, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (3, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (4, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (21, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (20, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (19, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (20, 3);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (1, 3);

#LivreTheme
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (1, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (2, 5);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (3, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (4, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (16, 7);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (17, 8);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (18, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (19, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (20, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (21, 9);

#Rallye
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye1', '2018-01-20', NULL);
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye2', '2018-02-04', NULL);
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye3', '2018-05-12', NULL);

#Role
INSERT INTO `Role` (libelle) VALUES ('Administrateur');
INSERT INTO `Role` (libelle) VALUES ('Professeur');
INSERT INTO `Role` (libelle) VALUES ('Eleve');
INSERT INTO `Role` (libelle) VALUES ('NC');

