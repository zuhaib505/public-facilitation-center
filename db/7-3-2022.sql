-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 11:19 AM
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
(1, 'ewfsf', 'nouser@no.com', '1234', NULL, '12343453455', 1, 1),
(2, 'Zuhaib Hassan', 'a@a.com', '1234', NULL, '12343453455', 1, 2),
(3, 'Zuhaib Hassan', 'z@z.com', '1234', NULL, '12343453455', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emails`
--

CREATE TABLE `tbl_emails` (
  `email_id` int(11) NOT NULL,
  `email_from` varchar(100) NOT NULL,
  `email_to` varchar(100) NOT NULL,
  `email_type` varchar(100) NOT NULL,
  `email_subject` varchar(100) NOT NULL,
  `email_body` mediumtext NOT NULL,
  `email_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emails`
--

INSERT INTO `tbl_emails` (`email_id`, `email_from`, `email_to`, `email_type`, `email_subject`, `email_body`, `email_status`) VALUES
(1, 'zuhaibhassan381@gmail.com', 'zuhaibhassan381@gmail.com', 'contact', 'Auto-reply From Fusion Max', '<p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Thank you for inquiring about our services. A team member will contact you soon..</span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Sincerely,</span><br></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Public Facilitation Center</span><br></p>', 1),
(2, 'zuhaibhassan381@gmail.com', 'zuhaibhassan381@gmail.com', 'newsletter', 'Newsletter Subscription!', '<p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Thank you for inquiring about our services. A team member will contact you soon..</span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Sincerely,</span><br></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Public Facilitation Center</span></p>', 1),
(3, 'zuhaibhassan381@gmail.com', 'zuhaibhassan381@gmail.com', 'send-quote', 'Response', '<p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Thank you for inquiring about our new email marketing enterprise application. A team member will contact you tomorrow with a detailed explanation of the product that fits your business need.</span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Thanks again for your inquiry.</span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Sincerely,</span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34); font-family: Muli; font-size: 17px;\"><span style=\"font-family: Arial;\">Public Facilitation Center</span></p>', 1);

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
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `page_id` int(11) NOT NULL,
  `page_type` varchar(255) NOT NULL DEFAULT 'general',
  `page_menu` int(11) NOT NULL DEFAULT 0,
  `page_parent` int(11) NOT NULL DEFAULT 0,
  `page_name` varchar(255) NOT NULL,
  `page_meta_title` varchar(100) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_detail` longtext DEFAULT NULL,
  `page_link` varchar(100) NOT NULL,
  `page_label` int(11) NOT NULL,
  `page_image` varchar(100) NOT NULL,
  `page_thumb` varchar(255) DEFAULT NULL,
  `page_embed_video` text DEFAULT NULL,
  `page_meta_desc` text DEFAULT NULL,
  `page_meta_keywords` text DEFAULT NULL,
  `page_footer` int(11) NOT NULL DEFAULT 0,
  `page_status` int(1) NOT NULL DEFAULT 1,
  `page_modify_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `page_date` datetime NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_id`, `page_type`, `page_menu`, `page_parent`, `page_name`, `page_meta_title`, `page_title`, `page_detail`, `page_link`, `page_label`, `page_image`, `page_thumb`, `page_embed_video`, `page_meta_desc`, `page_meta_keywords`, `page_footer`, `page_status`, `page_modify_date`, `page_date`, `page_order`) VALUES
(1, 'general', 0, 0, 'privacy-policy', 'Public Facilitation Center - Privacy Policy', 'Privacy Policy', '<div class=\"container\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-12\">\r\n                        <div class=\"service-details-wrapper\">\r\n                            <div class=\"title\">\r\n                                <h3>Privacy Policy</h3>\r\n                            </div>\r\n                            <p>We ensure our customers privacy policy so that they can visit through our site without any fear. We are working on the facilitation of humanity and we are pretty much sure about the success of our work and efforts.</p>\r\n                            <div class=\"content-box\">\r\n                                <i class=\"flaticon-mechanic\"></i>\r\n                                <h4>OUR MOTTO</h4>\r\n                                <p>Our motto is to make a easy and advanced environment so that the people of Pakistan get benefits from advanced society.</p>\r\n                                <p>We ensure you data integrity and safety. You can communicate through our site without any fear.</p>\r\n                            </div>\r\n\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>', 'privacy-policy', 0, '', NULL, NULL, '', '', 0, 1, '2022-04-09 09:17:35', '2022-03-30 07:14:35', 1),
(2, 'general', 0, 0, 'terms-conditions', 'Public Facilitation Center - Terms & Conditions', 'Terms & Conditions', '<div class=\"container\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-12\">\r\n                        <div class=\"service-details-wrapper\">\r\n                            <div class=\"title\">\r\n                                <h3>TERMS &amp; CONDITIONS</h3>\r\n                            </div>\r\n                            <p>We ensure our customers privacy policy so that they can visit through our site without any fear. We are working on the facilitation of humanity and we are pretty much sure about the success of our work and efforts.</p>\r\n                            <div class=\"content-box\">\r\n                                <i class=\"flaticon-mechanic\"></i>\r\n                                <h4>OUR Terms And Conditions</h4>\r\n                                <p>Our motto is to make a easy and advanced environment so that the people of Pakistan get benefits from advanced society.</p>\r\n                                <p>We ensure you data integrity and safety. You can communicate through our site without any fear.</p>\r\n                            </div>\r\n\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>', 'terms-conditions', 0, '', NULL, NULL, '', '', 0, 1, '2022-04-09 09:18:45', '2022-03-30 07:16:36', 2);

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
  `service_detail` longtext DEFAULT NULL,
  `service_status` int(1) NOT NULL,
  `service_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_slug`, `service_title`, `service_icon`, `service_short_desc`, `service_detail`, `service_status`, `service_order`) VALUES
(1, 'education', 'EDUCATION', 'fas fa-book', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', NULL, 1, 1),
(2, 'car-repairing', 'CAR REPAIRING', 'flaticon-car-service', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', NULL, 1, 2),
(3, 'bike-repairing', 'BIKE REPAIRING', 'flaticon-mechanic', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', NULL, 1, 3),
(4, 'electric-appliances-repairing', 'ELECTRIC APPLIANCES REPAIRING', 'fas fa-tools', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', '<p><span style=\"font-size: 15px;\">consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.</span><br></p>', 1, 4);

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
(1, 'admin', 'x3x315y554w3y2g4', 'a:6:{s:9:\"site_name\";s:26:\"Public Facilitation Center\";s:11:\"site_domain\";s:28:\"publicfacilitationcenter.com\";s:12:\"site_version\";s:3:\"1.0\";s:9:\"site_logo\";s:24:\"image_16486506058904.png\";s:11:\"login_image\";s:24:\"image_16487144985174.jpg\";s:8:\"timezone\";s:12:\"Asia/Karachi\";}', 'a:7:{s:10:\"site_email\";s:25:\"zuhaibhassan381@gmail.com\";s:8:\"site_fax\";s:25:\"zuhaibhassan381@gmail.com\";s:10:\"site_phone\";s:16:\"(+92) 3001234567\";s:11:\"site_phone2\";s:16:\"(+92) 3001234567\";s:12:\"site_address\";s:20:\"PAKISTAN , ISLAMABAD\";s:12:\"site_website\";s:0:\"\";s:8:\"site_map\";s:312:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3328.946544938382!2d-94.06796128520016!3d33.450699180773945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86346a0621f5298f%3A0x1bdc246d8b8a08cd!2s3501%20Summerhill%20Rd%2C%20Texarkana%2C%20TX%2075501%2C%20USA!5e0!3m2!1sen!2s!4v1626100657218!5m2!1sen!2s\";}', 'a:6:{s:18:\"site_contact_email\";s:21:\"info@multipurpose.com\";s:23:\"site_contact_email_from\";s:21:\"info@multipurpose.com\";s:21:\"site_contact_auto_sub\";s:29:\"Thank you for considering us.\";s:23:\"site_contact_auto_reply\";s:51:\"This is a response message from Multipurpose CMS...\";s:18:\"site_email_details\";s:75:\"<p><u><strong> Thank you for considering us.</strong></u></p>\r\n<p><br></p>\";s:16:\"site_contact_map\";s:0:\"\";}', 'a:6:{s:11:\"site_driver\";s:4:\"mail\";s:14:\"site_mail_host\";s:27:\"publicfacilitaioncenter.com\";s:14:\"site_mail_port\";s:2:\"21\";s:18:\"site_mail_username\";s:23:\"publicfacilitaioncenter\";s:18:\"site_mail_password\";s:5:\"admin\";s:20:\"site_mail_incription\";s:23:\"publicfacilitaioncenter\";}', 'a:5:{s:15:\"site_meta_title\";s:17:\"Discover Pakistan\";s:21:\"site_meta_description\";s:100:\"Discover Pakistan Provides You The Best Opportunities To Explore And Grow In You Career And Society.\";s:18:\"site_meta_keywords\";s:85:\"Discover Pakistan, Business Opportunities, Products, Buy And Sell, Events, Blog, Jobs\";s:19:\"site_meta_copyright\";s:57:\"© Copyright 2021 Discover Pakistan, All Rights reserved.\";s:16:\"site_meta_author\";s:16:\"Zairone Solutons\";}', 'a:2:{s:21:\"site_meta_script_head\";s:0:\"\";s:21:\"site_meta_script_body\";s:0:\"\";}', 'a:5:{s:13:\"site_facebook\";s:25:\"https://www.facebook.com/\";s:12:\"site_twitter\";s:24:\"https://www.twitter.com/\";s:10:\"site_skype\";s:22:\"https://www.skype.com/\";s:14:\"site_instagram\";s:26:\"https://www.instagram.com/\";s:14:\"site_pinterest\";s:26:\"https://www.pinterest.com/\";}', 'a:6:{s:13:\"site_og_title\";s:25:\"Prime Cargo International\";s:12:\"site_og_type\";s:7:\"website\";s:13:\"site_og_image\";s:73:\"http://localhost/paperbirdpackaging/uploads/logo/Image_15474478326709.png\";s:18:\"site_og_image_type\";s:10:\"image/jpeg\";s:14:\"site_og_locale\";s:5:\"en_US\";s:19:\"site_og_description\";s:25:\"Prime Cargo International\";}', '', 'a:3:{s:14:\"captcha_status\";s:1:\"1\";s:9:\"admin_key\";s:40:\"6Lf_nWwUAAAAAN_QKbYWwwf0r6DDWct52DoYzETF\";s:10:\"public_key\";s:40:\"6Lf_nWwUAAAAAOWsOO1Uc71lQo8aWGt1p93MlWym\";}', 'de3e16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(100) DEFAULT NULL,
  `sub_status` int(1) NOT NULL,
  `sub_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `tbl_texts`
--

INSERT INTO `tbl_texts` (`txt_id`, `txt_type`, `txt_data`) VALUES
(1, 'header', 'a:4:{s:5:\"text1\";s:7:\"SERVICE\";s:5:\"link1\";s:7:\"service\";s:5:\"text2\";s:13:\"PROFESSIONALS\";s:5:\"link2\";s:13:\"professionals\";}'),
(2, 'footer', 'a:1:{s:14:\"text_copyright\";s:47:\"@copy 2022 <span>PFS</span>. All Right Reserved\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_profile_image` varchar(255) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_order` int(11) NOT NULL,
  `user_login_session` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_profile_image`, `user_name`, `user_username`, `user_email`, `user_contact`, `user_password`, `user_city`, `user_location`, `service_id`, `user_status`, `user_order`, `user_login_session`) VALUES
(1, 'image_16476104374164.png', 'Green Fields', 'testuser', 'green@gmail.com', '0300 1234567', 'l3u3s446m3a373g4', 'Islamabad', 'Pakistan , Islamabad', 1, 1, 1, '1647265315'),
(3, 'image_16486474323090.jpg', 'Ali Hassan', NULL, 'ali@gmail.com', '03001234567', 'l3u3s446m3d3v354v4v4p5g4', 'Islamabad', 'Pakistan , Islamabad', 2, 1, 2, NULL),
(4, 'image_16486472417851.jpg', 'Dummy User', NULL, 'dummy@gmail.com', '03001234567', 'l3u3s446m3a373g4', 'Sargodha', 'Pakistan , Sargodha', 3, 1, 3, NULL),
(5, 'image_16487143881841.jpg', 'Zuhaib Hassan', 'zuhaib', 'zuhaib@gmail.com', '03001234567', 'l3u3s446m3a373g4', 'Islamabad', 'Pakistan , Islamabad', 1, 1, 4, NULL),
(6, 'image_16487208232015.jpg', 'Ghayoor Abbas', NULL, 'g@gmail.com', '03001234567', 'l3u3s446m3a373g4', NULL, NULL, 1, 1, 5, NULL),
(7, 'image_16487210629648.jpg', 'Ghayoor Abbas', NULL, 'ghayoor@gmail.com', '03001234567', 'l3u3s446m3a373g4', NULL, NULL, 1, 1, 6, NULL),
(9, 'image_16490026963766.jpg', 'Ali Hassan', NULL, 'a@a.com', '03001234567', 'l3u3s446m3a373g4', NULL, NULL, 1, 1, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_services`
--

CREATE TABLE `tbl_user_services` (
  `us_id` int(11) NOT NULL,
  `us_slug` varchar(255) DEFAULT NULL,
  `us_title` varchar(255) DEFAULT NULL,
  `us_pkg` varchar(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `us_ext_charges` varchar(255) DEFAULT NULL,
  `us_detail` text DEFAULT NULL,
  `us_image` varchar(255) DEFAULT NULL,
  `us_status` int(1) NOT NULL,
  `us_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_services`
--

INSERT INTO `tbl_user_services` (`us_id`, `us_slug`, `us_title`, `us_pkg`, `user_id`, `us_ext_charges`, `us_detail`, `us_image`, `us_status`, `us_order`) VALUES
(1, 'science-tution', 'Science Tution', '100', 1, '10', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 'image_16473273379019.png', 1, 1),
(5, 'home-tution', 'Home Tution', '100', 1, '10', 'consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.', 'image_16473274767487.png', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`page_id`);

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
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_texts`
--
ALTER TABLE `tbl_texts`
  ADD PRIMARY KEY (`txt_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_services`
--
ALTER TABLE `tbl_user_services`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_texts`
--
ALTER TABLE `tbl_texts`
  MODIFY `txt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_services`
--
ALTER TABLE `tbl_user_services`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
