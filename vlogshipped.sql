-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 03:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vlogshipped`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'sample', 'sample', '2020-02-02 05:05:15', '2020-02-02 05:19:12');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `admin_before_insert` BEFORE INSERT ON `admin` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `admin_before_update` BEFORE UPDATE ON `admin` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `application_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `campaign_id`, `application_status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 10, '2020-10-20 12:48:33', '2020-10-28 15:52:52'),
(10, 6, 2, 20, '2020-11-16 15:56:02', '2020-11-16 17:27:33'),
(11, 6, 1, 20, '2020-11-16 18:42:17', '2020-11-16 18:42:17'),
(12, 6, 1, 20, '2020-11-16 18:43:18', '2020-11-16 18:43:18'),
(13, 6, 1, 20, '2020-11-17 18:58:37', '2020-11-17 18:58:37'),
(14, 6, 1, 10, '2020-11-20 11:49:36', '2020-11-20 11:49:36');

--
-- Triggers `application`
--
DELIMITER $$
CREATE TRIGGER `application_before_insert` BEFORE INSERT ON `application` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `application_before_update` BEFORE UPDATE ON `application` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `application_sampling`
--

CREATE TABLE `application_sampling` (
  `id` int(11) NOT NULL,
  `sampling_id` int(11) NOT NULL,
  `application_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_sampling`
--

INSERT INTO `application_sampling` (`id`, `sampling_id`, `application_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 10, '2020-10-28 16:12:10', '2020-10-28 16:12:10'),
(2, 6, 1, 10, '2020-11-20 11:49:18', '2020-11-20 11:49:18');

--
-- Triggers `application_sampling`
--
DELIMITER $$
CREATE TRIGGER `application_sampling_before_insert` BEFORE INSERT ON `application_sampling` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `application_sampling_before_update` BEFORE UPDATE ON `application_sampling` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `product_url` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `title`, `start_date`, `start_time`, `end_date`, `end_time`, `product_url`, `photo_url`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Sample', '2020-03-21', '8:00 am', '2020-03-21', '8:00 am', 'Www.dailymotion.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F386174?alt=media&token=af7a55b8-9f8d-442e-b0b0-187027aa8114', 'Sample', 17, '2020-03-21 10:19:42', '2020-03-21 10:19:42'),
(6, 'Sample', '2020-10-25', '8:00 am', '2020-10-26', '8:00 am', 'Www.sample.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F468584?alt=media&token=6e1eaf64-771a-4c31-bc1f-e8a24d450530', 'Gyfycyc', 21, '2020-10-25 15:38:38', '2020-11-16 13:55:13'),
(8, 'ahahahaha', '2020-11-20', '07:00 pm', '2020-11-21', '04:00 pm', 'shiyocc.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F114700?alt=media&token=314ac05f-d698-4218-b152-6cb38e64d2aa', 'sample', 12, '2020-11-20 12:54:48', '2020-11-20 12:54:48');

--
-- Triggers `campaign`
--
DELIMITER $$
CREATE TRIGGER `campaign_before_insert` BEFORE INSERT ON `campaign` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `campaign_before_update` BEFORE UPDATE ON `campaign` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `url`, `thumbnail`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(8, 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F221885?alt=media&token=05edc7a8-4fb1-4348-8bb1-0ea587350a49', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F356441?alt=media&token=1e51d4dc-8cb6-441f-81e1-a47f6c21e1bc', 10, 'ILY', '2020-02-02 17:59:00', '2020-10-28 21:21:44');

--
-- Triggers `content`
--
DELIMITER $$
CREATE TRIGGER `content_before_insert` BEFORE INSERT ON `content` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `content_before_update` BEFORE UPDATE ON `content` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follow_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follow_id`, `sponsor_id`, `influencer_id`, `created_at`, `updated_at`) VALUES
(3, 18, 10, '2020-11-05 14:27:33', '2020-11-05 14:27:33'),
(9, 18, 20, '2020-11-05 19:42:52', '2020-11-05 19:42:52'),
(10, 18, 15, '2020-11-05 19:45:08', '2020-11-05 19:45:08');

--
-- Triggers `followers`
--
DELIMITER $$
CREATE TRIGGER `followers_before_insert` BEFORE INSERT ON `followers` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `followers_before_update` BEFORE UPDATE ON `followers` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_status` int(11) NOT NULL,
  `notification_from` int(11) NOT NULL,
  `notification_to` int(11) NOT NULL,
  `notification_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_status`, `notification_from`, `notification_to`, `notification_type_id`, `created_at`, `updated_at`) VALUES
(16, 0, 21, 20, 6, '2020-11-17 18:58:37', '2020-11-17 19:00:52'),
(17, 0, 21, 10, 4, '2020-11-17 19:01:58', '2020-11-17 19:01:58'),
(18, 3, 20, 21, 4, '2020-11-17 19:02:15', '2020-11-17 19:06:05'),
(19, 2, 10, 21, 6, '2020-11-20 11:49:36', '2020-11-20 11:49:36'),
(20, 3, 10, 12, 4, '2020-11-20 12:19:34', '2020-11-20 12:19:43');

--
-- Triggers `notification`
--
DELIMITER $$
CREATE TRIGGER `notification_before_insert` BEFORE INSERT ON `notification` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `notification_before_update` BEFORE UPDATE ON `notification` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating_from` int(11) NOT NULL,
  `rating_to` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating_from`, `rating_to`, `rate`, `content_id`, `created_at`, `updated_at`) VALUES
(4, 12, 10, 4, 8, '2020-01-24 07:58:10', '2020-10-28 19:49:39'),
(5, 16, 10, 5, 8, '2020-01-24 08:06:25', '2020-10-28 21:24:20');

--
-- Triggers `ratings`
--
DELIMITER $$
CREATE TRIGGER `ratings_before_insert` BEFORE INSERT ON `ratings` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ratings_before_update` BEFORE UPDATE ON `ratings` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sampling`
--

CREATE TABLE `sampling` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `about_product` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `requirements` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampling`
--

INSERT INTO `sampling` (`id`, `title`, `start_date`, `start_time`, `end_date`, `end_time`, `about_product`, `photo_url`, `requirements`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Vrvdbr', '2020-10-26', '8:00 am', '2020-10-26', '8:00 am', 'Dgeggedb', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F474665?alt=media&token=0e99128a-27ae-456a-a670-0fd5afa62bf9', 'Dbdhdgr', 12, '2020-10-25 17:29:38', '2020-10-25 17:29:38'),
(6, 'opawCi', '2020-11-20', '01:00 pm', '2020-11-24', '11:00 am', 'ahahah', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F7195?alt=media&token=752fce7c-0726-483a-a817-32bc85f78351', 'ahahah', 12, '2020-11-20 11:47:41', '2020-11-20 11:47:41');

--
-- Triggers `sampling`
--
DELIMITER $$
CREATE TRIGGER `sampling_before_insert` BEFORE INSERT ON `sampling` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sampling_before_update` BEFORE UPDATE ON `sampling` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `payment_id`, `payment_status`, `amount`, `payment_type`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'PAYID-LY7NNMI0EN15879XF409825B', 'approved', 999, 0, 10, '2020-02-08 15:40:16', '2020-10-20 11:41:41'),
(8, 'PAYID-LZAOC3Q4HS80793AE663881V', 'approved', 999, 0, 10, '2020-02-10 04:50:33', '2020-11-13 15:58:32'),
(10, 'PAYID-LZAOQMQ6A304837AG303072U', 'approved', 4499, 1, 15, '2020-02-10 05:19:24', '2020-02-10 05:19:59'),
(11, 'PAYID-LZAPBEY50U341873H137922G', 'approved', 4499, 1, 16, '2020-02-10 05:55:14', '2020-02-10 05:55:14'),
(12, 'PAYID-LZAPWMQ4YX49429BN943902W', 'approved', 999, 0, 17, '2020-02-10 06:40:41', '2020-02-10 06:40:41'),
(13, 'PAYID-L6R7LPY44K705386V082323F', 'approved', 999, 0, 18, '2020-11-05 12:53:28', '2020-11-05 12:53:28'),
(14, 'PAYID-L6SFQJA8BC199344C508252B', 'approved', 999, 0, 21, '2020-11-05 19:53:16', '2020-11-05 19:53:16');

--
-- Triggers `subscription`
--
DELIMITER $$
CREATE TRIGGER `subcription_before_insert` BEFORE INSERT ON `subscription` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subcription_before_update` BEFORE UPDATE ON `subscription` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_rate`
--

CREATE TABLE `subscription_rate` (
  `subscription_rate_id` int(11) NOT NULL,
  `monthly_rate` double NOT NULL,
  `annual_rate` double NOT NULL,
  `subscription_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_rate`
--

INSERT INTO `subscription_rate` (`subscription_rate_id`, `monthly_rate`, `annual_rate`, `subscription_status`, `created_at`, `updated_at`) VALUES
(3, 12, 12, 0, '2020-11-06 16:26:44', '2020-11-06 16:26:44');

--
-- Triggers `subscription_rate`
--
DELIMITER $$
CREATE TRIGGER `subscription_rate_before_insert` BEFORE INSERT ON `subscription_rate` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subscription_rate_before_update` BEFORE UPDATE ON `subscription_rate` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `user_status`, `email_address`, `profile_picture`, `password`, `company_name`, `first_name`, `last_name`, `category`, `gender`, `birthday`, `mobile_number`, `website`, `description`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 'sample@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F461432?alt=media&token=f2ed180e-590a-4454-a93e-2645ac68e397', '$2y$10$hS3Ktpp9wtAWeIojOICsluH7EcnG4HmOXNlXKYsbMbgHLLAVurjOa', 'none', 'xtian', 'awesome', 'TRAVEL', 'male', '11-11-2012', '09994093374', 'none', 'none', '2020-02-08 15:40:16', '2020-11-06 12:42:55'),
(12, 0, 1, 'sample1@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F463784?alt=media&token=c1855b1d-f55e-49f1-b682-9df7d1cfec2d', '$2y$10$B9zUNRkwRqoUXZeK.M/qYOR9KLViKqBW2sFjfPmGR5QJl9iLsumgO', 'ALX COMPANY', 'sample1', 'sample', 'TRAVEL', 'male', '11-11-2012', '09994093374', 'www.google.com', 'none', '2020-02-10 04:50:33', '2020-10-28 18:52:59'),
(15, 1, 0, 'sample12@gmail.com', 'none', '$2y$10$3ufYUurkASH.8M12GnyrTuNO69jesi0uWGRQdN/XfQu5P6n9M/d6y', 'none', 'black pink', 'how you like that', 'TRAVEL', 'female', '11-11-2012', '09994093374', 'none', 'none', '2020-02-10 05:19:24', '2020-11-06 12:42:58'),
(16, 0, 1, 'sample11@gmail.com', 'none', '$2y$10$y6rwHQjXWulTHY9YAOTeK.xNLCH99T8NphzUfG1MSx6ZENrVExx.2', 'ALX COMPANY', 'sample', 'sample', 'TRAVEL', 'male', '11-11-2012', '09994093374', 'www.dailymotion.com', 'none', '2020-02-10 05:55:13', '2020-11-05 16:15:59'),
(17, 0, 1, 'sample14@gmail.com', 'none', '$2y$10$rFFYvLflmY88QRZHwux9CO/VVEG7rVR7JAYkT5D49GNnLnr3lZb46', 'ALX COMPANY', 'sample', 'sample', 'TRAVEL', 'male', '11-11-2012', '09994093374', 'Sample.com', 'none', '2020-02-10 06:40:41', '2020-11-05 16:16:02'),
(18, 0, 1, 'sample2@gmail.com', 'none', '$2y$10$jfatiXqYf2.fqR12BmDGSOWXHw9ApBdt4kPlwnpUWYDUM38qBOsAG', 'ALX COMPANY', 'sample', 'sample', 'FASHION', 'male', '11-11-2012', '09994093374', 'Www.sample.com', 'none', '2020-11-05 12:53:28', '2020-11-05 12:53:28'),
(20, 1, 1, 'sample3@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F447620?alt=media&token=d05d1594-4ce4-44db-b950-9e13c039486d', '$2y$10$z3as60Y0Oqn8bqUbC8JZHevkedF91eMXkPPg028wadRWl9RMJwthq', 'none', 'sample', 'sample', 'OTHER', 'male', '11-11-2012', '09994093374', 'www.fb.com', 'none', '2020-11-05 18:50:27', '2020-11-05 18:50:52'),
(21, 0, 1, 'sample4@gmail.com', 'https://firebasestorage.googleapis.com/v0/b/vlogshipped.appspot.com/o/images%2F447620?alt=media&token=e16e0146-4de2-4eb9-ac20-9e94db934fdf', '$2y$10$gTa69C7g2z4zO58jTgW7ruOf53pdgI0mrdYpX4JqCGq3kw1Z3Yuk6', 'ALX COMPANY4', 'sample1', 'sample1', 'OTHER', 'male', '11-11-2012', '09994093373', 'www.fb.com', 'none1', '2020-11-05 19:53:16', '2020-11-13 17:11:49');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `users_before_insert` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.created_at = NOW(), NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_before_update` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.created_at = OLD.created_at, NEW.updated_at = NOW()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_sampling`
--
ALTER TABLE `application_sampling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampling`
--
ALTER TABLE `sampling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_rate`
--
ALTER TABLE `subscription_rate`
  ADD PRIMARY KEY (`subscription_rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `application_sampling`
--
ALTER TABLE `application_sampling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sampling`
--
ALTER TABLE `sampling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscription_rate`
--
ALTER TABLE `subscription_rate`
  MODIFY `subscription_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
