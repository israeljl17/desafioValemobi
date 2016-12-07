-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Dez-2016 às 21:41
-- Versão do servidor: 5.5.53-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `desafioValemobi`
--
CREATE SCHEMA IF NOT EXISTS `desafioValemobi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ; 

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE IF NOT EXISTS `mercadoria` (
  `codigoMercadoria` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMercadoria` varchar(255) NOT NULL,
  `nomeMercadoria` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  `tipoNegocio` varchar(10) NOT NULL,
  PRIMARY KEY (`codigoMercadoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
