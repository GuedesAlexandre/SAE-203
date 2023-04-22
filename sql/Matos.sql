-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 22 avr. 2023 à 09:46
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
  `DateDebut` datetime NOT NULL,
  `DateFin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Materiels`
--

CREATE TABLE `Materiels` (
  `ID` int(8) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Quantité` int(30) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Statut` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Materiels`
--

INSERT INTO `Materiels` (`ID`, `Nom`, `Type`, `Quantité`, `Description`, `Statut`) VALUES
(256789, 'PC gaming DELL', 'PC', 8, 'Disque dur:            1To SSD M2 NVME \r\nRAM:                      64 Go DDR4\r\nCarte Graphique:    Nvidia Quadro RTX 4000 8Go\r\nProcesseur:            Intel Xeon Silver 4210', 0),
(256890, 'casques Oculus Quest 2', 'VR', 3, 'Casque de réalité virtuelle tout-en-un, utilisable avec ou sans fil.\r\nStockage:256 Go\r\nRAM:6 Go\r\nProcesseur:Qualcomm Snapdragon XR2\r\nécran LCD : Résolution de 1832 x 1920 pixels par oeil\r\nHaut-parleurs:       intégrés pour une immersion à 360°\r\nAngle de vision:    120° (horizontal)\r\n', 0),
(256991, 'Camera 360°', 'Camera', 1, 'Résolution :                         14,4 Mégapixels\r\n\r\nStockage :                           14 Go\r\n\r\nFormat d\'enregistrement :   MP4\r\n\r\nQualité d\'enregistrement:    Ultra HD (4K)\r\n\r\nWiFi :                                   Oui\r\n\r\nBluetooth :                           Oui', 0),
(257092, 'LOGITECH BRIO 4K', 'Webcam', 4, 'nterface avec l\'ordinateur:   USB 3.0\r\nSans-fil:Non\r\nType de capteur:CMOS\r\nRésolution vidéo: 3840 x 2160 pixels\r\nMicrophone intégré:Oui\r\nCette webcam est pratique pour le développement en réalité augmentée, avec Unity 3D et Vuforia.', 0),
(257193, 'Trépied Smartphone', 'Support', 3, 'Hauteur max (24°) avec colonne dépliée : 57.6 cm\r\nHauteur max (24°) avec colonne repliée : 48.4 cm\r\nHauteur min : 15.7 cm\r\nHauteur max : 57.6 cm', 0),
(257294, 'Microphone HyperX', 'Micro', 2, 'Sélection entre quatre diagrammes polaires\r\nPied amortisseur contre les vibrations\r\nFiltre anti-pop interne\r\nPrise casque intégrée\r\nCompatibilité multi-dispositif et chat\r\nContient un adaptateur de pied', 0),
(257395, 'Casque Steelseries Arctic 5', 'Casque ', 2, 'Casque au son DTS Headphone : X v2.0 Surround \r\nMicrophone bidirectionnel rétractable avec suppression du bruit\r\nConnecteur : USB ou jack 3.5 mm 4 pôles\r\nContrôle audio via télécommande filaire\r\nBandeau de suspension s\'adaptant à toutes les formes de tête', 0),
(257496, 'Vidéoprojecteur laser LG ', 'Projecteur', 1, 'Vidéoprojecteur DLP Full HD\r\nFocale ultra-courte : image de 90\" avec recul de 8 cm / 120\" avec recul de 20 cm\r\nPrise en charge d\'un son Dolby Audio et DTS-HD\r\nBluetooth audio\r\nwebOS 4.0\r\nLecteur multimédia intégré via port USB\r\nConnectiques : HDMI x2, USB, S/PDIF Optique, Fast Ethernet', 0);

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
  `Role` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IDE`, `Nom`, `Prenom`, `Email`, `Birth`, `Password`, `Role`) VALUES
(25447, 'Guedes', 'Alexandre', 'alexandreguedes77400@gmail.com', '2003-11-17', '94aab378827826b123890233bcfee90af21dbb4b7cc8f258475208a6ff20e6a1', NULL),
(25538, 'Guedes', 'Alexandre', 'alexandreguedes77600@gmail.com', '2003-11-17', '94aab378827826b123890233bcfee90af21dbb4b7cc8f258475208a6ff20e6a1', NULL),
(25564, 'guedes', 'alexandre', 'alexandre.guedes@edu.univ-eiffel.fr', '2003-11-17', '94aab378827826b123890233bcfee90af21dbb4b7cc8f258475208a6ff20e6a1', NULL);

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
