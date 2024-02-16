<?php
session_start();
include_once('../config.php');

if (isset($_POST['submit'])) {
    // Obtenha os valores dos campos do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Hash da senha usando a função password_hash
    $hash_senha = password_hash($senha, PASSWORD_DEFAULT);

    // Faça a inserção no banco de dados usando o hash da senha
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha) 
        VALUES('$nome', '$email', '$hash_senha')");

    if ($result) {
        // Consulta SQL para selecionar o usuário recém-cadastrado
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conexao, $query);

        if ($result && $row = mysqli_fetch_assoc($result)) {
             {
                // Credenciais válidas - inicie a sessão e redirecione para a página inicial
                $_SESSION['idusuarios'] = $row['idusuarios'];
                $mensagem = 'Seja bem-vindo a BelleAura, ' . $nome . '.';

                // Redirecione para a página inicial com a mensagem
                header('Location: ../index.php?mensagem=' . urlencode($mensagem));
                exit();
            }
        } else {
            echo "Erro ao selecionar o usuário recém-cadastrado.";
        }
    } else {
        echo "Erro ao cadastrar. Por favor, tente novamente.";
    }
}
?>
