-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Bulan Mei 2020 pada 15.20
-- Versi server: 8.0.18
-- Versi PHP: 7.3.11

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
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fotografi`
--

INSERT INTO `fotografi` (`id_fotografi`, `nama`, `harga`, `foto`) VALUES
(9, 'Project 1', 7000, '1.PNG'),
(10, 'Project 2', 5000, '2.PNG'),
(11, 'Project 3', 10000, '3.PNG'),
(12, 'Project 4', 4000, '4.PNG'),
(13, 'Project 5', 8000, '5.PNG'),
(14, 'Project 6', 6000, '6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_fotografi` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `alamat fotografi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `foto`, `email`, `password`, `level`, `status`) VALUES
(2, 'admin', 'admin', '', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'Aktif'),
(8, 'alfan', 'alfan', '', 'alfannoufal@gmail.com', '5b3a0293c5fc5c9704783e9d77b58156', 'user', 'Aktif'),
(9, 'violet', 'violet', '', 'violet@gmail.com', '7856aa3caa7958278f743812441e1e83', 'user', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `videografi`
--

CREATE TABLE `videografi` (
  `id_videografi` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fotografi`
--
ALTER TABLE `fotografi`
  ADD PRIMARY KEY (`id_fotografi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `transaksi_ibfk_1` (`id_user`),
  ADD KEY `id_fotografi` (`id_fotografi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `videografi`
--
ALTER TABLE `videografi`
  ADD PRIMARY KEY (`id_videografi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fotografi`
--
ALTER TABLE `fotografi`
  MODIFY `id_fotografi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `videografi`
--
ALTER TABLE `videografi`
  MODIFY `id_videografi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
