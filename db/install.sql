INSERT INTO `{c2r-prefix}_modules` (`name`, `folder`, `code`, `sort`) VALUES ("{c2r-mod-name}", "{c2r-mod-folder}", '{"fa-icon":"fa-laptop","img":"dog.png","sub-items":{}}', 0);

CREATE TABLE IF NOT EXISTS `{c2r-prefix}_example` (
	`id` int(11) NOT NULL,
	`project` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
	`ip2` varchar(15) NOT NULL DEFAULT '0.0.0.0',
	`system` enum('windows','linux','apple','android','ios') NOT NULL,
	`date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
