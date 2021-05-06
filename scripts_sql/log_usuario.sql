-- tabela para log de usuario 
create table log_usuario
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_modificao datetime
)