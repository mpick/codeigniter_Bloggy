-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.36-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema milespic_main
--

CREATE DATABASE IF NOT EXISTS milespic_main;
USE milespic_main;

--
-- Definition of table `blogentry`
--

DROP TABLE IF EXISTS `blogentry`;
CREATE TABLE `blogentry` (
  `idblogentry` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `entrydate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text NOT NULL,
  `titleurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idblogentry`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogentry`
--

/*!40000 ALTER TABLE `blogentry` DISABLE KEYS */;
INSERT INTO `blogentry` VALUES  (1,'Back to MySQL','Its been awhile, I\'m having to brush up','2011-08-27 09:09:56',1,'Ok, so I\'ve been using MSSQL for the main project I\'ve been working on for 8+ hours a day.  Back when I started the project, I had to brush up on MSSQL syntax as well.  For example, if you want to INSERT a datetime value when using MSSQL you would do something like...\r\n\r\ndatetimefield = GETDATE()\r\nOR\r\ndatetimefield = CONVERT(datetime,\'08/27/2011\')\r\n\r\nNow, that I\'m working on re-building my personal site, milespickens.com, I\'m back to using MySQL.  I had to look up how to INSERT a datetime value because I had forgotten.  Here is how you do it...\r\n\r\ndatetimefield = NOW()\r\nOR\r\ndatetimefield = CURRENT_DATE()\r\nOR \r\ndatetimefield = DATE(\'08/27/2011\')\r\n\r\nWell there you have it. This is my first blog entry as well so I\'m testing out the database that I just created to support the blog entries and also the code.  Let me know what you think.\r\n\r\nThanks,\r\nMiles','back-to-mysql'),
 (2,'Test add','Test add subtitle','2011-08-29 14:28:27',0,'test add blog entry # 2 ','test-add'),
 (3,'Opensourcing muh code','Why I want to give away my code','2011-08-29 18:46:06',1,'So, currently I\'m working on building my own blog platform.  This platform will be in PHP and built using the CodeIgniter framework.  I\'ll be releasing the code when I\'m finished with the build.  \r\n\r\nA few items that are missing are: \r\n1) Visitor Comments\r\n2) URL links with the title name like \"blog/opensourcing_my_code\"\r\n3) Author, being able to handle multiple authors\r\n4) embedding links and images\r\n5) ... and more\r\n\r\nI\'ll be making this code opensource once I am finished.  My Github address is https://github.com/mpick if you\'d like to wait for it.  The beauty of opensource is the ability to get input and improvements from a group of people.  Users of the code will no doubt have suggestions on how to improve the code which I haven\'t even thought of.  This will make my own blog more powerful and will make it just better code all together.  \r\n\r\nI like learning from other people, sometimes its just hard to find other programmers.  Hopefully I\'ll find some other CodeIgniter geeks who can teach me a thing or two. ','opensourcing-muh-code'),
 (4,'Python!','Coding in Python today','2011-08-31 02:45:15',1,'So, I created a webpage late last year for a Pharmacy.  The live database for this Pharmacy is a Synergy database, which is only accessible via ODBC.  And the ODBC driver which they provide only works on a Windows XP machine.  Urgh.  Anywho, I needed to figure out how to get that Pharmacy data available on a Non-Windows XP machine which will be hosting the webpage. \r\n\r\nSolution was this, I created a Python script which looks for row count changes in specific tables, queries those rows and then imports those new rows into a MySQL database which is on the webserver.  I have this script running on a Windows XP machine which has a Synergy ODBC connection.\r\n\r\nI wonder if there is another way though?  I really hate needing to rely on this script.  Because it runs so slowly, there is no way I could drop the entire table and then re-import the whole thing again.  That just wouldn\'t fly.   The client wants the data to be near-realtime, so I have this script running every 5 minutes!!\r\n\r\nI think, I\'ll either need to find another way to access the data from this existing webserver, OR I\'ll need to make a WindowsXP machine the webserver. Either way, I can\'t do any of that right now, it will take too long. \r\n\r\nToday, I\'m writing another module for this code which will work like this \r\n\r\n1) Find active patients. \r\n2) Drop the rows for those patients in the MySQL database.\r\n3) Query the RX History rows for those patients on the Synergy database. \r\n4) INSERT those rows into the MySQL database.\r\n\r\nSo confusing. There has got to be a better way. ','python'),
 (5,'Looping backwards','Looping in descending order','2011-09-01 21:19:49',1,'//Pay no attention to the extra BR tags in the code below, the nl2br() function is putting them in there :(\r\n\r\nOkay, just a quick entry.  I created a loop to make a SELECT OPTION list for hours of the day in military time.  It made the SELECT list start at 0:00 and finish at 23:00 (on second thought, I\'ll have to edit this to finish at 23:59).  \r\n\r\n<xmp><select name=\"stime\" class=\"smller\"><option value=\"\">\r\n			<?php for($i=0;$i<24;$i++):?>\r\n				<option <?= (set_value(\'stime\') == $i . \':00\' ? \'selected\' : \'\' ) ?>><?=$i . \':00\'?></option>\r\n			<?php endfor;?>\r\n</select></xmp>	\r\nThe users, on this particular page will most likely be choosing late hours more often than early hours, so I figure I\'ll throw them a bone and give the hours in descending order.  Just a couple characters needed to change in the FOR statement.   Now it looks like this \r\n\r\n<xmp><select name=\"stime\" class=\"smller\"><option value=\"\">\r\n			<?php for($i=23;$i>-1;$i--):?>\r\n				<option <?= (set_value(\'stime\') == $i . \':00\' ? \'selected\' : \'\' ) ?>><?=$i . \':00\'?></option>\r\n			<?php endfor;?>\r\n</select></xmp>\r\n\r\n[EDIT]  This is how I changed the 23 to tack on :59 instead of :00 <xmp><?=$i . ($i == 23 ? \':59\' : \':00\')?></xmp>','looping-backwards'),
 (6,'Python and Pyodbc','Running multiple table imports concurrently','2011-09-05 11:02:54',1,'Background: I have a Python script using the pyodbc module to import from one database into another.  I\'m doing this for a Pharmacy which has field nurses who need web access to patient medication history.  <a href=\"http://milespickens.com/project/index/2\">Project link</a>\r\n\r\nOk, so I had an import script that was importing about 10 tables one by one.  Some of the tables have 300,000 rows and can take a few hours to import completely.  Each night I\'m running a script which TRUNCATEs all of the MySQL tables to prepare for a full reimport, this will clean up the tables and make sure that all the data is current and accurate. //I\'ll post an example code in the future so you can better understand the process.\r\n\r\nOk, so I had this script running overnight and this morning I see that its still running.  It goes one table at a time and I thought, \"Hmm, I wonder if it can handle importing multiple tables at the same time.\"  So I opened up IDLE twice and began two more table imports side by side.  Everything looked good (i.e. No ERROR text showed up).  So I went to my Query browser for MySQL and did a quick SELECT COUNT(*) on those two tables. ...\r\nBINGO!  I see that both tables are growing in row count!!!\r\n\r\nOk, now how can I create one script that opens up multiple subprocesses? ... GOOGLE to the rescue.  I found a nice module which is built into Python called \"subprocess\".\r\n\r\nMy final script will look something like this...\r\n<div class=\"well\">\r\n#import_all.py has a defined function for each table, within each function \r\n#it runs a TRUNCATE command, queries from the source database and then loops\r\n#through the results while INSERTing each into the MySQL web database.\r\n1. import subprocess\r\n2. cmd1 = \'python doallergy\' #executes allergy() from import_all.py\r\n3. cmd2 = \'python dodoctor\' #executes doctor() from import_all.py\r\n4. table1 = subprocess.Popen(cmd1)\r\n5. table1 = subprocess.Popen(cmd2)\r\n</div>\r\nSo this is just a short snippet of the final script which will pop open 13 different sub processes which will import the 13 table concurrently. ','python-and-pyodbc'),
 (7,'you,know,it,baby','balls','2011-09-15 18:34:57',1,'you know it ','youknowitbaby'),
 (8,'doode','doode1','2011-09-16 13:54:18',0,'dooode2','doode'),
 (9,'derp','derp2','2011-09-16 14:05:25',0,'derrrrp','derp');
/*!40000 ALTER TABLE `blogentry` ENABLE KEYS */;


--
-- Definition of table `blogtags`
--

DROP TABLE IF EXISTS `blogtags`;
CREATE TABLE `blogtags` (
  `idblogtags` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogentryid` int(10) unsigned NOT NULL,
  `tagid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idblogtags`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogtags`
--

/*!40000 ALTER TABLE `blogtags` DISABLE KEYS */;
INSERT INTO `blogtags` VALUES  (1,8,34),
 (2,8,36),
 (3,8,12),
 (15,9,39),
 (16,9,24),
 (17,9,25),
 (18,9,6),
 (19,9,41),
 (20,9,42),
 (21,9,43),
 (22,6,5),
 (23,6,44),
 (25,1,29),
 (26,1,45),
 (27,1,46);
/*!40000 ALTER TABLE `blogtags` ENABLE KEYS */;


--
-- Definition of table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `idlink` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idlink`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES  (1,'Workola - Chrome Time Tracking App','https://chrome.google.com/webstore/detail/balhblkamgpekpdmibmpjffcnffjlihk','I use this extension to track the time I spend per project, per client, per task. Its great. At the end of the month, I see the total hours for each and then whip up the invoice. Try it out if you need a time tracker.',0),
 (2,'Workola - Chrome Time Tracking App','https://chrome.google.com/webstore/detail/balhblkamgpekpdmibmpjffcnffjlihk','I use this extension to track the time I spend per project, per client, per task. Its great.\n At the end of the month, I see the total hours for each and then whip up the invoice. \nTry it out if you need a time tracker.',1),
 (3,'PHP','http://php.net/','What can I say, I love the documentation that is available on php.net. I use these pages daily. \nTo see my contributions you can search for milespickens+php@gmail.com and some should pop up.',1),
 (4,'Reddit - fffffffuuuuuuuuuuuu','http://www.reddit.com/r/fffffffuuuuuuuuuuuu','This page is always good for a laugh.  If you haven\'t visited it before, beware!  You may end up wasting more time than you thought.',1);
/*!40000 ALTER TABLE `link` ENABLE KEYS */;


--
-- Definition of table `milestonetask`
--

DROP TABLE IF EXISTS `milestonetask`;
CREATE TABLE `milestonetask` (
  `idmilestonetask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `milestoneid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duedate` datetime NOT NULL,
  `estimatedhours` int(10) unsigned NOT NULL,
  `actualhours` int(10) unsigned NOT NULL,
  `completeddate` datetime NOT NULL,
  PRIMARY KEY (`idmilestonetask`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestonetask`
--

/*!40000 ALTER TABLE `milestonetask` DISABLE KEYS */;
INSERT INTO `milestonetask` VALUES  (1,1,'Secondary Script','Need to create a secondary script which truncates all of the tables and re-imports all of the rows from the Pharmacy database. \nThis import will take far more time to run and should be ran once a day.','2011-09-05 00:00:00',7,7,'2011-09-05 00:00:00'),
 (2,2,'Convert Reports','I wrote many reports in a previous framework and CSS layout.  I need to convert these remaining reports to the new framework and the new CSS layout. \n\n29 reports in total.  I\'m guessing each report will take about an hour to convert and test.\n\n[Edit 9/5/2011] Finished 11 of the 29 today. Took 4 hours to do it.  Some reports are harder than others, so not sure if I can say 5 more hours will cover it.  We\'ll see.','2011-09-06 00:00:00',30,10,'2011-09-06 00:00:00'),
 (3,1,'Test multiple scripts running in parallel','The script importing the tables one by one takes far too long.  Need to have a way to import all tables concurrently. ','2011-09-06 00:00:00',3,3,'2011-09-05 00:00:00'),
 (4,1,'Verify returned data','Need to compare a Patient web report to a report from the Access database and fix and errors.\nOne known error is the Diagnosis, I must be getting it from the wrong field or joining the table incorrectly. ','2011-09-06 00:00:00',2,0,'0000-00-00 00:00:00'),
 (5,1,'Create CM table','Currently I have a column that is in the doctor table which should actually be in its own table and be able to join to the doctor table to get a nurse name. \nI need to create the table and change any code which uses that field.','2011-09-06 00:00:00',2,0,'0000-00-00 00:00:00'),
 (6,3,'Don\'t list completed tasks','When viewing more detail on a project, completed tasks are listed.','2011-09-08 00:00:00',1,1,'2011-09-06 00:00:00'),
 (7,3,'Tasks page, Bugs page','Need to put a button link to the left of each project to get access to list of Tasks, open and complete.  Also a button link to the left which will show bugs open and completed?  Bugs would require a new table','2011-09-10 00:00:00',2,0,'0000-00-00 00:00:00'),
 (8,3,'Blog comments','Need to create a comments table.  Also need to trim each blog view on the multiblog page.  Should have a readmore link which will link to its own page and also on that page, you can see the comments and add your own.\nComments should be posted via ajax and refresh the list of comments without refreshing the page. ','2011-09-10 00:00:00',3,0,'0000-00-00 00:00:00'),
 (9,3,'Examples table','Need to be able to store code examples from each project and be able to link to those code examples... screenshots too?\ncode examples should be in the prettier css.','2011-09-15 00:00:00',5,0,'0000-00-00 00:00:00'),
 (10,4,'Changed to Superbill form','1. The pertinant lab area needs to be larger.\n2. The condition on d/c area could be smaller, it really only requires 2-3 words.\n3. Add more spaces to put meds. At least 6 more spaces.','2011-09-12 00:00:00',3,0,'0000-00-00 00:00:00'),
 (11,4,'Test add','test','2011-10-10 00:00:00',1,0,'2011-09-01 00:00:00');
/*!40000 ALTER TABLE `milestonetask` ENABLE KEYS */;


--
-- Definition of table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `idproject` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyurl` varchar(255) DEFAULT NULL,
  `companycontactperson` varchar(255) DEFAULT NULL,
  `companycontactpersonemail` varchar(255) DEFAULT NULL,
  `note` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idproject`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES  (1,'Hospice Web Application','2011-02-01 00:00:00','0000-00-00 00:00:00','HealthEssentials','http://www.healthessentials.com/','Troy Smith','tsmith@hospicetouch.com','Converting a complicated Access Database to PHP. ',1),
 (2,'Patient Rx History','2010-12-01 00:00:00','0000-00-00 00:00:00','Comfort Rx','http://www.healthessentials.com/pharma.php','Phillip Chung','pchung@comfortrx.org','Comfort Rx specializes in home delivery of prescription medicines.  They have a number of Nurses who work in the field and need access to the Patient\'s Medication History and Allergy information. \nFor this project, I am creating web pages which give the authorized field Nurses the access they need to rapidly serve each patient.\nCurrently, when a Nurse needs Patient information he will call or email the Pharmacy and request a fax of the Patients history. This web access for the nurses is going to free up a lot of time in the Pharmacy office, because the Lab technicians will field much less phone calls and emails.',1),
 (3,'My Site','2011-09-01 00:00:00','0000-00-00 00:00:00','Miles Pickens dot Com','http://www.milespickens.com','Miles Pickens','milespickens+site@gmail.com','Getting all the pages full and functioning',1),
 (4,'Anoto Digital Form Design','2010-12-01 00:00:00','0000-00-00 00:00:00','HealthEssentials','http://gerinet.com/','Stacey Rodillon','srodillon@hospicetouch.com','Creating new forms in preperation to using the Anoto digital pen.  All forms are being redesigned and made to Anoto\'s specification (i.e. proper spacing, color, and filetype).\r\n\r\nIf you need help with your forms in preparation for using Anoto digital pens, send me an email. \r\n\r\n<a href=\"mailto:milespickens@gmail.com\">milespickens@gmail.com</a>',1);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


--
-- Definition of table `projectmilestone`
--

DROP TABLE IF EXISTS `projectmilestone`;
CREATE TABLE `projectmilestone` (
  `idprojectmilestone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `createddate` datetime NOT NULL,
  `estimatedreleasedate` datetime DEFAULT NULL,
  `releasedate` datetime DEFAULT NULL,
  `projectid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idprojectmilestone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectmilestone`
--

/*!40000 ALTER TABLE `projectmilestone` DISABLE KEYS */;
INSERT INTO `projectmilestone` VALUES  (1,'Stage 1','Getting the imported data, real-time and accurate','The Live database is not accessible via the webserver.  I have written an import script (in Python) which uses pyodbc to import from the Pharmacy database into a MySQL database which resides on the webserver. \nI\'ve finished with the webpages already. I\'m just needing to work on the import script to make sure updated patient data gets seen, queried, and updated consistently. ','2011-09-05 02:41:06','0000-00-00 00:00:00','0000-00-00 00:00:00',2),
 (2,'Stage 1','Convert everyday functions and reports to php','A small team developers, working to convert sections of an existing MS Access database over to PHP pages.  Getting the pages ready section by section, report by report and testing each along the way.','2011-09-05 02:50:54','2011-10-15 00:00:00','0000-00-00 00:00:00',1),
 (3,'Stage 1','Getting her up and running','Got a few pages done and a few pages that need to be built out a bit more.  The tasks under this milestone will relate to what I want to complete on this site.','2011-09-06 02:24:41','2011-10-01 00:00:00','0000-00-00 00:00:00',3),
 (4,'Phase 1','Re-designing forms for Anoto digital pens.','When using Anoto\'s digital pen, your must have a form designed to work properly with the pen.  This will increase the pen to accurately read your input. ','2011-09-06 22:53:42','2011-11-01 00:00:00','0000-00-00 00:00:00',4);
/*!40000 ALTER TABLE `projectmilestone` ENABLE KEYS */;


--
-- Definition of table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `idsoftware` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsoftware`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT INTO `software` VALUES  (1,'Query Explus - Light, Free, Query awesomeness','http://sourceforge.net/projects/queryexplus/','I use this to connect to different data sources and test queries. You can connect via ODBC or OLEDB. So you can connect to whatever data source you can imagine. I\'ve even been able to connect to XLS files to query and update contents. \nIf you know your SQL, you can even do JOINS to multiple XLS files or sheets. I use this all the time. It saves me from needing to launch MSSQL Server for testing queries. \n\nTry it out, you don\'t even need to install it. Just run the .exe and Boom.',1),
 (2,'CodeIgniter - PHP framework','http://codeigniter.com/','I\'m hooked on this PHP framework. Its well documented and very easy to work with. Its my weapon of choice. \n\nCheck out a quick video tutorial here http://codeigniter.com/tutorials/',1),
 (3,'Spotify - Digital Music Service','http://www.spotify.com/us/','While clicking away on my keyboard, and staring at a colorful pixels, this application keeps me sane.  I have create a number of playlists and can even listen to my friends playlists.  \nThe catch is that this service is not available in all Countries.  I live in Brazil now but I\'m so glad its still working for me.  I believe it only checks your Country upon sign-up.  So, if you have a fancy way of imitating a U.S. ip address, do it.  You need to check out this app if you haven\'t already.',1);
/*!40000 ALTER TABLE `software` ENABLE KEYS */;


--
-- Definition of table `tagtypes`
--

DROP TABLE IF EXISTS `tagtypes`;
CREATE TABLE `tagtypes` (
  `idtagtypes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `urlfriendly` varchar(255) NOT NULL,
  PRIMARY KEY (`idtagtypes`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagtypes`
--

/*!40000 ALTER TABLE `tagtypes` DISABLE KEYS */;
INSERT INTO `tagtypes` VALUES  (1,'entrepreneur',1,''),
 (2,'idea',1,''),
 (3,'job',1,''),
 (4,'money',1,''),
 (5,'code example',1,'code-example'),
 (6,'code',1,''),
 (7,'codeigniter',1,''),
 (8,'php',1,''),
 (9,'stress',1,''),
 (10,'friends',1,''),
 (11,'friend',1,''),
 (12,'barbecue',1,''),
 (13,'work',1,''),
 (14,'daniel bean films',1,''),
 (15,'my brother',1,''),
 (16,'my mom',1,''),
 (17,'my family',1,''),
 (18,'my son',1,''),
 (19,'my wife',1,''),
 (20,'gracie',1,''),
 (21,'twitter',1,''),
 (22,'facebook',1,''),
 (23,'reddit',1,''),
 (24,'brasil',1,''),
 (25,'brazil',1,''),
 (26,'web design',1,''),
 (27,'mobile technology',1,''),
 (28,'technology',1,''),
 (29,'MySQL',1,''),
 (30,'SQL',1,''),
 (31,'MSSQL',1,''),
 (32,'Today I Learned',1,''),
 (33,'TIL',1,''),
 (34,'Android',1,''),
 (35,'iPhone',1,''),
 (36,'Apple',1,''),
 (37,'Google',1,''),
 (38,'john',1,''),
 (39,'boy',0,''),
 (40,'rocks',1,''),
 (41,'dog',1,''),
 (42,'fart',1,''),
 (43,'daphodiles',1,''),
 (44,'test friendly',1,'test-friendly'),
 (45,'OtherTag',1,'OtherTag'),
 (46,'OtherTag2',1,'OtherTag2');
/*!40000 ALTER TABLE `tagtypes` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(105) NOT NULL,
  `password` varchar(105) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES  (1,'milespickens@gmail.com','944d5e420c56fe452468f814dd6911d6a8c58afb','0.71711100 1316544642',1,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
