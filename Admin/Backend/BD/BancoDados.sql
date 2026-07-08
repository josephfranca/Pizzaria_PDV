create database pizzaria_pdv;
use pizzaria_pdv;

/* Tabela de Usuários (Login e Criação de Usuário)*/
create table usuarios(
id_usuario int auto_increment primary key,
nome varchar(100) not null,
nomeUsuario varchar(20) not null unique,
senha varchar(255) not null,
tipo varchar(20) not null default 'atendente',
dataCriacao timestamp default current_timestamp
);

/*Tabela categorias */
create table categorias (
id_categoria int auto_increment primary key,
nomeCategoria varchar(100) not null,
statusCategoria varchar(20) not null default 'Ativo',
dataCriacao timestamp default current_timestamp
);

/* Tabela de itens*/
create table itens (
id_item int auto_increment primary key,
id_categoria int not null,
titulo varchar(100) not null,
preco decimal(10,2) not null,
descricao text,
dataCadastro timestamp default current_timestamp,
foreign key (id_categoria) references categorias(id_categoria) on delete Restrict
);

/* Tabela de pedidos usando dados da tabela usuarios para registrar quem fez a venda*/
create table pedidos (
id_pedido int auto_increment primary key,
id_usuario int not null,
total_pedido decimal (10, 2)not null,
tipo_pagamento varchar(30) not null,
valor_pago decimal (10, 2)not null,
valor_troco decimal (10,2) not null,
data_hora timestamp default current_timestamp,
foreign key (id_usuario) references usuarios(id_usuario)
);

/* Tabela de itens pedidos, usa chaves estrangeiras do pedido e item, só os id*/
create table itens_pedidos (
id_item_pedido int auto_increment primary key,
id_pedido int not null,
id_item int not null,
tamanho_escolhido varchar (30),
borda_escolhida varchar (50),
preco_final_item decimal (10,2) not null,
foreign key (id_pedido) references pedidos (id_pedido) on delete cascade,
foreign key (id_item) references itens(id_item)
);

insert into usuarios (nome, nomeUsuario,senha,tipo) values ('Administrador do sistema', 'admin', 'admin123', 'admin'),
('Julia Olimpio', 'julia_olimpio', '123456789', 'atendente');

insert into usuarios (nome, nomeUsuario,senha,tipo) values('Julia olimpio', 'olimpio_julia', '12345678', 'atendente');

insert into categorias (nomeCategoria, statusCategoria) values 
('Pizzas Salgadas', 'Ativo'),
('Pizzas Doces', 'Ativo'),
('Bebidas', 'Ativo'),
('Bebidas alcoólicas', 'Desativado');

insert into itens(id_categoria,titulo, preco, descricao) values
(1, 'Pizza de Calabresa', 45.00, 'Molho de tomate, calabresa fatiada, cebola e orégano.'),
(1, 'Pizza de Frango com Catupiry', 45.00, 'Frango desfiado, molho, cobertura de catupiry'),
(3, 'Sprite', 10.00,'Refrigente de limão 2L'),
(3,'Coca Zero', 12.00,'Refrigente 2L'),
(2, 'Prestigio', 60.00,'Pizza de chocolate com coco ralado');

select * from usuarios;
select * from categorias;
select * from itens;