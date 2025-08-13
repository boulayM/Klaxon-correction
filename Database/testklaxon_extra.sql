
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD CONSTRAINT `trajets_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `agences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trajets_ibfk_2` FOREIGN KEY (`arrivee`) REFERENCES `agences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trajets_ibfk_3` FOREIGN KEY (`contact`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
