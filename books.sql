-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 24 2017 г., 11:34
-- Версия сервера: 5.6.29
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `t4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` bigint(20) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `__author_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `published` date DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=9785458313422 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`ISBN`, `title`, `published`, `cover`, `description`) VALUES
(5791300433, 'Будо рэнсю (Практика будо)', NULL, NULL, 'Уэсиба Морихэй (1883-1969) - великий мастер боевых искусств, создатель айкидо. "Будо рэнсю", первая из\r\nдвух книг Оосэнсэя, появилась в 1933 году и использовалась как пособие для преподавателя боевых искусств. Книга состоит из трёх разделов: наставлений в поэтической форме, изложения принципов будзюцу и систематического описания техник, снабжённого иллюстрациями. Содержание книги охватывает широкий спектр вопросов: от религиозно-философских аспектов будо и основ военной стратегии до нюансов отдельных приёмов.\r\nВ конце издания добавлен глоссарий японских терминов, встречающихся в тексте.\r\nКнига будет полезна всем практикующим айкидо и в особенности тем, кто желает прикоснуться к его истокам.\r\nНа русском языке публикуется впервые.'),
(9785458313421, 'Суфийское Послание о Свободе Духа', NULL, NULL, 'Книга "Суфийское Послание о Свободе Духа", в переводе с английского Андрея Балакина, представляет собой краткий очерк основ суфизма (мистическое течение в исламе), написанный выдающимся суфием нового времени и представляющий восточную индоиранскую ветвь суфизма. Книга адресована всем интересующимся духовной традицией Востока.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `ISBN` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9785458313422;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
