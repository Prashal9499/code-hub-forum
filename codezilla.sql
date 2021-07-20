-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 11:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codezilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `catogaries`
--

CREATE TABLE `catogaries` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catogaries`
--

INSERT INTO `catogaries` (`id`, `name`, `description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-03-06 19:13:04'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2021-03-06 19:15:49'),
(3, 'PHP', 'PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2021-03-07 00:19:07'),
(4, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', '2021-03-07 00:19:34'),
(5, 'HTML', 'Hypertext Markup Language is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', '2021-03-07 00:19:58'),
(6, 'Bootstrap', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components.', '2021-03-07 00:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_user` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_user`, `comment_time`) VALUES
(1, 'indeed pycharm is considered as one of the best IDE for python yet VS Code is a very good alternative infact better in many aspects.', 1, 3, '2021-03-08 20:22:51'),
(2, 'Not really pycharm is not the best best is IDLE!', 1, 4, '2021-03-08 20:34:52'),
(3, 'any morden IDE is good to go now a days but VS code is free to use and open source', 1, 5, '2021-03-08 20:39:21'),
(4, 'Both PyCharm and VSCode allow the community to create plugins to enhance their user experience. Both have full-blown IDE’s and really do tick all the boxes in terms of what you need and want, although, neither are entirely perfect. Both have a strong community behind them and despite VSCode not being around for as long as PyCharm, both do have fairly mature systems in terms of technical capability.\r\n\r\nI think it ultimately comes down to you. Do you want to pay for PyCharm professional and have a more specialised experience, or, would you rather have the free VSCode experience with a little bit less specialism, but, potentially more extensibility?', 1, 6, '2021-03-08 21:05:34'),
(5, 'PyCharm by IntelliJ and Visual Studio Code by Microsoft are the two primary IDEs that I keep using for Python development. Both IDEs support basic Python development, autocomplete suggestions, linkers, and extensibility of the IDE to support custom toolchains during development.', 1, 5, '2021-03-09 16:08:02'),
(11, 'not really you can learn another language such as R ', 12, 3, '2021-03-09 18:31:30'),
(14, 'rgarsrgsrsgrgrg', 1, 3, '2021-03-11 23:56:49'),
(15, 'thxdh', 1, 3, '2021-03-12 00:17:03'),
(16, 'yes ', 13, 3, '2021-05-03 19:58:00'),
(17, 'htjtjyryr', 17, 3, '2021-05-22 22:47:41'),
(18, 'gthyjh', 1, 3, '2021-06-22 12:29:38'),
(19, 'hga', 19, 7, '2021-07-19 13:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` text NOT NULL,
  `thread_forum_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_forum_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'regarding pycharm IDE', 'is pycharm the best IDE for python or vs code does the job ?', 1, 3, '2021-03-07 17:46:51'),
(2, 'not able to install python 3.8.2', 'i cannot install python version 3.8.2 on windows 10 help me please ', 1, 4, '2021-03-08 18:57:33'),
(3, 'python crashing on mac', 'hello i am not able to use python 3.8.2 on mac os high sierra when opened it crashes.\r\nshowing error -  889cccd6e233', 1, 5, '2021-03-08 19:07:26'),
(12, 'is python necessary for data science ?', 'i want to be a data scientist is python the only language i can learn ? are there any alternatives ?', 1, 6, '2021-03-08 19:25:14'),
(13, 'React JS', 'i want to learn react js is it necessary to learn javascript or i can learn react js anyways', 2, 5, '2021-03-08 19:28:13'),
(14, 'Django or Flask', 'which one should i learn djanjo or flask ?', 1, 4, '2021-03-09 16:10:14'),
(17, 'Angular ', 'bfmhy,hb\r\n', 2, 3, '2021-05-22 22:47:18'),
(18, 'ggdfg', 'dgfhhj', 1, 3, '2021-06-22 12:28:58'),
(19, 'pythn', 'fdhghjhZ', 1, 7, '2021-07-19 13:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_password`, `timestamp`) VALUES
(3, 'prashal09@gmail.com', '$2y$10$MwiJxCLLsxeNrM2SDfXWvuO.FGYXyduAeblMKpQEcFiYB8PrKBtbi', '2021-03-09 00:49:49'),
(4, 'prashaltarkas9499@gmail.com', '$2y$10$Nl.48jMFrxI99DKlckCOo.U6hhWd3nIkuRsNAWI6sMV/Y2xrtdFCu', '2021-03-09 16:14:39'),
(5, 'shubham778@gmail.com', '$2y$10$U.RD.zidqu5.Kpq/JlJKhO5e2w66wOp9Rua5kUIxKmreBsYTkQHBy', '2021-03-09 16:15:07'),
(6, 'jaysingh@gmail.com', '$2y$10$X2h67qyo9BcN6dyyxfLg5utJVvrUEQ3LyfxdwbI/lDlHFtE/seP9u', '2021-03-09 16:15:40'),
(7, 'demo@gmail.com', '$2y$10$ZRCAQ3rEjT0WE9oUTswZtuv4zEsvZTRvZTNNcFb6QWQSX/oUjpNqq', '2021-07-18 16:08:23'),
(8, 'abcd@gmail.com', '$2y$10$gI1WlYY3lk06H9lRmrvifuvCx2eYZFrVP1jqIqr.cGwGyP3qPW1T6', '2021-07-19 13:06:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catogaries`
--
ALTER TABLE `catogaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catogaries`
--
ALTER TABLE `catogaries`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
