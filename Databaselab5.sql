-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 03:06 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`) VALUES
(1, 'Wordpress for you', 'Johan Kohlin', 1),
(2, 'PHP the easy way', 'John Bauer', 1),
(3, 'The big bad wolf', 'R. K. Rowling', 1),
(4, 'No Idea', 'Nolan Ideos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Userinfo`
--

CREATE TABLE `Userinfo` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Userpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Userinfo`
--

INSERT INTO `Userinfo` (`Userid`, `Username`, `Userpass`) VALUES
(2, 'Nickie', 'd1b8e8a83c59affeb026d1f247ddd627fc760b0c'),
(3, 'Anna', '91c98db1b1ec11c8527417afeb755d8d93694cae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `Userinfo`
--
ALTER TABLE `Userinfo`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Userinfo`
--
ALTER TABLE `Userinfo`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;