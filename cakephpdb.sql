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


-- Membuang struktur basisdata untuk cakephpdb
CREATE DATABASE IF NOT EXISTS `cakephpdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cakephpdb`;

-- membuang struktur untuk table cakephpdb.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tasks_to_user_user_id` (`user_id`),
  CONSTRAINT `tasks_to_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel cakephpdb.tasks: ~5 rows (lebih kurang)
INSERT INTO `tasks` (`id`, `user_id`, `name`, `description`, `status`, `expired`, `created_at`) VALUES
	(1, 2, 'Frontend', 'Memperbaiki bugs css', 1, '2023-10-01', '2023-05-11'),
	(2, 1, 'Frontend', 'Menambahkan fitur', 1, '2023-10-01', '2023-05-11'),
	(5, NULL, 'Backend', 'Menambahkan fitur', 1, '2023-04-11', '2023-05-11'),
	(6, NULL, 'Frontend', 'Menambahkan Navbar', 1, '2023-04-27', '2023-05-11'),
	(7, 1, 'Fullstack', 'membuat Layout', 1, '2024-12-01', '2023-05-11');

-- membuang struktur untuk table cakephpdb.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created` datetime DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel cakephpdb.user: ~4 rows (lebih kurang)
INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `status`, `created`, `deleted`) VALUES
	(1, 'anton ', 'anton@gmail.com', '08219091239', 'Jakarta', 1, '2023-05-04 14:22:35', NULL),
	(2, 'ahmad ', 'ahmad@gmail.com', '09991023', 'Bandung', 1, '2023-05-04 22:39:47', NULL),
	(3, 'yantok', 'yantok@gmail.com', '0812039', 'Palembang\r\n', 1, '2023-05-05 16:17:24', NULL),
	(7, 'kurniawan 1', 'kurniawan@gmail.com', '08909123809', 'Bandung ', 0, '2023-05-11 12:26:34', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
