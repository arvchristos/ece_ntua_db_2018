-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2018 at 11:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4147015_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) NOT NULL,
  `plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afm` int(11) NOT NULL,
  `booking_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `pay_method` enum('Μετρητά','Πιστωτική',' Τραπεζικό έμβασμα') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `plate`, `afm`, `booking_date`, `start_date`, `end_date`, `pay_method`, `pay_date`, `location`) VALUES
(1, 'HM9562', 254109863, '2018-01-07 00:46:05', '2018-07-03', '2018-07-04', 'Πιστωτική', '3000-01-01', 'Ξηρογιάννη 3'),
(2, 'AZ0391', 254109851, '2018-01-06 18:06:04', '2018-01-24', '2018-01-31', 'Μετρητά', '2018-01-24', 'Αρίδου 25'),
(3, 'AH0057', 412863250, '2018-01-06 18:07:22', '2018-01-12', '2018-01-13', ' Τραπεζικό έμβασμα', '2018-01-09', 'Φούφουτου'),
(4, 'ZA0531', 412863190, '2018-01-06 18:09:16', '2018-01-14', '2018-01-18', 'Πιστωτική', '2018-01-15', 'Περίδου 10'),
(5, 'ZE1025', 412813260, '2018-01-06 18:26:50', '2018-01-08', '2018-01-11', ' Τραπεζικό έμβασμα', '2018-01-09', 'King George,Athens'),
(6, 'EA2341', 412861250, '2018-01-06 18:28:26', '2018-01-30', '2018-02-04', 'Πιστωτική', '2018-01-02', 'Μονέρου 11'),
(7, 'EZ2510', 412863150, '2018-01-07 17:27:41', '2018-01-21', '2018-01-24', 'Πιστωτική', '2018-01-22', 'Ψαρρά 99'),
(8, 'HZ3472', 412863162, '2018-01-08 10:24:40', '2018-02-05', '2018-02-07', 'Πιστωτική', '2018-02-06', 'Ψιθύρου 11'),
(9, 'ZP4547', 412863173, '2018-01-06 18:34:57', '2018-02-11', '2018-02-20', 'Πιστωτική', '2018-02-13', 'Πιερώτου 10 '),
(10, 'MN6452', 412863180, '2018-01-22 00:00:00', '2018-03-07', '2018-03-27', 'Μετρητά', '2018-01-09', 'Σπατέας 109Α'),
(11, 'PN8910', 254109853, '2018-01-07 15:49:07', '2018-04-01', '2018-04-04', 'Πιστωτική', '2018-03-10', 'Αλίμου 32'),
(12, 'NP7897', 254109859, '2018-01-06 18:47:21', '2018-01-16', '2018-01-28', ' Τραπεζικό έμβασμα', '2018-01-18', 'Λεοντίου 88\r\n\r\n'),
(13, 'NM7680', 254109861, '2018-01-06 18:46:36', '2018-02-15', '2018-02-18', 'Μετρητά', '2018-02-13', 'Παναγίας 12'),
(14, 'NB9222', 254109851, '2018-01-27 00:00:00', '2018-01-27', '2018-01-31', ' Τραπεζικό έμβασμα', '2018-01-27', 'Βασιλείου 833'),
(15, 'BZ9432', 254109866, '2018-01-12 00:00:00', '2018-01-19', '2018-01-24', 'Μετρητά', '2018-01-20', 'Ειτίλα 80'),
(16, 'PN8910', 412863250, '2018-01-06 23:28:55', '2018-01-17', '2018-01-18', 'Μετρητά', '2018-01-25', 'test'),
(17, 'MN6452', 412863162, '2018-01-07 15:04:03', '2018-04-21', '2018-04-25', ' Τραπεζικό έμβασμα', '2018-02-22', 'Θεμιστοκλέους 20'),
(18, 'AZ0391', 412863150, '2018-01-07 00:00:00', '2018-05-01', '2018-05-04', 'Πιστωτική', '2018-05-01', 'Αλληγόρου 30'),
(19, 'NP7897', 12457896, '2018-01-08 00:00:00', '2018-05-11', '2018-05-16', ' Τραπεζικό έμβασμα', '2018-05-08', 'Νίκης 22Α'),
(20, 'MN6452', 254109866, '2018-01-23 00:00:00', '2018-05-20', '2018-05-24', 'Πιστωτική', '2018-05-10', 'Γερμανού 12 '),
(21, 'MN6452', 254109853, '2018-01-05 00:00:00', '2018-05-08', '2018-05-13', ' Τραπεζικό έμβασμα', '2018-05-02', 'Λεοντίου 13'),
(22, 'PN8910', 254109853, '2018-01-07 15:12:23', '2018-05-03', '2018-05-09', 'Πιστωτική', '2018-05-01', 'Πόλκο 12'),
(23, 'AH0057', 412863190, '2018-01-01 00:00:00', '2018-01-01', '2018-01-02', 'Μετρητά', '2018-01-01', 'Αθηναίου 45'),
(24, 'AZ0391', 412863250, '2017-12-20 00:00:00', '2017-12-25', '2017-12-30', 'Μετρητά', '2017-12-20', 'Παπαπέτρου 65'),
(25, 'NP7897', 254109860, '2018-01-01 00:00:00', '2018-08-08', '2018-08-10', ' Τραπεζικό έμβασμα', '2018-05-02', 'Πέλλας 120'),
(26, 'ZE1025', 412863162, '2018-01-01 00:00:00', '2018-01-02', '2018-01-03', 'Πιστωτική', '2018-01-01', 'Μαλιγούλας 22'),
(27, 'EA2341', 412123250, '2018-01-03 00:00:00', '2018-01-03', '2018-01-05', 'Πιστωτική', '2018-01-05', 'Αργέτου 9'),
(28, 'EZ2510', 412863200, '2017-11-01 00:00:00', '2017-11-02', '2017-11-05', 'Μετρητά', '2017-11-04', 'Λιονέλ 10'),
(29, 'HZ3472', 12457896, '2017-11-01 00:00:00', '2017-11-04', '2017-11-08', 'Μετρητά', '2017-11-07', 'Χριστιανών 3'),
(30, 'ZP4547', 254109854, '2017-12-01 00:00:00', '2017-12-03', '2017-12-11', 'Πιστωτική', '2017-12-10', 'Δένδιας 11'),
(31, 'MN6452', 254109860, '2017-12-20 00:00:00', '2017-12-21', '2017-12-24', 'Πιστωτική', '2017-12-22', 'Πλατεία Νερού'),
(32, 'NM7680', 254109857, '2017-12-31 00:00:00', '2017-12-31', '2018-01-03', 'Μετρητά', '2017-12-31', 'Πλατεία Νερού'),
(33, 'NP7897', 254109861, '2017-12-20 00:00:00', '2017-12-25', '2017-12-31', 'Μετρητά', '2017-12-25', 'Ψηλός Βόλακας'),
(34, 'PN8910', 254109853, '2017-11-01 00:00:00', '2017-11-02', '2017-11-04', ' Τραπεζικό έμβασμα', '2017-11-04', 'Χίλτον Hotel Athens'),
(35, 'NB9222', 254109855, '2017-11-05 00:00:00', '2017-11-11', '2017-11-20', ' Τραπεζικό έμβασμα', '2017-11-10', 'Καλογρίδη 12'),
(36, 'BZ9432', 254109856, '2017-11-09 00:00:00', '2017-11-12', '2017-11-30', 'Μετρητά', '2017-11-30', 'Καλογέρου 5'),
(37, 'HM9562', 254109850, '2017-12-22 00:00:00', '2017-12-22', '2017-11-29', 'Μετρητά', '2017-11-29', 'Ελέους 1'),
(38, 'HM9562', 412863150, '2018-01-07 16:34:44', '2018-10-11', '2018-10-15', ' Τραπεζικό έμβασμα', '2018-05-05', 'Τριανδρίας 3'),
(39, 'EZ2510', 254109861, '2017-07-07 00:00:00', '2017-07-07', '2017-07-09', 'Μετρητά', '2017-07-07', 'Αλεξάνδρου 9');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `afm` int(11) NOT NULL,
  `type` enum('Ιδιώτης','Εταιρία') COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`afm`, `type`, `town`, `postal_code`, `street`, `street_num`) VALUES
(12457896, 'Ιδιώτης', 'HAWKINS', 12461, 'MIRKWOOD', 25),
(254109850, 'Ιδιώτης', 'Αθήνα', 15411, 'Αμφιτρίτης', 13),
(254109851, 'Ιδιώτης', 'Αθήνα', 15412, 'Καραισκάκη', 21),
(254109852, 'Ιδιώτης', 'Αθήνα', 15421, 'Αμφιτρίτης', 8),
(254109853, 'Ιδιώτης', 'Αθήνα', 15411, 'Ελλήνων', 10),
(254109854, 'Ιδιώτης', 'Αθήνα', 15433, 'Δικαίου', 52),
(254109855, 'Ιδιώτης', 'Λάρισα', 32401, 'Προφέρης', 87),
(254109856, 'Ιδιώτης', 'Πάτρα', 16401, 'Παναγούλη', 102),
(254109857, 'Ιδιώτης', 'Θεσσαλονίκη', 21401, 'Βαλαίου', 12),
(254109858, 'Ιδιώτης', 'Ξάνθη', 20401, 'Νομής', 5),
(254109859, 'Ιδιώτης', 'Ηράκλειο', 73401, 'Πόρτας', 3),
(254109860, 'Ιδιώτης', 'Χανιά', 77401, 'θηβών', 30),
(254109861, 'Ιδιώτης', 'Κοζάνη', 15201, 'Πιώνης', 31),
(254109862, 'Ιδιώτης', 'Κέρκυα', 15101, 'Βενιζέλου', 32),
(254109863, 'Ιδιώτης', 'Κόρινθος', 15001, 'Αμφιτρίτης', 53),
(254109866, 'Ιδιώτης', 'Αθήνα', 15401, 'Αμφιτρίτης', 3),
(412113250, 'Εταιρία', 'Αθήνα', 15789, 'Ανδρείου', 5),
(412123250, 'Εταιρία', 'Αθήνα', 15788, 'Κατεχάκης', 12),
(412813260, 'Εταιρία', 'Χίος', 65102, 'Μαστίχας', 90),
(412861250, 'Εταιρία', 'Τρίπολη', 19102, 'Πόποτα', 32),
(412863150, 'Εταιρία', 'Αθήνα', 15005, 'Βασ.Όλγας', 2),
(412863162, 'Εταιρία', 'Αθήνα', 15980, 'Βασ.Όλγας', 12),
(412863173, 'Εταιρία', 'Αθήνα', 15231, 'Βασ.Σοφίας', 22),
(412863180, 'Εταιρία', 'Θεσσαλονίκη', 30564, 'Τσιμισκή', 3),
(412863190, 'Εταιρία', 'Καλαμαριά', 32431, 'Καλαμαρού', 11),
(412863200, 'Εταιρία', 'Σέρρες', 32102, 'Καραμανλή', 81),
(412863210, 'Εταιρία', 'Ρέθυμνο', 15102, 'Χαρικλέους', 23),
(412863220, 'Εταιρία', 'Λιβαδειά', 43102, 'Διστόμου', 1),
(412863230, 'Εταιρία', 'Ηράκλειο', 76102, 'Λεόντων', 23),
(412863240, 'Εταιρία', 'Σπάρτη', 19882, 'Λεωνίδα', 56),
(412863250, 'Εταιρία', 'Αθήνα', 15102, 'Βασ.Όλγας', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer_email`
--

CREATE TABLE `customer_email` (
  `afm` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_email`
--

INSERT INTO `customer_email` (`afm`, `email`) VALUES
(12457896, 'first@gmail.com'),
(254109850, 'mama@gmail.com'),
(254109851, 'areugonnado@gmail.com'),
(254109852, 'what@gmail.com'),
(254109853, 'drumnbase@gmail.com'),
(254109854, 'third@gmail.com'),
(254109855, 'last@@gmail.com'),
(254109856, 'justkilledaman@gmail.com'),
(254109857, 'putagun@gmail.com'),
(254109858, 'againsthishead@gmail.com'),
(254109859, 'pullthetrigger@gmail.com'),
(254109860, 'nowhesdead@gmail.com'),
(254109861, 'fourtogo@gmail.com'),
(254109862, 'threetogo@gmail.com'),
(254109863, 'twotogo@gmail.com'),
(254109866, 'second@gmail.com'),
(412113250, 'gmail@gmail.com'),
(412123250, 'email@gmail.com'),
(412813260, 'just@gmail.com'),
(412861250, 'abc@gmail.com'),
(412863150, 'wrist@gmail.com'),
(412863162, 'bestmail@gmail.com'),
(412863173, 'worst@gmail.com'),
(412863180, '12cean@gmail.com'),
(412863190, 'thebest@gmail.com'),
(412863200, 'togo@gmail.com'),
(412863210, 'loper@gmail.com'),
(412863220, 'piggy@gmail.com'),
(412863230, 'thedoors@gmail.com'),
(412863240, 'doors@gmail.com'),
(412863250, 'definatelynotgmail@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_phone`
--

CREATE TABLE `customer_phone` (
  `afm` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_phone`
--

INSERT INTO `customer_phone` (`afm`, `phone`) VALUES
(12457896, 6950000115),
(254109850, 6950000121),
(254109851, 6950000120),
(254109852, 6950000119),
(254109853, 6950000118),
(254109854, 6950000117),
(254109855, 6950000130),
(254109856, 6950000122),
(254109857, 6950000123),
(254109858, 6950000124),
(254109859, 6950000125),
(254109860, 6950000126),
(254109861, 6950000127),
(254109862, 6950000128),
(254109863, 6950000129),
(254109866, 6950000116),
(412113250, 6950000102),
(412123250, 6950000103),
(412813260, 6950000104),
(412861250, 6950000105),
(412863150, 6950000106),
(412863162, 6950000107),
(412863173, 6950000108),
(412863180, 6950000109),
(412863190, 6950000101),
(412863200, 6950000114),
(412863210, 6950000113),
(412863220, 6950000112),
(412863230, 6950000111),
(412863240, 6950000110),
(412863250, 6950000100);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `afm` int(11) NOT NULL,
  `rent_id` bigint(20) NOT NULL,
  `plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`afm`, `rent_id`, `plate`) VALUES
(34010201, 1, 'AH0057'),
(23219090, 2, 'AZ0391'),
(22331821, 3, 'ZE1025'),
(52641822, 4, 'EA2341'),
(23219090, 5, 'EZ2510'),
(22331821, 6, 'HZ3472'),
(237168411, 7, 'ZP4547'),
(23219090, 8, 'MN6452'),
(22331821, 9, 'NM7680'),
(2127413680, 10, 'NP7897'),
(2127413680, 11, 'PN8910'),
(52641822, 12, 'NB9222'),
(237168411, 13, 'BZ9432'),
(22331821, 14, 'HM9562'),
(34010201, 15, 'EZ2510');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `afm` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_state` enum('Παντρεμένος','Ανύπαντρος') CHARACTER SET utf32 COLLATE utf32_bin DEFAULT NULL,
  `d_license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_license_expiration` date NOT NULL,
  `town` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `fire_date` date DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amka` bigint(20) NOT NULL,
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`afm`, `store_id`, `last_name`, `first_name`, `middle_name`, `doy`, `per_state`, `d_license`, `d_license_expiration`, `town`, `postal_code`, `street`, `street_num`, `hire_date`, `fire_date`, `position`, `amka`, `id`, `salary`) VALUES
(22331821, 5, 'Γλυνιαδάκης', 'Αντώνης', 'Μανούσος', 'Χανίων', 'Ανύπαντρος', '787082442', '2023-02-02', 'Χανιά', 73131, 'Τσόντου Βάρδα', 3, '2007-01-11', '0000-00-00', 'Οδηγός', 4157896301, 'ΑΗ51000', 1700),
(23219090, 2, 'Διαμαντίδης', 'Δημήτρης', 'Κώστας', 'ΙΔ Αθηνών', 'Παντρεμένος', '341289451', '2035-01-22', 'Αθήνα', 15773, 'Ερμού', 23, '2007-12-29', '0000-00-00', 'Οδηγός', 1258435618, 'ΑΚ4718201', 2000),
(34010201, 2, 'Σπανούλης', 'Βασίλης', 'Μάρκοςσ', 'Β Αθηνών', 'Παντρεμένος', '001239451', '2035-01-12', 'Αθήνα', 15313, 'Νεάρχου', 12, '2007-12-19', '0000-00-00', 'Οδηγός', 1258400618, 'ΑΗ461901', 1200),
(51641332, 2, 'Φώτσης', 'Αντώνης', 'Φραγκίσκος', 'Δ Αθήνας', 'Παντρεμένος', '597082511', '2025-10-30', 'Αθήνα', 15441, 'Κολοκοτρώνη', 61, '1999-01-11', '0000-00-00', 'Γραφείου', 4152194401, 'ΑΗ12110', 1650),
(52641822, 3, 'Γκάλης', 'Νίκος', 'Θανάσης', 'Γ Θεσσαλονίκης', 'Παντρεμένος', '147082562', '2027-09-27', 'Θεσσαλονίκη', 15560, 'Αντιγονιδών', 13, '1999-01-11', '0000-00-00', 'Οδηγός', 4157896301, 'ΑΕ52140', 1427),
(111462371, 3, 'Καμπακάκη', 'Ραφαέλα', 'Γιάννης', 'Α Θεσσαλονίκης', 'Παντρεμένος', '12123', '0000-00-00', 'Θεσσαλονίκη', 15513, 'Περίδου', 9, '2003-11-20', '0000-00-00', 'Γραφείου', 4422435618, 'ΑΗ20133', 755),
(127331092, 4, 'Φασούλας', 'Παναγιώτης', 'Δημήτρης', 'Πάτρας', 'Παντρεμένος', '127112561', '2023-02-21', 'Πάτρα', 26200, 'Αγ.Γεωργίου', 2, '2001-05-01', '0000-00-00', 'Γραφείου', 3547896121, 'ΑΕ52143', 650),
(213164409, 4, 'Πέλης', 'Νίκολής', 'Νίκου', 'Πάτρας', 'Ανύπαντρος', '1231234', '0000-00-00', 'Ρίο', 14683, 'Λενίωνος', 12, '2008-03-19', '0000-00-00', 'Γραφείου', 2258435611, 'ΑΗ56410', 800),
(215138409, 4, 'Κανέλης', 'Αντώνης', 'Μάριος', 'Πάτρας', 'Ανύπαντρος', '', '0000-00-00', 'Ρίο', 14622, 'Ριάκη ', 2, '2009-09-22', '0000-00-00', 'Γραφείου', 1258435441, 'ΑΚ22410', 480),
(215168409, 4, 'Πατρόλης', 'Νίκος', 'Αντώνης', 'Πάτρας', 'Ανύπαντρος', '', '0000-00-00', 'Ρίο', 14623, 'Ριάκη ', 3, '2006-01-12', '0000-00-00', 'Γραφείου', 1258435611, 'ΑΗ58410', 900),
(237168411, 5, 'Μοχλάκη', 'Ευαγγελία', 'Αναστάσης', 'Α Χανίων', 'Παντρεμένος', '14522793', '2025-12-15', 'Κίσσαμος', 15705, 'Σφακιανάκη', 71, '2009-08-12', '0000-00-00', 'Οδηγός', 157741260, 'ΑΕ541203', 879),
(254168423, 3, 'Κοσμίδου', 'Ιωάννα', 'Μαρία', 'Γ\' Θεσσαλονίκης', 'Ανύπαντρος', '4581237860', '2025-02-28', 'Καλαμαριά', 14651, 'Φιλίππου', 9, '2017-03-13', '0000-00-00', 'Γραφείου', 4587123655, 'ΑΙ461958', 749),
(521461170, 4, 'Τσαλίκη', 'Μαρία', 'Δήμητρα', 'Πάτρας', 'Ανύπαντρος', '', '0000-00-00', 'Πάτρα', 14423, 'Ηφαίστου', 33, '2007-03-17', '0000-00-00', 'Γραφείου', 4458738518, 'ΑΕ22470', 666),
(521469870, 3, 'Δάκου', 'Ειρήνη', 'Δήμητρα', 'Α Θεσσαλονίκης', 'Παντρεμένος', '', '0000-00-00', 'Θεσσαλονίκη', 15513, 'Τσιμισκή ', 23, '2005-01-20', '0000-00-00', 'Γραφείου', 4458435618, 'ΑΕ20170', 2840),
(2127413680, 5, 'Κυβερνητάκης', 'Μιχαήλ', 'Κόστας', 'Χανίων', 'Παντρεμένος', '27498621', '2019-05-25', 'Χανιά', 15772, 'Κονοπισοπούλου', 55, '2010-11-29', '0000-00-00', 'Οδηγός', 541287300, 'ΑΕ17205', 976);

-- --------------------------------------------------------

--
-- Table structure for table `emp_email`
--

CREATE TABLE `emp_email` (
  `afm` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_email`
--

INSERT INTO `emp_email` (`afm`, `email`) VALUES
(22331821, 'glynglyn@gmail.com'),
(22331821, 'glynglynEllas@gmail.com'),
(23219090, '3d@gmail.com'),
(34010201, 'vspan@gmail.com'),
(34010201, 'vspan7@gmail.com'),
(51641332, 'antonisfotsis@gmail.com'),
(51641332, 'fotsenko@gmail.com'),
(52641822, 'nikosgkalis@gmail.com\r\n'),
(111462371, 'pragmata@gmail.com'),
(127331092, 'xontros@gmail.com'),
(213164409, 'pelistelis@gmail.com'),
(215138409, 'kankan@gmail.com'),
(215168409, 'patroklos@gmail.com'),
(237168411, 'gmoxl@gmail.com'),
(254168423, 'kosTH@gmail.com'),
(521461170, 'sesese@gmail.com'),
(521461170, 'tststs@gmail.com'),
(521469870, 'dakoudkaou@gmail.com'),
(2127413680, 'kyvernitis@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `emp_phone`
--

CREATE TABLE `emp_phone` (
  `afm` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_phone`
--

INSERT INTO `emp_phone` (`afm`, `phone`) VALUES
(22331821, 2107748124),
(22331821, 2107748125),
(22331821, 6954221100),
(23219090, 2107733126),
(23219090, 6978415507),
(34010201, 2107748126),
(34010201, 6954218530),
(51641332, 2103748026),
(51641332, 6957418023),
(52641822, 2107772004),
(52641822, 6945819367),
(111462371, 2310748126),
(111462371, 6957412800),
(127331092, 2310758126),
(127331092, 2310774106),
(213164409, 2105548126),
(215138409, 2104448126),
(215168409, 2105748116),
(237168411, 2103344126),
(254168423, 2107248126),
(254168423, 6957418023),
(521461170, 2101148126),
(521469870, 2100043126),
(521469870, 6971204568),
(2127413680, 2100698126);

-- --------------------------------------------------------

--
-- Table structure for table `etairia`
--

CREATE TABLE `etairia` (
  `afm` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etairia`
--

INSERT INTO `etairia` (`afm`, `name`, `documents`) VALUES
(412113250, 'Ebay', '32518789660'),
(412123250, 'IBM', '584120001786'),
(412813260, 'Intel', '5478124547'),
(412861250, 'AMD', '5487548754'),
(412863150, 'Nvidia', '14578412'),
(412863162, 'SeatGate', '3658941200'),
(412863173, 'WesternDigital', '5741021666'),
(412863180, 'Asus', '10485285410'),
(412863190, 'Amazon', '321683158986'),
(412863200, 'Razer', '582234100017'),
(412863210, 'Dell', '5499982013'),
(412863220, 'TurboX', '999998745'),
(412863230, 'HP', '5478124636'),
(412863240, 'Acer', '2548710463'),
(412863250, 'Google', '25112486320');

-- --------------------------------------------------------

--
-- Table structure for table `idiwtis`
--

CREATE TABLE `idiwtis` (
  `afm` int(11) NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idiwtis`
--

INSERT INTO `idiwtis` (`afm`, `last_name`, `first_name`, `license`, `id`, `documents`) VALUES
(12457896, 'Baggings', 'Bilbo', '102452687', 'AA12740', '1807521630'),
(254109850, 'Γουλιελμος', 'Τέλος', '102452689', 'AA12740', '1807521632'),
(254109851, 'Φρέντι', 'Μερκούριος', '102452690', 'AA12742', '1807521633'),
(254109852, 'Μπόναμ', 'Γιάννης', '102452691', 'AA12743', '1807521634'),
(254109853, 'ΜαΚάρτνει', 'Παύλος', '102452692', 'AA12744', '1807521635'),
(254109854, 'Λένον', 'Ιαώννης', '102452693', 'AA12745', '1807521636'),
(254109855, 'Μπόουι', 'Δαβίδ', '102452694', 'AA12746', '1807521637'),
(254109856, 'Μόρισον', 'Δημήτρης', '102452695', 'AA12747', '1807521638'),
(254109857, 'Γκάγκα', 'Λαίδη', '102452696', 'AA12748', '1807521639'),
(254109858, 'Σακίρα', 'Ισαβέλλα', '102452697', 'AA12749', '1807521640'),
(254109859, 'Ριάννα', 'Ρόμπιν', '102452698', 'AA12750', '1807521641'),
(254109860, 'Τζόπλιν', 'Τζάνις', '102452699', 'AA12751', '1807521642'),
(254109861, 'Joan', 'Jett', '102452600', 'AA12752', '1807521643'),
(254109862, 'Μάινε', 'Κλάους', '102452601', 'AA12753', '1807521644'),
(254109863, 'Κατράκης', 'Γιάννης', '102452688', 'AA12741', '1807521641'),
(254109866, 'Ρίνκγο', 'Αστέρης', '102452602', 'AA12754', '1807521645');

-- --------------------------------------------------------

--
-- Table structure for table `receivings`
--

CREATE TABLE `receivings` (
  `afm` int(11) NOT NULL,
  `rent_id` bigint(20) NOT NULL,
  `plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malfuncs` text COLLATE utf8mb4_unicode_ci,
  `flaws` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivings`
--

INSERT INTO `receivings` (`afm`, `rent_id`, `plate`, `malfuncs`, `flaws`) VALUES
(22331821, 1, 'AH0057', NULL, NULL),
(23219090, 2, 'AZ0391', NULL, NULL),
(22331821, 3, 'ZE1025', NULL, NULL),
(52641822, 4, 'EA2341', NULL, NULL),
(23219090, 5, 'EZ2510', NULL, NULL),
(52641822, 6, 'HZ3472', NULL, NULL),
(237168411, 7, 'ZP4547', NULL, NULL),
(34010201, 8, 'MN6452', NULL, NULL),
(22331821, 9, 'NM7680', NULL, NULL),
(2127413680, 10, 'NP7897', NULL, NULL),
(34010201, 11, 'PN8910', NULL, NULL),
(52641822, 12, 'NB9222', NULL, NULL),
(237168411, 13, 'BZ9432', NULL, NULL),
(22331821, 14, 'HM9562', NULL, NULL),
(34010201, 15, 'EZ2510', NULL, NULL);

--
-- Triggers `receivings`
--
DELIMITER $$
CREATE TRIGGER `update_vehicle_state` BEFORE INSERT ON `receivings` FOR EACH ROW UPDATE vehicles
    SET flaws = CASE 
    	WHEN (NEW.flaws IS NOT NULL) THEN CONCAT(flaws, NEW.flaws, ', ')
        ELSE flaws 
    END, 
    malfuncs = CASE 
    	WHEN (NEW.malfuncs IS NOT NULL) THEN CONCAT(malfuncs, NEW.malfuncs,', ')
        ELSE malfuncs 
    END
   WHERE plate = NEW.plate
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `rent_id` bigint(20) NOT NULL,
  `booking_id` bigint(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`rent_id`, `booking_id`, `exp_date`, `plate`) VALUES
(1, 23, '2018-01-02 00:00:00', 'AH0057'),
(2, 24, '2017-12-30 00:00:00', 'AZ0391'),
(3, 26, '2018-01-04 00:00:00', 'ZE1025'),
(4, 27, '2018-01-05 00:00:00', 'EA2341'),
(5, 28, '2017-11-05 00:00:00', 'EZ2510'),
(6, 29, '2017-11-08 00:00:00', 'HZ3472'),
(7, 30, '2017-12-11 00:00:00', 'ZP4547'),
(8, 31, '2017-12-22 00:00:00', 'MN6452'),
(9, 32, '2018-01-04 00:00:00', 'NM7680'),
(10, 33, '2017-12-31 00:00:00', 'NP7897'),
(11, 34, '2017-11-05 00:00:00', 'PN8910'),
(12, 35, '2017-11-20 00:00:00', 'NB9222'),
(13, 36, '2017-11-30 00:00:00', 'BZ9432'),
(14, 37, '2017-11-30 00:00:00', 'HM9562'),
(15, 39, '2017-07-10 00:00:00', 'EZ2510');

-- --------------------------------------------------------

--
-- Stand-in structure for view `simple_employees`
-- (See below for the actual view)
--
CREATE TABLE `simple_employees` (
`afm` int(11)
,`store` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`position` varchar(255)
,`town` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` int(11) NOT NULL,
  `car` int(11) NOT NULL DEFAULT '0',
  `motorcycle` int(11) NOT NULL DEFAULT '0',
  `atv` int(11) NOT NULL DEFAULT '0',
  `truck` int(11) NOT NULL DEFAULT '0',
  `mini_van` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `town`, `postal_code`, `street`, `street_num`, `car`, `motorcycle`, `atv`, `truck`, `mini_van`) VALUES
(2, 'Αθήνα', 12461, 'Πλαταιων', 24, 3, 1, 0, 0, 0),
(3, 'Θεσσαλονίκη', 15564, 'Αριστοτέλους', 23, 1, 1, 1, 1, 0),
(4, 'Πάτρα', 26224, 'Ηφαίστου', 2, 0, 0, 2, 0, 1),
(5, 'Χανιά', 73130, 'Τζανακάκη', 6, 1, 0, 1, 1, 1),
(6, 'Σπάρτη', 32555, 'Λεωνίδα', 300, 0, 0, 0, 0, 0),
(7, 'Λιβαδειά', 30310, 'Θηβαίων', 12, 0, 0, 0, 0, 0),
(8, 'Ιωάννινα', 45811, 'Πρέσπας', 25, 0, 0, 0, 0, 0),
(9, 'Σέρρες', 72019, 'Καραμανλή', 12, 0, 0, 0, 0, 0),
(10, 'Kόρινθος', 25104, 'Ισθμού', 91, 0, 0, 0, 0, 0),
(11, 'Tρίπολη', 58963, 'Ραχούλα', 82, 0, 0, 0, 0, 0),
(12, 'Ρόδος', 35811, 'Ιποτών', 3, 0, 0, 0, 0, 0),
(13, 'Ηράκλειο', 11115, 'Πόρτας', 3, 0, 0, 0, 0, 0),
(14, 'Πρέβεζα', 15411, 'Βέζης', 16, 0, 0, 0, 0, 0),
(15, 'Καβάλα', 31451, 'Στάλογο', 4, 0, 0, 0, 0, 0),
(16, 'Καστελόριζο', 25222, 'Συνόρων', 1821, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_email`
--

CREATE TABLE `store_email` (
  `store_id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_email`
--

INSERT INTO `store_email` (`store_id`, `email`) VALUES
(2, 'AthComp@dbrental.com'),
(2, 'AthCont@dbrental.com'),
(2, 'AthInfo@dbrental.com'),
(2, 'AthSupp@dbrental.com'),
(3, 'ThesComp@dbrental.com'),
(3, 'ThesCont@dbrental.com'),
(3, 'ThesInfo@dbrental.com'),
(3, 'ThesSupp@dbrental.com'),
(4, 'PatComp@dbrental.com'),
(4, 'PatCont@dbrental.com'),
(4, 'PatInfo@dbrental.com'),
(4, 'PatSupp@dbrental.com'),
(5, 'ChaComp@dbrental.com'),
(5, 'ChaCont@dbrental.com'),
(5, 'ChaInfo@dbrental.com'),
(5, 'ChaSupp@dbrental.com'),
(7, 'LibComp@dbrental.com'),
(7, 'LibCont@dbrental.com'),
(7, 'LibInfo@dbrental.com'),
(7, 'LibSupp@dbrental.com'),
(9, 'SerComp@dbrental.com'),
(9, 'SerCont@dbrental.com'),
(9, 'SerInfo@dbrental.com'),
(9, 'SerSupp@dbrental.com'),
(10, 'KoCont@dbrental.com'),
(10, 'KorComp@dbrental.com'),
(10, 'KorInfo@dbental.com'),
(10, 'KorSupp@dbrental.com'),
(11, 'Triinfo@dbrental.com');

-- --------------------------------------------------------

--
-- Table structure for table `store_phone`
--

CREATE TABLE `store_phone` (
  `store_id` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_phone`
--

INSERT INTO `store_phone` (`store_id`, `phone`) VALUES
(2, 2107772030),
(2, 2107772031),
(2, 2107772032),
(2, 2107772033),
(2, 2107772034),
(3, 2310256000),
(3, 2310256001),
(3, 2310256002),
(3, 2310256003),
(4, 2613900100),
(4, 2613900101),
(4, 2613900102),
(4, 2613900103),
(5, 2821051900),
(5, 2821051901),
(5, 2821051902),
(5, 2821051903),
(7, 2218767321),
(7, 2219823401),
(9, 2704563810),
(9, 6956412147),
(10, 2109873465),
(10, 2109876543),
(11, 2350482615);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `store_id` int(11) NOT NULL,
  `plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veh_type` enum('car','motorcycle','atv','truck','mini_van') COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` int(11) NOT NULL,
  `horse_power` int(11) NOT NULL,
  `b_year` year(4) NOT NULL,
  `kmeters` int(11) NOT NULL,
  `next_service` date NOT NULL,
  `last_service` date NOT NULL,
  `insurance_end` date NOT NULL,
  `malfuncs` text COLLATE utf8mb4_unicode_ci,
  `flaws` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`store_id`, `plate`, `veh_type`, `brand`, `cc`, `horse_power`, `b_year`, `kmeters`, `next_service`, `last_service`, `insurance_end`, `malfuncs`, `flaws`) VALUES
(5, 'AH0057', 'atv', 'vroom', 150, 40, 1989, 500, '2021-02-03', '2000-06-13', '2019-01-04', '123r', ''),
(2, 'AZ0391', 'car', 'Fiat', 1600, 11, 1995, 85000, '2018-02-05', '2017-06-11', '2019-01-04', '', ''),
(5, 'BZ9432', 'car', 'Toyota', 1850, 14, 2001, 63650, '2019-01-02', '2016-04-11', '2024-10-03', '', ''),
(3, 'EA2341', 'car', 'Fiat', 1400, 14, 2001, 65000, '2019-08-13', '2016-06-11', '2019-01-04', '', ''),
(5, 'EZ2510', 'mini_van', 'VolksWagen', 2200, 500, 1999, 24500, '2018-06-13', '2017-11-13', '2022-03-09', '', ''),
(3, 'HM9562', 'atv', 'OINK-OINK', 75, 10, 2010, 2389, '2019-01-15', '2016-05-08', '2024-02-02', NULL, NULL),
(2, 'HZ3472', 'car', 'Jaguar', 2500, 20, 2015, 13405, '2019-10-11', '2015-06-11', '2025-01-04', '', 'Too Good'),
(4, 'MN6452', 'atv', 'OINK-OINK', 120, 3, 2010, 1302, '2020-10-03', '2014-01-12', '2024-12-10', '', ''),
(4, 'NB9222', 'atv', 'OINK-OINK', 150, 20, 2002, 4005, '2020-04-15', '2017-01-20', '2027-01-08', NULL, NULL),
(5, 'NM7680', 'truck', 'Monster', 2000, 15, 2013, 24500, '2021-11-11', '2014-01-09', '2026-10-04', '', ''),
(3, 'NP7897', 'truck', 'lada', 54455, 44565, 2001, 125, '2018-12-13', '2017-12-20', '2017-12-14', NULL, NULL),
(2, 'PN8910', 'motorcycle', 'Honda', 125, 120, 2005, 2000, '2018-07-04', '2017-10-15', '2020-04-01', NULL, NULL),
(3, 'ZA0531', 'motorcycle', 'Glx', 150, 3, 2005, 500, '2022-07-14', '2016-05-10', '2022-01-12', '', ''),
(4, 'ZE1025', 'mini_van', 'VolksWagen', 2000, 400, 2007, 30500, '2018-02-13', '2017-06-13', '2019-01-04', 'Radio doesn\'t work ', 'it\'s not Lada'),
(2, 'ZP4547', 'car', 'BMW', 1245, 1245, 2101, 114455, '2018-12-05', '2017-12-06', '2017-12-20', NULL, NULL);

--
-- Triggers `vehicles`
--
DELIMITER $$
CREATE TRIGGER `decrease_store_vehicles` AFTER DELETE ON `vehicles` FOR EACH ROW UPDATE stores
    SET car = CASE OLD.veh_type
    	WHEN 'car' THEN car-1
        ELSE car 
    END,
    atv = CASE OLD.veh_type
    	WHEN 'atv' THEN atv-1
        ELSE atv 
    END,
    motorcycle = CASE OLD.veh_type
    	WHEN 'motorcycle' THEN motorcycle-1
        ELSE motorcycle 
    END,
    truck = CASE OLD.veh_type
    	WHEN 'truck' THEN truck-1
        ELSE truck 
    END,
    mini_van = CASE OLD.veh_type
    	WHEN 'mini_van' THEN mini_van-1
        ELSE mini_van 
    END
   WHERE store_id = OLD.store_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `increment_store_vehicles` BEFORE INSERT ON `vehicles` FOR EACH ROW UPDATE stores
    SET car = CASE NEW.veh_type
    	WHEN 'car' THEN car+1
        ELSE car 
    END,
    atv = CASE NEW.veh_type
    	WHEN 'atv' THEN atv+1
        ELSE atv 
    END,
    motorcycle = CASE NEW.veh_type
    	WHEN 'motorcycle' THEN motorcycle+1
        ELSE motorcycle 
    END,
    truck = CASE NEW.veh_type
    	WHEN 'truck' THEN truck+1
        ELSE truck 
    END,
    mini_van = CASE NEW.veh_type
    	WHEN 'mini_van' THEN mini_van+1
        ELSE mini_van 
    END
   WHERE store_id = NEW.store_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vehicles_stats`
-- (See below for the actual view)
--
CREATE TABLE `vehicles_stats` (
`veh_type` enum('car','motorcycle','atv','truck','mini_van')
,`duration` decimal(10,4)
,`credit_card` decimal(23,0)
,`cash` decimal(23,0)
,`emvasma` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Structure for view `simple_employees`
--
DROP TABLE IF EXISTS `simple_employees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id4147015_ymanos`@`%` SQL SECURITY DEFINER VIEW `simple_employees`  AS  select `employees`.`afm` AS `afm`,`employees`.`store_id` AS `store`,`employees`.`first_name` AS `first_name`,`employees`.`last_name` AS `last_name`,`employees`.`position` AS `position`,`employees`.`town` AS `town` from `employees` ;

-- --------------------------------------------------------

--
-- Structure for view `vehicles_stats`
--
DROP TABLE IF EXISTS `vehicles_stats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id4147015_ymanos`@`%` SQL SECURITY DEFINER VIEW `vehicles_stats`  AS  select `vehicles`.`veh_type` AS `veh_type`,avg((to_days(`bookings`.`end_date`) - to_days(`bookings`.`start_date`))) AS `duration`,sum(if((`bookings`.`pay_method` = 'Πιστωτική'),1,0)) AS `credit_card`,sum(if((`bookings`.`pay_method` = 'Μετρητά'),1,0)) AS `cash`,sum(if((`bookings`.`pay_method` = ' Τραπεζικό έμβασμα'),1,0)) AS `emvasma` from (`bookings` join `vehicles`) where (`vehicles`.`plate` = `bookings`.`plate`) group by `vehicles`.`veh_type` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `plate` (`plate`),
  ADD KEY `afm` (`afm`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`afm`);

--
-- Indexes for table `customer_email`
--
ALTER TABLE `customer_email`
  ADD PRIMARY KEY (`afm`,`email`);

--
-- Indexes for table `customer_phone`
--
ALTER TABLE `customer_phone`
  ADD PRIMARY KEY (`afm`,`phone`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `plate` (`plate`),
  ADD KEY `afm` (`afm`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`afm`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `emp_email`
--
ALTER TABLE `emp_email`
  ADD PRIMARY KEY (`afm`,`email`);

--
-- Indexes for table `emp_phone`
--
ALTER TABLE `emp_phone`
  ADD PRIMARY KEY (`afm`,`phone`);

--
-- Indexes for table `etairia`
--
ALTER TABLE `etairia`
  ADD PRIMARY KEY (`afm`);

--
-- Indexes for table `idiwtis`
--
ALTER TABLE `idiwtis`
  ADD PRIMARY KEY (`afm`);

--
-- Indexes for table `receivings`
--
ALTER TABLE `receivings`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `afm` (`afm`),
  ADD KEY `receivings_ibfk_2` (`plate`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `plate` (`plate`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_email`
--
ALTER TABLE `store_email`
  ADD PRIMARY KEY (`store_id`,`email`);

--
-- Indexes for table `store_phone`
--
ALTER TABLE `store_phone`
  ADD PRIMARY KEY (`store_id`,`phone`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`plate`),
  ADD KEY `store_id` (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `rent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`plate`) REFERENCES `vehicles` (`plate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`afm`) REFERENCES `customers` (`afm`) ON UPDATE CASCADE;

--
-- Constraints for table `customer_email`
--
ALTER TABLE `customer_email`
  ADD CONSTRAINT `customer_email_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `customers` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_phone`
--
ALTER TABLE `customer_phone`
  ADD CONSTRAINT `customer_phone_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `customers` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`rent_id`),
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`plate`) REFERENCES `vehicles` (`plate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`afm`) REFERENCES `employees` (`afm`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`store_id`) ON UPDATE CASCADE;

--
-- Constraints for table `emp_email`
--
ALTER TABLE `emp_email`
  ADD CONSTRAINT `emp_email_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `employees` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_phone`
--
ALTER TABLE `emp_phone`
  ADD CONSTRAINT `emp_phone_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `employees` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etairia`
--
ALTER TABLE `etairia`
  ADD CONSTRAINT `etairia_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `customers` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idiwtis`
--
ALTER TABLE `idiwtis`
  ADD CONSTRAINT `idiwtis_ibfk_1` FOREIGN KEY (`afm`) REFERENCES `customers` (`afm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivings`
--
ALTER TABLE `receivings`
  ADD CONSTRAINT `receivings_ibfk_1` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`rent_id`),
  ADD CONSTRAINT `receivings_ibfk_2` FOREIGN KEY (`plate`) REFERENCES `vehicles` (`plate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `receivings_ibfk_3` FOREIGN KEY (`afm`) REFERENCES `employees` (`afm`) ON UPDATE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `rents_ibfk_2` FOREIGN KEY (`plate`) REFERENCES `vehicles` (`plate`) ON UPDATE CASCADE;

--
-- Constraints for table `store_email`
--
ALTER TABLE `store_email`
  ADD CONSTRAINT `store_email_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_phone`
--
ALTER TABLE `store_phone`
  ADD CONSTRAINT `store_phone_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`store_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
