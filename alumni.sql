-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2026 at 09:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumniregs`
--

CREATE TABLE `alumniregs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `matricno` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `request_method` varchar(200) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `payment` varchar(255) NOT NULL DEFAULT 'UNPAID',
  `pay_channel` varchar(200) DEFAULT NULL,
  `tranref` longtext DEFAULT NULL,
  `pay_date` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_response` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `authorization_code` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `last4` varchar(255) DEFAULT NULL,
  `fees` decimal(12,2) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alumniregs`
--

INSERT INTO `alumniregs` (`id`, `transaction_id`, `matricno`, `service_type`, `request_method`, `amount`, `status`, `payment`, `pay_channel`, `tranref`, `pay_date`, `created_at`, `updated_at`, `gateway_response`, `currency`, `channel`, `paid_at`, `customer_email`, `authorization_code`, `card_type`, `bank`, `last4`, `fees`, `ip_address`) VALUES
(30, 'ARF0648997424', 'ICT', 'Alumni Registration Fee', 'UNDERGRADUATE', '10000', 'APPROVED', 'PAID', 'PAYSTACK', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6170301141,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ARF0648997424\",\"receipt_number\":null,\"amount\":1000000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-21T11:43:06.000Z\",\"created_at\":\"2026-05-21T11:42:57.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"197.211.38.34\",\"metadata\":{\"matricno\":\"ICT\",\"request_method\":\"UNDERGRADUATE\",\"service_type\":\"Alumni Registration Fee\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1779363783,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":25000,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_0yqle2eygk\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-21T11:43:06.000Z\",\"createdAt\":\"2026-05-21T11:42:57.000Z\",\"requested_amount\":1000000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-21T11:42:57.000Z\",\"plan_object\":[],\"subaccount\":[]}}', NULL, '2026-05-21 10:42:45', '2026-05-21 10:43:13', 'Successful', 'NGN', 'card', '2026-05-21 10:43:06', 'propanaaz@gmail.com', 'AUTH_0yqle2eygk', 'visa ', 'TEST BANK', '4081', 250.00, '197.211.38.34');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_profiles`
--

CREATE TABLE `alumni_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `graduate_category` varchar(50) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `graduation_month` varchar(2) NOT NULL,
  `graduation_year` int(11) NOT NULL,
  `brief_profile` longtext DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alumni_profiles`
--

INSERT INTO `alumni_profiles` (`id`, `matricno`, `graduate_category`, `surname`, `other_names`, `phone`, `position`, `employer`, `address`, `profile_picture`, `department`, `graduation_month`, `graduation_year`, `brief_profile`, `linkedin`, `facebook`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'SUP-ICT-1', NULL, 'UNIMED', 'ICT', '08065241920', 'ICT', 'UNIMED', 'UNIMED', 'SUP-ICT-1.jpg', 'Information Technology', '01', 2023, NULL, NULL, NULL, NULL, '2024-01-31 06:32:54', '2024-02-01 17:40:06'),
(2, 'PHS/15/0045', NULL, 'Adesida', 'Adedayo Oluwadamilola', '08147131175', 'Graduate Assistant', 'University of Medical Sciences, Ondo', 'No 1 Bello Street Agunfoye Ikorodu', 'PHS_15_0045.jpg', 'Physiology', '12', 2021, NULL, NULL, NULL, NULL, '2024-01-31 10:24:32', '2024-01-31 10:24:32'),
(3, 'BIO/16/0692', NULL, 'AJAGUNNA', 'ADEBANKE MAYOMI', '07039042747', 'Graduate Assistant', 'University of Medical Sciences, Ondo', 'Sunshine Garden Estate, Oba-Ile, Akure', 'BIO_16_0692.jpg', 'Microbiology', '07', 2021, NULL, NULL, NULL, NULL, '2024-01-31 14:37:15', '2024-01-31 14:37:15'),
(4, 'Nus/18/1610', NULL, 'Ogundola', 'Esther Temitope', '08147649430', 'Nurse', 'University College Hospital', 'Block 14 room 30 Dodan barracks Obalende Ikoyi Lagos State.', 'Nus_18_1610.jpg', 'Nursing Science', '02', 2023, NULL, NULL, NULL, NULL, '2024-11-04 16:43:36', '2024-11-04 16:43:36'),
(5, 'Bio/19/1809', NULL, 'Aminu', 'Jubril Ayomide', '08104491868', 'Tutor', 'NASFAT secondary school', 'Oba ile housing estate', 'Bio_19_1809.jpg', 'Microbiology', '11', 2024, NULL, NULL, NULL, NULL, '2024-11-06 20:11:42', '2024-11-06 20:11:42'),
(6, 'ANA/18/1378', NULL, 'Odia-Agbonifo', 'Osaretin Valentina', '09831613749', 'Medical assistant', 'Northlands', '5 copper chare, Morpeth, United Kingdom', 'ANA_18_1378.jpg', 'Anatomy', '11', 2023, NULL, NULL, NULL, NULL, '2024-12-03 19:47:53', '2024-12-03 19:47:53'),
(7, 'CEHS/21/3387', NULL, 'AYOADE', 'MOSES IGE', '09032699956', 'Lecturer', 'Interlink collect of health', 'Orile owu', 'CEHS_21_3387.jpg', 'Environmental Health Science', '12', 2024, NULL, NULL, NULL, NULL, '2024-12-09 16:32:04', '2024-12-09 16:32:04'),
(8, 'CEHS/21/3389', NULL, 'GBOLASERE', 'TIMILEYIN ABRAHAM', '08130791423', 'Environmental Health Officer', 'Oyo State Ministry Of Environment and Natural Resources', 'Oyo State Ministry of Environment and Natural Resources, Secretariat Agodi,Ibadan', 'CEHS_21_3389.jpg', 'Environmental Health Science', '12', 2024, NULL, NULL, NULL, NULL, '2024-12-09 16:38:08', '2024-12-09 16:38:08'),
(9, 'CEHS/21/3425', NULL, 'Ogbonnaya', 'Blessing', '08137676664', 'Environmental Health Officer', 'Rccg Environmental Health services', 'Moses Hall block 27.Redemption City of God', 'CEHS_21_3425.jpg', 'Environmental Health Science', '12', 2024, NULL, NULL, NULL, NULL, '2024-12-09 16:47:37', '2024-12-09 16:47:37'),
(10, 'CEHS/21/3393', NULL, 'OYETOKE', 'REBECCA MOSUNMOLA', '08130939197', 'Nill', 'Nill', '125,odd Iwo Road Ileogbo', 'CEHS_21_3393.jpg', 'Environmental Health Science', '12', 2024, NULL, NULL, NULL, NULL, '2024-12-09 17:13:39', '2024-12-09 17:13:39'),
(11, 'CEHS/21/3392', NULL, 'NWAFOR', 'OSITA INNOCENT', '07033771546', 'Self employed', 'Self organisation', 'No 22 Omaba\'s closed Ama-iruojene achalla-uno Nteje', 'CEHS_21_3392.jpg', 'Environmental Health Science', '12', 2024, NULL, NULL, NULL, NULL, '2024-12-09 22:25:45', '2024-12-09 22:25:45'),
(12, 'CEHS/21/3391', NULL, 'MATHIAS', 'NDUBUISI PETER', '08167553171', 'Unemployed', 'Self employed', '4, Oke Isokun Quarters, Mokuro Road, Ile Ife, Osun State', 'CEHS_21_3391.jpg', 'Environmental Health Science', '10', 2024, NULL, NULL, NULL, NULL, '2024-12-09 22:49:58', '2024-12-09 22:49:58'),
(13, 'NUS/17/1089', NULL, 'Olaosebikan', 'Patience Folushade', '07048641588', 'Nurse', 'Olabisi Onabanjo Teaching Hospital', 'Olabisi Onabanjo Teaching Hospital Annex, Oke-Saje Abeokuta', 'NUS_17_1089.jpg', 'Nursing Science', '10', 2022, NULL, NULL, NULL, NULL, '2025-01-05 08:33:29', '2025-01-05 08:37:27'),
(14, 'MED/16/0523', NULL, 'Ademusire', 'Olubukola oluwatosin', '08101306136', 'Medical doctor', 'Central hospital Sapele', 'No 7 Weco lane off Sapele -warri road Sapele delta state Nigeria', 'MED_16_0523.jpg', 'Medicine and Surgery', '09', 2023, NULL, NULL, NULL, NULL, '2025-02-01 22:09:06', '2025-02-01 22:09:06'),
(15, 'CPOT/22/4153', NULL, 'EHUJUO', 'CHIDOZIE EMMANUEL', '08031856725', 'Prosthetist/Orthotist', 'Lagos University Teaching Hospital', 'Ketu Lagos State Nigeria', 'CPOT_22_4153.jpg', 'Prosthetics and Orthotics', '12', 2025, 'I am a Licensed Prosthetist and Orthotist a proud Graduate of the University of Medical Sciences Ondo', 'https://www.linkedin.com/in/dozie-emmanuel', NULL, '@Dozie4444', '2026-01-11 16:27:25', '2026-01-11 16:30:35'),
(16, 'bcm/19/1989', NULL, 'Omole', 'Ifedayo Isaac', '08064714699', 'Nil', 'Nil', 'Adeyemi College of Education, Ondo', 'bcm_19_1989.jpg', 'Biochemistry', '11', 2023, NULL, NULL, NULL, NULL, '2026-01-12 18:23:00', '2026-01-12 18:23:00'),
(17, 'CPOT/22/4151', NULL, 'ALUKO', 'PETER AJIBOLA', '08157181608', 'NIL', 'NIL', '4, Isaac John Street, Igbobi Fadeyi, Lagos.', 'CPOT_22_4151.jpg', 'Prosthetics and Orthotics', '04', 2025, NULL, NULL, NULL, NULL, '2026-01-29 20:13:21', '2026-01-29 21:42:08'),
(18, 'CPOT/22/4149', NULL, 'Adeyeye', 'Oladimeji. Israel', '08085000286', 'student', 'student', 'ondo town ondo state', 'CPOT_22_4149.jpg', 'Prosthetics and Orthotics', '04', 2025, NULL, NULL, NULL, NULL, '2026-01-29 20:19:34', '2026-01-29 20:19:34'),
(19, 'CPOT/20/3043', NULL, 'ADEBANJO', 'AYOMIDE', '08112368893', 'Nil', 'Nil', 'Elite idi aba', 'CPOT_20_3043.jpg', 'Prosthetics and Orthotics', '11', 2024, NULL, NULL, NULL, NULL, '2026-02-13 18:47:30', '2026-02-13 19:30:23'),
(20, 'BIO/20/2398', NULL, 'Akinsuyi', 'EbunOluwa', '07025206464', 'NYSC', 'NYSC', 'Omole Phase 2', 'BIO_20_2398.jpg', 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', '11', 2024, NULL, NULL, NULL, NULL, '2026-02-16 01:42:43', '2026-02-16 01:42:43'),
(21, 'PUH/22/4049', NULL, 'Anuoluwa', 'Boluwatife Stephen', '07032496274', 'Lecturer', 'University of Medical Sciences Ondo', 'Ondo', 'PUH_22_4049.jpg', 'Environmental Health Science', '02', 2026, NULL, NULL, NULL, NULL, '2026-02-22 17:04:27', '2026-02-22 17:04:27'),
(22, 'Mls/20/2885', NULL, 'Mamamu', 'Prosper Aboboye', '09065838382', 'Mls Intern', 'Lily Hospital', 'Warri, delta state, Nigeria', 'Mls_20_2885.jpg', 'Medical Laboratory Science', '02', 2026, NULL, NULL, NULL, NULL, '2026-02-24 12:07:54', '2026-02-24 12:07:54'),
(23, 'Med/16/0494', NULL, 'Mamidu', 'Moyinoluwa', '08160989542', 'Medical Doctor', 'Vineway Hospital', 'No 1 Rosa b street Owo Ondo state', 'Med_16_0494.jpg', 'Medicine and Surgery', '10', 2024, NULL, NULL, NULL, NULL, '2026-03-09 12:46:20', '2026-03-09 12:48:13'),
(24, 'MLS/19/2322', NULL, 'Omotosho', 'Seyi Idowu', '08104341676', 'Intern', 'MLSCN', 'No 175,Adeyemi College road Ondo,Ondo state', 'MLS_19_2322.jpg', 'Medical Laboratory Science', '11', 2025, NULL, NULL, NULL, NULL, '2026-03-11 13:10:46', '2026-03-11 13:10:46'),
(25, 'MLS/19/2297', NULL, 'John', 'benson', '08100817430', 'Intern', 'Futa teaching hospital Akure', 'No 3 vintage estate akure', 'MLS_19_2297.jpg', 'Medical Laboratory Science', '11', 2024, NULL, NULL, NULL, NULL, '2026-03-23 15:10:36', '2026-03-23 15:36:36'),
(26, 'PHT/18/1674', NULL, 'Babatunde', 'Oyindamola Janet', '07066597086', 'Physiotherapist', 'National orthopedic hospital Igbobi  Lagos', 'Igbobi Lagos', 'PHT_18_1674.jpg', 'Physiotherapy', '09', 2023, NULL, NULL, NULL, NULL, '2026-03-26 14:59:13', '2026-03-26 14:59:13'),
(27, 'PHT/17/1149', NULL, 'Deborah', 'Samuel', '08112456790', 'Graduate', 'Public Health', '11', 'PHT_17_1149.png', 'Physiotherapy', '08', 2021, NULL, NULL, NULL, NULL, '2026-04-13 17:55:48', '2026-04-18 12:37:20'),
(28, 'SLT/20/2492', NULL, 'Afe', 'Oluchi Oluwaseyi', '08157249141', 'Self employed', 'Nil', 'Akure, ondo state', 'SLT_20_2492.jpg', 'Science Laboratory Technology', '11', 2025, NULL, NULL, NULL, NULL, '2026-04-24 00:18:08', '2026-04-24 00:18:08'),
(29, 'ICT', 'UNDERGRADUATE', 'ICT', 'ICT', '09067669557', 'Software Developer', 'University Of Medical Sciences', 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan', 'ICT.jpg', 'Information Technology', '02', 2020, NULL, NULL, NULL, NULL, '2026-05-05 21:48:39', '2026-05-05 21:48:39'),
(30, 'CPOT/22/4148', NULL, 'Adeyemo', 'Oluwafemi Sogo', '08145959271', 'Prosthetist/Orthotist', 'Giant Strides Rehabilitation Ltd', 'Lokoja', 'CPOT_22_4148.jpg', 'Prosthetics and Orthotics', '03', 2025, NULL, NULL, NULL, NULL, '2026-05-06 15:46:06', '2026-05-06 15:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `deptoptions`
--

CREATE TABLE `deptoptions` (
  `id` int(11) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `options` varchar(300) NOT NULL,
  `refdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deptoptions`
--

INSERT INTO `deptoptions` (`id`, `dept`, `options`, `refdate`) VALUES
(1, 'Biosciences and Biotechnology', 'Biosciences and Biotechnology(Animal and Environmental Biology)', '2021-05-09'),
(3, 'Biosciences and Biotechnology', 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', '2021-05-09'),
(4, 'Physics', 'Physics', '2021-05-09'),
(5, 'Physics', 'Physics(Electronics Physics)', '2021-05-09'),
(6, 'Biosciences and Biotechnology', 'Biosciences and Biotechnology(Environmental Management and Toxicology)', '2022-01-19'),
(7, 'Science Laboratory Technology', 'Science Laboratory Technology(Microbiology Techniques)', '2022-01-25'),
(8, 'Science Laboratory Technology', 'Science Laboratory Technology(Physics With Electronics Techniques)', '2022-01-25'),
(9, 'Science Laboratory Technology', 'Science Laboratory Technology(Biochemistry Techniques)', '2022-01-25'),
(10, 'Science Laboratory Technology', 'Science Laboratory Technology(Biology and Computational Biology Techniques)', '2022-01-25'),
(11, 'Science Laboratory Technology', 'Science Laboratory Technology(Industrial Mathematics and Statistics Techniques)', '2022-01-25'),
(12, 'Science Laboratory Technology', 'Science Laboratory Technology(Chemistry Techniques)', '2022-01-25'),
(13, 'Science Laboratory Technology', 'Science Laboratory Technology', '2022-01-25'),
(14, 'Mathematical and Computer Sciences', 'Mathematical and Computer Sciences', '2022-04-07'),
(15, 'Mathematical and Computer Sciences', 'Information Technology', '2022-04-07'),
(16, 'Mathematical and Computer Sciences', 'Computer Science', '2022-04-07'),
(17, 'Mathematical and Computer Sciences', 'Statistics', '2022-04-07'),
(18, 'Environmental and Occupational Health', 'Environmental Health Science', '2023-05-17'),
(19, 'Mathematical and Computer Sciences', 'Mathematics', '2023-10-10'),
(20, 'Environmental and Occupational Health', 'Environmental Health Science(B.Sc. CONVERSION)', '2023-10-10'),
(21, 'Health Information Management', 'Health Information Management(B.Sc. CONVERSION)', '2023-10-10'),
(22, 'Community Health Science', 'Community Health Science(B.Sc. CONVERSION)', '2023-10-10'),
(23, 'Community Health Science', 'Community Health Science', '2023-10-10'),
(24, 'Prosthetics and Orthotics', 'Prosthetics and Orthotics(B.Sc. CONVERSION)', '2023-10-10'),
(25, 'Prosthetics and Orthotics', 'Prosthetics and Orthotics', '2023-10-10'),
(26, 'Public Health', 'Public Health(POSTGRADUATE DIPLOMA)', '2023-10-10'),
(27, 'Public Health', 'Public Health', '2023-10-10'),
(28, 'Science Laboratory Technology', 'Science Laboratory Technology - Microbiology Techniques(B.Sc. CONVERSION)', '2023-10-10'),
(29, 'Chemistry', 'Chemistry', '2023-10-10'),
(30, 'Chemistry', 'Chemistry(Medicinal and Organic Chemistry)', '2023-10-10'),
(31, 'Public Health', 'MPH-Health Promotion and Behavioural Sciences', '2023-10-10'),
(32, 'Public Health', 'MPH-Environmental & Occupational Health', '2023-10-10'),
(33, 'Public Health', 'MPH-Epidemiology and Biostatistics', '2023-10-10'),
(34, 'Public Health', 'MPH-Health Policy and Management', '2023-10-10'),
(35, 'Public Health', 'MPH-Population, Family and Reproductive Health', '2023-10-10'),
(36, 'Public Health', 'MSc Public Health', '2023-10-10'),
(37, 'Public Health', 'MPhil/PhD Public Health', '2023-10-10'),
(38, 'Microbiology', 'Microbiology', '2023-10-10'),
(39, 'Microbiology', 'Food and Industrial Microbiology', '2023-10-10'),
(40, 'Microbiology', 'Medical Microbiology', '2023-10-10'),
(41, 'Physics', 'Physics(B.Sc. CONVERSION)', '2021-05-09'),
(42, 'Physics', 'Physics Electronics(B.Sc. CONVERSION)', '2021-05-09'),
(43, 'Audiology and Speech Therapy', 'Audiology', '2023-12-15'),
(44, 'Audiology and Speech Therapy', 'Speech & Language Therapy', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `matricno` varchar(30) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `other_names` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT 0.00,
  `pay_channel` varchar(20) DEFAULT 'PAYSTACK',
  `status` varchar(20) DEFAULT 'PENDING',
  `payment` varchar(20) DEFAULT 'UNPAID',
  `service_type` varchar(100) DEFAULT NULL,
  `request_method` varchar(50) DEFAULT NULL,
  `gateway_response` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `channel` varchar(20) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `authorization_code` varchar(100) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `last4` varchar(10) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT 0.00,
  `ip_address` varchar(45) DEFAULT NULL,
  `tranref` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `transaction_id`, `matricno`, `surname`, `other_names`, `address`, `phone`, `payment_type`, `email`, `amount`, `pay_channel`, `status`, `payment`, `service_type`, `request_method`, `gateway_response`, `currency`, `channel`, `paid_at`, `customer_email`, `authorization_code`, `card_type`, `bank`, `last4`, `fees`, `ip_address`, `tranref`, `created_at`, `updated_at`) VALUES
(1, 'FUF1965527976', 'ICT/26/0001', 'ADEBIMPE', 'AZEEZ ADENIYI', 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan', '09067669557', 'UNIMED FUF DONATION', 'adebimpeazeezniyi@gmail.com', 1000.00, 'PAYSTACK', 'PENDING', 'UNPAID', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, '127.0.0.1', NULL, '2026-05-11 11:56:35', '2026-05-11 14:17:27'),
(2, NULL, NULL, NULL, NULL, 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan', '09067669557', NULL, 'adebimpeazeezniyi@gmail.com', 4000.00, 'PAYSTACK', 'PENDING', 'UNPAID', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, '2026-05-11 13:24:43', '2026-05-11 13:24:43'),
(3, 'FUF1422929435', 'ICT/26/0001', 'ADEBIMPE', 'AZEEZ ADENIYI', 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan', '09067669557', 'UNIMED FUF DONATION', 'adebimpeazeezniyi@gmail.com', 2000.00, 'PAYSTACK', 'APPROVED', 'PAID', NULL, NULL, NULL, NULL, NULL, '2026-05-11 14:32:02', 'adebimpeazeezniyi@gmail.com', NULL, NULL, NULL, NULL, 0.00, NULL, '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6135290068,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"FUF1422929435\",\"receipt_number\":null,\"amount\":200000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-11T14:31:59.000Z\",\"created_at\":\"2026-05-11T14:31:53.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.114.25.106\",\"metadata\":{\"matricno\":\"ICT\\/26\\/0001\",\"surname\":\"ADEBIMPE\",\"other_names\":\"AZEEZ ADENIYI\",\"phone\":\"09067669557\",\"address\":\"Sw9\\/1575 Temidire Street Adifase Area Apata Ibadan\",\"payment_type\":\"UNIMED FUF DONATION\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778509916,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":3000,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_dyv57k8kao\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":363722822,\"first_name\":null,\"last_name\":null,\"email\":\"adebimpeazeezniyi@gmail.com\",\"customer_code\":\"CUS_7pj7m18lcygamjs\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-11T14:31:59.000Z\",\"createdAt\":\"2026-05-11T14:31:53.000Z\",\"requested_amount\":200000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-11T14:31:53.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2026-05-11 13:31:53', '2026-05-11 13:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `due_requests`
--

CREATE TABLE `due_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `matricno` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `request_method` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `payment` varchar(255) NOT NULL DEFAULT 'UNPAID',
  `pay_channel` varchar(200) DEFAULT NULL,
  `tranref` longtext DEFAULT NULL,
  `pay_date` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_response` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `authorization_code` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `last4` varchar(255) DEFAULT NULL,
  `fees` decimal(12,2) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `due_requests`
--

INSERT INTO `due_requests` (`id`, `transaction_id`, `matricno`, `service_type`, `request_method`, `amount`, `status`, `payment`, `pay_channel`, `tranref`, `pay_date`, `created_at`, `updated_at`, `gateway_response`, `currency`, `channel`, `paid_at`, `customer_email`, `authorization_code`, `card_type`, `bank`, `last4`, `fees`, `ip_address`) VALUES
(1, 'ADP21842736812', 'ICT', 'Annual Due', '2023', '5000', 'PENDING', 'UNPAID', 'PAYSTACK', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6125898667,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ADP0551665452\",\"receipt_number\":null,\"amount\":500000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-08T19:07:59.000Z\",\"created_at\":\"2026-05-08T19:07:51.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"102.89.83.231\",\"metadata\":{\"matricno\":\"ICT\",\"request_method\":\"2023\",\"service_type\":\"Annual Due\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778267277,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":17500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_cbtfqe1u5p\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-08T19:07:59.000Z\",\"createdAt\":\"2026-05-08T19:07:51.000Z\",\"requested_amount\":500000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-08T19:07:51.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '', '2026-05-07 13:09:21', '2026-05-08 18:33:49', 'Successful', 'NGN', 'card', '2026-05-08 18:07:59', 'propanaaz@gmail.com', 'AUTH_cbtfqe1u5p', 'visa ', 'TEST BANK', '4081', 175.00, '102.89.83.231'),
(23, 'ADP0922198810', 'ICT', 'Annual Due', '2020', '5000', 'APPROVED', 'PAID', 'PAYSTACK', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6126138135,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ADP0922198810\",\"receipt_number\":null,\"amount\":500000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-08T20:44:20.000Z\",\"created_at\":\"2026-05-08T20:44:12.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"102.89.83.231\",\"metadata\":{\"matricno\":\"ICT\",\"request_method\":\"2020\",\"service_type\":\"Annual Due\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778273058,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":17500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_ef1n1ab84g\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-08T20:44:20.000Z\",\"createdAt\":\"2026-05-08T20:44:12.000Z\",\"requested_amount\":500000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-08T20:44:12.000Z\",\"plan_object\":[],\"subaccount\":[]}}', NULL, '2026-05-08 19:09:03', '2026-05-08 19:44:25', 'Successful', 'NGN', 'card', '2026-05-08 19:44:20', 'propanaaz@gmail.com', 'AUTH_ef1n1ab84g', 'visa ', 'TEST BANK', '4081', 175.00, '102.89.83.231'),
(24, 'ADP1593222385', 'ICT', 'Annual Due', '2021', '5000', 'APPROVED', 'PAID', 'PAYSTACK', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6126146762,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ADP1593222385\",\"receipt_number\":null,\"amount\":500000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-08T20:48:02.000Z\",\"created_at\":\"2026-05-08T20:47:57.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"102.89.83.231\",\"metadata\":{\"matricno\":\"ICT\",\"request_method\":\"2021\",\"service_type\":\"Annual Due\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778273280,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":17500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_vutilv5e6l\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-08T20:48:02.000Z\",\"createdAt\":\"2026-05-08T20:47:57.000Z\",\"requested_amount\":500000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-08T20:47:57.000Z\",\"plan_object\":[],\"subaccount\":[]}}', NULL, '2026-05-08 19:47:15', '2026-05-08 19:48:05', 'Successful', 'NGN', 'card', '2026-05-08 19:48:02', 'propanaaz@gmail.com', 'AUTH_vutilv5e6l', 'visa ', 'TEST BANK', '4081', 175.00, '102.89.83.231');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `venue` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `event_time`, `venue`, `image`, `created_at`, `updated_at`) VALUES
(1, 'One Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:19', '2026-05-28 05:57:18'),
(2, 'Two Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:20', '2026-05-28 05:57:18'),
(3, 'Three Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:21', '2026-05-28 05:57:18'),
(4, 'Four Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:22', '2026-05-28 05:57:18'),
(5, 'Five Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:23', '2026-05-28 05:57:18'),
(6, 'Sixth Alumni News Event', '<p>Event GOnna be lit</p>', '2026-05-28', '07:57:00', 'Odosida Campus', '1779951438.png', '2026-05-28 05:57:24', '2026-05-28 05:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `faculties_dept`
--

CREATE TABLE `faculties_dept` (
  `id` int(11) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept_id` varchar(12) NOT NULL,
  `faculty_id` varchar(12) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `refDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Faculties and Dept';

--
-- Dumping data for table `faculties_dept`
--

INSERT INTO `faculties_dept` (`id`, `dept`, `faculty`, `dept_id`, `faculty_id`, `display_name`, `refDate`) VALUES
(1, 'Health Information Management', 'Allied Health Sciences', 'HIM', 'FAHS', 'Health Information Management', '2024-02-04'),
(2, 'Human Nutrition and Dietetics', 'Allied Health Sciences', 'HND', 'FAHS', 'Human Nutrition and Dietetics', '2024-02-04'),
(3, 'Medical Laboratory Science', 'Allied Health Sciences', 'MLS', 'FAHS', 'Medical Laboratory Science', '2024-02-04'),
(4, 'Radiography and Radiation Science', 'Allied Health Sciences', 'RGR', 'FAHS', 'Radiography and Radiation Science', '2024-02-04'),
(5, 'Pharmacology', 'Basic Clinical Sciences ', 'PHA', 'FBCS', 'Pharmacology', '2024-02-04'),
(6, 'Anatomy', 'Basic Medical Sciences', 'ANA', 'FBMS', 'Anatomy', '2024-02-04'),
(7, 'Biochemistry', 'Basic Medical Sciences', 'BCM', 'FBMS', 'Biochemistry', '2024-02-04'),
(8, 'Physiology', 'Basic Medical Sciences', 'PHS', 'FBMS', 'Physiology', '2024-02-04'),
(9, 'Medicine and Surgery', 'Clinical Sciences', 'MED', 'FCSC', 'Medicine and Surgery', '2024-02-04'),
(10, 'Dentistry', 'Dentistry', 'DEN', 'FBDS', 'Dentistry', '2024-02-04'),
(11, 'Community Health Science', 'Institute of Community Health Innovation and Development', 'CHS', 'ICHD', 'Community Health Science', '2024-02-04'),
(12, 'Audiology', 'Medical Rehabilitation', 'AUD', 'FMRH', 'Audiology', '2024-02-04'),
(13, 'Occupational Therapy', 'Medical Rehabilitation', 'OTP', 'FMRH', 'Occupational Therapy', '2024-02-04'),
(14, 'Physiotherapy', 'Medical Rehabilitation', 'PHT', 'FMRH', 'Physiotherapy', '2024-02-04'),
(15, 'Prosthetics and Orthotics', 'Medical Rehabilitation', 'POT', 'FMRH', 'Prosthetics and Orthotics', '2024-02-04'),
(16, 'Nursing Science', 'Nursing Science', 'NUS', 'FNUS', 'Nursing Science', '2024-02-04'),
(17, 'Environmental Health Science', 'Public Health', 'EHS', 'SPUH', 'Environmental Health Science', '2024-02-04'),
(18, 'Biosciences and Biotechnology(Animal and Environmental Biology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology(Animal and Environmental Biology)', '2024-02-04'),
(19, 'Biosciences and Biotechnology(Environmental Management and Toxicology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology(Environmental Management and Toxicology)', '2024-02-04'),
(20, 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', '2024-02-04'),
(21, 'Chemistry', 'Sciences', 'CHE', 'FOSC', 'Chemistry', '2024-02-04'),
(22, 'Computer Science', 'Sciences', 'CSC', 'FOSC', 'Computer Science', '2024-02-04'),
(23, 'Food Science', 'Sciences', 'FSC', 'FOSC', 'Food Science', '2024-02-04'),
(24, 'Industrial Mathematics', 'Sciences', 'MAT', 'FOSC', 'Industrial Mathematics', '2024-02-04'),
(25, 'Medical Physics', 'Sciences', 'PHY', 'FOSC', 'Medical Physics', '2024-02-04'),
(26, 'Medicinal Chemistry', 'Sciences', 'CHE', 'FOSC', 'Medicinal Chemistry', '2024-02-04'),
(27, 'Microbiology', 'Sciences', 'MCB', 'FOSC', 'Microbiology', '2024-02-04'),
(28, 'Science Laboratory Technology', 'Sciences', 'SLT', 'FOSC', 'Science Laboratory Technology', '2024-02-04'),
(29, 'Community Health Science(B.Sc. CONVERSION)', 'Public Health', 'CCHS', 'SPUH', 'Community Health Science(B.Sc. CONVERSION)', '2025-11-27'),
(30, 'Environmental Health Science(B.Sc. CONVERSION)', 'Public Health', 'CEHS', 'SPUH', 'Environmental Health Science(B.Sc. CONVERSION)', '2025-11-27'),
(31, 'Health Information Management(B.Sc. CONVERSION)', 'Allied Health Sciences', 'CHIM', 'FAHS', 'Health Information Management(B.Sc. CONVERSION)', '2025-11-27'),
(32, 'Physics(B.Sc. CONVERSION)', 'Sciences', 'CPHY', 'FOSC', 'Physics(B.Sc. CONVERSION)', '2025-11-27'),
(33, 'Prosthetics and Orthotics(B.Sc. CONVERSION)', 'Medical Rehabilitation', 'CPOT', 'FMRH', 'Prosthetics and Orthotics(B.Sc. CONVERSION)', '2025-11-27'),
(34, 'Science Laboratory Technology - Microbiology Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Microbiology Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(35, 'Science Laboratory Technology - Biology and Computational Biology Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Biology and Computational Biology Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(36, 'Science Laboratory Technology - Physics With Electronics Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Physics With Electronics Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(37, 'Science Laboratory Technology - Chemistry Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Chemistry Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(38, 'Microbiology(B.Sc. CONVERSION)', 'Sciences', 'CMCB', 'FOSC', 'Microbiology(B.Sc. CONVERSION)', '2025-11-27'),
(39, 'Transitional-Doctor of Physiotherapy', 'Medical Rehabilitation', 'CPHT', 'FMRH', 'Transitional-Doctor of Physiotherapy', '2025-11-27'),
(40, 'Dental Therapy(B.Sc. CONVERSION)', 'Dentistry', 'CDEN', 'FBDS', 'Dental Therapy(B.Sc. CONVERSION)', '2025-11-27'),
(41, 'Dental Technology(B.Sc. CONVERSION)', 'Dentistry', 'CDEN', 'FBDS', 'Dental Technology(B.Sc. CONVERSION)', '2025-11-27'),
(42, 'Science Laboratory Technology - Biochemistry Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Biochemistry Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(43, 'Science Laboratory Technology - Industrial Mathematics and Statistics Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Industrial Mathematics and Statistics Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(44, 'Science Laboratory Technology - Physics Electronics Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Physics Electronics Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(45, 'Science Laboratory Technology - Biology Techniques(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology - Biology Techniques(B.Sc. CONVERSION)', '2025-11-27'),
(46, 'Computer Science(B.Sc. CONVERSION)', 'Sciences', 'CCSC', 'FOSC', 'Computer Science(B.Sc. CONVERSION)', '2025-11-27'),
(47, 'Science Laboratory Technology(B.Sc. CONVERSION)', 'Sciences', 'CSLT', 'FOSC', 'Science Laboratory Technology(B.Sc. CONVERSION)', '2025-11-27'),
(48, 'Doctor Of Pharmacy', 'Pharmacy', 'PCY', 'PHARM', 'Doctor Of Pharmacy', '2025-11-27'),
(49, 'Dental Therapy', 'Dentistry', 'DEN', 'FDSC', 'Dental Therapy', '2025-11-27'),
(50, 'Doctor Of Physiotherapy', 'Medical Rehabilitation', 'PHT', 'FMRH', 'Doctor Of Physiotherapy', '2025-11-27'),
(51, 'Speech & Language Therapy', 'Medical Rehabilitation', 'AST', 'FMRH', 'Speech & Language Therapy', '2025-11-27'),
(52, 'Human Nutrition and Dietetics', 'Allied Health Sciences', 'HND', 'FAHS', 'Human Nutrition and Dietetics', '2025-11-27'),
(53, 'Health Care Administration & Hospital Management', 'Allied Health Sciences', 'HAH', 'FAHS', 'Health Care Administration & Hospital Management', '2025-11-27'),
(54, 'Complementary and Alternative Medicine', 'Allied Health Sciences', 'CAM', 'FAHS', 'Complementary and Alternative Medicine', '2025-11-27'),
(55, 'Dental Technology', 'Dentistry', 'DEN', 'FDSC', 'Dental Technology', '2025-11-27'),
(56, 'Information Technology', 'Sciences', 'IFT', 'FOSC', 'Information Technology', '2025-11-27'),
(57, 'Community Health', 'Public Health', 'CHS', 'SPUH', 'Community Health', '2024-02-04'),
(58, 'Complementary & Alternative Medicine', 'Allied Health Sciences', 'CAM', 'FAHS', 'Complementary & Alternative Medicine', '2025-11-27'),
(59, 'Environmental Management & Toxicology', 'Sciences', 'EMT', 'FOSC', 'Environmental Management & Toxicology', '2024-02-04'),
(60, 'Health Care Administration & Hospital Mgt', 'Allied Health Sciences', 'HAH', 'FAHS', 'Health Care Administration & Hospital Mgt', '2025-11-27'),
(61, 'Medicine & Surgery', 'Clinical Sciences', 'MED', 'FCSC', 'Medicine & Surgery', '2025-11-27'),
(62, 'Nursing/Nursing Science', 'Nursing Science', 'NUS', 'FNUS', 'Nursing/Nursing Science', '2025-11-27'),
(63, 'Plant Biology & Biotechnology', 'Sciences', 'PBT', 'FOSC', 'Plant Biology & Biotechnology', '2025-11-27'),
(64, 'Prosthetics & Orthotics', 'Medical Rehabilitation', 'POT', 'FMRH', 'Prosthetics & Orthotics', '2025-11-27'),
(65, 'Radiography & Radiation Science', 'Allied Health Sciences', 'RGR', 'FAHS', 'Radiography & Radiation Science', '2024-02-04'),
(66, 'Speech Language Therapy', 'Medical Rehabilitation', 'AST', 'FMRH', 'Speech Language Therapy', '2025-11-27'),
(67, 'Nutrition & Dietetics', 'Allied Health Sciences', 'HND', 'FAHS', 'Nutrition & Dietetics', '2025-11-27'),
(68, 'Medical Sciences', 'Institute of Advanced Clinical Sciences Education', 'MSC', 'IACSE', 'Medical Sciences', '2025-11-28'),
(69, 'Maternal Neonatal and Child Health Nursing', 'Nursing Science', 'NUS', 'FNUS', 'Maternal Neonatal and Child Health Nursing', '2025-11-28'),
(70, 'MPhil/PhD Environmental Health', 'Public Health', 'EHS', 'SPUH', 'MPhil/PhD Environmental Health', '2025-11-28'),
(71, 'Community Health(PGD)', 'Public Health', 'COM', 'SPUH', 'Community Health(PGD)', '2025-11-28'),
(72, 'Community Health Science(Masters)', 'Public Health', 'COM', 'SPUH', 'Community Health Science(Masters)', '2025-11-28'),
(73, 'Institute of Sports Science and Medicine(Exercise and Sports Science)', 'Multidisciplinary Studies', 'ESS', 'FMDS', 'Institute of Sports Science and Medicine(Exercise and Sports Science)', '2025-11-28'),
(74, 'MPH-Epidemiology and Biostatistics', 'Public Health', 'PUH', 'SPUH', 'MPH-Epidemiology and Biostatistics', '2025-11-28'),
(75, 'Computer Science(B.Sc. CONVERSION)', 'Sciences', 'CCSC', 'FOSC', 'Computer Science(B.Sc. CONVERSION)', '2025-12-04'),
(76, 'Environmental Health(PGD)', 'Public Health', 'EHS', 'SPUH', 'Environmental Health(PGD)', '2025-11-28'),
(77, 'MSc-Health Information Management', 'Allied Health Sciences', 'HIM', 'FAHS', 'MSc-Health Information Management', '2026-03-01'),
(78, 'MSc-Medical Laboratory Science(Blood Transfusion Science and Hematology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'MSc-Medical Laboratory Science(Blood Transfusion Science and Hematology)', '2026-03-01'),
(79, 'MSc-Medical Laboratory Science(Chemical Pathology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'MSc-Medical Laboratory Science(Chemical Pathology)', '2026-03-01'),
(80, 'MSc-Medical Laboratory Science(Histopathology and Cytopathology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'MSc-Medical Laboratory Science(Histopathology and Cytopathology)', '2026-03-01'),
(81, 'MSc-Medical Laboratory Science(Public Health Microbiology and Parasitology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'MSc-Medical Laboratory Science(Public Health Microbiology and Parasitology)', '2026-03-01'),
(82, 'Medical Laboratory Science(Histopathology and Cytopathology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'Medical Laboratory Science(Histopathology and Cytopathology)', '2026-03-01'),
(83, 'Medical Laboratory Science(Blood Transfusion Science and Hematology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'Medical Laboratory Science(Blood Transfusion Science and Hematology)', '2026-03-01'),
(84, 'PhD-Medical Laboratory Science(Public Health Microbiology and Parasitology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'PhD-Medical Laboratory Science(Public Health Microbiology and Parasitology)', '2026-03-01'),
(85, 'PhD-Medical Laboratory Science(Chemical Pathology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'PhD-Medical Laboratory Science(Chemical Pathology)', '2026-03-01'),
(86, 'PhD-Medical Laboratory Science(Blood Transfusion Science and Hematology)', 'Allied Health Sciences', 'MLS', 'FAHS', 'PhD-Medical Laboratory Science(Blood Transfusion Science and Hematology)', '2026-03-01'),
(87, 'MSc-Anatomy', 'Basic Medical Sciences', 'ANA', 'FBMS', 'MSc-Anatomy', '2026-03-01'),
(88, 'MSc-Biochemistry', 'Basic Medical Sciences', 'BCM', 'FBMS', 'MSc-Biochemistry', '2026-03-01'),
(89, 'MSc-Physiology', 'Basic Medical Sciences', 'PHS', 'FBMS', 'MSc-Physiology', '2026-03-01'),
(90, 'Master of Business Administration(Health Management)', 'Health Law and Humanities', 'MBA', 'FHLH', 'Master of Business Administration(Health Management)', '2026-03-01'),
(91, 'MSc-Healthcare Entrepreneurship and Innovation Management', 'Health Law and Humanities', 'HEI', 'FHLH', 'MSc-Healthcare Entrepreneurship and Innovation Management', '2026-03-01'),
(92, 'MSc-Clinical Psychology', 'Health Law and Humanities', 'PSY', 'FHLH', 'MSc-Clinical Psychology', '2026-03-01'),
(93, 'MSc-Mental Health(Addiction Studies)', 'Clinical Sciences', 'MHT', 'FCSC', 'MSc-Mental Health(Addiction Studies)', '2026-03-01'),
(94, 'MPhil/PhD-Healthcare Entrepreneurship and Innovation Management', 'Health Law and Humanities', 'HEI', 'FHLH', 'MPhil/PhD-Healthcare Entrepreneurship and Innovation Management', '2026-03-01'),
(95, 'PGD-Healthcare Entrepreneurship and Innovation Management', 'Health Law and Humanities', 'HEI', 'FHLH', 'PGD-Healthcare Entrepreneurship and Innovation Management', '2026-03-01'),
(96, 'PhD-Healthcare Entrepreneurship and Innovation Management', 'Health Law and Humanities', 'HEI', 'FHLH', 'PhD-Healthcare Entrepreneurship and Innovation Management', '2026-03-01'),
(97, 'Health Law and Policy', 'Institute of Advanced Clinical Sciences Education', 'HLP', 'IACSE', 'Health Law and Policy', '2026-03-01'),
(98, 'MSc-Health Law and Policy', 'Institute of Advanced Clinical Sciences Education', 'HLP', 'IACSE', 'MSc-Health Law and Policy', '2026-03-01'),
(99, 'PhD-Community Medicine and Public Health', 'Institute of Advanced Clinical Sciences Education', 'CMP', 'IACSE', 'PhD-Community Medicine and Public Health', '2026-03-01'),
(100, 'Physics(Medical Physics)', 'Sciences', 'PHY', 'FOSC', 'Physics(Medical Physics)', '2026-03-01'),
(101, 'Physics(Health and environmental Physics)', 'Sciences', 'PHY', 'FOSC', 'Physics(Health and environmental Physics)', '2026-03-01'),
(102, 'Physics(Electronics and Communication)', 'Sciences', 'PHY', 'FOSC', 'Physics(Electronics and Communication)', '2026-03-01'),
(103, 'PhD-Chemistry(Medicinal and Organic Chemistry)', 'Sciences', 'CHE', 'FOSC', 'PhD-Chemistry(Medicinal and Organic Chemistry)', '2026-03-01'),
(104, 'PGD-Microbiology', 'Sciences', 'MCB', 'FOSC', 'PGD-Microbiology', '2026-03-01'),
(105, 'MSc-Physics(Medical Physics)', 'Sciences', 'PHY', 'FOSC', 'MSc-Physics(Medical Physics)', '2026-03-01'),
(106, 'MSc-Physics(Health and environmental Physics)', 'Sciences', 'PHY', 'FOSC', 'MSc-Physics(Health and environmental Physics)', '2026-03-01'),
(107, 'MSc-Physics(Electronics and Communication)', 'Sciences', 'PHY', 'FOSC', 'MSc-Physics(Electronics and Communication)', '2026-03-01'),
(108, 'MSc-Physical and Computational Chemistry', 'Sciences', 'CHE', 'FOSC', 'MSc-Physical and Computational Chemistry', '2026-03-01'),
(110, 'MSc-Microbiology(Food and Industrial Microbiology)', 'Sciences', 'MCB', 'FOSC', 'MSc-Microbiology(Food and Industrial Microbiology)', '2026-03-01'),
(111, 'MSc-Medicinal and Organic Chemistry', 'Sciences', 'CHE', 'FOSC', 'MSc-Medicinal and Organic Chemistry', '2026-03-01'),
(112, 'MSc-Chemistry(Industrial Chemistry)', 'Sciences', 'CHE', 'FOSC', 'MSc-Chemistry(Industrial Chemistry)', '2026-03-01'),
(113, 'MSc-Analytical and Environmental Chemistry', 'Sciences', 'CHE', 'FOSC', 'MSc-Analytical and Environmental Chemistry', '2026-03-01'),
(114, 'Microbiology(Food and Industrial Microbiology)', 'Sciences', 'MCB', 'FOSC', 'Microbiology(Food and Industrial Microbiology)', '2026-03-01'),
(115, 'MSc-Epidemiology and Biostatistics', 'Public Health', 'PUH', 'SPUH', 'MSc-Epidemiology and Biostatistics', '2026-03-01'),
(116, 'MSc-Health Promotion and Behavioural Sciences', 'Public Health', 'PUH', 'SPUH', 'MSc-Health Promotion and Behavioural Sciences', '2026-03-01'),
(117, 'MSc-Population, Family & Reproductive Health', 'Public Health', 'PUH', 'SPUH', 'MSc-Population, Family & Reproductive Health', '2026-03-01'),
(118, 'MSc-Community Health Science(Community Maternal and Child Health Care)', 'Public Health', 'CHS', 'SPUH', 'MSc-Community Health Science(Community Maternal and Child Health Care)', '2026-03-01'),
(119, 'MSc-Community Health Science(Community Health Education)', 'Public Health', 'CHS', 'SPUH', 'MSc-Community Health Science(Community Health Education)', '2026-03-01'),
(120, 'MPhil/PhD-Public Health(Health Promotion and Behavioural Sciences)', 'Public Health', 'PUH', 'SPUH', 'MPhil/PhD-Public Health(Health Promotion and Behavioural Sciences)', '2026-03-01'),
(121, 'MSc-Nursing Science(Nursing Education)', 'Nursing Science', 'NUS', 'FNUS', 'MSc-Nursing Science(Nursing Education)', '2026-03-01'),
(122, 'PGD-Nursing Education', 'Nursing Science', 'NUS', 'FNUS', 'PGD-Nursing Education', '2026-03-01'),
(123, 'PhD-Nursing Science(Maternal Neonatal and Child Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'PhD-Nursing Science(Maternal Neonatal and Child Health Nursing)', '2026-03-01'),
(124, 'MSc-Nursing Science(Maternal Neonatal and Child Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'MSc-Nursing Science(Maternal Neonatal and Child Health Nursing)', '2026-03-01'),
(125, 'MSc-Nursing Science(Adult Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'MSc-Nursing Science(Adult Health Nursing)', '2025-11-28'),
(126, 'MSc-Nursing Science(Community Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'MSc-Nursing Science(Community Health Nursing)', '2025-11-28'),
(127, 'MSc-Exercise and Sports Science', 'Multidisciplinary Studies', 'ESS', 'FMDS', 'MSc-Exercise and Sports Science', '2026-03-01'),
(128, 'PhD-Exercise and Sports Science', 'Multidisciplinary Studies', 'ESS', 'FMDS', 'PhD-Exercise and Sports Science', '2026-03-01'),
(129, 'PhD-Medical Science', 'Institute of Advanced Clinical Sciences Education', 'MSC', 'IACSE', 'PhD-Medical Science', '2026-03-01'),
(130, 'PhD-Surgical Science', 'Institute of Advanced Clinical Sciences Education', 'SSC', 'IACSE', 'PhD-Surgical Science', '2026-03-01'),
(131, 'MSc-Sports and Exercise Medicine', 'Multidisciplinary Studies', 'ESS', 'FMDS', 'MSc-Sports and Exercise Medicine', '2026-03-01'),
(132, 'Biosciences and Biotechnology(Genetics and Biotechnology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology(Genetics and Biotechnology)', '2026-03-01'),
(133, 'Biosciences and Biotechnology(Molecular Parasitology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology(Molecular Parasitology)', '2026-03-01'),
(134, 'Mathematics(Numerical Analysis)', 'Sciences', 'MTH', 'FOSC', 'Mathematics(Numerical Analysis)', '2026-03-01'),
(135, 'Microbiology(Environmental Microbiology)', 'Sciences', 'MCB', 'FOSC', 'Microbiology(Environmental Microbiology)', '2026-03-01'),
(136, 'Microbiology(Medical Microbiology)', 'Sciences', 'MCB', 'FOSC', 'Microbiology(Medical Microbiology)', '2026-03-01'),
(137, 'PhD-Public Health(Health Promotion and Behavioural Sciences)', 'Public Health', 'PUH', 'SPUH', 'PhD-Public Health(Health Promotion and Behavioural Sciences)', '2026-03-01'),
(138, 'MPH-Health Promotion and Behavioural Sciences', 'Public Health', 'PUH', 'SPUH', 'MPH-Health Promotion and Behavioural Sciences', '2026-03-01'),
(139, 'MPhil/PhD-Community Health Science', 'Public Health', 'CHS', 'SPUH', 'MPhil/PhD-Community Health Science', '2026-03-01'),
(140, 'MSc-Physiotherapy', 'Medical Rehabilitation', 'PHT', 'FMRH', 'MSc-Physiotherapy', '2026-03-01'),
(141, 'PhD-Health Law and Policy', 'Institute of Advanced Clinical Sciences Education', 'HLP', 'IACSE', 'PhD-Health Law and Policy', '2026-03-01'),
(142, 'MPhil/PhD-Nursing Science(Community Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'MPhil/PhD-Nursing Science(Community Health Nursing)', '2025-11-28'),
(143, 'MPhil/PhD-Science(Medical Surgical/Adult Health Nursing)', 'Nursing Science', 'NUS', 'FNUS', 'MPhil/PhD-Science(Medical Surgical/Adult Health Nursing)', '2026-03-01'),
(144, 'MPH-Health Policy and Management', 'Public Health', 'PUH', 'SPUH', 'MPH-Health Policy and Management', '2026-03-01'),
(145, 'MPH-Population, Family & Reproductive Health', 'Public Health', 'PUH', 'SPUH', 'MPH-Population, Family & Reproductive Health', '2026-03-01'),
(146, 'MSc-Community Health Science', 'Public Health', 'CHS', 'SPUH', 'MSc-Community Health Science', '2026-03-01'),
(147, 'Centre for Herbal Medicine and Drug Discovery(Herbal Medicine)', 'Multidisciplinary Studies', 'HRM', 'FMDS', 'Centre for Herbal Medicine and Drug Discovery(Herbal Medicine)', '2026-03-01'),
(148, 'DrPH-Public Health', 'Public Health', 'PUH', 'SPUH', 'DrPH-Public Health', '2026-03-01'),
(150, 'MSc-Community Health Science(Community Special Clinical Practice)', 'Public Health', 'CHS', 'SPUH', 'MSc-Community Health Science(Community Special Clinical Practice)', '2026-03-01'),
(151, 'MSc-Community Health Science(Primary Health Care Operations)', 'Public Health', 'CHS', 'SPUH', 'MSc-Community Health Science(Primary Health Care Operations)', '2026-03-01'),
(152, 'MSc-Environmental Health(Environmental Epidemiology(EEP))', 'Public Health', 'PUH', 'SPUH', 'MSc-Environmental Health(Environmental Epidemiology(EEP))', '2025-11-28'),
(153, 'MSc-Environmental Health(Pollution Control Management(PCM))', 'Public Health', 'PUH', 'SPUH', 'MSc-Environmental Health(Pollution Control Management(PCM))', '2025-11-28'),
(154, 'MSc-Environmental Health(Solid and Special Waste Management(SWM))', 'Public Health', 'PUH', 'SPUH', 'MSc-Environmental Health(Solid and Special Waste Management(SWM))', '2025-11-28'),
(155, 'MSc-Environmental Health(Vector Control and Pest Management(VPM))', 'Public Health', 'PUH', 'SPUH', 'MSc-Environmental Health(Vector Control and Pest Management(VPM))', '2025-11-28'),
(156, 'MScPH-(Environmental Health)', 'Public Health', 'PUH', 'SPUH', 'MScPH-(Environmental Health)', '2026-03-01'),
(157, 'PGD-Public Health', 'Public Health', 'PUH', 'SPUH', 'PGD-Public Health', '2026-03-01'),
(158, 'Biosciences and Biotechnology-AEB(Genetics and Biotechnology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology-AEB(Genetics and Biotechnology)', '2026-03-01'),
(159, 'Biosciences and Biotechnology-AEB(Molecular Parasitology)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology-AEB(Molecular Parasitology)', '2024-02-04'),
(160, 'Biosciences and Biotechnology-PBT(Biosystematics/ Taxonomy)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology-PBT(Biosystematics/ Taxonomy)', '2026-03-01'),
(161, 'Biosciences and Biotechnology-PBT(Genetics)', 'Sciences', 'BIO', 'FOSC', 'Biosciences and Biotechnology-PBT(Genetics)', '2026-03-01'),
(162, 'Chemistry(Analytical and Environmental Chemistry)', 'Sciences', 'CHE', 'FOSC', 'Chemistry(Analytical and Environmental Chemistry)', '2026-03-01'),
(163, 'MSc-Biosciences and Biotechnology-AEB(Environmental Biology and Toxicology)', 'Sciences', 'BIO', 'FOSC', 'MSc-Biosciences and Biotechnology-AEB(Environmental Biology and Toxicology)', '2026-03-01'),
(166, 'PGD-Environmental Health', 'Public Health', 'EHS', 'SPUH', 'PGD-Environmental Health', '2026-03-01'),
(167, 'PhD-Public Health(Epidemiology and Biostatistics)', 'Public Health', 'PUH', 'SPUH', 'PhD-Public Health(Epidemiology and Biostatistics)', '2026-03-01'),
(168, 'PhD-Public Health(Epidemiology)', 'Public Health', 'PUH', 'SPUH', 'PhD-Public Health(Epidemiology)', '2026-03-01'),
(169, 'PhD-Environmental Health(Environmental Epidemiology(EEP))', 'Public Health', 'PUH', 'SPUH', 'PhD-Environmental Health(Environmental Epidemiology(EEP))', '2026-03-01'),
(170, 'Public Health(PhD CourseWork)', 'Public Health', 'PUH', 'SPUH', 'Public Health(PhD CourseWork)', '2026-03-01'),
(171, 'Public Health(PhD Thesis)', 'Public Health', 'PUH', 'SPUH', 'Public Health(PhD Thesis)', '2026-03-01'),
(172, 'Biochemisty(Environmental Toxicology)', 'Basic Medical Sciences', 'BCM', 'FBMS', 'Biochemisty(Environmental Toxicology)', '2026-03-01'),
(173, 'MPH-(Environmental Health)', 'Public Health', 'PUH', 'SPUH', 'MPH-(Environmental Health)', '2026-03-01'),
(175, 'PGD-Environmental Health', 'Public Health', 'EHS', 'SPUH', 'PGD-Environmental Health', '2026-03-01'),
(176, 'MPH-(Environmental  Health)', 'Public Health', 'PUH', 'SPUH', 'MPH-(Environmental  Health)', '2025-11-28'),
(177, 'BIOSCIENCES AND BIOTECHNOLOGY(Environmental Biology and Toxicology)', 'Sciences', 'BIO', 'FOSC', 'BIOSCIENCES AND BIOTECHNOLOGY(Environmental Biology and Toxicology)', '2026-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `faculties_dept_old`
--

CREATE TABLE `faculties_dept_old` (
  `id` int(11) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept_id` varchar(12) NOT NULL,
  `faculty_id` varchar(12) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `refDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Faculties and Dept';

--
-- Dumping data for table `faculties_dept_old`
--

INSERT INTO `faculties_dept_old` (`id`, `dept`, `faculty`, `dept_id`, `faculty_id`, `display_name`, `refDate`) VALUES
(1, 'Medicine and Surgery', 'Clinical Sciences', '1', '1', 'Medicine and Surgery', '0000-00-00'),
(2, 'Dentistry', 'Dentistry', '1', '2', 'Dentistry', '0000-00-00'),
(3, 'Anatomy', 'Basic Medical Sciences', '1', '3', 'Anatomy', '0000-00-00'),
(4, 'Biochemistry', 'Basic Medical Sciences', '2', '3', 'Biochemistry', '0000-00-00'),
(5, 'Physiology', 'Basic Medical Sciences', '3', '3', 'Physiology', '0000-00-00'),
(6, 'Nursing Science', 'Nursing Science', '1', '7', 'Nursing Science', '0000-00-00'),
(7, 'Physiotherapy', 'Medical Rehabilitation', '1', '12', 'Doctor of Physiotherapy', '0000-00-00'),
(8, 'Physics(Electronics Physics)', 'Sciences', '1', '5', 'Physics(Electronics Physics)', '0000-00-00'),
(10, 'Chemistry', 'Sciences', '3', '5', 'Chemistry', '0000-00-00'),
(11, 'Biosciences and Biotechnology(Animal and Environmental Biology)', 'Sciences', '4', '5', 'Biosciences and Biotechnology(Animal and Environmental Biology)', '0000-00-00'),
(12, 'Microbiology', 'Sciences', '5', '5', 'Microbiology', '0000-00-00'),
(13, 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', 'Sciences', '6', '5', 'Biosciences and Biotechnology(Plant Biology and Biotechnology)', '0000-00-00'),
(14, 'Mathematical and Computer Sciences', 'Sciences', '7', '5', 'Mathematical and Computer Sciences', '0000-00-00'),
(15, 'Medical Laboratory Science', 'Allied Health Sciences', '3', '4', 'Medical Laboratory Science', '0000-00-00'),
(16, 'Prosthetics and Orthotics', 'Medical Rehabilitation', '2', '12', 'Prosthetics and Orthotics', '2021-01-21'),
(17, 'Science Laboratory Technology', 'Sciences', '15', '5', 'Science Laboratory Technology', '2021-01-22'),
(18, 'Food Science', 'Sciences', '9', '5', 'Food Science', '2021-01-23'),
(19, 'Human Nutrition and Dietetics', 'Allied Health Sciences', '4', '4', 'Human Nutrition and Dietetics', '2021-01-24'),
(20, 'Radiography and Radiation Science', 'Allied Health Sciences', '5', '4', 'Radiography and Radiation Science', '2021-01-25'),
(21, 'Environmental Health Science', 'Public Health', '1', '11', 'Environmental Health Science', '2021-01-26'),
(22, 'Community Health Science', 'Institute of Community Health Innovation and Development', '1', '13', 'Community Health Science', '2021-01-27'),
(23, 'Biosciences and Biotechnology(Environmental Management and Toxicology)', 'Sciences', '8', '5', 'Biosciences and Biotechnology(Environmental Management and Toxicology)', '2021-02-08'),
(24, 'Information Technology', 'Sciences', '10', '5', 'Information Technology', '2021-02-08'),
(25, 'Computer Science', 'Sciences', '11', '5', 'Computer Science', '2021-02-08'),
(26, 'Physics', 'Sciences', '13', '5', 'Physics', '2021-02-08'),
(27, 'Statistics', 'Sciences', '14', '5', 'Statistics', '2021-02-08'),
(28, 'Science Laboratory Technology(Chemistry)', 'Sciences', '30', '5', 'Science Laboratory Technology(Chemistry)', '2021-01-22'),
(29, 'Science Laboratory Technology(Biochemistry)', 'Sciences', '31', '5', 'Science Laboratory Technology(Biochemistry)', '2021-01-22'),
(30, 'Science Laboratory Technology(Biology and Computational Biology)', 'Sciences', '32', '5', 'Science Laboratory Technology(Biology and Computational Biology)', '2021-01-22'),
(31, 'Science Laboratory Technology(Industrial Mathematics and Statistics)', 'Sciences', '33', '5', 'Science Laboratory Technology(Industrial Mathematics and Statistics)', '2021-01-22'),
(32, 'Science Laboratory Technology(Microbiology)', 'Sciences', '34', '5', 'Science Laboratory Technology(Microbiology)', '2021-01-22'),
(33, 'Science Laboratory Technology(Physics With Electronics)', 'Sciences', '35', '5', 'Science Laboratory Technology(Physics With Electronics)', '2021-01-22'),
(34, 'Dental Therapy', 'Dentistry', '2', '2', 'Dental Therapy', '2023-07-11'),
(35, 'Dental Technology', 'Dentistry', '3', '2', 'Dental Technology', '2023-07-11'),
(36, 'Audiology', 'Medical Rehabilitation', '4', '12', 'Audiology', '2021-01-21'),
(37, 'Speech & Language Therapy', 'Medical Rehabilitation', '5', '12', 'Speech & Language Therapy', '2021-01-21'),
(38, 'Occupational Therapy', 'Medical Rehabilitation', '3', '12', 'Occupational Therapy', '2021-01-21'),
(39, 'Complementary and Alternative Medicine', 'Allied Health Sciences', '6', '4', 'Complementary and Alternative Medicine', '2021-01-25'),
(40, 'Health Care Administration & Hospital Management', 'Allied Health Sciences', '7', '4', 'Health Care Administration & Hospital Management', '2021-01-25'),
(41, 'Pharmacology', 'Basic Clinical Sciences ', '1', '14', 'Pharmacology', '2023-07-11'),
(42, 'Medical Physics', 'Sciences', '36', '5', 'Medical Physics', '2021-01-22'),
(43, 'Medicinal Chemistry', 'Sciences', '37', '5', 'Medicinal Chemistry', '2021-01-22'),
(44, 'Biotechnology', 'Sciences', '38', '5', 'Biotechnology', '2021-01-22'),
(45, 'Industrial Mathematics', 'Sciences', '39', '5', 'Industrial Mathematics', '2021-01-22'),
(46, 'Health Information Management', 'Allied Health Sciences', '8', '4', 'Health Information Management', '2021-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thread_id` bigint(20) UNSIGNED NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `thread_id`, `matricno`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUP-ICT-1', 'Mr President, pls get more of your members to register', NULL, '2024-02-01 17:50:11', '2024-02-01 17:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_10_200742_create_alumni_profiles_table', 1),
(6, '2023_12_21_204457_add_multiple_column_to_alumni_profiles', 2),
(7, '2023_12_22_060441_create_service_requests_table', 3),
(8, '2023_12_24_042737_add_transaction_id_to_service_requests', 4),
(12, '2023_12_27_194750_create_threads_table', 5),
(13, '2023_12_27_194821_create_participants_table', 5),
(14, '2023_12_27_194846_create_messages_table', 5),
(15, '2026_05_07_110739_create_due_requests_table', 6),
(16, '2026_05_08_141821_add_payment_fields_to_due_requests_table', 7),
(17, '2026_05_28_060237_create_news_table', 8),
(18, '2026_05_28_060244_create_events_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `image`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Movie Night Date', 'movie-night-date', '<p>We have a movie night thank you</p>', '1779951199.jpg', 0, '2026-05-28 05:53:19', '2026-05-28 05:54:34'),
(2, 'Second News', 'second-news', '<p>Second News</p>', '1779951368.png', 0, '2026-05-28 05:56:08', '2026-05-28 05:56:08'),
(3, 'Third News', 'THird-news', '<p>ThirdNews</p>', '1779951368.png', 0, '2026-05-28 05:56:08', '2026-05-28 05:56:08'),
(4, 'Forth News', 'FOrth-news', '<p>ForthNews</p>', '1779951368.png', 0, '2026-05-28 05:56:08', '2026-05-28 05:56:08'),
(5, 'Fifth News', 'Fifth-news', '<p>Fifth News</p>', '1779951368.png', 0, '2026-05-28 05:56:08', '2026-05-28 05:56:08'),
(6, 'Sixth News', 'Sixth -news', '<p>Sixth News</p>', '1779951368.png', 0, '2026-05-28 05:56:08', '2026-05-28 05:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thread_id` bigint(20) UNSIGNED NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `last_read` datetime DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `thread_id`, `matricno`, `last_read`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUP-ICT-1', '2024-02-01 07:50:11', NULL, NULL, NULL),
(2, 1, 'PHS/15/0045', '2024-02-01 07:50:11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `graduate_category` varchar(50) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `request_method` varchar(30) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `transaction_id` varchar(255) DEFAULT NULL,
  `request_document` varchar(200) DEFAULT NULL,
  `request_add_document` varchar(200) NOT NULL,
  `request_status` varchar(200) DEFAULT 'INITIATED',
  `payment` varchar(255) NOT NULL DEFAULT 'UNPAID',
  `pay_channel` varchar(200) DEFAULT NULL,
  `gateway_response` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `channel` varchar(200) DEFAULT NULL,
  `paid_at` varchar(200) DEFAULT NULL,
  `customer_email` varchar(200) DEFAULT NULL,
  `authorization_code` varchar(200) DEFAULT NULL,
  `card_type` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `last4` varchar(200) DEFAULT NULL,
  `fees` varchar(200) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `tranref` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `matricno`, `graduate_category`, `organization`, `country`, `address`, `service_type`, `request_method`, `amount`, `status`, `transaction_id`, `request_document`, `request_add_document`, `request_status`, `payment`, `pay_channel`, `gateway_response`, `currency`, `channel`, `paid_at`, `customer_email`, `authorization_code`, `card_type`, `bank`, `last4`, `fees`, `ip_address`, `tranref`, `created_at`, `updated_at`) VALUES
(1, 'SUP-ICT-1', NULL, 'FUTA Akure', 'Nigeria', 'Federal University of Technology Akure', 'Transcript', 'Student Copy', '', 'PENDING', 'ARS1584458040', NULL, '', 'INITIATED', 'PAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-02-03 10:52:52', '2026-05-08 11:00:28'),
(2, 'ANA/18/1378', NULL, 'Northumbria University', 'Other Countries', '5 copper chare,\r\nMorpeth\r\nNE61 1BS\r\nUnited Kingdom', 'Transcript', 'Soft & Hard Copy', '', 'PENDING', NULL, NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-03 19:51:27', '2024-12-03 19:51:27'),
(3, 'NUS/17/1089', NULL, 'patienceola88@gmail.com', 'Nigeria', 'House 3, Road 4 Olokuta, Abeokuta\r\nOgun State, Nigeria.', 'Transcript', 'Soft Copy', '', 'PENDING', 'ARS0944489576', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-01-05 08:42:34', '2025-01-05 08:44:27'),
(4, 'bcm/19/1989', NULL, 'Uniport', 'Nigeria', 'University of Port Harcourt\r\nP.M.B 5323\r\nPort Harcourt\r\nNigeria', 'Transcript', 'Soft Copy', '', 'PENDING', 'ARS1977417672', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-01-12 18:25:40', '2026-01-12 18:27:24'),
(5, 'bcm/19/1989', NULL, 'Uniport', 'Nigeria', 'University of Port Harcourt\r\nP.M.B 5323\r\nPort Harcourt\r\nNigeria', 'Transcript', 'Soft & Hard Copy', '', 'PENDING', 'ARS1977417672', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-01-12 18:27:19', '2026-01-12 18:27:24'),
(6, 'CPOT/20/3043', NULL, 'Federal Medical Centre', 'Nigeria', 'Elite idi aba Abeokuta, Ogun State', 'Letter of English Proficiency', 'Student Copy', '', 'PENDING', 'ARS1484101009', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-02-13 18:49:03', '2026-03-12 15:41:33'),
(7, 'CPOT/20/3043', NULL, 'University of Dundee', 'Other Countries', 'University of Dundee\r\nNethergate\r\nDundee\r\nDD1 4HN\r\nScotland, UK', 'Letter of English Proficiency', 'Student Copy', '', 'PENDING', 'ARS1484101009', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-02-13 18:56:01', '2026-03-12 15:41:33'),
(8, 'PHT/18/1674', NULL, 'Department of Physiotherapy, University of Medical sciences Ondo', 'Nigeria', 'idlcetranscript@unimed.edu.ng', 'Transcript', 'Soft Copy', '', 'PENDING', NULL, NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-03-26 15:02:31', '2026-03-26 15:41:27'),
(9, 'PHT/17/1149', NULL, 'McGill University', 'Other Countries', 'officialschooldocs@mcgill.ca', 'Transcript', 'Soft Copy', '', 'PENDING', 'ARS2042055885', NULL, '', 'INITIATED', 'UNPAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-04-13 17:59:33', '2026-04-13 17:59:39'),
(10, 'ICT', NULL, 'UNIMED ONDO', 'Nigeria', 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan\r\nTemidire Street', 'Letter of English Proficiency', 'Student Copy', '', 'APPROVED', 'ARS1045116970', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'INITIATED', 'PAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-05-07 13:10:43', '2026-06-13 05:34:06'),
(11, 'ICT', NULL, 'UNIMED ONDO', 'Nigeria', 'Sw9/1575 Temidire Street Adifase Area, Apata, Ibadan', 'Letter of English Proficiency', 'Soft & Hard Copy', '', 'APPROVED', 'ARS1045116970', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'INITIATED', 'PAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-05-08 19:49:20', '2026-06-13 05:34:06'),
(12, 'ICT', NULL, 'APATA HIGH SCHOOL', 'Nigeria', 'IBADAN', 'Letter of Attestation', 'Soft & Hard Copy', '', 'APPROVED', 'ARS1045116970', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'INITIATED', 'PAID', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2026-05-09 08:42:54', '2026-06-13 05:34:06'),
(15, 'ICT', NULL, 'UNIMED ONDO', 'Nigeria', 'Sw9/1575 Temidire Street Adifase Area Apata Ibadan\r\nTemidire Street', '', '', '17000', 'APPROVED', 'ARS1137841797', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'PROCESSING', 'PAID', 'PAYSTACK', 'Successful', 'NGN', 'card', '2026-05-09 10:07:01', 'propanaaz@gmail.com', 'AUTH_f40hd6zysv', 'visa ', 'TEST BANK', '4081', '355', '102.89.82.139', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6127829054,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ARS1137841797\",\"receipt_number\":null,\"amount\":1700000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-09T10:07:01.000Z\",\"created_at\":\"2026-05-09T10:06:55.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"102.89.82.139\",\"metadata\":{\"matricno\":\"ICT\",\"request_method\":\"\",\"service_type\":\"\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778321220,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":35500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_f40hd6zysv\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-09T10:07:01.000Z\",\"createdAt\":\"2026-05-09T10:06:55.000Z\",\"requested_amount\":1700000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-09T10:06:55.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2026-05-09 09:06:34', '2026-06-13 05:34:06'),
(16, 'ICT', NULL, 'UNIMED ONDO', 'Nigeria', 'Sw9/1575 Temidire Street Adifase Area, Apata, Ibadan', 'Transcript', 'Hard Copy', '15000', 'APPROVED', 'ARS0620534900', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'PENDING', 'PAID', 'PAYSTACK', 'Successful', 'NGN', 'card', '2026-05-09 10:14:35', 'propanaaz@gmail.com', 'AUTH_rpkj3y8cn2', 'visa ', 'TEST BANK', '4081', '325', '102.89.82.139', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6127857773,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ARS0620534900\",\"receipt_number\":null,\"amount\":1500000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-09T10:14:35.000Z\",\"created_at\":\"2026-05-09T10:14:29.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"102.89.82.139\",\"metadata\":{\"matricno\":\"ICT\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1778321673,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":32500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_rpkj3y8cn2\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-09T10:14:35.000Z\",\"createdAt\":\"2026-05-09T10:14:29.000Z\",\"requested_amount\":1500000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-09T10:14:29.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2026-05-09 09:14:10', '2026-06-13 05:34:06'),
(17, 'ICT', NULL, 'UNIMED ONDO 5', 'Nigeria', 'djkfkjfrnd', 'Transcript', 'Student Copy', '17000', 'APPROVED', 'ARS1392808770', 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'INITIATED', 'PAID', 'PAYSTACK', 'Successful', 'NGN', 'card', '2026-05-21 12:15:26', 'propanaaz@gmail.com', 'AUTH_k6j9suv8xv', 'visa ', 'TEST BANK', '4081', '355', '197.211.38.34', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":6170421836,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ARS1392808770\",\"receipt_number\":null,\"amount\":1700000,\"message\":null,\"gateway_response\":\"Successful\",\"response_code\":\"00\",\"paid_at\":\"2026-05-21T12:15:26.000Z\",\"created_at\":\"2026-05-21T12:15:19.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"197.211.38.34\",\"metadata\":{\"matricno\":\"ICT\",\"referrer\":\"http:\\/\\/127.0.0.1:8000\\/\"},\"log\":{\"start_time\":1779365723,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":3},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":35500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_k6j9suv8xv\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_wWx2wzKTVipVJxeKxz0m\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":165544018,\"first_name\":\"\",\"last_name\":\"\",\"email\":\"propanaaz@gmail.com\",\"customer_code\":\"CUS_u97eo3mlq88o9bk\",\"phone\":\"\",\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2026-05-21T12:15:26.000Z\",\"createdAt\":\"2026-05-21T12:15:19.000Z\",\"requested_amount\":1700000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2026-05-21T12:15:19.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2026-05-21 11:14:16', '2026-06-13 05:34:06'),
(21, 'ICT', 'UNDERGRADUATE', 'NAZ', 'Nigeria', 'naz', 'Transcript', 'Student Copy via Email', NULL, 'PENDING', NULL, 'REQ__ICT_20260613063406_6a2cf9de9252d.csv', 'REQ__ICT_20260613063406_6a2cf9de94695.csv', 'REJECTED', 'UNPAID', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-13 05:34:06', '2026-06-13 06:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `softdelete` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `subject`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'SUP-ICT-1_PHS/15/0045_Chats', NULL, '2024-02-01 17:50:11', '2024-02-01 17:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(200) DEFAULT NULL,
  `matricno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `matricno`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SUP-ICT-1', 'UNIMED ICT', 'alumniadmin@unimed.edu.ng', NULL, '$2y$12$bqRhwR3NzLaR.oE2IyDGj.uATauERgSwbDNQMn3pQhhAJ4aOr7xuy', NULL, '2024-01-31 06:32:54', '2024-01-31 06:32:54'),
(2, NULL, 'PHS/15/0045', 'Adesida Adedayo Oluwadamilola', 'adesidaadedayo4678@gmail.com', NULL, '$2y$12$P20Xveohxjo0WJdxipf6KuYSIwI6ZHhpL0vjKkHxomKwPVUuTz2pK', NULL, '2024-01-31 10:24:32', '2024-01-31 10:24:32'),
(3, NULL, 'BIO/16/0692', 'AJAGUNNA ADEBANKE MAYOMI', 'aajagunna2@gmail.com', NULL, '$2y$12$zUXQ5ntF7rm9wvE9bF9WmevmTsmk5pnnhGjrrdOJAOJcLzhE.8C.S', NULL, '2024-01-31 14:37:15', '2024-01-31 14:37:15'),
(4, NULL, 'Nus/18/1610', 'Ogundola Esther Temitope', 'nus181610@unimed.edu.ng', NULL, '$2y$12$pTqxTaN2qsCFhpMqQGyjbOohCSMVJGWqnYhO51JfXHzVSeMB/VuE.', NULL, '2024-11-04 16:43:36', '2024-11-04 16:43:36'),
(5, NULL, 'Bio/19/1809', 'Aminu Jubril Ayomide', 'aminujubril589@gmail.com', NULL, '$2y$12$pbCpWjUztEc7BIGNjnOwDeex2zAw987opiaAFlQvoAQKRdYaV2hAO', NULL, '2024-11-06 20:11:42', '2024-11-06 20:11:42'),
(6, NULL, 'ANA/18/1378', 'Odia-Agbonifo Osaretin Valentina', 'odiavalentina5717@gmail.com', NULL, '$2y$12$7lNijweR.G73Rq3U5yQ6G.x.ZD/TmgbSDy8XvN0zo98ioL6L7ITwG', NULL, '2024-12-03 19:47:53', '2024-12-03 19:47:53'),
(7, NULL, 'CEHS/21/3387', 'AYOADE MOSES IGE', 'ayoademosesige@gmail.com', NULL, '$2y$12$tkVr2nMnLXWOmtNZpxNhPOxTZoirv1B4KAm3d/Jpr8b1cOD3WFZRi', NULL, '2024-12-09 16:32:04', '2024-12-09 16:32:04'),
(8, NULL, 'CEHS/21/3389', 'GBOLASERE TIMILEYIN ABRAHAM', 'gbolaseretimileyin@gmail.com', NULL, '$2y$12$yv2f.BuX7OAiB9mszQ/JrOW8EONmL1Q4pCFIJEg9RxVJIPFBF7qcK', NULL, '2024-12-09 16:38:08', '2024-12-09 16:38:08'),
(9, NULL, 'CEHS/21/3425', 'Ogbonnaya Blessing', 'ogbonnayablessing44@gmail.com', NULL, '$2y$12$lEQoGH7Lulo4OjSu2q5.Qu8LhauuQ0TEV3Si8JVHJGZJI6m825wti', NULL, '2024-12-09 16:47:37', '2024-12-09 16:47:37'),
(10, NULL, 'CEHS/21/3393', 'OYETOKE REBECCA MOSUNMOLA', 'oyetokerebecca@gmail.com', NULL, '$2y$12$bp0rHgTLoJ/0v/B1A/arceaH9CIIiv7QNgCuKFs43gB6el6F0sHOK', NULL, '2024-12-09 17:13:39', '2024-12-09 17:13:39'),
(11, NULL, 'CEHS/21/3392', 'NWAFOR OSITA INNOCENT', 'ositainnocent7@gmail.com', NULL, '$2y$12$VwlRrT3X6tHiEwf4wqf/Ku0fTQozcEaiYqXImgCM6FtbAU2uEVEFi', NULL, '2024-12-09 22:25:45', '2024-12-09 22:25:45'),
(12, NULL, 'CEHS/21/3391', 'MATHIAS NDUBUISI PETER', 'mathiasndubuisipeter@gmail.com', NULL, '$2y$12$jTr3HCS9Hs3owQZw/i0FRu0BXQlCASdP3pfnlKLyj6qywydvuJSui', NULL, '2024-12-09 22:49:58', '2024-12-09 22:49:58'),
(13, NULL, 'NUS/17/1089', 'Olaosebikan Patience Folushade', 'patienceola88@gmail.com', NULL, '$2y$12$zNELN65PIz4lSv52h6RF.uLrSvOb2px.cyl8pS962ZnZEax4OwHP.', NULL, '2025-01-05 08:33:29', '2025-01-05 08:33:29'),
(14, NULL, 'MED/16/0523', 'Ademusire Olubukola oluwatosin', 'bouquetee@gmail.com', NULL, '$2y$12$7wpctcYt.gsNrgSNCuYiGe3TYGYvsgrklFGmjzwv35lA2xUC5YvRm', NULL, '2025-02-01 22:09:06', '2025-02-01 22:09:06'),
(15, NULL, 'CPOT/22/4153', 'EHUJUO CHIDOZIE EMMANUEL', 'cpot224153@unimed.edu.ng', NULL, '$2y$12$eNouPK29Zx5dRHiAuUzgfuA1HkcqHinObBvoaOVnouCgoSM68P7dW', NULL, '2026-01-11 16:27:25', '2026-01-11 16:27:25'),
(16, NULL, 'bcm/19/1989', 'Omole Ifedayo Isaac', 'bcm191989@unimed.edu.ng', NULL, '$2y$12$WBWGjSaMgESASTPnlHD7EOnXglmjIUU/6LamXIokvBYUBRAKlshWS', NULL, '2026-01-12 18:23:00', '2026-01-12 18:23:00'),
(17, NULL, 'CPOT/22/4151', 'ALUKO PETER AJIBOLA', 'peteraluko23@gmail.com', NULL, '$2y$12$qj27MED7Sv6CNn7dEEUmjeZi1/43//HW1nlnbtD2Y7Nythw2XTk1O', NULL, '2026-01-29 20:13:21', '2026-01-29 20:13:21'),
(18, NULL, 'CPOT/22/4149', 'Adeyeye Oladimeji. Israel', 'dimax247@gmail.com', NULL, '$2y$12$Ax5SEzL/4uKdT26fXBy6Zuy77bsT8a5sUxuteDs8fbIraNKgeT/BG', NULL, '2026-01-29 20:19:34', '2026-01-29 20:19:34'),
(19, NULL, 'CPOT/20/3043', 'ADEBANJO AYOMIDE', 'ayomideadebanjo30@gmail.com', NULL, '$2y$12$PcjHdwyoEv7naGj6s8U7n.6cOUC46qd98T35EpGSmajpWmrPPGt9u', NULL, '2026-02-13 18:47:30', '2026-02-13 18:47:30'),
(20, NULL, 'BIO/20/2398', 'Akinsuyi EbunOluwa', 'akinsuyi.irewande@gmail.com', NULL, '$2y$12$lEHuLWGCsjxtXeObQ5cnAu6F6pN.FNbGaMS04Upt.4QZ1rtJMBfyC', NULL, '2026-02-16 01:42:43', '2026-02-16 01:42:43'),
(21, NULL, 'PUH/22/4049', 'Anuoluwa Boluwatife Stephen', 'banuoluwa@unimed.edu.ng', NULL, '$2y$12$KZ2jRulSu1yf.18opQnjlehKD/Rt.JAtAXUhqigXu84XE9L85OrIm', NULL, '2026-02-22 17:04:27', '2026-02-22 17:04:27'),
(22, NULL, 'Mls/20/2885', 'Mamamu Prosper Aboboye', 'mamamuprosper21@gmail.com', NULL, '$2y$12$I.HCLm0FaYi0YkedGOq6TOHDnZvFVtiR0kjnoBYr.KkPrjPKqXujy', NULL, '2026-02-24 12:07:54', '2026-02-24 12:07:54'),
(23, NULL, 'Med/16/0494', 'Mamidu Moyinoluwa', 'moyinolamamidu@gmail.com', NULL, '$2y$12$FkBqabX2g643Idb1YFXkgeNBIzl2ZEcqpE1zYPJyQ.00mIAKQut8.', NULL, '2026-03-09 12:46:20', '2026-03-09 12:46:20'),
(24, NULL, 'MLS/19/2322', 'Omotosho Seyi Idowu', 'omotoshoseyi01@gmail.com', NULL, '$2y$12$6oZs.C7M0RqL7bhPHztQxOVO8776Ge/s2QRGQ7mmE05AqOKvCj8cm', NULL, '2026-03-11 13:10:46', '2026-03-11 13:10:46'),
(25, NULL, 'MLS/19/2297', 'Fakuyi Subomi', 'mls192297@unimed.edu.ng', NULL, '$2y$12$jyasDWSGMfJw8P8boe7FIeAXu0SiH77gwUuHAeLiCG4LHjMO0XAHq', NULL, '2026-03-23 15:10:36', '2026-03-23 15:10:36'),
(26, NULL, 'PHT/18/1674', 'Babatunde Oyindamola Janet', 'Harrijanet8@gmail.com', NULL, '$2y$12$HvTORTe0bdRJ8bxr4iIpMeUT2QWBMHNLJUhRCB9AnTfboquiUIMu6', NULL, '2026-03-26 14:59:13', '2026-03-26 14:59:13'),
(27, NULL, 'PHT/17/1149', 'OLA OLUWABUKOLA MARY', 'olaoluwabukolamary@gmail.com', NULL, '$2y$12$yRcqE80vfZgjGWKRL4CMQOuC9mQ9F3lxu.KQ1CQNfRu3dknzA1rXi', NULL, '2026-04-13 17:55:48', '2026-04-13 17:55:48'),
(28, NULL, 'SLT/20/2492', 'Afe Oluchi Oluwaseyi', 'oluwaseyioluchi@gmail.com', NULL, '$2y$12$DyjrxzTXE6jtMhqLrvZIuuPycIYJcZIiAbOEo45CXp97F6teuzOL.', NULL, '2026-04-24 00:18:08', '2026-04-24 00:18:08'),
(29, 'adminug', 'ICT', 'ICT ICT', 'propanaaz@gmail.com', NULL, '$2y$12$TsJpa66UKExDBiuaRuvNEOOIHUMnkfhykxrdoTvdDOPj.A/O8ptAu', NULL, '2026-05-05 21:48:39', '2026-05-05 21:48:39'),
(30, NULL, 'CPOT/22/4148', 'Adeyemo Oluwafemi Sogo', 'cpot224148@unimed.edu.ng', NULL, '$2y$12$AcYpqKcRh.VN4.2GKLo2WOAsfMVkgDnhMruSkXoAT2PIj0Q.qa7a6', NULL, '2026-05-06 15:46:06', '2026-05-06 15:46:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumniregs`
--
ALTER TABLE `alumniregs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `alumni_profiles`
--
ALTER TABLE `alumni_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumni_profiles_matricno_unique` (`matricno`);

--
-- Indexes for table `deptoptions`
--
ALTER TABLE `deptoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `due_requests`
--
ALTER TABLE `due_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties_dept`
--
ALTER TABLE `faculties_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties_dept_old`
--
ALTER TABLE `faculties_dept_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_thread_id_foreign` (`thread_id`),
  ADD KEY `messages_matricno_foreign` (`matricno`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participants_thread_id_foreign` (`thread_id`),
  ADD KEY `participants_matricno_foreign` (`matricno`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_requests_matricno_foreign` (`matricno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_matricno_unique` (`matricno`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumniregs`
--
ALTER TABLE `alumniregs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `alumni_profiles`
--
ALTER TABLE `alumni_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `deptoptions`
--
ALTER TABLE `deptoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `due_requests`
--
ALTER TABLE `due_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculties_dept`
--
ALTER TABLE `faculties_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `faculties_dept_old`
--
ALTER TABLE `faculties_dept_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_profiles`
--
ALTER TABLE `alumni_profiles`
  ADD CONSTRAINT `alumni_profiles_matricno_foreign` FOREIGN KEY (`matricno`) REFERENCES `users` (`matricno`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_matricno_foreign` FOREIGN KEY (`matricno`) REFERENCES `users` (`matricno`),
  ADD CONSTRAINT `messages_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_matricno_foreign` FOREIGN KEY (`matricno`) REFERENCES `users` (`matricno`),
  ADD CONSTRAINT `participants_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_matricno_foreign` FOREIGN KEY (`matricno`) REFERENCES `users` (`matricno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
