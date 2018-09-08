-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2017 at 01:06 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sleas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acting`
--

CREATE TABLE `Acting` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `duty_date_terminate` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `salary_drawn` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Acting_Permanent`
--

CREATE TABLE `Acting_Permanent` (
  `ID` int(5) NOT NULL,
  `acting_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Attachment`
--

CREATE TABLE `Attachment` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `salary_drawn` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Contact_Details`
--

CREATE TABLE `Contact_Details` (
  `ID` int(5) NOT NULL,
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `address_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `address_1` varchar(50) COLLATE utf8_bin NOT NULL,
  `address_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `District_List`
--

CREATE TABLE `District_List` (
  `dist_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `province_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `district` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Division_ID`
--

CREATE TABLE `Division_ID` (
  `ID` int(5) NOT NULL,
  `zone_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `div_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `division_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `First_Appointment`
--

CREATE TABLE `First_Appointment` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `grade` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `General_Service`
--

CREATE TABLE `General_Service` (
  `ID` int(5) NOT NULL,
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `date_join` date NOT NULL,
  `way_join` varchar(15) COLLATE utf8_bin NOT NULL,
  `cadre` varchar(15) COLLATE utf8_bin NOT NULL,
  `grade` varchar(15) COLLATE utf8_bin NOT NULL,
  `medium` varchar(15) COLLATE utf8_bin NOT NULL,
  `confirm` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Institute`
--

CREATE TABLE `Institute` (
  `ID` int(5) NOT NULL,
  `div_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `institute_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `institute_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `institute_name` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Main_Offices`
--

CREATE TABLE `Main_Offices` (
  `ID` int(5) NOT NULL,
  `office_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `office_division` varchar(100) COLLATE utf8_bin NOT NULL,
  `office_branch` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Offices`
--

CREATE TABLE `Offices` (
  `ID` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `division` varchar(50) COLLATE utf8_bin NOT NULL,
  `branch` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Performing`
--

CREATE TABLE `Performing` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `duty_date_terminate` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `salary_drawn` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Performing_Permanent`
--

CREATE TABLE `Performing_Permanent` (
  `ID` int(5) NOT NULL,
  `perform_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Details`
--

CREATE TABLE `Personal_Details` (
  `ID` int(10) NOT NULL,
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `title` varchar(10) COLLATE utf8_bin NOT NULL,
  `f_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `m_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `l_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dob` date NOT NULL,
  `ethinicity` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `civil_status` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `f_appoint_date` date NOT NULL,
  `f_appoint_type` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Promotion`
--

CREATE TABLE `Promotion` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `grade` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Province_List`
--

CREATE TABLE `Province_List` (
  `province_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `province` varchar(20) COLLATE utf8_bin NOT NULL,
  `provine_office` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Releasement`
--

CREATE TABLE `Releasement` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `rel_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `rel_place` varchar(50) COLLATE utf8_bin NOT NULL,
  `rel_start_date` date DEFAULT NULL,
  `rel_end_date` date DEFAULT NULL,
  `rel_designation` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rel_date` date DEFAULT NULL,
  `salary_drawn` varchar(50) COLLATE utf8_bin NOT NULL,
  `rel_institute` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `secondment`
--

CREATE TABLE `secondment` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `salary_drawn` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `ID` int(5) NOT NULL,
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `mode` varchar(20) COLLATE utf8_bin NOT NULL,
  `service_status` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Transfer`
--

CREATE TABLE `Transfer` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `sub_location_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `duty_date` date NOT NULL,
  `off_letter_no` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(20) COLLATE utf8_bin NOT NULL,
  `level` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `passwd`, `level`) VALUES
(1, 'admin', 'admin', 'clark'),
(2, 'kosala', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Zone_List`
--

CREATE TABLE `Zone_List` (
  `ID` int(5) NOT NULL,
  `dist_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `zone_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `zone` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acting`
--
ALTER TABLE `Acting`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Acting_fk0` (`appointment_ID`);

--
-- Indexes for table `Acting_Permanent`
--
ALTER TABLE `Acting_Permanent`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Acting_Permanent_fk0` (`acting_ID`);

--
-- Indexes for table `Attachment`
--
ALTER TABLE `Attachment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Attachment_fk0` (`appointment_ID`);

--
-- Indexes for table `Contact_Details`
--
ALTER TABLE `Contact_Details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Contact_Details_fk0` (`NIC`);

--
-- Indexes for table `District_List`
--
ALTER TABLE `District_List`
  ADD PRIMARY KEY (`dist_id`),
  ADD KEY `District_List_fk0` (`province_id`);

--
-- Indexes for table `Division_ID`
--
ALTER TABLE `Division_ID`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `div_id` (`div_id`),
  ADD KEY `Division_ID_fk0` (`zone_id`);

--
-- Indexes for table `First_Appointment`
--
ALTER TABLE `First_Appointment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `First_Appointment_fk0` (`appointment_ID`);

--
-- Indexes for table `General_Service`
--
ALTER TABLE `General_Service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `General_Service_fk0` (`NIC`);

--
-- Indexes for table `Institute`
--
ALTER TABLE `Institute`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `institute_id` (`institute_id`),
  ADD KEY `Institute_fk0` (`div_id`);

--
-- Indexes for table `Main_Offices`
--
ALTER TABLE `Main_Offices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Offices`
--
ALTER TABLE `Offices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Performing`
--
ALTER TABLE `Performing`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Performing_fk0` (`appointment_ID`);

--
-- Indexes for table `Performing_Permanent`
--
ALTER TABLE `Performing_Permanent`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Performing_Permanent_fk0` (`perform_ID`);

--
-- Indexes for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NIC` (`NIC`);

--
-- Indexes for table `Promotion`
--
ALTER TABLE `Promotion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Promotion_fk0` (`appointment_ID`);

--
-- Indexes for table `Province_List`
--
ALTER TABLE `Province_List`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `Releasement`
--
ALTER TABLE `Releasement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Releasement_fk0` (`appointment_ID`);

--
-- Indexes for table `secondment`
--
ALTER TABLE `secondment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `secondment_fk0` (`appointment_ID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Service_fk0` (`NIC`);

--
-- Indexes for table `Transfer`
--
ALTER TABLE `Transfer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Transfer_fk0` (`appointment_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Zone_List`
--
ALTER TABLE `Zone_List`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `zone_id` (`zone_id`),
  ADD KEY `Zone_List_fk0` (`dist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acting`
--
ALTER TABLE `Acting`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Acting_Permanent`
--
ALTER TABLE `Acting_Permanent`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Attachment`
--
ALTER TABLE `Attachment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Contact_Details`
--
ALTER TABLE `Contact_Details`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Division_ID`
--
ALTER TABLE `Division_ID`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `First_Appointment`
--
ALTER TABLE `First_Appointment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `General_Service`
--
ALTER TABLE `General_Service`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Institute`
--
ALTER TABLE `Institute`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Main_Offices`
--
ALTER TABLE `Main_Offices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Offices`
--
ALTER TABLE `Offices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Performing`
--
ALTER TABLE `Performing`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Performing_Permanent`
--
ALTER TABLE `Performing_Permanent`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Promotion`
--
ALTER TABLE `Promotion`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Releasement`
--
ALTER TABLE `Releasement`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `secondment`
--
ALTER TABLE `secondment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Transfer`
--
ALTER TABLE `Transfer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Zone_List`
--
ALTER TABLE `Zone_List`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Acting`
--
ALTER TABLE `Acting`
  ADD CONSTRAINT `Acting_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Acting_Permanent`
--
ALTER TABLE `Acting_Permanent`
  ADD CONSTRAINT `Acting_Permanent_fk0` FOREIGN KEY (`acting_ID`) REFERENCES `Acting` (`ID`);

--
-- Constraints for table `Attachment`
--
ALTER TABLE `Attachment`
  ADD CONSTRAINT `Attachment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Contact_Details`
--
ALTER TABLE `Contact_Details`
  ADD CONSTRAINT `Contact_Details_fk0` FOREIGN KEY (`NIC`) REFERENCES `Personal_Details` (`NIC`);

--
-- Constraints for table `District_List`
--
ALTER TABLE `District_List`
  ADD CONSTRAINT `District_List_fk0` FOREIGN KEY (`province_id`) REFERENCES `Province_List` (`province_id`);

--
-- Constraints for table `Division_ID`
--
ALTER TABLE `Division_ID`
  ADD CONSTRAINT `Division_ID_fk0` FOREIGN KEY (`zone_id`) REFERENCES `Zone_List` (`zone_id`);

--
-- Constraints for table `First_Appointment`
--
ALTER TABLE `First_Appointment`
  ADD CONSTRAINT `First_Appointment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `General_Service`
--
ALTER TABLE `General_Service`
  ADD CONSTRAINT `General_Service_fk0` FOREIGN KEY (`NIC`) REFERENCES `Personal_Details` (`NIC`);

--
-- Constraints for table `Institute`
--
ALTER TABLE `Institute`
  ADD CONSTRAINT `Institute_fk0` FOREIGN KEY (`div_id`) REFERENCES `Division_ID` (`div_id`);

--
-- Constraints for table `Performing`
--
ALTER TABLE `Performing`
  ADD CONSTRAINT `Performing_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Performing_Permanent`
--
ALTER TABLE `Performing_Permanent`
  ADD CONSTRAINT `Performing_Permanent_fk0` FOREIGN KEY (`perform_ID`) REFERENCES `Performing` (`ID`);

--
-- Constraints for table `Promotion`
--
ALTER TABLE `Promotion`
  ADD CONSTRAINT `Promotion_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Releasement`
--
ALTER TABLE `Releasement`
  ADD CONSTRAINT `Releasement_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `secondment`
--
ALTER TABLE `secondment`
  ADD CONSTRAINT `secondment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_fk0` FOREIGN KEY (`NIC`) REFERENCES `Personal_Details` (`NIC`);

--
-- Constraints for table `Transfer`
--
ALTER TABLE `Transfer`
  ADD CONSTRAINT `Transfer_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Zone_List`
--
ALTER TABLE `Zone_List`
  ADD CONSTRAINT `Zone_List_fk0` FOREIGN KEY (`dist_id`) REFERENCES `District_List` (`dist_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
