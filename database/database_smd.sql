-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2026 pada 11.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_smd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `tipe_dokumen` varchar(50) NOT NULL,
  `waktu_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nama_dokumen`, `tipe_dokumen`, `waktu_upload`, `id_user`) VALUES
(1, 'db_sirs.sql', 'application/octet-stream', '2023-07-06 21:03:15', 7),
(2, 'script fixed presentasi.txt', 'text/plain', '2023-07-06 21:29:03', 7),
(3, 'font vs code.txt', 'text/plain', '2023-07-06 21:29:16', 7),
(4, 'fixed2.txt', 'text/plain', '2023-07-06 21:30:58', 7),
(5, '1. Introduction to UIUX.pptx.pdf', 'application/pdf', '2024-07-28 18:41:20', 6),
(6, 'Dokumen pendukung.pdf', 'application/pdf', '2026-07-31 10:45:16', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(5, 'admin', '$2y$10$PR2qyQbfcR6WrpZiO8NFFuQyEDkt/sYp8fZkSKHaXwLquMTjioGmG', 'Admin'),
(6, 'kim', '$2y$10$XslQXOeLfN07sK6JJzSHruT33nt4i9eL994yPGFxdCyLKSNhgmE3q', 'User'),
(7, 'alicia', '$2y$10$RrnfwIDzLaEroH5tm.f.oOOOFeC2X.WrtAvz/93DpMqDaOjY4d.4.', 'User'),
(8, 'rena', '$2y$10$VsEEbxsMWuqZQn9EICLLUOeMyueCEDPwYgTPBeEAqfFF4GzQurjvG', 'User'),
(9, 'user', '$2y$10$lO4w3/KbLpzp0zXlYhOrou.z6/S.kKE.9KNal2CuuXV5MWHJZFTNO', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
