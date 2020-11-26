-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 01:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `thn_terbit` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `nama`, `jenis`, `penulis`, `penerbit`, `thn_terbit`, `jumlah`) VALUES
(1, 'Classroom of The Elite', 'Novel', 'Saepul Bahri', 'Sentul Inc', '2002', 17),
(2, 'Inspirasi dari WC', 'Pengetahuan', 'Bang Toyib', 'Shueisa', '2019', 4),
(4, 'One Piece Volume 43', 'Komik', 'Eiichiro Oda', 'Shueisa', '1997', 52),
(5, 'Mengejar Cinta Cinta Menjadi Dokter', 'Novel', 'Dedi dadu', 'sunda empire', '2019', 34),
(6, 'Samsul', 'Komik', 'maahr', 'kjhfskjahld', '287391', 32183);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id` int(11) NOT NULL,
  `siswa` varchar(100) NOT NULL,
  `buku` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id`, `siswa`, `buku`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saepul Bahri', 'Classroom of The Elite', '2020-09-17 14:01:00', 1, '2020-09-17 14:01:26', '2020-09-17 14:01:26'),
(2, 'Shopia Soleha', 'Inspirasi dari WC', '2020-09-17 14:01:00', 1, '2020-09-17 14:01:46', '2020-09-17 14:01:46'),
(3, 'Meli Maharani', 'Mengejar Cinta Cinta Menjadi Dokter', '2020-09-17 14:02:00', 0, '2020-09-17 14:02:04', '2020-09-17 14:02:29'),
(4, 'Rizky Budi Permana', 'One Piece Volume 43', '2020-09-17 14:02:00', 1, '2020-09-17 14:02:20', '2020-09-17 14:02:20'),
(5, 'Azis Maulana', 'Samsul', '2020-09-17 23:17:00', 1, '2020-09-17 23:17:27', '2020-09-17 23:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id` int(11) NOT NULL,
  `siswa` varchar(100) NOT NULL,
  `buku` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id`, `siswa`, `buku`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saepul Bahri', 'Classroom of The Elite', 1, '2020-09-17 14:01:26', '2020-09-17 14:01:26'),
(2, 'Shopia Soleha', 'Inspirasi dari WC', 1, '2020-09-17 14:01:47', '2020-09-17 14:01:47'),
(3, 'Meli Maharani', 'Mengejar Cinta Cinta Menjadi Dokter', 1, '2020-09-17 14:02:04', '2020-09-17 14:02:04'),
(4, 'Rizky Budi Permana', 'One Piece Volume 43', 1, '2020-09-17 14:02:20', '2020-09-17 14:02:20'),
(5, 'Meli Maharani', 'Mengejar Cinta Cinta Menjadi Dokter', 0, '2020-09-17 14:02:29', '2020-09-17 14:02:29'),
(6, 'Azis Maulana', 'Samsul', 1, '2020-09-17 23:17:27', '2020-09-17 23:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nama`, `kelas`, `jurusan`) VALUES
(1, 'Saepul Bahri', '10', 'Multimedia'),
(2, 'Rizky Budi Permana', '12', 'Rekayasa Perangkat Lunak'),
(3, 'Firyan Fatih Fadilah', '12', 'Rekayasa Perangkat Lunak'),
(4, 'Andri Maulana Malik', '12', 'Rekayasa Perangkat Lunak'),
(5, 'Azis Maulana', '12', 'Rekayasa Perangkat Lunak'),
(6, 'Erliana Diningati', '12', 'Rekayasa Perangkat Lunak'),
(7, 'Farhan Yulianto', '12', 'Rekayasa Perangkat Lunak'),
(8, 'Marisa', '12', 'Rekayasa Perangkat Lunak'),
(9, 'Meli Maharani', '12', 'Rekayasa Perangkat Lunak'),
(10, 'Shopia Soleha', '12', 'Rekayasa Perangkat Lunak'),
(11, 'Siti Saida Khairunnisa', '12', 'Rekayasa Perangkat Lunak'),
(12, 'Taufik Rohiyat', '12', 'Rekayasa Perangkat Lunak'),
(13, 'Teddy Syah', '12', 'Rekayasa Perangkat Lunak'),
(14, 'Yessa Salsabila', '12', 'Rekayasa Perangkat Lunak'),
(15, 'Raka Anjasmara', '11', 'Rekayasa Perangkat Lunak'),
(16, 'Dzaki Zahran', '11', 'Multimedia'),
(17, 'Narul Shidiq', '12', 'Multimedia'),
(18, 'Ikhsan Risky', '12', 'Multimedia'),
(19, 'Rahmawanti Hermawan', '12', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `profil` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `no_telp`, `profil`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Saepul Bahri', 'ppulbhri', '7d40e131cd5f707397e5d9488c85d22c', '081386470620', '1600089551_bf3afb0f12d17970a912.png', 'Admin', 1, '2020-09-10', '2020-09-17'),
(2, 'Maslukin', 'klin', 'e10adc3949ba59abbe56e057f20f883e', '', '1600357659_51a6f0f78dc657c8d193.png', 'Petugas', 1, '2020-09-17', '2020-09-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
