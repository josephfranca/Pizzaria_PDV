<?php
session_start();

// Trava de segurança no topo da tela do adm

if(!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin'){
    header("Location: index.php?erro=acesso_negado");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Categoria</title>
    <link rel="stylesheet" href="../Frontend/Assets/CSS/criarCategoria.css">
</head>
<body>
    <div class="formulario-painel">
        <div class="formulario-header">
            <h1>Adicionar Categoria</h1>
        </div>

        <form action="../Backend/salvarCategoria.php" method="post" class="formulario-corpo">
            <div class="campo-grupo">
        <label for="nome_categoria">Nome da Categoria:</label>
        <input type="text" id="nome_categoria" name="nome_categoria" placeholder="Ex: Pizzas Salgadas" required>
    </div>

    <div class="campo-grupo">
        <label for="status_categoria">Status:</label>
        <select id="status_categoria" name="status_categoria" required>
            <option value="1" selected>Ativo</option>
            <option value="0">Inativo</option>
        </select>
    </div>

    <button type="submit" class="btn-salvar">Cadastrar Categoria</button>
   
    <div class="formulario-rodape">
                <a href="telaCategorias.html" class="btn-voltar">Voltar</a>
            </div>
</form>
        </form>
    </div>
    <!--Script de feedback pro usuário--> 

    <?php if(isset($_GET['status'])): ?>
        <script>
            const status = "<?php echo htmlspecialchars($_GET['status']); ?>";

            if (status === 'sucesso') {
                alert('Categoria cadastrada com sucesso!');
            } else if (status === 'campo_vazio') {
                alert('Por favor, informe o nome da categoria.');
            } else if (status === 'ja_existe') {
                alert('Já existe uma categoria cadastrada com esse nome!');
            } else if (status === 'erro_sistema') {
                alert('Ocorreu um erro ao salvar no banco de dados. Tente novamente.');
            }
        </script>
        <?php endif; ?>
</body>
</html>