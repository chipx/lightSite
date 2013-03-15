-- 
-- Structure for table `comments`
-- 

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru' COMMENT 'Язык',
  `linkID` int(11) NOT NULL COMMENT 'Ссылочный идентификатор',
  `linkType` enum('content','game') NOT NULL COMMENT 'Ссылочный тип',
  `author` int(11) NOT NULL COMMENT 'Автор',
  `state` enum('create','update','moderate') NOT NULL COMMENT 'Статус',
  `visible` enum('all','no') NOT NULL DEFAULT 'all' COMMENT 'Видимость',
  `text` text NOT NULL COMMENT 'Текст',
  `parent` int(11) NOT NULL COMMENT 'Родитель',
  `config` varchar(255) NOT NULL COMMENT 'Дополнительная конфигурация',
  PRIMARY KEY (`ID`,`lang`),
  UNIQUE KEY `Uniq` (`ID`,`lang`),
  KEY `linkID` (`linkID`,`linkType`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Комментарии';

-- 
-- Structure for table `content`
-- 

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru' COMMENT 'Язык',
  `author` int(11) NOT NULL COMMENT 'Автор',
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `text` text NOT NULL COMMENT 'Текст',
  `visible` enum('all','no') NOT NULL DEFAULT 'all' COMMENT 'Видимость',
  `state` enum('create','update','moderate') NOT NULL COMMENT 'Статус',
  `parent` int(11) NOT NULL COMMENT 'Родитель',
  `config` varchar(255) DEFAULT NULL COMMENT 'Дополнительная конфигурация',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Uniq` (`ID`,`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

