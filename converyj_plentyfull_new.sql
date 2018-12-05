-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 10:58 PM
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
(29, 1, 'Oakville', 'Can', ''),
(36, 1, 'Oakville', 'Can', ''),
(39, 1, 'Oakville', 'Can', ''),
(41, 1, 'Oakville', 'Can', ''),
(42, 1, 'Oakville', 'Can', ''),
(43, 1, 'OOakville', 'Can', ''),
(44, 1, 'Oakville', 'Can', ''),
(45, 1, 'Oakville ', 'Can', ''),
(46, 1, 'Oakville', 'Ont', ''),
(47, 1, 'Oakville', 'Can', '');

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
(2, 'i love pasta'),
(50, 'I like pizza');

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
(24, '2018-12-14'),
(25, '2018-12-14'),
(26, '2018-12-14'),
(27, '2018-11-29'),
(28, '2018-12-03'),
(29, '2018-12-03'),
(30, '2018-12-03'),
(31, '2018-12-03'),
(32, '2018-12-02'),
(33, '2018-12-02');

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
(36, 'Frank', 'Zee', 'jillsmith@gmail.com'),
(38, 'Jacob', 'Smith', 'jacobsmith@gmail.com'),
(39, 'fred', 'Smith', 'fsmith@gmail.com'),
(40, 'Susan', 'Smith', 'ssmith@gmail.com'),
(41, 'Jack', 'Smtih', 'jack@cogefco.ca'),
(42, 'Jone', 'Smith', 'jone@gmail.com'),
(43, 'Jay', 'Richard', 'jay@gmail.com'),
(44, 'Pete', 'Mavis', 'petemavis@hotmail.com'),
(45, 'Diana', 'Soy', 'diane@gmail.com'),
(46, 'Daneille', 'Joseph', 'danielle@gmail.com'),
(47, 'Max', 'Maxim', 'max@gmail.com'),
(48, 'Frank', 'Zee', 'frankze@gmail.com'),
(49, 'Deb', 'Wilson', 'deb@hotmail.com'),
(50, 'Andrew', 'Smyk', 'andy@gmaiil.com'),
(51, 'Dorothy', 'Oz', 'dorothyoz@gmiaal.com');

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
(26, 40, 2),
(27, 41, 2),
(27, 41, 4),
(29, 43, 1),
(29, 43, 4),
(30, 44, 1),
(30, 44, 4),
(31, 45, 1),
(31, 45, 4),
(32, 46, 1),
(32, 46, 4),
(33, 47, 1),
(33, 47, 4),
(25, 48, 1),
(25, 48, 2),
(25, 36, 1),
(25, 36, 2),
(25, 49, 1),
(25, 49, 2),
(25, 49, 3),
(25, 49, 4),
(25, 49, 5),
(25, 49, 6),
(25, 49, 7),
(25, 50, 1),
(25, 50, 2),
(25, 50, 1),
(25, 50, 2),
(25, 51, 1);

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
(26, 40, 2),
(32, 46, 1),
(32, 46, 2),
(33, 47, 1),
(33, 47, 2),
(25, 48, 1),
(25, 48, 3),
(25, 36, 1),
(25, 36, 3),
(25, 49, 1),
(25, 49, 2),
(25, 49, 3),
(25, 49, 4),
(25, 49, 5),
(25, 49, 6),
(25, 50, 1),
(25, 50, 2),
(25, 50, 1),
(25, 50, 2),
(25, 51, 1);

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
(40, 26),
(41, 27),
(42, 28),
(43, 29),
(44, 30),
(45, 31),
(46, 32),
(47, 33),
(48, 25),
(36, 25),
(49, 25),
(50, 25),
(50, 25),
(51, 25);

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
  MODIFY `surveyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
