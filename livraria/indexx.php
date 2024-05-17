<?php
//conectar com bando dados
$connect = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('livraria');
?>

<HTML>

<HEAD>
  <TITLE> Home</TITLE>
  <link rel="stylesheet" href="index.css">
  <meta charset="UTF-8">
</HEAD>

<body>
  <form name="formulario" method="post" action="indexx.php">

    <div class="topo">
      <img  class="logo" src= "./ft/logo.png">
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

      //------- pesquisa autor
      $sql_autor = "SELECT * FROM autor ";
      $pega_autor = mysql_query($sql_autor);

      $sql_categoria = "SELECT * FROM categoria ";
      $pega_categoria = mysql_query($sql_categoria);

      $sql_classificacao = "SELECT * FROM classificacao ";
      $pega_classificacao = mysql_query($sql_classificacao);


      //-------- verificar as opcoes selecionadas ou nao
      $autor = (empty($_POST['autor'])) ? 'null' : $_POST['autor'];
      $categoria = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];
      $classificacao = (empty($_POST['classificacao'])) ? 'null' : $_POST['classificacao'];
      $preco_min = (isset($_POST['preco_min']) && $_POST['preco_min'] !== '') ? $_POST['preco_min'] : 0;
      $preco_max = (isset($_POST['preco_max']) && $_POST['preco_max'] !== '') ? $_POST['preco_max'] : PHP_INT_MAX;

      if (($autor <> 'null') and ($categoria == 'null') and ($classificacao == 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            WHERE livro.codautor = autor.codigo
                            AND livro.valor >= $preco_min
                            AND livro.valor <= $preco_max
                            and autor.codigo = $autor ";

        $seleciona_livro = mysql_query($sql_livro);

      }

      if (($autor == 'null') and ($categoria <> 'null') and ($classificacao == 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            WHERE livro.codcategoria = categoria.codigo
                            AND livro.valor >= $preco_min
                            AND livro.valor <= $preco_max
                            and categoria.codigo = $categoria ";

        $seleciona_livro = mysql_query($sql_livro);

      }

      if (($autor == 'null') and ($categoria == 'null') and ($classificacao <> 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                        FROM livro, autor, categoria, classificacao
                        where livro.codclassificacao = classificacao.codigo
                        AND livro.valor >= $preco_min
                        AND livro.valor <= $preco_max
                        and classificacao.codigo = $classificacao ";

        $seleciona_livro = mysql_query($sql_livro);

      }

      if (($autor <> 'null') and ($categoria <> 'null') and ($classificacao == 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            WHERE livro.codcategoria = categoria.codigo
                            and livro.codautor = autor.codigo
                            AND livro.valor >= $preco_min
                            AND livro.valor <= $preco_max
                            and autor.codigo = $autor
                            and categoria.codigo = $categoria";

        $seleciona_livro = mysql_query($sql_livro);
      }

      if (($autor <> 'null') and ($categoria == 'null') and ($classificacao <> 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            where livro.codautor = autor.codigo
                            and livro.codclassificacao = classificacao.codigo
                            AND livro.valor >= $preco_min
                            AND livro.valor <= $preco_max
                            and autor.codigo = $autor
                            and classificacao.codigo = $classificacao ";

        $seleciona_livro = mysql_query($sql_livro);
      }

      if (($autor == 'null') and ($categoria <> 'null') and ($classificacao <> 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            WHERE livro.codcategoria = categoria.codigo
                            and livro.codclassificacao = classificacao.codigo
                            AND livro.valor >= $preco_min
                            AND livro.valor <= $preco_max
                            and categoria.codigo = $categoria
                            and classificacao.codigo = $classificacao ";

        $seleciona_livro = mysql_query($sql_livro);
      }

      if (($autor <> 'null') and ($categoria <> 'null') and ($classificacao <> 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro, autor, categoria, classificacao
                            WHERE livro.codcategoria = categoria.codigo
                            and livro.codautor = autor.codigo
                            and livro.codclassificacao = classificacao.codigo
                            and autor.codigo = $autor
                            and categoria.codigo = $categoria
                            AND produto.preco >= $preco_min
                            AND produto.preco <= $preco_max
                            and classificacao.codigo = $classificacao ";

        $seleciona_livro = mysql_query($sql_livro);
      }

      if (($autor == 'null') and ($categoria == 'null') and ($classificacao == 'null')) {
        $sql_livro = "SELECT livro.titulo, livro.valor, livro.fotocapa
                            FROM livro
                            WHERE livro.valor BETWEEN $preco_min AND $preco_max";

        $seleciona_livro = mysql_query($sql_livro);
      }


      //--------mostrar os veiculos pesquisados
      if ($seleciona_livro != TRUE) {
        echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
      } else {
        echo "Resultado da pesquisa de Produtos: <br><br>";
        echo "<ul>";
        while ($resultado = mysql_fetch_array($seleciona_livro)) {
          echo "<tr><td>" . utf8_encode($resultado['titulo']) . "</td>
			          <td>" . ($resultado['valor']) . "</td></tr><br><br>";
          echo '<img src="./cad_livros/fotos/' . $resultado['fotocapa'] . '" height="100" width="100" />' . "<br><br> ";
        }
      }
    }
    ?>
</body>

</HTML>