-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 05:56 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10
--
--Accounts
--User: username = rockdude password = password
--Admin: username = admin11 password = admin1234

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dbw2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_atv`
--

CREATE TABLE `activity_atv` (
  `id_atv` int(11) NOT NULL AUTO_INCREMENT,
  `name_atv` varchar(45) NOT NULL,
  `description_atv` mediumtext NOT NULL,
  PRIMARY KEY (`id_atv`),
  UNIQUE KEY `name_atv_UNIQUE` (`name_atv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `activity_atv`
--

INSERT INTO `activity_atv` (`id_atv`, `name_atv`, `description_atv`) VALUES
(1, 'backpacking', 'Backpacking is generally an extended journey or walk with a backpack.[1] However, for North American hikers it more frequently describes a multi-day hike that involves camping, though occasionally it may involve the use of simple shelters or mountain huts. In New Zealand, tramping is an equivalent term though overnight huts are frequently used.[2] Hill walking is the equivalent in Britain, though backpackers make use of all kinds of accommodation, in addition to camping. Backpackers use simple huts in South Africa.[3] Similar terms used in other countries are trekking or bushwalking. A backpack allows a hiker to carry supplies and equipment to accommodate multiple days out on a trail. ~Wikipedia.'),
(2, 'bicycling', 'Cycling, also called bicycling or biking, is the use of bicycles for transport, recreation, or for sport. Persons engaged in cycling are referred to as "cyclists", "bikers", or less commonly, as "bicyclists". Apart from two-wheeled bicycles, "cycling" also includes the riding of unicycles, tricycles, quadracycles, and similar human-powered vehicles (HPVs).'),
(3, 'whitewater canoeing', 'Whitewater canoeing is the sport of paddling a canoe on a moving body of water, typically a whitewater river. Whitewater canoeing can range from simple, carefree gently moving water, to demanding, dangerous whitewater. River rapids are graded like ski runs according to the difficulty, danger or severity of the rapid. Whitewater grades (or classes) range from I or 1 (the easiest) to VI or 6 (the most difficult/dangerous). Grade/Class I can be described as slightly moving water with ripples. Grade/Class VI can be described as severe or almost unrunnable whitewater, such as Niagara Falls.'),
(4, 'whitewater kayaking', 'Whitewater kayaking is the sport of paddling a kayak on a moving body of water, typically a whitewater river. Whitewater kayaking can range from active, moving water, to demanding, extreme whitewater.'),
(5, 'rock climbing', 'Rock climbing is an activity in which participants climb up, down or across natural rock formations or artificial rock walls. The goal is to reach the summit of a formation or the endpoint of a pre-defined route without falling. To successfully complete a climb, one must return to the base of the route safely. Due to the length and extended endurance required, accidents are more likely to happen on descent than ascent, especially on the larger multiple pitches (class III- IV and /or multi-day grades IV-VI climbs). Rock climbing competitions have the objectives of either completing the route in the quickest possible time or attaining the farthest point on an increasingly difficult route. Scrambling, another activity involving the scaling of hills and similar formations, is similar to rock climbing. However, rock climbing is generally differentiated by its sustained use of hands to support the climber''s weight as well as to provide balance.\r\n\r\nRock climbing is a physically and mentally demanding sport, one that often tests a climber''s strength, endurance, agility and balance along with mental control. It can be a dangerous sport and knowledge of proper climbing techniques and usage of specialised climbing equipment is crucial for the safe completion of routes. Because of the wide range and variety of rock formations around the world, rock climbing has been separated into several different styles and sub-disciplines.[1] While not an Olympic event, rock climbing is recognized by the International Olympic Committee as a sport. ~Wikipedia');

-- --------------------------------------------------------

--
-- Table structure for table `countries_cts`
--

CREATE TABLE `countries_cts` (
  `id_cts` int(11) NOT NULL AUTO_INCREMENT,
  `code_cts` varchar(45) NOT NULL,
  `name_cts` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cts`),
  UNIQUE KEY `name_cts_UNIQUE` (`name_cts`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `countries_cts`
--

INSERT INTO `countries_cts` (`id_cts`, `code_cts`, `name_cts`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czechia'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `entry_ent`
--

CREATE TABLE `entry_ent` (
  `id_ent` int(11) NOT NULL AUTO_INCREMENT,
  `id_usr_ent` int(11) NOT NULL,
  `id_atv_ent` int(11) NOT NULL,
  `id_rol_ent` int(11) NOT NULL,
  `date_ent` date NOT NULL,
  `num_days_ent` float unsigned NOT NULL,
  `location_ent` varchar(255) DEFAULT NULL,
  `id_sts_ent` int(11) NOT NULL,
  `id_cts_ent` int(11) NOT NULL,
  `route_ent` varchar(255) NOT NULL,
  `distance_ent` float unsigned DEFAULT NULL,
  `description_ent` longtext,
  PRIMARY KEY (`id_ent`),
  KEY `fk_entry_ent_users_usr_idx` (`id_usr_ent`),
  KEY `fk_entry_ent_activity_atv1_idx` (`id_atv_ent`),
  KEY `fk_entry_ent_role_rol1_idx` (`id_rol_ent`),
  KEY `fk_entry_ent_states_sts1_idx` (`id_sts_ent`),
  KEY `fk_entry_ent_countries_cts1_idx` (`id_cts_ent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `entry_ent`
--

INSERT INTO `entry_ent` (`id_ent`, `id_usr_ent`, `id_atv_ent`, `id_rol_ent`, `date_ent`, `num_days_ent`, `location_ent`, `id_sts_ent`, `id_cts_ent`, `route_ent`, `distance_ent`, `description_ent`) VALUES
(2, 21, 5, 1, '2014-04-05', 1, 'Looking Glass Rock', 34, 233, 'Rat''s Ass', 0, 'A three pitch, 5.8 trad climb with the crux on the second pitch. I led all three  pitches with paddlegirl following.'),
(3, 21, 5, 1, '2014-04-03', 1, 'Looking Glass Rock', 34, 233, 'The Nose', 0, '3 pitch 5.8. Classic route!'),
(4, 22, 3, 1, '2014-02-04', 1, 'Nantahala River', 34, 233, 'lower section', 0, 'Class III river. Pretty chilly day. Swam the falls. BRRRRR!!!'),
(5, 21, 1, 1, '2014-03-28', 3, 'Shining Rock Wilderness', 34, 233, 'Art Loeb Trail', 30, 'A beautiful hike. Would do it again.'),
(6, 21, 1, 1, '2014-02-01', 2, 'Grayson Highlands State Park', 47, 233, 'Appalachian Trail', 10, 'Lots of snow up there and cold.'),
(8, 22, 1, 3, '2014-04-01', 4, 'Table Rock', 34, 233, 'Mountains to Sea Trail', 8, 'Working a four day course for North Carolina Outward Bound'),
(9, 25, 1, 1, '2014-04-12', 2, 'Sipsey Wilderness', 1, 233, 'The river trail', 8, 'Beautiful spring day with wildflowers blooming.'),
(10, 21, 5, 3, '2014-04-28', 1, 'Table Rock', 34, 233, 'The North Ridge', 0, 'Working for North Carolina Outward Bound Outdoor Leader Course rocks day. Great day for a climb. One of the nicest routes on the mountain. '),
(16, 22, 3, 1, '2014-05-01', 1, 'Green River', 45, 233, 'Stillwater Canyon', 20, 'Did the canyon in a day! Super Cool.'),
(18, 43, 5, 2, '2014-05-03', 1, 'Table Rock', 34, 233, 'Jim Dandy', 0, 'Climber staff training. Did all pitches. 5.5 difficulty.'),
(19, 44, 2, 1, '2014-05-04', 1, 'Winsont-Salem', 34, 233, 'Yadkinville to Lewisville', 20, 'Got very warm. Stopped at some wineries. Nice.');

-- --------------------------------------------------------

--
-- Table structure for table `role_rol`
--

CREATE TABLE `role_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `name_rol` varchar(45) NOT NULL,
  `description_rol` mediumtext NOT NULL,
  `employer_rol` varchar(200) NOT NULL DEFAULT 'Not Applicable',
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `name_rol_UNIQUE` (`name_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role_rol`
--

INSERT INTO `role_rol` (`id_rol`, `name_rol`, `description_rol`, `employer_rol`) VALUES
(1, 'playing', 'Doing an activity for your own benefit, not associated with an organization or for monetary compensation.', 'Not Applicable'),
(2, 'training', 'An activity done in a formal training, either paid or unpaid.', 'Not Applicable'),
(3, 'working', 'Doing an outdoor activity when payment is involved.', 'Not Applicable');

-- --------------------------------------------------------

--
-- Table structure for table `states_sts`
--

CREATE TABLE `states_sts` (
  `id_sts` int(11) NOT NULL AUTO_INCREMENT,
  `name_sts` varchar(45) NOT NULL,
  `abbr_sts` varchar(8) NOT NULL,
  PRIMARY KEY (`id_sts`),
  UNIQUE KEY `name_sts_UNIQUE` (`name_sts`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `states_sts`
--

INSERT INTO `states_sts` (`id_sts`, `name_sts`, `abbr_sts`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'District of Columbia', 'DC'),
(10, 'Florida', 'FL'),
(11, 'Georgia', 'GA'),
(12, 'Hawaii', 'HI'),
(13, 'Idaho', 'ID'),
(14, 'Illinois', 'IL'),
(15, 'Indiana', 'IN'),
(16, 'Iowa', 'IA'),
(17, 'Kansas', 'KS'),
(18, 'Kentucky', 'KY'),
(19, 'Louisiana', 'LA'),
(20, 'Maine', 'ME'),
(21, 'Maryland', 'MD'),
(22, 'Massachusetts', 'MA'),
(23, 'Michigan', 'MI'),
(24, 'Minnesota', 'MN'),
(25, 'Mississippi', 'MS'),
(26, 'Missouri', 'MO'),
(27, 'Montana', 'MT'),
(28, 'Nebraska', 'NE'),
(29, 'Nevada', 'NV'),
(30, 'New Hampshire', 'NH'),
(31, 'New Jersey', 'NJ'),
(32, 'New Mexico', 'NM'),
(33, 'New York', 'NY'),
(34, 'North Carolina', 'NC'),
(35, 'North Dakota', 'ND'),
(36, 'Ohio', 'OH'),
(37, 'Oklahoma', 'OK'),
(38, 'Oregon', 'OR'),
(39, 'Pennsylvania', 'PA'),
(40, 'Rhode Island', 'RI'),
(41, 'South Carolina', 'SC'),
(42, 'South Dakota', 'SD'),
(43, 'Tennessee', 'TN'),
(44, 'Texas', 'TX'),
(45, 'Utah', 'UT'),
(46, 'Vermont', 'VT'),
(47, 'Virginia', 'VA'),
(48, 'Washington', 'WA'),
(49, 'West Virginia', 'WV'),
(50, 'Wisconsin', 'WI'),
(51, 'Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `users_usr`
--

CREATE TABLE `users_usr` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `username_usr` varchar(45) NOT NULL,
  `password_usr` varchar(75) NOT NULL,
  `privileges_usr` varchar(45) NOT NULL DEFAULT 'user',
  `fname_usr` varchar(45) NOT NULL,
  `lname_usr` varchar(45) NOT NULL,
  `visibility_usr` varchar(10) NOT NULL DEFAULT 'private',
  `profile_usr` mediumtext NOT NULL,
  PRIMARY KEY (`id_usr`),
  UNIQUE KEY `username_usr_UNIQUE` (`username_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users_usr`
--

INSERT INTO `users_usr` (`id_usr`, `username_usr`, `password_usr`, `privileges_usr`, `fname_usr`, `lname_usr`, `visibility_usr`, `profile_usr`) VALUES
(21, 'rockdude', '$2y$11$1de826fc55e514d893d44ORos4IIaPI4gQQMSf/5Om.n1aOCx05qm', 'user', 'Rock', 'Dude', 'public', 'I am the rockdude. I like to climb. Lots.'),
(22, 'paddlegirl', '$2y$11$aec9b57937b0038b8cca1O0LG.4G6LhpuVLVklh5pQbW4QT21b/vK', 'user', 'Paddle', 'Girl', 'public', 'I like water. And cold beer. Sunset''s are nice as well.'),
(25, 'billybob', '$2y$11$109724f3d794190493aa8ObF9.HQ4SQ3YgvWdazdQfyd8caTBn34e', 'user', 'Bill', 'Bobby', 'public', 'I like to do fun stuff all the time.'),
(43, 'admin11', '$2y$11$5b7dcc363370b3269b6b8O2ptJIW/RyOHTYj92mF7388FVcdxpH.K', 'admin', 'Alan', 'Moore', 'private', 'I am one of the administrators.'),
(44, 'bikeman', '$2y$11$10ee3553f770e80b8be3cufl3FrH3ug9/RCV/sjndJ4ytwh1E.9QW', 'user', 'Mike', 'Ban', 'private', 'I want to ride my bicycle. I want to ride my bike. Biking is great.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry_ent`
--
ALTER TABLE `entry_ent`
  ADD CONSTRAINT `fk_entry_ent_activity_atv1` FOREIGN KEY (`id_atv_ent`) REFERENCES `activity_atv` (`id_atv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entry_ent_countries_cts1` FOREIGN KEY (`id_cts_ent`) REFERENCES `countries_cts` (`id_cts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entry_ent_role_rol1` FOREIGN KEY (`id_rol_ent`) REFERENCES `role_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entry_ent_states_sts1` FOREIGN KEY (`id_sts_ent`) REFERENCES `states_sts` (`id_sts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entry_ent_users_usr` FOREIGN KEY (`id_usr_ent`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;
