#Themes
INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Fantastique', 'Livres sur le theme fantastique', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Forêt', 'Livres sur la forêt ou se déroulant à l intérieur ', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Mer', 'Livres sur la mer ou se déroulant à l intérieur ', 0);

INSERT INTO `Theme` (`nom`, `libelle`, `nbLivre`) VALUES
  ('Animaux', 'Livres sur les animaux ', 0);

#Livres
INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Harry Potter et la chambre des secrets', 'J.K. Rowling', 'Folio Junior', '2017-10-12', 'assets/img/livres/1.jpg,""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Le petit Prince', 'Antoine de Saint-Exupéry', 'Gallimard', '2017-10-12', 'assets/img/livres/2.jpg,""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Les Royaumes du Nord 1 : A la croisée des mondes', 'Philip Pullman', 'Gallimard', '2017-10-12', 'assets/img/livres/3.jpg,""');

INSERT INTO `Livre` (`titre`, `auteur`, `edition`, `parution`, `couverture`, description) VALUES
  ('Les bêtises du petit Nicolas', 'Sempé / Goscinny', 'Gallimard', '2017-10-12', 'assets/img/livres/4.jpg,""');