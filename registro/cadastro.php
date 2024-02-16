<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro e Login</title>
    <style>

    </style>
</head>

<body>
    <nav class="nav-bar">
        <div class="bar">
            <h1>BelleAura</h1>
            <ul class="menu-ul">
                <a href="Fim-de-ano.html">
                    <li>
                        Fim de ano!
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
                            <a href="../Acessorios/todos/acessoriosTodos.php">
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


        </div>
    </nav>
    <div class="main-container">
        <div id="container">
            <div id="cadastroForm">
                <div class="form-cadas">
                  
                    <h1>Cadastre-se na Nossa Loja</h1>
                    <form action="processar_cadastro.php" method="post" onsubmit="return validarCadastro()">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome">
                        <div id="erroNome" class="mensagem-erro"></div>
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" name="email" required>
                        <div id="erroEmail" class="mensagem-erro"></div>

                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>


                        <label for="confirmarSenha">Confirmar Senha:</label>
                        <input type="password" id="confirmarSenha" name="confirmarSenha" required>
                        <div id="erroSenha" class="mensagem-erro"></div>
                        <!-- Adicione mais campos conforme necessário (endereço, telefone, etc.) -->

                        <button type="submit" name="submit">Cadastrar</button>
                    </form>
                </div>

                <div class="form-entrar">
                    <img src="../img/logobeleaura.png" alt="Imagem 1">
                    <p class="mensagem" onclick="alternarForm('login')" id="entrar">Já possui conta? Entrar</p>
                </div>
            </div>

            <div id="loginForm">
                <div class="form-cadas">
                    <h1>Entre na Sua Conta</h1>
                    <form action="processar_login.php" method="post" onsubmit="return validarLogin()">
                        <label for="email_login">E-mail:</label>
                        <input type="email_login" id="email_login" name="email_login" required>

                        <label for="senha_login">Senha:</label>
                        <input type="password" id="senha_login" name="senha_login" required>

                        <button type="submit" name="submit">Entrar</button>
                    </form>
                </div>

                <div class="form-entrar">
                    <img src="../img/logobeleaura.png" alt="Imagem 2">
                    <p class="mensagem" onclick="alternarForm('cadastro')">Cadastre-se</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/cadastro.js"></script>
</body>

</html>