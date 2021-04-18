-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 02:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfs_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_user`
--

CREATE TABLE `biodata_user` (
  `id` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `born_city` varchar(100) NOT NULL,
  `birthday_date` date NOT NULL,
  `institution` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata_user`
--

INSERT INTO `biodata_user` (`id`, `nisn`, `first_name`, `last_name`, `gender`, `born_city`, `birthday_date`, `institution`, `level`, `username`) VALUES
(1, '160535611827', 'Eris', 'Dwi Septiawan Rizal', 1, 'Bondowoso', '1997-09-02', 'SMK Negeri 1 Bondowoso', 3, 'erisdsr'),
(2, '10002', 'Dwi Berlian', 'Mercury', 0, 'Bondowoso', '1999-09-10', 'SMA Negeri 1 Tenggarang', 3, 'dwiberlian'),
(3, '10003', 'Heru', 'Ana Pranata', 1, 'Bondowoso', '1997-09-01', 'SMK Negeri 1 Bondowoso', 3, 'heruana'),
(4, '10004', 'Aku', 'Ganteng', 1, 'Jember', '2003-06-26', 'SMK Negeri 1 Bondowoso', 3, 'akuganteng'),
(5, '10005', 'moka', 'cino', 1, 'Bondowoso', '2000-05-25', 'SMA Negeri 2 Bondowoso', 3, 'mokacino'),
(6, '10007', 'meyes', 'meyes juga', 1, 'Bondowoso', '1998-11-21', 'SMA Negeri 1 Malang', 3, 'meyes'),
(7, '10008', 'asik', 'asik', 1, 'Bondowoso', '2010-06-23', 'SMA Negeri 1 Bondowoso', 3, 'asik'),
(9, '10009', 'User', 'SMP', 1, 'Bondowoso', '2004-02-02', 'SMP Negeri 2 Tenggarang', 2, 'usersmp'),
(13, '10010', 'Ganteng', 'Gue', 1, 'Bondowoso', '2006-05-23', 'SMP Negeri 1 Malang', 2, 'gan'),
(15, '1090812', 'Ryan', 'Dmasiv', 1, 'Jakarta', '1992-08-21', 'SMA Negeri 5 Jakarta', 3, 'ryandmasiv'),
(16, '1456789', 'dimas', 'mjn', 1, 'jombang', '1997-07-08', 'lsrgvjdzzxjbvxdz', 2, 'dimas');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `sub_chapter` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_surat`
--

CREATE TABLE `data_surat` (
  `id` int(11) NOT NULL,
  `tanggal_diterima` varchar(100) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tanggal_surat` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `sekretaris` varchar(10) NOT NULL,
  `kabid_paud` varchar(10) NOT NULL,
  `kabid_sd` varchar(10) NOT NULL,
  `kabid_smp` varchar(10) NOT NULL,
  `kabid_dikmas` varchar(10) NOT NULL,
  `kasubbag_kepegawaian` varchar(10) NOT NULL,
  `kasubbag_keuangan` varchar(10) NOT NULL,
  `kasubbag_sungram` varchar(10) NOT NULL,
  `kasi_ptkpaud` varchar(10) NOT NULL,
  `kasi_praspaud` varchar(10) NOT NULL,
  `kasi_ptksd` varchar(10) NOT NULL,
  `kasi_prassd` varchar(10) NOT NULL,
  `kasi_ptksmp` varchar(10) NOT NULL,
  `kasi_prassmp` varchar(10) NOT NULL,
  `kasi_kesetaraan` varchar(10) NOT NULL,
  `kasi_pelatihan` varchar(10) NOT NULL,
  `disposisi_kadis` varchar(10) NOT NULL,
  `disposisi_sekdis` varchar(10) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `acara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_surat`
--

INSERT INTO `data_surat` (`id`, `tanggal_diterima`, `asal_surat`, `tanggal_surat`, `perihal`, `nomor_surat`, `sekretaris`, `kabid_paud`, `kabid_sd`, `kabid_smp`, `kabid_dikmas`, `kasubbag_kepegawaian`, `kasubbag_keuangan`, `kasubbag_sungram`, `kasi_ptkpaud`, `kasi_praspaud`, `kasi_ptksd`, `kasi_prassd`, `kasi_ptksmp`, `kasi_prassmp`, `kasi_kesetaraan`, `kasi_pelatihan`, `disposisi_kadis`, `disposisi_sekdis`, `hari`, `waktu`, `tempat`, `acara`) VALUES
(5, '28-05-19', 'PKMB Huru-Hara', '2019-05-21', 'Pengajuan Huru-Hara', '39/945.90/V/2019', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tuesday, 28-05-19', '04:12', 'asd', 'asd'),
(7, '12-06-19', 'Dinas Pertambangan', '2019-06-11', 'test', '102/2893.232/V/2019', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wednesday, 12-06-19', '07:30', 'test', 'test'),
(8, '12-06-19', 'Dinas Perhubungan', '2019-06-09', 'asd', '102/2893.232/V/2019', 'V', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wednesday, 12-06-19', '22:10', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `glossarium`
--

CREATE TABLE `glossarium` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glossarium`
--

INSERT INTO `glossarium` (`id`, `keyword`, `description`) VALUES
(9, 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `no_quiz` int(11) NOT NULL,
  `question` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `current_answer` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_verify`
--

CREATE TABLE `quiz_verify` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_verify`
--

INSERT INTO `quiz_verify` (`id`, `username`, `chapter_id`, `status`) VALUES
(20, 'erisdsr', 3, 2),
(23, 'ryandmasiv', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result_quiz`
--

CREATE TABLE `result_quiz` (
  `id` int(11) NOT NULL,
  `no_quiz` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `current_answer` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_quiz`
--

INSERT INTO `result_quiz` (`id`, `no_quiz`, `chapter_id`, `username`, `answer`, `current_answer`, `status`) VALUES
(103, 1, 3, 'erisdsr', 'Tidak tahu', 'Soal salah', 0),
(104, 2, 3, 'erisdsr', 'Gatau', 'Hahaha', 0),
(109, 1, 3, 'ryandmasiv', 'Tidak tahu', 'Soal salah', 0),
(110, 2, 3, 'ryandmasiv', 'Bodo', 'Hahaha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verify_code` varchar(50) NOT NULL,
  `verify` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `email`, `verify_code`, `verify`, `status`) VALUES
(1, 'erisdsr', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'erisdsr@gmail.com', '82012917827816231289', 1, 0),
(2, 'dwiberlian', 'b0e30d3aea56389f142e10d7b18c40e3', 2, 'dwiberlianmercury@gmail.com', '67849210272854735251', 1, 0),
(3, 'heruana', '4ecceab8e00380985c155f0aa3c7f476', 2, 'heruanapranata@gmail.com', '45854069502616567378', 1, 0),
(4, 'akuganteng', '4dd39f49f898c062283963c187532af8', 2, 'akuganteng@gmail.com', '45451957012838784951', 1, 0),
(5, 'mokacino', '1cae44b6bffe978a8573a6a1893dd717', 2, 'mokacino@gmail.com', '25014274944895848439', 1, 0),
(6, 'meyes', '8f7afa595e89380092813106679ef0a2', 2, 'meyes@gmail.com', '83310699567429669524', 1, 0),
(7, 'asik', '7d6805ee1c2ddfbd75f951edd438e675', 2, 'asik@gmail.com', '64235491059231902799', 1, 0),
(9, 'usersmp', 'b550417a98bea99125bb8e075d88e16b', 2, 'usersmp@gmail.com', '09925840760083036838', 1, 0),
(13, 'gan', 'f1253bc7b6c0b1d62eb9b97cfebf0f63', 2, 'gan@gmail.com', '66676520224503038399', 1, 0),
(14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin@kukubi.com', 'admin', 1, 1),
(15, 'ryandmasiv', 'f2367fe9c763ac68ea4eb061497c2ca0', 2, 'ryandmasiv@gmail.com', '88073884435170613487', 1, 0),
(16, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, 'admin2@gmail.com', '57435971889735731108', 1, 1),
(17, 'dimas', '202cb962ac59075b964b07152d234b70', 2, 'dimasmjn@gmail.com', '26812396195031583560', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_user`
--
ALTER TABLE `biodata_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_surat`
--
ALTER TABLE `data_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glossarium`
--
ALTER TABLE `glossarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_verify`
--
ALTER TABLE `quiz_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_quiz`
--
ALTER TABLE `result_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata_user`
--
ALTER TABLE `biodata_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_surat`
--
ALTER TABLE `data_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `glossarium`
--
ALTER TABLE `glossarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_verify`
--
ALTER TABLE `quiz_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `result_quiz`
--
ALTER TABLE `result_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
