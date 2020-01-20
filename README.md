# Descrição


# Passo a passo

1. Exposição de portas

	certifique-se que as portas 80,3306,9000 estão disponiveis... c

2. Levantar os servidores
	
	Abre a pasta Docker e execute o comando:	
	
	docker-compose up -d nginx mysql php-fpm
	
	no final irá aparecer uma mensagem de compartilhamento dos dispositivos, escolha OK, caso não consiga a tempo, execute o comando anterior novamente.
	
3. Criacao do Banco de Dados
	acesse o container do banco de dados:
	
	   1. winpty docker exec -it mysql bash
					ou
	   2. docker exec -it mysql bash
	   
	logue no container do banco de dados:
	
		1. mysql -u root -p
		2. root

	crie a database colando o comando no terminal:

DROP DATABASE Athenas;
CREATE DATABASE IF NOT EXISTS Athenas;
USE Athenas;

CREATE TABLE IF NOT EXISTS Categorias (
	codigo INT(11) AUTO_INCREMENT,
	nome VARCHAR(255),
	PRIMARY KEY (codigo)
);

CREATE TABLE IF NOT EXISTS Pessoas (
  codigo INT(11) AUTO_INCREMENT,
  nome VARCHAR(255),
  email VARCHAR(255),
  categoria int NOT NULL,
  PRIMARY KEY (codigo),
  FOREIGN KEY (categoria) REFERENCES Categorias(codigo)
);

INSERT INTO Categorias (nome) VALUES ("Admin");
INSERT INTO Categorias (nome) VALUES ("Gerente");
INSERT INTO Categorias (nome) VALUES ("Normal");
		
# Sobre o site...

1. Para acessar basta digitar localhost no navegador