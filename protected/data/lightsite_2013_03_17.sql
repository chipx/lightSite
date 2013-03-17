--
-- Structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru' COMMENT 'Язык',
  `author` int(11) NOT NULL DEFAULT '0' COMMENT 'Автор',
  `state` enum('create','update','moderate') NOT NULL COMMENT 'Статус',
  `visible` enum('all','no') NOT NULL DEFAULT 'all' COMMENT 'Видимость',
  `config` varchar(255) DEFAULT NULL COMMENT 'Дополнительная конфигурация',
  `text` text NOT NULL COMMENT 'Текст',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT 'Родитель',
  `linkID` int(11) NOT NULL COMMENT 'Ссылочный идентификатор',
  `linkType` enum('content','game') NOT NULL COMMENT 'Ссылочный тип',
  `create` datetime NOT NULL,
  `update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Uniq` (`ID`,`lang`),
  KEY `linkID` (`linkID`,`linkType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Комментарии';

--
-- Structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru' COMMENT 'Язык',
  `author` int(11) NOT NULL DEFAULT '0' COMMENT 'Автор',
  `state` enum('create','update','moderate') NOT NULL COMMENT 'Статус',
  `visible` enum('all','no') NOT NULL DEFAULT 'all' COMMENT 'Видимость',
  `config` varchar(255) DEFAULT NULL COMMENT 'Дополнительная конфигурация',
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `text` text NOT NULL COMMENT 'Текст',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT 'Родитель',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `create` datetime NOT NULL,
  `update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Uniq` (`ID`,`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;