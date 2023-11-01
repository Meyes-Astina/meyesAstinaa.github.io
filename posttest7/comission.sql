-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 10:28 PM
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
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `admin_username`, `admin_password`) VALUES
(0, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id_user` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_user`
--

CREATE TABLE `registrasi_user` (
  `id` int(11) NOT NULL,
  `register_username` varchar(255) NOT NULL,
  `register_password` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi_user`
--

INSERT INTO `registrasi_user` (`id`, `register_username`, `register_password`, `user_email`) VALUES
(1, 'Nana', 0, 'nanami@gmail.com'),
(2, 'Yaya', 0, 'KueYaya@gmail.com');

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
  `katasandi` varchar(25) NOT NULL,
  `tanggal_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_art`
--

INSERT INTO `tb_art` (`id`, `jenisseni`, `jenispesanan`, `deskripsi`, `gambar`, `nama`, `age`, `gmail`, `katasandi`, `tanggal_pemesanan`) VALUES
(0, '', '', '', '', '', 0, '', '', '2023-11-02'),
(1, 'Semi Realistic', 'Full Body', 'Cover novel. Gambar cewek berambut panjang dengan gaun putih.', '', 'Jennie', 20, 'Jennifer1@gmail.com', 'Jenniefer1', NULL),
(2, 'Anime Style', 'Half Body', 'Gambar Tanjiro sama Nezuko. Ohayo Onichan.', '', 'Maya', 19, 'maya@gmail.com', '123maya', NULL),
(3, 'Anime Style', 'Bust Up', 'Gambarkan Sasusaku sama sarada.', '', 'Faren', 12, 'Farentia@gmail.com', 'Tiaaa2', NULL),
(6, 'Semi Realistic', 'Bust Up', 'Gambarkan cover novel ya, mukanya kayak di gambar yang dikirim. Rambutnya jadi putih, matanya jadi kuning ya.', '', 'Yaya', 17, 'arialove@gmail.com', 'Ayayyaya123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `password` (`admin_password`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `password` (`user_password`);

--
-- Indexes for table `registrasi_user`
--
ALTER TABLE `registrasi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_art`
--
ALTER TABLE `tb_art`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `katasandi` (`katasandi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrasi_user`
--
ALTER TABLE `registrasi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
