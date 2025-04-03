create database simplesystem;
use simplesystem;


CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    sobrenome VARCHAR(30) NOT NULL,
    genero ENUM('Feminino', 'Masculino', 'Não binário', 'Prefiro não informar', 'Outro') DEFAULT 'Prefiro não informar' NOT NULL,
    email VARCHAR(256) UNIQUE NOT NULL,
    pais VARCHAR(150) DEFAULT 'Prefiro não informar' NOT NULL,
    senha VARCHAR(256) NOT NULL,
    type ENUM('user', 'adm') NOT NULL
);
CREATE TABLE User_comum (
    id INT PRIMARY KEY,
    username VARCHAR(30) UNIQUE NOT NULL,
    FOREIGN KEY (id) REFERENCES Users(id) ON DELETE CASCADE
);
CREATE TABLE Admin (
    id INT PRIMARY KEY,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    FOREIGN KEY (id) REFERENCES Users(id) ON DELETE CASCADE
);


create table Solicitacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_hora_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    destinatario INT NOT NULL,
    remetente INT NOT NULL,
    status ENUM('Aguardando', 'Aceito', 'Negado') DEFAULT'Aguardando' NOT NULL,
    FOREIGN KEY (destinatario) REFERENCES User(id),
    FOREIGN KEY (remetente) REFERENCES User(id)
);

create table Amigo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user INT NOT NULL,
    amigo INT NOT NULL,
    FOREIGN KEY (user) REFERENCES User(id),
    FOREIGN KEY (amigo) REFERENCES User(id)
);

create table Cutuco (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_hora_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    destinatario INT NOT NULL,
    remetente INT NOT NULL,
    status ENUM('Aguardando', 'Aceito', 'Negado') DEFAULT'Aguardando' NOT NULL,
    FOREIGN KEY (destinatario) REFERENCES User(id),
    FOREIGN KEY (remetente) REFERENCES User(id)
);

create table Notificacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mensagem INT NOT NULL,
    destinatario INT NOT NULL,
    remetente INT NOT NULL,
    FOREIGN KEY (destinatario) REFERENCES User(id),
    FOREIGN KEY (remetente) REFERENCES User(id)
);