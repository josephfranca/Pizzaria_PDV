<?php
 session_start();
require_once'conexao.php';

//Proteção para apenas os usuários do tipo Admin poderem cadastrar categorias

if(!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin'){
    header("Location: ../Frontend/index.php?erro=acesso_negado");
    exit;
}

if ($_SERVER['request_method'] === 'POST'){
    //Capturando o nome da categoria enviado pelo formulário
    $nomeCategoria = trim($_POST['nome_categoria'] ?? '');

    //Validação para que não seja aceito nome vazio

    if(empty($nomeCategoria)){
        header("Location: ../Frontend/criarCategoria.php?status=campus_vazio");
        exit;
    }

    try{
        //verifica se já existe uma categoria com o mesmo nome
        $stmtChecar = $pdo->prepare("SELECT id_categoria FROM categorias WHERE nome = :nome");
        $stmtChecar->execute([':nome' => $nomeCategoria]);

        if($stmtChecar->rowCount() > 0){
            header("Location: ../Frontend/criarCategoria.php?status=ja_existe");
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO categorias (nome, ativo) VALUES (:nome, 1) ");
        $stmt->execute([':nome' => $nomeCategoria]);

        //Caso cadastre certinho
        header("Location: ../Frontend/criarCategoria.php?status=sucesso");
        exit;
    } catch (\PDOException $e){
        //Erro no banco
        header("Location: ../Frontend/criarCategoria.php?status=erro_sistema");
        exit;
    }

}else {
    //Caso algum engraçadinho tente acessar direto pela url sem enviar o formulário

    header("Location: ../Frontend/criarCategoria.php");
    exit;
}

?>