-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 08:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  ` categoryid` int(11) NOT NULL,
  `categories name` varchar(20) NOT NULL,
  `user-id` int(11) NOT NULL,
  `description` text NOT NULL,
  `expense_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (` categoryid`, `categories name`, `user-id`, `description`, `expense_id`) VALUES
(1, 'Meals and entertainm', 1, 'This category can include expenses related to meals, such as dining out, ordering takeout, or purchasing groceries. It can also include expenses related to entertainment, such as movie tickets, concert tickets, or amusement park admissions.', 1),
(2, 'Travel expenses', 3, 'This category can include expenses related to transportation, such as airfare, train tickets, car rentals, and gas. It can also include expenses related to lodging, such as hotel stays, Airbnb rentals, and vacation rentals.', 2),
(3, 'Communication expens', 5, 'This category can include expenses related to communication, such as phone bills, internet bills, and postage.', 4),
(4, 'Transportation:', 3, 'This category can include expenses related to transportation, such as fuel, parking fees, public transportation fares, or car rental fees.', 3),
(5, 'Gifts and donations', 1, 'This category can include expenses related to gifts or donations, such as donations to charity or gifts for friends and family.', 5),
(6, 'Education', 6, 'This category can include expenses related to education, such as tuition fees, textbooks, or course materials.', 6),
(7, 'Personal care', 5, 'This category can include expenses related to personal care, such as haircuts, salon services, or beauty products.', 7),
(8, 'my cat ', 4, 'This category can include expenses related to my cat, such as food and monthly vaccinations.', 8),
(9, 'food', 7, 'aaa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `category-id` int(11) NOT NULL,
  `expense-date` date NOT NULL,
  `expense-description` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `Payment Method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user-id`, `category-id`, `expense-date`, `expense-description`, `amount`, `Payment Method`) VALUES
(1, 1, 2, '2023-10-02', 'Gasoline', 50, 'Credit Card'),
(2, 3, 5, '2023-10-02', 'gifts', 40, 'Debit Card'),
(3, 5, 1, '2023-09-11', 'Movie tickets', 50, 'Cash'),
(4, 2, 7, '2023-05-02', ' Haircut', 50, ' Debit Card'),
(5, 3, 6, '2023-06-04', 'Course materials', 50, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `income_source` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_name` varchar(25) NOT NULL,
  `expense-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_name`, `expense-id`) VALUES
(1, 'Credit cards', 1),
(2, 'Debit cards', 2),
(3, 'Cash', 5),
(4, 'Online payment platforms', 2),
(5, 'Cash', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `user-id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `due_date` date NOT NULL,
  `frequency` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`user-id`, `title`, `due_date`, `frequency`, `id`, `description`) VALUES
(1, 'Reminders of future ', '2023-06-01', 2, 1, 'Users can create reminders for future payments the'),
(3, 'Budget reminders', '2023-06-26', 1, 2, 'Users can create reminders to check their monthly '),
(4, 'Spending limit remin', '2023-06-29', 2, 3, 'Users can create reminders to set maximum spending'),
(4, 'Financial goal remin', '2023-06-30', 3, 4, 'Users can create reminders to achieve specific fin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Age`, `password`, `Email`, `id`) VALUES
('asma', 22, '123', 'asma@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (` categoryid`),
  ADD KEY `user-id` (`user-id`),
  ADD KEY `expense_id` (`expense_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user-id`),
  ADD KEY `category-id` (`category-id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD KEY `expense-id` (`expense-id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `categories` (`categoryid`),
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`expense_id`) REFERENCES `categories` (`categoryid`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `expenses` (`id`),
  ADD CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`category-id`) REFERENCES `categories` (`categoryid`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `payment_method_ibfk_1` FOREIGN KEY (`expense-id`) REFERENCES `payment_method` (`payment_method_id`);

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `reminders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
