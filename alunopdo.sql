CREATE DATABASE alunopdo;

USE alunopdo;
create table aluno (
    id int primary key auto_increment,
    nome varchar(150) not null,
    email varchar(150) not null unique,
    cpf char(11) not null unique
);
desc aluno;

insert into aluno (nome, email, cpf) 
values 
('Caio', 'caio@senac.com.br', '11111111111'),
('Fulano', 'ful@senac.com.br', '22222222222'),
('Ciclano', 'ci@senac.com.br', '33333333333'),
('Beltrano', 'bel@senac.com.br', '44444444444');
select * from aluno;

create view consulta as
select
    cpf as CPF,
    nome as Nome,
    email as Email
from aluno;

SELECT * FROM consulta;