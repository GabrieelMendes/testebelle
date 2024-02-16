<?php
if (isset($_POST['submit'])) {
    include_once('../config.php');

    $nome_produto = $_POST['nome-produto'];
    $valor_produto = $_POST['valor-produto'];
    $link_produto = $_POST['link-produto']; // Novo campo para o link

    // Processar o upload da foto
    $targetDir = "fotos.produtos/";
    $foto_nome = basename($_FILES["foto-produto"]["name"]); // Obtém apenas o nome do arquivo

    if (move_uploaded_file($_FILES["foto-produto"]["tmp_name"], $targetDir . $foto_nome)) {
        // Upload da foto bem-sucedido, agora podemos inserir no banco de dados
        $result = mysqli_query($conexao, "INSERT INTO acessorios(nome_acessorio, valor_acessorio, foto_acessorio, link_pagamento) 
        VALUES('$nome_produto','$valor_produto','$foto_nome','$link_produto')");

        if ($result) {
            echo "<script>alert('Produto adicionado com sucesso! ');";
            echo "window.location.href = 'adicionar.html';</script>";
        } else {
            
            echo mysqli_error($conexao);

        }
    } else {
        echo 'Erro ao fazer upload da foto.';
    }
}
?>

