-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 23 nov. 2022 à 10:07
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `agemini`, `agemaxi`, `nbplaces`) VALUES
(5, 'Guitare', 7, 15, 15),
(6, 'Piano', 10, 18, 15),
(7, 'Violencelle', 7, 18, 30),
(8, 'Trompette', 7, 18, 15);

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
('DoctrineMigrations\\Version20221121093634', '2022-11-21 09:36:42', 1950);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cours_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECA105F77ECF78B0` (`cours_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `cours_id`, `nom`, `prenom`, `date_naiss`) VALUES
(1, 5, 'Fati', 'Mariame', '2012-11-01'),
(2, 6, 'Yann', 'Kms', '2012-11-02'),
(3, 8, 'Modrik', 'Pascal', '2022-11-03'),
(4, 7, 'Toliso', 'Kami', '2012-11-04'),
(5, 6, 'Lione', 'Erryamine', '2022-11-05');

-- --------------------------------------------------------

--
-- Structure de la table `eleve_responsable`
--

DROP TABLE IF EXISTS `eleve_responsable`;
CREATE TABLE IF NOT EXISTS `eleve_responsable` (
  `eleve_id` int(11) NOT NULL,
  `responsable_id` int(11) NOT NULL,
  PRIMARY KEY (`eleve_id`,`responsable_id`),
  KEY `IDX_D7350730A6CC7B2` (`eleve_id`),
  KEY `IDX_D735073053C59D72` (`responsable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve_responsable`
--

INSERT INTO `eleve_responsable` (`eleve_id`, `responsable_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_serie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`id`, `nom`, `numero_serie`) VALUES
(1, 'Basse électrique', 'Q07219'),
(2, 'Guitare électrique', 'Q07220'),
(3, 'Clavier amplifié', 'Q07221'),
(4, 'Piano', 'Q07222'),
(5, 'Orgue', 'Q07223'),
(6, 'Saxophone', 'Q07224'),
(7, 'Clarinette', 'Q07224'),
(8, 'Flute traversière', 'Q07225'),
(9, 'Trombone', 'Q0726'),
(10, 'Trompette', 'Q07227'),
(11, 'Tuba', 'Q07228'),
(12, 'Violon', 'Q07229'),
(13, 'Violencelle', 'Q07230'),
(14, 'Harpe celtique', 'Q07231'),
(15, 'Batterie', 'Q07232');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`, `email`, `ville`, `code_postal`) VALUES
(1, 'Jacob', 'Milou', 'jacob@gmail.com', 'Caen', '14000'),
(2, 'Mister', 'Pascal', 'mister@gmail.com', 'Cherbourg', '50100'),
(3, 'Bill', 'Mailhe', 'bill@gmail.com', 'Caen ', '14000'),
(4, 'Thomas', 'Gilber', 'thomas@gmail.com', 'Caen ', '14000'),
(5, 'Gustave', 'Remi', 'gustave@gmail.com', 'Cherbourg', '50100'),
(6, 'Ahamadi', 'Kaize', 'ahamadi@gmail.com', 'Caen', '14000'),
(7, 'Baco', 'Rafouza', 'baco@gmail.com', 'Caen', '14000');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel1` int(11) DEFAULT NULL,
  `tel2` int(11) DEFAULT NULL,
  `tel3` int(11) DEFAULT NULL,
  `quotient_familial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `email`, `tel1`, `tel2`, `tel3`, `quotient_familial`) VALUES
(1, 'Phillipe', 'Franklin', '14 rue belle pierre', 'Caen', '14000', 'phillipe.franklin@gmail.com', 7658623, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F77ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `eleve_responsable`
--
ALTER TABLE `eleve_responsable`
  ADD CONSTRAINT `FK_D735073053C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D7350730A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
