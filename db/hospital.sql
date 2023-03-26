-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctorreport`
--

CREATE TABLE `doctorreport` (
  `date` varchar(200) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `doctor_username` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `symptoms` longtext NOT NULL,
  `tests` longtext NOT NULL,
  `test_results` longtext NOT NULL,
  `medical` longtext NOT NULL,
  `units_dispensed` int(11) NOT NULL,
  `drug_strength` int(11) NOT NULL,
  `drug_units` varchar(20) NOT NULL,
  `item_dose` int(11) NOT NULL,
  `drug_form` varchar(20) NOT NULL,
  `intake_freq` varchar(20) NOT NULL,
  `doctor_type` varchar(20) NOT NULL,
  `doctor_price` int(11) NOT NULL,
  `test_price` int(11) NOT NULL,
  `medical_price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `patient_id`, `status`, `symptoms`, `tests`, `test_results`, `medical`, `units_dispensed`, `drug_strength`, `drug_units`, `item_dose`, `drug_form`, `intake_freq`, `doctor_type`, `doctor_price`, `test_price`, `medical_price`, `date`, `month`, `year`) VALUES
(1, 1, 'laboratory', 'high fever', 'malaria', 'malaria positive', '', 0, 0, '', 0, '', '', '', 20000, 50, 0, 1, 2, 2016),
(2, 1, 'laboratory', '', '', '', '', 0, 0, '', 0, '', '', '', 20000, 123, 1244, 7, 6, 2020),
(3, 2, 'laboratory', '', '', '', '', 0, 0, '', 0, '', '', '', 20000, 0, 0, 20, 6, 2020),
(4, 2, 'laboratory', '', '', '', '', 0, 0, '', 0, '', '', '', 20000, 0, 0, 20, 6, 2020),
(19, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, '', '', 'Dentist', 30000, 0, 0, 23, 10, 2022),
(20, 1001, 'finish', 'cough', 'on', 'VL=65000 copies', 'isoniazid tablets, 300mg and DTG tablets, 50mg', 0, 0, '', 0, '', '', 'OPDDoctor', 20000, 80, 500, 23, 10, 2022),
(32, 1000, 'finish', 'Stomach pain, vomiting, dizziness, headache', 'Malaria', 'positive= malaria++', 'paracetamol tablets 500mg, flagil tables 500mg, coatem 500mg and ORS sachets', 0, 0, '', 0, '', '', 'OPDDoctor', 20000, 75, 630, 27, 10, 2022),
(33, 1000, 'finish', 'NIGHT SWEATS', 'Creatinine', 'CREATININE=79.7', 'isoniazid', 30, 500, '', 0, '', '', 'OPDDoctor', 20000, 342, 56, 28, 10, 2022),
(34, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'ARTDoctor', '20000', '', 0, 0, 0, 5, 11, 2022),
(35, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'OPDDoctor', '20000', '', 0, 0, 0, 5, 11, 2022),
(36, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'ARTDoctor', '20000', '', 0, 0, 0, 5, 11, 2022),
(37, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'OPDDoctor', '20000', '', 0, 0, 0, 8, 11, 2022),
(38, 1001, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'Dentist', '30000', '', 0, 0, 0, 10, 11, 2022),
(39, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'Dentist', '30000', '', 0, 0, 0, 10, 11, 2022),
(40, 1000, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'OPDDoctor', '20000', '', 0, 0, 0, 10, 11, 2022),
(41, 1003, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'OPDDoctor', '20000', '', 0, 0, 0, 11, 11, 2022),
(42, 1003, 'finish', 'fdghvjh', 'HGB', 'negative', 'paracetamol', 10, 500, 'mg', 2, 'tablets', '3/daily', 'OPDDoctor', 0, 55, 30, 11, 11, 2022),
(43, 1004, 'recdoctor', '', '', '', '', 0, 0, '', 0, 'ARTDoctor', '20000', '', 0, 0, 0, 12, 11, 2022),
(44, 1004, 'finish', 'rush, Headache, body pains, fatique, dry Cough', 'Creatinine', 'Creatinine= 78.6 (abnormal)', 'isoniazid', 90, 300, 'mg', 1, 'tablets', 'o/d', 'OPDDoctor', 0, 150, 90, 12, 11, 2022),
(45, 1005, 'recdoctor', '', '', '', '', 0, 0, '', 0, '20000', 'ARTDoctor', '', 0, 0, 0, 12, 11, 2022),
(46, 1005, 'recdoctor', '', '', '', '', 0, 0, '', 0, '30000', 'Dentist', '', 0, 0, 0, 12, 11, 2022),
(47, 1006, 'recdoctor', '', '', '', '', 0, 0, '', 0, '20000', 'ARTDoctor', '', 0, 0, 0, 12, 11, 2022),
(48, 1006, 'recdoctor', '', '', '', '', 0, 0, '', 0, '', '20000', 'OPDDoctor', 0, 0, 0, 12, 11, 2022),
(49, 1004, 'recdoctor', '', '', '', '', 0, 0, '', 0, '', '20000', 'ARTDoctor', 0, 0, 0, 12, 11, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `maritalstatus` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `birthyear` varchar(100) NOT NULL,
  `birthmonth` int(25) NOT NULL,
  `birthdate` int(25) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `parentsname` varchar(100) NOT NULL,
  `temp` varchar(20) NOT NULL,
  `bp` varchar(20) NOT NULL,
  `pulse` int(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `preg_status` varchar(20) NOT NULL,
  `comments` varchar(20) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `sname`, `address`, `phone`, `maritalstatus`, `sex`, `bloodgroup`, `birthyear`, `birthmonth`, `birthdate`, `occupation`, `parentsname`, `temp`, `bp`, `pulse`, `weight`, `height`, `preg_status`, `comments`, `date`) VALUES
(1000, 'Annita', 'Malama', 'Garden', '0654507180', 'single', 'Female', 'A', '1999', 3, 14, 'Trader', 'Sylvia', '', '', 0, '', '', '', '', NULL),
(1001, 'Enock', 'Phiri', 'lusaka', '123456789', '', 'Male', 'A', '1992', 0, 0, '', '', '', '', 0, '', '', '', '', NULL),
(1002, 'Albertina', 'Mwale', 'chalala', '0973413534', 'single', 'Male', 'B', '2004', 4, 23, 'Banker', 'Beatrice', '56', '55', 34, '98', '65', 'pregnant', 'ggn', '2022-11-30'),
(1003, 'Albertina', 'Mwale', 'chalala', '0973413534', 'single', 'Male', 'A', '2004', 4, 23, 'Banker', 'Judith', '45', '34435', 34, '43', '23', 'pregnant', 'emergency', '2022-11-16'),
(1004, 'Mapalo', 'Nakamba', 'Meanwood', '0974563728', 'single', 'Female', 'B', '1999', 6, 13, 'Others', 'Getrude', '36', '200', 76, '58', '154', 'not pregnant', 'standard', '2022-11-12'),
(1005, 'Elizabeth', 'Mwansa', 'L85', '0976453341', 'single', 'Female', 'O', '1998', 8, 16, 'Others', 'Olisa', '38', '230', 77, '60', '145', 'pregnant', 'emergency', '2022-11-12'),
(1006, 'Queen', 'Milambo', 'L85', '0977564453', 'single', 'Female', 'A', '2000', 3, 15, 'Trader', 'Jane', '35', '178', 79, '66', '155', 'not pregnant', 'standard', '2022-11-12'),
(1007, 'Mary', 'Banda', 'Garden House', '0775354468', 'single', 'Female', 'AB', '2002', 5, 27, 'Others', 'Margret', '37', '177', 77, '60', '144', 'not pregnant', 'emergency', '2022-11-12'),
(1008, 'Alice', 'Ngwenya', 'Garden', '0776356211', 'single', 'Female', 'B', '2001', 9, 3, 'Healthcare Provider', 'Martha', '36', '134', 78, '69', '166', 'not pregnant', 'standard', '2022-11-12'),
(1009, 'Leonard', 'Simuyamba', 'Roma Park', '0976453375', 'single', 'Male', 'AB', '1996', 7, 25, 'Teacher', 'Naomi', '35', '166', 83, '66', '170', 'not applicable', 'standard', '2022-11-12'),
(1010, 'John', 'Mbewe', 'Chilenje', '0762399763', 'single', 'Male', 'B', '1996', 10, 19, 'Banker', 'Joy', '35', '140', 88, '67', '169', 'not applicable', 'standard', '2022-11-12'),
(1011, 'Isaac', 'Silomba', 'K South', '0973551239', 'single', 'Male', 'A', '1996', 10, 4, 'Banker', 'Bertha', '35', '145', 87, '59', '145', 'not applicable', 'emergency', '2022-11-12'),
(1012, 'Tina', 'Banda', 'L85', '0766412188', 'married', 'Female', 'AB', '2004', 2, 20, 'Others', 'Olisa', '37', '133', 77, '58', '150', 'not pregnant', 'standard', '2022-11-12'),
(1013, 'Patrick', 'Koman', 'Chilenje', '0976701133', 'married', 'Male', 'A', '1992', 11, 12, 'Healthcare Provider', 'Albertina', '36', '162', 86, '70', '163', 'not applicable', 'standard', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `drug_strength` varchar(20) NOT NULL,
  `measurement` varchar(11) NOT NULL,
  `dose_item` int(11) NOT NULL,
  `drug_form` varchar(20) NOT NULL,
  `intake_freq` varchar(20) NOT NULL,
  `drug_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `drug_name`, `drug_strength`, `measurement`, `dose_item`, `drug_form`, `intake_freq`, `drug_price`) VALUES
(1, 'paracetamol', '500', 'mg', 2, '', '3/d', 10),
(2, 'isoniazid', '300', 'mg', 1, 'tabs', 'o/d', 0),
(3, 'isoniazid+pyrazinamid+rifampicin', '150+500+150', '1', 1, 'tabs', 'o/d', 0),
(4, 'ethambutol+isoniazid', '400+150', 'mg', 1, 'tabs', 'o/d', 0),
(5, 'sulfamethoxazole+trimethoprim', '400+80', 'mg', 2, 'tabs', 'o/d', 0),
(6, 'lopinavir+rotinavir', '100+25', 'mg', 1, 'tablets', 'o/d', 0),
(7, 'kaletra', '80+20', 'mil', 1, 'solution', 'o/d', 0),
(8, 'TDF+3TC+LPV+R', '1100', 'mg', 1, 'tablets', 'o/d', 0),
(9, 'AZT+3TC+LPV+R', '60+30+40+10', 'mg', 1, 'sachets', 'o/d', 0),
(10, 'ABC+3TC+DTG', '300+150+50', 'mg', 1, 'tablets', 'o/d', 0),
(11, 'TDF+3TC+DTG', '300+300+50', 'mg', 1, 'tablets', 'o/d', 0),
(12, 'DTG', '50', 'mg', 1, 'tablets', 'o/d', 0),
(13, 'pyridoxin', '400', 'mg', 1, 'tablets', 'o/d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `queue_no` int(11) NOT NULL,
  `queue_name` varchar(100) NOT NULL,
  `patientsinqueue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`queue_no`, `queue_name`, `patientsinqueue`) VALUES
(1, 'HTS/VCT', 0),
(2, 'Pharmacy', 0),
(3, 'OPD', 0),
(4, 'IPD', 0),
(5, 'MCH', 0),
(6, 'LABORATORY', 0),
(7, 'MATERNITY', 0),
(8, 'DENTAL', 0),
(9, 'RADIOLOGY', 0),
(10, 'PHYSIOTHERAPY', 0),
(11, 'DSD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `sname` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobilephone` int(20) NOT NULL,
  `NRC` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `NUPIN` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `sname`, `type`, `email`, `mobilephone`, `NRC`, `DOB`, `department`, `NUPIN`, `date`) VALUES
('Accounts', '1234', 'Sandra', 'Moyo', 'Acounts', '', 0, '0', '0000-00-00', '', 100, '0000-00-00'),
('Admin', '1234', 'David', 'Mwelwa', 'Admin', 'davidmwelwa@gmail.com', 972862797, '34432521', '1996-08-05', 'ICT', 100, '0000-00-00'),
('AMwale', '2468', 'Albertina', 'Mwale', 'OPDNurse', 'albertinamwale@gmail.com', 973413534, '34432521', '0000-00-00', 'OPD', 0, '2022-11-08'),
('ARTDoctor', '1234', 'Lydia', 'Soko', 'ARTDoctor', 'lydiasoko@gmail.com', 976554545, '776541521', '1996-08-05', 'ART', 100, '0000-00-00'),
('BNgalande', '2468', 'blessing', 'Ngalande', 'Admin', 'blessingngalande@gamil.com', 98787655, '675344521', '2022-11-09', 'ICT', 0, '2022-11-09'),
('DMwelwa', '1234', 'David', 'Mwelwa', 'Admin', 'davidgarciajr955@gmail.com', 972862797, '622741521', '0000-00-00', 'ICT', 0, '2022-11-08'),
('EPhiri', '1234', 'Enock', 'Phiri', 'Laboratory', 'enockphiri@gmail.com', 979645463, '354635112', '2022-11-11', 'OPD', 122, '2022-11-11'),
('Gphiri', '1234', 'Gloria', 'Phiri', 'Registry', 'gloriaphiri@gmail.com', 776965077, '546635101', '2022-11-08', 'OPD', 0, '2022-11-08'),
('jay', '1234', 'Albertina', 'Mwale', 'Admin', 'albertinamwale@gmail.com', 973413534, '34432521', '2022-11-11', 'OPD', 200, '2022-11-11'),
('Mmanzi', '6666', 'Maurice', 'Manzi', 'Admin', 'mauricemanzi@yahoo.com', 979875786, '65774531', '2022-11-09', 'ICT', 103, '2022-11-09'),
('MSalifyanji', '1234', 'Mapalo', 'Salifyani', 'Admin', 'mapalosalifyanji@gmail.com', 98787654, '35645425', '2022-11-09', 'ICT', 230, '2022-11-09'),
('OPDDoctor', '1234', 'John', 'Kamwengo', 'OPDDoctor', 'Johnkamwengo@gmail.com', 972674562, '645338181', '0000-00-00', 'ICT', 100, '0000-00-00'),
('Pharmacy', '1234', 'Patrick', 'Zimba', 'Pharmacy', 'patrickzimba@gmail.com', 976538273, '536442101', '1999-03-16', 'pharmacy', 100, '0000-00-00'),
('Radiography', '1234', 'Charity', 'Phiri', 'Radiography', 'charityphiri@gmail.com', 977563349, '654388101', '2014-11-12', 'Radiography', 0, '0000-00-00'),
('Registry', '1234', 'Rebecca', 'Phiri', 'Registry', 'rebeccaphiri@gmail.com', 772359799, '0', '0000-00-00', '', 100, '0000-00-00'),
('RMwemba', '1234', 'Racheal', 'Mweemba', 'Admin', 'rachealmweemba420@gmail.com', 987643533, '566472351', '0000-00-00', 'ICT', 0, '2022-11-08'),
('RSamboko', '12345', 'Robson', 'Samboko', 'Dentist', 'robsonsamboko', 978564453, '4456327521', '2022-11-12', 'Dental', 134, '2022-11-12'),
('ZKimote', '1234', 'Zoko', 'Kimote', 'Admin', 'zokokimoto@gmail.com', 998765455, '564453876', '2022-11-09', 'ICT', 200, '2022-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`queue_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
