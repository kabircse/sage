-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 06:30 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(12) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`id`, `name`, `firstname`, `street`, `zip_code`, `city`) VALUES
(1, 'Hyatt Coffey', 'Brielle', 'Commodo doloribus ut quisquam aut ea praesentium minim optio itaque quasi et nesciunt proident est iste voluptatum cupiditate aliquid ab', '74938', 'Aliquid voluptatem excepteur quasi tenetur illo veniam tempora obcaecati cupidatat optio reprehenderit quo consequatur eiusmod'),
(2, 'Hyatt Coffey', 'Hyatt', 'Commodo doloribus ut quisquam aut ea praesentium minim optio itaque quasi et nesciunt proident est iste voluptatum cupiditate aliquid ab', '74938', 'Aliquid voluptatem excepteur quasi tenetur illo veniam tempora obcaecati cupidatat optio reprehenderit quo consequatur eiusmod'),
(3, 'Dylan Rich', 'Yvonne', 'Pariatur Minim irure occaecat culpa aliqua Illum et non', '19917', 'Sequi ipsum et incididunt dolor do voluptatibus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
