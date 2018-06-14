-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2018 pada 11.51
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_kuisioner`
--

CREATE TABLE `hasil_kuisioner` (
  `id` int(11) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `jawaban` varchar(255) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lomba`
--

CREATE TABLE `jenis_lomba` (
  `id` int(11) NOT NULL,
  `jenis` enum('AKADEMIK','NONAKADEMIK') NOT NULL,
  `jenis_lomba` varchar(100) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_prestasi`
--

CREATE TABLE `jenjang_prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` varchar(255) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_lomba`
--

CREATE TABLE `mata_lomba` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `persentase` int(11) NOT NULL,
  `jurusan` enum('IPA','IPS','UMUM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_jurusan`
--

CREATE TABLE `nilai_jurusan` (
  `id` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringkat`
--

CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
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
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `grade` double NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang_prestasi`
--
ALTER TABLE `jenjang_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
