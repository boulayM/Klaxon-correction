
-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telephone` int NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tronquer la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `role`, `password`) VALUES
(1, 'Martin', 'Alexandre', 612345678, 'alexandre.martin@email.fr', 'user', '14\'14_6&7mN'),
(2, 'Dubois', 'Sophie', 698765432, 'sophie.dubois@email.fr', 'admin', 'J*_iIL87/63'),
(3, 'Bernard', 'Julien', 622446688, 'julien.bernard@email.fr', 'user', '12@17_6&7mN'),
(4, 'Moreau', 'Camille', 611223344, 'camille.moreau@email.fr', 'user', '125/*+45;Ml'),
(5, 'Lefèvre', 'Lucie', 777889900, 'lucie.lefevre@email.fr', 'user', ''),
(6, 'Leroy', 'Thomas', 655443322, 'thomas.leroy@email.fr', 'user', ''),
(7, 'Roux', 'Chloé', 633221199, 'chloe.roux@email.fr', 'user', ''),
(8, 'Petit', 'Maxime', 766778899, 'maxime.petit@email.fr', 'user', ''),
(9, 'Garnier', 'Laura', 688776655, 'laura.garnier@email.fr', 'user', ''),
(10, 'Dupuis', 'Antoine', 744556677, 'antoine.dupuis@email.fr', 'user', ''),
(11, 'Lefebvre', 'Emma', 699887766, 'emma.lefebvre@email.fr', 'user', ''),
(12, 'Fontaine', 'Louis', 655667788, 'louis.fontaine@email.fr', 'user', ''),
(13, 'Chevalier', 'Clara', 788990011, 'clara.chevalier@email.fr', 'user', ''),
(14, 'Robin', 'Nicolas', 644332211, 'nicolas.robin@email.fr', 'user', ''),
(15, 'Gauthier', 'Marine', 677889922, 'marine.gauthier@email.fr', 'user', ''),
(16, 'Fournier', 'Pierre', 722334455, 'pierre.fournier@email.fr', 'user', ''),
(17, 'Girard', 'Sarah', 688665544, 'sarah.girard@email.fr', 'user', ''),
(18, 'Lambert', 'Hugo', 611223366, 'hugo.lambert@email.fr', 'user', ''),
(19, 'Masson', 'Julie', 733445566, 'julie.masson@email.fr', 'user', ''),
(20, 'Henry', 'Arthur', 666554433, 'arthur.henry@email.fr', 'user', '');
