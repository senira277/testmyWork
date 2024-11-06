-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2024 at 04:09 PM
-- Server version: 9.0.1
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_caterersDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dish`
--

CREATE TABLE `Dish` (
  `dishId` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Dish`
--

INSERT INTO `Dish` (`dishId`, `name`, `description`, `type`, `image`) VALUES
(1, 'Chicken Curry', 'A flavorful and spicy curry made with marinated chicken cooked in coconut milk and spices.', 'main dish', 'https://myfoodstory.com/wp-content/uploads/2020/10/Dhaba-Style-Chicken-Curry-2.jpg'),
(2, 'Fish Ambul Thiyal', 'A sour fish curry made with tuna and dried goraka, a signature dish of southern Sri Lanka.', 'main dish', 'https://gcookingbakingcom.wordpress.com/wp-content/uploads/2020/12/dsc01401.jpg?w=1024'),
(5, 'Parippu', 'A mild curry made from lentils, cooked with coconut milk and spices.', 'side dish', 'https://foodvoyageur.com/wp-content/uploads/2021/12/Sri-Lankan-Dhal-Curry22-768x590-1.webp'),
(6, 'Pol Sambol', 'A spicy coconut relish made with grated coconut, chili, onion, and lime juice.', 'side dish', 'https://cdn.tatlerasia.com/asiatatler/i/my/2021/07/07151224-srilankanfood_cover_1500x1000.jpg'),
(7, 'Watalappan', 'A rich coconut custard pudding made with jaggery, eggs, and spices like cardamom and nutmeg.', 'dessert', 'https://cdn1.matadornetwork.com/blogs/1/2019/07/Upalis-by-Nawaloka-1-560x420.jpg'),
(8, 'Custard', 'Custard is a smooth, creamy dessert made primarily from milk, eggs, and sugar. In Sri Lankan cuisine, it\'s often flavored with vanilla or cinnamon and served chilled.', 'dessert', 'https://www.justonecookbook.com/wp-content/uploads/2022/11/Japanese-Custard-Pudding-1211-I-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `licenNo` varchar(20) DEFAULT NULL,
  `isAvailble` tinyint DEFAULT NULL,
  `userId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`licenNo`, `isAvailble`, `userId`) VALUES
('1001001101', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `IngredientId` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `supplier` varchar(45) DEFAULT NULL,
  `measureUnit` varchar(10) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `orderId` int NOT NULL,
  `orderType` varchar(45) DEFAULT NULL,
  `orderStatus` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT '10',
  `cost` decimal(7,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `cateringService` tinyint DEFAULT '0',
  `requiredDate` date NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `customerId` int DEFAULT NULL,
  `mId` int DEFAULT NULL,
  `packageId` int DEFAULT NULL,
  `driverId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `OrderIngredient`
--

CREATE TABLE `OrderIngredient` (
  `orderId` int NOT NULL,
  `ingredientId` int NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Package`
--

CREATE TABLE `Package` (
  `packageId` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `minimumQuantity` int NOT NULL,
  `unitPrice` decimal(7,2) DEFAULT NULL COMMENT 'unitPrice is just an estimation',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PackageDish`
--

CREATE TABLE `PackageDish` (
  `packageId` int NOT NULL,
  `dishId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentNo` int NOT NULL,
  `orderId` int NOT NULL,
  `paidAmount` decimal(7,2) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT NULL,
  `referenceNo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userId` int NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL DEFAULT '0',
  `phoneNumber` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userId`, `email`, `password`, `date`, `role`, `phoneNumber`, `address`, `profilePic`, `name`) VALUES
(1, 'user1@gmail.com', '123', '2024-09-13 20:55:49', 'cust', '0721884428', '12/5 mental street, Angola, Colombo', 'https://img.freepik.com/free-photo/portrait-man-laughing_23-2148859448.jpg?size=338&ext=jpg&ga=GA1.1.1819120589.1726185600&semt=ais_hybrid', 'senira'),
(2, 'user2@gmail.com', 'user2', '2024-09-13 20:55:49', 'cust', '0768534985', '2/10 polgaha lane, athurugiriya, Colombo', 'https://media.istockphoto.com/id/1437816897/photo/business-woman-manager-or-human-resources-portrait-for-career-success-company-we-are-hiring.jpg?s=612x612&w=0&k=20&c=tyLvtzutRh22j9GqSGI33Z4HpIwv9vL_MZw_xOE19NQ=', 'Madusha Pahasara'),
(3, 'admin1@gmail.com', 'admin1', '2024-09-13 21:01:09', 'admin', '0711234543', 'Saman Caterers, Seeduwa', 'https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/001.webp', 'Saman Kumara'),
(4, 'driver1@gmail.com', 'driver1', '2024-09-13 21:01:09', 'driver', '0712318890', NULL, 'https://packtolife.com/wp-content/uploads/2023/09/featured-image-how-rent-tuktuk-sri-lanka.jpg', 'Akarsha'),
(5, 'manager1@gmail.com', 'manager1', '2024-09-13 21:03:26', 'manager', '0712221110', '12/2 pallan street, Bandarawela', 'https://bitrebels.com/wp-content/uploads/2017/02/tech-geek-home-entertainment-gadgets-header.jpg', 'Nadeen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dish`
--
ALTER TABLE `Dish`
  ADD PRIMARY KEY (`dishId`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD KEY `userId_idx` (`userId`);

--
-- Indexes for table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`IngredientId`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `packageId_idx` (`packageId`),
  ADD KEY `driverId_idx` (`driverId`),
  ADD KEY `customerId_idx` (`customerId`),
  ADD KEY `mId_idx` (`mId`);

--
-- Indexes for table `OrderIngredient`
--
ALTER TABLE `OrderIngredient`
  ADD PRIMARY KEY (`orderId`,`ingredientId`),
  ADD KEY `fk_Order_has_Ingredient_Ingredient1_idx` (`ingredientId`);

--
-- Indexes for table `Package`
--
ALTER TABLE `Package`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `PackageDish`
--
ALTER TABLE `PackageDish`
  ADD PRIMARY KEY (`packageId`,`dishId`),
  ADD KEY `fk_Package_has_Dish_Dish1_idx` (`dishId`),
  ADD KEY `fk_Package_has_Dish_Package1_idx` (`packageId`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`paymentNo`,`orderId`),
  ADD UNIQUE KEY `referenceNo_UNIQUE` (`referenceNo`),
  ADD KEY `orderId_idx` (`orderId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dish`
--
ALTER TABLE `Dish`
  MODIFY `dishId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Ingredient`
--
ALTER TABLE `Ingredient`
  MODIFY `IngredientId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Package`
--
ALTER TABLE `Package`
  MODIFY `packageId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `customerId` FOREIGN KEY (`customerId`) REFERENCES `User` (`userId`),
  ADD CONSTRAINT `driverId` FOREIGN KEY (`driverId`) REFERENCES `User` (`userId`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `mId` FOREIGN KEY (`mId`) REFERENCES `User` (`userId`),
  ADD CONSTRAINT `packageId` FOREIGN KEY (`packageId`) REFERENCES `Package` (`packageId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `OrderIngredient`
--
ALTER TABLE `OrderIngredient`
  ADD CONSTRAINT `fk_Order_has_Ingredient_Ingredient1` FOREIGN KEY (`ingredientId`) REFERENCES `Ingredient` (`IngredientId`),
  ADD CONSTRAINT `fk_Order_has_Ingredient_Order1` FOREIGN KEY (`orderId`) REFERENCES `Order` (`orderId`);

--
-- Constraints for table `PackageDish`
--
ALTER TABLE `PackageDish`
  ADD CONSTRAINT `fk_Package_has_Dish_Dish1` FOREIGN KEY (`dishId`) REFERENCES `Dish` (`dishId`),
  ADD CONSTRAINT `fk_Package_has_Dish_Package1` FOREIGN KEY (`packageId`) REFERENCES `Package` (`packageId`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `orderId` FOREIGN KEY (`orderId`) REFERENCES `Order` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
