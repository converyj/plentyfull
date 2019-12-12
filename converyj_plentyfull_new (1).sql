-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 05:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `converyj_plentyfull_new`
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
(74, 1, 'Oakville', 'Can', ''),
(81, 1, 'NY', 'USA', ''),
(83, 1, 'NY', 'CAN', ''),
(85, 1, 'Toronto', 'Can', ''),
(86, 1, 'NY', 'USA', '');

-- --------------------------------------------------------

--
-- Table structure for table `caterer`
--

CREATE TABLE `caterer` (
  `catererid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `streetName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `province` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `postal` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `caterer`
--

INSERT INTO `caterer` (`catererid`, `name`, `image`, `streetName`, `city`, `province`, `postal`, `link`, `price`, `description`) VALUES
(1, 'The Hogtown Vegan', 'hogtown.jpg', '1056 Bloor St W', 'Toronto', 'ON', 'M6H 1M3', 'https://www.thehogtownvegan.com/', '$', 'Meat, dairy & egg-free Southern-style comfort food, with local beers on tap, plus weekend brunch.'),
(2, 'Doomies', 'doomies.jpg', '1346 Queen St W,', 'Toronto', 'ON', 'M6K 1L4', 'https://www.doomiestoronto.com/', '$$$', 'This vegan haunt with a dark decor offers comfort food staples, plus craft beers, wine & cocktails.'),
(3, 'Hermes', 'hermes.jpg', '2885 Bathurst St', 'North York', 'ON', 'M6B 3A4', 'http://hermesbakery.com/', '$', 'Corner bakery with housemade kosher treats, breads, cakes & savory platters. Keeps\r\nkosher hours.'),
(4, 'Pizzeria Libretto', 'pizzeria.jpg', '545 King St W', 'Toronto', 'ON', 'M5V 1M1', 'https://www.pizzerialibretto.com/', '$$$', 'Wood-fired Neapolitan-style pizzas made with simple ingredients & served in a bustling space.'),
(5, 'Marron Bistro', 'marron.jpg', '948 Eglinton Ave W', 'Toronto', 'ON', 'M6C 2C5', 'http://www.marronbistro.com/', '$$$$', 'Kosher French dishes plus burgers & steak served in a refined dining room with leather banquettes.'),
(6, 'The Halal Guys', 'halalguys.jpg', '563 Yonge St', 'Toronto,', 'ON', 'M4Y 1Z2', 'https://thehalalguys.com/', '$$', 'Buzzing joint dishing out beef gyros, chicken wraps, falafel & platters in a simply decorated space.'),
(7, 'Lebanon Express', 'lebanon.jpg', '439 Yonge St', 'Toronto', 'ON', 'M5B 1L2', 'https://lebanon-express.business.site/', '$$', 'Simple counter serve venue & take out preparing a range of dishes from the Eastern Mediterranean.'),
(8, 'Vegetarian Haven', 'vegetarian-haven.jpg', '17 Baldwin St', 'Toronto', 'ON', 'M5T 1L1', 'http://www.vegetarianhaven.com/', '$$$', 'Cozy restaurant with a Zen atmosphere serving vegan Asian-influenced dishes made with mock meats.'),
(9, 'Bubby\'s Bagels', 'bagel.jpg', '3035 Bathurst St,', 'North York', 'ON', 'M6B 3B5', 'https://www.bubbysbagels.com/', '$', 'eat, the only Kosher Bagel shop in the area'),
(10, 'Grasshopper Eatery', 'grasshopper.jpg', '310 College St', 'Toronto', 'ON', 'M5T 1S2', 'http://www.grasshoppereats.com/', '$$$$', 'Exposed brick & wood tables adorn this funky vegetarian bistro known for globally-inspired recipes.'),
(11, 'Bunner\'s', 'bunners.jpg', '244 Augusta Ave', 'Toronto', 'ON', 'M5T 2L7', 'http://www.bunners.ca/', '$$$', 'Pink-coloured shop specializing in vegan, gluten-free & soy-free sweet & savoury baked goods.'),
(12, 'The Beet Organic Kitchen & Bar', 'beetorganic.jpg', '2968 Dundas St W', 'Toronto', 'ON', 'M6P 1Y8', 'http://www.thebeet.ca/', '$$$$', 'Nutritious wraps, salads & burgers, plus juices & fair-trade coffee, in a former bank with a patio.'),
(13, 'Impact Kitchen', 'impact.jpg', '573 King St E', 'Toronto', 'ON', 'M5A 4L3', 'https://www.impactkitchen.ca/', '$$$$$', 'Loftlike spot serving up breakfast, power bowls, salads & lean proteins, plus smoothies & espresso.');

-- --------------------------------------------------------

--
-- Table structure for table `catererallergy`
--

CREATE TABLE `catererallergy` (
  `catererid` int(11) NOT NULL,
  `allergyCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catererallergy`
--

INSERT INTO `catererallergy` (`catererid`, `allergyCode`) VALUES
(1, 6),
(1, 7),
(1, 2),
(1, 3),
(2, 3),
(2, 2),
(2, 6),
(2, 7),
(3, 1),
(10, 3),
(10, 2),
(10, 6),
(10, 7),
(11, 5),
(11, 1),
(12, 1),
(13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `catererdietary`
--

CREATE TABLE `catererdietary` (
  `catererid` int(11) NOT NULL,
  `dietaryRestrictionCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catererdietary`
--

INSERT INTO `catererdietary` (`catererid`, `dietaryRestrictionCode`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 4),
(5, 4),
(5, 1),
(5, 3),
(6, 5),
(6, 1),
(7, 5),
(7, 1),
(8, 1),
(8, 3),
(9, 4),
(9, 1),
(10, 1),
(10, 3),
(11, 6),
(11, 2),
(12, 1),
(12, 2),
(12, 6),
(13, 2),
(13, 1),
(13, 6),
(1, 2),
(4, 6),
(6, 2),
(7, 2),
(9, 2),
(10, 2);

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
(75, 'no cross contamination'),
(82, 'Ty'),
(87, 'Thank you!');

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
('D', 3, 'Pescetarian', 'pesc.png', 'pesc-big.png', 'pesc-grey.png'),
('D', 4, 'Kosher', 'kosher.png', 'kosher-big.png', 'kosher-grey.png'),
('D', 5, 'Halal', 'halal.png', 'halal-big.png', 'halal-grey.png'),
('D', 6, 'Gluten-Free', 'glutenFree.png', 'glutenFree-big.png', 'glutenFree-grey.png'),
('A', 1, 'Peanuts', 'peanutFree.png', 'peanutFree-big.png', 'peanutFree-grey.png'),
('A', 2, 'Lactose', 'lactose.png', 'lactose-big.png', 'lactose-grey.png'),
('A', 3, 'Eggs', 'eggFree.png', 'eggFree-big.png', 'eggFree-grey.png'),
('A', 4, 'Wheat', 'wheatFree.png', 'wheatFree-big.png', 'wheatFree-grey.png'),
('A', 5, 'Soy', 'soyFree.png', 'soyFree-big.png', 'soyFree-grey.png'),
('A', 6, 'Fish', 'fishFree.png', 'fishFree-big.png', 'fishFree-grey.png'),
('A', 7, 'Shellfish', 'shellFish.png', 'shellFish-big.png', 'shellFish-grey.png');

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
(47, '2018-12-11'),
(48, '2018-12-19'),
(49, '2018-12-27'),
(50, '2018-12-19'),
(51, '2019-01-02');

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
(74, 'Aries', 'Zhang', 'captain@gmail.com'),
(75, 'Amanda', 'Goncalves', 'amandajanegon@gmail.com'),
(76, 'Elicia', 'Ng', 'ngeli@sheridancollege.ca'),
(77, 'Jaime', 'Convery', 'jaimeconvery@gmail.com'),
(78, 'Bucky', 'Barnes', 'barnes@gmail.com'),
(79, 'Jake', 'Smith ', 'jsmith@gmail.com'),
(80, 'Mary', 'Smith', 'msmith@gmail.com'),
(81, 'Steve', 'Rogers', 'steve@gmail.com'),
(82, 'Buck', 'B', 'bucky@gmail.com'),
(83, 'Joe', 'Black', 'joe@gmail.com'),
(84, 'joe', 'sam', 'sam@gmail.com'),
(85, 'Percy', 'Jackson', 'pj@gmail.com'),
(86, 'Tony', 'Stark', 'ts@gmail.com'),
(87, 'Peter', 'Park', 'peter@gmail.com');

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
(47, 74, 4),
(47, 74, 5),
(47, 77, 5),
(47, 75, 2),
(47, 75, 3),
(47, 75, 6),
(47, 75, 7),
(47, 76, 5),
(48, 81, 1),
(48, 81, 3),
(48, 82, 6),
(49, 83, 4),
(49, 84, 3),
(50, 85, 3),
(51, 86, 3),
(51, 87, 3);

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
(47, 74, 3),
(47, 74, 4),
(47, 77, 6),
(47, 75, 1),
(47, 75, 2),
(47, 76, 3),
(47, 78, 5),
(48, 81, 3),
(48, 82, 1),
(49, 83, 2),
(49, 84, 3),
(50, 85, 2),
(50, 85, 3),
(51, 86, 3),
(51, 86, 4),
(51, 87, 2);

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
(74, 47),
(77, 47),
(75, 47),
(76, 47),
(78, 47),
(79, 47),
(80, 47),
(81, 48),
(82, 48),
(83, 49),
(84, 49),
(85, 50),
(86, 51),
(87, 51);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

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
  ADD KEY `usersurvey_ibfk_1` (`surveyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `catererid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
