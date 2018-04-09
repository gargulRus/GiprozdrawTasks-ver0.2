-- --------------------------------------------------------
-- Хост:                         192.168.62.231
-- Версия сервера:               5.7.18-0ubuntu0.16.04.1 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных giprotable
CREATE DATABASE IF NOT EXISTS `giprotable` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `giprotable`;

-- Дамп структуры для таблица giprotable.gips
CREATE TABLE IF NOT EXISTS `gips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gipname` varchar(255) COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы giprotable.gips: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `gips` DISABLE KEYS */;
REPLACE INTO `gips` (`id`, `gipname`) VALUES
	(1, ''),
	(2, 'Васенков'),
	(3, 'Гаврилин'),
	(4, 'Поляков'),
	(5, 'Яськов'),
	(6, 'Семенова');
/*!40000 ALTER TABLE `gips` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.jobplan
CREATE TABLE IF NOT EXISTS `jobplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT '0',
  `pos_num` int(11) DEFAULT '0',
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.jobplan: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `jobplan` DISABLE KEYS */;
REPLACE INTO `jobplan` (`id`, `object_id`, `pos_num`, `data`) VALUES
	(5, 2, 1, '2018-01-10'),
	(6, 2, 2, '2018-04-27'),
	(7, 2, 3, '2018-05-14'),
	(8, 2, 4, '2018-07-14'),
	(9, 2, 5, '2018-06-15'),
	(10, 2, 6, '2018-07-20'),
	(13, 3, 1, '2018-01-09'),
	(14, 3, 2, '2018-04-06'),
	(17, 3, 3, '2018-04-07'),
	(18, 3, 4, '2018-07-13'),
	(19, 1, 1, '2018-01-08'),
	(20, 1, 2, '2018-02-14'),
	(21, 4, 1, '2018-03-06'),
	(22, 4, 2, '2018-06-07'),
	(23, 7, 1, '2018-01-10'),
	(24, 7, 2, '2018-04-06'),
	(25, 7, 5, '2018-04-04'),
	(26, 7, 6, '2018-07-13'),
	(27, 8, 1, '2018-01-02'),
	(28, 8, 2, '2018-06-13'),
	(29, 8, 5, '2018-05-14'),
	(30, 8, 6, '2018-12-19');
/*!40000 ALTER TABLE `jobplan` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.maintable
CREATE TABLE IF NOT EXISTS `maintable` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '0',
  `jan` char(50) DEFAULT NULL,
  `feb` char(50) DEFAULT NULL,
  `march` char(50) DEFAULT NULL,
  `aipril` char(50) DEFAULT NULL,
  `may` char(50) DEFAULT NULL,
  `june` char(50) DEFAULT NULL,
  `july` char(50) DEFAULT NULL,
  `august` char(50) DEFAULT NULL,
  `sept` char(50) DEFAULT NULL,
  `okt` char(50) DEFAULT NULL,
  `novemb` char(50) DEFAULT NULL,
  `decemb` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы giprotable.maintable: ~35 rows (приблизительно)
/*!40000 ALTER TABLE `maintable` DISABLE KEYS */;
REPLACE INTO `maintable` (`id`, `name`, `jan`, `feb`, `march`, `aipril`, `may`, `june`, `july`, `august`, `sept`, `okt`, `novemb`, `decemb`) VALUES
	(1, 'Севастополь (псих)', 'ВОП 31.01', 'Изыск. 28.02', ' "П" 31.03', 'Эксп(вх)31.04', '', '', '', '"РД" 31.08', '', '', '', ''),
	(2, 'Ховрино(поликл)', 'Согл. "П" 21.01', 'Эксп(вх) 01.02', '', '', '', '', '', 'РД 21.08', '"РД"+"П" 11.09', '', '', ''),
	(16, 'Качуг(поликл)', NULL, 'Эксп(экол) 02.02', 'Эксп(вх) 01.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 'Тула (ПЦ)', NULL, 'Эксп(вх) 12.02', 'ГГЭ(вх) 01.03', NULL, '"П"+"РД" 21.05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 'Боткинская', NULL, NULL, 'Эксп(вых) 20.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 'Сочи (ПЦ)', NULL, 'Корр. "П"+"РД" 16.02', 'Эксп(вых) 16.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 'Тулун (туберкул.)', NULL, 'Эксп(вых) 11.02', NULL, '"РД" 17.04', NULL, 'Эксп(вых) смет 16.06', NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 'Ставрополь(хирург)', NULL, NULL, 'Эксп(вх) 12.03', NULL, NULL, '"РД" 30.06', NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 'Севастополь(онко)', NULL, '', '  Эксп(вх) 2.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'Тропарево(поликл)', NULL, NULL, ' Эксп(вых) 23.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(24, 'Балашиха', NULL, 'Эксп(вых) 28.02', '"П"+"РД" 12.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, 'Ставрополь(кардиол)', NULL, 'Изыск. 20.02', NULL, 'Эксп(вх) 15.04', NULL, 'Эксп(вых) 04.06', NULL, '"РД" 06.08', NULL, NULL, NULL, NULL),
	(26, 'Свободный(роддом)', NULL, NULL, 'Эксп(вых) техн. 01.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, 'Альтравита', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 'Емельяново(поликл)', NULL, NULL, 'Эксп(вх) 02.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 'Челябинск(поликл)', NULL, NULL, 'Эксп(вых) 10.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(30, 'Калининград(онко)', 'ГГЭ(вх) сметы 26.01', NULL, 'ГГЭ(вых) сметы 22.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 'Норильск(ПЦ)', NULL, NULL, ' Эксп(вых) 7.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(32, 'Улан-Удэ(ПЦ)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, 'Гатчина(ПЦ)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(34, 'Петрозаводск(ПЦ)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(35, 'Псков(ПЦ)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, 'Дон', NULL, '', ' "РД" 19.03', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(37, 'Тыва(больн)', NULL, NULL, 'Изыск 15.03', NULL, NULL, 'Эксп(вх) 28.06', NULL, NULL, NULL, NULL, NULL, NULL),
	(38, 'Ставрополь(детская)', NULL, NULL, ' Эксп(вых) 27.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(39, 'Севастополь(инф)', NULL, NULL, ' Сметы 26.03', NULL, NULL, NULL, ' "РД" 20.07', NULL, NULL, NULL, NULL, NULL),
	(40, 'Никол. на Амуре(леч.корп.)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, 'Комс. на Амуре(детская)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(42, 'Комс. на Амуре(онко)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, 'Хабаровск(поликл)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, 'Подольск(детский)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, 'Пермь-научный центр', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, 'Якутия(онко)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, 'Чебоксары(инф)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `maintable` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.objects
CREATE TABLE IF NOT EXISTS `objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gip_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы giprotable.objects: ~36 rows (приблизительно)
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
REPLACE INTO `objects` (`id`, `name`, `gip_id`) VALUES
	(1, 'Севастополь (псих)', 4),
	(2, 'Ховрино(поликл)', 3),
	(3, 'Качуг(поликл)', 5),
	(4, 'Тула (ПЦ)', 3),
	(5, 'Боткинская', 6),
	(6, 'Сочи (ПЦ)', 5),
	(7, 'Тулун (туберкул.)', 5),
	(8, 'Ставрополь(хирург)', 2),
	(9, 'Севастополь(онко)', 4),
	(10, 'Тропарево(поликл)', 3),
	(11, 'Балашиха', 3),
	(12, 'Ставрополь(кардиол)', 2),
	(13, 'Свободный(роддом)', 2),
	(14, 'Альтравита', 3),
	(15, 'Емельяново(поликл)', 6),
	(16, 'Челябинск(поликл)', 6),
	(17, 'Калининград(онко)', 2),
	(18, 'Норильск(ПЦ)', 6),
	(19, 'Улан-Удэ(ПЦ)', 6),
	(20, 'Гатчина(ПЦ)', 6),
	(21, 'Петрозаводск(ПЦ)', 5),
	(22, 'Псков(ПЦ)', NULL),
	(23, 'Дон', 4),
	(24, 'Тыва(больн)', 5),
	(25, 'Ставрополь(детская)', 4),
	(26, 'Севастополь(инф)', 4),
	(27, 'Никол. на Амуре(леч.корп.)', 2),
	(28, 'Комс. на Амуре(детская)', 2),
	(29, 'Комс. на Амуре(онко)', 2),
	(30, 'Хабаровск(поликл)', 2),
	(31, 'Подольск(детский)', 3),
	(32, 'Пермь-научный центр', 5),
	(33, 'Якутия(онко)', 4),
	(34, 'Чебоксары(инф)', 2),
	(57, 'Краснодар(радиолог)', NULL),
	(58, 'Смоленск(ПЦ)', 4),
	(59, 'Севастополь(БСМП)', 4),
	(60, 'ГЛОРИ', NULL);
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.plancontrol
CREATE TABLE IF NOT EXISTS `plancontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT '0',
  `pos_num` int(11) DEFAULT '0',
  `progress` int(11) DEFAULT '0',
  `pz` int(11) DEFAULT NULL,
  `gh` int(11) DEFAULT NULL,
  `sp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.plancontrol: ~25 rows (приблизительно)
/*!40000 ALTER TABLE `plancontrol` DISABLE KEYS */;
REPLACE INTO `plancontrol` (`id`, `object_id`, `pos_num`, `progress`, `pz`, `gh`, `sp`) VALUES
	(176, 1, 1, 100, 1, 1, 1),
	(177, 1, 2, 100, 1, 1, 1),
	(178, 1, 3, 100, 1, 1, 1),
	(179, 1, 4, 100, 1, 1, 1),
	(180, 1, 5, 100, 1, 1, 1),
	(181, 1, 6, 60, 1, 1, NULL),
	(182, 1, 7, 70, NULL, 1, 1),
	(183, 2, 1, 100, 1, 1, 1),
	(184, 2, 2, 100, 1, 1, 1),
	(185, 2, 3, 100, 1, 1, 1),
	(186, 2, 4, 100, 1, 1, 1),
	(187, 2, 5, 100, 1, 1, 1),
	(188, 2, 6, 100, 1, 1, 1),
	(189, 2, 7, 100, 1, 1, 1),
	(190, 2, 8, 100, 1, 1, 1),
	(191, 2, 9, 100, 1, 1, 1),
	(192, 3, 1, 60, 1, 1, NULL),
	(193, 3, 2, 30, 1, NULL, NULL),
	(194, 3, 3, 30, NULL, 1, NULL),
	(195, 3, 4, 70, 1, NULL, 1),
	(196, 3, 5, 70, NULL, 1, 1),
	(197, 4, 1, 30, 1, NULL, NULL),
	(198, 4, 2, 30, NULL, 1, NULL),
	(199, 4, 3, 40, NULL, NULL, 1),
	(200, 2, 10, 30, NULL, 1, NULL),
	(201, 1, 1, 30, NULL, 1, NULL),
	(202, 1, 1, 70, NULL, 1, 1),
	(203, 1, 1, 70, NULL, 1, 1),
	(204, 7, 1, 40, NULL, NULL, 1),
	(205, 7, 3, 30, NULL, 1, NULL),
	(206, 7, 6, 30, 1, NULL, NULL),
	(207, 8, 2, 30, NULL, 1, NULL),
	(208, 8, 4, 40, NULL, NULL, 1);
/*!40000 ALTER TABLE `plancontrol` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.plancontrolR
CREATE TABLE IF NOT EXISTS `plancontrolR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT '0',
  `pos_num` int(11) DEFAULT '0',
  `progress` int(11) DEFAULT NULL,
  `gh` int(11) DEFAULT NULL,
  `sp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.plancontrolR: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `plancontrolR` DISABLE KEYS */;
REPLACE INTO `plancontrolR` (`id`, `object_id`, `pos_num`, `progress`, `gh`, `sp`) VALUES
	(1, 1, 1, 100, 1, 1),
	(2, 1, 2, 100, 1, 1),
	(3, 1, 5, 100, 1, 1),
	(4, 1, 3, 100, 1, 1),
	(5, 1, 4, 100, 1, 1),
	(6, 2, 1, 100, 1, 1),
	(7, 2, 2, 100, 1, 1),
	(8, 2, 5, 50, NULL, 1),
	(9, 6, 1, 100, 1, 1),
	(10, 6, 3, 50, NULL, 1),
	(11, 6, 5, 50, 1, NULL),
	(12, 7, 1, 50, NULL, 1),
	(13, 7, 2, 50, 1, NULL),
	(14, 7, 4, 50, NULL, 1),
	(15, 7, 6, 50, NULL, 1),
	(16, 8, 2, 50, NULL, 1),
	(17, 8, 5, 50, 1, NULL);
/*!40000 ALTER TABLE `plancontrolR` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.plans
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `date_start` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы giprotable.plans: ~56 rows (приблизительно)
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
REPLACE INTO `plans` (`id`, `object_id`, `name`, `date_start`) VALUES
	(1, 1, 'ВОП 31.01', '2018-01-01'),
	(2, 2, 'Согл. &#34;П&#34; 21.01', '2018-01-01'),
	(3, 17, 'ГГЭ(вх) сметы 26.01', '2018-01-01'),
	(4, 1, 'Изыск. 28.02', '2018-02-01'),
	(6, 3, 'Эксп(экол) 02.02', '2018-02-01'),
	(7, 4, 'Эксп(вх) 12.02', '2018-02-01'),
	(8, 6, 'Корр. &#34;П&#34;+&#34;РД&#34; 16.02', '2018-02-01'),
	(9, 7, 'Эксп(вых) 11.02', '2018-02-01'),
	(10, 11, 'Эксп(вых) 28.02', '2018-02-01'),
	(11, 12, 'Изыск. 20.02', '2018-02-01'),
	(12, 1, ' &#34;П&#34; 31.03', '2018-03-01'),
	(17, 8, 'Эксп(вх) 12.03', '2018-03-01'),
	(18, 9, '  Эксп(вх) 2.03', '2018-03-01'),
	(19, 10, ' Эксп(вых) 23.03', '2018-03-01'),
	(20, 11, '&#34;П&#34;+&#34;РД&#34; 12.03', '2018-03-01'),
	(21, 13, 'Эксп(вых) техн. 01.03', '2018-03-01'),
	(22, 15, 'Эксп(вх) 30.03', '2018-03-01'),
	(23, 16, 'Эксп(вх) 30..03', '2018-03-01'),
	(24, 17, 'ГГЭ(вых) сметы 22.03', '2018-03-01'),
	(25, 18, ' Эксп(вых) 7.03', '2018-03-01'),
	(26, 23, ' &#34;РД&#34; 30..03', '2018-03-01'),
	(27, 24, 'Изыск 15.03', '2018-03-01'),
	(28, 25, ' Эксп(вых) 27.03', '2018-03-01'),
	(29, 26, ' Сметы 26.03', '2018-03-01'),
	(30, 1, 'Эксп(вх)31.04', '2018-04-01'),
	(31, 7, '&#34;РД&#34; 17.04', '2018-04-01'),
	(32, 12, 'Эксп(вх) 15.04', '2018-04-01'),
	(33, 4, '&#34;П&#34;+&#34;РД&#34; 21.05', '2018-05-01'),
	(34, 7, 'Эксп(вых) смет 16.06', '2018-06-01'),
	(35, 12, 'Эксп(вых) 04.06', '2018-06-01'),
	(36, 24, 'Эксп(вх) 28.06', '2018-06-01'),
	(37, 26, ' &#34;РД&#34; 20.07', '2018-07-01'),
	(38, 1, '&#34;РД&#34; 31.08', '2018-08-01'),
	(39, 2, 'РД 21.08', '2018-08-01'),
	(40, 1, '&#34;РД&#34;+&#34;П&#34; 11.09', '2018-09-01'),
	(41, 12, '&#34;РД&#34; 06.08', '2018-08-01'),
	(56, 4, '', '2018-07-01'),
	(60, 26, '', '2018-05-01'),
	(61, 27, '', '2018-05-01'),
	(62, 28, '', '2018-04-01'),
	(72, 41, 'sdsd123&#34;s2', '2018-02-01'),
	(74, 43, '23', '2018-01-01'),
	(75, 43, '123222', '2018-03-01'),
	(76, 43, '12&#34;12&#39;2', '2018-02-01'),
	(77, 2, '', '2018-03-01'),
	(78, 57, 'ГГЭ (вых) 26.04', '2018-04-01'),
	(79, 2, 'Эксп(вх) 15.05', '2018-05-01'),
	(80, 3, 'П 6.04', '2018-04-01'),
	(81, 4, 'Эксп(вых) 28.03', '2018-03-01'),
	(82, 4, 'ГГЭ(вх) 4.04', '2018-04-01'),
	(83, 5, 'Эксп(вх) 15.05', '2018-05-01'),
	(84, 6, 'Эксп(вх) 30.03', '2018-03-01'),
	(85, 8, 'Эксп(вых) 1.04', '2018-04-01'),
	(86, 8, 'РД 30.06', '2018-06-01'),
	(87, 20, 'Эксп(вх) 30.03', '2018-03-01'),
	(88, 58, 'Эксп(вх) 21.03', '2018-03-01');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
