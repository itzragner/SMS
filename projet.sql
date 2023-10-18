-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 oct. 2023 à 23:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','teacher','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `role`) VALUES
(14, 'arafetkh455@gmail.com', '$2y$10$HeI7/gBpub.MDfRlrWRqp.12F8yUILAVQC2DWpAii3pxzk4HUSMri', 'student'),
(15, 'efesf@s.gdr', '$2y$10$VlrjPIpE6fQxGXk1RRpqVOArjrelEZ7zYgEYWVu4o5sNJfkjjQUfu', 'student'),
(16, 'dgwr@gffesf.gj', '$2y$10$NXukfu1S7Njy0DvtT8sAfeQeIrGOUPEEwBH5zSUz/cng0oMR.6ApG', 'student'),
(17, 'dgwr@gfn', '$2y$10$WO.5l1W4zm4DjO3IVtlOvunX3b6QVlqYVgtM3FEEWTPHTv9jyKbPm', 'student'),
(18, 'admin', 'admin123', 'superadmin');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`firstname`, `lastname`, `matricule`, `num`, `id`, `email`, `age`) VALUES
('arafet', 'grdg', '2022maj017', 52875575, 110, 'arafetkh455@gmail.com', '2023-10-11'),
('fsef', 'sefsef', 'fesfse', 0, 111, 'efesf@s.gdr', '0000-00-00'),
('gs', 'f', '2022maj01h', 63, 112, 'dgwr@gffesf.gj', '2023-10-12'),
('hbt', '', 'nyh', 0, 113, 'dgwr@gfn', '2023-10-11');

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `age` date NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`firstname`, `lastname`, `matricule`, `id`, `email`, `age`, `num`) VALUES
('fthth', '', 'hfthtfh3', 0, '', '0000-00-00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
