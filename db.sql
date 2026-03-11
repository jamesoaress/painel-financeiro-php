CREATE DATABASE bolsa_de_valores;

USE bolsa_de_valores;

CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ativo VARCHAR(10) NOT NULL,
    quantidade INT NOT NULL,
    valor_unitario DECIMAL(10, 2) NOT NULL,
    data_compra DATE NOT NULL,
   
);

CREATE DATABASE funcionario;

USE funcionario;

CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR (11) NOT NULL,
    cargo VARCHAR (100) NOT NULL,
    data_nasc DATE NOT NULL
);