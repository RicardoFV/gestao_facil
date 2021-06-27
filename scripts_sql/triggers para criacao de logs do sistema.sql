-- triggers para registro de logs
--  log usuario
DELIMITER //
create trigger trig_log_usuario_cadastro 
after insert on users for each row
begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'inserindo dados de usuario', new.created_at, new.id);
end;

-- trigger para logs de users (atualizaçao)
DELIMITER //
create trigger trig_log_usuario_alteracao
after update on users for each row
begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_ressponsavel, 'Alterando dados de usuario', new.updated_at, new.id);
end;

--  log versao
DELIMITER //
create trigger trig_log_versao_cadastro 
after insert on versaos for each row
begin
	-- cadastra o logs na tabela logs versao
    
    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados da versao', new.created_at, new.id);
end;

-- trigger para logs de versao (atualizaçao)
DELIMITER //
create trigger trig_log_versao_alteracao
after update on versaos for each row
begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_versao (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados da Versao', new.updated_at, new.id);
end;

--  log tratamentos
DELIMITER //
create trigger trig_log_tratamento_cadastro 
after insert on tratamentos for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do tratamento(chamado)', new.created_at, new.id);
end;

-- trigger para logs de tratamentos (atualizaçao)
DELIMITER //
create trigger trig_log_tratamento_alteracao
after update on tratamentos for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_tratamento (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do tratamento(chamado)', new.updated_at, new.id);
end;

--  log sistemas
DELIMITER //
create trigger trig_log_sistema_cadastro 
after insert on sistemas for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do sistema', new.created_at, new.id);
end;

-- trigger para logs de sistemas (atualizaçao)
DELIMITER //
create trigger trig_log_sistemas_alteracao
after update on sistemas for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_sistema (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do sistema', new.updated_at, new.id);
end;

--  log requisitos
DELIMITER //
create trigger trig_log_requisito_cadastro 
after insert on requisitos for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do requisito', new.created_at, new.id);
end;

-- trigger para logs de sistemas (atualizaçao)
DELIMITER //
create trigger trig_log_requisito_alteracao
after update on requisitos for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_requisito (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do requisito', new.updated_at, new.id);
end;
--  log empresas
DELIMITER //
create trigger trig_log_empresa_cadastro 
after insert on empresas for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'inserindo dados do endereço', new.created_at, new.id);
end;

-- trigger para logs de sistemas (atualizaçao)
DELIMITER //
create trigger trig_log_empresa_alteracao
after update on empresas for each row
begin
	-- cadastra o logs na tabela logs tratamento
    
    insert into log_empresa (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario, 'Alterando dados do endereço', new.updated_at, new.id);
end;

--  log vinculo empresa
DELIMITER //
create trigger trig_log_vinculo_empresa
after insert on vinculos for each row
begin
	-- cadastra o logs na tabela log_responsavel_empresa
    
    insert into log_vinculo(id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'inserindo dados do vinculo empresa', new.created_at, new.id);
end;

-- trigger para logs de vinculo empresa (atualizaçao)
DELIMITER //
create trigger trig_log_vinculo_empresa_alteracao
after update on vinculos for each row
begin
	-- cadastra o logs na tabela log_responsavel_empresa
    
    insert into log_vinculo (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (new.id_usuario_responsavel, 'Alterando dados do vinculo empresa', new.updated_at, new.id);
end;

-- trigger para logs de vinculo empresa (delete)
DELIMITER //
create trigger trig_log_vinculo_empresa_delete
after delete on vinculos for each row
begin
	-- cadastra o logs na tabela log_responsavel_empresa
    
    insert into log_vinculo (id_usuario_acao, atividade, data_inclusao, id_usuario_cadastrado)
    values (old.id_usuario_responsavel, 'Deletando dados da tabela Vinculo', now(), old.id);
end;



