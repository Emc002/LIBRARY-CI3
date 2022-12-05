-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_staditek`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cover` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `isbn`, `title`, `synopsis`, `author`, `publisher`, `category`, `language`, `created_at`, `updated_at`) VALUES
(1, 'ableson.jpg', '1933988673', 'Unlocking Android', 'Unlocking Android: A Developer\'s Guide provides concise', 'W. Frank Ableson', 'Manning ', 'Open Source, Mobile', 'English', NULL, NULL),
(2, 'b5d7b0743aec135b3225c74688ddd9b2.jpg', '4153006141', 'The Dark Side of Human Being', 'the darksest can show cause something from inside of human', 'Anonymus', 'Anonymus', 'Psycholgy', 'English', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_trxs`
--

CREATE TABLE `book_trxs` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `type` enum('fine','borrow') COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_trxs`
--

INSERT INTO `book_trxs` (`id`, `book_id`, `member_id`, `detail_id`, `type`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2, 'borrow', 0, '2022-12-04 01:46:22', '2022-12-04 11:51:06'),
(3, 1, 1, 1, 'fine', 0, '2022-12-04 17:47:39', NULL),
(4, 1, 1, 1, 'fine', 0, '2022-12-04 17:48:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_books`
--

CREATE TABLE `borrow_books` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_books`
--

INSERT INTO `borrow_books` (`id`, `member_id`, `trx_date`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-04 00:00:00', 'ONE', '2022-12-03 21:51:15', '2022-12-04 01:18:50'),
(2, 2, '2022-12-08 00:00:00', 'TWO', '2022-12-03 21:53:10', '2022-12-04 01:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `deadline_at` date DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `book_id`, `borrow_id`, `deadline_at`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-01', '1', '2022-12-03 22:20:58', '2022-12-04 00:01:37'),
(2, 1, 1, '2022-12-02', '2', '2022-12-03 22:30:50', '2022-12-04 14:31:37'),
(3, 1, 1, '2022-12-03', '3', '2022-12-03 22:32:33', '2022-12-03 23:56:47'),
(4, 1, 1, '2022-12-04', '4', '2022-12-03 23:57:34', '2022-12-04 14:31:30'),
(5, 2, 2, '2022-12-01', '5', '2022-12-04 00:17:17', '2022-12-04 14:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_return`
--

CREATE TABLE `borrow_return` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `return_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_return`
--

INSERT INTO `borrow_return` (`id`, `book_id`, `detail_id`, `return_at`, `note`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, '2022-12-10 00:00:00', 'FINE PRICE', '2022-12-04 01:09:49', '2022-12-04 01:16:13'),
(3, 1, NULL, '2022-12-08 00:00:00', 'Ontime', '2022-12-04 19:09:18', NULL),
(4, 1, NULL, '2022-12-05 00:00:00', '', '2022-12-04 19:15:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `username`, `name`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `last_login`) VALUES
(3, 'ALIF', 'ALIF', 'ALIF@gmail.com', '$2y$10$48ZKu5h2CfxlSkg5/an4re3SQ1qC6JN2g/KcVZkS4L19J/tmkjFN.', 'd4f98d73ade90a5ad71c6b2962d9f446.jpg', '2022-12-04 19:13:02', '2022-12-04 12:42:48', '2022-12-04 13:13:02'),
(4, 'NAFIS', 'NAFIS', 'NAFIS@gmail.com', '$2y$10$axEFtpZc3BVtAcZ9GzB7durM/4I/7ZQWjMOYdYglcymg9b4cIpErC', '6249dd3e256b1c82764ef35658a89b05.jpg', '2022-12-05 01:06:41', '2022-12-04 12:49:08', '2022-12-04 19:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `born_place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `born_date` date NOT NULL,
  `gender` enum('L','P','O') COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` enum('WNI') COLLATE utf8_unicode_ci DEFAULT 'WNI',
  `status` enum('active','non active') COLLATE utf8_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nik`, `full_name`, `phone`, `address`, `born_place`, `born_date`, `gender`, `country`, `nationality`, `status`, `created_at`, `updated_at`) VALUES
(1, '3846274839482921', 'MARCUS AURELIUS', '728636781937', 'ROME', 'ATHENA', '1545-12-03', 'L', 'ATHENA', 'WNI', 'active', '2022-12-02 17:55:22', '2022-12-02 19:26:53'),
(2, '33625536288622', 'NICOLA TESLA', '778976377234', 'CROATIA', 'CROATIA', '1856-07-10', 'L', 'CROATIA', 'WNI', 'active', '2022-12-03 20:49:25', '2022-12-04 00:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `member_trxs`
--

CREATE TABLE `member_trxs` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `subs_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `active_at` date DEFAULT NULL,
  `expire_at` date DEFAULT NULL,
  `status` enum('paid','unpaid') COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_order` double DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_trxs`
--

INSERT INTO `member_trxs` (`id`, `member_id`, `subs_id`, `trx_date`, `active_at`, `expire_at`, `status`, `total_order`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-04 00:00:00', '2022-12-05', '2023-05-04', 'unpaid', 100000, 'NC1', '2023-05-03 17:00:00', '2022-12-03 21:22:52'),
(2, 2, 2, '2022-12-05 00:00:00', '2022-12-05', '2023-05-04', 'paid', 100000, '', '2023-05-03 17:00:00', '2022-12-04 16:09:44'),
(3, 1, 1, '2022-12-05 00:00:00', '2022-12-05', '2023-01-04', '', 100000, '', '2022-12-03 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `month` tinyint(6) NOT NULL,
  `price` float NOT NULL,
  `status` enum('active','non active') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `month`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DESEMBER HAPPY', 1, 120000, 'active', '2022-12-02 17:57:31', '2022-12-02 17:58:47'),
(2, 'DESEMBER CERIA', 4, 10000, 'active', '2022-12-02 22:22:23', '2022-12-04 00:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_id` (`book_id`),
  ADD KEY `fk_members_id` (`member_id`),
  ADD KEY `fk_detail_id` (`detail_id`);

--
-- Indexes for table `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_id_book` (`member_id`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_id_dtl` (`book_id`),
  ADD KEY `fk_borrow_id_dtl` (`borrow_id`);

--
-- Indexes for table `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_id_rtn` (`book_id`),
  ADD KEY `fk_detail_id-rtn` (`detail_id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_trxs`
--
ALTER TABLE `member_trxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_id` (`member_id`),
  ADD KEY `fk_subs_id` (`subs_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_trxs`
--
ALTER TABLE `book_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrow_books`
--
ALTER TABLE `borrow_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrow_return`
--
ALTER TABLE `borrow_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_trxs`
--
ALTER TABLE `member_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_id` FOREIGN KEY (`detail_id`) REFERENCES `borrow_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_members_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD CONSTRAINT `fk_member_id_book` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD CONSTRAINT `fk_book_id_dtl` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrow_id_dtl` FOREIGN KEY (`borrow_id`) REFERENCES `borrow_books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD CONSTRAINT `fk_book_id_rtn` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_id-rtn` FOREIGN KEY (`detail_id`) REFERENCES `borrow_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_trxs`
--
ALTER TABLE `member_trxs`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subs_id` FOREIGN KEY (`subs_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
