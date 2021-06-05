-- criacao de procedure para cadastro de usuario 

DELIMITER // 
create procedure cadastro_usuario()
begin 
-- verifica se tem usuario,
-- caso retorne 0 significa que nao tem
-- ai e feito a inserçao 
if (select count(*) from users) = 0 then 
	insert into users(name, email, perfil_acesso, id_usuario_ressponsavel, password, created_at, updated_at)
    values('Super Admin', 'superadmin@gmail.com','super_admin', 1, '$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2' , now(), now());
    else
		-- retorna o erro 
		signal sqlstate '45000' set message_text = 'Tabela já existe usuario, não pode ser inserido';    
end if;
end;
-- cadastrando o usuario
call cadastro_usuario();

select * from users;