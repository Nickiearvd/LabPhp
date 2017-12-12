-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 12 dec 2017 kl 10:06
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `library`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`) VALUES
(1, 'Wordpress for you', 'Johan Kohlin', 1),
(2, 'PHP the easy way', 'John Bauer', 1),
(3, 'The big bad wolf', 'R. K. Rowling', 1),
(7, 'aa', 'BBb', 1),
(10, 'niiii', 'bla', 1),
(11, 'dwdwd', 'dwdw', 0),
(16, 'ssss', 'ssss', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `Userinfo`
--

CREATE TABLE `Userinfo` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Userpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Userinfo`
--

INSERT INTO `Userinfo` (`Userid`, `Username`, `Userpass`) VALUES
(2, 'Nickie', 'd1b8e8a83c59affeb026d1f247ddd627fc760b0c'),
(3, 'Anna', '91c98db1b1ec11c8527417afeb755d8d93694cae'),
(5, 'Nickie', '7810fd5cb38665db76a86d08f5444c3c9c864cff');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Index för tabell `Userinfo`
--
ALTER TABLE `Userinfo`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT för tabell `Userinfo`
--
ALTER TABLE `Userinfo`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;