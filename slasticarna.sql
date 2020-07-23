-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 02:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slasticarna`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobilephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `address`, `location`, `telephone`, `mobilephone`, `email`) VALUES
(1, 'Aleja Konzula - Meljanac bb 72270 Travnik Bosna i Herceogovina', 'IUT - prvi sprat', '00387 30 515 909', '00387 62 496 406', 'info@bektasslastice.ba');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `id_narudzbe` varchar(255) NOT NULL,
  `details_of_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbe`
--

INSERT INTO `narudzbe` (`id`, `name`, `surname`, `address`, `contact_phone`, `created_at`, `title`, `quantity`, `price`, `id_narudzbe`, `details_of_order`) VALUES
(3, 'Aiša', 'Bektaš', 'Dolac na Lašvi, Travnik', '062496406', '2020-07-15 10:39:14', 'Jaffa torta', '3', '3', '193', ''),
(4, 'Aiša', 'Bektaš', 'Dolac na Lašvi, Travnik', '062496406', '2020-07-15 10:39:14', 'Čaj', '2', '1.5', '193', '1 od kamilice, 1 od metvice'),
(7, 'Aiša', 'Bektaš', 'Dolac na Lašvi, Travnik', '0603157398', '2020-07-23 11:47:57', 'Mileram torta', '1', '3', '86', ''),
(8, 'Aiša', 'Bektaš', 'Dolac na Lašvi, Travnik', '0603157398', '2020-07-23 11:47:57', 'Sokovi', '2', '2.5', '86', '1 od jabuke, 1 od jagode');

-- --------------------------------------------------------

--
-- Table structure for table `sveslastice`
--

CREATE TABLE `sveslastice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sveslastice`
--

INSERT INTO `sveslastice` (`id`, `title`, `ingredients`, `price`, `picture`, `type`, `created_at`) VALUES
(2, 'Jaffa torta', 'brašno, čokolada, pomoranča', 3, 'images/jaffatorta.jpg', 'torte', '2020-07-15 08:58:39'),
(3, 'Nougat torta', 'mlijeko, jaja, lješnjak, čokolada', 3, 'images/4404_908 Sniki kikiriki torta fi 26cm 2,08kg.jpg', 'torte', '2020-07-15 09:00:19'),
(4, 'Ferrero torta', 'brašno, jaja, nutella', 4, 'images/ferero_300x200.jpg', 'torte', '2020-07-15 09:01:34'),
(5, 'Havana torta', 'mlijeko, goveđi želatin, lješnjak', 3, 'images/havanatorta.jpg', 'torte', '2020-07-15 09:02:23'),
(6, 'Karamel torta', 'mlijeko, puding, čokolada, vrhnje, šećer', 3.5, 'images/karamel_torta_260x170.jpg', 'torte', '2020-07-15 09:03:06'),
(7, 'Švarcvald torta', 'brašno, mlijeko, jaja, višnje', 3.5, 'images/svarcvald_260x170.jpg', 'torte', '2020-07-15 09:04:04'),
(10, 'Rafael torta', 'brašno, mlijeko, puding, kokos', 3, 'images/rafaelo-tortacrop_260x170.jpg', 'torte', '2020-07-15 09:09:15'),
(11, 'Arabija', 'brašno, suho voće, čokolada', 3, 'images/arabija_260x170.jpg', 'kolači', '2020-07-15 09:24:03'),
(12, 'Krempita', 'brašno, mlijeko, jaja', 2.5, 'images/117047_krempita_ls.jpg', 'kolači', '2020-07-15 09:24:28'),
(13, 'Rolat', 'brašno, mlijeko, jaja, maline', 2.5, 'images/Rolat-bez-pecenja.jpg', 'kolači', '2020-07-15 09:26:50'),
(14, 'Baklava', 'brašno, šećer, pistacije', 4, 'images/square-baklava-with-pistachio-square-baklava-with-pistachio-201-15-B.jpg', 'kolači', '2020-07-15 09:29:16'),
(15, 'Tulumba', 'brašno, šećer, jaja', 2.5, 'images/tulumba.jpg', 'kolači', '2020-07-15 09:30:00'),
(16, 'Tufahija', 'jabuka, šećer, šlag', 2.5, 'images/tufahija.jpg', 'kolači', '2020-07-15 09:30:27'),
(17, 'Čudo od čokolade', 'brašno, jaja, kakao, čokolada', 3, 'images/unnamed.jpg', 'kolači', '2020-07-15 09:31:08'),
(19, 'Kinder torta', 'čokolada, kakao, mlijeko, vrhnje', 3, 'images/kinder_1_260x170.jpeg', 'torte', '2020-07-15 09:33:08'),
(21, 'Topla čokolada', 'bijela čokolada, crna čokolada', 2.5, 'images/toplacokolada_260x170.jpg', 'pića', '2020-07-15 10:14:21'),
(22, 'Čaj', 'metvica, kamilica, voćni čaj, turski čaj', 1.5, 'images/caj10_260x170.jpg', 'pića', '2020-07-15 10:15:50'),
(23, 'Kahva', 'bosanska, produžena, kratka, sa mlijekom', 1.5, 'images/kahva_260x170.jpg', 'pića', '2020-07-15 10:16:23'),
(24, 'Salep', 'sa cimetom, bez cimeta', 2, 'images/salep_260x170.jpg', 'pića', '2020-07-15 10:17:25'),
(25, 'Frapei', 'sa okusom jagode, maline, kivija, banane', 2.5, 'images/frape_260x170.jpg', 'pića', '2020-07-15 10:18:16'),
(26, 'Sokovi', 'od pomoranče, od višnje, od jabuke, od borovnice, od jagode, od limuna', 2.5, 'images/sokovi_260x170.jpg', 'pića', '2020-07-15 10:19:22'),
(27, 'Cappucicno', 'čokolada, vanilija, karamel, nougat', 2, 'images/kapucino_260x170.jpg', 'pića', '2020-07-15 10:20:48'),
(29, 'Štrudle', 'sa makom, sa čokoladom, sa višnjom, sa orasima', 2.5, 'images/bfedd6fe1821cc53783f3a8ff08be9d3_header.jpg', 'peciva i palačinke', '2020-07-15 10:26:19'),
(30, 'Palačinke', 'sa voćem, sa nutelom, sa mazom, sa sladoledom', 4, 'images/ekstrapalacinke_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:27:23'),
(31, 'Kiflice', 'sa sirom, sa čokoladom', 2.5, 'images/kiflice_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:28:11'),
(32, 'Lisnata tijesta', 'sa sirom, sa čokoladom, sa voćem ', 1.5, 'images/lisnato_1_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:28:47'),
(33, 'Kroasan', 'sa nutelom, sa voćem', 1.5, 'images/krosan_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:29:49'),
(34, 'Wafle', 'sa sezonskim voćem, sa nutelom, sa mazom, sa sladoledom ', 3, 'images/wafle_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:30:49'),
(35, 'Simit', 'sa sjemenkama, bez sjemenki', 1.5, 'images/simit.jpg', 'peciva i palačinke', '2020-07-15 10:31:53'),
(36, 'Američke palačinke', 'sa nutelom, sa mazom, sa voćem', 3, 'images/americkepalacinke_260x170.jpg', 'peciva i palačinke', '2020-07-15 10:32:23'),
(38, 'Monte', 'brašno, mlijeko, jaja', 2.5, 'images/monte103_260x170.jpg', 'kolači', '2020-07-23 11:42:06'),
(39, 'Mileram torta', 'brašno, mileram, jagode, vanilija', 3, 'images/mileram_260x170.jpg', 'torte', '2020-07-23 11:43:47'),
(40, 'Gazirani sokovi', 'kiseljak, fanta, coca cola, mirinda', 1.5, 'images/gazirana-pica_6_260x170.jpg', 'pića', '2020-07-23 11:44:28'),
(41, 'Američke palačinke', 'sa nutelom, sa mazom, sa voćem', 3, 'images/americkepalacinke_260x170.jpg', 'peciva i palačinke', '2020-07-23 11:45:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sveslastice`
--
ALTER TABLE `sveslastice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sveslastice`
--
ALTER TABLE `sveslastice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
