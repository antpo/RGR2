<?php

use yii\db\Migration;

class m161210_153845_stucture extends Migration
{
    public function up()
    {
        $hash= '$2y$13$O.2NzHEggIhH/MnXJFQ1..Udp48Y06OPQloCjadaQLFWWOSTd7plG';
        $this->execute("INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
            (1, 'admin', '56OBVuuslcTCvl2Yf4wWEsNINgLL5-iT', '$hash', NULL, '1@1.ru', 10, 1481367007, 1481367007);");
        $this->execute("
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `lastname`, `firstname`) VALUES
(2, 'Иванов', 'Иван'),
(4, 'Петров', 'Виталий'),
(5, 'Сидоров', 'Вячеслав'),
(6, 'Бобров', 'Константин'),
(7, 'Колывин', 'Олег');

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `availability` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `cost`, `availability`) VALUES
(4, 'Стол Венеция', '5000', 1),
(5, 'Стол Дуэт', '3500', 1),
(6, 'Шкаф угловой', '7600', 1),
(7, 'Шкаф купе', '9500', 0),
(8, 'Кровать Сити', '13200', 0),
(9, 'Диван Книжка', '8400', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `number` varchar(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `perfomance_date` date DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `lastname`, `firstname`, `number`, `item_id`, `order_date`, `perfomance_date`, `employee_id`) VALUES
(12, 'Козлов', 'Игнат', '9239459392', 9, '2016-12-10 15:26:35', NULL, 4),
(13, 'Ванеев', 'Николай', '9569358753', 6, '2016-12-10 15:27:10', NULL, NULL),
(14, 'Овсин', 'Максим', '9869856752', 9, '2016-12-10 15:27:45', '2016-12-10', 2);

-- --------------------------------------------------------
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);


--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);
");
    }

    public function down()
    {
        echo "m161210_153845_stucture cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
