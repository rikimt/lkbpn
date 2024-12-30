-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 30 Des 2024 pada 03.53
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
-- Database: `db_kinerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja`
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
-- Dumping data untuk tabel `kinerja`
--

INSERT INTO `kinerja` (`id`, `kode_guru`, `id_jabatan`, `id_tugas_tambahan`, `uraian`, `tanggal`, `bukti`) VALUES
(90, 'FFH97', 1, 99, 'Acara Pengajian', '2024-12-20', 'FFH97_2024-12-20_676513d499b7d.jpg'),
(92, 'TIT21', 1, 99, 'Acara Pengajian', '2024-12-20', 'TIT21_2024-12-20_676514e62e35c.jpg'),
(93, 'YAY27', 1, 104, 'Acara Pengajian', '2024-12-20', 'YAY27_2024-12-20_6765157d71439.jpg'),
(94, 'IRM37', 1, 99, 'Acara Pengajian', '2024-12-20', 'IRM37_2024-12-20_676519bdd721e.jpg'),
(95, 'WIW78', 1, 99, 'Acara Pengajian', '2024-12-20', 'WIW78_2024-12-20_6765216f133de.jpg'),
(96, 'RESNOV118', 1, 99, 'Acara Pengajian', '2024-12-20', 'RESNOV118_2024-12-20_6765239b68673.jpg'),
(97, 'RMT126', 1, 1, 'Acara Pengajian', '2024-12-23', 'RMT126_2024-12-23_6768d9d9e039a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_kegiatan`
--

CREATE TABLE `kinerja_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kinerja_kegiatan`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(4) NOT NULL DEFAULT 1,
  `id_jabatan` int(5) NOT NULL DEFAULT 1,
  `id_tugas_tambahan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `tanggal_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `kode_guru`, `nama`, `email`, `no_hp`, `username`, `password`, `id_level`, `id_jabatan`, `id_tugas_tambahan`, `foto`, `status_aktif`, `tanggal_dibuat`) VALUES
(1, 'RMT126', 'Administrator', 'admin2@gmail.com', '', 'admin', '6dd43baa48495fbc175d134cf577b7c1', 1, 1, 1, 'RMT126_2024-10-29_671fcc3763aac.png', 1, '0000-00-00'),
(22, 'RMT125', 'Riki Muhamad Taopik, S.Kom', '', '', 'RMT125', '202cb962ac59075b964b07152d234b70', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(23, 'TEST1', 'Asep Saepuloh', '', '', 'TES1', '7873291703eb2719cdc7b64a38e17102', 2, 1, 99, 'default.png', 0, '2024-11-01'),
(24, 'TEST2', 'Asep Justin', '', '', 'TES2', 'e46a784ef53dc5fe8808c10252dde4be', 2, 1, 99, 'default.png', 0, '2024-11-01'),
(25, 'TEST3', 'Fathir salto', '', '', 'TEST3', 'c48e387dea4808fa3f35382e71cb1996', 2, 1, 99, 'TEST3_2024-11-01_672455c80fb79.jpg', 0, '2024-11-20'),
(26, 'TEST4', 'Istri Jaehyun', '', '', 'TEST4', '9edffeb58cc52233a4a3529955f16086', 2, 1, 99, 'TEST4_2024-11-06_672ada041a245.jpg', 0, '2024-11-20'),
(27, 'TEST5', 'Radit Supra', 'Mamahnahida@gmail.com', '087654321', 'TEST5', 'a6a1a5be3494f8d559a89c2317e1cd9f', 2, 1, 99, 'TEST5_2024-11-01_6724552c0bd77.jpg', 0, '2024-11-20'),
(28, 'TEST6', 'Saepul', '', '', 'TEST6', '9a073728c9ddb3f2a57f9c7d7252dbc2', 2, 1, 99, 'default.png', 0, '2024-11-01'),
(29, 'TEST7', 'Yadi', 'annaafiiun@gmail.com', '082297000269', 'TEST7', '05d32bbd4f5a3ffa1cd540c6c4ac1bdf', 2, 1, 99, 'TEST7_2024-11-01_6724585f04935.jpg', 0, '2024-11-20'),
(30, 'TEST8', 'Ubed Senggol', 'agusbadboy@gmail.com', '08aku sayang kamu', 'TEST8', '8444bd000dd883a5ed1ab8497adec836', 2, 1, 99, 'TEST8_2024-11-01_672457746f819.jpg', 0, '2024-11-20'),
(31, 'TEST9', 'SOSOK ASLI TUNGGU KIRIS', 'bangdodo14@gmail.com', '00778-322010', 'TEST9', '9340a194ac29ae98fa6f6ec2f8d1506f', 2, 1, 99, 'TEST9_2024-11-06_672ad8dd8c9a4.png', 0, '2024-11-20'),
(32, 'TEST10', 'Sandi Organik', '', '', 'TEST10', 'c90cf65fe3795e85a76a4b1daa7e36a6', 2, 1, 99, 'default.png', 0, '2024-11-20'),
(34, 'TEST12', 'Fufu Fafa', '', '', 'TEST12', '015d7d2a9f48f945e357e12432b16588', 2, 1, 99, 'default.png', 0, '2024-11-20'),
(36, 'TEST14', 'Coki Anwar', '', '', 'TEST14', '88db8834b3809aa99b83f8dadc120a65', 2, 1, 99, 'default.png', 0, '2024-11-14'),
(37, 'TEST15', 'Komandan Imron', '', '', 'TEST15', '89b4f0afd82e8a38e12dc7be09de2459', 2, 1, 99, 'TEST15_2024-11-01_6724551c5a72b.jpg', 0, '2024-11-20'),
(38, 'AKA120', 'Arief Kharisma Akira', '', '', 'AKA120', 'fa88d122fe440dda64a7233110305a32', 1, 1, 99, 'AKA120_2024-10-31_6723039933da7.png', 1, '2024-11-08'),
(39, 'SL110', 'Sari Lestari, S.Kom', '', '', 'SL110', 'f5926af63d32f111ac14c83ba1d6880f', 2, 1, 109, 'SL110_2024-11-08_672d8e392e2f6.jpg', 1, '2024-10-31'),
(40, 'DOD47', 'H. Dodo Firdaus, S.T', '', '', 'DOD47', 'e64d062f331d88b9b638725f5d86ec85', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(41, 'FRDS94', 'Fitria Ratnasari Dewi, ST', '', '', 'FRDS94', '8563821316a46dcc9775793c70e8ea4a', 2, 1, 110, 'default.png', 1, '2024-10-31'),
(42, 'SAH126', 'Santi Auliya Hidayati, S.Pd', '', '', 'SAH126', '188538c74ecadc30c62fb986a3beae94', 2, 1, 99, 'SAH126_2024-12-20_6765144b84ac7.jpg', 1, '2024-10-31'),
(43, 'AAN60', 'H. Aan Subhan, S.E., MM., M.Pd.', '', '', 'AAN60', 'a62773b918280d474cc875008d673bc2', 2, 1, 103, 'default.png', 1, '2024-10-31'),
(44, 'AI53', 'Ai Surtiawati, S.Pd.Kim', '', '', 'AI53', '66541a3077f64d93d401ebefcedcae8a', 2, 1, 106, 'default.png', 1, '2024-10-31'),
(45, 'ANN31', 'Anna Tresnawati, S.Pd.', '', '', 'ANN31', '076c75e5e63675bdbb646c6c079a20f0', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(46, 'ASM122', 'Ai Sri Mulyani, S.Pd', '', '', 'ASM122', '61d9cd2c851cfcde0cc8d7d51283ec21', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(47, 'ASR55', 'Asri Amitas, S.Pd', '', '', 'ASR55', 'f28cbadcb277a81783b9955a11757648', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(48, 'BAS41', 'Basuki Ariadi, S.Si', '', '', 'BAS41', 'cef4f6df114b3998c78c96ea715ef874', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(49, 'DAD62', 'Dadan Dhanial Ramdhani, S.Pd', '', '', 'DAD62', 'a90842e472c7d96e0cfb84d6007c63cb', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(50, 'DED40', 'Dedi Saripgani, M.Hum', '', '', 'DED40', '9d3eb06883d3ce94a1f9c0d0572de94b', 2, 1, 3, 'default.png', 1, '2024-10-31'),
(51, 'DEN10', 'Dendi Adi Permana, ST', '', '', 'DEN10', '21cc1c8a3620f308cf1199d9bc95461e', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(52, 'DIN4', 'apt. Hj. Dinie Arianti, S.Si', '', '', 'DIN4', '107f80fd0ab32f199c145c28e0888b0d', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(53, 'DW103', 'Dadi Wahyudi, S.Pd', '', '', 'DW103', '767490f4345cff17ca80c45e14097dee', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(54, 'EAM93', 'Eka Aji Mustari, S.Pd', '', '', 'EAM93', 'ceab03e60ba9ddb487e83843f8dda08a', 2, 1, 101, 'default.png', 1, '2024-10-31'),
(55, 'EDI22', 'H. Edi Solehudin, SHI., M.Pd', '', '', 'EDI22', '4ba6187ac76ca90f30aab0060e214ef0', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(56, 'FFH97', 'apt. Fitri Fauziyah H, S.Farm., MM', '', '', 'FFH97', '848f40310aab0d1ff0838ede78844722', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(57, 'HAN124', 'Handi', '', '', 'HAN124', 'ed8ee94262d2a4dcc40558123e686605', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(58, 'HNO96', 'apt. Heni Oktaviani, S.Farm., M.Farm', '', '', 'HNO96', 'd7d814fc112afae3d78dd1c83c5848d5', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(59, 'IIS38', 'Hj. Iis Ernawati, S.Pd', 'iisernnawati1975@gmail.com', '085223276377', 'IIS38', '5f5e5ecd44c85afdf74f63d661972f3c', 2, 1, 99, 'IIS38_2024-12-20_676514663c0c6.jpg', 1, '2024-10-31'),
(60, 'IK107', 'Ika Mustika, S.Kep., Ners', '', '', 'IK107', '40d7531ffc084fadc321094a9a2158b8', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(61, 'IRM37', 'apt. Hj.Irma Ruhama A, S.Far', 'ruhama.irma@gmail.com', '085222204755', 'IRM37', '8a53ebf5afcf9df11915531842074bb5', 2, 1, 99, 'IRM37_2024-12-20_67651a3fbe944.jpg', 1, '2024-10-31'),
(62, 'MAY13', 'apt. Maya Herawati, S.Si', '', '', 'MAY13', '7e03d5c09d29027945c7bc9bc5c949a0', 2, 1, 105, 'default.png', 1, '2024-10-31'),
(63, 'MIQ114', 'Muhammad Iqbal, S.Pd', '', '', 'MIQ114', '0829a59931294b283bbf5bdae8a194ef', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(64, 'NID91', 'Nida Hanifah, S.Kep', '', '', 'NID91', '6cee52c13ba1a06f3a38eb36615664d9', 2, 1, 108, 'default.png', 1, '2024-10-31'),
(65, 'RAN116', 'Rana Dianah, S.Pd', '', '', 'RAN116', 'b91a977e3b55236ca60d30d3d62f8008', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(66, 'REI56', 'Reisa Pebrianie, SKM', '', '', 'REI56', '88b57a7c0eb2108a0771fb877c434263', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(67, 'RES20', 'Resvi Ernita, SKM', '', '', 'RES20', '620a6b0f2e0cf34abc4a5918ad2d7c69', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(68, 'RESNOV118', 'Restu Novitasamya, S.Pd', '', '', 'RESNOV118', '5a45d5ee6f33c66773f4b470eae0fbab', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(69, 'RIN123', 'Rina Herlina, S.Pd', '', '', 'RIN123', '3f36fc3af3301a9a4c7e0a73dd7e2f9f', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(70, 'SAR8', 'Sarif Hidayat, S.Pd., MM', '', '', 'SAR8', '15762e7c91f6508cc34706943365299c', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(71, 'SRI12', 'Sri Pujiani, M.Pd', 'sripujiani@smkbpn.sch.id', '085221096756', 'SRI12', '85697d21ba3246ff40a2143fb672648e', 2, 1, 2, 'SRI12_2024-12-20_676513dbd6dac.jpg', 1, '2024-10-31'),
(72, 'TAN67', 'Tanto Hartanto, S.Pd.Kim', '', '', 'TAN67', '0e25f8d8fc8e02dcca3fe53a53781f19', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(73, 'TIT5', 'Titim Fatimah, S.Pd', '', '', 'TIT5', 'bf70ec666d918756bed37bdc658c8086', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(74, 'TIT21', 'apt. Dra. Titin Martini', '', '', 'TIT21', '33ec828359e3ddb059aa16f7acdeba1f', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(75, 'WIW78', 'apt. Wiwit Afyanti, S.Farm', '', '08990077204', 'WIW78', 'a9af153372bbaf2b0e990f2d3bba1a04', 2, 1, 99, 'WIW78_2024-12-20_676521d8c6b26.jpg', 1, '2024-12-20'),
(76, 'YAY27', 'Yayan Daryanto, S.Pd, M.Pd', '', '', 'YAY27', '77700e39b12a112d307e8635762bc54e', 2, 1, 104, 'default.png', 1, '2024-10-31'),
(77, 'YUN14', 'M. Yunus, S.Pdi, M.Pdi', '', '', 'YUN14', 'c844e258846f5655d1a5bbbd1a3d39df', 2, 1, 99, 'default.png', 1, '2024-10-31'),
(78, 'ASD22', 'Testing', 'testing@gmail.com', '123444', 'ASD22', '2ef2b9d3e0bac1614dbfb714b0ff0aa1', 5, 1, 99, 'ASD22_2024-11-08_672d5740ed6d7.jpg', 0, '2024-11-20'),
(79, '-', 'apt H. Pian Nurochman, S.Si, M.Pd.', '', '', 'pian', 'df05afaddca1aee1146756dcdfc454db', 5, 4, 99, 'default.png', 1, '2024-12-20');

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
(19, 1, 14),
(21, 1, 15),
(22, 5, 14),
(27, 5, 2),
(29, 5, 3),
(30, 5, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jabatan`
--

CREATE TABLE `user_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_jabatan`
--

INSERT INTO `user_jabatan` (`id`, `jabatan`) VALUES
(1, 'Guru'),
(2, 'Staff TU'),
(4, 'Kepala Sekolah'),
(5, 'Ketua Yayasan');

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
(1, 'admin'),
(2, 'user'),
(5, 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `menu_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `nama_menu`, `menu_icon`) VALUES
(1, 'Admin', 'fas fa-wrench'),
(2, 'Profil', 'fas fa-user-circle	'),
(3, 'Home', ''),
(14, 'User', 'fas fa-user'),
(15, 'Staff', 'fas fa-user-md	');

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
(1, 15, 'Data Guru', 'staff/guru', 'fas fa-fw fa-users', 1, 1),
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
-- Struktur dari tabel `user_tugas_tambahan`
--

CREATE TABLE `user_tugas_tambahan` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_tugas_tambahan`
--

INSERT INTO `user_tugas_tambahan` (`id`, `nama_tugas`) VALUES
(1, 'Operator'),
(2, 'Wakasek Kurikulum'),
(3, 'Wakasek Kesiswaan'),
(99, '-'),
(101, 'Wakasek Sarana Prasarana'),
(103, 'Wakasek Manajemen Mutu'),
(104, 'Wakasek Humas'),
(105, 'Kepala Program Teknologi Farmasi'),
(106, 'Kepala Program Kimia Analisis'),
(108, 'Kepala Program Layanan Kesehatan'),
(109, 'Kepala Program PPLG'),
(110, 'Kepala Program TJKT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kinerja_kegiatan`
--
ALTER TABLE `kinerja_kegiatan`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `user_tugas_tambahan`
--
ALTER TABLE `user_tugas_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `kinerja_kegiatan`
--
ALTER TABLE `kinerja_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_tugas_tambahan`
--
ALTER TABLE `user_tugas_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
