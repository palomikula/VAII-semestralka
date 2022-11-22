-- Adminer 4.8.1 MySQL 10.9.2-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`
(
    `id`    int(11)      NOT NULL AUTO_INCREMENT,
    `title` varchar(200) NOT NULL,
    `text`  varchar(200) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

INSERT INTO `articles` (`id`, `title`, `text`)
VALUES (1, 'Blog 1', 'Text 1'),
       (2, 'Blog 2 ', 'Text o  niecom inom');
