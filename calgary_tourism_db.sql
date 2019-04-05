-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 03:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calgary_tourism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `activityID` mediumint(8) UNSIGNED NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `location` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityID`, `activity_name`, `description`, `price`, `location`) VALUES
(10000001, 'Glenbow Museum', 'The Glenbow Museum is an art and history museum in the city of Calgary, AB. Its collection represents the social, political and economic life during late 19th - 20th centuries of the whole Western Canada and Calgary in particular. Glenbow Museum specializes on First Nations, Metis genealogy, the Royal Canadian Mounted Police, agriculture, ranching, labour, the petroleum industry, women, business, and politics.\r\nThe museum was established in 1966 by petroleum entrepreneur, lawyer and philanthropist Eric Lafferty Harvie. In the 1950s, Mr. Harvie began collecting artifacts and historical documents related to the history of Western Canada. He and his family then donated this collection along with the substantial amount of money to the people of Alberta.\r\nMuseum collection includes a huge number of artifacts related to the lives of southern Albertians between 1880 and 1970 years, such as minerals, numismatics, textiles, and pressed glass. It is not limited to the culture of Western Canada and has objects from different cultures around the world: Africa, Latin America, Oceania, and Asia. There is also a diverse military collection, consisting of 26,000 items, including 2,100 firearms from the earliest types used in the 16th century to the present day.\r\nThe Glenbow\'s art collection comprises 33,000 works, dating from the 19th century to the present, primarily focused on the northwest of North America. It includes wildlife art, various landscape paintings, prints, and sculpture.\r\nGlenbow\'s Library collection consists of more than 100,000 books, newspapers, journals, periodicals, research, maps, and pamphlets related to political, economic and social events in Alberta.\r\nThere is also one of Canada\'s largest non-governmental archival repositories with a wide collection of unpublished documents and photographs related to the history of Western Canada. It has become one of the major research centers for students and academics, historians and genealogists, writers and the media. Archive records date from the 1860s to the 1990s and document the life of First Nations, Mounted Police, ranching, politics, and businesses of the southern Alberta. ', '16.00', '130 9th Ave S.E., Calgary, AB T2G 0P3'),
(10000002, 'The Military Museums', 'The Military Museums of Calgary is the largest tri-service history, heritage, art, and educational institution in Western Canada and the second largest military museum in Canada. The Military Museums is dedicated to the history of all three branches of the Canadian Army Forces: the Canadian Army, the Royal Canadian Air Force, and the Royal Canadian Navy with a primary focus on educating the public (and youth in particular) about Canada\'s military.\r\nPreviously known as The Museum of the Regiments, it was established in 1990 by Queen Elizabeth II and became a home for four military regiments in Calgary at that time, each with its own gallery: Princess Patricia\'s Canadian Light Infantry, Lord Strathcona\'s Horse (Royal Canadians), The King\'s Own Calgary Regiment (Royal Canadian Armoured Corps), and The Calgary Highlanders.\r\nEvery year over 50,000 people visits The Military Museums. Approximately 10,000 school children are given theme tours and participate in a variety of educational programs each year. The museums have received several awards for youth education programming.\r\nThere is also an extensive military history library and regimental archives that could be of interest to the military researchers, as well as to Canadians searching for information on their relatives\' service records from the First and Second World Wars. ', '15.00', '4520 Crowchild Trail SW, Calgary, AB T2T 5J4'),
(11000001, 'WinSport\'s Canada Olympic Park ', 'WinSport\'s Canada Olympic Park is a ski hill and multi-sport facility located in Calgary. It is one of the legacies of the XV Olympic Winter Games that took place in Calgary in 1988. Several olympic disciplines used this venue, including luge, bobsleigh, ski jumping, freestyle skiing, and nordic combined. \r\nThe park is famous for its skiing and snowboarding sections and is a very popular place for people looking to spend their weekend without going to the mountains. Among popular winter activities, visitors can enjoy cross-country skiing, downhill skiing, ski jumping, bobsleigh, luge, casual and terrain park snowboarding. \r\nDuring the summer, the park is used for other activities, such as summer festivals, summer camps, mountain biking, ski jumping training, and summer camps.', '11.99', '88 Canada Olympic Road SW, Calgary, AB T3B 5R5'),
(11000002, 'Lake Louise', 'Lake Louise is a glacial lake within Banff National Park in Alberta, Canada. It as named after the fourth daughter of Queen Victoria, Princess Louise Caroline Alberta (1848-1939). The water of this lake has the emerald colour, that comes from rock flour carried into the lake by melt-water from the glaciers that overlook the lake. On the lake\'s eastern shore there is a famous luxury Fairmont\'s Chateau Lake Louise hotel that was built in the beginning of 20th century by the Canadian Pacific Railway. \r\nIn the summer months, visitors can enjoy a canoe trip. It is better to go there in the morning or early evening times, when most of the tourists haven\'t come yet or have left already.\r\nFor those who prefer hiking, Lake Louise can offer a lot of different trails with various ability levels. The majority of the visitors go for Lake Agnes Tea House hike or scenic Sentinel Pass.\r\nIt is important to take warm clothes with you, as even in the middle of summer it can be quite windy there. ', '100.00', 'Lake Louise, AB'),
(12000001, 'Calgary Tower', 'The Calgary Tower is a 190.8-meter (626 ft) free standing observation tower in Downtown Calgary. It was completed and opened to the public in 1968, when it was the tallest structure in North America. The Calgary Tower is the most recognized landmark in Calgary with - over 300,000 people visit it every year. \r\nThe tower\'s observation deck allows visitors to experience a spectacular 360 degree of the busy city, Rocky Mountains, the foothills, and the prairies.\r\nIt has undergone several major renovations and, in 2004, it opened a glass floor extension on the north side of the observation deck. When standing on the glass, a person can look straight down on two of the main downtown streets. \r\nSince 2014, the tower got a multicolour exterior LED lighting system that allows it to create over 16.5 million combinations of coloured effects at night. \r\nJust below the observation deck, Sky 630 Restaurant and Lounge offers delicious food along with a full view of the city. At the base of the tower visitors can also find a gift shop with exclusive Canadian apparel.', '18.00', '101 9 Ave SW, Calgary, Alberta, T2P 1J9'),
(12000002, 'Calgary Zoo', 'The Calgary Zoo, opened in 1929 and located east of the city\'s downtown, is the most visited zoo in Canada. It is a home to over 1,000 animals, excluding individual fish and insects, and 272 different species. In 2015, TripAdvisor recognized the Calgary Zoo with its Travellers\' Choice Award. In 2013, the Association of Zoos and Aquariums said that the Calgary Zoo as one of the top zoos in the world. \r\nThe 120-acre zoo is organized by into six areas: Destination Africa, Canadian Wilds, Penguin Plunge, Dorothy Harvie Botanical Gardens and ENMAX Conservatory, Eurasia, and Prehistoric Park. Visitors will meet some amazing animals from different parts of the world, including amur tigers, giant pandas, giraffes, gorillas, hippos, lemurs, penguins, whooping cranes, and many others. \r\nThe Calgary Zoo also features different programs and events, including kids\' camps, educational programs for kids of all ages, sleepovers, weddings, team-building events, and parties. \r\nEvery year, Calgary Zoo holds the month-long Christmas lights festival, the largest seasonal animal-themed light show in western Canada.', '29.95', '210 St. George\'s Drive NE, Calgary, AB T2E 7V6'),
(12000003, 'Heritage Park', 'Heritage Park is Canada\'s largest living history museum and one of the city\'s most visited tourist places. It is located on 127 acres of parkland in the southern part of Calgary and features over 200 exhibits and attractions that reflect the lives of Western Canada settlers from 1860s to 1950s. Most of the houses, stores and machinery at each exhibit are original. \r\nThe park represents four distinct locations that reflect different time periods in Western Canadian history: 1860s Fur Trading Fort and First Nations Encampment, 1880s Pre-railway Settlement, c.1910 Prairie Railway Town, and 1930s, \'40s and \'50s Gasoline Alley Museum and Heritage Town Square. \r\nAmong the things you can do in Heritage Park are shopping on main street, old-time amusement rides, lunch at the Wainwright Hotel, train, boat and horse drawn rides. All this offers visitors an authentic experience of all four represented historical periods. \r\nHeritage Park also features many exceptional educational programs that involve participants in the early days of western settlement, including school programs (different age groups), summer camps, youth sleepover programs, and adult education programs.', '26.50', '1900 Heritage Dr SW, Calgary, AB T2V 2X3'),
(13000001, 'Calgary Brewery Tour', 'Calgary Brewery Tour is offered to people willing to look behind the scenes of Calgary\'s craft beer scene. It is a 3.5-hour tour that includes minibus transportation with custom pickup and drop off, guided tour at one of our partner breweries, craft beer flights, Beer Geek tour guide for Calgary beer scene, and meal.\r\nAmong our partner breweries are Eighty-Eight Brewing, Paddy\'s BBQ & Brewery, Tool Shed, Last Best Brewing, Prairie Dog Brewing, Banded Peak Brewing, Annex Ale Project, and many others.\r\nAvailable for both public and private groups (minimum 8 people).', '89.00', '728 17 Ave SW, Calgary, AB T2T 4M2'),
(14000001, 'Q Haute Cuisine', 'Q Haute Cuisine is one of Canada\'s premiere restaurants. Located in the Downtown West End, it offers an outstanding dining experience.\r\nThe restaurant is very popular among tourists, a favourite wedding reception venue and a great place for business meetings and events.', '0.00', '100 La Caille Pl SW, Calgary, AB T2P 5E2'),
(15000001, 'Calgary Stampede', 'The Calgary Stampede is an annual rodeo, exhibition, and festival that takes place in Calgary every July. It is a 10-day event that attracts more than a million visitors and features a parade, stage shows, concerts, agricultural competitions and rodeos, and many more. The first Calgary Stampede took place more than a hundred years ago, in 1912.\r\nThe official opening of the Stampede begins with a parade of dozens of marching bands, hundreds of horses, thousands of dancers, clowns, members of the Royal Canadian Mounted Police, and politicians.\r\nThe rodeo that is held during Stampede is the most famous event of its kind in the world with a total prize of $1,000,000 per championship day. Visitors can enjoy several disciplines, including steer wrestling, barrel racing, bull riding, tie down roping, and saddle bronc riding.\r\nAnother popular venue at the time of Stampede is the Stampede Market, located on the BMO Center on the northwest corner of the Stampede park in Downtown Calgary. On the area of 38,000 square meters (410,000 sq ft) people can buy different cowboy and western-themed artwork, craftwork, statues, foods and wine. ', '18.00', '1410 Olympic Way SE, Calgary, AB T2G 2W1');

-- --------------------------------------------------------

--
-- Table structure for table `booked_activities`
--

DROP TABLE IF EXISTS `booked_activities`;
CREATE TABLE `booked_activities` (
  `activityID` mediumint(8) UNSIGNED NOT NULL,
  `customerID` mediumint(8) UNSIGNED NOT NULL,
  `date_of_activity` datetime NOT NULL,
  `number_of_tickets` mediumint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customerID` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` char(40) NOT NULL,
  `customer_forename` varchar(255) NOT NULL,
  `customer_surname` varchar(255) NOT NULL,
  `customer_postcode` varchar(255) NOT NULL,
  `customer_address1` varchar(255) NOT NULL,
  `customer_address2` varchar(255) DEFAULT NULL,
  `date_of_birth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `username`, `password_hash`, `customer_forename`, `customer_surname`, `customer_postcode`, `customer_address1`, `customer_address2`, `date_of_birth`) VALUES
(13, 'johndoe', '9515a5cec24bde81a313f606b4597e7058f12947', 'John', 'Doe', 'O5N 7H9', '555 1st Avenue', 'Toronto, ON, Canada', '1966-02-15 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `booked_activities`
--
ALTER TABLE `booked_activities`
  ADD PRIMARY KEY (`activityID`,`customerID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activityID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15000002;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
