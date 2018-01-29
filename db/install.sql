INSERT INTO `{c2r-prefix}_modules` (`name`, `folder`, `code`, `sort`) VALUES ("{c2r-mod-name}", "{c2r-mod-folder}", "{c2r-mod-code}", 0);

CREATE TABLE IF NOT EXISTS `{c2r-prefix}_sasha` (
  `id` int(11) NOT NULL,
  `project` text CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip` text CHARACTER SET utf8 NOT NULL,
  `ip2` text CHARACTER SET utf8 NOT NULL,
  `system` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `folder` (`folder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
