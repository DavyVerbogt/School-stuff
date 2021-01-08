-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2016 at 08:58 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema7`
--

CREATE DATABASE cinema7;
USE cinema7;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `FilmID` int(11) NOT NULL,
  `Titel` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Beschrijving` text CHARACTER SET latin1,
  `Duur` int(3) DEFAULT NULL,
  `Genre` enum('Actie','Avontuur','Thriller','Horror','Drama','Western','Oorlog','Komedie') CHARACTER SET latin1 DEFAULT NULL,
  `Leeftijd` enum('ALL','6','12','16','18') CHARACTER SET latin1 DEFAULT NULL,
  `Plaatje` varchar(200) CHARACTER SET latin1 DEFAULT 'default.jpg',
  `Prijs` double DEFAULT NULL,
  `Type` enum('Normaal','3D','IMAX','IMAX 3D') CHARACTER SET latin1 DEFAULT NULL,
  `Status` enum('Verwacht','InBios') CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`FilmID`, `Titel`, `Beschrijving`, `Duur`, `Genre`, `Leeftijd`, `Plaatje`, `Prijs`, `Type`, `Status`) VALUES
(1, 'Fast & Furious ', 'geregisseerd door James Wan\r\nmet Vin Diesel, Jason Statham en Lucas Black\r\n\r\nNadat Dominic Toretto lucht krijgt van Han''s dood, reist hij met zijn crew naar Tokyo, waar ze Sean Boswell ontmoeten, de driftkoning en een vriend van Han. Ze vormen een team met Sean en enkele nieuwe vrienden en gaan erop uit om hun gevallen vriend te wreken. Hierbij stuitten ze op de man die Han heeft vermoord, Ian Shaw, de oudere broer van Owen Shaw en leider van een geheime en illegale straatrace-organisatie.', 122, 'Actie', '16', 'default.jpg', 9.75, 'IMAX 3D', 'InBios'),
(2, 'The Expendables 3', 'geregisseerd door Patrick Hughes\r\nmet Sylvester Stallone, Jason Statham en Dolph Lundgren\r\n\r\nBarney (Sylvester Stallone), Christmas (Jason Statham) en de rest van het team komen oog in oog te staan met Conrad Stonebanks (Mel Gibson), die jaren geleden samen met Barney de mede-oprichter was van ''The Expendables''. Stonebanks is later een meedogenloze wapenhandelaar geworden waardoor Barney hem noodgedwongen heeft moeten doden, tenminste dat dacht hij. Stonebanks, die aan de dood ontsnapte, heeft het plan opgevat om een einde te maken aan het team van The Expendables. Barney heeft echter hele andere plannen.', 126, 'Actie', '12', 'default.jpg', 8, 'Normaal', 'Verwacht'),
(3, 'Colombiana', 'Op haar 10de zag Cataleya Restrepo hoe haar ouders in Colombia werden afgeslacht door drugsbaron Don Luis. Ze groeit op als keiharde huurmoordenaar voor haar oom Emilio in Chicago. Maar in haar vrije tijd is ze op zoek naar het enige dat haar drijft: het vinden van de moordenaars van haar ouders.', 108, 'Actie', '16', 'default.jpg', 9, 'Normaal', 'InBios'),
(4, 'Hansel and Gretel: Witch Hunters ', 'Vijftien jaar na het traumatische incident bij het gemberkoekhuisje waarbij ze bijna het leven lieten zijn de tweeling Hans en Grietje volwassen geworden. Ze zijn nu gespecialiseerde premiejagers die op jacht zijn naar heksen. EÃ©n van die heksen terroriseerde hen op jonge leeftijd.', 98, 'Actie', '16', 'default.jpg', 9, 'Normaal', 'InBios'),
(5, 'The lion king 3D', 'In Afrika wordt de jonge leeuw Simba geboren als zoon van de leeuwenkoning Mufasa. Dat zint Mufasa''s jaloerse broer Scar absoluut niet, die nu niet langer de eerste troonopvolger is. Terwijl Simba een onbezorgde jeugd geniet in zijn vaders koninkrijk, smeedt Scar samen met een groep hyena''s een plan om zowel Mufasa als Simba uit de weg te ruimen, en zo zelf de macht te kunnen grijpen.', 85, 'Avontuur', 'ALL', 'default.jpg', 10.5, '3D', 'InBios'),
(6, 'Gooische vrouwen 2', 'Als Claire totaal veranderd terugkomt uit Burkina Faso herkennen haar vriendinnen haar amper. De wereld van Cheryl stort in als ze ontdekt dat Martin haar voor de zoveelste keer bedriegt: hoe moet ze deze klap nu weer te boven komen? Anouk, ook ongelukkig in de liefde, klampt zich vast aan een ongezonde relatie (en aan een ongezond eetpatroon). Roelien gaat juist in op het huwelijksaanzoek van Evert, maar haar geluk is van korte duur. Een even noodlottig als bizar ongeval voert de vriendinnen naar de besneeuwde bergtoppen van Oostenrijk.', 104, 'Komedie', '6', 'default.jpg', 9, 'Normaal', 'Verwacht'),
(7, 'Paddington', 'Een jonge Peruaanse beer, die een passie heeft voor alles wat Brits is, vertrekt naar Londen waar hij op zoek gaat naar een woning. Wanneer hij eenzaam en verloren op Paddington Station belandt begint hij te beseffen dat het leven in de stad niet is wat hij zich er van had voorgesteld. Maar dan ontmoet hij de vriendelijke familie Brown, die het label om zijn nek lezen (''Pas alsjeblieft op deze beer, dankjewel'') en hem een tijdelijk onderkomen aanbieden.', 95, 'Komedie', 'ALL', 'default.jpg', 9, 'Normaal', 'Verwacht'),
(8, 'Jupiter Ascending ', 'Jupiter Jones (Mila Kunis) werd geboren onder een sterrenhemel, met tekens die erop wijzen dat ze voortbestemd is voor grootse dingen. Eenmaal volwassen droomt Jupiter van de sterren, maar ze wordt wakker in de harde realiteit waar ze toiletten schoonmaakt en heel wat pech kent. Maar wanneer Caine (Channing Tatum), een genetisch gemanipuleerde ex-militaire jager, op Aarde aankomt om haar op te sporen, vangt Jupiter een glimp op van het lot dat al die tijd op haar wachtte â€“ haar genetische handtekening zorgt ervoor dat ze de eerste in lijn is voor een buitengewone erfenis die de balans van de kosmos kan veranderen.', 125, 'Actie', '12', 'default.jpg', 12.5, 'IMAX 3D', 'Verwacht'),
(9, 'Taken 3', 'De wereld van ex-CIA agent Bryan Mills stort in wanneer hij valselijk beschuldigd wordt van een moord, die in zijn huis wordt gepleegd. Hij wordt op de hielen gezeten door een snuggere rechercheur, maar Mills wendt zijn speciale vaardigheden aan om de echte moordenaar op te sporen en zijn unieke vorm van rechtvaardigheid te voltrekken.', 108, 'Actie', '16', 'default.jpg', 9, 'Normaal', 'InBios'),
(10, 'The Woman in Black 2: Angel of Death', 'Vier decennia zijn verstreken sinds Arthur Kipps naar Eel Marsh House afreisde. Nu 40 jaar later komt een groep kinderen die geÃ«vacueerd zijn uit de Tweede Wereldoorlog in Londen aan, wat er voor zorgt dat de meest duistere inwoners van het huis ontwaken.', 98, 'Horror', '16', 'default.jpg', 9, 'Normaal', 'InBios'),
(11, 'Into the woods', 'Into the Woods is een combinatie van de bekende sprookjes van Assepoester, Raponsje, Sjaak en de Bonenstaak en het verhaal van de Bakker en zijn vrouw die wanhopig naar een kind verlangen. Helaas zijn de Bakker en zijn vrouw door een heks vervloekt zodat ze geen kinderen kunnen krijgen. Ze moeten verschillende proeven doorstaan om de vloek op te heffen. Zo moeten ze de heks een koe bezorgen die zo wit als melk is, een kap die zo rood als bloed is, haar dat zo geel als maÃ¯s is en een muiltje dat zo zuiver als goud is.', 125, 'Komedie', '6', 'default.jpg', 9, 'Normaal', 'InBios'),
(12, 'Penguins of Madagascar ', 'De vier pinguÃ¯ns, Skipper, Rico, Kowalski en Private bundelen hun krachten met de chique spionagedienst de ''North Wind'' die onder leiding staat van agent Classified. Samen moeten ze het opnemen tegen de kwaadaardige Dr. Octavius Brine die de wereld wil veroveren.', 92, 'Komedie', '6', 'default.jpg', 9, 'Normaal', 'Verwacht'),
(13, 'The Hobbit: The Battle of the Five Armies ', 'Bilbo Balings, Thorin Eikenschild en de groep dwergen hebben hun koninkrijk heroverd op Smaug, maar onbedoeld ook een dodelijke kracht losgelaten op de wereld. Door wraak gedreven zorgt Smaug voor vele slachtoffers onder de inwoners van Meerstad. Thorin is geobsedeerd door zijn heroverde rijkdom en heeft zijn vriendschap hiervoor over, daar waar Bilbo gedwongen wordt een wanhopige en gevaarlijke keuze te maken. Maar er zijn grotere gevaren op komst. Gandalf ziet namelijk dat de gevaarlijke vijand Sauron enorme legers met Orks naar de Eenzame Berg stuurt. Wanneer duisternis nadert, staan Elven, Dwergen en mensen voor de keuze: zich verenigen of hun koninkrijk ten onder zien gaan. Bilbo vecht ondertussen voor zijn leven en dat van zijn vrienden tijdens de epische oorlog van de vijf legers, terwijl de toekomst van Midden-Aarde aan een zijden draadje hangt.', 144, 'Avontuur', '12', 'default.jpg', 11.5, 'IMAX', 'Verwacht'),
(14, 'Cinderella', 'Cinderella (Lily James) is een weeskind dat door haar stiefmoeder (Cate Blanchett) en stiefzussen (Sophie McShera en Holliday Grainger) onrechtvaardig wordt behandeld. Op een dag ontmoet ze in het bos een charmante vreemdeling met wie ze zich gelijk verwant voelt. Wanneer de koning een open uitnodiging voor een feest stuurt naar alle maagden van het land, hoopt ze dat de vreemdeling ook van de partij is. Maar haar stiefmoeder verbiedt haar te gaan en verscheurt Cinderella''s jurk.', 105, 'Avontuur', 'ALL', 'default.jpg', 9, 'Normaal', 'Verwacht'),
(15, 'Insurgent ', 'Beatrice moet op zoek naar antwoorden en bondgenoten in de ruÃ¯nes van het futuristische Chicago. Samen met Four zijn ze nu vluchtelingen, opgejaagd door Jeanine, de leider van de op macht beluste groepering Erudite. In een race tegen de klok moeten ze er achter zien te komen waarvoor de familie van Beatrice zich heeft opgeofferd en waarom de leiders van Erudite er alles aan doen om hen te stoppen.', 119, 'Avontuur', '12', 'default.jpg', 12.5, 'IMAX 3D', 'Verwacht'),
(16, 'The Boy Next Door', 'Een pas gescheiden vrouw (Jennifer Lopez) begint een affaire met haar buurman. Het probleem is echter dat de buurman een tiener is die toevallig ook de vriend is van haar zoon. Wanneer ze probeert een einde te maken aan de verboden relatie ontstaan de problemen.', 91, 'Thriller', '16', 'default.jpg', 9, 'Normaal', 'Verwacht');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `KlantID` int(11) NOT NULL,
  `Voornaam` varchar(50) COLLATE utf8_bin NOT NULL,
  `Achternaam` varchar(50) COLLATE utf8_bin NOT NULL,
  `Adres` varchar(50) COLLATE utf8_bin NOT NULL,
  `Postcode` varchar(7) COLLATE utf8_bin NOT NULL,
  `Plaats` varchar(50) COLLATE utf8_bin NOT NULL,
  `TelefoonNr` varchar(11) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Inlognaam` varchar(50) COLLATE utf8_bin NOT NULL,
  `Wachtwoord` char(128) COLLATE utf8_bin NOT NULL,
  `Salt` char(128) COLLATE utf8_bin NOT NULL,
  `Level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`KlantID`, `Voornaam`, `Achternaam`, `Adres`, `Postcode`, `Plaats`, `TelefoonNr`, `Email`, `Inlognaam`, `Wachtwoord`, `Salt`, `Level`) VALUES
(1, 'Gerard', 'Roelsema', 'Dorpstraat 10', '5561AB', 'Eindhoven', '040-5439824', 'Gerard.Roelsema@cinema7.nl', 'Admin', '63765941cb7f093f61a5977235d5aeb3eb9e1d39ea3af1b30cdfdf5651393e07a9132834857a4440d9158c5364f7b956a1d468f3017f2f7eb2bb49bbaebb5b0d', '4a4adff7b79e63caad511dfee0b2c79097d464d9964383b1b2b72d15b299938fd4bdbec0c99c8e9a99e6ecd4c005d33211a0f2709595e1a691ef004c60813c8e', 5),
(2, 'Ilse', 'de Groot', 'Markt 13', '1241 BA', 'Amsterdam', '06-43763212', 'Ilse.de.Groot@cinema7.nl', 'Ilse', '476915be4d2b168468341c77555e74f4d8dfb6422ddebbf63d053dcb9acc4bbcfcbb00e22fbdc60381acf1c1490837c942244938e420051b31703d4af13b8b2b', '2302ddecae3eed272659c3754a245301bc41a960811c2dd8f4e330fd2d96c9fc224c1684e9dae19611f1c5abc549cadf4e0c22f60ed69637aded21cdb6c5a69c', 1),
(3, 'Nicolette', 'Gevers', 'Biljoen 2', '5487 RS', 'Leende', '06-74259174', 'Nicolette@hotmail.com', 'Nicolette1983', '5d7ef92fb7f4fd59bb5fafa2446df2501b6048a12b34753dcecfe271dba7c0b926a83204be9bafff4077c8905d3b824a34ff6ce3e7d3e5d8a410b108e7b512df', '9731d92f41fba58a3dab34e74c6d0b8048d9c7c32ac45a98b18a29b18e9ec3893a7897dd268ae8211fe9b1e49f1e98c1b33728496531ec8e3e1d40e08f141978', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `PaginaNr` int(3) NOT NULL,
  `Tekst` varchar(30) COLLATE utf8_bin NOT NULL,
  `Level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`PaginaNr`, `Tekst`, `Level`) VALUES
(1, 'Reserveren', 0),
(2, 'Verwacht', 0),
(3, 'Over Ons', 0),
(4, 'MijnProfiel', 1),
(7, 'Film Toevoegen', 5),
(8, 'Film Aanpassen/Verwijderen', 5),
(10, 'Besteloverzicht', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reserveringen`
--

CREATE TABLE IF NOT EXISTS `reserveringen` (
  `ReserveringsID` int(11) NOT NULL,
  `KlantID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reserveringen_vertoningen`
--

CREATE TABLE IF NOT EXISTS `reserveringen_vertoningen` (
  `ReserveringsID` int(11) NOT NULL,
  `VertoningsID` int(11) NOT NULL,
  `AantalKaartjes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vertoningen`
--

CREATE TABLE IF NOT EXISTS `vertoningen` (
  `VertoningsID` int(11) NOT NULL,
  `ZaalNR` int(11) NOT NULL,
  `FilmID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vertoningen`
--

INSERT INTO `vertoningen` (`VertoningsID`, `ZaalNR`, `FilmID`, `Datum`, `Tijd`) VALUES
(1, 1, 1, '2015-04-16', '16:30:00'),
(2, 1, 1, '2015-04-16', '20:30:00'),
(3, 1, 1, '2015-04-16', '23:00:00'),
(4, 2, 1, '2015-04-17', '16:30:00'),
(5, 1, 1, '2015-04-17', '23:00:00'),
(6, 1, 1, '2015-04-18', '17:00:00'),
(7, 2, 1, '2015-04-18', '19:35:00'),
(8, 1, 1, '2015-04-18', '22:50:00'),
(9, 2, 4, '2015-04-16', '16:35:00'),
(10, 2, 4, '2015-04-16', '20:35:00'),
(11, 2, 4, '2015-04-16', '23:05:00'),
(12, 1, 4, '2015-04-17', '16:35:00'),
(13, 2, 4, '2015-04-17', '23:05:00'),
(14, 2, 4, '2015-04-18', '17:05:00'),
(15, 1, 4, '2015-04-18', '19:40:00'),
(16, 2, 4, '2015-04-18', '22:55:00'),
(17, 3, 3, '2015-04-16', '16:45:00'),
(18, 5, 3, '2015-04-16', '20:45:00'),
(19, 5, 3, '2015-04-16', '23:15:00'),
(20, 3, 3, '2015-04-17', '16:45:00'),
(21, 3, 3, '2015-04-17', '23:15:00'),
(22, 5, 3, '2015-04-18', '17:15:00'),
(23, 3, 3, '2015-04-18', '19:50:00'),
(24, 5, 3, '2015-04-18', '22:55:00'),
(25, 5, 5, '2015-04-16', '16:55:00'),
(26, 3, 5, '2015-04-16', '20:55:00'),
(27, 3, 5, '2015-04-16', '23:25:00'),
(28, 5, 5, '2015-04-17', '16:55:00'),
(29, 5, 5, '2015-04-17', '23:25:00'),
(30, 3, 5, '2015-04-18', '17:25:00'),
(31, 5, 5, '2015-04-18', '19:55:00'),
(32, 3, 5, '2015-04-18', '23:05:00'),
(33, 4, 9, '2015-04-16', '17:05:00'),
(34, 6, 9, '2015-04-16', '21:05:00'),
(35, 6, 9, '2015-04-16', '23:35:00'),
(36, 4, 9, '2015-04-17', '17:05:00'),
(37, 4, 9, '2015-04-17', '23:35:00'),
(38, 6, 9, '2015-04-18', '17:35:00'),
(39, 6, 9, '2015-04-18', '20:05:00'),
(40, 4, 9, '2015-04-18', '23:15:00'),
(41, 6, 10, '2015-04-16', '17:15:00'),
(42, 4, 10, '2015-04-16', '21:15:00'),
(43, 4, 10, '2015-04-16', '23:45:00'),
(44, 6, 10, '2015-04-17', '17:15:00'),
(45, 6, 10, '2015-04-17', '23:45:00'),
(46, 4, 10, '2015-04-18', '17:45:00'),
(47, 4, 10, '2015-04-18', '20:15:00'),
(48, 6, 10, '2015-04-18', '23:25:00'),
(49, 7, 11, '2015-04-16', '17:25:00'),
(50, 7, 11, '2015-04-16', '21:25:00'),
(51, 7, 11, '2015-04-16', '23:55:00'),
(52, 7, 11, '2015-04-17', '17:25:00'),
(53, 7, 11, '2015-04-17', '23:55:00'),
(54, 7, 11, '2015-04-18', '17:55:00'),
(55, 7, 11, '2015-04-18', '20:25:00'),
(56, 7, 11, '2015-04-18', '23:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `zalen`
--

CREATE TABLE IF NOT EXISTS `zalen` (
  `ZaalNR` int(1) NOT NULL,
  `Naam` varchar(20) COLLATE utf8_bin NOT NULL,
  `Capaciteit` int(4) NOT NULL,
  `Service` enum('Ja','Nee') COLLATE utf8_bin NOT NULL DEFAULT 'Ja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zalen`
--

INSERT INTO `zalen` (`ZaalNR`, `Naam`, `Capaciteit`, `Service`) VALUES
(1, 'Zaal 1', 700, 'Ja'),
(2, 'Zaal 2', 700, 'Ja'),
(3, 'Zaal 3', 500, 'Ja'),
(4, 'Zaal 4', 500, 'Ja'),
(5, 'Zaal 5', 350, 'Nee'),
(6, 'Zaal 6', 350, 'Nee'),
(7, 'Zaal 7', 350, 'Nee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`FilmID`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`KlantID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`PaginaNr`);

--
-- Indexes for table `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`ReserveringsID`);

--
-- Indexes for table `reserveringen_vertoningen`
--
ALTER TABLE `reserveringen_vertoningen`
  ADD PRIMARY KEY (`ReserveringsID`,`VertoningsID`);

--
-- Indexes for table `vertoningen`
--
ALTER TABLE `vertoningen`
  ADD PRIMARY KEY (`VertoningsID`);

--
-- Indexes for table `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`ZaalNR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `FilmID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `KlantID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `ReserveringsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vertoningen`
--
ALTER TABLE `vertoningen`
  MODIFY `VertoningsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
