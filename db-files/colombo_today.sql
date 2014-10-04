-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2014 at 06:24 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `colombo_today`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(2, 'Business'),
(6, 'Entertainment & Arts'),
(7, 'Lifestyle'),
(9, 'Other'),
(5, 'Politics'),
(3, 'Sports'),
(4, 'Tech'),
(8, 'Travel'),
(1, 'World');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(25) NOT NULL,
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `language_name` (`language_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
(1, 'English'),
(2, 'Sinhala'),
(3, 'Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `publish_date` date NOT NULL,
  `source` varchar(250) NOT NULL,
  `news_paper_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `visibility_status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`news_id`),
  UNIQUE KEY `source` (`source`),
  UNIQUE KEY `source_2` (`source`),
  KEY `news_paper_id` (`news_paper_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `image`, `publish_date`, `source`, `news_paper_id`, `category_id`, `visibility_status`, `featured`) VALUES
(2, 'UNP: Hold national elections', 'UNP which expressed its satisfaction about its performance at the Uva PC elections today threw a challenge at the govt to hold a national election as soon as possible. UNP General Secretary Tissa Attanayake said that his party is ready to face a national election in January next year or even earlier. "It is the ruling party which published that a Presidential election would be held in January next year and we urge them to hold', 'img/news/21-09-2014/1.jpg', '2014-09-21', 'http://www.dailymirror.lk/news/52702-unp-hold-national-elections.html', 3, 5, 1, 1),
(3, 'SLHC director killed in accident', 'A Director attached to the Sri Lanka Human Rights Commission (SLHC) died after her vehicle collided head on with a private bus in Beligala area in Balangoda, this afternoon. SSP Ajith Rohana said that the accident has taken place while a group attached to the SLHC was returning to Colombo after a field visit for Uva Province Council election. Another two individuals who sustained injures have been rushed to the Balangoda Base hospital.', NULL, '2014-09-21', 'http://www.adaderana.lk/news/slhc-director-killed-in-accident', 8, 9, 1, 1),
(5, 'Susil Kindelpitiya in talks with UNP for a possible crossover', 'Democratic Party Western Provincial Councilor Susil Kindelpitiya is presently holding discussions to join the UNP, highly placed political sources said. Kindelpitiya has already held a series of discussions in this regard with UNP MP Sajith Premadasa. Kindelpitiya may join the main opposition party following Premadasa''s appointment as the Deputy Leader of the party. Kindelpitiya had reportedly fallen out with Democratic Party Leader Sarath Fonseka', 'img/news/21-09-2014/2.jpg', '2014-09-21', 'http://www.asianmirror.lk/news/item/3652-susil-kindelpitiya-in-talks-with-unp-for-a-possible-crossover', 5, 9, 1, 1),
(6, 'UPFA is ready to face National elections', 'UPFA says it is ready to face a National election with confidence based on the results of all the PC elections held in recent times. UPFA General Secretary Susil Premjayanth said that when combining the votes obtained at provincial elections held over the past couple of years, of all the alliance partners in the Govt, the Govt has enough votes to win a National election. There has been speculation a Presidential or General election', 'img/news/21-09-2014/3.jpg', '2014-09-21', 'http://colombogazette.com/2014/09/21/upfa-is-ready-to-face-national-elections/', 10, 5, 1, 1),
(7, 'President to leave for New York to address UNGA', 'President Rajapaksa will leave on a five-day visit to New York during which he will address the 69th session of the UN General Assembly (UNGA) at the UN headquarters in New York. President will participate in the general debate of the UNGA and is scheduled to speak on 25 Sept. This will be the 7th time the President is attending the UNGA. President''s first address to the UNGA was in 2006. He is also scheduled to participate in', NULL, '2014-09-21', 'http://www.adaderana.lk/news/president-to-leave-for-new-york-to-address-unga', 8, 5, 1, 1),
(8, '''Rajapaksa regime now electorally vulnerable''', 'The Rajapaksa Regime especially President Rajapaksa is now electorally vulnerable. We challenge the Regime to hold the election as planned and face the truth about the chaos and misery that the Rajapaksa rule has brought upon the people, the UNP says. The revolutionary milestone where it yearning for freedom and justice, and the march towards the ultimate defeat of the Rajapakse regime has begun in Uva Province.', 'img/news/21-09-2014/4.jpg', '2014-09-21', 'http://www.adaderana.lk/news/rajapaksa-regime-now-electorally-vulnerable-unp-', 8, 5, 1, 1),
(9, 'Indian nationals arrested in Sri Lanka for overstaying', 'Seven Indian nationals have been arrested by Lankan police for allegedly overstaying and their involvement in illegal trade in the country, according to a media report. All seven of them, between the age of 23-65, have exceeded their visa tenure, violated immigration laws and engaged in illegal trade in Kalmunai, Eastern Province, Daily Mirror quoted police as saying. They were arrested yesterday while selling clothes and other items at Nayapattimuna area.', NULL, '2014-09-21', 'http://www.business-standard.com/article/pti-stories/indian-nationals-arrested-in-sri-lanka-for-overstaying-114092100391_1.html', NULL, 9, 1, 1),
(10, 'SL''s Foreign Policy and the man they call', 'Almost three weeks ago when I visited Professor G L Peiris for an interview I had made the mistake of assuming there was no parking at the Ministry of External Affairs and ended up taking a very long walk beneath the cloudy skies of the morning. Prof Peiris was on time, arriving with his entourage. As I was ushered into his office seconds after his arrival, I was surprised to find not a single paper on', NULL, '2014-09-21', 'http://www.island.lk/index.php?page_cat=article-details&page=article-details&code_title=110632', 12, 5, 1, 1),
(11, 'Sri Lanka president''s party narrowly clears vote test', 'Sri Lanka''s ruling party saw its popularity significantly eroded in a narrow local election win seen as a bellwether for a snap presidential election, official results showed. President Rajapakse''s UPFA secured 19 out of the 34 seats in the Uva PC polls, but saw its popularity plummet by an unprecedented 22.98% points. Party scored 48.79% overall, raising doubts over an early presidential election ', 'img/news/21-09-2014/5.jpg', '2014-09-21', 'http://news.yahoo.com/sri-lanka-presidents-party-narrowly-clears-vote-test-052314146.html;_ylt=AwrTWVVgox5U2X8AtdvQtDMD', NULL, 5, 1, 1),
(12, 'Twist and turns in Sri Lanka''s coal tender', 'Sri Lanka''s tender procedure for the procurement of coal to operate the Norochcholai power plant has taken a dubious turn with the cancellation of bids for the second time in eight months. The previous tender was cancelled in December 2013. The decision to cancel the bids called through a newspaper advertisement on 17-04-2014 for the purchase of coal by Lanka Coal Company was taken by cabinet of ministers ', 'img/news/21-09-2014/6.jpg', '2014-09-21', 'http://www.sundaytimes.lk/140921/news/27-official-deals-with-china-unspecified-number-on-the-sidelines-119057.html', 14, 2, 1, 1),
(13, 'PUCSL awaits Treasury direction on how to bridge deficit', 'Public Utilities Commission (PUCSL), regulatory body, is awaiting Finance Ministry recommendations on how to make up for the annual revenue shortfall of around Rs. 60 billion following the govt''s decision to reduce the monthly electricity bill of consumers by 25%. Power and Energy Ministry is yet to submit its proposals to the Treasury, which in turn would recommend the policy decision to PUCSL for implementation.', 'img/news/21-09-2014/7.jpg', '2014-09-21', 'http://www.island.lk/index.php?page_cat=article-details&page=article-details&code_title=110667', 12, 2, 1, 1),
(14, 'CAA regulations on paint-labeling a whitewash?', 'The CAA made compulsory for all paint manufacturers and traders to explicitly label its content and ensure lead levels are within stipulated limits, environmentalists, however, suggest this may just be a whitewash. The gazette notification which came into effect on September 1, the CAA directs all manufacturers and traders of paints, varnishes and solvents should contain information such as the batch number', 'img/news/21-09-2014/8.jpg', '2014-09-21', 'http://www.nation.lk/edition/news-online/item/33499-caa-regulations-on-paint-labeling-a-whitewash?.html', 15, 2, 1, 1),
(15, 'Atapattu still in contention for head coach job', 'SLC will either go ahead and appoint a permanent head coach for the national team or prune down the list of applicants further from the nine who have been short-listed for interviews through Skype by next week.The interviews was to have taken place last week but SLC CEO Ashley de Silva stated that due to some members of the 11-member special committee appointed to select the national coach', 'img/news/21-09-2014/9.jpg', '2014-09-21', 'http://www.nation.lk/edition/sport-online/item/33512-atapattu-still-in-contention-for-head-coach-job.html', 15, 3, 1, 1),
(16, 'Scottish Verdict: ''Better Together'' Than Unnecessary Risks', 'The outcome of the referendum on Scotland would have been one great disappointment to those regions and secessionist groups waiting to break away from their mother country and to those who have been waiting for the collapse of the British Empire for long years - although the Empire disappeared well over half a century ago. It was welcomed by stable democratic countries, particularly of the Western bloc and even less affluent developing countries would have welcomed the survival of Britain.', NULL, '2014-09-21', 'http://www.thesundayleader.lk/2014/09/21/scottish-verdict-better-together-than-unnecessary-risks/', 16, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_papers`
--

CREATE TABLE IF NOT EXISTS `news_papers` (
  `news_paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_paper_name` varchar(100) NOT NULL,
  `about_news_paper` varchar(2000) DEFAULT NULL,
  `news_paper_link` varchar(50) NOT NULL,
  `news_paper_code` varchar(10) NOT NULL,
  `news_paper_logo` varchar(255) DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  `visibility_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`news_paper_id`),
  UNIQUE KEY `news_paper_name` (`news_paper_name`,`news_paper_link`,`news_paper_code`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news_papers`
--

INSERT INTO `news_papers` (`news_paper_id`, `news_paper_name`, `about_news_paper`, `news_paper_link`, `news_paper_code`, `news_paper_logo`, `language_id`, `visibility_status`) VALUES
(1, 'ADA', NULL, 'http://www.ada.lk', 'ADA', NULL, 2, 1),
(2, 'Budusarana', NULL, 'http://www.lakehouse.lk/budusarana', 'BUDS', NULL, 2, 1),
(3, 'Daily Mirror', NULL, 'http://www.dailymirror.lk', 'DM', NULL, 1, 1),
(4, 'Daily News', NULL, 'http://www.dailynews.lk', 'DN', NULL, 1, 1),
(5, 'Dinamina', NULL, 'http://www.dinamina.lk', 'DIN', NULL, 2, 1),
(6, 'Divaina ', NULL, 'http://www.divaina.com', 'DIV', NULL, 2, 1),
(7, 'DailyFT', NULL, 'http://www.ft.lk', 'DFT', NULL, 1, 1),
(8, 'Ada Derana', NULL, 'http://www.adaderana.lk', 'ADD', NULL, 1, 1),
(9, 'Asian Mirror', NULL, 'http://www.asianmirror.lk', 'AM', NULL, 1, 1),
(10, 'Colombo Gazette', NULL, 'http://colombogazette.com', 'CG', NULL, 1, 1),
(12, 'Sunday Island', NULL, 'http://www.island.lk', 'SI', NULL, 1, 1),
(14, 'The Sunday Times', NULL, 'http://www.sundaytimes.lk', 'TST', NULL, 1, 1),
(15, 'The Nation', NULL, 'http://www.nation.lk', 'NT', NULL, 1, 1),
(16, 'The Sunday Leader', NULL, 'http://www.thesundayleader.lk', 'TSL', NULL, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`news_paper_id`) REFERENCES `news_papers` (`news_paper_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `news_papers`
--
ALTER TABLE `news_papers`
  ADD CONSTRAINT `news_papers_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
