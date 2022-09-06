-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 04:58 PM
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
(8, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'mahdan', 'mahdan@gmail.com', '00bc897d557c010cb783d37ae0cbe38e');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alasanlapor`
--

CREATE TABLE `tb_alasanlapor` (
  `id_alasanlapor` int(11) NOT NULL,
  `judul_alasan` varchar(25) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `targetalasan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alasanlapor`
--

INSERT INTO `tb_alasanlapor` (`id_alasanlapor`, `judul_alasan`, `deskripsi`, `targetalasan`) VALUES
(1, 'Konten dewasa', 'Konten bersifat eksplisit secara seksual, pornografi, atau tidak pantas ', 'postingan'),
(2, 'Pelecehan', 'Meremehkan atau permusuhan terhadap seseorang atau kelompok', 'postingan'),
(3, ' Spam', 'Menjual barang ilegal, penipuan uang, dll.', 'postingan'),
(4, 'Tidak menjawab pertanyaan', 'Tidak sesuai dengan pertanyaan yang diajukan ', 'postingan'),
(5, ' Plagiarisme', 'Menggunakan kembali konten tanpa mencantumkan atribusi (tautan dan kutipan) ', 'postingan'),
(6, 'Jawaban guyonan', 'Bukan jawaban wajar ', 'postingan'),
(7, 'Tulisan jelek', 'Bukan dalam Bahasa Indonesia atau mempunyai format, tata bahasa, dan ejaan yang sangat buruk ', 'postingan'),
(8, ' Gambar buruk', 'Konten mengandung gambar yang melanggar kebijakan', 'postingan'),
(9, ' Tidak sesuai fakta', 'Secara substansi tidak benar dan /atau kesimpulan utama tidak benar', 'postingan'),
(16, 'Pelecehan', 'Meremehkan atau permusuhan terhadap seseorang atau kelompok ', 'pengguna'),
(17, 'Spam', 'Menjual barang ilegal, penipuan uang, dll.', 'pengguna'),
(18, 'Plagiarisme', 'Menggunakan kembali konten tanpa mencantumkan atribusi (tautan dan kutipan)', 'pengguna'),
(19, 'Kebijakan pertanyaan', 'Mengajukan pertanyaan yang melanggar kebijakan secara berulang-ulang', 'pengguna'),
(20, 'Pelanggaran akan kebijaka', 'Menggunakan nama yang meniru identitas seseorang atau mengandung hinaan, atau konten eksplisit ', 'pengguna'),
(21, 'Pelecehan', 'Meremehkan atau permusuhan terhadap seseorang atau kelompok', 'komentar'),
(22, 'Spam', 'Menjual barang ilegal, penipuan uang, dll.', 'komentar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `nm_berkas` varchar(150) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_postingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `nm_berkas`, `ukuran`, `id_postingan`) VALUES
(17, '12169-19 08 2022 084149000dataset.rar', 100375, 169),
(18, '12169-19 08 2022 0841490003B_14_Siti Nur Holifah - 3. Assignment 3_MPSI.docx', 902801, 169),
(19, '11170-19 08 2022 084946000361955401054_UTS (2).docx', 78526, 170),
(20, '12171-19 08 2022 094916000Indira Dias Bab 1 dan 2 (Revisi 1) cek.docx', 175468, 171),
(21, '12172-19 08 2022 094952000361955401054_UAS.docx', 2838777, 172),
(22, '12172-19 08 2022 094952000361955401054_UTS (2).docx', 78526, 172),
(23, '12172-19 08 2022 0949520003B_361955401044_Siti Nur Holifah (1).docx', 470777, 172),
(24, '12174-19 08 2022 095211000Aplikasi Tata Kelola Persuratan Bab 2.docx', 189966, 174),
(25, '12174-19 08 2022 095211000361955401054_UTS (2).docx', 78526, 174),
(26, '12174-19 08 2022 0952110003B_361955401044_Siti Nur Holifah (1).docx', 470777, 174),
(27, '13175-19 08 2022 103644000PROPOSAL_PA_REVISI_PASCASEMPRO.docx', 1735947, 175),
(28, '13175-19 08 2022 103644000Indira Dias Bab 1 dan 2 (Revisi 1) cek.docx', 175468, 175),
(29, '13175-19 08 2022 103644000Aplikasi Tata Kelola Persuratan Bab 2.docx', 189966, 175),
(30, '11182-19 08 2022 105100000361955401054_UAS.docx', 2838777, 182),
(31, '11182-19 08 2022 105100000361955401054_UTS (2).docx', 78526, 182),
(32, '11182-19 08 2022 1051000003B_361955401044_Siti Nur Holifah (1) - Copy.docx', 470777, 182),
(33, '11182-19 08 2022 1051000003B_361955401044_Siti Nur Holifah (1).docx', 470777, 182),
(34, '11185-19 08 2022 105407000Indira Dias Bab 1 dan 2 (Revisi 1) cek.docx', 175468, 185),
(35, '11185-19 08 2022 105407000361955401054_UAS.docx', 2838777, 185),
(36, '11185-19 08 2022 105407000361955401054_UTS (2).docx', 78526, 185),
(37, '11185-19 08 2022 1054070003B_361955401044_Siti Nur Holifah (1) - Copy.docx', 470777, 185),
(38, '11185-19 08 2022 1054070003B_361955401044_Siti Nur Holifah (1).docx', 470777, 185),
(39, '11186-19 08 2022 110127000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall - Copy.docx', 1151277, 186),
(40, '11186-19 08 2022 110127000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall.docx', 1151277, 186),
(41, '11186-19 08 2022 110127000Indira Dias Bab 1 dan 2 (Revisi 1) cek - Copy.docx', 175468, 186),
(42, '11186-19 08 2022 110127000Aplikasi Tata Kelola Persuratan Bab 2.docx', 189966, 186),
(43, '11186-19 08 2022 110127000361955401054_UAS.docx', 2838777, 186),
(44, '11186-19 08 2022 110127000361955401054_UTS (2) - Copy.docx', 78526, 186),
(45, '12188-19 08 2022 111341000361955401054_UTS (2).docx', 78526, 188),
(46, '12188-19 08 2022 1113410003B_361955401044_Siti Nur Holifah (1) - Copy.docx', 470777, 188),
(47, '12188-19 08 2022 1113410003B_361955401044_Siti Nur Holifah (1).docx', 470777, 188),
(48, '12189-19 08 2022 111629000PROPOSAL_PA_REVISI_PASCASEMPRO.docx', 1735947, 189),
(49, '12189-19 08 2022 111629000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall - Copy.docx', 1151277, 189),
(50, '12189-19 08 2022 111629000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall.docx', 1151277, 189),
(51, '12189-19 08 2022 111629000Indira Dias Bab 1 dan 2 (Revisi 1) cek - Copy.docx', 175468, 189),
(52, '12189-19 08 2022 111629000Indira Dias Bab 1 dan 2 (Revisi 1) cek.docx', 175468, 189),
(53, '12190-19 08 2022 111856000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall - Copy.docx', 1151277, 190),
(54, '12190-19 08 2022 111856000(revisi_sempro_2)Sistem_Pengenalan_Jenis_Kendaraan_Untuk_Pemetaan_Slot_Parkir_Di_Gedung_Mall.docx', 1151277, 190),
(55, '12190-19 08 2022 111856000Indira Dias Bab 1 dan 2 (Revisi 1) cek.docx', 175468, 190),
(56, '12190-19 08 2022 111856000Aplikasi Tata Kelola Persuratan Bab 2.docx', 189966, 190),
(57, '12191-19 08 2022 123224000361955401054_UTS (3) - Copy.docx', 78526, 191),
(58, '12191-19 08 2022 1232240003B_361955401044_Siti Nur Holifah (2) - Copy - Copy.docx', 470777, 191),
(59, '12192-19 08 2022 123350000361955401054_UTS (2).docx', 78526, 192),
(60, '12192-19 08 2022 123350000361955401054_UTS (3) - Copy.docx', 78526, 192),
(61, '12192-19 08 2022 1233500003B_361955401044_Siti Nur Holifah (2) - Copy - Copy.docx', 470777, 192),
(62, '12192-19 08 2022 1233500003B_361955401044_Siti Nur Holifah (2) - Copy.docx', 470777, 192),
(63, '11214-19 08 2022 140239000illustration-shopping-online.zip', 337064, 214),
(64, '11214-19 08 2022 140239000313-544-1-SM.pdf', 824409, 214),
(65, '11222-22 08 2022 150928000407-728-1-SM.pdf', 256020, 222),
(66, '11222-22 08 2022 150928000diagram activity.rar', 206949, 222),
(67, '11222-22 08 2022 150928000forum.sql', 9764, 222),
(68, '11223-22 08 2022 151249000407-728-1-SM.pdf', 256020, 223),
(69, '11223-22 08 2022 151249000diagram activity.rar', 206949, 223),
(70, '11224-22 08 2022 151507000407-728-1-SM.pdf', 256020, 224),
(71, '11224-22 08 2022 151507000diagram activity.rar', 206949, 224),
(72, '11224-22 08 2022 151507000forum.sql', 9764, 224),
(73, '11225-22 08 2022 151541000forum.sql', 9764, 225),
(74, '11228-22 08 2022 152424000407-728-1-SM.pdf', 256020, 228),
(75, '11228-22 08 2022 152425000diagram activity.rar', 206949, 228),
(76, '11228-22 08 2022 152425000forum.sql', 9764, 228),
(77, '11231-22 08 2022 153247000407-728-1-SM.pdf', 256020, 231);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `nm_gambar` varchar(150) NOT NULL,
  `id_postingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `nm_gambar`, `id_postingan`) VALUES
(51, '1-67-02 08 2022 074528000kamu2.jpeg', 67),
(52, '1-68-02 08 2022 075515000kamu3.jpeg', 68),
(53, '1-71-02 08 2022 084122000dasar2.png', 71),
(54, '1-72-02 08 2022 0854250001491957712760.jpg', 72),
(55, '1-72-02 08 2022 0854250001491957817563.jpg', 72),
(56, '1-72-02 08 2022 085425000dasar.png', 72),
(57, '1-72-02 08 2022 085425000dasar2.png', 72),
(58, '1-72-02 08 2022 085425000dasar3.png', 72),
(59, '1-72-02 08 2022 085425000un.png', 72),
(60, '1-72-02 08 2022 085425000Untitled.png', 72),
(61, '1-72-02 08 2022 085425000Untitled2.png', 72),
(62, '1-72-02 08 2022 085425000Untitled3.png', 72),
(63, '1-72-02 08 2022 085425000Untitled4.png', 72),
(64, '1-72-02 08 2022 085425000Untitled5.png', 72),
(65, 'kamu3.jpeg175-02 08 2022 164705000', 75),
(66, 'download (1).png176-02 08 2022 164749000', 76),
(67, '177-02 08 2022 180149000kamu.jpeg', 77),
(68, '180-02 08 2022 182311000WhatsApp Image 2022-07-23 at 22.36.22 (1).jpeg', 80),
(69, '180-02 08 2022 182311000WhatsApp Image 2022-07-23 at 22.36.22.jpeg', 80),
(70, '180-02 08 2022 182311000WhatsApp Image 2022-07-23 at 22.36.21 (1).jpeg', 80),
(71, '180-02 08 2022 182311000WhatsApp Image 2022-07-23 at 22.36.21.jpeg', 80),
(72, '197-08 08 2022 115328000kamu2.jpeg', 97),
(73, '13105-16 08 2022 181939000image.png', 105),
(74, '13109-16 08 2022 1904420002.png', 109),
(75, '13109-16 08 2022 1904420001.png', 109),
(76, '13110-16 08 2022 190535000Screenshot-287.png', 110),
(77, '12111-16 08 2022 1910530001.jpg', 111),
(78, '12113-16 08 2022 1914310001.jpg', 113),
(79, '12115-16 08 2022 191806000image (1).png', 115),
(80, '12116-16 08 2022 191910000sa.jpg', 116),
(81, '12118-16 08 2022 192354000Screenshot-64.png', 118),
(82, '11155-18 08 2022 215750000image (2).png', 155),
(83, '12160-18 08 2022 221233000Screenshot-64 (1).png', 160),
(84, '12162-18 08 2022 222554000Capture1.png', 162),
(85, '13168-18 08 2022 224026000Screen-Shot-2022-05-31-at-22-49-52.png', 168),
(86, '12169-19 08 2022 084149000WhatsApp Image 2021-10-03 at 19.15.36.jpeg', 169),
(87, '11170-19 08 2022 084946000-4-ans_frontend_assets.images.home_page_bg_desktop.png-26-4770753d59b970e1.png', 170),
(88, '12171-19 08 2022 094916000WhatsApp Image 2022-01-13 at 15.12.25.jpeg', 171),
(89, '12172-19 08 2022 094952000kamu.jpeg', 172),
(90, '12172-19 08 2022 094952000kamu2.jpeg', 172),
(91, '12172-19 08 2022 094952000kamu3.jpeg', 172),
(92, '12174-19 08 2022 095211000WhatsApp Image 2022-07-23 at 22.36.18.jpeg', 174),
(93, '12174-19 08 2022 095211000WhatsApp Image 2022-07-23 at 22.36.17 (1).jpeg', 174),
(94, '12174-19 08 2022 095211000aku.jpeg', 174),
(95, '13175-19 08 2022 103644000kamu.jpeg', 175),
(96, '13175-19 08 2022 103644000kamu2.jpeg', 175),
(97, '13175-19 08 2022 103644000kamu3.jpeg', 175),
(98, '11182-19 08 2022 105100000WhatsApp Image 2022-07-23 at 22.36.22 (1) - Copy.jpeg', 182),
(99, '11182-19 08 2022 105100000WhatsApp Image 2022-07-23 at 22.36.22 - Copy.jpeg', 182),
(100, '11185-19 08 2022 105407000WhatsApp Image 2022-07-23 at 22.36.21 (1) - Copy - Copy.jpeg', 185),
(101, '11185-19 08 2022 105407000WhatsApp Image 2022-07-23 at 22.36.21 (2) - Copy.jpeg', 185),
(102, '11185-19 08 2022 105407000WhatsApp Image 2022-07-23 at 22.36.21 - Copy.jpeg', 185),
(103, '11185-19 08 2022 105407000WhatsApp Image 2022-07-23 at 22.36.20 (1) - Copy.jpeg', 185),
(104, '11185-19 08 2022 105407000WhatsApp Image 2022-07-23 at 22.36.19.jpeg', 185),
(105, '11186-19 08 2022 110127000WhatsApp Image 2022-07-23 at 22.36.22 (1) - Copy - Copy.jpeg', 186),
(106, '11186-19 08 2022 110127000WhatsApp Image 2022-07-23 at 22.36.22 (2) - Copy.jpeg', 186),
(107, '11186-19 08 2022 110127000WhatsApp Image 2022-07-23 at 22.36.22 - Copy - Copy.jpeg', 186),
(108, '11186-19 08 2022 110127000WhatsApp Image 2022-07-23 at 22.36.22 - Copy (2).jpeg', 186),
(109, '11186-19 08 2022 110127000WhatsApp Image 2022-07-23 at 22.36.21 (1) - Copy - Copy - Copy.jpeg', 186),
(110, '12188-19 08 2022 111341000WhatsApp Image 2022-07-23 at 22.36.21 (1) - Copy - Copy - Copy.jpeg', 188),
(111, '12188-19 08 2022 111341000WhatsApp Image 2022-07-23 at 22.36.21 (1) - Copy - Copy.jpeg', 188),
(112, '12188-19 08 2022 111341000WhatsApp Image 2022-07-23 at 22.36.21 (1) - Copy.jpeg', 188),
(113, '12190-19 08 2022 111856000WhatsApp Image 2022-07-23 at 22.36.22 (1).jpeg', 190),
(114, '12190-19 08 2022 111856000WhatsApp Image 2022-07-23 at 22.36.22 (2) - Copy.jpeg', 190),
(115, '12190-19 08 2022 111856000WhatsApp Image 2022-07-23 at 22.36.22 - Copy - Copy.jpeg', 190),
(116, '12190-19 08 2022 111856000WhatsApp Image 2022-07-23 at 22.36.22 - Copy (2).jpeg', 190),
(117, '12191-19 08 2022 123224000WhatsApp Image 2022-07-23 at 22.36.22 (1) - Copy - Copy - Copy - Copy.jpeg', 191),
(118, '12191-19 08 2022 123224000WhatsApp Image 2022-07-23 at 22.36.22 (2) - Copy - Copy - Copy.jpeg', 191),
(119, '12191-19 08 2022 123224000WhatsApp Image 2022-07-23 at 22.36.22 (3) - Copy - Copy - Copy.jpeg', 191),
(120, '12191-19 08 2022 123224000WhatsApp Image 2022-07-23 at 22.36.22 (4) - Copy - Copy.jpeg', 191),
(121, '11198-19 08 2022 134842000Screen-Shot-2022-05-31-at-22-49-52.png', 198),
(122, '11198-19 08 2022 134842000Capture1.png', 198),
(123, '11198-19 08 2022 134842000Screenshot-64 (1).png', 198),
(124, '11198-19 08 2022 134842000image (2).png', 198),
(125, '11205-19 08 2022 135545000Screenshot-64 (1).png', 205),
(126, '11213-19 08 2022 140218000Capture1.png', 213),
(127, '11214-19 08 2022 140239000Capture1.png', 214),
(128, '11214-19 08 2022 140239000Screenshot-64 (1).png', 214),
(129, '11214-19 08 2022 140239000image (2).png', 214),
(130, '11215-19 08 2022 140330000Screen-Shot-2022-05-31-at-22-49-52.png', 215),
(131, '11215-19 08 2022 140330000Capture1.png', 215),
(132, '11215-19 08 2022 140330000Screenshot-64 (1).png', 215),
(133, '11215-19 08 2022 140330000image (2).png', 215),
(134, '11216-19 08 2022 140642000Screen-Shot-2022-05-31-at-22-49-52.png', 216),
(135, '11216-19 08 2022 140642000Capture1.png', 216),
(136, '11216-19 08 2022 140642000Screenshot-64 (1).png', 216),
(137, '11222-22 08 2022 150928000modal.png', 222),
(138, '11222-22 08 2022 150928000tambah admin.png', 222),
(139, '11222-22 08 2022 150928000tambah kata.png', 222),
(140, '11222-22 08 2022 150928000tambah topiki.png', 222),
(141, '11222-22 08 2022 150928000topik.png', 222),
(142, '11223-22 08 2022 151249000modal.png', 223),
(143, '11223-22 08 2022 151249000tambah admin.png', 223),
(144, '11223-22 08 2022 151249000tambah kata.png', 223),
(145, '11223-22 08 2022 151249000tambah topiki.png', 223),
(146, '11223-22 08 2022 151249000topik.png', 223),
(147, '11224-22 08 2022 151507000modal.png', 224),
(148, '11224-22 08 2022 151507000tambah admin.png', 224),
(149, '11224-22 08 2022 151507000tambah kata.png', 224),
(150, '11224-22 08 2022 151507000tambah topiki.png', 224),
(151, '11224-22 08 2022 151507000topik.png', 224),
(152, '11228-22 08 2022 152425000modal.png', 228),
(153, '11228-22 08 2022 152425000tambah admin.png', 228),
(154, '11228-22 08 2022 152425000tambah kata.png', 228),
(155, '11228-22 08 2022 152425000tambah topiki.png', 228),
(156, '11228-22 08 2022 152425000topik.png', 228),
(157, '11233-24 08 2022 165904000361955401054-ahmad mahdan aziz.jpeg', 233),
(158, '11236-24 08 2022 171043000361955401054-ahmad mahdan aziz.jpeg', 236),
(159, '11236-24 08 2022 171043000ScreenShot Tool -20220823021447.png', 236);

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
(13, 'jancok'),
(14, 'matamu'),
(15, 'celeng'),
(16, 'sex'),
(17, 'dick'),
(18, 'tits'),
(19, 'asshole'),
(20, 'fuck'),
(29, 'bangsat'),
(30, 'bajingan'),
(31, 'bensin'),
(32, 'anjing'),
(33, 'asu'),
(35, 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_komentar_parent` int(11) NOT NULL,
  `id_postingan` int(11) NOT NULL,
  `komentar` varchar(2500) NOT NULL,
  `mode` varchar(6) NOT NULL,
  `tgl_buat_komentar` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_pengirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_komentar_parent`, `id_postingan`, `komentar`, `mode`, `tgl_buat_komentar`, `id_pengirim`) VALUES
(66, 0, 165, '<p>Pertanyaan yang tidak pernah punya jawaban yang akan memuaskan, seperti ketika orang menanyakan sepeda motor mana yang kamu pilih: Honda, Yamaha, Suzuki atau lainnya. Setiap orang akan muncul dengan jawaban masing-masing, bisa jadi berbeda bisa jadi sama. Akan ada jawaban yang subjektif dan tentunya tidak akan memuaskan orang yang bertanya.</p>\r\n\r\n<p>Saya sendiri salah satu pengguna Vue.js beberapa tahun belakangan. Saya membuat beberapa pustaka untuk memudahkan saya bekerja dengan Vue.js sekaligus saya publikasikan kodenya sebagai sumber terbuka. Saya yang menginisiasi&nbsp;<a href=\"https://medium.com/vuejs-id\" target=\"_blank\">Vuejs-ID &ndash; Medium</a>&nbsp;serta sebagai kontributor di berbagai&nbsp;channel&nbsp;komunitas Vue.js di Indonesia.</p>\r\n\r\n<p>Mengenai pertanyaan ini, saya pernah menyinggung pada tulisan&nbsp;<a href=\"https://medium.com/mazipan-mind/fe-js-framework-sebuah-lelucon-d9d23eb88f59\" target=\"_blank\">FE JS Framework: Sebuah Lelucon &ndash; mazipan-mind &ndash; Medium</a>.</p>\r\n\r\n<p>Jawaban dari saya masih akan sama, kalau diminta jawaban subjektif saya tentu akan memilih Vue.js karena merupakan kerangka kerja yang saya gunakan sehari-hari.</p>\r\n\r\n<p>Tapi saya tidak menyarankan semua orang untuk memilih Vue.js dibandingkan React.js. Merujuk pada tulisan saya pada tautan diatas, saya lebih berpendapat bahwa React.js ataupun Vue.js mungkin hanya berpengaruh 30% dari keseluruhan proses pengembangan sebuah aplikasi website. Sisanya adalah hal-hal di luar it', 'show', '2022-08-18 20:46:17', 13),
(67, 66, 165, '<p>asd</p>\r\n', 'show', '2022-08-18 20:49:46', 13),
(69, 66, 165, '<p>asdasdas</p>\r\n', 'hidden', '2022-08-18 20:50:41', 13),
(76, 70, 187, '<p>balas 1</p>\r\n', 'show', '2022-08-19 10:52:21', 11),
(77, 70, 187, '<p>balas 2</p>\r\n', 'show', '2022-08-19 10:52:27', 11),
(80, 0, 131, '<p>Bisa , Saya udah coba ...</p>\r\n\r\n<p>Tapi sekarang pada berbayar fitur nya , dan ada yang kasih trial juga ko ... keyword di google nya : &quot;api whatsapp bussiness&quot; , nanti keluar banyak penyedia jasa api nya Sample di :</p>\r\n\r\n<p>https://smooch.io/whatsapp/</p>\r\n\r\n<p>https://developers.facebook.com/docs/whatsapp/</p>\r\n\r\n<p>https://www.waboxapp.com/ dan lain-lain ....</p>\r\n', 'show', '2022-08-20 13:30:24', 11),
(81, 80, 131, '<p>Untuk selengkapnya bisa dilihat dilink yang saya kirim itu.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'show', '2022-08-20 13:30:45', 11),
(82, 0, 220, '<p>tambahkan argument Looper.getMainLooper() di Handler. ``` Handler(Looper.getMainLooper()).postDelayed({ stopScanLocation() }, 4000) ```</p>\r\n', 'show', '2022-08-20 14:06:07', 11),
(93, 0, 228, '<p>komentar utama</p>\r\n', 'show', '2022-08-22 13:44:20', 11),
(94, 93, 228, '<p>Komentar balasan pertama</p>\r\n', 'show', '2022-08-22 13:44:33', 11),
(95, 93, 228, '<p>Komentar balasan kedua</p>\r\n', 'show', '2022-08-22 13:44:44', 11),
(98, 82, 220, '<p>Maaf namun saya tidak mengerti</p>\r\n', 'show', '2022-08-22 13:58:11', 14),
(99, 0, 228, '<p>komentar dengan mode anonim</p>\r\n', 'hidden', '2022-08-22 18:55:35', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapor`
--

CREATE TABLE `tb_lapor` (
  `id_lapor` int(11) NOT NULL,
  `id_alasanlapor` int(11) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
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
(47, 4, '2022-08-20', 'pertanyaan kurang mudah dimengerti', 220, 0, 14, 'postingan'),
(48, 7, '2022-08-20', 'Menggunakan kata GAN ', 131, 0, 11, 'postingan'),
(49, 5, '2022-08-20', 'Saya seperti pernah melihat postingan ini di forum lainnya', 152, 0, 11, 'postingan'),
(50, 9, '2022-08-20', 'Tidak jelas dia bertanya apa', 154, 0, 11, 'postingan'),
(51, 6, '2022-08-20', 'Malah curhat disini loh, BLOKIR AJA ORANG INI', 166, 0, 13, 'postingan'),
(52, 20, '2022-08-20', 'Ini nih orangnya yang curhat di MOCO! BLOKIR!!', 0, 0, 13, 'pengguna'),
(53, 18, '2022-08-20', 'postingan dia di MOCO kebanyakaan sama dengan postingan di website forum lainnya', 0, 0, 13, 'pengguna'),
(57, 8, '2022-08-21', 'Gambar blur', 168, 0, 13, 'postingan'),
(60, 9, '2022-08-22', 'Percobaan melaporan postingan', 220, 0, 14, 'postingan'),
(61, 22, '2022-08-22', 'percobaan melaporkan komentar ', 220, 98, 14, 'komentar'),
(63, 19, '2022-08-22', 'pecobaan melaporkan akun pengguna', 0, 0, 14, 'pengguna'),
(64, 9, '2022-08-25', 'coba coba coba', 220, 0, 14, 'postingan'),
(65, 9, '2022-08-26', 'Postingan ini tidak sesuai fakta yang ada mohon diblokir', 168, 0, 13, 'postingan'),
(66, 20, '2022-08-26', 'pengguna ini', 0, 0, 13, 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pw` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_profil` varchar(150) NOT NULL,
  `foto_page` varchar(150) NOT NULL,
  `kredensial` varchar(45) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `pendidikan` varchar(45) NOT NULL,
  `lokasi` varchar(45) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nm_pengguna`, `email`, `pw`, `tgl_lahir`, `foto_profil`, `foto_page`, `kredensial`, `deskripsi`, `pekerjaan`, `pendidikan`, `lokasi`, `tgl_daftar`) VALUES
(11, 'Mahdan ubah ', 'ahmad@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2000-12-22', '11Mahdan-26 08 2022hugs-cuddle.gif', '11Mahdan ubah -26 08 2022ScreenShot Tool -20220823021447.png', 'Saya dosen poliwangi', 'Siswa biasa', 'SISwa tingkat akhir', 'SMKN 1 Banyuwangi', 'banyuwangi', '2022-08-15'),
(13, 'aziz', 'aziz@gmail.com', 'b85dc795ba17cb243ab156f8c52124e1', '2004-07-29', 'profil_default.png', 'page_default.jpg', 'Suka traveling', '', '', '', '', '2022-08-16'),
(14, 'yoga', 'yoga@gmail.com', '807659cd883fc0a63f6ce615893b3558', '2001-11-14', 'profil_default.png', 'page_default.jpg', 'Menyukai tantangan', 'Programmer PHP Native sejak 1999', 'Data Analyst', '', '', '2022-08-19'),
(15, 'stellif', 'steellif@gmail.com', '28f8db7b29d4d02f57f8c59c779d5664', '1970-01-01', 'profil_default.png', 'page_default.jpg', '', '', '', '', '', '2022-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_postingan`
--

CREATE TABLE `tb_postingan` (
  `id_postingan` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsilengkap` varchar(5000) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `mode` varchar(6) NOT NULL,
  `tipe` varchar(9) NOT NULL,
  `tgl_buat` date NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_postingan`
--

INSERT INTO `tb_postingan` (`id_postingan`, `judul`, `deskripsilengkap`, `id_topik`, `mode`, `tipe`, `tgl_buat`, `id_pengguna`) VALUES
(131, 'Aplikasi kirim dan terima pesan whatsapp menggunakan php', '<p>gan bisa gak kira-kira kita buat aplikasi kirim dan terima pesan whatsapp menggunakan php jadi saya punya e-commerce yang di dalamnya terdapat beberapa toko dan kita bisa chat langsung penjual di web tersebut dan pesan tersebut masuk ke whatsapp nya penjual gitu</p>\r\n', 20, 'hidden', 'TANYA', '2022-08-18', 11),
(152, 'bagaimana caranya looping double array ?', '<p>halo semua, gimana ya caranya mengeksekusi loop double array;<br />\r\n<br />\r\ncontoh kasus :<br />\r\n<br />\r\n$array1 = array(&quot;data1&quot;, &quot;data2&quot;, &quot;data3&quot;, &quot;data4&quot;, &quot;data5&quot;,&quot;data6&quot;, &quot;data7&quot;, &quot;data8&quot;, &quot;data9&quot;, &quot;data10&quot;);$array2 = array(&quot;example1&quot;, &quot;example2&quot;);<br />\r\n<br />\r\ngimana cara nya menampilka hasilnya seperti di bawah ini :<br />\r\n<br />\r\ndata1, example1<br />\r\ndata2, example1<br />\r\ndata3, example1<br />\r\ndata4, example1<br />\r\ndata5, example1<br />\r\ndata6, example2<br />\r\ndata7, example2<br />\r\ndata8, example2<br />\r\ndata9, example2<br />\r\ndata10 ,example2<br />\r\n<br />\r\nkode ku seperti di bawah ini :<br />\r\n&nbsp;</p>\r\n\r\n<hr />\r\n<pre>\r\n&lt;?php\r\n\r\n$array1 = array(&quot;data1&quot;, &quot;data2&quot;, &quot;data3&quot;, &quot;data4&quot;, &quot;data5&quot;,&quot;data6&quot;, &quot;data7&quot;, &quot;data8&quot;, &quot;data9&quot;, &quot;data10&quot;);\r\n\r\n$array2 = array(&quot;example1&quot;, &quot;example2&quot;);\r\n\r\n\r\n\r\nforeach($array1 as $xxx){\r\n    \r\n    for($x = 0; $x &lt; count($array2); $x++){\r\n        \r\n        for($i = 0; $i &lt; 5; $i++){\r\n            echo $xxx.&quot;,&quot;.$array2[$x].&quot;&lt;br&gt;&quot;;\r\n        }\r\n        \r\n        \r\n    };  \r\n}\r\n\r\n?&gt;</pre>\r\n', 20, 'show', 'TANYA', '2022-08-18', 11),
(154, 'Select PHP Tabel', '<pre>\r\nSELECT tb_transaksi.id_transaksi, tb_transaksi.username, \r\n                                     tb_transaksi.tgl_pinjam, tb_transaksi.tgl_kembali,tb_transaksi.status,tb_transaksi.ket ,tb_siswa.nama_siswa, tb_siswa.jurusan,\r\n                                     tb_buku.judul,tb_transaksi.judul1, tb_transaksi.judul2 FROM tb_transaksi INNER JOIN tb_siswa ON tb_transaksi.username = tb_siswa.username \r\n                                     INNER JOIN tb_buku ON tb_transaksi.judul1 || tb_transaksi.judul2= tb_buku.id_buku</pre>\r\n', 20, 'show', 'TANYA', '2022-08-18', 11),
(155, 'SUM TOTAL AKHIR', '<p>selamat siang teman2, mau tanya nii, gimana caranya menjumlah kan hasil akhir dari total perkegiatan. dengan data user yang bercampur dalam 1 tabel.</p>\r\n', 20, 'show', 'TANYA', '2022-08-18', 11),
(156, 'Program menemukan angka yang hilang', '<p>Setiap baris berisi angka berurutan dari kecil ke besar. Angka minimal adalah 1, dan angka maksimal adalah 10 pangkat 6. Tidak ada pemisah antara angka dalam urutan tersebut. Panjang minimal satu baris soal adalah 3 angka, maksimal 1000 angka. Angka yang hilang tidak berada di awal atau akhir, melainkan berada di antara awal dan akhir. Program dibuat untuk menemukan angka yang hilang.<br />\r\ncontoh</p>\r\n\r\n<hr />\r\n<pre>\r\nInput                                   Output\r\n\r\n79101112                                8\r\n7891012                                 11</pre>\r\n', 14, 'show', 'TANYA', '2022-08-18', 11),
(157, 'Tidak Ada \"MySQL JDBC Driver\" di \"Netbeans\" (Java)', '<p>Aku tidak menemukan &quot;MySQL JDBC Driver&quot; di IDE Netbeans ku.<br />\r\nSetiap aku mencari di mesin pencari google tentang koding java yang harus terhubung dengan database (MySQL), situs situs yang aku kunjungi memang memberikan tutorial dan kodingnya, tapi hanya saja para pembuat artikel tidak memberi tahu darimana datangnya Library : MySQL JDBC Driver.<br />\r\n<br />\r\nAku juga sudah menginstal MySQL : https://dev.mysql.com/downloads/windows/installer/8.0.html&nbsp;<br />\r\nTerkadang aku membuat Library-nya secara manual, dan menambahkan &quot;MySQL Connector/J.rar&quot; kedalamnya, beberapa koding bisa jalan, tapi banyak meninggalkan bug.<br />\r\nBagaimana solusinya?</p>\r\n', 14, 'show', 'TANYA', '2022-08-18', 11),
(158, 'mengurai angka javascript', '<p>Hallo, teman teman mohon bantuan nya,<br />\r\nbagaimana untuk mengurai angka seperti contoh berikut dengan menggunakan javascript :<br />\r\n<br />\r\n1.234<br />\r\n<br />\r\noutput :&nbsp;<br />\r\n1000<br />\r\n200<br />\r\n30<br />\r\n4</p>\r\n', 14, 'show', 'TANYA', '2022-08-18', 11),
(159, 'Tentang seekp, reinterpret_cast dan seekg di C++', '<p>Permisi teman-teman, mungkin ada yang bisa jelasin apa itu seekp, reinterpret_cast sama seekg dan penggunaannya kayak gimana? Saya pemula baru belajar C++, nyari di internet soal itu tetep bingung 😅</p>\r\n', 14, 'show', 'TANYA', '2022-08-18', 12),
(160, 'Error pada program c++ error: no match for \'operator==\' (operand types are \'std::string\'', '<pre>\r\n#include &lt;iostream&gt;\r\n#include &lt;string&gt;\r\n\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a;\r\nstring b[10];\r\n cout&lt;&lt; &quot;\\t\\t  Gejala Gejala \\n&quot;;\r\n cout&lt;&lt; &quot;\\t1.pusing               3.batuk\\n&quot;;\r\n cout&lt;&lt; &quot;\\t2.demam                4.Pilek\\n&quot;;\r\n\r\ncout &lt;&lt; &quot;Masukan Jumlah gejala : &quot;;\r\n            cin &gt;&gt; a;\r\n\r\n for (int i = 0; i &lt; a; i++)\r\n            {\r\n                cout &lt;&lt; &quot;_________________________________________________________________________\\n&quot;;\r\n                cout &lt;&lt; &quot;\\nMasukkan gejala Ke-&quot; &lt;&lt; i + 1 &lt;&lt; endl;\r\n                cout &lt;&lt; endl;\r\n                cout &lt;&lt; &quot;Nama gejala   : &quot;;\r\n                cin &gt;&gt; b[i];\r\n                cout &lt;&lt; endl;\r\n            }\r\n\r\nif(b[0] == &#39;pusing&#39;){\r\n    cout&lt;&lt;&quot;berhasil\\n&quot;;\r\n\r\n}else{\r\n    return 0;\r\n}\r\n    return 0;\r\n}</pre>\r\n\r\n<hr />\r\n<p>Terjadi error ketika saya mencoba membuat if dengan kondisi pada array pertama.<br />\r\nmohon bantuannya.&nbsp;</p>\r\n', 14, 'show', 'TANYA', '2022-08-18', 12),
(161, 'mau tanya if disini fungsinya buat apa ya?', '<p>bisa tolong jelaskan fungsi dari<br />\r\nif(pilih-b!=1){<br />\r\ncout&lt;&lt;&quot; + &quot;;<br />\r\n}<br />\r\nelse{<br />\r\ncout&lt;&lt;endl&lt;&lt;endl;<br />\r\n}</p>\r\n', 14, 'show', 'TANYA', '2022-08-18', 12),
(162, 'Error Menggunakan React Router Dom', '<pre>\r\n<em>import</em> React, { Component } <em>from</em> &#39;react&#39;;\r\n<em>import</em> {BrowserRouter, Route, Link} <em>from</em> &#39;react-router-dom&#39;;\r\n<em>import</em> &#39;./App.css&#39;;\r\n\r\nfunction Home() {\r\n    <em>return</em> &lt;h2&gt; Halaman Home &lt;/h2&gt;\r\n}\r\n\r\nfunction ListView() {\r\n    <em>return</em> &lt;h2&gt; Semua User &lt;/h2&gt;\r\n}\r\n\r\nclass App extends Component {\r\n    render() {\r\n        <em>return</em> (\r\n            &lt;BrowserRouter&gt;\r\n                &lt;div&gt;\r\n                    &lt;nav&gt;\r\n                        &lt;li&gt; &lt;Link <em>to</em>={&#39;/&#39;}&gt; Home &lt;/Link&gt; &lt;/li&gt;\r\n                        &lt;li&gt; &lt;Link <em>to</em>={&#39;/users&#39;}&gt; User &lt;/Link&gt; &lt;/li&gt;\r\n                    &lt;/nav&gt;\r\n\r\n                    &lt;main&gt;\r\n                        &lt;Route <em>path</em>=&#39;/&#39; <em>exact</em> <em>component</em>={Home} /&gt;\r\n                        &lt;Route <em>path</em>=&#39;/users&#39; <em>exact</em> <em>component</em>={ListView} /&gt;\r\n                    &lt;/main&gt;\r\n                &lt;/div&gt;\r\n            &lt;/BrowserRouter&gt;\r\n        );\r\n    }\r\n}\r\n\r\n<em>export</em> <em>default</em> App;</pre>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n', 9, 'show', 'TANYA', '2022-08-18', 12),
(163, 'Yarn atau Npm di React ?', '<p>Dalam pengembangan aplikasi dengan React js ata react native, sebaiknya kita menggunakan npm atau yarn sebagai package managernya?&nbsp;</p>\r\n', 9, 'show', 'TANYA', '2022-08-18', 12),
(164, 'Apakah Macbook Air M1 cocok untuk fullstack mobile development (Express Js, IOS dan Android) ?', '<p>Halo semuanya, aku mau tanya pendapat kalian, aku kan sekarang kerja sebagai Fullstack Developer handle Backend dengan Express js &amp; MySQL, serta website dan mobile (Android/IOS) dengan react js atau react native. Aku ada rencana untuk membeli macbook air M1 2020 (karna budget ku mentok di Macbook air M1 wkw) untuk menunjang pekerjaan ku, di karenakan aku juga harus handle aplikasi IOS, menurut kalian apakah macbook air m1 ini udh cukup untuk bisa bantu aku dalam pekerjaan ?&nbsp;</p>\r\n', 9, 'show', 'TANYA', '2022-08-18', 12),
(165, 'Mana Yang Lebih Baik Antara Vue.js atau React ?', '<p>Mana sih yang lebih banyak digunakan orang baik dari segi kenyamanan dan performa, lebih baik membelajari vue.js atau React?</p>\r\n', 9, 'show', 'TANYA', '2022-08-18', 12),
(166, 'Nitip curhat sedikit ya...', '<p>Bajignan banget! mana ada gw didikhianati kaya gitu sama temen deket sendiri... Bangsat!! sumpah b*****t banget punya temen modelan a****g kek gitu. Coba aja lu pikir ya dia udah gw biayain beli cilok masa dia gak mau buat gantian beli bensin?</p>\r\n', 7, 'show', 'TANYA', '2022-08-20', 13),
(167, 'Preventing re-rendering for non dependency update.', '<p>setIsShowFunct adalah event handler yang saya perlukan untuk child component, jadi saya menggunakan props.</p>\r\n\r\n<p>setIsShowFunct yang di passing ke ModalAlert props menyebabkan component rerender juga ketika parent component rerender. tanpa ada perubahan state dependency yang diperlukan untuk child component (saya sudah menggunakan useCallback untuk values lain). masalahnya adalah ketika saya menambahkan setisShowFunct di props, ModalAlert rerender secara sia sia.</p>\r\n\r\n<p>bagaimana cara mencegah hal tersebut terjadi??</p>\r\n', 7, 'show', 'TANYA', '2022-08-18', 13),
(168, 'join, split, slice, splice, dan sort array', '<p>ada yg bisa bantu ? nyoba dari sore gak mudeng mudeng. maap pemula</p>\r\n', 8, 'show', 'TANYA', '2022-08-18', 13),
(218, 'Apakah typescript ', '<p>Saya baru masuk kedalam dunia&nbsp;pemrograman, saya&nbsp;penasaran apakah typescript ini berpeluang untuk masa depan? terimakasih..</p>\r\n', 18, 'show', 'TANYA', '2022-08-25', 11),
(220, 'kesalahan pada handler', '<p>Handler().postDelayed({ stopScanLocation() },4000) terdapat tulisan handler() is deprecated</p>\r\n', 7, 'show', 'TANYA', '2022-08-20', 14),
(228, 'percobaan edit dan mengganti kata kasar a****g a****g a****g', '<p>percobaan edit dan mengganti kata kasar a****g a****g anjing</p>\r\n', 19, 'show', 'TANYA', '2022-08-22', 11),
(231, 'How to implement horizontal and vertical drag and drop using react.js with or without using plugin?', '<p>sdasd</p>\r\n', 6, 'hidden', 'TANYA', '2022-08-22', 11);

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
(4, 'HTML'),
(5, 'CSS'),
(6, 'Bootstrap'),
(7, 'JavaScript'),
(8, 'JQuery'),
(9, 'React'),
(10, 'AngularJS'),
(11, 'JSON'),
(12, 'AJAX'),
(13, 'Phyton'),
(14, 'java'),
(15, 'C'),
(16, 'C++'),
(17, 'C#'),
(18, 'TypeScript'),
(19, 'MySQLi\n'),
(20, 'PHP'),
(22, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_video` int(11) NOT NULL,
  `nm_video` varchar(150) NOT NULL,
  `id_postingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `nm_video`, `id_postingan`) VALUES
(8, '12169-19 08 2022 0841490002022-01-10 02-49-18.mkv', 169),
(9, '11170-19 08 2022 0849460002022-01-10 02-49-47.mkv', 170),
(10, '12171-19 08 2022 0949160002022-01-10 02-49-47.mkv', 171),
(11, '12172-19 08 2022 0949520002022-01-10 02-49-47.mkv', 172),
(12, '12172-19 08 2022 0949520002022-01-10 02-49-18.mkv', 172),
(13, '12172-19 08 2022 0949520002022-01-10 02-49-15.mkv', 172),
(14, '12174-19 08 2022 0952110002022-01-10 02-49-47.mkv', 174),
(15, '12174-19 08 2022 0952110002022-01-10 02-49-18.mkv', 174),
(16, '12174-19 08 2022 0952110002022-01-10 02-49-15.mkv', 174),
(17, '13175-19 08 2022 1036440002022-01-10 02-49-47.mkv', 175),
(18, '13175-19 08 2022 1036440002022-01-10 02-49-18.mkv', 175),
(19, '13175-19 08 2022 1036440002022-01-10 02-49-15.mkv', 175),
(20, '11182-19 08 2022 1051000002022-01-10 02-49-18 - Copy.mkv', 182),
(21, '11182-19 08 2022 1051000002022-01-10 02-49-15 - Copy.mkv', 182),
(22, '11185-19 08 2022 1054070002022-01-10 02-49-47 - Copy.mkv', 185),
(23, '11185-19 08 2022 1054070002022-01-10 02-49-47.mkv', 185),
(24, '11185-19 08 2022 1054070002022-01-10 02-49-18.mkv', 185),
(25, '11185-19 08 2022 1054070002022-01-10 02-49-15 - Copy (2).mkv', 185),
(26, '11185-19 08 2022 1054070002022-01-10 02-49-15 - Copy.mkv', 185),
(27, '11186-19 08 2022 1101270002022-01-10 02-49-47 - Copy - Copy.mkv', 186),
(28, '11186-19 08 2022 1101270002022-01-10 02-49-47 - Copy (2).mkv', 186),
(29, '11186-19 08 2022 1101270002022-01-10 02-49-18 - Copy (2).mkv', 186),
(30, '11186-19 08 2022 1101270002022-01-10 02-49-15 - Copy - Copy.mkv', 186),
(31, '11186-19 08 2022 1101270002022-01-10 02-49-15 - Copy (2) - Copy.mkv', 186),
(32, '12188-19 08 2022 1113410002022-01-10 02-49-47.mkv', 188),
(33, '12188-19 08 2022 1113410002022-01-10 02-49-18 - Copy (2).mkv', 188),
(34, '12188-19 08 2022 1113410002022-01-10 02-49-18 - Copy.mkv', 188),
(35, '12189-19 08 2022 1116290002022-01-10 02-49-47.mkv', 189),
(36, '12189-19 08 2022 1116290002022-01-10 02-49-18 - Copy (2).mkv', 189),
(37, '12189-19 08 2022 1116290002022-01-10 02-49-15 - Copy - Copy.mkv', 189),
(38, '12189-19 08 2022 1116290002022-01-10 02-49-15 - Copy (2) - Copy.mkv', 189),
(39, '12189-19 08 2022 1116290002022-01-10 02-49-15 - Copy (2).mkv', 189),
(40, '12190-19 08 2022 1118560002022-01-10 02-49-47 - Copy - Copy.mkv', 190),
(41, '12190-19 08 2022 1118560002022-01-10 02-49-47 - Copy (2).mkv', 190),
(42, '12190-19 08 2022 1118560002022-01-10 02-49-47 - Copy.mkv', 190),
(43, '12190-19 08 2022 1118560002022-01-10 02-49-18 - Copy (2).mkv', 190),
(44, '12191-19 08 2022 1232240002022-01-10 02-49-47 - Copy - Copy - Copy - Copy.mkv', 191),
(45, '12191-19 08 2022 1232240002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 191),
(46, '12191-19 08 2022 1232240002022-01-10 02-49-47 - Copy (2) - Copy - Copy.mkv', 191),
(47, '12191-19 08 2022 1232240002022-01-10 02-49-18 - Copy (3) - Copy.mkv', 191),
(48, '12192-19 08 2022 1233500002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 192),
(49, '12192-19 08 2022 1233500002022-01-10 02-49-47 - Copy - Copy.mkv', 192),
(50, '12192-19 08 2022 1233500002022-01-10 02-49-47 - Copy (2) - Copy - Copy.mkv', 192),
(51, '12192-19 08 2022 1233500002022-01-10 02-49-47 - Copy (2) - Copy.mkv', 192),
(52, '11222-22 08 2022 1509280002022-01-10 02-49-47 - Copy - Copy - Copy - Copy.mkv', 222),
(53, '11222-22 08 2022 1509280002022-01-10 02-49-47 - Copy - Copy - Copy.mkv', 222),
(54, '11222-22 08 2022 1509280002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 222),
(55, '11222-22 08 2022 1509280002022-01-10 02-49-47 - Copy - Copy (2).mkv', 222),
(56, '11222-22 08 2022 1509280002022-01-10 02-50-53.mkv', 222),
(57, '11223-22 08 2022 1512490002022-01-10 02-49-47 - Copy - Copy - Copy - Copy.mkv', 223),
(58, '11223-22 08 2022 1512490002022-01-10 02-49-47 - Copy - Copy - Copy.mkv', 223),
(59, '11223-22 08 2022 1512490002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 223),
(60, '11223-22 08 2022 1512490002022-01-10 02-49-47 - Copy - Copy (2).mkv', 223),
(61, '11223-22 08 2022 1512490002022-01-10 02-50-53.mkv', 223),
(62, '11224-22 08 2022 1515070002022-01-10 02-49-47 - Copy - Copy - Copy - Copy.mkv', 224),
(63, '11224-22 08 2022 1515070002022-01-10 02-49-47 - Copy - Copy - Copy.mkv', 224),
(64, '11224-22 08 2022 1515070002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 224),
(65, '11224-22 08 2022 1515070002022-01-10 02-49-47 - Copy - Copy (2).mkv', 224),
(66, '11224-22 08 2022 1515070002022-01-10 02-50-53.mkv', 224),
(67, '11228-22 08 2022 1524240002022-01-10 02-49-47 - Copy - Copy - Copy - Copy.mkv', 228),
(68, '11228-22 08 2022 1524240002022-01-10 02-49-47 - Copy - Copy - Copy.mkv', 228),
(69, '11228-22 08 2022 1524240002022-01-10 02-49-47 - Copy - Copy (2) - Copy.mkv', 228),
(70, '11228-22 08 2022 1524240002022-01-10 02-49-47 - Copy - Copy (2).mkv', 228),
(71, '11228-22 08 2022 1524240002022-01-10 02-50-53.mkv', 228);

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
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

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
-- Indexes for table `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_alasanlapor`
--
ALTER TABLE `tb_alasanlapor`
  MODIFY `id_alasanlapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tb_kata`
--
ALTER TABLE `tb_kata`
  MODIFY `id_kata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_postingan`
--
ALTER TABLE `tb_postingan`
  MODIFY `id_postingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `tb_topik`
--
ALTER TABLE `tb_topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
