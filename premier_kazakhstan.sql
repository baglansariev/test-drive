-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 16 2019 г., 12:21
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `premier_kazakhstan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pk_agreement`
--

CREATE TABLE `pk_agreement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `signed` varchar(4) NOT NULL DEFAULT 'not',
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pk_albums`
--

CREATE TABLE `pk_albums` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `dir_path` text NOT NULL,
  `main_img` text CHARACTER SET utf32 NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pk_albums`
--

INSERT INTO `pk_albums` (`id`, `name`, `dir_path`, `main_img`, `user_id`, `date_insert`) VALUES
(39, 'Береке Алипбеков', 'disk:/Екі жұлдыз/Береке Алипбеков', 'disk:/Екі жұлдыз/Береке Алипбеков/photo/Aina_zhunisova.jpg', 21, '2019-08-16 08:33:18'),
(40, 'Testing album', 'disk:/Екі жұлдыз/Testing album', 'disk:/Екі жұлдыз/Testing album/photo/Aina_zhunisova.jpg', 21, '2019-08-16 08:44:39');

-- --------------------------------------------------------

--
-- Структура таблицы `pk_album_images`
--

CREATE TABLE `pk_album_images` (
  `id` int(11) NOT NULL,
  `img_url` text CHARACTER SET utf32 NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pk_album_images`
--

INSERT INTO `pk_album_images` (`id`, `img_url`, `album_id`) VALUES
(101, 'disk:/Екі жұлдыз/Береке Алипбеков/photo/Aina_zhunisova.jpg', 39),
(102, 'disk:/Екі жұлдыз/Береке Алипбеков/photo/5.jpg', 39),
(103, 'disk:/Екі жұлдыз/Testing album/photo/Aina_zhunisova.jpg', 40),
(104, 'disk:/Екі жұлдыз/Testing album/photo/5.jpg', 40);

-- --------------------------------------------------------

--
-- Структура таблицы `pk_album_videos`
--

CREATE TABLE `pk_album_videos` (
  `id` int(11) NOT NULL,
  `video_url` text NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pk_album_videos`
--

INSERT INTO `pk_album_videos` (`id`, `video_url`, `album_id`) VALUES
(1, 'disk:/Екі жұлдыз/Береке Алипбеков/video/test-video.mp4', 39),
(2, 'disk:/Екі жұлдыз/Testing album/video/test-video.mp4', 40);

-- --------------------------------------------------------

--
-- Структура таблицы `pk_places`
--

CREATE TABLE `pk_places` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pk_places`
--

INSERT INTO `pk_places` (`id`, `name`, `user_id`) VALUES
(1, 'Premeri Kazakhstan', 10),
(5, 'Premier-Kazakhstan', 20),
(6, 'Екі жұлдыз', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `pk_tutorial`
--

CREATE TABLE `pk_tutorial` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `completed` varchar(4) NOT NULL DEFAULT 'not',
  `url` text CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pk_users`
--

CREATE TABLE `pk_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'user',
  `banned` varchar(3) NOT NULL DEFAULT 'not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pk_users`
--

INSERT INTO `pk_users` (`id`, `name`, `email`, `password`, `status`, `banned`) VALUES
(10, 'Сариев Баглан', 'baglansariev@mail.ru', '$2y$10$5Bl2M6TbHQ5KFnfzn8rmxueWh.RV98AG/zQabe6rBdFsuo1AnIpgG', 'admin', 'not'),
(20, 'Олжас', 'zatanirovann@yandex.ru', '$2y$10$ADTS2fCGlYa3lylbTVNBWeOPPYqVfEjgwp9lO9otuc/3JQolLV4p.', 'user', 'not'),
(21, 'Еркин Майлин', 'erkin@zzz.ru', '$2y$10$hoBn3hUQ/dGT7GB3G4cdzu5Ia9gQzDXZYbf7VSLP6LJ.c8AsQ.gGS', 'user', 'not');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pk_agreement`
--
ALTER TABLE `pk_agreement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_albums`
--
ALTER TABLE `pk_albums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_album_images`
--
ALTER TABLE `pk_album_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_album_videos`
--
ALTER TABLE `pk_album_videos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_places`
--
ALTER TABLE `pk_places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_tutorial`
--
ALTER TABLE `pk_tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pk_users`
--
ALTER TABLE `pk_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pk_agreement`
--
ALTER TABLE `pk_agreement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pk_albums`
--
ALTER TABLE `pk_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `pk_album_images`
--
ALTER TABLE `pk_album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `pk_album_videos`
--
ALTER TABLE `pk_album_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pk_places`
--
ALTER TABLE `pk_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `pk_tutorial`
--
ALTER TABLE `pk_tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pk_users`
--
ALTER TABLE `pk_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
