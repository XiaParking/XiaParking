-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Jul-2018 às 04:31
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiaparking`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `mensagem`) VALUES
(1, 'bonde do', 'eoartigo33@gmail.com', 'gabriel jesus'),
(2, 'so forca', 'soforca@gmail.com', 'forca only'),
(3, 'so forca', 'soforca@gmail.com', 'forca only'),
(4, 'so forca', 'soforca@gmail.com', 'forca only');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacionamento`
--

DROP TABLE IF EXISTS `estacionamento`;
CREATE TABLE IF NOT EXISTS `estacionamento` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `favoritos` int(10) UNSIGNED NOT NULL,
  `shopping_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_id` (`shopping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estacionamento`
--

INSERT INTO `estacionamento` (`id`, `favoritos`, `shopping_id`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shopping`
--

DROP TABLE IF EXISTS `shopping`;
CREATE TABLE IF NOT EXISTS `shopping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `enderco` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `shopping`
--

INSERT INTO `shopping` (`id`, `nome`, `enderco`) VALUES
(1, 'Shopping Teste Xia Parking', 'rua teste, numero 1000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_vaga`
--

DROP TABLE IF EXISTS `status_vaga`;
CREATE TABLE IF NOT EXISTS `status_vaga` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_vaga`
--

INSERT INTO `status_vaga` (`id`, `descricao`) VALUES
(1, 'Ocupado'),
(2, 'Livre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_vaga`
--

DROP TABLE IF EXISTS `tipo_vaga`;
CREATE TABLE IF NOT EXISTS `tipo_vaga` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_vaga`
--

INSERT INTO `tipo_vaga` (`id`, `descricao`) VALUES
(1, 'Normal'),
(2, 'Deficiente'),
(3, 'Gestante'),
(4, 'Carro Flex'),
(5, 'Idoso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` char(3) NOT NULL,
  `estacionamento_id` int(10) UNSIGNED NOT NULL,
  `tipo_vaga_id` int(10) UNSIGNED NOT NULL,
  `status_vaga_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estacionamento_id` (`estacionamento_id`),
  KEY `tipo_vaga_id` (`tipo_vaga_id`),
  KEY `status_vaga_id` (`status_vaga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `descricao`, `estacionamento_id`, `tipo_vaga_id`, `status_vaga_id`) VALUES
(1, 'A1', 1, 1, 2),
(2, 'A2', 1, 1, 2),
(3, 'A3', 1, 2, 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `estacionamento`
--
ALTER TABLE `estacionamento`
  ADD CONSTRAINT `estacionamento_ibfk_1` FOREIGN KEY (`shopping_id`) REFERENCES `shopping` (`id`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`estacionamento_id`) REFERENCES `estacionamento` (`id`),
  ADD CONSTRAINT `vagas_ibfk_2` FOREIGN KEY (`tipo_vaga_id`) REFERENCES `tipo_vaga` (`id`),
  ADD CONSTRAINT `vagas_ibfk_3` FOREIGN KEY (`status_vaga_id`) REFERENCES `status_vaga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
