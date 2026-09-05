<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../Frontend/index.php?erro=acesso_negado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeCategoria   = trim($_POST['nome_categoria'] ?? '');
    $statusCategoria = isset($_POST['status_categoria']) ? (int)$_POST['status_categoria'] : 1;

    if (empty($nomeCategoria)) {
        header("Location: ../Frontend/criarCategoria.php?status=campo_vazio");
        exit;
    }

    try {
        // Checa duplicidade usando nomeCategoria
        $stmtChecar = $pdo->prepare("SELECT id_categoria FROM categorias WHERE nomeCategoria = :nome");
        $stmtChecar->execute([':nome' => $nomeCategoria]);

        if ($stmtChecar->rowCount() > 0) {
            header("Location: ../Frontend/criarCategoria.php?status=ja_existe");
            exit;
        }

        // Insere com o nome de coluna exato do seu MySQL
        $stmt = $pdo->prepare("INSERT INTO categorias (nomeCategoria, statusCategoria) VALUES (:nome, :status)");
        $stmt->execute([
            ':nome'   => $nomeCategoria,
            ':status' => $statusCategoria
        ]);

        header("Location: ../Frontend/listarCategorias.php?status=sucesso");
        exit;

    } catch (\PDOException $e) {
        die("ERRO AO SALVAR NO BANCO: " . $e->getMessage());
    }
} else {
    header("Location: ../Frontend/criarCategoria.php");
    exit;
}
?>