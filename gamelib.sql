-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 27, 2022 at 11:08 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Gamelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `gioco`
--

CREATE TABLE `gioco` (
  `game_id` int(100) UNSIGNED NOT NULL,
  `titolo` varchar(250) NOT NULL,
  `anno` int(100) NOT NULL,
  `software_house_id` int(100) UNSIGNED NOT NULL,
  `cover` varchar(250) NOT NULL,
  `Playtime` int(150) UNSIGNED NOT NULL,
  `Score` int(150) UNSIGNED NOT NULL,
  `user_id` int(150) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gioco`
--

INSERT INTO `gioco` (`game_id`, `titolo`, `anno`, `software_house_id`, `cover`, `Playtime`, `Score`, `user_id`) VALUES
(29, 'Elden Ring', 2022, 1, 'ciao.png', 200, 8, 6),
(30, 'Animal Crossing', 2020, 6, 'test.jpg', 200, 10, 6),
(32, 'Resident Evil', 2002, 2, 'Resident_Evil.jpg', 10, 9, 6),
(33, 'Spiderman', 2018, 8, 'spider-man-cover-dettagli-collector-s-digital-deluxe-edition-v22-326280-1280x720.jpg', 35, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `software_house`
--

CREATE TABLE `software_house` (
  `software_house_id` int(100) UNSIGNED NOT NULL,
  `user_id` int(150) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `software_house`
--

INSERT INTO `software_house` (`software_house_id`, `user_id`, `nome`) VALUES
(1, 6, 'FromSoftware'),
(2, 6, 'Capcom'),
(5, 6, 'Konami'),
(6, 6, 'Nintendo'),
(8, 12, 'Insomniac');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(150) UNSIGNED NOT NULL,
  `username` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `mail`, `password`) VALUES
(5, 'virtual', 'test', 'a90f84ed20452b86efeea2e82ab6f066'),
(6, 'virtual2', 'test@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
(7, 'virtual3', 'virtual@mail.com', 'test'),
(8, 'virtual4', 'virtual@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
(9, 'virtual5', 'test@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
(10, 'virtual6', 'test@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
(12, 'virtual7', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gioco`
--
ALTER TABLE `gioco`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `software_house_id` (`software_house_id`),
  ADD KEY `user_game` (`user_id`);

--
-- Indexes for table `software_house`
--
ALTER TABLE `software_house`
  ADD PRIMARY KEY (`software_house_id`),
  ADD KEY `user_sh` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gioco`
--
ALTER TABLE `gioco`
  MODIFY `game_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `software_house`
--
ALTER TABLE `software_house`
  MODIFY `software_house_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(150) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gioco`
--
ALTER TABLE `gioco`
  ADD CONSTRAINT `gioco_ibfk_1` FOREIGN KEY (`software_house_id`) REFERENCES `software_house` (`software_house_id`),
  ADD CONSTRAINT `user_game` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `software_house`
--
ALTER TABLE `software_house`
  ADD CONSTRAINT `user_sh` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
