-- Banco de dados: `chamados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `empresaCliente` varchar(255) NOT NULL,
  `celularCliente` char(11) NOT NULL,
  `telefoneCliente` char(10) NOT NULL,
  `url` varchar(255) NOT NULL,
  `idSistema` int(11) NOT NULL
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
-- Estrutura para tabela `sistemas`
--

CREATE TABLE `sistemas` (
  `id` int(11) NOT NULL,
  `sistema` varchar(255) NOT NULL
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

--
-- Despejando dados para a tabela `status`
--


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
  `idSistema` int(11) NOT NULL,
  `SLA` int(11) UNSIGNED NOT NULL,
  `GCM` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idResponsavel` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTag` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idSistema` (`idSistema`);

--
-- Índices de tabela `descricao`
--
ALTER TABLE `descricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTicket` (`idTicket`);

--
-- Índices de tabela `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `idStatus` (`idStatus`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `descricao`
--
ALTER TABLE `descricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sla`
--
ALTER TABLE `sla`
  MODIFY `ID_SLA` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tag`
--
ALTER TABLE `tag`
  MODIFY `ID_TAG` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idSistema`) REFERENCES `sistemas` (`id`);

--
-- Restrições para tabelas `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`SLA`) REFERENCES `sla` (`ID_SLA`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`ID_TAG`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `status` (`ID_STATUS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
