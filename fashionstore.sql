-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 06:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `ProductName`, `Username`, `Total`) VALUES
(97, 'Orange Shoes', 'bismah1', 160);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Shipping` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `Subtotal`, `Discount`, `Shipping`, `Total`) VALUES
(60, 530, 146, 200, 730),
(61, 530, 146, 200, 730),
(62, 530, 146, 200, 730),
(63, 530, 146, 200, 730),
(64, 530, 146, 200, 730),
(65, 530, 146, 200, 730),
(66, 330, 106, 200, 530);

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `ProductName` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`ProductName`, `Price`, `Image`) VALUES
('Black Heels', 60, './images/pic6.jpg'),
('Blue Check Shirt', 90, './images/pic9.jpg'),
('Blue Denim Jeans', 40, './images/pic3.jpg'),
('Grey T-Shirt', 50, './images/pic4.jpg'),
('Nike Shoes', 80, './images/c2.jpg'),
('Orange Shoes', 40, './images/c1.jpg'),
('White Hoodie', 25, './images/c3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `Size`, `Quantity`) VALUES
(1, 'Blue Check Shirt', 'XXL', 1),
(2, 'Blue Denim Jeans', 'L', 3),
(3, 'Grey T-Shirt', 'S', 4),
(4, 'Black Heels', 'M', 2),
(5, 'Nike Shoes', 'S', 5),
(6, 'Orange Shoes', 'M', 4),
(7, 'White Hoodie', 'M', 8);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `Username`, `Comment`, `Rating`) VALUES
(22, 'fatima123', 'very good', 4),
(23, 'eisha', 'good service', 4),
(24, 'bismah1', 'sent wrong item', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`) VALUES
(18, 'admin'),
(23, 'bismah1'),
(24, 'bismah2'),
(29, 'ee'),
(25, 'eisha'),
(21, 'eisha123'),
(20, 'fatima123'),
(22, 'fatimabadar');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Date_of_birth` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`First_name`, `Last_name`, `Username`, `Email`, `Password`, `Gender`, `Date_of_birth`) VALUES
('', '', 'admin', 'admin@fs.pk', 'admin123', NULL, NULL),
('Bismah', 'Akram', 'bismah1', 'bismah@gmail.com', 'biss', 'female', '09/04/2000'),
('Bismah', 'Akram', 'bismah2', 'k200449@nu.edu.pk', 'biss2', 'female', '23/09/1999'),
('ee', 'ee', 'ee', 'ee@gmail.com', 'ee', '', ''),
('Eisha', 'Shah', 'eisha', 'k200383@nu.edu.pk', 'eish', 'female', '08/07/2008'),
('Eisha', 'Shah', 'eisha123', 'eisha@gmail.com', 'eish', 'female', '17/05/2000'),
('Fatima', 'Badar', 'fatima123', 'fatimabadarqureshi@gmail.com', 'fat', 'female', '03/01/2002'),
('Fatima', 'Badar', 'fatimabadar', 'k200406@nu.edu.pk', 'abc', 'female', '03/01/2002');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WishlistID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishlistID`, `ProductName`, `Username`) VALUES
(23, 'Orange Shoes', 'eisha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `ProductName` (`ProductName`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`ProductName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `ProductName` (`ProductName`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishlistID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `ProductName` (`ProductName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `userdetails` (`Username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductName`) REFERENCES `productdetails` (`ProductName`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ProductName`) REFERENCES `productdetails` (`ProductName`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `userdetails` (`Username`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`ProductName`) REFERENCES `productdetails` (`ProductName`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `userdetails` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
