-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2025 pada 17.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `list_sd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodeitem`
--

CREATE TABLE `kodeitem` (
  `Kode` varchar(30) NOT NULL,
  `NamaItem` varchar(200) NOT NULL,
  `GambarItem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kodeitem`
--

INSERT INTO `kodeitem` (`Kode`, `NamaItem`, `GambarItem`) VALUES
('123', 'ssa', '1760771549_buku1.jpg'),
('750', 'asad', NULL),
('758', 'Batu', NULL),
('778', 'kayu', 'kayu.jpg'),
('ssa', 'ssa', '1760770066_ttd_Citto_(2).jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kodeitem`
--
ALTER TABLE `kodeitem`
  ADD PRIMARY KEY (`Kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
