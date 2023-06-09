-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 07:21 PM
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
-- Database: `jewelry_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_ad` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_ad`, `password_ad`, `name_ad`, `surname_ad`, `address_ad`) VALUES
('Admin001', 'AD001', 'Harry', 'Pottae', '119 วงศ์สว่าง19 แขวงวงศ์สว่าง เขตบางซื่อ จ.กรุงเทพมหานคร 10800'),
('Admin002', 'AD002', 'Luna', 'Lovegod', '236 ซ.วงศ์สว่าง7 แขวงวงศ์สว่าง เขตบางซื่อ จ.กรุงเทพมหานคร 10800');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_cus` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username_cus`, `password_cus`, `name_cus`, `surname_cus`, `address_cus`) VALUES
('Cus001', 'Cus001', 'ชมพูนุท', 'จิตวรเวช', '55 ถนนเพชรบุรี แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ 10310'),
('Cus002', 'tonystoke@gmail.com', 'ธารา ', 'ธงชัย', '999/9 ถนนพหลโยธิน สามเสนใน พญาไท กรุงเทพมหานคร 10400\r\n'),
('Dear', 'Dear123', 'ปรียาดา ', 'วงศ์เจริญ', '45/8 เเขวงคลองสาน เขตคลองสาน กรุงเทพมหานคร 10600\r\n'),
('jenniekim', 'Aa11', 'เจนนี่', 'คิม', 'dd 100'),
('kimmy', 'Aa001', 'ดารินทร', 'คิม', 'ซอย วงค์สว่าง 11'),
('nookie', 'Aa11', 'ปฐมา ', 'ตรีทรัพย์', '87\r\nถนน ประดิษฐ์มนูธรรม แขวง บางกะปิ เขต ห้วยขวาง\r\n10310\r\n'),
('rose', 'Aa11', 'พิมพก', 'สายธาร', 'aa 111');

-- --------------------------------------------------------

--
-- Table structure for table `email_admin`
--

CREATE TABLE `email_admin` (
  `username_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_admin`
--

INSERT INTO `email_admin` (`username_ad`, `email_ad`) VALUES
('Admin001', 'harry1@gmail.com'),
('Admin002', 'lanulovegod@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `email_customer`
--

CREATE TABLE `email_customer` (
  `username_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_customer`
--

INSERT INTO `email_customer` (`username_cus`, `email_cus`) VALUES
('Cus001', 'johnwoke@gamil.com'),
('Cus002', 'tonystoke@gmail.com'),
('Dear', 'Dear@d.com'),
('jenniekim', 'apricotacot@gmail.com'),
('kimmy', 'ss@gmail.com'),
('nookie', 'nook@ie.com'),
('rose', 'ro@se.s');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `date_order` date NOT NULL,
  `time_order` time NOT NULL,
  `qty_product` int(11) NOT NULL,
  `username_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(50) NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`date_order`, `time_order`, `qty_product`, `username_cus`, `id_product`, `payment_status`) VALUES
('0000-00-00', '00:00:00', 0, '', 0, ''),
('2022-10-10', '10:10:10', 1, 'jenniekim', 4, 'notpaid'),
('2022-10-10', '11:11:11', 1, 'jenniekim', 9, 'paid'),
('2022-11-18', '15:22:11', 2, 'jenniekim', 1, 'paid'),
('2022-11-18', '15:22:11', 1, 'jenniekim', 5, 'paid'),
('2022-11-18', '15:22:22', 1, 'jenniekim', 8, 'notpaid'),
('2022-11-18', '15:55:55', 1, 'jenniekim', 6, 'notpaid'),
('2022-11-18', '16:00:00', 1, 'jenniekim', 8, 'notpaid'),
('2022-11-18', '16:00:00', 1, 'rose', 2, 'notpaid'),
('2022-11-18', '16:16:16', 1, 'jenniekim', 4, 'paid'),
('2022-11-18', '16:16:18', 1, 'jenniekim', 4, 'notpaid'),
('2022-11-18', '19:00:00', 1, 'rose', 2, 'paid'),
('2023-01-01', '10:53:00', 2, 'Cus002', 1, 'paid'),
('2023-01-01', '12:24:00', 2, 'Cus001', 3, 'paid'),
('2023-01-01', '12:24:00', 1, 'Cus001', 7, 'paid'),
('2023-01-01', '12:24:00', 2, 'Cus001', 11, 'paid'),
('2023-01-14', '10:53:00', 2, 'Cus002', 3, 'paid'),
('2023-02-14', '10:53:00', 4, 'Cus002', 10, 'confirm'),
('2022-12-12', '12:12:12', 1, 'rose', 2, 'notpaid'),
('2022-12-12', '12:12:12', 1, 'rose', 2, 'notpaid'),
('2023-01-13', '13:13:13', 1, 'rose', 15, 'paid'),
('2023-01-13', '13:13:13', 1, 'rose', 4, 'paid'),
('2022-11-22', '08:01:02', 1, 'Cus001', 1, 'paid'),
('2022-11-23', '11:50:17', 1, 'Cus001', 1, 'paid'),
('2022-11-23', '11:50:17', 1, 'Cus001', 2, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(50) NOT NULL,
  `name_product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price_product` decimal(10,0) NOT NULL,
  `num_product` int(11) NOT NULL,
  `id_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `price_product`, `num_product`, `id_type`) VALUES
(1, 'สร้อยลายใบแปะก๊วย', '1200', 15, 'T001'),
(2, 'สร้อยเงินลายไม้กางเขน', '550', 9, 'T001'),
(3, 'สร้อยลายโซ่สีทอง', '690', 10, 'T001'),
(4, 'สร้อยทรงแบนสีทอง', '690', 15, 'T001'),
(5, 'สร้อยจี้สี่้หลี่ยมสีทอง', '790', 15, 'T001'),
(6, 'สร้อยจี้ลายหินอ่อน', '560', 15, 'T001'),
(7, 'ต่างหูมุก', '450', 15, 'T003'),
(8, 'ต่างหูรูปดาว', '690', 10, 'T003'),
(9, 'ต่างหูรูปใบไม้', '450', 10, 'T003'),
(10, 'ต่างหูทรงหยดน้ำสีทอง', '720', 15, 'T003'),
(11, 'ต่างหูแบบหนีบทรงกลม', '450', 10, 'T003'),
(12, 'ต่างหูลายขวางขดกลม', '890', 20, 'T003'),
(13, 'แหวนทองลายเรียบ', '850', 20, 'T002'),
(14, 'แหวนเงินลายเรียบ', '690', 20, 'T002'),
(15, 'แหวนเพชรทรงมาคีสีทอง', '1590', 15, 'T002'),
(16, 'แหวนเพชรเงินลายโซ่', '1250', 20, 'T002'),
(17, 'กำไลลายโซ่สีทอง', '750', 15, 'T004'),
(18, 'กำไลสีทองเส้นเล็ก', '450', 15, 'T004'),
(19, 'กำไลลายเลขโรมันสีเงิน', '850', 20, 'T004'),
(20, 'กำไลเพชรลายคลื่นสีทอง', '1650', 10, 'T004'),
(35, 'a', '80', 9, 'T002');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id_type`, `name_type`) VALUES
('T001', 'Necklace'),
('T002', 'ring'),
('T003', 'earring'),
('T004', 'bracelet');

-- --------------------------------------------------------

--
-- Table structure for table `tel_admin`
--

CREATE TABLE `tel_admin` (
  `username_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel_ad` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tel_admin`
--

INSERT INTO `tel_admin` (`username_ad`, `tel_ad`) VALUES
('Admin001', '0823456789'),
('Admin002', '0812345678');

-- --------------------------------------------------------

--
-- Table structure for table `tel_customer`
--

CREATE TABLE `tel_customer` (
  `username_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel_cus` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tel_customer`
--

INSERT INTO `tel_customer` (`username_cus`, `tel_cus`) VALUES
('Cus001', '08543210667'),
('Cus002', '0234567895'),
('Dear', '0222222222'),
('jenniekim', '04567891011'),
('kimmy', '0111111111'),
('nookie', '0333333333'),
('rose', '01111111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_ad`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username_cus`);

--
-- Indexes for table `email_admin`
--
ALTER TABLE `email_admin`
  ADD PRIMARY KEY (`username_ad`,`email_ad`);

--
-- Indexes for table `email_customer`
--
ALTER TABLE `email_customer`
  ADD PRIMARY KEY (`username_cus`,`email_cus`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD KEY `username_cus` (`username_cus`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `tel_admin`
--
ALTER TABLE `tel_admin`
  ADD PRIMARY KEY (`username_ad`,`tel_ad`);

--
-- Indexes for table `tel_customer`
--
ALTER TABLE `tel_customer`
  ADD PRIMARY KEY (`username_cus`,`tel_cus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `product_type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
