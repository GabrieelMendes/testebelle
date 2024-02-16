<!-- Adicione isso ao cabeçalho -->


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adicione isso ao cabeçalho -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/todosAcess.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Todos acessórios</title>
</head>

<body>
    <nav class="nav-bar">
        <div class="bar">
            <a href="../../index.php" style="text-decoration: none;">
                <h1>BelleAura</h1>
            </a>
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
            <div class="separarte-carrinho">
                <div id="cart-icon" onclick="toggleCart()">🛒
                    <div id="cart-counter">0</div>
                </div>


                <div id="favorites-icon" onclick="toggleFavorites">
                    <i class="far fa-heart"></i>
                    <div id="favorites-counter">0</div>
                </div>

            </div>
    </nav>

    <div class="caminhouser">
        <a href="../../index.php">Início</a> > <a href="../../index.html">Acessórios</a> > <a href="acessoriosTodos.php">Todos</a>
    </div>

    <div class="pagina-acessórios">
        <div class="acessórios-quais">
            <h1>Todos acessórios</h1>
            <div class="separete-filter">
            <p>Quantidade de produto:</p>
            <label for="meuSelect">Filtrar por:
            <select id="meuSelect" name="opcoes">
                <option value="opcao1">Selecione</option>
                <option value="opcao2">Menor preço</option>
                <option value="opcao3">Maior preço</option>
                <option value="opcao4">Ordem alfabética</option>
                <option value="opcao5">Novidades</option>
                <option value="opcao5">Mais populares</option>
            </select>
            </label>
        </div>
    </div>




    <div id="favorites-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="toggleFavorites()">&times;</span>
            <h2>Itens Favoritos</h2>
            <div id="favorites-list"></div>
        </div>
    </div>



    <div id="cart-modal">
        <button id="close-cart" onclick="toggleCart()">X</button>
        <h2>Carrinho de Compras</h2>
        <div id="cart-items"></div>
        <p id="total">Total: R$0,00</p>
        <button id="checkout-button" onclick="checkout()">Pagar</button>
        <a href="carrinho.html">Ver Carrinho</a>

    </div>
    </div>
    <?php
    // Inclua o arquivo de configuração
    include_once('../../config.php');

    // Consulta SQL para recuperar todos os produtos da tabela acessorios
    $sql = "SELECT idacessorios, nome_acessorio, valor_acessorio, foto_acessorio, link_pagamento FROM acessorios";
    $resultado = mysqli_query($conexao, $sql);

    echo "<div class='main-list-acessorios-center'>";
    echo "<div class='main-list-acessorios'>";

    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Atribui os dados a variáveis
            $id_acessorio = $row['idacessorios'];
            $nome_produto = $row['nome_acessorio'];
            $valor_produto = $row['valor_acessorio'];
            $caminho_completo = $row['foto_acessorio']; // Caminho completo do arquivo
            $link_pagamento = $row['link_pagamento'];

            // Obtém apenas o nome do arquivo a partir do caminho completo
            $foto_produto_nome = basename($caminho_completo);

            // Caminho completo para o arquivo de imagem
            $foto_produto = "../../AdicionarProduto/fotos.produtos/$foto_produto_nome";

            // Exibir os dados dentro de divs para cada produto
            echo "<div class='list-acessorios'>";
            echo " <div class='product'>";
            echo "<img src='$foto_produto' alt='Foto do Produto'>";
            echo "<h3>$nome_produto</h3>";
            echo "<p>R$$valor_produto</p>";
            echo "<a href='$link_pagamento'><button>Pagar</button></a>";
            echo "<button onclick='addToCart($id_acessorio, \"$nome_produto\", $valor_produto)'>Adicionar ao Carrinho</button>";
            echo "<button onclick='addToFavorites($id_acessorio)'><i class='far fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo 'Erro ao recuperar os dados do banco de dados.';
    }

    // Fim da div principal
    echo "</div>";
    echo "</div>";

    // Fecha a conexão
    mysqli_close($conexao);
    ?>


    <script src="js/carrinho.js"></script>
</body>

</html>