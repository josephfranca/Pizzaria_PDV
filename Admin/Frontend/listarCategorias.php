<?php
session_start();
require_once '../Backend/conexao.php';

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php?erro=acesso_negado");
    exit;
}

try {
    $stmt = $pdo->query("SELECT id_categoria, nomeCategoria, statusCategoria FROM categorias ORDER BY id_categoria DESC");
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    die("ERRO AO BUSCAR CATEGORIAS: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias - PDV</title>
    <link rel="stylesheet" href="Assets/CSS/listarCategorias.css">
</head>
<body>

    <div class="tabela-painel">
        <div class="tabela-header">
            <h1>Categorias Cadastradas</h1>
            <p class="subtitulo">Gerenciamento dos setores do cardápio</p>
        </div>

        <div style="margin-bottom: 20px; text-align: right;">
            <a href="criarCategoria.php" class="btn-novo">+ Nova Categoria</a>
        </div>

        <div class="tabela-conteudo">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Categoria</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categorias)): ?>
                        <?php foreach ($categorias as $cat): ?>
                            <?php 
                                $valStatus = strtolower(trim($cat['statusCategoria']));
                                $isAtivo = ($valStatus === '1' || $valStatus === 'ativo' || $valStatus == 1);
                            ?>
                            <tr>
                                <td><?php echo $cat['id_categoria']; ?></td>
                                <td><?php echo htmlspecialchars($cat['nomeCategoria']); ?></td>
                                <td>
                                    <span class="badge <?php echo $isAtivo ? 'status-ativo' : 'status-inativo'; ?>">
                                        <?php echo $isAtivo ? 'Ativo' : 'Inativo'; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Nenhuma categoria encontrada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="tabela-rodape">
            <a href="telaADM.php" class="btn-voltar">← Voltar ao Painel</a>
        </div>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'sucesso'): ?>
        <script>
            alert('Categoria cadastrada com sucesso!');
        </script>
    <?php endif; ?>

</body>
</html>