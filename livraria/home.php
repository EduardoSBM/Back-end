<?php
// Conectar com o banco de dados
$connect = mysqli_connect('localhost', 'root', '', 'livraria');

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa Livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F4DBB3;
            color: #333;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .login-button, .car-button {
    background-color: #333;
    color: #F4DBB3;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-button:hover, .car-button:hover {
    background-color: #A0522D;
}

.button-container {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    gap: 20px; /* Distância entre os botões */
}
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }

        .filters-container {
            background-color: #D2B48C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .filters-container h1, .filters-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .filters-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .filters-container label {
            font-weight: bold;
            text-align: left;
        }

        .filters-container select, .filters-container input[type="number"], .filters-container .button {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .filters-container .button {
            background-color: #333;
            color: #F4DBB3;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filters-container .button:hover {
            background-color: #A0522D;
        }

        .results-container {
            background-color: #D2B48C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }

        .results-container h2 {
            margin-bottom: 20px;
        }

        #container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        #livro {
            background-color: #D2B48C;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200px;
            text-align: center;
        }

        .imagempd {
            width: 100px;
            height: 150px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .tituloPd {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btpd {
            background-color: #333;
            color: #F4DBB3;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btpd:hover {
            background-color: #A0522D;
        }
    </style>
</head>
<body> 

<div class="container">
    <div class="filters-container">
        <form name="formulario" method="post" action="home.php">
            <img src="logo.png" alt="Logo" class="mb-4" style="width: 150px;">
            <h1>Venda de Livros</h1>
            
            <h2>Pesquisa de livros por:</h2>
            <label for="autor">Autores:</label>
            <select name="autor" id="autor">
                <option value="" selected>Selecione...</option>
                <?php
                    $query = mysqli_query($connect, "SELECT codigo, nome FROM autor");
                    while ($autores = mysqli_fetch_array($query)) {
                        echo "<option value='{$autores['codigo']}'>{$autores['nome']}</option>";
                    }
                ?>
            </select>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="" selected>Selecione...</option>
                <?php
                    $query = mysqli_query($connect, "SELECT codigo, nome FROM categoria");
                    while ($categoria = mysqli_fetch_array($query)) {
                        echo "<option value='{$categoria['codigo']}'>{$categoria['nome']}</option>";
                    }
                ?>
            </select>

            <label for="classificacao">Classificação:</label>
            <select name="classificacao" id="classificacao">
                <option value="" selected>Selecione...</option>
                <?php
                    $query = mysqli_query($connect, "SELECT codigo, nome FROM classificacao");
                    while ($classificacao = mysqli_fetch_array($query)) {
                        echo "<option value='{$classificacao['codigo']}'>{$classificacao['nome']}</option>";
                    }
                ?>
            </select>
            
            <label for="valor_min">Preço Mínimo:</label>
            <input type="number" name="valor_min" id="valor_min" placeholder="Preço mínimo">

            <label for="valor_max">Preço Máximo:</label>
            <input type="number" name="valor_max" id="valor_max" placeholder="Preço máximo">
            
            <br>
            <input class="button" type="submit" name="pesquisar" value="Pesquisar">
        </form>
    </div>
    
    <div class="results-container">
    <div class="button-container">
    <button class="login-button" onclick="window.location.href='login.php'">Login</button>
    <button class="car-button" onclick="window.location.href='carrinho/tabela_carrinho.php'">Carrinho</button>
</div>
        <?php
            if (isset($_POST['pesquisar'])) {
                $valor_min = isset($_POST['valor_min']) && $_POST['valor_min'] !== '' ? $_POST['valor_min'] : 0;
                $valor_max = isset($_POST['valor_max']) && $_POST['valor_max'] !== '' ? $_POST['valor_max'] : PHP_INT_MAX;
                $autor = empty($_POST['autor']) ? 'null' : $_POST['autor'];
                $categoria = empty($_POST['categoria']) ? 'null' : $_POST['categoria'];
                $classificacao = empty($_POST['classificacao']) ? 'null' : $_POST['classificacao'];

                $sql_livro = "SELECT livro.titulo, livro.ano, livro.edicao, livro.valor, livro.fotocapa
                              FROM livro
                              INNER JOIN autor ON livro.codautor = autor.codigo
                              INNER JOIN categoria ON livro.codcategoria = categoria.codigo
                              INNER JOIN classificacao ON livro.codclassificacao = classificacao.codigo
                              WHERE livro.valor BETWEEN $valor_min AND $valor_max";

                if ($autor != 'null') {
                    $sql_livro .= " AND autor.codigo = $autor";
                }
                if ($categoria != 'null') {
                    $sql_livro .= " AND categoria.codigo = $categoria";
                }
                if ($classificacao != 'null') {
                    $sql_livro .= " AND classificacao.codigo = $classificacao";
                }

                $seleciona_livro = mysqli_query($connect, $sql_livro);

                if (!$seleciona_livro || mysqli_num_rows($seleciona_livro) == 0) {
                    echo '<h2>Desculpe, mas sua busca não retornou resultados...</h2>';
                } else {
                    echo "<h2>Resultado da pesquisa de livros:</h2>";
                    echo "<div id='container'>";
                    while ($resultado = mysqli_fetch_array($seleciona_livro)) {
                        echo "<div id='livro'>
                                <img class='imagempd' src='livro/fotos/{$resultado['fotocapa']}' alt=''>
                                <p class='tituloPd'>{$resultado['titulo']}</p>
                                <p>R$ " . number_format($resultado['valor'], 2) . "</p>
                                <button class='btpd'>Adicionar ao carrinho</button>
                              </div>";
                    }
                    echo "</div>";
                }
            }
        ?>
    </div>
</div>

</body>
</html>
