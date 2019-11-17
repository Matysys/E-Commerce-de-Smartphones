-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17-Nov-2019 às 23:36
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id11511094_bancodoprojetinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'perfil/fotopadrao.png',
  `cadstate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`usuario`, `email`, `senha`, `foto`, `cadstate`, `id_cliente`) VALUES
('brulekeh', 'xxxxx', '$2y$10$/KdgTFzaomsnXAG6s/xXOuPRMwgDVHl5kMHHedE3eNJ3dMp3h9cFS', './perfil/0fd1279053a98eca0b579a9d7c19c8b3.jpg', 'ativo', 21),
('xxxxx', 'xxxxxx', '$2y$10$wGTDDqI.fCC6Eqjlky818ujp9H5.OQEN06Fjfqsg9xmX4olcjvjNu', 'perfil/74581727d439406108e77035a670c243..jpg', 'ativo', 22),
('mateusinho', 'xxxxx', '$2y$10$Ljx/DYKZEURtvB/3GvANsOuleasvMH5ofoY30Ucz.q4VDtDPq4iUu', 'perfil/ab555d48b0aeea87345baa9c3ee18da6..jpg', 'ativo', 46),
('JohannesBrahms', 'xxxxx', '$2y$10$bn5mWSWRFmbQOAbfAjf76uzWCnIEYaQkM/8v6RgCXqqOngwzkOXpm', 'perfil/c296b1716667e9364d297311076705c0..jpg', 'ativo', 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data` date NOT NULL,
  `situacao` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Em análise...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `nome`, `endereco`, `complemento`, `bairro`, `cidade`, `uf`, `total`, `quantidade`, `id_cliente`, `id_produto`, `data`, `situacao`) VALUES
(19, 'Moto G7 Play', 'Vila Nova Cumbica', 'sas', '122222', 'GUARULHOS', 'SP', 1230.20, 2, 46, 7, '2019-11-17', 'Pedido aceito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `tipo`, `preco`, `quantidade`, `foto`) VALUES
(1, 'Samsung Galaxy S10', 'Smartphone', 2500.00, 68, 'pedido/galaxys10.png'),
(2, 'Samsung Galaxy Note 9', 'Phablet', 2100.00, 51, 'pedido/galaxynote9.png'),
(3, 'Apple Ipad Mini 5', 'Tablet', 2800.00, 44, 'pedido/ipadmini.png'),
(4, 'LG K12', 'Phablet', 600.00, 61, 'pedido/lgk12.png'),
(5, 'Xiaomi Redmi 7', 'Phablet', 700.50, 69, 'pedido/xiaomiredmi7.png'),
(6, 'Samsung Galaxy J5 Prime', 'Smartphone', 700.00, 78, 'pedido/j5prime.png'),
(7, 'Moto G7 Play', 'Phablet', 615.10, 26, 'pedido/motog7play.png'),
(8, 'Xiaomi Redmi 7A', 'Smartphone', 569.00, 33, 'pedido/xiaomiredmi7a.png'),
(9, 'Positivo Selfie', 'Smartphone', 289.12, 107, 'pedido/positivoselfie.png'),
(10, 'Zenfone Live Go', 'Smartphone', 395.12, 75, 'pedido/zenfonelivego.png'),
(11, 'Apple IPhone 11', 'Phablet', 4989.15, 35, 'pedido/iphone11.png'),
(12, 'Galaxy Tab A', 'Tablet', 989.00, 25, 'pedido/galaxytab.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_id_cliente` (`id_cliente`),
  ADD KEY `fk_id_produto` (`id_produto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
