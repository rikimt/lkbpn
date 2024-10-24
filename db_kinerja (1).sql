-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 04:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `kinerja`
--

CREATE TABLE `kinerja` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(10) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tugas_tambahan` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kinerja`
--

INSERT INTO `kinerja` (`id`, `kode_guru`, `id_jabatan`, `id_tugas_tambahan`, `uraian`, `tanggal`, `bukti`) VALUES
(11, 'RMT126', 1, 1, '', '2024-10-16', '2024-10-16_670e7a0dccc46.png'),
(12, 'RMT126', 1, 1, '', '2024-10-15', '2024-10-15_670e7a2cd66b3.png'),
(13, 'RMT126', 1, 1, '', '2024-10-15', '2024-10-15_670e7c3b1fdc4.png'),
(14, 'RMT126', 1, 1, 'Mengajar, asdasdasd, Mengajar, Piket, Upacara, Monitoring PKL', '2024-10-15', '2024-10-15_670e7e0c954fe.png'),
(15, 'RMT126', 1, 1, 'Pilih Kegiatan', '2024-10-16', '2024-10-16_670e7e9f3438d.png'),
(16, 'RMT126', 1, 1, '', '2024-10-16', '2024-10-17_670e7eca3a942.png'),
(17, 'RMT126', 1, 1, '', '2024-10-09', '2024-10-09_670e7fd6d9fe6.png'),
(18, 'RMT126', 1, 1, 'Mengajar, Monitoring PKL, Menyiapkan bahan ajar, Piket, Pengajian Yasin, Mengajar', '2024-10-16', '2024-10-16_670eb3f9856c1.png'),
(19, 'RMT126', 1, 1, 'Monitoring PKL, Pengajian Yasin, Menyiapkan bahan ajar', '2024-10-21', '2024-10-21_670f40c200fa4.png'),
(20, 'RMT125', 2, 99, 'Upacara, Piket, Mengajar', '2024-10-14', '2024-10-14_670ebbe60dcc5.png'),
(21, 'RMT126', 1, 1, 'Monitor PKL bandung, Acara Pengajian, Mengajar', '2024-10-18', '2024-10-18_6710ab9936022.png'),
(22, 'RMT125', 2, 99, 'Mengajar', '2024-10-17', '2024-10-17_6710ac5c5b656.png');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_kegiatan`
--

CREATE TABLE `kinerja_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kinerja_kegiatan`
--

INSERT INTO `kinerja_kegiatan` (`id`, `nama_kegiatan`) VALUES
(1, 'Mengajar'),
(2, 'Menyiapkan bahan ajar'),
(4, 'Upacara'),
(5, 'Piket'),
(6, 'Pengajian Yasin'),
(7, 'Monitoring PKL'),
(8, 'Acara Pengajian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(4) NOT NULL,
  `id_tugas_tambahan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode_guru`, `nama`, `email`, `username`, `password`, `id_level`, `id_tugas_tambahan`, `foto`, `status_aktif`, `tanggal_dibuat`) VALUES
(1, 'RMT126', 'Administrator', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 'Foto_4x6_Berwarna_-_Riki_Muhamad_Taopik1.jpg', 1, 1716290325),
(9, 'RMT125', 'Riki MT', 'rikimuhamad69@gmail.com', 'riki', '202cb962ac59075b964b07152d234b70', 2, 99, 'default.png', 1, 1716290313),
(10, 'TEST123', 'Test', 'dikodiko357@gmail.com', 'test', '202cb962ac59075b964b07152d234b70', 2, 99, 'default.png', 1, 1716292589),
(11, 'TEST122', 'Test', 'rikimuhamad357@gmail.com', 'asd', '7815696ecbf1c96e6894b779456d330e', 2, 99, 'default.png', 0, 1718001770),
(12, 'TEST124', 'Test', 'rikimhammad2@gmail.com', 'asdww', '7815696ecbf1c96e6894b779456d330e', 2, 99, 'default.png', 1, 1718005185),
(13, 'SRI245', 'Sri Pujiani, S.Pd', 'sripujiani@gmail.com', 'sri245', '7f993edc23bab17c53c796be3173f76a', 2, 2, 'asd.jpg', 1, 1718005185);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 2, 3),
(11, 1, 3),
(13, 1, 2),
(18, 2, 14),
(19, 1, 14),
(21, 1, 15),
(22, 5, 14),
(27, 5, 2),
(29, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(5, 'Staff Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Home'),
(14, 'Kinerja'),
(15, 'Kinerja Item');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `no_urut` int(3) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `judul`, `url`, `icon`, `no_urut`, `is_active`) VALUES
(1, 1, 'Guru', 'admin/guru', 'fas fa-fw fa-users', 1, 1),
(2, 2, 'Profil', 'user/profil', 'fa-solid fa-user-gear', 2, 1),
(3, 1, 'Manage Menu', 'admin/manage_menu', 'fas fa-fw fa-folder', 3, 1),
(4, 2, 'Test', 'admin/manage_menu', 'fas fa-fw fa-folder\n', 4, 0),
(5, 1, 'Manage Sub Menu', 'admin/manage_sub_menu', 'fas fa-fw fa-folder-open', 5, 1),
(11, 1, 'Jabatan', 'admin/level', 'fas fa-fw fa-cubes', 2, 1),
(13, 2, 'Ubah Profil', 'user/edit_profil', 'fa-solid fa-user-pen', 6, 1),
(14, 2, 'Ubah Password', 'user/edit_password', 'fa-solid fa-key', 7, 1),
(16, 15, 'Kegiatan', 'admin/kegiatan', 'fas fa-list', 8, 1),
(17, 14, 'Kinerja Kegiatan', 'user/kinerja', 'fas fa-pencil-alt', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tugas_tambahan`
--

CREATE TABLE `user_tugas_tambahan` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tugas_tambahan`
--

INSERT INTO `user_tugas_tambahan` (`id`, `nama_tugas`, `keterangan`) VALUES
(1, 'Operator', 'Menjalaankan tuas operator'),
(2, 'Wakasek Kurikulum', 'Menjalankan tugas wakasek kurikulum'),
(3, 'Wakasek Kesiswaan', 'Menjalankan tugas wakasek kesiswaan'),
(99, '-', 'Tidak ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja_kegiatan`
--
ALTER TABLE `kinerja_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tugas_tambahan`
--
ALTER TABLE `user_tugas_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kinerja_kegiatan`
--
ALTER TABLE `kinerja_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_tugas_tambahan`
--
ALTER TABLE `user_tugas_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
