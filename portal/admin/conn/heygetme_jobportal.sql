-- MySQL dump 10.13  Distrib 5.6.28, for Linux (x86_64)
--
-- Host: 66.85.152.3    Database: heygetme_jobportal
-- ------------------------------------------------------
-- Server version	5.6.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(256) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `status_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `admin_user_date` datetime NOT NULL,
  PRIMARY KEY (`admin_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@admin.com','admin','1234567890','admin',2,5,'2011-03-14 11:15:18');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) NOT NULL,
  `binfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,0,'India','2015-11-18 21:38:11'),(2,0,'USA','2015-11-18 21:38:27'),(3,1,'Delhi','2015-11-18 21:39:03'),(4,2,'Newyork','2015-11-18 21:38:59'),(5,1,'Gurgaon','2015-11-18 21:39:41'),(6,1,'Mumbai','2015-11-18 21:39:39'),(8,1,'Rohtak','2015-11-18 22:38:55');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL COMMENT 'State ID',
  `cid` int(11) NOT NULL COMMENT 'Country ID',
  `city_name` varchar(256) NOT NULL,
  `city_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,2,1,'Old Delhi','2015-11-18 21:11:47'),(2,2,1,'New Delhi','2015-11-18 21:11:58'),(3,1,1,'Gurgaon','2015-11-18 21:12:06'),(4,3,1,'Mumbai','2015-11-18 21:12:18'),(5,4,1,'Amritsar','2015-11-18 21:12:45');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmspage`
--

DROP TABLE IF EXISTS `cmspage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmspage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `page_content` text NOT NULL,
  `status` varchar(21) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmspage`
--

LOCK TABLES `cmspage` WRITE;
/*!40000 ALTER TABLE `cmspage` DISABLE KEYS */;
INSERT INTO `cmspage` VALUES (1,'Our Services','Our Services','Our Services','Our Services','<p>\r\n	We provide various types of services</p>\r\n','Active','2015-11-30'),(3,'Contact Us','Contact Us','Contact Us','Contact Us','<p>\r\n	Kindly contact us at below mentioned phone numbers, during office working hours 10am to 7pm.&nbsp;</p>\r\n<p>\r\n	Thanks.&nbsp;</p>\r\n<p>\r\n	<strong>Mobile: +91-9582484715</strong></p>\r\n','Active','2015-11-30'),(4,'Who We Are','Who We Are','Who We Are','Who We Are','<p>\r\n	Who We Are:</p>\r\n<p>\r\n	One of the fastest growing IT comapny in north Inida.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Provides various types of services.</p>','Active','2015-11-30'),(5,'Case Studies','Case Studies','Case Studies','Case Studies','\r\n	<span style=\\\"font-size: 12px;\\\">Coming Soon Page....</span>\r\n','Active','2015-11-30'),(6,'About Us','About Us','About Us','About Us','<p>\r\n	About Us</p>','Active','2015-11-30'),(7,'Our History','Our History','Our History','Our History','<p>\r\n	Our History</p>','InActive','2015-11-30'),(8,'Our leadership','Our leadership','Our leadership','Our leadership','<p>\r\n	Our leadership</p>','InActive','2015-11-30'),(9,'Our Sponsorships','Our Sponsorships','Our Sponsorships','Our Sponsorships','<p>\r\n	Our Sponsorships</p>','Active','2015-11-30'),(10,'Terms & Conditions','Terms & Conditions','Terms & Conditions','Terms & Conditions','<p>\r\n	Terms &amp; Conditions</p>','InActive','2015-11-30');
/*!40000 ALTER TABLE `cmspage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(51) NOT NULL,
  `code` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'India','IN'),(2,'Australia','AUS'),(3,'United States','USA'),(4,'Great Britain','UK');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `objective` text NOT NULL,
  `work_experience` varchar(100) NOT NULL,
  `total_experience` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `industry` int(11) NOT NULL,
  `functional_area` int(11) NOT NULL,
  `current_job_date` varchar(100) NOT NULL,
  `qualification` int(11) NOT NULL,
  `specialization` int(11) NOT NULL,
  `institute` varchar(251) NOT NULL,
  `passout` varchar(100) NOT NULL,
  `course` varchar(51) NOT NULL,
  `key_skills` text NOT NULL,
  `resume` varchar(251) NOT NULL,
  `profilepic` varchar(251) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_info`
--

LOCK TABLES `employee_info` WRITE;
/*!40000 ALTER TABLE `employee_info` DISABLE KEYS */;
INSERT INTO `employee_info` VALUES (1,1,1,1,1,'Female','My aim is to be an excellent developer.','Fresher','2','5','Software Engineer','BluePi',1,1,'2015/07/01',1,1,'CDLM Govt. Engg. College','2013','Full Time','Java, PHP, Html, Css','1448386027Shakti.png','ChaudharySaab.jpg');
/*!40000 ALTER TABLE `employee_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_info`
--

DROP TABLE IF EXISTS `employer_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `company_type` varchar(21) NOT NULL,
  `industry` int(11) NOT NULL,
  `contact_number` varchar(51) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_info`
--

LOCK TABLES `employer_info` WRITE;
/*!40000 ALTER TABLE `employer_info` DISABLE KEYS */;
INSERT INTO `employer_info` VALUES (1,3,'H.NO 51, 2ND FLOOR',1,2,2,0,'Consultant',1,'012488830','SushilK','1448468458Sushil.jpg');
/*!40000 ALTER TABLE `employer_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(255) NOT NULL,
  `einfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,'1 Yrs','Min 1 yr..','2015-11-18 23:11:43'),(2,'5 Yrs','5 year minimum experirnece..','2015-11-18 23:12:36');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `functionalarea`
--

DROP TABLE IF EXISTS `functionalarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `functionalarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL COMMENT 'Industry ID',
  `fname` varchar(255) NOT NULL,
  `finfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `functionalarea`
--

LOCK TABLES `functionalarea` WRITE;
/*!40000 ALTER TABLE `functionalarea` DISABLE KEYS */;
INSERT INTO `functionalarea` VALUES (1,1,'JAVA Expert','Need JAVA Experts ','2015-11-19 20:36:17'),(3,1,'JAVA Experts','hdhddh','2015-11-22 21:51:58');
/*!40000 ALTER TABLE `functionalarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iname` varchar(255) NOT NULL,
  `iinfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry`
--

LOCK TABLES `industry` WRITE;
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
INSERT INTO `industry` VALUES (1,'IT','Information Technology','2015-11-19 20:24:46'),(2,'Construction','Construction Comapnies','2015-11-19 20:25:26');
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `jid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `num_vacancy` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `total_experience` varchar(11) NOT NULL,
  `skills` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `salary_info` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `industry` int(11) NOT NULL,
  `functional_area` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `specialization` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `about_company` text NOT NULL,
  `webiste` varchar(51) NOT NULL,
  `contact_person` varchar(101) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(51) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contract_type` varchar(211) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (4,3,'Software ENgg','10','Software ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest testSoftware ENgg\r\nGurgaon, Haryana, India\r\ntest test','1','java, php, html','5','1sjknxas',1,1,3,1,1,1,1,'ZnzM','ashbdkasdasdas\r\ndas\r\nd','askas','JXSCNSD','SAJKAJSA','01248883','hr@company.com','Full-Time','2015-12-01'),(6,4,'f sd lhfsdf','2','bdksnf lsd fs df\'sd\r\nfsdfsd\r\nfsdf ds\r\nfsd\r\nf','3','php, jaba','5','1sjknxas',2,1,3,0,0,0,0,'','','','','','','','Part-Time','0000-00-00'),(7,4,'f sd lhfsdf','2','bdksnf lsd fs df\'sd\r\nfsdfsd\r\nfsdf ds\r\nfsd\r\nf','1','html, jaba','5','1sjknxas',2,1,3,0,0,0,0,'','','','','','','','','0000-00-00');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_apply`
--

DROP TABLE IF EXISTS `jobs_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_apply`
--

LOCK TABLES `jobs_apply` WRITE;
/*!40000 ALTER TABLE `jobs_apply` DISABLE KEYS */;
INSERT INTO `jobs_apply` VALUES (1,3,4,'2015-12-22'),(3,1,4,'2015-12-23');
/*!40000 ALTER TABLE `jobs_apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locality`
--

DROP TABLE IF EXISTS `locality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locality` (
  `locality_id` int(11) NOT NULL AUTO_INCREMENT,
  `locality_name` varchar(256) NOT NULL,
  `city_id` int(11) NOT NULL,
  `current_rate_psf` int(11) NOT NULL,
  `locality_info_file` text NOT NULL,
  `locality_map_file` text NOT NULL,
  `locality_date` datetime NOT NULL,
  PRIMARY KEY (`locality_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locality`
--

LOCK TABLES `locality` WRITE;
/*!40000 ALTER TABLE `locality` DISABLE KEYS */;
/*!40000 ALTER TABLE `locality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid_fb` varchar(22) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `profession_id` int(11) NOT NULL,
  `email_id` text NOT NULL,
  `is_logged_previous` int(11) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `address1` varchar(256) NOT NULL,
  `city` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `user_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3834 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (187,'100001544516475','Rahul Dhingra',0,'rdhingra61@gmail.com',0,'','',2,'',0,0,'2012-01-19'),(344,'','R K SINGH',0,'rksingh51@yahoo.co.in',1,'nkrk0usrs','',2,'',0,0,'2012-04-07'),(345,'','Akesh Jain',0,'akeshjain@gmail.com',1,'ajisaj123','9999477288',2,'',0,0,'2012-04-07'),(346,'','sumit gugnani',0,'sumit.gugnani@indiatimes.co.in',1,'sairam','9891318448',2,'',0,0,'2012-04-09'),(39,'','Rohit Vohra',3,'rohitvohra@gmail.com',0,'nonu12','2244360363',2,'9048 W Church St\r\nApt 2E\r\nDes Plaines\r\nIL 60016\r\nUSA',4,0,'2011-07-14'),(40,'','Jitendra Singh',5,'jitendra.s@sbi.co.in',0,'MANJIT!2','9869572241',2,'VILL- PALSERA\r\nDIST-ALIGARH\r\nU.P.',9,0,'2011-07-14'),(41,'','Sunil',3,'qualitex@gmail.com',1,'qualitex','9971776928',2,'Sohna road\r\nGurgaon',2,0,'2011-07-14'),(42,'','alpana das',5,'prithdan@gmail.com',0,'alpanadas','9810974192',2,'I-812 Jal Vayu Towers sector-56,Gurgaon, Haryana-122011',2,0,'2011-07-14'),(45,'','Aparna Srivastava',5,'aparna.srivastava@gmail.com',0,'aparna123','9811234594',2,'M-12, Ist Floor, Hari Nagar, New Delhi - 64',4,0,'2011-07-14'),(47,'','Bijender Sharma',5,'bijender_sharma1967@yahoo.com',0,'bj1967','9717499991',2,'Pitampura',5,0,'2011-07-15'),(49,'','g s dudeja',5,'gsdudeja@rediffmail.com',1,'gsdudeja','09004499003',2,'138 badhwarpark colaba mumbai',2,0,'2011-07-15'),(52,'','pranav verma',5,'pranav.verma@live.com',0,'surinder99','9833169372',2,'House No 4-41 DLF Phase 2 Gurgaon',2,0,'2011-07-15'),(53,'','Mahesh Khiwal',5,'mkkhiwal@hotmail.com',0,'12345678','9321350919',2,'lsg\\\'lk dggllkgds',2,0,'2011-07-15'),(54,'','shikhar awasthi',5,'shikharawasthi@rediffmail.com',0,'abcdef','8290041988',2,'10, JLN marg, jaipur',2,0,'2011-07-15'),(55,'','vibha gupta',5,'vibha_shree23@yahoo.co.in',0,'tarus1983','9971103941',2,'orchid patels sohna road gurgaon',2,0,'2011-07-15'),(56,'','anupama',5,'anupama.verma@sbi.co.in',0,'bobbie0409','9501300737',2,'817/48a\r\nchandigarh',2,0,'2011-07-15'),(57,'','nikhil garg',5,'canikhilgarg10@gmail.com',0,'nikhilinagra','8010173768',2,'f-186 a1,agrawal house,laxmi nagar, new delhi 110092',9,0,'2011-07-15'),(58,'','DEBASHISH MANDAL',3,'devaonline@yahoo.com',0,'change','9810098100',2,'dert\r\n234 frtyh\r\ndefthyterefs - 89',2,0,'2011-07-15'),(60,'','Jagdish Rathi',4,'jagdishrathi15@gmail.com',0,'seemarathi','8445356120',2,'rathi sarees,punjabi market,saharanpur,U.P',4,0,'2011-07-15'),(61,'','JITENDER KUMAR',3,'jitu_jiet@yahoo.co.in',0,'sudha@2615','9910396921',2,'147ff, sec 40',2,0,'2011-07-16'),(62,'','Thimmappa Gowda',5,'gowdatj@yahoo.com',0,'tg7771','09906904649',2,'baribrahmana jammu',4,0,'2011-07-16'),(63,'','pankaj',3,'pankajdjain@gmail.com',0,'rolta456','9833885772',2,'noida',4,0,'2011-07-16'),(65,'','himanshu',5,'himanshunarang@hotmail.com',0,'15june2k21','9910248081',2,'Plot no. GP5, Sec 18',2,0,'2011-07-16'),(66,'','ALOK SINHA',5,'bairana1954@rediffmail.com',0,'karobi60','919415614848',2,'75/62, new bairhana,\r\nallahabad -211003',4,0,'2011-07-16'),(67,'','abhishek',3,'ariesapes@yahoo.com',0,'appu007','9958889494',2,'gurgaon',2,0,'2011-07-16'),(70,'','yogesh',3,'ycupadhyay@hotmail.com',0,'srijan2208','9582729299',2,'Faridabad',4,0,'2011-07-17'),(71,'','MANOJ VERMA',5,'manoj_verma23@yahoo.com',0,'tatasafari','9034862879',2,'accts sqn\r\naf stn\r\nambala',2,0,'2011-07-17'),(72,'','ashok',5,'ashokji11@yahoo.co.in',0,'ak123456','9316338569',2,'dwarka delhi',4,0,'2011-07-17'),(74,'','arun',5,'arunkumaruhbvn@gmail.com',0,'arunk50','9988228589',2,'23/7 chandigarh',2,0,'2011-07-17'),(75,'','Saurabh Goel',3,'Saurabh.ca.cpt@gmail.com',0,'mission10kpd','9759390779',2,'Jagrati Vihar, Meerut',4,0,'2011-07-17'),(76,'','Deepak Singla',5,'deepak.singhla@bharti-retail.in',0,'sixsigma','8800500759',2,'C-45, Sector - 14, Gurgaon',2,0,'2011-07-17'),(79,'','Hasnain',4,'hlala@hotmail.com',0,'sabsan','9820352355',2,'1234567890',2,0,'2011-07-18'),(80,'','M K Gupta',3,'guptamkbarc@rediffmail.com',0,'Saksham95','9869965726',2,'Yamuna A-18,\r\nAnushakti Nagar,\r\nMumbai-400094',4,0,'2011-07-18'),(82,'','rahul',4,'rahul84_sharma@yahoo.in',0,'@sunder24','9013550086',2,'37',4,0,'2011-07-18'),(84,'','sanjib kumar sahoo',3,'sanjibme98@yahoo.com',0,'Sanjib123','9811685758',2,'95, Institutional Area\r\nSec-32, Gurgaon',2,0,'2011-07-19'),(85,'','NITIN SHARMA',5,'nitin27sharma@gmail.com',0,'ANGEL2711','9711174948',2,'C-67, 1st Floor, Ardee City, Sector-52, Gurgaon - 122011',2,0,'2011-07-21'),(87,'','vibhor',3,'mahajan.vibhor@gmail.com',0,'vibhor18','911204366857',2,'sector127',4,0,'2011-08-01'),(90,'','Harvinder Singh',5,'hvs1980@yahoo.co.in',0,'hvs12345','9891153702',2,'delhi',2,0,'2011-08-08'),(379,'516895421','Vikash Samota',0,'vikash.samota@gmail.com',0,'','',2,'Gurgaon, Haryana',0,0,'2012-05-03'),(98,'','b s yadav',5,'bsbhatotia@yahoo.com',0,'bhimsingh','9968840362',2,'sector-14 gurgaon',2,0,'2011-08-22'),(99,'','om gulia',5,'om.gulia@rediffmail.com',0,'ompras','7698006902',2,'col op gulia\r\n2972, sect 23 \r\ngurgaon',2,0,'2011-08-26'),(100,'','Piyush Deora',5,'piyush_nanu@yahoo.co.in',0,'piyushld','9920085385',2,'Sunder Nagar, Malad West, Mumbai',2,0,'2011-08-28'),(101,'','Abhishek',5,'abhi.shukla@gmail.com',0,'quantanium','8130882839',2,'IFCI Tower',2,0,'2011-09-08'),(102,'','Avinash Kumar',3,'avinash243@yahoo.com',0,'jamalpur','9718588901',2,'D-20, Ganesh Nagar, Pandav Nagar Complex, Delhi-1100992',4,0,'2011-09-13'),(121,'','Mukender singh',0,'jonseo.jaan@gmail.com',1,'no71no71','9899332119',2,'Mukender singh s\\o sh.Mahasingh, V.P.O.fazilpur(jharsha)diss.- gurgaon(H.R.)- 122001',0,0,'2011-12-13'),(124,'','Bhupendra Kumar Dwivedi',0,'bhupendra.dwi21@gmail.com',1,'9990010607','9716838626',2,'Village - Sagauni, Post - Tapa\r\n \r\nTehshil Rampur Baghelan\r\n \r\nDisttrict - Satna 485115\r\n \r\nMadhya Pradesh\r\n \r\nINDIA',0,0,'2011-12-14'),(134,'','Pranay Kumar Dokania',0,'pranay.dokania@bmindia.com',0,'00kumard','9702333375',2,'Mahim',0,0,'2011-12-18'),(372,'','harsh gulati',0,'harshgulati099@gmail.com',0,'1mHv89','9810569099',2,'',0,0,'2012-04-26'),(313,'','Sumit Gugnani',0,'sumit.gugnani@gmail.com',0,'UZYkVP','9891318448',2,'',0,0,'2012-04-03'),(141,'1308652276','Sudhir Yadav',0,'sudhir_yadav18@rediffmail.com',0,'','',2,'',0,0,'2012-01-23'),(142,'','Ranjit',0,'rsaha123@gmail.com',1,'zEVHv5','9818808796',2,'',0,0,'2011-12-28'),(367,'','s L Malik',0,'asian.consultants@gmail.com',0,'QRkLFJ','09810123574',2,'',0,0,'2012-04-23'),(144,'','RAJIV',0,'drrajiv2011@gmail.com',1,'EI3pQk','9891137742',2,'',0,0,'2011-12-31'),(146,'','Jitendra Choudhury',0,'jk.choudhury@msn.com',1,'jitukc','9762949430',2,'Gurgaon',0,0,'2012-01-02'),(147,'','Nirmal Kumar',0,'varshneyiet@rediffmail.com',1,'yashi1','9897788394',2,'',0,0,'2012-01-04'),(363,'','DEEPAK SINGH',0,'deepak27@gmail.com',0,'z0VvzA','',2,'',0,0,'2012-04-19'),(361,'','Anand V Khadkikar',0,'its_mannu@rediffmail.com',1,'zuD1z7','',2,'',0,0,'2012-04-18'),(161,'','Ashish Kumar',0,'ashishjha5615@gmail.com',0,'CdLrG2','9811370107',2,'',0,0,'2012-01-08'),(165,'','shitij',0,'mrmalhotra@gmail.com',0,'x7l4Sx','9818306050',2,'',0,0,'2012-01-10'),(169,'','Vikas Singh',0,'vickas_d@yahoo.com',0,'gXv9VL','9650008262',2,'',0,0,'2012-01-13'),(338,'','nitin',0,'ng2006@gmail.com',0,'Qo8aCl','9540727919',2,'',0,0,'2012-04-05'),(174,'','Manu',0,'Manuairan@gmail.com',0,'IiYZ9c','',2,'',0,0,'2012-01-16'),(348,'','pooja',0,'pooja@primepune.com',1,'prime123','',2,'',0,0,'2012-04-10'),(342,'','v.sundararaman',0,'vsundar213@gmail.com',0,'nbnuRZ','9971399049',2,'',0,0,'2012-04-05'),(189,'','Mohd. Zeeshan',0,'zeshan.alig@gmail.com',1,'bddyfb','7827659063',2,'',0,0,'2012-01-21'),(341,'','Mona Lisa',0,'indiancounty@cheerful.com',0,'2kYmsl','9810709790',2,'',0,0,'2012-04-05'),(340,'','AMIT SETHI',0,'amit161277@gmail.com',1,'01100011','9818786786',2,'',0,0,'2012-04-04'),(194,'100002263620016','Ghaalib Gurzar',0,'grtgur@rediffmail.com',0,'','',2,'',0,0,'2012-01-23'),(329,'','G D BINNANI',0,'gdb@bhagwatitex.com',1,'rajesh9479','9377993093',2,'',0,0,'2012-04-04'),(328,'','Ajay',0,'ajay_maidasani@rediffmail.com',1,'IKZvXL','9650992104',2,'',0,0,'2012-04-04'),(218,'','sanjeev yadav',0,'yadsanjeev@gmail.com',1,'14cFQ3','919907333690',2,'',0,0,'2012-01-25'),(327,'','Kuldiip Rastogi',0,'sansomchem@gmail.com',1,'chempharma','98110 60596',2,'',0,0,'2012-04-04'),(325,'','Mohit Sain',0,'mohit_sain@hotmail.com',1,'shatranj','',2,'',0,0,'2012-04-04'),(324,'','Vikram Sharma',0,'vikram_shr@yahoo.com',1,'ganeshaa','',2,'',0,0,'2012-04-04'),(323,'','A.DATTA',0,'dattaavi@yahoo.com',0,'ycO55L','',2,'',0,0,'2012-04-03'),(226,'','team',0,'teamply01@gmail.com',0,'$teamply01','',2,'',0,0,'2012-01-30'),(320,'','Harsh Khurana',0,'harsh.khurana83@gmail.com',0,'8XVGaj','',2,'',0,0,'2012-04-03'),(319,'','Hema',0,'hema.datt@gmail.com',1,'earn7899','8097219599',2,'',0,0,'2012-04-03'),(316,'','nikki',0,'nikki@21flats.com',0,'bagatkikoti','',2,'',0,0,'2012-04-03'),(245,'','kamalesh rai',0,'iocl.rai@gmail.com',1,'kamal#64','',2,'',0,0,'2012-02-10'),(315,'','AJAY KR LOHIA',0,'shantiinfotech@gmail.com',1,'ritu1234','9312634000',2,'',0,0,'2012-04-03'),(311,'','capt rajesh singhal',0,'rajsinghal57@yahoo.com',1,'821957','9619700561',2,'',0,0,'2012-04-03'),(260,'','ashley',0,'ashley.abreu@gmail.com',0,'JFrFGp','7845815382',2,'',0,0,'2012-02-19'),(263,'','Sunil',0,'sunilgupta73@gmail.com',0,'o7kbry','9818569399',2,'',0,0,'2012-02-21'),(265,'','peterdaive',0,'abercrombiefitch4@gmail.com',1,'123456szl','123564898654',2,'',0,0,'2012-02-22'),(271,'','Vipin Gupta',0,'vkgupta4@gmail.com',0,'2JiTf6','9910260088',2,'',0,0,'2012-02-26'),(296,'','Abhinandan',0,'abhinandan2909@gmail.com',1,'KReRyX','9717703451',2,'',0,0,'2012-03-26'),(297,'','Kumar Abhinav',0,'findabhinav@gmail.com',0,'dCaVYX','9811873286',2,'',0,0,'2012-03-26'),(299,'','LM DARLONG',0,'lmdarlong@gmail.com',0,'B3xPG1','9958919595',2,'',0,0,'2012-03-27'),(472,'','ashish sharma',0,'ashishsharma123@yahoo.com',0,'mVWe8Y','9991779444',2,'',0,0,'2012-05-13'),(486,'','ashish sharma',0,'ashishsharma1234@yahoo.com',1,'59179356','9991779444',2,'',0,0,'2012-05-13'),(502,'','Parmeshwar',0,'paramhrd@rediffmail.com',0,'Zki6lJ','09719419964',2,'',0,0,'2012-05-14'),(551,'','Kishan Lal',0,'kraturi03@gmail.com',0,'pK9a4v','9013502528',2,'',0,0,'2012-05-17'),(868,'','Roopak',0,'roopak401@gmail.com',1,'4RxBVp','9971364749',2,'',0,0,'2012-05-30'),(980,'100000135667233','Bhav Patel',0,'patel.bhavesh870@gmail.com',0,'','',2,'',0,0,'2012-06-06'),(983,'','sm',0,'sm@mailinator.com',1,'lqiSav','9999999999',2,'',0,0,'2012-06-06'),(1005,'','Amit Jain',0,'jamitjain30@gmail.com',1,'JeqN2d','',2,'',0,0,'2012-06-07'),(1024,'','abhimanyu Sanga',0,'abhimanyu@21flats.com',1,'abhimanyu','9891651413',2,'',0,0,'2012-06-08'),(1094,'100000872174906','Er Sushil Kandola',0,'sushilkandola.88@gmail.com',0,'','',2,'',0,0,'2012-12-26'),(1282,'','vivek vishvkarma',0,'vivekexide@yahoo.co.in',0,'21ipX9','09992118286',2,'',0,0,'2012-06-25'),(1286,'','Sanjay Sharma',0,'sanjay.sharma77@gmail.com',1,'sanjay1976','9967365326',2,'',0,0,'2012-06-26'),(1408,'','Pankaj',0,'Pankajbatra12911@gmail.com',0,'XohIvi','',2,'',0,0,'2012-07-04'),(1593,'','rajan',0,'rajan72armd@yahoo.com',0,'8TrKpa','09419024932',2,'',0,0,'2012-07-16'),(1610,'100001822251929','Rajesh Ahuja',0,'rajeshahuja72@yahoo.com',0,'','',2,'',0,0,'2012-07-18'),(1640,'','pradip',0,'pradippal1@gmail.com',0,'WrOJ83','9868978451',2,'',0,0,'2012-07-20'),(1790,'839728503','Manuj D Sharma',0,'manbab@gmail.com',0,'','',2,'',0,0,'2012-07-31'),(1808,'100004136434209','Preeti Raizada',0,'preeti.raizada20@gmail.com',0,'','',2,'',0,0,'2012-08-01'),(1810,'','p',0,'preeti.cyberlinks@gmail.com',1,'Global234','',2,'',0,0,'2012-07-31'),(1812,'','aaa',0,'ahsan.aas@gmail.com',1,'roshanaraa','',2,'',0,0,'2012-08-01'),(1840,'','Sushil Kandola',0,'sushil.kandola@cyberlinks.in',1,'sushil','',2,'',0,0,'0000-00-00'),(1916,'','Omkaar',0,'ravi.agni@gmail.com',1,'lawyer','9988776655',2,'',0,0,'2012-08-08'),(2132,'100003999131170','Deepak Tanwar',0,'919899653167',0,'','',2,'',0,0,'2012-08-21'),(2198,'','nuzenrene',0,'bjbelievesex@feeladult.com',0,'PgsbJk','1-810-4700',2,'',0,0,'2012-08-26'),(2199,'','dnfldraft',0,'ooncesex@kissadulttoys.com',0,'uD0PLN','1-810-4700',2,'',0,0,'2012-08-26'),(2200,'','etschebran',0,'bwkissadulttoys@brightadult.com',0,'XOFEvO','1-810-4700',2,'',0,0,'2012-08-27'),(2201,'','larthelembran',0,'bjfeeladult@feeladult.com',0,'XtTxQf','1-810-4700',2,'',0,0,'2012-08-27'),(2202,'','etovorelrigo',0,'slinkadulttoys@kissadulttoys.com',0,'Rou7fZ','1-810-4700',2,'',0,0,'2012-08-27'),(2204,'','wnvywalto',0,'vbrightadult@loginadulttoys.com',0,'mco2ve','0760910080',2,'',0,0,'2012-08-27'),(2205,'','ebatistebatiste',0,'chpickadulttoys@oncesex.com',0,'FE9bGg','1-810-4700',2,'',0,0,'2012-08-27'),(2206,'','krylackszache',0,'cikissadulttoys@oncesex.com',0,'5qkqZU','1-202-320',2,'',0,0,'2012-08-27'),(2207,'','nportunerose',0,'bjonsaleadult@feeladult.com',0,'Bzdpth','1-810-4700',2,'',0,0,'2012-08-27'),(2208,'','norenvere',0,'bploginadulttoys@feeladult.com',0,'clzhAJ','0760910080',2,'',0,0,'2012-08-27'),(2209,'','rtabberttawa',0,'cgloginadulttoys@oncesex.com',0,'kBskfV','1-202-328 2516',2,'',0,0,'2012-08-27'),(2211,'','Jaydeep',0,'jaydeep_mensa@hotmail.com',1,'aOXQDS','9963026715',2,'',0,0,'2012-08-28'),(2213,'','topptomm',0,'ablinkadulttoys@loginadulttoys.com',0,'A39LVW','800-810-4700',2,'',0,0,'2012-08-28'),(2214,'','orythrozacha',0,'cclinkadulttoys@oncesex.com',0,'QTjUCz','1-202-328 2516',2,'',0,0,'2012-08-28'),(2215,'','ovuittonlouis',0,'cmkissadulttoys@believesex.com',0,'taLefz','1-810-4700',2,'',0,0,'2012-08-28'),(2218,'','anuj',0,'anujpi@rediffmail.com',0,'ej19Ld','+18188354966',2,'',0,0,'2012-08-30'),(2301,'','Sk',0,'Sunil82.adv@gmail.com',0,'MWhURM','09416714547',2,'',0,0,'2012-09-08'),(2305,'','Amit Aggarwal',0,'amits.aggarwal@gmail.com',0,'XNE6Q5','',2,'',0,0,'2012-09-08'),(2405,'','deepak',0,'deepaktanwar1327@gmail.com',0,'2PpwVv','9953045252',2,'',0,0,'2012-11-16'),(2408,'','R K Verma',0,'rkverma6354@gmail.com',0,'UY9OiC','9477702067',2,'',0,0,'2012-09-25'),(2413,'','jitendera singh',0,'victorjitu@yahoo.co.in',0,'ck7cbj','7355921776',2,'',0,0,'2012-09-27'),(2418,'','ashish jain',0,'ashishjain.cfp@gmail.com',0,'eYBSvy','8800930111',2,'',0,0,'2012-09-29'),(2427,'','Dinesh Kathuria',0,'dineshkathuria@gmail.com',1,'AHufFF','',2,'',0,0,'2012-10-07'),(2428,'','sandhya',0,'sanjairai@sify.com',1,'01071973','9408133571',2,'',0,0,'2012-10-09'),(2434,'','chander parkash',0,'chandra6028@gmail.com',0,'d5nWoY','7891468125',2,'',0,0,'2012-10-20'),(2435,'','Pushpender Kumar',0,'pushpender.kumar@airarmada.in',1,'J39MQM','9540920777',2,'',0,0,'2012-10-20'),(2437,'','virendra',0,'architectvirendrashekhawat@yahoo.co.in',1,'manisha','9819202902',2,'',0,0,'2012-10-25'),(2440,'','sumit',0,'vohra_sumit@hotmail.com',1,'NGIqwK','',2,'',0,0,'2012-10-28'),(2449,'','Deepak',0,'deepaktanwar1327@yahoo.com',1,'21flats','',2,'',0,0,'2012-11-08'),(2450,'100003911557963','Dev Kundu',0,'dkdavidking47@gmail.com',0,'','',2,'',0,0,'2012-11-08'),(2456,'','rindorfanib',0,'haoyuelang1983@126.com',0,'Qa1Mmd','800-810-4700',2,'',0,0,'2012-11-18'),(2462,'','Vishal',0,'vishal.sutar758@gmail.com',1,'123456','9028546958',2,'',0,0,'2012-11-20'),(2463,'100002629038608','Lovely Nancy',0,'testingdeveloper1@gmail.com',0,'','',2,'',0,0,'2013-01-28'),(2469,'100000538420661','Jams Kriti',0,'jams.kriti@gmail.com',0,'','',2,'Santa Clara, California',0,0,'2013-01-28'),(2470,'','sumit',0,'asachcs@gmail.com',1,'yt2AYB','004917662567727',2,'',0,0,'2012-12-03'),(2471,'','aaneaugu',0,'sdj200168@163.com',0,'e3v6oP','1-202-320',2,'',0,0,'2012-12-07'),(2475,'','manoj k kakkar',0,'manoj.kakkar@cyberlinks.in',1,'kakkar','9873383823',2,'',0,0,'2013-01-23'),(2478,'','Pradeep Dhankhar',0,'pradeepdhankhar001@gmail.com',1,'455hindustan','9996980090',2,'',0,0,'2012-12-29'),(2480,'','murli sharma',0,'murlidsharma@gmail.com',1,'gHEArg','',2,'',0,0,'2013-01-03'),(3833,'','Sushil Kandola',0,'sushil.kandola@cyberlinks.co.in',1,'cyberlinks','',2,'',0,0,'2013-01-29');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profession`
--

DROP TABLE IF EXISTS `profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profession`
--

LOCK TABLES `profession` WRITE;
/*!40000 ALTER TABLE `profession` DISABLE KEYS */;
INSERT INTO `profession` VALUES (1,'doctor'),(2,'teacher'),(3,'engineer'),(4,'business man'),(5,'other');
/*!40000 ALTER TABLE `profession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qname` varchar(255) NOT NULL,
  `qinfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification`
--

LOCK TABLES `qualification` WRITE;
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
INSERT INTO `qualification` VALUES (1,'B. tech','Bachelor of Tech','2015-11-19 19:37:19'),(4,'BA','Bachelor of Arts','2015-11-19 19:40:48');
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialization`
--

DROP TABLE IF EXISTS `specialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL COMMENT 'Qualification ID',
  `sname` varchar(255) NOT NULL,
  `sinfo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialization`
--

LOCK TABLES `specialization` WRITE;
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;
INSERT INTO `specialization` VALUES (1,1,'Software Engg.','Software Engg.','2015-11-19 19:42:30'),(3,4,'Arts & Music','Music Teacher','2015-11-19 19:41:48'),(4,1,'Civil Enginnering','Civil Enginnering','2015-11-19 19:42:05');
/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(51) NOT NULL,
  `code` varchar(11) NOT NULL,
  `cid` int(11) NOT NULL COMMENT 'Country ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Haryana','HRY',1),(2,'Delhi','DL',1),(3,'Maharashtra','MH',1),(4,'Punjab','PB',1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(256) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'INACTIVE'),(2,'ACTIVE'),(3,'CLOSED'),(4,'ALLOCATED'),(5,'BOOKED'),(7,'BUYER'),(8,'INTERESTED'),(9,'NOT INTERESTED'),(10,'VERY INTERESTED');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(51) NOT NULL,
  `emailid` varchar(51) NOT NULL,
  `password` varchar(211) NOT NULL,
  `mobile` varchar(51) NOT NULL,
  `utype` enum('employee','employer') NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sushil G','sushilg','8bb11c9045fb66ad847521e3ab5aa91a','+919582484715','employee','2015-11-27 13:02:00'),(3,'Sushil K','sushilk','2d85cca36350b616bbde91e978a42f3e','+919582484715','employer','2015-11-24 23:04:14'),(4,'teena','sweetcoolraishu@gmail.com','4668fac53d3d64014f789c68eeb63332','9898989898','employee','2016-01-04 18:04:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-09  5:48:11
