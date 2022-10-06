-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 06:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_2022_b_203040059`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `gambar`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(1, '1.jpg', 'Pembelajaran Fisika; Kesulitan Belajar dan Cara Mengatasinya', 'M. Anas Thohir; Fitri April Yanti', 'Media Akademi', 2017),
(2, '2.jpg', 'Perbedaan Penerapan Model Problem Based Learning', 'Dedy Miswar', 'Media Akademi', 2016),
(3, '3.jpg', 'Geologi Lingkungan', 'Imam Subekti', 'Mobius', 2018),
(4, '4.jpg', 'Ilmu Lingkungan Edisi 2', 'H.R. Mulyanto, Ir., Dipl. H.E', 'Mobius', 2018),
(5, '5.jpg', 'Pertanian Postmodern', 'Iwan Setiawan, Dika Supyandi, Siska Rasiska, M.Gunardi Judawinata', 'Penebar Swadaya', 2018),
(6, '6.jpg', 'Pengelolaan Lingkungan Hidup; Aspek Kearifan Lokal, Ergonomi, Ergologi, dan Regulasi', 'Prof. Dr. Nyoman Wijana, M.Si', 'Plantaxia', 2016),
(7, '7.jpg', 'Kampung Naga; Pengetahuan Ekologi Tradisional dan Pelestarian Keanekaragaman Hayati Tumbuhan', 'Sidik Permana', 'Plantaxia', 2015),
(8, '8.jpg', 'Mikrobiologi Pangan', 'Rifda Naufalin', 'Plantaxia', 2018),
(9, '9.jpg', 'Pemodelan Sistem Pertanian Terintegrasi; Pendekatan Programisasi Linear', 'Ni Putu Sukanteri, S.P., M.Agb.', 'Plantaxia', 2018),
(10, '10.jpg', 'Pengendalian Terpadu Hama dan Penyakit Tanaman Padi', 'Prof. Dr. Ir. Moch. Sodiq,  Dr. Ir. Tri Mujoko, MP', 'Plantaxia', 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
