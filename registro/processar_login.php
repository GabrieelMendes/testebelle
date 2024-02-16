<?php
session_start();

include_once('../config.php');

if (isset($_POST['email_login']) && isset($_POST['senha_login'])) {
    $email = $_POST['email_login'];
    $senha = $_POST['senha_login'];

    // Consulta ao banco de dados para obter a senha armazenada
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexao, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Verifique se a senha fornecida pelo usuário corresponde à hash armazenada no banco de dados
        if (password_verify($senha, $row['senha'])) {
            // Credenciais válidas - inicie a sessão e redirecione
            $_SESSION['idusuarios'] = $row['idusuarios'];
            $mensagem = 'Seja bem-vindo a BelleAura, ' . $row['nome'] . '.';
            header('Location: ../index.php?mensagem=' . urlencode($mensagem));

            exit();
        } else {
            echo "Senha incorreta. Por favor, tente novamente.";
        }
    } else {
        echo "Usuário não encontrado. Por favor, verifique o e-mail.";
    }
}
?>

