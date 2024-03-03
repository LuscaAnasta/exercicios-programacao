create database if not exists uc12_php;
use uc12_php;

create table if not exists tb_usuarios(
id integer primary key auto_increment,
usuario text,
data_nasc text,
email text unique, 
senha text,
telefone text unique
);

create table if not exists tb_tarefas(
id_tarefa integer primary key auto_increment,
titulo text unique,
descricao text,
dt_inicio text unique, 
dt_termino text,
id_usuario integer,
foreign key (id_usuario) references tb_usuarios(id)
);

#insert into tb_usuarios(usuario, data_nasc, email, senha, telefone)
#values("lucas","10/10/1010", "lulullu@aafassf", "senha123", "1199999999");

#insert into tb_tarefas(titulo, descricao, dt_inicio, dt_termino)
#values("lucast","legal", "10/10/1010", "10/10/1010");

select*from tb_usuarios;
select*from tb_tarefas;
##drop database uc12_php;
