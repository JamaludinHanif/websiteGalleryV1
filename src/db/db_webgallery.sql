-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 12:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `AlbumId` int NOT NULL,
  `NamaAlbum` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`AlbumId`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserId`) VALUES
(7, 'Album Pertama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum incidunt nostrum mollitia deserunt quasi doloremque quas officia iste, rerum magni tempore unde odit perferendis libero ipsam pariatur non reiciendis? Dicta.\r\n', '2024-05-03', 2),
(9, 'Album Pertama', 'ini akun om kolot Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa minima neque quis soluta aperiam velit quos tempore! Ducimus provident deleniti nemo unde doloribus quos voluptas assumenda illo autem suscipit. Autem!\r\n', '2024-05-04', 3),
(11, 'Para Petinggi Dunia', 'Ini adalah sekumpulan orang-orang yng sangat berpengaruh bagi kelangsungan hidup manusia, jadi seabiknya kalian hormat oke !!!', '2024-05-04', 2),
(12, 'Album Kedua', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', '2024-05-21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `FotoId` int NOT NULL,
  `JudulFoto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `DeskripsiFoto` text COLLATE utf8mb4_general_ci NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `AlbumId` int NOT NULL,
  `UserId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`FotoId`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumId`, `UserId`) VALUES
(3, 'Jamaludin Hanif', 'Ini adalah sosok aseli dari sang uncrowned king, sebaiknya jangan gegabah', '2024-05-04', '990030392-jamal.png', 11, 2),
(4, 'Maul Fans Emyu', 'Dia adalah sosok aseli Raja dari segala raja, jadi jika kalian merasa klo kalian raja ???, jangan sok keras !!, karena dia lebih raja', '2024-05-04', '2120365140-maul.png', 11, 2),
(5, 'Saya adalah Om Kolot', 'Hiii Semuanya kenalin yaa aku Om Kolot dan aku disini ada untuk kalian. Sekali lagi Salken yaaaaaaa', '2024-05-05', '1499013553-om kolot.jpg', 9, 3),
(6, 'yudi haram', 'ytsutwyhiin nama saya yudi damanysah dari salakadomas yang gempa saya minta bantuan kemanusiaan terimakasih', '2024-05-06', '1722843308-yudi.png', 9, 3),
(7, 'Anak pak maman', 'ini adslshh mamanann ganeng', '2024-05-06', '1352537209-.trashed-1687538340-IMG_20230524_233414.jpg', 11, 2),
(8, 'Anak Bpk Iwan gans', 'yip yip', '2024-05-06', '794854565-alif.png', 11, 2),
(9, 'Tegar Tampans', 'Hiii ini adlah gambar tegr yng sangat tampan dan rupawan', '2024-05-21', '1558080285-dogar.png', 11, 2),
(10, 'haris', 'ini adalah tes hdsbdshkjsnjskcjkcnajckanckxnnmckxncknckccjvnvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2024-05-28', '1210242668-haris.png', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentarfoto`
--

CREATE TABLE `tbl_komentarfoto` (
  `KomentarId` int NOT NULL,
  `FotoId` int NOT NULL,
  `UserId` int NOT NULL,
  `IsiKomentar` text COLLATE utf8mb4_general_ci NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_komentarfoto`
--

INSERT INTO `tbl_komentarfoto` (`KomentarId`, `FotoId`, `UserId`, `IsiKomentar`, `TanggalKomentar`) VALUES
(4, 3, 3, 'tesss', '2024-05-06'),
(5, 4, 3, 'ini komentar dipostingan maul', '2024-05-06'),
(6, 6, 3, 'Yudi kmu ganteng bgt siiiii', '2024-05-06'),
(7, 4, 2, 'semoga amiin', '2024-05-06'),
(8, 7, 2, 'gsntg bgt gilaaa', '2024-05-06'),
(9, 8, 2, 'mirip si iwan geniing', '2024-05-06'),
(10, 5, 2, 'semoga amiin', '2024-05-20'),
(11, 9, 2, 'HIIII KAK TEGAR', '2024-05-21'),
(12, 3, 2, 'engkos kamu kaya artis', '2024-05-21'),
(13, 4, 2, 'maul', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_likefoto`
--

CREATE TABLE `tbl_likefoto` (
  `LikeId` int NOT NULL,
  `FotoId` int NOT NULL,
  `UserId` int NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_likefoto`
--

INSERT INTO `tbl_likefoto` (`LikeId`, `FotoId`, `UserId`, `TanggalLike`) VALUES
(1, 3, 3, '2024-05-05'),
(13, 6, 3, '2024-05-06'),
(14, 8, 2, '2024-05-06'),
(15, 7, 2, '2024-05-06'),
(17, 9, 2, '2024-05-21'),
(18, 6, 2, '2024-05-21'),
(19, 4, 2, '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NamaLengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Alamat` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(2, 'UdinJS', '12345678', 'newhanif1@gmail.com', 'Jamaludin Hanif', 'Desa Cikaso, Kab.Kuningan'),
(3, 'om kolot', 'panglong', 'testes@gmail.com', 'Daffa Zianur', 'Pancalang'),
(8, 'panglong', '123', 'newhanif@gmail.com', 'bebas', 'sampora');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`AlbumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`FotoId`),
  ADD KEY `AlbumId` (`AlbumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_komentarfoto`
--
ALTER TABLE `tbl_komentarfoto`
  ADD PRIMARY KEY (`KomentarId`),
  ADD KEY `FotoId` (`FotoId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_likefoto`
--
ALTER TABLE `tbl_likefoto`
  ADD PRIMARY KEY (`LikeId`),
  ADD KEY `FotoId` (`FotoId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `AlbumId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `FotoId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_komentarfoto`
--
ALTER TABLE `tbl_komentarfoto`
  MODIFY `KomentarId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_likefoto`
--
ALTER TABLE `tbl_likefoto`
  MODIFY `LikeId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `tbl_album_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `tbl_foto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_foto_ibfk_2` FOREIGN KEY (`AlbumId`) REFERENCES `tbl_album` (`AlbumId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_komentarfoto`
--
ALTER TABLE `tbl_komentarfoto`
  ADD CONSTRAINT `tbl_komentarfoto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_komentarfoto_ibfk_2` FOREIGN KEY (`FotoId`) REFERENCES `tbl_foto` (`FotoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_likefoto`
--
ALTER TABLE `tbl_likefoto`
  ADD CONSTRAINT `tbl_likefoto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_likefoto_ibfk_2` FOREIGN KEY (`FotoId`) REFERENCES `tbl_foto` (`FotoId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
