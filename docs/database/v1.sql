-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `dish`;
CREATE TABLE `dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_recipe` int(11) DEFAULT NULL,
  `id_ingredient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ingredient` (`id_ingredient`),
  KEY `id_recipe` (`id_recipe`),
  CONSTRAINT `dish_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient` (`id`),
  CONSTRAINT `dish_ibfk_2` FOREIGN KEY (`id_recipe`) REFERENCES `recipe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dish` (`id`, `id_recipe`, `id_ingredient`) VALUES
(1,	1,	1),
(2,	1,	2),
(3,	1,	3),
(5,	1,	4),
(6,	1,	5),
(7,	2,	6),
(8,	2,	7),
(9,	2,	8),
(10,	2,	3),
(11,	3,	12),
(12,	3,	13),
(13,	3,	14),
(14,	3,	15),
(15,	3,	16),
(16,	4,	8),
(17,	4,	9),
(18,	4,	10),
(19,	4,	11),
(20,	2,	17);

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_before` date NOT NULL,
  `use_by` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ingredient` (`id`, `title`, `best_before`, `use_by`) VALUES
(1,	'Ham',	'2019-03-25',	'2019-03-27'),
(2,	'Cheese',	'2019-03-08',	'2019-03-13'),
(3,	'Bread',	'2019-03-25',	'2019-03-27'),
(4,	'Butter',	'2019-03-25',	'2019-03-27'),
(5,	'Bacon',	'2019-03-25',	'2019-03-27'),
(6,	'Eggs',	'2019-03-25',	'2019-03-27'),
(7,	'Mushrooms',	'2019-03-25',	'2019-03-27'),
(8,	'Sausage',	'2019-03-25',	'2019-03-27'),
(9,	'Hotdog Bun',	'2019-03-25',	'2019-03-27'),
(10,	'Ketchup',	'2019-03-25',	'2019-03-27'),
(11,	'Mustard',	'2019-03-25',	'2019-03-27'),
(12,	'Lettuce',	'2019-03-25',	'2019-03-27'),
(13,	'Tomato',	'2019-03-25',	'2019-03-27'),
(14,	'Cucumber',	'2019-03-25',	'2019-03-27'),
(15,	'Beetroot',	'2019-03-25',	'2019-03-27'),
(16,	'Salad Dressing',	'2019-03-06',	'2019-03-07'),
(17,	'Baked Beans',	'0000-00-00',	'0000-00-00');

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200213081443',	'2020-02-13 08:14:55'),
('20200213082434',	'2020-02-13 08:24:38'),
('20200213083158',	'2020-02-13 08:32:02'),
('20200213083753',	'2020-02-13 08:37:58'),
('20200213084329',	'2020-02-13 08:43:31'),
('20200213085057',	'2020-02-13 08:51:01');

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `recipe` (`id`, `title`) VALUES
(1,	'Ham and Cheese Toastie'),
(2,	'Fry-up'),
(3,	'Salad'),
(4,	'Hotdog');

-- 2020-02-13 09:01:14
