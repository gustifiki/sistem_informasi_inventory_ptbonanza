-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jan 2022 pada 04.56
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonanza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'gustifikimaulana@gmail.com', '085265706007', 'user-default.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2022-01-13 03:52:34'),
(3, 'manager', 'Manager', '202cb962ac59075b964b07152d234b70', 'bonanzamanager@gmail.com', '082171264064', '', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2022-01-13 03:57:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jabatan` char(30) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_pegawai`, `tanggal_lahir`, `jenis_kelamin`, `telepon`, `jabatan`, `created_user`, `created_date`, `updated_user`, `updated_date`, `id_user`) VALUES
('ID001', 'Ilham Fitroh Saputro', '1994-10-12', 'Laki-laki', '081371216017', 'Direktur', 1, '2022-01-19 04:39:09', 1, '2022-01-19 04:39:09', 0),
('ID002', 'Riki Irwanto', '1990-04-08', 'Laki-laki', '085265657889', 'Wakil Direktur', 1, '2022-01-19 04:39:47', 1, '2022-01-19 04:39:47', 0),
('ID003', 'Deny Perdana Saputro', '1989-09-21', 'Laki-laki', '081267894040', 'Komisaris', 1, '2022-01-19 04:40:26', 1, '2022-01-19 04:40:26', 0),
('ID004', 'Yulia Afriani', '1997-04-19', 'Perempuan', '085217149113', 'Kepala Bagian Pemasaran', 1, '2022-01-19 04:41:24', 1, '2022-01-19 04:41:24', 0),
('ID005', 'Rizka Yulianti', '1997-06-21', 'Perempuan', '085260876543', 'Admin', 1, '2022-01-19 04:42:07', 1, '2022-01-19 04:42:07', 0),
('ID006', 'Edi Rahmadi', '1990-01-07', 'Laki-laki', '081267589090', 'Supir', 1, '2022-01-19 04:42:52', 1, '2022-01-19 04:42:52', 0),
('ID007', 'Julianto', '1997-09-07', 'Laki-laki', '085265461212', 'Supir', 1, '2022-01-19 04:43:27', 1, '2022-01-19 04:43:27', 0),
('ID008', 'Rendi Ramadhan', '1995-10-30', 'Laki-laki', '085765304567', 'Supir', 1, '2022-01-19 04:44:02', 1, '2022-01-19 04:44:02', 0),
('ID009', 'Rahmat Hardiansyah', '1997-02-01', 'Laki-laki', '081245789020', 'Supir', 1, '2022-01-19 04:44:36', 1, '2022-01-24 01:54:17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `plat_mobil` varchar(10) NOT NULL,
  `nama_mobil` varchar(30) NOT NULL,
  `masa_stnk` date NOT NULL,
  `warna_mobil` varchar(20) NOT NULL,
  `tahun_mobil` year(4) NOT NULL,
  `bahan_bakar` varchar(20) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`plat_mobil`, `nama_mobil`, `masa_stnk`, `warna_mobil`, `tahun_mobil`, `bahan_bakar`, `created_user`, `created_date`, `updated_user`, `updated_date`, `id_user`) VALUES
('BM 1290 DF', 'Avanza', '2035-05-06', 'Hitam', 2020, 'Bensin', 1, '2022-01-19 05:04:53', 1, '2022-01-19 05:04:53', 0),
('BM 1290 ZA', 'Xenia', '2023-12-12', 'Abu-abu', 2018, 'Bensin', 1, '2022-01-19 04:56:32', 1, '2022-01-19 05:00:24', 0),
('BM 3221 DA', 'Fortuner', '2024-04-04', 'Hitam', 2019, 'Solar', 1, '2022-01-19 05:01:45', 1, '2022-01-19 05:01:45', 0),
('BM 3567 ST', 'Avanza', '2023-08-12', 'Hitam', 2018, 'Bensin', 1, '2022-01-19 05:03:17', 1, '2022-01-19 05:03:17', 0),
('BM 4322 ZP', 'Avanza', '2024-12-04', 'Hitam', 2019, 'Bensin', 1, '2022-01-19 05:03:47', 1, '2022-01-19 05:03:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat_mobil`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_4` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
