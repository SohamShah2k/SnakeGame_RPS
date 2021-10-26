-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 03:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `scored` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `id`, `name`, `scored`) VALUES
(1, 61, '', 12),
(2, 61, 'soham123', 12),
(3, 61, 'soham123', 6),
(4, 61, 'soham123', 0),
(5, 61, 'soham123', 21),
(7, 61, 'soham123', 3),
(8, 61, 'soham123', 3),
(9, 61, 'soham123', 3),
(10, 61, 'soham123', 3),
(11, 61, 'soham123', 3),
(12, 61, 'soham123', 18),
(13, 1, 'Soham', 3),
(14, 1, 'Soham', 3),
(15, 1, 'Soham', 3),
(16, 1, 'Soham', 69),
(27, 1, 'Soham', 3),
(28, 1, 'Soham', 3),
(29, 1, 'Soham', 3),
(30, 8, 'prince', 36),
(31, 63, 'tt', 42);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `email`, `pass`, `img_dir`) VALUES
(1, 'Soham', 'soham.shah.2000@gmail.com', 'soham123', 'css/img2.jpg'),
(2, 'soh', 'soh@gmail.com', '123', 'css/img1.jpg'),
(4, 'soha', 'soha@gmail.com', '123', 'css/img4.jpg'),
(6, 'pri', 'pri@gmail.com', '123', 'css/img2.jpg'),
(7, 'prin', 'prin@gmail.com', '123', 'css/img3.jpg'),
(8, 'prince', 'prince@gmail.com', '123', 'css/img4.jpg'),
(9, 'srs', 'srs@gmail.com', '123', 'css/img4.jpg'),
(22, 'PrinceT', 'PrinceT@gmail.com', '123', 'css/img1.jpg'),
(23, 'd', 'sd@f', 'sdf', 'css/img2.jpg'),
(52, 'soahm', 'soham@w', '123', 'css/img2.jpg'),
(61, 'soham123', 'soham@gmail', '123', 'css/img2.jpg'),
(62, 'longname', 'long@name', '123', 'css/img2.jpg'),
(63, 'tt', 'tt@haxer.com', '123', 'css/img3.jpg'),
(64, 'User1', 'user@gmail', '123', 'css/img3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
