-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2019 at 02:50 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reunion_island`
--

-- --------------------------------------------------------

--
-- Table structure for table `hiking`
--

CREATE TABLE `hiking` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `hike_name` varchar(100) NOT NULL,
  `difficulty` varchar(11) NOT NULL,
  `distance` decimal(11,1) NOT NULL,
  `duration` text NOT NULL,
  `height_difference` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hiking`
--

INSERT INTO `hiking` (`id`, `hike_name`, `difficulty`, `distance`, `duration`, `height_difference`, `available`) VALUES
(1, 'Le premier point de vue sur le Trou de Fer depuis le Gîte de Belouve', 'easy', '10.0', '02:30', 114, 0),
(2, 'Le Grand Bénare par le Grand Bord et la Glacère depuis le Maïdo', 'hard', '18.0', '06:00', 796, 0),
(3, 'Du Stade de la Redoute au Colorado', 'medium', '10.3', '03:00', 625, 0),
(4, 'Une boucle vers Grand Bassin par Bois Court et le Sentier Mollaret', 'hard', '13.9', '06:00', 968, 0),
(5, 'La Boucle des Margosiers à la Plaine des Grègues', 'hard', '11.0', '05:00', 729, 0),
(29, 'First Added Hike', 'medium', '45.0', '08:30', 654, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`) VALUES
(1, 'Jefke', 'jef@email.com', 'Jef', 'Kever', '880ee9f40131e5ce5d00fabfe23ace838888493b'),
(2, 'Treesje', 'treesje@email.com', 'Trees', 'Jené', '82b75409bccba49ef89ada351d259042467fd4ff'),
(3, 'ViezeClown', 'hahaha4life@email.com', 'Hans', 'Worst', 'a761cc9ca02e6a3655d3aca516a081a190578348'),
(4, 'geert', 'geert@gmail.com', 'geert', 'timmermans', 'e5270639911d23f69ab0efe70eb36a3e4527408a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
