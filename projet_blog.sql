-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 06 Mai 2016 à 11:54
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre_article` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `contenu_article` text NOT NULL,
  `auteur_article` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre_article`, `date_ajout`, `contenu_article`, `auteur_article`) VALUES
(1, 'Mon premier article', '2016-04-21 13:53:00', 'Ceci est mon tout premier article sur mon nouveau blog', 'Romain'),
(2, 'Mon deuxième article', '2016-04-21 14:03:51', 'Ceci est mon deuxième article', 'Romain'),
(3, 'Mon troisième article', '2016-04-21 14:25:24', 'Ceci est mon troisième article sur le blog', 'Romain'),
(7, 'Quatrième article du blog', '2016-04-21 15:20:40', 'Test d''un lol kikou ouaf', 'Romain');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `auteur_com` varchar(255) NOT NULL,
  `contenu_com` text NOT NULL,
  `date_com` datetime NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `auteur_com`, `contenu_com`, `date_com`, `id_article`) VALUES
(1, 'Romain', 'Kikou', '2016-04-26 18:55:01', 7),
(2, 'Téo', 'ouaf', '2016-04-26 18:56:14', 2),
(3, 'Romain', 'Second commentaire', '2016-04-28 13:53:17', 7),
(4, 'Romain', 'Second commentaire', '2016-04-28 13:53:22', 7),
(10, 'Romain', 'commentaire 1', '2016-05-02 22:14:38', 1),
(11, 'Romain', 'commentaire 2', '2016-05-02 22:15:01', 1),
(17, 'Romain', 'kikou lol asv', '2016-05-03 09:55:01', 1),
(18, 'Romain', 'lol', '2016-05-03 10:01:10', 3),
(19, 'Romain', 'test', '2016-05-03 10:19:43', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
