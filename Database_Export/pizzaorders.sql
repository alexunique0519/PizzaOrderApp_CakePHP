-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 10:50 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizzaorders`
--

CREATE TABLE `pizzaorders` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `topping` varchar(255) NOT NULL,
  `crustType` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `orderStatus` bit(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `telNumber` varchar(10) NOT NULL,
  `subTotal` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizzaorders`
--

INSERT INTO `pizzaorders` (`id`, `userName`, `postalCode`, `province`, `city`, `size`, `topping`, `crustType`, `email`, `orderStatus`, `created`, `modified`, `telNumber`, `subTotal`, `total`) VALUES
(121, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,baconStrips,chicken,groundBeef,broccoli,grilledZucchini,greenPepper', 'Stuffed', 'a@a.com', b'1', '2015-11-05 08:45:38', '2015-11-06 22:01:07', '1212121212', 13.5, 15.26),
(122, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,baconStrips,chicken,groundBeef,broccoli,grilledZucchini,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:46', '2015-11-09 09:33:27', '1212121212', 13.5, 15.26),
(123, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:49', '2015-11-05 08:45:49', '1212121212', 13.5, 15.26),
(124, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:50', '2015-11-05 08:45:50', '1212121212', 13.5, 15.26),
(125, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:50', '2015-11-05 08:45:50', '1212121212', 13.5, 15.26),
(126, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:50', '2015-11-05 08:45:50', '1212121212', 13.5, 15.26),
(127, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:45:50', '2015-11-05 08:45:50', '1212121212', 13.5, 15.26),
(128, 'ooo', 'N2C 2H8', 'Ontario', 'kkk', 'medium', 'pepperoni,chicken,broccoli,greenPepper', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:46:18', '2015-11-05 08:46:18', '1212121212', 13.5, 15.26),
(129, 'view', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'chicken,broccoli,greenPepper,cheeseBlend', 'Stuffed', 'a@a.com', b'0', '2015-11-05 08:55:11', '2015-11-05 08:55:11', '1212121212', 13.5, 15.26),
(130, 'test111', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 08:56:53', '2015-11-05 08:56:53', '1212121212', 10, 11.3),
(131, 'testagain', 'N2C 2H8', 'Quebec', '111', 'medium', 'chicken', 'Hand-tossed', 'a@a.com', b'1', '2015-11-05 09:00:48', '2015-11-08 20:38:02', '1212121212', 10, 10.5),
(132, 'wtf', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'chicken', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:05:47', '2015-11-08 20:39:41', '1212121212', 10, 11.3),
(133, 'wtf', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'chicken', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:07:07', '2015-11-08 20:39:45', '1212121212', 10, 11.3),
(134, 'wtf', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'chicken', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:07:16', '2015-11-08 20:39:54', '1212121212', 10, 11.3),
(135, 'mm', 'N2C 2H7', 'Ontario', 'Kitchener', 'large', 'chicken', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:08:10', '2015-11-08 20:40:02', '1212121212', 15, 16.95),
(136, 'gg', 'N2C 2H8', 'Quebec', '111', 'medium', 'chicken', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:09:46', '2015-11-08 20:40:07', '1212121212', 10, 10.5),
(137, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'1', '2015-11-05 09:13:38', '2015-11-08 20:40:11', '1212121212', 5, 5.65),
(138, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:13:41', '2015-11-05 09:13:41', '1212121212', 5, 5.65),
(139, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:13:41', '2015-11-05 09:13:41', '1212121212', 5, 5.65),
(140, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:13:42', '2015-11-05 09:13:42', '1212121212', 5, 5.65),
(141, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:13:42', '2015-11-05 09:13:42', '1212121212', 5, 5.65),
(142, 'll', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'pepperoni', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:13:42', '2015-11-05 09:13:42', '1212121212', 5, 5.65),
(143, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:22', '2015-11-05 09:23:22', '1212121212', 10, 11.3),
(144, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:29', '2015-11-05 09:23:29', '1212121212', 10, 11.3),
(145, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'1', '2015-11-05 09:23:30', '2015-11-08 20:39:59', '1212121212', 10, 11.3),
(146, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:30', '2015-11-05 09:23:30', '1212121212', 10, 11.3),
(147, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:31', '2015-11-05 09:23:31', '1212121212', 10, 11.3),
(148, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', '', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:32', '2015-11-05 09:23:32', '1212121212', 9.5, 10.74),
(149, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'1', '2015-11-05 09:23:43', '2015-11-08 20:40:19', '1212121212', 10, 11.3),
(150, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'1', '2015-11-05 09:23:45', '2015-11-09 09:32:59', '1212121212', 10, 11.3),
(151, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:45', '2015-11-05 09:23:45', '1212121212', 10, 11.3),
(152, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:45', '2015-11-05 09:23:45', '1212121212', 10, 11.3),
(153, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:46', '2015-11-05 09:23:46', '1212121212', 10, 11.3),
(154, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:46', '2015-11-05 09:23:46', '1212121212', 10, 11.3),
(155, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:46', '2015-11-05 09:23:46', '1212121212', 10, 11.3),
(156, 'nn', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', 'broccoli', 'Pan', '111@111.com', b'0', '2015-11-05 09:23:46', '2015-11-05 09:23:46', '1212121212', 10, 11.3),
(157, 'lll', 'jkjkjk', 'Quebec', '66', 'large', '', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:34:39', '2015-11-05 09:34:39', '1212121212', 14.5, 15.23),
(158, 'aaa', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', '', 'Pan', '111@11.com', b'0', '2015-11-05 09:52:40', '2015-11-05 09:52:40', '1212121212', 9.5, 10.74),
(159, 'aaa', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', '', 'Pan', '111@11.com', b'0', '2015-11-05 09:54:45', '2015-11-05 09:54:45', '1212121212', 10, 11.3),
(160, 'aaa', 'N2C 2H7', 'Ontario', 'Kitchener', 'medium', '', 'Pan', '111@11.com', b'1', '2015-11-05 09:55:30', '2015-11-08 20:40:31', '1212121212', 10, 11.3),
(161, 'toppings', 'N2C 2H7', 'Ontario', 'Kitchener', 'large', 'pepperoni,chicken', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 09:59:47', '2015-11-05 09:59:47', '1212121212', 15.5, 17.52),
(162, 'try', 'N2C 2H7', 'Ontario', 'Kitchener', 'large', 'chicken', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 10:29:40', '2015-11-05 10:29:40', '1212121212', 15, 16.95),
(163, 'kkk', 'N2C 2H7', 'Ontario', 'Kitchener', 'X-L', 'chicken', 'Stuffed', '111@11.com', b'0', '2015-11-05 10:30:39', '2015-11-05 10:30:39', '1212121212', 22, 24.86),
(164, 'hahahahha', 'N2C 2H8', 'Ontario', 'kitchenr', 'medium', 'chicken,broccoli,grilledZucchini,greenPepper,mushRoom,cheeseBlend', 'Stuffed', 'a@111.com', b'0', '2015-11-05 10:33:17', '2015-11-05 10:33:17', '1212121212', 14.5, 16.39),
(165, 'pp', 'N2C 2H7', 'Ontario', 'Kitchenera', 'small', 'grilledZucchini', 'Hand-tossed', 'a@a.com', b'0', '2015-11-05 21:16:08', '2015-11-05 21:16:08', '1212121212', 5, 5.65),
(166, 'jj', 'N2C 2H7', 'Ontario', 'Kitchener', 'small', 'broccoli', 'Hand-tossed', '111@11.com', b'0', '2015-11-05 21:17:13', '2015-11-05 21:17:13', '1212121212', 5, 5.65),
(167, 'a', 'N2C 2H7', 'Ontario', '111', 'small', 'pepperoni,broccoli', 'Hand-tossed', '111@111.com', b'0', '2015-11-09 09:15:09', '2015-11-09 09:15:09', '1212121212', 5.5, 6.22),
(168, 'a', 'N2C 2H7', 'Ontario', '111', 'small', 'pepperoni,broccoli', 'Hand-tossed', '111@111.com', b'0', '2015-11-09 09:15:35', '2015-11-09 09:15:35', '1212121212', 5.5, 6.22),
(169, 'mmm', 'N2C 2H7', 'Ontario', 'Kitchener', 'large', 'greenPepper', 'Hand-tossed', '111@11.com', b'0', '2015-11-09 09:16:08', '2015-11-09 09:16:08', '1121212121', 15, 16.95),
(170, 'lll', 'N2C 2H7', 'Ontario', 'Kitchener', 'X-L', 'greenPepper', 'Hand-tossed', '111@111.com', b'0', '2015-11-09 09:16:42', '2015-11-09 09:16:42', '1212121212', 20, 22.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizzaorders`
--
ALTER TABLE `pizzaorders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizzaorders`
--
ALTER TABLE `pizzaorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
