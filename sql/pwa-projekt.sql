-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 05:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa-projekt`
--

CREATE DATABASE IF NOT EXISTS `pwa-projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `pwa-projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnickoIme` varchar(32) NOT NULL,
  `lozinka` char(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `razina`) VALUES
(1, 'tihomir', 'popovic', 'admin', '$2y$10$OmStl7Hw4V62k.Wz4rL9Gua4ee/K/QHRKL5c35AR4AJRA9THFE1zS', 1),
(2, 'user', 'user', 'user', '$2y$10$No7huroRNIcDu.RQ9lTe/u/5D7uo91Rda8yLOo9kP2maB6Gj9Lgw2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `prikazi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `prikazi`) VALUES
(13, '25.06.2023.', 'China’s foreign minister', 'Chinese leadership try to gauge impact', '\r\n	Please use the sharing tools found via the share button at the top or side of articles. Copying articles to share with others is a breach of FT.com T&Cs and Copyright Policy. Email licensing@ft.com to buy additional rights. Subscribers may share up to 10 or 20 articles per month using the gift article service. More information can be found at https://www.ft.com/tour.\r\n	https://www.ft.com/content/c770a16e-0823-4206-8b23-f8bebfa5e6cb\r\n\r\n	China’s foreign minister Qin Gang met Russian deputy foreign minister Andrei Rudenko on Sunday as Beijing tries to gauge the impact of warlord Yevgeny Prigozhin’s insurrection on the political stability of one of its closest strategic allies.\r\n\r\nChinese state media said the pair, who were pictured smiling and walking together after their meeting in Beijing, “exchanged views . . . on Sino-Russian relations and international and regional issues of common concern”.\r\n\r\nThe reports did not mention the rebellion and China has made no official statement on the events. China’s state media has downplayed the drama — on Sunday giving precedence to an exchange of letters between President Xi Jinping and a Belgian zookeeper discussing pandas.\r\n\r\nBut the muted official coverage of the rebellion belies the importance for Xi and the Chinese Communist party leadership of the stand-off in Russia, Beijing’s most important partner in its effort to combat what it sees as US hegemony.\r\n\r\nA weakened Russia would not only deprive the Chinese leader of a reliable ally but would also potentially destabilise China’s extensive border with its giant neighbour. “We don’t need another civil war in Russia as well, we need stability in all countries,” said Henry Huiyao Wang, president of the Center for China and Globalization, a think-tank in Beijing.\r\n', '1.avif', 'SVIJET', 1),
(14, '25.06.2023.', 'Crisis Abates in Russia', 'Crisis Abates in Russia but Questions Remain Over Putin’s Authority', 'Russians on Sunday confronted a changed country. The strongest challenge to President Vladimir V. Putin’s rule was defused, but there were new questions about his authority and the country’s war in Ukraine.\r\n\r\nIn many ways, Yevgeny V. Prigozhin, the head of the mercenary force known as Wagner who led an armed uprising against the military’s leadership for nearly 24 hours this weekend, punctured Mr. Putin’s strongman authority and aura of infallibility. Mr. Prigozhin’s blistering criticism and brazen actions called into question Russia’s justifications for its war in Ukraine and the competency of its military leadership.\r\n\r\nEach hour on Saturday brought news of Mr. Prigozhin’s private military company forces inching closer to Moscow, posing a threat to Mr. Putin and raising the specter of a civil war in the nuclear-armed state.\r\n\r\nInstead, a close ally of Mr. Putin, Aleksandr G. Lukashenko, the leader of Belarus, stepped in and arranged to have Mr. Prigozhin go to Belarus and avoid criminal charges, while also absolving the Wagner fighters of repercussions.', '2.jpg', 'SVIJET', 1),
(15, '25.06.2023.', 'Bring ‘settlers’ to justice', 'US calls to bring ‘extremist settlers’ to justice for attacks against Palestinians', 'US National Security Adviser Jake Sullivan conveyed Washington’s condolences to Israel for the killings of four Israelis in a Palestinian terror attack on Tuesday near the West Bank settlement of Eli, and its “deep concern” over a series of settler reprisal attacks against Palestinian towns and villages since the shooting three days ago.\r\n\r\nIn a call on Friday with Prime Minister Benjamin Netanyahu’s National Security Adviser Tzachi Hanegbi, Sullivan emphasized the Biden administration’s “unwavering support for Israel’s security, as well as its right to defend its people” against terrorist groups.\r\n\r\nHowever, he “expressed deep concern over the recent extremist settler attacks against Palestinian civilians and the destruction of their property in the West Bank,” according to a US readout of the conversation.', '3.jpg', 'SVIJET', 1),
(16, '25.06.2023.', '4 Children, 40 Days', 'How 4 Children Miraculously Survived 40 Days in the Amazon Jungle After a Fatal Plane Crash', 'Even when the rest of the news is at its grimmest, wonders never cease.\r\n\r\nAnd the June 9 rescue of four children who spent 40 days on their own in the Amazon jungle after surviving a plane crash was a solid reminder that hope finds a way.\r\n\r\nSoldiers and volunteers from local Indigenous tribes searched more than 1,600 miles of dense Amazonian rainforest over the course of six weeks after the single-engine Cessna ferrying the siblings, their mother and an uncle crashed on May 1, according to officials.\r\n\r\nLesly Jacobombaire Mucutuy, 13, Soleiny Jacobombaire Mucutuy, 9, Tien Noriel Ranoque Mucutuy, 4, and Cristin Neriman Ranoque Mucutuy, 11 months, were the sole survivors.', '4.webp', 'SVIJET', 1),
(17, '25.06.2023.', 'Attack helicopter bombing', 'Russian attack helicopter bombing one of its own oil depot to deny Wagner mercenaries fuel supply', 'Footage appears to show an explosion at an oil depot in Voronezh after strikes by a Russian helicopter.\r\n\r\nIt comes as Wagner fighters seized military facilities in the city, Russian sources told Reuters.\r\n\r\nOn Saturday, Russian mercenaries began an armed rebellion in the city of Rostov-on-Don.\r\n\r\nVideo footage circulating on social media appears to show a Russian attack helicopter attacking an oil depot as the Wagner group takes up positions in the Russian city as a part of a dramatic armed mutiny on Saturday.\r\n\r\nThe clip appears to show a massive explosion at an oil depot in the city of Voronezh after a Russian Kamov Ka-52 \"Alligator\" helicopter targeted the area.', '5.webp', 'SVIJET', 1),
(18, '25.06.2023.', 'man tricked a 5-star hotel', 'How a man tricked a 5-star hotel into staying free... for 603 days', 'It all began on May 30, 2019, when Ankush Dutta, a man from the far northeast of India, checked into the Roseate House for what was scheduled to be a one-night stay, according to the India Express.\r\n\r\nThe hotel is near the Indira Gandhi International Airport in New Delhi, India.\r\n\r\nSix-hundred and three days later, on January 22, 2021, Dutta checked out of the hotel without paying a cent. The hotel didnt find out about the incident until this year while conducting a records check, the Economic Times reports.', '6.webp', 'SVIJET', 1),
(19, '25.06.2023.', 'Russia - tipping point', 'Yevgeny Prigozhins mutiny has shattered the false reality of Putins Russia.', 'The die is cast. These were the words that Julius Caesar supposedly uttered when crossing the Rubicon to seize power in Rome in 49BC. Yevgeny Prigozhin, the head of the Wagner Group, is no Caesar, but he possesses the same political intuitions that defined the Roman conqueror and other historical pretenders to power. Corrupt and cynical, and with a criminal record for robbery and fraud, Prigozhyn emerged from Vladimir Putin’s close entourage. Yet he is the first man from this clique to experience a kind of conversion, realising that the war Putin launched on Ukraine in February 2022 had disrupted, and possibly weakened, the power structure inside Russia, creating an opportunity for an audacious conqueror.', '7.jpg', 'SVIJET', 1),
(20, '25.06.2023.', 'USMNT draws Jamaica', 'USMNT draws Jamaica in first CONCACAF Gold Cup match: What this means for the U.S.', 'The U.S. mens national team completed a 1-1 draw against Jamaica in the first group-stage match at the CONCACAF Gold Cup on Saturday. Heres what you need to know:\r\n\r\nDamion Lowe scored the lone goal for Jamaica in the 13th minute.\r\nBrandon Vazquez scored the equalizer in the 88th minute. It was his second career goal for the U.S.\r\nThe U.S. men outshot Jamaica 13-6 while winning the possession battle. USMNT had 68 percent possession while Jamaicas was 32 percent.\r\nThe USMNTs next match is against Saint Kitts and Nevis on Wednesday at 10 p.m. ET.', '8.avif', 'SPORT', 1),
(21, '25.06.2023.', 'Angels break franchise record', 'Angels break franchise record vs. Rockies with 25-run outburst, including record-tying 13-run inning', 'The Los Angeles Angels set a new franchise record for runs scored with 25 on Saturday night against the Colorado Rockies (box score). Additionally, they tied a franchise record for the most runs scored in a single inning with 13. The Angels plated those 13 during the third inning, a frame that also saw them connect for back-to-back-to-back home runs. ', '9.webp', 'SPORT', 1),
(22, '25.06.2023.', 'Predators | Ryan Johansen', 'Barry Trotz looked into Predators future and saw it didnt include Ryan Johansen | Estes', 'Dont forget that when the Nashville Predators handed center Ryan Johansen an eight-year contract worth a whopping $64 million, it was a no-brainer. It was cheered. It was necessary to fortify a team that had just made the Stanley Cup Final with Johansen as a driving force and was settling in for a long run atop the sport.\r\n\r\nBack then, anything felt possible. It was an exceptional time.\r\n\r\nSix years later, anything feels possible again with the Predators, only its not so exceptional. The nostalgia of 2017 at long last is gone, and accordingly, so is Johansen.\r\n\r\nThe Saturday before the NHL Draft arrives in Nashville, anything possible meant trading Johansen – and his hefty contract – just before his 31st birthday to the Colorado Avalanche while swallowing half his salary for the two remaining seasons on the deal.', '10.webp', 'SPORT', 1),
(23, '25.06.2023.', 'Final-round pairings', '2023 Travelers Championship tee times: Final-round pairings for Sunday', 'The 2023 Travelers Championship concludes Sunday at TPC River Highlands in Cromwell, Conn. You can find full Travelers Championship final-round tee times for Sunday at the bottom of this post.\r\n\r\nKeegan Bradley finished his third round at 189 through three rounds (21 under), just one shot shy of the PGA Tour 54-hole record. However, on a getable TPC River Highlands, that only gives Bradley a one-shot lead as he looks for his second win of the 2022-23 season.\r\n\r\nAfter a third-round 63, where he looked as though he was going to run away from the field at times, Chez Reavie sits just one shot back at 20 under.', '11.webp', 'SPORT', 1),
(24, '25.06.2023.', 'Basketball player dies', 'Basketball player who previously blamed COVID vaccine for rare heart condition dies of heart attack', 'Professional Dominican basketball player Oscar Cabrera Adames died this week after an apparent heart attack while he was possibly undergoing a stress test.\r\n\r\nAccording to a social media post from Dominican sports commentator Hector Gomez, the 28-year-olds stress test was being performed at a health center in Santo Domingo.\r\n\r\nCabrera Adames is believed to have suffered from myocarditis. The disease can weaken the heart and its electrical system, which decreases the hearts ability to pump blood, according to the American Heart Association.', '12.webp', 'SPORT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
