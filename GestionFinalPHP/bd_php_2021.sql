-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 juil. 2021 à 23:02
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_php_2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `idAbsence` int(255) NOT NULL AUTO_INCREMENT,
  `dateAbsence` date NOT NULL,
  `etudiantMatricule` varchar(100) NOT NULL,
  `coursId` varchar(100) NOT NULL,
  PRIMARY KEY (`idAbsence`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`idAbsence`, `dateAbsence`, `etudiantMatricule`, `coursId`) VALUES
(1, '2021-05-18', 'PPP-PPP-PPP', '1');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `libelleClass` varchar(100) NOT NULL,
  `niveauClass` varchar(10) NOT NULL,
  `filiereClass` varchar(100) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `libelleClass`, `niveauClass`, `filiereClass`) VALUES
(1, 'L1', 'web', 'Designer'),
(2, 'maths', 'L2', 'Maths');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(255) NOT NULL AUTO_INCREMENT,
  `dateCours` varchar(13) NOT NULL,
  `classeCours` varchar(100) NOT NULL,
  `professeurCours` varchar(100) NOT NULL,
  `moduleCours` varchar(100) NOT NULL,
  `semestreCours` varchar(100) NOT NULL,
  `nbrHeureCours` int(10) NOT NULL,
  `heureDebutCours` varchar(255) NOT NULL,
  `heureFinCours` varchar(255) NOT NULL,
  PRIMARY KEY (`idCours`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `dateCours`, `classeCours`, `professeurCours`, `moduleCours`, `semestreCours`, `nbrHeureCours`, `heureDebutCours`, `heureFinCours`) VALUES
(1, '2021-06-16', 'L1 web designer', 'FFF-JHL-VHG', 'informatique', 's1', 10, '07:15:00', '12:00:00'),
(2, '1233-24-45', 'maths L2 MAths', 'TTT-FUY-VUU', 'maths', 'Semestre 2', 40, '08:00:00', '14:00:00'),
(3, '2021-07-01', 'L1 web Designer', 'TTT-FUY-VUU', 'informatique', 'Semestre S2', 40, '8:00', '12:00'),
(4, '2021-07-01', 'L1 web Designer', 'FFF-JHL-VHG', 'maths', 'Semestre S2', 40, '8:00', '12:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `matriculeEtu` varchar(12) DEFAULT NULL,
  `nomEtu` varchar(255) DEFAULT NULL,
  `prenomEtu` varchar(255) DEFAULT NULL,
  `classeEtu` varchar(255) DEFAULT NULL,
  `sexeEtu` char(1) DEFAULT NULL,
  `dateNaissanceEtu` varchar(255) DEFAULT NULL,
  `parcoursEtu` varchar(255) DEFAULT NULL,
  `competenceEtu` varchar(255) DEFAULT NULL,
  `avatarEtu` varchar(255) DEFAULT NULL,
  `anneeScolaire` varchar(255) DEFAULT NULL,
  `matriculeProf` varchar(255) DEFAULT NULL,
  `nomProf` varchar(255) DEFAULT NULL,
  `prenomProf` varchar(255) DEFAULT NULL,
  `classeProf` varchar(255) DEFAULT NULL,
  `moduleProf` varchar(255) DEFAULT NULL,
  `avatarProf` varchar(255) DEFAULT NULL,
  `sexeProf` char(1) DEFAULT NULL,
  `gradeProf` varchar(255) DEFAULT NULL,
  `dateNaissanceProf` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginUser` (`login`),
  UNIQUE KEY `1` (`login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `nom`, `role`, `avatar`, `matriculeEtu`, `nomEtu`, `prenomEtu`, `classeEtu`, `sexeEtu`, `dateNaissanceEtu`, `parcoursEtu`, `competenceEtu`, `avatarEtu`, `anneeScolaire`, `matriculeProf`, `nomProf`, `prenomProf`, `classeProf`, `moduleProf`, `avatarProf`, `sexeProf`, `gradeProf`, `dateNaissanceProf`) VALUES
(1, 'Babou@gmail.com', 'jesus', 'BABOU', 'ROLE_ADMIN', 'Babou@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(2, 'jean@gmail.com', 'jean', '', 'ROLE_ET', '', 'PPP-PPP-PPP', 'SANOGO', 'tidiane', 'L1 web designer', 'M', '2020-05-07', 'MAE2', 'maths', '', '05-07-2000', '', '', '', '', '', '', '', '', NULL),
(4, 'dem@gmail.com', 'dem', 'divine                     ', 'ROLE_AC', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'zidol@gmail.com', 'zidol', 'AGBODAZE                     ', 'ROLE_RP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'tid@gmail.com', 'tid', NULL, 'ROLE_PROF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FFF-JHL-VHG', 'SANOGO', 'tidiane', 'L1 web designer', 'mathematique', NULL, 'M', 'doctorat', NULL),
(7, 'etu@gmail.com', 'etu', '', 'ROLE_ET', NULL, 'HVI-HIO-GIO', 'OLAFA', 'divine', 'MAE-2', 'M', '12-5-20021', 'licence', 'java', NULL, '12-02-2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'divine@gmail.com', 'divine', '', 'ROLE_ET', NULL, 'TTT-FUY-VUU', 'ADAISSO', 'hugues', 'MAE-2', 'M', '12-5-20021', 'licence', 'java', NULL, '05-12-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'ivan@gmail.com', 'ivan', '', 'ROLE_PROF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'TTT-FUY-VUU', 'ADOU', 'Cindy', 'maths L2 MAths', 'maths', '', NULL, 'master', '2000-02-22'),
(10, 'baila@gmail.com', 'baila', NULL, 'ROLE_PROF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ITV-GCH-LJT', '                            WANE', 'baila', 'l2 web designer', 'php', NULL, 'M', 'GRADE_DOCTEUR ', '2021-07-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
