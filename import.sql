-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 06:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `wallet` int(11) DEFAULT NULL,
  `product` varchar(256) DEFAULT NULL,
  `imglink` varchar(255) DEFAULT NULL,
  `op` varchar(255) DEFAULT NULL,
  `nameReq` varchar(255) DEFAULT NULL,
  `bal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `firstName`, `lastName`, `email`, `pass`, `wallet`, `product`, `imglink`, `op`, `nameReq`, `bal`) VALUES
(40, 'Avijit', 'Das', 'avijit.00.das@gmail.com', 'avijit12', 6701, '1', 'uploads/13407134_971905009593754_7255474151496802570_n.jpg', '0', NULL, NULL),
(41, 'Bidisha', 'Mondal', 'mondal.bidisha23@gmail.com', 'bidisha7', 9300, NULL, 'uploads/t.jpg', '0', 'Avijit', '700'),
(42, 'Cristiano', 'Ronaldo', 'cr7@gmail.com', 'ronu7', 5000, NULL, 'uploads/FB_IMG_1480140717039.jpg', '0', 'Arka', '5000'),
(43, 'Lionel', 'Messi', 'lm10@gmail.com', 'lm10', 10000, NULL, 'uploads/IMG-20170712-WA0003.jpg', '0', NULL, NULL),
(44, 'Mike', 'Shinoda', 'mslp@gmail.com', 'lpmike', 10000, NULL, 'uploads/mike-shinoda-getty.jpg', '0', NULL, NULL),
(45, 'Joe', 'Hahn', 'joe.lp@gmail.com', 'joelp', 10000, NULL, 'uploads/MV5BNzZmYTExZjItNTEwNC00ZDQxLWFhYzAtNDUyZWMxYjliN2UwXkEyXkFqcGdeQXVyMzM4MjM0Nzg@._V1_.jpg', '0', NULL, NULL),
(46, 'Brad', 'Delson', 'brad.lp@gmail.com', 'bradlp', 10000, NULL, 'uploads/download.jpg', '0', NULL, NULL),
(47, 'Sonu', 'Nigam', 'sn@gmail.com', 'sonunigam', 10000, NULL, 'uploads/crop_175x175_209438.jpg', '0', NULL, NULL),
(48, 'Shreya', 'Ghoshal', 'shreya@gmail.com', 'shreya', 10000, NULL, 'uploads/Shreya-Ghoshal-1.jpg', '0', NULL, NULL),
(49, 'Utso', 'Saha', 'utsosaha@gmail.com', 'utsosaha', 10000, NULL, 'uploads/hii.jpg', '0', NULL, NULL),
(50, 'Sunny', 'Karmakar', 'sunnyda@gmail.com', 'sunny', 10000, NULL, 'uploads/9.jpg', '0', NULL, NULL),
(51, 'Ragini', 'Singh', 'raginimmsdi@gmail.com', 'ragini', 10000, NULL, 'uploads/word-image-31.jpeg', '0', NULL, NULL),
(52, 'Swaralipi', 'Roy', 'sr2@gmail.com', 'swaralipi', 10000, NULL, 'uploads/11.jpg', '0', NULL, NULL),
(53, 'Arka', 'patra', 'arkapatra2009@gmail.com', 'abc', 11001, '1', 'uploads/2.jpg', '0', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
