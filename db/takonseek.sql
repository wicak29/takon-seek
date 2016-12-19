-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.10-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for takonseek
CREATE DATABASE IF NOT EXISTS `takonseek` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `takonseek`;


-- Dumping structure for table takonseek.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_text` varchar(500) DEFAULT NULL,
  `answer_status` char(1) DEFAULT NULL,
  `answer_date_posted` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `fk_answer_user1_idx` (`user_id`),
  KEY `fk_answer_video1_idx` (`video_id`),
  KEY `fk_answer_question1_idx` (`question_id`),
  CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_video1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table takonseek.answer: ~3 rows (approximately)
DELETE FROM `answer`;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`answer_id`, `answer_text`, `answer_status`, `answer_date_posted`, `user_id`, `video_id`, `question_id`) VALUES
	(1, 'Boleh aja gan. kalau misal mahal ya tawar, kalau ga ya udah', '1', '2016-12-17 04:53:12', 1, NULL, 5),
	(2, 'Kalau saya sih ga masalah, yang penting tidak mahal. Karena mahal itu tidak murah', '1', '2016-12-17 05:14:45', 1, NULL, 5),
	(3, 'Cantik emang mau gimana lagi', '1', '2016-12-17 05:18:29', 1, NULL, 2);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;


-- Dumping structure for table takonseek.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `date_posted` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `category` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_user1_idx` (`user_id`),
  KEY `fk_question_video1_idx` (`video_id`),
  CONSTRAINT `fk_question_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_video1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table takonseek.question: ~4 rows (approximately)
DELETE FROM `question`;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `title`, `text`, `date_posted`, `user_id`, `video_id`, `category`) VALUES
	(1, 'Tidak bisa membuka Pop Mie', 'melody kok manis ya?', NULL, 1, NULL, '1'),
	(2, 'Error saat membuka Steam', 'Kan saya maen dota. nah untuk maen dota itu diperlukan suatu niat yang tinggi disertai dengan motivasi yang mantap. Ketika saya menghidupkan PC, steam saya malam tidak bisa dibuka. Ada yang tahu itu kenapa?', NULL, 1, 1, '1'),
	(3, 'Insert data pada tabel ', 'lawan messi siapa?', '2016-12-17 07:00:33', 1, NULL, '1'),
	(5, 'Using a text editor, create a form called upl', 'You’ll notice we are using a form helper to create the opening form tag. File uploads require a multipart form, so the helper creates the proper syntax for you. You’ll also notice we have an $error variable. This is so we can show error messages in the event the user does something wrong?', '2016-12-17 03:41:38', 1, 2, '2');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;


-- Dumping structure for table takonseek.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table takonseek.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`) VALUES
	(1, 'melody', 'melody');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table takonseek.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(500) DEFAULT NULL,
  `nama_video` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table takonseek.video: ~2 rows (approximately)
DELETE FROM `video`;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id`, `file_path`, `nama_video`) VALUES
	(1, '161217-Isyana_Sarasvati_-_Kau_Adalah_(feat__Rayi_Putra).mp4', '161217-Isyana_Sarasvati_-_Kau_Adalah_(feat__Rayi_Putra).mp4'),
	(2, '161217-JKT48_member_profiles-_Melody.mp4', '161217-JKT48_member_profiles-_Melody.mp4');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
