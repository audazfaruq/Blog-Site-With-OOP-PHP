-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 10:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'City'),
(2, 'Food'),
(4, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `myadmin`
--

CREATE TABLE `myadmin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) DEFAULT NULL,
  `ad_pass` varchar(50) NOT NULL,
  `ad_user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myadmin`
--

INSERT INTO `myadmin` (`ad_id`, `ad_name`, `ad_pass`, `ad_user_name`) VALUES
(1, 'Omar Faruq', '6627', 'faruq');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_author` int(11) DEFAULT NULL,
  `p_category` int(11) DEFAULT NULL,
  `p_description` text DEFAULT NULL,
  `p_image` varchar(256) DEFAULT NULL,
  `p_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_author`, `p_category`, `p_description`, `p_image`, `p_date`) VALUES
(3, 'New Update', 1, 1, '<p>Food New</p>\r\n', '6256747a18994.Collected  (5).jpg', '13 Apr, 2022'),
(4, 'New 2', 1, 4, '<p>New 2</p>\r\n', '62567ea2efc7b.1507_203830_GJAUKJGNKN_1.jpg', '13 Apr, 2022'),
(5, 'New 3', 1, 1, '<p>New</p>\r\n', '62567ee209c02.4k wallpaper asus inside gamers.jpg', '13 Apr, 2022'),
(6, 'new 4', 1, 4, '<p>new</p>\r\n', '62567ef3b6016.3840x2400-diablo_iii_tyrael_artwork_video_games_angel-11386.jpg', '13 Apr, 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `myadmin`
--
ALTER TABLE `myadmin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_author` (`p_author`),
  ADD KEY `p_category` (`p_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myadmin`
--
ALTER TABLE `myadmin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`p_author`) REFERENCES `myadmin` (`ad_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`p_category`) REFERENCES `category` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
