-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2025 г., 21:50
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parallel_computing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `code_name` varchar(100) NOT NULL,
  `project_developer` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `scope` varchar(100) NOT NULL COMMENT 'Область применения',
  `date_begin` date NOT NULL,
  `computer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`project_id`, `code_name`, `project_developer`, `description`, `scope`, `date_begin`, `computer_id`) VALUES
(1, 'FORD NOT CRASH MODELING', 'Ford Motor', 'Моделировании crash-тестов автомобилей', 'Автомобилестроение', '2024-12-02', 1),
(2, 'PONCE MODELING', 'Waterways Experiment Station', 'Моделирование движения волн в узком заливе Ponce на побережье Флориды', 'Вычислительная гидродинамика', '2020-09-08', 2),
(3, 'OIL IMAGE MODELING', 'IFP', 'Обработка трехмерных сейсмических изображений, моделирование нефтяных резервуаров', 'Вычислительная гидродинамика', '2023-12-07', 3),
(4, 'KOREA RAIN MODELING', 'NEC', 'Предсказание начала сезона мощных дождей в Корее', 'Предсказание погоды', '2023-04-30', 4),
(5, 'OCEAN MODELING', 'Silicon Graphics', 'Моделирование мирового океана и составление навигационных карт, а также отслеживание перемещения подводных лодок', 'Моделирование мирового океана', '2024-10-06', 5),
(6, 'OZON MODELING', 'Pacific-Northwest National Laboratory', 'Моделирование через шестичасовые интервалы изменения уровней озона в стратосфере Северной Атлантики над Ньюфаундлендом на высоте семи тысяч метров над уровнем моря', 'Моделирование атмосферы', '2024-04-07', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `supercomputer`
--

CREATE TABLE `supercomputer` (
  `computer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `performance` float NOT NULL,
  `developer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `supercomputer`
--

INSERT INTO `supercomputer` (`computer_id`, `name`, `location`, `performance`, `developer`) VALUES
(1, 'El Capitan', 'Lawrence Livermore National Laboratory (LLNL)', 2790, 'HPE Cray'),
(2, 'Frontier', 'Oak Ridge National Laboratory (ORNL)', 1353, 'HPE Cray'),
(3, 'Aurora HPE', 'Argonne Leadership Computing Facility', 1012, 'Cray EX'),
(4, 'Eagle ', 'Microsoft Azure Cloud', 561, 'Microsoft'),
(5, 'HPC6 ', 'Eni S.p.A', 477.9, 'HPE Cray');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `code_name` (`code_name`),
  ADD UNIQUE KEY `project_id` (`project_id`),
  ADD KEY `foreign_computer` (`computer_id`);

--
-- Индексы таблицы `supercomputer`
--
ALTER TABLE `supercomputer`
  ADD PRIMARY KEY (`computer_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `computer_id` (`computer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `supercomputer`
--
ALTER TABLE `supercomputer`
  MODIFY `computer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `foreign_computer` FOREIGN KEY (`computer_id`) REFERENCES `supercomputer` (`computer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
