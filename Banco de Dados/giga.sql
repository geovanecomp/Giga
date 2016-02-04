-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/02/2016 às 20:23
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `giga`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `email`
--

INSERT INTO `email` (`id`, `idFornecedor`, `email`, `referencia`) VALUES
(19, 2, 'email 1', 'ref1'),
(20, 2, 'email2', 'ref2'),
(21, 3, '123', '2525'),
(22, 3, '13', '2626'),
(23, 4, 'AABC', 'AABC'),
(24, 4, '', ''),
(25, 5, '', ''),
(26, 5, '', ''),
(29, 7, 'email1@giga.com.br', 'oficial'),
(30, 7, 'email2@giga.com.br', 'secundario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela dos fornecedores';

--
-- Fazendo dump de dados para tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `descricao`, `cidade`, `endereco`, `bairro`, `numero`) VALUES
(2, 'Geovane', 'desc', 'cid', 'end', 'bairro', 310),
(3, 'Claudia', 'desc', 'cid', 'end', 'bairro', 20),
(4, 'Apenas um email OK', 'testando atualizacao com um email OK ', 'cidatualizeiKO', 'ruaOK', 'bairroatualizei1OK', 1112),
(5, 'Sem email', 'testando cadastro sem os emails', 'city', 'rua', 'bairro', 980),
(7, 'Ultimo teste', 'teste', 'cidad', 'rua', 'bari', 123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `idFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `idFornecedor`) VALUES
(6, 'arroz', 'grao', 2),
(7, 'Teste', 'descTeste', 2),
(8, 'abc', 'abc', 2),
(9, 'arroz com feijao', 'abc', 3),
(10, 'Fandangos', 'milho', 2),
(11, 'Carne', 'animal', 3),
(12, 'batatao', 'frita', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `ddd` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `telefone`
--

INSERT INTO `telefone` (`id`, `idFornecedor`, `ddd`, `numero`, `referencia`) VALUES
(10, 2, '2525', '3', 'ref1'),
(11, 2, '2626', '1', 'ref2'),
(12, 3, '2525', '2', '2525'),
(13, 3, '2626', '0', '2626'),
(14, 4, '112', '12', '122'),
(15, 4, '12', '12', '12'),
(16, 5, '098', '098', '098'),
(17, 5, '098', '098', '098'),
(20, 7, '22', '25252525', 'casa'),
(21, 7, '22', '998987676', 'celular');

-- --------------------------------------------------------

--
-- Estrutura para tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `transportadora`
--

INSERT INTO `transportadora` (`id`, `nome`) VALUES
(3, 'Geovane Express'),
(4, 'Correios Normal'),
(5, 'Correios PAC'),
(6, 'Nova Transpor'),
(8, 'patricia'),
(9, 'transportadora'),
(10, 'Sedex'),
(11, 'Directlog'),
(12, 'Transportadora teste');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFornecedor` (`idFornecedor`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFornecedor` (`idFornecedor`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFornecedor` (`idFornecedor`);

--
-- Índices de tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `transportadora`
--
ALTER TABLE `transportadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
