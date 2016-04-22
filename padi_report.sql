-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2016 at 09:38 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padi_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id_assessment` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id_assessment`, `id_domain`, `date`) VALUES
(153, 6, '2016-04-20 09:46:11'),
(154, 7, '2016-04-20 09:55:30'),
(155, 8, '2016-04-20 09:58:38'),
(156, 8, '2016-04-20 10:01:42'),
(157, 6, '2016-04-20 16:36:53'),
(158, 6, '2016-04-20 16:51:17'),
(159, 7, '2016-04-21 09:58:51'),
(160, 6, '2016-04-22 09:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_detail`
--

CREATE TABLE `assessment_detail` (
  `id_assessment_detail` int(11) NOT NULL,
  `id_assessment` int(11) NOT NULL,
  `id_point` int(11) NOT NULL,
  `id_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_detail`
--

INSERT INTO `assessment_detail` (`id_assessment_detail`, `id_assessment`, `id_point`, `id_result`) VALUES
(398, 154, 5, 521),
(399, 154, 4, 522),
(400, 154, 3, 523),
(401, 154, 2, 524),
(402, 154, 1, 525),
(403, 154, 9, 526),
(404, 154, 8, 527),
(405, 154, 7, 528),
(406, 154, 6, 529),
(407, 154, 12, 530),
(408, 154, 11, 531),
(409, 154, 10, 532),
(410, 154, 16, 533),
(411, 154, 15, 534),
(412, 154, 14, 535),
(413, 154, 13, 536),
(414, 154, 18, 537),
(415, 154, 17, 538),
(416, 154, 21, 539),
(417, 154, 20, 540),
(418, 154, 19, 541),
(419, 154, 24, 542),
(420, 154, 23, 543),
(421, 154, 22, 544),
(422, 154, 27, 545),
(423, 154, 26, 546),
(424, 154, 25, 547),
(425, 154, 29, 548),
(426, 154, 28, 549),
(427, 154, 31, 550),
(428, 154, 30, 551),
(429, 154, 34, 552),
(430, 154, 33, 553),
(431, 154, 32, 554),
(432, 154, 36, 555),
(433, 154, 35, 556),
(434, 154, 37, 557),
(435, 154, 39, 558),
(436, 154, 38, 559),
(437, 154, 41, 560),
(438, 154, 40, 561),
(439, 154, 44, 562),
(440, 154, 43, 563),
(441, 154, 42, 564),
(442, 154, 46, 565),
(443, 154, 45, 566),
(444, 154, 51, 567),
(445, 154, 50, 568),
(446, 154, 49, 569),
(447, 154, 48, 570),
(448, 154, 47, 571),
(449, 154, 56, 572),
(450, 154, 55, 573),
(451, 154, 54, 574),
(452, 154, 53, 575),
(453, 154, 52, 576),
(454, 154, 61, 577),
(455, 154, 60, 578),
(456, 154, 59, 579),
(457, 154, 58, 580),
(458, 154, 57, 581),
(459, 154, 62, 582),
(460, 154, 65, 583),
(461, 154, 64, 584),
(462, 154, 63, 585),
(463, 154, 68, 586),
(464, 154, 67, 587),
(465, 154, 66, 588),
(466, 155, 5, 589),
(467, 155, 4, 590),
(468, 155, 3, 591),
(469, 155, 2, 592),
(470, 155, 1, 593),
(471, 155, 9, 594),
(472, 155, 8, 595),
(473, 155, 7, 596),
(474, 155, 6, 597),
(475, 155, 12, 598),
(476, 155, 11, 599),
(477, 155, 10, 600),
(478, 155, 16, 601),
(479, 155, 15, 602),
(480, 155, 14, 603),
(481, 155, 13, 604),
(482, 155, 18, 605),
(483, 155, 17, 606),
(484, 155, 21, 607),
(485, 155, 20, 608),
(486, 155, 19, 609),
(487, 155, 24, 610),
(488, 155, 23, 611),
(489, 155, 22, 612),
(490, 155, 27, 613),
(491, 155, 26, 614),
(492, 155, 25, 615),
(493, 155, 29, 616),
(494, 155, 28, 617),
(495, 155, 31, 618),
(496, 155, 30, 619),
(497, 155, 34, 620),
(498, 155, 33, 621),
(499, 155, 32, 622),
(500, 155, 36, 623),
(501, 155, 35, 624),
(502, 155, 37, 625),
(503, 155, 39, 626),
(504, 155, 38, 627),
(505, 155, 41, 628),
(506, 155, 40, 629),
(507, 155, 44, 630),
(508, 155, 43, 631),
(509, 155, 42, 632),
(510, 155, 46, 633),
(511, 155, 45, 634),
(512, 155, 51, 635),
(513, 155, 50, 636),
(514, 155, 49, 637),
(515, 155, 48, 638),
(516, 155, 47, 639),
(517, 155, 56, 640),
(518, 155, 55, 641),
(519, 155, 54, 642),
(520, 155, 53, 643),
(521, 155, 52, 644),
(522, 155, 61, 645),
(523, 155, 60, 646),
(524, 155, 59, 647),
(525, 155, 58, 648),
(526, 155, 57, 649),
(527, 155, 62, 650),
(528, 155, 65, 651),
(529, 155, 64, 652),
(530, 155, 63, 653),
(531, 155, 68, 654),
(532, 155, 67, 655),
(533, 155, 66, 656),
(534, 156, 5, 657),
(535, 156, 4, 658),
(536, 156, 3, 659),
(537, 156, 2, 660),
(538, 156, 1, 661),
(539, 156, 9, 662),
(540, 156, 8, 663),
(541, 156, 7, 664),
(542, 156, 6, 665),
(543, 156, 12, 666),
(544, 156, 11, 667),
(545, 156, 10, 668),
(546, 156, 16, 669),
(547, 156, 15, 670),
(548, 156, 14, 671),
(549, 156, 13, 672),
(550, 156, 18, 673),
(551, 156, 17, 674),
(552, 156, 21, 675),
(553, 156, 20, 676),
(554, 156, 19, 677),
(555, 156, 24, 678),
(556, 156, 23, 679),
(557, 156, 22, 680),
(558, 156, 27, 681),
(559, 156, 26, 682),
(560, 156, 25, 683),
(561, 156, 29, 684),
(562, 156, 28, 685),
(563, 156, 31, 686),
(564, 156, 30, 687),
(565, 156, 34, 688),
(566, 156, 33, 689),
(567, 156, 32, 690),
(568, 156, 36, 691),
(569, 156, 35, 692),
(570, 156, 37, 693),
(571, 156, 39, 694),
(572, 156, 38, 695),
(573, 156, 41, 696),
(574, 156, 40, 697),
(575, 156, 44, 698),
(576, 156, 43, 699),
(577, 156, 42, 700),
(578, 156, 46, 701),
(579, 156, 45, 702),
(580, 156, 51, 703),
(581, 156, 50, 704),
(582, 156, 49, 705),
(583, 156, 48, 706),
(584, 156, 47, 707),
(585, 156, 56, 708),
(586, 156, 55, 709),
(587, 156, 54, 710),
(588, 156, 53, 711),
(589, 156, 52, 712),
(590, 156, 61, 713),
(591, 156, 60, 714),
(592, 156, 59, 715),
(593, 156, 58, 716),
(594, 156, 57, 717),
(595, 156, 62, 718),
(596, 156, 65, 719),
(597, 156, 64, 720),
(598, 156, 63, 721),
(599, 156, 68, 722),
(600, 156, 67, 723),
(601, 156, 66, 724),
(602, 157, 1, 725),
(603, 157, 2, 726),
(604, 157, 3, 727),
(605, 157, 4, 728),
(606, 157, 5, 729),
(607, 157, 6, 730),
(608, 157, 7, 731),
(609, 157, 8, 732),
(610, 157, 9, 733),
(611, 157, 10, 734),
(612, 157, 11, 735),
(613, 157, 12, 736),
(614, 157, 13, 737),
(615, 157, 14, 738),
(616, 157, 15, 739),
(617, 157, 16, 740),
(618, 157, 17, 741),
(619, 157, 18, 742),
(620, 157, 19, 743),
(621, 157, 20, 744),
(622, 157, 21, 745),
(623, 157, 22, 746),
(624, 157, 23, 747),
(625, 157, 24, 748),
(626, 157, 25, 749),
(627, 157, 26, 750),
(628, 157, 27, 751),
(629, 157, 28, 752),
(630, 157, 29, 753),
(631, 157, 30, 754),
(632, 157, 31, 755),
(633, 157, 32, 756),
(634, 157, 33, 757),
(635, 157, 34, 758),
(636, 157, 35, 759),
(637, 157, 36, 760),
(638, 157, 37, 761),
(639, 157, 38, 762),
(640, 157, 39, 763),
(641, 157, 40, 764),
(642, 157, 41, 765),
(643, 157, 42, 766),
(644, 157, 43, 767),
(645, 157, 44, 768),
(646, 157, 45, 769),
(647, 157, 46, 770),
(648, 157, 47, 771),
(649, 157, 48, 772),
(650, 157, 49, 773),
(651, 157, 50, 774),
(652, 157, 51, 775),
(653, 157, 52, 776),
(654, 157, 53, 777),
(655, 157, 54, 778),
(656, 157, 55, 779),
(657, 157, 56, 780),
(658, 157, 57, 781),
(659, 157, 58, 782),
(660, 157, 59, 783),
(661, 157, 60, 784),
(662, 157, 61, 785),
(663, 157, 62, 786),
(664, 157, 63, 787),
(665, 157, 64, 788),
(666, 157, 65, 789),
(667, 157, 66, 790),
(668, 157, 67, 791),
(669, 157, 68, 792),
(670, 158, 1, 793),
(671, 158, 2, 794),
(672, 158, 3, 795),
(673, 158, 4, 796),
(674, 158, 5, 797),
(675, 158, 6, 798),
(676, 158, 7, 799),
(677, 158, 8, 800),
(678, 158, 9, 801),
(679, 158, 10, 802),
(680, 158, 11, 803),
(681, 158, 12, 804),
(682, 158, 13, 805),
(683, 158, 14, 806),
(684, 158, 15, 807),
(685, 158, 16, 808),
(686, 158, 17, 809),
(687, 158, 18, 810),
(688, 158, 19, 811),
(689, 158, 20, 812),
(690, 158, 21, 813),
(691, 158, 22, 814),
(692, 158, 23, 815),
(693, 158, 24, 816),
(694, 158, 25, 817),
(695, 158, 26, 818),
(696, 158, 27, 819),
(697, 158, 28, 820),
(698, 158, 29, 821),
(699, 158, 30, 822),
(700, 158, 31, 823),
(701, 158, 32, 824),
(702, 158, 33, 825),
(703, 158, 34, 826),
(704, 158, 35, 827),
(705, 158, 36, 828),
(706, 158, 37, 829),
(707, 158, 38, 830),
(708, 158, 39, 831),
(709, 158, 40, 832),
(710, 158, 41, 833),
(711, 158, 42, 834),
(712, 158, 43, 835),
(713, 158, 44, 836),
(714, 158, 45, 837),
(715, 158, 46, 838),
(716, 158, 47, 839),
(717, 158, 48, 840),
(718, 158, 49, 841),
(719, 158, 50, 842),
(720, 158, 51, 843),
(721, 158, 52, 844),
(722, 158, 53, 845),
(723, 158, 54, 846),
(724, 158, 55, 847),
(725, 158, 56, 848),
(726, 158, 57, 849),
(727, 158, 58, 850),
(728, 158, 59, 851),
(729, 158, 60, 852),
(730, 158, 61, 853),
(731, 158, 62, 854),
(732, 158, 63, 855),
(733, 158, 64, 856),
(734, 158, 65, 857),
(735, 158, 66, 858),
(736, 158, 67, 859),
(737, 158, 68, 860),
(738, 159, 1, 861),
(739, 159, 2, 862),
(740, 159, 3, 863),
(741, 159, 4, 864),
(742, 159, 5, 865),
(743, 159, 6, 866),
(744, 159, 7, 867),
(745, 159, 8, 868),
(746, 159, 9, 869),
(747, 159, 10, 870),
(748, 159, 11, 871),
(749, 159, 12, 872),
(750, 159, 13, 873),
(751, 159, 14, 874),
(752, 159, 15, 875),
(753, 159, 16, 876),
(754, 159, 17, 877),
(755, 159, 18, 878),
(756, 159, 19, 879),
(757, 159, 20, 880),
(758, 159, 21, 881),
(759, 159, 22, 882),
(760, 159, 23, 883),
(761, 159, 24, 884),
(762, 159, 25, 885),
(763, 159, 26, 886),
(764, 159, 27, 887),
(765, 159, 28, 888),
(766, 159, 29, 889),
(767, 159, 30, 890),
(768, 159, 31, 891),
(769, 159, 32, 892),
(770, 159, 33, 893),
(771, 159, 34, 894),
(772, 159, 35, 895),
(773, 159, 36, 896),
(774, 159, 37, 897),
(775, 159, 38, 898),
(776, 159, 39, 899),
(777, 159, 40, 900),
(778, 159, 41, 901),
(779, 159, 42, 902),
(780, 159, 43, 903),
(781, 159, 44, 904),
(782, 159, 45, 905),
(783, 159, 46, 906),
(784, 159, 47, 907),
(785, 159, 48, 908),
(786, 159, 49, 909),
(787, 159, 50, 910),
(788, 159, 51, 911),
(789, 159, 52, 912),
(790, 159, 53, 913),
(791, 159, 54, 914),
(792, 159, 55, 915),
(793, 159, 56, 916),
(794, 159, 57, 917),
(795, 159, 58, 918),
(796, 159, 59, 919),
(797, 159, 60, 920),
(798, 159, 61, 921),
(799, 159, 62, 922),
(800, 159, 63, 923),
(801, 159, 64, 924),
(802, 159, 65, 925),
(803, 159, 66, 926),
(804, 159, 67, 927),
(805, 159, 68, 928),
(806, 160, 1, 929),
(807, 160, 2, 930),
(808, 160, 3, 931),
(809, 160, 4, 932),
(810, 160, 5, 933),
(811, 160, 6, 934),
(812, 160, 7, 935),
(813, 160, 8, 936),
(814, 160, 9, 937),
(815, 160, 10, 938),
(816, 160, 11, 939),
(817, 160, 12, 940),
(818, 160, 13, 941),
(819, 160, 14, 942),
(820, 160, 15, 943),
(821, 160, 16, 944),
(822, 160, 17, 945),
(823, 160, 18, 946),
(824, 160, 19, 947),
(825, 160, 20, 948),
(826, 160, 21, 949),
(827, 160, 22, 950),
(828, 160, 23, 951),
(829, 160, 24, 952),
(830, 160, 25, 953),
(831, 160, 26, 954),
(832, 160, 27, 955),
(833, 160, 28, 956),
(834, 160, 29, 957),
(835, 160, 30, 958),
(836, 160, 31, 959),
(837, 160, 32, 960),
(838, 160, 33, 961),
(839, 160, 34, 962),
(840, 160, 35, 963),
(841, 160, 36, 964),
(842, 160, 37, 965),
(843, 160, 38, 966),
(844, 160, 39, 967),
(845, 160, 40, 968),
(846, 160, 41, 969),
(847, 160, 42, 970),
(848, 160, 43, 971),
(849, 160, 44, 972),
(850, 160, 45, 973),
(851, 160, 46, 974),
(852, 160, 47, 975),
(853, 160, 48, 976),
(854, 160, 49, 977),
(855, 160, 50, 978),
(856, 160, 51, 979),
(857, 160, 52, 980),
(858, 160, 53, 981),
(859, 160, 54, 982),
(860, 160, 55, 983),
(861, 160, 56, 984),
(862, 160, 57, 985),
(863, 160, 58, 986),
(864, 160, 59, 987),
(865, 160, 60, 988),
(866, 160, 61, 989),
(867, 160, 62, 990),
(868, 160, 63, 991),
(869, 160, 64, 992),
(870, 160, 65, 993),
(871, 160, 66, 994),
(872, 160, 67, 995),
(873, 160, 68, 996);

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id_domain` int(11) NOT NULL,
  `url` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id_domain`, `url`) VALUES
(1, 'google.com'),
(2, 'yahoo.com'),
(3, 'facebook.com'),
(4, 'facebook2.com'),
(5, 'twitter.com'),
(6, ''),
(7, 'google3.com'),
(8, 'google4.com'),
(9, 'google2.com');

-- --------------------------------------------------------

--
-- Table structure for table `personal_judgement`
--

CREATE TABLE `personal_judgement` (
  `id_personal_judgement` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `point_name` varchar(100) NOT NULL,
  `point_desc` text NOT NULL,
  `point_what_need_fixing` text NOT NULL,
  `point_who_can_fix` varchar(128) NOT NULL,
  `point_how_to_fix` text NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point_check`
--

CREATE TABLE `point_check` (
  `id_point` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `id_section` int(11) DEFAULT NULL,
  `point_name` varchar(100) NOT NULL,
  `point_desc` text NOT NULL,
  `point_what_need_fixing` text NOT NULL,
  `point_who_can_fix` varchar(128) NOT NULL,
  `point_how_to_fix` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_check`
--

INSERT INTO `point_check` (`id_point`, `id_source`, `id_section`, `point_name`, `point_desc`, `point_what_need_fixing`, `point_who_can_fix`, `point_how_to_fix`) VALUES
(1, 1, 2, 'Cross browser compatibility', 'no issues viewing the website across multiple browsers.', 'the website displays differently on different browsers.', 'Webmaster', 'You need to ensure that your website looks the same regardless of which browser is opening thewebsite. Your webmaster should be able to add code that will prevent cross browser errors.'),
(2, 1, 2, 'Mobile friendly site', 'allows mobile users to access information clearly and provides a quality user experience.', 'the website does not have a mobile responsive version. When users look at the site from a smart phone or tablet they still see the standard website layout which makes it hard to use for them.', 'Webmaster', 'Mobile users need to see a website layout that is easy for them to use on their device. Create a mobile friendly version of your website that allows users to see the mobile version easily.'),
(3, 1, 2, 'The Footer', 'provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company.', 'the footer section of the website is the perfect place to have your contact details which sends quality signals to Google about your company.', 'Webmaster', 'Place your name, address and telephone number in the footer of your website, on every page. This is a good signal for Google and will help in local search results.'),
(4, 1, 2, 'Visual Layout and Clarity', 'modern, good looking website that is clear and easy to use.', 'the site is very out dated compared to modern web site design and as such does not represent your band well, or come across as user friendly.', 'Webmaster', 'Consider looking into a new fresher design that represents your company more favorably. Your website is the first thing that clients see about your company and so creating a website that looks professional and up to date sends a very strong message about your company. If you use a quality CMS such as WordPress it is much easier to update your theme periodically so that you continue to keep your company image fresh and up to date.'),
(5, 1, 2, 'Quantity of Images', 'lots of quality images illustrate the company and services well.', 'we would expect to see a lot more images across the site to clearly show what your company is all about.', 'Webmaster', 'There are many opportunities to add more images throughout the site. Consider that the user experience is increased when a user can gain an emotional experience with the website. Images allow users to experience the service and as such are vital to the site, as are videos.'),
(6, 1, 3, 'Top level Menu', 'is clear and easy to use.', 'is confusing and hard for users to find their way around the website.', 'Webmaster', 'We would suggest that you keep the header menu simple and easy to use. Drop down menus are very useful if there are not too many, and easy to work with.'),
(7, 1, 3, 'Home page Navigation', 'is clear and easy to use.', 'Aside from the top menu it is confusing how the site link structure fits together. Users should be able to travel through a website with ease, understanding how they move forward or backwards on the site.', 'Webmaster', 'We would suggest that add quality text links within the site to help direct people to the pages that you want them to visit.'),
(8, 1, 3, 'Breadcrumbs', 'is present on the site allowing people to find their way back through the site.', 'When we visit any page on the site we have no idea how we got to that page. Breadcrumbs allow us to follow the route back through the site.', 'Webmaster', 'Ensure that every page has a list of pages to show people how they got there. If using a CMS then there are many plugins that will do this for you. If not, your webmaster will be able to add them.'),
(9, 1, 3, 'Back to top', 'is present on long pages within the site.', 'When you have long pages we suggest that you have a link going back to the top of the page.', 'Webmaster', 'Adding “named anchors” to the page is a simple task for webmasters.'),
(10, 1, 4, 'Sitemaps', 'xml sitemaps are in place and structured correctly.', 'are not installed on the site.', 'Webmaster', 'Ensure that you have an XML sitemap which should be submitted to Google Webmaster tools which allows Google to index all of your pages, posts and images.'),
(11, 1, 4, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.'),
(12, 1, 4, 'Google Analytics', 'is installed on the site.', 'is not installed and thus you won’t be receiving analytical data about your website traffic and performance.', 'Webmaster', 'Setup Google Analytics using your company Gmail account and then install the tracking code on every page of your website to start getting data.'),
(13, 1, 5, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.'),
(14, 1, 5, 'Internal page errors', 'are kept to a minimum.', 'There are broken links of your internal pages that can’t be accessed.', 'Webmaster', 'Fix the broken link and remove unnecessary pages that you don’t need anymore.'),
(15, 1, 5, 'Link types and anchor text , placement and density', 'work well throughout the site.', 'internal text links are almost nonexistent on the site. Internal links allow people to move more effectively around the site. Link density is also too high / low across the site.', 'Webmaster', 'Create relevant links in the body of text on each page to help users direct themselves through the site. Make sure that you use LSI keywords in your links and that they are relevant to the page that is being linked to.'),
(16, 1, 5, 'URL structure', 'is well thought out and consistent with Google’s best SEO guidelines.', '# Tags in the URLS – causes Google to see the site as a single page website and thus they will never rank any of your internal pages, limiting your chances of ranking well in the search engines.', 'Webmaster', 'using # tags in URL’s is problematic unless you are going to use AJAX crawling protocols which have not been established on this site. We have encountered clients who have built websites like this before and tried to source solutions that did not involve making the site again; we are still to find a solution that does not involve doing just that.'),
(17, 1, 6, 'Mobile version page speed', '', '', '', ''),
(18, 1, 6, 'Desktop version page speed', '', '', '', ''),
(19, 1, 7, 'Page Titles', 'are generally unique across the pages.', 'all of your page titles are either duplicated, too long, too short or missing.', 'Webmaster', 'Ensure that on every page there is a unique page title for that page that gives the search engine a good indication what that page is about.'),
(20, 1, 7, 'Meta description', 'are generally uniquely descriptive for each page.', 'multiple examples of duplicate meta descriptions on the site will be causing issues for your rankings.', 'Webmaster', 'Meta Descriptions must be unique for every page. Ask your webmaster to ensure that every page is edited to be different and relevant to the page in question.'),
(21, 1, 7, 'H1 and H2 tags', 'are present, unique and different to page titles.', 'For all the pages on the website every page has some issue with its H tags.', 'Webmaster', 'Content on every page should be structures so that users can easily follow the content. Using H tags allows users to do just that and so each page must have a unique H1 tag and then unique H2 tags also.'),
(22, 1, 8, 'Visually appealing images', 'The site is full of visually appealing images that represent the location and diving very well.', 'Image Quality – there are many images that appear blurry on the site.', 'Webmaster', 'Every image should be optimized so that it is the right size and displays clearly. Blurriness normally occurs when you try to make an image larger than it actually is.'),
(23, 1, 8, 'Image tags', 'are generally fine on the site and well optimized.', 'there are many images on the site that do not have prominent alt tags.', 'Webmaster', 'Every image should have an alt tag that describes the actual image. This is done by editing the code for every image on the site.'),
(24, 1, 8, 'Image Size', 'is ok with most not being too large.', 'the images require optimizing as many of them are too large causing page load speeds to be slow.', 'Webmaster', 'Resize images to ensure they are the exact size that you need on the website.'),
(25, 1, 9, 'Duplicate content warnings', '', '', '', ''),
(26, 1, 9, 'Keyword density', '', '', '', ''),
(27, 1, 9, 'Every product pages', '', '', '', ''),
(28, 1, 10, 'Outbound link profile', '', '', '', ''),
(29, 1, 10, 'Inbound link profile', '', '', '', ''),
(30, 1, 11, 'Hosting quality', '', '', '', ''),
(31, 1, 11, 'Domain registration length', '', '', '', ''),
(32, 1, 12, 'Branded search rankings', '', '', '', ''),
(33, 1, 12, 'Local search rankings', '', '', '', ''),
(34, 1, 12, 'Paid advertising', '', '', '', ''),
(35, 1, 13, 'Text', 'is brand- or product-relevant and have enough words.', 'At least one paragraph with appropriate keywords – the text on the homepage is too small and need expanding so that search engines and users can benefit from the content.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.'),
(36, 1, 13, 'Product pages', 'are appropriately descriptive and have enough text.', 'Text quantity is low – many internal pages do not have enough text.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.'),
(37, 1, 14, 'Product pages', '', '', '', ''),
(38, 1, 15, 'Blog section', 'has lots of updates with good images', 'Consistency and quality – there are only 1 to 3 blog posts per month and so this could be done more regularly.', 'Webmaster', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.'),
(39, 1, 15, 'News section', 'has lots of updates about the company.', 'No news section seems to exist – we have been unable to find a section that includes the latest updates from the company.', 'Basic user', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.'),
(40, 1, 16, 'Special offers page', '', '', '', ''),
(41, 1, 16, 'Special offer information', '', '', '', ''),
(42, 1, 17, 'CMS', 'Built on an easy-to-update CMS', 'We would look to have some form of CMS in place for future website builds that will allow you to easily update and control information on your website.', 'Basic user', 'One for the future – choosing something like WordPress or Drupal for future website installations will help with content management and also google rankings as these platforms are very SEO friendly.'),
(43, 1, 17, 'RSS feed', 'is present', 'No RSS feed is present on the site – when you have new content then having an RSS feed will allow other people to pick up your content.', 'Basic user', 'Installing an RSS feed is simple for a webmaster to do for this site.'),
(44, 1, 17, 'Regular updates', 'is maintained well in the blog section.', 'We would suggest building the news section and then posting more quality content that is pointing to your website.', 'Basic user', 'Establish a content production schedule for your staff to write content which will then be posted on your site. A new section can contain so much information about what is going on at your dive center, the local region and in the dive industry in general.'),
(45, 1, 18, 'Indexed on Google', '', '', '', ''),
(46, 1, 18, 'Indexed on Bing', '', '', '', ''),
(47, 1, 19, 'Social media icons', 'available to identify company', 'there does not appear to be any links to social media sites on the website. There is a small area on the specials page but outside of this it is non-existent.', 'Webmaster', 'ocial media is a huge part of customer acquisition these days as divers want to see what is going on with the dive center. Social Media is a great way to get your news content out across a network of people and also to communicate with your customers. Consider it vital to become active on Social Media and have social media linked into your web property.'),
(48, 1, 19, 'Facebook social', 'plugin used', 'vital to improve social shares and thus rankings.', 'Webmaster', 'Establish a Facebook business page and begin posting to it with all of your company happenings. Ensure you post quality content that links back to your website. Also put the Facebook icon and link next to the social icons on your website.'),
(49, 1, 19, 'Twitter social', 'plugin used', 'helps to get the message out to your clients.', 'Webmaster', 'Establish a Twitter page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Twitter icon and link next to the social icons on your website.'),
(50, 1, 19, 'Google+', 'social plugin used', 'vital to improve rankings in Google.', 'Webmaster', 'Establish a Google+ business page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Google+ icon and link next to the social icons on your website.'),
(51, 1, 19, 'Pinterest/Instagram', 'social plugin used', 'With so many great images I would use another social media platform such as Pinterest or Instagram, or both, to start showing more people about the incredible marine life you have in the area.', 'Webmaster', 'Sign up for an account online and organize your staff to post daily images. You can also encourage your day guests to post their best images and share them with you.'),
(52, 1, 20, 'Share buttons', 'available', 'will help user to share your content easily through their personal social media account. This is really beneficial for your marketing effort.', 'Webmaster', 'Install the share button for Facebook, Twitter, Google+, and Instagram/Pinterest in the internal product pages and in the blog section.'),
(53, 1, 20, 'Facebook', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(54, 1, 20, 'Twitter', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(55, 1, 20, 'Pinterest', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(56, 1, 20, 'Google+', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(57, 1, 21, 'Graphics & Images', 'show us the quality of the location and resort.', '', '', ''),
(58, 1, 21, 'Branding', 'company logo appears consistently on the site.', 'A company logo does not appear consistently and prominently on the site which is an important point for people to recognise your company and brand.', 'Webmaster', 'Place you company logo prominently in the header of the image in your website.'),
(59, 1, 21, 'NAP', 'Strong site-wide is present on the footer.', 'Legitimate businesses feature their names, addresses and phone numbers prominently.', 'Webmaster', 'Put the NAP into your footer on every page as well as on your contact page.'),
(60, 1, 21, 'Tripadvisor / testimonials', 'is present on the site with a good management towards any negative comments.', 'You do not display TripAdvisor reviews on your website which are a great tool for clients to hear independent information about your company.', 'Webmaster', 'You can Add Tripadvisor widgets to the website which can show the latest reviews. Also consider getting management to respond to negative reviews on Tripadvisor as this sends a quality signal about your company.'),
(61, 1, 21, 'PADI branding', 'appears prominently on the site.', 'The PADI logo does not appear prominently on the website. The PADI logo is known worldwide as is very useful to help increase the quality of your brand.', 'Webmaster', 'Place the PADI logo in the header of your website, along with your own company logo.'),
(62, 1, 22, 'About us', 'page provides good information about the general area, company profile, conservation and the diving team.', 'You could consider increasing the content to include information about the team at the dive resort. Divers like to see who they will be diving with and have a chance to get to know the dive staff.', 'Webmaster', 'You can add additional content and pages to the site to enhance the experience for the end user, showing them more about your company, team, location and more. Adding more content will also help rankings in the search engines.'),
(63, 1, 23, 'Minimized “dead zones”', 'pages are filled nicely, especially with images.', 'pages have lots of blank spaces.', 'Webmaster', 'Minimizing dead zones by filling them with images, testimonials, videos, trip advisor widgets, social media icons and text.'),
(64, 1, 23, 'What’s next” feature', 'is present on the site.', 'is missing on all pages which stops people from moving through the site easily. Moreover, users who are confused about their next action at the bottom of a page may simply opt to exit.', 'Webmaster', 'Add simple links at the bottom of each page showing users where to head next, or how to get back to the top of the page. For example, you may have a link at the bottom of the open water course page that points to the advanced open water course page.'),
(65, 1, 23, 'End of pages feature back to top', 'appears in every pages.', 'doesn’t appear anywhere on the site.', 'Webmaster', 'Add a “back to top” link at the bottom of pages to encourage users to access your site’s main navigation again. This, coupled with the “what’s next” feature is a great way to keep users on the website.'),
(66, 1, 24, 'Book online / Sign up forms', 'present in the contact menu and it’s linked to each internal product pages', 'not present anywhere on the site.', 'Webmaster', 'You can allow users to inquire about specific programs and offers through specialized sign up forms that you include on the product pages. Consider adding a sign up form for a newsletter as well. Place the sign up forms on your product pages making it easy for them.'),
(67, 1, 24, 'Contact Page', 'is clear and simple to use.', 'We would suggest you expand the contact pages to include your Name, Address and telephone number, social icons and even a Google map. The current page is very empty.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer.'),
(68, 1, 24, 'Contact Page uses forms', 'which allow customers to provide useful data.', 'We would suggest you expand the contact page to include a contact form so that people can add information and make it easy to send to you.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer. Consider adding a Google map to your contact page so people know how to find you.');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id_result` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id_result`, `id_source`, `result`) VALUES
(521, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(522, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(523, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(524, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(525, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(526, 1, '{"description":"is present on long pages within the site."}'),
(527, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(528, 1, '{"description":"is clear and easy to use."}'),
(529, 1, '{"description":"is clear and easy to use."}'),
(530, 1, '{"description":"is installed on the site."}'),
(531, 1, '{"description":"file is present and not causing any issues"}'),
(532, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(533, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(534, 1, '{"description":"work well throughout the site."}'),
(535, 1, '{"description":"are kept to a minimum."}'),
(536, 1, '{"description":"file is present and not causing any issues"}'),
(537, 1, '{"description":""}'),
(538, 1, '{"description":""}'),
(539, 1, '{"description":"are present, unique and different to page titles."}'),
(540, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(541, 1, '{"description":"are generally unique across the pages."}'),
(542, 1, '{"description":"is ok with most not being too large."}'),
(543, 1, '{"description":"are generally fine on the site and well optimized."}'),
(544, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(545, 1, '{"description":""}'),
(546, 1, '{"description":""}'),
(547, 1, '{"description":""}'),
(548, 1, '{"description":""}'),
(549, 1, '{"description":""}'),
(550, 1, '{"description":""}'),
(551, 1, '{"description":""}'),
(552, 1, '{"description":""}'),
(553, 1, '{"description":""}'),
(554, 1, '{"description":""}'),
(555, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(556, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(557, 1, '{"description":""}'),
(558, 1, '{"description":"has lots of updates about the company."}'),
(559, 1, '{"description":"has lots of updates with good images"}'),
(560, 1, '{"description":""}'),
(561, 1, '{"description":""}'),
(562, 1, '{"description":"is maintained well in the blog section."}'),
(563, 1, '{"description":"is present"}'),
(564, 1, '{"description":"Built on an easy-to-update CMS"}'),
(565, 1, '{"description":""}'),
(566, 1, '{"description":""}'),
(567, 1, '{"description":"social plugin used"}'),
(568, 1, '{"description":"social plugin used"}'),
(569, 1, '{"description":"plugin used"}'),
(570, 1, '{"description":"plugin used"}'),
(571, 1, '{"description":"available to identify company"}'),
(572, 1, '{"description":"social plugin used"}'),
(573, 1, '{"description":"social plugin used"}'),
(574, 1, '{"description":"social plugin used"}'),
(575, 1, '{"description":"social plugin used"}'),
(576, 1, '{"description":"available"}'),
(577, 1, '{"description":"appears prominently on the site."}'),
(578, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(579, 1, '{"description":"Strong site-wide is present on the footer."}'),
(580, 1, '{"description":"company logo appears consistently on the site."}'),
(581, 1, '{"description":"show us the quality of the location and resort."}'),
(582, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(583, 1, '{"description":"appears in every pages."}'),
(584, 1, '{"description":"is present on the site."}'),
(585, 1, '{"description":"pages are filled nicely, especially with images."}'),
(586, 1, '{"description":"which allow customers to provide useful data."}'),
(587, 1, '{"description":"is clear and simple to use."}'),
(588, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(589, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(590, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(591, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(592, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(593, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(594, 1, '{"description":"is present on long pages within the site."}'),
(595, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(596, 1, '{"description":"is clear and easy to use."}'),
(597, 1, '{"description":"is clear and easy to use."}'),
(598, 1, '{"description":"is installed on the site."}'),
(599, 1, '{"description":"file is present and not causing any issues"}'),
(600, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(601, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(602, 1, '{"description":"work well throughout the site."}'),
(603, 1, '{"description":"are kept to a minimum."}'),
(604, 1, '{"description":"file is present and not causing any issues"}'),
(605, 1, '{"description":""}'),
(606, 1, '{"description":""}'),
(607, 1, '{"description":"are present, unique and different to page titles."}'),
(608, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(609, 1, '{"description":"are generally unique across the pages."}'),
(610, 1, '{"description":"is ok with most not being too large."}'),
(611, 1, '{"description":"are generally fine on the site and well optimized."}'),
(612, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(613, 1, '{"description":""}'),
(614, 1, '{"description":""}'),
(615, 1, '{"description":""}'),
(616, 1, '{"description":""}'),
(617, 1, '{"description":""}'),
(618, 1, '{"description":""}'),
(619, 1, '{"description":""}'),
(620, 1, '{"description":""}'),
(621, 1, '{"description":""}'),
(622, 1, '{"description":""}'),
(623, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(624, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(625, 1, '{"description":""}'),
(626, 1, '{"description":"has lots of updates about the company."}'),
(627, 1, '{"description":"has lots of updates with good images"}'),
(628, 1, '{"description":""}'),
(629, 1, '{"description":""}'),
(630, 1, '{"description":"is maintained well in the blog section."}'),
(631, 1, '{"description":"is present"}'),
(632, 1, '{"description":"Built on an easy-to-update CMS"}'),
(633, 1, '{"description":""}'),
(634, 1, '{"description":""}'),
(635, 1, '{"description":"social plugin used"}'),
(636, 1, '{"description":"social plugin used"}'),
(637, 1, '{"description":"plugin used"}'),
(638, 1, '{"description":"plugin used"}'),
(639, 1, '{"description":"available to identify company"}'),
(640, 1, '{"description":"social plugin used"}'),
(641, 1, '{"description":"social plugin used"}'),
(642, 1, '{"description":"social plugin used"}'),
(643, 1, '{"description":"social plugin used"}'),
(644, 1, '{"description":"available"}'),
(645, 1, '{"description":"appears prominently on the site."}'),
(646, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(647, 1, '{"description":"Strong site-wide is present on the footer."}'),
(648, 1, '{"description":"company logo appears consistently on the site."}'),
(649, 1, '{"description":"show us the quality of the location and resort."}'),
(650, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(651, 1, '{"description":"appears in every pages."}'),
(652, 1, '{"description":"is present on the site."}'),
(653, 1, '{"description":"pages are filled nicely, especially with images."}'),
(654, 1, '{"description":"which allow customers to provide useful data."}'),
(655, 1, '{"description":"is clear and simple to use."}'),
(656, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(657, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(658, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(659, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(660, 1, '{"point_what_need_fixing":"the website does not have a mobile responsive version. When users look at the site from a smart phone or tablet they still see the standard website layout which makes it hard to use for them.","point_who_can_fix":"Webmaster","point_how_to_fix":"Mobile users need to see a website layout that is easy for them to use on their device. Create a mobile friendly version of your website that allows users to see the mobile version easily."}'),
(661, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(662, 1, '{"description":"is present on long pages within the site."}'),
(663, 1, '{"point_what_need_fixing":"When we visit any page on the site we have no idea how we got to that page. Breadcrumbs allow us to follow the route back through the site.","point_who_can_fix":"Webmaster","point_how_to_fix":"Ensure that every page has a list of pages to show people how they got there. If using a CMS then there are many plugins that will do this for you. If not, your webmaster will be able to add them."}'),
(664, 1, '{"description":"is clear and easy to use."}'),
(665, 1, '{"description":"is clear and easy to use."}'),
(666, 1, '{"description":"is installed on the site."}'),
(667, 1, '{"description":"file is present and not causing any issues"}'),
(668, 1, '{"point_what_need_fixing":"are not installed on the site.","point_who_can_fix":"Webmaster","point_how_to_fix":"Ensure that you have an XML sitemap which should be submitted to Google Webmaster tools which allows Google to index all of your pages, posts and images."}'),
(669, 1, '{"point_what_need_fixing":"# Tags in the URLS \\u2013 causes Google to see the site as a single page website and thus they will never rank any of your internal pages, limiting your chances of ranking well in the search engines.","point_who_can_fix":"Webmaster","point_how_to_fix":"using # tags in URL\\u2019s is problematic unless you are going to use AJAX crawling protocols which have not been established on this site. We have encountered clients who have built websites like this before and tried to source solutions that did not involve making the site again; we are still to find a solution that does not involve doing just that."}'),
(670, 1, '{"description":"work well throughout the site."}'),
(671, 1, '{"description":"are kept to a minimum."}'),
(672, 1, '{"description":"file is present and not causing any issues"}'),
(673, 1, '{"description":""}'),
(674, 1, '{"point_what_need_fixing":"The website load speed is very slow on mobile","point_who_can_fix":"Webmaster","point_how_to_fix":""}'),
(675, 1, '{"description":"are present, unique and different to page titles."}'),
(676, 1, '{"point_what_need_fixing":"multiple examples of duplicate meta descriptions on the site will be causing issues for your rankings.","point_who_can_fix":"Webmaster","point_how_to_fix":"Meta Descriptions must be unique for every page. Ask your webmaster to ensure that every page is edited to be different and relevant to the page in question."}'),
(677, 1, '{"description":"are generally unique across the pages."}'),
(678, 1, '{"description":"is ok with most not being too large."}'),
(679, 1, '{"point_what_need_fixing":"there are many images on the site that do not have prominent alt tags.","point_who_can_fix":"Webmaster","point_how_to_fix":"Every image should have an alt tag that describes the actual image. This is done by editing the code for every image on the site."}'),
(680, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(681, 1, '{"description":""}'),
(682, 1, '{"description":""}'),
(683, 1, '{"description":""}'),
(684, 1, '{"description":""}'),
(685, 1, '{"description":""}'),
(686, 1, '{"point_what_need_fixing":"","point_who_can_fix":"Webmaster","point_how_to_fix":""}'),
(687, 1, '{"description":""}'),
(688, 1, '{"description":""}'),
(689, 1, '{"description":""}'),
(690, 1, '{"description":""}'),
(691, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(692, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(693, 1, '{"point_what_need_fixing":"","point_who_can_fix":"Webmaster","point_how_to_fix":""}'),
(694, 1, '{"description":"has lots of updates about the company."}'),
(695, 1, '{"description":"has lots of updates with good images"}'),
(696, 1, '{"description":""}'),
(697, 1, '{"description":""}'),
(698, 1, '{"description":"is maintained well in the blog section."}'),
(699, 1, '{"description":"is present"}'),
(700, 1, '{"description":"Built on an easy-to-update CMS"}'),
(701, 1, '{"description":""}'),
(702, 1, '{"description":""}'),
(703, 1, '{"point_what_need_fixing":"With so many great images I would use another social media platform such as Pinterest or Instagram, or both, to start showing more people about the incredible marine life you have in the area.","point_who_can_fix":"Webmaster","point_how_to_fix":"Sign up for an account online and organize your staff to post daily images. You can also encourage your day guests to post their best images and share them with you."}'),
(704, 1, '{"description":"social plugin used"}'),
(705, 1, '{"description":"plugin used"}'),
(706, 1, '{"description":"plugin used"}'),
(707, 1, '{"description":"available to identify company"}'),
(708, 1, '{"description":"social plugin used"}'),
(709, 1, '{"description":"social plugin used"}'),
(710, 1, '{"description":"social plugin used"}'),
(711, 1, '{"description":"social plugin used"}'),
(712, 1, '{"description":"available"}'),
(713, 1, '{"description":"appears prominently on the site."}'),
(714, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(715, 1, '{"description":"Strong site-wide is present on the footer."}'),
(716, 1, '{"description":"company logo appears consistently on the site."}'),
(717, 1, '{"description":"show us the quality of the location and resort."}'),
(718, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(719, 1, '{"description":"appears in every pages."}'),
(720, 1, '{"point_what_need_fixing":"is missing on all pages which stops people from moving through the site easily. Moreover, users who are confused about their next action at the bottom of a page may simply opt to exit.","point_who_can_fix":"Webmaster","point_how_to_fix":"Add simple links at the bottom of each page showing users where to head next, or how to get back to the top of the page. For example, you may have a link at the bottom of the open water course page that points to the advanced open water course page."}'),
(721, 1, '{"description":"pages are filled nicely, especially with images."}'),
(722, 1, '{"description":"which allow customers to provide useful data."}'),
(723, 1, '{"point_what_need_fixing":"We would suggest you expand the contact pages to include your Name, Address and telephone number, social icons and even a Google map. The current page is very empty.","point_who_can_fix":"Webmaster","point_how_to_fix":"You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer."}'),
(724, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(725, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(726, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(727, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(728, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(729, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(730, 1, '{"description":"is clear and easy to use."}'),
(731, 1, '{"description":"is clear and easy to use."}'),
(732, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(733, 1, '{"description":"is present on long pages within the site."}'),
(734, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(735, 1, '{"description":"file is present and not causing any issues"}'),
(736, 1, '{"description":"is installed on the site."}'),
(737, 1, '{"description":"file is present and not causing any issues"}'),
(738, 1, '{"description":"are kept to a minimum."}'),
(739, 1, '{"description":"work well throughout the site."}'),
(740, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(741, 1, '{"description":""}'),
(742, 1, '{"description":""}'),
(743, 1, '{"description":"are generally unique across the pages."}'),
(744, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(745, 1, '{"description":"are present, unique and different to page titles."}'),
(746, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(747, 1, '{"description":"are generally fine on the site and well optimized."}'),
(748, 1, '{"description":"is ok with most not being too large."}'),
(749, 1, '{"description":""}'),
(750, 1, '{"description":""}'),
(751, 1, '{"description":""}'),
(752, 1, '{"description":""}'),
(753, 1, '{"description":""}'),
(754, 1, '{"description":""}'),
(755, 1, '{"description":""}'),
(756, 1, '{"description":""}'),
(757, 1, '{"description":""}'),
(758, 1, '{"description":""}'),
(759, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(760, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(761, 1, '{"description":""}'),
(762, 1, '{"description":"has lots of updates with good images"}'),
(763, 1, '{"description":"has lots of updates about the company."}'),
(764, 1, '{"description":""}'),
(765, 1, '{"description":""}'),
(766, 1, '{"description":"Built on an easy-to-update CMS"}'),
(767, 1, '{"description":"is present"}'),
(768, 1, '{"description":"is maintained well in the blog section."}'),
(769, 1, '{"description":""}'),
(770, 1, '{"description":""}'),
(771, 1, '{"description":"available to identify company"}'),
(772, 1, '{"description":"plugin used"}'),
(773, 1, '{"description":"plugin used"}'),
(774, 1, '{"description":"social plugin used"}'),
(775, 1, '{"description":"social plugin used"}'),
(776, 1, '{"description":"available"}'),
(777, 1, '{"description":"social plugin used"}'),
(778, 1, '{"description":"social plugin used"}'),
(779, 1, '{"description":"social plugin used"}'),
(780, 1, '{"description":"social plugin used"}'),
(781, 1, '{"description":"show us the quality of the location and resort."}'),
(782, 1, '{"description":"company logo appears consistently on the site."}'),
(783, 1, '{"description":"Strong site-wide is present on the footer."}'),
(784, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(785, 1, '{"description":"appears prominently on the site."}'),
(786, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(787, 1, '{"description":"pages are filled nicely, especially with images."}'),
(788, 1, '{"description":"is present on the site."}'),
(789, 1, '{"description":"appears in every pages."}'),
(790, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(791, 1, '{"description":"is clear and simple to use."}'),
(792, 1, '{"description":"which allow customers to provide useful data."}'),
(793, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(794, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(795, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(796, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(797, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(798, 1, '{"description":"is clear and easy to use."}'),
(799, 1, '{"description":"is clear and easy to use."}'),
(800, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(801, 1, '{"description":"is present on long pages within the site."}'),
(802, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(803, 1, '{"description":"file is present and not causing any issues"}'),
(804, 1, '{"description":"is installed on the site."}'),
(805, 1, '{"description":"file is present and not causing any issues"}'),
(806, 1, '{"description":"are kept to a minimum."}'),
(807, 1, '{"description":"work well throughout the site."}'),
(808, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(809, 1, '{"description":""}'),
(810, 1, '{"description":""}'),
(811, 1, '{"description":"are generally unique across the pages."}'),
(812, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(813, 1, '{"description":"are present, unique and different to page titles."}'),
(814, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(815, 1, '{"description":"are generally fine on the site and well optimized."}'),
(816, 1, '{"description":"is ok with most not being too large."}'),
(817, 1, '{"description":""}'),
(818, 1, '{"description":""}'),
(819, 1, '{"description":""}'),
(820, 1, '{"description":""}'),
(821, 1, '{"description":""}'),
(822, 1, '{"description":""}'),
(823, 1, '{"description":""}'),
(824, 1, '{"description":""}'),
(825, 1, '{"description":""}'),
(826, 1, '{"description":""}'),
(827, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(828, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(829, 1, '{"description":""}'),
(830, 1, '{"description":"has lots of updates with good images"}'),
(831, 1, '{"description":"has lots of updates about the company."}'),
(832, 1, '{"description":""}'),
(833, 1, '{"description":""}'),
(834, 1, '{"description":"Built on an easy-to-update CMS"}'),
(835, 1, '{"description":"is present"}'),
(836, 1, '{"description":"is maintained well in the blog section."}'),
(837, 1, '{"description":""}'),
(838, 1, '{"description":""}'),
(839, 1, '{"description":"available to identify company"}'),
(840, 1, '{"description":"plugin used"}'),
(841, 1, '{"description":"plugin used"}'),
(842, 1, '{"description":"social plugin used"}'),
(843, 1, '{"description":"social plugin used"}'),
(844, 1, '{"description":"available"}'),
(845, 1, '{"description":"social plugin used"}'),
(846, 1, '{"description":"social plugin used"}'),
(847, 1, '{"description":"social plugin used"}'),
(848, 1, '{"description":"social plugin used"}'),
(849, 1, '{"description":"show us the quality of the location and resort."}'),
(850, 1, '{"description":"company logo appears consistently on the site."}'),
(851, 1, '{"description":"Strong site-wide is present on the footer."}'),
(852, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(853, 1, '{"description":"appears prominently on the site."}'),
(854, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(855, 1, '{"description":"pages are filled nicely, especially with images."}'),
(856, 1, '{"description":"is present on the site."}'),
(857, 1, '{"description":"appears in every pages."}'),
(858, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(859, 1, '{"description":"is clear and simple to use."}'),
(860, 1, '{"description":"which allow customers to provide useful data."}'),
(861, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(862, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(863, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(864, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(865, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(866, 1, '{"description":"is clear and easy to use."}'),
(867, 1, '{"description":"is clear and easy to use."}'),
(868, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(869, 1, '{"description":"is present on long pages within the site."}'),
(870, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(871, 1, '{"description":"file is present and not causing any issues"}'),
(872, 1, '{"description":"is installed on the site."}'),
(873, 1, '{"description":"file is present and not causing any issues"}'),
(874, 1, '{"description":"are kept to a minimum."}'),
(875, 1, '{"description":"work well throughout the site."}'),
(876, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(877, 1, '{"description":""}'),
(878, 1, '{"description":""}'),
(879, 1, '{"description":"are generally unique across the pages."}'),
(880, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(881, 1, '{"description":"are present, unique and different to page titles."}'),
(882, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(883, 1, '{"description":"are generally fine on the site and well optimized."}'),
(884, 1, '{"description":"is ok with most not being too large."}'),
(885, 1, '{"description":""}'),
(886, 1, '{"description":""}'),
(887, 1, '{"description":""}'),
(888, 1, '{"description":""}'),
(889, 1, '{"description":""}'),
(890, 1, '{"description":""}'),
(891, 1, '{"description":""}'),
(892, 1, '{"description":""}'),
(893, 1, '{"description":""}'),
(894, 1, '{"description":""}'),
(895, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(896, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(897, 1, '{"description":""}'),
(898, 1, '{"description":"has lots of updates with good images"}'),
(899, 1, '{"description":"has lots of updates about the company."}'),
(900, 1, '{"description":""}'),
(901, 1, '{"description":""}'),
(902, 1, '{"description":"Built on an easy-to-update CMS"}'),
(903, 1, '{"description":"is present"}'),
(904, 1, '{"description":"is maintained well in the blog section."}'),
(905, 1, '{"description":""}'),
(906, 1, '{"description":""}'),
(907, 1, '{"description":"available to identify company"}'),
(908, 1, '{"description":"plugin used"}'),
(909, 1, '{"description":"plugin used"}'),
(910, 1, '{"description":"social plugin used"}'),
(911, 1, '{"description":"social plugin used"}'),
(912, 1, '{"description":"available"}'),
(913, 1, '{"description":"social plugin used"}'),
(914, 1, '{"description":"social plugin used"}'),
(915, 1, '{"description":"social plugin used"}'),
(916, 1, '{"description":"social plugin used"}'),
(917, 1, '{"description":"show us the quality of the location and resort."}'),
(918, 1, '{"description":"company logo appears consistently on the site."}'),
(919, 1, '{"description":"Strong site-wide is present on the footer."}'),
(920, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(921, 1, '{"description":"appears prominently on the site."}'),
(922, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(923, 1, '{"description":"pages are filled nicely, especially with images."}'),
(924, 1, '{"description":"is present on the site."}'),
(925, 1, '{"description":"appears in every pages."}'),
(926, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(927, 1, '{"description":"is clear and simple to use."}'),
(928, 1, '{"description":"which allow customers to provide useful data."}'),
(929, 1, '{"description":"no issues viewing the website across multiple browsers."}'),
(930, 1, '{"description":"allows mobile users to access information clearly and provides a quality user experience."}'),
(931, 1, '{"description":"provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company."}'),
(932, 1, '{"description":"modern, good looking website that is clear and easy to use."}'),
(933, 1, '{"description":"lots of quality images illustrate the company and services well."}'),
(934, 1, '{"description":"is clear and easy to use."}'),
(935, 1, '{"description":"is clear and easy to use."}'),
(936, 1, '{"description":"is present on the site allowing people to find their way back through the site."}'),
(937, 1, '{"description":"is present on long pages within the site."}'),
(938, 1, '{"description":"xml sitemaps are in place and structured correctly."}'),
(939, 1, '{"description":"file is present and not causing any issues"}'),
(940, 1, '{"description":"is installed on the site."}'),
(941, 1, '{"description":"file is present and not causing any issues"}'),
(942, 1, '{"description":"are kept to a minimum."}'),
(943, 1, '{"description":"work well throughout the site."}'),
(944, 1, '{"description":"is well thought out and consistent with Google\\u2019s best SEO guidelines."}'),
(945, 1, '{"description":""}'),
(946, 1, '{"description":""}'),
(947, 1, '{"description":"are generally unique across the pages."}'),
(948, 1, '{"description":"are generally uniquely descriptive for each page."}'),
(949, 1, '{"description":"are present, unique and different to page titles."}'),
(950, 1, '{"description":"The site is full of visually appealing images that represent the location and diving very well."}'),
(951, 1, '{"description":"are generally fine on the site and well optimized."}'),
(952, 1, '{"description":"is ok with most not being too large."}'),
(953, 1, '{"description":""}'),
(954, 1, '{"description":""}'),
(955, 1, '{"description":""}'),
(956, 1, '{"description":""}'),
(957, 1, '{"description":""}'),
(958, 1, '{"description":""}'),
(959, 1, '{"description":""}'),
(960, 1, '{"description":""}'),
(961, 1, '{"description":""}'),
(962, 1, '{"description":""}'),
(963, 1, '{"description":"is brand- or product-relevant and have enough words."}'),
(964, 1, '{"description":"are appropriately descriptive and have enough text."}'),
(965, 1, '{"description":""}'),
(966, 1, '{"description":"has lots of updates with good images"}'),
(967, 1, '{"description":"has lots of updates about the company."}'),
(968, 1, '{"description":""}'),
(969, 1, '{"description":""}'),
(970, 1, '{"description":"Built on an easy-to-update CMS"}'),
(971, 1, '{"description":"is present"}'),
(972, 1, '{"description":"is maintained well in the blog section."}'),
(973, 1, '{"description":""}'),
(974, 1, '{"description":""}'),
(975, 1, '{"description":"available to identify company"}'),
(976, 1, '{"description":"plugin used"}'),
(977, 1, '{"description":"plugin used"}'),
(978, 1, '{"description":"social plugin used"}'),
(979, 1, '{"description":"social plugin used"}'),
(980, 1, '{"description":"available"}'),
(981, 1, '{"description":"social plugin used"}'),
(982, 1, '{"description":"social plugin used"}'),
(983, 1, '{"description":"social plugin used"}'),
(984, 1, '{"description":"social plugin used"}'),
(985, 1, '{"description":"show us the quality of the location and resort."}'),
(986, 1, '{"description":"company logo appears consistently on the site."}'),
(987, 1, '{"description":"Strong site-wide is present on the footer."}'),
(988, 1, '{"description":"is present on the site with a good management towards any negative comments."}'),
(989, 1, '{"description":"appears prominently on the site."}'),
(990, 1, '{"description":"page provides good information about the general area, company profile, conservation and the diving team."}'),
(991, 1, '{"description":"pages are filled nicely, especially with images."}'),
(992, 1, '{"description":"is present on the site."}'),
(993, 1, '{"description":"appears in every pages."}'),
(994, 1, '{"description":"present in the contact menu and it\\u2019s linked to each internal product pages"}'),
(995, 1, '{"description":"is clear and simple to use."}'),
(996, 1, '{"description":"which allow customers to provide useful data."}');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `section_slug` varchar(50) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  `section_why` text NOT NULL,
  `section_importance` int(11) NOT NULL,
  `section_difficulty` int(11) NOT NULL,
  `section_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `section_name`, `section_slug`, `section_desc`, `section_why`, `section_importance`, `section_difficulty`, `section_cat`) VALUES
(2, 'User Experience', 'user-experience', 'The user experience is the general impression a user has when interacting with your website.', '', 0, 0, 'site structure'),
(3, 'Navigation', 'navigation', 'The method(s) of accessing content contained in the website.', '', 0, 0, 'site structure'),
(4, 'Search Engine Accessibility', 'search-engine-accessibility', 'How easy is it for the search engines to find your online content, index it and display it to potential consumers?', '', 0, 0, 'seo'),
(5, 'Internal Link Structure', 'internal-link-structure', 'Describes how the website is seen by Google, kind of like a family tree.', '', 0, 0, 'seo'),
(6, 'Page Speed', 'page-speed', 'A relative assessment of how quickly your website loads.', '', 0, 0, 'seo'),
(7, 'Meta Tags & Headings', 'meta-tag-and-heading', 'Meta tags are pieces of code that tell the search engine (and users) information about your web pages.', '', 0, 0, 'seo'),
(8, 'Images', 'image', 'The images on your site not only affect the appearance of the site, but also its speed and search relevance', '', 0, 0, 'seo'),
(9, 'Text', 'text', 'The words on your website are the easiest way for a search engine to understand what you are talking about.', '', 0, 0, 'seo'),
(10, 'Link Profile', 'link-profile', 'Your link profile is an overview of the number and quality of other websites that are linking to you', '', 0, 0, 'seo'),
(11, 'Hosting & Registration', 'hosting-and-registration', 'The host is the physical machine that holds the data for your website and “serves” it to users', '', 0, 0, 'seo'),
(12, 'Search Rankings', 'search-ranking', 'A search for your website or brand should help your customers find you easily.', '', 0, 0, 'ranking'),
(13, 'Homepage Content', 'homepage-content', 'A quick look at the content of the main page on your website', '', 0, 0, 'content management'),
(14, 'Internal Page Content', 'internal-page-content', 'A look at the structure of product / service pages', '', 0, 0, 'content management'),
(15, 'Blog / News Section', 'blog-news-section', 'An assessment of “recency” on your website.', '', 0, 0, 'content management'),
(16, 'Special Offers', 'special-offer', 'Websites with occasional special offers tell users that the business is active and that content is being updated regularly', '', 0, 0, 'content management'),
(17, 'Content Management', 'content-management', 'A Content Management System is a system to publish and administer the content of a website.', '', 0, 0, 'content management'),
(18, 'Indexed Pages', 'indexed-page', 'This is the total number of files found in Google’s index for your website.', '', 0, 0, 'content management'),
(19, 'Homepage', 'homepage', 'This checks how integrated your home/main pages are with your social media efforts.', '', 0, 0, 'social integration'),
(20, 'Products Pages & Blog Pages', 'product-and-blog', 'An assessment of your site’s integration of social media shares.', '', 0, 0, 'social integration'),
(21, 'Quality Signals', 'quality-signal', 'Signals regarding the legitimacy, accountability and capability of your company.', '', 0, 0, 'quality/retention/convertion'),
(22, 'Strong Company / ', 'strong-company-about-us-quality', 'Website users want to identify with brands and the individuals behind them', '', 0, 0, 'quality/retention/convertion'),
(23, 'Retention', 'retention', 'Retention deals with your site’s ability to keep users engaged and consuming more content.', '', 0, 0, 'quality/retention/convertion'),
(24, 'Conversion', 'conversion', 'Conversion relates to the actions that lead to inquiries, customer interaction, and bookings.', '', 0, 0, 'quality/retention/convertion');

-- --------------------------------------------------------

--
-- Table structure for table `section_result`
--

CREATE TABLE `section_result` (
  `id_section_result` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_assessment` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id_source` int(11) NOT NULL,
  `source_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id_source`, `source_name`) VALUES
(1, 'manual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id_assessment`),
  ADD KEY `id_domain` (`id_domain`);

--
-- Indexes for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  ADD PRIMARY KEY (`id_assessment_detail`),
  ADD KEY `id_assessment` (`id_assessment`),
  ADD KEY `id_point` (`id_point`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id_domain`);

--
-- Indexes for table `personal_judgement`
--
ALTER TABLE `personal_judgement`
  ADD PRIMARY KEY (`id_personal_judgement`);

--
-- Indexes for table `point_check`
--
ALTER TABLE `point_check`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `id_source` (`id_source`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `section_result`
--
ALTER TABLE `section_result`
  ADD PRIMARY KEY (`id_section_result`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id_source`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id_assessment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  MODIFY `id_assessment_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=874;
--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `personal_judgement`
--
ALTER TABLE `personal_judgement`
  MODIFY `id_personal_judgement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `point_check`
--
ALTER TABLE `point_check`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `section_result`
--
ALTER TABLE `section_result`
  MODIFY `id_section_result` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id_source` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domain` (`id_domain`);

--
-- Constraints for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  ADD CONSTRAINT `assessment_detail_ibfk_1` FOREIGN KEY (`id_assessment`) REFERENCES `assessment` (`id_assessment`),
  ADD CONSTRAINT `assessment_detail_ibfk_2` FOREIGN KEY (`id_point`) REFERENCES `point_check` (`id_point`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_source`) REFERENCES `source` (`id_source`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
