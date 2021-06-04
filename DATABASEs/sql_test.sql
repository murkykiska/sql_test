-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2021 г., 13:17
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sql_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dmapr`
--

CREATE TABLE `dmapr` (
  `ID` int(11) NOT NULL COMMENT 'ИД записи',
  `UIN_PTS` int(11) DEFAULT NULL COMMENT 'ИД прицепа',
  `PERGR` int(11) DEFAULT NULL COMMENT 'Объем первезенного груза',
  `DML_ID` int(11) DEFAULT NULL COMMENT 'ИД путевого листа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dmapr`
--

INSERT INTO `dmapr` (`ID`, `UIN_PTS`, `PERGR`, `DML_ID`) VALUES
(10, 12, 100, 2),
(11, 12, 150, 2),
(12, 11, 100, 3),
(13, 10, 50, 2),
(14, 10, 70, 4),
(15, 10, 100, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `dmlavt`
--

CREATE TABLE `dmlavt` (
  `ID` int(11) NOT NULL COMMENT 'ИД записи',
  `UIN` int(11) DEFAULT NULL COMMENT 'Ссылка на номер ТС (таблица PTS)',
  `SERPL` int(11) NOT NULL COMMENT 'Номер, серия путевого листа',
  `DATA` date NOT NULL COMMENT 'Дата выдачи путевого листа',
  `DATARET` date NOT NULL COMMENT 'Дата сдачи путевого листа',
  `TIMEBEG` time NOT NULL COMMENT 'Время выезда',
  `TIMEEND` time NOT NULL COMMENT 'Время заезда',
  `WORKTIME` int(11) NOT NULL COMMENT 'Общее время работы',
  `PROSTOY` int(11) NOT NULL COMMENT 'Общее время простоя',
  `PROSTOYTPR` int(11) NOT NULL COMMENT 'Простой по тех. причинам',
  `PROSTOYGR` int(11) NOT NULL COMMENT 'Простой под погрузкой/разгрузкой',
  `SPEEDB` int(11) NOT NULL COMMENT 'Показание спидометра при выезде',
  `SPEEDE` int(11) NOT NULL COMMENT 'Показание спидометра при возвращении',
  `TOPID` int(11) NOT NULL COMMENT 'Вид топлива',
  `TOSTV` int(11) NOT NULL COMMENT 'Наличие топлива - остаток при выезде',
  `TV` int(11) NOT NULL COMMENT 'Наличие топлива - выдано',
  `TS` int(11) NOT NULL COMMENT 'Наличие топлива - сдано',
  `TOVZ` int(11) NOT NULL COMMENT 'Наличие топлива - остаток при возвращении',
  `PERGR` int(11) DEFAULT NULL COMMENT 'Объем перевезеноого груза',
  `PERGRTKM` int(11) NOT NULL COMMENT 'Перевезено грузов, в тоннокилометрах'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dmlavt`
--

INSERT INTO `dmlavt` (`ID`, `UIN`, `SERPL`, `DATA`, `DATARET`, `TIMEBEG`, `TIMEEND`, `WORKTIME`, `PROSTOY`, `PROSTOYTPR`, `PROSTOYGR`, `SPEEDB`, `SPEEDE`, `TOPID`, `TOSTV`, `TV`, `TS`, `TOVZ`, `PERGR`, `PERGRTKM`) VALUES
(2, 7, 101, '2021-05-09', '2021-05-13', '10:17:00', '09:17:00', 4, 2, 1, 1, 50, 55, 1, 5, 50, 30, 10, 650, 3),
(3, 8, 102, '2021-06-01', '2021-06-02', '11:23:00', '11:23:00', 4, 2, 1, 1, 50, 55, 1, 5, 50, 30, 10, 200, 3),
(4, 8, 103, '2021-06-01', '2021-06-01', '11:34:00', '15:34:00', 4, 2, 1, 1, 50, 55, 1, 5, 50, 30, 10, 500, 3),
(5, 8, 101, '2022-05-05', '2022-05-27', '14:39:00', '14:41:00', 4, 2, 1, 1, 50, 55, 1, 5, 50, 30, 10, 606, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `pts`
--

CREATE TABLE `pts` (
  `UIN` int(11) NOT NULL COMMENT 'Уникальный номер ТС',
  `UNTS` int(11) NOT NULL COMMENT 'Учетный номер ТС (ГИБДД)',
  `TID` int(11) DEFAULT NULL COMMENT 'ИД типа ТС (ссылка на TIPTR)',
  `FIRMID` int(11) DEFAULT NULL COMMENT 'ИД предприятия (ссылка на V_FIRM)',
  `GRP` int(11) NOT NULL COMMENT 'Грузоподъемность',
  `NORMT` int(11) NOT NULL COMMENT 'Норматив расхода топлива',
  `DATASP` date DEFAULT NULL COMMENT 'Дата списания ТС'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pts`
--

INSERT INTO `pts` (`UIN`, `UNTS`, `TID`, `FIRMID`, `GRP`, `NORMT`, `DATASP`) VALUES
(7, 1002, 3, 2, 100, 50, '2021-06-10'),
(8, 1003, 3, 2, 50, 7, '2021-06-10'),
(9, 1004, 1, 1, 50, 5, '0000-00-00'),
(10, 1005, 3, 1, 600, 10, '0000-00-00'),
(11, 1006, 4, 1, 600, 10, '0000-00-00'),
(12, 1007, 5, 3, 600, 10, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `tiptr`
--

CREATE TABLE `tiptr` (
  `TID` int(11) NOT NULL COMMENT 'ИД типа ТС',
  `TNAME` varchar(200) NOT NULL COMMENT 'Наименование типа',
  `VIDT` int(11) DEFAULT NULL COMMENT 'ИД вида ТС (ссылка на VIDTC)',
  `PRIZNGR` varchar(200) NOT NULL COMMENT 'Признак грузового ТС'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tiptr`
--

INSERT INTO `tiptr` (`TID`, `TNAME`, `VIDT`, `PRIZNGR`) VALUES
(1, 'Большой фургон', 1, 'Большой'),
(3, 'Большой камаз', 2, 'Большой'),
(4, 'Маленький камаз', 2, 'Маленький'),
(5, 'Большой грузовик', 4, 'Большой');

-- --------------------------------------------------------

--
-- Структура таблицы `vidtc`
--

CREATE TABLE `vidtc` (
  `VIDT` int(11) NOT NULL COMMENT 'ИД вида ТС',
  `SHNAME` varchar(200) NOT NULL COMMENT 'Краткое наименование',
  `FULLNAME` varchar(800) NOT NULL COMMENT 'Полное наименование'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vidtc`
--

INSERT INTO `vidtc` (`VIDT`, `SHNAME`, `FULLNAME`) VALUES
(1, 'Ф', 'Фургон'),
(2, 'К', 'Камаз'),
(4, 'Г', 'Грузовик');

-- --------------------------------------------------------

--
-- Структура таблицы `v_firm`
--

CREATE TABLE `v_firm` (
  `FIRMID` int(11) NOT NULL COMMENT 'ИД предприятия',
  `TLGR` varchar(200) NOT NULL COMMENT 'Наименование',
  `DISLOC` varchar(200) NOT NULL COMMENT 'Географ. расположение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `v_firm`
--

INSERT INTO `v_firm` (`FIRMID`, `TLGR`, `DISLOC`) VALUES
(1, 'Полярная звезда', 'Россия, г. Новосибирск'),
(2, 'Скорпион', 'Россия, г. Новгород'),
(3, 'Малая медведица', 'Россия, г. Омск');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dmapr`
--
ALTER TABLE `dmapr`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UIN_PTS` (`UIN_PTS`,`DML_ID`),
  ADD KEY `PERGR` (`PERGR`),
  ADD KEY `DML_ID` (`DML_ID`);

--
-- Индексы таблицы `dmlavt`
--
ALTER TABLE `dmlavt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UIN` (`UIN`),
  ADD KEY `PERGR` (`PERGR`);

--
-- Индексы таблицы `pts`
--
ALTER TABLE `pts`
  ADD PRIMARY KEY (`UIN`),
  ADD KEY `TID` (`TID`,`FIRMID`),
  ADD KEY `FIRMID` (`FIRMID`);

--
-- Индексы таблицы `tiptr`
--
ALTER TABLE `tiptr`
  ADD PRIMARY KEY (`TID`),
  ADD KEY `VIDT` (`VIDT`);

--
-- Индексы таблицы `vidtc`
--
ALTER TABLE `vidtc`
  ADD PRIMARY KEY (`VIDT`);

--
-- Индексы таблицы `v_firm`
--
ALTER TABLE `v_firm`
  ADD PRIMARY KEY (`FIRMID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dmapr`
--
ALTER TABLE `dmapr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД записи', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `dmlavt`
--
ALTER TABLE `dmlavt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД записи', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `pts`
--
ALTER TABLE `pts`
  MODIFY `UIN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Уникальный номер ТС', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tiptr`
--
ALTER TABLE `tiptr`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД типа ТС', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `vidtc`
--
ALTER TABLE `vidtc`
  MODIFY `VIDT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД вида ТС', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `v_firm`
--
ALTER TABLE `v_firm`
  MODIFY `FIRMID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД предприятия', AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dmapr`
--
ALTER TABLE `dmapr`
  ADD CONSTRAINT `dmapr_ibfk_1` FOREIGN KEY (`UIN_PTS`) REFERENCES `pts` (`UIN`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `dmapr_ibfk_3` FOREIGN KEY (`DML_ID`) REFERENCES `dmlavt` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dmlavt`
--
ALTER TABLE `dmlavt`
  ADD CONSTRAINT `dmlavt_ibfk_1` FOREIGN KEY (`UIN`) REFERENCES `pts` (`UIN`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pts`
--
ALTER TABLE `pts`
  ADD CONSTRAINT `pts_ibfk_1` FOREIGN KEY (`FIRMID`) REFERENCES `v_firm` (`FIRMID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pts_ibfk_2` FOREIGN KEY (`TID`) REFERENCES `tiptr` (`TID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tiptr`
--
ALTER TABLE `tiptr`
  ADD CONSTRAINT `tiptr_ibfk_1` FOREIGN KEY (`VIDT`) REFERENCES `vidtc` (`VIDT`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
