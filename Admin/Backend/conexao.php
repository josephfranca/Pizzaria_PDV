<?php

$host = '127.0.0.1'; //servidor local
$db = 'pizzaria_pdv'; // nome do banco
$user = 'root'; 
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
 
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Transforma erros do banco em exceções legíveis
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna os dados do banco como arrays associativos simples
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desativa a emulação para usar segurança nativa do MySQL
];

try{
    $pdo = new PDO($dsn,$user, $pass, $options);
    echo "Conectado com sucesso";
} catch (PDOException $e){
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
?>