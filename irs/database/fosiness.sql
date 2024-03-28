/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : fosiness

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-19 13:05:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` varchar(64) NOT NULL,
  `countryid` int(11) NOT NULL,
  `regionid` int(11) NOT NULL,
  `city` varchar(32) NOT NULL,
  `pincode` varchar(16) DEFAULT NULL,
  `addline1` varchar(512) DEFAULT NULL,
  `addline2` varchar(128) DEFAULT NULL,
  `createdts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `add_countryid_fk_idx` (`countryid`),
  KEY `add_regionid_fk_idx` (`regionid`),
  CONSTRAINT `add_countryid_fk` FOREIGN KEY (`countryid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `add_regionid_fk` FOREIGN KEY (`regionid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for `alerts`
-- ----------------------------
DROP TABLE IF EXISTS `alerts`;
CREATE TABLE `alerts` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_type` varchar(191) DEFAULT NULL,
  `alert_tag` varchar(191) DEFAULT NULL,
  `alert_message` text,
  `alert_status` varchar(25) DEFAULT NULL,
  `alert_created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `alert_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alerts
-- ----------------------------

-- ----------------------------
-- Table structure for `bucket`
-- ----------------------------
DROP TABLE IF EXISTS `bucket`;
CREATE TABLE `bucket` (
  `id` varchar(64) NOT NULL,
  `bucket_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `bucket_type` varchar(45) DEFAULT NULL,
  `parentid` varchar(45) DEFAULT NULL,
  `employerid` varchar(64) DEFAULT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `bucket_limit` int(11) DEFAULT NULL,
  `icon_url` varchar(100) DEFAULT NULL,
  `sequence_no` int(11) DEFAULT NULL,
  `fromdate` datetime DEFAULT NULL,
  `thrudate` datetime DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `updatedby` varchar(45) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bucket_multifld_idx` (`jobid`,`employerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bucket
-- ----------------------------

-- ----------------------------
-- Table structure for `client_details`
-- ----------------------------
DROP TABLE IF EXISTS `client_details`;
CREATE TABLE `client_details` (
  `id` varchar(64) NOT NULL,
  `secret` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `redirect_uri` varchar(1024) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientdtl_secret_idx` (`secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of client_details
-- ----------------------------

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `contactid` varchar(64) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `contact_type` varchar(32) DEFAULT NULL,
  `starred` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contacts_unique_idx` (`userid`,`contactid`),
  KEY `contacts_userid_fk_idx` (`userid`),
  KEY `contacts_contactid_fk_idx` (`contactid`),
  CONSTRAINT `contacts_contactid_fk` FOREIGN KEY (`contactid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for `cover_letter`
-- ----------------------------
DROP TABLE IF EXISTS `cover_letter`;
CREATE TABLE `cover_letter` (
  `id` varchar(64) NOT NULL,
  `jobseekerid` varchar(64) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `message` blob,
  `createts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cover_seekerid_fk_idx` (`jobseekerid`),
  CONSTRAINT `cover_seekerid_fk` FOREIGN KEY (`jobseekerid`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cover_letter
-- ----------------------------

-- ----------------------------
-- Table structure for `currency`
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ccode` varchar(10) DEFAULT NULL,
  `rate` decimal(15,2) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ccode_active_idx` (`ccode`,`active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO currency VALUES ('1', 'INR', '66.93', '', 'India', '1', '2017-02-14 14:59:01');
INSERT INTO currency VALUES ('2', 'EUR', '0.94', '', 'Europe', '1', '2017-02-14 14:59:01');
INSERT INTO currency VALUES ('3', 'USD', '1.00', '', 'United States', '1', '2017-02-14 14:59:01');
INSERT INTO currency VALUES ('4', 'JPY', '113.51', '', 'Japan', '1', '2017-02-14 14:59:01');

-- ----------------------------
-- Table structure for `emaildomains`
-- ----------------------------
DROP TABLE IF EXISTS `emaildomains`;
CREATE TABLE `emaildomains` (
  `id` int(11) NOT NULL,
  `domain` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain_UNIQUE` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emaildomains
-- ----------------------------

-- ----------------------------
-- Table structure for `employer`
-- ----------------------------
DROP TABLE IF EXISTS `employer`;
CREATE TABLE `employer` (
  `id` varchar(64) NOT NULL,
  `company_type` int(11) NOT NULL,
  `addressid` varchar(64) NOT NULL,
  `website` varchar(128) DEFAULT NULL,
  `about` varchar(1028) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `userid` varchar(64) NOT NULL,
  `postedjobcount` int(11) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(1) DEFAULT '0',
  `logoid` varchar(64) DEFAULT NULL,
  `estimated_vacancies` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employer_userid_fk_idx` (`userid`),
  KEY `employer_addressid_fk_idx` (`addressid`),
  KEY `employer_logo_fk_idx` (`logoid`),
  CONSTRAINT `employer_addressid_fk` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `employer_logo_fk` FOREIGN KEY (`logoid`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `employer_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employer
-- ----------------------------

-- ----------------------------
-- Table structure for `enumeration`
-- ----------------------------
DROP TABLE IF EXISTS `enumeration`;
CREATE TABLE `enumeration` (
  `enumid` varchar(64) NOT NULL,
  `enum_typeid` varchar(64) DEFAULT NULL,
  `enumcode` varchar(64) NOT NULL,
  `reference_entity` varchar(64) DEFAULT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `defaultvalue` varchar(50) NOT NULL,
  `operator_enumid` varchar(64) NOT NULL,
  `sequence_no` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`enumid`),
  KEY `enumeration_multifld_idx` (`enumcode`,`defaultvalue`,`operator_enumid`,`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of enumeration
-- ----------------------------

-- ----------------------------
-- Table structure for `enumeration_type`
-- ----------------------------
DROP TABLE IF EXISTS `enumeration_type`;
CREATE TABLE `enumeration_type` (
  `enum_typeid` varchar(64) NOT NULL,
  `parent_typeid` varchar(64) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`enum_typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of enumeration_type
-- ----------------------------

-- ----------------------------
-- Table structure for `favorites`
-- ----------------------------
DROP TABLE IF EXISTS `favorites`;
CREATE TABLE `favorites` (
  `id` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `contactid` varchar(64) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `contact_type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fav_unique_idx` (`userid`,`contactid`,`contact_type`),
  KEY `fav_contactid_fk_idx` (`contactid`),
  KEY `fav_type_idx` (`contact_type`),
  CONSTRAINT `fav_contactid_fk` FOREIGN KEY (`contactid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fav_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of favorites
-- ----------------------------

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` varchar(64) NOT NULL,
  `path` varchar(256) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `reference_count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for `imported_user_meta_info`
-- ----------------------------
DROP TABLE IF EXISTS `imported_user_meta_info`;
CREATE TABLE `imported_user_meta_info` (
  `userid` varchar(64) NOT NULL,
  `data` varchar(1024) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT '0',
  `role` varchar(45) NOT NULL,
  `count` int(11) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imported_user_meta_info
-- ----------------------------

-- ----------------------------
-- Table structure for `inbox`
-- ----------------------------
DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
  `id` varchar(64) NOT NULL,
  `subject` varchar(1024) DEFAULT NULL,
  `message` longtext,
  `content_type` varchar(32) NOT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inbox
-- ----------------------------

-- ----------------------------
-- Table structure for `inbox_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `inbox_mapping`;
CREATE TABLE `inbox_mapping` (
  `id` varchar(64) NOT NULL,
  `messageid` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `type` varchar(1) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `folder` varchar(45) DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `read_status` tinyint(1) DEFAULT NULL,
  `fromuserid` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `im_userid_fk_idx` (`userid`),
  KEY `im_messageid_fk_idx` (`messageid`),
  KEY `im_user_folder_idx` (`userid`,`folder`),
  KEY `im_fromuserid_fk_idx` (`fromuserid`),
  CONSTRAINT `im_fromuserid_fk` FOREIGN KEY (`fromuserid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `im_messageid_fk` FOREIGN KEY (`messageid`) REFERENCES `inbox` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `im_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inbox_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `internal_assessment_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `internal_assessment_mapping`;
CREATE TABLE `internal_assessment_mapping` (
  `id` varchar(64) NOT NULL,
  `testid` int(11) DEFAULT NULL,
  `inviteeid` varchar(64) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updateds` datetime DEFAULT NULL,
  `comments` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of internal_assessment_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `interview_answers`
-- ----------------------------
DROP TABLE IF EXISTS `interview_answers`;
CREATE TABLE `interview_answers` (
  `id` varchar(64) NOT NULL,
  `job_application_id` varchar(64) DEFAULT NULL,
  `interview_question_id` varchar(64) DEFAULT NULL,
  `video_url` varchar(45) DEFAULT NULL,
  `israted` tinyint(1) DEFAULT '0',
  `rating` decimal(10,0) DEFAULT '0',
  `comments` varchar(512) DEFAULT NULL,
  `thumbnail_url` varchar(64) DEFAULT NULL,
  `iscompleted` tinyint(1) DEFAULT '0',
  `expiryts` datetime DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `interview_answers_UNIQUE` (`job_application_id`,`interview_question_id`),
  KEY `ia_job_application_id_fk_idx` (`job_application_id`),
  KEY `ia_interview_question_id_fk_idx` (`interview_question_id`),
  CONSTRAINT `ia_interview_question_id_fk` FOREIGN KEY (`interview_question_id`) REFERENCES `interview_questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ia_job_application_id_fk` FOREIGN KEY (`job_application_id`) REFERENCES `job_applications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of interview_answers
-- ----------------------------

-- ----------------------------
-- Table structure for `interview_questions`
-- ----------------------------
DROP TABLE IF EXISTS `interview_questions`;
CREATE TABLE `interview_questions` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `seq_number` int(11) DEFAULT NULL,
  `question` varchar(512) DEFAULT NULL,
  `preparation_time_in_secs` int(11) DEFAULT NULL,
  `allocated_time_in_secs` int(11) DEFAULT NULL,
  `retry_count` int(11) DEFAULT '0',
  `notes` varchar(512) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iq_jobid_fk_idx` (`jobid`),
  CONSTRAINT `iq_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of interview_questions
-- ----------------------------

-- ----------------------------
-- Table structure for `jobs`
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` varchar(64) NOT NULL,
  `employerid` varchar(64) NOT NULL,
  `jobtitle` varchar(128) NOT NULL,
  `description` mediumtext,
  `min_years` int(11) DEFAULT NULL,
  `max_years` int(11) DEFAULT NULL,
  `number_of_vacancies` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `about` varchar(2048) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `keyskills` varchar(1024) NOT NULL,
  `currency_type` varchar(8) NOT NULL,
  `max_salary` decimal(10,2) DEFAULT NULL,
  `min_salary` decimal(10,2) DEFAULT NULL,
  `salary_details` varchar(64) DEFAULT NULL,
  `functional_area` int(11) DEFAULT NULL,
  `brief` varchar(2048) DEFAULT NULL,
  `comments` varchar(512) DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `postedts` datetime DEFAULT NULL,
  `isposted` tinyint(1) DEFAULT '0',
  `expiryts` datetime NOT NULL,
  `industry` int(11) DEFAULT NULL,
  `videourl` varchar(128) DEFAULT NULL,
  `contact_details` varchar(512) DEFAULT NULL,
  `rel_min_years` int(11) DEFAULT NULL,
  `rel_max_years` int(11) DEFAULT NULL,
  `positioncriteria` varchar(256) DEFAULT NULL,
  `servicetenure` float DEFAULT NULL,
  `hidesalary` tinyint(1) DEFAULT '0',
  `salarynotconstraint` tinyint(1) DEFAULT '0',
  `pref_min_age` int(11) DEFAULT NULL,
  `pref_max_age` int(11) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_empid_fk_idx` (`employerid`),
  CONSTRAINT `job_empid_fk` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `jobs_seed_data`
-- ----------------------------
DROP TABLE IF EXISTS `jobs_seed_data`;
CREATE TABLE `jobs_seed_data` (
  `id` int(11) NOT NULL,
  `value` varchar(64) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `createdts` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `jsd_type_fk_idx` (`type`),
  CONSTRAINT `jsd_type_fk` FOREIGN KEY (`type`) REFERENCES `jobs_seed_data_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs_seed_data
-- ----------------------------
INSERT INTO jobs_seed_data VALUES ('1001', 'Accounting/Taxation/Finance', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1002', 'Advertising/PR/MR/Events', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1003', 'Agriculture/Dairy', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1004', 'Architecture/Interior Designing', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1005', 'Auto/Auto Ancillary', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1006', 'Banking/Financial Services/Broking', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1007', 'BPO/ITES/CRM/Transcription', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1008', 'Chemicals/PetroChemical/Plastic/Rubber', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1009', 'Construction/Engineering/Cement/Metals', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1010', 'Consumer Durables', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1011', 'Courier/Transportation/Freight', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1012', 'Defence/Government', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1013', 'Education/Teaching/Training', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1014', 'Export/Import', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1015', 'Fertilizers/Pesticides', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1016', 'FMCG/Foods/Beverage', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1017', 'Fresher/Trainee', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1018', 'Gems and Jewellery', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1019', 'Hotels/Restaurants/Airlines/Travel', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1020', 'Industrial Products/Heavy Machinery', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1021', 'Insurance', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1022', 'IT-Software/Software Services', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1023', 'IT-Hardware and Networking', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1024', 'Telcom/ISP', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1025', 'Media/Dotcom/Entertainment', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1026', 'Medical/Healthcare/Hospital', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1027', 'NGO/Social Services', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1028', 'Office Equipment/Automation', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1029', 'Oil and Gas/Power/Infrastructure/Energy', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1030', 'Paper', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1031', 'Pharma/Biotech/Clinical Research', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1032', 'Printing/Packaging', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1033', 'Real Estate/Property', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1034', 'Recruitment/Employment Firm', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1035', 'Retailing', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1036', 'Security/Law Enforcement', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1037', 'Semiconductors/Electronics', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1038', 'Shipping/Marine', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1039', 'Textiles/Garments/Accessories', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1040', 'Tyres', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1041', 'Legal', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('1042', 'Other', '1001', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2001', 'Accounts / Finance / Tax / CS / Audit', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2002', 'Banking / Insurance', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2003', 'Engineering Design / R&D', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2004', 'HR/Administration/IR', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2005', 'ITES/BPO/KPO/Customer Service/Operations', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2006', 'Marketing/Advertising/MR/PR', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2007', 'Production/Maintenance/Quality', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2008', 'Sales/BD', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2009', 'Secretary/Front Office/Data Entry', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2010', 'Site Engineering / Project Management', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2011', 'Architecture/Interior Design', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2012', 'Content/Journalism', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2013', 'Corporate Planning/Consulting', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2014', 'Export/Import/Merchandising', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2015', 'Fashion/Garments/Merchandising', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2016', 'Guards/Security Services', '1002', '-1', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('2017', 'Hotels / Restaurants', '1002', '-1', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3001', 'Accounts Exec./Accountant', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3002', 'Cost Accountant ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3003', 'Taxation(Direct) Mgr', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3004', 'Taxation(Indirect) Mgr ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3005', 'Accounts Mgr', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3006', 'Financial Accountant ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3007', 'ICWA', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3008', 'Chartered Accountant ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3009', 'Finance Exec.', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3010', 'Credit/Control Exec. ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3011', 'Investor Relationship-Exec./Mgr', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3012', 'Credit/Control Mgr ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3013', 'Financial Analyst', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3014', 'Audit Mgr ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3015', 'Forex Mgr', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3016', 'Treasury Mgr ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3017', 'Finance/Budgeting Mgr', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3018', 'Head/VP/GM-Finance/Audit ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3019', 'Head/VP/GM-Accounts', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3020', 'Head/VP/GM-CFO/Financial Controller ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3021', 'Head/VP/GM-Regulatory Affairs', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3022', 'Company Secretary ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3023', 'Outside Consultant', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3024', 'Fresher ', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3025', 'Trainee', '1003', '2001', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3026', 'Cust. Service Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3027', 'Cust. Service Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3028', 'Collections Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3029', 'Collections Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3030', 'CRM/Phone/Internet Banking Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3031', 'Sales Officer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3032', 'Credit Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3033', 'Branch Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3034', 'Regional Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3035', 'National Head', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3036', 'Asset Operations/Documentation- Exec./Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3037', 'Domestic Private Banking-Exec./Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3038', 'Product Mgr-Auto/Home Loans', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3039', 'Cards-Sales Officer/Exec. ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3040', 'Cards Operations Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3041', 'Cards Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3042', 'Collections Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3043', 'Card Approvals Officer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3044', 'Merchant Acquisition Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3045', 'Business Alliances Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3046', 'Product Mgr-Cards', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3047', 'Back Office Exec. ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3048', 'Money Markets Dealer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3049', 'Forex Dealer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3050', 'Sales/BD Mgr-Forex', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3051', 'Forex Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3052', 'Debt Instrument Dealer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3053', 'Sales/BD Mgr-Debt Instruments ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3054', 'Debt Operations Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3055', 'Derivatives Dealer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3056', 'Sales/BD Mgr-Derivatives', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3057', 'Treasury Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3058', 'Clearing Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3059', 'Cash Officer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3060', 'Operations Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3061', 'Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3062', 'Depository Services-Exec./Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3063', 'Legal Officer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3064', 'Legal Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3065', 'Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3066', 'Trade Finance Operations Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3067', 'Technology Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3068', 'ATM Operations Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3069', 'Audit Mgr 6.45 Finance/Budgeting Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3070', 'Relationship Exec. ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3071', 'Client Servicing/Key Account Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3072', 'Credit Analyst-Corporate Banking ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3073', 'Credit Mgr-Corporate Banking', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3074', 'Bad Debts/Workouts Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3075', 'Debt Analyst', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3076', 'Mergers & Acquisitions Analyst ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3077', 'Equity Analyst', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3078', 'Equity Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3079', 'Domestic Debt Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3080', 'Offshore Debt Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3081', 'Mergers&Acquisitions Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3082', 'Corporate Advisory Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3083', 'Project Finance Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3084', 'Issues/IPO Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3085', 'Legal Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3086', 'Legal Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3087', 'Insurance Analyst', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3088', 'Actuary Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3089', 'Underwriter', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3090', 'Insurance Advisor ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3091', 'Unit Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3092', 'Sales/BD-Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3093', 'Branch Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3094', 'Product Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3095', 'Sales Head', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3096', 'Regional Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3097', 'Legal Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3098', 'Legal Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3099', 'Insurance Analyst', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3100', 'Actuary Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3101', 'Underwriter', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3102', 'Head-Underwriting ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3103', 'Insurance Advisor', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3104', 'Unit Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3105', 'Sales/BD-Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3106', 'Branch Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3107', 'Product Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3108', 'Sales Head ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3109', 'Regional Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3110', 'Legal Officer ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3111', 'Legal Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3112', 'Banc Assurance ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3113', 'Insurance Operations Officer', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3114', 'Insurance Operations Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3115', 'CRM/Cust. Service Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3116', 'CRM/Cust. Service Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3117', 'Claims Exec.', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3118', 'Claims Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3119', 'Investment/Treasury Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3120', 'Analyst ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3121', 'Broker/Trader', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3122', 'Sales/BD Mgr-Broking ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3123', 'Sales Exec./Investment Advisor', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3124', 'Sales/BD Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3125', 'Mktg Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3126', 'Portfolio Mgr 6.105 Analyst', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3127', 'CRM/Cust. Service Exec. ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3128', 'CRM/Cust. Service Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3129', 'Operations Exec. ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3130', 'Operations Mgr', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3131', 'Fund Mgr-Debt ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3132', 'Fund Mgr-Equity', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3133', 'Private Equity/Hedge Fund/VC-Mgr ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3134', 'Head/VP/GM-Treasury', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3135', 'Head/VP/GM-Legal ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3136', 'Head/VP/GM-Operations', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3137', 'Head/VP/GM-CFO/Financial Controller ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3138', 'Head/VP/GM-Depository Services', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3139', 'Head/VP/GM-Relationships ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3140', 'Head/VP/GM-Credit/Risk', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3141', 'Head/VP/GM-Equity ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3142', 'Head/VP/GM-Domestic/Offshore Debt', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3143', 'Head/VP/GM-Mergers and Acquisitions ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3144', 'Head/VP/GM-Corporate Advisory', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3145', 'Head/VP/GM-Project Finance ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3146', 'Head/VP/GM-Investment Banking', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3147', 'Head/VP/GM-Underwritting ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3148', 'Head/VP/GM-Mktg ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3149', 'Head/VP/GM-Insurance Operations ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3150', 'Head/VP/GM-Claims', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3151', 'Head/VP/GM-Sales ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3152', 'Head/VP/GM-Fund Management', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3153', 'Head/VP/GM-Private Equity/Hedge Fund/VC ', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3154', 'Head/VP/GM-Broking', '1003', '2002', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3155', 'R&D Exec.', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3156', 'Clinical Research Associate/Scientist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3157', 'Clinical Research Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3158', 'Analytical Chemistry Associate/Scientist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3159', 'Analytical Chemistry Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3160', 'Chemical Research Associate/Scientist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3161', 'Chemical Research Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3162', 'Bio/Pharma Informatics-Associate/Scientist', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3163', 'Formulation Scientists', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3164', 'Microbiologist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3165', 'Molecular Biology', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3166', 'Nutritionist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3167', 'Research Scientist', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3168', 'Bio-Tech Research Associate/Scientist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3169', 'Bio-Tech Research Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3170', 'Pharmacist/Chemist/Bio Chemist ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3171', 'Bio-Statistician', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3172', 'Lab Technician/Medical Technician/Lab Staff ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3173', 'Product Development Exec.', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3174', 'Product Development Mgr ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3175', 'Drug Regulatory Dr.', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3176', 'Documentation/Medical Writing ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3177', 'Regulatory Affairs Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3178', 'QA&QC-Executive ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3179', 'QA&QC Mgr', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3180', 'Design Engineer ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3181', 'Sr. Design Engineer', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3182', 'Tech. Lead/Project Lead ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3183', 'Head/VP/GM-R&D', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3184', 'Head/VP/GM-Production ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3185', 'Head/VP/GM-Formulations', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3186', 'Head/VP/GM-QA/QC ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3187', 'Head/VP/GM-Regulatory Affairs', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3188', 'Research Associate ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3189', 'Fresher', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3190', 'Postdoc Position/Fellowship ', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3191', 'Practical Training/Internship', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3192', 'Trainee', '1003', '2003', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3193', 'HR Exec. ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3194', 'HR Mgr', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3195', 'Recruitment Exec. ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3196', 'Recruitment Mgr', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3197', 'Pay Roll/Compensation Mgr ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3198', 'Performance Mgmt Mgr', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3199', 'Industrial/Labour Relations Mgr ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3200', 'Training Mgr', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3201', 'Admin/Facilities Exec. ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3202', 'Admin/Facilities Mgr', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3203', 'Head/VP/GM-HR', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3204', 'Head/VP/GM-Training and Development', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3205', 'Head/VP/GM-Admin and Facilities ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3206', 'Head/VP/GM-Recruitment', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3207', 'Outside Consultant ', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3208', 'Trainee', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3209', 'Fresher', '1003', '2004', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3210', 'Associate/Sr. Associate -(NonTechnical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3211', 'Associate/Sr. Associate -(Technical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3212', 'Team Leader -(NonTechnical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3213', 'Team Leader -(Technical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3214', 'Asst. Mgr/Mgr -(NonTechnical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3215', 'Asst. Mgr/Mgr (Technical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3216', 'Tecalling/Telemarketing Exec. ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3217', 'Associate/Sr. Associate -(NonTechnical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3218', 'Associate/Sr. Associate -(Technical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3219', 'Team Leader -(NonTechnical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3220', 'Team Leader -(Technical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3221', 'Asst. Mgr/Mgr -(Technical)', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3222', 'Asst. Mgr / Mgr -(NonTechnical) ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3223', 'Process Flow Analyst', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3224', 'Business/EDP Analyst ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3225', 'BD Mgr', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3226', 'Transitions/Migrations Mgr ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3227', 'Operations Mgr', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3228', 'Infrastructure and Technology Mgr', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3229', 'Dialer Mgr', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3230', 'Technical/Process Trainer ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3231', 'Voice & Accent Trainer', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3232', 'Soft Skills Trainer ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3233', 'QA/QC Exec.', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3234', 'QA/QC Mgr ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3235', 'Quality Coach', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3236', 'Team Leader-QA/QC ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3237', 'Head/VP/GM-Operations', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3238', 'Head/VP/GM-Training and Development ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3239', 'Head/VP/GM-Transitions', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3240', 'Service Delivery Leader ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3241', 'Head/VP/GM-QA and QC', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3242', 'Medical Transcriptionist ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3243', 'Fresher', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3244', 'Trainee ', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3245', 'Outside Consultant', '1003', '2005', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3246', 'Client Servicing Exec.', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3247', 'Client Servicing/Key Account Mgr ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3248', 'Account Director', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3249', 'Creative Director ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3250', 'Media Planning Exec./Mgr', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3251', 'Media Buying Exec./Mgr ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3252', 'Events/Promotion Exec.', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3253', 'Events/Promotion Mgr ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3254', 'Corp. Communication Exec.', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3255', 'Direct Mktg Exec. ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3256', 'Direct Mktg Mgr', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3257', 'Product Exec. ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3258', 'Product/Brand Mgr', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3259', 'Business Alliances Mgr ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3260', 'Mktg Mgr', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3261', 'Art Director/Sr Art Director ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3262', 'Visualiser', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3263', 'Copywriter ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3264', 'Graphic Designer', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3265', 'MR Exec./Mgr ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3266', 'MR Field Supervisor', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3267', 'PR Exec. ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3268', 'PR and Media Relations Mgr', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3269', 'Head/Mgr/GM-Media Planning ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3270', 'Head/Mgr/GM-Media Buying', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3271', 'Head/VP/GM-PR/Corp. Communication ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3272', 'Head/VP/GM-Mktg', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3273', 'Head/VP/GM-Business Alliances ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3274', 'Head/VP/GM- MR ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3275', 'Head/VP/GM-Client Servicing ', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3276', 'National Creative Director/VP-Creative', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3277', 'Outside Consultant 15.34 Trainee', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3278', 'Fresher', '1003', '2006', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3279', 'Industrial Engnr ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3280', 'Design Engnr/Mgr', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3281', 'Factory Head ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3282', 'Engineering Mgr', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3283', 'Production Mgr ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3284', 'QA/QC Exec.', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3285', 'QA/QC Mgr ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3286', 'Product Development Exec.', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3287', 'Product Development Mgr ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3288', 'Workman/Foreman/Technician', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3289', 'Service/Maintenance Engnr ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3290', 'Service/Maintenance Supervisor', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3291', 'Project Mgr-Production/Manufacturing/Maintenance ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3292', 'Safety Officer/Mgr', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3293', 'Environment Engnr/Officer ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3294', 'Health-Officer/Mgr', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3295', 'Head/VP/GM-QA/QC ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3296', 'Head/VP/GM- Production/Manufacturing/Maintenance', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3297', 'Head/VP/GM-Operations ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3298', 'SBU Head/Profit Centre Head', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3299', 'Head/VP/GM-Regulatory Affairs ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3300', 'Outside Consultant', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3301', 'Trainee ', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3302', 'Fresher', '1003', '2007', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3303', 'Sales Exec./Officer', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3304', 'Counter Sales ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3305', 'Medical Rep.', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3306', 'Merchandiser ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3307', 'Sales/BD Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3308', 'Sales Promotion Mgr ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3309', 'Retail Store Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3310', 'Branch Mgr ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3311', 'Regional Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3312', 'Sales Exec./Officer ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3313', 'Sales/BD Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3314', 'Client Servicing/Key Account Mgr ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3315', 'Branch Mgr/Regional Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3316', 'Sales Exec./Officer ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3317', 'Sales/BD Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3318', 'Sales Promotion Mgr ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3319', 'Banquet Sales Exec./Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3320', 'Institutional Sales/BD Mgr ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3321', 'Sales Trainer', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3322', 'Telesales/Telemarketing Exec./Officer ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3323', 'Sales Promotion Mgr', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3324', 'Front Desk/Cashier/Billing', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3325', 'Head/VP/GM/National Mgr -Sales', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3326', 'Trainee ', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3327', 'Fresher', '1003', '2008', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3328', 'Stenographer/Data Entry Operator', '1003', '2009', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3329', 'Receptionist ', '1003', '2009', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3330', 'Secretary/PA', '1003', '2009', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3331', 'Fresher ', '1003', '2009', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3332', 'Trainee', '1003', '2009', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3333', 'Project Mgr-Telecom', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3334', 'Project Mgr-IT/Software ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3335', 'Project Mgr- Production/Manufacturing/Maintenance', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3336', 'Civil Engnr-Telecom ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3337', 'Civil Engnr-Municipal', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3338', 'Civil Engnr-Water/Wastewater ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3339', 'Civil Engnr-Land Development', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3340', 'Civil Engnr-Aviation ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3341', 'Civil Engnr-Highway Roadway', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3342', 'Civil Engnr-Traffic ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3343', 'Electrical Engnr-Telecom', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3344', 'Electrical Engnr-Commercial ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3345', 'Electrical Engnr-Industrial', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3346', 'Electrical Engnr-Utility ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3347', 'Geotechnical Engnr', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3348', 'Mech. Engnr-Telecom ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3349', 'Mech. Engnr-HVAC', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3350', 'Mech. Engnr-Plumbing/Fire Protection ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3351', 'Process Engnr-Plant Design', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3352', 'Structural Engnr-Bridge ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3353', 'Structural Engnr-Building', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3354', 'Geographic Information Systems/GIS ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3355', 'Construction-General Building', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3356', 'Construction-Heavy ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3357', 'Construction-Residential', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3358', 'Construction-Specialty ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3359', 'Construction-Construction Management', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3360', 'Maintenance Engnr ', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3361', 'Fresher', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3362', 'Trainee', '1003', '2010', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3363', 'Architect 2.02 Draughtsman', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3364', 'Project Architect ', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3365', 'Naval Architect', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3366', 'Landscape Architect ', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3367', 'Town Planner', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3368', 'Interior Designer ', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3369', 'Outside Consultant', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3370', 'Fresher ', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3371', 'Trainee', '1003', '2011', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3372', 'Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3373', 'Freelance Journalist ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3374', 'Business Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3375', 'Fashion Content Developer ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3376', 'Features Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3377', 'Intnl Business Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3378', 'IT/Technical Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3379', 'Sports Content Developer ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3380', 'Political Content Developer', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3381', 'Journalist ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3382', 'Sub Editor/Reporter', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3383', 'Sr Sub Editor/Sr Reporter ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3384', 'Coresspondent/Asst. Editor/Associate Editor', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3385', 'Principal Coresspondent/Features Writer/Resident Writer ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3386', 'Chief of Bureau/Editor in Chief', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3387', 'Investigative Journalist ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3388', 'Proof Reader', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3389', 'Business Editor ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3390', 'Fashion Editor', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3391', 'Features Editor ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3392', 'Intnl Business Editor', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3393', 'IT/Technical Editor ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3394', 'Managing Editor', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3395', 'Sports Editor ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3396', 'Political Editor', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3397', 'Trainee ', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3398', 'Fresher', '1003', '2012', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3399', 'Outside Consultant', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3400', 'Sr Outside Consultant ', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3401', 'Corporate Planning/Strategy Mgr', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3402', 'Research Associate ', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3403', 'Business Analyst', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3404', 'EA to Chairman/President/VP ', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3405', 'Head/VP/GM-Corporate Planning/Strategy', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3406', 'VP/President/Partner ', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3407', 'CEO/MD/Director', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3408', 'Trainees ', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3409', 'Freshers', '1003', '2013', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3410', 'Documentation/Shipping Exec./Mgr', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3411', 'Production Exec. ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3412', 'Purchase Officer', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3413', 'Floor Mgr ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3414', 'Production Mgr', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3415', 'Merchandiser ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3416', 'QA/QC Exec.', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3417', 'QA/QC Mgr ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3418', 'BD Mgr', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3419', 'Head/VP/GM-Documentation/Shipping ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3420', 'Head/VP/GM-Production', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3421', 'Head/VP/GM-Purchase ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3422', 'VP/GM-Quality', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3423', 'CEO/MD/Director ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3424', 'Liason Officer/Mgr', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3425', 'Trader ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3426', 'Agent', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3427', 'Fresher ', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3428', 'Trainee', '1003', '2014', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3429', 'Accessory Designer', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3430', 'Apparel/Garment Designer ', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3431', 'Footwear Designer', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3432', 'Merchandiser ', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3433', 'Textile Designer', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3434', 'Jewellery Designer ', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3435', 'Freelancer', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3436', 'Fresher ', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3437', 'Trainee', '1003', '2015', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3438', 'Security Guard', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3439', 'Security Supervisor ', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3440', 'Security Mgr', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3441', 'Policeman', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3442', 'Army/Navy/Airforce Personnel', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3443', 'Chief Security Officer ', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3444', 'Trainee', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3445', 'Fresher', '1003', '2016', '1', '2016-12-15 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3446', 'Bar Tender', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3447', 'Commis', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3448', 'Night Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3449', 'Pastry Chef', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3450', 'Bar Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3451', 'Steward', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3452', 'Captain', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3453', 'Host/Hostess', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3454', 'Butler', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3455', 'Chef De Partis', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3456', 'Executive Sous Chef / Chef De Cuisine', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3457', 'Sous Chef', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3458', 'Banquet Sales Executive / Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3459', 'Restaurant Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3460', 'F&B Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3461', 'General Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3462', 'Waiter / Waitress / Sommelier', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3463', 'Busser', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3464', 'Housekeeping Executive / Assistant', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3465', 'Housekeeping Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3466', 'Cashier', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3467', 'Front Office / Guest Relations Executive / Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3468', 'Travel Desk Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3469', 'Lobby / Duty Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3470', 'Staff Function', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3471', 'Guest Service Agent', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3472', 'Concierge', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3473', 'Executive / Master Chef', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3474', 'Head / VP / GM - F&B', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3475', 'Head / VP / GM / National Manager - Sales', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3476', 'Head / VP - Public Relations / Corporate Communication', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3477', 'Head / VP / GM - Accounts', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3478', 'CEO / MD / Director', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3479', 'Health Club Assistant / Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3480', 'Masseur', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3481', 'Leisure Staff / Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3482', 'Revenue Mananger', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3483', 'Spa Therapist', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3484', 'Security Manager / Officer', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3485', 'Casino Manager', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3486', 'Event Planner', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3487', 'Fresher', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('3488', 'Trainee', '1003', '2017', '1', '2017-07-14 15:13:36');
INSERT INTO jobs_seed_data VALUES ('4001', 'Any Graduate', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4002', 'Graduation Not Required', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4003', 'B.A', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4004', 'B.Arch', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4005', 'B.B.A', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4006', 'B.Com', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4007', 'B.Ed', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4008', 'B.Pharma', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4009', 'B.Sc', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4010', 'B.Tech/B.E.', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4011', 'BCA', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4012', 'BDS', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4013', 'BHM ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4014', 'BVSC ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4015', 'Diploma ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4016', 'LLB ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4017', 'MBBS ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4018', 'Other Graduate ', '1004', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4019', 'Any Specialization', '1004', '4001', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4020', 'None', '1004', '4002', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4021', 'Arts&Humanities', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4022', 'Communication', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4023', 'Economics', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4024', 'English', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4025', 'Film', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4026', 'Fine Arts', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4027', 'Hindi', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4028', 'History', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4029', 'Journalism', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4030', 'Maths', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4031', 'Pass Course', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4032', 'Political Science', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4033', 'PR/Advertising', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4034', 'Psychology', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4035', 'Sanskrit', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4036', 'Sociology', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4037', 'Statistics', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4038', 'Vocational Course', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4039', 'Other Specialization', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4040', 'Any Specialization', '1004', '4003', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4041', 'Architecture ', '1004', '4004', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4042', 'Management ', '1004', '4005', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4043', 'Commerce ', '1004', '4006', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4044', 'Education ', '1004', '4007', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4045', 'Pharmacy ', '1004', '4008', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4046', 'Agriculture', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4047', 'Anthropology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4048', 'Bio-Chemistry', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4049', 'Biology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4050', 'Botany', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4051', 'Chemistry', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4052', 'Computers', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4053', 'Dairy Technology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4054', 'Electronics', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4055', 'Environmental science', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4056', 'Food Technology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4057', 'Geology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4058', 'Home science', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4059', 'Maths', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4060', 'Microbiology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4061', 'Nursing', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4062', 'Physics', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4063', 'Statistics', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4064', 'Zoology', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4065', 'General', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4066', 'Other Specialization', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4067', 'Any Specialization', '1004', '4009', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4068', 'Agriculture', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4069', 'Automobile', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4070', 'Aviation', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4071', 'Bio-Chemistry/Bio-Technology', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4072', 'Biomedical', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4073', 'Ceramics', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4074', 'Chemical', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4075', 'Civil', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4076', 'Computers', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4077', 'Electrical', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4078', 'Electronics/Telecomunication', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4079', 'Energy', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4080', 'Environmental', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4081', 'Instrumentation', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4082', 'Marine', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4083', 'Mechanical', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4084', 'Metallurgy', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4085', 'Mineral', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4086', 'Mining', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4087', 'Nuclear', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4088', 'Paint/Oil', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4089', 'Petroleum', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4090', 'Plastics', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4091', 'Production/Industrial', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4092', 'Textile', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4093', 'Other Specialization', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4094', 'Any Specialization', '1004', '4010', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4095', 'Computers ', '1004', '4011', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4096', 'Dentistry ', '1004', '4012', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4097', 'Hotel Management', '1004', '4013', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4098', 'Veterinary Science ', '1004', '4014', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4099', 'Architecture', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4100', 'Chemical', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4101', 'Civil', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4102', 'Computers', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4103', 'Electrical', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4104', 'Electronics/Telecomunication', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4105', 'Engineering', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4106', 'Export/Import', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4107', 'Fashion Designing/Other Designing', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4108', 'Graphic/ Web Designing', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4109', 'Hotel Management', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4110', 'Insurance', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4111', 'Management', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4112', 'Mechanical', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4113', 'Tourism', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4114', 'Visual Arts', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4115', 'Vocational Course', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4116', 'Other Specialization', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4117', 'Any Specialization', '1004', '4015', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4118', 'Law ', '1004', '4016', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4119', 'Medicine ', '1004', '4017', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4120', 'Any Specialization ', '1004', '4018', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4121', 'Any PG Course', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4122', 'Post Graduation Not Required', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4123', 'CA', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4124', 'CS', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4125', 'ICWA', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4126', 'Integrated PG', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4127', 'LLM', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4128', 'M.A', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4129', 'M.Arch', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4130', 'M.Com', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4131', 'M.Ed', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4132', 'M.Pharma', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4133', 'M.Sc', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4134', 'M.Tech', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4135', 'MBA/PGDM', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4136', 'MCA', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4137', 'M.S/M.D', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4138', 'MVSC', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4139', 'PG Diploma', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4140', 'Other', '1005', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4141', 'Any Specialization ', '1005', '4121', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4142', 'None', '1005', '4122', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4143', 'CA', '1005', '4123', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4144', 'CS', '1005', '4124', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4145', 'ICWA', '1005', '4125', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4146', 'Journalism / Mass Communication', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4147', 'Management', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4148', 'PR/ Advertising', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4149', 'Tourism', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4150', 'Other', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4151', 'Any Specialization', '1005', '4126', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4152', 'Law ', '1005', '4127', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4153', 'Anthropology', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4154', 'Arts & Humanities', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4155', 'Communication', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4156', 'Economics', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4157', 'English', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4158', 'Film', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4159', 'Fine arts', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4160', 'Hindi', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4161', 'History', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4162', 'Journalism', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4163', 'Maths', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4164', 'Political Science', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4165', 'PR/ Advertising', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4166', 'Psychology', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4167', 'Sanskrit', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4168', 'Sociology', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4169', 'Statistics', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4170', 'Other', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4171', 'Any Specialization', '1005', '4128', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4172', 'Architecture ', '1005', '4129', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4173', 'Commerce ', '1005', '4130', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4174', 'Education ', '1005', '4131', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4175', 'Pharmacy ', '1005', '4132', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4176', 'Agriculture', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4177', 'Anthropology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4178', 'Bio-Chemistry', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4179', 'Biology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4180', 'Botany', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4181', 'Chemistry', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4182', 'Computers', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4183', 'Dairy Technology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4184', 'Electronics', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4185', 'Environmental science', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4186', 'Food Technology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4187', 'Geology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4188', 'Home science', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4189', 'Maths', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4190', 'Microbiology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4191', 'Nursing', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4192', 'Physics', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4193', 'Statistics', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4194', 'Zoology', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4195', 'Other', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4196', 'Any Specialization', '1005', '4133', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4197', 'Agriculture', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4198', 'Automobile', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4199', 'Aviation', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4200', 'Bio-Chemistry/Bio-Technology', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4201', 'Biomedical', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4202', 'Ceramics', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4203', 'Chemical', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4204', 'Civil', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4205', 'Computers', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4206', 'Electrical', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4207', 'Electronics/Telecomunication', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4208', 'Energy', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4209', 'Environmental', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4210', 'Instrumentation', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4211', 'Marine', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4212', 'Mechanical', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4213', 'Metallurgy', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4214', 'Mineral', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4215', 'Mining', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4216', 'Nuclear', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4217', 'Paint/Oil', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4218', 'Petroleum', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4219', 'Plastics', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4220', 'Production/Industrial', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4221', 'Textile', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4222', 'Other Engineering', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4223', 'Any Specialization', '1005', '4134', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4224', 'Advertising/Mass Communication', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4225', 'Finance', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4226', 'HR/Industrial Relations', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4227', 'Information Technology', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4228', 'International Business', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4229', 'Marketing', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4230', 'Systems', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4231', 'Other Management', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4232', 'Any Specialization', '1005', '4135', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4233', 'Computers ', '1005', '4136', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4234', 'Cardiology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4235', 'Dermatology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4236', 'ENT', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4237', 'General Practitioner', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4238', 'Gyneocology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4239', 'Hepatology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4240', 'Immunology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4241', 'Microbiology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4242', 'Neonatal', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4243', 'Nephrology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4244', 'Urology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4245', 'Obstretrics', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4246', 'Oncology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4247', 'Opthalmology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4248', 'Orthopaedic', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4249', 'Pathology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4250', 'Pediatrics', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4251', 'Psychiatry', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4252', 'psychology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4253', 'Radiology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4254', 'Rheumatology', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4255', 'Other', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4256', 'Any Specialization', '1005', '4137', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4257', 'Veterinary Science ', '1005', '4138', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4258', 'Chemical', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4259', 'Civil', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4260', 'Computers', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4261', 'Electrical', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4262', 'Electronics', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4263', 'Mechanical', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4264', 'Other', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4265', 'Any Specialization', '1005', '4139', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4266', 'Other', '1005', '4140', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4267', 'Doctorate Not Required', '1006', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4268', 'Any Doctorate', '1006', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4269', 'PH.D.', '1006', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4270', 'M.Phil.', '1006', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4271', 'Other Doctorate', '1006', '-1', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4272', 'None', '1006', '4267', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4273', 'Any specialization', '1006', '4268', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4274', 'Advertising / Mass Communication', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4275', 'Agriculture', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4276', 'Anthropology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4277', 'Architecture', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4278', 'Arts & Humanities', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4279', 'Automobile', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4280', 'Aviation', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4281', 'Bio-Chemistry / Bio-Technology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4282', 'Biomedical', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4283', 'Biotechnology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4284', 'Ceramics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4285', 'Chemical', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4286', 'Chemistry', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4287', 'Civil', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4288', 'Commerce', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4289', 'Communication', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4290', 'Computers', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4291', 'Dairy Technology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4292', 'Dermatology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4293', 'Economics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4294', 'Electrical', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4295', 'Electronics / Telecommunication', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4296', 'Energy', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4297', 'ENT', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4298', 'Environmental', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4299', 'Fashion Designing / Other Designing', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4300', 'Film', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4301', 'Finance', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4302', 'Fine arts', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4303', 'Food Technology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4304', 'Hotel Management', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4305', 'History', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4306', 'HR / Industrial Relations', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4307', 'Immunology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4308', 'International Business', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4309', 'Instrumentation', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4310', 'Journalism', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4311', 'Law', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4312', 'Literature', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4313', 'Marine', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4314', 'Marketing', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4315', 'Maths', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4316', 'Mechanical', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4317', 'Medicine', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4318', 'Metallurgy', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4319', 'Microbiology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4320', 'Mineral', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4321', 'Mining', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4322', 'Neonatal', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4323', 'Nuclear', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4324', 'Obstetrics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4325', 'Paint / Oil', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4326', 'Pathology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4327', 'Petroleum', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4328', 'Pediatrics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4329', 'Pharmacy', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4330', 'Physics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4331', 'Plastics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4332', 'Production / Industrial', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4333', 'Psychiatry', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4334', 'Psychology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4335', 'Radiology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4336', 'Rheumatology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4337', 'Sanskrit', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4338', 'Sociology', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4339', 'Statistics', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4340', 'Systems', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4341', 'Textile', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4342', 'Vocational Courses', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4343', 'Other Arts', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4344', 'Other Doctorate', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4345', 'Other Engineering', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4346', 'Other Management', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4347', 'Other Science', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4348', 'Other', '1006', '4269', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4349', 'Advertising / Mass Communication', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4350', 'Agriculture', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4351', 'Anthropology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4352', 'Architecture', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4353', 'Arts & Humanities', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4354', 'Automobile', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4355', 'Aviation', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4356', 'Bio-Chemistry / Bio-Technology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4357', 'Biomedical', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4358', 'Biotechnology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4359', 'Ceramics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4360', 'Chemical', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4361', 'Chemistry', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4362', 'Civil', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4363', 'Commerce', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4364', 'Communication', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4365', 'Computers', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4366', 'Dairy Technology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4367', 'Dermatology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4368', 'Economics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4369', 'Electrical', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4370', 'Electronics / Telecommunication', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4371', 'Energy', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4372', 'ENT', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4373', 'Environmental', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4374', 'Fashion Designing / Other Designing', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4375', 'Film', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4376', 'Finance', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4377', 'Fine arts', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4378', 'Food Technology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4379', 'Hotel Management', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4380', 'History', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4381', 'HR / Industrial Relations', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4382', 'Immunology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4383', 'International Business', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4384', 'Instrumentation', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4385', 'Journalism', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4386', 'Law', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4387', 'Literature', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4388', 'Marine', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4389', 'Marketing', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4390', 'Maths', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4391', 'Mechanical', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4392', 'Medicine', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4393', 'Metallurgy', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4394', 'Microbiology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4395', 'Mineral', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4396', 'Mining', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4397', 'Neonatal', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4398', 'Nuclear', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4399', 'Obstetrics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4400', 'Paint / Oil', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4401', 'Pathology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4402', 'Petroleum', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4403', 'Pediatrics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4404', 'Pharmacy', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4405', 'Physics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4406', 'Plastics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4407', 'Production / Industrial', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4408', 'Psychiatry', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4409', 'Psychology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4410', 'Radiology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4411', 'Rheumatology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4412', 'Sanskrit', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4413', 'Sociology', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4414', 'Statistics', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4415', 'Systems', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4416', 'Textile', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4417', 'Vocational Courses', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4418', 'Other Arts', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4419', 'Other Doctorate', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4420', 'Other Engineering', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4421', 'Other Management', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4422', 'Other Science', '1006', '4270', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4423', 'Other Specialization', '1006', '4271', '1', '2017-02-15 14:59:00');
INSERT INTO jobs_seed_data VALUES ('4424', 'Manager', '1007', '-1', '1', '2017-07-24 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4425', 'Better Brand', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4426', 'Better Prospects', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4427', 'Career Progression', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4428', 'Elevation in Role title', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4429', 'Family concerns', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4430', 'Financial gains', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4431', 'Lay-off', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4432', 'Location concerns', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4433', 'Manpower rationalization', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4434', 'Perception Driven', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4435', 'Personal reasons', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4436', 'Redundancy', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4437', 'Relocation on promotion', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4438', 'Relocation on Transfer', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4439', 'Retrenchment', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4440', 'Termination', '1009', '-1', '1', '2017-07-26 14:59:01');
INSERT INTO jobs_seed_data VALUES ('4441', 'Unbearable Work Culture', '1009', '-1', '1', '2017-07-26 14:59:01');

-- ----------------------------
-- Table structure for `jobs_seed_data_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `jobs_seed_data_mapping`;
CREATE TABLE `jobs_seed_data_mapping` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `jobs_seed_data_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jobs_id_idx` (`jobid`),
  KEY `fk_jobs_seed_data_id_idx` (`jobs_seed_data_id`),
  KEY `fk_jobs_seed_data_type_id_idx` (`type_id`),
  CONSTRAINT `fk_jobs_id` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jobs_seed_data_id` FOREIGN KEY (`jobs_seed_data_id`) REFERENCES `jobs_seed_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jobs_seed_data_type_id` FOREIGN KEY (`type_id`) REFERENCES `jobs_seed_data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs_seed_data_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `jobs_seed_data_types`
-- ----------------------------
DROP TABLE IF EXISTS `jobs_seed_data_types`;
CREATE TABLE `jobs_seed_data_types` (
  `id` int(11) NOT NULL,
  `value` varchar(64) DEFAULT NULL,
  `createdts` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs_seed_data_types
-- ----------------------------
INSERT INTO jobs_seed_data_types VALUES ('1001', 'Industry Mapping', '2016-12-15 09:50:14');
INSERT INTO jobs_seed_data_types VALUES ('1002', 'Functional Area', '2016-12-15 09:50:14');
INSERT INTO jobs_seed_data_types VALUES ('1003', 'Role Mapping', '2016-12-15 09:50:14');
INSERT INTO jobs_seed_data_types VALUES ('1004', 'UG', '2017-02-14 14:43:20');
INSERT INTO jobs_seed_data_types VALUES ('1005', 'PG', '2017-02-14 14:43:20');
INSERT INTO jobs_seed_data_types VALUES ('1006', 'PPG', '2017-02-14 14:43:20');
INSERT INTO jobs_seed_data_types VALUES ('1007', 'Position Criteria', '2017-07-24 14:43:20');
INSERT INTO jobs_seed_data_types VALUES ('1008', 'Designation', '2017-07-24 14:43:20');
INSERT INTO jobs_seed_data_types VALUES ('1009', 'Reason for leaving', '2017-07-24 14:43:20');

-- ----------------------------
-- Table structure for `job_applications`
-- ----------------------------
DROP TABLE IF EXISTS `job_applications`;
CREATE TABLE `job_applications` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) NOT NULL,
  `jobseekerid` varchar(64) NOT NULL,
  `shortlisted` tinyint(1) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `comments` varchar(512) DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `iscontacted` tinyint(1) NOT NULL DEFAULT '0',
  `utm_source` varchar(32) DEFAULT NULL,
  `relexpyears` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobres_unique_idx` (`jobid`,`jobseekerid`),
  KEY `jobres_seeker_fk_idx` (`jobseekerid`),
  KEY `jobapplication_shortlist_idx` (`jobid`,`shortlisted`),
  CONSTRAINT `jobres_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobres_seeker_fk` FOREIGN KEY (`jobseekerid`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_applications
-- ----------------------------

-- ----------------------------
-- Table structure for `job_application_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `job_application_feedback`;
CREATE TABLE `job_application_feedback` (
  `id` varchar(64) NOT NULL,
  `job_application_id` varchar(64) DEFAULT NULL,
  `total_test_count` int(11) DEFAULT NULL,
  `passed_test_count` int(11) DEFAULT NULL,
  `failed_test_count` int(11) DEFAULT NULL,
  `test_result_status` int(11) DEFAULT NULL,
  `test_status` int(11) DEFAULT NULL,
  `test_rating` decimal(10,0) DEFAULT '0',
  `test_comments` varchar(512) DEFAULT NULL,
  `videointerview_status` int(11) DEFAULT NULL,
  `video_rating` decimal(10,0) DEFAULT '0',
  `video_comments` varchar(512) DEFAULT NULL,
  `application_status` int(11) DEFAULT NULL,
  `application_rating` decimal(10,0) DEFAULT '0',
  `application_comment` varchar(512) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_application_id_UNIQUE` (`job_application_id`),
  KEY `jac_job_application_id_fk_idx` (`job_application_id`),
  CONSTRAINT `jac_job_application_id_fk` FOREIGN KEY (`job_application_id`) REFERENCES `job_applications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_application_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `job_application_meeting_map`
-- ----------------------------
DROP TABLE IF EXISTS `job_application_meeting_map`;
CREATE TABLE `job_application_meeting_map` (
  `id` varchar(64) NOT NULL,
  `job_application_id` varchar(64) NOT NULL,
  `meeting_id` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `meeting_map_jobapp_idx` (`job_application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_application_meeting_map
-- ----------------------------

-- ----------------------------
-- Table structure for `job_boards`
-- ----------------------------
DROP TABLE IF EXISTS `job_boards`;
CREATE TABLE `job_boards` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `logo_url` varchar(512) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `web_url` varchar(256) DEFAULT NULL,
  `isexternal` tinyint(1) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `region` varchar(64) NOT NULL,
  `ispackage_check_required` tinyint(1) DEFAULT '0',
  `package_limit` decimal(10,2) DEFAULT NULL,
  `package_currencycode` varchar(10) DEFAULT NULL,
  `seq_no` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_boards
-- ----------------------------

-- ----------------------------
-- Table structure for `job_board_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `job_board_mapping`;
CREATE TABLE `job_board_mapping` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `boardid` int(11) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jbm_jobid_fk_idx` (`jobid`),
  KEY `jbm_boards_fk_idx` (`boardid`),
  CONSTRAINT `jbm_boards_fk` FOREIGN KEY (`boardid`) REFERENCES `job_boards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jbm_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_board_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `job_bucket_member`
-- ----------------------------
DROP TABLE IF EXISTS `job_bucket_member`;
CREATE TABLE `job_bucket_member` (
  `id` varchar(64) NOT NULL,
  `bucketid` varchar(64) DEFAULT NULL,
  `job_applicationid` varchar(64) DEFAULT NULL,
  `sequence_no` int(11) DEFAULT NULL,
  `fromdate` datetime DEFAULT NULL,
  `thrudate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobbucketmember_multifld_idx` (`bucketid`,`job_applicationid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_bucket_member
-- ----------------------------

-- ----------------------------
-- Table structure for `job_education_details`
-- ----------------------------
DROP TABLE IF EXISTS `job_education_details`;
CREATE TABLE `job_education_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` varchar(64) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `qualification` varchar(64) DEFAULT NULL,
  `specialization` varchar(128) DEFAULT NULL,
  `createdts` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedts` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `jobid_fk_idx` (`jobid`),
  CONSTRAINT `jed_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_education_details
-- ----------------------------

-- ----------------------------
-- Table structure for `job_filter`
-- ----------------------------
DROP TABLE IF EXISTS `job_filter`;
CREATE TABLE `job_filter` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `job_filterid` varchar(64) DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `updatedby` varchar(45) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobfilter_multifld_idx` (`job_filterid`,`jobid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_filter
-- ----------------------------

-- ----------------------------
-- Table structure for `job_filter_rule`
-- ----------------------------
DROP TABLE IF EXISTS `job_filter_rule`;
CREATE TABLE `job_filter_rule` (
  `id` varchar(64) NOT NULL,
  `rule_typeid` varchar(64) NOT NULL,
  `rule_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `updateddby` varchar(45) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobfilterrule_ruletype_multifld_idx` (`rule_typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_filter_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `job_locations`
-- ----------------------------
DROP TABLE IF EXISTS `job_locations`;
CREATE TABLE `job_locations` (
  `id` varchar(64) NOT NULL,
  `job_id` varchar(64) NOT NULL,
  `countryid` int(11) NOT NULL,
  `regionid` int(11) NOT NULL,
  `city` varchar(64) NOT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_location_id_idx` (`job_id`),
  KEY `job_location_countryid_fk_idx` (`countryid`),
  KEY `job_location_regionid_fk_idx` (`regionid`),
  CONSTRAINT `job_location_countryid_fk` FOREIGN KEY (`countryid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `job_location_jobid_fk` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `job_location_regionid_fk` FOREIGN KEY (`regionid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_locations
-- ----------------------------

-- ----------------------------
-- Table structure for `job_rule_action`
-- ----------------------------
DROP TABLE IF EXISTS `job_rule_action`;
CREATE TABLE `job_rule_action` (
  `id` varchar(64) NOT NULL,
  `job_filter_ruleid` varchar(64) NOT NULL,
  `job_rule_condid` varchar(64) DEFAULT NULL,
  `action_enumid` varchar(64) DEFAULT NULL,
  `action_typeid` varchar(45) DEFAULT NULL,
  `service_name` varchar(45) DEFAULT NULL,
  `action_value` varchar(45) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobruleaction_multifld_idx` (`action_value`,`job_filter_ruleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_rule_action
-- ----------------------------

-- ----------------------------
-- Table structure for `job_rule_condition`
-- ----------------------------
DROP TABLE IF EXISTS `job_rule_condition`;
CREATE TABLE `job_rule_condition` (
  `id` varchar(64) NOT NULL,
  `job_filter_ruleid` varchar(64) NOT NULL,
  `input_param_enumid` varchar(64) NOT NULL,
  `operator_enumid` varchar(64) NOT NULL,
  `cond_value` varchar(45) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobrulecondition_multifld_indx` (`job_filter_ruleid`,`input_param_enumid`,`operator_enumid`,`cond_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_rule_condition
-- ----------------------------

-- ----------------------------
-- Table structure for `job_seeker`
-- ----------------------------
DROP TABLE IF EXISTS `job_seeker`;
CREATE TABLE `job_seeker` (
  `id` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `resume_headline` varchar(254) DEFAULT NULL,
  `keyskills` varchar(512) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `contact_number` varchar(16) DEFAULT NULL,
  `resumeid` varchar(64) NOT NULL,
  `about` varchar(2048) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `regionid` int(11) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `expected_package` int(10) unsigned DEFAULT NULL,
  `notice_period` mediumint(9) DEFAULT NULL,
  `current_package` int(10) unsigned DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  `gender` enum('M','F') DEFAULT 'M',
  `dob` datetime DEFAULT NULL,
  `marital_status` enum('S','M') DEFAULT 'S',
  `functional_area` int(11) NOT NULL,
  `desired_job_type` enum('Permanent','Temporary','Contractual','') DEFAULT NULL,
  `desired_employment_type` enum('Full Time','Part Time','') DEFAULT NULL,
  `permanent_address` varchar(256) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT '',
  `is_profile_completed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobseeker_userid_index_idx` (`userid`),
  KEY `jobseeker_resumeid_index_idx` (`resumeid`),
  KEY `jobseeker_regionid_fk_idx` (`regionid`),
  KEY `jobseeker_countryid_fk_idx` (`countryid`),
  CONSTRAINT `jobseeker_countryid_fk` FOREIGN KEY (`countryid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobseeker_regionid_fk` FOREIGN KEY (`regionid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobseeker_resumeid_fk` FOREIGN KEY (`resumeid`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobseeker_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_seeker
-- ----------------------------

-- ----------------------------
-- Table structure for `job_test_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `job_test_mapping`;
CREATE TABLE `job_test_mapping` (
  `id` varchar(64) NOT NULL,
  `jobid` varchar(64) DEFAULT NULL,
  `testid` int(11) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `test_deadline` int(11) DEFAULT NULL,
  `comments` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jtm_jobid_fk_idx` (`jobid`),
  KEY `jtm_testid_fk_idx` (`testid`),
  CONSTRAINT `jtm_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jtm_testid_fk` FOREIGN KEY (`testid`) REFERENCES `tests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_test_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `js_education`
-- ----------------------------
DROP TABLE IF EXISTS `js_education`;
CREATE TABLE `js_education` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `grade` enum('primary','graduation','pg','ppg') DEFAULT NULL,
  `is_highest_education` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_seeke_id_idx` (`job_seeker_id`),
  KEY `fk_jobs_seed_data_id_idx` (`course_id`),
  KEY `fk_jobs_seed_data_id_stream_id_idx` (`stream_id`),
  CONSTRAINT `fk_job_seeke_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jobs_seed_data_id_course_id` FOREIGN KEY (`course_id`) REFERENCES `jobs_seed_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jobs_seed_data_id_stream_id` FOREIGN KEY (`stream_id`) REFERENCES `jobs_seed_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_education
-- ----------------------------

-- ----------------------------
-- Table structure for `js_experience`
-- ----------------------------
DROP TABLE IF EXISTS `js_experience`;
CREATE TABLE `js_experience` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) NOT NULL,
  `employer_name` varchar(128) NOT NULL,
  `designation` varchar(256) DEFAULT NULL,
  `yearfrom` int(11) DEFAULT NULL,
  `yearto` int(11) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `key_responsibilities` varchar(2048) DEFAULT NULL,
  `monthfrom` int(11) DEFAULT NULL,
  `monthto` int(11) DEFAULT NULL,
  `reasonforleavingid` int(11) DEFAULT NULL,
  `reasonleavingcomments` varchar(2048) DEFAULT NULL,
  `servicetenure` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exp_seeker_id_idx` (`job_seeker_id`),
  CONSTRAINT `exp_seeker_idx` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_experience
-- ----------------------------

-- ----------------------------
-- Table structure for `js_nationality`
-- ----------------------------
DROP TABLE IF EXISTS `js_nationality`;
CREATE TABLE `js_nationality` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobseeker_id_fk_idx` (`job_seeker_id`),
  KEY `nationality_id_fk_idx` (`nationality_id`),
  CONSTRAINT `jobseeker_id_fk` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nationality_id_fk` FOREIGN KEY (`nationality_id`) REFERENCES `user_nationality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_nationality
-- ----------------------------

-- ----------------------------
-- Table structure for `js_pref_locations`
-- ----------------------------
DROP TABLE IF EXISTS `js_pref_locations`;
CREATE TABLE `js_pref_locations` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) NOT NULL,
  `countryid` int(11) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_pref_loc_seeker_id_idx` (`job_seeker_id`),
  KEY `job_pref_loc_countryid_fk_idx` (`countryid`),
  KEY `job_pref_loc_regionid_fk_idx` (`regionid`),
  CONSTRAINT `job_pref_loc_countryid_fk` FOREIGN KEY (`countryid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `job_pref_loc_regionid_fk` FOREIGN KEY (`regionid`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `job_pref_loc_seekerid_fk` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_pref_locations
-- ----------------------------

-- ----------------------------
-- Table structure for `js_project_details`
-- ----------------------------
DROP TABLE IF EXISTS `js_project_details`;
CREATE TABLE `js_project_details` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) DEFAULT NULL,
  `client_name` varchar(64) DEFAULT NULL,
  `project_title` varchar(128) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `project_location` varchar(45) DEFAULT NULL,
  `employment_type` varchar(45) DEFAULT NULL,
  `project_details` varchar(256) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `role_description` varchar(256) DEFAULT NULL,
  `team_size` varchar(10) DEFAULT NULL,
  `skills_used` varchar(128) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_seeker_id_idx` (`job_seeker_id`),
  CONSTRAINT `fk_job_seeker_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_project_details
-- ----------------------------

-- ----------------------------
-- Table structure for `js_qualifications`
-- ----------------------------
DROP TABLE IF EXISTS `js_qualifications`;
CREATE TABLE `js_qualifications` (
  `id` varchar(64) NOT NULL,
  `job_seeker_id` varchar(64) NOT NULL,
  `course` varchar(128) NOT NULL,
  `year_from` int(11) DEFAULT NULL,
  `year_to` int(11) DEFAULT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  `ishighestqualification` tinyint(1) DEFAULT '0',
  `isprimaryinfo` tinyint(1) DEFAULT '0',
  `board` varchar(64) DEFAULT NULL,
  `medium` varchar(45) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `education_type` varchar(64) DEFAULT NULL,
  `specialization` varchar(128) DEFAULT NULL,
  `university` varchar(128) DEFAULT NULL,
  `coursetype` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jsq_seekerid_fk_idx` (`job_seeker_id`),
  CONSTRAINT `jsq_seekerid_fk` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_qualifications
-- ----------------------------

-- ----------------------------
-- Table structure for `js_skills`
-- ----------------------------
DROP TABLE IF EXISTS `js_skills`;
CREATE TABLE `js_skills` (
  `id` varchar(64) NOT NULL,
  `skill` varchar(128) NOT NULL,
  `provider` varchar(128) DEFAULT NULL,
  `job_seeker_id` varchar(64) NOT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jss_seekerid_fk_idx` (`job_seeker_id`),
  CONSTRAINT `jss_seekerid_fk` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_skills
-- ----------------------------

-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `location_type` int(11) NOT NULL COMMENT '0:country,1:state,2:city',
  `parent_id` int(11) NOT NULL COMMENT 'parent location_id',
  `is_visible` int(11) NOT NULL COMMENT '0:visible,1:invisible',
  `location_code` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO location VALUES ('1', 'Aruba', '0', '0', '1', 'AW');
INSERT INTO location VALUES ('2', 'Afghanistan', '0', '0', '1', 'AF');
INSERT INTO location VALUES ('3', 'Angola', '0', '0', '1', 'AO');
INSERT INTO location VALUES ('4', 'Anguilla', '0', '0', '1', 'AI');
INSERT INTO location VALUES ('5', 'Albania', '0', '0', '1', 'AL');
INSERT INTO location VALUES ('6', 'Andorra', '0', '0', '1', 'AD');
INSERT INTO location VALUES ('7', 'Netherlands Antilles', '0', '0', '1', 'AN');
INSERT INTO location VALUES ('8', 'United Arab Emirates', '0', '0', '1', 'AE');
INSERT INTO location VALUES ('9', 'Argentina', '0', '0', '1', 'AR');
INSERT INTO location VALUES ('10', 'Armenia', '0', '0', '1', 'AM');
INSERT INTO location VALUES ('11', 'American Samoa', '0', '0', '1', 'AS');
INSERT INTO location VALUES ('12', 'Antarctica', '0', '0', '1', 'AQ');
INSERT INTO location VALUES ('13', 'French Southern territories', '0', '0', '1', 'TF');
INSERT INTO location VALUES ('14', 'Antigua and Barbuda', '0', '0', '1', 'AG');
INSERT INTO location VALUES ('15', 'Australia', '0', '0', '1', 'AU');
INSERT INTO location VALUES ('16', 'Austria', '0', '0', '1', 'AT');
INSERT INTO location VALUES ('17', 'Azerbaijan', '0', '0', '1', 'AZ');
INSERT INTO location VALUES ('18', 'Burundi', '0', '0', '1', 'BI');
INSERT INTO location VALUES ('19', 'Belgium', '0', '0', '1', 'BE');
INSERT INTO location VALUES ('20', 'Benin', '0', '0', '1', 'BJ');
INSERT INTO location VALUES ('21', 'Burkina Faso', '0', '0', '1', 'BF');
INSERT INTO location VALUES ('22', 'Bangladesh', '0', '0', '1', 'BD');
INSERT INTO location VALUES ('23', 'Bulgaria', '0', '0', '1', 'BG');
INSERT INTO location VALUES ('24', 'Bahrain', '0', '0', '1', 'BH');
INSERT INTO location VALUES ('25', 'Bahamas', '0', '0', '1', 'BS');
INSERT INTO location VALUES ('26', 'Bosnia and Herzegovina', '0', '0', '1', 'BA');
INSERT INTO location VALUES ('27', 'Belarus', '0', '0', '1', 'BY');
INSERT INTO location VALUES ('28', 'Belize', '0', '0', '1', 'BZ');
INSERT INTO location VALUES ('29', 'Bermuda', '0', '0', '1', 'BM');
INSERT INTO location VALUES ('30', 'Bolivia', '0', '0', '1', 'BO');
INSERT INTO location VALUES ('31', 'Brazil', '0', '0', '1', 'BR');
INSERT INTO location VALUES ('32', 'Barbados', '0', '0', '1', 'BB');
INSERT INTO location VALUES ('33', 'Brunei', '0', '0', '1', 'BN');
INSERT INTO location VALUES ('34', 'Bhutan', '0', '0', '1', 'BT');
INSERT INTO location VALUES ('35', 'Bouvet Island', '0', '0', '1', 'BV');
INSERT INTO location VALUES ('36', 'Botswana', '0', '0', '1', 'BW');
INSERT INTO location VALUES ('37', 'Central African Republic', '0', '0', '1', 'CF');
INSERT INTO location VALUES ('38', 'Canada', '0', '0', '1', 'CA');
INSERT INTO location VALUES ('39', 'Cocos (Keeling) Islands', '0', '0', '1', 'CC');
INSERT INTO location VALUES ('40', 'Switzerland', '0', '0', '1', 'CH');
INSERT INTO location VALUES ('41', 'Chile', '0', '0', '1', 'CL');
INSERT INTO location VALUES ('42', 'China', '0', '0', '1', 'CN');
INSERT INTO location VALUES ('43', 'CÃƒÆ’Ã‚Â´te dÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ', '0', '0', '1', 'CI');
INSERT INTO location VALUES ('44', 'Cameroon', '0', '0', '1', 'CM');
INSERT INTO location VALUES ('45', 'Congo, The Democratic Republic', '0', '0', '1', 'CD');
INSERT INTO location VALUES ('46', 'Congo', '0', '0', '1', 'CG');
INSERT INTO location VALUES ('47', 'Cook Islands', '0', '0', '1', 'CK');
INSERT INTO location VALUES ('48', 'Colombia', '0', '0', '1', 'CO');
INSERT INTO location VALUES ('49', 'Comoros', '0', '0', '1', 'CM');
INSERT INTO location VALUES ('50', 'Cape Verde', '0', '0', '1', 'CV');
INSERT INTO location VALUES ('51', 'Costa Rica', '0', '0', '1', 'CR');
INSERT INTO location VALUES ('52', 'Cuba', '0', '0', '1', 'CU');
INSERT INTO location VALUES ('53', 'Christmas Island', '0', '0', '1', 'CX');
INSERT INTO location VALUES ('54', 'Cayman Islands', '0', '0', '1', 'KY');
INSERT INTO location VALUES ('55', 'Cyprus', '0', '0', '1', 'CY');
INSERT INTO location VALUES ('56', 'Czech Republic', '0', '0', '1', 'CZ');
INSERT INTO location VALUES ('57', 'Germany', '0', '0', '1', 'DE');
INSERT INTO location VALUES ('58', 'Djibouti', '0', '0', '1', 'DJ');
INSERT INTO location VALUES ('59', 'Dominica', '0', '0', '1', 'DM');
INSERT INTO location VALUES ('60', 'Denmark', '0', '0', '1', 'DK');
INSERT INTO location VALUES ('61', 'Dominican Republic', '0', '0', '1', 'DO');
INSERT INTO location VALUES ('62', 'Algeria', '0', '0', '1', 'DZ');
INSERT INTO location VALUES ('63', 'Ecuador', '0', '0', '1', 'EC');
INSERT INTO location VALUES ('64', 'Egypt', '0', '0', '1', 'EG');
INSERT INTO location VALUES ('65', 'Eritrea', '0', '0', '1', 'ER');
INSERT INTO location VALUES ('66', 'Western Sahara', '0', '0', '1', 'EH');
INSERT INTO location VALUES ('67', 'Spain', '0', '0', '1', 'ES');
INSERT INTO location VALUES ('68', 'Estonia', '0', '0', '1', 'EE');
INSERT INTO location VALUES ('69', 'Ethiopia', '0', '0', '1', 'ET');
INSERT INTO location VALUES ('70', 'Finland', '0', '0', '1', 'FI');
INSERT INTO location VALUES ('71', 'Fiji Islands', '0', '0', '1', 'FJ');
INSERT INTO location VALUES ('72', 'Falkland Islands', '0', '0', '1', 'FK');
INSERT INTO location VALUES ('73', 'France', '0', '0', '1', 'FR');
INSERT INTO location VALUES ('74', 'Faroe Islands', '0', '0', '1', 'FO');
INSERT INTO location VALUES ('75', 'Micronesia, Federated States o', '0', '0', '1', 'FM');
INSERT INTO location VALUES ('76', 'Gabon', '0', '0', '1', 'GA');
INSERT INTO location VALUES ('77', 'United Kingdom', '0', '0', '1', 'GB');
INSERT INTO location VALUES ('78', 'Georgia', '0', '0', '1', 'GE');
INSERT INTO location VALUES ('79', 'Ghana', '0', '0', '1', 'GH');
INSERT INTO location VALUES ('80', 'Gibraltar', '0', '0', '1', 'GI');
INSERT INTO location VALUES ('81', 'Guinea', '0', '0', '1', 'GN');
INSERT INTO location VALUES ('82', 'Guadeloupe', '0', '0', '1', 'GP');
INSERT INTO location VALUES ('83', 'Gambia', '0', '0', '1', 'GM');
INSERT INTO location VALUES ('84', 'Guinea-Bissau', '0', '0', '1', 'GW');
INSERT INTO location VALUES ('85', 'Equatorial Guinea', '0', '0', '1', 'GQ');
INSERT INTO location VALUES ('86', 'Greece', '0', '0', '1', 'GR');
INSERT INTO location VALUES ('87', 'Grenada', '0', '0', '1', 'GD');
INSERT INTO location VALUES ('88', 'Greenland', '0', '0', '1', 'GL');
INSERT INTO location VALUES ('89', 'Guatemala', '0', '0', '1', 'GT');
INSERT INTO location VALUES ('90', 'French Guiana', '0', '0', '1', 'GF');
INSERT INTO location VALUES ('91', 'Guam', '0', '0', '1', 'GU');
INSERT INTO location VALUES ('92', 'Guyana', '0', '0', '1', 'GY');
INSERT INTO location VALUES ('93', 'Hong Kong', '0', '0', '1', 'HK');
INSERT INTO location VALUES ('94', 'Heard Island and McDonald Isla', '0', '0', '1', 'HM');
INSERT INTO location VALUES ('95', 'Honduras', '0', '0', '1', 'HN');
INSERT INTO location VALUES ('96', 'Croatia', '0', '0', '1', 'HR');
INSERT INTO location VALUES ('97', 'Haiti', '0', '0', '1', 'HT');
INSERT INTO location VALUES ('98', 'Hungary', '0', '0', '1', 'HU');
INSERT INTO location VALUES ('99', 'Indonesia', '0', '0', '1', 'ID');
INSERT INTO location VALUES ('100', 'India', '0', '0', '1', 'IN');
INSERT INTO location VALUES ('101', 'British Indian Ocean Territory', '0', '0', '1', 'IO');
INSERT INTO location VALUES ('102', 'Ireland', '0', '0', '1', 'IE');
INSERT INTO location VALUES ('103', 'Iran', '0', '0', '1', 'IR');
INSERT INTO location VALUES ('104', 'Iraq', '0', '0', '1', 'IQ');
INSERT INTO location VALUES ('105', 'Iceland', '0', '0', '1', 'IS');
INSERT INTO location VALUES ('106', 'Israel', '0', '0', '1', 'IL');
INSERT INTO location VALUES ('107', 'Italy', '0', '0', '1', 'IT');
INSERT INTO location VALUES ('108', 'Jamaica', '0', '0', '1', 'JM');
INSERT INTO location VALUES ('109', 'Jordan', '0', '0', '1', 'JO');
INSERT INTO location VALUES ('110', 'Japan', '0', '0', '1', 'JP');
INSERT INTO location VALUES ('111', 'Kazakstan', '0', '0', '1', 'KZ');
INSERT INTO location VALUES ('112', 'Kenya', '0', '0', '1', 'KE');
INSERT INTO location VALUES ('113', 'Kyrgyzstan', '0', '0', '1', 'KG');
INSERT INTO location VALUES ('114', 'Cambodia', '0', '0', '1', 'KH');
INSERT INTO location VALUES ('115', 'Kiribati', '0', '0', '1', 'KI');
INSERT INTO location VALUES ('116', 'Saint Kitts and Nevis', '0', '0', '1', 'KN');
INSERT INTO location VALUES ('117', 'South Korea', '0', '0', '1', 'KR');
INSERT INTO location VALUES ('118', 'Kuwait', '0', '0', '1', 'KW');
INSERT INTO location VALUES ('119', 'Laos', '0', '0', '1', 'LA');
INSERT INTO location VALUES ('120', 'Lebanon', '0', '0', '1', 'LB');
INSERT INTO location VALUES ('121', 'Liberia', '0', '0', '1', 'LR');
INSERT INTO location VALUES ('122', 'Libyan Arab Jamahiriya', '0', '0', '1', 'LY');
INSERT INTO location VALUES ('123', 'Saint Lucia', '0', '0', '1', 'LC');
INSERT INTO location VALUES ('124', 'Liechtenstein', '0', '0', '1', 'LI');
INSERT INTO location VALUES ('125', 'Sri Lanka', '0', '0', '1', 'LK');
INSERT INTO location VALUES ('126', 'Lesotho', '0', '0', '1', 'LS');
INSERT INTO location VALUES ('127', 'Lithuania', '0', '0', '1', 'LT');
INSERT INTO location VALUES ('128', 'Luxembourg', '0', '0', '1', 'LU');
INSERT INTO location VALUES ('129', 'Latvia', '0', '0', '1', 'LV');
INSERT INTO location VALUES ('130', 'Macao', '0', '0', '1', 'MO');
INSERT INTO location VALUES ('131', 'Morocco', '0', '0', '1', 'MA');
INSERT INTO location VALUES ('132', 'Monaco', '0', '0', '1', 'MC');
INSERT INTO location VALUES ('133', 'Moldova', '0', '0', '1', 'MD');
INSERT INTO location VALUES ('134', 'Madagascar', '0', '0', '1', 'MG');
INSERT INTO location VALUES ('135', 'Maldives', '0', '0', '1', 'MV');
INSERT INTO location VALUES ('136', 'Mexico', '0', '0', '1', 'MX');
INSERT INTO location VALUES ('137', 'Marshall Islands', '0', '0', '1', 'MH');
INSERT INTO location VALUES ('138', 'Macedonia', '0', '0', '1', 'MK');
INSERT INTO location VALUES ('139', 'Mali', '0', '0', '1', 'ML');
INSERT INTO location VALUES ('140', 'Malta', '0', '0', '1', 'MT');
INSERT INTO location VALUES ('141', 'Myanmar', '0', '0', '1', 'MM');
INSERT INTO location VALUES ('142', 'Mongolia', '0', '0', '1', 'MN');
INSERT INTO location VALUES ('143', 'Northern Mariana Islands', '0', '0', '1', 'MP');
INSERT INTO location VALUES ('144', 'Mozambique', '0', '0', '1', 'MZ');
INSERT INTO location VALUES ('145', 'Mauritania', '0', '0', '1', 'MR');
INSERT INTO location VALUES ('146', 'Montserrat', '0', '0', '1', 'MS');
INSERT INTO location VALUES ('147', 'Martinique', '0', '0', '1', 'MQ');
INSERT INTO location VALUES ('148', 'Mauritius', '0', '0', '1', 'MU');
INSERT INTO location VALUES ('149', 'Malawi', '0', '0', '1', 'MW');
INSERT INTO location VALUES ('150', 'Malaysia', '0', '0', '1', 'MY');
INSERT INTO location VALUES ('151', 'Mayotte', '0', '0', '1', 'MT');
INSERT INTO location VALUES ('152', 'Namibia', '0', '0', '1', 'NA');
INSERT INTO location VALUES ('153', 'New Caledonia', '0', '0', '1', 'NC');
INSERT INTO location VALUES ('154', 'Niger', '0', '0', '1', 'NE');
INSERT INTO location VALUES ('155', 'Norfolk Island', '0', '0', '1', 'NF');
INSERT INTO location VALUES ('156', 'Nigeria', '0', '0', '1', 'NG');
INSERT INTO location VALUES ('157', 'Nicaragua', '0', '0', '1', 'NI');
INSERT INTO location VALUES ('158', 'Niue', '0', '0', '1', 'NU');
INSERT INTO location VALUES ('159', 'Netherlands', '0', '0', '1', 'NL');
INSERT INTO location VALUES ('160', 'Norway', '0', '0', '1', 'NO');
INSERT INTO location VALUES ('161', 'Nepal', '0', '0', '1', 'NP');
INSERT INTO location VALUES ('162', 'Nauru', '0', '0', '1', 'NR');
INSERT INTO location VALUES ('163', 'New Zealand', '0', '0', '1', 'NZ');
INSERT INTO location VALUES ('164', 'Oman', '0', '0', '1', 'OM');
INSERT INTO location VALUES ('165', 'Pakistan', '0', '0', '1', 'PK');
INSERT INTO location VALUES ('166', 'Panama', '0', '0', '1', 'PA');
INSERT INTO location VALUES ('167', 'Pitcairn', '0', '0', '1', 'PN');
INSERT INTO location VALUES ('168', 'Peru', '0', '0', '1', 'PE');
INSERT INTO location VALUES ('169', 'Philippines', '0', '0', '1', 'PH');
INSERT INTO location VALUES ('170', 'Palau', '0', '0', '1', 'PW');
INSERT INTO location VALUES ('171', 'Papua New Guinea', '0', '0', '1', 'PG');
INSERT INTO location VALUES ('172', 'Poland', '0', '0', '1', 'PL');
INSERT INTO location VALUES ('173', 'Puerto Rico', '0', '0', '1', 'PR');
INSERT INTO location VALUES ('174', 'North Korea', '0', '0', '1', 'KP');
INSERT INTO location VALUES ('175', 'Portugal', '0', '0', '1', 'PT');
INSERT INTO location VALUES ('176', 'Paraguay', '0', '0', '1', 'PY');
INSERT INTO location VALUES ('177', 'Palestine', '0', '0', '1', 'PS');
INSERT INTO location VALUES ('178', 'French Polynesia', '0', '0', '1', 'PF');
INSERT INTO location VALUES ('179', 'Qatar', '0', '0', '1', 'QA');
INSERT INTO location VALUES ('180', 'RÃƒÆ’Ã‚Â©union', '0', '0', '1', null);
INSERT INTO location VALUES ('181', 'Romania', '0', '0', '1', 'RO');
INSERT INTO location VALUES ('182', 'Russian Federation', '0', '0', '1', 'RU');
INSERT INTO location VALUES ('183', 'Rwanda', '0', '0', '1', 'RW');
INSERT INTO location VALUES ('184', 'Saudi Arabia', '0', '0', '1', 'SA');
INSERT INTO location VALUES ('185', 'Sudan', '0', '0', '1', 'SD');
INSERT INTO location VALUES ('186', 'Senegal', '0', '0', '1', 'SN');
INSERT INTO location VALUES ('187', 'Singapore', '0', '0', '1', 'SG');
INSERT INTO location VALUES ('188', 'South Georgia and the South Sa', '0', '0', '1', 'GS');
INSERT INTO location VALUES ('189', 'Saint Helena', '0', '0', '1', 'SH');
INSERT INTO location VALUES ('190', 'Svalbard and Jan Mayen', '0', '0', '1', 'SJ');
INSERT INTO location VALUES ('191', 'Solomon Islands', '0', '0', '1', 'SB');
INSERT INTO location VALUES ('192', 'Sierra Leone', '0', '0', '1', 'SL');
INSERT INTO location VALUES ('193', 'El Salvador', '0', '0', '1', 'SV');
INSERT INTO location VALUES ('194', 'San Marino', '0', '0', '1', 'SM');
INSERT INTO location VALUES ('195', 'Somalia', '0', '0', '1', 'SO');
INSERT INTO location VALUES ('196', 'Saint Pierre and Miquelon', '0', '0', '1', 'PM');
INSERT INTO location VALUES ('197', 'Sao Tome and Principe', '0', '0', '1', 'ST');
INSERT INTO location VALUES ('198', 'Suriname', '0', '0', '1', 'SR');
INSERT INTO location VALUES ('199', 'Slovakia', '0', '0', '1', 'SK');
INSERT INTO location VALUES ('200', 'Slovenia', '0', '0', '1', 'SI');
INSERT INTO location VALUES ('201', 'Sweden', '0', '0', '1', 'SE');
INSERT INTO location VALUES ('202', 'Swaziland', '0', '0', '1', 'SZ');
INSERT INTO location VALUES ('203', 'Seychelles', '0', '0', '1', 'SC');
INSERT INTO location VALUES ('204', 'Syria', '0', '0', '1', 'SY');
INSERT INTO location VALUES ('205', 'Turks and Caicos Islands', '0', '0', '1', 'TC');
INSERT INTO location VALUES ('206', 'Chad', '0', '0', '1', 'TD');
INSERT INTO location VALUES ('207', 'Togo', '0', '0', '1', 'TG');
INSERT INTO location VALUES ('208', 'Thailand', '0', '0', '1', 'TH');
INSERT INTO location VALUES ('209', 'Tajikistan', '0', '0', '1', 'TJ');
INSERT INTO location VALUES ('210', 'Tokelau', '0', '0', '1', 'TK');
INSERT INTO location VALUES ('211', 'Turkmenistan', '0', '0', '1', 'TM');
INSERT INTO location VALUES ('212', 'East Timor', '0', '0', '1', 'TL');
INSERT INTO location VALUES ('213', 'Tonga', '0', '0', '1', 'TO');
INSERT INTO location VALUES ('214', 'Trinidad and Tobago', '0', '0', '1', 'TT');
INSERT INTO location VALUES ('215', 'Tunisia', '0', '0', '1', 'TN');
INSERT INTO location VALUES ('216', 'Turkey', '0', '0', '1', 'TR');
INSERT INTO location VALUES ('217', 'Tuvalu', '0', '0', '1', 'TV');
INSERT INTO location VALUES ('218', 'Taiwan', '0', '0', '1', 'TW');
INSERT INTO location VALUES ('219', 'Tanzania', '0', '0', '1', 'TZ');
INSERT INTO location VALUES ('220', 'Uganda', '0', '0', '1', 'UG');
INSERT INTO location VALUES ('221', 'Ukraine', '0', '0', '1', 'UA');
INSERT INTO location VALUES ('222', 'United States Minor Outlying I', '0', '0', '1', 'UM');
INSERT INTO location VALUES ('223', 'Uruguay', '0', '0', '1', 'UY');
INSERT INTO location VALUES ('224', 'United States', '0', '0', '1', 'US');
INSERT INTO location VALUES ('225', 'Uzbekistan', '0', '0', '1', 'UZ');
INSERT INTO location VALUES ('226', 'Holy See (Vatican City State)', '0', '0', '1', 'VA');
INSERT INTO location VALUES ('227', 'Saint Vincent and the Grenadin', '0', '0', '1', 'VC');
INSERT INTO location VALUES ('228', 'Venezuela', '0', '0', '1', 'VE');
INSERT INTO location VALUES ('229', 'Virgin Islands, British', '0', '0', '1', 'VG');
INSERT INTO location VALUES ('230', 'Virgin Islands, U.S.', '0', '0', '1', 'VI');
INSERT INTO location VALUES ('231', 'Vietnam', '0', '0', '1', 'VN');
INSERT INTO location VALUES ('232', 'Vanuatu', '0', '0', '1', 'VU');
INSERT INTO location VALUES ('233', 'Wallis and Futuna', '0', '0', '1', 'WF');
INSERT INTO location VALUES ('234', 'Samoa', '0', '0', '1', 'WS');
INSERT INTO location VALUES ('235', 'Yemen', '0', '0', '1', 'YE');
INSERT INTO location VALUES ('236', 'Yugoslavia', '0', '0', '1', 'YU');
INSERT INTO location VALUES ('237', 'South Africa', '0', '0', '1', 'ZA');
INSERT INTO location VALUES ('238', 'Zambia', '0', '0', '1', 'SM');
INSERT INTO location VALUES ('239', 'Zimbabwe', '0', '0', '1', 'ZW');
INSERT INTO location VALUES ('240', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '1', '1', null);
INSERT INTO location VALUES ('241', 'Balkh', '1', '2', '1', null);
INSERT INTO location VALUES ('242', 'Herat', '1', '2', '1', null);
INSERT INTO location VALUES ('243', 'Kabol', '1', '2', '1', null);
INSERT INTO location VALUES ('244', 'Qandahar', '1', '2', '1', null);
INSERT INTO location VALUES ('245', 'Benguela', '1', '3', '1', null);
INSERT INTO location VALUES ('246', 'Huambo', '1', '3', '1', null);
INSERT INTO location VALUES ('247', 'Luanda', '1', '3', '1', null);
INSERT INTO location VALUES ('248', 'Namibe', '1', '3', '1', null);
INSERT INTO location VALUES ('249', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '4', '1', null);
INSERT INTO location VALUES ('250', 'Tirana', '1', '5', '1', null);
INSERT INTO location VALUES ('251', 'Andorra la Vella', '1', '6', '1', null);
INSERT INTO location VALUES ('252', 'CuraÃƒÆ’Ã‚Â§ao', '1', '7', '1', null);
INSERT INTO location VALUES ('253', 'Abu Dhabi', '1', '8', '1', null);
INSERT INTO location VALUES ('254', 'Ajman', '1', '8', '1', null);
INSERT INTO location VALUES ('255', 'Dubai', '1', '8', '1', null);
INSERT INTO location VALUES ('256', 'Sharja', '1', '8', '1', null);
INSERT INTO location VALUES ('257', 'Buenos Aires', '1', '9', '1', null);
INSERT INTO location VALUES ('258', 'Catamarca', '1', '9', '1', null);
INSERT INTO location VALUES ('259', 'CÃƒÆ’Ã‚Â³rdoba', '1', '9', '1', null);
INSERT INTO location VALUES ('260', 'Chaco', '1', '9', '1', null);
INSERT INTO location VALUES ('261', 'Chubut', '1', '9', '1', null);
INSERT INTO location VALUES ('262', 'Corrientes', '1', '9', '1', null);
INSERT INTO location VALUES ('263', 'Distrito Federal', '1', '9', '1', null);
INSERT INTO location VALUES ('264', 'Entre Rios', '1', '9', '1', null);
INSERT INTO location VALUES ('265', 'Formosa', '1', '9', '1', null);
INSERT INTO location VALUES ('266', 'Jujuy', '1', '9', '1', null);
INSERT INTO location VALUES ('267', 'La Rioja', '1', '9', '1', null);
INSERT INTO location VALUES ('268', 'Mendoza', '1', '9', '1', null);
INSERT INTO location VALUES ('269', 'Misiones', '1', '9', '1', null);
INSERT INTO location VALUES ('270', 'NeuquÃƒÆ’Ã‚Â©n', '1', '9', '1', null);
INSERT INTO location VALUES ('271', 'Salta', '1', '9', '1', null);
INSERT INTO location VALUES ('272', 'San Juan', '1', '9', '1', null);
INSERT INTO location VALUES ('273', 'San Luis', '1', '9', '1', null);
INSERT INTO location VALUES ('274', 'Santa FÃƒÆ’Ã‚Â©', '1', '9', '1', null);
INSERT INTO location VALUES ('275', 'Santiago del Estero', '1', '9', '1', null);
INSERT INTO location VALUES ('276', 'TucumÃƒÆ’Ã‚Â¡n', '1', '9', '1', null);
INSERT INTO location VALUES ('277', 'Lori', '1', '10', '1', null);
INSERT INTO location VALUES ('278', 'Yerevan', '1', '10', '1', null);
INSERT INTO location VALUES ('279', 'Ãƒâ€¦ irak', '1', '10', '1', null);
INSERT INTO location VALUES ('280', 'Tutuila', '1', '11', '1', null);
INSERT INTO location VALUES ('281', 'St John', '1', '14', '1', null);
INSERT INTO location VALUES ('282', 'Capital Region', '1', '15', '1', null);
INSERT INTO location VALUES ('283', 'New South Wales', '1', '15', '1', null);
INSERT INTO location VALUES ('284', 'Queensland', '1', '15', '1', null);
INSERT INTO location VALUES ('285', 'South Australia', '1', '15', '1', null);
INSERT INTO location VALUES ('286', 'Tasmania', '1', '15', '1', null);
INSERT INTO location VALUES ('287', 'Victoria', '1', '15', '1', null);
INSERT INTO location VALUES ('288', 'West Australia', '1', '15', '1', null);
INSERT INTO location VALUES ('289', 'KÃƒÆ’Ã‚Â¤rnten', '1', '16', '1', null);
INSERT INTO location VALUES ('290', 'North Austria', '1', '16', '1', null);
INSERT INTO location VALUES ('291', 'Salzburg', '1', '16', '1', null);
INSERT INTO location VALUES ('292', 'Steiermark', '1', '16', '1', null);
INSERT INTO location VALUES ('293', 'Tiroli', '1', '16', '1', null);
INSERT INTO location VALUES ('294', 'Wien', '1', '16', '1', null);
INSERT INTO location VALUES ('295', 'Baki', '1', '17', '1', null);
INSERT INTO location VALUES ('296', 'GÃƒÆ’Ã‚Â¤ncÃƒÆ’Ã‚Â¤', '1', '17', '1', null);
INSERT INTO location VALUES ('297', 'MingÃƒÆ’Ã‚Â¤ÃƒÆ’Ã‚Â§evir', '1', '17', '1', null);
INSERT INTO location VALUES ('298', 'Sumqayit', '1', '17', '1', null);
INSERT INTO location VALUES ('299', 'Bujumbura', '1', '18', '1', null);
INSERT INTO location VALUES ('300', 'Antwerpen', '1', '19', '1', null);
INSERT INTO location VALUES ('301', 'Bryssel', '1', '19', '1', null);
INSERT INTO location VALUES ('302', 'East Flanderi', '1', '19', '1', null);
INSERT INTO location VALUES ('303', 'Hainaut', '1', '19', '1', null);
INSERT INTO location VALUES ('304', 'LiÃƒÆ’Ã‚Â¨ge', '1', '19', '1', null);
INSERT INTO location VALUES ('305', 'Namur', '1', '19', '1', null);
INSERT INTO location VALUES ('306', 'West Flanderi', '1', '19', '1', null);
INSERT INTO location VALUES ('307', 'Atacora', '1', '20', '1', null);
INSERT INTO location VALUES ('308', 'Atlantique', '1', '20', '1', null);
INSERT INTO location VALUES ('309', 'Borgou', '1', '20', '1', null);
INSERT INTO location VALUES ('310', 'OuÃƒÆ’Ã‚Â©mÃƒÆ’Ã‚Â©', '1', '20', '1', null);
INSERT INTO location VALUES ('311', 'BoulkiemdÃƒÆ’Ã‚Â©', '1', '21', '1', null);
INSERT INTO location VALUES ('312', 'Houet', '1', '21', '1', null);
INSERT INTO location VALUES ('313', 'Kadiogo', '1', '21', '1', null);
INSERT INTO location VALUES ('314', 'Barisal', '1', '22', '1', null);
INSERT INTO location VALUES ('315', 'Chittagong', '1', '22', '1', null);
INSERT INTO location VALUES ('316', 'Dhaka', '1', '22', '1', null);
INSERT INTO location VALUES ('317', 'Khulna', '1', '22', '1', null);
INSERT INTO location VALUES ('318', 'Rajshahi', '1', '22', '1', null);
INSERT INTO location VALUES ('319', 'Sylhet', '1', '22', '1', null);
INSERT INTO location VALUES ('320', 'Burgas', '1', '23', '1', null);
INSERT INTO location VALUES ('321', 'Grad Sofija', '1', '23', '1', null);
INSERT INTO location VALUES ('322', 'Haskovo', '1', '23', '1', null);
INSERT INTO location VALUES ('323', 'Lovec', '1', '23', '1', null);
INSERT INTO location VALUES ('324', 'Plovdiv', '1', '23', '1', null);
INSERT INTO location VALUES ('325', 'Ruse', '1', '23', '1', null);
INSERT INTO location VALUES ('326', 'Varna', '1', '23', '1', null);
INSERT INTO location VALUES ('327', 'al-Manama', '1', '24', '1', null);
INSERT INTO location VALUES ('328', 'New Providence', '1', '25', '1', null);
INSERT INTO location VALUES ('329', 'Federaatio', '1', '26', '1', null);
INSERT INTO location VALUES ('330', 'Republika Srpska', '1', '26', '1', null);
INSERT INTO location VALUES ('331', 'Brest', '1', '27', '1', null);
INSERT INTO location VALUES ('332', 'Gomel', '1', '27', '1', null);
INSERT INTO location VALUES ('333', 'Grodno', '1', '27', '1', null);
INSERT INTO location VALUES ('334', 'Horad Minsk', '1', '27', '1', null);
INSERT INTO location VALUES ('335', 'Minsk', '1', '27', '1', null);
INSERT INTO location VALUES ('336', 'Mogiljov', '1', '27', '1', null);
INSERT INTO location VALUES ('337', 'Vitebsk', '1', '27', '1', null);
INSERT INTO location VALUES ('338', 'Belize City', '1', '28', '1', null);
INSERT INTO location VALUES ('339', 'Cayo', '1', '28', '1', null);
INSERT INTO location VALUES ('340', 'Hamilton', '1', '29', '1', null);
INSERT INTO location VALUES ('341', 'Saint GeorgeÃƒâ€šÃ‚Â´s', '1', '29', '1', null);
INSERT INTO location VALUES ('342', 'Chuquisaca', '1', '30', '1', null);
INSERT INTO location VALUES ('343', 'Cochabamba', '1', '30', '1', null);
INSERT INTO location VALUES ('344', 'La Paz', '1', '30', '1', null);
INSERT INTO location VALUES ('345', 'Oruro', '1', '30', '1', null);
INSERT INTO location VALUES ('346', 'PotosÃƒÆ’Ã‚Â¬', '1', '30', '1', null);
INSERT INTO location VALUES ('347', 'Santa Cruz', '1', '30', '1', null);
INSERT INTO location VALUES ('348', 'Tarija', '1', '30', '1', null);
INSERT INTO location VALUES ('349', 'Acre', '1', '31', '1', null);
INSERT INTO location VALUES ('350', 'Alagoas', '1', '31', '1', null);
INSERT INTO location VALUES ('351', 'AmapÃƒÆ’Ã‚Â¡', '1', '31', '1', null);
INSERT INTO location VALUES ('352', 'Amazonas', '1', '31', '1', null);
INSERT INTO location VALUES ('353', 'Bahia', '1', '31', '1', null);
INSERT INTO location VALUES ('354', 'CearÃƒÆ’Ã‚Â¡', '1', '31', '1', null);
INSERT INTO location VALUES ('355', 'Distrito Federal', '1', '31', '1', null);
INSERT INTO location VALUES ('356', 'EspÃƒÆ’Ã‚Â¬rito Santo', '1', '31', '1', null);
INSERT INTO location VALUES ('357', 'GoiÃƒÆ’Ã‚Â¡s', '1', '31', '1', null);
INSERT INTO location VALUES ('358', 'MaranhÃƒÆ’Ã‚Â£o', '1', '31', '1', null);
INSERT INTO location VALUES ('359', 'Mato Grosso', '1', '31', '1', null);
INSERT INTO location VALUES ('360', 'Mato Grosso do Sul', '1', '31', '1', null);
INSERT INTO location VALUES ('361', 'Minas Gerais', '1', '31', '1', null);
INSERT INTO location VALUES ('362', 'ParaÃƒÆ’Ã‚Â¬ba', '1', '31', '1', null);
INSERT INTO location VALUES ('363', 'ParanÃƒÆ’Ã‚Â¡', '1', '31', '1', null);
INSERT INTO location VALUES ('364', 'ParÃƒÆ’Ã‚Â¡', '1', '31', '1', null);
INSERT INTO location VALUES ('365', 'Pernambuco', '1', '31', '1', null);
INSERT INTO location VALUES ('366', 'PiauÃƒÆ’Ã‚Â¬', '1', '31', '1', null);
INSERT INTO location VALUES ('367', 'Rio de Janeiro', '1', '31', '1', null);
INSERT INTO location VALUES ('368', 'Rio Grande do Norte', '1', '31', '1', null);
INSERT INTO location VALUES ('369', 'Rio Grande do Sul', '1', '31', '1', null);
INSERT INTO location VALUES ('370', 'RondÃƒÆ’Ã‚Â´nia', '1', '31', '1', null);
INSERT INTO location VALUES ('371', 'Roraima', '1', '31', '1', null);
INSERT INTO location VALUES ('372', 'Santa Catarina', '1', '31', '1', null);
INSERT INTO location VALUES ('373', 'SÃƒÆ’Ã‚Â£o Paulo', '1', '31', '1', null);
INSERT INTO location VALUES ('374', 'Sergipe', '1', '31', '1', null);
INSERT INTO location VALUES ('375', 'Tocantins', '1', '31', '1', null);
INSERT INTO location VALUES ('376', 'St Michael', '1', '32', '1', null);
INSERT INTO location VALUES ('377', 'Brunei and Muara', '1', '33', '1', null);
INSERT INTO location VALUES ('378', 'Thimphu', '1', '34', '1', null);
INSERT INTO location VALUES ('379', 'Francistown', '1', '36', '1', null);
INSERT INTO location VALUES ('380', 'Gaborone', '1', '36', '1', null);
INSERT INTO location VALUES ('381', 'Bangui', '1', '37', '1', null);
INSERT INTO location VALUES ('382', 'Alberta', '1', '38', '1', null);
INSERT INTO location VALUES ('383', 'British Colombia', '1', '38', '1', null);
INSERT INTO location VALUES ('384', 'Manitoba', '1', '38', '1', null);
INSERT INTO location VALUES ('385', 'Newfoundland', '1', '38', '1', null);
INSERT INTO location VALUES ('386', 'Nova Scotia', '1', '38', '1', null);
INSERT INTO location VALUES ('387', 'Ontario', '1', '38', '1', null);
INSERT INTO location VALUES ('388', 'QuÃƒÆ’Ã‚Â©bec', '1', '38', '1', null);
INSERT INTO location VALUES ('389', 'Saskatchewan', '1', '38', '1', null);
INSERT INTO location VALUES ('390', 'Home Island', '1', '39', '1', null);
INSERT INTO location VALUES ('391', 'West Island', '1', '39', '1', null);
INSERT INTO location VALUES ('392', 'Basel-Stadt', '1', '40', '1', null);
INSERT INTO location VALUES ('393', 'Bern', '1', '40', '1', null);
INSERT INTO location VALUES ('394', 'Geneve', '1', '40', '1', null);
INSERT INTO location VALUES ('395', 'Vaud', '1', '40', '1', null);
INSERT INTO location VALUES ('396', 'ZÃƒÆ’Ã‚Â¼rich', '1', '40', '1', null);
INSERT INTO location VALUES ('397', 'Antofagasta', '1', '41', '1', null);
INSERT INTO location VALUES ('398', 'Atacama', '1', '41', '1', null);
INSERT INTO location VALUES ('399', 'BÃƒÆ’Ã‚Â¬obÃƒÆ’Ã‚Â¬o', '1', '41', '1', null);
INSERT INTO location VALUES ('400', 'Coquimbo', '1', '41', '1', null);
INSERT INTO location VALUES ('401', 'La AraucanÃƒÆ’Ã‚Â¬a', '1', '41', '1', null);
INSERT INTO location VALUES ('402', 'Los Lagos', '1', '41', '1', null);
INSERT INTO location VALUES ('403', 'Magallanes', '1', '41', '1', null);
INSERT INTO location VALUES ('404', 'Maule', '1', '41', '1', null);
INSERT INTO location VALUES ('405', 'OÃƒâ€šÃ‚Â´Higgins', '1', '41', '1', null);
INSERT INTO location VALUES ('406', 'Santiago', '1', '41', '1', null);
INSERT INTO location VALUES ('407', 'TarapacÃƒÆ’Ã‚Â¡', '1', '41', '1', null);
INSERT INTO location VALUES ('408', 'ValparaÃƒÆ’Ã‚Â¬so', '1', '41', '1', null);
INSERT INTO location VALUES ('409', 'Anhui', '1', '42', '1', null);
INSERT INTO location VALUES ('410', 'Chongqing', '1', '42', '1', null);
INSERT INTO location VALUES ('411', 'Fujian', '1', '42', '1', null);
INSERT INTO location VALUES ('412', 'Gansu', '1', '42', '1', null);
INSERT INTO location VALUES ('413', 'Guangdong', '1', '42', '1', null);
INSERT INTO location VALUES ('414', 'Guangxi', '1', '42', '1', null);
INSERT INTO location VALUES ('415', 'Guizhou', '1', '42', '1', null);
INSERT INTO location VALUES ('416', 'Hainan', '1', '42', '1', null);
INSERT INTO location VALUES ('417', 'Hebei', '1', '42', '1', null);
INSERT INTO location VALUES ('418', 'Heilongjiang', '1', '42', '1', null);
INSERT INTO location VALUES ('419', 'Henan', '1', '42', '1', null);
INSERT INTO location VALUES ('420', 'Hubei', '1', '42', '1', null);
INSERT INTO location VALUES ('421', 'Hunan', '1', '42', '1', null);
INSERT INTO location VALUES ('422', 'Inner Mongolia', '1', '42', '1', null);
INSERT INTO location VALUES ('423', 'Jiangsu', '1', '42', '1', null);
INSERT INTO location VALUES ('424', 'Jiangxi', '1', '42', '1', null);
INSERT INTO location VALUES ('425', 'Jilin', '1', '42', '1', null);
INSERT INTO location VALUES ('426', 'Liaoning', '1', '42', '1', null);
INSERT INTO location VALUES ('427', 'Ningxia', '1', '42', '1', null);
INSERT INTO location VALUES ('428', 'Peking', '1', '42', '1', null);
INSERT INTO location VALUES ('429', 'Qinghai', '1', '42', '1', null);
INSERT INTO location VALUES ('430', 'Shaanxi', '1', '42', '1', null);
INSERT INTO location VALUES ('431', 'Shandong', '1', '42', '1', null);
INSERT INTO location VALUES ('432', 'Shanghai', '1', '42', '1', null);
INSERT INTO location VALUES ('433', 'Shanxi', '1', '42', '1', null);
INSERT INTO location VALUES ('434', 'Sichuan', '1', '42', '1', null);
INSERT INTO location VALUES ('435', 'Tianjin', '1', '42', '1', null);
INSERT INTO location VALUES ('436', 'Tibet', '1', '42', '1', null);
INSERT INTO location VALUES ('437', 'Xinxiang', '1', '42', '1', null);
INSERT INTO location VALUES ('438', 'Yunnan', '1', '42', '1', null);
INSERT INTO location VALUES ('439', 'Zhejiang', '1', '42', '1', null);
INSERT INTO location VALUES ('440', 'Abidjan', '1', '43', '1', null);
INSERT INTO location VALUES ('441', 'BouakÃƒÆ’Ã‚Â©', '1', '43', '1', null);
INSERT INTO location VALUES ('442', 'Daloa', '1', '43', '1', null);
INSERT INTO location VALUES ('443', 'Korhogo', '1', '43', '1', null);
INSERT INTO location VALUES ('444', 'Yamoussoukro', '1', '43', '1', null);
INSERT INTO location VALUES ('445', 'Centre', '1', '44', '1', null);
INSERT INTO location VALUES ('446', 'ExtrÃƒÆ’Ã‚Âªme-Nord', '1', '44', '1', null);
INSERT INTO location VALUES ('447', 'Littoral', '1', '44', '1', null);
INSERT INTO location VALUES ('448', 'Nord', '1', '44', '1', null);
INSERT INTO location VALUES ('449', 'Nord-Ouest', '1', '44', '1', null);
INSERT INTO location VALUES ('450', 'Ouest', '1', '44', '1', null);
INSERT INTO location VALUES ('451', 'Bandundu', '1', '0', '1', null);
INSERT INTO location VALUES ('452', 'Bas-ZaÃƒÆ’Ã‚Â¯re', '1', '0', '1', null);
INSERT INTO location VALUES ('453', 'East Kasai', '1', '0', '1', null);
INSERT INTO location VALUES ('454', 'Equateur', '1', '0', '1', null);
INSERT INTO location VALUES ('455', 'Haute-ZaÃƒÆ’Ã‚Â¯re', '1', '0', '1', null);
INSERT INTO location VALUES ('456', 'Kinshasa', '1', '0', '1', null);
INSERT INTO location VALUES ('457', 'North Kivu', '1', '0', '1', null);
INSERT INTO location VALUES ('458', 'Shaba', '1', '0', '1', null);
INSERT INTO location VALUES ('459', 'South Kivu', '1', '0', '1', null);
INSERT INTO location VALUES ('460', 'West Kasai', '1', '0', '1', null);
INSERT INTO location VALUES ('461', 'Brazzaville', '1', '46', '1', null);
INSERT INTO location VALUES ('462', 'Kouilou', '1', '46', '1', null);
INSERT INTO location VALUES ('463', 'Rarotonga', '1', '47', '1', null);
INSERT INTO location VALUES ('464', 'Antioquia', '1', '48', '1', null);
INSERT INTO location VALUES ('465', 'AtlÃƒÆ’Ã‚Â¡ntico', '1', '48', '1', null);
INSERT INTO location VALUES ('466', 'BolÃƒÆ’Ã‚Â¬var', '1', '48', '1', null);
INSERT INTO location VALUES ('467', 'BoyacÃƒÆ’Ã‚Â¡', '1', '48', '1', null);
INSERT INTO location VALUES ('468', 'Caldas', '1', '48', '1', null);
INSERT INTO location VALUES ('469', 'CaquetÃƒÆ’Ã‚Â¡', '1', '48', '1', null);
INSERT INTO location VALUES ('470', 'Cauca', '1', '48', '1', null);
INSERT INTO location VALUES ('471', 'CÃƒÆ’Ã‚Â³rdoba', '1', '48', '1', null);
INSERT INTO location VALUES ('472', 'Cesar', '1', '48', '1', null);
INSERT INTO location VALUES ('473', 'Cundinamarca', '1', '48', '1', null);
INSERT INTO location VALUES ('474', 'Huila', '1', '48', '1', null);
INSERT INTO location VALUES ('475', 'La Guajira', '1', '48', '1', null);
INSERT INTO location VALUES ('476', 'Magdalena', '1', '48', '1', null);
INSERT INTO location VALUES ('477', 'Meta', '1', '48', '1', null);
INSERT INTO location VALUES ('478', 'NariÃƒÆ’Ã‚Â±o', '1', '48', '1', null);
INSERT INTO location VALUES ('479', 'Norte de Santander', '1', '48', '1', null);
INSERT INTO location VALUES ('480', 'QuindÃƒÆ’Ã‚Â¬o', '1', '48', '1', null);
INSERT INTO location VALUES ('481', 'Risaralda', '1', '48', '1', null);
INSERT INTO location VALUES ('482', 'SantafÃƒÆ’Ã‚Â© de BogotÃƒÆ’Ã‚Â', '1', '48', '1', null);
INSERT INTO location VALUES ('483', 'Santander', '1', '48', '1', null);
INSERT INTO location VALUES ('484', 'Sucre', '1', '48', '1', null);
INSERT INTO location VALUES ('485', 'Tolima', '1', '48', '1', null);
INSERT INTO location VALUES ('486', 'Valle', '1', '48', '1', null);
INSERT INTO location VALUES ('487', 'Njazidja', '1', '49', '1', null);
INSERT INTO location VALUES ('488', 'SÃƒÆ’Ã‚Â£o Tiago', '1', '50', '1', null);
INSERT INTO location VALUES ('489', 'San JosÃƒÆ’Ã‚Â©', '1', '51', '1', null);
INSERT INTO location VALUES ('490', 'CamagÃƒÆ’Ã‚Â¼ey', '1', '52', '1', null);
INSERT INTO location VALUES ('491', 'Ciego de ÃƒÆ’Ã‚Âvila', '1', '52', '1', null);
INSERT INTO location VALUES ('492', 'Cienfuegos', '1', '52', '1', null);
INSERT INTO location VALUES ('493', 'Granma', '1', '52', '1', null);
INSERT INTO location VALUES ('494', 'GuantÃƒÆ’Ã‚Â¡namo', '1', '52', '1', null);
INSERT INTO location VALUES ('495', 'HolguÃƒÆ’Ã‚Â¬n', '1', '52', '1', null);
INSERT INTO location VALUES ('496', 'La Habana', '1', '52', '1', null);
INSERT INTO location VALUES ('497', 'Las Tunas', '1', '52', '1', null);
INSERT INTO location VALUES ('498', 'Matanzas', '1', '52', '1', null);
INSERT INTO location VALUES ('499', 'Pinar del RÃƒÆ’Ã‚Â¬o', '1', '52', '1', null);
INSERT INTO location VALUES ('500', 'Sancti-SpÃƒÆ’Ã‚Â¬ritus', '1', '52', '1', null);
INSERT INTO location VALUES ('501', 'Santiago de Cuba', '1', '52', '1', null);
INSERT INTO location VALUES ('502', 'Villa Clara', '1', '52', '1', null);
INSERT INTO location VALUES ('503', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '53', '1', null);
INSERT INTO location VALUES ('504', 'Grand Cayman', '1', '54', '1', null);
INSERT INTO location VALUES ('505', 'Limassol', '1', '55', '1', null);
INSERT INTO location VALUES ('506', 'Nicosia', '1', '55', '1', null);
INSERT INTO location VALUES ('507', 'HlavnÃƒÆ’Ã‚Â¬ mesto Praha', '1', '56', '1', null);
INSERT INTO location VALUES ('508', 'JiznÃƒÆ’Ã‚Â¬ Cechy', '1', '56', '1', null);
INSERT INTO location VALUES ('509', 'JiznÃƒÆ’Ã‚Â¬ Morava', '1', '56', '1', null);
INSERT INTO location VALUES ('510', 'SevernÃƒÆ’Ã‚Â¬ Cechy', '1', '56', '1', null);
INSERT INTO location VALUES ('511', 'SevernÃƒÆ’Ã‚Â¬ Morava', '1', '56', '1', null);
INSERT INTO location VALUES ('512', 'VÃƒÆ’Ã‚Â½chodnÃƒÆ’Ã‚Â¬ Cechy', '1', '56', '1', null);
INSERT INTO location VALUES ('513', 'ZapadnÃƒÆ’Ã‚Â¬ Cechy', '1', '56', '1', null);
INSERT INTO location VALUES ('514', 'Anhalt Sachsen', '1', '57', '1', null);
INSERT INTO location VALUES ('515', 'Baden-WÃƒÆ’Ã‚Â¼rttemberg', '1', '57', '1', null);
INSERT INTO location VALUES ('516', 'Baijeri', '1', '57', '1', null);
INSERT INTO location VALUES ('517', 'Berliini', '1', '57', '1', null);
INSERT INTO location VALUES ('518', 'Brandenburg', '1', '57', '1', null);
INSERT INTO location VALUES ('519', 'Bremen', '1', '57', '1', null);
INSERT INTO location VALUES ('520', 'Hamburg', '1', '57', '1', null);
INSERT INTO location VALUES ('521', 'Hessen', '1', '57', '1', null);
INSERT INTO location VALUES ('522', 'Mecklenburg-Vorpomme', '1', '57', '1', null);
INSERT INTO location VALUES ('523', 'Niedersachsen', '1', '57', '1', null);
INSERT INTO location VALUES ('524', 'Nordrhein-Westfalen', '1', '57', '1', null);
INSERT INTO location VALUES ('525', 'Rheinland-Pfalz', '1', '57', '1', null);
INSERT INTO location VALUES ('526', 'Saarland', '1', '57', '1', null);
INSERT INTO location VALUES ('527', 'Saksi', '1', '57', '1', null);
INSERT INTO location VALUES ('528', 'Schleswig-Holstein', '1', '57', '1', null);
INSERT INTO location VALUES ('529', 'ThÃƒÆ’Ã‚Â¼ringen', '1', '57', '1', null);
INSERT INTO location VALUES ('530', 'Djibouti', '1', '58', '1', null);
INSERT INTO location VALUES ('531', 'St George', '1', '59', '1', null);
INSERT INTO location VALUES ('532', 'ÃƒÆ’Ã¢â‚¬Â¦rhus', '1', '60', '1', null);
INSERT INTO location VALUES ('533', 'Frederiksberg', '1', '60', '1', null);
INSERT INTO location VALUES ('534', 'Fyn', '1', '60', '1', null);
INSERT INTO location VALUES ('535', 'KÃƒÆ’Ã‚Â¸benhavn', '1', '60', '1', null);
INSERT INTO location VALUES ('536', 'Nordjylland', '1', '60', '1', null);
INSERT INTO location VALUES ('537', 'Distrito Nacional', '1', '61', '1', null);
INSERT INTO location VALUES ('538', 'Duarte', '1', '61', '1', null);
INSERT INTO location VALUES ('539', 'La Romana', '1', '61', '1', null);
INSERT INTO location VALUES ('540', 'Puerto Plata', '1', '61', '1', null);
INSERT INTO location VALUES ('541', 'San Pedro de MacorÃƒÆ’Ã‚Â¬', '1', '61', '1', null);
INSERT INTO location VALUES ('542', 'Santiago', '1', '61', '1', null);
INSERT INTO location VALUES ('543', 'Alger', '1', '62', '1', null);
INSERT INTO location VALUES ('544', 'Annaba', '1', '62', '1', null);
INSERT INTO location VALUES ('545', 'Batna', '1', '62', '1', null);
INSERT INTO location VALUES ('546', 'BÃƒÆ’Ã‚Â©char', '1', '62', '1', null);
INSERT INTO location VALUES ('547', 'BÃƒÆ’Ã‚Â©jaÃƒÆ’Ã‚Â¯a', '1', '62', '1', null);
INSERT INTO location VALUES ('548', 'Biskra', '1', '62', '1', null);
INSERT INTO location VALUES ('549', 'Blida', '1', '62', '1', null);
INSERT INTO location VALUES ('550', 'Chlef', '1', '62', '1', null);
INSERT INTO location VALUES ('551', 'Constantine', '1', '62', '1', null);
INSERT INTO location VALUES ('552', 'GhardaÃƒÆ’Ã‚Â¯a', '1', '62', '1', null);
INSERT INTO location VALUES ('553', 'Mostaganem', '1', '62', '1', null);
INSERT INTO location VALUES ('554', 'Oran', '1', '62', '1', null);
INSERT INTO location VALUES ('555', 'SÃƒÆ’Ã‚Â©tif', '1', '62', '1', null);
INSERT INTO location VALUES ('556', 'Sidi Bel AbbÃƒÆ’Ã‚Â¨s', '1', '62', '1', null);
INSERT INTO location VALUES ('557', 'Skikda', '1', '62', '1', null);
INSERT INTO location VALUES ('558', 'TÃƒÆ’Ã‚Â©bessa', '1', '62', '1', null);
INSERT INTO location VALUES ('559', 'Tiaret', '1', '62', '1', null);
INSERT INTO location VALUES ('560', 'Tlemcen', '1', '62', '1', null);
INSERT INTO location VALUES ('561', 'Azuay', '1', '63', '1', null);
INSERT INTO location VALUES ('562', 'Chimborazo', '1', '63', '1', null);
INSERT INTO location VALUES ('563', 'El Oro', '1', '63', '1', null);
INSERT INTO location VALUES ('564', 'Esmeraldas', '1', '63', '1', null);
INSERT INTO location VALUES ('565', 'Guayas', '1', '63', '1', null);
INSERT INTO location VALUES ('566', 'Imbabura', '1', '63', '1', null);
INSERT INTO location VALUES ('567', 'Loja', '1', '63', '1', null);
INSERT INTO location VALUES ('568', 'Los RÃƒÆ’Ã‚Â¬os', '1', '63', '1', null);
INSERT INTO location VALUES ('569', 'ManabÃƒÆ’Ã‚Â¬', '1', '63', '1', null);
INSERT INTO location VALUES ('570', 'Pichincha', '1', '63', '1', null);
INSERT INTO location VALUES ('571', 'Tungurahua', '1', '63', '1', null);
INSERT INTO location VALUES ('572', 'al-Buhayra', '1', '64', '1', null);
INSERT INTO location VALUES ('573', 'al-Daqahliya', '1', '64', '1', null);
INSERT INTO location VALUES ('574', 'al-Faiyum', '1', '64', '1', null);
INSERT INTO location VALUES ('575', 'al-Gharbiya', '1', '64', '1', null);
INSERT INTO location VALUES ('576', 'al-Minufiya', '1', '64', '1', null);
INSERT INTO location VALUES ('577', 'al-Minya', '1', '64', '1', null);
INSERT INTO location VALUES ('578', 'al-Qalyubiya', '1', '64', '1', null);
INSERT INTO location VALUES ('579', 'al-Sharqiya', '1', '64', '1', null);
INSERT INTO location VALUES ('580', 'Aleksandria', '1', '64', '1', null);
INSERT INTO location VALUES ('581', 'Assuan', '1', '64', '1', null);
INSERT INTO location VALUES ('582', 'Asyut', '1', '64', '1', null);
INSERT INTO location VALUES ('583', 'Bani Suwayf', '1', '64', '1', null);
INSERT INTO location VALUES ('584', 'Giza', '1', '64', '1', null);
INSERT INTO location VALUES ('585', 'Ismailia', '1', '64', '1', null);
INSERT INTO location VALUES ('586', 'Kafr al-Shaykh', '1', '64', '1', null);
INSERT INTO location VALUES ('587', 'Kairo', '1', '64', '1', null);
INSERT INTO location VALUES ('588', 'Luxor', '1', '64', '1', null);
INSERT INTO location VALUES ('589', 'Port Said', '1', '64', '1', null);
INSERT INTO location VALUES ('590', 'Qina', '1', '64', '1', null);
INSERT INTO location VALUES ('591', 'Sawhaj', '1', '64', '1', null);
INSERT INTO location VALUES ('592', 'Shamal Sina', '1', '64', '1', null);
INSERT INTO location VALUES ('593', 'Suez', '1', '64', '1', null);
INSERT INTO location VALUES ('594', 'Maekel', '1', '65', '1', null);
INSERT INTO location VALUES ('595', 'El-AaiÃƒÆ’Ã‚Âºn', '1', '66', '1', null);
INSERT INTO location VALUES ('596', 'Andalusia', '1', '67', '1', null);
INSERT INTO location VALUES ('597', 'Aragonia', '1', '67', '1', null);
INSERT INTO location VALUES ('598', 'Asturia', '1', '67', '1', null);
INSERT INTO location VALUES ('599', 'Balears', '1', '67', '1', null);
INSERT INTO location VALUES ('600', 'Baskimaa', '1', '67', '1', null);
INSERT INTO location VALUES ('601', 'Canary Islands', '1', '67', '1', null);
INSERT INTO location VALUES ('602', 'Cantabria', '1', '67', '1', null);
INSERT INTO location VALUES ('603', 'Castilla and LeÃƒÆ’Ã‚Â³n', '1', '67', '1', null);
INSERT INTO location VALUES ('604', 'Extremadura', '1', '67', '1', null);
INSERT INTO location VALUES ('605', 'Galicia', '1', '67', '1', null);
INSERT INTO location VALUES ('606', 'Kastilia-La Mancha', '1', '67', '1', null);
INSERT INTO location VALUES ('607', 'Katalonia', '1', '67', '1', null);
INSERT INTO location VALUES ('608', 'La Rioja', '1', '67', '1', null);
INSERT INTO location VALUES ('609', 'Madrid', '1', '67', '1', null);
INSERT INTO location VALUES ('610', 'Murcia', '1', '67', '1', null);
INSERT INTO location VALUES ('611', 'Navarra', '1', '67', '1', null);
INSERT INTO location VALUES ('612', 'Valencia', '1', '67', '1', null);
INSERT INTO location VALUES ('613', 'Harjumaa', '1', '68', '1', null);
INSERT INTO location VALUES ('614', 'Tartumaa', '1', '68', '1', null);
INSERT INTO location VALUES ('615', 'Addis Abeba', '1', '69', '1', null);
INSERT INTO location VALUES ('616', 'Amhara', '1', '69', '1', null);
INSERT INTO location VALUES ('617', 'Dire Dawa', '1', '69', '1', null);
INSERT INTO location VALUES ('618', 'Oromia', '1', '69', '1', null);
INSERT INTO location VALUES ('619', 'Tigray', '1', '69', '1', null);
INSERT INTO location VALUES ('620', 'Newmaa', '1', '70', '1', null);
INSERT INTO location VALUES ('621', 'PÃƒÆ’Ã‚Â¤ijÃƒÆ’Ã‚Â¤t-HÃƒÆ’Ã‚Â¤', '1', '70', '1', null);
INSERT INTO location VALUES ('622', 'Pirkanmaa', '1', '70', '1', null);
INSERT INTO location VALUES ('623', 'Pohjois-Pohjanmaa', '1', '70', '1', null);
INSERT INTO location VALUES ('624', 'Varsinais-Suomi', '1', '70', '1', null);
INSERT INTO location VALUES ('625', 'Central', '1', '71', '1', null);
INSERT INTO location VALUES ('626', 'East Falkland', '1', '72', '1', null);
INSERT INTO location VALUES ('627', 'Alsace', '1', '73', '1', null);
INSERT INTO location VALUES ('628', 'Aquitaine', '1', '73', '1', null);
INSERT INTO location VALUES ('629', 'Auvergne', '1', '73', '1', null);
INSERT INTO location VALUES ('630', 'ÃƒÆ’Ã…Â½le-de-France', '1', '73', '1', null);
INSERT INTO location VALUES ('631', 'Basse-Normandie', '1', '73', '1', null);
INSERT INTO location VALUES ('632', 'Bourgogne', '1', '73', '1', null);
INSERT INTO location VALUES ('633', 'Bretagne', '1', '73', '1', null);
INSERT INTO location VALUES ('634', 'Centre', '1', '73', '1', null);
INSERT INTO location VALUES ('635', 'Champagne-Ardenne', '1', '73', '1', null);
INSERT INTO location VALUES ('636', 'Franche-ComtÃƒÆ’Ã‚Â©', '1', '73', '1', null);
INSERT INTO location VALUES ('637', 'Haute-Normandie', '1', '73', '1', null);
INSERT INTO location VALUES ('638', 'Languedoc-Roussillon', '1', '73', '1', null);
INSERT INTO location VALUES ('639', 'Limousin', '1', '73', '1', null);
INSERT INTO location VALUES ('640', 'Lorraine', '1', '73', '1', null);
INSERT INTO location VALUES ('641', 'Midi-PyrÃƒÆ’Ã‚Â©nÃƒÆ’Ã‚Â©es', '1', '73', '1', null);
INSERT INTO location VALUES ('642', 'Nord-Pas-de-Calais', '1', '73', '1', null);
INSERT INTO location VALUES ('643', 'Pays de la Loire', '1', '73', '1', null);
INSERT INTO location VALUES ('644', 'Picardie', '1', '73', '1', null);
INSERT INTO location VALUES ('645', 'Provence-Alpes-CÃƒÆ’Ã‚Â´te', '1', '73', '1', null);
INSERT INTO location VALUES ('646', 'RhÃƒÆ’Ã‚Â´ne-Alpes', '1', '73', '1', null);
INSERT INTO location VALUES ('647', 'Streymoyar', '1', '74', '1', null);
INSERT INTO location VALUES ('648', 'Chuuk', '1', '0', '1', null);
INSERT INTO location VALUES ('649', 'Pohnpei', '1', '0', '1', null);
INSERT INTO location VALUES ('650', 'Estuaire', '1', '76', '1', null);
INSERT INTO location VALUES ('651', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '77', '1', null);
INSERT INTO location VALUES ('652', 'England', '1', '77', '1', null);
INSERT INTO location VALUES ('653', 'Jersey', '1', '77', '1', null);
INSERT INTO location VALUES ('654', 'North Ireland', '1', '77', '1', null);
INSERT INTO location VALUES ('655', 'Scotland', '1', '77', '1', null);
INSERT INTO location VALUES ('656', 'Wales', '1', '77', '1', null);
INSERT INTO location VALUES ('657', 'Abhasia [Aphazeti]', '1', '78', '1', null);
INSERT INTO location VALUES ('658', 'Adzaria [AtÃƒâ€¦Ã‚Â¡ara]', '1', '78', '1', null);
INSERT INTO location VALUES ('659', 'Imereti', '1', '78', '1', null);
INSERT INTO location VALUES ('660', 'Kvemo Kartli', '1', '78', '1', null);
INSERT INTO location VALUES ('661', 'Tbilisi', '1', '78', '1', null);
INSERT INTO location VALUES ('662', 'Ashanti', '1', '79', '1', null);
INSERT INTO location VALUES ('663', 'Greater Accra', '1', '79', '1', null);
INSERT INTO location VALUES ('664', 'Northern', '1', '79', '1', null);
INSERT INTO location VALUES ('665', 'Western', '1', '79', '1', null);
INSERT INTO location VALUES ('666', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '80', '1', null);
INSERT INTO location VALUES ('667', 'Conakry', '1', '81', '1', null);
INSERT INTO location VALUES ('668', 'Basse-Terre', '1', '82', '1', null);
INSERT INTO location VALUES ('669', 'Grande-Terre', '1', '82', '1', null);
INSERT INTO location VALUES ('670', 'Banjul', '1', '83', '1', null);
INSERT INTO location VALUES ('671', 'Kombo St Mary', '1', '83', '1', null);
INSERT INTO location VALUES ('672', 'Bissau', '1', '84', '1', null);
INSERT INTO location VALUES ('673', 'Bioko', '1', '85', '1', null);
INSERT INTO location VALUES ('674', 'Attika', '1', '86', '1', null);
INSERT INTO location VALUES ('675', 'Central Macedonia', '1', '86', '1', null);
INSERT INTO location VALUES ('676', 'Crete', '1', '86', '1', null);
INSERT INTO location VALUES ('677', 'Thessalia', '1', '86', '1', null);
INSERT INTO location VALUES ('678', 'West Greece', '1', '86', '1', null);
INSERT INTO location VALUES ('679', 'St George', '1', '87', '1', null);
INSERT INTO location VALUES ('680', 'Kitaa', '1', '88', '1', null);
INSERT INTO location VALUES ('681', 'Guatemala', '1', '89', '1', null);
INSERT INTO location VALUES ('682', 'Quetzaltenango', '1', '89', '1', null);
INSERT INTO location VALUES ('683', 'Cayenne', '1', '90', '1', null);
INSERT INTO location VALUES ('684', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '91', '1', null);
INSERT INTO location VALUES ('685', 'Georgetown', '1', '92', '1', null);
INSERT INTO location VALUES ('686', 'Hongkong', '1', '93', '1', null);
INSERT INTO location VALUES ('687', 'Kowloon and New Kowl', '1', '93', '1', null);
INSERT INTO location VALUES ('688', 'AtlÃƒÆ’Ã‚Â¡ntida', '1', '95', '1', null);
INSERT INTO location VALUES ('689', 'CortÃƒÆ’Ã‚Â©s', '1', '95', '1', null);
INSERT INTO location VALUES ('690', 'Distrito Central', '1', '95', '1', null);
INSERT INTO location VALUES ('691', 'Grad Zagreb', '1', '96', '1', null);
INSERT INTO location VALUES ('692', 'Osijek-Baranja', '1', '96', '1', null);
INSERT INTO location VALUES ('693', 'Primorje-Gorski Kota', '1', '96', '1', null);
INSERT INTO location VALUES ('694', 'Split-Dalmatia', '1', '96', '1', null);
INSERT INTO location VALUES ('695', 'Nord', '1', '97', '1', null);
INSERT INTO location VALUES ('696', 'Ouest', '1', '97', '1', null);
INSERT INTO location VALUES ('697', 'Baranya', '1', '98', '1', null);
INSERT INTO location VALUES ('698', 'BÃƒÆ’Ã‚Â¡cs-Kiskun', '1', '98', '1', null);
INSERT INTO location VALUES ('699', 'Borsod-AbaÃƒÆ’Ã‚Âºj-ZemplÃƒÆ’', '1', '98', '1', null);
INSERT INTO location VALUES ('700', 'Budapest', '1', '98', '1', null);
INSERT INTO location VALUES ('701', 'CsongrÃƒÆ’Ã‚Â¡d', '1', '98', '1', null);
INSERT INTO location VALUES ('702', 'FejÃƒÆ’Ã‚Â©r', '1', '98', '1', null);
INSERT INTO location VALUES ('703', 'GyÃƒÆ’Ã‚Â¶r-Moson-Sopron', '1', '98', '1', null);
INSERT INTO location VALUES ('704', 'HajdÃƒÆ’Ã‚Âº-Bihar', '1', '98', '1', null);
INSERT INTO location VALUES ('705', 'Szabolcs-SzatmÃƒÆ’Ã‚Â¡r-Be', '1', '98', '1', null);
INSERT INTO location VALUES ('706', 'Aceh', '1', '99', '1', null);
INSERT INTO location VALUES ('707', 'Bali', '1', '99', '1', null);
INSERT INTO location VALUES ('708', 'Bengkulu', '1', '99', '1', null);
INSERT INTO location VALUES ('709', 'Central Java', '1', '99', '1', null);
INSERT INTO location VALUES ('710', 'East Java', '1', '99', '1', null);
INSERT INTO location VALUES ('711', 'Jakarta Raya', '1', '99', '1', null);
INSERT INTO location VALUES ('712', 'Jambi', '1', '99', '1', null);
INSERT INTO location VALUES ('713', 'Kalimantan Barat', '1', '99', '1', null);
INSERT INTO location VALUES ('714', 'Kalimantan Selatan', '1', '99', '1', null);
INSERT INTO location VALUES ('715', 'Kalimantan Tengah', '1', '99', '1', null);
INSERT INTO location VALUES ('716', 'Kalimantan Timur', '1', '99', '1', null);
INSERT INTO location VALUES ('717', 'Lampung', '1', '99', '1', null);
INSERT INTO location VALUES ('718', 'Molukit', '1', '99', '1', null);
INSERT INTO location VALUES ('719', 'Nusa Tenggara Barat', '1', '99', '1', null);
INSERT INTO location VALUES ('720', 'Nusa Tenggara Timur', '1', '99', '1', null);
INSERT INTO location VALUES ('721', 'Riau', '1', '99', '1', null);
INSERT INTO location VALUES ('722', 'Sulawesi Selatan', '1', '99', '1', null);
INSERT INTO location VALUES ('723', 'Sulawesi Tengah', '1', '99', '1', null);
INSERT INTO location VALUES ('724', 'Sulawesi Tenggara', '1', '99', '1', null);
INSERT INTO location VALUES ('725', 'Sulawesi Utara', '1', '99', '1', null);
INSERT INTO location VALUES ('726', 'Sumatera Barat', '1', '99', '1', null);
INSERT INTO location VALUES ('727', 'Sumatera Selatan', '1', '99', '1', null);
INSERT INTO location VALUES ('728', 'Sumatera Utara', '1', '99', '1', null);
INSERT INTO location VALUES ('729', 'West Irian', '1', '99', '1', null);
INSERT INTO location VALUES ('730', 'West Java', '1', '99', '1', null);
INSERT INTO location VALUES ('731', 'Yogyakarta', '1', '99', '1', null);
INSERT INTO location VALUES ('732', 'Andhra Pradesh', '1', '100', '1', null);
INSERT INTO location VALUES ('733', 'Assam', '1', '100', '1', null);
INSERT INTO location VALUES ('734', 'Bihar', '1', '100', '1', null);
INSERT INTO location VALUES ('735', 'Chandigarh', '1', '100', '1', null);
INSERT INTO location VALUES ('736', 'Chhatisgarh', '1', '100', '1', null);
INSERT INTO location VALUES ('737', 'Delhi', '1', '100', '1', null);
INSERT INTO location VALUES ('738', 'Gujarat', '1', '100', '1', null);
INSERT INTO location VALUES ('739', 'Haryana', '1', '100', '1', null);
INSERT INTO location VALUES ('740', 'Jammu and Kashmir', '1', '100', '1', null);
INSERT INTO location VALUES ('741', 'Jharkhand', '1', '100', '1', null);
INSERT INTO location VALUES ('742', 'Karnataka', '1', '100', '1', null);
INSERT INTO location VALUES ('743', 'Kerala', '1', '100', '1', null);
INSERT INTO location VALUES ('744', 'Madhya Pradesh', '1', '100', '1', null);
INSERT INTO location VALUES ('745', 'Maharashtra', '1', '100', '1', null);
INSERT INTO location VALUES ('746', 'Manipur', '1', '100', '1', null);
INSERT INTO location VALUES ('747', 'Meghalaya', '1', '100', '1', null);
INSERT INTO location VALUES ('748', 'Mizoram', '1', '100', '1', null);
INSERT INTO location VALUES ('749', 'Orissa', '1', '100', '1', null);
INSERT INTO location VALUES ('750', 'Pondicherry', '1', '100', '1', null);
INSERT INTO location VALUES ('751', 'Punjab', '1', '100', '1', null);
INSERT INTO location VALUES ('752', 'Rajasthan', '1', '100', '1', null);
INSERT INTO location VALUES ('753', 'Tamil Nadu', '1', '100', '1', null);
INSERT INTO location VALUES ('754', 'Tripura', '1', '100', '1', null);
INSERT INTO location VALUES ('755', 'Uttar Pradesh', '1', '100', '1', null);
INSERT INTO location VALUES ('756', 'Uttaranchal', '1', '100', '1', null);
INSERT INTO location VALUES ('757', 'West Bengali', '1', '100', '1', null);
INSERT INTO location VALUES ('758', 'Leinster', '1', '102', '1', null);
INSERT INTO location VALUES ('759', 'Munster', '1', '102', '1', null);
INSERT INTO location VALUES ('760', 'Ardebil', '1', '103', '1', null);
INSERT INTO location VALUES ('761', 'Bushehr', '1', '103', '1', null);
INSERT INTO location VALUES ('762', 'Chaharmahal va Bakht', '1', '103', '1', null);
INSERT INTO location VALUES ('763', 'East Azerbaidzan', '1', '103', '1', null);
INSERT INTO location VALUES ('764', 'Esfahan', '1', '103', '1', null);
INSERT INTO location VALUES ('765', 'Fars', '1', '103', '1', null);
INSERT INTO location VALUES ('766', 'Gilan', '1', '103', '1', null);
INSERT INTO location VALUES ('767', 'Golestan', '1', '103', '1', null);
INSERT INTO location VALUES ('768', 'Hamadan', '1', '103', '1', null);
INSERT INTO location VALUES ('769', 'Hormozgan', '1', '103', '1', null);
INSERT INTO location VALUES ('770', 'Ilam', '1', '103', '1', null);
INSERT INTO location VALUES ('771', 'Kerman', '1', '103', '1', null);
INSERT INTO location VALUES ('772', 'Kermanshah', '1', '103', '1', null);
INSERT INTO location VALUES ('773', 'Khorasan', '1', '103', '1', null);
INSERT INTO location VALUES ('774', 'Khuzestan', '1', '103', '1', null);
INSERT INTO location VALUES ('775', 'Kordestan', '1', '103', '1', null);
INSERT INTO location VALUES ('776', 'Lorestan', '1', '103', '1', null);
INSERT INTO location VALUES ('777', 'Markazi', '1', '103', '1', null);
INSERT INTO location VALUES ('778', 'Mazandaran', '1', '103', '1', null);
INSERT INTO location VALUES ('779', 'Qazvin', '1', '103', '1', null);
INSERT INTO location VALUES ('780', 'Qom', '1', '103', '1', null);
INSERT INTO location VALUES ('781', 'Semnan', '1', '103', '1', null);
INSERT INTO location VALUES ('782', 'Sistan va Baluchesta', '1', '103', '1', null);
INSERT INTO location VALUES ('783', 'Teheran', '1', '103', '1', null);
INSERT INTO location VALUES ('784', 'West Azerbaidzan', '1', '103', '1', null);
INSERT INTO location VALUES ('785', 'Yazd', '1', '103', '1', null);
INSERT INTO location VALUES ('786', 'Zanjan', '1', '103', '1', null);
INSERT INTO location VALUES ('787', 'al-Anbar', '1', '104', '1', null);
INSERT INTO location VALUES ('788', 'al-Najaf', '1', '104', '1', null);
INSERT INTO location VALUES ('789', 'al-Qadisiya', '1', '104', '1', null);
INSERT INTO location VALUES ('790', 'al-Sulaymaniya', '1', '104', '1', null);
INSERT INTO location VALUES ('791', 'al-Tamim', '1', '104', '1', null);
INSERT INTO location VALUES ('792', 'Babil', '1', '104', '1', null);
INSERT INTO location VALUES ('793', 'Baghdad', '1', '104', '1', null);
INSERT INTO location VALUES ('794', 'Basra', '1', '104', '1', null);
INSERT INTO location VALUES ('795', 'DhiQar', '1', '104', '1', null);
INSERT INTO location VALUES ('796', 'Diyala', '1', '104', '1', null);
INSERT INTO location VALUES ('797', 'Irbil', '1', '104', '1', null);
INSERT INTO location VALUES ('798', 'Karbala', '1', '104', '1', null);
INSERT INTO location VALUES ('799', 'Maysan', '1', '104', '1', null);
INSERT INTO location VALUES ('800', 'Ninawa', '1', '104', '1', null);
INSERT INTO location VALUES ('801', 'Wasit', '1', '104', '1', null);
INSERT INTO location VALUES ('802', 'HÃƒÆ’Ã‚Â¶fuÃƒÆ’Ã‚Â°borgarsvÃƒÆ', '1', '105', '1', null);
INSERT INTO location VALUES ('803', 'Ha Darom', '1', '106', '1', null);
INSERT INTO location VALUES ('804', 'Ha Merkaz', '1', '106', '1', null);
INSERT INTO location VALUES ('805', 'Haifa', '1', '106', '1', null);
INSERT INTO location VALUES ('806', 'Jerusalem', '1', '106', '1', null);
INSERT INTO location VALUES ('807', 'Tel Aviv', '1', '106', '1', null);
INSERT INTO location VALUES ('808', 'Abruzzit', '1', '107', '1', null);
INSERT INTO location VALUES ('809', 'Apulia', '1', '107', '1', null);
INSERT INTO location VALUES ('810', 'Calabria', '1', '107', '1', null);
INSERT INTO location VALUES ('811', 'Campania', '1', '107', '1', null);
INSERT INTO location VALUES ('812', 'Emilia-Romagna', '1', '107', '1', null);
INSERT INTO location VALUES ('813', 'Friuli-Venezia Giuli', '1', '107', '1', null);
INSERT INTO location VALUES ('814', 'Latium', '1', '107', '1', null);
INSERT INTO location VALUES ('815', 'Liguria', '1', '107', '1', null);
INSERT INTO location VALUES ('816', 'Lombardia', '1', '107', '1', null);
INSERT INTO location VALUES ('817', 'Marche', '1', '107', '1', null);
INSERT INTO location VALUES ('818', 'Piemonte', '1', '107', '1', null);
INSERT INTO location VALUES ('819', 'Sardinia', '1', '107', '1', null);
INSERT INTO location VALUES ('820', 'Sisilia', '1', '107', '1', null);
INSERT INTO location VALUES ('821', 'Toscana', '1', '107', '1', null);
INSERT INTO location VALUES ('822', 'Trentino-Alto Adige', '1', '107', '1', null);
INSERT INTO location VALUES ('823', 'Umbria', '1', '107', '1', null);
INSERT INTO location VALUES ('824', 'Veneto', '1', '107', '1', null);
INSERT INTO location VALUES ('825', 'St. Andrew', '1', '108', '1', null);
INSERT INTO location VALUES ('826', 'St. Catherine', '1', '108', '1', null);
INSERT INTO location VALUES ('827', 'al-Zarqa', '1', '109', '1', null);
INSERT INTO location VALUES ('828', 'Amman', '1', '109', '1', null);
INSERT INTO location VALUES ('829', 'Irbid', '1', '109', '1', null);
INSERT INTO location VALUES ('830', 'Aichi', '1', '110', '1', null);
INSERT INTO location VALUES ('831', 'Akita', '1', '110', '1', null);
INSERT INTO location VALUES ('832', 'Aomori', '1', '110', '1', null);
INSERT INTO location VALUES ('833', 'Chiba', '1', '110', '1', null);
INSERT INTO location VALUES ('834', 'Ehime', '1', '110', '1', null);
INSERT INTO location VALUES ('835', 'Fukui', '1', '110', '1', null);
INSERT INTO location VALUES ('836', 'Fukuoka', '1', '110', '1', null);
INSERT INTO location VALUES ('837', 'Fukushima', '1', '110', '1', null);
INSERT INTO location VALUES ('838', 'Gifu', '1', '110', '1', null);
INSERT INTO location VALUES ('839', 'Gumma', '1', '110', '1', null);
INSERT INTO location VALUES ('840', 'Hiroshima', '1', '110', '1', null);
INSERT INTO location VALUES ('841', 'Hokkaido', '1', '110', '1', null);
INSERT INTO location VALUES ('842', 'Hyogo', '1', '110', '1', null);
INSERT INTO location VALUES ('843', 'Ibaragi', '1', '110', '1', null);
INSERT INTO location VALUES ('844', 'Ishikawa', '1', '110', '1', null);
INSERT INTO location VALUES ('845', 'Iwate', '1', '110', '1', null);
INSERT INTO location VALUES ('846', 'Kagawa', '1', '110', '1', null);
INSERT INTO location VALUES ('847', 'Kagoshima', '1', '110', '1', null);
INSERT INTO location VALUES ('848', 'Kanagawa', '1', '110', '1', null);
INSERT INTO location VALUES ('849', 'Kochi', '1', '110', '1', null);
INSERT INTO location VALUES ('850', 'Kumamoto', '1', '110', '1', null);
INSERT INTO location VALUES ('851', 'Kyoto', '1', '110', '1', null);
INSERT INTO location VALUES ('852', 'Mie', '1', '110', '1', null);
INSERT INTO location VALUES ('853', 'Miyagi', '1', '110', '1', null);
INSERT INTO location VALUES ('854', 'Miyazaki', '1', '110', '1', null);
INSERT INTO location VALUES ('855', 'Nagano', '1', '110', '1', null);
INSERT INTO location VALUES ('856', 'Nagasaki', '1', '110', '1', null);
INSERT INTO location VALUES ('857', 'Nara', '1', '110', '1', null);
INSERT INTO location VALUES ('858', 'Niigata', '1', '110', '1', null);
INSERT INTO location VALUES ('859', 'Oita', '1', '110', '1', null);
INSERT INTO location VALUES ('860', 'Okayama', '1', '110', '1', null);
INSERT INTO location VALUES ('861', 'Okinawa', '1', '110', '1', null);
INSERT INTO location VALUES ('862', 'Osaka', '1', '110', '1', null);
INSERT INTO location VALUES ('863', 'Saga', '1', '110', '1', null);
INSERT INTO location VALUES ('864', 'Saitama', '1', '110', '1', null);
INSERT INTO location VALUES ('865', 'Shiga', '1', '110', '1', null);
INSERT INTO location VALUES ('866', 'Shimane', '1', '110', '1', null);
INSERT INTO location VALUES ('867', 'Shizuoka', '1', '110', '1', null);
INSERT INTO location VALUES ('868', 'Tochigi', '1', '110', '1', null);
INSERT INTO location VALUES ('869', 'Tokushima', '1', '110', '1', null);
INSERT INTO location VALUES ('870', 'Tokyo-to', '1', '110', '1', null);
INSERT INTO location VALUES ('871', 'Tottori', '1', '110', '1', null);
INSERT INTO location VALUES ('872', 'Toyama', '1', '110', '1', null);
INSERT INTO location VALUES ('873', 'Wakayama', '1', '110', '1', null);
INSERT INTO location VALUES ('874', 'Yamagata', '1', '110', '1', null);
INSERT INTO location VALUES ('875', 'Yamaguchi', '1', '110', '1', null);
INSERT INTO location VALUES ('876', 'Yamanashi', '1', '110', '1', null);
INSERT INTO location VALUES ('877', 'Almaty', '1', '111', '1', null);
INSERT INTO location VALUES ('878', 'Almaty Qalasy', '1', '111', '1', null);
INSERT INTO location VALUES ('879', 'AqtÃƒÆ’Ã‚Â¶be', '1', '111', '1', null);
INSERT INTO location VALUES ('880', 'Astana', '1', '111', '1', null);
INSERT INTO location VALUES ('881', 'Atyrau', '1', '111', '1', null);
INSERT INTO location VALUES ('882', 'East Kazakstan', '1', '111', '1', null);
INSERT INTO location VALUES ('883', 'Mangghystau', '1', '111', '1', null);
INSERT INTO location VALUES ('884', 'North Kazakstan', '1', '111', '1', null);
INSERT INTO location VALUES ('885', 'Pavlodar', '1', '111', '1', null);
INSERT INTO location VALUES ('886', 'Qaraghandy', '1', '111', '1', null);
INSERT INTO location VALUES ('887', 'Qostanay', '1', '111', '1', null);
INSERT INTO location VALUES ('888', 'Qyzylorda', '1', '111', '1', null);
INSERT INTO location VALUES ('889', 'South Kazakstan', '1', '111', '1', null);
INSERT INTO location VALUES ('890', 'Taraz', '1', '111', '1', null);
INSERT INTO location VALUES ('891', 'West Kazakstan', '1', '111', '1', null);
INSERT INTO location VALUES ('892', 'Central', '1', '112', '1', null);
INSERT INTO location VALUES ('893', 'Coast', '1', '112', '1', null);
INSERT INTO location VALUES ('894', 'Eastern', '1', '112', '1', null);
INSERT INTO location VALUES ('895', 'Nairobi', '1', '112', '1', null);
INSERT INTO location VALUES ('896', 'Nyanza', '1', '112', '1', null);
INSERT INTO location VALUES ('897', 'Rift Valley', '1', '112', '1', null);
INSERT INTO location VALUES ('898', 'Bishkek shaary', '1', '113', '1', null);
INSERT INTO location VALUES ('899', 'Osh', '1', '113', '1', null);
INSERT INTO location VALUES ('900', 'Battambang', '1', '114', '1', null);
INSERT INTO location VALUES ('901', 'Phnom Penh', '1', '114', '1', null);
INSERT INTO location VALUES ('902', 'Siem Reap', '1', '114', '1', null);
INSERT INTO location VALUES ('903', 'South Tarawa', '1', '115', '1', null);
INSERT INTO location VALUES ('904', 'St George Basseterre', '1', '116', '1', null);
INSERT INTO location VALUES ('905', 'Cheju', '1', '117', '1', null);
INSERT INTO location VALUES ('906', 'Chollabuk', '1', '117', '1', null);
INSERT INTO location VALUES ('907', 'Chollanam', '1', '117', '1', null);
INSERT INTO location VALUES ('908', 'Chungchongbuk', '1', '117', '1', null);
INSERT INTO location VALUES ('909', 'Chungchongnam', '1', '117', '1', null);
INSERT INTO location VALUES ('910', 'Inchon', '1', '117', '1', null);
INSERT INTO location VALUES ('911', 'Kang-won', '1', '117', '1', null);
INSERT INTO location VALUES ('912', 'Kwangju', '1', '117', '1', null);
INSERT INTO location VALUES ('913', 'Kyonggi', '1', '117', '1', null);
INSERT INTO location VALUES ('914', 'Kyongsangbuk', '1', '117', '1', null);
INSERT INTO location VALUES ('915', 'Kyongsangnam', '1', '117', '1', null);
INSERT INTO location VALUES ('916', 'Pusan', '1', '117', '1', null);
INSERT INTO location VALUES ('917', 'Seoul', '1', '117', '1', null);
INSERT INTO location VALUES ('918', 'Taegu', '1', '117', '1', null);
INSERT INTO location VALUES ('919', 'Taejon', '1', '117', '1', null);
INSERT INTO location VALUES ('920', 'al-Asima', '1', '118', '1', null);
INSERT INTO location VALUES ('921', 'Hawalli', '1', '118', '1', null);
INSERT INTO location VALUES ('922', 'Savannakhet', '1', '119', '1', null);
INSERT INTO location VALUES ('923', 'Viangchan', '1', '119', '1', null);
INSERT INTO location VALUES ('924', 'al-Shamal', '1', '120', '1', null);
INSERT INTO location VALUES ('925', 'Beirut', '1', '120', '1', null);
INSERT INTO location VALUES ('926', 'Montserrado', '1', '121', '1', null);
INSERT INTO location VALUES ('927', 'al-Zawiya', '1', '122', '1', null);
INSERT INTO location VALUES ('928', 'Bengasi', '1', '122', '1', null);
INSERT INTO location VALUES ('929', 'Misrata', '1', '122', '1', null);
INSERT INTO location VALUES ('930', 'Tripoli', '1', '122', '1', null);
INSERT INTO location VALUES ('931', 'Castries', '1', '123', '1', null);
INSERT INTO location VALUES ('932', 'Schaan', '1', '124', '1', null);
INSERT INTO location VALUES ('933', 'Vaduz', '1', '124', '1', null);
INSERT INTO location VALUES ('934', 'Central', '1', '125', '1', null);
INSERT INTO location VALUES ('935', 'Northern', '1', '125', '1', null);
INSERT INTO location VALUES ('936', 'Western', '1', '125', '1', null);
INSERT INTO location VALUES ('937', 'Maseru', '1', '126', '1', null);
INSERT INTO location VALUES ('938', 'Kaunas', '1', '127', '1', null);
INSERT INTO location VALUES ('939', 'Klaipeda', '1', '127', '1', null);
INSERT INTO location VALUES ('940', 'Panevezys', '1', '127', '1', null);
INSERT INTO location VALUES ('941', 'Vilna', '1', '127', '1', null);
INSERT INTO location VALUES ('942', 'Ãƒâ€¦ iauliai', '1', '127', '1', null);
INSERT INTO location VALUES ('943', 'Luxembourg', '1', '128', '1', null);
INSERT INTO location VALUES ('944', 'Daugavpils', '1', '129', '1', null);
INSERT INTO location VALUES ('945', 'Liepaja', '1', '129', '1', null);
INSERT INTO location VALUES ('946', 'Riika', '1', '129', '1', null);
INSERT INTO location VALUES ('947', 'Macau', '1', '130', '1', null);
INSERT INTO location VALUES ('948', 'Casablanca', '1', '131', '1', null);
INSERT INTO location VALUES ('949', 'Chaouia-Ouardigha', '1', '131', '1', null);
INSERT INTO location VALUES ('950', 'Doukkala-Abda', '1', '131', '1', null);
INSERT INTO location VALUES ('951', 'FÃƒÆ’Ã‚Â¨s-Boulemane', '1', '131', '1', null);
INSERT INTO location VALUES ('952', 'Gharb-Chrarda-BÃƒÆ’Ã‚Â©ni', '1', '131', '1', null);
INSERT INTO location VALUES ('953', 'Marrakech-Tensift-Al', '1', '131', '1', null);
INSERT INTO location VALUES ('954', 'MeknÃƒÆ’Ã‚Â¨s-Tafilalet', '1', '131', '1', null);
INSERT INTO location VALUES ('955', 'Oriental', '1', '131', '1', null);
INSERT INTO location VALUES ('956', 'Rabat-SalÃƒÆ’Ã‚Â©-Zammour-', '1', '131', '1', null);
INSERT INTO location VALUES ('957', 'Souss Massa-DraÃƒÆ’Ã‚Â¢', '1', '131', '1', null);
INSERT INTO location VALUES ('958', 'Tadla-Azilal', '1', '131', '1', null);
INSERT INTO location VALUES ('959', 'Tanger-TÃƒÆ’Ã‚Â©touan', '1', '131', '1', null);
INSERT INTO location VALUES ('960', 'Taza-Al Hoceima-Taou', '1', '131', '1', null);
INSERT INTO location VALUES ('961', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '132', '1', null);
INSERT INTO location VALUES ('962', 'Balti', '1', '133', '1', null);
INSERT INTO location VALUES ('963', 'Bender (TÃƒÆ’Ã‚Â®ghina)', '1', '133', '1', null);
INSERT INTO location VALUES ('964', 'Chisinau', '1', '133', '1', null);
INSERT INTO location VALUES ('965', 'Dnjestria', '1', '133', '1', null);
INSERT INTO location VALUES ('966', 'Antananarivo', '1', '134', '1', null);
INSERT INTO location VALUES ('967', 'Fianarantsoa', '1', '134', '1', null);
INSERT INTO location VALUES ('968', 'Mahajanga', '1', '134', '1', null);
INSERT INTO location VALUES ('969', 'Toamasina', '1', '134', '1', null);
INSERT INTO location VALUES ('970', 'Maale', '1', '135', '1', null);
INSERT INTO location VALUES ('971', 'Aguascalientes', '1', '136', '1', null);
INSERT INTO location VALUES ('972', 'Baja California', '1', '136', '1', null);
INSERT INTO location VALUES ('973', 'Baja California Sur', '1', '136', '1', null);
INSERT INTO location VALUES ('974', 'Campeche', '1', '136', '1', null);
INSERT INTO location VALUES ('975', 'Chiapas', '1', '136', '1', null);
INSERT INTO location VALUES ('976', 'Chihuahua', '1', '136', '1', null);
INSERT INTO location VALUES ('977', 'Coahuila de Zaragoza', '1', '136', '1', null);
INSERT INTO location VALUES ('978', 'Colima', '1', '136', '1', null);
INSERT INTO location VALUES ('979', 'Distrito Federal', '1', '136', '1', null);
INSERT INTO location VALUES ('980', 'Durango', '1', '136', '1', null);
INSERT INTO location VALUES ('981', 'Guanajuato', '1', '136', '1', null);
INSERT INTO location VALUES ('982', 'Guerrero', '1', '136', '1', null);
INSERT INTO location VALUES ('983', 'Hidalgo', '1', '136', '1', null);
INSERT INTO location VALUES ('984', 'Jalisco', '1', '136', '1', null);
INSERT INTO location VALUES ('985', 'MÃƒÆ’Ã‚Â©xico', '1', '136', '1', null);
INSERT INTO location VALUES ('986', 'MichoacÃƒÆ’Ã‚Â¡n de Ocampo', '1', '136', '1', null);
INSERT INTO location VALUES ('987', 'Morelos', '1', '136', '1', null);
INSERT INTO location VALUES ('988', 'Nayarit', '1', '136', '1', null);
INSERT INTO location VALUES ('989', 'Nuevo LeÃƒÆ’Ã‚Â³n', '1', '136', '1', null);
INSERT INTO location VALUES ('990', 'Oaxaca', '1', '136', '1', null);
INSERT INTO location VALUES ('991', 'Puebla', '1', '136', '1', null);
INSERT INTO location VALUES ('992', 'QuerÃƒÆ’Ã‚Â©taro', '1', '136', '1', null);
INSERT INTO location VALUES ('993', 'QuerÃƒÆ’Ã‚Â©taro de Arteag', '1', '136', '1', null);
INSERT INTO location VALUES ('994', 'Quintana Roo', '1', '136', '1', null);
INSERT INTO location VALUES ('995', 'San Luis PotosÃƒÆ’Ã‚Â¬', '1', '136', '1', null);
INSERT INTO location VALUES ('996', 'Sinaloa', '1', '136', '1', null);
INSERT INTO location VALUES ('997', 'Sonora', '1', '136', '1', null);
INSERT INTO location VALUES ('998', 'Tabasco', '1', '136', '1', null);
INSERT INTO location VALUES ('999', 'Tamaulipas', '1', '136', '1', null);
INSERT INTO location VALUES ('1000', 'Veracruz', '1', '136', '1', null);
INSERT INTO location VALUES ('1001', 'Veracruz-Llave', '1', '136', '1', null);
INSERT INTO location VALUES ('1002', 'YucatÃƒÆ’Ã‚Â¡n', '1', '136', '1', null);
INSERT INTO location VALUES ('1003', 'Zacatecas', '1', '136', '1', null);
INSERT INTO location VALUES ('1004', 'Majuro', '1', '137', '1', null);
INSERT INTO location VALUES ('1005', 'Skopje', '1', '138', '1', null);
INSERT INTO location VALUES ('1006', 'Bamako', '1', '139', '1', null);
INSERT INTO location VALUES ('1007', 'Inner Harbour', '1', '140', '1', null);
INSERT INTO location VALUES ('1008', 'Outer Harbour', '1', '140', '1', null);
INSERT INTO location VALUES ('1009', 'Irrawaddy [Ayeyarwad', '1', '141', '1', null);
INSERT INTO location VALUES ('1010', 'Magwe [Magway]', '1', '141', '1', null);
INSERT INTO location VALUES ('1011', 'Mandalay', '1', '141', '1', null);
INSERT INTO location VALUES ('1012', 'Mon', '1', '141', '1', null);
INSERT INTO location VALUES ('1013', 'Pegu [Bago]', '1', '141', '1', null);
INSERT INTO location VALUES ('1014', 'Rakhine', '1', '141', '1', null);
INSERT INTO location VALUES ('1015', 'Rangoon [Yangon]', '1', '141', '1', null);
INSERT INTO location VALUES ('1016', 'Sagaing', '1', '141', '1', null);
INSERT INTO location VALUES ('1017', 'Shan', '1', '141', '1', null);
INSERT INTO location VALUES ('1018', 'Tenasserim [Tanintha', '1', '141', '1', null);
INSERT INTO location VALUES ('1019', 'Ulaanbaatar', '1', '142', '1', null);
INSERT INTO location VALUES ('1020', 'Saipan', '1', '143', '1', null);
INSERT INTO location VALUES ('1021', 'Gaza', '1', '144', '1', null);
INSERT INTO location VALUES ('1022', 'Inhambane', '1', '144', '1', null);
INSERT INTO location VALUES ('1023', 'Manica', '1', '144', '1', null);
INSERT INTO location VALUES ('1024', 'Maputo', '1', '144', '1', null);
INSERT INTO location VALUES ('1025', 'Nampula', '1', '144', '1', null);
INSERT INTO location VALUES ('1026', 'Sofala', '1', '144', '1', null);
INSERT INTO location VALUES ('1027', 'Tete', '1', '144', '1', null);
INSERT INTO location VALUES ('1028', 'ZambÃƒÆ’Ã‚Â©zia', '1', '144', '1', null);
INSERT INTO location VALUES ('1029', 'Dakhlet NouÃƒÆ’Ã‚Â¢dhibou', '1', '145', '1', null);
INSERT INTO location VALUES ('1030', 'Nouakchott', '1', '145', '1', null);
INSERT INTO location VALUES ('1031', 'Plymouth', '1', '146', '1', null);
INSERT INTO location VALUES ('1032', 'Fort-de-France', '1', '147', '1', null);
INSERT INTO location VALUES ('1033', 'Plaines Wilhelms', '1', '148', '1', null);
INSERT INTO location VALUES ('1034', 'Port-Louis', '1', '148', '1', null);
INSERT INTO location VALUES ('1035', 'Blantyre', '1', '149', '1', null);
INSERT INTO location VALUES ('1036', 'Lilongwe', '1', '149', '1', null);
INSERT INTO location VALUES ('1037', 'Johor', '1', '150', '1', null);
INSERT INTO location VALUES ('1038', 'Kedah', '1', '150', '1', null);
INSERT INTO location VALUES ('1039', 'Kelantan', '1', '150', '1', null);
INSERT INTO location VALUES ('1040', 'Negeri Sembilan', '1', '150', '1', null);
INSERT INTO location VALUES ('1041', 'Pahang', '1', '150', '1', null);
INSERT INTO location VALUES ('1042', 'Perak', '1', '150', '1', null);
INSERT INTO location VALUES ('1043', 'Pulau Pinang', '1', '150', '1', null);
INSERT INTO location VALUES ('1044', 'Sabah', '1', '150', '1', null);
INSERT INTO location VALUES ('1045', 'Sarawak', '1', '150', '1', null);
INSERT INTO location VALUES ('1046', 'Selangor', '1', '150', '1', null);
INSERT INTO location VALUES ('1047', 'Terengganu', '1', '150', '1', null);
INSERT INTO location VALUES ('1048', 'Wilayah Persekutuan', '1', '150', '1', null);
INSERT INTO location VALUES ('1049', 'Mamoutzou', '1', '151', '1', null);
INSERT INTO location VALUES ('1050', 'Khomas', '1', '152', '1', null);
INSERT INTO location VALUES ('1051', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '153', '1', null);
INSERT INTO location VALUES ('1052', 'Maradi', '1', '154', '1', null);
INSERT INTO location VALUES ('1053', 'Niamey', '1', '154', '1', null);
INSERT INTO location VALUES ('1054', 'Zinder', '1', '154', '1', null);
INSERT INTO location VALUES ('1055', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '155', '1', null);
INSERT INTO location VALUES ('1056', 'Anambra & Enugu & Eb', '1', '156', '1', null);
INSERT INTO location VALUES ('1057', 'Bauchi & Gombe', '1', '156', '1', null);
INSERT INTO location VALUES ('1058', 'Benue', '1', '156', '1', null);
INSERT INTO location VALUES ('1059', 'Borno & Yobe', '1', '156', '1', null);
INSERT INTO location VALUES ('1060', 'Cross River', '1', '156', '1', null);
INSERT INTO location VALUES ('1061', 'Edo & Delta', '1', '156', '1', null);
INSERT INTO location VALUES ('1062', 'Federal Capital Dist', '1', '156', '1', null);
INSERT INTO location VALUES ('1063', 'Imo & Abia', '1', '156', '1', null);
INSERT INTO location VALUES ('1064', 'Kaduna', '1', '156', '1', null);
INSERT INTO location VALUES ('1065', 'Kano & Jigawa', '1', '156', '1', null);
INSERT INTO location VALUES ('1066', 'Katsina', '1', '156', '1', null);
INSERT INTO location VALUES ('1067', 'Kwara & Kogi', '1', '156', '1', null);
INSERT INTO location VALUES ('1068', 'Lagos', '1', '156', '1', null);
INSERT INTO location VALUES ('1069', 'Niger', '1', '156', '1', null);
INSERT INTO location VALUES ('1070', 'Ogun', '1', '156', '1', null);
INSERT INTO location VALUES ('1071', 'Ondo & Ekiti', '1', '156', '1', null);
INSERT INTO location VALUES ('1072', 'Oyo & Osun', '1', '156', '1', null);
INSERT INTO location VALUES ('1073', 'Plateau & Nassarawa', '1', '156', '1', null);
INSERT INTO location VALUES ('1074', 'Rivers & Bayelsa', '1', '156', '1', null);
INSERT INTO location VALUES ('1075', 'Sokoto & Kebbi & Zam', '1', '156', '1', null);
INSERT INTO location VALUES ('1076', 'Chinandega', '1', '157', '1', null);
INSERT INTO location VALUES ('1077', 'LeÃƒÆ’Ã‚Â³n', '1', '157', '1', null);
INSERT INTO location VALUES ('1078', 'Managua', '1', '157', '1', null);
INSERT INTO location VALUES ('1079', 'Masaya', '1', '157', '1', null);
INSERT INTO location VALUES ('1080', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '158', '1', null);
INSERT INTO location VALUES ('1081', 'Drenthe', '1', '159', '1', null);
INSERT INTO location VALUES ('1082', 'Flevoland', '1', '159', '1', null);
INSERT INTO location VALUES ('1083', 'Gelderland', '1', '159', '1', null);
INSERT INTO location VALUES ('1084', 'Groningen', '1', '159', '1', null);
INSERT INTO location VALUES ('1085', 'Limburg', '1', '159', '1', null);
INSERT INTO location VALUES ('1086', 'Noord-Brabant', '1', '159', '1', null);
INSERT INTO location VALUES ('1087', 'Noord-Holland', '1', '159', '1', null);
INSERT INTO location VALUES ('1088', 'Overijssel', '1', '159', '1', null);
INSERT INTO location VALUES ('1089', 'Utrecht', '1', '159', '1', null);
INSERT INTO location VALUES ('1090', 'Zuid-Holland', '1', '159', '1', null);
INSERT INTO location VALUES ('1091', 'Akershus', '1', '160', '1', null);
INSERT INTO location VALUES ('1092', 'Hordaland', '1', '160', '1', null);
INSERT INTO location VALUES ('1093', 'Oslo', '1', '160', '1', null);
INSERT INTO location VALUES ('1094', 'Rogaland', '1', '160', '1', null);
INSERT INTO location VALUES ('1095', 'SÃƒÆ’Ã‚Â¸r-TrÃƒÆ’Ã‚Â¸ndelag', '1', '160', '1', null);
INSERT INTO location VALUES ('1096', 'Central', '1', '161', '1', null);
INSERT INTO location VALUES ('1097', 'Eastern', '1', '161', '1', null);
INSERT INTO location VALUES ('1098', 'Western', '1', '161', '1', null);
INSERT INTO location VALUES ('1099', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '162', '1', null);
INSERT INTO location VALUES ('1100', 'Auckland', '1', '163', '1', null);
INSERT INTO location VALUES ('1101', 'Canterbury', '1', '163', '1', null);
INSERT INTO location VALUES ('1102', 'Dunedin', '1', '163', '1', null);
INSERT INTO location VALUES ('1103', 'Hamilton', '1', '163', '1', null);
INSERT INTO location VALUES ('1104', 'Wellington', '1', '163', '1', null);
INSERT INTO location VALUES ('1105', 'al-Batina', '1', '164', '1', null);
INSERT INTO location VALUES ('1106', 'Masqat', '1', '164', '1', null);
INSERT INTO location VALUES ('1107', 'Zufar', '1', '164', '1', null);
INSERT INTO location VALUES ('1108', 'Baluchistan', '1', '165', '1', null);
INSERT INTO location VALUES ('1109', 'Islamabad', '1', '165', '1', null);
INSERT INTO location VALUES ('1110', 'Nothwest Border Prov', '1', '165', '1', null);
INSERT INTO location VALUES ('1111', 'Punjab', '1', '165', '1', null);
INSERT INTO location VALUES ('1112', 'Sind', '1', '165', '1', null);
INSERT INTO location VALUES ('1113', 'Sindh', '1', '165', '1', null);
INSERT INTO location VALUES ('1114', 'PanamÃƒÆ’Ã‚Â¡', '1', '166', '1', null);
INSERT INTO location VALUES ('1115', 'San Miguelito', '1', '166', '1', null);
INSERT INTO location VALUES ('1116', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '167', '1', null);
INSERT INTO location VALUES ('1117', 'Ancash', '1', '168', '1', null);
INSERT INTO location VALUES ('1118', 'Arequipa', '1', '168', '1', null);
INSERT INTO location VALUES ('1119', 'Ayacucho', '1', '168', '1', null);
INSERT INTO location VALUES ('1120', 'Cajamarca', '1', '168', '1', null);
INSERT INTO location VALUES ('1121', 'Callao', '1', '168', '1', null);
INSERT INTO location VALUES ('1122', 'Cusco', '1', '168', '1', null);
INSERT INTO location VALUES ('1123', 'Huanuco', '1', '168', '1', null);
INSERT INTO location VALUES ('1124', 'Ica', '1', '168', '1', null);
INSERT INTO location VALUES ('1125', 'JunÃƒÆ’Ã‚Â¬n', '1', '168', '1', null);
INSERT INTO location VALUES ('1126', 'La Libertad', '1', '168', '1', null);
INSERT INTO location VALUES ('1127', 'Lambayeque', '1', '168', '1', null);
INSERT INTO location VALUES ('1128', 'Lima', '1', '168', '1', null);
INSERT INTO location VALUES ('1129', 'Loreto', '1', '168', '1', null);
INSERT INTO location VALUES ('1130', 'Piura', '1', '168', '1', null);
INSERT INTO location VALUES ('1131', 'Puno', '1', '168', '1', null);
INSERT INTO location VALUES ('1132', 'Tacna', '1', '168', '1', null);
INSERT INTO location VALUES ('1133', 'Ucayali', '1', '168', '1', null);
INSERT INTO location VALUES ('1134', 'ARMM', '1', '169', '1', null);
INSERT INTO location VALUES ('1135', 'Bicol', '1', '169', '1', null);
INSERT INTO location VALUES ('1136', 'Cagayan Valley', '1', '169', '1', null);
INSERT INTO location VALUES ('1137', 'CAR', '1', '169', '1', null);
INSERT INTO location VALUES ('1138', 'Caraga', '1', '169', '1', null);
INSERT INTO location VALUES ('1139', 'Central Luzon', '1', '169', '1', null);
INSERT INTO location VALUES ('1140', 'Central Mindanao', '1', '169', '1', null);
INSERT INTO location VALUES ('1141', 'Central Visayas', '1', '169', '1', null);
INSERT INTO location VALUES ('1142', 'Eastern Visayas', '1', '169', '1', null);
INSERT INTO location VALUES ('1143', 'Ilocos', '1', '169', '1', null);
INSERT INTO location VALUES ('1144', 'National Capital Reg', '1', '169', '1', null);
INSERT INTO location VALUES ('1145', 'Northern Mindanao', '1', '169', '1', null);
INSERT INTO location VALUES ('1146', 'Southern Mindanao', '1', '169', '1', null);
INSERT INTO location VALUES ('1147', 'Southern Tagalog', '1', '169', '1', null);
INSERT INTO location VALUES ('1148', 'Western Mindanao', '1', '169', '1', null);
INSERT INTO location VALUES ('1149', 'Western Visayas', '1', '169', '1', null);
INSERT INTO location VALUES ('1150', 'Koror', '1', '170', '1', null);
INSERT INTO location VALUES ('1151', 'National Capital Dis', '1', '171', '1', null);
INSERT INTO location VALUES ('1152', 'Dolnoslaskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1153', 'Kujawsko-Pomorskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1154', 'Lodzkie', '1', '172', '1', null);
INSERT INTO location VALUES ('1155', 'Lubelskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1156', 'Lubuskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1157', 'Malopolskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1158', 'Mazowieckie', '1', '172', '1', null);
INSERT INTO location VALUES ('1159', 'Opolskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1160', 'Podkarpackie', '1', '172', '1', null);
INSERT INTO location VALUES ('1161', 'Podlaskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1162', 'Pomorskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1163', 'Slaskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1164', 'Swietokrzyskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1165', 'Warminsko-Mazurskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1166', 'Wielkopolskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1167', 'Zachodnio-Pomorskie', '1', '172', '1', null);
INSERT INTO location VALUES ('1168', 'Arecibo', '1', '173', '1', null);
INSERT INTO location VALUES ('1169', 'BayamÃƒÆ’Ã‚Â³n', '1', '173', '1', null);
INSERT INTO location VALUES ('1170', 'Caguas', '1', '173', '1', null);
INSERT INTO location VALUES ('1171', 'Carolina', '1', '173', '1', null);
INSERT INTO location VALUES ('1172', 'Guaynabo', '1', '173', '1', null);
INSERT INTO location VALUES ('1173', 'MayagÃƒÆ’Ã‚Â¼ez', '1', '173', '1', null);
INSERT INTO location VALUES ('1174', 'Ponce', '1', '173', '1', null);
INSERT INTO location VALUES ('1175', 'San Juan', '1', '173', '1', null);
INSERT INTO location VALUES ('1176', 'Toa Baja', '1', '173', '1', null);
INSERT INTO location VALUES ('1177', 'Chagang', '1', '174', '1', null);
INSERT INTO location VALUES ('1178', 'Hamgyong N', '1', '174', '1', null);
INSERT INTO location VALUES ('1179', 'Hamgyong P', '1', '174', '1', null);
INSERT INTO location VALUES ('1180', 'Hwanghae N', '1', '174', '1', null);
INSERT INTO location VALUES ('1181', 'Hwanghae P', '1', '174', '1', null);
INSERT INTO location VALUES ('1182', 'Kaesong-si', '1', '174', '1', null);
INSERT INTO location VALUES ('1183', 'Kangwon', '1', '174', '1', null);
INSERT INTO location VALUES ('1184', 'Nampo-si', '1', '174', '1', null);
INSERT INTO location VALUES ('1185', 'Pyongan N', '1', '174', '1', null);
INSERT INTO location VALUES ('1186', 'Pyongan P', '1', '174', '1', null);
INSERT INTO location VALUES ('1187', 'Pyongyang-si', '1', '174', '1', null);
INSERT INTO location VALUES ('1188', 'Yanggang', '1', '174', '1', null);
INSERT INTO location VALUES ('1189', 'Braga', '1', '175', '1', null);
INSERT INTO location VALUES ('1190', 'CoÃƒÆ’Ã‚Â¬mbra', '1', '175', '1', null);
INSERT INTO location VALUES ('1191', 'Lisboa', '1', '175', '1', null);
INSERT INTO location VALUES ('1192', 'Porto', '1', '175', '1', null);
INSERT INTO location VALUES ('1193', 'Alto ParanÃƒÆ’Ã‚Â¡', '1', '176', '1', null);
INSERT INTO location VALUES ('1194', 'AsunciÃƒÆ’Ã‚Â³n', '1', '176', '1', null);
INSERT INTO location VALUES ('1195', 'Central', '1', '176', '1', null);
INSERT INTO location VALUES ('1196', 'Gaza', '1', '177', '1', null);
INSERT INTO location VALUES ('1197', 'Hebron', '1', '177', '1', null);
INSERT INTO location VALUES ('1198', 'Khan Yunis', '1', '177', '1', null);
INSERT INTO location VALUES ('1199', 'Nablus', '1', '177', '1', null);
INSERT INTO location VALUES ('1200', 'North Gaza', '1', '177', '1', null);
INSERT INTO location VALUES ('1201', 'Rafah', '1', '177', '1', null);
INSERT INTO location VALUES ('1202', 'Tahiti', '1', '178', '1', null);
INSERT INTO location VALUES ('1203', 'Doha', '1', '179', '1', null);
INSERT INTO location VALUES ('1204', 'Saint-Denis', '1', '180', '1', null);
INSERT INTO location VALUES ('1205', 'Arad', '1', '181', '1', null);
INSERT INTO location VALUES ('1206', 'Arges', '1', '181', '1', null);
INSERT INTO location VALUES ('1207', 'Bacau', '1', '181', '1', null);
INSERT INTO location VALUES ('1208', 'Bihor', '1', '181', '1', null);
INSERT INTO location VALUES ('1209', 'Botosani', '1', '181', '1', null);
INSERT INTO location VALUES ('1210', 'Braila', '1', '181', '1', null);
INSERT INTO location VALUES ('1211', 'Brasov', '1', '181', '1', null);
INSERT INTO location VALUES ('1212', 'Bukarest', '1', '181', '1', null);
INSERT INTO location VALUES ('1213', 'Buzau', '1', '181', '1', null);
INSERT INTO location VALUES ('1214', 'Caras-Severin', '1', '181', '1', null);
INSERT INTO location VALUES ('1215', 'Cluj', '1', '181', '1', null);
INSERT INTO location VALUES ('1216', 'Constanta', '1', '181', '1', null);
INSERT INTO location VALUES ('1217', 'DÃƒÆ’Ã‚Â¢mbovita', '1', '181', '1', null);
INSERT INTO location VALUES ('1218', 'Dolj', '1', '181', '1', null);
INSERT INTO location VALUES ('1219', 'Galati', '1', '181', '1', null);
INSERT INTO location VALUES ('1220', 'Gorj', '1', '181', '1', null);
INSERT INTO location VALUES ('1221', 'Iasi', '1', '181', '1', null);
INSERT INTO location VALUES ('1222', 'Maramures', '1', '181', '1', null);
INSERT INTO location VALUES ('1223', 'Mehedinti', '1', '181', '1', null);
INSERT INTO location VALUES ('1224', 'Mures', '1', '181', '1', null);
INSERT INTO location VALUES ('1225', 'Neamt', '1', '181', '1', null);
INSERT INTO location VALUES ('1226', 'Prahova', '1', '181', '1', null);
INSERT INTO location VALUES ('1227', 'Satu Mare', '1', '181', '1', null);
INSERT INTO location VALUES ('1228', 'Sibiu', '1', '181', '1', null);
INSERT INTO location VALUES ('1229', 'Suceava', '1', '181', '1', null);
INSERT INTO location VALUES ('1230', 'Timis', '1', '181', '1', null);
INSERT INTO location VALUES ('1231', 'Tulcea', '1', '181', '1', null);
INSERT INTO location VALUES ('1232', 'VÃƒÆ’Ã‚Â¢lcea', '1', '181', '1', null);
INSERT INTO location VALUES ('1233', 'Vrancea', '1', '181', '1', null);
INSERT INTO location VALUES ('1234', 'Adygea', '1', '182', '1', null);
INSERT INTO location VALUES ('1235', 'Altai', '1', '182', '1', null);
INSERT INTO location VALUES ('1236', 'Amur', '1', '182', '1', null);
INSERT INTO location VALUES ('1237', 'Arkangeli', '1', '182', '1', null);
INSERT INTO location VALUES ('1238', 'Astrahan', '1', '182', '1', null);
INSERT INTO location VALUES ('1239', 'BaÃƒâ€¦Ã‚Â¡kortostan', '1', '182', '1', null);
INSERT INTO location VALUES ('1240', 'Belgorod', '1', '182', '1', null);
INSERT INTO location VALUES ('1241', 'Brjansk', '1', '182', '1', null);
INSERT INTO location VALUES ('1242', 'Burjatia', '1', '182', '1', null);
INSERT INTO location VALUES ('1243', 'Dagestan', '1', '182', '1', null);
INSERT INTO location VALUES ('1244', 'Habarovsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1245', 'Hakassia', '1', '182', '1', null);
INSERT INTO location VALUES ('1246', 'Hanti-Mansia', '1', '182', '1', null);
INSERT INTO location VALUES ('1247', 'Irkutsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1248', 'Ivanovo', '1', '182', '1', null);
INSERT INTO location VALUES ('1249', 'Jaroslavl', '1', '182', '1', null);
INSERT INTO location VALUES ('1250', 'Kabardi-Balkaria', '1', '182', '1', null);
INSERT INTO location VALUES ('1251', 'Kaliningrad', '1', '182', '1', null);
INSERT INTO location VALUES ('1252', 'Kalmykia', '1', '182', '1', null);
INSERT INTO location VALUES ('1253', 'Kaluga', '1', '182', '1', null);
INSERT INTO location VALUES ('1254', 'KamtÃƒâ€¦Ã‚Â¡atka', '1', '182', '1', null);
INSERT INTO location VALUES ('1255', 'KaratÃƒâ€¦Ã‚Â¡ai-TÃƒâ€¦Ã‚Â¡erk', '1', '182', '1', null);
INSERT INTO location VALUES ('1256', 'Karjala', '1', '182', '1', null);
INSERT INTO location VALUES ('1257', 'Kemerovo', '1', '182', '1', null);
INSERT INTO location VALUES ('1258', 'Kirov', '1', '182', '1', null);
INSERT INTO location VALUES ('1259', 'Komi', '1', '182', '1', null);
INSERT INTO location VALUES ('1260', 'Kostroma', '1', '182', '1', null);
INSERT INTO location VALUES ('1261', 'Krasnodar', '1', '182', '1', null);
INSERT INTO location VALUES ('1262', 'Krasnojarsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1263', 'Kurgan', '1', '182', '1', null);
INSERT INTO location VALUES ('1264', 'Kursk', '1', '182', '1', null);
INSERT INTO location VALUES ('1265', 'Lipetsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1266', 'Magadan', '1', '182', '1', null);
INSERT INTO location VALUES ('1267', 'Marinmaa', '1', '182', '1', null);
INSERT INTO location VALUES ('1268', 'Mordva', '1', '182', '1', null);
INSERT INTO location VALUES ('1269', 'Moscow (City)', '1', '182', '1', null);
INSERT INTO location VALUES ('1270', 'Moskova', '1', '182', '1', null);
INSERT INTO location VALUES ('1271', 'Murmansk', '1', '182', '1', null);
INSERT INTO location VALUES ('1272', 'Nizni Novgorod', '1', '182', '1', null);
INSERT INTO location VALUES ('1273', 'North Ossetia-Alania', '1', '182', '1', null);
INSERT INTO location VALUES ('1274', 'Novgorod', '1', '182', '1', null);
INSERT INTO location VALUES ('1275', 'Novosibirsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1276', 'Omsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1277', 'Orenburg', '1', '182', '1', null);
INSERT INTO location VALUES ('1278', 'Orjol', '1', '182', '1', null);
INSERT INTO location VALUES ('1279', 'Penza', '1', '182', '1', null);
INSERT INTO location VALUES ('1280', 'Perm', '1', '182', '1', null);
INSERT INTO location VALUES ('1281', 'Pietari', '1', '182', '1', null);
INSERT INTO location VALUES ('1282', 'Pihkova', '1', '182', '1', null);
INSERT INTO location VALUES ('1283', 'Primorje', '1', '182', '1', null);
INSERT INTO location VALUES ('1284', 'Rjazan', '1', '182', '1', null);
INSERT INTO location VALUES ('1285', 'Rostov-na-Donu', '1', '182', '1', null);
INSERT INTO location VALUES ('1286', 'Saha (Jakutia)', '1', '182', '1', null);
INSERT INTO location VALUES ('1287', 'Sahalin', '1', '182', '1', null);
INSERT INTO location VALUES ('1288', 'Samara', '1', '182', '1', null);
INSERT INTO location VALUES ('1289', 'Saratov', '1', '182', '1', null);
INSERT INTO location VALUES ('1290', 'Smolensk', '1', '182', '1', null);
INSERT INTO location VALUES ('1291', 'Stavropol', '1', '182', '1', null);
INSERT INTO location VALUES ('1292', 'Sverdlovsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1293', 'Tambov', '1', '182', '1', null);
INSERT INTO location VALUES ('1294', 'Tatarstan', '1', '182', '1', null);
INSERT INTO location VALUES ('1295', 'Tjumen', '1', '182', '1', null);
INSERT INTO location VALUES ('1296', 'Tomsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1297', 'Tula', '1', '182', '1', null);
INSERT INTO location VALUES ('1298', 'Tver', '1', '182', '1', null);
INSERT INTO location VALUES ('1299', 'Tyva', '1', '182', '1', null);
INSERT INTO location VALUES ('1300', 'TÃƒâ€¦Ã‚Â¡eljabinsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1301', 'TÃƒâ€¦Ã‚Â¡etÃƒâ€¦Ã‚Â¡enia', '1', '182', '1', null);
INSERT INTO location VALUES ('1302', 'TÃƒâ€¦Ã‚Â¡ita', '1', '182', '1', null);
INSERT INTO location VALUES ('1303', 'TÃƒâ€¦Ã‚Â¡uvassia', '1', '182', '1', null);
INSERT INTO location VALUES ('1304', 'Udmurtia', '1', '182', '1', null);
INSERT INTO location VALUES ('1305', 'Uljanovsk', '1', '182', '1', null);
INSERT INTO location VALUES ('1306', 'Vladimir', '1', '182', '1', null);
INSERT INTO location VALUES ('1307', 'Volgograd', '1', '182', '1', null);
INSERT INTO location VALUES ('1308', 'Vologda', '1', '182', '1', null);
INSERT INTO location VALUES ('1309', 'Voronez', '1', '182', '1', null);
INSERT INTO location VALUES ('1310', 'Yamalin Nenetsia', '1', '182', '1', null);
INSERT INTO location VALUES ('1311', 'Kigali', '1', '183', '1', null);
INSERT INTO location VALUES ('1312', 'al-Khudud al-Samaliy', '1', '184', '1', null);
INSERT INTO location VALUES ('1313', 'al-Qasim', '1', '184', '1', null);
INSERT INTO location VALUES ('1314', 'al-Sharqiya', '1', '184', '1', null);
INSERT INTO location VALUES ('1315', 'Asir', '1', '184', '1', null);
INSERT INTO location VALUES ('1316', 'Hail', '1', '184', '1', null);
INSERT INTO location VALUES ('1317', 'Medina', '1', '184', '1', null);
INSERT INTO location VALUES ('1318', 'Mekka', '1', '184', '1', null);
INSERT INTO location VALUES ('1319', 'Najran', '1', '184', '1', null);
INSERT INTO location VALUES ('1320', 'Qasim', '1', '184', '1', null);
INSERT INTO location VALUES ('1321', 'Riad', '1', '184', '1', null);
INSERT INTO location VALUES ('1322', 'Riyadh', '1', '184', '1', null);
INSERT INTO location VALUES ('1323', 'Tabuk', '1', '184', '1', null);
INSERT INTO location VALUES ('1324', 'al-Bahr al-Abyad', '1', '185', '1', null);
INSERT INTO location VALUES ('1325', 'al-Bahr al-Ahmar', '1', '185', '1', null);
INSERT INTO location VALUES ('1326', 'al-Jazira', '1', '185', '1', null);
INSERT INTO location VALUES ('1327', 'al-Qadarif', '1', '185', '1', null);
INSERT INTO location VALUES ('1328', 'Bahr al-Jabal', '1', '185', '1', null);
INSERT INTO location VALUES ('1329', 'Darfur al-Janubiya', '1', '185', '1', null);
INSERT INTO location VALUES ('1330', 'Darfur al-Shamaliya', '1', '185', '1', null);
INSERT INTO location VALUES ('1331', 'Kassala', '1', '185', '1', null);
INSERT INTO location VALUES ('1332', 'Khartum', '1', '185', '1', null);
INSERT INTO location VALUES ('1333', 'Kurdufan al-Shamaliy', '1', '185', '1', null);
INSERT INTO location VALUES ('1334', 'Cap-Vert', '1', '186', '1', null);
INSERT INTO location VALUES ('1335', 'Diourbel', '1', '186', '1', null);
INSERT INTO location VALUES ('1336', 'Kaolack', '1', '186', '1', null);
INSERT INTO location VALUES ('1337', 'Saint-Louis', '1', '186', '1', null);
INSERT INTO location VALUES ('1338', 'ThiÃƒÆ’Ã‚Â¨s', '1', '186', '1', null);
INSERT INTO location VALUES ('1339', 'Ziguinchor', '1', '186', '1', null);
INSERT INTO location VALUES ('1340', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '187', '1', null);
INSERT INTO location VALUES ('1341', 'Saint Helena', '1', '189', '1', null);
INSERT INTO location VALUES ('1342', 'LÃƒÆ’Ã‚Â¤nsimaa', '1', '190', '1', null);
INSERT INTO location VALUES ('1343', 'Honiara', '1', '191', '1', null);
INSERT INTO location VALUES ('1344', 'Western', '1', '192', '1', null);
INSERT INTO location VALUES ('1345', 'La Libertad', '1', '193', '1', null);
INSERT INTO location VALUES ('1346', 'San Miguel', '1', '193', '1', null);
INSERT INTO location VALUES ('1347', 'San Salvador', '1', '193', '1', null);
INSERT INTO location VALUES ('1348', 'Santa Ana', '1', '193', '1', null);
INSERT INTO location VALUES ('1349', 'San Marino', '1', '194', '1', null);
INSERT INTO location VALUES ('1350', 'Serravalle/Dogano', '1', '194', '1', null);
INSERT INTO location VALUES ('1351', 'Banaadir', '1', '195', '1', null);
INSERT INTO location VALUES ('1352', 'Jubbada Hoose', '1', '195', '1', null);
INSERT INTO location VALUES ('1353', 'Woqooyi Galbeed', '1', '195', '1', null);
INSERT INTO location VALUES ('1354', 'Saint-Pierre', '1', '196', '1', null);
INSERT INTO location VALUES ('1355', 'Aqua Grande', '1', '197', '1', null);
INSERT INTO location VALUES ('1356', 'Paramaribo', '1', '198', '1', null);
INSERT INTO location VALUES ('1357', 'Bratislava', '1', '199', '1', null);
INSERT INTO location VALUES ('1358', 'VÃƒÆ’Ã‚Â½chodnÃƒÆ’Ã‚Â© Slovens', '1', '199', '1', null);
INSERT INTO location VALUES ('1359', 'Osrednjeslovenska', '1', '200', '1', null);
INSERT INTO location VALUES ('1360', 'Podravska', '1', '200', '1', null);
INSERT INTO location VALUES ('1361', 'ÃƒÆ’Ã¢â‚¬â€œrebros lÃƒÆ’Ã‚Â¤n', '1', '201', '1', null);
INSERT INTO location VALUES ('1362', 'East GÃƒÆ’Ã‚Â¶tanmaan lÃƒÆ’Ã‚Â', '1', '201', '1', null);
INSERT INTO location VALUES ('1363', 'GÃƒÆ’Ã‚Â¤vleborgs lÃƒÆ’Ã‚Â¤n', '1', '201', '1', null);
INSERT INTO location VALUES ('1364', 'JÃƒÆ’Ã‚Â¶nkÃƒÆ’Ã‚Â¶pings lÃƒÆ’', '1', '201', '1', null);
INSERT INTO location VALUES ('1365', 'Lisboa', '1', '201', '1', null);
INSERT INTO location VALUES ('1366', 'SkÃƒÆ’Ã‚Â¥ne lÃƒÆ’Ã‚Â¤n', '1', '201', '1', null);
INSERT INTO location VALUES ('1367', 'Uppsala lÃƒÆ’Ã‚Â¤n', '1', '201', '1', null);
INSERT INTO location VALUES ('1368', 'VÃƒÆ’Ã‚Â¤sterbottens lÃƒÆ’Ã‚Â¤', '1', '201', '1', null);
INSERT INTO location VALUES ('1369', 'VÃƒÆ’Ã‚Â¤sternorrlands lÃƒÆ’Ã‚', '1', '201', '1', null);
INSERT INTO location VALUES ('1370', 'VÃƒÆ’Ã‚Â¤stmanlands lÃƒÆ’Ã‚Â¤n', '1', '201', '1', null);
INSERT INTO location VALUES ('1371', 'West GÃƒÆ’Ã‚Â¶tanmaan lÃƒÆ’Ã‚Â', '1', '201', '1', null);
INSERT INTO location VALUES ('1372', 'Hhohho', '1', '202', '1', null);
INSERT INTO location VALUES ('1373', 'MahÃƒÆ’Ã‚Â©', '1', '203', '1', null);
INSERT INTO location VALUES ('1374', 'al-Hasaka', '1', '204', '1', null);
INSERT INTO location VALUES ('1375', 'al-Raqqa', '1', '204', '1', null);
INSERT INTO location VALUES ('1376', 'Aleppo', '1', '204', '1', null);
INSERT INTO location VALUES ('1377', 'Damascus', '1', '204', '1', null);
INSERT INTO location VALUES ('1378', 'Damaskos', '1', '204', '1', null);
INSERT INTO location VALUES ('1379', 'Dayr al-Zawr', '1', '204', '1', null);
INSERT INTO location VALUES ('1380', 'Hama', '1', '204', '1', null);
INSERT INTO location VALUES ('1381', 'Hims', '1', '204', '1', null);
INSERT INTO location VALUES ('1382', 'Idlib', '1', '204', '1', null);
INSERT INTO location VALUES ('1383', 'Latakia', '1', '204', '1', null);
INSERT INTO location VALUES ('1384', 'Grand Turk', '1', '205', '1', null);
INSERT INTO location VALUES ('1385', 'Chari-Baguirmi', '1', '206', '1', null);
INSERT INTO location VALUES ('1386', 'Logone Occidental', '1', '206', '1', null);
INSERT INTO location VALUES ('1387', 'Maritime', '1', '207', '1', null);
INSERT INTO location VALUES ('1388', 'Bangkok', '1', '208', '1', null);
INSERT INTO location VALUES ('1389', 'Chiang Mai', '1', '208', '1', null);
INSERT INTO location VALUES ('1390', 'Khon Kaen', '1', '208', '1', null);
INSERT INTO location VALUES ('1391', 'Nakhon Pathom', '1', '208', '1', null);
INSERT INTO location VALUES ('1392', 'Nakhon Ratchasima', '1', '208', '1', null);
INSERT INTO location VALUES ('1393', 'Nakhon Sawan', '1', '208', '1', null);
INSERT INTO location VALUES ('1394', 'Nonthaburi', '1', '208', '1', null);
INSERT INTO location VALUES ('1395', 'Songkhla', '1', '208', '1', null);
INSERT INTO location VALUES ('1396', 'Ubon Ratchathani', '1', '208', '1', null);
INSERT INTO location VALUES ('1397', 'Udon Thani', '1', '208', '1', null);
INSERT INTO location VALUES ('1398', 'Karotegin', '1', '209', '1', null);
INSERT INTO location VALUES ('1399', 'Khujand', '1', '209', '1', null);
INSERT INTO location VALUES ('1400', 'Fakaofo', '1', '210', '1', null);
INSERT INTO location VALUES ('1401', 'Ahal', '1', '211', '1', null);
INSERT INTO location VALUES ('1402', 'Dashhowuz', '1', '211', '1', null);
INSERT INTO location VALUES ('1403', 'Lebap', '1', '211', '1', null);
INSERT INTO location VALUES ('1404', 'Mary', '1', '211', '1', null);
INSERT INTO location VALUES ('1405', 'Dili', '1', '212', '1', null);
INSERT INTO location VALUES ('1406', 'Tongatapu', '1', '213', '1', null);
INSERT INTO location VALUES ('1407', 'Caroni', '1', '214', '1', null);
INSERT INTO location VALUES ('1408', 'Port-of-Spain', '1', '214', '1', null);
INSERT INTO location VALUES ('1409', 'Ariana', '1', '215', '1', null);
INSERT INTO location VALUES ('1410', 'Biserta', '1', '215', '1', null);
INSERT INTO location VALUES ('1411', 'GabÃƒÆ’Ã‚Â¨s', '1', '215', '1', null);
INSERT INTO location VALUES ('1412', 'Kairouan', '1', '215', '1', null);
INSERT INTO location VALUES ('1413', 'Sfax', '1', '215', '1', null);
INSERT INTO location VALUES ('1414', 'Sousse', '1', '215', '1', null);
INSERT INTO location VALUES ('1415', 'Tunis', '1', '215', '1', null);
INSERT INTO location VALUES ('1416', 'Adana', '1', '216', '1', null);
INSERT INTO location VALUES ('1417', 'Adiyaman', '1', '216', '1', null);
INSERT INTO location VALUES ('1418', 'Afyon', '1', '216', '1', null);
INSERT INTO location VALUES ('1419', 'Aksaray', '1', '216', '1', null);
INSERT INTO location VALUES ('1420', 'Ankara', '1', '216', '1', null);
INSERT INTO location VALUES ('1421', 'Antalya', '1', '216', '1', null);
INSERT INTO location VALUES ('1422', 'Aydin', '1', '216', '1', null);
INSERT INTO location VALUES ('1423', 'ÃƒÆ’Ã¢â‚¬Â¡orum', '1', '216', '1', null);
INSERT INTO location VALUES ('1424', 'Balikesir', '1', '216', '1', null);
INSERT INTO location VALUES ('1425', 'Batman', '1', '216', '1', null);
INSERT INTO location VALUES ('1426', 'Bursa', '1', '216', '1', null);
INSERT INTO location VALUES ('1427', 'Denizli', '1', '216', '1', null);
INSERT INTO location VALUES ('1428', 'Diyarbakir', '1', '216', '1', null);
INSERT INTO location VALUES ('1429', 'Edirne', '1', '216', '1', null);
INSERT INTO location VALUES ('1430', 'ElÃƒÆ’Ã‚Â¢zig', '1', '216', '1', null);
INSERT INTO location VALUES ('1431', 'Erzincan', '1', '216', '1', null);
INSERT INTO location VALUES ('1432', 'Erzurum', '1', '216', '1', null);
INSERT INTO location VALUES ('1433', 'Eskisehir', '1', '216', '1', null);
INSERT INTO location VALUES ('1434', 'Gaziantep', '1', '216', '1', null);
INSERT INTO location VALUES ('1435', 'Hatay', '1', '216', '1', null);
INSERT INTO location VALUES ('1436', 'IÃƒÆ’Ã‚Â§el', '1', '216', '1', null);
INSERT INTO location VALUES ('1437', 'Isparta', '1', '216', '1', null);
INSERT INTO location VALUES ('1438', 'Istanbul', '1', '216', '1', null);
INSERT INTO location VALUES ('1439', 'Izmir', '1', '216', '1', null);
INSERT INTO location VALUES ('1440', 'Kahramanmaras', '1', '216', '1', null);
INSERT INTO location VALUES ('1441', 'KarabÃƒÆ’Ã‚Â¼k', '1', '216', '1', null);
INSERT INTO location VALUES ('1442', 'Karaman', '1', '216', '1', null);
INSERT INTO location VALUES ('1443', 'Kars', '1', '216', '1', null);
INSERT INTO location VALUES ('1444', 'Kayseri', '1', '216', '1', null);
INSERT INTO location VALUES ('1445', 'KÃƒÆ’Ã‚Â¼tahya', '1', '216', '1', null);
INSERT INTO location VALUES ('1446', 'Kilis', '1', '216', '1', null);
INSERT INTO location VALUES ('1447', 'Kirikkale', '1', '216', '1', null);
INSERT INTO location VALUES ('1448', 'Kocaeli', '1', '216', '1', null);
INSERT INTO location VALUES ('1449', 'Konya', '1', '216', '1', null);
INSERT INTO location VALUES ('1450', 'Malatya', '1', '216', '1', null);
INSERT INTO location VALUES ('1451', 'Manisa', '1', '216', '1', null);
INSERT INTO location VALUES ('1452', 'Mardin', '1', '216', '1', null);
INSERT INTO location VALUES ('1453', 'Ordu', '1', '216', '1', null);
INSERT INTO location VALUES ('1454', 'Osmaniye', '1', '216', '1', null);
INSERT INTO location VALUES ('1455', 'Sakarya', '1', '216', '1', null);
INSERT INTO location VALUES ('1456', 'Samsun', '1', '216', '1', null);
INSERT INTO location VALUES ('1457', 'Sanliurfa', '1', '216', '1', null);
INSERT INTO location VALUES ('1458', 'Siirt', '1', '216', '1', null);
INSERT INTO location VALUES ('1459', 'Sivas', '1', '216', '1', null);
INSERT INTO location VALUES ('1460', 'Tekirdag', '1', '216', '1', null);
INSERT INTO location VALUES ('1461', 'Tokat', '1', '216', '1', null);
INSERT INTO location VALUES ('1462', 'Trabzon', '1', '216', '1', null);
INSERT INTO location VALUES ('1463', 'Usak', '1', '216', '1', null);
INSERT INTO location VALUES ('1464', 'Van', '1', '216', '1', null);
INSERT INTO location VALUES ('1465', 'Zonguldak', '1', '216', '1', null);
INSERT INTO location VALUES ('1466', 'Funafuti', '1', '217', '1', null);
INSERT INTO location VALUES ('1467', '', '1', '218', '1', null);
INSERT INTO location VALUES ('1468', 'Changhwa', '1', '218', '1', null);
INSERT INTO location VALUES ('1469', 'Chiayi', '1', '218', '1', null);
INSERT INTO location VALUES ('1470', 'Hsinchu', '1', '218', '1', null);
INSERT INTO location VALUES ('1471', 'Hualien', '1', '218', '1', null);
INSERT INTO location VALUES ('1472', 'Ilan', '1', '218', '1', null);
INSERT INTO location VALUES ('1473', 'Kaohsiung', '1', '218', '1', null);
INSERT INTO location VALUES ('1474', 'Keelung', '1', '218', '1', null);
INSERT INTO location VALUES ('1475', 'Miaoli', '1', '218', '1', null);
INSERT INTO location VALUES ('1476', 'Nantou', '1', '218', '1', null);
INSERT INTO location VALUES ('1477', 'Pingtung', '1', '218', '1', null);
INSERT INTO location VALUES ('1478', 'Taichung', '1', '218', '1', null);
INSERT INTO location VALUES ('1479', 'Tainan', '1', '218', '1', null);
INSERT INTO location VALUES ('1480', 'Taipei', '1', '218', '1', null);
INSERT INTO location VALUES ('1481', 'Taitung', '1', '218', '1', null);
INSERT INTO location VALUES ('1482', 'Taoyuan', '1', '218', '1', null);
INSERT INTO location VALUES ('1483', 'YÃƒÆ’Ã‚Â¼nlin', '1', '218', '1', null);
INSERT INTO location VALUES ('1484', 'Arusha', '1', '219', '1', null);
INSERT INTO location VALUES ('1485', 'Dar es Salaam', '1', '219', '1', null);
INSERT INTO location VALUES ('1486', 'Dodoma', '1', '219', '1', null);
INSERT INTO location VALUES ('1487', 'Kilimanjaro', '1', '219', '1', null);
INSERT INTO location VALUES ('1488', 'Mbeya', '1', '219', '1', null);
INSERT INTO location VALUES ('1489', 'Morogoro', '1', '219', '1', null);
INSERT INTO location VALUES ('1490', 'Mwanza', '1', '219', '1', null);
INSERT INTO location VALUES ('1491', 'Tabora', '1', '219', '1', null);
INSERT INTO location VALUES ('1492', 'Tanga', '1', '219', '1', null);
INSERT INTO location VALUES ('1493', 'Zanzibar West', '1', '219', '1', null);
INSERT INTO location VALUES ('1494', 'Central', '1', '220', '1', null);
INSERT INTO location VALUES ('1495', 'Dnipropetrovsk', '1', '221', '1', null);
INSERT INTO location VALUES ('1496', 'Donetsk', '1', '221', '1', null);
INSERT INTO location VALUES ('1497', 'Harkova', '1', '221', '1', null);
INSERT INTO location VALUES ('1498', 'Herson', '1', '221', '1', null);
INSERT INTO location VALUES ('1499', 'Hmelnytskyi', '1', '221', '1', null);
INSERT INTO location VALUES ('1500', 'Ivano-Frankivsk', '1', '221', '1', null);
INSERT INTO location VALUES ('1501', 'Kiova', '1', '221', '1', null);
INSERT INTO location VALUES ('1502', 'Kirovograd', '1', '221', '1', null);
INSERT INTO location VALUES ('1503', 'Krim', '1', '221', '1', null);
INSERT INTO location VALUES ('1504', 'Lugansk', '1', '221', '1', null);
INSERT INTO location VALUES ('1505', 'Lviv', '1', '221', '1', null);
INSERT INTO location VALUES ('1506', 'Mykolajiv', '1', '221', '1', null);
INSERT INTO location VALUES ('1507', 'Odesa', '1', '221', '1', null);
INSERT INTO location VALUES ('1508', 'Pultava', '1', '221', '1', null);
INSERT INTO location VALUES ('1509', 'Rivne', '1', '221', '1', null);
INSERT INTO location VALUES ('1510', 'Sumy', '1', '221', '1', null);
INSERT INTO location VALUES ('1511', 'Taka-Karpatia', '1', '221', '1', null);
INSERT INTO location VALUES ('1512', 'Ternopil', '1', '221', '1', null);
INSERT INTO location VALUES ('1513', 'TÃƒâ€¦Ã‚Â¡erkasy', '1', '221', '1', null);
INSERT INTO location VALUES ('1514', 'TÃƒâ€¦Ã‚Â¡ernigiv', '1', '221', '1', null);
INSERT INTO location VALUES ('1515', 'TÃƒâ€¦Ã‚Â¡ernivtsi', '1', '221', '1', null);
INSERT INTO location VALUES ('1516', 'Vinnytsja', '1', '221', '1', null);
INSERT INTO location VALUES ('1517', 'Volynia', '1', '221', '1', null);
INSERT INTO location VALUES ('1518', 'Zaporizzja', '1', '221', '1', null);
INSERT INTO location VALUES ('1519', 'Zytomyr', '1', '221', '1', null);
INSERT INTO location VALUES ('1520', 'Montevideo', '1', '223', '1', null);
INSERT INTO location VALUES ('1521', 'Alabama', '1', '224', '1', null);
INSERT INTO location VALUES ('1522', 'Alaska', '1', '224', '1', null);
INSERT INTO location VALUES ('1523', 'Arizona', '1', '224', '1', null);
INSERT INTO location VALUES ('1524', 'Arkansas', '1', '224', '1', null);
INSERT INTO location VALUES ('1525', 'California', '1', '224', '1', null);
INSERT INTO location VALUES ('1526', 'Colorado', '1', '224', '1', null);
INSERT INTO location VALUES ('1527', 'Connecticut', '1', '224', '1', null);
INSERT INTO location VALUES ('1528', 'District of Columbia', '1', '224', '1', null);
INSERT INTO location VALUES ('1529', 'Florida', '1', '224', '1', null);
INSERT INTO location VALUES ('1530', 'Georgia', '1', '224', '1', null);
INSERT INTO location VALUES ('1531', 'Hawaii', '1', '224', '1', null);
INSERT INTO location VALUES ('1532', 'Idaho', '1', '224', '1', null);
INSERT INTO location VALUES ('1533', 'Illinois', '1', '224', '1', null);
INSERT INTO location VALUES ('1534', 'Indiana', '1', '224', '1', null);
INSERT INTO location VALUES ('1535', 'Iowa', '1', '224', '1', null);
INSERT INTO location VALUES ('1536', 'Kansas', '1', '224', '1', null);
INSERT INTO location VALUES ('1537', 'Kentucky', '1', '224', '1', null);
INSERT INTO location VALUES ('1538', 'Louisiana', '1', '224', '1', null);
INSERT INTO location VALUES ('1539', 'Maryland', '1', '224', '1', null);
INSERT INTO location VALUES ('1540', 'Massachusetts', '1', '224', '1', null);
INSERT INTO location VALUES ('1541', 'Michigan', '1', '224', '1', null);
INSERT INTO location VALUES ('1542', 'Minnesota', '1', '224', '1', null);
INSERT INTO location VALUES ('1543', 'Mississippi', '1', '224', '1', null);
INSERT INTO location VALUES ('1544', 'Missouri', '1', '224', '1', null);
INSERT INTO location VALUES ('1545', 'Montana', '1', '224', '1', null);
INSERT INTO location VALUES ('1546', 'Nebraska', '1', '224', '1', null);
INSERT INTO location VALUES ('1547', 'Nevada', '1', '224', '1', null);
INSERT INTO location VALUES ('1548', 'New Hampshire', '1', '224', '1', null);
INSERT INTO location VALUES ('1549', 'New Jersey', '1', '224', '1', null);
INSERT INTO location VALUES ('1550', 'New Mexico', '1', '224', '1', null);
INSERT INTO location VALUES ('1551', 'New York', '1', '224', '1', null);
INSERT INTO location VALUES ('1552', 'North Carolina', '1', '224', '1', null);
INSERT INTO location VALUES ('1553', 'Ohio', '1', '224', '1', null);
INSERT INTO location VALUES ('1554', 'Oklahoma', '1', '224', '1', null);
INSERT INTO location VALUES ('1555', 'Oregon', '1', '224', '1', null);
INSERT INTO location VALUES ('1556', 'Pennsylvania', '1', '224', '1', null);
INSERT INTO location VALUES ('1557', 'Rhode Island', '1', '224', '1', null);
INSERT INTO location VALUES ('1558', 'South Carolina', '1', '224', '1', null);
INSERT INTO location VALUES ('1559', 'South Dakota', '1', '224', '1', null);
INSERT INTO location VALUES ('1560', 'Tennessee', '1', '224', '1', null);
INSERT INTO location VALUES ('1561', 'Texas', '1', '224', '1', null);
INSERT INTO location VALUES ('1562', 'Utah', '1', '224', '1', null);
INSERT INTO location VALUES ('1563', 'Virginia', '1', '224', '1', null);
INSERT INTO location VALUES ('1564', 'Washington', '1', '224', '1', null);
INSERT INTO location VALUES ('1565', 'Wisconsin', '1', '224', '1', null);
INSERT INTO location VALUES ('1566', 'Andijon', '1', '225', '1', null);
INSERT INTO location VALUES ('1567', 'Buhoro', '1', '225', '1', null);
INSERT INTO location VALUES ('1568', 'Cizah', '1', '225', '1', null);
INSERT INTO location VALUES ('1569', 'Fargona', '1', '225', '1', null);
INSERT INTO location VALUES ('1570', 'Karakalpakistan', '1', '225', '1', null);
INSERT INTO location VALUES ('1571', 'Khorazm', '1', '225', '1', null);
INSERT INTO location VALUES ('1572', 'Namangan', '1', '225', '1', null);
INSERT INTO location VALUES ('1573', 'Navoi', '1', '225', '1', null);
INSERT INTO location VALUES ('1574', 'Qashqadaryo', '1', '225', '1', null);
INSERT INTO location VALUES ('1575', 'Samarkand', '1', '225', '1', null);
INSERT INTO location VALUES ('1576', 'Surkhondaryo', '1', '225', '1', null);
INSERT INTO location VALUES ('1577', 'Toskent', '1', '225', '1', null);
INSERT INTO location VALUES ('1578', 'Toskent Shahri', '1', '225', '1', null);
INSERT INTO location VALUES ('1579', 'ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“', '1', '226', '1', null);
INSERT INTO location VALUES ('1580', 'St George', '1', '0', '1', null);
INSERT INTO location VALUES ('1581', '', '1', '228', '1', null);
INSERT INTO location VALUES ('1582', 'AnzoÃƒÆ’Ã‚Â¡tegui', '1', '228', '1', null);
INSERT INTO location VALUES ('1583', 'Apure', '1', '228', '1', null);
INSERT INTO location VALUES ('1584', 'Aragua', '1', '228', '1', null);
INSERT INTO location VALUES ('1585', 'Barinas', '1', '228', '1', null);
INSERT INTO location VALUES ('1586', 'BolÃƒÆ’Ã‚Â¬var', '1', '228', '1', null);
INSERT INTO location VALUES ('1587', 'Carabobo', '1', '228', '1', null);
INSERT INTO location VALUES ('1588', 'Distrito Federal', '1', '228', '1', null);
INSERT INTO location VALUES ('1589', 'FalcÃƒÆ’Ã‚Â³n', '1', '228', '1', null);
INSERT INTO location VALUES ('1590', 'GuÃƒÆ’Ã‚Â¡rico', '1', '228', '1', null);
INSERT INTO location VALUES ('1591', 'Lara', '1', '228', '1', null);
INSERT INTO location VALUES ('1592', 'MÃƒÆ’Ã‚Â©rida', '1', '228', '1', null);
INSERT INTO location VALUES ('1593', 'Miranda', '1', '228', '1', null);
INSERT INTO location VALUES ('1594', 'Monagas', '1', '228', '1', null);
INSERT INTO location VALUES ('1595', 'Portuguesa', '1', '228', '1', null);
INSERT INTO location VALUES ('1596', 'Sucre', '1', '228', '1', null);
INSERT INTO location VALUES ('1597', 'TÃƒÆ’Ã‚Â¡chira', '1', '228', '1', null);
INSERT INTO location VALUES ('1598', 'Trujillo', '1', '228', '1', null);
INSERT INTO location VALUES ('1599', 'Yaracuy', '1', '228', '1', null);
INSERT INTO location VALUES ('1600', 'Zulia', '1', '228', '1', null);
INSERT INTO location VALUES ('1601', 'Tortola', '1', '229', '1', null);
INSERT INTO location VALUES ('1602', 'St Thomas', '1', '230', '1', null);
INSERT INTO location VALUES ('1603', 'An Giang', '1', '231', '1', null);
INSERT INTO location VALUES ('1604', 'Ba Ria-Vung Tau', '1', '231', '1', null);
INSERT INTO location VALUES ('1605', 'Bac Thai', '1', '231', '1', null);
INSERT INTO location VALUES ('1606', 'Binh Dinh', '1', '231', '1', null);
INSERT INTO location VALUES ('1607', 'Binh Thuan', '1', '231', '1', null);
INSERT INTO location VALUES ('1608', 'Can Tho', '1', '231', '1', null);
INSERT INTO location VALUES ('1609', 'Dac Lac', '1', '231', '1', null);
INSERT INTO location VALUES ('1610', 'Dong Nai', '1', '231', '1', null);
INSERT INTO location VALUES ('1611', 'Haiphong', '1', '231', '1', null);
INSERT INTO location VALUES ('1612', 'Hanoi', '1', '231', '1', null);
INSERT INTO location VALUES ('1613', 'Ho Chi Minh City', '1', '231', '1', null);
INSERT INTO location VALUES ('1614', 'Khanh Hoa', '1', '231', '1', null);
INSERT INTO location VALUES ('1615', 'Kien Giang', '1', '231', '1', null);
INSERT INTO location VALUES ('1616', 'Lam Dong', '1', '231', '1', null);
INSERT INTO location VALUES ('1617', 'Nam Ha', '1', '231', '1', null);
INSERT INTO location VALUES ('1618', 'Nghe An', '1', '231', '1', null);
INSERT INTO location VALUES ('1619', 'Quang Binh', '1', '231', '1', null);
INSERT INTO location VALUES ('1620', 'Quang Nam-Da Nang', '1', '231', '1', null);
INSERT INTO location VALUES ('1621', 'Quang Ninh', '1', '231', '1', null);
INSERT INTO location VALUES ('1622', 'Thua Thien-Hue', '1', '231', '1', null);
INSERT INTO location VALUES ('1623', 'Tien Giang', '1', '231', '1', null);
INSERT INTO location VALUES ('1624', 'Shefa', '1', '232', '1', null);
INSERT INTO location VALUES ('1625', 'Wallis', '1', '233', '1', null);
INSERT INTO location VALUES ('1626', 'Upolu', '1', '234', '1', null);
INSERT INTO location VALUES ('1627', 'Aden', '1', '235', '1', null);
INSERT INTO location VALUES ('1628', 'Hadramawt', '1', '235', '1', null);
INSERT INTO location VALUES ('1629', 'Hodeida', '1', '235', '1', null);
INSERT INTO location VALUES ('1630', 'Ibb', '1', '235', '1', null);
INSERT INTO location VALUES ('1631', 'Sanaa', '1', '235', '1', null);
INSERT INTO location VALUES ('1632', 'Taizz', '1', '235', '1', null);
INSERT INTO location VALUES ('1633', 'Central Serbia', '1', '236', '1', null);
INSERT INTO location VALUES ('1634', 'Kosovo and Metohija', '1', '236', '1', null);
INSERT INTO location VALUES ('1635', 'Montenegro', '1', '236', '1', null);
INSERT INTO location VALUES ('1636', 'Vojvodina', '1', '236', '1', null);
INSERT INTO location VALUES ('1637', 'Eastern Cape', '1', '237', '1', null);
INSERT INTO location VALUES ('1638', 'Free State', '1', '237', '1', null);
INSERT INTO location VALUES ('1639', 'Gauteng', '1', '237', '1', null);
INSERT INTO location VALUES ('1640', 'KwaZulu-Natal', '1', '237', '1', null);
INSERT INTO location VALUES ('1641', 'Mpumalanga', '1', '237', '1', null);
INSERT INTO location VALUES ('1642', 'North West', '1', '237', '1', null);
INSERT INTO location VALUES ('1643', 'Northern Cape', '1', '237', '1', null);
INSERT INTO location VALUES ('1644', 'Western Cape', '1', '237', '1', null);
INSERT INTO location VALUES ('1645', 'Central', '1', '238', '1', null);
INSERT INTO location VALUES ('1646', 'Copperbelt', '1', '238', '1', null);
INSERT INTO location VALUES ('1647', 'Lusaka', '1', '238', '1', null);
INSERT INTO location VALUES ('1648', 'Bulawayo', '1', '239', '1', null);
INSERT INTO location VALUES ('1649', 'Harare', '1', '239', '1', null);
INSERT INTO location VALUES ('1650', 'Manicaland', '1', '239', '1', null);
INSERT INTO location VALUES ('1651', 'Midlands', '1', '239', '1', null);
INSERT INTO location VALUES ('1652', 'South Hill', '2', '240', '1', null);
INSERT INTO location VALUES ('1653', 'The Valley', '2', '240', '1', null);
INSERT INTO location VALUES ('1654', 'Oranjestad', '2', '240', '1', null);
INSERT INTO location VALUES ('1655', 'Douglas', '2', '240', '1', null);
INSERT INTO location VALUES ('1656', 'Gibraltar', '2', '240', '1', null);
INSERT INTO location VALUES ('1657', 'Tamuning', '2', '240', '1', null);
INSERT INTO location VALUES ('1658', 'AgaÃƒÆ’Ã‚Â±a', '2', '240', '1', null);
INSERT INTO location VALUES ('1659', 'Flying Fish Cove', '2', '240', '1', null);
INSERT INTO location VALUES ('1660', 'Monte-Carlo', '2', '240', '1', null);
INSERT INTO location VALUES ('1661', 'Monaco-Ville', '2', '240', '1', null);
INSERT INTO location VALUES ('1662', 'Yangor', '2', '240', '1', null);
INSERT INTO location VALUES ('1663', 'Yaren', '2', '240', '1', null);
INSERT INTO location VALUES ('1664', 'Alofi', '2', '240', '1', null);
INSERT INTO location VALUES ('1665', 'Kingston', '2', '240', '1', null);
INSERT INTO location VALUES ('1666', 'Adamstown', '2', '240', '1', null);
INSERT INTO location VALUES ('1667', 'Singapore', '2', '240', '1', null);
INSERT INTO location VALUES ('1668', 'NoumÃƒÆ’Ã‚Â©a', '2', '240', '1', null);
INSERT INTO location VALUES ('1669', 'CittÃƒÆ’  del Vaticano', '2', '240', '1', null);
INSERT INTO location VALUES ('1670', 'Mazar-e-Sharif', '2', '241', '1', null);
INSERT INTO location VALUES ('1671', 'Herat', '2', '242', '1', null);
INSERT INTO location VALUES ('1672', 'Kabul', '2', '243', '1', null);
INSERT INTO location VALUES ('1673', 'Qandahar', '2', '244', '1', null);
INSERT INTO location VALUES ('1674', 'Lobito', '2', '245', '1', null);
INSERT INTO location VALUES ('1675', 'Benguela', '2', '245', '1', null);
INSERT INTO location VALUES ('1676', 'Huambo', '2', '246', '1', null);
INSERT INTO location VALUES ('1677', 'Luanda', '2', '247', '1', null);
INSERT INTO location VALUES ('1678', 'Namibe', '2', '248', '1', null);
INSERT INTO location VALUES ('1679', 'South Hill', '2', '249', '1', null);
INSERT INTO location VALUES ('1680', 'The Valley', '2', '249', '1', null);
INSERT INTO location VALUES ('1681', 'Oranjestad', '2', '249', '1', null);
INSERT INTO location VALUES ('1682', 'Douglas', '2', '249', '1', null);
INSERT INTO location VALUES ('1683', 'Gibraltar', '2', '249', '1', null);
INSERT INTO location VALUES ('1684', 'Tamuning', '2', '249', '1', null);
INSERT INTO location VALUES ('1685', 'AgaÃƒÆ’Ã‚Â±a', '2', '249', '1', null);
INSERT INTO location VALUES ('1686', 'Flying Fish Cove', '2', '249', '1', null);
INSERT INTO location VALUES ('1687', 'Monte-Carlo', '2', '249', '1', null);
INSERT INTO location VALUES ('1688', 'Monaco-Ville', '2', '249', '1', null);
INSERT INTO location VALUES ('1689', 'Yangor', '2', '249', '1', null);
INSERT INTO location VALUES ('1690', 'Yaren', '2', '249', '1', null);
INSERT INTO location VALUES ('1691', 'Alofi', '2', '249', '1', null);
INSERT INTO location VALUES ('1692', 'Kingston', '2', '249', '1', null);
INSERT INTO location VALUES ('1693', 'Adamstown', '2', '249', '1', null);
INSERT INTO location VALUES ('1694', 'Singapore', '2', '249', '1', null);
INSERT INTO location VALUES ('1695', 'NoumÃƒÆ’Ã‚Â©a', '2', '249', '1', null);
INSERT INTO location VALUES ('1696', 'CittÃƒÆ’  del Vaticano', '2', '249', '1', null);
INSERT INTO location VALUES ('1697', 'Tirana', '2', '250', '1', null);
INSERT INTO location VALUES ('1698', 'Andorra la Vella', '2', '251', '1', null);
INSERT INTO location VALUES ('1699', 'Willemstad', '2', '252', '1', null);
INSERT INTO location VALUES ('1700', 'Abu Dhabi', '2', '253', '1', null);
INSERT INTO location VALUES ('1701', 'al-Ayn', '2', '253', '1', null);
INSERT INTO location VALUES ('1702', 'Ajman', '2', '254', '1', null);
INSERT INTO location VALUES ('1703', 'Dubai', '2', '255', '1', null);
INSERT INTO location VALUES ('1704', 'Sharja', '2', '256', '1', null);
INSERT INTO location VALUES ('1705', 'La Matanza', '2', '257', '1', null);
INSERT INTO location VALUES ('1706', 'Lomas de Zamora', '2', '257', '1', null);
INSERT INTO location VALUES ('1707', 'Quilmes', '2', '257', '1', null);
INSERT INTO location VALUES ('1708', 'Almirante Brown', '2', '257', '1', null);
INSERT INTO location VALUES ('1709', 'La Plata', '2', '257', '1', null);
INSERT INTO location VALUES ('1710', 'Mar del Plata', '2', '257', '1', null);
INSERT INTO location VALUES ('1711', 'LanÃƒÆ’Ã‚Âºs', '2', '257', '1', null);
INSERT INTO location VALUES ('1712', 'Merlo', '2', '257', '1', null);
INSERT INTO location VALUES ('1713', 'General San MartÃƒÆ’Ã‚Â¬n', '2', '257', '1', null);
INSERT INTO location VALUES ('1714', 'Moreno', '2', '257', '1', null);
INSERT INTO location VALUES ('1715', 'Avellaneda', '2', '257', '1', null);
INSERT INTO location VALUES ('1716', 'Tres de Febrero', '2', '257', '1', null);
INSERT INTO location VALUES ('1717', 'MorÃƒÆ’Ã‚Â³n', '2', '257', '1', null);
INSERT INTO location VALUES ('1718', 'Florencio Varela', '2', '257', '1', null);
INSERT INTO location VALUES ('1719', 'San Isidro', '2', '257', '1', null);
INSERT INTO location VALUES ('1720', 'Tigre', '2', '257', '1', null);
INSERT INTO location VALUES ('1721', 'Malvinas Argentinas', '2', '257', '1', null);
INSERT INTO location VALUES ('1722', 'Vicente LÃƒÆ’Ã‚Â³pez', '2', '257', '1', null);
INSERT INTO location VALUES ('1723', 'Berazategui', '2', '257', '1', null);
INSERT INTO location VALUES ('1724', 'San Miguel', '2', '257', '1', null);
INSERT INTO location VALUES ('1725', 'BahÃƒÆ’Ã‚Â¬a Blanca', '2', '257', '1', null);
INSERT INTO location VALUES ('1726', 'Esteban EcheverrÃƒÆ’Ã‚Â¬a', '2', '257', '1', null);
INSERT INTO location VALUES ('1727', 'JosÃƒÆ’Ã‚Â© C. Paz', '2', '257', '1', null);
INSERT INTO location VALUES ('1728', 'Hurlingham', '2', '257', '1', null);
INSERT INTO location VALUES ('1729', 'ItuzaingÃƒÆ’Ã‚Â³', '2', '257', '1', null);
INSERT INTO location VALUES ('1730', 'San Fernando', '2', '257', '1', null);
INSERT INTO location VALUES ('1731', 'San NicolÃƒÆ’Ã‚Â¡s de los Arro', '2', '257', '1', null);
INSERT INTO location VALUES ('1732', 'Escobar', '2', '257', '1', null);
INSERT INTO location VALUES ('1733', 'Pilar', '2', '257', '1', null);
INSERT INTO location VALUES ('1734', 'Ezeiza', '2', '257', '1', null);
INSERT INTO location VALUES ('1735', 'Tandil', '2', '257', '1', null);
INSERT INTO location VALUES ('1736', 'San Fernando del Valle de Cata', '2', '258', '1', null);
INSERT INTO location VALUES ('1737', 'CÃƒÆ’Ã‚Â³rdoba', '2', '259', '1', null);
INSERT INTO location VALUES ('1738', 'RÃƒÆ’Ã‚Â¬o Cuarto', '2', '259', '1', null);
INSERT INTO location VALUES ('1739', 'MonterÃƒÆ’Ã‚Â¬a', '2', '259', '1', null);
INSERT INTO location VALUES ('1740', 'Resistencia', '2', '260', '1', null);
INSERT INTO location VALUES ('1741', 'Comodoro Rivadavia', '2', '261', '1', null);
INSERT INTO location VALUES ('1742', 'Corrientes', '2', '262', '1', null);
INSERT INTO location VALUES ('1743', 'Buenos Aires', '2', '263', '1', null);
INSERT INTO location VALUES ('1744', 'BrasÃƒÆ’Ã‚Â¬lia', '2', '263', '1', null);
INSERT INTO location VALUES ('1745', 'Ciudad de MÃƒÆ’Ã‚Â©xico', '2', '263', '1', null);
INSERT INTO location VALUES ('1746', 'Caracas', '2', '263', '1', null);
INSERT INTO location VALUES ('1747', 'Catia La Mar', '2', '263', '1', null);
INSERT INTO location VALUES ('1748', 'ParanÃƒÆ’Ã‚Â¡', '2', '264', '1', null);
INSERT INTO location VALUES ('1749', 'Concordia', '2', '264', '1', null);
INSERT INTO location VALUES ('1750', 'Formosa', '2', '265', '1', null);
INSERT INTO location VALUES ('1751', 'San Salvador de Jujuy', '2', '266', '1', null);
INSERT INTO location VALUES ('1752', 'La Rioja', '2', '267', '1', null);
INSERT INTO location VALUES ('1753', 'LogroÃƒÆ’Ã‚Â±o', '2', '267', '1', null);
INSERT INTO location VALUES ('1754', 'Godoy Cruz', '2', '268', '1', null);
INSERT INTO location VALUES ('1755', 'GuaymallÃƒÆ’Ã‚Â©n', '2', '268', '1', null);
INSERT INTO location VALUES ('1756', 'Las Heras', '2', '268', '1', null);
INSERT INTO location VALUES ('1757', 'Mendoza', '2', '268', '1', null);
INSERT INTO location VALUES ('1758', 'San Rafael', '2', '268', '1', null);
INSERT INTO location VALUES ('1759', 'Posadas', '2', '269', '1', null);
INSERT INTO location VALUES ('1760', 'NeuquÃƒÆ’Ã‚Â©n', '2', '270', '1', null);
INSERT INTO location VALUES ('1761', 'Salta', '2', '271', '1', null);
INSERT INTO location VALUES ('1762', 'San Juan', '2', '272', '1', null);
INSERT INTO location VALUES ('1763', 'San Juan', '2', '272', '1', null);
INSERT INTO location VALUES ('1764', 'San Luis', '2', '273', '1', null);
INSERT INTO location VALUES ('1765', 'Rosario', '2', '274', '1', null);
INSERT INTO location VALUES ('1766', 'Santa FÃƒÆ’Ã‚Â©', '2', '274', '1', null);
INSERT INTO location VALUES ('1767', 'Santiago del Estero', '2', '275', '1', null);
INSERT INTO location VALUES ('1768', 'San Miguel de TucumÃƒÆ’Ã‚Â¡n', '2', '276', '1', null);
INSERT INTO location VALUES ('1769', 'Vanadzor', '2', '277', '1', null);
INSERT INTO location VALUES ('1770', 'Yerevan', '2', '278', '1', null);
INSERT INTO location VALUES ('1771', 'Gjumri', '2', '279', '1', null);
INSERT INTO location VALUES ('1772', 'Tafuna', '2', '280', '1', null);
INSERT INTO location VALUES ('1773', 'Fagatogo', '2', '280', '1', null);
INSERT INTO location VALUES ('1774', 'Saint JohnÃƒâ€šÃ‚Â´s', '2', '281', '1', null);
INSERT INTO location VALUES ('1775', 'Canberra', '2', '282', '1', null);
INSERT INTO location VALUES ('1776', 'Sydney', '2', '283', '1', null);
INSERT INTO location VALUES ('1777', 'Newcastle', '2', '283', '1', null);
INSERT INTO location VALUES ('1778', 'Central Coast', '2', '283', '1', null);
INSERT INTO location VALUES ('1779', 'Wollongong', '2', '283', '1', null);
INSERT INTO location VALUES ('1780', 'Brisbane', '2', '284', '1', null);
INSERT INTO location VALUES ('1781', 'Gold Coast', '2', '284', '1', null);
INSERT INTO location VALUES ('1782', 'Townsville', '2', '284', '1', null);
INSERT INTO location VALUES ('1783', 'Cairns', '2', '284', '1', null);
INSERT INTO location VALUES ('1784', 'Adelaide', '2', '285', '1', null);
INSERT INTO location VALUES ('1785', 'Hobart', '2', '286', '1', null);
INSERT INTO location VALUES ('1786', 'Melbourne', '2', '287', '1', null);
INSERT INTO location VALUES ('1787', 'Geelong', '2', '287', '1', null);
INSERT INTO location VALUES ('1788', 'Perth', '2', '288', '1', null);
INSERT INTO location VALUES ('1789', 'Klagenfurt', '2', '289', '1', null);
INSERT INTO location VALUES ('1790', 'Linz', '2', '290', '1', null);
INSERT INTO location VALUES ('1791', 'Salzburg', '2', '291', '1', null);
INSERT INTO location VALUES ('1792', 'Graz', '2', '292', '1', null);
INSERT INTO location VALUES ('1793', 'Innsbruck', '2', '293', '1', null);
INSERT INTO location VALUES ('1794', 'Wien', '2', '294', '1', null);
INSERT INTO location VALUES ('1795', 'Baku', '2', '295', '1', null);
INSERT INTO location VALUES ('1796', 'GÃƒÆ’Ã‚Â¤ncÃƒÆ’Ã‚Â¤', '2', '296', '1', null);
INSERT INTO location VALUES ('1797', 'MingÃƒÆ’Ã‚Â¤ÃƒÆ’Ã‚Â§evir', '2', '297', '1', null);
INSERT INTO location VALUES ('1798', 'Sumqayit', '2', '298', '1', null);
INSERT INTO location VALUES ('1799', 'Bujumbura', '2', '299', '1', null);
INSERT INTO location VALUES ('1800', 'Antwerpen', '2', '300', '1', null);
INSERT INTO location VALUES ('1801', 'Bruxelles [Brussel]', '2', '301', '1', null);
INSERT INTO location VALUES ('1802', 'Schaerbeek', '2', '301', '1', null);
INSERT INTO location VALUES ('1803', 'Gent', '2', '302', '1', null);
INSERT INTO location VALUES ('1804', 'Charleroi', '2', '303', '1', null);
INSERT INTO location VALUES ('1805', 'Mons', '2', '303', '1', null);
INSERT INTO location VALUES ('1806', 'LiÃƒÆ’Ã‚Â¨ge', '2', '304', '1', null);
INSERT INTO location VALUES ('1807', 'Namur', '2', '305', '1', null);
INSERT INTO location VALUES ('1808', 'Brugge', '2', '306', '1', null);
INSERT INTO location VALUES ('1809', 'Djougou', '2', '307', '1', null);
INSERT INTO location VALUES ('1810', 'Cotonou', '2', '308', '1', null);
INSERT INTO location VALUES ('1811', 'Parakou', '2', '309', '1', null);
INSERT INTO location VALUES ('1812', 'Porto-Novo', '2', '310', '1', null);
INSERT INTO location VALUES ('1813', 'Koudougou', '2', '311', '1', null);
INSERT INTO location VALUES ('1814', 'Bobo-Dioulasso', '2', '312', '1', null);
INSERT INTO location VALUES ('1815', 'Ouagadougou', '2', '313', '1', null);
INSERT INTO location VALUES ('1816', 'Barisal', '2', '314', '1', null);
INSERT INTO location VALUES ('1817', 'Chittagong', '2', '315', '1', null);
INSERT INTO location VALUES ('1818', 'Comilla', '2', '315', '1', null);
INSERT INTO location VALUES ('1819', 'Brahmanbaria', '2', '315', '1', null);
INSERT INTO location VALUES ('1820', 'Dhaka', '2', '316', '1', null);
INSERT INTO location VALUES ('1821', 'Narayanganj', '2', '316', '1', null);
INSERT INTO location VALUES ('1822', 'Mymensingh', '2', '316', '1', null);
INSERT INTO location VALUES ('1823', 'Tungi', '2', '316', '1', null);
INSERT INTO location VALUES ('1824', 'Tangail', '2', '316', '1', null);
INSERT INTO location VALUES ('1825', 'Jamalpur', '2', '316', '1', null);
INSERT INTO location VALUES ('1826', 'Narsinghdi', '2', '316', '1', null);
INSERT INTO location VALUES ('1827', 'Gazipur', '2', '316', '1', null);
INSERT INTO location VALUES ('1828', 'Khulna', '2', '317', '1', null);
INSERT INTO location VALUES ('1829', 'Jessore', '2', '317', '1', null);
INSERT INTO location VALUES ('1830', 'Rajshahi', '2', '318', '1', null);
INSERT INTO location VALUES ('1831', 'Rangpur', '2', '318', '1', null);
INSERT INTO location VALUES ('1832', 'Nawabganj', '2', '318', '1', null);
INSERT INTO location VALUES ('1833', 'Dinajpur', '2', '318', '1', null);
INSERT INTO location VALUES ('1834', 'Bogra', '2', '318', '1', null);
INSERT INTO location VALUES ('1835', 'Pabna', '2', '318', '1', null);
INSERT INTO location VALUES ('1836', 'Naogaon', '2', '318', '1', null);
INSERT INTO location VALUES ('1837', 'Sirajganj', '2', '318', '1', null);
INSERT INTO location VALUES ('1838', 'Saidpur', '2', '318', '1', null);
INSERT INTO location VALUES ('1839', 'Sylhet', '2', '319', '1', null);
INSERT INTO location VALUES ('1840', 'Burgas', '2', '320', '1', null);
INSERT INTO location VALUES ('1841', 'Sliven', '2', '320', '1', null);
INSERT INTO location VALUES ('1842', 'Sofija', '2', '321', '1', null);
INSERT INTO location VALUES ('1843', 'Stara Zagora', '2', '322', '1', null);
INSERT INTO location VALUES ('1844', 'Pleven', '2', '323', '1', null);
INSERT INTO location VALUES ('1845', 'Plovdiv', '2', '324', '1', null);
INSERT INTO location VALUES ('1846', 'Ruse', '2', '325', '1', null);
INSERT INTO location VALUES ('1847', 'Varna', '2', '326', '1', null);
INSERT INTO location VALUES ('1848', 'Dobric', '2', '326', '1', null);
INSERT INTO location VALUES ('1849', 'Ãƒâ€¦ umen', '2', '326', '1', null);
INSERT INTO location VALUES ('1850', 'al-Manama', '2', '327', '1', null);
INSERT INTO location VALUES ('1851', 'Nassau', '2', '328', '1', null);
INSERT INTO location VALUES ('1852', 'Sarajevo', '2', '329', '1', null);
INSERT INTO location VALUES ('1853', 'Zenica', '2', '329', '1', null);
INSERT INTO location VALUES ('1854', 'Banja Luka', '2', '330', '1', null);
INSERT INTO location VALUES ('1855', 'Brest', '2', '331', '1', null);
INSERT INTO location VALUES ('1856', 'BaranovitÃƒâ€¦Ã‚Â¡i', '2', '331', '1', null);
INSERT INTO location VALUES ('1857', 'Pinsk', '2', '331', '1', null);
INSERT INTO location VALUES ('1858', 'Gomel', '2', '332', '1', null);
INSERT INTO location VALUES ('1859', 'Mozyr', '2', '332', '1', null);
INSERT INTO location VALUES ('1860', 'Grodno', '2', '333', '1', null);
INSERT INTO location VALUES ('1861', 'Lida', '2', '333', '1', null);
INSERT INTO location VALUES ('1862', 'Minsk', '2', '334', '1', null);
INSERT INTO location VALUES ('1863', 'Borisov', '2', '335', '1', null);
INSERT INTO location VALUES ('1864', 'Soligorsk', '2', '335', '1', null);
INSERT INTO location VALUES ('1865', 'MolodetÃƒâ€¦Ã‚Â¡no', '2', '335', '1', null);
INSERT INTO location VALUES ('1866', 'Mogiljov', '2', '336', '1', null);
INSERT INTO location VALUES ('1867', 'Bobruisk', '2', '336', '1', null);
INSERT INTO location VALUES ('1868', 'Vitebsk', '2', '337', '1', null);
INSERT INTO location VALUES ('1869', 'OrÃƒâ€¦Ã‚Â¡a', '2', '337', '1', null);
INSERT INTO location VALUES ('1870', 'Novopolotsk', '2', '337', '1', null);
INSERT INTO location VALUES ('1871', 'Belize City', '2', '338', '1', null);
INSERT INTO location VALUES ('1872', 'Belmopan', '2', '339', '1', null);
INSERT INTO location VALUES ('1873', 'Hamilton', '2', '340', '1', null);
INSERT INTO location VALUES ('1874', 'Hamilton', '2', '340', '1', null);
INSERT INTO location VALUES ('1875', 'Saint George', '2', '341', '1', null);
INSERT INTO location VALUES ('1876', 'Sucre', '2', '342', '1', null);
INSERT INTO location VALUES ('1877', 'Cochabamba', '2', '343', '1', null);
INSERT INTO location VALUES ('1878', 'La Paz', '2', '344', '1', null);
INSERT INTO location VALUES ('1879', 'El Alto', '2', '344', '1', null);
INSERT INTO location VALUES ('1880', 'Oruro', '2', '345', '1', null);
INSERT INTO location VALUES ('1881', 'PotosÃƒÆ’Ã‚Â¬', '2', '346', '1', null);
INSERT INTO location VALUES ('1882', 'Santa Cruz de la Sierra', '2', '347', '1', null);
INSERT INTO location VALUES ('1883', 'Tarija', '2', '348', '1', null);
INSERT INTO location VALUES ('1884', 'Rio Branco', '2', '349', '1', null);
INSERT INTO location VALUES ('1885', 'MaceiÃƒÆ’Ã‚Â³', '2', '350', '1', null);
INSERT INTO location VALUES ('1886', 'Arapiraca', '2', '350', '1', null);
INSERT INTO location VALUES ('1887', 'MacapÃƒÆ’Ã‚Â¡', '2', '351', '1', null);
INSERT INTO location VALUES ('1888', 'Manaus', '2', '352', '1', null);
INSERT INTO location VALUES ('1889', 'Salvador', '2', '353', '1', null);
INSERT INTO location VALUES ('1890', 'Feira de Santana', '2', '353', '1', null);
INSERT INTO location VALUES ('1891', 'IlhÃƒÆ’Ã‚Â©us', '2', '353', '1', null);
INSERT INTO location VALUES ('1892', 'VitÃƒÆ’Ã‚Â³ria da Conquista', '2', '353', '1', null);
INSERT INTO location VALUES ('1893', 'Juazeiro', '2', '353', '1', null);
INSERT INTO location VALUES ('1894', 'Itabuna', '2', '353', '1', null);
INSERT INTO location VALUES ('1895', 'JequiÃƒÆ’Ã‚Â©', '2', '353', '1', null);
INSERT INTO location VALUES ('1896', 'CamaÃƒÆ’Ã‚Â§ari', '2', '353', '1', null);
INSERT INTO location VALUES ('1897', 'Barreiras', '2', '353', '1', null);
INSERT INTO location VALUES ('1898', 'Alagoinhas', '2', '353', '1', null);
INSERT INTO location VALUES ('1899', 'Lauro de Freitas', '2', '353', '1', null);
INSERT INTO location VALUES ('1900', 'Teixeira de Freitas', '2', '353', '1', null);
INSERT INTO location VALUES ('1901', 'Paulo Afonso', '2', '353', '1', null);
INSERT INTO location VALUES ('1902', 'EunÃƒÆ’Ã‚Â¡polis', '2', '353', '1', null);
INSERT INTO location VALUES ('1903', 'Jacobina', '2', '353', '1', null);
INSERT INTO location VALUES ('1904', 'Fortaleza', '2', '354', '1', null);
INSERT INTO location VALUES ('1905', 'Caucaia', '2', '354', '1', null);
INSERT INTO location VALUES ('1906', 'Juazeiro do Norte', '2', '354', '1', null);
INSERT INTO location VALUES ('1907', 'MaracanaÃƒÆ’Ã‚Âº', '2', '354', '1', null);
INSERT INTO location VALUES ('1908', 'Sobral', '2', '354', '1', null);
INSERT INTO location VALUES ('1909', 'Crato', '2', '354', '1', null);
INSERT INTO location VALUES ('1910', 'Buenos Aires', '2', '355', '1', null);
INSERT INTO location VALUES ('1911', 'BrasÃƒÆ’Ã‚Â¬lia', '2', '355', '1', null);
INSERT INTO location VALUES ('1912', 'Ciudad de MÃƒÆ’Ã‚Â©xico', '2', '355', '1', null);
INSERT INTO location VALUES ('1913', 'Caracas', '2', '355', '1', null);
INSERT INTO location VALUES ('1914', 'Catia La Mar', '2', '355', '1', null);
INSERT INTO location VALUES ('1915', 'Cariacica', '2', '356', '1', null);
INSERT INTO location VALUES ('1916', 'Vila Velha', '2', '356', '1', null);
INSERT INTO location VALUES ('1917', 'Serra', '2', '356', '1', null);
INSERT INTO location VALUES ('1918', 'VitÃƒÆ’Ã‚Â³ria', '2', '356', '1', null);
INSERT INTO location VALUES ('1919', 'Cachoeiro de Itapemirim', '2', '356', '1', null);
INSERT INTO location VALUES ('1920', 'Colatina', '2', '356', '1', null);
INSERT INTO location VALUES ('1921', 'Linhares', '2', '356', '1', null);
INSERT INTO location VALUES ('1922', 'GoiÃƒÆ’Ã‚Â¢nia', '2', '357', '1', null);
INSERT INTO location VALUES ('1923', 'Aparecida de GoiÃƒÆ’Ã‚Â¢nia', '2', '357', '1', null);
INSERT INTO location VALUES ('1924', 'AnÃƒÆ’Ã‚Â¡polis', '2', '357', '1', null);
INSERT INTO location VALUES ('1925', 'LuziÃƒÆ’Ã‚Â¢nia', '2', '357', '1', null);
INSERT INTO location VALUES ('1926', 'Rio Verde', '2', '357', '1', null);
INSERT INTO location VALUES ('1927', 'ÃƒÆ’Ã‚Âguas Lindas de GoiÃƒÆ’', '2', '357', '1', null);
INSERT INTO location VALUES ('1928', 'SÃƒÆ’Ã‚Â£o LuÃƒÆ’Ã‚Â¬s', '2', '358', '1', null);
INSERT INTO location VALUES ('1929', 'Imperatriz', '2', '358', '1', null);
INSERT INTO location VALUES ('1930', 'Caxias', '2', '358', '1', null);
INSERT INTO location VALUES ('1931', 'Timon', '2', '358', '1', null);
INSERT INTO location VALUES ('1932', 'CodÃƒÆ’Ã‚Â³', '2', '358', '1', null);
INSERT INTO location VALUES ('1933', 'SÃƒÆ’Ã‚Â£o JosÃƒÆ’Ã‚Â© de Riba', '2', '358', '1', null);
INSERT INTO location VALUES ('1934', 'Bacabal', '2', '358', '1', null);
INSERT INTO location VALUES ('1935', 'CuiabÃƒÆ’Ã‚Â¡', '2', '359', '1', null);
INSERT INTO location VALUES ('1936', 'VÃƒÆ’Ã‚Â¡rzea Grande', '2', '359', '1', null);
INSERT INTO location VALUES ('1937', 'RondonÃƒÆ’Ã‚Â³polis', '2', '359', '1', null);
INSERT INTO location VALUES ('1938', 'Campo Grande', '2', '360', '1', null);
INSERT INTO location VALUES ('1939', 'Dourados', '2', '360', '1', null);
INSERT INTO location VALUES ('1940', 'CorumbÃƒÆ’Ã‚Â¡', '2', '360', '1', null);
INSERT INTO location VALUES ('1941', 'Belo Horizonte', '2', '361', '1', null);
INSERT INTO location VALUES ('1942', 'Contagem', '2', '361', '1', null);
INSERT INTO location VALUES ('1943', 'UberlÃƒÆ’Ã‚Â¢ndia', '2', '361', '1', null);
INSERT INTO location VALUES ('1944', 'Juiz de Fora', '2', '361', '1', null);
INSERT INTO location VALUES ('1945', 'Betim', '2', '361', '1', null);
INSERT INTO location VALUES ('1946', 'Montes Claros', '2', '361', '1', null);
INSERT INTO location VALUES ('1947', 'Uberaba', '2', '361', '1', null);
INSERT INTO location VALUES ('1948', 'RibeirÃƒÆ’Ã‚Â£o das Neves', '2', '361', '1', null);
INSERT INTO location VALUES ('1949', 'Governador Valadares', '2', '361', '1', null);
INSERT INTO location VALUES ('1950', 'Ipatinga', '2', '361', '1', null);
INSERT INTO location VALUES ('1951', 'DivinÃƒÆ’Ã‚Â³polis', '2', '361', '1', null);
INSERT INTO location VALUES ('1952', 'Sete Lagoas', '2', '361', '1', null);
INSERT INTO location VALUES ('1953', 'Santa Luzia', '2', '361', '1', null);
INSERT INTO location VALUES ('1954', 'PoÃƒÆ’Ã‚Â§os de Caldas', '2', '361', '1', null);
INSERT INTO location VALUES ('1955', 'IbiritÃƒÆ’Ã‚Â©', '2', '361', '1', null);
INSERT INTO location VALUES ('1956', 'TeÃƒÆ’Ã‚Â³filo Otoni', '2', '361', '1', null);
INSERT INTO location VALUES ('1957', 'Patos de Minas', '2', '361', '1', null);
INSERT INTO location VALUES ('1958', 'Barbacena', '2', '361', '1', null);
INSERT INTO location VALUES ('1959', 'Varginha', '2', '361', '1', null);
INSERT INTO location VALUES ('1960', 'SabarÃƒÆ’Ã‚Â¡', '2', '361', '1', null);
INSERT INTO location VALUES ('1961', 'Itabira', '2', '361', '1', null);
INSERT INTO location VALUES ('1962', 'Pouso Alegre', '2', '361', '1', null);
INSERT INTO location VALUES ('1963', 'Passos', '2', '361', '1', null);
INSERT INTO location VALUES ('1964', 'Araguari', '2', '361', '1', null);
INSERT INTO location VALUES ('1965', 'Conselheiro Lafaiete', '2', '361', '1', null);
INSERT INTO location VALUES ('1966', 'Coronel Fabriciano', '2', '361', '1', null);
INSERT INTO location VALUES ('1967', 'Ituiutaba', '2', '361', '1', null);
INSERT INTO location VALUES ('1968', 'JoÃƒÆ’Ã‚Â£o Pessoa', '2', '362', '1', null);
INSERT INTO location VALUES ('1969', 'Campina Grande', '2', '362', '1', null);
INSERT INTO location VALUES ('1970', 'Santa Rita', '2', '362', '1', null);
INSERT INTO location VALUES ('1971', 'Patos', '2', '362', '1', null);
INSERT INTO location VALUES ('1972', 'Curitiba', '2', '363', '1', null);
INSERT INTO location VALUES ('1973', 'Londrina', '2', '363', '1', null);
INSERT INTO location VALUES ('1974', 'MaringÃƒÆ’Ã‚Â¡', '2', '363', '1', null);
INSERT INTO location VALUES ('1975', 'Ponta Grossa', '2', '363', '1', null);
INSERT INTO location VALUES ('1976', 'Foz do IguaÃƒÆ’Ã‚Â§u', '2', '363', '1', null);
INSERT INTO location VALUES ('1977', 'Cascavel', '2', '363', '1', null);
INSERT INTO location VALUES ('1978', 'SÃƒÆ’Ã‚Â£o JosÃƒÆ’Ã‚Â© dos Pin', '2', '363', '1', null);
INSERT INTO location VALUES ('1979', 'Colombo', '2', '363', '1', null);
INSERT INTO location VALUES ('1980', 'Guarapuava', '2', '363', '1', null);
INSERT INTO location VALUES ('1981', 'ParanaguÃƒÆ’Ã‚Â¡', '2', '363', '1', null);
INSERT INTO location VALUES ('1982', 'Apucarana', '2', '363', '1', null);
INSERT INTO location VALUES ('1983', 'Toledo', '2', '363', '1', null);
INSERT INTO location VALUES ('1984', 'Pinhais', '2', '363', '1', null);
INSERT INTO location VALUES ('1985', 'Campo Largo', '2', '363', '1', null);
INSERT INTO location VALUES ('1986', 'BelÃƒÆ’Ã‚Â©m', '2', '364', '1', null);
INSERT INTO location VALUES ('1987', 'Ananindeua', '2', '364', '1', null);
INSERT INTO location VALUES ('1988', 'SantarÃƒÆ’Ã‚Â©m', '2', '364', '1', null);
INSERT INTO location VALUES ('1989', 'MarabÃƒÆ’Ã‚Â¡', '2', '364', '1', null);
INSERT INTO location VALUES ('1990', 'Castanhal', '2', '364', '1', null);
INSERT INTO location VALUES ('1991', 'Abaetetuba', '2', '364', '1', null);
INSERT INTO location VALUES ('1992', 'Itaituba', '2', '364', '1', null);
INSERT INTO location VALUES ('1993', 'CametÃƒÆ’Ã‚Â¡', '2', '364', '1', null);
INSERT INTO location VALUES ('1994', 'Recife', '2', '365', '1', null);
INSERT INTO location VALUES ('1995', 'JaboatÃƒÆ’Ã‚Â£o dos Guararapes', '2', '365', '1', null);
INSERT INTO location VALUES ('1996', 'Olinda', '2', '365', '1', null);
INSERT INTO location VALUES ('1997', 'Paulista', '2', '365', '1', null);
INSERT INTO location VALUES ('1998', 'Caruaru', '2', '365', '1', null);
INSERT INTO location VALUES ('1999', 'Petrolina', '2', '365', '1', null);
INSERT INTO location VALUES ('2000', 'Cabo de Santo Agostinho', '2', '365', '1', null);
INSERT INTO location VALUES ('2001', 'Camaragibe', '2', '365', '1', null);
INSERT INTO location VALUES ('2002', 'Garanhuns', '2', '365', '1', null);
INSERT INTO location VALUES ('2003', 'VitÃƒÆ’Ã‚Â³ria de Santo AntÃƒÆ', '2', '365', '1', null);
INSERT INTO location VALUES ('2004', 'SÃƒÆ’Ã‚Â£o LourenÃƒÆ’Ã‚Â§o da ', '2', '365', '1', null);
INSERT INTO location VALUES ('2005', 'Teresina', '2', '366', '1', null);
INSERT INTO location VALUES ('2006', 'ParnaÃƒÆ’Ã‚Â¬ba', '2', '366', '1', null);
INSERT INTO location VALUES ('2007', 'Rio de Janeiro', '2', '367', '1', null);
INSERT INTO location VALUES ('2008', 'SÃƒÆ’Ã‚Â£o GonÃƒÆ’Ã‚Â§alo', '2', '367', '1', null);
INSERT INTO location VALUES ('2009', 'Nova IguaÃƒÆ’Ã‚Â§u', '2', '367', '1', null);
INSERT INTO location VALUES ('2010', 'Duque de Caxias', '2', '367', '1', null);
INSERT INTO location VALUES ('2011', 'NiterÃƒÆ’Ã‚Â³i', '2', '367', '1', null);
INSERT INTO location VALUES ('2012', 'SÃƒÆ’Ã‚Â£o JoÃƒÆ’Ã‚Â£o de Meri', '2', '367', '1', null);
INSERT INTO location VALUES ('2013', 'Belford Roxo', '2', '367', '1', null);
INSERT INTO location VALUES ('2014', 'Campos dos Goytacazes', '2', '367', '1', null);
INSERT INTO location VALUES ('2015', 'PetrÃƒÆ’Ã‚Â³polis', '2', '367', '1', null);
INSERT INTO location VALUES ('2016', 'Volta Redonda', '2', '367', '1', null);
INSERT INTO location VALUES ('2017', 'MagÃƒÆ’Ã‚Â©', '2', '367', '1', null);
INSERT INTO location VALUES ('2018', 'ItaboraÃƒÆ’Ã‚Â¬', '2', '367', '1', null);
INSERT INTO location VALUES ('2019', 'Nova Friburgo', '2', '367', '1', null);
INSERT INTO location VALUES ('2020', 'Barra Mansa', '2', '367', '1', null);
INSERT INTO location VALUES ('2021', 'NilÃƒÆ’Ã‚Â³polis', '2', '367', '1', null);
INSERT INTO location VALUES ('2022', 'TeresÃƒÆ’Ã‚Â³polis', '2', '367', '1', null);
INSERT INTO location VALUES ('2023', 'MacaÃƒÆ’Ã‚Â©', '2', '367', '1', null);
INSERT INTO location VALUES ('2024', 'Cabo Frio', '2', '367', '1', null);
INSERT INTO location VALUES ('2025', 'Queimados', '2', '367', '1', null);
INSERT INTO location VALUES ('2026', 'Resende', '2', '367', '1', null);
INSERT INTO location VALUES ('2027', 'Angra dos Reis', '2', '367', '1', null);
INSERT INTO location VALUES ('2028', 'Barra do PiraÃƒÆ’Ã‚Â¬', '2', '367', '1', null);
INSERT INTO location VALUES ('2029', 'Natal', '2', '368', '1', null);
INSERT INTO location VALUES ('2030', 'MossorÃƒÆ’Ã‚Â³', '2', '368', '1', null);
INSERT INTO location VALUES ('2031', 'Parnamirim', '2', '368', '1', null);
INSERT INTO location VALUES ('2032', 'Porto Alegre', '2', '369', '1', null);
INSERT INTO location VALUES ('2033', 'Caxias do Sul', '2', '369', '1', null);
INSERT INTO location VALUES ('2034', 'Pelotas', '2', '369', '1', null);
INSERT INTO location VALUES ('2035', 'Canoas', '2', '369', '1', null);
INSERT INTO location VALUES ('2036', 'Novo Hamburgo', '2', '369', '1', null);
INSERT INTO location VALUES ('2037', 'Santa Maria', '2', '369', '1', null);
INSERT INTO location VALUES ('2038', 'GravataÃƒÆ’Ã‚Â¬', '2', '369', '1', null);
INSERT INTO location VALUES ('2039', 'ViamÃƒÆ’Ã‚Â£o', '2', '369', '1', null);
INSERT INTO location VALUES ('2040', 'SÃƒÆ’Ã‚Â£o Leopoldo', '2', '369', '1', null);
INSERT INTO location VALUES ('2041', 'Rio Grande', '2', '369', '1', null);
INSERT INTO location VALUES ('2042', 'Alvorada', '2', '369', '1', null);
INSERT INTO location VALUES ('2043', 'Passo Fundo', '2', '369', '1', null);
INSERT INTO location VALUES ('2044', 'Uruguaiana', '2', '369', '1', null);
INSERT INTO location VALUES ('2045', 'BagÃƒÆ’Ã‚Â©', '2', '369', '1', null);
INSERT INTO location VALUES ('2046', 'Sapucaia do Sul', '2', '369', '1', null);
INSERT INTO location VALUES ('2047', 'Santa Cruz do Sul', '2', '369', '1', null);
INSERT INTO location VALUES ('2048', 'Cachoeirinha', '2', '369', '1', null);
INSERT INTO location VALUES ('2049', 'GuaÃƒÆ’Ã‚Â¬ba', '2', '369', '1', null);
INSERT INTO location VALUES ('2050', 'Santana do Livramento', '2', '369', '1', null);
INSERT INTO location VALUES ('2051', 'Bento GonÃƒÆ’Ã‚Â§alves', '2', '369', '1', null);
INSERT INTO location VALUES ('2052', 'Porto Velho', '2', '370', '1', null);
INSERT INTO location VALUES ('2053', 'Ji-ParanÃƒÆ’Ã‚Â¡', '2', '370', '1', null);
INSERT INTO location VALUES ('2054', 'Boa Vista', '2', '371', '1', null);
INSERT INTO location VALUES ('2055', 'Joinville', '2', '372', '1', null);
INSERT INTO location VALUES ('2056', 'FlorianÃƒÆ’Ã‚Â³polis', '2', '372', '1', null);
INSERT INTO location VALUES ('2057', 'Blumenau', '2', '372', '1', null);
INSERT INTO location VALUES ('2058', 'CriciÃƒÆ’Ã‚Âºma', '2', '372', '1', null);
INSERT INTO location VALUES ('2059', 'SÃƒÆ’Ã‚Â£o JosÃƒÆ’Ã‚Â©', '2', '372', '1', null);
INSERT INTO location VALUES ('2060', 'ItajaÃƒÆ’Ã‚Â¬', '2', '372', '1', null);
INSERT INTO location VALUES ('2061', 'ChapecÃƒÆ’Ã‚Â³', '2', '372', '1', null);
INSERT INTO location VALUES ('2062', 'Lages', '2', '372', '1', null);
INSERT INTO location VALUES ('2063', 'JaraguÃƒÆ’Ã‚Â¡ do Sul', '2', '372', '1', null);
INSERT INTO location VALUES ('2064', 'PalhoÃƒÆ’Ã‚Â§a', '2', '372', '1', null);
INSERT INTO location VALUES ('2065', 'SÃƒÆ’Ã‚Â£o Paulo', '2', '373', '1', null);
INSERT INTO location VALUES ('2066', 'Guarulhos', '2', '373', '1', null);
INSERT INTO location VALUES ('2067', 'Campinas', '2', '373', '1', null);
INSERT INTO location VALUES ('2068', 'SÃƒÆ’Ã‚Â£o Bernardo do Campo', '2', '373', '1', null);
INSERT INTO location VALUES ('2069', 'Osasco', '2', '373', '1', null);
INSERT INTO location VALUES ('2070', 'Santo AndrÃƒÆ’Ã‚Â©', '2', '373', '1', null);
INSERT INTO location VALUES ('2071', 'SÃƒÆ’Ã‚Â£o JosÃƒÆ’Ã‚Â© dos Cam', '2', '373', '1', null);
INSERT INTO location VALUES ('2072', 'RibeirÃƒÆ’Ã‚Â£o Preto', '2', '373', '1', null);
INSERT INTO location VALUES ('2073', 'Sorocaba', '2', '373', '1', null);
INSERT INTO location VALUES ('2074', 'Santos', '2', '373', '1', null);
INSERT INTO location VALUES ('2075', 'MauÃƒÆ’Ã‚Â¡', '2', '373', '1', null);
INSERT INTO location VALUES ('2076', 'CarapicuÃƒÆ’Ã‚Â¬ba', '2', '373', '1', null);
INSERT INTO location VALUES ('2077', 'SÃƒÆ’Ã‚Â£o JosÃƒÆ’Ã‚Â© do Rio ', '2', '373', '1', null);
INSERT INTO location VALUES ('2078', 'Moji das Cruzes', '2', '373', '1', null);
INSERT INTO location VALUES ('2079', 'Diadema', '2', '373', '1', null);
INSERT INTO location VALUES ('2080', 'Piracicaba', '2', '373', '1', null);
INSERT INTO location VALUES ('2081', 'Bauru', '2', '373', '1', null);
INSERT INTO location VALUES ('2082', 'JundÃƒÆ’Ã‚Â¬aÃƒÆ’Ã‚Â¬', '2', '373', '1', null);
INSERT INTO location VALUES ('2083', 'Franca', '2', '373', '1', null);
INSERT INTO location VALUES ('2084', 'SÃƒÆ’Ã‚Â£o Vicente', '2', '373', '1', null);
INSERT INTO location VALUES ('2085', 'Itaquaquecetuba', '2', '373', '1', null);
INSERT INTO location VALUES ('2086', 'Limeira', '2', '373', '1', null);
INSERT INTO location VALUES ('2087', 'GuarujÃƒÆ’Ã‚Â¡', '2', '373', '1', null);
INSERT INTO location VALUES ('2088', 'TaubatÃƒÆ’Ã‚Â©', '2', '373', '1', null);
INSERT INTO location VALUES ('2089', 'Embu', '2', '373', '1', null);
INSERT INTO location VALUES ('2090', 'Barueri', '2', '373', '1', null);
INSERT INTO location VALUES ('2091', 'TaboÃƒÆ’Ã‚Â£o da Serra', '2', '373', '1', null);
INSERT INTO location VALUES ('2092', 'Suzano', '2', '373', '1', null);
INSERT INTO location VALUES ('2093', 'MarÃƒÆ’Ã‚Â¬lia', '2', '373', '1', null);
INSERT INTO location VALUES ('2094', 'SÃƒÆ’Ã‚Â£o Carlos', '2', '373', '1', null);
INSERT INTO location VALUES ('2095', 'SumarÃƒÆ’Ã‚Â©', '2', '373', '1', null);
INSERT INTO location VALUES ('2096', 'Presidente Prudente', '2', '373', '1', null);
INSERT INTO location VALUES ('2097', 'Americana', '2', '373', '1', null);
INSERT INTO location VALUES ('2098', 'Araraquara', '2', '373', '1', null);
INSERT INTO location VALUES ('2099', 'Santa BÃƒÆ’Ã‚Â¡rbara dÃƒâ€šÃ‚Â', '2', '373', '1', null);
INSERT INTO location VALUES ('2100', 'JacareÃƒÆ’Ã‚Â¬', '2', '373', '1', null);
INSERT INTO location VALUES ('2101', 'AraÃƒÆ’Ã‚Â§atuba', '2', '373', '1', null);
INSERT INTO location VALUES ('2102', 'Praia Grande', '2', '373', '1', null);
INSERT INTO location VALUES ('2103', 'Rio Claro', '2', '373', '1', null);
INSERT INTO location VALUES ('2104', 'Itapevi', '2', '373', '1', null);
INSERT INTO location VALUES ('2105', 'Cotia', '2', '373', '1', null);
INSERT INTO location VALUES ('2106', 'Ferraz de Vasconcelos', '2', '373', '1', null);
INSERT INTO location VALUES ('2107', 'Indaiatuba', '2', '373', '1', null);
INSERT INTO location VALUES ('2108', 'HortolÃƒÆ’Ã‚Â¢ndia', '2', '373', '1', null);
INSERT INTO location VALUES ('2109', 'SÃƒÆ’Ã‚Â£o Caetano do Sul', '2', '373', '1', null);
INSERT INTO location VALUES ('2110', 'Itu', '2', '373', '1', null);
INSERT INTO location VALUES ('2111', 'Itapecerica da Serra', '2', '373', '1', null);
INSERT INTO location VALUES ('2112', 'Moji-GuaÃƒÆ’Ã‚Â§u', '2', '373', '1', null);
INSERT INTO location VALUES ('2113', 'Pindamonhangaba', '2', '373', '1', null);
INSERT INTO location VALUES ('2114', 'Francisco Morato', '2', '373', '1', null);
INSERT INTO location VALUES ('2115', 'Itapetininga', '2', '373', '1', null);
INSERT INTO location VALUES ('2116', 'BraganÃƒÆ’Ã‚Â§a Paulista', '2', '373', '1', null);
INSERT INTO location VALUES ('2117', 'JaÃƒÆ’Ã‚Âº', '2', '373', '1', null);
INSERT INTO location VALUES ('2118', 'Franco da Rocha', '2', '373', '1', null);
INSERT INTO location VALUES ('2119', 'RibeirÃƒÆ’Ã‚Â£o Pires', '2', '373', '1', null);
INSERT INTO location VALUES ('2120', 'Catanduva', '2', '373', '1', null);
INSERT INTO location VALUES ('2121', 'Botucatu', '2', '373', '1', null);
INSERT INTO location VALUES ('2122', 'Barretos', '2', '373', '1', null);
INSERT INTO location VALUES ('2123', 'GuaratinguetÃƒÆ’Ã‚Â¡', '2', '373', '1', null);
INSERT INTO location VALUES ('2124', 'CubatÃƒÆ’Ã‚Â£o', '2', '373', '1', null);
INSERT INTO location VALUES ('2125', 'Araras', '2', '373', '1', null);
INSERT INTO location VALUES ('2126', 'Atibaia', '2', '373', '1', null);
INSERT INTO location VALUES ('2127', 'SertÃƒÆ’Ã‚Â£ozinho', '2', '373', '1', null);
INSERT INTO location VALUES ('2128', 'Salto', '2', '373', '1', null);
INSERT INTO location VALUES ('2129', 'Ourinhos', '2', '373', '1', null);
INSERT INTO location VALUES ('2130', 'Birigui', '2', '373', '1', null);
INSERT INTO location VALUES ('2131', 'TatuÃƒÆ’Ã‚Â¬', '2', '373', '1', null);
INSERT INTO location VALUES ('2132', 'Votorantim', '2', '373', '1', null);
INSERT INTO location VALUES ('2133', 'PoÃƒÆ’Ã‚Â¡', '2', '373', '1', null);
INSERT INTO location VALUES ('2134', 'Aracaju', '2', '374', '1', null);
INSERT INTO location VALUES ('2135', 'Nossa Senhora do Socorro', '2', '374', '1', null);
INSERT INTO location VALUES ('2136', 'Palmas', '2', '375', '1', null);
INSERT INTO location VALUES ('2137', 'AraguaÃƒÆ’Ã‚Â¬na', '2', '375', '1', null);
INSERT INTO location VALUES ('2138', 'Bridgetown', '2', '376', '1', null);
INSERT INTO location VALUES ('2139', 'Bandar Seri Begawan', '2', '377', '1', null);
INSERT INTO location VALUES ('2140', 'Thimphu', '2', '378', '1', null);
INSERT INTO location VALUES ('2141', 'Francistown', '2', '379', '1', null);
INSERT INTO location VALUES ('2142', 'Gaborone', '2', '380', '1', null);
INSERT INTO location VALUES ('2143', 'Bangui', '2', '381', '1', null);
INSERT INTO location VALUES ('2144', 'Calgary', '2', '382', '1', null);
INSERT INTO location VALUES ('2145', 'Edmonton', '2', '382', '1', null);
INSERT INTO location VALUES ('2146', 'Vancouver', '2', '383', '1', null);
INSERT INTO location VALUES ('2147', 'Surrey', '2', '383', '1', null);
INSERT INTO location VALUES ('2148', 'Burnaby', '2', '383', '1', null);
INSERT INTO location VALUES ('2149', 'Richmond', '2', '383', '1', null);
INSERT INTO location VALUES ('2150', 'Abbotsford', '2', '383', '1', null);
INSERT INTO location VALUES ('2151', 'Coquitlam', '2', '383', '1', null);
INSERT INTO location VALUES ('2152', 'Saanich', '2', '383', '1', null);
INSERT INTO location VALUES ('2153', 'Delta', '2', '383', '1', null);
INSERT INTO location VALUES ('2154', 'Kelowna', '2', '383', '1', null);
INSERT INTO location VALUES ('2155', 'Winnipeg', '2', '384', '1', null);
INSERT INTO location VALUES ('2156', 'Saint JohnÃƒâ€šÃ‚Â´s', '2', '385', '1', null);
INSERT INTO location VALUES ('2157', 'Cape Breton', '2', '386', '1', null);
INSERT INTO location VALUES ('2158', 'Halifax', '2', '386', '1', null);
INSERT INTO location VALUES ('2159', 'Toronto', '2', '387', '1', null);
INSERT INTO location VALUES ('2160', 'North York', '2', '387', '1', null);
INSERT INTO location VALUES ('2161', 'Mississauga', '2', '387', '1', null);
INSERT INTO location VALUES ('2162', 'Scarborough', '2', '387', '1', null);
INSERT INTO location VALUES ('2163', 'Etobicoke', '2', '387', '1', null);
INSERT INTO location VALUES ('2164', 'London', '2', '387', '1', null);
INSERT INTO location VALUES ('2165', 'Hamilton', '2', '387', '1', null);
INSERT INTO location VALUES ('2166', 'Ottawa', '2', '387', '1', null);
INSERT INTO location VALUES ('2167', 'Brampton', '2', '387', '1', null);
INSERT INTO location VALUES ('2168', 'Windsor', '2', '387', '1', null);
INSERT INTO location VALUES ('2169', 'Kitchener', '2', '387', '1', null);
INSERT INTO location VALUES ('2170', 'Markham', '2', '387', '1', null);
INSERT INTO location VALUES ('2171', 'York', '2', '387', '1', null);
INSERT INTO location VALUES ('2172', 'Vaughan', '2', '387', '1', null);
INSERT INTO location VALUES ('2173', 'Burlington', '2', '387', '1', null);
INSERT INTO location VALUES ('2174', 'Oshawa', '2', '387', '1', null);
INSERT INTO location VALUES ('2175', 'Oakville', '2', '387', '1', null);
INSERT INTO location VALUES ('2176', 'Saint Catharines', '2', '387', '1', null);
INSERT INTO location VALUES ('2177', 'Richmond Hill', '2', '387', '1', null);
INSERT INTO location VALUES ('2178', 'Thunder Bay', '2', '387', '1', null);
INSERT INTO location VALUES ('2179', 'Nepean', '2', '387', '1', null);
INSERT INTO location VALUES ('2180', 'East York', '2', '387', '1', null);
INSERT INTO location VALUES ('2181', 'Cambridge', '2', '387', '1', null);
INSERT INTO location VALUES ('2182', 'Gloucester', '2', '387', '1', null);
INSERT INTO location VALUES ('2183', 'Guelph', '2', '387', '1', null);
INSERT INTO location VALUES ('2184', 'Sudbury', '2', '387', '1', null);
INSERT INTO location VALUES ('2185', 'Barrie', '2', '387', '1', null);
INSERT INTO location VALUES ('2186', 'MontrÃƒÆ’Ã‚Â©al', '2', '388', '1', null);
INSERT INTO location VALUES ('2187', 'Laval', '2', '388', '1', null);
INSERT INTO location VALUES ('2188', 'QuÃƒÆ’Ã‚Â©bec', '2', '388', '1', null);
INSERT INTO location VALUES ('2189', 'Longueuil', '2', '388', '1', null);
INSERT INTO location VALUES ('2190', 'Gatineau', '2', '388', '1', null);
INSERT INTO location VALUES ('2191', 'Saskatoon', '2', '389', '1', null);
INSERT INTO location VALUES ('2192', 'Regina', '2', '389', '1', null);
INSERT INTO location VALUES ('2193', 'Bantam', '2', '390', '1', null);
INSERT INTO location VALUES ('2194', 'West Island', '2', '391', '1', null);
INSERT INTO location VALUES ('2195', 'Basel', '2', '392', '1', null);
INSERT INTO location VALUES ('2196', 'Bern', '2', '393', '1', null);
INSERT INTO location VALUES ('2197', 'Geneve', '2', '394', '1', null);
INSERT INTO location VALUES ('2198', 'Lausanne', '2', '395', '1', null);
INSERT INTO location VALUES ('2199', 'ZÃƒÆ’Ã‚Â¼rich', '2', '396', '1', null);
INSERT INTO location VALUES ('2200', 'Antofagasta', '2', '397', '1', null);
INSERT INTO location VALUES ('2201', 'Calama', '2', '397', '1', null);
INSERT INTO location VALUES ('2202', 'CopiapÃƒÆ’Ã‚Â³', '2', '398', '1', null);
INSERT INTO location VALUES ('2203', 'Talcahuano', '2', '399', '1', null);
INSERT INTO location VALUES ('2204', 'ConcepciÃƒÆ’Ã‚Â³n', '2', '399', '1', null);
INSERT INTO location VALUES ('2205', 'ChillÃƒÆ’Ã‚Â¡n', '2', '399', '1', null);
INSERT INTO location VALUES ('2206', 'Los Angeles', '2', '399', '1', null);
INSERT INTO location VALUES ('2207', 'Coronel', '2', '399', '1', null);
INSERT INTO location VALUES ('2208', 'San Pedro de la Paz', '2', '399', '1', null);
INSERT INTO location VALUES ('2209', 'Coquimbo', '2', '400', '1', null);
INSERT INTO location VALUES ('2210', 'La Serena', '2', '400', '1', null);
INSERT INTO location VALUES ('2211', 'Ovalle', '2', '400', '1', null);
INSERT INTO location VALUES ('2212', 'Temuco', '2', '401', '1', null);
INSERT INTO location VALUES ('2213', 'Puerto Montt', '2', '402', '1', null);
INSERT INTO location VALUES ('2214', 'Osorno', '2', '402', '1', null);
INSERT INTO location VALUES ('2215', 'Valdivia', '2', '402', '1', null);
INSERT INTO location VALUES ('2216', 'Punta Arenas', '2', '403', '1', null);
INSERT INTO location VALUES ('2217', 'Talca', '2', '404', '1', null);
INSERT INTO location VALUES ('2218', 'CuricÃƒÆ’Ã‚Â³', '2', '404', '1', null);
INSERT INTO location VALUES ('2219', 'Rancagua', '2', '405', '1', null);
INSERT INTO location VALUES ('2220', 'Santiago de Chile', '2', '406', '1', null);
INSERT INTO location VALUES ('2221', 'Puente Alto', '2', '406', '1', null);
INSERT INTO location VALUES ('2222', 'San Bernardo', '2', '406', '1', null);
INSERT INTO location VALUES ('2223', 'Melipilla', '2', '406', '1', null);
INSERT INTO location VALUES ('2224', 'Santiago de los Caballeros', '2', '406', '1', null);
INSERT INTO location VALUES ('2225', 'Arica', '2', '407', '1', null);
INSERT INTO location VALUES ('2226', 'Iquique', '2', '407', '1', null);
INSERT INTO location VALUES ('2227', 'ViÃƒÆ’Ã‚Â±a del Mar', '2', '408', '1', null);
INSERT INTO location VALUES ('2228', 'ValparaÃƒÆ’Ã‚Â¬so', '2', '408', '1', null);
INSERT INTO location VALUES ('2229', 'QuilpuÃƒÆ’Ã‚Â©', '2', '408', '1', null);
INSERT INTO location VALUES ('2230', 'Hefei', '2', '409', '1', null);
INSERT INTO location VALUES ('2231', 'Huainan', '2', '409', '1', null);
INSERT INTO location VALUES ('2232', 'Bengbu', '2', '409', '1', null);
INSERT INTO location VALUES ('2233', 'Wuhu', '2', '409', '1', null);
INSERT INTO location VALUES ('2234', 'Huaibei', '2', '409', '1', null);
INSERT INTO location VALUES ('2235', 'MaÃƒâ€šÃ‚Â´anshan', '2', '409', '1', null);
INSERT INTO location VALUES ('2236', 'Anqing', '2', '409', '1', null);
INSERT INTO location VALUES ('2237', 'Tongling', '2', '409', '1', null);
INSERT INTO location VALUES ('2238', 'Fuyang', '2', '409', '1', null);
INSERT INTO location VALUES ('2239', 'Suzhou', '2', '409', '1', null);
INSERT INTO location VALUES ('2240', 'LiuÃƒâ€šÃ‚Â´an', '2', '409', '1', null);
INSERT INTO location VALUES ('2241', 'Chuzhou', '2', '409', '1', null);
INSERT INTO location VALUES ('2242', 'Chaohu', '2', '409', '1', null);
INSERT INTO location VALUES ('2243', 'Xuangzhou', '2', '409', '1', null);
INSERT INTO location VALUES ('2244', 'Bozhou', '2', '409', '1', null);
INSERT INTO location VALUES ('2245', 'Huangshan', '2', '409', '1', null);
INSERT INTO location VALUES ('2246', 'Chongqing', '2', '410', '1', null);
INSERT INTO location VALUES ('2247', 'Fuzhou', '2', '411', '1', null);
INSERT INTO location VALUES ('2248', 'Amoy [Xiamen]', '2', '411', '1', null);
INSERT INTO location VALUES ('2249', 'Nanping', '2', '411', '1', null);
INSERT INTO location VALUES ('2250', 'Quanzhou', '2', '411', '1', null);
INSERT INTO location VALUES ('2251', 'Zhangzhou', '2', '411', '1', null);
INSERT INTO location VALUES ('2252', 'Sanming', '2', '411', '1', null);
INSERT INTO location VALUES ('2253', 'Longyan', '2', '411', '1', null);
INSERT INTO location VALUES ('2254', 'YongÃƒâ€šÃ‚Â´an', '2', '411', '1', null);
INSERT INTO location VALUES ('2255', 'FuÃƒâ€šÃ‚Â´an', '2', '411', '1', null);
INSERT INTO location VALUES ('2256', 'Fuqing', '2', '411', '1', null);
INSERT INTO location VALUES ('2257', 'Putian', '2', '411', '1', null);
INSERT INTO location VALUES ('2258', 'Shaowu', '2', '411', '1', null);
INSERT INTO location VALUES ('2259', 'Lanzhou', '2', '412', '1', null);
INSERT INTO location VALUES ('2260', 'Tianshui', '2', '412', '1', null);
INSERT INTO location VALUES ('2261', 'Baiyin', '2', '412', '1', null);
INSERT INTO location VALUES ('2262', 'Wuwei', '2', '412', '1', null);
INSERT INTO location VALUES ('2263', 'Yumen', '2', '412', '1', null);
INSERT INTO location VALUES ('2264', 'Jinchang', '2', '412', '1', null);
INSERT INTO location VALUES ('2265', 'Pingliang', '2', '412', '1', null);
INSERT INTO location VALUES ('2266', 'Kanton [Guangzhou]', '2', '413', '1', null);
INSERT INTO location VALUES ('2267', 'Shenzhen', '2', '413', '1', null);
INSERT INTO location VALUES ('2268', 'Shantou', '2', '413', '1', null);
INSERT INTO location VALUES ('2269', 'Zhangjiang', '2', '413', '1', null);
INSERT INTO location VALUES ('2270', 'Shaoguan', '2', '413', '1', null);
INSERT INTO location VALUES ('2271', 'Chaozhou', '2', '413', '1', null);
INSERT INTO location VALUES ('2272', 'Dongwan', '2', '413', '1', null);
INSERT INTO location VALUES ('2273', 'Foshan', '2', '413', '1', null);
INSERT INTO location VALUES ('2274', 'Zhongshan', '2', '413', '1', null);
INSERT INTO location VALUES ('2275', 'Jiangmen', '2', '413', '1', null);
INSERT INTO location VALUES ('2276', 'Yangjiang', '2', '413', '1', null);
INSERT INTO location VALUES ('2277', 'Zhaoqing', '2', '413', '1', null);
INSERT INTO location VALUES ('2278', 'Maoming', '2', '413', '1', null);
INSERT INTO location VALUES ('2279', 'Zhuhai', '2', '413', '1', null);
INSERT INTO location VALUES ('2280', 'Qingyuan', '2', '413', '1', null);
INSERT INTO location VALUES ('2281', 'Huizhou', '2', '413', '1', null);
INSERT INTO location VALUES ('2282', 'Meixian', '2', '413', '1', null);
INSERT INTO location VALUES ('2283', 'Heyuan', '2', '413', '1', null);
INSERT INTO location VALUES ('2284', 'Shanwei', '2', '413', '1', null);
INSERT INTO location VALUES ('2285', 'Jieyang', '2', '413', '1', null);
INSERT INTO location VALUES ('2286', 'Nanning', '2', '414', '1', null);
INSERT INTO location VALUES ('2287', 'Liuzhou', '2', '414', '1', null);
INSERT INTO location VALUES ('2288', 'Guilin', '2', '414', '1', null);
INSERT INTO location VALUES ('2289', 'Wuzhou', '2', '414', '1', null);
INSERT INTO location VALUES ('2290', 'Yulin', '2', '414', '1', null);
INSERT INTO location VALUES ('2291', 'Qinzhou', '2', '414', '1', null);
INSERT INTO location VALUES ('2292', 'Guigang', '2', '414', '1', null);
INSERT INTO location VALUES ('2293', 'Beihai', '2', '414', '1', null);
INSERT INTO location VALUES ('2294', 'Bose', '2', '414', '1', null);
INSERT INTO location VALUES ('2295', 'Guiyang', '2', '415', '1', null);
INSERT INTO location VALUES ('2296', 'Liupanshui', '2', '415', '1', null);
INSERT INTO location VALUES ('2297', 'Zunyi', '2', '415', '1', null);
INSERT INTO location VALUES ('2298', 'Anshun', '2', '415', '1', null);
INSERT INTO location VALUES ('2299', 'Duyun', '2', '415', '1', null);
INSERT INTO location VALUES ('2300', 'Kaili', '2', '415', '1', null);
INSERT INTO location VALUES ('2301', 'Haikou', '2', '416', '1', null);
INSERT INTO location VALUES ('2302', 'Sanya', '2', '416', '1', null);
INSERT INTO location VALUES ('2303', 'Shijiazhuang', '2', '417', '1', null);
INSERT INTO location VALUES ('2304', 'Tangshan', '2', '417', '1', null);
INSERT INTO location VALUES ('2305', 'Handan', '2', '417', '1', null);
INSERT INTO location VALUES ('2306', 'Zhangjiakou', '2', '417', '1', null);
INSERT INTO location VALUES ('2307', 'Baoding', '2', '417', '1', null);
INSERT INTO location VALUES ('2308', 'Qinhuangdao', '2', '417', '1', null);
INSERT INTO location VALUES ('2309', 'Xingtai', '2', '417', '1', null);
INSERT INTO location VALUES ('2310', 'Chengde', '2', '417', '1', null);
INSERT INTO location VALUES ('2311', 'Cangzhou', '2', '417', '1', null);
INSERT INTO location VALUES ('2312', 'Langfang', '2', '417', '1', null);
INSERT INTO location VALUES ('2313', 'Renqiu', '2', '417', '1', null);
INSERT INTO location VALUES ('2314', 'Hengshui', '2', '417', '1', null);
INSERT INTO location VALUES ('2315', 'Harbin', '2', '418', '1', null);
INSERT INTO location VALUES ('2316', 'Qiqihar', '2', '418', '1', null);
INSERT INTO location VALUES ('2317', 'Yichun', '2', '418', '1', null);
INSERT INTO location VALUES ('2318', 'Jixi', '2', '418', '1', null);
INSERT INTO location VALUES ('2319', 'Daqing', '2', '418', '1', null);
INSERT INTO location VALUES ('2320', 'Mudanjiang', '2', '418', '1', null);
INSERT INTO location VALUES ('2321', 'Hegang', '2', '418', '1', null);
INSERT INTO location VALUES ('2322', 'Jiamusi', '2', '418', '1', null);
INSERT INTO location VALUES ('2323', 'Shuangyashan', '2', '418', '1', null);
INSERT INTO location VALUES ('2324', 'Tieli', '2', '418', '1', null);
INSERT INTO location VALUES ('2325', 'Suihua', '2', '418', '1', null);
INSERT INTO location VALUES ('2326', 'Shangzi', '2', '418', '1', null);
INSERT INTO location VALUES ('2327', 'Qitaihe', '2', '418', '1', null);
INSERT INTO location VALUES ('2328', 'BeiÃƒâ€šÃ‚Â´an', '2', '418', '1', null);
INSERT INTO location VALUES ('2329', 'Acheng', '2', '418', '1', null);
INSERT INTO location VALUES ('2330', 'Zhaodong', '2', '418', '1', null);
INSERT INTO location VALUES ('2331', 'Shuangcheng', '2', '418', '1', null);
INSERT INTO location VALUES ('2332', 'Anda', '2', '418', '1', null);
INSERT INTO location VALUES ('2333', 'Hailun', '2', '418', '1', null);
INSERT INTO location VALUES ('2334', 'Mishan', '2', '418', '1', null);
INSERT INTO location VALUES ('2335', 'Fujin', '2', '418', '1', null);
INSERT INTO location VALUES ('2336', 'Zhengzhou', '2', '419', '1', null);
INSERT INTO location VALUES ('2337', 'Luoyang', '2', '419', '1', null);
INSERT INTO location VALUES ('2338', 'Kaifeng', '2', '419', '1', null);
INSERT INTO location VALUES ('2339', 'Xinxiang', '2', '419', '1', null);
INSERT INTO location VALUES ('2340', 'Anyang', '2', '419', '1', null);
INSERT INTO location VALUES ('2341', 'Pingdingshan', '2', '419', '1', null);
INSERT INTO location VALUES ('2342', 'Jiaozuo', '2', '419', '1', null);
INSERT INTO location VALUES ('2343', 'Nanyang', '2', '419', '1', null);
INSERT INTO location VALUES ('2344', 'Hebi', '2', '419', '1', null);
INSERT INTO location VALUES ('2345', 'Xuchang', '2', '419', '1', null);
INSERT INTO location VALUES ('2346', 'Xinyang', '2', '419', '1', null);
INSERT INTO location VALUES ('2347', 'Puyang', '2', '419', '1', null);
INSERT INTO location VALUES ('2348', 'Shangqiu', '2', '419', '1', null);
INSERT INTO location VALUES ('2349', 'Zhoukou', '2', '419', '1', null);
INSERT INTO location VALUES ('2350', 'Luohe', '2', '419', '1', null);
INSERT INTO location VALUES ('2351', 'Zhumadian', '2', '419', '1', null);
INSERT INTO location VALUES ('2352', 'Sanmenxia', '2', '419', '1', null);
INSERT INTO location VALUES ('2353', 'Yuzhou', '2', '419', '1', null);
INSERT INTO location VALUES ('2354', 'Wuhan', '2', '420', '1', null);
INSERT INTO location VALUES ('2355', 'Huangshi', '2', '420', '1', null);
INSERT INTO location VALUES ('2356', 'Xiangfan', '2', '420', '1', null);
INSERT INTO location VALUES ('2357', 'Yichang', '2', '420', '1', null);
INSERT INTO location VALUES ('2358', 'Shashi', '2', '420', '1', null);
INSERT INTO location VALUES ('2359', 'Shiyan', '2', '420', '1', null);
INSERT INTO location VALUES ('2360', 'Xiantao', '2', '420', '1', null);
INSERT INTO location VALUES ('2361', 'Qianjiang', '2', '420', '1', null);
INSERT INTO location VALUES ('2362', 'Honghu', '2', '420', '1', null);
INSERT INTO location VALUES ('2363', 'Ezhou', '2', '420', '1', null);
INSERT INTO location VALUES ('2364', 'Tianmen', '2', '420', '1', null);
INSERT INTO location VALUES ('2365', 'Xiaogan', '2', '420', '1', null);
INSERT INTO location VALUES ('2366', 'Zaoyang', '2', '420', '1', null);
INSERT INTO location VALUES ('2367', 'Jinmen', '2', '420', '1', null);
INSERT INTO location VALUES ('2368', 'Suizhou', '2', '420', '1', null);
INSERT INTO location VALUES ('2369', 'Xianning', '2', '420', '1', null);
INSERT INTO location VALUES ('2370', 'Laohekou', '2', '420', '1', null);
INSERT INTO location VALUES ('2371', 'Puqi', '2', '420', '1', null);
INSERT INTO location VALUES ('2372', 'Shishou', '2', '420', '1', null);
INSERT INTO location VALUES ('2373', 'Danjiangkou', '2', '420', '1', null);
INSERT INTO location VALUES ('2374', 'Guangshui', '2', '420', '1', null);
INSERT INTO location VALUES ('2375', 'Enshi', '2', '420', '1', null);
INSERT INTO location VALUES ('2376', 'Changsha', '2', '421', '1', null);
INSERT INTO location VALUES ('2377', 'Hengyang', '2', '421', '1', null);
INSERT INTO location VALUES ('2378', 'Xiangtan', '2', '421', '1', null);
INSERT INTO location VALUES ('2379', 'Zhuzhou', '2', '421', '1', null);
INSERT INTO location VALUES ('2380', 'Yueyang', '2', '421', '1', null);
INSERT INTO location VALUES ('2381', 'Changde', '2', '421', '1', null);
INSERT INTO location VALUES ('2382', 'Shaoyang', '2', '421', '1', null);
INSERT INTO location VALUES ('2383', 'Yiyang', '2', '421', '1', null);
INSERT INTO location VALUES ('2384', 'Chenzhou', '2', '421', '1', null);
INSERT INTO location VALUES ('2385', 'Lengshuijiang', '2', '421', '1', null);
INSERT INTO location VALUES ('2386', 'Leiyang', '2', '421', '1', null);
INSERT INTO location VALUES ('2387', 'Loudi', '2', '421', '1', null);
INSERT INTO location VALUES ('2388', 'Huaihua', '2', '421', '1', null);
INSERT INTO location VALUES ('2389', 'Lianyuan', '2', '421', '1', null);
INSERT INTO location VALUES ('2390', 'Hongjiang', '2', '421', '1', null);
INSERT INTO location VALUES ('2391', 'Zixing', '2', '421', '1', null);
INSERT INTO location VALUES ('2392', 'Liling', '2', '421', '1', null);
INSERT INTO location VALUES ('2393', 'Yuanjiang', '2', '421', '1', null);
INSERT INTO location VALUES ('2394', 'Baotou', '2', '422', '1', null);
INSERT INTO location VALUES ('2395', 'Hohhot', '2', '422', '1', null);
INSERT INTO location VALUES ('2396', 'Yakeshi', '2', '422', '1', null);
INSERT INTO location VALUES ('2397', 'Chifeng', '2', '422', '1', null);
INSERT INTO location VALUES ('2398', 'Wuhai', '2', '422', '1', null);
INSERT INTO location VALUES ('2399', 'Tongliao', '2', '422', '1', null);
INSERT INTO location VALUES ('2400', 'Hailar', '2', '422', '1', null);
INSERT INTO location VALUES ('2401', 'Jining', '2', '422', '1', null);
INSERT INTO location VALUES ('2402', 'Ulanhot', '2', '422', '1', null);
INSERT INTO location VALUES ('2403', 'Linhe', '2', '422', '1', null);
INSERT INTO location VALUES ('2404', 'Zalantun', '2', '422', '1', null);
INSERT INTO location VALUES ('2405', 'Manzhouli', '2', '422', '1', null);
INSERT INTO location VALUES ('2406', 'Xilin Hot', '2', '422', '1', null);
INSERT INTO location VALUES ('2407', 'Nanking [Nanjing]', '2', '423', '1', null);
INSERT INTO location VALUES ('2408', 'Wuxi', '2', '423', '1', null);
INSERT INTO location VALUES ('2409', 'Xuzhou', '2', '423', '1', null);
INSERT INTO location VALUES ('2410', 'Suzhou', '2', '423', '1', null);
INSERT INTO location VALUES ('2411', 'Changzhou', '2', '423', '1', null);
INSERT INTO location VALUES ('2412', 'Zhenjiang', '2', '423', '1', null);
INSERT INTO location VALUES ('2413', 'Lianyungang', '2', '423', '1', null);
INSERT INTO location VALUES ('2414', 'Nantong', '2', '423', '1', null);
INSERT INTO location VALUES ('2415', 'Yangzhou', '2', '423', '1', null);
INSERT INTO location VALUES ('2416', 'Yancheng', '2', '423', '1', null);
INSERT INTO location VALUES ('2417', 'Huaiyin', '2', '423', '1', null);
INSERT INTO location VALUES ('2418', 'Jiangyin', '2', '423', '1', null);
INSERT INTO location VALUES ('2419', 'Yixing', '2', '423', '1', null);
INSERT INTO location VALUES ('2420', 'Dongtai', '2', '423', '1', null);
INSERT INTO location VALUES ('2421', 'Changshu', '2', '423', '1', null);
INSERT INTO location VALUES ('2422', 'Danyang', '2', '423', '1', null);
INSERT INTO location VALUES ('2423', 'Xinghua', '2', '423', '1', null);
INSERT INTO location VALUES ('2424', 'Taizhou', '2', '423', '1', null);
INSERT INTO location VALUES ('2425', 'HuaiÃƒâ€šÃ‚Â´an', '2', '423', '1', null);
INSERT INTO location VALUES ('2426', 'Qidong', '2', '423', '1', null);
INSERT INTO location VALUES ('2427', 'Liyang', '2', '423', '1', null);
INSERT INTO location VALUES ('2428', 'Yizheng', '2', '423', '1', null);
INSERT INTO location VALUES ('2429', 'Suqian', '2', '423', '1', null);
INSERT INTO location VALUES ('2430', 'Kunshan', '2', '423', '1', null);
INSERT INTO location VALUES ('2431', 'Zhangjiagang', '2', '423', '1', null);
INSERT INTO location VALUES ('2432', 'Nanchang', '2', '424', '1', null);
INSERT INTO location VALUES ('2433', 'Pingxiang', '2', '424', '1', null);
INSERT INTO location VALUES ('2434', 'Jiujiang', '2', '424', '1', null);
INSERT INTO location VALUES ('2435', 'Jingdezhen', '2', '424', '1', null);
INSERT INTO location VALUES ('2436', 'Ganzhou', '2', '424', '1', null);
INSERT INTO location VALUES ('2437', 'Fengcheng', '2', '424', '1', null);
INSERT INTO location VALUES ('2438', 'Xinyu', '2', '424', '1', null);
INSERT INTO location VALUES ('2439', 'Yichun', '2', '424', '1', null);
INSERT INTO location VALUES ('2440', 'JiÃƒâ€šÃ‚Â´an', '2', '424', '1', null);
INSERT INTO location VALUES ('2441', 'Shangrao', '2', '424', '1', null);
INSERT INTO location VALUES ('2442', 'Linchuan', '2', '424', '1', null);
INSERT INTO location VALUES ('2443', 'Changchun', '2', '425', '1', null);
INSERT INTO location VALUES ('2444', 'Jilin', '2', '425', '1', null);
INSERT INTO location VALUES ('2445', 'Hunjiang', '2', '425', '1', null);
INSERT INTO location VALUES ('2446', 'Liaoyuan', '2', '425', '1', null);
INSERT INTO location VALUES ('2447', 'Tonghua', '2', '425', '1', null);
INSERT INTO location VALUES ('2448', 'Siping', '2', '425', '1', null);
INSERT INTO location VALUES ('2449', 'Dunhua', '2', '425', '1', null);
INSERT INTO location VALUES ('2450', 'Yanji', '2', '425', '1', null);
INSERT INTO location VALUES ('2451', 'Gongziling', '2', '425', '1', null);
INSERT INTO location VALUES ('2452', 'Baicheng', '2', '425', '1', null);
INSERT INTO location VALUES ('2453', 'Meihekou', '2', '425', '1', null);
INSERT INTO location VALUES ('2454', 'Fuyu', '2', '425', '1', null);
INSERT INTO location VALUES ('2455', 'Jiutai', '2', '425', '1', null);
INSERT INTO location VALUES ('2456', 'Jiaohe', '2', '425', '1', null);
INSERT INTO location VALUES ('2457', 'Huadian', '2', '425', '1', null);
INSERT INTO location VALUES ('2458', 'Taonan', '2', '425', '1', null);
INSERT INTO location VALUES ('2459', 'Longjing', '2', '425', '1', null);
INSERT INTO location VALUES ('2460', 'DaÃƒâ€šÃ‚Â´an', '2', '425', '1', null);
INSERT INTO location VALUES ('2461', 'Yushu', '2', '425', '1', null);
INSERT INTO location VALUES ('2462', 'Tumen', '2', '425', '1', null);
INSERT INTO location VALUES ('2463', 'Shenyang', '2', '426', '1', null);
INSERT INTO location VALUES ('2464', 'Dalian', '2', '426', '1', null);
INSERT INTO location VALUES ('2465', 'Anshan', '2', '426', '1', null);
INSERT INTO location VALUES ('2466', 'Fushun', '2', '426', '1', null);
INSERT INTO location VALUES ('2467', 'Benxi', '2', '426', '1', null);
INSERT INTO location VALUES ('2468', 'Fuxin', '2', '426', '1', null);
INSERT INTO location VALUES ('2469', 'Jinzhou', '2', '426', '1', null);
INSERT INTO location VALUES ('2470', 'Dandong', '2', '426', '1', null);
INSERT INTO location VALUES ('2471', 'Liaoyang', '2', '426', '1', null);
INSERT INTO location VALUES ('2472', 'Yingkou', '2', '426', '1', null);
INSERT INTO location VALUES ('2473', 'Panjin', '2', '426', '1', null);
INSERT INTO location VALUES ('2474', 'Jinxi', '2', '426', '1', null);
INSERT INTO location VALUES ('2475', 'Tieling', '2', '426', '1', null);
INSERT INTO location VALUES ('2476', 'Wafangdian', '2', '426', '1', null);
INSERT INTO location VALUES ('2477', 'Chaoyang', '2', '426', '1', null);
INSERT INTO location VALUES ('2478', 'Haicheng', '2', '426', '1', null);
INSERT INTO location VALUES ('2479', 'Beipiao', '2', '426', '1', null);
INSERT INTO location VALUES ('2480', 'Tiefa', '2', '426', '1', null);
INSERT INTO location VALUES ('2481', 'Kaiyuan', '2', '426', '1', null);
INSERT INTO location VALUES ('2482', 'Xingcheng', '2', '426', '1', null);
INSERT INTO location VALUES ('2483', 'Jinzhou', '2', '426', '1', null);
INSERT INTO location VALUES ('2484', 'Yinchuan', '2', '427', '1', null);
INSERT INTO location VALUES ('2485', 'Shizuishan', '2', '427', '1', null);
INSERT INTO location VALUES ('2486', 'Peking', '2', '428', '1', null);
INSERT INTO location VALUES ('2487', 'Tong Xian', '2', '428', '1', null);
INSERT INTO location VALUES ('2488', 'Xining', '2', '429', '1', null);
INSERT INTO location VALUES ('2489', 'XiÃƒâ€šÃ‚Â´an', '2', '430', '1', null);
INSERT INTO location VALUES ('2490', 'Xianyang', '2', '430', '1', null);
INSERT INTO location VALUES ('2491', 'Baoji', '2', '430', '1', null);
INSERT INTO location VALUES ('2492', 'Tongchuan', '2', '430', '1', null);
INSERT INTO location VALUES ('2493', 'Hanzhong', '2', '430', '1', null);
INSERT INTO location VALUES ('2494', 'Ankang', '2', '430', '1', null);
INSERT INTO location VALUES ('2495', 'Weinan', '2', '430', '1', null);
INSERT INTO location VALUES ('2496', 'YanÃƒâ€šÃ‚Â´an', '2', '430', '1', null);
INSERT INTO location VALUES ('2497', 'Qingdao', '2', '431', '1', null);
INSERT INTO location VALUES ('2498', 'Jinan', '2', '431', '1', null);
INSERT INTO location VALUES ('2499', 'Zibo', '2', '431', '1', null);
INSERT INTO location VALUES ('2500', 'Yantai', '2', '431', '1', null);
INSERT INTO location VALUES ('2501', 'Weifang', '2', '431', '1', null);
INSERT INTO location VALUES ('2502', 'Zaozhuang', '2', '431', '1', null);
INSERT INTO location VALUES ('2503', 'TaiÃƒâ€šÃ‚Â´an', '2', '431', '1', null);
INSERT INTO location VALUES ('2504', 'Linyi', '2', '431', '1', null);
INSERT INTO location VALUES ('2505', 'Tengzhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2506', 'Dongying', '2', '431', '1', null);
INSERT INTO location VALUES ('2507', 'Xintai', '2', '431', '1', null);
INSERT INTO location VALUES ('2508', 'Jining', '2', '431', '1', null);
INSERT INTO location VALUES ('2509', 'Laiwu', '2', '431', '1', null);
INSERT INTO location VALUES ('2510', 'Liaocheng', '2', '431', '1', null);
INSERT INTO location VALUES ('2511', 'Laizhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2512', 'Dezhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2513', 'Heze', '2', '431', '1', null);
INSERT INTO location VALUES ('2514', 'Rizhao', '2', '431', '1', null);
INSERT INTO location VALUES ('2515', 'Liangcheng', '2', '431', '1', null);
INSERT INTO location VALUES ('2516', 'Jiaozhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2517', 'Pingdu', '2', '431', '1', null);
INSERT INTO location VALUES ('2518', 'Longkou', '2', '431', '1', null);
INSERT INTO location VALUES ('2519', 'Laiyang', '2', '431', '1', null);
INSERT INTO location VALUES ('2520', 'Wendeng', '2', '431', '1', null);
INSERT INTO location VALUES ('2521', 'Binzhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2522', 'Weihai', '2', '431', '1', null);
INSERT INTO location VALUES ('2523', 'Qingzhou', '2', '431', '1', null);
INSERT INTO location VALUES ('2524', 'Linqing', '2', '431', '1', null);
INSERT INTO location VALUES ('2525', 'Jiaonan', '2', '431', '1', null);
INSERT INTO location VALUES ('2526', 'Zhucheng', '2', '431', '1', null);
INSERT INTO location VALUES ('2527', 'Junan', '2', '431', '1', null);
INSERT INTO location VALUES ('2528', 'Pingyi', '2', '431', '1', null);
INSERT INTO location VALUES ('2529', 'Shanghai', '2', '432', '1', null);
INSERT INTO location VALUES ('2530', 'Taiyuan', '2', '433', '1', null);
INSERT INTO location VALUES ('2531', 'Datong', '2', '433', '1', null);
INSERT INTO location VALUES ('2532', 'Yangquan', '2', '433', '1', null);
INSERT INTO location VALUES ('2533', 'Changzhi', '2', '433', '1', null);
INSERT INTO location VALUES ('2534', 'Yuci', '2', '433', '1', null);
INSERT INTO location VALUES ('2535', 'Linfen', '2', '433', '1', null);
INSERT INTO location VALUES ('2536', 'Jincheng', '2', '433', '1', null);
INSERT INTO location VALUES ('2537', 'Yuncheng', '2', '433', '1', null);
INSERT INTO location VALUES ('2538', 'Xinzhou', '2', '433', '1', null);
INSERT INTO location VALUES ('2539', 'Chengdu', '2', '434', '1', null);
INSERT INTO location VALUES ('2540', 'Panzhihua', '2', '434', '1', null);
INSERT INTO location VALUES ('2541', 'Zigong', '2', '434', '1', null);
INSERT INTO location VALUES ('2542', 'Leshan', '2', '434', '1', null);
INSERT INTO location VALUES ('2543', 'Mianyang', '2', '434', '1', null);
INSERT INTO location VALUES ('2544', 'Luzhou', '2', '434', '1', null);
INSERT INTO location VALUES ('2545', 'Neijiang', '2', '434', '1', null);
INSERT INTO location VALUES ('2546', 'Yibin', '2', '434', '1', null);
INSERT INTO location VALUES ('2547', 'Daxian', '2', '434', '1', null);
INSERT INTO location VALUES ('2548', 'Deyang', '2', '434', '1', null);
INSERT INTO location VALUES ('2549', 'Guangyuan', '2', '434', '1', null);
INSERT INTO location VALUES ('2550', 'Nanchong', '2', '434', '1', null);
INSERT INTO location VALUES ('2551', 'Jiangyou', '2', '434', '1', null);
INSERT INTO location VALUES ('2552', 'Fuling', '2', '434', '1', null);
INSERT INTO location VALUES ('2553', 'Wanxian', '2', '434', '1', null);
INSERT INTO location VALUES ('2554', 'Suining', '2', '434', '1', null);
INSERT INTO location VALUES ('2555', 'Xichang', '2', '434', '1', null);
INSERT INTO location VALUES ('2556', 'Dujiangyan', '2', '434', '1', null);
INSERT INTO location VALUES ('2557', 'YaÃƒâ€šÃ‚Â´an', '2', '434', '1', null);
INSERT INTO location VALUES ('2558', 'Emeishan', '2', '434', '1', null);
INSERT INTO location VALUES ('2559', 'Huaying', '2', '434', '1', null);
INSERT INTO location VALUES ('2560', 'Tianjin', '2', '435', '1', null);
INSERT INTO location VALUES ('2561', 'Lhasa', '2', '436', '1', null);
INSERT INTO location VALUES ('2562', 'UrumtÃƒâ€¦Ã‚Â¡i [ÃƒÆ’Ã…â€œrÃƒÆ', '2', '437', '1', null);
INSERT INTO location VALUES ('2563', 'Shihezi', '2', '437', '1', null);
INSERT INTO location VALUES ('2564', 'Qaramay', '2', '437', '1', null);
INSERT INTO location VALUES ('2565', 'Ghulja', '2', '437', '1', null);
INSERT INTO location VALUES ('2566', 'Qashqar', '2', '437', '1', null);
INSERT INTO location VALUES ('2567', 'Aqsu', '2', '437', '1', null);
INSERT INTO location VALUES ('2568', 'Hami', '2', '437', '1', null);
INSERT INTO location VALUES ('2569', 'Korla', '2', '437', '1', null);
INSERT INTO location VALUES ('2570', 'Changji', '2', '437', '1', null);
INSERT INTO location VALUES ('2571', 'Kuytun', '2', '437', '1', null);
INSERT INTO location VALUES ('2572', 'Kunming', '2', '438', '1', null);
INSERT INTO location VALUES ('2573', 'Gejiu', '2', '438', '1', null);
INSERT INTO location VALUES ('2574', 'Qujing', '2', '438', '1', null);
INSERT INTO location VALUES ('2575', 'Dali', '2', '438', '1', null);
INSERT INTO location VALUES ('2576', 'Kaiyuan', '2', '438', '1', null);
INSERT INTO location VALUES ('2577', 'Hangzhou', '2', '439', '1', null);
INSERT INTO location VALUES ('2578', 'Ningbo', '2', '439', '1', null);
INSERT INTO location VALUES ('2579', 'Wenzhou', '2', '439', '1', null);
INSERT INTO location VALUES ('2580', 'Huzhou', '2', '439', '1', null);
INSERT INTO location VALUES ('2581', 'Jiaxing', '2', '439', '1', null);
INSERT INTO location VALUES ('2582', 'Shaoxing', '2', '439', '1', null);
INSERT INTO location VALUES ('2583', 'Xiaoshan', '2', '439', '1', null);
INSERT INTO location VALUES ('2584', 'RuiÃƒâ€šÃ‚Â´an', '2', '439', '1', null);
INSERT INTO location VALUES ('2585', 'Zhoushan', '2', '439', '1', null);
INSERT INTO location VALUES ('2586', 'Jinhua', '2', '439', '1', null);
INSERT INTO location VALUES ('2587', 'Yuyao', '2', '439', '1', null);
INSERT INTO location VALUES ('2588', 'Quzhou', '2', '439', '1', null);
INSERT INTO location VALUES ('2589', 'Cixi', '2', '439', '1', null);
INSERT INTO location VALUES ('2590', 'Haining', '2', '439', '1', null);
INSERT INTO location VALUES ('2591', 'Linhai', '2', '439', '1', null);
INSERT INTO location VALUES ('2592', 'Huangyan', '2', '439', '1', null);
INSERT INTO location VALUES ('2593', 'Abidjan', '2', '440', '1', null);
INSERT INTO location VALUES ('2594', 'BouakÃƒÆ’Ã‚Â©', '2', '441', '1', null);
INSERT INTO location VALUES ('2595', 'Daloa', '2', '442', '1', null);
INSERT INTO location VALUES ('2596', 'Korhogo', '2', '443', '1', null);
INSERT INTO location VALUES ('2597', 'Yamoussoukro', '2', '444', '1', null);
INSERT INTO location VALUES ('2598', 'YaoundÃƒÆ’Ã‚Â©', '2', '445', '1', null);
INSERT INTO location VALUES ('2599', 'Tours', '2', '445', '1', null);
INSERT INTO location VALUES ('2600', 'OrlÃƒÆ’Ã‚Â©ans', '2', '445', '1', null);
INSERT INTO location VALUES ('2601', 'Maroua', '2', '446', '1', null);
INSERT INTO location VALUES ('2602', 'Douala', '2', '447', '1', null);
INSERT INTO location VALUES ('2603', 'Nkongsamba', '2', '447', '1', null);
INSERT INTO location VALUES ('2604', 'Le-Cap-HaÃƒÆ’Ã‚Â¯tien', '2', '448', '1', null);
INSERT INTO location VALUES ('2605', 'Garoua', '2', '448', '1', null);
INSERT INTO location VALUES ('2606', 'Bamenda', '2', '449', '1', null);
INSERT INTO location VALUES ('2607', 'Port-au-Prince', '2', '450', '1', null);
INSERT INTO location VALUES ('2608', 'Carrefour', '2', '450', '1', null);
INSERT INTO location VALUES ('2609', 'Delmas', '2', '450', '1', null);
INSERT INTO location VALUES ('2610', 'Bafoussam', '2', '450', '1', null);
INSERT INTO location VALUES ('2611', 'Kikwit', '2', '451', '1', null);
INSERT INTO location VALUES ('2612', 'Matadi', '2', '452', '1', null);
INSERT INTO location VALUES ('2613', 'Boma', '2', '452', '1', null);
INSERT INTO location VALUES ('2614', 'Mbuji-Mayi', '2', '453', '1', null);
INSERT INTO location VALUES ('2615', 'Mwene-Ditu', '2', '453', '1', null);
INSERT INTO location VALUES ('2616', 'Mbandaka', '2', '454', '1', null);
INSERT INTO location VALUES ('2617', 'Kisangani', '2', '455', '1', null);
INSERT INTO location VALUES ('2618', 'Kinshasa', '2', '456', '1', null);
INSERT INTO location VALUES ('2619', 'Butembo', '2', '457', '1', null);
INSERT INTO location VALUES ('2620', 'Goma', '2', '457', '1', null);
INSERT INTO location VALUES ('2621', 'Lubumbashi', '2', '458', '1', null);
INSERT INTO location VALUES ('2622', 'Kolwezi', '2', '458', '1', null);
INSERT INTO location VALUES ('2623', 'Likasi', '2', '458', '1', null);
INSERT INTO location VALUES ('2624', 'Kalemie', '2', '458', '1', null);
INSERT INTO location VALUES ('2625', 'Bukavu', '2', '459', '1', null);
INSERT INTO location VALUES ('2626', 'Uvira', '2', '459', '1', null);
INSERT INTO location VALUES ('2627', 'Kananga', '2', '460', '1', null);
INSERT INTO location VALUES ('2628', 'Tshikapa', '2', '460', '1', null);
INSERT INTO location VALUES ('2629', 'Brazzaville', '2', '461', '1', null);
INSERT INTO location VALUES ('2630', 'Pointe-Noire', '2', '462', '1', null);
INSERT INTO location VALUES ('2631', 'Avarua', '2', '463', '1', null);
INSERT INTO location VALUES ('2632', 'MedellÃƒÆ’Ã‚Â¬n', '2', '464', '1', null);
INSERT INTO location VALUES ('2633', 'Bello', '2', '464', '1', null);
INSERT INTO location VALUES ('2634', 'ItagÃƒÆ’Ã‚Â¼ÃƒÆ’Ã‚Â¬', '2', '464', '1', null);
INSERT INTO location VALUES ('2635', 'Envigado', '2', '464', '1', null);
INSERT INTO location VALUES ('2636', 'Barranquilla', '2', '465', '1', null);
INSERT INTO location VALUES ('2637', 'Soledad', '2', '465', '1', null);
INSERT INTO location VALUES ('2638', 'Cartagena', '2', '466', '1', null);
INSERT INTO location VALUES ('2639', 'Ciudad Guayana', '2', '466', '1', null);
INSERT INTO location VALUES ('2640', 'Ciudad BolÃƒÆ’Ã‚Â¬var', '2', '466', '1', null);
INSERT INTO location VALUES ('2641', 'Tunja', '2', '467', '1', null);
INSERT INTO location VALUES ('2642', 'Sogamoso', '2', '467', '1', null);
INSERT INTO location VALUES ('2643', 'Manizales', '2', '468', '1', null);
INSERT INTO location VALUES ('2644', 'Florencia', '2', '469', '1', null);
INSERT INTO location VALUES ('2645', 'PopayÃƒÆ’Ã‚Â¡n', '2', '470', '1', null);
INSERT INTO location VALUES ('2646', 'CÃƒÆ’Ã‚Â³rdoba', '2', '471', '1', null);
INSERT INTO location VALUES ('2647', 'RÃƒÆ’Ã‚Â¬o Cuarto', '2', '471', '1', null);
INSERT INTO location VALUES ('2648', 'MonterÃƒÆ’Ã‚Â¬a', '2', '471', '1', null);
INSERT INTO location VALUES ('2649', 'Valledupar', '2', '472', '1', null);
INSERT INTO location VALUES ('2650', 'Soacha', '2', '473', '1', null);
INSERT INTO location VALUES ('2651', 'Girardot', '2', '473', '1', null);
INSERT INTO location VALUES ('2652', 'Neiva', '2', '474', '1', null);
INSERT INTO location VALUES ('2653', 'Maicao', '2', '475', '1', null);
INSERT INTO location VALUES ('2654', 'Santa Marta', '2', '476', '1', null);
INSERT INTO location VALUES ('2655', 'Villavicencio', '2', '477', '1', null);
INSERT INTO location VALUES ('2656', 'Pasto', '2', '478', '1', null);
INSERT INTO location VALUES ('2657', 'CÃƒÆ’Ã‚Âºcuta', '2', '479', '1', null);
INSERT INTO location VALUES ('2658', 'Armenia', '2', '480', '1', null);
INSERT INTO location VALUES ('2659', 'Pereira', '2', '481', '1', null);
INSERT INTO location VALUES ('2660', 'Dos Quebradas', '2', '481', '1', null);
INSERT INTO location VALUES ('2661', 'SantafÃƒÆ’Ã‚Â© de BogotÃƒÆ’Ã‚Â', '2', '482', '1', null);
INSERT INTO location VALUES ('2662', 'Bucaramanga', '2', '483', '1', null);
INSERT INTO location VALUES ('2663', 'Floridablanca', '2', '483', '1', null);
INSERT INTO location VALUES ('2664', 'Barrancabermeja', '2', '483', '1', null);
INSERT INTO location VALUES ('2665', 'Giron', '2', '483', '1', null);
INSERT INTO location VALUES ('2666', 'Sincelejo', '2', '484', '1', null);
INSERT INTO location VALUES ('2667', 'CumanÃƒÆ’Ã‚Â¡', '2', '484', '1', null);
INSERT INTO location VALUES ('2668', 'CarÃƒÆ’Ã‚Âºpano', '2', '484', '1', null);
INSERT INTO location VALUES ('2669', 'IbaguÃƒÆ’Ã‚Â©', '2', '485', '1', null);
INSERT INTO location VALUES ('2670', 'Cali', '2', '486', '1', null);
INSERT INTO location VALUES ('2671', 'Palmira', '2', '486', '1', null);
INSERT INTO location VALUES ('2672', 'Buenaventura', '2', '486', '1', null);
INSERT INTO location VALUES ('2673', 'TuluÃƒÆ’Ã‚Â¡', '2', '486', '1', null);
INSERT INTO location VALUES ('2674', 'Cartago', '2', '486', '1', null);
INSERT INTO location VALUES ('2675', 'Buga', '2', '486', '1', null);
INSERT INTO location VALUES ('2676', 'Moroni', '2', '487', '1', null);
INSERT INTO location VALUES ('2677', 'Praia', '2', '488', '1', null);
INSERT INTO location VALUES ('2678', 'San JosÃƒÆ’Ã‚Â©', '2', '489', '1', null);
INSERT INTO location VALUES ('2679', 'CamagÃƒÆ’Ã‚Â¼ey', '2', '490', '1', null);
INSERT INTO location VALUES ('2680', 'Ciego de ÃƒÆ’Ã‚Âvila', '2', '491', '1', null);
INSERT INTO location VALUES ('2681', 'Cienfuegos', '2', '492', '1', null);
INSERT INTO location VALUES ('2682', 'Bayamo', '2', '493', '1', null);
INSERT INTO location VALUES ('2683', 'Manzanillo', '2', '493', '1', null);
INSERT INTO location VALUES ('2684', 'GuantÃƒÆ’Ã‚Â¡namo', '2', '494', '1', null);
INSERT INTO location VALUES ('2685', 'HolguÃƒÆ’Ã‚Â¬n', '2', '495', '1', null);
INSERT INTO location VALUES ('2686', 'La Habana', '2', '496', '1', null);
INSERT INTO location VALUES ('2687', 'Victoria de las Tunas', '2', '497', '1', null);
INSERT INTO location VALUES ('2688', 'Matanzas', '2', '498', '1', null);
INSERT INTO location VALUES ('2689', 'Pinar del RÃƒÆ’Ã‚Â¬o', '2', '499', '1', null);
INSERT INTO location VALUES ('2690', 'Sancti-SpÃƒÆ’Ã‚Â¬ritus', '2', '500', '1', null);
INSERT INTO location VALUES ('2691', 'Santiago de Cuba', '2', '501', '1', null);
INSERT INTO location VALUES ('2692', 'Santa Clara', '2', '502', '1', null);
INSERT INTO location VALUES ('2693', 'South Hill', '2', '503', '1', null);
INSERT INTO location VALUES ('2694', 'The Valley', '2', '503', '1', null);
INSERT INTO location VALUES ('2695', 'Oranjestad', '2', '503', '1', null);
INSERT INTO location VALUES ('2696', 'Douglas', '2', '503', '1', null);
INSERT INTO location VALUES ('2697', 'Gibraltar', '2', '503', '1', null);
INSERT INTO location VALUES ('2698', 'Tamuning', '2', '503', '1', null);
INSERT INTO location VALUES ('2699', 'AgaÃƒÆ’Ã‚Â±a', '2', '503', '1', null);
INSERT INTO location VALUES ('2700', 'Flying Fish Cove', '2', '503', '1', null);
INSERT INTO location VALUES ('2701', 'Monte-Carlo', '2', '503', '1', null);
INSERT INTO location VALUES ('2702', 'Monaco-Ville', '2', '503', '1', null);
INSERT INTO location VALUES ('2703', 'Yangor', '2', '503', '1', null);
INSERT INTO location VALUES ('2704', 'Yaren', '2', '503', '1', null);
INSERT INTO location VALUES ('2705', 'Alofi', '2', '503', '1', null);
INSERT INTO location VALUES ('2706', 'Kingston', '2', '503', '1', null);
INSERT INTO location VALUES ('2707', 'Adamstown', '2', '503', '1', null);
INSERT INTO location VALUES ('2708', 'Singapore', '2', '503', '1', null);
INSERT INTO location VALUES ('2709', 'NoumÃƒÆ’Ã‚Â©a', '2', '503', '1', null);
INSERT INTO location VALUES ('2710', 'CittÃƒÆ’  del Vaticano', '2', '503', '1', null);
INSERT INTO location VALUES ('2711', 'George Town', '2', '504', '1', null);
INSERT INTO location VALUES ('2712', 'Limassol', '2', '505', '1', null);
INSERT INTO location VALUES ('2713', 'Nicosia', '2', '506', '1', null);
INSERT INTO location VALUES ('2714', 'Praha', '2', '507', '1', null);
INSERT INTO location VALUES ('2715', 'CeskÃƒÆ’Ã‚Â© Budejovice', '2', '508', '1', null);
INSERT INTO location VALUES ('2716', 'Brno', '2', '509', '1', null);
INSERT INTO location VALUES ('2717', 'Liberec', '2', '510', '1', null);
INSERT INTO location VALUES ('2718', 'ÃƒÆ’Ã…Â¡stÃƒÆ’Ã‚Â¬ nad Labem', '2', '510', '1', null);
INSERT INTO location VALUES ('2719', 'Ostrava', '2', '511', '1', null);
INSERT INTO location VALUES ('2720', 'Olomouc', '2', '511', '1', null);
INSERT INTO location VALUES ('2721', 'Hradec KrÃƒÆ’Ã‚Â¡lovÃƒÆ’Ã‚Â©', '2', '512', '1', null);
INSERT INTO location VALUES ('2722', 'Pardubice', '2', '512', '1', null);
INSERT INTO location VALUES ('2723', 'Plzen', '2', '513', '1', null);
INSERT INTO location VALUES ('2724', 'Halle/Saale', '2', '514', '1', null);
INSERT INTO location VALUES ('2725', 'Magdeburg', '2', '514', '1', null);
INSERT INTO location VALUES ('2726', 'Stuttgart', '2', '515', '1', null);
INSERT INTO location VALUES ('2727', 'Mannheim', '2', '515', '1', null);
INSERT INTO location VALUES ('2728', 'Karlsruhe', '2', '515', '1', null);
INSERT INTO location VALUES ('2729', 'Freiburg im Breisgau', '2', '515', '1', null);
INSERT INTO location VALUES ('2730', 'Heidelberg', '2', '515', '1', null);
INSERT INTO location VALUES ('2731', 'Heilbronn', '2', '515', '1', null);
INSERT INTO location VALUES ('2732', 'Pforzheim', '2', '515', '1', null);
INSERT INTO location VALUES ('2733', 'Ulm', '2', '515', '1', null);
INSERT INTO location VALUES ('2734', 'Reutlingen', '2', '515', '1', null);
INSERT INTO location VALUES ('2735', 'Esslingen am Neckar', '2', '515', '1', null);
INSERT INTO location VALUES ('2736', 'Munich [MÃƒÆ’Ã‚Â¼nchen]', '2', '516', '1', null);
INSERT INTO location VALUES ('2737', 'NÃƒÆ’Ã‚Â¼rnberg', '2', '516', '1', null);
INSERT INTO location VALUES ('2738', 'Augsburg', '2', '516', '1', null);
INSERT INTO location VALUES ('2739', 'WÃƒÆ’Ã‚Â¼rzburg', '2', '516', '1', null);
INSERT INTO location VALUES ('2740', 'Regensburg', '2', '516', '1', null);
INSERT INTO location VALUES ('2741', 'Ingolstadt', '2', '516', '1', null);
INSERT INTO location VALUES ('2742', 'FÃƒÆ’Ã‚Â¼rth', '2', '516', '1', null);
INSERT INTO location VALUES ('2743', 'Erlangen', '2', '516', '1', null);
INSERT INTO location VALUES ('2744', 'Berlin', '2', '517', '1', null);
INSERT INTO location VALUES ('2745', 'Potsdam', '2', '518', '1', null);
INSERT INTO location VALUES ('2746', 'Cottbus', '2', '518', '1', null);
INSERT INTO location VALUES ('2747', 'Bremen', '2', '519', '1', null);
INSERT INTO location VALUES ('2748', 'Bremerhaven', '2', '519', '1', null);
INSERT INTO location VALUES ('2749', 'Hamburg', '2', '520', '1', null);
INSERT INTO location VALUES ('2750', 'Frankfurt am Main', '2', '521', '1', null);
INSERT INTO location VALUES ('2751', 'Wiesbaden', '2', '521', '1', null);
INSERT INTO location VALUES ('2752', 'Kassel', '2', '521', '1', null);
INSERT INTO location VALUES ('2753', 'Darmstadt', '2', '521', '1', null);
INSERT INTO location VALUES ('2754', 'Offenbach am Main', '2', '521', '1', null);
INSERT INTO location VALUES ('2755', 'Rostock', '2', '522', '1', null);
INSERT INTO location VALUES ('2756', 'Schwerin', '2', '522', '1', null);
INSERT INTO location VALUES ('2757', 'Hannover', '2', '523', '1', null);
INSERT INTO location VALUES ('2758', 'Braunschweig', '2', '523', '1', null);
INSERT INTO location VALUES ('2759', 'OsnabrÃƒÆ’Ã‚Â¼ck', '2', '523', '1', null);
INSERT INTO location VALUES ('2760', 'Oldenburg', '2', '523', '1', null);
INSERT INTO location VALUES ('2761', 'GÃƒÆ’Ã‚Â¶ttingen', '2', '523', '1', null);
INSERT INTO location VALUES ('2762', 'Wolfsburg', '2', '523', '1', null);
INSERT INTO location VALUES ('2763', 'Salzgitter', '2', '523', '1', null);
INSERT INTO location VALUES ('2764', 'Hildesheim', '2', '523', '1', null);
INSERT INTO location VALUES ('2765', 'KÃƒÆ’Ã‚Â¶ln', '2', '524', '1', null);
INSERT INTO location VALUES ('2766', 'Essen', '2', '524', '1', null);
INSERT INTO location VALUES ('2767', 'Dortmund', '2', '524', '1', null);
INSERT INTO location VALUES ('2768', 'DÃƒÆ’Ã‚Â¼sseldorf', '2', '524', '1', null);
INSERT INTO location VALUES ('2769', 'Duisburg', '2', '524', '1', null);
INSERT INTO location VALUES ('2770', 'Bochum', '2', '524', '1', null);
INSERT INTO location VALUES ('2771', 'Wuppertal', '2', '524', '1', null);
INSERT INTO location VALUES ('2772', 'Bielefeld', '2', '524', '1', null);
INSERT INTO location VALUES ('2773', 'Bonn', '2', '524', '1', null);
INSERT INTO location VALUES ('2774', 'Gelsenkirchen', '2', '524', '1', null);
INSERT INTO location VALUES ('2775', 'MÃƒÆ’Ã‚Â¼nster', '2', '524', '1', null);
INSERT INTO location VALUES ('2776', 'MÃƒÆ’Ã‚Â¶nchengladbach', '2', '524', '1', null);
INSERT INTO location VALUES ('2777', 'Aachen', '2', '524', '1', null);
INSERT INTO location VALUES ('2778', 'Krefeld', '2', '524', '1', null);
INSERT INTO location VALUES ('2779', 'Oberhausen', '2', '524', '1', null);
INSERT INTO location VALUES ('2780', 'Hagen', '2', '524', '1', null);
INSERT INTO location VALUES ('2781', 'Hamm', '2', '524', '1', null);
INSERT INTO location VALUES ('2782', 'Herne', '2', '524', '1', null);
INSERT INTO location VALUES ('2783', 'MÃƒÆ’Ã‚Â¼lheim an der Ruhr', '2', '524', '1', null);
INSERT INTO location VALUES ('2784', 'Solingen', '2', '524', '1', null);
INSERT INTO location VALUES ('2785', 'Leverkusen', '2', '524', '1', null);
INSERT INTO location VALUES ('2786', 'Neuss', '2', '524', '1', null);
INSERT INTO location VALUES ('2787', 'Paderborn', '2', '524', '1', null);
INSERT INTO location VALUES ('2788', 'Recklinghausen', '2', '524', '1', null);
INSERT INTO location VALUES ('2789', 'Bottrop', '2', '524', '1', null);
INSERT INTO location VALUES ('2790', 'Remscheid', '2', '524', '1', null);
INSERT INTO location VALUES ('2791', 'Siegen', '2', '524', '1', null);
INSERT INTO location VALUES ('2792', 'Moers', '2', '524', '1', null);
INSERT INTO location VALUES ('2793', 'Bergisch Gladbach', '2', '524', '1', null);
INSERT INTO location VALUES ('2794', 'Witten', '2', '524', '1', null);
INSERT INTO location VALUES ('2795', 'Iserlohn', '2', '524', '1', null);
INSERT INTO location VALUES ('2796', 'GÃƒÆ’Ã‚Â¼tersloh', '2', '524', '1', null);
INSERT INTO location VALUES ('2797', 'Marl', '2', '524', '1', null);
INSERT INTO location VALUES ('2798', 'LÃƒÆ’Ã‚Â¼nen', '2', '524', '1', null);
INSERT INTO location VALUES ('2799', 'DÃƒÆ’Ã‚Â¼ren', '2', '524', '1', null);
INSERT INTO location VALUES ('2800', 'Ratingen', '2', '524', '1', null);
INSERT INTO location VALUES ('2801', 'Velbert', '2', '524', '1', null);
INSERT INTO location VALUES ('2802', 'Mainz', '2', '525', '1', null);
INSERT INTO location VALUES ('2803', 'Ludwigshafen am Rhein', '2', '525', '1', null);
INSERT INTO location VALUES ('2804', 'Koblenz', '2', '525', '1', null);
INSERT INTO location VALUES ('2805', 'Kaiserslautern', '2', '525', '1', null);
INSERT INTO location VALUES ('2806', 'Trier', '2', '525', '1', null);
INSERT INTO location VALUES ('2807', 'SaarbrÃƒÆ’Ã‚Â¼cken', '2', '526', '1', null);
INSERT INTO location VALUES ('2808', 'Leipzig', '2', '527', '1', null);
INSERT INTO location VALUES ('2809', 'Dresden', '2', '527', '1', null);
INSERT INTO location VALUES ('2810', 'Chemnitz', '2', '527', '1', null);
INSERT INTO location VALUES ('2811', 'Zwickau', '2', '527', '1', null);
INSERT INTO location VALUES ('2812', 'Kiel', '2', '528', '1', null);
INSERT INTO location VALUES ('2813', 'LÃƒÆ’Ã‚Â¼beck', '2', '528', '1', null);
INSERT INTO location VALUES ('2814', 'Erfurt', '2', '529', '1', null);
INSERT INTO location VALUES ('2815', 'Gera', '2', '529', '1', null);
INSERT INTO location VALUES ('2816', 'Jena', '2', '529', '1', null);
INSERT INTO location VALUES ('2817', 'Djibouti', '2', '530', '1', null);
INSERT INTO location VALUES ('2818', 'Roseau', '2', '531', '1', null);
INSERT INTO location VALUES ('2819', 'Saint GeorgeÃƒâ€šÃ‚Â´s', '2', '531', '1', null);
INSERT INTO location VALUES ('2820', 'Kingstown', '2', '531', '1', null);
INSERT INTO location VALUES ('2821', 'ÃƒÆ’Ã¢â‚¬Â¦rhus', '2', '532', '1', null);
INSERT INTO location VALUES ('2822', 'Frederiksberg', '2', '533', '1', null);
INSERT INTO location VALUES ('2823', 'Odense', '2', '534', '1', null);
INSERT INTO location VALUES ('2824', 'KÃƒÆ’Ã‚Â¸benhavn', '2', '535', '1', null);
INSERT INTO location VALUES ('2825', 'Aalborg', '2', '536', '1', null);
INSERT INTO location VALUES ('2826', 'Santo Domingo de GuzmÃƒÆ’Ã‚Â¡n', '2', '537', '1', null);
INSERT INTO location VALUES ('2827', 'San Francisco de MacorÃƒÆ’Ã‚Â¬', '2', '538', '1', null);
INSERT INTO location VALUES ('2828', 'La Romana', '2', '539', '1', null);
INSERT INTO location VALUES ('2829', 'San Felipe de Puerto Plata', '2', '540', '1', null);
INSERT INTO location VALUES ('2830', 'San Pedro de MacorÃƒÆ’Ã‚Â¬s', '2', '541', '1', null);
INSERT INTO location VALUES ('2831', 'Santiago de Chile', '2', '542', '1', null);
INSERT INTO location VALUES ('2832', 'Puente Alto', '2', '542', '1', null);
INSERT INTO location VALUES ('2833', 'San Bernardo', '2', '542', '1', null);
INSERT INTO location VALUES ('2834', 'Melipilla', '2', '542', '1', null);
INSERT INTO location VALUES ('2835', 'Santiago de los Caballeros', '2', '542', '1', null);
INSERT INTO location VALUES ('2836', 'Alger', '2', '543', '1', null);
INSERT INTO location VALUES ('2837', 'Annaba', '2', '544', '1', null);
INSERT INTO location VALUES ('2838', 'Batna', '2', '545', '1', null);
INSERT INTO location VALUES ('2839', 'BÃƒÆ’Ã‚Â©char', '2', '546', '1', null);
INSERT INTO location VALUES ('2840', 'BÃƒÆ’Ã‚Â©jaÃƒÆ’Ã‚Â¯a', '2', '547', '1', null);
INSERT INTO location VALUES ('2841', 'Biskra', '2', '548', '1', null);
INSERT INTO location VALUES ('2842', 'Blida (el-Boulaida)', '2', '549', '1', null);
INSERT INTO location VALUES ('2843', 'Ech-Chleff (el-Asnam)', '2', '550', '1', null);
INSERT INTO location VALUES ('2844', 'Constantine', '2', '551', '1', null);
INSERT INTO location VALUES ('2845', 'GhardaÃƒÆ’Ã‚Â¯a', '2', '552', '1', null);
INSERT INTO location VALUES ('2846', 'Mostaganem', '2', '553', '1', null);
INSERT INTO location VALUES ('2847', 'Oran', '2', '554', '1', null);
INSERT INTO location VALUES ('2848', 'SÃƒÆ’Ã‚Â©tif', '2', '555', '1', null);
INSERT INTO location VALUES ('2849', 'Sidi Bel AbbÃƒÆ’Ã‚Â¨s', '2', '556', '1', null);
INSERT INTO location VALUES ('2850', 'Skikda', '2', '557', '1', null);
INSERT INTO location VALUES ('2851', 'TÃƒÆ’Ã‚Â©bessa', '2', '558', '1', null);
INSERT INTO location VALUES ('2852', 'Tiaret', '2', '559', '1', null);
INSERT INTO location VALUES ('2853', 'Tlemcen (Tilimsen)', '2', '560', '1', null);
INSERT INTO location VALUES ('2854', 'Cuenca', '2', '561', '1', null);
INSERT INTO location VALUES ('2855', 'RÃƒÆ’Ã‚Â¬obamba', '2', '562', '1', null);
INSERT INTO location VALUES ('2856', 'Machala', '2', '563', '1', null);
INSERT INTO location VALUES ('2857', 'Esmeraldas', '2', '564', '1', null);
INSERT INTO location VALUES ('2858', 'Guayaquil', '2', '565', '1', null);
INSERT INTO location VALUES ('2859', 'Duran [Eloy Alfaro]', '2', '565', '1', null);
INSERT INTO location VALUES ('2860', 'Milagro', '2', '565', '1', null);
INSERT INTO location VALUES ('2861', 'Ibarra', '2', '566', '1', null);
INSERT INTO location VALUES ('2862', 'Loja', '2', '567', '1', null);
INSERT INTO location VALUES ('2863', 'Quevedo', '2', '568', '1', null);
INSERT INTO location VALUES ('2864', 'Portoviejo', '2', '569', '1', null);
INSERT INTO location VALUES ('2865', 'Manta', '2', '569', '1', null);
INSERT INTO location VALUES ('2866', 'Quito', '2', '570', '1', null);
INSERT INTO location VALUES ('2867', 'Santo Domingo de los Colorados', '2', '570', '1', null);
INSERT INTO location VALUES ('2868', 'Ambato', '2', '571', '1', null);
INSERT INTO location VALUES ('2869', 'Kafr al-Dawwar', '2', '572', '1', null);
INSERT INTO location VALUES ('2870', 'Damanhur', '2', '572', '1', null);
INSERT INTO location VALUES ('2871', 'al-Mansura', '2', '573', '1', null);
INSERT INTO location VALUES ('2872', 'Mit Ghamr', '2', '573', '1', null);
INSERT INTO location VALUES ('2873', 'Talkha', '2', '573', '1', null);
INSERT INTO location VALUES ('2874', 'al-Faiyum', '2', '574', '1', null);
INSERT INTO location VALUES ('2875', 'al-Mahallat al-Kubra', '2', '575', '1', null);
INSERT INTO location VALUES ('2876', 'Tanta', '2', '575', '1', null);
INSERT INTO location VALUES ('2877', 'Shibin al-Kawm', '2', '576', '1', null);
INSERT INTO location VALUES ('2878', 'al-Minya', '2', '577', '1', null);
INSERT INTO location VALUES ('2879', 'Mallawi', '2', '577', '1', null);
INSERT INTO location VALUES ('2880', 'Shubra al-Khayma', '2', '578', '1', null);
INSERT INTO location VALUES ('2881', 'Bahtim', '2', '578', '1', null);
INSERT INTO location VALUES ('2882', 'Banha', '2', '578', '1', null);
INSERT INTO location VALUES ('2883', 'Qalyub', '2', '578', '1', null);
INSERT INTO location VALUES ('2884', 'Zagazig', '2', '579', '1', null);
INSERT INTO location VALUES ('2885', 'Bilbays', '2', '579', '1', null);
INSERT INTO location VALUES ('2886', 'al-Dammam', '2', '579', '1', null);
INSERT INTO location VALUES ('2887', 'al-Hufuf', '2', '579', '1', null);
INSERT INTO location VALUES ('2888', 'al-Mubarraz', '2', '579', '1', null);
INSERT INTO location VALUES ('2889', 'al-Khubar', '2', '579', '1', null);
INSERT INTO location VALUES ('2890', 'Jubayl', '2', '579', '1', null);
INSERT INTO location VALUES ('2891', 'Hafar al-Batin', '2', '579', '1', null);
INSERT INTO location VALUES ('2892', 'al-Tuqba', '2', '579', '1', null);
INSERT INTO location VALUES ('2893', 'al-Qatif', '2', '579', '1', null);
INSERT INTO location VALUES ('2894', 'Alexandria', '2', '580', '1', null);
INSERT INTO location VALUES ('2895', 'Assuan', '2', '581', '1', null);
INSERT INTO location VALUES ('2896', 'Asyut', '2', '582', '1', null);
INSERT INTO location VALUES ('2897', 'Bani Suwayf', '2', '583', '1', null);
INSERT INTO location VALUES ('2898', 'Giza', '2', '584', '1', null);
INSERT INTO location VALUES ('2899', 'Bulaq al-Dakrur', '2', '584', '1', null);
INSERT INTO location VALUES ('2900', 'Warraq al-Arab', '2', '584', '1', null);
INSERT INTO location VALUES ('2901', 'al-Hawamidiya', '2', '584', '1', null);
INSERT INTO location VALUES ('2902', 'Ismailia', '2', '585', '1', null);
INSERT INTO location VALUES ('2903', 'Kafr al-Shaykh', '2', '586', '1', null);
INSERT INTO location VALUES ('2904', 'Disuq', '2', '586', '1', null);
INSERT INTO location VALUES ('2905', 'Cairo', '2', '587', '1', null);
INSERT INTO location VALUES ('2906', 'Luxor', '2', '588', '1', null);
INSERT INTO location VALUES ('2907', 'Port Said', '2', '589', '1', null);
INSERT INTO location VALUES ('2908', 'Qina', '2', '590', '1', null);
INSERT INTO location VALUES ('2909', 'Idfu', '2', '590', '1', null);
INSERT INTO location VALUES ('2910', 'Sawhaj', '2', '591', '1', null);
INSERT INTO location VALUES ('2911', 'Jirja', '2', '591', '1', null);
INSERT INTO location VALUES ('2912', 'al-Arish', '2', '592', '1', null);
INSERT INTO location VALUES ('2913', 'Suez', '2', '593', '1', null);
INSERT INTO location VALUES ('2914', 'Asmara', '2', '594', '1', null);
INSERT INTO location VALUES ('2915', 'El-AaiÃƒÆ’Ã‚Âºn', '2', '595', '1', null);
INSERT INTO location VALUES ('2916', 'Sevilla', '2', '596', '1', null);
INSERT INTO location VALUES ('2917', 'MÃƒÆ’Ã‚Â¡laga', '2', '596', '1', null);
INSERT INTO location VALUES ('2918', 'CÃƒÆ’Ã‚Â³rdoba', '2', '596', '1', null);
INSERT INTO location VALUES ('2919', 'Granada', '2', '596', '1', null);
INSERT INTO location VALUES ('2920', 'Jerez de la Frontera', '2', '596', '1', null);
INSERT INTO location VALUES ('2921', 'AlmerÃƒÆ’Ã‚Â¬a', '2', '596', '1', null);
INSERT INTO location VALUES ('2922', 'CÃƒÆ’Ã‚Â¡diz', '2', '596', '1', null);
INSERT INTO location VALUES ('2923', 'Huelva', '2', '596', '1', null);
INSERT INTO location VALUES ('2924', 'JaÃƒÆ’Ã‚Â©n', '2', '596', '1', null);
INSERT INTO location VALUES ('2925', 'Algeciras', '2', '596', '1', null);
INSERT INTO location VALUES ('2926', 'Marbella', '2', '596', '1', null);
INSERT INTO location VALUES ('2927', 'Dos Hermanas', '2', '596', '1', null);
INSERT INTO location VALUES ('2928', 'Zaragoza', '2', '597', '1', null);
INSERT INTO location VALUES ('2929', 'GijÃƒÆ’Ã‚Â³n', '2', '598', '1', null);
INSERT INTO location VALUES ('2930', 'Oviedo', '2', '598', '1', null);
INSERT INTO location VALUES ('2931', 'Palma de Mallorca', '2', '599', '1', null);
INSERT INTO location VALUES ('2932', 'Bilbao', '2', '600', '1', null);
INSERT INTO location VALUES ('2933', 'Vitoria-Gasteiz', '2', '600', '1', null);
INSERT INTO location VALUES ('2934', 'Donostia-San SebastiÃƒÆ’Ã‚Â¡n', '2', '600', '1', null);
INSERT INTO location VALUES ('2935', 'Barakaldo', '2', '600', '1', null);
INSERT INTO location VALUES ('2936', 'Las Palmas de Gran Canaria', '2', '601', '1', null);
INSERT INTO location VALUES ('2937', 'Santa Cruz de Tenerife', '2', '601', '1', null);
INSERT INTO location VALUES ('2938', '[San CristÃƒÆ’Ã‚Â³bal de] la L', '2', '601', '1', null);
INSERT INTO location VALUES ('2939', 'Santander', '2', '602', '1', null);
INSERT INTO location VALUES ('2940', 'Valladolid', '2', '603', '1', null);
INSERT INTO location VALUES ('2941', 'Burgos', '2', '603', '1', null);
INSERT INTO location VALUES ('2942', 'Salamanca', '2', '603', '1', null);
INSERT INTO location VALUES ('2943', 'LeÃƒÆ’Ã‚Â³n', '2', '603', '1', null);
INSERT INTO location VALUES ('2944', 'Badajoz', '2', '604', '1', null);
INSERT INTO location VALUES ('2945', 'Vigo', '2', '605', '1', null);
INSERT INTO location VALUES ('2946', 'A CoruÃƒÆ’Ã‚Â±a (La CoruÃƒÆ’Ã‚', '2', '605', '1', null);
INSERT INTO location VALUES ('2947', 'Ourense (Orense)', '2', '605', '1', null);
INSERT INTO location VALUES ('2948', 'Santiago de Compostela', '2', '605', '1', null);
INSERT INTO location VALUES ('2949', 'Albacete', '2', '606', '1', null);
INSERT INTO location VALUES ('2950', 'Barcelona', '2', '607', '1', null);
INSERT INTO location VALUES ('2951', 'LÃƒâ€šÃ‚Â´Hospitalet de Llobre', '2', '607', '1', null);
INSERT INTO location VALUES ('2952', 'Badalona', '2', '607', '1', null);
INSERT INTO location VALUES ('2953', 'Sabadell', '2', '607', '1', null);
INSERT INTO location VALUES ('2954', 'Terrassa', '2', '607', '1', null);
INSERT INTO location VALUES ('2955', 'Santa Coloma de Gramenet', '2', '607', '1', null);
INSERT INTO location VALUES ('2956', 'Tarragona', '2', '607', '1', null);
INSERT INTO location VALUES ('2957', 'Lleida (LÃƒÆ’Ã‚Â©rida)', '2', '607', '1', null);
INSERT INTO location VALUES ('2958', 'MatarÃƒÆ’Ã‚Â³', '2', '607', '1', null);
INSERT INTO location VALUES ('2959', 'La Rioja', '2', '608', '1', null);
INSERT INTO location VALUES ('2960', 'LogroÃƒÆ’Ã‚Â±o', '2', '608', '1', null);
INSERT INTO location VALUES ('2961', 'Madrid', '2', '609', '1', null);
INSERT INTO location VALUES ('2962', 'MÃƒÆ’Ã‚Â³stoles', '2', '609', '1', null);
INSERT INTO location VALUES ('2963', 'LeganÃƒÆ’Ã‚Â©s', '2', '609', '1', null);
INSERT INTO location VALUES ('2964', 'Fuenlabrada', '2', '609', '1', null);
INSERT INTO location VALUES ('2965', 'AlcalÃƒÆ’Ã‚Â¡ de Henares', '2', '609', '1', null);
INSERT INTO location VALUES ('2966', 'Getafe', '2', '609', '1', null);
INSERT INTO location VALUES ('2967', 'AlcorcÃƒÆ’Ã‚Â³n', '2', '609', '1', null);
INSERT INTO location VALUES ('2968', 'TorrejÃƒÆ’Ã‚Â³n de Ardoz', '2', '609', '1', null);
INSERT INTO location VALUES ('2969', 'Murcia', '2', '610', '1', null);
INSERT INTO location VALUES ('2970', 'Cartagena', '2', '610', '1', null);
INSERT INTO location VALUES ('2971', 'Pamplona [IruÃƒÆ’Ã‚Â±a]', '2', '611', '1', null);
INSERT INTO location VALUES ('2972', 'Valencia', '2', '612', '1', null);
INSERT INTO location VALUES ('2973', 'Alicante [Alacant]', '2', '612', '1', null);
INSERT INTO location VALUES ('2974', 'Elche [Elx]', '2', '612', '1', null);
INSERT INTO location VALUES ('2975', 'CastellÃƒÆ’Ã‚Â³n de la Plana [', '2', '612', '1', null);
INSERT INTO location VALUES ('2976', 'Tallinn', '2', '613', '1', null);
INSERT INTO location VALUES ('2977', 'Tartu', '2', '614', '1', null);
INSERT INTO location VALUES ('2978', 'Addis Abeba', '2', '615', '1', null);
INSERT INTO location VALUES ('2979', 'Gonder', '2', '616', '1', null);
INSERT INTO location VALUES ('2980', 'Dese', '2', '616', '1', null);
INSERT INTO location VALUES ('2981', 'Bahir Dar', '2', '616', '1', null);
INSERT INTO location VALUES ('2982', 'Dire Dawa', '2', '617', '1', null);
INSERT INTO location VALUES ('2983', 'Nazret', '2', '618', '1', null);
INSERT INTO location VALUES ('2984', 'Mekele', '2', '619', '1', null);
INSERT INTO location VALUES ('2985', 'Helsinki [Helsingfors]', '2', '620', '1', null);
INSERT INTO location VALUES ('2986', 'Espoo', '2', '620', '1', null);
INSERT INTO location VALUES ('2987', 'Vantaa', '2', '620', '1', null);
INSERT INTO location VALUES ('2988', 'Lahti', '2', '621', '1', null);
INSERT INTO location VALUES ('2989', 'Tampere', '2', '622', '1', null);
INSERT INTO location VALUES ('2990', 'Oulu', '2', '623', '1', null);
INSERT INTO location VALUES ('2991', 'Turku [ÃƒÆ’Ã¢â‚¬Â¦bo]', '2', '624', '1', null);
INSERT INTO location VALUES ('2992', 'Suva', '2', '625', '1', null);
INSERT INTO location VALUES ('2993', 'Nyeri', '2', '625', '1', null);
INSERT INTO location VALUES ('2994', 'Kathmandu', '2', '625', '1', null);
INSERT INTO location VALUES ('2995', 'Lalitapur', '2', '625', '1', null);
INSERT INTO location VALUES ('2996', 'Birgunj', '2', '625', '1', null);
INSERT INTO location VALUES ('2997', 'San Lorenzo', '2', '625', '1', null);
INSERT INTO location VALUES ('2998', 'LambarÃƒÆ’Ã‚Â©', '2', '625', '1', null);
INSERT INTO location VALUES ('2999', 'Fernando de la Mora', '2', '625', '1', null);
INSERT INTO location VALUES ('3000', 'Kabwe', '2', '625', '1', null);
INSERT INTO location VALUES ('3001', 'Kandy', '2', '625', '1', null);
INSERT INTO location VALUES ('3002', 'Kampala', '2', '625', '1', null);
INSERT INTO location VALUES ('3003', 'Stanley', '2', '626', '1', null);
INSERT INTO location VALUES ('3004', 'Strasbourg', '2', '627', '1', null);
INSERT INTO location VALUES ('3005', 'Mulhouse', '2', '627', '1', null);
INSERT INTO location VALUES ('3006', 'Bordeaux', '2', '628', '1', null);
INSERT INTO location VALUES ('3007', 'Clermont-Ferrand', '2', '629', '1', null);
INSERT INTO location VALUES ('3008', 'Paris', '2', '630', '1', null);
INSERT INTO location VALUES ('3009', 'Boulogne-Billancourt', '2', '630', '1', null);
INSERT INTO location VALUES ('3010', 'Argenteuil', '2', '630', '1', null);
INSERT INTO location VALUES ('3011', 'Montreuil', '2', '630', '1', null);
INSERT INTO location VALUES ('3012', 'Caen', '2', '631', '1', null);
INSERT INTO location VALUES ('3013', 'Dijon', '2', '632', '1', null);
INSERT INTO location VALUES ('3014', 'St-ÃƒÆ’Ã¢â‚¬Â°tienne', '2', '633', '1', null);
INSERT INTO location VALUES ('3015', 'Brest', '2', '633', '1', null);
INSERT INTO location VALUES ('3016', 'YaoundÃƒÆ’Ã‚Â©', '2', '634', '1', null);
INSERT INTO location VALUES ('3017', 'Tours', '2', '634', '1', null);
INSERT INTO location VALUES ('3018', 'OrlÃƒÆ’Ã‚Â©ans', '2', '634', '1', null);
INSERT INTO location VALUES ('3019', 'Le Havre', '2', '635', '1', null);
INSERT INTO location VALUES ('3020', 'BesanÃƒÆ’Ã‚Â§on', '2', '636', '1', null);
INSERT INTO location VALUES ('3021', 'Rennes', '2', '637', '1', null);
INSERT INTO location VALUES ('3022', 'Rouen', '2', '637', '1', null);
INSERT INTO location VALUES ('3023', 'Montpellier', '2', '638', '1', null);
INSERT INTO location VALUES ('3024', 'NÃƒÆ’Ã‚Â®mes', '2', '638', '1', null);
INSERT INTO location VALUES ('3025', 'Perpignan', '2', '638', '1', null);
INSERT INTO location VALUES ('3026', 'Limoges', '2', '639', '1', null);
INSERT INTO location VALUES ('3027', 'Metz', '2', '640', '1', null);
INSERT INTO location VALUES ('3028', 'Nancy', '2', '640', '1', null);
INSERT INTO location VALUES ('3029', 'Toulouse', '2', '641', '1', null);
INSERT INTO location VALUES ('3030', 'Reims', '2', '642', '1', null);
INSERT INTO location VALUES ('3031', 'Roubaix', '2', '642', '1', null);
INSERT INTO location VALUES ('3032', 'Tourcoing', '2', '642', '1', null);
INSERT INTO location VALUES ('3033', 'Nantes', '2', '643', '1', null);
INSERT INTO location VALUES ('3034', 'Angers', '2', '643', '1', null);
INSERT INTO location VALUES ('3035', 'Le Mans', '2', '643', '1', null);
INSERT INTO location VALUES ('3036', 'Amiens', '2', '644', '1', null);
INSERT INTO location VALUES ('3037', 'Marseille', '2', '645', '1', null);
INSERT INTO location VALUES ('3038', 'Nice', '2', '645', '1', null);
INSERT INTO location VALUES ('3039', 'Toulon', '2', '645', '1', null);
INSERT INTO location VALUES ('3040', 'Aix-en-Provence', '2', '645', '1', null);
INSERT INTO location VALUES ('3041', 'Lyon', '2', '646', '1', null);
INSERT INTO location VALUES ('3042', 'Lille', '2', '646', '1', null);
INSERT INTO location VALUES ('3043', 'Grenoble', '2', '646', '1', null);
INSERT INTO location VALUES ('3044', 'Villeurbanne', '2', '646', '1', null);
INSERT INTO location VALUES ('3045', 'TÃƒÆ’Ã‚Â³rshavn', '2', '647', '1', null);
INSERT INTO location VALUES ('3046', 'Weno', '2', '648', '1', null);
INSERT INTO location VALUES ('3047', 'Palikir', '2', '649', '1', null);
INSERT INTO location VALUES ('3048', 'Libreville', '2', '650', '1', null);
INSERT INTO location VALUES ('3049', 'South Hill', '2', '651', '1', null);
INSERT INTO location VALUES ('3050', 'The Valley', '2', '651', '1', null);
INSERT INTO location VALUES ('3051', 'Oranjestad', '2', '651', '1', null);
INSERT INTO location VALUES ('3052', 'Douglas', '2', '651', '1', null);
INSERT INTO location VALUES ('3053', 'Gibraltar', '2', '651', '1', null);
INSERT INTO location VALUES ('3054', 'Tamuning', '2', '651', '1', null);
INSERT INTO location VALUES ('3055', 'AgaÃƒÆ’Ã‚Â±a', '2', '651', '1', null);
INSERT INTO location VALUES ('3056', 'Flying Fish Cove', '2', '651', '1', null);
INSERT INTO location VALUES ('3057', 'Monte-Carlo', '2', '651', '1', null);
INSERT INTO location VALUES ('3058', 'Monaco-Ville', '2', '651', '1', null);
INSERT INTO location VALUES ('3059', 'Yangor', '2', '651', '1', null);
INSERT INTO location VALUES ('3060', 'Yaren', '2', '651', '1', null);
INSERT INTO location VALUES ('3061', 'Alofi', '2', '651', '1', null);
INSERT INTO location VALUES ('3062', 'Kingston', '2', '651', '1', null);
INSERT INTO location VALUES ('3063', 'Adamstown', '2', '651', '1', null);
INSERT INTO location VALUES ('3064', 'Singapore', '2', '651', '1', null);
INSERT INTO location VALUES ('3065', 'NoumÃƒÆ’Ã‚Â©a', '2', '651', '1', null);
INSERT INTO location VALUES ('3066', 'CittÃƒÆ’  del Vaticano', '2', '651', '1', null);
INSERT INTO location VALUES ('3067', 'London', '2', '652', '1', null);
INSERT INTO location VALUES ('3068', 'Birmingham', '2', '652', '1', null);
INSERT INTO location VALUES ('3069', 'Liverpool', '2', '652', '1', null);
INSERT INTO location VALUES ('3070', 'Sheffield', '2', '652', '1', null);
INSERT INTO location VALUES ('3071', 'Manchester', '2', '652', '1', null);
INSERT INTO location VALUES ('3072', 'Leeds', '2', '652', '1', null);
INSERT INTO location VALUES ('3073', 'Bristol', '2', '652', '1', null);
INSERT INTO location VALUES ('3074', 'Coventry', '2', '652', '1', null);
INSERT INTO location VALUES ('3075', 'Leicester', '2', '652', '1', null);
INSERT INTO location VALUES ('3076', 'Bradford', '2', '652', '1', null);
INSERT INTO location VALUES ('3077', 'Nottingham', '2', '652', '1', null);
INSERT INTO location VALUES ('3078', 'Kingston upon Hull', '2', '652', '1', null);
INSERT INTO location VALUES ('3079', 'Plymouth', '2', '652', '1', null);
INSERT INTO location VALUES ('3080', 'Stoke-on-Trent', '2', '652', '1', null);
INSERT INTO location VALUES ('3081', 'Wolverhampton', '2', '652', '1', null);
INSERT INTO location VALUES ('3082', 'Derby', '2', '652', '1', null);
INSERT INTO location VALUES ('3083', 'Southampton', '2', '652', '1', null);
INSERT INTO location VALUES ('3084', 'Northampton', '2', '652', '1', null);
INSERT INTO location VALUES ('3085', 'Dudley', '2', '652', '1', null);
INSERT INTO location VALUES ('3086', 'Portsmouth', '2', '652', '1', null);
INSERT INTO location VALUES ('3087', 'Newcastle upon Tyne', '2', '652', '1', null);
INSERT INTO location VALUES ('3088', 'Sunderland', '2', '652', '1', null);
INSERT INTO location VALUES ('3089', 'Luton', '2', '652', '1', null);
INSERT INTO location VALUES ('3090', 'Swindon', '2', '652', '1', null);
INSERT INTO location VALUES ('3091', 'Southend-on-Sea', '2', '652', '1', null);
INSERT INTO location VALUES ('3092', 'Walsall', '2', '652', '1', null);
INSERT INTO location VALUES ('3093', 'Bournemouth', '2', '652', '1', null);
INSERT INTO location VALUES ('3094', 'Peterborough', '2', '652', '1', null);
INSERT INTO location VALUES ('3095', 'Brighton', '2', '652', '1', null);
INSERT INTO location VALUES ('3096', 'Blackpool', '2', '652', '1', null);
INSERT INTO location VALUES ('3097', 'West Bromwich', '2', '652', '1', null);
INSERT INTO location VALUES ('3098', 'Reading', '2', '652', '1', null);
INSERT INTO location VALUES ('3099', 'Oldbury/Smethwick (Warley)', '2', '652', '1', null);
INSERT INTO location VALUES ('3100', 'Middlesbrough', '2', '652', '1', null);
INSERT INTO location VALUES ('3101', 'Huddersfield', '2', '652', '1', null);
INSERT INTO location VALUES ('3102', 'Oxford', '2', '652', '1', null);
INSERT INTO location VALUES ('3103', 'Poole', '2', '652', '1', null);
INSERT INTO location VALUES ('3104', 'Bolton', '2', '652', '1', null);
INSERT INTO location VALUES ('3105', 'Blackburn', '2', '652', '1', null);
INSERT INTO location VALUES ('3106', 'Preston', '2', '652', '1', null);
INSERT INTO location VALUES ('3107', 'Stockport', '2', '652', '1', null);
INSERT INTO location VALUES ('3108', 'Norwich', '2', '652', '1', null);
INSERT INTO location VALUES ('3109', 'Rotherham', '2', '652', '1', null);
INSERT INTO location VALUES ('3110', 'Cambridge', '2', '652', '1', null);
INSERT INTO location VALUES ('3111', 'Watford', '2', '652', '1', null);
INSERT INTO location VALUES ('3112', 'Ipswich', '2', '652', '1', null);
INSERT INTO location VALUES ('3113', 'Slough', '2', '652', '1', null);
INSERT INTO location VALUES ('3114', 'Exeter', '2', '652', '1', null);
INSERT INTO location VALUES ('3115', 'Cheltenham', '2', '652', '1', null);
INSERT INTO location VALUES ('3116', 'Gloucester', '2', '652', '1', null);
INSERT INTO location VALUES ('3117', 'Saint Helens', '2', '652', '1', null);
INSERT INTO location VALUES ('3118', 'Sutton Coldfield', '2', '652', '1', null);
INSERT INTO location VALUES ('3119', 'York', '2', '652', '1', null);
INSERT INTO location VALUES ('3120', 'Oldham', '2', '652', '1', null);
INSERT INTO location VALUES ('3121', 'Basildon', '2', '652', '1', null);
INSERT INTO location VALUES ('3122', 'Worthing', '2', '652', '1', null);
INSERT INTO location VALUES ('3123', 'Chelmsford', '2', '652', '1', null);
INSERT INTO location VALUES ('3124', 'Colchester', '2', '652', '1', null);
INSERT INTO location VALUES ('3125', 'Crawley', '2', '652', '1', null);
INSERT INTO location VALUES ('3126', 'Gillingham', '2', '652', '1', null);
INSERT INTO location VALUES ('3127', 'Solihull', '2', '652', '1', null);
INSERT INTO location VALUES ('3128', 'Rochdale', '2', '652', '1', null);
INSERT INTO location VALUES ('3129', 'Birkenhead', '2', '652', '1', null);
INSERT INTO location VALUES ('3130', 'Worcester', '2', '652', '1', null);
INSERT INTO location VALUES ('3131', 'Hartlepool', '2', '652', '1', null);
INSERT INTO location VALUES ('3132', 'Halifax', '2', '652', '1', null);
INSERT INTO location VALUES ('3133', 'Woking/Byfleet', '2', '652', '1', null);
INSERT INTO location VALUES ('3134', 'Southport', '2', '652', '1', null);
INSERT INTO location VALUES ('3135', 'Maidstone', '2', '652', '1', null);
INSERT INTO location VALUES ('3136', 'Eastbourne', '2', '652', '1', null);
INSERT INTO location VALUES ('3137', 'Grimsby', '2', '652', '1', null);
INSERT INTO location VALUES ('3138', 'Saint Helier', '2', '653', '1', null);
INSERT INTO location VALUES ('3139', 'Belfast', '2', '654', '1', null);
INSERT INTO location VALUES ('3140', 'Glasgow', '2', '655', '1', null);
INSERT INTO location VALUES ('3141', 'Edinburgh', '2', '655', '1', null);
INSERT INTO location VALUES ('3142', 'Aberdeen', '2', '655', '1', null);
INSERT INTO location VALUES ('3143', 'Dundee', '2', '655', '1', null);
INSERT INTO location VALUES ('3144', 'Cardiff', '2', '656', '1', null);
INSERT INTO location VALUES ('3145', 'Swansea', '2', '656', '1', null);
INSERT INTO location VALUES ('3146', 'Newport', '2', '656', '1', null);
INSERT INTO location VALUES ('3147', 'Sohumi', '2', '657', '1', null);
INSERT INTO location VALUES ('3148', 'Batumi', '2', '658', '1', null);
INSERT INTO location VALUES ('3149', 'Kutaisi', '2', '659', '1', null);
INSERT INTO location VALUES ('3150', 'Rustavi', '2', '660', '1', null);
INSERT INTO location VALUES ('3151', 'Tbilisi', '2', '661', '1', null);
INSERT INTO location VALUES ('3152', 'Kumasi', '2', '662', '1', null);
INSERT INTO location VALUES ('3153', 'Accra', '2', '663', '1', null);
INSERT INTO location VALUES ('3154', 'Tema', '2', '663', '1', null);
INSERT INTO location VALUES ('3155', 'Tamale', '2', '664', '1', null);
INSERT INTO location VALUES ('3156', 'Jaffna', '2', '664', '1', null);
INSERT INTO location VALUES ('3157', 'Sekondi-Takoradi', '2', '665', '1', null);
INSERT INTO location VALUES ('3158', 'Pokhara', '2', '665', '1', null);
INSERT INTO location VALUES ('3159', 'Freetown', '2', '665', '1', null);
INSERT INTO location VALUES ('3160', 'Colombo', '2', '665', '1', null);
INSERT INTO location VALUES ('3161', 'Dehiwala', '2', '665', '1', null);
INSERT INTO location VALUES ('3162', 'Moratuwa', '2', '665', '1', null);
INSERT INTO location VALUES ('3163', 'Sri Jayawardenepura Kotte', '2', '665', '1', null);
INSERT INTO location VALUES ('3164', 'Negombo', '2', '665', '1', null);
INSERT INTO location VALUES ('3165', 'South Hill', '2', '666', '1', null);
INSERT INTO location VALUES ('3166', 'The Valley', '2', '666', '1', null);
INSERT INTO location VALUES ('3167', 'Oranjestad', '2', '666', '1', null);
INSERT INTO location VALUES ('3168', 'Douglas', '2', '666', '1', null);
INSERT INTO location VALUES ('3169', 'Gibraltar', '2', '666', '1', null);
INSERT INTO location VALUES ('3170', 'Tamuning', '2', '666', '1', null);
INSERT INTO location VALUES ('3171', 'AgaÃƒÆ’Ã‚Â±a', '2', '666', '1', null);
INSERT INTO location VALUES ('3172', 'Flying Fish Cove', '2', '666', '1', null);
INSERT INTO location VALUES ('3173', 'Monte-Carlo', '2', '666', '1', null);
INSERT INTO location VALUES ('3174', 'Monaco-Ville', '2', '666', '1', null);
INSERT INTO location VALUES ('3175', 'Yangor', '2', '666', '1', null);
INSERT INTO location VALUES ('3176', 'Yaren', '2', '666', '1', null);
INSERT INTO location VALUES ('3177', 'Alofi', '2', '666', '1', null);
INSERT INTO location VALUES ('3178', 'Kingston', '2', '666', '1', null);
INSERT INTO location VALUES ('3179', 'Adamstown', '2', '666', '1', null);
INSERT INTO location VALUES ('3180', 'Singapore', '2', '666', '1', null);
INSERT INTO location VALUES ('3181', 'NoumÃƒÆ’Ã‚Â©a', '2', '666', '1', null);
INSERT INTO location VALUES ('3182', 'CittÃƒÆ’  del Vaticano', '2', '666', '1', null);
INSERT INTO location VALUES ('3183', 'Conakry', '2', '667', '1', null);
INSERT INTO location VALUES ('3184', 'Basse-Terre', '2', '668', '1', null);
INSERT INTO location VALUES ('3185', 'Les Abymes', '2', '669', '1', null);
INSERT INTO location VALUES ('3186', 'Banjul', '2', '670', '1', null);
INSERT INTO location VALUES ('3187', 'Serekunda', '2', '671', '1', null);
INSERT INTO location VALUES ('3188', 'Bissau', '2', '672', '1', null);
INSERT INTO location VALUES ('3189', 'Malabo', '2', '673', '1', null);
INSERT INTO location VALUES ('3190', 'Athenai', '2', '674', '1', null);
INSERT INTO location VALUES ('3191', 'Pireus', '2', '674', '1', null);
INSERT INTO location VALUES ('3192', 'Peristerion', '2', '674', '1', null);
INSERT INTO location VALUES ('3193', 'Kallithea', '2', '674', '1', null);
INSERT INTO location VALUES ('3194', 'Thessaloniki', '2', '675', '1', null);
INSERT INTO location VALUES ('3195', 'Herakleion', '2', '676', '1', null);
INSERT INTO location VALUES ('3196', 'Larisa', '2', '677', '1', null);
INSERT INTO location VALUES ('3197', 'Patras', '2', '678', '1', null);
INSERT INTO location VALUES ('3198', 'Roseau', '2', '679', '1', null);
INSERT INTO location VALUES ('3199', 'Saint GeorgeÃƒâ€šÃ‚Â´s', '2', '679', '1', null);
INSERT INTO location VALUES ('3200', 'Kingstown', '2', '679', '1', null);
INSERT INTO location VALUES ('3201', 'Nuuk', '2', '680', '1', null);
INSERT INTO location VALUES ('3202', 'Ciudad de Guatemala', '2', '681', '1', null);
INSERT INTO location VALUES ('3203', 'Mixco', '2', '681', '1', null);
INSERT INTO location VALUES ('3204', 'Villa Nueva', '2', '681', '1', null);
INSERT INTO location VALUES ('3205', 'Quetzaltenango', '2', '682', '1', null);
INSERT INTO location VALUES ('3206', 'Cayenne', '2', '683', '1', null);
INSERT INTO location VALUES ('3207', 'South Hill', '2', '684', '1', null);
INSERT INTO location VALUES ('3208', 'The Valley', '2', '684', '1', null);
INSERT INTO location VALUES ('3209', 'Oranjestad', '2', '684', '1', null);
INSERT INTO location VALUES ('3210', 'Douglas', '2', '684', '1', null);
INSERT INTO location VALUES ('3211', 'Gibraltar', '2', '684', '1', null);
INSERT INTO location VALUES ('3212', 'Tamuning', '2', '684', '1', null);
INSERT INTO location VALUES ('3213', 'AgaÃƒÆ’Ã‚Â±a', '2', '684', '1', null);
INSERT INTO location VALUES ('3214', 'Flying Fish Cove', '2', '684', '1', null);
INSERT INTO location VALUES ('3215', 'Monte-Carlo', '2', '684', '1', null);
INSERT INTO location VALUES ('3216', 'Monaco-Ville', '2', '684', '1', null);
INSERT INTO location VALUES ('3217', 'Yangor', '2', '684', '1', null);
INSERT INTO location VALUES ('3218', 'Yaren', '2', '684', '1', null);
INSERT INTO location VALUES ('3219', 'Alofi', '2', '684', '1', null);
INSERT INTO location VALUES ('3220', 'Kingston', '2', '684', '1', null);
INSERT INTO location VALUES ('3221', 'Adamstown', '2', '684', '1', null);
INSERT INTO location VALUES ('3222', 'Singapore', '2', '684', '1', null);
INSERT INTO location VALUES ('3223', 'NoumÃƒÆ’Ã‚Â©a', '2', '684', '1', null);
INSERT INTO location VALUES ('3224', 'CittÃƒÆ’  del Vaticano', '2', '684', '1', null);
INSERT INTO location VALUES ('3225', 'Georgetown', '2', '685', '1', null);
INSERT INTO location VALUES ('3226', 'Victoria', '2', '686', '1', null);
INSERT INTO location VALUES ('3227', 'Kowloon and New Kowloon', '2', '687', '1', null);
INSERT INTO location VALUES ('3228', 'La Ceiba', '2', '688', '1', null);
INSERT INTO location VALUES ('3229', 'San Pedro Sula', '2', '689', '1', null);
INSERT INTO location VALUES ('3230', 'Tegucigalpa', '2', '690', '1', null);
INSERT INTO location VALUES ('3231', 'Zagreb', '2', '691', '1', null);
INSERT INTO location VALUES ('3232', 'Osijek', '2', '692', '1', null);
INSERT INTO location VALUES ('3233', 'Rijeka', '2', '693', '1', null);
INSERT INTO location VALUES ('3234', 'Split', '2', '694', '1', null);
INSERT INTO location VALUES ('3235', 'Le-Cap-HaÃƒÆ’Ã‚Â¯tien', '2', '695', '1', null);
INSERT INTO location VALUES ('3236', 'Garoua', '2', '695', '1', null);
INSERT INTO location VALUES ('3237', 'Port-au-Prince', '2', '696', '1', null);
INSERT INTO location VALUES ('3238', 'Carrefour', '2', '696', '1', null);
INSERT INTO location VALUES ('3239', 'Delmas', '2', '696', '1', null);
INSERT INTO location VALUES ('3240', 'Bafoussam', '2', '696', '1', null);
INSERT INTO location VALUES ('3241', 'PÃƒÆ’Ã‚Â©cs', '2', '697', '1', null);
INSERT INTO location VALUES ('3242', 'KecskemÃƒÆ’Ã‚Â©t', '2', '698', '1', null);
INSERT INTO location VALUES ('3243', 'Miskolc', '2', '699', '1', null);
INSERT INTO location VALUES ('3244', 'Budapest', '2', '700', '1', null);
INSERT INTO location VALUES ('3245', 'Szeged', '2', '701', '1', null);
INSERT INTO location VALUES ('3246', 'SzÃƒÆ’Ã‚Â©kesfehÃƒÆ’Ã‚Â©rvÃƒÆ’', '2', '702', '1', null);
INSERT INTO location VALUES ('3247', 'GyÃƒÆ’Ã‚Â¶r', '2', '703', '1', null);
INSERT INTO location VALUES ('3248', 'Debrecen', '2', '704', '1', null);
INSERT INTO location VALUES ('3249', 'NyiregyhÃƒÆ’Ã‚Â¡za', '2', '705', '1', null);
INSERT INTO location VALUES ('3250', 'Banda Aceh', '2', '706', '1', null);
INSERT INTO location VALUES ('3251', 'Lhokseumawe', '2', '706', '1', null);
INSERT INTO location VALUES ('3252', 'Denpasar', '2', '707', '1', null);
INSERT INTO location VALUES ('3253', 'Bengkulu', '2', '708', '1', null);
INSERT INTO location VALUES ('3254', 'Semarang', '2', '709', '1', null);
INSERT INTO location VALUES ('3255', 'Surakarta', '2', '709', '1', null);
INSERT INTO location VALUES ('3256', 'Pekalongan', '2', '709', '1', null);
INSERT INTO location VALUES ('3257', 'Tegal', '2', '709', '1', null);
INSERT INTO location VALUES ('3258', 'Cilacap', '2', '709', '1', null);
INSERT INTO location VALUES ('3259', 'Purwokerto', '2', '709', '1', null);
INSERT INTO location VALUES ('3260', 'Magelang', '2', '709', '1', null);
INSERT INTO location VALUES ('3261', 'Pemalang', '2', '709', '1', null);
INSERT INTO location VALUES ('3262', 'Klaten', '2', '709', '1', null);
INSERT INTO location VALUES ('3263', 'Salatiga', '2', '709', '1', null);
INSERT INTO location VALUES ('3264', 'Kudus', '2', '709', '1', null);
INSERT INTO location VALUES ('3265', 'Surabaya', '2', '710', '1', null);
INSERT INTO location VALUES ('3266', 'Malang', '2', '710', '1', null);
INSERT INTO location VALUES ('3267', 'Kediri', '2', '710', '1', null);
INSERT INTO location VALUES ('3268', 'Jember', '2', '710', '1', null);
INSERT INTO location VALUES ('3269', 'Madiun', '2', '710', '1', null);
INSERT INTO location VALUES ('3270', 'Pasuruan', '2', '710', '1', null);
INSERT INTO location VALUES ('3271', 'Waru', '2', '710', '1', null);
INSERT INTO location VALUES ('3272', 'Blitar', '2', '710', '1', null);
INSERT INTO location VALUES ('3273', 'Probolinggo', '2', '710', '1', null);
INSERT INTO location VALUES ('3274', 'Taman', '2', '710', '1', null);
INSERT INTO location VALUES ('3275', 'Mojokerto', '2', '710', '1', null);
INSERT INTO location VALUES ('3276', 'Jombang', '2', '710', '1', null);
INSERT INTO location VALUES ('3277', 'Banyuwangi', '2', '710', '1', null);
INSERT INTO location VALUES ('3278', 'Jakarta', '2', '711', '1', null);
INSERT INTO location VALUES ('3279', 'Jambi', '2', '712', '1', null);
INSERT INTO location VALUES ('3280', 'Pontianak', '2', '713', '1', null);
INSERT INTO location VALUES ('3281', 'Banjarmasin', '2', '714', '1', null);
INSERT INTO location VALUES ('3282', 'Palangka Raya', '2', '715', '1', null);
INSERT INTO location VALUES ('3283', 'Samarinda', '2', '716', '1', null);
INSERT INTO location VALUES ('3284', 'Balikpapan', '2', '716', '1', null);
INSERT INTO location VALUES ('3285', 'Bandar Lampung', '2', '717', '1', null);
INSERT INTO location VALUES ('3286', 'Ambon', '2', '718', '1', null);
INSERT INTO location VALUES ('3287', 'Mataram', '2', '719', '1', null);
INSERT INTO location VALUES ('3288', 'Kupang', '2', '720', '1', null);
INSERT INTO location VALUES ('3289', 'Pekan Baru', '2', '721', '1', null);
INSERT INTO location VALUES ('3290', 'Batam', '2', '721', '1', null);
INSERT INTO location VALUES ('3291', 'Tanjung Pinang', '2', '721', '1', null);
INSERT INTO location VALUES ('3292', 'Ujung Pandang', '2', '722', '1', null);
INSERT INTO location VALUES ('3293', 'Palu', '2', '723', '1', null);
INSERT INTO location VALUES ('3294', 'Kendari', '2', '724', '1', null);
INSERT INTO location VALUES ('3295', 'Manado', '2', '725', '1', null);
INSERT INTO location VALUES ('3296', 'Gorontalo', '2', '725', '1', null);
INSERT INTO location VALUES ('3297', 'Padang', '2', '726', '1', null);
INSERT INTO location VALUES ('3298', 'Palembang', '2', '727', '1', null);
INSERT INTO location VALUES ('3299', 'Pangkal Pinang', '2', '727', '1', null);
INSERT INTO location VALUES ('3300', 'Medan', '2', '728', '1', null);
INSERT INTO location VALUES ('3301', 'Pematang Siantar', '2', '728', '1', null);
INSERT INTO location VALUES ('3302', 'Tebing Tinggi', '2', '728', '1', null);
INSERT INTO location VALUES ('3303', 'Percut Sei Tuan', '2', '728', '1', null);
INSERT INTO location VALUES ('3304', 'Binjai', '2', '728', '1', null);
INSERT INTO location VALUES ('3305', 'Sunggal', '2', '728', '1', null);
INSERT INTO location VALUES ('3306', 'Padang Sidempuan', '2', '728', '1', null);
INSERT INTO location VALUES ('3307', 'Jaya Pura', '2', '729', '1', null);
INSERT INTO location VALUES ('3308', 'Bandung', '2', '730', '1', null);
INSERT INTO location VALUES ('3309', 'Tangerang', '2', '730', '1', null);
INSERT INTO location VALUES ('3310', 'Bekasi', '2', '730', '1', null);
INSERT INTO location VALUES ('3311', 'Depok', '2', '730', '1', null);
INSERT INTO location VALUES ('3312', 'Cimahi', '2', '730', '1', null);
INSERT INTO location VALUES ('3313', 'Bogor', '2', '730', '1', null);
INSERT INTO location VALUES ('3314', 'Ciputat', '2', '730', '1', null);
INSERT INTO location VALUES ('3315', 'Pondokgede', '2', '730', '1', null);
INSERT INTO location VALUES ('3316', 'Cirebon', '2', '730', '1', null);
INSERT INTO location VALUES ('3317', 'Cimanggis', '2', '730', '1', null);
INSERT INTO location VALUES ('3318', 'Ciomas', '2', '730', '1', null);
INSERT INTO location VALUES ('3319', 'Tasikmalaya', '2', '730', '1', null);
INSERT INTO location VALUES ('3320', 'Karawang', '2', '730', '1', null);
INSERT INTO location VALUES ('3321', 'Sukabumi', '2', '730', '1', null);
INSERT INTO location VALUES ('3322', 'Serang', '2', '730', '1', null);
INSERT INTO location VALUES ('3323', 'Cilegon', '2', '730', '1', null);
INSERT INTO location VALUES ('3324', 'Cianjur', '2', '730', '1', null);
INSERT INTO location VALUES ('3325', 'Ciparay', '2', '730', '1', null);
INSERT INTO location VALUES ('3326', 'Citeureup', '2', '730', '1', null);
INSERT INTO location VALUES ('3327', 'Cibinong', '2', '730', '1', null);
INSERT INTO location VALUES ('3328', 'Purwakarta', '2', '730', '1', null);
INSERT INTO location VALUES ('3329', 'Garut', '2', '730', '1', null);
INSERT INTO location VALUES ('3330', 'Majalaya', '2', '730', '1', null);
INSERT INTO location VALUES ('3331', 'Pondok Aren', '2', '730', '1', null);
INSERT INTO location VALUES ('3332', 'Sawangan', '2', '730', '1', null);
INSERT INTO location VALUES ('3333', 'Yogyakarta', '2', '731', '1', null);
INSERT INTO location VALUES ('3334', 'Depok', '2', '731', '1', null);
INSERT INTO location VALUES ('3335', 'Hyderabad', '2', '732', '1', null);
INSERT INTO location VALUES ('3336', 'Vishakhapatnam', '2', '732', '1', null);
INSERT INTO location VALUES ('3337', 'Vijayawada', '2', '732', '1', null);
INSERT INTO location VALUES ('3338', 'Guntur', '2', '732', '1', null);
INSERT INTO location VALUES ('3339', 'Warangal', '2', '732', '1', null);
INSERT INTO location VALUES ('3340', 'Rajahmundry', '2', '732', '1', null);
INSERT INTO location VALUES ('3341', 'Nellore', '2', '732', '1', null);
INSERT INTO location VALUES ('3342', 'Kakinada', '2', '732', '1', null);
INSERT INTO location VALUES ('3343', 'Nizamabad', '2', '732', '1', null);
INSERT INTO location VALUES ('3344', 'Kurnool', '2', '732', '1', null);
INSERT INTO location VALUES ('3345', 'Ramagundam', '2', '732', '1', null);
INSERT INTO location VALUES ('3346', 'Eluru', '2', '732', '1', null);
INSERT INTO location VALUES ('3347', 'Kukatpalle', '2', '732', '1', null);
INSERT INTO location VALUES ('3348', 'Anantapur', '2', '732', '1', null);
INSERT INTO location VALUES ('3349', 'Tirupati', '2', '732', '1', null);
INSERT INTO location VALUES ('3350', 'Secunderabad', '2', '732', '1', null);
INSERT INTO location VALUES ('3351', 'Vizianagaram', '2', '732', '1', null);
INSERT INTO location VALUES ('3352', 'Machilipatnam (Masulipatam)', '2', '732', '1', null);
INSERT INTO location VALUES ('3353', 'Lalbahadur Nagar', '2', '732', '1', null);
INSERT INTO location VALUES ('3354', 'Karimnagar', '2', '732', '1', null);
INSERT INTO location VALUES ('3355', 'Tenali', '2', '732', '1', null);
INSERT INTO location VALUES ('3356', 'Adoni', '2', '732', '1', null);
INSERT INTO location VALUES ('3357', 'Proddatur', '2', '732', '1', null);
INSERT INTO location VALUES ('3358', 'Chittoor', '2', '732', '1', null);
INSERT INTO location VALUES ('3359', 'Khammam', '2', '732', '1', null);
INSERT INTO location VALUES ('3360', 'Malkajgiri', '2', '732', '1', null);
INSERT INTO location VALUES ('3361', 'Cuddapah', '2', '732', '1', null);
INSERT INTO location VALUES ('3362', 'Bhimavaram', '2', '732', '1', null);
INSERT INTO location VALUES ('3363', 'Nandyal', '2', '732', '1', null);
INSERT INTO location VALUES ('3364', 'Mahbubnagar', '2', '732', '1', null);
INSERT INTO location VALUES ('3365', 'Guntakal', '2', '732', '1', null);
INSERT INTO location VALUES ('3366', 'Qutubullapur', '2', '732', '1', null);
INSERT INTO location VALUES ('3367', 'Hindupur', '2', '732', '1', null);
INSERT INTO location VALUES ('3368', 'Gudivada', '2', '732', '1', null);
INSERT INTO location VALUES ('3369', 'Ongole', '2', '732', '1', null);
INSERT INTO location VALUES ('3370', 'Guwahati (Gauhati)', '2', '733', '1', null);
INSERT INTO location VALUES ('3371', 'Dibrugarh', '2', '733', '1', null);
INSERT INTO location VALUES ('3372', 'Silchar', '2', '733', '1', null);
INSERT INTO location VALUES ('3373', 'Nagaon', '2', '733', '1', null);
INSERT INTO location VALUES ('3374', 'Patna', '2', '734', '1', null);
INSERT INTO location VALUES ('3375', 'Gaya', '2', '734', '1', null);
INSERT INTO location VALUES ('3376', 'Bhagalpur', '2', '734', '1', null);
INSERT INTO location VALUES ('3377', 'Muzaffarpur', '2', '734', '1', null);
INSERT INTO location VALUES ('3378', 'Darbhanga', '2', '734', '1', null);
INSERT INTO location VALUES ('3379', 'Bihar Sharif', '2', '734', '1', null);
INSERT INTO location VALUES ('3380', 'Arrah (Ara)', '2', '734', '1', null);
INSERT INTO location VALUES ('3381', 'Katihar', '2', '734', '1', null);
INSERT INTO location VALUES ('3382', 'Munger (Monghyr)', '2', '734', '1', null);
INSERT INTO location VALUES ('3383', 'Chapra', '2', '734', '1', null);
INSERT INTO location VALUES ('3384', 'Sasaram', '2', '734', '1', null);
INSERT INTO location VALUES ('3385', 'Dehri', '2', '734', '1', null);
INSERT INTO location VALUES ('3386', 'Bettiah', '2', '734', '1', null);
INSERT INTO location VALUES ('3387', 'Chandigarh', '2', '735', '1', null);
INSERT INTO location VALUES ('3388', 'Raipur', '2', '736', '1', null);
INSERT INTO location VALUES ('3389', 'Bhilai', '2', '736', '1', null);
INSERT INTO location VALUES ('3390', 'Bilaspur', '2', '736', '1', null);
INSERT INTO location VALUES ('3391', 'Durg', '2', '736', '1', null);
INSERT INTO location VALUES ('3392', 'Raj Nandgaon', '2', '736', '1', null);
INSERT INTO location VALUES ('3393', 'Korba', '2', '736', '1', null);
INSERT INTO location VALUES ('3394', 'Raigarh', '2', '736', '1', null);
INSERT INTO location VALUES ('3395', 'Delhi', '2', '737', '1', null);
INSERT INTO location VALUES ('3396', 'New Delhi', '2', '737', '1', null);
INSERT INTO location VALUES ('3397', 'Delhi Cantonment', '2', '737', '1', null);
INSERT INTO location VALUES ('3398', 'Ahmedabad', '2', '738', '1', null);
INSERT INTO location VALUES ('3399', 'Surat', '2', '738', '1', null);
INSERT INTO location VALUES ('3400', 'Vadodara (Baroda)', '2', '738', '1', null);
INSERT INTO location VALUES ('3401', 'Rajkot', '2', '738', '1', null);
INSERT INTO location VALUES ('3402', 'Bhavnagar', '2', '738', '1', null);
INSERT INTO location VALUES ('3403', 'Jamnagar', '2', '738', '1', null);
INSERT INTO location VALUES ('3404', 'Nadiad', '2', '738', '1', null);
INSERT INTO location VALUES ('3405', 'Bharuch (Broach)', '2', '738', '1', null);
INSERT INTO location VALUES ('3406', 'Junagadh', '2', '738', '1', null);
INSERT INTO location VALUES ('3407', 'Navsari', '2', '738', '1', null);
INSERT INTO location VALUES ('3408', 'Gandhinagar', '2', '738', '1', null);
INSERT INTO location VALUES ('3409', 'Veraval', '2', '738', '1', null);
INSERT INTO location VALUES ('3410', 'Porbandar', '2', '738', '1', null);
INSERT INTO location VALUES ('3411', 'Anand', '2', '738', '1', null);
INSERT INTO location VALUES ('3412', 'Surendranagar', '2', '738', '1', null);
INSERT INTO location VALUES ('3413', 'Gandhidham', '2', '738', '1', null);
INSERT INTO location VALUES ('3414', 'Bhuj', '2', '738', '1', null);
INSERT INTO location VALUES ('3415', 'Godhra', '2', '738', '1', null);
INSERT INTO location VALUES ('3416', 'Patan', '2', '738', '1', null);
INSERT INTO location VALUES ('3417', 'Morvi', '2', '738', '1', null);
INSERT INTO location VALUES ('3418', 'Vejalpur', '2', '738', '1', null);
INSERT INTO location VALUES ('3419', 'Faridabad', '2', '739', '1', null);
INSERT INTO location VALUES ('3420', 'Rohtak', '2', '739', '1', null);
INSERT INTO location VALUES ('3421', 'Panipat', '2', '739', '1', null);
INSERT INTO location VALUES ('3422', 'Karnal', '2', '739', '1', null);
INSERT INTO location VALUES ('3423', 'Hisar (Hissar)', '2', '739', '1', null);
INSERT INTO location VALUES ('3424', 'Yamuna Nagar', '2', '739', '1', null);
INSERT INTO location VALUES ('3425', 'Sonipat (Sonepat)', '2', '739', '1', null);
INSERT INTO location VALUES ('3426', 'Gurgaon', '2', '739', '1', null);
INSERT INTO location VALUES ('3427', 'Sirsa', '2', '739', '1', null);
INSERT INTO location VALUES ('3428', 'Ambala', '2', '739', '1', null);
INSERT INTO location VALUES ('3429', 'Bhiwani', '2', '739', '1', null);
INSERT INTO location VALUES ('3430', 'Ambala Sadar', '2', '739', '1', null);
INSERT INTO location VALUES ('3431', 'Srinagar', '2', '740', '1', null);
INSERT INTO location VALUES ('3432', 'Jammu', '2', '740', '1', null);
INSERT INTO location VALUES ('3433', 'Ranchi', '2', '741', '1', null);
INSERT INTO location VALUES ('3434', 'Jamshedpur', '2', '741', '1', null);
INSERT INTO location VALUES ('3435', 'Bokaro Steel City', '2', '741', '1', null);
INSERT INTO location VALUES ('3436', 'Dhanbad', '2', '741', '1', null);
INSERT INTO location VALUES ('3437', 'Purnea (Purnia)', '2', '741', '1', null);
INSERT INTO location VALUES ('3438', 'Mango', '2', '741', '1', null);
INSERT INTO location VALUES ('3439', 'Hazaribag', '2', '741', '1', null);
INSERT INTO location VALUES ('3440', 'Purulia', '2', '741', '1', null);
INSERT INTO location VALUES ('3441', 'Bangalore', '2', '742', '1', null);
INSERT INTO location VALUES ('3442', 'Hubli-Dharwad', '2', '742', '1', null);
INSERT INTO location VALUES ('3443', 'Mysore', '2', '742', '1', null);
INSERT INTO location VALUES ('3444', 'Belgaum', '2', '742', '1', null);
INSERT INTO location VALUES ('3445', 'Gulbarga', '2', '742', '1', null);
INSERT INTO location VALUES ('3446', 'Mangalore', '2', '742', '1', null);
INSERT INTO location VALUES ('3447', 'Davangere', '2', '742', '1', null);
INSERT INTO location VALUES ('3448', 'Bellary', '2', '742', '1', null);
INSERT INTO location VALUES ('3449', 'Bijapur', '2', '742', '1', null);
INSERT INTO location VALUES ('3450', 'Shimoga', '2', '742', '1', null);
INSERT INTO location VALUES ('3451', 'Raichur', '2', '742', '1', null);
INSERT INTO location VALUES ('3452', 'Timkur', '2', '742', '1', null);
INSERT INTO location VALUES ('3453', 'Gadag Betigeri', '2', '742', '1', null);
INSERT INTO location VALUES ('3454', 'Mandya', '2', '742', '1', null);
INSERT INTO location VALUES ('3455', 'Bidar', '2', '742', '1', null);
INSERT INTO location VALUES ('3456', 'Hospet', '2', '742', '1', null);
INSERT INTO location VALUES ('3457', 'Hassan', '2', '742', '1', null);
INSERT INTO location VALUES ('3458', 'Cochin (Kochi)', '2', '743', '1', null);
INSERT INTO location VALUES ('3459', 'Thiruvananthapuram (Trivandrum', '2', '743', '1', null);
INSERT INTO location VALUES ('3460', 'Calicut (Kozhikode)', '2', '743', '1', null);
INSERT INTO location VALUES ('3461', 'Allappuzha (Alleppey)', '2', '743', '1', null);
INSERT INTO location VALUES ('3462', 'Kollam (Quilon)', '2', '743', '1', null);
INSERT INTO location VALUES ('3463', 'Palghat (Palakkad)', '2', '743', '1', null);
INSERT INTO location VALUES ('3464', 'Tellicherry (Thalassery)', '2', '743', '1', null);
INSERT INTO location VALUES ('3465', 'Indore', '2', '744', '1', null);
INSERT INTO location VALUES ('3466', 'Bhopal', '2', '744', '1', null);
INSERT INTO location VALUES ('3467', 'Jabalpur', '2', '744', '1', null);
INSERT INTO location VALUES ('3468', 'Gwalior', '2', '744', '1', null);
INSERT INTO location VALUES ('3469', 'Ujjain', '2', '744', '1', null);
INSERT INTO location VALUES ('3470', 'Sagar', '2', '744', '1', null);
INSERT INTO location VALUES ('3471', 'Ratlam', '2', '744', '1', null);
INSERT INTO location VALUES ('3472', 'Burhanpur', '2', '744', '1', null);
INSERT INTO location VALUES ('3473', 'Dewas', '2', '744', '1', null);
INSERT INTO location VALUES ('3474', 'Murwara (Katni)', '2', '744', '1', null);
INSERT INTO location VALUES ('3475', 'Satna', '2', '744', '1', null);
INSERT INTO location VALUES ('3476', 'Morena', '2', '744', '1', null);
INSERT INTO location VALUES ('3477', 'Khandwa', '2', '744', '1', null);
INSERT INTO location VALUES ('3478', 'Rewa', '2', '744', '1', null);
INSERT INTO location VALUES ('3479', 'Bhind', '2', '744', '1', null);
INSERT INTO location VALUES ('3480', 'Shivapuri', '2', '744', '1', null);
INSERT INTO location VALUES ('3481', 'Guna', '2', '744', '1', null);
INSERT INTO location VALUES ('3482', 'Mandasor', '2', '744', '1', null);
INSERT INTO location VALUES ('3483', 'Damoh', '2', '744', '1', null);
INSERT INTO location VALUES ('3484', 'Chhindwara', '2', '744', '1', null);
INSERT INTO location VALUES ('3485', 'Vidisha', '2', '744', '1', null);
INSERT INTO location VALUES ('3486', 'Mumbai (Bombay)', '2', '745', '1', null);
INSERT INTO location VALUES ('3487', 'Nagpur', '2', '745', '1', null);
INSERT INTO location VALUES ('3488', 'Pune', '2', '745', '1', null);
INSERT INTO location VALUES ('3489', 'Kalyan', '2', '745', '1', null);
INSERT INTO location VALUES ('3490', 'Thane (Thana)', '2', '745', '1', null);
INSERT INTO location VALUES ('3491', 'Nashik (Nasik)', '2', '745', '1', null);
INSERT INTO location VALUES ('3492', 'Solapur (Sholapur)', '2', '745', '1', null);
INSERT INTO location VALUES ('3493', 'Shambajinagar (Aurangabad)', '2', '745', '1', null);
INSERT INTO location VALUES ('3494', 'Pimpri-Chinchwad', '2', '745', '1', null);
INSERT INTO location VALUES ('3495', 'Amravati', '2', '745', '1', null);
INSERT INTO location VALUES ('3496', 'Kolhapur', '2', '745', '1', null);
INSERT INTO location VALUES ('3497', 'Bhiwandi', '2', '745', '1', null);
INSERT INTO location VALUES ('3498', 'Ulhasnagar', '2', '745', '1', null);
INSERT INTO location VALUES ('3499', 'Malegaon', '2', '745', '1', null);
INSERT INTO location VALUES ('3500', 'Akola', '2', '745', '1', null);
INSERT INTO location VALUES ('3501', 'New Bombay', '2', '745', '1', null);
INSERT INTO location VALUES ('3502', 'Dhule (Dhulia)', '2', '745', '1', null);
INSERT INTO location VALUES ('3503', 'Nanded (Nander)', '2', '745', '1', null);
INSERT INTO location VALUES ('3504', 'Jalgaon', '2', '745', '1', null);
INSERT INTO location VALUES ('3505', 'Chandrapur', '2', '745', '1', null);
INSERT INTO location VALUES ('3506', 'Ichalkaranji', '2', '745', '1', null);
INSERT INTO location VALUES ('3507', 'Latur', '2', '745', '1', null);
INSERT INTO location VALUES ('3508', 'Sangli', '2', '745', '1', null);
INSERT INTO location VALUES ('3509', 'Parbhani', '2', '745', '1', null);
INSERT INTO location VALUES ('3510', 'Ahmadnagar', '2', '745', '1', null);
INSERT INTO location VALUES ('3511', 'Mira Bhayandar', '2', '745', '1', null);
INSERT INTO location VALUES ('3512', 'Jalna', '2', '745', '1', null);
INSERT INTO location VALUES ('3513', 'Bhusawal', '2', '745', '1', null);
INSERT INTO location VALUES ('3514', 'Miraj', '2', '745', '1', null);
INSERT INTO location VALUES ('3515', 'Bhir (Bid)', '2', '745', '1', null);
INSERT INTO location VALUES ('3516', 'Gondiya', '2', '745', '1', null);
INSERT INTO location VALUES ('3517', 'Yeotmal (Yavatmal)', '2', '745', '1', null);
INSERT INTO location VALUES ('3518', 'Wardha', '2', '745', '1', null);
INSERT INTO location VALUES ('3519', 'Achalpur', '2', '745', '1', null);
INSERT INTO location VALUES ('3520', 'Satara', '2', '745', '1', null);
INSERT INTO location VALUES ('3521', 'Imphal', '2', '746', '1', null);
INSERT INTO location VALUES ('3522', 'Shillong', '2', '747', '1', null);
INSERT INTO location VALUES ('3523', 'Aizawl', '2', '748', '1', null);
INSERT INTO location VALUES ('3524', 'Bhubaneswar', '2', '749', '1', null);
INSERT INTO location VALUES ('3525', 'Kataka (Cuttack)', '2', '749', '1', null);
INSERT INTO location VALUES ('3526', 'Raurkela', '2', '749', '1', null);
INSERT INTO location VALUES ('3527', 'Brahmapur', '2', '749', '1', null);
INSERT INTO location VALUES ('3528', 'Raurkela Civil Township', '2', '749', '1', null);
INSERT INTO location VALUES ('3529', 'Sambalpur', '2', '749', '1', null);
INSERT INTO location VALUES ('3530', 'Puri', '2', '749', '1', null);
INSERT INTO location VALUES ('3531', 'Pondicherry', '2', '750', '1', null);
INSERT INTO location VALUES ('3532', 'Ludhiana', '2', '751', '1', null);
INSERT INTO location VALUES ('3533', 'Amritsar', '2', '751', '1', null);
INSERT INTO location VALUES ('3534', 'Jalandhar (Jullundur)', '2', '751', '1', null);
INSERT INTO location VALUES ('3535', 'Patiala', '2', '751', '1', null);
INSERT INTO location VALUES ('3536', 'Bhatinda (Bathinda)', '2', '751', '1', null);
INSERT INTO location VALUES ('3537', 'Pathankot', '2', '751', '1', null);
INSERT INTO location VALUES ('3538', 'Hoshiarpur', '2', '751', '1', null);
INSERT INTO location VALUES ('3539', 'Moga', '2', '751', '1', null);
INSERT INTO location VALUES ('3540', 'Abohar', '2', '751', '1', null);
INSERT INTO location VALUES ('3541', 'Lahore', '2', '751', '1', null);
INSERT INTO location VALUES ('3542', 'Faisalabad', '2', '751', '1', null);
INSERT INTO location VALUES ('3543', 'Rawalpindi', '2', '751', '1', null);
INSERT INTO location VALUES ('3544', 'Multan', '2', '751', '1', null);
INSERT INTO location VALUES ('3545', 'Gujranwala', '2', '751', '1', null);
INSERT INTO location VALUES ('3546', 'Sargodha', '2', '751', '1', null);
INSERT INTO location VALUES ('3547', 'Sialkot', '2', '751', '1', null);
INSERT INTO location VALUES ('3548', 'Bahawalpur', '2', '751', '1', null);
INSERT INTO location VALUES ('3549', 'Jhang', '2', '751', '1', null);
INSERT INTO location VALUES ('3550', 'Sheikhupura', '2', '751', '1', null);
INSERT INTO location VALUES ('3551', 'Gujrat', '2', '751', '1', null);
INSERT INTO location VALUES ('3552', 'Kasur', '2', '751', '1', null);
INSERT INTO location VALUES ('3553', 'Rahim Yar Khan', '2', '751', '1', null);
INSERT INTO location VALUES ('3554', 'Sahiwal', '2', '751', '1', null);
INSERT INTO location VALUES ('3555', 'Okara', '2', '751', '1', null);
INSERT INTO location VALUES ('3556', 'Wah', '2', '751', '1', null);
INSERT INTO location VALUES ('3557', 'Dera Ghazi Khan', '2', '751', '1', null);
INSERT INTO location VALUES ('3558', 'Chiniot', '2', '751', '1', null);
INSERT INTO location VALUES ('3559', 'Kamoke', '2', '751', '1', null);
INSERT INTO location VALUES ('3560', 'Mandi Burewala', '2', '751', '1', null);
INSERT INTO location VALUES ('3561', 'Jhelum', '2', '751', '1', null);
INSERT INTO location VALUES ('3562', 'Sadiqabad', '2', '751', '1', null);
INSERT INTO location VALUES ('3563', 'Khanewal', '2', '751', '1', null);
INSERT INTO location VALUES ('3564', 'Hafizabad', '2', '751', '1', null);
INSERT INTO location VALUES ('3565', 'Muzaffargarh', '2', '751', '1', null);
INSERT INTO location VALUES ('3566', 'Khanpur', '2', '751', '1', null);
INSERT INTO location VALUES ('3567', 'Gojra', '2', '751', '1', null);
INSERT INTO location VALUES ('3568', 'Bahawalnagar', '2', '751', '1', null);
INSERT INTO location VALUES ('3569', 'Muridke', '2', '751', '1', null);
INSERT INTO location VALUES ('3570', 'Pak Pattan', '2', '751', '1', null);
INSERT INTO location VALUES ('3571', 'Jaranwala', '2', '751', '1', null);
INSERT INTO location VALUES ('3572', 'Chishtian Mandi', '2', '751', '1', null);
INSERT INTO location VALUES ('3573', 'Daska', '2', '751', '1', null);
INSERT INTO location VALUES ('3574', 'Mandi Bahauddin', '2', '751', '1', null);
INSERT INTO location VALUES ('3575', 'Ahmadpur East', '2', '751', '1', null);
INSERT INTO location VALUES ('3576', 'Kamalia', '2', '751', '1', null);
INSERT INTO location VALUES ('3577', 'Vihari', '2', '751', '1', null);
INSERT INTO location VALUES ('3578', 'Wazirabad', '2', '751', '1', null);
INSERT INTO location VALUES ('3579', 'Jaipur', '2', '752', '1', null);
INSERT INTO location VALUES ('3580', 'Jodhpur', '2', '752', '1', null);
INSERT INTO location VALUES ('3581', 'Kota', '2', '752', '1', null);
INSERT INTO location VALUES ('3582', 'Bikaner', '2', '752', '1', null);
INSERT INTO location VALUES ('3583', 'Ajmer', '2', '752', '1', null);
INSERT INTO location VALUES ('3584', 'Udaipur', '2', '752', '1', null);
INSERT INTO location VALUES ('3585', 'Alwar', '2', '752', '1', null);
INSERT INTO location VALUES ('3586', 'Bhilwara', '2', '752', '1', null);
INSERT INTO location VALUES ('3587', 'Ganganagar', '2', '752', '1', null);
INSERT INTO location VALUES ('3588', 'Bharatpur', '2', '752', '1', null);
INSERT INTO location VALUES ('3589', 'Sikar', '2', '752', '1', null);
INSERT INTO location VALUES ('3590', 'Pali', '2', '752', '1', null);
INSERT INTO location VALUES ('3591', 'Beawar', '2', '752', '1', null);
INSERT INTO location VALUES ('3592', 'Tonk', '2', '752', '1', null);
INSERT INTO location VALUES ('3593', 'Chennai (Madras)', '2', '753', '1', null);
INSERT INTO location VALUES ('3594', 'Madurai', '2', '753', '1', null);
INSERT INTO location VALUES ('3595', 'Coimbatore', '2', '753', '1', null);
INSERT INTO location VALUES ('3596', 'Tiruchirapalli', '2', '753', '1', null);
INSERT INTO location VALUES ('3597', 'Salem', '2', '753', '1', null);
INSERT INTO location VALUES ('3598', 'Tiruppur (Tirupper)', '2', '753', '1', null);
INSERT INTO location VALUES ('3599', 'Ambattur', '2', '753', '1', null);
INSERT INTO location VALUES ('3600', 'Thanjavur', '2', '753', '1', null);
INSERT INTO location VALUES ('3601', 'Tuticorin', '2', '753', '1', null);
INSERT INTO location VALUES ('3602', 'Nagar Coil', '2', '753', '1', null);
INSERT INTO location VALUES ('3603', 'Avadi', '2', '753', '1', null);
INSERT INTO location VALUES ('3604', 'Dindigul', '2', '753', '1', null);
INSERT INTO location VALUES ('3605', 'Vellore', '2', '753', '1', null);
INSERT INTO location VALUES ('3606', 'Tiruvottiyur', '2', '753', '1', null);
INSERT INTO location VALUES ('3607', 'Erode', '2', '753', '1', null);
INSERT INTO location VALUES ('3608', 'Cuddalore', '2', '753', '1', null);
INSERT INTO location VALUES ('3609', 'Kanchipuram', '2', '753', '1', null);
INSERT INTO location VALUES ('3610', 'Kumbakonam', '2', '753', '1', null);
INSERT INTO location VALUES ('3611', 'Tirunelveli', '2', '753', '1', null);
INSERT INTO location VALUES ('3612', 'Alandur', '2', '753', '1', null);
INSERT INTO location VALUES ('3613', 'Neyveli', '2', '753', '1', null);
INSERT INTO location VALUES ('3614', 'Rajapalaiyam', '2', '753', '1', null);
INSERT INTO location VALUES ('3615', 'Pallavaram', '2', '753', '1', null);
INSERT INTO location VALUES ('3616', 'Tiruvannamalai', '2', '753', '1', null);
INSERT INTO location VALUES ('3617', 'Tambaram', '2', '753', '1', null);
INSERT INTO location VALUES ('3618', 'Valparai', '2', '753', '1', null);
INSERT INTO location VALUES ('3619', 'Pudukkottai', '2', '753', '1', null);
INSERT INTO location VALUES ('3620', 'Palayankottai', '2', '753', '1', null);
INSERT INTO location VALUES ('3621', 'Agartala', '2', '754', '1', null);
INSERT INTO location VALUES ('3622', 'Kanpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3623', 'Lucknow', '2', '755', '1', null);
INSERT INTO location VALUES ('3624', 'Varanasi (Benares)', '2', '755', '1', null);
INSERT INTO location VALUES ('3625', 'Agra', '2', '755', '1', null);
INSERT INTO location VALUES ('3626', 'Allahabad', '2', '755', '1', null);
INSERT INTO location VALUES ('3627', 'Meerut', '2', '755', '1', null);
INSERT INTO location VALUES ('3628', 'Bareilly', '2', '755', '1', null);
INSERT INTO location VALUES ('3629', 'Gorakhpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3630', 'Aligarh', '2', '755', '1', null);
INSERT INTO location VALUES ('3631', 'Ghaziabad', '2', '755', '1', null);
INSERT INTO location VALUES ('3632', 'Moradabad', '2', '755', '1', null);
INSERT INTO location VALUES ('3633', 'Saharanpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3634', 'Jhansi', '2', '755', '1', null);
INSERT INTO location VALUES ('3635', 'Rampur', '2', '755', '1', null);
INSERT INTO location VALUES ('3636', 'Muzaffarnagar', '2', '755', '1', null);
INSERT INTO location VALUES ('3637', 'Shahjahanpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3638', 'Mathura', '2', '755', '1', null);
INSERT INTO location VALUES ('3639', 'Firozabad', '2', '755', '1', null);
INSERT INTO location VALUES ('3640', 'Farrukhabad-cum-Fatehgarh', '2', '755', '1', null);
INSERT INTO location VALUES ('3641', 'Mirzapur-cum-Vindhyachal', '2', '755', '1', null);
INSERT INTO location VALUES ('3642', 'Sambhal', '2', '755', '1', null);
INSERT INTO location VALUES ('3643', 'Noida', '2', '755', '1', null);
INSERT INTO location VALUES ('3644', 'Hapur', '2', '755', '1', null);
INSERT INTO location VALUES ('3645', 'Amroha', '2', '755', '1', null);
INSERT INTO location VALUES ('3646', 'Maunath Bhanjan', '2', '755', '1', null);
INSERT INTO location VALUES ('3647', 'Jaunpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3648', 'Bahraich', '2', '755', '1', null);
INSERT INTO location VALUES ('3649', 'Rae Bareli', '2', '755', '1', null);
INSERT INTO location VALUES ('3650', 'Bulandshahr', '2', '755', '1', null);
INSERT INTO location VALUES ('3651', 'Faizabad', '2', '755', '1', null);
INSERT INTO location VALUES ('3652', 'Etawah', '2', '755', '1', null);
INSERT INTO location VALUES ('3653', 'Sitapur', '2', '755', '1', null);
INSERT INTO location VALUES ('3654', 'Fatehpur', '2', '755', '1', null);
INSERT INTO location VALUES ('3655', 'Budaun', '2', '755', '1', null);
INSERT INTO location VALUES ('3656', 'Hathras', '2', '755', '1', null);
INSERT INTO location VALUES ('3657', 'Unnao', '2', '755', '1', null);
INSERT INTO location VALUES ('3658', 'Pilibhit', '2', '755', '1', null);
INSERT INTO location VALUES ('3659', 'Gonda', '2', '755', '1', null);
INSERT INTO location VALUES ('3660', 'Modinagar', '2', '755', '1', null);
INSERT INTO location VALUES ('3661', 'Orai', '2', '755', '1', null);
INSERT INTO location VALUES ('3662', 'Banda', '2', '755', '1', null);
INSERT INTO location VALUES ('3663', 'Meerut Cantonment', '2', '755', '1', null);
INSERT INTO location VALUES ('3664', 'Kanpur Cantonment', '2', '755', '1', null);
INSERT INTO location VALUES ('3665', 'Dehra Dun', '2', '756', '1', null);
INSERT INTO location VALUES ('3666', 'Hardwar (Haridwar)', '2', '756', '1', null);
INSERT INTO location VALUES ('3667', 'Haldwani-cum-Kathgodam', '2', '756', '1', null);
INSERT INTO location VALUES ('3668', 'Calcutta [Kolkata]', '2', '757', '1', null);
INSERT INTO location VALUES ('3669', 'Haora (Howrah)', '2', '757', '1', null);
INSERT INTO location VALUES ('3670', 'Durgapur', '2', '757', '1', null);
INSERT INTO location VALUES ('3671', 'Bhatpara', '2', '757', '1', null);
INSERT INTO location VALUES ('3672', 'Panihati', '2', '757', '1', null);
INSERT INTO location VALUES ('3673', 'Kamarhati', '2', '757', '1', null);
INSERT INTO location VALUES ('3674', 'Asansol', '2', '757', '1', null);
INSERT INTO location VALUES ('3675', 'Barddhaman (Burdwan)', '2', '757', '1', null);
INSERT INTO location VALUES ('3676', 'South Dum Dum', '2', '757', '1', null);
INSERT INTO location VALUES ('3677', 'Barahanagar (Baranagar)', '2', '757', '1', null);
INSERT INTO location VALUES ('3678', 'Siliguri (Shiliguri)', '2', '757', '1', null);
INSERT INTO location VALUES ('3679', 'Bally', '2', '757', '1', null);
INSERT INTO location VALUES ('3680', 'Kharagpur', '2', '757', '1', null);
INSERT INTO location VALUES ('3681', 'Burnpur', '2', '757', '1', null);
INSERT INTO location VALUES ('3682', 'Uluberia', '2', '757', '1', null);
INSERT INTO location VALUES ('3683', 'Hugli-Chinsurah', '2', '757', '1', null);
INSERT INTO location VALUES ('3684', 'Raiganj', '2', '757', '1', null);
INSERT INTO location VALUES ('3685', 'North Dum Dum', '2', '757', '1', null);
INSERT INTO location VALUES ('3686', 'Dabgram', '2', '757', '1', null);
INSERT INTO location VALUES ('3687', 'Ingraj Bazar (English Bazar)', '2', '757', '1', null);
INSERT INTO location VALUES ('3688', 'Serampore', '2', '757', '1', null);
INSERT INTO location VALUES ('3689', 'Barrackpur', '2', '757', '1', null);
INSERT INTO location VALUES ('3690', 'Naihati', '2', '757', '1', null);
INSERT INTO location VALUES ('3691', 'Midnapore (Medinipur)', '2', '757', '1', null);
INSERT INTO location VALUES ('3692', 'Navadwip', '2', '757', '1', null);
INSERT INTO location VALUES ('3693', 'Krishnanagar', '2', '757', '1', null);
INSERT INTO location VALUES ('3694', 'Chandannagar', '2', '757', '1', null);
INSERT INTO location VALUES ('3695', 'Balurghat', '2', '757', '1', null);
INSERT INTO location VALUES ('3696', 'Berhampore (Baharampur)', '2', '757', '1', null);
INSERT INTO location VALUES ('3697', 'Bankura', '2', '757', '1', null);
INSERT INTO location VALUES ('3698', 'Titagarh', '2', '757', '1', null);
INSERT INTO location VALUES ('3699', 'Halisahar', '2', '757', '1', null);
INSERT INTO location VALUES ('3700', 'Santipur', '2', '757', '1', null);
INSERT INTO location VALUES ('3701', 'Kulti-Barakar', '2', '757', '1', null);
INSERT INTO location VALUES ('3702', 'Barasat', '2', '757', '1', null);
INSERT INTO location VALUES ('3703', 'Rishra', '2', '757', '1', null);
INSERT INTO location VALUES ('3704', 'Basirhat', '2', '757', '1', null);
INSERT INTO location VALUES ('3705', 'Uttarpara-Kotrung', '2', '757', '1', null);
INSERT INTO location VALUES ('3706', 'North Barrackpur', '2', '757', '1', null);
INSERT INTO location VALUES ('3707', 'Haldia', '2', '757', '1', null);
INSERT INTO location VALUES ('3708', 'Habra', '2', '757', '1', null);
INSERT INTO location VALUES ('3709', 'Kanchrapara', '2', '757', '1', null);
INSERT INTO location VALUES ('3710', 'Champdani', '2', '757', '1', null);
INSERT INTO location VALUES ('3711', 'Ashoknagar-Kalyangarh', '2', '757', '1', null);
INSERT INTO location VALUES ('3712', 'Bansberia', '2', '757', '1', null);
INSERT INTO location VALUES ('3713', 'Baidyabati', '2', '757', '1', null);
INSERT INTO location VALUES ('3714', 'Dublin', '2', '758', '1', null);
INSERT INTO location VALUES ('3715', 'Cork', '2', '759', '1', null);
INSERT INTO location VALUES ('3716', 'Ardebil', '2', '760', '1', null);
INSERT INTO location VALUES ('3717', 'Bushehr', '2', '761', '1', null);
INSERT INTO location VALUES ('3718', 'Shahr-e Kord', '2', '762', '1', null);
INSERT INTO location VALUES ('3719', 'Tabriz', '2', '763', '1', null);
INSERT INTO location VALUES ('3720', 'Maragheh', '2', '763', '1', null);
INSERT INTO location VALUES ('3721', 'Marand', '2', '763', '1', null);
INSERT INTO location VALUES ('3722', 'Esfahan', '2', '764', '1', null);
INSERT INTO location VALUES ('3723', 'Kashan', '2', '764', '1', null);
INSERT INTO location VALUES ('3724', 'Najafabad', '2', '764', '1', null);
INSERT INTO location VALUES ('3725', 'Khomeynishahr', '2', '764', '1', null);
INSERT INTO location VALUES ('3726', 'Qomsheh', '2', '764', '1', null);
INSERT INTO location VALUES ('3727', 'Shiraz', '2', '765', '1', null);
INSERT INTO location VALUES ('3728', 'Marv Dasht', '2', '765', '1', null);
INSERT INTO location VALUES ('3729', 'Jahrom', '2', '765', '1', null);
INSERT INTO location VALUES ('3730', 'Rasht', '2', '766', '1', null);
INSERT INTO location VALUES ('3731', 'Bandar-e Anzali', '2', '766', '1', null);
INSERT INTO location VALUES ('3732', 'Gorgan', '2', '767', '1', null);
INSERT INTO location VALUES ('3733', 'Hamadan', '2', '768', '1', null);
INSERT INTO location VALUES ('3734', 'Malayer', '2', '768', '1', null);
INSERT INTO location VALUES ('3735', 'Bandar-e-Abbas', '2', '769', '1', null);
INSERT INTO location VALUES ('3736', 'Ilam', '2', '770', '1', null);
INSERT INTO location VALUES ('3737', 'Kerman', '2', '771', '1', null);
INSERT INTO location VALUES ('3738', 'Sirjan', '2', '771', '1', null);
INSERT INTO location VALUES ('3739', 'Rafsanjan', '2', '771', '1', null);
INSERT INTO location VALUES ('3740', 'Kermanshah', '2', '772', '1', null);
INSERT INTO location VALUES ('3741', 'Mashhad', '2', '773', '1', null);
INSERT INTO location VALUES ('3742', 'Sabzevar', '2', '773', '1', null);
INSERT INTO location VALUES ('3743', 'Neyshabur', '2', '773', '1', null);
INSERT INTO location VALUES ('3744', 'Bojnurd', '2', '773', '1', null);
INSERT INTO location VALUES ('3745', 'Birjand', '2', '773', '1', null);
INSERT INTO location VALUES ('3746', 'Torbat-e Heydariyeh', '2', '773', '1', null);
INSERT INTO location VALUES ('3747', 'Ahvaz', '2', '774', '1', null);
INSERT INTO location VALUES ('3748', 'Abadan', '2', '774', '1', null);
INSERT INTO location VALUES ('3749', 'Dezful', '2', '774', '1', null);
INSERT INTO location VALUES ('3750', 'Masjed-e-Soleyman', '2', '774', '1', null);
INSERT INTO location VALUES ('3751', 'Andimeshk', '2', '774', '1', null);
INSERT INTO location VALUES ('3752', 'Khorramshahr', '2', '774', '1', null);
INSERT INTO location VALUES ('3753', 'Sanandaj', '2', '775', '1', null);
INSERT INTO location VALUES ('3754', 'Saqqez', '2', '775', '1', null);
INSERT INTO location VALUES ('3755', 'Khorramabad', '2', '776', '1', null);
INSERT INTO location VALUES ('3756', 'Borujerd', '2', '776', '1', null);
INSERT INTO location VALUES ('3757', 'Arak', '2', '777', '1', null);
INSERT INTO location VALUES ('3758', 'Sari', '2', '778', '1', null);
INSERT INTO location VALUES ('3759', 'Amol', '2', '778', '1', null);
INSERT INTO location VALUES ('3760', 'Babol', '2', '778', '1', null);
INSERT INTO location VALUES ('3761', 'Qaemshahr', '2', '778', '1', null);
INSERT INTO location VALUES ('3762', 'Gonbad-e Qabus', '2', '778', '1', null);
INSERT INTO location VALUES ('3763', 'Qazvin', '2', '779', '1', null);
INSERT INTO location VALUES ('3764', 'Qom', '2', '780', '1', null);
INSERT INTO location VALUES ('3765', 'Saveh', '2', '780', '1', null);
INSERT INTO location VALUES ('3766', 'Shahrud', '2', '781', '1', null);
INSERT INTO location VALUES ('3767', 'Semnan', '2', '781', '1', null);
INSERT INTO location VALUES ('3768', 'Zahedan', '2', '782', '1', null);
INSERT INTO location VALUES ('3769', 'Zabol', '2', '782', '1', null);
INSERT INTO location VALUES ('3770', 'Teheran', '2', '783', '1', null);
INSERT INTO location VALUES ('3771', 'Karaj', '2', '783', '1', null);
INSERT INTO location VALUES ('3772', 'Eslamshahr', '2', '783', '1', null);
INSERT INTO location VALUES ('3773', 'Qarchak', '2', '783', '1', null);
INSERT INTO location VALUES ('3774', 'Qods', '2', '783', '1', null);
INSERT INTO location VALUES ('3775', 'Varamin', '2', '783', '1', null);
INSERT INTO location VALUES ('3776', 'Urmia', '2', '784', '1', null);
INSERT INTO location VALUES ('3777', 'Khoy', '2', '784', '1', null);
INSERT INTO location VALUES ('3778', 'Bukan', '2', '784', '1', null);
INSERT INTO location VALUES ('3779', 'Mahabad', '2', '784', '1', null);
INSERT INTO location VALUES ('3780', 'Miandoab', '2', '784', '1', null);
INSERT INTO location VALUES ('3781', 'Yazd', '2', '785', '1', null);
INSERT INTO location VALUES ('3782', 'Zanjan', '2', '786', '1', null);
INSERT INTO location VALUES ('3783', 'al-Ramadi', '2', '787', '1', null);
INSERT INTO location VALUES ('3784', 'al-Najaf', '2', '788', '1', null);
INSERT INTO location VALUES ('3785', 'al-Diwaniya', '2', '789', '1', null);
INSERT INTO location VALUES ('3786', 'al-Sulaymaniya', '2', '790', '1', null);
INSERT INTO location VALUES ('3787', 'Kirkuk', '2', '791', '1', null);
INSERT INTO location VALUES ('3788', 'al-Hilla', '2', '792', '1', null);
INSERT INTO location VALUES ('3789', 'Baghdad', '2', '793', '1', null);
INSERT INTO location VALUES ('3790', 'Basra', '2', '794', '1', null);
INSERT INTO location VALUES ('3791', 'al-Nasiriya', '2', '795', '1', null);
INSERT INTO location VALUES ('3792', 'Baquba', '2', '796', '1', null);
INSERT INTO location VALUES ('3793', 'Irbil', '2', '797', '1', null);
INSERT INTO location VALUES ('3794', 'Karbala', '2', '798', '1', null);
INSERT INTO location VALUES ('3795', 'al-Amara', '2', '799', '1', null);
INSERT INTO location VALUES ('3796', 'Mosul', '2', '800', '1', null);
INSERT INTO location VALUES ('3797', 'al-Kut', '2', '801', '1', null);
INSERT INTO location VALUES ('3798', 'ReykjavÃƒÆ’Ã‚Â¬k', '2', '802', '1', null);
INSERT INTO location VALUES ('3799', 'Beerseba', '2', '803', '1', null);
INSERT INTO location VALUES ('3800', 'Ashdod', '2', '803', '1', null);
INSERT INTO location VALUES ('3801', 'Ashqelon', '2', '803', '1', null);
INSERT INTO location VALUES ('3802', 'Rishon Le Ziyyon', '2', '804', '1', null);
INSERT INTO location VALUES ('3803', 'Petah Tiqwa', '2', '804', '1', null);
INSERT INTO location VALUES ('3804', 'Netanya', '2', '804', '1', null);
INSERT INTO location VALUES ('3805', 'Rehovot', '2', '804', '1', null);
INSERT INTO location VALUES ('3806', 'Haifa', '2', '805', '1', null);
INSERT INTO location VALUES ('3807', 'Jerusalem', '2', '806', '1', null);
INSERT INTO location VALUES ('3808', 'Tel Aviv-Jaffa', '2', '807', '1', null);
INSERT INTO location VALUES ('3809', 'Holon', '2', '807', '1', null);
INSERT INTO location VALUES ('3810', 'Bat Yam', '2', '807', '1', null);
INSERT INTO location VALUES ('3811', 'Bene Beraq', '2', '807', '1', null);
INSERT INTO location VALUES ('3812', 'Ramat Gan', '2', '807', '1', null);
INSERT INTO location VALUES ('3813', 'Pescara', '2', '808', '1', null);
INSERT INTO location VALUES ('3814', 'Bari', '2', '809', '1', null);
INSERT INTO location VALUES ('3815', 'Taranto', '2', '809', '1', null);
INSERT INTO location VALUES ('3816', 'Foggia', '2', '809', '1', null);
INSERT INTO location VALUES ('3817', 'Lecce', '2', '809', '1', null);
INSERT INTO location VALUES ('3818', 'Andria', '2', '809', '1', null);
INSERT INTO location VALUES ('3819', 'Brindisi', '2', '809', '1', null);
INSERT INTO location VALUES ('3820', 'Barletta', '2', '809', '1', null);
INSERT INTO location VALUES ('3821', 'Reggio di Calabria', '2', '810', '1', null);
INSERT INTO location VALUES ('3822', 'Catanzaro', '2', '810', '1', null);
INSERT INTO location VALUES ('3823', 'Napoli', '2', '811', '1', null);
INSERT INTO location VALUES ('3824', 'Salerno', '2', '811', '1', null);
INSERT INTO location VALUES ('3825', 'Torre del Greco', '2', '811', '1', null);
INSERT INTO location VALUES ('3826', 'Giugliano in Campania', '2', '811', '1', null);
INSERT INTO location VALUES ('3827', 'Bologna', '2', '812', '1', null);
INSERT INTO location VALUES ('3828', 'Modena', '2', '812', '1', null);
INSERT INTO location VALUES ('3829', 'Parma', '2', '812', '1', null);
INSERT INTO location VALUES ('3830', 'Reggio nellÃƒâ€šÃ‚Â´ Emilia', '2', '812', '1', null);
INSERT INTO location VALUES ('3831', 'Ravenna', '2', '812', '1', null);
INSERT INTO location VALUES ('3832', 'Ferrara', '2', '812', '1', null);
INSERT INTO location VALUES ('3833', 'Rimini', '2', '812', '1', null);
INSERT INTO location VALUES ('3834', 'ForlÃƒÆ’Ã‚Â¬', '2', '812', '1', null);
INSERT INTO location VALUES ('3835', 'Piacenza', '2', '812', '1', null);
INSERT INTO location VALUES ('3836', 'Cesena', '2', '812', '1', null);
INSERT INTO location VALUES ('3837', 'Trieste', '2', '813', '1', null);
INSERT INTO location VALUES ('3838', 'Udine', '2', '813', '1', null);
INSERT INTO location VALUES ('3839', 'Roma', '2', '814', '1', null);
INSERT INTO location VALUES ('3840', 'Latina', '2', '814', '1', null);
INSERT INTO location VALUES ('3841', 'Genova', '2', '815', '1', null);
INSERT INTO location VALUES ('3842', 'La Spezia', '2', '815', '1', null);
INSERT INTO location VALUES ('3843', 'Milano', '2', '816', '1', null);
INSERT INTO location VALUES ('3844', 'Brescia', '2', '816', '1', null);
INSERT INTO location VALUES ('3845', 'Monza', '2', '816', '1', null);
INSERT INTO location VALUES ('3846', 'Bergamo', '2', '816', '1', null);
INSERT INTO location VALUES ('3847', 'Ancona', '2', '817', '1', null);
INSERT INTO location VALUES ('3848', 'Pesaro', '2', '817', '1', null);
INSERT INTO location VALUES ('3849', 'Torino', '2', '818', '1', null);
INSERT INTO location VALUES ('3850', 'Novara', '2', '818', '1', null);
INSERT INTO location VALUES ('3851', 'Alessandria', '2', '818', '1', null);
INSERT INTO location VALUES ('3852', 'Cagliari', '2', '819', '1', null);
INSERT INTO location VALUES ('3853', 'Sassari', '2', '819', '1', null);
INSERT INTO location VALUES ('3854', 'Palermo', '2', '820', '1', null);
INSERT INTO location VALUES ('3855', 'Catania', '2', '820', '1', null);
INSERT INTO location VALUES ('3856', 'Messina', '2', '820', '1', null);
INSERT INTO location VALUES ('3857', 'Syrakusa', '2', '820', '1', null);
INSERT INTO location VALUES ('3858', 'Firenze', '2', '821', '1', null);
INSERT INTO location VALUES ('3859', 'Prato', '2', '821', '1', null);
INSERT INTO location VALUES ('3860', 'Livorno', '2', '821', '1', null);
INSERT INTO location VALUES ('3861', 'Pisa', '2', '821', '1', null);
INSERT INTO location VALUES ('3862', 'Arezzo', '2', '821', '1', null);
INSERT INTO location VALUES ('3863', 'Trento', '2', '822', '1', null);
INSERT INTO location VALUES ('3864', 'Bolzano', '2', '822', '1', null);
INSERT INTO location VALUES ('3865', 'Perugia', '2', '823', '1', null);
INSERT INTO location VALUES ('3866', 'Terni', '2', '823', '1', null);
INSERT INTO location VALUES ('3867', 'Venezia', '2', '824', '1', null);
INSERT INTO location VALUES ('3868', 'Verona', '2', '824', '1', null);
INSERT INTO location VALUES ('3869', 'Padova', '2', '824', '1', null);
INSERT INTO location VALUES ('3870', 'Vicenza', '2', '824', '1', null);
INSERT INTO location VALUES ('3871', 'Kingston', '2', '825', '1', null);
INSERT INTO location VALUES ('3872', 'Portmore', '2', '825', '1', null);
INSERT INTO location VALUES ('3873', 'Spanish Town', '2', '826', '1', null);
INSERT INTO location VALUES ('3874', 'al-Zarqa', '2', '827', '1', null);
INSERT INTO location VALUES ('3875', 'al-Rusayfa', '2', '827', '1', null);
INSERT INTO location VALUES ('3876', 'Amman', '2', '828', '1', null);
INSERT INTO location VALUES ('3877', 'Wadi al-Sir', '2', '828', '1', null);
INSERT INTO location VALUES ('3878', 'Irbid', '2', '829', '1', null);
INSERT INTO location VALUES ('3879', 'Nagoya', '2', '830', '1', null);
INSERT INTO location VALUES ('3880', 'Toyohashi', '2', '830', '1', null);
INSERT INTO location VALUES ('3881', 'Toyota', '2', '830', '1', null);
INSERT INTO location VALUES ('3882', 'Okazaki', '2', '830', '1', null);
INSERT INTO location VALUES ('3883', 'Kasugai', '2', '830', '1', null);
INSERT INTO location VALUES ('3884', 'Ichinomiya', '2', '830', '1', null);
INSERT INTO location VALUES ('3885', 'Anjo', '2', '830', '1', null);
INSERT INTO location VALUES ('3886', 'Komaki', '2', '830', '1', null);
INSERT INTO location VALUES ('3887', 'Seto', '2', '830', '1', null);
INSERT INTO location VALUES ('3888', 'Kariya', '2', '830', '1', null);
INSERT INTO location VALUES ('3889', 'Toyokawa', '2', '830', '1', null);
INSERT INTO location VALUES ('3890', 'Handa', '2', '830', '1', null);
INSERT INTO location VALUES ('3891', 'Tokai', '2', '830', '1', null);
INSERT INTO location VALUES ('3892', 'Inazawa', '2', '830', '1', null);
INSERT INTO location VALUES ('3893', 'Konan', '2', '830', '1', null);
INSERT INTO location VALUES ('3894', 'Akita', '2', '831', '1', null);
INSERT INTO location VALUES ('3895', 'Aomori', '2', '832', '1', null);
INSERT INTO location VALUES ('3896', 'Hachinohe', '2', '832', '1', null);
INSERT INTO location VALUES ('3897', 'Hirosaki', '2', '832', '1', null);
INSERT INTO location VALUES ('3898', 'Chiba', '2', '833', '1', null);
INSERT INTO location VALUES ('3899', 'Funabashi', '2', '833', '1', null);
INSERT INTO location VALUES ('3900', 'Matsudo', '2', '833', '1', null);
INSERT INTO location VALUES ('3901', 'Ichikawa', '2', '833', '1', null);
INSERT INTO location VALUES ('3902', 'Kashiwa', '2', '833', '1', null);
INSERT INTO location VALUES ('3903', 'Ichihara', '2', '833', '1', null);
INSERT INTO location VALUES ('3904', 'Sakura', '2', '833', '1', null);
INSERT INTO location VALUES ('3905', 'Yachiyo', '2', '833', '1', null);
INSERT INTO location VALUES ('3906', 'Narashino', '2', '833', '1', null);
INSERT INTO location VALUES ('3907', 'Nagareyama', '2', '833', '1', null);
INSERT INTO location VALUES ('3908', 'Urayasu', '2', '833', '1', null);
INSERT INTO location VALUES ('3909', 'Abiko', '2', '833', '1', null);
INSERT INTO location VALUES ('3910', 'Kisarazu', '2', '833', '1', null);
INSERT INTO location VALUES ('3911', 'Noda', '2', '833', '1', null);
INSERT INTO location VALUES ('3912', 'Kamagaya', '2', '833', '1', null);
INSERT INTO location VALUES ('3913', 'Nishio', '2', '833', '1', null);
INSERT INTO location VALUES ('3914', 'Kimitsu', '2', '833', '1', null);
INSERT INTO location VALUES ('3915', 'Mobara', '2', '833', '1', null);
INSERT INTO location VALUES ('3916', 'Narita', '2', '833', '1', null);
INSERT INTO location VALUES ('3917', 'Matsuyama', '2', '834', '1', null);
INSERT INTO location VALUES ('3918', 'Niihama', '2', '834', '1', null);
INSERT INTO location VALUES ('3919', 'Imabari', '2', '834', '1', null);
INSERT INTO location VALUES ('3920', 'Fukui', '2', '835', '1', null);
INSERT INTO location VALUES ('3921', 'Fukuoka', '2', '836', '1', null);
INSERT INTO location VALUES ('3922', 'Kitakyushu', '2', '836', '1', null);
INSERT INTO location VALUES ('3923', 'Kurume', '2', '836', '1', null);
INSERT INTO location VALUES ('3924', 'Omuta', '2', '836', '1', null);
INSERT INTO location VALUES ('3925', 'Kasuga', '2', '836', '1', null);
INSERT INTO location VALUES ('3926', 'Iwaki', '2', '837', '1', null);
INSERT INTO location VALUES ('3927', 'Koriyama', '2', '837', '1', null);
INSERT INTO location VALUES ('3928', 'Fukushima', '2', '837', '1', null);
INSERT INTO location VALUES ('3929', 'Aizuwakamatsu', '2', '837', '1', null);
INSERT INTO location VALUES ('3930', 'Gifu', '2', '838', '1', null);
INSERT INTO location VALUES ('3931', 'Ogaki', '2', '838', '1', null);
INSERT INTO location VALUES ('3932', 'Kakamigahara', '2', '838', '1', null);
INSERT INTO location VALUES ('3933', 'Tajimi', '2', '838', '1', null);
INSERT INTO location VALUES ('3934', 'Maebashi', '2', '839', '1', null);
INSERT INTO location VALUES ('3935', 'Takasaki', '2', '839', '1', null);
INSERT INTO location VALUES ('3936', 'Ota', '2', '839', '1', null);
INSERT INTO location VALUES ('3937', 'Isesaki', '2', '839', '1', null);
INSERT INTO location VALUES ('3938', 'Kiryu', '2', '839', '1', null);
INSERT INTO location VALUES ('3939', 'Hiroshima', '2', '840', '1', null);
INSERT INTO location VALUES ('3940', 'Fukuyama', '2', '840', '1', null);
INSERT INTO location VALUES ('3941', 'Kure', '2', '840', '1', null);
INSERT INTO location VALUES ('3942', 'Higashihiroshima', '2', '840', '1', null);
INSERT INTO location VALUES ('3943', 'Onomichi', '2', '840', '1', null);
INSERT INTO location VALUES ('3944', 'Sapporo', '2', '841', '1', null);
INSERT INTO location VALUES ('3945', 'Asahikawa', '2', '841', '1', null);
INSERT INTO location VALUES ('3946', 'Hakodate', '2', '841', '1', null);
INSERT INTO location VALUES ('3947', 'Kushiro', '2', '841', '1', null);
INSERT INTO location VALUES ('3948', 'Obihiro', '2', '841', '1', null);
INSERT INTO location VALUES ('3949', 'Tomakomai', '2', '841', '1', null);
INSERT INTO location VALUES ('3950', 'Otaru', '2', '841', '1', null);
INSERT INTO location VALUES ('3951', 'Ebetsu', '2', '841', '1', null);
INSERT INTO location VALUES ('3952', 'Kitami', '2', '841', '1', null);
INSERT INTO location VALUES ('3953', 'Muroran', '2', '841', '1', null);
INSERT INTO location VALUES ('3954', 'Kobe', '2', '842', '1', null);
INSERT INTO location VALUES ('3955', 'Amagasaki', '2', '842', '1', null);
INSERT INTO location VALUES ('3956', 'Himeji', '2', '842', '1', null);
INSERT INTO location VALUES ('3957', 'Nishinomiya', '2', '842', '1', null);
INSERT INTO location VALUES ('3958', 'Akashi', '2', '842', '1', null);
INSERT INTO location VALUES ('3959', 'Kakogawa', '2', '842', '1', null);
INSERT INTO location VALUES ('3960', 'Takarazuka', '2', '842', '1', null);
INSERT INTO location VALUES ('3961', 'Itami', '2', '842', '1', null);
INSERT INTO location VALUES ('3962', 'Kawanishi', '2', '842', '1', null);
INSERT INTO location VALUES ('3963', 'Sanda', '2', '842', '1', null);
INSERT INTO location VALUES ('3964', 'Takasago', '2', '842', '1', null);
INSERT INTO location VALUES ('3965', 'Mito', '2', '843', '1', null);
INSERT INTO location VALUES ('3966', 'Hitachi', '2', '843', '1', null);
INSERT INTO location VALUES ('3967', 'Tsukuba', '2', '843', '1', null);
INSERT INTO location VALUES ('3968', 'Tama', '2', '843', '1', null);
INSERT INTO location VALUES ('3969', 'Tsuchiura', '2', '843', '1', null);
INSERT INTO location VALUES ('3970', 'Kanazawa', '2', '844', '1', null);
INSERT INTO location VALUES ('3971', 'Komatsu', '2', '844', '1', null);
INSERT INTO location VALUES ('3972', 'Morioka', '2', '845', '1', null);
INSERT INTO location VALUES ('3973', 'Takamatsu', '2', '846', '1', null);
INSERT INTO location VALUES ('3974', 'Kagoshima', '2', '847', '1', null);
INSERT INTO location VALUES ('3975', 'Jokohama [Yokohama]', '2', '848', '1', null);
INSERT INTO location VALUES ('3976', 'Kawasaki', '2', '848', '1', null);
INSERT INTO location VALUES ('3977', 'Sagamihara', '2', '848', '1', null);
INSERT INTO location VALUES ('3978', 'Yokosuka', '2', '848', '1', null);
INSERT INTO location VALUES ('3979', 'Fujisawa', '2', '848', '1', null);
INSERT INTO location VALUES ('3980', 'Hiratsuka', '2', '848', '1', null);
INSERT INTO location VALUES ('3981', 'Chigasaki', '2', '848', '1', null);
INSERT INTO location VALUES ('3982', 'Atsugi', '2', '848', '1', null);
INSERT INTO location VALUES ('3983', 'Yamato', '2', '848', '1', null);
INSERT INTO location VALUES ('3984', 'Odawara', '2', '848', '1', null);
INSERT INTO location VALUES ('3985', 'Kamakura', '2', '848', '1', null);
INSERT INTO location VALUES ('3986', 'Hadano', '2', '848', '1', null);
INSERT INTO location VALUES ('3987', 'Zama', '2', '848', '1', null);
INSERT INTO location VALUES ('3988', 'Ebina', '2', '848', '1', null);
INSERT INTO location VALUES ('3989', 'Isehara', '2', '848', '1', null);
INSERT INTO location VALUES ('3990', 'Kochi', '2', '849', '1', null);
INSERT INTO location VALUES ('3991', 'Kumamoto', '2', '850', '1', null);
INSERT INTO location VALUES ('3992', 'Yatsushiro', '2', '850', '1', null);
INSERT INTO location VALUES ('3993', 'Kioto', '2', '851', '1', null);
INSERT INTO location VALUES ('3994', 'Uji', '2', '851', '1', null);
INSERT INTO location VALUES ('3995', 'Maizuru', '2', '851', '1', null);
INSERT INTO location VALUES ('3996', 'Kameoka', '2', '851', '1', null);
INSERT INTO location VALUES ('3997', 'Yokkaichi', '2', '852', '1', null);
INSERT INTO location VALUES ('3998', 'Suzuka', '2', '852', '1', null);
INSERT INTO location VALUES ('3999', 'Tsu', '2', '852', '1', null);
INSERT INTO location VALUES ('4000', 'Matsusaka', '2', '852', '1', null);
INSERT INTO location VALUES ('4001', 'Kuwana', '2', '852', '1', null);
INSERT INTO location VALUES ('4002', 'Ise', '2', '852', '1', null);
INSERT INTO location VALUES ('4003', 'Sendai', '2', '853', '1', null);
INSERT INTO location VALUES ('4004', 'Ishinomaki', '2', '853', '1', null);
INSERT INTO location VALUES ('4005', 'Miyazaki', '2', '854', '1', null);
INSERT INTO location VALUES ('4006', 'Miyakonojo', '2', '854', '1', null);
INSERT INTO location VALUES ('4007', 'Nobeoka', '2', '854', '1', null);
INSERT INTO location VALUES ('4008', 'Nagano', '2', '855', '1', null);
INSERT INTO location VALUES ('4009', 'Matsumoto', '2', '855', '1', null);
INSERT INTO location VALUES ('4010', 'Ueda', '2', '855', '1', null);
INSERT INTO location VALUES ('4011', 'Iida', '2', '855', '1', null);
INSERT INTO location VALUES ('4012', 'Nagasaki', '2', '856', '1', null);
INSERT INTO location VALUES ('4013', 'Sasebo', '2', '856', '1', null);
INSERT INTO location VALUES ('4014', 'Isahaya', '2', '856', '1', null);
INSERT INTO location VALUES ('4015', 'Nara', '2', '857', '1', null);
INSERT INTO location VALUES ('4016', 'Kashihara', '2', '857', '1', null);
INSERT INTO location VALUES ('4017', 'Ikoma', '2', '857', '1', null);
INSERT INTO location VALUES ('4018', 'Yamatokoriyama', '2', '857', '1', null);
INSERT INTO location VALUES ('4019', 'Niigata', '2', '858', '1', null);
INSERT INTO location VALUES ('4020', 'Nagaoka', '2', '858', '1', null);
INSERT INTO location VALUES ('4021', 'Joetsu', '2', '858', '1', null);
INSERT INTO location VALUES ('4022', 'Kashiwazaki', '2', '858', '1', null);
INSERT INTO location VALUES ('4023', 'Oita', '2', '859', '1', null);
INSERT INTO location VALUES ('4024', 'Beppu', '2', '859', '1', null);
INSERT INTO location VALUES ('4025', 'Okayama', '2', '860', '1', null);
INSERT INTO location VALUES ('4026', 'Kurashiki', '2', '860', '1', null);
INSERT INTO location VALUES ('4027', 'Tsuyama', '2', '860', '1', null);
INSERT INTO location VALUES ('4028', 'Naha', '2', '861', '1', null);
INSERT INTO location VALUES ('4029', 'Okinawa', '2', '861', '1', null);
INSERT INTO location VALUES ('4030', 'Urasoe', '2', '861', '1', null);
INSERT INTO location VALUES ('4031', 'Osaka', '2', '862', '1', null);
INSERT INTO location VALUES ('4032', 'Sakai', '2', '862', '1', null);
INSERT INTO location VALUES ('4033', 'Higashiosaka', '2', '862', '1', null);
INSERT INTO location VALUES ('4034', 'Hirakata', '2', '862', '1', null);
INSERT INTO location VALUES ('4035', 'Toyonaka', '2', '862', '1', null);
INSERT INTO location VALUES ('4036', 'Takatsuki', '2', '862', '1', null);
INSERT INTO location VALUES ('4037', 'Suita', '2', '862', '1', null);
INSERT INTO location VALUES ('4038', 'Yao', '2', '862', '1', null);
INSERT INTO location VALUES ('4039', 'Ibaraki', '2', '862', '1', null);
INSERT INTO location VALUES ('4040', 'Neyagawa', '2', '862', '1', null);
INSERT INTO location VALUES ('4041', 'Kishiwada', '2', '862', '1', null);
INSERT INTO location VALUES ('4042', 'Izumi', '2', '862', '1', null);
INSERT INTO location VALUES ('4043', 'Moriguchi', '2', '862', '1', null);
INSERT INTO location VALUES ('4044', 'Kadoma', '2', '862', '1', null);
INSERT INTO location VALUES ('4045', 'Matsubara', '2', '862', '1', null);
INSERT INTO location VALUES ('4046', 'Daito', '2', '862', '1', null);
INSERT INTO location VALUES ('4047', 'Minoo', '2', '862', '1', null);
INSERT INTO location VALUES ('4048', 'Tondabayashi', '2', '862', '1', null);
INSERT INTO location VALUES ('4049', 'Kawachinagano', '2', '862', '1', null);
INSERT INTO location VALUES ('4050', 'Habikino', '2', '862', '1', null);
INSERT INTO location VALUES ('4051', 'Ikeda', '2', '862', '1', null);
INSERT INTO location VALUES ('4052', 'Izumisano', '2', '862', '1', null);
INSERT INTO location VALUES ('4053', 'Saga', '2', '863', '1', null);
INSERT INTO location VALUES ('4054', 'Urawa', '2', '864', '1', null);
INSERT INTO location VALUES ('4055', 'Kawaguchi', '2', '864', '1', null);
INSERT INTO location VALUES ('4056', 'Omiya', '2', '864', '1', null);
INSERT INTO location VALUES ('4057', 'Kawagoe', '2', '864', '1', null);
INSERT INTO location VALUES ('4058', 'Tokorozawa', '2', '864', '1', null);
INSERT INTO location VALUES ('4059', 'Koshigaya', '2', '864', '1', null);
INSERT INTO location VALUES ('4060', 'Soka', '2', '864', '1', null);
INSERT INTO location VALUES ('4061', 'Ageo', '2', '864', '1', null);
INSERT INTO location VALUES ('4062', 'Kasukabe', '2', '864', '1', null);
INSERT INTO location VALUES ('4063', 'Sayama', '2', '864', '1', null);
INSERT INTO location VALUES ('4064', 'Kumagaya', '2', '864', '1', null);
INSERT INTO location VALUES ('4065', 'Niiza', '2', '864', '1', null);
INSERT INTO location VALUES ('4066', 'Iruma', '2', '864', '1', null);
INSERT INTO location VALUES ('4067', 'Misato', '2', '864', '1', null);
INSERT INTO location VALUES ('4068', 'Asaka', '2', '864', '1', null);
INSERT INTO location VALUES ('4069', 'Iwatsuki', '2', '864', '1', null);
INSERT INTO location VALUES ('4070', 'Toda', '2', '864', '1', null);
INSERT INTO location VALUES ('4071', 'Fukaya', '2', '864', '1', null);
INSERT INTO location VALUES ('4072', 'Sakado', '2', '864', '1', null);
INSERT INTO location VALUES ('4073', 'Fujimi', '2', '864', '1', null);
INSERT INTO location VALUES ('4074', 'Higashimatsuyama', '2', '864', '1', null);
INSERT INTO location VALUES ('4075', 'Otsu', '2', '865', '1', null);
INSERT INTO location VALUES ('4076', 'Kusatsu', '2', '865', '1', null);
INSERT INTO location VALUES ('4077', 'Hikone', '2', '865', '1', null);
INSERT INTO location VALUES ('4078', 'Matsue', '2', '866', '1', null);
INSERT INTO location VALUES ('4079', 'Hamamatsu', '2', '867', '1', null);
INSERT INTO location VALUES ('4080', 'Shizuoka', '2', '867', '1', null);
INSERT INTO location VALUES ('4081', 'Shimizu', '2', '867', '1', null);
INSERT INTO location VALUES ('4082', 'Fuji', '2', '867', '1', null);
INSERT INTO location VALUES ('4083', 'Numazu', '2', '867', '1', null);
INSERT INTO location VALUES ('4084', 'Fujieda', '2', '867', '1', null);
INSERT INTO location VALUES ('4085', 'Fujinomiya', '2', '867', '1', null);
INSERT INTO location VALUES ('4086', 'Yaizu', '2', '867', '1', null);
INSERT INTO location VALUES ('4087', 'Mishima', '2', '867', '1', null);
INSERT INTO location VALUES ('4088', 'Utsunomiya', '2', '868', '1', null);
INSERT INTO location VALUES ('4089', 'Ashikaga', '2', '868', '1', null);
INSERT INTO location VALUES ('4090', 'Oyama', '2', '868', '1', null);
INSERT INTO location VALUES ('4091', 'Kanuma', '2', '868', '1', null);
INSERT INTO location VALUES ('4092', 'Tokushima', '2', '869', '1', null);
INSERT INTO location VALUES ('4093', 'Tokyo', '2', '870', '1', null);
INSERT INTO location VALUES ('4094', 'Hachioji', '2', '870', '1', null);
INSERT INTO location VALUES ('4095', 'Machida', '2', '870', '1', null);
INSERT INTO location VALUES ('4096', 'Fuchu', '2', '870', '1', null);
INSERT INTO location VALUES ('4097', 'Chofu', '2', '870', '1', null);
INSERT INTO location VALUES ('4098', 'Kodaira', '2', '870', '1', null);
INSERT INTO location VALUES ('4099', 'Mitaka', '2', '870', '1', null);
INSERT INTO location VALUES ('4100', 'Hino', '2', '870', '1', null);
INSERT INTO location VALUES ('4101', 'Tachikawa', '2', '870', '1', null);
INSERT INTO location VALUES ('4102', 'Hitachinaka', '2', '870', '1', null);
INSERT INTO location VALUES ('4103', 'Ome', '2', '870', '1', null);
INSERT INTO location VALUES ('4104', 'Higashimurayama', '2', '870', '1', null);
INSERT INTO location VALUES ('4105', 'Musashino', '2', '870', '1', null);
INSERT INTO location VALUES ('4106', 'Higashikurume', '2', '870', '1', null);
INSERT INTO location VALUES ('4107', 'Koganei', '2', '870', '1', null);
INSERT INTO location VALUES ('4108', 'Kokubunji', '2', '870', '1', null);
INSERT INTO location VALUES ('4109', 'Akishima', '2', '870', '1', null);
INSERT INTO location VALUES ('4110', 'Hoya', '2', '870', '1', null);
INSERT INTO location VALUES ('4111', 'Tottori', '2', '871', '1', null);
INSERT INTO location VALUES ('4112', 'Yonago', '2', '871', '1', null);
INSERT INTO location VALUES ('4113', 'Toyama', '2', '872', '1', null);
INSERT INTO location VALUES ('4114', 'Takaoka', '2', '872', '1', null);
INSERT INTO location VALUES ('4115', 'Wakayama', '2', '873', '1', null);
INSERT INTO location VALUES ('4116', 'Yamagata', '2', '874', '1', null);
INSERT INTO location VALUES ('4117', 'Sakata', '2', '874', '1', null);
INSERT INTO location VALUES ('4118', 'Tsuruoka', '2', '874', '1', null);
INSERT INTO location VALUES ('4119', 'Yonezawa', '2', '874', '1', null);
INSERT INTO location VALUES ('4120', 'Shimonoseki', '2', '875', '1', null);
INSERT INTO location VALUES ('4121', 'Ube', '2', '875', '1', null);
INSERT INTO location VALUES ('4122', 'Yamaguchi', '2', '875', '1', null);
INSERT INTO location VALUES ('4123', 'Hofu', '2', '875', '1', null);
INSERT INTO location VALUES ('4124', 'Tokuyama', '2', '875', '1', null);
INSERT INTO location VALUES ('4125', 'Iwakuni', '2', '875', '1', null);
INSERT INTO location VALUES ('4126', 'Kofu', '2', '876', '1', null);
INSERT INTO location VALUES ('4127', 'Taldyqorghan', '2', '877', '1', null);
INSERT INTO location VALUES ('4128', 'Almaty', '2', '878', '1', null);
INSERT INTO location VALUES ('4129', 'AqtÃƒÆ’Ã‚Â¶be', '2', '879', '1', null);
INSERT INTO location VALUES ('4130', 'Astana', '2', '880', '1', null);
INSERT INTO location VALUES ('4131', 'Atyrau', '2', '881', '1', null);
INSERT INTO location VALUES ('4132', 'ÃƒÆ’Ã¢â‚¬â€œskemen', '2', '882', '1', null);
INSERT INTO location VALUES ('4133', 'Semey', '2', '882', '1', null);
INSERT INTO location VALUES ('4134', 'Aqtau', '2', '883', '1', null);
INSERT INTO location VALUES ('4135', 'Petropavl', '2', '884', '1', null);
INSERT INTO location VALUES ('4136', 'KÃƒÆ’Ã‚Â¶kshetau', '2', '884', '1', null);
INSERT INTO location VALUES ('4137', 'Pavlodar', '2', '885', '1', null);
INSERT INTO location VALUES ('4138', 'Ekibastuz', '2', '885', '1', null);
INSERT INTO location VALUES ('4139', 'Qaraghandy', '2', '886', '1', null);
INSERT INTO location VALUES ('4140', 'Temirtau', '2', '886', '1', null);
INSERT INTO location VALUES ('4141', 'Zhezqazghan', '2', '886', '1', null);
INSERT INTO location VALUES ('4142', 'Qostanay', '2', '887', '1', null);
INSERT INTO location VALUES ('4143', 'Rudnyy', '2', '887', '1', null);
INSERT INTO location VALUES ('4144', 'Qyzylorda', '2', '888', '1', null);
INSERT INTO location VALUES ('4145', 'Shymkent', '2', '889', '1', null);
INSERT INTO location VALUES ('4146', 'Taraz', '2', '890', '1', null);
INSERT INTO location VALUES ('4147', 'Oral', '2', '891', '1', null);
INSERT INTO location VALUES ('4148', 'Suva', '2', '892', '1', null);
INSERT INTO location VALUES ('4149', 'Nyeri', '2', '892', '1', null);
INSERT INTO location VALUES ('4150', 'Kathmandu', '2', '892', '1', null);
INSERT INTO location VALUES ('4151', 'Lalitapur', '2', '892', '1', null);
INSERT INTO location VALUES ('4152', 'Birgunj', '2', '892', '1', null);
INSERT INTO location VALUES ('4153', 'San Lorenzo', '2', '892', '1', null);
INSERT INTO location VALUES ('4154', 'LambarÃƒÆ’Ã‚Â©', '2', '892', '1', null);
INSERT INTO location VALUES ('4155', 'Fernando de la Mora', '2', '892', '1', null);
INSERT INTO location VALUES ('4156', 'Kabwe', '2', '892', '1', null);
INSERT INTO location VALUES ('4157', 'Kandy', '2', '892', '1', null);
INSERT INTO location VALUES ('4158', 'Kampala', '2', '892', '1', null);
INSERT INTO location VALUES ('4159', 'Mombasa', '2', '893', '1', null);
INSERT INTO location VALUES ('4160', 'Machakos', '2', '894', '1', null);
INSERT INTO location VALUES ('4161', 'Meru', '2', '894', '1', null);
INSERT INTO location VALUES ('4162', 'Biratnagar', '2', '894', '1', null);
INSERT INTO location VALUES ('4163', 'Nairobi', '2', '895', '1', null);
INSERT INTO location VALUES ('4164', 'Kisumu', '2', '896', '1', null);
INSERT INTO location VALUES ('4165', 'Nakuru', '2', '897', '1', null);
INSERT INTO location VALUES ('4166', 'Eldoret', '2', '897', '1', null);
INSERT INTO location VALUES ('4167', 'Bishkek', '2', '898', '1', null);
INSERT INTO location VALUES ('4168', 'Osh', '2', '899', '1', null);
INSERT INTO location VALUES ('4169', 'Battambang', '2', '900', '1', null);
INSERT INTO location VALUES ('4170', 'Phnom Penh', '2', '901', '1', null);
INSERT INTO location VALUES ('4171', 'Siem Reap', '2', '902', '1', null);
INSERT INTO location VALUES ('4172', 'Bikenibeu', '2', '903', '1', null);
INSERT INTO location VALUES ('4173', 'Bairiki', '2', '903', '1', null);
INSERT INTO location VALUES ('4174', 'Basseterre', '2', '904', '1', null);
INSERT INTO location VALUES ('4175', 'Cheju', '2', '905', '1', null);
INSERT INTO location VALUES ('4176', 'Chonju', '2', '906', '1', null);
INSERT INTO location VALUES ('4177', 'Iksan', '2', '906', '1', null);
INSERT INTO location VALUES ('4178', 'Kunsan', '2', '906', '1', null);
INSERT INTO location VALUES ('4179', 'Chong-up', '2', '906', '1', null);
INSERT INTO location VALUES ('4180', 'Kimje', '2', '906', '1', null);
INSERT INTO location VALUES ('4181', 'Namwon', '2', '906', '1', null);
INSERT INTO location VALUES ('4182', 'Sunchon', '2', '907', '1', null);
INSERT INTO location VALUES ('4183', 'Mokpo', '2', '907', '1', null);
INSERT INTO location VALUES ('4184', 'Yosu', '2', '907', '1', null);
INSERT INTO location VALUES ('4185', 'Kwang-yang', '2', '907', '1', null);
INSERT INTO location VALUES ('4186', 'Naju', '2', '907', '1', null);
INSERT INTO location VALUES ('4187', 'Chongju', '2', '908', '1', null);
INSERT INTO location VALUES ('4188', 'Chungju', '2', '908', '1', null);
INSERT INTO location VALUES ('4189', 'Chechon', '2', '908', '1', null);
INSERT INTO location VALUES ('4190', 'Chonan', '2', '909', '1', null);
INSERT INTO location VALUES ('4191', 'Asan', '2', '909', '1', null);
INSERT INTO location VALUES ('4192', 'Nonsan', '2', '909', '1', null);
INSERT INTO location VALUES ('4193', 'Sosan', '2', '909', '1', null);
INSERT INTO location VALUES ('4194', 'Kongju', '2', '909', '1', null);
INSERT INTO location VALUES ('4195', 'Poryong', '2', '909', '1', null);
INSERT INTO location VALUES ('4196', 'Inchon', '2', '910', '1', null);
INSERT INTO location VALUES ('4197', 'Wonju', '2', '911', '1', null);
INSERT INTO location VALUES ('4198', 'Chunchon', '2', '911', '1', null);
INSERT INTO location VALUES ('4199', 'Kangnung', '2', '911', '1', null);
INSERT INTO location VALUES ('4200', 'Tonghae', '2', '911', '1', null);
INSERT INTO location VALUES ('4201', 'Kwangju', '2', '912', '1', null);
INSERT INTO location VALUES ('4202', 'Songnam', '2', '913', '1', null);
INSERT INTO location VALUES ('4203', 'Puchon', '2', '913', '1', null);
INSERT INTO location VALUES ('4204', 'Suwon', '2', '913', '1', null);
INSERT INTO location VALUES ('4205', 'Anyang', '2', '913', '1', null);
INSERT INTO location VALUES ('4206', 'Koyang', '2', '913', '1', null);
INSERT INTO location VALUES ('4207', 'Ansan', '2', '913', '1', null);
INSERT INTO location VALUES ('4208', 'Kwangmyong', '2', '913', '1', null);
INSERT INTO location VALUES ('4209', 'Pyongtaek', '2', '913', '1', null);
INSERT INTO location VALUES ('4210', 'Uijongbu', '2', '913', '1', null);
INSERT INTO location VALUES ('4211', 'Yong-in', '2', '913', '1', null);
INSERT INTO location VALUES ('4212', 'Kunpo', '2', '913', '1', null);
INSERT INTO location VALUES ('4213', 'Namyangju', '2', '913', '1', null);
INSERT INTO location VALUES ('4214', 'Paju', '2', '913', '1', null);
INSERT INTO location VALUES ('4215', 'Ichon', '2', '913', '1', null);
INSERT INTO location VALUES ('4216', 'Kuri', '2', '913', '1', null);
INSERT INTO location VALUES ('4217', 'Shihung', '2', '913', '1', null);
INSERT INTO location VALUES ('4218', 'Hanam', '2', '913', '1', null);
INSERT INTO location VALUES ('4219', 'Uiwang', '2', '913', '1', null);
INSERT INTO location VALUES ('4220', 'Pohang', '2', '914', '1', null);
INSERT INTO location VALUES ('4221', 'Kumi', '2', '914', '1', null);
INSERT INTO location VALUES ('4222', 'Kyongju', '2', '914', '1', null);
INSERT INTO location VALUES ('4223', 'Andong', '2', '914', '1', null);
INSERT INTO location VALUES ('4224', 'Kyongsan', '2', '914', '1', null);
INSERT INTO location VALUES ('4225', 'Kimchon', '2', '914', '1', null);
INSERT INTO location VALUES ('4226', 'Yongju', '2', '914', '1', null);
INSERT INTO location VALUES ('4227', 'Sangju', '2', '914', '1', null);
INSERT INTO location VALUES ('4228', 'Yongchon', '2', '914', '1', null);
INSERT INTO location VALUES ('4229', 'Mun-gyong', '2', '914', '1', null);
INSERT INTO location VALUES ('4230', 'Ulsan', '2', '915', '1', null);
INSERT INTO location VALUES ('4231', 'Chang-won', '2', '915', '1', null);
INSERT INTO location VALUES ('4232', 'Masan', '2', '915', '1', null);
INSERT INTO location VALUES ('4233', 'Chinju', '2', '915', '1', null);
INSERT INTO location VALUES ('4234', 'Kimhae', '2', '915', '1', null);
INSERT INTO location VALUES ('4235', 'Yangsan', '2', '915', '1', null);
INSERT INTO location VALUES ('4236', 'Koje', '2', '915', '1', null);
INSERT INTO location VALUES ('4237', 'Tong-yong', '2', '915', '1', null);
INSERT INTO location VALUES ('4238', 'Chinhae', '2', '915', '1', null);
INSERT INTO location VALUES ('4239', 'Miryang', '2', '915', '1', null);
INSERT INTO location VALUES ('4240', 'Sachon', '2', '915', '1', null);
INSERT INTO location VALUES ('4241', 'Pusan', '2', '916', '1', null);
INSERT INTO location VALUES ('4242', 'Seoul', '2', '917', '1', null);
INSERT INTO location VALUES ('4243', 'Taegu', '2', '918', '1', null);
INSERT INTO location VALUES ('4244', 'Taejon', '2', '919', '1', null);
INSERT INTO location VALUES ('4245', 'Kuwait', '2', '920', '1', null);
INSERT INTO location VALUES ('4246', 'al-Salimiya', '2', '921', '1', null);
INSERT INTO location VALUES ('4247', 'Jalib al-Shuyukh', '2', '921', '1', null);
INSERT INTO location VALUES ('4248', 'Savannakhet', '2', '922', '1', null);
INSERT INTO location VALUES ('4249', 'Vientiane', '2', '923', '1', null);
INSERT INTO location VALUES ('4250', 'Tripoli', '2', '924', '1', null);
INSERT INTO location VALUES ('4251', 'Beirut', '2', '925', '1', null);
INSERT INTO location VALUES ('4252', 'Monrovia', '2', '926', '1', null);
INSERT INTO location VALUES ('4253', 'al-Zawiya', '2', '927', '1', null);
INSERT INTO location VALUES ('4254', 'Bengasi', '2', '928', '1', null);
INSERT INTO location VALUES ('4255', 'Misrata', '2', '929', '1', null);
INSERT INTO location VALUES ('4256', 'Tripoli', '2', '930', '1', null);
INSERT INTO location VALUES ('4257', 'Castries', '2', '931', '1', null);
INSERT INTO location VALUES ('4258', 'Schaan', '2', '932', '1', null);
INSERT INTO location VALUES ('4259', 'Vaduz', '2', '933', '1', null);
INSERT INTO location VALUES ('4260', 'Suva', '2', '934', '1', null);
INSERT INTO location VALUES ('4261', 'Nyeri', '2', '934', '1', null);
INSERT INTO location VALUES ('4262', 'Kathmandu', '2', '934', '1', null);
INSERT INTO location VALUES ('4263', 'Lalitapur', '2', '934', '1', null);
INSERT INTO location VALUES ('4264', 'Birgunj', '2', '934', '1', null);
INSERT INTO location VALUES ('4265', 'San Lorenzo', '2', '934', '1', null);
INSERT INTO location VALUES ('4266', 'LambarÃƒÆ’Ã‚Â©', '2', '934', '1', null);
INSERT INTO location VALUES ('4267', 'Fernando de la Mora', '2', '934', '1', null);
INSERT INTO location VALUES ('4268', 'Kabwe', '2', '934', '1', null);
INSERT INTO location VALUES ('4269', 'Kandy', '2', '934', '1', null);
INSERT INTO location VALUES ('4270', 'Kampala', '2', '934', '1', null);
INSERT INTO location VALUES ('4271', 'Tamale', '2', '935', '1', null);
INSERT INTO location VALUES ('4272', 'Jaffna', '2', '935', '1', null);
INSERT INTO location VALUES ('4273', 'Sekondi-Takoradi', '2', '936', '1', null);
INSERT INTO location VALUES ('4274', 'Pokhara', '2', '936', '1', null);
INSERT INTO location VALUES ('4275', 'Freetown', '2', '936', '1', null);
INSERT INTO location VALUES ('4276', 'Colombo', '2', '936', '1', null);
INSERT INTO location VALUES ('4277', 'Dehiwala', '2', '936', '1', null);
INSERT INTO location VALUES ('4278', 'Moratuwa', '2', '936', '1', null);
INSERT INTO location VALUES ('4279', 'Sri Jayawardenepura Kotte', '2', '936', '1', null);
INSERT INTO location VALUES ('4280', 'Negombo', '2', '936', '1', null);
INSERT INTO location VALUES ('4281', 'Maseru', '2', '937', '1', null);
INSERT INTO location VALUES ('4282', 'Kaunas', '2', '938', '1', null);
INSERT INTO location VALUES ('4283', 'Klaipeda', '2', '939', '1', null);
INSERT INTO location VALUES ('4284', 'Panevezys', '2', '940', '1', null);
INSERT INTO location VALUES ('4285', 'Vilnius', '2', '941', '1', null);
INSERT INTO location VALUES ('4286', 'Ãƒâ€¦ iauliai', '2', '942', '1', null);
INSERT INTO location VALUES ('4287', 'Luxembourg [Luxemburg/LÃƒÆ’Ã‚Â', '2', '943', '1', null);
INSERT INTO location VALUES ('4288', 'Daugavpils', '2', '944', '1', null);
INSERT INTO location VALUES ('4289', 'Liepaja', '2', '945', '1', null);
INSERT INTO location VALUES ('4290', 'Riga', '2', '946', '1', null);
INSERT INTO location VALUES ('4291', 'Macao', '2', '947', '1', null);
INSERT INTO location VALUES ('4292', 'Casablanca', '2', '948', '1', null);
INSERT INTO location VALUES ('4293', 'Mohammedia', '2', '948', '1', null);
INSERT INTO location VALUES ('4294', 'Khouribga', '2', '949', '1', null);
INSERT INTO location VALUES ('4295', 'Settat', '2', '949', '1', null);
INSERT INTO location VALUES ('4296', 'Safi', '2', '950', '1', null);
INSERT INTO location VALUES ('4297', 'El Jadida', '2', '950', '1', null);
INSERT INTO location VALUES ('4298', 'FÃƒÆ’Ã‚Â¨s', '2', '951', '1', null);
INSERT INTO location VALUES ('4299', 'KÃƒÆ’Ã‚Â©nitra', '2', '952', '1', null);
INSERT INTO location VALUES ('4300', 'Marrakech', '2', '953', '1', null);
INSERT INTO location VALUES ('4301', 'MeknÃƒÆ’Ã‚Â¨s', '2', '954', '1', null);
INSERT INTO location VALUES ('4302', 'Oujda', '2', '955', '1', null);
INSERT INTO location VALUES ('4303', 'Nador', '2', '955', '1', null);
INSERT INTO location VALUES ('4304', 'Rabat', '2', '956', '1', null);
INSERT INTO location VALUES ('4305', 'SalÃƒÆ’Ã‚Â©', '2', '956', '1', null);
INSERT INTO location VALUES ('4306', 'TÃƒÆ’Ã‚Â©mara', '2', '956', '1', null);
INSERT INTO location VALUES ('4307', 'Agadir', '2', '957', '1', null);
INSERT INTO location VALUES ('4308', 'Beni-Mellal', '2', '958', '1', null);
INSERT INTO location VALUES ('4309', 'Tanger', '2', '959', '1', null);
INSERT INTO location VALUES ('4310', 'TÃƒÆ’Ã‚Â©touan', '2', '959', '1', null);
INSERT INTO location VALUES ('4311', 'Ksar el Kebir', '2', '959', '1', null);
INSERT INTO location VALUES ('4312', 'El Araich', '2', '959', '1', null);
INSERT INTO location VALUES ('4313', 'Taza', '2', '960', '1', null);
INSERT INTO location VALUES ('4314', 'South Hill', '2', '961', '1', null);
INSERT INTO location VALUES ('4315', 'The Valley', '2', '961', '1', null);
INSERT INTO location VALUES ('4316', 'Oranjestad', '2', '961', '1', null);
INSERT INTO location VALUES ('4317', 'Douglas', '2', '961', '1', null);
INSERT INTO location VALUES ('4318', 'Gibraltar', '2', '961', '1', null);
INSERT INTO location VALUES ('4319', 'Tamuning', '2', '961', '1', null);
INSERT INTO location VALUES ('4320', 'AgaÃƒÆ’Ã‚Â±a', '2', '961', '1', null);
INSERT INTO location VALUES ('4321', 'Flying Fish Cove', '2', '961', '1', null);
INSERT INTO location VALUES ('4322', 'Monte-Carlo', '2', '961', '1', null);
INSERT INTO location VALUES ('4323', 'Monaco-Ville', '2', '961', '1', null);
INSERT INTO location VALUES ('4324', 'Yangor', '2', '961', '1', null);
INSERT INTO location VALUES ('4325', 'Yaren', '2', '961', '1', null);
INSERT INTO location VALUES ('4326', 'Alofi', '2', '961', '1', null);
INSERT INTO location VALUES ('4327', 'Kingston', '2', '961', '1', null);
INSERT INTO location VALUES ('4328', 'Adamstown', '2', '961', '1', null);
INSERT INTO location VALUES ('4329', 'Singapore', '2', '961', '1', null);
INSERT INTO location VALUES ('4330', 'NoumÃƒÆ’Ã‚Â©a', '2', '961', '1', null);
INSERT INTO location VALUES ('4331', 'CittÃƒÆ’  del Vaticano', '2', '961', '1', null);
INSERT INTO location VALUES ('4332', 'Balti', '2', '962', '1', null);
INSERT INTO location VALUES ('4333', 'Bender (TÃƒÆ’Ã‚Â®ghina)', '2', '963', '1', null);
INSERT INTO location VALUES ('4334', 'Chisinau', '2', '964', '1', null);
INSERT INTO location VALUES ('4335', 'Tiraspol', '2', '965', '1', null);
INSERT INTO location VALUES ('4336', 'Antananarivo', '2', '966', '1', null);
INSERT INTO location VALUES ('4337', 'AntsirabÃƒÆ’Ã‚Â©', '2', '966', '1', null);
INSERT INTO location VALUES ('4338', 'Fianarantsoa', '2', '967', '1', null);
INSERT INTO location VALUES ('4339', 'Mahajanga', '2', '968', '1', null);
INSERT INTO location VALUES ('4340', 'Toamasina', '2', '969', '1', null);
INSERT INTO location VALUES ('4341', 'Male', '2', '970', '1', null);
INSERT INTO location VALUES ('4342', 'Aguascalientes', '2', '971', '1', null);
INSERT INTO location VALUES ('4343', 'Tijuana', '2', '972', '1', null);
INSERT INTO location VALUES ('4344', 'Mexicali', '2', '972', '1', null);
INSERT INTO location VALUES ('4345', 'Ensenada', '2', '972', '1', null);
INSERT INTO location VALUES ('4346', 'La Paz', '2', '973', '1', null);
INSERT INTO location VALUES ('4347', 'Los Cabos', '2', '973', '1', null);
INSERT INTO location VALUES ('4348', 'Campeche', '2', '974', '1', null);
INSERT INTO location VALUES ('4349', 'Carmen', '2', '974', '1', null);
INSERT INTO location VALUES ('4350', 'Tuxtla GutiÃƒÆ’Ã‚Â©rrez', '2', '975', '1', null);
INSERT INTO location VALUES ('4351', 'Tapachula', '2', '975', '1', null);
INSERT INTO location VALUES ('4352', 'Ocosingo', '2', '975', '1', null);
INSERT INTO location VALUES ('4353', 'San CristÃƒÆ’Ã‚Â³bal de las Ca', '2', '975', '1', null);
INSERT INTO location VALUES ('4354', 'ComitÃƒÆ’Ã‚Â¡n de DomÃƒÆ’Ã‚Â¬n', '2', '975', '1', null);
INSERT INTO location VALUES ('4355', 'Las Margaritas', '2', '975', '1', null);
INSERT INTO location VALUES ('4356', 'JuÃƒÆ’Ã‚Â¡rez', '2', '976', '1', null);
INSERT INTO location VALUES ('4357', 'Chihuahua', '2', '976', '1', null);
INSERT INTO location VALUES ('4358', 'CuauhtÃƒÆ’Ã‚Â©moc', '2', '976', '1', null);
INSERT INTO location VALUES ('4359', 'Delicias', '2', '976', '1', null);
INSERT INTO location VALUES ('4360', 'Hidalgo del Parral', '2', '976', '1', null);
INSERT INTO location VALUES ('4361', 'Saltillo', '2', '977', '1', null);
INSERT INTO location VALUES ('4362', 'TorreÃƒÆ’Ã‚Â³n', '2', '977', '1', null);
INSERT INTO location VALUES ('4363', 'Monclova', '2', '977', '1', null);
INSERT INTO location VALUES ('4364', 'Piedras Negras', '2', '977', '1', null);
INSERT INTO location VALUES ('4365', 'AcuÃƒÆ’Ã‚Â±a', '2', '977', '1', null);
INSERT INTO location VALUES ('4366', 'Matamoros', '2', '977', '1', null);
INSERT INTO location VALUES ('4367', 'Colima', '2', '978', '1', null);
INSERT INTO location VALUES ('4368', 'Manzanillo', '2', '978', '1', null);
INSERT INTO location VALUES ('4369', 'TecomÃƒÆ’Ã‚Â¡n', '2', '978', '1', null);
INSERT INTO location VALUES ('4370', 'Buenos Aires', '2', '979', '1', null);
INSERT INTO location VALUES ('4371', 'BrasÃƒÆ’Ã‚Â¬lia', '2', '979', '1', null);
INSERT INTO location VALUES ('4372', 'Ciudad de MÃƒÆ’Ã‚Â©xico', '2', '979', '1', null);
INSERT INTO location VALUES ('4373', 'Caracas', '2', '979', '1', null);
INSERT INTO location VALUES ('4374', 'Catia La Mar', '2', '979', '1', null);
INSERT INTO location VALUES ('4375', 'Durango', '2', '980', '1', null);
INSERT INTO location VALUES ('4376', 'GÃƒÆ’Ã‚Â³mez Palacio', '2', '980', '1', null);
INSERT INTO location VALUES ('4377', 'Lerdo', '2', '980', '1', null);
INSERT INTO location VALUES ('4378', 'LeÃƒÆ’Ã‚Â³n', '2', '981', '1', null);
INSERT INTO location VALUES ('4379', 'Irapuato', '2', '981', '1', null);
INSERT INTO location VALUES ('4380', 'Celaya', '2', '981', '1', null);
INSERT INTO location VALUES ('4381', 'Salamanca', '2', '981', '1', null);
INSERT INTO location VALUES ('4382', 'PÃƒÆ’Ã‚Â©njamo', '2', '981', '1', null);
INSERT INTO location VALUES ('4383', 'Guanajuato', '2', '981', '1', null);
INSERT INTO location VALUES ('4384', 'Allende', '2', '981', '1', null);
INSERT INTO location VALUES ('4385', 'Silao', '2', '981', '1', null);
INSERT INTO location VALUES ('4386', 'Valle de Santiago', '2', '981', '1', null);
INSERT INTO location VALUES ('4387', 'Dolores Hidalgo', '2', '981', '1', null);
INSERT INTO location VALUES ('4388', 'AcÃƒÆ’Ã‚Â¡mbaro', '2', '981', '1', null);
INSERT INTO location VALUES ('4389', 'San Francisco del RincÃƒÆ’Ã‚Â³', '2', '981', '1', null);
INSERT INTO location VALUES ('4390', 'San Luis de la Paz', '2', '981', '1', null);
INSERT INTO location VALUES ('4391', 'San Felipe', '2', '981', '1', null);
INSERT INTO location VALUES ('4392', 'Salvatierra', '2', '981', '1', null);
INSERT INTO location VALUES ('4393', 'Acapulco de JuÃƒÆ’Ã‚Â¡rez', '2', '982', '1', null);
INSERT INTO location VALUES ('4394', 'Chilpancingo de los Bravo', '2', '982', '1', null);
INSERT INTO location VALUES ('4395', 'Iguala de la Independencia', '2', '982', '1', null);
INSERT INTO location VALUES ('4396', 'Chilapa de Alvarez', '2', '982', '1', null);
INSERT INTO location VALUES ('4397', 'Taxco de AlarcÃƒÆ’Ã‚Â³n', '2', '982', '1', null);
INSERT INTO location VALUES ('4398', 'JosÃƒÆ’Ã‚Â© Azueta', '2', '982', '1', null);
INSERT INTO location VALUES ('4399', 'Pachuca de Soto', '2', '983', '1', null);
INSERT INTO location VALUES ('4400', 'Tulancingo de Bravo', '2', '983', '1', null);
INSERT INTO location VALUES ('4401', 'Huejutla de Reyes', '2', '983', '1', null);
INSERT INTO location VALUES ('4402', 'Guadalajara', '2', '984', '1', null);
INSERT INTO location VALUES ('4403', 'Zapopan', '2', '984', '1', null);
INSERT INTO location VALUES ('4404', 'Tlaquepaque', '2', '984', '1', null);
INSERT INTO location VALUES ('4405', 'TonalÃƒÆ’Ã‚Â¡', '2', '984', '1', null);
INSERT INTO location VALUES ('4406', 'Puerto Vallarta', '2', '984', '1', null);
INSERT INTO location VALUES ('4407', 'Lagos de Moreno', '2', '984', '1', null);
INSERT INTO location VALUES ('4408', 'Tlajomulco de ZÃƒÆ’Ã‚ÂºÃƒÆ’Ã‚Â', '2', '984', '1', null);
INSERT INTO location VALUES ('4409', 'TepatitlÃƒÆ’Ã‚Â¡n de Morelos', '2', '984', '1', null);
INSERT INTO location VALUES ('4410', 'Ecatepec de Morelos', '2', '985', '1', null);
INSERT INTO location VALUES ('4411', 'NezahualcÃƒÆ’Ã‚Â³yotl', '2', '985', '1', null);
INSERT INTO location VALUES ('4412', 'Naucalpan de JuÃƒÆ’Ã‚Â¡rez', '2', '985', '1', null);
INSERT INTO location VALUES ('4413', 'Tlalnepantla de Baz', '2', '985', '1', null);
INSERT INTO location VALUES ('4414', 'Toluca', '2', '985', '1', null);
INSERT INTO location VALUES ('4415', 'ChimalhuacÃƒÆ’Ã‚Â¡n', '2', '985', '1', null);
INSERT INTO location VALUES ('4416', 'AtizapÃƒÆ’Ã‚Â¡n de Zaragoza', '2', '985', '1', null);
INSERT INTO location VALUES ('4417', 'CuautitlÃƒÆ’Ã‚Â¡n Izcalli', '2', '985', '1', null);
INSERT INTO location VALUES ('4418', 'TultitlÃƒÆ’Ã‚Â¡n', '2', '985', '1', null);
INSERT INTO location VALUES ('4419', 'Valle de Chalco Solidaridad', '2', '985', '1', null);
INSERT INTO location VALUES ('4420', 'Ixtapaluca', '2', '985', '1', null);
INSERT INTO location VALUES ('4421', 'NicolÃƒÆ’Ã‚Â¡s Romero', '2', '985', '1', null);
INSERT INTO location VALUES ('4422', 'Coacalco de BerriozÃƒÆ’Ã‚Â¡bal', '2', '985', '1', null);
INSERT INTO location VALUES ('4423', 'Chalco', '2', '985', '1', null);
INSERT INTO location VALUES ('4424', 'La Paz', '2', '985', '1', null);
INSERT INTO location VALUES ('4425', 'Texcoco', '2', '985', '1', null);
INSERT INTO location VALUES ('4426', 'Metepec', '2', '985', '1', null);
INSERT INTO location VALUES ('4427', 'Huixquilucan', '2', '985', '1', null);
INSERT INTO location VALUES ('4428', 'San Felipe del Progreso', '2', '985', '1', null);
INSERT INTO location VALUES ('4429', 'TecÃƒÆ’Ã‚Â¡mac', '2', '985', '1', null);
INSERT INTO location VALUES ('4430', 'Zinacantepec', '2', '985', '1', null);
INSERT INTO location VALUES ('4431', 'Ixtlahuaca', '2', '985', '1', null);
INSERT INTO location VALUES ('4432', 'Almoloya de JuÃƒÆ’Ã‚Â¡rez', '2', '985', '1', null);
INSERT INTO location VALUES ('4433', 'Zumpango', '2', '985', '1', null);
INSERT INTO location VALUES ('4434', 'Lerma', '2', '985', '1', null);
INSERT INTO location VALUES ('4435', 'Tejupilco', '2', '985', '1', null);
INSERT INTO location VALUES ('4436', 'Tultepec', '2', '985', '1', null);
INSERT INTO location VALUES ('4437', 'Morelia', '2', '986', '1', null);
INSERT INTO location VALUES ('4438', 'Uruapan', '2', '986', '1', null);
INSERT INTO location VALUES ('4439', 'LÃƒÆ’Ã‚Â¡zaro CÃƒÆ’Ã‚Â¡rdenas', '2', '986', '1', null);
INSERT INTO location VALUES ('4440', 'Zamora', '2', '986', '1', null);
INSERT INTO location VALUES ('4441', 'ZitÃƒÆ’Ã‚Â¡cuaro', '2', '986', '1', null);
INSERT INTO location VALUES ('4442', 'ApatzingÃƒÆ’Ã‚Â¡n', '2', '986', '1', null);
INSERT INTO location VALUES ('4443', 'Hidalgo', '2', '986', '1', null);
INSERT INTO location VALUES ('4444', 'Cuernavaca', '2', '987', '1', null);
INSERT INTO location VALUES ('4445', 'Jiutepec', '2', '987', '1', null);
INSERT INTO location VALUES ('4446', 'Cuautla', '2', '987', '1', null);
INSERT INTO location VALUES ('4447', 'Temixco', '2', '987', '1', null);
INSERT INTO location VALUES ('4448', 'Tepic', '2', '988', '1', null);
INSERT INTO location VALUES ('4449', 'Santiago Ixcuintla', '2', '988', '1', null);
INSERT INTO location VALUES ('4450', 'Monterrey', '2', '989', '1', null);
INSERT INTO location VALUES ('4451', 'Guadalupe', '2', '989', '1', null);
INSERT INTO location VALUES ('4452', 'San NicolÃƒÆ’Ã‚Â¡s de los Garz', '2', '989', '1', null);
INSERT INTO location VALUES ('4453', 'Apodaca', '2', '989', '1', null);
INSERT INTO location VALUES ('4454', 'General Escobedo', '2', '989', '1', null);
INSERT INTO location VALUES ('4455', 'Santa Catarina', '2', '989', '1', null);
INSERT INTO location VALUES ('4456', 'San Pedro Garza GarcÃƒÆ’Ã‚Â¬a', '2', '989', '1', null);
INSERT INTO location VALUES ('4457', 'Oaxaca de JuÃƒÆ’Ã‚Â¡rez', '2', '990', '1', null);
INSERT INTO location VALUES ('4458', 'San Juan Bautista Tuxtepec', '2', '990', '1', null);
INSERT INTO location VALUES ('4459', 'Puebla', '2', '991', '1', null);
INSERT INTO location VALUES ('4460', 'TehuacÃƒÆ’Ã‚Â¡n', '2', '991', '1', null);
INSERT INTO location VALUES ('4461', 'San MartÃƒÆ’Ã‚Â¬n Texmelucan', '2', '991', '1', null);
INSERT INTO location VALUES ('4462', 'Atlixco', '2', '991', '1', null);
INSERT INTO location VALUES ('4463', 'San Pedro Cholula', '2', '991', '1', null);
INSERT INTO location VALUES ('4464', 'San Juan del RÃƒÆ’Ã‚Â¬o', '2', '992', '1', null);
INSERT INTO location VALUES ('4465', 'QuerÃƒÆ’Ã‚Â©taro', '2', '993', '1', null);
INSERT INTO location VALUES ('4466', 'Benito JuÃƒÆ’Ã‚Â¡rez', '2', '994', '1', null);
INSERT INTO location VALUES ('4467', 'OthÃƒÆ’Ã‚Â³n P. Blanco (Chetum', '2', '994', '1', null);
INSERT INTO location VALUES ('4468', 'San Luis PotosÃƒÆ’Ã‚Â¬', '2', '995', '1', null);
INSERT INTO location VALUES ('4469', 'Soledad de Graciano SÃƒÆ’Ã‚Â¡n', '2', '995', '1', null);
INSERT INTO location VALUES ('4470', 'Ciudad Valles', '2', '995', '1', null);
INSERT INTO location VALUES ('4471', 'CuliacÃƒÆ’Ã‚Â¡n', '2', '996', '1', null);
INSERT INTO location VALUES ('4472', 'MazatlÃƒÆ’Ã‚Â¡n', '2', '996', '1', null);
INSERT INTO location VALUES ('4473', 'Ahome', '2', '996', '1', null);
INSERT INTO location VALUES ('4474', 'Guasave', '2', '996', '1', null);
INSERT INTO location VALUES ('4475', 'Navolato', '2', '996', '1', null);
INSERT INTO location VALUES ('4476', 'El Fuerte', '2', '996', '1', null);
INSERT INTO location VALUES ('4477', 'Hermosillo', '2', '997', '1', null);
INSERT INTO location VALUES ('4478', 'Cajeme', '2', '997', '1', null);
INSERT INTO location VALUES ('4479', 'Nogales', '2', '997', '1', null);
INSERT INTO location VALUES ('4480', 'San Luis RÃƒÆ’Ã‚Â¬o Colorado', '2', '997', '1', null);
INSERT INTO location VALUES ('4481', 'Navojoa', '2', '997', '1', null);
INSERT INTO location VALUES ('4482', 'Guaymas', '2', '997', '1', null);
INSERT INTO location VALUES ('4483', 'Centro (Villahermosa)', '2', '998', '1', null);
INSERT INTO location VALUES ('4484', 'CÃƒÆ’Ã‚Â¡rdenas', '2', '998', '1', null);
INSERT INTO location VALUES ('4485', 'Comalcalco', '2', '998', '1', null);
INSERT INTO location VALUES ('4486', 'Huimanguillo', '2', '998', '1', null);
INSERT INTO location VALUES ('4487', 'Macuspana', '2', '998', '1', null);
INSERT INTO location VALUES ('4488', 'CunduacÃƒÆ’Ã‚Â¡n', '2', '998', '1', null);
INSERT INTO location VALUES ('4489', 'Reynosa', '2', '999', '1', null);
INSERT INTO location VALUES ('4490', 'Matamoros', '2', '999', '1', null);
INSERT INTO location VALUES ('4491', 'Nuevo Laredo', '2', '999', '1', null);
INSERT INTO location VALUES ('4492', 'Tampico', '2', '999', '1', null);
INSERT INTO location VALUES ('4493', 'Victoria', '2', '999', '1', null);
INSERT INTO location VALUES ('4494', 'Ciudad Madero', '2', '999', '1', null);
INSERT INTO location VALUES ('4495', 'Altamira', '2', '999', '1', null);
INSERT INTO location VALUES ('4496', 'El Mante', '2', '999', '1', null);
INSERT INTO location VALUES ('4497', 'RÃƒÆ’Ã‚Â¬o Bravo', '2', '999', '1', null);
INSERT INTO location VALUES ('4498', 'Veracruz', '2', '1000', '1', null);
INSERT INTO location VALUES ('4499', 'Xalapa', '2', '1000', '1', null);
INSERT INTO location VALUES ('4500', 'Coatzacoalcos', '2', '1000', '1', null);
INSERT INTO location VALUES ('4501', 'CÃƒÆ’Ã‚Â³rdoba', '2', '1000', '1', null);
INSERT INTO location VALUES ('4502', 'Papantla', '2', '1000', '1', null);
INSERT INTO location VALUES ('4503', 'MinatitlÃƒÆ’Ã‚Â¡n', '2', '1000', '1', null);
INSERT INTO location VALUES ('4504', 'Poza Rica de Hidalgo', '2', '1000', '1', null);
INSERT INTO location VALUES ('4505', 'San AndrÃƒÆ’Ã‚Â©s Tuxtla', '2', '1000', '1', null);
INSERT INTO location VALUES ('4506', 'TÃƒÆ’Ã‚Âºxpam', '2', '1000', '1', null);
INSERT INTO location VALUES ('4507', 'MartÃƒÆ’Ã‚Â¬nez de la Torre', '2', '1000', '1', null);
INSERT INTO location VALUES ('4508', 'Orizaba', '2', '1000', '1', null);
INSERT INTO location VALUES ('4509', 'Temapache', '2', '1000', '1', null);
INSERT INTO location VALUES ('4510', 'Cosoleacaque', '2', '1000', '1', null);
INSERT INTO location VALUES ('4511', 'Tantoyuca', '2', '1000', '1', null);
INSERT INTO location VALUES ('4512', 'PÃƒÆ’Ã‚Â¡nuco', '2', '1000', '1', null);
INSERT INTO location VALUES ('4513', 'Tierra Blanca', '2', '1000', '1', null);
INSERT INTO location VALUES ('4514', 'Boca del RÃƒÆ’Ã‚Â¬o', '2', '1001', '1', null);
INSERT INTO location VALUES ('4515', 'MÃƒÆ’Ã‚Â©rida', '2', '1002', '1', null);
INSERT INTO location VALUES ('4516', 'Fresnillo', '2', '1003', '1', null);
INSERT INTO location VALUES ('4517', 'Zacatecas', '2', '1003', '1', null);
INSERT INTO location VALUES ('4518', 'Guadalupe', '2', '1003', '1', null);
INSERT INTO location VALUES ('4519', 'Dalap-Uliga-Darrit', '2', '1004', '1', null);
INSERT INTO location VALUES ('4520', 'Skopje', '2', '1005', '1', null);
INSERT INTO location VALUES ('4521', 'Bamako', '2', '1006', '1', null);
INSERT INTO location VALUES ('4522', 'Valletta', '2', '1007', '1', null);
INSERT INTO location VALUES ('4523', 'Birkirkara', '2', '1008', '1', null);
INSERT INTO location VALUES ('4524', 'Bassein (Pathein)', '2', '1009', '1', null);
INSERT INTO location VALUES ('4525', 'Henzada (Hinthada)', '2', '1009', '1', null);
INSERT INTO location VALUES ('4526', 'Pagakku (Pakokku)', '2', '1010', '1', null);
INSERT INTO location VALUES ('4527', 'Mandalay', '2', '1011', '1', null);
INSERT INTO location VALUES ('4528', 'Meikhtila', '2', '1011', '1', null);
INSERT INTO location VALUES ('4529', 'Myingyan', '2', '1011', '1', null);
INSERT INTO location VALUES ('4530', 'Moulmein (Mawlamyine)', '2', '1012', '1', null);
INSERT INTO location VALUES ('4531', 'Pegu (Bago)', '2', '1013', '1', null);
INSERT INTO location VALUES ('4532', 'Prome (Pyay)', '2', '1013', '1', null);
INSERT INTO location VALUES ('4533', 'Sittwe (Akyab)', '2', '1014', '1', null);
INSERT INTO location VALUES ('4534', 'Rangoon (Yangon)', '2', '1015', '1', null);
INSERT INTO location VALUES ('4535', 'Monywa', '2', '1016', '1', null);
INSERT INTO location VALUES ('4536', 'Taunggyi (Taunggye)', '2', '1017', '1', null);
INSERT INTO location VALUES ('4537', 'Lashio (Lasho)', '2', '1017', '1', null);
INSERT INTO location VALUES ('4538', 'Mergui (Myeik)', '2', '1018', '1', null);
INSERT INTO location VALUES ('4539', 'Tavoy (Dawei)', '2', '1018', '1', null);
INSERT INTO location VALUES ('4540', 'Ulan Bator', '2', '1019', '1', null);
INSERT INTO location VALUES ('4541', 'Garapan', '2', '1020', '1', null);
INSERT INTO location VALUES ('4542', 'Xai-Xai', '2', '1021', '1', null);
INSERT INTO location VALUES ('4543', 'Gaza', '2', '1021', '1', null);
INSERT INTO location VALUES ('4544', 'Maxixe', '2', '1022', '1', null);
INSERT INTO location VALUES ('4545', 'Chimoio', '2', '1023', '1', null);
INSERT INTO location VALUES ('4546', 'Maputo', '2', '1024', '1', null);
INSERT INTO location VALUES ('4547', 'Matola', '2', '1024', '1', null);
INSERT INTO location VALUES ('4548', 'Nampula', '2', '1025', '1', null);
INSERT INTO location VALUES ('4549', 'NaÃƒÆ’Ã‚Â§ala-Porto', '2', '1025', '1', null);
INSERT INTO location VALUES ('4550', 'Beira', '2', '1026', '1', null);
INSERT INTO location VALUES ('4551', 'Tete', '2', '1027', '1', null);
INSERT INTO location VALUES ('4552', 'Quelimane', '2', '1028', '1', null);
INSERT INTO location VALUES ('4553', 'Mocuba', '2', '1028', '1', null);
INSERT INTO location VALUES ('4554', 'Gurue', '2', '1028', '1', null);
INSERT INTO location VALUES ('4555', 'NouÃƒÆ’Ã‚Â¢dhibou', '2', '1029', '1', null);
INSERT INTO location VALUES ('4556', 'Nouakchott', '2', '1030', '1', null);
INSERT INTO location VALUES ('4557', 'Plymouth', '2', '1031', '1', null);
INSERT INTO location VALUES ('4558', 'Fort-de-France', '2', '1032', '1', null);
INSERT INTO location VALUES ('4559', 'Beau Bassin-Rose Hill', '2', '1033', '1', null);
INSERT INTO location VALUES ('4560', 'Vacoas-Phoenix', '2', '1033', '1', null);
INSERT INTO location VALUES ('4561', 'Port-Louis', '2', '1034', '1', null);
INSERT INTO location VALUES ('4562', 'Blantyre', '2', '1035', '1', null);
INSERT INTO location VALUES ('4563', 'Lilongwe', '2', '1036', '1', null);
INSERT INTO location VALUES ('4564', 'Johor Baharu', '2', '1037', '1', null);
INSERT INTO location VALUES ('4565', 'Alor Setar', '2', '1038', '1', null);
INSERT INTO location VALUES ('4566', 'Sungai Petani', '2', '1038', '1', null);
INSERT INTO location VALUES ('4567', 'Kota Bharu', '2', '1039', '1', null);
INSERT INTO location VALUES ('4568', 'Seremban', '2', '1040', '1', null);
INSERT INTO location VALUES ('4569', 'Kuantan', '2', '1041', '1', null);
INSERT INTO location VALUES ('4570', 'Ipoh', '2', '1042', '1', null);
INSERT INTO location VALUES ('4571', 'Taiping', '2', '1042', '1', null);
INSERT INTO location VALUES ('4572', 'Pinang', '2', '1043', '1', null);
INSERT INTO location VALUES ('4573', 'Sandakan', '2', '1044', '1', null);
INSERT INTO location VALUES ('4574', 'Kuching', '2', '1045', '1', null);
INSERT INTO location VALUES ('4575', 'Sibu', '2', '1045', '1', null);
INSERT INTO location VALUES ('4576', 'Petaling Jaya', '2', '1046', '1', null);
INSERT INTO location VALUES ('4577', 'Kelang', '2', '1046', '1', null);
INSERT INTO location VALUES ('4578', 'Selayang Baru', '2', '1046', '1', null);
INSERT INTO location VALUES ('4579', 'Shah Alam', '2', '1046', '1', null);
INSERT INTO location VALUES ('4580', 'Kuala Terengganu', '2', '1047', '1', null);
INSERT INTO location VALUES ('4581', 'Kuala Lumpur', '2', '1048', '1', null);
INSERT INTO location VALUES ('4582', 'Mamoutzou', '2', '1049', '1', null);
INSERT INTO location VALUES ('4583', 'Windhoek', '2', '1050', '1', null);
INSERT INTO location VALUES ('4584', 'South Hill', '2', '1051', '1', null);
INSERT INTO location VALUES ('4585', 'The Valley', '2', '1051', '1', null);
INSERT INTO location VALUES ('4586', 'Oranjestad', '2', '1051', '1', null);
INSERT INTO location VALUES ('4587', 'Douglas', '2', '1051', '1', null);
INSERT INTO location VALUES ('4588', 'Gibraltar', '2', '1051', '1', null);
INSERT INTO location VALUES ('4589', 'Tamuning', '2', '1051', '1', null);
INSERT INTO location VALUES ('4590', 'AgaÃƒÆ’Ã‚Â±a', '2', '1051', '1', null);
INSERT INTO location VALUES ('4591', 'Flying Fish Cove', '2', '1051', '1', null);
INSERT INTO location VALUES ('4592', 'Monte-Carlo', '2', '1051', '1', null);
INSERT INTO location VALUES ('4593', 'Monaco-Ville', '2', '1051', '1', null);
INSERT INTO location VALUES ('4594', 'Yangor', '2', '1051', '1', null);
INSERT INTO location VALUES ('4595', 'Yaren', '2', '1051', '1', null);
INSERT INTO location VALUES ('4596', 'Alofi', '2', '1051', '1', null);
INSERT INTO location VALUES ('4597', 'Kingston', '2', '1051', '1', null);
INSERT INTO location VALUES ('4598', 'Adamstown', '2', '1051', '1', null);
INSERT INTO location VALUES ('4599', 'Singapore', '2', '1051', '1', null);
INSERT INTO location VALUES ('4600', 'NoumÃƒÆ’Ã‚Â©a', '2', '1051', '1', null);
INSERT INTO location VALUES ('4601', 'CittÃƒÆ’  del Vaticano', '2', '1051', '1', null);
INSERT INTO location VALUES ('4602', 'Maradi', '2', '1052', '1', null);
INSERT INTO location VALUES ('4603', 'Niamey', '2', '1053', '1', null);
INSERT INTO location VALUES ('4604', 'Zinder', '2', '1054', '1', null);
INSERT INTO location VALUES ('4605', 'South Hill', '2', '1055', '1', null);
INSERT INTO location VALUES ('4606', 'The Valley', '2', '1055', '1', null);
INSERT INTO location VALUES ('4607', 'Oranjestad', '2', '1055', '1', null);
INSERT INTO location VALUES ('4608', 'Douglas', '2', '1055', '1', null);
INSERT INTO location VALUES ('4609', 'Gibraltar', '2', '1055', '1', null);
INSERT INTO location VALUES ('4610', 'Tamuning', '2', '1055', '1', null);
INSERT INTO location VALUES ('4611', 'AgaÃƒÆ’Ã‚Â±a', '2', '1055', '1', null);
INSERT INTO location VALUES ('4612', 'Flying Fish Cove', '2', '1055', '1', null);
INSERT INTO location VALUES ('4613', 'Monte-Carlo', '2', '1055', '1', null);
INSERT INTO location VALUES ('4614', 'Monaco-Ville', '2', '1055', '1', null);
INSERT INTO location VALUES ('4615', 'Yangor', '2', '1055', '1', null);
INSERT INTO location VALUES ('4616', 'Yaren', '2', '1055', '1', null);
INSERT INTO location VALUES ('4617', 'Alofi', '2', '1055', '1', null);
INSERT INTO location VALUES ('4618', 'Kingston', '2', '1055', '1', null);
INSERT INTO location VALUES ('4619', 'Adamstown', '2', '1055', '1', null);
INSERT INTO location VALUES ('4620', 'Singapore', '2', '1055', '1', null);
INSERT INTO location VALUES ('4621', 'NoumÃƒÆ’Ã‚Â©a', '2', '1055', '1', null);
INSERT INTO location VALUES ('4622', 'CittÃƒÆ’  del Vaticano', '2', '1055', '1', null);
INSERT INTO location VALUES ('4623', 'Onitsha', '2', '1056', '1', null);
INSERT INTO location VALUES ('4624', 'Enugu', '2', '1056', '1', null);
INSERT INTO location VALUES ('4625', 'Awka', '2', '1056', '1', null);
INSERT INTO location VALUES ('4626', 'Kumo', '2', '1057', '1', null);
INSERT INTO location VALUES ('4627', 'Deba Habe', '2', '1057', '1', null);
INSERT INTO location VALUES ('4628', 'Gombe', '2', '1057', '1', null);
INSERT INTO location VALUES ('4629', 'Makurdi', '2', '1058', '1', null);
INSERT INTO location VALUES ('4630', 'Maiduguri', '2', '1059', '1', null);
INSERT INTO location VALUES ('4631', 'Calabar', '2', '1060', '1', null);
INSERT INTO location VALUES ('4632', 'Ugep', '2', '1060', '1', null);
INSERT INTO location VALUES ('4633', 'Benin City', '2', '1061', '1', null);
INSERT INTO location VALUES ('4634', 'Sapele', '2', '1061', '1', null);
INSERT INTO location VALUES ('4635', 'Warri', '2', '1061', '1', null);
INSERT INTO location VALUES ('4636', 'Abuja', '2', '1062', '1', null);
INSERT INTO location VALUES ('4637', 'Aba', '2', '1063', '1', null);
INSERT INTO location VALUES ('4638', 'Zaria', '2', '1064', '1', null);
INSERT INTO location VALUES ('4639', 'Kaduna', '2', '1064', '1', null);
INSERT INTO location VALUES ('4640', 'Kano', '2', '1065', '1', null);
INSERT INTO location VALUES ('4641', 'Katsina', '2', '1066', '1', null);
INSERT INTO location VALUES ('4642', 'Ilorin', '2', '1067', '1', null);
INSERT INTO location VALUES ('4643', 'Offa', '2', '1067', '1', null);
INSERT INTO location VALUES ('4644', 'Lagos', '2', '1068', '1', null);
INSERT INTO location VALUES ('4645', 'Mushin', '2', '1068', '1', null);
INSERT INTO location VALUES ('4646', 'Ikorodu', '2', '1068', '1', null);
INSERT INTO location VALUES ('4647', 'Shomolu', '2', '1068', '1', null);
INSERT INTO location VALUES ('4648', 'Agege', '2', '1068', '1', null);
INSERT INTO location VALUES ('4649', 'Epe', '2', '1068', '1', null);
INSERT INTO location VALUES ('4650', 'Minna', '2', '1069', '1', null);
INSERT INTO location VALUES ('4651', 'Bida', '2', '1069', '1', null);
INSERT INTO location VALUES ('4652', 'Abeokuta', '2', '1070', '1', null);
INSERT INTO location VALUES ('4653', 'Ijebu-Ode', '2', '1070', '1', null);
INSERT INTO location VALUES ('4654', 'Shagamu', '2', '1070', '1', null);
INSERT INTO location VALUES ('4655', 'Ado-Ekiti', '2', '1071', '1', null);
INSERT INTO location VALUES ('4656', 'Ikerre', '2', '1071', '1', null);
INSERT INTO location VALUES ('4657', 'Ilawe-Ekiti', '2', '1071', '1', null);
INSERT INTO location VALUES ('4658', 'Owo', '2', '1071', '1', null);
INSERT INTO location VALUES ('4659', 'Ondo', '2', '1071', '1', null);
INSERT INTO location VALUES ('4660', 'Akure', '2', '1071', '1', null);
INSERT INTO location VALUES ('4661', 'Oka-Akoko', '2', '1071', '1', null);
INSERT INTO location VALUES ('4662', 'Ikare', '2', '1071', '1', null);
INSERT INTO location VALUES ('4663', 'Ise-Ekiti', '2', '1071', '1', null);
INSERT INTO location VALUES ('4664', 'Ibadan', '2', '1072', '1', null);
INSERT INTO location VALUES ('4665', 'Ogbomosho', '2', '1072', '1', null);
INSERT INTO location VALUES ('4666', 'Oshogbo', '2', '1072', '1', null);
INSERT INTO location VALUES ('4667', 'Ilesha', '2', '1072', '1', null);
INSERT INTO location VALUES ('4668', 'Iwo', '2', '1072', '1', null);
INSERT INTO location VALUES ('4669', 'Ede', '2', '1072', '1', null);
INSERT INTO location VALUES ('4670', 'Ife', '2', '1072', '1', null);
INSERT INTO location VALUES ('4671', 'Ila', '2', '1072', '1', null);
INSERT INTO location VALUES ('4672', 'Oyo', '2', '1072', '1', null);
INSERT INTO location VALUES ('4673', 'Iseyin', '2', '1072', '1', null);
INSERT INTO location VALUES ('4674', 'Ilobu', '2', '1072', '1', null);
INSERT INTO location VALUES ('4675', 'Ikirun', '2', '1072', '1', null);
INSERT INTO location VALUES ('4676', 'Shaki', '2', '1072', '1', null);
INSERT INTO location VALUES ('4677', 'Effon-Alaiye', '2', '1072', '1', null);
INSERT INTO location VALUES ('4678', 'Ikire', '2', '1072', '1', null);
INSERT INTO location VALUES ('4679', 'Inisa', '2', '1072', '1', null);
INSERT INTO location VALUES ('4680', 'Igboho', '2', '1072', '1', null);
INSERT INTO location VALUES ('4681', 'Ejigbo', '2', '1072', '1', null);
INSERT INTO location VALUES ('4682', 'Jos', '2', '1073', '1', null);
INSERT INTO location VALUES ('4683', 'Lafia', '2', '1073', '1', null);
INSERT INTO location VALUES ('4684', 'Port Harcourt', '2', '1074', '1', null);
INSERT INTO location VALUES ('4685', 'Sokoto', '2', '1075', '1', null);
INSERT INTO location VALUES ('4686', 'Gusau', '2', '1075', '1', null);
INSERT INTO location VALUES ('4687', 'Chinandega', '2', '1076', '1', null);
INSERT INTO location VALUES ('4688', 'LeÃƒÆ’Ã‚Â³n', '2', '1077', '1', null);
INSERT INTO location VALUES ('4689', 'Managua', '2', '1078', '1', null);
INSERT INTO location VALUES ('4690', 'Masaya', '2', '1079', '1', null);
INSERT INTO location VALUES ('4691', 'South Hill', '2', '1080', '1', null);
INSERT INTO location VALUES ('4692', 'The Valley', '2', '1080', '1', null);
INSERT INTO location VALUES ('4693', 'Oranjestad', '2', '1080', '1', null);
INSERT INTO location VALUES ('4694', 'Douglas', '2', '1080', '1', null);
INSERT INTO location VALUES ('4695', 'Gibraltar', '2', '1080', '1', null);
INSERT INTO location VALUES ('4696', 'Tamuning', '2', '1080', '1', null);
INSERT INTO location VALUES ('4697', 'AgaÃƒÆ’Ã‚Â±a', '2', '1080', '1', null);
INSERT INTO location VALUES ('4698', 'Flying Fish Cove', '2', '1080', '1', null);
INSERT INTO location VALUES ('4699', 'Monte-Carlo', '2', '1080', '1', null);
INSERT INTO location VALUES ('4700', 'Monaco-Ville', '2', '1080', '1', null);
INSERT INTO location VALUES ('4701', 'Yangor', '2', '1080', '1', null);
INSERT INTO location VALUES ('4702', 'Yaren', '2', '1080', '1', null);
INSERT INTO location VALUES ('4703', 'Alofi', '2', '1080', '1', null);
INSERT INTO location VALUES ('4704', 'Kingston', '2', '1080', '1', null);
INSERT INTO location VALUES ('4705', 'Adamstown', '2', '1080', '1', null);
INSERT INTO location VALUES ('4706', 'Singapore', '2', '1080', '1', null);
INSERT INTO location VALUES ('4707', 'NoumÃƒÆ’Ã‚Â©a', '2', '1080', '1', null);
INSERT INTO location VALUES ('4708', 'CittÃƒÆ’  del Vaticano', '2', '1080', '1', null);
INSERT INTO location VALUES ('4709', 'Emmen', '2', '1081', '1', null);
INSERT INTO location VALUES ('4710', 'Almere', '2', '1082', '1', null);
INSERT INTO location VALUES ('4711', 'Apeldoorn', '2', '1083', '1', null);
INSERT INTO location VALUES ('4712', 'Nijmegen', '2', '1083', '1', null);
INSERT INTO location VALUES ('4713', 'Arnhem', '2', '1083', '1', null);
INSERT INTO location VALUES ('4714', 'Ede', '2', '1083', '1', null);
INSERT INTO location VALUES ('4715', 'Groningen', '2', '1084', '1', null);
INSERT INTO location VALUES ('4716', 'Maastricht', '2', '1085', '1', null);
INSERT INTO location VALUES ('4717', 'Heerlen', '2', '1085', '1', null);
INSERT INTO location VALUES ('4718', 'Eindhoven', '2', '1086', '1', null);
INSERT INTO location VALUES ('4719', 'Tilburg', '2', '1086', '1', null);
INSERT INTO location VALUES ('4720', 'Breda', '2', '1086', '1', null);
INSERT INTO location VALUES ('4721', 'Ãƒâ€šÃ‚Â´s-Hertogenbosch', '2', '1086', '1', null);
INSERT INTO location VALUES ('4722', 'Amsterdam', '2', '1087', '1', null);
INSERT INTO location VALUES ('4723', 'Haarlem', '2', '1087', '1', null);
INSERT INTO location VALUES ('4724', 'Zaanstad', '2', '1087', '1', null);
INSERT INTO location VALUES ('4725', 'Haarlemmermeer', '2', '1087', '1', null);
INSERT INTO location VALUES ('4726', 'Alkmaar', '2', '1087', '1', null);
INSERT INTO location VALUES ('4727', 'Enschede', '2', '1088', '1', null);
INSERT INTO location VALUES ('4728', 'Zwolle', '2', '1088', '1', null);
INSERT INTO location VALUES ('4729', 'Utrecht', '2', '1089', '1', null);
INSERT INTO location VALUES ('4730', 'Amersfoort', '2', '1089', '1', null);
INSERT INTO location VALUES ('4731', 'Rotterdam', '2', '1090', '1', null);
INSERT INTO location VALUES ('4732', 'Haag', '2', '1090', '1', null);
INSERT INTO location VALUES ('4733', 'Dordrecht', '2', '1090', '1', null);
INSERT INTO location VALUES ('4734', 'Leiden', '2', '1090', '1', null);
INSERT INTO location VALUES ('4735', 'Zoetermeer', '2', '1090', '1', null);
INSERT INTO location VALUES ('4736', 'Delft', '2', '1090', '1', null);
INSERT INTO location VALUES ('4737', 'BÃƒÆ’Ã‚Â¦rum', '2', '1091', '1', null);
INSERT INTO location VALUES ('4738', 'Bergen', '2', '1092', '1', null);
INSERT INTO location VALUES ('4739', 'Oslo', '2', '1093', '1', null);
INSERT INTO location VALUES ('4740', 'Stavanger', '2', '1094', '1', null);
INSERT INTO location VALUES ('4741', 'Trondheim', '2', '1095', '1', null);
INSERT INTO location VALUES ('4742', 'Suva', '2', '1096', '1', null);
INSERT INTO location VALUES ('4743', 'Nyeri', '2', '1096', '1', null);
INSERT INTO location VALUES ('4744', 'Kathmandu', '2', '1096', '1', null);
INSERT INTO location VALUES ('4745', 'Lalitapur', '2', '1096', '1', null);
INSERT INTO location VALUES ('4746', 'Birgunj', '2', '1096', '1', null);
INSERT INTO location VALUES ('4747', 'San Lorenzo', '2', '1096', '1', null);
INSERT INTO location VALUES ('4748', 'LambarÃƒÆ’Ã‚Â©', '2', '1096', '1', null);
INSERT INTO location VALUES ('4749', 'Fernando de la Mora', '2', '1096', '1', null);
INSERT INTO location VALUES ('4750', 'Kabwe', '2', '1096', '1', null);
INSERT INTO location VALUES ('4751', 'Kandy', '2', '1096', '1', null);
INSERT INTO location VALUES ('4752', 'Kampala', '2', '1096', '1', null);
INSERT INTO location VALUES ('4753', 'Machakos', '2', '1097', '1', null);
INSERT INTO location VALUES ('4754', 'Meru', '2', '1097', '1', null);
INSERT INTO location VALUES ('4755', 'Biratnagar', '2', '1097', '1', null);
INSERT INTO location VALUES ('4756', 'Sekondi-Takoradi', '2', '1098', '1', null);
INSERT INTO location VALUES ('4757', 'Pokhara', '2', '1098', '1', null);
INSERT INTO location VALUES ('4758', 'Freetown', '2', '1098', '1', null);
INSERT INTO location VALUES ('4759', 'Colombo', '2', '1098', '1', null);
INSERT INTO location VALUES ('4760', 'Dehiwala', '2', '1098', '1', null);
INSERT INTO location VALUES ('4761', 'Moratuwa', '2', '1098', '1', null);
INSERT INTO location VALUES ('4762', 'Sri Jayawardenepura Kotte', '2', '1098', '1', null);
INSERT INTO location VALUES ('4763', 'Negombo', '2', '1098', '1', null);
INSERT INTO location VALUES ('4764', 'South Hill', '2', '1099', '1', null);
INSERT INTO location VALUES ('4765', 'The Valley', '2', '1099', '1', null);
INSERT INTO location VALUES ('4766', 'Oranjestad', '2', '1099', '1', null);
INSERT INTO location VALUES ('4767', 'Douglas', '2', '1099', '1', null);
INSERT INTO location VALUES ('4768', 'Gibraltar', '2', '1099', '1', null);
INSERT INTO location VALUES ('4769', 'Tamuning', '2', '1099', '1', null);
INSERT INTO location VALUES ('4770', 'AgaÃƒÆ’Ã‚Â±a', '2', '1099', '1', null);
INSERT INTO location VALUES ('4771', 'Flying Fish Cove', '2', '1099', '1', null);
INSERT INTO location VALUES ('4772', 'Monte-Carlo', '2', '1099', '1', null);
INSERT INTO location VALUES ('4773', 'Monaco-Ville', '2', '1099', '1', null);
INSERT INTO location VALUES ('4774', 'Yangor', '2', '1099', '1', null);
INSERT INTO location VALUES ('4775', 'Yaren', '2', '1099', '1', null);
INSERT INTO location VALUES ('4776', 'Alofi', '2', '1099', '1', null);
INSERT INTO location VALUES ('4777', 'Kingston', '2', '1099', '1', null);
INSERT INTO location VALUES ('4778', 'Adamstown', '2', '1099', '1', null);
INSERT INTO location VALUES ('4779', 'Singapore', '2', '1099', '1', null);
INSERT INTO location VALUES ('4780', 'NoumÃƒÆ’Ã‚Â©a', '2', '1099', '1', null);
INSERT INTO location VALUES ('4781', 'CittÃƒÆ’  del Vaticano', '2', '1099', '1', null);
INSERT INTO location VALUES ('4782', 'Auckland', '2', '1100', '1', null);
INSERT INTO location VALUES ('4783', 'Manukau', '2', '1100', '1', null);
INSERT INTO location VALUES ('4784', 'North Shore', '2', '1100', '1', null);
INSERT INTO location VALUES ('4785', 'Waitakere', '2', '1100', '1', null);
INSERT INTO location VALUES ('4786', 'Christchurch', '2', '1101', '1', null);
INSERT INTO location VALUES ('4787', 'Dunedin', '2', '1102', '1', null);
INSERT INTO location VALUES ('4788', 'Hamilton', '2', '1103', '1', null);
INSERT INTO location VALUES ('4789', 'Hamilton', '2', '1103', '1', null);
INSERT INTO location VALUES ('4790', 'Wellington', '2', '1104', '1', null);
INSERT INTO location VALUES ('4791', 'Lower Hutt', '2', '1104', '1', null);
INSERT INTO location VALUES ('4792', 'Suhar', '2', '1105', '1', null);
INSERT INTO location VALUES ('4793', 'al-Sib', '2', '1106', '1', null);
INSERT INTO location VALUES ('4794', 'Bawshar', '2', '1106', '1', null);
INSERT INTO location VALUES ('4795', 'Masqat', '2', '1106', '1', null);
INSERT INTO location VALUES ('4796', 'Salala', '2', '1107', '1', null);
INSERT INTO location VALUES ('4797', 'Quetta', '2', '1108', '1', null);
INSERT INTO location VALUES ('4798', 'Khuzdar', '2', '1108', '1', null);
INSERT INTO location VALUES ('4799', 'Islamabad', '2', '1109', '1', null);
INSERT INTO location VALUES ('4800', 'Peshawar', '2', '1110', '1', null);
INSERT INTO location VALUES ('4801', 'Mardan', '2', '1110', '1', null);
INSERT INTO location VALUES ('4802', 'Mingora', '2', '1110', '1', null);
INSERT INTO location VALUES ('4803', 'Kohat', '2', '1110', '1', null);
INSERT INTO location VALUES ('4804', 'Abottabad', '2', '1110', '1', null);
INSERT INTO location VALUES ('4805', 'Dera Ismail Khan', '2', '1110', '1', null);
INSERT INTO location VALUES ('4806', 'Nowshera', '2', '1110', '1', null);
INSERT INTO location VALUES ('4807', 'Ludhiana', '2', '1111', '1', null);
INSERT INTO location VALUES ('4808', 'Amritsar', '2', '1111', '1', null);
INSERT INTO location VALUES ('4809', 'Jalandhar (Jullundur)', '2', '1111', '1', null);
INSERT INTO location VALUES ('4810', 'Patiala', '2', '1111', '1', null);
INSERT INTO location VALUES ('4811', 'Bhatinda (Bathinda)', '2', '1111', '1', null);
INSERT INTO location VALUES ('4812', 'Pathankot', '2', '1111', '1', null);
INSERT INTO location VALUES ('4813', 'Hoshiarpur', '2', '1111', '1', null);
INSERT INTO location VALUES ('4814', 'Moga', '2', '1111', '1', null);
INSERT INTO location VALUES ('4815', 'Abohar', '2', '1111', '1', null);
INSERT INTO location VALUES ('4816', 'Lahore', '2', '1111', '1', null);
INSERT INTO location VALUES ('4817', 'Faisalabad', '2', '1111', '1', null);
INSERT INTO location VALUES ('4818', 'Rawalpindi', '2', '1111', '1', null);
INSERT INTO location VALUES ('4819', 'Multan', '2', '1111', '1', null);
INSERT INTO location VALUES ('4820', 'Gujranwala', '2', '1111', '1', null);
INSERT INTO location VALUES ('4821', 'Sargodha', '2', '1111', '1', null);
INSERT INTO location VALUES ('4822', 'Sialkot', '2', '1111', '1', null);
INSERT INTO location VALUES ('4823', 'Bahawalpur', '2', '1111', '1', null);
INSERT INTO location VALUES ('4824', 'Jhang', '2', '1111', '1', null);
INSERT INTO location VALUES ('4825', 'Sheikhupura', '2', '1111', '1', null);
INSERT INTO location VALUES ('4826', 'Gujrat', '2', '1111', '1', null);
INSERT INTO location VALUES ('4827', 'Kasur', '2', '1111', '1', null);
INSERT INTO location VALUES ('4828', 'Rahim Yar Khan', '2', '1111', '1', null);
INSERT INTO location VALUES ('4829', 'Sahiwal', '2', '1111', '1', null);
INSERT INTO location VALUES ('4830', 'Okara', '2', '1111', '1', null);
INSERT INTO location VALUES ('4831', 'Wah', '2', '1111', '1', null);
INSERT INTO location VALUES ('4832', 'Dera Ghazi Khan', '2', '1111', '1', null);
INSERT INTO location VALUES ('4833', 'Chiniot', '2', '1111', '1', null);
INSERT INTO location VALUES ('4834', 'Kamoke', '2', '1111', '1', null);
INSERT INTO location VALUES ('4835', 'Mandi Burewala', '2', '1111', '1', null);
INSERT INTO location VALUES ('4836', 'Jhelum', '2', '1111', '1', null);
INSERT INTO location VALUES ('4837', 'Sadiqabad', '2', '1111', '1', null);
INSERT INTO location VALUES ('4838', 'Khanewal', '2', '1111', '1', null);
INSERT INTO location VALUES ('4839', 'Hafizabad', '2', '1111', '1', null);
INSERT INTO location VALUES ('4840', 'Muzaffargarh', '2', '1111', '1', null);
INSERT INTO location VALUES ('4841', 'Khanpur', '2', '1111', '1', null);
INSERT INTO location VALUES ('4842', 'Gojra', '2', '1111', '1', null);
INSERT INTO location VALUES ('4843', 'Bahawalnagar', '2', '1111', '1', null);
INSERT INTO location VALUES ('4844', 'Muridke', '2', '1111', '1', null);
INSERT INTO location VALUES ('4845', 'Pak Pattan', '2', '1111', '1', null);
INSERT INTO location VALUES ('4846', 'Jaranwala', '2', '1111', '1', null);
INSERT INTO location VALUES ('4847', 'Chishtian Mandi', '2', '1111', '1', null);
INSERT INTO location VALUES ('4848', 'Daska', '2', '1111', '1', null);
INSERT INTO location VALUES ('4849', 'Mandi Bahauddin', '2', '1111', '1', null);
INSERT INTO location VALUES ('4850', 'Ahmadpur East', '2', '1111', '1', null);
INSERT INTO location VALUES ('4851', 'Kamalia', '2', '1111', '1', null);
INSERT INTO location VALUES ('4852', 'Vihari', '2', '1111', '1', null);
INSERT INTO location VALUES ('4853', 'Wazirabad', '2', '1111', '1', null);
INSERT INTO location VALUES ('4854', 'Mirpur Khas', '2', '1112', '1', null);
INSERT INTO location VALUES ('4855', 'Nawabshah', '2', '1112', '1', null);
INSERT INTO location VALUES ('4856', 'Jacobabad', '2', '1112', '1', null);
INSERT INTO location VALUES ('4857', 'Shikarpur', '2', '1112', '1', null);
INSERT INTO location VALUES ('4858', 'Tando Adam', '2', '1112', '1', null);
INSERT INTO location VALUES ('4859', 'Khairpur', '2', '1112', '1', null);
INSERT INTO location VALUES ('4860', 'Dadu', '2', '1112', '1', null);
INSERT INTO location VALUES ('4861', 'Karachi', '2', '1113', '1', null);
INSERT INTO location VALUES ('4862', 'Hyderabad', '2', '1113', '1', null);
INSERT INTO location VALUES ('4863', 'Sukkur', '2', '1113', '1', null);
INSERT INTO location VALUES ('4864', 'Larkana', '2', '1113', '1', null);
INSERT INTO location VALUES ('4865', 'Ciudad de PanamÃƒÆ’Ã‚Â¡', '2', '1114', '1', null);
INSERT INTO location VALUES ('4866', 'San Miguelito', '2', '1115', '1', null);
INSERT INTO location VALUES ('4867', 'South Hill', '2', '1116', '1', null);
INSERT INTO location VALUES ('4868', 'The Valley', '2', '1116', '1', null);
INSERT INTO location VALUES ('4869', 'Oranjestad', '2', '1116', '1', null);
INSERT INTO location VALUES ('4870', 'Douglas', '2', '1116', '1', null);
INSERT INTO location VALUES ('4871', 'Gibraltar', '2', '1116', '1', null);
INSERT INTO location VALUES ('4872', 'Tamuning', '2', '1116', '1', null);
INSERT INTO location VALUES ('4873', 'AgaÃƒÆ’Ã‚Â±a', '2', '1116', '1', null);
INSERT INTO location VALUES ('4874', 'Flying Fish Cove', '2', '1116', '1', null);
INSERT INTO location VALUES ('4875', 'Monte-Carlo', '2', '1116', '1', null);
INSERT INTO location VALUES ('4876', 'Monaco-Ville', '2', '1116', '1', null);
INSERT INTO location VALUES ('4877', 'Yangor', '2', '1116', '1', null);
INSERT INTO location VALUES ('4878', 'Yaren', '2', '1116', '1', null);
INSERT INTO location VALUES ('4879', 'Alofi', '2', '1116', '1', null);
INSERT INTO location VALUES ('4880', 'Kingston', '2', '1116', '1', null);
INSERT INTO location VALUES ('4881', 'Adamstown', '2', '1116', '1', null);
INSERT INTO location VALUES ('4882', 'Singapore', '2', '1116', '1', null);
INSERT INTO location VALUES ('4883', 'NoumÃƒÆ’Ã‚Â©a', '2', '1116', '1', null);
INSERT INTO location VALUES ('4884', 'CittÃƒÆ’  del Vaticano', '2', '1116', '1', null);
INSERT INTO location VALUES ('4885', 'Chimbote', '2', '1117', '1', null);
INSERT INTO location VALUES ('4886', 'Arequipa', '2', '1118', '1', null);
INSERT INTO location VALUES ('4887', 'Ayacucho', '2', '1119', '1', null);
INSERT INTO location VALUES ('4888', 'Cajamarca', '2', '1120', '1', null);
INSERT INTO location VALUES ('4889', 'Callao', '2', '1121', '1', null);
INSERT INTO location VALUES ('4890', 'Ventanilla', '2', '1121', '1', null);
INSERT INTO location VALUES ('4891', 'Cusco', '2', '1122', '1', null);
INSERT INTO location VALUES ('4892', 'HuÃƒÆ’Ã‚Â¡nuco', '2', '1123', '1', null);
INSERT INTO location VALUES ('4893', 'Ica', '2', '1124', '1', null);
INSERT INTO location VALUES ('4894', 'Chincha Alta', '2', '1124', '1', null);
INSERT INTO location VALUES ('4895', 'Huancayo', '2', '1125', '1', null);
INSERT INTO location VALUES ('4896', 'Nueva San Salvador', '2', '1126', '1', null);
INSERT INTO location VALUES ('4897', 'Trujillo', '2', '1126', '1', null);
INSERT INTO location VALUES ('4898', 'Chiclayo', '2', '1127', '1', null);
INSERT INTO location VALUES ('4899', 'Lima', '2', '1128', '1', null);
INSERT INTO location VALUES ('4900', 'Iquitos', '2', '1129', '1', null);
INSERT INTO location VALUES ('4901', 'Piura', '2', '1130', '1', null);
INSERT INTO location VALUES ('4902', 'Sullana', '2', '1130', '1', null);
INSERT INTO location VALUES ('4903', 'Castilla', '2', '1130', '1', null);
INSERT INTO location VALUES ('4904', 'Juliaca', '2', '1131', '1', null);
INSERT INTO location VALUES ('4905', 'Puno', '2', '1131', '1', null);
INSERT INTO location VALUES ('4906', 'Tacna', '2', '1132', '1', null);
INSERT INTO location VALUES ('4907', 'Pucallpa', '2', '1133', '1', null);
INSERT INTO location VALUES ('4908', 'Sultan Kudarat', '2', '1134', '1', null);
INSERT INTO location VALUES ('4909', 'Legazpi', '2', '1135', '1', null);
INSERT INTO location VALUES ('4910', 'Naga', '2', '1135', '1', null);
INSERT INTO location VALUES ('4911', 'Tabaco', '2', '1135', '1', null);
INSERT INTO location VALUES ('4912', 'Daraga (Locsin)', '2', '1135', '1', null);
INSERT INTO location VALUES ('4913', 'Sorsogon', '2', '1135', '1', null);
INSERT INTO location VALUES ('4914', 'Ligao', '2', '1135', '1', null);
INSERT INTO location VALUES ('4915', 'Tuguegarao', '2', '1136', '1', null);
INSERT INTO location VALUES ('4916', 'Ilagan', '2', '1136', '1', null);
INSERT INTO location VALUES ('4917', 'Santiago', '2', '1136', '1', null);
INSERT INTO location VALUES ('4918', 'Cauayan', '2', '1136', '1', null);
INSERT INTO location VALUES ('4919', 'Baguio', '2', '1137', '1', null);
INSERT INTO location VALUES ('4920', 'Butuan', '2', '1138', '1', null);
INSERT INTO location VALUES ('4921', 'Surigao', '2', '1138', '1', null);
INSERT INTO location VALUES ('4922', 'Bislig', '2', '1138', '1', null);
INSERT INTO location VALUES ('4923', 'Bayugan', '2', '1138', '1', null);
INSERT INTO location VALUES ('4924', 'San JosÃƒÆ’Ã‚Â© del Monte', '2', '1139', '1', null);
INSERT INTO location VALUES ('4925', 'Angeles', '2', '1139', '1', null);
INSERT INTO location VALUES ('4926', 'Tarlac', '2', '1139', '1', null);
INSERT INTO location VALUES ('4927', 'Cabanatuan', '2', '1139', '1', null);
INSERT INTO location VALUES ('4928', 'San Fernando', '2', '1139', '1', null);
INSERT INTO location VALUES ('4929', 'Olongapo', '2', '1139', '1', null);
INSERT INTO location VALUES ('4930', 'Malolos', '2', '1139', '1', null);
INSERT INTO location VALUES ('4931', 'Mabalacat', '2', '1139', '1', null);
INSERT INTO location VALUES ('4932', 'Meycauayan', '2', '1139', '1', null);
INSERT INTO location VALUES ('4933', 'Santa Maria', '2', '1139', '1', null);
INSERT INTO location VALUES ('4934', 'Lubao', '2', '1139', '1', null);
INSERT INTO location VALUES ('4935', 'San Miguel', '2', '1139', '1', null);
INSERT INTO location VALUES ('4936', 'Baliuag', '2', '1139', '1', null);
INSERT INTO location VALUES ('4937', 'Concepcion', '2', '1139', '1', null);
INSERT INTO location VALUES ('4938', 'Hagonoy', '2', '1139', '1', null);
INSERT INTO location VALUES ('4939', 'Mexico', '2', '1139', '1', null);
INSERT INTO location VALUES ('4940', 'San Jose', '2', '1139', '1', null);
INSERT INTO location VALUES ('4941', 'Arayat', '2', '1139', '1', null);
INSERT INTO location VALUES ('4942', 'Marilao', '2', '1139', '1', null);
INSERT INTO location VALUES ('4943', 'Talavera', '2', '1139', '1', null);
INSERT INTO location VALUES ('4944', 'Guagua', '2', '1139', '1', null);
INSERT INTO location VALUES ('4945', 'Capas', '2', '1139', '1', null);
INSERT INTO location VALUES ('4946', 'Iligan', '2', '1140', '1', null);
INSERT INTO location VALUES ('4947', 'Cotabato', '2', '1140', '1', null);
INSERT INTO location VALUES ('4948', 'Marawi', '2', '1140', '1', null);
INSERT INTO location VALUES ('4949', 'Midsayap', '2', '1140', '1', null);
INSERT INTO location VALUES ('4950', 'Kidapawan', '2', '1140', '1', null);
INSERT INTO location VALUES ('4951', 'Cebu', '2', '1141', '1', null);
INSERT INTO location VALUES ('4952', 'Mandaue', '2', '1141', '1', null);
INSERT INTO location VALUES ('4953', 'Lapu-Lapu', '2', '1141', '1', null);
INSERT INTO location VALUES ('4954', 'Talisay', '2', '1141', '1', null);
INSERT INTO location VALUES ('4955', 'Toledo', '2', '1141', '1', null);
INSERT INTO location VALUES ('4956', 'Dumaguete', '2', '1141', '1', null);
INSERT INTO location VALUES ('4957', 'Bayawan (Tulong)', '2', '1141', '1', null);
INSERT INTO location VALUES ('4958', 'Danao', '2', '1141', '1', null);
INSERT INTO location VALUES ('4959', 'Tacloban', '2', '1142', '1', null);
INSERT INTO location VALUES ('4960', 'Ormoc', '2', '1142', '1', null);
INSERT INTO location VALUES ('4961', 'Calbayog', '2', '1142', '1', null);
INSERT INTO location VALUES ('4962', 'Baybay', '2', '1142', '1', null);
INSERT INTO location VALUES ('4963', 'San Carlos', '2', '1143', '1', null);
INSERT INTO location VALUES ('4964', 'Dagupan', '2', '1143', '1', null);
INSERT INTO location VALUES ('4965', 'Malasiqui', '2', '1143', '1', null);
INSERT INTO location VALUES ('4966', 'Urdaneta', '2', '1143', '1', null);
INSERT INTO location VALUES ('4967', 'San Fernando', '2', '1143', '1', null);
INSERT INTO location VALUES ('4968', 'Bayambang', '2', '1143', '1', null);
INSERT INTO location VALUES ('4969', 'Laoag', '2', '1143', '1', null);
INSERT INTO location VALUES ('4970', 'Quezon', '2', '1144', '1', null);
INSERT INTO location VALUES ('4971', 'Manila', '2', '1144', '1', null);
INSERT INTO location VALUES ('4972', 'Kalookan', '2', '1144', '1', null);
INSERT INTO location VALUES ('4973', 'Pasig', '2', '1144', '1', null);
INSERT INTO location VALUES ('4974', 'Valenzuela', '2', '1144', '1', null);
INSERT INTO location VALUES ('4975', 'Las PiÃƒÆ’Ã‚Â±as', '2', '1144', '1', null);
INSERT INTO location VALUES ('4976', 'Taguig', '2', '1144', '1', null);
INSERT INTO location VALUES ('4977', 'ParaÃƒÆ’Ã‚Â±aque', '2', '1144', '1', null);
INSERT INTO location VALUES ('4978', 'Makati', '2', '1144', '1', null);
INSERT INTO location VALUES ('4979', 'Marikina', '2', '1144', '1', null);
INSERT INTO location VALUES ('4980', 'Muntinlupa', '2', '1144', '1', null);
INSERT INTO location VALUES ('4981', 'Pasay', '2', '1144', '1', null);
INSERT INTO location VALUES ('4982', 'Malabon', '2', '1144', '1', null);
INSERT INTO location VALUES ('4983', 'Mandaluyong', '2', '1144', '1', null);
INSERT INTO location VALUES ('4984', 'Navotas', '2', '1144', '1', null);
INSERT INTO location VALUES ('4985', 'San Juan del Monte', '2', '1144', '1', null);
INSERT INTO location VALUES ('4986', 'Cagayan de Oro', '2', '1145', '1', null);
INSERT INTO location VALUES ('4987', 'Valencia', '2', '1145', '1', null);
INSERT INTO location VALUES ('4988', 'Malaybalay', '2', '1145', '1', null);
INSERT INTO location VALUES ('4989', 'Ozamis', '2', '1145', '1', null);
INSERT INTO location VALUES ('4990', 'Gingoog', '2', '1145', '1', null);
INSERT INTO location VALUES ('4991', 'Davao', '2', '1146', '1', null);
INSERT INTO location VALUES ('4992', 'General Santos', '2', '1146', '1', null);
INSERT INTO location VALUES ('4993', 'Tagum', '2', '1146', '1', null);
INSERT INTO location VALUES ('4994', 'Panabo', '2', '1146', '1', null);
INSERT INTO location VALUES ('4995', 'Koronadal', '2', '1146', '1', null);
INSERT INTO location VALUES ('4996', 'Digos', '2', '1146', '1', null);
INSERT INTO location VALUES ('4997', 'Polomolok', '2', '1146', '1', null);
INSERT INTO location VALUES ('4998', 'Mati', '2', '1146', '1', null);
INSERT INTO location VALUES ('4999', 'Malita', '2', '1146', '1', null);
INSERT INTO location VALUES ('5000', 'Malungon', '2', '1146', '1', null);
INSERT INTO location VALUES ('5001', 'Antipolo', '2', '1147', '1', null);
INSERT INTO location VALUES ('5002', 'DasmariÃƒÆ’Ã‚Â±as', '2', '1147', '1', null);
INSERT INTO location VALUES ('5003', 'Bacoor', '2', '1147', '1', null);
INSERT INTO location VALUES ('5004', 'Calamba', '2', '1147', '1', null);
INSERT INTO location VALUES ('5005', 'Batangas', '2', '1147', '1', null);
INSERT INTO location VALUES ('5006', 'Cainta', '2', '1147', '1', null);
INSERT INTO location VALUES ('5007', 'San Pedro', '2', '1147', '1', null);
INSERT INTO location VALUES ('5008', 'Lipa', '2', '1147', '1', null);
INSERT INTO location VALUES ('5009', 'San Pablo', '2', '1147', '1', null);
INSERT INTO location VALUES ('5010', 'BiÃƒÆ’Ã‚Â±an', '2', '1147', '1', null);
INSERT INTO location VALUES ('5011', 'Taytay', '2', '1147', '1', null);
INSERT INTO location VALUES ('5012', 'Lucena', '2', '1147', '1', null);
INSERT INTO location VALUES ('5013', 'Imus', '2', '1147', '1', null);
INSERT INTO location VALUES ('5014', 'Binangonan', '2', '1147', '1', null);
INSERT INTO location VALUES ('5015', 'Santa Rosa', '2', '1147', '1', null);
INSERT INTO location VALUES ('5016', 'Puerto Princesa', '2', '1147', '1', null);
INSERT INTO location VALUES ('5017', 'Silang', '2', '1147', '1', null);
INSERT INTO location VALUES ('5018', 'San Mateo', '2', '1147', '1', null);
INSERT INTO location VALUES ('5019', 'Tanauan', '2', '1147', '1', null);
INSERT INTO location VALUES ('5020', 'Rodriguez (Montalban)', '2', '1147', '1', null);
INSERT INTO location VALUES ('5021', 'Sariaya', '2', '1147', '1', null);
INSERT INTO location VALUES ('5022', 'General Mariano Alvarez', '2', '1147', '1', null);
INSERT INTO location VALUES ('5023', 'San Jose', '2', '1147', '1', null);
INSERT INTO location VALUES ('5024', 'Tanza', '2', '1147', '1', null);
INSERT INTO location VALUES ('5025', 'General Trias', '2', '1147', '1', null);
INSERT INTO location VALUES ('5026', 'Cabuyao', '2', '1147', '1', null);
INSERT INTO location VALUES ('5027', 'Calapan', '2', '1147', '1', null);
INSERT INTO location VALUES ('5028', 'Cavite', '2', '1147', '1', null);
INSERT INTO location VALUES ('5029', 'Nasugbu', '2', '1147', '1', null);
INSERT INTO location VALUES ('5030', 'Santa Cruz', '2', '1147', '1', null);
INSERT INTO location VALUES ('5031', 'Candelaria', '2', '1147', '1', null);
INSERT INTO location VALUES ('5032', 'Zamboanga', '2', '1148', '1', null);
INSERT INTO location VALUES ('5033', 'Pagadian', '2', '1148', '1', null);
INSERT INTO location VALUES ('5034', 'Dipolog', '2', '1148', '1', null);
INSERT INTO location VALUES ('5035', 'Bacolod', '2', '1149', '1', null);
INSERT INTO location VALUES ('5036', 'Iloilo', '2', '1149', '1', null);
INSERT INTO location VALUES ('5037', 'Kabankalan', '2', '1149', '1', null);
INSERT INTO location VALUES ('5038', 'Cadiz', '2', '1149', '1', null);
INSERT INTO location VALUES ('5039', 'Bago', '2', '1149', '1', null);
INSERT INTO location VALUES ('5040', 'Sagay', '2', '1149', '1', null);
INSERT INTO location VALUES ('5041', 'Roxas', '2', '1149', '1', null);
INSERT INTO location VALUES ('5042', 'San Carlos', '2', '1149', '1', null);
INSERT INTO location VALUES ('5043', 'Silay', '2', '1149', '1', null);
INSERT INTO location VALUES ('5044', 'Koror', '2', '1150', '1', null);
INSERT INTO location VALUES ('5045', 'Port Moresby', '2', '1151', '1', null);
INSERT INTO location VALUES ('5046', 'Wroclaw', '2', '1152', '1', null);
INSERT INTO location VALUES ('5047', 'Walbrzych', '2', '1152', '1', null);
INSERT INTO location VALUES ('5048', 'Legnica', '2', '1152', '1', null);
INSERT INTO location VALUES ('5049', 'Jelenia GÃƒÆ’Ã‚Â³ra', '2', '1152', '1', null);
INSERT INTO location VALUES ('5050', 'Bydgoszcz', '2', '1153', '1', null);
INSERT INTO location VALUES ('5051', 'Torun', '2', '1153', '1', null);
INSERT INTO location VALUES ('5052', 'Wloclawek', '2', '1153', '1', null);
INSERT INTO location VALUES ('5053', 'Grudziadz', '2', '1153', '1', null);
INSERT INTO location VALUES ('5054', 'LÃƒÆ’Ã‚Â³dz', '2', '1154', '1', null);
INSERT INTO location VALUES ('5055', 'Lublin', '2', '1155', '1', null);
INSERT INTO location VALUES ('5056', 'GorzÃƒÆ’Ã‚Â³w Wielkopolski', '2', '1156', '1', null);
INSERT INTO location VALUES ('5057', 'Zielona GÃƒÆ’Ã‚Â³ra', '2', '1156', '1', null);
INSERT INTO location VALUES ('5058', 'KrakÃƒÆ’Ã‚Â³w', '2', '1157', '1', null);
INSERT INTO location VALUES ('5059', 'TarnÃƒÆ’Ã‚Â³w', '2', '1157', '1', null);
INSERT INTO location VALUES ('5060', 'Warszawa', '2', '1158', '1', null);
INSERT INTO location VALUES ('5061', 'Radom', '2', '1158', '1', null);
INSERT INTO location VALUES ('5062', 'Plock', '2', '1158', '1', null);
INSERT INTO location VALUES ('5063', 'Opole', '2', '1159', '1', null);
INSERT INTO location VALUES ('5064', 'RzeszÃƒÆ’Ã‚Â³w', '2', '1160', '1', null);
INSERT INTO location VALUES ('5065', 'Bialystok', '2', '1161', '1', null);
INSERT INTO location VALUES ('5066', 'Gdansk', '2', '1162', '1', null);
INSERT INTO location VALUES ('5067', 'Gdynia', '2', '1162', '1', null);
INSERT INTO location VALUES ('5068', 'Slupsk', '2', '1162', '1', null);
INSERT INTO location VALUES ('5069', 'Katowice', '2', '1163', '1', null);
INSERT INTO location VALUES ('5070', 'Czestochowa', '2', '1163', '1', null);
INSERT INTO location VALUES ('5071', 'Sosnowiec', '2', '1163', '1', null);
INSERT INTO location VALUES ('5072', 'Gliwice', '2', '1163', '1', null);
INSERT INTO location VALUES ('5073', 'Bytom', '2', '1163', '1', null);
INSERT INTO location VALUES ('5074', 'Zabrze', '2', '1163', '1', null);
INSERT INTO location VALUES ('5075', 'Bielsko-Biala', '2', '1163', '1', null);
INSERT INTO location VALUES ('5076', 'Ruda Slaska', '2', '1163', '1', null);
INSERT INTO location VALUES ('5077', 'Rybnik', '2', '1163', '1', null);
INSERT INTO location VALUES ('5078', 'Tychy', '2', '1163', '1', null);
INSERT INTO location VALUES ('5079', 'Dabrowa GÃƒÆ’Ã‚Â³rnicza', '2', '1163', '1', null);
INSERT INTO location VALUES ('5080', 'ChorzÃƒÆ’Ã‚Â³w', '2', '1163', '1', null);
INSERT INTO location VALUES ('5081', 'Jastrzebie-ZdrÃƒÆ’Ã‚Â³j', '2', '1163', '1', null);
INSERT INTO location VALUES ('5082', 'Jaworzno', '2', '1163', '1', null);
INSERT INTO location VALUES ('5083', 'Kielce', '2', '1164', '1', null);
INSERT INTO location VALUES ('5084', 'Olsztyn', '2', '1165', '1', null);
INSERT INTO location VALUES ('5085', 'Elblag', '2', '1165', '1', null);
INSERT INTO location VALUES ('5086', 'Poznan', '2', '1166', '1', null);
INSERT INTO location VALUES ('5087', 'Kalisz', '2', '1166', '1', null);
INSERT INTO location VALUES ('5088', 'Szczecin', '2', '1167', '1', null);
INSERT INTO location VALUES ('5089', 'Koszalin', '2', '1167', '1', null);
INSERT INTO location VALUES ('5090', 'Arecibo', '2', '1168', '1', null);
INSERT INTO location VALUES ('5091', 'BayamÃƒÆ’Ã‚Â³n', '2', '1169', '1', null);
INSERT INTO location VALUES ('5092', 'Caguas', '2', '1170', '1', null);
INSERT INTO location VALUES ('5093', 'Carolina', '2', '1171', '1', null);
INSERT INTO location VALUES ('5094', 'Guaynabo', '2', '1172', '1', null);
INSERT INTO location VALUES ('5095', 'MayagÃƒÆ’Ã‚Â¼ez', '2', '1173', '1', null);
INSERT INTO location VALUES ('5096', 'Ponce', '2', '1174', '1', null);
INSERT INTO location VALUES ('5097', 'San Juan', '2', '1175', '1', null);
INSERT INTO location VALUES ('5098', 'San Juan', '2', '1175', '1', null);
INSERT INTO location VALUES ('5099', 'Toa Baja', '2', '1176', '1', null);
INSERT INTO location VALUES ('5100', 'Kanggye', '2', '1177', '1', null);
INSERT INTO location VALUES ('5101', 'Hamhung', '2', '1178', '1', null);
INSERT INTO location VALUES ('5102', 'Chongjin', '2', '1179', '1', null);
INSERT INTO location VALUES ('5103', 'Kimchaek', '2', '1179', '1', null);
INSERT INTO location VALUES ('5104', 'Haeju', '2', '1180', '1', null);
INSERT INTO location VALUES ('5105', 'Sariwon', '2', '1181', '1', null);
INSERT INTO location VALUES ('5106', 'Kaesong', '2', '1182', '1', null);
INSERT INTO location VALUES ('5107', 'Wonsan', '2', '1183', '1', null);
INSERT INTO location VALUES ('5108', 'Nampo', '2', '1184', '1', null);
INSERT INTO location VALUES ('5109', 'Phyongsong', '2', '1185', '1', null);
INSERT INTO location VALUES ('5110', 'Sinuiju', '2', '1186', '1', null);
INSERT INTO location VALUES ('5111', 'Pyongyang', '2', '1187', '1', null);
INSERT INTO location VALUES ('5112', 'Hyesan', '2', '1188', '1', null);
INSERT INTO location VALUES ('5113', 'Braga', '2', '1189', '1', null);
INSERT INTO location VALUES ('5114', 'CoÃƒÆ’Ã‚Â¬mbra', '2', '1190', '1', null);
INSERT INTO location VALUES ('5115', 'Lisboa', '2', '1191', '1', null);
INSERT INTO location VALUES ('5116', 'Amadora', '2', '1191', '1', null);
INSERT INTO location VALUES ('5117', 'Stockholm', '2', '1191', '1', null);
INSERT INTO location VALUES ('5118', 'Porto', '2', '1192', '1', null);
INSERT INTO location VALUES ('5119', 'Ciudad del Este', '2', '1193', '1', null);
INSERT INTO location VALUES ('5120', 'AsunciÃƒÆ’Ã‚Â³n', '2', '1194', '1', null);
INSERT INTO location VALUES ('5121', 'Suva', '2', '1195', '1', null);
INSERT INTO location VALUES ('5122', 'Nyeri', '2', '1195', '1', null);
INSERT INTO location VALUES ('5123', 'Kathmandu', '2', '1195', '1', null);
INSERT INTO location VALUES ('5124', 'Lalitapur', '2', '1195', '1', null);
INSERT INTO location VALUES ('5125', 'Birgunj', '2', '1195', '1', null);
INSERT INTO location VALUES ('5126', 'San Lorenzo', '2', '1195', '1', null);
INSERT INTO location VALUES ('5127', 'LambarÃƒÆ’Ã‚Â©', '2', '1195', '1', null);
INSERT INTO location VALUES ('5128', 'Fernando de la Mora', '2', '1195', '1', null);
INSERT INTO location VALUES ('5129', 'Kabwe', '2', '1195', '1', null);
INSERT INTO location VALUES ('5130', 'Kandy', '2', '1195', '1', null);
INSERT INTO location VALUES ('5131', 'Kampala', '2', '1195', '1', null);
INSERT INTO location VALUES ('5132', 'Xai-Xai', '2', '1196', '1', null);
INSERT INTO location VALUES ('5133', 'Gaza', '2', '1196', '1', null);
INSERT INTO location VALUES ('5134', 'Hebron', '2', '1197', '1', null);
INSERT INTO location VALUES ('5135', 'Khan Yunis', '2', '1198', '1', null);
INSERT INTO location VALUES ('5136', 'Nablus', '2', '1199', '1', null);
INSERT INTO location VALUES ('5137', 'Jabaliya', '2', '1200', '1', null);
INSERT INTO location VALUES ('5138', 'Rafah', '2', '1201', '1', null);
INSERT INTO location VALUES ('5139', 'Faaa', '2', '1202', '1', null);
INSERT INTO location VALUES ('5140', 'Papeete', '2', '1202', '1', null);
INSERT INTO location VALUES ('5141', 'Doha', '2', '1203', '1', null);
INSERT INTO location VALUES ('5142', 'Saint-Denis', '2', '1204', '1', null);
INSERT INTO location VALUES ('5143', 'Arad', '2', '1205', '1', null);
INSERT INTO location VALUES ('5144', 'Pitesti', '2', '1206', '1', null);
INSERT INTO location VALUES ('5145', 'Bacau', '2', '1207', '1', null);
INSERT INTO location VALUES ('5146', 'Oradea', '2', '1208', '1', null);
INSERT INTO location VALUES ('5147', 'Botosani', '2', '1209', '1', null);
INSERT INTO location VALUES ('5148', 'Braila', '2', '1210', '1', null);
INSERT INTO location VALUES ('5149', 'Brasov', '2', '1211', '1', null);
INSERT INTO location VALUES ('5150', 'Bucuresti', '2', '1212', '1', null);
INSERT INTO location VALUES ('5151', 'Buzau', '2', '1213', '1', null);
INSERT INTO location VALUES ('5152', 'Resita', '2', '1214', '1', null);
INSERT INTO location VALUES ('5153', 'Cluj-Napoca', '2', '1215', '1', null);
INSERT INTO location VALUES ('5154', 'Constanta', '2', '1216', '1', null);
INSERT INTO location VALUES ('5155', 'TÃƒÆ’Ã‚Â¢rgoviste', '2', '1217', '1', null);
INSERT INTO location VALUES ('5156', 'Craiova', '2', '1218', '1', null);
INSERT INTO location VALUES ('5157', 'Galati', '2', '1219', '1', null);
INSERT INTO location VALUES ('5158', 'TÃƒÆ’Ã‚Â¢rgu Jiu', '2', '1220', '1', null);
INSERT INTO location VALUES ('5159', 'Iasi', '2', '1221', '1', null);
INSERT INTO location VALUES ('5160', 'Baia Mare', '2', '1222', '1', null);
INSERT INTO location VALUES ('5161', 'Drobeta-Turnu Severin', '2', '1223', '1', null);
INSERT INTO location VALUES ('5162', 'TÃƒÆ’Ã‚Â¢rgu Mures', '2', '1224', '1', null);
INSERT INTO location VALUES ('5163', 'Piatra Neamt', '2', '1225', '1', null);
INSERT INTO location VALUES ('5164', 'Ploiesti', '2', '1226', '1', null);
INSERT INTO location VALUES ('5165', 'Satu Mare', '2', '1227', '1', null);
INSERT INTO location VALUES ('5166', 'Sibiu', '2', '1228', '1', null);
INSERT INTO location VALUES ('5167', 'Suceava', '2', '1229', '1', null);
INSERT INTO location VALUES ('5168', 'Timisoara', '2', '1230', '1', null);
INSERT INTO location VALUES ('5169', 'Tulcea', '2', '1231', '1', null);
INSERT INTO location VALUES ('5170', 'RÃƒÆ’Ã‚Â¢mnicu VÃƒÆ’Ã‚Â¢lcea', '2', '1232', '1', null);
INSERT INTO location VALUES ('5171', 'Focsani', '2', '1233', '1', null);
INSERT INTO location VALUES ('5172', 'Maikop', '2', '1234', '1', null);
INSERT INTO location VALUES ('5173', 'Barnaul', '2', '1235', '1', null);
INSERT INTO location VALUES ('5174', 'Bijsk', '2', '1235', '1', null);
INSERT INTO location VALUES ('5175', 'Rubtsovsk', '2', '1235', '1', null);
INSERT INTO location VALUES ('5176', 'BlagoveÃƒâ€¦Ã‚Â¡tÃƒâ€¦Ã‚Â¡ensk', '2', '1236', '1', null);
INSERT INTO location VALUES ('5177', 'Arkangeli', '2', '1237', '1', null);
INSERT INTO location VALUES ('5178', 'Severodvinsk', '2', '1237', '1', null);
INSERT INTO location VALUES ('5179', 'Astrahan', '2', '1238', '1', null);
INSERT INTO location VALUES ('5180', 'Ufa', '2', '1239', '1', null);
INSERT INTO location VALUES ('5181', 'Sterlitamak', '2', '1239', '1', null);
INSERT INTO location VALUES ('5182', 'Salavat', '2', '1239', '1', null);
INSERT INTO location VALUES ('5183', 'Neftekamsk', '2', '1239', '1', null);
INSERT INTO location VALUES ('5184', 'Oktjabrski', '2', '1239', '1', null);
INSERT INTO location VALUES ('5185', 'Belgorod', '2', '1240', '1', null);
INSERT INTO location VALUES ('5186', 'Staryi Oskol', '2', '1240', '1', null);
INSERT INTO location VALUES ('5187', 'Brjansk', '2', '1241', '1', null);
INSERT INTO location VALUES ('5188', 'Ulan-Ude', '2', '1242', '1', null);
INSERT INTO location VALUES ('5189', 'MahatÃƒâ€¦Ã‚Â¡kala', '2', '1243', '1', null);
INSERT INTO location VALUES ('5190', 'Derbent', '2', '1243', '1', null);
INSERT INTO location VALUES ('5191', 'Habarovsk', '2', '1244', '1', null);
INSERT INTO location VALUES ('5192', 'Komsomolsk-na-Amure', '2', '1244', '1', null);
INSERT INTO location VALUES ('5193', 'Abakan', '2', '1245', '1', null);
INSERT INTO location VALUES ('5194', 'Surgut', '2', '1246', '1', null);
INSERT INTO location VALUES ('5195', 'Niznevartovsk', '2', '1246', '1', null);
INSERT INTO location VALUES ('5196', 'Neftejugansk', '2', '1246', '1', null);
INSERT INTO location VALUES ('5197', 'Irkutsk', '2', '1247', '1', null);
INSERT INTO location VALUES ('5198', 'Bratsk', '2', '1247', '1', null);
INSERT INTO location VALUES ('5199', 'Angarsk', '2', '1247', '1', null);
INSERT INTO location VALUES ('5200', 'Ust-Ilimsk', '2', '1247', '1', null);
INSERT INTO location VALUES ('5201', 'Usolje-Sibirskoje', '2', '1247', '1', null);
INSERT INTO location VALUES ('5202', 'Ivanovo', '2', '1248', '1', null);
INSERT INTO location VALUES ('5203', 'KineÃƒâ€¦Ã‚Â¡ma', '2', '1248', '1', null);
INSERT INTO location VALUES ('5204', 'Jaroslavl', '2', '1249', '1', null);
INSERT INTO location VALUES ('5205', 'Rybinsk', '2', '1249', '1', null);
INSERT INTO location VALUES ('5206', 'NaltÃƒâ€¦Ã‚Â¡ik', '2', '1250', '1', null);
INSERT INTO location VALUES ('5207', 'Kaliningrad', '2', '1251', '1', null);
INSERT INTO location VALUES ('5208', 'Elista', '2', '1252', '1', null);
INSERT INTO location VALUES ('5209', 'Kaluga', '2', '1253', '1', null);
INSERT INTO location VALUES ('5210', 'Obninsk', '2', '1253', '1', null);
INSERT INTO location VALUES ('5211', 'Petropavlovsk-KamtÃƒâ€¦Ã‚Â¡ats', '2', '1254', '1', null);
INSERT INTO location VALUES ('5212', 'TÃƒâ€¦Ã‚Â¡erkessk', '2', '1255', '1', null);
INSERT INTO location VALUES ('5213', 'Petroskoi', '2', '1256', '1', null);
INSERT INTO location VALUES ('5214', 'Novokuznetsk', '2', '1257', '1', null);
INSERT INTO location VALUES ('5215', 'Kemerovo', '2', '1257', '1', null);
INSERT INTO location VALUES ('5216', 'Prokopjevsk', '2', '1257', '1', null);
INSERT INTO location VALUES ('5217', 'Leninsk-Kuznetski', '2', '1257', '1', null);
INSERT INTO location VALUES ('5218', 'Kiseljovsk', '2', '1257', '1', null);
INSERT INTO location VALUES ('5219', 'MezduretÃƒâ€¦Ã‚Â¡ensk', '2', '1257', '1', null);
INSERT INTO location VALUES ('5220', 'Anzero-Sudzensk', '2', '1257', '1', null);
INSERT INTO location VALUES ('5221', 'Kirov', '2', '1258', '1', null);
INSERT INTO location VALUES ('5222', 'Kirovo-TÃƒâ€¦Ã‚Â¡epetsk', '2', '1258', '1', null);
INSERT INTO location VALUES ('5223', 'Syktyvkar', '2', '1259', '1', null);
INSERT INTO location VALUES ('5224', 'Uhta', '2', '1259', '1', null);
INSERT INTO location VALUES ('5225', 'Vorkuta', '2', '1259', '1', null);
INSERT INTO location VALUES ('5226', 'Kostroma', '2', '1260', '1', null);
INSERT INTO location VALUES ('5227', 'Krasnodar', '2', '1261', '1', null);
INSERT INTO location VALUES ('5228', 'SotÃƒâ€¦Ã‚Â¡i', '2', '1261', '1', null);
INSERT INTO location VALUES ('5229', 'Novorossijsk', '2', '1261', '1', null);
INSERT INTO location VALUES ('5230', 'Armavir', '2', '1261', '1', null);
INSERT INTO location VALUES ('5231', 'Krasnojarsk', '2', '1262', '1', null);
INSERT INTO location VALUES ('5232', 'Norilsk', '2', '1262', '1', null);
INSERT INTO location VALUES ('5233', 'AtÃƒâ€¦Ã‚Â¡insk', '2', '1262', '1', null);
INSERT INTO location VALUES ('5234', 'Kansk', '2', '1262', '1', null);
INSERT INTO location VALUES ('5235', 'Zeleznogorsk', '2', '1262', '1', null);
INSERT INTO location VALUES ('5236', 'Kurgan', '2', '1263', '1', null);
INSERT INTO location VALUES ('5237', 'Kursk', '2', '1264', '1', null);
INSERT INTO location VALUES ('5238', 'Zeleznogorsk', '2', '1264', '1', null);
INSERT INTO location VALUES ('5239', 'Lipetsk', '2', '1265', '1', null);
INSERT INTO location VALUES ('5240', 'Jelets', '2', '1265', '1', null);
INSERT INTO location VALUES ('5241', 'Magadan', '2', '1266', '1', null);
INSERT INTO location VALUES ('5242', 'JoÃƒâ€¦Ã‚Â¡kar-Ola', '2', '1267', '1', null);
INSERT INTO location VALUES ('5243', 'Saransk', '2', '1268', '1', null);
INSERT INTO location VALUES ('5244', 'Moscow', '2', '1269', '1', null);
INSERT INTO location VALUES ('5245', 'Zelenograd', '2', '1269', '1', null);
INSERT INTO location VALUES ('5246', 'Podolsk', '2', '1270', '1', null);
INSERT INTO location VALUES ('5247', 'Ljubertsy', '2', '1270', '1', null);
INSERT INTO location VALUES ('5248', 'MytiÃƒâ€¦Ã‚Â¡tÃƒâ€¦Ã‚Â¡i', '2', '1270', '1', null);
INSERT INTO location VALUES ('5249', 'Kolomna', '2', '1270', '1', null);
INSERT INTO location VALUES ('5250', 'Elektrostal', '2', '1270', '1', null);
INSERT INTO location VALUES ('5251', 'Himki', '2', '1270', '1', null);
INSERT INTO location VALUES ('5252', 'BalaÃƒâ€¦Ã‚Â¡iha', '2', '1270', '1', null);
INSERT INTO location VALUES ('5253', 'Korolev', '2', '1270', '1', null);
INSERT INTO location VALUES ('5254', 'Serpuhov', '2', '1270', '1', null);
INSERT INTO location VALUES ('5255', 'Odintsovo', '2', '1270', '1', null);
INSERT INTO location VALUES ('5256', 'Orehovo-Zujevo', '2', '1270', '1', null);
INSERT INTO location VALUES ('5257', 'Noginsk', '2', '1270', '1', null);
INSERT INTO location VALUES ('5258', 'Sergijev Posad', '2', '1270', '1', null);
INSERT INTO location VALUES ('5259', 'Ãƒâ€¦ tÃƒâ€¦Ã‚Â¡olkovo', '2', '1270', '1', null);
INSERT INTO location VALUES ('5260', 'Zeleznodoroznyi', '2', '1270', '1', null);
INSERT INTO location VALUES ('5261', 'Zukovski', '2', '1270', '1', null);
INSERT INTO location VALUES ('5262', 'Krasnogorsk', '2', '1270', '1', null);
INSERT INTO location VALUES ('5263', 'Klin', '2', '1270', '1', null);
INSERT INTO location VALUES ('5264', 'Murmansk', '2', '1271', '1', null);
INSERT INTO location VALUES ('5265', 'Nizni Novgorod', '2', '1272', '1', null);
INSERT INTO location VALUES ('5266', 'Dzerzinsk', '2', '1272', '1', null);
INSERT INTO location VALUES ('5267', 'Arzamas', '2', '1272', '1', null);
INSERT INTO location VALUES ('5268', 'Vladikavkaz', '2', '1273', '1', null);
INSERT INTO location VALUES ('5269', 'Veliki Novgorod', '2', '1274', '1', null);
INSERT INTO location VALUES ('5270', 'Novosibirsk', '2', '1275', '1', null);
INSERT INTO location VALUES ('5271', 'Omsk', '2', '1276', '1', null);
INSERT INTO location VALUES ('5272', 'Orenburg', '2', '1277', '1', null);
INSERT INTO location VALUES ('5273', 'Orsk', '2', '1277', '1', null);
INSERT INTO location VALUES ('5274', 'Novotroitsk', '2', '1277', '1', null);
INSERT INTO location VALUES ('5275', 'Orjol', '2', '1278', '1', null);
INSERT INTO location VALUES ('5276', 'Penza', '2', '1279', '1', null);
INSERT INTO location VALUES ('5277', 'Kuznetsk', '2', '1279', '1', null);
INSERT INTO location VALUES ('5278', 'Perm', '2', '1280', '1', null);
INSERT INTO location VALUES ('5279', 'Berezniki', '2', '1280', '1', null);
INSERT INTO location VALUES ('5280', 'Solikamsk', '2', '1280', '1', null);
INSERT INTO location VALUES ('5281', 'TÃƒâ€¦Ã‚Â¡aikovski', '2', '1280', '1', null);
INSERT INTO location VALUES ('5282', 'St Petersburg', '2', '1281', '1', null);
INSERT INTO location VALUES ('5283', 'Kolpino', '2', '1281', '1', null);
INSERT INTO location VALUES ('5284', 'PuÃƒâ€¦Ã‚Â¡kin', '2', '1281', '1', null);
INSERT INTO location VALUES ('5285', 'Pihkova', '2', '1282', '1', null);
INSERT INTO location VALUES ('5286', 'Velikije Luki', '2', '1282', '1', null);
INSERT INTO location VALUES ('5287', 'Vladivostok', '2', '1283', '1', null);
INSERT INTO location VALUES ('5288', 'Nahodka', '2', '1283', '1', null);
INSERT INTO location VALUES ('5289', 'Ussurijsk', '2', '1283', '1', null);
INSERT INTO location VALUES ('5290', 'Rjazan', '2', '1284', '1', null);
INSERT INTO location VALUES ('5291', 'Rostov-na-Donu', '2', '1285', '1', null);
INSERT INTO location VALUES ('5292', 'Taganrog', '2', '1285', '1', null);
INSERT INTO location VALUES ('5293', 'Ãƒâ€¦ ahty', '2', '1285', '1', null);
INSERT INTO location VALUES ('5294', 'NovotÃƒâ€¦Ã‚Â¡erkassk', '2', '1285', '1', null);
INSERT INTO location VALUES ('5295', 'Volgodonsk', '2', '1285', '1', null);
INSERT INTO location VALUES ('5296', 'NovoÃƒâ€¦Ã‚Â¡ahtinsk', '2', '1285', '1', null);
INSERT INTO location VALUES ('5297', 'Bataisk', '2', '1285', '1', null);
INSERT INTO location VALUES ('5298', 'Jakutsk', '2', '1286', '1', null);
INSERT INTO location VALUES ('5299', 'Juzno-Sahalinsk', '2', '1287', '1', null);
INSERT INTO location VALUES ('5300', 'Samara', '2', '1288', '1', null);
INSERT INTO location VALUES ('5301', 'Toljatti', '2', '1288', '1', null);
INSERT INTO location VALUES ('5302', 'Syzran', '2', '1288', '1', null);
INSERT INTO location VALUES ('5303', 'NovokuibyÃƒâ€¦Ã‚Â¡evsk', '2', '1288', '1', null);
INSERT INTO location VALUES ('5304', 'Saratov', '2', '1289', '1', null);
INSERT INTO location VALUES ('5305', 'Balakovo', '2', '1289', '1', null);
INSERT INTO location VALUES ('5306', 'Engels', '2', '1289', '1', null);
INSERT INTO location VALUES ('5307', 'BalaÃƒâ€¦Ã‚Â¡ov', '2', '1289', '1', null);
INSERT INTO location VALUES ('5308', 'Smolensk', '2', '1290', '1', null);
INSERT INTO location VALUES ('5309', 'Stavropol', '2', '1291', '1', null);
INSERT INTO location VALUES ('5310', 'Nevinnomyssk', '2', '1291', '1', null);
INSERT INTO location VALUES ('5311', 'Pjatigorsk', '2', '1291', '1', null);
INSERT INTO location VALUES ('5312', 'Kislovodsk', '2', '1291', '1', null);
INSERT INTO location VALUES ('5313', 'Jessentuki', '2', '1291', '1', null);
INSERT INTO location VALUES ('5314', 'Jekaterinburg', '2', '1292', '1', null);
INSERT INTO location VALUES ('5315', 'Nizni Tagil', '2', '1292', '1', null);
INSERT INTO location VALUES ('5316', 'Kamensk-Uralski', '2', '1292', '1', null);
INSERT INTO location VALUES ('5317', 'Pervouralsk', '2', '1292', '1', null);
INSERT INTO location VALUES ('5318', 'Serov', '2', '1292', '1', null);
INSERT INTO location VALUES ('5319', 'Novouralsk', '2', '1292', '1', null);
INSERT INTO location VALUES ('5320', 'Tambov', '2', '1293', '1', null);
INSERT INTO location VALUES ('5321', 'MitÃƒâ€¦Ã‚Â¡urinsk', '2', '1293', '1', null);
INSERT INTO location VALUES ('5322', 'Kazan', '2', '1294', '1', null);
INSERT INTO location VALUES ('5323', 'Nabereznyje TÃƒâ€¦Ã‚Â¡elny', '2', '1294', '1', null);
INSERT INTO location VALUES ('5324', 'Niznekamsk', '2', '1294', '1', null);
INSERT INTO location VALUES ('5325', 'Almetjevsk', '2', '1294', '1', null);
INSERT INTO location VALUES ('5326', 'Zelenodolsk', '2', '1294', '1', null);
INSERT INTO location VALUES ('5327', 'Bugulma', '2', '1294', '1', null);
INSERT INTO location VALUES ('5328', 'Tjumen', '2', '1295', '1', null);
INSERT INTO location VALUES ('5329', 'Tobolsk', '2', '1295', '1', null);
INSERT INTO location VALUES ('5330', 'Tomsk', '2', '1296', '1', null);
INSERT INTO location VALUES ('5331', 'Seversk', '2', '1296', '1', null);
INSERT INTO location VALUES ('5332', 'Tula', '2', '1297', '1', null);
INSERT INTO location VALUES ('5333', 'Novomoskovsk', '2', '1297', '1', null);
INSERT INTO location VALUES ('5334', 'Tver', '2', '1298', '1', null);
INSERT INTO location VALUES ('5335', 'Kyzyl', '2', '1299', '1', null);
INSERT INTO location VALUES ('5336', 'TÃƒâ€¦Ã‚Â¡eljabinsk', '2', '1300', '1', null);
INSERT INTO location VALUES ('5337', 'Magnitogorsk', '2', '1300', '1', null);
INSERT INTO location VALUES ('5338', 'Zlatoust', '2', '1300', '1', null);
INSERT INTO location VALUES ('5339', 'Miass', '2', '1300', '1', null);
INSERT INTO location VALUES ('5340', 'Grozny', '2', '1301', '1', null);
INSERT INTO location VALUES ('5341', 'TÃƒâ€¦Ã‚Â¡ita', '2', '1302', '1', null);
INSERT INTO location VALUES ('5342', 'TÃƒâ€¦Ã‚Â¡eboksary', '2', '1303', '1', null);
INSERT INTO location VALUES ('5343', 'NovotÃƒâ€¦Ã‚Â¡eboksarsk', '2', '1303', '1', null);
INSERT INTO location VALUES ('5344', 'Izevsk', '2', '1304', '1', null);
INSERT INTO location VALUES ('5345', 'Glazov', '2', '1304', '1', null);
INSERT INTO location VALUES ('5346', 'Sarapul', '2', '1304', '1', null);
INSERT INTO location VALUES ('5347', 'Votkinsk', '2', '1304', '1', null);
INSERT INTO location VALUES ('5348', 'Uljanovsk', '2', '1305', '1', null);
INSERT INTO location VALUES ('5349', 'Dimitrovgrad', '2', '1305', '1', null);
INSERT INTO location VALUES ('5350', 'Vladimir', '2', '1306', '1', null);
INSERT INTO location VALUES ('5351', 'Kovrov', '2', '1306', '1', null);
INSERT INTO location VALUES ('5352', 'Murom', '2', '1306', '1', null);
INSERT INTO location VALUES ('5353', 'Volgograd', '2', '1307', '1', null);
INSERT INTO location VALUES ('5354', 'Volzski', '2', '1307', '1', null);
INSERT INTO location VALUES ('5355', 'KamyÃƒâ€¦Ã‚Â¡in', '2', '1307', '1', null);
INSERT INTO location VALUES ('5356', 'TÃƒâ€¦Ã‚Â¡erepovets', '2', '1308', '1', null);
INSERT INTO location VALUES ('5357', 'Vologda', '2', '1308', '1', null);
INSERT INTO location VALUES ('5358', 'Voronez', '2', '1309', '1', null);
INSERT INTO location VALUES ('5359', 'Nojabrsk', '2', '1310', '1', null);
INSERT INTO location VALUES ('5360', 'Novyi Urengoi', '2', '1310', '1', null);
INSERT INTO location VALUES ('5361', 'Kigali', '2', '1311', '1', null);
INSERT INTO location VALUES ('5362', 'AraÃƒâ€šÃ‚Â´ar', '2', '1312', '1', null);
INSERT INTO location VALUES ('5363', 'Burayda', '2', '1313', '1', null);
INSERT INTO location VALUES ('5364', 'Zagazig', '2', '1314', '1', null);
INSERT INTO location VALUES ('5365', 'Bilbays', '2', '1314', '1', null);
INSERT INTO location VALUES ('5366', 'al-Dammam', '2', '1314', '1', null);
INSERT INTO location VALUES ('5367', 'al-Hufuf', '2', '1314', '1', null);
INSERT INTO location VALUES ('5368', 'al-Mubarraz', '2', '1314', '1', null);
INSERT INTO location VALUES ('5369', 'al-Khubar', '2', '1314', '1', null);
INSERT INTO location VALUES ('5370', 'Jubayl', '2', '1314', '1', null);
INSERT INTO location VALUES ('5371', 'Hafar al-Batin', '2', '1314', '1', null);
INSERT INTO location VALUES ('5372', 'al-Tuqba', '2', '1314', '1', null);
INSERT INTO location VALUES ('5373', 'al-Qatif', '2', '1314', '1', null);
INSERT INTO location VALUES ('5374', 'Khamis Mushayt', '2', '1315', '1', null);
INSERT INTO location VALUES ('5375', 'Abha', '2', '1315', '1', null);
INSERT INTO location VALUES ('5376', 'Hail', '2', '1316', '1', null);
INSERT INTO location VALUES ('5377', 'Medina', '2', '1317', '1', null);
INSERT INTO location VALUES ('5378', 'Yanbu', '2', '1317', '1', null);
INSERT INTO location VALUES ('5379', 'Jedda', '2', '1318', '1', null);
INSERT INTO location VALUES ('5380', 'Mekka', '2', '1318', '1', null);
INSERT INTO location VALUES ('5381', 'al-Taif', '2', '1318', '1', null);
INSERT INTO location VALUES ('5382', 'al-Hawiya', '2', '1318', '1', null);
INSERT INTO location VALUES ('5383', 'Najran', '2', '1319', '1', null);
INSERT INTO location VALUES ('5384', 'Unayza', '2', '1320', '1', null);
INSERT INTO location VALUES ('5385', 'al-Kharj', '2', '1321', '1', null);
INSERT INTO location VALUES ('5386', 'Riyadh', '2', '1322', '1', null);
INSERT INTO location VALUES ('5387', 'Tabuk', '2', '1323', '1', null);
INSERT INTO location VALUES ('5388', 'Kusti', '2', '1324', '1', null);
INSERT INTO location VALUES ('5389', 'Port Sudan', '2', '1325', '1', null);
INSERT INTO location VALUES ('5390', 'Wad Madani', '2', '1326', '1', null);
INSERT INTO location VALUES ('5391', 'al-Qadarif', '2', '1327', '1', null);
INSERT INTO location VALUES ('5392', 'Juba', '2', '1328', '1', null);
INSERT INTO location VALUES ('5393', 'Nyala', '2', '1329', '1', null);
INSERT INTO location VALUES ('5394', 'al-Fashir', '2', '1330', '1', null);
INSERT INTO location VALUES ('5395', 'Kassala', '2', '1331', '1', null);
INSERT INTO location VALUES ('5396', 'Omdurman', '2', '1332', '1', null);
INSERT INTO location VALUES ('5397', 'Khartum', '2', '1332', '1', null);
INSERT INTO location VALUES ('5398', 'Sharq al-Nil', '2', '1332', '1', null);
INSERT INTO location VALUES ('5399', 'Obeid', '2', '1333', '1', null);
INSERT INTO location VALUES ('5400', 'Pikine', '2', '1334', '1', null);
INSERT INTO location VALUES ('5401', 'Dakar', '2', '1334', '1', null);
INSERT INTO location VALUES ('5402', 'Rufisque', '2', '1334', '1', null);
INSERT INTO location VALUES ('5403', 'Diourbel', '2', '1335', '1', null);
INSERT INTO location VALUES ('5404', 'Kaolack', '2', '1336', '1', null);
INSERT INTO location VALUES ('5405', 'Saint-Louis', '2', '1337', '1', null);
INSERT INTO location VALUES ('5406', 'ThiÃƒÆ’Ã‚Â¨s', '2', '1338', '1', null);
INSERT INTO location VALUES ('5407', 'Mbour', '2', '1338', '1', null);
INSERT INTO location VALUES ('5408', 'Ziguinchor', '2', '1339', '1', null);
INSERT INTO location VALUES ('5409', 'South Hill', '2', '1340', '1', null);
INSERT INTO location VALUES ('5410', 'The Valley', '2', '1340', '1', null);
INSERT INTO location VALUES ('5411', 'Oranjestad', '2', '1340', '1', null);
INSERT INTO location VALUES ('5412', 'Douglas', '2', '1340', '1', null);
INSERT INTO location VALUES ('5413', 'Gibraltar', '2', '1340', '1', null);
INSERT INTO location VALUES ('5414', 'Tamuning', '2', '1340', '1', null);
INSERT INTO location VALUES ('5415', 'AgaÃƒÆ’Ã‚Â±a', '2', '1340', '1', null);
INSERT INTO location VALUES ('5416', 'Flying Fish Cove', '2', '1340', '1', null);
INSERT INTO location VALUES ('5417', 'Monte-Carlo', '2', '1340', '1', null);
INSERT INTO location VALUES ('5418', 'Monaco-Ville', '2', '1340', '1', null);
INSERT INTO location VALUES ('5419', 'Yangor', '2', '1340', '1', null);
INSERT INTO location VALUES ('5420', 'Yaren', '2', '1340', '1', null);
INSERT INTO location VALUES ('5421', 'Alofi', '2', '1340', '1', null);
INSERT INTO location VALUES ('5422', 'Kingston', '2', '1340', '1', null);
INSERT INTO location VALUES ('5423', 'Adamstown', '2', '1340', '1', null);
INSERT INTO location VALUES ('5424', 'Singapore', '2', '1340', '1', null);
INSERT INTO location VALUES ('5425', 'NoumÃƒÆ’Ã‚Â©a', '2', '1340', '1', null);
INSERT INTO location VALUES ('5426', 'CittÃƒÆ’  del Vaticano', '2', '1340', '1', null);
INSERT INTO location VALUES ('5427', 'Jamestown', '2', '1341', '1', null);
INSERT INTO location VALUES ('5428', 'Longyearbyen', '2', '1342', '1', null);
INSERT INTO location VALUES ('5429', 'Honiara', '2', '1343', '1', null);
INSERT INTO location VALUES ('5430', 'Sekondi-Takoradi', '2', '1344', '1', null);
INSERT INTO location VALUES ('5431', 'Pokhara', '2', '1344', '1', null);
INSERT INTO location VALUES ('5432', 'Freetown', '2', '1344', '1', null);
INSERT INTO location VALUES ('5433', 'Colombo', '2', '1344', '1', null);
INSERT INTO location VALUES ('5434', 'Dehiwala', '2', '1344', '1', null);
INSERT INTO location VALUES ('5435', 'Moratuwa', '2', '1344', '1', null);
INSERT INTO location VALUES ('5436', 'Sri Jayawardenepura Kotte', '2', '1344', '1', null);
INSERT INTO location VALUES ('5437', 'Negombo', '2', '1344', '1', null);
INSERT INTO location VALUES ('5438', 'Nueva San Salvador', '2', '1345', '1', null);
INSERT INTO location VALUES ('5439', 'Trujillo', '2', '1345', '1', null);
INSERT INTO location VALUES ('5440', 'San Miguel', '2', '1346', '1', null);
INSERT INTO location VALUES ('5441', 'San Salvador', '2', '1347', '1', null);
INSERT INTO location VALUES ('5442', 'Mejicanos', '2', '1347', '1', null);
INSERT INTO location VALUES ('5443', 'Soyapango', '2', '1347', '1', null);
INSERT INTO location VALUES ('5444', 'Apopa', '2', '1347', '1', null);
INSERT INTO location VALUES ('5445', 'Santa Ana', '2', '1348', '1', null);
INSERT INTO location VALUES ('5446', 'San Marino', '2', '1349', '1', null);
INSERT INTO location VALUES ('5447', 'Serravalle', '2', '1350', '1', null);
INSERT INTO location VALUES ('5448', 'Mogadishu', '2', '1351', '1', null);
INSERT INTO location VALUES ('5449', 'Kismaayo', '2', '1352', '1', null);
INSERT INTO location VALUES ('5450', 'Hargeysa', '2', '1353', '1', null);
INSERT INTO location VALUES ('5451', 'Saint-Pierre', '2', '1354', '1', null);
INSERT INTO location VALUES ('5452', 'SÃƒÆ’Ã‚Â£o TomÃƒÆ’Ã‚Â©', '2', '1355', '1', null);
INSERT INTO location VALUES ('5453', 'Paramaribo', '2', '1356', '1', null);
INSERT INTO location VALUES ('5454', 'Bratislava', '2', '1357', '1', null);
INSERT INTO location VALUES ('5455', 'KoÃƒâ€¦Ã‚Â¡ice', '2', '1358', '1', null);
INSERT INTO location VALUES ('5456', 'PreÃƒâ€¦Ã‚Â¡ov', '2', '1358', '1', null);
INSERT INTO location VALUES ('5457', 'Ljubljana', '2', '1359', '1', null);
INSERT INTO location VALUES ('5458', 'Maribor', '2', '1360', '1', null);
INSERT INTO location VALUES ('5459', 'ÃƒÆ’Ã¢â‚¬â€œrebro', '2', '1361', '1', null);
INSERT INTO location VALUES ('5460', 'LinkÃƒÆ’Ã‚Â¶ping', '2', '1362', '1', null);
INSERT INTO location VALUES ('5461', 'NorrkÃƒÆ’Ã‚Â¶ping', '2', '1362', '1', null);
INSERT INTO location VALUES ('5462', 'GÃƒÆ’Ã‚Â¤vle', '2', '1363', '1', null);
INSERT INTO location VALUES ('5463', 'JÃƒÆ’Ã‚Â¶nkÃƒÆ’Ã‚Â¶ping', '2', '1364', '1', null);
INSERT INTO location VALUES ('5464', 'Lisboa', '2', '1365', '1', null);
INSERT INTO location VALUES ('5465', 'Amadora', '2', '1365', '1', null);
INSERT INTO location VALUES ('5466', 'Stockholm', '2', '1365', '1', null);
INSERT INTO location VALUES ('5467', 'MalmÃƒÆ’Ã‚Â¶', '2', '1366', '1', null);
INSERT INTO location VALUES ('5468', 'Helsingborg', '2', '1366', '1', null);
INSERT INTO location VALUES ('5469', 'Lund', '2', '1366', '1', null);
INSERT INTO location VALUES ('5470', 'Uppsala', '2', '1367', '1', null);
INSERT INTO location VALUES ('5471', 'UmeÃƒÆ’Ã‚Â¥', '2', '1368', '1', null);
INSERT INTO location VALUES ('5472', 'Sundsvall', '2', '1369', '1', null);
INSERT INTO location VALUES ('5473', 'VÃƒÆ’Ã‚Â¤sterÃƒÆ’Ã‚Â¥s', '2', '1370', '1', null);
INSERT INTO location VALUES ('5474', 'Gothenburg [GÃƒÆ’Ã‚Â¶teborg]', '2', '1371', '1', null);
INSERT INTO location VALUES ('5475', 'BorÃƒÆ’Ã‚Â¥s', '2', '1371', '1', null);
INSERT INTO location VALUES ('5476', 'Mbabane', '2', '1372', '1', null);
INSERT INTO location VALUES ('5477', 'Victoria', '2', '1373', '1', null);
INSERT INTO location VALUES ('5478', 'al-Qamishliya', '2', '1374', '1', null);
INSERT INTO location VALUES ('5479', 'al-Raqqa', '2', '1375', '1', null);
INSERT INTO location VALUES ('5480', 'Aleppo', '2', '1376', '1', null);
INSERT INTO location VALUES ('5481', 'Damascus', '2', '1377', '1', null);
INSERT INTO location VALUES ('5482', 'Jaramana', '2', '1378', '1', null);
INSERT INTO location VALUES ('5483', 'Duma', '2', '1378', '1', null);
INSERT INTO location VALUES ('5484', 'Dayr al-Zawr', '2', '1379', '1', null);
INSERT INTO location VALUES ('5485', 'Hama', '2', '1380', '1', null);
INSERT INTO location VALUES ('5486', 'Hims', '2', '1381', '1', null);
INSERT INTO location VALUES ('5487', 'Idlib', '2', '1382', '1', null);
INSERT INTO location VALUES ('5488', 'Latakia', '2', '1383', '1', null);
INSERT INTO location VALUES ('5489', 'Cockburn Town', '2', '1384', '1', null);
INSERT INTO location VALUES ('5490', 'NÃƒâ€šÃ‚Â´DjamÃƒÆ’Ã‚Â©na', '2', '1385', '1', null);
INSERT INTO location VALUES ('5491', 'Moundou', '2', '1386', '1', null);
INSERT INTO location VALUES ('5492', 'LomÃƒÆ’Ã‚Â©', '2', '1387', '1', null);
INSERT INTO location VALUES ('5493', 'Bangkok', '2', '1388', '1', null);
INSERT INTO location VALUES ('5494', 'Chiang Mai', '2', '1389', '1', null);
INSERT INTO location VALUES ('5495', 'Khon Kaen', '2', '1390', '1', null);
INSERT INTO location VALUES ('5496', 'Nakhon Pathom', '2', '1391', '1', null);
INSERT INTO location VALUES ('5497', 'Nakhon Ratchasima', '2', '1392', '1', null);
INSERT INTO location VALUES ('5498', 'Nakhon Sawan', '2', '1393', '1', null);
INSERT INTO location VALUES ('5499', 'Nonthaburi', '2', '1394', '1', null);
INSERT INTO location VALUES ('5500', 'Pak Kret', '2', '1394', '1', null);
INSERT INTO location VALUES ('5501', 'Hat Yai', '2', '1395', '1', null);
INSERT INTO location VALUES ('5502', 'Songkhla', '2', '1395', '1', null);
INSERT INTO location VALUES ('5503', 'Ubon Ratchathani', '2', '1396', '1', null);
INSERT INTO location VALUES ('5504', 'Udon Thani', '2', '1397', '1', null);
INSERT INTO location VALUES ('5505', 'Dushanbe', '2', '1398', '1', null);
INSERT INTO location VALUES ('5506', 'Khujand', '2', '1399', '1', null);
INSERT INTO location VALUES ('5507', 'Fakaofo', '2', '1400', '1', null);
INSERT INTO location VALUES ('5508', 'Ashgabat', '2', '1401', '1', null);
INSERT INTO location VALUES ('5509', 'Dashhowuz', '2', '1402', '1', null);
INSERT INTO location VALUES ('5510', 'ChÃƒÆ’Ã‚Â¤rjew', '2', '1403', '1', null);
INSERT INTO location VALUES ('5511', 'Mary', '2', '1404', '1', null);
INSERT INTO location VALUES ('5512', 'Dili', '2', '1405', '1', null);
INSERT INTO location VALUES ('5513', 'NukuÃƒâ€šÃ‚Â´alofa', '2', '1406', '1', null);
INSERT INTO location VALUES ('5514', 'Chaguanas', '2', '1407', '1', null);
INSERT INTO location VALUES ('5515', 'Port-of-Spain', '2', '1408', '1', null);
INSERT INTO location VALUES ('5516', 'Ariana', '2', '1409', '1', null);
INSERT INTO location VALUES ('5517', 'Ettadhamen', '2', '1409', '1', null);
INSERT INTO location VALUES ('5518', 'Biserta', '2', '1410', '1', null);
INSERT INTO location VALUES ('5519', 'GabÃƒÆ’Ã‚Â¨s', '2', '1411', '1', null);
INSERT INTO location VALUES ('5520', 'Kairouan', '2', '1412', '1', null);
INSERT INTO location VALUES ('5521', 'Sfax', '2', '1413', '1', null);
INSERT INTO location VALUES ('5522', 'Sousse', '2', '1414', '1', null);
INSERT INTO location VALUES ('5523', 'Tunis', '2', '1415', '1', null);
INSERT INTO location VALUES ('5524', 'Adana', '2', '1416', '1', null);
INSERT INTO location VALUES ('5525', 'Tarsus', '2', '1416', '1', null);
INSERT INTO location VALUES ('5526', 'Ceyhan', '2', '1416', '1', null);
INSERT INTO location VALUES ('5527', 'Adiyaman', '2', '1417', '1', null);
INSERT INTO location VALUES ('5528', 'Afyon', '2', '1418', '1', null);
INSERT INTO location VALUES ('5529', 'Aksaray', '2', '1419', '1', null);
INSERT INTO location VALUES ('5530', 'Ankara', '2', '1420', '1', null);
INSERT INTO location VALUES ('5531', 'Antalya', '2', '1421', '1', null);
INSERT INTO location VALUES ('5532', 'Alanya', '2', '1421', '1', null);
INSERT INTO location VALUES ('5533', 'Aydin', '2', '1422', '1', null);
INSERT INTO location VALUES ('5534', 'Nazilli', '2', '1422', '1', null);
INSERT INTO location VALUES ('5535', 'ÃƒÆ’Ã¢â‚¬Â¡orum', '2', '1423', '1', null);
INSERT INTO location VALUES ('5536', 'Balikesir', '2', '1424', '1', null);
INSERT INTO location VALUES ('5537', 'Bandirma', '2', '1424', '1', null);
INSERT INTO location VALUES ('5538', 'Batman', '2', '1425', '1', null);
INSERT INTO location VALUES ('5539', 'Bursa', '2', '1426', '1', null);
INSERT INTO location VALUES ('5540', 'InegÃƒÆ’Ã‚Â¶l', '2', '1426', '1', null);
INSERT INTO location VALUES ('5541', 'Denizli', '2', '1427', '1', null);
INSERT INTO location VALUES ('5542', 'Diyarbakir', '2', '1428', '1', null);
INSERT INTO location VALUES ('5543', 'Bismil', '2', '1428', '1', null);
INSERT INTO location VALUES ('5544', 'Edirne', '2', '1429', '1', null);
INSERT INTO location VALUES ('5545', 'ElÃƒÆ’Ã‚Â¢zig', '2', '1430', '1', null);
INSERT INTO location VALUES ('5546', 'Erzincan', '2', '1431', '1', null);
INSERT INTO location VALUES ('5547', 'Erzurum', '2', '1432', '1', null);
INSERT INTO location VALUES ('5548', 'Eskisehir', '2', '1433', '1', null);
INSERT INTO location VALUES ('5549', 'Gaziantep', '2', '1434', '1', null);
INSERT INTO location VALUES ('5550', 'Iskenderun', '2', '1435', '1', null);
INSERT INTO location VALUES ('5551', 'Hatay (Antakya)', '2', '1435', '1', null);
INSERT INTO location VALUES ('5552', 'Mersin (IÃƒÆ’Ã‚Â§el)', '2', '1436', '1', null);
INSERT INTO location VALUES ('5553', 'Isparta', '2', '1437', '1', null);
INSERT INTO location VALUES ('5554', 'Istanbul', '2', '1438', '1', null);
INSERT INTO location VALUES ('5555', 'Sultanbeyli', '2', '1438', '1', null);
INSERT INTO location VALUES ('5556', 'Izmir', '2', '1439', '1', null);
INSERT INTO location VALUES ('5557', 'Kahramanmaras', '2', '1440', '1', null);
INSERT INTO location VALUES ('5558', 'KarabÃƒÆ’Ã‚Â¼k', '2', '1441', '1', null);
INSERT INTO location VALUES ('5559', 'Karaman', '2', '1442', '1', null);
INSERT INTO location VALUES ('5560', 'Kars', '2', '1443', '1', null);
INSERT INTO location VALUES ('5561', 'Kayseri', '2', '1444', '1', null);
INSERT INTO location VALUES ('5562', 'KÃƒÆ’Ã‚Â¼tahya', '2', '1445', '1', null);
INSERT INTO location VALUES ('5563', 'Kilis', '2', '1446', '1', null);
INSERT INTO location VALUES ('5564', 'Kirikkale', '2', '1447', '1', null);
INSERT INTO location VALUES ('5565', 'Gebze', '2', '1448', '1', null);
INSERT INTO location VALUES ('5566', 'Izmit (Kocaeli)', '2', '1448', '1', null);
INSERT INTO location VALUES ('5567', 'Konya', '2', '1449', '1', null);
INSERT INTO location VALUES ('5568', 'Malatya', '2', '1450', '1', null);
INSERT INTO location VALUES ('5569', 'Manisa', '2', '1451', '1', null);
INSERT INTO location VALUES ('5570', 'Kiziltepe', '2', '1452', '1', null);
INSERT INTO location VALUES ('5571', 'Ordu', '2', '1453', '1', null);
INSERT INTO location VALUES ('5572', 'Osmaniye', '2', '1454', '1', null);
INSERT INTO location VALUES ('5573', 'Sakarya (Adapazari)', '2', '1455', '1', null);
INSERT INTO location VALUES ('5574', 'Samsun', '2', '1456', '1', null);
INSERT INTO location VALUES ('5575', 'Sanliurfa', '2', '1457', '1', null);
INSERT INTO location VALUES ('5576', 'Viransehir', '2', '1457', '1', null);
INSERT INTO location VALUES ('5577', 'Siirt', '2', '1458', '1', null);
INSERT INTO location VALUES ('5578', 'Sivas', '2', '1459', '1', null);
INSERT INTO location VALUES ('5579', 'ÃƒÆ’Ã¢â‚¬Â¡orlu', '2', '1460', '1', null);
INSERT INTO location VALUES ('5580', 'Tekirdag', '2', '1460', '1', null);
INSERT INTO location VALUES ('5581', 'Tokat', '2', '1461', '1', null);
INSERT INTO location VALUES ('5582', 'Trabzon', '2', '1462', '1', null);
INSERT INTO location VALUES ('5583', 'Usak', '2', '1463', '1', null);
INSERT INTO location VALUES ('5584', 'Van', '2', '1464', '1', null);
INSERT INTO location VALUES ('5585', 'Zonguldak', '2', '1465', '1', null);
INSERT INTO location VALUES ('5586', 'Funafuti', '2', '1466', '1', null);
INSERT INTO location VALUES ('5587', 'Taiping', '2', '1467', '1', null);
INSERT INTO location VALUES ('5588', 'Taliao', '2', '1467', '1', null);
INSERT INTO location VALUES ('5589', 'Kueishan', '2', '1467', '1', null);
INSERT INTO location VALUES ('5590', 'Ciudad Losada', '2', '1467', '1', null);
INSERT INTO location VALUES ('5591', 'Changhwa', '2', '1468', '1', null);
INSERT INTO location VALUES ('5592', 'Yuanlin', '2', '1468', '1', null);
INSERT INTO location VALUES ('5593', 'Chiayi', '2', '1469', '1', null);
INSERT INTO location VALUES ('5594', 'Hsinchu', '2', '1470', '1', null);
INSERT INTO location VALUES ('5595', 'Hualien', '2', '1471', '1', null);
INSERT INTO location VALUES ('5596', 'Ilan', '2', '1472', '1', null);
INSERT INTO location VALUES ('5597', 'Kaohsiung', '2', '1473', '1', null);
INSERT INTO location VALUES ('5598', 'Fengshan', '2', '1473', '1', null);
INSERT INTO location VALUES ('5599', 'Kangshan', '2', '1473', '1', null);
INSERT INTO location VALUES ('5600', 'Keelung (Chilung)', '2', '1474', '1', null);
INSERT INTO location VALUES ('5601', 'Miaoli', '2', '1475', '1', null);
INSERT INTO location VALUES ('5602', 'Nantou', '2', '1476', '1', null);
INSERT INTO location VALUES ('5603', 'Tsaotun', '2', '1476', '1', null);
INSERT INTO location VALUES ('5604', 'Pingtung', '2', '1477', '1', null);
INSERT INTO location VALUES ('5605', 'Taichung', '2', '1478', '1', null);
INSERT INTO location VALUES ('5606', 'Tali', '2', '1478', '1', null);
INSERT INTO location VALUES ('5607', 'Fengyuan', '2', '1478', '1', null);
INSERT INTO location VALUES ('5608', 'Tainan', '2', '1479', '1', null);
INSERT INTO location VALUES ('5609', 'Yungkang', '2', '1479', '1', null);
INSERT INTO location VALUES ('5610', 'Taipei', '2', '1480', '1', null);
INSERT INTO location VALUES ('5611', 'Panchiao', '2', '1480', '1', null);
INSERT INTO location VALUES ('5612', 'Chungho', '2', '1480', '1', null);
INSERT INTO location VALUES ('5613', 'Sanchung', '2', '1480', '1', null);
INSERT INTO location VALUES ('5614', 'Hsinchuang', '2', '1480', '1', null);
INSERT INTO location VALUES ('5615', 'Hsintien', '2', '1480', '1', null);
INSERT INTO location VALUES ('5616', 'Yungho', '2', '1480', '1', null);
INSERT INTO location VALUES ('5617', 'Tucheng', '2', '1480', '1', null);
INSERT INTO location VALUES ('5618', 'Luchou', '2', '1480', '1', null);
INSERT INTO location VALUES ('5619', 'Hsichuh', '2', '1480', '1', null);
INSERT INTO location VALUES ('5620', 'Shulin', '2', '1480', '1', null);
INSERT INTO location VALUES ('5621', 'Tanshui', '2', '1480', '1', null);
INSERT INTO location VALUES ('5622', 'Lungtan', '2', '1480', '1', null);
INSERT INTO location VALUES ('5623', 'Taitung', '2', '1481', '1', null);
INSERT INTO location VALUES ('5624', 'Chungli', '2', '1482', '1', null);
INSERT INTO location VALUES ('5625', 'Taoyuan', '2', '1482', '1', null);
INSERT INTO location VALUES ('5626', 'Pingchen', '2', '1482', '1', null);
INSERT INTO location VALUES ('5627', 'Pate', '2', '1482', '1', null);
INSERT INTO location VALUES ('5628', 'Yangmei', '2', '1482', '1', null);
INSERT INTO location VALUES ('5629', 'Touliu', '2', '1483', '1', null);
INSERT INTO location VALUES ('5630', 'Arusha', '2', '1484', '1', null);
INSERT INTO location VALUES ('5631', 'Dar es Salaam', '2', '1485', '1', null);
INSERT INTO location VALUES ('5632', 'Dodoma', '2', '1486', '1', null);
INSERT INTO location VALUES ('5633', 'Moshi', '2', '1487', '1', null);
INSERT INTO location VALUES ('5634', 'Mbeya', '2', '1488', '1', null);
INSERT INTO location VALUES ('5635', 'Morogoro', '2', '1489', '1', null);
INSERT INTO location VALUES ('5636', 'Mwanza', '2', '1490', '1', null);
INSERT INTO location VALUES ('5637', 'Tabora', '2', '1491', '1', null);
INSERT INTO location VALUES ('5638', 'Tanga', '2', '1492', '1', null);
INSERT INTO location VALUES ('5639', 'Zanzibar', '2', '1493', '1', null);
INSERT INTO location VALUES ('5640', 'Suva', '2', '1494', '1', null);
INSERT INTO location VALUES ('5641', 'Nyeri', '2', '1494', '1', null);
INSERT INTO location VALUES ('5642', 'Kathmandu', '2', '1494', '1', null);
INSERT INTO location VALUES ('5643', 'Lalitapur', '2', '1494', '1', null);
INSERT INTO location VALUES ('5644', 'Birgunj', '2', '1494', '1', null);
INSERT INTO location VALUES ('5645', 'San Lorenzo', '2', '1494', '1', null);
INSERT INTO location VALUES ('5646', 'LambarÃƒÆ’Ã‚Â©', '2', '1494', '1', null);
INSERT INTO location VALUES ('5647', 'Fernando de la Mora', '2', '1494', '1', null);
INSERT INTO location VALUES ('5648', 'Kabwe', '2', '1494', '1', null);
INSERT INTO location VALUES ('5649', 'Kandy', '2', '1494', '1', null);
INSERT INTO location VALUES ('5650', 'Kampala', '2', '1494', '1', null);
INSERT INTO location VALUES ('5651', 'Dnipropetrovsk', '2', '1495', '1', null);
INSERT INTO location VALUES ('5652', 'Kryvyi Rig', '2', '1495', '1', null);
INSERT INTO location VALUES ('5653', 'Dniprodzerzynsk', '2', '1495', '1', null);
INSERT INTO location VALUES ('5654', 'Nikopol', '2', '1495', '1', null);
INSERT INTO location VALUES ('5655', 'Pavlograd', '2', '1495', '1', null);
INSERT INTO location VALUES ('5656', 'Donetsk', '2', '1496', '1', null);
INSERT INTO location VALUES ('5657', 'Mariupol', '2', '1496', '1', null);
INSERT INTO location VALUES ('5658', 'Makijivka', '2', '1496', '1', null);
INSERT INTO location VALUES ('5659', 'Gorlivka', '2', '1496', '1', null);
INSERT INTO location VALUES ('5660', 'Kramatorsk', '2', '1496', '1', null);
INSERT INTO location VALUES ('5661', 'Slovjansk', '2', '1496', '1', null);
INSERT INTO location VALUES ('5662', 'Jenakijeve', '2', '1496', '1', null);
INSERT INTO location VALUES ('5663', 'Kostjantynivka', '2', '1496', '1', null);
INSERT INTO location VALUES ('5664', 'Harkova [Harkiv]', '2', '1497', '1', null);
INSERT INTO location VALUES ('5665', 'Herson', '2', '1498', '1', null);
INSERT INTO location VALUES ('5666', 'Hmelnytskyi', '2', '1499', '1', null);
INSERT INTO location VALUES ('5667', 'Kamjanets-Podilskyi', '2', '1499', '1', null);
INSERT INTO location VALUES ('5668', 'Ivano-Frankivsk', '2', '1500', '1', null);
INSERT INTO location VALUES ('5669', 'Kyiv', '2', '1501', '1', null);
INSERT INTO location VALUES ('5670', 'Bila Tserkva', '2', '1501', '1', null);
INSERT INTO location VALUES ('5671', 'Brovary', '2', '1501', '1', null);
INSERT INTO location VALUES ('5672', 'Kirovograd', '2', '1502', '1', null);
INSERT INTO location VALUES ('5673', 'Oleksandrija', '2', '1502', '1', null);
INSERT INTO location VALUES ('5674', 'Sevastopol', '2', '1503', '1', null);
INSERT INTO location VALUES ('5675', 'Simferopol', '2', '1503', '1', null);
INSERT INTO location VALUES ('5676', 'KertÃƒâ€¦Ã‚Â¡', '2', '1503', '1', null);
INSERT INTO location VALUES ('5677', 'Jevpatorija', '2', '1503', '1', null);
INSERT INTO location VALUES ('5678', 'Lugansk', '2', '1504', '1', null);
INSERT INTO location VALUES ('5679', 'Sjeverodonetsk', '2', '1504', '1', null);
INSERT INTO location VALUES ('5680', 'AltÃƒâ€¦Ã‚Â¡evsk', '2', '1504', '1', null);
INSERT INTO location VALUES ('5681', 'LysytÃƒâ€¦Ã‚Â¡ansk', '2', '1504', '1', null);
INSERT INTO location VALUES ('5682', 'Krasnyi LutÃƒâ€¦Ã‚Â¡', '2', '1504', '1', null);
INSERT INTO location VALUES ('5683', 'Stahanov', '2', '1504', '1', null);
INSERT INTO location VALUES ('5684', 'Lviv', '2', '1505', '1', null);
INSERT INTO location VALUES ('5685', 'Mykolajiv', '2', '1506', '1', null);
INSERT INTO location VALUES ('5686', 'Odesa', '2', '1507', '1', null);
INSERT INTO location VALUES ('5687', 'Izmajil', '2', '1507', '1', null);
INSERT INTO location VALUES ('5688', 'Pultava [Poltava]', '2', '1508', '1', null);
INSERT INTO location VALUES ('5689', 'KrementÃƒâ€¦Ã‚Â¡uk', '2', '1508', '1', null);
INSERT INTO location VALUES ('5690', 'Rivne', '2', '1509', '1', null);
INSERT INTO location VALUES ('5691', 'Sumy', '2', '1510', '1', null);
INSERT INTO location VALUES ('5692', 'Konotop', '2', '1510', '1', null);
INSERT INTO location VALUES ('5693', 'Ãƒâ€¦ ostka', '2', '1510', '1', null);
INSERT INTO location VALUES ('5694', 'Uzgorod', '2', '1511', '1', null);
INSERT INTO location VALUES ('5695', 'MukatÃƒâ€¦Ã‚Â¡eve', '2', '1511', '1', null);
INSERT INTO location VALUES ('5696', 'Ternopil', '2', '1512', '1', null);
INSERT INTO location VALUES ('5697', 'TÃƒâ€¦Ã‚Â¡erkasy', '2', '1513', '1', null);
INSERT INTO location VALUES ('5698', 'Uman', '2', '1513', '1', null);
INSERT INTO location VALUES ('5699', 'TÃƒâ€¦Ã‚Â¡ernigiv', '2', '1514', '1', null);
INSERT INTO location VALUES ('5700', 'TÃƒâ€¦Ã‚Â¡ernivtsi', '2', '1515', '1', null);
INSERT INTO location VALUES ('5701', 'Vinnytsja', '2', '1516', '1', null);
INSERT INTO location VALUES ('5702', 'Lutsk', '2', '1517', '1', null);
INSERT INTO location VALUES ('5703', 'Zaporizzja', '2', '1518', '1', null);
INSERT INTO location VALUES ('5704', 'Melitopol', '2', '1518', '1', null);
INSERT INTO location VALUES ('5705', 'Berdjansk', '2', '1518', '1', null);
INSERT INTO location VALUES ('5706', 'Zytomyr', '2', '1519', '1', null);
INSERT INTO location VALUES ('5707', 'BerdytÃƒâ€¦Ã‚Â¡iv', '2', '1519', '1', null);
INSERT INTO location VALUES ('5708', 'Montevideo', '2', '1520', '1', null);
INSERT INTO location VALUES ('5709', 'Birmingham', '2', '1521', '1', null);
INSERT INTO location VALUES ('5710', 'Montgomery', '2', '1521', '1', null);
INSERT INTO location VALUES ('5711', 'Mobile', '2', '1521', '1', null);
INSERT INTO location VALUES ('5712', 'Huntsville', '2', '1521', '1', null);
INSERT INTO location VALUES ('5713', 'Anchorage', '2', '1522', '1', null);
INSERT INTO location VALUES ('5714', 'Phoenix', '2', '1523', '1', null);
INSERT INTO location VALUES ('5715', 'Tucson', '2', '1523', '1', null);
INSERT INTO location VALUES ('5716', 'Mesa', '2', '1523', '1', null);
INSERT INTO location VALUES ('5717', 'Glendale', '2', '1523', '1', null);
INSERT INTO location VALUES ('5718', 'Scottsdale', '2', '1523', '1', null);
INSERT INTO location VALUES ('5719', 'Chandler', '2', '1523', '1', null);
INSERT INTO location VALUES ('5720', 'Tempe', '2', '1523', '1', null);
INSERT INTO location VALUES ('5721', 'Gilbert', '2', '1523', '1', null);
INSERT INTO location VALUES ('5722', 'Peoria', '2', '1523', '1', null);
INSERT INTO location VALUES ('5723', 'Little Rock', '2', '1524', '1', null);
INSERT INTO location VALUES ('5724', 'Los Angeles', '2', '1525', '1', null);
INSERT INTO location VALUES ('5725', 'San Diego', '2', '1525', '1', null);
INSERT INTO location VALUES ('5726', 'San Jose', '2', '1525', '1', null);
INSERT INTO location VALUES ('5727', 'San Francisco', '2', '1525', '1', null);
INSERT INTO location VALUES ('5728', 'Long Beach', '2', '1525', '1', null);
INSERT INTO location VALUES ('5729', 'Fresno', '2', '1525', '1', null);
INSERT INTO location VALUES ('5730', 'Sacramento', '2', '1525', '1', null);
INSERT INTO location VALUES ('5731', 'Oakland', '2', '1525', '1', null);
INSERT INTO location VALUES ('5732', 'Santa Ana', '2', '1525', '1', null);
INSERT INTO location VALUES ('5733', 'Anaheim', '2', '1525', '1', null);
INSERT INTO location VALUES ('5734', 'Riverside', '2', '1525', '1', null);
INSERT INTO location VALUES ('5735', 'Bakersfield', '2', '1525', '1', null);
INSERT INTO location VALUES ('5736', 'Stockton', '2', '1525', '1', null);
INSERT INTO location VALUES ('5737', 'Fremont', '2', '1525', '1', null);
INSERT INTO location VALUES ('5738', 'Glendale', '2', '1525', '1', null);
INSERT INTO location VALUES ('5739', 'Huntington Beach', '2', '1525', '1', null);
INSERT INTO location VALUES ('5740', 'Modesto', '2', '1525', '1', null);
INSERT INTO location VALUES ('5741', 'San Bernardino', '2', '1525', '1', null);
INSERT INTO location VALUES ('5742', 'Chula Vista', '2', '1525', '1', null);
INSERT INTO location VALUES ('5743', 'Oxnard', '2', '1525', '1', null);
INSERT INTO location VALUES ('5744', 'Garden Grove', '2', '1525', '1', null);
INSERT INTO location VALUES ('5745', 'Oceanside', '2', '1525', '1', null);
INSERT INTO location VALUES ('5746', 'Ontario', '2', '1525', '1', null);
INSERT INTO location VALUES ('5747', 'Santa Clarita', '2', '1525', '1', null);
INSERT INTO location VALUES ('5748', 'Salinas', '2', '1525', '1', null);
INSERT INTO location VALUES ('5749', 'Pomona', '2', '1525', '1', null);
INSERT INTO location VALUES ('5750', 'Santa Rosa', '2', '1525', '1', null);
INSERT INTO location VALUES ('5751', 'Irvine', '2', '1525', '1', null);
INSERT INTO location VALUES ('5752', 'Moreno Valley', '2', '1525', '1', null);
INSERT INTO location VALUES ('5753', 'Pasadena', '2', '1525', '1', null);
INSERT INTO location VALUES ('5754', 'Hayward', '2', '1525', '1', null);
INSERT INTO location VALUES ('5755', 'Torrance', '2', '1525', '1', null);
INSERT INTO location VALUES ('5756', 'Escondido', '2', '1525', '1', null);
INSERT INTO location VALUES ('5757', 'Sunnyvale', '2', '1525', '1', null);
INSERT INTO location VALUES ('5758', 'Fontana', '2', '1525', '1', null);
INSERT INTO location VALUES ('5759', 'Orange', '2', '1525', '1', null);
INSERT INTO location VALUES ('5760', 'Rancho Cucamonga', '2', '1525', '1', null);
INSERT INTO location VALUES ('5761', 'East Los Angeles', '2', '1525', '1', null);
INSERT INTO location VALUES ('5762', 'Fullerton', '2', '1525', '1', null);
INSERT INTO location VALUES ('5763', 'Corona', '2', '1525', '1', null);
INSERT INTO location VALUES ('5764', 'Concord', '2', '1525', '1', null);
INSERT INTO location VALUES ('5765', 'Lancaster', '2', '1525', '1', null);
INSERT INTO location VALUES ('5766', 'Thousand Oaks', '2', '1525', '1', null);
INSERT INTO location VALUES ('5767', 'Vallejo', '2', '1525', '1', null);
INSERT INTO location VALUES ('5768', 'Palmdale', '2', '1525', '1', null);
INSERT INTO location VALUES ('5769', 'El Monte', '2', '1525', '1', null);
INSERT INTO location VALUES ('5770', 'Inglewood', '2', '1525', '1', null);
INSERT INTO location VALUES ('5771', 'Simi Valley', '2', '1525', '1', null);
INSERT INTO location VALUES ('5772', 'Costa Mesa', '2', '1525', '1', null);
INSERT INTO location VALUES ('5773', 'Downey', '2', '1525', '1', null);
INSERT INTO location VALUES ('5774', 'West Covina', '2', '1525', '1', null);
INSERT INTO location VALUES ('5775', 'Daly City', '2', '1525', '1', null);
INSERT INTO location VALUES ('5776', 'Citrus Heights', '2', '1525', '1', null);
INSERT INTO location VALUES ('5777', 'Norwalk', '2', '1525', '1', null);
INSERT INTO location VALUES ('5778', 'Berkeley', '2', '1525', '1', null);
INSERT INTO location VALUES ('5779', 'Santa Clara', '2', '1525', '1', null);
INSERT INTO location VALUES ('5780', 'San Buenaventura', '2', '1525', '1', null);
INSERT INTO location VALUES ('5781', 'Burbank', '2', '1525', '1', null);
INSERT INTO location VALUES ('5782', 'Mission Viejo', '2', '1525', '1', null);
INSERT INTO location VALUES ('5783', 'El Cajon', '2', '1525', '1', null);
INSERT INTO location VALUES ('5784', 'Richmond', '2', '1525', '1', null);
INSERT INTO location VALUES ('5785', 'Compton', '2', '1525', '1', null);
INSERT INTO location VALUES ('5786', 'Fairfield', '2', '1525', '1', null);
INSERT INTO location VALUES ('5787', 'Arden-Arcade', '2', '1525', '1', null);
INSERT INTO location VALUES ('5788', 'San Mateo', '2', '1525', '1', null);
INSERT INTO location VALUES ('5789', 'Visalia', '2', '1525', '1', null);
INSERT INTO location VALUES ('5790', 'Santa Monica', '2', '1525', '1', null);
INSERT INTO location VALUES ('5791', 'Carson', '2', '1525', '1', null);
INSERT INTO location VALUES ('5792', 'Denver', '2', '1526', '1', null);
INSERT INTO location VALUES ('5793', 'Colorado Springs', '2', '1526', '1', null);
INSERT INTO location VALUES ('5794', 'Aurora', '2', '1526', '1', null);
INSERT INTO location VALUES ('5795', 'Lakewood', '2', '1526', '1', null);
INSERT INTO location VALUES ('5796', 'Fort Collins', '2', '1526', '1', null);
INSERT INTO location VALUES ('5797', 'Arvada', '2', '1526', '1', null);
INSERT INTO location VALUES ('5798', 'Pueblo', '2', '1526', '1', null);
INSERT INTO location VALUES ('5799', 'Westminster', '2', '1526', '1', null);
INSERT INTO location VALUES ('5800', 'Boulder', '2', '1526', '1', null);
INSERT INTO location VALUES ('5801', 'Bridgeport', '2', '1527', '1', null);
INSERT INTO location VALUES ('5802', 'New Haven', '2', '1527', '1', null);
INSERT INTO location VALUES ('5803', 'Hartford', '2', '1527', '1', null);
INSERT INTO location VALUES ('5804', 'Stamford', '2', '1527', '1', null);
INSERT INTO location VALUES ('5805', 'Waterbury', '2', '1527', '1', null);
INSERT INTO location VALUES ('5806', 'Washington', '2', '1528', '1', null);
INSERT INTO location VALUES ('5807', 'Jacksonville', '2', '1529', '1', null);
INSERT INTO location VALUES ('5808', 'Miami', '2', '1529', '1', null);
INSERT INTO location VALUES ('5809', 'Tampa', '2', '1529', '1', null);
INSERT INTO location VALUES ('5810', 'Saint Petersburg', '2', '1529', '1', null);
INSERT INTO location VALUES ('5811', 'Hialeah', '2', '1529', '1', null);
INSERT INTO location VALUES ('5812', 'Orlando', '2', '1529', '1', null);
INSERT INTO location VALUES ('5813', 'Fort Lauderdale', '2', '1529', '1', null);
INSERT INTO location VALUES ('5814', 'Tallahassee', '2', '1529', '1', null);
INSERT INTO location VALUES ('5815', 'Hollywood', '2', '1529', '1', null);
INSERT INTO location VALUES ('5816', 'Pembroke Pines', '2', '1529', '1', null);
INSERT INTO location VALUES ('5817', 'Coral Springs', '2', '1529', '1', null);
INSERT INTO location VALUES ('5818', 'Cape Coral', '2', '1529', '1', null);
INSERT INTO location VALUES ('5819', 'Clearwater', '2', '1529', '1', null);
INSERT INTO location VALUES ('5820', 'Miami Beach', '2', '1529', '1', null);
INSERT INTO location VALUES ('5821', 'Gainesville', '2', '1529', '1', null);
INSERT INTO location VALUES ('5822', 'Atlanta', '2', '1530', '1', null);
INSERT INTO location VALUES ('5823', 'Augusta-Richmond County', '2', '1530', '1', null);
INSERT INTO location VALUES ('5824', 'Columbus', '2', '1530', '1', null);
INSERT INTO location VALUES ('5825', 'Savannah', '2', '1530', '1', null);
INSERT INTO location VALUES ('5826', 'Macon', '2', '1530', '1', null);
INSERT INTO location VALUES ('5827', 'Athens-Clarke County', '2', '1530', '1', null);
INSERT INTO location VALUES ('5828', 'Honolulu', '2', '1531', '1', null);
INSERT INTO location VALUES ('5829', 'Boise City', '2', '1532', '1', null);
INSERT INTO location VALUES ('5830', 'Chicago', '2', '1533', '1', null);
INSERT INTO location VALUES ('5831', 'Rockford', '2', '1533', '1', null);
INSERT INTO location VALUES ('5832', 'Aurora', '2', '1533', '1', null);
INSERT INTO location VALUES ('5833', 'Naperville', '2', '1533', '1', null);
INSERT INTO location VALUES ('5834', 'Peoria', '2', '1533', '1', null);
INSERT INTO location VALUES ('5835', 'Springfield', '2', '1533', '1', null);
INSERT INTO location VALUES ('5836', 'Joliet', '2', '1533', '1', null);
INSERT INTO location VALUES ('5837', 'Elgin', '2', '1533', '1', null);
INSERT INTO location VALUES ('5838', 'Indianapolis', '2', '1534', '1', null);
INSERT INTO location VALUES ('5839', 'Fort Wayne', '2', '1534', '1', null);
INSERT INTO location VALUES ('5840', 'Evansville', '2', '1534', '1', null);
INSERT INTO location VALUES ('5841', 'South Bend', '2', '1534', '1', null);
INSERT INTO location VALUES ('5842', 'Gary', '2', '1534', '1', null);
INSERT INTO location VALUES ('5843', 'Des Moines', '2', '1535', '1', null);
INSERT INTO location VALUES ('5844', 'Cedar Rapids', '2', '1535', '1', null);
INSERT INTO location VALUES ('5845', 'Davenport', '2', '1535', '1', null);
INSERT INTO location VALUES ('5846', 'Wichita', '2', '1536', '1', null);
INSERT INTO location VALUES ('5847', 'Overland Park', '2', '1536', '1', null);
INSERT INTO location VALUES ('5848', 'Kansas City', '2', '1536', '1', null);
INSERT INTO location VALUES ('5849', 'Topeka', '2', '1536', '1', null);
INSERT INTO location VALUES ('5850', 'Lexington-Fayette', '2', '1537', '1', null);
INSERT INTO location VALUES ('5851', 'Louisville', '2', '1537', '1', null);
INSERT INTO location VALUES ('5852', 'New Orleans', '2', '1538', '1', null);
INSERT INTO location VALUES ('5853', 'Baton Rouge', '2', '1538', '1', null);
INSERT INTO location VALUES ('5854', 'Shreveport', '2', '1538', '1', null);
INSERT INTO location VALUES ('5855', 'Metairie', '2', '1538', '1', null);
INSERT INTO location VALUES ('5856', 'Lafayette', '2', '1538', '1', null);
INSERT INTO location VALUES ('5857', 'Baltimore', '2', '1539', '1', null);
INSERT INTO location VALUES ('5858', 'Boston', '2', '1540', '1', null);
INSERT INTO location VALUES ('5859', 'Worcester', '2', '1540', '1', null);
INSERT INTO location VALUES ('5860', 'Springfield', '2', '1540', '1', null);
INSERT INTO location VALUES ('5861', 'Lowell', '2', '1540', '1', null);
INSERT INTO location VALUES ('5862', 'Cambridge', '2', '1540', '1', null);
INSERT INTO location VALUES ('5863', 'New Bedford', '2', '1540', '1', null);
INSERT INTO location VALUES ('5864', 'Brockton', '2', '1540', '1', null);
INSERT INTO location VALUES ('5865', 'Fall River', '2', '1540', '1', null);
INSERT INTO location VALUES ('5866', 'Detroit', '2', '1541', '1', null);
INSERT INTO location VALUES ('5867', 'Grand Rapids', '2', '1541', '1', null);
INSERT INTO location VALUES ('5868', 'Warren', '2', '1541', '1', null);
INSERT INTO location VALUES ('5869', 'Flint', '2', '1541', '1', null);
INSERT INTO location VALUES ('5870', 'Sterling Heights', '2', '1541', '1', null);
INSERT INTO location VALUES ('5871', 'Lansing', '2', '1541', '1', null);
INSERT INTO location VALUES ('5872', 'Ann Arbor', '2', '1541', '1', null);
INSERT INTO location VALUES ('5873', 'Livonia', '2', '1541', '1', null);
INSERT INTO location VALUES ('5874', 'Minneapolis', '2', '1542', '1', null);
INSERT INTO location VALUES ('5875', 'Saint Paul', '2', '1542', '1', null);
INSERT INTO location VALUES ('5876', 'Jackson', '2', '1543', '1', null);
INSERT INTO location VALUES ('5877', 'Kansas City', '2', '1544', '1', null);
INSERT INTO location VALUES ('5878', 'Saint Louis', '2', '1544', '1', null);
INSERT INTO location VALUES ('5879', 'Springfield', '2', '1544', '1', null);
INSERT INTO location VALUES ('5880', 'Independence', '2', '1544', '1', null);
INSERT INTO location VALUES ('5881', 'Billings', '2', '1545', '1', null);
INSERT INTO location VALUES ('5882', 'Omaha', '2', '1546', '1', null);
INSERT INTO location VALUES ('5883', 'Lincoln', '2', '1546', '1', null);
INSERT INTO location VALUES ('5884', 'Las Vegas', '2', '1547', '1', null);
INSERT INTO location VALUES ('5885', 'Reno', '2', '1547', '1', null);
INSERT INTO location VALUES ('5886', 'Henderson', '2', '1547', '1', null);
INSERT INTO location VALUES ('5887', 'Paradise', '2', '1547', '1', null);
INSERT INTO location VALUES ('5888', 'North Las Vegas', '2', '1547', '1', null);
INSERT INTO location VALUES ('5889', 'Sunrise Manor', '2', '1547', '1', null);
INSERT INTO location VALUES ('5890', 'Manchester', '2', '1548', '1', null);
INSERT INTO location VALUES ('5891', 'Newark', '2', '1549', '1', null);
INSERT INTO location VALUES ('5892', 'Jersey City', '2', '1549', '1', null);
INSERT INTO location VALUES ('5893', 'Paterson', '2', '1549', '1', null);
INSERT INTO location VALUES ('5894', 'Elizabeth', '2', '1549', '1', null);
INSERT INTO location VALUES ('5895', 'Albuquerque', '2', '1550', '1', null);
INSERT INTO location VALUES ('5896', 'New York', '2', '1551', '1', null);
INSERT INTO location VALUES ('5897', 'Buffalo', '2', '1551', '1', null);
INSERT INTO location VALUES ('5898', 'Rochester', '2', '1551', '1', null);
INSERT INTO location VALUES ('5899', 'Yonkers', '2', '1551', '1', null);
INSERT INTO location VALUES ('5900', 'Syracuse', '2', '1551', '1', null);
INSERT INTO location VALUES ('5901', 'Albany', '2', '1551', '1', null);
INSERT INTO location VALUES ('5902', 'Charlotte', '2', '1552', '1', null);
INSERT INTO location VALUES ('5903', 'Raleigh', '2', '1552', '1', null);
INSERT INTO location VALUES ('5904', 'Greensboro', '2', '1552', '1', null);
INSERT INTO location VALUES ('5905', 'Durham', '2', '1552', '1', null);
INSERT INTO location VALUES ('5906', 'Winston-Salem', '2', '1552', '1', null);
INSERT INTO location VALUES ('5907', 'Fayetteville', '2', '1552', '1', null);
INSERT INTO location VALUES ('5908', 'Cary', '2', '1552', '1', null);
INSERT INTO location VALUES ('5909', 'Columbus', '2', '1553', '1', null);
INSERT INTO location VALUES ('5910', 'Cleveland', '2', '1553', '1', null);
INSERT INTO location VALUES ('5911', 'Cincinnati', '2', '1553', '1', null);
INSERT INTO location VALUES ('5912', 'Toledo', '2', '1553', '1', null);
INSERT INTO location VALUES ('5913', 'Akron', '2', '1553', '1', null);
INSERT INTO location VALUES ('5914', 'Dayton', '2', '1553', '1', null);
INSERT INTO location VALUES ('5915', 'Oklahoma City', '2', '1554', '1', null);
INSERT INTO location VALUES ('5916', 'Tulsa', '2', '1554', '1', null);
INSERT INTO location VALUES ('5917', 'Norman', '2', '1554', '1', null);
INSERT INTO location VALUES ('5918', 'Portland', '2', '1555', '1', null);
INSERT INTO location VALUES ('5919', 'Eugene', '2', '1555', '1', null);
INSERT INTO location VALUES ('5920', 'Salem', '2', '1555', '1', null);
INSERT INTO location VALUES ('5921', 'Philadelphia', '2', '1556', '1', null);
INSERT INTO location VALUES ('5922', 'Pittsburgh', '2', '1556', '1', null);
INSERT INTO location VALUES ('5923', 'Allentown', '2', '1556', '1', null);
INSERT INTO location VALUES ('5924', 'Erie', '2', '1556', '1', null);
INSERT INTO location VALUES ('5925', 'Providence', '2', '1557', '1', null);
INSERT INTO location VALUES ('5926', 'Columbia', '2', '1558', '1', null);
INSERT INTO location VALUES ('5927', 'Charleston', '2', '1558', '1', null);
INSERT INTO location VALUES ('5928', 'Sioux Falls', '2', '1559', '1', null);
INSERT INTO location VALUES ('5929', 'Memphis', '2', '1560', '1', null);
INSERT INTO location VALUES ('5930', 'Nashville-Davidson', '2', '1560', '1', null);
INSERT INTO location VALUES ('5931', 'Knoxville', '2', '1560', '1', null);
INSERT INTO location VALUES ('5932', 'Chattanooga', '2', '1560', '1', null);
INSERT INTO location VALUES ('5933', 'Clarksville', '2', '1560', '1', null);
INSERT INTO location VALUES ('5934', 'Houston', '2', '1561', '1', null);
INSERT INTO location VALUES ('5935', 'Dallas', '2', '1561', '1', null);
INSERT INTO location VALUES ('5936', 'San Antonio', '2', '1561', '1', null);
INSERT INTO location VALUES ('5937', 'Austin', '2', '1561', '1', null);
INSERT INTO location VALUES ('5938', 'El Paso', '2', '1561', '1', null);
INSERT INTO location VALUES ('5939', 'Fort Worth', '2', '1561', '1', null);
INSERT INTO location VALUES ('5940', 'Arlington', '2', '1561', '1', null);
INSERT INTO location VALUES ('5941', 'Corpus Christi', '2', '1561', '1', null);
INSERT INTO location VALUES ('5942', 'Plano', '2', '1561', '1', null);
INSERT INTO location VALUES ('5943', 'Garland', '2', '1561', '1', null);
INSERT INTO location VALUES ('5944', 'Lubbock', '2', '1561', '1', null);
INSERT INTO location VALUES ('5945', 'Irving', '2', '1561', '1', null);
INSERT INTO location VALUES ('5946', 'Laredo', '2', '1561', '1', null);
INSERT INTO location VALUES ('5947', 'Amarillo', '2', '1561', '1', null);
INSERT INTO location VALUES ('5948', 'Brownsville', '2', '1561', '1', null);
INSERT INTO location VALUES ('5949', 'Pasadena', '2', '1561', '1', null);
INSERT INTO location VALUES ('5950', 'Grand Prairie', '2', '1561', '1', null);
INSERT INTO location VALUES ('5951', 'Mesquite', '2', '1561', '1', null);
INSERT INTO location VALUES ('5952', 'Abilene', '2', '1561', '1', null);
INSERT INTO location VALUES ('5953', 'Beaumont', '2', '1561', '1', null);
INSERT INTO location VALUES ('5954', 'Waco', '2', '1561', '1', null);
INSERT INTO location VALUES ('5955', 'Carrollton', '2', '1561', '1', null);
INSERT INTO location VALUES ('5956', 'McAllen', '2', '1561', '1', null);
INSERT INTO location VALUES ('5957', 'Wichita Falls', '2', '1561', '1', null);
INSERT INTO location VALUES ('5958', 'Midland', '2', '1561', '1', null);
INSERT INTO location VALUES ('5959', 'Odessa', '2', '1561', '1', null);
INSERT INTO location VALUES ('5960', 'Salt Lake City', '2', '1562', '1', null);
INSERT INTO location VALUES ('5961', 'West Valley City', '2', '1562', '1', null);
INSERT INTO location VALUES ('5962', 'Provo', '2', '1562', '1', null);
INSERT INTO location VALUES ('5963', 'Sandy', '2', '1562', '1', null);
INSERT INTO location VALUES ('5964', 'Virginia Beach', '2', '1563', '1', null);
INSERT INTO location VALUES ('5965', 'Norfolk', '2', '1563', '1', null);
INSERT INTO location VALUES ('5966', 'Chesapeake', '2', '1563', '1', null);
INSERT INTO location VALUES ('5967', 'Richmond', '2', '1563', '1', null);
INSERT INTO location VALUES ('5968', 'Newport News', '2', '1563', '1', null);
INSERT INTO location VALUES ('5969', 'Arlington', '2', '1563', '1', null);
INSERT INTO location VALUES ('5970', 'Hampton', '2', '1563', '1', null);
INSERT INTO location VALUES ('5971', 'Alexandria', '2', '1563', '1', null);
INSERT INTO location VALUES ('5972', 'Portsmouth', '2', '1563', '1', null);
INSERT INTO location VALUES ('5973', 'Roanoke', '2', '1563', '1', null);
INSERT INTO location VALUES ('5974', 'Seattle', '2', '1564', '1', null);
INSERT INTO location VALUES ('5975', 'Spokane', '2', '1564', '1', null);
INSERT INTO location VALUES ('5976', 'Tacoma', '2', '1564', '1', null);
INSERT INTO location VALUES ('5977', 'Vancouver', '2', '1564', '1', null);
INSERT INTO location VALUES ('5978', 'Bellevue', '2', '1564', '1', null);
INSERT INTO location VALUES ('5979', 'Milwaukee', '2', '1565', '1', null);
INSERT INTO location VALUES ('5980', 'Madison', '2', '1565', '1', null);
INSERT INTO location VALUES ('5981', 'Green Bay', '2', '1565', '1', null);
INSERT INTO location VALUES ('5982', 'Kenosha', '2', '1565', '1', null);
INSERT INTO location VALUES ('5983', 'Andijon', '2', '1566', '1', null);
INSERT INTO location VALUES ('5984', 'Buhoro', '2', '1567', '1', null);
INSERT INTO location VALUES ('5985', 'Cizah', '2', '1568', '1', null);
INSERT INTO location VALUES ('5986', 'KÃƒÆ’Ã‚Â¼kon', '2', '1569', '1', null);
INSERT INTO location VALUES ('5987', 'Fargona', '2', '1569', '1', null);
INSERT INTO location VALUES ('5988', 'Margilon', '2', '1569', '1', null);
INSERT INTO location VALUES ('5989', 'Nukus', '2', '1570', '1', null);
INSERT INTO location VALUES ('5990', 'ÃƒÆ’Ã…â€œrgenc', '2', '1571', '1', null);
INSERT INTO location VALUES ('5991', 'Namangan', '2', '1572', '1', null);
INSERT INTO location VALUES ('5992', 'Navoi', '2', '1573', '1', null);
INSERT INTO location VALUES ('5993', 'Karsi', '2', '1574', '1', null);
INSERT INTO location VALUES ('5994', 'Samarkand', '2', '1575', '1', null);
INSERT INTO location VALUES ('5995', 'Termiz', '2', '1576', '1', null);
INSERT INTO location VALUES ('5996', 'Circik', '2', '1577', '1', null);
INSERT INTO location VALUES ('5997', 'Angren', '2', '1577', '1', null);
INSERT INTO location VALUES ('5998', 'Olmalik', '2', '1577', '1', null);
INSERT INTO location VALUES ('5999', 'Toskent', '2', '1578', '1', null);
INSERT INTO location VALUES ('6000', 'South Hill', '2', '1579', '1', null);
INSERT INTO location VALUES ('6001', 'The Valley', '2', '1579', '1', null);
INSERT INTO location VALUES ('6002', 'Oranjestad', '2', '1579', '1', null);
INSERT INTO location VALUES ('6003', 'Douglas', '2', '1579', '1', null);
INSERT INTO location VALUES ('6004', 'Gibraltar', '2', '1579', '1', null);
INSERT INTO location VALUES ('6005', 'Tamuning', '2', '1579', '1', null);
INSERT INTO location VALUES ('6006', 'AgaÃƒÆ’Ã‚Â±a', '2', '1579', '1', null);
INSERT INTO location VALUES ('6007', 'Flying Fish Cove', '2', '1579', '1', null);
INSERT INTO location VALUES ('6008', 'Monte-Carlo', '2', '1579', '1', null);
INSERT INTO location VALUES ('6009', 'Monaco-Ville', '2', '1579', '1', null);
INSERT INTO location VALUES ('6010', 'Yangor', '2', '1579', '1', null);
INSERT INTO location VALUES ('6011', 'Yaren', '2', '1579', '1', null);
INSERT INTO location VALUES ('6012', 'Alofi', '2', '1579', '1', null);
INSERT INTO location VALUES ('6013', 'Kingston', '2', '1579', '1', null);
INSERT INTO location VALUES ('6014', 'Adamstown', '2', '1579', '1', null);
INSERT INTO location VALUES ('6015', 'Singapore', '2', '1579', '1', null);
INSERT INTO location VALUES ('6016', 'NoumÃƒÆ’Ã‚Â©a', '2', '1579', '1', null);
INSERT INTO location VALUES ('6017', 'CittÃƒÆ’  del Vaticano', '2', '1579', '1', null);
INSERT INTO location VALUES ('6018', 'Roseau', '2', '1580', '1', null);
INSERT INTO location VALUES ('6019', 'Saint GeorgeÃƒâ€šÃ‚Â´s', '2', '1580', '1', null);
INSERT INTO location VALUES ('6020', 'Kingstown', '2', '1580', '1', null);
INSERT INTO location VALUES ('6021', 'Taiping', '2', '1581', '1', null);
INSERT INTO location VALUES ('6022', 'Taliao', '2', '1581', '1', null);
INSERT INTO location VALUES ('6023', 'Kueishan', '2', '1581', '1', null);
INSERT INTO location VALUES ('6024', 'Ciudad Losada', '2', '1581', '1', null);
INSERT INTO location VALUES ('6025', 'Barcelona', '2', '1582', '1', null);
INSERT INTO location VALUES ('6026', 'Puerto La Cruz', '2', '1582', '1', null);
INSERT INTO location VALUES ('6027', 'El Tigre', '2', '1582', '1', null);
INSERT INTO location VALUES ('6028', 'Pozuelos', '2', '1582', '1', null);
INSERT INTO location VALUES ('6029', 'San Fernando de Apure', '2', '1583', '1', null);
INSERT INTO location VALUES ('6030', 'Maracay', '2', '1584', '1', null);
INSERT INTO location VALUES ('6031', 'Turmero', '2', '1584', '1', null);
INSERT INTO location VALUES ('6032', 'El LimÃƒÆ’Ã‚Â³n', '2', '1584', '1', null);
INSERT INTO location VALUES ('6033', 'Barinas', '2', '1585', '1', null);
INSERT INTO location VALUES ('6034', 'Cartagena', '2', '1586', '1', null);
INSERT INTO location VALUES ('6035', 'Ciudad Guayana', '2', '1586', '1', null);
INSERT INTO location VALUES ('6036', 'Ciudad BolÃƒÆ’Ã‚Â¬var', '2', '1586', '1', null);
INSERT INTO location VALUES ('6037', 'Valencia', '2', '1587', '1', null);
INSERT INTO location VALUES ('6038', 'Puerto Cabello', '2', '1587', '1', null);
INSERT INTO location VALUES ('6039', 'Guacara', '2', '1587', '1', null);
INSERT INTO location VALUES ('6040', 'Buenos Aires', '2', '1588', '1', null);
INSERT INTO location VALUES ('6041', 'BrasÃƒÆ’Ã‚Â¬lia', '2', '1588', '1', null);
INSERT INTO location VALUES ('6042', 'Ciudad de MÃƒÆ’Ã‚Â©xico', '2', '1588', '1', null);
INSERT INTO location VALUES ('6043', 'Caracas', '2', '1588', '1', null);
INSERT INTO location VALUES ('6044', 'Catia La Mar', '2', '1588', '1', null);
INSERT INTO location VALUES ('6045', 'Santa Ana de Coro', '2', '1589', '1', null);
INSERT INTO location VALUES ('6046', 'Punto Fijo', '2', '1589', '1', null);
INSERT INTO location VALUES ('6047', 'Calabozo', '2', '1590', '1', null);
INSERT INTO location VALUES ('6048', 'Valle de la Pascua', '2', '1590', '1', null);
INSERT INTO location VALUES ('6049', 'Barquisimeto', '2', '1591', '1', null);
INSERT INTO location VALUES ('6050', 'MÃƒÆ’Ã‚Â©rida', '2', '1592', '1', null);
INSERT INTO location VALUES ('6051', 'Petare', '2', '1593', '1', null);
INSERT INTO location VALUES ('6052', 'Baruta', '2', '1593', '1', null);
INSERT INTO location VALUES ('6053', 'Los Teques', '2', '1593', '1', null);
INSERT INTO location VALUES ('6054', 'Guarenas', '2', '1593', '1', null);
INSERT INTO location VALUES ('6055', 'Guatire', '2', '1593', '1', null);
INSERT INTO location VALUES ('6056', 'Ocumare del Tuy', '2', '1593', '1', null);
INSERT INTO location VALUES ('6057', 'MaturÃƒÆ’Ã‚Â¬n', '2', '1594', '1', null);
INSERT INTO location VALUES ('6058', 'Acarigua', '2', '1595', '1', null);
INSERT INTO location VALUES ('6059', 'Guanare', '2', '1595', '1', null);
INSERT INTO location VALUES ('6060', 'Araure', '2', '1595', '1', null);
INSERT INTO location VALUES ('6061', 'Sincelejo', '2', '1596', '1', null);
INSERT INTO location VALUES ('6062', 'CumanÃƒÆ’Ã‚Â¡', '2', '1596', '1', null);
INSERT INTO location VALUES ('6063', 'CarÃƒÆ’Ã‚Âºpano', '2', '1596', '1', null);
INSERT INTO location VALUES ('6064', 'San CristÃƒÆ’Ã‚Â³bal', '2', '1597', '1', null);
INSERT INTO location VALUES ('6065', 'Valera', '2', '1598', '1', null);
INSERT INTO location VALUES ('6066', 'San Felipe', '2', '1599', '1', null);
INSERT INTO location VALUES ('6067', 'MaracaÃƒÆ’Ã‚Â¬bo', '2', '1600', '1', null);
INSERT INTO location VALUES ('6068', 'Cabimas', '2', '1600', '1', null);
INSERT INTO location VALUES ('6069', 'Ciudad Ojeda', '2', '1600', '1', null);
INSERT INTO location VALUES ('6070', 'Road Town', '2', '1601', '1', null);
INSERT INTO location VALUES ('6071', 'Charlotte Amalie', '2', '1602', '1', null);
INSERT INTO location VALUES ('6072', 'Long Xuyen', '2', '1603', '1', null);
INSERT INTO location VALUES ('6073', 'Vung Tau', '2', '1604', '1', null);
INSERT INTO location VALUES ('6074', 'Thai Nguyen', '2', '1605', '1', null);
INSERT INTO location VALUES ('6075', 'Quy Nhon', '2', '1606', '1', null);
INSERT INTO location VALUES ('6076', 'Phan ThiÃƒÆ’Ã‚Âªt', '2', '1607', '1', null);
INSERT INTO location VALUES ('6077', 'Can Tho', '2', '1608', '1', null);
INSERT INTO location VALUES ('6078', 'Buon Ma Thuot', '2', '1609', '1', null);
INSERT INTO location VALUES ('6079', 'BiÃƒÆ’Ã‚Âªn Hoa', '2', '1610', '1', null);
INSERT INTO location VALUES ('6080', 'Haiphong', '2', '1611', '1', null);
INSERT INTO location VALUES ('6081', 'Hanoi', '2', '1612', '1', null);
INSERT INTO location VALUES ('6082', 'Ho Chi Minh City', '2', '1613', '1', null);
INSERT INTO location VALUES ('6083', 'Nha Trang', '2', '1614', '1', null);
INSERT INTO location VALUES ('6084', 'Cam Ranh', '2', '1614', '1', null);
INSERT INTO location VALUES ('6085', 'Rach Gia', '2', '1615', '1', null);
INSERT INTO location VALUES ('6086', 'Da Lat', '2', '1616', '1', null);
INSERT INTO location VALUES ('6087', 'Nam Dinh', '2', '1617', '1', null);
INSERT INTO location VALUES ('6088', 'Vinh', '2', '1618', '1', null);
INSERT INTO location VALUES ('6089', 'Cam Pha', '2', '1619', '1', null);
INSERT INTO location VALUES ('6090', 'Da Nang', '2', '1620', '1', null);
INSERT INTO location VALUES ('6091', 'Hong Gai', '2', '1621', '1', null);
INSERT INTO location VALUES ('6092', 'Hue', '2', '1622', '1', null);
INSERT INTO location VALUES ('6093', 'My Tho', '2', '1623', '1', null);
INSERT INTO location VALUES ('6094', 'Port-Vila', '2', '1624', '1', null);
INSERT INTO location VALUES ('6095', 'Mata-Utu', '2', '1625', '1', null);
INSERT INTO location VALUES ('6096', 'Apia', '2', '1626', '1', null);
INSERT INTO location VALUES ('6097', 'Aden', '2', '1627', '1', null);
INSERT INTO location VALUES ('6098', 'al-Mukalla', '2', '1628', '1', null);
INSERT INTO location VALUES ('6099', 'Hodeida', '2', '1629', '1', null);
INSERT INTO location VALUES ('6100', 'Ibb', '2', '1630', '1', null);
INSERT INTO location VALUES ('6101', 'Sanaa', '2', '1631', '1', null);
INSERT INTO location VALUES ('6102', 'Taizz', '2', '1632', '1', null);
INSERT INTO location VALUES ('6103', 'Beograd', '2', '1633', '1', null);
INSERT INTO location VALUES ('6104', 'NiÃƒâ€¦Ã‚Â¡', '2', '1633', '1', null);
INSERT INTO location VALUES ('6105', 'Kragujevac', '2', '1633', '1', null);
INSERT INTO location VALUES ('6106', 'PriÃƒâ€¦Ã‚Â¡tina', '2', '1634', '1', null);
INSERT INTO location VALUES ('6107', 'Prizren', '2', '1634', '1', null);
INSERT INTO location VALUES ('6108', 'Podgorica', '2', '1635', '1', null);
INSERT INTO location VALUES ('6109', 'Novi Sad', '2', '1636', '1', null);
INSERT INTO location VALUES ('6110', 'Subotica', '2', '1636', '1', null);
INSERT INTO location VALUES ('6111', 'Port Elizabeth', '2', '1637', '1', null);
INSERT INTO location VALUES ('6112', 'East London', '2', '1637', '1', null);
INSERT INTO location VALUES ('6113', 'Uitenhage', '2', '1637', '1', null);
INSERT INTO location VALUES ('6114', 'Mdantsane', '2', '1637', '1', null);
INSERT INTO location VALUES ('6115', 'Bloemfontein', '2', '1638', '1', null);
INSERT INTO location VALUES ('6116', 'Welkom', '2', '1638', '1', null);
INSERT INTO location VALUES ('6117', 'Botshabelo', '2', '1638', '1', null);
INSERT INTO location VALUES ('6118', 'Soweto', '2', '1639', '1', null);
INSERT INTO location VALUES ('6119', 'Johannesburg', '2', '1639', '1', null);
INSERT INTO location VALUES ('6120', 'Pretoria', '2', '1639', '1', null);
INSERT INTO location VALUES ('6121', 'Vanderbijlpark', '2', '1639', '1', null);
INSERT INTO location VALUES ('6122', 'Kempton Park', '2', '1639', '1', null);
INSERT INTO location VALUES ('6123', 'Alberton', '2', '1639', '1', null);
INSERT INTO location VALUES ('6124', 'Benoni', '2', '1639', '1', null);
INSERT INTO location VALUES ('6125', 'Randburg', '2', '1639', '1', null);
INSERT INTO location VALUES ('6126', 'Vereeniging', '2', '1639', '1', null);
INSERT INTO location VALUES ('6127', 'Wonderboom', '2', '1639', '1', null);
INSERT INTO location VALUES ('6128', 'Roodepoort', '2', '1639', '1', null);
INSERT INTO location VALUES ('6129', 'Boksburg', '2', '1639', '1', null);
INSERT INTO location VALUES ('6130', 'Soshanguve', '2', '1639', '1', null);
INSERT INTO location VALUES ('6131', 'Krugersdorp', '2', '1639', '1', null);
INSERT INTO location VALUES ('6132', 'Brakpan', '2', '1639', '1', null);
INSERT INTO location VALUES ('6133', 'Oberholzer', '2', '1639', '1', null);
INSERT INTO location VALUES ('6134', 'Germiston', '2', '1639', '1', null);
INSERT INTO location VALUES ('6135', 'Springs', '2', '1639', '1', null);
INSERT INTO location VALUES ('6136', 'Westonaria', '2', '1639', '1', null);
INSERT INTO location VALUES ('6137', 'Randfontein', '2', '1639', '1', null);
INSERT INTO location VALUES ('6138', 'Nigel', '2', '1639', '1', null);
INSERT INTO location VALUES ('6139', 'Inanda', '2', '1640', '1', null);
INSERT INTO location VALUES ('6140', 'Durban', '2', '1640', '1', null);
INSERT INTO location VALUES ('6141', 'Pinetown', '2', '1640', '1', null);
INSERT INTO location VALUES ('6142', 'Pietermaritzburg', '2', '1640', '1', null);
INSERT INTO location VALUES ('6143', 'Umlazi', '2', '1640', '1', null);
INSERT INTO location VALUES ('6144', 'Newcastle', '2', '1640', '1', null);
INSERT INTO location VALUES ('6145', 'Chatsworth', '2', '1640', '1', null);
INSERT INTO location VALUES ('6146', 'Ladysmith', '2', '1640', '1', null);
INSERT INTO location VALUES ('6147', 'Witbank', '2', '1641', '1', null);
INSERT INTO location VALUES ('6148', 'Klerksdorp', '2', '1642', '1', null);
INSERT INTO location VALUES ('6149', 'Potchefstroom', '2', '1642', '1', null);
INSERT INTO location VALUES ('6150', 'Rustenburg', '2', '1642', '1', null);
INSERT INTO location VALUES ('6151', 'Kimberley', '2', '1643', '1', null);
INSERT INTO location VALUES ('6152', 'Cape Town', '2', '1644', '1', null);
INSERT INTO location VALUES ('6153', 'Paarl', '2', '1644', '1', null);
INSERT INTO location VALUES ('6154', 'George', '2', '1644', '1', null);
INSERT INTO location VALUES ('6155', 'Suva', '2', '1645', '1', null);
INSERT INTO location VALUES ('6156', 'Nyeri', '2', '1645', '1', null);
INSERT INTO location VALUES ('6157', 'Kathmandu', '2', '1645', '1', null);
INSERT INTO location VALUES ('6158', 'Lalitapur', '2', '1645', '1', null);
INSERT INTO location VALUES ('6159', 'Birgunj', '2', '1645', '1', null);
INSERT INTO location VALUES ('6160', 'San Lorenzo', '2', '1645', '1', null);
INSERT INTO location VALUES ('6161', 'LambarÃƒÆ’Ã‚Â©', '2', '1645', '1', null);
INSERT INTO location VALUES ('6162', 'Fernando de la Mora', '2', '1645', '1', null);
INSERT INTO location VALUES ('6163', 'Kabwe', '2', '1645', '1', null);
INSERT INTO location VALUES ('6164', 'Kandy', '2', '1645', '1', null);
INSERT INTO location VALUES ('6165', 'Kampala', '2', '1645', '1', null);
INSERT INTO location VALUES ('6166', 'Ndola', '2', '1646', '1', null);
INSERT INTO location VALUES ('6167', 'Kitwe', '2', '1646', '1', null);
INSERT INTO location VALUES ('6168', 'Chingola', '2', '1646', '1', null);
INSERT INTO location VALUES ('6169', 'Mufulira', '2', '1646', '1', null);
INSERT INTO location VALUES ('6170', 'Luanshya', '2', '1646', '1', null);
INSERT INTO location VALUES ('6171', 'Lusaka', '2', '1647', '1', null);
INSERT INTO location VALUES ('6172', 'Bulawayo', '2', '1648', '1', null);
INSERT INTO location VALUES ('6173', 'Harare', '2', '1649', '1', null);
INSERT INTO location VALUES ('6174', 'Chitungwiza', '2', '1649', '1', null);
INSERT INTO location VALUES ('6175', 'Mount Darwin', '2', '1649', '1', null);
INSERT INTO location VALUES ('6176', 'Mutare', '2', '1650', '1', null);
INSERT INTO location VALUES ('6177', 'Gweru', '2', '1651', '1', null);
INSERT INTO location VALUES ('6178', 'Delaware', '1', '224', '1', null);
INSERT INTO location VALUES ('6179', 'Maine', '1', '224', '1', null);
INSERT INTO location VALUES ('6180', 'North Dakota', '1', '224', '1', null);
INSERT INTO location VALUES ('6181', 'Vermont', '1', '224', '1', null);
INSERT INTO location VALUES ('6182', 'West Virginia', '1', '224', '1', null);
INSERT INTO location VALUES ('6183', 'Wyoming', '1', '224', '1', null);
INSERT INTO location VALUES ('6184', 'Arunachal Pradesh', '1', '100', '1', null);
INSERT INTO location VALUES ('6185', 'Goa', '1', '100', '1', null);
INSERT INTO location VALUES ('6186', 'Himachal Pradesh', '1', '100', '1', null);
INSERT INTO location VALUES ('6187', 'Nagaland', '1', '100', '1', null);
INSERT INTO location VALUES ('6188', 'Sikkim', '1', '100', '1', null);
INSERT INTO location VALUES ('6189', 'Telangana', '1', '100', '1', null);
INSERT INTO location VALUES ('6190', 'New Brunswick', '1', '38', '1', null);
INSERT INTO location VALUES ('6191', 'Price Edward Island', '1', '38', '1', null);
INSERT INTO location VALUES ('10000', 'Not available', '1', '0', '0', null);
INSERT INTO location VALUES ('10001', 'Not available', '0', '0', '0', 'NAA');

-- ----------------------------
-- Table structure for `meetings`
-- ----------------------------
DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `id` varchar(64) NOT NULL,
  `creator_userid` varchar(45) NOT NULL,
  `startts` datetime DEFAULT NULL,
  `endts` datetime DEFAULT NULL,
  `subject` varchar(1024) DEFAULT NULL,
  `comments` varchar(2048) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `event_id` varchar(24) DEFAULT NULL,
  `moderatorpw` varchar(25) DEFAULT NULL,
  `attendeepw` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meeting_multiplefld_idx` (`creator_userid`,`startts`,`endts`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meetings
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('1', '2018_03_29_121059_create_notifications_table', '1');

-- ----------------------------
-- Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(10) unsigned NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO notifications VALUES ('00863e6e-a2d7-4a7e-bf58-44e77716a5f0', 'App\\Notifications\\UserNotifications', '0', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-04-10 09:45:25', '2018-04-10 09:45:25');
INSERT INTO notifications VALUES ('0703042d-6c2b-425e-88fc-b6189e9a2855', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-03-29 13:47:52', '2018-03-29 13:47:52');
INSERT INTO notifications VALUES ('09ae4d1e-5a3e-450a-90d4-7313149cac1e', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 08:36:52', '2018-06-11 08:36:52');
INSERT INTO notifications VALUES ('0be6cdde-19b7-4302-9427-feb60846d102', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-14 06:01:03', '2018-06-14 06:01:03');
INSERT INTO notifications VALUES ('1bf3b680-0b99-479d-889a-fd8521952777', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 08:47:41', '2018-06-11 08:47:41');
INSERT INTO notifications VALUES ('44611af4-02d2-4066-bd95-b43f8e42be6c', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 08:40:26', '2018-06-11 08:40:26');
INSERT INTO notifications VALUES ('6039aa2a-b18f-43cd-9ce8-6eec5feca65d', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 11:19:14', '2018-06-11 11:19:14');
INSERT INTO notifications VALUES ('7a2646ca-43a0-4140-892d-4b916b1fba0d', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-04-10 09:43:36', '2018-04-10 09:43:36');
INSERT INTO notifications VALUES ('85b9bd11-f5f3-43b2-96b3-4cf4a70543b4', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-12 11:15:46', '2018-06-12 11:15:46');
INSERT INTO notifications VALUES ('885caafa-fb59-41f0-b047-24f11492ec31', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-14 08:27:53', '2018-06-14 08:27:53');
INSERT INTO notifications VALUES ('8e8a30d8-f4e1-4b3b-bd7e-2fc777690385', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-12 10:01:59', '2018-06-12 10:01:59');
INSERT INTO notifications VALUES ('8f26c412-5615-4771-afb2-0052db7c3ab8', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-03-29 13:52:41', '2018-03-29 13:52:41');
INSERT INTO notifications VALUES ('a4005644-0dc7-4c20-9ed7-5ec374e476f4', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-03-29 13:54:04', '2018-03-29 13:54:04');
INSERT INTO notifications VALUES ('a5f885cc-e058-462d-8c83-141865020ad9', 'App\\Notifications\\UserNotifications', '18446744073709551615', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-04-12 11:55:40', '2018-04-12 11:55:40');
INSERT INTO notifications VALUES ('b4dfabdf-d202-4ea2-9f36-9b0e465bf952', 'App\\Notifications\\UserNotifications', '18446744073709551615', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-04-10 09:49:03', '2018-04-10 09:49:03');
INSERT INTO notifications VALUES ('ca5545a4-3397-46df-8dd8-7f14bd196448', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-03-29 13:42:26', '2018-03-29 13:42:26');
INSERT INTO notifications VALUES ('e3fb5206-b549-4ab7-9a3f-d8f621678121', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 07:25:31', '2018-06-11 07:25:31');
INSERT INTO notifications VALUES ('e6b600c6-feed-4ec3-9e49-38cfe58fa812', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-13 11:29:28', '2018-06-13 11:29:28');
INSERT INTO notifications VALUES ('f591e722-bc8c-4f20-9de8-b6d4cc4e067e', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A is logged just in.\",\"action\":\"take an action\"}', null, '2018-03-29 13:05:23', '2018-03-29 13:05:23');
INSERT INTO notifications VALUES ('f595f9c2-6dc9-4812-a94b-021297b274f2', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-03-29 13:25:55', '2018-03-29 13:25:55');
INSERT INTO notifications VALUES ('f5b9d95e-f7bf-4f8d-989f-57744d255561', 'App\\Notifications\\UserNotifications', '25', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-06-11 07:29:56', '2018-06-11 07:29:56');
INSERT INTO notifications VALUES ('f8d5563d-cac8-4416-ad23-aede03d1fdb2', 'App\\Notifications\\UserNotifications', '50000000000', 'App\\User', '{\"message\":\"A try to pass data from controller.\",\"action\":\"no need for action\"}', null, '2018-04-10 09:45:09', '2018-04-10 09:45:09');

-- ----------------------------
-- Table structure for `participants`
-- ----------------------------
DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `id` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `meetingid` varchar(64) DEFAULT NULL,
  `logints` datetime DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `logoutts` datetime DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `loginas` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pariticipants_multiplfld_idx` (`userid`,`meetingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participants
-- ----------------------------

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `preferred_language`
-- ----------------------------
DROP TABLE IF EXISTS `preferred_language`;
CREATE TABLE `preferred_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `createdts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of preferred_language
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT NULL,
  `role_desc` text,
  `role_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('1', 'Employer', 'Employer', '1');
INSERT INTO roles VALUES ('2', 'Job_Seeker', 'Job_Seeker', '1');

-- ----------------------------
-- Table structure for `sectors`
-- ----------------------------
DROP TABLE IF EXISTS `sectors`;
CREATE TABLE `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `createdts` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101404 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sectors
-- ----------------------------
INSERT INTO sectors VALUES ('100', 'Notavailable', 'Not Available', '2015-06-12 16:46:00');
INSERT INTO sectors VALUES ('101', 'Notavailable', 'Not Available', '2015-06-12 16:46:00');
INSERT INTO sectors VALUES ('100001', 'Registration', 'Registration', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100002', 'Market Place', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100003', 'Services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100004', 'Employment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100021', 'Packaging', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100022', 'Food', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100023', 'Beverages', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100024', 'Services', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100025', 'Hospitality Equipments & Supplies', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100026', 'Speciality Products', 'identity sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100027', 'Bottled', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100028', 'Canned', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100029', 'Chilled', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100030', 'Dried', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100031', 'Fresh', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100032', 'Frozen', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100033', 'Liquid', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100034', 'Live', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100035', 'Smoked', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100036', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100037', 'Bakery / Cakes / Desserts', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100038', 'Condiments / Sauces', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100039', 'Confectionery', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100040', 'Diary', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100041', 'Fruits', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100042', 'Grains / Cereals / Flours', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100043', 'Meat / Poultry', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100044', 'Seafood', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100045', 'Snacks', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100046', 'Vegetables', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100047', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100048', 'Chicory', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100049', 'Coffee', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100050', 'Coffee - Speciality', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100051', 'Coffee Substitutes', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100052', 'Cordials / Squash', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100053', 'Energy Drinks', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100054', 'Herbal Infusions', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100055', 'Hot Chocolate', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100056', 'Instant Drink Powder', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100057', 'Juices', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100058', 'Malt Beverage', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100059', 'Milk / Diary Drinks', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100060', 'Mineral / Spring Water', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100061', 'Soft Drinks / Carbonated Beverage', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100062', 'Tea', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100063', 'Tea - Speciality', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100064', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100065', 'Certification Bodies', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100066', 'Computer / Hardware Systems', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100067', 'Consultant', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100068', 'Financial Services', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100069', 'Interior Designers', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100070', 'Laboratory', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100071', 'Legal Services', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100072', 'Logistics / Shipping', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100073', 'Marketing / Business Services', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100074', 'Media / Trade Press', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100075', 'Pest Control', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100076', 'Trade Associations / Organisations', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100077', 'Training / Education Institutions', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100078', 'Warehousing / Storing', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100079', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100080', 'Restaurant / Cafe', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100081', 'Bedroom / Bathroom', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100082', 'Cleaning / Maintenance', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100083', 'Kitchen Equipment / Supplies', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100084', 'Staff Uniforms / Supplies', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100085', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100086', 'Artisan Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100087', 'Childrens Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100088', 'Ethnic Food', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100089', 'Fair Trade', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100090', 'Gift Packs / Hampers', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100091', 'Gourmet & Fine Food', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100092', 'Halal Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100093', 'Health / Wellness Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100094', 'Organic Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100095', 'Private Label', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100096', 'Ready Meals', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100097', 'Special Diet Products', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100098', 'Others', 'identity sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100099', 'Baby Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100100', 'Bakery Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100101', 'Beans & Grains', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100102', 'Beverages & Drinks', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100103', 'Bulk Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100104', 'Candy & Confectionary', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100105', 'Canned Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100106', 'Cigarette & Tobacco', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100107', 'Dried Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100108', 'Food Supplies', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100109', 'Fresh Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100110', 'Frozen Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100111', 'Fungus & Truffles', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100112', 'Health Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100113', 'Ingredients & Additives', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100114', 'Instant Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100115', 'International Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100116', 'Meat & Poultry', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100117', 'Milk & Diary', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100118', 'Noodles & Pasta', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100119', 'Nuts & Kernels', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100120', 'Oil & edible fats', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100121', 'Organic Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100122', 'Pet Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100123', 'Processed Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100124', 'Salted Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100125', 'Seafoods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100126', 'Seeds & Plants', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100127', 'Snack Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100128', 'Speciality Foods', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100129', 'Spices & Seasonings', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100130', 'Vegetables & Fruits', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100131', 'Vitamins & Minerals', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100132', 'Baby Milk', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100133', 'Baby Dairy', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100134', 'Baby Snack', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100135', 'Baby Gourmet', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100136', 'Other Baby Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100137', 'Biscuits & Cookies', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100138', 'Flour', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100139', 'Starch & Flour', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100140', 'Baked Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100141', 'Breads', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100142', 'Cakes', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100143', 'Other Bakery Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100144', 'Pizza', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100145', 'Tortilla', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100146', 'Ice Cream Cone', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100147', 'Breadcrumbs', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100148', 'Flavor Enhancer', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100149', 'Yeast', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100150', 'Cocoa Powder', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100151', 'Bakery Decoration Ingredient', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100152', 'Pastry Mix', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100153', 'Fondant', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100154', 'Corn', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100155', 'Barley', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100156', 'Buckwheat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100157', 'Cereal Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100158', 'Coarse Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100159', 'Rice', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100160', 'Millet', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100161', 'Oats', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100162', 'Sorghum', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100163', 'Soybean', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100164', 'Couscous', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100165', 'Tofu', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100166', 'Wheat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100167', 'Amaranth', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100168', 'Besan', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100169', 'Broad Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100170', 'Butter Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100171', 'Other Beans & Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100172', 'Kidney Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100173', 'Chickpeas', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100174', 'Lentils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100175', 'Vigna beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100176', 'Mung Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100177', 'Black Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100178', 'Lima Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100179', 'Peas', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100180', 'Coffee Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100181', 'Cocoa Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100182', 'Vanilla Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100183', 'Cowpeas', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100184', 'Urad', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100185', 'Azuki beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100186', 'Moth Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100187', 'Quinoa', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100188', 'Rye', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100189', 'Coffee Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100190', 'Soft Drinks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100191', 'Juices & Puree', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100192', 'Alcoholic Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100193', 'Energy Drinks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100194', 'Dietetic Drinks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100195', 'Instant Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100196', 'Juices & Puree', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100197', 'Drinking Water', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100198', 'Mineral Water', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100199', 'Tea Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100200', 'Other Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100201', 'Bulk Snack', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100202', 'Bulk Candy', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100203', 'Bulk Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100204', 'Bulk Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100205', 'Bulk Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100206', 'Bulk Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100207', 'Bulk Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100208', 'Bulk Salt & Sugar', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100209', 'Bulk Chocolate', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100210', 'Other Bulk Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100211', 'Chocolate', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100212', 'Honey Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100213', 'Candies', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100214', 'Gum', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100215', 'Jello', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100216', 'Licorices', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100217', 'Ice Cream', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100218', 'Sweets', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100219', 'Fudge', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100220', 'Baklava', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100221', 'Delights', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100222', 'Other Candy & Confectionery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100223', 'Canned Baby Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100224', 'Canned Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100225', 'Canned Eggs', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100226', 'Canned Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100227', 'Canned Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100228', 'Canned Mushrooms', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100229', 'Canned Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100230', 'Canned Spices', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100231', 'Canned Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100232', 'Canned Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100233', 'Other Canned Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100234', 'Canned Dairy', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100235', 'Canned Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100236', 'Canned Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100237', 'Canned Kernels', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100238', 'Tobacco', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100239', 'Cigarettes', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100240', 'Cigars', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100241', 'Hookah', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100242', 'Other Tobacco Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100243', 'Dried Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100244', 'Dried Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100245', 'Dried Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100246', 'Dried Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100247', 'Dried Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100248', 'Dried Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100249', 'Dried Mushrooms', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100250', 'Dried Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100251', 'Other Dried Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100252', 'Cooking Supplies', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100253', 'Food Machinery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100254', 'Food Packaging', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100255', 'Beverage Machinery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100256', 'Food Accessories', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100257', 'Kitchenware', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100258', 'Packaging Machine', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100259', 'Production Line', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100260', 'Machinery Parts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100261', 'Other Food Supplies', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100262', 'Fresh Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100263', 'Fresh Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100264', 'Fresh Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100265', 'Fresh Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100266', 'Fresh Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100267', 'Fresh Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100268', 'Fresh Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100269', 'Fresh Confectionery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100270', 'Fresh Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100271', 'Other Fresh Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100272', 'Frozen Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100273', 'Frozen Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100274', 'Frozen Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100275', 'Frozen Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100276', 'Frozen Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100277', 'Frozen Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100278', 'Frozen Pet foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100279', 'Other Frozen Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100280', 'Frozen Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100281', 'Frozen Confectionery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100282', 'Brined Mushrooms', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100283', 'White Mushrooms', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100284', 'Portabella', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100285', 'Morels', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100286', 'Chanterelle', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100287', 'Shiitake', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100288', 'Oyster', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100289', 'Other Fungus & Truffles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100290', 'Burgundy Truffles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100291', 'Black Truffles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100292', 'White Truffles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100293', 'Pleurotus', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100294', 'Tremella', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100295', 'Flower Mushroom', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100296', 'Nameko', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100297', 'Matsutake', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100298', 'Agaricus Blazei', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100299', 'Golden Needle', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100300', 'Boletus', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100301', 'Morchella', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100302', 'Straw Mushroom', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100303', 'Pine Mushroom', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100304', 'Health Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100305', 'Health Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100306', 'Baby Health Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100307', 'Functional Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100308', 'Dietetic Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100309', 'Healing Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100310', 'Diabetes Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100311', 'Health Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100312', 'Other Health Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100313', 'Sugar & Sweeteners', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100314', 'Food Additives', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100315', 'Bakery Ingredients', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100316', 'Acidifiers', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100317', 'Antioxidants', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100318', 'Stabilizers', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100319', 'Colors', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100320', 'Cultures', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100321', 'Emulsifiers', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100322', 'Vitamins & Minerals', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100323', 'Flavorings', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100324', 'Glial', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100325', 'Creamer', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100326', 'Pastry Mixes', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100327', 'Cocoa Ingredients', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100328', 'Dietary Fibers', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100329', 'Functional Ingredients', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100330', 'Other Ingredients', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100331', 'Fast Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100332', 'Instant Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100333', 'Instant Noodles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100334', 'Instant Porridge', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100335', 'Instant Rice & Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100336', 'Instant Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100337', 'Other Instant Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100338', 'Instant Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100339', 'Mexican Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100340', 'Asian Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100341', 'American Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100342', 'African Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100343', 'European Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100344', 'Native Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100345', 'Native Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100346', 'Other Int. Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100347', 'Beef', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100348', 'Chicken Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100349', 'Sausage', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100350', 'Beef Jerky', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100351', 'Ham', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100352', 'Luncheon Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100353', 'Halal Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100354', 'Poultry Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100355', 'Seasoned Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100356', 'Smoked Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100357', 'Other Meat & Poultry', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100358', 'Sheep Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100359', 'Meat Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100360', 'Meat Dishes', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100361', 'Goat Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100362', 'Rabbit Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100363', 'Camel Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100364', 'Venison', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100365', 'Milk', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100366', 'Cheese', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100367', 'Milk Powder', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100368', 'Fat Free Milk', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100369', 'Soybean Milk', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100370', 'Yogurt', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100371', 'Other Milk & Dairy', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100372', 'Asian Noodles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100373', 'Pasta', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100374', 'Noodles', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100375', 'Chestnut Pasta', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100376', 'Dumpling', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100377', 'Other Noodles & Pastas', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100378', 'Almonds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100379', 'Hazelnuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100380', 'Apricots', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100381', 'Betel Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100382', 'Brazil Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100383', 'Fruit Kernels', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100384', 'Plant Kernels', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100385', 'Other Nuts & Kernels', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100386', 'Oils & Extracts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100387', 'Animal Fats', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100388', 'Butter', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100389', 'Essential Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100390', 'Seasoning Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100391', 'Shortening', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100392', 'Olive Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100393', 'Corn Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100394', 'Sunflower Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100395', 'Truffle Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100396', 'Vegetable Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100397', 'Other Fats & Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100398', 'Palm Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100399', 'Peanut Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100400', 'Coconut Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100401', 'Soybean Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100402', 'Castor Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100403', 'Rapeseed Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100404', 'Sesame Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100405', 'Camellia Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100406', 'Blend Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100407', 'Fish Oil', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100408', 'Organic Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100409', 'Organic Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100410', 'Organic Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100411', 'Organic Candies', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100412', 'Organic Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100413', 'Organic Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100414', 'Organic Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100415', 'Organic baby Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100416', 'Organic Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100417', 'Other Organic Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100418', 'Dogs Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100419', 'Cats Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100420', 'Fish Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100421', 'Birds Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100422', 'Reptiles Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100423', 'Horses Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100424', 'Other Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100425', 'Precooked Gourmet', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100426', 'Processed Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100427', 'Processed Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100428', 'Processed Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100429', 'Processed Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100430', 'Processed Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100431', 'Processed Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100432', 'Processed Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100433', 'Other Processed Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100434', 'Salted Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100435', 'Salted Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100436', 'Salted Meat', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100437', 'Salted Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100438', 'Salted Seafood', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100439', 'Salted Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100440', 'Salted Grains', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100441', 'Salted Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100442', 'Salted Pet Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100443', 'Other Salted Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100444', 'Shrimp', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100445', 'Alive Seafoods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100446', 'Clam', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100447', 'Squid', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100448', 'Scallop', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100449', 'Crab', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100450', 'Caviar', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100451', 'Other Sea Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100452', 'Fish', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100453', 'Sea Cucumber', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100454', 'Shellfish', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100455', 'Seaweed', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100456', 'Lobster', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100457', 'Roe', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100458', 'Surimi', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100459', 'Cuttlefish', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100460', 'Octopus', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100461', 'Sea Urchin', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100462', 'Crustacean', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100463', 'Mollusk', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100464', 'Echinoderm', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100465', 'Vegetable Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100466', 'Fruit Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100467', 'Wheat Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100468', 'Sunflower Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100469', 'Hybrid Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100470', 'Mustard Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100471', 'Grain Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100472', 'Bean Seeds', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100473', 'Tree Plants', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100474', 'Food Plants', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100475', 'Other Seeds & Plants', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100476', 'Baby Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100477', 'Bakery Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100478', 'Bean Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100479', 'Cereal Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100480', 'Dairy Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100481', 'Fruit Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100482', 'Meat Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100483', 'Vegetable Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100484', 'Other Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100485', 'Kernel Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100486', 'Nut Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100487', 'Seafood Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100488', 'Grain Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100489', 'Egg Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100490', 'Puffed Food', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100491', 'Sugar-Free Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100492', 'Mixed Snacks', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100493', 'Tropical Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100494', 'Tropical Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100495', 'Tropical Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100496', 'Tropical Nuts', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100497', 'Tropical Beans', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100498', 'Tropical Beverages', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100499', 'Specialty Confectionery', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100500', 'Other Specialty Foods', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100501', 'Sauce & Jam', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100502', 'Puree', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100503', 'Seafood Condiment', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100504', 'Spices & Herbs', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100505', 'Vinegar', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100506', 'Blended Condiments', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100507', 'Raw Spices', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100508', 'Seasonings', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100509', 'Seasoning Oils', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100510', 'Spicy Paste', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100511', 'Other Spices & Seasonings', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100512', 'Sugar', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100513', 'Salt', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100514', 'Fruit Jams', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100515', 'Native Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100516', 'Preserved Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100517', 'Other Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100518', 'Dehydrated Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100519', 'Dehydrated Fruits', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100520', 'Preserved Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100521', 'Native Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100522', 'Spicy Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100523', 'Other Vegetables', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100524', 'Supplements', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100525', 'Vitamins', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100526', 'Minerals', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100527', 'Proteins', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100528', 'Herbs', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100529', 'Diet Products', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100530', 'Energy', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100531', 'Nutritions', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100532', 'Sexual Health', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100533', 'Pets Health', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100534', 'Beauty Care', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100535', 'Other Vitamins & Minerals', 'Market sub-sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100536', 'Accounting', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100537', 'Advertising', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100538', 'Appliance Testing', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100539', 'Author/Editor/Writers', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100540', 'Cost Reduction', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100541', 'Distribution/Supply Chain', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100542', 'Equipment Financing/Leasing', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100543', 'Expert Witness', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100544', 'Food Processing Manufacturing', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100545', 'Franchising', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100546', 'General Management', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100547', 'Golf Course F & B', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100548', 'Hispanic Workforce', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100549', 'Human Resources Management', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100550', 'Information Systems', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100551', 'International', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100552', 'Internet Communications', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100553', 'Kitchen/Residential Design', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100554', 'Legal Services', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100555', 'Management Development', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100556', 'Manufacturing Ops Improvement', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100557', 'Marketing', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100558', 'Marketing Research', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100559', 'Meeting and Event Planning', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100560', 'Mergers and Acquisitions', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100561', 'New Product Development', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100562', 'Nutrition Science', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100563', 'On Site Food Service', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100564', 'Organizational Development', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100565', 'Packaging', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100566', 'Personal Chef Service', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100567', 'Photography', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100568', 'Private Equity', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100569', 'Public Relations', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100570', 'Quality Management Systems', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100571', 'Restaurant Development', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100572', 'Restaurant Facilities Design/Dev.', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100573', 'Restaurant Operations', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100574', 'Retail Packaged Goods', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100575', 'Sales', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100576', 'Spokesperson', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100577', 'Strategic Planning', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100578', 'Training', 'Services Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100579', 'Others', 'Registration Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100580', 'Others', 'Registration Sub-Sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100583', 'Acrylic', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100584', 'Apparels', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100585', 'Base Gravy', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100586', 'Cab Service', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100587', 'Canned products - Food', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100588', 'Canned products - Food', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100589', 'charcoal', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100590', 'CHEMICALS', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100591', 'Chocolates', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100592', 'Cleaning Chemicals', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100593', 'Cleaning Equipments', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100594', 'Cleaning powders', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100595', 'Coat Stand', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100596', 'Cocoa & Cocoa products', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100597', 'Cones for icecream manufacturing', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100598', 'Crockery Bone China / Stoneware', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100599', 'Cutlery', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100600', 'Dips', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100601', 'Dishwashing chemicals', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100602', 'Dressing and toppings', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100603', 'Entertinment', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100604', 'f', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100605', 'floor Mats', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100606', 'Food products', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100607', 'Fruit and fruit chunks for bakery and ice cream industry', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100608', 'Fruit Crushes', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100609', 'Fruit Spreads', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100610', 'Fruits', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100611', 'Furnitures', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100612', 'Glass', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100613', 'Gypsum/Gyp Board', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100614', 'Handwash', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100615', 'Holloware', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100616', 'House keeping', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100617', 'Indian Chutney', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100618', 'Interior', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100619', 'Juices', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100620', 'Ketchup and Sauces', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100621', 'Leather', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100622', 'MATTING', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100623', 'Microfibre Cloth', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100624', 'Milk', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100625', 'Milk and dark dip for icecream industry', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100626', 'Mops and buckets for cleaning', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100627', 'Office Stationery', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100628', 'Olive oil', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100629', 'Pasta', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100630', 'Premix', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100631', 'Priner Cartridge', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100632', 'Sauces', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100633', 'Scrub pad', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100634', 'Soft Luggage', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100635', 'Sponge wipes', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100636', 'Spreads', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100637', 'SS Works', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100638', 'Syrups', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100639', 'Syrups for beverages', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100640', 'Wall paper', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100641', 'Wooden flooring', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100642', 'Cashewnut /cashew 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100643', 'Cast iron utensils/Holding cabinets/buffetware/glass buffet ware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100644', 'Category	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100645', 'Catering equipments	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100646', 'Catpets/Rugs/Hotel carpets	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100647', 'CEILING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100648', 'CFT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100649', 'CFT / SFT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100650', 'Chafing dish/hollowware/tableware/kitchenware/room amenities/geust room supplies/glassware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100651', 'Chafing dish/melamine/acrylic/buffetware/tabelware/tabletop/bar accessories/kitchenware/cookware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100652', 'Chair	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100653', 'charcoal	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100654', 'Chef Uniform	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100655', 'CHEMICALS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100656', 'Chocolates	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100657', 'Civil Maintainance	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100658', 'CIVIL WORKS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100659', 'Civil Works/Mason Works/Civil contractor	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100660', 'Cleaning Chemicals	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100661', 'Cleaning Chemicals/Stewarding chemcials/Housekeeping chemicals/laundry chemicals/Food Garde cleaning chemcials/Floor Cleaning chemial/Hotel cleaning solutions	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100662', 'Cleaning Equipments	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100663', 'Cleaning powders	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100664', 'Clearing forwarding/Customs clearing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100665', 'Coat Stand	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100666', 'Coat stands	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100667', 'Cocktail Table	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100668', 'Cocoa & Cocoa products	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100669', 'Completed Interior Solutions	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100670', 'Comprehensive Facility Management Services	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100671', 'Comprehensive Facility Management Services/natural stone restoration care & maintenance/ wood floor polishing/ carpet laying and stain removals/ carpet care and maintenance/housekeeping cleaning	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100672', 'computer cartridge refilling	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100673', 'Cones for icecream manufacturing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100674', 'Cot	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100675', 'Crockery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100676', 'Crockery Bone China / Stoneware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100677', '\"Crockery Bone China / Stoneware		\"	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100678', 'Crockery/cutlery/glassware/kitchenware/crockery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100679', 'Crockery/Kids Crockeryporcelain/Bone china	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100680', 'crystal glassware/Glassware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100681', 'Cutlery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100682', 'DATA AND NETWORKING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100683', 'Dealers of Bed Linen/Pillow/Mattress Protector/Cushions/Duvets/	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100684', 'Designers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100685', 'Dips	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100686', 'Dishwashing chemicals	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100687', 'Display Stand	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100688', 'Disposable spa products/Disposable sheets/Disposable spa accessories/Disposable spa undergarments	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100689', 'Disposbale Bags/Non Woven Disposable Bags/Disposable Tray Mats/Throw Away Bags /Eco Frienldy dispsoable bags	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100690', 'DOLPHIN RFID Locks	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100691', 'DOLPHIN RFID SOLUTION	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100692', 'Domestic Ladder/Industrial Ladder/Heavy Duty Latter/Engineering Ladder	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100693', 'Dressing and toppings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100694', 'Dry Fruits	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100695', 'Dryfruits	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100696', 'Ear Protection Equipment	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100697', 'Eco Friendly Plate/Tray/Bowl/Box/Takeaway packaging	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100698', 'Electrical contractor	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100699', 'Electrical Panels	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100700', 'Electrical Safety Item	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100701', 'Electrical supplies	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100702', 'Electrical Switches	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100703', 'Emergency Light	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100704', 'Entertinment	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100705', 'Exotic Vegetables	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100706', 'f	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100707', 'F&B items/Barware/Resturant items/F&B Operational items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100708', 'F&B items/resturant items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100709', 'Filled Items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100710', 'Filter Coffee Decoction	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100711', 'Fire Extinguisher	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100712', 'Fire Protection System	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100713', 'Floor carpet/office carpet	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100714', 'floor Mats	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100715', 'FLOORING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100716', 'Floorings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100717', 'food and beverage	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100718', 'Food concepts/Buffet ware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100719', 'Food products	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100720', 'FOOD SERVICE 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100721', 'Food Trolley/thermoport/Hot buffet trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100722', 'Fresh Cream/milk products/fresh cream/butter/khova	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100723', 'Front Office Trolley/Guest Trolley/ Bell Man Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100724', 'Front Office/ Kitchen/ Back Office Uniforms	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100725', 'Frosted Films	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100726', 'Fruit and fruit chunks for bakery and ice cream industry	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100727', 'Fruit Crushes	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100728', 'Fruit Spreads	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100729', 'Fruits	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100730', 'Fruits/Vegetables/Jams/Jellies/Marmalade/Squashes/Canned Juices/Bottled/Tinned Beverages	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100731', 'Furnishings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100732', 'Furnitures	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100733', 'garbage bags/Disposable items/stewarding items/houskeeping cleaning supplies/parcel boxes/take away boxes/packing items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100734', 'Gas Detector	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100735', 'General Safety Item	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100736', 'Gifts/Decorative Items/Paintings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100737', 'Glass	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100738', 'Glass Doors/Glass Partitions/Glass Canopy/Door partitions/Shower cubicles/Glass /Glass Glazing/Stainless Steel Railings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100739', 'Glass Doors/Glass Partitions/Glass Canopy/Door partitions/Shower cubicles/Glass cleaning/Glass Cleaning maintenance/Glass Refit 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100740', 'Glass Table	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100741', 'Glassware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100742', 'Glassware imported	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100743', 'Green Peas	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100744', 'GUEST ROOMS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100745', 'GUEST ROOMS/ TERRACE / OPEN AREA OF HOTEL/ VESTIBULE AREA	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100746', 'Gym/Health Club/Fitness Equipments	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100747', 'Gypsum/Gyp Board	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100748', 'Hand Protection Gloves	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100749', 'Handwash	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100750', 'Hanger Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100751', 'hanger/wooden hanger	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100752', 'Hangers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100753', 'HARDWARE	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100754', 'Hardware 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100755', 'HARDWARE/PAINT/PLUMBING/TOOLS/INDUSTRIAL HARDWARE/ADHESIVES	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100756', 'Harness Belt	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100757', 'Heavy duty juicers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100758', 'Herbs and spices	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100759', 'Holloware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100760', 'hone	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100761', 'Horticulture/Garden Maintenance/Landscaping	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100762', 'Hotel Bath Linen	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100763', 'Hotel Bed Linen	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100764', 'hotel colletrals/hotel printing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100765', 'Hotel Comforters	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100766', 'Hotel F & B Linen	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100767', 'Hotel Industry	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100768', 'hotel printing/hotel colletrals	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100769', 'Hotel Upholstrey Fabric/Furniture upholstrey/Bed Linen/Hotel Linen/Designer fabric/Designer Upholstrey/Banquet linen/Customised linen/customised fabric	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100770', 'Hotel wares/Buffetware/Kitchen equipments/Kitchen utensils/Imported kitchen equipments/imported bufftet wre/imported utensils/Room Equipments/Food Service eqipments/Barware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100771', 'House Boat Booking	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100772', 'House keeping	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100773', 'Housekeeping Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100774', 'Housekeeping/Guest Laundry Bags/Shoe Bags/Aprons	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100775', 'Houskeeping Toiletries/Houskeeping aminities/Bath Aminities/Non Woven Products/Non Woven Spa Product/Non woven Bags/Cloth Bags	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100776', 'Ice Cream/Premium ice cream	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100777', 'Imported	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100778', 'Imported crockery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100779', 'Imported cutlery/crockery/stoneware/cast iron buffet ware/barware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100780', 'Imported cutlery/sola cutlery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100781', 'Imported cutlery/sola cutlery/titanium finish	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100782', 'Imported food	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100783', 'Imported food/Imported Provisions/Imported bottled items/Imported canned items/Dryfruits/Dry herbs/Imported cheeses/Imported chocolates/seasoning powder/aromatic powder/imported juices	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100784', 'Imported food/Imported Provisions/Imported bottled/Imported canned/Dryfruits/Dry herbs/Imported cheeses/Imported chocolates/seasoning powder/aromatic powder/	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100785', 'Imported food/Imported Provisions/Imported bottled/Imported canned/Dryfruits/Dry herbs/Imported cheeses/Imported chocolates/seasoning powder/aromatic powder/imported juices	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100786', 'Imported fruits/Imported Vegetables/Berries - Fresh/Exotice fresh fruits/Fresh Berries/Imported freshmushrooms/Dried fruits	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100787', 'Imported Glassware/Crystal Glass/Crystal glassware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100788', 'imported kitchen accessories /imported pastry items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100789', 'Imported meat/imported pork/imported lamb/imported cold cuts/Meat Imported/scallops/imported sea foods	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100790', 'Indian Chutney	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100791', 'Industrial Belts	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100792', 'Interior	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100793', 'Interiors	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100794', 'Invertors	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100795', 'Iron Box/ Ironing Boards	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100796', 'Juice Dispensers/Cereals dispensers/Buffet display	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100797', 'Juices	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100798', 'Ketchup and Sauces	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100799', 'Khova	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100800', 'kitchen 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100801', 'Kitchen equipment servicing/Kitchen equipment maintenance /Kitchen equipment AMC	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100802', 'Kitchen equipments/kitchen equipment fabrications/Kitchen exhaust/kitchen hoods/cooking equipments/Housekeeping equipments/food service equipments/refrigeration systems/dishwashers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100803', 'Kitchen equipments/SS Fabricated/Statinless Fabrications/Customised Kitchen equipments Fabrications/Kitchen equipment Manfacturer	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100804', 'Kitchen Hood Fabrication/Kitchen Hood Servicing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100805', 'Kitchen tandoor	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100806', 'Kitchen Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100807', 'kitchen utensils	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100808', 'kitchen utensils/kitchen equipments/pastry utensils/imported kitchen utensils/local kitchen utensils	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100809', 'Kitchen utensils/Pastry items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100810', 'kitchen utensils/pastry utensils/cleaning tools/hotel utensils/house keeping tools/cleaning chemicals/stewarding items/imported kitchen equipment/bar accessories/restaurant/kitchen hoods/ss fabricatio	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100811', 'Laundry Trolleys/Laundry Tables/Housekeeping trolleys/Housekeeping tables/SS Fabrications	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100812', 'Leather	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100813', 'LEATHER /LEATHERITE/CUSTOMISED LEATHER/ACRYLIC ITEMS/ACRYLIC RESTAURANT ITEMS/ACRYLIC ROOM ITEMS/ACRYLIC HOTEL ITEMS/ACRYLIC ITEMS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100814', 'LED Downlighter	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100815', 'Lighting/Light Fixtures/Light Fittings/LED/LED Fixtures/Lightings/Hotel Lightings/Customised lighting/Customized lighting	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100816', 'linen	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100817', 'Linen Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100818', 'Local Crockery/Crockery Made in India/Porcelain made in india	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100819', 'Lockers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100820', 'Locks & Pad Locks	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100821', 'manual doors	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100822', 'Manufacturer of Artwork/Customised/Decotrative Items/Gift Items/Sculpture	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100823', 'Manufactureres of Bath Linen/Bed Linen/Curtains/Pillow/Spa Linen/Mattress Protector/Cushions/Duvets/Furnishing /Upholstrey Fabarics	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100824', 'Manufactureres of bath Linen/Bed Linen/Pillow/spalinen/Mattress/Mattress Protector/cushions/duvets/Furnishing /Upholstrey Fabarics	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100825', 'Manufacturers of bath Linen/Bed Linen/Pillow/spalinen/Mattress/Mattress Protector/cushions/duvets/Furnishing /Upholstrey Fabarics	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100826', 'Manufacturers/Distributors of Bins/Plastic Bins/Trolley Bins/ Water Tanks	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100827', 'MATTING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100828', 'Mattress/Hotel Mattress	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100829', 'Mayonnaise	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100830', 'Medical Equipments	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100831', 'Microfibre Cloth	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100832', 'Milk	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100833', 'Milk and dark dip for icecream industry	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100834', 'Mops and buckets for cleaning	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100835', 'MTR	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100836', 'MTR / POINTS / NOS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100837', 'MTR/POINTS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100838', 'Nachos/Chips	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100839', 'Namkeens/Savouries/minibar namkeens/bar snacks/fryums	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100840', 'neet n clean job	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100841', 'NOS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100842', 'Oats	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100843', 'office furnitureRepair & Service	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100844', 'Office Stationery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100845', 'Olive oil	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100846', 'Organic Honey	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100847', 'Outdoor furnitures/planters/Canopies/Awnings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100848', 'Outffor funtirue/lounge furniture/Guest room supplies	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100849', 'Painter/Paint works	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100850', 'Paints 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100851', 'Paneer	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100852', 'PARTITION	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100853', 'Pasta	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100854', 'pastry accessories/pastry items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100855', 'pastry boxes	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100856', 'PEL 1 W LED NM RDL (CR)	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100857', 'Pencil/Stationery Items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100858', 'Personal Protective Equipment (Eye & Face)	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100859', 'Personal Protective Equipment (Head)	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100860', 'Pipes & Pipe Fittings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100861', 'Pipes & Pipe Fittings 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100862', 'Planters	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100863', 'PLUMBING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100864', 'Plumbing item supplies/Plumbing works/Plumbing contractor	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100865', 'Plumbing Material/Electrical/Electrical/hardware/hardware items/Pipes/paints/Circuit boards/Sanitary items/Meters/Tools/Engineering tools	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100866', 'Pool & Spa Towels	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100867', 'Pool Bed	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100868', 'Pool Deck	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100869', 'Pool Stand	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100870', 'Pool Umbrella	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100871', 'Porcelian crockery	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100872', 'Pots and Pans/imported kitchen utensils/Pastry moulds/glassware/crystal glass/crockery/bone china	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100873', 'Premium quality porcelain 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100874', 'Premix	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100875', 'Priner Cartridge	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100876', 'printer	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100877', 'Printer cartidge	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100878', 'Printers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100879', 'Printing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100880', 'Printing/Colletrals/Printed colletrals/Banners/Flex Printing/Banner Printing/Printing material/printing designs/Packing materials/takeaway boxes/printer	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100881', 'Printing/Colletrals/Printed colletrals/Banners/Flex Printing/Banner Printing/Printing material/printing designs/Packing materials/takeaway boxes/printer/Hotel printing/hotel colletrals	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100882', 'Printing/Colletrals/Printed colletrals/Banners/Flex Printing/Banner Printing/Printing material/printing designs/Packing materials/takeaway boxes/printerMenu Cards / Bill presentation / Amenity box /pr	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100883', 'Printing/Corporate gifts/Event organsiers	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100884', 'Protective Suit	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100885', 'Provisions/Groceries/Dry fruits/Rice/Atta Maida/oil/food items/canned products/bottled products	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100886', 'Provisions/Groceries/Dry fruits/Rice/Atta Maida/oil/food items/canned products/bottled products/spices/dhals/pulses	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100887', 'Provisions/Groceries/Vegetables/Dry fruits/Food Items/Canned & Bottled Products	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100888', 'Racks/Shelving	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100889', 'recycled paper	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100890', 'Residential/Commercial/Industrial Airconditoning	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100891', 'RFT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100892', 'Roasted Nuts/Salted Nuts/Dry Fruits/ Minibar Amenities/Assorted Beans/Assorted Nuts/Minibar Goodies/Bar Snacks/	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100893', 'Roasted Nuts/Salted Nuts/Dry Fruits/ Minibar Amenities/Assorted Beans/Assorted nuts/Minibar Goodies/BarSnacks/	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100894', 'Roasted Nuts/Salted Nuts/Dry Fruits/ Minibar Amenities/Assorted nuts/Minibar Goodies/BarSnacks	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100895', 'ROOFING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100896', 'Room Amenities	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100897', 'Room Supplies	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100898', 'ROOMS/ RESTAURANT AREA/ DISC AREA	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100899', 'S S Furnitures/Ss Fabrications	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100900', 'Safety	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100901', 'SAFETY EQUIPMENT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100902', 'salt & peper mills/Pepper mills/Imported pepper mills	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100903', 'Sanitary 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100904', 'Sauces	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100905', 'Scrub pad	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100906', 'Sea fishes/Fishes/Fish fillet/Fresh Fish/Prawns/Scampi/Seafood	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100907', 'Seafood fresh/Fresh scampi/fresh Tiger prawns/Live sea food/Fresh chilled prawns/fresh Chilled Scampi/Fresh chilles Fishes	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100908', 'service & washing	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100909', 'Services	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100910', 'SFT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100911', 'Sheer curtain/Day Curtain	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100912', 'Shelving/heated cabinets/buffet display/cold and heat cabinet/buffetware/toasters/salamanders/grills/buffetware/grills/hotelware	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100913', 'Shoes & Boots	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100914', 'signages/LED Signages/Glo signages/Glow signanges/Directional Signages/Safety Signages	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100915', 'Sink	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100916', 'Sit-outs/Gazebos	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100917', 'sliding doors	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100918', 'Slim Led Exit light	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100919', 'Sockets	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100920', 'Soft Luggage	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100921', 'Sorbents	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100922', 'Spa Equipments/Spa Designing/Spa Installtion/Spa operators/Spa consultants	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100923', 'Spices	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100924', 'Sponge wipes	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100925', 'Spreads	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100926', 'Squashes	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100927', 'SS Fabrication	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100928', 'SS Trolley/Bins/Storagebins/SS fabrications	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100929', 'SS Works	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100930', 'Stitching	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100931', 'Stone Fruit	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100932', 'Sun Cooling	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100933', 'Sun Cooling 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100934', 'SWIMMING POOL AREA	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100935', 'Syrups	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100936', 'Syrups for beverages	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100937', 'Table	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100938', 'Table Frame	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100939', 'Table lamps	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100940', 'Table Top Supplies	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100941', 'Tailor	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100942', 'test	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100943', 'Tissue Paper Products /  HOUSE KEEPING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100944', 'Tissue Paper Products / F & B	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100945', 'Tissue Paper Products / F & B / HOUSE KEEPING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100946', 'Tissues	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100947', 'TOOLS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100948', 'Torch	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100949', 'Tour Package	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100950', 'Traffic Safety Item	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100951', 'Training	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100952', 'Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100953', 'Truck Trolley	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100954', 'Umbrella	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100955', 'Umbrella Stand	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100956', 'Uniform	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100957', 'Uniform stitching	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100958', 'Uniforms	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100959', 'Uniforms Hotel 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100960', 'UPS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100961', 'Use & Throw/ Aluminum Foil Containers/Box	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100962', 'V BELTS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100963', 'Vaccum jugs 	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100964', 'Vaccum jugs/Vaccum Flasks/Hot jugs/Hot flasks	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100965', 'VALVES	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100966', 'Vegetables/Fresh Vegetables/Hotel Vegetables	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100967', 'Vegetables/Fresh Vegetables/Hotel Vegetables/vegetables fresh	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100968', 'Vescom wall coverings/j Josephson wall coverings/MDC wall coverings/Fidelity Wall coverings	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100969', 'Wall Mounted Exit Light	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100970', 'Wall Mounted Exit Light LED	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100971', 'Wall paper	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100972', 'Wall Paper/wall paper installation	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100973', 'Wall paper/Wall paper installation/imported wall paper	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100974', 'WALL TO WALL CARPETS/ RUGS	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100975', 'WALL TREATMENT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100976', 'WATER-PROOFFING	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100977', 'whole sale cashew dealer/whole sale cashew nut dealer	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100978', 'Window blinds	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100979', 'WINDOWS TREATMENT	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100980', 'Wine Cellars	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100981', 'Wood works/Carpentry	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100982', 'Wooden flooring	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100983', 'Wooden Furniture/Civil/Mason/Carpentry/Silicon/Polishing/Painting	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100984', 'Wooden kitchen utensils/wooden items/wooden resturant items	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100985', 'woodend doors	', 'Market place sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100986', 'A/V equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100987', 'AC/ Refrigeraton', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100988', 'AC/ Refrigeraton,Kitchen Equipments & Hoods', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100989', 'Accoustics contractor', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100990', 'Adhersives and tapes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100991', 'AHU / VFD', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100992', 'Ali. ladders & I.Board with iron', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100993', 'Automobiles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100994', 'Bankers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100995', 'Bar Accessories', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100996', 'Bed & Bath & Table Linen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100997', 'Bed & Bath & Table Linen,Furnishing - Curtain & Upholstry', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100998', 'Bed & Bath & Table Linen,Uniform - Ladies dress material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('100999', 'Blinds', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101000', 'Blinds,Wall Finishes - Wall Paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101001', 'Boilers & Heat Pumps', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101002', 'Carpentry - Hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101003', 'Carpentry - Hardware,CCTV & Biometrics & Electric Fence & Sec. Solutions,Locks & Safes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101004', 'Carpentry - Wood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101005', 'CCTV & Biometrics & Electric Fence & Sec. Solutions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101006', 'CCTV & Biometrics & Electric Fence & Sec. Solutions,Locks & Safes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101007', 'Cement & Concrete blocks', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101008', 'Chemicals and Minerals', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101009', 'Civil - Tools  jigs  fastners  fixtures', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101010', 'Civil Contractors,Electrical - Contractors,Fire Fighting & Security,Plumbing & Sanitary - Contractors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101011', 'Civil Contractors,Interior decorator and furniture contractor', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101012', 'Clearing & Forwarding Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101013', 'Construction', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101014', 'Construction,Consultants - Interior Designers,Landscaping', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101015', 'Consultant - SPA', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101016', 'Consultants', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101017', 'Consultants - Interior Designers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101018', 'Consultants - Interior Designers,Consultants - Market Research operations', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101019', 'Consultants - Landscape', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101020', 'Consultants - LEED', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101021', 'Consultants - MEP', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101022', 'Consultants - RTO', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101023', 'Consultants,Consultants - Landscape', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101024', 'Consultants,Family & Friends', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101025', 'Cooling Towers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101026', 'Courier Services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101027', 'Crockery Cutlery Glassware Tableware Hollowware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101028', 'Crockery Cutlery Glassware Tableware Hollowware,Kitchen & Rest. Utensils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101029', 'Crockery Cutlery Glassware Tableware Hollowware,Kitchen Equipments & Hoods', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101030', 'D.G. Sets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101031', 'Doors & Windows - UPVC', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101032', 'Doors & Windows - UPVC,Facade - Outer - Aluminium Panel Sheet,Facade - Outer - Glass', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101033', 'Drain & Gratings & Man hole covers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101034', 'Educational software - Online for schools', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101035', 'Electrical - Contractors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101036', 'Electrical - Contractors,Plumbing & Sanitary - Contractors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101037', 'Electrical - Fans', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101038', 'Electrical - Fixtures & Accessories', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101039', 'Electrical - Fixtures & Accessories,Electrical - Lighting', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101040', 'Electrical - Fixtures & Accessories,Electrical - Switch & Sockets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101041', 'Electrical - Fixtures & Accessories,Furniture', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101042', 'Electrical - Fixtures & Accessories,Furniture,Furniture - Office,Furniture - Pool & Garden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101043', 'Electrical - Lighting', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101044', 'Electrical - LT Panels', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101045', 'Electrical - Switch & Sockets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101046', 'Electrical - Switch & Sockets,Paint & Polishes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101047', 'Electrical - Switches & Controlgear', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101048', 'Electronic Goods', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101049', 'Electronic Goods,IT & Communication', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101050', 'Elevators and escalators', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101051', 'Employee', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101052', 'Energy Auditors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101053', 'Engineered foams', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101054', 'Entertainment - Magician', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101055', 'Fabricators', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101056', 'Facade - Outer - Aluminium Panel Sheet', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101057', 'Facade - Outer - Aluminium Panel Sheet,Facade - Outer - Glass', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101058', 'Facade - Outer - Aluminium Panel Sheet,Facade - Outer - Glass,Glass & Plywood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101059', 'Facade - Outer - Glass', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101060', 'Family & Friends', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101061', 'Fire Fighting & Security', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101062', 'Fitness Equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101063', 'Flooring - Carpets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101064', 'Flooring - Carpets,Flooring - Grass,Flooring - Sports,Flooring - Wooden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101065', 'Flooring - Carpets,Flooring - Grass,Flooring - Sports,Flooring - Wooden,Furniture,Furniture - Office,Furniture - Pool & Garden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101066', 'Flooring - Carpets,Flooring - Grass,Flooring - Sports,Flooring - Wooden,Upholstry - Leather Fabric,Wall Finishes - Wall Paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101067', 'Flooring - Carpets,Flooring - Sports,Furniture,Furniture - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101068', 'Flooring - Carpets,Flooring - Wooden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101069', 'Flooring - Carpets,Flooring - Wooden,Leather', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101070', 'Flooring - Carpets,Furnishing - Curtain & Upholstry', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101071', 'Flooring - Carpets,Upholstry - Leather Fabric', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101072', 'Flooring - Stone & Tiles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101073', 'Flooring - Stone & Tiles,Flooring - Wooden,Furnishing - Curtain & Upholstry,Furnishing - Silk,Furniture,Furniture - Office,Furniture - Pool & Garden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101074', 'Flooring - Wooden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101075', 'Flooring - Wooden,Furnishing - Curtain & Upholstry,Wall Finishes - Wall Paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101076', 'Flooring - Wooden,Furniture', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101077', 'Flooring - Wooden,Furniture - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101078', 'Flooring - Wooden,Furniture,Furniture - Office,Wall Finishes - Wall Paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101079', 'Flooring - Wooden,Glass & Plywood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101080', 'Food & Beverage - Bakery Products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101081', 'Food & Beverage - Bakery Products,Food & Beverage - Beverages,Food & Beverage - Cold Chain,Food & Beverage - Dairy products,Food & Beverage - Provisions,Food & Beverage - Raw Material,Food & Beverage - Spices', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101082', 'Food & Beverage - Beverages', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101083', 'Food & Beverage - Beverages,Hygiene Products - Cleaning Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101084', 'Food & Beverage - Cold Chain', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101085', 'Food & Beverage - Cold Chain,Hotels & Service apartments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101086', 'Food & Beverage - Dairy products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101087', 'Food & Beverage - Provisions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101088', 'Food & Beverage - Raw Material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101089', 'Food & Beverage - Spices', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101090', 'Furnishing - Curtain & Upholstry', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101091', 'Furnishing - Curtain & Upholstry,Furnishing - Silk', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101092', 'Furnishing - Silk', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101093', 'Furniture', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101094', 'Furniture - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101095', 'Furniture - Pool & Garden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101096', 'Furniture,Furniture - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101097', 'Furniture,Furniture - Office,Furniture - Pool & Garden', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101098', 'Furniture,Furniture - Office,Kitchen & Rest. Utensils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101099', 'Furniture,Modular Kitchens', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101100', 'GFRC - Building insulation material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101101', 'Gift items', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101102', 'Glass & Plywood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101103', 'Hotels & Service apartments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101104', 'HR Consultants', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101105', 'Hygiene Products - Cleaning Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101106', 'Hygiene Products - Tissues', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101107', 'I - HOme', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101108', 'IN flight items', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101109', 'Insurance', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101110', 'Interior decorator AND furniture contractor', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101111', 'IT & Communication', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101112', 'IT & Communication,Network solutions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101113', 'KEY makers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101114', 'Kitchen & Rest. Utensils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101115', 'Kitchen & Rest. Utensils,Kitchen Equipments & Hoods', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101116', 'Kitchen Equipments & Hoods', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101117', 'Kitchen Equipments & Hoods,Laundry Machinary', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101118', 'Laundry Machinary', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101119', 'Laundry packaging material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101120', 'LOCKS & Safes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101121', 'LOCKS & Safes,Mattresses AND Pillows', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101122', 'LPG Gas pipeline', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101123', 'Mattresses AND Pillows', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101124', 'Mobile', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101125', 'Modular Kitchens', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101126', 'Movers & Packers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101127', 'Network solutions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101128', 'Network solutions,Networking AND fibre optics AND cctv', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101129', 'Office Automation - LCD Projectors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101130', 'Office Automation - LCD Projectors,Office Automation - Photo copier & Fax machine', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101131', 'Office Automation - Photo copier & Fax machine', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101132', 'Others', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101133', 'Packaging Material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101134', 'Paint & Polishes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101135', 'Pergola', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101136', 'Photo frames', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101137', 'Pipe line systems - Copper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101138', 'Pipe line systems - Copper,Pipe line systems - insulated,Plumbing - Sanitary ware & Fixtures,Plumbing & Sanitary - Contractors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101139', 'Pipe line systems - insulated', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101140', 'Plastics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101141', 'Plumbing - Sanitary ware & Fixtures', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101142', 'Plumbing & Sanitary - Contractors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101143', 'Pool AND SPA Equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101144', 'Porta Cabins', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101145', 'Pumps', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101146', 'Rain water harvesting AND water purification', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101147', 'REAL Estate Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101148', 'Red Category', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101149', 'roof protection AND water treatment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101150', 'Scrap Dealers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101151', 'Screw Chillers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101152', 'SECURITY services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101153', 'Signages', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101154', 'Software', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101155', 'Solar Energy systems', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101156', 'Stationary - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101157', 'Stationary - Printing', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101158', 'Steel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101159', 'STP & WTP', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101160', 'Surveyors AND valuers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101161', 'Tandoor - Mobile', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101162', 'Transformers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101163', 'Travel Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101164', 'Uniform - Ladies dress material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101165', 'Uniforms', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101166', 'Upholsterer', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101167', 'Upholstry - Leather Fabric', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101168', 'Wall Finishes - Wall Paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101169', 'Water AND Sewrage Treatment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101170', 'Weighing Scales', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101171', 'Wine shop', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101172', 'AC & Refrigeration', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101173', 'AC & Refrigeration,Contractors - HVAC & Refrigeration,Screw Chillers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101174', 'Asset Management System - Bar coding', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101175', 'Bed & Bath & Rest Linen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101176', 'Blinds,Contractors - Accoustics,Flooring - Wooden,Wall Finishes - Wall paper', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101177', 'Business Partners - Hilton', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101178', 'Business Partners - Marriott', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101179', 'Clearing & Forwarding & CHA House', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101180', 'Construction Material - Bricks & Tiles & Jallis', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101181', 'Construction Material - Cement', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101182', 'Construction Material - Cement,Construction Material - Ready Mix Concrete', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101183', 'Construction Material - Ready Mix Concrete', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101184', 'Construction Material - Steel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101185', 'Consulants - PMC', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101186', 'Consulants - PMC,Contractors - Interiors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101187', 'Consultants - Accoustics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101188', 'Consultants - Architects & Int. Designers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101189', 'Consultants - Architects & Int. Designers,Consultants - Landscaping,Contractors - Interiors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101190', 'Consultants - Facade', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101191', 'Consultants - Facility Management', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101192', 'Consultants - Kitchen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101193', 'Consultants - Landscaping', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101194', 'Consultants - Lighting', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101195', 'Consultants - MEP & HVAC & Other services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101196', 'Consultants - MEP & HVAC & Other services,Consultants - Soft services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101197', 'Consultants - Procurement Outsourcing', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101198', 'Consultants - Soft services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101199', 'Contractors - Accoustics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101200', 'Contractors - Cleaning services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101201', 'Contractors - Electrical', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101202', 'Contractors - Facade system installers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101203', 'Contractors - Facade system installers,Energy - Solar Systems', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101204', 'Contractors - FLS', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101205', 'Contractors - HVAC & Refrigeration', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101206', 'Contractors - Interiors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101207', 'Contractors - Interiors,Contractors - POP WORK', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101208', 'Contractors - Interiors,Furnishing - Curtain & Upholstry fabrics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101209', 'Contractors - Plumbing', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101210', 'Contractors - POP WORK,Furniture - Office,Modular Kitchens', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101211', 'Contractors - Rain water harvesting,Contractors - S.Pool filteration units,Contractors - STP & WTP', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101212', 'Contractors - SECURITY Services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101213', 'Contractors - Wall art & Glass textures & furniture expressions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101214', 'Crockery Cutlery Glassware Tableware Holloware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101215', 'Crockery Cutlery Glassware Tableware Holloware,Kitchen & Rest Utensils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101216', 'DG Sets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101217', 'Electrical - Light Fixtures & Fittings', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101218', 'Electrical - Switch gears', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101219', 'Elevators & Escalators', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101220', 'Energy - Solar Systems', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101221', 'Entertainers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101222', 'Entertainment systems', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101223', 'Facade System - hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101224', 'Flooring - Stone & Tiles,Flooring - Wooden,Kitchen Equipments & Hoods,Plumbing - Sanitaryware & Fixtures', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101225', 'Furnishing - Curtain & Upholstry fabrics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101226', 'Gas & Fuel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101227', 'Gift', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101228', 'Glass Mirrors & Plywood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101229', 'Harmonic filter & POWER correction panel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101230', 'Hot Water Boilers & Pumps', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101231', 'Hot Water Boilers & Pumps,Screw Chillers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101232', 'Hotel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101233', 'IT - Solutions AND services', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101234', 'Kitchen & Rest Utensils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101235', 'Mattresses & Pillows & Cushions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101236', 'Oils - Essential', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101237', 'Paints & Polishes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101238', 'Plumbing - Sanitaryware & Fixtures', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101239', 'REAL Estate', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101240', 'Signages - Hoardings,Signages - Photoluminiscent', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101241', 'Signages - Photoluminiscent', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101242', 'Telephones', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101243', 'WTP & STP', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101244', 'Elevators', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101245', 'AC / Refrigeration', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101246', 'Associate', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101247', 'Audio / Video', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101248', 'Banquet Linen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101249', 'Banquet Linen,Bath / Bed Linen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101250', 'Banquet Linen,Guest Amenities', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101251', 'Bath / Bed Linen', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101252', 'Bath / Bed Linen,Computer Software', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101253', 'Bath / Bed Linen,Furnishing material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101254', 'Bathroom hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101255', 'Bathroom hardware,cosmetics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101256', 'Bathroom hardware,Sanitary ware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101257', 'Batteries', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101258', 'Beverages / Softdrinks/watter', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101259', 'BMS/BAS', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101260', 'Boilers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101261', 'Breweries / Bonders', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101262', 'Breweries / Bonders,Food stuff', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101263', 'Breweries / Bonders,Fruit & Vegetable growers/agent', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101264', 'Bulbs / Tubes / Light fittings', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101265', 'C & F Agents', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101266', 'Cable TV Operator', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101267', 'Cables & Wires', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101268', 'CAR DEALIERS', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101269', 'Car Hire', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101270', 'Carpets / Wooden floorings', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101271', 'Cash counters & paper shredders', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101272', 'Chemicals - Cleaning / Laundry', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101273', 'Chillers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101274', 'Cleaning equipments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101275', 'Cling Wrap', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101276', 'Cocoa Products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101277', 'Compressors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101278', 'Computer Consumables', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101279', 'Computer Hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101280', 'Computer Hardware,Computer Software', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101281', 'Computer Software', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101282', 'Computer Software,Consultants', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101283', 'Confectionery', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101284', 'Consultants,cosmetics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101285', 'Cookware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101286', 'Corporate gifts', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101287', 'cosmetics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101288', 'cosmetics,Guest Amenities', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101289', 'Courier services/Logistics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101290', 'Crockery / Cutlery / Glassware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101291', 'Crockery / Cutlery / Glassware,Door hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101292', 'Crockery / Cutlery / Glassware,Holloware / Flatware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101293', 'Crockery / Cutlery / Glassware,Room  & Restaurant Equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101294', 'Currency Counting Machine', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101295', 'Cutting Boards', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101296', 'Dairy Products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101297', 'Door hardware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101298', 'Drain Cleaning Equp', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101299', 'Edible Oils', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101300', 'Edible Oils,Tinned AND canned items', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101301', 'Electrical Lighting etc', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101302', 'Electrical Lighting etc,Electrical switches', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101303', 'Electrical Lighting etc,Electrical switches,Horticulture', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101304', 'Electrical Lighting etc,Marble', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101305', 'Electrical Lighting etc,Sanitary ware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101306', 'Electrical switches', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101307', 'Fabricators,Kitchen  Equipments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101308', 'Fax machines', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101309', 'Fire Extinguishers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101310', 'Fire Ret. Fabric', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101311', 'Flow meters', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101312', 'Foil  wrap', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101313', 'Foil  wrap,Tissue products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101314', 'Food stuff', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101315', 'Food stuff,Frozen desserts / Ice Creams', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101316', 'Food stuff,Fruit & Vegetable growers/agent', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101317', 'Food stuff,Imported - Food stuff & Beverag', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101318', 'Food stuff,Imported - Food stuff & Beverag,Room  & Restaurant Equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101319', 'Food stuff,Seafood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101320', 'FOODSERVICE EQUIP', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101321', 'FOODSERVICE EQUIP,Kettles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101322', 'FOODSERVICE EQUIP,Kitchen  Equipments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101323', 'Fresh Flowers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101324', 'Frozen desserts / Ice Creams', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101325', 'Fruit & Vegetable growers/agent', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101326', 'Furnishing material', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101327', 'Furnishing material,Furniture - Banquets,Furniture - Office', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101328', 'Furniture - Banquets', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101329', 'Furniture - Banquets,Furniture - Office,Furniture - Pool', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101330', 'Furniture - Pool', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101331', 'Guest Amenities', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101332', 'Guest stationary', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101333', 'Holloware / Flatware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101334', 'Horticulture', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101335', 'House hold Electronics', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101336', 'Housekeeping Contractor', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101337', 'Imported - Food stuff & Beverag', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101338', 'Imported - Food stuff & Beverag,Seafood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101339', 'Insurance  / Surveyors', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101340', 'Jute products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101341', 'Kettles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101342', 'Kitchen  Equipments', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101343', 'Kitchen  Equipments,Laundry machinary', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101344', 'Laminators/binders', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101345', 'Leather products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101346', 'Locking systems - Electronic', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101347', 'Low Cal Sweetner', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101348', 'LPG/Fuel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101349', 'Marble', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101350', 'Mattresses / Pillows / Cushions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101351', 'Miscellaneous', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101352', 'Miscellaneous,Pressure Valves', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101353', 'Mobile phones', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101354', 'Motor Vehicles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101355', 'Multifunctional devices', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101356', 'Newspaper & Periodicals', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101357', 'Non woven fibes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101358', 'NS Cookware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101359', 'Nuts', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101360', 'Office automation', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101361', 'Olive Oil', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101362', 'Paints / Polishes / W.proofing', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101363', 'Pest Control', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101364', 'Photocopiers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101365', 'Photography', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101366', 'Plastic Bags', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101367', 'Plastic Crates', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101368', 'Pots & Pans', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101369', 'Poultry', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101370', 'PPR Pipes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101371', 'Printer consumables', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101372', 'Printers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101373', 'Provisions & Spices', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101374', 'Provisions & Spices,Rice', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101375', 'Rice', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101376', 'Room  & Restaurant Equipment', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101377', 'Room Safes', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101378', 'Sanitary ware', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101379', 'Scanners - ALL TYPES', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101380', 'Seafood', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101381', 'SECURITY System', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101382', 'Soaps', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101383', 'Solid fuel', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101384', 'Stationary', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101385', 'Sugar', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101386', 'Tailors & Outfitters', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101387', 'Telcom/EPABX', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101388', 'Tiles', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101389', 'Tinned AND canned items', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101390', 'Tissue products', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101391', 'Trade Commissions', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101392', 'Travels', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101393', 'TROPHIES AND BADGES', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101394', 'TV Channels', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101395', 'Uniforms / Shoes / Accessories', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101396', 'UPS Systems', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101397', 'Vehicles & Cars', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101398', 'Waiting', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101399', 'Water Purifiers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101400', 'White Boards', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101401', 'White Boards_magnetic', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101402', 'Wine Coolers', 'Business sectors', '2016-05-23 16:00:00');
INSERT INTO sectors VALUES ('101403', 'Wooden Flooring', 'Business sectors', '2016-05-23 16:00:00');

-- ----------------------------
-- Table structure for `sector_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `sector_mapping`;
CREATE TABLE `sector_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sectorid` int(11) NOT NULL,
  `subsectorid` int(11) NOT NULL,
  `createdts` datetime NOT NULL,
  `updatedts` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sector_subsector_uniques_idx` (`sectorid`,`subsectorid`),
  KEY `sm_sectorid_fk_idx` (`sectorid`),
  KEY `sm_subsectorid_fk_idx` (`subsectorid`),
  CONSTRAINT `sm_sectorid_fk` FOREIGN KEY (`sectorid`) REFERENCES `sectors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sm_subsectorid_fk` FOREIGN KEY (`subsectorid`) REFERENCES `sectors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sector_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `tests`
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_name` varchar(200) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `coverage` varchar(2000) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `passing_marks` int(11) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tests_active_idx` (`active`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tests
-- ----------------------------

-- ----------------------------
-- Table structure for `test_invitee`
-- ----------------------------
DROP TABLE IF EXISTS `test_invitee`;
CREATE TABLE `test_invitee` (
  `id` varchar(64) NOT NULL,
  `invitor_userid` varchar(64) DEFAULT NULL,
  `invitee_emailid` varchar(64) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `invitee_name` varchar(128) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `acknowledgets` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_invitee
-- ----------------------------

-- ----------------------------
-- Table structure for `test_results`
-- ----------------------------
DROP TABLE IF EXISTS `test_results`;
CREATE TABLE `test_results` (
  `id` varchar(64) NOT NULL,
  `test_tracking_id` varchar(64) DEFAULT NULL,
  `transcript_id` int(11) DEFAULT NULL,
  `testid` int(11) DEFAULT NULL,
  `test_name` varchar(200) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `percentile` int(11) DEFAULT NULL,
  `average_score` int(11) DEFAULT NULL,
  `test_result` varchar(45) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_test_tracking_id_fk_idx` (`test_tracking_id`),
  CONSTRAINT `tr_test_tracking_id_fk` FOREIGN KEY (`test_tracking_id`) REFERENCES `test_tracking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_results
-- ----------------------------

-- ----------------------------
-- Table structure for `test_tracking`
-- ----------------------------
DROP TABLE IF EXISTS `test_tracking`;
CREATE TABLE `test_tracking` (
  `id` varchar(64) NOT NULL,
  `testid` int(11) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `src` varchar(64) DEFAULT NULL,
  `landing_page_url` varchar(1024) DEFAULT NULL,
  `refid` varchar(64) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `expiryts` datetime DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `comments` varchar(1024) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tt_testid_fk_idx` (`testid`),
  KEY `tt_src_ferid_status_idx` (`refid`,`src`,`status`),
  CONSTRAINT `tt_testid_fk` FOREIGN KEY (`testid`) REFERENCES `tests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_tracking
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uuid` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `mail_verification` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(64) NOT NULL,
  `login_token` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_first_login` tinyint(4) DEFAULT '1',
  `last_login_ip` varchar(50) DEFAULT NULL,
  `source` varchar(32) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `domain` varchar(45) DEFAULT NULL,
  `logoid` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `emailid_UNIQUE` (`email`),
  KEY `user_domain_idx` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('25f438eb-9ec9-4dee-bfcd-9383dec51e83', 'sap@gmail.com', 'Ayman Sheet', null, null, null, null, '1', '0', '$2y$10$8fbAkB6Uz43T42KG4Qmiwuw3QWe5yKTIDhiIXmjGDIg9glcL0nbIC', null, null, '1', null, null, null, null, null, '2018-06-11 16:31:40', '2018-06-11 16:31:40');
INSERT INTO users VALUES ('3e67c4e7-1ae2-4b7a-9ac5-9959590ed3a0', 'navin@ssism.org', 'Navin Jain', null, null, null, null, '1', '0', '$2y$10$gJqRoWnl3Sl1GHfe2rEG3ecYKeyHfjcbfSkI52F202/nX.vOBGU5m', null, 'jV3AJW8q3VW0EXkSqj5wibb23dVUFmUPZyfq1jTddcYH9AwqDqTKw1LoUkWf', '1', null, null, null, null, null, '2018-04-10 16:44:15', '2018-04-10 16:44:15');
INSERT INTO users VALUES ('50e9e25f-f7df-45e6-82f8-4de41bf540b8', 'ankitjain@ssism.org', 'Ankit Jain', null, null, null, null, '1', '0', '$2y$10$qtm7LUiy9PR.XRJ68YifEeI0/r1E1AgEd7AF3pzBbQPp9fQFSA/JC', null, 'QjK4XowrZpxz09w0F5vqK5N7AaLSfDELd9zUvPd3j8nIrrF3ZjqZ3Vsiha2a', '1', null, null, null, null, null, '2018-04-10 15:15:22', '2018-04-10 15:15:22');
INSERT INTO users VALUES ('ae017c6e-816e-493a-b5b1-0c6835afcb4a', 'rohit@ssism.org', 'Rohit Sisodiya', null, null, null, null, '1', '0', '$2y$10$oLOf30Yhsz8x3ThGlIXWrufJ8j6sI1cY6tkaob2leL2/GUo7iZlhy', null, '8Zrtz9oihUuIRjBO8kJIqQtK3bjCIGgnWZqh5H9Y8PwaPryG6aUZ9AWoLlgW', '1', '12', null, null, null, null, '2018-04-10 15:15:35', '2018-04-10 15:15:35');

-- ----------------------------
-- Table structure for `users_role`
-- ----------------------------
DROP TABLE IF EXISTS `users_role`;
CREATE TABLE `users_role` (
  `urid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`urid`,`user_id`),
  UNIQUE KEY `userid_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users_role
-- ----------------------------
INSERT INTO users_role VALUES ('5', '50e9e25f-f7df-45e6-82f8-4de41bf540b8', '1', '2018-03-28 16:41:41', '2018-03-28 16:41:41');
INSERT INTO users_role VALUES ('6', 'ae017c6e-816e-493a-b5b1-0c6835afcb4a', '2', '2018-03-28 16:44:34', '2018-03-28 16:44:34');
INSERT INTO users_role VALUES ('7', '3e67c4e7-1ae2-4b7a-9ac5-9959590ed3a0', '1', '2018-04-10 09:49:03', '2018-04-10 09:49:03');
INSERT INTO users_role VALUES ('8', '25f438eb-9ec9-4dee-bfcd-9383dec51e83', '1', '2018-06-11 07:25:31', '2018-06-11 07:25:31');

-- ----------------------------
-- Table structure for `user_activity`
-- ----------------------------
DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `user_activity_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `user_activity_mapping`;
CREATE TABLE `user_activity_mapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(64) DEFAULT NULL,
  `user_activity_id` int(11) DEFAULT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uam_userid_useractivityid_unique_idx` (`userid`,`user_activity_id`),
  KEY `uam_userid_fk_idx` (`userid`),
  KEY `uam_useractivityid_fk_idx` (`user_activity_id`),
  CONSTRAINT `uam_useractivityid_fk` FOREIGN KEY (`user_activity_id`) REFERENCES `user_activity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `uam_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_activity_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for `user_nationality`
-- ----------------------------
DROP TABLE IF EXISTS `user_nationality`;
CREATE TABLE `user_nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(64) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_nationality
-- ----------------------------

-- ----------------------------
-- Table structure for `user_sector_mapping`
-- ----------------------------
DROP TABLE IF EXISTS `user_sector_mapping`;
CREATE TABLE `user_sector_mapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(64) NOT NULL,
  `sector_mapping_id` int(11) NOT NULL,
  `createdts` datetime DEFAULT NULL,
  `updatedts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usm_userid_sector_unique_idx` (`userid`,`sector_mapping_id`),
  KEY `usm_userid_fk_idx` (`userid`),
  KEY `usm_sector_mapping_fk_idx` (`sector_mapping_id`),
  CONSTRAINT `usm_sector_mapping_fk` FOREIGN KEY (`sector_mapping_id`) REFERENCES `sector_mapping` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usm_userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`uuid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_sector_mapping
-- ----------------------------
