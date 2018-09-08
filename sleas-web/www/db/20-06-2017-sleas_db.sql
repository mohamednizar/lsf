-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2017 at 05:37 PM
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
  `work_place_id` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `address_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `address_1` varchar(50) COLLATE utf8_bin NOT NULL,
  `address_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ID` int(5) NOT NULL
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
-- Table structure for table `Divisional_Offices`
--

CREATE TABLE `Divisional_Offices` (
  `ID` int(5) NOT NULL,
  `div_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `work_place_id` int(5) NOT NULL,
  `division_office` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Division_List`
--

CREATE TABLE `Division_List` (
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
  `work_place_id` int(5) NOT NULL,
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
  `grade` varchar(15) COLLATE utf8_bin NOT NULL,
  `NIC` varchar(15) COLLATE utf8_bin NOT NULL,
  `date_join` date NOT NULL,
  `way_join` varchar(15) COLLATE utf8_bin NOT NULL,
  `cadre` varchar(15) COLLATE utf8_bin NOT NULL,
  `subject` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `work_place_id` int(5) NOT NULL,
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
  `province` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Province_List`
--

INSERT INTO `Province_List` (`province_id`, `province`) VALUES
('P01', 'Western'),
('P02', 'Central'),
('P03', 'Southern'),
('P04', 'Northern'),
('P05', 'Eastern'),
('P06', 'North Western'),
('P07', 'North Central'),
('P08', 'Uva'),
('P09', 'Sabaragamuwa');

-- --------------------------------------------------------

--
-- Table structure for table `Province_Offices`
--

CREATE TABLE `Province_Offices` (
  `ID` int(5) NOT NULL,
  `province_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `work_place_id` int(5) NOT NULL,
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
-- Table structure for table `Secondment`
--

CREATE TABLE `Secondment` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `work_place_id` int(5) NOT NULL,
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
  `mode` int(5) NOT NULL,
  `service_status` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Service_Mode`
--

CREATE TABLE `Service_Mode` (
  `ID` int(5) NOT NULL,
  `mode` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Sleas_Subject`
--

CREATE TABLE `Sleas_Subject` (
  `ID` int(5) NOT NULL,
  `sub_name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Sleas_Subject`
--

INSERT INTO `Sleas_Subject` (`ID`, `sub_name`) VALUES
(1, 'Sinhala'),
(2, 'Tamil'),
(3, 'English and Other Languages'),
(4, 'Mathematics'),
(5, 'Science'),
(6, 'Commerce'),
(7, 'Information Technology'),
(8, 'Physical Education'),
(9, 'Buddhism'),
(10, 'Christianity'),
(11, 'Hindu'),
(12, 'Islam'),
(13, 'Student Counseling and Guidance'),
(14, 'Aesthetics'),
(15, 'Technology'),
(16, 'Special Education '),
(17, 'Planning'),
(18, 'Primary Education '),
(19, 'History ');

-- --------------------------------------------------------

--
-- Table structure for table `Transfer`
--

CREATE TABLE `Transfer` (
  `ID` int(5) NOT NULL,
  `appointment_ID` int(5) NOT NULL,
  `work_place_id` int(5) NOT NULL,
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
-- Table structure for table `Work_Place`
--

CREATE TABLE `Work_Place` (
  `ID` int(5) NOT NULL,
  `work_place` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Work_Place`
--

INSERT INTO `Work_Place` (`ID`, `work_place`) VALUES
(1, 'Ministry of Education'),
(2, 'Department of Examinations'),
(3, 'Department of Education Publication'),
(4, 'National Institute of Education'),
(5, 'Provincial Department of Education'),
(6, 'Provincial Ministry of Education'),
(7, 'Zonal Education Office'),
(8, 'Divisional Education Office'),
(9, 'National College of Education'),
(10, 'Teacher Training College'),
(11, 'Teacher Centers'),
(12, 'Provincial ICT Education Centre (PICTEC)'),
(13, 'Zonal ICT Education Centre (ZICTEC/CRC)'),
(14, 'Education Resource Centre');

-- --------------------------------------------------------

--
-- Table structure for table `Zonal_Offices`
--

CREATE TABLE `Zonal_Offices` (
  `ID` int(5) NOT NULL,
  `zone_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `work_place_id` int(5) NOT NULL,
  `provine_office` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  ADD KEY `Acting_fk0` (`appointment_ID`),
  ADD KEY `Acting_fk1` (`work_place_id`);

--
-- Indexes for table `Acting_Permanent`
--
ALTER TABLE `Acting_Permanent`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Acting_Permanent_fk0` (`acting_ID`),
  ADD KEY `Acting_Permanent_fk1` (`work_place_id`);

--
-- Indexes for table `Attachment`
--
ALTER TABLE `Attachment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Attachment_fk0` (`appointment_ID`),
  ADD KEY `Attachment_fk1` (`work_place_id`);

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
-- Indexes for table `Divisional_Offices`
--
ALTER TABLE `Divisional_Offices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Divisional_Offices_fk0` (`div_id`),
  ADD KEY `Divisional_Offices_fk1` (`work_place_id`);

--
-- Indexes for table `Division_List`
--
ALTER TABLE `Division_List`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `div_id` (`div_id`),
  ADD KEY `Division_List_fk0` (`zone_id`);

--
-- Indexes for table `First_Appointment`
--
ALTER TABLE `First_Appointment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `First_Appointment_fk0` (`appointment_ID`),
  ADD KEY `First_Appointment_fk1` (`work_place_id`);

--
-- Indexes for table `General_Service`
--
ALTER TABLE `General_Service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `General_Service_fk0` (`NIC`),
  ADD KEY `General_Service_fk1` (`subject`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Main_Offices_fk0` (`work_place_id`);

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
  ADD KEY `Performing_fk0` (`appointment_ID`),
  ADD KEY `Performing_fk1` (`work_place_id`);

--
-- Indexes for table `Performing_Permanent`
--
ALTER TABLE `Performing_Permanent`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Performing_Permanent_fk0` (`perform_ID`),
  ADD KEY `Performing_Permanent_fk1` (`work_place_id`);

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
  ADD KEY `Promotion_fk0` (`appointment_ID`),
  ADD KEY `Promotion_fk1` (`work_place_id`);

--
-- Indexes for table `Province_List`
--
ALTER TABLE `Province_List`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `Province_Offices`
--
ALTER TABLE `Province_Offices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Province_Offices_fk0` (`work_place_id`);

--
-- Indexes for table `Releasement`
--
ALTER TABLE `Releasement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Releasement_fk0` (`appointment_ID`);

--
-- Indexes for table `Secondment`
--
ALTER TABLE `Secondment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Secondment_fk0` (`appointment_ID`),
  ADD KEY `Secondment_fk1` (`work_place_id`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Service_fk0` (`NIC`),
  ADD KEY `Service_fk1` (`mode`);

--
-- Indexes for table `Service_Mode`
--
ALTER TABLE `Service_Mode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Sleas_Subject`
--
ALTER TABLE `Sleas_Subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Transfer`
--
ALTER TABLE `Transfer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Transfer_fk0` (`appointment_ID`),
  ADD KEY `Transfer_fk1` (`work_place_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Work_Place`
--
ALTER TABLE `Work_Place`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Zonal_Offices`
--
ALTER TABLE `Zonal_Offices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Zonal_Offices_fk0` (`zone_id`),
  ADD KEY `Zonal_Offices_fk1` (`work_place_id`);

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
-- AUTO_INCREMENT for table `Divisional_Offices`
--
ALTER TABLE `Divisional_Offices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Division_List`
--
ALTER TABLE `Division_List`
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
-- AUTO_INCREMENT for table `Province_Offices`
--
ALTER TABLE `Province_Offices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Releasement`
--
ALTER TABLE `Releasement`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Secondment`
--
ALTER TABLE `Secondment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Service_Mode`
--
ALTER TABLE `Service_Mode`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Sleas_Subject`
--
ALTER TABLE `Sleas_Subject`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
-- AUTO_INCREMENT for table `Work_Place`
--
ALTER TABLE `Work_Place`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Zonal_Offices`
--
ALTER TABLE `Zonal_Offices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `Acting_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Acting_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Acting_Permanent`
--
ALTER TABLE `Acting_Permanent`
  ADD CONSTRAINT `Acting_Permanent_fk0` FOREIGN KEY (`acting_ID`) REFERENCES `Acting` (`ID`),
  ADD CONSTRAINT `Acting_Permanent_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Attachment`
--
ALTER TABLE `Attachment`
  ADD CONSTRAINT `Attachment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Attachment_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

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
-- Constraints for table `Divisional_Offices`
--
ALTER TABLE `Divisional_Offices`
  ADD CONSTRAINT `Divisional_Offices_fk0` FOREIGN KEY (`div_id`) REFERENCES `Division_List` (`div_id`),
  ADD CONSTRAINT `Divisional_Offices_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Division_List`
--
ALTER TABLE `Division_List`
  ADD CONSTRAINT `Division_List_fk0` FOREIGN KEY (`zone_id`) REFERENCES `Zone_List` (`zone_id`);

--
-- Constraints for table `First_Appointment`
--
ALTER TABLE `First_Appointment`
  ADD CONSTRAINT `First_Appointment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `First_Appointment_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `General_Service`
--
ALTER TABLE `General_Service`
  ADD CONSTRAINT `General_Service_fk0` FOREIGN KEY (`NIC`) REFERENCES `Personal_Details` (`NIC`),
  ADD CONSTRAINT `General_Service_fk1` FOREIGN KEY (`subject`) REFERENCES `Sleas_Subject` (`ID`);

--
-- Constraints for table `Institute`
--
ALTER TABLE `Institute`
  ADD CONSTRAINT `Institute_fk0` FOREIGN KEY (`div_id`) REFERENCES `Division_List` (`div_id`);

--
-- Constraints for table `Main_Offices`
--
ALTER TABLE `Main_Offices`
  ADD CONSTRAINT `Main_Offices_fk0` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Performing`
--
ALTER TABLE `Performing`
  ADD CONSTRAINT `Performing_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Performing_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Performing_Permanent`
--
ALTER TABLE `Performing_Permanent`
  ADD CONSTRAINT `Performing_Permanent_fk0` FOREIGN KEY (`perform_ID`) REFERENCES `Performing` (`ID`),
  ADD CONSTRAINT `Performing_Permanent_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Promotion`
--
ALTER TABLE `Promotion`
  ADD CONSTRAINT `Promotion_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Promotion_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Province_Offices`
--
ALTER TABLE `Province_Offices`
  ADD CONSTRAINT `Province_Offices_fk0` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Releasement`
--
ALTER TABLE `Releasement`
  ADD CONSTRAINT `Releasement_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`);

--
-- Constraints for table `Secondment`
--
ALTER TABLE `Secondment`
  ADD CONSTRAINT `Secondment_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Secondment_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_fk0` FOREIGN KEY (`NIC`) REFERENCES `Personal_Details` (`NIC`),
  ADD CONSTRAINT `Service_fk1` FOREIGN KEY (`mode`) REFERENCES `Service_Mode` (`ID`);

--
-- Constraints for table `Transfer`
--
ALTER TABLE `Transfer`
  ADD CONSTRAINT `Transfer_fk0` FOREIGN KEY (`appointment_ID`) REFERENCES `Service` (`ID`),
  ADD CONSTRAINT `Transfer_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Zonal_Offices`
--
ALTER TABLE `Zonal_Offices`
  ADD CONSTRAINT `Zonal_Offices_fk0` FOREIGN KEY (`zone_id`) REFERENCES `Zone_List` (`zone_id`),
  ADD CONSTRAINT `Zonal_Offices_fk1` FOREIGN KEY (`work_place_id`) REFERENCES `Work_Place` (`ID`);

--
-- Constraints for table `Zone_List`
--
ALTER TABLE `Zone_List`
  ADD CONSTRAINT `Zone_List_fk0` FOREIGN KEY (`dist_id`) REFERENCES `District_List` (`dist_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
