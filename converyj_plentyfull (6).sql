-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 06:46 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `converyj_plentyfull`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `role`, `city`, `country`, `password`) VALUES
(29, 1, 'Oakville', 'Can', ''),
(36, 1, 'Oakville', 'Can', ''),
(39, 1, 'Oakville', 'Can', '');

-- --------------------------------------------------------

--
-- Table structure for table `caterer`
--

CREATE TABLE `caterer` (
  `catererid` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catererallergy`
--

CREATE TABLE `catererallergy` (
  `catererid` int(11) NOT NULL,
  `allergyCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catererdietary`
--

CREATE TABLE `catererdietary` (
  `catererid` int(11) NOT NULL,
  `dietaryRestrictionCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `userid` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`userid`, `comment`) VALUES
(2, 'i love pasta');

-- --------------------------------------------------------

--
-- Table structure for table `dietallergyvalue`
--

CREATE TABLE `dietallergyvalue` (
  `type` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(2) NOT NULL,
  `value` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `bigImage` text COLLATE utf8_unicode_ci NOT NULL,
  `greyImage` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dietallergyvalue`
--

INSERT INTO `dietallergyvalue` (`type`, `code`, `value`, `image`, `bigImage`, `greyImage`) VALUES
('D', 1, 'Vegetarian', 'vegetarian.png', 'vegetarian-big.png', 'vegetarian-grey.png'),
('D', 2, 'Vegan', 'vegan.png', 'vegan-big.png', 'vegan-grey.png'),
('D', 3, 'Pescetarian', 'presc.png', 'pesc-big.png', 'pesc-grey.png'),
('D', 4, 'Kosher', 'kosher-small.png', 'kosher-big.png', 'kosher-grey.png'),
('D', 5, 'Halal', 'halal-small.png', 'halal-big.png', 'halal-grey.png'),
('D', 6, 'Gluten Free', 'glutenFree.png', 'glutenFree-big.png', 'glutenFree-grey.png'),
('A', 7, 'Peanuts', 'peanutFree.png', 'peanutFree-big.png', 'peanutFree-grey.png'),
('A', 8, 'Lactose', 'lactose.png', 'lactose.big.png', 'lactose-grey.png'),
('A', 9, 'Eggs', 'eggFree.png', 'eggFree-big.png', 'eggFree-grey.png'),
('A', 10, 'Wheat', 'wheatFree.png', 'wheatFree-big.png', 'wheatFree-grey.png'),
('A', 11, 'Soy', 'soyFree.png', 'soyFree-big.png', 'soyFree-grey.png'),
('A', 12, 'Fish', 'fishFree.png', 'fishFree-big.png', 'fishFree-grey.png'),
('A', 13, 'Shell Fish', 'shellFish.png', 'shellFish-big.png', 'shellFish-grey.png');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `surveyid` int(11) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`surveyid`, `deadline`) VALUES
(24, '2018-12-14'),
(25, '2018-12-14'),
(26, '2018-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `surveycaterer`
--

CREATE TABLE `surveycaterer` (
  `catererid` int(11) NOT NULL,
  `surveyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstName`, `lastName`, `email`) VALUES
(1, 'Jack', 'Smith', 'jack@gmail.com'),
(2, 'Jane', 'White', 'jane@gmail.com'),
(3, 'Peter', 'Brown', 'peter@gmail.com'),
(4, 'John ', 'Doe', 'john@gmail.com'),
(5, 'John', 'Smith', 'js@gmail.com'),
(8, 'John', 'Smith', 'jsmith@gmail.com'),
(27, 'Alex', 'Smith', 'asmith@gmail.com'),
(28, 'Matt', 'Smith', 'msmith@gmail.com'),
(29, 'Donny', 'Smith', 'dsmith@gmail.com'),
(30, '', '', 'esmith@gmail.com'),
(36, 'Jill', 'Smith', 'jillsmith@gmail.com'),
(37, '', '', 'ksmith@gmail.com'),
(38, 'Jacob', 'Smith', 'jacobsmith@gmail.com'),
(39, 'fred', 'Smith', 'fsmith@gmail.com'),
(40, 'Susan', 'Smith', 'ssmith@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userallergy`
--

CREATE TABLE `userallergy` (
  `surveyid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `allergyCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userallergy`
--

INSERT INTO `userallergy` (`surveyid`, `userid`, `allergyCode`) VALUES
(0, 3, 5),
(0, 1, 5),
(0, 1, 6),
(23, 28, 1),
(23, 28, 2),
(24, 29, 1),
(24, 29, 2),
(25, 36, 2),
(25, 36, 3),
(25, 38, 1),
(25, 38, 2),
(26, 39, 1),
(26, 39, 2),
(26, 40, 1),
(26, 40, 2),
(26, 40, 1),
(26, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `userdietary`
--

CREATE TABLE `userdietary` (
  `surveyid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dietaryRestrictionCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userdietary`
--

INSERT INTO `userdietary` (`surveyid`, `userid`, `dietaryRestrictionCode`) VALUES
(0, 1, 1),
(0, 2, 3),
(0, 3, 3),
(0, 4, 1),
(16, 0, 1),
(16, 0, 4),
(17, 0, 1),
(17, 0, 4),
(18, 0, 1),
(18, 0, 4),
(19, 0, 2),
(20, 0, 2),
(22, 27, 3),
(23, 28, 1),
(23, 28, 2),
(24, 29, 1),
(24, 29, 2),
(25, 36, 2),
(25, 36, 3),
(25, 38, 1),
(25, 38, 2),
(26, 39, 1),
(26, 39, 2),
(26, 40, 1),
(26, 40, 2),
(26, 40, 1),
(26, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usersurvey`
--

CREATE TABLE `usersurvey` (
  `userid` int(11) NOT NULL,
  `surveyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersurvey`
--

INSERT INTO `usersurvey` (`userid`, `surveyid`) VALUES
(29, 24),
(36, 25),
(38, 25),
(39, 26),
(40, 26),
(40, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `caterer`
--
ALTER TABLE `caterer`
  ADD PRIMARY KEY (`catererid`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`surveyid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersurvey`
--
ALTER TABLE `usersurvey`
  ADD KEY `surveyid` (`surveyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `catererid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `usersurvey`
--
ALTER TABLE `usersurvey`
  ADD CONSTRAINT `usersurvey_ibfk_1` FOREIGN KEY (`surveyid`) REFERENCES `survey` (`surveyid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
