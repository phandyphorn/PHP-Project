-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 02:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cruds`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id_fri` int(11) NOT NULL,
  `name_fri` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id_fri`, `name_fri`, `id_user`) VALUES
(24, 'Dyna', 3),
(25, 'Bopha', 3),
(26, 'Dody', 3),
(28, 'Meta', 3),
(29, 'Dana', 3),
(30, 'Sa', 3),
(31, 'Sros', 3),
(32, 'Dava', 3),
(33, 'Donka', 3),
(34, 'Rosa', 3),
(35, 'Coca', 3),
(36, 'Sara', 3),
(37, 'Sofa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `posofuser`
-- (See below for the actual view)
--
CREATE TABLE `posofuser` (
`gender_gender` varchar(1)
,`email_user` varchar(50)
,`dateofbirth_user` varchar(50)
,`name` varchar(100)
,`password_user` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `userposts`
--

CREATE TABLE `userposts` (
  `id_post` int(11) NOT NULL,
  `description_post` varchar(1000) DEFAULT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `images` varchar(225) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userposts`
--

INSERT INTO `userposts` (`id_post`, `description_post`, `date_post`, `images`, `id_user`) VALUES
(106, ' I am a girl.', '2022-03-21 12:39:30', 'image-62296af7108246.04371375.jpg', 2),
(107, ' I am a boy.', '2022-03-21 12:39:46', 'image_2022_02_24T08_03_29_908Z.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender_gender` varchar(1) DEFAULT NULL,
  `age_user` int(11) DEFAULT NULL,
  `phonenumber_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `password_user` varchar(50) DEFAULT NULL,
  `dateofbirth_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `gender_gender`, `age_user`, `phonenumber_user`, `email_user`, `password_user`, `dateofbirth_user`) VALUES
(2, 'Dara', 'M', NULL, NULL, 'dara@gmail.com', '123ert', NULL),
(3, 'Pheak', 'M', NULL, NULL, 'pheak@gmail.com', 'p3535', NULL),
(4, 'Dara', 'M', NULL, NULL, 'dara@gmail.com', '123ert', NULL),
(6, 'Pheak', 'M', NULL, NULL, 'pheak@gmail.com', '567tyu', '2022-02-28'),
(8, 'sarath', 'M', NULL, NULL, 'sarath@gmail.com', '1234', '2022-03-23'),
(9, ' Star', 'M', NULL, NULL, 'star@gmail.com', '1234d', ''),
(11, ' Star', 'F', NULL, NULL, 'pheak@gmail.com', '23', '2022-03-01'),
(12, 'dy', 'F', NULL, NULL, 'dy@gmail.com', '45', '2022-03-02'),
(13, 'Kea', 'F', NULL, NULL, 'Kea@gmail.com', '12', '2022-03-02');

-- --------------------------------------------------------

--
-- Structure for view `posofuser`
--
DROP TABLE IF EXISTS `posofuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `posofuser`  AS SELECT `users`.`gender_gender` AS `gender_gender`, `users`.`email_user` AS `email_user`, `users`.`dateofbirth_user` AS `dateofbirth_user`, `users`.`name` AS `name`, `users`.`password_user` AS `password_user` FROM (`users` join `userposts` on(`userposts`.`id_user` = `users`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id_fri`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id_fri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `userposts`
--
ALTER TABLE `userposts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `userposts` (`id_post`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `userposts` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `userposts`
--
ALTER TABLE `userposts`
  ADD CONSTRAINT `userposts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
