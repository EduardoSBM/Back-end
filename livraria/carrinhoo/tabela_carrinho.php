<?php
// Conectar com o banco de dados
$connect = mysqli_connect('localhost', 'root', '', 'livraria');

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o botão "Adicionar Livro" foi clicado
    if (isset($_POST['adicionar'])) {
        // Lógica para adicionar um novo livro ao carrinho aqui
        // Você pode manipular os dados recebidos do formulário e executar as operações necessárias no banco de dados
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa Vendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F4DBB3;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #D2B48C;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            height: 50%;
            width: 80%;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #333;
            color: #F4DBB3;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px 0;
        }

        .btn:hover {
            background-color: #A0522D;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group input[type="number"] {
            margin-bottom: 10px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #333;
            width: 100%;
            padding: 5px;
        }

        .form-group label {
            margin-top: 10px;
            color: #333;
        }

        .row {
            margin-bottom: 20px;
        }

        /* Estilo do select */
        select {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #333;
            appearance: none; /* Remover estilo padrão do sistema */
            -webkit-appearance: none; /* Para compatibilidade com o Safari */
            background-color: white;
        }
    </style>
</head>
<body onload="setDateTime()">
    <div class="container">
        <h2 align=''>Carrinho</h2>
        <form class="form-group well" action="adicionar_carrinho.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" required placeholder="Código" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="data">Data</label>
                    <input type="date" id="data" name="data" required placeholder="Data" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" name="hora" required placeholder="Hora" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="nomecliente">Nome do Cliente</label>
                    <input type="text" id="nomecliente" name="nomecliente" required placeholder="Nome do Cliente" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="endcliente">Endereço do Cliente</label>
                    <input type="text" id="endcliente" name="endcliente" required placeholder="Endereço do Cliente" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="valortotal">Valor Total</label>
                    <input type="number" id="valortotal" name="valortotal" required placeholder="Valor Total" class="form-control" readonly>
                </div>
                <div class="col-md-2">
                    <label for="valordesconto">Desconto</label>
                    <input type="number" id="valordesconto" name="valordesconto" required placeholder="Desconto" class="form-control" onchange="calcularTotalGeral();">
                </div>
            </div>
            <div class="row">
                <table class="table table-striped" id="livrosTable">
                    <tr>
                        <th>Código</th>
                        <th>Título do Livro</th>
                        <th>Quantidade</th>
                        <th>Preço R$</th>
                        <th>Total</th>
                    </tr>
                    <!-- Aqui serão adicionadas as linhas dos livros dinamicamente -->
                </table>
            </div>
            <!-- Botão para adicionar um novo livro -->
            <button type="button" class="btn" onclick="adicionarLivro()">Adicionar Livro</button>
            <!-- Botão para finalizar a compra -->
            <button type="submit" class="btn" name="adicionar">Finalizar compra</button>
        </form>
    </div>

    <!-- Bibliotecas requeridas -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        // Função para calcular e exibir o total geral
        function calcularTotalGeral() {
            var totalGeral = 0;
            var desconto = parseFloat($('#valordesconto').val()) || 0;

            $('#livrosTable tr').each(function () {
                var quantidade = $(this).find('input[name="quantidade[]"]').val();
                var preco = $(this).find('input[name="valor[]"]').val();
                var total = (parseInt(quantidade) * parseFloat(preco)) || 0;
                totalGeral += total;
                $(this).find('input[name="total[]"]').val(total.toFixed(2));
            });

            totalGeral -= desconto;
            $('#totalGeral').text(totalGeral.toFixed(2));
            $('#valortotal').val(totalGeral.toFixed(2));
        }

        // Função para adicionar um novo livro à tabela
        function adicionarLivro() {
            // Limitar a adição de livros a um máximo de 5
            var rowCount = document.getElementById('livrosTable').getElementsByTagName('tr').length;
            if (rowCount >= 6) {
                alert('Você pode adicionar no máximo 5 livros.');
                return;
            }

            var newRow = "<tr><td><input type='text' id='codigo' name='codigo[]' size='1' required placeholder='Código' class='form-control'></td><td><select id='livro' onchange='updatePrice(this); calcularTotalGeral();'><option value='' selected>Selecione...</option><?php $query = mysqli_query($connect, 'SELECT codigo, titulo, valor FROM livro');while ($livro = mysqli_fetch_array($query)) {echo '<option value=' . $livro['codigo'] . ' data-price=' . $livro['valor'] . '>' . $livro['titulo'] . '</option>';}?></select></td><td><input type='text' id='quantidade' name='quantidade[]' size='1' required placeholder='Quantidade' class='form-control' onchange='calcularTotalGeral();'></td><td><input type='text' id='valor' name='valor[]' size='1' required placeholder='Preço' class='form-control' readonly></td><td><input type='text' id='total' name='total[]' size='1' required placeholder='Total' class='form-control' readonly></td></tr>";
            $('#livrosTable').append(newRow);
        }

        // Função para atualizar o preço quando um livro é selecionado
        function updatePrice(select) {
            var valorInput = $(select).parent().next().next().find('input[type="text"]');
            var selectedOption = select.options[select.selectedIndex];
            var valor = selectedOption.getAttribute('data-price');
            valorInput.val(valor);
            calcularTotalGeral();
        }
    </script>

</body>
</html>