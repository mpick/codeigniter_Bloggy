CREATE DATABASE `bloggy` /*!40100 DEFAULT CHARACTER SET latin1 */;


DROP TABLE IF EXISTS `bloggy`.`blogentry`;
CREATE TABLE  `bloggy`.`blogentry` (
  `idblogentry` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `entrydate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text NOT NULL,
  `titleurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idblogentry`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bloggy`.`blogtags`;
CREATE TABLE  `bloggy`.`blogtags` (
  `idblogtags` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogentryid` int(10) unsigned NOT NULL,
  `tagid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idblogtags`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bloggy`.`tagtypes`;
CREATE TABLE  `bloggy`.`tagtypes` (
  `idtagtypes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtagtypes`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

