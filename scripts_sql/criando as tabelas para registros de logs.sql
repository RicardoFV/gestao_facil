-- criacao das tabelas de log
create table log_usuario
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_versao
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_requisito
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_empresa
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_endereco
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_tratamento
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);

create table log_sistema
( 
	id bigint not null primary key auto_increment,
    id_usuario_acao int, 
    atividade varchar(255), 
    data_inclusao datetime,
    id_usuario_cadastrado int   
);