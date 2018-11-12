-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 12 nov. 2018 à 13:44
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `adherent` (
  `id_inscrit` int(11) NOT NULL,
  `licence_adh` int(11) DEFAULT NULL,
  `nom_adh` varchar(25) DEFAULT NULL,
  `prenom_adh` varchar(25) DEFAULT NULL,
  `sexe_adh` tinyint(1) DEFAULT NULL,
  `date_naissance_adh` date DEFAULT NULL,
  `adresse_adh` varchar(30) DEFAULT NULL,
  `cp_adh` char(5) DEFAULT NULL,
  `ville_adh` varchar(25) DEFAULT NULL,
  `mail_inscrit` varchar(50) DEFAULT NULL,
  `mdp_inscrit` varchar(50) DEFAULT NULL,
  `id_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `adherent`:
--   `id_club`
--       `club` -> `id_club`
--   `id_inscrit`
--       `inscrit` -> `id_inscrit`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `libelle_club` varchar(25) NOT NULL,
  `adresse_club` varchar(30) DEFAULT NULL,
  `cp_club` char(5) NOT NULL,
  `ville_club` varchar(25) DEFAULT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `club`:
--   `id_ligue`
--       `ligue` -> `id_ligue`
--

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `indemnite` (
  `annee` year(4) NOT NULL,
  `tarif_kilometrique` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `indemnite`:
--

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `inscrit` (
  `id_inscrit` int(11) NOT NULL,
  `mail_inscrit` varchar(50) DEFAULT NULL,
  `mdp_inscrit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `inscrit`:
--

-- --------------------------------------------------------

--
-- Structure de la table `ligne_frais`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `ligne_frais` (
  `id_ligne_frais` int(11) NOT NULL,
  `date_frais` date DEFAULT NULL,
  `trajet_frais` varchar(25) DEFAULT NULL,
  `km_parcourus` float DEFAULT NULL,
  `cout_peage` decimal(10,0) DEFAULT NULL,
  `cout_repas` decimal(10,0) DEFAULT NULL,
  `cout_hebergement` decimal(10,0) DEFAULT NULL,
  `annee` year(4) NOT NULL,
  `id_motif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `ligne_frais`:
--   `annee`
--       `indemnite` -> `annee`
--   `id_motif`
--       `motif` -> `id_motif`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `ligue`:
--

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `motif`:
--

-- --------------------------------------------------------

--
-- Structure de la table `note_frais`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `note_frais` (
  `id_note_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `note_frais`:
--

-- --------------------------------------------------------

--
-- Structure de la table `ouvrir`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `ouvrir` (
  `id_inscrit` int(11) NOT NULL,
  `id_ligne_frais` int(11) NOT NULL,
  `id_note_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `ouvrir`:
--   `id_inscrit`
--       `inscrit` -> `id_inscrit`
--   `id_ligne_frais`
--       `ligne_frais` -> `id_ligne_frais`
--   `id_note_frais`
--       `note_frais` -> `id_note_frais`
--

-- --------------------------------------------------------

--
-- Structure de la table `responsable_legal`
--
-- Création :  lun. 05 nov. 2018 à 14:39
--

CREATE TABLE `responsable_legal` (
  `id_inscrit` int(11) NOT NULL,
  `nom_resp_leg` varchar(25) NOT NULL,
  `prenom_resp_leg` varchar(25) NOT NULL,
  `rue_resp_leg` varchar(25) NOT NULL,
  `cp_resp_leg` char(5) NOT NULL,
  `ville_resp_leg` varchar(25) NOT NULL,
  `mail_inscrit` varchar(50) DEFAULT NULL,
  `mdp_inscrit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `responsable_legal`:
--   `id_inscrit`
--       `inscrit` -> `id_inscrit`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_inscrit`),
  ADD KEY `Adherent_Club0_FK` (`id_club`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `Club_Ligue_FK` (`id_ligue`);

--
-- Index pour la table `indemnite`
--
ALTER TABLE `indemnite`
  ADD PRIMARY KEY (`annee`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`id_inscrit`);

--
-- Index pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD PRIMARY KEY (`id_ligne_frais`),
  ADD KEY `Ligne_Frais_Indemnite_FK` (`annee`),
  ADD KEY `Ligne_Frais_Motif0_FK` (`id_motif`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id_motif`);

--
-- Index pour la table `note_frais`
--
ALTER TABLE `note_frais`
  ADD PRIMARY KEY (`id_note_frais`);

--
-- Index pour la table `ouvrir`
--
ALTER TABLE `ouvrir`
  ADD PRIMARY KEY (`id_inscrit`,`id_ligne_frais`,`id_note_frais`),
  ADD KEY `Ouvrir_Ligne_Frais0_FK` (`id_ligne_frais`),
  ADD KEY `Ouvrir_Note_Frais1_FK` (`id_note_frais`);

--
-- Index pour la table `responsable_legal`
--
ALTER TABLE `responsable_legal`
  ADD PRIMARY KEY (`id_inscrit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `id_inscrit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  MODIFY `id_ligne_frais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Adherent_Club0_FK` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `Adherent_Inscrit_FK` FOREIGN KEY (`id_inscrit`) REFERENCES `inscrit` (`id_inscrit`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `Club_Ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD CONSTRAINT `Ligne_Frais_Indemnite_FK` FOREIGN KEY (`annee`) REFERENCES `indemnite` (`annee`),
  ADD CONSTRAINT `Ligne_Frais_Motif0_FK` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`);

--
-- Contraintes pour la table `ouvrir`
--
ALTER TABLE `ouvrir`
  ADD CONSTRAINT `Ouvrir_Inscrit_FK` FOREIGN KEY (`id_inscrit`) REFERENCES `inscrit` (`id_inscrit`),
  ADD CONSTRAINT `Ouvrir_Ligne_Frais0_FK` FOREIGN KEY (`id_ligne_frais`) REFERENCES `ligne_frais` (`id_ligne_frais`),
  ADD CONSTRAINT `Ouvrir_Note_Frais1_FK` FOREIGN KEY (`id_note_frais`) REFERENCES `note_frais` (`id_note_frais`);

--
-- Contraintes pour la table `responsable_legal`
--
ALTER TABLE `responsable_legal`
  ADD CONSTRAINT `Responsable_Legal_Inscrit_FK` FOREIGN KEY (`id_inscrit`) REFERENCES `inscrit` (`id_inscrit`);


--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table adherent
--

--
-- Métadonnées pour la table club
--

--
-- Métadonnées pour la table indemnite
--

--
-- Métadonnées pour la table inscrit
--

--
-- Métadonnées pour la table ligne_frais
--

--
-- Métadonnées pour la table ligue
--

--
-- Métadonnées pour la table motif
--

--
-- Métadonnées pour la table note_frais
--

--
-- Métadonnées pour la table ouvrir
--

--
-- Métadonnées pour la table responsable_legal
--

--
-- Métadonnées pour la base de données fredi
--

--
-- Déchargement des données de la table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('fredi', 'Fredi_1');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Déchargement des données de la table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('fredi', 'adherent', @LAST_PAGE, 90, 229),
('fredi', 'bordereau', @LAST_PAGE, 839, 284),
('fredi', 'club', @LAST_PAGE, 84, 32),
('fredi', 'concerner', @LAST_PAGE, 652, 279),
('fredi', 'ligne_frais', @LAST_PAGE, 392, 232),
('fredi', 'ligue', @LAST_PAGE, 364, 53),
('fredi', 'responsable_crib', @LAST_PAGE, 681, 43),
('fredi', 'responsable_legal', @LAST_PAGE, 82, 503),
('fredi', 'tresorier', @LAST_PAGE, 836, 530),
('fredi', 'valider', @LAST_PAGE, 845, 398);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
