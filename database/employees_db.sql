-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 06:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `employees_db`

-- CREATE DATABASE IF NOT EXISTS `employees_db`;
-- USE `employees_db`;

-- Table for employees
CREATE TABLE `employees` (
    `employee_id` int NOT NULL AUTO_INCREMENT,
    `department_code` int(11) NOT NULL,
    `employee_fname` varchar(20) NOT NULL,
    `employee_lname` varchar(20) NOT NULL,
    `employee_email` varchar(50) NOT NULL,
    `employee_RPH` int(11) NOT NULL,
    PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
