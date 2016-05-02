-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 29, 2016 at 09:38 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `agriculture_db`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `role`
-- 

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(45) default NULL,
  PRIMARY KEY  (`role_id`),
  UNIQUE KEY `role_id_UNIQUE` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `role`
-- 

INSERT INTO `role` (`role_id`, `role_name`) VALUES 
(1, 'Super Admin'),
(2, 'Buyer Manager'),
(3, 'Seller Manager'),
(4, 'Product Manager');

-- --------------------------------------------------------

-- 
-- Table structure for table `role_task`
-- 

CREATE TABLE `role_task` (
  `role_task_id` int(11) NOT NULL auto_increment,
  `role_id` int(11) default NULL,
  `task_id` int(11) default NULL,
  PRIMARY KEY  (`role_task_id`),
  UNIQUE KEY `role_task_id_UNIQUE` (`role_task_id`),
  KEY `role_task_role_id_idx` (`role_id`),
  KEY `role_task_task_id_idx` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `role_task`
-- 

INSERT INTO `role_task` (`role_task_id`, `role_id`, `task_id`) VALUES 
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(7, 2, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `task`
-- 

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL auto_increment,
  `task_name` varchar(45) default NULL,
  PRIMARY KEY  (`task_id`),
  UNIQUE KEY `task_id_UNIQUE` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `task`
-- 

INSERT INTO `task` (`task_id`, `task_name`) VALUES 
(1, 'Manage User Role'),
(2, 'Manage Buyer'),
(3, 'Manage Seller'),
(4, 'Manage User');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `status` int(2) default '1',
  `is_deleted` int(2) default '0',
  `created_by` int(11) default NULL,
  `created_date` datetime default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `status`, `is_deleted`, `created_by`, `created_date`) VALUES 
(1, 'Super', 'Admin', 'super_admin', 'e10adc3949ba59abbe56e057f20f883e', 'super_admin@gmail.com', 1, 0, NULL, NULL),
(2, 'Mayank', 'Sharma', 'mayank', 'e10adc3949ba59abbe56e057f20f883e', 'mayank@gmail.com', 1, 0, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_role`
-- 

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `role_id` int(11) default NULL,
  PRIMARY KEY  (`user_role_id`),
  UNIQUE KEY `user_role_id_UNIQUE` (`user_role_id`),
  KEY `user_role_user_id_idx` (`user_id`),
  KEY `user_role_role_id_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user_role`
-- 

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES 
(1, 1, 1),
(2, 2, 2);

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `role_task`
-- 
ALTER TABLE `role_task`
  ADD CONSTRAINT `role_task_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_task_task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `user`
-- 
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`);

-- 
-- Constraints for table `user_role`
-- 
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_role_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
