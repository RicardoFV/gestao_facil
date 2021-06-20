-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2021 às 17:10
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestao_facil`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastro_usuario` ()  begin 
-- verifica se tem usuario,
-- caso retorne 0 significa que nao tem
-- ai e feito a inserçao 
if (select count(*) from users) = 0 then 
	insert into users(name, email, perfil_acesso, id_usuario_ressponsavel, password, created_at, updated_at)
    values('Super Admin', 'superadmin@gmail.com','super_admin', 1, '$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2' , now(), now());
    -- senha : 12345678
    else
		-- retorna o erro 
		signal sqlstate '45000' set message_text = 'Tabela já existe usuario, não pode ser inserido';    
end if;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricoes`
--

CREATE TABLE `descricoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tratamento` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao_empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `empresas`
--
DELIMITER $$
CREATE TRIGGER `trig_log_empresa_alteracao` AFTER UPDATE ON `empresas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do endereço', new.updated_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_empresa_cadastro` AFTER INSERT ON `empresas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do endereço', new.created_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_empresa`
--

CREATE TABLE `log_empresa` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_requisito`
--

CREATE TABLE `log_requisito` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_responsavel_empresa`
--

CREATE TABLE `log_responsavel_empresa` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_sistema`
--

CREATE TABLE `log_sistema` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_tratamento`
--

CREATE TABLE `log_tratamento` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_usuario`
--

CREATE TABLE `log_usuario` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_usuario`
--

INSERT INTO `log_usuario` (`id`, `id_usuario_acao`, `atividade`, `data_inclusao`, `id_usuario_cadastrado`) VALUES
(1, 1, 'inserindo dados de usuario', '2021-06-20 12:07:49', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_versao`
--

CREATE TABLE `log_versao` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_vinculo`
--

CREATE TABLE `log_vinculo` (
  `id` bigint(20) NOT NULL,
  `id_usuario_acao` int(11) DEFAULT NULL,
  `atividade` varchar(255) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `id_usuario_cadastrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_02_create_empresas_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_16_214944_create_requisitos_table', 1),
(6, '2021_03_16_215055_create_versaos_table', 1),
(7, '2021_03_16_215116_create_sistemas_table', 1),
(8, '2021_03_16_215117_create_tratamentos_table', 1),
(9, '2021_04_07_200117_create_descricoes_table', 1),
(10, '2021_06_10_212249_create_vinculos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisitos`
--

CREATE TABLE `requisitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `tipo_requisito` enum('funcional','nao_funcional') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `requisitos`
--
DELIMITER $$
CREATE TRIGGER `trig_log_requisito_alteracao` AFTER UPDATE ON `requisitos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do requisito', new.updated_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_requisito_cadastro` AFTER INSERT ON `requisitos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do requisito', new.created_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistemas`
--

CREATE TABLE `sistemas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_versao` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `sistemas`
--
DELIMITER $$
CREATE TRIGGER `trig_log_sistema_cadastro` AFTER INSERT ON `sistemas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do sistema', new.created_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_sistemas_alteracao` AFTER UPDATE ON `sistemas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do sistema', new.updated_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamentos`
--

CREATE TABLE `tratamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `dt_entrega` date NOT NULL,
  `excluido` int(11) NOT NULL,
  `situacao` enum('novo','nao_iniciado','em_andamento','parado','concluido') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_responsavel` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_requisito` int(10) UNSIGNED NOT NULL,
  `id_sistema` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `tratamentos`
--
DELIMITER $$
CREATE TRIGGER `trig_log_tratamento_alteracao` AFTER UPDATE ON `tratamentos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do tratamento(chamado)', new.updated_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_tratamento_cadastro` AFTER INSERT ON `tratamentos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do tratamento(chamado)', new.created_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_acesso` enum('super_admin','administrador','administrador_gestor','desenvolvedor','suporte','usuario') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_ressponsavel` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `perfil_acesso`, `id_usuario_ressponsavel`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 'super_admin', 1, NULL, '$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2', NULL, '2021-06-20 15:07:49', '2021-06-20 15:07:49', NULL);

--
-- Acionadores `users`
--
DELIMITER $$
CREATE TRIGGER `trig_log_usuario_alteracao` AFTER UPDATE ON `users` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'Alterando dados de usuario', new.updated_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_usuario_cadastro` AFTER INSERT ON `users` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'inserindo dados de usuario', new.created_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `versaos`
--

CREATE TABLE `versaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `versaos`
--
DELIMITER $$
CREATE TRIGGER `trig_log_versao_alteracao` AFTER UPDATE ON `versaos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados da Versao', new.updated_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_versao_cadastro` AFTER INSERT ON `versaos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs versao
    
    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados da versao', new.created_at, new.id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculos`
--

CREATE TABLE `vinculos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_gestor` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `id_usuario_responsavel` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Acionadores `vinculos`
--
DELIMITER $$
CREATE TRIGGER `trig_log_vinculo_empresa` AFTER INSERT ON `vinculos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_responsavel_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'inserindo dados do vinculo empresa', new.created_at, new.id);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_log_vinculo_empresa_alteracao` AFTER UPDATE ON `vinculos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_responsavel_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'Alterando dados do vinculo empresa', new.updated_at, new.id);
end
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `descricoes`
--
ALTER TABLE `descricoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descricoes_id_tratamento_foreign` (`id_tratamento`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_id_usuario_foreign` (`id_usuario`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_empresa`
--
ALTER TABLE `log_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_requisito`
--
ALTER TABLE `log_requisito`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_responsavel_empresa`
--
ALTER TABLE `log_responsavel_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_sistema`
--
ALTER TABLE `log_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_tratamento`
--
ALTER TABLE `log_tratamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_usuario`
--
ALTER TABLE `log_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_versao`
--
ALTER TABLE `log_versao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_vinculo`
--
ALTER TABLE `log_vinculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `requisitos_id_empresa_foreign` (`id_empresa`);

--
-- Índices para tabela `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sistemas_id_usuario_foreign` (`id_usuario`),
  ADD KEY `sistemas_id_versao_foreign` (`id_versao`),
  ADD KEY `sistemas_id_empresa_foreign` (`id_empresa`);

--
-- Índices para tabela `tratamentos`
--
ALTER TABLE `tratamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tratamentos_id_usuario_responsavel_foreign` (`id_usuario_responsavel`),
  ADD KEY `tratamentos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `tratamentos_id_requisito_foreign` (`id_requisito`),
  ADD KEY `tratamentos_id_sistema_foreign` (`id_sistema`),
  ADD KEY `tratamentos_id_empresa_foreign` (`id_empresa`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `versaos`
--
ALTER TABLE `versaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versaos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `versaos_id_empresa_foreign` (`id_empresa`);

--
-- Índices para tabela `vinculos`
--
ALTER TABLE `vinculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vinculos_id_gestor_foreign` (`id_gestor`),
  ADD KEY `vinculos_id_empresa_foreign` (`id_empresa`),
  ADD KEY `vinculos_id_usuario_responsavel_foreign` (`id_usuario_responsavel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `descricoes`
--
ALTER TABLE `descricoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_empresa`
--
ALTER TABLE `log_empresa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_requisito`
--
ALTER TABLE `log_requisito`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_responsavel_empresa`
--
ALTER TABLE `log_responsavel_empresa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_sistema`
--
ALTER TABLE `log_sistema`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_tratamento`
--
ALTER TABLE `log_tratamento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_usuario`
--
ALTER TABLE `log_usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `log_versao`
--
ALTER TABLE `log_versao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_vinculo`
--
ALTER TABLE `log_vinculo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tratamentos`
--
ALTER TABLE `tratamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `versaos`
--
ALTER TABLE `versaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vinculos`
--
ALTER TABLE `vinculos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `descricoes`
--
ALTER TABLE `descricoes`
  ADD CONSTRAINT `descricoes_id_tratamento_foreign` FOREIGN KEY (`id_tratamento`) REFERENCES `tratamentos` (`id`);

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `requisitos`
--
ALTER TABLE `requisitos`
  ADD CONSTRAINT `requisitos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `requisitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `sistemas`
--
ALTER TABLE `sistemas`
  ADD CONSTRAINT `sistemas_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `sistemas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sistemas_id_versao_foreign` FOREIGN KEY (`id_versao`) REFERENCES `versaos` (`id`);

--
-- Limitadores para a tabela `tratamentos`
--
ALTER TABLE `tratamentos`
  ADD CONSTRAINT `tratamentos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `tratamentos_id_requisito_foreign` FOREIGN KEY (`id_requisito`) REFERENCES `requisitos` (`id`),
  ADD CONSTRAINT `tratamentos_id_sistema_foreign` FOREIGN KEY (`id_sistema`) REFERENCES `sistemas` (`id`),
  ADD CONSTRAINT `tratamentos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tratamentos_id_usuario_responsavel_foreign` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `versaos`
--
ALTER TABLE `versaos`
  ADD CONSTRAINT `versaos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `versaos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `vinculos`
--
ALTER TABLE `vinculos`
  ADD CONSTRAINT `vinculos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `vinculos_id_gestor_foreign` FOREIGN KEY (`id_gestor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vinculos_id_usuario_responsavel_foreign` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
