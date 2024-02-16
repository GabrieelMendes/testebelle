<?php
require_once 'config.php';
session_start();

// Verifique se a sessão está definida
if (isset($_SESSION['idusuarios'])) {
    $iduser = $_SESSION['idusuarios'];

    $query = "SELECT nome FROM usuarios WHERE idusuarios = '$iduser'";

    $result = mysqli_query($conexao, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Nome do usuário obtido da consulta
        $nomeDoUsuario = $row['nome'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelleAura</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="alert" id="alertBox">
        <h3>Entre em contato no whatsapp</h3>
        <button onclick="fecharDiv()">x</button>
    </div>
    <nav class="nav-bar">
        <div class="bar">
            <h1>BelleAura</h1>
            <ul class="menu-ul">
                <a href="Fim-de-ano.html">
                    <li>
                        Fim de ano
                    </li>
                </a>
                <a href="Fim-de-ano.html">
                    <li>
                        Novidades
                    </li>
                </a>
                <a href="Fim-de-ano.html">
                    <li class="acer">
                        Acessórios
                        <ul class="drop-box">
                            <a href="Acessorios/todos/acessoriosTodos.php">
                                <li>
                                    Todos
                                </li>
                            </a>
                            <a href="acessoriosMasculinos.html">
                                <li>
                                    Masculínos
                                </li>
                            </a>
                            <a href="acessoriosFemininos.html">
                                <li>
                                    Feminínos
                                </li>
                            </a>
                        </ul>
                    </li>
                </a>
                <a href="Fim-de-ano.html">
                    <li>
                        Ofertas
                    </li>
                </a>
            </ul>
            <div>
                <ul class="login-cadastre">
                    <?php
                    // Verifique se a sessão 'idusuarios' está definida
                    if (isset($_SESSION['idusuarios'])) {
                        // Sessão está ativa, exiba o nome do usuário
                        echo '<li class="nomeuser"> ' . $nomeDoUsuario. '</li>';
                        echo '<a href="sair.php"><li>Sair</li></a>';
                    } else {
                        // Sessão não está ativa, exiba os links de login e cadastro
                        echo '<a href="registro/cadastro.php#entrar"><li>Login</li></a>';
                        echo '<a href="registro/cadastro.php"><li>Cadastre-se</li></a>';
                    }
                    ?>
                </ul>
            </div>

        </div>
    </nav>

    <div class="main-img">
        <img src="img/pratas.png">
    </div>
    <div class="acer-por-preco">
        <h2>Acessórios por faixa de preço</h2>
        <div class="por-preco">
            <ul>
                <a href="#">
                    <li>
                        Até R$50,00
                    </li>
                </a>
                <a href="#">
                    <li>
                        Até R$100,00
                    </li>
                </a>
                <a href="#">
                    <li>
                        Até R$150,00
                    </li>
                    <a href="#">
                        <li>
                            Até R$200,00
                        </li>
                    </a>
            </ul>
        </div>
    </div>
    <hr>

    <div class="main-card-acer">
        <h1>Mais vendidos</h1>
        <div class="card-acer">

            <div class="card-img">
                <img src="img/aceser-fem.jpg" alt="acessório ostra">
                <h3>Corrente prata 925 - C/pingente Ostra</h3>
                <p>R$119,99</p>
            </div>
            <div class="card-img">
                <img src="img/masc-acer.webp" alt="acessório ostra">
                <h3>Corrente prata 925</h3>
                <p>R$129,99</p>
            </div>
            <div class="card-img">
                <img src="img/masc.jpg" alt="acessório ostra">
                <h3>Corrente prata 925 - C/pingente cruz</h3>
                <p>R$139,99</p>
            </div>
        </div>
        <a href="AdicionarProduto/adicionar.html"><button type="button" class="btn-produto">Mais produtos</button></a>
    </div>
    <?php
    // index.php

    $mensagem = isset($_GET['mensagem']) ? urldecode($_GET['mensagem']) : '';



    if ($mensagem) {
        echo '<div id="modal" class="modal">';
        echo '    <div class="modal-content">';
        echo '        <span class="fechar" onclick="fecharModal()">&times;</span>';
        echo '        <div id="mensagemModal">' . $mensagem . '</div>';
        echo '    </div>';
        echo '</div>';
    }

    // ... Restante do seu código HTML ...
    ?>

    <!-- Seu script JavaScript -->
    <script>
        // Função para abrir o modal com mensagem
        function abrirModal(mensagem) {
            const modal = document.getElementById('modal');
            const mensagemModal = document.getElementById('mensagemModal');

            mensagemModal.innerHTML = mensagem;
            modal.style.display = 'flex';
        }

        // Função para fechar o modal
        function fecharModal() {
            const modal = document.getElementById('modal');
            modal.style.display = 'none';
        }


        // Verifique se há uma mensagem na URL e exiba o modal
        const mensagemURL = new URLSearchParams(window.location.search).get('mensagem');
        if (mensagemURL) {
            abrirModal(mensagemURL);
        }
    </script>
    <script>
    function fecharDiv() {
        var alertBox = document.getElementById('alertBox');
        alertBox.style.display = 'none';
    }
</script>
</body>

</html>