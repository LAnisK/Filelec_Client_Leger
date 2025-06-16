DROP DATABASE IF EXISTS filelec;
CREATE DATABASE filelec;
USE filelec;
 
-- Table Client
CREATE TABLE client (
    id_client INT(5) NOT NULL AUTO_INCREMENT,
    nom_client VARCHAR(50) NOT NULL,
    prenom_client VARCHAR(50) NOT NULL,
    adresse_client VARCHAR(50) NOT NULL,
    email_client VARCHAR(50) NOT NULL UNIQUE,
    tel_client CHAR(12) NOT NULL UNIQUE,
    mdp_client VARCHAR(30) NOT NULL,
    date_creation_client DATE NOT NULL,
    url_client VARCHAR(255) NOT NULL,
    type_client ENUM('Particulier', 'Professionnel') NOT NULL,
    PRIMARY KEY (id_client)
);
 
-- Table Catégorie
CREATE or replace TABLE categorie (
    id_cat INT(10) NOT NULL AUTO_INCREMENT,
    nom_cat VARCHAR(25) NOT NULL,
    url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_cat)
);
 
-- Table Article
CREATE TABLE article (
    id_article INT(10) NOT NULL AUTO_INCREMENT,
    nom_article VARCHAR(25) NOT NULL,
    description_article VARCHAR(100) NOT NULL,
    prix_article FLOAT(10,2) NOT NULL,
    stock_article INT DEFAULT 0,
    id_cat INT(10) NOT NULL,
    PRIMARY KEY (id_article),
    FOREIGN KEY (id_cat) REFERENCES categorie(id_cat)
);
 
-- Table Image Article (corrigée)
CREATE TABLE image (
    id_image INT(10) NOT NULL AUTO_INCREMENT,  
    nom_image VARCHAR(255) NOT NULL,                       
    url_image VARCHAR(255) NOT NULL,
    id_article INT(10) NOT NULL,
    PRIMARY KEY (id_image),
    FOREIGN KEY (id_article) REFERENCES article(id_article)
);
 
 
 

 
-- Table Technicien
CREATE TABLE technicien (
    id_technicien INT(12) NOT NULL AUTO_INCREMENT,
    nom_technicien VARCHAR(25) NOT NULL,
    prenom_technicien VARCHAR(25) NOT NULL,
    email_technicien VARCHAR(50) NOT NULL UNIQUE,
    mdp_technicien VARCHAR(30) NOT NULL,
    telephone_technicien VARCHAR(20),
    role_technicien enum ("technicien", "admin", "user"),
    PRIMARY KEY (id_technicien)
);
 
 
-- Table Commande
CREATE TABLE commande (
    id_commande INT(10)  AUTO_INCREMENT,
    id_client INT(5) NOT NULL,
    date_commande DATE NOT NULL,
    statut ENUM('en preparation', 'en chemin', 'livré') NOT NULL,
    montant_total FLOAT(10,2),
    adresse_livraison VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_commande),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);
 
CREATE TABLE panier (
    id_panier INT(10) NOT NULL AUTO_INCREMENT,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_commande INT(10),
    id_client INT(5) NOT NULL,
    PRIMARY KEY (id_panier),   
    FOREIGN KEY (id_client) REFERENCES client(id_client) ON DELETE CASCADE,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande) ON DELETE CASCADE  
);

-- Table Ligne de Commande
CREATE TABLE ligne (
    id_ligne INT(12) NOT NULL AUTO_INCREMENT,
    id_article INT(10) NOT NULL,
    quantite INT(5) NOT NULL,
     id_panier INT(10) NOT NULL,
   
    PRIMARY KEY (id_ligne),
    FOREIGN KEY (id_panier) REFERENCES panier(id_panier) ON DELETE CASCADE,
    FOREIGN KEY (id_article) REFERENCES article(id_article)ON DELETE CASCADE
);

alter table panier add statut enum ("courant","valide");

create or replace view vuePanier as (
select ligne.*, panier.id_client, article.nom_article, article.prix_article
from ligne 
inner join panier on panier.id_panier = ligne.id_panier
inner join article on ligne.id_article = article.id_article
) ;

delimiter $

create or replace procedure insertCommande(in p_id_client int)
begin
declare p_montant float;
declare p_adresse varchar(200);
declare p_url varchar(100);
declare p_nom varchar(50);

select sum(prix_article * quantite) into p_montant
from vuepanier
where id_client = p_id_client;

select adresse_client into p_adresse
from client
where id_client = p_id_client;

select nom_client into p_nom
from client
where id_client = p_id_client;

set p_url = concat(p_nom, sysdate(), ".pdf");

insert into commande values (null, p_id_client, curdate(), 'en preparation', p_montant, p_adresse, p_url);

end $
delimiter ;

INSERT INTO categorie VALUES (null, 'Pneu', 'pneu_filtre.png');
insert into categorie values (null, "Frein", "disque_frein_filtre.png");
insert into categorie values (null, "Liquide", "liquide_filtre.png");


insert into article values (null, "Pneu Ete", "Un pneu d'été est conçu pour offrir une excellente adhérence.", 70, 10, 1);
insert into article values (null, "Frein", "Ce systeme de frein haute qualite garantit une reduction efficace des distances d'arret.", 30, 10, 2);
insert into article values (null, "Liquide refroidissement", "Liquide de refroidissement a base de monoethylene glycol.", 20, 20, 3);

insert into image values (null, "pneu", "img/image_article/pneu.png", 1);
insert into image values (null, "frein", "img/image_article/frein.png", 2);
insert into image values (null, "liquide", "img/image_article/liquide.png", 3);

ALTER TABLE commande
ADD p_url VARCHAR(255);

delimiter $
 create procedure deleteClient(IN p_idclient INT)
 BEGIN
 delete from intervention where id_client = p_idclient;
 delete from commande where id_client = p_idclient;
 delete from client where id_client = p_idclient;
 END $
 delimiter ;