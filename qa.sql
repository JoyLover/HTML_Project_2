-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2018 at 03:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `A_id` int(11) NOT NULL,
  `A_content` varchar(500) NOT NULL,
  `A_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `A_rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Answers`
--

INSERT INTO ANSWERS (A_ID, A_CONTENT, A_TIME, RATING) VALUES
(2, 'The Saxon Garden', '2018-04-12 03:22:17', 0),
(3, 'Saxon Garden', '2018-04-12 05:24:29', 0),
(22, 'kinder garden', '2018-04-12 12:24:34', 0),
(23, 'i love you', '2018-04-12 12:47:05', 0),
(28, 'Warsaw University of Technology', '2018-04-13 01:35:04', 2),
(29, 'maybe Warsaw University of Technology', '2018-04-13 01:35:27', -3);

-- --------------------------------------------------------

--
-- Table structure for table `QandA`
--

CREATE TABLE `QandA` (
  `A_id` int(11) NOT NULL,
  `Q_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `QandA`
--

INSERT INTO Q_A (`A_id`, `Q_id`) VALUES
(2, 13),
(3, 13),
(22, 13),
(23, 13),
(28, 30),
(29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `Q_id` int(11) NOT NULL,
  `Q_content` varchar(500) NOT NULL,
  `Q_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAnswered` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Questions`
--

INSERT INTO QUESTIONS (Q_ID, Q_CONTENT, Q_TIME, IS_ANSWERED) VALUES
(5, 'Who was one of the most famous people born in Warsaw?', '2018-04-11 07:21:24', 0),
(6, 'Who was Frédéric Chopin?', '2018-04-11 07:21:47', 0),
(13, 'What garden was formally only for royalty?', '2018-04-11 14:39:52', 1),
(29, 'how much is this one ?', '2018-04-13 01:28:21', 0),
(30, 'What is the second academic school of technology in Poland?', '2018-04-13 01:34:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE ANSWERS
  ADD PRIMARY KEY (A_ID);

--
-- Indexes for table `QandA`
--
ALTER TABLE Q_A
  ADD PRIMARY KEY (`A_id`,`Q_id`),
  ADD KEY `qanda_ibfk_2` (`Q_id`);

--
-- Indexes for table `Questions`
--
ALTER TABLE QUESTIONS
  ADD PRIMARY KEY (Q_ID),
  ADD KEY `Questions_Q_id_index` (Q_ID);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answers`
--
ALTER TABLE ANSWERS
  MODIFY A_ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE QUESTIONS
  MODIFY Q_ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `QandA`
--
ALTER TABLE Q_A
  ADD CONSTRAINT `QandA_Answers_A_id_fk` FOREIGN KEY (`A_id`) REFERENCES ANSWERS (A_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qanda_ibfk_2` FOREIGN KEY (`Q_id`) REFERENCES QUESTIONS (Q_ID) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
