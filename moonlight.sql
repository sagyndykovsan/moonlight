-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 22 2022 г., 04:07
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `moonlight`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`role`, `username`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date DEFAULT NULL
) ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `lastname`, `gender`, `birthday`) VALUES
('admin', '$2y$10$Q8eOOcjsV5LVxKGrrwa5MuOKimOdtkQY3DSdvb9W.waAwBY67qZoe', 'Alex', 'Murphy', 'male', '2002-04-11'),
('delorial', '$2y$10$yWOW4fgMzJ0fHLFsOKXFV.sDBKr89Qk93px2M2MJyBJ5sFMVqVrKa', 'Natalie', 'Johnson', 'male', '1997-07-12'),
('flower', '$2y$10$eGg6XWpngfmq2V/IHwv0Te9/aR5cqzEPklTJeJIeGdDRPBj98NK6W', 'Tachibana', 'Aoy', 'female', '2005-01-12'),
('stevecrypto', '$2y$10$r10XKb5dXnPv7/ZFDYJhdeUNkdt9K.w2fiyPXRzXLi5nIOqTxa4h2', 'Steve', 'Jobs', 'male', '2022-01-02'),
('yutokun', '$2y$10$.99g6n3CTgn20nmAIHue3O8hIhfKjwbUYIiwfOKEhCFwwMH9Q9BOu', 'Yuto', 'Uzui', 'male', '2002-05-18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD KEY `username` (`username`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
