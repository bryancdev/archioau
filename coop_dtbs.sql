-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 08:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coop_dtbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbdeposit`
--

CREATE TABLE `dbdeposit` (
  `id` int(10) NOT NULL,
  `mem_id` varchar(100) NOT NULL,
  `dbname` varchar(100) NOT NULL,
  `dbdate` varchar(100) NOT NULL,
  `dbdeposit` varchar(100) NOT NULL,
  `dbwithdrawal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbdeposit`
--

INSERT INTO `dbdeposit` (`id`, `mem_id`, `dbname`, `dbdate`, `dbdeposit`, `dbwithdrawal`) VALUES
(79, '0010', 'rica ocampo bamenta', '02/09/2019', '2000', ''),
(80, '0036', 'francis  calaud borbon ', '02/10/2019', '20000', ''),
(81, '0034', 'Raven Macayana Pamintuan', '02/10/2019', '1000', ''),
(83, '0037', 'varon ismael brinosa', '02/11/2019', '550', ''),
(84, '0037', 'varon ismael brinosa', '02/11/2019', '1000', ''),
(85, '0010', 'rica ocampo bamenta', '02/11/2019', '1000', ''),
(86, '0035', 'benedict corado pardo', '02/11/2019', '', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `dbloan`
--

CREATE TABLE `dbloan` (
  `id` int(10) NOT NULL,
  `code` varchar(5) NOT NULL,
  `mem_id` varchar(100) NOT NULL,
  `dbdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dbname` varchar(100) NOT NULL,
  `dbtypes` varchar(100) NOT NULL,
  `dbbookno` varchar(30) NOT NULL,
  `dbloanof` varchar(200) NOT NULL,
  `dbperiodof` varchar(100) NOT NULL,
  `dbsemimonth` varchar(100) NOT NULL,
  `dbmonthly` varchar(100) NOT NULL,
  `dbinstallment` varchar(200) NOT NULL,
  `dbpesos` varchar(200) NOT NULL,
  `dbdueon` varchar(200) NOT NULL,
  `dbpurposes` varchar(300) NOT NULL,
  `dbnamesignature` varchar(100) NOT NULL,
  `dbheldon` varchar(200) NOT NULL,
  `dbheldon2` varchar(200) NOT NULL,
  `dbexceptcondition` varchar(200) NOT NULL,
  `dbfirst_payment` varchar(100) NOT NULL,
  `dbdate_first_payment` varchar(100) NOT NULL,
  `dbsecond_payment` varchar(100) NOT NULL,
  `dbdate_second_payment` varchar(100) NOT NULL,
  `dbthird_payment` varchar(100) NOT NULL,
  `dbdate_third_payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbloan`
--

INSERT INTO `dbloan` (`id`, `code`, `mem_id`, `dbdate`, `dbname`, `dbtypes`, `dbbookno`, `dbloanof`, `dbperiodof`, `dbsemimonth`, `dbmonthly`, `dbinstallment`, `dbpesos`, `dbdueon`, `dbpurposes`, `dbnamesignature`, `dbheldon`, `dbheldon2`, `dbexceptcondition`, `dbfirst_payment`, `dbdate_first_payment`, `dbsecond_payment`, `dbdate_second_payment`, `dbthird_payment`, `dbdate_third_payment`) VALUES
(50, 'L0001', '0010', '2019-02-10 12:24:08', 'rica ocampo bamenta', '', '', '1000', '', '', '', '', '', '', '', '', '', '', '', '', '01-22-19', '', '', '', ''),
(51, 'L0002', '0037', '0000-00-00 00:00:00', 'varon ismael brinosa', '', '', '20000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dbloantype`
--

CREATE TABLE `dbloantype` (
  `id` int(4) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(10) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `terms` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbloantype`
--

INSERT INTO `dbloantype` (`id`, `code`, `description`, `interest`, `terms`) VALUES
(0, 'L0000', 'Regular', '0.15', ''),
(1, 'L0001', 'Short Term', '0.015', 'Sample text');

-- --------------------------------------------------------

--
-- Table structure for table `dblogin`
--

CREATE TABLE `dblogin` (
  `id` int(10) NOT NULL,
  `dbUsername` varchar(100) NOT NULL,
  `dbPassword` varchar(100) NOT NULL,
  `dbposition` varchar(100) NOT NULL,
  `dbname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dblogin`
--

INSERT INTO `dblogin` (`id`, `dbUsername`, `dbPassword`, `dbposition`, `dbname`) VALUES
(1, 'admin', 'admin', 'Admin', ''),
(2, 'member', 'member', 'member', ''),
(3, 'technical', 'technical', 'technical', '');

-- --------------------------------------------------------

--
-- Table structure for table `dbmember`
--

CREATE TABLE `dbmember` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dbUsername` varchar(100) NOT NULL,
  `dbPassword` varchar(100) NOT NULL,
  `dblastname` varchar(100) NOT NULL,
  `dbfirstname` varchar(100) NOT NULL,
  `dbmiddlename` varchar(50) NOT NULL,
  `dbage` varchar(10) NOT NULL,
  `dbsex` varchar(10) NOT NULL,
  `dbChurchOrg` varchar(300) NOT NULL,
  `dbPresAddress` varchar(300) NOT NULL,
  `dbPresContactNo` varchar(100) NOT NULL,
  `dbPerAddress` varchar(300) NOT NULL,
  `dbPerContactNo` varchar(100) NOT NULL,
  `dbdateOfBirth` varchar(100) NOT NULL,
  `dbPlaceOfBirth` varchar(100) NOT NULL,
  `dbReligion` varchar(100) NOT NULL,
  `dbCivilStat` varchar(100) NOT NULL,
  `dbCitizenship` varchar(100) NOT NULL,
  `dbEmail` varchar(100) NOT NULL,
  `dbOccupation` varchar(100) NOT NULL,
  `dbEmp` varchar(100) NOT NULL,
  `dbSalary` varchar(100) NOT NULL,
  `dbOtherSourceIncome` varchar(100) NOT NULL,
  `dbIncome` varchar(100) NOT NULL,
  `dbGsis` varchar(100) NOT NULL,
  `dbTin` varchar(100) NOT NULL,
  `dbFatherName` varchar(100) NOT NULL,
  `dbFatherAge` varchar(100) NOT NULL,
  `dbFatherOcc` varchar(100) NOT NULL,
  `dbMotherName` varchar(100) NOT NULL,
  `dbMotherAge` varchar(100) NOT NULL,
  `dbMotherOcc` varchar(100) NOT NULL,
  `dbSpouseName` varchar(100) NOT NULL,
  `dbSpouseAge` varchar(100) NOT NULL,
  `dbSpouseOcc` varchar(100) NOT NULL,
  `dbChild1Name` varchar(100) NOT NULL,
  `dbChild1Age` varchar(100) NOT NULL,
  `dbChild1Occ` varchar(100) NOT NULL,
  `dbChild2Name` varchar(100) NOT NULL,
  `dbChild2Age` varchar(100) NOT NULL,
  `dbChild2Occ` varchar(100) NOT NULL,
  `dbChild3Name` varchar(100) NOT NULL,
  `dbChild3Age` varchar(100) NOT NULL,
  `dbChild3Occ` varchar(100) NOT NULL,
  `dbChild4Name` varchar(100) NOT NULL,
  `dbChild4Age` varchar(100) NOT NULL,
  `dbChild4Occ` varchar(100) NOT NULL,
  `dbChild5Name` varchar(100) NOT NULL,
  `dbChild5Age` varchar(100) NOT NULL,
  `dbChild5Occ` varchar(100) NOT NULL,
  `dbPIncaseEmer` varchar(100) NOT NULL,
  `dbPIncaseEmerAdd` varchar(100) NOT NULL,
  `dbPIncaseEmerConNo` varchar(100) NOT NULL,
  `dbElementaryLevel` varchar(100) NOT NULL,
  `dbElementaryName` varchar(100) NOT NULL,
  `dbElementaryYear` varchar(100) NOT NULL,
  `dbHighSchoolLevel` varchar(100) NOT NULL,
  `dbHighSchoolName` varchar(100) NOT NULL,
  `dbHighSchoolYear` varchar(100) NOT NULL,
  `dbCollegeLevel` varchar(100) NOT NULL,
  `dbCollegeName` varchar(100) NOT NULL,
  `dbCollegeYear` varchar(100) NOT NULL,
  `dbPostLevel` varchar(100) NOT NULL,
  `dbPostName` varchar(100) NOT NULL,
  `dbPostYear` varchar(100) NOT NULL,
  `dbPostGradLevel` varchar(200) NOT NULL,
  `dbJobDesc1` varchar(100) NOT NULL,
  `dbNameAndAdd1` varchar(100) NOT NULL,
  `dbFromTo1` varchar(100) NOT NULL,
  `dbEarn1` varchar(100) NOT NULL,
  `dbJobDesc2` varchar(100) NOT NULL,
  `dbNameAndAdd2` varchar(100) NOT NULL,
  `dbFromTo2` varchar(100) NOT NULL,
  `dbEarn2` varchar(100) NOT NULL,
  `dbJobDesc3` varchar(100) NOT NULL,
  `dbNameAndAdd3` varchar(100) NOT NULL,
  `dbFromTo3` varchar(100) NOT NULL,
  `dbEarn3` varchar(100) NOT NULL,
  `dbJobDesc4` varchar(100) NOT NULL,
  `dbNameAndAdd4` varchar(100) NOT NULL,
  `dbFromTo4` varchar(100) NOT NULL,
  `dbEarn4` varchar(100) NOT NULL,
  `dbJobDesc5` varchar(100) NOT NULL,
  `dbNameAndAdd5` varchar(100) NOT NULL,
  `dbFromTo5` varchar(100) NOT NULL,
  `dbEarn5` varchar(100) NOT NULL,
  `dbNameCharRef1` varchar(100) NOT NULL,
  `dbAddCharRef1` varchar(100) NOT NULL,
  `dbOccCharRef1` varchar(100) NOT NULL,
  `dbConNumCharRef1` varchar(100) NOT NULL,
  `dbNameCharRef2` varchar(100) NOT NULL,
  `dbAddCharRef2` varchar(100) NOT NULL,
  `dbOccCharRef2` varchar(100) NOT NULL,
  `dbConNumCharRef2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbmember`
--

INSERT INTO `dbmember` (`id`, `dbUsername`, `dbPassword`, `dblastname`, `dbfirstname`, `dbmiddlename`, `dbage`, `dbsex`, `dbChurchOrg`, `dbPresAddress`, `dbPresContactNo`, `dbPerAddress`, `dbPerContactNo`, `dbdateOfBirth`, `dbPlaceOfBirth`, `dbReligion`, `dbCivilStat`, `dbCitizenship`, `dbEmail`, `dbOccupation`, `dbEmp`, `dbSalary`, `dbOtherSourceIncome`, `dbIncome`, `dbGsis`, `dbTin`, `dbFatherName`, `dbFatherAge`, `dbFatherOcc`, `dbMotherName`, `dbMotherAge`, `dbMotherOcc`, `dbSpouseName`, `dbSpouseAge`, `dbSpouseOcc`, `dbChild1Name`, `dbChild1Age`, `dbChild1Occ`, `dbChild2Name`, `dbChild2Age`, `dbChild2Occ`, `dbChild3Name`, `dbChild3Age`, `dbChild3Occ`, `dbChild4Name`, `dbChild4Age`, `dbChild4Occ`, `dbChild5Name`, `dbChild5Age`, `dbChild5Occ`, `dbPIncaseEmer`, `dbPIncaseEmerAdd`, `dbPIncaseEmerConNo`, `dbElementaryLevel`, `dbElementaryName`, `dbElementaryYear`, `dbHighSchoolLevel`, `dbHighSchoolName`, `dbHighSchoolYear`, `dbCollegeLevel`, `dbCollegeName`, `dbCollegeYear`, `dbPostLevel`, `dbPostName`, `dbPostYear`, `dbPostGradLevel`, `dbJobDesc1`, `dbNameAndAdd1`, `dbFromTo1`, `dbEarn1`, `dbJobDesc2`, `dbNameAndAdd2`, `dbFromTo2`, `dbEarn2`, `dbJobDesc3`, `dbNameAndAdd3`, `dbFromTo3`, `dbEarn3`, `dbJobDesc4`, `dbNameAndAdd4`, `dbFromTo4`, `dbEarn4`, `dbJobDesc5`, `dbNameAndAdd5`, `dbFromTo5`, `dbEarn5`, `dbNameCharRef1`, `dbAddCharRef1`, `dbOccCharRef1`, `dbConNumCharRef1`, `dbNameCharRef2`, `dbAddCharRef2`, `dbOccCharRef2`, `dbConNumCharRef2`) VALUES
(0010, 'user', 'user', 'bamenta', 'ric', 'ocampo', '23', 'Male', 'saint joseph', '747 pampanga st. gagalangin tondo manila', '09351734889', '747 pampanga st. gagalangin tondo manila', '09351734889', '2018-11-15', '', '', '', '', '', 'IT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$ ', '           ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Business Administration', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kjhjkhkjhjk', 'jhkj', 'hkj', 'hkj', 'hkj', 'hjk', 'hkj', 'hkjh'),
(0034, 'raven', 'raven', 'Pamintuan', 'Raven', 'Macayana', '20', 'Female', 'St. Joseph Parish', 'Tondo, Manila', '09351148734', 'Tondo, Manila', '09351148734', '1998-03-27', 'Quezon City', 'Catholic', 'Married', 'Filipino', 'ravenjhen.pamintuan@gmail.com', 'Accountant', '-', '-', 'Online Selling', '-', '-', '-', 'Raymon Pamintuan', '48', 'Tricycle Driver', 'Jeniffer Pamintuan', '46', 'Business Woman', 'Rica Marie Bamenta', '22', 'IT', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '$ ', '-  ', '-', 'Jeniffer Pamintuan', 'Tondo, Manila', '09999999999', '', 'Quirino Elementary School - Lakandula Elementary School', '2011', '', 'Torres High School', '2015', '', 'Arellano University', '2018', '', '-', '', 'Computer Science', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', 'Rica Marie Bamenta', 'Tondo, Manila', 'IT', '09351734889', '-', '-', '-', '-'),
(0035, 'pardo', 'pardo', 'pardo', 'benedict', 'corado', '21', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aduad', '123ui12', 'asdauhd', '1234123', 'hfksjf', '123JH', 'khkhjdshfk1', '13124123'),
(0036, 'borbon ', 'borbon ', 'borbon ', 'francis ', 'calaud', '18', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adadadafs', 'wadfasdf', 'wet3', 'etaw', 'ewarwe', '2', '124', 'ewr'),
(0037, 'brinosa', 'brinosa', 'brinosa', 'varon', 'ismael', '311', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'qee`', 'qe', 'eqwe', '123', 'eqwe', 'qwe', 'eqwe', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dbmemberlog`
--

CREATE TABLE `dbmemberlog` (
  `id` int(10) NOT NULL,
  `dbusername` varchar(100) NOT NULL,
  `dbaction` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbmemberlog`
--

INSERT INTO `dbmemberlog` (`id`, `dbusername`, `dbaction`) VALUES
(1, '', 'admin added member sample'),
(2, '', 'admin added member torres edric k'),
(3, '', 'admin edit member bamenta rica ocampo'),
(4, '', 'admin edit member 0010'),
(5, '', 'admin delete member 0038');

-- --------------------------------------------------------

--
-- Table structure for table `dbshared`
--

CREATE TABLE `dbshared` (
  `id` int(10) NOT NULL,
  `mem_id` varchar(100) NOT NULL,
  `dbname` varchar(100) NOT NULL,
  `dbdate` varchar(100) NOT NULL,
  `dbpledge` varchar(1000) NOT NULL,
  `dbdeposit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbshared`
--

INSERT INTO `dbshared` (`id`, `mem_id`, `dbname`, `dbdate`, `dbpledge`, `dbdeposit`) VALUES
(4, '0010', 'rica ocampo bamenta', '02/04/2019', '1000', '1000'),
(5, '0035', 'benedict corado pardo', '02/04/2019', '20000', '500'),
(6, '', '', '02/04/2019', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbdeposit`
--
ALTER TABLE `dbdeposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbloan`
--
ALTER TABLE `dbloan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbloantype`
--
ALTER TABLE `dbloantype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dblogin`
--
ALTER TABLE `dblogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbmember`
--
ALTER TABLE `dbmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbmemberlog`
--
ALTER TABLE `dbmemberlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbshared`
--
ALTER TABLE `dbshared`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbdeposit`
--
ALTER TABLE `dbdeposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `dbloan`
--
ALTER TABLE `dbloan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `dblogin`
--
ALTER TABLE `dblogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbmember`
--
ALTER TABLE `dbmember`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `dbmemberlog`
--
ALTER TABLE `dbmemberlog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dbshared`
--
ALTER TABLE `dbshared`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
