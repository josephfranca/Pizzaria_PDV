<?php
session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    // Se não for admin, chuta de volta para o login com uma mensagem de erro
    header("Location: ../../login.html?erro=acesso_negado");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela ADMIN</title>
    <link rel="stylesheet" href="../Frontend/Assets/CSS/telaADM.css">
</head>
<body>

    <div class="admin-panel">
        <h1>Tela de adm</h1>
        
        <div class="modules-container">
            
            <div class="card">
                <a href="telaUsuarios.html">Usuários</a>
            </div>
            <div class="card">
                <a href="telaItens.html">Itens</a>
            </div>
            <div class="card">
                <a href="telaCategorias.html">Categoria</a>
            </div>
            
        </div>
    </div>
</body>
</html>