-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 05:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comission`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_art`
--

CREATE TABLE `tb_art` (
  `id` int(10) NOT NULL,
  `jenisseni` varchar(50) NOT NULL,
  `jenispesanan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `age` int(20) NOT NULL,
  `gmail` varchar(25) NOT NULL,
  `katasandi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_art`
--

INSERT INTO `tb_art` (`id`, `jenisseni`, `jenispesanan`, `deskripsi`, `gambar`, `nama`, `age`, `gmail`, `katasandi`) VALUES
(1, 'Semi Realistic', 'Full Body', 'Cover novel. Gambar cewek berambut panjang dengan gaun putih.', '', 'Jennie', 20, 'Jennifer1@gmail.com', 'Jenniefer1'),
(2, 'Anime Style', 'Half Body', 'Gambar Tanjiro sama Nezuko. Ohayo Onichan.', '', 'Maya', 19, 'maya@gmail.com', '123maya'),
(3, 'Anime Style', 'Bust Up', 'Gambarkan Sasusaku sama sarada.', '', 'Tia', 12, 'Farentia@gmail.com', 'Tiaaa2'),
(6, 'Semi Realistic', 'Bust Up', 'Gambarkan cover novel ya, mukanya kayak di gambar yang dikirim. Rambutnya jadi putih, matanya jadi kuning ya.', '', 'Yaya', 17, 'arialove@gmail.com', 'Ayayyaya123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_art`
--
ALTER TABLE `tb_art`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `katasandi` (`katasandi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
