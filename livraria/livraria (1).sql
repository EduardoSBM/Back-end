-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 13/06/2024 às 21h22min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`codigo`, `nome`, `endereco`, `cidade`, `estado`, `pais`, `nacionalidade`) VALUES
(1, 'Machado de Assis', 'rua da Alfândega, 321.', 'Rio de Janeiro', 'Rio de Janeiro', 'Brasil', 'Brasileiro'),
(2, 'Clarice Lispector', ' Praça Maciel Pinheiro, número 387', 'Recife', 'Pernambuco', 'Brasil', 'Brasileiro'),
(3, 'John Green', 'indeferido', 'Indianopolis', 'Indiana', 'Estados Unidos', 'Norte-americano'),
(4, 'Thomas de Kempis', 'indeferido', 'Kempen', 'Viersen', 'Alemanha', 'AlemÃ£o'),
(5, 'Archibald Joseph Macintyre', 'indeferido', 'indeferido', 'indeferido', 'Inglaterra', 'BritÃ¢nico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Fantasia'),
(2, 'Romance'),
(3, 'Poema'),
(4, 'Religioso');

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
(1, 'adulto'),
(2, 'infantil'),
(3, 'adolescente'),
(4, 'Livre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `codigo` int(5) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codclassificacao` int(5) NOT NULL,
  `ano` int(4) NOT NULL,
  `edicao` varchar(50) NOT NULL,
  `codautor` int(5) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `paginas` int(5) NOT NULL,
  `fotocapa` varchar(100) NOT NULL,
  `valor` float(10,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codclassificacao` (`codclassificacao`),
  KEY `codautor` (`codautor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`codigo`, `titulo`, `codcategoria`, `codclassificacao`, `ano`, `edicao`, `codautor`, `editora`, `paginas`, `fotocapa`, `valor`) VALUES
(1, 'memórias póstumas de brás cubas', 1, 2, 1881, '1', 1, 'tipografia nacional', 368, '2923493aa937495ca792394cce3e692d.png', 22.90),
(2, 'Perto do coração selvagem', 2, 1, 1943, '1', 2, 'A noite', 203, '25a512ca6c2196477391924c159d3b5a.jpg', 30.40),
(3, 'Cidades de papel', 2, 2, 2008, '1', 3, 'Intrínseca ', 368, '658e53a02cdebc0981637687f2f428e2.jpg', 48.00),
(4, 'Imitação de Cristo', 4, 4, 1379, '1', 4, 'Minha biblioteca católica', 352, 'c5a1a55bb14302ed3c627fab4ee49880.jpg', 154.90),
(5, 'Os Santos Anjos E A Hierarquia Celeste', 2, 4, 2022, '1', 5, 'Minha biblioteca católica', 448, '4b8d93bd083b9cf29d32866a58763bb7webp', 139.90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrosvendas`
--

CREATE TABLE IF NOT EXISTS `livrosvendas` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `codvenda` int(5) NOT NULL,
  `codlivro` int(5) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` float(10,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codvenda` (`codvenda`),
  KEY `codlivro` (`codlivro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `livrosvendas`
--

INSERT INTO `livrosvendas` (`codigo`, `codvenda`, `codlivro`, `quantidade`, `preco`) VALUES
(2, 3, 1, 1, 48.00),
(3, 4, 1, 1, 30.40),
(4, 4, 2, 2, 139.90),
(5, 4, 3, 1, 48.00),
(6, 5, 1, 2, 22.90),
(7, 5, 2, 2, 48.00);

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
(2, 'cris', 'cris.123', '54321'),
(3, 'sandra', 'sandra.210875', '98764'),
(4, 'emanuel', 'emanuel.273022', '273022'),
(6, 'Adm', 'adm', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `nomecliente` varchar(50) NOT NULL,
  `endcliente` varchar(50) NOT NULL,
  `valortotal` float(10,2) NOT NULL,
  `valordesconto` float(10,2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo`, `data`, `hora`, `nomecliente`, `endcliente`, `valortotal`, `valordesconto`) VALUES
(3, '2024-06-10', '16:46:00', 'Archibald Joseph Macintyre', 'indeferido', 46.00, 2.00),
(4, '2024-06-10', '17:06:00', 'Archibald Joseph Macintyre', 'indeferido', 238.20, 120.00),
(5, '2024-06-13', '16:03:00', 'Archibald Joseph Macintyre', 'indeferido', 131.80, 10.00);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`codclassificacao`) REFERENCES `classificacao` (`codigo`),
  ADD CONSTRAINT `livro_ibfk_3` FOREIGN KEY (`codautor`) REFERENCES `autor` (`codigo`);

--
-- Restrições para a tabela `livrosvendas`
--
ALTER TABLE `livrosvendas`
  ADD CONSTRAINT `livrosvendas_ibfk_1` FOREIGN KEY (`codvenda`) REFERENCES `vendas` (`codigo`),
  ADD CONSTRAINT `livrosvendas_ibfk_2` FOREIGN KEY (`codlivro`) REFERENCES `livro` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
