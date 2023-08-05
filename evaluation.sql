-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `eval_title`
--

CREATE TABLE `eval_title` (
  `ID` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eval_title`
--

INSERT INTO `eval_title` (`ID`, `title`) VALUES
(1, 'Teaching Competence'),
(2, 'Teaching Skills'),
(3, 'Comunication Skills'),
(4, 'Evaluate skills'),
(5, 'Professionalism');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ID` int(11) NOT NULL,
  `instructor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`ID`, `instructor`) VALUES
(1, 'Angelo Salvacion'),
(2, 'Melvin Reston');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `sub_title_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_title`
--

CREATE TABLE `sub_title` (
  `ID` int(11) NOT NULL,
  `eval_title_id` int(11) DEFAULT NULL,
  `sub_title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_title`
--

INSERT INTO `sub_title` (`ID`, `eval_title_id`, `sub_title`) VALUES
(1, 1, 'Orients the student with the course syllabus.'),
(2, 1, 'Motivates the students about the lessons.'),
(3, 1, 'Teaches with updated materials'),
(4, 1, 'Relates subject matte to current issues.'),
(5, 1, 'Shows knowledge of related subjects to enrich the lessons.'),
(6, 1, 'Uses research-based instruction.'),
(7, 1, 'Gives sufficient inputs in terms of knowledge, skills and attitudes.'),
(8, 2, 'Employs different techniques, methodologies and strategies for higher learning.'),
(9, 2, 'Uses techniques and methods that contribute to the development of higher learning.'),
(10, 2, 'Uses appropriate teaching method to the development of higher learning.'),
(11, 2, 'Employs activities that are towards development of creative, analytical and critical thinking.'),
(12, 2, 'Inspires students to undertake research.'),
(13, 2, 'Shows mastery of lessons.'),
(14, 2, 'Explains the lessons well.'),
(15, 3, 'Speaks language of instruction clearly and fluently.'),
(16, 3, 'Possesses a wide range of vocabulary.'),
(17, 3, 'Encourage students to voice out their opinion.'),
(18, 3, 'Encourage students to answer orally in complete sentence.'),
(19, 3, 'Encourage students to participate in class discussion.'),
(20, 4, 'Gives relevant assignment.'),
(21, 4, 'Makes test instruction/direction easy to understand.'),
(22, 4, 'Uses cognitive skills, such as remembering, comprehending and thingking.'),
(23, 4, 'Uses objective types of test, such as completion type (filling the blanks,) alternative type (true or false), matching type and multiple choice.'),
(24, 4, 'Uses essay type of test.'),
(25, 4, 'Uses quizzes (formative) and long test (summative).'),
(26, 4, 'Shows fairness in giving grades.'),
(27, 4, 'Discourage cheating during the test.'),
(28, 4, 'Uses a class record to record students, attendance, quizzes, and long test.'),
(29, 4, 'Computes test results accurately.'),
(30, 5, 'Reports to class on time.'),
(31, 5, 'Dismisses the class on time.'),
(32, 5, 'Treats students like responsible, matured individuals.'),
(33, 5, 'Has pleasant working relationship with students.'),
(34, 5, 'Is consistent with his/her classroom regulations and policies.'),
(35, 5, 'Displays good moral character in and out of the classroom.'),
(36, 5, 'Uses reason that 4 emotion and dealing with classroom problem.'),
(37, 5, 'Observes proper grooming when reporting to class.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eval_title`
--
ALTER TABLE `eval_title`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `sub_title_id` (`sub_title_id`);

--
-- Indexes for table `sub_title`
--
ALTER TABLE `sub_title`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eval_title_id` (`eval_title_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eval_title`
--
ALTER TABLE `eval_title`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sub_title`
--
ALTER TABLE `sub_title`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`ID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`sub_title_id`) REFERENCES `sub_title` (`ID`);

--
-- Constraints for table `sub_title`
--
ALTER TABLE `sub_title`
  ADD CONSTRAINT `sub_title_ibfk_1` FOREIGN KEY (`eval_title_id`) REFERENCES `eval_title` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
