#Role
# INSERT INTO `Role` (libelle) VALUES ('Administrateur');
# INSERT INTO `Role` (libelle) VALUES ('Professeur');
# INSERT INTO `Role` (libelle) VALUES ('Eleve');
INSERT INTO `Role` (libelle) VALUES ('NC');

#Classe
INSERT INTO `Classe` (libelle) VALUES ('CP');
INSERT INTO `Classe` (libelle) VALUES ('CE1');
INSERT INTO `Classe` (libelle) VALUES ('CE2');
INSERT INTO `Classe` (libelle) VALUES ('CM1');
INSERT INTO `Classe` (libelle) VALUES ('CM2');

#Utilisateur
INSERT INTO Utilisateur (identifiant,nom,prenom,role) VALUES
  ('elev1','Eleve','1',3),
  ('elev2','Eleve','2',3),
  ('elev3','Eleve','3',3),
  ('elev4','Eleve','4',3),
  ('elev5','Eleve','5',3),
  ('elev6','Eleve','6',3),
  ('elev7','Eleve','7',3),
  ('elev8','Eleve','8',3),
  ('elev9','Eleve','9',3),
  ('elev10','Eleve','10',3),
  ('elev11','Eleve','11',3),
  ('elev12','Eleve','12',3),
  ('elev13','Eleve','13',3),
  ('elev14','Eleve','14',3),
  ('elev15','Eleve','15',3),
  ('elev16','Eleve','16',3),
  ('elev17','Eleve','17',3),
  ('elev18','Eleve','18',3),
  ('elev19','Eleve','19',3),
  ('elev20','Eleve','20',3),
  ('elev21','Eleve','21',3),
  ('elev22','Eleve','22',3),
  ('elev23','Eleve','23',3),
  ('elev24','Eleve','24',3),
  ('elev25','Eleve','25',3),
  ('elev26','Eleve','26',3),
  ('elev27','Eleve','27',3),
  ('elev28','Eleve','28',3),
  ('elev29','Eleve','29',3),
  ('elev30','Eleve','30',3),
  ('elev31','Eleve','31',3),
  ('elev32','Eleve','32',3),
  ('elev33','Eleve','33',3),
  ('elev34','Eleve','34',3),
  ('elev35','Eleve','35',3),
  ('elev36','Eleve','36',3),
  ('elev37','Eleve','37',3),
  ('elev38','Eleve','38',3),
  ('elev39','Eleve','39',3),
  ('elev40','Eleve','40',3),
  ('elev41','Eleve','41',3),
  ('elev42','Eleve','42',3),
  ('elev43','Eleve','43',3),
  ('elev44','Eleve','44',3),
  ('elev45','Eleve','45',3),
  ('elev46','Eleve','46',3);


#Eleve
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (2,1, 'bear');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (3,1, 'bee');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (4,1, 'bird');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (5,1, 'butterfly');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (6,1, 'cat');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (7,1, 'cow');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (8,1, 'dog');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (9,1, 'dolphin');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (10,1, 'dove');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (11,2, 'horse');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (12,2, 'hen');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (13,2, 'fish');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (14,2, 'bear');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (15,2, 'zebra');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (16,1, 'wolf');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (17,2, 'wolf');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (18,2, 'penguin');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (19,2, 'parrot');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (20,2, 'sheep');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (21,2, 'tiger');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (22,2, 'turtle');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (23,3, 'flamingo');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (24,3, 'gorilla');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (25,3, 'frog');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (26,3, 'fox');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (27,3, 'eagle');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (28,3, 'duck');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (29,3, 'panda');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (30,3, 'dolphin');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (31,3, 'butterfly');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (32,3, 'cat');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (33,3, 'dog');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (34,3, 'wolf');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (35,4, 'dog');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (36,4, 'panda');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (37,4, 'tiger');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (38,4, 'dolphin');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (39,4, 'elephant');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (40,4, 'bird');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (41,5, 'tiger');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (42,5, 'cow');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (43,5, 'cat');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (44,5, 'frog');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (45,5, 'flamingo');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (46,5, 'fish');
INSERT INTO `Eleve` (`id`,`classe`, `pastille`) VALUES (47,5, 'horse');

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

#Livres
INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Harry Potter et la chambre des secrets', 'J.K. Rowling', 'Folio Junior', '2017-10-12', 'assets/img/livres/1.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Le petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', '2017-10-12', 'assets/img/livres/2.jpeg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Les Royaumes du Nord 1 : A la croisée des mondes', 'Philip Pullman', 'Gallimard', '2017-10-12', 'assets/img/livres/3.jpg','');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, `description`) VALUES
  ('Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpeg','');

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

#LivreTheme
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (1, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (2, 5);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (3, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (4, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (5, 7);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (6, 8);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (7, 1);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (8, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (9, 6);
INSERT INTO `LivreTheme` (`id_livre`, `id_theme`) VALUES (10, 9);


#Emprunt
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (1, 3, '2018-05-05', '2018-05-25');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (2, 3, '2018-02-10', '2018-02-21');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (4, 4, '2018-02-18', '2018-02-28');
INSERT INTO `Emprunt` (`id_livre`, `id_eleve`, `dateEmprunt`, `dateRendu`) VALUES (3, 4, '2018-03-15', '2018-03-19');

#Rallye
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye1', '2018-01-20', NULL);
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye2', '2018-02-04', NULL);
INSERT INTO `Rallye` (`libelle`, `date`, `theme`) VALUES ('Rallye3', '2018-05-12', NULL);

#LivreRallye
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (1, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (2, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (3, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (4, 1);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (10, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (9, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (8, 2);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (2, 3);
INSERT INTO `LivreRallye` (`id_livre`, `id_rallye`) VALUES (4, 3);







