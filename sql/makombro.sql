-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para makombro
CREATE DATABASE IF NOT EXISTS `makombro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `makombro`;

-- Copiando estrutura para tabela makombro.tb_adventure
CREATE TABLE IF NOT EXISTS `tb_adventure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela makombro.tb_aux_adventureplayers
CREATE TABLE IF NOT EXISTS `tb_aux_adventureplayers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adventure` int(11) NOT NULL,
  `players` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__tb_adventure` (`adventure`),
  KEY `FK_tb_aux_adventureplayers_tb_users` (`players`),
  CONSTRAINT `FK__tb_adventure` FOREIGN KEY (`adventure`) REFERENCES `tb_adventure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tb_aux_adventureplayers_tb_users` FOREIGN KEY (`players`) REFERENCES `tb_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela makombro.tb_sheet
CREATE TABLE IF NOT EXISTS `tb_sheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adventure` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp_max` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `constitution` int(11) NOT NULL,
  `inteligence` int(11) NOT NULL,
  `wisdom` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `force` int(11) NOT NULL,
  `reflex` int(11) NOT NULL,
  `will` int(11) NOT NULL,
  `strength_mod` int(11) NOT NULL,
  `dexterity_mod` int(11) NOT NULL,
  `constitution_mod` int(11) NOT NULL,
  `inteligence_mod` int(11) NOT NULL,
  `wisdom_mod` int(11) NOT NULL,
  `charisma_mod` int(11) NOT NULL,
  `abilities` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `weapons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `bag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_tb_sheet_tb_users` (`user_id`),
  KEY `FK_tb_sheet_tb_adventure` (`adventure`),
  CONSTRAINT `FK_tb_sheet_tb_adventure` FOREIGN KEY (`adventure`) REFERENCES `tb_adventure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tb_sheet_tb_users` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela makombro.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
