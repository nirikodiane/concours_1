-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 13 août 2025 à 16:22
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 7.3.31-1~deb10u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `concours`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id_candidat` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `sexe` varchar(25) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) DEFAULT NULL,
  `date_naissance` varchar(25) NOT NULL,
  `lieu_naissance` varchar(200) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `N_CIN` varchar(12) DEFAULT NULL,
  `Date_CIN` varchar(10) DEFAULT NULL,
  `Lieu_CIN` varchar(40) DEFAULT NULL,
  `adresse_email` varchar(200) DEFAULT NULL,
  `type_candidat` varchar(25) NOT NULL,
  `serie_bacc` varchar(25) NOT NULL,
  `mention_bacc` varchar(25) NOT NULL,
  `annee_bacc` int(11) NOT NULL,
  `centre` varchar(200) NOT NULL,
  `num_arrivee` varchar(25) NOT NULL,
  `mode_paiement` varchar(250) NOT NULL,
  `date_arrivee` varchar(25) NOT NULL,
  `dossier_complet` varchar(10) NOT NULL,
  `obs` text DEFAULT NULL,
  `saisi_par` varchar(200) DEFAULT NULL,
  `parcours1` varchar(10) NOT NULL,
  `parcours2` varchar(10) DEFAULT NULL,
  `ecole` varchar(20) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `modifie_par` varchar(200) DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `date_saisi` datetime DEFAULT NULL,
  `convoc` varchar(11) NOT NULL DEFAULT 'NON',
  `salle` varchar(25) DEFAULT NULL,
  `jury` varchar(100) DEFAULT NULL,
  `controle` varchar(3) DEFAULT 'NON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `id_centre` int(11) NOT NULL,
  `nom_centre` varchar(100) NOT NULL,
  `etat_centre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id_centre`, `nom_centre`, `etat_centre`) VALUES
(1, 'Antsiranana', 'OUI'),
(2, 'Ambilobe', 'OUI'),
(3, 'Ambanja', 'OUI'),
(4, 'Sambava', 'OUI'),
(5, 'Antsohihy', 'OUI'),
(6, 'Antananarivo', 'OUI'),
(7, 'Fianarantsoa', 'OUI'),
(8, 'Mahajanga', 'OUI'),
(9, 'Toamasina', 'OUI'),
(10, 'Toliara', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

CREATE TABLE `convocation` (
  `id_convoc` int(11) NOT NULL,
  `imprim_convoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `convocation`
--

INSERT INTO `convocation` (`id_convoc`, `imprim_convoc`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `date_concours`
--

CREATE TABLE `date_concours` (
  `ID` int(11) NOT NULL,
  `Cycle` varchar(25) DEFAULT NULL,
  `Premier_Date` text DEFAULT NULL,
  `Deuxiem_Date` text DEFAULT NULL,
  `session` varchar(200) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `annee_univ` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `date_concours`
--

INSERT INTO `date_concours` (`ID`, `Cycle`, `Premier_Date`, `Deuxiem_Date`, `session`, `annee`, `annee_univ`) VALUES
(1, 'cycle1', 'Jeudi 18 septembre', 'Vendredi 19 septembre', '18 et 19 septembre 2025', '2025', '2025-2026'),
(2, 'cycle2', 'Vendredi 19 septembre', 'Samedi 20 septembre', '19 et 20 septembre 2025', '2025', '2025-2026');

-- --------------------------------------------------------

--
-- Structure de la table `etiquette`
--

CREATE TABLE `etiquette` (
  `id_etiquette` int(11) NOT NULL,
  `ecole` varchar(100) DEFAULT NULL,
  `parcours` varchar(100) DEFAULT NULL,
  `date_etiquette` varchar(100) DEFAULT NULL,
  `epreuve` varchar(100) DEFAULT NULL,
  `horaire` varchar(100) DEFAULT NULL,
  `duree` varchar(100) DEFAULT NULL,
  `niveau` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etiquette`
--

INSERT INTO `etiquette` (`id_etiquette`, `ecole`, `parcours`, `date_etiquette`, `epreuve`, `horaire`, `duree`, `niveau`) VALUES
(1, 'Ecole du Génie Industriel (EGI)', 'MEEM – MEFT – MSA – RT – TIM – TBM – Mines – AGRI – PAn – IAA', 'Jeudi 18 septembre 2025', 'Français', '08h 00 – 09h 30', '1h 30', 'DTS'),
(2, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'BAT – TP – TAF – TECNA – PAq', 'Jeudi 18 septembre 2025', 'Français', '08h 00 – 9h 30', '1h 30', 'DTS'),
(3, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'COM – TBA – GFC – RH – GAN', 'Jeudi 18 septembre 2025', 'Français', '08h 00 – 09h 30', '1h 30', 'DTS'),
(4, 'Ecole du Génie Industriel (EGI)', 'MEEM – MEFT – MSA – RT – TIM – TBM – Mines – AGRI – PAn – IAA', 'Jeudi 18 septembre 2025', 'Mathématiques', '09h 45 – 11h 45', '2h 00', 'DTS'),
(5, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'BAT – TP – TAF – TECNA – PAq', 'Jeudi 18 septembre 2025', 'Mathématiques', '09h 45 – 11h 45', '2h 00', 'DTS'),
(6, 'Ecole du Génie Industriel (EGI)', 'MEEM – MEFT – MSA', 'Jeudi 18 septembre 2025', 'Dessin –Technologie', '14h 30 – 16h 30', '2h 00', 'DTS'),
(7, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'BAT – TP – TAF', 'Jeudi 18 septembre 2025', 'Dessin –Technologie', '14h 30 – 16h 30', '2h 00', 'DTS'),
(8, 'Ecole du Génie Industriel (EGI)', 'MEEM – MEFT – MSA – RT – TIM - TBM', 'Vendredi 19 septembre 2025', 'Physiques', '08h 00 – 9h 30', '1h 30', 'DTS'),
(9, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'BAT – TP – TAF - TECNA', 'Vendredi 19 septembre 2025', 'Physiques', '08h 00 – 09h 30', '1h 30', 'DTS'),
(10, 'Ecole du Génie Industriel (EGI)', 'MEEM – MEFT – MSA – RT – TIM – TBM – Mines – AGRI – PAn – IAA', 'Vendredi 19 septembre 2025', 'Test Psychotechnique', '09h 45 – 10h 45', '1h 00', 'DTS'),
(11, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'BAT – TP – TAF – TECNA – PAq', 'Vendredi 19 septembre 2025', 'Test Psychotechnique', '09h 45 – 10h 45', '1h 00', 'DTS'),
(12, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'COM – TBA – GFC – RH – GAN', 'Jeudi 18 septembre 2025', 'Mathématiques', '09h 45 – 11h 45', '2h 00', 'DTS'),
(13, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'COM – TBA – GFC – RH – GAN', 'Jeudi 18 septembre 2025', 'Culture générale', '14h 30 – 16h 00', '1h 30', 'DTS'),
(14, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'COM – TBA – GFC – RH – GAN', 'Vendredi 19 septembre 2025', 'Anglais', '08h 00 – 9h 30', '1h 30', 'DTS'),
(15, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'COM – TBA – GFC – RH – GAN', 'Vendredi 19 septembre 2025', 'Test psychotechnique', '09h 45 – 10h 45', '1h 00', 'DTS'),
(16, 'Ecole du Génie Industriel (EGI)', 'TAM-P – TAM-L – GCl – NTE', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(17, 'Ecole du Génie Industriel (EGI)', 'ICE-P – ICE-L', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(18, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'MEO', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(19, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'ICMN', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(20, 'Ecole du Génie Industriel (EGI)', 'SERA – MURE – MAM – EGR', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(21, 'Ecole du Génie Industriel (EGI)', 'ADR-P – ADR-L – IRM', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(22, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'TAN', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(23, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'TCI – MCD', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(25, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'DPT – GEH', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(26, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'CCI-BAT – CCI-TP', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(27, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'GCA', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(28, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'TECNA', 'Jeudi 18 septembre 2025', 'Dessin –Technologie', '14h 30 – 16h 30', '2h 00', 'DTS'),
(29, 'Ecole du Génie Industriel (EGI)', 'AGRI - PAn - IAA', 'Vendredi 19 septembre 2025', 'Chimie', '08h 00 – 09h 30', '1h30', 'DTS'),
(31, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'PAq', 'Vendredi 19 septembre 2025', 'Chimie', '08h 00 – 09h 30', '1h30', 'DTS'),
(32, 'Ecole du Génie Industriel (EGI)', 'Mines', 'Jeudi 18 septembre 2025', 'Dessin –Technologie', '14h 30 – 16h 30', '02h 00', 'DTS'),
(33, 'Ecole du Génie Industriel (EGI)', 'RT – TIM – TBM', 'Jeudi 18 septembre 2025', 'Dessin –Technologie', '14h 30 – 16h 30', '2h 00', 'DTS'),
(34, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'PAq', 'Jeudi 18 septembre 2025', 'Culture générale', '14h 30 – 16h 30', '2h 00', 'DTS'),
(35, 'Ecole du Génie Industriel (EGI)', 'AGRI - PAn - IAA', 'Jeudi 18 septembre 2025', 'Culture générale', '14h 30 – 16h 30', '02h 00', 'DTS'),
(36, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'GMP - SHAq', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(37, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'CGC – CCA', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(38, 'Ecole du Génie en Management Commerce et Services (EGMCS)', 'IF', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'INGENIORAT'),
(39, 'Ecole du Génie Industriel (EGI)', 'AGRI3 – PAN3 – IAA3', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS'),
(40, 'Ecole du Génie Civil et du Génie Naval (EGCGN)', 'TOPO – AF', 'Vendredi 19 septembre 2025', 'ECRITE', '14h 00 – 15h 30', '1h 30', 'DTSS');

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

CREATE TABLE `jury` (
  `id_jury` varchar(25) NOT NULL,
  `capacite` int(11) DEFAULT NULL,
  `salle_jury` varchar(100) DEFAULT NULL,
  `etat` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jury`
--

INSERT INTO `jury` (`id_jury`, `capacite`, `salle_jury`, `etat`) VALUES
('JURY 1', 15, NULL, 'OUI'),
('JURY 2', 15, 'Bureau DEGMCS', 'OUI'),
('JURY 3', 15, 'AMPHI', 'OUI'),
('JURY 4', 15, NULL, 'OUI'),
('JURY 5', 15, NULL, 'OUI'),
('JURY 6', 15, 'S3', 'OUI'),
('JURY 7', 15, 'S4', 'OUI'),
('JURY 8', 15, NULL, 'OUI'),
('JURY 9', 15, 'S6', 'OUI'),
('JURY 10', 15, 'S7', 'OUI'),
('JURY 11', 15, 'S8', 'OUI'),
('JURY 12', 15, 'Si5', 'OUI'),
('JURY 13', 15, NULL, 'OUI'),
('JURY 14', 15, NULL, 'OUI'),
('JURY 15', 15, NULL, 'OUI'),
('JURY 16', 15, NULL, 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) DEFAULT NULL,
  `coef` int(11) DEFAULT NULL,
  `niveau` varchar(10) DEFAULT NULL,
  `mention` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`, `coef`, `niveau`, `mention`) VALUES
(1, 'Français', 1, 'DTS', 'GC'),
(2, 'Mathématiques', 2, 'DTS', 'GC'),
(3, 'Dessin-Technologie', 2, 'DTS', 'GC'),
(4, 'Physique', 2, 'DTS', 'GC'),
(5, 'Test Psychotechnique', 1, 'DTS', 'GC'),
(6, 'Français', 1, 'DTS', 'GN'),
(7, 'Mathématiques', 2, 'DTS', 'GN'),
(8, 'Dessin-Technologie', 2, 'DTS', 'GN'),
(9, 'Physique', 2, 'DTS', 'GN'),
(10, 'Test Psychotechnique', 1, 'DTS', 'GN'),
(11, 'Français', 1, 'DTS', 'MEB'),
(12, 'Mathématiques', 2, 'DTS', 'MEB'),
(13, 'Dessin-Technologie', 2, 'DTS', 'MEB'),
(14, 'Chimie', 2, 'DTS', 'MEB'),
(15, 'Test Psychotechnique', 1, 'DTS', 'MEB'),
(16, 'Français', 2, 'DTS', 'CS'),
(17, 'Mathématiques', 1, 'DTS', 'CS'),
(18, 'Culture Générale', 2, 'DTS', 'CS'),
(19, 'Anglais', 2, 'DTS', 'CS'),
(20, 'Test Psychotechnique', 1, 'DTS', 'CS'),
(21, 'Français', 2, 'DTS', 'TH'),
(22, 'Mathématiques', 1, 'DTS', 'TH'),
(23, 'Culture Générale', 2, 'DTS', 'TH'),
(24, 'Anglais', 2, 'DTS', 'TH'),
(25, 'Test Psychotechnique', 1, 'DTS', 'TH'),
(26, 'Français', 2, 'DTS', 'FBA'),
(27, 'Mathématiques', 2, 'DTS', 'FBA'),
(28, 'Culture Générale', 2, 'DTS', 'FBA'),
(29, 'Anglais', 1, 'DTS', 'FBA'),
(30, 'Test Psychotechnique', 1, 'DTS', 'FBA'),
(31, 'Français', 1, 'DTS', 'ME'),
(32, 'Mathématiques', 2, 'DTS', 'ME'),
(33, 'Dessin-Technologie', 2, 'DTS', 'ME'),
(34, 'Physique', 2, 'DTS', 'ME'),
(35, 'Test Psychotechnique', 1, 'DTS', 'ME'),
(36, 'Français', 1, 'DTS', 'TC'),
(37, 'Mathématiques', 2, 'DTS', 'TC'),
(38, 'Dessin-Technologie', 2, 'DTS', 'TC'),
(39, 'Physique', 2, 'DTS', 'TC'),
(40, 'Test Psychotechnique', 1, 'DTS', 'TC'),
(41, 'Français', 1, 'DTS', 'GM'),
(42, 'Mathématiques', 2, 'DTS', 'GM'),
(43, 'Dessin-Technologie', 2, 'DTS', 'GM'),
(44, 'Physique', 2, 'DTS', 'GM'),
(45, 'Test Psychotechnique', 1, 'DTS', 'GM'),
(46, 'Français', 1, 'DTS', 'AGRO'),
(47, 'Mathématiques', 2, 'DTS', 'AGRO'),
(48, 'Culture Générale', 2, 'DTS', 'AGRO'),
(49, 'Chimie', 2, 'DTS', 'AGRO'),
(50, 'Test Psychotechnique', 1, 'DTS', 'AGRO'),
(51, 'ECRITE', 1, 'DTSS', ''),
(52, 'ORALE', 1, 'DTSS', ''),
(53, 'ECRITE', 1, 'ING', ''),
(54, 'ORALE', 1, 'ING', '');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_notes` int(11) NOT NULL,
  `matiere1` varchar(40) DEFAULT NULL,
  `coef1` int(11) DEFAULT NULL,
  `matiere2` varchar(40) DEFAULT NULL,
  `coef2` int(11) DEFAULT NULL,
  `matiere3` varchar(40) DEFAULT NULL,
  `coef3` int(11) DEFAULT NULL,
  `matiere4` varchar(40) DEFAULT NULL,
  `coef4` int(11) DEFAULT NULL,
  `matiere5` varchar(40) DEFAULT NULL,
  `coef5` int(11) DEFAULT NULL,
  `moyenne` double DEFAULT NULL,
  `parcours_notes` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id_parcours` varchar(20) NOT NULL,
  `annee_etude_lettre` varchar(100) NOT NULL,
  `parcours_abrevie` varchar(50) NOT NULL,
  `parcours_complet` varchar(100) NOT NULL,
  `annee_etude_num` int(11) NOT NULL,
  `ecole_complet` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `grade_abrevie` varchar(10) NOT NULL,
  `mention` varchar(100) NOT NULL,
  `mention_abrevie` varchar(50) NOT NULL,
  `chef_parcours` varchar(200) NOT NULL,
  `salle` varchar(50) NOT NULL,
  `emploi_du_temps` text DEFAULT NULL,
  `ecole_abrevie` varchar(5) NOT NULL,
  `verrou_notes` varchar(3) DEFAULT NULL,
  `last_number` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id_parcours`, `annee_etude_lettre`, `parcours_abrevie`, `parcours_complet`, `annee_etude_num`, `ecole_complet`, `grade`, `grade_abrevie`, `mention`, `mention_abrevie`, `chef_parcours`, `salle`, `emploi_du_temps`, `ecole_abrevie`, `verrou_notes`, `last_number`) VALUES
('MEEM1', 'Première', 'MEEM', 'Maintenance en Équipements Électromécaniques', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Maintenance et Energie', 'ME', 'RAKOTONDRAINIBE Freddy Erick', '', '../Emploi_du_temps/MEEM1.jpg', 'EGI', 'NON', 0),
('BAT1', 'Première', 'BAT', 'Bâtiment', 1, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur', 'DTS', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/BAT1.jpg', 'EGCGN', 'OUI', 0),
('CCA', 'Troisième', 'CCA', 'Comptabilité, Contrôle et Audit', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécialisé', 'DTSS', 'Finance, Banque et Assurance', 'FBA', '', '', '../Emploi_du_temps/CCA.jpg', 'EGMCS', 'NON', 0),
('CCI-BAT', 'Troisième', 'CCI-BAT', 'Construction Civile et Infrastructures, option Bâtiment', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Génie Civil', 'GC', 'AMBININJARA Hérodino Darrios', '', '../Emploi_du_temps/CCI.jpg', 'EGCGN', 'NON', 0),
('COM 1', 'Première', 'COM', 'Commerce', 1, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur', 'DTS', 'Commerce et Services', 'CS', 'MEMENA Elodie', 'S1', '../Emploi_du_temps/COM 1.jpg', 'EGMCS', 'OUI', 0),
('DPT', 'Troisième', 'DPT', 'Développement des Produits Touristiques', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécialisé', 'DTSS', 'Tourisme et Hôtellerie', 'TH', 'RAKOTOBE Anna', '', '../Emploi_du_temps/DPT.jpg', 'EGMCS', 'NON', 0),
('GFC1', 'Première', 'GFC', 'Gestion Financière  et Comptable', 1, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur', 'DTS', 'Finance, Banque et Assurance', 'FBA', 'RAZANARIVONJY Mathilde Ardiphine', '', '../Emploi_du_temps/GFC1.jpg', 'EGMCS', 'NON', 0),
('ICE1', 'Quatrième', 'ICE-P', 'Ingénierie des Communications Électroniques', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Technologie de Communication', 'TC', 'RAMANANTSOA Harrimann', '', '../Emploi_du_temps/ICE1.jpg', 'EGI', 'NON', 0),
('CCI-TP', 'Troisième', 'CCI-TP', 'Construction Civile et Infrastructures, option Travaux Publics', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Génie Civil', 'GC', 'AMBININJARA Hérodino Darrios', '', '../Emploi_du_temps/CCI.jpg', 'EGCGN', 'NON', 0),
('IRM', 'Troisième', 'IRM', 'Ingénierie des Réseaux Mobiles', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Technologie de Communication', 'TC', 'MANIRY Christophe', '', '../Emploi_du_temps/IRM.jpg', 'EGI', 'NON', 0),
('ADR-P', 'Troisième', 'ADR-P', 'Administration des Réseaux, Option en présentiel', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Technologie de Communication', 'TC', 'RAONIZAFINANTENAINA Angelico Myriolat', '', '../Emploi_du_temps/ADR.jpg', 'EGI', 'NON', 0),
('MEFT1', 'Première', 'MEFT', 'Maintenance en Équipements Frigorifiques et Thermiques', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Maintenance et Energie', 'ME', 'RAKOTONIRINA André', '', '../Emploi_du_temps/MEFT1.jpg', 'EGI', 'OUI', 0),
('MEO1', 'Quatrième', 'MEO', 'Management des Entreprises et des Organisations', 4, 'Ecole du Génie Management, Commerce et Services', 'Ingénieur', 'ING', 'Management', 'Management', 'RAZANAKOLONA Jean Maurice', '', '../Emploi_du_temps/MEO1.jpg', 'EGMCS', 'NON', 0),
('MSA1', 'Première', 'MSA', 'Maintenance des Systèmes Automatisés', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Maintenance et Energie', 'ME', 'ANDRIANIRINA Mamy', '', '../Emploi_du_temps/MSA1.jpg', 'EGI', 'OUI', 0),
('RT1', 'Première', 'RT', 'Réseaux et Télécommunications', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Technologie de Communication', 'TC', 'TSIMITAMBY Briand', '', '../Emploi_du_temps/RT1.jpg', 'EGI', 'NON', 0),
('TAM-P', 'Quatrième', 'TAM-P', 'Techniques Avancées de Maintenance, Option en Présentiel', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/TAM1.jpg', 'EGI', 'NON', 0),
('TAN', 'Troisième', 'TAN', 'Technologie de l\'Architecture Navale', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Génie Naval', 'GN', '', '', '../Emploi_du_temps/MURE.jpg', 'EGCGN', 'NON', 0),
('NTE1', 'Quatrième', 'NTE', 'Nouvelles Technologies de l’Électricité', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/NTE1.jpg', 'EGI', 'NON', 0),
('MURE', 'Troisième', 'MURE', 'Maintenance des Usines et des Réseaux d’Eau', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/MURE.jpg', 'EGI', 'NON', 0),
('SERA', 'Troisième', 'SERA', 'Systèmes à Énergies Renouvelables et Alternatives', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/SERA.jpg', 'EGI', 'NON', 0),
('TP1', 'Première', 'TP', 'Travaux Publics', 1, 'Ecole du Génie Civil et du Génie Naval ', 'Technicien Supérieur', 'DTS', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/TP1.jpg', 'EGCGN', 'NON', 0),
('ICMN1', 'Quatrième', 'ICMN', 'Ingénierie de Construction et de Maintenance Navales', 4, 'Ecole du Génie Civil et du Génie Naval', 'Ingénieur', 'ING', 'Génie Naval', 'GN', '', '', '../Emploi_du_temps/TAM1.jpg', 'EGCGN', 'NON', 0),
('TBA1', 'Première', 'TBA', 'Techniques Bancaires et Assurances', 1, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur', 'DTS', 'Finance, Banque et Assurance', 'FBA', '', 'CRINFP S1', '../Emploi_du_temps/TBA1.jpg', 'EGMCS', 'NON', 0),
('GAN1', 'Première', 'GAN', 'Guide Accompagnateur National', 1, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur', 'DTS', 'Tourisme et Hôtellerie', 'TH', '', '', '../Emploi_du_temps/TGH1.jpg', 'EGMCS', 'NON', 0),
('RH1', 'Première', 'RH', 'Réceptionniste d\'Hôtel', 1, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur', 'DTS', 'Tourisme et Hôtellerie', 'TH', '', '', NULL, 'EGMCS', 'NON', 0),
('TCI', 'Troisième', 'TCI', 'Transit et Commerce Internationale', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécilisé', 'DTSS', 'Commerce et Services', 'CS', '', '', '../Emploi_du_temps/TCI.jpg', 'EGMCS', 'NON', 0),
('TIM1', 'Première', 'TIM', 'Technologie de l\'Informatique et du Multimédia', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Technologie de Communication', 'TC', '', '', '../Emploi_du_temps/TIM1.jpg', 'EGI', 'NON', 0),
('CGC', 'Troisième', 'CGC', 'Conseil et Gestion de Clientèle', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécialisé', 'DTSS', 'Finance, Banque et Assurance', 'FBA', 'RAZANARIVONJY Mathilde Ardiphine', '', '../Emploi_du_temps/CGC.jpg', 'EGMCS', 'NON', 0),
('Mines_EM1', 'Première', 'Mines_EM', 'Mines, option Exploitation des minerais', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Géologie et Mines', 'GM', '', '', NULL, 'EGI', 'NON', 0),
('Mines_TM1', 'Première', 'Mines_TM', 'Mines, option traitement de Minerais', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Géologie et Mines', 'GM', '', '', NULL, 'EGI', 'NON', 0),
('TAF', 'Première', 'TAF', 'Topographie et Administration Foncière', 1, 'Ecole du Génie Civil et du Génie Naval ', 'Technicien Supérieur', 'DTS', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/TAF.jpg', 'EGCGN', 'NON', 0),
('PAq1', 'Première', 'PAq', 'Pêche et Aquaculture\n', 1, 'Ecole du Génie Civil et du Génie Naval ', 'Technicien Supérieur', 'DTS', 'Management de l\'Economie Bleue', 'MEB', '', '', '../Emploi_du_temps/TecNa1.jpg', 'EGCGN', 'NON', 0),
('MAM', 'Troisième', 'MAM', 'Maintenance Auto-Moto - Formation en Alternance', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/SERA.jpg', 'EGI', 'NON', 0),
('ADR-L', 'Troisième', 'ADR-L', 'Administration des Réseaux, Option en ligne', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Technologie de Communication', 'TC', 'RAONIZAFINANTENAINA Angelico Myriolat', '', '../Emploi_du_temps/ADR.jpg', 'EGI', 'NON', 0),
('GMP', 'Troisième', 'GMP', 'Gestion Maritime et Portuaire', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Management de l\'Economie Bleue', 'MEB', '', '', '../Emploi_du_temps/MURE.jpg', 'EGCGN', 'NON', 0),
('MCD', 'Troisième', 'MCD', 'Marketing, Commerce et Distribution', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécilisé', 'DTSS', 'Commerce et Services', 'CS', '', '', '../Emploi_du_temps/TCI.jpg', 'EGMCS', 'NON', 0),
('GEH', 'Troisième', 'GEH', ' Gestion des Etablissements d’Hébergement', 3, 'Ecole du Génie Management, Commerce et Services', 'Technicien Supérieur Spécilisé', 'DTSS', 'Tourisme et Hôtellerie', 'TH', '', '', '../Emploi_du_temps/TCI.jpg', 'EGMCS', 'NON', 0),
('TAM-L', 'Quatrième', 'TAM-L', 'Techniques Avancées de Maintenance, Option en Ligne', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/TAM1.jpg', 'EGI', 'NON', 0),
('GC-FL', 'Quatrième', 'GC-FL', 'Génie Climatique - Formation en ligne', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Maintenance et Energie', 'ME', '', '', '../Emploi_du_temps/TAM1.jpg', 'EGI', 'NON', 0),
('GCA-TP', 'Quatrième', 'GCA-TP', 'Génie de Construction et Aménagement, option Travaux Publcs', 4, 'Ecole du Génie Civil et du Génie Naval', 'Ingénieur', 'ING', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/TAM1.jpg', 'EGCGN', 'NON', 0),
('TBM1', 'Première', 'TBM', 'Technologie Biomédicale', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Technologie des Communications ', 'TC', '', '', NULL, 'EGI', 'NON', 0),
('AGRI1', 'Première', 'AGRI', 'Agriculture', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Agronomie', 'AGRO', '', '', NULL, 'EGI', 'NON', 0),
('PAn1', 'Première', 'PAn', 'Production Animale', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Agronomie', 'AGRO', '', '', NULL, 'EGI', 'NON', 0),
('IAA1', 'Première', 'IAA', 'Industrie Agro-Alimentaire', 1, 'Ecole du Génie Industriel', 'Technicien Supérieur', 'DTS', 'Agronomie', 'AGRO', '', '', NULL, 'EGI', 'NON', 0),
('EGR', 'troisième', 'EGR', 'Eau et Génie Rural – Formation Hybride', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Maintenance et Energie', 'ME', '', '', NULL, 'EGI', 'NON', 0),
('TecNa1', 'Première', 'TecNa', 'Technologie Navale', 1, 'Ecole du Génie civil et Génie Naval', 'Technicien Supérieur', 'DTS', 'Génie Naval', 'GN', '', '', NULL, 'EGCGN', 'NON', 0),
('ICE-L1', 'Quatrième', 'ICE-L', 'Ingénierie des Communications Electroniques ', 4, 'Ecole du Génie Industriel', 'Ingénieur', 'ING', 'Technologie des Communications', 'TC', '', '', NULL, 'EGI', 'NON', 0),
('GCA-BAT', 'Quatrième', 'GCA-BAT', 'Génie de Construction et Aménagement, option Bâtiments', 4, 'Ecole du Génie Civil et Génie Naval', 'Ingénieur', 'ING', 'Génie Civil', 'GC', '', '', NULL, 'EGCGN', 'NON', 0),
('IF', 'Quatrième', 'IF', 'Ingénierie Financière ', 4, 'Ecole du Génie Management, Commerce et Services', 'Ingénieur', 'ING', 'Finance, Banque et Assurance', 'FBA', '', '', NULL, 'EGMCS', 'NON', 0),
('AGRI3', 'Troisième', 'AGRI', 'Agriculture', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Agronomie', 'AGRO', '', '', '../Emploi_du_temps/AGRI.jpg', 'EGI', 'NON', 0),
('PAN3', 'Troisième', 'PAN', 'Production Animale', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Agronomie', 'AGRO', '', '', '../Emploi_du_temps/AGRI.jpg', 'EGI', 'NON', 0),
('IAA3', 'Troisième', 'IAA', 'Industrie Agro-Alimentaire', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Agronomie', 'AGRO', '', '', '../Emploi_du_temps/AGRI.jpg', 'EGI', 'NON', 0),
('EM', 'Troisième', 'EM', 'Exploitation des Minerais', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Géologie et Mines', 'GM', '', '', '../Emploi_du_temps/EM.jpg', 'EGI', 'NON', 0),
('TM', 'Troisième', 'TM', 'Traitement des Minerais', 3, 'Ecole du Génie Industriel', 'Technicien Supérieur Spécialisé', 'DTSS', 'Géologie et Mines', 'GM', '', '', '../Emploi_du_temps/EM.jpg', 'EGI', 'NON', 0),
('TOPO', 'Troisième', 'TOPO', 'Topographie', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/TOPO.jpg', 'EGCGN', 'NON', 0),
('AF', 'Troisième', 'AF', 'Administration Foncière', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Génie Civil', 'GC', '', '', '../Emploi_du_temps/AF.jpg', 'EGCGN', 'NON', 0),
('SHAq-P', 'Troisième', 'SHAq-P', 'Sciences Halieutiques et Aquacoles - Option Pêche', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Management de l\'Economie Bleue', 'MEB', '', '', '../Emploi_du_temps/MURE.jpg', 'EGCGN', 'NON', 0),
('SHAq-A', 'Troisième', 'SHAq-A', 'Sciences Halieutiques et Aquacoles - Option Aquaculture', 3, 'Ecole du Génie Civil et du Génie Naval', 'Technicien Supérieur Spécialisé', 'DTSS', 'Management de l\'Economie Bleue', 'MEB', '', '', '../Emploi_du_temps/MURE.jpg', 'EGCGN', 'NON', 0);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` varchar(25) NOT NULL,
  `capacite` int(11) DEFAULT NULL,
  `capacite2` int(11) NOT NULL,
  `etat` varchar(100) DEFAULT NULL,
  `etat2` varchar(5) NOT NULL,
  `lieu_salle` varchar(50) NOT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `capacite`, `capacite2`, `etat`, `etat2`, `lieu_salle`, `num`) VALUES
('AMPHI', 42, 42, 'OUI', 'OUI', 'IST Antsiranana', 1),
('S1', 0, 0, 'NON', 'NON', 'IST Antsiranana', 2),
('S2', 32, 32, 'NON', 'NON', 'IST Antsiranana', 3),
('S3', 30, 30, 'OUI', 'OUI', 'IST Antsiranana', 4),
('S4', 30, 30, 'OUI', 'OUI', 'IST Antsiranana', 5),
('S5', 0, 0, 'NON', 'NON', 'IST Antsiranana', 6),
('S6', 24, 24, 'OUI', 'OUI', 'IST Antsiranana', 7),
('S7', 24, 24, 'OUI', 'OUI', 'IST Antsiranana', 8),
('S8', 26, 26, 'OUI', 'OUI', 'IST Antsiranana', 9),
('SF4', 10, 10, 'OUI', 'NON', 'IST Antsiranana', 32),
('SF3', 10, 10, 'OUI', 'NON', 'IST Antsiranana', 31),
('SF2', 10, 10, 'OUI', 'NON', 'IST Antsiranana', 30),
('SF1', 10, 10, 'OUI', 'NON', 'IST Antsiranana', 29),
('SE5', 22, 22, 'OUI', 'NON', 'IST Antsiranana', 28),
('SE4', 22, 22, 'OUI', 'NON', 'IST Antsiranana', 27),
('SE3', 22, 22, 'OUI', 'NON', 'IST Antsiranana', 26),
('SE1', 22, 22, 'OUI', 'NON', 'IST Antsiranana', 24),
('SE2', 22, 22, 'OUI', 'NON', 'IST Antsiranana', 25),
('SC1', 64, 64, 'OUI', 'NON', 'IST Antsiranana', 10),
('SC2', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 11),
('SC3', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 12),
('SC4', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 13),
('SC5', 30, 30, 'NON', 'NON', 'IST Antsiranana', 14),
('SC6', 30, 30, 'NON', 'NON', 'IST Antsiranana', 15),
('SD1', 64, 64, 'OUI', 'OUI', 'IST Antsiranana', 16),
('SD2', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 17),
('SD3', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 18),
('SD4', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 19),
('SD5', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 20),
('SD6', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 21),
('SD7', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 22),
('SD8', 30, 30, 'OUI', 'NON', 'IST Antsiranana', 23);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `Ref` varchar(20) NOT NULL,
  `Utilisateur` varchar(255) DEFAULT NULL,
  `Objet` varchar(255) DEFAULT NULL,
  `Contenue` longtext DEFAULT NULL,
  `Etat` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`Ref`, `Utilisateur`, `Objet`, `Contenue`, `Etat`) VALUES
('', NULL, NULL, '0446bc82059259101b160bb51baeb963affe00e1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `pseudo` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `groupe` varchar(200) NOT NULL,
  `ecole` varchar(5) DEFAULT NULL,
  `niveau` varchar(5) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `groupe`, `ecole`, `niveau`, `reset_token`, `reset_expires`) VALUES
(1, 'SOANY', 'Victorien', 'victorien', 'victorien.soany@gmail.com', '123456', 'admin', 'ALL', 'ALL', NULL, NULL),
(2, 'ROZAN', 'Celestine', 'celestine', 'rozancelestine@ist-antsiranana.mg', 'rasoa', 'operateur', 'EGMCS', '1', NULL, NULL),
(3, 'SOAZARA', 'Nadjiat', 'nadjiat', 'nadjiatsoazara@ist-antsiranana.mg', 'nadjiat', 'operateur', 'EGMCS', 'ALL', NULL, NULL),
(4, 'admin', 'admin', 'admin', 'admin@ist-antsiranana.mg', '123456', 'superadmin', 'ALL', 'ALL', NULL, NULL),
(5, 'invite1', 'invite1', 'invite1', 'invite1@ist-antsiranana.mg', 'invite1', 'operateur', NULL, NULL, NULL, NULL),
(7, 'JAOSOARY', 'Viviane', 'viviane', 'viviane@ist-antsiranana.mg', '2023', 'operateur', 'EGI', '1', NULL, NULL),
(8, 'RAKOTOSON', 'Volatiana Anna', 'anna', 'anna@ist-antsiranana.mg', 'anna23', 'operateur', 'ALL', 'ALL', NULL, NULL),
(11, 'TSIMITAMBY', 'Briand', 'dg', 'tsimitambybriand@gmail.com', '123456', 'admin', 'ALL', 'ALL', NULL, NULL),
(12, 'RAHARINAIVO', 'Rémi Saray', 'degi', 'remisaray@gmail.com', 'egi46', 'visiteur', NULL, NULL, NULL, NULL),
(13, 'SAIDAH', 'Attoumani', 'degmcs', 'attoumanisaidah@gmail.com', '859degmcs', 'visiteur', NULL, NULL, NULL, NULL),
(14, 'RAMAHALEO', 'Jacques', 'DEGCGN', 'jacramah@gmail.com', 'jacgcgn', 'visiteur', NULL, NULL, NULL, NULL),
(15, 'RAMANANTSOA', 'Harrimann', 'daf', 'ramana.riri@gmail.com', 'dafharri', 'visiteur', NULL, NULL, NULL, NULL),
(16, 'RAZAFINDRADINA', 'Bruno', 'bruno', 'hbrazafindradina@gmail.com', '23istd', 'visiteur', NULL, NULL, NULL, NULL),
(17, 'FARINEZY', 'Ursule', 'ursule', 'ufarinezy@gmail.com', 'u2023', 'operateur', 'EGMCS', '2', NULL, NULL),
(18, 'ANDRIAMANIRY', 'Nicolas', 'nicolas', 'andriamaniry@gmail.com', 'nico', 'visiteur', NULL, NULL, NULL, NULL),
(19, 'RAFANOTSIMIVA', 'Liva', 'deraq', 'liva@gmail.com', 'dr268', 'visiteur', NULL, NULL, NULL, NULL),
(20, 'ROBERSON', 'Faravavy', 'fara', 'admin@scolarite.mg', 'fara97', 'operateur', 'EGCGN', '1', NULL, NULL),
(21, 'ZANDRY', 'Marthérinot', 'martherinot', 'frmartherinot@gmail.com', '123456', 'admin', 'ALL', 'ALL', NULL, NULL),
(22, 'JAOROBY', 'Savola Orélia', 'orelia', 'savolaorelia5700@gmail.com', '27février2008', 'operateur', 'ALL', 'ALL', NULL, NULL),
(23, 'RAONIZAFY', 'Angelico', 'angelico', 'raonizafy@gmail.com', '123456', 'admin', NULL, NULL, NULL, NULL),
(24, 'MOHAMADY II', 'J. Obad\'El', 'obadel', 'obadel@gmail.com', 'obd2024', 'controleur', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id_candidat`),
  ADD UNIQUE KEY `id_candidat` (`id_candidat`),
  ADD KEY `FK_Candidats_ID_Salle` (`salle`);

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id_centre`);

--
-- Index pour la table `convocation`
--
ALTER TABLE `convocation`
  ADD UNIQUE KEY `id_convoc` (`id_convoc`);

--
-- Index pour la table `date_concours`
--
ALTER TABLE `date_concours`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etiquette`
--
ALTER TABLE `etiquette`
  ADD PRIMARY KEY (`id_etiquette`),
  ADD UNIQUE KEY `id_etiquette` (`id_etiquette`);

--
-- Index pour la table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`id_jury`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id_parcours`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Ref`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`nom`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `centre`
--
ALTER TABLE `centre`
  MODIFY `id_centre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `date_concours`
--
ALTER TABLE `date_concours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etiquette`
--
ALTER TABLE `etiquette`
  MODIFY `id_etiquette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
