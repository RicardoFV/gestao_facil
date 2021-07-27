-- view de requisito

create view v_requisito as 
select r.id, r.nome, r.descricao, r.excluido, r.tipo_requisito, r.id_usuario, r.id_empresa, r.created_at,
v.	, v.id_usuario_responsavel
from requisitos r inner join vinculos v
on r.id_empresa = v.id_empresa


-- view de versao

create view v_versao as 
select ver.id, ver.nome, ver.excluido, ver.id_usuario, ver.id_empresa, ver.created_at,
v.id_gestor	, v.id_usuario_responsavel
from versaos ver inner join vinculos v
on ver.id_empresa = v.id_empresa
