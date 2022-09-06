-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 05:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `email`, `password`) VALUES
(1, 'mahdan', 'mahdan@gmail.com', 'mahdan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alasanlapor`
--

CREATE TABLE `tb_alasanlapor` (
  `id_alasanlapor` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `targetalasan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alasanlapor`
--

INSERT INTO `tb_alasanlapor` (`id_alasanlapor`, `judul`, `deskripsi`, `targetalasan`) VALUES
(1, 'Konten dewasa', 'Konten bersifat eksplisit secara seksual, pornografi, atau tidak pantas ', 'postingan'),
(2, 'Pelecehan', 'Meremehkan atau permusuhan terhadap seseorang atau kelompok', 'postingan'),
(3, ' Spam', 'Menjual barang ilegal, penipuan uang, dll.', 'postingan'),
(4, 'Tidak menjawab pertanyaan', 'Tidak sesuai dengan pertanyaan yang diajukan ', 'postingan'),
(5, ' Plagiarisme', 'Menggunakan kembali konten tanpa mencantumkan atribusi (tautan dan kutipan) ', 'postingan'),
(6, 'Jawaban guyonan', 'Bukan jawaban wajar ', 'postingan'),
(7, 'Tulisan jelek', 'Bukan dalam Bahasa Indonesia atau mempunyai format, tata bahasa, dan ejaan yang sangat buruk ', 'postingan'),
(8, ' Gambar buruk', 'Konten mengandung gambar yang melanggar kebijakan', 'postingan'),
(9, ' Tidak sesuai fakta', 'Secara substansi tidak benar dan /atau kesimpulan utama tidak benar', 'postingan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kata`
--

CREATE TABLE `tb_kata` (
  `id_kata` int(11) NOT NULL,
  `nm_kata` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kata`
--

INSERT INTO `tb_kata` (`id_kata`, `nm_kata`) VALUES
(2, '2jancok'),
(3, '3jancok'),
(4, '4jancok'),
(5, 'sdfsf'),
(6, 'fgasdaawqedqae'),
(8, 'jangaaannnn'),
(9, 'tidak boleh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `foto_unggahan` varchar(150) NOT NULL,
  `video_unggahan` varchar(150) NOT NULL,
  `berkas_unggahan` varchar(150) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `komentar`, `foto_unggahan`, `video_unggahan`, `berkas_unggahan`, `id_pengguna`) VALUES
(1, 'komentar pertama', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapor`
--

CREATE TABLE `tb_lapor` (
  `id_lapor` int(11) NOT NULL,
  `id_alasanlapor` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `deskripsi_tambahan` varchar(255) NOT NULL,
  `id_postingan` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `target` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lapor`
--

INSERT INTO `tb_lapor` (`id_lapor`, `id_alasanlapor`, `tgl`, `deskripsi_tambahan`, `id_postingan`, `id_komentar`, `id_pengguna`, `target`) VALUES
(3, 3, '2022-06-05', ' yang ketiga yang ketiga yang ketiga yang ketiga yang ketiga yang ketiga yang ketiga yang ketiga', 0, 0, 1, 'pengguna'),
(4, 1, '2021-09-02', 'asdasd asd a qw vdqw def  vasdzf webfawaw', 0, 3, 0, 'komentar'),
(5, 2, '2021-09-02', 'kesekkan kaliuntya', 1, 0, 0, 'postingan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_profil` varchar(150) NOT NULL,
  `foto_page` varchar(150) NOT NULL,
  `kredensial` varchar(45) NOT NULL,
  `deskripsi` varchar(45) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `pendidikan` varchar(45) NOT NULL,
  `kabupaten` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nm_pengguna`, `email`, `password`, `tgl_lahir`, `foto_profil`, `foto_page`, `kredensial`, `deskripsi`, `pekerjaan`, `pendidikan`, `kabupaten`, `provinsi`, `tgl_daftar`) VALUES
(1, 'mahdan', 'mahdan@gmail.com', 'mahdan', '0000-00-00', '', '', 'gemar memasak', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_postingan`
--

CREATE TABLE `tb_postingan` (
  `id_postingan` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsilengkap` varchar(200) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `mode` varchar(6) NOT NULL,
  `tipe` varchar(9) NOT NULL,
  `tgl_buat` date NOT NULL,
  `foto_unggahan` varchar(150) NOT NULL,
  `video_unggahan` varchar(150) NOT NULL,
  `berkas_unggahan` varchar(150) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_postingan`
--

INSERT INTO `tb_postingan` (`id_postingan`, `judul`, `deskripsilengkap`, `id_topik`, `mode`, `tipe`, `tgl_buat`, `foto_unggahan`, `video_unggahan`, `berkas_unggahan`, `id_pengguna`) VALUES
(1, 'Percobaan 1', 'asal asalasal asalasal asalasal asalasal asal', 2, '', 'ASK', '0000-00-00', '', '', '', 1),
(3, 'percobaan 2', 'ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ngasal2 ', 1, '', 'ASK', '2022-06-08', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suka`
--

CREATE TABLE `tb_suka` (
  `id_suka` int(11) NOT NULL,
  `id_postingan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `naik` int(11) NOT NULL,
  `turun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_topik`
--

CREATE TABLE `tb_topik` (
  `id_topik` int(11) NOT NULL,
  `nm_topik` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_topik`
--

INSERT INTO `tb_topik` (`id_topik`, `nm_topik`) VALUES
(1, 'Matematika'),
(2, 'Sejarah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_alasanlapor`
--
ALTER TABLE `tb_alasanlapor`
  ADD PRIMARY KEY (`id_alasanlapor`);

--
-- Indexes for table `tb_kata`
--
ALTER TABLE `tb_kata`
  ADD PRIMARY KEY (`id_kata`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_postingan`
--
ALTER TABLE `tb_postingan`
  ADD PRIMARY KEY (`id_postingan`);

--
-- Indexes for table `tb_suka`
--
ALTER TABLE `tb_suka`
  ADD PRIMARY KEY (`id_suka`);

--
-- Indexes for table `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_alasanlapor`
--
ALTER TABLE `tb_alasanlapor`
  MODIFY `id_alasanlapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kata`
--
ALTER TABLE `tb_kata`
  MODIFY `id_kata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_postingan`
--
ALTER TABLE `tb_postingan`
  MODIFY `id_postingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_suka`
--
ALTER TABLE `tb_suka`
  MODIFY `id_suka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_topik`
--
ALTER TABLE `tb_topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
