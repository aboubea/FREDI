-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 19 nov. 2018 à 14:12
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
-- Base de données :  `fredo`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `licence_adh` VARCHAR(25) NOT NULL,
  `nom_adh` varchar(25) DEFAULT NULL,
  `prenom_adh` varchar(25) DEFAULT NULL,
  `sexe_adh` tinyint(1) DEFAULT NULL,
  `date_naissance_adh` date DEFAULT NULL,
  `adresse_adh` varchar(30) DEFAULT NULL,
  `cp_adh` char(5) DEFAULT NULL,
  `ville_adh` varchar(25) DEFAULT NULL,
  `mail_inscrit` varchar(50) DEFAULT NULL,
  `mdp_inscrit` varchar(50) DEFAULT NULL,
  `id_club` int(11) NOT NULL,
  `id_resp_leg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `libelle_club` varchar(25) NOT NULL,
  `adresse_club` varchar(30) DEFAULT NULL,
  `cp_club` char(5) NOT NULL,
  `ville_club` varchar(25) DEFAULT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

CREATE TABLE `indemnite` (
  `annee` year(4) NOT NULL,
  `tarif_kilometrique` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note_frais`
--

CREATE TABLE `note_frais` (
  `id_note_frais` int(11) NOT NULL,
  `licence_adh` VARCHAR(25) NOT NULL,
  `id_ligne_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `responsable_legal`
--

CREATE TABLE `responsable_legal` (
  `id_resp_leg` int(11) NOT NULL,
  `nom_resp_leg` varchar(25) NOT NULL,
  `prenom_resp_leg` varchar(25) NOT NULL,
  `rue_resp_leg` varchar(25) NOT NULL,
  `cp_resp_leg` char(5) NOT NULL,
  `ville_resp_leg` varchar(25) NOT NULL,
  `mail_inscrit` varchar(50) DEFAULT NULL,
  `mdp_inscrit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `adherent_csv`
--

CREATE TABLE `adherent_csv` (
  `licence_adh_csv` VARCHAR(25) DEFAULT NULL,
  `sexe_adh_csv` tinyint(1) DEFAULT NULL,
  `nom_adh_csv` varchar(25) DEFAULT NULL,
  `prenom_adh_csv` varchar(25) DEFAULT NULL,
  `date_adh_csv` date DEFAULT NULL,
  `adresse_adh_csv` varchar(30) DEFAULT NULL,
  `cp_adh_csv` char(5) DEFAULT NULL,
  `ville_adh_csv` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `responsable_legal`
--
ALTER TABLE `responsable_legal`
  ADD PRIMARY KEY (`id_resp_leg`);

--
-- Index pour la table `responsable_crib`
--
ALTER TABLE `responsable_crib`
  ADD PRIMARY KEY (`id_resp_crib`),
  ADD KEY `Responsable_Crib_Ligue_FK` (`id_ligue`);

--
-- Index pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD PRIMARY KEY (`id_tresorier`),
  ADD KEY `Tresorier_Club_FK` (`id_club`),
  ADD KEY `Tresorier_note_frais_FK` (`id_note_frais`);

--
-- Index pour la table `adherent_csv`
--
ALTER TABLE `adherent_csv`
  ADD PRIMARY KEY (`licence_adh_csv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT;


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
-- AUTO_INCREMENT pour la table `responsable_crib`
--
ALTER TABLE `responsable_crib`
  MODIFY `id_resp_crib` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `note_frais_Ligne_Frais_FK` FOREIGN KEY (`id_ligne_frais`) REFERENCES `ligne_frais` (`id_ligne_frais`),
  ADD CONSTRAINT `note_frais_Adherent_FK` FOREIGN KEY (`licence_adh`) REFERENCES `adherent` (`licence_adh`);

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
