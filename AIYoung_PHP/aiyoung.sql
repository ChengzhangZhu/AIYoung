-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2018 at 12:10 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiyoung`
--

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `experience_name` text NOT NULL,
  `description` text NOT NULL,
  `main_task` text NOT NULL,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `start_time`, `end_time`, `experience_name`, `description`, `main_task`) VALUES
(1, '2017-10-31', '2018-03-08', 'MLA Intership', 'MLA is leading the development of a Digital Value Chain strategy with industry to enable the seamless capture, integration and interpretation of the vast and increasing range of data that’s being generated through new and existing technology in the red meat industry. Maximising information exchange will ensure the red meat industry produces what our markets need more sustainably and profitably. Improved communication will also increase the capacity of all industry players to embrace new technology – and the use of meaningful data in their own business. But to achieve this we need collaboration across industry and with the world’s best innovation companies. Producers, processors, logistics companies, retailers and consumers are faced daily with a plethora of concepts and solutions that all fit within the auspices of a digital strategy. The feedback to MLA from stakeholders across the industry is they don’t know: (1) what is real (2) how it can be used (3) is it of value to them (4) which options do I chose (5) how do I use it within my business (6) who owns the data (7) what do I do with the data and do I need new analytical skills, and (8) will I be better off or is this just a passing fad? This project will focus on conducting background research to address the questions above. There already exists a huge amount of information in our industry and a key outcome will be to identify all the data, who owns it and where it can add value. ', 'Analyzed cattle transfers between properties (e.g., farm) on the cluster computing framework Spark, such as transfer trends across time, transfer distribution among states/postcodes and etc. o Visualized transfers in postcode areas of the whole Australia using GIS (Geographic Information System) map. o Proposed solutions and built models for three business scenarios involved with unusual current holdings of properties and abnormal killing patterns of abattoirs. o Presented the analysis results on the monthly meeting to the whole MLA. o Draft project report for the intern project. o Technologies Used: Python, JSP, JavaScript, HTML, SQL, Spark, Leaflet and D3 library '),
(2, '2018-07-02', '2018-07-25', 'DPI Project', 'Collaboration project with DPI Water office', 'Data analytics');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `biograph` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `research_interests` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `abstract` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publication_list` longtext COLLATE utf8_unicode_ci NOT NULL,
  `experience_list` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`staff_id`, `name_en`, `name`, `dob`, `title`, `email`, `telephone`, `biograph`, `research_interests`, `photo`, `abstract`, `position`, `publication_list`, `experience_list`) VALUES
(1, 'justice', '郑毅', '1989-11-27', 'PHD', 'yi.zheng.uts@gmail.com', '15507487981', 'Bachelor：2008.09-2012.07 University of Electronic Science and Technology of China，UESTC\r\nMaster：2012.09-2015.07 National University of Defense Technology, NUDT\r\nDoctor：2015.09-Now University of Technology Sydney, UTS', 'Data Mining; Biomedical Informatics; hydro-informatics', 'justice.jpg', 'My research topic is text and data mining for human drug understanding. It aims to employ text and data mining techniques to study drug features for deep understanding. Text mining and data mining are techniques which have been widely used for discovering potential patterns, trends and relations from unstructured text and structured databases respectively. They have shown great prospects and advantages on drug research than traditional experimental approaches. Taking the drug development as an example, the traditional de novo drug discovery approach usually lasts for 10-17 years, rather a time-consuming, laborious and expensive process. However, this process could be reduced to 3-12 years via related data mining for drug repositioning. Specifically, our research focuses on drug side-effect prediction, drug target identification and combining them together to guide drug repositioning. Drug side-effects are phenotypic responses to certain medicinal products which are unintended and noxious for the normal use of medication at normal doses. They have drawn public attention because of significant morbidity and mortality they cause every year. Thus, it’s important to predict the side-effects in their early stage to avoid further loss. Drug targets refer to those molecular structures to which drugs are bound. Drug targets play a crucial role in drug therapy, however, a large number of targets remain unidentified. Therefore, it’s of great value to identify these potential targets. Moreover, newly identified targets can directly guide drug repositioning, which intends to find new use of marketing drugs out of their original medical indication scope', 'PHD', '1,2', '1,2'),
(2, 'Kevin', '朱成璋', '1990-08-12', 'PhD', 'kevin.zhu@gmail.com', '1550765894', 'Kevin is an expert in artificial intelligence and machine learning. He focuses on related research for several years.', 'artificial intelligence; machine learning;', 'chengzhangzhu.jpg', 'Kevin is an expert in artificial intelligence and machine learning. He focuses on related research for several years.', 'Manager', '1,2', '1,2'),
(3, 'Qian Li', '李倩', '1990-12-26', 'CFO', 'qian.li@student.uts.edu.au', '0481566812', 'She is an expert in Financial Analytics.', 'Financial Analytics', 'qianli.jpg', 'She is an expert in Financial Analytics.', 'CFO', '1,2', '1,2'),
(4, 'Lingyun Xiang', '向凌云', '1988-02-03', 'Professor', 'Lingyun.Xiang@gmail.com', '0731-25841121', 'She is a professor in Changsha University of Science & Technology.', 'causal inference;computer vision; data mining; data science; deep learning; dynamic network analysis; fintech analytics', 'lingyunxiang.jpg', 'She is a professor in Changsha University of Science & Technology.', 'Professor', '1', '2'),
(5, 'Helios', '', '1993-05-25', 'Developer', 'helios12@163.com', '0731-59897156', 'He is a member of the famous AI company named \"AI FOR EVERYONE\".', 'Multimedia and new media Analytics; multimedia information retrieval', 'helios.jpg', 'He is a member of the famous AI company named \"AI FOR EVERYONE\".', 'Developer', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `publication_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `year` year(4) NOT NULL,
  `venue_name` text NOT NULL,
  `publication_type` char(50) NOT NULL,
  `authors` text NOT NULL,
  `volume` int(11) NOT NULL,
  `number_v` int(11) NOT NULL,
  `page_v` int(11) NOT NULL,
  `source_code` text NOT NULL,
  `manuscript` text NOT NULL,
  `demo_link` text NOT NULL,
  PRIMARY KEY (`publication_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `title`, `abstract`, `year`, `venue_name`, `publication_type`, `authors`, `volume`, `number_v`, `page_v`, `source_code`, `manuscript`, `demo_link`) VALUES
(1, 'LWCS : A Large-scale Web Page Classification System Based on Anchor Graph Hashing', 'Nowadays, while we are enjoying the convenience brought by such a huge repository of online web information, we may come across difficulties in finding the web pages we want related to particular information we are searching for. Hence, it is essential to classify web documents to facilitate the search and retrieval of pages. Existing algorithms work well with a small quantity of web pages, whereas, they become slow and even non- effective while dealing with a large scale of web pages. Recently, some of these algorithms were adapted to distributed platforms which boosted their classification speeds effectively. However, due to high dimensions of web page features, the parallel classifiers were still trained with limited capacity training sets. In addition, these methods didn’t improve the classification itself, merely boosted by high computing performance of distributed platforms. So oriented to large-scale web page classification, we propose to integrate anchor graph hashing with K-Nearest Neighbour(KNN) classifier to reduce the pages’ original feature dimensions. The hash value of each page is used for training and classification instead of the original vectors. Experimental comparison with the original KNN on a large dataset demonstrates the efficacy of our proposed method', 2015, '2015 6th IEEE International Conference on Software Engineering and Service Science (ICSESS)', 'conference', 'Yi Zheng ; Chengcheng Sun ; Chengzhang Zhu ; Xv Lan ; Xiang Fu ; Weihong Han', 0, 0, 0, 'DataEnsembingForDTPPython.zip', 'LWCS A Large-scale Web Page Classification System Based on Anchor Graph Hashing.pdf', 'http://www.aai-bioinfo.com/CRISPR/'),
(2, 'Using Constrained Information Entropy to Detect Rare Adverse Drug Reactions from Medical Forums', 'Adverse drug reactions (ADRs) detection is critical\r\nto avoid malpractices yet challenging due to its uncertainty in pre-marketing review and the underreporting in post-marketing surveillance. To conquer this predicament, social media based ADRs detection methods have been proposed recently. However, existing work is mostly co-occurrence based methods and face several issues, in particularly, leaving out the rare ADRs and unable to distinguish irrelevant ADRs. In this work, we introduce a constrained information entropy (CIE) method. CIE first recognizes the pure adverse reactions using a predefined keyword dictionary and then captures high- and low-frequency (rare) ADRs by information entropy. Extensive experiments on medical forums dataset demonstrate that CIE outperforms the state-of-the-art co-occurrence based methods, especially in rare ADRs detection.\r\nI.', 2016, '2016 IEEE Engineering in Medicine and Biology Society', 'conference', 'Zheng, Yi; Lan, Chaowang;Peng, Hui; Cao, Longbing; Li, Jinyan', 2, 1, 889, 'no', 'no', 'https://hk.tower.im/projects/697b4f76d9a94364ad7811a43617ee64/');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
