-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:35 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `City` varchar(255) NOT NULL,
  `Roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`, `Gender`, `Image`, `City`, `Roles`) VALUES
(5, 'Hammad', 'hammad@gmail.com', '123456', 'male', 'face1.jpg', 'Islamabad', 'Admin'),
(6, 'Ahmed', 'ahmed@gmail.com', '123456', 'male', 'face8.jpg', 'Karachi', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brand_Id` int(11) NOT NULL,
  `Brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brand_Id`, `Brand_name`) VALUES
(1, 'Nikki'),
(2, 'Addidas'),
(3, 'Polo'),
(4, 'Calvin Klein'),
(5, 'Diesel'),
(6, 'Polo'),
(7, 'Tommy Hilfiger'),
(8, 'Sana Safinaz'),
(9, 'Casio');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_Id` int(255) NOT NULL,
  `Cat_Brands` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_Id`, `Cat_Brands`) VALUES
(6, 'Electronics'),
(7, 'Farniture');

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `Cat_Detail_Id` int(255) NOT NULL,
  `Cat_Detail` varchar(255) DEFAULT NULL,
  `Cat_SubImg1` varchar(255) DEFAULT NULL,
  `Cat_SubImg2` varchar(255) DEFAULT NULL,
  `Cat_SubImg3` varchar(255) DEFAULT NULL,
  `Category_Id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`Cat_Detail_Id`, `Cat_Detail`, `Cat_SubImg1`, `Cat_SubImg2`, `Cat_SubImg3`, `Category_Id`) VALUES
(6, 'Smart TVs are very much like smartphones; they stream entertainment straight to your TV via an internet connection. This means that you can watch all the latest films, box sets and play games on your smart TV without the need for an aerial, cable or separ', 'TV1.webp', 'TV2.webp', 'TV3.webp', 6),
(7, 'Interwood. Interwood is one of the most popular furniture brands in Pakistan, with branches almost everywhere. It is purely known for its elegant, classy, and sleek designs. Interwood deals in furnishings for both offices and homes.\r\n', 'Furniture1.jpg', 'Furniture2.jpg', 'Furniture3.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category_item`
--

CREATE TABLE `category_item` (
  `Cat_Id` int(255) NOT NULL,
  `Cat_Name` varchar(255) DEFAULT NULL,
  `Cat_Price` varchar(255) DEFAULT NULL,
  `Cat_Dis_Price` varchar(255) DEFAULT NULL,
  `Cat_Brand` varchar(255) NOT NULL,
  `Cat_Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_item`
--

INSERT INTO `category_item` (`Cat_Id`, `Cat_Name`, `Cat_Price`, `Cat_Dis_Price`, `Cat_Brand`, `Cat_Image`) VALUES
(6, 'Smart Tv', '70000', '40', 'Electronics', 'TV.webp'),
(7, 'Master Room Furniture', '500000', '40', 'Farniture', 'Furniture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(255) NOT NULL,
  `Firt_Name` varchar(255) DEFAULT NULL,
  `Street1` varchar(255) DEFAULT NULL,
  `Street2` varchar(255) DEFAULT NULL,
  `PostCode` varchar(255) DEFAULT NULL,
  `TownAndCity` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Number` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealsection`
--

CREATE TABLE `dealsection` (
  `Deal_Id` int(255) NOT NULL,
  `Deal_Image` varchar(255) NOT NULL,
  `Deal_Name` varchar(255) NOT NULL,
  `Deal_Desc` varchar(255) NOT NULL,
  `Deal_Sale` varchar(255) NOT NULL,
  `Deal_Ending_Date` date NOT NULL,
  `ststus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealsection`
--

INSERT INTO `dealsection` (`Deal_Id`, `Deal_Image`, `Deal_Name`, `Deal_Desc`, `Deal_Sale`, `Deal_Ending_Date`, `ststus`) VALUES
(1, 'insta-4.jpg', 'Ladis Products', 'This is Ladis Products.', '20%', '2023-09-04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `homebanner`
--

CREATE TABLE `homebanner` (
  `Id` int(255) NOT NULL,
  `HomeBannerImg` varchar(255) NOT NULL,
  `Text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homebanner`
--

INSERT INTO `homebanner` (`Id`, `HomeBannerImg`, `Text`) VALUES
(1, 'banner-1.jpg', 'Mens'),
(2, 'banner-2.jpg', 'Girl Collection'),
(3, 'banner-3.jpg', 'Childern Collection');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pro_id` int(255) NOT NULL,
  `checkout_Id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_Id` int(255) NOT NULL,
  `productsSubTitle` varchar(255) DEFAULT NULL,
  `productsPrice` varchar(255) DEFAULT NULL,
  `productsDisPrice` varchar(255) DEFAULT NULL,
  `productsImage` varchar(255) DEFAULT NULL,
  `brands` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_Id`, `productsSubTitle`, `productsPrice`, `productsDisPrice`, `productsImage`, `brands`) VALUES
(7, 'Shoes', '2000', '10', 'Shoes.jpg', 'Addidas'),
(8, 'Shirt', '1500', '5', 'thumb-1.jpg', 'Calvin Klein'),
(22, 'Men Shirts', '1200', '15', 'man-4.jpg', 'Polo'),
(23, 'Baby Shirt', '690', '44', 'Shirt1.webp', 'Polo'),
(26, 'Short Sleeve Graphic T-Shirt', '500', '50', 'img.jpg', 'Polo'),
(27, 'Casio Men Watch', '5000', '50', 'img.jpg', 'Casio');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `detail_id` int(255) NOT NULL,
  `pro_detail` varchar(255) DEFAULT NULL,
  `subImg1` varchar(255) DEFAULT NULL,
  `subImg2` varchar(255) DEFAULT NULL,
  `subImg3` varchar(255) DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`detail_id`, `pro_detail`, `subImg1`, `subImg2`, `subImg3`, `product_id`) VALUES
(6, 'This is Adidas Shoes.', 'shoes1.jpg', 'shoes2.jpg', 'shoes3.jpg', 7),
(7, 'This is Shirt.', 'product-2.jpg', 'product-3.jpg', 'thumb-3.jpg', 8),
(10, 'This is Shirt.', 'man-3.jpg', 'product-8.jpg', 'man-4.jpg', 22),
(11, 'Stylish printed round neck half sleeves T shirt For Girls/Women\r\n', 'Shirt2.webp', 'Shirt3.webp', 'Shirt4.webp', 23),
(13, 'The Children Place Girls Short Sleeve Graphic T-Shirt\r\n', 'img1.jpg', 'img2.jpg', 'img3.jpg', 26),
(14, 'Casio Men MDV106-1AV 200 M WR Black Dive Watch (MDV106-1A)\r\n', 'img1.jpg', 'img2.jpg', 'img3.jpg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `register_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`register_id`, `name`, `email`, `number`, `pass`) VALUES
(3, 'Ahmed Ali', 'ahmed@gmail.com', '273221663', '123'),
(27, 'Eman', 'eman@gmail.com', '123456789', '12345'),
(28, 'Irfan Sheikh', 'irfan@gmail.com', '12847845747', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `sale` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `name`, `desc`, `sale`, `image`) VALUES
(3, 'Hat', 'Girl Collection', '40%', 'insta-2.jpg'),
(4, 'Long Court', 'Man Collection', '20%', 'insta-5.jpg'),
(5, 'Shirt', 'Man Collection', '10%', 'Shirt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brand_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`Cat_Detail_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- Indexes for table `category_item`
--
ALTER TABLE `category_item`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `dealsection`
--
ALTER TABLE `dealsection`
  ADD PRIMARY KEY (`Deal_Id`);

--
-- Indexes for table `homebanner`
--
ALTER TABLE `homebanner`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `checkout_Id` (`checkout_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_Id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Brand_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `Cat_Detail_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_item`
--
ALTER TABLE `category_item`
  MODIFY `Cat_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `dealsection`
--
ALTER TABLE `dealsection`
  MODIFY `Deal_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homebanner`
--
ALTER TABLE `homebanner`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `detail_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `register_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `category_item` (`Cat_Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`checkout_Id`) REFERENCES `checkout` (`checkout_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`products_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
