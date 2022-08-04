-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `acces`;
CREATE TABLE `acces` (
  `id_acces` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `sms_limit` int NOT NULL,
  `sms_ramas` int NOT NULL,
  `email_ramas` int NOT NULL,
  `email_limit` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_acces`),
  KEY `acces_fk0` (`id_companie`),
  CONSTRAINT `acces_fk0` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `clienti`;
CREATE TABLE `clienti` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `nume_client` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_client`),
  KEY `id_companie` (`id_companie`),
  CONSTRAINT `clienti_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `clienti_ibfk_2` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `clienti_ibfk_3` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `clienti_ibfk_4` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `clienti_ibfk_5` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `clienti` (`id_client`, `id_companie`, `nume_client`, `phone`, `email`, `date`) VALUES
(1,	1,	'Raul',	'0775634759',	'0',	'2020-03-17 11:59:55'),
(2,	1,	'Raul',	'0',	'adrian@gmail.com',	'2020-03-17 12:01:15'),
(3,	1,	'Raul',	'0',	'adrian@gmail.com',	'2020-03-17 12:02:10'),
(4,	1,	'Raul',	'0',	'adrian@gmail.com',	'2020-03-17 12:07:51'),
(5,	1,	'bets',	'0',	'adrian@gmail.com',	'2020-03-17 12:08:00'),
(6,	1,	'Raul',	'0',	'adrian@gmail.com',	'2020-03-17 12:10:14'),
(7,	1,	'Raul',	'0',	'adrian@gmail.com',	'2020-03-17 12:16:10'),
(8,	1,	'Endi',	'0775634733',	'0',	'2020-03-17 15:13:46'),
(9,	2,	'Mona Lisa Jock',	'0',	'cristeapaul.2015@gmail.com',	'2020-04-29 17:39:58'),
(10,	2,	'ter',	'0775634759',	'0',	'2020-04-30 11:56:41'),
(12,	2,	'ADridna',	'0',	'adleina@dasdas.com',	'2020-04-30 13:43:52'),
(13,	2,	'Neda Aurel',	'0',	'shaggi.rst@gmail.com',	'2020-04-30 21:01:04');

DROP TABLE IF EXISTS `companii`;
CREATE TABLE `companii` (
  `id_companie` int NOT NULL AUTO_INCREMENT,
  `grand_acces` tinyint(1) NOT NULL,
  `nume_companie` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ocupatie` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adresa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_companie` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefon` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `companii` (`id_companie`, `grand_acces`, `nume_companie`, `ocupatie`, `adresa`, `password`, `email_companie`, `telefon`, `status`, `data`) VALUES
(1,	0,	'dsadas',	'dasdas',	'sdas',	'$2y$10$qhNyZGFUZo5ePUadXeCpHOG30Bhr0DtyYh7Zz3w3GGSjqxHqc705K',	'ax@ad.cim',	75422347,	0,	'2020-03-17 15:37:03'),
(2,	0,	'admin',	'Admin',	'admin',	'$2y$10$XsMscM1/Y.NvsQ8tZg0kA.GfnM7zgWqJ6mv/vJxRRQrgX3GYDWfyy',	'admin',	72245678,	0,	'2020-05-01 19:14:09'),
(3,	0,	'Sc Com',	'dddd',	'dsadsa',	'$2y$10$Gv1IhiAynVnRoY47OJyxWuWcM4sPvvQgDN4JammGRLVHFWHmDgGEe',	'cristeapaul.2015@gmail.com',	543545435,	0,	'2020-04-30 15:28:11');

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id_newsletter` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `nume_newsletter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subject_newsletter` varchar(255) NOT NULL,
  `content_newsletter` blob NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_newsletter`),
  KEY `id_companie` (`id_companie`),
  CONSTRAINT `newsletter_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `newsletter` (`id_newsletter`, `id_companie`, `nume_newsletter`, `subject_newsletter`, `content_newsletter`, `data`) VALUES
(1,	2,	'Text predefint notificari de programare',	'Programare dvs. va avea loc peste 4 ore!',	'<p>Buna ziua,<br> Acestea este un mesaj de inforamre referitor la programarea dumneavoastre ce are loc peste 4ore! <br> O zi frumoasa!  </p>\n',	'2020-05-01 19:34:24');

DROP TABLE IF EXISTS `programari`;
CREATE TABLE `programari` (
  `id_programari` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `id_reprezentant` int NOT NULL,
  `id_client` int NOT NULL,
  `start_programare` varchar(255) NOT NULL,
  `end_programare` varchar(255) NOT NULL,
  `info` varchar(200) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_programari`),
  KEY `id_companie` (`id_companie`),
  KEY `id_reprezentant` (`id_reprezentant`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `pragramari_fk0` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `pragramari_fk1` FOREIGN KEY (`id_reprezentant`) REFERENCES `reprezentanti_companie` (`id_reprezentant`),
  CONSTRAINT `programari_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  CONSTRAINT `programari_ibfk_2` FOREIGN KEY (`id_reprezentant`) REFERENCES `reprezentanti_companie` (`id_reprezentant`),
  CONSTRAINT `programari_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `clienti` (`id_client`),
  CONSTRAINT `programari_ibfk_5` FOREIGN KEY (`id_reprezentant`) REFERENCES `reprezentanti_companie` (`id_reprezentant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `programari` (`id_programari`, `id_companie`, `id_reprezentant`, `id_client`, `start_programare`, `end_programare`, `info`, `data`) VALUES
(5,	2,	1,	1,	'18:30 28-04-2020',	'20:30 28-04-2020',	'ddd',	'2020-04-27 17:07:55'),
(6,	2,	2,	12,	'16:45 01-05-2020',	'18:30 01-05-2020',	'ddd',	'2020-04-30 13:43:52'),
(7,	2,	1,	13,	'00:00 01-05-2020',	'00:00 01-05-2020',	'',	'2020-04-30 21:01:04');

DROP TABLE IF EXISTS `reprezentanti_companie`;
CREATE TABLE `reprezentanti_companie` (
  `id_reprezentant` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `nume_reprezentant` varchar(255) NOT NULL,
  `functie_reprezentant` varchar(255) NOT NULL,
  `telefon_reprezentant` varchar(255) NOT NULL,
  `email_reprezentant` varchar(255) NOT NULL,
  PRIMARY KEY (`id_reprezentant`),
  KEY `reprezantanti_companie_fk0` (`id_companie`),
  CONSTRAINT `reprezantanti_companie_fk0` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `reprezentanti_companie` (`id_reprezentant`, `id_companie`, `nume_reprezentant`, `functie_reprezentant`, `telefon_reprezentant`, `email_reprezentant`) VALUES
(1,	2,	'Paul C',	'd',	'0775634754',	'sdad@dsada.com'),
(2,	2,	'Raider Del Jo',	'Actie',	'0733248567',	'xg.football_1@ps.xyz');

DROP TABLE IF EXISTS `sending`;
CREATE TABLE `sending` (
  `id_sending` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `emails` int DEFAULT NULL,
  `sms` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sending`),
  KEY `id_companie` (`id_companie`),
  KEY `id_newsletter` (`emails`),
  CONSTRAINT `sending_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sending` (`id_sending`, `id_companie`, `emails`, `sms`, `date`) VALUES
(1,	1,	4,	23,	'2020-04-29 19:24:01'),
(3,	2,	33,	2,	'2020-06-04 10:30:25');

DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `id_sms` int NOT NULL AUTO_INCREMENT,
  `id_companie` int NOT NULL,
  `nume_sms` varchar(50) NOT NULL,
  `subject_sms` varchar(50) NOT NULL,
  `content_sms` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sms`),
  KEY `id_companie` (`id_companie`),
  CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sms` (`id_sms`, `id_companie`, `nume_sms`, `subject_sms`, `content_sms`, `data`) VALUES
(1,	2,	'Reducere paste',	'Reducere paste',	'Hei nerdler',	'2020-04-30 11:52:54');

-- 2020-06-21 11:27:41
