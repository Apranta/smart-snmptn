-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jul 2018 pada 18.52
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

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `nama`, `alamat`, `jabatan`) VALUES
('admin', 'Bapak Admin', 'Viruality 13 blok D', 'admin tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `bobot` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_mapel`, `id_kelas`, `bobot`) VALUES
(1000, 1, 1, '0.1'),
(1001, 7, 6, '0.1'),
(1002, 1, 9, '0.2'),
(1003, 1, 10, '0.2'),
(1004, 1, 11, '0.4'),
(1005, 2, 1, '0.1'),
(1006, 2, 6, '0.1'),
(1007, 2, 9, '0.2'),
(1008, 2, 10, '0.2'),
(1009, 2, 11, '0.4'),
(1010, 9, 1, '0.1'),
(1011, 9, 6, '0.1'),
(1012, 9, 9, '0.2'),
(1013, 9, 10, '0.2'),
(1014, 9, 11, '0.4'),
(1015, 4, 1, '0.1'),
(1016, 4, 6, '0.1'),
(1017, 4, 9, '0.1'),
(1018, 4, 10, '0.1'),
(1019, 4, 11, '0.1'),
(1020, 7, 1, '0.1'),
(1021, 8, 6, '0.1'),
(1022, 8, 9, '0.1'),
(1023, 7, 10, '0.1'),
(1024, 7, 11, '0.1'),
(1025, 8, 1, '0.1'),
(1026, 1, 6, '0.1'),
(1027, 7, 9, '0.1'),
(1028, 8, 10, '0.1'),
(1029, 8, 11, '0.1');

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

--
-- Dumping data untuk tabel `hasil_kuisioner`
--

INSERT INTO `hasil_kuisioner` (`id`, `id_kuisioner`, `nisn`, `jawaban`) VALUES
(3, 7, '111', 'maybe'),
(4, 8, '111', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lomba`
--

CREATE TABLE `jenis_lomba` (
  `id` int(11) NOT NULL,
  `jenis` enum('AKADEMIK','NONAKADEMIK') NOT NULL,
  `jenis_lomba` varchar(100) NOT NULL,
  `persentase` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_lomba`
--

INSERT INTO `jenis_lomba` (`id`, `jenis`, `jenis_lomba`, `persentase`) VALUES
(1, 'AKADEMIK', 'OSN', '0.005'),
(2, 'AKADEMIK', 'OPSI', '0.005'),
(7, 'NONAKADEMIK', 'MUSIC', '0.005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_prestasi`
--

CREATE TABLE `jenjang_prestasi` (
  `id` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL,
  `bobot` decimal(11,1) NOT NULL,
  `persentase` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_prestasi`
--

INSERT INTO `jenjang_prestasi` (`id`, `nama_jenjang`, `bobot`, `persentase`) VALUES
(1, 'Internasional', '1.0', '0.05'),
(2, 'Nasional', '0.8', '0.05'),
(3, 'provinsi', '0.6', '0.05'),
(4, 'kota/kab', '0.4', '0.05'),
(5, 'sekolah', '0.2', '0.05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, 'kelas x/1'),
(6, 'kelas x/2'),
(9, 'kelas xi/1'),
(10, 'kelas xi/2'),
(11, 'kelas xii/1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` varchar(255) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuisioner`
--

INSERT INTO `kuisioner` (`id`, `pertanyaan`, `jawaban`) VALUES
(7, 'apa anda serius dengan jurusan yang anda pilih?', '[\"ya\",\"tidak\",\"maybe\"]'),
(8, 'anda ingin sukses?', '[\"ya\",\"bisa jadi\",\"tidak\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_lomba`
--

CREATE TABLE `mata_lomba` (
  `id_lomba` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_lomba` varchar(100) NOT NULL,
  `bobot` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_lomba`
--

INSERT INTO `mata_lomba` (`id_lomba`, `id_jenis`, `nama_lomba`, `bobot`) VALUES
(1, 1, 'Matematika', '1.0'),
(2, 2, 'Fisika', '1.0'),
(5, 1, 'Biologi', '0.5'),
(58, 7, 'SONG', '2.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `persentase` decimal(11,2) NOT NULL,
  `jurusan` enum('IPA','IPS','UMUM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`, `persentase`, `jurusan`) VALUES
(1, 'biologi', '0.10', 'IPA'),
(2, 'fisika', '0.10', 'IPA'),
(4, 'Matematika', '0.05', 'UMUM'),
(7, 'Bahasa Indonesia', '0.05', 'UMUM'),
(8, 'Bahasa Inggris', '0.05', 'UMUM'),
(9, 'kimia', '0.10', 'IPA');

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

--
-- Dumping data untuk tabel `nilai_jurusan`
--

INSERT INTO `nilai_jurusan` (`id`, `id_bobot`, `nilai`, `nisn`) VALUES
(33, 1000, 78, '111'),
(34, 1026, 80, '111'),
(35, 1002, 84, '111'),
(36, 1003, 86, '111'),
(37, 1004, 88, '111'),
(38, 1005, 75, '111'),
(39, 1006, 80, '111'),
(40, 1007, 80, '111'),
(41, 1008, 80, '111'),
(42, 1009, 82, '111'),
(43, 1010, 83, '111'),
(44, 1011, 85, '111'),
(45, 1012, 85, '111'),
(46, 1013, 87, '111'),
(47, 1014, 88, '111'),
(48, 1015, 75, '111'),
(49, 1016, 80, '111'),
(50, 1017, 84, '111'),
(51, 1018, 80, '111'),
(52, 1019, 87, '111'),
(53, 1020, 77, '111'),
(54, 1001, 81, '111'),
(55, 1027, 89, '111'),
(56, 1023, 90, '111'),
(57, 1024, 90, '111'),
(58, 1025, 86, '111'),
(59, 1021, 88, '111'),
(60, 1022, 88, '111'),
(61, 1028, 94, '111'),
(62, 1029, 95, '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringkat`
--

CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL,
  `nama_peringkat` varchar(100) NOT NULL,
  `bobot` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peringkat`
--

INSERT INTO `peringkat` (`id`, `nama_peringkat`, `bobot`) VALUES
(1, 'Juara 1', '1.0'),
(2, 'Juara 2', '0.8'),
(3, 'Juara 3', '0.6'),
(4, 'harapan', '0.4'),
(5, 'peserta', '0.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_jurusan`
--

CREATE TABLE `pilihan_jurusan` (
  `id_pilihan` int(11) NOT NULL,
  `id_program_studi` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `pilihan_ke` enum('1','2','3') NOT NULL
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

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `mata_lomba`, `id_peringkat`, `id_jenjang`, `nisn`) VALUES
(94, 1, 2, 4, '111'),
(95, 2, 5, 2, '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `grade` double NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id`, `id_universitas`, `nama_prodi`, `grade`, `jurusan`) VALUES
(1, 1, 'Akuntansi', 2.4, 'IPS'),
(2, 2, 'Sistem Informasi', 2.2, 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(100) NOT NULL,
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `psikotes`, `jurusan`, `username`) VALUES
('111', 'ani', 'L', '2018-06-05', 'kartamuliaa', 'palembang', '085758612443', 88, 'IPA', 'syad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id` int(11) NOT NULL,
  `nama_uni` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id`, `nama_uni`, `link`) VALUES
(1, 'ITB', 'http://itb.ac.id'),
(2, 'Unsrii', 'www.unsri.ac.id');

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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('admin', '123', 1),
('sagasaga', '1111', 0),
('syad', '123', 2);

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
  ADD PRIMARY KEY (`id_bobot`),
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
  ADD PRIMARY KEY (`id_lomba`),
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
-- Indexes for table `pilihan_jurusan`
--
ALTER TABLE `pilihan_jurusan`
  ADD PRIMARY KEY (`id_pilihan`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_program_studi` (`id_program_studi`);

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
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

--
-- AUTO_INCREMENT for table `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenjang_prestasi`
--
ALTER TABLE `jenjang_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mata_lomba`
--
ALTER TABLE `mata_lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pilihan_jurusan`
--
ALTER TABLE `pilihan_jurusan`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bobot_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  ADD CONSTRAINT `hasil_kuisioner_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_kuisioner_ibfk_2` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_lomba`
--
ALTER TABLE `mata_lomba`
  ADD CONSTRAINT `mata_lomba_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_lomba` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  ADD CONSTRAINT `nilai_jurusan_ibfk_1` FOREIGN KEY (`id_bobot`) REFERENCES `bobot` (`id_bobot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestasi_ibfk_2` FOREIGN KEY (`id_peringkat`) REFERENCES `peringkat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestasi_ibfk_3` FOREIGN KEY (`mata_lomba`) REFERENCES `mata_lomba` (`id_lomba`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestasi_ibfk_4` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang_prestasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
