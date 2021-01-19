-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 06. 16:24
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
-- Adatbázis: `users`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(80) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(80) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `felhasznalonev`, `nev`, `email`, `jelszo`, `foto`) VALUES
(3, 'kmagdi', 'Katay Magdi', '', '$2y$10$/k2wGwAK2zh1PpNZBoouz.QA6WS1JDFoRoNegRCi4buhqYgcHOJUe', ''),
(4, 'aaa', 'aaaaa', 'a@g.h', '$2y$10$fNHpVvYckj8g5iVYPP4cz.mpysTIC5chMWbdkO9Z8aUarMwWMi9Sy', NULL),
(5, 'aaab', 'aaaaab', 'a@g.hss', '$2y$10$l7YaqROtUgyHkM5DmuMmv.V6K0cKidrd14szcBxRNqbsxm7n2FLpS', NULL),
(6, 'bbb', 'bbbbbb', 'b@bbb', '$2y$10$wajb1RL1rsuB32dBPbXWJ.JdGgSJ1DC4XayuZdQE5yRWlWQCqkJRy', 'avatar/bbb.png'),
(7, 'Gyula', 'Kis Gyula', 'g@ggg', '$2y$10$CjTHBI2G.w/C69t2NOEL9ubPvNEa1vXDSpsXIT1oHJj3LRSVcgcbi', 'avatar/Gyula.png');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`felhasznalonev`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
