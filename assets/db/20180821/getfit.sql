-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 08:16 AM
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
(1, '12', '33', '12', '31', '2', 'PBCom', 'Ayala', 'Bell Air', 'Bell Air', 'Bell Air', 'Makati', 'Metro Manila', 'Central Luzon', 'Philippines', '12345', 'Market Market', 'Matthew@gmail.com', 13, 465, 'Matthew', 1, NULL, '2018-08-09', '2018-08-13', '-', 'main', '-');

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
(2, 'admin', '', 'admin', '', 2, 'admin', '$2y$10$S6KxC8ficmtlqVQWckeEOe5gUrpNkTradyfG40BaLLRiFvnl6CoyO', 'superadmin1@superadmin.com', NULL, '', 1, 'profile.png', 1, 0, '2018-08-14', '0000-00-00', 'yes', 'no', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `masterdatabulletinboard`
--

CREATE TABLE `masterdatabulletinboard` (
  `SysID` int(11) NOT NULL,
  `MasterDataBulletinBoardDetailsID` int(50) NOT NULL,
  `EntryShowToBranch` int(11) NOT NULL,
  `EntryShowToRole` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `UpdatedDate` date NOT NULL,
  `EntryStatus` varchar(10) NOT NULL,
  `DeleteStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Master Data Management', 'Main Master Data', 'yes', '', 'fa fa-inbox', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
(1, 'Superadmin', 'Super', 'yes', 0, 1, '0000-00-00', '2018-08-14', '', ''),
(2, 'admin', 'admin', 'yes', 1, 1, '2018-08-14', '2018-08-14', '', '');

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
(1, 1, 'menu_1', 'menu', 1, 'Welcome', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(2, 1, 'menu_2', 'menu', 2, '', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(3, 1, 'submenu_1', 'submenu', 1, '', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(4, 1, 'screen_1', 'screen', 1, 'MasterDataMenu/menulist', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(5, 1, 'screen_2', 'screen', 2, 'MasterDataSubMenu/submenulist', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(6, 1, 'screen_3', 'screen', 3, 'MasterDataScreen/screenlist', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(7, 1, 'submenu_2', 'submenu', 2, '', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', ''),
(8, 1, 'screen_4', 'screen', 4, 'MasterDataRole/rolelist', 'yes', 0, '0000-00-00', 1, '2018-08-14', '', '');

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
(4, 2, 'Role List', 'Role List', 'MasterDataRole/rolelist', '', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
(2, 2, 'Role Management', 'Role Management', 'yes', '', 'fa fa-blind', 0, '0000-00-00', 0, '0000-00-00', '', '');

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
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `masterdataadminimagegallery`
--
ALTER TABLE `masterdataadminimagegallery`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterdatabulletinboard`
--
ALTER TABLE `masterdatabulletinboard`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterdatabulletinboarddetails`
--
ALTER TABLE `masterdatabulletinboarddetails`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterdatamenu`
--
ALTER TABLE `masterdatamenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masterdatascreen`
--
ALTER TABLE `masterdatascreen`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdatasubmenu`
--
ALTER TABLE `masterdatasubmenu`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mdhearaboutus`
--
ALTER TABLE `mdhearaboutus`
  MODIFY `SysID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
