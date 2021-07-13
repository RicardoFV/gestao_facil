create  view v_versao_sistema 
as 
select 
v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema, 
s.descricao as descricao, s.excluido
from versaos v inner join sistemas s 
on v.id = s.id_versao ;