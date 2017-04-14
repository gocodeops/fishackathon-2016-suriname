-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 08:18 PM
-- Server version: 5.6.30-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishackathon_2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `radius` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `type`, `lat`, `lng`, `radius`, `content`) VALUES
(2, 'Punt 1', 1, '6.599341', '-56.621847', 50000, 'Verboden:\r\nGarnalen\r\nCrab\r\nKwie-kwie'),
(3, 'Punt 2', 1, '6.942996', '-54.792623', 20000, 'Verboden: \r\nBop\r\nZeecrab\r\nHaaien'),
(4, 'Punt 3', 2, '6.113457', '-54.259786', 15000, 'Verboden:\r\nSardien\r\nTuna'),
(6, 'Schildpad protected Zone', 2, '6.0322666846494934', '-57.01286315917969', 20000, 'Verboden te vissen in dit omgeving wegens populatie van schildpadden.'),
(7, 'Operatie O.W.', 1, '5.228810897353067', '-57.2222900390625', 10000, 'Zie rapportage'),
(8, 'Brokopono no fishing zone', 2, '4.688666902768202', '-55.052490234375', 50000, 'Brokopono no fishing zone'),
(9, 'Kabalebo', 2, '4.4367823614446475', '-57.1893310546875', 9000, 'NIET VISSEN!'),
(10, 'Apura', 2, '5.159334198490031', '-57.1673583984375', 20000, 'In Apura niet fissen'),
(11, 'Block 3', 1, '7.550378378185998', '-55.316162109375', 50000, 'Block content'),
(15, 'Cajana', 2, '3.9108390726964837', '-55.5743408203125', 20000, 'Cajana no fishing zone!');

-- --------------------------------------------------------

--
-- Table structure for table `area_type`
--

CREATE TABLE IF NOT EXISTS `area_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_type`
--

INSERT INTO `area_type` (`id`, `name`, `color`) VALUES
(1, 'Marine Protected Area', '#3F51B5'),
(2, 'Closed Fishing Areas', '#FF9800');

-- --------------------------------------------------------

--
-- Table structure for table `laws`
--

CREATE TABLE IF NOT EXISTS `laws` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laws`
--

INSERT INTO `laws` (`id`, `country_code`, `title`, `body`) VALUES
(2, 'SR', 'Defenitions', 'Fishing - bringing, having, lifting/getting fishing gear or applying ways to catch or kill fish. Every activity that can lead to catching or killing fish. Every activity supporting fisherboats underwriting, processing, preparating, storing, cooling or transporting fish. This only applies for commercial activities. '),
(3, 'SR', 'Register my Fishersboat', 'Fil in a writen form for registration. Together with submitting the form, evidence is presented that the fisherboat meets the following requirements:<br>\r\n<ol><li>Regurarly ashores in Suriname.</li><li>The captain lives in Suriname en is registered in the Board of Commerce and Industry.</li><li>The captain makes sure the catch is processed in Suriname.</li></ol>\r\n'),
(4, 'SR', 'The Fishers Permit', 'Fil in a writen form for registration. Together with submitting the form, evidence is presented that the fisherboat meets the following requirements:\r\n-	Regurarly ashores in Suriname.\r\n-	The captain lives in Suriname en is registered in the Board of Commerce and Industry.\r\n-	The captain makes sure the catch is processed in Suriname.\r\n'),
(7, '', 'Fishackathon 2016 Law', 'Forbidden to eat in the hallway');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `lat`, `lng`, `content`) VALUES
(1, 'Suriname', '5.847024', ' -55.193597', 'Dit is Suriname'),
(2, 'Commewjne', '5.801000', ' -55.145188', 'Dit is Commewijne'),
(3, 'Grens Suriname Guyana', '4.7143976342270495', '-53.7451171875', 'Buitenlands -&gt; Suriname'),
(4, 'Nickerie dock', '6.0012647108029356', '-56.964111328125', 'Nickerie dock'),
(5, 'Totness Dock', '5.864671244842154', '-56.31591796875', 'Totness Dock'),
(6, 'Jenny dock', '5.793629371805004', '-55.909423828125', 'Jenny dock'),
(7, 'Groningen Dock', '5.820954232861817', '-55.5029296875', 'Groningen Dock'),
(8, 'New Amsterdam dock', '6.279808432740451', '-57.4969482421875', 'New Amsterdam dock'),
(9, 'Bronsweg dock', '5.0225468783063425', '-55.1458740234375', 'Bronsweg dock'),
(10, 'Gran santi', '4.239595130978847', '-54.3878173828125', 'Gran santi dock'),
(11, 'Hamliton', '5.876795279107161', '-56.249656677246094', 'Hamliton fishing dock'),
(12, 'Draai dock', '4.18549668527475', '-54.584197998046875', 'Draai fishing dock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_type`
--
ALTER TABLE `area_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laws`
--
ALTER TABLE `laws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `area_type`
--
ALTER TABLE `area_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laws`
--
ALTER TABLE `laws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
