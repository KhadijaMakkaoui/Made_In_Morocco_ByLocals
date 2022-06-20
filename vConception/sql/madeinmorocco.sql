-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 juin 2022 à 16:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `madeinmorocco`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `fk_role`) VALUES
(1, 'mohamed@gmail.com', '12345', 2),
(2, 'khadija@gmail.com', '12345', 2),
(3, 'salim@email.com', 'AZERTY', 3),
(4, 'samir@email.com', 'dnssdn', 3),
(7, 'khad@gmail.com', '$2y$10$cnT19MFOEPwZS3trJNSlkuKroYErfFPctejBxdaUNkFGctXpo.L6G', 3),
(8, 'lamya@email.com', '$2y$10$5g6.27hPVFktG1gAwKfez.3aoPHJzy2IX0YlIPicgY7YfZ9RS62ra', 3),
(9, 'khad123456@gmail.com', '$2y$10$E1kXNW0d5Z1xhGNmky.5hupL3a6dFpq5rFqMhSg/agCX3xvoOxULu', 2);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `nb_etoile_avis` int(11) NOT NULL,
  `commentaire_avis` varchar(255) NOT NULL,
  `createdAt_avis` date NOT NULL DEFAULT current_timestamp(),
  `fk_client` int(11) NOT NULL,
  `fk_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `nb_etoile_avis`, `commentaire_avis`, `createdAt_avis`, `fk_client`, `fk_produit`) VALUES
(3, 3, 'bonne qualité', '2022-06-14', 2, 5),
(4, 5, 'bonne qualité', '2022-06-14', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `description`) VALUES
(1, 'MAISON ET DÉCORATION', NULL),
(2, 'VÊTEMENTS ET ACCESSOIRES', NULL),
(3, 'HERBES, ÉPICES ET ALIMENTATION', NULL),
(4, 'SOINS ET COSMÉTIQUE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `addresse_livraison` varchar(255) NOT NULL,
  `fk_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `addresse_livraison`, `fk_account`) VALUES
(1, 'marrakech', 1),
(2, 'Tanger N°123', 4),
(3, 'Youssoufia', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `quantite` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fk_client` int(11) NOT NULL,
  `fk_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date`, `quantite`, `description`, `fk_client`, `fk_produit`) VALUES
(5, '2022-06-13', 2, 'merci  de l\'emballer comme un cadeau', 1, 5),
(6, '2022-06-13', 2, 'merci  de l emballer comme un cadeau', 1, 5),
(7, '2022-06-13', 2, '', 1, 9),
(9, '2022-06-13', 2147483647, 'this is adescription', 1, 10),
(10, '2022-06-13', 33, 'AZZZZZZZZZZZZ', 1, 8),
(11, '2022-06-14', 1, 'Hello', 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `fabriquants`
--

CREATE TABLE `fabriquants` (
  `id` int(11) NOT NULL,
  `CIN` varchar(20) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `fk_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fabriquants`
--

INSERT INTO `fabriquants` (`id`, `CIN`, `profession`, `description`, `activite`, `fk_account`) VALUES
(1, 'EE1234', 'Cuir', 'Je suis mohamed de marrakech ', 'cuir', 2);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `chemin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `titre`, `chemin`) VALUES
(1, 'pouf', 'pouf.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL,
  `quantite_panier` int(11) NOT NULL,
  `date_panier` date NOT NULL DEFAULT current_timestamp(),
  `fk_produit` int(11) NOT NULL,
  `fk_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `createdAt_produit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_s_categorie` int(11) NOT NULL,
  `fk_image` int(11) NOT NULL,
  `fk_fabriquant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `quantite`, `prix`, `createdAt_produit`, `fk_s_categorie`, `fk_image`, `fk_fabriquant`) VALUES
(5, 'Pouf de cuire noire', 'pouf 100% fabriqué au Maroc', 13, 300.2, '2022-06-13 08:02:58', 10, 1, 1),
(8, 'AZZZ', '', 111, 1111, '2022-06-13 13:11:47', 1, 1, 1),
(9, 'AZZZ', 'hello', 111, 1111, '2022-06-13 13:13:18', 1, 1, 1),
(10, 'AZZZ', 'hello', 111, 1111, '2022-06-13 13:16:02', 1, 1, 1),
(11, 'ggghg', 'GHGGHHGGH', 7, 66666, '2022-06-13 14:16:15', 33, 1, 1),
(12, 'ssssssss', 'DSQQQDD', 12, 223, '2022-06-13 14:17:33', 33, 1, 1),
(13, 'jksqhs', 'AZAZ', 2, 1122, '2022-06-13 14:31:18', 11, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `fk_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`, `fk_image`) VALUES
(1, 'Tanger-Tétouan-Al Hoceïma', NULL),
(2, 'l\'Oriental', NULL),
(3, 'Fès-Meknès', NULL),
(4, 'Rabat-Salé-Kénitra', NULL),
(5, 'Béni Mellal-Khénifra', NULL),
(6, 'Casablanca-Settat', NULL),
(7, 'Marrakech-Safi', NULL),
(8, 'Drâa-Tafilalet', NULL),
(9, 'Souss-Massa', NULL),
(10, 'Guelmim-Oued Noun', NULL),
(11, 'Laâyoune-Sakia El Hamra', NULL),
(12, 'Dakhla-Oued Ed Dahab', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'Admin', NULL),
(2, 'Fabriquant', NULL),
(3, 'Client', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `souhaits`
--

CREATE TABLE `souhaits` (
  `id` int(11) NOT NULL,
  `quantite_souhaits` int(11) NOT NULL,
  `date_souhaits` date NOT NULL DEFAULT current_timestamp(),
  `fk_produit` int(11) NOT NULL,
  `fk_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fk_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `libelle`, `description`, `fk_categorie`) VALUES
(1, 'Décoration murable', NULL, 1),
(2, 'Couverture', NULL, 1),
(3, 'Vaiselle', NULL, 1),
(4, 'Parfum d\'interieur', NULL, 1),
(5, 'Décoration murable', NULL, 1),
(6, 'Lampes et Abat-jour', NULL, 1),
(7, 'Coussins et taies d\'oreiller', NULL, 1),
(8, 'Tapis', NULL, 1),
(9, 'Bougies', NULL, 1),
(10, 'Poufs', NULL, 1),
(11, 'Tables', NULL, 1),
(12, 'Djellaba', NULL, 2),
(13, 'Caftans', NULL, 2),
(14, 'Guandoura', NULL, 2),
(15, 'Robes', NULL, 2),
(16, 'Pantalons', NULL, 2),
(17, 'Tee shirts', NULL, 2),
(18, 'Sacs', NULL, 2),
(19, 'Bijoux', NULL, 2),
(20, 'Accessoires', NULL, 2),
(21, 'Masques', NULL, 4),
(22, 'Huile cosmetique', NULL, 4),
(23, 'Gommages', NULL, 4),
(24, 'Savons', NULL, 4),
(25, 'Tonique et eau visage', NULL, 4),
(26, 'Shampooing', NULL, 4),
(27, 'Boite cadeau', NULL, 4),
(28, 'Huiles alimentaires', NULL, 3),
(29, 'Amlou', NULL, 3),
(30, 'Thé', NULL, 3),
(31, 'Épices', NULL, 3),
(32, 'Miel', NULL, 3),
(33, 'Fruits secs', NULL, 3),
(34, 'Conserves', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `dateNais` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fk_ville` int(255) NOT NULL,
  `fk_image` int(11) DEFAULT NULL,
  `fk_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_data`
--

INSERT INTO `users_data` (`id`, `nom`, `prenom`, `genre`, `dateNais`, `adresse`, `tel`, `fk_ville`, `fk_image`, `fk_account`) VALUES
(1, 'makkaoui', 'khadija', 'femme', '2000-09-06', 'marrakech N°123 JJ', '062333232', 103, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `fk_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `fk_region`) VALUES
(1, 'Aïn Harrouda', 6),
(2, 'Ben Yakhlef', 6),
(3, 'Bouskoura', 6),
(4, 'Casablanca', 6),
(5, 'Médiouna', 6),
(6, 'Mohammadia', 6),
(7, 'Tit Mellil', 6),
(8, 'Ben Yakhlef', 6),
(9, 'Bejaâd', 5),
(10, 'Ben Ahmed', 6),
(11, 'Benslimane', 6),
(12, 'Berrechid', 6),
(13, 'Boujniba', 5),
(14, 'Boulanouare', 5),
(15, 'Bouznika', 6),
(16, 'Deroua', 6),
(17, 'El Borouj', 6),
(18, 'El Gara', 6),
(19, 'Guisser', 6),
(20, 'Hattane', 5),
(21, 'Khouribga', 5),
(22, 'Loulad', 6),
(23, 'Oued Zem', 5),
(24, 'Oulad Abbou', 6),
(25, 'Oulad H\'Riz Sahel', 6),
(26, 'Oulad M\'rah', 6),
(27, 'Oulad Saïd', 6),
(28, 'Oulad Sidi Ben Daoud', 6),
(29, 'Ras El Aïn', 6),
(30, 'Settat', 6),
(31, 'Sidi Rahhal Chataï', 6),
(32, 'Soualem', 6),
(33, 'Azemmour', 6),
(34, 'Bir Jdid', 6),
(35, 'Bouguedra', 7),
(36, 'Echemmaia', 7),
(37, 'El Jadida', 6),
(38, 'Hrara', 7),
(39, 'Ighoud', 7),
(40, 'Jamâat Shaim', 7),
(41, 'Jorf Lasfar', 6),
(42, 'Khemis Zemamra', 6),
(43, 'Laaounate', 6),
(44, 'Moulay Abdallah', 6),
(45, 'Oualidia', 6),
(46, 'Oulad Amrane', 6),
(47, 'Oulad Frej', 6),
(48, 'Oulad Ghadbane', 6),
(49, 'Safi', 7),
(50, 'Sebt El Maârif', 6),
(51, 'Sebt Gzoula', 7),
(52, 'Sidi Ahmed', 7),
(53, 'Sidi Ali Ban Hamdouche', 6),
(54, 'Sidi Bennour', 6),
(55, 'Sidi Bouzid', 6),
(56, 'Sidi Smaïl', 6),
(57, 'Youssoufia', 7),
(58, 'Fès', 3),
(59, 'Aïn Cheggag', 3),
(60, 'Bhalil', 3),
(61, 'Boulemane', 3),
(62, 'El Menzel', 3),
(63, 'Guigou', 3),
(64, 'Imouzzer Kandar', 3),
(65, 'Imouzzer Marmoucha', 3),
(66, 'Missour', 3),
(67, 'Moulay Yaâcoub', 3),
(68, 'Ouled Tayeb', 3),
(69, 'Outat El Haj', 3),
(70, 'Ribate El Kheir', 3),
(71, 'Séfrou', 3),
(72, 'Skhinate', 3),
(73, 'Tafajight', 3),
(74, 'Arbaoua', 4),
(75, 'Aïn Dorij', 1),
(76, 'Dar Gueddari', 4),
(77, 'Had Kourt', 4),
(78, 'Jorf El Melha', 4),
(79, 'Kénitra', 4),
(80, 'Khenichet', 4),
(81, 'Lalla Mimouna', 4),
(82, 'Mechra Bel Ksiri', 4),
(83, 'Mehdia', 4),
(84, 'Moulay Bousselham', 4),
(85, 'Sidi Allal Tazi', 4),
(86, 'Sidi Kacem', 4),
(87, 'Sidi Slimane', 4),
(88, 'Sidi Taibi', 4),
(89, 'Sidi Yahya El Gharb', 4),
(90, 'Souk El Arbaa', 4),
(91, 'Akka', 9),
(92, 'Assa', 10),
(93, 'Bouizakarne', 10),
(94, 'El Ouatia', 10),
(95, 'Es-Semara', 11),
(96, 'Fam El Hisn', 9),
(97, 'Foum Zguid', 9),
(98, 'Guelmim', 10),
(99, 'Taghjijt', 10),
(100, 'Tan-Tan', 10),
(101, 'Tata', 9),
(102, 'Zag', 10),
(103, 'Marrakech', 7),
(104, 'Ait Daoud', 7),
(115, 'Amizmiz', 7),
(116, 'Assahrij', 7),
(117, 'Aït Ourir', 7),
(118, 'Ben Guerir', 7),
(119, 'Chichaoua', 7),
(120, 'El Hanchane', 7),
(121, 'El Kelaâ des Sraghna', 7),
(122, 'Essaouira', 7),
(123, 'Fraïta', 7),
(124, 'Ghmate', 7),
(125, 'Ighounane', 8),
(126, 'Imintanoute', 7),
(127, 'Kattara', 7),
(128, 'Lalla Takerkoust', 7),
(129, 'Loudaya', 7),
(130, 'Lâattaouia', 7),
(131, 'Moulay Brahim', 7),
(132, 'Mzouda', 7),
(133, 'Ounagha', 7),
(134, 'Sid L\'Mokhtar', 7),
(135, 'Sid Zouin', 7),
(136, 'Sidi Abdallah Ghiat', 7),
(137, 'Sidi Bou Othmane', 7),
(138, 'Sidi Rahhal', 7),
(139, 'Skhour Rehamna', 7),
(140, 'Smimou', 7),
(141, 'Tafetachte', 7),
(142, 'Tahannaout', 7),
(143, 'Talmest', 7),
(144, 'Tamallalt', 7),
(145, 'Tamanar', 7),
(146, 'Tamansourt', 7),
(147, 'Tameslouht', 7),
(148, 'Tanalt', 9),
(149, 'Zeubelemok', 7),
(150, 'Meknès‎', 3),
(151, 'Khénifra', 5),
(152, 'Agourai', 3),
(153, 'Ain Taoujdate', 3),
(154, 'MyAliCherif', 8),
(155, 'Rissani', 8),
(156, 'Amalou Ighriben', 5),
(157, 'Aoufous', 8),
(158, 'Arfoud', 8),
(159, 'Azrou', 3),
(160, 'Aïn Jemaa', 3),
(161, 'Aïn Karma', 3),
(162, 'Aïn Leuh', 3),
(163, 'Aït Boubidmane', 3),
(164, 'Aït Ishaq', 5),
(165, 'Boudnib', 8),
(166, 'Boufakrane', 3),
(167, 'Boumia', 8),
(168, 'El Hajeb', 3),
(169, 'Elkbab', 5),
(170, 'Er-Rich', 5),
(171, 'Errachidia', 8),
(172, 'Gardmit', 8),
(173, 'Goulmima', 8),
(174, 'Gourrama', 8),
(175, 'Had Bouhssoussen', 5),
(176, 'Haj Kaddour', 3),
(177, 'Ifrane', 3),
(178, 'Itzer', 8),
(179, 'Jorf', 8),
(180, 'Kehf Nsour', 5),
(181, 'Kerrouchen', 5),
(182, 'M\'haya', 3),
(183, 'M\'rirt', 5),
(184, 'Midelt', 8),
(185, 'Moulay Ali Cherif', 8),
(186, 'Moulay Bouazza', 5),
(187, 'Moulay Idriss Zerhoun', 3),
(188, 'Moussaoua', 3),
(189, 'N\'Zalat Bni Amar', 3),
(190, 'Ouaoumana', 5),
(191, 'Oued Ifrane', 3),
(192, 'Sabaa Aiyoun', 3),
(193, 'Sebt Jahjouh', 3),
(194, 'Sidi Addi', 3),
(195, 'Tichoute', 8),
(196, 'Tighassaline', 5),
(197, 'Tighza', 5),
(198, 'Timahdite', 3),
(199, 'Tinejdad', 8),
(200, 'Tizguite', 3),
(201, 'Toulal', 3),
(202, 'Tounfite', 8),
(203, 'Zaouia d\'Ifrane', 3),
(204, 'Zaïda', 8),
(205, 'Ahfir', 2),
(206, 'Aklim', 2),
(207, 'Al Aroui', 2),
(208, 'Aïn Bni Mathar', 2),
(209, 'Aïn Erreggada', 2),
(210, 'Ben Taïeb', 2),
(211, 'Berkane', 2),
(212, 'Bni Ansar', 2),
(213, 'Bni Chiker', 2),
(214, 'Bni Drar', 2),
(215, 'Bni Tadjite', 2),
(216, 'Bouanane', 2),
(217, 'Bouarfa', 2),
(218, 'Bouhdila', 2),
(219, 'Dar El Kebdani', 2),
(220, 'Debdou', 2),
(221, 'Douar Kannine', 2),
(222, 'Driouch', 2),
(223, 'El Aïoun Sidi Mellouk', 2),
(224, 'Farkhana', 2),
(225, 'Figuig', 2),
(226, 'Ihddaden', 2),
(227, 'Jaâdar', 2),
(228, 'Jerada', 2),
(229, 'Kariat Arekmane', 2),
(230, 'Kassita', 2),
(231, 'Kerouna', 2),
(232, 'Laâtamna', 2),
(233, 'Madagh', 2),
(234, 'Midar', 2),
(235, 'Nador', 2),
(236, 'Naima', 2),
(237, 'Oued Heimer', 2),
(238, 'Oujda', 2),
(239, 'Ras El Ma', 2),
(240, 'Saïdia', 2),
(241, 'Selouane', 2),
(242, 'Sidi Boubker', 2),
(243, 'Sidi Slimane Echcharaa', 2),
(244, 'Talsint', 2),
(245, 'Taourirt', 2),
(246, 'Tendrara', 2),
(247, 'Tiztoutine', 2),
(248, 'Touima', 2),
(249, 'Touissit', 2),
(250, 'Zaïo', 2),
(251, 'Zeghanghane', 2),
(252, 'Rabat', 4),
(253, 'Salé', 4),
(254, 'Ain El Aouda', 4),
(255, 'Harhoura', 4),
(256, 'Khémisset', 4),
(257, 'Oulmès', 4),
(258, 'Rommani', 4),
(259, 'Sidi Allal El Bahraoui', 4),
(260, 'Sidi Bouknadel', 4),
(261, 'Skhirate', 4),
(262, 'Tamesna', 4),
(263, 'Témara', 4),
(264, 'Tiddas', 4),
(265, 'Tiflet', 4),
(266, 'Touarga', 4),
(267, 'Agadir', 9),
(268, 'Agdz', 8),
(269, 'Agni Izimmer', 9),
(270, 'Aït Melloul', 9),
(271, 'Alnif', 8),
(272, 'Anzi', 9),
(273, 'Aoulouz', 9),
(274, 'Aourir', 9),
(275, 'Arazane', 9),
(276, 'Aït Baha', 9),
(277, 'Aït Iaâza', 9),
(278, 'Aït Yalla', 8),
(279, 'Ben Sergao', 9),
(280, 'Biougra', 9),
(281, 'Boumalne-Dadès', 8),
(282, 'Dcheira El Jihadia', 9),
(283, 'Drargua', 9),
(284, 'El Guerdane', 9),
(285, 'Harte Lyamine', 8),
(286, 'Ida Ougnidif', 9),
(287, 'Ifri', 8),
(288, 'Igdamen', 9),
(289, 'Ighil n\'Oumgoun', 8),
(290, 'Imassine', 8),
(291, 'Inezgane', 9),
(292, 'Irherm', 9),
(293, 'Kelaat-M\'Gouna', 8),
(294, 'Lakhsas', 9),
(295, 'Lakhsass', 9),
(296, 'Lqliâa', 9),
(297, 'M\'semrir', 8),
(298, 'Massa (Maroc)', 9),
(299, 'Megousse', 9),
(300, 'Ouarzazate', 8),
(301, 'Oulad Berhil', 9),
(302, 'Oulad Teïma', 9),
(303, 'Sarghine', 8),
(304, 'Sidi Ifni', 10),
(305, 'Skoura', 8),
(306, 'Tabounte', 8),
(307, 'Tafraout', 9),
(308, 'Taghzout', 1),
(309, 'Tagzen', 9),
(310, 'Taliouine', 9),
(311, 'Tamegroute', 8),
(312, 'Tamraght', 9),
(313, 'Tanoumrite Nkob Zagora', 8),
(314, 'Taourirt ait zaghar', 8),
(315, 'Taroudannt', 9),
(316, 'Temsia', 9),
(317, 'Tifnit', 9),
(318, 'Tisgdal', 9),
(319, 'Tiznit', 9),
(320, 'Toundoute', 8),
(321, 'Zagora', 8),
(322, 'Afourar', 5),
(323, 'Aghbala', 5),
(324, 'Azilal', 5),
(325, 'Aït Majden', 5),
(326, 'Beni Ayat', 5),
(327, 'Béni Mellal', 5),
(328, 'Bin elouidane', 5),
(329, 'Bradia', 5),
(330, 'Bzou', 5),
(331, 'Dar Oulad Zidouh', 5),
(332, 'Demnate', 5),
(333, 'Dra\'a', 8),
(334, 'El Ksiba', 5),
(335, 'Foum Jamaa', 5),
(336, 'Fquih Ben Salah', 5),
(337, 'Kasba Tadla', 5),
(338, 'Ouaouizeght', 5),
(339, 'Oulad Ayad', 5),
(340, 'Oulad M\'Barek', 5),
(341, 'Oulad Yaich', 5),
(342, 'Sidi Jaber', 5),
(343, 'Souk Sebt Oulad Nemma', 5),
(344, 'Zaouïat Cheikh', 5),
(345, 'Tanger‎', 1),
(346, 'Tétouan‎', 1),
(347, 'Akchour', 1),
(348, 'Assilah', 1),
(349, 'Bab Berred', 1),
(350, 'Bab Taza', 1),
(351, 'Brikcha', 1),
(352, 'Chefchaouen', 1),
(353, 'Dar Bni Karrich', 1),
(354, 'Dar Chaoui', 1),
(355, 'Fnideq', 1),
(356, 'Gueznaia', 1),
(357, 'Jebha', 1),
(358, 'Karia', 3),
(359, 'Khémis Sahel', 1),
(360, 'Ksar El Kébir', 1),
(361, 'Larache', 1),
(362, 'M\'diq', 1),
(363, 'Martil', 1),
(364, 'Moqrisset', 1),
(365, 'Oued Laou', 1),
(366, 'Oued Rmel', 1),
(367, 'Ouazzane', 1),
(368, 'Point Cires', 1),
(369, 'Sidi Lyamani', 1),
(370, 'Sidi Mohamed ben Abdallah el-Raisuni', 1),
(371, 'Zinat', 1),
(372, 'Ajdir', 1),
(373, 'Aknoul', 3),
(374, 'Al Hoceïma‎', 1),
(375, 'Aït Hichem‎', 1),
(376, 'Bni Bouayach‎', 1),
(377, 'Bni Hadifa‎', 1),
(378, 'Ghafsai‎', 3),
(379, 'Guercif‎', 2),
(380, 'Imzouren‎', 1),
(381, 'Inahnahen‎', 1),
(382, 'Issaguen (Ketama)‎', 1),
(383, 'Karia (El Jadida)‎', 6),
(384, 'Karia Ba Mohamed‎', 3),
(385, 'Oued Amlil‎', 3),
(386, 'Oulad Zbair‎', 3),
(387, 'Tahla‎', 3),
(388, 'Tala Tazegwaght‎', 1),
(389, 'Tamassint‎', 1),
(390, 'Taounate‎', 3),
(391, 'Targuist‎', 1),
(392, 'Taza‎', 3),
(393, 'Taïnaste‎', 3),
(394, 'Thar Es-Souk‎', 3),
(395, 'Tissa‎', 3),
(396, 'Tizi Ouasli‎', 3),
(397, 'Laayoune‎', 11),
(398, 'El Marsa‎', 11),
(399, 'Tarfaya‎', 11),
(400, 'Boujdour‎', 11),
(401, 'Awsard', 12),
(402, 'Oued-Eddahab', 12),
(403, 'Stehat', 1),
(404, 'Aït Attab', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_user` (`email`),
  ADD KEY `fk_role` (`fk_role`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`fk_produit`),
  ADD KEY `fk_client` (`fk_client`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account` (`fk_account`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`fk_produit`),
  ADD KEY `fk_client` (`fk_client`);

--
-- Index pour la table `fabriquants`
--
ALTER TABLE `fabriquants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CIN` (`CIN`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`fk_produit`),
  ADD KEY `fk_client` (`fk_client`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s_categorie` (`fk_s_categorie`),
  ADD KEY `fk_image` (`fk_image`),
  ADD KEY `fk_fabriquant` (`fk_fabriquant`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image` (`fk_image`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souhaits`
--
ALTER TABLE `souhaits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`fk_produit`),
  ADD KEY `fk_client` (`fk_client`);

--
-- Index pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie` (`fk_categorie`);

--
-- Index pour la table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image` (`fk_image`),
  ADD KEY `fk_account` (`fk_account`),
  ADD KEY `fk_ville` (`fk_ville`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_region` (`fk_region`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `fabriquants`
--
ALTER TABLE `fabriquants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `souhaits`
--
ALTER TABLE `souhaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`fk_role`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`fk_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`fk_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`fk_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`fk_account`) REFERENCES `accounts` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`fk_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`fk_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`fk_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `paniers_ibfk_2` FOREIGN KEY (`fk_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`fk_s_categorie`) REFERENCES `sous_categories` (`id`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`fk_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`fk_fabriquant`) REFERENCES `fabriquants` (`id`);

--
-- Contraintes pour la table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`fk_image`) REFERENCES `images` (`id`);

--
-- Contraintes pour la table `souhaits`
--
ALTER TABLE `souhaits`
  ADD CONSTRAINT `souhaits_ibfk_1` FOREIGN KEY (`fk_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `souhaits_ibfk_2` FOREIGN KEY (`fk_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `sous_categories_ibfk_1` FOREIGN KEY (`fk_categorie`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `users_data_ibfk_1` FOREIGN KEY (`fk_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `users_data_ibfk_2` FOREIGN KEY (`fk_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `users_data_ibfk_3` FOREIGN KEY (`fk_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `users_data_ibfk_4` FOREIGN KEY (`fk_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `users_data_ibfk_5` FOREIGN KEY (`fk_ville`) REFERENCES `villes` (`id`);

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`fk_region`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
