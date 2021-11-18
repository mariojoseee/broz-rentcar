-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 10:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` char(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama_admin`, `no_telp`, `username`, `password`) VALUES
('1915323100', 'Mario Jose', '085737112273', 'mariobroz@gmail.com', '$2y$10$R78WvK0ur0dPO6X9Tng/NOYgBR.i8/oba5tqpZZknLHFbtDVDhIfG');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cst` int(11) NOT NULL,
  `nama_cst` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cst`, `nama_cst`, `no_telp`, `username`, `password`) VALUES
(6, 'Bambang Budiman', '082145451277', 'bambangbudiman@gmail.com', '$2y$10$98LtBwYuzPa8.Q3twoQo9uu7daLD41qZger4zcHARDUIwTmzDVuCG'),
(13, 'Toni Budiman', '089865431211', 'tonibudiman@gmail.com', '$2y$10$HMVu0.rHEC2xtVlvXCw7L.5unzOxvOux/tXeAqFo4b0VGmZL8ig2C'),
(14, 'Adi Budiman', '087766551232', 'adibudiman@gmail.com', '$2y$10$Aze10Qk6XTB3FquIFgADR.hPAbT5P.QxxG6VQaE1wP1doIo0PCJwC'),
(15, 'Budi Budiman', '082115451999', 'budibudiman@gmail', '$2y$10$17oxMBjskgv.bLwZpvOkouXHDUfJPS2O04Z6Le8Bx0XL/.9JiYrEa'),
(16, 'Anto Budiman', '082145451888', 'antobudiman@gmail.com', '$2y$10$LTpMXb8j4gyJD3y2cIZwDu1rYC3RuoiT2Myt/gpt19szdKGJa01wG'),
(17, 'Joko Budiman', '089898982551', 'jokobudiman@gmail.com', '$2y$10$v0vcc4Sg0O.xhk9W.vVHZO0U9Yf1VdeNY1.3/f6vWrLT3BybZofDS'),
(18, 'Boby Budiman', '082716251433', 'bobybudiman@gmail.com', '$2y$10$PgqReEGQ2TjTtCaJIUYYje2qYVcBuN4n3imJPpROwB.BeEdPRxir2');

-- --------------------------------------------------------

--
-- Table structure for table `datasewa`
--

CREATE TABLE `datasewa` (
  `id_sewa` int(11) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `bukti_ktp` varchar(200) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_sewa` int(3) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `bukti_bayar` varchar(200) DEFAULT NULL,
  `id_cst` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasewa`
--

INSERT INTO `datasewa` (`id_sewa`, `no_ktp`, `bukti_ktp`, `tgl_sewa`, `lama_sewa`, `status`, `bukti_bayar`, `id_cst`, `id_mobil`) VALUES
(6, '510201765412', '60fe60a6c7b56.jpg', '2021-07-28', 2, '1', '618a1c1dcb2f2.jpg', 6, 11),
(12, '510201765412', '6101fea0d528e.jpg', '2021-07-29', 2, '1', NULL, 16, 18);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `transmisi` varchar(50) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `kursi` int(5) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `id_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nopol`, `merk`, `nama_mobil`, `warna`, `gambar`, `tahun`, `harga`, `transmisi`, `mesin`, `kursi`, `status`, `id_pemilik`) VALUES
(11, 'DK 5521 HJ', 'Honda', 'Brio E CVT', 'Kuning', 'brio-e-cvt.png', '2021', 320000, 'Otomatis', '1,199 cc', 5, '0', 1),
(12, 'DK 8754 KM', 'Toyota', 'Avanza 1.3 G MT', 'Hitam', '60e7c4d900851.png', '2021', 300000, 'Manual', '1,298 cc', 7, '1', 3),
(13, 'DK 1122 AF', 'Daihatsu', 'Xenia 1.3 R MT', 'Putih', '60e7c546e12c0.png', '2021', 340000, 'Manual', '1,300 cc', 7, '0', 1),
(14, 'DK 1190 AS', 'Datsun', 'Go Panca T-MT', 'Merah', '60e7d065cfd5d.png', '2021', 280000, 'Manual', '1,200 cc', 5, '1', 2),
(17, 'DK 9896 AF', 'Mazda', 'All New Mazda MX-5', 'Putih', '60f113721798d.png', '2020', 840000, 'Otomatis', '1,998 cc', 2, '1', 1),
(18, 'DK 1219 KP', 'Wuling', 'Almaz RS 1.5T Pro 17 inch', 'Putih', '60f114038b8dd.png', '2019', 330000, 'Otomatis', '1,451 cc', 7, '0', 4),
(19, 'DK 8856 SG', 'Wuling', 'Formo 1.2 MB MT', 'Putih', '60f114d284c18.png', '2018', 285000, 'Manual', '1,206 cc', 7, '1', 6),
(20, 'DK 5521 BV', 'Isuzu', 'MU-X 2.5L AT Royale', 'Abu-abu', '60f115926ef03.png', '2019', 415000, 'Manual', '2,499 cc', 7, '1', 1),
(21, 'DK 1766 EB', 'Mitsubishi', 'Xpander Ultimate AT', 'Abu-abu', '60fe295ae8a09.png', '2017', 570000, 'Otomatis', '1,499 cc', 7, '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pemilikmobil`
--

CREATE TABLE `pemilikmobil` (
  `id_pemilik` int(11) NOT NULL,
  `no_stnk` varchar(10) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilikmobil`
--

INSERT INTO `pemilikmobil` (`id_pemilik`, `no_stnk`, `nama_pemilik`, `no_telp`, `alamat`) VALUES
(1, '8976576100', 'BROZ RENT CAR (DEALER)', '089876543288', 'Selemadeg - Tabanan, Bali'),
(2, '6152439000', 'Dhanny Narendra', '085737112233', 'Mengwi - Badung, Bali'),
(3, '1312432788', 'Bayu Merta Nadi', '082187877859', 'Denpasar Utara - Denpasar, Bali'),
(4, '0909878433', 'Mahadi Saputra', '089281928199', 'Gerogak - Buleleng, Bali'),
(6, '8782123008', 'Ananda Krisnha', '082413241399', 'Negara - Jembrana, Bali'),
(7, '1798545198', 'Prasbudi Witantra', '089218282811', 'Banjarangkan - Klungkung, Bali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cst`);

--
-- Indexes for table `datasewa`
--
ALTER TABLE `datasewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_cst`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemilikmobil`
--
ALTER TABLE `pemilikmobil`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `datasewa`
--
ALTER TABLE `datasewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pemilikmobil`
--
ALTER TABLE `pemilikmobil`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datasewa`
--
ALTER TABLE `datasewa`
  ADD CONSTRAINT `fk_cst` FOREIGN KEY (`id_cst`) REFERENCES `customer` (`id_cst`),
  ADD CONSTRAINT `fk_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fk_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilikmobil` (`id_pemilik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
