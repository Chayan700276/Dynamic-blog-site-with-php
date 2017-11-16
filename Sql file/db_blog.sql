-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 04:40 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'PHP '),
(2, 'HTML'),
(3, 'CSS'),
(4, 'JAVA'),
(5, 'EDUCATION'),
(7, 'Computer'),
(8, 'Developing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `date`, `status`) VALUES
(4, 'Chayan', 'Roy', 'chayanroycmt50@gmail.com', 'amar sonar', '2017-04-18 03:37:09', 1),
(5, 'Chayan', 'Roy', 'chayanroycmt50@gmail.com', 'ami tomay bhalobasi amar sonar bangla', '2017-04-18 03:37:09', 0),
(16, 'Chayan', 'Roy', 'chayanroycmt50@gmail.com', 'amar sonar bangla ami tomay bhalo basi chirodin tomar aksh tomar btash amar sonar bangla ami tomay bhalo', '2017-04-18 08:07:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `footer`) VALUES
(1, '&amp;copy; Copyright Chayan roy (Computer)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(5, 'About us', '<p>We are the student of thakurgaon polytechnic institute at computer technology... our session is 2013-2014. We wanted create this blog site .. ok thanks everyone.</p>'),
(16, 'Privacy', '<p>If anyone destroy our privacy .. we will punished him/her...</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `userid`, `date`) VALUES
(17, 1, 'This post about PHP', '<p>If you want to learn PHP ... You should be a hard working person... if you lazy you can not learn PHP properly... And one thinga you should have to internet connection in your pc... understand.. Otherwise it will be very challenging think to you for learning php .. Look at me.. i am a PHP learner but... not a best learner.. Bye</p>', 'upload/0fd17d93d9.jpg', 'Chayan roy', 'PHP programming', 9, '2017-04-24 05:35:37'),
(18, 2, 'This post about HTML', '<p>If you want to learn PHP ... You should be a hard working person... if you lazy you can not learn PHP properly... And one thinga you should have to internet connection in your pc... understand.. Otherwise it will be very challenging think to you for learning php .. Look at me.. i am a PHP learner but... not a best learner.. Bye</p>', 'upload/fd457191fd.jpg', 'Chayan roy', 'HTML coding', 9, '2017-04-24 05:37:23'),
(19, 3, 'This post about CSS', '<p>If you want to learn CSS... You should be a hard working person... if you lazy you can not learn CSSproperly... And one thinga you should have to internet connection in your pc... understand.. Otherwise it will be very challenging think to you for learning CSS.. Look at me.. i am a CSSlearner but... not a best learner.. Bye</p>', 'upload/4cb199a61b.jpg', 'Chayan roy', 'CSS coding', 9, '2017-04-24 05:38:39'),
(20, 4, 'This post about JAVA', '<p>If you want to learn JAVA... You should be a hard working person... if you lazy you can not learn JAVA properly... And one thinga you should have to internet connection in your pc... understand.. Otherwise it will be very challenging think to you for learning JAVA.. Look at me.. i am a JAVAlearner but... not a best learner.. Bye</p>', 'upload/795aaca1aa.jpg', 'Chayan roy', 'JAVA programming', 9, '2017-04-24 05:40:09'),
(21, 5, 'The Bloger Site 2017', '<p>If you want to learn PHP ... You should be a hard working person... if you lazy you can not learn PHP properly... And one thinga you should have to internet connection in your pc... understand.. Otherwise it will be very challenging think to you for learning php .. Look at me.. i am a PHP learner but... not a best learner.. Bye</p>', 'upload/52c760a5e6.jpg', 'Chayan roy', 'PHP programming', 9, '2017-04-24 05:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(1, 'This is slider no 1', 'upload/slider/3d2950072f.jpg'),
(5, 'This is slider no 2', 'upload/slider/09545a0633.jpg'),
(6, 'This is slider no 3', 'upload/slider/9e42db9ddf.jpg'),
(7, 'This is slider no 4', 'upload/slider/f048f2f31c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://googleplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(9, 'Chayan roy', 'admin', '3c6850afe6e8b32fe2cebd00c15589ca', 'chayanroycmt50@gmail.com', '<p>amar sonar bangla ami tomay</p>', 'admin'),
(12, 'c', 'Chayan', '202cb962ac59075b964b07152d234b70', 'chayanroycmt@gmail.com', '<p>c</p>', 'editor'),
(13, 's', 'ss', '202cb962ac59075b964b07152d234b70', 'shahin@gmail.com', '<p>s</p>', 'author'),
(14, '', 'aa', '4124bc0a9335c27f086f24ba207a4912', '', '', 'author'),
(15, '', 'ss', '202cb962ac59075b964b07152d234b70', 'shahinislam@gmail.com', '', 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'The Bloger Site 2017', 'welcome everyone here', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
