create  view v_list_tsru_dados 
as 
select 
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
on tra.id_usuario_responsavel = usuario.id;