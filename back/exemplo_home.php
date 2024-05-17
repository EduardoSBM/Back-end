<?php
//conectar com bando dados
$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('revenda');
?>

<HTML>
<HEAD>
 <TITLE> Pesquisa Veiculos</TITLE>
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <style type="text/css">
      .form-controle {
        display: block;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-image: url("https://1.bp.blogspot.com/-xttJ_d1UYPg/Xeo8wJVvHGI/AAAAAAAArsk/iv7BahTNiuwhrBaotND6KCsK6GVtpbdAACLcBGAsYHQ/s1600/Bell12B.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            margin-left: 35px;
       }
       label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
        margin-left: 35px;
        color: black;
        size: 30px;
        }
        .h1, h1 {
        font-size: 46px;
        color: black;
        margin-left: 35px;
        }
        .pique {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pique2{
            width: 120px;
            height: 95px;
        }
        .aaa{
            margin-left: 1000px;
            width: 120px;
            height: 95px;
        }

  </style>
</HEAD>
<body class="form-controle">
    <form name="formulario" method="post" action="exemplo_home.php">
        <div class="pique">
            <img class="pique2" src="https://www.robsonveiculossc.com.br/assets/images/logotipo.png" >
            <a href="login.php"> <img class="aaa"  src="https://st2.depositphotos.com/1853861/7027/v/450/depositphotos_70279629-stock-illustration-login-button-icon.jpg">
            </a>
        </div>
       <h1>REVENDA DE CARROS</h1><br>
       
       <h1>Pesquisa de automoveis por:</h1>
       <label for="">Marcas: </label>
        <select name="marca">
        <option value="" selected="selected">Selecione...</option>

        <?php
        $query = mysql_query("SELECT codigo, nome FROM marca");
        while($marcas = mysql_fetch_array($query))
        {?>
        <option value="<?php echo $marcas['codigo']?>">
                       <?php echo $marcas['nome']  ?></option>
        <?php }
        ?>
        </select>

        <label for="">Modelos: </label>
        <select name="modelo">
        <option value="" selected="selected">Selecione...</option>
        <?php
        $query = mysql_query("SELECT codigo, nome FROM modelo");
        while($modelo = mysql_fetch_array($query))
        {?>
        <option value="<?php echo $modelo['codigo']?>">
                       <?php echo $modelo['nome']  ?></option>
        <?php }
        ?>
        <!-- modelo ??? -->

        </select>
        <input  type="submit" name="pesquisar" value="Pesquisar">
    </form>
        <br><br>

<?php

if (isset($_POST['pesquisar']))
{

//------- pesquisa marcas
$sql_marcas  = "SELECT * FROM marca ";
$pega_marcas = mysql_query($sql_marcas);

//------- pesquisa modelos
$sql_modelos  = "SELECT * FROM modelo ";
$pega_modelos = mysql_query($sql_modelos);


//-------- verificar as op��es selecionadas ou n�o
$marca   = (empty($_POST['marca']))? 'null' : $_POST['marca'];
$modelo  = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];


if (($marca <> 'null') and ($modelo == 'null'))
{
     $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and marca.codigo = $marca ";
     $seleciona_veiculos = mysql_query($sql_veiculos);
}

if (($marca == 'null') and ($modelo <> 'null'))
{
     $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2
                            FROM veiculo,modelo
                            WHERE veiculo.codmodelo = modelo.codigo

                            and modelo.codigo = $modelo ";
     $seleciona_veiculos = mysql_query($sql_veiculos);
}

// -------- verificar o modelo ??????



//--------mostrar os veiculos pesquisados
if(mysql_num_rows($seleciona_veiculos) == 0)
{
   echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
}
else
{
   echo "Resultado da pesquisa de autom: <br><br>";
   echo "<ul>";
			while($resultado = mysql_fetch_array($seleciona_veiculos))
			{
			echo "<tr><td>".utf8_encode($resultado['descricao'])."</td>
			          <td>".utf8_encode($resultado['ano'])."</td>
			          <td>".utf8_encode($resultado['cor'])."</td>
			          <td>".utf8_encode($resultado['valor'])."</td></tr><br><br>";
            echo '<img src="fotos/'.$resultado['foto1'].'"height="200" width="300" />'." ";
            echo '<img src="fotos/'.$resultado['foto2'].'"height="200" width="300" />'."<br><br><br> ";
			}
}
}
?>
</body>

</HTML>
