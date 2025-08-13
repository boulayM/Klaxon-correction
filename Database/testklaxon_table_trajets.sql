
-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
CREATE TABLE IF NOT EXISTS `trajets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `depart` int NOT NULL,
  `date_depart` date NOT NULL,
  `heure_depart` time NOT NULL,
  `arrivee` int NOT NULL,
  `date_arrivee` date NOT NULL,
  `heure_arrivee` time NOT NULL,
  `nbr_places` int NOT NULL,
  `places_dispo` int NOT NULL,
  `contact` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depart` (`depart`),
  KEY `arrivee` (`arrivee`),
  KEY `contact` (`contact`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tronquer la table avant d'insérer `trajets`
--

TRUNCATE TABLE `trajets`;
--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`id`, `depart`, `date_depart`, `heure_depart`, `arrivee`, `date_arrivee`, `heure_arrivee`, `nbr_places`, `places_dispo`, `contact`) VALUES
(28, 9, '2025-07-30', '08:00:00', 10, '2025-07-30', '14:00:00', 2, 1, 1),
(29, 9, '2025-07-16', '08:00:00', 4, '2025-07-16', '14:00:00', 3, 2, 1),
(30, 3, '2025-07-29', '22:00:00', 9, '2025-07-30', '02:00:00', 2, 1, 1),
(31, 12, '2025-07-31', '08:00:00', 6, '2025-07-31', '12:00:00', 4, 2, 4),
(33, 7, '2025-07-31', '12:00:00', 10, '2025-07-31', '16:00:00', 4, 4, 3),
(63, 3, '3333-03-31', '03:00:00', 2, '3333-03-31', '15:00:00', 3, 3, 4),
(66, 9, '4444-04-04', '04:00:00', 10, '4444-04-04', '14:00:00', 4, 4, 1);
