-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2024 pada 17.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vilia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Robet', 'robet0010@gmail.com', 'default.jpg', '$2y$10$bemXbplfauLNeajbyb3oz.NQFCWso6PfSc0v4tOB.13dj8wiy1kse', 1, 1, 1706108813);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` text NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `file` blob NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `is_active` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `ttl`, `nik`, `email`, `no_telp`, `jenis_kelamin`, `status`, `alamat`, `file`, `departemen`, `date_created`, `image`, `is_active`, `password`, `role_id`) VALUES
(14, 'Wahyu', 'Jember 8 Agutus 2004', '111111111111111111', 'wahyu001@gmail.com', '0899999999', 'Pria', 'Menikah', 'Rumah', '', 'Finansial', 1707653666, 'default.jpg', 1, '$2y$10$9Z7/OMt8FfgS1sghukaXYukxQYgIFOl7BhH8pzFToaAhFmgEx13be', 2),
(16, 'Donny', 'sdasdasdasdasd', '1111111111111', 'donny01@gmail.com', '231312312', 'Pria', 'Belum Menikah', 'dasdasdasdasdasdsa', 0x3135352d41727469636c655f546578742d3431302d322d31302d32303231303833302e706466, 'Marketing', 1708609512, 'default.jpg', 1, '$2y$10$9PsT4ADX4rcLl.fs/qJOOeanXu1LPUF.eJX8YkHWnYMdQlP4t4odm', 2),
(17, 'keivin', 'fsdfsdfsdf', '00000000000000', 'keiv1n01@gmail.com', '34324234', 'Pria', 'Menikah', 'fsfsfsdfsdf', 0x3135352d41727469636c655f546578742d3431302d322d31302d3230323130383330312e706466, 'Marketing', 1708609859, 'default.jpg', 1, '$2y$10$JlFF.7Mk3Aw5vBdbJV.5ReK/orA77nMCKCENJFKD4HgTsrL8OTcdO', 2),
(18, 'Mey', '', '', 'mey12345@gmail.com', '', '', '', '', '', '', 1708610450, 'default.jpg', 1, '$2y$10$zlYpfEoynIWlMMfFFBoD5.9WQtkk8C7Dcf2HFtqeIu1f/I3WBiiQ.', 2);

--
-- Trigger `alternatif`
--
DELIMITER $$
CREATE TRIGGER `after_delete_trigger` AFTER DELETE ON `alternatif` FOR EACH ROW BEGIN
    DELETE FROM penilaian WHERE id_alternatif = OLD.id_alternatif;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 14, 0.6111),
(2, 16, 0.3889),
(3, 17, 0.1852),
(4, 18, 0.6111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `bobot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`) VALUES
(24, 'Pengalaman Kerja', 'C1', '0.2778'),
(25, 'Nilai Test', 'C2', '0.2222'),
(26, 'Jenjang Pendidikan', 'C3', '0.2222'),
(27, 'Status Perkawinan', 'C4', '0.1111'),
(28, 'Umur', 'C5', '0.1667');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(489, 14, 24, 178),
(490, 14, 25, 172),
(491, 14, 26, 176),
(492, 14, 27, 174),
(493, 14, 28, 170),
(499, 16, 24, 163),
(500, 16, 25, 172),
(501, 16, 26, 171),
(502, 16, 27, 174),
(503, 16, 28, 175),
(504, 17, 24, 173),
(505, 17, 25, 172),
(506, 17, 26, 166),
(507, 17, 27, 169),
(508, 17, 28, 170),
(509, 18, 24, 163),
(510, 18, 25, 177),
(511, 18, 26, 171),
(512, 18, 27, 174),
(513, 18, 28, 175);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(156, 24, 'Tidak ada', '1'),
(160, 28, '44 - 54 Tahun', '1'),
(162, 25, '0 - 39', '2'),
(163, 24, '1 - 6 Bulan', '2'),
(164, 27, 'Menikah', '2'),
(165, 28, '36 - 44 Tahun', '2'),
(166, 26, 'Pendidikan SMA', '3'),
(167, 25, '40 - 59', '3'),
(168, 24, '7 Bulan - 2 Tahun', '3'),
(169, 27, 'Janda - Duda', '3'),
(170, 28, '28 - 35 Tahun', '3'),
(171, 26, 'Pendidikan D3', '4'),
(172, 25, '60 - 79', '4'),
(173, 24, '2 - 5 Tahun', '4'),
(174, 27, 'Belum Menikah', '4'),
(175, 28, '19 - 17 Tahun', '4'),
(176, 26, 'Pendidikan S1', '5'),
(177, 25, '80 - 100', '5'),
(178, 24, '>= 5 Tahun', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pelamar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nilai` (`nilai`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
