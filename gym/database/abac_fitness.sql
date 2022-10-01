-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 04:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET GLOBAL FOREIGN_KEY_CHECKS=0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abac_fitness`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData` (IN `in_username` VARCHAR(40), IN `in_gender` VARCHAR(8), IN `in_mobile` VARCHAR(20), IN `in_email` VARCHAR(20), IN `in_dob` VARCHAR(10), IN `in_joining_date` VARCHAR(10), IN `in_userid` VARCHAR(20), IN `in_image` LONGBLOB, IN `in_status` varchar(300), IN `in_password` varchar(100), IN `in_fname` varchar(50), IN `in_lname` varchar(500),IN `in_nationalid` varchar(500),IN `in_privilege` varchar(100),IN `in_goal` varchar(100),IN `in_conditions` varchar(200))  BEGIN
INSERT INTO users(username, gender, mobile, email, dob, joining_date, userid, image, status,password,fname,lname,nationalid,privilege,goal,conditions) VALUES(in_username,in_gender,in_mobile,in_email,in_dob,in_joining_date,in_userid,in_image,in_status,in_password,in_fname,in_lname,in_nationalid,in_privilege,in_goal,in_conditions);
END$$



DELIMITER ;

DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `insertTrainers` (IN `in_username` VARCHAR(40), IN `in_gender` VARCHAR(8), IN `in_mobile` VARCHAR(20), IN `in_email` VARCHAR(20), IN `in_dob` VARCHAR(10), IN `in_joining_date` VARCHAR(10), IN `in_trainerid` VARCHAR(20), IN `in_image` LONGBLOB, IN `in_availableday` varchar(130) ,`in_time_from` time , IN `in_time_to` time , IN `in_trainertype` varchar(300), IN `in_skills` varchar(300), IN `in_yoe` int(10),IN `in_password` varchar(100),IN `in_fname` varchar(50),IN `in_lname` varchar(500))  BEGIN
INSERT INTO trainers(username,  gender, mobile, email, dob, joining_date, trainerid, image, availableday,time_from,time_to,trainertype,skills,yoe,password,fname,lname) VALUES(in_username,in_gender,in_mobile,in_email,in_dob,in_joining_date,in_trainerid,in_image,in_availableday,in_time_from,in_time_to,in_trainertype,in_skills,in_yoe,in_password,in_fname,in_lname);
END$$



DELIMITER ;




--DELIMITER ;
-- --------------------------------------------------------

--
-- Table structure for table `address`
--


CREATE TABLE `address` (
  `id` varchar(20) NOT NULL,
  `streetName` varchar(40) NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zipcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `address`
--



CREATE TABLE `address2` (
  `id` varchar(20) NOT NULL,
  `streetName` varchar(40) NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zipcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `group_id`) VALUES
(1, 'Kasidit P.', 'admin@admin.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Kasidit', 'Ploenthamakhun', 'Male', '1999-02-19', '+919090909090', 'Bangkok', 'man1.png', '2018-04-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to`
--

CREATE TABLE `enrolls_to_day` (
  `etd_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `dayuserid` varchar(20) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `amount` int(200) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sessions2`
--

CREATE TABLE `sessions2` (
  `session2id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `dayuserid` varchar(20) NOT NULL,
  `amount` int(200) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `csessions`
--

CREATE TABLE `csessions` (
  `csessionid` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `amount` int(200) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `csessions`
--

CREATE TABLE `csessions2` (
  `csession2id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `dayuserid` varchar(20) NOT NULL,
  `amount` int(200) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to_maintenance`
--

CREATE TABLE `enrolls_to_maintenance` (
  `etm_id` int(5) NOT NULL,
  `machineid` varchar(20) NOT NULL,
  `wid` varchar(20) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `expire` varchar(15) NOT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to_maintain`
--

CREATE TABLE `enrolls_to_maintain` (
  `etmt_id` int(5) NOT NULL,
  `machineid` varchar(20) NOT NULL,
  `wid` varchar(20) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `renewal` varchar(15) DEFAULT NULL,
  `main_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;







-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to_machine`
--

CREATE TABLE `enrolls_to_machine` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to_warranty`
--

CREATE TABLE `enrolls_to_warranty` (
  `etw_id` int(5) NOT NULL,
  `wid` varchar(8) NOT NULL,
  `toeid` varchar(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls2_to`
--

CREATE TABLE `enrolls2_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `health_status`
--

CREATE TABLE `health_status` (
  `hid` int(5) NOT NULL,
  `calorie` varchar(8) DEFAULT NULL,
  `height` varchar(8) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `fat` varchar(8) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `active` varchar(200) DEFAULT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `checkinid` int(5) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `expire` varchar(40) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `created_time` varchar(20) DEFAULT NULL,
  `active` varchar(40) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `checkint`
--

CREATE TABLE `checkint` (
  `checkintid` int(5) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `expire` varchar(40) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `created_time` varchar(20) DEFAULT NULL,
  `active` varchar(40) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;




-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkoutid` int(5) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `expire` varchar(40) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `created_time` varchar(20) DEFAULT NULL,
  `active` varchar(40) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(5) NOT NULL,
  `present` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `expire` varchar(40) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `compare_date` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `active` varchar(40) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------






-- --------------------------------------------------------

--
-- Table structure for table `health2_status`
--

CREATE TABLE `health2_status` (
  `hid` int(5) NOT NULL,
  `calorie` varchar(8) DEFAULT NULL,
  `height` varchar(8) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `fat` varchar(8) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `action` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `logs2`
--

CREATE TABLE `logs2` (
  `id` int(11) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `action` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `userid`, `action`, `date`) VALUES
(1, '1529336794', 'User Deleted Succesfully', '2022-07-07 16:10:18'),
(2, '1572760056', 'User Deleted Succesfully', '2022-07-07 16:10:18'),
(3, '1622822786', 'User Deleted Succesfully', '2022-07-07 16:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`) VALUES
(1, 'AU FITNESS MANAGEMENT SYSTEM', 'AU FITNESS', 'admin pubb Logo.png', 'Kasidit Ploenthamakhun', 'THB', ' ฿', 'admin pubb Logo 2.png', 'admin pubb Logo 2.png', 'black.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` varchar(8) NOT NULL,
  `planName` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `validity` varchar(20) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `plantype` varchar(200) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `session` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `plan` (`pid`, `planName`,  `description`, `validity`, `amount`, `plantype`, `active`,`session`) VALUES
('000000', 'NOT MEMBER',  'NOTHING', 'NULL','NULL','Months','yes',NULL),
('333333', 'Single Member',  'FULL GYM ACCESS, classes will be charged at an additional cost', '1','1690','Months','yes',NULL),
('444444', '3 Month Membership',  'FULL GYM ACCESS, classes will be charged at an additional cost', '3','4290','Months','yes',NULL),
('555555', '12 Month Membership',  'FULL GYM ACCESS, classes will be charged at an additional cost', '12','16800','Months','yes',NULL),
('019486', 'SINGLE CLASS DROP-IN',  'Valid for 1 month from purchase dates', '1','945','Classes','yes','1'),
('775436', 'SPRINT 5-CLASS PACK',  'Valid for 6 months from purchase dates', '6','4375','Classes','yes','5'),
('777327', 'SPRINT 10-CLASS PACK',  'Valid for 12 months from purchase dates', '12','7875','Classes','yes','10'),
('895431', 'SINGLE-PACK SESSIONS',  '60-MINUTE PERSONAL TRAINING', '1','3510','Sessions','yes','1'),
('564731', '4-PACK SESSIONS',  '60-MINUTE PERSONAL TRAINING', '1','13090','Sessions','yes','4'),
('575499', '8-PACK SESSIONS',  '60-MINUTE PERSONAL TRAINING', '2','23100','Sessions','yes','8'),
('588888', '12-PACK SESSIONS',  '60-MINUTE PERSONAL TRAINING', '3','30030','Sessions','yes','12'),
('111111', 'One Day Pass',  'Single-Day Gym Access Only,valid for 1 day from purchase date', '24','500','Hours','yes',NULL);


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` varchar(8) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `service` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;




CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `plan2`
--

CREATE TABLE `plan2` (
  `pid` varchar(8) NOT NULL,
  `planName` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;






--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` varchar(20) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `active` varchar(255) DEFAULT NULL,
  `toe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `categories` (`categoryid`, `categoryName`, `description`, `active`,`toe`) VALUES
('996421', 'Bars', 'xxxxxxxx ','yes','wt'),
('856775', 'Weight Sets', 'xxxxxxxx ','yes','wt'),
('566755', 'Dumbbell Sets', 'xxxxxxxx ','yes','wt'),
('466762', 'Kettlebell Sets', 'xxxxxxxx ','yes','wt'),
('391592', 'Barbell Sets', 'xxxxxxxx ','yes','wt'),
('245237', 'Wall Balls', 'xxxxxxxx ','yes','wt'),
('712651', 'Yoga Mats', 'xxxxxxxx ','yes','ym'),
('369935', 'Exercise Mats', 'xxxxxxxx ','yes','ym'),
('414996 ', 'Selectorized Equipment', 'xxxxxxxx ','yes','se'),
('330595', 'Weight Benches', 'xxxxxxxx ','yes','se'),
('787833', 'Cages/Racks', 'xxxxxxxx ','yes','se'),
('259280', 'GHDs', 'xxxxxxxx ','yes','se'),
('473515', 'Inversion Table', 'xxxxxxxx ','yes','se'),
('600706', 'Speed & Strength', 'xxxxxxxx ','yes','se'),
('843381', 'Rigs', 'xxxxxxxx ','yes','rs'),
('386993', 'Rig Accessories', 'xxxxxxxx ','yes','rs'),
('720410', 'Gloves', 'xxxxxxxx ','yes','mb'),
('851475', 'Striking Pad', 'xxxxxxxx ','yes','mb'),
('289102', 'Striking Bags', 'xxxxxxxx ','yes','mb'),
('971907', 'Adhesive', 'xxxxxxxx ','yes','cf'),
('677537', 'Basic Rolls & Tiles', 'xxxxxxxx ','yes','cf'),
('774991', 'Turf', 'xxxxxxxx ','yes','cf'),
('747886', 'UltraTiles', 'xxxxxxxx ','yes','cf'),
('425558', 'Treadmills', 'These treadmills have built in continuous horsepower for use in a commercial gym setting.  ','yes','te'),
('786054', 'Ellipticals', 'xxxxxxxx ','yes','te'),
('765435', 'Aerobic Step Platforms', 'xxxxxxxx ','yes','te');


--
-- Table structure for table `vendor`
--

CREATE TABLE `vendors` (
  `vendorid` varchar(20) NOT NULL,
  `vendorName` varchar(100) NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `vendors` (`vendorid`, `vendorName`, `contactName`, `address`, `mobile`, `email`, `description`, `active`) VALUES
('123456', 'Sarah Supplier', 'Scott Jones','Unknown Avenue',  '099444333', 'sarahsup@gmail.com', 'PLACEHOLDER','yes'),
('122557', 'Tony Corp.', 'Lance Little', 'Unknown Avenue', '095344293',  'tonyja@org.com', 'PLACEHOLDER','yes');


--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `studioid` varchar(20) NOT NULL,
  `studioName` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pvid` varchar(20) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `studio` (`studioid`, `studioName`, `description`, `active`) VALUES
('855563', 'Cardiovascular Area', 'XXX','yes'),
('684677', 'Functional fitness Area', 'XXX','yes'),
('524248', 'Free weights Area', 'XXX','yes'),
('130758', 'Stretching and mobility Area', 'XXX','yes'),
('690184', 'Personal training Corners', 'XXX','yes');


-- --------------------------------------------------------

-- --------------------------------------------------------

-- Table structure for table `newmachine`
--

CREATE TABLE `newmachine` (
  `machineid` varchar(20) NOT NULL,
  `toe` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `studio` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `mainday` varchar(100) NOT NULL,
  `repair` varchar(100) NOT NULL,
  `status` varchar(300) DEFAULT NULL,
  `mneed` varchar(300) DEFAULT NULL,
  `subtotal` float(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `maintainid` varchar(20) NOT NULL,
  `machineid` varchar(255) DEFAULT NULL,
  `maintainName` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `condition` text NOT NULL,
  `mainday` varchar(100) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;






-- --------------------------------------------------------

-- Table structure for table `toe`
--

CREATE TABLE `toe` (
  `toeid` varchar(20) NOT NULL,
  `image` LONGBLOB NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `toeName` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `brands` varchar(100) NOT NULL,
  `categories` varchar(8) NOT NULL,
  `vendors` varchar(8) NOT NULL,
  `amount` int(10) NOT NULL,
  `warranty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;





-- --------------------------------------------------------

-- Table structure for table `classes`
--
SET GLOBAL FOREIGN_KEY_CHECKS=0;
CREATE TABLE `classes` (
  `classid` varchar(20) DEFAULT NULL,
  `className` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `studios` varchar(8) NOT NULL,
  `classtype` varchar(300) DEFAULT NULL,
  `dow` varchar(500) NOT NULL,
  `date_from` varchar(10) NOT NULL,
  `date_to` varchar(10) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `session` varchar(100) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `classcap` int(20) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- Table structure for table `classholder`
--
SET GLOBAL FOREIGN_KEY_CHECKS=0;
CREATE TABLE `classholder` (
  `classholderid` varchar(20) DEFAULT NULL,
  `classid` varchar(20) DEFAULT NULL,
  `userid` varchar(20) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- Table structure for table `appointment`
--
SET GLOBAL FOREIGN_KEY_CHECKS=0;
CREATE TABLE `appointment` (
  `appointmentid` varchar(20) NOT NULL,
  `className` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `studios` varchar(8) NOT NULL,
  `classtype` varchar(300) DEFAULT NULL,
  `start_date`date DEFAULT NULL,
  `end_date`date DEFAULT NULL,
  `dow` varchar(500) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `session` varchar(100) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `approved` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



-- --------------------------------------------------------

-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `className` varchar(100) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(500) NOT NULL,
  `description` varchar(200) NOT NULL,
  `studios` varchar(8) NOT NULL,
  `classtype` varchar(300) DEFAULT NULL,
  `dow` varchar(500) NOT NULL,
  `date_from` varchar(10) NOT NULL,
  `date_to` varchar(10) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_date` date NOT NULL,
  `approved` varchar(300) NOT NULL,
  `session` varchar(500) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- Table structure for table `bookingread`
--

CREATE TABLE `bookingread` (
  `bookingreadid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `expire` varchar(40) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `active` varchar(40) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- Table structure for table `privateclasses`
--

CREATE TABLE `privateclasses` (
  `privateclassid` varchar(20) NOT NULL,
  `className` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `studios` varchar(8) NOT NULL,
  `classtype` varchar(300) DEFAULT NULL,
  `dow` text NOT NULL,
  `date_from` varchar(10) NOT NULL,
  `date_to` varchar(10) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `userid` varchar(20) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `status` varchar(40) NOT NULL,
  `session` varchar(20) NOT NULL,
  `classcap` int(20) NOT NULL,
  `bookcap` int(20) NOT NULL,
  `approved` varchar(300) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `e_id` int(21) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email_config`
--

INSERT INTO `tbl_email_config` (`e_id`, `name`, `mail_driver_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encrypt`) VALUES
(1, 'Sender Name will be here', 'mail.gmail.com', 587, 'ndbahlerao91@gmail.com', '123654123', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(12) NOT NULL,
  `tname` varchar(45) DEFAULT NULL,
  `day1` varchar(200) DEFAULT NULL,
  `day2` varchar(200) DEFAULT NULL,
  `day3` varchar(200) DEFAULT NULL,
  `day4` varchar(200) DEFAULT NULL,
  `day5` varchar(200) DEFAULT NULL,
  `day6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `tname`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`) VALUES
(2, 'Workout', 'Flat bench barbell press - 4 sets of 8-12 reps\r\nIncline dumbell press - 4 sets of 8-12 reps\r\nIncline dumbell flyers - 3 set of 10 reps\r\nCable crossovers - 3 sets of 15 reps\r\nPush-ups - 4sets', 'Flat bench barbell press - 4 sets of 8-12 reps\r\nIncline dumbell press - 4 sets of 8-12 reps\r\nIncline dumbell flyers - 3 set of 10 reps\r\nCable crossovers - 3 sets of 15 reps\r\nPush-ups - 4sets', 'Barbell squats - 4 sets of 8-10 reps\r\nHeck squats - 4 sets of 10 reps\r\nLeg press machine -3 sets of 10 reps', 'Chin-ups - 4 sets of 10 reps\r\nWide grip lat pull-downs - 4 sets of 12 reps\r\nClose grip lat pull downs - 4 set of 12 reps\r\nDumbbell rows - 4 sets of 8-10 reps', 'Double arm dumbbell curls - 4 sets of 10-12 reps\r\nEZ bar curls - 4 sets of 10-12 reps\r\nPreacher curl machine - 4 sets of 12 reps\r\nTriceps rope machine - 4 sets of 15 reps', '60 minute of steady state cardio..');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) NOT NULL,
  `image` LONGBLOB NOT NULL,
  `nationalid` varchar(500) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `status` varchar(300) DEFAULT NULL,
  `goal` varchar(300) DEFAULT NULL,
  `conditions` varchar(200) DEFAULT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `dayusers`
--

CREATE TABLE `dayusers` (
  `dayuserid` varchar(20) NOT NULL,
  `agegroup` varchar(8) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `goal` varchar(300) DEFAULT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainerid` varchar(20) NOT NULL,
  `image` LONGBLOB NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `joining_date` varchar(10) NOT NULL,
  `availableday` varchar(300) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `trainertype` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `skills` varchar(300) NOT NULL,
  `yoe` int(10) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trainertt`
--

CREATE TABLE `trainertt` (
  `trainerttid` varchar(20) NOT NULL,
  `trainerid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `mon_date` date DEFAULT NULL,
  `tues_date` date DEFAULT NULL,
  `wednes_date` date DEFAULT NULL,
  `thurs_date` date DEFAULT NULL,
  `fri_date` date DEFAULT NULL,
  `satur_date` date DEFAULT NULL,
  `sun_date` date DEFAULT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `status` varchar(300) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;




--
-- Triggers `users`
--

DELIMITER $$
CREATE TRIGGER `deleteUser` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.userid, "User Deleted Succesfully", NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertUser` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.userid, "Data Inserted Succesfully", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateUser` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.userid, "Data Updated Succesfully", NOW() )
$$
DELIMITER ;


--
-- Triggers `trainers`
--
DELIMITER $$
CREATE TRIGGER `deleteTrainer` BEFORE DELETE ON `trainers` FOR EACH ROW INSERT INTO logs2 VALUES(null, OLD.trainerid, "User Deleted Succesfully", NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertTrainer` AFTER INSERT ON `trainers` FOR EACH ROW INSERT INTO logs2 VALUES(null, NEW.trainerid, "Data Inserted Succesfully", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateTrainer` AFTER UPDATE ON `trainers` FOR EACH ROW INSERT INTO logs2 VALUES(null, NEW.trainerid, "Data Updated Succesfully", NOW() )
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `userID` (`id`) USING BTREE;

  ALTER TABLE `address2`
  ADD KEY `trainerID` (`id`) USING BTREE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

  --
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

  

--
-- Indexes for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `user_ID` (`uid`) USING BTREE,
  ADD KEY `plan_ID_idx` (`pid`) USING BTREE;

  --
-- Indexes for table `enrolls_to_day`
--
ALTER TABLE `enrolls_to_day`
  ADD PRIMARY KEY (`etd_id`) USING BTREE,
  ADD KEY `dayuser_ID` (`dayuserid`) USING BTREE,
  ADD KEY `plan_ID_idd` (`pid`) USING BTREE;

  --
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionid`) USING BTREE,
  ADD KEY `user_IDss` (`userid`) USING BTREE,
  ADD KEY `plan_ID_ss` (`pid`) USING BTREE;

    --
-- Indexes for table `sessions2`
--
ALTER TABLE `sessions2`
  ADD PRIMARY KEY (`session2id`) USING BTREE,
  ADD KEY `dayuser_IDss` (`dayuserid`) USING BTREE,
  ADD KEY `plan_ID_sss` (`pid`) USING BTREE;

   --
-- Indexes for table `csessions`
--
ALTER TABLE `csessions`
  ADD PRIMARY KEY (`csessionid`) USING BTREE,
  ADD KEY `user_IDcs` (`userid`) USING BTREE,
  ADD KEY `plan_ID_cs` (`pid`) USING BTREE;

     --
-- Indexes for table `csessions2`
--
ALTER TABLE `csessions2`
  ADD PRIMARY KEY (`csession2id`) USING BTREE,
  ADD KEY `dayuser_IDcs` (`dayuserid`) USING BTREE,
  ADD KEY `plan_ID_css` (`pid`) USING BTREE;

  --
-- Indexes for table `enrolls_to_maintenance`
--
ALTER TABLE `enrolls_to_maintenance`
  ADD PRIMARY KEY (`etm_id`) USING BTREE,
  ADD KEY `machine_ID_idx` (`machineid`) USING BTREE;

    --
-- Indexes for table `enrolls_to_maintain`
--
ALTER TABLE `enrolls_to_maintain`
  ADD PRIMARY KEY (`etmt_id`) USING BTREE,
  ADD KEY `machinemt_ID_idx` (`machineid`) USING BTREE;

  --
-- Indexes for table `enrolls_to_warranty`
--
ALTER TABLE `enrolls_to_warranty`
  ADD PRIMARY KEY (`etw_id`) USING BTREE,
  ADD KEY `toe_ID` (`toeid`) USING BTREE;





 

  --
-- Indexes for table `enrolls_to_machine`
--
ALTER TABLE `enrolls_to_machine`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `newmachine_ID` (`uid`) USING BTREE;


  



  

  -- Indexes for table `enrolls2_to`
--
ALTER TABLE `enrolls2_to`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `trainer_ID` (`uid`) USING BTREE,
  ADD KEY `plan2_ID_idx` (`pid`) USING BTREE;


--
-- Indexes for table `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`hid`) USING BTREE,
  ADD KEY `userID_idx` (`uid`) USING BTREE;

  --
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`checkinid`) USING BTREE,
  ADD KEY `userID_idc` (`userid`) USING BTREE;

    --
-- Indexes for table `checkint`
--
ALTER TABLE `checkint`
  ADD PRIMARY KEY (`checkintid`) USING BTREE,
  ADD KEY `trainerID_idc` (`trainerid`) USING BTREE;

    --
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkoutid`) USING BTREE,
  ADD KEY `userID_idco` (`userid`) USING BTREE;

      --
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`) USING BTREE,
  ADD KEY `userID_idaa` (`userid`) USING BTREE;



  -- Indexes for table `health2_status`
--
ALTER TABLE `health2_status`
  ADD PRIMARY KEY (`hid`) USING BTREE,
  ADD KEY `trainerID_idx` (`uid`) USING BTREE;

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

  --
-- Indexes for table `logs2`
--
ALTER TABLE `logs2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

  --
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`) USING BTREE,
  ADD KEY `userID_idfb` (`userid`) USING BTREE,
  ADD KEY `feedbackid` (`feedbackid`) USING BTREE;

-- Indexes for table `plan2`
--
ALTER TABLE `plan2`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`) USING BTREE,
  ADD KEY `userID_idbo` (`userid`) USING BTREE,
  ADD KEY `trainerID_idbo` (`trainerid`) USING BTREE,
  ADD KEY `bookingid` (`bookingid`) USING BTREE;

  -- Indexes for table `bookingread`
--
ALTER TABLE `bookingread`
  ADD PRIMARY KEY (`bookingreadid`) USING BTREE,
  ADD KEY `userID_idb` (`userid`) USING BTREE,
  ADD KEY `trainerID_idb` (`trainerid`) USING BTREE,
  ADD KEY `bookingreadid` (`bookingreadid`) USING BTREE;




  -- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`) USING BTREE,
  ADD KEY `categoryid` (`categoryid`) USING BTREE;

    -- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendorid`) USING BTREE,
  ADD KEY `vendorid` (`vendorid`) USING BTREE;






  

  -- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`studioid`) USING BTREE,
  ADD KEY `studioid` (`studioid`) USING BTREE,
  ADD KEY `studio_ID_idx` (`uid`) USING BTREE,
  ADD KEY `privatestudio_ID_idx` (`pvid`) USING BTREE;


  -- Indexes for table `newmachine`
--
ALTER TABLE `newmachine`
  ADD PRIMARY KEY (`machineid`) USING BTREE,
  ADD KEY `machineid` (`machineid`) USING BTREE;

    -- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`maintainid`) USING BTREE,
  ADD KEY `newmachine2_ID` (`machineid`) USING BTREE;






   -- Indexes for table `toe`
--
ALTER TABLE `toe`
  ADD PRIMARY KEY (`toeid`) USING BTREE,
  ADD KEY `toeid` (`toeid`) USING BTREE;



  -- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`) USING BTREE,
  ADD KEY `trainer_IDgc` (`trainerid`) USING BTREE,
  ADD KEY `classid` (`classid`) USING BTREE;

    -- Indexes for table `classholder`
--
ALTER TABLE `classholder`
  ADD PRIMARY KEY (`classholderid`) USING BTREE,
  ADD KEY `trainer_IDch` (`trainerid`) USING BTREE,
  ADD KEY `user_IDch` (`userid`) USING BTREE,
  ADD KEY `classidch` (`classid`) USING BTREE;

    -- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentid`) USING BTREE,
  ADD KEY `trainer_IDapm` (`trainerid`) USING BTREE,
  ADD KEY `user_IDapm` (`userid`) USING BTREE,
  ADD KEY `appointmentid` (`appointmentid`) USING BTREE;

  -- Indexes for table `privateclasses`
--
ALTER TABLE `privateclasses`
  ADD PRIMARY KEY (`privateclassid`) USING BTREE,
  ADD KEY `trainer_IDpc` (`trainerid`) USING BTREE,
  ADD KEY `user_IDpc` (`userid`) USING BTREE,
  ADD KEY `privateclassid` (`privateclassid`) USING BTREE;
--
--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `userid` (`userid`) USING BTREE;

  -- Indexes for table `dayusers`
--
ALTER TABLE `dayusers`
  ADD PRIMARY KEY (`dayuserid`) USING BTREE,
  ADD KEY `dayuserid` (`dayuserid`) USING BTREE;

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainerid`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `trainerid` (`trainerid`) USING BTREE;

  --
-- Indexes for table `trainertt`
--
ALTER TABLE `trainertt`
  ADD PRIMARY KEY (`trainerttid`) USING BTREE,
  ADD KEY `class_IDtt` (`classid`) USING BTREE,
  ADD KEY `user_IDtt` (`userid`) USING BTREE,
  ADD KEY `trainerttid` (`trainerttid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classholder`
--
ALTER TABLE `classholder`
  MODIFY `classholderid` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(5) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `enrolls_to_day`
--
ALTER TABLE `enrolls_to_day`
  MODIFY `etd_id` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionid` int(5) NOT NULL AUTO_INCREMENT;

    --
-- AUTO_INCREMENT for table `sessions2`
--
ALTER TABLE `sessions2`
  MODIFY `session2id` int(5) NOT NULL AUTO_INCREMENT;

    --
-- AUTO_INCREMENT for table `csessions`
--
ALTER TABLE `csessions`
  MODIFY `csessionid` int(5) NOT NULL AUTO_INCREMENT;

      --
-- AUTO_INCREMENT for table `csessions2`
--
ALTER TABLE `csessions2`
  MODIFY `csession2id` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(5) NOT NULL AUTO_INCREMENT;

   --
-- AUTO_INCREMENT for table `booking read`
--
ALTER TABLE `bookingread`
  MODIFY `bookingreadid` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `enrolls_to_maintenance`
--
ALTER TABLE `enrolls_to_maintenance`
  MODIFY `etm_id` int(5) NOT NULL AUTO_INCREMENT;

    --
-- AUTO_INCREMENT for table `enrolls_to_maintain`
--
ALTER TABLE `enrolls_to_maintain`
  MODIFY `etmt_id` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `enrolls_to_warranty`
--
ALTER TABLE `enrolls_to_warranty`
  MODIFY `etw_id` int(5) NOT NULL AUTO_INCREMENT;







  --
-- AUTO_INCREMENT for table `enrolls_to_machine`
--
ALTER TABLE `enrolls_to_machine`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT;




  --
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `enrolls2_to`
--
ALTER TABLE `enrolls2_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_status`
--
ALTER TABLE `health_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `checkinid` int(5) NOT NULL AUTO_INCREMENT;

    --
-- AUTO_INCREMENT for table `checkint`
--
ALTER TABLE `checkint`
  MODIFY `checkintid` int(5) NOT NULL AUTO_INCREMENT;

    --
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutid` int(5) NOT NULL AUTO_INCREMENT;

   --
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int(5) NOT NULL AUTO_INCREMENT;



    --
-- AUTO_INCREMENT for table `trainertt`
--
ALTER TABLE `trainertt`
  MODIFY `trainerttid` int(5) NOT NULL AUTO_INCREMENT;

  -- AUTO_INCREMENT for table `healt2h_status`
--
ALTER TABLE `health2_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  --
-- AUTO_INCREMENT for table `logs2`
--
ALTER TABLE `logs2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `e_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `userID` FOREIGN KEY (`id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  -- Constraints for table `address2`
--
ALTER TABLE `address2`
  ADD CONSTRAINT `trainerID` FOREIGN KEY (`id`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD CONSTRAINT `plan_ID` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `user_IDfb` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `enrolls_to_day`
--
ALTER TABLE `enrolls_to_day`
  ADD CONSTRAINT `plan_IDD` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dayuser_ID` FOREIGN KEY (`dayuserid`) REFERENCES `dayusers` (`dayuserid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `plan_IDss` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_IDss` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
-- Constraints for table `sessions2`
--
ALTER TABLE `sessions2`
  ADD CONSTRAINT `plan_IDsss` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dayuser_IDss` FOREIGN KEY (`dayuserid`) REFERENCES `dayusers` (`dayuserid`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
-- Constraints for table `csessions`
--
ALTER TABLE `csessions`
  ADD CONSTRAINT `plan_IDcs` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_IDcs` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

      --
-- Constraints for table `csessions2`
--
ALTER TABLE `csessions2`
  ADD CONSTRAINT `plan_IDcss` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dayuser_IDcs` FOREIGN KEY (`dayuserid`) REFERENCES `dayusers` (`dayuserid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `enrolls_to_maintenance`
--
ALTER TABLE `enrolls_to_maintenance`
  ADD CONSTRAINT `machinemt_ID` FOREIGN KEY (`machineid`) REFERENCES `newmachine` (`machineid`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
-- Constraints for table `enrolls_to_maintain`
--
ALTER TABLE `enrolls_to_maintain`
  ADD CONSTRAINT `machine_ID` FOREIGN KEY (`machineid`) REFERENCES `newmachine` (`machineid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `enrolls_to_warranty`
--
ALTER TABLE `enrolls_to_warranty`

  ADD CONSTRAINT `toe_ID` FOREIGN KEY (`toeid`) REFERENCES `toe` (`toeid`) ON DELETE CASCADE ON UPDATE NO ACTION;







  --
-- Constraints for table `enrolls_to_machine`
--
ALTER TABLE `enrolls_to_machine`
  ADD CONSTRAINT `newmachine_ID` FOREIGN KEY (`uid`) REFERENCES `newmachine` (`machineid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  -- Constraints for table `enrolls2_to`
  SET GLOBAL FOREIGN_KEY_CHECKS=0;
--
ALTER TABLE `enrolls2_to`
  ADD CONSTRAINT `trainer_ID` FOREIGN KEY (`uid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `health_status`
--
ALTER TABLE `health_status`
  ADD CONSTRAINT `uID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;
  
  --
-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `userIDC` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
-- Constraints for table `checkint`
--
ALTER TABLE `checkint`
  ADD CONSTRAINT `trainerIDC` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  

    --
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `userIDCO` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

      --
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `userIDAA` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;


   --
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `userIDBO` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `trainerIDBO` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

    --
-- Constraints for table `bookingread`
--
ALTER TABLE `bookingread`
  ADD CONSTRAINT `userIDB` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `trainerIDB` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

      --
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `trainerIDgc` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

        --
-- Constraints for table `classholder`
--
ALTER TABLE `classholder`
  ADD CONSTRAINT `userIDch` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `trainerIDch` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;
   
      --
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `trainerIDapm` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userIDapm` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;


  --
-- Constraints for table `privateclasses`
--
ALTER TABLE `privateclasses`
  ADD CONSTRAINT `trainerIDpc` FOREIGN KEY (`trainerid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userIDpc` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

      --
-- Constraints for table `trainertt`
--
ALTER TABLE `trainertt`
  ADD CONSTRAINT `classIDtt` FOREIGN KEY (`classid`) REFERENCES `classes` (`classid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userIDtt` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

  --
-- Constraints for table `maintain`
--
ALTER TABLE `maintain`
  ADD CONSTRAINT `newmachine2_ID` FOREIGN KEY (`machineid`) REFERENCES `newmachine` (`machineid`) ON DELETE CASCADE ON UPDATE NO ACTION;


COMMIT;
COMMIT;


 



 --






-- Constraints for table `health2_status`
--
ALTER TABLE `health2_status`
  ADD CONSTRAINT `u2ID` FOREIGN KEY (`uid`) REFERENCES `trainers` (`trainerid`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

SET GLOBAL FOREIGN_KEY_CHECKS=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
