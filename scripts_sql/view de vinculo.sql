-- view de vinculo

create view v_vinculo
 as 
select u.id, u.name, u.perfil_acesso , 
v.id_usuario_responsavel
from users u inner join vinculos v
on u.id = v.id_gestor

select * from vinculos
