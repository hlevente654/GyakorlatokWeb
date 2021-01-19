-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 08. 18:46
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `notebook`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `archivalas` ()  begin
insert into archivum select * from termekek where db=0;
delete from termekek where db=0;
select row_count() as torolt;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oprend`
--

CREATE TABLE `oprend` (
  `oid` int(11) NOT NULL,
  `operacios_rendszer` varchar(40) COLLATE latin2_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

--
-- A tábla adatainak kiíratása `oprend`
--

INSERT INTO `oprend` (`oid`, `operacios_rendszer`) VALUES
(1, 'FreeDOS'),
(2, 'Linux'),
(3, 'Microsoft Vista Business'),
(4, 'Microsoft Vista Home Basic HU'),
(5, 'Microsoft Vista Home Premium'),
(6, 'Microsoft Vista Home Premium HU'),
(7, 'Microsoft Vista Home Premium HU notebook'),
(8, 'nincs'),
(9, 'Windows 7 Home Premium HU 32Bit'),
(10, 'Windows 7 Home Premium HU 64Bit'),
(11, 'Windows 7 Starter Edition HU'),
(12, 'Windows XP Home Magyar');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `processzor`
--

CREATE TABLE `processzor` (
  `pid` int(11) NOT NULL,
  `processzor_gyarto` varchar(5) COLLATE latin2_hungarian_ci NOT NULL,
  `processzor_tipus` varchar(24) COLLATE latin2_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

--
-- A tábla adatainak kiíratása `processzor`
--

INSERT INTO `processzor` (`pid`, `processzor_gyarto`, `processzor_tipus`) VALUES
(1, 'AMD', 'Athlon 64 X2 QL64'),
(2, 'AMD', 'Athlon 64 X2 QL65'),
(3, 'AMD', 'Athlon TM Neo MV-40'),
(4, 'AMD', 'Mobil Sempron SI-40'),
(5, 'AMD', 'Turion64 X2 TL60'),
(6, 'AMD', 'Turion64 X2 TL62'),
(7, 'AMD', 'Turion64 X2 TL64'),
(8, 'Intel', 'Celeron 900'),
(9, 'Intel', 'Celeron Dual-Core T1600'),
(10, 'Intel', 'Celeron Dual-Core T1700'),
(11, 'Intel', 'Celeron Dual-Core T3000'),
(12, 'Intel', 'Celeron M 560'),
(13, 'Intel', 'Celeron M ULV723'),
(14, 'Intel', 'Centrino Atom 1600'),
(15, 'Intel', 'Centrino Atom N270'),
(16, 'Intel', 'Centrino Atom N280'),
(17, 'Intel', 'Centrino Atom Z520'),
(18, 'Intel', 'Centrino Atom Z530'),
(19, 'Intel', 'Core Duo T3400'),
(20, 'Intel', 'Core2 Duo P7350'),
(21, 'Intel', 'Core2 Duo P8400'),
(22, 'Intel', 'Core2 Duo P8600'),
(23, 'Intel', 'Core2 Duo P8700'),
(24, 'Intel', 'Core2 Duo SL9400'),
(25, 'Intel', 'Core2 Duo SU7300'),
(26, 'Intel', 'Core2 Duo SU9300'),
(27, 'Intel', 'Core2 Duo SU9400'),
(28, 'Intel', 'Core2 Duo T5670'),
(29, 'Intel', 'Core2 Duo T5870'),
(30, 'Intel', 'Core2 Duo T6400'),
(31, 'Intel', 'Core2 Duo T6500'),
(32, 'Intel', 'Core2 Duo T6570'),
(33, 'Intel', 'Core2 Duo T6600'),
(34, 'Intel', 'Core2 Duo T6670'),
(35, 'Intel', 'Core2 Duo T7300'),
(36, 'Intel', 'Core2 Duo T7500'),
(37, 'Intel', 'Core2 Duo T8300'),
(38, 'Intel', 'Core2 Duo T9300'),
(39, 'Intel', 'Core2 Duo T9400'),
(40, 'Intel', 'Core2 Solo SU3500 ULV'),
(41, 'Intel', 'Pentium Dual Core SU4100'),
(42, 'Intel', 'Pentium dual-core T4200'),
(43, 'Intel', 'Pentium dual-core T4300'),
(44, 'VIA', 'Via Nano ULV 2250');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `gyarto` varchar(8) COLLATE latin2_hungarian_ci NOT NULL,
  `kijelzo` varchar(4) COLLATE latin2_hungarian_ci NOT NULL,
  `memoria` int(11) NOT NULL,
  `merevlemez` int(11) NOT NULL,
  `videovezerlo` varchar(33) COLLATE latin2_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `db` int(11) NOT NULL,
  `oid` int(4) NOT NULL,
  `pid` int(4) NOT NULL,
  `tipus` varchar(34) COLLATE latin2_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `gyarto`, `kijelzo`, `memoria`, `merevlemez`, `videovezerlo`, `ar`, `db`, `oid`, `pid`, `tipus`) VALUES
(4, 'HP', '15,6', 3072, 250, 'ATi Mobility Radeon HD4530 512MB', 167920, 20, 6, 1, 'Pavilion DV6-1110EH NL956EA'),
(5, 'ACER', '15,6', 2048, 250, 'ATi Mobility Radeon HD4570 512MB', 111920, 20, 2, 1, 'Aspire 5536G-642G25MN'),
(6, 'ACER', '15,6', 3072, 320, 'ATi Mobility Radeon HD4570 512MB', 117520, 20, 2, 1, 'Aspire 5536G-643G32MN'),
(7, 'MSI', '14', 2048, 320, 'ATI Radeon Xpress 1250', 111920, 4, 6, 3, 'X410-019HU'),
(8, 'ASUS', '14', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 115920, 1, 8, 3, 'F83T-VX005X'),
(9, 'MSI', '16', 2048, 320, 'NVIDIA GeForce Go 9100M-GS', 90800, 1, 1, 4, 'VR630XL-004HU'),
(10, 'ASUS', '16', 4096, 500, 'ATi Mobility Radeon HD4670 512MB', 183920, 4, 10, 5, 'N60DP-JX012V'),
(11, 'ASUS', '15,6', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 134320, 5, 8, 7, 'K50AB-SX045D'),
(12, 'FUJITSU', '13,3', 2048, 250, 'ATi Mobility Radeon HD3200 256MB', 223920, 4, 6, 6, 'Amilo Sa3650'),
(13, 'MSI', '12', 2048, 320, 'Intel Graphics X4500M / 256MB', 112400, 20, 6, 13, 'WIND U200-064HU'),
(15, 'DELL', '15,6', 1024, 160, 'Intel Graphics 4500MHD', 103120, 20, 2, 8, 'Inspiron 1545-106208 RED'),
(18, 'MSI', '15,6', 4096, 320, 'NVIDIA GeForce Go 8200M 128MB', 95920, 20, 1, 8, 'CR500X-008HU'),
(22, 'HP', '15,6', 2048, 250, 'Intel Graphics 4500MHD', 111920, 1, 1, 9, 'ProBook 4510s NX435EA'),
(23, 'FUJITSU', '15,4', 1024, 160, 'Intel Graphics 4500MHD', 95920, 4, 2, 10, 'Esprimo V6535'),
(24, 'LENOVO', '15,6', 1024, 160, 'Intel Graphics 4500MHD', 94320, 5, 4, 11, 'IdeaPad G550L 59-026377'),
(25, 'HP', '15,6', 3072, 320, 'Intel Graphics 4500MHD', 127120, 20, 4, 11, 'Presario CQ61-200SH NZ890EA'),
(27, 'HP', '15,6', 2048, 250, 'Intel Graphics 4500MHD', 113520, 20, 2, 11, 'ProBook 4510s NX668EA'),
(28, 'HP', '13,3', 1024, 160, 'Intel Graphics 4500MHD', 119920, 20, 2, 11, 'ProBook 4310s NX580EA'),
(29, 'ASUS', '15,6', 2048, 250, 'Intel Graphics X4500M', 94320, 20, 8, 11, 'K50IJ-SX036L'),
(32, 'DELL', '15,6', 1024, 250, 'Intel Graphics x3100', 79920, 20, 2, 12, 'Vostro V860-111696'),
(33, 'HP', '10,1', 1024, 80, 'Intel Graphics 950', 114000, 20, 12, 14, 'Mini 1199 NS528EA'),
(34, 'Asus', '10', 1024, 160, 'Intel Graphics 4500MHD', 59920, 4, 12, 15, 'EEE PC 1001HA-BLK012X BLACK'),
(35, 'Asus', '10', 1024, 160, 'Intel Graphics 4500MHD', 59920, 4, 12, 15, 'EEE PC 1001HA-WHI009X XP WHITE'),
(36, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 55920, 20, 2, 15, 'Inspiron 1011 104442 BLUE'),
(37, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 63992, 1, 12, 15, 'Inspiron 1011 104437 BLUE'),
(38, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 63992, 4, 12, 15, 'Inspiron 1011 104435 BLACK'),
(39, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 63992, 1, 12, 15, 'Inspiron 1011 105566 RED'),
(40, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 63992, 5, 12, 15, 'Inspiron 1011 104434 WHITE'),
(42, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 63992, 5, 12, 15, 'Inspiron 1011 110960 GREEN'),
(43, 'DELL', '10,1', 1024, 160, 'Intel Graphics 500', 87920, 20, 12, 15, 'Inspiron 1011 106751 BLACK'),
(44, 'ACER', '8,9', 1024, 120, 'Intel Graphics 950', 58320, 1, 2, 15, 'ASPIRE ONE A150-A BLUE'),
(45, 'ACER', '10,1', 1024, 160, 'Intel Graphics 950', 68720, 5, 12, 15, 'ASPIRE ONE D250-0Bw'),
(46, 'ACER', '10,1', 1024, 160, 'Intel Graphics 950', 68720, 20, 12, 15, 'ASPIRE ONE D250-0Br'),
(47, 'MSI', '10', 1024, 160, 'Intel Graphics 950', 71920, 20, 12, 15, 'WIND U100-1033HU'),
(48, 'HP', '10,1', 1024, 160, 'Intel Graphics 950', 78320, 20, 12, 15, 'Mini 110c-1010SH NW642EA'),
(49, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 78320, 20, 12, 15, 'Eee PC 1005HA-WHI059X XP WHITE'),
(50, 'HP', '10,1', 1024, 80, 'Intel Graphics 950', 78320, 20, 12, 15, 'Mini 731 NG660EA'),
(51, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 78400, 20, 12, 15, 'Eee PC 1005HA-BLK076X XP'),
(52, 'LENOVO', '10,1', 1024, 160, 'Intel Graphics 950', 79920, 20, 12, 15, 'IdeaPad S10e NS9RLHL R'),
(53, 'LENOVO', '10,1', 1024, 160, 'Intel Graphics 950', 79920, 5, 12, 15, 'IdeaPad S10e NS9RJHL'),
(54, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 91999, 5, 12, 15, 'Eee PC 1002HA-BLK022X XP B'),
(55, 'Asus', '10,1', 1024, 120, 'Intel Graphics 4500MHD', 106700, 4, 12, 16, 'Eee PC 1004DN-BLK003X GR'),
(56, 'ACER', '10,1', 1024, 160, 'Intel Graphics 950', 71120, 5, 12, 16, 'ASPIRE ONE D250-1Bw'),
(57, 'ACER', '10,1', 1024, 160, 'Intel Graphics 950', 71120, 20, 12, 16, 'ASPIRE ONE D250-1B Blue'),
(58, 'MSI', '10', 1024, 160, 'Intel Graphics 950', 72400, 5, 12, 16, 'WIND U123-013HU BLUE'),
(59, 'MSI', '10', 1024, 160, 'Intel Graphics 950', 72400, 1, 12, 16, 'WIND U123-012HU RED'),
(60, 'LENOVO', '10,1', 1024, 160, 'Intel Graphics 950', 73520, 20, 12, 16, 'IdeaPad S10-2 59-027093 POP ART'),
(61, 'LENOVO', '10,1', 1024, 160, 'Intel Graphics 950', 73520, 5, 12, 16, 'IdeaPad S10-2 59-027094 FLOWER SEA'),
(63, 'MSI', '10', 1024, 160, 'Intel Graphics 950', 75600, 20, 12, 16, 'WIND U123-014HU WHITE'),
(64, 'MSI', '10', 1024, 160, 'Intel Graphics 950', 75600, 4, 12, 16, 'WIND U123-018HU GRAY'),
(65, 'LENOVO', '10,1', 1024, 160, 'Intel Graphics 950', 77520, 20, 12, 16, 'IdeaPad S10-2 59-027036 WHITE'),
(66, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 82320, 20, 12, 16, 'Eee PC 1005HA-WHI058X XP W'),
(67, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 82400, 20, 12, 16, 'Eee PC 1005HA-BLK075X XP B'),
(68, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 87120, 4, 12, 16, 'Eee S101H-BRN073X XP BR'),
(69, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 95920, 5, 12, 16, 'Eee PC 1008HA-PIK012X XP P'),
(70, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 95920, 1, 12, 16, 'Eee PC 1008HA-RED008X XP R'),
(72, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 95920, 20, 12, 16, 'Eee PC 1008HA-WHI024X XP'),
(73, 'Asus', '10', 1024, 160, 'Intel Graphics 950', 95920, 5, 12, 16, 'Eee PC 1008HA-BLU036X XP BL'),
(74, 'TOSHIBA', '10,1', 1024, 160, 'Intel GMA 950 / 256MB', 95920, 5, 11, 16, 'NB200-136'),
(75, 'Asus', '11,6', 1024, 160, 'Intel Graphics 500', 96720, 4, 12, 17, 'Eee PC 1101HA-BLK041X B'),
(76, 'Asus', '11,6', 2048, 250, 'Intel Graphics 500', 98000, 5, 11, 17, 'Eee PC 1101HA-BLK028M B'),
(77, 'ACER', '11,6', 1024, 160, 'Intel Graphics 950', 81200, 20, 12, 17, 'ASPIRE ONE 751h 52Bb BLACK'),
(78, 'ACER', '11,6', 1024, 160, 'Intel Graphics 950', 81200, 4, 12, 17, 'ASPIRE ONE 751h 52Bb WHITE'),
(79, 'ACER', '11,6', 1024, 160, 'Intel Graphics 950', 81200, 5, 12, 17, 'ASPIRE ONE 751h 52Bb RED'),
(80, 'ACER', '11,6', 1024, 160, 'Intel Graphics 950', 81200, 20, 12, 17, 'ASPIRE ONE 751H PINK'),
(81, 'ACER', '11,6', 1024, 160, 'Intel Graphics 950', 81200, 20, 12, 17, 'ASPIRE ONE 751h 52Bb BLUE'),
(82, 'Asus', '11,6', 1024, 160, 'Intel Graphics 950', 96720, 1, 12, 17, 'Eee PC 1101HA-BLU018X BLUE'),
(84, 'Asus', '11,6', 2048, 250, 'Intel Graphics 950', 98000, 4, 11, 17, 'Eee PC 1101HA-WHI022M W'),
(86, 'ASUS', '15,4', 2048, 250, 'ATi Mobility Radeon HD3470 256MB', 140720, 4, 6, 19, 'M51VR-AP184C'),
(87, 'FUJITSU', '15,4', 2048, 250, 'Intel Graphics 4500MHD', 110320, 5, 8, 19, 'Esprimo V6535-104060'),
(90, 'MSI', '17', 4096, 500, 'NVIDIA GeForce GT130M 512B DDR3', 216720, 1, 1, 20, 'GX723X-271HU'),
(92, 'LENOVO', '15,4', 2048, 160, 'Intel Graphics 4500MHD', 241520, 1, 3, 21, 'ThinkPad T500 NL34EHV'),
(93, 'LENOVO', '14,1', 2048, 160, 'Intel Graphics 4500MHD', 244720, 5, 3, 21, 'ThinkPad T400 NM81UHV'),
(94, 'FUJITSU', '15,4', 4096, 160, 'Intel Graphics 4500MHD', 268720, 5, 3, 21, 'Lifebook E8420'),
(95, 'FUJITSU', '14,1', 4096, 320, 'Intel Graphics 4500MHD', 268720, 1, 3, 21, 'Lifebook S7220'),
(96, 'FUJITSU', '13,3', 4096, 160, 'Intel Graphics 4500MHD', 279920, 20, 3, 21, 'Lifebook S6420'),
(97, 'LENOVO', '15,4', 2048, 320, 'Intel Graphics 4500MHD', 279920, 20, 3, 21, 'ThinkPad T500 NL346HV'),
(98, 'LENOVO', '15,4', 2048, 160, 'ATi Mobility Radeon HD3650', 279920, 20, 3, 22, 'ThinkPad T500 NJ253HV'),
(99, 'DELL', '16', 4096, 500, 'ATi Mobility Radeon HD3670 512MB', 266320, 5, 6, 22, 'Studio XPS 16-713 BLACK'),
(101, 'DELL', '15,6', 2048, 320, 'ATi Mobility Radeon HD4330 256MB', 169200, 5, 6, 22, 'Inspiron 1545-106227 Blue'),
(102, 'DELL', '15,6', 2048, 500, 'ATi Mobility Radeon HD4570 512MB', 192720, 20, 6, 22, 'Studio 1555-110573 RED'),
(103, 'DELL', '15,6', 2048, 500, 'ATi Mobility Radeon HD4570 512MB', 192720, 1, 6, 22, 'Studio 1555-110574 BLACK'),
(104, 'DELL', '15,6', 2048, 500, 'ATi Mobility Radeon HD4570 512MB', 192720, 20, 6, 22, 'Studio 1555-110575 BLUE'),
(105, 'TOSHIBA', '17,1', 4096, 500, 'ATi Mobility Radeon HD4650 1024MB', 234800, 20, 6, 22, 'Satellite P300-225'),
(106, 'DELL', '15,6', 4096, 500, 'ATi Mobility Radeon HD4670 512MB', 268720, 20, 6, 22, 'Studio XPS M1640-106257 B'),
(107, 'DELL', '15,6', 4096, 500, 'ATi Mobility Radeon HD4670 512MB', 268720, 5, 6, 22, 'Studio XPS M1640-106259 R'),
(108, 'LENOVO', '15,4', 2048, 160, 'Intel Graphics 4500MHD', 255920, 1, 3, 22, 'ThinkPad T500 NJ42RHV'),
(109, 'FUJITSU', '14,1', 4096, 320, 'Intel Graphics 4500MHD', 279920, 20, 3, 22, 'Lifebook S7220-1'),
(110, 'TOSHIBA', '14,1', 3072, 250, 'NVIDIA Quadro NVS 150M 256MB', 271920, 20, 3, 22, 'Tecra M10-14Z'),
(111, 'DELL', '13,3', 4096, 500, 'NVIDIA GeForce Go 9400M-GS 256MB', 251920, 5, 6, 22, 'Studio XPS M1340-106255 B'),
(112, 'DELL', '13,3', 4096, 500, 'NVIDIA GeForce Go 9400M-GS 256MB', 251920, 4, 6, 22, 'Studio XPS M1340-106256 R'),
(113, 'ASUS', '14,1', 4096, 320, 'NVIDIA GeForce 9650M GT 1GB', 215920, 4, 6, 22, 'N80VN-GP023C'),
(115, 'TOSHIBA', '17', 4096, 320, 'NVIDIA GeForce Go 9700M-GT 512MB', 399920, 4, 6, 23, 'Qosmio X300-14V'),
(116, 'ASUS', '17,3', 4096, 640, 'NVIDIA GeForce GT220M 1GB', 243920, 20, 10, 23, 'N71VG-TY046V'),
(117, 'ASUS', '16', 4096, 500, 'NVIDIA GeForce GT240M 1GB', 247920, 4, 10, 23, 'N61VN-JX069V'),
(118, 'MSI', '15,4', 4096, 500, 'NVIDIA GeForce GTS 160M', 258000, 20, 1, 23, 'GT628X-447HU'),
(120, 'ThinkPad', '12,1', 2048, 250, 'Intel Graphics 4500MHD', 387120, 20, 3, 24, 'X200 NRRFWHV'),
(121, 'ACER', '13,3', 4096, 500, 'ATi Mobility Radeon HD4330 256MB', 174320, 5, 6, 25, 'Timeline 3810TG-734G50N'),
(122, 'ACER', '14', 3072, 250, 'ATi Mobility Radeon HD4330 512MB', 164720, 20, 10, 25, 'Aspire Timeline 4810TG-733G25MN'),
(123, 'ACER', '14', 3072, 250, 'Intel Graphics 4500MHD', 167920, 20, 3, 25, 'TravelMate 8471-733G25MN'),
(124, 'ASUS', '12,1', 3072, 320, 'Intel Graphics X4500M / 256MB', 146800, 20, 10, 25, 'UL20A-2X022V'),
(125, 'ASUS', '13,3', 3072, 320, 'Intel Graphics X4500M / 256MB', 148720, 20, 10, 25, 'UL30A-QX164V'),
(126, 'ASUS', '15,6', 4096, 500, 'Intel Graphics X4500M / 256MB', 174320, 20, 10, 25, 'UL50AG-XX007V'),
(127, 'ASUS', '13,3', 3072, 320, 'Intel Graphics X4500M / 256MB', 177520, 1, 10, 25, 'UX30-QX096V'),
(129, 'ASUS', '14', 3072, 320, 'Intel GMA 950 / 256MB', 162320, 5, 10, 25, 'UL80AG-WX011V'),
(130, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce G105/512MB', 203920, 20, 10, 25, 'UX50V-XX042V'),
(131, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce GT210M 512GB', 191120, 20, 10, 25, 'UL50VT-XX021V'),
(132, 'TOSHIBA', '12,1', 2048, 250, 'Intel Graphics 4500MHD', 271920, 5, 3, 26, 'Portégé A600-139'),
(134, 'ACER', '13,3', 4096, 320, 'Intel Graphics 4500MHD', 168720, 20, 6, 27, 'Timeline 3810T-944G32N'),
(135, 'ACER', '14', 3072, 320, 'Intel Graphics 4500MHD', 189200, 20, 6, 27, 'Aspire Timeline 4810T-943G32MN'),
(137, 'FUJITSU', '15,4', 2048, 250, 'NVIDIA GeForce Go 8200M 128MB', 123920, 1, 8, 28, 'Esprimo V6515-104062'),
(138, 'FUJITSU', '15,4', 2048, 160, 'SiS Mirage 3+ 256M', 103920, 20, 1, 29, 'Esprimo V5535 02'),
(140, 'HP', '15,6', 3072, 320, 'ATi Mobility Radeon HD4330 256MB', 157520, 1, 4, 29, 'ProBook 4510s NX624EA'),
(141, 'HP', '17,3', 3072, 320, 'ATi Mobility Radeon HD4330 512MB', 159920, 4, 1, 29, 'ProBook 4710s NX628EA'),
(142, 'HP', '15,6', 1024, 160, 'Intel Graphics x3100', 104990, 1, 1, 29, 'COMPAQ 610 NX549EA'),
(143, 'HP', '15,6', 2048, 320, 'Intel Graphics x3100', 121520, 20, 1, 29, 'COMPAQ 610 NX550EA'),
(146, 'FUJITSU', '15,4', 2048, 250, 'NVIDIA GeForce Go 8200M 128MB', 108000, 20, 2, 29, 'Esprimo V6555 MPWE5HU'),
(148, 'FUJITSU', '15,4', 2048, 250, 'ATi Mobility Radeon HD3450 256MB', 143920, 4, 2, 30, 'Esprimo V6545-104064'),
(149, 'FUJITSU', '15,4', 2048, 320, 'Intel Graphics 4500MHD', 111111, 20, 8, 30, 'Amilo PI 3525'),
(151, 'MSI', '16', 4096, 500, 'ATi Mobility Radeon HD4330 256MB', 149600, 1, 8, 31, 'CX600X-042HU'),
(152, 'DELL', '15,6', 4096, 320, 'ATi Mobility Radeon HD4330 256MB', 159920, 20, 6, 31, 'Inspiron 1545-699 BLUE'),
(153, 'DELL', '15,6', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 176720, 5, 1, 31, 'Studio 1555-635 RED'),
(154, 'DELL', '15,6', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 190320, 20, 6, 31, 'Studio 1555-106249 BLUE'),
(155, 'ASUS', '13,3', 3072, 250, 'Intel Graphics X4500M / 256MB', 159920, 20, 8, 31, 'F6A-3P193X'),
(156, 'ASUS', '15,6', 4096, 250, 'NVIDIA GeForce G102M/512MB', 135920, 1, 8, 31, 'K50IN-SX024L'),
(157, 'DELL', '13,3', 2048, 320, 'NVIDIA GeForce Go 9400M-GS 256MB', 201520, 5, 6, 31, 'Studio XPS M1340-110934 B'),
(158, 'HP', '15,6', 3072, 500, 'ATi Mobility Radeon HD4330 256MB', 187600, 5, 6, 32, 'ProBook 4510s VC191EA'),
(159, 'HP', '15,6', 2048, 250, 'Intel Graphics 4500MHD', 203920, 20, 3, 32, 'ProBook 4510s NA921EA'),
(160, 'DELL', '15,6', 4096, 320, 'ATi Mobility Radeon HD4330 512MB', 139120, 20, 2, 33, 'Inspiron 1545-111827 Red'),
(162, 'DELL', '15,6', 4096, 320, 'ATi Mobility Radeon HD4330 512MB', 139120, 5, 2, 33, 'Inspiron 1545-111828 Blue'),
(165, 'MSI', '16', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 164720, 5, 1, 33, 'EX627X-400HU'),
(166, 'ASUS', '14', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 199120, 20, 10, 33, 'U80V-WX101V'),
(167, 'LENOVO', '15,6', 3072, 320, 'Intel Graphics 4500MHD', 135920, 5, 1, 33, 'IdeaPad G550A 59-026421'),
(168, 'ACER', '15,6', 3072, 320, 'Intel Graphics 4500MHD', 123920, 20, 2, 33, 'Aspire 5738-663G32MN Linux'),
(170, 'ASUS', '15,6', 3072, 250, 'NVIDIA GeForce G102M/512MB', 126320, 4, 2, 33, 'K50IN-SX155L'),
(171, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce G102M/512MB', 131920, 20, 2, 33, 'K50IN-SX157L'),
(172, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce G105/512MB', 195120, 1, 10, 33, 'U50VG-XX156V'),
(174, 'TOSHIBA', '13,3', 2048, 320, 'NVIDIA GeForce GT210M 512GB', 166320, 20, 10, 33, 'Satellite U500-17E'),
(175, 'ASUS', '16', 4096, 500, 'NVIDIA GeForce GT220M 1GB', 167680, 20, 8, 33, 'F50SF-JX061X'),
(176, 'ASUS', '16', 4096, 500, 'NVIDIA GeForce GT220M 1GB', 207920, 20, 10, 33, 'N61VG-JX070V'),
(177, 'TOSHIBA', '16', 4096, 320, 'NVIDIA GeForce GT230M 1GB', 185520, 20, 10, 33, 'Satellite A500-1DN'),
(178, 'LENOVO', '15,4', 2048, 320, 'Intel Graphics 4500MHD', 169520, 20, 4, 34, 'SL500 NRJEBHV'),
(179, 'FUJITSU', '15,4', 2048, 250, 'Intel Graphics x3100', 135555, 4, 4, 35, 'Esprimo V5505 02'),
(181, 'FUJITSU', '15,4', 2048, 160, 'Intel Graphics x3100', 155920, 20, 3, 37, 'Esprimo D9500-101571'),
(182, 'FUJITSU', '15,4', 4096, 160, 'Intel Graphics x3100', 179120, 20, 3, 38, 'Esprimo D9500-101570'),
(184, 'ACER', '13,3', 2048, 250, 'Intel Graphics 4500MHD', 130320, 1, 6, 40, 'Timeline 3810T-352G25N'),
(185, 'MSI', '14', 2048, 500, 'Intel Graphics 4500MHD', 143920, 4, 6, 40, 'X400-048HU'),
(186, 'ASUS', '13,3', 3072, 500, 'Intel Graphics X4500M / 256MB', 198800, 5, 6, 40, 'UX30-QX032C'),
(188, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce G105/512MB', 244720, 20, 6, 40, 'UX50V-XX007C'),
(189, 'ACER', '13,3', 4096, 320, 'Intel Graphics 4500MHD', 138320, 20, 9, 41, 'Timeline 3810TZ-414G32N'),
(190, 'ACER', '15,6', 4096, 320, 'Intel Graphics 4500MHD', 142320, 20, 7, 41, 'Timeline 5810TZ-414G32MN Vista'),
(191, 'ACER', '15,6', 4096, 320, 'Intel Graphics 4500MHD', 146320, 20, 9, 41, 'Timeline 5810TZ-414G32MN Win7'),
(192, 'ACER', '14,1', 3072, 250, 'Intel Graphics 4500MHD', 150000, 5, 10, 41, 'Aspire Timeline 4810TZ-413G25MN'),
(193, 'TOSHIBA', '13,3', 4096, 320, 'Intel Graphics X4500M / 256MB', 151920, 5, 10, 41, 'Satellite T130-10G'),
(194, 'FUJITSU', '15,4', 2048, 250, 'ATi Mobility Radeon HD3450 256MB', 110320, 1, 2, 19, 'Esprimo V6545'),
(195, 'TOSHIBA', '15,4', 2048, 320, 'ATi Mobility Radeon HD3470 256MB', 126000, 5, 8, 19, 'Satellite A300-22Z'),
(196, 'FUJITSU', '15,4', 2048, 250, 'Intel Graphics 4500MHD', 111111, 20, 2, 19, 'Esprimo V6505'),
(197, 'FUJITSU', '15,4', 3072, 250, 'NVIDIA GeForce Go 9300M 256MB', 115920, 5, 8, 19, 'Amilo PI 3540-104877'),
(198, 'MSI', '15,4', 4096, 320, 'ATi Mobility Radeon HD3410 256MB', 121520, 4, 1, 42, 'VX600X-206HU'),
(199, 'TOSHIBA', '15,4', 2048, 320, 'ATi Mobility Radeon HD3470 256MB', 125520, 20, 8, 42, 'Satellite A300-29K'),
(200, 'TOSHIBA', '15,4', 3072, 320, 'ATi Mobility Radeon HD3470 256MB', 131920, 5, 6, 42, 'Satellite A300-22W'),
(201, 'TOSHIBA', '15,4', 4096, 320, 'ATi Mobility Radeon HD3470 256MB', 135120, 20, 6, 42, 'Satellite A300-29J'),
(203, 'MSI', '17,3', 4096, 320, 'ATi Mobility Radeon HD4330 256MB', 133520, 1, 8, 42, 'CX700X-013HU'),
(204, 'HP', '15,6', 3072, 250, 'ATi Mobility Radeon HD4530 512MB', 183992, 20, 6, 42, 'Pavilion DV6-1120EH NM629EA'),
(205, 'ASUS', '14', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 138320, 5, 8, 42, 'F83SE-VX039'),
(206, 'TOSHIBA', '15,4', 2048, 250, 'Intel Graphics 4500MHD', 103600, 1, 8, 42, 'Satellite L300-2CE'),
(207, 'FUJITSU', '15,4', 4096, 320, 'Intel Graphics 4500MHD', 118320, 20, 8, 42, 'Esprimo V6535-104061'),
(208, 'FUJITSU', '18,4', 4096, 320, 'Intel Graphics 4500MHD', 123920, 20, 8, 42, 'Amilo Li 3910-UW5HU'),
(209, 'ASUS', '15,6', 4096, 320, 'Intel Graphics 4500MHD', 125520, 20, 8, 42, 'K50IJ-SX025L'),
(210, 'HP', '15,6', 2048, 250, 'Intel Graphics 4500MHD', 131920, 4, 4, 42, 'Presario CQ61-110eh NT353EA'),
(211, 'HP', '15,6', 3072, 320, 'Intel Graphics 4500MHD', 134320, 20, 1, 42, 'ProBook 4510s VC179ES'),
(212, 'ASUS', '13,3', 3072, 250, 'Intel Graphics X4500M / 256MB', 143120, 4, 8, 42, 'F6A-3P154X'),
(213, 'ASUS', '15,6', 4096, 320, 'NVIDIA GeForce G102M/512MB', 129520, 5, 8, 42, 'K50IN-SX011L'),
(215, 'ACER', '15,6', 2048, 250, 'NVIDIA GeForce G105/512MB', 123120, 4, 4, 42, 'Aspire 5738ZG-422G25MN'),
(217, 'MSI', '16', 4096, 500, 'ATi Mobility Radeon HD4330 256MB', 119120, 4, 8, 43, 'CX600X-072HU'),
(218, 'DELL', '15,6', 2048, 320, 'ATi Mobility Radeon HD4330 512MB', 134320, 20, 6, 43, 'Inspiron 1545-110961 Red'),
(220, 'DELL', '15,6', 2048, 320, 'ATi Mobility Radeon HD4330 512MB', 134320, 4, 6, 43, 'Inspiron 1545-110964 White'),
(221, 'DELL', '15,6', 2048, 320, 'ATi Mobility Radeon HD4330 512MB', 134320, 20, 6, 43, 'Inspiron 1545-110962 Black'),
(222, 'ASUS', '14', 4096, 500, 'ATi Mobility Radeon HD4570 512MB', 124720, 20, 8, 43, 'F83SE-VX057D'),
(223, 'ACER', '15,6', 2048, 250, 'ATi Mobility Radeon HD4570 512MB', 126320, 5, 5, 43, 'Aspire 5738ZG-432G25MN'),
(225, 'TOSHIBA', '15,4', 2048, 250, 'Intel Graphics 4500MHD', 110320, 20, 6, 43, 'Satellite L300-2C5'),
(226, 'ACER', '15,6', 4096, 320, 'Intel Graphics 4500MHD', 126320, 20, 6, 43, 'Aspire 5738Z-434G32MN'),
(227, 'ACER', '15,6', 1024, 160, 'Intel Graphics 4500MHD', 94320, 1, 2, 43, 'Extensa 5635Z-431G16MN'),
(228, 'TOSHIBA', '15,6', 2048, 320, 'Intel Graphics X4500M / 256MB', 103920, 1, 1, 43, 'Satellite L500-1EQ'),
(229, 'ASUS', '15,6', 2048, 250, 'Intel Graphics X4500M / 256MB', 103920, 1, 8, 43, 'K50IJ-SX148L'),
(230, 'TOSHIBA', '15,6', 4096, 320, 'Intel Graphics X4500M / 256MB', 103920, 4, 1, 43, 'Satellite L500-1GE'),
(231, 'ASUS', '15,6', 3072, 250, 'Intel Graphics X4500M / 256MB', 110320, 5, 8, 43, 'K50IJ-SX151L'),
(233, 'ASUS', '15,6', 4096, 320, 'Intel Graphics X4500M / 256MB', 120400, 1, 8, 43, 'K50IJ-SX124L'),
(234, 'ASUS', '17,3', 4096, 320, 'Intel Graphics X4500M / 256MB', 131920, 1, 8, 43, 'K70IJ-TY042L'),
(235, 'ASUS', '15,6', 3072, 250, 'NVIDIA GeForce G102M/512MB', 111920, 20, 2, 43, 'K50IN-SX153L'),
(236, 'ASUS', '15,6', 4096, 320, 'NVIDIA GeForce G102M/512MB', 115920, 5, 2, 43, 'K50IN-SX154L'),
(237, 'ASUS', '15,6', 3072, 250, 'NVIDIA GeForce G102M/512MB', 127920, 4, 9, 43, 'K50IN-SX153V'),
(238, 'ASUS', '17,3', 4096, 320, 'NVIDIA GeForce GT120M 1GB', 138320, 20, 8, 43, 'K70IO-TY073L'),
(240, 'ASUS', '15,6', 4096, 500, 'NVIDIA GeForce GT220M 1GB', 143920, 1, 8, 43, 'K61IC-JX018D'),
(242, 'MSI', '13,4', 2048, 320, 'Intel Graphics 4500MHD', 135920, 5, 6, 13, 'X340-037HU'),
(243, 'LENOVO', '12', 1024, 160, 'VIA S3 Chrome 9', 97520, 4, 12, 44, 'IdeaPad S12 Black'),
(244, 'LENOVO', '12', 1024, 160, 'VIA S3 Chrome 9', 97520, 4, 12, 44, 'IdeaPad S12 White'),
(245, 'ASUS', '15,6', 2048, 250, 'ATi Mobility Radeon HD3200 256MB', 98320, 1, 8, 2, 'K51AC-SX037D'),
(246, 'ASUS', '15,6', 3072, 250, 'ATi Mobility Radeon HD4570 512MB', 107120, 5, 8, 2, 'K50AB-SX073D');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `oprend`
--
ALTER TABLE `oprend`
  ADD PRIMARY KEY (`oid`);

--
-- A tábla indexei `processzor`
--
ALTER TABLE `processzor`
  ADD PRIMARY KEY (`pid`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oid` (`oid`),
  ADD KEY `pid` (`pid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `oprend`
--
ALTER TABLE `oprend`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `processzor`
--
ALTER TABLE `processzor`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `termekek_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `oprend` (`oid`),
  ADD CONSTRAINT `termekek_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `processzor` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
