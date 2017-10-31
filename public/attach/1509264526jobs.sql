-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 10:12 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_upwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_cost` int(11) NOT NULL,
  `project_time` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `skill_needed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `selected_for_job` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `name`, `project_cost`, `project_time`, `description`, `category_id`, `status`, `verified`, `skill_needed`, `job_attachment`, `type`, `start_date`, `end_date`, `approved`, `selected_for_job`, `created_at`, `updated_at`) VALUES
(4, 1, 'Mobile Application', 10000, 2, 'This is Job Description', 1, 0, 0, '["1","2","4"]', '["073814p_big1.jpg","073814p_big2.jpg","073814p_big3.jpg","073814p3.jpg","073814p4.jpg","073814p5.jpg","073814p8.jpg","073814profile.jpg","073814profile_big.jpg"]', 3, NULL, NULL, 1, 3, '2017-10-23 01:38:14', '2017-10-23 01:38:14'),
(5, 1, 'Mobile Application', 10000, 2, 'This is job description', 2, 0, 0, '["2","3","4"]', '["0738552.jpg","0738552s.jpg","0738553.jpg","0738554s.jpg","0738555.jpg","0738555s.jpg"]', 3, NULL, NULL, 0, NULL, '2017-10-23 01:38:55', '2017-10-23 01:38:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
