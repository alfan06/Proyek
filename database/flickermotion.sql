-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jun 2020 pada 01.10
-- Versi server: 8.0.18
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flickermotion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotografi`
--

CREATE TABLE `fotografi` (
  `id_fotografi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fotografi`
--

INSERT INTO `fotografi` (`id_fotografi`, `nama`, `harga`, `foto`) VALUES
(8, 'Paket Preweding', 700000, '42.PNG'),
(10, 'Paket Foto Model', 1000000, '22.PNG'),
(11, 'Paket Foto Keluarga', 400000, 'keluarga-fondasi-regenerasi-umat-manusia.jpeg'),
(13, 'Paket Foto Wisuda', 600000, 'wisuda-100-untad2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `tgl_upload`, `foto`) VALUES
(8, '2020-06-11', '1.PNG'),
(9, '2020-06-12', 'keluarga-fondasi-regenerasi-umat-manusia.jpeg'),
(10, '2020-06-12', 'wisuda-100-untad.jpg'),
(11, '2020-06-12', '33.PNG'),
(12, '2020-06-12', '61.png'),
(13, '2020-06-12', '4.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen`
--

CREATE TABLE `komen` (
  `id_komen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_fotografi` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komen`
--

INSERT INTO `komen` (`id_komen`, `id_user`, `id_fotografi`, `isi`) VALUES
(10, 8, 8, 'Mantab gan'),
(11, 11, 8, 'Good'),
(12, 13, 13, 'bagus mas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_fotografi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `alamatfotografi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_fotografi`, `tgl_transaksi`, `alamatfotografi`) VALUES
(22, 8, 8, '2020-06-12', 'Jl.Ir.Rais'),
(23, 8, 10, '2020-06-12', 'tanjung gang 9'),
(24, 11, 8, '2020-06-12', 'Probolinggo'),
(25, 11, 11, '2020-06-12', 'Lumajang'),
(26, 13, 13, '2020-06-12', 'Singosari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`, `status`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'Aktif'),
(8, 'alfan', 'alfan', 'alfannoufal@gmail.com', '5b3a0293c5fc5c9704783e9d77b58156', 'user', 'Aktif'),
(11, 'husnul', 'husnul', 'husnul@gmail.com', '7c065db5cfbae18a8665ac9360a5d0f5', 'user', 'Aktif'),
(12, 'rasyid', 'rasyid', 'rasyid@gmail.com', 'bae46ce6405d58fec5eb87a145248a16', 'user', 'Aktif'),
(13, 'mahen', 'mahen', 'mahendra@gmail.com', 'db6f6da1ce3437f3d38eb05a63402d41', 'user', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fotografi`
--
ALTER TABLE `fotografi`
  ADD PRIMARY KEY (`id_fotografi`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_fotografi` (`id_fotografi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_fotografi` (`id_fotografi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fotografi`
--
ALTER TABLE `fotografi`
  MODIFY `id_fotografi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `komen`
--
ALTER TABLE `komen`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `komen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `komen_ibfk_2` FOREIGN KEY (`id_fotografi`) REFERENCES `fotografi` (`id_fotografi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_fotografi`) REFERENCES `fotografi` (`id_fotografi`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
