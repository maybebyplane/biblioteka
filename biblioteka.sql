-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lut 2021, 15:35
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnik`
--

CREATE TABLE `czytelnik` (
  `ID_czytelnika` int(11) NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `pesel` bigint(11) NOT NULL,
  `ID_wypozyczenia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czytelnik`
--

INSERT INTO `czytelnik` (`ID_czytelnika`, `nazwisko`, `imie`, `pesel`, `ID_wypozyczenia`) VALUES
(1, 'Noga', 'Józef', 91010126743, 16),
(3, 'Michno', 'Paulina', 89032345622, NULL),
(4, 'Kowalska', 'Teresa', 65020553668, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `ID_ksiazki` int(11) NOT NULL,
  `kategoria` text COLLATE utf8_polish_ci NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko_autora` text COLLATE utf8_polish_ci NOT NULL,
  `imie_autora` text COLLATE utf8_polish_ci NOT NULL,
  `czy_dostepna` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`ID_ksiazki`, `kategoria`, `tytul`, `nazwisko_autora`, `imie_autora`, `czy_dostepna`) VALUES
(7, 'popularnonaukowa', 'Nic bardziej mylnego', 'Kotarski', 'Radek', 'T'),
(8, 'humor', 'Hrabi. Duszkiem tak', 'Jabłonka', 'Jakub', 'T'),
(9, 'fantastyka', 'Ber-harap. Tam gdzie wschodzi świt', 'Piper', 'Łukasz', 'T'),
(14, 'humor', 'A ja żem Jej powiedziała', 'Nosowska', 'Katarzyna', 'N'),
(15, 'kryminał', 'Pochłaniacz', 'Bonda', 'Katarzyna', 'N'),
(16, 'powieść', 'Złodziejka książek', 'Zusak', 'Markus', 'T');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `ID_pracownika` int(11) NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownik`
--

INSERT INTO `pracownik` (`ID_pracownika`, `nazwisko`, `imie`, `login`, `haslo`) VALUES
(1, 'Kowalski', 'Jan', 'janek', 'Kowal5'),
(2, 'Borówka', 'Krystyna', 'krysia', 'Bori5'),
(3, 'Pieter', 'Tadeusz', 'tedi', 'Piotr5'),
(4, 'Adamczyk', 'Karol', 'kalo', 'Adako5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE `wypozyczenie` (
  `ID_wypozyczenia` int(11) NOT NULL,
  `data_wypozyczenia` datetime NOT NULL DEFAULT current_timestamp(),
  `data_oddania` datetime DEFAULT NULL,
  `ID_ksiazki` int(11) NOT NULL,
  `ID_czytelnika` int(11) NOT NULL,
  `ID_pracownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wypozyczenie`
--

INSERT INTO `wypozyczenie` (`ID_wypozyczenia`, `data_wypozyczenia`, `data_oddania`, `ID_ksiazki`, `ID_czytelnika`, `ID_pracownika`) VALUES
(2, '2021-02-05 17:33:47', '2021-02-05 19:57:09', 8, 1, 1),
(3, '2021-02-05 17:36:05', '2021-02-05 19:57:11', 8, 1, 1),
(4, '2021-02-05 17:41:53', '2021-02-05 19:45:36', 14, 1, 1),
(5, '2021-02-05 17:43:46', '2021-02-05 19:45:40', 14, 1, 1),
(6, '2021-02-05 17:45:25', '2021-02-05 19:50:27', 9, 1, 1),
(7, '2021-02-05 17:47:08', '2021-02-05 19:57:13', 9, 1, 1),
(8, '2021-02-05 17:48:25', '2021-02-05 19:57:14', 9, 1, 1),
(9, '2021-02-05 17:49:52', '2021-02-05 19:57:15', 9, 1, 1),
(10, '2021-02-05 19:43:02', '2021-02-05 19:57:16', 8, 4, 1),
(11, '2021-02-05 20:20:02', '2021-02-05 21:08:08', 14, 1, 1),
(12, '2021-02-05 21:09:54', '2021-02-05 21:10:07', 14, 3, 1),
(13, '2021-02-05 21:10:47', '2021-02-05 21:54:27', 14, 4, 4),
(14, '2021-02-05 21:51:58', '2021-02-06 11:26:49', 8, 3, 1),
(15, '2021-02-06 11:33:25', NULL, 14, 4, 2),
(16, '2021-02-06 13:24:54', NULL, 15, 1, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
  ADD PRIMARY KEY (`ID_czytelnika`),
  ADD KEY `ID_czytelnika` (`ID_czytelnika`),
  ADD KEY `ID_wypozyczenia` (`ID_wypozyczenia`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`ID_ksiazki`),
  ADD KEY `ID_ksiazki` (`ID_ksiazki`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`ID_pracownika`),
  ADD KEY `ID_pracownika` (`ID_pracownika`);

--
-- Indeksy dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`ID_wypozyczenia`),
  ADD KEY `ID_wypozyczenia` (`ID_wypozyczenia`),
  ADD KEY `ID_ksiazki` (`ID_ksiazki`,`ID_czytelnika`,`ID_pracownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
  MODIFY `ID_czytelnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `ID_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `ID_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `ID_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD CONSTRAINT `wypozyczenie_ibfk_1` FOREIGN KEY (`ID_czytelnika`) REFERENCES `czytelnik` (`ID_czytelnika`) ON DELETE CASCADE,
  ADD CONSTRAINT `wypozyczenie_ibfk_2` FOREIGN KEY (`ID_pracownika`) REFERENCES `pracownik` (`ID_pracownika`),
  ADD CONSTRAINT `wypozyczenie_ibfk_3` FOREIGN KEY (`ID_ksiazki`) REFERENCES `ksiazka` (`ID_ksiazki`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
