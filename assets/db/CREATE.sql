# Initialization script for Database

CREATE TABLE Role(
  id SERIAL PRIMARY KEY,
  libelle VARCHAR(50)
);

CREATE TABLE Classe(
  id SERIAL PRIMARY KEY,
  libelle VARCHAR(50)
);

# User table, describe user data
CREATE TABLE Utilisateur(
  id SERIAL PRIMARY KEY,
  identifiant VARCHAR(50) UNIQUE,
  nom VARCHAR(50),
  prenom VARCHAR(50),
  role BIGINT UNSIGNED,
  FOREIGN KEY (role) REFERENCES Role(id)
);

CREATE TABLE Eleve(
  id BIGINT UNSIGNED,
  classe BIGINT UNSIGNED,
  pastille VARCHAR(150),
  FOREIGN KEY (id) REFERENCES Utilisateur(id),
  FOREIGN KEY (classe) REFERENCES Classe(id)
);

CREATE TABLE Personnel(
  id BIGINT UNSIGNED,
  motdepasse VARCHAR(200),
  FOREIGN KEY (id) REFERENCES Utilisateur(id)
);

CREATE TABLE Theme(
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50),
  libelle VARCHAR(50),
  nbLivre INT(5)
);

CREATE TABLE Auteur(
  id SERIAL PRIMARY KEY,
  nom VARCHAR(150)
);

CREATE TABLE Livre(
  id SERIAL PRIMARY KEY,
  titre VARCHAR(150),
  auteur VARCHAR(150),
  edition VARCHAR(100),
  parution DATE,
  couverture VARCHAR(150),
  theme VARCHAR(50),
  FOREIGN KEY (theme) REFERENCES Theme(nom),
  FOREIGN KEY (auteur) REFERENCES Auteur(nom)
);

CREATE TABLE Emprunt(
  id_livre BIGINT UNSIGNED,
  id_eleve BIGINT UNSIGNED,
  dateEmprunt DATE,
  dateRendu DATE,
  FOREIGN KEY (id_livre) REFERENCES Livre(id),
  FOREIGN KEY (id_eleve) REFERENCES Utilisateur(id)
);

CREATE TABLE Disponible(
  id_livre BIGINT UNSIGNED,
  disponible BOOLEAN,
  FOREIGN KEY (id_livre) REFERENCES Livre(id)
);

CREATE TABLE Rallye(
  id SERIAL PRIMARY KEY,
  libelle VARCHAR(50),
  date DATE,
  nbLivre INT(5)
);

CREATE TABLE ThemeRallye(
  id_theme BIGINT UNSIGNED,
  id_rallye BIGINT UNSIGNED,
  FOREIGN KEY (id_theme) REFERENCES Theme(id),
  FOREIGN KEY (id_rallye) REFERENCES Rallye(id)
);



CREATE TABLE LivreRallye(
  id_livre BIGINT UNSIGNED,
  id_rallye BIGINT UNSIGNED,
  FOREIGN KEY (id_livre) REFERENCES Livre(id),
  FOREIGN KEY (id_rallye) REFERENCES Rallye(id)
);

