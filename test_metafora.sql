-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 30 Agu 2023 pada 08.52
-- Versi server: 8.0.31
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_metafora`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'sepatu', 200000, -240),
(2, 'mouse', 12000, -3),
(3, 'kemul', 70000, -1),
(4, 'leminenale', 10000, 96),
(5, 'akua', 10000, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

DROP TABLE IF EXISTS `tb_pelanggan`;
CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pelanggan`) VALUES
(1, 'siti'),
(2, 'nurdin'),
(3, 'yiuiu'),
(4, 'uipuj'),
(5, 'bayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_pelanggan`, `id_barang`, `jumlah`, `subtotal`) VALUES
(28, 2, 2, 3, 30),
(27, 1, 5, 2, 4),
(26, 5, 2, 3, 30),
(25, 2, 4, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
