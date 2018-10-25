-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 09:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMedByName` (IN `Name` VARCHAR(50))  BEGIN
 SELECT * 
 FROM stock
 WHERE Med_Name = Name;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Cust_ID` int(11) NOT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Phone_no` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Cust_ID`, `Gender`, `Address`, `Age`, `Name`, `Phone_no`) VALUES
(49, 'Others', 'kandivali', 52, 'sidddd', 4565123278),
(156, 'Male', 'Ghatkopar', 21, 'Varun', 9845327812),
(210, 'Female', 'Gopalmath', 30, 'Kuku', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(6) NOT NULL,
  `DOB` date NOT NULL,
  `Role` varchar(10) NOT NULL DEFAULT 'worker',
  `Age` int(11) DEFAULT NULL,
  `User_name` varchar(50) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `DOB`, `Role`, `Age`, `User_name`, `Salary`) VALUES
(5, '1997-08-18', 'Worker', 21, 'BS', '10000.00'),
(8, '1998-06-07', 'Admin', 20, 'mohit_15', '10101.00'),
(15, '2000-09-07', 'Admin', 18, 'mohit_30', '5000.00'),
(100, '1999-05-15', 'Worker', 24, 'sid_25', '15000.00');

-- --------------------------------------------------------

--
-- Table structure for table `employees_audit`
--

CREATE TABLE `employees_audit` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `changedat` datetime DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_audit`
--

INSERT INTO `employees_audit` (`id`, `Username`, `name`, `changedat`, `action`) VALUES
(1, 'BS', 'bhavuk', '2018-10-22 10:55:58', 'update'),
(2, 'sid_25', 'Siddhant', '2018-10-22 11:23:36', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `med_details`
--

CREATE TABLE `med_details` (
  `Med_ID` varchar(15) NOT NULL,
  `Batch_no` varchar(10) NOT NULL,
  `Mfg_Date` date DEFAULT NULL,
  `Entry_Date` date DEFAULT NULL,
  `Buying_Price` int(11) DEFAULT NULL,
  `Manufacturer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_details`
--

INSERT INTO `med_details` (`Med_ID`, `Batch_no`, `Mfg_Date`, `Entry_Date`, `Buying_Price`, `Manufacturer`) VALUES
('3', '12', '2017-08-29', '2017-06-29', 10, 'company'),
('2', '123', '2016-07-25', '2016-05-25', 20, 'gsk'),
('5', '145', '2017-09-04', '2018-10-06', 15, 'expired company'),
('4', '165', '2017-12-06', '2018-10-04', 15, 'Not a comp'),
('48', '457', '2015-05-08', '2018-05-15', 48, 'FDC');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ID` int(11) NOT NULL,
  `Equity` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Med_Name` varchar(50) DEFAULT NULL,
  `Med_ID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Exp_Date` date DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL,
  `Selling_Price` int(11) DEFAULT NULL,
  `Batch_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Med_Name`, `Med_ID`, `Quantity`, `Exp_Date`, `Category`, `Selling_Price`, `Batch_no`) VALUES
('soframycin', 2, 5, '2019-11-01', 'cream', 27, '123'),
('citizen', 3, 10, '2019-10-29', 'tablet', 40, '12'),
('expired med', 5, 15, '2018-09-03', 'syrup', 18, '145'),
('Not a med', 4, 0, '2019-11-06', 'capsule', 20, '165');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone_no` bigint(20) DEFAULT NULL,
  `Company_Name` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Address`, `Phone_no`, `Company_Name`, `Email`) VALUES
(1, 'neril', 9878456513, 'new', 'newcom@com.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone_no` bigint(20) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_name`, `password`, `Address`, `Phone_no`, `Name`, `Usertype`) VALUES
('BS', '$2y$10$XsnLoKA07mNjy7spz2pWbeY70r4jZFBuAG6Sb/D6SO3PWwfgL8q7e', 'Vashi', 7898546512, 'bhavuk', 'Employee'),
('mohit_15', '$2y$10$P6gxhwb.XaUd8Sj3cMkCSuHpI0d.lfRtxlmI66scckBVLCi1GtoTa', 'kandivali', 9878456556, 'mohit', 'Admin'),
('mohit_30', '$2y$10$ViMNDmXY8bxQ6G91.lQDTefQazz/YDTmhW.MUiIWTps3Dmiv0t8I6', 'kandivali', 4565879814, 'mohit', 'Admin'),
('sid_25', '$2y$10$RNzm5RRB/k88EW0y0rJJOeYwJ9MUiY4U3f3.tNAB6lF1IdjwIkiiK', 'borivali', 7896541336, 'Siddhant', 'Employee');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_employee_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    INSERT INTO employees_audit
    SET action = 'update',
     Username = OLD.User_name,
       name = OLD.Name,
        changedat = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_medicines`
-- (See below for the actual view)
--
CREATE TABLE `v_medicines` (
`Med_ID` int(11)
,`Batch_no` varchar(10)
,`Med_Name` varchar(50)
,`Quantity` int(11)
,`Exp_Date` date
,`Category` varchar(10)
,`Selling_Price` int(11)
,`Mfg_Date` date
,`Entry_Date` date
,`Buying_Price` int(11)
,`Manufacturer` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_medicines`
--
DROP TABLE IF EXISTS `v_medicines`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_medicines`  AS  select `stock`.`Med_ID` AS `Med_ID`,`stock`.`Batch_no` AS `Batch_no`,`stock`.`Med_Name` AS `Med_Name`,`stock`.`Quantity` AS `Quantity`,`stock`.`Exp_Date` AS `Exp_Date`,`stock`.`Category` AS `Category`,`stock`.`Selling_Price` AS `Selling_Price`,`med_details`.`Mfg_Date` AS `Mfg_Date`,`med_details`.`Entry_Date` AS `Entry_Date`,`med_details`.`Buying_Price` AS `Buying_Price`,`med_details`.`Manufacturer` AS `Manufacturer` from (`stock` join `med_details` on(((`stock`.`Med_ID` = `med_details`.`Med_ID`) and (`stock`.`Batch_no` = `med_details`.`Batch_no`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `empfk` (`User_name`);

--
-- Indexes for table `employees_audit`
--
ALTER TABLE `employees_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_details`
--
ALTER TABLE `med_details`
  ADD PRIMARY KEY (`Batch_no`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees_audit`
--
ALTER TABLE `employees_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `empfk` FOREIGN KEY (`User_name`) REFERENCES `users` (`User_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
