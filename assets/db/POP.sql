#Themes
INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Fantastique', 'Livres sur le theme fantastique', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Forêt', 'Livres sur la forêt ou se déroulant à l intérieur ', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Mer', 'Livres sur la mer ou se déroulant à l intérieur ', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Animaux', 'Livres sur les animaux ', 0);

#Auteur
INSERT INTO Auteur (nom) VALUES ('J.K. Rowling');
INSERT INTO Auteur (nom) VALUES ('Antoine de Saint-Exupéry');
INSERT INTO Auteur (nom) VALUES ('Philip Pullman');
INSERT INTO Auteur (nom) VALUES ('Sempé / Goscinny');

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
  ('Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Mes amis de la rue', 'Nathalie Choux', 'Mango', '2017-10-12', 'assets/img/livres/5.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Un petit frère pour toujours', 'Marie-Hélène Delval', 'Bayard Poche', '2017-10-12', 'assets/img/livres/6.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Le monde de Narnia 1 : Le neuveu du magicien', 'C.S. Lewis', 'Folio junior', '2017-10-12', 'assets/img/livres/7.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Le petit Nicolas s amuse', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/8.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Titeuf : Au secours !', 'ZEP / Shirley Anguerrand', '""', '2017-10-12', 'assets/img/livres/9.jpg','""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Mille milliards de pirates', 'Gérard Moncomble / Sébastien Telleschi', 'Milan poche', '2017-10-12', 'assets/img/livres/10.jpg','""');