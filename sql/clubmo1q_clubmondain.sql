-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2018 at 08:10 AM
-- Server version: 10.1.24-MariaDB
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
-- Database: `clubmo1q_clubmondain`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmd_address`
--

CREATE TABLE `cmd_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0' COMMENT 'Relation to Foreign Key User Table ',
  `country_id` int(20) NOT NULL DEFAULT '0' COMMENT 'Relation to Foreign Key Country Table ',
  `city_id` int(20) NOT NULL DEFAULT '0' COMMENT 'Relation to Foreign Key City Table ',
  `street_address_1` varchar(255) DEFAULT NULL,
  `street_address_2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_address`
--

INSERT INTO `cmd_address` (`address_id`, `user_id`, `country_id`, `city_id`, `street_address_1`, `street_address_2`, `state`, `postal_code`) VALUES
(33, 46, 107, 6, 'dfdfbdfbdbbd', 'fbdbbdf', 'bbdfbdbbb', '23442424'),
(37, 50, 14, 1, 'Street Address', 'Street Address2', 'Bostorn', '12345'),
(38, 51, 14, 2, '', '', NULL, NULL),
(39, 52, 14, 3, 'svfsf sgfsgsg', 'svsvsv dvsdvsvsv', NULL, NULL),
(40, 53, 14, 2, 'dsvsvsvs', 'vsvsvsv', 'vsvsvsvs', ''),
(41, 54, 14, 1, 'fgnfgn', 'fnfngfgn', 'fgnfgnfgn', '1234'),
(42, 57, 61, 4, '', 'fwdfvb cb dfb', NULL, NULL),
(43, 58, 104, 97, 'No Applied', '58 Thomas Street, Dublin, Ireland', NULL, NULL),
(46, 64, 168, 3, 'No Applied', '', NULL, NULL),
(48, 66, 61, 4, '', '', '', ''),
(55, 74, 168, 3, 'Roelof Hartplein 106 ', '', NULL, NULL),
(56, 74, 168, 3, 'Roelof Hartplein 106 ', '', NULL, NULL),
(63, 86, 168, 3, '', 'Bakenbergseweg 218\\\\r\\\\n6814 MS Arnhem ', NULL, NULL),
(64, 87, 168, 3, '', 'Roelof Hartplein 146\\r\\n1071 TT Amsterdam', NULL, NULL),
(65, 88, 168, 3, 'No Applied', 'Van Linschotenlaan 286', NULL, NULL),
(66, 89, 168, 3, 'No Applied', 'Roelof Hartplein 106 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n1071 TT Amsterdam', NULL, NULL),
(67, 90, 168, 3, 'Ben van Meerendonkstraat 100', 'Ben van Meerendonkstraat 100\\r\\n1087 LE Amsterdam ', NULL, NULL),
(68, 91, 168, 3, 'Nachtegaalstraat 8 ', 'Nachtegaalstraat 8 \\r\\n4815 EB Breda \\r\\n', NULL, NULL),
(69, 92, 168, 3, 'No Applied', 'Van Reigersbergenstraat 614\\\\\\\\r\\\\\\\\n1052 WH Amsterdam', NULL, NULL),
(70, 93, 168, 3, '', '<nog>', NULL, NULL),
(71, 94, 79, 6, 'No Applied', 'Wilhelminastraat 63h\\\\r\\\\n1054 VW Amsterdam', NULL, NULL),
(72, 95, 168, 3, '', '', '', '1071'),
(73, 96, 168, 3, '123', '123', '', ''),
(75, 100, 77, 1, 'No Applied', '60 Rue de Commerce\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n75015', NULL, NULL),
(76, 101, 168, 3, '', '', '', ''),
(81, 106, 168, 3, 'No Applied', '', NULL, NULL),
(94, 118, 168, 61, 'Heerlen', 'Het Overloon 1 ', '', '6411E'),
(95, 121, 168, 49, 'No Applied', '1671 AV\\\\\\\\r\\\\\\\\nMedenblijk', NULL, NULL),
(98, 127, 168, 41, 'Kloosterlaan 59', '', NULL, NULL),
(99, 128, 168, 3, '', '', NULL, NULL),
(100, 129, 79, 6, 'No Applied', '', NULL, NULL),
(102, 131, 168, 3, 'No Applied', '', NULL, NULL),
(103, 140, 168, 41, 'Donkerstraat 15', '', NULL, NULL),
(104, 142, 168, 52, '', '', NULL, NULL),
(105, 143, 168, 53, '', '', NULL, NULL),
(106, 146, 168, 54, 'Heideweg, 128', 'Heideweg\\r\\n128', NULL, NULL),
(108, 148, 168, 41, 'Sterkenburgenlaan 2', '', NULL, NULL),
(109, 157, 70, 35, 'Plaça de la Rosa dels Vents 1', 'Final Passeig de Joan de Borbó', '', '08039'),
(111, 159, 168, 53, 'Oosterdoksstraat 4', '1011 DK', '', '1011'),
(112, 160, 168, 58, 'St. Eloy 13', 'St. Eloy 13\\\\\\\\r\\\\\\\\n5402 VT Uden\\\\\\\\r\\\\\\\\nThe Netherlands ', NULL, NULL),
(113, 161, 168, 53, 'Ferdinand Bolstraat 333', '1072 LH Amsterdam', 'North-Holland', '1072'),
(114, 164, 168, 0, 'Nieuwe Doelenstraat 26', '1012 CP Amsterdam', 'NH', '1012'),
(115, 166, 168, 59, 'No Applied', '', NULL, NULL),
(116, 167, 168, 53, 'No Applied', '', NULL, NULL),
(117, 168, 168, 53, 'Dam 9 1012 JS Amsterdam', '', '', '1012'),
(118, 169, 168, 53, 'John M. Keynesplein 2', '1066 EP Amsterdam', '', '1066'),
(119, 170, 21, 26, 'Idaliestraat 35, 1050 Elsene, België', '', '', '1050'),
(120, 171, 181, 60, 'Grzybowska 24, 00-132 Warsaw', '', '', '00132'),
(121, 172, 168, 3, 'Oudezijds Voorburgwal 197, 1012 EX Amsterdam, The Netherlands', '', '', '1012'),
(122, 173, 168, 41, 'Oudegracht 152', '', '', '3512'),
(123, 174, 168, 3, 'Kattengat 1, 1012 SZ Amsterdam', '', '', '1012'),
(124, 175, 168, 3, 'Kastanjeweg 44', '', NULL, NULL),
(125, 176, 168, 59, 'Churchillplein 10 2517 JW The Hague', '', '', '2517'),
(126, 177, 168, 61, 'No Applied', '', NULL, NULL),
(129, 181, 168, 61, 'No Applied', 'Kummenaedestraat 64 6165BW Geleen', NULL, NULL),
(130, 182, 168, 61, 'No Applied', '', NULL, NULL),
(131, 184, 168, 61, 'No Applied', '', NULL, NULL),
(132, 186, 168, 61, 'No Applied', '', NULL, NULL),
(134, 189, 168, 67, 'No Applied', '', NULL, NULL),
(135, 191, 168, 68, 'No Applied', '', NULL, NULL),
(136, 192, 168, 61, 'No Applied', '', NULL, NULL),
(137, 193, 168, 72, 'Fregatwerf 3', 'Fregatwerf 3\\r\\n2725CR Zoetermeer', NULL, NULL),
(138, 194, 168, 74, 'Geulpark 23', '', NULL, NULL),
(139, 195, 168, 67, 'pastoor janssenstraat 5', '', NULL, NULL),
(140, 196, 168, 67, 'Urmonderbaan 22', 'Urmonderbaan 22, \\r\\n6167 RD \\r\\nGeleen\\r\\nThe Netherlands\\r\\n', NULL, NULL),
(141, 198, 168, 61, 'No Applied', 'DSM', NULL, NULL),
(142, 199, 168, 67, 'No Applied', '', NULL, NULL),
(143, 200, 168, 3, 'Korte Meerhuizenstraat 6 1.st floor', '', NULL, NULL),
(144, 201, 168, 61, 'No Applied', '', NULL, NULL),
(145, 202, 168, 61, 'No Applied', '', NULL, NULL),
(146, 203, 168, 61, 'Ceres 43', 'Ceres 43, 6001 WT Weert', NULL, NULL),
(147, 204, 79, 6, '14 Irving Street', 'WC2H 7AF', '', '2H 7AF'),
(148, 206, 168, 61, '', '', NULL, NULL),
(149, 207, 168, 61, '', '', NULL, NULL),
(150, 208, 168, 61, 'No Applied', '', NULL, NULL),
(151, 209, 168, 61, 'No Applied', '7636 Willow Grove Boulevard\\r\\nBaton Rouge, LA 70810\\r\\nUSA', NULL, NULL),
(152, 211, 168, 3, 'No Applied', '', NULL, NULL),
(153, 212, 168, 61, 'Netherlands', '', NULL, NULL),
(154, 214, 168, 66, 'No Applied', '', NULL, NULL),
(157, 218, 168, 67, 'No Applied', '', NULL, NULL),
(158, 220, 168, 66, 'No Applied', '', NULL, NULL),
(159, 228, 168, 66, 'No Applied', '', NULL, NULL),
(160, 229, 168, 66, 'No Applied', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_banner`
--

CREATE TABLE `cmd_banner` (
  `banner_id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_banner`
--

INSERT INTO `cmd_banner` (`banner_id`, `page_name`, `banner_link`, `banner_image`, `status`) VALUES
(1, '4', '', '1501580138_banner.jpg', 'Active'),
(2, '5', '', '1502720770_Surf.jpg', 'Active'),
(3, '6', '', '1501580585_bg-3.jpg', 'Active'),
(5, '6', '', '1504345860_Tulips.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_blog_news`
--

CREATE TABLE `cmd_blog_news` (
  `blog_news_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as User Foreign Key Table Data',
  `country_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Country Foreign Key Table Data',
  `city_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as City Foreign Key Table Data',
  `blog_news_title` varchar(255) DEFAULT NULL,
  `blog_news_description` text,
  `blog_news_image` varchar(255) DEFAULT NULL,
  `blog_news_address` varchar(255) DEFAULT NULL,
  `blog_news_fb_link` varchar(255) DEFAULT NULL,
  `blog_news_twitter_link` varchar(255) DEFAULT NULL,
  `blog_news_instagram_link` varchar(255) DEFAULT NULL,
  `blog_news_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `blog_news_type` enum('Blog','News') NOT NULL DEFAULT 'Blog' COMMENT 'This Field Will Reffer as Blog && News Table Data',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_blog_news`
--

INSERT INTO `cmd_blog_news` (`blog_news_id`, `user_id`, `country_id`, `city_id`, `blog_news_title`, `blog_news_description`, `blog_news_image`, `blog_news_address`, `blog_news_fb_link`, `blog_news_twitter_link`, `blog_news_instagram_link`, `blog_news_status`, `blog_news_type`, `create_date`, `update_date`) VALUES
(21, 1, 61, 4, 'Copenhagen -  One of the most environmental friendly city in the world', '<br>Back in the 10th century, Copenhagen was only a Viking fishing village. Now it is the capital city of Denmark and recognised as one of the most environmental friendly city in the wrorld. It is amazing to see that in 2025 Copenhagen aims to be carbon-neutral. District heating -for example- will be done by waste incineration and biomass. Cars will be run on electricity or biofuel in this year. It is already supported with 4 % of green energy contributed to a large offshore wind farm. It also aims to be smoke-free by this time and to serve 90% organic food in all daycares, schools and homes for older people. </br>\\r\\n\\r\\n<b>Public Transport The airport of Copenhagen is well connected to the city centre by metro and main line railway services. Both run day and night and will run you into the city centre within 15 minutes. Unlimited public transport by a Copenhagen Card. Or find all the information you need on public transport here.  Want to get out fast ? Take the ferry to Oslo - Norway. The weather is subject to relatively unstable conditions throughout the year. July to September you ll find a bit higher rainfall. And you ll probably find snow from December to early March. Most sun ?  You ll enjoy that from March to August. When visiting Copenhagen the landmarks are:  Landmarks Tivoli Gardens, The Little Mermaid statue, Amalienborg and Christiansborg palaces, Rosenborg Castle Garends, Frederiks Church.</br> \\r\\n\\r\\n<b>Movement and Fun Copenhagen is one of the most bicycle-friendly city in the world and can be crossed under an hour per bike! You can rent your bike here  Fun to know is that Copenhagen has also beaches! Just few minutes by metro or 15 minutes by bycicle you find the Amager Strandpark, opened in 2005. It is a 2 km artificial island. The second is just about 10 km from downtown Copenhagen: Bellevue Beach - Klampenborg with freshwater showers and lifeguards. Copenhagen has a yearly Marathon, founded in 1980. The Marathon has more than 30% international runners and aims to grow this number in the coming years. </br>\\r\\n\\r\\n<b>For 2018 the organisation aims to achieve the prestigious, international quality seal, the IAAF Road Race Bronze Label. Other fun activities is that you can swim in the harbour from the start of June to the end of August. At Fisketorvet, Havneholmen 0,1561 and Islands Brygge Havenbad, Islands Brugge 0, 2300 you can enjoy diving platforms and an Olympic size pool. </br>', 'e4b4a6d2166c1c4f5dbc9ef3e6f38b12.png', 'Copenhagen, Denmark', 'http://', 'http://', 'http://', 'Active', 'News', '2017-07-07', '2017-08-23'),
(28, 1, 199, 5, 'Stockholm - info neighbourhoods', 'Stockholm is the capital of Sweden with 800.000 inhabitants. \\\\r\\\\nStockholm is called the Venice of the North with more than 30% waters within the city. \\\\r\\\\nAnother 30% consists of parks and green which makes Stockholm probably one of the greenest cities in Europe. \\\\r\\\\n\\\\r\\\\nStockholm is divided in few neighbourhoods. \\\\r\\\\nTo name some; starting from the old city center Gamla Stan to Ostermalm; one of the biggest and priciest neighbourhood to go for some art and fashion. Sodermalm is famous for its young character with hip hotspots of vintage and food. \\\\r\\\\n\\\\r\\\\nStockholm presents itself as a biker friendly city, but it is not that tolerant as cities as Amsterdam and Copenhagen. You can bike through the city but the biking roads are just not there everywhere. \\r\\n\\r\\nStockholm has over 40 open air gyms which are usually places next to a parc and free of charge. \\r\\n\\\\r\\\\n{ more to come }\\\\r\\\\n \\\\r\\\\n', '4a7761f013b4ba124d12fa753c4b4268.jpg', 'Stockholm, Sweden', '', '', '', 'Active', 'News', '2017-08-15', '2017-08-15'),
(30, 1, 77, 1, 'Paris - The City of Light', '<p>Paris is the second-largest city of Europe (after London), but has a timeless and intimate feel at the same time. Paris is known for its museums, architectural landmarks and great food. France’s reputation for dining (and food in general) has always been legendary. Paris hold some great places to also find spaces that feed the eyes, mouth, belly and your health too. And as we are used to from the real Parisiens: with style and flair. Paris is a city that has some more than 2.3 million inhabitants and can be roughly divided into the Left Bank – Rive Gauche – and the Right Bank – Rive Droite. The Rive Gauche is on the southern side of the Seine and is historically known as the artistic part of the city. Rive Droite is the larger side and more traditionally the part where the wealthy residents lived and played. It is said to be more orderly than the chaotic left side. Formally the city is divided in 20 arrondissements that are each divided again into 4 neighborhoods.</p>\r\n\r\n<p><strong>Healthy, sports and outdoor activities </strong><br>\r\nThere is limited green in Paris. There are outlying parks as Bois de Bologne and Bois de Vincennes where the Parisians go to. There are some running possibilities, but also these are limited as the big cobblestones in the road and narrow lined sidewalks are not the summum of runners. Great option is to go running at the banks of the Seine on Sundays and during holidays as they are closed to traffic. Another option is to do the 7 mile run from the city hall right in the heart of Paris Bois de Vincennes. Or at the Tuileries on the Right Bank of the city next to the Louvre or on the left at the Jardins du Luxembourg. There are also yearly organised events like the Marathon of Paris in April and the finish of the yearly Tour de France in July. In 2024 the Summer Olympics will be hosted by Paris.</p>\r\n\r\n<p><strong>Transport to Paris </strong><br>\r\nParis can be reached by land and air. It has two international airports: Paris Charles de Gaulle (CDG) and Paris Orly (ORY), that are connected through high- and railway. Both are located directly to highway, by car it takes 30 minutes to reach the city centre. Depending on destination it will take 25 – 35 minutes by public transport.</p>\r\n\r\n<p>By car it takes 30 minutes to get from Paris Charles de Gaulle/Orly to the city center. A taxi ride to the city center costs between 50 and 55 euros if you depart from Charles de Gaulle, a taxi leaving from Orly costs 30 euros.</p>\r\n\r\n<p><strong>Transport within Paris</strong><br>\r\nWhen moving around the city, you either walk, get a taxi/uber or use the metro. Cycling is possible – a bike sharing system called Vélib can be used at more than 1.800 parking stations in the city - but be mindful in traffic.</p>\r\n\r\n<p><strong>Landmarks & Cultural Highlights</strong><br>\r\nOnce in Paris, famous landmarks such as the Notre Dame, Eiffeltower, Louvre, Musée d’Orsay (noted for impressionist art), Musée National d’Art Moderne (noted for modern and contemporary art) are not to be missed. UNESCO World Heritage Sites are: the banks of the Seine from the Pont de Sully to the pont d’Iéna, the Palace of Versailles, the Palace of Fontainebleau and the medieval fairs site of Provins. Of course, there are many other places left to discover in Paris.</p>\r\n', '7f9899eaee0dbadd9e3dde2f467e150d.jpg', 'Paris, France', '', '', '', 'Active', 'News', '2017-08-22', '2017-11-10'),
(35, 1, 186, 30, 'Lisbon - City of 7 hills', '<p>Lisbon is the oldest city in Western Europe. Situated in the South-West of Portugal it faces the Atlantic ocean. About 3 million people live in the Lisbon Metropolitan Area (which represents approximately 27% of the country&#39;s population), of which half a million in the city of Lisbon, making it the 11th-most populous urban area in the European Union. Lisbon is called ‘the white city’ as it is famous for its intense light. The pretty city is built on 7 hills and a perfect place to discover by foot. Lisbon has a mild climate; it has a summer of six months from May to October (25℃ / 77 F) and one of the warmest winter of Europe with rarely snow and frost.<br>\r\n<br>\r\nLisbon was 9th in the Top 20 city ranking by number of meetings organised in 2016 by the International Congress and Convention Association, right below Amsterdam and Madrid, and just above Copenhagen.<br>\r\nLisbon airport (LIS) is a 15 minutes drive by car/taxi. Going by taxi it will costs approx. €15 depending if they will charge you for your luggage.<br>\r\nYou can also go by metro line Linha Vermelha (red) that goes every 6 to 9 minutes.<br>\r\nTrains go to Cais do Sodré railway station which is near the centre of Lisbon, the commute will take about 30 minutes and costs €2.20.<br>\r\n<br>\r\nWhen you have the luxury of spare time whilst visiting this amazing city on a business trip, go see a traditional Fado. Fado is Lisbon&#39;s unique musical expression, a combination of voice and guitar that is performed across the city in fado houses. Landmarks such as the Belem Tower or the Jardin Botanico or also not to be missed. Feeling more adventurous?  see the city from the spectacular view from the Elevador de Santa Justa, a 19th century lift that transports passengers up the steep hill from the Baixa district to the Largo do Carmo and the ruins of the Carmo church.</p>\r\n\r\n<p>The government tried to improve city transportation by introducing bike lanes and slowing down car traffic. Although it has been improved bare in mind that alleys are small and the city is hilly. If you take the tram and have some time left,  take line 18 as this is one of only 3 traditional tram lines that runs through the old town of Lisbon. Beginning in Graca, down to Alfama and to the Biaxa and up through Chiado to Bairro Alto and down to Campo Ourique.</p>\r\n\r\n<p>Landmarks of Lisbon are the Belem Tower (an UNESCO World Heritage Site), Jardim Botanico, Berardo Museum of Modern and Contemporary Art ( Warhol, Picasso, Bacon, Dali, Pollock), Castle of St. George, Praça do Comércio and the  Se de Lisboa Cathedral.<br>\r\n<br>\r\nIn 2017 Lisbon will host the 10th edition of the Rock’n’Roll Marathon, starting in Cascais and finishes in Lisbon. On the 31st of December a 10km race will be organised ‘El Corte Inglés São Silvestre de Lisboa’.  Additionally Lisbon is one of the cities that hosts the world’s only mindful triathlon called; Wanderlust 108. It combines three mindful activities—running, yoga, and meditation—in your favorite local park.. Lisbon is proudly hosting the Volvo Ocean Race race for a third consecutive edition 31 October 31st until November 5th 2017 at Doca de Pedrouços (<a href=\"http://www.volvooceanrace.com\"><u>www.volvooceanrace.com</u></a>).<br>\r\n<br>\r\nOutdoor (sport) activities are plenty in the city like  hiking in the city - The hilly nature of the city will offer a nice challenge!- or running in the city parks; Gulbenkian Gardens, Parque Eduardo VII, Jardim do Torel, Campo Grande Garden.<br>\r\n<br>\r\nAnd do not forget Let’s not forget the Next you have beautiful  the beaches which are nearby, like Guincho (best swimming area), Meco (Peaceful atmosphere), Tamariz (easy to reach from city center ) and Morena (fun vibe).</p>\r\n', 'ab46484da3752a44bf44e2eeb2e74ee3.jpg', 'www.clubmondain.com', '', '', '', 'Active', 'News', '2017-09-20', '2017-10-24'),
(36, 89, 44, 32, 'Zurich - one of the world\\\' s largest financial centers', '<p>Zürich is among the top ten most liveable cities in the world, according to the Economist’s Intelligence Unit’s Global Liveability Ranking. Despite its small population it’s a global city and one of the world’s largest financial centres. At the same time it’s a vibrant city combining an ancient city centre with contemporary trends.</p>\r\n\r\n<p><strong>Transport</strong><br>\r\nFrom Zürich Airport (ZRH) it’s 12 kilometres to get to the city centre. Taking the train from the Zürich Airport train station to the city centre takes 11 minutes.<br>\r\nTickets (single journey) cost 6.60 CHF / 5.70 euro&#39;s. It’s also possible to reach the city centre by taxi. This costs around 70 CHF / 64 euro’s. </p>\r\n\r\n<p>Using public transport in Zürich is common and of high quality. You can use the S-Bahn (local trains), trams, buses (also called trolley buses), boats, funicular railways and cable cars (Luftseilbahn Adliswil-Felsenegg). Tickets bought for a trip can be used on all means of transportation.</p>\r\n\r\n<p>Zürich has a program to improve facilities for bicycle traffic. You can &#39;<a href=\"https://www.zuerich.com/en/visit/sport/zurich-on-wheels\">hire&#39;</a> a bike for free on a number of locations throughout the city when you present a valid ID and a deposit of CHF 20.  </p>\r\n\r\n<p><strong>Landmarks & Cultural Highlights</strong><br>\r\nLandmarks worth a visit are churches such as Fraumünster, Grossmünster and St. Peterskirche and museums being Kunsthaus, Schweizerisches Landesmuseum, Beyer Museum and Museum Rietberg. Zürich has a vibrant cultural setting: next to museums they also have exquisite theatres.</p>\r\n\r\n<p><strong>Healthy, sports and outdoor activities</strong><br>\r\nParks suitable for running are the Botanical Garden, Chinese Garden and Uetliberg. The area around Zürich also has lots of hiking paths.<br>\r\nZürich has great facilities when you like to cycle. The biking routes are mostly marked with red and white signs. The yellow lines are also meant for bikers.<br>\r\nThere are also lots of curling facilities.<br>\r\nTwo popular running events take place every year. The first is the Zürich Marathon. This marathon, with a distance of 42.195 km (26 miles)  starts and finishes at Zurich Mynthenquai. The second popular running event is the New Year’s Eve Run, offering various distances and starting and finishing in Schlieren (near Zürich).</p>\r\n\r\n<p> </p>\r\n', '1506686604_switzerland-2520399_960_720.jpg', 'Zurich', 'http://', 'http://', 'http://', 'Active', 'News', '2017-09-29', '2017-11-08'),
(37, 89, 13, 31, 'Vienna - true city for innovation and professionalism', '<p>Vienna combines imperial history with post-modernism and is well known for the high quality of life it offers. Besides this it is a true city for innovation and professionalism: the city was ranked 1st globally for its culture of innovation in 2007 and 2008 and between 2005 and 2010. Vienna was the number-one go to destination for international congresses and conventions.</p><p><strong>Transport to Vienna</strong><br>From Vienna International Airport (VIE) it takes 20 minutes by car to reach the city centre. (20 kilometres). From the airport the S-Bahn S7 departs twice an hour to Vienna in 25 minutes (direction Wolkersdorf im Weinviertel Bahnhof). Ticket prices vary from €2.40 to €3.90.</p><p>The City Airport Train takes you to the city centre in 16 minutes for €12.00 max.</p><p><br><strong>Transport within Vienna</strong><br>Vienna is a convenient city for using bicycles. The city runs the Citybike Wien shared-bike program, with bike stands everywhere throughout the city. Bicycles can be taken on carriages marked with a bike symbol on the S-Bahn and U-Bahn.</p><p>To get across town you can take trains, trams, buses, the underground (U-Bahn) and the S-Bahn regional trains. Services are frequent and you rarely have to wait more than 10 minutes. Transport maps are posted in all U-Bahn stations and at many bus and tram stops.</p><p>Taxis are reliable and relatively cheap.</p><p><strong>Landmarks and Cultural Highlights</strong><br>The historic centre of Vienna is a UNESCO World Heritage Site of itself, next to the Palace and Gardens of Schönbrunn. Other noteworthy places to visit are Riesenrad (ferris wheel), Schloss Belvedere (palace), Stephansdom (cathedral), Staatsoper (architecture) and Hofburg (palace). Vienna has lots of high quality museums such as Kunsthistorisches Museum Vienna, MuseumsQuartier, Leopold Museum and the Kaiserliche Schatzkammer. Moreover, Vienna has a musical heritage you can admire in concerts at the Wiener Musikverein. Last, Vienna has unique coffee houses and a great culinary kitchen.</p><p><strong>Healthy, sports and outdoor activities</strong><br>Vienna has countless parks, suitable for walking and running, such as the Stadtpark, the Burggarten, the Volksgarten, the Schlosspark at Schloss Belvedere and the Donaupark. There are also small parks (Beserlparks) in the innercity areas.</p><p>Every year the Vienna City Marathon takes place in May, attracting 10,000 participants. The marathon starts close to the UNO complex (the site of the United Nation) and ends at the “Universitätsring” in front of Vienna Burgtheater.</p>', '1507118294_Vienna.jpg', NULL, 'http://', 'http://', 'http://', 'Active', 'News', '2017-10-04', '2017-10-06'),
(38, 1, 70, 34, 'Madrid - Greenest city in Europe', '<p>Madrid is the capital of Spain and the largest city in the EU after London and Berlin. It’s a city, celebrating its liveliness in arts, culture, food and nightclubs. Next to this, Madrid is one of the major financial centers in Europe and is home to various important international organizations.</p>\r\n\r\n<p><strong>Transport to Madrid</strong></p>\r\n\r\n<p>Madrid has one airport: Madrid Barajas Airport (MAD). The distance between the airport and the city center is 17 kilometres. Travelling by metro to the city center (station Puerta del Sol) takes 35 minutes. You have to change stations twice, at Nuevos Ministerios and at Tribunal or Plaza de España. For a ticket you pay €5.00 including €3.00 airport surcharge.</p>\r\n\r\n<p>Travelling by train to the city center (station Puerta del Sol) takes 30 minutes and you need to transfer at Chamartín or Nuevos Ministerios. The price of a ticket is €2.60. The last option is travelling by bus, which takes 30 minutes to get to the city center (Cibeles, Plaza de Cibeles). A single journey costs €5.</p>\r\n\r\n<p><strong>Transport within Madrid</strong></p>\r\n\r\n<p>Traveling within Madrid is easiest and fastest by metro, but bus and taxi are also great options. Madrid is not bicycle-friendly: there are few to no bike lanes. There are a few companies renting out bicycles and electric bicycles.</p>\r\n\r\n<p><strong>Landmarks & Cultural Highlights</strong></p>\r\n\r\n<p>Madrid has lots to offer in terms of culture, architectural highlights, food and art. Some of Madrid’s most exciting highlights are: Museo del Prado (museum), Plaza Mayor (square), Centro de Arte Reina Sofía (museum), Parque del Buen Retiro (garden), Museo Thyssen-Bornemisza (museum) and Plaza de Toros & Museo Taurino (stadium). Madrid is home to three UNESCO World Heritage Sites: Monastery and Site of the Escorial, University and Historic Precinct of Alcalá de Henares and Aranjuez Cultural Landscape. Last but not least, don’t forget to taste some of the amazingly delicious tapas in the La Latina district.</p>\r\n\r\n<p><strong>Healthy, sports and outdoor activities</strong></p>\r\n\r\n<p>Madrid is a very healthy city to go to, since it has the highest number of trees and green in Europe. Because of this there are lots of nice parks where you can take a walk or a run, for example: El Retiro Park, Parque del Oeste, Madrid Río, Juan Carlos I Park, Templo Debod and Casa de Campo Park.</p>\r\n', 'b2b2db688af12c1bb629705fa22367a0.jpg', 'Madrid, Spain', '', '', '', 'Active', 'News', '2017-10-17', '2017-10-17'),
(39, 1, 70, 35, 'Barcelona - City of Modern Art', '<p>Few European cities can offer you the wide diversity of cultural experience that you&#39;ll find here in Barcelona. Couple that with the luxury of 4.2 km of beach only a short walk from the city centre, warm sunshine most of the year, you have all the makings of a complete holiday in Spain.</p>\r\n', '7b5109d9dee0bfe9d1a4bdc2ffa976ec.jpg', 'Barcelona', '', '', '', 'Active', 'News', '2017-10-21', '2017-10-21'),
(40, 1, 59, 36, 'Frankfurt - the largest financial center of Europe', '<p>Almost one in three of the people living in Frankfurt do not hold a German passport. No matter where visitors come from, they will always meet people in Frankfurt who speak their language and a restaurant that serves their favourite food. The open and hospitable atmosphere in Frankfurt stems from its centuries-old role as a trading centre. This liberal and democratic tradition of the city may be one reason for the fact that people from very diverse cultures have lived here in peace with one another for a long time. They have all contributed to making this city shine slightly differently from every angle, like a jewel shines slightly differently when you look at it from different sides.</p>\r\n', '1e316db6489acaf691a296e9443e72c6.jpg', 'Frankfurt', '', '', '', 'Active', 'News', '2017-10-21', '2017-10-21'),
(41, 1, 79, 6, 'London - among the oldest of the world\\\'s great cities', '<p>London is the diverse and dynamic capital of the United Kingdom and is tightly packed with lots of exciting experiences. London is a leader ion many areas, such as culture, arts, entertainment, tourism and research and development.</p>\r\n\r\n<p><strong>Healthy, sports and outdoor activities</strong><br>\r\nWalking is a popular activity in London and there are lots of areas dedicated to it, for example: Wimbledon Common, Epping Forest, Hampton Court Park, Hampstead Heath, the eight Royal Parks and canals.</p>\r\n\r\n<p>Annually, the London Marathon takes place (April) and the London Triathlon, the longest in the world (August).</p>\r\n\r\n<p><strong>Landmarks and Cultural Highlights</strong><br>\r\nLondon has a variety of landmarks. If you like museums, greatwe recommendations are the British Museum, the National History Museum, the Tate Modern and the National Gallery. Architectural features worthy of a visit are St. Paul’s Cathedral, Shakespeare’s Globe, the Tower of London and Westminster Abbey. The last two are UNESCO World Heritage Sites, next to Maritime Greenwich and the Royal Botanic Gardens, Kew. Want to experience London’s night life? Visit one of the many pubs this city has.</p>\r\n\r\n<p><strong>Transport within London</strong><br>\r\nLondon has a great transport network, which makes it easy to get around. The easiest way is by London Underground. Buses can be a nice way to see the city, but can be a slow form of transportation. Taxis are of great quality, but expensive negative opinion, suggest to rephrase. Trains are more useful for destinations farther away and traveling by car is not advisable: a lot has been done to discourage travelling by car.</p>\r\n\r\n<p>Cycling is a good way to get around the city, though traffic can be busy. It’s possible to renthire bikes throughout London fromvia Santander Cycles. You pick up a bike from a docking station and drop it off at another when you’re done. Access fee is free for the first 30 minutes, £2 (€2) for the first 24 hours and after this you pay an additional £2 for every 30 minutes. Otherwise you can find a rentinghiring company.</p>\r\n', 'fea31bc288270b16f500f2aa14ae1bd5.jpg', 'London', '', '', '', 'Active', 'News', '2017-11-10', '2017-11-10'),
(44, 1, 168, 3, 'Sauna - Doing it right every step', '<p>Originally comming from Finland, the use of the sauna is now widely known around the world. <br>\r\nThe sauna is beneficial in many ways; to relax the muscles, improve blood circulation, revitalize the skin. <br>\r\nAnd it is also a great way to complete your day and ease mental stress. <br>\r\nWhenever you decided to use this to relax and go for a (quick) visit to the sauna, we propose the following steps to fully benefit and making it worth your time. </p>\r\n\r\n<p>Before going into the sauna, make sure you take a shower and dry yourself.</p>\r\n\r\n<p>When entering the sauna, decide which bench you want to sit. </p>\r\n\r\n<p>As the heat goes up, it is much warmer all the way up. So if you are a beginner, take it easy and get yourself on one of the lower bench. If there is enough space, first lay down. If there is not, you can sit with your legs up slightly. </p>\r\n\r\n<p>Use the first 5 to 10 minutes to go into the pre-sweat phase, adding water with the next 3 to 4 minutes to sweat it all out. Then take the last 1-2 minutes to post-sweat. And we would recommend you to sit the last 2 minutes upright. </p>\r\n\r\n<p>When you have left the sauna, get yourself into the fresh air if possible. Just sit there for about 2 minutes and then cool down in a cold shower. This will help the circulation to your skin and cooling down the body. </p>\r\n\r\n<p>Then you come into the last phase that most of us tend to skip. This phase we would say is the most important one; the relaxation phase.  It is there to really ease in and get yourself the results you wanted; a relaxed mind and body. </p>\r\n\r\n<p>Want some more tips on using the sauna straight from the Finish?<br>\r\nRead more here: <a href=\"http://www.visitfinland.com/article/10-sauna-tips-for-beginners/\" target=\"_blank\">http://www.visitfinland.com/article/10-sauna-tips-for-beginners/</a></p>\r\n', '8401a759dbd8c77da6eb59ad2f1416fc.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-02-20', '2018-02-20'),
(54, 1, 168, 3, 'Finding gym time  | Club Mondain', '<p><strong>Finding gym time  | Club Mondain</strong></p>\r\n\r\n<p>Time, the one thing no one can stop and most of us do not have enough of. Especially when wanting to keep our energy and vitality high exercise is an essential part to achieve this. Besides all daily tasks, weekly targets and monthly goal - how do you squeeze in gym time?</p>\r\n\r\n<p>When we do not manage to exercise the body and relax the mind from time to time energy goes down. I think we can all agree on that, but how much do you really need? Here at Club Mondain we want to motivate you to do those first crucial steps to get you going!</p>\r\n\r\n<p>Here is our 5 step guide to finding time:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Identify what type of exercise suits you. Running, fitness, swimming, yoga, tai chi, boxing or hiking to name a few.</p>\r\n </li>\r\n <li>\r\n <p>Take a critical look at you agenda. How time do you really need? There are gym exercises that take 15 minutes but have the same impact as 1 hour run.</p>\r\n </li>\r\n <li>\r\n <p>Create the time you need. Building it up gradually is even best. Start with 10 minutes and work up to the desired work-out time.</p>\r\n </li>\r\n <li>\r\n <p>Combine exercise and existing tasks as much as possible. Get up earlier and cycle to the office, walking to a restaurant or fitness during your lunch break.</p>\r\n </li>\r\n <li>\r\n <p>Really celebrate each time you managed to create time to exercise by complimenting yourself (no we do not mean that tony chocolonely bar!)</p>\r\n </li>\r\n</ol>\r\n\r\n<p>Take a look at our previous blog on Power Walking Into Mindfulness for some inspiration.</p>\r\n\r\n<p>Could use more support? Check out our 3-month signature program in the <a href=\"https://www.clubmondain.com/Home/shop/\">Shop</a> that will help you with your specific health goal wherever you are. With this practical program you’ll receive personalized suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain<br>\r\ngo@clubmondain.com<br>\r\n020-7163114</p>\r\n', '924ce62154b82bfcc4a847da48c76770.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(55, 1, 168, 3, 'Healthy Eating While on the Go | Club Mondain', '<p><strong>Healthy Eating While on the Go | Club Mondain</strong></p>\r\n\r\n<p>Continuing your (healthy) eating habits while you are travelling can be a challenge. The different timezone and cultural habits at the place of your destination alone are enough to intervene your routine. Let alone the lack of time to sit down for meals or you are likely of consuming more than you need due to the social setting.</p>\r\n\r\n<p>Setting some basic routines in place will support you in the continuation of your healthy habits.<br>\r\nClub Mondain offers the following 5 easy routines for healthy days:</p>\r\n\r\n<ol>\r\n <li>Carry your own water bottle and stay hydrated. Sometimes feeling hungry actually means you are thirsty. Even setting an alarm or installing an app to remind you to drink enough water can help create this habit.</li>\r\n <li>Have a substantial meal before you leave for any flight. So you will not easily succumb to airport treats.</li>\r\n <li>Bring your own snacks that have no added sodium and sugar. Nowadays (raw and unsalted) nuts, healthy bars and dried fruits are sold in most supermarkets and available in convenient small packages. Make sure you put them in every bag you own, this way you can tackle the first cravings with a light snack.</li>\r\n <li>On your way to the hotel try and spot or ask for healthy restaurants or lunchrooms so when you do go out (with colleagues) you have an alternative to the nearest steakhouse. Also opting for the meal with the most veggies versus meats and fries will set a positive tone for the rest of your stay.</li>\r\n <li>Go for an extra workout possibly with colleagues. Sometimes it inevitable that you will eat and/or drink more than you need on a trip. So how about also working out more? A hike or jog in a local park or few laps in a nearby swimming pool can do wonders for your mental and physical wellbeing.</li>\r\n</ol>\r\n\r\n<p>Not sure where to look? Check out the Events & Spaces page on www.clubmondain.com. Here you can find or add Healthy Spaces for your next trip.</p>\r\n\r\n<p>Or sign up for our signature program for 3 months that will help you on your specific health goal wherever you are. With this practical program you’ll find your specific suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.<br>\r\n<br>\r\nCould use more support? Check out our 3-month signature program in the <a href=\"https://www.clubmondain.com/Home/shop/\">Shop</a> that will help you with your specific health goal wherever you are. With this practical program you’ll receive personalized suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain<br>\r\ngo@clubmondain.com<br>\r\n020-7163114</p>\r\n', 'dffd2d7cbe2737856faa15dd2ee1d8d0.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-26'),
(56, 1, 168, 3, 'Drinking while traveling for business | Club Mondain ', '<p><strong>Drinking while traveling for business | Club Mondain</strong></p>\r\n\r\n<p>Seems very normal to order a beer or wine after long day of work. Especially when dining out with colleagues or business associates. However often we do not realize how much more alcohol is consumed this way.</p>\r\n\r\n<p>Alcohol is not only bad for your health, but it brings down your energy and focus as well. It has been linked to sleep deprivation and impaired decision making. Very unwanted when travel for business and needing to perform meeting after meeting.</p>\r\n\r\n<ol>\r\n <li>We from Club Mondain want to share a few healthy suggestions to lessen your alcohol intake:</li>\r\n <li>Just start with being aware when you are traveling and crave alcohol while if you were back home you would not have,</li>\r\n <li>Set a personal limit to the number of glasses you will have,</li>\r\n <li>Order water for the entire table and initiate refills,</li>\r\n <li>Agree with the group to do an early morning workout so every sticks to water,</li>\r\n <li>Share the benefits such as higher energy and focus when you refrain from drinking alcoholic beverages.</li>\r\n</ol>\r\n\r\n<p>Trouble sleeping? Instead of a nightcap check out our previous blog on jetlag.</p>\r\n\r\n<p>Could use some support? Check out our 3-month signature program in the <a href=\"https://www.clubmondain.com/Home/shop/\">Shop</a> that will help you on your specific health goal wherever you are. With this practical program you’ll find your specific suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain<br>\r\ngo@clubmondain.com<br>\r\n020-7163114</p>\r\n', 'e8b9ed00ec9d1109717483c22851a3ac.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(57, 1, 168, 3, 'Yoga for Body & Mind | Club Mondain', '<p><strong>Yoga for Body & Mind | Club Mondain</strong></p>\r\n\r\n<p>Yoga is all the rave right now. It’s super hip and you can do a class almost anywhere at any time. Great! But why exactly? And what are the differences between the many types?</p>\r\n\r\n<p>In western society Yoga is associated with movements of the body, relaxation and flexibility. In the east it is actually more a way of life. Reasons to practice Yoga are personal, however it will surely help you to become more aware of your body, calm your mind and stretch them.</p>\r\n\r\n<p>Yoga comes in many shapes, styles and levels. Club Mondain likes to explore the 6 main streams types of Yoga:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Astanga - Focus on cardio</p>\r\n </li>\r\n <li>\r\n <p>Hatha - Focus on strength</p>\r\n </li>\r\n <li>\r\n <p>Vinyasa - Focus on cardio</p>\r\n </li>\r\n <li>\r\n <p>Kundalini - Focus on consciousness</p>\r\n </li>\r\n <li>\r\n <p>Yin - Focus on relaxing the mind</p>\r\n </li>\r\n <li>\r\n <p>Bikram - Focus on flexibility (higher temperature in the room)</p>\r\n </li>\r\n</ol>\r\n\r\n<p>Yogi&#39;s see everyone as a beginner, and every class is a new start, share with the teacher that you are new to their class. They will keep an extra eye on you. There is no need to carry your own mat for a one-time class, do always bring your own towel and water bottle.</p>\r\n\r\n<p>If joining a class is too intimidating you can start online and use YouTube tutorials as your guide like Man Flow Yoga: <a href=\"https://www.youtube.com/watch?v=0uWBd41d19c\">https://www.youtube.com/watch?v=0uWBd41d19c</a>.</p>\r\n\r\n<p>No matter where you start Yoga will serve to bring relaxation and exercise together.</p>\r\n\r\n<p>Could use more support? Check out our 3-month signature program in the <a href=\"https://www.clubmondain.com/Home/shop/\">Shop</a> that will help you with your specific health goal wherever you are. With this practical program you’ll receive personalized suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain<br>\r\ngo@clubmondain.com<br>\r\n020-7163114</p>\r\n', '002e21993672ba8c6cf74f90d0d0a378.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(58, 1, 168, 3, 'Power Walking | Club Mondain', '<p><strong>Power Walking | Club Mondain</strong></p>\r\n\r\n<p>Power Walking is an exercise method that is accessible to people from all levels of fitness, it is not intended to be out of breath or breaking a sweat. Therefore it does not require workout clothes although flat shoes are a must.</p>\r\n\r\n<p>Power Walking is an elevated form of walking that will get the blood and oxygen moving through your body. Especially after an intense meeting or work task, Power Walking is a great way to get back into your body.</p>\r\n\r\n<p>Taking a break and going outside is not only healthy for your body it is also a great way to relax your mind. By moving your body, your body gets a break from sitting still and the same time you create space for your mind to process the day so far. To create this space the trick is to use mindfulness in these 3 easy steps:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Name 3 things that you hear and 5 things that you see - literally</p>\r\n </li>\r\n <li>\r\n <p>Yes, even if you whisper. Make sure you put it in words</p>\r\n </li>\r\n <li>\r\n <p>This will bring you into the here and now. Away from your thoughts and back into your own body because you use your auditory and visual sensories.</p>\r\n </li>\r\n</ol>\r\n\r\n<p>An optimal moment for a Power Walk is right after lunch or go for lunch a few blocks over. This way you’ll benefit from the advantages of walking plus stimulate your digestion as well. however, any moment will do it. Just make sure that if you want to do it, you just go for it.<br>\r\n<br>\r\nAnd - tip from our members - just schedule it in, Whether you do this yourself, let your assistant or another your colleague do it as long as it is planned, you’ll go.</p>\r\n\r\n<p>Remember our previous blog on <a href=\"https://www.clubmondain.com/Home/newsDetails/45\">stretching</a>? You could even stretch before Power Walking, but it is not a must just always make sure you build your pace up gradually. Again the aim is not to sweat or be out of breath, build-up to a brisk pace and keep it up for at least 15 consecutive minutes.</p>\r\n\r\n<p>Could use more support? Check out our 3-month signature program in the <a href=\"https://www.clubmondain.com/Home/shop/\">Shop</a> that will help you with your specific health goal wherever you are. With this practical program you’ll receive personalized suggestions for every stay in your mailbox and get a friendly and to the point reminder every week, yep it’s that easy.</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain<br>\r\ngo@clubmondain.com<br>\r\n020-7163114</p>\r\n', 'd91a206954a6a7a42114d46ea5a40699.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(59, 1, 168, 3, 'Snooze you Lose… or not? | Club Mondain', '<p><strong>Snooze you Lose… or not? | Club Mondain</strong></p>\r\n\r\n<p>A good night&#39;s rest is as important to your health as food, water and shelter. However it is something most people currently struggle with. It’s usually not so much the hours of sleep but the quality of rest that is key to a healthy lifestyle. In order to enjoy the benefits of enough sleep, it basically comes down to having healthy habits in place that work for you.</p>\r\n\r\n<p>When asked most people know that sleep is important and when taking a closer look at their own routines know where they can improve. The tricky part is how to change. At Club Mondain we believe that first looking at small changes will lead to greater impact in the long run and in the end to the successful creation of new habits that add to your wanted results.</p>\r\n\r\n<p>First thing is to accept that you have slept poorly, or are sleeping bad. Then assess by looking back and writing down what happened or you did the evening before. Things like stress, digital screens, heavy meals or travel can all impact the quantity and quality of your sleep. When reviewing the list of causes try and think of just 1 solution or alternative to every occurrence that negatively impacted your rest. And make that one as simple as possible.</p>\r\n\r\n<p>Don’t see it as a solution for your bad sleep, but as a way to get to your wanted result.</p>\r\n\r\n<p>Here are 5 suggestions we recommend to help improve the quality of your sleep in the long run:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Create a slow-pace physical exercise routine in the evening like yoga, stretches or going on a short walk. This allows the mind to calm down and start processing the day. By gradually slowing down you prevent the mind from racing and hitting overdrive the second you lay down in bed,</p>\r\n </li>\r\n <li>\r\n <p>In order to release built up tension softly massaging your calves can be beneficial to fall asleep faster.</p>\r\n </li>\r\n <li>\r\n <p>Using a slightly heavier duvet and also help the body to relax and the mind to unwind. Too hot or not one handy? Opt for placing pillows on your legs.</p>\r\n </li>\r\n <li>\r\n <p>Shut down all electronics at least 1 hour before going to sleep. Even switching any mobile devices to flight mode to ensure undisturbed nights and leave it out of the bedroom,</p>\r\n </li>\r\n <li>\r\n <p>Use a sleep meditation ranging from 5 to 55 minutes. You can find many on YouTube or download the Headspace app, which is great to get started plus it still works even whilst your device is on flight mode.</p>\r\n </li>\r\n</ol>\r\n\r\n<p>Travel has additional implications such as different time zones, long commutes and new environment. Take a look at our previous blog on how to manage a <a href=\"https://www.clubmondain.com/Home/newsDetails/50\">jetlag</a>.</p>\r\n\r\n<p>Our signature program is designed to fit any multinational organisation, who wants to boost the vitality of their executives. Tailor-made vitality programs are available on request.</p>\r\n\r\n<p>Support for your international team? Contact Club Mondain headquarters now via +31(0)20-716 31 14 or go@clubmondain.com</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain</p>\r\n', '8dc4573cf14b41bea279a17fb661e503.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(60, 1, 168, 3, 'The power of stretching | Club Mondain', '<p><strong>The power of stretching | Club Mondain</strong></p>\r\n\r\n<p>Stretching is a great tool that is foremost simple, easy and can be done (almost) anywhere.</p>\r\n\r\n<p>Stretching your body can help to improve blood circulation, allowing the enhanced transportation of nutrient-rich blood and oxygen throughout the body. It decreases tensions in the body that helps to feel more relaxed. And if you are deskbound most hours of the day it alleviates most stiffness and pain resulting from lack of movement.</p>\r\n\r\n<p>It is a great way to start your day, or extra release in the middle of your day or do it right before bedtime for a good night&#39;s rest.<br>\r\nBefore stretching it is helpful to warm up the bodya bit by either jumping up and down or go for a short brisk walk for 5 minutes straight. This way the muscles are already more relaxed for greater stretch experience.</p>\r\n\r\n<p>To further maximise and benefit from stretching make it a daily routine. It’s like every sport where you get better with continuous practice.</p>\r\n\r\n<p>Club Mondain offers the following 6 easy stretches for healthy days:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Legs</p>\r\n </li>\r\n <li>\r\n <p>Hips</p>\r\n </li>\r\n <li>\r\n <p>Back</p>\r\n </li>\r\n <li>\r\n <p>Shoulders</p>\r\n </li>\r\n <li>\r\n <p>Arms</p>\r\n </li>\r\n <li>\r\n <p>Neck</p>\r\n </li>\r\n</ol>\r\n\r\n<p>Photo’s from Self.com <a href=\"https://www.self.com/gallery/essential-stretches-slideshow\">https://www.self.com/gallery/essential-stretches-slideshow</a></p>\r\n\r\n<p>Our signature program is designed to fit any multinational organisation, who wants to boost the vitality of their executives. Tailor-made vitality programs are available on request.</p>\r\n\r\n<p>Support for your international team? Contact Club Mondain headquarters now via +31(0)20-716 31 14 or go@clubmondain.com</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain</p>\r\n', '47061035b4087507769262ec2809ef80.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(61, 1, 168, 3, 'A weekend away from home | Club Mondain', '<p><strong>A weekend away from home | Club Mondain</strong></p>\r\n\r\n<p>Not often but sometimes it occurs that there is a weekend abroad during in the business trip. This brings a whole new set of challenges and opportunities for your vitality. So much to do and so much to see, but is this really the best time to be the tourist?</p>\r\n\r\n<p>Downtime is very valuable when traveling. The pace of work is usually much higher compared to being in the office. While focussing on this project the e-mails keep pouring in, you can be reach at all hours due to the time zone differences and working late is tempting when alone in a hotel room.</p>\r\n\r\n<p>Here at Club Mondain we want to suggest a few alternatives to the above scenario, so you can increase your energy and focus for the next week ahead:</p>\r\n\r\n<ol>\r\n <li>\r\n <p>Go to local spa or massage parlor,</p>\r\n </li>\r\n <li>\r\n <p>Schedule 1 hour without any devices,</p>\r\n </li>\r\n <li>\r\n <p>Do a free city tour, book it via the hotel, local tourist office or go to http://www.neweuropetours.eu/.</p>\r\n </li>\r\n <li>\r\n <p>Take a stroll down to the city and sit down in a park or café with a book,</p>\r\n </li>\r\n <li>\r\n <p>For low intensity do a yoga class or for high intensity take a drop-in bootcamp class.</p>\r\n </li>\r\n</ol>\r\n\r\n<p>These are but a few options, for more check out our <a href=\"https://www.clubmondain.com/Home/news/\">News</a> section for more blogs about cities or exercise. Either way especially when away for business and you must spend the weekend, use this time to create a space for your health and vitality!</p>\r\n\r\n<p>Our signature program is designed to fit any multinational organisation, who wants to boost the vitality of their executives. Tailor-made vitality programs are available on request.</p>\r\n\r\n<p>Support for your international team? Contact Club Mondain headquarters now via +31(0)20-716 31 14 or go@clubmondain.com</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain</p>\r\n', 'df05464ae2ceb7b26ee75069863d2c83.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24'),
(62, 1, 168, 3, 'Jet Lag  | Club Mondain', '<p><strong>Jet Lag  | Club Mondain</strong></p>\r\n\r\n<p>Jet lag is commonly described as a temporary sleep problem, difficulty staying alert, problems in the stomach area and a general feeling of unease.</p>\r\n\r\n<p>However it is possible to recuperate from the signs. Notably flying east seems to be more problematically, whether going from Europe to Asia or coming back to Europe after having traveled to America.</p>\r\n\r\n<p>On average people need one whole day to compensate for every hour of time difference.<br>\r\nBut hey, tell me, who has time for that ?</p>\r\n\r\n<p>To help you overcome this we want to share a few travel hacks that our members have discovered and might be of interest to you too:</p>\r\n\r\n<p>In the plane</p>\r\n\r\n<ol>\r\n <li>\r\n <p>During the flight only drink water and do not eat on the plane. You will adjust faster to your new time zone by eating at the next mealtime once you arrive.</p>\r\n </li>\r\n <li>\r\n <p>Get a day flight (and stay awake) so when you arrive you can go straight to sleep and wake up in the with you ritme adjusted to the new timezone.</p>\r\n </li>\r\n <li>\r\n <p>However if you actually are an airplane sleeper, book a night fight so you can start the new day refreshed once you arrive.</p>\r\n </li>\r\n</ol>\r\n\r\n<p>Upon arrival</p>\r\n\r\n<ol>\r\n <li>\r\n <p>If you do arrive during the day. Try to get as much natural (sun)light as you can. This will signal the body to stay awake and energized.</p>\r\n </li>\r\n <li>\r\n <p>Get grounded by walking on standing on grass or soil for a period of time. You can also hug a tree but those are rare at business hubs plus there will be stares to deal with. However if Deepak Chopra says so there must be something to it.</p>\r\n </li>\r\n <li>\r\n <p>Hit the ground running and go out to do some exercise as soon as you can in the new timezone. It will increase energy, stimulate metabolism and relax the mind. On the flip side remember to avoid any strenuous exercise about 2 hours before you intend to go to sleep.</p>\r\n </li>\r\n</ol>\r\n\r\n<p>We do not believe there is such a thing as a perfect way, but we do believe there is a best way that serves you. In light of these tips do you care to share?</p>\r\n\r\n<p>Our signature program is designed to fit any multinational organisation, who wants to boost the vitality of their executives. Tailor-made vitality programs are available on request.</p>\r\n\r\n<p>Support for your international team? Contact Club Mondain headquarters now via +31(0)20-716 31 14 or go@clubmondain.com</p>\r\n\r\n<p>Healthy Stays!<br>\r\nTeam Club Mondain</p>\r\n', 'cc138e17b9fda0a8aabb88c8cad751a4.jpg', 'Amsterdam', '', '', '', 'Active', 'News', '2018-09-24', '2018-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_business`
--

CREATE TABLE `cmd_business` (
  `business_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as User Foreign Key Table Data',
  `country_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Country Foreign Key Table Data',
  `city_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as City Foreign Key Table Data',
  `business_name` varchar(255) DEFAULT NULL,
  `business_description` text,
  `business_website_url` varchar(255) DEFAULT NULL,
  `business_street` varchar(255) DEFAULT NULL,
  `business_latitude` float NOT NULL DEFAULT '0',
  `business_longitute` float NOT NULL DEFAULT '0',
  `business_postal_code` varchar(100) DEFAULT NULL,
  `business_image` varchar(255) DEFAULT NULL,
  `business_banner_image` varchar(255) DEFAULT NULL,
  `business_facebook_link` varchar(255) DEFAULT NULL,
  `business_twitter_link` varchar(255) DEFAULT NULL,
  `business_instagram_link` varchar(255) DEFAULT NULL,
  `business_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_business`
--

INSERT INTO `cmd_business` (`business_id`, `user_id`, `country_id`, `city_id`, `business_name`, `business_description`, `business_website_url`, `business_street`, `business_latitude`, `business_longitute`, `business_postal_code`, `business_image`, `business_banner_image`, `business_facebook_link`, `business_twitter_link`, `business_instagram_link`, `business_status`, `create_date`, `update_date`) VALUES
(29, 92, 21, 26, 'Henri & Agnes', 'a cozy restaurant in Brussels serving healthy lunch and brunch just a stone\'s throw away from the EU institutions', 'http://www.henrietagnes.com/', 'Rue Véronèse 48 1000 Brussels, Belgium', 50.8452, 4.38879, '1000', '1502272231_Capture.PNG', '1502272198_Capture.PNG', NULL, NULL, NULL, 'Active', '2017-08-09', '2017-12-06'),
(55, 89, 44, 32, 'Haus Hitl', 'Hitl is the first world\'s vegetarian restaurant. \r\nIt has a la carte restaurant, popular buffet and take away.\r\n* On Friday, Saturday and Sunday from 11 P.M. the Haus Hitl becomes a club\r\n* The Hitl Buffet is open until 11pm.', 'http://www.hiltl.ch', 'Sihlstrasse 28, Zürich, Switzerland', 47.3733, 8.5367, '8001 Zurich', '1506520124_switzerland-2520399_960_720.jpg', '1506520124_switzerland-2520399_960_720.jpg', NULL, NULL, NULL, 'Active', '2017-09-27', '2017-12-06'),
(57, 89, 44, 32, 'Mokei', '17.50 Euro per class \r\nPrivate training is possible; 30 min - 52.50 Euro /  or 60 min -  / 105 Euro', 'http://www.mokei.ch/category/pilates', 'Ruedi-Walter-Strasse 2A, Zürich, Switzerland', 47.4148, 8.54189, '8050', '1509700849_Mokei.jpg', '1509700849_Mokei.jpg', NULL, NULL, NULL, 'Active', '2017-09-27', '2017-12-06'),
(59, 89, 44, 32, 'Hallenbad Oerlikon', 'Price of swimming is 7 Euro.\r\nTip: take a coin of 5 Swiss Franc to close your locker.', 'http://www.stadt-zuerich.ch/content/ssd/de/index/sport/schwimmen/hallenbaeder/hallenbad_oerlikon/information.html', 'Wallisellenstrasse 100, Zürich, Switzerland', 47.4104, 8.55623, '8050', '1506523975_1502456353624.jpg', '1506523975_1502456353624.jpg', NULL, NULL, NULL, 'Active', '2017-09-27', '2017-12-06'),
(61, 89, 44, 32, 'Tibits', 'Cosy and fast vegetarian and vegan food ; Pay by weight, \r\nTibits restaurant is a chain of restaurants present in Switzerland and London. \r\nFood served until 30 minutes before closing time.', 'http://www.tibits.ch', 'Tramstrasse 2, Zürich, Switzerland', 47.4091, 8.5467, '8050', '1506685880_Tibits Oerlikon Zurich .png', '1506685880_Tibits Oerlikon Zurich .png', NULL, NULL, NULL, 'Active', '2017-09-29', '2017-12-06'),
(63, 89, 13, 31, 'Swing Kitchen', 'Swing Restaurant', 'http://www.swingkitchen.com', 'Schottenfeldgasse 3, Vienna, Austria', 48.1972, 16.3438, '1070', '1507189624_Swing Kitchen Vienna-2.jpg', '1507189624_Swing Kitchen Vienna-2.jpg', NULL, NULL, NULL, 'Active', '2017-10-05', '2017-12-06'),
(64, 89, 13, 31, 'Harvest Bistro', 'The Vegetarian bistro. \r\nHarvest Café-Bistrot serves breakfast until 12. After which there is an à la carte menu throughout the afternoon. For dinner there are mainly vegan meals by means of a buffet. There is also a terrace facing the Karmelitermarkt and its church.', 'http://harvest-bistrot.at', 'Austria', 47.5162, 14.5501, 'vienna', '1507284642_Harvest bistro Vienna_3.jpg', '1507284642_Harvest bistro Vienna_3.jpg', NULL, NULL, NULL, 'Active', '2017-10-06', '2017-12-06'),
(65, 89, 13, 31, 'Deli Bluem', 'Deli bluem is a small bistro café that serves only healthy dishes from fresh ingredients. They exclusively use biological ingredients and the dishes are free from conservatives, coloring agents or other additives.', 'http://www.delibluem.com', 'Laudongasse 15, Vienna, Austria', 48.2132, 16.3509, '1080', '1507285429_Deli beum Vienna.jpg', '1507285429_Deli beum Vienna.jpg', NULL, NULL, NULL, 'Active', '2017-10-06', '2017-12-06'),
(69, 89, 70, 34, 'Gymage', 'Madrid is home to the the first luxury keep-fit centre in Europe, called: Gymage. Based on the concept of \"Social Fitness\" it\'s designed for you to exercise and maintain a healthy lifestyle in a comfortable surrounding. Also welcoming enough to meet up with other liked-minded people.', 'http://www.gymage.es/', 'Calle de la Luna, 2, 28004 Madrid, Spanje', 40.4214, -3.70481, 'Calle de la Luna, 2, 28004 Madrid, Spanje', '1512474790_Gymage Madrid.jpg', '1512474790_Gymage Madrid.jpg', NULL, NULL, NULL, 'Active', '2017-10-19', '2017-12-05'),
(70, 89, 70, 34, 'Arian Gym and Pool', 'Arian Pool & Gym features a fully equipped fitness center, various courses and a large swimming pool', 'http://www.gimnasioarian.com/', 'Calle Flora, 3, 28013 Madrid, Spanje', 40.4181, -3.70779, '28013', '1508430634_arian gym and pool.jpg', '1508430634_arian gym and pool_v2.jpg', NULL, NULL, NULL, 'Active', '2017-10-19', '2017-12-05'),
(71, 89, 70, 34, 'MOX - healthy food & drink', 'Smoothie and juice bar in Madrid, Spain', 'http://www.facebook.com/moxlife/', 'Calle Corredera Baja de San Pablo, 53, 28004 Madrid, Spanje', 40.4238, -3.70245, '28004', '1508431084_Mox.jpg', '1508431084_Mox.jpg', NULL, NULL, NULL, 'Active', '2017-10-19', '2017-12-05'),
(72, 89, 70, 34, 'Parque Jardín de La Vega', 'The Garden of the Vega was designed in the style of a botanical garden, in order to teach respect and love for the nature to the present and future generations. Facilities include: Greenhouse, Bonsai Garden, Nature Classroom, Kiosks-bars, lakes, sports courts, children\'s games', 'http://www.alcobendas.org/es/cargarFichaTerritorial.do?identificador=532', 'Av. Olímpica, 5, 28108 Alcobendas, Madrid, Spanje', 40.5361, -3.63355, '28108', '1509700617_Parque Jardín de La Vega_v2.jpg', '1509700617_Parque Jardín de La Vega_v2.jpg', NULL, NULL, NULL, 'Active', '2017-10-19', '2017-12-05'),
(73, 89, 70, 34, 'Tejas verdes', 'Tejas Verdes is located in an elegant mansion, designed in the traditional Spaniard style. As you pass the entrance gate, you step into another time. You go back centuries, as if entering a XVIth century convent. Each corner has its own charm and its own history.\r\nClosed between 4pm-830m pm', 'http://www.tejasverdes.com/en/', 'Paseo de Europa, 8, 28703 San Sebastián de los Reyes, Madrid, Spanje', 40.5424, -3.62518, '28703', '1508432475_Tejas Verdes Madrid.jpg', '1508432475_Tejas Verdes Madrid.jpg', NULL, NULL, NULL, 'Active', '2017-10-19', '2017-12-05'),
(76, 100, 70, 34, 'Madrid Rio', 'Lovely park along the river Manzanares in Madrid. Perfect for running/biking, but also for soccer, tennis and skating.', 'http://www.esmadrid.com/fr/information-touristique/madrid-rio', 'Puente de Toledo', 40.3997, -3.71494, '28019', '1512475102_Rio park Madird.jpg', '1512475102_Rio park Madird.jpg', NULL, NULL, NULL, 'Active', '2017-11-07', '2017-12-05'),
(77, 88, 59, 40, 'Yellow Yoga Gelber Raum', 'Yellow yoga  is a Community Supported Yoga Project. They offer drop-in yoga classes and courses that are taught by experienced yoga teachers. The price you pay is according to your income.', 'http://yellow-yoga.com/kursplan-schedule-gelber-raum/', 'Mariannenstraße, Berlijn, Duitsland', 52.4991, 13.4223, '10997', '1517238538_Yellow yoga.jpg', '1517238538_Yellow yoga.jpg', NULL, NULL, NULL, 'Active', '2017-11-08', '2018-01-30'),
(99, 88, 168, 3, 'Spirit Restaurant', 'At Spirit you serve yourself. The buffet offers a variety of fifty different breakfast, lunch or dinner dishes, juices and patisserie to choose from. All guaranteed 100% organic and 100% vegetarian.', 'http://www.spiritrestaurants.nl/', 'Czaar Peterstraat, Amsterdam, Nederland', 0, 0, '1018 PR', '1512643876_Spirit Amsterdam.jpg', '1512643876_Spirit Amsterdam.jpg', NULL, NULL, NULL, 'Active', '2018-01-19', '0000-00-00'),
(100, 88, 168, 3, 'Vegan Junk Food Bar', 'Serves vegan variety on comfort foods which are all plant-based ', 'http://www.veganjunkfoodbar.com/', 'Staringplein 22, 1054 VL Amsterdam, Nederland', 52.3603, 4.86321, '1054 VL', '1512646682_VJFB.jpg', '1512646682_VJFB.jpg', NULL, NULL, NULL, 'Active', '2017-12-07', '0000-00-00'),
(101, 88, 168, 3, 'SNCKBR', 'SNCKBR strictly makes healthy comfort food, with ingredients thatmoderate in fat, free of refined sugars and artificial add-ons, and, where possible without, gluten and carbohydrates.', 'http://snckbr.com/SNCKBRWEST/home/?lang=en', 'Kinkerstraat 106, Amsterdam, Nederland', 52.3671, 4.8712, '1053EC', '1512649156_snckbr amsterdam.jpg', '1512649156_snckbr amsterdam.jpg', NULL, NULL, NULL, 'Active', '2017-12-07', '0000-00-00'),
(108, 100, 77, 1, 'Loving Hut Paris', 'vegan house is a chain of vegan restaurants worldwide', 'http://paris.lovinghut.fr/en/', '92 Boulevard Beaumarchais, 75011 Parijs, Frankrijk', 0, 0, '75011', '1513422982_Loving Hut Paris.jpg', '1513422982_Loving Hut Paris.jpg', NULL, NULL, NULL, 'Active', '2017-12-16', '0000-00-00'),
(124, 88, 168, 3, 'Bikram Yoga Amsterdam', 'The Bikram Yoga 26 posture series is a fun and challenging class performed in a heated room to improve circulation, help flexibility, prevent injury and aid in the healing of existing injuries.  (Source: own website)', 'http://bikramyoga.nl/ceintuurbaan/', 'Ceintuurbaan 426, Amsterdam, Nederland', 0, 0, '1074 EB', '1516878695_Bikram yoga Amsterdam.jpg', '1516878695_Bikram yoga Amsterdam.jpg', NULL, NULL, NULL, 'Active', '2018-01-25', '2018-03-15'),
(128, 159, 168, 3, 'Fitness Room @DoubleTree by Hilton', 'Situated on floor -1.\r\nPersonal Trainer can be arranged via the hotel reception desk.\r\nVarious cardio and weight training equipement present.', 'http://www.clubmondain.com/Home/profile-view/MTU5', 'Oosterdoksstraat 4, Amsterdam, Nederland', 0, 0, '1011 DK', '1518112943_Double tree gym.jpg', '1518112943_Double tree gym.jpg', NULL, NULL, NULL, 'Active', '2018-02-09', '2018-03-15'),
(129, 159, 168, 3, 'Sky Lounge @DoubleTree by Hilton', 'From SkyLounge Amsterdam on the 11th floor, you will have stunning views over the historic city and the IJ River from one of the most exceptional lounge bars of Amsterdam. Enjoy a relaxed atmosphere, fine cocktails, specially selected wines and luxurious food.', 'http://doubletree3.hilton.com/en/hotels/netherlands/doubletree-by-hilton-amsterdam-centraal-station-AMSCSDI/dining/skylounge.html', 'Oosterdoksstraat 4, 1011 DK Amsterdam, Nederland', 0, 0, '1011 DK', '1518113811_Double tree sky lounge.jpg', '1518113811_Double tree sky lounge.jpg', NULL, NULL, NULL, 'Active', '2018-02-08', '2018-03-15'),
(130, 88, 168, 3, 'Vondelpark', 'With 10 million visitors a year the Vondel Park is very famous. Open from sun up till sun down. Popular for joggers, skaters, dog walkers and families.', 'http://www.vondelpark.info/', 'Van Eeghenstraat, Amsterdam, Nederland', 52.3574, 4.87268, '1071 GK', '1518115536_Vondelpark.jpg', '1518115536_Vondelpark.jpg', NULL, NULL, NULL, 'Active', '2018-02-08', '2018-03-15'),
(131, 161, 168, 3, 'Nagomi Spa @Okura Amsterdam', '[EXCLUSIVE TO GUESTS ONLY] Calm down in Nagomi Spa\r\n\r\nNagomi Spa & Health at Hotel Okura Amsterdam is the perfect place to go if you want to get away from the stresses of daily life. The carefully composed selection of relaxing treatments will help you to escape the bustle of the city. Find out more about the spa\'s facilities and directly book your treatment.', 'http://www.clubmondain.com/Home/profile-view/MTYx', 'Ferdinand Bolstraat 333, Amsterdam, Nederland', 52.3488, 4.89388, '1072LH', '1518536799_Okura-amsterdam---nagomi-spa---double-treatment-room.jpg', '1518536799_Okura-amsterdam---nagomi-spa---double-treatment-room.jpg', NULL, NULL, NULL, 'Active', '2018-02-14', '2018-03-15'),
(132, 161, 168, 3, 'Nagomi Health @Okura Amsterdam', '[EXCLUSIVE TO GUESTS ONLY] Exercise and relax in total privacy\r\n\r\nNagomi Health, part of Nagomi Spa & Health, is an oasis of tranquillity where you can exercise in total privacy. Professional trainers are present to give you personal advice on your workout. After exercising, you can relax in the indoor swimming pool, Jacuzzi or one of our saunas, or get rid of jet lag as soon as possible with the Jet Lag Program.', 'https://www.clubmondain.com/Space/create_space_view/', 'Ferdinand Bolstraat 333, Amsterdam, Nederland', 0, 0, '1011AH', '1518536704_Okura-amsterdam---nagomi-health---pool-large.jpg', '1518536704_Okura-amsterdam---nagomi-health---pool-large.jpg', NULL, NULL, NULL, 'Active', '2018-02-14', '2018-05-10'),
(133, 161, 168, 3, 'Ciel Bleu Restaurant** @Okura Amsterdam', 'Two Michelin stars\r\n\r\nThe two-starred Michelin restaurant Ciel Bleu, by Onno Kokmeijer and Arjan Speelman, surprises you with culinary treats, spectacular views from the 23rd floor, and elegant and awarded service. We recommend to reserve your table in advance. \r\n\r\nInternational cuisine ▪ Chef\'s Table ▪ Private dining ▪ Award-winning wine list', 'https://www.clubmondain.com/Home/profile-view/MTYx', 'Ferdinand Bolstraat 333, Amsterdam, Nederland', 52.3488, 4.89388, '1072 LH', '1518537502_hotel-okura-amsterdam---ciel-bleu-overview--.jpg', '1518537502_hotel-okura-amsterdam---ciel-bleu-overview--.jpg', NULL, NULL, NULL, 'Active', '2018-02-13', '2018-03-15'),
(134, 161, 168, 3, 'Serre @Okura Amsterdam', 'Bib Gourmand by Michelin <Serre>\r\n\r\nSerre is the place to enjoy international specialties. Whether it\'s for a cup of coffee, a delicious business lunch or late afternoon drinks, you will immediately feel at ease when entering Serre. \r\n\r\n \r\nTerrace ▪ Contemporary ▪ Informal atmosphere ▪ Group reservations', 'https://www.clubmondain.com/Home/profile-view/MTYx', 'Ferdinand Bolstraat 333, Amsterdam, Nederland', 52.3488, 4.89388, '1072 LH', '1518537612_hotel-okura-amsterdam---serre-restaurant---terrace-with-guests.jpg', '1518537612_hotel-okura-amsterdam---serre-restaurant---terrace-with-guests.jpg', NULL, NULL, NULL, 'Active', '2018-02-13', '2018-03-15'),
(136, 164, 168, 3, 'Healthy Classes by Hotel NH Collection Amsterdam Doelen', 'At NH Amsterdam Doelen we value your health. On this platform you wil find exclusive offers that we have with health companies and trainers as well as our favorite spaces nearby the hotel. If you have any questions please feel free to contact us via +31(0)20 554 0600.', 'http://www.clubmondain.com/Home/profile-view/MTY0', 'Nieuwe Doelenstraat 26, Amsterdam, Nederland', 52.3681, 4.89557, '1012', '1519740144_healthyspace.jpg', '1519740144_healthyspace.jpg', NULL, NULL, NULL, 'Active', '2018-02-27', '2018-03-15'),
(137, 88, 168, 3, 'Svaha Yoga Amsterdam (Downtown Studio)', 'We preach, practice and teach flow yoga that helps you with you and makes everyday life more comfortable, connected and straight up amazing. Because yoga to us is not just about flexing your feet and touching your toes. It’s about what you learn on your way down.', 'http://svahayoga.com/', 'Begijnensteeg 1, Amsterdam, Nederland', 52.3695, 4.89091, '1012', '1519746428_yoga-3053488_640.jpg', '1519746428_yoga-3053488_640.jpg', NULL, NULL, NULL, 'Active', '2018-02-27', '2018-03-15'),
(145, 168, 168, 3, 'Winter Garden @ NH Krasnapolsky', 'Prepared fresh each morning, the hotel’s breakfast buffet ensures a balanced, healthy start to your day. The breakfast buffet includes a wide variety of fresh fruit juices, pastries, cold cuts, cheeses, fruit, yogurt, breads and much more. You can also request hot dishes made to order. If you are an early riser or have to leave before the buffet opens, ask reception about the availability of an earlybird breakfast.', 'http://www.clubmondain.com/Home/profile-view/MTY4', 'Dam 8, Amsterdam, Nederland', 52.3736, 4.89234, '1012', '1520865762_nh_collection_grand_hotel_krasnapolsky-259-buffet_breakfast.jpg', '1520865762_nh_collection_grand_hotel_krasnapolsky-259-buffet_breakfast.jpg', NULL, NULL, NULL, 'Active', '2018-03-12', '2018-03-15'),
(147, 169, 168, 3, 'De Stijl @ Artemis Amsterdam', 'The restaurant is the ideal place for a business appointment or an intimate dinner. In the bar you can enjoy different drinks and snacks in an informal setting and the adjacent waterside terrace is a welcoming place to eat, drink or just to enjoy the sun in one of our lounge sets.', 'http://www.clubmondain.com/Home/profile-view/MTY5', 'John M. Keynesplein 2, Amsterdam, Nederland', 0, 0, '1066', '1521065331_Artemis restaurant.jpg', '1521065331_Artemis restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-03-14', '2018-03-15'),
(148, 169, 168, 3, 'Gym @ Hotel Artemis', 'Free use of fitness facilities for guests', 'http://www.clubmondain.com/Home/profile-view/MTY5', 'John M. Keynesplein 2, Amsterdam, Nederland', 52.3418, 4.82495, '1066', '1521065561_Artemis Gym.jpg', '1521065561_Artemis Gym.jpg', NULL, NULL, NULL, 'Active', '2018-03-14', '2018-03-15'),
(151, 168, 168, 3, 'Fitness Room @ NH Barbizon Palace', 'NH Collection Amsterdam Barbizon Palace has a fitness room, which was renovated in 2016. It’s got all the basics for a workout, including cardio machines and weights - Free for NH guests to use - Range of cardio machines and weights - Water, apples and towels provided', 'http://www.nh-collection.com/hotel/nh-collection-amsterdam-barbizon-palace/services', 'Prins Hendrikkade 59-72, Amsterdam, Nederland', 52.3764, 4.90019, '1012', '1521463482_nh_collection_barbizon_palace-119-hotel_facilities.jpg', '1521463482_nh_collection_barbizon_palace-119-hotel_facilities.jpg', NULL, NULL, NULL, 'Active', '2018-03-19', '0000-00-00'),
(152, 170, 21, 26, 'Fitness and Sauna @ Radisson RED Brussels', 'As part of our mission to decrease our reliance on electricity, we have incorporated SportsArt equipment into our gym facilities. SportsArt is one of the first companies to create eco-friendly cycles and ellipticals. Their cycles and ellipticals convert the power generated by exercise into utility-grade electricity that can then be put back into the grid.', 'http://www.clubmondain.com/Home/profile-view/MTcw', 'Rue d\'Idalie 35, 1050 Elsene, België', 50.8374, 4.37239, '1050', '1521562854_Radisson Red Brussels fitness.jpg', '1521562854_Radisson Red Brussels fitness.jpg', NULL, NULL, NULL, 'Active', '2018-03-20', '2018-03-20'),
(153, 170, 21, 26, 'OUIBar + KTCHN  @ Radisson RED Brussels', 'Both early birds and night owls, rejoice ! At the OUIBar + KTCHN, you’ll never be too late for breakfast. Have anything you want from our à-la-carte menu, anytime. Yes, you can have coffee, croissant or eggs until 11pm. For real.', 'http://', 'Rue d\'Idalie 35, 1050 Elsene, Brussels, België', 50.8374, 4.37239, '1050', '1521559154_Hotel-Radisson-RED-Brussels-European-Quarter-1800pix-4-2.jpg', '1521559154_Hotel-Radisson-RED-Brussels-European-Quarter-1800pix-4-2.jpg', NULL, NULL, NULL, 'Active', '2018-03-20', '0000-00-00'),
(155, 171, 181, 60, 'Radisson Blu Centrum x General Electric', 'Radisson Blu offers everything you need for a successful corporate gathering or social event in the city center. Superior audiovisual equipment, 5-star guest rooms in the heart of the capital and proximity to major attractions work together to offer the perfect meeting environment.\r\nAll the ingredients for successful meetings have been taken care off including the award-winning catering concept Brain Food, which offers optimum nutrition for maximum focus, lower stress levels and productive participation.', 'http://www.clubmondain.com/Home/profile-view/MTcx', 'Grzybowska 24, 00-131 Warszawa, Polen', 52.2367, 20.9985, '00-131', '1521562537_conference_buffet_4_1280x960.jpg', '1521562537_conference_room_2_1280x960.jpg', NULL, NULL, NULL, 'Inactive', '2018-03-20', '2018-04-25'),
(156, 172, 168, 3, 'Bridges @ Sofitel Legend The Grand', 'At restaurant Bridges, it\'s all about fish. Executive Chef Andrès Delpeut is always looking for creative ways to make classic traditional dishes perfect with international influences and a unique twist. Bridges: a dining experience to delight all senses.\r\n\r\n(CLOSED BETWEEN 2:30pm - 6:3-pm)', 'http://www.clubmondain.com/Home/profile-view/MTcy', 'Oudezijds Voorburgwal 197, Amsterdam, Nederland', 0, 0, '1012', '1521636997_Sofitel the grand Restaurant.jpg', '1521636997_Sofitel the grand Restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-03-21', '0000-00-00'),
(157, 172, 168, 3, 'SoFit @ Sofitel Legend The Grand', 'SoFIT is Sofitel’s fitness concept that moves beyond traditional exercise with a range of innovative activities. The So FIT area is directly accessible via the So SPA and provides guests with state of the art high tech equipment including the Technogym Kinesis resistance training system, cross trainers and Technogym bicycles. We offer bottled water, fresh fruit and Hermes amenities to complete the guest experience.', 'http://www.clubmondain.com/Home/profile-view/MTcy', 'Oudezijds Voorburgwal 197, Amsterdam, Nederland', 52.3709, 4.89564, '1012', '1521637346_Sofitel the grand Fitness.jpg', '1521637346_Sofitel the grand Fitness.jpg', NULL, NULL, NULL, 'Active', '2018-03-21', '0000-00-00'),
(158, 172, 168, 3, 'SoSpa @ Sofitel Legend The Grand', 'SoSpa combines the relaxing ambiance of an exclusive five-star hotel with the practical conveniences of urban living. Set over two floors So SPA offers a range of services including several treatment rooms, an indoor heated swimming pool (39°Celcius) with jet stream, a wet zone with Turkish steam bath (hamman), sauna and showers, a relaxation room.\r\n\r\nVARIOUS TREATMENTS AVAILABLE ON REQUEST', 'http://www.clubmondain.com/Home/profile-view/MTcy', 'Oudezijds Voorburgwal 197, Amsterdam, Nederland', 52.3709, 4.89564, '1012', '1521637641_Sofitel the grand Spa.jpg', '1521637641_Sofitel the grand Spa.jpg', NULL, NULL, NULL, 'Active', '2018-03-21', '0000-00-00'),
(159, 173, 168, 41, 'Utrecht City Apartments | Fitness Packages', 'Check out the Classes for Special Guest Only Rate for Gym Cards:\r\n1 day = € 10,00 \r\n1 week = € 35,00 \r\n1 month = € 59,00', 'http://www.clubmondain.com/Home/store-details/MTUw', 'Drift, Utrecht, Nederland', 52.0939, 5.12332, '3512', '1522847430_Workout.jpg', '1522847430_Workout.jpg', NULL, NULL, NULL, 'Active', '2018-04-17', '2018-04-04'),
(160, 174, 168, 3, 'Restaurant Scossa @ Renaissance Amsterdam Hotel', 'Scossa is open daily for breakfast, and Monday through Saturday for dinner. Group lunches are available on request.\r\nBreakfast >\r\nMonday to Friday, 6:30 a.m. – 11:00 a.m.\r\nSaturday and Sunday, 7 a.m. – 11 a.m.\r\nDinner > \r\n6:00 p.m. – 10:30 p.m.\r\nDuring the Holiday Season, Scossa restaurant is open during Christmas (Dec 24-26) and New Year (Dec 31 - Jan1) from 6:00 p.m. to 10:30 p.m.', 'http://www.clubmondain.com/Home/profile-view/MTc0', 'Kattengat 1, Amsterdam, Nederland', 52.378, 4.89464, '1012', '1524050099_amsrd_scossa_phototour03.jpg', '1524050099_amsrd_scossa_phototour03.jpg', NULL, NULL, NULL, 'Active', '2018-04-18', '2018-04-25'),
(168, 176, 168, 59, 'World Forum The Hague', 'World Forum is a full service convention centre located in The Hague between the beach and city centre and is only a 30 minutes’ drive from two international airports. We offer the largest auditorium, the King Willem Alexander, in The Netherlands (different capacities possible), 35 breakout rooms and exclusive use is possible! It\'s a compact venue, but still offers 12.000sqm exhibition space, including our new Queen Máxima expo, and a total of 17.500 rentable sqm. With a brand new look and feel after the finalized investment of almost 28 million Euro (finished in 2016) World Forum is ready to host your event in The Hague!', 'http://www.clubmondain.com/Home/energiser_details/5', 'Churchillplein 10, Den Haag, Nederland', 0, 0, '2517', '1526473769_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant.png', '1526473525_1.png', NULL, NULL, NULL, 'Active', '2018-10-15', '0000-00-00'),
(207, 1, 32, 83, 'Mundo Verde - Leme', 'Biological and organic supermarket. Opening hours: Mon to Sat 8:30am - 8:00 pm and Sunday 8:30am - 6:00 pm.', 'http://mundoverde.com.br/mundo-verde-selecao/', 'Avenida Nossa Senhora de Copacabana, 21a - Copacabana, Rio de Janeiro, Brazilië', 0, 0, '22010', '1537445401_img_banner_produtos_selecao.jpg', '1537445401_img_banner_produtos_selecao.jpg', NULL, NULL, NULL, 'Active', '2018-09-20', '2018-09-20'),
(208, 1, 70, 34, 'Parque Berlin', 'Urban park with walking paths, trees, lawns and shrubs of 116 m². Open from sunrise to sunset.', 'https://www.madrid.es/portales/munimadrid/es/Inicio/Accesibilidad/Parque-de-Berlin?vgnextfmt=default&vgnextoid=d2e70e165684e210VgnVCM1000000b205a0aRCRD&vgnextchannel=1ade43db40317010VgnVCM100000dc0ca8c0RCRD&idioma=es&idiomaPrevio=es', 'Calle de Marcenado, 28002, Madrid, Spanje', 0, 0, '28002', '1537518434_Madrid Parque Berlin.jpg', '1537518434_Madrid Parque Berlin.jpg', NULL, NULL, NULL, 'Active', '2018-09-21', '2018-09-21'),
(209, 1, 235, 65, 'Bryant Park', 'Urban situated in midtown Manhattan, very famous and busy park.  Open from 7.00-12.00 am. Occasional free yoga sessions. (photo: own website)', 'http://bryantpark.org/', '1065 Avenue of the Americas, New York City, New York, Verenigde Staten', 0, 0, 'NY 10018', '1537542681_NY Bryant park.jpg', '1537542681_NY Bryant park.jpg', NULL, NULL, NULL, 'Active', '2018-09-21', '2018-09-21'),
(210, 1, 235, 65, 'Green Massage', 'Chinese massage parlor. Offer ranging from foot to full body massage . Walk-ins welcome, no cards. Prices starting at US$15.', 'http://www.greenmassage.com/', '26 W 37th St, NY, New York 10018, Verenigde Staten', 0, 0, 'NY 10018', '1537542868_813x300 Breath pink neon letters and green foilage background.jpg', '1537542868_813x300 Breath pink neon letters and green foilage background.jpg', NULL, NULL, NULL, 'Active', '2018-09-21', '2018-09-21'),
(211, 1, 59, 51, 'Hofgarten', 'Historical garden in city center. Gardens on both sides of pathway. It features gravel paths, fountains, flower beds and a round pavilion.', 'https://www.muenchen.de/sehenswuerdigkeiten/orte/120231.html', 'Hofgartenstraße 1, München, Duitsland', 0, 0, '80538', '1537545148_München hofgarten.jpg', '1537545148_München hofgarten.jpg', NULL, NULL, NULL, 'Active', '2018-09-21', '2018-09-21'),
(212, 1, 44, 38, 'Gym @ Hôtel N’vY', 'Fitness room with cardio and weights  machines. No shower. Free access for hotel guests from Hôtel Jade Manotel. Opening hours from 8.00 am - 8.00 pm. (Stock photo)', 'https://www.hotelnvygeneva.com/en/gallery/', 'Rue de Richemont 18, Genève, Zwitserland', 0, 0, '1201', '1537780292_813x300 Weights banner fitness gym.jpg', '1537780292_813x300 Weights banner fitness gym.jpg', NULL, NULL, NULL, 'Active', '2018-09-24', '2018-09-24'),
(213, 1, 44, 38, 'Parc de Château Banquet', 'Medium size park with  great view of the lake. Open from sunrise to sunset. (stock photo )', 'http://ge.ch/nature/cartes-donnees/carte-des-espaces-de-liberte-pour-chiens', 'Quai Wilson 1202, Genève, Zwitserland', 0, 0, '1202', '1537780943_813x300 Park running Basel Photo by Jennifer Birdie Shawker on Unsplash.jpg', '1537780943_813x300 Park running Basel Photo by Jennifer Birdie Shawker on Unsplash.jpg', NULL, NULL, NULL, 'Active', '2018-09-24', '2018-09-24'),
(214, 1, 235, 69, 'Westhaven Park', 'Small suburban park. Suitable for walks. Open from sunrise to sunset.', 'https://www.greenvillenc.gov/Home/Components/FacilityDirectory/FacilityDirectory/36/', '215 Cedarhurst Road, Greenville, North Carolina, Verenigde Staten', 0, 0, 'NC 27834', '1537988107_Greenville Westhaven Park.jpg', '1537988107_Greenville Westhaven Park.jpg', NULL, NULL, NULL, 'Active', '2018-09-26', '2018-09-26'),
(215, 1, 235, 69, 'Cheddar\'s Scratch Kitchen - Greenville NC', 'Restaurant that serves fresh meals where everything made from scratch. Extensive menu with Light options such as  Salmon and White fish. Opening hours 10:00 am - 10:pm.', 'https://cheddars.com/store-menu/?store_id=580#localmenu', '901 Criswell Dr, Greenville, NC 27834, Verenigde Staten', 0, 0, 'NC 27834', '1537988897_Greenville Cheddar Kitchen.jpg', '1537988898_Greenville Cheddar Kitchen.jpg', NULL, NULL, NULL, 'Active', '2018-09-26', '2018-09-26'),
(216, 1, 235, 84, 'Melange by Spice Route', 'Many vegetarian options from Indian Indo Chinese & Thai cuisine. Offering a fusion from a range of Asian countries.  Opening hours: Monday 11:00am-2:30pm & 5:00pm-9:30pm. Tuesday through Thursday 11:30am-2:30pm & 5:00pm-9:30pm. Friday 11:30am-2:30pm & 5:00pm-10:30pm. Saturday 12:00pm-3:00pm & 5:00pm-10:30pm. Sunday 12:00pm-3:00pm & 5:00pm-9:30pm. (Photo Source: own website)', 'https://www.melangebyspiceroute.com/menu', '353 Smith Rd, Parsippany, New Jersey, Verenigde Staten', 0, 0, 'NJ 07054', '1538042600_NJ melangebyspiceroute.png', '1538042601_NJ melangebyspiceroute.png', NULL, NULL, NULL, 'Active', '2018-09-27', '2018-09-27'),
(217, 1, 235, 84, 'Old Troy County Park', 'Green park with many amenities. Nice trails to hike, jog, or take a leisurely walk. The park is open daily Sunrise to Sunset throughout the year.', 'http://m66.siteground.biz/~morrispa/index.php/parks/old-troy-county-park', '440 Reynolds Avenue, Parsippany, NJ 07054, Verenigde Staten', 0, 0, 'NJ 07054', '1538043228_NJ old troy county park.jpg', '1538043228_NJ old troy county park.jpg', NULL, NULL, NULL, 'Active', '2018-09-27', '2018-09-27'),
(218, 1, 168, 68, 'Lively Yoga', 'A modern yoga studio with passion for movement, mindfulness and relaxation. Numerous types of yoga classes are offered. The first Hot Yoga studio in Maastricht. Certified materials and trainers offer high quality experience. Try the first class for free. Bikram and hot yoga are commonly used by surfers and runners to increase their endurance without putting strain on their bodies.', 'https://www.livelyyoga.com/hot-yoga/', 'Louis Loyensstraat 5, 6221 AK Maastricht, Nederland', 0, 0, '6221AK', '1538383534_Maastricht Lively yoga.png', '1538383534_Maastricht Lively yoga.png', NULL, NULL, NULL, 'Active', '2018-10-01', '2018-10-01'),
(219, 1, 112, 86, 'Run Route 3km', '3km Run route starting at Hotel Excelsior San Marco. Link: https://runnermaps.nl/route/135653 (photo Source Zoover)', 'https://runnermaps.nl/route/135653', 'Piazza della Repubblica, 6, 24122 Bergamo, Bérgamo, Italië', 0, 0, '24122', '1538476647_Bérgamo Italië.jpg', '1538476647_Bérgamo Italië.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-10-02'),
(220, 1, 112, 86, 'San Marco Wellness iClub', 'Fully equipped gym with additional wellness facilities including sauna, spa and swimming pool. Special rate €20 for a day pass for Hotel Excelsior San Marco guests. (Photo source own website)', 'http://www.sanmarco-wellnessclub.it/', 'Piazza della Repubblica, 3, 24122 Bergamo, Bérgamo, Italië', 0, 0, '24122', '1538477457_San-Marco-Wellness-Club-Piscina-01.jpg', '1538477457_San-Marco-Wellness-Club-Piscina-01.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-10-02'),
(221, 1, 112, 87, 'Hostaria degli Anzoi', 'Small typical Northern Italian restaurant. Many healthy seafood and fish dishes on the menu. (Photo source: stock photo)', 'https://www.facebook.com/HostariaDegliAnzoi/', 'Via Scavi, 15, 35036 Montegrotto Terme, PD, Italië', 45.3295, 11.7921, '35036', '1538478559_Verona cuisine.jpg', '1538478559_Verona cuisine.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-10-02'),
(222, 1, 112, 87, 'Bèla Eta', 'Mediterranean dishes made from fresh ingredients. Open everyday in the evening from 19.30 to 22.00 and on Saturdays and Sundays for lunch from 12.30 to 14.00. (Photo own website) Moreover only upon booking you may choose to dine in the exclusive Baijarong Thai Restaurant. Here teh cuisines is according to Thai tradition.', 'http://www.coccahotel.com/en/restaurants/', 'Via Predore, 73, 24067 Sarnico, BG, Italië', 0, 0, '24067', '1538479348_Verona Cocca hotel.jpg', '1538479348_Verona Cocca hotel.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-10-02'),
(223, 1, 77, 88, 'Parc des eaux vives', 'Green boulevard along the Canal de huningue.', 'www.ville-huningue.fr', '3 Quai du Maroc, 68330 Huningue, Frankrijk', 0, 0, '68330', '1538481500_Canal de Huningue Saint-Louis France.jpg', '1538481500_Canal de Huningue Saint-Louis France.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-11-09'),
(224, 1, 77, 88, 'Restaurant Ph. Schneider', 'Restaurant Ph. Schneider serve regional and international dishes adapted to the French cuisine. The  menu changes with the seasons from asparagus to venison. Opening hours are Mon - Fri from 12:00 to 13:30 & 19:00 to 21:30hrs. (Photo source: Own website)', 'https://hotel-tivoli.eu/en/restaurant-ph-schneider-2/', '15 Avenue de Bâle, 68330 Huningue, Frankrijk', 0, 0, '68330', '1538482049_Saint-Louis Tivoli-Restaurant.jpg', '1538482049_Saint-Louis Tivoli-Restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-11-09'),
(225, 1, 168, 89, 'Zwembad De Vrolijkheid', 'Public Pool . €4,50 for single entree. Opening hours laps: Mon - Fri 07:00am - 08:30am (8 lanes), 11:30am - 1:00pm (6 lanes),  9:15pm - 10:00pm heated pool', 'https://www.optisport.nl/vrolijkheid/accommodatie-aanbod?groep=banenzwemmen&activiteit=19', 'Ossenkamp 7, 8024 AG Zwolle, Nederland', 0, 0, '8024 AG', '1538484967_Zwolle optisport zwembad.jpg', '1538484967_Zwolle optisport zwembad.jpg', NULL, NULL, NULL, 'Active', '2018-10-02', '2018-10-02'),
(227, 1, 79, 6, 'PureGym Marylebone', 'Single Day pass GBP 10.99, possible to buy it upfront.  Opening hours Mon - Fri 6.30am - 10.00pm & Weekend (and Bank Holidays) 8.00am - 8.00pm. Functional space, free weight, fixed weight machines and cardio machines.', 'https://www.puregym.com/join/london-marylebone/#/?step=PRIMARY_GYM_SELECTION', '7 Balcombe Street, Londen NW1 6NA, Verenigd Koninkrijk', 0, 0, 'NW1 6NA', '1538748615_London Pure Gym holborn.jpg', '1538748615_London Pure Gym holborn.jpg', NULL, NULL, NULL, 'Active', '2018-10-05', '2018-10-05'),
(228, 1, 79, 6, 'Queen Mary\'s Rose Gardens', 'Famous attraction within the Regent Park. The rose garden is the largest collection of roses in London. There are approximately 12,000 roses planted within the gardens.  Opening hours in October are 5.00am - 7.00pm', 'https://www.royalparks.org.uk/parks/the-regents-park/things-to-see-and-do/gardens-and-landscapes/queen-marys-gardens', 'Chester Rd, Londen NW1 4NR, Verenigd Koninkrijk', 0, 0, 'NW1 4NR', '1538748935_London Queen mary rose garden.jpg', '1538748935_London Queen mary rose garden.jpg', NULL, NULL, NULL, 'Active', '2018-10-05', '2018-10-05'),
(229, 1, 168, 59, 'Scheveningse Bosjes - Scheveningen Wood', '__', 'https://theculturetrip.com/europe/the-netherlands/articles/the-prettiest-parks-and-gardens-in-the-hague/', 'Scheveningen, Den Haag, Nederland', 0, 0, '2584', '1538897814_Scheveningse bosjes : Guilhem Vellut.jpg', '1538897814_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant.jpg', NULL, NULL, NULL, 'Active', '2018-10-07', '2018-10-07'),
(230, 1, 168, 59, 'Park Sorghvliet', 'Sorghvliet Park means Free of cares and is a small park between the Hague and Scheveningen. With its 22 hectare of park including the official residence of the prime-minister \"The Catshuis\" is a beautiful semi-public park. \r\n\r\nAnnual tickets of € 7.50 are for sale at Boekhandel Scheveningen, Paagman and VVV Centrale Bibliotheek.\r\nPhoto: Rijksvastgoedbedrijf, Hetty Mos', 'https://www.dutchnews.nl/features/2017/05/sorghvliet-park-in-the-hague-is-a-peaceful-place-for-those-in-the-know/', 'Scheveningseweg 24a, Den Haag, Nederland', 0, 0, '2517KV', '1538898701_Park Sorghvliet_Rijksvastgoedbedrijf, Hetty mos .jpg', '1538898701_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant.png', NULL, NULL, NULL, 'Active', '2018-10-07', '2018-10-07'),
(231, 1, 168, 59, 'Palace Garden', 'The Palace Garden is a hidden gem in the middle of the city centre of the Hague, next to the Royal stables. \r\nWorth your visit to take a breath of fresh air and if you have the spare go for a picnic.\r\n\r\nOpen from sunrise to sunset.\r\nPhoto: Denhaag.com', 'https://denhaag.com/en/location/9136/palace-garden', 'Prinsessewal, Den Haag, Nederland', 0, 0, '2513EE', '1538899404_palace garden_denhaag.com.jpeg', '1538899404_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant (1).png', NULL, NULL, NULL, 'Active', '2018-10-07', '2018-10-07'),
(232, 1, 168, 90, 'More Than Fitness @ Westcord Hotel Delft', 'More Than Fitness facilitates the gym inside the Westcord Hotel Delft. Situated on the 5th floor guests have free acces during opening hours. Upon request you can book Personal Training session, Fysiotherapie or  relaxing massage. Open daily from 6:00am till 11:00pm.', 'https://westcordhotels.nl/hotels-met-fitness-faciliteiten/#fitnessdelft', 'Olof Palmestraat 2, 2616 LM Delft', 0, 0, '2616LM', '1539004941_Westcord-Hotels-Hotel-Delft-03-.jpg', '1539004941_Westcord-Hotels-Hotel-Delft-03-.jpg', NULL, NULL, NULL, 'Active', '2018-10-08', '2018-10-08'),
(233, 1, 168, 90, 'De Botanische Tuin', 'Open year round from Mon - Sat 10:00am till 5:00pm and from April till October also on Sunday from noon till 5:00pm. Besides the beautiful garden of the Technical University they offer Science, workshop, museum, music and souvenirs. Adult entrance ticket €4.', 'https://www.tudelft.nl/botanische-tuin/', 'Poortlandplein 6, 2628 BM Delft, Nederland', 0, 0, '2618BM', '1539005939_Botanische Tuin.jpg', '1539005939_Botanische Tuin.jpg', NULL, NULL, NULL, 'Active', '2018-10-08', '2018-10-08'),
(234, 1, 168, 90, 'Arboretum Heempark', 'Open all year round from sunup till sunrise. Free entrance.', 'www.arboretum-heempark-delft.nl', 'Korftlaan 6, 2616 LJ Delft', 0, 0, '2616LJ', '1539006085_Arboretum-Heempark Delft.jpg', '1539006085_Arboretum-Heempark Delft.jpg', NULL, NULL, NULL, 'Active', '2018-10-08', '2018-10-08'),
(235, 1, 168, 59, 'Active Club Den Haag -  inside Novotel', 'At the Active Club, you will train one-­on-­one or in small groups of up to six participants to achieve your personal goal.\r\nSpa available. \r\nAvailable: kettle bells, bosu balls, suspension trainers, swiss balls, dumbells and bars. Nine cardio machines. They range from a super-spinning bicycle to an indoor rower and a treadmill. Power stations for basic power exercises.\r\nSoap and shampoo are available in the showers and sauna. Towels for rent. \r\n\r\nA visit to the sauna costs € 25,00 seperate to a membership. \r\n\r\nA chair massage session lasts ten minutes: € 12,50 \r\nRelax and sports massage rates: 20 minute session is € 32,50; 40 minute session is € 55,00.\r\n\r\n0031 (0)70 4169136 or via whatsapp: 06 19 41 36 92', 'http://www.activeclubdenhaag.nl', 'Johan de Wittlaan 42-44, Den Haag, Nederland', 0, 0, '2517JR', '1539010266_ActiveClub Den Haag.jpg', '1539010266_Activeclub3.jpg', NULL, NULL, NULL, 'Active', '2018-10-08', '2018-10-08'),
(236, 1, 168, 59, 'Promenade Health Club - in Crowne Plaza Hotel', 'Promenade Health Club & Spa is located in 5 star hotel Crowne Plaza – the Hague and situated near to the city centre and the beach.   \r\nThree treatment rooms, nail salon, relaxation room, indoor swimming pool, steam sauna, infrared sauna, in- and outdoor Finnish sauna, gym and private terrace.\r\nDay ticket: 27,50 \r\n\r\nHours:\r\nFrom Monday till Friday from 06:30 am - 11 pm\r\nOn Saturday and Sunday from 08:00 am - 9 pm\r\nThe swimming pool is open every day from 06:30 am - 11 pm.\r\n\r\nPricelist: https://www.promenadehealthclub.nl/assets/Uploads/Gym-Facial-massages5.pdf\r\n+ 31 70 351 1719', 'https://www.promenadehealthclub.nl/home-en-us/', 'Van Stolkweg 1, Den Haag, Nederland', 0, 0, '2585JL', '1539011213_Healthclubcrowne_Swimmingpool1.jpg', '1539011213_Healthclubcrowne_Swimmingpool1.jpg', NULL, NULL, NULL, 'Active', '2018-10-08', '2018-10-08'),
(237, 1, 168, 59, 'Yogashala', '\"Yogashala is a studio where people with diverse backgrounds can share their interest in yoga. Classes combine postures, pranayama (breathing exercises) and meditation. Postures, in stillness or flow, are based on inquiry with an open mind. Within this process we pay attention  to the breath, natural alignment in postures and movement, softness combined with strength and flexibility and the exploration of our individual capacity and limitations.\"\r\n\r\nWeekly schedule includes private yoga sessions: https://www.yogashala.nl/en/weekly-schedule/\r\n\r\n06 237 387 51 (Anke) of mail naar info@yogashala.nl Chris Ramkema & Anke Mein\r\nPhoto\'s from Yogashalawebsite', 'https://www.yogashala.nl/en/yogastudio-2/', 'Ten Hovestraat 8, Den Haag, Nederland', 0, 0, '2582 RL', '1539192131_YogaShala1.jpg', '1539192131_yogashala2.jpg', NULL, NULL, NULL, 'Active', '2018-10-10', '2018-10-10'),
(238, 1, 168, 59, 'Nam Tok', 'Relaxing Massages and strong Thai Massages \r\nOpening hours: Mon to Sat 11 - 20 \r\nPhoto\'s from Nam Tok website', 'https://www.namtok.nl/vlierboomstraat/', 'Vlierboomstraat 548, Den Haag, Nederland', 0, 0, '2564JN', '1539192710_Namtok1.jpg', '1539192710_Namtok2.jpg', NULL, NULL, NULL, 'Active', '2018-10-10', '2018-10-10'),
(239, 1, 168, 59, 'Prins Maurits Pilates', '\"Classical Pilates according to the authentic method of Joseph Pilates. The focus is on the Powerhouse, or the power center of the body, which consists of the deep abdominal muscles, back muscles, glutes and inner thigh muscles.\r\nPilates is suitable for anyone who wants a more powerful, more flexible and better aligned body with a healthier spine resulting in better posture. The results will soon be noticeable in everyday life and contribute to improve health and vitality.\"\r\n\r\nThe studio offers both personal training and group sessions\r\nhttp://www.pilatesthehague.nl/schedule\r\n06-30183433', 'http://www.pilatesthehague.nl/schedule', 'Prins Mauritslaan 42, Den Haag, Nederland', 0, 0, '2582LS', '1539193895_Prinspilates2.jpg', '1539193895_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant (7).png', NULL, NULL, NULL, 'Active', '2018-10-10', '2018-10-10'),
(240, 1, 168, 59, 'Boosty', 'Fresh salads, sandwhiches and juices. \r\nAll fres and thoughtfull\r\n\r\n0704049610', 'https://www.boosty-denhaag.nl/', 'Frederik Hendriklaan 294, Den Haag, Nederland', 0, 0, '2582BN', '1539194693_boosty2.jpg', '1539194693_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant (8).png', NULL, NULL, NULL, 'Active', '2018-10-10', '2018-10-10'),
(241, 1, 235, 79, 'Great Meadow Park at Fort Mason', 'Huge open park with grass fields, little to no trees or shrubs.  (Photo Source Tripadvisor)', 'https://www.nps.gov/goga/planyourvisit/fort-mason.htm', 'Bay St, San Francisco, CA 94123, Verenigde Staten', 0, 0, 'CA 94123', '1539265525_Great Meadow Park at Fort Mason.jpg', '1539265525_Great Meadow Park at Fort Mason.jpg', NULL, NULL, NULL, 'Active', '2018-10-11', '2018-10-11'),
(242, 1, 235, 79, 'Scoma\'s Restaurant', 'Fish restaurant with many local specialties. Opening hours are Mon - Thur 12:00noon-9:30pm,F ri & Sat 11:30am-10:00pm and Sun 11:30am-9:30pm . (Photo soure: own website)', 'https://scomas.com/#reservations', 'Fisherman\'s Wharf, San Francisco, CA 94133, Verenigde Staten', 0, 0, 'CA 94133', '1539266311_San Fransisco Scoma restaurant.jpg', '1539266311_San Fransisco Scoma restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-10-11', '2018-10-11'),
(243, 1, 235, 91, 'Guadalupe River Park', 'Guadalupe River Park exists of a 3mile strip of park land. It runs next to the banks of the Guadalupe River. Reaching from downtown San Jose Highway 880 at the north, to Highway 280 at the south. (Photo Source: grpg.org)', 'https://www.grpg.org/river-park-gardens/', '438 Coleman Ave, San Jose, CA 95110, Verenigde Staten', 0, 0, 'CA 95110', '1539335047_San Jose Guadelue park.jpg', '1539335047_San Jose Guadelue park.jpg', NULL, NULL, NULL, 'Active', '2018-10-12', '2018-10-12'),
(244, 1, 235, 91, 'Veggie Grill', 'Vegetarian and Vegan restaurant chain. Full menu with options for every meal. Opening hours Sun - Thur 11am to 10pm and Fri - Sat 11am to 11pm. (Photo source: own website)', 'https://www.veggiegrill.com/menu.html', '1030 Olin Avenue, San Jose, CA 95128, Verenigde Staten', 0, 0, 'CA 95128', '1539339816_San Jose Veggie grill.jpg', '1539339816_San Jose Veggie grill.jpg', NULL, NULL, NULL, 'Active', '2018-10-12', '2018-10-12'),
(245, 1, 168, 59, 'Restaurant Gember', 'Restaurant Gember is part of the GEM | Photo-museum and museum voor Modern Arts. This innovative concept is aimed at sustainability. Opening hours Teu - Sun from 10:00am - 6:00pm (closed on Monday). (Photo source: Catering Meesters)', 'https://www.restaurantgember.nl/', 'Stadhouderslaan 43, Den Haag, Nederland', 0, 0, '2517 HV', '1539346826_Den Haag Restaurant_Gember_-_Terras.jpg', '1539346826_Den Haag Restaurant_Gember_-_Terras.jpg', NULL, NULL, NULL, 'Active', '2018-10-12', '2018-10-12'),
(246, 1, 168, 59, 'Brasserie Berlage', 'Created by the architect H.P. Berlage. Situated in a pavilion in the garden of the municipal museum. Opening hours Tue - Sun from 11:00 am till 10:30 pm. Kitchen closes at 8:30pm (Photo source own website)', 'http://www.brasserieberlage.nl/', 'President Kennedylaan 1, Den Haag, Nederland', 0, 0, '2517 JK', '1539347297_Den Haag brasserie berlage.jpg', '1539347297_Den Haag brasserie berlage.jpg', NULL, NULL, NULL, 'Active', '2018-10-12', '2018-10-12'),
(247, 1, 235, 93, 'ACAC Fitness & Wellness Club Eagleview', 'Large modern gym with cardio, machines and group lessons. For non members punch card for 6 visits USD$100. Opening hours Mon – Thu 9:00 AM till 8:00 PM, Friday 9:00 AM till 1:00 PM, Sat 8:00 AM till 12:00 PM and Sun no staffed hours .', 'https://acac.com/eagleview/', '699 Rice Blvd, Exton, PA 19341, United States', 0, 0, 'PA 19341', '1539418194_ACAS.jpg', '1539418194_ACAS.jpg', NULL, NULL, NULL, 'Active', '2018-10-13', '2018-10-13'),
(248, 1, 235, 93, 'Brickside Grille', 'Oyster bar and seafood grill.  Opening hours lunch: Mon – Sat 11:00am - 4:00pm, Dinner: Mon – Thu 4:00pm - 10:00pm, Fri and Sat 4:00pm - 10:00pm and Sun 4:00pm to 9:00pm. A la Carte Only 2:00pm - 4:00pm.', 'https://www.bricksidegrille.com/menus', '540 Wellington Square, Exton, PA 19341, Verenigde Staten', 0, 0, 'PA 19341', '1539418978_Brickside restaurant.png', '1539418978_Brickside restaurant.png', NULL, NULL, NULL, 'Active', '2018-10-13', '2018-10-13'),
(249, 1, 235, 93, 'Hickory Park', 'Large open park with playing fields and courts for numerous sports and hiking trails. Open from dawn till dusk (Photo source: own website)', 'https://www.upperuwchlan-pa.gov/Facilities/Facility/Details/1', '351 Chester Springs Road, Chester Springs, PA 19425, Verenigde Staten', 0, 0, 'PA 19425', '1539420293_Hickory Park.jpg', '1539420293_Hickory Park.jpg', NULL, NULL, NULL, 'Active', '2018-10-13', '2018-10-13'),
(250, 1, 58, 94, 'Svijanská Delta Restaurant', 'Local pub with traditional dishes and beers. Open till 11:00 pm on weekdays.', 'http://www.restauracedelta.cz/index.html', 'Toužimská 423/49, 197 00 Kbely, Tsjechië', 0, 0, '197 00', '1539600673_Prague Restaurace delta.jpg', '1539600673_Prague Restaurace delta.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15'),
(251, 1, 104, 95, 'Merrion Square', 'Merrion Square is one of the most intact Georgian Squares located in the heart of Dublin city. Originally laid out in 1762, it is surrounded on three sides by Georgian redbrick houses, with the fourth side containing Government Buildings, the Natural History Museum, Leinster House and the National Gallery of Ireland. (Source: own website)', 'http://merrionsquare.ie/index.php/about-the-square/', '68 Merrion Square South, Dublin, Ierland', 0, 0, 'Dublin 2', '1539603740_Dublin Merrion square.jpg', '1539603740_Dublin Merrion square.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15'),
(252, 1, 104, 95, 'Staple Foods', 'Deli with vegan menus serving wraps, salads, soups and coffee to go. Opening Hours are Mon - Fri 8:00 AM — 3:30 PM. (photo source: Staple Foods Faccebook)', 'http://staplefoods.ie/', '24a Grattan St, Grand Canal Dock, Dublin 2, Co. Dublin, D02 P891, Ierland', 0, 0, 'Dublin 2', '1539604564_Dublin Vegan staplefoods.jpg', '1539604564_Dublin Vegan staplefoods.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15'),
(253, 1, 168, 59, 'Sawadee Massage and Spa', 'Situated in a hystorical Dutch builing. Sawadee means Welcome. Here they offer Fysiotherapie, Manuele therapie, Massagetherapie en professionele Massages. Opening hours are Mon 13.00-17.00 | Tue 8.00 – 18.00 | Wed 9.30 – 18.00 | Thu 8.00 – 20.00 | Fri 8.00 – 18.00 | Sat 10.00 – 17.00 and Sunday appointment only (photo source: own website)', 'www.sawadeemassage.nl', 'Piet Heinstraat 65, 2518 CC Den Haag, Nederland', 0, 0, '2518 CC', '1539618995_Den Haag Sawadee massage en spa.jpg', '1539618995_Den Haag Sawadee massage en spa.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15'),
(254, 1, 168, 59, 'Saijai Wellness', 'Modern wellness and Thai massage parlor with authentic atmosphere, products and wellness treatments from Thailand. (Photo source: own website)', 'https://saijai-wellness.business.site/', 'Willem de Zwijgerlaan 76B, 2582 ES Den Haag, Nederland', 0, 0, '2582 ES', '1539619301_Den Haag Saijai wellness.jpg', '1539619301_Den Haag Saijai wellness.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15'),
(255, 1, 168, 59, 'StatenSport Healthclub', 'Modern gym with personal attention and focus. Wide range of equipement from Cardio Vasculair to Free weights. Option to book a Personal Trainer. Day passes available for €12,50 including use of sauna and participation to group classes. Opening hours Mon till Thur 07:00 - 22:00 | Fri 07:00 - 21:00 | Sat 08:00 -15:30 | Sun 08:00 - 15:30. (Photo source: own Facebook page)', 'https://statensport.nl/', 'Frankenslag 9, 2582 HB Den Haag, Nederland', 0, 0, '2582 HB', '1539619736_Den Haag Statensport.jpg', '1539619736_Den Haag Statensport.jpg', NULL, NULL, NULL, 'Active', '2018-10-15', '2018-10-15');
INSERT INTO `cmd_business` (`business_id`, `user_id`, `country_id`, `city_id`, `business_name`, `business_description`, `business_website_url`, `business_street`, `business_latitude`, `business_longitute`, `business_postal_code`, `business_image`, `business_banner_image`, `business_facebook_link`, `business_twitter_link`, `business_instagram_link`, `business_status`, `create_date`, `update_date`) VALUES
(256, 1, 168, 59, 'Climbing de Klimmuur Holland Spoor', 'Klimmuur Den Haag – Hollands Spoor is a unique location in the Netherlands. Not just a really nice climbing wall with both extensive climbing and bouldering facilities, but also the only ice climbing wall in the  Netherlands\r\n\r\nMonday - Friday 13.00 – 22.30\r\nSaturday - Sunday 10.00 – 22.30\r\nIntroduction lesson € 24,50\r\n(incl. entrance, instruction, harness and equipment)  \r\n\r\nInfo & photo\'s own website', 'hollandsspoor@deklimmuur.nl', 'Waldorpstraat 15', 0, 0, '2521CA Den Haag', '1539789302_Klimmuur Centraal Station .jpg', '1539789302_Untitled design (4).png', NULL, NULL, NULL, 'Active', '2018-10-17', '2018-10-17'),
(257, 1, 168, 59, 'Yoga Winfriend Termaaten', 'Hatha Yoga and Yoga Nidra classes. Thursday and Friday evening classes are in English. Hatha yoga classes are 90 minutes. Drop-in class is possible for €12.50 - Cash only. Make sure you are present 15 minutes ahead of the class, wear comfortable loose fitting clothes and bring your own towel.  Hatha Yoga Classes timeschedule: Monday 19.00 | Tuesday 08.45, 11.00, 15.45, 20.00 | Wednesday 10.00, 18.00, 20.00 | Thursday 09.45, 18.30 (English) | Friday 17.30 (English), 19.30  hr. (photo source: Own website)', 'https://winfriedtermaaten.nl/', 'Lange Beestenmarkt 89, 2512 EC Den Haag, Nederland', 0, 0, '2512 EC', '1539807034_Yoga Winfried.jpg', '1539807034_Yoga Winfried.jpg', NULL, NULL, NULL, 'Active', '2018-10-17', '2018-10-17'),
(258, 1, 168, 59, 'CrossFit Bink36', 'At Crossfit Bink 36 we advice and train men and women how to create a healthy way of living . The trainers are enthusiastic, skilled and eager to guide you. Open weekdays from 7:00 am till 9:30 pm. Check out the exact schedule on their website (See link below). For drop-in classes send an email to: info@crossfitbink36.nl. Drop-in class costs €20 - cash only! (Photo source: own website)', 'https://www.crossfitbink36.nl/rooster', 'Binckhorstlaan 36, 2516 BE Den Haag, Nederland', 0, 0, '2516 BE', '1539807953_Den Haag crossfitbink36.png', '1539807953_Den Haag crossfitbink36.png', NULL, NULL, NULL, 'Active', '2018-10-17', '2018-10-17'),
(259, 1, 49, 75, 'Redstone Park - East Gate', 'Urban city park  with some greenery and paved roads. (Photo source: Tripadvisor)', 'www.laiwuhotel.com', 'Wenyuan W St, Laicheng, Laiwu, Shandong, China, 271100', 0, 0, '271100', '1539810020_Laiwu redstone park.jpg', '1539810021_Laiwu redstone park.jpg', NULL, NULL, NULL, 'Active', '2018-10-17', '2018-10-17'),
(260, 1, 168, 59, 'Traditional Chinese Medicine - TCM Center Den Haag', 'Traditional Chinese medicine, Tuina Massage, Acupuncture, Herbal Medicine, cupping.\r\nPhoto\'s from own website.', 'http://tcmcenter-wang.nl/english/', 'Korte Poten 38, Den Haag, Nederland', 0, 0, '2511 EE', '1539846917_TCMmassage.jpg', '1539846917_Untitled design (5).png', NULL, NULL, NULL, 'Active', '2018-10-18', '2018-10-18'),
(261, 1, 200, 96, 'Singapore Botanic Gardens', 'The Singapore Botanic Gardens consists of four cores, namely; Botany Centre, Tanglin Entrance - Visitor Centre, Nassim Entrance - Learning Forest, Tyersall Entrance - Bukit Timah Entrance. Please refer to the website for the various opening hours and admission fees. (Photo source: ;own website)', 'https://www.nparks.gov.sg/sbg/visit-us', '1 St Andrew\'s Rd, Singapore 178957', 0, 0, '178957', '1539929378_Singapore botanical gardens.jpg', '1539929378_Singapore botanical gardens.jpg', NULL, NULL, NULL, 'Active', '2018-10-19', '2018-10-19'),
(262, 1, 116, 97, 'Shinhama park', 'Urban park with paved paths, trees and shrubs. 1183.08 square meters in size.', 'http://trans.city-minato.jp/LUCMINATO/ns/tl.cgi/http://www.city.minato.tokyo.jp/shisetsu/koen/konan/01.html?SLANG=ja&TLANG=en&XMODE=0&XCHARSET=utf-8&XJSID=0', 'Shiba, Minato, Tokio 105-0014, Japan', 0, 0, '105-0014', '1539960827_Tokyo Shinhama park 800x300.jpg', '1539960827_Tokyo Shinhama park 800x300.jpg', NULL, NULL, NULL, 'Active', '2018-10-19', '2018-10-19'),
(263, 1, 235, 98, 'GreenSpace & Go', 'All day plant-based meals. From wraps to bowls to salads. Opening hours from Monday to Saturday 10:00 am - 8:00pm . (photo source: own website)', 'www.greenspaceandgo.com', '32867 Woodward Ave, Royal Oak, Michigan 48073, Verenigde Staten', 0, 0, '48073', '1540217915_Michigan Greenspace and GO.jpg', '1540217915_Michigan Greenspace and GO.jpg', NULL, NULL, NULL, 'Active', '2018-10-22', '2018-10-22'),
(264, 1, 235, 98, 'The Big Salad', 'Salad bar with vegan options. Build your own salad, choose a pre designed salad, soups or wraps. Opening hours Mon-Fri 10:30am - 8:00pm, Sat 10:30am-4pm and on Sunday closed. (Photo source: from own website)', 'http://www.mybigsalad.com/', '738 E Big Beaver Rd, Troy, MI 48083, Verenigde Staten', 0, 0, '48083', '1540218740_Michigan My big salad.jpg', '1540218740_Michigan My big salad.jpg', NULL, NULL, NULL, 'Active', '2018-10-22', '2018-10-22'),
(265, 1, 70, 34, 'Aderzo Restaurante', 'High end restaurant serving traditional Spanish cuisine. Fresh products are use in all dishes. Vegetarian options. Opening hours are Mon- Sat from 1:30 pm - 4:00 pm & 9:00 pm - 11:30 pm. (Photo source own website)', 'https://aderezorestaurante.es/', 'Calle de Añastro, 48, 28033 Madrid, Spanje', 0, 0, '28033', '1540822247_Madrid Aderzo restaurante 800x300.jpg', '1540822247_Madrid Aderzo restaurante 800x300.jpg', NULL, NULL, NULL, 'Active', '2018-10-29', '2018-10-29'),
(266, 1, 44, 99, 'Restaurant Elite', 'Situated on the 1st floor in hotel Elite. Daily changing daily menus and a business menu for lunch are served. Although the restaurant is known for its meat specialties, there are fresh vegetarian options as well. Hours of operation are Mon - Sat 11:00 to 14:00 & 18:00 to 22:00. (Photo source own website).', 'http://www.hotel-elite-visp.ch/restaurant/', 'Bahnhofplatz 7, 3930 Visp, Zwitserland', 0, 0, '3930', '1541608378_Visp Restaurant Elite.jpg', '1541608379_Visp Restaurant Elite.jpg', NULL, NULL, NULL, 'Active', '2018-11-07', '2018-11-07'),
(267, 1, 235, 100, 'Leaf & Ladle', 'Small soup restaurant · Cafe · Sandwich shop serving local and organic dishes from breakfast, lunch to diner. Eat-in or take-out both are possible.  Opening hours Mon - Fri 11:00 am till 9:00 pm and Saturday 11:00 am till 4:00 PM and closed on Sunday.', 'https://www.facebook.com/LeafandLadle/', '1113 N State St, Bellingham, WA 98225, Verenigde Staten', 0, 0, '98225', '1541758035_Bellingham Leaf & Laddle.jpg', '1541758035_Bellingham Leaf & Laddle.jpg', NULL, NULL, NULL, 'Active', '2018-11-09', '2018-11-09'),
(268, 1, 235, 100, 'Elizabeth park', 'Green park with trails along trees and lawns. Opening hours are 6:00 am till 10 pm daily .', 'https://www.cob.org/services/recreation/parks-trails/Pages/elizabeth-park.aspx', '2205 Elizabeth St, Bellingham, WA 98225, Verenigde Staten', 0, 0, '98225', '1541757087_Bellingham Elizabeth park.jpg', '1541757087_Bellingham Elizabeth park.jpg', NULL, NULL, NULL, 'Active', '2018-11-09', '2018-11-09'),
(269, 1, 77, 88, 'Restaurant Chez Madar Joon', 'Cozy restaurant serving cuisine from Afghanistan, rich in color and flavor. Opening hours are Monday to Saturday 11:00 am - 2:30 pm & 6:00 pm - 10:30  pm. (photo source own website)', 'https://www.facebook.com/ChezMadarJoon/', '22 Rue de Sierentz, 68330 Huningue, Frankrijk', 0, 0, '68330', '1541763241_Village-neuf Restaurant Chez Madar Joon.jpg', '1541763241_Village-neuf Restaurant Chez Madar Joon.jpg', NULL, NULL, NULL, 'Active', '2018-11-09', '2018-11-09'),
(270, 1, 235, 101, 'Urban Float - Renton Landing', 'Urban Float offer floating session that allow you to rest in a private, sensory-managed float pod for a 60-minute session. The purified water you float is has added epsom salt to help in floating and has beneficial properties for the body. Opening hours for Urban Float Renton Landing are daily from 9:00 am till 10:30 pm.  Pricing starts at US$45 (Photo source: own website)', 'https://www.urbanfloat.com/', '727 N 10th St, Renton, WA 98057, Verenigde Staten', 0, 0, '98057', '1541767033_Seattle UrbanFloat.jpg', '1541767033_Seattle UrbanFloat.jpg', NULL, NULL, NULL, 'Active', '2018-11-09', '2018-11-09'),
(271, 1, 235, 101, 'Floret by café Flora', 'Vegan and vegetarian meals from breakfast to diner.  Grab-and-go is open daily from 4:30 a.m. – 8:30 p.m. with breakfast, lunch and dinner options. There is also a site down restaurant that is open daily from 6am-9pm. (Photo source: Madison Park Times)', 'https://floretseattle.com/', '17801 International Blvd, SeaTac, WA 98158, Verenigde Staten', 0, 0, '98158', '1541767651_Seattle Floret.jpg', '1541767651_Seattle Floret.jpg', NULL, NULL, NULL, 'Active', '2018-11-09', '2018-11-09'),
(272, 1, 168, 102, 'Restaurant Unicum Elzenhagen', 'Restaurant in 4 star hotel Unicum Elzenhagen serving an extensive lunch and diner menu. Vegetarian options available.', 'http://www.unicumelzenhagen.nl/restaurant/menukaart/', 'Monsterseweg 100, 2685 LK Poeldijk, Nederland', 0, 0, '2685', '1542004637_NL Unicum Elzenhagen.jpg', '1542004637_NL Unicum Elzenhagen.jpg', NULL, NULL, NULL, 'Active', '2018-11-12', '2018-11-12'),
(273, 1, 168, 102, 'Het Prinsenbos', 'This natural park with lake offers sports and leisure activities. There is a hiking route (even wheelchair accessible). Open from sunrise till sunset.', 'https://www.gemeentewestland.nl/over-westland/toerisme-en-recreatie/recreatieterreinen/het-prinsenbos.html', 'Grote Achterweg 20, 2671 LR Naaldwijk, Nederland', 0, 0, '2671 LR', '1542004854_NL Het Prinsenbos.png', '1542004854_NL Het Prinsenbos.png', NULL, NULL, NULL, 'Active', '2018-11-12', '2018-11-12'),
(274, 89, 49, 64, 'People\'s Park', 'Set amid skyscrapers, this urban park offers landscaped lawns & wooded areas, plus a pond & cafe.', 'http://', '231 Nanjing W Rd, People\'s Square, Huangpu, Shanghai, China', 0, 0, '231', '1542037507_View_over_People\'s_Park_from_the_Shanghai_Urban_Planning_Exhibition_Center.jpg', '1542037507_View_over_People\'s_Park_from_the_Shanghai_Urban_Planning_Exhibition_Center.jpg', NULL, NULL, NULL, 'Active', '2018-11-12', '0000-00-00'),
(275, 1, 79, 6, 'Sea Containers Restaurant', 'International restaurant serving fresh dishes, seafood and vegetarian options. Open for lunch and dinner daily: 12pm until 11pm.', 'https://www.seacontainersrestaurant.com', '20 Upper Ground, Londen SE1 9PD, Verenigd Koninkrijk', 0, 0, 'SE1 9PD', '1542054569_44775916_2230071603904873_8786716008677934422_n.jpg', '1542054569_44775916_2230071603904873_8786716008677934422_n.jpg', NULL, NULL, NULL, 'Active', '2018-11-12', '2018-11-12'),
(276, 1, 168, 61, 'landgoed TerWorm', 'Large protected natural reserve situated next to the Van der Valk Hotel Heerlen. There are many walking and running trails varying from 4 to 7 km in length. The Terworm is at its center and the gardens are very peaceful. Access is free. (photo source: own website)', 'https://www.hotelheerlen.nl/faciliteiten/landgoed-terworm/', 'Terworm 5, 6411 RV Heerlen, Nederland', 0, 0, '6411 RV', '1542380559_Heerlen Castle Terworm.jpg', '1542380559_Heerlen Castle Terworm.jpg', NULL, NULL, NULL, 'Active', '2018-11-16', '2018-11-16'),
(277, 1, 49, 103, 'Hollywood Road Park', 'Small urban park. Paved with fountain and water ornaments and trees. Open to the public from dusk till dawn. (Photo source: ilovehongkong.hk)', 'https://www.lcsd.gov.hk/tc/facilities/facilitieslist/parks.html', 'Hollywood Rd, Sheung Wan, Hongkong', 0, 0, '12', '1542628160_Hong Kong Hollywood Road Park.jpg', '1542628160_Hong Kong Hollywood Road Park.jpg', NULL, NULL, NULL, 'Active', '2018-11-19', '2018-11-19'),
(278, 1, 49, 103, 'Cross fit Typhoon', 'CrossFit is a core strength and conditioning program utilising movements we use everyday: pushing, pulling, squatting, jumping, throwing, carrying, and sprinting. At the Bunker they offer drop-in classes for HK$250. Contact them in advance to book a drop-in class. Hours of operation are Monday to Friday between  6:00 am - 2:00 pm & 5:00 - 9:00 pm. (Photo source: own website)', 'http://www.crossfittyphoon.com/', 'Fung Yat Building, 38-40 Third Street, Sai Ying Pun, Hongkong', 0, 0, '0000', '1542628647_CrossFit-Typhoon-hong-kong-1.jpg', '1542628647_CrossFit-Typhoon-hong-kong-1.jpg', NULL, NULL, NULL, 'Active', '2018-11-19', '2018-11-19'),
(279, 1, 49, 103, 'Grassroots Pantry', 'Modern restaurant using plant-based and 90% organic ingredients. Reservation is required due to limited number of seats: email info@grassrootspantry.com or call +852 2873 3353 with your preferred dine in date, time and number of guests.  Opening hours are Mon to Wed 09:00–15:00 & 17:30–23:00. Thu to Sun 09:00–23:00.  (photo source: own website)', 'http://www.grassrootspantry.com/', '108 Hollywood Rd, Sheung Wan, Hongkong', 0, 0, '0000', '1542792562_Hong Kong Grassroot pantry.jpg', '1542792562_Hong Kong Grassroot pantry.jpg', NULL, NULL, NULL, 'Active', '2018-11-21', '2018-11-21'),
(280, 1, 49, 103, 'OKRA Hong Kong', 'Casual urban hotspot that serves natural, unpasteurized sakes, charcoal grilled small plates and sashimi . Opening hours are Mon to Wed 18:00 – 23:30. Thu to Sat 18:00 – LATE and closed on Sunday. (photo Source: own website)', 'http://www.okra.kitchen/', '110 Queen\'s Road West, Sai Ying Pun, Hongkong', 0, 0, '0000', '1542792866_Hong Kong Okra restaurant.jpg', '1542792866_Hong Kong Okra restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-11-21', '2018-11-21'),
(281, 1, 49, 64, 'Huangshanhu Park', 'Large park with trees, lawns, natural waters and paved pathways. Open from dusk until dawn. (Photo by: Praveen Kumar)', 'https://www.clubmondain.com/search.html', 'Gongyuan Rd, Jiangyin Shi, Wuxi Shi, Jiangsu Sheng, China, 214400', 0, 0, '214400', '1542881294_Shanghai Huangshanhu Park.jpg', '1542881297_Shanghai Huangshanhu Park.jpg', NULL, NULL, NULL, 'Active', '2018-11-22', '2018-11-22'),
(282, 1, 49, 64, 'Fitness @ Sheraton Jiangyin Hotel', 'Fitness room at Sheraton Jiangyin Hotel is fully equipped. Ranging from cardio to free weights. Acces is 24 hrs a day. Additionally the 25 meter indoor pool is open from 6:00 am - 11:00 pm.  In the locker rooms is also a sauna. (Photo source: own website)', 'https://www.marriott.com/hotels/hotel-information/fitness-center/wuxjs-sheraton-jiangyin-hotel/', '333 Binjiang Middle Rd, Jiangyin Shi, Wuxi Shi, Jiangsu Sheng, China, 214400', 0, 0, '214400', '1542881829_Shanghai Sheraton fitness.jpg', '1542881829_Shanghai Sheraton fitness.jpg', NULL, NULL, NULL, 'Active', '2018-11-22', '2018-11-22'),
(283, 1, 230, 104, 'Yu Shan Ge', 'Vegetarian restaurant in traditional setting and local cuisine techniques. Opening hours: 11:30~14:00 for lunch time 17:30~21:00 for dinner. Situated on the 1st floor.', 'http://www.yu-shan-ge.com.tw/tw/food.php', 'Beiping East Road, Zhongzheng District, Taipei, Taiwan 100', 0, 0, '0000', '1542899977_Taipei Yo SHan Ge restaurant.jpg', '1542899977_Taipei Yo SHan Ge restaurant.jpg', NULL, NULL, NULL, 'Active', '2018-11-22', '2018-11-22'),
(284, 1, 230, 104, 'Daan Forest Park', 'Largest city park of Taipei. Large trees, shrubs and lawns make it colorful and rich with animal life. The pathways, benches and pond make it a popular spot for people from the city wanting to relax. (Photo source: www.travel.taipei/en/)', 'https://www.travel.taipei/en/attraction/details/524', 'Section 2, Xinsheng South Road, Da’an District, Taipei, Taiwan 106', 0, 0, '0000', '1542900164_Taipei Daan Park.jpg', '1542900164_Taipei Daan Park.jpg', NULL, NULL, NULL, 'Active', '2018-11-22', '2018-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_category`
--

CREATE TABLE `cmd_category` (
  `category_id` int(11) NOT NULL COMMENT 'Relation to event,business,blog,news',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Relation to event,business,blog,news as a Subcategory',
  `category_type` varchar(100) DEFAULT NULL COMMENT 'Drop Down For Category_type',
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_category`
--

INSERT INTO `cmd_category` (`category_id`, `parent_id`, `category_type`, `category_name`, `category_image`, `status`, `create_date`, `update_date`) VALUES
(8, 0, 'event', 'Boxing', '5c4bb5853fb7a1f14321cc61a19077fb.jpg', 'Active', '2017-05-03', '2017-07-21'),
(9, 0, 'event', 'Yoga', '7d56ff6ed4823931605e855bc0809cf6.jpg', 'Active', '2017-05-03', '2017-05-03'),
(10, 0, 'event', 'Running', 'ce17fb00dc0bfe763c463f8ff3311058.jpg', 'Active', '2017-05-03', '2017-07-21'),
(11, 0, 'event', 'Swimming', 'e5152ed37cd4e9f68399d31187277877.png', 'Active', '2017-05-03', '2017-07-17'),
(16, 0, 'product', 'Travel Gadgets', '2e578cf10ce1daef949e28a572075c3b.png', 'Inactive', '2017-05-03', '2018-06-18'),
(17, 0, 'product', 'Sports Equipment', '5bcd7c5d9884c3468f74850d574b25bf.png', 'Inactive', '2017-05-03', '2018-06-18'),
(18, 0, 'event', 'Wellness', 'eec481236547a1b04ab3fe51d90a5bac.png', 'Active', '2017-05-05', '2018-02-13'),
(20, 0, 'class', 'Fast Food', '106bdddd50c6bea1b513d36ea017953e.jpg', 'Active', '2017-05-18', '2017-05-18'),
(21, 0, 'class', 'Sugar Free', '25aa8f0cceafb24fa7d03eb2db85845e.jpg', 'Active', '2017-05-18', '2017-05-18'),
(22, 17, 'sub-product', 'TEST', NULL, 'Active', '2017-05-29', '0000-00-00'),
(23, 0, 'product', 'Travel Food & Packages', '9f1334fb088332368ca05b096670f38a.png', 'Inactive', '2017-06-02', '2018-06-18'),
(28, 0, 'event', 'Pilates', 'e5b052604683ba1eed45cf39db90190b.jpg', 'Active', '2017-07-21', '2017-07-21'),
(30, 0, 'blog', 'Travel', 'c32e455d5cb70b6ebaccbc31c5128bb5.png', 'Active', '2017-08-01', '2017-08-01'),
(31, 0, 'event', 'Vegan ', '6948d4431c4c2f057d4a91cef230e490.jpg', 'Active', '2017-08-02', '2017-08-03'),
(32, 0, 'event', 'Juice Bar', '244a07ca5bc37b94aadce85dcc1b156f.jpg', 'Active', '2017-08-02', '2017-08-02'),
(33, 0, 'event', 'Fitness', '37f7fe71dbb6e2cf21ac7c1763e21ae1.jpeg', 'Active', '2017-08-03', '2017-08-03'),
(34, 0, 'event', 'Surfing', 'a08041d42b1b86b98bc640bfb4f5bac1.jpg', 'Inactive', '2017-08-03', '2017-12-21'),
(46, 0, 'news', 'City Information ', '0ae34ed41606b987d3873d367efefacb.jpg', 'Active', '2017-08-16', '2018-07-05'),
(48, 47, 'sub-product', 'Mobile', NULL, 'Active', '2017-08-18', '0000-00-00'),
(57, 0, 'event', 'Cycling', '7619c3b954a7009afbda0259eb9f01b2.jpg', 'Active', '2017-11-21', '2017-11-21'),
(58, 0, 'event', 'Healthy Food', 'f00cf93cfe85cef90478eb0ac8744d74.jpg', 'Active', '2017-11-21', '2017-11-22'),
(59, 0, 'event', 'Park', '40e021e99a42124bad332d6f1953cb88.jpg', 'Active', '2017-11-21', '2017-11-21'),
(62, 0, 'event', 'Beach', '31b261b9415b604e42b264b3ce85f4a5.jpeg', 'Active', '2017-12-06', '2017-12-06'),
(63, 0, 'event', 'Workspace/co-working', 'd2e18de25f7caa28d4cf414116054851.jpeg', 'Inactive', '2017-12-07', '2018-01-30'),
(64, 0, 'event', 'Take Away', '5e591696e4c16fcd98717bb2feeaea1b.jpeg', 'Active', '2017-12-07', '2017-12-07'),
(65, 0, 'event', 'Hiking', '5dca71a868e4a4c566eba7c06ffc2d27.jpeg', 'Active', '2017-12-07', '2017-12-07'),
(66, 0, 'product', 'Travel Coaching', 'c9ca9febf398b2472061171fc11d7a32.png', 'Active', '2017-12-09', '2018-06-18'),
(67, 66, 'sub-product', 'Business Traveller & Digital Nomads', NULL, 'Active', '2017-12-09', '0000-00-00'),
(69, 0, 'news', 'Healthy Mind', '8b0433d5348b4078611a389939370410.jpg', 'Active', '2018-01-09', '2018-07-04'),
(70, 0, 'news', 'Healthy Body ', 'd11aad2a3f2a1515703d9d6f6160164f.jpg', 'Active', '2018-01-09', '2018-07-04'),
(71, 0, 'event', 'Acupuncture ', '145fed5c0094e6de524e3ac0e91596b9.jpg', 'Active', '2018-01-11', '2018-01-11'),
(72, 0, 'event', 'Healthy Congress/Event', '42d5220ffdb25734c9ea712226465e3f.jpg', 'Active', '2018-02-27', '2018-11-26'),
(74, 0, 'event', 'Healthy Space', '9c49a052c1d783bbe6b47a9a683f14b2.jpg', 'Active', '2018-02-27', '2018-02-27'),
(76, 0, 'event', 'Golf', 'b1e55eac0b9f89df4eefe4ae1f1906bc.jpg', 'Active', '2018-05-30', '2018-05-30'),
(77, 0, 'news', 'General', '45fba9dbb9b0d4ba7408b64f4afda7f8.jpg', 'Active', '2018-07-05', '2018-07-05'),
(78, 0, 'event', 'Tennis', '59a5455f6b7fce1cefc8c156f1eebccb.jpg', 'Active', '2018-08-29', '2018-08-29'),
(79, 0, 'event', 'Meditation', '7e78f844fb69028502f5c7e6c72c6c91.jpg', 'Active', '2018-08-30', '2018-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_city`
--

CREATE TABLE `cmd_city` (
  `city_id` int(20) NOT NULL,
  `country_id` int(20) NOT NULL DEFAULT '0',
  `city_name` varchar(255) DEFAULT NULL,
  `city_image` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'This Field Will Reffer as User Request(0) Or Admin (1)',
  `city_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_city`
--

INSERT INTO `cmd_city` (`city_id`, `country_id`, `city_name`, `city_image`, `type`, `city_status`) VALUES
(1, 77, 'Paris', '1493718452_Paris.jpg', 1, 'Active'),
(2, 169, 'Oslo', '1508840396_Oslo.jpg', 1, 'Active'),
(3, 168, 'Amsterdam', '1503061136_tripadvisor-jordaan.jpg', 1, 'Active'),
(4, 61, 'Copenhagen', '1508840381_Copenhagen.jpg', 1, 'Active'),
(5, 199, 'Stockholm', '1508840445_Stockholm.jpg', 1, 'Active'),
(6, 79, 'London', '1508840459_London.jpg', 1, 'Active'),
(26, 21, 'Brussels ', '1508840693_Brussels.jpg', 1, 'Active'),
(30, 186, 'Lisbon', '1505906057_Portugal-Lissabon-Tag1-Altstadt_3163.jpg', 1, 'Active'),
(31, 13, 'Vienna', '1506346642_Vienna City.jpg', 1, 'Active'),
(32, 44, 'Zurich', '1506519142_switzerland-2520399_960_720.jpg', 1, 'Active'),
(34, 70, 'Madrid', '1508236784_Madrid.jpg', 1, 'Active'),
(35, 70, 'Barcelona', '1508570858_Barcelona.jpg', 1, 'Active'),
(36, 59, 'Frankfurt', '1508572955_Frankfurt.jpg', 1, 'Active'),
(38, 44, 'Geneva', '1508574444_Geneva.jpg', 1, 'Active'),
(40, 59, 'Berlin', '1508840612_Berlin.jpg', 1, 'Active'),
(41, 168, 'Utrecht', '1510657179_Urecht source flixbus.jpg', 1, 'Active'),
(42, 49, 'Beijing', '1510932452_Beijing.jpg', 1, 'Active'),
(51, 59, 'Munich', '1537544996_Munich.jpg', 1, 'Active'),
(52, 168, 'Driel', NULL, 1, 'Inactive'),
(54, 168, 'Amersfoort', NULL, 1, 'Inactive'),
(55, 168, 'Rotterdam', '1516371789_Rotterdam.jpg', 1, 'Active'),
(57, 0, 'Gouda', NULL, 0, 'Inactive'),
(58, 168, 'Uden', NULL, 1, 'Inactive'),
(59, 168, 'Hague, The', '1519731928_Den Haag aanzicht .jpg', 1, 'Active'),
(60, 181, 'Warsaw', '1521560168_Polen.jpg', 1, 'Active'),
(61, 168, 'Heerlen', '1537271724_heerlen centrum-dsc-7118.jpg', 1, 'Active'),
(62, 59, 'Rheinfelden (DE)', '1527665006_Rheinfelden (DE).jpg', 1, 'Active'),
(63, 44, 'Rheinfelden (CH)', '1527664102_Rheinfelden CH.jpg', 1, 'Active'),
(64, 49, 'Shanghai', '1530867427_Shanghai.jpg', 1, 'Active'),
(65, 235, 'New York', '1531340697_New York.jpg', 1, 'Active'),
(66, 168, 'Geleen', NULL, 1, 'Inactive'),
(68, 168, 'Maastricht', '1538382717_Maastricht.jpg', 1, 'Active'),
(69, 235, 'Greenville', '1532986488_greenville-south-carolina-usa-cityscape.jpg', 1, 'Active'),
(70, 235, 'Phoenix', '1533046387_Phoenix Arizona.jpg', 1, 'Active'),
(71, 235, 'Beaufort', '1533368244_Beaufort North Carolina.jpg', 1, 'Active'),
(72, 168, 'Zoetermeer', NULL, 1, 'Inactive'),
(73, 44, 'Basel', '1534261752_Basel CH.jpg', 1, 'Active'),
(74, 168, 'Valkenburg', NULL, 1, 'Inactive'),
(75, 49, 'Laiwu', '1535053983_Laiwu.jpg', 1, 'Active'),
(76, 169, 'Sandnes', '1535096764_Sandnes norway by helen hard.jpg', 1, 'Active'),
(77, 59, 'Hamburg', '1535634190_Hamburg.jpg', 1, 'Active'),
(78, 21, 'Hasselt', '1535990840_hasselt.jpg', 1, 'Active'),
(79, 235, 'San Francisco', '1536227524_San Francisco.jpg', 1, 'Active'),
(80, 186, 'Porto', '1536232429_Porto.jpg', 1, 'Active'),
(81, 59, 'Seewald', '1536566658_Seewald hotel.jpeg', 1, 'Active'),
(82, 49, 'Shunde', '1536744699_Shunde China Ramada plaza.jpg', 1, 'Active'),
(83, 32, 'Rio de Janeiro', '1537445021_Rio de Janeiro.jpg', 1, 'Active'),
(84, 235, 'New Jersey', '1538042154_Parsippany, NJ.jpg', 1, 'Active'),
(86, 112, 'Bérgamo', '1538476483_Bérgamo Italië.jpg', 1, 'Active'),
(87, 112, 'Verona', '1538478306_Verona Italy.jpg', 1, 'Active'),
(88, 77, 'Village-Neuf', '1538481246_Saint-Louis France.jpg', 1, 'Active'),
(89, 168, 'Zwolle', '1538484614_Zwolle.png', 1, 'Active'),
(90, 168, 'Delft', '1539004518_Delft.jpg', 1, 'Active'),
(91, 235, 'San Jose', '1539263826_San Jose USA.jpg', 1, 'Active'),
(93, 235, 'Exton', '1539418340_Penssylvania.jpg', 1, 'Active'),
(94, 58, 'Prague', '1539600298_Prague.jpg', 1, 'Active'),
(95, 104, 'Dublin', '1539603122_Dublin.jpg', 1, 'Active'),
(96, 200, 'Singapore', '1539929305_Singapore.jpg', 1, 'Active'),
(97, 116, 'Tokyo', '1539960315_Tokyo.jpg', 1, 'Active'),
(98, 235, 'Michigan', '1540217642_Michigan.jpeg', 1, 'Active'),
(99, 44, 'Visp', '1541608007_Visp.jpg', 1, 'Active'),
(100, 235, 'Bellingham', '1541756173_Bellingham, WA Verenigde Staten.jpg', 1, 'Active'),
(101, 235, 'Seattle', '1541766344_Seattle USA.jpg', 1, 'Active'),
(102, 168, 'Poeldijk', '1542004468_Westland.jpg', 1, 'Active'),
(103, 49, 'Hong Kong', '1542627864_Hong Kong.jpg', 1, 'Active'),
(104, 230, 'Taipei', '1542899773_Taipei.jpg', 1, 'Active'),
(105, 230, 'Hualien', '1542899802_Hualien Taiwan.jpg', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_content`
--

CREATE TABLE `cmd_content` (
  `content_id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_description` longtext,
  `content_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_content`
--

INSERT INTO `cmd_content` (`content_id`, `page_name`, `page_title`, `page_description`, `content_status`) VALUES
(2, 'Home', 'Content 1', '<p>Search, Add your favorite healthy spaces and Inspire others to stay Healthy around the Globe </p><br>\r\n<p></p>', 'Active'),
(3, 'Home', 'Contend 2', '<p>\r\n<strong> Type in your next destination below and .... Let\'s Go Mondain!! <br></p>', 'Active'),
(4, 'Home', 'Contend 3', '<p>What healthy focus</p>', 'Active'),
(5, 'Home', 'Contend 4', '<p>do you want to add to your stay?</p>', 'Active'),
(6, 'Home', 'Contend 5', '<p>If you are travelling frequently for business, chasing your dreams and staying places all over the world and your need is to keep fit and connected, then Club Mondain could be just the place for you to stay around.</p>', 'Active'),
(7, 'Home', 'Content 6', '<p>Featured <em>items</em></p>', 'Active'),
(8, 'Story', 'Club  Mondain', '<p><b> Club Mondain; Work and Travel made Healthy</p>\r\n\r\nThis online space is a spark of what we do.  A spark of which we are proud of and where members around the world find eachother to look up spaces to stay fit and to inspire others by adding their own. Beside this online space that is intended to grow organically we provide the best way to make work and travel healthy. With our global programs we make the difference by offering the most practical and easiest way to stay fit in the meanwhile. \r\nOur programs are now quickly being picked up by companies that realise that people who travel often have a basic need - accomplishing their goals oversees - to stay fit. \r\nDid you already hear about us and want to know more of what we do, contact us at 0031 (0)20 716 3111 </p>\r\n \r\n<p>What we do<br>\r\nClub Mondain offers several services to keep you vitalised. All of our services are practical, easy accessible, fun, personalized and of high quality. Whether this is online through the platform or offline through workshops or coaching.</p>\r\n \r\n<p>Are you a Frequent Traveler for work? Then it is a good moment to connect <br>\r\n- We  add vitality to your organization and life with our tailormade 1-on- 1 programs which will help you to grow your awareness on where you can find new and better routines while staying healthy during work and travel. <br>\r\n- We also serve larger groups within departments that work remote with programs that help to maintain health <br>\r\n- Register on our website and leave your details we will contact you shortly<br>\r\nor call us +31 (0)20 716 3111 / coach@clubmondain.com and Get Going!</p>\r\n \r\n<p>Vitality in Congress<br>\r\nClub Mondain has a special department that cares about your international delegates visiting a congress or event.<br>\r\nWe support and consult organisations in constructing vitality programs during your event and we do this with the best trainers available. This may in- or exclude inside and team activities to create vitalised break and awareness on the topic of healthy habits.\r\nThink off yoga in your workhub, introduction into mindfulness or neck-and back massages on the spot. Contact us for more info +31 20 716 3114 or e-mail us at congressinvitality@clubmondain.com for information and references.</p> \r\n \r\n<p>Who we are<br>\r\nClub Mondain Team lives for movement, for a vibrant and exciting life. While pursuing their passions, they explore new exciting and easy ways to stay ﬁt. In order to share and connect with other like-minded people as yourself.</p> \r\n \r\n<p> Our founder, Judith Stapel, created Club Mondain to serve people on a global scale in their quest for sustainable employability and figuring out how to balance work and life in a healthy and mindful way. Her entrepreneurial spirit and her personal passion for sports, travel and her life long quest to find, explore and share ways to stay healthy and live mindful, led to the realisation of her dream in 2018: Club Mondain. Having practiced many sports and discovering what mindfulness can add in daily life, she practiced forms from regular running and yoga to Shaolin Kung Fu and Vipassana; she knows the positive impact that sports and rest have on one’s vitality and energy. And what positive influence it has to share and inspire others! </p>\r\n\r\nHealthy and Happy Stays !!</p>\r\n<p> </p>', 'Active'),
(9, 'Story', 'Create your space <em>for healthy living whenever</em>', '<p>Create your space <em>for healthy living whenever</em></p>', 'Active'),
(10, 'Story', 'Club Mondain,Easiest Way to Stay Fit During Business Travel', '<p><em>Club Mondain, easiest way to stay fit during business travel</em></p>\r\n', 'Active'),
(11, 'Story', 'Our Story', '', 'Active'),
(12, 'Reg-popup', 'Heading 2', '<p>Click below to co-create a space for a healthy lifestyle</p>', 'Active'),
(13, 'Reg-popup', 'Heading 1', '<p>You are not a Business Traveller searching for the easiest way to stay fit But you want to add value because you have a healthy way</p>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_country`
--

CREATE TABLE `cmd_country` (
  `country_id` int(11) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin DEFAULT NULL,
  `country_name` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cmd_country`
--

INSERT INTO `cmd_country` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AN', 'Netherlands Antilles'),
(9, 'AO', 'Angola'),
(10, 'AQ', 'Antarctica'),
(11, 'AR', 'Argentina'),
(12, 'AS', 'American Samoa'),
(13, 'AT', 'Austria'),
(14, 'AU', 'Australia'),
(15, 'AW', 'Aruba'),
(16, 'AX', 'Aland Islands'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BA', 'Bosnia and Herzegovina'),
(19, 'BB', 'Barbados'),
(20, 'BD', 'Bangladesh'),
(21, 'BE', 'Belgium'),
(22, 'BF', 'Burkina Faso'),
(23, 'BG', 'Bulgaria'),
(24, 'BH', 'Bahrain'),
(25, 'BI', 'Burundi'),
(26, 'BJ', 'Benin'),
(27, 'BL', 'Saint Barthélemy'),
(28, 'BM', 'Bermuda'),
(29, 'BN', 'Brunei'),
(30, 'BO', 'Bolivia'),
(31, 'BQ', 'Bonaire, Saint Eustatius and Saba '),
(32, 'BR', 'Brazil'),
(33, 'BS', 'Bahamas'),
(34, 'BT', 'Bhutan'),
(35, 'BV', 'Bouvet Island'),
(36, 'BW', 'Botswana'),
(37, 'BY', 'Belarus'),
(38, 'BZ', 'Belize'),
(39, 'CA', 'Canada'),
(40, 'CC', 'Cocos Islands'),
(41, 'CD', 'Democratic Republic of the Congo'),
(42, 'CF', 'Central African Republic'),
(43, 'CG', 'Republic of the Congo'),
(44, 'CH', 'Switzerland'),
(45, 'CI', 'Ivory Coast'),
(46, 'CK', 'Cook Islands'),
(47, 'CL', 'Chile'),
(48, 'CM', 'Cameroon'),
(49, 'CN', 'China'),
(50, 'CO', 'Colombia'),
(51, 'CR', 'Costa Rica'),
(52, 'CS', 'Serbia and Montenegro'),
(53, 'CU', 'Cuba'),
(54, 'CV', 'Cape Verde'),
(55, 'CW', 'Curaçao'),
(56, 'CX', 'Christmas Island'),
(57, 'CY', 'Cyprus'),
(58, 'CZ', 'Czech Republic'),
(59, 'DE', 'Germany'),
(60, 'DJ', 'Djibouti'),
(61, 'DK', 'Denmark'),
(62, 'DM', 'Dominica'),
(63, 'DO', 'Dominican Republic'),
(64, 'DZ', 'Algeria'),
(65, 'EC', 'Ecuador'),
(66, 'EE', 'Estonia'),
(67, 'EG', 'Egypt'),
(68, 'EH', 'Western Sahara'),
(69, 'ER', 'Eritrea'),
(70, 'ES', 'Spain'),
(71, 'ET', 'Ethiopia'),
(72, 'FI', 'Finland'),
(73, 'FJ', 'Fiji'),
(74, 'FK', 'Falkland Islands'),
(75, 'FM', 'Micronesia'),
(76, 'FO', 'Faroe Islands'),
(77, 'FR', 'France'),
(78, 'GA', 'Gabon'),
(79, 'GB', 'United Kingdom'),
(80, 'GD', 'Grenada'),
(81, 'GE', 'Georgia'),
(82, 'GF', 'French Guiana'),
(83, 'GG', 'Guernsey'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GL', 'Greenland'),
(87, 'GM', 'Gambia'),
(88, 'GN', 'Guinea'),
(89, 'GP', 'Guadeloupe'),
(90, 'GQ', 'Equatorial Guinea'),
(91, 'GR', 'Greece'),
(92, 'GS', 'South Georgia and the South Sandwich Islands'),
(93, 'GT', 'Guatemala'),
(94, 'GU', 'Guam'),
(95, 'GW', 'Guinea-Bissau'),
(96, 'GY', 'Guyana'),
(97, 'HK', 'Hong Kong'),
(98, 'HM', 'Heard Island and McDonald Islands'),
(99, 'HN', 'Honduras'),
(100, 'HR', 'Croatia'),
(101, 'HT', 'Haiti'),
(102, 'HU', 'Hungary'),
(103, 'ID', 'Indonesia'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IM', 'Isle of Man'),
(107, 'IN', 'India'),
(108, 'IO', 'British Indian Ocean Territory'),
(109, 'IQ', 'Iraq'),
(110, 'IR', 'Iran'),
(111, 'IS', 'Iceland'),
(112, 'IT', 'Italy'),
(113, 'JE', 'Jersey'),
(114, 'JM', 'Jamaica'),
(115, 'JO', 'Jordan'),
(116, 'JP', 'Japan'),
(117, 'KE', 'Kenya'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'KH', 'Cambodia'),
(120, 'KI', 'Kiribati'),
(121, 'KM', 'Comoros'),
(122, 'KN', 'Saint Kitts and Nevis'),
(123, 'KP', 'North Korea'),
(124, 'KR', 'South Korea'),
(125, 'KW', 'Kuwait'),
(126, 'KY', 'Cayman Islands'),
(127, 'KZ', 'Kazakhstan'),
(128, 'LA', 'Laos'),
(129, 'LB', 'Lebanon'),
(130, 'LC', 'Saint Lucia'),
(131, 'LI', 'Liechtenstein'),
(132, 'LK', 'Sri Lanka'),
(133, 'LR', 'Liberia'),
(134, 'LS', 'Lesotho'),
(135, 'LT', 'Lithuania'),
(136, 'LU', 'Luxembourg'),
(137, 'LV', 'Latvia'),
(138, 'LY', 'Libya'),
(139, 'MA', 'Morocco'),
(140, 'MC', 'Monaco'),
(141, 'MD', 'Moldova'),
(142, 'ME', 'Montenegro'),
(143, 'MF', 'Saint Martin'),
(144, 'MG', 'Madagascar'),
(145, 'MH', 'Marshall Islands'),
(146, 'MK', 'Macedonia'),
(147, 'ML', 'Mali'),
(148, 'MM', 'Myanmar'),
(149, 'MN', 'Mongolia'),
(150, 'MO', 'Macao'),
(151, 'MP', 'Northern Mariana Islands'),
(152, 'MQ', 'Martinique'),
(153, 'MR', 'Mauritania'),
(154, 'MS', 'Montserrat'),
(155, 'MT', 'Malta'),
(156, 'MU', 'Mauritius'),
(157, 'MV', 'Maldives'),
(158, 'MW', 'Malawi'),
(159, 'MX', 'Mexico'),
(160, 'MY', 'Malaysia'),
(161, 'MZ', 'Mozambique'),
(162, 'NA', 'Namibia'),
(163, 'NC', 'New Caledonia'),
(164, 'NE', 'Niger'),
(165, 'NF', 'Norfolk Island'),
(166, 'NG', 'Nigeria'),
(167, 'NI', 'Nicaragua'),
(168, 'NL', 'Netherlands'),
(169, 'NO', 'Norway'),
(170, 'NP', 'Nepal'),
(171, 'NR', 'Nauru'),
(172, 'NU', 'Niue'),
(173, 'NZ', 'New Zealand'),
(174, 'OM', 'Oman'),
(175, 'PA', 'Panama'),
(176, 'PE', 'Peru'),
(177, 'PF', 'French Polynesia'),
(178, 'PG', 'Papua New Guinea'),
(179, 'PH', 'Philippines'),
(180, 'PK', 'Pakistan'),
(181, 'PL', 'Poland'),
(182, 'PM', 'Saint Pierre and Miquelon'),
(183, 'PN', 'Pitcairn'),
(184, 'PR', 'Puerto Rico'),
(185, 'PS', 'Palestinian Territory'),
(186, 'PT', 'Portugal'),
(187, 'PW', 'Palau'),
(188, 'PY', 'Paraguay'),
(189, 'QA', 'Qatar'),
(190, 'RE', 'Reunion'),
(191, 'RO', 'Romania'),
(192, 'RS', 'Serbia'),
(193, 'RU', 'Russia'),
(194, 'RW', 'Rwanda'),
(195, 'SA', 'Saudi Arabia'),
(196, 'SB', 'Solomon Islands'),
(197, 'SC', 'Seychelles'),
(198, 'SD', 'Sudan'),
(199, 'SE', 'Sweden'),
(200, 'SG', 'Singapore'),
(201, 'SH', 'Saint Helena'),
(202, 'SI', 'Slovenia'),
(203, 'SJ', 'Svalbard and Jan Mayen'),
(204, 'SK', 'Slovakia'),
(205, 'SL', 'Sierra Leone'),
(206, 'SM', 'San Marino'),
(207, 'SN', 'Senegal'),
(208, 'SO', 'Somalia'),
(209, 'SR', 'Suriname'),
(210, 'SS', 'South Sudan'),
(211, 'ST', 'Sao Tome and Principe'),
(212, 'SV', 'El Salvador'),
(213, 'SX', 'Sint Maarten'),
(214, 'SY', 'Syria'),
(215, 'SZ', 'Swaziland'),
(216, 'TC', 'Turks and Caicos Islands'),
(217, 'TD', 'Chad'),
(218, 'TF', 'French Southern Territories'),
(219, 'TG', 'Togo'),
(220, 'TH', 'Thailand'),
(221, 'TJ', 'Tajikistan'),
(222, 'TK', 'Tokelau'),
(223, 'TL', 'East Timor'),
(224, 'TM', 'Turkmenistan'),
(225, 'TN', 'Tunisia'),
(226, 'TO', 'Tonga'),
(227, 'TR', 'Turkey'),
(228, 'TT', 'Trinidad and Tobago'),
(229, 'TV', 'Tuvalu'),
(230, 'TW', 'Taiwan'),
(231, 'TZ', 'Tanzania'),
(232, 'UA', 'Ukraine'),
(233, 'UG', 'Uganda'),
(234, 'UM', 'United States Minor Outlying Islands'),
(235, 'US', 'United States'),
(236, 'UY', 'Uruguay'),
(237, 'UZ', 'Uzbekistan'),
(238, 'VA', 'Vatican'),
(239, 'VC', 'Saint Vincent and the Grenadines'),
(240, 'VE', 'Venezuela'),
(241, 'VG', 'British Virgin Islands'),
(242, 'VI', 'U.S. Virgin Islands'),
(243, 'VN', 'Vietnam'),
(244, 'VU', 'Vanuatu'),
(245, 'WF', 'Wallis and Futuna'),
(246, 'WS', 'Samoa'),
(247, 'XK', 'Kosovo'),
(248, 'YE', 'Yemen'),
(249, 'YT', 'Mayotte'),
(250, 'ZA', 'South Africa'),
(251, 'ZM', 'Zambia'),
(252, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_energiser`
--

CREATE TABLE `cmd_energiser` (
  `trainer_class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `space_id` int(11) NOT NULL DEFAULT '0',
  `trainer_class_name` varchar(255) DEFAULT NULL,
  `trainer_class_address` varchar(255) DEFAULT NULL,
  `trainer_class_price` decimal(10,2) DEFAULT NULL,
  `trainer_class_type` enum('Paid','Free') NOT NULL DEFAULT 'Paid',
  `trainer_class_image` varchar(255) DEFAULT NULL,
  `trainer_class_description` text NOT NULL,
  `class_no_of_booking` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `trainer_class_website_url` varchar(255) NOT NULL,
  `trainer_class_latitude` float NOT NULL DEFAULT '0',
  `trainer_class_longitute` float NOT NULL DEFAULT '0',
  `trainer_class_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_energiser`
--

INSERT INTO `cmd_energiser` (`trainer_class_id`, `user_id`, `space_id`, `trainer_class_name`, `trainer_class_address`, `trainer_class_price`, `trainer_class_type`, `trainer_class_image`, `trainer_class_description`, `class_no_of_booking`, `country_id`, `city_id`, `trainer_class_website_url`, `trainer_class_latitude`, `trainer_class_longitute`, `trainer_class_status`, `create_date`, `update_date`) VALUES
(4, 118, 3, 'Club Mondain', 'Barbara Strozzilaan, Amsterdam, Nederland', '0.00', 'Free', '1538562046_CM Logo.png', 'Our vision is to enable every business (wo)man to create a space for a healthy lifestyle from any place in the world in order to work together in realizing their dreams and goals. During this Roadshow you can get a taste of the experience and sign-up for the full program.', 75, 168, 3, 'http://www.clubmondain.com', 0, 0, 'Active', '2018-10-03', '2018-10-03'),
(5, 204, 4, 'Powerwalk @ One Young World Summit 2018', 'Churchillplein 10, 2517 JW Den Haag, Nederland', '0.00', 'Free', '1539527280_813x300 Park running Basel Photo by Jennifer Birdie Shawker on Unsplash.jpg', '<p> <b> This Powerwalk Energizer is part of the One Young World Summit to keep you energized and fit during your stay at the World Forum The Hague.\r\nRegistration can be done through this website and at the Point of Vitality during the One Young World Summit (in lobby 3 at Front Desk). </p> \r\n\r\nMake sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>\r\n\r\n<p><br>\r\nThe Powerwalk will be given at Wednesday 17th of October. Groups start at 12:00 (20 people), 12:30 (20 people) and at 13:00 (20 people).</p>\r\n \r\n<p><br>\r\n The PowerWalk Energizer is the ideal way to meet like-minded people who both want to connect in an easy way and value a healthy life. You do not need to bring any sports clothes with you. Although flat shoes will make the Powerwalk a bit more easy ! Make sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>', 60, 168, 59, 'http://www.clubmondain.com/Home/profile-view/MTc2', 0, 0, 'Active', '2018-10-07', '2018-10-22'),
(6, 176, 5, '25min PowerWalk @ Lung Conference', 'Churchillplein 10, Den Haag', '0.00', 'Free', '1540221111_707x288 News Banner Powerwalking.jpg', '<p> <b> This Powerwalk Energizer is part of the 49th Lung Conference to keep you energized and fit during your time at the World Forum The Hague.\r\nRegistration can be done through this website and at the Point of Vitality during the Conference (located in the community center). </p> \r\n\r\nMake sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>\r\n\r\n<p><br>\r\nThe Powerwalk will be given on Saturday 27th of October. Groups start at 12:00 (20 people), 12:30 (40 people) and at 13:00 (40 people).</p>\r\n \r\n<p><br>\r\n The PowerWalk Energizer is the ideal way to meet like-minded people who both want to connect in an easy way and value a healthy life. You do not need to bring any sports clothes with you. Although flat shoes will make the Powerwalk a bit more easy ! Make sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>', 100, 168, 59, 'http://www.clubmondain.com/Home/profile-view/MTc2', 0, 0, 'Active', '2018-10-22', '2018-10-22'),
(7, 176, 5, '45min Run @ Lung Conference', 'World Forum the Hague', '0.00', 'Free', '1540221207_813x250 Basel park running.jpg', '<p> <b> This Powerwalk Energizer is part of the One Young World Summit to keep you energized and fit during your stay at the World Forum The Hague.\r\nRegistration can be done through this website and at the Point of Vitality during the One Young World Summit (in lobby 3 at Front Desk). </p> \r\n\r\nMake sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>\r\n\r\n<p><br>\r\nThe Run will be held on Friday 25th of October. Groups start at 5:30 pm (60 people) and at 6:00 pm (40 people).</p>\r\n \r\n<p><br>\r\nThis guided run is perfect to see some of the beautiful surrounding whilst meeting like-minded delegates. Connecting in an easy way whilst keeping up with your healthy life. You need to have a basic stamina and yor own running clothes and outdoor shoes. Start and end is at the World Forum. Make sure you pick-up your Registration ticket at the Point of Vitality to ensure your Spot.<br>', 100, 168, 59, 'http://www.clubmondain.com/Home/profile-view/MTc2', 0, 0, 'Active', '2018-10-22', '2018-10-22'),
(8, 176, 6, 'PowerWalk', 'Churchillplein 10, Den Haag, Nederland', '0.00', 'Free', '1543224732_813x250 Basel park running.jpg', 'The PowerWalk serves as a great way to go outside and connect with others. The pace is only slightly faster than normal so you can comfortably join even in your business wear (flat shoes are preferred).', 70, 168, 59, 'http://www.clubmondain.com/Home/store-details/MTY4', 0, 0, 'Active', '2018-11-26', '2018-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_energiser_code_analyzer`
--

CREATE TABLE `cmd_energiser_code_analyzer` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `energiser_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_energiser_code_analyzer`
--

INSERT INTO `cmd_energiser_code_analyzer` (`id`, `space_id`, `energiser_id`, `user_id`, `token`, `date`) VALUES
(3, 3, 4, 88, 'E_181003304', '2018-10-03 12:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_energiser_csv`
--

CREATE TABLE `cmd_energiser_csv` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `energiser_id` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_energiser_csv`
--

INSERT INTO `cmd_energiser_csv` (`id`, `space_id`, `energiser_id`, `token`, `name`, `email`, `phone`) VALUES
(11, 3, NULL, 'E_181003304', 'Marcel Groenewegen', 'marcel@clubmondain.com', '1234567890'),
(12, 3, NULL, 'E_181003304', 'Eva', 'eva.a.jackson@gmail.com', '1234567890'),
(13, 3, NULL, 'E_181003304', 'Ms. S. Stapel', 'judith@clubmondain.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_event`
--

CREATE TABLE `cmd_event` (
  `event_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as User Foreign Key Table Data',
  `user_type` varchar(11) NOT NULL,
  `country_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Country Foreign Key Table Data',
  `city_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as City Foreign Key Table Data',
  `level_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Level Foreign Key Table Data',
  `timezone_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as TimeZone Foreign Key Table Data',
  `event_name` varchar(255) DEFAULT NULL,
  `event_description` text,
  `event_facilities` text,
  `event_free_text` text,
  `event_website_url` varchar(255) DEFAULT NULL,
  `event_date_from` date NOT NULL DEFAULT '0000-00-00',
  `event_date_to` date NOT NULL DEFAULT '0000-00-00',
  `event_banner` varchar(255) DEFAULT NULL,
  `event_adress` varchar(255) DEFAULT NULL,
  `event_latitude` float NOT NULL,
  `event_longitute` float NOT NULL DEFAULT '0',
  `event_facebook_link` varchar(255) DEFAULT NULL,
  `event_twitter_link` varchar(255) DEFAULT NULL,
  `event_instagram_link` varchar(255) DEFAULT NULL,
  `event_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_event`
--

INSERT INTO `cmd_event` (`event_id`, `user_id`, `user_type`, `country_id`, `city_id`, `level_id`, `timezone_id`, `event_name`, `event_description`, `event_facilities`, `event_free_text`, `event_website_url`, `event_date_from`, `event_date_to`, `event_banner`, `event_adress`, `event_latitude`, `event_longitute`, `event_facebook_link`, `event_twitter_link`, `event_instagram_link`, `event_status`, `create_date`, `update_date`) VALUES
(54, 88, 'M', 70, 35, 0, 15, 'Barcelona Yoga Conference', 'The BYC is a yogic celebration open to people of all ages and procedures with or without experience in the world of yoga. A meeting organized from the heart, with yoga teachers and musical artists from around the world creating a platform where you can learn, experiment, discover and transform.', 'One of Europe’s largest Yoga Conferences\r\n5 full days of Yoga, Music and Dance\r\nOver 1200 vibrant participants from the 5 Continents\r\nFree activities every day all day\r\n20 Yoga styles\r\n60 teachers & artists internationally recognized\r\n108 Scholarships\r\n40 Stands\r\n100 Volunteers\r\n15 Translators / 10 Bloggers \r\nBYC Kids\r\nLife kirtans in the heart of the Stands area', ' ', 'http://www.barcelonayogaconference.cat', '2018-07-23', '2018-07-23', '5453d3b1d9aef0ce6f6b624209f3d5b8.jpg', '08034 Barcelona, Spanje', 0, 0, NULL, NULL, NULL, 'Active', '2018-01-03', '2018-01-12'),
(55, 88, 'M', 79, 6, 0, 14, 'Virgin Money London Marathon 23 April 2018', '42,2 kilometers through London\'s legendary streets makes this marathon world\'s second biggest.', 'Registration\r\nAccomodation\r\nFirst Aid', '  ', 'http://www.virginmoneylondonmarathon.com/en-gb/', '2018-04-23', '2018-04-23', '1519121296_VMLM-2018.png', 'Londen, Verenigd Koninkrijk', 0, 0, NULL, NULL, NULL, 'Active', '2018-01-16', '2018-01-16'),
(65, 118, 'C', 168, 3, 0, 14, 'Ekiden Run Amsterdam', 'An Ekiden is a traditional Japanese running tradition. Six team members run the marathon in relay form and hand eachother the sash over the distances of 5 km, 10 km, 5 km, 10 km, 5 km and 7.2 km. \r\n\r\nThe teams battle for the open Amsterdam Championships. There is competition for the Open Amsterdam Championship in five different categories, namely \'Companies\', \'Sports associations\', \'Schools\', \'Friend teams\' and \'Athletics Union competition teams\'.', ' ', '', 'http://www.ekidenrunamsterdam.nl', '2018-06-17', '2018-06-17', '1524561280_logo.jpg', 'Amsterdam, Amstelpark, Amsterdam, Nederland', 52.331, 4.89346, NULL, NULL, NULL, 'Active', '2018-04-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_event_image`
--

CREATE TABLE `cmd_event_image` (
  `event_image_id` int(11) NOT NULL COMMENT 'This Is Relation Table Of Event',
  `event_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Event Foreign Key Table Data',
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_event_image`
--

INSERT INTO `cmd_event_image` (`event_image_id`, `event_id`, `image_url`) VALUES
(7, 11, '1493391579_Chas (1).jpg'),
(8, 12, ''),
(32, 37, '1519122788_BMW marathon Oslo.png'),
(41, 46, '1502829731_midnatt loop .jpg'),
(50, 54, '1514972805_byc.jpg'),
(51, 55, '1519121296_VMLM-2018.png'),
(52, 56, '1519119674_zurich marato barcelona 11 March 2018.jpg'),
(53, 57, '1519121174_Schneider ELectric marathon paris 08 April 2018.jpg'),
(54, 58, '1519119375_NN Marathon Rotterdam April 2018.jpg'),
(55, 59, '1519122217_Urbantrails series.png'),
(56, 60, '1519122429_Urbantrails series.png'),
(57, 61, '1521564443_Brussels Marathon.png'),
(58, 62, '1521638596_Marathon Amsterdam 2018.jpg'),
(61, 65, '1524561280_Naamloos.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_field_permision`
--

CREATE TABLE `cmd_field_permision` (
  `field_permision_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `field_permision_name` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_field_permision`
--

INSERT INTO `cmd_field_permision` (`field_permision_id`, `user_id`, `field_permision_name`, `status`, `create_date`) VALUES
(3, 36, 'city', 'Active', '2017-05-27'),
(4, 71, 'member_company_name', 'Active', '2017-06-05'),
(5, 71, 'city', 'Active', '2017-06-05'),
(6, 71, 'member_company_name', 'Active', '2017-06-05'),
(7, 71, 'city', 'Active', '2017-06-05'),
(8, 71, 'member_function_title', 'Active', '2017-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_frontend_settings`
--

CREATE TABLE `cmd_frontend_settings` (
  `cmd_settings_meta` int(11) NOT NULL COMMENT 'This Settings is Only Belong To Frontend View ',
  `meta_key` varchar(64) NOT NULL,
  `meta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_frontend_settings`
--

INSERT INTO `cmd_frontend_settings` (`cmd_settings_meta`, `meta_key`, `meta_value`) VALUES
(1, 'php_date_format', 'd/m/Y'),
(2, 'js_date_format', 'dd/mm/yyyy');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_invitespace`
--

CREATE TABLE `cmd_invitespace` (
  `business_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as User Foreign Key Table Data',
  `country_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as Country Foreign Key Table Data',
  `city_id` int(20) NOT NULL DEFAULT '0' COMMENT 'This Field Will Reffer as City Foreign Key Table Data',
  `business_name` varchar(255) DEFAULT NULL,
  `business_description` text,
  `business_website_url` varchar(255) DEFAULT NULL,
  `business_street` varchar(255) DEFAULT NULL,
  `business_latitude` float NOT NULL DEFAULT '0',
  `business_longitute` float NOT NULL DEFAULT '0',
  `business_postal_code` varchar(100) DEFAULT NULL,
  `business_image` varchar(255) DEFAULT NULL,
  `business_banner_image` varchar(255) NOT NULL,
  `business_facebook_link` varchar(255) DEFAULT NULL,
  `business_twitter_link` varchar(255) DEFAULT NULL,
  `business_instagram_link` varchar(255) DEFAULT NULL,
  `business_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `invite_type` int(11) NOT NULL COMMENT '1| Public, 2| Private',
  `is_csv_uploaded` int(11) NOT NULL DEFAULT '0',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_invitespace`
--

INSERT INTO `cmd_invitespace` (`business_id`, `user_id`, `country_id`, `city_id`, `business_name`, `business_description`, `business_website_url`, `business_street`, `business_latitude`, `business_longitute`, `business_postal_code`, `business_image`, `business_banner_image`, `business_facebook_link`, `business_twitter_link`, `business_instagram_link`, `business_status`, `invite_type`, `is_csv_uploaded`, `create_date`, `update_date`) VALUES
(3, 118, 168, 66, 'Healthy Roadshow', 'DSM FIT offers you the opportunity to expand your knowledge and learn from specialized experts we have invited to support you in your overall wellbeing. ', 'http://www.dsm.com', 'Urmonderbaan 22, Geleen, Nederland', 0, 0, '6167RD', '1538561823_DSM.jpg', '1538561823_DSM.jpg', NULL, NULL, NULL, 'Active', 2, 1, '2018-10-03', '0000-00-00'),
(4, 204, 168, 59, '17th - 20th October -  One Young World Summit', 'On 17 October, young leaders from 196 countries will descend on The Hague for the One Young World Summit 2018.\r\nThe annual One Young World Summit brings together the most valuable young talent from global and national companies, NGOs, universities and other forward-thinking organisations. Delegates meet and make lasting connections with peers from almost every industry, sector and country. No youth led movement outside of the Olympic Games represents as many nationalities as the One Young World Summit.', 'http://www.oneyoungworld.com/attend-summit-2018?gclid=EAIaIQobChMIh_vT0vrz3QIVzOF3Ch2z8Q7oEAAYASAAEgICv_D_BwE', 'Churchillplein 10, Den Haag, Nederland', 0, 0, '2517JW', '1538902997_palace garden_denhaag.com.jpeg', '1538902997_CM Banner size 900x350 WF images - Zaal - Expo - Buitenkant.png', NULL, NULL, NULL, 'Active', 1, 0, '2018-10-07', '2018-10-14'),
(5, 176, 168, 59, 'THE 49TH UNION WORLD CONFERENCE ON LUNG HEALTH', 'The Union World Conference on Lung Health is the world’s largest gathering of clinicians and public health workers, health programme managers, policymakers, researchers and advocates working to end the suffering caused by lung disease, with a focus specifically on the challenges faced by low-and lower-middle income populations. Of the 10 million people who die each year from lung diseases, some 80 percent live in these resource-limited settings.\r\n\r\nOrganising international conferences on TB and related subjects has been a core activity of The Union since its founding in 1920.', 'http://www.clubmondain.com/Home/profile-view/MTc2', 'Churchillplein 10, Den Haag, Nederland', 0, 0, '2517 JW', '1540220172_Union logo.png', '1540220172_Union logo.png', NULL, NULL, NULL, 'Active', 1, 0, '2018-10-22', '2018-10-22'),
(6, 176, 168, 59, 'IAPCO Borrel', 'World Forum the Hague and Congress by Design welcome attendees of the IAPCO drinks in the Hague. As the theme is Vitality you will also experience the Vitality in Congress services by Club Mondain. The service includes an Energizer and healthy refreshment. No need to bring any sportswear, flat shoes are preferred. Sign-up on the spot at the venue or register online.', 'http://www.clubmondain.com/Home/store-details/MTY4', 'Churchillplein 10, Den Haag, Nederland', 0, 0, '2517 JW', '1543226230_Iapco banner.jpg', '1543226230_Iapco banner.jpg', NULL, NULL, NULL, 'Active', 1, 0, '2018-11-26', '2018-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_joining_us_energizer`
--

CREATE TABLE `cmd_joining_us_energizer` (
  `joining_class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_class_id` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_joining_us_energizer`
--

INSERT INTO `cmd_joining_us_energizer` (`joining_class_id`, `user_id`, `trainer_class_id`, `create_date`) VALUES
(2, 118, 1, '0000-00-00'),
(3, 212, 1, '0000-00-00'),
(4, 88, 4, '0000-00-00'),
(5, 88, 5, '0000-00-00'),
(7, 89, 5, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_meet_up`
--

CREATE TABLE `cmd_meet_up` (
  `meet_up_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `meet_up_name` varchar(255) DEFAULT NULL,
  `meet_up_image` varchar(255) DEFAULT NULL,
  `meet_up_description` text,
  `city_id` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT '0',
  `meetup_date` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cmd_meet_up_comments`
--

CREATE TABLE `cmd_meet_up_comments` (
  `meet_up_comments_id` int(11) NOT NULL,
  `meet_up_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `comments` text,
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cmd_membership`
--

CREATE TABLE `cmd_membership` (
  `membership_id` int(11) NOT NULL,
  `membership_category_id` varchar(255) DEFAULT NULL,
  `membership_name` varchar(255) DEFAULT NULL,
  `membership_type` varchar(100) DEFAULT NULL,
  `membership_price` int(11) DEFAULT '0',
  `membership_start_date` date DEFAULT '0000-00-00',
  `membership_end_date` date DEFAULT '0000-00-00',
  `membership_description` text,
  `membership_status` varchar(255) DEFAULT NULL,
  `membership_date_reg` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_membership`
--

INSERT INTO `cmd_membership` (`membership_id`, `membership_category_id`, `membership_name`, `membership_type`, `membership_price`, `membership_start_date`, `membership_end_date`, `membership_description`, `membership_status`, `membership_date_reg`) VALUES
(1, 'Business_Traveler', 'Travel & Work made healthy ', 'FREE', 0, '2018-01-01', '2030-12-31', '<p>Travel & Work made healthy </p>\r\n\r\n<p><strong>What you get with this membership...</strong></p>\r\n\r\n<ol>\r\n <li>Find your favorite healthy Events & Spaces </li>\r\n <li>Search based on a city or category</li>\r\n <li>Select and book classes directly at a Space of your choice</li>\r\n <li>Write and read reviews of Events & Space</li>\r\n <li>Easily share them with friends via your socials</li>\r\n <li>Add your own favorite Spaces to the platform</li>\r\n <li>Request new cities to be added to the platform</li>\r\n <li>Save your favorites to your personal dashboard</li>\r\n <li>Create Meetups to connect easily to other Digital Nomads</li>\r\n <li>Manage all your personal information on your dashboard</li>\r\n <li>Explore the shop for Club Mondain merchandise</li>\r\n</ol>\r\n', 'Active', '2017-03-27'),
(2, 'Company', 'Company - Start', 'FREE', 0, '2017-01-01', '2030-12-31', '<p>Register your Company for FREE for 30 days.</p>\r\n\r\n<p><strong>Create a profile with your basic information:</strong></p>\r\n\r\n<ol>\r\n <li>Name</li>\r\n <li>Address</li>\r\n <li>Website</li>\r\n <li>Description (max 120 words)</li>\r\n <li>Upload 1 photo</li>\r\n</ol>\r\n', 'Active', '2017-03-27'),
(3, 'Personal_Trainer', 'Trainer/Coach - Start', 'FREE', 0, '2017-01-01', '2030-12-31', '<p>Register yourself for FREE</p>\r\n\r\n<p><strong>Create your profile with basic information:</strong></p>\r\n\r\n<ol>\r\n <li>Name</li>\r\n <li>Address</li>\r\n <li>Website</li>\r\n <li>Description (max 120 words)</li>\r\n <li>Add events</li>\r\n <li>Upload 1 photo</li>\r\n</ol>\r\n', 'Inactive', '2017-03-27'),
(4, 'Personal_Trainer', 'Trainer/Coach - Extensive', 'PAID', 20, '2016-12-31', '2017-12-31', '<p>Register here</p>\r\n\r\n<p><strong>Create your profile with your basic information, PLUS:</strong></p>\r\n\r\n<ol>\r\n <li>Add a longer description (max 450 words),</li>\r\n <li>Upload 3 photos</li>\r\n <li>Add Classes and Service</li>\r\n <li>Invite clients to join events</li>\r\n <li>Reply on their reviews</li>\r\n</ol>\r\n', 'Inactive', '2017-03-27'),
(5, 'Company', 'Company - Extensive', 'PAID', 20, '2017-01-01', '2017-12-31', '<p>Register your Company</p>\r\n\r\n<p><strong>Create a profile with your basic information, PLUS:</strong></p>\r\n\r\n<ol>\r\n <li>Add a longer description (max 450 words)</li>\r\n <li>Upload 3 photos</li>\r\n <li>Add Classes and Service for your clients</li>\r\n <li>Invite clients to join events</li>\r\n <li>Reply on their reviews</li>\r\n</ol>\r\n', 'Inactive', '2017-03-27'),
(6, 'Business_Traveler', 'Frequent Business Traveler - Lifestyle ', 'PAID', 97, '2018-01-01', '2018-06-30', '<p>Frequent Business Traveler</p>\r\n\r\n<p><strong>&#39;Digital Nomad&#39; membership PLUS...</strong></p>\r\n\r\n<ol>\r\n <li>Individual healthy suggestions that match your travel schedule, based on your unique profile and preferences</li>\r\n <li>Personal Travel Coaching every week, from a certified Club Mondain Coach, to create or upgrade your healthy lifestyle wherever you are</li>\r\n <li>Creating new habits to stay fit during your travel that work on the long term! <br>\r\n <br>\r\n This is a per month membership and is based on a membership for European destinations.</li>\r\n</ol>\r\n', 'Inactive', '2017-04-03'),
(7, 'Business_Traveler', 'Airline Crew - Easy Connections', 'PAID', 45, '2018-01-01', '2018-03-31', '<p>Airline Crew - Easy Connections</p>\r\n\r\n<p><strong>&#39;Digital Nomad&#39; membership PLUS...</strong></p>\r\n\r\n<ol>\r\n <li>Individual healthy suggestions that match your travel schedule, based on your unique profile and preferences,</li>\r\n <li>10 minute bi-weekly Check-In Call with a certified Club Mondain Coach to touch base and experience a sound mind in a sound body.<br>\r\n <br>\r\n This  is a per-month membership and based on a membership for European destinations.</li>\r\n</ol>\r\n', 'Inactive', '2017-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_opening_hour`
--

CREATE TABLE `cmd_opening_hour` (
  `opening_hour_id` int(11) NOT NULL,
  `company_business_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Relation to Company Registration and Business Creation',
  `opening_hour_day` varchar(255) NOT NULL DEFAULT '0',
  `opening_hour_from` varchar(255) DEFAULT NULL,
  `opening_hour_to` varchar(255) DEFAULT NULL,
  `opening_hour_close` int(11) NOT NULL DEFAULT '0',
  `opening_hour_type` tinyint(11) DEFAULT '0' COMMENT 'Company Registration  && Business Creation Type',
  `opening_hour_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_opening_hour`
--

INSERT INTO `cmd_opening_hour` (`opening_hour_id`, `company_business_id`, `opening_hour_day`, `opening_hour_from`, `opening_hour_to`, `opening_hour_close`, `opening_hour_type`, `opening_hour_status`) VALUES
(50, 7, 'Monday', '10-0-AM', '9-15-PM', 0, 1, 'Active'),
(51, 7, 'Tuesday', '3-0-AM', '3-0-PM', 0, 1, 'Active'),
(52, 7, 'Wednesday', '3-0-AM', '3-0-PM', 0, 1, 'Active'),
(53, 7, 'Thursday', '0', '0', 1, 1, 'Active'),
(54, 7, 'Friday', '0', '0', 1, 1, 'Active'),
(55, 7, 'Saturday', '4-0-AM', '3-0-PM', 0, 1, 'Active'),
(56, 7, 'Sunday', '9-0-AM', '3-0-PM', 0, 1, 'Active'),
(57, 8, 'Monday', '3-5-AM', '4-5-PM', 0, 1, 'Active'),
(58, 8, 'Tuesday', '0', '0', 1, 1, 'Active'),
(59, 8, 'Wednesday', '0', '0', 1, 1, 'Active'),
(60, 8, 'Thursday', '0', '0', 1, 1, 'Active'),
(61, 8, 'Friday', '0', '0', 1, 1, 'Active'),
(62, 8, 'Saturday', '3-18-AM', '5-15-PM', 0, 1, 'Active'),
(63, 8, 'Sunday', '12-17-AM', '11-15-AM', 0, 1, 'Active'),
(78, 54, 'Monday', '0', '0', 1, 0, 'Active'),
(79, 54, 'Tuesday', '0', '0', 1, 0, 'Active'),
(80, 54, 'Thursday', '0', '0', 1, 0, 'Active'),
(81, 54, 'Wednesday', '0', '0', 1, 0, 'Active'),
(82, 54, 'Friday', '0', '0', 1, 0, 'Active'),
(83, 54, 'Suterday', '0', '0', 1, 0, 'Active'),
(84, 54, 'Sunday', '8-17-PM', '11-18-AM', 0, 0, 'Active'),
(85, 11, 'Monday', '1-30-PM', '11-0-PM', 0, 1, 'Active'),
(86, 11, 'Tuesday', '0', '0', 0, 1, 'Active'),
(87, 11, 'Wednesday', '0', '0', 0, 1, 'Active'),
(88, 11, 'Thursday', '0', '0', 0, 1, 'Active'),
(89, 11, 'Friday', '12-15-PM', '7-14-PM', 0, 1, 'Active'),
(90, 11, 'Saturday', '0', '0', 1, 1, 'Active'),
(91, 11, 'Sunday', '0', '0', 1, 1, 'Active'),
(92, 12, 'Monday', '0', '0', 0, 1, 'Active'),
(93, 12, 'Tuesday', '0', '0', 0, 1, 'Active'),
(94, 12, 'Wednesday', '0', '0', 0, 1, 'Active'),
(95, 12, 'Thursday', '0', '0', 0, 1, 'Active'),
(96, 12, 'Friday', '0', '0', 0, 1, 'Active'),
(97, 12, 'Saturday', '0', '0', 0, 1, 'Active'),
(98, 12, 'Sunday', '0', '0', 0, 1, 'Active'),
(106, 65, 'Monday', '3-2-AM', '3-3-PM', 0, 0, 'Active'),
(107, 65, 'Tuesday', '0', '0', 1, 0, 'Active'),
(108, 65, 'Thursday', '0', '0', 1, 0, 'Active'),
(109, 65, 'Wednesday', '0', '0', 1, 0, 'Active'),
(110, 65, 'Friday', '0', '0', 1, 0, 'Active'),
(111, 65, 'Suterday', '0', '0', 1, 0, 'Active'),
(112, 65, 'Sunday', '0', '0', 1, 0, 'Active'),
(113, 66, 'Monday', '12-17-AM', '11-16-PM', 0, 0, 'Active'),
(114, 66, 'Tuesday', '0', '0', 1, 0, 'Active'),
(115, 66, 'Thursday', '0', '0', 1, 0, 'Active'),
(116, 66, 'Wednesday', '0', '0', 1, 0, 'Active'),
(117, 66, 'Friday', '0', '0', 1, 0, 'Active'),
(118, 66, 'Suterday', '0', '0', 1, 0, 'Active'),
(119, 66, 'Sunday', '0', '0', 1, 0, 'Active'),
(120, 14, 'Monday', '4-15-AM', '5-15-PM', 0, 1, 'Active'),
(121, 14, 'Tuesday', '0', '0', 1, 1, 'Active'),
(122, 14, 'Wednesday', '0', '0', 1, 1, 'Active'),
(123, 14, 'Thursday', '0', '0', 1, 1, 'Active'),
(124, 14, 'Friday', '0', '0', 1, 1, 'Active'),
(125, 14, 'Saturday', '0', '0', 1, 1, 'Active'),
(126, 14, 'Sunday', '5-45-PM', '4-30-PM', 0, 1, 'Active'),
(127, 17, 'Monday', '0', '0', 0, 1, 'Active'),
(128, 17, 'Tuesday', '0', '0', 0, 1, 'Active'),
(129, 17, 'Wednesday', '0', '0', 0, 1, 'Active'),
(130, 17, 'Thursday', '0', '0', 0, 1, 'Active'),
(131, 17, 'Friday', '0', '0', 0, 1, 'Active'),
(132, 17, 'Saturday', '0', '0', 0, 1, 'Active'),
(133, 17, 'Sunday', '0', '0', 0, 1, 'Active'),
(134, 9, 'Monday', '3-15-AM', '3-15-PM', 0, 2, 'Active'),
(135, 9, 'Tuesday', '0', '0', 1, 2, 'Active'),
(136, 9, 'Wednesday', '0', '0', 1, 2, 'Active'),
(137, 9, 'Thursday', '0', '0', 1, 2, 'Active'),
(138, 9, 'Friday', '0', '0', 1, 2, 'Active'),
(139, 9, 'Saturday', '0', '0', 1, 2, 'Active'),
(140, 9, 'Sunday', '0', '0', 1, 2, 'Active'),
(141, 10, 'Monday', '3-15-AM', '3-15-PM', 0, 2, 'Active'),
(142, 10, 'Tuesday', '0', '0', 1, 2, 'Active'),
(143, 10, 'Wednesday', '0', '0', 1, 2, 'Active'),
(144, 10, 'Thursday', '0', '0', 1, 2, 'Active'),
(145, 10, 'Friday', '0', '0', 1, 2, 'Active'),
(146, 10, 'Saturday', '0', '0', 1, 2, 'Active'),
(147, 10, 'Sunday', '0', '0', 1, 2, 'Active'),
(148, 19, 'Monday', '1-30-PM', '4-30-PM', 0, 1, 'Active'),
(149, 19, 'Tuesday', '0', '0', 1, 1, 'Active'),
(150, 19, 'Wednesday', '0', '0', 1, 1, 'Active'),
(151, 19, 'Thursday', '4-30-PM', '6-15-PM', 0, 1, 'Active'),
(152, 19, 'Friday', '0', '0', 0, 1, 'Active'),
(153, 19, 'Saturday', '0', '0', 0, 1, 'Active'),
(154, 19, 'Sunday', '0', '0', 0, 1, 'Active'),
(155, 11, 'Monday', '0', '0', 1, 2, 'Active'),
(156, 11, 'Tuesday', '0', '0', 1, 2, 'Active'),
(157, 11, 'Wednesday', '0', '0', 1, 2, 'Active'),
(158, 11, 'Thursday', '0', '0', 1, 2, 'Active'),
(159, 11, 'Friday', '0', '0', 1, 2, 'Active'),
(160, 11, 'Saturday', '0', '0', 1, 2, 'Active'),
(161, 11, 'Sunday', '0', '0', 1, 2, 'Active'),
(162, 12, 'Monday', '1-0-AM', '4-15-PM', 0, 2, 'Active'),
(163, 12, 'Tuesday', '0', '0', 1, 2, 'Active'),
(164, 12, 'Wednesday', '0', '0', 1, 2, 'Active'),
(165, 12, 'Thursday', '0', '0', 1, 2, 'Active'),
(166, 12, 'Friday', '0', '0', 1, 2, 'Active'),
(167, 12, 'Saturday', '0', '0', 1, 2, 'Active'),
(168, 12, 'Sunday', '0', '0', 1, 2, 'Active'),
(169, 13, 'Monday', '0', '0', 1, 2, 'Active'),
(170, 13, 'Tuesday', '0', '0', 1, 2, 'Active'),
(171, 13, 'Wednesday', '0', '0', 1, 2, 'Active'),
(172, 13, 'Thursday', '0', '0', 1, 2, 'Active'),
(173, 13, 'Friday', '0', '0', 1, 2, 'Active'),
(174, 13, 'Saturday', '0', '0', 1, 2, 'Active'),
(175, 13, 'Sunday', '0', '0', 1, 2, 'Active'),
(176, 29, 'Monday', '11-30-AM', '3-0-PM', 0, 1, 'Active'),
(177, 29, 'Tuesday', '11-30-AM', '3-0-PM', 0, 1, 'Active'),
(178, 29, 'Wednesday', '11-30-AM', '3-0-PM', 0, 1, 'Active'),
(179, 29, 'Thursday', '11-30-AM', '3-0-PM', 0, 1, 'Active'),
(180, 29, 'Friday', '11-30-AM', '3-0-PM', 0, 1, 'Active'),
(181, 29, 'Saturday', '0', '0', 1, 1, 'Active'),
(182, 29, 'Sunday', '0', '0', 1, 1, 'Active'),
(183, 14, 'Monday', '6-0-AM', '7-0-AM', 0, 2, 'Active'),
(184, 14, 'Tuesday', '0', '0', 0, 2, 'Active'),
(185, 14, 'Wednesday', '0', '0', 0, 2, 'Active'),
(186, 14, 'Thursday', '0', '0', 0, 2, 'Active'),
(187, 14, 'Friday', '0', '0', 0, 2, 'Active'),
(188, 14, 'Saturday', '0', '0', 0, 2, 'Active'),
(189, 14, 'Sunday', '0', '0', 0, 2, 'Active'),
(197, 41, 'Monday', '1-30-AM', '12-0-PM', 0, 1, 'Active'),
(198, 41, 'Tuesday', '1-30-AM', '12-0-AM', 0, 1, 'Active'),
(199, 41, 'Wednesday', '1-30-AM', '12-0-PM', 0, 1, 'Active'),
(200, 41, 'Thursday', '2-0-AM', '9-45-PM', 0, 1, 'Active'),
(201, 41, 'Friday', '0', '0', 1, 1, 'Active'),
(202, 41, 'Saturday', '0', '0', 1, 1, 'Active'),
(203, 41, 'Sunday', '0', '0', 1, 1, 'Active'),
(204, 42, 'Monday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(205, 42, 'Tuesday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(206, 42, 'Wednesday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(207, 42, 'Thursday', '10-0-AM', '9-0-PM', 0, 1, 'Active'),
(208, 42, 'Friday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(209, 42, 'Saturday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(210, 42, 'Sunday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(211, 43, 'Monday', '5-0-AM', '6-0-PM', 0, 1, 'Active'),
(212, 43, 'Tuesday', '5-0-AM', '2-0-PM', 0, 1, 'Active'),
(213, 43, 'Wednesday', '5-0-AM', '5-0-PM', 0, 1, 'Active'),
(214, 43, 'Thursday', '5-0-AM', '5-0-PM', 0, 1, 'Active'),
(215, 43, 'Friday', '5-0-AM', '6-0-PM', 0, 1, 'Active'),
(216, 43, 'Saturday', '7-0-AM', '7-0-PM', 0, 1, 'Active'),
(217, 43, 'Sunday', '11-0-AM', '7-0-PM', 0, 1, 'Active'),
(218, 44, 'Monday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(219, 44, 'Tuesday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(220, 44, 'Wednesday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(221, 44, 'Thursday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(222, 44, 'Friday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(223, 44, 'Saturday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(224, 44, 'Sunday', '11-0-AM', '9-0-PM', 0, 1, 'Active'),
(225, 45, 'Monday', '0', '0', 1, 1, 'Active'),
(226, 45, 'Tuesday', '0', '0', 1, 1, 'Active'),
(227, 45, 'Wednesday', '0', '0', 1, 1, 'Active'),
(228, 45, 'Thursday', '0', '0', 1, 1, 'Active'),
(229, 45, 'Friday', '0', '0', 1, 1, 'Active'),
(230, 45, 'Saturday', '0', '0', 1, 1, 'Active'),
(231, 45, 'Sunday', '0', '0', 1, 1, 'Active'),
(232, 55, 'Monday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(233, 55, 'Tuesday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(234, 55, 'Wednesday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(235, 55, 'Thursday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(236, 55, 'Friday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(237, 55, 'Saturday', '6-0-AM', '11-45-PM', 0, 1, 'Active'),
(238, 55, 'Sunday', '8-0-AM', '11-45-PM', 0, 1, 'Active'),
(239, 57, 'Monday', '8-0-PM', '9-0-PM', 0, 1, 'Active'),
(240, 57, 'Tuesday', '7-0-PM', '8-0-PM', 0, 1, 'Active'),
(241, 57, 'Wednesday', '8-0-PM', '9-0-PM', 0, 1, 'Active'),
(242, 57, 'Thursday', '8-0-PM', '9-0-PM', 0, 1, 'Active'),
(243, 57, 'Friday', '0', '0', 1, 1, 'Active'),
(244, 57, 'Saturday', '0', '0', 1, 1, 'Active'),
(245, 57, 'Sunday', '0', '0', 1, 1, 'Active'),
(246, 59, 'Monday', '6-0-AM', '8-0-PM', 0, 1, 'Active'),
(247, 59, 'Tuesday', '6-0-AM', '8-0-PM', 0, 1, 'Active'),
(248, 59, 'Wednesday', '6-0-AM', '10-0-PM', 0, 1, 'Active'),
(249, 59, 'Thursday', '6-0-AM', '8-0-PM', 0, 1, 'Active'),
(250, 59, 'Friday', '6-0-AM', '10-0-PM', 0, 1, 'Active'),
(251, 59, 'Saturday', '6-0-AM', '10-0-PM', 0, 1, 'Active'),
(252, 59, 'Sunday', '6-0-AM', '10-0-PM', 0, 1, 'Active'),
(253, 61, 'Monday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(254, 61, 'Tuesday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(255, 61, 'Wednesday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(256, 61, 'Thursday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(257, 61, 'Friday', '7-0-AM', '11-30-PM', 0, 1, 'Active'),
(258, 61, 'Saturday', '8-0-AM', '11-30-PM', 0, 1, 'Active'),
(259, 61, 'Sunday', '9-0-AM', '11-0-PM', 0, 1, 'Active'),
(260, 62, 'Monday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(261, 62, 'Tuesday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(262, 62, 'Wednesday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(263, 62, 'Thursday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(264, 62, 'Friday', '3-15-PM', '12-0-AM', 0, 1, 'Active'),
(265, 62, 'Saturday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(266, 62, 'Sunday', '3-30-PM', '12-0-AM', 0, 1, 'Active'),
(267, 63, 'Monday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(268, 63, 'Tuesday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(269, 63, 'Wednesday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(270, 63, 'Thursday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(271, 63, 'Friday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(272, 63, 'Saturday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(273, 63, 'Sunday', '11-0-AM', '10-0-PM', 0, 1, 'Active'),
(274, 64, 'Monday', '11-0-AM', '11-0-PM', 0, 1, 'Active'),
(275, 64, 'Tuesday', '11-0-AM', '11-0-PM', 0, 1, 'Active'),
(276, 64, 'Wednesday', '11-0-AM', '11-0-PM', 0, 1, 'Active'),
(277, 64, 'Thursday', '12-0-AM', '11-0-PM', 0, 1, 'Active'),
(278, 64, 'Friday', '11-0-AM', '11-0-PM', 0, 1, 'Active'),
(279, 64, 'Saturday', '10-0-AM', '6-0-PM', 0, 1, 'Active'),
(280, 64, 'Sunday', '10-0-AM', '6-0-PM', 0, 1, 'Active'),
(281, 65, 'Monday', '8-0-AM', '7-0-PM', 0, 1, 'Active'),
(282, 65, 'Tuesday', '8-0-AM', '7-0-PM', 0, 1, 'Active'),
(283, 65, 'Wednesday', '8-0-AM', '7-0-PM', 0, 1, 'Active'),
(284, 65, 'Thursday', '8-0-AM', '7-0-PM', 0, 1, 'Active'),
(285, 65, 'Friday', '8-0-AM', '7-0-PM', 0, 1, 'Active'),
(286, 65, 'Saturday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(287, 65, 'Sunday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(288, 16, 'Monday', '10-30-AM', '2-30-AM', 0, 2, 'Active'),
(289, 16, 'Tuesday', '0', '0', 1, 2, 'Active'),
(290, 16, 'Wednesday', '0', '0', 1, 2, 'Active'),
(291, 16, 'Thursday', '0', '0', 1, 2, 'Active'),
(292, 16, 'Friday', '0', '0', 1, 2, 'Active'),
(293, 16, 'Saturday', '0', '0', 1, 2, 'Active'),
(294, 16, 'Sunday', '0', '0', 1, 2, 'Active'),
(295, 69, 'Monday', '7-0-AM', '1-30-AM', 0, 1, 'Active'),
(296, 69, 'Tuesday', '7-0-AM', '1-30-AM', 0, 1, 'Active'),
(297, 69, 'Wednesday', '7-0-AM', '1-30-AM', 0, 1, 'Active'),
(298, 69, 'Thursday', '7-0-AM', '1-30-AM', 0, 1, 'Active'),
(299, 69, 'Friday', '7-0-AM', '2-30-AM', 0, 1, 'Active'),
(300, 69, 'Saturday', '10-0-AM', '2-30-AM', 0, 1, 'Active'),
(301, 69, 'Sunday', '10-0-AM', '1-30-AM', 0, 1, 'Active'),
(302, 70, 'Monday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(303, 70, 'Tuesday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(304, 70, 'Wednesday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(305, 70, 'Thursday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(306, 70, 'Friday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(307, 70, 'Saturday', '9-0-AM', '9-0-PM', 0, 1, 'Active'),
(308, 70, 'Sunday', '9-0-AM', '3-0-PM', 0, 1, 'Active'),
(309, 71, 'Monday', '12-0-PM', '9-0-PM', 0, 1, 'Active'),
(310, 71, 'Tuesday', '12-0-PM', '9-0-PM', 0, 1, 'Active'),
(311, 71, 'Wednesday', '12-0-PM', '9-0-PM', 0, 1, 'Active'),
(312, 71, 'Thursday', '12-0-PM', '9-0-PM', 0, 1, 'Active'),
(313, 71, 'Friday', '12-0-PM', '10-0-PM', 0, 1, 'Active'),
(314, 71, 'Saturday', '12-0-PM', '10-0-PM', 0, 1, 'Active'),
(315, 71, 'Sunday', '12-0-PM', '4-0-PM', 0, 1, 'Active'),
(316, 72, 'Monday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(317, 72, 'Tuesday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(318, 72, 'Wednesday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(319, 72, 'Thursday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(320, 72, 'Friday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(321, 72, 'Saturday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(322, 72, 'Sunday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(323, 73, 'Monday', '0', '0', 1, 1, 'Active'),
(324, 73, 'Tuesday', '1-0-PM', '11-0-PM', 0, 1, 'Active'),
(325, 73, 'Wednesday', '1-0-PM', '11-0-PM', 0, 1, 'Active'),
(326, 73, 'Thursday', '1-0-PM', '11-0-PM', 0, 1, 'Active'),
(327, 73, 'Friday', '1-0-PM', '11-0-PM', 0, 1, 'Active'),
(328, 73, 'Saturday', '1-0-PM', '11-0-PM', 0, 1, 'Active'),
(329, 73, 'Sunday', '1-0-PM', '4-0-PM', 0, 1, 'Active'),
(330, 101, 'Monday', '0', '0', 1, 0, 'Active'),
(331, 101, 'Tuesday', '0', '0', 1, 0, 'Active'),
(332, 101, 'Thursday', '0', '0', 1, 0, 'Active'),
(333, 101, 'Wednesday', '0', '0', 1, 0, 'Active'),
(334, 101, 'Friday', '0', '0', 1, 0, 'Active'),
(335, 101, 'Suterday', '0', '0', 1, 0, 'Active'),
(336, 101, 'Sunday', '0', '0', 1, 0, 'Active'),
(337, 76, 'Monday', '1-15-PM', '2-15-PM', 0, 1, 'Active'),
(338, 76, 'Tuesday', '0', '0', 1, 1, 'Active'),
(339, 76, 'Wednesday', '0', '0', 1, 1, 'Active'),
(340, 76, 'Thursday', '0', '0', 1, 1, 'Active'),
(341, 76, 'Friday', '0', '0', 1, 1, 'Active'),
(342, 76, 'Saturday', '0', '0', 1, 1, 'Active'),
(343, 76, 'Sunday', '0', '0', 1, 1, 'Active'),
(344, 76, 'Monday', '0', '0', 0, 1, 'Active'),
(345, 76, 'Tuesday', '0', '0', 0, 1, 'Active'),
(346, 76, 'Wednesday', '0', '0', 0, 1, 'Active'),
(347, 76, 'Thursday', '0', '0', 0, 1, 'Active'),
(348, 76, 'Friday', '0', '0', 0, 1, 'Active'),
(349, 76, 'Saturday', '0', '0', 0, 1, 'Active'),
(350, 76, 'Sunday', '0', '0', 0, 1, 'Active'),
(351, 77, 'Monday', '8-15-AM', '10-0-PM', 0, 1, 'Active'),
(352, 77, 'Tuesday', '8-15-AM', '10-0-PM', 0, 1, 'Active'),
(353, 77, 'Wednesday', '8-15-AM', '10-0-PM', 0, 1, 'Active'),
(354, 77, 'Thursday', '8-15-AM', '10-30-PM', 0, 1, 'Active'),
(355, 77, 'Friday', '8-15-AM', '10-0-PM', 0, 1, 'Active'),
(356, 77, 'Saturday', '10-0-AM', '2-30-PM', 0, 1, 'Active'),
(357, 77, 'Sunday', '10-0-AM', '10-0-PM', 0, 1, 'Active'),
(358, 89, 'Monday', '0', '0', 0, 1, 'Active'),
(359, 89, 'Tuesday', '0', '0', 0, 1, 'Active'),
(360, 89, 'Wednesday', '0', '0', 0, 1, 'Active'),
(361, 89, 'Thursday', '0', '0', 0, 1, 'Active'),
(362, 89, 'Friday', '0', '0', 0, 1, 'Active'),
(363, 89, 'Saturday', '0', '0', 0, 1, 'Active'),
(364, 89, 'Sunday', '0', '0', 0, 1, 'Active'),
(386, 118, 'Monday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(387, 118, 'Tuesday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(388, 118, 'Wednesday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(389, 118, 'Thursday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(390, 118, 'Friday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(391, 118, 'Saturday', '0', '0', 1, 1, 'Active'),
(392, 118, 'Sunday', '0', '0', 1, 1, 'Active'),
(393, 99, 'Monday', '0', '0', 0, 1, 'Active'),
(394, 99, 'Tuesday', '0', '0', 0, 1, 'Active'),
(395, 99, 'Wednesday', '0', '0', 0, 1, 'Active'),
(396, 99, 'Thursday', '0', '0', 0, 1, 'Active'),
(397, 99, 'Friday', '0', '0', 0, 1, 'Active'),
(398, 99, 'Saturday', '0', '0', 0, 1, 'Active'),
(399, 99, 'Sunday', '0', '0', 0, 1, 'Active'),
(400, 100, 'Monday', '0', '0', 0, 1, 'Active'),
(401, 100, 'Tuesday', '0', '0', 0, 1, 'Active'),
(402, 100, 'Wednesday', '0', '0', 0, 1, 'Active'),
(403, 100, 'Thursday', '0', '0', 0, 1, 'Active'),
(404, 100, 'Friday', '0', '0', 0, 1, 'Active'),
(405, 100, 'Saturday', '0', '0', 0, 1, 'Active'),
(406, 100, 'Sunday', '0', '0', 0, 1, 'Active'),
(407, 101, 'Monday', '0', '0', 0, 1, 'Active'),
(408, 101, 'Tuesday', '0', '0', 0, 1, 'Active'),
(409, 101, 'Wednesday', '0', '0', 0, 1, 'Active'),
(410, 101, 'Thursday', '0', '0', 0, 1, 'Active'),
(411, 101, 'Friday', '0', '0', 0, 1, 'Active'),
(412, 101, 'Saturday', '0', '0', 0, 1, 'Active'),
(413, 101, 'Sunday', '0', '0', 0, 1, 'Active'),
(414, 102, 'Monday', '0', '0', 0, 1, 'Active'),
(415, 102, 'Tuesday', '0', '0', 0, 1, 'Active'),
(416, 102, 'Wednesday', '0', '0', 0, 1, 'Active'),
(417, 102, 'Thursday', '0', '0', 0, 1, 'Active'),
(418, 102, 'Friday', '0', '0', 0, 1, 'Active'),
(419, 102, 'Saturday', '0', '0', 0, 1, 'Active'),
(420, 102, 'Sunday', '0', '0', 0, 1, 'Active'),
(428, 108, 'Monday', '0', '0', 0, 1, 'Active'),
(429, 108, 'Tuesday', '0', '0', 0, 1, 'Active'),
(430, 108, 'Wednesday', '0', '0', 0, 1, 'Active'),
(431, 108, 'Thursday', '0', '0', 0, 1, 'Active'),
(432, 108, 'Friday', '0', '0', 0, 1, 'Active'),
(433, 108, 'Saturday', '0', '0', 0, 1, 'Active'),
(434, 108, 'Sunday', '0', '0', 0, 1, 'Active'),
(435, 124, 'Monday', '0', '0', 0, 1, 'Active'),
(436, 124, 'Tuesday', '0', '0', 0, 1, 'Active'),
(437, 124, 'Wednesday', '0', '0', 0, 1, 'Active'),
(438, 124, 'Thursday', '0', '0', 0, 1, 'Active'),
(439, 124, 'Friday', '0', '0', 0, 1, 'Active'),
(440, 124, 'Saturday', '0', '0', 0, 1, 'Active'),
(441, 124, 'Sunday', '0', '0', 0, 1, 'Active'),
(442, 127, 'Monday', '0', '0', 0, 1, 'Active'),
(443, 127, 'Tuesday', '0', '0', 0, 1, 'Active'),
(444, 127, 'Wednesday', '0', '0', 0, 1, 'Active'),
(445, 127, 'Thursday', '0', '0', 0, 1, 'Active'),
(446, 127, 'Friday', '0', '0', 0, 1, 'Active'),
(447, 127, 'Saturday', '0', '0', 0, 1, 'Active'),
(448, 127, 'Sunday', '0', '0', 0, 1, 'Active'),
(449, 157, 'Monday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(450, 157, 'Tuesday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(451, 157, 'Wednesday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(452, 157, 'Thursday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(453, 157, 'Friday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(454, 157, 'Saturday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(455, 157, 'Sunday', '12-0-AM', '12-0-AM', 0, 1, 'Active'),
(456, 159, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(457, 159, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(458, 159, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(459, 159, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(460, 159, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(461, 159, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(462, 159, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(463, 128, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(464, 128, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(465, 128, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(466, 128, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(467, 128, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(468, 128, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(469, 128, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(470, 129, 'Monday', '11-0-AM', '1-0-AM', 0, 1, 'Active'),
(471, 129, 'Tuesday', '11-0-AM', '1-0-AM', 0, 1, 'Active'),
(472, 129, 'Wednesday', '11-0-AM', '2-0-AM', 0, 1, 'Active'),
(473, 129, 'Thursday', '11-0-AM', '2-0-AM', 0, 1, 'Active'),
(474, 129, 'Friday', '11-0-AM', '3-0-AM', 0, 1, 'Active'),
(475, 129, 'Saturday', '11-0-AM', '3-0-AM', 0, 1, 'Active'),
(476, 129, 'Sunday', '11-0-AM', '1-0-AM', 0, 1, 'Active'),
(477, 130, 'Monday', '0', '0', 0, 1, 'Active'),
(478, 130, 'Tuesday', '0', '0', 0, 1, 'Active'),
(479, 130, 'Wednesday', '0', '0', 0, 1, 'Active'),
(480, 130, 'Thursday', '0', '0', 0, 1, 'Active'),
(481, 130, 'Friday', '0', '0', 0, 1, 'Active'),
(482, 130, 'Saturday', '0', '0', 0, 1, 'Active'),
(483, 130, 'Sunday', '0', '0', 0, 1, 'Active'),
(491, 131, 'Monday', '0', '0', 1, 1, 'Active'),
(492, 131, 'Tuesday', '12-0-AM', '8-0-PM', 0, 1, 'Active'),
(493, 131, 'Wednesday', '12-0-AM', '8-0-PM', 0, 1, 'Active'),
(494, 131, 'Thursday', '12-0-AM', '8-0-PM', 0, 1, 'Active'),
(495, 131, 'Friday', '12-0-AM', '8-0-PM', 0, 1, 'Active'),
(496, 131, 'Saturday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(497, 131, 'Sunday', '10-0-AM', '8-0-PM', 0, 1, 'Active'),
(498, 132, 'Monday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(499, 132, 'Tuesday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(500, 132, 'Wednesday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(501, 132, 'Thursday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(502, 132, 'Friday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(503, 132, 'Saturday', '8-0-AM', '9-0-PM', 0, 1, 'Active'),
(504, 132, 'Sunday', '8-0-AM', '9-0-PM', 0, 1, 'Active'),
(505, 133, 'Monday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(506, 133, 'Tuesday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(507, 133, 'Wednesday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(508, 133, 'Thursday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(509, 133, 'Friday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(510, 133, 'Saturday', '6-30-PM', '10-0-PM', 0, 1, 'Active'),
(511, 133, 'Sunday', '0', '0', 1, 1, 'Active'),
(512, 134, 'Monday', '0', '0', 1, 1, 'Active'),
(513, 134, 'Tuesday', '0', '0', 1, 1, 'Active'),
(514, 134, 'Wednesday', '0', '0', 1, 1, 'Active'),
(515, 134, 'Thursday', '0', '0', 1, 1, 'Active'),
(516, 134, 'Friday', '0', '0', 1, 1, 'Active'),
(517, 134, 'Saturday', '0', '0', 1, 1, 'Active'),
(518, 134, 'Sunday', '0', '0', 1, 1, 'Active'),
(519, 164, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(520, 164, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(521, 164, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(522, 164, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(523, 164, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(524, 164, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(525, 164, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(526, 135, 'Monday', '0', '0', 0, 1, 'Active'),
(527, 135, 'Tuesday', '0', '0', 0, 1, 'Active'),
(528, 135, 'Wednesday', '0', '0', 0, 1, 'Active'),
(529, 135, 'Thursday', '0', '0', 0, 1, 'Active'),
(530, 135, 'Friday', '0', '0', 0, 1, 'Active'),
(531, 135, 'Saturday', '0', '0', 0, 1, 'Active'),
(532, 135, 'Sunday', '0', '0', 0, 1, 'Active'),
(533, 136, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(534, 136, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(535, 136, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(536, 136, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(537, 136, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(538, 136, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(539, 136, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(540, 137, 'Monday', '9-15-AM', '10-0-PM', 0, 1, 'Active'),
(541, 137, 'Tuesday', '9-15-AM', '10-0-PM', 0, 1, 'Active'),
(542, 137, 'Wednesday', '9-15-AM', '10-0-PM', 0, 1, 'Active'),
(543, 137, 'Thursday', '9-15-AM', '10-0-PM', 0, 1, 'Active'),
(544, 137, 'Friday', '9-15-AM', '10-0-PM', 0, 1, 'Active'),
(545, 137, 'Saturday', '10-0-AM', '10-0-PM', 0, 1, 'Active'),
(546, 137, 'Sunday', '10-30-AM', '10-0-PM', 0, 1, 'Active'),
(554, 139, 'Monday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(555, 139, 'Tuesday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(556, 139, 'Wednesday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(557, 139, 'Thursday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(558, 139, 'Friday', '9-0-AM', '8-0-PM', 0, 1, 'Active'),
(559, 139, 'Saturday', '9-0-AM', '7-0-PM', 0, 1, 'Active'),
(560, 139, 'Sunday', '9-0-AM', '4-0-PM', 0, 1, 'Active'),
(561, 168, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(562, 168, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(563, 168, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(564, 168, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(565, 168, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(566, 168, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(567, 168, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(568, 145, 'Monday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(569, 145, 'Tuesday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(570, 145, 'Wednesday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(571, 145, 'Thursday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(572, 145, 'Friday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(573, 145, 'Saturday', '6-30-AM', '10-30-AM', 0, 1, 'Active'),
(574, 145, 'Sunday', '6-30-AM', '11-30-AM', 0, 1, 'Active'),
(575, 169, 'Monday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(576, 169, 'Tuesday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(577, 169, 'Thursday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(578, 169, 'Wednesday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(579, 169, 'Friday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(580, 169, 'Suterday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(581, 169, 'Sunday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(589, 147, 'Monday', '7-0-AM', '12-0-PM', 0, 1, 'Active'),
(590, 147, 'Tuesday', '7-0-AM', '12-0-PM', 0, 1, 'Active'),
(591, 147, 'Wednesday', '7-0-AM', '12-0-PM', 0, 1, 'Active'),
(592, 147, 'Thursday', '7-0-AM', '12-0-PM', 0, 1, 'Active'),
(593, 147, 'Friday', '7-0-AM', '11-0-PM', 0, 1, 'Active'),
(594, 147, 'Saturday', '8-0-AM', '11-0-PM', 0, 1, 'Active'),
(595, 147, 'Sunday', '8-0-AM', '11-0-PM', 0, 1, 'Active'),
(596, 148, 'Monday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(597, 148, 'Tuesday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(598, 148, 'Wednesday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(599, 148, 'Thursday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(600, 148, 'Friday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(601, 148, 'Saturday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(602, 148, 'Sunday', '6-0-AM', '6-0-PM', 0, 1, 'Active'),
(603, 151, 'Monday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(604, 151, 'Tuesday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(605, 151, 'Wednesday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(606, 151, 'Thursday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(607, 151, 'Friday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(608, 151, 'Saturday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(609, 151, 'Sunday', '6-30-AM', '10-0-PM', 0, 1, 'Active'),
(610, 170, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(611, 170, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(612, 170, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(613, 170, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(614, 170, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(615, 170, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(616, 170, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(617, 152, 'Monday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(618, 152, 'Tuesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(619, 152, 'Wednesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(620, 152, 'Thursday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(621, 152, 'Friday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(622, 152, 'Saturday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(623, 152, 'Sunday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(624, 153, 'Monday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(625, 153, 'Tuesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(626, 153, 'Wednesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(627, 153, 'Thursday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(628, 153, 'Friday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(629, 153, 'Saturday', '7-30-AM', '11-0-PM', 0, 1, 'Active'),
(630, 153, 'Sunday', '7-30-AM', '11-0-PM', 0, 1, 'Active'),
(631, 171, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(632, 171, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(633, 171, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(634, 171, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(635, 171, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(636, 171, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(637, 171, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(638, 155, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(639, 155, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(640, 155, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(641, 155, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(642, 155, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(643, 155, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(644, 155, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(645, 172, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(646, 172, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(647, 172, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(648, 172, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(649, 172, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(650, 172, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(651, 172, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(652, 156, 'Monday', '6-30-PM', '10-30-PM', 0, 1, 'Active'),
(653, 156, 'Tuesday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(654, 156, 'Wednesday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(655, 156, 'Thursday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(656, 156, 'Friday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(657, 156, 'Saturday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(658, 156, 'Sunday', '12-0-PM', '10-30-PM', 0, 1, 'Active'),
(659, 157, 'Monday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(660, 157, 'Tuesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(661, 157, 'Wednesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(662, 157, 'Thursday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(663, 157, 'Friday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(664, 157, 'Saturday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(665, 157, 'Sunday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(666, 158, 'Monday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(667, 158, 'Tuesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(668, 158, 'Wednesday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(669, 158, 'Thursday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(670, 158, 'Friday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(671, 158, 'Saturday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(672, 158, 'Sunday', '6-0-AM', '11-0-PM', 0, 1, 'Active'),
(673, 173, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(674, 173, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(675, 173, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(676, 173, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(677, 173, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(678, 173, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(679, 173, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(680, 159, 'Monday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(681, 159, 'Tuesday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(682, 159, 'Wednesday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(683, 159, 'Thursday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(684, 159, 'Friday', '7-0-AM', '10-0-PM', 0, 1, 'Active'),
(685, 159, 'Saturday', '9-0-AM', '4-0-PM', 0, 1, 'Active'),
(686, 159, 'Sunday', '9-0-AM', '4-0-PM', 0, 1, 'Active'),
(687, 174, 'Monday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(688, 174, 'Tuesday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(689, 174, 'Thursday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(690, 174, 'Wednesday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(691, 174, 'Friday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(692, 174, 'Suterday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(693, 174, 'Sunday', '12-0-AM', '12-0-PM', 0, 0, 'Active'),
(694, 160, 'Monday', '6-30-AM', '10-30-PM', 0, 1, 'Active'),
(695, 160, 'Tuesday', '6-30-AM', '10-30-PM', 0, 1, 'Active'),
(696, 160, 'Wednesday', '6-30-AM', '10-30-PM', 0, 1, 'Active'),
(697, 160, 'Thursday', '6-30-AM', '10-30-PM', 0, 1, 'Active'),
(698, 160, 'Friday', '6-30-AM', '10-30-PM', 0, 1, 'Active'),
(699, 160, 'Saturday', '7-0-AM', '10-30-PM', 0, 1, 'Active'),
(700, 160, 'Sunday', '7-0-AM', '10-30-PM', 0, 1, 'Active'),
(701, 176, 'Monday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(702, 176, 'Tuesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(703, 176, 'Wednesday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(704, 176, 'Thursday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(705, 176, 'Friday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(706, 176, 'Saturday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(707, 176, 'Sunday', '12-0-AM', '12-0-PM', 0, 1, 'Active'),
(715, 168, 'Monday', '0', '0', 0, 1, 'Active'),
(716, 168, 'Tuesday', '0', '0', 0, 1, 'Active'),
(717, 168, 'Wednesday', '0', '0', 0, 1, 'Active'),
(718, 168, 'Thursday', '0', '0', 0, 1, 'Active'),
(719, 168, 'Friday', '0', '0', 0, 1, 'Active'),
(720, 168, 'Saturday', '0', '0', 0, 1, 'Active'),
(721, 168, 'Sunday', '0', '0', 0, 1, 'Active'),
(722, 204, 'Monday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(723, 204, 'Tuesday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(724, 204, 'Wednesday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(725, 204, 'Thursday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(726, 204, 'Friday', '9-0-AM', '6-0-PM', 0, 1, 'Active'),
(727, 204, 'Saturday', '0', '0', 1, 1, 'Active'),
(728, 204, 'Sunday', '0', '0', 1, 1, 'Active'),
(764, 215, 'Monday', '0', '0', 1, 0, 'Active'),
(765, 215, 'Tuesday', '0', '0', 1, 0, 'Active'),
(766, 215, 'Thursday', '0', '0', 1, 0, 'Active'),
(767, 215, 'Wednesday', '0', '0', 1, 0, 'Active'),
(768, 215, 'Friday', '0', '0', 1, 0, 'Active'),
(769, 215, 'Saturday', '0', '0', 1, 0, 'Active'),
(770, 215, 'Sunday', '0', '0', 1, 0, 'Active'),
(771, 216, 'Monday', '0', '0', 1, 0, 'Active'),
(772, 216, 'Tuesday', '0', '0', 1, 0, 'Active'),
(773, 216, 'Thursday', '0', '0', 1, 0, 'Active'),
(774, 216, 'Wednesday', '0', '0', 1, 0, 'Active'),
(775, 216, 'Friday', '0', '0', 1, 0, 'Active'),
(776, 216, 'Saturday', '0', '0', 1, 0, 'Active'),
(777, 216, 'Sunday', '0', '0', 1, 0, 'Active'),
(778, 3, 'Monday', '9-0-AM', '5-0-PM', 0, 3, 'Active'),
(779, 3, 'Tuesday', '9-0-AM', '5-0-PM', 0, 3, 'Active'),
(780, 3, 'Wednesday', '9-0-AM', '5-0-PM', 0, 3, 'Active'),
(781, 3, 'Thursday', '9-0-AM', '5-0-PM', 0, 3, 'Active'),
(782, 3, 'Friday', '9-0-AM', '5-0-PM', 0, 3, 'Active'),
(783, 3, 'Saturday', '0', '0', 1, 3, 'Active'),
(784, 3, 'Sunday', '0', '0', 1, 3, 'Active'),
(785, 4, 'Monday', '9-0-AM', '5-0-PM', 0, 4, 'Active'),
(786, 4, 'Tuesday', '9-0-AM', '5-0-PM', 0, 4, 'Active'),
(787, 4, 'Wednesday', '0', '0', 1, 4, 'Active'),
(788, 4, 'Thursday', '0', '0', 1, 4, 'Active'),
(789, 4, 'Friday', '0', '0', 1, 4, 'Active'),
(790, 4, 'Saturday', '0', '0', 1, 4, 'Active'),
(791, 4, 'Sunday', '0', '0', 1, 4, 'Active'),
(792, 4, 'Monday', '0', '0', 1, 3, 'Active'),
(793, 4, 'Tuesday', '0', '0', 1, 3, 'Active'),
(794, 4, 'Wednesday', '12-0-AM', '6-0-PM', 0, 3, 'Active'),
(795, 4, 'Thursday', '8-0-AM', '6-0-PM', 0, 3, 'Active'),
(796, 4, 'Friday', '8-0-AM', '6-0-PM', 0, 3, 'Active'),
(797, 4, 'Saturday', '8-0-AM', '6-0-PM', 0, 3, 'Active'),
(798, 4, 'Sunday', '0', '0', 1, 3, 'Active'),
(799, 5, 'Monday', '0', '0', 1, 4, 'Active'),
(800, 5, 'Tuesday', '0', '0', 1, 4, 'Active'),
(801, 5, 'Wednesday', '12-0-AM', '1-0-PM', 0, 4, 'Active'),
(802, 5, 'Thursday', '0', '0', 1, 4, 'Active'),
(803, 5, 'Friday', '0', '0', 1, 4, 'Active'),
(804, 5, 'Saturday', '0', '0', 1, 4, 'Active'),
(805, 5, 'Sunday', '0', '0', 1, 4, 'Active'),
(806, 5, 'Monday', '0', '0', 1, 3, 'Active'),
(807, 5, 'Tuesday', '8-0-AM', '6-0-PM', 0, 3, 'Active'),
(808, 5, 'Wednesday', '8-0-AM', '8-0-PM', 0, 3, 'Active'),
(809, 5, 'Thursday', '7-30-AM', '7-30-PM', 0, 3, 'Active'),
(810, 5, 'Friday', '7-30-AM', '7-30-PM', 0, 3, 'Active'),
(811, 5, 'Saturday', '9-0-AM', '5-45-PM', 0, 3, 'Active'),
(812, 5, 'Sunday', '0', '0', 1, 3, 'Active'),
(813, 6, 'Monday', '0', '0', 1, 4, 'Active'),
(814, 6, 'Tuesday', '0', '0', 1, 4, 'Active'),
(815, 6, 'Wednesday', '0', '0', 1, 4, 'Active'),
(816, 6, 'Thursday', '0', '0', 1, 4, 'Active'),
(817, 6, 'Friday', '0', '0', 1, 4, 'Active'),
(818, 6, 'Saturday', '12-0-AM', '1-0-AM', 0, 4, 'Active'),
(819, 6, 'Sunday', '0', '0', 1, 4, 'Active'),
(820, 7, 'Monday', '0', '0', 1, 4, 'Active'),
(821, 7, 'Tuesday', '0', '0', 1, 4, 'Active'),
(822, 7, 'Wednesday', '0', '0', 1, 4, 'Active'),
(823, 7, 'Thursday', '0', '0', 1, 4, 'Active'),
(824, 7, 'Friday', '5-30-PM', '6-45-PM', 0, 4, 'Active'),
(825, 7, 'Saturday', '0', '0', 1, 4, 'Active'),
(826, 7, 'Sunday', '0', '0', 1, 4, 'Active'),
(827, 274, 'Monday', '0', '0', 0, 1, 'Active'),
(828, 274, 'Tuesday', '0', '0', 0, 1, 'Active'),
(829, 274, 'Wednesday', '0', '0', 0, 1, 'Active'),
(830, 274, 'Thursday', '0', '0', 0, 1, 'Active'),
(831, 274, 'Friday', '0', '0', 0, 1, 'Active'),
(832, 274, 'Saturday', '0', '0', 0, 1, 'Active'),
(833, 274, 'Sunday', '0', '0', 0, 1, 'Active'),
(834, 6, 'Monday', '0', '0', 1, 3, 'Active'),
(835, 6, 'Tuesday', '0', '0', 1, 3, 'Active'),
(836, 6, 'Wednesday', '6-0-PM', '8-0-PM', 0, 3, 'Active'),
(837, 6, 'Thursday', '0', '0', 1, 3, 'Active'),
(838, 6, 'Friday', '0', '0', 1, 3, 'Active'),
(839, 6, 'Saturday', '0', '0', 1, 3, 'Active'),
(840, 6, 'Sunday', '0', '0', 1, 3, 'Active'),
(841, 8, 'Monday', '0', '0', 1, 4, 'Active'),
(842, 8, 'Tuesday', '0', '0', 1, 4, 'Active'),
(843, 8, 'Wednesday', '6-0-PM', '6-30-PM', 0, 4, 'Active'),
(844, 8, 'Thursday', '0', '0', 1, 4, 'Active'),
(845, 8, 'Friday', '0', '0', 1, 4, 'Active'),
(846, 8, 'Saturday', '0', '0', 1, 4, 'Active'),
(847, 8, 'Sunday', '0', '0', 1, 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_categories`
--

CREATE TABLE `cmd_pivot_categories` (
  `pivot_category_id` int(11) NOT NULL,
  `category_id` int(20) NOT NULL DEFAULT '0' COMMENT 'Relation to category Table',
  `pivot_unique_id` int(20) NOT NULL DEFAULT '0' COMMENT 'Relation to blog,news,business,event Table',
  `category_type` varchar(100) DEFAULT NULL COMMENT 'Relation to category_type Table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_categories`
--

INSERT INTO `cmd_pivot_categories` (`pivot_category_id`, `category_id`, `pivot_unique_id`, `category_type`) VALUES
(6, 1, 8, 'event'),
(9, 2, 11, 'event'),
(17, 4, 3, 'news'),
(22, 12, 5, 'news'),
(23, 13, 5, 'news'),
(26, 12, 8, 'news'),
(28, 13, 10, 'news'),
(29, 15, 11, 'news'),
(30, 14, 11, 'news'),
(32, 5, 12, 'blog'),
(45, 1, 21, 'event'),
(55, 2, 28, 'event'),
(63, 20, 10, 'class'),
(64, 21, 10, 'class'),
(66, 21, 9, 'class'),
(110, 20, 11, 'class'),
(114, 20, 12, 'class'),
(115, 21, 12, 'class'),
(116, 20, 13, 'class'),
(190, 26, 0, 'news'),
(191, 25, 0, 'news'),
(192, 24, 0, 'news'),
(193, 26, 0, 'news'),
(194, 25, 0, 'news'),
(195, 24, 0, 'news'),
(196, 26, 0, 'news'),
(197, 25, 0, 'news'),
(198, 24, 0, 'news'),
(219, 10, 46, 'event'),
(290, 33, 14, 'class'),
(291, 31, 14, 'class'),
(374, 46, 37, 'news'),
(376, 55, 15, 'class'),
(377, 53, 15, 'class'),
(378, 51, 15, 'class'),
(379, 50, 15, 'class'),
(380, 49, 15, 'class'),
(381, 20, 16, 'class'),
(382, 21, 16, 'class'),
(389, 43, 67, 'business'),
(541, 8, 96, 'business'),
(545, 58, 97, 'business'),
(546, 9, 98, 'business'),
(563, 57, 70, 'business'),
(564, 33, 70, 'business'),
(565, 11, 70, 'business'),
(566, 10, 70, 'business'),
(567, 9, 70, 'business'),
(568, 8, 70, 'business'),
(582, 57, 69, 'business'),
(583, 33, 69, 'business'),
(584, 32, 69, 'business'),
(585, 28, 69, 'business'),
(586, 10, 69, 'business'),
(587, 9, 69, 'business'),
(588, 8, 69, 'business'),
(589, 59, 76, 'business'),
(590, 57, 76, 'business'),
(591, 11, 76, 'business'),
(592, 10, 76, 'business'),
(593, 58, 71, 'business'),
(594, 32, 71, 'business'),
(600, 59, 72, 'business'),
(601, 57, 72, 'business'),
(602, 10, 72, 'business'),
(606, 58, 73, 'business'),
(610, 58, 61, 'business'),
(611, 31, 61, 'business'),
(615, 28, 57, 'business'),
(616, 9, 57, 'business'),
(620, 11, 59, 'business'),
(626, 58, 63, 'business'),
(627, 31, 63, 'business'),
(635, 58, 65, 'business'),
(636, 31, 65, 'business'),
(684, 58, 29, 'business'),
(693, 31, 100, 'business'),
(694, 64, 100, 'business'),
(700, 64, 101, 'business'),
(703, 33, 103, 'business'),
(720, 31, 108, 'business'),
(721, 58, 108, 'business'),
(836, 9, 54, 'event'),
(837, 58, 54, 'event'),
(844, 59, 47, 'business'),
(845, 57, 47, 'business'),
(846, 10, 47, 'business'),
(847, 71, 123, 'business'),
(848, 65, 104, 'business'),
(849, 59, 104, 'business'),
(850, 10, 104, 'business'),
(851, 9, 118, 'business'),
(852, 57, 106, 'business'),
(853, 33, 106, 'business'),
(854, 10, 106, 'business'),
(856, 9, 119, 'business'),
(857, 9, 112, 'business'),
(858, 59, 37, 'business'),
(859, 64, 99, 'business'),
(862, 58, 50, 'business'),
(863, 71, 122, 'business'),
(864, 9, 117, 'business'),
(865, 58, 49, 'business'),
(869, 9, 109, 'business'),
(870, 59, 48, 'business'),
(871, 58, 39, 'business'),
(872, 31, 39, 'business'),
(873, 57, 94, 'business'),
(874, 33, 94, 'business'),
(875, 10, 94, 'business'),
(876, 59, 31, 'business'),
(877, 57, 31, 'business'),
(878, 10, 31, 'business'),
(879, 59, 38, 'business'),
(880, 57, 38, 'business'),
(881, 10, 38, 'business'),
(882, 59, 90, 'business'),
(883, 58, 95, 'business'),
(884, 31, 95, 'business'),
(885, 28, 115, 'business'),
(886, 9, 115, 'business'),
(887, 58, 40, 'business'),
(888, 32, 40, 'business'),
(889, 71, 121, 'business'),
(890, 9, 116, 'business'),
(891, 9, 113, 'business'),
(892, 28, 114, 'business'),
(893, 9, 114, 'business'),
(896, 58, 27, 'business'),
(897, 31, 27, 'business'),
(898, 64, 28, 'business'),
(899, 58, 28, 'business'),
(900, 31, 28, 'business'),
(901, 59, 93, 'business'),
(903, 58, 36, 'business'),
(904, 59, 91, 'business'),
(905, 33, 33, 'business'),
(906, 28, 33, 'business'),
(907, 59, 51, 'business'),
(908, 57, 51, 'business'),
(909, 10, 51, 'business'),
(910, 59, 75, 'business'),
(911, 58, 83, 'business'),
(912, 59, 30, 'business'),
(913, 57, 30, 'business'),
(914, 33, 30, 'business'),
(915, 11, 30, 'business'),
(916, 10, 30, 'business'),
(917, 57, 80, 'business'),
(918, 33, 80, 'business'),
(919, 28, 80, 'business'),
(920, 10, 80, 'business'),
(921, 9, 80, 'business'),
(922, 8, 80, 'business'),
(923, 11, 92, 'business'),
(924, 62, 52, 'business'),
(925, 59, 52, 'business'),
(926, 57, 52, 'business'),
(927, 11, 52, 'business'),
(928, 10, 52, 'business'),
(929, 58, 25, 'business'),
(930, 31, 25, 'business'),
(931, 58, 107, 'business'),
(932, 31, 107, 'business'),
(933, 58, 35, 'business'),
(934, 31, 35, 'business'),
(935, 59, 56, 'business'),
(936, 57, 56, 'business'),
(937, 10, 56, 'business'),
(938, 65, 105, 'business'),
(939, 59, 105, 'business'),
(940, 10, 105, 'business'),
(941, 62, 74, 'business'),
(945, 59, 60, 'business'),
(946, 57, 60, 'business'),
(947, 10, 60, 'business'),
(948, 11, 78, 'business'),
(949, 28, 84, 'business'),
(950, 9, 32, 'business'),
(951, 28, 79, 'business'),
(952, 9, 79, 'business'),
(953, 9, 110, 'business'),
(954, 28, 120, 'business'),
(955, 9, 120, 'business'),
(956, 9, 111, 'business'),
(957, 9, 34, 'business'),
(959, 9, 125, 'business'),
(960, 9, 126, 'business'),
(966, 28, 77, 'business'),
(967, 9, 77, 'business'),
(1010, 10, 58, 'event'),
(1012, 10, 56, 'event'),
(1014, 10, 57, 'event'),
(1015, 10, 55, 'event'),
(1019, 10, 59, 'event'),
(1020, 10, 60, 'event'),
(1021, 10, 37, 'event'),
(1055, 9, 20, 'class'),
(1060, 72, 19, 'class'),
(1061, 33, 17, 'class'),
(1064, 33, 138, 'business'),
(1069, 59, 140, 'business'),
(1070, 59, 141, 'business'),
(1075, 58, 143, 'business'),
(1076, 64, 142, 'business'),
(1077, 58, 142, 'business'),
(1078, 58, 144, 'business'),
(1084, 59, 146, 'business'),
(1092, 33, 150, 'business'),
(1093, 59, 149, 'business'),
(1094, 9, 124, 'business'),
(1095, 58, 133, 'business'),
(1096, 74, 147, 'business'),
(1097, 33, 148, 'business'),
(1098, 74, 136, 'business'),
(1100, 18, 131, 'business'),
(1101, 58, 134, 'business'),
(1102, 58, 129, 'business'),
(1103, 9, 137, 'business'),
(1104, 59, 130, 'business'),
(1105, 58, 145, 'business'),
(1106, 33, 128, 'business'),
(1109, 33, 151, 'business'),
(1117, 58, 153, 'business'),
(1120, 10, 25, 'class'),
(1125, 33, 152, 'business'),
(1126, 33, 24, 'class'),
(1128, 10, 61, 'event'),
(1130, 58, 156, 'business'),
(1133, 33, 157, 'business'),
(1136, 10, 62, 'event'),
(1137, 18, 158, 'business'),
(1141, 10, 27, 'class'),
(1142, 33, 28, 'class'),
(1160, 33, 159, 'business'),
(1165, 10, 65, 'event'),
(1166, 58, 26, 'business'),
(1167, 31, 26, 'business'),
(1168, 72, 155, 'business'),
(1169, 58, 160, 'business'),
(1184, 72, 32, 'class'),
(1185, 72, 161, 'business'),
(1197, 33, 132, 'business'),
(1199, 72, 26, 'class'),
(1201, 33, 23, 'class'),
(1202, 10, 18, 'class'),
(1203, 33, 29, 'class'),
(1204, 33, 30, 'class'),
(1205, 33, 31, 'class'),
(1206, 64, 163, 'business'),
(1207, 63, 163, 'business'),
(1208, 64, 164, 'business'),
(1209, 58, 164, 'business'),
(1212, 58, 165, 'business'),
(1215, 33, 166, 'business'),
(1216, 8, 166, 'business'),
(1217, 65, 167, 'business'),
(1218, 57, 167, 'business'),
(1219, 10, 167, 'business'),
(1226, 76, 169, 'business'),
(1227, 76, 170, 'business'),
(1229, 57, 171, 'business'),
(1237, 65, 22, 'class'),
(1240, 9, 21, 'class'),
(1242, 57, 172, 'business'),
(1244, 68, 39, 'news'),
(1245, 46, 39, 'news'),
(1246, 46, 21, 'news'),
(1247, 46, 40, 'news'),
(1248, 46, 35, 'news'),
(1249, 46, 41, 'news'),
(1250, 46, 38, 'news'),
(1251, 46, 30, 'news'),
(1252, 70, 44, 'news'),
(1253, 69, 44, 'news'),
(1254, 46, 28, 'news'),
(1257, 46, 36, 'news'),
(1265, 11, 173, 'business'),
(1289, 31, 174, 'business'),
(1296, 46, 46, 'news'),
(1303, 65, 175, 'business'),
(1304, 59, 175, 'business'),
(1313, 70, 47, 'news'),
(1314, 69, 47, 'news'),
(1319, 70, 45, 'news'),
(1320, 69, 45, 'news'),
(1321, 70, 48, 'news'),
(1322, 69, 48, 'news'),
(1323, 65, 176, 'business'),
(1324, 59, 176, 'business'),
(1329, 70, 49, 'news'),
(1330, 69, 49, 'news'),
(1332, 11, 177, 'business'),
(1333, 64, 178, 'business'),
(1334, 58, 178, 'business'),
(1336, 9, 179, 'business'),
(1339, 65, 180, 'business'),
(1340, 59, 180, 'business'),
(1349, 70, 50, 'news'),
(1350, 69, 50, 'news'),
(1351, 58, 181, 'business'),
(1352, 69, 51, 'news'),
(1353, 65, 182, 'business'),
(1354, 59, 182, 'business'),
(1355, 10, 182, 'business'),
(1356, 65, 183, 'business'),
(1357, 59, 183, 'business'),
(1358, 10, 183, 'business'),
(1361, 70, 52, 'news'),
(1362, 69, 52, 'news'),
(1363, 65, 184, 'business'),
(1364, 59, 184, 'business'),
(1365, 10, 184, 'business'),
(1367, 33, 185, 'business'),
(1368, 64, 186, 'business'),
(1369, 58, 186, 'business'),
(1370, 31, 186, 'business'),
(1371, 11, 187, 'business'),
(1372, 70, 53, 'news'),
(1373, 69, 53, 'news'),
(1374, 18, 188, 'business'),
(1375, 11, 188, 'business'),
(1376, 18, 189, 'business'),
(1377, 11, 189, 'business'),
(1378, 18, 190, 'business'),
(1379, 11, 190, 'business'),
(1380, 58, 82, 'business'),
(1387, 59, 81, 'business'),
(1388, 57, 81, 'business'),
(1389, 10, 81, 'business'),
(1394, 65, 192, 'business'),
(1395, 59, 192, 'business'),
(1396, 10, 192, 'business'),
(1397, 18, 193, 'business'),
(1398, 57, 194, 'business'),
(1399, 33, 194, 'business'),
(1400, 28, 194, 'business'),
(1401, 10, 194, 'business'),
(1402, 8, 194, 'business'),
(1403, 65, 195, 'business'),
(1404, 59, 195, 'business'),
(1405, 10, 195, 'business'),
(1406, 65, 191, 'business'),
(1407, 59, 191, 'business'),
(1408, 57, 191, 'business'),
(1409, 10, 191, 'business'),
(1410, 78, 196, 'business'),
(1411, 65, 196, 'business'),
(1412, 33, 196, 'business'),
(1413, 18, 196, 'business'),
(1414, 11, 196, 'business'),
(1415, 10, 196, 'business'),
(1418, 65, 197, 'business'),
(1419, 10, 197, 'business'),
(1420, 58, 198, 'business'),
(1427, 65, 199, 'business'),
(1428, 59, 199, 'business'),
(1429, 10, 199, 'business'),
(1430, 64, 200, 'business'),
(1431, 58, 200, 'business'),
(1432, 31, 200, 'business'),
(1433, 33, 201, 'business'),
(1434, 65, 202, 'business'),
(1435, 59, 202, 'business'),
(1436, 33, 203, 'business'),
(1437, 18, 203, 'business'),
(1438, 18, 204, 'business'),
(1439, 11, 204, 'business'),
(1440, 65, 205, 'business'),
(1441, 59, 205, 'business'),
(1442, 10, 205, 'business'),
(1443, 71, 206, 'business'),
(1444, 18, 206, 'business'),
(1449, 58, 207, 'business'),
(1450, 31, 207, 'business'),
(1451, 65, 208, 'business'),
(1452, 59, 208, 'business'),
(1453, 10, 208, 'business'),
(1454, 65, 209, 'business'),
(1455, 59, 209, 'business'),
(1456, 10, 209, 'business'),
(1457, 18, 210, 'business'),
(1458, 65, 211, 'business'),
(1459, 59, 211, 'business'),
(1460, 10, 211, 'business'),
(1461, 33, 212, 'business'),
(1462, 65, 213, 'business'),
(1463, 59, 213, 'business'),
(1464, 10, 213, 'business'),
(1469, 70, 54, 'news'),
(1470, 69, 54, 'news'),
(1477, 70, 56, 'news'),
(1478, 69, 56, 'news'),
(1483, 70, 57, 'news'),
(1484, 69, 57, 'news'),
(1487, 70, 58, 'news'),
(1488, 69, 58, 'news'),
(1489, 70, 59, 'news'),
(1490, 69, 59, 'news'),
(1491, 70, 60, 'news'),
(1492, 69, 60, 'news'),
(1493, 70, 61, 'news'),
(1494, 69, 61, 'news'),
(1495, 70, 62, 'news'),
(1496, 69, 62, 'news'),
(1513, 65, 214, 'business'),
(1514, 59, 214, 'business'),
(1515, 58, 215, 'business'),
(1518, 70, 55, 'news'),
(1519, 69, 55, 'news'),
(1520, 58, 216, 'business'),
(1521, 65, 217, 'business'),
(1522, 59, 217, 'business'),
(1523, 57, 217, 'business'),
(1524, 10, 217, 'business'),
(1525, 9, 218, 'business'),
(1526, 10, 219, 'business'),
(1529, 33, 220, 'business'),
(1530, 18, 220, 'business'),
(1531, 58, 221, 'business'),
(1533, 58, 222, 'business'),
(1536, 11, 225, 'business'),
(1538, 72, 3, 'invite_space'),
(1539, 74, 4, 'energiser_space'),
(1540, 33, 227, 'business'),
(1541, 65, 228, 'business'),
(1542, 59, 228, 'business'),
(1543, 10, 228, 'business'),
(1544, 59, 229, 'business'),
(1545, 59, 230, 'business'),
(1546, 59, 231, 'business'),
(1551, 33, 232, 'business'),
(1554, 65, 234, 'business'),
(1555, 59, 234, 'business'),
(1556, 65, 233, 'business'),
(1557, 59, 233, 'business'),
(1558, 33, 235, 'business'),
(1559, 33, 236, 'business'),
(1560, 9, 237, 'business'),
(1561, 79, 238, 'business'),
(1562, 28, 239, 'business'),
(1563, 58, 240, 'business'),
(1564, 65, 241, 'business'),
(1565, 59, 241, 'business'),
(1566, 58, 242, 'business'),
(1567, 59, 243, 'business'),
(1568, 58, 244, 'business'),
(1569, 31, 244, 'business'),
(1570, 58, 245, 'business'),
(1571, 58, 246, 'business'),
(1573, 33, 247, 'business'),
(1574, 58, 248, 'business'),
(1575, 65, 249, 'business'),
(1576, 59, 249, 'business'),
(1577, 10, 249, 'business'),
(1579, 72, 4, 'invite_space'),
(1613, 58, 250, 'business'),
(1614, 59, 251, 'business'),
(1615, 31, 252, 'business'),
(1619, 72, 168, 'business'),
(1620, 74, 253, 'business'),
(1621, 71, 253, 'business'),
(1622, 18, 253, 'business'),
(1623, 74, 254, 'business'),
(1624, 18, 254, 'business'),
(1625, 33, 255, 'business'),
(1626, 74, 256, 'business'),
(1627, 9, 257, 'business'),
(1628, 33, 258, 'business'),
(1638, 65, 259, 'business'),
(1639, 59, 259, 'business'),
(1640, 10, 259, 'business'),
(1641, 74, 260, 'business'),
(1642, 59, 261, 'business'),
(1643, 65, 262, 'business'),
(1644, 59, 262, 'business'),
(1645, 10, 262, 'business'),
(1648, 58, 263, 'business'),
(1649, 31, 263, 'business'),
(1650, 58, 264, 'business'),
(1651, 31, 264, 'business'),
(1653, 72, 5, 'invite_space'),
(1655, 65, 5, 'energiser_space'),
(1656, 72, 5, 'energiser_space'),
(1657, 74, 5, 'energiser_space'),
(1662, 10, 7, 'energiser_space'),
(1663, 65, 6, 'energiser_space'),
(1664, 58, 265, 'business'),
(1665, 58, 266, 'business'),
(1669, 65, 268, 'business'),
(1670, 59, 268, 'business'),
(1671, 57, 268, 'business'),
(1672, 10, 268, 'business'),
(1679, 74, 267, 'business'),
(1680, 64, 267, 'business'),
(1681, 31, 267, 'business'),
(1682, 58, 224, 'business'),
(1683, 59, 223, 'business'),
(1684, 58, 269, 'business'),
(1686, 18, 270, 'business'),
(1687, 64, 271, 'business'),
(1688, 58, 271, 'business'),
(1689, 31, 271, 'business'),
(1690, 58, 272, 'business'),
(1691, 65, 273, 'business'),
(1692, 59, 273, 'business'),
(1693, 10, 273, 'business'),
(1694, 59, 274, 'business'),
(1695, 58, 275, 'business'),
(1696, 74, 276, 'business'),
(1697, 65, 276, 'business'),
(1698, 59, 276, 'business'),
(1699, 57, 276, 'business'),
(1700, 10, 276, 'business'),
(1701, 59, 277, 'business'),
(1702, 33, 278, 'business'),
(1703, 8, 278, 'business'),
(1706, 58, 280, 'business'),
(1707, 58, 279, 'business'),
(1708, 31, 279, 'business'),
(1709, 65, 281, 'business'),
(1710, 59, 281, 'business'),
(1711, 57, 281, 'business'),
(1712, 10, 281, 'business'),
(1713, 33, 282, 'business'),
(1714, 58, 283, 'business'),
(1715, 31, 283, 'business'),
(1716, 65, 284, 'business'),
(1717, 59, 284, 'business'),
(1719, 65, 8, 'energiser_space'),
(1721, 72, 6, 'invite_space');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_favourite_city`
--

CREATE TABLE `cmd_pivot_favourite_city` (
  `favourite_city_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0',
  `city_id` int(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_favourite_city`
--

INSERT INTO `cmd_pivot_favourite_city` (`favourite_city_id`, `user_id`, `city_id`) VALUES
(1, 50, 2),
(2, 62, 1),
(3, 62, 2),
(4, 62, 3),
(5, 62, 4),
(7, 36, 3),
(8, 36, 2),
(9, 41, 3),
(14, 71, 6),
(16, 71, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_favourite_event`
--

CREATE TABLE `cmd_pivot_favourite_event` (
  `favourite_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_favourite_event`
--

INSERT INTO `cmd_pivot_favourite_event` (`favourite_event_id`, `user_id`, `event_id`) VALUES
(11, 93, 43),
(13, 86, 36),
(15, 86, 34),
(22, 58, 36),
(24, 92, 46),
(25, 92, 45),
(26, 89, 45),
(28, 89, 48),
(29, 89, 47),
(30, 58, 48),
(32, 95, 34),
(33, 95, 36),
(34, 89, 36),
(35, 88, 36),
(36, 115, 44),
(37, 88, 30),
(57, 88, 54),
(59, 64, 60),
(60, 161, 60),
(61, 168, 60),
(62, 169, 60),
(63, 170, 44),
(64, 171, 61),
(65, 172, 62),
(66, 173, 59),
(67, 174, 62),
(68, 164, 62),
(69, 176, 66),
(70, 88, 66);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_favourite_news`
--

CREATE TABLE `cmd_pivot_favourite_news` (
  `favourite_news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `news_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_favourite_news`
--

INSERT INTO `cmd_pivot_favourite_news` (`favourite_news_id`, `user_id`, `news_id`) VALUES
(1, 58, 21),
(3, 58, 25),
(4, 58, 26),
(5, 79, 25),
(6, 79, 26),
(7, 58, 27),
(8, 58, 30),
(9, 58, 37),
(10, 89, 27),
(11, 89, 26),
(12, 112, 37),
(13, 112, 36),
(14, 112, 28),
(15, 118, 35),
(16, 118, 36),
(17, 88, 21),
(18, 164, 21),
(19, 89, 57),
(20, 89, 60),
(21, 89, 59),
(22, 89, 41),
(23, 89, 30),
(24, 89, 21);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_favourite_store`
--

CREATE TABLE `cmd_pivot_favourite_store` (
  `favourite_store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `business_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_favourite_store`
--

INSERT INTO `cmd_pivot_favourite_store` (`favourite_store_id`, `user_id`, `business_id`) VALUES
(1, 60, 17),
(3, 36, 14),
(4, 36, 15),
(5, 93, 27),
(6, 93, 29),
(7, 94, 32),
(9, 94, 30),
(20, 92, 45),
(21, 92, 40),
(24, 88, 53),
(27, 100, 59),
(28, 100, 55),
(29, 100, 56),
(30, 100, 60),
(31, 100, 57),
(33, 100, 61),
(34, 58, 64),
(36, 58, 56),
(37, 95, 33),
(39, 115, 88),
(48, 87, 100),
(50, 94, 95),
(51, 94, 31),
(52, 94, 102),
(69, 118, 103),
(71, 94, 74),
(75, 121, 106),
(81, 127, 76),
(82, 129, 77),
(83, 129, 30),
(84, 89, 77),
(85, 89, 120),
(86, 89, 76),
(87, 140, 101),
(88, 140, 78),
(92, 159, 130),
(93, 161, 130),
(97, 164, 137),
(98, 164, 136),
(100, 168, 130),
(101, 169, 149),
(102, 170, 154),
(103, 170, 29),
(105, 172, 130),
(106, 88, 157),
(107, 173, 150),
(109, 174, 137),
(110, 164, 130),
(111, 176, 168),
(112, 88, 180),
(113, 118, 217),
(114, 89, 218),
(115, 118, 226);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_joining_class`
--

CREATE TABLE `cmd_pivot_joining_class` (
  `joining_class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_class_id` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_pivot_joining_class`
--

INSERT INTO `cmd_pivot_joining_class` (`joining_class_id`, `user_id`, `trainer_class_id`, `create_date`) VALUES
(1, 58, 19, '0000-00-00'),
(3, 88, 20, '0000-00-00'),
(8, 168, 27, '0000-00-00'),
(9, 88, 28, '0000-00-00'),
(10, 88, 18, '0000-00-00'),
(13, 89, 22, '0000-00-00'),
(14, 88, 24, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_joining_event`
--

CREATE TABLE `cmd_pivot_joining_event` (
  `joining_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_pivot_joining_event`
--

INSERT INTO `cmd_pivot_joining_event` (`joining_event_id`, `user_id`, `event_id`, `create_date`) VALUES
(1, 2, 10, '2017-05-16'),
(2, 3, 12, '2017-05-16'),
(3, 60, 31, '0000-00-00'),
(4, 41, 13, '0000-00-00'),
(5, 41, 14, '0000-00-00'),
(7, 36, 13, '0000-00-00'),
(9, 36, 15, '0000-00-00'),
(11, 36, 14, '0000-00-00'),
(12, 36, 10, '0000-00-00'),
(13, 41, 32, '0000-00-00'),
(14, 36, 32, '0000-00-00'),
(15, 71, 33, '0000-00-00'),
(20, 58, 33, '0000-00-00'),
(21, 79, 33, '0000-00-00'),
(22, 79, 32, '0000-00-00'),
(23, 79, 31, '0000-00-00'),
(24, 79, 30, '0000-00-00'),
(26, 89, 35, '0000-00-00'),
(27, 89, 36, '0000-00-00'),
(37, 88, 38, '0000-00-00'),
(40, 92, 36, '0000-00-00'),
(41, 93, 43, '0000-00-00'),
(43, 93, 36, '0000-00-00'),
(46, 86, 36, '0000-00-00'),
(47, 89, 44, '0000-00-00'),
(48, 95, 45, '0000-00-00'),
(49, 94, 36, '0000-00-00'),
(51, 58, 36, '0000-00-00'),
(52, 72, 46, '0000-00-00'),
(54, 92, 45, '0000-00-00'),
(55, 89, 46, '0000-00-00'),
(56, 58, 44, '0000-00-00'),
(60, 58, 46, '0000-00-00'),
(61, 58, 34, '0000-00-00'),
(62, 58, 30, '0000-00-00'),
(63, 89, 45, '0000-00-00'),
(64, 79, 37, '0000-00-00'),
(67, 58, 47, '0000-00-00'),
(68, 88, 37, '0000-00-00'),
(69, 89, 54, '0000-00-00'),
(70, 89, 37, '0000-00-00'),
(71, 64, 60, '0000-00-00'),
(72, 88, 54, '0000-00-00'),
(73, 176, 66, '0000-00-00'),
(74, 88, 66, '0000-00-00'),
(78, 58, 65, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_product_category_subcategory`
--

CREATE TABLE `cmd_pivot_product_category_subcategory` (
  `ppcs_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL DEFAULT '0',
  `category_id` int(100) NOT NULL DEFAULT '0',
  `subcategory_id` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_product_category_subcategory`
--

INSERT INTO `cmd_pivot_product_category_subcategory` (`ppcs_id`, `product_id`, `category_id`, `subcategory_id`) VALUES
(9, 10, 66, 67),
(11, 12, 66, 67);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_product_images`
--

CREATE TABLE `cmd_pivot_product_images` (
  `product_images_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_images_name` varchar(255) DEFAULT NULL,
  `primary_image` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_product_images`
--

INSERT INTO `cmd_pivot_product_images` (`product_images_id`, `product_id`, `product_images_name`, `primary_image`) VALUES
(34, 10, '1529400160_Club Mondain Shop Images 500x500 (1).jpg', 1),
(38, 12, '1529930668_Club Mondain Shop Images 500x500.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_pivot_user_interest_category`
--

CREATE TABLE `cmd_pivot_user_interest_category` (
  `pivot_user_interest_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_pivot_user_interest_category`
--

INSERT INTO `cmd_pivot_user_interest_category` (`pivot_user_interest_category_id`, `category_id`, `user_id`) VALUES
(4, 9, 36),
(6, 2, 37),
(10, 2, 38),
(11, 1, 39),
(16, 1, 40),
(17, 2, 51),
(18, 1, 52),
(19, 3, 52),
(20, 2, 57),
(23, 11, 62),
(24, 11, 62),
(28, 22, 68),
(29, 21, 68),
(30, 20, 68),
(31, 19, 68),
(32, 18, 68),
(33, 23, 71),
(34, 23, 71),
(35, 20, 71),
(36, 19, 71),
(37, 23, 73),
(38, 10, 74),
(39, 9, 74),
(40, 8, 74),
(41, 10, 74),
(42, 9, 74),
(43, 8, 74),
(44, 21, 79),
(49, 18, 82),
(50, 11, 82),
(51, 9, 82),
(52, 26, 85),
(53, 10, 86),
(54, 29, 87),
(55, 28, 87),
(63, 30, 90),
(64, 29, 90),
(65, 28, 90),
(66, 21, 90),
(67, 18, 90),
(68, 9, 90),
(69, 8, 90),
(70, 42, 91),
(71, 37, 91),
(72, 9, 91),
(74, 9, 93),
(76, 50, 97),
(77, 46, 97),
(78, 42, 97),
(79, 30, 97),
(80, 8, 100),
(81, 8, 100),
(82, 8, 100),
(83, 8, 100),
(84, 8, 100),
(85, 8, 100),
(86, 8, 100),
(87, 56, 105),
(88, 56, 105),
(90, 10, 109),
(91, 10, 109),
(92, 10, 109),
(93, 10, 109),
(94, 10, 109),
(95, 10, 109),
(96, 10, 109),
(97, 10, 109),
(98, 10, 109),
(99, 10, 109),
(100, 10, 109),
(101, 10, 109),
(102, 54, 110),
(103, 54, 110),
(104, 56, 111),
(105, 55, 111),
(106, 54, 111),
(109, 50, 113),
(110, 50, 114),
(111, 19, 115),
(132, 59, 116),
(133, 58, 116),
(134, 59, 117),
(137, 58, 88),
(138, 9, 88),
(139, 28, 89),
(140, 18, 89),
(141, 10, 89),
(142, 8, 89),
(148, 57, 106),
(149, 33, 106),
(150, 11, 106),
(151, 10, 106),
(154, 65, 92),
(155, 58, 92),
(156, 11, 92),
(157, 65, 94),
(158, 58, 94),
(159, 33, 94),
(160, 9, 94),
(161, 8, 94),
(171, 62, 121),
(172, 58, 121),
(173, 34, 121),
(174, 31, 121),
(175, 58, 123),
(176, 25, 123),
(181, 65, 127),
(182, 63, 127),
(183, 62, 127),
(184, 59, 127),
(185, 58, 127),
(186, 33, 127),
(187, 28, 127),
(188, 25, 127),
(189, 9, 127),
(190, 33, 128),
(191, 30, 128),
(192, 10, 128),
(200, 65, 129),
(201, 63, 129),
(202, 59, 129),
(203, 34, 129),
(204, 11, 129),
(205, 9, 129),
(214, 33, 140),
(215, 16, 140),
(216, 70, 142),
(217, 69, 142),
(218, 64, 142),
(219, 58, 142),
(220, 32, 142),
(221, 18, 142),
(222, 10, 142),
(223, 69, 143),
(224, 68, 143),
(225, 66, 143),
(226, 33, 131),
(227, 70, 146),
(228, 69, 146),
(229, 68, 146),
(230, 67, 146),
(231, 66, 146),
(232, 65, 146),
(233, 64, 146),
(234, 58, 146),
(235, 57, 146),
(236, 33, 146),
(237, 31, 146),
(238, 30, 146),
(239, 25, 146),
(240, 23, 146),
(241, 18, 146),
(242, 9, 146),
(243, 8, 146),
(244, 70, 148),
(248, 11, 64),
(249, 10, 64),
(250, 9, 64),
(251, 62, 160),
(252, 58, 160),
(253, 64, 160),
(273, 72, 167),
(274, 62, 167),
(275, 59, 167),
(276, 58, 167),
(277, 32, 167),
(278, 18, 167),
(279, 11, 167),
(280, 10, 167),
(281, 9, 167),
(282, 74, 166),
(283, 72, 166),
(284, 59, 166),
(285, 58, 166),
(286, 18, 166),
(287, 11, 166),
(288, 10, 166),
(289, 9, 166),
(290, 65, 175),
(291, 32, 175),
(292, 9, 175),
(296, 65, 177),
(297, 58, 177),
(298, 57, 177),
(358, 57, 186),
(359, 10, 186),
(392, 65, 189),
(393, 59, 189),
(394, 58, 189),
(395, 57, 189),
(396, 33, 189),
(397, 10, 189),
(398, 65, 182),
(399, 58, 182),
(400, 57, 182),
(401, 33, 182),
(402, 11, 182),
(403, 10, 182),
(404, 9, 182),
(405, 65, 184),
(406, 57, 184),
(407, 33, 184),
(408, 9, 184),
(415, 57, 181),
(416, 10, 181),
(420, 76, 192),
(421, 33, 192),
(422, 11, 192),
(423, 10, 192),
(424, 10, 193),
(425, 18, 193),
(426, 65, 191),
(427, 59, 191),
(428, 58, 191),
(429, 10, 191),
(430, 9, 191),
(431, 57, 194),
(432, 59, 194),
(433, 10, 194),
(434, 57, 195),
(435, 65, 195),
(436, 18, 195),
(437, 62, 196),
(438, 33, 196),
(439, 58, 196),
(440, 74, 196),
(441, 59, 196),
(442, 10, 196),
(443, 11, 196),
(444, 64, 196),
(445, 18, 196),
(446, 9, 196),
(450, 76, 198),
(451, 58, 198),
(452, 9, 198),
(468, 65, 199),
(469, 58, 199),
(470, 11, 199),
(471, 71, 200),
(472, 62, 200),
(473, 33, 200),
(477, 58, 201),
(478, 10, 201),
(479, 9, 201),
(488, 65, 202),
(489, 58, 202),
(490, 11, 202),
(491, 10, 202),
(492, 33, 203),
(493, 58, 203),
(494, 65, 203),
(495, 11, 203),
(496, 65, 206),
(497, 78, 206),
(498, 33, 207),
(499, 58, 207),
(500, 65, 207),
(515, 65, 209),
(516, 58, 209),
(517, 57, 209),
(518, 33, 209),
(519, 11, 209),
(520, 58, 208),
(521, 33, 208),
(522, 11, 208),
(523, 10, 208),
(524, 57, 214),
(525, 33, 214),
(526, 10, 214),
(527, 33, 218),
(528, 10, 218),
(529, 65, 220),
(530, 33, 220),
(531, 11, 220),
(532, 10, 220),
(533, 9, 220),
(534, 79, 211),
(535, 78, 211),
(536, 28, 58),
(537, 11, 58),
(538, 8, 58),
(543, 33, 228),
(544, 31, 228),
(545, 10, 228),
(546, 9, 228),
(553, 58, 229),
(554, 33, 229),
(555, 10, 229);

-- --------------------------------------------------------

--
-- Table structure for table `cmd_product`
--

CREATE TABLE `cmd_product` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text,
  `product_price` float NOT NULL DEFAULT '0',
  `product_qty` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cmd_product_review`
--

CREATE TABLE `cmd_product_review` (
  `product_reviews_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_review` int(11) NOT NULL,
  `user_comment` text NOT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_product_review`
--

INSERT INTO `cmd_product_review` (`product_reviews_id`, `Product_id`, `user_id`, `user_review`, `user_comment`, `create_date`, `status`) VALUES
(1, 2, 41, 4, 'Test Review', '2017-06-02', 'Active'),
(2, 2, 71, 1, 'MN.,', '2017-06-05', 'Active'),
(3, 2, 71, 5, '/,M,.M.M', '2017-06-05', 'Active'),
(4, 5, 88, 4, 'TEST', '2017-11-17', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_settings`
--

CREATE TABLE `cmd_settings` (
  `setting_id` int(11) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkedIn_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `google_plus_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `form_email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `copyright_section` varchar(255) DEFAULT NULL,
  `google_map` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_settings`
--

INSERT INTO `cmd_settings` (`setting_id`, `facebook_link`, `twitter_link`, `linkedIn_link`, `pinterest_link`, `google_plus_link`, `instagram_link`, `address`, `state`, `city`, `zipcode`, `site_email`, `form_email`, `phone_no`, `copyright_section`, `google_map`) VALUES
(1, 'https://www.facebook.com/ClubMondain/ ', 'https://twitter.com/clubmondain', 'https://www.linkedin.com/company/27011853/?trk=company_home_typeahead_result ', '', 'https://www.youtube.com/channel/UCLikn3xVC-izckCF_UocjVw', 'https://www.instagram.com/club.mondain/ ', 'PARIS - COPENHAGEN - AMSTERDAM - STOCKHOLM - OSLO - LONDON - BERLIN ', 'GLOBAL', 'GLOBAL', '1', 'go@clubmondain.com', 'go@clubmondain.com', '0031207163114', 'Copyright © 2017-2018', '&lt;iframe&gt;&lt;/iframe&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_store_feedback`
--

CREATE TABLE `cmd_store_feedback` (
  `store_feedback_id` int(11) NOT NULL,
  `business_id` int(111) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_feedback` text,
  `store_service_ratting` int(11) NOT NULL DEFAULT '0',
  `store_location_ratting` int(11) NOT NULL DEFAULT '0',
  `store_quality_ratting` int(11) NOT NULL DEFAULT '0',
  `store_others_ratting` int(11) NOT NULL DEFAULT '0',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_store_feedback`
--

INSERT INTO `cmd_store_feedback` (`store_feedback_id`, `business_id`, `user_id`, `store_feedback`, `store_service_ratting`, `store_location_ratting`, `store_quality_ratting`, `store_others_ratting`, `create_date`, `status`) VALUES
(12, 27, 93, 'Great place, nice atmosphere and good, healthy food!', 5, 2, 1, 1, '2017-08-10', 'Active'),
(23, 33, 92, 'participated in the 50 minute barre workout. small classes max 10 persons so you need to reserve in advance. As all levels participate in the same class please watch out that youre not overdoing it as a beginner. Although the exercises do not look intense, they are! so in the end it really feels that you have been working out. ps dont forget to bring some water and socks! towels are available at the location. ', 5, 5, 5, 5, '2017-09-06', 'Active'),
(29, 55, 100, 'Great restaurant, \"Buffet\" style with many warm/cold options, all vegan. Good price/quality. ', 0, 4, 5, 5, '2017-11-07', 'Active'),
(31, 61, 100, 'Buffet style restaurant, all vegan, only cold options.', 0, 4, 5, 5, '2017-11-07', 'Active'),
(36, 84, 100, 'Gratis profles!', 4, 4, 5, 5, '2017-12-04', 'Active'),
(40, 86, 100, 'Top', 4, 4, 5, 5, '2017-12-04', 'Active'),
(43, 74, 94, '21 oktober ben ik voor werk naar Barcelona geweest en heb ik het advies gekregen om de route te lopen van Nova Icaria Beach. Aangezien ik een tijd in Barcelona stage heb gelopen en dus al veel van de binnenstad gezien had, leek het me leuk om een ander deel van de stad te zien en om actief bezig te zijn. Het prachtige strand van Barcelona geeft je het gevoel niet meer in de stad te zijn, terwijl de route wel volledig is geasfalteerd wat het perfect maakt om te skeeleren, fietsen, hardlopen etc. Ook staan er genoeg bankjes om tussendoor oefeningen te doen, of even te genieten van het prachtige uitzicht. Daarnaast is de route bij uitstek geschikt om (na de workout!) te flaneren en neer te strijken bij verschillende \'chiringuitos\' voor een lekkere koude sangria. Work hard, play hard is het niet. ', 5, 5, 5, 5, '2017-12-13', 'Active'),
(44, 77, 94, '8 november 2017 ben ik naar Yellow Yoga geweest en het was een geweldige ervaring. De studio (ik ben bij MariannestraBe geweest, maar er is nog een vestiging) is gelegen aan een binnenplaatsje en is een oase van rust in de drukke stad. Al bij binnenkomst voelde je de kalmte en werd ik vrolijk van de rustige sfeer die er hing. Een les kost tussen de €7 en €12; €7 wanneer je niet veel te besteden hebt, €9 is de normale prijs en €12 wanneer je iets meer te besteden hebt. Je mag zelf beslissen waar je bij hoort. Wat een gaaf concept! Zelf heb ik Kudalini Yoga gevolgd, maar ze hebben vele verschillende vormen. Kijk even online wat er wanneer gegeven wordt, check wel goed bij welke vestiging dat is. De lerares was een professionele yogi die wist waar ze mee bezig was en gaf fijne persoonlijke begeleiding. Hier ga ik zeker weten nogmaals naartoe als ik weer in Berlijn zit. ', 5, 5, 5, 5, '2017-12-13', 'Active'),
(66, 84, 88, 'Test 2 stars', 2, 2, 2, 5, '2018-01-25', 'Active'),
(69, 84, 88, 'Test 5 star', 5, 5, 5, 5, '2018-01-25', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_timezone`
--

CREATE TABLE `cmd_timezone` (
  `timezid` int(11) NOT NULL,
  `tz` varchar(255) NOT NULL,
  `gmt` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd_timezone`
--

INSERT INTO `cmd_timezone` (`timezid`, `tz`, `gmt`) VALUES
(1, 'Pacific/Kwajalein', '(GMT -12:00) Eniwetok, Kwajalein'),
(2, 'Pacific/Samoa', '(GMT -11:00) Midway Island, Samoa'),
(3, 'Pacific/Honolulu', '(GMT -10:00) Hawaii'),
(4, 'America/Anchorage', '(GMT -9:00) Alaska'),
(5, 'America/Los_Angeles', '(GMT -8:00) Pacific Time (US & Canada) Los Angeles, Seattle'),
(6, 'America/Denver', '(GMT -7:00) Mountain Time (US & Canada) Denver'),
(7, 'America/Chicago', '(GMT -6:00) Central Time (US & Canada), Chicago, Mexico City'),
(8, 'America/New_York', '(GMT -5:00) Eastern Time (US & Canada), New York, Bogota, Lima'),
(9, 'Atlantic/Bermuda', '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz'),
(10, 'Canada/Newfoundland', '(GMT -3:30) Newfoundland'),
(11, 'Brazil/East', '(GMT -3:00) Brazil, Buenos Aires, Georgetown'),
(12, 'Atlantic/Azores', '(GMT -2:00) Mid-Atlantic'),
(13, 'Atlantic/Cape_Verde', '(GMT -1:00 hour) Azores, Cape Verde Islands'),
(14, 'Europe/London', '(GMT) Western Europe Time, London, Lisbon, Casablanca'),
(15, 'Europe/Brussels', '(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris'),
(16, 'Europe/Helsinki', '(GMT +2:00) Kaliningrad, South Africa'),
(17, 'Asia/Baghdad', '(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg'),
(18, 'Asia/Tehran', '(GMT +3:30) Tehran'),
(19, 'Asia/Baku', '(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi'),
(20, 'Asia/Kabul', '(GMT +4:30) Kabul'),
(21, 'Asia/Karachi', '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent'),
(22, 'Asia/Calcutta', '(GMT +5:30) Bombay, Calcutta, Madras, New Delhi'),
(23, 'Asia/Dhaka', '(GMT +6:00) Almaty, Dhaka, Colombo'),
(24, 'Asia/Bangkok', '(GMT +7:00) Bangkok, Hanoi, Jakarta'),
(25, 'Asia/Hong_Kong', '(GMT +8:00) Beijing, Perth, Singapore, Hong Kong'),
(26, 'Asia/Tokyo', '(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk'),
(27, 'Australia/Adelaide', '(GMT +9:30) Adelaide, Darwin'),
(28, 'Pacific/Guam', '(GMT +10:00) Eastern Australia, Guam, Vladivostok'),
(29, 'Asia/Magadan', '(GMT +11:00) Magadan, Solomon Islands, New Caledonia'),
(30, 'Pacific/Fiji', '(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_trainer_class`
--

CREATE TABLE `cmd_trainer_class` (
  `trainer_class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0',
  `trainer_class_name` varchar(255) DEFAULT NULL,
  `trainer_class_address` varchar(255) DEFAULT NULL,
  `trainer_class_price` decimal(10,2) DEFAULT NULL,
  `trainer_class_type` enum('Paid','Free') NOT NULL DEFAULT 'Paid',
  `trainer_class_image` varchar(255) DEFAULT NULL,
  `trainer_class_description` text NOT NULL,
  `class_no_of_booking` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `trainer_class_website_url` varchar(255) NOT NULL,
  `trainer_class_latitude` float NOT NULL DEFAULT '0',
  `trainer_class_longitute` float NOT NULL DEFAULT '0',
  `trainer_class_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmd_user`
--

CREATE TABLE `cmd_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `social` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_user`
--

INSERT INTO `cmd_user` (`user_id`, `email`, `password`, `user_type`, `password_reset_token`, `social`, `social_id`, `status`, `create_date`, `update_date`) VALUES
(1, 'admin@admin.com', 'ba4f4d06b2f7f62b8f3371603609cbb9', 'Admin', NULL, '', NULL, 'Active', '2017-04-25', '2017-04-25'),
(46, 'bdbdbdbdb@dghdfhdhdghd', '202cb962ac59075b964b07152d234b70', 'C', '', '', '', 'Inactive', '2017-04-27', '0000-00-00'),
(50, 'company@gmail.com', '202cb962ac59075b964b07152d234b70', 'C', '', '', '', 'Inactive', '2017-04-28', '2017-05-05'),
(58, 'jay_smith@theaquarious.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '', '', '', 'Active', '2017-05-03', '0000-00-00'),
(59, 'aa@aa', 'c20ad4d76fe97759aa27a0c99bff6710', 'M', '', '', '', 'Inactive', '2017-05-03', '0000-00-00'),
(60, 'waittingbipu@gmail.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-05-03', '0000-00-00'),
(61, 'joydeep@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '', '', '', 'Inactive', '2017-05-05', '0000-00-00'),
(64, 'mg@s-dna.com', '2bd62dbdb4b0d779048e94d1ec8decff', 'M', '', '', '', 'Active', '2017-05-05', '0000-00-00'),
(66, 'company@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'C', '', '', '', 'Active', '2017-05-10', '0000-00-00'),
(67, 'TEST@TEST.com', '033bd94b1168d7e4f0d644c3c95e35bf', 'M', '', '', '', 'Inactive', '2017-05-11', '0000-00-00'),
(69, 'TEST@TEST.nl', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-06-02', '0000-00-00'),
(70, 'TEST@TEST.nl', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-06-02', '0000-00-00'),
(74, 'judith.stapel@s-dna.com', 'c01756d04ef2b4f584e6f1ae309fd96e', 'M', '', '', '', 'Active', '2017-06-06', '2017-08-02'),
(75, 'joy@gmail.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-06-07', '0000-00-00'),
(76, 'joy@gmail.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-06-07', '0000-00-00'),
(77, 'joy@gmail.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-06-07', '0000-00-00'),
(80, 'dsfds@gmail.com', '833344d5e1432da82ef02e1301477ce8', 'M', '', '', '', 'Inactive', '2017-07-07', '0000-00-00'),
(84, 'TEST@judith.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-07-20', '0000-00-00'),
(86, 'dickvanwaes@me.com', 'bd38d62a2754dbe1b5b9c735fcc74cac', 'M', '', '', '', 'Active', '2017-07-21', '2017-07-21'),
(87, 'hogervorst.laura@gmail.com', '87004901696334d11ae0e388a4159391', 'M', '', '', '', 'Active', '2017-07-21', '2017-07-21'),
(88, 'eva.a.jackson@gmail.com', '896e5b7660850c47635173c2532fe0fc', 'M', '', '', '', 'Active', '2017-07-21', '2018-02-27'),
(89, 'stapel.judith@gmail.com', '77e211487d9da227a15cf588f4c420f5', 'M', '', '', '', 'Active', '2017-08-02', '2017-08-03'),
(90, 'marloesdeleeuw@hotmail.com', '2fcc2a912b9e9bfe075509461337ae2e', 'M', '', '', '', 'Active', '2017-08-03', '2017-08-03'),
(91, 'mbraber@amgen.com', '7f92699634d0317ca67b84f595a68530', 'M', '', '', '', 'Active', '2017-08-04', '2017-08-04'),
(92, 'Frony_t@hotmail.com', 'dca91c11333e7f2b2bc5fa2c60fec0c6', 'M', '', '', '', 'Active', '2017-08-04', '2017-08-04'),
(93, 'devreedec@hotmail.com', '7d7ade58f6caa2e9db06e662dde2ca6b', 'M', '', '', '', 'Active', '2017-08-07', '2017-08-07'),
(94, 'floortjemeijerink@hotmail.com', 'a9052bda6a05a56912759aa43f14d21b', 'M', '', '', '', 'Active', '2017-08-07', '2017-08-07'),
(95, 'judith@ilovethisconcept.com', 'fc994f1c7e85f1afb41069084d8f2783', 'T', '', '', '', 'Active', '2017-08-13', '2018-02-27'),
(96, 'clubmondain@ilovethisconcept.com', '202cb962ac59075b964b07152d234b70', 'C', '', '', '', 'Active', '2017-08-14', '2018-01-15'),
(98, 'test@admin.com', '202cb962ac59075b964b07152d234b70', 'M', '', '', '', 'Inactive', '2017-09-18', '0000-00-00'),
(99, 'test@123.nl', 'cc03e747a6afbbcbf8be7668acfebee5', 'M', '', '', '', 'Inactive', '2017-09-25', '0000-00-00'),
(100, 'dorianeroelofse@gmail.com', '3151f7486740e5b76c54d33f00f1b104', 'M', '', '', '', 'Active', '2017-09-27', '2017-09-27'),
(101, 'judith@ilovethisconcept.com', 'e10adc3949ba59abbe56e057f20f883e', 'C', '', '', '', 'Active', '2017-10-23', '0000-00-00'),
(103, 'test123@test.com', '827ccb0eea8a706c4c34a16891f84e7b', 'M', '', '', '', 'Inactive', '2017-11-03', '0000-00-00'),
(106, 'Sebastian.Sanchez@heineken.com', 'f996673df6e62488591aa5f5f5e5fe3a', 'M', '', '', '', 'Active', '2017-11-07', '2017-11-07'),
(118, 'info@dsm.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2017-12-04', '2018-10-03'),
(121, 'niels@amstradinggroup.com', '83cf9bf3e1ea93c8204a12d682e39507', 'M', '', '', '', 'Active', '2017-12-15', '2017-12-15'),
(127, 'suzannedeloos@gmail.com', '509229118876862eb4e69456076a2a84', 'M', '', '', '', 'Active', '2017-12-29', '2017-12-29'),
(128, 'nina.mijerink@hotmail.com', 'ac11ad6f2a8c4a2b759340f58c8d2eef', 'M', '', '', '', 'Active', '2018-01-02', '2018-01-02'),
(129, 'laura@geographical.co.uk', 'd3db26bca08b183902e53f6019856db1', 'M', '', '', '', 'Active', '2018-01-02', '2018-01-02'),
(131, 'ljchoek@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'M', '', '', '', 'Active', '2018-01-10', '2018-01-10'),
(134, 'c.m.rus@live.nl', 'd2ff889de79b9b9f83ba195cc5dee922', 'M', '', '', '', 'Inactive', '2018-01-10', '0000-00-00'),
(135, 'info@iworktheenergy.com ', 'df85f0d53a5fd2c83001c4656ae33ba7', 'M', '', '', '', 'Active', '2018-01-10', '0000-00-00'),
(136, 'annejet.middendorp@gmail.com', 'f6611111d5ae1932984e31e13711a133', 'M', '', '', '', 'Inactive', '2018-01-10', '0000-00-00'),
(137, 'mjic@kabelfoon.nl', 'a6fb58e4deea8c3896daf0ac38de0adf', 'M', '', '', '', 'Inactive', '2018-01-10', '0000-00-00'),
(138, 'p.a.j.m.peters@gmail.com', '0b348ee442d3a2778a89afac29556d1e', 'M', '', '', '', 'Inactive', '2018-01-10', '0000-00-00'),
(139, 'memartensraassen@gmail.com', '87fd5d8685258447c2323fa0581b237f', 'M', '', '', '', 'Inactive', '2018-01-10', '0000-00-00'),
(140, 'martijngoos@live.nl', '05a671c66aefea124cc08b76ea6d30bb', 'M', '', '', '', 'Active', '2018-01-10', '2018-01-10'),
(142, 'caty@coide.nl', '1a8296fa4c068fd0dafbbe66c6d8b031', 'M', '', '', '', 'Active', '2018-01-11', '2018-01-11'),
(143, 'mhirschel@gmail.com', '1ebcfe05e811d924718b4e8cdc6258fd', 'M', '', '', '', 'Active', '2018-01-11', '2018-01-11'),
(146, 'edwin.eijpe@gmail.com', '72df51b0e405b52ebe241a5cd70eeda6', 'M', '', '', '', 'Active', '2018-01-13', '2018-01-13'),
(148, 'info@bloemendeken.com', '7a60694145628b9dcf80e43ccbd1c461', 'M', '', '', '', 'Active', '2018-01-17', '2018-01-17'),
(157, 'go@clubmondain.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'C', '', '', '', 'Active', '2018-02-02', '2018-02-02'),
(159, 'eva@clubmondain.com', '162640d75ea9da53609c35b745596a57', 'C', '', '', '', 'Active', '2018-02-08', '2018-02-08'),
(160, 'job.hoefs@gmail.com', 'c7bf1746dc4d29a0516cfb4a15aea064', 'M', '', '', '', 'Active', '2018-02-10', '2018-02-13'),
(161, 'info@okura.nl', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-02-13', '2018-02-14'),
(164, 'm.leeuwdenbouter@nh-hotels.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-02-26', '2018-04-30'),
(166, 'ingrid@project-ing.nu', '579303a7bf884f6267206bc578e12fe3', 'M', '', '', '', 'Active', '2018-03-05', '2018-03-05'),
(167, 'ihogervorst@aeonplazahotels.com', 'ac11ad6f2a8c4a2b759340f58c8d2eef', 'M', '', '', '', 'Active', '2018-03-05', '2018-03-05'),
(168, 'nhcollectionkrasnapolsky@nh-hotels.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-03-12', '2018-03-12'),
(169, 'sales-marketing@aeonplazahotels.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-03-14', '0000-00-00'),
(170, 'reception.brussels@radissonred.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-03-20', '2018-03-20'),
(171, 'info.warsaw@radissonblu.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-03-20', '2018-03-20'),
(172, 'H2783@sofitel.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-03-21', '2018-04-30'),
(173, 'welcome@UtrechtCityApartments.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-04-04', '2018-04-16'),
(174, 'gs@renhotels.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-04-18', '0000-00-00'),
(175, 'davedevos.nl@gmail.com', '87497faf9c9b94917500908b07e83771', 'M', '', '', '', 'Active', '2018-04-22', '2018-04-22'),
(176, 'info@worldforum.nl', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-04-25', '2018-10-15'),
(177, 'leonhintzen@flow-how.nl', '76d0cb247d6926649242f18eb98d5464', 'M', '', '', '', 'Active', '2018-05-08', '2018-05-08'),
(181, 'marco-b.vries-de@dsm.com', 'fd326650da75e1da749b4026991864a1', 'M', '', '', '', 'Active', '2018-06-26', '2018-06-26'),
(182, 'Jeff.turner@dsm.com', '410ae93d4adcf0dff8236120f4f9a0ec', 'M', '', '', '', 'Active', '2018-06-26', '2018-06-26'),
(183, 'sindy.leimann@gmail.com', '13fbe58db8c4616da12fde949ce8c0fb', 'M', '', '', '', 'Inactive', '2018-07-05', '0000-00-00'),
(184, 'margot.theunisse@dsm.com', 'd14b017a4dbe906bff73e55ead44a5be', 'M', '', '', '', 'Active', '2018-07-09', '2018-07-09'),
(186, 'jairo.viana@dsm.com', '47615014c3c383e7788adbe134fa9cc3', 'M', '', '', '', 'Active', '2018-07-16', '2018-07-16'),
(189, 'jac.spijkers@dsm.com', '6a4e8f2932b673de87b00fa2017ae962', 'M', '', '', '', 'Active', '2018-07-25', '2018-07-25'),
(190, 'marlon76nl@hotmail.com', '87903c656fbd05ccac1c9cd8c638d177', 'M', '', '', '', 'Inactive', '2018-07-26', '0000-00-00'),
(191, 'koos.mencke@dsm.com', '4c4dcba21d8c314fdc2c769888b504a2', 'M', '', '', '', 'Active', '2018-07-27', '2018-07-27'),
(192, 'alexander.heuvel-van-den@dsm.com', '4b87461bd7e091b30a60a34cdd427812', 'M', '', '', '', 'Active', '2018-08-13', '2018-08-13'),
(193, 'jogarland@gmail.com', '4d986f77d8b0e9daebb954e5e76e5366', 'M', '', '', '', 'Active', '2018-08-14', '2018-08-14'),
(194, 'ralph.ramaekers@dsm.com', '45b45c21a0cdd1479235e69c936a09e6', 'M', '', '', '', 'Active', '2018-08-23', '2018-08-23'),
(195, 'bart.janssen@dsm.com', '090c826dfa97b507ba1748c08cf3d6fc', 'M', '', '', '', 'Active', '2018-08-24', '2018-08-24'),
(196, 'leon.gubbels@dsm.com', '8b8a970946afc42371b41e2e364e17c1', 'M', '', '', '', 'Active', '2018-08-24', '2018-08-24'),
(198, 'ajaysingh.kang@dsm.com', '2efaf7e756f63d1e9ddd819a64272a79', 'M', '', '', '', 'Active', '2018-08-27', '2018-08-27'),
(199, 'hans.meulman@dsm.com', 'e2eed78a27a0550e0b043eaf9162a805', 'M', '', '', '', 'Active', '2018-08-27', '2018-08-27'),
(200, 'kasp0208@gmail.com', '42568072dc776d9a52f1f5dbfa4e39d1', 'M', '', '', '', 'Active', '2018-08-28', '2018-08-28'),
(201, 'judith.wiese@dsm.com', '6881272c458c82e89b393f2320a54e20', 'M', '', '', '', 'Active', '2018-08-29', '2018-08-29'),
(202, 'Brune.Singh@dsm.com', 'fd30d977f051148f68c7bfda902cdcff', 'M', '', '', '', 'Active', '2018-08-30', '2018-08-30'),
(203, 'jacko.aerts@dsm.com', 'b28f9833972915b58a3bf1b4ad85715f', 'M', '', '', '', 'Active', '2018-08-31', '2018-08-31'),
(204, 'vitalityincongress@clubmondain.com', 'bffef5b042459d7cdd2c082c28bb171d', 'C', '', '', '', 'Active', '2018-09-07', '2018-09-07'),
(206, 'ger.hellenbrand@dsm.com', 'fd30d977f051148f68c7bfda902cdcff', 'M', '', '', '', 'Active', '2018-09-14', '2018-09-14'),
(207, 'Jacobine.dasGupta@dsm.com', 'cc737bfa76db37321f19fc2f2214597d', 'M', '', '', '', 'Active', '2018-09-14', '2018-09-14'),
(208, 'simone.reijnders@dsm.com', 'e85970efa13f4ba3c23fe79133fc8027', 'M', '', '', '', 'Active', '2018-09-14', '2018-09-14'),
(209, 'henk-jan.koenen@dsm.com', '71b2363c52feed7047b74a95ccdbf7dc', 'M', '', '', '', 'Active', '2018-09-17', '2018-09-17'),
(211, 'arnab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '', '', '', 'Active', '2018-09-25', '2018-09-25'),
(212, 'aquatechdev2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '', '', '', 'Active', '2018-09-25', '2018-09-25'),
(214, 'Herman.Bruns@dsm.com', '5e6b27516a435ba8c6608e7b294f7e8d', 'M', '', '', '', 'Active', '2018-09-26', '2018-09-26'),
(218, 'tim.vorage@dsm.com', 'd9348a197ed9063c309c61a9c018a945', 'M', '', '', '', 'Active', '2018-10-02', '2018-10-02'),
(220, 'erik.becker@dsm.com', '163943aeccdd0bb1c4706a9398e682b3', 'M', '', '', '', 'Active', '2018-10-08', '2018-10-08'),
(225, 'mukuka.nkunde@yahoo.com', 'e4d15763933faecc1eb4c53bc9a727d3', 'M', '', '', '', 'Inactive', '2018-10-15', '0000-00-00'),
(227, 'womaniamtoday@gmail.com', '8a831455f4a6e63ec40959c7856ff40e', 'M', '', '', '', 'Inactive', '2018-10-15', '0000-00-00'),
(228, 'Davide.Reverdito-Bove@dsm.com', 'aa83c3a078af615e5b40d365aa01bef2', 'M', '', '', '', 'Active', '2018-11-12', '2018-11-12'),
(229, 'nicola.sicchieri@dsm.com', 'f320028dd5e4f9bf047d2948258a347a', 'M', '', '', '', 'Active', '2018-11-16', '2018-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `cmd_user_details`
--

CREATE TABLE `cmd_user_details` (
  `user_details_id` int(11) NOT NULL COMMENT 'Primary Key',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'User Table Foreign Key',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL COMMENT 'This field will be used for Company only',
  `phone` varchar(255) DEFAULT NULL,
  `company_description` text COMMENT 'This field will be used for Company only',
  `user_image` varchar(255) DEFAULT NULL,
  `about_us` varchar(255) DEFAULT NULL COMMENT 'This field will be used for both trainer & company',
  `membership_id` int(11) NOT NULL DEFAULT '0',
  `privacy_policy` tinyint(1) NOT NULL DEFAULT '0',
  `membership_rules` tinyint(1) NOT NULL DEFAULT '0',
  `company_person` varchar(255) DEFAULT NULL COMMENT 'This field will be used for Company only',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `member_other` varchar(255) DEFAULT NULL COMMENT 'This field will be used for Member only',
  `trainer_experience` text COMMENT 'This field will be used for Trainer only',
  `trainer_about_yourself` varchar(255) DEFAULT NULL,
  `member_company_name` varchar(255) DEFAULT NULL,
  `member_function_title` varchar(255) DEFAULT NULL,
  `fild_permission` varchar(255) DEFAULT NULL,
  `user_facebook` varchar(255) DEFAULT NULL,
  `user_instagram` varchar(255) DEFAULT NULL,
  `user_twitter` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `update_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd_user_details`
--

INSERT INTO `cmd_user_details` (`user_details_id`, `user_id`, `first_name`, `last_name`, `company_name`, `phone`, `company_description`, `user_image`, `about_us`, `membership_id`, `privacy_policy`, `membership_rules`, `company_person`, `dob`, `member_other`, `trainer_experience`, `trainer_about_yourself`, `member_company_name`, `member_function_title`, `fild_permission`, `user_facebook`, `user_instagram`, `user_twitter`, `create_date`, `update_date`) VALUES
(1, 1, 'Team of', 'Club Mondain ', NULL, '1234567890', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-25', '2017-04-25'),
(54, 58, 'Jay', 'Smith', NULL, '0035351236458', NULL, '1504079929_wallpaper_511.jpg', NULL, 1, 1, 1, NULL, '1985-02-17', 'Experienced Vice President Sales Marketing with a demonstrated history of working in the Information Technology and services industry. Strong sales professional with a Master of Business Administration (MBA)', NULL, NULL, 'The Urban Nature', 'Business Analyst', '', 'http://www.facebook.com/', 'http://www.instagram.com/', 'http://twitter.com/', '2017-05-03', '2018-10-25'),
(60, 64, 'Marcel', 'Groenewegen', NULL, '31611387089', NULL, '1517316274_foto linked mg.png.png', NULL, 1, 1, 1, NULL, '1970-09-10', '', NULL, NULL, '1970', '', '', 'http://www.facebook.com/marcel.groenewegen.7', 'http://', 'http://', '2017-05-05', '2018-01-30'),
(70, 74, 'Judith', 'Stapel ', NULL, '0646330930', NULL, '', 'I live for movement, to see the world, meet new kind and fun people and explore new ways of staying healthy. \\\\\\\\r\\\\\\\\nI love to discover traditional ways of keeping fit in every country I am in and love to share it with you. \\\\\\\\r\\\\\\\\n\\\\\\\\r\\\\\\\\nNext I am', 1, 1, 1, NULL, '1984-08-16', 'I am exited to find out what kind of sports and healthy rites exist in the world. I cannot wait to explore them. I am continious travelling for my work as this is my passion in my life to meet new people and learn from them.', NULL, NULL, 'Club Mondain', 'Founder', NULL, '', '', '', '2017-06-06', '2017-08-02'),
(82, 86, 'Dick', 'Van Waes', NULL, '', NULL, '1500641061_dickvanwaes.jpg', NULL, 1, 1, 1, NULL, '1964-06-15', '                    Trainen voor halve marathon -  2017 najaar. ', NULL, NULL, 'Atricure', 'Senior Director Sales Operations International ', NULL, 'http://', 'http://', 'http://', '2017-07-21', '2017-07-21'),
(83, 87, 'Laura ', 'Hogervorst', NULL, '0031611322069', NULL, '1500641898_laurahogervorst.jpg', NULL, 1, 1, 1, NULL, '1986-07-24', 'Like to meet new people, new cultures. \\r\\nConcerned about my health in a light and fun way. Love to dance. ', NULL, NULL, 'Connecting Yourney\\\'s', 'Owner', NULL, NULL, NULL, NULL, '2017-07-21', '0000-00-00'),
(84, 88, 'Eva ', 'Jackson', NULL, '0031681470280', NULL, '1511130851_portrait_10.jpg', '', 6, 1, 1, NULL, '1984-11-28', 'Fun loving world citizen, always keen to discover new ways of life. Categories: Fitness, Juicebar, Vegan, Running, Meditation', NULL, NULL, 'Power-U ', 'Founder, CEO and Coach', '', 'http://www.facebook.com/PowerUCoaching/', 'http://', 'http://twitter.com/@PowerU17', '2017-07-21', '2018-02-27'),
(85, 89, 'Judith', 'Stapel', NULL, '0646330930', NULL, '1501673749_Judith Stapel.jpg', '', 1, 1, 1, NULL, '1984-08-16', 'Founder of Club Mondain. Live for movement and vibrant life', NULL, NULL, 'Club Mondain', 'Founder', '1,2,3', 'http://', 'http://', 'http://', '2017-08-02', '2017-12-06'),
(86, 90, 'Marloes ', 'de Leeuw', NULL, '0617238771', NULL, '', NULL, 1, 1, 1, NULL, '1977-09-17', 'I train for the Dam to Dam. ', NULL, NULL, 'KLM', 'Captain Attendant (C.A>)', NULL, NULL, NULL, NULL, '2017-08-03', '0000-00-00'),
(87, 91, 'Marieke', 'Braber', NULL, '0765732918', NULL, '1501834202_MariekeBraberjpg.jpg', NULL, 1, 1, 1, NULL, '1980-04-28', 'Working mainly throughout Europe for Amgen. Loving my job, enjoy to stay healthy during my travels. ', NULL, NULL, 'Amgen', 'Training and Development Manager', NULL, NULL, NULL, NULL, '2017-08-04', '0000-00-00'),
(88, 92, 'Frony ', 'Tropper', NULL, '0618487885', NULL, '1501854288_Frony Tropper.jpg', NULL, 1, 1, 1, NULL, '1987-07-17', 'Young vibrant women looking for healthy food hotspots on my  business travels. Love to connect on that subject.', NULL, NULL, 'BNP Paribas', 'Relationship Manager', '3', 'http://', 'http://', 'http://', '2017-08-04', '2017-12-11'),
(89, 93, 'Chantal', 'de Vreede', NULL, '0650415663', NULL, '1502106260_Chantal de Vreede.jpg', NULL, 1, 1, 1, NULL, '1980-03-06', 'Interested in Biological restaurants, yoga classes or bootcamp outdoors', NULL, NULL, 'ISS', 'Human Resource Manager', NULL, NULL, NULL, NULL, '2017-08-07', '0000-00-00'),
(90, 94, 'Floortje', 'Meijerink', NULL, '0031652147446', NULL, '1502108876_FloortjeMeijerink.jpg', NULL, 1, 1, 1, NULL, '1991-07-12', 'Outgoing, energetic and always on the move. Love travel and eager to try new places. Yoga, dancing and fitness are my go to sport activities.', NULL, NULL, 'KLM', 'Cabin Attendant (C.A.) ', '', 'http://', 'http://', 'http://', '2017-08-07', '2017-12-11'),
(91, 95, 'Rob', 'de Winter', NULL, '', NULL, '', 'client_check', 3, 1, 1, NULL, '1917-01-17', NULL, 'Thank you for visiting my profile. I provide Personal Training classes on location. My expertise is body weight excerises and alignment of the body.', 'Thank you for visiting my profile. I provide Personal Training classes on location. My expertise is body weight excerises and alignment of the body.', 'Ilovethisconcept.com', 'Founder', '2', 'http://', 'http://', 'http://', '2017-08-13', '2018-02-27'),
(92, 96, NULL, NULL, 'Club Mondain', '123', 'YO', '', 'client_check', 2, 1, 1, 'JS', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2017-08-14', '2018-01-15'),
(96, 100, 'Doriane', 'Roelofse', NULL, '0033626492791', NULL, '1507534932_Doriane Roelofse Linkedin.jpg', '', 1, 1, 1, NULL, '1988-10-23', 'Aiming to stay fit while I am discovering the beautiful cities of the world during business trips.', NULL, NULL, 'Capgemini', 'Auditor', NULL, 'http://', 'http://', 'http://', '2017-09-27', '2017-10-09'),
(97, 101, NULL, NULL, 'Ilovethisconcept.com', '', 'Ilovethisconcept.com', '', 'other_check', 2, 1, 1, 'Judith Stapel', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-23', '0000-00-00'),
(102, 106, 'Sebastian', 'Sanchez', NULL, '0622324373', NULL, '1510067958_Sebastian Sanchez.jpeg', NULL, 1, 1, 1, NULL, '1907-09-07', '', NULL, NULL, 'Heineken Inernational', 'Sr Director Global Innovation', '2,3,4', 'http://', 'http://', 'http://', '2017-11-07', '2017-12-11'),
(114, 118, NULL, NULL, 'DSM', '0455782981', 'Royal DSM is a purpose-led global science-based company in Nutrition, Health and Sustainable Living. ', '1538563668_160x160 DSM logo.jpg', 'client_check,aricle_check', 5, 1, 1, 'DSM', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://www.facebook.com/events/369999423500430/', 'http://', 'http://', '2017-12-04', '2018-10-03'),
(117, 121, 'Niels', 'Koops', NULL, '0031630578767', NULL, '1513332137_Screen Shot 2017-12-13 at 18.43.53.jpg', NULL, 1, 1, 1, NULL, '1983-01-01', '', NULL, NULL, 'AMS Trading Group', 'Founder', '', 'http://', 'http://', 'http://twitter.com/Niels_AMS', '2017-12-15', '2017-12-15'),
(123, 127, 'Suus', 'de Loos', NULL, '0631654840', NULL, '', NULL, 1, 1, 1, NULL, '1970-10-19', 'Aiming at a healthier lifestyle and interested in discovering new places and people.', NULL, NULL, 'Suzanne de Loos Translations', 'Translator', NULL, NULL, NULL, NULL, '2017-12-29', '0000-00-00'),
(124, 128, 'Nina', 'Mijerink', NULL, '316 52147512', NULL, '1514884613_Nina Mijerink.jpg', NULL, 1, 1, 1, NULL, '1987-01-01', 'Loves to travel and discover new foods', NULL, NULL, 'Campanella Retail', 'Marketeer', NULL, NULL, NULL, NULL, '2018-01-02', '0000-00-00'),
(125, 129, 'Laura', 'Cole', NULL, '447972151208', NULL, '', NULL, 1, 1, 1, NULL, '1993-02-05', 'Features writer, outdoor enthusiast, looking to meet like-minded creatives', NULL, NULL, '', 'Journalist', '2,3', 'http://', 'http://', 'http://', '2018-01-02', '2018-01-02'),
(127, 131, 'Laurens', 'Hoek', NULL, '0638428214', NULL, '1515589678_Laurens.jpg', NULL, 1, 1, 1, NULL, '1998-10-07', 'Always looking for a new adventure', NULL, NULL, 'S-DNA', 'Assistant Account Manager', '', 'http://', 'http://', 'http://', '2018-01-10', '2018-01-11'),
(130, 134, 'Clara', 'Rus', NULL, '0031622932464', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(131, 135, 'Francisca ', 'Borsboom ', NULL, '0619206237', NULL, NULL, NULL, 1, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(132, 136, 'Annejet', 'Middendorp', NULL, '', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(133, 137, 'Chris', 'Stapel', NULL, '0651280734', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(134, 138, 'Pieter ', 'Peters ', NULL, '0636109067', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(135, 139, 'Marsha', 'Martens Raassen', NULL, '0031610496470', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(136, 140, 'Martijn', 'Goossens', NULL, '', NULL, '', NULL, 1, 1, 1, NULL, '1985-09-22', '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2018-01-10', '0000-00-00'),
(138, 142, 'Caty', 'Hendriks', NULL, '', NULL, '', NULL, 1, 1, 1, NULL, '1972-05-18', '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2018-01-11', '0000-00-00'),
(139, 143, 'Max', 'Hirschel', NULL, '', NULL, '1515656179_IMG-20171229-WA0000.jpg', NULL, 1, 1, 1, NULL, '1988-05-04', '', NULL, NULL, 'Sunny Games', 'Owner', NULL, NULL, NULL, NULL, '2018-01-11', '0000-00-00'),
(142, 146, 'Edwin', 'Eijpe', NULL, '0625483490', NULL, '1515855983_IMG-20180111-WA0003.jpg', NULL, 1, 1, 1, NULL, '1981-08-10', 'Motorcycling, camping', NULL, NULL, 'Talent ontdekken', 'Talent coach', NULL, NULL, NULL, NULL, '2018-01-13', '0000-00-00'),
(144, 148, 'Annie', 'Steengracht', NULL, '0031626510005', NULL, '1516203226_55C0D796-94ED-4AF6-BFC3-A457773E8410.jpeg', NULL, 1, 1, 1, NULL, '1970-03-12', '', NULL, NULL, 'Bloemendeken', 'Owner', NULL, NULL, NULL, NULL, '2018-01-17', '0000-00-00'),
(153, 157, NULL, NULL, 'W Barcelona', '0987654321', 'Designed by world-renowned architect Ricardo Bofill, W Barcelona sets the scene for a spectacular stay. Located on the beachfront along the famous Barceloneta boardwalk. Check into one of our 473 fabulous guestrooms & suites boasting panoramic views over the Mediterranean and city of Barcelona.\\r\\n\\r\\nMix it up and dine in style at chef Carlos Abellán’s BRAVO24. Get glamorous on our 26th-floor hotspot, at ECLIPSE rooftop bar, or make your way down to our signature Living Room to find WAVE & the W LOUNGE for a cocktail (or two).', '1517584178_W Barcleona.jpg', 'client_check', 2, 1, 1, 'Heloisa Mondain', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-02-02', '2018-02-02'),
(155, 159, NULL, NULL, 'Doubletree by Hilton', '0681470280', 'Set in the heart of the historic city, DoubleTree by Hilton Amsterdam Centraal Station places business and leisure guests within reach of Amsterdam’s famous shopping streets and cultural heritage sites.', '1518112247_Double Tree.jpg', 'client_check', 2, 1, 1, 'Double Tree by Hilton', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://www.facebook.com/Doubletree/', 'http://', 'http://', '2018-02-08', '2018-02-08'),
(156, 160, 'Job', 'Hoefs', NULL, '0622911679', NULL, '1518277574_Job-Avatar-Yellowstone-Academy.jpg', '', 1, 1, 1, NULL, '1985-06-12', '', NULL, NULL, 'Yellowstone', 'Founder', NULL, '', '', '', '2018-02-10', '2018-02-13'),
(157, 161, NULL, NULL, 'Hotel Okura Amsterdam', '0206787111', 'Hotel Okura Amsterdam is located along the Amstel Canal, and conveniently situated with regard to access to locations of interest. With 300 comfortable rooms, including the largest (485m2) and most luxurious suite of the Benelux Countries, Hotel Okura Amsterdam offers unrivalled high-class accommodation facilities.For wining and dining, you are spoilt for choice at Hotel Okura Amsterdam. ', '1518536156_Okura Amsterdam,.jpg', 'other_check', 2, 1, 1, 'Hotel Okura Amsterdam', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2018-02-13', '2018-02-14'),
(160, 164, NULL, NULL, 'Hotel NH Collection Amsterdam Doelen', '0205540600', 'The NH Collection Amsterdam Doelen hotel is the oldest and most famous in Amsterdam. Dating back to the 17th century, and completely renovated in 2016, this beautiful building sits on the banks of the Amstel river in the heart of the city’s historic center. Small wonder that everyone from Queen Victoria to the Beatles have stayed here. \r\n', '1519748388_NH Doelen Amsterdam.jpg', 'client_check', 2, 1, 1, 'Hotel NH Collection Amsterdam Doelen', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-02-26', '2018-04-30'),
(162, 166, 'Ingrid', 'van Rest', NULL, '0617502614', NULL, '1520241276_0616-EOTEDx070 kopie.jpg', NULL, 1, 1, 1, NULL, '1985-01-18', '', NULL, NULL, 'Project Ing', 'Freelance Project Manager', '3', 'http://', 'http://', 'http://', '2018-03-05', '2018-03-12'),
(163, 167, 'Ilona', 'Hogervorst', NULL, '0614440478', NULL, '1520248768_Ilona Hogervorst.jpg', NULL, 1, 1, 1, NULL, '1982-10-13', 'Business professional who enjoys the beach and being outdoors. Interested in meeting new people and expand my network', NULL, NULL, 'Aeon Plaza Hotels', 'Revenue Manager', '3', 'http://', 'http://', 'http://', '2018-03-05', '2018-03-06'),
(164, 168, NULL, NULL, 'NH Collection Grand Hotel Krasnapolsky', '31(0) 20 554 9111', 'A magnificent historic building with an exceptional location in the heart of the city, the NH Collection Amsterdam Grand Hotel Krasnapolsky dates back to 1855. It is situated on the main square, and enjoys spectacular views of the Royal Palace.  The hotel’s exclusive dining experience includes a 60-seater Michelin starred restaurant in a beautiful, listed 19th-century room. There’s also a café open for lunch, dinner or afternoon tea. Make the most out of your stay in Amsterdam with the help of our Guest Relations team\\\'s expertise. ', '1520863189_nh_collection_grand_hotel_krasnapolsky-194-facade.jpg', 'client_check', 2, 1, 1, 'NH Collection Grand Hotel Krasnapolsky', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-03-12', '2018-03-12'),
(165, 169, NULL, NULL, 'Dutch Design Hotel Artemis', '0207141000', 'Dutch Design is evident throughout Dutch Design Hotel Artemis, from the architecture of the building and the restaurant to different desing furniture in the lobby as well as the hotel rooms. All rooms have large windows from floor to ceiling creating a light and airy ambiance. With the use of natural materials and colours, the floating night stands and desk every room is a comfortable space to sleep, work and relax in.', '1521064340_Artemis facade.jpg', 'other_check', 2, 1, 1, 'Ilona Hogervorst', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-14', '0000-00-00'),
(166, 170, NULL, NULL, 'Radisson RED Brussel', '322 626 81 11', 'We’ve taken care of the essentials, like free high speed WiFi, manning the bar, and showcasing the best local flavors in the OUIBar +KTCHN; so that you can focus on creating a better trip. Our unique model means you’re in control. From keyless entry, to requesting extra pillows. Use the app to get what you need AND what you want.', '1521558457_Raddison Red Brussels.jpg', 'client_check,other_check', 2, 1, 1, 'Radisson RED Brussels', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-03-20', '2018-03-20'),
(167, 171, NULL, NULL, 'Radisson Blu Centrum Hotel', '4822 321 8888', 'This city-center location offers the ideal spot to take a break and enjoy drinks with a colleague or regroup from a busy day of meetings. Visitors and locals alike take advantage of our ground-floor bar in the energetic business district of Warsaw.', '1521561390_Radisson Blu Centrum Hotel.jpg', 'client_check', 2, 1, 1, 'Radisson Blu Centrum Hotel', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-03-20', '2018-03-20'),
(168, 172, NULL, NULL, 'Sofitel Legend The Grand Amsterdam', '0205553111', 'Located between two gentle canals in the heart of the city, Sofitel Legend The Grand boasts a rich history. The Grand offers five-star luxury in a unique \\\\\\\\\\\\\\\"Amsterdam\\\\\\\\\\\\\\\" ambiance, furnished with French elegance and grandeur. The rooms, restaurant Bridges, the banqueting halls and the beautiful garden terrace captivate and seduce everyone into visiting the hotel.', '1522273521_Sofitel the grand.jpg', 'client_check', 2, 1, 1, 'Sofitel Legend The Grand Amsterdam', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-03-21', '2018-04-30'),
(169, 173, NULL, NULL, 'Utrecht City Apartments', '+31302317100', 'We believe that your stay in Utrecht should not only be practical, but also unique and amazing. With our down to earth and personal service and genuine attention for every guest, we strive to create a home away from home feeling day in day out. ', '1523876455_Executive Utrecht City Apartments.jpg', 'client_check,aricle_check', 2, 1, 1, 'Utrecht City Apartments', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-04-04', '2018-04-16'),
(170, 174, NULL, NULL, 'Renaissance Amsterdam Hotel', '0031206212223', 'A contemporary experience is yours to discover at the Renaissance Amsterdam Hotel. An ideal destination for both business and leisure travelers to the Netherlands, our hotel boasts a prime location in the heart of central Amsterdam; we provide simple access to a vast range of the city\\\'s best-known landmarks. ', '1524049592_Renaissance Hotel.jpg', 'other_check', 2, 1, 1, 'Renaissance Amsterdam Hotel', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-18', '0000-00-00'),
(171, 175, 'Dave', 'de Vos', NULL, '', NULL, '', NULL, 1, 1, 1, NULL, '1986-05-11', '', NULL, NULL, 'Wondervos', '', NULL, NULL, NULL, NULL, '2018-04-22', '0000-00-00'),
(172, 176, NULL, NULL, 'World Forum The Hague', '0031703066366', 'The World Forum The Hague is proud to be hosting the One Young World Summit 2018. From Wednesday 17th of October noon until Saturday 20th of October 2018 the doors will be open to current and all aspiring leaders of tomorrow.', '1526473432_6 Queen Maxima & Expo.jpg', 'client_check', 2, 1, 1, 'World Forum The Hague', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://www.facebook.com/WorldForumTheHague', 'http://www.instagram.com/worldforum_thehague/', 'http://twitter.com/WorldForum_', '2018-04-25', '2018-10-15'),
(173, 177, 'Leon', 'Hintzen', NULL, '31640618242', NULL, '1525767390_Leon Hintzen.jpg', NULL, 1, 1, 1, NULL, '1963-10-29', 'I am passionate about sports and nature and like working and living in continuously improving environments, energetically moving forward in life ! ', NULL, NULL, 'Flow How', 'Trainer', '', 'http://', 'http://', 'http://', '2018-05-08', '2018-05-08'),
(177, 181, 'Marco', 'de Vries', NULL, '0031630628420', NULL, '1530712486_Marco B. de Vries.jpg', NULL, 1, 1, 1, NULL, '1976-10-31', 'Hard working family man, trying to stay fit as efficient as possible. My goals are (i) at least a 5k run 3 times a week, (ii) find a structural way to have basic exercise per day, (iii) keep rhythm during bizz travel', NULL, NULL, 'DSM', 'International Customs Manager', '2,3', 'http://', 'http://', 'http://', '2018-06-26', '2018-08-10'),
(178, 182, 'Jeff', 'Turner', NULL, '31630539194', NULL, '1533025103_No photo.png', NULL, 1, 1, 1, NULL, '1963-05-16', 'Always striving for balanced performance in all that I do.', NULL, NULL, 'DSM', 'Vice President Sustainability', '2,3', 'http://', 'http://', 'http://', '2018-06-26', '2018-07-31'),
(179, 183, 'Sindy', 'LC', NULL, '0624906421', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-05', '0000-00-00'),
(180, 184, 'Margot', 'Theunisse', NULL, '0031620596802', NULL, '1533025188_No photo.png', NULL, 1, 1, 1, NULL, '1962-08-26', '', NULL, NULL, 'DSM', 'Quality Manager', '1,2,3', 'http://', 'http://', 'http://', '2018-07-09', '2018-07-31'),
(182, 186, 'Jairo', 'Viana', NULL, '0613646671', NULL, '1531744989_Jairo Viana DSM.jpg', NULL, 1, 1, 1, NULL, '1977-07-14', 'I am a triathlete therefore passionate about outdoor sports. When traveling abroad I like exploring the city on a run / walk / bike ride.', NULL, NULL, 'DSM', 'Strategic Partnership Manager', '2,3', 'http://', 'http://', 'http://', '2018-07-16', '2018-07-16'),
(185, 189, 'Jac', 'Spijkers', NULL, '0651105820', NULL, '1532692989_Jac Spijkers - DSM Dyneema.jpg', NULL, 1, 1, 1, NULL, '1963-09-20', 'Marathon runner recovering from an injury. \\\\\\\\r\\\\\\\\nLot\\\\\\\\\\\\\\\'s of travel in the EMEA region. In spare time secretary at AV Unitas and running coach\\\\\\\\r\\\\\\\\nLove to wine and dine :-):-)', NULL, NULL, 'DSM', 'Application Manager', '', 'http://', 'http://', 'http://@JacSpijkers', '2018-07-25', '2018-07-27'),
(186, 190, 'Marlon', 'Linnemann', NULL, '31642274467', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26', '0000-00-00'),
(187, 191, 'Koos', 'Mencke', NULL, '0031620547869', NULL, '1532679721_Koos.png', NULL, 1, 1, 1, NULL, '1960-05-19', 'I enjoy working with people from other cultures and find my challenges on cross fertilization of various technologies. Outdoor sports like hiking and cycling are ways I keep balanced.', NULL, NULL, 'DSM', ' Innovatie manager', '1,2,3,4', 'http://', 'http://', 'http://', '2018-07-27', '2018-08-23'),
(188, 192, 'Alexander', 'van den Heuvel', NULL, '0455782910', NULL, '1534167670_Alexander van den Heuvel.jpg', NULL, 1, 1, 1, NULL, '1974-04-01', 'I aim to feel fit and stay active as much as possible through sports in order to enjoy time with my family.', NULL, NULL, 'DSM', 'Group Cash Manager', '1,2,3', 'http://', 'http://', 'http://', '2018-08-13', '2018-08-13'),
(189, 193, 'Johanne', 'Bade', NULL, '', NULL, '1534242590_CA2AF22E-5ECF-4675-87B7-0A353C191CC0.jpeg', NULL, 1, 1, 1, NULL, '1983-12-01', 'Full-time mom and entrepreneur who loves to be outdoors, travel and enjoy life to the fullest!', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2018-08-14', '0000-00-00'),
(190, 194, 'Ralph', 'Ramaekers', NULL, '31610246691', NULL, '1535017153_Profielfoto 2 Meet extreme.jpg', NULL, 1, 1, 1, NULL, '1969-07-21', '', NULL, NULL, 'DSM', 'Global Business Director Stanyl', NULL, NULL, NULL, NULL, '2018-08-23', '0000-00-00'),
(191, 195, 'Bart', 'Janssen', NULL, '0031653804977', NULL, '1535116138_002.JPG', NULL, 1, 1, 1, NULL, '1961-10-10', '', NULL, NULL, 'DSM', 'project manager', NULL, NULL, NULL, NULL, '2018-08-24', '0000-00-00'),
(192, 196, 'Leon', 'Gubbels', NULL, '0031630907164', NULL, '', NULL, 1, 1, 1, NULL, '1967-09-20', 'Having for more then 20 years a \\\"married\\\" life with my wonderful girlfriend Audrey in the smallest part of the Netherlands. \\r\\nHobbies: Soccer, Tennis, Skiing, Running, Fitness, Reading books, Playing games, Family and Friends.', NULL, NULL, 'DSMDyneema', 'Quality Assurance engineer', NULL, NULL, NULL, NULL, '2018-08-24', '0000-00-00'),
(194, 198, 'Ajay', 'Kang', NULL, '0031652736732', NULL, '1535365590_Ajay 2x2.jpg', NULL, 1, 1, 1, NULL, '1963-02-26', 'Good health, balanced mind and focus are key to better life.', NULL, NULL, '', 'Head of Security', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-08-27', '2018-08-27'),
(195, 199, 'Hans', 'Meulman', NULL, '0031620456832', NULL, '1535369983_Hans Meulman 2016_small.jpg', NULL, 1, 1, 1, NULL, '1968-05-24', 'Movement is important to me. Have completed the Global 10.000 steps a day challenge in 2018.', NULL, NULL, 'DSM', 'Sr. Technical Application Manager', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-08-27', '2018-08-27'),
(196, 200, 'Kasper', 'Andersen', NULL, '', NULL, '', NULL, 1, 1, 1, NULL, '1990-08-02', '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2018-08-28', '0000-00-00'),
(197, 201, 'Judith', 'Wiese', NULL, '0611181013', NULL, '1535546050_Wiese_Judith_1.jpg', NULL, 1, 1, 1, NULL, '1971-01-30', 'Active professional who travels the world whilst keeping vitality a top priority', NULL, NULL, 'DSM', 'CHRO', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-08-29', '2018-08-29'),
(198, 202, 'Bruné', 'Singh', NULL, '0455782902', NULL, '1535631501_Bruné Singh.png', NULL, 1, 1, 1, NULL, '1972-12-12', 'I believe in taking small practical steps in my journey to better vitality towards new routines. Love swimming and can hike for hours in my leisure time to unwind.', NULL, NULL, 'DSM', 'Vice President Group Treasury', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-08-30', '2018-08-30'),
(199, 203, 'Jacko', 'Aerts', NULL, '0031651825259', NULL, '', NULL, 1, 1, 1, NULL, '1962-09-29', '', NULL, NULL, 'DSM', 'Corporate Expert Materials & Corrosion / LTE', NULL, NULL, NULL, NULL, '2018-08-31', '0000-00-00'),
(200, 204, NULL, NULL, 'One Young World', '', 'We stage an annual Summit where the most valuable young talent from global and national companies, NGOs, universities and other forward-thinking organisations are joined by world leaders, acting as the One Young World Counsellors. At the Summit, delegates debate, formulate and share innovative solutions for the pressing issues the world faces.', '1536329808_OYW logo.png', 'client_check', 2, 1, 1, 'One Young World', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'http://', 'http://', 'http://', '2018-09-07', '2018-09-07'),
(202, 206, 'Ger', 'Hellenbrand', NULL, '045 5782907', NULL, '1536917916_Ger Hellenbrand.jpg', NULL, 1, 1, 1, NULL, '1956-04-01', 'Traveling for both business and personal reasons. Enjoy being outdoors whether hiking or playing a game of tennis.', NULL, NULL, 'DSM', 'Manager Corporate Finance', NULL, NULL, NULL, NULL, '2018-09-14', '0000-00-00'),
(203, 207, 'Jacobine', 'Das Gupta', NULL, '0683636562', NULL, '', NULL, 1, 1, 1, NULL, '1963-10-10', 'Energetic and active professional. Enjoy being creative or involved in innovative ways to make an impact with sustainable and nutritional innovations.', NULL, NULL, 'DSM', 'Director Sustainability', NULL, NULL, NULL, NULL, '2018-09-14', '0000-00-00'),
(204, 208, 'Simone', 'Reijnders', NULL, '0031625713871', NULL, '1536918517_Simone Reijnders.jpg', NULL, 1, 1, 1, NULL, '1990-03-19', 'Finance professional who likes to combine fun and health.', NULL, NULL, 'DSM', 'Senior Reporting & Control ', '1,2,3,4', 'http://', 'http://', 'http://', '2018-09-14', '2018-09-20'),
(205, 209, 'Henk-Jan', 'Koenen', NULL, '0012244021210', NULL, '1537184369_Henk-Jan Koenen.jpg', NULL, 1, 1, 1, NULL, '1961-09-11', 'Although I travel 70% of my time I am committed to this lifestyle and doing so in a healthy and sustainable way', NULL, NULL, 'DSM', 'VP P&O DSM Materials', '1,2,3,4', 'http://', 'http://', 'http://', '2018-09-17', '2018-09-18'),
(207, 211, 'Arnab asdas', 'dfsd', NULL, '8900577858', NULL, '', NULL, 1, 1, 1, NULL, '1902-03-05', '', NULL, NULL, '', '', '', 'http://', 'http://', 'http://', '2018-09-25', '2018-10-12'),
(208, 212, 'Aqua', 'Dev', NULL, '8952558777', NULL, '', NULL, 1, 1, 1, NULL, '1904-05-05', '', NULL, NULL, 'http://www.clubmondain.com', '', NULL, NULL, NULL, NULL, '2018-09-25', '0000-00-00'),
(210, 214, 'Herman', 'Bruns', NULL, '0031610329090', NULL, '1537949939_Herman Bruns.png', NULL, 1, 1, 1, NULL, '1977-10-19', 'I value personal connection, whether at home or traveling. Picked up running as an accessible outdoor sports and since I love goals I now partake in marathons.', NULL, NULL, 'DSM Dyneema B.V. ', 'Director Quality Safety Health Environment and Security ', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-09-26', '2018-09-26'),
(214, 218, 'Tim', 'Vorage', NULL, '00310630796738', NULL, '1538474542_Tim Vorage.jpg', NULL, 1, 1, 1, NULL, '1979-03-17', 'Ambitious and active professional who loves outdoor activities such as running and cycling', NULL, NULL, ' DSM Engineering Plastics B.V.', 'Global Market Development Manager', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-10-02', '2018-10-02'),
(216, 220, 'Erik', 'Becker', NULL, '0031612761425', NULL, '1539009812_Erik on LinkedIn.JPG', NULL, 1, 1, 1, NULL, '1974-11-25', 'A sense of humor is part of the art of leadership, of getting along with people, of getting things done', NULL, NULL, 'DSM Biomedical', 'Product Director', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-10-08', '2018-10-08'),
(221, 225, 'Mukuka', 'Nkunde', NULL, '00260964738647', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-15', '0000-00-00'),
(223, 227, 'Mukuka ', 'Nkunde', NULL, '00260964738647', NULL, NULL, NULL, 0, 0, 0, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-15', '0000-00-00'),
(224, 228, 'Davide', 'Reverdito-Bove', NULL, '0031611323674', NULL, '1542012674_davide reverdito-bove-003.jpg', NULL, 1, 1, 1, NULL, '1987-09-10', 'I strive for a balanced performance not training for anything specific', NULL, NULL, 'DSM', 'New Business development manager', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-11-12', '2018-11-12'),
(225, 229, 'Nicola', 'Sicchieri', NULL, '0019739066295', NULL, '1542377182_Nicola Sicchieri.jpg', NULL, 1, 1, 1, NULL, '1983-05-02', 'I strive for constant tiny improvement, keep a balance with my passion for both food and fitness', NULL, NULL, 'Advanced Solar', 'VP Business Development Americas', '1,2,3,4,5', 'http://', 'http://', 'http://', '2018-11-16', '2018-11-19');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cmd_view_blog_news_details`
-- (See below for the actual view)
--
CREATE TABLE `cmd_view_blog_news_details` (
`blog_news_id` int(20)
,`user_id` int(20)
,`country_id` int(20)
,`city_id` int(20)
,`blog_news_title` varchar(255)
,`blog_news_description` text
,`blog_news_image` varchar(255)
,`blog_news_address` varchar(255)
,`blog_news_fb_link` varchar(255)
,`blog_news_twitter_link` varchar(255)
,`blog_news_instagram_link` varchar(255)
,`blog_news_status` enum('Active','Inactive')
,`blog_news_type` enum('Blog','News')
,`create_date` date
,`update_date` date
,`blog_news_city` varchar(255)
,`blog_news_country` varchar(45)
,`blog_news_user_details` varchar(511)
,`blog_news_company_name` varchar(255)
,`blog_news_company_person` varchar(255)
,`blog_news_user_image` varchar(255)
,`blog_news_user_facebook` varchar(255)
,`blog_news_user_instagram` varchar(255)
,`blog_news_user_twitter` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cmd_view_business_details`
-- (See below for the actual view)
--
CREATE TABLE `cmd_view_business_details` (
`business_id` int(20)
,`user_id` int(20)
,`country_id` int(20)
,`city_id` int(20)
,`business_name` varchar(255)
,`business_description` text
,`business_website_url` varchar(255)
,`business_street` varchar(255)
,`business_latitude` float
,`business_longitute` float
,`business_postal_code` varchar(100)
,`business_image` varchar(255)
,`business_banner_image` varchar(255)
,`business_facebook_link` varchar(255)
,`business_twitter_link` varchar(255)
,`business_instagram_link` varchar(255)
,`business_status` enum('Active','Inactive')
,`create_date` date
,`update_date` date
,`business_city` varchar(255)
,`business_country` varchar(45)
,`business_user_details` varchar(511)
,`business_company_name` varchar(255)
,`business_company_person` varchar(255)
,`business_user_image` varchar(255)
,`business_user_facebook` varchar(255)
,`business_user_instagram` varchar(255)
,`business_user_twitter` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cmd_view_event_details`
-- (See below for the actual view)
--
CREATE TABLE `cmd_view_event_details` (
`event_id` int(11)
,`user_id` int(20)
,`user_type` varchar(11)
,`country_id` int(20)
,`city_id` int(20)
,`level_id` int(20)
,`timezone_id` int(20)
,`event_name` varchar(255)
,`event_description` text
,`event_facilities` text
,`event_free_text` text
,`event_website_url` varchar(255)
,`event_date_from` date
,`event_date_to` date
,`event_banner` varchar(255)
,`event_adress` varchar(255)
,`event_latitude` float
,`event_longitute` float
,`event_facebook_link` varchar(255)
,`event_twitter_link` varchar(255)
,`event_instagram_link` varchar(255)
,`event_status` enum('Active','Inactive')
,`create_date` date
,`update_date` date
,`event_city` varchar(255)
,`event_country` varchar(45)
,`event_image` varchar(255)
,`event_timezone` varchar(255)
,`event_user_details` varchar(510)
,`event_company_name` varchar(255)
,`event_company_person` varchar(255)
,`event_user_image` varchar(255)
,`event_user_facebook` varchar(255)
,`event_user_instagram` varchar(255)
,`event_user_twitter` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cmd_view_trainer_class_details`
-- (See below for the actual view)
--
CREATE TABLE `cmd_view_trainer_class_details` (
`trainer_class_id` int(11)
,`user_id` int(11)
,`event_id` int(11)
,`trainer_class_name` varchar(255)
,`trainer_class_address` varchar(255)
,`trainer_class_price` decimal(10,2)
,`trainer_class_type` enum('Paid','Free')
,`trainer_class_image` varchar(255)
,`trainer_class_description` text
,`country_id` int(11)
,`city_id` int(11)
,`trainer_class_website_url` varchar(255)
,`trainer_class_latitude` float
,`trainer_class_longitute` float
,`trainer_class_status` enum('Active','Inactive')
,`create_date` date
,`update_date` date
,`trainer_class_city` varchar(255)
,`trainer_class_country` varchar(45)
,`trainer_class_event_image` varchar(255)
,`trainer_class_event_address` varchar(255)
,`trainer_class_event_date_from` varchar(10)
,`trainer_class_event_date_to` varchar(10)
,`trainer_class_user_details` varchar(511)
,`trainer_class_address_details` varchar(255)
,`trainer_class_phone` varchar(255)
,`trainer_class_user_image` varchar(255)
,`trainer_class_user_facebook` varchar(255)
,`trainer_class_user_instagram` varchar(255)
,`trainer_class_user_twitter` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pivot_unique_id` int(11) NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `pivot_unique_id`, `txn_id`, `payment_gross`, `payment_status`, `payment_type`) VALUES
(1, 63, 12, '2YW06540KU642011W', 2.00, 'Completed', NULL),
(2, 63, 13, '2BD191905M718094N', 1.00, 'Completed', 'tranning-class'),
(4, 88, 0, '8PD71768T8439574R', 20.00, 'Completed', 'membership'),
(5, 88, 0, '37G434656H585100G', 1.00, 'Completed', 'shop'),
(8, 88, 0, '628757752N3844103', 1.00, 'Pending', 'shop'),
(9, 118, 0, '9YC89977RH686260R', 20.00, 'Completed', 'membership');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_postal_code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `payment_id`, `shipping_address`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_postal_code`, `status`, `cdate`) VALUES
(5, 88, 0, 'van linschotenlaan 286', '168', 'NH', 'Hilversum', '1212GB', 'Processing', '2017-12-01'),
(6, 88, 0, 'ertyuiop', '43', 'fghjk', 'fgyuio', 'tyuio', 'Processing', '2017-12-01'),
(7, 88, 8, 'xcvbnm', '3', 'cvb', 'xcfghj', 'fghjk', 'Purchase', '2017-12-04'),
(9, 89, 0, 'DEMO', '1', 'DEMO', 'DEMO', '1', 'Processing', '2017-12-07'),
(10, 88, 0, 'DEMO', '1', 'DEMO', 'DEMO', '1', 'Processing', '2017-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_details`
--

CREATE TABLE `user_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `product_id` varchar(20) DEFAULT NULL,
  `qty` varchar(20) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order_details`
--

INSERT INTO `user_order_details` (`order_details_id`, `order_id`, `user_id`, `product_id`, `qty`, `price`, `cdate`) VALUES
(5, 5, 88, '8', '1', '1', '2017-12-01'),
(6, 6, 88, '8', '1', '1', '2017-12-01'),
(7, 7, 88, '8', '1', '1', '2017-12-04'),
(9, 9, 89, '8', '2', '1', '2017-12-07'),
(10, 10, 88, '8', '1', '1', '2017-12-07');

-- --------------------------------------------------------

--
-- Structure for view `cmd_view_blog_news_details`
--
DROP TABLE IF EXISTS `cmd_view_blog_news_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`clubmo1q`@`localhost` SQL SECURITY DEFINER VIEW `cmd_view_blog_news_details`  AS  (select `cmd_blog_news`.`blog_news_id` AS `blog_news_id`,`cmd_blog_news`.`user_id` AS `user_id`,`cmd_blog_news`.`country_id` AS `country_id`,`cmd_blog_news`.`city_id` AS `city_id`,`cmd_blog_news`.`blog_news_title` AS `blog_news_title`,`cmd_blog_news`.`blog_news_description` AS `blog_news_description`,`cmd_blog_news`.`blog_news_image` AS `blog_news_image`,`cmd_blog_news`.`blog_news_address` AS `blog_news_address`,`cmd_blog_news`.`blog_news_fb_link` AS `blog_news_fb_link`,`cmd_blog_news`.`blog_news_twitter_link` AS `blog_news_twitter_link`,`cmd_blog_news`.`blog_news_instagram_link` AS `blog_news_instagram_link`,`cmd_blog_news`.`blog_news_status` AS `blog_news_status`,`cmd_blog_news`.`blog_news_type` AS `blog_news_type`,`cmd_blog_news`.`create_date` AS `create_date`,`cmd_blog_news`.`update_date` AS `update_date`,if((`cmd_blog_news`.`city_id` = 0),'',(select `cmd_city`.`city_name` from `cmd_city` where (`cmd_city`.`city_id` = `cmd_blog_news`.`city_id`))) AS `blog_news_city`,if((`cmd_blog_news`.`country_id` = 0),'',(select `cmd_country`.`country_name` from `cmd_country` where (`cmd_country`.`country_id` = `cmd_blog_news`.`country_id`))) AS `blog_news_country`,if((`cmd_blog_news`.`user_id` = 0),'',(select concat(`cmd_user_details`.`first_name`,' ',`cmd_user_details`.`last_name`) from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_user_details`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`company_name` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_company_name`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`company_person` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_company_person`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`user_image` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_user_image`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`user_facebook` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_user_facebook`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`user_instagram` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_user_instagram`,if((`cmd_blog_news`.`user_id` = 0),'',(select `cmd_user_details`.`user_twitter` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_blog_news`.`user_id`))) AS `blog_news_user_twitter` from `cmd_blog_news`) ;

-- --------------------------------------------------------

--
-- Structure for view `cmd_view_business_details`
--
DROP TABLE IF EXISTS `cmd_view_business_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`clubmo1q`@`localhost` SQL SECURITY DEFINER VIEW `cmd_view_business_details`  AS  (select `cmd_business`.`business_id` AS `business_id`,`cmd_business`.`user_id` AS `user_id`,`cmd_business`.`country_id` AS `country_id`,`cmd_business`.`city_id` AS `city_id`,`cmd_business`.`business_name` AS `business_name`,`cmd_business`.`business_description` AS `business_description`,`cmd_business`.`business_website_url` AS `business_website_url`,`cmd_business`.`business_street` AS `business_street`,`cmd_business`.`business_latitude` AS `business_latitude`,`cmd_business`.`business_longitute` AS `business_longitute`,`cmd_business`.`business_postal_code` AS `business_postal_code`,`cmd_business`.`business_image` AS `business_image`,`cmd_business`.`business_banner_image` AS `business_banner_image`,`cmd_business`.`business_facebook_link` AS `business_facebook_link`,`cmd_business`.`business_twitter_link` AS `business_twitter_link`,`cmd_business`.`business_instagram_link` AS `business_instagram_link`,`cmd_business`.`business_status` AS `business_status`,`cmd_business`.`create_date` AS `create_date`,`cmd_business`.`update_date` AS `update_date`,if((`cmd_business`.`city_id` = 0),'',(select `cmd_city`.`city_name` from `cmd_city` where (`cmd_city`.`city_id` = `cmd_business`.`city_id`))) AS `business_city`,if((`cmd_business`.`country_id` = 0),'',(select `cmd_country`.`country_name` from `cmd_country` where (`cmd_country`.`country_id` = `cmd_business`.`country_id`))) AS `business_country`,if((`cmd_business`.`user_id` = 0),'',(select concat(`cmd_user_details`.`first_name`,' ',`cmd_user_details`.`last_name`) from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_user_details`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`company_name` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_company_name`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`company_person` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_company_person`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`user_image` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_user_image`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`user_facebook` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_user_facebook`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`user_instagram` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_user_instagram`,if((`cmd_business`.`user_id` = 0),'',(select `cmd_user_details`.`user_twitter` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_business`.`user_id`))) AS `business_user_twitter` from `cmd_business`) ;

-- --------------------------------------------------------

--
-- Structure for view `cmd_view_event_details`
--
DROP TABLE IF EXISTS `cmd_view_event_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`clubmo1q`@`localhost` SQL SECURITY DEFINER VIEW `cmd_view_event_details`  AS  (select `cmd_event`.`event_id` AS `event_id`,`cmd_event`.`user_id` AS `user_id`,`cmd_event`.`user_type` AS `user_type`,`cmd_event`.`country_id` AS `country_id`,`cmd_event`.`city_id` AS `city_id`,`cmd_event`.`level_id` AS `level_id`,`cmd_event`.`timezone_id` AS `timezone_id`,`cmd_event`.`event_name` AS `event_name`,`cmd_event`.`event_description` AS `event_description`,`cmd_event`.`event_facilities` AS `event_facilities`,`cmd_event`.`event_free_text` AS `event_free_text`,`cmd_event`.`event_website_url` AS `event_website_url`,`cmd_event`.`event_date_from` AS `event_date_from`,`cmd_event`.`event_date_to` AS `event_date_to`,`cmd_event`.`event_banner` AS `event_banner`,`cmd_event`.`event_adress` AS `event_adress`,`cmd_event`.`event_latitude` AS `event_latitude`,`cmd_event`.`event_longitute` AS `event_longitute`,`cmd_event`.`event_facebook_link` AS `event_facebook_link`,`cmd_event`.`event_twitter_link` AS `event_twitter_link`,`cmd_event`.`event_instagram_link` AS `event_instagram_link`,`cmd_event`.`event_status` AS `event_status`,`cmd_event`.`create_date` AS `create_date`,`cmd_event`.`update_date` AS `update_date`,if((`cmd_event`.`city_id` = 0),'',(select `cmd_city`.`city_name` from `cmd_city` where (`cmd_city`.`city_id` = `cmd_event`.`city_id`))) AS `event_city`,if((`cmd_event`.`country_id` = 0),'',(select `cmd_country`.`country_name` from `cmd_country` where (`cmd_country`.`country_id` = `cmd_event`.`country_id`))) AS `event_country`,if((`cmd_event`.`event_id` = 0),'',(select `cmd_event_image`.`image_url` from `cmd_event_image` where (`cmd_event_image`.`event_id` = `cmd_event`.`event_id`))) AS `event_image`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_timezone`.`tz` from `cmd_timezone` where (`cmd_timezone`.`timezid` = `cmd_event`.`timezone_id`))) AS `event_timezone`,if((`cmd_event`.`user_id` = 0),'',(select concat(`cmd_user_details`.`first_name`,'',`cmd_user_details`.`last_name`) from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_user_details`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`company_name` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_company_name`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`company_person` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_company_person`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`user_image` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_user_image`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`user_facebook` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_user_facebook`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`user_instagram` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_user_instagram`,if((`cmd_event`.`user_id` = 0),'',(select `cmd_user_details`.`user_twitter` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_event`.`user_id`))) AS `event_user_twitter` from `cmd_event`) ;

-- --------------------------------------------------------

--
-- Structure for view `cmd_view_trainer_class_details`
--
DROP TABLE IF EXISTS `cmd_view_trainer_class_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`clubmo1q`@`localhost` SQL SECURITY DEFINER VIEW `cmd_view_trainer_class_details`  AS  (select `cmd_trainer_class`.`trainer_class_id` AS `trainer_class_id`,`cmd_trainer_class`.`user_id` AS `user_id`,`cmd_trainer_class`.`event_id` AS `event_id`,`cmd_trainer_class`.`trainer_class_name` AS `trainer_class_name`,`cmd_trainer_class`.`trainer_class_address` AS `trainer_class_address`,`cmd_trainer_class`.`trainer_class_price` AS `trainer_class_price`,`cmd_trainer_class`.`trainer_class_type` AS `trainer_class_type`,`cmd_trainer_class`.`trainer_class_image` AS `trainer_class_image`,`cmd_trainer_class`.`trainer_class_description` AS `trainer_class_description`,`cmd_trainer_class`.`country_id` AS `country_id`,`cmd_trainer_class`.`city_id` AS `city_id`,`cmd_trainer_class`.`trainer_class_website_url` AS `trainer_class_website_url`,`cmd_trainer_class`.`trainer_class_latitude` AS `trainer_class_latitude`,`cmd_trainer_class`.`trainer_class_longitute` AS `trainer_class_longitute`,`cmd_trainer_class`.`trainer_class_status` AS `trainer_class_status`,`cmd_trainer_class`.`create_date` AS `create_date`,`cmd_trainer_class`.`update_date` AS `update_date`,if((`cmd_trainer_class`.`city_id` = 0),'',(select `cmd_city`.`city_name` from `cmd_city` where (`cmd_city`.`city_id` = `cmd_trainer_class`.`city_id`))) AS `trainer_class_city`,if((`cmd_trainer_class`.`country_id` = 0),'',(select `cmd_country`.`country_name` from `cmd_country` where (`cmd_country`.`country_id` = `cmd_trainer_class`.`country_id`))) AS `trainer_class_country`,if((`cmd_trainer_class`.`event_id` = 0),'',(select `cmd_event`.`event_banner` from `cmd_event` where (`cmd_event`.`event_id` = `cmd_trainer_class`.`event_id`))) AS `trainer_class_event_image`,if((`cmd_trainer_class`.`event_id` = 0),'',(select `cmd_event`.`event_adress` from `cmd_event` where (`cmd_event`.`event_id` = `cmd_trainer_class`.`event_id`))) AS `trainer_class_event_address`,if((`cmd_trainer_class`.`event_id` = 0),'',(select `cmd_event`.`event_date_from` from `cmd_event` where (`cmd_event`.`event_id` = `cmd_trainer_class`.`event_id`))) AS `trainer_class_event_date_from`,if((`cmd_trainer_class`.`event_id` = 0),'',(select `cmd_event`.`event_date_to` from `cmd_event` where (`cmd_event`.`event_id` = `cmd_trainer_class`.`event_id`))) AS `trainer_class_event_date_to`,if((`cmd_trainer_class`.`user_id` = 0),'',(select concat(`cmd_user_details`.`first_name`,' ',`cmd_user_details`.`last_name`) from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_user_details`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_address`.`street_address_1` from `cmd_address` where (`cmd_address`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_address_details`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_user_details`.`phone` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_phone`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_user_details`.`user_image` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_user_image`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_user_details`.`user_facebook` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_user_facebook`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_user_details`.`user_instagram` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_user_instagram`,if((`cmd_trainer_class`.`user_id` = 0),'',(select `cmd_user_details`.`user_twitter` from `cmd_user_details` where (`cmd_user_details`.`user_id` = `cmd_trainer_class`.`user_id`))) AS `trainer_class_user_twitter` from `cmd_trainer_class`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmd_address`
--
ALTER TABLE `cmd_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cmd_banner`
--
ALTER TABLE `cmd_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cmd_blog_news`
--
ALTER TABLE `cmd_blog_news`
  ADD PRIMARY KEY (`blog_news_id`);

--
-- Indexes for table `cmd_business`
--
ALTER TABLE `cmd_business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `cmd_category`
--
ALTER TABLE `cmd_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cmd_city`
--
ALTER TABLE `cmd_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `cmd_content`
--
ALTER TABLE `cmd_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `cmd_country`
--
ALTER TABLE `cmd_country`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `idx_country_code` (`country_code`);

--
-- Indexes for table `cmd_energiser`
--
ALTER TABLE `cmd_energiser`
  ADD PRIMARY KEY (`trainer_class_id`);

--
-- Indexes for table `cmd_energiser_code_analyzer`
--
ALTER TABLE `cmd_energiser_code_analyzer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmd_energiser_csv`
--
ALTER TABLE `cmd_energiser_csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmd_event`
--
ALTER TABLE `cmd_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cmd_event_image`
--
ALTER TABLE `cmd_event_image`
  ADD PRIMARY KEY (`event_image_id`);

--
-- Indexes for table `cmd_field_permision`
--
ALTER TABLE `cmd_field_permision`
  ADD PRIMARY KEY (`field_permision_id`);

--
-- Indexes for table `cmd_frontend_settings`
--
ALTER TABLE `cmd_frontend_settings`
  ADD PRIMARY KEY (`cmd_settings_meta`);

--
-- Indexes for table `cmd_invitespace`
--
ALTER TABLE `cmd_invitespace`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `cmd_joining_us_energizer`
--
ALTER TABLE `cmd_joining_us_energizer`
  ADD PRIMARY KEY (`joining_class_id`);

--
-- Indexes for table `cmd_meet_up`
--
ALTER TABLE `cmd_meet_up`
  ADD PRIMARY KEY (`meet_up_id`);

--
-- Indexes for table `cmd_meet_up_comments`
--
ALTER TABLE `cmd_meet_up_comments`
  ADD PRIMARY KEY (`meet_up_comments_id`);

--
-- Indexes for table `cmd_membership`
--
ALTER TABLE `cmd_membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `cmd_opening_hour`
--
ALTER TABLE `cmd_opening_hour`
  ADD PRIMARY KEY (`opening_hour_id`);

--
-- Indexes for table `cmd_pivot_categories`
--
ALTER TABLE `cmd_pivot_categories`
  ADD PRIMARY KEY (`pivot_category_id`);

--
-- Indexes for table `cmd_pivot_favourite_city`
--
ALTER TABLE `cmd_pivot_favourite_city`
  ADD PRIMARY KEY (`favourite_city_id`);

--
-- Indexes for table `cmd_pivot_favourite_event`
--
ALTER TABLE `cmd_pivot_favourite_event`
  ADD PRIMARY KEY (`favourite_event_id`);

--
-- Indexes for table `cmd_pivot_favourite_news`
--
ALTER TABLE `cmd_pivot_favourite_news`
  ADD PRIMARY KEY (`favourite_news_id`);

--
-- Indexes for table `cmd_pivot_favourite_store`
--
ALTER TABLE `cmd_pivot_favourite_store`
  ADD PRIMARY KEY (`favourite_store_id`);

--
-- Indexes for table `cmd_pivot_joining_class`
--
ALTER TABLE `cmd_pivot_joining_class`
  ADD PRIMARY KEY (`joining_class_id`);

--
-- Indexes for table `cmd_pivot_joining_event`
--
ALTER TABLE `cmd_pivot_joining_event`
  ADD PRIMARY KEY (`joining_event_id`);

--
-- Indexes for table `cmd_pivot_product_category_subcategory`
--
ALTER TABLE `cmd_pivot_product_category_subcategory`
  ADD PRIMARY KEY (`ppcs_id`);

--
-- Indexes for table `cmd_pivot_product_images`
--
ALTER TABLE `cmd_pivot_product_images`
  ADD PRIMARY KEY (`product_images_id`);

--
-- Indexes for table `cmd_pivot_user_interest_category`
--
ALTER TABLE `cmd_pivot_user_interest_category`
  ADD PRIMARY KEY (`pivot_user_interest_category_id`);

--
-- Indexes for table `cmd_product`
--
ALTER TABLE `cmd_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cmd_product_review`
--
ALTER TABLE `cmd_product_review`
  ADD PRIMARY KEY (`product_reviews_id`);

--
-- Indexes for table `cmd_settings`
--
ALTER TABLE `cmd_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `cmd_store_feedback`
--
ALTER TABLE `cmd_store_feedback`
  ADD PRIMARY KEY (`store_feedback_id`);

--
-- Indexes for table `cmd_timezone`
--
ALTER TABLE `cmd_timezone`
  ADD PRIMARY KEY (`timezid`);

--
-- Indexes for table `cmd_trainer_class`
--
ALTER TABLE `cmd_trainer_class`
  ADD PRIMARY KEY (`trainer_class_id`);

--
-- Indexes for table `cmd_user`
--
ALTER TABLE `cmd_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cmd_user_details`
--
ALTER TABLE `cmd_user_details`
  ADD PRIMARY KEY (`user_details_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_order_details`
--
ALTER TABLE `user_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmd_address`
--
ALTER TABLE `cmd_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `cmd_banner`
--
ALTER TABLE `cmd_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cmd_blog_news`
--
ALTER TABLE `cmd_blog_news`
  MODIFY `blog_news_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cmd_business`
--
ALTER TABLE `cmd_business`
  MODIFY `business_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `cmd_category`
--
ALTER TABLE `cmd_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Relation to event,business,blog,news', AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `cmd_city`
--
ALTER TABLE `cmd_city`
  MODIFY `city_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `cmd_content`
--
ALTER TABLE `cmd_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cmd_country`
--
ALTER TABLE `cmd_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `cmd_energiser`
--
ALTER TABLE `cmd_energiser`
  MODIFY `trainer_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cmd_energiser_code_analyzer`
--
ALTER TABLE `cmd_energiser_code_analyzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cmd_energiser_csv`
--
ALTER TABLE `cmd_energiser_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cmd_event`
--
ALTER TABLE `cmd_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cmd_event_image`
--
ALTER TABLE `cmd_event_image`
  MODIFY `event_image_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This Is Relation Table Of Event', AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cmd_field_permision`
--
ALTER TABLE `cmd_field_permision`
  MODIFY `field_permision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cmd_frontend_settings`
--
ALTER TABLE `cmd_frontend_settings`
  MODIFY `cmd_settings_meta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This Settings is Only Belong To Frontend View ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cmd_invitespace`
--
ALTER TABLE `cmd_invitespace`
  MODIFY `business_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cmd_joining_us_energizer`
--
ALTER TABLE `cmd_joining_us_energizer`
  MODIFY `joining_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cmd_meet_up`
--
ALTER TABLE `cmd_meet_up`
  MODIFY `meet_up_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmd_meet_up_comments`
--
ALTER TABLE `cmd_meet_up_comments`
  MODIFY `meet_up_comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmd_membership`
--
ALTER TABLE `cmd_membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cmd_opening_hour`
--
ALTER TABLE `cmd_opening_hour`
  MODIFY `opening_hour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=848;

--
-- AUTO_INCREMENT for table `cmd_pivot_categories`
--
ALTER TABLE `cmd_pivot_categories`
  MODIFY `pivot_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1722;

--
-- AUTO_INCREMENT for table `cmd_pivot_favourite_city`
--
ALTER TABLE `cmd_pivot_favourite_city`
  MODIFY `favourite_city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cmd_pivot_favourite_event`
--
ALTER TABLE `cmd_pivot_favourite_event`
  MODIFY `favourite_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `cmd_pivot_favourite_news`
--
ALTER TABLE `cmd_pivot_favourite_news`
  MODIFY `favourite_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cmd_pivot_favourite_store`
--
ALTER TABLE `cmd_pivot_favourite_store`
  MODIFY `favourite_store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `cmd_pivot_joining_class`
--
ALTER TABLE `cmd_pivot_joining_class`
  MODIFY `joining_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cmd_pivot_joining_event`
--
ALTER TABLE `cmd_pivot_joining_event`
  MODIFY `joining_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `cmd_pivot_product_category_subcategory`
--
ALTER TABLE `cmd_pivot_product_category_subcategory`
  MODIFY `ppcs_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cmd_pivot_product_images`
--
ALTER TABLE `cmd_pivot_product_images`
  MODIFY `product_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cmd_pivot_user_interest_category`
--
ALTER TABLE `cmd_pivot_user_interest_category`
  MODIFY `pivot_user_interest_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `cmd_product`
--
ALTER TABLE `cmd_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmd_product_review`
--
ALTER TABLE `cmd_product_review`
  MODIFY `product_reviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cmd_settings`
--
ALTER TABLE `cmd_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cmd_store_feedback`
--
ALTER TABLE `cmd_store_feedback`
  MODIFY `store_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cmd_timezone`
--
ALTER TABLE `cmd_timezone`
  MODIFY `timezid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cmd_trainer_class`
--
ALTER TABLE `cmd_trainer_class`
  MODIFY `trainer_class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmd_user`
--
ALTER TABLE `cmd_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `cmd_user_details`
--
ALTER TABLE `cmd_user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_order_details`
--
ALTER TABLE `user_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
