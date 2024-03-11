-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymgtsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(10) NOT NULL,
  `bill_id` varchar(50) NOT NULL,
  `product_company` varchar(80) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `packing_size` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `bill_id`, `product_company`, `product_name`, `product_unit`, `packing_size`, `price`, `quantity`) VALUES
(1, '1', 'Oxnet Table Water', 'bottle Water', 'Litre', '6', '100', '5');

-- --------------------------------------------------------

--
-- Table structure for table `billing_header`
--

CREATE TABLE `billing_header` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `bill_no` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_header`
--

INSERT INTO `billing_header` (`id`, `full_name`, `bill_type`, `date`, `bill_no`, `username`) VALUES
(1, 'young', 'Cash', '2023-05-14', '00001', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(2, 'Mama Pride'),
(3, 'Dangote '),
(4, 'Zoba Table Water'),
(5, 'Deli Food'),
(6, 'Oxnet Table Water');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `packing_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_name`, `product_name`, `unit`, `packing_size`) VALUES
(2, 'Mama Pride', 'Rice', 'Kg', '1'),
(3, 'Dangote', 'Cement', 'Kg', '1'),
(4, 'Zoba Table Water', 'Pure Water', 'Litre', '20'),
(5, 'Deli Food', 'Cabin Biscuit ', 'g', '1'),
(6, 'Dangote', 'Rice', 'Kg', '1'),
(7, 'Dangote', 'Idomie', 'g', '12'),
(8, 'Oxnet Table Water', 'bottle Water', 'Litre', '12');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `packing_size` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `purchase_type` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `company_name`, `product_name`, `unit`, `packing_size`, `quantity`, `price`, `purchase_type`, `expiry_date`, `purchase_date`, `username`) VALUES
(1, 'Oxnet Table Water', 'bottle Water', 'Litre', '6', '200', '15000', 'debit', '2024-02-11', '2023-04-14', 'admin'),
(2, 'Deli Food', 'Cabin Biscuit', 'g', '1', '50', '4500', 'cash', '2024-02-20', '2023-04-14', 'user'),
(3, 'Dangote', 'Idomie', 'g', '12', '20', '10000', 'debit', '2024-05-14', '2023-05-14', 'admin'),
(4, 'Mama Pride', 'Rice', 'Kg', '1', '100', '500000', 'debit', '2026-02-20', '2023-05-14', 'admin'),
(5, 'Deli Food', 'Cabin Biscuit', 'g', '1', '200', '20000', 'cash', '2024-02-01', '2023-05-14', 'user'),
(6, 'Oxnet Table Water', 'bottle Water', 'Litre', '6', '50', '30000', 'debit', '2024-02-01', '2023-05-14', 'admin'),
(7, 'Zoba Table Water', 'Pure Water', 'Litre', '20', '40', '60000', 'debit', '2023-12-11', '2023-05-14', 'admin'),
(8, 'Oxnet Table Water', 'bottle Water', 'Litre', '12', '12', '150', 'cash', '2024-02-11', '2023-07-14', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `id` int(10) NOT NULL,
  `return_by` varchar(50) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `packing_size` varchar(50) NOT NULL,
  `product_price` varchar(40) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(100) NOT NULL,
  `product_company` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_unit` varchar(100) NOT NULL,
  `packing_size` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_selling_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_company`, `product_name`, `product_unit`, `packing_size`, `product_quantity`, `product_selling_price`) VALUES
(1, 'Oxnet Table Water', 'bottle Water', 'Litre', '6', '257', '100'),
(2, 'Deli Food', 'Cabin Biscuit', 'g', '1', '250', '500'),
(3, 'Dangote', 'Idomie', 'g', '12', '20', '500'),
(4, 'Mama Pride', 'Rice', 'Kg', '1', '100', '25000'),
(5, 'Zoba Table Water', 'Pure Water', 'Litre', '20', '40', '200');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_store`
--

CREATE TABLE `tmp_store` (
  `id` int(20) NOT NULL,
  `product_company` varchar(255) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_unit` varchar(200) NOT NULL,
  `packing_size` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_quantity` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_store`
--

INSERT INTO `tmp_store` (`id`, `product_company`, `product_name`, `product_unit`, `packing_size`, `product_price`, `product_quantity`, `total`) VALUES
(56, 'Deli Food', 'Cabin Biscuit', 'g', '1', '500', '3', '1500'),
(57, 'Zoba Table Water', 'Pure Water', 'Litre', '20', '200', '5', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(100) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(2, 'Kg'),
(3, 'g'),
(4, 'Litre');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'Young ', 'Scientist', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'active'),
(2, 'John ', 'Doe', 'User', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_store`
--
ALTER TABLE `tmp_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_header`
--
ALTER TABLE `billing_header`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tmp_store`
--
ALTER TABLE `tmp_store`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
