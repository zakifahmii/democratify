-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 04:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `democratify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ADMIN', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('10','11','12') NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nama`, `kelas`, `visi`, `misi`, `gambar`) VALUES
(1, 'Krisna Aditama', '11', 'Membangun komunitas siswa yang berakhlak mulia dan berdaya saing tinggi berdasarkan nilai-nilai keadilan, kesederhanaan, dan keberanian.', 'Menanamkan nilai-nilai kejujuran, kesederhanaan, dan tanggung jawab dalam setiap aspek kehidupan siswa dengan mengembangkan keterampilan kepemimpinan yang berbasis pada keadilan, keberanian, dan empati serta mendorong siswa untuk aktif berkontribusi dalam kegiatan sosial dan pembangunan komunitas.', 'krisna.jpg'),
(2, 'Muhammad Zaki Fahmi', '11', 'Menjadi garda terdepan dalam membangun kepemimpinan yang kuat, keadilan yang menyeluruh, dan kemajuan berkelanjutan.', 'Mengembangkan kepemimpinan yang adil dan berwibawa di kalangan siswa, dengan mengutamakan kejujuran, keadilan, dan keberanian dengan memperkuat jaringan solidaritas dan persatuan di antara siswa melalui kegiatan-kegiatan yang memupuk rasa saling menghargai dan tolong-menolong serta menyediakan platform bagi siswa untuk berpartisipasi aktif dalam pembangunan lingkungan sekolah yang inklusif dan berbudaya.', 'download (6).jpeg'),
(3, 'Othneil Widya Pangemanan', '11', 'Menjadi pilar keberanian, keteguhan, dan keadilan dalam membangun komunitas siswa yang inklusif dan berdaya saing tinggi.', 'Memupuk semangat kepemimpinan yang kuat dan bertanggung jawab di kalangan siswa, dengan menekankan pentingnya integritas, keberanian, dan keadilan dengan mendorong partisipasi aktif siswa dalam kegiatan sosial, budaya, dan akademik yang memperkaya pengalaman belajar mereka serta menyediakan platform bagi siswa untuk mengembangkan keterampilan komunikasi, kolaborasi, dan kepemimpinan melalui berbagai kegiatan ekstrakurikuler dan pelatihan.', 'Is _Pachinko_ Star Lee Min-Ho Single_ Here\'s What We Know.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('10','11','12') NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jurusan` enum('IPA','IPS','Bahasa') NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `tgl_lahir`, `jurusan`, `jk`) VALUES
(19221000, 'Ahmad Fadil', '11', '2005-03-12', 'IPA', 'Laki-Laki'),
(19221001, 'Budi Santoso', '10', '2006-07-25', 'IPS', 'Laki-Laki'),
(19221002, 'Cindy Putri', '12', '2004-11-10', 'IPA', 'Perempuan'),
(19221003, 'Dewi Lestari', '10', '2007-02-18', 'IPS', 'Perempuan'),
(19221004, 'Eko Prasetyo', '11', '2005-09-30', 'IPA', 'Laki-Laki'),
(19221005, 'Fira Ananda', '10', '2006-04-03', 'IPA', 'Perempuan'),
(19221006, 'Galih Pratama', '12', '2004-08-15', 'IPS', 'Laki-Laki'),
(19221007, 'Hana Fitriana', '11', '2005-12-28', 'IPA', 'Perempuan'),
(19221008, 'Irfan Rahman', '10', '2006-10-09', 'IPS', 'Laki-Laki'),
(19221009, 'Joko Susilo', '12', '2004-03-21', 'IPA', 'Laki-Laki'),
(19221010, 'Kartika Sari', '11', '2005-05-17', 'IPS', 'Perempuan'),
(19221011, 'Lukman Hakim', '10', '2006-09-02', 'IPA', 'Laki-Laki'),
(19221012, 'Mega Safitri', '12', '2004-11-11', 'IPS', 'Perempuan'),
(19221013, 'Nadia Putri', '11', '2005-02-14', 'IPA', 'Perempuan'),
(19221014, 'Oscar Wijaya', '10', '2006-07-07', 'IPS', 'Laki-Laki'),
(19221015, 'Putri Cahaya', '12', '2004-12-19', 'IPA', 'Perempuan'),
(19221016, 'Qori Hidayat', '11', '2005-08-23', 'IPS', 'Laki-Laki'),
(19221017, 'Ratna Wulandari', '10', '2006-01-30', 'IPA', 'Perempuan'),
(19221018, 'Surya Pratama', '12', '2004-05-04', 'IPS', 'Laki-Laki'),
(19221019, 'Tania Dewi', '11', '2005-10-13', 'IPA', 'Perempuan'),
(19221020, 'Umar Said', '10', '2006-02-26', 'IPS', 'Laki-Laki'),
(19221021, 'Vina Agustina', '12', '2004-07-09', 'IPA', 'Perempuan'),
(19221022, 'Wahyu Nugroho', '11', '2005-11-24', 'IPS', 'Laki-Laki'),
(19221023, 'Xena Sari', '10', '2006-06-06', 'IPA', 'Perempuan'),
(19221024, 'Yoga Pratama', '12', '2004-10-18', 'IPS', 'Laki-Laki'),
(19221025, 'Zahra Indah', '11', '2005-04-27', 'IPA', 'Perempuan'),
(19221026, 'Adi Wijaya', '10', '2006-08-08', 'IPS', 'Laki-Laki'),
(19221027, 'Bunga Melati', '12', '2004-12-31', 'IPA', 'Perempuan'),
(19221028, 'Cahyo Dwi', '11', '2005-09-14', 'IPS', 'Laki-Laki'),
(19221029, 'Dian Anggraini', '10', '2006-04-25', 'IPA', 'Perempuan'),
(19221030, 'Edo Saputra', '12', '2004-08-27', 'IPS', 'Laki-Laki'),
(19221031, 'Fitri Handayani', '11', '2005-12-10', 'IPA', 'Perempuan'),
(19221032, 'Gita Permata', '10', '2006-11-20', 'IPS', 'Perempuan'),
(19221033, 'Hadi Firmansyah', '12', '2004-04-13', 'IPA', 'Laki-Laki'),
(19221034, 'Ina Mariana', '11', '2005-06-26', 'IPS', 'Perempuan'),
(19221035, 'Joko Susanto', '10', '2006-09-07', 'IPA', 'Laki-Laki'),
(19221036, 'Kartika Wijaya', '12', '2004-02-09', 'IPS', 'Perempuan'),
(19221037, 'Laras Pratiwi', '11', '2005-03-22', 'IPA', 'Perempuan'),
(19221038, 'Maman Soleh', '10', '2006-07-04', 'IPS', 'Laki-Laki'),
(19221039, 'Nadia Fitriani', '12', '2004-09-15', 'IPA', 'Perempuan'),
(19221040, 'Oscar Purnama', '11', '2005-01-28', 'IPS', 'Laki-Laki'),
(19221041, 'Putri Cahyani', '10', '2006-06-10', 'IPA', 'Perempuan'),
(19221042, 'Qori Ramadhan', '12', '2004-11-22', 'IPS', 'Laki-Laki'),
(19221043, 'Ratna Sari', '11', '2005-05-05', 'IPA', 'Perempuan'),
(19221044, 'Surya Pranata', '10', '2006-10-17', 'IPS', 'Laki-Laki'),
(19221045, 'Tania Amelia', '12', '2004-03-30', 'IPA', 'Perempuan'),
(19221046, 'Umar Syah', '11', '2005-07-13', 'IPS', 'Laki-Laki'),
(19221047, 'Vina Dewi', '10', '2006-12-24', 'IPA', 'Perempuan'),
(19221048, 'Wahyu Setiawan', '12', '2004-04-06', 'IPS', 'Laki-Laki'),
(19221049, 'Xena Kartika', '11', '2005-06-19', 'IPA', 'Perempuan'),
(19221050, 'Yoga Putra', '10', '2006-08-30', 'IPS', 'Laki-Laki'),
(19221051, 'Anita Sari', '10', '2006-05-15', 'Bahasa', 'Perempuan'),
(19221052, 'Bambang Wijaya', '12', '2004-09-08', 'Bahasa', 'Laki-Laki'),
(19221053, 'Citra Dewi', '11', '2005-02-03', 'Bahasa', 'Perempuan'),
(19221054, 'Dodi Hermawan', '10', '2006-08-22', 'Bahasa', 'Laki-Laki'),
(19221055, 'Euis Fitriani', '12', '2004-12-11', 'Bahasa', 'Perempuan'),
(19221056, 'Fahmi Abdullah', '11', '2005-04-14', 'Bahasa', 'Laki-Laki'),
(19221057, 'Gita Lestari', '10', '2006-07-27', 'Bahasa', 'Perempuan'),
(19221058, 'Hadi Setiawan', '12', '2004-11-30', 'Bahasa', 'Laki-Laki'),
(19221059, 'Ika Sulastri', '11', '2005-03-05', 'Bahasa', 'Perempuan'),
(19221060, 'Joko Widodo', '10', '2006-06-18', 'Bahasa', 'Laki-Laki'),
(19221061, 'Kartini Dewi', '12', '2004-10-21', 'Bahasa', 'Perempuan'),
(19221062, 'Lukman Suharto', '11', '2005-01-24', 'Bahasa', 'Laki-Laki'),
(19221063, 'Mega Rahayu', '10', '2006-04-07', 'Bahasa', 'Perempuan'),
(19221064, 'Nadia Nurani', '12', '2004-08-10', 'Bahasa', 'Perempuan'),
(19221065, 'Oscar Saputra', '11', '2005-12-23', 'Bahasa', 'Laki-Laki'),
(19221075, 'Siti Nurjanah', '11', '2006-05-19', 'Bahasa', 'Perempuan'),
(19221076, 'Audrey Aulia', '10', '2008-04-21', 'IPA', 'Perempuan'),
(19221279, 'Maria Christie Ana Ebu Da Rendu', '11', '2006-04-23', 'IPS', 'Perempuan'),
(19221502, 'Anggi Permata Assafa', '10', '2008-08-02', 'IPA', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id_timer` int(10) NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id_timer`, `end_time`) VALUES
(1, '2024-06-10 12:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id_voting` int(10) NOT NULL,
  `id_kandidat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id_timer`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id_voting`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id_timer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id_voting` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
