create DATABASE GaragemDB;

USE GaragemDB;

CREATE TABLE Veiculo(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Modelo VARCHAR (100);
Marca VARCHAR (50);
Placa VARCHAR (10);
Ano INT;
);
select from *Veiculo