-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.15 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица tmdb.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` tinyint(50) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `color_UNIQUE` (`color`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.colors: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` (`id`, `color`) VALUES
	(5, '#3e6913'),
	(3, '#44eaff'),
	(4, '#47b689'),
	(7, '#7289da'),
	(1, '#8f72da'),
	(2, '#ad1ada'),
	(8, '#d28b9e'),
	(6, '#d51d1b');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;

-- Дамп структуры для таблица tmdb.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `caption` varchar(45) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `caption_UNIQUE` (`caption`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.groups: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `caption`, `description`) VALUES
	(1, 'registered', 'Pellentesque consectetur lobortis odio, id sollicitudin orci fermentum sit amet. Integer non sodales nisi, eget elementum ante. Nullam rhoncus dui nulla, at dictum dui ultrices a. Cras congue suscipit consectetur. Suspendisse cursus dui ut semper ultricies. Etiam id aliquet massa. Fusce posuere sed metus ac rhoncus. Suspendisse tristique risus mi, a volutpat lorem rhoncus eget. Nulla tincidunt velit quis nulla tempus porttitor.'),
	(2, 'approved', 'Cras blandit enim quis condimentum mattis. Phasellus ac justo et diam viverra gravida a non eros. Proin eu lobortis metus. Mauris sit amet elementum neque. Vivamus aliquam molestie leo, ac congue justo rhoncus id. Morbi vitae ex non risus euismod euismod in quis risus. Aliquam viverra non mi id posuere. In eu metus non ante tempus blandit ut in sapien. Proin consequat est sed lorem condimentum lacinia. Quisque aliquet varius quam in sollicitudin. Suspendisse accumsan gravida consectetur. Etiam ac congue lorem. Sed lobortis vulputate nulla, nec sagittis quam dapibus vitae.'),
	(3, 'active', 'Aliquam eget suscipit sem, quis rhoncus nisi. Morbi id purus leo. Phasellus molestie, sapien a tempor maximus, nibh nisl hendrerit libero, et mattis enim felis ac lectus. Aliquam erat volutpat. Nullam luctus auctor bibendum. Ut quis diam maximus augue pulvinar aliquam. In efficitur orci vitae libero viverra feugiat. Integer hendrerit sit amet lacus ut pharetra. Aenean in faucibus arcu. Quisque egestas a leo ac malesuada. Suspendisse auctor ipsum quam, vitae semper tellus pretium vitae. Ut et augue cursus ante tristique malesuada. Donec vel augue sed lorem malesuada hendrerit vitae non quam. Sed nibh lacus, elementum ut arcu in, fringilla vehicula turpis.'),
	(4, 'new', 'Mauris lacinia elementum libero laoreet dictum. Quisque cursus malesuada ligula. Vivamus aliquam nisl felis, quis tristique tellus maximus et. Mauris ut ex eu erat tempus ultrices id a massa. Praesent non vulputate augue. Nullam viverra, nisi vel volutpat aliquam, nulla ipsum iaculis metus, eget congue risus lorem eget nisi. Phasellus risus quam, varius ut tincidunt vitae, condimentum ut leo. Aenean convallis odio magna, vitae porttitor neque molestie non. Sed lobortis est et lacus luctus, sit amet pellentesque nisl porttitor'),
	(5, 'old', 'проспоAenean vehicula a tortor vitae pulvinar. Aliquam dapibus ante sit amet diam dictum, et mollis augue maximus. Morbi pellentesque porta est, sed congue ante blandit imperdiet. Pellentesque non mauris posuere, placerat nisi nec, viverra tellus. Integer tincidunt efficitur metus quis luctus. Sed ac turpis felis. Nulla sodales enim eget accumsan placerat. Proin consequat faucibus convallis.спроспрол'),
	(6, 'frontenders', 'Sed aliquam enim congue nisi condimentum, quis pellentesque orci auctor. Etiam pretium auctor nunc ac congue. Aliquam posuere imperdiet tristique. Suspendisse quis dictum ex, nec laoreet massa. Vestibulum aliquam a erat vitae congue. Sed tristique ligula at purus pellentesque auctor. Pellentesque sit amet diam in mi consequat placerat non ac neque. Fusce ex orci, condimentum quis dapibus ac, vulputate eu tortor. Nunc hendrerit lectus a est condimentum, commodo lacinia eros pulvinar.'),
	(7, 'php Кодеры', 'группа пхп кодеров');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Дамп структуры для таблица tmdb.group_user
CREATE TABLE IF NOT EXISTS `group_user` (
  `user_id` int(6) NOT NULL,
  `group_id` int(6) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_users_has_groups_groups1_idx` (`group_id`),
  KEY `fk_users_has_groups_users_idx` (`user_id`),
  CONSTRAINT `fk_users_has_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `fk_users_has_groups_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.group_user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
INSERT INTO `group_user` (`user_id`, `group_id`) VALUES
	(2, 1),
	(1, 2),
	(3, 2),
	(1, 3),
	(3, 3),
	(3, 4),
	(3, 5),
	(1, 6),
	(1, 7);
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;

-- Дамп структуры для таблица tmdb.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `text` varchar(2000) NOT NULL,
  `caption` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `section_id` int(6) NOT NULL,
  `sender_id` int(6) NOT NULL,
  `receiver_id` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_messages_sections1_idx` (`section_id`),
  KEY `FK_messages_users` (`sender_id`),
  KEY `FK_messages_users_2` (`receiver_id`),
  CONSTRAINT `FK_messages_users` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_messages_users_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_messages_sections1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.messages: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `text`, `caption`, `created_at`, `is_read`, `section_id`, `sender_id`, `receiver_id`) VALUES
	(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel est ac magna pharetra accumsan. In eget magna a enim convallis auctor eget sit amet urna. Integer eget magna consequat, rutrum tellus non, dignissim nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae ante viverra, rutrum eros nec, tincidunt mi. Pellentesque nibh erat, dignissim vitae volutpat ut, luctus in felis. Donec at porttitor arcu. Aenean maximus nisl eu mi placerat sodales.', 'сообщение 1', '2020-01-06 23:15:07', 1, 1, 2, 1),
	(2, 'Nam tincidunt libero nec finibus pellentesque. Ut convallis urna et leo porttitor, vitae elementum metus lobortis. Vivamus vitae erat id dui lacinia scelerisque. Proin tempor eros non justo pretium ultricies. Sed non ex at est viverra elementum quis quis elit. Vivamus non pretium ex, vitae tempus purus. Nulla eros purus, mattis et dignissim quis, mattis eget ligula. Curabitur lobortis felis dictum ligula dictum interdum. Proin vitae vulputate risus. Praesent malesuada, neque vel finibus tincidunt, nulla erat pellentesque turpis, quis gravida libero velit ac mauris.', 'сообщение 2', '2020-01-06 23:15:23', 0, 5, 3, 1),
	(3, 'Aliquam quis eros magna. Sed eleifend ipsum et odio dapibus, vitae mollis leo sollicitudin. Ut eu consequat diam, et ultrices orci. Donec vehicula orci volutpat, tincidunt risus eget, ultrices enim. Curabitur eu erat at elit aliquet ultrices. Donec tincidunt fermentum porttitor. Ut sit amet neque quis mi pellentesque lobortis.', 'сообщение 3', '2020-01-06 23:15:39', 1, 3, 4, 1),
	(4, 'Aenean sagittis tempor nibh, eget pellentesque mauris condimentum ut. Duis tristique tempus mattis. Donec ac elit dapibus, venenatis sem id, vulputate orci. Nullam mollis tortor diam, dignissim eleifend augue malesuada eu. In hac habitasse platea dictumst. Sed facilisis diam a viverra tempus. Nam ultricies, risus non tempus ullamcorper, turpis turpis eleifend dui, in scelerisque libero tellus non risus. Phasellus et mauris massa. Fusce nisi ex, sodales in sollicitudin vel, pretium quis lectus. Phasellus metus purus, porttitor nec enim et, volutpat dignissim odio. Phasellus viverra viverra libero, eu consectetur neque facilisis sed. Vestibulum a massa sem. Nulla vel posuere felis. Curabitur gravida mauris ut turpis sagittis, non vehicula arcu vulputate.', 'сообщение 4', '2020-01-06 23:15:52', 1, 1, 1, 1),
	(5, 'Aliquam erat volutpat. Sed sed suscipit lacus, tincidunt faucibus justo. Quisque maximus metus convallis risus euismod viverra. Praesent vulputate sit amet diam eget faucibus. Phasellus semper, purus eget feugiat ultrices, velit arcu tincidunt urna, et pellentesque odio lacus eleifend felis. Suspendisse mattis dolor vitae magna iaculis egestas. Maecenas luctus pretium ligula nec cursus. Nunc lobortis eros a purus hendrerit dictum. Vivamus dolor odio, sagittis ac hendrerit non, tristique pellentesque justo. Suspendisse molestie auctor elit non pellentesque. Donec ac dictum est.', 'сообщение 5', '2020-01-06 23:16:09', 0, 6, 5, 1),
	(6, 'Ut convallis urna et leo porttitor, vitae elementum metus lobortis. Vivamus vitae erat id dui lacinia scelerisque. Proin tempor eros non justo pretium ultricies. Sed non ex at est viverra elementum quis quis elit. Vivamus non pretium ex, vitae tempus purus. Nulla eros purus, mattis et dignissim quis, mattis eget ligula. Curabitur lobortis felis dictum ligula dictum interdum. Proin vitae vulputate risus. Praesent malesuada, neque vel finibus tincidunt, nulla erat pellentesque turpis, quis gravida libero velit ac mauris.', 'сообщение 6', '2020-01-06 23:16:31', 1, 4, 1, 1),
	(7, 'Phasellus metus purus, porttitor nec enim et, volutpat dignissim odio. Phasellus viverra viverra libero, eu consectetur neque facilisis sed. Vestibulum a massa sem. Nulla vel posuere felis. Curabitur gravida mauris ut turpis sagittis, non vehicula arcu vulputate.', 'сообщение 7', '2020-01-06 23:16:45', 1, 2, 3, 1),
	(8, 'текст сообщения', 'от первого второму', '2020-01-08 18:25:03', 0, 9, 1, 2),
	(9, 'прробное сообщщнеие', 'проба2', '2020-01-08 22:34:45', 0, 28, 1, 2),
	(12, 'добрыйдобрый', 'приветпривет', '2020-01-09 00:04:51', 1, 21, 1, 3),
	(13, 'SAJDHJKH SAKJDH ЛОФЫР ЛФОЫ РЛЫОФ РЫФЛО HAKJHKJASH ЛОФРЫ ЛОРВФЫ ЛО', 'Проверка проверки', '2020-01-09 00:26:54', 1, 23, 3, 1),
	(15, 'отправка отправка отправка отправка отправка отправка отправка отправка отправка отправка ', 'отправка в группу животные', '2020-01-09 00:38:44', 0, 3, 3, 1),
	(16, 'ssadsaasdasddasdasd', 'ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ', '2020-01-09 00:46:55', 1, 3, 3, 1),
	(17, '44444444444444444444444', '4444444444444444444444', '2020-01-09 00:49:09', 0, 26, 1, 4),
	(18, '222222222222', '222222222222222222222', '2020-01-09 00:51:16', 0, 23, 3, 1),
	(19, '9999', '999999999999999999', '2020-01-09 00:51:48', 1, 27, 1, 3),
	(20, 'zxczxczxczxc', 'zxczxczxc', '2020-01-09 01:30:22', 0, 4, 3, 1),
	(21, 'ZXZXZXZXZXZX', 'ZXZXZXZXZX', '2020-01-09 01:31:24', 0, 4, 3, 1),
	(22, 'zxczxczxczxc', 'zxczxczxc', '2020-01-09 01:31:37', 0, 28, 3, 1),
	(23, 'mmmmmmmmmmmmmmmmmmmm', 'mmmmmmmmmmmmmm', '2020-01-09 01:36:41', 1, 4, 3, 1),
	(24, 'qweqweqwe', 'qweqwe', '2020-01-10 15:38:23', 0, 1, 1, 1),
	(25, '323321123', '123123', '2020-01-10 17:28:07', 0, 1, 1, 1),
	(26, '113322', '113322', '2020-01-10 17:34:46', 1, 27, 1, 3),
	(28, 'aqaaaaaaaaaaaaaa', 'qaaaaaaaaaaaaaaaaaaaaaa', '2020-01-12 00:59:44', 1, 4, 3, 1),
	(32, 'swdlkfjlks', '1650', '2020-01-12 16:51:19', 1, 28, 1, 3);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Дамп структуры для таблица tmdb.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `caption` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(6) NOT NULL,
  `color_id` tinyint(50) NOT NULL,
  `parent_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_sections_colors1_idx` (`color_id`),
  KEY `FK_sections_sections` (`parent_id`),
  KEY `FK_sections_users` (`created_by`),
  CONSTRAINT `FK_sections_sections` FOREIGN KEY (`parent_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `FK_sections_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_sections_colors1` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.sections: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `caption`, `created_at`, `created_by`, `color_id`, `parent_id`) VALUES
	(1, 'коты', '2020-01-06 23:13:46', 1, 1, 3),
	(2, 'собаки', '2020-01-06 23:13:45', 1, 2, 3),
	(3, 'животные', '2020-01-06 23:13:46', 1, 7, NULL),
	(4, 'шимпанзе', '2020-01-06 23:13:43', 1, 4, 6),
	(5, 'горилла', '2020-01-06 23:13:57', 1, 5, 6),
	(6, 'группа обезьяны', '2020-01-06 23:14:09', 1, 3, 3),
	(8, 'СПАМ', '2020-01-08 11:44:38', 1, 8, NULL),
	(9, 'коты', '2020-01-08 18:23:36', 1, 1, 22),
	(21, 'животные', '2020-01-09 00:04:51', 3, 7, 22),
	(22, 'программисты', '2020-01-09 00:12:50', 3, 5, NULL),
	(23, 'программисты', '2020-01-09 00:26:54', 1, 5, NULL),
	(26, 'программисты', '2020-01-09 00:49:09', 4, 5, 28),
	(27, 'шимпанзе', '2020-01-09 00:51:48', 3, 4, 28),
	(28, 'собаки', '2020-01-09 01:31:37', 3, 2, NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Дамп структуры для таблица tmdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT 'null',
  `password` varchar(100) NOT NULL,
  `email_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы tmdb.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `active`, `name`, `email`, `phone`, `password`, `email_newsletter`) VALUES
	(1, 1, 'Kate', 'user1', '89991112233', '$2y$10$/BYQO8Z6JPLUrmiSpA/r/eMRH7dCC.ZOivgLeBjVdlX3Kh6TWD2/u', 0),
	(2, 0, 'John', 'user2', '7778899', '$2y$10$UB3BGu2h9ng9iTgL8a9w3.CSJLBCUku/SRC7DTksmVbYxVOTXAwiO', 0),
	(3, 1, 'Madam', 'user3', NULL, '$2y$10$/m172ePs/L9rSbhAoG/mg.N3Oa7eU.8Y9E3brCFzr3dDjt5TAd4Y2', 1),
	(4, 1, 'Sir', 'sirmail', '5557788', '$2y$10$/m172ePs/L9rSbhAoG/mg.N3Oa7eU.8Y9E3brCFzr3dDjt5TAd4Y2', 1),
	(5, 0, 'Lady', 'ladymail', NULL, '$2y$10$QTDsfMgxTq9I5TmOSU1KRuu54eWyKA8q/M8wbF8AYWSqs9WhTqh/W', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
