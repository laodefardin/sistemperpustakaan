-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 02:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kelas`) VALUES
(180810, 'Yoga Widianto', 'Tegal', '1997-03-19', 'Laki-laki', '8B1'),
(190701, 'Dadi Setiadi1', 'Tegal', '1997-11-16', 'Laki-laki', '7A'),
(190702, 'Annisavira', 'Tegal', '1998-02-23', 'Perempuan', '7A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `jumlah_buku` int(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tanggal_input`, `gambar`) VALUES
(14, ' 41 Script PHP Siap Pakai', 'Yosef Murya', 'Jasakom', '1992', '97860208232492', 10, 'Rak 1', '2019-10-01', '17812751_90f089cb-ce91-4c07-86c2-e9080fb1f636_581_1032.jpg'),
(15, 'Hackintosh: Jalankan Mac Os X', 'Macbook Pro', 'Jasakom', '1992', '9789791090933', 14, 'Rak 1', '2019-10-01', 'Hackintosh_Jalankan_Mac_OS_X_Dengan_PC_Anda___Eri_Bowo.jpg'),
(16, 'Windows 7 Security', 'Yusmadi', 'Jasakom', '1992', '9789791090421', 4, 'Rak 1', '2019-10-01', '35610_f.jpg'),
(17, 'Membangun IT Savvy', 'Jogiyanto ', 'Andi', '1992', '9789792960297', 20, 'Rak 1', '2019-10-01', '840124d66e8114d9e7ba582b2dcbd71a.jpg'),
(18, 'CISCO Kung Fu', 'Aristo', 'Jasakom', '1992', '9786020823270', 21, 'Rak 1', '2019-10-01', 'e3c7e7f488e474dbf632d2e378a6969f.jpg'),
(19, 'BackTrack 5 R3 : 100% Attack', 'Stephen', 'Jasakom', '1992', '9789791090797', 3, 'Rak 1', '2019-10-01', '66986_f.jpg'),
(20, 'Blogging : Have Fun', 'Carolina', 'Stiletto', '1992', '9786027572447', 15, 'Rak 1', '2019-10-01', 'b61ab49c7e02b112ddbfc29f623323ca.jpg'),
(21, 'PHP Dan MYSQL', 'R.H. Sianipar', 'Andi', '1992', '9789792952810', 6, 'Rak 1', '2019-10-01', 'BLK_PDM2020614397.jpg'),
(22, 'Buku Sakti Pemrograman Web Seri PHP', 'Mundzir MF', 'Jasakom', '1992', '9789792960297', 10, 'Rak 1', '2019-12-09', '109665_f.jpg'),
(23, 'Matematika Terapan', 'Yusmadi', 'StartUp', '1992', '9789791090872', 20, 'Rak 1', '2019-12-09', 'Matematika-Terapan_Moh.-Hartono_Netprom-Nurhadi-depan-scaled.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int(11) NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id`, `denda`) VALUES
(1, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `id_guru`, `namalengkap`, `telp`, `gambar`) VALUES
(10, 5272, 'SUHERMAN S', '082393448980', ''),
(11, 9289, 'SUHERMAN', '082393448980', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasibuku`
--

CREATE TABLE `tb_lokasibuku` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasibuku`
--

INSERT INTO `tb_lokasibuku` (`id`, `lokasi`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3'),
(4, 'Rak 4'),
(5, 'Rak 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nis`, `username`, `nama`, `password`, `level`, `foto`) VALUES
(1, '', 'admin', 'Laode Fardin', '66b65567cedbc743bda3417fb813b9ba', 'Admin', '04092021150150user-icon_126283-435.jpg'),
(2, '180810', 'siswa', 'Yoga Widianto', '878c109bd30efb8b1f72296c8a03e165', 'Siswa', ''),
(3, '190701', 'Dadi Setiadi', 'Dadi Setiadi1', '96de4eceb9a0c2b9b52c0b618819821b', 'Siswa', ''),
(4, '190702', 'fardin3', 'Annisavira', '96de4eceb9a0c2b9b52c0b618819821b', 'Siswa', ''),
(10, '5272', 'guru', 'SUHERMAN', '3c14e8613538caa3f34c6879fdf70da1', 'Guru', ''),
(11, '9289', '2', 'SUHERMAN', 'b3063f8c0b04435ed2b10a4d9cf1efa5', 'Guru', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `lambat` varchar(100) DEFAULT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `status` enum('Pinjam','Kembali','Hilang','Lunas','Belum diambil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nis`, `nama`, `tanggal_pinjam`, `tanggal_kembali`, `lambat`, `denda`, `status`) VALUES
(219, 'Hackintosh: Jalankan Mac Os X', '180810', 'Yoga Widianto', '2019-12-03', '2019-12-10', '15 ', '7500', 'Kembali'),
(220, 'BackTrack 5 R3 : 100% Attack', '190702', 'Annisavira', '2019-12-03', '2019-12-10', '627 ', '940500', 'Kembali'),
(221, 'Windows 7 Security', '190701', 'Dadi Setiadi', '2019-12-03', '2019-12-10', '15 ', '7500', 'Lunas'),
(222, 'Buku Sakti Pemrograman Web Seri PHP', '190704', 'Tyas Sekar', '2019-12-25', '2020-01-01', '0 ', '0', 'Lunas'),
(224, 'Buku Sakti Pemrograman Web Seri PHP', '190704', 'Tyas Sekar', '2019-12-26', '2020-01-02', NULL, NULL, 'Pinjam'),
(225, 'Blogging : Have Fun', '190702', 'Annisavira', '2021-08-28', '2021-09-04', '0 ', '0', 'Kembali'),
(226, ' 41 Script PHP Siap Pakai', '190701', 'Dadi Setiadi1', '2021-08-29', '2021-09-05', '0 ', '0', 'Kembali'),
(227, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0 ', '0', 'Kembali'),
(228, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-12', '0', '', 'Hilang'),
(229, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0', '', 'Hilang'),
(230, 'Hackintosh: Jalankan Mac Os X', '190701', 'Dadi Setiadi1', '2021-08-29', '2021-09-12', '0', '', 'Hilang'),
(231, 'Hackintosh: Jalankan Mac Os X', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0 ', '0', 'Hilang'),
(232, 'Hackintosh: Jalankan Mac Os X', '180810', 'Yoga Widianto', '2021-08-30', '2021-09-06', '0 ', '0', 'Kembali'),
(233, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-30', '2021-09-20', '0 ', '0', 'Lunas'),
(234, 'Hackintosh: Jalankan Mac Os X', '190701', 'Dadi Setiadi1', '2021-08-31', '2021-09-07', '0 ', '0', 'Hilang'),
(235, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-09-04', '2021-09-11', NULL, NULL, 'Pinjam'),
(257, ' 41 Script PHP Siap Pakai', '2016210001', 'LAODE MUH ZULFARDINSYAH', '2021-09-26', '2021-10-03', NULL, NULL, 'Belum diambil'),
(258, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-11-13', '2021-11-20', NULL, NULL, 'Belum diambil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lokasibuku`
--
ALTER TABLE `tb_lokasibuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_lokasibuku`
--
ALTER TABLE `tb_lokasibuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
