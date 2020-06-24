-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 11:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silab`
--

-- --------------------------------------------------------

--
-- Table structure for table `internal_control`
--

CREATE TABLE `internal_control` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `lot_number` varchar(30) NOT NULL,
  `mean` varchar(255) NOT NULL,
  `sd` varchar(255) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logistik`
--

CREATE TABLE `logistik` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` int(255) NOT NULL,
  `no_lot` int(30) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` int(255) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `desk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `sub`, `parent_id`, `desk`) VALUES
(1, 1, 0, 'KIMIA KLINIK'),
(2, 1, 0, 'HEMATOLOGI'),
(3, 1, 0, 'MIKROBIOLOGI'),
(4, 1, 0, 'PARASITOLOGI'),
(5, 1, 0, 'IMUNOSEROLOGI'),
(6, 1, 0, 'SITOHISTOTEKNOLOGI'),
(7, 1, 1, 'URINALISIS'),
(8, 1, 1, 'KIMIA DARAH'),
(9, 1, 1, 'ELEKTROLIT'),
(10, 1, 1, 'PEMERIKSAAN SPERMA');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kab` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `kel` varchar(255) NOT NULL,
  `tlep` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `id_poli`, `nama`, `jk`, `lahir`, `alamat`, `kab`, `kec`, `kel`, `tlep`, `email`) VALUES
(17, 3, 'Diana Shafina', 'Perempuan', '2011-08-19', 'Gg. Jambu No.3 RT01 RW02 Karang Kajen', 'Yogyakarta', 'Mergangsan', 'Brontokusuman', '', ''),
(19, 1, 'Muchamad Ainul Rokhman', 'Laki-laki', '1998-06-22', 'Dk Brengkok RT 02/04', 'Brebes', 'Paguyangan', 'Taraban', '85227099929', 'ainulrokhman7@gmail.com'),
(20, 1, 'Koko Maryoko', 'Laki-laki', '2011-08-19', 'Cipari', 'Cilacap', 'Embuh', 'Embuh', '789454165', 'asasads');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `poliklinik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id`, `dokter`, `poliklinik`) VALUES
(1, 'dr. Akbar Kurniawan, M.Kes', 'Umum'),
(2, 'dr. Indra Yulius Darmawan, Sp.PD', 'Penyakit Dalam'),
(3, 'drg. Stephanie Amelia Christanto, M.Kes', 'Spesialis Gigi'),
(4, 'dr. Ditha Paramasitha, Sp.M', 'Mata'),
(5, 'dr. Olivia Franciska Laksmana, Sp.OG', 'Kandungan'),
(6, 'dr. Yanuar Iman Santosa, Sp.THT-KL', 'THT');

-- --------------------------------------------------------

--
-- Table structure for table `p_lab`
--

CREATE TABLE `p_lab` (
  `id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_lab`
--

INSERT INTO `p_lab` (`id`, `no_reg`, `id_pasien`, `id_submenu`, `tanggal`, `jam`, `status`) VALUES
(28, '19200619', 19, 1, '2020-06-19', '15.21 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resiko`
--

CREATE TABLE `resiko` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dampak` int(11) NOT NULL,
  `peluang` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resiko`
--

INSERT INTO `resiko` (`id`, `nama`, `dampak`, `peluang`, `score`) VALUES
(1, 'TIDAK MENGGUNAKAN APD', 5, 4, 20),
(2, 'KEGAGALAN DALAM PENGAMBILAN SAMPEL SEHINGGA MENIMBULKAN PERLUKAAN', 5, 1, 5),
(3, 'SAMPEL RUSAK ATAU HILANG', 5, 1, 5),
(4, 'HASIL PEMERIKSAAN HILANG ATAU TERTUKAR', 5, 1, 5),
(5, 'KESALAHAN PENGAMBILAN SAMPEL', 5, 4, 20),
(6, 'KESALAHAN PEMBERIAN LABEL SAMPEL LABORATORIUM', 5, 4, 20),
(7, 'KESALAHAN PENULISAN HASIL LABORATORIUM', 5, 5, 25),
(8, 'TERTELAH BAHAN INFEKSIUS', 5, 1, 5),
(9, 'TERTUSUK JARUM', 5, 1, 5),
(10, 'KEJADIAN HEMATOMA SAAT PENGAMBILAN DARAH VENA', 5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `desk` varchar(255) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `parent_id`, `desk`, `harga`) VALUES
(1, 7, 'Makroskopis', '10000'),
(2, 7, 'Kimia Urine (Glukosa, protein, bilirubin, urobilinogen, pH, berat jenis, benda keton)', '20000'),
(3, 7, 'Sedimen Urine', '10000'),
(4, 8, 'Glukosa', '15500'),
(5, 8, 'Cholesterol', '18000'),
(6, 8, 'Trigliserid', '18000'),
(7, 8, 'HDL', '20000'),
(8, 8, 'LDL', '65500'),
(9, 8, 'Asam Urat', '20000'),
(10, 8, 'Kreatinin', '20000'),
(11, 8, 'Ureum', '20000'),
(12, 8, 'Bilirubin', '20000'),
(13, 8, 'Albumin', '25000'),
(14, 8, 'Protein Total', '25000'),
(15, 8, 'SGOT', '20000'),
(16, 8, 'SGPT', '20000'),
(17, 8, 'ALP', '20000'),
(18, 9, 'Natrium', '30000'),
(19, 9, 'Kalium', '30000'),
(20, 9, 'Klorida', '30000'),
(21, 9, 'Kalsium', '30000'),
(22, 9, 'Magnesium', '30000'),
(23, 10, 'Makroskopis', '10000'),
(24, 10, 'Mikroskopis', '10000'),
(25, 2, 'Darah rutin', '34000'),
(26, 2, 'Darah lengkap', '40900'),
(27, 2, 'Indeks Eritrosit (MCV, MCH, MCHC)', '25000'),
(28, 2, 'Khusus (Retikulosit, Coomb\'s test, gambaran darah tepi, sumsum tulang)', '8600'),
(29, 2, 'Golongan darah + rhesus', '13500'),
(30, 2, 'Clothing Time', '9600'),
(31, 2, 'Bleeding Time', '9600'),
(32, 3, 'Preparat Gram', '20000'),
(33, 3, 'Preparat BTA', '20000'),
(34, 3, 'Jamur', '20000'),
(35, 4, 'Feses rutin', '15000'),
(36, 4, 'Malaria', '20000'),
(37, 5, 'Widal', '150000'),
(38, 5, 'HIV', '120000'),
(39, 5, 'Anti HIV', '120000'),
(40, 5, 'HBsAg', '37000'),
(41, 5, 'VDRL', '25000'),
(42, 5, 'TPHA', '25000'),
(43, 5, 'IgM Salmonella / Tubex', '25000'),
(44, 5, 'ASTO', '39000'),
(45, 5, 'CRP', '39000'),
(46, 5, 'RF', '39000'),
(47, 5, 'Anti HCV', '39000'),
(48, 5, 'Anti HAV', '39000'),
(49, 5, 'NS 1', '39000'),
(50, 6, 'Pemeriksaan Jaringan', '350000'),
(51, 6, 'Pemeriksaan FNAB & Pap Smear', '370000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$8hPcMJNhCa0JaM8PEHxgH.45iVKC5y70y0vib3MpkLNEZBZlN/LTa'),
(3, 'administrator', 'administrator', '$2y$10$WSw6d3H6pgEEkvlSqkXaTO83KleLp/pkxtylmYvCEv5R0FNmsOqDS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lab`
-- (See below for the actual view)
--
CREATE TABLE `v_lab` (
`no_reg` varchar(20)
,`nama` varchar(255)
,`lahir` varchar(255)
,`tanggal` varchar(10)
,`jam` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pasien`
-- (See below for the actual view)
--
CREATE TABLE `v_pasien` (
`id` int(11)
,`nama` varchar(255)
,`jk` varchar(255)
,`lahir` varchar(255)
,`alamat` text
,`kab` varchar(255)
,`kec` varchar(255)
,`kel` varchar(255)
,`tlep` varchar(15)
,`email` varchar(100)
,`poliklinik` varchar(255)
,`dokter` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_lab`
--
DROP TABLE IF EXISTS `v_lab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lab`  AS  select `p`.`no_reg` AS `no_reg`,`ps`.`nama` AS `nama`,`ps`.`lahir` AS `lahir`,`p`.`tanggal` AS `tanggal`,`p`.`jam` AS `jam` from (`p_lab` `p` join `pasien` `ps` on(`p`.`id_pasien` = `ps`.`id`)) group by `p`.`no_reg` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pasien`
--
DROP TABLE IF EXISTS `v_pasien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pasien`  AS  select `pasien`.`id` AS `id`,`pasien`.`nama` AS `nama`,`pasien`.`jk` AS `jk`,`pasien`.`lahir` AS `lahir`,`pasien`.`alamat` AS `alamat`,`pasien`.`kab` AS `kab`,`pasien`.`kec` AS `kec`,`pasien`.`kel` AS `kel`,`pasien`.`tlep` AS `tlep`,`pasien`.`email` AS `email`,`poliklinik`.`poliklinik` AS `poliklinik`,`poliklinik`.`dokter` AS `dokter` from (`pasien` join `poliklinik`) where `pasien`.`id_poli` = `poliklinik`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internal_control`
--
ALTER TABLE `internal_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_lab`
--
ALTER TABLE `p_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko`
--
ALTER TABLE `resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internal_control`
--
ALTER TABLE `internal_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_lab`
--
ALTER TABLE `p_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `resiko`
--
ALTER TABLE `resiko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
