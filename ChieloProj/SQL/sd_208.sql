-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 10:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_208`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `ootd` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `date`, `time`, `location`, `ootd`, `created_at`, `userID`) VALUES
(38, 'Chielo Elguerra', '2023-10-27', '23:27:00', 'Cebu ', 'asffgfgf', '2023-10-06 11:23:25', 58),
(39, 'Sheila Elguerra', '2023-10-20', '12:30:00', 'bbb', 'adddd', '2023-10-06 11:25:57', 0),
(40, 'Alo Elguerra', '2023-11-04', '12:48:00', 'Cebu ', 'adfdgdg', '2023-10-06 11:43:53', 0),
(41, 'Chielo Elguerra', '2023-10-03', '23:45:00', 'Paris', 'Jeans good', '2023-10-06 11:45:32', 0),
(42, 'Catherine VIdas', '2023-10-11', '15:56:00', 'Cebuu', 'sfgd jhfd jdfg', '2023-10-11 07:56:29', 0),
(43, 'Chielo Elguerra', '2023-10-09', '03:57:00', 'agfgfd', 'hdghgjfj', '2023-10-11 07:57:13', 0),
(44, 'Vidas', '2023-10-11', '16:23:00', 'sad', 'sd', '2023-10-11 08:24:05', 0),
(49, 'Catherine', '2023-10-11', '17:37:00', 'saad', 'fasfasfsdf', '2023-10-11 09:37:17', 1),
(50, 'saf', '2023-10-11', '17:38:00', 'sdf', 'sdf', '2023-10-11 09:38:48', 0),
(51, 'asd', '2023-10-11', '17:45:00', 'sdf', 'sdf', '2023-10-11 09:45:07', 1),
(52, 'Elguerra', '2023-10-12', '17:50:00', 'sa', 'asf', '2023-10-11 09:50:43', 1),
(53, 'Vidas', '2023-10-06', '17:51:00', 'asfd', 'sdf', '2023-10-11 09:51:04', 1),
(54, 'asdsdf', '2023-10-12', '17:51:00', 'sdf', 'sdf', '2023-10-11 09:51:51', 1),
(56, 'rytrty', '2023-10-10', '06:03:00', 'rty', 'hahhah', '2023-10-11 10:03:32', 1),
(57, 'asf', '2023-10-06', '06:07:00', 'ewr', 'sdf', '2023-10-11 10:07:56', 1),
(58, 'Vidas', '2023-10-12', '18:54:00', 'asd', 'sadf', '2023-10-11 10:54:19', 58),
(60, 'Badie Elguerra', '2023-10-12', '19:15:00', 'Barili philippines', 'bvlgari dress', '2023-10-11 11:15:15', 55),
(63, 'James Walter Tampoy', '2023-10-12', '00:02:00', 'USC', 'Uniform', '2023-10-12 04:02:52', 69);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','others') NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `role`, `gender`, `login_status`) VALUES
(54, 'Sheila Elguerra', 'sheila@gmail.com', '$2y$10$MaFc8vkT5ZM61sTgzRDIf.T1Il1kFhf2ij3sTNFg8ba1q4pMXYeCO', 'user', 'female', 0),
(55, 'Badie Elguerra', 'badie@gmail.com', '$2y$10$rKFia4vC7cuqALGE32jfnOlZYIBDpBPIGfuZoJcesyTb0L5hNKnVq', 'user', 'female', 0),
(58, 'Albert Elguerra', 'albert@gmail.com', '$2y$10$luuCxcnLTc2He2BuP34ZDugy2URAmdn1v3moBA5lUNfzgZkj7bgAm', 'user', 'male', 0),
(59, 'Renelie Arcilla', 'renelie@gmail.com', '$2y$10$RS9v1sZhH5NH6Bs5HuCDQuyP7KavWLw3Lea11JrFVJj14Oc8zf3vi', 'admin', 'female', 0),
(60, 'kapoy', 'kapoy@gmail.com', '$2y$10$SM5rCZPNVACwwPceaJc6LOQHK/zNfHEUE1w3HBI82uca3B4xJlcBi', 'admin', 'male', 0),
(61, 'Catherine Vidas', 'cath@gmail.com', '$2y$10$s4T8O/nJY0QxFXVjroejUu2E1H34oRj1KVwUuWWuPIA2sXCxs2M0e', 'user', 'female', 0),
(67, 'Chielo Elguerra', 'chielo@gmail.com', '$2y$10$Y2nh6Ilz56FXNl1toktrdetkaLi8t/uH7zAs3ZX0PySnwyEjclELi', 'admin', 'female', 0),
(69, 'Danica Belia', 'danica@gmail.com', '$2y$10$9PKo9yckRTLa.fNQ.4yRyeRqQIhnSnpkHWdP1KSWaAPGCgQxg/Udy', 'user', 'female', 0),
(70, 'Alo Elguerra', 'alo@gmail.com', '$2y$10$93wafalBN.X6xATTLabSZuSsaBWdWEFnO3meb0iphxwms0Bx906t.', 'admin', 'male', 0),
(71, 'rovelyn ', 'rovs@gmail.com', '$2y$10$vQ9ilAzF1tRysl7bEspSLOEmn63I/AEniCbwRGfe1S4HrjPoOZAr6', 'admin', 'female', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
