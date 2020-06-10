# Conversão entre MySQL e PostgreSQL

Apenas converter um script do MySQL para PostgreSQL

## MySQL

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cpf` char(11) DEFAULT NULL,
  `nome` char(45) NOT NULL,
  `credito_liberado` char(1) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

## PostgreSQL

-Remover todos os `
- trocar linha com auto_increment para serial
- Mudar int(11) para int
- Remover final com engine

CREATE TABLE clientes (
  id serial primary key,
  cpf char(11) DEFAULT NULL,
  nome char(45) NOT NULL,
  credito_liberado char(1) NOT NULL,
  data_nasc date DEFAULT NULL,
  user_id int DEFAULT NULL,
  email varchar(50) DEFAULT NULL
);

