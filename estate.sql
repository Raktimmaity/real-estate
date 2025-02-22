-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `type`, `created_at`) VALUES
(3, 'Raktim Maity', 'admin@admin.com', '$2y$10$T0N1agVJtb/KBTf0v4MJo.VqDU0L27WYrx0S8DkiJdo4oujZGtRyi', 1, '2025-02-20 13:08:08'),
(4, 'Raktim Maity', 'rakib@gmail.com', '$2y$10$nfP9sCLRezyB7xAHwCgNdeNayCdmQgJbZMGBWGdJonHyeBj.zA94u', 0, '2025-02-20 13:35:03'),
(6, 'John Doe', 'johnsmith@example.com', '$2y$10$dK.Ylgmtz8Sq6FTVIU1pQuOpB9PpPhuvemki6fkfcuWCbGCvjwuMy', 0, '2025-02-21 20:26:58'),
(7, 'Peter', 'peter@example.com', '$2y$10$cr8EpnfkFHH.5zUNHbDWdeIzt6S48DmSaQBVthhFgwvQTS6pgKOYq', 0, '2025-02-21 20:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Apartment', 'Modern apartments with various amenities', '2025-02-20 15:30:08'),
(2, 'Villa', 'Luxury villas with private gardens and pools', '2025-02-20 15:30:08'),
(3, 'House', 'Standalone houses for families', '2025-02-20 15:30:08'),
(4, 'Office', 'Commercial office spaces in prime locations', '2025-02-20 15:30:08'),
(5, 'Land', 'Plots of land available for sale or lease', '2025-02-20 15:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `status` enum('For Sale','For Rent') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `price`, `location`, `image`, `category_id`, `size`, `bedrooms`, `bathrooms`, `status`, `created_at`) VALUES
(16, 'Luxurious Bungalow in Raichak', 'Expansive bungalow with modern amenities', '₹6.35 Lakhs', 'Raichak, Kolkata', 'uploads/property-1.jpg', 2, 4090, 4, 7, 'For Sale', '2025-02-21 20:42:36'),
(17, 'Modern Apartment in Mukundapur', 'Spacious apartment with premium facilities', '₹5.19 Lakhs', 'Mukundapur, Kolkata', 'uploads/property-2.jpg', 1, 3498, 3, 3, 'For Sale', '2025-02-21 20:46:27'),
(18, 'Affordable 3 BHK Flat in Tangra', 'Ready-to-move-in flat with ample space', '₹1.90 Crore', 'Tangra, Kolkata', 'uploads/property-3.jpg', 1, 1690, 3, 2, 'For Rent', '2025-02-21 20:48:55'),
(19, 'Independent House in Behala', 'Spacious 4-bedroom independent house', '₹1.20 Crore', 'Behala, Kolkata', 'uploads/property-4.jpg', 2, 2500, 4, 3, 'For Sale', '2025-02-21 20:49:41'),
(20, '2 BHK Apartment in Rajarhat', 'Compact and modern 2-bedroom apartment', '₹4.90 Lakhs', 'Rajarhat, Kolkata', 'uploads/property-5.jpg', 1, 639, 2, 2, 'For Rent', '2025-02-21 20:51:07'),
(21, 'Premium Office Space in Salt Lake', 'Fully furnished office with modern amenities', '₹3.50 Crore', 'Salt Lake, Kolkata', 'uploads/property-6.jpg', 4, 5000, 0, 2, 'For Sale', '2025-02-21 20:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `website_title` varchar(255) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `website_title`, `website_name`, `website_owner`) VALUES
(1, 'Estate || Real Etated Website', 'Etate', 'Raktim Maity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
