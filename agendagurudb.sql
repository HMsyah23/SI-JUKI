-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 09:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendagurudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id_agenda` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED DEFAULT NULL,
  `id_tahun_ajaran` int(10) UNSIGNED DEFAULT NULL,
  `id_mapel_guru` int(10) UNSIGNED DEFAULT NULL,
  `jam` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hambatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemecahan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `absen` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id_agenda`, `id_guru`, `id_tahun_ajaran`, `id_mapel_guru`, `jam`, `materi`, `hambatan`, `pemecahan`, `absen`, `keterangan`, `created_at`, `updated_at`, `status`) VALUES
(1, 6, 2, 11, '1,2', '<p>Memahami Makna Bilangan Bulat</p><ol><li>Memberikan Pemahaman</li></ol>', 'Ada Sebagian Siswa yang kehilangan koneksi jaringan saat <i>zoom meeting</i> dimulai', '<p>Siswa yang memiliki kendala internet, diwajibkan mengikuti perkembangan melalui grup telegram dan wa kelas</p>', '30', 'Siswa Cukup Kooperatif', '2021-07-07 16:00:00', '2021-07-08 11:53:41', '1'),
(4, 6, 2, 10, '1,2', '<p>Belajar Memahami Rumus Pythagoras</p><ol><li>Teorama Pythagoras</li><li>Kegunaan Rumus Dalam Kegiatan Sehari - hari</li></ol>', 'Tidak Ada', '<p>Tidak Ada</p>', '12', 'Siswa yang mengisi absensi tidak sampai 50%', '2021-07-08 16:00:00', '2021-07-08 11:51:38', '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_perangkats`
--

CREATE TABLE `file_perangkats` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `id_agenda` int(10) UNSIGNED DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id_guru` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_kepegawaian` int(10) UNSIGNED DEFAULT NULL,
  `id_jabatan` int(10) UNSIGNED DEFAULT NULL,
  `nama_depan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_depan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_belakang` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbm` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lulus` date NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id_guru`, `id_user`, `id_kepegawaian`, `id_jabatan`, `nama_depan`, `nama_belakang`, `gelar_depan`, `gelar_belakang`, `jenis_kelamin`, `agama`, `nbm`, `nip`, `golongan`, `tanggal_lulus`, `tanggal_lahir`, `email`, `universitas`, `jenjang`, `jurusan`, `alamat`, `foto`) VALUES
(6, 13, 5, 4, 'Muhammad', 'Arwani', NULL, 'S.Ag', '1', 'Islam', '1065944', '824475165420000000', NULL, '2000-08-01', '1977-06-16', 'guru01@gmail.com', 'Universitas Mulawarman', 'S1', 'Pend. Agama Islam', 'Jl. Jauh Sekali', 'default-user.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `jabatan`) VALUES
(4, 'Kepala Sekolah'),
(5, 'Wakil Kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_tahun_ajaran` int(10) UNSIGNED DEFAULT NULL,
  `kelas` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_siswa` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_tahun_ajaran`, `kelas`, `jumlah_siswa`) VALUES
(3, 2, 'VII-A', '40'),
(4, 2, 'VII-B', '30');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_gurus`
--

CREATE TABLE `mapel_gurus` (
  `id_mapel_guru` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED DEFAULT NULL,
  `id_mapel` int(10) UNSIGNED DEFAULT NULL,
  `id_kelas` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_gurus`
--

INSERT INTO `mapel_gurus` (`id_mapel_guru`, `id_guru`, `id_mapel`, `id_kelas`) VALUES
(10, 6, 8, 3),
(11, 6, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `id_tahun_ajaran` int(10) UNSIGNED DEFAULT NULL,
  `mata_pelajaran` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajarans`
--

INSERT INTO `mata_pelajarans` (`id_mapel`, `id_tahun_ajaran`, `mata_pelajaran`) VALUES
(8, 2, 'Matematika'),
(10, 2, 'Bahasa Indonesia');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_28_150139_create_status_kepegawaians_table', 1),
(5, '2021_06_28_150931_create_jabatans_table', 1),
(6, '2021_06_28_165030_create_tahun_ajarans_table', 1),
(7, '2021_06_28_165138_create_kelas_table', 1),
(8, '2021_06_28_165208_create_mata_pelajarans_table', 1),
(9, '2021_06_28_165326_create_gurus_table', 1),
(10, '2021_06_28_172912_create_mapel_gurus_table', 1),
(11, '2021_06_28_181412_create_agendas_table', 1),
(12, '2021_06_28_182119_create_file_perangkats_table', 1);

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
-- Table structure for table `status_kepegawaians`
--

CREATE TABLE `status_kepegawaians` (
  `id_status_kepegawaian` int(10) UNSIGNED NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_kepegawaians`
--

INSERT INTO `status_kepegawaians` (`id_status_kepegawaian`, `kode`, `nama`) VALUES
(5, 'GTP', 'Guru Tetap Persyarikatan'),
(6, 'GTTP', 'Guru Tidak Tetap Persyarikatan');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id_tahun_ajaran` int(10) UNSIGNED NOT NULL,
  `periode` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`id_tahun_ajaran`, `periode`, `semester`, `status`) VALUES
(1, '2020/2021', 'Ganjil', 0),
(2, '2020/2021', 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `role`, `email`, `password`, `foto`) VALUES
(1, 'admin', '0', 'admin@admin.com', '$2y$10$YgVPkX5U6GeXjSe9OvCntOb6EervHhneI1YtVfQLUFbizx1lUNuB6', 'default-user.png'),
(13, 'Arwani', '2', 'guru01@gmail.com', '$2y$10$VYzwta7HcFuYsS.As2g0BuHNQBlN523iEyyQgWlYH.CVI35GjdOva', 'default-user.png'),
(15, 'Kepsek', '1', 'kepsek@gmail.com', '$2y$10$67I3QSOpMku8qJA5eU1ELeqNcvs0.ID54sWrQfiLZ48dyYwYnwcp2', 'default-user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `agendas_id_guru_foreign` (`id_guru`),
  ADD KEY `agendas_id_tahun_ajaran_foreign` (`id_tahun_ajaran`),
  ADD KEY `agendas_id_mapel_guru_foreign` (`id_mapel_guru`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_perangkats`
--
ALTER TABLE `file_perangkats`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `file_perangkats_id_agenda_foreign` (`id_agenda`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`),
  ADD KEY `gurus_id_user_foreign` (`id_user`),
  ADD KEY `gurus_id_kepegawaian_foreign` (`id_kepegawaian`),
  ADD KEY `gurus_id_jabatan_foreign` (`id_jabatan`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_id_tahun_ajaran_foreign` (`id_tahun_ajaran`);

--
-- Indexes for table `mapel_gurus`
--
ALTER TABLE `mapel_gurus`
  ADD PRIMARY KEY (`id_mapel_guru`),
  ADD KEY `mapel_gurus_id_guru_foreign` (`id_guru`),
  ADD KEY `mapel_gurus_id_mapel_foreign` (`id_mapel`),
  ADD KEY `mapel_gurus_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `mata_pelajarans_id_tahun_ajaran_foreign` (`id_tahun_ajaran`);

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
-- Indexes for table `status_kepegawaians`
--
ALTER TABLE `status_kepegawaians`
  ADD PRIMARY KEY (`id_status_kepegawaian`);

--
-- Indexes for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id_agenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_perangkats`
--
ALTER TABLE `file_perangkats`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel_gurus`
--
ALTER TABLE `mapel_gurus`
  MODIFY `id_mapel_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id_mapel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_kepegawaians`
--
ALTER TABLE `status_kepegawaians`
  MODIFY `id_status_kepegawaian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id_tahun_ajaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `gurus` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendas_id_mapel_guru_foreign` FOREIGN KEY (`id_mapel_guru`) REFERENCES `mapel_gurus` (`id_mapel_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendas_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajarans` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_perangkats`
--
ALTER TABLE `file_perangkats`
  ADD CONSTRAINT `file_perangkats_id_agenda_foreign` FOREIGN KEY (`id_agenda`) REFERENCES `agendas` (`id_agenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurus_id_kepegawaian_foreign` FOREIGN KEY (`id_kepegawaian`) REFERENCES `status_kepegawaians` (`id_status_kepegawaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurus_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajarans` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel_gurus`
--
ALTER TABLE `mapel_gurus`
  ADD CONSTRAINT `mapel_gurus_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `gurus` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_gurus_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_gurus_id_mapel_foreign` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajarans` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD CONSTRAINT `mata_pelajarans_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajarans` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
