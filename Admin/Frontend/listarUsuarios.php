<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuários</title>
    <link rel="stylesheet" href="Assets/CSS/listarUsuarios.css">
</head>
<body>
  <div class="tabela-painel">
        <div class="tabela-header">
            <h1>Usuários Cadastrados</h1>
        </div>

        <div class="tabela-conteudo">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nome de Usuário</th>
                        <th>Tipo de Conta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Administrador do Sistema</td>
                        <td>admin</td>
                        <td><span class="tag-tipo adm">Administrador</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João da Silva</td>
                        <td>joao.caixa</td>
                        <td><span class="tag-tipo atendente">Atendente</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Maria Souza</td>
                        <td>maria.pdv</td>
                        <td><span class="tag-tipo atendente">Atendente</span></td>
                    </tr>
                     <tr>
                        <td>4</td>
                        <td>José França</td>
                        <td>jose.pdv</td>
                        <td><span class="tag-tipo atendente">Atendente</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tabela-rodape">
            <a href="telaUsuarios.html" class="btn-voltar">Voltar</a>
        </div>
    </div>
</body>
</html>