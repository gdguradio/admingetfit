-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 12:38 AM
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
-- Database: `getfit`
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
(1, '12', '33', '12', '31', '2', 'PBCom', 'Ayala', 'Bell Air', 'Bell Air', 'Bell Air', 'Makati', 'Metro Manila', 'Central Luzon', 'Philippines', '12345', 'Market Market', 'Matthew@gmail.com', 13, 465, 'Matthew', 1, NULL, '2018-08-09', '2018-08-13', '-', 'main', '-'),
(2, '', '', '', '', '', '', '', '', '', 'Bell Air', 'Makati', 'Metro Manila', 'Central Luzon', 'Philippines', 'qwe', 'Makati Makati', 'jojoboi@gmail.com', 0, 0, 'Jojo Boi', 1, NULL, '2018-08-13', NULL, 'yes', 'main', 'no');

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
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `LandLineNumber` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
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

INSERT INTO `gymmainlogin` (`SysID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `MasterDataRoleID`, `UserName`, `Password`, `EmailAddress`, `LandLineNumber`, `MobileNumber`, `PositionID`, `AddedBy`, `UpdatedBy`, `AddedDate`, `UpdatedDate`, `LoginStatus`, `DeleteStatus`, `BranchDetailsID`) VALUES
(1, 'Superadmin', '', 'Superadmin', '', 1, 'superadmin', '$2y$10$h40dqglByNx/R8ULmCOj3e0D1olhW/T..lTmeFA21eoBR5dCUgAsi', 'superadmin@superadmin.com', '13-13-4964', '13-13-4964', 1, 1, 0, '2018-08-09', '2018-08-13', '-', '-', 1),
(2, 'Jojo', '', 'Boi', '', 2, 'jojoboi', '$2y$10$h40dqglByNx/R8ULmCOj3e0D1olhW/T..lTmeFA21eoBR5dCUgAsi', 'jojoboi@gmail.com', '', '', 2, 1, 1, '2018-08-13', '2018-08-13', 'yes', 'no', 1);

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
(1, 'Dashboard', 'dashboard', 'no', 'Welcome', 'fa fa-dashboard', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(2, 'Master Data Management', 'Main Master Data', 'yes', '', 'fa fa-inbox', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(3, 'Main Gym Management', 'Main Gym Management', 'yes', '', 'fa fa-empire', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
(1, 'Superadmin', 'Super', 'yes', 0, NULL, '0000-00-00', NULL, '', ''),
(2, 'Superadmin!', 'Super', 'yes', 0, NULL, '0000-00-00', NULL, '', ''),
(3, 'User', 'user', 'yes', 0, NULL, '0000-00-00', NULL, '', '');

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
(9, 2, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(10, 2, 'menu_2', 'menu', 2, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(11, 2, 'submenu_1', 'submenu', 1, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(12, 2, 'screen_1', 'screen', 1, 'MasterDataMenu/menulist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(13, 2, 'screen_2', 'screen', 2, 'MasterDataSubMenu/submenulist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(14, 2, 'screen_3', 'screen', 3, 'MasterDataScreen/screenlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(15, 2, 'submenu_2', 'submenu', 2, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(16, 2, 'screen_4', 'screen', 4, 'MasterDataRole/rolelist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(17, 2, 'menu_3', 'menu', 3, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(18, 2, 'submenu_3', 'submenu', 3, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(19, 2, 'screen_5', 'screen', 5, 'MainUserInformation/mainUserlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(53, 3, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(88, 1, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(89, 1, 'menu_2', 'menu', 2, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(90, 1, 'submenu_1', 'submenu', 1, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(91, 1, 'screen_1', 'screen', 1, 'MasterDataMenu/menulist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(92, 1, 'screen_2', 'screen', 2, 'MasterDataSubMenu/submenulist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(93, 1, 'screen_3', 'screen', 3, 'MasterDataScreen/screenlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(94, 1, 'submenu_2', 'submenu', 2, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(95, 1, 'screen_4', 'screen', 4, 'MasterDataRole/rolelist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(96, 1, 'submenu_5', 'submenu', 5, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(97, 1, 'screen_7', 'screen', 7, 'MasterDataPosition/positionlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(98, 1, 'menu_3', 'menu', 3, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(99, 1, 'submenu_3', 'submenu', 3, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(100, 1, 'screen_5', 'screen', 5, 'MainUserInformation/mainUserlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(101, 1, 'submenu_4', 'submenu', 4, '', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(102, 1, 'screen_6', 'screen', 6, 'MainGymInformation/maingymlist', 'yes', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
(1, 1, 'Menu List', 'Menu List', 'MasterDataMenu/menulist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(2, 1, 'Submenu List', 'Submenu List', 'MasterDataSubMenu/submenulist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(3, 1, 'Screen List', 'Screen List', 'MasterDataScreen/screenlist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(4, 2, 'Role List', 'Role List', 'MasterDataRole/rolelist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(5, 3, 'Main Gym Users', 'Main Gym Users', 'MainUserInformation/mainUserlist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(6, 4, 'Gym Management', 'Main Gym', 'MainGymInformation/maingymlist', '', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(7, 5, 'Position List', 'List of position', 'MasterDataPosition/positionlist', '', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
(1, 2, 'Menu Management', 'Menu Management', 'yes', '', 'fa fa-book', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(2, 2, 'Role Management', 'Role Management', 'yes', '', 'fa fa-blind', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(3, 3, 'User Management', 'User Management', 'yes', '', 'fa fa-users', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(4, 3, 'Gym Management', 'Gym Management', 'yes', '', 'fa fa-link', 0, '0000-00-00', 0, '0000-00-00', '', ''),
(5, 2, 'Data Management', 'Master Data', 'yes', '', 'fa fa-bookmark-o', 0, '0000-00-00', 0, '0000-00-00', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `guid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `birthday`, `guid`) VALUES
(1, 'Bryon', 'Webster', '1966-12-09', '52cb46a43e1751.09990271'),
(2, 'Doug', 'Reese', '2072-06-05', '52cb46a43e1753.87492605'),
(3, 'Fredrick', 'Grant', '2093-04-19', '52cb46a43e1758.25780220'),
(4, 'Linnette', 'Knaus', '2070-07-03', '52cb46a43e1750.41337129'),
(5, 'Toya', 'Higdon', '2003-02-17', '52cb46a43e1751.47564669'),
(6, 'Kathleen', 'Ong', '1958-05-23', '52cb46a43e1753.57960196'),
(7, 'Dwayne', 'Brennan', '2055-01-30', '52cb46a43e1756.95031437'),
(8, 'Sigrid', 'Burks', '1924-01-17', '52cb46a43e1755.84581840'),
(9, 'Angelique', 'Hatton', '2079-05-20', '52cb46a43e1751.09499083'),
(10, 'Araceli', 'Goodwin', '1948-06-26', '52cb46a43e1758.61818384'),
(11, 'Rick', 'Hoepner', '1910-12-04', '52cb46a43e1753.69839714'),
(12, 'Racquel', 'Michalowski', '2054-11-04', '52cb46a43e1750.88867233'),
(13, 'Regine', 'Bashford', '1918-05-22', '52cb46a43e1756.43300248'),
(14, 'Rabiah', 'Kelley', '2079-06-12', '52cb46a43e1757.50760284'),
(15, 'Polina', 'Brabant', '2017-09-03', '52cb46a43e1753.43180336'),
(16, 'Greg', 'Bunch', '2051-03-12', '52cb46a43e1751.77435662'),
(17, 'Arun', 'Jayn', '2012-09-04', '52cb46a43e1756.38389568'),
(18, 'Majeed', 'Hughesdkaiya', '2022-05-12', '52cb46a43e1758.78872004'),
(19, 'Micheal', 'Mott', '2061-11-29', '52cb46a43e1752.90134850'),
(20, 'Dominic', 'Bryson', '2053-11-02', '52cb46a43e1756.43232293'),
(21, 'Vernon', 'Odonoghue', '1959-08-10', '52cb46a43e1756.06683570'),
(22, 'Mutahir', 'Simpson', '1995-04-13', '52cb46a43e1753.53493546'),
(23, 'Victoria', 'Tupper', '2096-04-13', '52cb46a43e1759.16856723'),
(24, 'Karl', 'Welld', '2011-11-26', '52cb46a43e1752.24498048'),
(25, 'Corrine', 'Butterfield', '1927-02-23', '52cb46a43e1753.72547337'),
(26, 'Rashad', 'Givens', '2030-02-03', '52cb46a43e1758.24422824'),
(27, 'Austin', 'Hobbs', '2051-11-15', '52cb46a43e1754.37095011'),
(28, 'Raphael', 'Sutton', '1960-11-30', '52cb46a43e1754.20562396'),
(29, 'Wazir', 'Peacock', '1905-04-29', '52cb46a43e1753.42007083'),
(30, 'Andre', 'Shobe', '1929-06-26', '52cb46a43e1753.44622781'),
(31, 'Bola', 'Rice', '2066-05-10', '52cb46a43e1753.24265759'),
(32, 'Atul', 'Labrucherie', '2065-05-27', '52cb46a43e1759.67035044'),
(33, 'Sutman', 'Apotheloz', '1945-09-02', '52cb46a43e1752.93823019'),
(34, 'Bradley', 'Reiter', '2053-12-04', '52cb46a43e1755.64839440'),
(35, 'Aisha', 'Gallant', '2005-05-20', '52cb46a43e1752.32677409'),
(36, 'Stan', 'Hobson', '1966-12-29', '52cb46a43e1754.18205073'),
(37, 'Shelley', 'Hill', '2040-01-03', '52cb46a43e1751.24210656'),
(38, 'Roy', 'Dedonato', '2076-03-20', '52cb46a43e55d7.94602811'),
(39, 'Maria', 'Taylor', '1988-06-07', '52cb46a43e55d0.51259546'),
(40, 'Elena', 'Compton', '2037-07-05', '52cb46a43e55d4.82668304'),
(41, 'Howard', 'Graves', '2069-09-12', '52cb46a43e55d1.15220154'),
(42, 'Jasper', 'Donaldson', '1933-12-30', '52cb46a43e55d7.29860141'),
(43, 'Rakesh', 'Ward', '2069-04-17', '52cb46a43e55d5.86930362'),
(44, 'Jerline', 'Kiab', '1927-07-01', '52cb46a43e55d8.78598722'),
(45, 'Cecilia', 'Marrinson', '2028-04-17', '52cb46a43e55d6.21897030'),
(46, 'Spyro', 'Jayanti', '1988-08-24', '52cb46a43e55d0.61521338'),
(47, 'Ruth', 'Symes', '1996-12-25', '52cb46a43e55d8.99507532'),
(48, 'Colette', 'Miranda', '1908-05-26', '52cb46a43e55d6.80530422'),
(49, 'Miyanda', 'Tippit', '2051-10-07', '52cb46a43e55d2.55098666'),
(50, 'Fang', 'Lake', '1967-02-18', '52cb46a43e55d6.99401194');

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
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gymmemberinquiry`
--
ALTER TABLE `gymmemberinquiry`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterdatamenu`
--
ALTER TABLE `masterdatamenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdataposition`
--
ALTER TABLE `masterdataposition`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdatarole`
--
ALTER TABLE `masterdatarole`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdatarolemapping`
--
ALTER TABLE `masterdatarolemapping`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `masterdatascreen`
--
ALTER TABLE `masterdatascreen`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masterdatasubmenu`
--
ALTER TABLE `masterdatasubmenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mdhearaboutus`
--
ALTER TABLE `mdhearaboutus`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
