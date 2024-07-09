-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2020 pada 05.54
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelulusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `UID` tinyint(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`UID`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'saloom', '6f30886f732310e162ccaafc8218d7ad'),
(4, 'adminsekolah', '912ec803b2ce49e4a541068d495ab570');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_konfig`
--

CREATE TABLE `data_konfig` (
  `id` int(11) NOT NULL,
  `pemerintah` varchar(100) NOT NULL,
  `dinas` varchar(255) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_pengumuman` datetime NOT NULL,
  `nama_kepsek` varchar(55) NOT NULL,
  `nip_kepsek` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_konfig`
--

INSERT INTO `data_konfig` (`id`, `pemerintah`, `dinas`, `sekolah`, `alamat`, `tahun`, `tgl_pengumuman`, `nama_kepsek`, `nip_kepsek`) VALUES
(3, 'PEMERINTAH KOTA INDONESIA RAYA JAYA', 'DINAS PENDIDIKAN', 'SMP NEGERI 10 INDONESIA RAYA', 'Jl. Dr. Sutomo No.11 Telp/Fax.(011) 1234567 Kota Indonesia Raya Kode Pos 11111', 2020, '2020-05-05 15:00:00', 'Nama Kepsek', 'Nip. -XXX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nisn` varchar(12) NOT NULL,
  `no_surat` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `no_ujian` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `agama` text NOT NULL,
  `ppkn` text NOT NULL,
  `bindo` text NOT NULL,
  `mm` text NOT NULL,
  `ipa` text NOT NULL,
  `ips` text NOT NULL,
  `bing` text NOT NULL,
  `senbud` text NOT NULL,
  `penjas` text NOT NULL,
  `prakarya` text NOT NULL,
  `rata_rata` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nisn`, `no_surat`, `nama`, `jk`, `no_ujian`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `agama`, `ppkn`, `bindo`, `mm`, `ipa`, `ips`, `bing`, `senbud`, `penjas`, `prakarya`, `rata_rata`, `status`) VALUES
('00123', '1', 'ANTO', 'Laki-laki', '', 'Lawe Tua', '27 Juli 2003', 'Poltak', '90', '90', '90', '90', '90', '70', '80', '90', '89', '90', '86,90', 1),
('00124', '2', 'ADELIA', 'Perempuan', '41573888', 'Tebing Tinggi,', '24-Apr-04', 'Sabar', '80', '90', '90', '90', '90', '70', '80', '90', '89', '90', '85,90', 1),
('00125', '3', 'NARUTO', 'Perempuan', '41890064', 'Bangko', '14 Maret 2004', 'Manahan', '80', '90', '90', '90', '86', '70', '80', '90', '89', '90', '85,50', 1),
('00126', '4', 'SASUKE', 'Perempuan', '35612060', 'Tebing Tinggi', '15 Maret 2004', 'Butet', '90', '90', '90', '90', '80', '70', '80', '86', '80', '80', '83,60', 1),
('00127', '5', 'ICIGO', 'Laki-laki', '36320733', 'Tebing Tinggi', '13 Oktober 2003', 'Ucok', '86', '86', '90', '86', '90', '70', '80', '90', '86', '86', '85,00', 1),
('00128', '6', 'NOBITA', 'Laki-laki', '41024102', 'Tebing Tinggi', '12 Januari 2004', 'Tumpal', '90', '90', '80', '90', '90', '70', '68', '90', '89', '90', '84,70', 1),
('00129', '7', 'SAKURA', 'Laki-laki', '40451333', 'Aliantan', '19 Juli 2004', 'Poltak', '86', '90', '90', '90', '90', '70', '80', '90', '89', '86', '86,10', 1),
('00130', '8', 'VEGITA', 'Laki-laki', '41813133', 'Tebing Tinggi', '8 Mei 2004', 'Sabar', '90', '86', '90', '90', '90', '70', '80', '90', '89', '90', '86,50', 1),
('00131', '9', 'CICI', 'Perempuan', '35812913', 'Tebing Tinggi', '30 Oktober 2003', 'Manahan', '90', '90', '90', '90', '90', '80', '80', '90', '89', '90', '87,90', 1),
('00132', '10', 'SUCI', 'Perempuan', '50378922', 'Tebing Tinggi', '31 Oktober 2003', 'Butet', '68', '90', '86', '80', '90', '70', '80', '90', '89', '90', '83,30', 1),
('00133', '11', 'CINTA', 'Perempuan', '41573894', 'Desa Binjai', '2 Juli 2004', 'Ucok', '80', '90', '90', '86', '78', '80', '80', '90', '89', '86', '84,90', 1),
('00134', '12', 'RANGGA', 'Laki-laki', '46246580', 'Rambutan', '3-Sep-04', 'Tumpal', '80', '90', '90', '90', '90', '70', '80', '90', '89', '90', '85,90', 1),
('00135', '13', 'TASIA', 'Laki-laki', '41911559', 'Dolok Masihul', '27-Sep-04', 'Poltak', '90', '90', '86', '68', '90', '70', '80', '90', '89', '68', '82,10', 1),
('00136', '14', 'JUSTIN', 'Laki-laki', '42391065', 'Tebing Tinggi', '8 Oktober 2004', 'Sabar', '86', '90', '90', '90', '90', '80', '80', '90', '80', '90', '86,60', 1),
('00137', '15', 'MEI MEI', 'Laki-laki', '41814159', 'Paya Pinang', '20 Oktober 2004', 'Manahan', '90', '80', '90', '90', '90', '70', '80', '80', '89', '90', '84,90', 1),
('00138', '16', 'KLARA', 'Laki-laki', '41534473', 'Tebing Tinggi', '16-Apr-04', 'Butet', '90', '90', '68', '90', '90', '70', '80', '90', '89', '68', '82,50', 1),
('00139', '17', 'NANDO', 'Perempuan', '35338454', 'Tebing Tinggi', '2 Desember 2003', 'Ucok', '90', '90', '90', '90', '86', '70', '80', '80', '89', '90', '85,50', 1),
('00140', '18', 'UCOK', 'Perempuan', '41518872', 'Tebing Tinggi', '29 Juni 2004', 'Tumpal', '90', '90', '90', '90', '90', '70', '80', '90', '89', '86', '86,50', 2),
('00141', '19', 'BUTET', 'Perempuan', '', 'Torgamba', '7 Oktober 2003', 'Ucok', '', '', '', '', '', '', '', '', '', '', '', 1),
('00142', '20', 'MAMASITA', 'Perempuan', '50397560', 'Tebing Tinggi', '9 Agustus 2004', 'Tumpal', '90', '90', '90', '90', '90', '70', '80', '90', '89', '90', '86,90', 1),
('NISN', 'No Surat', 'Nama Lengkap', 'Jenis Kelamin', 'Nomor Peserta', 'Tempat Lahir', 'Tanggal Lahir', 'Orang Tua', 'Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaraan', 'Bahasa Indonesia', 'Matematika', 'Ilmu Pengetahuan Alam', 'Ilmu Pengetahuan Sosial', 'Bahasa Inggris', 'Seni Budaya', 'Pendidikan Jasmani, Olah Raga dan Kesehatan', 'Prakarya', 'Nilai Rata-rata', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `data_konfig`
--
ALTER TABLE `data_konfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `UID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_konfig`
--
ALTER TABLE `data_konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
