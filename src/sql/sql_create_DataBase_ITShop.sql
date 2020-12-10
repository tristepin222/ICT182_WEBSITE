-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           8.0.19 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour itshop
CREATE DATABASE IF NOT EXISTS `itshop` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `itshop`;

-- Listage de la structure de la table itshop. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `productSize` int unsigned NOT NULL,
  `qtyAvailable` smallint NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL DEFAULT '0',
  `dailyPrice` float unsigned NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `active` tinyint unsigned NOT NULL DEFAULT '0',
  `detailedDescription` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `snow_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Listage des données de la table itshop.products : ~1 rows (environ)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

	INSERT INTO `products` (`id`, `code`, `brand`, `model`, `productSize`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`,`detailedDescription`) VALUES
	(1, 'B101', 'Acer Predator', 'Helios 300', 50, 10, 'le pc qui répondra a toutes vos éxigences', 1700, 'view/content/images/product_0.jpg', 1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

	INSERT INTO `products` (`id`, `code`, `brand`, `model`, `productSize`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`,`detailedDescription`) VALUES
	(2, 'B102', 'IPhone 8', 'Apple', 10, 20, 'le pc qui répondra a toutes vos éxigences', 500, 'view/content/images/product_1.jpg', 1, 'Ut congue quam tortor, a elementum ligula aliquam in.');

	INSERT INTO `products` (`id`, `code`, `brand`, `model`, `productSize`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`,`detailedDescription`) VALUES
	(3, 'B103', 'Hauts-Parleurs', 'Hauts-parleurs', 18, 15, 'le pc qui répondra a toutes vos éxigences', 300, 'view/content/images/product_2.jpg', 1,'Integer faucibus ligula in massa egestas mattis.');

	INSERT INTO `products` (`id`, `code`, `brand`, `model`, `productSize`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`,`detailedDescription`) VALUES
	(4, 'B104', 'MacBook', 'Apple', 20, 12, 'le pc qui répondra a toutes vos éxigences', 1000, 'view/content/images/product_3.jpg', 1, 'Mauris varius cursus elit, et vehicula turpis molestie sit amet.');

	INSERT INTO `products` (`id`, `code`, `brand`, `model`, `productSize`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`,`detailedDescription`) VALUES
	(5, 'B105', 'Souris', 'Apple', 15, 30, 'la souris élégante', 1000, 'randompathtonothing', 1, 'Vestibulum id dui lacus. Nunc rutrum blandit enim a sagittis. Phasellus porta eros ligula, a rutrum quam malesuada ac.');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Listage de la structure de la table itshop. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `userEmailAddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userHashPsw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPsw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seller` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userEmailAddress` (`userEmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table itshop.users : ~0 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
