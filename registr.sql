-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2021 г., 12:00
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `registr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `my_users`
--

CREATE TABLE `my_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `names` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_users`
--

INSERT INTO `my_users` (`id`, `username`, `names`, `password`, `salt`) VALUES
(1, 'user@user.ru', 'Пользователь', 'e4fb244e0a21a1ff4b0e8d6e5e3277f9', '5ecb8f6a29647'),
(2, 'terminal@terminal.ru', 'Терминал', '0803299da2fa157cde9942abb3796e6c', '5ecbe4d26c850'),
(3, 'info@info.ru', 'Табло', 'a7627906ca8f62fabb61b0fb5391629d', '5ecc3c8d35ba0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `code` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `okno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`code`, `date`, `okno`) VALUES
(1024, '2020-06-16 17:30:24', 'Окно №3'),
(1083, '2020-06-16 17:31:55', 'Окно №3'),
(5377, '2020-06-16 17:31:52', 'Окно №1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `my_users`
--
ALTER TABLE `my_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
