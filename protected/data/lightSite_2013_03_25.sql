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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Комментарии';

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Structure for table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
CREATE TABLE IF NOT EXISTS `feeds` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `url` text NOT NULL,
  `type_parse` varchar(64) NOT NULL,
  `last_time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `config` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `name` (`name`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `tags_link`
--

DROP TABLE IF EXISTS `tags_link`;
CREATE TABLE IF NOT EXISTS `tags_link` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `linkID` int(11) NOT NULL,
  `linkType` enum('content') NOT NULL,
  PRIMARY KEY (`tagID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `tags_type`
--

DROP TABLE IF EXISTS `tags_type`;
CREATE TABLE IF NOT EXISTS `tags_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `config` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

