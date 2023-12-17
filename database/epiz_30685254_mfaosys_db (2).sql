-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql105.epizy.com
-- Generation Time: May 06, 2022 at 05:49 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30685254_mfaosys_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `suppliersales`
-- (See below for the actual view)
--
CREATE TABLE `suppliersales` (
`tdate` varchar(50)
,`supplier_name` varchar(150)
,`customer_name` varchar(150)
,`reference` varchar(20)
,`amount` decimal(32,0)
,`shippingrate` int(11)
,`totalAmt` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `comment_id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_password` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `reference_id` varchar(6) DEFAULT NULL,
  `verify` int(1) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 1,
  `uploaded_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customer_id`, `customer_name`, `customer_password`, `address`, `contact_no`, `reference_id`, `verify`, `active`, `uploaded_file`) VALUES
(1, 'ralph syping', 'e2282829f546bbcb216693e2a5659a79', 'Brgy. Tabao Valladolid', '09750274519', '656823', 1, 1, 'Valid ID.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliveryman`
--

CREATE TABLE `tbldeliveryman` (
  `deliveryman_id` int(11) NOT NULL,
  `deliveryman_name` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `contact_no` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldeliveryman`
--

INSERT INTO `tbldeliveryman` (`deliveryman_id`, `deliveryman_name`, `password`, `active`, `contact_no`, `address`, `supplier_id`) VALUES
(1, 'Chelsea Pelinio', '8b2ee8d21515bf011e178f0acaa5ebbc', 1, '09973254530', 'Murcia', 1),
(2, 'Delivery 1', 'e10adc3949ba59abbe56e057f20f883e', 1, '09468729024', 'bacolod ', 3),
(3, 'johshua bats', 'd7f1d2fcc7a27443c02d2e9e93dbbbb7', 1, '09494688776', 'Murcia', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliverytransaction`
--

CREATE TABLE `tbldeliverytransaction` (
  `deliverytransaction_id` int(11) NOT NULL,
  `deliveryman_id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `date_deliver` varchar(50) NOT NULL,
  `date_approve` varchar(50) NOT NULL,
  `payed` int(1) NOT NULL DEFAULT 0,
  `return_id` int(1) NOT NULL DEFAULT 0,
  `send_id` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldeliverytransaction`
--

INSERT INTO `tbldeliverytransaction` (`deliverytransaction_id`, `deliveryman_id`, `reference_id`, `date_deliver`, `date_approve`, `payed`, `return_id`, `send_id`) VALUES
(1, 3, 'M1ymcaIvUqjd', '2022-05-06', '05/06/2022', 1, 0, 0),
(2, 3, 'X0eeIr7e0Dkk', '2022-05-06', '05/06/2022', 1, 0, 0),
(3, 3, '8M7yO08d159j', '2022-05-06', '05/06/2022', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldistributor`
--

CREATE TABLE `tbldistributor` (
  `distributor_id` int(11) NOT NULL,
  `distributor_name` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldistributor`
--

INSERT INTO `tbldistributor` (`distributor_id`, `distributor_name`, `supplier_id`, `active`) VALUES
(1, 'Cardo Dalisay', 1, 1),
(2, 'Ralph Syping', 1, 1),
(3, 'Leslie Tinto', 1, 1),
(4, 'Leslie Tinto', 3, 1),
(5, 'romar plants', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmaintransaction`
--

CREATE TABLE `tblmaintransaction` (
  `transaction_id` int(11) NOT NULL,
  `reference_id` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tdate` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `shippingrate_id` int(11) DEFAULT 0,
  `supplier_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmaintransaction`
--

INSERT INTO `tblmaintransaction` (`transaction_id`, `reference_id`, `customer_id`, `product_id`, `tdate`, `amount`, `qty`, `shippingrate_id`, `supplier_id`, `status_id`) VALUES
(1, 'jxpM904P3r4h', 1, 1, '05/06/2022', 1000, 5, 0, NULL, 1),
(2, '', 0, 1, '05/06/2022', 1200, 6, 0, NULL, 0),
(3, 'M1ymcaIvUqjd', 1, 1, '05/06/2022', 2000, 10, 14, 5, 2),
(4, 'X0eeIr7e0Dkk', 1, 1, '05/06/2022', 1000, 5, 14, 5, 2),
(6, '8M7yO08d159j', 1, 1, '05/06/2022', 200, 1, 13, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `payment_id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_payed` varchar(50) NOT NULL,
  `deliveryman_id` int(11) NOT NULL,
  `proof_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`payment_id`, `reference_id`, `supplier_id`, `amount`, `date_payed`, `deliveryman_id`, `proof_image`) VALUES
(1, 'M1ymcaIvUqjd', 5, 2150, '05/06/2022', 3, 'Snake plant.jpeg'),
(2, 'X0eeIr7e0Dkk', 5, 1150, '05/06/2022', 3, 'Croton.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tblproductransact`
--

CREATE TABLE `tblproductransact` (
  `prod_transact_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tdate` varchar(50) NOT NULL,
  `Pout` int(11) NOT NULL DEFAULT 0,
  `PIn` int(11) NOT NULL DEFAULT 0,
  `supplier_id` int(11) NOT NULL,
  `reference_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductransact`
--

INSERT INTO `tblproductransact` (`prod_transact_id`, `distributor_id`, `product_id`, `tdate`, `Pout`, `PIn`, `supplier_id`, `reference_id`) VALUES
(1, 0, 1, '05/06/2022', 0, 100, 5, 'd358MnEt6r4A'),
(2, 0, 2, '05/06/2022', 0, 100, 1, 'eg2GsFVCD1Py'),
(3, 0, 1, '05/06/2022', 10, 0, 5, 'M1ymcaIvUqjd'),
(4, 0, 1, '05/06/2022', 5, 0, 5, 'X0eeIr7e0Dkk');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `product_id` int(11) NOT NULL,
  `product_desc` varchar(150) NOT NULL,
  `image` varchar(300) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_details` varchar(300) NOT NULL DEFAULT 'NA',
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`product_id`, `product_desc`, `image`, `supplier_id`, `price`, `product_details`, `active`) VALUES
(1, 'Snake Plant', 'Snake plant.jpeg', 5, 200, 'nami,tahom', 1),
(2, 'Sunflower', 'Sunflower.jpg', 1, 150, 'nami color ', 1),
(3, 'Croton', 'Croton.webp', 1, 300, 'healthy', 1),
(4, 'Croton', 'Croton.webp', 1, 3213, 'nami', 1),
(5, 'Sunflower', 'Sunflower.jpg', 1, 121, 'nami', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblrequestcustomer`
--

CREATE TABLE `tblrequestcustomer` (
  `reqcust_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `cdate` varchar(50) NOT NULL,
  `sendby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnstatus`
--

CREATE TABLE `tblreturnstatus` (
  `return_id` int(11) NOT NULL,
  `return_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreturnstatus`
--

INSERT INTO `tblreturnstatus` (`return_id`, `return_desc`) VALUES
(1, 'Broken/Wrong Item'),
(2, 'Not Receive/Un Payed');

-- --------------------------------------------------------

--
-- Table structure for table `tblshippingrate`
--

CREATE TABLE `tblshippingrate` (
  `shippingrate_id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `shippingrate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshippingrate`
--

INSERT INTO `tblshippingrate` (`shippingrate_id`, `town_id`, `supplier_id`, `shippingrate`) VALUES
(1, 1, 1, 100),
(2, 2, 1, 150),
(3, 3, 1, 150),
(4, 4, 1, 100),
(5, 5, 1, 150),
(6, 6, 1, 75),
(7, 1, 3, 150),
(8, 2, 3, 140),
(9, 3, 3, 130),
(10, 4, 3, 120),
(11, 5, 3, 160),
(12, 6, 3, 190),
(13, 1, 5, 100),
(14, 2, 5, 150),
(15, 3, 5, 175),
(16, 4, 5, 150),
(17, 5, 5, 175),
(18, 6, 5, 50),
(19, 7, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tblshoppingsteps`
--

CREATE TABLE `tblshoppingsteps` (
  `steps_id` int(11) NOT NULL,
  `steps_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`status_id`, `status_desc`) VALUES
(1, 'pending'),
(2, 'approve'),
(3, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `supplier_password` varchar(150) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `supplier_location` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `reference_id` varchar(20) NOT NULL,
  `uploaded_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`supplier_id`, `supplier_name`, `supplier_password`, `active`, `supplier_location`, `contact_no`, `reference_id`, `uploaded_file`) VALUES
(1, 'bruno mars', 'e59e5e00c57ed5eed4ef99624cdd213a', 3, 'Brgy. Estefania Bacolod City', '09555373936', '455542', 'Valid ID.jpg'),
(2, 'mark sy', 'd51bb81791303e37a22104090c7320ce', 3, 'Brgy. Estefania Bacolod City', '09459724127', '297160', 'Valid ID.jpg'),
(3, 'mark', 'd2f0e963198965722fd22e9ab414efbc', 3, 'Murcia', '09457254398', '', ''),
(4, 'cheng joy', 'b0203240cd391618f8cc3c78185e0cfe', 3, 'Brgy. Mandalagan Bacolod City', '09279250522', '425357', 'Valid ID.jpg'),
(5, 'tito wa', 'be4d6b9a0dc0f06a87c3c68daa0b1e07', 1, 'Brgy. Mandalagan Bacolod City', '09687720474', '994796', 'Valid ID.jpg'),
(6, 'mar refugio', '9880c35d8804ed40f467de976963966b', 1, 'Bacolod', '09555316488', '52635', 'Valid ID.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbltown`
--

CREATE TABLE `tbltown` (
  `town_id` int(11) NOT NULL,
  `town_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltown`
--

INSERT INTO `tbltown` (`town_id`, `town_desc`) VALUES
(1, 'Bacolod'),
(2, 'Bago City'),
(3, 'Lacarlota City'),
(4, 'Cadiz City'),
(5, 'Victorias City'),
(6, 'Murcia'),
(7, 'Valladolid');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransactiondetails`
--

CREATE TABLE `tbltransactiondetails` (
  `transdetails_id` int(11) NOT NULL,
  `reference_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `town_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltransactiondetails`
--

INSERT INTO `tbltransactiondetails` (`transdetails_id`, `reference_id`, `email`, `address1`, `address2`, `town_id`) VALUES
(1, 'jxpM904P3r4h', '', 'Brgy. Tabao Valladolid', '', 7),
(2, 'M1ymcaIvUqjd', '', 'Brgy. Tabao Valladolid', '', 2),
(3, 'X0eeIr7e0Dkk', '', 'Brgy. Tabao Valladolid', '', 2),
(4, '8M7yO08d159j', '', 'Brgy. Tabao Valladolid', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `password`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Structure for view `suppliersales`
--
DROP TABLE IF EXISTS `suppliersales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`epiz_30685254`@`192.168.0.%` SQL SECURITY DEFINER VIEW `suppliersales`  AS  select `tblmaintransaction`.`tdate` AS `tdate`,`tblsupplier`.`supplier_name` AS `supplier_name`,`tblcustomer`.`customer_name` AS `customer_name`,`tblmaintransaction`.`reference_id` AS `reference`,sum(`tblmaintransaction`.`amount`) AS `amount`,`tblshippingrate`.`shippingrate` AS `shippingrate`,sum(`tblmaintransaction`.`amount`) + `tblshippingrate`.`shippingrate` AS `totalAmt` from (((((`tblmaintransaction` join `tblshippingrate` on(`tblshippingrate`.`shippingrate_id` = `tblmaintransaction`.`shippingrate_id`)) join `tblsupplier` on(`tblsupplier`.`supplier_id` = `tblshippingrate`.`supplier_id`)) join `tblcustomer` on(`tblcustomer`.`customer_id` = `tblmaintransaction`.`customer_id`)) join `tbldeliverytransaction` on(`tbldeliverytransaction`.`reference_id` = `tblmaintransaction`.`reference_id`)) join `tbldeliveryman` on(`tbldeliveryman`.`deliveryman_id` = `tbldeliverytransaction`.`deliveryman_id`)) where `tblmaintransaction`.`status_id` = 2 and `tbldeliverytransaction`.`payed` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbldeliveryman`
--
ALTER TABLE `tbldeliveryman`
  ADD PRIMARY KEY (`deliveryman_id`);

--
-- Indexes for table `tbldeliverytransaction`
--
ALTER TABLE `tbldeliverytransaction`
  ADD PRIMARY KEY (`deliverytransaction_id`);

--
-- Indexes for table `tbldistributor`
--
ALTER TABLE `tbldistributor`
  ADD PRIMARY KEY (`distributor_id`);

--
-- Indexes for table `tblmaintransaction`
--
ALTER TABLE `tblmaintransaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tblproductransact`
--
ALTER TABLE `tblproductransact`
  ADD PRIMARY KEY (`prod_transact_id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblrequestcustomer`
--
ALTER TABLE `tblrequestcustomer`
  ADD PRIMARY KEY (`reqcust_id`);

--
-- Indexes for table `tblreturnstatus`
--
ALTER TABLE `tblreturnstatus`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tblshippingrate`
--
ALTER TABLE `tblshippingrate`
  ADD PRIMARY KEY (`shippingrate_id`);

--
-- Indexes for table `tblshoppingsteps`
--
ALTER TABLE `tblshoppingsteps`
  ADD PRIMARY KEY (`steps_id`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbltown`
--
ALTER TABLE `tbltown`
  ADD PRIMARY KEY (`town_id`);

--
-- Indexes for table `tbltransactiondetails`
--
ALTER TABLE `tbltransactiondetails`
  ADD PRIMARY KEY (`transdetails_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldeliveryman`
--
ALTER TABLE `tbldeliveryman`
  MODIFY `deliveryman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldeliverytransaction`
--
ALTER TABLE `tbldeliverytransaction`
  MODIFY `deliverytransaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldistributor`
--
ALTER TABLE `tbldistributor`
  MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmaintransaction`
--
ALTER TABLE `tblmaintransaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproductransact`
--
ALTER TABLE `tblproductransact`
  MODIFY `prod_transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblrequestcustomer`
--
ALTER TABLE `tblrequestcustomer`
  MODIFY `reqcust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreturnstatus`
--
ALTER TABLE `tblreturnstatus`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblshippingrate`
--
ALTER TABLE `tblshippingrate`
  MODIFY `shippingrate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblshoppingsteps`
--
ALTER TABLE `tblshoppingsteps`
  MODIFY `steps_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltown`
--
ALTER TABLE `tbltown`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltransactiondetails`
--
ALTER TABLE `tbltransactiondetails`
  MODIFY `transdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
