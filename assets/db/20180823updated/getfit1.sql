-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2018 at 08:02 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getfit1`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchdetails`
--

CREATE TABLE `branchdetails` (
  `SysID` int(11) NOT NULL,
  `HouseNumber` varchar(20) DEFAULT NULL,
  `Lot` varchar(20) DEFAULT NULL,
  `Block` varchar(20) DEFAULT NULL,
  `Phase` varchar(20) DEFAULT NULL,
  `FloorNumber` varchar(20) DEFAULT NULL,
  `BuildingName` varchar(100) DEFAULT NULL,
  `StreetName` varchar(50) NOT NULL,
  `PurokName` varchar(100) DEFAULT NULL,
  `SubdivisionName` varchar(100) DEFAULT NULL,
  `BarangayName` varchar(100) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `ProvinceName` varchar(100) NOT NULL,
  `RegionName` varchar(100) NOT NULL,
  `CountryName` varchar(100) NOT NULL,
  `ZipCode` varchar(20) NOT NULL,
  `BranchName` varchar(250) DEFAULT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `LandLineNumber` int(11) DEFAULT NULL,
  `MobileNumber` int(11) NOT NULL,
  `ContactPerson` varchar(250) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `BranchStatus` varchar(10) NOT NULL,
  `BranchType` varchar(15) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branchdetails`
--

INSERT INTO `branchdetails` (`SysID`, `HouseNumber`, `Lot`, `Block`, `Phase`, `FloorNumber`, `BuildingName`, `StreetName`, `PurokName`, `SubdivisionName`, `BarangayName`, `CityName`, `ProvinceName`, `RegionName`, `CountryName`, `ZipCode`, `BranchName`, `EmailAddress`, `LandLineNumber`, `MobileNumber`, `ContactPerson`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `BranchStatus`, `BranchType`, `DeleteStatus`) VALUES
(1, '12', '33', '12', '31', '2', 'PBCom', 'Ayala', 'Bell Air', 'Bell Air', 'Bell Air', 'Makati', 'Metro Manila', 'Central Luzon', 'Philippines', '12345', 'Market Market', 'Matthew@gmail.com', 13, 465, 'Matthew', 1, NULL, '2018-08-09', '2018-08-13', 'yes', 'main', 'no'),
(2, '', '', '', '', '', '', '', '', '', 'Bell Air', 'Makati', 'Metro Manila', 'Central Luzon', 'Philippines', 'qwe', 'Makati Makati', 'jojo@gmail.com', 0, 0, 'Jojo Boi', 1, NULL, '2018-08-16', NULL, 'yes', 'franchise', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `gymfranchisedetails`
--

CREATE TABLE `gymfranchisedetails` (
  `SysID` int(11) NOT NULL,
  `InvestAmount` varchar(20) NOT NULL,
  `InvestDate` date NOT NULL,
  `InvestType` varchar(20) NOT NULL,
  `InvestStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `GymFranchiseID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gymfranchiseinquiry`
--

CREATE TABLE `gymfranchiseinquiry` (
  `SysID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `LandLineNumber` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `AmountInvest` varchar(20) NOT NULL,
  `HearAboutUsID` int(11) NOT NULL,
  `DesiredMarket` int(11) NOT NULL,
  `QuestionsComments` varchar(250) NOT NULL,
  `InquiryDateTime` datetime NOT NULL,
  `InquiryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gymfranchiselogin`
--

CREATE TABLE `gymfranchiselogin` (
  `SysID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `MasterDataRoleID` int(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `LandLineNumber` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `PositionID` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `LoginStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL,
  `BranchDetailsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gymloginaccessfunction`
--

CREATE TABLE `gymloginaccessfunction` (
  `SysID` int(11) NOT NULL,
  `ReadandWrite` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gymloginaccessrights`
--

CREATE TABLE `gymloginaccessrights` (
  `SysID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `RoleStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gymmainlogin`
--

CREATE TABLE `gymmainlogin` (
  `SysID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `MasterDataRoleID` int(11) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `LandLineNumber` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `PositionID` int(11) NOT NULL,
  `UserPhoto` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `LoginStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL,
  `BranchDetailsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gymmainlogin`
--

INSERT INTO `gymmainlogin` (`SysID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `MasterDataRoleID`, `UserName`, `Password`, `EmailAddress`, `LandLineNumber`, `MobileNumber`, `PositionID`, `UserPhoto`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `LoginStatus`, `DeleteStatus`, `BranchDetailsID`) VALUES
(1, 'Superadmin', '', 'Superadmin', '', 1, 'superadmin', '$2y$10$h40dqglByNx/R8ULmCOj3e0D1olhW/T..lTmeFA21eoBR5dCUgAsi', 'superadmin@superadmin.com', '13-13-4964', '13-13-4964', 1, 'superadmin.png', 1, 0, '2018-08-09', '2018-08-13', '-', '-', 1),
(2, 'fadmin', '', 'ladmin', '', 2, 'admin', '$2y$10$S6KxC8ficmtlqVQWckeEOe5gUrpNkTradyfG40BaLLRiFvnl6CoyO', 'superadmin1@superadmin.com', NULL, '', 1, 'pass.jpg', 1, 0, '2018-08-14', '0000-00-00', 'yes', 'no', 1),
(3, 'Franchise', '', 'Superadmin', '', 2, 'jose', '$2y$10$FucQyiGiuc.3Dl.VEb9uJObsJpxkFYpEkmBWMRqa0xgDJNdozOYQe', 'qwe@gmail.com', NULL, '', 2, 'password.jpg', 1, 0, '2018-08-14', '0000-00-00', 'yes', 'no', 1),
(4, 'juan', '', 'Superadmin', '', 2, 'juan', '$2y$10$0EsNM0XOYyz1U6u9xhft3eXywV6YsY2kITMPnmwJ/gdgLiU0oCJuu', 'qwe1@gmail.com', NULL, '', 3, '', 1, 0, '2018-08-14', '0000-00-00', 'yes', 'no', 1),
(5, 'User', '', 'Name', '', 1, 'user', '$2y$10$eoAF7Uxm5VueoIDfQ0zycO1/H.tjZBPCSiGT2ORYLTMTQYYv0IjQG', 'user@gmail.com', NULL, '', 3, 'user.jpg', 1, 0, '2018-08-15', '0000-00-00', 'yes', 'no', 1),
(6, 'Pass', '', 'Word', '', 1, 'pass', '$2y$10$ErEpqr2MWi03m8qALpoyYOrZXfhLn7JlfzLsfhcIvg4lncFVBHtc2', 'pass@gmail.com', NULL, '', 3, 'pass.jpg', 1, 0, '2018-08-15', '0000-00-00', 'yes', 'no', 1),
(7, 'Password', '', 'Password', '', 1, 'password', '$2y$10$IeMMpl2oJnWONMcA1r0rSOBGv6NpohWSoELcm9UAtqsgAb8gQINOC', 'password@gmail.com', NULL, '', 3, 'password.jpg', 1, 0, '2018-08-15', '0000-00-00', 'yes', 'no', 1),
(8, 'username', '', 'username', '', 1, 'username', '$2y$10$wYT1KuELVlOMoq0rX2OrN.uhd6fx4kdvl1hibDthUrfrBSw8l.5IC', 'qweqwe@gmail.com', NULL, '', 3, 'username.jpg', 1, 0, '2018-08-15', '0000-00-00', 'yes', 'no', 1),
(9, 'Franchise', 'Admin', 'User', '', 2, 'franchiseadmin', '$2y$10$YyiX0bL9R22DKQCA2.3r0OnsDpvZyfoYK6pUyWYvpHpSw9oeNEI5K', 'qwe@gmail.comqwe', '0', '0', 1, 'download.jpg', 1, 9, '2018-08-16', '2018-08-21', 'yes', 'no', 2),
(10, 'FirstName', '', 'LastName', '', 2, 'firstname', '$2y$10$7rMfI3U5nkB6byjrUzl8E.yPRptfk5eHkPHuz1LB4pk7EAdUYd9o.', 'firstname@gmail.com', NULL, '13-13-4964', 1, 'firstname.png', 1, 0, '2018-08-23', '0000-00-00', 'yes', 'no', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gymmemberinquiry`
--

CREATE TABLE `gymmemberinquiry` (
  `SysID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `EmailAddess` varchar(100) NOT NULL,
  `LandLine` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `InquiryDateTime` datetime NOT NULL,
  `InquiryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `masterdataadminimagegallery`
--

CREATE TABLE `masterdataadminimagegallery` (
  `SysID` int(11) NOT NULL,
  `ImageTitle` varchar(50) NOT NULL,
  `ImageDescription` varchar(250) DEFAULT NULL,
  `ImageLink` varchar(50) NOT NULL,
  `ImageOrderIndex` varchar(10) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `ImageStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdataadminimagegallery`
--

INSERT INTO `masterdataadminimagegallery` (`SysID`, `ImageTitle`, `ImageDescription`, `ImageLink`, `ImageOrderIndex`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `ImageStatus`, `DeleteStatus`) VALUES
(1, 'First Image', 'First Image', 'eff0fa6901a0d675719cff8eac307275.jpg', '1', 1, 1, '2018-08-16', '2018-08-22', 'yes', 'no'),
(2, 'Second Image', 'Second Image', 'c4340f986319b70b8ab500cce47d0cd2.jpg', '2', 1, 1, '2018-08-16', '2018-08-22', 'yes', 'no'),
(3, 'Third Image', 'Third Image', 'e4f114aa56dde880deb134356ce09cbd.png', '2', 1, 0, '2018-08-16', '0000-00-00', 'yes', 'no'),
(4, 'Fourth Image', 'Fourth Image', 'e99e5b737da4c690ab6e74e28d9f22fb.png', '2', 1, 0, '2018-08-16', '0000-00-00', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatabulletinboard`
--

CREATE TABLE `masterdatabulletinboard` (
  `SysID` int(11) NOT NULL,
  `MasterDataBulletinBoardDetailsID` int(11) DEFAULT NULL,
  `EntryShowToBranch` int(11) NOT NULL,
  `ShowToBranchRole` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `EntryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatabulletinboard`
--

INSERT INTO `masterdatabulletinboard` (`SysID`, `MasterDataBulletinBoardDetailsID`, `EntryShowToBranch`, `ShowToBranchRole`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `EntryStatus`, `DeleteStatus`) VALUES
(7, 1, 1, 1, 0, 1, '0000-00-00', '2018-08-21', 'yes', 'no'),
(8, 3, 2, 1, 9, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(9, 3, 2, 2, 9, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(10, 4, 1, 1, 1, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(11, 4, 2, 1, 1, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(12, 2, 1, 2, 1, 1, '2018-08-23', '2018-08-23', 'yes', 'no'),
(13, 2, 2, 2, 1, 1, '2018-08-23', '2018-08-23', 'yes', 'no'),
(14, 2, 1, 1, 1, 1, '2018-08-23', '2018-08-23', 'yes', 'no'),
(15, 2, 2, 1, 1, 1, '2018-08-23', '2018-08-23', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatabulletinboard1`
--

CREATE TABLE `masterdatabulletinboard1` (
  `SysID` int(11) NOT NULL,
  `EntryType` varchar(50) NOT NULL,
  `EntryTitle` varchar(50) NOT NULL,
  `EntryDescription` text,
  `EntryShowToBranch` int(11) NOT NULL,
  `ShowToBranchRole` int(11) NOT NULL,
  `EntryFrom` varchar(50) NOT NULL,
  `EntryOrderIndex` varchar(10) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `EntryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `masterdatabulletinboarddetails`
--

CREATE TABLE `masterdatabulletinboarddetails` (
  `SysID` int(11) NOT NULL,
  `EntryType` varchar(50) NOT NULL,
  `EntryTitle` varchar(50) NOT NULL,
  `EntryDescription` text,
  `EntryFrom` varchar(50) NOT NULL,
  `EntryOrderIndex` varchar(10) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `EntryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatabulletinboarddetails`
--

INSERT INTO `masterdatabulletinboarddetails` (`SysID`, `EntryType`, `EntryTitle`, `EntryDescription`, `EntryFrom`, `EntryOrderIndex`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `EntryStatus`, `DeleteStatus`) VALUES
(1, 'announcement', 'masterdatabulletinboard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.', '2', '2', 1, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(2, 'event', '.length.length.length.length.length', '.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length.length', '', '1', 1, 1, '2018-08-20', '2018-08-23', 'yes', 'no'),
(3, 'announcement', 'Receta 1', 'Keep getting 400 Bad Request error when trying out AJAX on custom ...\nhttps://wordpress.stackexchange.com/.../keep-getting-400-bad-request-error-when-tryi...\n1 answer\nMar 7, 2018 - I figured it out. I deleted two lines: dataType: \'html\', contentType: \'application/json\'. When I deleted those, I got an 200 response with the ...\njquery - AJAX request randomly stop working and returns error ...	17 May 2018\nfunctions - AJAX handler throws 400 (Bad request) - why ...	7 May 2018\nadmin menu - Ajax in plugin settings page returns 400 Bad Request ...	24 Mar 2018\nphp - Ajax return code 400 - WordPress Development Stack ...	3 Jan 2018\nMore results from wordpress.stackexchange.com', '9', '1', 9, 0, '2018-08-21', '0000-00-00', 'yes', 'no'),
(4, 'announcement', 'Superadmin only', 'Get to a healthier place at Anytime Fitness! Our friendly, professional staff are trained to help you along your fitness journey. Membership includes global access to more than 3,500 gyms and over 100 just in the UK, all open 24/7 for your convenience. Our clubs offer you a welcoming club and supportive member community. Visit during staffed hours, email, or call for an appointment today!', '1', '2', 1, 0, '2018-08-21', '0000-00-00', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatamenu`
--

CREATE TABLE `masterdatamenu` (
  `SysID` int(11) NOT NULL,
  `MenuName` varchar(150) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `HasChild` varchar(10) DEFAULT NULL,
  `Link` varchar(150) DEFAULT NULL,
  `FaIcon` varchar(50) DEFAULT 'fa fa-wrench',
  `AddedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedDate` date NOT NULL,
  `MenuStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatamenu`
--

INSERT INTO `masterdatamenu` (`SysID`, `MenuName`, `Description`, `HasChild`, `Link`, `FaIcon`, `AddedBy`, `AddedDate`, `UpdatedBy`, `UpdatedDate`, `MenuStatus`, `DeleteStatus`) VALUES
(1, 'Dashboard', 'dashboard', 'no', 'Welcome', 'fa fa-dashboard', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(2, 'Master Data Management', 'Main Master Data', 'yes', '', 'fa fa-inbox', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(3, 'Main Gym Management', 'Main Gym Management', 'yes', '', 'fa fa-empire', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(4, 'Franchise Gym', 'Franchise Gym Management', 'yes', '', 'fa fa-address-card-o', 1, '2018-08-01', 1, '2018-08-14', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdataposition`
--

CREATE TABLE `masterdataposition` (
  `SysID` int(11) NOT NULL,
  `PositionName` varchar(150) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `PositionStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdataposition`
--

INSERT INTO `masterdataposition` (`SysID`, `PositionName`, `Description`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `PositionStatus`, `DeleteStatus`) VALUES
(1, 'Admin', 'COO', 1, 1, '2018-08-13', '2018-08-13', 'yes', 'no'),
(2, 'CEO', 'CEO', 1, 0, '2018-08-13', '0000-00-00', 'yes', 'no'),
(3, 'COO', 'Admin', 1, 1, '2018-08-13', '2018-08-13', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatarole`
--

CREATE TABLE `masterdatarole` (
  `SysID` int(11) NOT NULL,
  `RoleName` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `RoleAccess` varchar(15) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `RoleStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatarole`
--

INSERT INTO `masterdatarole` (`SysID`, `RoleName`, `Description`, `RoleAccess`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `RoleStatus`, `DeleteStatus`) VALUES
(1, 'Superadmin', 'Super', 'yes', 0, 1, '0000-00-00', '2018-08-23', 'yes', 'no'),
(2, 'admin', 'admin', 'yes', 1, 1, '2018-08-14', '2018-08-23', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatarolemapping`
--

CREATE TABLE `masterdatarolemapping` (
  `SysID` int(11) NOT NULL,
  `MasterDataRoleID` int(11) NOT NULL,
  `ItemNumber` varchar(11) NOT NULL DEFAULT 'none',
  `ItemLevel` varchar(11) DEFAULT NULL,
  `ItemSysID` int(11) DEFAULT NULL,
  `ItemLink` varchar(150) DEFAULT NULL,
  `RoleAccess` varchar(15) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedDate` date NOT NULL,
  `MappingStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatarolemapping`
--

INSERT INTO `masterdatarolemapping` (`SysID`, `MasterDataRoleID`, `ItemNumber`, `ItemLevel`, `ItemSysID`, `ItemLink`, `RoleAccess`, `AddedBy`, `AddedDate`, `UpdatedBy`, `UpdatedDate`, `MappingStatus`, `DeleteStatus`) VALUES
(221, 1, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(222, 1, 'menu_2', 'menu', 2, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(223, 1, 'submenu_1', 'submenu', 1, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(224, 1, 'screen_1', 'screen', 1, 'MasterDataMenu/menulist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(225, 1, 'screen_2', 'screen', 2, 'MasterDataSubMenu/submenulist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(226, 1, 'screen_3', 'screen', 3, 'MasterDataScreen/screenlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(227, 1, 'submenu_2', 'submenu', 2, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(228, 1, 'screen_4', 'screen', 4, 'MasterDataRole/rolelist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(229, 1, 'submenu_5', 'submenu', 5, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(230, 1, 'screen_7', 'screen', 7, 'MasterDataPosition/positionlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(231, 1, 'submenu_8', 'submenu', 8, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(232, 1, 'screen_10', 'screen', 10, 'MasterDataAdminImageGallery/imagelist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(233, 1, 'screen_12', 'screen', 12, 'MasterDataTrainingImage/imagelist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(234, 1, 'submenu_9', 'submenu', 9, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(235, 1, 'screen_11', 'screen', 11, 'MasterDataBulletinBoard/bulletinboardlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(236, 1, 'submenu_10', 'submenu', 10, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(237, 1, 'screen_13', 'screen', 13, 'MasterDataTrainingVideo/videolist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(238, 1, 'menu_3', 'menu', 3, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(239, 1, 'submenu_3', 'submenu', 3, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(240, 1, 'screen_5', 'screen', 5, 'MainUserInformation/mainUserlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(241, 1, 'submenu_4', 'submenu', 4, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(242, 1, 'screen_6', 'screen', 6, 'MainGymInformation/maingymlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(243, 1, 'menu_4', 'menu', 4, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(244, 1, 'submenu_6', 'submenu', 6, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(245, 1, 'screen_8', 'screen', 8, 'FranchiseGymInformation/franchisegymlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(246, 1, 'submenu_7', 'submenu', 7, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(247, 1, 'screen_9', 'screen', 9, 'FranchiseUserInformation/franchiseUserlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(260, 2, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(261, 2, 'menu_2', 'menu', 2, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(262, 2, 'submenu_8', 'submenu', 8, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(263, 2, 'screen_10', 'screen', 10, 'MasterDataAdminImageGallery/imagelist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(264, 2, 'screen_12', 'screen', 12, 'MasterDataTrainingImage/imagelist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(265, 2, 'submenu_9', 'submenu', 9, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(266, 2, 'screen_11', 'screen', 11, 'MasterDataBulletinBoard/bulletinboardlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(267, 2, 'menu_4', 'menu', 4, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(268, 2, 'submenu_7', 'submenu', 7, '', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', ''),
(269, 2, 'screen_9', 'screen', 9, 'FranchiseUserInformation/franchiseUserlist', 'yes', 0, '0000-00-00', 1, '2018-08-23', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatascreen`
--

CREATE TABLE `masterdatascreen` (
  `SysID` int(11) NOT NULL,
  `SubMenuNameID` int(11) NOT NULL,
  `ScreenName` varchar(150) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `Link` varchar(150) DEFAULT NULL,
  `FaIcon` varchar(50) DEFAULT 'fa fa-wrench',
  `AddedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedDate` date NOT NULL,
  `ScreenStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatascreen`
--

INSERT INTO `masterdatascreen` (`SysID`, `SubMenuNameID`, `ScreenName`, `Description`, `Link`, `FaIcon`, `AddedBy`, `AddedDate`, `UpdatedBy`, `UpdatedDate`, `ScreenStatus`, `DeleteStatus`) VALUES
(1, 1, 'Menu List', 'Menu List', 'MasterDataMenu/menulist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(2, 1, 'Submenu List', 'Submenu List', 'MasterDataSubMenu/submenulist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(3, 1, 'Screen List', 'Screen List', 'MasterDataScreen/screenlist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(4, 2, 'Role List', 'Role List', 'MasterDataRole/rolelist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(5, 3, 'Main Gym Users', 'Main Gym Users', 'MainUserInformation/mainUserlist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(6, 4, 'Gym Management', 'Main Gym', 'MainGymInformation/maingymlist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(7, 5, 'Position List', 'List of position', 'MasterDataPosition/positionlist', '', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(8, 6, 'Gym', 'Gym', 'FranchiseGymInformation/franchisegymlist', '', 1, '2018-08-14', 0, '0000-00-00', 'yes', 'no'),
(9, 7, 'Users', 'Users', 'FranchiseUserInformation/franchiseUserlist', '', 1, '2018-08-14', 0, '0000-00-00', 'yes', 'no'),
(10, 8, 'Admin Image Gallery', 'Admin Image Gallery', 'MasterDataAdminImageGallery/imagelist', '', 1, '2018-08-15', 0, '0000-00-00', 'yes', 'no'),
(11, 9, 'Bulletin Board', 'Bulletin Board', 'MasterDataBulletinBoard/bulletinboardlist', '', 1, '2018-08-16', 0, '0000-00-00', 'yes', 'no'),
(12, 8, 'Training Image', 'Training Image', 'MasterDataTrainingImage/imagelist', '', 1, '2018-08-22', 0, '0000-00-00', 'yes', 'no'),
(13, 10, 'Training Video', 'Training Video', 'MasterDataTrainingVideo/videolist', '', 1, '2018-08-22', 0, '0000-00-00', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatasubmenu`
--

CREATE TABLE `masterdatasubmenu` (
  `SysID` int(11) NOT NULL,
  `MenuNameID` int(11) NOT NULL,
  `SubMenuName` varchar(150) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `HasChild` varchar(10) DEFAULT NULL,
  `Link` varchar(150) DEFAULT NULL,
  `FaIcon` varchar(50) NOT NULL DEFAULT 'fa fa-wrench',
  `AddedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedDate` date NOT NULL,
  `SubmenuStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatasubmenu`
--

INSERT INTO `masterdatasubmenu` (`SysID`, `MenuNameID`, `SubMenuName`, `Description`, `HasChild`, `Link`, `FaIcon`, `AddedBy`, `AddedDate`, `UpdatedBy`, `UpdatedDate`, `SubmenuStatus`, `DeleteStatus`) VALUES
(1, 2, 'Menu Management', 'Menu Management', 'yes', '', 'fa fa-book', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(2, 2, 'Role Management', 'Role Management', 'yes', '', 'fa fa-blind', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(3, 3, 'User Management', 'User Management', 'yes', '', 'fa fa-users', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(4, 3, 'Gym Management', 'Gym Management', 'yes', '', 'fa fa-link', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(5, 2, 'Data Management', 'Master Data', 'yes', '', 'fa fa-bookmark-o', 0, '0000-00-00', 0, '0000-00-00', 'yes', 'no'),
(6, 4, 'Franchise Gym', 'Franchise Gym', 'yes', '', 'fa fa-link', 1, '2018-08-14', 0, '0000-00-00', 'yes', 'no'),
(7, 4, 'Franchise Users', 'Franchise Users', 'yes', '', 'fa fa-users', 1, '2018-08-14', 0, '0000-00-00', 'yes', 'no'),
(8, 2, 'Image Management', 'Image Management', 'yes', '', 'fa  fa-file-image-o', 1, '2018-08-15', 0, '0000-00-00', 'yes', 'no'),
(9, 2, 'Bulletin Board', 'Bulletin Board', 'yes', '', 'fa fa-clipboard', 1, '2018-08-16', 1, '2018-08-16', 'yes', 'no'),
(10, 2, 'Video Management', 'Video Management', 'yes', '', 'fa fa-video-camera', 1, '2018-08-22', 1, '2018-08-22', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatatrainingimage`
--

CREATE TABLE `masterdatatrainingimage` (
  `SysID` int(11) NOT NULL,
  `ImageTitle` varchar(50) NOT NULL,
  `ImageDescription` varchar(250) DEFAULT NULL,
  `ImageLink` varchar(50) NOT NULL,
  `ImageOrderIndex` varchar(10) DEFAULT NULL,
  `ImageCategory` varchar(50) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `ImageStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatatrainingimage`
--

INSERT INTO `masterdatatrainingimage` (`SysID`, `ImageTitle`, `ImageDescription`, `ImageLink`, `ImageOrderIndex`, `ImageCategory`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `ImageStatus`, `DeleteStatus`) VALUES
(1, 'Machine 1', 'Machine 1', '8fdc752b4074463bb7ae6021b9b8da08.jpg', '1', '1', 1, 0, '2018-08-22', '0000-00-00', 'yes', 'no'),
(2, 'Image 2', 'Image 2', '7a5e8a908f5237fe51a3487f2a19afff.jpg', '2', '2', 1, 0, '2018-08-22', '0000-00-00', 'yes', 'no'),
(3, 'Image 3', 'Coaches', 'ff00073a1294823cbc88237192433344.jpg', '3', '3', 1, 0, '2018-08-22', '0000-00-00', 'yes', 'no'),
(4, 'Location', 'location', '1a15195ccfc8f1958d2d822983ece4b1.jpg', '4', '4', 1, 0, '2018-08-22', '0000-00-00', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masterdatatrainingvideo`
--

CREATE TABLE `masterdatatrainingvideo` (
  `SysID` int(11) NOT NULL,
  `VideoTitle` varchar(50) NOT NULL,
  `VideoDescription` varchar(250) DEFAULT NULL,
  `VideoLink` text NOT NULL,
  `VideoCategory` varchar(50) NOT NULL,
  `VideoOrderIndex` varchar(10) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `VideoStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdatatrainingvideo`
--

INSERT INTO `masterdatatrainingvideo` (`SysID`, `VideoTitle`, `VideoDescription`, `VideoLink`, `VideoCategory`, `VideoOrderIndex`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `VideoStatus`, `DeleteStatus`) VALUES
(1, 'GetFit247walkthrough', 'GetFit247walkthrough', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KEnqJxpNC28\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '1', '1', 1, 0, '2018-08-22', '0000-00-00', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `mdhearaboutus`
--

CREATE TABLE `mdhearaboutus` (
  `SysID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `HearStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchdetails`
--
ALTER TABLE `branchdetails`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymfranchisedetails`
--
ALTER TABLE `gymfranchisedetails`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymfranchiseinquiry`
--
ALTER TABLE `gymfranchiseinquiry`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymfranchiselogin`
--
ALTER TABLE `gymfranchiselogin`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymloginaccessfunction`
--
ALTER TABLE `gymloginaccessfunction`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymloginaccessrights`
--
ALTER TABLE `gymloginaccessrights`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymmainlogin`
--
ALTER TABLE `gymmainlogin`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `gymmemberinquiry`
--
ALTER TABLE `gymmemberinquiry`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdataadminimagegallery`
--
ALTER TABLE `masterdataadminimagegallery`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatabulletinboard`
--
ALTER TABLE `masterdatabulletinboard`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatabulletinboarddetails`
--
ALTER TABLE `masterdatabulletinboarddetails`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatamenu`
--
ALTER TABLE `masterdatamenu`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdataposition`
--
ALTER TABLE `masterdataposition`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatarole`
--
ALTER TABLE `masterdatarole`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatarolemapping`
--
ALTER TABLE `masterdatarolemapping`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatascreen`
--
ALTER TABLE `masterdatascreen`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatasubmenu`
--
ALTER TABLE `masterdatasubmenu`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatatrainingimage`
--
ALTER TABLE `masterdatatrainingimage`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `masterdatatrainingvideo`
--
ALTER TABLE `masterdatatrainingvideo`
  ADD PRIMARY KEY (`SysID`);

--
-- Indexes for table `mdhearaboutus`
--
ALTER TABLE `mdhearaboutus`
  ADD PRIMARY KEY (`SysID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchdetails`
--
ALTER TABLE `branchdetails`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gymfranchisedetails`
--
ALTER TABLE `gymfranchisedetails`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymfranchiseinquiry`
--
ALTER TABLE `gymfranchiseinquiry`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymfranchiselogin`
--
ALTER TABLE `gymfranchiselogin`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymloginaccessfunction`
--
ALTER TABLE `gymloginaccessfunction`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymloginaccessrights`
--
ALTER TABLE `gymloginaccessrights`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymmainlogin`
--
ALTER TABLE `gymmainlogin`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gymmemberinquiry`
--
ALTER TABLE `gymmemberinquiry`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterdataadminimagegallery`
--
ALTER TABLE `masterdataadminimagegallery`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdatabulletinboard`
--
ALTER TABLE `masterdatabulletinboard`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `masterdatabulletinboarddetails`
--
ALTER TABLE `masterdatabulletinboarddetails`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdatamenu`
--
ALTER TABLE `masterdatamenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdataposition`
--
ALTER TABLE `masterdataposition`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdatarole`
--
ALTER TABLE `masterdatarole`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masterdatarolemapping`
--
ALTER TABLE `masterdatarolemapping`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `masterdatascreen`
--
ALTER TABLE `masterdatascreen`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `masterdatasubmenu`
--
ALTER TABLE `masterdatasubmenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `masterdatatrainingimage`
--
ALTER TABLE `masterdatatrainingimage`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdatatrainingvideo`
--
ALTER TABLE `masterdatatrainingvideo`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mdhearaboutus`
--
ALTER TABLE `mdhearaboutus`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
