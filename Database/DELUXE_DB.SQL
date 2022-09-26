Deluxe_db commands on CLI
mysql -u root
CREATE DATABASE deluxe_db;
SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| centrale_db        |
| deluxe_db          |
| information_schema |
| learn_sql          |
| mysql              |
| performance_schema |
| phpmyadmin         |
| test               |
+--------------------+
USE DELUXE_DB;          /* NOT CASE-SENSETIVE */
CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS Societe (
code_Societe INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Raison_sociale VARCHAR(300) NOT NULL,
Adresse VARCHAR(350) NOT NULL,
Ville VARCHAR(300) NOT NULL,
Pays VARCHAR(300) NOT NULL,
Tel VARCHAR(300),
FAX VARCHAR(300),
EMAIL VARCHAR(320) NOT NULL,
Num_post VARCHAR(300) NOT NULL,
Identification_fiscale VARCHAR(50),
Patente VARCHAR(150),
Banque CHAR(100) NOT NULL,
Compte_bancaire VARCHAR(255) NOT NULL,
Forme_jurdrique VARCHAR(200) NOT NULL,
RC VARCHAR(200) NOT NULL
);
CREATE TABLE IF NOT EXISTS Fournisseur (
code_Fournisseur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Raison_sociale VARCHAR(300) NOT NULL,
Adresse VARCHAR(350) NOT NULL,
Ville VARCHAR(300) NOT NULL,
Pays VARCHAR(300) NOT NULL,
Tel VARCHAR(300),
FAX VARCHAR(300),
EMAIL VARCHAR(320),
Banque CHAR(100) NOT NULL,
Compte_bancaire VARCHAR(150) NOT NULL,
Page_acceuille VARCHAR(350),
Observation VARCHAR(300),
Contact VARCHAR(350),
Identification_fiscale VARCHAR(50),
Categorie_fr VARCHAR(256)
);
CREATE TABLE IF NOT EXISTS Style (
code_style INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS Famille (
code_Famille INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS Taille (
code_Taille INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS Collection (
code_Collection INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS Categorie (
code_Categorie INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS Couleur (
code_Couleur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS TVA (
code_TVA INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Taux FLOAT NOT NULL
);
CREATE TABLE IF NOT EXISTS Depot (
code_depot INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
libelle VARCHAR(350),
qte INT,
CHECK (qte>=0)
);
CREATE TABLE IF NOT EXISTS Reservation (
Num_Reservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Avance VARCHAR(500),
Date_res DATETIME NOT NULL,
Reste VARCHAR(500),
Observations VARCHAR(300)
);
CREATE TABLE IF NOT EXISTS Vendeur (
code_Vendeur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(150) NOT NULL,
Prenom VARCHAR(150) NOT NULL,
Adresse VARCHAR(350),
Ville VARCHAR(300),
Tel VARCHAR(300),
Observation VARCHAR(300)
);
CREATE TABLE IF NOT EXISTS Client (
code_client INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Nom VARCHAR(255) NOT NULL,
Prenom VARCHAR(255) ,
Tel VARCHAR(300),
FAX VARCHAR(300),
Ville VARCHAR(300),
Date_naissance DATE,
Raison_sociale VARCHAR(300),
Num_carte_fidelite VARCHAR(150),
Categorie_clt VARCHAR(300),
Banque CHAR(100) NOT NULL,
Compte_bancaire VARCHAR(150) NOT NULL,
Nombre_Enfants VARCHAR (150),
Pointure VARCHAR(150),
Taille VARCHAR(150)
);

CREATE TABLE IF NOT EXISTS Paiement (
Num_ticket INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Cheque VARCHAR(300) NOT NULL,
Carte_Bancaire VARCHAR(300),
Espece 	VARCHAR(350),
virement VARCHAR(350),
Facilite VARCHAR(350)
);
CREATE TABLE IF NOT EXISTS Magasin (
code_magasin INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
libelle VARCHAR(350),
qte INT,
CHECK (qte>=0),
adresse VARCHAR(300),
Tel VARCHAR(300),
FAX VARCHAR(300),
EMAIL VARCHAR(320)
);
CREATE TABLE IF NOT EXISTS Vente (
Num_Facture INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Caisse FLOAT NOT NULL,
Num_cheque VARCHAR(300),
Site VARCHAR(350),
Date_vente DATE NOT NULL,
Taux_remise FLOAT,
code_client INT,
FOREIGN KEY (code_client) REFERENCES Client(code_client)
);
CREATE TABLE IF NOT EXISTS Reception (
code_reception INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Date_reception  DATETIME NOT NULL,
code_Fournisseur INT,
FOREIGN KEY (code_Fournisseur) REFERENCES Fournisseur(code_Fournisseur)
);
CREATE TABLE IF NOT EXISTS Produit (
code_Produit INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
code_style VARCHAR(50),
code_Famille VARCHAR(50),
code_Collection VARCHAR(50),
code_taille VARCHAR(50),
code_TVA INT,
FOREIGN KEY (code_TVA) REFERENCES TVA(code_TVA)
);
CREATE TABLE IF NOT EXISTS Contenir_clr (
code_Produit INT,
FOREIGN KEY (code_Produit) REFERENCES Produit(code_Produit),
code_Couleur INT,
FOREIGN KEY (code_Couleur) REFERENCES Couleur(code_Couleur)
);
CREATE TABLE IF NOT EXISTS Ligne_reception (
code_Produit INT,
FOREIGN KEY (code_Produit) REFERENCES Produit(code_Produit),
code_reception INT,
FOREIGN KEY (code_reception) REFERENCES reception(code_reception)
);
CREATE TABLE IF NOT EXISTS Stocker (
code_depot INT,
FOREIGN KEY (code_depot) REFERENCES Depot(code_depot),
code_Produit INT,
FOREIGN KEY (code_Produit) REFERENCES Produit(code_Produit)
);
CREATE TABLE IF NOT EXISTS Ligne_vendeur (
Num_Facture INT,
FOREIGN KEY (Num_Facture) REFERENCES Vente(Num_Facture),
code_Vendeur INT,
FOREIGN KEY (code_Vendeur) REFERENCES Vendeur(code_Vendeur)
);
CREATE TABLE IF NOT EXISTS Ligne_vente (
code_magasin INT,
FOREIGN KEY (code_magasin) REFERENCES magasin(code_magasin),
Num_ticket INT,
FOREIGN KEY (Num_ticket) REFERENCES Paiement(Num_ticket),
Num_Facture INT,
FOREIGN KEY (Num_Facture) REFERENCES Vente(Num_Facture)
);



	








































 