-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 01:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `cus_password` varchar(255) DEFAULT NULL,
  `cus_image` varchar(255) DEFAULT NULL,
  `cus_contact` varchar(20) DEFAULT NULL,
  `cus_status` int(1) NOT NULL,
  `cus_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `cus_name`, `cus_email`, `cus_password`, `cus_image`, `cus_contact`, `cus_status`, `cus_order`) VALUES
(1, 'ewfsf', 'nouser@no.com', '1234', NULL, '12343453455', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(1) NOT NULL,
  `order_order` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professionals`
--

CREATE TABLE `tbl_professionals` (
  `prof_id` int(11) NOT NULL,
  `prof_slug` varchar(100) DEFAULT NULL,
  `prof_name` varchar(100) DEFAULT NULL,
  `prof_email` varchar(255) DEFAULT NULL,
  `prof_contact` varchar(20) DEFAULT NULL,
  `prof_password` varchar(255) DEFAULT NULL,
  `prof_image` varchar(255) DEFAULT NULL,
  `prof_status` int(1) NOT NULL,
  `prof_order` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `service_slug` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `service_icon` varchar(100) DEFAULT NULL,
  `service_short_desc` varchar(255) DEFAULT NULL,
  `service_status` int(1) NOT NULL,
  `service_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_slug`, `service_title`, `service_icon`, `service_short_desc`, `service_status`, `service_order`) VALUES
(1, 'education', 'EDUCATION', 'fas fa-book', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 1, 1),
(2, 'car-repairing', 'CAR REPAIRING', 'flaticon-car-service', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 1, 2),
(3, 'bike-repairing', 'BIKE REPAIRING', 'flaticon-mechanic', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 1, 3),
(4, 'electric-appliances-repairing', 'ELECTRIC APPLIANCES REPAIRING', 'fas fa-tools', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siteadmin`
--

CREATE TABLE `tbl_siteadmin` (
  `site_id` int(11) NOT NULL,
  `site_login` varchar(20) NOT NULL,
  `site_pswd` varchar(32) NOT NULL,
  `site_info_data` longtext DEFAULT NULL,
  `site_contact_data` longtext DEFAULT NULL,
  `site_email_data` longtext NOT NULL,
  `site_smtp_data` longtext NOT NULL,
  `site_meta_data` longtext DEFAULT NULL,
  `site_script_data` longtext NOT NULL,
  `site_social_data` longtext DEFAULT NULL,
  `site_og_data` longtext DEFAULT NULL,
  `site_email_details` longtext NOT NULL,
  `site_captcha` longtext NOT NULL,
  `site_theme` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_siteadmin`
--

INSERT INTO `tbl_siteadmin` (`site_id`, `site_login`, `site_pswd`, `site_info_data`, `site_contact_data`, `site_email_data`, `site_smtp_data`, `site_meta_data`, `site_script_data`, `site_social_data`, `site_og_data`, `site_email_details`, `site_captcha`, `site_theme`) VALUES
(1, 'admin', 'x3x315y554w3y2g4', 'a:6:{s:9:\"site_name\";s:17:\"Discover Pakistan\";s:11:\"site_domain\";s:20:\"discoverpakistan.com\";s:12:\"site_version\";s:3:\"1.0\";s:9:\"site_logo\";s:24:\"image_16310152573229.png\";s:11:\"login_image\";s:24:\"image_16291009109250.jpg\";s:8:\"timezone\";s:12:\"Asia/Karachi\";}', 'a:7:{s:10:\"site_email\";s:24:\"info@discoverpakistan.tv\";s:8:\"site_fax\";s:25:\"info@discoverpakistan.com\";s:10:\"site_phone\";s:14:\"(042) 35975008\";s:11:\"site_phone2\";s:14:\"(042) 35975008\";s:12:\"site_address\";s:48:\"DISCOVER PAKISTAN, PAF Complex, Gulberg, Lahore.\";s:12:\"site_website\";s:20:\"discoverpakistan.com\";s:8:\"site_map\";s:312:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3328.946544938382!2d-94.06796128520016!3d33.450699180773945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86346a0621f5298f%3A0x1bdc246d8b8a08cd!2s3501%20Summerhill%20Rd%2C%20Texarkana%2C%20TX%2075501%2C%20USA!5e0!3m2!1sen!2s!4v1626100657218!5m2!1sen!2s\";}', 'a:6:{s:18:\"site_contact_email\";s:21:\"info@multipurpose.com\";s:23:\"site_contact_email_from\";s:21:\"info@multipurpose.com\";s:21:\"site_contact_auto_sub\";s:29:\"Thank you for considering us.\";s:23:\"site_contact_auto_reply\";s:51:\"This is a response message from Multipurpose CMS...\";s:18:\"site_email_details\";s:75:\"<p><u><strong> Thank you for considering us.</strong></u></p>\r\n<p><br></p>\";s:16:\"site_contact_map\";s:0:\"\";}', 'a:6:{s:11:\"site_driver\";s:4:\"mail\";s:14:\"site_mail_host\";s:20:\"discoverpakistan.com\";s:14:\"site_mail_port\";s:2:\"21\";s:18:\"site_mail_username\";s:16:\"discoverpakistan\";s:18:\"site_mail_password\";s:5:\"admin\";s:20:\"site_mail_incription\";s:16:\"discoverpakistan\";}', 'a:5:{s:15:\"site_meta_title\";s:17:\"Discover Pakistan\";s:21:\"site_meta_description\";s:100:\"Discover Pakistan Provides You The Best Opportunities To Explore And Grow In You Career And Society.\";s:18:\"site_meta_keywords\";s:85:\"Discover Pakistan, Business Opportunities, Products, Buy And Sell, Events, Blog, Jobs\";s:19:\"site_meta_copyright\";s:57:\"© Copyright 2021 Discover Pakistan, All Rights reserved.\";s:16:\"site_meta_author\";s:16:\"Zairone Solutons\";}', 'a:2:{s:21:\"site_meta_script_head\";s:0:\"\";s:21:\"site_meta_script_body\";s:0:\"\";}', 'a:5:{s:13:\"site_facebook\";s:25:\"https://www.facebook.com/\";s:12:\"site_twitter\";s:24:\"https://www.twitter.com/\";s:10:\"site_skype\";s:22:\"https://www.skype.com/\";s:14:\"site_instagram\";s:26:\"https://www.instagram.com/\";s:14:\"site_pinterest\";s:26:\"https://www.pinterest.com/\";}', 'a:6:{s:13:\"site_og_title\";s:25:\"Prime Cargo International\";s:12:\"site_og_type\";s:7:\"website\";s:13:\"site_og_image\";s:73:\"http://localhost/paperbirdpackaging/uploads/logo/Image_15474478326709.png\";s:18:\"site_og_image_type\";s:10:\"image/jpeg\";s:14:\"site_og_locale\";s:5:\"en_US\";s:19:\"site_og_description\";s:25:\"Prime Cargo International\";}', '', 'a:3:{s:14:\"captcha_status\";s:1:\"1\";s:9:\"admin_key\";s:40:\"6Lf_nWwUAAAAAN_QKbYWwwf0r6DDWct52DoYzETF\";s:10:\"public_key\";s:40:\"6Lf_nWwUAAAAAOWsOO1Uc71lQo8aWGt1p93MlWym\";}', 'de3e16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_texts`
--

CREATE TABLE `tbl_texts` (
  `txt_id` int(11) NOT NULL,
  `txt_type` varchar(50) NOT NULL,
  `txt_data` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  ADD PRIMARY KEY (`prof_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_texts`
--
ALTER TABLE `tbl_texts`
  ADD PRIMARY KEY (`txt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_texts`
--
ALTER TABLE `tbl_texts`
  MODIFY `txt_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
