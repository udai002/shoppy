-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 11:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_cat` text NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `prod_descrp` text NOT NULL,
  `user_id` int(255) NOT NULL,
  `prod_price` int(20) NOT NULL,
  `prod_image` text NOT NULL,
  `prod_id` int(20) NOT NULL,
  `prod_qunt` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_cat`, `prod_name`, `prod_descrp`, `user_id`, `prod_price`, `prod_image`, `prod_id`, `prod_qunt`) VALUES
(105, 'Choose Category', 'Fastrack black with ', 'Fastrack black with premium leather strap for men', 15, 1599, 'IMG-629480ac33fed4.22870712.jpg', 14, 1),
(106, 'Choose Category', 'Titan black', 'Titan premium watch design', 15, 1299, 'IMG-62947f39a02442.62022973.jpg', 12, 1),
(107, 'Choose Category', 'Fastrack watch for w', 'Fastrack women watch with blue trip', 15, 1700, 'IMG-629481aa711be1.11372562.jpg', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbac`
--

CREATE TABLE `feedbac` (
  `Feed_id` int(255) NOT NULL,
  `prod_id` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Feedback` text NOT NULL,
  `order_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbac`
--

INSERT INTO `feedbac` (`Feed_id`, `prod_id`, `user_id`, `Rating`, `Feedback`, `order_id`) VALUES
(1, '2', 22, 4, 'awesome', '498579'),
(2, '0', 23, 4, '', 'ORD373184'),
(3, '0', 23, 4, 'Taste is good', 'ORD373184'),
(4, '0', 23, 3, 'not so good', 'ORD567624'),
(5, '0', 23, 3, 'not so good', 'ORD567624'),
(6, 'PRO-61f663025dc1d7.77537105', 22, 3, 'this is awesome', 'ORD577147'),
(7, 'PRO-61f663025dc1d7.77537105', 22, 0, '', 'ORD577147'),
(8, 'PRO-61f663025dc1d7.77537105', 22, 3, 'this is awesome', 'ORD577147'),
(9, 'PRO-61f663025dc1d7.77537105', 22, 4, 'this product is awesome yaar', 'ORD577147'),
(10, 'ROP-2', 23, 3, 'not so good', 'ORD373184'),
(11, '', 0, 0, '', ''),
(12, '', 0, 0, '', ''),
(13, '', 0, 0, '', ''),
(14, 'ROP-2', 23, 2, 'thiis is worst than ever', 'ORD373184 ?>'),
(15, 'ROP-2', 23, 4, 'what happened right now', 'ORD373184 ?>'),
(16, 'ROP-2', 23, 3, 'how is this possible!', 'ORD373184 ?>'),
(17, 'ROP-2', 23, 3, 'what is happening right now\r\n\r\n', 'ORD373184'),
(18, 'PRO-1', 23, 4, 'this is awesome drink which i have never drunk', 'ORD161806'),
(19, '', 0, 0, '', ''),
(20, 'PRO-61f663025dc1d7.77537105', 23, 4, 'wow it taste good', 'ORD567624'),
(21, 'PRO-61379d43ab8fc5.65724624', 22, 4, 'this is awesome i like it taste', 'ORD118952'),
(22, 'ROP-5', 22, 4, 'i will recommand this to buy', 'ORD388378'),
(23, 'PRO-1', 15, 4, 'this is awsome', 'ORD466638'),
(24, 'PRO-1', 15, 4, 'this is a apple juice  i have never drunk', 'ORD435500'),
(25, 'PRO-62947f39a02044.77307715', 15, 4, 'awsome watch', 'ORD866511');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` text NOT NULL,
  `prod_name` text NOT NULL,
  `prod_image` text NOT NULL,
  `product_id` text NOT NULL,
  `prod_price` int(12) NOT NULL,
  `prod_quanti` int(5) NOT NULL,
  `total_price` int(12) NOT NULL,
  `user_id` int(15) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_address` text NOT NULL,
  `user_city` varchar(15) NOT NULL,
  `user_navt` varchar(10) NOT NULL,
  `user_pin` int(11) NOT NULL,
  `user_dist` varchar(20) NOT NULL,
  `userstate` varchar(110) NOT NULL,
  `order_status` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prod_name`, `prod_image`, `product_id`, `prod_price`, `prod_quanti`, `total_price`, `user_id`, `user_name`, `user_mobile`, `user_address`, `user_city`, `user_navt`, `user_pin`, `user_dist`, `userstate`, `order_status`, `date`) VALUES
('', 'name', 'image', 'pro_id', 234, 3, 500, 4, 'user', '985676443', 'address', 'city', 'nav', 543267, 'distric', '', 0, '2022-03-23 12:33:28'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:39:09'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:41:40'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:41:43'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:42:03'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:42:11'),
('ORD577147', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 5, 150, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 16:42:47'),
('ORD118952', 'mango juice', 'IMG-61379d43ab9198.31799391.jpg', 'PRO-61379d43ab8fc5.65724624', 900, 1, 900, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-18 20:40:52'),
('ORD460181', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 600, 2, 1200, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-04-18 23:30:46'),
('ORD466638', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 600, 2, 1200, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-04-18 23:35:08'),
('ORD466638', 'Ytal juice', 'IMG-6121322ed40a33.06860308.jpeg', 'ROP-2', 555, 2, 1110, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-04-18 23:36:03'),
('ORD466638', 'Ytal juice', 'IMG-6121322ed40a33.06860308.jpeg', 'ROP-2', 555, 2, 1110, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-04-18 23:37:17'),
('ORD388378', 'mango juice', 'IMG-612362a3a5d094.91453033.jpeg', 'ROP-5', 600, 3, 1800, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-28 09:23:44'),
('ORD74529', 'mango juice', 'IMG-612355b55fdc61.85537471.jpg', 'ROP-4', 600, 10, 6000, 22, 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', 0, '2022-04-28 09:42:10'),
('ORD373184', 'Ytal juice', 'IMG-6121322ed40a33.06860308.jpeg', 'ROP-2', 555, 2, 1110, 23, 'nagarjuna', '985763854', 'vijayawada public school front road\r\nnear sidhardha college', ' vijayawada', 'urban', 522345, 'krishna', 'Andhra Pradesh', 0, '2022-04-29 17:36:59'),
('ORD161806', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 600, 1, 600, 23, 'nagarjuna', '985763854', 'vijayawada public school front road\r\nnear sidhardha college', ' vijayawada', 'urban', 522345, 'krishna', 'Andhra Pradesh', 0, '2022-04-29 18:42:39'),
('ORD567624', 'Mango Milk shake', 'IMG-61f663025e1478.62705461.png', 'PRO-61f663025dc1d7.77537105', 30, 1, 30, 23, 'nagarjuna', '985763854', 'vijayawada public school front road\r\nnear sidhardha college', ' vijayawada', 'urban', 522345, 'krishna', 'Andhra Pradesh', 0, '2022-04-29 18:43:52'),
('ORD906801', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 350, 1, 350, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-21 01:02:18'),
('ORD435500', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 350, 1, 350, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-21 12:12:49'),
('ORD228570', 'Ytal juice', 'IMG-6121322ed40a33.06860308.jpeg', 'ROP-2', 555, 2, 1110, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-21 12:13:17'),
('ORD228570', 'mango juice', 'IMG-612355b55fdc61.85537471.jpg', 'ROP-4', 450, 1, 450, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-21 12:13:17'),
('ORD228570', 'mango juice', 'IMG-612362a3a5d094.91453033.jpeg', 'ROP-5', 500, 1, 500, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-21 12:13:17'),
('ORD743557', 'Apple Juices', 'IMG-61212a4a83ca57.82999819.jpg', 'PRO-1', 350, 1, 350, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-25 18:09:33'),
('ORD866511', 'Titan black', 'IMG-62947f39a02442.62022973.jpg', 'PRO-62947f39a02044.77307715', 1299, 1, 1299, 15, 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', 0, '2022-05-30 14:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `prodquestion`
--

CREATE TABLE `prodquestion` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodquestion`
--

INSERT INTO `prodquestion` (`question_id`, `user_id`, `prod_id`, `Question`, `Answer`) VALUES
(1, 1, 1, 'how', '30'),
(2, 15, 2, 'how many bottles we will get ?', '30'),
(3, 15, 2, 'how we get it', 'we deliver you'),
(4, 15, 2, 'how it works', 'welcome this is a online shopping webpage '),
(5, 15, 2, '', 'what is your question please ask it again'),
(6, 15, 6, 'IS THIS LEMON SHAKE OR LEMON OR LEMON DRINK', 'lemon drink'),
(7, 15, 2, 'how bottles we get ?', '30 per case'),
(8, 17, 9, 'how many bottes we get in case', '30'),
(9, 15, 3, 'what is this', 'yeah'),
(10, 15, 2, 'how many bottles we get ?', '90'),
(11, 22, 4, 'is this a coca cola ?', 'this is a ytsl cola you can try this '),
(12, 15, 4, 'is this taste lika a coca cola ?', 'no its is different in taste ?');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(255) NOT NULL,
  `prod_category` text NOT NULL,
  `prod_uniq` text NOT NULL,
  `prod_image` text NOT NULL,
  `pro_title` varchar(20) NOT NULL,
  `product_descrip` text NOT NULL,
  `prod_price` int(12) NOT NULL,
  `pro_quant` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_category`, `prod_uniq`, `prod_image`, `pro_title`, `product_descrip`, `prod_price`, `pro_quant`, `status`, `date`) VALUES
(12, 'Choose Category', 'PRO-62947f39a02044.77307715', 'IMG-62947f39a02442.62022973.jpg', 'Titan black', 'Titan premium watch design', 1299, 'Choose quantity', '', '2022-05-30 13:54:25'),
(13, 'Choose Category', 'PRO-62948018dcba26.50429677', 'IMG-62948018dcbcf7.39482103.png', 'Limestone blue', 'Limestone blue watch with leather strap', 999, 'Choose quantity', '', '2022-05-30 13:58:08'),
(14, 'Choose Category', 'PRO-629480ac33fc77.42101658', 'IMG-629480ac33fed4.22870712.jpg', 'Fastrack black with ', 'Fastrack black with premium leather strap for men', 1599, 'Choose quantity', '', '2022-05-30 14:00:36'),
(15, 'Choose Category', 'PRO-62948135d460b8.18139528', 'IMG-62948135d462f2.08168607.jpg', 'Fastrack sliver prem', 'Fastrack sliver watch with sliver chain strip', 2199, 'Choose quantity', '', '2022-05-30 14:02:53'),
(16, 'Choose Category', 'PRO-629481aa7118c5.86831474', 'IMG-629481aa711be1.11372562.jpg', 'Fastrack watch for w', 'Fastrack women watch with blue trip', 1700, 'Choose quantity', '', '2022-05-30 14:04:50'),
(17, 'Choose Category', 'PRO-6294820d76b017.70945000', 'IMG-6294820d76b261.13968320.jpg', 'Fastrack watch for w', 'Fastrack watch with black leather for women', 1199, 'Choose quantity', '', '2022-05-30 14:06:29'),
(18, 'Choose Category', 'PRO-62948268bd9030.32339574', 'IMG-62948268bd93f0.59173847.jpg', 'Fastrack silver prem', 'Fastrack watch with sliver chain', 2500, 'Choose quantity', '', '2022-05-30 14:08:00'),
(19, 'Choose Category', 'PRO-629482cf1b4404.44811398', 'IMG-629482cf1b4754.19015236.png', 'Sonota watch', 'Sonata stone watch for women', 799, 'Choose quantity', '', '2022-05-30 14:09:43'),
(20, 'Choose Category', 'PRO-629484206513e3.21137731', 'IMG-62948420651878.71024019.jpg', 'Titan watch', 'Titan brown leather watch for women', 899, 'Choose quantity', '', '2022-05-30 14:15:20'),
(21, 'Choose Category', 'PRO-629484a0188b75.47230734', 'IMG-629484a0188ec7.81803810.jpg', 'Titan watch', 'Titan watch with white chain', 2999, 'Choose quantity', '', '2022-05-30 14:17:28'),
(22, 'Choose Category', 'PRO-629484de28d590.34466510', 'IMG-629484de28d8f7.26211220.jpg', 'Sonota watch', 'Sonota gold watch ', 999, 'Choose quantity', '', '2022-05-30 14:18:30'),
(23, 'Choose Category', 'PRO-6294854f53e418.96636220', 'IMG-6294854f53e727.52213736.jpg', 'Sonota watch for wom', 'sonota silver chain watch for women', 699, 'Choose quantity', '', '2022-05-30 14:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `prod_confirm`
--

CREATE TABLE `prod_confirm` (
  `conform_id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_Price` int(15) NOT NULL,
  `order_id` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prod_discount`
--

CREATE TABLE `prod_discount` (
  `Discount_id` int(11) NOT NULL,
  `dicount_percent` int(11) NOT NULL,
  `Discount_price` int(11) NOT NULL,
  `Prod_uniq` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_discount`
--

INSERT INTO `prod_discount` (`Discount_id`, `dicount_percent`, `Discount_price`, `Prod_uniq`) VALUES
(1, 34, 450, 'prod-iuhgfeoiurtsgh'),
(2, 42, 350, 'PRO-1'),
(3, 12, 530, ''),
(4, 25, 450, 'ROP-4'),
(5, 17, 500, 'ROP-5'),
(6, 38, 560, 'PRO-61379d43ab8fc5.65724624'),
(7, 10, 500, 'ROP-2');

-- --------------------------------------------------------

--
-- Table structure for table `prod_image`
--

CREATE TABLE `prod_image` (
  `prod_id` int(10) NOT NULL,
  `img_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_image`
--

INSERT INTO `prod_image` (`prod_id`, `img_name`) VALUES
(0, 'PROIMG-61c96d661d0463.02431115.jfif'),
(0, 'PROIMG-61cc07087d98a9.63501736.jfif'),
(0, 'PROIMG-61cc1a46686687.02134219.jfif'),
(2, 'PROIMG-61cc1b2ce80147.04243738.jfif'),
(2, 'PROIMG-61cc1c5b55b844.79055107.jpg'),
(4, 'PROIMG-61cc1dd03752f4.03423848.jpeg'),
(4, 'PROIMG-626a93a7c0d951.67387554.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `user_id` int(255) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_address` text NOT NULL,
  `usercity` varchar(20) NOT NULL,
  `usernavt` text NOT NULL,
  `user_pincode` int(10) NOT NULL,
  `userdist` varchar(20) NOT NULL,
  `user_state` varchar(110) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`user_id`, `user_mail`, `user_name`, `user_mobile`, `user_address`, `usercity`, `usernavt`, `user_pincode`, `userdist`, `user_state`, `user_password`, `date`) VALUES
(1, 'udai@123', 'udai', '909494057', 'vuuyuru public school back side road', '', '', 0, '', '', 'udai@123', '2021-08-11 14:52:40'),
(2, 'udai@02', 'rohan', '2147483647', 'this is my address', '', '', 0, '', '', '1234', '2021-08-11 15:28:51'),
(3, 'yt@223', 'sale', '964686735', 'this is mine', '', '', 0, '', '', '12345', '2021-08-11 15:30:46'),
(4, 'udai@22', 'udai', '9090909090', 'this is my adress', 'vuyyuru ', 'urban', 0, 'krishna', '', '1234', '2021-08-17 13:56:01'),
(5, 'vachindha@002', 'udai', '9099675634', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'option1', 0, 'krishna', '', 'pass', '2021-08-17 14:00:21'),
(6, 'karumuriudaisai002@gmail.com', '', '6798903451', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'option2', 0, 'krishna', '', 'pass1', '2021-08-17 14:02:09'),
(7, 'karumuriudaisai002@gmail.com', '', '6798903451', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'option2', 0, 'krishna', '', 'pass1', '2021-08-17 14:03:01'),
(8, 'karumuriudaisai002@gmail.com', 'udai', '6789903452', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'rural', 0, 'krishna', '', 'pass2', '2021-08-17 14:04:07'),
(10, 'udai@0202', 'udai', '9567342123', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', '$2y$10$5wf2NnxOG9EuTitk6wXAwuJ0g646wLBNlbj9NJlr2rm', '2021-08-19 15:14:25'),
(11, 'udai@34', 'rohan', '9087654321', 'this is address', ' city', 'urban', 0, 'krishna', '', '$2y$10$l6qjxzF.mDF1z/kEScOAn.Axak4qD9kty5gchIGczXd', '2021-08-19 15:24:01'),
(12, 'udai@11', 'mukhesh', '9906755432', 'address ', ' city', 'urban', 0, 'krishna', '', '$2y$10$S4kJ09s.cldEq/fBRjL1EeM1C/4vUvW1a.zct8vIsba', '2021-08-19 16:45:10'),
(13, 'udai@3232', 'ricky', '9087642345', 'adress', ' city', 'urban', 0, 'krish', '', '$2y$10$E9tQTVt2hXMR00t7cgHT/uWb/gXKqUp.nYUYkLlwCJvwx7Hu5cSo2', '2021-08-19 19:31:29'),
(14, 'd@2', 'dad', '808088081', 'address ', ' city', 'urban', 0, 'krish', '', '$2y$10$d0ZzQiuuxPfhq.jaQyeF4e9vAd4WzVagqxpVj35qH1nn6tSs3RYuG', '2021-08-19 19:35:19'),
(15, 'owner@1', 'owner', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', '$2y$10$6lMMMHGvohZ/3rhSlKm18ub246oAqjQNK1R6p3oKvhhen.ZK2bxPa', '2021-08-20 23:41:37'),
(16, 'udai@1', 'jsiodln', '9045623112', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krihna', '', '$2y$10$b8IHp30XclxxO/366WiIleEJuiBmuconUigv5dW3tq8R8s7RMOyUG', '2021-08-21 00:23:36'),
(17, 'udai@99', 'udai', '909456789', 'this is adress', ' city', 'urban', 0, 'guntur', '', '$2y$10$uJH1CJVpxu.NZ7CSWTMXOeAhdHdCdOUyqdrKbaIiNq1yXi/aI/LES', '2021-08-21 21:11:55'),
(18, 'Admin@1', 'Admin', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna', '', '$2y$10$O/94ZF1AGqQXJucwi2PF3.iZq0iPiY00JPQjLgtaLr52kxcI4.mwi', '2021-12-27 11:32:47'),
(19, 'karumuriuda@gmail.com', '', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 0, '', '', '$2y$10$4phBzfoD49og/yKllxi56.0cmDmNfrECO6F5tNsJFOFayQhDsTCJ6', '2022-01-08 11:28:42'),
(20, 'karumuriudais@gmail.com', 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, 'krishna ', '', '$2y$10$yMeZ4vCaXT5mWsaoBI9o8e0JSDNE2iNGrpptmDK6JgerO80kZF3Im', '2022-01-08 11:30:52'),
(21, 'sfsfsfsfsour@gmail.com', '', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', 'urban', 0, '', '', '$2y$10$sLh2swJfl0C/C0Q7xvqfUe84eWFq7zQhM3R0PM2LeBEaEqlN6wTL.', '2022-01-08 11:32:57'),
(22, 'udai8899@gmail.com', 'udai', '08897558177', 'vuyyuru public school back road\r\nnear AG and SG college', ' vuyyuru', '', 521165, 'krishna', '', '$2y$10$XWG7OmyzSBHj9rH10mMPuepqGiimp36Hw.OaN9eCIOkLCKW1ew/w2', '2022-03-23 12:15:35'),
(23, 'nagarjuna002@gmail.com', 'nagarjuna', '985763854', 'vijayawada public school front road\r\nnear sidhardha college', ' vijayawada', 'urban', 522345, 'krishna', 'Andhra Pradesh', '$2y$10$zs.8lu11IxuG.2Xha1GKUO9NQ0KO3NpvmasnNBJ/m5/Pes0SWFe/a', '2022-04-29 17:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `user_mail` varchar(200) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_selected` varchar(200) NOT NULL,
  `user_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`user_mail`, `user_mobile`, `user_selected`, `user_message`) VALUES
('mail', '958984676', 'selected', 'message'),
('karumuriudaisai002@gmail.com', '2147483647', '1', 'some bugs in webpage'),
('karumuriudaisai002@gmail.com', '2147483647', '1', 'some bugs in webpage'),
('karumuriudaisai002@gmail.com', '08897558177', '1', 'some bugs in webpage'),
('karumuriudaisai002@gmail.com', '08897558177', 'Other', 'some bugs in webpage'),
('karumuriudaisai002@gmail.com', '08897558177', 'Other', 'some bugs in webpage'),
('', '', 'Choose...', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `feedbac`
--
ALTER TABLE `feedbac`
  ADD PRIMARY KEY (`Feed_id`);

--
-- Indexes for table `prodquestion`
--
ALTER TABLE `prodquestion`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `pro_title` (`pro_title`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_descrip` (`product_descrip`);

--
-- Indexes for table `prod_confirm`
--
ALTER TABLE `prod_confirm`
  ADD PRIMARY KEY (`conform_id`);

--
-- Indexes for table `prod_discount`
--
ALTER TABLE `prod_discount`
  ADD PRIMARY KEY (`Discount_id`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `feedbac`
--
ALTER TABLE `feedbac`
  MODIFY `Feed_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prodquestion`
--
ALTER TABLE `prodquestion`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prod_confirm`
--
ALTER TABLE `prod_confirm`
  MODIFY `conform_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod_discount`
--
ALTER TABLE `prod_discount`
  MODIFY `Discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
