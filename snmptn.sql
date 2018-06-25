-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 04:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snmptn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `alamat`, `jabatan`) VALUES
('syad', 'syad', 'kartamulia', 'admin 1');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kuisioner`
--

CREATE TABLE `hasil_kuisioner` (
  `id` int(11) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `jawaban` varchar(255) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lomba`
--

CREATE TABLE `jenis_lomba` (
  `id` int(11) NOT NULL,
  `jenis` enum('AKADEMIK','NONAKADEMIK') NOT NULL,
  `jenis_lomba` varchar(100) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_lomba`
--

INSERT INTO `jenis_lomba` (`id`, `jenis`, `jenis_lomba`, `persentase`) VALUES
(1, 'AKADEMIK', 'OSN', 1),
(2, 'AKADEMIK', 'OPSI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_prestasi`
--

CREATE TABLE `jenjang_prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang_prestasi`
--

INSERT INTO `jenjang_prestasi` (`id`, `nama`, `bobot`, `persentase`) VALUES
(1, 'kota/kabupaten', 0, 0),
(2, 'Internasional', 1, 1),
(3, 'Nasional', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` varchar(255) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id`, `pertanyaan`, `jawaban`) VALUES
(2, 'hmm', 'a,v,c'),
(3, 'eeeeeeeeeee', '[]'),
(11, 'berapa berminat dengan jurusan ini?', 'apa,baik,ya'),
(13, 'sql', 'aa,bb,cc');

-- --------------------------------------------------------

--
-- Table structure for table `mata_lomba`
--

CREATE TABLE `mata_lomba` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `persentase` int(11) NOT NULL,
  `jurusan` enum('IPA','IPS','UMUM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_jurusan`
--

CREATE TABLE `nilai_jurusan` (
  `id` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_jurusan`
--

INSERT INTO `nilai_jurusan` (`id`, `id_bobot`, `nilai`, `nisn`) VALUES
(1, 0, 80, '111');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_umum`
--

CREATE TABLE `nilai_umum` (
  `id` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peringkat`
--

CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peringkat`
--

INSERT INTO `peringkat` (`id`, `nama`, `bobot`) VALUES
(1, 'Kota/kabupaten', 0),
(2, 'sekolah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `mata_lomba` int(11) NOT NULL,
  `id_peringkat` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `grade` double NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `id_universitas`, `nama_prodi`, `grade`, `jurusan`) VALUES
(1, 1, 'Teknik Informatika', 2, 'IPA'),
(2, 2, 'Sistem Informasi', 1.5, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `psikotes` double NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `psikotes`, `jurusan`, `username`) VALUES
(0, 'wer', 'L', '2018-06-13', 'w', '111', '', 0, 'IPS', ''),
(111, '', 'L', '0000-00-00', '', '', '', 0, '', ''),
(123, 'syad', 'L', '2018-06-13', 'kakrtamulia', 'kakrtamulia', '085758612443', 8, 'IPA', 'syad'),
(11111, 'www', 'P', '2018-06-01', '', '', '', 0, 'IPS', '');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id` int(11) NOT NULL,
  `nama_uni` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id`, `nama_uni`, `link`) VALUES
(1, 'UI', 'https://www.ui.ac.id'),
(2, 'UNSRI', 'unsri.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(33) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `username` (`username`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kuisioner` (`id_kuisioner`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenjang_prestasi`
--
ALTER TABLE `jenjang_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_lomba`
--
ALTER TABLE `mata_lomba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bobot` (`id_bobot`);

--
-- Indexes for table `nilai_umum`
--
ALTER TABLE `nilai_umum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bobot` (`id_bobot`);

--
-- Indexes for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peringkat` (`id_peringkat`),
  ADD KEY `mata_lomba` (`mata_lomba`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_universitas` (`id_universitas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenjang_prestasi`
--
ALTER TABLE `jenjang_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mata_lomba`
--
ALTER TABLE `mata_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_umum`
--
ALTER TABLE `nilai_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
