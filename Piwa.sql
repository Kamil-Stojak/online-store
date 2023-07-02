-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lip 2023, 09:17
-- Wersja serwera: 10.4.16-MariaDB
-- Wersja PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `piwa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `ID` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `kodpocztowy` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Miejscowosc` varchar(100) NOT NULL,
  `Kraj` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`ID`, `imie`, `nazwisko`, `telefon`, `adres`, `kodpocztowy`, `email`, `Miejscowosc`, `Kraj`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(54, 'kamil', 'Stojak', '123-123-123', 'podmostem', '93-000', 'kamilos01@interia.eu', 'Tczew', 'polska'),
(55, 'kuba', 'L', '123-123-123', 'gdzieś', '88-888', 'kuba@kuba.pl', 'gdzieś', 'Polska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `ID` int(11) NOT NULL,
  `klient_id` varchar(100) NOT NULL,
  `produkt_id` varchar(100) NOT NULL,
  `potwierdzenie` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ilosc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`ID`, `klient_id`, `produkt_id`, `potwierdzenie`, `status`, `ilosc`) VALUES
(4, 'ADMIN', '2', '1', 'Przyjęta', '1'),
(16, 'ADMIN', '1', '1', 'Przyjęta', '2'),
(17, 'ADMIN', '1', '1', 'Przyjęta', '4'),
(18, 'ADMIN', '1', '1', 'Przyjęta', '4'),
(19, 'ADMIN', '11', '1', 'Przyjęta', '4'),
(22, '', '1', '0', 'Przyjęta', '1'),
(23, 'kamilos01@interia.eu', '1', '0', 'Przyjęta', '1'),
(24, 'ADMIN', '1', '0', 'Przyjęta', '4'),
(25, 'kamilstojak01@gmail.com', '1', '1', 'Przyjęta', '4'),
(26, 'kuba@kuba.pl', '1', '1', 'Przyjęta', '5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logowanie`
--

INSERT INTO `logowanie` (`ID`, `Email`, `password`) VALUES
(1, 'ADMIN', 'ADMIN123'),
(56, 'kamilstojak01@gmail.com', '12345'),
(57, 'kamilos700@interia.pl', '123456'),
(62, 'kuba@kuba.pl', '123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `ID` int(11) NOT NULL,
  `klient_Email` varchar(255) NOT NULL,
  `produkt_id` varchar(111) NOT NULL,
  `Opinia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `opinie`
--

INSERT INTO `opinie` (`ID`, `klient_Email`, `produkt_id`, `Opinia`) VALUES
(9, 'kamilstojak01@gmail.com', '9', 'dobre piwko'),
(10, 'stojak@gmail.com', '9', '123123'),
(11, 'kamilstojak01@gmail.com', '10', 'dobre piwko'),
(16, 'kuba@kuba.pl', '1', 'piwko mocne jak mocny full');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `potwierdzenie`
--

CREATE TABLE `potwierdzenie` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `potwierdzenie` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `cena` varchar(255) NOT NULL,
  `rodzaj` varchar(255) NOT NULL,
  `zdj` varchar(255) CHARACTER SET utf16 NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `ILOSC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`ID`, `nazwa`, `cena`, `rodzaj`, `zdj`, `Opis`, `ILOSC`) VALUES
(1, 'tyskie', '5.99', 'ciemne', 'tyskie.jpg', 'fajne piwo kulła', '1'),
(2, 'special', '4.99', 'ciemne', 'special.jpg', '', '0'),
(9, 'KOMES PORTER BAŁTYCKI BOURBON OAK 0,33L', '5,99', 'Porter', 'https://ipiwo.pl/wp-content/uploads/2022/02/Porter_Baltycki_Bourbon_Oak_Komes_Fortuna_Piwo_4.jpg', 'To edycja limitowana jednego z najlepszych porterów bałtyckich na świecie – leżakowana z płatkami dębowymi z beczek po amerykańskiej whiskey. Podczas etapu leżakowania profil piwa wzbogacił się o nowe smaki, a także nabrał dodatkowej harmonii. Można w nim', '0'),
(10, 'AMBER GRAND IMPERIAL PORTER 0,5L', '7,98', 'Porter', 'https://ipiwo.pl/wp-content/uploads/2020/12/Grand_Imperial_Porter_Amber_Piwo_2-scaled.jpg', 'Grand Imperial Porter to przedstawiciel stylu Porter Bałtycki. Już od pierwszego łyku zachwyca smakiem palonego ziarna połączonym z nutami czekoladowymi, kawowymi, karmelowymi i wyczuwalnymi niuansami suszonych owoców. Wyróżnia się niezwykle gęstą, kremow', '0'),
(11, 'BIRBANT MUERTE – 0,33L PUSZKA', '19,99', 'Porter', 'https://ipiwo.pl/wp-content/uploads/2022/02/Muerte_Birbant_Piwo_3.jpg', 'Muerte – Mexicola Baltic Porter. Dodatki: świeżo palona meksykańska kawa Chabela “Blue Skull”, syrop z agawy. Kawę wypaliło specjalnie do tego piwa KYOTO Coffee Roasters, jest ona produktem limitowanym, eksportowanym tylko dwa miesiące w roku. Pochodzi z ', '0'),
(12, 'BIRBANT YUMMY SESSION IPA 0,5L', '10,98', ' IPA', 'https://ipiwo.pl/wp-content/uploads/2020/08/yummy-scaled.jpg', 'Skoro tak ciepło przyjęliście Diablo Verde to postanowiliśmy przygotować lżejszą i nieco zmodyfikowaną wersję. Przedstawiamy Wam – Yummy session IPA. Uwarzone w oparciu o mieszankę nowego i niezwykle popularnego chmielu SABRO oraz jednego z najsmaczniejsz', '0'),
(19, 'Żubr Piwo Puszka 500Ml', '2.99', 'Puszka', 'https://zubr.pl/dwa-szybkie/assets/images/pic-prize.png?2022', 'Podstawowe informacje Pojemność	 500ml', '99');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `Pytanie` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `ID` int(11) NOT NULL,
  `koszyk_id` varchar(255) NOT NULL,
  `produkt_id` varchar(255) NOT NULL,
  `ilosc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `potwierdzenie`
--
ALTER TABLE `potwierdzenie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT dla tabeli `opinie`
--
ALTER TABLE `opinie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `potwierdzenie`
--
ALTER TABLE `potwierdzenie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
