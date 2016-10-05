-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 27 2016 г., 20:58
-- Версия сервера: 5.5.50
-- Версия PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiistep_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text,
  `meta_description` varchar(256) DEFAULT NULL,
  `meta_keywords` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `description`, `meta_description`, `meta_keywords`) VALUES
(1, 'Одежда', 0, 'Описание категории Одежда', NULL, NULL),
(2, 'Обувь', 0, 'Описание категории Обувь', NULL, NULL),
(3, 'Женская Одежда', 1, 'Описание категории Женская Одежда', NULL, NULL),
(4, 'Мужская Одежда', 1, 'Описание категории Мужская Одежда', NULL, NULL),
(5, 'Женская Обувь', 2, 'Описание категории Женская Обувь', NULL, NULL),
(6, 'Мужская Обувь', 2, 'Описание категории Мужская Обувь', NULL, NULL),
(8, 'new category 1', 1, 'etrryty', 'Meta Description1', 'Meta Keywords1');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `summa` float NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `active` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `player`
--

INSERT INTO `player` (`id`, `name`, `age`, `active`) VALUES
(1, 'homer', 33, '0'),
(2, 'homer2', 35, '1'),
(3, 'homer2', 35, '1'),
(4, 'homer3', 35, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` text,
  `stock` enum('0','1') DEFAULT NULL,
  `new` enum('0','1') DEFAULT NULL,
  `sale` enum('0','1') DEFAULT NULL,
  `meta_description` varchar(256) DEFAULT NULL,
  `meta_keywords` varchar(150) DEFAULT NULL,
  `img_path` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `description`, `stock`, `new`, `sale`, `meta_description`, `meta_keywords`, `img_path`) VALUES
(1, 'Платье-1', 3, 450, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'Платье-2', 3, 550, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'Свитер', 4, 200, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, 'Брюки', 4, 320, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'iuuui', 1, 555, 'ioi', '0', '1', '0', 'oioi', 'ioi', 'uploads/Hydrangeas.jpg'),
(6, '44444444444', 1, 77, '9o0i877', '1', '0', '0', 'yuyu', 'uyuy', 'uploads/Jellyfish.jpg'),
(7, 'yuyu', 1, 6, 'rr', '0', '1', '0', 'rere', 'erer', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
