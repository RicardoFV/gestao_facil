/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : gestao_facil

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 09/08/2021 09:28:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for descricoes
-- ----------------------------
DROP TABLE IF EXISTS `descricoes`;
CREATE TABLE `descricoes`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tratamento` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `descricoes_id_tratamento_foreign`(`id_tratamento`) USING BTREE,
  CONSTRAINT `descricoes_id_tratamento_foreign` FOREIGN KEY (`id_tratamento`) REFERENCES `tratamentos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of descricoes
-- ----------------------------
INSERT INTO `descricoes` VALUES (1, 'Ajustar a tela inicial do sistema, realizando a modificação dos campos.', 1, '2021-07-28 10:50:52', '2021-07-28 10:50:52');
INSERT INTO `descricoes` VALUES (2, 'Realizando a tratativa do problema.', 1, '2021-07-28 10:54:33', '2021-07-28 10:54:33');

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao_empresa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `empresas_id_usuario_foreign`(`id_usuario`) USING BTREE,
  CONSTRAINT `empresas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES (1, 'Oliver e Gabrielly Filmagens ME', 'contato@oliveregabriellyfilmagensme.com.br', '(62)3988-7862', '(62)9874-96190', '39.179.703/0001-64', 'ativo', '74420325', 'Rua Canabrava', '0', 'Cidade Jardim', 'Goiânia', 'GO', 1, '2021-07-19 20:59:26', '2021-07-19 20:59:26', NULL);
INSERT INTO `empresas` VALUES (2, 'Nicolas e Murilo Alimentos ME', 'fabricacao@nicolasemuriloalimentosme.com.br', '(61)2791-5383', '(61)9838-33914', '94.410.180/0001-23', 'ativo', '72867739', 'Quadra 19', '0', 'Núcleo Residencial Brasília', 'Novo Gama', 'GO', 1, '2021-07-19 21:04:36', '2021-07-19 21:04:36', NULL);
INSERT INTO `empresas` VALUES (3, 'Ester e Raimunda Gráfica ME', 'contabilidade@estereraimundagraficame.com.br', '(62)2992-7239', '(62)9951-54988', '41.180.823/0001-23', 'ativo', '74355016', 'Estrada Blumenau', '0', 'Setor dos Dourados', 'Goiânia', 'GO', 1, '2021-07-19 21:05:42', '2021-07-19 21:05:42', NULL);
INSERT INTO `empresas` VALUES (4, 'Mário e Severino Telecomunicações Ltda', 'contabil@marioeseverinotelecomunicacoesltda.com.br', '(85)2727-2054', '(85)9870-81605', '15.546.230/0001-28', 'ativo', '60823210', 'Rua Clélia', '0', 'Cidade dos Funcionários', 'Fortaleza', 'CE', 1, '2021-07-19 21:06:37', '2021-07-19 21:06:37', NULL);
INSERT INTO `empresas` VALUES (5, 'Bryan e Leonardo Adega ME', 'fiscal@bryaneleonardoadegame.com.br', '(88)2596-6879', '(88)9833-50046', '53.166.869/0001-77', 'ativo', '63012110', 'Rua José Arnaldo Bezerra Filho', '0', 'Horto', 'Juazeiro do Norte', 'CE', 1, '2021-07-19 21:07:45', '2021-07-19 21:07:45', NULL);
INSERT INTO `empresas` VALUES (6, 'Raimundo e Carlos Eduardo Ferragens ME', 'contabilidade@raimundoecarloseduardoferragensme.com.br', '(98)2777-0067', '(98)9834-15535', '57.021.203/0001-81', 'ativo', '65067690', 'Rua Itajubá', '0', 'Olho D\'Água', 'São Luís', 'MA', 1, '2021-07-20 20:27:52', '2021-07-20 20:27:52', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for log_empresa
-- ----------------------------
DROP TABLE IF EXISTS `log_empresa`;
CREATE TABLE `log_empresa`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_empresa
-- ----------------------------
INSERT INTO `log_empresa` VALUES (1, 1, 'inserindo dados do endereço', '2021-07-19 20:59:26', 1);
INSERT INTO `log_empresa` VALUES (2, 1, 'inserindo dados do endereço', '2021-07-19 21:04:36', 2);
INSERT INTO `log_empresa` VALUES (3, 1, 'inserindo dados do endereço', '2021-07-19 21:05:42', 3);
INSERT INTO `log_empresa` VALUES (4, 1, 'inserindo dados do endereço', '2021-07-19 21:06:37', 4);
INSERT INTO `log_empresa` VALUES (5, 1, 'inserindo dados do endereço', '2021-07-19 21:07:45', 5);
INSERT INTO `log_empresa` VALUES (6, 1, 'inserindo dados do endereço', '2021-07-20 20:27:52', 6);

-- ----------------------------
-- Table structure for log_requisito
-- ----------------------------
DROP TABLE IF EXISTS `log_requisito`;
CREATE TABLE `log_requisito`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_requisito
-- ----------------------------
INSERT INTO `log_requisito` VALUES (1, 7, 'inserindo dados do requisito', '2021-07-26 10:49:45', 1);
INSERT INTO `log_requisito` VALUES (2, 2, 'inserindo dados do requisito', '2021-07-26 20:32:16', 2);
INSERT INTO `log_requisito` VALUES (3, 7, 'inserindo dados do requisito', '2021-07-26 22:22:52', 3);

-- ----------------------------
-- Table structure for log_sistema
-- ----------------------------
DROP TABLE IF EXISTS `log_sistema`;
CREATE TABLE `log_sistema`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_sistema
-- ----------------------------
INSERT INTO `log_sistema` VALUES (1, 7, 'inserindo dados do sistema', '2021-07-27 13:03:56', 1);
INSERT INTO `log_sistema` VALUES (2, 7, 'Alterando dados do sistema', '2021-07-27 16:28:56', 1);
INSERT INTO `log_sistema` VALUES (3, 7, 'inserindo dados do sistema', '2021-07-27 16:39:41', 2);
INSERT INTO `log_sistema` VALUES (4, 7, 'Alterando dados do sistema', '2021-07-27 16:39:48', 2);
INSERT INTO `log_sistema` VALUES (5, 1, 'inserindo dados do sistema', '2021-07-27 17:42:39', 3);

-- ----------------------------
-- Table structure for log_tratamento
-- ----------------------------
DROP TABLE IF EXISTS `log_tratamento`;
CREATE TABLE `log_tratamento`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_tratamento
-- ----------------------------
INSERT INTO `log_tratamento` VALUES (1, 9, 'inserindo dados do tratamento(chamado)', '2021-07-28 10:50:52', 1);
INSERT INTO `log_tratamento` VALUES (2, 9, 'Alterando dados do tratamento(chamado)', '2021-07-28 10:54:33', 1);

-- ----------------------------
-- Table structure for log_usuario
-- ----------------------------
DROP TABLE IF EXISTS `log_usuario`;
CREATE TABLE `log_usuario`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_usuario
-- ----------------------------
INSERT INTO `log_usuario` VALUES (1, 1, 'inserindo dados de usuario', '2021-07-17 22:23:20', 1);
INSERT INTO `log_usuario` VALUES (2, 1, 'inserindo dados de usuario', '2021-07-18 18:20:36', 2);
INSERT INTO `log_usuario` VALUES (3, 1, 'inserindo dados de usuario', '2021-07-18 18:21:13', 3);
INSERT INTO `log_usuario` VALUES (4, 1, 'inserindo dados de usuario', '2021-07-18 18:21:48', 4);
INSERT INTO `log_usuario` VALUES (5, 1, 'inserindo dados de usuario', '2021-07-18 18:22:12', 5);
INSERT INTO `log_usuario` VALUES (6, 1, 'inserindo dados de usuario', '2021-07-18 18:22:40', 6);
INSERT INTO `log_usuario` VALUES (7, 1, 'inserindo dados de usuario', '2021-07-19 21:19:50', 7);
INSERT INTO `log_usuario` VALUES (8, 1, 'Alterando dados de usuario', '2021-07-19 21:19:50', 7);
INSERT INTO `log_usuario` VALUES (9, 7, 'inserindo dados de usuario', '2021-07-19 22:04:00', 8);
INSERT INTO `log_usuario` VALUES (10, 7, 'Alterando dados de usuario', '2021-07-19 22:04:00', 8);
INSERT INTO `log_usuario` VALUES (11, 2, 'inserindo dados de usuario', '2021-07-20 21:18:22', 9);

-- ----------------------------
-- Table structure for log_versao
-- ----------------------------
DROP TABLE IF EXISTS `log_versao`;
CREATE TABLE `log_versao`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_versao
-- ----------------------------
INSERT INTO `log_versao` VALUES (1, 7, 'inserindo dados da versao', '2021-07-26 20:36:33', 1);
INSERT INTO `log_versao` VALUES (2, 7, 'inserindo dados da versao', '2021-07-26 20:37:37', 2);

-- ----------------------------
-- Table structure for log_vinculo
-- ----------------------------
DROP TABLE IF EXISTS `log_vinculo`;
CREATE TABLE `log_vinculo`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int NULL DEFAULT NULL,
  `atividade` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_vinculo
-- ----------------------------
INSERT INTO `log_vinculo` VALUES (1, 1, 'inserindo dados do vinculo empresa', '2021-07-19 21:09:11', 1);
INSERT INTO `log_vinculo` VALUES (2, 1, 'inserindo dados do vinculo empresa', '2021-07-19 21:09:19', 2);
INSERT INTO `log_vinculo` VALUES (3, 1, 'inserindo dados do vinculo empresa', '2021-07-19 21:09:36', 3);
INSERT INTO `log_vinculo` VALUES (4, 1, 'inserindo dados do vinculo empresa', '2021-07-19 21:09:44', 4);
INSERT INTO `log_vinculo` VALUES (5, 1, 'inserindo dados do vinculo empresa', '2021-07-19 21:09:51', 5);
INSERT INTO `log_vinculo` VALUES (6, 1, 'inserindo dados do vinculo empresa', '2021-07-20 20:39:53', 6);
INSERT INTO `log_vinculo` VALUES (7, 7, 'inserindo dados do vinculo empresa', '2021-07-20 21:09:39', 7);
INSERT INTO `log_vinculo` VALUES (8, 2, 'inserindo dados do vinculo empresa', '2021-07-20 21:18:36', 8);
INSERT INTO `log_vinculo` VALUES (9, 2, 'inserindo dados do vinculo empresa', '2021-07-20 21:22:01', 9);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_02_create_empresas_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_03_16_214944_create_requisitos_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_03_16_215055_create_versaos_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_03_16_215116_create_sistemas_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_03_16_215117_create_tratamentos_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_04_07_200117_create_descricoes_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_06_10_212249_create_vinculos_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for requisitos
-- ----------------------------
DROP TABLE IF EXISTS `requisitos`;
CREATE TABLE `requisitos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int NOT NULL,
  `tipo_requisito` enum('funcional','nao_funcional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int UNSIGNED NOT NULL,
  `id_empresa` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `requisitos_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `requisitos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `requisitos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `requisitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of requisitos
-- ----------------------------
INSERT INTO `requisitos` VALUES (1, 'Modificar a tela inicial do sistema', 'Modificar os campos nome e endereço de posiçao.', 1, 'funcional', 7, 6, '2021-07-26 10:49:45', '2021-07-26 10:49:45');
INSERT INTO `requisitos` VALUES (2, 'Tela Inicial do sistema', 'Mudar a tela inicial do siistema', 1, 'nao_funcional', 2, 2, '2021-07-26 20:32:16', '2021-07-26 20:32:16');
INSERT INTO `requisitos` VALUES (3, 'Criar nova tela', 'Criar uma tela de log', 1, 'funcional', 7, 6, '2021-07-26 22:22:52', '2021-07-26 22:22:52');

-- ----------------------------
-- Table structure for sistemas
-- ----------------------------
DROP TABLE IF EXISTS `sistemas`;
CREATE TABLE `sistemas`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int NOT NULL,
  `id_usuario` int UNSIGNED NOT NULL,
  `id_versao` int UNSIGNED NOT NULL,
  `id_empresa` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sistemas_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `sistemas_id_versao_foreign`(`id_versao`) USING BTREE,
  INDEX `sistemas_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `sistemas_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sistemas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sistemas_id_versao_foreign` FOREIGN KEY (`id_versao`) REFERENCES `versaos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sistemas
-- ----------------------------
INSERT INTO `sistemas` VALUES (1, 'Sankhya W', 'Sistema de Gestao de negocio.', 1, 7, 1, 6, '2021-07-27 13:03:56', '2021-07-27 16:28:56');
INSERT INTO `sistemas` VALUES (2, 'Gestao de compras', 'Ssitema de gestao de compras', 0, 7, 2, 6, '2021-07-27 16:39:41', '2021-07-27 16:39:48');
INSERT INTO `sistemas` VALUES (3, 'Sistema de AR', 'Sistema de construcao de certificado.', 1, 1, 2, 5, '2021-07-27 17:42:39', '2021-07-27 17:42:39');

-- ----------------------------
-- Table structure for tratamentos
-- ----------------------------
DROP TABLE IF EXISTS `tratamentos`;
CREATE TABLE `tratamentos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `dt_entrega` date NOT NULL,
  `excluido` int NOT NULL,
  `situacao` enum('novo','nao_iniciado','em_andamento','parado','concluido') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_responsavel` int UNSIGNED NOT NULL,
  `id_usuario` int UNSIGNED NOT NULL,
  `id_requisito` int UNSIGNED NOT NULL,
  `id_sistema` int UNSIGNED NOT NULL,
  `id_empresa` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tratamentos_id_usuario_responsavel_foreign`(`id_usuario_responsavel`) USING BTREE,
  INDEX `tratamentos_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `tratamentos_id_requisito_foreign`(`id_requisito`) USING BTREE,
  INDEX `tratamentos_id_sistema_foreign`(`id_sistema`) USING BTREE,
  INDEX `tratamentos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `tratamentos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tratamentos_id_requisito_foreign` FOREIGN KEY (`id_requisito`) REFERENCES `requisitos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tratamentos_id_sistema_foreign` FOREIGN KEY (`id_sistema`) REFERENCES `sistemas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tratamentos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tratamentos_id_usuario_responsavel_foreign` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tratamentos
-- ----------------------------
INSERT INTO `tratamentos` VALUES (1, '2021-07-31', 1, 'em_andamento', 9, 9, 2, 3, 5, '2021-07-28 10:50:52', '2021-07-28 10:54:33');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_acesso` enum('super_admin','administrador','administrador_gestor','desenvolvedor','suporte','usuario') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_ressponsavel` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin@gmail.com', 'super_admin', 1, NULL, '$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2', NULL, '2021-07-17 22:23:20', '2021-07-17 22:23:20', NULL);
INSERT INTO `users` VALUES (2, 'administrador 1', 'adm1@gmail.com', 'administrador', 1, NULL, '$2y$10$eImOkjv.vXcvM/kUP6ZtTeua/5z/QkWkP78uCrj.UfS8oQ223QOMq', NULL, '2021-07-18 18:20:36', '2021-07-18 18:20:36', NULL);
INSERT INTO `users` VALUES (3, 'administrador 2', 'adm2@gmail.com', 'administrador', 1, NULL, '$2y$10$j2NU0BgNzEDMdj02QSQFdexx3sF0SjzSACbG/nDE6SjtqMcO19OsW', NULL, '2021-07-18 18:21:13', '2021-07-18 18:21:13', NULL);
INSERT INTO `users` VALUES (4, 'administrador 3', 'adm3@gmail.com', 'administrador', 1, NULL, '$2y$10$x4hbZx/H3TzIwMZtpVfHSe9i4uA8xoKtD4G54wPb71BIkxhGlvZtO', NULL, '2021-07-18 18:21:48', '2021-07-18 18:21:48', NULL);
INSERT INTO `users` VALUES (5, 'administrador 4', 'adm4@gmail.com', 'administrador', 1, NULL, '$2y$10$oIo0E7JwsZ4cDAGsyVi4S.Jz0ae.r8tnwJ4ZyX/OIiWoCWmTR8SZ.', NULL, '2021-07-18 18:22:12', '2021-07-18 18:22:12', NULL);
INSERT INTO `users` VALUES (6, 'administrador 5', 'adm5@gmail.com', 'administrador', 1, NULL, '$2y$10$pMXHqFeSmuJRZnz14pIu/OQqt516K75zmnaTq8IWnnGB6oj8ZOcoO', NULL, '2021-07-18 18:22:40', '2021-07-18 18:22:40', NULL);
INSERT INTO `users` VALUES (7, 'administrador 6', 'administrador6@gmail.com', 'administrador', 1, NULL, '$2y$10$Ndi/nwETpBMBLEHX8BoDU.4aX2Jv6KbbG5z.0LjKPUiDsd.xfjBwy', NULL, '2021-07-19 21:19:50', '2021-07-19 21:19:50', NULL);
INSERT INTO `users` VALUES (8, 'meu usuario 1', 'meuusuario1@gmail.com', 'desenvolvedor', 7, NULL, '$2y$10$utbyPwEfXhU332uo5MpwrOKTLx/8Fy6VVBwHufYRT89eWUXw8ba0G', NULL, '2021-07-19 22:04:00', '2021-07-19 22:04:00', NULL);
INSERT INTO `users` VALUES (9, 'meu teste 3', 'teste2@gmail.com', 'suporte', 2, NULL, '$2y$10$wOjtBRZkqrO3nCIDDwGBfOi80zjQnE5SqNYfUmDhML34s/JSB3/bG', NULL, '2021-07-20 21:18:22', '2021-07-20 21:18:22', NULL);

-- ----------------------------
-- Table structure for versaos
-- ----------------------------
DROP TABLE IF EXISTS `versaos`;
CREATE TABLE `versaos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int NOT NULL,
  `id_usuario` int UNSIGNED NOT NULL,
  `id_empresa` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `versaos_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `versaos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `versaos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `versaos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of versaos
-- ----------------------------
INSERT INTO `versaos` VALUES (1, 'Versao 1.0', 1, 7, 6, '2021-07-26 20:36:33', '2021-07-26 20:36:33');
INSERT INTO `versaos` VALUES (2, 'Homologação', 1, 7, 6, '2021-07-26 20:37:37', '2021-07-26 20:37:37');

-- ----------------------------
-- Table structure for vinculos
-- ----------------------------
DROP TABLE IF EXISTS `vinculos`;
CREATE TABLE `vinculos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_gestor` int UNSIGNED NOT NULL,
  `id_empresa` int UNSIGNED NOT NULL,
  `id_usuario_responsavel` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vinculos_id_gestor_foreign`(`id_gestor`) USING BTREE,
  INDEX `vinculos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  INDEX `vinculos_id_usuario_responsavel_foreign`(`id_usuario_responsavel`) USING BTREE,
  CONSTRAINT `vinculos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vinculos_id_gestor_foreign` FOREIGN KEY (`id_gestor`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vinculos_id_usuario_responsavel_foreign` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of vinculos
-- ----------------------------
INSERT INTO `vinculos` VALUES (1, 2, 1, 1, '2021-07-19 21:09:11', '2021-07-19 21:09:11');
INSERT INTO `vinculos` VALUES (2, 2, 2, 1, '2021-07-19 21:09:19', '2021-07-19 21:09:19');
INSERT INTO `vinculos` VALUES (3, 3, 3, 1, '2021-07-19 21:09:36', '2021-07-19 21:09:36');
INSERT INTO `vinculos` VALUES (4, 4, 4, 1, '2021-07-19 21:09:44', '2021-07-19 21:09:44');
INSERT INTO `vinculos` VALUES (5, 5, 5, 1, '2021-07-19 21:09:51', '2021-07-19 21:09:51');
INSERT INTO `vinculos` VALUES (6, 7, 6, 1, '2021-07-20 20:39:53', '2021-07-20 20:39:53');
INSERT INTO `vinculos` VALUES (7, 8, 6, 7, '2021-07-20 21:09:39', '2021-07-20 21:09:39');
INSERT INTO `vinculos` VALUES (8, 9, 2, 2, '2021-07-20 21:18:36', '2021-07-20 21:18:36');
INSERT INTO `vinculos` VALUES (9, 9, 1, 2, '2021-07-20 21:22:01', '2021-07-20 21:22:01');

-- ----------------------------
-- View structure for v_list_tsru_dados
-- ----------------------------
DROP VIEW IF EXISTS `v_list_tsru_dados`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_list_tsru_dados` AS select
tra.id  as id_tratamento, tra.situacao, tra.created_at as dt_inclusao , tra.updated_at as finalizado,
sis.id as id_sistema, sis.nome as nome_sistema,
res.id as id_requisito , res.nome as nome_requisito,
usuario.id as id_usuario , usuario.name as nome_usuario
from
tratamentos  tra inner join sistemas sis
on tra.id_sistema = sis.id
inner join requisitos res
on tra.id_requisito = res.id
inner join users usuario
on tra.id_usuario_responsavel = usuario.id ; ;

-- ----------------------------
-- View structure for v_requisito
-- ----------------------------
DROP VIEW IF EXISTS `v_requisito`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_requisito` AS select r.id, r.nome, r.descricao, r.excluido, r.tipo_requisito, r.id_usuario, r.id_empresa, r.created_at,
v.id_gestor, v.id_usuario_responsavel
from requisitos r inner join vinculos v
on r.id_empresa = v.id_empresa ; ;

-- ----------------------------
-- View structure for v_versao
-- ----------------------------
DROP VIEW IF EXISTS `v_versao`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_versao` AS select ver.id, ver.nome, ver.excluido, ver.id_usuario, ver.id_empresa, ver.created_at,
v.id_gestor	, v.id_usuario_responsavel
from versaos ver inner join vinculos v
on ver.id_empresa = v.id_empresa ; ;

-- ----------------------------
-- View structure for v_versao_sistema
-- ----------------------------
DROP VIEW IF EXISTS `v_versao_sistema`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_versao_sistema` AS select
v.id as id, v.nome as nome_versao , s.nome as nome_sistema,
s.id as id_sistema,
s.descricao as descricao, s.excluido, s.id_empresa,
vin.id_gestor, vin.id_usuario_responsavel
from versaos v inner join sistemas s
on v.id = s.id_versao
inner join vinculos vin
on v.id_empresa = vin.id_empresa ; ;

-- ----------------------------
-- View structure for v_versao_sistema2
-- ----------------------------
DROP VIEW IF EXISTS `v_versao_sistema2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_versao_sistema2` AS select DISTINCT
v.id as id, v.nome as nome_versao ,
s.nome as nome_sistema, s.id as id_sistema, s.descricao as descricao, s.excluido, s.id_empresa
from versaos v inner join sistemas s
on v.id = s.id_versao ; ;

-- ----------------------------
-- View structure for v_vinculo
-- ----------------------------
DROP VIEW IF EXISTS `v_vinculo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_vinculo` AS select u.id, u.name, u.perfil_acesso ,
v.id_usuario_responsavel
from users u inner join vinculos v
on u.id = v.id_gestor ; ;

-- ----------------------------
-- Procedure structure for cadastro_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `cadastro_usuario`;
delimiter ;;
CREATE PROCEDURE `cadastro_usuario`()
begin
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
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table empresas
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_empresa_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_empresa_cadastro` AFTER INSERT ON `empresas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do endereço', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table empresas
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_empresa_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_empresa_alteracao` AFTER UPDATE ON `empresas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do endereço', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table requisitos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_requisito_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_requisito_cadastro` AFTER INSERT ON `requisitos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do requisito', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table requisitos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_requisito_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_requisito_alteracao` AFTER UPDATE ON `requisitos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do requisito', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table sistemas
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_sistema_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_sistema_cadastro` AFTER INSERT ON `sistemas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do sistema', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table sistemas
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_sistemas_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_sistemas_alteracao` AFTER UPDATE ON `sistemas` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do sistema', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tratamentos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_tratamento_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_tratamento_cadastro` AFTER INSERT ON `tratamentos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do tratamento(chamado)', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tratamentos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_tratamento_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_tratamento_alteracao` AFTER UPDATE ON `tratamentos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs tratamento

    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do tratamento(chamado)', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table users
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_usuario_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_usuario_cadastro` AFTER INSERT ON `users` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario

    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'inserindo dados de usuario', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table users
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_usuario_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_usuario_alteracao` AFTER UPDATE ON `users` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario

    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'Alterando dados de usuario', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table versaos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_versao_cadastro`;
delimiter ;;
CREATE TRIGGER `trig_log_versao_cadastro` AFTER INSERT ON `versaos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs versao

    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados da versao', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table versaos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_versao_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_versao_alteracao` AFTER UPDATE ON `versaos` FOR EACH ROW begin
	-- cadastra o logs na tabela logs usuario

    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados da Versao', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table vinculos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_vinculo_empresa`;
delimiter ;;
CREATE TRIGGER `trig_log_vinculo_empresa` AFTER INSERT ON `vinculos` FOR EACH ROW begin
	-- cadastra o logs na tabela log_responsavel_empresa

    insert into log_vinculo(id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'inserindo dados do vinculo empresa', new.created_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table vinculos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_vinculo_empresa_alteracao`;
delimiter ;;
CREATE TRIGGER `trig_log_vinculo_empresa_alteracao` AFTER UPDATE ON `vinculos` FOR EACH ROW begin
	-- cadastra o logs na tabela log_responsavel_empresa

    insert into log_vinculo (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'Alterando dados do vinculo empresa', new.updated_at, new.id);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table vinculos
-- ----------------------------
DROP TRIGGER IF EXISTS `trig_log_vinculo_empresa_delete`;
delimiter ;;
CREATE TRIGGER `trig_log_vinculo_empresa_delete` AFTER DELETE ON `vinculos` FOR EACH ROW begin
	-- cadastra o logs na tabela log_responsavel_empresa

    insert into log_vinculo (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (old.id_usuario_responsavel, 'Deletando dados da tabela Vinculo', now(), old.id);
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
