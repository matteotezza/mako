-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.24-MariaDB - mariadb.org binary distribution
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

-- Dump della struttura di tabella negozio_pokemon.boxx
CREATE TABLE IF NOT EXISTS `boxx` (
  `carta_promo` char(50) DEFAULT NULL,
  `codice_box` char(50) NOT NULL,
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`codice_box`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.boxx: ~8 rows (circa)
/*!40000 ALTER TABLE `boxx` DISABLE KEYS */;
INSERT INTO `boxx` (`carta_promo`, `codice_box`, `prezzo`) VALUES
	(NULL, 'Astri Lucenti (set allenatore fuoriclasse)', 45),
	('Copperajah V', 'Collezione Copperajah V', 25),
	('Kangaskhan GX', 'Collezione Kangaskhan GX', 20),
	('Blastoise Vmax', 'Collezione Lotte Blastoise-VMAX', 25),
	(NULL, 'Evoluzioni eteree', 120),
	('Drednaw', 'Futuri Campioni (palestra di Heelford)', 25),
	(NULL, 'Ombre Infuocate', 500),
	(NULL, 'Sole e Luna', 200);
/*!40000 ALTER TABLE `boxx` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.bustina
CREATE TABLE IF NOT EXISTS `bustina` (
  `espansione` char(50) NOT NULL DEFAULT '',
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`espansione`),
  KEY `espansione` (`espansione`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.bustina: ~12 rows (circa)
/*!40000 ALTER TABLE `bustina` DISABLE KEYS */;
INSERT INTO `bustina` (`espansione`, `prezzo`) VALUES
	('Astri Lucenti', 5.5),
	('Colpo Fusione', 5.5),
	('Eclissi Cosmica', 5.5),
	('Evoluzioni', 6),
	('Fiamme Oscure', 5.5),
	('Fragore Ribelle', 5.5),
	('Futuri Campioni', 6),
	('Legami Inossidabili', 5.5),
	('Regno Glaciale', 5.5),
	('Set Jungle', 15),
	('Stili di Lotta', 5.5),
	('Voltaggio Sfolgorante', 5.5);
/*!40000 ALTER TABLE `bustina` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.carrello
CREATE TABLE IF NOT EXISTS `carrello` (
  `prodotto` char(50) NOT NULL DEFAULT '',
  `prezzo` float DEFAULT NULL,
  `nome_utente` char(50) NOT NULL DEFAULT '',
  `quantità` int(11) DEFAULT NULL,
  KEY `prodotto` (`prodotto`),
  KEY `FK_carrello_cliente` (`nome_utente`),
  CONSTRAINT `FK_carrello_box` FOREIGN KEY (`prodotto`) REFERENCES `boxx` (`codice_box`) ON UPDATE CASCADE,
  CONSTRAINT `FK_carrello_bustina` FOREIGN KEY (`prodotto`) REFERENCES `bustina` (`espansione`) ON UPDATE CASCADE,
  CONSTRAINT `FK_carrello_carta` FOREIGN KEY (`prodotto`) REFERENCES `carta` (`codice_carta`) ON UPDATE CASCADE,
  CONSTRAINT `FK_carrello_cliente` FOREIGN KEY (`nome_utente`) REFERENCES `cliente` (`nome_utente`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.carrello: ~10 rows (circa)
/*!40000 ALTER TABLE `carrello` DISABLE KEYS */;
INSERT INTO `carrello` (`prodotto`, `prezzo`, `nome_utente`, `quantità`) VALUES
	('Collezione Lotte Blastoise-VMAX', 25, 'matteotezza8', 1),
	('Collezione Kangaskhan GX', 20, 'matteotezza8', 1),
	('Astri Lucenti (set allenatore fuoriclasse)', 45, 'matteotezza8', 1),
	('Evoluzioni eteree', 120, 'matteotezza8', 1),
	('Vaporeon', 8, 'matteotezza8', 1),
	('Vaporeon', 8, 'matteotezza8', 1),
	('Determinazione di Misty', 12, 'matteotezza8', 1),
	('Sole e Luna', 200, 'matteotezza8', 1),
	('Collezione Copperajah V', 25, 'matteotezza8', 1),
	('Futuri Campioni', 6, 'matteotezza8', 1);
/*!40000 ALTER TABLE `carrello` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.carta
CREATE TABLE IF NOT EXISTS `carta` (
  `nome_carta` char(50) DEFAULT NULL,
  `espansione` char(50) DEFAULT NULL,
  `codice_carta` char(50) NOT NULL DEFAULT '',
  `prezzo` float DEFAULT NULL,
  PRIMARY KEY (`codice_carta`),
  KEY `espansione` (`espansione`),
  CONSTRAINT `FK_carta_bustina` FOREIGN KEY (`espansione`) REFERENCES `bustina` (`espansione`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.carta: ~36 rows (circa)
/*!40000 ALTER TABLE `carta` DISABLE KEYS */;
INSERT INTO `carta` (`nome_carta`, `espansione`, `codice_carta`, `prezzo`) VALUES
	('Mega Charizard Ex', 'Evoluzioni', '101', 30),
	('Determinazione di Misty', 'Evoluzioni', '108', 12),
	('Grimmsnarl Vmax', 'Fiamme Oscure', '115', 2.5),
	('Vaporeon', 'Set Jungle', '12', 8),
	('Zamazenta V', 'Astri Lucenti', '163', 5),
	('Bruno', 'Stili di Lotta', '172', 9),
	('Ambizione di Camilla', 'Astri Lucenti', '178', 8.5),
	('Inteleon V', 'Fragore Ribelle', '180', 5),
	('Azzurra', 'Voltaggio Sfolgorante', '183', 10),
	('Arceus V Astro', 'Astri Lucenti', '184', 40),
	('Pikachu Vmax', 'Voltaggio Sfolgorante', '188', 50),
	('Eternatus Vmax', 'Fiamme Oscure', '192', 22),
	('Distintivo Turbo', 'Fiamme Oscure', '200', 6),
	('Calyrex Cavaliere Glaciale Vmax', 'Regno Glaciale', '202', 17.5),
	('Sonia', 'Fragore Ribelle', '203', 15),
	('Calyrex Cavaliere Spettrale Vmax', 'Regno Glaciale', '204', 14.5),
	('Amuleto Grande', 'Fragore Ribelle', '206', 7),
	('Orbeetle Vmax', 'Voltaggio Sfolgorante', '21', 2),
	('Saldatrice', 'Legami Inossidabili', '214', 17.5),
	('Reshiram e Charizard GX', 'Legami Inossidabili', '217', 90),
	('Mega Blastoise Ex', 'Evoluzioni', '22', 5),
	('Cristallo di Bruma', 'Regno Glaciale', '227', 12),
	('Cristallo di Fuoco', 'Legami Inossidabili', '231', 8.5),
	('Solgaleo e Lunala GX', 'Eclissi Cosmica', '254', 30),
	('Reshiram e Zekrom GX', 'Eclissi Cosmica', '259', 35),
	('Mew Vmax', 'Colpo Fusione', '268', 57.5),
	('Energia Pesca', 'Eclissi Cosmica', '271', 7.5),
	('Chicco, Spighetto e Maisello', 'Colpo Fusione', '273', 10),
	('Fosco', 'Colpo Fusione', '279', 10),
	('Flareon', 'Set Jungle', '3', 20),
	('Pikachu', 'Set Jungle', '60', 1),
	('Charizard Vmax', 'Futuri Campioni', '74', 200),
	('Kabu', 'Futuri Campioni', '77', 5),
	('Charizard V', 'Futuri Campioni', '79', 190),
	('Urshifu singolcolpo Vmax', 'Stili di Lotta', '86', 4),
	('Urshifu pluricolpo Vmax', 'Stili di Lotta', '88', 4);
/*!40000 ALTER TABLE `carta` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_pokemon.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `nome_utente` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `nome` char(50) DEFAULT NULL,
  `cognome` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `telefono` char(50) DEFAULT NULL,
  `comune` char(50) DEFAULT NULL,
  `indirizzo` char(50) DEFAULT NULL,
  PRIMARY KEY (`nome_utente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_pokemon.cliente: ~3 rows (circa)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`nome_utente`, `password`, `nome`, `cognome`, `email`, `telefono`, `comune`, `indirizzo`) VALUES
	('maconifrocio', 'leccapalle', 'Filip', 'Mako', 'leccolepallesudate@gmail.com', '111111111', 'stocazzo', 'via dalle palle'),
	('matteotezza0', 'Matteo', 'Matteo', 'Tezza', 'matteotezza8@gmail.com', '3663557052', 'Arcore', 'Filzi'),
	('matteotezza8', 'Matteo', 'Matteo', 'Tezza', 'matteotezza8@gmail.com', '3663557052', 'Arcore', 'Filzi');
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
