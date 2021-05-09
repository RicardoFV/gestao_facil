-- tabela para log de usuario 
create table log_usuario
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_acao datetime
)
-- trigger para logs de users
DELIMITER //
create trigger trig_log_usuario_cadastro 
after insert on users for each row
begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_acao)
    values (new.id_usuario_ressponsavel, 'inserindo dados de usuario', now());

end//

-- trigger para logs de users (atualizaçao)
DELIMITER //
create trigger trig_log_usuario_alteracao
after update on users for each row
begin
	-- cadastra o logs na tabela logs usuario
    
    insert into log_usuario (id_usuario_acao, atividade, data_acao)
    values (new.id_usuario_ressponsavel, 'alterando dados dados de usuario', now());

end//