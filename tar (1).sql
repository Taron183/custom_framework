-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2017 г., 20:07
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `friend_id` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friend`
--

INSERT INTO `friend` (`id`, `user_id`, `friend_id`, `status`) VALUES
(3, '29', '30', '1'),
(6, '31', '30', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_id` varchar(255) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `new` varchar(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `text`, `data`, `from_id`, `to_id`, `new`) VALUES
(129, 'safas', '2017-12-27 13:03:34', '30', '29', '1'),
(130, 'dasdas', '2017-12-27 13:07:34', '29', '30', '1'),
(137, 'jio', '2017-12-27 15:29:50', '31', '30', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `avatar`, `time`) VALUES
(29, 'Taron', 'Suvaryan', 'taronsuvaryan@mail.ru', '698d51a19d8a121ce581499d7b701668', 'male', '0448977a6d5f23168402e00af796fc85.jpg', ''),
(30, 'Mari', 'Hakobyan', 'mari@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'male', NULL, ''),
(31, 'Nare', 'HHHH', 'nare@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'female', NULL, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
