-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2024 г., 12:35
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES
(1, 'Что изменится в финансах для россиян с 1 июля 2024 года', 'С 1 июля начинают действовать новые формы для предоставления уведомлений в Федеральную налоговую службу (ФНС) о наличии, открытии и закрытии зарубежных банковских счетов, изменения реквизитов, а также уточнены способы предоставления этой информации.', '2024-07-01'),
(2, 'Что будет с рынком новостроек после 1 июля. Прогнозы застройщиков', 'С 1 июля 2024 года завершается действие программы льготной ипотеки («Господдержка-2020»), которая была введена в качестве антикризисной меры в 2020 году. По мнению Банка России, программа исчерпала себя, а для столичных регионов стала почти недоступна после изменения условий — снижения лимита до 6 млн руб.', '2024-06-28'),
(3, 'Новые владельцы «Яндекса» объявили итоги биржевого обмена акций', 'Новые акционеры «Яндекса» (YDEX) в лице ЗПИФа «Консорциум. Первый» получили надлежаще поданные оферты на биржевой обмен 43,85 млн акций Yandex N.V. Об этом говорится в сообщении ЗПИФа «Консорциум. Первый». Всего он был готов обменять до 50 млн акций. Разница между числом бумаг в полученных заявках и общим возможным числом под обмен связана с тем, что часть акций Yandex N.V. находится у нерезидентов на счетах типа С.', '2024-07-01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
