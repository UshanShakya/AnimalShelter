-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 06:05 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwdatabase`
--
CREATE DATABASE IF NOT EXISTS `dwdatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dwdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `animals_table`
--

CREATE TABLE `animals_table` (
  `aid` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Animal_name` varchar(50) NOT NULL,
  `Breed` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Age` int(30) NOT NULL,
  `Weight` int(20) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Entry_date` date NOT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals_table`
--

INSERT INTO `animals_table` (`aid`, `Type`, `Animal_name`, `Breed`, `Gender`, `Age`, `Weight`, `Color`, `Entry_date`, `Picture`) VALUES
(1, 'Dog', 'Sere', 'German shephard', 'Male', 3, 40, 'Black and Brown', '2018-02-12', 'Image1.jpg'),
(2, 'Dog', 'Lucy', 'Japanese Spitz', 'Female', 1, 20, 'White', '2018-04-06', 'Image2.jpg'),
(3, 'Cat', 'Siri', 'Japanese bobtail', 'Female', 1, 25, 'White and brown', '2018-03-12', 'Image3.jpg'),
(4, 'Dog', 'John', 'Japanese Spitz', 'Female', 2, 34, 'White,black and brown', '2018-04-12', 'Image4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `answer_table`
--

CREATE TABLE `answer_table` (
  `aid` int(11) NOT NULL,
  `Answer` varchar(200) NOT NULL,
  `qids` int(50) NOT NULL,
  `Answerby` varchar(50) NOT NULL,
  `userid` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_table`
--

INSERT INTO `answer_table` (`aid`, `Answer`, `qids`, `Answerby`, `userid`) VALUES
(1, 'Service animals are not required to wear any identifying items like vests or badges, nor is a service animal handler required to present certification or proof that a dog is a service animal. ', 1, 'bindu Shrestha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `id` int(11) NOT NULL,
  `animalid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter_table`
--

CREATE TABLE `counter_table` (
  `countid` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_table`
--

INSERT INTO `counter_table` (`countid`, `counter`) VALUES
(1, 181);

-- --------------------------------------------------------

--
-- Table structure for table `donation_table`
--

CREATE TABLE `donation_table` (
  `did` int(11) NOT NULL,
  `Donar_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_table`
--

INSERT INTO `donation_table` (`did`, `Donar_name`, `Email`, `Amount`) VALUES
(1, 'bindu Shrestha', 'Bindushre@gmail.com', 50000),
(2, 'Kanchan Aryal', 'kanchanaryal12@gmail.com', 10000),
(3, 'Samuel Lama', 'samuellama13@gmail.com', 5000),
(4, 'Saroj Rokka', 'rokkasaroj3@gmail.com', 15000),
(5, 'Saroj Rokka', 'rokkasaroj3@gmail.com', 500);

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `qid` int(11) NOT NULL,
  `Question` varchar(300) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`qid`, `Question`, `Username`) VALUES
(1, 'How can I tell if a dog is a service animal or just a pet? ', 'Saroj Rokka');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Postal_Code` int(10) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Signup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `Name`, `Address`, `DOB`, `Gender`, `Phone`, `Email`, `Postal_Code`, `Account`, `Password`, `Type`, `Signup_date`) VALUES
(1, 'Sujan Maharjan', 'Sunakothi', '1992-09-11', 'Male', '984924142', 'serenadesan10@gmail.com', 12345, 'Admin', 'Admin', 'Admin', '2018-04-01'),
(2, 'Saroj Rokka', 'Nakkhu', '1993-05-21', 'Male', '9842153255', 'rokkasaroj3@gmail.com', 21345, 'saroj', 'saroj', 'User', '2018-04-03'),
(3, 'bindu Shrestha', 'Nakkhu', '1997-10-15', 'Female', '9842456512', 'Bindushre@gmail.com', 21345, 'bindu', 'bindu', 'User', '2018-04-10'),
(4, 'Kanchan Aryal', 'Kokhana', '1995-10-13', 'Female', '9841245562', 'kanchanaryal12@gmail.com', 21024, 'kanchan', '125', 'User', '2018-04-16'),
(5, 'Samuel Lama', 'Satdobato', '1993-02-12', 'Male', '9814213252', 'samuellama13@gmail.com', 123451, 'samuel', 'samuel', 'User', '2018-04-16'),
(7, 'Reetika Magar', 'bhasipati', '1998-01-03', 'Female', '9821453212', 'reetikamhj1@gmail.com', 23124, 'reetika', '123456', 'User', '2018-04-16'),
(8, 'cvXVZdadfs', 'Sunakothi', '2018-04-13', 'Male', '9', 'sujanmaharjan14@yahoo.com', 6, 'bindu', 'sdfsfs', 'User', '2018-04-16'),
(9, '', '', '0000-00-00', '', '', '', 0, '', '', 'User', '0000-00-00'),
(10, 's', 's', '2018-04-05', 'Male', '5', 'samuellama13@gmail.com', 515132, 's', 'bindu', 'User', '2018-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals_table`
--
ALTER TABLE `animals_table`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `answer_table`
--
ALTER TABLE `answer_table`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_table`
--
ALTER TABLE `counter_table`
  ADD PRIMARY KEY (`countid`);

--
-- Indexes for table `donation_table`
--
ALTER TABLE `donation_table`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals_table`
--
ALTER TABLE `animals_table`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `answer_table`
--
ALTER TABLE `answer_table`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counter_table`
--
ALTER TABLE `counter_table`
  MODIFY `countid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donation_table`
--
ALTER TABLE `donation_table`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
