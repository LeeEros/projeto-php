-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2024 às 03:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tads`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `limite_credito` double DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `recebe_whatsapp` tinyint(4) DEFAULT NULL,
  `recebe_email` tinyint(4) DEFAULT NULL,
  `recebe_sms` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cpf`, `nome`, `telefone`, `score`, `data_nascimento`, `limite_credito`, `email`, `recebe_whatsapp`, `recebe_email`, `recebe_sms`) VALUES
(1, '12345678901', 'Cliente 1', '1111111111', 750, '1990-01-01', 2000, 'cliente1@email.com', 1, 1, 1),
(2, '12345678902', '12345678902', 'Cliente 2', '2222222222', 600, '1985-02-02', 1500, 'cliente2@email.com', 1, 1, 0),
(3, '12345678903', 'Cliente 3', '3333333333', 800, '1992-03-03', 2500, 'cliente3@email.com', 0, 1, 1),
(4, '12345678904', 'Cliente 4', '4444444444', 700, '1980-04-04', 1800, 'cliente4@email.com', 1, 0, 1),
(5, '12345678905', 'Cliente 5', '5555555555', 650, '1995-05-05', 1200, 'cliente5@email.com', 1, 1, 0),
(6, '12345678906', 'Cliente 6', '6666666666', 720, '1991-06-06', 1700, 'cliente6@email.com', 0, 0, 1),
(7, '12345678907', 'Cliente 7', '7777777777', 680, '1987-07-07', 1600, 'cliente7@email.com', 1, 1, 1),
(8, '12345678908', 'Cliente 8', '8888888888', 750, '1993-08-08', 2100, 'cliente8@email.com', 0, 1, 0),
(9, '12345678909', 'Cliente 9', '9999999999', 800, '1988-09-09', 1900, 'cliente9@email.com', 1, 0, 1),
(10, '12345678910', 'Cliente 10', '1010101010', 650, '1990-10-10', 1400, 'cliente10@email.com', 0, 1, 1),
(11, '12345678911', 'Cliente 11', '1111111112', 720, '1994-11-11', 1800, 'cliente11@email.com', 1, 1, 0),
(12, '12345678912', 'Cliente 12', '1212121212', 750, '1989-12-12', 2300, 'cliente12@email.com', 0, 0, 1),
(13, '12345678913', 'Cliente 13', '1313131313', 700, '1992-01-13', 1500, 'cliente13@email.com', 1, 1, 1),
(14, '12345678914', 'Cliente 14', '1414141414', 760, '1987-02-14', 2200, 'cliente14@email.com', 0, 1, 0),
(15, '12345678915', 'Cliente 15', '1515151515', 690, '1991-03-15', 1700, 'cliente15@email.com', 1, 0, 1),
(16, '12345678916', 'Cliente 16', '1616161616', 780, '1996-04-16', 2600, 'cliente16@email.com', 1, 1, 1),
(17, '12345678917', 'Cliente 17', '1717171717', 770, '1985-05-17', 2400, 'cliente17@email.com', 0, 0, 1),
(18, '12345678918', 'Cliente 18', '1818181818', 700, '1993-06-18', 2000, 'cliente18@email.com', 1, 1, 0),
(19, '12345678919', 'Cliente 19', '1919191919', 730, '1992-07-19', 2200, 'cliente19@email.com', 0, 1, 1),
(20, '12345678920', 'Cliente 20', '2020202020', 690, '1990-08-20', 1500, 'cliente20@email.com', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `aceita_parcelamento` tinyint(4) DEFAULT NULL,
  `prazo_parcela` int(11) DEFAULT NULL,
  `juros` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id_pagamento`, `nome`, `tipo`, `aceita_parcelamento`, `prazo_parcela`, `juros`) VALUES
(1, 'Cartão de Crédito', NULL, NULL, NULL, NULL),
(2, 'Cartão de Débito', NULL, NULL, NULL, NULL),
(3, 'Dinheiro', NULL, NULL, NULL, NULL),
(4, 'Boleto Bancário', NULL, NULL, NULL, NULL),
(5, 'Pix', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cnpj` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `salario` double DEFAULT NULL,
  `meta` double DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `comissao` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `email`, `salario`, `meta`, `cargo`, `comissao`) VALUES
(1, 'João Silva', NULL, 2000, NULL, 'Vendedor', NULL),
(2, 'Maria Oliveira', NULL, 2500, NULL, 'Vendedor', NULL),
(3, 'Carlos Souza', NULL, 3500, NULL, 'Gerente', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id_itens_venda` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `desconto_item` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parcela`
--

CREATE TABLE `parcela` (
  `id_parcela` int(11) NOT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_forma_pagamento` int(11) DEFAULT NULL,
  `valor_parcela` double DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `numero_parcela` int(11) DEFAULT NULL,
  `confirma_pagamento` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `parcela`
--

INSERT INTO `parcela` (`id_parcela`, `id_cliente`, `id_forma_pagamento`, `valor_parcela`, `data_vencimento`, `data_pagamento`, `confirma_pagamento`) VALUES
(1, 1, 1, 150.00, '2024-01-01', '2024-01-01', 1),
(2, 2, 2, 300.00, '2024-02-01', NULL, 0),
(3, 3, 3, 450.00, '2024-03-01', '2024-03-02', 1),
(4, 4, 4, 600.00, '2024-04-01', NULL, 0),
(5, 5, 5, 750.00, '2024-05-01', '2024-05-01', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `codigo_barras` varchar(15) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `quantidade_estoque` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_fornecedor`, `nome`, `valor`, `codigo_barras`, `categoria`, `quantidade_estoque`, `descricao`, `foto`) VALUES
(1, 1, 'Produto 1', 50, '1111111111111', 'Categoria 1', 100, 'Descrição Produto 1', 'foto1.jpg'),
(2, 2, 'Produto 2', 100, '2222222222222', 'Categoria 2', 80, 'Descrição Produto 2', 'foto2.jpg'),
(3, 3, 'Produto 3', 200, '3333333333333', 'Categoria 3', 60, 'Descrição Produto 3', 'foto3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_pagamento` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente`, `id_funcionario`, `id_pagamento`, `valor`, `data`) VALUES
(1, 1, 1, 1, 150, '2024-01-01'),
(2, 2, 2, 2, 300, '2024-01-05'),
(3, 3, 3, 3, 450, '2024-01-10'),
(19, 3, 3, 2, 369, '2024-11-23'),
(20, 3, 2, 3, 482, '2024-08-19'),
(21, 4, 2, 1, 452, '2024-10-15'),
(22, 4, 3, 3, 277, '2024-11-20'),
(23, 5, 3, 3, 301, '2024-10-30'),
(24, 5, 2, 2, 909, '2024-09-17'),
(25, 6, 1, 2, 431, '2024-10-07'),
(26, 6, 2, 3, 512, '2024-09-07'),
(27, 7, 2, 2, 635, '2024-09-23'),
(28, 7, 3, 2, 684, '2024-11-11'),
(29, 8, 1, 2, 194, '2024-11-22'),
(30, 8, 3, 3, 523, '2024-10-01'),
(31, 9, 1, 1, 313, '2024-10-09'),
(32, 9, 2, 2, 799, '2024-09-11'),
(33, 10, 3, 3, 247, '2024-10-09'),
(34, 10, 3, 1, 965, '2024-11-07'),
(35, 11, 1, 1, 485, '2024-11-21'),
(36, 11, 3, 2, 909, '2024-09-04'),
(37, 12, 3, 1, 257, '2024-10-13'),
(38, 12, 3, 3, 399, '2024-08-15'),
(39, 12, 3, 1, 867, '2024-08-22'),
(40, 13, 2, 2, 293, '2024-10-12'),
(41, 14, 2, 3, 312, '2024-11-14'),
(42, 15, 1, 3, 893, '2024-10-06'),
(43, 16, 2, 1, 313, '2024-10-31'),
(44, 16, 3, 3, 437, '2024-11-10'),
(45, 17, 3, 3, 764, '2024-11-17'),
(46, 18, 1, 2, 452, '2024-10-30'),
(47, 19, 3, 1, 701, '2024-11-19'),
(48, 19, 1, 2, 362, '2024-10-01'),
(49, 20, 1, 2, 859, '2024-09-05'),
(50, 20, 2, 1, 1189, '2024-09-26');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_itens_venda`),
  ADD KEY `itens_venda_ibfk_1` (`id_produto`),
  ADD KEY `itens_venda_ibfk_2` (`id_venda`),
  ADD KEY `itens_venda_ibfk_3` (`id_funcionario`);

--
-- Índices de tabela `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_forma_pagamento` (`id_forma_pagamento`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_pagamento` (`id_pagamento`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_itens_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `parcela`
--
ALTER TABLE `parcela`
  MODIFY `id_parcela` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `itens_venda_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `itens_venda_ibfk_2` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`),
  ADD CONSTRAINT `itens_venda_ibfk_3` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Restrições para tabelas `parcela`
--
ALTER TABLE `parcela`
  ADD CONSTRAINT `parcela_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`),
  ADD CONSTRAINT `parcela_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `parcela_ibfk_3` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `forma_pagamento` (`id_pagamento`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_pagamento`) REFERENCES `forma_pagamento` (`id_pagamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
