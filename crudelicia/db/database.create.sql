create database tiantenado;

use tiantenado;

create table aluno (
	codigo int primary key auto_increment,
	nome varchar(64) not null,
	nascimento date not null
);

create table categoria (
	codigo int primary key auto_increment,
	nome varchar(64) not null
);

create table produto (
	codigo int primary key auto_increment,
	nome varchar(64) not null,
	descricao varchar(255) null,
	categoria int not null,
	preco double default 0.0,
	constraint fk_categoria foreign key (categoria) references categoria(codigo)
);