-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 07:12 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`s_no` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`s_no`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE IF NOT EXISTS `tbl_ads` (
`s_no` int(11) NOT NULL,
  `ad_id` varchar(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `subcategory_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `location` varchar(100) NOT NULL,
  `location_latlng` varchar(200) NOT NULL,
  `territory` varchar(100) NOT NULL,
  `territory_latlng` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `dialCode` varchar(10) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `comp_profile` text NOT NULL,
  `product_dtls` varchar(500) NOT NULL,
  `photos` varchar(150) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `created_at` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`s_no`, `ad_id`, `category_id`, `subcategory_id`, `name`, `company_name`, `address1`, `address2`, `location`, `location_latlng`, `territory`, `territory_latlng`, `country`, `email_id`, `dialCode`, `mobile_number`, `heading`, `comp_profile`, `product_dtls`, `photos`, `created_by`, `is_deleted`, `created_at`) VALUES
(1, 'CFAD0001', 'ADCT0001', 'ADSBCT0001', 'test person', 'test company', 'test address', 'test address two', 'Chandapura', '', 'Karnataka', '', 'India', 'test@gmail.com', '91', '9441294890', 'Test heading of ads', 'test compan profile', 'tst productdeails', '', 'CUST0001', '', '2017-07-22 11:38:26'),
(2, 'CFAD0002', 'ADCT0001', 'ADSBCT0001', 'test person', 'test company', 'address line 1', 'address line 2', 'Kothapet', '', 'Telangana', '', 'India', 'test@gmail.com', '91', '919441294890', 'test ad heading ', 'test compan profile', 'test product details', '', '', '', '2017-07-30 00:29:08'),
(3, 'CFAD0003', 'ADCT0001', 'ADSBCT0002', 'test namet', 'est companyte', 'line onelin', 'etwo', 'Kothapet', '', 'Telangana', '', 'India', 'st@gmail.com', '91', '9441294890', 'test ad headingte', 'st ocmpany profilete', 'st produc', '', '', '', '2017-07-30 00:40:02'),
(4, 'CFAD0004', 'ADCT0001', 'ADSBCT0002', 'test ad headintest', ' comany', 'line oneli', 'ne teo', 'Kothapet', '', 'Telangana', '', 'India', 'test@gmail.com', '91', '8990303456', 'f', 'fafsadsf', 'ssdfs', '', '', '', '2017-07-30 00:42:04'),
(5, 'CFAD0005', 'ADCT0002', 'ADSBCT0001', 'khkhlhgj', 'hgkh', 'line one', 'line two', 'Kothapet', '', 'Telangana', '', 'India', 'k8@j.com', '91', '9789876543', 'hrggkhh', 'jljaslkk;', 'sakdf;', '', '', '', '2017-07-30 00:59:01'),
(6, 'CFAD0006', 'ADCT0001', 'ADSBCT0001', 'dsjflksdsfsf', 'dsfs', 'line oneli', 'neotow', 'Chandapur', '', 'Karnataka', '', 'India', 'd@d.com', '91', '7895367790', 'asdfsafds', 'ffasadf', 'safds', '', '', '', '2017-07-30 01:04:57'),
(7, 'CFAD0007', 'ADCT0001', 'ADSBCT0001', 'kkk', 'klk', 'one', 'two', 'jj', '', 'jkj', '', 'jkju', 't@t.com', '', '9456789987', 'jhukj', 'hn', 'oo', '', 'CUST0001', '', '2017-08-05 17:54:24'),
(8, 'CFAD0008', 'ADCT0001', 'ADSBCT0001', 'kk', 'lkj', 'kkl', 'lkij', 'kiu', '', 'jf', '', 'jfik', 't@t.com', '91', '9876543250', 'hdfg', 'ujhgy', 'ujhu', '', 'CUST0001', '', '2017-08-05 18:05:17'),
(9, 'CFAD0009', 'ADCT0001', 'ADSBCT0001', 'jj', 'k', 'one', 'teo', 'uji', '', 'ijuh', '', 'ik', 'koi@t.com', '91', '9876788767', 'heading', 'profilj', 'iki', '', 'CUST0001', '', '2017-08-05 18:11:51'),
(10, 'CFAD0010', 'ADCT0001', 'ADSBCT0001', 'kk', 'kol', 'onet', 'eo', 'iko', '', 'ko', '', 'ui', 'n@m.com', '91', '9876533509', 'ikoli', 'kol', 'oi', '', 'CUST0001', '', '2017-08-05 18:17:00'),
(11, 'CFAD0011', 'ADCT0001', 'ADSBCT0001', 'kol', 'lok', 'one', 'two', 'lom', '', 'lomk', '', 'injk', 'l@l.com', '91', '9765789678', 'kiolkj', 'oklij', 'ikoju', '', 'CUST0001', '', '2017-08-05 18:22:10'),
(12, 'CFAD0012', 'ADCT0001', 'ADSBCT0001', 'jki', 'olo', 'one', 'two', 'huj', '', 'ujik', '', 'ikji', 't@g.com', '91', '9898988989', 'gred', 'jiko', 'ikol', '', 'CUST0001', '', '2017-08-05 18:28:47'),
(13, 'CFAD0013', 'ADCT0001', 'ADSBCT0001', 'kol', 'olko', 'one', 'twolo', 'iko', '', 'ui', '', 'ikji', 'y@y.com', '91', '9087989807', 'ikol', 'ujk', 'k', '', 'CUST0001', '', '2017-08-05 18:31:03'),
(14, 'CFAD0014', 'ADCT0001', 'ADSBCT0001', 'olpp', 'lok', 'onet', 'wo', 'lok', '', 'ikoo', '', 'ki', 't@t.com', '91', '0989878767', 'ikooj', 'ikoj', 'olkij', '', 'CUST0001', '', '2017-08-05 18:40:06'),
(15, 'CFAD0015', 'ADCT0001', 'ADSBCT0001', 'olo', 'ki', 'one', 'two', 'iki', '', 'ikolo', '', 'kiju', 't@t.com', '91', '0989098987', 'jiko', 'ikol', 'oloki', '', 'CUST0001', '', '2017-08-05 18:57:27'),
(16, 'CFAD0016', 'ADCT0001', 'ADSBCT0001', 'ujik', 'ikui', 'one', 'two', 'ujikikj', '', 'u', '', 'ikol', 't@t.com', '91', '0989778767', 'ikol', 'ikol', 'ikol', '', 'CUST0001', '', '2017-08-05 19:06:27'),
(17, 'CFAD0017', 'ADCT0001', 'ADSBCT0001', 'u', 'uji', 'huj', 'ujik', 'uik', '', 'uik', '', 'ikol', 'uji@t.com', '91', '909786756', 'olikuj', 'ujikol', 'ujikyh', '', 'CUST0001', '', '2017-08-05 20:24:01'),
(18, 'CFAD0018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-25 23:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_ad_categories` (
`s_no` int(11) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `created_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_ad_categories`
--

INSERT INTO `tbl_ad_categories` (`s_no`, `category_id`, `name`, `icon`, `is_deleted`, `created_date`) VALUES
(1, 'ADCT0001', 'Mobiles', 'images/icons/9.png', 'yes', '2017-07-22 09:55:01'),
(2, 'ADCT0002', 'Apple', '../images/icons/6.png', 'no', '2017-08-26 06:37:05'),
(3, 'ADCT0003', 'Court', '../images/icons/14.png', 'no', '2017-08-26 06:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad_images`
--

CREATE TABLE IF NOT EXISTS `tbl_ad_images` (
`s_no` int(11) NOT NULL,
  `ad_id` varchar(10) NOT NULL,
  `img` varchar(150) NOT NULL,
  `size` varchar(10) NOT NULL,
  `addedOn` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_ad_images`
--

INSERT INTO `tbl_ad_images` (`s_no`, `ad_id`, `img`, `size`, `addedOn`) VALUES
(1, 'CFAD0002', 'postAd-Pics/CFAD0002(1).jpg', '7119', '2017-07-30 00:29:09'),
(2, 'CFAD0004', 'postAd-Pics/CFAD0004/CFAD0004(1).jpg', '7030', '2017-07-30 00:42:06'),
(3, 'CFAD0005', 'postAd-Pics/CFAD0005/CFAD0005(3).jpg', '7080', '2017-07-30 00:59:01'),
(4, 'CFAD0006', 'postAd-Pics/CFAD0006/CFAD0006(3).jpg', '7206', '2017-07-30 01:04:58'),
(5, 'CFAD0001', 'postAd-Pics/CFAD0001/CFAD0001(1).jpg', '7087', '2017-07-30 22:26:00'),
(6, 'CFAD0009', 'postAd-Pics/CFAD0009/CFAD0009(1).jpg', '7191', '2017-08-05 18:11:56'),
(7, 'CFAD0009', 'postAd-Pics/CFAD0009/CFAD0009(1).jpg', '7191', '2017-08-05 18:11:56'),
(8, 'CFAD0010', 'postAd-Pics/CFAD0010/CFAD0010(1).jpg', '7015', '2017-08-05 18:17:03'),
(9, 'CFAD0010', 'postAd-Pics/CFAD0010/CFAD0010(2).jpg', '6988', '2017-08-05 18:17:03'),
(10, 'CFAD0011', 'postAd-Pics/CFAD0011/CFAD0011(1).jpg', '7087', '2017-08-05 18:22:11'),
(11, 'CFAD0012', 'postAd-Pics/CFAD0012/CFAD0012(1).jpg', '7081', '2017-08-05 18:28:48'),
(12, 'CFAD0012', 'postAd-Pics/CFAD0012/CFAD0012(2).jpg', '7019', '2017-08-05 18:28:48'),
(13, 'CFAD0013', 'postAd-Pics/CFAD0013/CFAD0013(1).jpg', '7081', '2017-08-05 18:31:04'),
(14, 'CFAD0013', 'postAd-Pics/CFAD0013/CFAD0013(2).jpg', '7019', '2017-08-05 18:31:04'),
(15, 'CFAD0014', 'postAd-Pics/CFAD0014/CFAD0014(1).jpg', '7149', '2017-08-05 18:40:07'),
(16, 'CFAD0015', 'postAd-Pics/CFAD0015/CFAD0015(1).jpg', '7057', '2017-08-05 18:57:28'),
(17, 'CFAD0016', 'postAd-Pics/CFAD0016/CFAD0016(1).jpg', '6945', '2017-08-05 19:06:28'),
(18, 'CFAD0016', 'postAd-Pics/CFAD0016/CFAD0016(2).jpg', '7019', '2017-08-05 19:06:28'),
(19, 'CFAD0017', 'postAd-Pics/CFAD0017/CFAD0017(1).jpg', '6096', '2017-08-05 20:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad_subcategories`
--

CREATE TABLE IF NOT EXISTS `tbl_ad_subcategories` (
`s_no` int(11) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `subcategory_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `created_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_ad_subcategories`
--

INSERT INTO `tbl_ad_subcategories` (`s_no`, `category_id`, `subcategory_id`, `name`, `icon`, `is_deleted`, `created_date`) VALUES
(1, 'ADCT0001', 'ADSBCT0001', 'Samsung', '', 'no', '2017-07-22 09:55:52'),
(2, 'ADCT0001', 'ADSBCT0002', 'Used', '', 'yes', '2017-08-23 07:45:21'),
(5, 'ADCT0001', 'ADSBCT0003', 'New', '', 'yes', '2017-08-23 08:06:34'),
(6, 'ADCT0001', 'ADSBCT0004', 'Box', '', 'yes', '2017-08-23 08:07:01'),
(7, 'ADCT0001', 'ADSBCT0005', 'New', '', 'no', '2017-08-23 08:37:24'),
(8, 'ADCT0002', 'ADSBCT0001', 'tet2', '', 'yes', '2018-02-09 00:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amount_collection_from_driver`
--

CREATE TABLE IF NOT EXISTS `tbl_amount_collection_from_driver` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `amount_collected` varchar(100) NOT NULL,
  `on_collected_date` varchar(100) NOT NULL,
  `received_by` varchar(15) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `on_collected_month` varchar(100) NOT NULL,
  `on_collected_year` varchar(100) NOT NULL,
  `due_amount` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_amount_collection_from_driver`
--

INSERT INTO `tbl_amount_collection_from_driver` (`s_no`, `driver_id`, `total_amount`, `amount_collected`, `on_collected_date`, `received_by`, `reference_no`, `on_collected_month`, `on_collected_year`, `due_amount`) VALUES
(1, 'CBDR0009', '1300.67', '20', '02/05/2018 06:00 AM', 'cash', '1234', '02', '2018', '1280.67'),
(2, 'CBDR0009', '1300.67', '100', '02/08/2018 06:30 AM', 'cash', '1234', '02', '2018', '1200.67'),
(3, 'CBDR0009', '1300.67', '50', '02/09/2018 06:30 AM', 'cash', '1234', '02', '2018', '1250.67');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_admin` (
`id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_type` int(25) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bus_admin`
--

INSERT INTO `tbl_bus_admin` (`id`, `username`, `password`, `profile_picture`, `status`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'http://techlabz.in/truebusupdate/admin/assets/uploads/profile_pic/admin/1511772739_man.png', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_agent`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_agent` (
`id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bus_agent`
--

INSERT INTO `tbl_bus_agent` (`id`, `username`, `first_name`, `last_name`, `password`, `company_name`, `address`, `email`, `phone_number`, `city`, `country`, `profile_picture`, `status`, `created_by`) VALUES
(1, 'agent', 'Agent', 'Test', 'b33aed8f3134996703dc39f9a7c95783', 'test', 'test', 'test@gmail.com', '9856321245', 'kochi', 'india', 'http://techlabz.in/truebusupdate/admin/assets/uploads/img/1511772130_images.jpg', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_amenities`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_amenities` (
`id` int(250) NOT NULL,
  `amenities` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_bus_amenities`
--

INSERT INTO `tbl_bus_amenities` (`id`, `amenities`, `status`) VALUES
(1, 'WIFI', 1),
(2, 'Water Bottle', 1),
(3, 'Blankets', 1),
(4, 'Snacks', 1),
(5, 'Charging Point', 1),
(6, 'Movie', 1),
(7, 'Reading Light', 1),
(8, 'Pillow', 1),
(9, 'Personal TV', 1),
(10, 'Track My Bus', 1),
(11, 'Emergency exit', 1),
(12, 'Fire Extinguisher', 1),
(13, 'Hammer (to break glass)', 1),
(14, 'Emergency Contact Number', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_blogs`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_blogs` (
`id` int(40) NOT NULL,
  `block_name` text NOT NULL,
  `blog_content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_blogs`
--

INSERT INTO `tbl_bus_blogs` (`id`, `block_name`, `blog_content`) VALUES
(1, 'Routs&Operators&TicketsSold ', '<div class="clm-1">\r\n<div class="container">\r\n<div class="secssion3">\r\n<div class="row">\r\n<div class="col-md-3"><br class="head-ourcities1" />\r\n<h3 class="head-sec3"><img src="#s#/assets/images/quality.png" alt="" /> <span class="tb_operator1">67000 <small class="smalls">ROUTES<br /></small></span></h3>\r\n<div class="tb_list_offer">\r\n<div class="ofer_list">UPTO RS.100 OFF</div>\r\n<div class="ofer_list_bold">TRAVEL SMART</div>\r\n<div class="ofer_list_normal">Code:RBM120</div>\r\n<div class="ofer_list_normal">Book Using Pay Money</div>\r\n</div>\r\n</div>\r\n<div class="col-md-3">\r\n<h3 class="head-sec3"><img src="#s#/assets/images/reliability.png" alt="" /> <span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span></h3>\r\n<div class="ofer_list">UPTO 70% OFF</div>\r\n<div class="ofer_list_bold">ON HOTELS ACROSS INDIA</div>\r\n<div class="ofer_list_normal">Offer Code:RBRTM120</div>\r\n<div class="ofer_list_normal">&nbsp;</div>\r\n<div class="ofer_list_normal">\r\n<div class="col-md-3">\r\n<h3 class="head-sec3"><img src="#s#/assets/images/quality.png" alt="" /> <span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span></h3>\r\n<div class="tb_list_offer">&nbsp;&nbsp; FLAT Rs.100 OFF\r\n<div class="ofer_list_bold left">&nbsp;&nbsp; red Bus APP OFFER</div>\r\n<div class="ofer_list_normal">&nbsp;&nbsp; book via the redBUS APP</div>\r\n<div class="ofer_list_normal">&nbsp;&nbsp; Code:ERHH54</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="right-section">&nbsp;</div>\r\n<div class="right-section">\r\n<h4 class="tb_head">Top Bus Routers</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n<div class="right-section">\r\n<h4 class="tb_head">Top Cities</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n<h4 class="tb_head">Top Bus Operators</h4>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Bangalore</a></p>\r\n</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Pune to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Hyderabad to Chennai</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Coimbatore to Bangalore </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Chennai to Madurai</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>'),
(2, 'footer ', '<div class="clm-4">\r\n<div class="container">\r\n<div class="secssion6">\r\n<div class="row">\r\n<div class="col-md-9">\r\n<h3 class="head-ourcities2">Follow Us</h3>\r\n<ul class="clm4-list">\r\n<li>\r\n<p class="headlist-para"><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">About TrueBus</a></p>\r\n</li>\r\n<li>FAQ</li>\r\n<li>Careers</li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">TrueBus Coupons</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Contact Us </a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Terms of Use</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">Privacy Policy &nbsp;</a></li>\r\n<li><a href="/shibila/true-bus/CI-admin-structure-adminLTE/">TrueBus on Mobilenew</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>'),
(3, 'Banner Image', '<p>assets/images/images/banner-inner.png</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_board_points`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_board_points` (
`id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `board_point` int(11) NOT NULL,
  `pickup_point` varchar(20) NOT NULL,
  `pickup_time` varchar(20) NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_board_points`
--

INSERT INTO `tbl_bus_board_points` (`id`, `bus_id`, `board_point`, `pickup_point`, `pickup_time`, `landmark`, `address`, `status`) VALUES
(1, 1, 1, 'vytilla', '10:15 AM', 'd', 'sddfff', 1),
(2, 2, 2, 'adimali', '10:15 AM', 'asd', 'sdf', 1),
(3, 3, 3, 'madivala', '03:00 PM', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_booking_details`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_booking_details` (
`id` int(11) NOT NULL,
  `booking_id` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `rout_id` varchar(250) NOT NULL,
  `boarding_point_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `seat_no` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `payment_option` varchar(251) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `booking_date` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_bus_booking_details`
--

INSERT INTO `tbl_bus_booking_details` (`id`, `booking_id`, `amount`, `bus_id`, `rout_id`, `boarding_point_id`, `user_id`, `seat_no`, `payment_status`, `payment_option`, `promo_code`, `booking_date`, `status`) VALUES
(1, 'TRB1501476969-1', '2000', '1', '1', '1', '1', 'C10', 'processing', 'cash', '', '31-07-2017 ', 'Booking'),
(2, 'TRB1501477143', '520', '2', '2', '2', '1', 'E5', '', 'cash', NULL, '10-08-2017 ', ''),
(3, 'TRB1501477144-3', '2000', '1', '1', '1', '1', 'C9', 'processing', 'cash', '', '31-07-2017 ', 'Booking'),
(4, 'TRB1501477707', '520', '2', '2', '2', '1', 'E2', '', 'cash', NULL, '08-08-2017 ', ''),
(5, 'TRB1501477708-5', '2000', '1', '1', '1', '1', 'C7', 'processing', 'cash', '', '31-07-2017 ', 'Booking'),
(6, 'TRB1501477874', '2000', '1', '1', '1', '1', 'C6', '', 'paypal', NULL, '15-08-2017 ', ''),
(7, 'TRB1501477875', '520', '2', '2', '2', '1', 'C2', '', 'paypal', '', '31-07-2017 ', ''),
(8, 'TRB1501823978', '520', '2', '2', '2', '2', 'C5', '', 'cash', NULL, '10-08-2017 ', ''),
(9, 'TRB1501823979-9', '2000', '1', '1', '1', '2', 'C6', 'processing', 'cash', '', '05-08-2017 ', 'Booking'),
(10, 'TRB1506490754-10', '2000', '3', '3', '3', '3', 'D2', 'processing', 'cash', '', '27-09-2017 ', 'Booking'),
(11, 'TRB1511771828-11', '2000', '3', '3', '3', '1', 'D9', 'Cancelled', 'cash', '', '28-11-2017 ', 'Cancelled'),
(12, 'TRB1511773924', '2000', '3', '3', '3', '1', 'D4', '', 'cash', '', '28-11-2017 ', ''),
(13, 'TRB1511779149', '2000', '3', '3', '3', '1', 'A1', 'Completed', 'paypal', NULL, '27-11-2017', 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_book_bus`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_book_bus` (
`id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `book_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_bus`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_bus` (
`id` int(11) NOT NULL,
  `bus_name` varchar(20) NOT NULL,
  `bus_type_id` int(11) NOT NULL,
  `amenities_id` varchar(250) NOT NULL,
  `bus_reg_no` varchar(20) NOT NULL,
  `max_seats` int(11) NOT NULL,
  `board_point` varchar(250) NOT NULL,
  `board_time` varchar(20) NOT NULL,
  `drop_point` varchar(20) NOT NULL,
  `drop_time` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `bus_status` int(200) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_bus_bus`
--

INSERT INTO `tbl_bus_bus` (`id`, `bus_name`, `bus_type_id`, `amenities_id`, `bus_reg_no`, `max_seats`, `board_point`, `board_time`, `drop_point`, `drop_time`, `status`, `bus_status`, `created_by`) VALUES
(1, 'KMN', 1, '5', '12212', 40, 'kochi', '10:15 AM', 'munnar', '10:15 AM', 1, 1, 'admin'),
(2, 'MNT', 2, '4', '4545', 20, 'munnar', '10:15 AM', 'kochi', '10:15 AM', 1, 1, 'admin'),
(3, 'Volvo', 1, '4,5', '1234', 45, 'Bangalore', '03:00 PM', 'Kochi', '06:00 AM', 1, 1, 'admin'),
(4, 'Volvo XL', 1, '6', '2563', 40, 'Banglore', '02:30 PM', 'Chennai', '07:30 PM', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_bus_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_bus_gallery` (
`id` int(11) NOT NULL,
  `image` varchar(750) NOT NULL,
  `user_id` int(250) NOT NULL,
  `bus_id` int(250) NOT NULL,
  `created_by` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_bus_type`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_bus_type` (
`id` int(11) NOT NULL,
  `bus_type` varchar(20) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_bus_type`
--

INSERT INTO `tbl_bus_bus_type` (`id`, `bus_type`, `status`) VALUES
(1, 'AC', '1'),
(2, 'Non AC', '1'),
(3, 'sleeper', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_cancellation`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_cancellation` (
`id` int(11) NOT NULL,
  `bus_id` varchar(11) NOT NULL,
  `advertisement_status` int(250) NOT NULL,
  `cancel_time` varchar(250) NOT NULL,
  `percentage` varchar(11) NOT NULL,
  `flat` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_customer_details`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_customer_details` (
`id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `booking_id` varchar(250) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `seat_no` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_bus_customer_details`
--

INSERT INTO `tbl_bus_customer_details` (`id`, `customer_name`, `age`, `mobile`, `email`, `gender`, `booking_id`, `order_id`, `seat_no`) VALUES
(1, 'anju', '25', '9856253111', 'anju.techware@gmail.com', 'male', 'TRB1501476969-1', '1', 'C10'),
(2, 'tinu', '24', '7896541234', 'tinuannavarughese@gmail.com', 'male', 'TRB1501477143', '2', 'E5'),
(3, 'tinu', '24', '7896541234', 'tinuannavarughese@gmail.com', 'male', 'TRB1501477144-3', '3', 'C9'),
(4, 'tinu', '24', '7894563215', 'tinuannavarughese@gmail.com', 'female', 'TRB1501477707', '4', 'E2'),
(5, 'tinu', '24', '7894563215', 'tinuannavarughese@gmail.com', 'female', 'TRB1501477708-5', '5', 'C7'),
(6, 'ffghfgh', '20', '7896444425', 'tinuannavarughese@gmail.com', 'female', 'TRB1501477874', '6', 'C6'),
(7, 'ffghfgh', '20', '7896444425', 'tinuannavarughese@gmail.com', 'female', 'TRB1501477875', '7', 'C2'),
(8, 'tinu', '23', '9876545432', 'tinuannavarughese@gmail.com', 'female', 'TRB1501823978', '8', 'C5'),
(9, 'tinu', '23', '9876545432', 'tinuannavarughese@gmail.com', 'female', 'TRB1501823979-9', '9', 'C6'),
(10, 'gdfgdg', '34', '0987654321', 'jojo@gmail.com', 'male', 'TRB1506490754-10', '10', 'D2'),
(11, 'ywera', '25', '3245895623', 'anju.techware@gmail.com', 'male', 'TRB1511771828-11', '11', 'D9'),
(12, 'Jayakrishnan', '25', '9176107417', 'jayakrishnan@techware.co.in', 'male', 'TRB1511773924', '12', 'D4'),
(13, 'Ee', '25', '3625898855', 'anjums.soman@gmail.com', 'male', 'TRB1511779149', '13', 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_drop_points`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_drop_points` (
`id` int(11) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `drop_point` varchar(250) NOT NULL,
  `stoping_point` varchar(250) NOT NULL,
  `drop_time` varchar(250) NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_drop_points`
--

INSERT INTO `tbl_bus_drop_points` (`id`, `bus_id`, `drop_point`, `stoping_point`, `drop_time`, `landmark`, `address`, `status`) VALUES
(1, '1', '1', 'Adimali', '10:15 AM', 'xzfcgg', 'fg', 1),
(2, '2', '2', 'vytilla', '10:15 AM', 'sdff', 'zdf', 1),
(3, '3', '3', 'Aluva', '06:00 AM', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_promo_details`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_promo_details` (
`id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `expire_date` date NOT NULL,
  `status` int(100) NOT NULL DEFAULT '0',
  `created_by` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_rating` (
`id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `bus_quality` varchar(250) NOT NULL,
  `punctuality` varchar(250) NOT NULL,
  `Staff_behaviour` varchar(250) NOT NULL,
  `average` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_route`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_route` (
`id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `board_point` varchar(20) NOT NULL,
  `board_time` varchar(20) NOT NULL,
  `drop_point` varchar(20) NOT NULL,
  `drop_time` varchar(20) NOT NULL,
  `fare` int(11) NOT NULL,
  `status` int(200) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_route`
--

INSERT INTO `tbl_bus_route` (`id`, `bus_id`, `board_point`, `board_time`, `drop_point`, `drop_time`, `fare`, `status`, `created_by`) VALUES
(1, 1, 'kochi', '10:15 AM', 'munnar', '10:15 AM', 2000, 1, 'admin'),
(2, 2, 'munnar', '10:15 AM', 'kochi', '10:15 AM', 520, 1, 'admin'),
(3, 3, 'Bangalore', '03:00 PM', 'Kochi', '06:00 AM', 2000, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_seat_layout`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_seat_layout` (
`id` int(11) NOT NULL,
  `bus_id` varchar(250) NOT NULL,
  `bus_type` varchar(250) NOT NULL,
  `totel_seat` varchar(250) NOT NULL,
  `layout` longtext NOT NULL,
  `layout_type` varchar(250) NOT NULL,
  `last_seat` varchar(250) NOT NULL,
  `no_sleeper` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_seat_layout`
--

INSERT INTO `tbl_bus_seat_layout` (`id`, `bus_id`, `bus_type`, `totel_seat`, `layout`, `layout_type`, `last_seat`, `no_sleeper`) VALUES
(1, '1', 'Seater / Semi sleeper', '40', '{"0":[{"bus":0,"type":"seater","seat_no":"A1"},{"bus":1,"type":"seater","seat_no":"A2"},{"bus":2,"type":"seater","seat_no":"A3"},{"bus":3,"type":"seater","seat_no":"A4"},{"bus":4,"type":"seater","seat_no":"A5"},{"bus":5,"type":"seater","seat_no":"A6"},{"bus":6,"type":"seater","seat_no":"A7"},{"bus":7,"type":"seater","seat_no":"A8"},{"bus":8,"type":"seater","seat_no":"A9"},{"bus":9,"type":"seater","seat_no":"A10"},{"bus":10,"type":"seater","seat_no":"A11"}],"1":[{"bus":11,"type":"seater","seat_no":"B1"},{"bus":12,"type":"seater","seat_no":"B2"},{"bus":13,"type":"seater","seat_no":"B3"},{"bus":14,"type":"seater","seat_no":"B4"},{"bus":15,"type":"seater","seat_no":"B5"},{"bus":16,"type":"seater","seat_no":"B6"},{"bus":17,"type":"seater","seat_no":"B7"},{"bus":18,"type":"seater","seat_no":"B8"},{"bus":19,"type":"seater","seat_no":"B9"},{"bus":20,"type":"seater","seat_no":"B10"},{"bus":21,"type":"seater","seat_no":"B11"}],"2":[{"bus":26,"type":"seater","seat_no":"C1"},{"bus":27,"type":"seater","seat_no":"C2"},{"bus":28,"type":"seater","seat_no":"C3"},{"bus":29,"type":"seater","seat_no":"C4"},{"bus":30,"type":"seater","seat_no":"C5"},{"bus":31,"type":"seater","seat_no":"C6"},{"bus":32,"type":"seater","seat_no":"C7"},{"bus":33,"type":"seater","seat_no":"C8"},{"bus":34,"type":"seater","seat_no":"C9"},{"bus":35,"type":"seater","seat_no":"C10"},{"bus":36,"type":"seater","seat_no":"C11"},{"bus":37,"type":"seater","seat_no":"C12"},{"bus":38,"type":"seater","seat_no":"C13"}],"3":[],"4":[{"bus":35,"type":"seater","seat_no":"E1"},{"bus":36,"type":"seater","seat_no":"E2"},{"bus":37,"type":"seater","seat_no":"E3"},{"bus":38,"type":"seater","seat_no":"E4"},{"bus":39,"type":"seater","seat_no":"E5"}]}', 'layout-3', '5', ''),
(2, '2', 'Sleeper', '20', '{"0":[{"bus":0,"type":"sleeper","seat_no":"A1"},{"bus":1,"type":"sleeper","seat_no":"A2"},{"bus":2,"type":"sleeper","seat_no":"A3"},{"bus":3,"type":"sleeper","seat_no":"A4"},{"bus":4,"type":"sleeper","seat_no":"A5"}],"1":[{"bus":5,"type":"sleeper","seat_no":"B1"},{"bus":6,"type":"sleeper","seat_no":"B2"},{"bus":7,"type":"sleeper","seat_no":"B3"},{"bus":8,"type":"sleeper","seat_no":"B4"},{"bus":9,"type":"sleeper","seat_no":"B5"}],"2":[{"bus":10,"type":"sleeper","seat_no":"C1"},{"bus":11,"type":"sleeper","seat_no":"C2"},{"bus":12,"type":"sleeper","seat_no":"C3"},{"bus":13,"type":"sleeper","seat_no":"C4"},{"bus":14,"type":"sleeper","seat_no":"C5"}],"3":[],"4":[{"bus":15,"type":"sleeper","seat_no":"E1"},{"bus":16,"type":"sleeper","seat_no":"E2"},{"bus":17,"type":"sleeper","seat_no":"E3"},{"bus":18,"type":"sleeper","seat_no":"E4"},{"bus":19,"type":"sleeper","seat_no":"E5"}]}', 'layout-2', '5', ''),
(3, '3', 'Seater / Semi sleeper', '45', '{"0":[{"bus":0,"type":"seater","seat_no":"A1"},{"bus":1,"type":"seater","seat_no":"A2"},{"bus":2,"type":"seater","seat_no":"A3"},{"bus":3,"type":"seater","seat_no":"A4"},{"bus":4,"type":"seater","seat_no":"A5"},{"bus":5,"type":"seater","seat_no":"A6"},{"bus":6,"type":"seater","seat_no":"A7"},{"bus":7,"type":"seater","seat_no":"A8"},{"bus":8,"type":"seater","seat_no":"A9"},{"bus":9,"type":"seater","seat_no":"A10"}],"1":[{"bus":10,"type":"seater","seat_no":"B1"},{"bus":11,"type":"seater","seat_no":"B2"},{"bus":12,"type":"seater","seat_no":"B3"},{"bus":13,"type":"seater","seat_no":"B4"},{"bus":14,"type":"seater","seat_no":"B5"},{"bus":15,"type":"seater","seat_no":"B6"},{"bus":16,"type":"seater","seat_no":"B7"},{"bus":17,"type":"seater","seat_no":"B8"},{"bus":18,"type":"seater","seat_no":"B9"},{"bus":19,"type":"seater","seat_no":"B10"}],"2":[{"bus":20,"type":"seater","seat_no":"C1"},{"bus":21,"type":"seater","seat_no":"C2"},{"bus":22,"type":"seater","seat_no":"C3"},{"bus":23,"type":"seater","seat_no":"C4"},{"bus":24,"type":"seater","seat_no":"C5"},{"bus":25,"type":"seater","seat_no":"C6"},{"bus":26,"type":"seater","seat_no":"C7"},{"bus":27,"type":"seater","seat_no":"C8"},{"bus":28,"type":"seater","seat_no":"C9"},{"bus":29,"type":"seater","seat_no":"C10"}],"3":[{"bus":30,"type":"seater","seat_no":"D1"},{"bus":31,"type":"seater","seat_no":"D2"},{"bus":32,"type":"seater","seat_no":"D3"},{"bus":33,"type":"seater","seat_no":"D4"},{"bus":34,"type":"seater","seat_no":"D5"},{"bus":35,"type":"seater","seat_no":"D6"},{"bus":36,"type":"seater","seat_no":"D7"},{"bus":37,"type":"seater","seat_no":"D8"},{"bus":38,"type":"seater","seat_no":"D9"},{"bus":39,"type":"seater","seat_no":"D10"}],"4":[{"bus":40,"type":"seater","seat_no":"E1"},{"bus":41,"type":"seater","seat_no":"E2"},{"bus":42,"type":"seater","seat_no":"E3"},{"bus":43,"type":"seater","seat_no":"E4"},{"bus":44,"type":"seater","seat_no":"E5"}]}', 'layout-4', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_setting` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `sender_id` varchar(250) NOT NULL,
  `sms_username` varchar(250) NOT NULL,
  `sms_password` varchar(250) NOT NULL,
  `payment_option` varchar(255) DEFAULT NULL,
  `paypal` varchar(250) NOT NULL,
  `paypalid` varchar(251) NOT NULL,
  `app_key` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bus_setting`
--

INSERT INTO `tbl_bus_setting` (`id`, `title`, `logo`, `favicon`, `smtp_username`, `smtp_host`, `smtp_password`, `sender_id`, `sms_username`, `sms_password`, `payment_option`, `paypal`, `paypalid`, `app_key`) VALUES
(1, 'True Bus', 'assets/uploads/logo/1505727848_tb_logo.png', 'assets/uploads/favicons/1495099426_bus1.jpg', 'techware@techlabz.in', 'mail.techlabz.in', 'Ge^RgVKmy#H*', '101', 'manu', '676', 'PayPal,Cash', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'shajeermhmmd@gmail.com', 'my_key');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_user`
--

CREATE TABLE IF NOT EXISTS `tbl_bus_user` (
`id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `image` varchar(80) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `reset_key` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bus_user`
--

INSERT INTO `tbl_bus_user` (`id`, `user_id`, `username`, `password`, `name`, `dob`, `image`, `gender`, `mob`, `reset_key`) VALUES
(1, '', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tester', '', '', '', 5623568956, ''),
(2, '', 'tinuannavarughese@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tinu', '', '', '', 9876543212, ''),
(3, '', 'jojo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'jojo', '', '', '', 987654321, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cab_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_cab_categories` (
`s_no` int(11) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `no_of_seats` varchar(10) NOT NULL,
  `per_km_with_ac` varchar(10) NOT NULL,
  `per_km_without_ac` varchar(10) NOT NULL,
  `min_km_to_charge` varchar(10) NOT NULL,
  `min_charge_with_ac` varchar(10) NOT NULL,
  `min_charge_without_ac` varchar(10) NOT NULL,
  `owner_comm_per_trip` varchar(10) NOT NULL,
  `isRideLaterAvailable` varchar(10) NOT NULL,
  `tax` varchar(10) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `created_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cab_categories`
--

INSERT INTO `tbl_cab_categories` (`s_no`, `category_id`, `name`, `icon`, `no_of_seats`, `per_km_with_ac`, `per_km_without_ac`, `min_km_to_charge`, `min_charge_with_ac`, `min_charge_without_ac`, `owner_comm_per_trip`, `isRideLaterAvailable`, `tax`, `is_deleted`, `created_date`) VALUES
(1, 'CBCT0001', 'Cab', 'cab-pics/CBCT0001.png', '4', '52', '42', '4', '35', '25', '5', '', '18', 'yes', '2018-01-03 20:27:43'),
(2, 'CBCT0002', 'Micro', 'cab-pics/CBCT0002.jpg', '4', '35', '25', '4', '25', '15', '5', '', '18', 'yes', '2018-01-03 20:59:02'),
(3, 'CBCT0003', 'Mini', 'cab-pics/CBCT0003.jpg', '4', '50', '30', '4', '20', '10', '5', 'NO', '18', 'no', '2018-01-03 21:01:54'),
(4, 'CBCT0004', 'Micro', 'cab-pics/CBCT0004.jpg', '4', '70', '40', '5', '50', '35', '5', '', '18', 'yes', '2018-01-07 15:24:46'),
(5, 'CBCT0005', 'Auto', 'cab-pics/CBCT0005.png', '2', '30', '50', '5', '40', '70', '5', 'NO', '18', 'no', '2018-01-07 20:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
`s_no` int(11) NOT NULL,
  `cust_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `isd_code` varchar(10) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `reg_id` varchar(500) NOT NULL,
  `device_id` varchar(150) NOT NULL,
  `notification_status` varchar(10) NOT NULL,
  `web_login_status` varchar(10) NOT NULL,
  `web_logged_in_at` varchar(150) NOT NULL,
  `app_login_status` varchar(10) NOT NULL,
  `app_login_at` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `registered_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_trips`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_trips` (
`s_no` int(11) NOT NULL,
  `booking_id` varchar(15) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `cust_id` varchar(100) NOT NULL,
  `start_place` varchar(500) NOT NULL,
  `startPlace_latlng` varchar(150) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_place` varchar(500) NOT NULL,
  `endPlace_latlng` varchar(150) NOT NULL,
  `end_date` varchar(150) NOT NULL,
  `end_time` varchar(150) NOT NULL,
  `isAcAvailable` varchar(10) NOT NULL,
  `isRideLater` varchar(10) NOT NULL,
  `ride_month` varchar(100) NOT NULL,
  `ride_year` varchar(100) NOT NULL,
  `total_distance` varchar(10) NOT NULL,
  `rideFare` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `total_fee` varchar(10) NOT NULL,
  `verification_code` varchar(20) NOT NULL,
  `owner_commission` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `booked_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_customer_trips`
--

INSERT INTO `tbl_customer_trips` (`s_no`, `booking_id`, `driver_id`, `cust_id`, `start_place`, `startPlace_latlng`, `start_date`, `start_time`, `end_place`, `endPlace_latlng`, `end_date`, `end_time`, `isAcAvailable`, `isRideLater`, `ride_month`, `ride_year`, `total_distance`, `rideFare`, `tax`, `total_fee`, `verification_code`, `owner_commission`, `status`, `feedback`, `booked_date`) VALUES
(1, 'CFCR0001', 'CBDR0009', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-02', '01:07:40', 'Dilsukhnagar, Hyderabad, Telangana, India', '17.3687826,78.5246706', '', '', 'Off', 'no', '02', '2018', '6,8 km', '252', '47.88', '299.88', '402391', '14.994', '', '', '2018-02-02 01:07:40'),
(2, 'CFCR0002', 'CBDR0009', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-02', '01:13:46', 'Dilsukhnagar, Hyderabad, Telangana, India', '17.3687826,78.5246706', '', '', 'false', 'false', '02', '2018', '6,8 km', '252', '47.88', '299.88', '076390', '14.994', '', '', '2018-02-02 01:13:46'),
(3, 'CFCR0003', 'CBDR0009', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-02', '01:14:52', 'Dilsukhnagar, Hyderabad, Telangana, India', '0,0', '', '', 'false', 'false', '02', '2018', '', '25', '4.75', '29.75', '161126', '1.4875', '', '', '2018-02-02 01:14:52'),
(4, 'CFCR0004', 'CBDR0009', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-02', '01:17:10', 'Dilsukhnagar, Hyderabad, Telangana, India', '0,0', '', '', 'true', 'false', '02', '2018', '', '35', '6.65', '41.65', '002011', '2.0825', '', '', '2018-02-02 01:17:10'),
(5, 'CFCR0005', 'CBDR0008', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-03', '0', 'Dilsukhnagar, Hyderabad, Telangana, India', '17.3687826,78.5246706', '', '', 'false', 'true', '02', '2018', '6,8 km', '252', '47.88', '299.88', '635631', '14.994', '', '', '2018-02-02 01:42:15'),
(6, 'CFCR0006', 'CBDR0003', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-03', '0', 'Dilsukhnagar, Hyderabad, Telangana, India', '17.3687826,78.5246706', '', '', 'false', 'true', '02', '2018', '6,8 km', '252', '47.88', '299.88', '728130', '14.994', '', '', '2018-02-03 13:52:09'),
(7, 'CFCR0007', 'CBDR0003', 'CUST0001', 'Nagole, Hyderabad, Telangana, India', '17.3714737,78.5695016', '2018-02-03', '22:00', 'Dilsukhnagar, Hyderabad, Telangana, India', '0,0', '', '', 'false', 'true', '02', '2018', '', '25', '4.75', '29.75', '034252', '1.4875', '', '', '2018-02-03 14:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivers`
--

CREATE TABLE IF NOT EXISTS `tbl_drivers` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `driver_photo` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `locality` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `licence_no` varchar(100) NOT NULL,
  `vehicle_category` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `vehicle_photo` varchar(200) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `is_ac_available` varchar(10) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_ac_no` varchar(100) NOT NULL,
  `IFSCcode` varchar(100) NOT NULL,
  `bank_location` varchar(150) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `other_details` varchar(250) NOT NULL,
  `current_location` varchar(500) NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `is_activated` varchar(10) NOT NULL,
  `duty_status` varchar(10) NOT NULL,
  `is_onRide` varchar(10) NOT NULL,
  `reg_id` varchar(500) NOT NULL,
  `device_id` varchar(150) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `registered_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_drivers`
--

INSERT INTO `tbl_drivers` (`s_no`, `driver_id`, `name`, `mobile_number`, `email_id`, `password`, `driver_photo`, `address`, `locality`, `city`, `state`, `country`, `pincode`, `licence_no`, `vehicle_category`, `vehicle_no`, `vehicle_photo`, `vehicle_name`, `is_ac_available`, `bank_name`, `bank_ac_no`, `IFSCcode`, `bank_location`, `owner_name`, `other_details`, `current_location`, `lattitude`, `longitude`, `is_activated`, `duty_status`, `is_onRide`, `reg_id`, `device_id`, `is_deleted`, `registered_date`) VALUES
(1, 'CBDR0001', 'Test', '1234567895', 'test@gmail.com', '', 'Driver/pics/CBDR0001PC.png', 'test address', 'test locaiton', 'test city', 'test state', 'india', '526985528', '123456789', 'CBCT0001', '325698741', 'Driver/vehicle_pics/CBDR0001VCL.png', 'Maruthi', 'yes', 'ICICI', 'AC1236547895', 'IC1234569', 'Bank Location', 'Self', '', '', '', '', 'yes', '', '', '', '', 'no', '2018-02-06 07:59:46'),
(2, 'CBDR0002', 'Test User Two', '7894561235', 'test2@gmail.com', '', 'Driver/pics/CBDR0002PC.png', 'test address', 'test location', 'test city', 'test state', 'india', '5699875', '98745621', 'CBCT0003', '321456', 'Driver/vehicle_pics/CBDR0002VCL.png', 'Test Vechicl', 'yes', 'SBI', 'AC265974', '9874526', 'Bank Location', 'Self', '', '', '', '', 'yes', '', '', '', '', 'no', '2018-02-06 08:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_activation_tracking`
--

CREATE TABLE IF NOT EXISTS `tbl_driver_activation_tracking` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `activation_status` varchar(100) NOT NULL,
  `on_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_driver_activation_tracking`
--

INSERT INTO `tbl_driver_activation_tracking` (`s_no`, `driver_id`, `activation_status`, `on_date`) VALUES
(1, 'CBDR0001', 'no', '2017-07-19 00:06:51'),
(2, 'CBDR0001', 'yes', '2017-07-19 00:07:10'),
(3, 'CBDR0001', 'yes', '2017-07-19 23:23:12'),
(4, '', 'no', '2018-02-04 11:46:46'),
(5, 'CBDR0001', 'yes', '2018-02-04 11:47:19'),
(6, 'CBDR0001', 'yes', '2018-02-04 11:47:33'),
(7, 'CBDR0001', 'no', '2018-02-04 11:47:56'),
(8, 'CBDR0001', 'yes', '2018-02-04 11:48:18'),
(9, 'CBDR0001', 'no', '2018-02-04 11:49:10'),
(10, 'CBDR0001', 'yes', '2018-02-04 11:49:14'),
(11, 'CBDR0001', 'no', '2018-02-04 11:49:21'),
(12, 'CBDR0001', 'yes', '2018-02-04 11:49:24'),
(13, 'CBDR0001', 'no', '2018-02-04 11:49:30'),
(14, 'CBDR0001', 'yes', '2018-02-04 11:49:35'),
(15, 'CBDR0001', 'no', '2018-02-04 12:53:59'),
(16, 'CBDR0001', 'yes', '2018-02-04 12:54:04'),
(17, 'CBDR0001', 'no', '2018-02-04 12:55:17'),
(18, 'CBDR0001', 'yes', '2018-02-04 12:55:23'),
(19, 'CBDR0001', 'no', '2018-02-04 12:55:31'),
(20, 'CBDR0001', 'yes', '2018-02-04 12:55:36'),
(21, 'CBDR0001', 'no', '2018-02-04 12:56:21'),
(22, 'CBDR0001', 'yes', '2018-02-04 12:56:25'),
(23, 'CBDR0001', 'yes', '2018-02-10 20:54:53'),
(24, 'CBDR0002', 'yes', '2018-02-10 20:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_driver_comments` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `cust_id` varchar(100) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_driver_comments`
--

INSERT INTO `tbl_driver_comments` (`s_no`, `driver_id`, `cust_id`, `booking_id`, `comment`, `comment_date`) VALUES
(1, 'CBDR0001', 'CUST0001', 'CFCR0004', 'test comment', '2017-07-20 00:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_driver_locations` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `location` varchar(200) NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `date` varchar(150) NOT NULL,
  `time` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_driver_locations`
--

INSERT INTO `tbl_driver_locations` (`s_no`, `driver_id`, `location`, `lattitude`, `longitude`, `date`, `time`) VALUES
(1, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-19', '00:12:08'),
(2, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-19', '11:33:33'),
(3, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-19', '23:26:44'),
(4, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-19', '23:30:16'),
(5, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-19', '23:37:36'),
(6, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-20', '00:56:47'),
(7, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-20', '01:02:22'),
(8, 'CBDR0001', 'Bandlaguda X Road, Shivani Nagar Colony, Vijaya Gardens, Nagole, Hyderabad, Telangana 500068, India', '17.37147333333333', '78.5695', '2017-07-20', '01:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_log`
--

CREATE TABLE IF NOT EXISTS `tbl_driver_log` (
`s_no` int(11) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `log_status` varchar(100) NOT NULL,
  `date` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_slides`
--

CREATE TABLE IF NOT EXISTS `tbl_offer_slides` (
`s_no` int(11) NOT NULL,
  `slidename` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `created_date` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_offer_slides`
--

INSERT INTO `tbl_offer_slides` (`s_no`, `slidename`, `url`, `created_date`) VALUES
(1, 'slide1', 'images/Mobile-Offer-Slides/slide1.jpg', '2017-06-21 09:06:20'),
(2, 'slide2', 'images/Mobile-Offer-Slides/slide2.jpg', '2017-06-21 09:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verification_codes`
--

CREATE TABLE IF NOT EXISTS `tbl_verification_codes` (
`s_no` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `verification_code` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_verification_codes`
--

INSERT INTO `tbl_verification_codes` (`s_no`, `mobile`, `verification_code`) VALUES
(1, '1234567890', '927949'),
(2, '8143668149', ''),
(3, '9441294890', '130927'),
(4, '8074346363', '291963');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_ad_categories`
--
ALTER TABLE `tbl_ad_categories`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_ad_images`
--
ALTER TABLE `tbl_ad_images`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_ad_subcategories`
--
ALTER TABLE `tbl_ad_subcategories`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_amount_collection_from_driver`
--
ALTER TABLE `tbl_amount_collection_from_driver`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_bus_admin`
--
ALTER TABLE `tbl_bus_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_agent`
--
ALTER TABLE `tbl_bus_agent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_amenities`
--
ALTER TABLE `tbl_bus_amenities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_blogs`
--
ALTER TABLE `tbl_bus_blogs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_board_points`
--
ALTER TABLE `tbl_bus_board_points`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_booking_details`
--
ALTER TABLE `tbl_bus_booking_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_book_bus`
--
ALTER TABLE `tbl_bus_book_bus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_bus`
--
ALTER TABLE `tbl_bus_bus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_bus_gallery`
--
ALTER TABLE `tbl_bus_bus_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_bus_type`
--
ALTER TABLE `tbl_bus_bus_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_cancellation`
--
ALTER TABLE `tbl_bus_cancellation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_customer_details`
--
ALTER TABLE `tbl_bus_customer_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_drop_points`
--
ALTER TABLE `tbl_bus_drop_points`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_promo_details`
--
ALTER TABLE `tbl_bus_promo_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_rating`
--
ALTER TABLE `tbl_bus_rating`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_route`
--
ALTER TABLE `tbl_bus_route`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_seat_layout`
--
ALTER TABLE `tbl_bus_seat_layout`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_setting`
--
ALTER TABLE `tbl_bus_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bus_user`
--
ALTER TABLE `tbl_bus_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cab_categories`
--
ALTER TABLE `tbl_cab_categories`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_customer_trips`
--
ALTER TABLE `tbl_customer_trips`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_driver_activation_tracking`
--
ALTER TABLE `tbl_driver_activation_tracking`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_driver_comments`
--
ALTER TABLE `tbl_driver_comments`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_driver_locations`
--
ALTER TABLE `tbl_driver_locations`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_driver_log`
--
ALTER TABLE `tbl_driver_log`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_offer_slides`
--
ALTER TABLE `tbl_offer_slides`
 ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_verification_codes`
--
ALTER TABLE `tbl_verification_codes`
 ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_ad_categories`
--
ALTER TABLE `tbl_ad_categories`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ad_images`
--
ALTER TABLE `tbl_ad_images`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_ad_subcategories`
--
ALTER TABLE `tbl_ad_subcategories`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_amount_collection_from_driver`
--
ALTER TABLE `tbl_amount_collection_from_driver`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_admin`
--
ALTER TABLE `tbl_bus_admin`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bus_agent`
--
ALTER TABLE `tbl_bus_agent`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bus_amenities`
--
ALTER TABLE `tbl_bus_amenities`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_bus_blogs`
--
ALTER TABLE `tbl_bus_blogs`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_board_points`
--
ALTER TABLE `tbl_bus_board_points`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_booking_details`
--
ALTER TABLE `tbl_bus_booking_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_bus_book_bus`
--
ALTER TABLE `tbl_bus_book_bus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bus_bus`
--
ALTER TABLE `tbl_bus_bus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_bus_bus_gallery`
--
ALTER TABLE `tbl_bus_bus_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bus_bus_type`
--
ALTER TABLE `tbl_bus_bus_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_cancellation`
--
ALTER TABLE `tbl_bus_cancellation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bus_customer_details`
--
ALTER TABLE `tbl_bus_customer_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_bus_drop_points`
--
ALTER TABLE `tbl_bus_drop_points`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_promo_details`
--
ALTER TABLE `tbl_bus_promo_details`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bus_rating`
--
ALTER TABLE `tbl_bus_rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bus_route`
--
ALTER TABLE `tbl_bus_route`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_seat_layout`
--
ALTER TABLE `tbl_bus_seat_layout`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bus_setting`
--
ALTER TABLE `tbl_bus_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bus_user`
--
ALTER TABLE `tbl_bus_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cab_categories`
--
ALTER TABLE `tbl_cab_categories`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer_trips`
--
ALTER TABLE `tbl_customer_trips`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_driver_activation_tracking`
--
ALTER TABLE `tbl_driver_activation_tracking`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_driver_comments`
--
ALTER TABLE `tbl_driver_comments`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_driver_locations`
--
ALTER TABLE `tbl_driver_locations`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_driver_log`
--
ALTER TABLE `tbl_driver_log`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_offer_slides`
--
ALTER TABLE `tbl_offer_slides`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_verification_codes`
--
ALTER TABLE `tbl_verification_codes`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
