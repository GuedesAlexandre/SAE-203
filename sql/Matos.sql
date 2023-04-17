-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 17 avr. 2023 à 13:21
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Matos`
--

-- --------------------------------------------------------

--
-- Structure de la table `Emprunt`
--

CREATE TABLE `Emprunt` (
  `IDE` int(8) NOT NULL,
  `ID` int(8) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Materiels`
--

CREATE TABLE `Materiels` (
  `ID` int(8) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Quantité` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `IDE` int(8) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Birth` date NOT NULL,
  `Password` varchar(105) NOT NULL,
  `Role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD PRIMARY KEY (`IDE`,`ID`),
  ADD KEY `ID` (`ID`);

--
-- Index pour la table `Materiels`
--
ALTER TABLE `Materiels`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`IDE`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`IDE`) REFERENCES `utilisateurs` (`IDE`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `Materiels` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
