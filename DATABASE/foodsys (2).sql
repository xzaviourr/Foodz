-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 11:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `i_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `i_id`, `r_id`, `quantity`, `price`, `photo`, `name`) VALUES
(10, 4, 6, 0, 100, 'upload/schejwan_1555601107.jpg', 'Schejwan Noodle'),
(11, 6, 6, 0, 60, 'upload/paratha_1555952077.gif', 'Aalo Ka Paratha'),
(12, 7, 6, 0, 150, 'upload/guj_thali_1555952092.jpg', 'Gujrati Thali');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `complaint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `name`, `email`, `complaint`) VALUES
(6, 'Shivansh Srivastava', 'sastava007@gmail.com', ' ajslbdka'),
(7, 'Shivansh Srivastava', 'sastava007@gmail.com', 'jabjkwckwlkcnqkln'),
(8, 'Shivansh Srivastava', 'sastava007@gmail.com', 'vaxkajalkca;'),
(9, 'Shivansh Srivastava', 'sastava007@gmail.com', 'gocwhcwkcw;clw'),
(10, 'Shivansh Srivastava', 'sastava007@gmail.com', 'figoihpojiphgiyflfu');

-- --------------------------------------------------------

--
-- Table structure for table `customer_spt`
--

CREATE TABLE `customer_spt` (
  `emp_id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `satisfaction_ratio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_spt`
--

INSERT INTO `customer_spt` (`emp_id`, `name`, `dept`, `satisfaction_ratio`) VALUES
(2, 'Aman Mishra', 'Fooding', 1),
(4, 'Saniya Verma', 'Transportation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `emp_id` int(3) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`emp_id`, `phone`, `name`, `rating`) VALUES
(1, '9559993656', 'Gaurav Kumar', 4),
(3, '6588004748', 'Mukesh Kumar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(3) NOT NULL,
  `person` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `person`) VALUES
(1, 'DELIVERY'),
(2, 'CUSTOMER_SPT'),
(3, 'DELIVERY'),
(4, 'CUSTOMER_SPT'),
(5, 'DELIVERY');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `name` varchar(20) NOT NULL,
  `description` varchar(180) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `rating` float NOT NULL,
  `r_id` int(3) NOT NULL,
  `i_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`name`, `description`, `price`, `category`, `photo`, `rating`, `r_id`, `i_id`) VALUES
('Schejwan Noodle', 'It is a Chinese dish prepared in spicy schejwan sauce and a lot of veggies.', 100, 'Breakfast', 'upload/schejwan_1555601107.jpg', 0, 6, 4),
('Veg Thaali', 'The idea behind a Thali is to offer all the 6 different flavors of sweet, salt, bitter, sour, astringent and spicy on one single plate.', 150, 'Lunch', 'upload/thali_1555669727.jpg', 0, 7, 5),
('Aalo Ka Paratha', 'Aloo Paratha is a bread dish originating from the Indian subcontinent; the recipe is one of the most popular breakfast dishes throughout western, central and northern regions of In', 60, 'Breakfast', 'upload/paratha_1555952077.gif', 0, 6, 6),
('Gujrati Thali', 'The typical Gujarati thali consists of rotli, dal or kadhi, rice, and shaak/sabzi (a dish made up of several different combinations of vegetables and spices, which may be either sp', 150, 'Lunch', 'upload/guj_thali_1555952092.jpg', 0, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(3) NOT NULL,
  `emp_id` int(3) NOT NULL,
  `c_id` int(3) NOT NULL,
  `price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `emp_id`, `c_id`, `price`) VALUES
(1, 1, 10, 650);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_id` int(3) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `photo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `address`, `email`, `password`, `phone`, `photo`) VALUES
(6, 'Gola Ka Mandir', 'khana@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '9559993739', 'upload/khana_khajana_1555352644.jpg'),
(7, 'IIITM Campus', 'taj@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '9559997865', 'upload/taj1_1555352754.jpg'),
(8, 'City Centre Gwalior', 'prizon@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '9450555845', 'upload/prizon_1555434722.jpg'),
(9, 'Thatipur Gwalior', 'seven11@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '6789654723', 'upload/7-eleven_1555434812.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_norm`
--

CREATE TABLE `restaurant_norm` (
  `email` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_norm`
--

INSERT INTO `restaurant_norm` (`email`, `name`, `rating`) VALUES
('khana@gmail.com', 'Khana Khazana', 0),
('prizon@gmail.com', 'Prizon Cafe', 0),
('seven11@gmail.com', 'Seven Eleven Restaurant', 0),
('taj@gmail.com', 'Taj Restaurant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(3) UNSIGNED NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `password`, `phone`, `image`) VALUES
(2, 'test@gmail.com', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '8978654348', ''),
(3, 'abc@gmail.com', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '2234567889', ''),
(8, 'GHFGH@GMAIL.COM', 'bb162f18728eb6dd22d11ff08c4c301108ee4f21220c608e02d633a222547058', '234567899', ''),
(10, 'sastava007@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '6387547833', ''),
(11, 'deepshah0205@gmail.c', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '6355514807', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_norm`
--

CREATE TABLE `users_norm` (
  `phone` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_norm`
--

INSERT INTO `users_norm` (`phone`, `name`, `address`) VALUES
('2234567889', 'Bhavya Sharma', 'opoiou mnajdhjdhu'),
('234567899', 'dvJB', 'CJBFKSNFFJS['),
('6355514807', 'Deep Shah', 'Room No 224 BH2 Hostel'),
('6387547833', 'Shivansh Srivastava', 'Room No 242 BH2 Hostel'),
('8978654348', 'Balaji Rao', 'kjhdkjs jopw d pwwpj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_spt`
--
ALTER TABLE `customer_spt`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `restaurant_norm`
--
ALTER TABLE `restaurant_norm`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_norm`
--
ALTER TABLE `users_norm`
  ADD PRIMARY KEY (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `i_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_spt`
--
ALTER TABLE `customer_spt`
  ADD CONSTRAINT `customer_spt_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD CONSTRAINT `delivery_boy_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
