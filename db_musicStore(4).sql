-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2018 at 02:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_musicStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_albums`
--

CREATE TABLE `tbl_albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `yearReleased` year(4) NOT NULL,
  `artist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_albums`
--

INSERT INTO `tbl_albums` (`id`, `title`, `yearReleased`, `artist_id`) VALUES
(1, 'Psy 6', 2012, 2),
(2, 'Trip', 1996, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artists`
--

CREATE TABLE `tbl_artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artists`
--

INSERT INTO `tbl_artists` (`id`, `name`) VALUES
(1, 'Rivermaya'),
(2, 'Psy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlists`
--

CREATE TABLE `tbl_playlists` (
  `id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_songs`
--

CREATE TABLE `tbl_songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `length` int(11) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_songs`
--

INSERT INTO `tbl_songs` (`id`, `title`, `length`, `genre`, `album_id`, `artist_id`) VALUES
(1, 'Gangnam Style', 253, 'k-pop', 2, 2),
(2, 'Kundiman', 250, 'OPM', 1, 1),
(3, 'Kisapmata', 250, 'OPM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_songs_playlists`
--

CREATE TABLE `tbl_songs_playlists` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`) VALUES
(14, 'jem', 'jem'),
(15, 'max', 'doge234'),
(16, 'doge234', 'fdsfs'),
(17, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(18, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(19, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_albums`
--
ALTER TABLE `tbl_albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `tbl_artists`
--
ALTER TABLE `tbl_artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_playlists`
--
ALTER TABLE `tbl_playlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_songs`
--
ALTER TABLE `tbl_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `tbl_songs_playlists`
--
ALTER TABLE `tbl_songs_playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_albums`
--
ALTER TABLE `tbl_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_artists`
--
ALTER TABLE `tbl_artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_playlists`
--
ALTER TABLE `tbl_playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_songs`
--
ALTER TABLE `tbl_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_songs_playlists`
--
ALTER TABLE `tbl_songs_playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_albums`
--
ALTER TABLE `tbl_albums`
  ADD CONSTRAINT `tbl_albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `tbl_artists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_playlists`
--
ALTER TABLE `tbl_playlists`
  ADD CONSTRAINT `tbl_playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_songs`
--
ALTER TABLE `tbl_songs`
  ADD CONSTRAINT `tbl_songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tbl_albums` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_songs_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `tbl_artists` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_songs_playlists`
--
ALTER TABLE `tbl_songs_playlists`
  ADD CONSTRAINT `tbl_songs_playlists_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `tbl_songs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_songs_playlists_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `tbl_playlists` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
