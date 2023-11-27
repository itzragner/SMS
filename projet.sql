-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 nov. 2023 à 22:23
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
  `role` enum('student','teacher','admin','superadmin') NOT NULL,
  `matricule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `role`, `matricule`) VALUES
(18, 'admin', 'admin123', 'superadmin', 'admin'),
(40, 'a@a.afghj', '$2y$10$sF9DQwJk.EwHzsyYtmDzCeGRqjj2h7rx0Ul7jLcGUcYFqwXyT5tV.', 'student', 'op'),
(41, 'k@k.k', '$2y$10$l/I/xxk51z8.upSmKDeGyut/nVNMyYHGGoU9mUCn1LgqNLWOYSbrS', 'student', 'opp'),
(42, 't@t.t', '$2y$10$2SSDGpRYEIJD0ij7UCRbCOknTu5sm7oHbtryqYRMCInXfnCeu5Y8q', 'teacher', 'hfkuk'),
(43, 'k@k.k', '$2y$10$7UGSCp6BpaCUi8.1491ye.ZaQn3Lt.Bm7ryBy6PwMd77n/WsRfcoW', 'student', 'yep'),
(44, 'y@y.y', '$2y$10$c82QZhYHSygsMJ/j6YZ5BuUOyVljxYmTlkiKkhAgAOC0hpUxyjURq', 'student', 'y'),
(45, 'u@u.u', '$2y$10$/0LfFvgbvmIp0PUMGiv8ueeXqAl58C2ajxcPDmLRP7TvU.mDSl0PW', 'teacher', 'u'),
(46, 'h@h.h', '$2y$10$JYtwFc4VvOuhUaSW7mR02OaaHO2wIjkyGnWKqvH0brq3c/B921Y9y', 'teacher', 'h'),
(49, 'c@c.c', '$2y$10$H1x8hVDQcrP9Gcn3dhL7m.S9eTPD6sRJQyFSZMz38H0yJTKDDloo6', 'teacher', 'b'),
(50, 'gr@g.g', '$2y$10$GhYJD9R0LTzynpwd8jEGO.wNMv4iwSofbtsKyEnGoGxv3/NF9XzvC', 'teacher', 'gdrg'),
(51, 'fth@fhkl.g', '$2y$10$krhwFVBzKhN/7WaGm17RQOvcPE27hX4oujVz/lLbrJwdsZ1j25p1y', 'teacher', 'lfy'),
(52, 'ghdrgl@hd.g', '$2y$10$2z001b8t5bnHI4HnW1Z2G.Z.feU.Arzv1WTK4/PDvtjY/JzIZON5m', 'teacher', 'gjkygjgc'),
(53, 'h@g.gd', '$2y$10$RnWtZa3aaVaVFnM7SRJxmOTfrJgNsKOw.oxU73uxl8GhxO9fGPSpW', 'teacher', 'ki'),
(54, 'o@o.g', '$2y$10$Rdl2ZPEf5Hy0HGx.r7U7FOM.EvNRHWCstQ6nGowwaTGsEXZ/Hy.uO', 'teacher', 'n'),
(55, 'i@i.i', '$2y$10$l.vCjHqip6mYigOJXDKCte7etqODgVP1x7ADU.GMjSBtZg8/UkK0q', 'teacher', 'kh'),
(56, '0@h.h', '$2y$10$Qpet/2NTLCJyXdSbAiRgUeCLjFZi0bY9sfSlR3TdDIEn47eLd06Jy', 'teacher', 'j'),
(57, '1jyfh@hdf.g', '$2y$10$gREuEIgmfHH0jFizN9dT0OT8JgFb7CKUezqUGI2iD02.sRqTbmRCS', 'teacher', 'jf'),
(58, 'gdr@srg.fs', '$2y$10$xtnoPmHP14kzfym4w5deVev4b5sntcHBL8C2eIc3vNsD3CHR6Sh.S', 'teacher', '43drg'),
(59, 'drgkgdr@r.fse', '$2y$10$OytNizkpzKWthCNNrbpBmeZW0aVCoan.IMsMY0fg82OL5foNK9raO', 'teacher', 'dthntg'),
(60, 'hrdr@fse.g', '$2y$10$z/hAQkqpLrYDq5qkGPuqP.xaXFdTbnfMuEqiD8MFxLqXroeLde4Mm', 'teacher', 'jpfse'),
(61, 'youip@g.com', '$2y$10$BSq7I/JgWmwn3FBRV9jjiuVwgH.KONLWM0kf39C4StSceg.6LfoTC', 'teacher', 'azer'),
(62, 'sdff@grd.grds', '$2y$10$BCzNiizPmJKFnw1UBVIYheEl5.uY5R2WHpuSitq7pU8LudiWSqDrm', 'teacher', '4jyg'),
(63, 'hfth@gdr.gd', '$2y$10$EeTbPq8KbL1wM2R6VADhU.ieoa./TB5DrAxi.f0dNJjyydUMomVGi', 'student', 'vvs49'),
(64, 'bfsd@tl.cdgb', '$2y$10$bC/NHOW7fR2rOk/H/ths9.LT2AOaii/m9MJN.bqrkmT5ed4UPHXyy', 'teacher', 'bdb'),
(65, 'h@bgg.g', '$2y$10$dUQEdtG1MycEYEU9JsXRXuU9ZsND/Z3n8LiiPL31YTIljUiEykNIG', 'teacher', '2453'),
(66, '1@1.1', '$2y$10$SR5tBJZ6h3k.kRdiV.EwfucK//U0k2J2/LXqvXXROn73zJetp5vsq', 'teacher', '1');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `name`) VALUES
(1, 'groupe1'),
(2, 'groupe2'),
(3, 'groupe3');

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
  `age` date DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`firstname`, `lastname`, `matricule`, `num`, `id`, `email`, `age`, `group_id`) VALUES
('arafetag', 'gdrgrdr', 'op', 336, 122, 'a@a.afghj', '2023-11-16', 3),
('baf', 'jyfgj', 'opp', 6, 123, 'k@k.k', '2023-11-23', 2),
('med', 'kh', 'yep', 548123748, 124, 'k@k.k', '0486-05-07', 1),
('y', 'fthtf', 'y', 44863, 125, 'y@y.y', '2023-11-25', 1),
('grg', 'ddg', 'vvs49', 3242, 126, 'hfth@gdr.gd', '2023-11-16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id_tasks` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_teachertask` int(11) DEFAULT NULL,
  `id_groupetask` int(11) DEFAULT NULL,
  `teachertask_name` varchar(255) DEFAULT NULL,
  `task_started` date DEFAULT NULL,
  `task_deadline` date DEFAULT NULL,
  `task_title` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id_tasks`, `description`, `id_teachertask`, `id_groupetask`, `teachertask_name`, `task_started`, `task_deadline`, `task_title`, `status`) VALUES
(27, 'grdgrdg', NULL, 1, 'admin', '0005-02-05', '0006-02-15', 'ex1', 'started'),
(28, 'grdgrdg', NULL, 3, 'admin', '0005-02-05', '0006-02-15', 'ex1', 'started');

-- --------------------------------------------------------

--
-- Structure de la table `task_group`
--

CREATE TABLE `task_group` (
  `task_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `num` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `age` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`firstname`, `lastname`, `email`, `num`, `matricule`, `age`, `id`) VALUES
('bht', 'hfthhg', 't@t.t', 2872, 'hfkuk', '2023-11-16', 1),
('gdrgkdg', 'dgkldrg', 'z@z.z', 54687343, 'z', '2023-11-02', 2),
('u', '', 'u@u.u', 0, 'u', '0000-00-00', 3),
('h', 'h', 'h@h.h', 5, 'h', '2023-11-22', 4),
('bf', 'b', 'c@c.c', 5, 'b', '0686-06-08', 7),
('dgrd', 'rgg', 'gr@g.g', 0, 'gdrg', '2023-11-18', 8),
('grdgd', 'rgdrg', 'h@bgg.g', 3645, '2453', '2023-11-15', 22),
('1', 'grelfse', '1@1.1', 0, '1', '0000-00-00', 23);

-- --------------------------------------------------------

--
-- Structure de la table `teacher_groups`
--

CREATE TABLE `teacher_groups` (
  `teacher_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teacher_groups`
--

INSERT INTO `teacher_groups` (`teacher_id`, `group_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(4, 1),
(4, 3),
(7, 3),
(22, 2),
(22, 3),
(23, 2),
(23, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_groupes_id_fk` (`group_id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`),
  ADD KEY `tasks_groupe_id_fk` (`id_groupetask`),
  ADD KEY `tasks_teachers_id_fk` (`id_teachertask`);

--
-- Index pour la table `task_group`
--
ALTER TABLE `task_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_group_groupes_id_fk` (`group_id`),
  ADD KEY `task_group_tasks_id_tasks_fk` (`task_id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teacher_groups`
--
ALTER TABLE `teacher_groups`
  ADD PRIMARY KEY (`teacher_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `task_group`
--
ALTER TABLE `task_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_groupes_id_fk` FOREIGN KEY (`group_id`) REFERENCES `groupes` (`id`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_groupe_id_fk` FOREIGN KEY (`id_groupetask`) REFERENCES `groupes` (`id`),
  ADD CONSTRAINT `tasks_teachers_id_fk` FOREIGN KEY (`id_teachertask`) REFERENCES `teachers` (`id`);

--
-- Contraintes pour la table `task_group`
--
ALTER TABLE `task_group`
  ADD CONSTRAINT `task_group_groupes_id_fk` FOREIGN KEY (`group_id`) REFERENCES `groupes` (`id`),
  ADD CONSTRAINT `task_group_tasks_id_tasks_fk` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id_tasks`);

--
-- Contraintes pour la table `teacher_groups`
--
ALTER TABLE `teacher_groups`
  ADD CONSTRAINT `teacher_groups_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `teacher_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groupes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
