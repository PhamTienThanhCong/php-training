-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 02:18 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `image`) VALUES
(1, 'admin', '$2y$10$dGkb//GScL1Sfuzfo5h1kuVKYiq1FrXkQ1dDkmI3qVsMlJ9ms0ZFW', 'admin là cô Liên', '25403372106591_1330520264505823_6481516926901760163_n.jpg'),
(2, 'admin', '$2y$10$mBJ1yh6yZOGpqtvaFnv73eeMUZprb9h8jrIAzCMaudnu0WP.fBr8S', '123', '19239371907351_843701917037322_1851765085117582895_n'),
(3, 'cong', '$2y$10$Q0aM.3erS9SDXm8dQkc2SOAIsDaid7twRiB3i1TUzDPGnz7r6kiau', 'pham tien thanh cong ne', '32328372106591_1330520264505823_6481516926901760163_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
