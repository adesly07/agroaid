-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2020 at 04:21 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epr`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(100) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `b_name`, `c_by`, `ip`) VALUES
(10, 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(11, 'Batch B', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `chicks`
--

CREATE TABLE IF NOT EXISTS `chicks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `c_type` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chicks`
--

INSERT INTO `chicks` (`id`, `c_type`, `batch`, `c_by`, `ip`) VALUES
(1, 'Broilers', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Layers', 'Batch A', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `create_login`
--

CREATE TABLE IF NOT EXISTS `create_login` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `section` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `create_login`
--

INSERT INTO `create_login` (`cid`, `name`, `username`, `password`, `section`) VALUES
(2, 'Adedigba Sylvester', 'sly', 'sly', 'Administrator'),
(11, 'Mary Adedigba', 'mary', 'mary', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `dispense`
--

CREATE TABLE IF NOT EXISTS `dispense` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `d_no` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `s_by` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `s_time` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dispense`
--

INSERT INTO `dispense` (`id`, `batch`, `d_no`, `type`, `quantity`, `r_name`, `day`, `month`, `year`, `s_by`, `s_date`, `s_time`, `ip`, `p_status`) VALUES
(1, 'Batch A', '802198253', 'House nylon', '2', 'Ayoola', 'Sun', 'Jun', '2020', 'Adedigba Sylvester', '28/06/2020', '13:30:56', '127.0.0.1', 'DISPENSED'),
(2, 'Batch A', '21969', 'House nylon', '1', 'Stephen Ayoolu', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '29/06/2020', '17:05:39', '127.0.0.1', 'DISPENSED');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `f_type` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `f_type`, `batch`, `c_by`, `ip`) VALUES
(1, 'Growers Mash', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Chick & Duck Mash', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(3, 'Layers Mash', 'Batch A', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `f_activities`
--

CREATE TABLE IF NOT EXISTS `f_activities` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(100) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `f_activities`
--

INSERT INTO `f_activities` (`id`, `m_name`, `c_by`, `ip`) VALUES
(4, 'Adelabu Joseph', 'Adedigba Sylvester', '127.0.0.1'),
(5, 'Mark Joe', 'Adedigba Sylvester', '127.0.0.1'),
(6, 'Samuel Gbenga', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `f_mgt`
--

CREATE TABLE IF NOT EXISTS `f_mgt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `f_date` varchar(20) NOT NULL,
  `f_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `f_used` varchar(50) NOT NULL,
  `f_qty` varchar(20) NOT NULL,
  `a_stock` varchar(50) NOT NULL,
  `mortality` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `f_mgt`
--

INSERT INTO `f_mgt` (`id`, `batch`, `f_date`, `f_time`, `p_name`, `b_type`, `f_used`, `f_qty`, `a_stock`, `mortality`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '29/06/2020', '07:52:23', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '24', '2476', '5', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Batch A', '29/06/2020', '07:57:54', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '10', '2466', '3', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1'),
(3, 'Batch B', '29/06/2020', '07:59:22', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '20', '2446', '1', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `f_mgt2`
--

CREATE TABLE IF NOT EXISTS `f_mgt2` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `f_date` varchar(20) NOT NULL,
  `f_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `f_used` varchar(50) NOT NULL,
  `f_qty` varchar(20) NOT NULL,
  `a_stock` varchar(50) NOT NULL,
  `mortality` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `f_mgt2`
--

INSERT INTO `f_mgt2` (`id`, `batch`, `f_date`, `f_time`, `p_name`, `b_type`, `f_used`, `f_qty`, `a_stock`, `mortality`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '29/06/2020', '07:52:23', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '24', '2476', '5', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Batch A', '29/06/2020', '07:57:54', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '10', '2466', '3', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1'),
(3, 'Batch B', '29/06/2020', '07:59:22', 'Pen 1', 'Broilers', 'Chick & Duck Mash', '20', '2446', '1', 'Satisfactory', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `f_scheduling`
--

CREATE TABLE IF NOT EXISTS `f_scheduling` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `s_day` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `f_scheduling`
--

INSERT INTO `f_scheduling` (`id`, `m_name`, `batch`, `s_day`, `c_by`, `ip`) VALUES
(4, 'Adelabu Joseph', 'Batch A', 'Sun', 'Adedigba Sylvester', '127.0.0.1'),
(5, 'Adelabu Joseph', 'Batch A', 'Mon', 'Adedigba Sylvester', '127.0.0.1'),
(6, 'Adelabu Joseph', 'Batch A', 'Tue', 'Adedigba Sylvester', '127.0.0.1'),
(7, 'Adelabu Joseph', 'Batch A', 'Thur', 'Adedigba Sylvester', '127.0.0.1'),
(8, 'Adelabu Joseph', 'Batch A', 'Fri', 'Adedigba Sylvester', '127.0.0.1'),
(9, 'Adelabu Joseph', 'Batch A', 'Sat', 'Adedigba Sylvester', '127.0.0.1'),
(10, 'Mark Joe', 'Batch A', 'Sun', 'Adedigba Sylvester', '127.0.0.1'),
(11, 'Mark Joe', 'Batch A', 'Mon', 'Adedigba Sylvester', '127.0.0.1'),
(12, 'Samuel Gbenga', 'Batch A', 'Mon', 'Adedigba Sylvester', '127.0.0.1'),
(13, 'Samuel Gbenga', 'Batch A', 'Wed', 'Adedigba Sylvester', '127.0.0.1'),
(14, 'Mark Joe', 'Batch A', 'Wed', 'Adedigba Sylvester', '127.0.0.1'),
(15, 'Mark Joe', 'Batch A', 'Thur', 'Adedigba Sylvester', '127.0.0.1'),
(16, 'Samuel Gbenga', 'Batch A', 'Thur', 'Adedigba Sylvester', '127.0.0.1'),
(17, 'Mark Joe', 'Batch A', 'Fri', 'Adedigba Sylvester', '127.0.0.1'),
(18, 'Samuel Gbenga', 'Batch A', 'Fri', 'Adedigba Sylvester', '127.0.0.1'),
(19, 'Mark Joe', 'Batch A', 'Sat', 'Adedigba Sylvester', '127.0.0.1'),
(20, 'Samuel Gbenga', 'Batch A', 'Sat', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE IF NOT EXISTS `medication` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `m_type` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `m_type`, `batch`, `c_by`, `ip`) VALUES
(1, 'Piperazine', 'Batch A', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `m_mgt`
--

CREATE TABLE IF NOT EXISTS `m_mgt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `m_date` varchar(20) NOT NULL,
  `m_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `m_used` varchar(50) NOT NULL,
  `apply_to` varchar(20) NOT NULL,
  `b_no` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `m_mgt`
--

INSERT INTO `m_mgt` (`id`, `batch`, `m_date`, `m_time`, `p_name`, `b_type`, `m_used`, `apply_to`, `b_no`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '27/06/2020', '20:45:11', 'Pen 1', 'Broilers', 'Piperazine', 'Some', '1300', 'Satisfactory', 'Sat', 'Jun', '2020', 'Mary Adedigba', '192.168.43.1');

-- --------------------------------------------------------

--
-- Table structure for table `m_mgt2`
--

CREATE TABLE IF NOT EXISTS `m_mgt2` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `m_date` varchar(20) NOT NULL,
  `m_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `m_used` varchar(50) NOT NULL,
  `apply_to` varchar(20) NOT NULL,
  `b_no` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `m_mgt2`
--

INSERT INTO `m_mgt2` (`id`, `batch`, `m_date`, `m_time`, `p_name`, `b_type`, `m_used`, `apply_to`, `b_no`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '27/06/2020', '20:45:11', 'Pen 1', 'Broilers', 'Piperazine', 'Some', '1300', 'Satisfactory', 'Sat', 'Jun', '2020', 'Mary Adedigba', '192.168.43.1');

-- --------------------------------------------------------

--
-- Table structure for table `pen`
--

CREATE TABLE IF NOT EXISTS `pen` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pen`
--

INSERT INTO `pen` (`id`, `p_name`, `c_by`, `ip`) VALUES
(6, 'Pen 1', 'Adedigba Sylvester', '127.0.0.1'),
(7, 'Pen 2', 'Adedigba Sylvester', '127.0.0.1'),
(8, 'Pen 3', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `r_no` varchar(20) NOT NULL,
  `s_item` varchar(100) NOT NULL,
  `item` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `s_by` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `s_time` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `batch`, `p_name`, `r_no`, `s_item`, `item`, `size`, `quantity`, `rate`, `amount`, `discount`, `day`, `month`, `year`, `s_by`, `s_date`, `s_time`, `ip`, `p_status`) VALUES
(1, 'Batch A', 'Pen 1', '550289599', 'Broiler', 'Broiler 1.5kg', '1.5', '25', '1900', '47500', '100', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '29/06/2020', '15:51:38', '127.0.0.1', 'PAID'),
(2, 'Batch A', 'Pen 1', '550289599', 'Broiler', 'Broiler 1.5kg', '1.5', '48', '2000', '96000', '', 'Mon', 'Jun', '2020', 'Adedigba Sylvester', '29/06/2020', '15:59:19', '127.0.0.1', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

CREATE TABLE IF NOT EXISTS `sales_item` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `s_type` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`id`, `s_type`, `batch`, `c_by`, `ip`) VALUES
(1, 'Cock', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Eggs', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(3, 'Layer', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(4, 'Broiler', 'Batch A', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `p_location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `p_location`) VALUES
(1, 'FarmKonnect Agribusiness Nigeria Limited', 'Poultry House 1');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `u_price` varchar(20) NOT NULL,
  `t_amt` varchar(20) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `batch`, `category`, `type`, `p_name`, `quantity`, `unit`, `u_price`, `t_amt`, `s_date`, `c_by`, `ip`) VALUES
(1, 'Batch A', 'Feeds', 'Chick & Duck Mash', '', '100', 'Bag', '3500', '350000', '27/06/2020', 'Mary Adedigba', '192.168.43.1'),
(2, 'Batch A', 'Chicks', 'Broilers', 'Pen 1', '5000', 'Day Old', '100', '500000', '27/06/2020', 'Mary Adedigba', '192.168.43.1'),
(3, 'Batch A', 'Vaccine', 'Fowl Cholera', '', '20', '200', '2000', '40000', '27/06/2020', 'Mary Adedigba', '192.168.43.1'),
(4, 'Batch A', 'Medication', 'Piperazine', '', '10', '30', '1500', '15000', '27/06/2020', 'Mary Adedigba', '192.168.43.1'),
(5, 'Batch A', 'Miscellaneous', 'House nylon', '', '10', 'House nylon', '500', '500', '27/06/2020', 'Mary Adedigba', '192.168.43.1'),
(6, 'Batch B', 'Chicks1', 'Broilers', 'Pen 1', '2000', 'Day Old', '100', '200000', '29/06/2020', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE IF NOT EXISTS `stock_items` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `s_item` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `t_amt` varchar(50) NOT NULL,
  `s_status` varchar(50) NOT NULL,
  `s_by` varchar(50) NOT NULL,
  `s_date` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `batch`, `p_name`, `s_item`, `item`, `size`, `quantity`, `amount`, `t_amt`, `s_status`, `s_by`, `s_date`, `ip`) VALUES
(1, 'Batch A', 'Pen 1', 'Broiler', 'Broiler 1.5kg', '1.5', '3200', '2000', '6400000', 'STORED', 'Adedigba Sylvester', '29/06/2020', '127.0.0.1'),
(2, 'Batch B', 'Pen 1', 'Broiler', 'Broiler 1kg', '1', '2000', '1500', '3000000', 'STORED', 'Adedigba Sylvester', '29/06/2020', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `s_return`
--

CREATE TABLE IF NOT EXISTS `s_return` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `r_no` varchar(50) NOT NULL,
  `s_item` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `s_by` varchar(100) NOT NULL,
  `s_date` varchar(50) NOT NULL,
  `s_time` varchar(50) NOT NULL,
  `r_user` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `s_return`
--


-- --------------------------------------------------------

--
-- Table structure for table `u_batch`
--

CREATE TABLE IF NOT EXISTS `u_batch` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(20) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `s_date` varchar(100) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `u_batch`
--

INSERT INTO `u_batch` (`id`, `p_name`, `batch`, `s_date`, `c_by`, `ip`) VALUES
(4, 'Pen 1', 'Batch B', '29/06/2020', 'Adedigba Sylvester', '127.0.0.1'),
(3, 'Pen 1', 'Batch A', '29/06/2020', 'Adedigba Sylvester', '127.0.0.1'),
(5, 'Pen 2', 'Batch A', '29/06/2020', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE IF NOT EXISTS `vaccine` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `v_type` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `v_type`, `batch`, `c_by`, `ip`) VALUES
(1, 'Fowl Cholera', 'Batch A', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Fowl Pox', 'Batch A', 'Adedigba Sylvester', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `v_mgt`
--

CREATE TABLE IF NOT EXISTS `v_mgt` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `v_date` varchar(20) NOT NULL,
  `v_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `v_used` varchar(50) NOT NULL,
  `apply_to` varchar(20) NOT NULL,
  `b_no` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `v_mgt`
--

INSERT INTO `v_mgt` (`id`, `batch`, `v_date`, `v_time`, `p_name`, `b_type`, `v_used`, `apply_to`, `b_no`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '27/06/2020', '20:44:44', 'Pen 1', 'Broilers', 'Fowl Cholera', 'All', 'All', 'Satisfactory', 'Sat', 'Jun', '2020', 'Mary Adedigba', '192.168.43.1');

-- --------------------------------------------------------

--
-- Table structure for table `v_mgt2`
--

CREATE TABLE IF NOT EXISTS `v_mgt2` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `v_date` varchar(20) NOT NULL,
  `v_time` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `v_used` varchar(50) NOT NULL,
  `apply_to` varchar(20) NOT NULL,
  `b_no` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `v_mgt2`
--

INSERT INTO `v_mgt2` (`id`, `batch`, `v_date`, `v_time`, `p_name`, `b_type`, `v_used`, `apply_to`, `b_no`, `comment`, `day`, `month`, `year`, `c_by`, `ip`) VALUES
(1, 'Batch A', '27/06/2020', '20:44:44', 'Pen 1', 'Broilers', 'Fowl Cholera', 'All', 'All', 'Satisfactory', 'Sat', 'Jun', '2020', 'Mary Adedigba', '192.168.43.1');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE IF NOT EXISTS `weight` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `batch` varchar(20) NOT NULL,
  `c_type` varchar(100) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`id`, `batch`, `c_type`, `p_name`, `weight`, `comment`, `s_date`, `c_by`, `ip`) VALUES
(1, 'Batch A', 'Broilers', 'Pen 1', '1.5', 'Weight measurement', '28/06/2020', 'Adedigba Sylvester', '127.0.0.1'),
(2, 'Batch B', 'Broilers', 'Pen 1', '1', 'Satisfactory', '29/06/2020', 'Adedigba Sylvester', '127.0.0.1');
