-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 07:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kinerja`
--

INSERT INTO `kinerja` (`id`, `kode_guru`, `id_jabatan`, `id_tugas_tambahan`, `uraian`, `tanggal`, `bukti`) VALUES
(14, 'RMT126', 1, 1, 'Mengajar, asdasdasd, Mengajar, Piket, Upacara, Monitoring PKL', '2024-10-15', '2024-10-15_670e7e0c954fe.png'),
(18, 'RMT126', 1, 1, 'Mengajar, Monitoring PKL, Menyiapkan bahan ajar, Piket, Pengajian Yasin, Mengajar', '2024-10-16', '2024-10-16_670eb3f9856c1.png'),
(19, 'RMT126', 1, 1, 'Monitoring PKL, Pengajian Yasin, Menyiapkan bahan ajar, asdasd22222', '2024-10-21', '2024-10-21_670f40c200fa4.png'),
(20, 'RMT125', 2, 99, 'Upacara, Piket, Mengajar', '2024-10-14', '2024-10-14_670ebbe60dcc5.png'),
(21, 'RMT126', 1, 1, 'Monitor PKL bandung, Acara Pengajian, Mengajar', '2024-10-18', '2024-10-18_6710ab9936022.png'),
(22, 'RMT125', 2, 99, 'Mengajar', '2024-10-17', 'RMT125_2024-10-17_67160392d7cd6.png'),
(23, 'RMT126', 1, 1, 'bandung', '2024-10-19', '2024-10-19_6712776e7dbdd.jpg'),
(25, 'RMT126', 1, 1, 'Mengajar, asdasdasasd', '2024-10-22', '2024-10-22_671277cc57843.jpg'),
(26, 'RMT126', 1, 1, 'Acara Pengajian', '2024-09-20', '2024-09-20_6714b42849db8.jpg'),
(27, 'RMT126', 1, 1, 'Acara Pengajian, Mengajar, , Mengajar', '2024-10-23', 'RMT126_2024-10-23_6714ff57291b0.jpg'),
(29, 'RMT126', 1, 1, 'Acara Pengajian, Mengajar', '2024-10-17', '2024-10-17_6714d4bd3de35.jpg'),
(34, 'RMT126', 1, 1, 'Acara Pengajian', '2024-11-01', 'RMT126_2024-11-01_6714ff314e94a.jpg'),
(35, 'RMT125', 2, 99, 'Acara Pengajian, Mengajar, lainnya', '2024-10-21', 'RMT125_2024-10-21_6716096e83e0c.png'),
(36, 'RMT125', 2, 99, 'Mengajar', '2024-10-23', 'RMT125_2024-10-23_6717e26e109ff.jpg'),
(37, 'RMT125', 2, 99, 'Acara Pengajian', '2024-10-24', 'RMT125_2024-10-24_6717e2c0f3878.jpg'),
(38, 'RMT125', 2, 99, 'Acara Pengajian', '2024-10-25', 'RMT125_2024-10-25_6717e416b4887.jpg'),
(39, 'RMT125', 2, 99, 'Acara Pengajian, Mengajar, Monitoring PKL, Latihan', '2024-11-01', 'RMT125_2024-11-01_6717e49657b8f.jpg'),
(40, 'RMT125', 2, 99, 'Menyiapkan bahan ajar, Mengajar, Pengajian Yasin, Solat duha, Latihan', '2024-10-26', 'RMT125_2024-10-26_67185a9f69cfc.jpg'),
(41, 'RMT125', 2, 99, 'Acara Pengajian', '2024-10-27', 'RMT125_2024-10-27_67185b01a51dc.jpg'),
(45, 'RMT125', 2, 99, 'Mengajar, Monitoring PKL, Piket', '2024-11-08', 'RMT125_2024-11-08_672c45df11059.png');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_kegiatan`
--

CREATE TABLE `kinerja_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(4) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `id_tugas_tambahan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `tanggal_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode_guru`, `nama`, `email`, `no_hp`, `username`, `password`, `id_level`, `id_jabatan`, `id_tugas_tambahan`, `foto`, `status_aktif`, `tanggal_dibuat`) VALUES
(1, 'RMT126', 'Administrator', 'admin@gmail.com', '1112112', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 'RMT126_2024-11-01_6723d76272907.png', 1, '2024-11-07'),
(9, 'RMT125', 'Riki MT', 'rikimuhamad69@gmail.com', '', 'rmt125', '202cb962ac59075b964b07152d234b70', 2, 1, 99, 'default.png', 1, '2024-10-29'),
(11, 'TEST122', 'Test2', 'rikimuhamad357@gmail.com', '', 'asd', '7815696ecbf1c96e6894b779456d330e', 2, 1, 99, 'default.png', 1, '2024-11-07'),
(13, 'SRI245', 'Sri Pujiani, S.Pd', 'sripujiani@gmail.com', '', 'sri245', '7f993edc23bab17c53c796be3173f76a', 2, 1, 2, 'asd.jpg', 1, '2024-10-29'),
(17, 'ASD333', 'Test22 ss 23', 'asdasd@asd3', '0812223334442', 'ASD333', '911deb5f28232ce4b9a7a09fe1eeac7c', 1, 1, 2, '', 1, '0000-00-00'),
(19, 'ASD444', 'Aan Subhan23444', 'aansubhan@gmail.com23', '08122233344423', 'ASD444', '202cb962ac59075b964b07152d234b70', 2, 1, 2, 'ASD444_2024-10-29_671fd40ac328c.jpg', 1, '2024-10-29'),
(20, 'ERT22', 'Erika T', 'er@gmaa', '12312321', 'ERT22', '0db8e1b63286f7d15b7dff32650bda59', 5, 1, 99, 'default.png', 1, '2024-10-29'),
(21, 'BTR', 'Bastian', 'b@asdasd', '', 'BTR', 'ff52214428420c7fa3f1c67ae99b9081', 5, 1, 99, 'default.png', 1, '2024-10-29'),
(22, 'ASD321', 'Test As23', 'dsar@adasd3', '08122233344423', 'ASD321', '56fac0268869faa3830bafa521f13355', 2, 1, 1, 'ASD321_2024-11-06_672b127e677f9.png', 1, '2024-11-06'),
(24, 'TEST444', 'Roki', 'roki@gmail.com', '0813232344', 'TEST444', '0643876f2d408b5b814bf45ad84d25fc', 5, 4, 2, 'default.png', 1, '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(29, 5, 3),
(31, 6, 1),
(33, 6, 2),
(35, 1, 17),
(36, 7, 1),
(37, 7, 2),
(39, 7, 3),
(40, 9, 1),
(42, 9, 2),
(43, 5, 15),
(44, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_jabatan`
--

CREATE TABLE `user_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_jabatan`
--

INSERT INTO `user_jabatan` (`id`, `jabatan`) VALUES
(1, 'Guru'),
(2, 'Staff TU'),
(4, 'Kepala Sekolah'),
(5, 'Ketua Yayasan');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'user'),
(5, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `menu_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `nama_menu`, `menu_icon`) VALUES
(1, 'Admin', 'fas fa-wrench'),
(2, 'Profil', 'fas fa-user-circle'),
(3, 'Home', ''),
(14, 'User', 'fas fa-user'),
(15, 'Staff', 'fas fa-user-md');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `judul`, `url`, `icon`, `no_urut`, `is_active`) VALUES
(1, 15, 'Guru', 'staff/guru', 'fas fa-fw fa-users', 1, 1),
(2, 2, 'Profil', 'user/profil', 'fa-solid fa-user-gear', 2, 1),
(3, 1, 'Manage Menu', 'admin/manage_menu', 'fas fa-fw fa-folder', 3, 1),
(4, 2, 'Test', 'admin/manage_menu', 'fas fa-fw fa-folder\n', 4, 0),
(5, 1, 'Manage Sub Menu', 'admin/manage_sub_menu', 'fas fa-fw fa-folder-open', 5, 1),
(11, 1, 'Level Akses', 'admin/level', 'fas fa-fw fa-cubes', 2, 1),
(13, 2, 'Ubah Profil', 'user/edit_profil', 'fa-solid fa-user-pen', 6, 1),
(14, 2, 'Ubah Password', 'user/edit_password', 'fa-solid fa-key', 7, 1),
(16, 15, 'Kegiatan', 'staff/kegiatan', 'fas fa-list', 8, 1),
(17, 14, 'Kinerja Kegiatan', 'user/kinerja', 'fas fa-pencil-alt', 9, 1),
(18, 15, 'Tugas Tambahan', 'staff/tugas_tambahan', 'fas fa-list', 10, 1),
(19, 15, 'Laporan Kinerja', 'staff/laporan_kinerja', 'fas fa-file-alt', 11, 1),
(20, 15, 'Jabatan', 'staff/jabatan', 'fas fa-list', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tugas_tambahan`
--

CREATE TABLE `user_tugas_tambahan` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tugas_tambahan`
--

INSERT INTO `user_tugas_tambahan` (`id`, `nama_tugas`) VALUES
(1, 'Operator'),
(2, 'Wakasek Kurikulum'),
(3, 'Wakasek Kesiswaan'),
(99, '-'),
(101, 'Wakasek Sarpras');

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
-- Indexes for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kinerja_kegiatan`
--
ALTER TABLE `kinerja_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_tugas_tambahan`
--
ALTER TABLE `user_tugas_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
