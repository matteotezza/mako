-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database negozio_pokemon
CREATE DATABASE IF NOT EXISTS `negozio_pokemon` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `negozio_pokemon`;

-- Dump della struttura di tabella negozio_pokemon.box
CREATE TABLE IF NOT EXISTS `box` (
  `carta_promo` char(50) DEFAULT NULL,
  `codice_box` char(50) NOT NULL,
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`codice_box`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.box: ~2 rows (circa)
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` (`carta_promo`, `codice_box`, `prezzo`) VALUES
	(NULL, 'Astri Lucenti (set allenatore fuoriclasse)', 45),
	(NULL, 'Evoluzioni eteree', 120),
	('Drednaw', 'Futuri Campioni (palestra di Heelford)', 25);
/*!40000 ALTER TABLE `box` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.bustina
CREATE TABLE IF NOT EXISTS `bustina` (
  `espansione` char(50) NOT NULL DEFAULT '',
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`espansione`),
  KEY `espansione` (`espansione`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.bustina: ~9 rows (circa)
/*!40000 ALTER TABLE `bustina` DISABLE KEYS */;
INSERT INTO `bustina` (`espansione`, `prezzo`) VALUES
	('Astri Lucenti', 5.5),
	('Colpo Fusione', NULL),
	('Eclissi Cosmica', 5.5),
	('Evoluzioni', 6),
	('Fiamme Oscure', NULL),
	('Fragore Ribelle', NULL),
	('Futuri Campioni', 6),
	('Legami Inossidabili', 5.5),
	('Regno Glaciale', NULL),
	('Set Jungle', 15),
	('Stili di Lotta', 5.5),
	('Voltaggio Sfolgorante', 5.5);
/*!40000 ALTER TABLE `bustina` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.carta
CREATE TABLE IF NOT EXISTS `carta` (
  `nome_carta` char(50) DEFAULT NULL,
  `espansione` char(50) DEFAULT NULL,
  `codice_carta` int(11) NOT NULL,
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`codice_carta`),
  KEY `espansione` (`espansione`),
  CONSTRAINT `FK_carta_bustina` FOREIGN KEY (`espansione`) REFERENCES `bustina` (`espansione`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.carta: ~36 rows (circa)
/*!40000 ALTER TABLE `carta` DISABLE KEYS */;
INSERT INTO `carta` (`nome_carta`, `espansione`, `codice_carta`, `prezzo`) VALUES
	('Flareon', 'Set Jungle', 3, 20),
	('Vaporeon', 'Set Jungle', 12, 8),
	('Orbeetle Vmax', 'Voltaggio Sfolgorante', 21, 2),
	('Mega Blastoise Ex', 'Evoluzioni', 22, 5),
	('Pikachu', 'Set Jungle', 60, 1),
	('Charizard Vmax', 'Futuri Campioni', 74, 200),
	('Kabu', 'Futuri Campioni', 77, 5),
	('Charizard V', 'Futuri Campioni', 79, 190),
	('Urshifu singolocolpo Vmax', 'Stili di Lotta', 86, 4),
	('Urshifu pluricolpo Vmax', 'Stili di Lotta', 88, 4),
	('Mega Charizard Ex', 'Evoluzioni', 101, 30),
	('Determinazione di Misty', 'Evoluzioni', 108, 12),
	('Grimmsnarl Vmax', 'Fiamme Oscure', 115, 2.5),
	('Zamazenta V', 'Astri Lucenti', 163, 5),
	('Bruno', 'Stili di Lotta', 172, 9),
	('Ambizione di Camilla', 'Astri Lucenti', 178, 8.5),
	('Inteleon V', 'Fragore Ribelle', 180, 5),
	('Azzurra', 'Voltaggio Sfolgorante', 183, 10),
	('Arceus V Astro', 'Astri Lucenti', 184, 40),
	('Pikachu Vmax', 'Voltaggio Sfolgorante', 188, 50),
	('Eternatus Vmax', 'Fiamme Oscure', 192, 22),
	('Distintivo Turbo', 'Fiamme Oscure', 200, 6),
	('Calyrex Cavaliere Glaciale Vmax', 'Regno Glaciale', 202, 17.5),
	('Sonia', 'Fragore Ribelle', 203, 15),
	('Calyrex Cavaliere Spettrale Vmax', 'Regno Glaciale', 204, 14.5),
	('Amuleto Grande', 'Fragore Ribelle', 206, 7),
	('Saldatrice', 'Legami Inossidabili', 214, 17.5),
	('Reshiram e Charizard GX', 'Legami Inossidabili', 217, 90),
	('Cristallo di Bruma', 'Regno Glaciale', 227, 12),
	('Cristallo di Fuoco', 'Legami Inossidabili', 231, 8.5),
	('Solgaleo e Lunala GX', 'Eclissi Cosmica', 254, 30),
	('Reshiram e Zekrom GX', 'Eclissi Cosmica', 259, 35),
	('Mew Vmax', 'Colpo Fusione', 268, 57.5),
	('Energia Pesca', 'Eclissi Cosmica', 271, 7.5),
	('Chicco, Spighetto e Maisello', 'Colpo Fusione', 273, 10),
	('Energia Fuoco', 'Colpo Fusione', 284, 10);
/*!40000 ALTER TABLE `carta` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `nome_utente` char(50) DEFAULT NULL,
  `password` char(50) DEFAULT NULL,
  `nome` char(50) DEFAULT NULL,
  `cognome` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `telefono` char(50) DEFAULT NULL,
  `comune` char(50) DEFAULT NULL,
  `indirizzo` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.cliente: ~7 rows (circa)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`nome_utente`, `password`, `nome`, `cognome`, `email`, `telefono`, `comune`, `indirizzo`) VALUES
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL),
	('', '', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.fornitore
CREATE TABLE IF NOT EXISTS `fornitore` (
  `nome_fornitore` char(50) DEFAULT NULL,
  `provenienza` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.fornitore: ~0 rows (circa)
/*!40000 ALTER TABLE `fornitore` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornitore` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.negozio
CREATE TABLE IF NOT EXISTS `negozio` (
  `nome` char(50) NOT NULL DEFAULT '',
  `indirizzo` char(50) NOT NULL DEFAULT '',
  `civico` int(10) NOT NULL,
  `cap` int(10) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.negozio: ~0 rows (circa)
/*!40000 ALTER TABLE `negozio` DISABLE KEYS */;
/*!40000 ALTER TABLE `negozio` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.prodotto
CREATE TABLE IF NOT EXISTS `prodotto` (
  `box` char(50) NOT NULL,
  `bustine` char(50) NOT NULL,
  `carte_singole` int(11) NOT NULL DEFAULT 0,
  KEY `FK_prodotto_box` (`box`),
  KEY `FK_prodotto_bustina` (`bustine`),
  KEY `FK_prodotto_carta` (`carte_singole`),
  CONSTRAINT `FK_prodotto_box` FOREIGN KEY (`box`) REFERENCES `box` (`codice_box`) ON UPDATE CASCADE,
  CONSTRAINT `FK_prodotto_bustina` FOREIGN KEY (`bustine`) REFERENCES `bustina` (`espansione`) ON UPDATE CASCADE,
  CONSTRAINT `FK_prodotto_carta` FOREIGN KEY (`carte_singole`) REFERENCES `carta` (`codice_carta`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.prodotto: ~0 rows (circa)
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
