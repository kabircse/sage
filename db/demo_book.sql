-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2020 at 09:27 AM
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
-- Database: `address_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `demo_book`
--

CREATE TABLE `demo_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(12) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demo_book`
--

INSERT INTO `demo_book` (`id`, `name`, `firstname`, `street`, `zip_code`, `city`, `image`) VALUES
(4, 'ddd', 'dzx', 'Dolores voluptatem nobis suscipit et ex vitae nihil', '49957', 'Nihil cupiditate quis consequatur molestiae voluptatem qui obcaecati ut soluta dolor impedit dolore cum voluptatem dolore voluptate dolor ad', '1581835963.jpg'),
(5, 'Hyatt Coffey', 'Hyatt', 'Commodo doloribus ut quisquam aut ea praesentium minim optio itaque quasi et nesciunt proident est iste voluptatum cupiditate aliquid ab', '74938', 'Aliquid voluptatem excepteur quasi tenetur illo veniam tempora obcaecati cupidatat optio reprehenderit quo consequatur eiusmod', '0'),
(7, 'Amos Carney', 'Robin', 'Ipsum voluptate atque ex ea', '44249', 'Dolor maxime est laborum Ipsum culpa ut quos nobis sequi corrupti in ea enim deleniti eaque inventore', '0'),
(8, 'test oop', 'ddf', 'dfdffd', '4560', 'test', '0'),
(9, 'user1', 'Oren', 'Nobis corrupti culpa consequatur enim eligendi cum architecto sequi rerum molestiae error eveniet', '37194', 'Asperiores ut quos odit id minus incididunt modi fugiat nisi ipsum', '0'),
(10, 'Beverly Hills 1', 'Beverly 2', 'Crhir 2', '90210 2', 'Beverly Hills 2', '0'),
(15, '16', 'user firstname 3', '', '', 'Dhaka', '0'),
(26, 'Beverly Hills', 'Beverly', 'Iwlex', '90210', 'Beverly Hills', '1581835919-.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo_book`
--
ALTER TABLE `demo_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo_book`
--
ALTER TABLE `demo_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
