-- --------------------------------------------------------
-- Хост:                         DCODE
-- Версия сервера:               10.1.25-MariaDB - MariaDB Server
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных kalenyuk-rest-task-db
CREATE DATABASE IF NOT EXISTS `kalenyuk-rest-task-db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `kalenyuk-rest-task-db`;

-- Дамп структуры для таблица kalenyuk-rest-task-db.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `author` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы kalenyuk-rest-task-db.posts: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
	(1, 'The Solution to Hacks ', ' seems like every other day, there’s a new massive security breach announced; some major company dropped the ball, and has compromised millions of consumer records, including passwords or sensitive financial information. Equifax is the latest and most visible example of these breaches, but a Yahoo breach from years ago is still unfolding with new information, and the Target breach ended up costing hundreds of millions of dollars. Breaches are huge, damaging, and costly.', 'Anna Johansson', '2017-12-02 12:59:21', NULL),
	(2, 'Careers in IT', 'In the November 2017 issue of ComputingEdge, we asked Thomas N. Theis—professor of electrical engineering at Columbia University and executive director of the Columbia Nano Initiative—about career opportunities in information technology. His research interests include emerging types of devices and computer architectures for energy-efficient computing. He coauthored the article “The End of Moore’s Law: A New Beginning for Information Technology” from Computing in Science & Engineering’s March/April 2017 issue.', 'Lori Cameron', '2017-12-02 15:03:21', NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
