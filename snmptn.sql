-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jun 2018 pada 18.46
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(9, 1, 5, '0.4'),
(99, 2, 5, '2.0'),
(101, 4, 5, '0.1'),
(103, 1, 1, '0.5'),
(104, 1, 6, '0.8'),
(989, 8, 5, '2.1');

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
(1, 5, '111', 'br'),
(2, 6, '111', 'tidak begitu');

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

--
-- Dumping data untuk tabel `jenis_lomba`
--

INSERT INTO `jenis_lomba` (`id`, `jenis`, `jenis_lomba`, `persentase`) VALUES
(1, 'AKADEMIK', 'OSN', 1),
(2, 'AKADEMIK', 'OPSI', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_prestasi`
--

CREATE TABLE `jenjang_prestasi` (
  `id` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL,
  `bobot` decimal(11,1) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_prestasi`
--

INSERT INTO `jenjang_prestasi` (`id`, `nama_jenjang`, `bobot`, `persentase`) VALUES
(1, 'Internasional', '0.5', 1),
(2, 'Nasional', '0.5', 1);

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
(5, 'kelas xi/2'),
(6, 'kelas x/2');

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
(5, 'cobar', '["ar","br"]'),
(6, 'apa anda senang?', '["ya, juga","tidak begitu","gakpeuliwe"]');

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
(5, 1, 'Biologi', '0.5');

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

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`, `persentase`, `jurusan`) VALUES
(1, 'biologi', 50, 'IPA'),
(2, 'fisikaa', 80, 'IPA'),
(4, 'Matematika', 50, 'IPA'),
(7, 'Bahasa Indonesia', 50, 'UMUM'),
(8, 'Bahasa Inggris', 50, 'UMUM');

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
(18, 989, 1, '111'),
(19, 103, 1, '111'),
(20, 104, 0, '111'),
(21, 9, 1, '111'),
(22, 99, 1, '111'),
(23, 101, 1, '111');

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
(3, 'Juara 3', '0.5');

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
('111', 'syad', 'L', '2018-06-05', 'kartamulia', 'kartamuliakartamuliakartamuliakartamuliakartamuliakartamulia', '085758612443', 555, 'IPA', 'syad'),
('222', '', '', '0000-00-00', '', '', '', 0, '', 'baru');

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
('baru', '123', 2),
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
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;
--
-- AUTO_INCREMENT for table `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenjang_prestasi`
--
ALTER TABLE `jenjang_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mata_lomba`
--
ALTER TABLE `mata_lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
