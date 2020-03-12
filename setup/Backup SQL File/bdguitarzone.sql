-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 02:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdguitarzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_status` varchar(13) DEFAULT 'Pending',
  `user_id` varchar(100) NOT NULL,
  `order_total` float(15,2) NOT NULL,
  `shift` varchar(15) NOT NULL,
  `gift` varchar(50) DEFAULT NULL,
  `date_of_purchase` date NOT NULL,
  `name` varchar(20) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `age` int(4) NOT NULL,
  `address` varchar(100) NOT NULL,
  `post_cd` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `more` longtext,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_status`, `user_id`, `order_total`, `shift`, `gift`, `date_of_purchase`, `name`, `lName`, `gender`, `age`, `address`, `post_cd`, `mobile`, `more`, `email`) VALUES
(101, 'Pending', '104', 56359.15, 'Evening', 'Capo', '2018-01-12', 'BD', 'GuitarZone', 'O', 100, 'Bangladesh', '0000', '00000000000', 'Hi, I am Admin2', 'bdguitarzone@gmail.com'),
(102, 'Pending', '103', 118997.26, 'Afternoon', 'Belt', '2018-01-25', 'Abdul', 'Mazid', 'M', 55, 'Manikganj Sadar', '1800', '01718635336', 'Hi, I am Abdul Mazid', 'mazid@gmail.com'),
(103, 'Pending', '-883534629', 15233.82, 'Afternoon', '0', '2018-01-25', 'Ahmed', 'Atik', 'M', 30, 'Manikganj Sadar Upazilla, Manikganj', '1800', '01564356786', 'Hi, I am Kana', '1000049@daffodil.ac');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_details_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float(9,2) NOT NULL,
  `order_quantity` int(5) NOT NULL,
  `subtotal` float(15,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_details_id`, `booking_id`, `product_id`, `unit_price`, `order_quantity`, `subtotal`, `timestamp`) VALUES
(101, 101, 111, 15233.82, 1, 15233.82, '2018-01-15 16:08:17'),
(102, 101, 110, 41125.33, 1, 41125.33, '2018-01-15 16:08:18'),
(103, 102, 110, 41125.33, 1, 41125.33, '2018-01-15 16:09:02'),
(104, 102, 109, 28844.60, 1, 28844.60, '2018-01-15 16:09:02'),
(105, 102, 102, 49027.33, 1, 49027.33, '2018-01-15 16:09:02'),
(106, 103, 111, 15233.82, 1, 15233.82, '2018-01-15 16:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `brand_image` varchar(150) NOT NULL,
  `brand_description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_image`, `brand_description`) VALUES
(101, 'Ibanez', 'Ibanez GRG121EXSM.png', 'Ibanez guitars are great'),
(102, 'Ovation', 'Ovation Celebrity Elite Plus CE44P-8TQ.png', 'Ovation guitars are great'),
(103, 'Taylor', 'Taylor-814ce.png', 'Taylor guitars are great'),
(104, 'Yamaha', 'Yamaha TRBX304 4-String.png', 'Yamaha guitars are great'),
(105, 'Luna', 'Luna Tattoo Concert.png', 'Luna Ukuleles are great');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(101, 'Electric Guitar', 'electric.png'),
(102, 'Acoustic Guitar', 'acoustic.png'),
(103, 'Bass Guitar', 'bass.png'),
(104, 'Guitalele', 'guitalele.png'),
(105, 'Classical Guitar', 'classical.png'),
(106, 'Ukulele', 'ukulele.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brands` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `product_price` float(8,2) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_video` longtext,
  `product_description` longtext,
  `stock_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brands`, `cat`, `product_price`, `product_image`, `product_video`, `product_description`, `stock_quantity`) VALUES
(101, 'IBANEZ GRGR121EX', 101, 101, 98089.55, 'Ibanez GRG121EXSM.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/PkXt7HDyL6Q\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'As an industry leader in the use of exotic tonewoods, Ibanez continues to innovate with their new AEW Series. This fresh approach is manifest in the AEW40AS-NT, with a figured ash top, back and sides', 20),
(102, 'Ovation Celebrity Elite Plus CE44P-8TQ', 102, 102, 49027.33, 'Ovation Celebrity Elite Plus CE44P-8TQ.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VFOEVimhB04\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'The Lyrachord body is a durable, lightweight alternative to wood backs and has a smooth interior surface, specifically designed to enhance the reflections inside your instrument', 15),
(103, 'Taylor 814ce', 103, 102, 312473.31, 'Taylor-814ce.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/otVpfp7O_p4\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'Like all 800 Series Taylors, the 814ce Grand Auditorium comes with Expression System 2 electronics and ships in a Taylor deluxe hardshell case', 1),
(104, 'Yamaha TRBX304 4-String', 104, 103, 67008.24, 'Yamaha TRBX304 4-String.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/h-MkOP7Oy-U\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'The TRBX304 is built around a simple principle - your performance. The perfectly balanced, ultra-comfortable solid mahogany body provides the optimum tonal foundation while the Performance EQ active circuitry gives instant access to perfectly dialed-in stage-ready tones coupled with the expressive control you need.', 15),
(105, 'Luna Tattoo Concert', 105, 106, 21999.76, 'Luna Tattoo Concert.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GDqXHJ5pHkc\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'This Tattoo Concert Uke takes its design from traditional Hawaiian body ornamentation. The designs were monochromatic, tattooed in black against brown skin. The patterns and layout were strongly geometric and there were many shapes and symbols representing the natural island world: stones, waves, fish, sharks, turtles, rain, sun, and birds. This design is based on a Hawaiian turtle (honu), a symbol of longevity and endurance rendered in a Polynesian tattoo style. The fret markers are stylized sharks teeth. This concert uke boasts a clear, resonate sound both by virtue of its Concert body and Mahogany construction. Beautiful sound - tremendous value.', 21),
(106, 'Ibanez AEW40AS', 101, 102, 37999.32, 'Ibanez AEW40AS.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JKPiR1Xqut0\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'As an industry leader in the use of Exotic tonewoods, Ibanez continues to innovate with their new AEW series. This fresh approach merges a classic Spruce top with an elegant exotic tonewood back-and-sides. The thinner, amplification-friendly body of these new acoustic/electrics make them the perfect choice for gigging singer-songwriters.', 25),
(107, 'Taylor 412ce-n', 103, 105, 189473.23, 'taylor-412ce-n.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Oil35KBX_m8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'TaylorÃ¢â‚¬â„¢s nylon-string models make the distinctive classical sound more accessible to steel-string players with ultra-playable necks and modern features like a cutaway and onboard electronics. The Grand Concert 412ce-N captures African ovangkolÃ¢â‚¬â„¢s rosewood-like tone, which pairs well with Sitka spruce and can accommodate a range of playing styles. White binding applies a crisp counterpoint against the all-gloss body, while TaylorÃ¢â‚¬â„¢s ES-N pickup brings nylonÃ¢â‚¬â„¢s evocative tonal flavors into a clear amplified acoustic sound. The guitar ships in a Taylor deluxe hardshell case.', 7),
(108, 'Yamaha Guitalele GL1', 104, 104, 7279.76, 'Yamaha Guitalele GL1.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1atus_kFLGQ\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Introducing the Yamaha GL1 Guitalele, now officially available for the first time in the USA! Half guitar, half ukuleleÃ¢â‚¬Â¦100% fun. A unique mini 6-string nylon guitar that is sized like a baritone ukulele (17Ã¢â‚¬Â scale) and plays like a standard tune guitar. The guitaleleÃ¢â‚¬â„¢s tuning is pitched up to Ã¢â‚¬Å“AÃ¢â‚¬Â (or up a 4th) at A/D/G/C/E/A.', 4),
(109, 'Yamaha TRBX304 4-String Electric Bass', 104, 103, 28844.60, 'Yamaha TRBX304.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/h-MkOP7Oy-U\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Giving you access to 5 performance-tuned EQ curves optimized for different performance styles, the pewter TRBX304 4-String Electric Bass from Yamaha has a solid mahogany body with a 5-piece maple/mahogany neck. Its dual ceramic pickups feature a hum-cancelling design to provide clean, noise-free performance while its bass and treble controls help to further shape your sound.', 16),
(110, 'Luna Athena 501', 105, 101, 41125.33, 'Luna Athena 501.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ezo4sw6qhPE\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Looking for a great Electric Guitar for Rock, Blues, Rockabilly, Alternative or other? The Athena 501 is a great choice. This full Semi-Hollowbody series has incredible tone and features a Flame maple top, Set V Neck, Rosewood Fret board, Maple Body, Gold Satin Hardware, Dual Humbucking Covered Pickups and a Clear Gloss finish.', 18),
(111, 'Ibanez EWP14OPN Exotic Wood Piccolo', 101, 104, 15233.82, 'Ibanez EWP14OPN.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/aLsHnVQOVY8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Smaller scale instruments have increased in popularity over the past few years, because not only do students seem to be starting younger than ever, but also the easy-to-transport guitar has become recognized as an excellent companion for the weary traveler. From the on-the-go businessperson who needs a guitar that can fit in a planeÃ¢â‚¬â„¢s overhead compartment, to the happy wanderer just looking to animate his sojourn with a song, the compact travel guitar can be an uplifting addition to any expedition. \r\nThe EWP14OPN is a 1/3-size, steel string Piccolo acoustic guitar. Similar in scale to a Baritone ukulele (17Ã¢â‚¬Â), the EWP14 sports an EW style cutaway body. The top, back, and sides are made of ovangkol, a wood found in Western Africa, known for its beautiful figuring and rosewood-like tone. An Open Pore Natural finish allows the body to resonate more freely for improved tone and projection. Other features include an abalone rosette, rosewood fretboard, bridge and chrome die-cast tuners.', 14),
(112, 'Taylor 214ce Deluxe Grand Auditorium Cutaway', 103, 102, 107057.73, 'Taylor 214ce Deluxe Grand Auditorium Cutaway.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gQHOPaLzgqw\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'With a solid Sitka spruce top and layered Indian rosewood back and sides, this Grand Auditorium guitar delivers a rich, nuanced tone profile punctuated by high-end sparkle and midrange punch. The patented Taylor neck and Venetian cutaway provide a comfortable playing experience across a broad range of musical styles, and with an Expression System 2 pickup and preamp highlighting the quality and depth of the guitarÃ¢â‚¬â„¢s natural sound, the 214ce DLX is ready to perform in any environment. ItÃ¢â‚¬â„¢s appointed with white binding, Italian acrylic Small Diamond inlays, and a full-gloss body, and ships in a deluxe hardshell case.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Visitor',
  `name` varchar(20) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `age` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `post_cd` varchar(6) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `more` longtext,
  `email` varchar(60) NOT NULL,
  `password` varchar(25) NOT NULL,
  `code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `lName`, `gender`, `age`, `address`, `post_cd`, `mobile`, `more`, `email`, `password`, `code`) VALUES
(101, 0, 'ADMIN', '', '', '0000-00-00', '', '', '', NULL, 'admin@bdguitarzone.com', 'admin123', 'xyz00160542'),
(102, 1, 'Numan', 'Ibn Mazid', 'M', '1994-01-25', 'Kalabagan,Dhaka,Bangladesh', '1205', '01685238317', 'Hi, I am Numan Ibn Mazid', 'numanworkstation@gmail.com', '12345', ''),
(103, 1, 'Mazid', 'Mazid', 'M', '1989-06-22', 'Manikganj Sadar', '1800', '01718635336', 'Hi, I am Abdul Mazid', 'mazid@gmail.com', '12345', ''),
(104, 0, 'BD', 'GuitarZone', 'O', '1999-09-19', 'Bangladesh', '0000', '00000000000', 'Hi, I am Admin2', 'bdguitarzone@gmail.com', 'admin123', 'xyz00160542');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_details_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brands` (`brands`),
  ADD KEY `cat` (`cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brands`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cat`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
