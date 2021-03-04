-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2021 at 09:18 AM
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
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(12) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`id`, `name`, `firstname`, `street`, `zip_code`, `city`, `image`) VALUES
(6, 'Hyatt Coffey bd', 'Hyatt bd', 'Commodo doloribus ut quisquam aut ea praesentium minim optio itaque quasi et nesciunt proident est iste voluptatum cupiditate aliquid ab', '74938', 'Aliquid voluptatem excepteur quasi tenetur illo veniam tempora obcaecati cupidatat optio reprehenderit quo consequatur eiusmod', '1581835919-.jpg'),
(7, 'Amos Carney', 'Robin', 'Ipsum voluptate atque ex ea', '44249', 'Dolor maxime est laborum Ipsum culpa ut quos nobis sequi corrupti in ea enim deleniti eaque inventore', '1582185293.jpg'),
(8, 'test oop', 'ddf', 'dfdffd', '4560', 'test', '0'),
(9, 'user1', 'Oren', 'Nobis corrupti culpa consequatur enim eligendi cum architecto sequi rerum molestiae error eveniet', '37194', 'Asperiores ut quos odit id minus incididunt modi fugiat nisi ipsum', '0'),
(10, 'user2', 'user firstname', '', '', '', ''),
(11, 'user2', 'user firstname 2', '', '', '', ''),
(12, 'user3', 'user firstname 3', '', '', '', ''),
(13, 'user2', 'user firstname 2', '', '', '', ''),
(14, 'user3', 'user firstname 3', '', '', '', ''),
(15, 'user2', 'user firstname 2', '', '', '', ''),
(16, 'user3', 'user firstname 3', '', '', '', ''),
(17, 'user2', 'user firstname 2', '', '', '', ''),
(18, 'user3', 'user firstname 3', '', '', '', ''),
(19, 'user2', 'user firstname 2', '', '', '', ''),
(20, 'user3', 'user firstname 3', '', '', '', ''),
(21, 'user2', 'user firstname 2', '', '', '', ''),
(22, 'user3', 'user firstname 3', '', '', '', ''),
(23, 'user2', 'user firstname 2', '', '', '', ''),
(24, 'user3', 'user firstname 3', '', '', '', ''),
(25, 'user2', 'user firstname 2', '', '', '', ''),
(26, 'user3', 'user firstname 3', '', '', '', ''),
(27, 'user2', 'user firstname 2', '', '', '', ''),
(28, 'user3', 'user firstname 3', '', '', '', ''),
(29, 'user2', 'user firstname 2', '', '', '', ''),
(30, 'user3', 'user firstname 3', '', '', '', ''),
(31, 'user2', 'user firstname 2', '', '', '', ''),
(32, 'user3', 'user firstname 3', '', '', '', ''),
(33, 'user2', 'user firstname 2', '', '', '', ''),
(34, 'user3', 'user firstname 3', '', '', '', ''),
(35, 'user2', 'user firstname 2', '', '', '', ''),
(36, 'user3', 'user firstname 3', '', '', '', ''),
(37, 'user2', 'user firstname 2', '', '', '', ''),
(38, 'user3', 'user firstname 3', '', '', '', ''),
(39, 'user2', 'user firstname 2', '', '', '', ''),
(40, 'user3', 'user firstname 3', '', '', '', ''),
(41, 'user2', 'user firstname 2', '', '', '', ''),
(42, 'user3', 'user firstname 3', '', '', '', ''),
(43, 'user2', 'user firstname 2', '', '', '', ''),
(44, 'user3', 'user firstname 3', '', '', '', ''),
(45, 'user2', 'user firstname 2', '', '', '', ''),
(46, 'user3', 'user firstname 3', '', '', '', ''),
(47, 'user2', 'user firstname 2', '', '', '', ''),
(49, 'user2', 'user firstname 2', '', '', '', ''),
(50, 'user3', 'user firstname 3', '', '', '', ''),
(51, 'user2', 'user firstname 2', '', '', '', ''),
(52, 'user3', 'user firstname 3', '', '', '', ''),
(53, 'user2', 'user firstname 2', '', '', '', ''),
(54, 'user3', 'user firstname 3', '', '', '', ''),
(55, 'user2', 'user firstname 2', '', '', '', ''),
(56, 'user3', 'user firstname 3', '', '', '', ''),
(57, 'user2', 'user firstname 2', '', '', '', ''),
(58, 'user3', 'user firstname 3', '', '', '', ''),
(59, 'user2', 'user firstname 2', '', '', '', ''),
(60, 'user3', 'user firstname 3', '', '', '', ''),
(61, 'user2', 'user firstname 2', '', '', '', ''),
(62, 'user3', 'user firstname 3', '', '', '', ''),
(63, 'user2', 'user firstname 2', '', '', '', ''),
(64, 'user3', 'user firstname 3', '', '', '', ''),
(65, 'user2', 'user firstname 2', '', '', '', ''),
(66, 'user3', 'user firstname 3', '', '', '', ''),
(67, 'user2', 'user firstname 2', '', '', '', ''),
(68, 'user3', 'user firstname 3', '', '', '', ''),
(69, '', 'Beverly', 'Ioehs', '90210', 'Beverly Hills', ''),
(70, '', 'Beverly', 'Ioehs', '90210', 'Beverly Hills', ''),
(71, '', 'Beverly', 'Kayjs', '90210', 'Beverly Hills', ''),
(72, '', 'Beverly', 'Vynmf', '90210', 'Beverly Hills', ''),
(73, '', 'Beverly', 'Uaalv', '90210', 'Beverly Hills', ''),
(74, '', 'Beverly', 'Xllfe', '90210', 'Beverly Hills', ''),
(75, '', 'Beverly', 'Eltks', '90210', 'Beverly Hills', ''),
(76, '', 'Beverly', 'Eltks', '90210', 'Beverly Hills', ''),
(77, '', 'Beverly', 'Eltks', '90210', 'Beverly Hills', ''),
(78, '', 'Beverly', 'Gjhrw', '90210', 'Beverly Hills', ''),
(79, '', 'Beverly', 'Ztaun', '90210', 'Beverly Hills', ''),
(80, '', 'Beverly', 'Gywpd', '90210', 'Beverly Hills', ''),
(81, 'user2', 'user firstname 2', '', '', '', ''),
(82, 'user3', 'user firstname 3', '', '', '', ''),
(83, 'user2', 'user firstname 2', '', '', '', ''),
(84, 'user3', 'user firstname 3', '', '', '', ''),
(85, 'user2', 'user firstname 2', '', '', '', ''),
(86, 'user3', 'user firstname 3', '', '', '', ''),
(87, 'user2', 'user firstname 2', '', '', '', ''),
(88, 'user3', 'user firstname 3', '', '', '', ''),
(89, 'user2', 'user firstname 2', '', '', '', ''),
(90, 'user3', 'user firstname 3', '', '', '', ''),
(91, 'user2', 'user firstname 2', '', '', '', ''),
(92, 'user3', 'user firstname 3', '', '', '', ''),
(93, 'Beverly Hills', 'Beverly', 'Sotxz', '90210', 'Beverly Hills', ''),
(94, 'user2', 'user firstname 2', '', '', '', ''),
(95, 'user3', 'user firstname 3', '', '', '', ''),
(96, 'user2', 'user firstname 2', '', '', '', ''),
(97, 'user3', 'user firstname 3', '', '', '', ''),
(98, 'user2', 'user firstname 2', '', '', '', ''),
(100, 'user2', 'user firstname 2', '', '', '', ''),
(101, 'user3', 'user firstname 3', '', '', '', ''),
(102, 'user2', 'user firstname 2', '', '', '', ''),
(103, 'user3', 'user firstname 3', '', '', '', ''),
(104, 'user2', 'user firstname 2', '', '', '', ''),
(105, 'user3', 'user firstname 3', '', '', '', ''),
(106, 'user2', 'user firstname 2', '', '', '', ''),
(107, 'user3', 'user firstname 3', '', '', '', ''),
(108, 'user2', 'user firstname 2', '', '', '', ''),
(109, 'user3', 'user firstname 3', '', '', '', ''),
(110, 'user2', 'user firstname 2', '', '', '', ''),
(112, 'user2', 'user firstname 2', '', '', '', ''),
(113, 'user3', 'user firstname 3', '', '', '', ''),
(114, 'user2', 'user firstname 2', '', '', '', ''),
(115, 'user3', 'user firstname 3', '', '', '', ''),
(116, 'user2', 'user firstname 2', '', '', '', ''),
(117, 'user3', 'user firstname 3', '', '', '', ''),
(118, 'user2', 'user firstname 2', '', '', '', ''),
(119, 'user3', 'user firstname 3', '', '', '', ''),
(120, 'user2', 'user firstname 2', '', '', '', ''),
(121, 'user3', 'user firstname 3', '', '', '', ''),
(122, 'user2', 'user firstname 2', '', '', '', ''),
(123, 'user3', 'user firstname 3', '', '', '', ''),
(124, 'user2', 'user firstname 2', '', '', '', ''),
(125, 'user3', 'user firstname 3', '', '', '', ''),
(126, 'user2', 'user firstname 2', '', '', '', ''),
(127, 'user3', 'user firstname 3', '', '', '', ''),
(128, 'user2', 'user firstname 2', '', '', '', ''),
(129, 'user3', 'user firstname 3', '', '', '', ''),
(130, 'user2', 'user firstname 2', '', '', '', ''),
(131, 'user3', 'user firstname 3', '', '', '', ''),
(132, 'user2', 'user firstname 2', '', '', '', ''),
(133, 'user3', 'user firstname 3', '', '', '', ''),
(134, 'user2', 'user firstname 2', '', '', '', ''),
(135, 'user3', 'user firstname 3', '', '', '', ''),
(136, 'user2', 'user firstname 2', '', '', '', ''),
(137, 'user3', 'user firstname 3', '', '', '', ''),
(138, 'user2', 'user firstname 2', '', '', '', ''),
(139, 'user3', 'user firstname 3', '', '', '', ''),
(141, 'Beverly Hills 230', 'Beverly', 'Ixcrp', '90210', 'Beverly Hills', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `title`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', 'When using this account it is possible to cause irreversible. Default it gets all permission', 0, 1, '2016-12-19 00:44:30', '2019-10-22 16:49:56'),
(2, 'admin', 'Admin', '[Administrator] Full access to create, edit, and update companies, and orders', 0, 1, '2016-12-19 00:44:30', '2019-11-27 16:51:40'),
(3, 'Manager', 'Manager', 'Ability to create new companies and orders, or edit and update any existing ones', 0, 2, '2016-12-19 00:45:53', '2017-06-11 07:49:00'),
(4, 'Author', 'Author', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences', 0, 2, '2016-12-19 00:45:53', '2017-06-11 07:49:47'),
(5, 'Contributors', 'Contributor', '[Contributor] A standard user that can have a licence assigned to them. No administrative features', 0, 2, '2017-01-02 01:38:35', '2017-07-01 09:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zakir Hossain', 'zakir', 'zakir@gmail.com', '', 1, 0, NULL, '2019-09-05 08:52:45', '2019-09-05 08:52:45'),
(2, 'Admin', 'admin', 'admin@admin.com', '', 1, 1, NULL, '2019-09-05 08:52:45', '2019-09-05 08:52:45'),
(4, 'Mohammad Kabir Hossain', 'kabir', 'kabir.cse10@gmail.com', '', 1, 3, NULL, '2020-01-20 08:52:45', '2020-01-20 08:52:45'),
(6, 'Beverly Hills', 'bhills', 'bhills_4718@mailinator.com', '', 0, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
