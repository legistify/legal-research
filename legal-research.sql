-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2016 at 07:24 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legal-research`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) NOT NULL,
  `topic` varchar(32) NOT NULL,
  `content` mediumtext NOT NULL,
  `votes` mediumint(9) NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `topic`, `content`, `votes`, `user_id`, `title`) VALUES
(1, 'agr', 'HI', 0, 1, 'hello'),
(2, 'anp', 'HI', 0, 1, 'helli'),
(3, 'agr', 'BYE', 0, 2, 'helle');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `question_id`, `votes`, `datetime`) VALUES
(1, 'HEY!!HAppy New Year', 2, 1, 0, '2016-01-01 23:53:40'),
(2, 'YO!Panky Happy new Year!!', 3, 1, 0, '2016-01-01 23:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `votes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `votes`, `datetime`, `tag`) VALUES
(1, 'T1', 'hhkdhak', 1, 0, '2016-01-01 23:52:07', 'anp'),
(2, 'T2', 'kjkhkm', 2, 0, '2016-01-01 23:52:07', 'anp');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `tag` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `tag`) VALUES
(1, 'ANP', 'anp'),
(2, 'AGRDEED', 'agr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(64) NOT NULL,
  `reset_pass` varchar(64) DEFAULT NULL,
  `user_type` char(2) NOT NULL,
  `url` text NOT NULL,
  `first_time` tinyint(4) NOT NULL DEFAULT '1',
  `free_doc` tinyint(4) NOT NULL DEFAULT '1',
  `promo_code` varchar(20) DEFAULT NULL,
  `package_subscribed` int(10) NOT NULL,
  `package_docs` int(11) NOT NULL,
  `package_begindate` datetime NOT NULL,
  `package_enddate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `password`, `is_activated`, `activation_key`, `reset_pass`, `user_type`, `url`, `first_time`, `free_doc`, `promo_code`, `package_subscribed`, `package_docs`, `package_begindate`, `package_enddate`) VALUES
(1, 'pankaj.arora1994@gmail.com', 'pankaj', 'Arora', 'pankaj.arora1994@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', '', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'pankaj.arora1994', 'pankaj', 'Arora', 'pankaj.arora1995@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', 'l', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'pankaj.arora', 'pankaj', 'Arora', 'pankaj.arora1996@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', 's', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_lawyer`
--

CREATE TABLE IF NOT EXISTS `user_lawyer` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `acc_type` varchar(64) NOT NULL DEFAULT 'Advocate',
  `phone` varchar(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `school` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `practice_areas` varchar(200) NOT NULL,
  `court` varchar(100) NOT NULL,
  `office_address` text NOT NULL,
  `work_exp` text NOT NULL,
  `achievements` text NOT NULL,
  `summary` text NOT NULL,
  `associations` text NOT NULL,
  `council_id` varchar(12) NOT NULL,
  `publication` text NOT NULL,
  `date` date NOT NULL,
  `office_number` int(15) NOT NULL,
  `personal_num` int(15) NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT 'No website to show',
  `google_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `consultation_fees` int(64) NOT NULL,
  `review_fees` int(64) NOT NULL,
  `preference` text NOT NULL,
  `pic_link` varchar(255) NOT NULL DEFAULT 'img/def_pic.png',
  `practice_city` varchar(100) NOT NULL,
  `practice_state` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_lawyer`
--

INSERT INTO `user_lawyer` (`id`, `username`, `acc_type`, `phone`, `age`, `sex`, `school`, `college`, `practice_areas`, `court`, `office_address`, `work_exp`, `achievements`, `summary`, `associations`, `council_id`, `publication`, `date`, `office_number`, `personal_num`, `website`, `google_link`, `linkedin_link`, `twitter_link`, `consultation_fees`, `review_fees`, `preference`, `pic_link`, `practice_city`, `practice_state`) VALUES
(1, 'psoqlmd', 'Advocate', 'p', 12, 'Male', 'p', 'p', 'opel', 'district court', 'p', 'p', 'p', 'p', 'p', '', 'p', '0000-00-00', 0, 0, 'No website to show', '', '', '', 0, 0, '', 'img/def_pic.png', 'p', 'p'),
(2, 'ppknolmlk.ml;', 'Advocate', 'p', 12, 'Male', 'p', 'p', 'saab', 'district court', 'p', 'p', 'p', 'p', 'p', '', 'p', '0000-00-00', 0, 0, 'No website to show', '', '', '', 0, 0, '', 'img/def_pic.png', 'p', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_articles` (`user_id`), ADD KEY `fk_topics` (`topic`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`question_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_users` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_lawyer`
--
ALTER TABLE `user_lawyer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_lawyer`
--
ALTER TABLE `user_lawyer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `fk_articles` FOREIGN KEY (`user_id`) REFERENCES `user_lawyer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_topics` FOREIGN KEY (`topic`) REFERENCES `topics` (`tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
