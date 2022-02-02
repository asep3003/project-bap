-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2021 pada 11.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `pokok` bigint(20) DEFAULT NULL,
  `makan` bigint(20) DEFAULT NULL,
  `transport` bigint(20) DEFAULT NULL,
  `total_masuk_kerja` int(11) DEFAULT NULL,
  `lemburan` int(11) DEFAULT NULL,
  `upah_lembur` bigint(20) DEFAULT NULL,
  `total_gaji` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `nama`, `jabatan`, `pokok`, `makan`, `transport`, `total_masuk_kerja`, `lemburan`, `upah_lembur`, `total_gaji`) VALUES
(71, 'Jamal Mustofa', 'Kepala Sekolah', 10000000, 100000, 200000, 20, 10, 2000000, 12300000),
(72, 'Yuni Hastuti', 'Guru Tetap', 10400000, 90000, 150000, 26, 3, 480000, 11120000),
(73, 'Hartaka Rajata', 'Guru Tetap', 10400000, 90000, 150000, 26, 2, 320000, 10960000),
(74, 'Hamima Hariyah', 'Guru Honor', 9100000, 80000, 120000, 26, 5, 750000, 10050000),
(75, 'Abyasa Hardiansyah', 'Tata Usaha', 5200000, 85000, 145000, 26, 0, 0, 5430000),
(76, 'Heryanto Permadi', 'Petugas Sekolah', 3000000, 80000, 100000, 30, 5, 375000, 3555000),
(77, 'Ira Utami', 'Wakil Kepala Sekolah', 11700000, 95000, 190000, 26, 1, 180000, 12165000),
(79, 'Heryanto Permadi', 'Petugas Sekolah', 1000000, 20000, 20000, 10, 1, 75000, 1115000),
(81, 'Kim Taehyung', 'Wakil Kepala Sekolah', 13500000, 100000, 100000, 30, 10, 1800000, 15500000),
(82, 'Udin', 'Petugas Kebersihan', 900000, 30000, 20000, 10, 1, 60000, 1010000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gaji_harian` bigint(20) DEFAULT NULL,
  `upah_lembur` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`, `gaji_harian`, `upah_lembur`) VALUES
(1, 'Kepala Sekolah', 500000, 200000),
(2, 'Wakil Kepala Sekolah', 450000, 180000),
(3, 'Guru Honor', 350000, 150000),
(4, 'Guru Tetap', 400000, 160000),
(5, 'Tata Usaha', 200000, 100000),
(6, 'Petugas Keamanan', 100000, 75000),
(16, 'Petugas Kebersihan', 90000, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rekening` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nik`, `nama`, `jk`, `agama`, `jabatan`, `telepon`, `email`, `alamat`, `rekening`) VALUES
(33, 22100179, 'Jamal Mustofa', 'Pria', 'Islam', 'Kepala Sekolah', '085011551299', 'jamafa@gmail.com', 'Gg. Babah No. 587,  Bogor, Jawa Barat\r\n', '5175 1094 7945 3687'),
(35, 22100150, 'Yuni Hastuti', 'Wanita', 'Islam', 'Guru Tetap', '0851402456499', 'yuniti@gmail.com', 'Gg. Dewi Sartika No. 668, Bogor 16146, Jawa Barat', '4532 9395 6756 1202'),
(36, 22100147, 'Hartaka Rajata', 'Pria', 'Islam', 'Guru Tetap', '087471357807', 'hartta@gmail.com', 'Ds. Hasanuddin No. 580, Bogor 13145, Jawa Barat\r\n', '4024 0071 0962 8'),
(37, 221003470, 'Hamima Hariyah', 'Wanita', 'Islam', 'Guru Honor', '0886172828962', 'hamiah@gmail.com', 'Ds. Gatot Subroto No.286, Bogor 13211, Jawa Barat', '3470 6641 9252 518'),
(38, 22100106, 'Abyasa Hardiansyah', 'Pria', 'Islam', 'Tata Usaha', '08841134597646', 'abyayah@gmail.com', 'Ki. Wahidin No. 90, Balikpapan 77982, Aceh', '5137 4140 3897 4638'),
(39, 22100231, 'Heryanto Permadi', 'Pria', 'Islam', 'Petugas Sekolah', '0886129277032', 'heryaadi@gmail.com', 'Jln. Bank Dagang Negara No. 461, Bogor 10050, DKI', '5415 0581b5218 7932'),
(40, 22100126, 'Ira Utami', 'Wanita', 'Islam', 'Wakil Kepala Sekolah', '08875633761019', 'irautami@gmail.com', 'Gg. Laksamana No. 489, Semarang 39714, Aceh', '5150 8228 2077'),
(52, 12345678, 'Udin', 'Pria', 'Islam', 'Petugas Kebersihan', '08123456789', 'udingg@go.com', 'Kp. Cipayung Jawa barat', '2132121232123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id`, `nama`, `alamat`, `telepon`, `kecamatan`, `pos`, `email`) VALUES
(1, 'SMK Wikrama', 'Jl. Raya Wangun No. 21, RT. 01/RW. 06, Sindangsari', '02518242411', 'Bogor Barat', '16146', 'edukasi@smkwikrama.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$xFe55seRJXYrp/s544cT8uiKhRZlW9GUzHFL/rX9Q4p4QHx0P1ZcK'),
(19, 'nadita', '$2y$10$q6uhWl1Q2Vk5W/L3prsSlOoTKPDmLzvJxcl4UBi3f3IwKY7yvPxyW'),
(21, '12', '$2y$10$6.XjUuaXvHovxXi35jqhMOU0GZsfhSJIC5WeCEgVLDbkzywJQz0U.'),
(22, 'asep', '$2y$10$M4XqkWxT83Ew0.Bfgv9JgeYPHRo.fjCoC/XanfsRaMjo7Lo.sVe/.'),
(23, 'udin', '$2y$10$FD89iREUsDr/7RsyUvQOKOMGnSF7Kcy4Hm.i/rsMvrb20SY3Tl1ay');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
