-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 03:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bernadine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `User_Name`, `Password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `Full_Names` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Sujet` varchar(30) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `Full_Names`, `Email`, `Sujet`, `Message`) VALUES
(6, 'Mpazimpaka Dddddd', 'digne@gmail.com', 'Project propasal', 'Hello there here we have the money that we can use');

-- --------------------------------------------------------

--
-- Table structure for table `email_sub`
--

CREATE TABLE `email_sub` (
  `ID` int(11) NOT NULL,
  `Sub_Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_sub`
--

INSERT INTO `email_sub` (`ID`, `Sub_Email`) VALUES
(1, 'cnurukundo@gmail.com'),
(2, 'fabrice@gmail.com'),
(3, 'digne@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `evnts`
--

CREATE TABLE `evnts` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `sector_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evnts`
--

INSERT INTO `evnts` (`id`, `event_title`, `sector_name`, `description`, `event_picture`, `created_at`) VALUES
(4, 'La famille.ds l\'histoire de la congrégation c\'est aujourd\'hui                  le 05/08/2025. Que la fondation a Bozo a vu le jour.', 'Réunion', 'Ici c\'est à l\'entrée de Bozo où  les soeurs qui sont allées  à Bozo le 03 /08 sont venu nous \r\n                rejoindre à 11h  et ensuite le conseil paroissial le curé le chef du village.sont venus à\r\n                 notre rencontre pour marquer l\'accueil.c\'etait agréable.et nous avons fait le cortège vers la paroisse.', '1757583507_Post_1.jpeg', '2025-09-11 09:38:27'),
(6, 'La visite de l Eveque du Tchad Monseigneur Dominique Le 4 -5 Aout 2025', 'Visite', 'Chères consoeurs hier  nous avons vécu une grande  joie à l\'école Notre Dame de l\'Esperance de Bedjom. 9 élèves sur 10 ont reçu le Baccalauréat. Et, nous sommes les 1ers dans tout le logone occidentale et parmi les 5 premiers au niveau du pays. Nous rendons grâce au seigneur pour ces merveilles.', '1757583745_abourr.png', '2025-09-11 09:42:25'),
(7, 'Les Communautés du Tchad honorent Saint Bernard', 'Sante', 'Mieux vaut tard que jamais les trois communautés du Tchad ont bien fêté ensemble notre\r\n                 patron St Bernard à Mbalkabra.dans un petit groupe de nos collaborateurs proches actuels et nos aspirantes \r\n                 interne et externes. C\'était Une bonne occasion de faire connaître st Bernard  et sensibiliser pour les \r\n                 amis de st Bernard. En même temps Nous avons accueilli notre aspirante  c\'est elle en aube  blanche à côté du prêtre . \r\n                Joyeusement elle a fait enfant de coeur . La journée a été agréable . nous rendons grâce au seigneur.', '1757583883_sante.jpeg', '2025-09-11 09:44:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `email_sub`
--
ALTER TABLE `email_sub`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `evnts`
--
ALTER TABLE `evnts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_sub`
--
ALTER TABLE `email_sub`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evnts`
--
ALTER TABLE `evnts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
