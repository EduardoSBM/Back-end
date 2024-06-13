<?php
// Conectar com o banco de dados usando mysqli
$connect = mysqli_connect('localhost', 'root', '', 'livraria');

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegando as variáveis do formulário
    $codigo = $_POST['codigo'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $nomecliente = $_POST['nomecliente'];
    $endcliente = $_POST['endcliente'];
    $valortotal = $_POST['valortotal'];
    $valordesconto = $_POST['valordesconto'];

    // Inserir os dados na tabela 'vendas'
    $sql = "INSERT INTO vendas (codigo, data, hora, nomecliente, endcliente, valortotal, valordesconto) 
            VALUES ('$codigo', '$data', '$hora', '$nomecliente', '$endcliente', '$valortotal', '$valordesconto')";
    $resultado = mysqli_query($connect, $sql);

    // Verificar se a inserção na tabela 'vendas' foi bem-sucedida
    if ($resultado) {
        // Pegando o ID da venda recém-inserida
        $codvenda = mysqli_insert_id($connect);

        // Pegando as variáveis dos livros
        $codlivro = $_POST['codigo'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['valor'];

        // Inserir os dados na tabela 'livrosvendas'
        for ($i = 0; $i < count($codlivro); $i++) {
            $codigoLivro = $codlivro[$i];
            $quantidadeLivro = $quantidade[$i];
            $precoLivro = $preco[$i];

            $sqlLivro = "INSERT INTO livrosvendas (codigo, codvenda, codlivro, quantidade, preco) 
                         VALUES ('$codigo', '$codvenda', '$codigoLivro', '$quantidadeLivro', '$precoLivro')";
            $resultadoLivro = mysqli_query($connect, $sqlLivro);

            // Verificar se a inserção na tabela 'livrosvendas' foi bem-sucedida
            if (!$resultadoLivro) {
                die("Erro ao inserir livro: " . mysqli_error($connect));
            }
        }

        echo "<script>
            alert('Adicionado com Sucesso!');
            location.href='tabela_carrinho.php';
        </script>";
    } else {
        die("Erro ao inserir venda: " . mysqli_error($connect));
    }
}
?>
