-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 08:23 PM
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
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL,
  `answer` mediumtext NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`, `votes`, `datetime`) VALUES
(1, 'TEST_ANSWER.', 1, 2, 0, '0000-00-00 00:00:00'),
(2, 'TEST_ANSWER.', 1, 3, 0, '0000-00-00 00:00:00'),
(3, 'TEST_ANSWER.', 2, 1, 0, '0000-00-00 00:00:00'),
(4, 'TEST_ANSWER.', 2, 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `topic` varchar(32) NOT NULL,
  `content` mediumtext NOT NULL,
  `Upvotes` mediumint(9) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `topic`, `content`, `Upvotes`, `Downvotes`, `user_id`, `title`, `datetime`, `views`) VALUES
(1, 'agr', 'HI', 0, 0, 1, 'hello', '2016-02-10 17:44:23', 5),
(2, 'anp', 'HI', 10, 5, 1, 'helli', '2016-02-10 17:44:23', 132),
(3, 'agr', 'BYE', 0, 0, 2, 'helle', '2016-02-10 17:44:23', 4),
(4, 'anp', 'blah', 5, 3, 1, 'blahish', '2016-02-10 17:44:23', 26),
(5, 'agr', 'nnnn', 98, 78, 1, 't4tyf', '2016-02-10 17:44:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_vote_rel`
--

CREATE TABLE IF NOT EXISTS `article_vote_rel` (
  `article_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `up_down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_articles`
--

CREATE TABLE IF NOT EXISTS `comments_articles` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_articles`
--

INSERT INTO `comments_articles` (`id`, `comment`, `user_id`, `article_id`, `Upvotes`, `Downvotes`, `datetime`) VALUES
(1, '!stcomment', 1, 2, 5, 5, '2016-01-05 01:21:56'),
(2, '1st comment', 1, 4, 29, 20, '2016-01-05 01:21:56'),
(7, 'qwerty', 2, 4, 1, 1, '2016-01-10 02:50:13'),
(8, 'qwerty', 2, 2, 0, 0, '2016-01-10 02:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments_questions`
--

CREATE TABLE IF NOT EXISTS `comments_questions` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_questions`
--

INSERT INTO `comments_questions` (`id`, `comment`, `user_id`, `question_id`, `Upvotes`, `Downvotes`, `datetime`) VALUES
(1, 'HEY!!HAppy New Year', 2, 1, 0, 0, '2016-01-01 23:53:40'),
(2, 'YO!Panky Happy new Year!!', 3, 1, 0, 0, '2016-01-01 23:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments_reply`
--

CREATE TABLE IF NOT EXISTS `comments_reply` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_reply`
--

INSERT INTO `comments_reply` (`id`, `comment`, `user_id`, `comment_id`, `Upvotes`, `Downvotes`, `datetime`) VALUES
(1, '!streply', 1, 8, 5, 5, '2016-01-05 01:21:56'),
(2, '1st reply', 1, 2, 29, 20, '2016-01-05 01:21:56'),
(7, 'qwertyreply', 2, 2, 1, 1, '2016-01-10 02:50:13'),
(8, 'qwertyreply', 2, 2, 0, 0, '2016-01-10 02:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `comment_vote_rel`
--

CREATE TABLE IF NOT EXISTS `comment_vote_rel` (
  `comment_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `up_down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tag_rel`
--

CREATE TABLE IF NOT EXISTS `tag_rel` (
  `article_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_rel`
--

INSERT INTO `tag_rel` (`article_id`, `Topic_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag_rel_questions`
--

CREATE TABLE IF NOT EXISTS `tag_rel_questions` (
  `question_id` bigint(20) NOT NULL,
  `Topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `article_vote_rel`
--
ALTER TABLE `article_vote_rel`
  ADD KEY `user_id` (`user_id`), ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comments_articles`
--
ALTER TABLE `comments_articles`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`article_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `comments_questions`
--
ALTER TABLE `comments_questions`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`question_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`comment_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `comment_vote_rel`
--
ALTER TABLE `comment_vote_rel`
  ADD KEY `comment_id` (`comment_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_users` (`user_id`);

--
-- Indexes for table `tag_rel`
--
ALTER TABLE `tag_rel`
  ADD KEY `topic` (`Topic_id`), ADD KEY `article` (`article_id`);

--
-- Indexes for table `tag_rel_questions`
--
ALTER TABLE `tag_rel_questions`
  ADD KEY `question_id` (`question_id`), ADD KEY `Topic_id` (`Topic_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments_articles`
--
ALTER TABLE `comments_articles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments_questions`
--
ALTER TABLE `comments_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- Constraints for table `article_vote_rel`
--
ALTER TABLE `article_vote_rel`
ADD CONSTRAINT `fkey_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fkey_usersid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_questions`
--
ALTER TABLE `comments_questions`
ADD CONSTRAINT `fk_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_vote_rel`
--
ALTER TABLE `comment_vote_rel`
ADD CONSTRAINT `fk_comments` FOREIGN KEY (`comment_id`) REFERENCES `comments_articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fkey_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_rel`
--
ALTER TABLE `tag_rel`
ADD CONSTRAINT `fk_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_topic` FOREIGN KEY (`Topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
