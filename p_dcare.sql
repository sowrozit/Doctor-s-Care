-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2016 at 06:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_dcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `amb_id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `agency` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`amb_id`, `area`, `agency`, `phone_number`) VALUES
(1, 'Dhaka', 'Dhaka Medical College Hospital', '500121-5'),
(2, 'Dhaka', 'ICDDRB', '+88 02 8811751-60');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(200) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `chamber_id` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `verification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `doctor_id`, `chamber_id`, `date`, `time`, `number`, `verification`) VALUES
(7, 7, 1, '14 May, 2016', '2 - 5', '01521498060', 'Verified'),
(8, 7, 1, '14 May, 2016', '2 - 5', '98348579348263', 'Verified'),
(9, 9, 7, '16 May, 2016', '5 - 6', '456789', 'Verified'),
(10, 9, 7, '14 May, 2016', '5 - 6', '02020202002', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(10) NOT NULL,
  `area_name` varchar(200) NOT NULL,
  `city_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `city_id`) VALUES
(1, 'Dhanmondi', 1),
(2, 'Badda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `available_blood`
--

CREATE TABLE `available_blood` (
  `available_blood_id` int(11) NOT NULL,
  `blood_bank_id` int(4) NOT NULL,
  `blood_group_id` int(4) NOT NULL,
  `area` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_blood`
--

INSERT INTO `available_blood` (`available_blood_id`, `blood_bank_id`, `blood_group_id`, `area`) VALUES
(1, 1, 3, 'Comilla');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `blood_bank_id` int(11) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `agency` varchar(500) NOT NULL,
  `blood_group_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`blood_bank_id`, `contact_no`, `agency`, `blood_group_id`) VALUES
(1, '01670071247', 'Pratik Saha', 3),
(3, '0152149860', 'Pratik Saha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `blood_group_id` int(2) NOT NULL,
  `blood_group` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`blood_group_id`, `blood_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `chamber`
--

CREATE TABLE `chamber` (
  `chamber_id` int(10) NOT NULL,
  `chamber_name` varchar(10000) NOT NULL,
  `area_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chamber`
--

INSERT INTO `chamber` (`chamber_id`, `chamber_name`, `area_id`) VALUES
(1, 'Prescription Point', 1),
(2, 'badda general hospital', 2),
(3, 'square hospital ltd', 1),
(4, 'square hospital ltd', 1),
(5, 'dogma hospital', 2),
(6, 'City Hospital', 1),
(7, 'labaid hospital', 2),
(8, 'Badda Medical Hospital', 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(3) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Dhaka'),
(2, 'Comilla'),
(3, 'Chittagong'),
(4, 'Sylhet'),
(5, 'Rajshahi'),
(6, 'Khulna'),
(7, 'Bogra'),
(8, 'Kustia'),
(9, 'Narayanganj');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(1) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `speciality` varchar(1000) NOT NULL,
  `professional_details` varchar(10000) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `bdmc_reg` varchar(100) NOT NULL,
  `academic_degree` varchar(10000) NOT NULL,
  `fee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `gender`, `birthdate`, `designation`, `speciality`, `professional_details`, `image_path`, `mobile_no`, `email`, `password`, `phone_number`, `bdmc_reg`, `academic_degree`, `fee`) VALUES
(7, 'Abul Kashem Sarker', 'Male', '12 January, 2016', 'Professor', '14', 'Professor and Dept. Head, Dept Of Surgery,Chittagong Medical College Hospital,Chittagong ', 'uploads/12195900_556259997860072_2592261950521262552_n.jpg', '01711356467', 'abulkashem@gmail.com', '1234', '998877', '778899', 'MBBS,FCPS(UK),MD(Russia).', 500),
(8, 'Abdul Awal Limon', 'Male', '2 May, 2016', 'Assistant Professor', '44', 'Assistant Professor ,Dept Of Dental Unit, Rajshahi Medical college Hospital.', 'uploads/12508850_10205592725838971_7490530584694341538_n.jpg', '01718057011', 'limon_awal@gmail.com', '1234', '665544', '445566', 'BDS(RU)', 500),
(9, 'Muhammad Motiur Rahman', 'Male', '8 March, 2016', 'Professor', 'Allergy and Immunology', 'Professor and Dept. Head, Dept. of  Allergy And Immunology Islami Bank Medical college Hospital.', 'uploads/184_Shafique_Uddin.jpg', '01711223344', 'motiur@gmail.com', '1234', '332255', '552233', 'MBBS, FCPS (Medicine)', 500),
(10, 'Probir Mohon Basak', 'Male', '9 May, 2016', 'Assistant Professor', 'Allergy and Immunology', 'Assistant Professor, Dept. of Allergy And Immunology\r\n                        Rajshahi Medical college Hospital,Rajshahi', 'uploads/1382.jpg', '01711221133', 'probir@gmail.com', '1234', '112244', '442211', 'MBBS,BCS(Health), FCPS (Medicine)', 500),
(11, 'Md. A. B. Siddique', 'Male', '14 September, 2016', 'Professor', '8', 'Former Professor and Dept. Head, Dept. of Paediatrics\r\n                        Rajshahi Medical college Hospital,Rajshahi', 'uploads/901494_364903116952175_1914055780_o.jpg', '01711223355', 'siddque@gmail.com', '1234', '448899', '998844', 'MBBS, MRCP(UK),MRCP,paediatrcis(UK),FRCP(Edin,Glasgo),FAAP(America),MACDCHDTMH', 500),
(12, 'Md. Iqbal Bari', 'Male', '17 October, 1955', 'Professor', '8', 'Professor and Dept. Head, Dept. of Paediatrics\r\n                        Rajshahi Medical college Hospital,Rajshahi', 'uploads/Prof.-Dr_.-Md_.-Nasir-Uddin_.jpg', '01711223366', 'bari@gmail.com', '1234', '776655', '556677', 'MBBS, FCPS (Paediatrics),  FRCP,DMedEd(UK)', 500);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(100) NOT NULL,
  `chamber_id` int(10) NOT NULL,
  `doctor_id` int(8) NOT NULL,
  `day_id` int(1) NOT NULL,
  `time_from` varchar(1000) NOT NULL,
  `time_to` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `chamber_id`, `doctor_id`, `day_id`, `time_from`, `time_to`) VALUES
(1, 1, 7, 1, '2', '5'),
(2, 1, 8, 3, '4', '6'),
(24, 7, 9, 1, '5', '6'),
(25, 7, 7, 2, '5', '6'),
(26, 7, 9, 3, '5', '6');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `speciality_id` int(4) NOT NULL,
  `speciality_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`speciality_id`, `speciality_name`) VALUES
(1, 'All Diseases of Adults (Medicine)'),
(2, 'Allergy and Immunology'),
(3, 'Arthritis, Joint, Soft Tissue problems (Rheumatology)'),
(4, 'Blood related diseases (Haematology)'),
(5, 'Bone, Joint, Fractures (Orthopaedics)'),
(6, 'Brain, Spinal Cord, Nerve (Neuromedicine)'),
(7, 'Cancer (Oncology)'),
(8, 'Cancer of Female Reproductive System (Gynaecologic Oncology)'),
(9, 'Child or Infant any disease (Paediatrics)'),
(10, 'Diabetes, Hormones, Thyroid, etc. (Endocrinology)'),
(11, 'ENT or Ear, Nose and Throat, Tonsil (Otorhinolaryngology)'),
(12, 'Eye, Vision, Cataracts, etc. (Ophthalmology)'),
(13, 'General Physician (All or any common diseases and health issues)'),
(14, 'General Surgery, Incision, Operation (General Surgery)'),
(15, 'Heart, Cardiac Surgery, Cardiovascular, Hypertension, Blood Pressure (Cardiology)'),
(16, 'Dental, Orthodontics, Maxillofacial Surgery, Scaling (Dentistry)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `blood_group_id` int(2) NOT NULL,
  `blood_donor` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `gender`, `birthdate`, `image_path`, `mobile_number`, `email`, `password`, `blood_group_id`, `blood_donor`) VALUES
(1, 'Pratik', 'Saha', 'male', '6 September, 1994', 'uploads/My Pic.jpg', '01521498060', 'pratikjoy7@gmail.com', '1234', 3, 1),
(2, 'Sowrozit', 'Sarker', 'male', '8 May, 1992', 'uploads/C360_2014-09-26-13-38-18-531_org.jpg', '01750351043', 'jeetsarker93@gmail.com', '1234', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`amb_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `available_blood`
--
ALTER TABLE `available_blood`
  ADD PRIMARY KEY (`available_blood_id`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`blood_bank_id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Indexes for table `chamber`
--
ALTER TABLE `chamber`
  ADD PRIMARY KEY (`chamber_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`speciality_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `amb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `available_blood`
--
ALTER TABLE `available_blood`
  MODIFY `available_blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `blood_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `blood_group_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `chamber`
--
ALTER TABLE `chamber`
  MODIFY `chamber_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `speciality_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
