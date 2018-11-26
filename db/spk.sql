-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 01:10 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `username`, `password`) VALUES
('admin@gmail.com', 'admin', '$2y$10$IPBeNEmrrDnYHOIDwF.0YOsSMhpz3UjKUSH9rWYxEUCdt6T5Ka8rK');

--
-- Triggers `akun`
--
DELIMITER $$
CREATE TRIGGER `hapus_akun` AFTER DELETE ON `akun` FOR EACH ROW DELETE FROM kriteria WHERE email=OLD.email
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `email`, `lokasi`, `waktu`) VALUES
('A1', 'admin@gmail.com', 'Jl. D.I. Panjaitan', '2018-11-25 23:08:50'),
('A2', 'admin@gmail.com', 'Jl. Patimura', '2018-11-26 01:19:22'),
('A3', 'admin@gmail.com', 'Jl. Katamso', '2018-11-26 01:19:33'),
('A4', 'admin@gmail.com', 'Jl. Ade Irma S.', '2018-11-26 01:19:43'),
('A5', 'admin@gmail.com', 'Jl. A. Yani', '2018-11-26 01:19:53');

--
-- Triggers `alternatif`
--
DELIMITER $$
CREATE TRIGGER `hapus_alternatif` AFTER DELETE ON `alternatif` FOR EACH ROW DELETE FROM pencocokan_kriteria WHERE email=OLD.email AND a=OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Benefit','Cost') NOT NULL,
  `bobot` double NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `email`, `nama`, `jenis`, `bobot`, `waktu`) VALUES
('C1', 'admin@gmail.com', 'Kelayakan Lahan', 'Benefit', 0.3, '2018-11-25 18:05:21'),
('C2', 'admin@gmail.com', 'Kepadatan Penduduk', 'Benefit', 0.6, '2018-11-26 01:04:08'),
('C3', 'admin@gmail.com', 'Keramaian Lalu Lintas', 'Benefit', 0.8, '2018-11-26 01:05:13'),
('C4', 'admin@gmail.com', 'Kedekatan Dengan Fasilitas Umum', 'Benefit', 0.5, '2018-11-26 01:05:38'),
('C5', 'admin@gmail.com', 'Intensitas Banjir', 'Cost', 1, '2018-11-26 01:06:05'),
('C6', 'admin@gmail.com', 'Harga', 'Cost', 0.8, '2018-11-26 01:06:20'),
('C7', 'admin@gmail.com', 'Jarak Dengan Tempat Pendidikan', 'Benefit', 0.7, '2018-11-26 01:06:50'),
('C8', 'admin@gmail.com', 'Jarak Dengan Cabang Lain', 'Cost', 0.3, '2018-11-26 01:07:11'),
('C9', 'admin@gmail.com', 'Jarak Dengan Competitor', 'Cost', 0.5, '2018-11-26 01:07:37');

--
-- Triggers `kriteria`
--
DELIMITER $$
CREATE TRIGGER `hapus_kriteria` AFTER DELETE ON `kriteria` FOR EACH ROW DELETE FROM sub_kriteria WHERE email=OLD.email AND kriteria=OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pencocokan_kriteria`
--

CREATE TABLE `pencocokan_kriteria` (
  `email` varchar(25) NOT NULL,
  `a` varchar(5) NOT NULL,
  `c` varchar(5) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencocokan_kriteria`
--

INSERT INTO `pencocokan_kriteria` (`email`, `a`, `c`, `id_nilai`) VALUES
('admin@gmail.com', 'A1', 'C1', 8),
('admin@gmail.com', 'A1', 'C2', 14),
('admin@gmail.com', 'A1', 'C3', 18),
('admin@gmail.com', 'A1', 'C4', 22),
('admin@gmail.com', 'A1', 'C5', 24),
('admin@gmail.com', 'A1', 'C6', 26),
('admin@gmail.com', 'A1', 'C7', 29),
('admin@gmail.com', 'A1', 'C8', 33),
('admin@gmail.com', 'A1', 'C9', 35),
('admin@gmail.com', 'A2', 'C1', 7),
('admin@gmail.com', 'A2', 'C2', 16),
('admin@gmail.com', 'A2', 'C3', 19),
('admin@gmail.com', 'A2', 'C4', 22),
('admin@gmail.com', 'A2', 'C5', 24),
('admin@gmail.com', 'A2', 'C6', 27),
('admin@gmail.com', 'A2', 'C7', 30),
('admin@gmail.com', 'A2', 'C8', 34),
('admin@gmail.com', 'A2', 'C9', 36),
('admin@gmail.com', 'A3', 'C1', 13),
('admin@gmail.com', 'A3', 'C2', 15),
('admin@gmail.com', 'A3', 'C3', 17),
('admin@gmail.com', 'A3', 'C4', 21),
('admin@gmail.com', 'A3', 'C5', 23),
('admin@gmail.com', 'A3', 'C6', 28),
('admin@gmail.com', 'A3', 'C7', 29),
('admin@gmail.com', 'A3', 'C8', 34),
('admin@gmail.com', 'A3', 'C9', 37),
('admin@gmail.com', 'A4', 'C1', 7),
('admin@gmail.com', 'A4', 'C2', 15),
('admin@gmail.com', 'A4', 'C3', 17),
('admin@gmail.com', 'A4', 'C4', 20),
('admin@gmail.com', 'A4', 'C5', 25),
('admin@gmail.com', 'A4', 'C6', 26),
('admin@gmail.com', 'A4', 'C7', 31),
('admin@gmail.com', 'A4', 'C8', 32),
('admin@gmail.com', 'A4', 'C9', 35),
('admin@gmail.com', 'A5', 'C1', 8),
('admin@gmail.com', 'A5', 'C2', 15),
('admin@gmail.com', 'A5', 'C3', 19),
('admin@gmail.com', 'A5', 'C4', 20),
('admin@gmail.com', 'A5', 'C5', 24),
('admin@gmail.com', 'A5', 'C6', 27),
('admin@gmail.com', 'A5', 'C7', 29),
('admin@gmail.com', 'A5', 'C8', 33),
('admin@gmail.com', 'A5', 'C9', 35);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kriteria` varchar(5) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `email`, `kriteria`, `deskripsi`, `keterangan`, `nilai`) VALUES
(7, 'admin@gmail.com', 'C1', 'Ruko', 'Sangat Layak', 0.8),
(8, 'admin@gmail.com', 'C1', 'Rumah Tinggal', 'Layak', 0.5),
(13, 'admin@gmail.com', 'C1', 'Lahan Kosong', 'Cukup Layak', 0.2),
(14, 'admin@gmail.com', 'C2', '>500', 'Sangat Padat', 0.7),
(15, 'admin@gmail.com', 'C2', '100 s/d 500', 'Padat', 0.5),
(16, 'admin@gmail.com', 'C2', '<100', 'Cukup Padat', 0.3),
(17, 'admin@gmail.com', 'C3', '>1000', 'Sangat Ramai', 0.7),
(18, 'admin@gmail.com', 'C3', '100 s/d 1000', 'Ramai', 0.5),
(19, 'admin@gmail.com', 'C3', '<100', 'Cukup Ramai', 0.3),
(20, 'admin@gmail.com', 'C4', '<1Km', 'Sangat Dekat', 0.8),
(21, 'admin@gmail.com', 'C4', '1 Km s/d 2 Km', 'Cukup Dekat', 0.5),
(22, 'admin@gmail.com', 'C4', '>2Km', 'Jauh', 0.3),
(23, 'admin@gmail.com', 'C5', 'Tidak Pernah', 'Baik', 1),
(24, 'admin@gmail.com', 'C5', 'Kadang', 'Cukup Baik', 0.5),
(25, 'admin@gmail.com', 'C5', 'Sering', 'Kurang Baik', 0.2),
(26, 'admin@gmail.com', 'C6', '>1M', 'Sangat Mahal', 0.3),
(27, 'admin@gmail.com', 'C6', '100Jt s/d 1 M', 'Cukup Mahal', 0.5),
(28, 'admin@gmail.com', 'C6', '<100Jt', 'Murah', 0.9),
(29, 'admin@gmail.com', 'C7', '<1Km', 'Sangat Dekat', 0.8),
(30, 'admin@gmail.com', 'C7', '1 Km s/d 2 Km', 'Cukup Dekat', 0.5),
(31, 'admin@gmail.com', 'C7', '>2Km', 'Jauh', 0.3),
(32, 'admin@gmail.com', 'C8', '<1Km', 'Sangat Dekat', 0.1),
(33, 'admin@gmail.com', 'C8', '1 Km s/d 2 Km', 'Cukup Dekat', 0.5),
(34, 'admin@gmail.com', 'C8', '>2Km', 'Jauh', 0.7),
(35, 'admin@gmail.com', 'C9', '<1Km', 'Sangat Dekat', 0.3),
(36, 'admin@gmail.com', 'C9', '1 Km s/d 2 Km', 'Cukup Dekat', 0.5),
(37, 'admin@gmail.com', 'C9', '>2Km', 'Jauh', 0.7);

--
-- Triggers `sub_kriteria`
--
DELIMITER $$
CREATE TRIGGER `hapus_sub_kriteria` AFTER DELETE ON `sub_kriteria` FOR EACH ROW DELETE FROM pencocokan_kriteria WHERE id_nilai=OLD.id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
