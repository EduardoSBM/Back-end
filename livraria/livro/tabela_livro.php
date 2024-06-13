<?php
$conectar = mysql_connect('localhost','root','');
$db       = mysql_select_db('livraria');
?>
<html>
<head> 
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa livro </title>
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .modal-header,
        .modal-footer {
            background-color: #333;
            color: #F4DBB3;
        }

        .modal-header h1,
        .modal-footer button {
            color: #F4DBB3;
        }

        .form-group input[type="text"] {
            margin-bottom: 10px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #333;
            width: 100%;
            padding: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            background-color: #FFF;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #524136;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #F4DBB3;
        }

        .table-btn {
            display: flex;
            justify-content: center;
        }

        .table-btn button {
            margin: 5px;
        }
    </style>

</head>
<body>
    <script>

        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('codigo').value = retorno[0];
            document.getElementById('titulo').value = retorno[1];
            document.getElementById('codcategoria').value = retorno[2];
            document.getElementById('codclassificacao').value = retorno[3];
            document.getElementById('ano').value = retorno[4];
            document.getElementById('edicao').value = retorno[5];
            document.getElementById('codautor').value = retorno[6];
            document.getElementById('editora').value = retorno[7];
            document.getElementById('paginas').value = retorno[8];
            document.getElementById('fotocapa').value = retorno[9];
            document.getElementById('valor').value = retorno[10];
        }
    </script>
    <!--Modal Cadastrar-->
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="adicionar_livro.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="codclassificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="ano" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="codautor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="file" id="fotocapa" name="fotocapa" class="span3" value="" required placeholder="fotocapa" style=" margin-bottom: -2px; height: 25px;"><br>
                        <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="cadastrar" style="height: 35px">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div> 


    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header"> 
                    <h1>Alterar de Registro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="alterar_livro.php" method="POST">
                        codigo <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        titulo <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo categoria<input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo classificacao<input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="codclassificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        ano <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        edicao <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo autor<input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="codautor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        editora <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        paginas <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        foto capa<input type="file" id="fotocapa" name="fotocapa" class="span3" value="" required placeholder="fotocapa" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        valor <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="cadastrar" style="height: 35px">Cadastrar</button>
                        <button type="submit" class="btn btn-success btn-large" name="alterar" style="height: 35px">Alterar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
     <!--Modal Excluir-->
    <div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Excluir um Registro...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="excluir_livro.php" method="GET">
                        codigo <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        titulo <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo categoria<input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo classificacao<input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="codclassificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        ano <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        edicao <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codigo autor<input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="codautor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        editora <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        paginas <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        foto capa<input type="file" id="fotocapa" name="fotocapa" class="span3" value="" required placeholder="fotocapa" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        valor <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="excluir" style="height: 35px">Excluir</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <h2>Lista de livro: </h2><br>
            <form action="tabela_livro.php" method="POST">
                <input type="text" name="titulo" id="titulo" placeholder="titulo ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>Codigo</b></td>
                    <td><b>titulo</b></td>
                    <td><b>codigo categoria</b></td>
                    <td><b>codigo classificacao</b></td>
                    <td><b>ano</b></td>
                    <td><b>edicao</b></td>
                    <td><b>codigo autor</b></td>
                    <td><b>editora</b></td>
                    <td><b>paginas</b></td>
                    <td><b>foto capa</b></td>
                    <td><b>valor</b></td>
                    <td><b>Operacao</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar']))
                {
                
              	    $consulta = "select * from livro";
              	    
                   	if ($_POST['titulo'] != '')
                   	{
						$consulta = $consulta." where titulo like '%".$_POST['titulo']."%'";
                    }
					
					$resultado = mysql_query($consulta);

					while ($dados = mysql_fetch_array($resultado))
                    {
						$strdados = $dados['codigo']."*".$dados['titulo']."*".$dados['codcategoria']."*".$dados['codclassificacao'];
				    ?>
                    <tr>
                        <td><?php echo $dados['codigo']; ?></td>
                        <td><?php echo $dados['titulo']; ?></td>
                        <td><?php echo $dados['codcategoria']; ?></td>
                        <td><?php echo $dados['codclassificacao']; ?></td>
                        <td><?php echo $dados['ano']; ?></td>
                        <td><?php echo $dados['edicao']; ?></td>
                        <td><?php echo $dados['codautor']; ?></td>
                        <td><?php echo $dados['editora']; ?></td>
                        <td><?php echo $dados['paginas']; ?></td>
                        <td><?php echo '<img src="fotos/'.$dados['fotocapa'].'"height="100" width="100"/>'." ";?></td>
                        <td><?php echo $dados['valor']; ?></td>
                        <td>
							<?php
								echo "<a href='excluir_livro.php?codigo=".$dados['codigo']."'><button class='btn btn-danger' type='button' name='excluir'>Excluir</button></a>";
							?>
                            <a href="#myModalAlterar" 
                                onclick="obterDadosModal('<?php echo $strdados ?>')">
                                <button type='button' id='alterar' name='alterar' class='btn btn-primary' data-toggle='modal' data-target='#myModalAlterar'>Alterar</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
					mysql_close($conectar);
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Biblioteca requerida -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
