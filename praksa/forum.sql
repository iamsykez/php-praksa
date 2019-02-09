-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2017 at 01:19 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `ingredients` varchar(500) NOT NULL DEFAULT 'none',
  `size` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `address`, `ingredients`, `size`, `createdAt`) VALUES
(73, 'Damjan', 'Stojanovski', 'none', 'large', '2017-09-01 09:26:48'),
(74, 'Trajko Zhinzifov', 'Ul. Pariska 14 b', 'none', 'family', '2017-09-01 11:28:54'),
(75, 'Damjan Stojanovski', 'Mile Pop Jordanov 31b/4', 'none', 'large', '2017-09-01 11:29:27'),
(76, 'fsdkf ', 'fsdf 3453 cdgd', 'none', 'large', '2017-09-01 11:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `thread` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `thread`, `userid`, `message`, `updatedAt`, `createdAt`) VALUES
(6, 7, 3, 'mn si se sakam', '2017-08-09 14:16:26', '2017-08-09 14:16:26'),
(7, 7, 4, 'dobar si mali', '2017-08-09 14:16:57', '2017-08-09 14:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredients`
--

CREATE TABLE `tbl_ingredients` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `ingredient` varchar(255) NOT NULL DEFAULT 'none',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredients`
--

INSERT INTO `tbl_ingredients` (`id`, `order_id`, `ingredient`, `createdAt`) VALUES
(24, 73, 'peperoni', '2017-09-01 11:26:48'),
(25, 73, 'mushroom', '2017-09-01 11:26:48'),
(26, 73, 'bacon', '2017-09-01 11:26:48'),
(27, 73, 'ham', '2017-09-01 11:26:48'),
(28, 73, 'tofu', '2017-09-01 11:26:48'),
(29, 73, 'veggieMix', '2017-09-01 11:26:48'),
(30, 73, 'shrimp', '2017-09-01 11:26:48'),
(31, 73, 'broccoli', '2017-09-01 11:26:48'),
(32, 73, 'extraCheese', '2017-09-01 11:26:48'),
(33, 74, 'peperoni', '2017-09-01 13:28:54'),
(34, 74, 'onion', '2017-09-01 13:28:54'),
(35, 74, 'greenPepper', '2017-09-01 13:28:54'),
(36, 74, 'ham', '2017-09-01 13:28:54'),
(37, 74, 'feta', '2017-09-01 13:28:54'),
(38, 75, 'anchovies', '2017-09-01 13:29:27'),
(39, 75, 'tofu', '2017-09-01 13:29:27'),
(40, 75, 'veggieMix', '2017-09-01 13:29:27'),
(41, 75, 'shrimp', '2017-09-01 13:29:27'),
(42, 75, 'feta', '2017-09-01 13:29:27'),
(43, 75, 'broccoli', '2017-09-01 13:29:27'),
(44, 75, 'extraCheese', '2017-09-01 13:29:27'),
(45, 75, 'chicken', '2017-09-01 13:29:27'),
(46, 75, 'olives', '2017-09-01 13:29:27'),
(47, 76, 'bacon', '2017-09-01 13:37:24'),
(48, 76, 'veggieMix', '2017-09-01 13:37:24'),
(49, 76, 'shrimp', '2017-09-01 13:37:24'),
(50, 76, 'chicken', '2017-09-01 13:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `replies` int(11) NOT NULL,
  `posted` varchar(255) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `userid`, `title`, `message`, `replies`, `posted`, `updatedAt`, `createdAt`) VALUES
(7, 3, 'Zdr', 'Hello world', 0, '', '2017-08-09 14:16:18', '2017-08-09 14:16:18'),
(8, 4, 'e da be', '1234', 0, '', '2017-08-09 14:16:47', '2017-08-09 14:16:47'),
(9, 3, 'test', 'test123', 0, '', '2017-08-29 21:18:39', '2017-08-29 21:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(3, 'sykezmkd', '$2y$12$CV.7QPvuBCLyuhXBmaZcQ.HmMzMvzmeiKQRnuLLKcQIodatQbkUsG'),
(4, 'ace', '$2y$12$zfgwpYzTAmqmijzWm9q6Au6hh64MaZOd48XTU6IitL/NzSey7.vi2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
