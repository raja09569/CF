-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 07:35 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(17, 'CFAD0017', 'ADCT0001', 'ADSBCT0001', 'u', 'uji', 'huj', 'ujik', 'uik', '', 'uik', '', 'ikol', 'uji@t.com', '91', '909786756', 'olikuj', 'ujikol', 'ujikyh', '', 'CUST0001', '', '2017-08-05 20:24:01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`s_no`, `cust_id`, `first_name`, `last_name`, `isd_code`, `mobile_number`, `email_id`, `picture`, `address`, `city`, `state`, `country`, `reg_id`, `device_id`, `notification_status`, `web_login_status`, `web_logged_in_at`, `app_login_status`, `app_login_at`, `password`, `is_deleted`, `ip_address`, `registered_date`) VALUES
(1, 'CUST0001', 'Test ', 'Name', '91', '9441294890', 'test@gmail.com', 'pics/CUST0001', 'test address', '', '', 'India', '', '', '', '', '', '', '', 'test123', '', '', '2018-02-06 08:08:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_verification_codes`
--

INSERT INTO `tbl_verification_codes` (`s_no`, `mobile`, `verification_code`) VALUES
(1, '1234567890', '927949'),
(2, '8143668149', ''),
(3, '9441294890', '');

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
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
-- AUTO_INCREMENT for table `tbl_cab_categories`
--
ALTER TABLE `tbl_cab_categories`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
