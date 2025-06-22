-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnkdrinovci`
--
CREATE DATABASE IF NOT EXISTS `hnkdrinovci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `hnkdrinovci`;

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` tinyint(1) DEFAULT 0,
  `datum` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`, `datum`) VALUES
(9, 'HNK Drinovaci slavili protiv NK Šator', 'Izvještaj s utakmice protiv NK \"Šator\" Glamoč', 'PROTIV ŠATORA RUTINSKI \r\nPo dosta velikoj vrućini upisali smo nova tri boda protiv jako dobre ekipe Šatora iz Glamoča.\r\n3:0. Jednosmjerna ulica od početka. Osjetno umorni gosti nisu imali nikakve šanse. Prvo je Dario zabio za 1:0 glavom na asistenciju Mislava, zatim je Dario izborio penal koji je uspješno realizirao Gadže i na kraju opet Dario na dodavanje Vrnje za potvrdu pobjede. Nešto se često u zadnje vrime spominje ovaj triput nabrojani gore. \r\nIzdvojiti ćemo još i clean sheet Prkija i Džele, dobru rolu i minutažu klupe, lekciju Đafi da ne može na krilo i standardno dobru utakmicu obrane i sredine.\r\nS obzirom da je autor riješio tekmu bit će previše subjektivno sve što se napiše pa prostor za pohvale/kritike ostavljamo Vama.\r\nVelike pohvale zaslužuju naše vjerne \"Plotice\" koje su nas neumorno bodrile pjesmom svih 90 minuta. Atmosfera kakve se ne bi posramile ni HNL tribine. Poseban naboj u igračima izazivale su pjesme \"ajmo bijeli ale\" i  \"igrajte srcem bijeli plemići\" koje će većem dijelu Hercegovine poslužiti i u subotu popodne kada na megdan Hajduku stižu gosti iz Zagreba.\r\nNakon što je u prvom poluvremenu spremio u džep desno krilo gostiju Tale je drugo poluvrijeme spremio i roštilj za obje ekipe.\r\nBila je ovo sjajna uvertira za derbi u nedjelju kad nam na Boljavu dolazi prvoplasirani Hnk Junak Srđevići. Pobjedom bi se dodatno približili prošlogodišnjim viceprvacima dok bi se remijem ili porazom vjerojatno oprostili od titule. \r\n⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴', 'fotografije/vs šator.jpg', 'utakmice', 0, '2025-06-15 20:04:47'),
(10, 'HNK Drinovci najavljuje utakmicu protiv NK Rakitno', 'Najava utakmice protiv NK Rakitno', 'Iza ručka malo prileć pa na Boljavu. \r\nVidimo se u 17:00h na Boljavi kada naši momci igraju utakmicu protiv NK Rakitno.\r\n⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️', 'fotografije/najava_vs_raktino.jpg', 'utakmice', 0, '2025-06-15 20:08:18'),
(11, 'HNK Drinovci slavili protiv NK Rakitno na Boljavi', 'Pobjeda u utakmici protiv NK Rakitno', 'RAKITNO ✅️\r\nIako nam je Rakitno prethodnih godina znalo zapapriti na Boljavi, ovog puta to nije bilo tako. Zbog koride hendikepirani gosti nisu imali šanse.\r\n6:0 pobjeda. Dva Levi koji polako dolazi na svoje, dva Taćo, jedan Mislav i jedan TT. Dvi asistencije TT-a koji čini se opravdava povjerenje, jedna Mislava, jedna Gadže, jedna Levija i jedna Čuljka. \r\nOvog puta nije bilo podrške Plotica koje su vikend provele na ekskurziji. \r\nIza utakmice druženje s gostima uz pizzu i pivu i svak svojoj kući. Za vikend igramo u Šujici protiv istoimenog domaćina. \r\nUtakmica je u terminu kada igra HNL trojka za titulu. Gore ne može. Čini se da će se tražiti mjesto više na klupi kako bi ispratili u kojem će smjeru Kustić s Bosiljeva. \r\n(Isprike što tekst kasni, autor nije među strijelcima pa mu nije zanimljivo).\r\n🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️🔴⚽️', 'fotografije/vs rakitno.jpg', 'utakmice', 0, '2025-06-15 20:10:25'),
(12, 'Na stadionu Boljava odigran 8. Uskrsni memorijalni turnir', 'Odigran je 8. Uskrsni memorijalni turnir na Boljavi', 'U utorak je na našem stadionu održan osmi po redu Uskrsni memorijalni turnir koji svake godine održavamo u čast prerano preminulih ljudi koji su dio svog životnog puta posvetili našem klubu. Robert Majić, Boro Leventić, Jerko Majić, Iko Vrcan,  Nikola Kozina..\r\n278 djece iz cijele Hercegovine zaigralo je na Boljavi i ponijelo medalju kući kao uspomenu za cijeli život. \r\nPrvo mjesto osvojila je ekipa HŠK Posušje koja je u finalu pobjedila Nk Široki Brijeg rezultatom 2:1. Najbolji igrač turnira bio je Ivan Miličević, najbolji golman Zvonko Jukić - obojica iz redova HŠK Posušje dok je najbolji strijelac bio Luka Adžić iz NK Širokog s tri postignuta pogotka.\r\nHvala firmi T.P. Drinovci koja je kao i svake godine podržala turnir. \r\nNe damo zaboravu. ⚽️🔴', 'fotografije/turnir.jpg', 'ostalo', 0, '2025-06-15 20:12:48'),
(13, 'HNK Drinovci osigurali četvrtu titulu prvaka u posljednjih pet godina', 'Ovaj vikend naši su igrači osigurali četvrtu titulu prvaka u posljednjih pet godina', 'Četvrta u zadnjih pet godina.\r\nU nedjelju smo osigurali još jednu titulu MŽNL. Protiv Kupresa nam je trebala pobjeda na Boljavi. Nažalost, gosti se nisu skupili, nisu došli, te je utakmica registrirana 3:0 u našu korist. \r\nDa ne ostane da se ništa nije odigralo, podjelili smo se u dvi ekipe, skratili malo teren, obukli dresove iz 2008 i odigrali nešto između sebe. \r\nIza utakmice nam je svratio osvajač dvostruke krune Majstorović kojem smo uručili dres Hnk Drinovci s njegovim brojem 45. \r\nOnda je krenula fešta do kasno u noć. Bolje da ne iznosimo detalje. Pojedinci su tek jutros nadošli. \r\nU zadnjoj utakmici prvenstva gostujemo u Mesihovini, prema informacijama iz stručnog stožera tribala bi klupa participirati veći dio utakmice. \r\nI klempo je najavljen za nedjelju, što znači da je kapetan odjednom čudesno ozdravio i bit će u kadru za utakmicu. \r\nBorba je i za MVP titulu. Nećak ne može, Prki se sam nameće, golovi i asistencije se ne broje, nije nerealan ni netko iz obrane a ima naznaka da će big boss odabrat nekog desetog. \r\n#ajdeeeeeeeeeeeeee #guštisugušti\r\n⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️🔴🔴🔴🔴🔴🔴🔴🔴🔴🔴', 'fotografije/drinovci-kupres24_25.jpg', 'ostalo', 0, '2025-06-15 20:18:11'),
(14, 'Mladić rodom iz Drinovaca potpisao za Bayern', 'Velik uspjeh mladića rodom iz Drinovaca', 'Gabrijel Eljuga u selu poznatiji kao \"Robin mali\" prije nekoliko dana u pratnji roditelja potpisao je četverogodišnji ugovor za Bayern iz Münchena. \r\nGabrijel je jedan od onih što su svako ljeto godišnji provodili na Boljavi s čunjevima i loptama na +40. \r\nPrije potpisa za Bayern osam godina je bio član SGV Freiburga.  Prepoznat je i od strane HNS-a, pa je tako prije dva mjeseca bio član reprezentacije na memorijalnom turniru VUKOVAR 2025. \r\nČestitke Gabrijelu i ponosnim roditeljima na ovom velikom dostignuću. Svoj nogometni put graditi će do punoljetnosti u jednoj od najboljih škola nogometa na svitu. \r\nNeka ga zdravlje posluži, ne sumnjamo da ćemo ga uskoro gledati i na TV ekranima.\r\n⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️⚽️', 'fotografije/eljuga_bayern.jpg', 'ostalo', 0, '2025-06-15 20:19:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
