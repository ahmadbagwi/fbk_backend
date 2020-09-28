-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2020 at 01:48 PM
-- Server version: 10.4.14-MariaDB-1:10.4.14+maria~bionic
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbk_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permohonan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanggungjawaban` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesanggupan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `integritas` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `politik` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `komunitas` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesekretariatan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `catatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id`, `user_id`, `permohonan`, `proposal`, `pertanggungjawaban`, `kesanggupan`, `rekening`, `npwp`, `ktp`, `kk`, `integritas`, `riwayat`, `politik`, `domisili`, `komunitas`, `kesekretariatan`, `prestasi`, `akta`, `status`, `catatan`, `pemeriksa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'http://fbkapp.local/storage/files/1/simbako_bawang_merah_800_600.jpg', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', 'http://fbkapp.local/storage/files/1/Form penerimaan bahan ajar Kel B.pdf', 'http://fbkapp.local/storage/files/1/simbako_bawang_merah_800_600.jpg', 'http://fbkapp.local/storage/files/1/website wbtb.png', 'http://fbkapp.local/storage/files/1/simbako_minyak_goreng.jpe', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', 'http://fbkapp.local/storage/files/1/simbako_minyak_goreng.jpe', 'http://fbkapp.local/storage/files/1/website wbtb.png', 'http://fbkapp.local/storage/files/1/simbako_minyak_goreng.jpe', 'http://fbkapp.local/storage/files/1/Form penerimaan bahan ajar Kel B.pdf', 'http://fbkapp.local/storage/files/1/Form penerimaan bahan ajar Kel B.pdf', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', 'http://fbkapp.local/storage/files/1/Form penerimaan bahan ajar Kel B.pdf', 'Lolos', 'Sukse anda lolos', 'Ahmad Bagwi Rifai 123', '2020-09-24 23:20:59', '2020-09-27 16:45:54', NULL),
(2, 3, 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'Perlu Perbaikan', NULL, 'Ahmad Bagwi Rifai 123', '2020-09-25 23:56:06', '2020-09-27 16:38:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengusul` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penananggungjawab` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kemenkumham` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `user_id`, `kategori`, `nama_pengusul`, `nama_penananggungjawab`, `ktp`, `kemenkumham`, `akta`, `npwp`, `alamat`, `provinsi`, `kota`, `telp`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 'Komunitas', 'Dinda Yourista Ike Fiernanti', 'Dinda', 'http://fbkapp.local/storage/files/superadmin/dinda_yourista_ike_fiernanti/ahmad bagwi rifai portfolio.pdf', 'http://fbkapp.local/storage/files/2/cara deploy laravel ke google app engine 1 pilih project.png', 'http://fbkapp.local/storage/files/2/cara deploy laravel ke google app engine 1_modified.png', 'http://fbkapp.local/storage/files/2/cara deploy laravel ke google app engine 2_modified.png', 'Tuban', 'Jawa Timur', 'Tuban', '0856', 'dinda.ipb42@gmail.com', 'pending', '2020-09-23 18:23:52', '2020-09-27 20:15:40', NULL),
(5, 1, 'Komunitas', 'Ahmad Bagwi Rifai 123', 'Rifanti', 'http://fbkapp.local/storage/files/1/website wbtb.png', 'http://fbkapp.local/storage/files/1/website wbtb.png', 'http://fbkapp.local/storage/files/shares/ScreenShot Capture   Editor Tool - Chrome Webstore.png', 'http://fbkapp.local/storage/files/shares/survei covid bps 1.png', 'TDP', 'Jawa Barat', 'Kab Bogor', '085', 'ahmadbagwi.id@gmail.com', 'pending', '2020-09-24 16:17:56', '2020-09-26 22:30:01', NULL),
(6, 3, 'Lembaga Organisasi', 'Nismara', 'Nismara Rifanti', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'Jl. Jeruk', 'Jawa Timur', 'Perbon', '0251', 'nismara123@gmail.com', 'pending', '2020-09-25 23:53:00', '2020-09-26 22:29:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `terima` date NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `laporan80` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `laporan20` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `user_id`, `terima`, `mulai`, `selesai`, `laporan80`, `laporan20`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2020-09-01', '2020-09-29', '2020-10-02', 'http://fbkapp.local/storage/files/superadmin/dinda_yourista_ike_fiernanti/Pertemuan 6 ERP.pdf', 'http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe', '2020-09-25 07:29:51', '2020-09-25 22:30:46', NULL),
(2, 2, '2020-09-01', '2020-09-10', '2020-09-27', 'http://fbkapp.local/storage/files/superadmin/dinda_yourista_ike_fiernanti/city.jpg', 'http://fbkapp.local/storage/files/superadmin/dinda_yourista_ike_fiernanti/website wbtb.png', '2020-09-25 22:31:57', '2020-09-25 22:31:57', NULL),
(3, 3, '2020-09-01', '2020-09-10', '2020-09-19', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', 'http://fbkapp.local/storage/files/superadmin/nismara/Info Layanan SPSE Off.pdf', '2020-09-25 23:02:33', '2020-09-25 23:02:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_22_012403_create_sessions_table', 1),
(7, '2020_08_06_021240_akun', 2),
(8, '2020_08_06_021241_pengajuan', 3),
(9, '2020_08_06_021242_administrasi', 4),
(10, '2020_08_06_021243_laporan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsep` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `selesai` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahap1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahap2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rab` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `catatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `user_id`, `jenis`, `judul`, `konsep`, `mulai`, `selesai`, `tahap1`, `tahap2`, `biaya`, `rab`, `video`, `status`, `catatan`, `pemeriksa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Pendayagunaan Ruang Publik', 'qwerty', 'ww<div><img src=\"http://fbkapp.local/storage/files/1/simbako_gula_merah.jpe\"></div>', '2020-08-31', '2020-09-18', '<ol><li><p class=\"MsoNormal\" style=\"margin: 0pt 0pt 0.0001pt; font-family: &quot;Times New Roman&quot;;\">Halo<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0pt 0pt 0.0001pt; font-family: &quot;Times New Roman&quot;;\">Satu<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0pt 0pt 0.0001pt; font-family: &quot;Times New Roman&quot;;\">Dua<o:p></o:p></p></li></ol>', '<ul><li>Halo Saya</li></ul><h5><ul><li><b>Teks Bold</b></li><li><i>Teks miring</i></li><li><u>Teks underline</u></li></ul></h5>', 'yy', 'http://fbkapp.local/storage/files/1/simbako_bawang_merah_800_600.jpg', 'yyy', 'Tidak Lolos', 'Tidak lengkap', 'Ahmad Bagwi Rifai 123', '2020-09-24 17:56:17', '2020-09-27 16:48:21', NULL),
(2, 3, 'Pendayagunaan Ruang Publik', 'Judul Nismara', 'Konsep<div><ol><li>satu</li><li>dua</li><li>tiga</li></ol></div>', '2020-09-01', '2020-09-26', 'Tahap 1', 'Tahap 2', '250000000', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', 'https://youtube.com', 'Lolos', 'Bagus sekali', NULL, '2020-09-25 23:54:40', '2020-09-27 06:40:02', '2020-09-27 06:40:02'),
(3, 3, 'Pendayagunaan Ruang Publik', 'Judul Nismara', 'a', '2020-09-01', '2020-09-09', 'b', 'c', 'd', 'http://fbkapp.local/storage/files/superadmin/nismara/storage drive fbk 100gb.png', NULL, 'pending', NULL, NULL, '2020-09-27 23:05:22', '2020-09-27 23:05:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'test', '726c35d8253960bc6c304f4750a4a60f94de5ad9cc82c177773530da8fa37823', '[\"read\",\"create\"]', NULL, '2020-09-22 16:18:50', '2020-09-22 16:18:50'),
(2, 'App\\Models\\User', 1, 'test2', 'fb1c012729f5abd80960b0519a32da9039da2c31fa36e77fe567d9aa35444942', '[\"read\",\"create\"]', '2020-09-22 16:27:41', '2020-09-22 16:19:01', '2020-09-22 16:27:41'),
(3, 'App\\Models\\User', 2, 'test', 'c2bd57992acd7aa71e086d3abca00e05f7bf048e0ac0142782d7804447ad723b', '[\"read\",\"create\"]', '2020-09-22 17:59:44', '2020-09-22 16:28:23', '2020-09-22 17:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D1qoXndT5dvP1YCDN6Bvx3X4otcIvnMo5cQ4FYQe', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3BSOWdYQTdLamxZVG1mZkVlVlpZdWdhZ3VZN1JRem9OYmI0S1NoWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9mYmthcHAubG9jYWwvZm9yZ290LXBhc3N3b3JkIjt9fQ==', 1601259303),
('H6xEvthLg4Z7uB0U7uB909e7uiDLu3ERtGBh8SIL', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiY09aR2tCSXdqdmlUdEY4VGVOaXFzY0RWZzl6dlBBTkNabDlsU250NyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vZmJrYXBwLmxvY2FsL2xhcmF2ZWwtZmlsZW1hbmFnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkZHMzM2tUSG5ya1VHTWNWOTNvU0JqTzlwZXV2eU9scmV3WmhNdmpudnJ4OWtxRlUxQ2Rwb08iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGRzMzNrVEhucmtVR01jVjkzb1NCak85cGV1dnlPbHJld1poTXZqbnZyeDlrcUZVMUNkcG9PIjt9', 1601275415),
('JHaFihDyLxNDreuzY4CHjALgMpqe4Y3ahthn9bh4', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRXJRZUtsQlFkY2VoZXhMU3lmUkZ6b2E1Rk9DdktScmZialhzMFVBMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9mYmthcHAubG9jYWwvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGRzMzNrVEhucmtVR01jVjkzb1NCak85cGV1dnlPbHJld1poTXZqbnZyeDlrcUZVMUNkcG9PIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRkczMza1RIbnJrVUdNY1Y5M29TQmpPOXBldXZ5T2xyZXdaaE12am52cng5a3FGVTFDZHBvTyI7fQ==', 1601259407),
('lwpUb5AbmwMfDyWJcVMNb1Fs31I68qPEdlgH21wG', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVlUweGlMcXlMUWNQeEFwM2hFamozOHdhS1hKZ013WkNmSDhEVUxXSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9mYmthcHAubG9jYWwvbGFyYXZlbC1maWxlbWFuYWdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRkczMza1RIbnJrVUdNY1Y5M29TQmpPOXBldXZ5T2xyZXdaaE12am52cng5a3FGVTFDZHBvTyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkZHMzM2tUSG5ya1VHTWNWOTNvU0JqTzlwZXV2eU9scmV3WmhNdmpudnJ4OWtxRlUxQ2Rwb08iO30=', 1601271557),
('oRMGvvdEaxIh1Yo7KtCWfLnk1l3YKYny0rBJMKYn', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZzJNN1NGOElkclpHZDBpYmw3MWNVMWdTSG1hSklNM1kxdHpvM25LSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9mYmthcHAubG9jYWwvYmlvZGF0YS9zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG1ZL1FCNWFkYkRQNk1hQlN3WWpkOXU2OTVseGZDLlJXTXllTTczeW1OcmxOWTNqQVUxRnhhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRtWS9RQjVhZGJEUDZNYUJTd1lqZDl1Njk1bHhmQy5SV015ZU03M3ltTnJsTlkzakFVMUZ4YSI7fQ==', 1601262949),
('twFTLkGcA12YnOeszGoICz9b9iR7R3cyzWQshfhR', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZzVhRlFFUExadXl5MW1FUGVKRkdQMTBjdXhTNUVoMWhQc1Q5WXhCdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9mYmthcHAubG9jYWwvbGFyYXZlbC1maWxlbWFuYWdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRkczMza1RIbnJrVUdNY1Y5M29TQmpPOXBldXZ5T2xyZXdaaE12am52cng5a3FGVTFDZHBvTyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkZHMzM2tUSG5ya1VHTWNWOTNvU0JqTzlwZXV2eU9scmV3WmhNdmpudnJ4OWtxRlUxQ2Rwb08iO30=', 1601273269);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Bagwi Rifai 123', 'ahmadbagwi.id@gmail.com', NULL, '$2y$10$yzDF2WQHkh2y7QvxIwYvTOIJk2a5kYkynbCMJ55lZu3XQ0WmyjX3e', NULL, NULL, NULL, NULL, 'profile-photos/jNDwFzahfbv0MH1LaKlb6dP8kwlpa1he6pJo06kT.jpeg', 'superadmin', '2020-09-21 18:51:24', '2020-09-22 18:13:10'),
(2, 'Dinda Yourista Ike Fiernanti', 'dinda.ipb42@gmail.com', NULL, '$2y$10$mY/QB5adbDP6MaBSwYjd9u695lxfC.RWMyeM73ymNrlNY3jAU1Fxa', NULL, NULL, NULL, NULL, NULL, 'user', '2020-09-21 18:56:04', '2020-09-21 18:56:04'),
(3, 'Nismara', 'nismara123@gmail.com', NULL, '$2y$10$ds33kTHnrkUGMcV93oSBjO9peuvyOlrewZhMvjnvrx9kqFU1CdpoO', NULL, NULL, NULL, NULL, NULL, 'user', '2020-09-24 23:58:22', '2020-09-24 23:58:22'),
(4, 'Dinda Yourista Ike Fiernanti', 'ahmad.kdesain2@gmail.com', NULL, '$2y$10$c6XeO23dxFoDb5lvWhaPW.x.Y2Jmqml5JZE8ipY0PTRKW1hrkvl/W', NULL, NULL, NULL, NULL, NULL, 'user', '2020-09-25 21:41:11', '2020-09-25 21:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrasi_user_id_index` (`user_id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_email_unique` (`email`),
  ADD KEY `akun_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_user_id_index` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD CONSTRAINT `administrasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
