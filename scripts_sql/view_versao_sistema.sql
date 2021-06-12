create or replace view v_versao_sistema as 
select 
v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema, 
s.descricao as descricao, s.excluido , e.name as nome_empresa
from versaos v inner join sistemas s 
on v.id = s.id_versao 
inner join empresas e 
on v.id_empresa = e.id and s.id_empresa = e.id;