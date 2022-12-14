-- GOAT INFORMATIONS

INSERT INTO `accessoire` (`id`, `instrument_id`, `libelle`) VALUES
(1, 1, 'housse'),
(2, 5, 'HOUSSE'),
(3, 2, 'Housse');



INSERT INTO `contrat_pret` (`id`, `user_id`, `instrument_id`, `date_debut`, `date_fin`, `attestation_assurance`, `etat_detaille_debut`, `etat_detaille_fin`) VALUES
(1, 1, 1, '2022-12-08', '2022-12-09', 'aaa', 'aaa', 'aaa'),
(2, 2, 5, '2022-12-01', '2022-12-16', 'A', 'NEUF', 'BON ETAT'),
(3, 1, 1, '2017-01-01', '2018-01-01', 'A', 'NEUF', 'CORRECT'),
(4, 1, 5, '2017-01-01', '2017-01-01', 'A', 'NEUF', 'CORRECT');



INSERT INTO `couleur` (`id`, `nom`) VALUES
(1, 'bleu'),
(2, 'rouge'),
(3, 'noir'),
(4, 'blanc'),
(5, 'vert'),
(6, 'jaune'),
(7, 'orange'),
(8, 'violet'),
(9, 'rose'),
(10, 'gris');



INSERT INTO `cours` (`id`, `libelle`, `agemini`, `agemaxi`, `nbplaces`, `date_d`, `heure_d`, `heure_f`) VALUES
(1, 'Guitare', 7, 10, 30, '2022-10-15', '15h', '16h'),
(5, 'Guitare', 7, 15, 15, '2022-10-15', '15h', '16h'),
(6, 'Piano', 10, 18, 15, '2022-10-15', '15h', '16h'),
(7, 'Violencelle', 7, 18, 30, '2022-10-15', '15h', '16h'),
(8, 'Trompette', 7, 18, 15, '2022-10-15', '15h', '16h');



INSERT INTO `eleve` (`id`, `responsable_id`, `user_id`) VALUES
(1, NULL, 1),
(2, NULL, 2);


INSERT INTO `eleve_cours` (`eleve_id`, `cours_id`) VALUES
(1, 5),
(2, 7);


INSERT INTO `instrument` (`id`, `marque_id`, `type_instrument_id`, `nom`, `numero_serie`, `date_achat`, `prix_achat`, `utilisation`, `chemin_image`) VALUES
(1, 1, 5, 'Basse électrique', 'Q07219', '2022-11-01', 30, '', NULL),
(2, 2, 4, 'Guitare électrique', 'Q07220', '2022-11-02', 40, '', NULL),
(3, 3, 4, 'Guitare électrique', 'Q07220', '2022-11-02', 40, '', NULL),
(4, 4, 3, 'Clavier amplifié', 'Q07221', '2022-11-03', 60, '', NULL),
(5, 5, 2, 'Piano', 'Q07222', '2022-11-04', 80, '5', NULL),
(6, 5, 2, 'Orgue', 'Q07223', '2022-11-05', 120, '', NULL),
(7, 4, 6, 'Saxophone', 'Q07224', '2022-11-06', 130, '', NULL),
(8, 3, 7, 'Clarinette', 'Q07225', '2022-11-07', 150, '', NULL),
(9, 2, 8, 'Flute traversière', 'Q07226', '2022-11-08', 160, '', NULL),
(10, 1, 9, 'Trombone', 'Q07226', '2022-11-09', 190, '', NULL),
(11, 1, 11, 'Tuba', 'Q07227', '2022-11-10', 205, '', NULL),
(12, 2, 12, 'Violon', 'Q07228', '2022-11-11', 300, '', NULL),
(13, 3, 15, 'Batterie', 'Q07229', '2022-11-12', 305, '', NULL);



INSERT INTO `intervention` (`id`, `instrument_id`, `date_debut`, `date_fin`, `descriptif`, `prix`) VALUES
(1, 10, '2022-12-01', '2022-12-02', 'Luxe', '1050'),
(3, 2, '2022-12-01', '2022-12-02', 'Moderne', '2000'),
(4, 8, '2022-12-01', '2022-12-02', 'Nouveaux Type', '9000'),
(5, 1, '2017-01-01', '2017-01-01', 'Test', '150'),
(6, 1, '2017-01-01', '2017-01-01', 'Test', '150'),
(7, 4, '2017-01-10', '2017-01-20', 'Buled', '8000'),
(8, 1, '2017-01-01', '2017-01-01', 'Test', '150'),
(9, 1, '2017-01-01', '2017-01-01', 'Test', '150');


INSERT INTO `marque` (`id`, `libelle`) VALUES
(1, 'Startone'),
(2, 'Harley Benton'),
(3, 'Behringer'),
(4, 'Stagg'),
(5, 'Squier');



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



INSERT INTO `user` (`id`, `professeur_id`, `email`, `roles`, `password`, `is_verified`, `prenom`, `nom`, `date_naiss`, `num_rue`, `rue`, `ville`, `code_postal`, `tel`, `chemin_img`) VALUES
(1, NULL, 'valentinlemarie50@gmail.com', '[\"ROLE_USER\"]', '$2y$13$S73ENP4HOplYo8vw8gtAf.J2eP3XxGUEF17hf6.uS3FoSOBfX2qtS', 1, 'Valentin', 'LEMARIE', '2001-09-28', 12, 'la vraie rue', 'StreetVille', '50130', '0769975566', '/goat/public/img/Default.png'),
(2, NULL, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$//Bqvv/n0uvllGuks0nIbOOfD41zJ/stCXbMnFkt7b9CyZwBOWeXC', 1, 'ADMIN', 'ADMIN', '2022-12-01', 0, 'ADMIN', 'ADMIN', '00000', '0000000000', '/goat/public/img/Default.png'),
(3, NULL, 'arthur@gmail.com', '[\"ROLE_USER\"]', '$2y$13$vbOyEs6FbqDt/yj7YpoZ1uD2fxbA5GSZ7oEUArYwbjPAnS5APnmVq', 1, 'Arthur', 'Farietti', '2003-07-10', 7, 'Capuche', 'Caen', '14000', '0654554457', '/goat/public/img/Default.png'),
(4, NULL, 'louislebg@ajoutezmonnum.com', '[\"ROLE_USER\"]', '$2y$13$lEmBkZ7gd41LoNqnmLMtseQzue1vIdNerrwgOBvv9umJideedcTki', 1, 'Louis', 'HERMAN', '2002-02-25', 23, 'rue de la streat', 'Rueville', '66600', '06 66 69 96 98', '/goat/public/img/Default.png'),
(5, NULL, 'test@test', '[\"ROLE_USER\"]', '$2y$13$n.jkSlOjbB0Quz6iMVcjWueKae0lvuJ9/.eE7HWwl.ZeIL.8BoRIa', 1, 'test', 'test', '2222-02-22', 12, 'la vraie rue', 'la vraie ville', '50130', '0769975566', '/goat/public/img/Default.png');
