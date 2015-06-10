-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 10:51 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE IF NOT EXISTS `tb_agenda` (
  `user_id` varchar(20) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `agendawkt` datetime NOT NULL,
  `konten` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`user_id`, `id_agenda`, `judul`, `agendawkt`, `konten`, `waktu`) VALUES
('admin', 1, 'Kerja Bakti', '2015-05-29 05:01:00', 'Ayo Kerja :v', '0000-00-00 00:00:00'),
('abc', 5, 'abc', '2015-05-30 07:00:00', 'kaksdkasdkasdjk ahjsdkams  aksdasd s djashdujasjd', '2015-05-26 08:20:00'),
('admin', 9, '9 Tahun Gempa Jogja', '2015-05-27 15:00:00', 'Muhasabah', '2015-05-27 13:16:29'),
('admin', 10, 'Hari Kamis', '2015-06-04 02:00:00', 'Besok Kamis', '2015-06-03 18:59:22'),
('bintang', 11, 'Persiapan Ramadhan', '2015-06-10 14:17:00', 'Padusan', '2015-06-10 22:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id_post` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `konten` text NOT NULL,
  `waktu` datetime NOT NULL,
  `img_berita` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_post`, `user_id`, `judul`, `konten`, `waktu`, `img_berita`) VALUES
(2, 'Kaskus', 'test', 'test', '2015-05-20 12:58:01', ''),
(3, 'Kaskus', 'kask', 'jhahaha', '2015-05-20 12:58:20', ''),
(4, 'id test', 'test-1', 'test nyoba try', '2015-05-20 17:54:09', ''),
(7, 'admin', 'Bintang Muhammad', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-05-21 07:57:52', ''),
(8, 'admin', 'Test Edit', 'Bintang Muhammad', '2015-05-21 08:18:44', ''),
(9, 'admin', 'aka', 'akskasd', '2015-05-21 15:53:50', 'earth-from-space-29056-1366x768.jpg'),
(14, 'bintang', 'Sekolah Standar Biasa Saja', 'hanya sebuah test', '2015-05-23 22:02:30', 'Elements-cheatsheet-wallpaper.jpg'),
(16, 'bintang', 'Ekstrakurikuler Desain Telah dibuka', 'Mari ramaikan', '2015-05-31 17:39:55', 'Design_is___by_goergen_2.jpg'),
(18, 'bintang', 'test 25', 'asasdas', '2015-06-01 10:31:35', 'text4647.png'),
(19, 'admin', 'Test Controller', 'Test 2', '2015-06-03 19:03:48', '10553574_845854192176998_5338348271769874777_n.png'),
(20, 'admin', 'Test new feature', '<p>Coba pake tinyMCE coy!! </p>\r\n<p style="text-align: right;">Test</p>\r\n<p style="text-align: center;">Test</p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<ul>\r\n<li>Voy</li>\r\n</ul>', '2015-06-03 20:17:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekskul`
--

CREATE TABLE IF NOT EXISTS `tb_ekskul` (
  `id_ekskul` int(5) NOT NULL,
  `nama_ekskul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ekskul`
--

INSERT INTO `tb_ekskul` (`id_ekskul`, `nama_ekskul`, `deskripsi`, `image`) VALUES
(1, 'Pramuka', 'Pramuka adalah sebuah kepanduan Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. yo kae lah sdasd Test', 'vastness-of-the-world-28629-1366x768.jpg'),
(2, 'Perisai Diri', 'tapak suci muhammadiyah', '0-sl.jpg'),
(30, 'Basket', 'Hahah', 'basketball.jpg'),
(31, 'SepakBola', 'Tanpa Gambar', 'hujan.png'),
(32, 'Photography', 'test', 'text4583-1.png'),
(33, 'Test COntroller', 'Test Controller? is WOrking?', 'earth-from-space-29056-1366x768.jpg'),
(35, 'TinyMCE', '<p>ajkdasd</p>\r\n<p>asdasd</p>', 'the_great_wave_by_jairoxd-d5xnnt5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE IF NOT EXISTS `tb_prestasi` (
  `id_prestasi` int(50) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `tahun` int(5) NOT NULL,
  `prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id_prestasi`, `nama_peserta`, `tingkat`, `tahun`, `prestasi`) VALUES
(1, 'Bintang Muhammad', 'Daerah', 2015, 'Juara 2 '),
(2, 'Bintang Muhammad', 'Internasional', 2014, 'Juara 2 Web Design'),
(3, 'Taufik Anwar', 'Nasional', 2015, 'Juara 1 RPL Gemastik'),
(6, 'Isnainul Fahrizal', 'Kecamatan', 2012, 'Juara 1 Catur'),
(7, 'Anjasmoro Adi Nugroho', 'RT RW', 2014, 'Juara Makan Kerupuk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE IF NOT EXISTS `tb_profil` (
  `id_profil` int(1) NOT NULL,
  `visimisi` text NOT NULL,
  `sejarah` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `visimisi`, `sejarah`) VALUES
(1, '<p>ini visi misi test lagi</p>\r\n<ol>\r\n<li>Menciptakan insan manusia yang bertaqwa mandiri dan jujur</li>\r\n<li>Menciptakan generasi bangsa yang bermartabat</li>\r\n<li>Cukup sekian</li>\r\n</ol>', '<p>test</p>\r\n<ol>\r\n<li>a</li>\r\n<li>a</li>\r\n<li>a</li>\r\n<li>a</li>\r\n<li>hah</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `password`, `level`) VALUES
('admin', 'admin', 1),
('bintang', 'admin', 1),
('taufik', 'taufik', 1),
('test', 'test', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`), ADD UNIQUE KEY `id_agenda` (`id_agenda`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `tb_ekskul`
--
ALTER TABLE `tb_ekskul`
  ADD PRIMARY KEY (`id_ekskul`), ADD UNIQUE KEY `id_ekskul` (`id_ekskul`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`), ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_post` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_ekskul`
--
ALTER TABLE `tb_ekskul`
  MODIFY `id_ekskul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
