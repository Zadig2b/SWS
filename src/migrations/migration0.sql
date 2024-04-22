-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 avr. 2024 à 08:45
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sws`
--

DELIMITER $$
--
-- Fonctions
--
DROP FUNCTION IF EXISTS `populateSuiviTable`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `populateSuiviTable` () RETURNS VARCHAR(255) CHARSET utf8mb4  BEGIN
    DECLARE msg VARCHAR(255);

    -- Insert records into the appartient table
    INSERT INTO appartient (Id_promo, Id_utilisateur)
    SELECT p.Id_promo, u.Id_utilisateur
    FROM promo p
    JOIN utilisateur u ON u.Id_promo = p.Id_promo;

    -- Set the message to return
    SET msg = 'Suivi table populated successfully';

    RETURN msg;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE IF NOT EXISTS `appartient` (
  `Id_promo` int NOT NULL,
  `Id_utilisateur` int NOT NULL,
  PRIMARY KEY (`Id_promo`,`Id_utilisateur`),
  KEY `Id_utilisateur` (`Id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appartient`
--

INSERT INTO `appartient` (`Id_promo`, `Id_utilisateur`) VALUES
(1, 21),
(1, 33),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Id_cours` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `date_début` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `code` int DEFAULT NULL,
  `Id_promo` int NOT NULL,
  `participants` int DEFAULT '0',
  PRIMARY KEY (`Id_cours`),
  KEY `Id_promo` (`Id_promo`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`Id_cours`, `nom`, `date_début`, `date_fin`, `code`, `Id_promo`, `participants`) VALUES
(36, 'Course 1', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 5, 0),
(35, 'Cours 5', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 5, 0),
(34, 'Cours 4', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 4, 0),
(33, 'Cours 3', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 3, 0),
(32, 'Cours 2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 2, 0),
(31, 'Cours 1', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 1, 0),
(37, 'Course 2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 1, 0),
(38, 'Course 3', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 4, 0),
(39, 'Course 4', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 4, 0),
(40, 'Course 5', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 1, 0),
(41, 'Course 6', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 2, 0),
(42, 'Course 7', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 5, 0),
(43, 'Course 8', '2024-04-19 00:00:00', '2024-04-19 00:00:00', NULL, 2, 0),
(44, 'Cours Matin 1', '2024-04-21 09:00:00', '2024-04-21 12:00:00', NULL, 2, 0),
(45, 'Cours Matin 2', '2024-04-21 09:00:00', '2024-04-21 12:00:00', NULL, 2, 0),
(46, 'Cours Matin 3', '2024-04-21 09:00:00', '2024-04-21 12:00:00', NULL, 2, 0),
(47, 'Cours Matin 4', '2024-04-21 09:00:00', '2024-04-21 12:00:00', NULL, 2, 0),
(48, 'Cours Matin 5', '2024-04-21 09:00:00', '2024-04-21 12:00:00', NULL, 2, 0),
(49, 'Cours Après-midi 1', '2024-04-21 13:00:00', '2024-04-21 17:00:00', NULL, 1, 0),
(50, 'Cours Après-midi 2', '2024-04-21 13:00:00', '2024-04-21 17:00:00', NULL, 1, 0),
(51, 'Cours Après-midi 3', '2024-04-21 13:00:00', '2024-04-21 17:00:00', NULL, 1, 0),
(52, 'Cours Après-midi 4', '2024-04-21 13:00:00', '2024-04-21 17:00:00', NULL, 1, 0),
(53, 'Cours Après-midi 5', '2024-04-21 13:00:00', '2024-04-21 17:00:00', NULL, 1, 0),
(54, 'Cours Matin 1', '2024-04-22 09:00:00', '2024-04-22 12:00:00', NULL, 2, 0),
(55, 'Cours Matin 2', '2024-04-22 09:00:00', '2024-04-22 12:00:00', NULL, 2, 0),
(56, 'Cours Matin 3', '2024-04-22 09:00:00', '2024-04-22 12:00:00', NULL, 2, 0),
(57, 'Cours Matin 4', '2024-04-22 09:00:00', '2024-04-22 12:00:00', NULL, 2, 0),
(58, 'Cours Matin 5', '2024-04-22 09:00:00', '2024-04-22 12:00:00', NULL, 2, 0),
(59, 'Cours Après-midi 1', '2024-04-22 13:00:00', '2024-04-22 17:00:00', NULL, 1, 0),
(60, 'Cours Après-midi 2', '2024-04-22 13:00:00', '2024-04-22 17:00:00', NULL, 1, 0),
(61, 'Cours Après-midi 3', '2024-04-22 13:00:00', '2024-04-22 17:00:00', NULL, 1, 0),
(62, 'Cours Après-midi 4', '2024-04-22 13:00:00', '2024-04-22 17:00:00', NULL, 1, 0),
(63, 'Cours Après-midi 5', '2024-04-22 13:00:00', '2024-04-22 17:00:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `Id_promo` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `places_max` int DEFAULT NULL,
  `début` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  PRIMARY KEY (`Id_promo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`Id_promo`, `nom`, `places_max`, `début`, `fin`) VALUES
(1, 'Informatique 101', 50, '2024-01-01', '2024-12-31'),
(2, 'Informatique Avancée', 45, '2024-01-01', '2024-12-31'),
(3, 'Développement Web', 60, '2024-01-01', '2024-12-31'),
(4, 'Sécurité Informatique', 40, '2024-01-01', '2024-12-31'),
(5, 'Data Science', 55, '2024-01-01', '2024-12-31'),
(6, 'Intelligence Artificielle', 50, '2024-01-01', '2024-12-31'),
(7, 'Réseaux et Télécommunications', 45, '2024-01-01', '2024-12-31'),
(8, 'Blockchain et Cryptomonnaies', 35, '2024-01-01', '2024-12-31'),
(9, 'Cloud Computing', 60, '2024-01-01', '2024-12-31'),
(10, 'Développement Mobile', 50, '2024-01-01', '2024-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `nom`) VALUES
(1, 'formateur'),
(2, 'student');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

DROP TABLE IF EXISTS `suivi`;
CREATE TABLE IF NOT EXISTS `suivi` (
  `Id_cours` int NOT NULL,
  `Id_utilisateur` int NOT NULL,
  `présence` tinyint(1) NOT NULL,
  `retard` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_cours`,`Id_utilisateur`),
  KEY `Id_utilisateur` (`Id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prénom` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `Id_role` int NOT NULL DEFAULT '2',
  `Id_promo` int NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  UNIQUE KEY `email` (`email`),
  KEY `Id_role` (`Id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `nom`, `prénom`, `email`, `password`, `actif`, `Id_role`, `Id_promo`, `token`) VALUES
(66, 'Dugeay', 'Romain', 'romain.dugeay@gmail.com', '$2y$10$ZHyV1UD..qWDVEl7g/2jiuxZRkeKp9unOjNozwJ3vhB1.bq7ofN7a', 1, 2, 1, '$2y$10$REDcwLzu7KUk7B2zcdgxBevbd2iuv4NNf/6YoSeUtXrqHauSJXqRy'),
(48, 'Taylor', 'Michael', 'michael.taylor@example.com', NULL, 1, 2, 1, NULL),
(49, 'Wilson', 'Sarah', 'sarah.wilson@example.com', NULL, 1, 2, 1, NULL),
(47, 'Brown', 'Emily', 'emily.brown@example.com', NULL, 1, 2, 1, NULL),
(45, 'Smith', 'Alice', 'alice.smith@example.com', NULL, 1, 2, 1, NULL),
(46, 'Johnson', 'Bob', 'bob.johnson@example.com', NULL, 1, 2, 1, NULL),
(44, 'Doe', 'John', 'john.doe@example.com', NULL, 1, 2, 1, NULL),
(65, 'Bonnet', 'Aurélie', 'aurelie.bonnet@example.com', NULL, 1, 2, 2, NULL),
(63, 'Girard', 'Lucie', 'lucie.girard@example.com', NULL, 1, 2, 2, NULL),
(64, 'Caron', 'Thomas', 'thomas.caron@example.com', NULL, 1, 2, 2, NULL),
(61, 'Moreau', 'Antoine', 'antoine.moreau@example.com', NULL, 1, 2, 2, NULL),
(62, 'Fournier', 'Camille', 'camille.fournier@example.com', NULL, 1, 2, 2, NULL),
(59, 'Rousseau', 'Alexandre', 'alexandre.rousseau@example.com', NULL, 1, 2, 2, NULL),
(60, 'Lefebvre', 'Marie', 'marie.lefebvre@example.com', NULL, 1, 2, 2, NULL),
(56, 'Dupont', 'Pierre', 'pierre.dupont@example.com', NULL, 1, 2, 2, NULL),
(57, 'Martin', 'Sophie', 'sophie.martin@example.com', NULL, 1, 2, 2, NULL),
(58, 'Dubois', 'Julie', 'julie.dubois@example.com', NULL, 1, 2, 2, NULL),
(33, 'Dugeay', 'Romain', 'meije.dev@gmail.com', '$2y$10$fDx0vJSK/XOjaDKGnjRs7uXhaxbIcECC2nTQFJxW9os21JwUjnWBe', 1, 1, 1, '$2y$10$2ZwzuZ2tZYQYJDyY1M2rEuVQ9ZIHaQU92b1LufM7ZDI3vA/OqGFSW'),
(50, 'Anderson', 'Emma', 'emma.anderson@example.com', NULL, 1, 2, 1, NULL),
(51, 'Thomas', 'David', 'david.thomas@example.com', NULL, 1, 2, 1, NULL),
(52, 'Walker', 'Olivia', 'olivia.walker@example.com', NULL, 1, 2, 1, NULL),
(53, 'Harris', 'Daniel', 'daniel.harris@example.com', NULL, 1, 2, 1, NULL),
(67, 'michel', 'jonas', 'mjcafromain@gmail.com', NULL, 0, 2, 1, '$2y$10$dUsaO3B66Y5dohS6bonTD.mYMLfhjpdPav95rw/FkKpmSGvinw2AO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
