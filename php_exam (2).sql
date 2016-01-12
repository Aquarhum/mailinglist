-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 12 Janvier 2016 à 16:33
-- Version du serveur :  5.5.43-0+deb7u1-log
-- Version de PHP :  5.4.41-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_exam`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `password`) VALUES
(1, 'Admin', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `valid` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `time`, `valid`) VALUES
(38, 'jackiix@jerjjjemie.nbe', '0000-00-00 00:00:00', 0),
(40, 'jjzjzj@jjj.bbe', '0000-00-00 00:00:00', 0),
(41, 'jjnjn@jjj.be', '0000-00-00 00:00:00', 1),
(42, 'jdjjdjd@kkk.be', '0000-00-00 00:00:00', 1),
(43, 'jzjzjzjhhhjj@jj.be', '2016-01-12 16:12:00', 1),
(44, 'jzjzjzjjj@jj.bess', '2016-01-12 16:12:00', 0),
(45, 'jjjeel@jjj.be', '2016-01-12 16:13:00', 1),
(46, 'jzjzjzjjj@jj.besskkrkrkrkr', '2016-01-12 16:13:00', 0),
(47, 'jzjzjzjjj@jj.ssdsd', '2016-01-12 16:17:00', 0),
(48, 'sjdjsndsnj@jjj.be', '2016-01-12 16:17:00', 0),
(49, 'coucou@jjjjsns.be', '0000-00-00 00:00:00', 1),
(50, 'coucou@jjjjsns.bess', '0000-00-00 00:00:00', 1),
(51, 'kksksks@kk.be', '0000-00-00 00:00:00', 1),
(52, 'yoyoyoyo@lll.be', '0000-00-00 00:00:00', 1),
(53, 'jjjzjz@ll.be', '2016-01-12 17:05:00', 0),
(54, 'Coucou@kkk.be', '2016-01-12 16:15:00', 0),
(58, 'yolo@kkk.be', '2016-01-12 16:30:00', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
