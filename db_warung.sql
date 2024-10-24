-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2024 pada 00.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `id_level`, `foto`, `status_aktif`, `tanggal_dibuat`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Foto_4x6_Berwarna_-_Riki_Muhamad_Taopik1.jpg', 1, 1716290325),
(9, 'Riki MT', 'rikimuhamad69@gmail.com', 'riki', '202cb962ac59075b964b07152d234b70', 2, 'default.png', 1, 1716290313),
(10, 'Test', 'dikodiko357@gmail.com', 'test', '202cb962ac59075b964b07152d234b70', 2, 'default.png', 1, 1716292589),
(11, 'Test', 'rikimuhamad357@gmail.com', 'asd', '7815696ecbf1c96e6894b779456d330e', 2, 'default.png', 0, 1718001770),
(12, 'Test', 'rikimhammad2@gmail.com', 'asdww', '7815696ecbf1c96e6894b779456d330e', 2, 'default.png', 1, 1718005185);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 2, 3),
(11, 1, 3),
(13, 1, 2),
(18, 2, 14),
(19, 1, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Home'),
(14, 'Transaksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `no_urut` int(3) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `judul`, `url`, `icon`, `no_urut`, `is_active`) VALUES
(1, 1, 'Pengguna', 'admin/pengguna', 'fas fa-fw fa-users', 1, 1),
(2, 2, 'Profil', 'user/profil', 'fa-solid fa-user-gear', 2, 1),
(3, 1, 'Manage Menu', 'admin/manage_menu', 'fas fa-fw fa-folder', 3, 1),
(4, 2, 'Test', 'admin/manage_menu', 'fas fa-fw fa-folder\n', 4, 0),
(5, 1, 'Manage Sub Menu', 'admin/manage_sub_menu', 'fas fa-fw fa-folder-open', 5, 1),
(11, 1, 'Level', 'admin/level', 'fas fa-fw fa-cubes', 2, 1),
(13, 2, 'Ubah Profil', 'user/edit_profil', 'fa-solid fa-user-pen', 6, 1),
(14, 2, 'Ubah Password', 'user/edit_password', 'fa-solid fa-key', 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
