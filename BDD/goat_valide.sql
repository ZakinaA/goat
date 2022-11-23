-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 23 nov. 2022 à 10:09
-- Version du serveur : 10.4.13-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `goat`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoire`
--

DROP TABLE IF EXISTS `accessoire`;
CREATE TABLE IF NOT EXISTS `accessoire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instrument_id` int(11) DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8FD026ACF11D9C` (`instrument_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contrat_pret`
--

DROP TABLE IF EXISTS `contrat_pret`;
CREATE TABLE IF NOT EXISTS `contrat_pret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instrument_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `attestation_assurance` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_detaille_debut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_detaille_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1FB84C67CF11D9C` (`instrument_id`),
  KEY `IDX_1FB84C67A6CC7B2` (`eleve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat_pret`
--

INSERT INTO `contrat_pret` (`id`, `instrument_id`, `eleve_id`, `date_debut`, `date_fin`, `attestation_assurance`, `etat_detaille_debut`, `etat_detaille_fin`) VALUES
(1, 6, 1, '2022-11-01', '2022-11-24', 'Oui', 'NEUF', 'BON ETAT');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `nom`) VALUES
(1, 'noir'),
(2, 'bleu'),
(3, 'rouge');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agemini` int(11) NOT NULL,
  `agemaxi` int(11) NOT NULL,
  `nbplaces` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `agemini`, `agemaxi`, `nbplaces`) VALUES
(1, 'test', 5, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221123090218', '2022-11-23 09:02:28', 10898);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cours_id` int(11) DEFAULT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `contrat_pret_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` date NOT NULL,
  `num_rue` int(11) NOT NULL,
  `rue` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECA105F77ECF78B0` (`cours_id`),
  KEY `IDX_ECA105F753C59D72` (`responsable_id`),
  KEY `IDX_ECA105F7B2AF233D` (`contrat_pret_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `cours_id`, `responsable_id`, `contrat_pret_id`, `nom`, `prenom`, `date_naiss`, `num_rue`, `rue`, `ville`, `tel`, `mail`) VALUES
(1, 1, 1, 1, 'Arthur', 'tytyty', '2017-01-01', 2, 'tyt', 'yty', 'ytyt', 'tyt');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eleve_id` int(11) DEFAULT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E90F6D6A6CC7B2` (`eleve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_serie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_achat` date NOT NULL,
  `prix_achat` int(11) NOT NULL,
  `utilisation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3CBF69DD4827B9B2` (`marque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`id`, `marque_id`, `nom`, `numero_serie`, `date_achat`, `prix_achat`, `utilisation`, `chemin_image`) VALUES
(6, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(7, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(8, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(9, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(10, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(11, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(12, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd'),
(13, 1, 'guitard', 'A4578D', '2017-01-01', 5, '1', 'dfdfd');

-- --------------------------------------------------------

--
-- Structure de la table `instrument_couleur`
--

DROP TABLE IF EXISTS `instrument_couleur`;
CREATE TABLE IF NOT EXISTS `instrument_couleur` (
  `instrument_id` int(11) NOT NULL,
  `couleur_id` int(11) NOT NULL,
  PRIMARY KEY (`instrument_id`,`couleur_id`),
  KEY `IDX_443EF844CF11D9C` (`instrument_id`),
  KEY `IDX_443EF844C31BA576` (`couleur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instrument_couleur`
--

INSERT INTO `instrument_couleur` (`instrument_id`, `couleur_id`) VALUES
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `libelle`) VALUES
(1, 'Carap');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel1` int(11) NOT NULL,
  `tel2` int(11) NOT NULL,
  `tel3` int(11) NOT NULL,
  `quotient_familial` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `email`, `tel1`, `tel2`, `tel3`, `quotient_familial`) VALUES
(1, 'Laflèche', 'Zabz', '4 rue des bosq', 'Caen', '14000', 'louis.barach@gmail.com', 685457495, 54, 8989, 5);

-- --------------------------------------------------------

--
-- Structure de la table `type_instrument`
--

DROP TABLE IF EXISTS `type_instrument`;
CREATE TABLE IF NOT EXISTS `type_instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_instrument`
--

INSERT INTO `type_instrument` (`id`, `libelle`) VALUES
(1, 'guitard');

-- --------------------------------------------------------

--
-- Structure de la table `type_instrument_instrument`
--

DROP TABLE IF EXISTS `type_instrument_instrument`;
CREATE TABLE IF NOT EXISTS `type_instrument_instrument` (
  `type_instrument_id` int(11) NOT NULL,
  `instrument_id` int(11) NOT NULL,
  PRIMARY KEY (`type_instrument_id`,`instrument_id`),
  KEY `IDX_88859E797C1CAAA9` (`type_instrument_id`),
  KEY `IDX_88859E79CF11D9C` (`instrument_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accessoire`
--
ALTER TABLE `accessoire`
  ADD CONSTRAINT `FK_8FD026ACF11D9C` FOREIGN KEY (`instrument_id`) REFERENCES `instrument` (`id`);

--
-- Contraintes pour la table `contrat_pret`
--
ALTER TABLE `contrat_pret`
  ADD CONSTRAINT `FK_1FB84C67A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `FK_1FB84C67CF11D9C` FOREIGN KEY (`instrument_id`) REFERENCES `instrument` (`id`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F753C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`),
  ADD CONSTRAINT `FK_ECA105F77ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_ECA105F7B2AF233D` FOREIGN KEY (`contrat_pret_id`) REFERENCES `contrat_pret` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D6A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`);

--
-- Contraintes pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `FK_3CBF69DD4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `instrument_couleur`
--
ALTER TABLE `instrument_couleur`
  ADD CONSTRAINT `FK_443EF844C31BA576` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_443EF844CF11D9C` FOREIGN KEY (`instrument_id`) REFERENCES `instrument` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `type_instrument_instrument`
--
ALTER TABLE `type_instrument_instrument`
  ADD CONSTRAINT `FK_88859E797C1CAAA9` FOREIGN KEY (`type_instrument_id`) REFERENCES `type_instrument` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_88859E79CF11D9C` FOREIGN KEY (`instrument_id`) REFERENCES `instrument` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
