<?php
//iniciando a sessão para guardar os dados do usuario logado

session_start();

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    //Captura os dados que vem do formulario
    $nomeUsuario = trim($_POST['nomeUsuario'] ?? '');
    $senha = trim($_POST['senha']?? '');

    //Validação para caso esteja algo vazio
    if (empty($nomeUsuario) || empty($senha)) {
        header("Location: ../login.html?erro=campos_vazios");
        exit;
    }

    try {
        //Busca o usuario no banco pelo 'nomeUsuario'
        $stmt = $pdo->prepare("SELECT id_usuario, nome, nomeUsuario, senha, tipo FROM usuarios WHERE nomeUsuario = :nomeUsuario");
        $stmt->execute([':nomeUsuario' => $nomeUsuario]);
        $usuario = $stmt->fetch();

        //Verificando se a senha e o usuario ta certo
        if ($usuario && $usuario['senha'] === $senha) {
            
            // Login com sucesso! Guardamos as informações essenciais na Sessão
            $_SESSION['id_usuario']   = $usuario['id_usuario'];
            $_SESSION['nome']         = $usuario['nome'];
            $_SESSION['nome_usuario'] = $usuario['nomeUsuario'];
            $_SESSION['tipo_usuario'] = $usuario['tipo']; // Aqui guarda 'admin' ou 'atendente'

            // A MÁGICA DO REDIRECIONAMENTO POR TIPO DE USUÁRIO:
            if ($usuario['tipo'] === 'admin') {
                // Se for Admin, vai para a tela de administração
                header("Location: ../Frontend/telaADM.php"); 
                exit;
            } else if ($usuario['tipo'] === 'atendente') {
                // Se for Atendente, vai direto para a tela do Caixa
                header("Location: ../Frontend/telaCaixa.php"); 
                exit;
            } else {
                // Tipo desconhecido (segurança)
                header("Location: ../login.html?erro=tipo_invalido");
                exit;
            }

        } else {
            // Usuário ou senha incorretos
            header("Location: ../login.html?erro=dados_incorretos");
            exit;
        } 
        
    } catch(\PDOException $e) {
        header("Location: ../login.html?erro=erro_sistema");
        exit;
    }
    
}else{
    header("Location: ../login.html");
    exit;
}

?>