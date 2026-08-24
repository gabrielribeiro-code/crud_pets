CREATE DATABASE IF NOT EXISTS animaissDB;

use animaissDB;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
     nomePet VARCHAR(100) NOT NULL,
     especies VARCHAR(100) NOT NULL,
     raca VARCHAR(100) NOT NULL,
     idade int NOT NULL,
     id_clientes int NOT NULL,

    constraint fk_clientes foreign key (id_clientes) references clientes(id)

);

insert into clientes (nome, email, senha)
values ('admin', 'admin232@gmail.com', '1234');

insert into animais (nomePet, especies, raca, idade, id_clientes)
values ('thor', 'cachorro', 'labrador', '3', 1);



