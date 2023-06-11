-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 11 juin 2023 à 22:38
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `Civilité` varchar(255) NOT NULL,
  `Catégorie` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `pswC` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `datenaissance` date NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Civilité`, `Catégorie`, `nom`, `prenom`, `mail`, `psw`, `pswC`, `tel`, `datenaissance`, `Ville`, `Pays`, `Url`, `id`) VALUES
('Femme', 'admin', 'hamdi', 'rahma', 'rah12@gmail.com', '$2y$10$nrucqBVVkkC3RswFQnlsV.NWFmrM36oSw4R.dhRO50ecl79uFzL0W', '$2y$10$QXtBOH4Gg7e1y17D7n/k5.0senuU2A0yAM5J.g3xTR3rAjcwZ2oM.', 602112160, '1997-06-02', 'paris', 'france', 'https://www.pngitem.com/pimgs/m/285-2855629_profile-clipart-hd-png-download.png', 1),
('Homme', 'Client', 'valls', 'Manuel', 'manuel@gmail.com', '$2y$10$zNHKEvwpg9MVChphCIyQ8eqbRcEg6pnlTCJWIFj8RSlC6f6HDnBkO', '$2y$10$1al/Og/44MXKxXpuiSow4.2NgzuhQrXdKSd4poFra5/k7ZhPxbMl2', 709909898, '1965-09-01', 'paris', 'france', 'https://cdn.jns.org/uploads/2021/05/Manuel-Valls.jpg', 5),
('Femme', 'Technicien', 'hamdi', 'laura', 'laura@gmail.com', '$2y$10$don7fc4u.xEAObUVccqLxuNzLEmsXabHpqUfno1mWpyAoGbZra0UG', '$2y$10$Avd1x/jHSARknlW.mElFcOkKcb7fewWEE5juM1NBnxVzX.Xa6HnWO', 798878998, '1998-06-24', 'bezons', 'france', 'https://static.wixstatic.com/media/dfa8ab_24796fc499ab46f5b3da192c1a22dd2c~mv2.jpg/v1/fill/w_1176,h_1764,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/dfa8ab_24796fc499ab46f5b3da192c1a22dd2c~mv2.jpg', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
