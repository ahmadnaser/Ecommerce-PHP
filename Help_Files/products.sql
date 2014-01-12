-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2014 at 02:28 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `is_hot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `status`, `short_description`, `picture`, `price`, `is_hot`) VALUES
(1, 'ahmad naser', 'Available', 'this is my text', '1.jpg', 88, 0),
(2, 'ahmad naser', 'Available', 'this is my text', '3.jpg', 88, 0),
(3, 'ahmad naser', 'Available', 'this is my text', '1235296_176784712509205_1922792102_n.jpg', 88, 0),
(4, 'ahmad naser', 'Available', 'this is my text', '1467466_1415204625383118_1827740238_n.jpg', 88, 0),
(5, 'galaxy s2', 'Available', 'Description Here', 'palestinian_2413509b.jpg', 908, 0),
(6, 'galaxy s2', 'Available', 'Description Here', '6.jpg', 908, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
