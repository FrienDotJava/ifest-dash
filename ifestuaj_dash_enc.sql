-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifestuaj_dash_enc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity`
--

CREATE TABLE `admin_activity` (
  `id` bigint UNSIGNED NOT NULL,
  `id_admin` tinyint NOT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_activity`
--

INSERT INTO `admin_activity` (`id`, `id_admin`, `activity`, `icon`, `created_at`, `updated_at`) VALUES
(18, 5, '<a href=\"/su_admin/i2c/team/098f6bcd4621d373cade4e832627b4f6\">Memverifikasi Tim</a>', 'check', '2024-01-03 09:33:17', '2024-01-03 09:33:17'),
(19, 5, '<a href=\"/su_admin/i2c/team/098f6bcd4621d373cade4e832627b4f6\">Membatalkan Verifikasi Tim</a>', 'x', '2024-01-03 09:33:35', '2024-01-03 09:33:35'),
(20, 5, 'Menghapus Tim test', 'trash', '2024-01-03 09:33:39', '2024-01-03 09:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `detail_task`
--

CREATE TABLE `detail_task` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_task` datetime NOT NULL,
  `att_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition_task` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_task`
--

INSERT INTO `detail_task` (`id`, `task_id`, `event_id`, `task_name`, `task_description`, `close_task`, `att_pembayaran`, `format`, `condition_task`, `size`, `created_at`, `updated_at`) VALUES
(1, '25e262bf23ec0aebbcf81c545e1e7460', 'i2c', 'Kartu Pelajar', 'Upload hasil scan atau foto kartu pelajar semua anggota tim dalam satu file pdf dengan format:\r\n<b>KartuPelajar_NamaTim_AsalSekolah.pdf</b> (Batas maksimal ukuran file 5 MB)\r\nBatas pengumpulan task : 16 Februari 2023 pukul 23.59', '2024-03-07 23:59:00', NULL, 'application/pdf', NULL, 5, '2022-02-07 02:56:22', '2022-02-07 02:56:22'),
(2, 'cd5706ad15b95f97f59434ff8ed3c976', 'i2c', 'Surat Persetujuan Sekolah', 'Upload hasil file scan atau foto surat persetujuan dari sekolah dalam ekstensi file PDF dengan format: <b>SuratPersetujuan_NamaTim_AsalSekolah.pdf</b>. Contoh surat persetujuan dapat didownload sebagai berikut <a href=\"CONTOH SURAT PERSETUJUAN SEKOLAH.docx\"> Contoh Surat Persetujuan</a>', '2023-02-17 23:59:00', NULL, 'application/pdf', NULL, 5, '2022-02-07 03:01:42', '2022-02-07 03:01:42'),
(3, 'a6dbb67525b4f62b31f5443f52dfd570', 'i2c', 'Proposal Ide', 'Upload file proposal ide produk dalam ekstensi pdf dengan format : <b>Proposal_NamaProduk_NamaTim_AsalSekolah.pdf</b>', '2023-03-16 23:59:00', NULL, 'application/pdf', 'Terverifikasi', 100, '2022-02-08 04:07:06', '2022-02-08 04:07:06'),
(4, 'a02c31f256c5f68bcc211dac393fcb49', 'wdc', 'Kartu Tanda Mahasiswa', 'Upload hasil file scan atau foto kartu tanda mahasiswa semua anggota tim dalam satu file zip dengan format: <b>NamaTim_Kartu Identitas.zip</b>', '2022-03-22 13:00:00', NULL, 'application/x-zip-compressed, zip, application/zip, application/x-zip', NULL, 2, '2022-02-07 02:56:22', '2022-02-07 02:56:22'),
(6, '2f4aa615ea15b3b3756a6082968bd103', 'wdc', 'Desain Web', 'Melampirkan hasil karya desain situs web berupa file web dan screenshot desain dengan format penamaan <b>IFest#10_WDC_NamaTim_NamaUniversitas.zip</b>\r\n', '2022-03-22 13:00:00', NULL, 'application/x-zip-compressed, zip, application/zip, application/x-zip', 'Terverifikasi', 8, '2022-02-08 04:07:06', '2022-02-08 04:07:06'),
(7, '5cfdb867e96374c7883b31d6928cc4cb', 'wdc', 'Bukti Pembayaran', 'Upload hasil file scan atau foto bukti pembayaran (tata cara pembayaran dapat dilihat didalam rulebook) dengan format penamaan <b>NamaTim_Bukti Pembayaran.pdf</b>', '2022-03-22 13:00:00', 'tutor', 'application/pdf', NULL, 1, '2022-02-07 02:56:22', '2022-02-07 02:56:22'),
(8, '0038dd3b53b23cd35e71484b80c719fc', 'muc', 'Kartu Identitas', 'Upload hasil file scan atau foto kartu tanda mahasiswa semua anggota tim dalam satu file zip dengan format: <b>NamaTim_Kartu Identitas.zip</b>', '2022-04-17 23:59:00', NULL, 'application/x-zip-compressed, zip, application/zip, application/x-zip', NULL, 2, '2022-02-07 02:56:22', '2022-02-07 02:56:22'),
(9, 'f819f4bf15f2d31f533a49033b1fda53', 'muc', 'Logo Universitas', 'Upload logo universitas berukuran 1:1, dengan format: NamaTim_NamaUniversitas_Logo Universitas.png (Batas maksimal ukuran file 1MB)', '2022-04-17 23:59:00', NULL, 'image/png', NULL, 1, '2022-02-07 03:01:42', '2022-02-07 03:01:42'),
(10, '92db18d6e815390b60a4fe9b6e45dd63', 'muc', 'Bukti Pembayaran', 'Upload hasil file scan atau foto bukti pembayaran(tata cara pembayaran dapat dilihat didalam rulebook) dengan format penamaan <b>NamaTim_Bukti Pembayaran.pdf</b>', '2022-04-17 23:59:00', 'tutor', 'application/pdf', NULL, 1, '2022-02-07 02:56:22', '2022-02-07 02:56:22'),
(11, '6665bc516536f7f659648a0cf45a96d4', 'muc', 'Surat Persetujuan Universitas', 'Upload hasil file scan atau foto surat persetujuan dari universitas dengan format: <b>NamaTim_NamaUniversitas_Surat Persetujuan.pdf</b>\r\n<br>\r\nUntuk contoh template surat persetujuan universitas dapat diunduh pada link berikut ini : \r\n<a href=\"https://docs.google.com/document/d/1_A_G5XTaPDFESNdkoXs-DWMcLtvUZwnV/edit?usp=sharing&ouid=111397242289216092346&rtpof=true&sd=true\" target=\"_blank\">Contoh Surat Persetujuan</a>', '2022-04-17 23:59:00', NULL, 'application/pdf', NULL, 1, '2022-02-07 03:01:42', '2022-02-07 03:01:42'),
(12, 'ab36abef0cdebd2f84424ad4d17e286b', 'i2c', 'Bukti Pembayaran', 'Upload hasil screenshot atau foto bukti transaksi pembayaran dalam ekstensi file JPG/JPEG/PNG dengan format: <b>BuktiPembayaran_NamaTim_AsalSekolah.jpg/jpeg/png</b>', '2023-02-16 23:59:00', NULL, 'image/png,image/jpeg,image/jpg', NULL, 5, '2023-01-05 09:02:20', '2023-01-05 09:02:20'),
(13, '5a792cb36181e368c516b1e321875141', 'i2c', 'Poster Ide', 'Upload file poster ide produk dalam ekstensi JPG/JPEG/PNG dengan format : <b>Poster_NamaProduk_NamaTim_AsalSekolah.jpg/jpeg/png</b>', '2023-01-16 23:59:00', NULL, 'image/png,image/jpg,image/jpeg', 'Terverifikasi', 100, '2023-01-05 09:06:14', '2023-01-05 09:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `donor_darah`
--

CREATE TABLE `donor_darah` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donor_darah`
--

INSERT INTO `donor_darah` (`id`, `nama`, `npm`, `email`, `no_hp`, `umur`, `berat_badan`, `golongan_darah`, `hal`, `hari`, `created_at`, `updated_at`) VALUES
(1, 'Ferdy Firmansyah', '-', 'ferdyfirmansyah3026@gmail.com', '2', '19', '59', 'o', 'Lengkap Sesuai Persyaratan', 'Rabu', '2023-01-08 17:03:57', '2023-01-08 17:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `event_perio`
--

CREATE TABLE `event_perio` (
  `id` bigint UNSIGNED NOT NULL,
  `event_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_event_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` enum('Tim','Solo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_member` int DEFAULT NULL,
  `start_regis` datetime NOT NULL,
  `close_regis` datetime NOT NULL,
  `image_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_soon` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_perio`
--

INSERT INTO `event_perio` (`id`, `event_code`, `event_name`, `description`, `price`, `task_event_code`, `event_type`, `max_member`, `start_regis`, `close_regis`, `image_event`, `cm_soon`, `created_at`, `updated_at`) VALUES
(1, 'i2c', 'Innovative Informatics Contest (I2C)', 'Innovative Informatics Contest (I2C) 2023 adalah sebuah kompetisi ide kreatif untuk merancang aplikasi yang inovatif secara berkelompok beranggotakan 3 orang. I2C 2023 ini mengusung tema \"A Step Closer to Perfection\"', 'Rp. 0', 'i2c', 'Tim', 3, '2022-12-09 13:00:00', '2024-03-12 00:00:00', 'events/avatar/99f0gBYdsTLlMeirAswpVQoZdbxtzkmYaPKvAX9R.png', 0, '2022-02-06 11:27:02', '2023-01-09 07:12:31'),
(2, 'wdc', 'Web Design Competition (WDC)', 'Web Design Competition (WDC) 2023 adalah perlombaan merancang desain visual yang ditampilkan di media digital yaitu situs web. WDC 2023 mengangkat tema \"Embrace the Future of Local Economy with Technology\"', 'Rp. 50.000', 'wdc', 'Solo', NULL, '2022-02-15 13:00:00', '2024-03-14 13:00:00', 'events/avatar/l700XdfBmKUWsEBkRsGinXuHK0ggEhzIQujvWZXu.png', 0, '2022-02-06 11:27:02', '2023-01-09 07:14:10'),
(3, 'muc', 'Mobile UI UX Competition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took', 'Rp. 50.000', 'hck', 'Solo', NULL, '2022-03-07 08:15:00', '2024-04-17 23:59:00', 'events/avatar/TWXys60izveMuJ7Au2kGQqYbFI7379UcDuCTdiRz.png', 0, '2022-02-06 11:27:02', '2023-01-05 08:58:01'),
(4, 'dcr', 'Donor Darah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took', 'Rp. 0', 'dcr', 'Solo', NULL, '2022-03-07 08:15:00', '2022-04-17 23:59:00', 'events/avatar/donor_darah.png', 1, '2022-02-06 11:27:02', '2023-01-05 08:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `id` bigint UNSIGNED NOT NULL,
  `id_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_ins` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ins` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pendamping` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int NOT NULL,
  `status` enum('1','0','bl') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_01_07_150157_create_donor_darah_table', 1),
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2021_12_26_161952_create_admin_activity_table', 1),
(20, '2022_01_11_115651_create_detail_task_table', 1),
(21, '2022_01_21_182729_create_event_perio_table', 1),
(22, '2022_01_26_161314_create_event_team_table', 1),
(23, '2022_01_26_164614_create_team_member_table', 1),
(24, '2022_01_29_154341_create_tmp_files_table', 1),
(25, '2022_01_31_213852_create_task_table', 1),
(26, '2022_02_07_121922_create_rules_book_table', 1),
(27, '2022_12_11_145803_create_notification_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint UNSIGNED NOT NULL,
  `id_team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules_book`
--

CREATE TABLE `rules_book` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules_book` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules_book`
--

INSERT INTO `rules_book` (`id`, `event_id`, `rules_book`, `created_at`, `updated_at`) VALUES
(1, 'i2c', '/events/rulesbook/Rulebook_I2C.pdf', '2022-02-07 05:25:04', '2022-02-07 05:25:04'),
(2, 'hck', '/events/rulesbook/Rulebook_CP.pdf', '2022-02-07 05:25:04', '2022-02-07 05:25:04'),
(3, 'wdc', '/events/rulesbook/Rulebook_WDC.pdf', '2022-02-07 05:25:04', '2022-02-07 05:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int NOT NULL,
  `team_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` bigint UNSIGNED NOT NULL,
  `id_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_iden` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int NOT NULL,
  `timeline` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `close` date DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `timeline`, `start`, `close`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Online ( I2C )', '2023-01-16', '2023-02-17', 'file-text', '2022-03-11 15:03:14', '2023-01-05 08:09:12'),
(2, 'Pendaftaran Online ( WDC )', '2023-01-30', '2023-03-01', 'file-text', '2022-03-11 15:03:14', '2023-01-11 03:16:39'),
(3, 'Seleksi dan Penilaian ( I2C )', '2022-03-20', '2022-03-23', 'edit-3', '2022-03-11 15:04:22', '2022-03-11 15:04:22'),
(4, 'Pengumuman Hasil Seleksi ( I2C )', '2022-03-24', NULL, 'send', '2022-03-11 15:04:22', '2022-03-11 15:04:22'),
(5, 'Persiapan Expo dan Presentasi <br> ( I2C )', '2022-03-25', '2022-03-31', 'mic', '2022-03-11 15:05:53', '2022-03-11 15:05:53'),
(6, 'Pameran Online (Virtual Expo I2C) ', '2022-04-01', '2022-04-03', 'globe', '2022-03-11 15:06:29', '2022-03-11 15:06:29'),
(7, 'Penilaian Expo ( I2C )', '2022-04-01', '2022-04-03', 'bar-chart', '2022-03-11 15:06:29', '2022-03-11 15:06:29'),
(8, 'Pengumuman Finalis ( I2C )', '2022-04-04', NULL, 'slack', NULL, NULL),
(9, 'Technical Meeting ( I2C )', '2022-04-07', NULL, 'mic', NULL, NULL),
(10, 'Final I2C', '2022-04-09', NULL, 'user', NULL, NULL),
(11, 'Seleksi dan Penilaian ( WDC )', '2022-03-23', '2022-03-27', 'edit-3', '2022-03-11 15:04:22', '2022-03-11 15:04:22'),
(12, 'Pengumuman 5 Karya Terbaik <br> ( WDC )', '2022-03-29', NULL, 'bar-chart', '2022-03-11 15:04:22', '2022-03-11 15:04:22'),
(13, 'Technical Meeting ( WDC )', '2022-03-31', NULL, 'mic', NULL, NULL),
(14, 'Final WDC', '2022-04-02', NULL, 'user', NULL, NULL),
(15, 'Pendaftaran Online ( MUC )', '2022-03-07', '2022-04-17', 'file-text', '2022-03-11 15:03:14', '2024-01-03 09:09:03'),
(16, 'Tahap Pemanasan ( MUC )', '2022-04-30', '2023-01-18', 'slack', '2022-03-11 15:03:14', '2024-01-03 09:13:20'),
(17, 'Tahap Penyisihan ( MUC )', '2022-05-01', '2023-01-25', 'edit-3', '2022-03-11 15:03:14', '2024-01-03 09:13:41'),
(18, 'Konfirmasi Ulang ( MUC )', '2022-05-06', '2022-05-08', 'file-text', '2022-03-11 15:03:14', '2024-01-03 09:11:35'),
(19, 'Pengumuman Finalis ( MUC )', '2022-05-08', '2023-01-10', 'mic', '2022-03-11 15:03:14', '2024-01-03 09:13:49'),
(20, 'Final dan Pengumuman Pemenang <br> ( MUC )', '2022-05-14', '2022-05-14', 'user', '2022-03-11 15:03:14', '2024-01-03 09:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_files`
--

CREATE TABLE `tmp_files` (
  `id` bigint UNSIGNED NOT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('superuser','staff','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `nomor_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telpon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `foto`, `email`, `email_verified_at`, `password`, `user_type`, `nomor_id`, `tgl_lahir`, `id_line`, `instagram`, `no_telpon`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin SI', 'user/avatar/1644146416.gif', 'superuser@ifest.uajy.ac.id', '2022-02-06 11:20:53', '$2y$10$gF8lLKJyp4wSNGoiTD5YqeTGLkEIJLcb8sh4LfFYJAP2twkpCGpzi', 'superuser', NULL, NULL, NULL, NULL, NULL, NULL, 'cchfVdNx6GZ5Pvwq1ANacH8VNMC16R1vKDGNvmi4EVqcAT6AeOiqwHIRZA4A', '2022-02-06 11:20:16', '2022-02-06 11:20:53'),
(4, 'ferdy', 'user/avatar/1670558353.png', 'gaguna3026@gmail.com', '2022-12-09 03:59:33', '$2y$10$gF8lLKJyp4wSNGoiTD5YqeTGLkEIJLcb8sh4LfFYJAP2twkpCGpzi', 'user', '5106', '2022-12-10', '-', 'ferdyfrms', '0895401144676', 'tidakkkkkkk', 'Zop4MGJA6MlGTWhZzLKdM8BPaWDXgMwzmQ7tL87aM8tzalSmyxqnkh88Oj6v', '2022-12-09 03:59:13', '2023-01-09 10:28:20'),
(5, 'Sekretariat', 'user/avatar/1644146417.gif', 'sekretariat@ifest.uajy.ac.id', '2022-02-06 11:20:53', '$2y$10$gF8lLKJyp4wSNGoiTD5YqeTGLkEIJLcb8sh4LfFYJAP2twkpCGpzi', 'staff', NULL, NULL, NULL, NULL, NULL, NULL, 'd2OZbmmUNCLcgiqsvBXyKejS5Z4mV4QewKRKVUcv1PFf4Xcnq4ytoQijBRwQ', '2022-02-06 11:20:16', '2022-02-06 11:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_task`
--
ALTER TABLE `detail_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_darah`
--
ALTER TABLE `donor_darah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_perio`
--
ALTER TABLE `event_perio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rules_book`
--
ALTER TABLE `rules_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_files`
--
ALTER TABLE `tmp_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_activity`
--
ALTER TABLE `admin_activity`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_task`
--
ALTER TABLE `detail_task`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donor_darah`
--
ALTER TABLE `donor_darah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_perio`
--
ALTER TABLE `event_perio`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_team`
--
ALTER TABLE `event_team`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tmp_files`
--
ALTER TABLE `tmp_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
