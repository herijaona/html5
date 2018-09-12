-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 12 Septembre 2018 à 15:47
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.1.20-1+0~20180725103315.2+stretch~1.gbpd5b650

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `chefdeservice`
--

CREATE TABLE `chefdeservice` (
  `id` int(11) NOT NULL,
  `id_prime` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chefdeservice`
--

INSERT INTO `chefdeservice` (`id`, `id_prime`, `id_users`) VALUES
(2, 250, 1);

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `users_id` int(11) NOT NULL,
  `tuto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `prime`
--

CREATE TABLE `prime` (
  `id` int(11) NOT NULL,
  `users_id` varchar(50) NOT NULL,
  `lot` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `prime`
--

INSERT INTO `prime` (`id`, `users_id`, `lot`, `photo`, `logo`) VALUES
(3, '54', '', 'Galana de Madagascar', 'maxresdefault.jpg'),
(9, '65', '', 'Total', 'maxresdefault.jpg'),
(10, '65', '', 'Galana', 'images.jpeg'),
(11, '65', '', 'JB', 'hobby.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `saisie`
--

CREATE TABLE `saisie` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_prime` int(11) NOT NULL,
  `description` text NOT NULL,
  `temperature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sendmail`
--

CREATE TABLE `sendmail` (
  `id` int(11) NOT NULL,
  `id_prime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sendmail`
--

INSERT INTO `sendmail` (`id`, `id_prime`, `email`, `users_id`) VALUES
(13, '9', 'herijaona3@gmail.com', 65),
(14, '9', 'herijaona3@gmail.com', 65);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `test` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_code` text NOT NULL,
  `access_level` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `test`, `password`, `access_code`, `access_level`, `status`, `created`, `modified`) VALUES
(65, 'herijaona', 'herijaona', 'herijaona3@gmail.com', '45', '45l', '', '$2y$10$l89.xjQVsnuAKfYAFwV3iuecHAa5W5Y.vK09dBESBdVPVitFu8pBu', '', 'admin', 1, '2018-09-12 17:17:57', '2018-09-12 09:17:57'),
(56, 'cdc', 'cd', 'sdfkdl@gmail.con', '45', 'cd', '', '$2y$10$1TgeKX0oJLB8N5QT72Bxy.qrdNnqVAzvXgY3zb2.9RgQkjJ4bnk/2', '', 'admin', 1, '2018-09-10 20:48:31', '2018-09-10 12:48:31'),
(55, 'fdf', 'fd', 'dev@dev.com', 'ffd', 'fdf', '', '$2y$10$b20MEhm9Qf7B08rKirUpfeTAWkjQ8VP9wy5BZhDsIjTiJoWKD/Kw2', '', 'admin', 1, '2018-09-10 20:29:33', '2018-09-10 12:29:33'),
(74, '', '', 'herijaona3@gmail.com', '', '', '', '', '', 'technicien', 0, '0000-00-00 00:00:00', '2018-09-12 11:47:15'),
(73, '', '', 'herijaona3@gmail.com', '', '', '', '', '', 'chefdeservice', 0, '0000-00-00 00:00:00', '2018-09-12 11:30:21');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chefdeservice`
--
ALTER TABLE `chefdeservice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`users_id`);

--
-- Index pour la table `prime`
--
ALTER TABLE `prime`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saisie`
--
ALTER TABLE `saisie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sendmail`
--
ALTER TABLE `sendmail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chefdeservice`
--
ALTER TABLE `chefdeservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `permis`
--
ALTER TABLE `permis`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prime`
--
ALTER TABLE `prime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `saisie`
--
ALTER TABLE `saisie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sendmail`
--
ALTER TABLE `sendmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
