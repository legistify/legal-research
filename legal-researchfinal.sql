-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 09:09 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legal-research`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL,
  `answer` mediumtext NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `downvotes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`, `upvotes`, `datetime`, `downvotes`) VALUES
(1, '<div class="cf_facts_descr small_light ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, deserunt!</div>', 1, 2, 20, '0000-00-00 00:00:00', 12),
(2, '<div class="cf_facts_descr small_light ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, deserunt!</div>', 1, 2, 5, '0000-00-00 00:00:00', 5),
(3, 'TEST_ANSWER.', 2, 1, 1, '0000-00-00 00:00:00', 0),
(4, 'TEST_ANSWER.', 2, 2, 0, '0000-00-00 00:00:00', 0),
(7, 'Hello', 2, 1, 1, '2016-02-16 13:11:30', 0),
(8, 'Heiil', 5, 1, 1, '2016-02-16 14:57:18', 0),
(9, 'Mil gaya hai.', 6, 1, 1, '2016-02-16 16:28:30', 1),
(10, 'HEY MAI ANSWER KAR RAHA hu', 7, 1, 1, '2016-02-20 14:12:42', 0),
(11, 'Akslkl;ss', 16, 1, 1, '2016-02-20 14:27:34', 0),
(12, 'HI', 9, 1, 1, '2016-02-21 19:00:53', 0),
(13, 'DOne', 17, 1, 0, '2016-02-21 19:01:23', 0),
(14, 'FEW!!!', 17, 1, 0, '2016-02-21 19:08:45', 0),
(15, 'HEy', 7, 1, 0, '2016-02-21 20:24:58', 0),
(16, 'Hey', 7, 1, 0, '2016-02-21 20:25:36', 0),
(17, 'Hello', 7, 1, 0, '2016-02-21 20:31:15', 0),
(18, 'HODI', 7, 1, 0, '2016-02-21 20:32:03', 0),
(19, 'Hello', 7, 1, 0, '2016-02-21 20:34:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `topic` varchar(32) NOT NULL,
  `content` mediumtext NOT NULL,
  `Upvotes` mediumint(9) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `topic`, `content`, `Upvotes`, `Downvotes`, `user_id`, `title`, `datetime`, `views`) VALUES
(1, 'agr', 'HI', 0, 0, 1, 'hello', '2016-02-10 17:44:23', 9),
(2, 'anp', 'HI', 10, 5, 1, 'helli', '2016-02-10 17:44:23', 136),
(3, 'agr', 'BYE', 0, 0, 2, 'helle', '2016-02-10 17:44:23', 5),
(4, 'anp', 'blah', 5, 3, 1, 'blahish', '2016-02-10 17:44:23', 26),
(5, 'agr', 'nnnn', 98, 78, 1, 't4tyf', '2016-02-10 17:44:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_vote_rel`
--

CREATE TABLE IF NOT EXISTS `article_vote_rel` (
  `article_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `up_down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_a`
--

CREATE TABLE IF NOT EXISTS `comments_a` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `answer_id` bigint(20) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_a`
--

INSERT INTO `comments_a` (`id`, `comment`, `user_id`, `answer_id`, `votes`, `datetime`, `question_id`) VALUES
(15, 'Done', 3, 2, 1, '2016-02-13 13:32:59', 1),
(16, 'PRO', 3, 1, 1, '2016-02-13 13:34:17', 1),
(17, 'KIL', 3, 2, 1, '2016-02-13 15:52:38', 1),
(18, 'Hey Like me', 3, 1, 1, '2016-02-14 08:48:26', 1),
(19, 'Hi', 3, 1, 1, '2016-02-15 19:43:50', 1),
(20, 'Pingu God', 4, 8, 0, '2016-02-16 14:57:28', 5),
(21, 'Aree Smit party de!!!!!', 4, 9, 1, '2016-02-16 16:28:41', 6),
(22, 'Hey Like me', 2, 9, 0, '2016-02-16 17:58:20', 6),
(23, 'howdi', 3, 3, 1, '2016-02-16 20:01:10', 2),
(24, '', 3, 1, 0, '2016-02-16 20:16:25', 1),
(25, '', 3, 1, 0, '2016-02-16 20:16:27', 1),
(26, '', 3, 1, 0, '2016-02-16 20:16:29', 1),
(27, 'Hi', 3, 4, 0, '2016-02-20 13:16:47', 2),
(28, 'Hello', 4, 10, 1, '2016-02-20 14:13:01', 7),
(29, 'Jkj', 4, 11, 1, '2016-02-20 14:27:45', 16),
(30, 'Final', 4, 13, 1, '2016-02-21 19:08:24', 17),
(31, 'HI', 4, 10, 0, '2016-02-21 20:36:59', 7),
(32, 'POst', 4, 10, 0, '2016-02-21 20:41:22', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments_articles`
--

CREATE TABLE IF NOT EXISTS `comments_articles` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_articles`
--

INSERT INTO `comments_articles` (`id`, `comment`, `user_id`, `article_id`, `Upvotes`, `Downvotes`, `datetime`) VALUES
(1, '!stcomment', 1, 2, 5, 5, '2016-01-05 01:21:56'),
(2, '1st comment', 1, 4, 29, 20, '2016-01-05 01:21:56'),
(7, 'qwerty', 2, 4, 1, 1, '2016-01-10 02:50:13'),
(8, 'qwerty', 2, 2, 0, 0, '2016-01-10 02:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments_q`
--

CREATE TABLE IF NOT EXISTS `comments_q` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments_reply`
--

CREATE TABLE IF NOT EXISTS `comments_reply` (
  `id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_reply`
--

INSERT INTO `comments_reply` (`id`, `comment`, `user_id`, `comment_id`, `Upvotes`, `Downvotes`, `datetime`) VALUES
(1, '!streply', 1, 8, 5, 5, '2016-01-05 01:21:56'),
(2, '1st reply', 1, 2, 29, 20, '2016-01-05 01:21:56'),
(7, 'qwertyreply', 2, 2, 1, 1, '2016-01-10 02:50:13'),
(8, 'qwertyreply', 2, 2, 0, 0, '2016-01-10 02:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `comment_vote_rel`
--

CREATE TABLE IF NOT EXISTS `comment_vote_rel` (
  `comment_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `up_down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `upvotes` bigint(20) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `downvotes` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `upvotes`, `datetime`, `downvotes`) VALUES
(1, 'T1', 'hhkdhak', 1, 15, '2016-01-01 23:55:07', 9),
(2, 'T2', 'kjkhkm', 2, 1, '2016-01-01 23:52:07', 0),
(4, 'Hello', 'Hey PIngu', 4, 0, '2016-02-16 13:34:51', 0),
(5, 'Hello', 'Hey Pingu', 4, 0, '2016-02-16 13:35:42', 0),
(6, 'Smit ko paisa kab milega', 'Jab milega tab bata dena', 4, 1, '2016-02-16 16:28:09', 0),
(7, 'Hi', 'Hello', 3, 1, '2016-02-17 17:10:25', 0),
(8, 'Hello', 'HI Pingu\r\n', 3, 0, '2016-02-17 19:14:41', 0),
(9, 'Hello', 'HI Pingu\r\n', 3, 1, '2016-02-17 19:17:36', 0),
(10, 'Hello', 'HI', 3, 0, '2016-02-17 19:18:00', 0),
(11, 'Hello', 'Hi', 3, 0, '2016-02-17 19:19:01', 0),
(12, 'Yellow', 'Hi', 3, 0, '2016-02-20 13:22:27', 0),
(13, 'Hi', 'Helo', 3, 0, '2016-02-20 13:57:51', 0),
(14, 'Hi', 'Hello', 3, 0, '2016-02-20 14:09:17', 0),
(15, 'Hi', 'Hello', 3, 0, '2016-02-20 14:10:15', 0),
(16, 'What is anp?', 'laksd', 4, 1, '2016-02-20 14:26:22', 0),
(17, 'Fianl', 'Fianl', 4, 0, '2016-02-21 18:55:54', 0),
(18, '', '', 4, 0, '2016-02-21 18:56:54', 0),
(19, '', '', 4, 0, '2016-02-21 19:09:08', 0),
(20, '', '', 4, 0, '2016-02-21 19:09:28', 0),
(21, 'Hey', 'Done bro', 4, 0, '2016-02-21 20:21:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `answer_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag_rel`
--

CREATE TABLE IF NOT EXISTS `tag_rel` (
  `article_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_rel`
--

INSERT INTO `tag_rel` (`article_id`, `Topic_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag_rel_questions`
--

CREATE TABLE IF NOT EXISTS `tag_rel_questions` (
  `question_id` bigint(20) NOT NULL,
  `topic_tag` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_rel_questions`
--

INSERT INTO `tag_rel_questions` (`question_id`, `topic_tag`) VALUES
(14, 'anp'),
(15, 'anp'),
(16, 'anp'),
(17, 'anp'),
(21, 'anp');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `tag` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=979 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `tag`) VALUES
(1, 'ANP', 'anp'),
(2, 'AGRDEED', 'agr'),
(736, 'Aiding & Abetting / Accessory', 'aiding & abetting / accessory'),
(737, 'Assault ', 'assault '),
(738, 'arson', 'arson'),
(739, 'Adoption', 'adoption'),
(740, 'abduction', 'abduction'),
(741, 'Aggravated Assault ', 'aggravated assault '),
(742, 'Attempt', 'attempt'),
(743, 'Alienation', 'alienation'),
(744, 'Appeals', 'appeals'),
(745, 'Arbitration', 'arbitration'),
(746, 'Arrest and Warrants', 'arrest and warrants'),
(747, 'Adultery', 'adultery'),
(748, 'Alimony', 'alimony'),
(749, 'Air pollution', 'air pollution'),
(750, 'Affray', 'affray'),
(751, 'Abatement', 'abatement'),
(752, 'Age discrimination', 'age discrimination'),
(753, 'Aleatory contract', 'aleatory contract'),
(754, 'Alternative pleading', 'alternative pleading'),
(755, 'Antinuptial agreement', 'antinuptial agreement'),
(756, 'Anticipatory breach / repudiation', 'anticipatory breach / repudiatio'),
(757, 'Acquisition', 'acquisition'),
(758, 'Battery', 'battery'),
(759, 'Banking', 'banking'),
(760, 'Bribery', 'bribery'),
(761, 'Burglary', 'burglary'),
(762, 'Business and commercial law', 'business and commercial law'),
(763, 'Bail', 'bail'),
(764, 'barratry', 'barratry'),
(765, 'bottomry', 'bottomry'),
(766, 'breach', 'breach'),
(767, 'bigamy', 'bigamy'),
(768, 'Child Abandonment', 'child abandonment'),
(769, 'Child abuse', 'child abuse'),
(770, 'child Pornography', 'child pornography'),
(771, 'cyber crime', 'cyber crime'),
(772, 'conspiracy', 'conspiracy'),
(773, 'Child labour', 'child labour'),
(774, 'Criminal Contempt of Court', 'criminal contempt of court'),
(775, 'cyber bullying', 'cyber bullying'),
(776, 'Contract', 'contract'),
(777, 'Constitution and Law procedure', 'constitution and law procedure'),
(778, 'citizenship', 'citizenship'),
(779, 'Civil procedure code jurisdiction', 'civil procedure code jurisdictio'),
(780, 'Consumer rights', 'consumer rights'),
(781, 'Consumer protection act', 'consumer protection act'),
(782, 'Corporate law', 'corporate law'),
(783, 'Criminal law', 'criminal law'),
(784, 'Causing death by negligence', 'causing death by negligence'),
(785, 'Child support', 'child support'),
(786, 'Concealment of former marriage', 'concealment of former marriage'),
(787, 'Criminal intimidation', 'criminal intimidation'),
(788, 'Criminal Misappropriation of property', 'criminal misappropriation of pro'),
(789, 'Copyright', 'copyright'),
(790, 'Central excise', 'central excise'),
(791, 'Custom duty', 'custom duty'),
(792, 'Culpable homicide', 'culpable homicide'),
(793, 'carnal knowledge', 'carnal knowledge'),
(794, 'collusion', 'collusion'),
(795, 'capital offense', 'capital offense'),
(796, 'counterfeiting', 'counterfeiting'),
(797, 'contempt', 'contempt'),
(798, 'concealment', 'concealment'),
(799, 'cheating', 'cheating'),
(800, 'compensation', 'compensation'),
(801, 'cheque bounce', 'cheque bounce'),
(802, 'Dacoity', 'dacoity'),
(803, 'Drug possession', 'drug possession'),
(804, 'disorderly conduct', 'disorderly conduct'),
(805, 'dishoner of cheque', 'dishoner of cheque'),
(806, 'Dowry', 'dowry'),
(807, 'Dowry death', 'dowry death'),
(808, 'Death sentence', 'death sentence'),
(809, 'domestic violence', 'domestic violence'),
(810, 'drug manufacturing and cultivation', 'drug manufacturing and cultivati'),
(811, 'drug trafficking / distribution', 'drug trafficking / distribution'),
(812, 'DWI(Driving while intoxicated)', 'dwi(driving while intoxicated)'),
(813, 'Debt', 'debt'),
(814, 'Defamation', 'defamation'),
(815, 'Divorce', 'divorce'),
(816, 'Defense of property', 'defense of property'),
(817, 'Dual citizenship', 'dual citizenship'),
(818, 'date rape', 'date rape'),
(819, 'demurrer', 'demurrer'),
(820, 'devolution of power', 'devolution of power'),
(821, 'deportation', 'deportation'),
(822, 'desertion', 'desertion'),
(823, 'depredation', 'depredation'),
(824, 'documentation', 'documentation'),
(825, 'Embezzlement', 'embezzlement'),
(826, 'extortion', 'extortion'),
(827, 'Exchange of organs', 'exchange of organs'),
(828, 'Environmental law', 'environmental law'),
(829, 'Environmental protection', 'environmental protection'),
(830, 'Eviction', 'eviction'),
(831, 'emancipation of minors', 'emancipation of minors'),
(832, 'endowment', 'endowment'),
(833, 'entrapment', 'entrapment'),
(834, 'espionage', 'espionage'),
(835, 'extradition', 'extradition'),
(836, 'Felony', 'felony'),
(837, 'forgery', 'forgery'),
(838, 'fraud', 'fraud'),
(839, 'furnishing false information', 'furnishing false information'),
(840, 'fabricating false evidence', 'fabricating false evidence'),
(841, 'family courts', 'family courts'),
(842, 'FIR', 'fir'),
(843, 'Food adulteration', 'food adulteration'),
(844, 'false pretense', 'false pretense'),
(845, 'falsification of accounts', 'falsification of accounts'),
(846, 'Gifts under hindu law', 'gifts under hindu law'),
(847, 'grand larceny', 'grand larceny'),
(848, 'genocide', 'genocide'),
(849, 'gambling', 'gambling'),
(850, 'Harassment', 'harassment'),
(851, 'hate crimes', 'hate crimes'),
(852, 'homicide', 'homicide'),
(853, 'hostile witness', 'hostile witness'),
(854, 'Hire purchase', 'hire purchase'),
(855, 'Human trafficking', 'human trafficking'),
(856, 'Harbouring deserter', 'harbouring deserter'),
(857, 'hit and run', 'hit and run'),
(858, 'holdover tenancy', 'holdover tenancy'),
(859, 'human rights', 'human rights'),
(860, 'indecent exposure', 'indecent exposure'),
(861, 'Identity Theft', 'identity theft'),
(862, 'Insurance Fraud', 'insurance fraud'),
(863, 'Inheritance', 'inheritance'),
(864, 'Intellectual property', 'intellectual property'),
(865, 'Indian value added tax (VAT)', 'indian value added tax (vat)'),
(866, 'Insurance', 'insurance'),
(867, 'indictment', 'indictment'),
(868, 'infringement', 'infringement'),
(869, 'insolvency', 'insolvency'),
(870, 'intrinsic fraud', 'intrinsic fraud'),
(871, 'immigration', 'immigration'),
(872, 'international law', 'international law'),
(873, 'Kidnapping', 'kidnapping'),
(874, 'Litigation against company', 'litigation against company'),
(875, 'Limited Liability Partnership', 'limited liability partnership'),
(876, 'Labour law', 'labour law'),
(877, 'Lease', 'lease'),
(878, 'Laws of anti dumping in India', 'laws of anti dumping in india'),
(879, 'larceny', 'larceny'),
(880, 'lynching', 'lynching'),
(881, 'legal malpractice', 'legal malpractice'),
(882, 'landlord/tenant', 'landlord/tenant'),
(883, 'Maternity benefits', 'maternity benefits'),
(884, 'manslaughter', 'manslaughter'),
(885, 'Maintenance of wife', 'maintenance of wife'),
(886, 'Marriage law', 'marriage law'),
(887, 'minority and guardianship', 'minority and guardianship'),
(888, 'Minor in Possession', 'minor in possession'),
(889, 'Money Laundering', 'money laundering'),
(890, 'Mortgage', 'mortgage'),
(891, 'murder', 'murder'),
(892, 'maintenance in hindus', 'maintenance in hindus'),
(893, 'medical negligence', 'medical negligence'),
(894, 'Monopolistic and Restrictive Trade Pract', 'monopolistic and restrictive tra'),
(895, 'misdemeanor', 'misdemeanor'),
(896, 'maiming', 'maiming'),
(897, 'misrepresentation', 'misrepresentation'),
(898, 'mutual wills', 'mutual wills'),
(899, 'mutiny', 'mutiny'),
(900, 'Nullity of marriage', 'nullity of marriage'),
(901, 'negligent conduct', 'negligent conduct'),
(902, 'neligence', 'neligence'),
(903, 'Obscene Acts and Songs', 'obscene acts and songs'),
(904, 'One person company', 'one person company'),
(905, 'Obscenity', 'obscenity'),
(906, 'Parentage', 'parentage'),
(907, 'Partition', 'partition'),
(908, 'Perjury', 'perjury'),
(909, 'Probation Violation', 'probation violation'),
(910, 'prostitution', 'prostitution'),
(911, 'public intoxication', 'public intoxication'),
(912, 'Pre-emption', 'pre-emption'),
(913, 'Pyramid Schemes', 'pyramid schemes'),
(914, 'Partnership', 'partnership'),
(915, 'Public interest litigation', 'public interest litigation'),
(916, 'Private limited company', 'private limited company'),
(917, 'Patent', 'patent'),
(918, 'Provident fund', 'provident fund'),
(919, 'Palimony', 'palimony'),
(920, 'pandering', 'pandering'),
(921, 'parental neglect', 'parental neglect'),
(922, 'property', 'property'),
(923, 'piracy', 'piracy'),
(924, 'Racketeering', 'racketeering'),
(925, 'Rape', 'rape'),
(926, 'Robbery', 'robbery'),
(927, 'Rioting', 'rioting'),
(928, 'Right to private defense', 'right to private defense'),
(929, 'Right to information', 'right to information'),
(930, 'Recovery', 'recovery'),
(931, 'Sale of property', 'sale of property'),
(932, 'Service tax', 'service tax'),
(933, 'Sexual Assault', 'sexual assault'),
(934, 'shoplifting', 'shoplifting'),
(935, 'solicitation', 'solicitation'),
(936, 'stalking', 'stalking'),
(937, 'statutory rape', 'statutory rape'),
(938, 'Succession', 'succession'),
(939, 'Sexual harassment at workplace', 'sexual harassment at workplace'),
(940, 'Summons', 'summons'),
(941, 'Society act', 'society act'),
(942, 'Sale of goods', 'sale of goods'),
(943, 'Shares', 'shares'),
(944, 'Suits', 'suits'),
(945, 'sodomy', 'sodomy'),
(946, 'sedition', 'sedition'),
(947, 'severable contract', 'severable contract'),
(948, 'social justice', 'social justice'),
(949, 'securitisation', 'securitisation'),
(950, 'startups', 'startups'),
(951, 'Tax Evasion', 'tax evasion'),
(952, 'Telemarketing Fraud', 'telemarketing fraud'),
(953, 'Trust and society', 'trust and society'),
(954, 'Theft', 'theft'),
(955, 'Trademark', 'trademark'),
(956, 'Trade unions', 'trade unions'),
(957, 'terrorism', 'terrorism'),
(958, 'trafficking', 'trafficking'),
(959, 'trusts', 'trusts'),
(960, 'trespassing', 'trespassing'),
(961, 'Vandalism', 'vandalism'),
(962, 'Wills', 'wills'),
(963, 'Wildlife protection', 'wildlife protection'),
(964, 'Winding up of a company', 'winding up of a company'),
(965, 'White collar crimes', 'white collar crimes'),
(966, 'Wire fraud', 'wire fraud'),
(967, 'waging', 'waging');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(64) NOT NULL,
  `reset_pass` varchar(64) DEFAULT NULL,
  `user_type` char(2) NOT NULL,
  `url` text NOT NULL,
  `first_time` tinyint(4) NOT NULL DEFAULT '1',
  `free_doc` tinyint(4) NOT NULL DEFAULT '1',
  `promo_code` varchar(20) DEFAULT NULL,
  `package_subscribed` int(10) NOT NULL,
  `package_docs` int(11) NOT NULL,
  `package_begindate` datetime NOT NULL,
  `package_enddate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `password`, `is_activated`, `activation_key`, `reset_pass`, `user_type`, `url`, `first_time`, `free_doc`, `promo_code`, `package_subscribed`, `package_docs`, `package_begindate`, `package_enddate`) VALUES
(1, 'pankaj.arora1994@gmail.com', 'pankaj', 'Arora', 'pankaj.arora1994@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', '', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'pankaj.arora1994', 'pankaj', 'Arora', 'pankaj.arora1995@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', 'l', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'pankaj.arora', 'pankaj', 'Arora', 'pankaj.arora1996@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '', 'nxQCMA4ouEm2Yi5N', 's', '', 1, 1, NULL, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'psoqlmd', 'Deep', 'Vyas', 'vyasdeep.dv@gmail.com', 'hello123', 1, '', NULL, 'l', 'heyyee', 1, 1, NULL, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_lawyer`
--

CREATE TABLE IF NOT EXISTS `user_lawyer` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `acc_type` varchar(64) NOT NULL DEFAULT 'Advocate',
  `phone` varchar(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `school` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `practice_areas` varchar(200) NOT NULL,
  `court` varchar(100) NOT NULL,
  `office_address` text NOT NULL,
  `work_exp` text NOT NULL,
  `achievements` text NOT NULL,
  `summary` text NOT NULL,
  `associations` text NOT NULL,
  `council_id` varchar(12) NOT NULL,
  `publication` text NOT NULL,
  `date` date NOT NULL,
  `office_number` int(15) NOT NULL,
  `personal_num` int(15) NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT 'No website to show',
  `google_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `consultation_fees` int(64) NOT NULL,
  `review_fees` int(64) NOT NULL,
  `preference` text NOT NULL,
  `pic_link` varchar(255) NOT NULL DEFAULT 'img/def_pic.png',
  `practice_city` varchar(100) NOT NULL,
  `practice_state` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_lawyer`
--

INSERT INTO `user_lawyer` (`id`, `username`, `acc_type`, `phone`, `age`, `sex`, `school`, `college`, `practice_areas`, `court`, `office_address`, `work_exp`, `achievements`, `summary`, `associations`, `council_id`, `publication`, `date`, `office_number`, `personal_num`, `website`, `google_link`, `linkedin_link`, `twitter_link`, `consultation_fees`, `review_fees`, `preference`, `pic_link`, `practice_city`, `practice_state`) VALUES
(1, 'psoqlmd', 'Advocate', 'p', 12, 'Male', 'p', 'p', 'opel', 'district court', 'p', 'p', 'p', 'p', 'p', '', 'p', '0000-00-00', 0, 0, 'No website to show', '', '', '', 0, 0, '', '', 'p', 'p'),
(2, 'ppknolmlk.ml;', 'Advocate', 'p', 12, 'Male', 'p', 'p', 'saab', 'district court', 'p', 'p', 'p', 'p', 'p', '', 'p', '0000-00-00', 0, 0, 'No website to show', '', '', '', 0, 0, '', '', 'p', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `votes_a_rel`
--

CREATE TABLE IF NOT EXISTS `votes_a_rel` (
  `user_id` bigint(20) NOT NULL,
  `answer_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes_a_rel`
--

INSERT INTO `votes_a_rel` (`user_id`, `answer_id`) VALUES
(2, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 2),
(3, 3),
(3, 7),
(3, 9),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `votes_c_rel`
--

CREATE TABLE IF NOT EXISTS `votes_c_rel` (
  `comment_id` bigint(20) NOT NULL,
  `usser_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes_c_rel`
--

INSERT INTO `votes_c_rel` (`comment_id`, `usser_id`) VALUES
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(21, 4),
(23, 3),
(28, 4),
(29, 4),
(30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `votes_q_rel`
--

CREATE TABLE IF NOT EXISTS `votes_q_rel` (
  `user_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes_q_rel`
--

INSERT INTO `votes_q_rel` (`user_id`, `question_id`) VALUES
(3, 1),
(3, 1),
(3, 1),
(3, 2),
(4, 6),
(4, 7),
(4, 9),
(4, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_questions` (`question_id`), ADD KEY `fk_use` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_articles` (`user_id`), ADD KEY `fk_topics` (`topic`);

--
-- Indexes for table `article_vote_rel`
--
ALTER TABLE `article_vote_rel`
  ADD KEY `user_id` (`user_id`), ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comments_a`
--
ALTER TABLE `comments_a`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_user` (`user_id`), ADD KEY `fk_answers` (`answer_id`);

--
-- Indexes for table `comments_articles`
--
ALTER TABLE `comments_articles`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`article_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `comments_q`
--
ALTER TABLE `comments_q`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_user's` (`user_id`), ADD KEY `fk_question` (`question_id`);

--
-- Indexes for table `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question` (`comment_id`), ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `comment_vote_rel`
--
ALTER TABLE `comment_vote_rel`
  ADD KEY `comment_id` (`comment_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_users` (`user_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_ques` (`user_id`), ADD KEY `fk_anw` (`answer_id`);

--
-- Indexes for table `tag_rel`
--
ALTER TABLE `tag_rel`
  ADD KEY `topic` (`Topic_id`), ADD KEY `article` (`article_id`);

--
-- Indexes for table `tag_rel_questions`
--
ALTER TABLE `tag_rel_questions`
  ADD KEY `question_id` (`question_id`), ADD KEY `topic_tag` (`question_id`,`topic_tag`), ADD KEY `fk_tag` (`topic_tag`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_lawyer`
--
ALTER TABLE `user_lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes_a_rel`
--
ALTER TABLE `votes_a_rel`
  ADD KEY `user_id` (`user_id`), ADD KEY `answer_id` (`user_id`,`answer_id`), ADD KEY `fk_vt` (`answer_id`);

--
-- Indexes for table `votes_c_rel`
--
ALTER TABLE `votes_c_rel`
  ADD KEY `index_c` (`comment_id`,`usser_id`), ADD KEY `fk_usee` (`usser_id`);

--
-- Indexes for table `votes_q_rel`
--
ALTER TABLE `votes_q_rel`
  ADD KEY `rel_index` (`user_id`,`question_id`), ADD KEY `fk_qui` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments_a`
--
ALTER TABLE `comments_a`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `comments_articles`
--
ALTER TABLE `comments_articles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments_q`
--
ALTER TABLE `comments_q`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=979;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_lawyer`
--
ALTER TABLE `user_lawyer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
ADD CONSTRAINT `fk_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_use` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `fk_articles` FOREIGN KEY (`user_id`) REFERENCES `user_lawyer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_topics` FOREIGN KEY (`topic`) REFERENCES `topics` (`tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_vote_rel`
--
ALTER TABLE `article_vote_rel`
ADD CONSTRAINT `fkey_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fkey_usersid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_a`
--
ALTER TABLE `comments_a`
ADD CONSTRAINT `fk_answers` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_q`
--
ALTER TABLE `comments_q`
ADD CONSTRAINT `fk_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
ADD CONSTRAINT `fk_user's` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_vote_rel`
--
ALTER TABLE `comment_vote_rel`
ADD CONSTRAINT `fk_comments` FOREIGN KEY (`comment_id`) REFERENCES `comments_articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fkey_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
ADD CONSTRAINT `fk_anw` FOREIGN KEY (`answer_id`) REFERENCES `comments_a` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ques` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_rel`
--
ALTER TABLE `tag_rel`
ADD CONSTRAINT `fk_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_topic` FOREIGN KEY (`Topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_rel_questions`
--
ALTER TABLE `tag_rel_questions`
ADD CONSTRAINT `fk_q` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_tag` FOREIGN KEY (`topic_tag`) REFERENCES `topics` (`tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes_a_rel`
--
ALTER TABLE `votes_a_rel`
ADD CONSTRAINT `fk_us` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_vt` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`);

--
-- Constraints for table `votes_c_rel`
--
ALTER TABLE `votes_c_rel`
ADD CONSTRAINT `fk_comment` FOREIGN KEY (`comment_id`) REFERENCES `comments_a` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_usee` FOREIGN KEY (`usser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes_q_rel`
--
ALTER TABLE `votes_q_rel`
ADD CONSTRAINT `fk_qui` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_u` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
