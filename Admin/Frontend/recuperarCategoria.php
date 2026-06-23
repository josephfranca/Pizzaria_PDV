<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Categorias Desativadas</title>
    <link rel="stylesheet" href="../Frontend/Assets/CSS/recuperarCategoria.css">
</head>

<body>
    <div class="tabela-painel">
        <div class="tabela-header">
            <h1>Recuperar Categoria</h1>
            <p class="subtitulo">Selecione as categorias que deseja reativar no sistema</p>
        </div>

        <form action="../Backend/reativarCategoria.php" method="post" class="formulario-tabela">
            <div class="tabela-conteudo">
                <table class="tabela-dados">
                    <thead>
                        <tr>
                            <th class="col-selecionar">Selecionar</th>
                            <th class="col-nome">Nome Categoria</th>
                            <th class="col-status">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="celular=checkbox">
                                <input type="checkbox" name="categoria_ids[]" value="1" id="cat_1">
                            </td>
                            <td><label for="cat_1" class="label-linha">Pizzas Doces</label></td>
                            <td><span class="status-badge">Desativado</span></td>
                        </tr>
                        <tr>
                            <td class="celula-checkbox">
                                <input type="checkbox" name="categorias_ids[]" value="4" id="cat_4">
                            </td>
                            <td><label for="cat_4" class="label-linha">Bebidas Alcoólicas</label></td>
                            <td><span class="status-badge">Desativado</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tabela-botoes">
                <a href="telaCategorias.html" class="btn-voltar">Voltar</a>
                <button type="submit" class="btn-reativar">Reativar</button>
            </div>
        </form>
    </div>
</body>

</html>