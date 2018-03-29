-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 06:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iblog_noon`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_image` varchar(255) NOT NULL,
  `ads_jscode` varchar(1000) NOT NULL,
  `ads_showtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_image`, `ads_jscode`, `ads_showtype`) VALUES
(1, 'partner2.jpg', '', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_ip` varchar(255) NOT NULL,
  `comment` varchar(3000) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `name`, `email`, `website`, `subject`, `comment_date`, `comment_ip`, `comment`, `post_id`, `comment_parent`) VALUES
(2, 1, 'mizan', 'mzian@mzian.com', 'mzian@mizan.in', 'comment one', '2017-11-29 11:40:43', '', 'kajlugsliuguh;jkjksbdlgkjbldkgjdfkgsjb', 1, 1),
(3, 1, 'mizan', 'mizan@mizan.com', 'mzian@mzian.in', 'reply', '2017-11-29 11:43:09', '', 'snkgjlskjgsdf', 1, 1),
(5, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 10:58:47', '::1', 'zhdfjhsgdfkjh', 1, 1),
(6, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 11:00:09', '::1', 'zhdfjhsgdfkjh', 1, 1),
(7, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 11:03:33', '::1', 'ggdgfcjhggvkjhvhdjxnggn hvjgcgc', 1, 1),
(8, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 11:04:32', '::1', 'ggdgfcjhggvkjhvhdjxnggn hvjgcgc', 1, 1),
(9, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 11:06:39', '::1', 'dgcjhgvuuhvuuyfjggfjgh', 1, 1),
(10, 0, 'adil', 'adil@adil.com', '', '', '2017-12-02 11:16:13', '1', 'jhgfadjahb', 1, 1),
(11, 0, 'john', 'jon@john.com', '', '', '2017-12-02 11:16:44', '10', 'akjgfousgjohn', 1, 10),
(12, 0, 'jobaywer', 'jobayer@gnm.gh', '', '', '2017-12-02 15:26:32', '1', 'asdfghjkl', 1, 1),
(13, 0, 'john', 'john@ghj.bn', '', '', '2017-12-02 16:04:46', '5', 'ajhofufgsdfgjbej', 1, 5),
(14, 0, 'mizan', 'mzian@ghj.FGH', '', '', '2017-12-02 16:22:27', '<br />\r\n<b>Notice</b>:  Undefined index: reply_comment_id in <b>C:\\xampp\\htdocs\\Incubator\\CLASS\\Class_14(project)\\iblog_final_class(edited)\\viewpost.php</b> on line <b>187</b><br />\r\n', 'kjjfhsoiuhsfjg\r\n', 1, 0),
(15, 0, 'john', 'john@hj.HJ', '', '', '2017-12-02 16:22:44', '14', 'dfghjk284', 1, 14),
(16, 0, 'adil', 'adil@g.com', '', '', '2017-12-03 09:10:13', '14', 'adil\r\nadil\r\nadil', 1, 14),
(17, 0, 'jobayer', 'j@g.c', '', '', '2017-12-03 09:10:44', '15', 'jobayer\r\njobayer\r\njobayer', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_link` varchar(3000) NOT NULL DEFAULT '#',
  `menu_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `menu_link`, `menu_parent`) VALUES
(1, 'Home', '#', 0),
(2, 'About Us', '#', 0),
(3, 'PHP', '#', 0),
(4, 'Wordpress', '#', 3),
(5, 'Joomla', '#', 3),
(6, 'Mobile Development', '#', 0),
(7, 'Android', '#', 6),
(8, 'iphone', '#', 6),
(9, 'Joomla 1.5', '#', 5),
(10, 'Joomla 2.5', '#', 5),
(11, 'wp 2.5', 'home.php', 4),
(12, 'joomla 5.5', 'home.php', 5),
(14, 'Admin', 'http://localhost/Incubator/CLASS/Class_14(project)/iblog_final_class(edited)/dashboard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_thumbnail` varchar(300) NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `user_id`, `post_date`, `post_thumbnail`, `post_content`) VALUES
(1, 'Hello World of Aliens!', 1, '2017-11-13 13:05:31', 'mizan.jpg', 'Mashrafe Bin Mortaza (Bengali: মাশরাফি বিন মুর্তজা) (born 5 October 1983 in Narail District) is a Bangladeshi international cricketer, and current captain of the One Day Internationals for Bangladesh national cricket team. He is also a former T20I captain, until his retirement. He broke into the national side in late 2001 against Zimbabwe and represented Bangladesh before having played a single first-class match. Mortaza captained his country in one Test and seven One Day Internationals (ODIs) between 2009 and 2010, however injury meant he was in and out of the side and Shakib Al Hasan was appointed captain in Mortaza\'s absence.\n\nMortaza used to be considered one of the fastest bowlers produced by Bangladesh, previously bowling in the mid-135s km/h in the 2000s,[3] and regularly opens the bowling. He is a useful lower-middle order batsman, with a first-class century and three Test half centuries to his name. Mortaza\'s career has been hampered by injuries and he has undergone a total of ten operations on his knees and ankles.'),
(3, 'How to present yourself', 16, '2017-12-02 19:47:46', 'personal-info.jpg', '<p>kjdfakjhgjhzkdjfhgsrgiuysifgbk</p>\r\n\r\n<p>jzhdgfkjhsgfdkjhgalkjsdgflkjsgd</p>\r\n\r\n<p>hfgsdfhbgjshdcbjkhxjhr154651</p>\r\n\r\n<p>651zasbdgjhbzs45654651</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_description` varchar(2000) NOT NULL,
  `site_slogan` varchar(255) NOT NULL,
  `site_admin_email` varchar(100) NOT NULL,
  `site_banner_ad` varchar(255) NOT NULL,
  `post_per_page` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`site_id`, `site_name`, `site_logo`, `site_url`, `site_description`, `site_slogan`, `site_admin_email`, `site_banner_ad`, `post_per_page`) VALUES
(1, 'Blog', 'partner1.png', 'http://localhost/Incubator/CLASS/Class_14(project)/iblog_final_class(edited)/index.php', 'educative blog', 'Express urself', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `activation_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `active`, `activation_hash`, `email`) VALUES
(1, 'mizan', '2c8ad9e0f3ab70bc0840c20d62b5d3a6', 1, 0, 'asdjaosdjap', 'mizan@technocrews.com'),
(12, 'bablo', '498c46f1311541969e2dd52dd378feed', 0, 0, '', 'bablo@bablo.com'),
(13, 'tonmoy', 'd337c17deb8203329c39b5ec515b334b', 1, 1, '', 'tonmoy@tonmoy.com'),
(14, 'bablo2', '2486dfb1323eed42df3e79b5f87a0e68', 1, 1, '', 'bablo2@bablo.com'),
(15, 'imran', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7', 2, 1, '', 'imran@imran.com'),
(16, 'jobayer', '98e0a19ab981f1a3ea50b0d71c342350', 1, 1, '', 'jobayer@jobayer.com'),
(17, 'amal', 'd62d41cf17704ddd6cb22c9688130f73', 0, 0, '', 'amal@gmail.com'),
(19, 'lina', '528a3c500e49e8d14159dd2935ee36a1', 0, 0, '', 'lina@gmail.com'),
(20, 'bina', '1738cd9f6b4b6e8a64107642c80c07a2', 0, 0, '', 'bina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `short_bio` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `facebook_username` varchar(255) NOT NULL,
  `twitter_handle` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `profile_pic`, `short_bio`, `bio`, `facebook_username`, `twitter_handle`, `website`, `address`) VALUES
(2, 16, '  Jobayer', 'ahmed', 'khan', 'abc.jpg', 'nice person', 'helpful', 'jobayer.15', '', '', 'chittagong'),
(3, 1, 'Mizanur', 'Rahman', 'Mizan', '', 'Mentor', 'teacher', '', '', '', 'chittagong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`,`post_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
