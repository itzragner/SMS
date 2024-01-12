-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 jan. 2024 à 18:06
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
(67, 'fesghr@gdr.gr', '$2y$10$v9kpersceWU0LH2uTdpVGOOZYSmty1mTdGO19149bdS/aHK2grM/.', 'teacher', '4'),
(69, 'a@a.a', '$2y$10$t.Ly4ER2VXMAi44JwkSyNeTmh8BsGk/hl.WDBUI7lIDARoDIJT8dO', 'student', 'a'),
(70, 'u@u.u', '$2y$10$J.kykhOG9yYzSwy3KSsxa.k0aSbPuxYdDDZReOBH213e464YUVSoC', 'teacher', 'u'),
(71, 'j@j.j', '$2y$10$80WJZl83EZRD3VqalT28nOzFDd0UjpOaTlhU1mxgcvATLc6qOs1M2', 'student', 'j'),
(72, 'n@n.n', '$2y$10$UfqmrTYAgeCIsGUSLQVmbuv4CZgSX7K55eMm.nFI3B.XkmgiF25Bi', 'student', 'n'),
(73, 'grd@gdr.gdr', '$2y$10$mWhBm5SetNOYFJ26P8B.EemFQBD/vZ/buuw6eMDj9q443HbLEKWNO', 'student', 'gdrg'),
(74, 'sa@sS.D', '$2y$10$x91YMZk9aG9vXRuB2PgUOuRRniBSp7OBld8Q3tHwpVTi90fapHCuG', 'student', 'sas'),
(75, 'm@m.m', '$2y$10$T8edq5h7t7w/iGXKTnC.8.rhC2fSBr.gQIaSGxBwer44JmxUVM8gi', 'student', 'm'),
(76, 'ya@ya.ya', '$2y$10$WlwF5WGJmyXhg4bAkZ0sWeYWDZvkOi7b3NIiv3fMLiJpZyoXmDJ/K', 'student', 'ya');

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
('grg', 'ddg', 'vvs49', 3242, 126, 'hfth@gdr.gd', '2023-11-16', 2),
('a', 'a', 'a', 5434884, 127, 'a@a.a', '0005-05-05', 1),
('j', 'j', 'j', 5, 128, 'j@j.j', '2024-01-12', 3),
('n', '', 'n', 0, 129, 'n@n.n', '0000-00-00', 1),
('gdr', 'gdr', 'gdrg', 0, 131, 'grd@gdr.gdr', '0000-00-00', 1),
('dsa', 's', 'sas', 0, 132, 'sa@sS.D', '0000-00-00', 1),
('malek', 'rgdrgrdgdw', 'm', 53, 133, 'm@m.m', '2024-01-18', 1),
('yassine', 'ytdhgrdg', 'ya', 5852486, 134, 'ya@ya.ya', '2024-01-04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `student_tasks`
--

CREATE TABLE `student_tasks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `task_status` varchar(255) DEFAULT NULL,
  `work` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student_tasks`
--

INSERT INTO `student_tasks` (`id`, `student_id`, `teacher_name`, `task_id`, `task_status`, `work`) VALUES
(6, 123, 'admin', 39, 'started', ''),
(7, 126, 'admin', 39, 'started', ''),
(8, 122, 'u ', 40, 'started', ''),
(9, 123, 'u ', 41, 'started', ''),
(10, 126, 'u ', 41, 'started', ''),
(11, 124, 'u ', 42, 'started', ''),
(12, 125, 'u ', 42, 'started', ''),
(13, 122, 'u ', 43, 'started', ''),
(14, 122, 'admin', 44, 'started', ''),
(15, 122, 'admin', 45, 'started', ''),
(16, 124, 'h h', 46, 'started', ''),
(17, 125, 'h h', 46, 'started', ''),
(18, 123, 'h h', 47, 'started', ''),
(19, 126, 'h h', 47, 'started', ''),
(20, 122, 'h h', 48, 'started', ''),
(21, 122, 'h h', 49, 'started', ''),
(22, 124, 'admin', 50, 'started', ''),
(23, 125, 'admin', 50, 'started', ''),
(24, 124, 'admin', 51, 'started', ''),
(25, 125, 'admin', 51, 'started', ''),
(26, 124, 'admin', 52, 'started', ''),
(27, 125, 'admin', 52, 'started', ''),
(28, 124, '1 grelfse', 53, 'started', ''),
(29, 125, '1 grelfse', 53, 'started', ''),
(30, 124, 'admin', 54, 'started', ''),
(31, 125, 'admin', 54, 'started', ''),
(32, 122, 'admin', 55, 'started', ''),
(34, 124, 'u u', 57, 'started', ''),
(35, 125, 'u u', 57, 'started', ''),
(36, 127, 'u u', 57, 'started', ''),
(37, 124, 'admin', 58, 'started', ''),
(38, 125, 'admin', 58, 'started', ''),
(39, 127, 'admin', 58, 'started', ''),
(40, 129, 'admin', 58, 'started', ''),
(41, 131, 'admin', 58, 'started', ''),
(42, 132, 'admin', 58, 'started', '');

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
(38, 'tiyu', NULL, 3, 'admin', '2023-12-20', '2023-12-02', 'koi', 'started'),
(39, 'jygj', NULL, 2, 'admin', '2023-12-09', '2023-12-27', 'fthth', 'started'),
(44, 'test', NULL, 3, 'admin', '2023-12-14', '2023-12-29', '11 30', 'started'),
(45, 'yjghftfht\r\nfthfhfthtfhfth', NULL, 3, 'admin', '2023-11-29', '2023-12-20', ',jbh,j', 'started'),
(52, 'delete', NULL, 1, 'admin', '2023-12-02', '2023-12-28', 'grp1', 'started'),
(54, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"\r\n\r\nhelp@lipsum.com\r\nPrivacy Policy · Do Not Sell My Personal Information · Change Consent · \r\n\r\nFreestar', NULL, 1, 'admin', '2024-01-10', '2024-01-18', 'Lorem Ipsum', 'started'),
(55, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"\r\n\r\nhelp@lipsum.com\r\nPrivacy Policy · Do Not Sell My Personal Information · Change Consent · \r\n\r\nFreestar', NULL, 3, 'admin', '2024-01-10', '2024-01-18', 'Lorem Ipsum', 'started'),
(57, 'Lorem Ipsum sokavida\r\n$teacher_name$_SESSION[\'studentlogged\']= true;$_SESSION[\'teacherlogged\']= true;', NULL, 1, 'u u', '2024-01-11', '2024-01-18', 'new', 'started'),
(58, 'gdrgdrwg', NULL, 1, 'admin', '2024-01-03', '2024-01-19', 'grp1', 'started');

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
('bf', 'b', 'c@c.c', 5, 'b', '0686-06-08', 7),
('dgrd', 'rgg', 'gr@g.g', 0, 'gdrg', '2023-11-18', 8),
('grdgd', 'rgdrg', 'h@bgg.g', 3645, '2453', '2023-11-15', 22),
('hdgr', 'jy', 'fesghr@gdr.gr', 1, '4', '2023-12-14', 24),
('u', 'u', 'u@u.u', 1741, 'u', '0000-00-00', 26);

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
(7, 3),
(22, 2),
(22, 3),
(24, 1),
(26, 1);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student_tasks`
--
ALTER TABLE `student_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT pour la table `student_tasks`
--
ALTER TABLE `student_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `task_group`
--
ALTER TABLE `task_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_groupes_id_fk` FOREIGN KEY (`group_id`) REFERENCES `groupes` (`id`);

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
