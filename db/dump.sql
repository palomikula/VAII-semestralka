-- Adminer 4.8.1 MySQL 5.5.5-10.10.2-MariaDB-1:10.10.2+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volume` float NOT NULL,
  `power` int(11) NOT NULL,
  `transmission` text NOT NULL,
  `acceleration` float NOT NULL,
  `top_speed` int(11) NOT NULL,
  `fuel_consumption` float NOT NULL,
  `price` int(11) NOT NULL,
  `model` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cars` (`id`, `volume`, `power`, `transmission`, `acceleration`, `top_speed`, `fuel_consumption`, `price`, `model`) VALUES
(1,	5.5,	540,	'automatická',	3.9,	230,	13.8,	20,	'Mercedes-benz G63'),
(2,	4,	604,	'automatická',	3.4,	300,	12.5,	20,	'Mercedes-benz E63'),
(3,	3.8,	565,	'automatická',	3.6,	315,	12.2,	25,	'Nissan GTR'),
(4,	5,	5,	'rshfd',	5,	5,	5,	5,	'asfsfsdf'),
(11,	4,	4,	'ftyr',	4,	4,	4,	4,	'sdgdsg'),
(12,	4,	4,	'ftyr',	4,	4,	4,	4,	'sdgdtyy');

-- 2022-11-22 16:20:01
