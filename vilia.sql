-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2024 pada 13.41
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
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `keterangan`, `tahun`, `nik`, `nama`, `jenis_kelamin`, `departemen`, `email`, `no_telp`, `alamat`) VALUES
(70, 'Aktif', 2002, '51111111', 'Mae Hayes', 'Pria', 'Marketing', 'Mae_Hayes@example.net', '082150779398', 'UPR'),
(71, 'y', 7, '1', 'Mrs. Margarett Dooley PhD', 'quos', 'ad', 'lela.o\'reilly@example.org', 'Accusantium officiis maiores sequi excepturi ipsa ', 'cum'),
(72, 'l', 9, '9', 'Dr. Craig VonRueden DDS', 'sunt', 'magni', 'gislason.sylvan@example.net', 'Possimus adipisci fuga voluptas et rerum. Et quam ', 'cumque'),
(73, 'd', 8, '4', 'Daphne Stokes', 'et', 'accusamus', 'vrohan@example.com', 'Dolorum est commodi quas porro sint. Exercitatione', 'expedita'),
(74, 'n', 8, '', 'Margot Sanford', 'harum', 'molestias', 'onie.kozey@example.net', 'Qui qui voluptas minus voluptas molestias iste. Al', 'ut'),
(75, 'c', 8, '7', 'Kailee Dach', 'aut', 'consectetur', 'goodwin.newell@example.com', 'Aut repellat qui incidunt rerum mollitia ut simili', 'quidem'),
(76, 'k', 7, '3', 'Ms. Marisol Lockman III', 'veniam', 'et', 'ksauer@example.net', 'Nostrum asperiores quos possimus. Aspernatur quos ', 'labore'),
(77, 'z', 8, '', 'Dr. Aaliyah Labadie', 'est', 'ut', 'chadd.donnelly@example.net', 'Eos consequatur ipsum officiis eaque. Quae deserun', 'nisi'),
(78, 'a', 2, '3', 'Miss Jalyn Thompson MD', 'quia', 'eius', 'douglas.marta@example.net', 'Aut repellendus aut enim consequatur. Voluptate a ', 'omnis'),
(79, 's', 0, '7', 'Donald Rowe', 'quia', 'suscipit', 'edmund85@example.com', 'Mollitia consequatur quia aut maiores illo eos aut', 'rerum'),
(80, 'm', 6, '4', 'Mrs. Mariane Kulas', 'id', 'necessitatibus', 'judge.graham@example.com', 'Deleniti harum et sequi distinctio aut. Consectetu', 'illo'),
(81, 'm', 2, '', 'Zita Waelchi', 'accusamus', 'qui', 'pietro.sipes@example.net', 'Omnis dolores est reprehenderit nisi inventore. Ea', 'nulla'),
(82, 'x', 8, '4', 'Ramon McCullough', 'ad', 'qui', 'tito52@example.org', 'Asperiores quae dolor ducimus accusamus debitis vi', 'non'),
(83, 's', 2, '4', 'Moriah Harvey', 'voluptas', 'quis', 'damion47@example.net', 'Aliquam exercitationem perferendis ut similique cu', 'hic'),
(84, 'i', 4, '9', 'Guido Oberbrunner', 'et', 'ullam', 'karina.deckow@example.net', 'Odit consectetur voluptatem voluptatem dolores. Qu', 'vel'),
(85, 'p', 1, '3', 'Summer Koepp', 'rerum', 'eos', 'stacy.o\'keefe@example.net', 'Tenetur impedit corporis temporibus maiores et qui', 'voluptatem'),
(86, 'o', 6, '', 'Marguerite Bergnaum Sr.', 'sit', 'repellendus', 'funk.heloise@example.org', 'Occaecati est aut qui dolor occaecati. Hic iusto a', 'sit'),
(87, 'v', 2, '7', 'Federico Schneider', 'aut', 'itaque', 'hkonopelski@example.net', 'Consequatur eum atque aperiam saepe corporis dolor', 'vero'),
(88, 'd', 9, '9', 'Greg Hahn', 'officiis', 'veniam', 'cesar94@example.net', 'Aliquid similique sed non earum incidunt rerum nih', 'nihil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `nik` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` text NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `file` blob NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`id_alternatif`, `nama`, `ttl`, `nik`, `email`, `no_telp`, `jenis_kelamin`, `alamat`, `file`, `departemen`, `role_id`, `is_active`, `date_created`, `password`, `image`) VALUES
(2, 'Ahmad Rozak', 'Palangka Raya', 111, 'rozak001@gmail.com', '082150779398', 'Pria', 'assdasdasda', '', 'Marketing', 2, 1, 1707399639, '$2y$10$Ky6wdA5TPeefZpqrGjGf2Oj4aC4LjEPEXTEfdon7Xy4Tjk8Xt1v9q', 'default.jpg'),
(3, 'Gozali Gozaru', '', 0, '', '', '', '', '', '', 0, 0, 0, '', '');

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
(1, 69, 0.9444),
(2, 70, 0.6667),
(3, 71, 0.3889),
(4, 72, 0.4722),
(5, 73, 0.5972),
(6, 74, 0.4445),
(7, 75, 0.7500),
(8, 76, 0.7639),
(9, 77, 0.8194),
(10, 78, 0.6528),
(11, 79, 0.8333),
(12, 80, 0.9444),
(13, 81, 0.7500),
(14, 82, 0.8333),
(15, 83, 0.4584),
(16, 84, 0.8333),
(17, 85, 0.7222),
(18, 86, 0.7500),
(19, 87, 0.5833),
(20, 88, 0.4444);

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
(374, 81, 24, 168),
(375, 81, 25, 172),
(376, 81, 26, 176),
(377, 81, 27, 174),
(378, 81, 28, 175),
(379, 101, 24, 178),
(380, 101, 25, 177),
(381, 101, 26, 176),
(382, 101, 27, 174),
(383, 101, 28, 175),
(384, 102, 24, 178),
(385, 102, 25, 172),
(386, 102, 26, 171),
(387, 102, 27, 174),
(388, 102, 28, 170),
(389, 69, 24, 178),
(390, 69, 25, 177),
(391, 69, 26, 176),
(392, 69, 27, 174),
(393, 69, 28, 170),
(394, 70, 24, 178),
(395, 70, 25, 172),
(396, 70, 26, 171),
(397, 70, 27, 169),
(398, 70, 28, 170),
(399, 71, 24, 156),
(400, 71, 25, 167),
(401, 71, 26, 176),
(402, 71, 27, 169),
(403, 71, 28, 170),
(404, 72, 24, 168),
(405, 72, 25, 167),
(406, 72, 26, 171),
(407, 72, 27, 174),
(408, 72, 28, 170),
(409, 73, 24, 173),
(410, 73, 25, 172),
(411, 73, 26, 171),
(412, 73, 27, 169),
(413, 73, 28, 170),
(414, 74, 24, 178),
(415, 74, 25, 167),
(416, 74, 26, 171),
(417, 74, 27, 164),
(418, 74, 28, 165),
(419, 75, 24, 168),
(420, 75, 25, 177),
(421, 75, 26, 176),
(422, 75, 27, 169),
(423, 75, 28, 170),
(424, 76, 24, 173),
(425, 76, 25, 177),
(426, 76, 26, 171),
(427, 76, 27, 169),
(428, 76, 28, 175),
(429, 77, 24, 173),
(430, 77, 25, 172),
(431, 77, 26, 176),
(432, 77, 27, 174),
(433, 77, 28, 175),
(434, 78, 24, 173),
(435, 78, 25, 172),
(436, 78, 26, 176),
(437, 78, 27, 174),
(438, 78, 28, 160),
(439, 79, 24, 178),
(440, 79, 25, 177),
(441, 79, 26, 176),
(442, 79, 27, 169),
(443, 79, 28, 165),
(444, 80, 24, 178),
(445, 80, 25, 177),
(446, 80, 26, 176),
(447, 80, 27, 174),
(448, 80, 28, 170),
(449, 82, 24, 178),
(450, 82, 25, 177),
(451, 82, 26, 171),
(452, 82, 27, 174),
(453, 82, 28, 170),
(454, 83, 24, 163),
(455, 83, 25, 172),
(456, 83, 26, 166),
(457, 83, 27, 174),
(458, 83, 28, 175),
(459, 84, 24, 178),
(460, 84, 25, 172),
(461, 84, 26, 176),
(462, 84, 27, 174),
(463, 84, 28, 170),
(464, 85, 24, 178),
(465, 85, 25, 177),
(466, 85, 26, 166),
(467, 85, 27, 174),
(468, 85, 28, 170),
(469, 86, 24, 168),
(470, 86, 25, 177),
(471, 86, 26, 171),
(472, 86, 27, 174),
(473, 86, 28, 175),
(474, 87, 24, 168),
(475, 87, 25, 172),
(476, 87, 26, 171),
(477, 87, 27, 174),
(478, 87, 28, 170),
(479, 88, 24, 156),
(480, 88, 25, 172),
(481, 88, 26, 171),
(482, 88, 27, 174),
(483, 88, 28, 170);

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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Robet', 'robet0010@gmail.com', 'default.jpg', '$2y$10$bemXbplfauLNeajbyb3oz.NQFCWso6PfSc0v4tOB.13dj8wiy1kse', 1, 1, 1706108813),
(7, 'Pratama Gusti', 'pratamagusti009@gmail.com', 'default.jpg', '$2y$10$f1jefALD0n3XfTREOt3dSeRvAyfFC0I6hedB0whRMN92Vn3Z6D56S', 2, 1, 1706200252),
(8, 'Aditya Pratama', 'tama001@gmail.com', 'default.jpg', '$2y$10$nBMPEqFLLUDlvZbUsOiPBuMapaAX0FgdwjjksvdMxhy/Z/JFfswZm', 2, 1, 1707385719);

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
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
