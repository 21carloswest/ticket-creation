-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/01/2024 às 23:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chamados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(10) UNSIGNED NOT NULL,
  `DESCRICAO_CATEGORIA` varchar(255) DEFAULT NULL,
  `ATIVO_CATEGORIA` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(10) UNSIGNED NOT NULL,
  `ID_SISTEMA` int(10) UNSIGNED NOT NULL,
  `NOME_CLIENTE` varchar(50) DEFAULT NULL,
  `EMPRESA` varchar(50) DEFAULT NULL,
  `EMAIL_CLIENTE` varchar(255) DEFAULT NULL,
  `TELEFONE_CLIENTE` varchar(10) DEFAULT NULL,
  `CELULAR_CLIENTE` varchar(11) DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `COD_CLIENTE` int(10) UNSIGNED DEFAULT NULL,
  `ATIVO_CLIENTE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `descricao`
--

CREATE TABLE `descricao` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idTicket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE `equipe` (
  `ID_EQUIPE` int(10) UNSIGNED NOT NULL,
  `NOME_EQUIPE` varchar(255) DEFAULT NULL,
  `ATIVO_EQUIPE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `macro`
--

CREATE TABLE `macro` (
  `ID_MACRO` int(10) UNSIGNED NOT NULL,
  `ATIVO` tinyint(1) DEFAULT NULL,
  `TITULO_MACRO` varchar(255) DEFAULT NULL,
  `TEXTO_MACRO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema`
--

CREATE TABLE `sistema` (
  `ID_SISTEMA` int(10) UNSIGNED NOT NULL,
  `NOME_SISTEMA` varchar(255) DEFAULT NULL,
  `ATIVO_SISTEMA` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `sla`
--

CREATE TABLE `sla` (
  `ID_SLA` int(11) UNSIGNED NOT NULL,
  `DESCRIÇAO_SLA` varchar(255) NOT NULL,
  `ATIVO_SLA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(10) UNSIGNED NOT NULL,
  `NOME_STATUS` varchar(255) DEFAULT NULL,
  `ATIVO_STATUS` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `tag`
--

CREATE TABLE `tag` (
  `ID_TAG` int(10) UNSIGNED NOT NULL,
  `NOME_TAG` varchar(255) DEFAULT NULL,
  `ATIVO_TAG` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `titulo` varchar(510) NOT NULL,
  `idStatus` int(10) UNSIGNED NOT NULL,
  `idSistema` int(10) UNSIGNED NOT NULL,
  `SLA` int(11) UNSIGNED NOT NULL,
  `GCM` int(11) UNSIGNED DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idResponsavel` int(10) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idTag` int(10) UNSIGNED NOT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(10) UNSIGNED NOT NULL,
  `ID_EQUIPE` int(10) UNSIGNED NOT NULL,
  `NOME_USUARIO` varchar(255) DEFAULT NULL,
  `EMAIL_USUARIO` varchar(255) DEFAULT NULL,
  `RAMAL` int(10) UNSIGNED DEFAULT NULL,
  `ATIVO_USUARIO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `ID_SISTEMA` (`ID_SISTEMA`);

--
-- Índices de tabela `descricao`
--
ALTER TABLE `descricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTicket` (`idTicket`);

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`ID_EQUIPE`);

--
-- Índices de tabela `macro`
--
ALTER TABLE `macro`
  ADD PRIMARY KEY (`ID_MACRO`);

--
-- Índices de tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`ID_SISTEMA`);

--
-- Índices de tabela `sla`
--
ALTER TABLE `sla`
  ADD PRIMARY KEY (`ID_SLA`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Índices de tabela `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID_TAG`);

--
-- Índices de tabela `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SLA` (`SLA`),
  ADD KEY `id_tag` (`idTag`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idSistema` (`idSistema`),
  ADD KEY `idResponsavel` (`idResponsavel`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_EQUIPE` (`ID_EQUIPE`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `descricao`
--
ALTER TABLE `descricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `ID_EQUIPE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `macro`
--
ALTER TABLE `macro`
  MODIFY `ID_MACRO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `ID_SISTEMA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `sla`
--
ALTER TABLE `sla`
  MODIFY `ID_SLA` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `tag`
--
ALTER TABLE `tag`
  MODIFY `ID_TAG` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_SISTEMA`) REFERENCES `sistema` (`ID_SISTEMA`);

--
-- Restrições para tabelas `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`SLA`) REFERENCES `sla` (`ID_SLA`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`ID_TAG`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `status` (`ID_STATUS`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`idSistema`) REFERENCES `sistema` (`ID_SISTEMA`),
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`idResponsavel`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`ID_CLIENTE`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_EQUIPE`) REFERENCES `equipe` (`ID_EQUIPE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;