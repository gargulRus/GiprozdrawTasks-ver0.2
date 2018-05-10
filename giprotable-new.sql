-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных giprotable
CREATE DATABASE IF NOT EXISTS `giprotable` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `giprotable`;

-- Дамп структуры для таблица giprotable.curators
CREATE TABLE IF NOT EXISTS `curators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.curators: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `curators` DISABLE KEYS */;
REPLACE INTO `curators` (`id`, `cur_name`) VALUES
	(1, ' '),
	(6, 'Левин'),
	(7, 'Мурашова'),
	(8, 'Крюков');
/*!40000 ALTER TABLE `curators` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.experts
CREATE TABLE IF NOT EXISTS `experts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.experts: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `experts` DISABLE KEYS */;
REPLACE INTO `experts` (`id`, `exp_name`) VALUES
	(1, ' '),
	(6, 'Абрамов'),
	(7, 'Ломтадзе'),
	(8, 'Додонова'),
	(9, 'Малюхов');
/*!40000 ALTER TABLE `experts` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.gips
CREATE TABLE IF NOT EXISTS `gips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gipname` varchar(255) COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы giprotable.gips: ~6 rows (приблизительно)
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
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.jobplan: ~126 rows (приблизительно)
/*!40000 ALTER TABLE `jobplan` DISABLE KEYS */;
REPLACE INTO `jobplan` (`id`, `object_id`, `pos_num`, `data`) VALUES
	(5, 2, 1, '2018-01-10'),
	(6, 2, 2, '2018-04-27'),
	(7, 2, 3, '2018-05-14'),
	(8, 2, 4, '2018-07-14'),
	(9, 2, 5, '2018-06-15'),
	(10, 2, 6, '2018-07-20'),
	(13, 3, 1, '2018-01-10'),
	(14, 3, 2, '2018-04-06'),
	(17, 3, 3, '2018-04-16'),
	(18, 3, 4, '2018-06-16'),
	(19, 1, 1, '2018-01-10'),
	(20, 1, 2, '2018-04-30'),
	(23, 7, 1, '2018-01-10'),
	(24, 7, 2, '2018-04-06'),
	(25, 7, 5, '2018-06-01'),
	(26, 7, 6, '2018-07-01'),
	(29, 8, 5, '2018-04-01'),
	(30, 8, 6, '2018-06-30'),
	(31, 8, 3, '2018-02-20'),
	(32, 8, 4, '2018-04-01'),
	(33, 5, 1, '2018-01-01'),
	(34, 5, 2, '2018-04-27'),
	(35, 5, 3, '2018-05-14'),
	(36, 5, 4, '2018-07-14'),
	(37, 5, 5, '2018-06-10'),
	(38, 5, 6, '2018-08-10'),
	(42, 10, 3, '2018-01-18'),
	(43, 10, 4, '2018-04-03'),
	(44, 10, 5, '2018-04-03'),
	(45, 10, 6, '2018-05-25'),
	(46, 1, 3, '2018-04-30'),
	(47, 1, 4, '2018-06-30'),
	(48, 1, 5, '2018-07-01'),
	(49, 1, 6, '2018-09-01'),
	(50, 4, 3, '2018-04-01'),
	(51, 4, 4, '2018-06-01'),
	(52, 3, 5, '2018-06-01'),
	(53, 3, 6, '2018-07-01'),
	(54, 6, 1, '2018-03-28'),
	(55, 6, 2, '2018-04-13'),
	(56, 6, 3, '2018-04-16'),
	(57, 6, 4, '2018-06-16'),
	(58, 7, 3, '2018-04-16'),
	(59, 7, 4, '2018-06-16'),
	(60, 9, 3, '2018-03-10'),
	(61, 9, 4, '2018-05-31'),
	(62, 9, 5, '2018-07-01'),
	(63, 9, 6, '2018-09-01'),
	(64, 11, 3, '2018-04-02'),
	(65, 11, 4, '2018-04-27'),
	(66, 11, 5, '2018-04-01'),
	(67, 11, 6, '2018-04-27'),
	(68, 12, 1, '2018-01-15'),
	(69, 12, 2, '2018-04-15'),
	(70, 12, 3, '2018-04-15'),
	(71, 12, 4, '2018-06-04'),
	(72, 12, 5, '2018-06-04'),
	(73, 12, 6, '2018-08-06'),
	(74, 13, 3, '2018-04-16'),
	(75, 13, 4, '2018-06-16'),
	(76, 13, 5, '2018-07-15'),
	(77, 13, 6, '2018-08-15'),
	(78, 14, 1, '2018-01-10'),
	(79, 14, 2, '2018-05-18'),
	(80, 14, 3, '2018-05-21'),
	(81, 14, 4, '2018-08-03'),
	(82, 14, 5, '2018-08-06'),
	(83, 14, 6, '2018-12-21'),
	(84, 15, 3, '2018-04-28'),
	(85, 15, 4, '2018-06-28'),
	(86, 17, 3, '2018-01-15'),
	(87, 17, 4, '2018-03-21'),
	(88, 21, 3, '2018-02-01'),
	(89, 21, 4, '2018-04-30'),
	(90, 22, 3, '2018-03-15'),
	(91, 22, 4, '2018-04-30'),
	(92, 23, 5, '2018-01-10'),
	(93, 23, 6, '2018-04-16'),
	(94, 24, 1, '2018-02-01'),
	(95, 24, 2, '2018-05-20'),
	(96, 24, 3, '2018-05-25'),
	(97, 24, 4, '2018-07-25'),
	(98, 24, 5, '2018-07-15'),
	(99, 24, 6, '2018-09-15'),
	(100, 26, 5, '2018-04-01'),
	(101, 26, 6, '2018-07-20'),
	(102, 27, 5, '2018-10-01'),
	(103, 27, 6, '2018-12-01'),
	(104, 29, 5, '2018-09-01'),
	(105, 29, 6, '2018-11-01'),
	(106, 30, 5, '2018-08-01'),
	(107, 30, 6, '2018-10-01'),
	(108, 31, 5, '2018-04-01'),
	(109, 31, 6, '2018-12-21'),
	(110, 59, 1, '2018-04-01'),
	(111, 59, 2, '2018-06-01'),
	(112, 59, 3, '2018-06-01'),
	(113, 59, 4, '2018-08-10'),
	(114, 60, 5, '2018-02-01'),
	(115, 60, 6, '2018-04-30'),
	(116, 59, 5, '2018-08-01'),
	(117, 59, 6, '2018-09-15'),
	(118, 17, 5, '2018-07-01'),
	(119, 17, 6, '2018-12-01'),
	(120, 16, 3, '2018-04-12'),
	(121, 16, 4, '2018-06-16'),
	(122, 18, 3, '2018-04-27'),
	(123, 18, 4, '2018-06-27'),
	(124, 19, 5, '2018-01-10'),
	(125, 19, 6, '2018-05-31'),
	(126, 20, 3, '2018-02-10'),
	(127, 20, 4, '2018-04-27'),
	(128, 25, 3, '2018-02-10'),
	(129, 25, 4, '2018-05-11'),
	(130, 34, 3, '2018-02-20'),
	(131, 34, 4, '2018-04-20'),
	(132, 68, 1, '2018-04-16'),
	(133, 68, 2, '2018-07-31'),
	(134, 68, 3, '2018-08-01'),
	(135, 68, 4, '2018-09-28'),
	(136, 68, 5, '2018-09-29'),
	(137, 68, 6, '2018-11-30'),
	(142, 57, 1, '2018-03-14'),
	(143, 57, 2, '2018-04-15'),
	(144, 70, 1, '2018-01-10'),
	(145, 70, 2, '2018-05-30');
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

-- Дамп данных таблицы giprotable.maintable: ~34 rows (приблизительно)
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
  `cur_id` int(11) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы giprotable.objects: ~38 rows (приблизительно)
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
REPLACE INTO `objects` (`id`, `name`, `gip_id`, `cur_id`, `exp_id`) VALUES
	(1, 'Севастополь (псих)', 4, 7, 8),
	(2, 'Ховрино(поликл)', 3, 6, 6),
	(3, 'Качуг(поликл)', 5, 8, 8),
	(4, 'Тула (ПЦ)', 3, 6, 9),
	(5, 'Боткинская', 6, 6, 6),
	(6, 'Сочи (ПЦ)', 5, 8, NULL),
	(7, 'Тулун (туберкул.)', 5, 8, 8),
	(8, 'Ставрополь(хирург)', 2, 7, 9),
	(9, 'Севастополь(онко)', 4, 7, 7),
	(10, 'Тропарево(поликл)', 3, 6, 6),
	(11, 'Балашиха', 3, 6, 6),
	(12, 'Ставрополь(кардиол)', 2, 7, 9),
	(13, 'Свободный(роддом)', 5, 8, 9),
	(14, 'Альтравита', 3, 7, 6),
	(15, 'Емельяново(поликл)', 6, 8, 9),
	(16, 'Челябинск(поликл)', 6, 7, 6),
	(17, 'Калининград(онко)', 2, 6, NULL),
	(18, 'Норильск(ПЦ)', 6, 8, NULL),
	(19, 'Улан-Удэ(ПЦ)', 6, 8, NULL),
	(20, 'Гатчина(ПЦ)', 6, 8, 8),
	(21, 'Петрозаводск(ПЦ)', 5, 8, NULL),
	(22, 'Смоленск(ПЦ)', 4, 8, NULL),
	(23, 'Дон', 4, 6, NULL),
	(24, 'Тыва(больн)', 5, 8, NULL),
	(25, 'Ставрополь(детская)', 4, 7, 9),
	(26, 'Севастополь(инф)', 4, 7, 8),
	(27, 'Никол. на Амуре(леч.корп.)', 2, 8, NULL),
	(29, 'Комс. на Амуре(онко)', 2, 8, NULL),
	(30, 'Хабаровск(поликл)', 2, 8, NULL),
	(31, 'Подольск(детский)', 3, 6, 6),
	(32, 'Пермь-научный центр', 5, 7, NULL),
	(33, 'Якутия(онко)', 4, 8, NULL),
	(34, 'Чебоксары(инф)', 2, 8, NULL),
	(57, 'ГЛОРИЯ', 6, 6, 6),
	(59, 'Севастополь(БСМП)', 4, 7, NULL),
	(60, 'Комс. на Амуре(детск)', 2, 8, NULL),
	(68, 'Буланаш (псих)', 6, 8, NULL),
	(70, 'Кусково(теплосеть)', 2, 6, 8);
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.plancontrol
CREATE TABLE IF NOT EXISTS `plancontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT '0',
  `pos_num` int(11) DEFAULT '0',
  `progress` int(11) DEFAULT '0',
  `notuse` int(11) DEFAULT '0',
  `pz` int(11) DEFAULT NULL,
  `gh` int(11) DEFAULT NULL,
  `sp` int(11) DEFAULT NULL,
  `ved` int(11) DEFAULT NULL,
  `veddecor` int(11) DEFAULT NULL,
  `pl` int(11) DEFAULT NULL,
  `fs` int(11) DEFAULT NULL,
  `3d` int(11) DEFAULT NULL,
  `attach` int(11) DEFAULT NULL,
  `calckr` int(11) DEFAULT NULL,
  `calcovnag` int(11) DEFAULT NULL,
  `calcnoise` int(11) DEFAULT NULL,
  `ovairbalance` int(11) DEFAULT NULL,
  `ovchar` int(11) DEFAULT NULL,
  `ovairvak` int(11) DEFAULT NULL,
  `ovdypp` int(11) DEFAULT NULL,
  `ovonelinepl` int(11) DEFAULT NULL,
  `ovpltp` int(11) DEFAULT NULL,
  `ovspvent` int(11) DEFAULT NULL,
  `ovsptp` int(11) DEFAULT NULL,
  `release` int(11) DEFAULT NULL,
  `calcppm` int(11) DEFAULT NULL,
  `sm` int(11) DEFAULT NULL,
  `prices` int(11) DEFAULT NULL,
  `arhgh` int(11) DEFAULT NULL,
  `arhpdf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.plancontrol: ~31 rows (приблизительно)
/*!40000 ALTER TABLE `plancontrol` DISABLE KEYS */;
REPLACE INTO `plancontrol` (`id`, `object_id`, `pos_num`, `progress`, `notuse`, `pz`, `gh`, `sp`, `ved`, `veddecor`, `pl`, `fs`, `3d`, `attach`, `calckr`, `calcovnag`, `calcnoise`, `ovairbalance`, `ovchar`, `ovairvak`, `ovdypp`, `ovonelinepl`, `ovpltp`, `ovspvent`, `ovsptp`, `release`, `calcppm`, `sm`, `prices`, `arhgh`, `arhpdf`) VALUES
	(83, 1, 2, 90, 0, 1, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
	(84, 1, 4, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(85, 1, 21, 90, 0, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(86, 1, 17, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(87, 1, 17, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(88, 1, 8, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(89, 1, 8, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(90, 1, 16, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(91, 1, 7, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(92, 1, 25, 90, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
	(93, 1, 23, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(94, 1, 9, 90, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
	(96, 1, 1, 60, 0, 0, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(97, 2, 3, 30, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(98, 3, 13, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(99, 3, 13, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(100, 3, 11, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(101, 3, 11, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(102, 2, 9, 49, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 0, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
	(103, 4, 2, 30, 0, 0, NULL, 0, NULL, 1, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(104, 3, 20, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(105, 1, 11, 90, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(106, 4, 11, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(107, 4, 11, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(108, 3, 2, 90, 0, 1, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(109, 2, 2, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(110, 2, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(111, 4, 9, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
	(112, 5, 2, 90, 0, 1, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(113, 5, 3, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(114, 5, 3, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `plancontrol` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.plancontrolR
CREATE TABLE IF NOT EXISTS `plancontrolR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT '0',
  `pos_num` int(11) DEFAULT '0',
  `progress` int(11) DEFAULT NULL,
  `notuse` int(11) DEFAULT NULL,
  `gh` int(11) DEFAULT NULL,
  `sp` int(11) DEFAULT NULL,
  `ved` int(11) DEFAULT NULL,
  `pl` int(11) DEFAULT NULL,
  `fs` int(11) DEFAULT NULL,
  `veddecor` int(11) DEFAULT NULL,
  `ovttlinfo` int(11) DEFAULT NULL,
  `ovairbalance` int(11) DEFAULT NULL,
  `ovchar` int(11) DEFAULT NULL,
  `ovairvak` int(11) DEFAULT NULL,
  `ovplvent` int(11) DEFAULT NULL,
  `ovschemevent` int(11) DEFAULT NULL,
  `ovspvent` int(11) DEFAULT NULL,
  `ovpltp` int(11) DEFAULT NULL,
  `ovschemetp` int(11) DEFAULT NULL,
  `ovsptp` int(11) DEFAULT NULL,
  `release` int(11) DEFAULT NULL,
  `itptm` int(11) DEFAULT NULL,
  `itpatm` int(11) DEFAULT NULL,
  `itpeom` int(11) DEFAULT NULL,
  `itpatmy` int(11) DEFAULT NULL,
  `avta` int(11) DEFAULT NULL,
  `avtapz` int(11) DEFAULT NULL,
  `avtapv` int(11) DEFAULT NULL,
  `avtadl` int(11) DEFAULT NULL,
  `sm` int(11) DEFAULT NULL,
  `prices` int(11) DEFAULT NULL,
  `arhgh` int(11) DEFAULT NULL,
  `arhpdf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.plancontrolR: ~28 rows (приблизительно)
/*!40000 ALTER TABLE `plancontrolR` DISABLE KEYS */;
REPLACE INTO `plancontrolR` (`id`, `object_id`, `pos_num`, `progress`, `notuse`, `gh`, `sp`, `ved`, `pl`, `fs`, `veddecor`, `ovttlinfo`, `ovairbalance`, `ovchar`, `ovairvak`, `ovplvent`, `ovschemevent`, `ovspvent`, `ovpltp`, `ovschemetp`, `ovsptp`, `release`, `itptm`, `itpatm`, `itpeom`, `itpatmy`, `avta`, `avtapz`, `avtapv`, `avtadl`, `sm`, `prices`, `arhgh`, `arhpdf`) VALUES
	(37, 1, 1, 100, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
	(38, 1, 2, 90, NULL, NULL, 1, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(39, 1, 9, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(40, 1, 8, 90, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, 1, 7, 90, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(42, 1, 13, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, 1, 18, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(44, 1, 16, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, 1, 16, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, 1, 3, 50, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, 2, 3, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, 2, 3, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(49, 2, 2, 90, NULL, NULL, 1, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(50, 3, 2, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(51, 3, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(52, 4, 2, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(53, 4, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(54, 5, 2, 70, NULL, NULL, 1, NULL, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(55, 2, 9, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(56, 2, 18, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL),
	(57, 3, 18, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
	(58, 4, 18, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
	(59, 4, 18, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 5, 3, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 5, 3, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(62, 10, 1, 90, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(63, 10, 2, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(64, 10, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `plancontrolR` ENABLE KEYS */;

-- Дамп структуры для таблица giprotable.planexpert
CREATE TABLE IF NOT EXISTS `planexpert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `pos_num` int(11) DEFAULT NULL,
  `exp_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы giprotable.planexpert: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `planexpert` DISABLE KEYS */;
REPLACE INTO `planexpert` (`id`, `object_id`, `pos_num`, `exp_num`) VALUES
	(3, 1, 4, 20),
	(4, 1, 13, 20),
	(5, 1, 9, 20);
/*!40000 ALTER TABLE `planexpert` ENABLE KEYS */;

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
