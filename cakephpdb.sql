-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.24-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk cake2
CREATE DATABASE IF NOT EXISTS `cake2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cake2`;

-- membuang struktur untuk table cake2.task
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `task_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel cake2.task: ~5 rows (lebih kurang)
INSERT INTO `task` (`id`, `user_id`, `name`, `description`, `status`, `created`, `deleted`) VALUES
	(1, 2, 'Frontend', 'membuat fitur sidebar', 1, '2023-05-04 07:35:15', NULL),
	(2, 2, 'Frontend', 'Memperbaiki margin', 1, '2023-05-04 08:34:12', NULL),
	(4, 6, 'Frontend', 'Memperbaiki bagian card body', 1, '2023-05-05 06:39:28', NULL),
	(5, 1, 'Backend', 'Menambah Fitur Hapus pada user', 1, '2023-05-05 09:07:14', NULL),
	(6, NULL, 'Fullstack', 'Membuat fitur arsip surat', 0, '2023-05-05 09:07:47', NULL);

-- membuang struktur untuk table cake2.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel cake2.user: ~3 rows (lebih kurang)
INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `status`, `created`, `deleted`) VALUES
	(1, 'anton ', 'anton@gmail.com', '08219091239', 'Jakarta', 2, '2023-05-04 07:22:35', NULL),
	(2, 'ahmad ', 'ahmad@gmail.com', '09991023', 'Bandung', 1, '2023-05-04 15:39:47', NULL),
	(6, 'yantok', 'yantok@gmail.com', '0812039', 'Palembang\r\n', 1, '2023-05-05 09:17:24', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
