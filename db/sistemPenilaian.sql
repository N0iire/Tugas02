	-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.20 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sistem_penilaian
CREATE DATABASE IF NOT EXISTS `sistem_penilaian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistem_penilaian`;

-- Dumping structure for table sistem_penilaian.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sistem_penilaian.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT IGNORE INTO `admin` (`id`, `email`, `username`, `password`) VALUES
	(1, 'admin@admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(2, 'saiko@mail.com', 'saiko', '5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table sistem_penilaian.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(16) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sistem_penilaian.mahasiswa: ~1 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT IGNORE INTO `mahasiswa` (`nim`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`) VALUES
	('10119113', 'Dafa Rizky Fahreza', '2001-03-04', 'Bandung'),
	('10119120', 'Reichan Muhammad Maulana', '2001-04-23', 'Bandung'),
	('10119123', 'Angga Cahya Abadi', '2001-01-02', 'Bandung');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table sistem_penilaian.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `Id_matkul` varchar(16) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sistem_penilaian.matakuliah: ~0 rows (approximately)
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT IGNORE INTO `matakuliah` (`Id_matkul`, `nama_matkul`) VALUES
	('IF002PBO', 'Pemrogramman Beoriantsi Objek'),
	('IF003ATOL', 'Aplikasi Teknologi Online');
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;

-- Dumping structure for table sistem_penilaian.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `nim` varchar(16) NOT NULL,
  `Id_matkul` varchar(16) NOT NULL,
  `kehadiran` double NOT NULL DEFAULT '0',
  `tugas` double NOT NULL DEFAULT '0',
  `uts` double NOT NULL DEFAULT '0',
  `uas` double NOT NULL DEFAULT '0',
  KEY `FK__mahasiswa` (`nim`),
  KEY `FK__matakuliah` (`Id_matkul`),
  CONSTRAINT `FK__mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__matakuliah` FOREIGN KEY (`Id_matkul`) REFERENCES `matakuliah` (`Id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sistem_penilaian.nilai: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT IGNORE INTO `nilai` (`nim`, `Id_matkul`, `kehadiran`, `tugas`, `uts`, `uas`) VALUES
	('10119123', 'IF002PBO', 100, 100, 100, 90);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
