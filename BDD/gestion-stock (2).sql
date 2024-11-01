-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 31 déc. 2022 à 20:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion-stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_complet` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `Numero_tel` varchar(35) NOT NULL,
  `mdp` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom_complet`, `email`, `Numero_tel`, `mdp`) VALUES
(3, 'test', 'test@gmail.com', '066778899', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_f` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ice` varchar(32) NOT NULL,
  `ville` varchar(35) NOT NULL,
  `tel` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_f`, `email`, `ice`, `ville`, `tel`) VALUES
(17, 'cl2', 'test2@gmail.com', '2222222333222', 'test2', '0866666668'),
(16, 'cl1', 'test@gmail.com', '11111111111111', 'test1', '07666666667'),
(19, 'cl4', 'test5@gmail.com', '444444444444', 'test4', '04666666664');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_cmd` varchar(33) NOT NULL,
  `des_pdt` varchar(35) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix_uni` int(11) NOT NULL,
  `client` varchar(35) NOT NULL,
  `date_c` date NOT NULL,
  `prix_t` float GENERATED ALWAYS AS ((`prix_uni` * `qte`)) VIRTUAL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `ref_cmd`, `des_pdt`, `qte`, `prix_uni`, `client`, `date_c`) VALUES
(26, '0004', 'pdt1', 120, 215, 'cl4', '2022-06-02'),
(25, '0003', 'pdt3', 10, 20, 'cl3', '2022-06-05'),
(22, '0002', 'pdt4', 3, 200, 'cl2', '2022-05-11'),
(21, '0001', 'pdt2', 35, 150, 'cl1', '2022-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_f` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ice` varchar(32) NOT NULL,
  `rib` varchar(32) NOT NULL,
  `ville` varchar(35) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `des_pdt` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom_f`, `email`, `ice`, `rib`, `ville`, `tel`, `des_pdt`) VALUES
(13, 'F1', 'f1@gmail.com', '123456789', '123456789', 'test10', '066666667', 'pdt1'),
(14, 'f2', 'f2@gmail.com', '123456789', '123456789', 'test', '06666666666', 'pdt2'),
(15, 'f3', 'f3@gmail.com', '123456789', '123456789', 'test', '076666667', 'pdt3'),
(16, 'f4', 'f4@gmail.com', '11447448899', '12654649889', 'test', '0866666668', 'pdt4');

-- --------------------------------------------------------

--
-- Structure de la table `graph_pdt`
--

DROP TABLE IF EXISTS `graph_pdt`;
CREATE TABLE IF NOT EXISTS `graph_pdt` (
  `pdt` varchar(35) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `graph_pdt`
--

INSERT INTO `graph_pdt` (`pdt`, `id`) VALUES
('pdt4', 20),
('pdt2', 19),
('', 18),
('pdt1', 17),
('pdt6', 16),
('pdt5', 15),
('pdt4', 14),
('pdt3', 13),
('pdt2', 12),
('pdt1', 11),
('pdt1', 21),
('pdt4', 22),
('pdt2', 23),
('pdt1', 24),
('pdt4', 25);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des_pdt` varchar(255) NOT NULL,
  `qte` float NOT NULL,
  `ref` varchar(255) NOT NULL,
  `date_imp` date NOT NULL,
  `date_exp` date NOT NULL,
  `prix_uni` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `des_pdt`, `qte`, `ref`, `date_imp`, `date_exp`, `prix_uni`) VALUES
(42, 'pdt6', 43, 'ref6', '2022-06-12', '2022-06-22', 150),
(40, 'pdt5', 35, 'rk12-85', '2022-02-17', '2022-05-12', 95),
(39, 'pdt4', 15, 'Kl-99', '2022-06-01', '2022-07-08', 150),
(38, 'pdt3', 24, 'RL-C', '2020-03-06', '2022-02-17', 205),
(37, 'pdt2', 7, '9887', '2022-06-16', '2022-06-25', 78),
(36, 'pdt1', 42, 'rk12-99', '2022-06-15', '2022-06-30', 150);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
