-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2021 г., 20:37
-- Версия сервера: 5.7.31
-- Версия PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zxc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agregat`
--

DROP TABLE IF EXISTS `agregat`;
CREATE TABLE IF NOT EXISTS `agregat` (
  `id_agragata` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `agragat_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_agragata`),
  UNIQUE KEY `id_agragata` (`id_agragata`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `agregat`
--

INSERT INTO `agregat` (`id_agragata`, `agragat_name`) VALUES
(1, 'Амортизатор'),
(2, 'Рычаг'),
(3, 'Цилиндр ДВС'),
(4, 'Сцепление'),
(5, 'КПП'),
(6, 'Глушитель');

-- --------------------------------------------------------

--
-- Структура таблицы `country_postav`
--

DROP TABLE IF EXISTS `country_postav`;
CREATE TABLE IF NOT EXISTS `country_postav` (
  `id_country` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Country` char(18) DEFAULT NULL,
  PRIMARY KEY (`id_country`),
  UNIQUE KEY `id_country` (`id_country`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country_postav`
--

INSERT INTO `country_postav` (`id_country`, `Country`) VALUES
(1, 'Россия'),
(2, 'Польша'),
(3, 'Германия'),
(4, 'Франция'),
(5, 'США'),
(6, 'Япония'),
(7, 'Корея');

-- --------------------------------------------------------

--
-- Структура таблицы `firma_postav`
--

DROP TABLE IF EXISTS `firma_postav`;
CREATE TABLE IF NOT EXISTS `firma_postav` (
  `id_firmi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firma` varchar(20) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_firmi`),
  UNIQUE KEY `id_firmi` (`id_firmi`),
  KEY `id_country` (`id_country`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `firma_postav`
--

INSERT INTO `firma_postav` (`id_firmi`, `firma`, `id_country`) VALUES
(1, 'АвтоВАЗ', 1),
(2, 'Мерседес-Бенз', 3),
(3, 'Тойота', 6),
(4, 'Рено', 4),
(5, 'Форд', 5),
(6, 'Вольксваген', 3),
(7, 'Хёндай', 7),
(8, 'Хонда', 6),
(9, 'БМВ', 3),
(10, 'Ауди', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `marka_avto`
--

DROP TABLE IF EXISTS `marka_avto`;
CREATE TABLE IF NOT EXISTS `marka_avto` (
  `id_marka` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marka` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_marka`),
  UNIQUE KEY `id_marka` (`id_marka`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marka_avto`
--

INSERT INTO `marka_avto` (`id_marka`, `Marka`) VALUES
(1, 'Приора'),
(2, 'Порш'),
(3, '2106'),
(4, '2107'),
(5, '2108'),
(6, '2109'),
(7, '2110'),
(8, '2111'),
(9, '2112'),
(10, 'Гранта'),
(11, 'Калина'),
(12, 'Веста'),
(13, 'M1'),
(14, 'M2'),
(15, 'M3'),
(16, 'M4'),
(17, 'M5'),
(18, 'X1'),
(19, 'X2'),
(20, 'X3'),
(21, 'X4'),
(22, 'X5'),
(23, 'X6'),
(24, 'X7'),
(25, 'X8'),
(26, 'A1'),
(27, 'A2'),
(28, 'A3'),
(29, 'A5'),
(30, 'A6'),
(31, 'A7'),
(32, 'Q1'),
(33, 'Q2'),
(34, 'Q3'),
(35, 'Q4'),
(36, 'Q5'),
(37, 'Q6'),
(38, 'Q7'),
(39, 'Q8');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) DEFAULT NULL,
  `Second_Name` char(18) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `First_Name`, `Second_Name`, `Phone`, `Datetime`) VALUES
(1, 'Эльмар', 'Байрамов', 79205, '2021-06-12 07:34:00');

-- --------------------------------------------------------

--
-- Структура таблицы `order_spares`
--

DROP TABLE IF EXISTS `order_spares`;
CREATE TABLE IF NOT EXISTS `order_spares` (
  `Comments` varchar(20) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `id_zapchasti` int(11) DEFAULT NULL,
  `id_pokupki` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pokupki`),
  UNIQUE KEY `id_pokupki` (`id_pokupki`),
  KEY `order_id` (`order_id`),
  KEY `id_zapchasti` (`id_zapchasti`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `postavshik`
--

DROP TABLE IF EXISTS `postavshik`;
CREATE TABLE IF NOT EXISTS `postavshik` (
  `id_postavshika` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_postavshika` varchar(20) DEFAULT NULL,
  `street_postavshika` varchar(20) DEFAULT NULL,
  `House_postavshika` int(11) DEFAULT NULL,
  `id_firmi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_postavshika`),
  UNIQUE KEY `id_postavshika` (`id_postavshika`),
  KEY `id_firmi` (`id_firmi`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `postavshik`
--

INSERT INTO `postavshik` (`id_postavshika`, `city_postavshika`, `street_postavshika`, `House_postavshika`, `id_firmi`) VALUES
(1, 'Ногинск', 'Декабристов', 96, 1),
(2, 'Москва', 'Зоологическая', 34, 3),
(3, 'Ногинск', 'Декабристов', 96, 6),
(4, 'Липецк', 'Депутатская', 81, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `spares`
--

DROP TABLE IF EXISTS `spares`;
CREATE TABLE IF NOT EXISTS `spares` (
  `id_zapchasti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `zapchast_name` varchar(20) DEFAULT NULL,
  `id_firmi` int(11) DEFAULT NULL,
  `id_marka` int(11) DEFAULT NULL,
  `id_uzla` int(11) DEFAULT NULL,
  `id_agragata` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `kolichestvo` int(11) DEFAULT NULL,
  `zapchast_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_zapchasti`),
  UNIQUE KEY `id_zapchasti` (`id_zapchasti`),
  KEY `id_firmi` (`id_firmi`),
  KEY `id_marka` (`id_marka`),
  KEY `id_uzla` (`id_uzla`),
  KEY `id_agragata` (`id_agragata`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spares`
--

INSERT INTO `spares` (`id_zapchasti`, `zapchast_name`, `id_firmi`, `id_marka`, `id_uzla`, `id_agragata`, `Price`, `kolichestvo`, `zapchast_img`) VALUES
(1, 'Пружины', 1, 1, 1, 1, 4500, 500, 'prujina.jpg'),
(2, 'Поршневые кольца', 1, 1, 1, 1, 599, 500, 'kolca.jpg'),
(3, 'Опорный подшипник', 1, 1, 1, 1, 400, 500, 'poshipnik.jpg'),
(4, 'Поршень на приору', 1, 6, 2, 6, 400, 500, 'porshen.jpg'),
(5, 'ШРУС', 1, 9, 3, 4, 1500, 500, 'shrus.jpg'),
(6, 'Корзина сцепления', 1, 9, 3, 5, 1500, 500, 'sceplenie.jpg'),
(15, 'Поршень на Мерседес', 1, 1, 1, 1, 1, 1, 'porshen.jpg'),
(14, 'ячс', 1, 1, 1, 1, 1, 500, 'kolca.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `uzel`
--

DROP TABLE IF EXISTS `uzel`;
CREATE TABLE IF NOT EXISTS `uzel` (
  `id_uzla` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uzel_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_uzla`),
  UNIQUE KEY `id_uzla` (`id_uzla`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uzel`
--

INSERT INTO `uzel` (`id_uzla`, `uzel_name`) VALUES
(1, 'Подвеска'),
(2, 'ДВС'),
(3, 'Трансмиссия'),
(4, 'Система охлаждения'),
(5, 'Выхлопная система');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
