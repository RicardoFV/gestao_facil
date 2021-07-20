/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : gestao_facil

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 17/07/2021 22:24:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for descricoes
-- ----------------------------
DROP TABLE IF EXISTS `descricoes`;
CREATE TABLE `descricoes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tratamento` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `descricoes_id_tratamento_foreign`(`id_tratamento`) USING BTREE,
  CONSTRAINT `descricoes_id_tratamento_foreign` FOREIGN KEY (`id_tratamento`) REFERENCES `tratamentos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of descricoes
-- ----------------------------

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `empresas_id_usuario_foreign`(`id_usuario`) USING BTREE,
  CONSTRAINT `empresas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empresas
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for log_empresa
-- ----------------------------
DROP TABLE IF EXISTS `log_empresa`;
CREATE TABLE `log_empresa`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_empresa
-- ----------------------------

-- ----------------------------
-- Table structure for log_requisito
-- ----------------------------
DROP TABLE IF EXISTS `log_requisito`;
CREATE TABLE `log_requisito`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_requisito
-- ----------------------------

-- ----------------------------
-- Table structure for log_sistema
-- ----------------------------
DROP TABLE IF EXISTS `log_sistema`;
CREATE TABLE `log_sistema`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_sistema
-- ----------------------------

-- ----------------------------
-- Table structure for log_tratamento
-- ----------------------------
DROP TABLE IF EXISTS `log_tratamento`;
CREATE TABLE `log_tratamento`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_tratamento
-- ----------------------------

-- ----------------------------
-- Table structure for log_usuario
-- ----------------------------
DROP TABLE IF EXISTS `log_usuario`;
CREATE TABLE `log_usuario`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_usuario
-- ----------------------------
INSERT INTO `log_usuario` VALUES (1, 1, 'inserindo dados de usuario', '2021-07-17 22:23:20', 1);

-- ----------------------------
-- Table structure for log_versao
-- ----------------------------
DROP TABLE IF EXISTS `log_versao`;
CREATE TABLE `log_versao`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_versao
-- ----------------------------

-- ----------------------------
-- Table structure for log_vinculo
-- ----------------------------
DROP TABLE IF EXISTS `log_vinculo`;
CREATE TABLE `log_vinculo`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_acao` int(11) NULL DEFAULT NULL,
  `atividade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data_inclusao` datetime NULL DEFAULT NULL,
  `id_usuario_cadastrado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_vinculo
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for requisitos
-- ----------------------------
DROP TABLE IF EXISTS `requisitos`;
CREATE TABLE `requisitos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `tipo_requisito` enum('funcional','nao_funcional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `requisitos_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `requisitos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `requisitos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `requisitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of requisitos
-- ----------------------------

-- ----------------------------
-- Table structure for sistemas
-- ----------------------------
DROP TABLE IF EXISTS `sistemas`;
CREATE TABLE `sistemas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_versao` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sistemas_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `sistemas_id_versao_foreign`(`id_versao`) USING BTREE,
  INDEX `sistemas_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `sistemas_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sistemas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sistemas_id_versao_foreign` FOREIGN KEY (`id_versao`) REFERENCES `versaos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sistemas
-- ----------------------------

-- ----------------------------
-- Table structure for tratamentos
-- ----------------------------
DROP TABLE IF EXISTS `tratamentos`;
CREATE TABLE `tratamentos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dt_entrega` date NOT NULL,
  `excluido` int(11) NOT NULL,
  `situacao` enum('novo','nao_iniciado','em_andamento','parado','concluido') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_responsavel` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_requisito` int(10) UNSIGNED NOT NULL,
  `id_sistema` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tratamentos
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_acesso` enum('super_admin','administrador','administrador_gestor','desenvolvedor','suporte','usuario') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario_ressponsavel` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin@gmail.com', 'super_admin', 1, NULL, '$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2', NULL, '2021-07-17 22:23:20', '2021-07-17 22:23:20', NULL);

-- ----------------------------
-- Table structure for versaos
-- ----------------------------
DROP TABLE IF EXISTS `versaos`;
CREATE TABLE `versaos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluido` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `versaos_id_usuario_foreign`(`id_usuario`) USING BTREE,
  INDEX `versaos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  CONSTRAINT `versaos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `versaos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of versaos
-- ----------------------------

-- ----------------------------
-- Table structure for vinculos
-- ----------------------------
DROP TABLE IF EXISTS `vinculos`;
CREATE TABLE `vinculos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_gestor` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `id_usuario_responsavel` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vinculos_id_gestor_foreign`(`id_gestor`) USING BTREE,
  INDEX `vinculos_id_empresa_foreign`(`id_empresa`) USING BTREE,
  INDEX `vinculos_id_usuario_responsavel_foreign`(`id_usuario_responsavel`) USING BTREE,
  CONSTRAINT `vinculos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vinculos_id_gestor_foreign` FOREIGN KEY (`id_gestor`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vinculos_id_usuario_responsavel_foreign` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vinculos
-- ----------------------------

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
on tra.id_usuario_responsavel = usuario.id ;

-- ----------------------------
-- View structure for v_versao_sistema
-- ----------------------------
DROP VIEW IF EXISTS `v_versao_sistema`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_versao_sistema` AS select 
v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema, 
s.descricao as descricao, s.excluido
from versaos v inner join sistemas s 
on v.id = s.id_versao ;

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
