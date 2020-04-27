-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 avr. 2020 à 22:50
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `events`
--

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL,
  `banned` enum('yes','no') NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_country` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `banned`, `name`, `id_country`) VALUES
(1, 'no', 'Tunis', 1),
(2, 'no', 'Monastir', 1),
(3, 'no', 'Sousse', 1),
(4, 'no', 'Nabel', 1),
(5, 'no', 'Kairouan', 1),
(6, 'no', 'Mahdiya', 1),
(7, 'no', 'Paris', 2),
(8, 'no', 'Toulouse ', 2),
(9, 'no', 'Nice', 2),
(10, 'no', 'Strasburg', 2),
(11, 'no', 'Ariana', 1),
(12, 'no', 'Sfax', 1),
(13, 'no', 'Brest', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_events` int(10) NOT NULL,
  `content` text NOT NULL,
  `validation` enum('yes','no') NOT NULL DEFAULT 'no',
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_events`, `content`, `validation`, `uploaded_on`) VALUES
(1, 1, 2, 'Agréable événements,  Merci Beaucoup ', 'yes', '2019-06-10 22:10:53'),
(2, 1, 3, 'ggjhkl', 'yes', '2019-06-15 13:40:16'),
(3, 1, 3, 'aaa', 'yes', '2019-06-19 13:40:53'),
(5, 5, 1, 'Agréable évènements, merci beaucoup', 'yes', '2019-06-23 14:05:52');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `banned` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `name`, `banned`) VALUES
(1, 'Tunisie', 'no'),
(2, 'France ', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(225) NOT NULL,
  `id_user` int(225) NOT NULL,
  `id_events` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_user`, `id_events`) VALUES
(6, 9, 1),
(7, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `id_creator` int(10) NOT NULL,
  `validation` enum('yes','no') NOT NULL,
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `id_type` int(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `sponsors` text,
  `id_country` int(4) NOT NULL,
  `id_city` int(10) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `localisation` text,
  `titre` text NOT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `nbr_jaime` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `id_creator`, `validation`, `banned`, `id_type`, `start_date`, `end_date`, `description`, `sponsors`, `id_country`, `id_city`, `zip`, `localisation`, `titre`, `alias`, `nbr_jaime`) VALUES
(1, 1, 'yes', 'no', 1, '2020-02-23', '2020-02-23', 'The Carthage Race Marathon International 6ème édition 2020. Pour plus d\'information, vous Pouvez visiter ce lien:  https://www.sportsmedevents.tn/cshevents/the-carthage-race-marathon-international-6eme-edition-2020/', 'Sports Med Event\'s Tunisia', 1, 11, '2016', 'Théâtre de Carthage, Carthage', 'Carthage Race', 'The-Carthage-Race-Marathon-International-6eme-edition-2020', 7),
(2, 1, 'yes', 'no', 1, '2020-04-05', '2020-04-05', 'Tunisia Triathlon Series – Etape SFAX. Pour plus d\'information, vous Pouvez visiter ce lien:  https://www.sportsmedevents.tn/cshevents/tunisia-triathlon-series-etape-sfax/', 'Sports Med Event\'s Tunisia', 1, 12, '3069', 'Sfax', 'Tunisia Triathlon Series', 'Tunisia-Triathlon-Series', 2),
(3, 1, 'yes', 'no', 4, '2019-12-17', '2019-12-28', 'Avec “Mûsîqât”, coorganisé avec le Centre des Musiques Arabes et Méditerranéennes, Scoop Organisation prouve que l’association du public et du privé, guidée par l’ambition artistique et le respect du public, des artistes et des sponsors peut être une réussite. Audace et rigueur sont les maîtres mots de la structure qui n’a de cesse de faire découvrir des artistes rares mais aussi d\'amener à son public des légendes de la scène, d\'innover, d\'être à l\'afflût des nouvelles expressions d’un monde en mouvement, mais aussi de stimuler et de soutenir la vie culturelle locale…. ', '', 1, 4, '5020', 'Palais Ennejma Ezzahra', ' Mûsîqât', '-Musiqat', 5),
(4, 9, 'yes', 'no', 5, '2019-07-18', '2019-07-21', 'Créé pour la première fois en 1992, le festival des vieilles Charrues est devenu le plus grand festival de France. Il attire chaque année plus de 200 000 personnes, en raison de ses nombreuses scènes et artistes qui s’y produisent. Lors de la prochaine édition du festival se produiront notamment : Ben Harper, Black Eyed Peas, Booba, Christine and the Queens, David Guetta, Iggy Pop, Martin Garrix, The Chainsmokers, Zazie et bien d’autres artistes encore !    Prix du billet pour le festival : 44€ la journée (pass jeudi et vendredi uniquement), 2 jours au choix : 88€. Note : Les pass 1 jour samedi ; 1 jour dimanche ; 4 jours et 3 jours sont épuisés.', '', 2, 7, '29270', 'Carhaix, dans le Finistère', 'Festival des vieilles charrues', 'Festival-des-vieilles-charrues', 2),
(5, 1, 'no', 'no', 1, '5615-02-04', '0321-04-05', 'hkjbkn;,', 'eakjfhlkn', 1, 1, 'gh ;:vhbjknl,', 'cgjjvhjbkn;', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) NOT NULL,
  `id_events` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`id`, `id_events`, `id_user`) VALUES
(1, 2, 5),
(2, 3, 5),
(3, 4, 5),
(8, 1, 1),
(10, 1, 4),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id` int(100) NOT NULL,
  `file_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '''1=Active, 0=Inactive''',
  `id_events` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `file_name`, `uploaded_on`, `status`, `id_events`) VALUES
(1, 'carthage_race.jpg', '2019-06-10 16:15:55', '1', 1),
(2, 'carthage_race1.jpg', '2019-06-10 16:15:55', '1', 1),
(3, 'carthage_race2.jpg', '2019-06-10 16:15:55', '1', 1),
(4, 'carthage_race3.jpg', '2019-06-10 16:15:56', '1', 1),
(5, 'sfaxevents.jpg', '2019-06-10 17:05:32', '1', 2),
(6, 'sfaxevents1.jpg', '2019-06-10 17:05:32', '1', 2),
(7, 'sfaxevents2.jpeg', '2019-06-10 17:05:32', '1', 2),
(8, 'sfaxevents3.jpg', '2019-06-10 17:05:32', '1', 2),
(9, 'musicat.jpg', '2019-06-10 17:34:08', '1', 3),
(10, 'musicat1.jpg', '2019-06-10 17:34:08', '1', 3),
(11, 'musicat2.jpg', '2019-06-10 17:34:08', '1', 3),
(12, 'festivale.jpg', '2019-06-10 18:03:58', '1', 4),
(13, 'festivale1.jpg', '2019-06-10 18:03:58', '1', 4),
(14, 'festivale2.jpg', '2019-06-10 18:03:58', '1', 4);

-- --------------------------------------------------------

--
-- Structure de la table `file_type_events`
--

CREATE TABLE `file_type_events` (
  `id` int(100) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '''1=Active, 0=Inactive''',
  `id_type_events` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file_type_events`
--

INSERT INTO `file_type_events` (`id`, `file_name`, `uploaded_on`, `status`, `id_type_events`) VALUES
(1, 'musicale.jpg', '2019-06-10 14:52:55', '1', 4),
(2, 'educatif.jpg', '2019-06-10 14:55:35', '1', 2),
(3, 'sportive.jpg', '2019-06-10 14:57:50', '1', 1),
(4, 'scientifique.jpeg', '2019-06-10 15:02:48', '1', 3),
(5, 'festivale.jpg', '2019-06-10 15:04:26', '1', 5),
(6, 'Autre.png', '2019-06-10 15:08:23', '1', 15),
(7, 'Alimentation.jpg', '2019-06-10 15:10:43', '1', 7),
(8, 'Artisanat.jpg', '2019-06-10 15:18:15', '1', 6),
(9, 'agriculture.jpg', '2019-06-10 15:18:32', '1', 8),
(10, 'interesant.jpg', '2019-06-20 15:08:03', '1', 16);

-- --------------------------------------------------------

--
-- Structure de la table `file_user`
--

CREATE TABLE `file_user` (
  `id` int(225) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '''1=Active, 0=Inactive'' ',
  `id_user` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file_user`
--

INSERT INTO `file_user` (`id`, `file_name`, `uploaded_on`, `status`, `id_user`) VALUES
(3, '1.jpg', '2019-06-10 14:21:38', '1', 3),
(4, '2.jpg', '2019-06-10 14:21:58', '1', 2),
(5, '5.jpg', '2019-06-10 14:22:16', '1', 1),
(7, '10.jpg', '2019-06-10 14:25:59', '1', 4),
(8, '4.jpg', '2019-06-10 14:27:28', '1', 5),
(9, '6.jpg', '2019-06-10 14:28:46', '1', 6),
(10, '8.jpg', '2019-06-10 14:44:38', '1', 7),
(11, '11.jpg', '2019-06-10 17:25:00', '1', 8),
(12, '9.jpg', '2019-06-10 17:55:00', '1', 9),
(13, 'crea.png', '2019-06-19 13:41:43', '1', 1),
(14, 'interesant.jpg', '2019-06-20 16:17:57', '1', 1),
(15, 'crea1.png', '2019-06-21 20:05:23', '1', 1),
(16, '2.PNG', '2019-11-21 16:35:21', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_events` int(10) NOT NULL,
  `likes` enum('no','like','dislike') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_events`, `likes`) VALUES
(3, 8, 3, 'no'),
(5, 9, 2, 'no'),
(9, 1, 3, 'no'),
(12, 7, 4, 'no'),
(13, 5, 1, 'no'),
(15, 4, 1, 'no'),
(17, 1, 1, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(225) NOT NULL,
  `id_events` int(225) NOT NULL,
  `id_user` int(225) NOT NULL,
  `nb_star` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `id_events`, `id_user`, `nb_star`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 4),
(3, 4, 8, 5),
(4, 2, 9, 5),
(5, 3, 1, 5),
(6, 1, 5, 4),
(7, 1, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `organizer_profile`
--

CREATE TABLE `organizer_profile` (
  `id` int(10) NOT NULL,
  `organisation_name` text,
  `description` text,
  `adress` text,
  `id_country` int(4) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone1` varchar(25) DEFAULT NULL,
  `phone2` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `facebook` text,
  `gendre` enum('homme','femme') DEFAULT 'homme',
  `id_city` int(4) DEFAULT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organizer_profile`
--

INSERT INTO `organizer_profile` (`id`, `organisation_name`, `description`, `adress`, `id_country`, `zip`, `phone1`, `phone2`, `fax`, `facebook`, `gendre`, `id_city`, `id_user`) VALUES
(1, '', '', 'rue Okba Ibnou Nafaa, Zaouiet Kontech', 1, '5028', '+21650858124', '+21650858124', '', 'https://www.facebook.com/daliali.sahliano', 'homme', 1, 1),
(2, 'Sports Med Event\'s Tunisia (SME)', '', '15,RUE DES FLEURS CITE DES SAPINS', 1, '3120', '+21626945046', '+21626945046', '26945046', 'https://www.facebook.com', 'femme', 1, 7),
(3, 'Scoop Organisation', 'admin.events@gmail.com', 'Avenue Habib Bourguiba, Radès, Tunisia', 1, '2098', '+216 48463684', '+216 48463684', '+216 73497675', 'https://www.facebook.com', 'homme', 1, 8),
(4, '', '', '48-50 Rue Saint-Jacques', 2, '3120', '+33 1 23 45 67 89', '+33 1 23 45 67 89', '', 'https://www.facebook.com', 'femme', 7, 9);

-- --------------------------------------------------------

--
-- Structure de la table `other_services`
--

CREATE TABLE `other_services` (
  `id` int(10) NOT NULL,
  `id_events` int(10) NOT NULL,
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `id_city` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `nature` text NOT NULL,
  `description` text NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(225) NOT NULL,
  `id_user` int(225) NOT NULL,
  `id_events` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_user`, `id_events`) VALUES
(4, 4, 2),
(8, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_events`
--

CREATE TABLE `type_events` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `alias` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_events`
--

INSERT INTO `type_events` (`id`, `name`, `banned`, `alias`) VALUES
(1, 'Sportif', 'no', 'Sportif'),
(2, 'Éducatif', 'no', 'Educatif'),
(3, 'Scientifique', 'no', 'Scientifique'),
(4, 'Musicale ', 'no', 'Musicale'),
(5, 'Festivale', 'no', 'Festivale'),
(6, 'Artisanat', 'no', 'Artisanat'),
(7, 'Alimentation', 'no', 'Alimentation'),
(8, 'Agriculture', 'no', 'Agriculture'),
(15, 'Autre', 'no', 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `role` enum('admin','organizer','user') NOT NULL DEFAULT 'user',
  `validation` enum('yes','no') NOT NULL DEFAULT 'no',
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `alias` varchar(225) NOT NULL,
  `nbr_events` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `role`, `validation`, `email`, `password`, `first_name`, `last_name`, `banned`, `alias`, `nbr_events`) VALUES
(1, 'admin', 'yes', 'admin.events@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Dali      ', 'Ali', 'no', 'Dali-------Ali', 1),
(2, 'user', 'yes', 'daliali54.isitcom@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'dali       ', 'dali', 'no', 'dali--------dali', 0),
(3, 'user', 'yes', 'Marwen.chtioui@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Marwen   ', 'Chtioui', 'no', 'Marwen----Chtioui', 0),
(4, 'user', 'yes', 'benmouhamed.ahmed@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Ben Mouhamed  ', 'Ahmed', 'no', 'Ben-Mouhamed---Ahmed', 0),
(5, 'user', 'yes', 'SirineDaly@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Daly', 'Sirine', 'no', 'Daly-Sirine', 0),
(6, 'user', 'yes', 'Alexandra@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'fetch', 'Alexandra', 'no', 'fetch-Alexandra', 0),
(7, 'organizer', 'yes', 'Nour.events@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'ben Ahmed', 'Nour', 'no', 'ben-Ahmed-Nour', 2),
(8, 'organizer', 'yes', 'benothmane.events@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Ben Othmane', 'Youssef', 'no', 'Ben-Othmane-Youssef', 1),
(9, 'organizer', 'yes', 'Martin.events@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Legrand  ', 'Martine', 'no', 'Legrand---Martine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `gendre` enum('homme','femme') DEFAULT 'homme',
  `adress` text,
  `zip` varchar(10) DEFAULT NULL,
  `id_country` int(4) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `id_city` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_profile`
--

INSERT INTO `user_profile` (`id`, `id_user`, `gendre`, `adress`, `zip`, `id_country`, `phone`, `id_city`) VALUES
(0, 3, 'homme', 'rue Okba Ibnou Nafaa, Zaouiet Kontech', '50281', 1, '+21650858124', 3),
(1, 4, 'homme', 'rue Okba Ibnou Nafaa, Zaouiet Kontech', '5028', 1, '+21650884793', 4),
(4, 5, 'femme', 'rue Okba Ibnou Nafaa, Zaouiet Kontech', '5028', 1, '+21658465365', 2),
(5, 6, 'femme', '15,RUE DES FLEURS CITE DES SAPINS', '3120', 2, '+21626945046', 7),
(6, 2, 'femme', 'Rue habib bourgiba', '5843', 1, '+216 58792014', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_event` (`id_events`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_creator` (`id_creator`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_country` (`id_country`);

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_events` (`id_events`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_events` (`id_events`);

--
-- Index pour la table `file_type_events`
--
ALTER TABLE `file_type_events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `file_user`
--
ALTER TABLE `file_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_events` (`id_events`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_events`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `organizer_profile`
--
ALTER TABLE `organizer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `other_services`
--
ALTER TABLE `other_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_events` (`id_events`),
  ADD KEY `id_ville` (`id_city`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_events`
--
ALTER TABLE `type_events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_country` (`id_country`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `file_type_events`
--
ALTER TABLE `file_type_events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `file_user`
--
ALTER TABLE `file_user`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `organizer_profile`
--
ALTER TABLE `organizer_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `other_services`
--
ALTER TABLE `other_services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_events`
--
ALTER TABLE `type_events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
