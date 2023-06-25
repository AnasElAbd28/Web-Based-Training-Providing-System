-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 04:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Course_Img` varchar(255) DEFAULT NULL,
  `Course_Title` varchar(255) DEFAULT NULL,
  `Course_Description` text DEFAULT NULL,
  `Course_Price` decimal(10,2) DEFAULT NULL,
  `Course_Start` date DEFAULT NULL,
  `Course_End` date DEFAULT NULL,
  `Course_Category` varchar(255) DEFAULT NULL,
  `TP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Img`, `Course_Title`, `Course_Description`, `Course_Price`, `Course_Start`, `Course_End`, `Course_Category`, `TP_ID`) VALUES
(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6IRB21PQnIhP-PSXa28PQLWuSabWJsNFVvmZSAu2ZVg&s', 'Valorant Course', 'This is  a valorant course ', '23.99', '2023-06-05', '2023-06-30', 'E-Sport', 1),
(6, 'https://pbs.twimg.com/profile_images/815698345716912128/hwUcGZ41_400x400.jpg', 'PHP course', 'This is a php course', '23.00', '2023-06-17', '2023-06-26', 'Computer Science', NULL),
(7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/900px-JavaScript-logo.png?20120221235433', 'JS course', 'This is a JS course', '222.00', '2023-06-21', '2023-06-17', 'Computer Science', NULL),
(9, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/800px-JavaScript-logo.png', 'Javascript course', 'This is a javascript course', '23.00', '2023-06-15', '2023-06-28', 'Computer Science', 1),
(10, 'https://pbs.twimg.com/profile_images/815698345716912128/hwUcGZ41_400x400.jpg', 'PHP course', 'This is a php course', '23.00', '2023-06-13', '2023-07-06', 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_providor`
--

CREATE TABLE `training_providor` (
  `TP_ID` int(11) NOT NULL,
  `TP_Name` varchar(255) NOT NULL,
  `TP_Email` varchar(255) NOT NULL,
  `TP_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_providor`
--

INSERT INTO `training_providor` (`TP_ID`, `TP_Name`, `TP_Email`, `TP_Password`) VALUES
(1, 'MMU', 'MMU@gmail.com', '1234567'),
(2, 'XMUM', 'XMUM@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Full_Name`, `email`, `Password`, `DOB`, `Gender`) VALUES
(1, 'Anas', 'anasehabelabd12@gmail.com', 'Zalabia12', '2023-06-07', ''),
(3, 'Rawan', 'Rawan@gmail.com', '123456', '2023-06-20', 'female'),
(4, 'BodeSlayer', 'bode@gmail.com', 'Zalabia12', '2023-06-25', 'male'),
(5, '3omda', '3omda@gmail.com', '3omda', '2023-06-12', 'male'),
(6, 'Omar', 'Omar@gmail.com', '1234567', '2023-05-28', 'male'),
(7, 'Anas', 'Anas@de7k.com', '12345', '2023-06-23', 'male'),
(8, 'TAHA MOHAMMED TAHA AL-HARIRI', 'tahaalhariri2@gmail.com', 'Taha1234', '2002-07-24', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `UserCourse_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`UserCourse_ID`, `User_ID`, `Course_ID`) VALUES
(9, 8, 3),
(10, 8, 7),
(11, 8, 10),
(13, 1, 6),
(14, 1, 7),
(15, 1, 3),
(16, 1, 3),
(17, 3, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `TP_ID` (`TP_ID`);

--
-- Indexes for table `training_providor`
--
ALTER TABLE `training_providor`
  ADD PRIMARY KEY (`TP_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`UserCourse_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `training_providor`
--
ALTER TABLE `training_providor`
  MODIFY `TP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `UserCourse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`TP_ID`) REFERENCES `training_providor` (`TP_ID`);

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
