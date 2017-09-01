﻿CREATE TABLE noticia (
	id SERIAL UNIQUE,
	tagBox VARCHAR NOT NULL,
	imgBox VARCHAR NOT NULL,
	titulo VARCHAR(40),
	fontBox VARCHAR NOT NULL,
	descricao VARCHAR(70),
	mainBox VARCHAR NOT NULL,
	insercao DATE DEFAULT NOW(),
	PRIMARY KEY(tagBox,titulo)
);

CREATE TABLE USUARIO (
	LOGIN VARCHAR(15) PRIMARY KEY,
	SENHA VARCHAR(15) NOT NULL,
	NOME VARCHAR(30) NOT NULL,
	ATIVO BOOLEAN DEFAULT FALSE, 
	ADMIN BOOLEAN DEFAULT FALSE
);
