-- Active: 1713738050477@@127.0.0.1@3306@qr
-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 03 avr. 2024 à 15:56
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `QR`
--

-- --------------------------------------------------------
--
-- 5 tables : 'unique_keys' - 'inscrit' - 'user' - 'seminar' - 'ci_sessions'
--                              
 drop database if exists QR; 
 create database `QR` collate utf8_general_ci;
use QR;

--
-- Structure de la table `ci_sessions`
--
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE unique_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    unique_key VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `inscrit` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    idSeminar Int NOT NULL,
    CIN varchar(50) NOT NULL,
    CNE varchar(50) NOT NULL,
    email varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `seminar` (
    idSeminar INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    personCertifie VARCHAR(255) NOT NULL, -- personne qui certifie
    organisateur VARCHAR(255) NOT NULL,
    personSign VARCHAR(255) NOT NULL, -- personne qui sign
    imageUrl VARCHAR(255) NOT NULL,
    date DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` INT NOT NULL primary key auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` BOOLEAN,
  `active` BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE user_seminar (
    idUser INT,
    idSeminar INT,
    
    CONSTRAINT PK_usr_sem PRIMARY KEY (idUser,idSeminar)
);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp_QR` (`timestamp`);
  
--
-- clé étranger pour la table `inscrit`
--
ALTER TABLE inscrit ADD Constraint fk_inscrit_seminar FOREIGN KEY (idSeminar) REFERENCES seminar(idSeminar);

-- clé étranger pour la table user_seminar
ALTER TABLE user_seminar ADD Constraint fk_seminar_user FOREIGN KEY (idUser) REFERENCES user(id),
   ADD Constraint fk_user_seminar FOREIGN KEY (idSeminar) REFERENCES seminar(idSeminar);

--
-- Insertion des valeurs
--
Insert into user values(null,'admin','0000',true,true);
Insert into user values(null,'user','0000',false,true);

INSERT INTO seminar VALUES(null,'موضوع الندوة1','تقديرية','عميد كلية الشريعة بفاس','المنظم1','العميد','plugins/img/sign.png','2024-05-15 12:12:12');
INSERT INTO seminar VALUES(null,'موضوع الندوة2','تقديرية','عميد كلية الشريعة بفاس','المنظم2','العميد','plugins/img/logo.png','2024-06-16 12:12:12');
INSERT INTO seminar VALUES(null,'موضوع الندوة3','تقديرية','عميد كلية الشريعة بفاس','المنظم3','العميد','plugins/img/logo1.png','2024-07-17 12:12:12');



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
