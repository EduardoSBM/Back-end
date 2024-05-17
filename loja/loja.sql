-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 16/05/2024 às 22h03min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `descricao`) VALUES
(1, 'masculino'),
(2, 'infantil'),
(3, 'feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE IF NOT EXISTS `classificacao` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`codigo`, `nome`) VALUES
(1, 'Chuteira'),
(2, 'sapatênis'),
(3, 'casual'),
(4, 'salto alto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'Nike'),
(2, 'polo'),
(3, 'Tesla'),
(4, 'salto barbie');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codclassificacao` int(5) NOT NULL,
  `codmarca` int(5) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `preco` float(8,2) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codclassificacao` (`codclassificacao`),
  KEY `codmarca` (`codmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `codcategoria`, `codclassificacao`, `codmarca`, `cor`, `tamanho`, `preco`, `foto1`, `foto2`, `foto3`) VALUES
(1, 'Chuteira para campo', 1, 1, 1, 'bege', '40', 799.99, '875b0e84b4f83bc68e727ff85f5fffd9jpeg', '875b0e84b4f83bc68e727ff85f5fffd9).jpeg', '875b0e84b4f83bc68e727ff85f5fffd9eg'),
(2, 'tesla', 2, 3, 3, 'bege', '30', 400.00, '2e99805dc26f47338813a82772afe83d.jpg', '2e99805dc26f47338813a82772afe83dip.jpg', '2e99805dc26f47338813a82772afe83dpg'),
(3, 'sapatenis tiago leif', 1, 2, 2, 'preto', '42', 100.00, '3b517a3873918420afdd738796a33874.jpg', '3b517a3873918420afdd738796a33874pa.jpg', '3b517a3873918420afdd738796a33874pg'),
(4, 'salto barbie', 3, 4, 4, 'rosa', '32', 599.82, '809de607428dee470e28a910d22d2e3b.jpg', '809de607428dee470e28a910d22d2e3bto.jpg', '809de607428dee470e28a910d22d2e3bpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `login`, `senha`) VALUES
(1, 'dudu', 'dudu777trem', '1234');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`codclassificacao`) REFERENCES `classificacao` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
