<?php
//conectar com bando dados
$connect = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('loja');
?>

<HTML>

<HEAD>
    <TITLE> Home</TITLE>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
</HEAD>

<body>
    <form name="formulario" method="post" action="indexx.php">

        <div class="pique">
            <img class="ft1" src="https://www.freeiconspng.com/uploads/running-shoe-icon-31.png">
            <a href="Login.php"><img class="ftlogin"
                    src="https://www.iconpacks.net/icons/2/free-user-login-icon-3057-thumb.png"></a>
        </div>
        <div class="linha1">
            <ul>
                <li>
                    <select name="categoria" class="seleee">
                        <option value="" selected="selected">Categoria</option>

                        <?php
                        $query = mysql_query("SELECT codigo, descricao FROM categoria");
                        while ($categoria = mysql_fetch_array($query)) { ?>
                            <option value="<?php echo $categoria['codigo'] ?>">
                                <?php echo $categoria['descricao'] ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </li>

                <li>
                    <select name="classificacao" class="seleee">
                        <option value="" selected="selected">Classificação</option>

                        <?php
                        $query = mysql_query("SELECT codigo, nome FROM classificacao");
                        while ($classificacao = mysql_fetch_array($query)) { ?>
                            <option value="<?php echo $classificacao['codigo'] ?>">
                                <?php echo $classificacao['nome'] ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </li>

                <li>

                    <select name="marca" class="seleee">
                        <option value="" selected="selected">Marcas</option>

                        <?php
                        $query = mysql_query("SELECT codigo, nome FROM marca");
                        while ($marcas = mysql_fetch_array($query)) { ?>
                            <option value="<?php echo $marcas['codigo'] ?>">
                                <?php echo $marcas['nome'] ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </li>

                <li>
                    <select name="tamanho" class='seleee'>
                        <option value="" selected="selected">Tamanho</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="40">40</option>
                        <option value="42">42</option>
                    </select>
                </li>

                <li>
                    <select name="preco" class='seleee'>
                        <option value="" selected="selected">Preco</option>
                        <option value="100 and 200">100 a 200</option>
                        <option value="200 and 300">200 a 300</option>
                        <option value="300 and 400">300 a 400</option>
                        <option value="400 and 500">400 a 500</option>
                        <option value="500 and 600">500 a 600</option>
                        <option value="600 and 700">600 a 700</option>
                        <option value="700 and 800">700 a 800</option>
                    </select>

                </li>

                <li>
                    <a>
                        <input class="seleee" type="submit" name="pesquisar" value="Pesquisar"></a>
                </li>
            </ul>

        </div>


    </form>
    <div class="corpo">
        <?php


        if (isset($_POST['pesquisar'])) {

            //------- pesquisa marcas
            $sql_marcas = "SELECT * FROM marca ";
            $pega_marcas = mysql_query($sql_marcas);

            //------- pesquisa categoria
            $sql_categorias = "SELECT * FROM categoria ";
            $pega_categorias = mysql_query($sql_categorias);

            $sql_classificacao = "SELECT * FROM classificacao ";
            $pega_classificacao = mysql_query($sql_classificacao);


            //-------- verificar as op  es selecionadas ou n o
            $classificacao = (empty($_POST['classificacao'])) ? 'null' : $_POST['classificacao'];
            $marca = (empty($_POST['marca'])) ? 'null' : $_POST['marca'];
            $categoria = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];
            $tamanho = (empty($_POST['tamanho'])) ? 'null' : $_POST['tamanho'];
            $preco = (empty($_POST['preco'])) ? 'null' : $_POST['preco'];


            if ($marca <> 'null') {
                $marcasql = "and marca.codigo = $marca";
            } else {
                $marcasql = '';
            }
            if ($classificacao <> 'null') {
                $classificacaosql = "and classificacao.codigo = $classificacao";
            } else {
                $classificacaosql = '';
            }
            if ($categoria <> 'null') {
                $categoriasql = "and categoria.codigo = $categoria";
            } 
            else {
                $categoriasql = '';
            }
            if ($tamanho <> 'null') {
                $tamanhosql = "and produto.tamanho = $tamanho";
            }
            else {
                $tamanhosql = '';
            }
            if ($preco <> 'null'){
                $precosql = "and produto.preco between $preco";
            }
            else {
                $precosql = '';
            }
            $sql_produtos = "SELECT produto.descricao, classificacao.nome, produto.cor, produto.tamanho, produto.preco, produto.foto1, produto.foto2, produto.foto3
                        FROM classificacao, produto, marca, categoria
                        WHERE produto.codmarca = marca.codigo
                        and produto.codclassificacao = classificacao.codigo
                        and produto.codcategoria = categoria.codigo
                        $marcasql $classificacaosql $categoriasql $tamanhosql $precosql
                        ";
            $seleciona_produtos = mysql_query($sql_produtos);



            //--------mostrar os veiculos pesquisados
            if (mysql_num_rows($seleciona_produtos) == FALSE) {
                echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
            } else {
                echo "Resultado da pesquisa : <br><br>";
                echo "<ul class='resultado'>";
                while ($resultado = mysql_fetch_array($seleciona_produtos)) {
                    echo "<tr><td>Classificação:   " . utf8_encode($resultado['nome']) . "</td><br>
                  <td>Cor:   " . utf8_encode($resultado['cor']) . "</td><br>
                  <td>Descrição   " . utf8_encode($resultado['descricao']) . "</td><br>
                  <td>Tamanho:   " . ($resultado['tamanho']) . "</td><br>
                  <td>Preço:   R$" . ($resultado['preco']) . "</td></tr></ul><br><br><br><br><br>";
                    echo '<img class="foto1" src="fotos/' . $resultado['foto1'] . '"height="200" width="300"  />' . " ";
                    echo '<img src="fotos/' . $resultado['foto2'] . '"height="200" width="300" />' . " ";
                    echo '<img src="fotos/' . $resultado['foto3'] . '"height="200" width="300" />' . "<br><br><br> ";
                }
            }
        }
        ?>
    </div>


</body>

</HTML>