-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 déc. 2022 à 08:25
-- Version du serveur : 8.0.25
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `GOAT`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoire`
--

CREATE TABLE `accessoire` (
  `id` int NOT NULL,
  `instrument_id` int DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contrat_pret`
--

CREATE TABLE `contrat_pret` (
  `id` int NOT NULL,
  `instrument_id` int DEFAULT NULL,
  `eleve_id` int DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `attestation_assurance` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_detaille_debut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_detaille_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `nom`) VALUES
(1, 'noir'),
(2, 'rouge'),
(3, 'bleu'),
(4, 'marron'),
(5, 'VIOLET');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int NOT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agemini` int NOT NULL,
  `agemaxi` int NOT NULL,
  `nbplaces` int NOT NULL,
  `date_d` date NOT NULL,
  `heure_d` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_f` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `agemini`, `agemaxi`, `nbplaces`, `date_d`, `heure_d`, `heure_f`) VALUES
(1, 'piano', 6, 16, 9, '2022-01-03', '16', '22'),
(2, 'Guitard', 8, 16, 9, '2017-01-06', '15', '20');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221128093409', '2022-11-28 09:34:21', 488),
('DoctrineMigrations\\Version20221128093937', '2022-11-28 09:39:42', 1186),
('DoctrineMigrations\\Version20221128094438', '2022-11-28 09:44:45', 1058),
('DoctrineMigrations\\Version20221128094646', '2022-11-28 09:46:55', 195),
('DoctrineMigrations\\Version20221128095143', '2022-11-28 09:51:52', 856),
('DoctrineMigrations\\Version20221128100915', '2022-11-28 10:09:27', 1078),
('DoctrineMigrations\\Version20221128101414', '2022-11-28 10:14:22', 3251),
('DoctrineMigrations\\Version20221128150627', '2022-11-28 15:06:31', 2968),
('DoctrineMigrations\\Version20221205123640', '2022-12-05 12:36:45', 16230),
('DoctrineMigrations\\Version20221205153015', '2022-12-05 15:30:19', 24801);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int NOT NULL,
  `cours_id` int DEFAULT NULL,
  `responsable_id` int DEFAULT NULL,
  `contrat_pret_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `cours_id`, `responsable_id`, `contrat_pret_id`, `user_id`) VALUES
(2, 2, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int NOT NULL,
  `eleve_id` int DEFAULT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE `instrument` (
  `id` int NOT NULL,
  `marque_id` int DEFAULT NULL,
  `type_instrument_id` int DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_serie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_achat` date NOT NULL,
  `prix_achat` int NOT NULL,
  `utilisation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`id`, `marque_id`, `type_instrument_id`, `nom`, `numero_serie`, `date_achat`, `prix_achat`, `utilisation`, `chemin_image`) VALUES
(1, 1, 4, 'guitare', 'A4578D', '2017-01-01', 452, '1', 'aucun'),
(2, 1, 2, 'Piano', 'A4578D', '2017-01-01', 450, '1', 'aucun'),
(3, 1, 2, 'Piano', 'Z15749Z', '2021-12-15', 670, '10', '.'),
(4, 1, 6, 'Saxophone', '7FG89X', '2021-01-01', 150, '3', 'aucun');

-- --------------------------------------------------------

--
-- Structure de la table `instrument_couleur`
--

CREATE TABLE `instrument_couleur` (
  `instrument_id` int NOT NULL,
  `couleur_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instrument_couleur`
--

INSERT INTO `instrument_couleur` (`instrument_id`, `couleur_id`) VALUES
(1, 1),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int NOT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `libelle`) VALUES
(1, 'Carap'),
(2, 'Harley Benton'),
(3, 'Startone'),
(4, 'Behringer'),
(5, 'Stagg');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `user_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

CREATE TABLE `professionnel` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_rue` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `quotient_familial` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_instrument`
--

CREATE TABLE `type_instrument` (
  `id` int NOT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_instrument`
--

INSERT INTO `type_instrument` (`id`, `libelle`) VALUES
(1, 'Orgue'),
(2, 'Piano'),
(3, 'Clavier amplifié'),
(4, 'Guitare électrique'),
(5, 'Basse électrique'),
(6, 'Saxophone'),
(7, 'Clarinette'),
(8, 'Flute traversière'),
(9, 'Trombone'),
(10, 'Trompette'),
(11, 'Tuba'),
(12, 'Violon'),
(13, 'Violoncelle'),
(14, 'Harpe celtique'),
(15, 'Batterie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `professeur_id` int DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` date DEFAULT NULL,
  `num_rue` int NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `professeur_id`, `email`, `roles`, `password`, `is_verified`, `prenom`, `nom`, `date_naiss`, `num_rue`, `rue`, `ville`, `code_postal`, `tel`, `chemin_img`) VALUES
(2, NULL, 'guillaume@gmail.com', '[\"ROLE_USER\"]', '$2y$13$jjMInzXqLLIWTbRqfK/ZYOfPf220Tz3K44Ral75IOAa6QMcpXRJte', 1, 'Guillaume', 'Martin', NULL, 9, 'Capuche', 'Caen', '14000', '0654554457', 'valentin'),
(3, NULL, 'herman@gmail.com', '[\"ROLE_USER\"]', '$2y$13$Urgn2TmpI8M2zaCXq3L4Ce6w4awi2YoqCjHW5Jg4W5ZywMTsSj4ru', 1, 'Louis', 'Herman', NULL, 9, 'folche', 'Caen', '14000', '065784445', NULL),
(4, NULL, 'baloche@gmail.com', '[\"ROLE_USER\"]', '$2y$13$pM5DbZClO9hNrjoDrexOMOygJDdNILD3Lb/u4slPM7483oDz.lE9S', 1, 'Martin', 'baloche', NULL, 6, 'Capuche', 'Caen', '14000', '0654578450', NULL),
(5, NULL, 'valentinlemarie50@gmail.com', '[\"ROLE_USER\"]', '$2y$13$EAu788uV0gfRPObOBqFh9unKWnplSvoKLn241PkrQiGWoq5VXK7x2', 1, 'Valentin', 'LEMARIE', '2001-09-28', 2, 'la vraie rue', 'la vraie ville', '50130', '0769975566 oui cest mon vrai num', '\\goat\\public\\img\\valentin.png'),
(7, NULL, 'ardelaide@gmail.com', '[\"ROLE_USER\"]', '$2y$13$9xWgbdeVN8v6mMh4M5NX3uWBRpxPWLNDglCEEKf4FnjpdaszVR5hy', 1, 'Ardelaide', 'DJAE', '2003-11-15', 4, 'rue Pepsi', 'Caen', '14000', '06526458952', NULL),
(8, NULL, 'arthur@gmail.com', '[\"ROLE_USER\"]', '$2y$13$xeNpcnqGUbQbJKUkvKrt.uAxGhWjY7HLdywQSyR0JVzOJ5k5XErpa', 1, 'Arthur', 'Farietti', '2022-12-09', 4, 'Capuche', 'Caen', '14000', '0654554457', NULL),
(9, NULL, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$DA6fENBzoqMMpdffHr.Ec.V0c9NzfzOVnAN9UJ.isq2Z693Yb7Tz.', 1, 'ADMIN', 'ADMIN', '2022-12-01', 0, 'ADMIN', 'ADMIN', '00000', '0000000000', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accessoire`
--
ALTER TABLE `accessoire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8FD026ACF11D9C` (`instrument_id`);

--
-- Index pour la table `contrat_pret`
--
ALTER TABLE `contrat_pret`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1FB84C67CF11D9C` (`instrument_id`),
  ADD KEY `IDX_1FB84C67A6CC7B2` (`eleve_id`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECA105F77ECF78B0` (`cours_id`),
  ADD KEY `IDX_ECA105F753C59D72` (`responsable_id`),
  ADD KEY `IDX_ECA105F7B2AF233D` (`contrat_pret_id`),
  ADD KEY `IDX_ECA105F7A76ED395` (`user_id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E90F6D6A6CC7B2` (`eleve_id`);

--
-- Index pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3CBF69DD4827B9B2` (`marque_id`),
  ADD KEY `IDX_3CBF69DD7C1CAAA9` (`type_instrument_id`);

--
-- Index pour la table `instrument_couleur`
--
ALTER TABLE `instrument_couleur`
  ADD PRIMARY KEY (`instrument_id`,`couleur_id`),
  ADD KEY `IDX_443EF844CF11D9C` (`instrument_id`),
  ADD KEY `IDX_443EF844C31BA576` (`couleur_id`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_17A55299A76ED395` (`user_id`);

--
-- Index pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_52520D07A76ED395` (`user_id`);

--
-- Index pour la table `type_instrument`
--
ALTER TABLE `type_instrument`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649BAB22EE9` (`professeur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accessoire`
--
ALTER TABLE `accessoire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contrat_pret`
--
ALTER TABLE `contrat_pret`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `instrument`
--
ALTER TABLE `instrument`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `professionnel`
--
ALTER TABLE `professionnel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_instrument`
--
ALTER TABLE `type_instrument`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `FK_ECA105F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
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
  ADD CONSTRAINT `FK_3CBF69DD4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `FK_3CBF69DD7C1CAAA9` FOREIGN KEY (`type_instrument_id`) REFERENCES `type_instrument` (`id`);

--
-- Contraintes pour la table `instrument_couleur`
--
ALTER TABLE `instrument_couleur`
  ADD CONSTRAINT `FK_443EF844C31BA576` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_443EF844CF11D9C` FOREIGN KEY (`instrument_id`) REFERENCES `instrument` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `FK_17A55299A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `FK_52520D07A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649BAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
