-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 10 Avril 2016 à 18:18
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gpi`
--

-- --------------------------------------------------------

--
-- Structure de la table `cm`
--

CREATE TABLE `cm` (
  `id` int(11) NOT NULL,
  `constructeur_id` int(11) NOT NULL,
  `socket_id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cm`
--

INSERT INTO `cm` (`id`, `constructeur_id`, `socket_id`, `nom`) VALUES
(1, 7, 9, 'P5GD2-X'),
(2, 6, 5, '970 AS');

-- --------------------------------------------------------

--
-- Structure de la table `constructeur`
--

CREATE TABLE `constructeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `constructeur`
--

INSERT INTO `constructeur` (`id`, `nom`) VALUES
(1, 'Intel'),
(2, 'AMD'),
(3, 'HP'),
(4, 'Lenovo'),
(5, 'Acer'),
(6, 'Dell'),
(7, 'Asus'),
(8, 'Gigabyte'),
(9, 'Samsung');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id` int(11) NOT NULL,
  `type_materiel_id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`id`, `type_materiel_id`, `salle_id`, `numero`) VALUES
(1, 1, 6, 15024556),
(2, 9, 1, 1542),
(3, 9, 1, 1442),
(4, 10, 1, 100542),
(5, 10, 1, 100542),
(6, 1, 2, 1002542),
(7, 1, 2, 1002543),
(8, 1, 5, 1002545),
(9, 1, 2, 1002546),
(10, 1, 2, 1002547),
(11, 1, 2, 1002548),
(14, 1, 2, 1002551),
(16, 1, 3, 1002553),
(19, 11, 4, 45425663),
(20, 11, 4, 45425662),
(21, 11, 7, 454256667),
(22, 11, 4, 454256667),
(23, 11, 4, 454256666),
(24, 11, 4, 454256670),
(26, 11, 5, 454256675),
(27, 11, 5, 454256676),
(28, 11, 6, 454256677),
(31, 12, 3, 45452455),
(32, 12, 1, 457846),
(33, 7, 3, 456545632),
(34, 3, 1, 45452455),
(35, 4, 1, 457846),
(36, 6, 1, 7272),
(37, 12, 6, 18575561);

-- --------------------------------------------------------

--
-- Structure de la table `processeur`
--

CREATE TABLE `processeur` (
  `id` int(11) NOT NULL,
  `constructeur_id` int(11) NOT NULL,
  `socket_id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cadence` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `processeur`
--

INSERT INTO `processeur` (`id`, `constructeur_id`, `socket_id`, `nom`, `cadence`) VALUES
(1, 1, 10, 'I3 2100T', 2.5),
(2, 1, 10, 'I3 2120T', 2.6),
(3, 2, 5, 'X4 965', 3.4),
(4, 2, 5, 'X4 955', 3.2),
(5, 1, 10, 'i3 2130', 3.4),
(6, 2, 5, 'X4 640', 3);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`) VALUES
(1, 'Sirius'),
(2, 'Proxima Centauri'),
(3, 'Andromède'),
(4, 'Voix Lactee'),
(5, 'Orion'),
(6, 'Vega'),
(7, 'Altair'),
(8, 'Pollux'),
(9, 'Magellan');

-- --------------------------------------------------------

--
-- Structure de la table `socket`
--

CREATE TABLE `socket` (
  `id` int(11) NOT NULL,
  `constructeur_id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `socket`
--

INSERT INTO `socket` (`id`, `constructeur_id`, `nom`) VALUES
(5, 2, 'AM3'),
(6, 2, 'AM2'),
(7, 1, 'LGA1366'),
(8, 1, 'LGA1156'),
(9, 1, 'LGA775'),
(10, 1, 'LGA1155 '),
(11, 1, 'LGA1150 '),
(12, 2, 'AM3+'),
(45, 2, 'FM2'),
(46, 2, 'FM2+');

-- --------------------------------------------------------

--
-- Structure de la table `type_materiel`
--

CREATE TABLE `type_materiel` (
  `id` int(11) NOT NULL,
  `constructeur_id` int(11) NOT NULL,
  `processeur_id` int(11) DEFAULT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `materiel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vitesse` int(11) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `disque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `type_materiel`
--

INSERT INTO `type_materiel` (`id`, `constructeur_id`, `processeur_id`, `cm_id`, `materiel`, `type`, `nom`, `vitesse`, `port`, `ram`, `disque`) VALUES
(1, 3, 1, 1, 'Pc', 'Fixe', 'az77 see', NULL, NULL, 4, 500),
(2, 5, NULL, NULL, 'Tactil', 'Tablette', 'Iconia One', NULL, NULL, NULL, NULL),
(3, 9, NULL, NULL, 'Tactil', 'Tablette', 'Galaxy Tab s2', NULL, NULL, NULL, NULL),
(4, 9, NULL, NULL, 'Tactil', 'Tablette', 'Galaxy Tab S1', NULL, NULL, NULL, NULL),
(5, 9, NULL, NULL, 'Tactil', 'Smartphone', 'Galaxy S6 Edge', NULL, NULL, NULL, NULL),
(6, 7, NULL, NULL, 'Tactil', 'Smartphone', 'ZE551ML 5.5', NULL, NULL, NULL, NULL),
(7, 3, NULL, NULL, 'Reseau', 'Routeur', 'amx48g', 104, 48, NULL, NULL),
(8, 3, NULL, NULL, 'Reseau', 'Routeur', 'amx24g', 56, 24, NULL, NULL),
(9, 3, NULL, NULL, 'Peripherique', 'Souris', 'mx7', NULL, NULL, NULL, NULL),
(10, 4, NULL, NULL, 'Peripherique', 'Ecran', 'ProLite e2483HS', NULL, NULL, NULL, NULL),
(11, 7, 4, 2, 'Pc', 'Fixe', 'G11CD-FR021T', NULL, NULL, 8, 1000),
(12, 8, NULL, NULL, 'reseau', 'Switch', 'Dlink RX16', NULL, 16, NULL, NULL),
(13, 6, 2, 1, 'pc', 'Portable', 'HP W10 15-ac161nf', NULL, NULL, 8, 800);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@yahoo.fr', 'admin@yahoo.fr', 1, 'eklgwqml5dwgcog0w04sg8k8w8o0gkk', 'MCW+ScHfc+mhF59P6ERVRPceu7QNjoo9XI7wI8qYAsYgnvZXdPBnYa1a79+FjnVFLArNpH263kX62J37VInkFQ==', '2016-04-10 11:57:03', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:5:"ADMIN";}', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3C0A377E8815B605` (`constructeur_id`),
  ADD KEY `IDX_3C0A377ED20E239C` (`socket_id`);

--
-- Index pour la table `constructeur`
--
ALTER TABLE `constructeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_18D2B0915D91DD3E` (`type_materiel_id`),
  ADD KEY `IDX_18D2B091DC304035` (`salle_id`);

--
-- Index pour la table `processeur`
--
ALTER TABLE `processeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_459D7D3E8815B605` (`constructeur_id`),
  ADD KEY `IDX_459D7D3ED20E239C` (`socket_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5E568BB6C6E55B5` (`nom`),
  ADD KEY `IDX_5E568BB8815B605` (`constructeur_id`);

--
-- Index pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D52D976D8815B605` (`constructeur_id`),
  ADD KEY `IDX_D52D976D5C9BE5AD` (`processeur_id`),
  ADD KEY `IDX_D52D976D48FCC97C` (`cm_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cm`
--
ALTER TABLE `cm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `constructeur`
--
ALTER TABLE `constructeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `processeur`
--
ALTER TABLE `processeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `socket`
--
ALTER TABLE `socket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cm`
--
ALTER TABLE `cm`
  ADD CONSTRAINT `FK_3C0A377E8815B605` FOREIGN KEY (`constructeur_id`) REFERENCES `constructeur` (`id`),
  ADD CONSTRAINT `FK_3C0A377ED20E239C` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_18D2B0915D91DD3E` FOREIGN KEY (`type_materiel_id`) REFERENCES `type_materiel` (`id`),
  ADD CONSTRAINT `FK_18D2B091DC304035` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `processeur`
--
ALTER TABLE `processeur`
  ADD CONSTRAINT `FK_459D7D3E8815B605` FOREIGN KEY (`constructeur_id`) REFERENCES `constructeur` (`id`),
  ADD CONSTRAINT `FK_459D7D3ED20E239C` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`);

--
-- Contraintes pour la table `socket`
--
ALTER TABLE `socket`
  ADD CONSTRAINT `FK_5E568BB8815B605` FOREIGN KEY (`constructeur_id`) REFERENCES `constructeur` (`id`);

--
-- Contraintes pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  ADD CONSTRAINT `FK_D52D976D48FCC97C` FOREIGN KEY (`cm_id`) REFERENCES `cm` (`id`),
  ADD CONSTRAINT `FK_D52D976D5C9BE5AD` FOREIGN KEY (`processeur_id`) REFERENCES `processeur` (`id`),
  ADD CONSTRAINT `FK_D52D976D8815B605` FOREIGN KEY (`constructeur_id`) REFERENCES `constructeur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
