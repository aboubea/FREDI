-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 10 déc. 2018 à 02:27
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

CREATE TABLE `adherent` (
  `licence_adh` varchar(25) NOT NULL,
  `nom_adh` varchar(25) DEFAULT NULL,
  `prenom_adh` varchar(25) DEFAULT NULL,
  `sexe_adh` varchar(1) DEFAULT NULL,
  `date_naissance_adh` date DEFAULT NULL,
  `adresse_adh` varchar(30) DEFAULT NULL,
  `cp_adh` varchar(10) DEFAULT NULL,
  `ville_adh` varchar(25) DEFAULT NULL,
  `mail_inscrit` varchar(100) DEFAULT NULL,
  `mdp_inscrit` varchar(255) DEFAULT NULL,
  `id_club` int(11) NOT NULL,
  `id_resp_leg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `adherent`:
--   `id_club`
--       `club` -> `id_club`
--   `id_resp_leg`
--       `responsable_legal` -> `id_resp_leg`
--

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`licence_adh`, `nom_adh`, `prenom_adh`, `sexe_adh`, `date_naissance_adh`, `adresse_adh`, `cp_adh`, `ville_adh`, `mail_inscrit`, `mdp_inscrit`, `id_club`, `id_resp_leg`) VALUES
('170540010556', 'Barbé', 'Paco', 'H', '1997-05-03', '6 RUE GEORGES PICOT', '31400', 'Toulouse', 'paco.barbe@outlook.fr', '$2y$10$QYZOSx/5ITAy3IwRIMLXcOIHMqCYqzQYUvhDzCEe.1w728Fz8BKLu', 50, NULL),
('170540010557', 'Azerty', 'Azert', 'H', '1997-07-18', '5 RUE GEORGES PICOT', '31400', 'TOULOUSE', 'azerty.azer@outlook.fr', '$2y$10$bdnRY5ywjEW3ZTiswASCKO3PM7ic2a35nboCz8Iuw.UW2uNMGE/di', 45, NULL),
('170540010558', 'Jean', 'Bonneau', 'H', '1997-06-05', '2, Rue Picasso', '31400', 'Toulouse', 'jean.bonneau@outlook.fr', '$2y$10$sQnYXeoYx7mh77qExfoOX.y3EVjRokFH.p.KdVjERw3Zc8iup6kqC', 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adherent_csv`
--

CREATE TABLE `adherent_csv` (
  `licence_adh_csv` varchar(25) NOT NULL,
  `sexe_adh_csv` varchar(1) DEFAULT NULL,
  `nom_adh_csv` varchar(25) DEFAULT NULL,
  `prenom_adh_csv` varchar(25) DEFAULT NULL,
  `date_naissance_adh_csv` date DEFAULT NULL,
  `adresse_adh_csv` varchar(30) DEFAULT NULL,
  `cp_adh_csv` char(5) DEFAULT NULL,
  `ville_adh_csv` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `adherent_csv`:
--

--
-- Déchargement des données de la table `adherent_csv`
--

INSERT INTO `adherent_csv` (`licence_adh_csv`, `sexe_adh_csv`, `nom_adh_csv`, `prenom_adh_csv`, `date_naissance_adh_csv`, `adresse_adh_csv`, `cp_adh_csv`, `ville_adh_csv`) VALUES
('170540010121', 'M', 'SILBERT', 'GILLES', '2001-01-03', '2 , grande rue', '54210', 'Azelot'),
('170540010254', 'F', 'BILLOT', 'MARIANNE', '1986-09-28', '6, rue de la Sapiniere', '54600', 'Villers les Nancy'),
('170540010308', 'M', 'BILLOT', 'DIDIER', '1962-09-24', '6, rue de la Sapiniere', '54600', 'Villers les Nancy'),
('170540010309', 'M', 'BECKER', 'ROMAIN', '1998-03-28', '1, rue des Mesanges', '54600', 'Villers les Nancy'),
('170540010329', 'F', 'BILLOT', 'CLAIRE', '1963-06-07', '6, rue de la Sapiniere', '54600', 'Villers les Nancy'),
('170540010334', 'F', 'BIACQUEL', 'VERONIQUE', '1962-09-12', '27, rue de Santifontaine', '54000', 'Nancy'),
('170540010337', 'M', 'BERBIER', 'THEO', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy'),
('170540010338', 'M', 'GARBILLON', 'YANN', '1994-03-21', '31, avenue de Marron', '54600', 'Villers les Nancy'),
('170540010340', 'F', 'BERBIER', 'LUCILLE', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy'),
('170540010341', 'F', 'HUMERT', 'ISABELLE', '1976-06-04', '4 rue du marechal Gallieni', '54600', 'Villers les Nancy'),
('170540010351', 'M', 'DEPERRIN', 'ARNAUD', '1982-12-31', '40 rue Paul Bert', '54600', 'Villers les Nancy'),
('170540010353', 'M', 'PERNOT', 'PAUL', '1996-04-26', '6, rue Winston Churchill', '54000', 'Nancy'),
('170540010364', 'M', 'LUQUE', 'ETIENNE', '1951-12-26', '1, rue de Normandie', '54500', 'Vandoeuvre'),
('170540010382', 'F', 'HAGENBACH', 'CLEMENTINE', '1997-11-26', '19, rue de Lavaux', '54520', 'Laxou'),
('170540010395', 'M', 'GARBILLON', 'GILLES', '1963-07-08', '31, avenue de Marron', '54600', 'Villers les Nancy'),
('170540010399', 'F', 'BIDELOT', 'BRIGITTE', '1958-09-20', '5, rue des trois epis', '54600', 'Villers les Nancy'),
('170540010401', 'M', 'LIEVIN', 'NATHAN', '1997-01-24', '42, rue de la commanderie', '54840', 'Sexey les bois'),
('170540010402', 'M', 'COTIN', 'FLORIAN', '2002-04-15', '14 route de Toul', '54113', 'Blenod les toul'),
('170540010405', 'M', 'TORTEMANN', 'PIERRE', '1997-10-13', '34, rue de Badonviller', '54000', 'Nancy'),
('170540010407', 'M', 'BINNET', 'MARIUS', '1997-08-21', '12, rue Edouard Grosjean', '54520', 'Laxou'),
('170540010409', 'F', 'DEPRETRE', 'BEATRICE', '1998-01-27', '26, rue du petit etang', '54110', 'Buissoncourt'),
('170540010414', 'M', 'CHERPION', 'UGO', '1999-09-24', '63, rue Francais', '54000', 'Nancy'),
('170540010418', 'F', 'ZUEL', 'STEPHANIE', '1970-09-25', '8, sentier de Saint-Arriant', '54520', 'Laxou'),
('170540010419', 'M', 'LANIELLE', 'NICOLAS', '1998-09-02', '10, rue des orchidees', '54600', 'Villers les Nancy'),
('170540010420', 'F', 'HASFELD', 'AUXANE', '1999-03-08', '32, allee de l observatoire', '54520', 'Laxou'),
('170540010428', 'M', 'CHEOLLE', 'NICOLAS', '1983-04-19', '46, rue de l abbe Didelot', '54520', 'Laxou'),
('170540010429', 'M', 'LAMOINE', 'GREGOIRE', '1993-07-23', '65, rue de la sivrite', '54600', 'Villers les Nancy'),
('170540010431', 'M', 'CASTEL', 'TIMOTHE', '2005-06-10', '26, rue de l abbe Didelot', '54600', 'Villers les Nancy'),
('170540010432', 'M', 'LAFIEGLON', 'CLEMENT', '2003-11-16', '62, avenue Paul Deroulede', '54600', 'Villers les Nancy'),
('170540010437', 'M', 'ZOECKEL', 'MATHIEU', '2000-06-02', '15, rue de la Seille', '54320', 'Maxeville'),
('170540010438', 'M', 'REMILLON', 'ELIOT', '1995-11-13', '3, rue de l Embanie', '54520', 'Laxou'),
('170540010439', 'M', 'LOTANG', 'CYPRIEN', '1999-09-30', '16, rue de Gerbeviller', '54000', 'Nancy'),
('170540010440', 'M', 'CHOUARNO', 'TOM', '1999-08-02', '168, avenue de Boufflers', '54000', 'Nancy'),
('170540010441', 'M', 'CHEVOITINE', 'LOUIS', '1998-03-29', '40, rue de la republique', '54320', 'Maxeville'),
('170540010442', 'F', 'BIDELOT', 'JULIE', '2006-11-30', '5, rue des trois epis', '54600', 'Villers les Nancy'),
('170540010443', 'M', 'BANDILELLA', 'CLEMENT', '1998-07-26', '30, rue Widric 1er', '54600', 'Villers les Nancy'),
('170540010444', 'M', 'CALDI', 'THOMAS', '1998-09-22', '12, rue de Malzeville', '54000', 'Nancy'),
('170540010446', 'M', 'DUCRICK', 'AUGUSTIN', '1996-12-03', '31, rue du chanoine Pierron', '54600', 'Villers les Nancy'),
('170540010447', 'F', 'SILBERT', 'LEA', '2000-04-14', '1, allee du cenacle', '54520', 'Laxou'),
('170540010448', 'M', 'ZUERO', 'THOMAS', '2000-08-14', 'immeuble Savoie', '54520', 'Laxou');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `libelle_club` varchar(255) NOT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `club`:
--   `id_ligue`
--       `ligue` -> `id_ligue`
--

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `libelle_club`, `id_ligue`) VALUES
(1, 'Stade Toulousain Rugby', 1),
(2, 'RC Toulonnais', 1),
(3, 'AS Montferrandaise', 1),
(4, 'Stade Francais Paris', 1),
(5, 'Stade Rochelais', 1),
(6, 'Union Bordeaux Belges', 1),
(7, 'Lyon OI U', 1),
(8, 'Racing Club De France Rugby', 1),
(9, 'USA Perpignan', 1),
(10, 'Aviron Bayonnais', 1),
(11, 'FC Grenoble', 1),
(12, 'Rouen Normandie Rugby', 1),
(13, 'Roval Drôme Xv', 1),
(14, 'US Tyrosse', 1),
(15, 'Montpellier RC', 1),
(16, 'Amiens', 2),
(17, 'Angers', 2),
(18, 'Bordeaux', 2),
(19, 'Caen', 2),
(20, 'Dijon', 2),
(21, 'Guingamp', 2),
(22, 'Lille', 2),
(23, 'Lyon', 2),
(24, 'Marseille', 2),
(25, 'Monaco', 2),
(26, 'Montpellier', 2),
(27, 'Nantes', 2),
(28, 'Nice', 2),
(29, 'Nîmes', 2),
(30, 'Paris-SG', 2),
(31, 'Reims', 2),
(32, 'Rennes', 2),
(33, 'Saint-Etienne', 2),
(34, 'Strasbourg', 2),
(35, 'Toulouse', 2),
(36, 'Poissy Triathlon', 3),
(37, 'SJDMV Triathlon', 3),
(38, 'Montpellier Triathlon', 3),
(39, 'E.C. Sartrouville', 3),
(40, 'Triathlon Club de Lievin', 3),
(41, 'Les Sables Vendee Triathlon', 3),
(42, 'Valence Triathlon', 3),
(43, 'Montlucon Triathlon', 3),
(44, 'Sainte Genevieve Triathlon', 3),
(45, 'Rouen Triathlon', 3),
(46, 'Metz Triathlon', 3),
(47, 'Versailles Triathlon', 3),
(48, 'Issy Triathlon', 3),
(49, 'Tricastin Triathlon Club', 3),
(50, 'Triathlon Toulouse Métropole', 3),
(51, 'Besancon Triathlon', 3);

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
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
-- Structure de la table `ligne_frais`
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
--   `id_motif`
--       `motif` -> `id_motif`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(255) NOT NULL,
  `nom_ligue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `ligue`:
--

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `libelle_ligue`, `nom_ligue`) VALUES
(1, 'FFR', 'Federation Francaise de Rugby'),
(2, 'FFF', 'Federation Francaise de Football'),
(3, 'FFT', 'Federation Francaise de Triathlon');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `motif`:
--

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id_motif`, `libelle_motif`) VALUES
(1, 'Reunion'),
(2, 'Competition regionale'),
(3, 'Competition nationale'),
(4, 'Competition internationna'),
(5, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `note_frais`
--

CREATE TABLE `note_frais` (
  `id_note_frais` int(11) NOT NULL,
  `licence_adh` varchar(25) NOT NULL,
  `id_ligne_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `note_frais`:
--   `licence_adh`
--       `adherent` -> `licence_adh`
--   `id_ligne_frais`
--       `ligne_frais` -> `id_ligne_frais`
--

-- --------------------------------------------------------

--
-- Structure de la table `responsable_crib`
--

CREATE TABLE `responsable_crib` (
  `id_resp_crib` int(11) NOT NULL,
  `nom_resp_crib` varchar(25) DEFAULT NULL,
  `prenom_resp_crib` varchar(25) DEFAULT NULL,
  `mail_resp_crib` varchar(50) DEFAULT NULL,
  `mdp_resp_crib` varchar(50) DEFAULT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `responsable_crib`:
--   `id_ligue`
--       `ligue` -> `id_ligue`
--

-- --------------------------------------------------------

--
-- Structure de la table `responsable_legal`
--

CREATE TABLE `responsable_legal` (
  `id_resp_leg` int(11) NOT NULL,
  `nom_resp_leg` varchar(50) DEFAULT NULL,
  `prenom_resp_leg` varchar(50) DEFAULT NULL,
  `rue_resp_leg` varchar(50) DEFAULT NULL,
  `cp_resp_leg` varchar(10) DEFAULT NULL,
  `ville_resp_leg` varchar(25) DEFAULT NULL,
  `mail_resp_leg` varchar(200) DEFAULT NULL,
  `mdp_resp_leg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `responsable_legal`:
--

--
-- Déchargement des données de la table `responsable_legal`
--

INSERT INTO `responsable_legal` (`id_resp_leg`, `nom_resp_leg`, `prenom_resp_leg`, `rue_resp_leg`, `cp_resp_leg`, `ville_resp_leg`, `mail_resp_leg`, `mdp_resp_leg`) VALUES
(1, 'Legal', 'Responsable', '14, rue Grue', '31200', 'Toulouse', 'RL1@outlook.fr', '$2y$12$8vt/EJ0t0aKsBAvFWTBlKu9GZ0cUQ3DdDm.LsqisWjSOWopuv6Zu6\r\n'),
(2, 'Jack', 'Prevert', '2, Rue du Tour', '31380', 'Montastruc', 'jack.prevert@outlook.fr', '$2y$12$yQNEl3SPfTvSVcG/oRcgp.a0dxsaF1rVEa8naL9LtR06fIsfiEBNq\r\n'),
(3, 'Test1', 'Test1', 'Test1', '31200', 'Toulouse', 'test1@outlook.fr', '$2y$10$PvGGCjS546IP9miS04f/NeiaHjq/1tZDlYh3rRDCymd8OsU68j0cS');

-- --------------------------------------------------------

--
-- Structure de la table `tresorier`
--

CREATE TABLE `tresorier` (
  `id_tresorier` int(11) NOT NULL,
  `nom_tresorier` varchar(25) DEFAULT NULL,
  `prenom_tresorier` varchar(25) DEFAULT NULL,
  `mail_tresorier` varchar(50) DEFAULT NULL,
  `mdp_tresorier` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `id_club` int(11) NOT NULL,
  `id_note_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `tresorier`:
--   `id_club`
--       `club` -> `id_club`
--   `id_note_frais`
--       `note_frais` -> `id_note_frais`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`licence_adh`),
  ADD KEY `Adherent_Club_FK` (`id_club`),
  ADD KEY `Adherent_Responsable_Legal_FK` (`id_resp_leg`);

--
-- Index pour la table `adherent_csv`
--
ALTER TABLE `adherent_csv`
  ADD PRIMARY KEY (`licence_adh_csv`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `Club_Ligue_FK` (`id_ligue`);

--
-- Index pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD PRIMARY KEY (`id_ligne_frais`),
  ADD KEY `Ligne_Frais_Motif_FK` (`id_motif`);

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
  ADD PRIMARY KEY (`id_note_frais`),
  ADD KEY `Note_Frais_Adherent_FK` (`licence_adh`),
  ADD KEY `Note_Frais_Ligne_Frais_FK` (`id_ligne_frais`);

--
-- Index pour la table `responsable_crib`
--
ALTER TABLE `responsable_crib`
  ADD PRIMARY KEY (`id_resp_crib`),
  ADD KEY `Responsable_Crib_Ligue_FK` (`id_ligue`);

--
-- Index pour la table `responsable_legal`
--
ALTER TABLE `responsable_legal`
  ADD PRIMARY KEY (`id_resp_leg`);

--
-- Index pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD PRIMARY KEY (`id_tresorier`),
  ADD KEY `Tresorier_Club_FK` (`id_club`),
  ADD KEY `Tresorier_note_frais_FK` (`id_note_frais`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  MODIFY `id_ligne_frais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `note_frais`
--
ALTER TABLE `note_frais`
  MODIFY `id_note_frais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `responsable_crib`
--
ALTER TABLE `responsable_crib`
  MODIFY `id_resp_crib` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `responsable_legal`
--
ALTER TABLE `responsable_legal`
  MODIFY `id_resp_leg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tresorier`
--
ALTER TABLE `tresorier`
  MODIFY `id_tresorier` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Adherent_Club_FK` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `Adherent_Resp_Leg_FK` FOREIGN KEY (`id_resp_leg`) REFERENCES `responsable_legal` (`id_resp_leg`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `Club_Ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD CONSTRAINT `Ligne_Frais_Motif_FK` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`);

--
-- Contraintes pour la table `note_frais`
--
ALTER TABLE `note_frais`
  ADD CONSTRAINT `note_frais_Adherent_FK` FOREIGN KEY (`licence_adh`) REFERENCES `adherent` (`licence_adh`),
  ADD CONSTRAINT `note_frais_Ligne_Frais_FK` FOREIGN KEY (`id_ligne_frais`) REFERENCES `ligne_frais` (`id_ligne_frais`);

--
-- Contraintes pour la table `responsable_crib`
--
ALTER TABLE `responsable_crib`
  ADD CONSTRAINT `responsable_crib_Ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD CONSTRAINT `tresorier_Club_FK` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `tresorier_Note_Frais_FK` FOREIGN KEY (`id_note_frais`) REFERENCES `note_frais` (`id_note_frais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
