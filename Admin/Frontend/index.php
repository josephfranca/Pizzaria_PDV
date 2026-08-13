<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Pizzaria</title>
    <link rel="stylesheet" href="../Frontend/Assets/CSS/login.css">
</head>
<body>
    <div class="login-painel">
        <div class="login-header">
            <h1>Pizzaria do zézinho PDV</h1>
            <p>Seja bem vindo! Faça login para continuar</p>
        </div>

        <form action="../Backend/loginAction.php" method="post" class="login-corpo">
            <div class="campo-grupo">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="nomeUsuario" placeholder="Digite seu usuário">
            </div>

            <div class="campo-grupo">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>
        </form>
    </div>
    <!--Script de tratamento de erros de login-->
    <?php if (isset($_GET['erro'])): ?>
        <script>
            //Captura o erro passado na url
            const erro = "<?php echo htmlspecialchars($_GET['erro']); ?>";

            if(erro === 'campos_vazios'){
                alert('Por favor, preencha todos os campos!');
            } else if (erro === 'dados_incorretos'){
                alert('Usuário ou senha incorretos!');
            } else if (erro === 'tipo_invalido'){
                alert('Tipo de usuário não reconhecido!');
            }else if (erro === 'erro_sistema'){
                alert('Ocorreu um erro no sistema. Tente novamente mais tarde.')
            }
        </script>
        <?php endif; ?>
</body>
</html>