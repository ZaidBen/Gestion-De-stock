-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 31 déc. 2022 à 20:34
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
-- Base de données : `invoice_system`
--

-- --------------------------------------------------------

--
-- Structure de la table `invoice_order`
--

DROP TABLE IF EXISTS `invoice_order`;
CREATE TABLE IF NOT EXISTS `invoice_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=692 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invoice_order`
--

INSERT INTO `invoice_order` (`order_id`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `note`) VALUES
(691, '2022-06-19 20:38:32', 'cl1', 'test adresse', '6150.00', '1230.00', '20', 7380.00, '1000.00', '6380.00', '');

-- --------------------------------------------------------

--
-- Structure de la table `invoice_order_item`
--

DROP TABLE IF EXISTS `invoice_order_item`;
CREATE TABLE IF NOT EXISTS `invoice_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4398 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_item_id`, `order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(4100, 2, '13555', 'Face Mask', '120.00', '2000.00', '240000.00'),
(4101, 2, '34', 'mobile', '10.00', '10000.00', '100000.00'),
(4102, 2, '34', 'mobile battery', '1.00', '34343.00', '34343.00'),
(4103, 2, '34', 'mobile cover', '10.00', '200.00', '2000.00'),
(4104, 2, '36', 'testing', '1.00', '2400.00', '2400.00'),
(4371, 0, '4', 'fewfew', '88.00', '8.00', '704.00'),
(4372, 0, '8787', 'ihuhjuhiuhihi', '8487.00', '8965.00', '76085955.00'),
(4375, 0, '878', 'ghgjh', '4.00', '952.00', '3808.00'),
(4376, 0, '87', 'sfdfd', '54.00', '84984.00', '4589136.00'),
(4377, 0, '87', 'iuguygu', '87.00', '874.00', '76038.00'),
(4394, 691, '1', 'art1', '15.00', '100.00', '1500.00'),
(4395, 691, '2', 'art2', '12.00', '200.00', '2400.00'),
(4396, 691, '3', 'art3', '20.00', '50.00', '1000.00'),
(4397, 691, '4', 'art4', '50.00', '25.00', '1250.00');

-- --------------------------------------------------------

--
-- Structure de la table `invoice_user`
--

DROP TABLE IF EXISTS `invoice_user`;
CREATE TABLE IF NOT EXISTS `invoice_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123457 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invoice_user`
--

INSERT INTO `invoice_user` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(123456, 'admin@phpzag.com', '12345', 'Admin', '', 12345678912, 'New Delhi 110096 India.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
