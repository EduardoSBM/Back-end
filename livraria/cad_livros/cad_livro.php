<?php
$conectar = mysql_connect('localhost','root','');
$db       = mysql_select_db('livraria');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Pesquisa livros </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>


    <script>
        
        /*
        Use o poder do jquery! 
        document.getElementById('codigo').value vira simplesmente $("#codigo").val() ;-)
        */

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
    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar um registro ...</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group well" action="addlivro.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="titulo" name="titulo" class="span3" value="" required placeholder="Titulo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codcategoria" name="codcategoria" class="span3" value="" required placeholder="Codcategoria" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codclassificacao" name="codclassificacao" class="span3" value="" required placeholder="Codclassificacao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="ano" name="ano" class="span3" value="" required placeholder="Ano" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="edicao" name="edicao" class="span3" value="" required placeholder="Edicao" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="codautor" name="codautor" class="span3" value="" required placeholder="Codautor" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="Editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="Paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="file" name="fotocapa" id="fotocapa">
                        <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="Valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <form class="form-group well" action="alterlivro.php" method="POST">
                        Cod   <input id="codigo" type="text" name="codigo" value="" required>
                        Titulo  <input id="titulo" type="text" name="titulo" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Codcategoria <input id="codcategoria" type="text" name="codcategoria" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;">
                        Codclassificacao <input id="codclassificacao" type="text" name="codclassificacao" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Ano <input id="ano" type="text" name="ano" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Edicao <input id="edicao" type="text" name="edicao" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Codautor <input id="codautor" type="text" name="codautor" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Editora <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="Editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Paginas <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="Paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Valor <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="Valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <form class="form-group well" action="deletelivro.php" method="GET">
                        Cod   <input id="codigo" type="text" name="codigo" value="" required>
                        Titulo  <input id="titulo" type="text" name="titulo" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Codcategoria <input id="codcategoria" type="text" name="codcategoria" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;">
                        Codclassificacao <input id="codclassificacao" type="text" name="codclassificacao" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Ano <input id="ano" type="text" name="ano" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Edicao <input id="edicao" type="text" name="edicao" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Codautor <input id="codautor" type="text" name="codautor" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Editora <input type="text" id="editora" name="editora" class="span3" value="" required placeholder="Editora" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Paginas <input type="text" id="paginas" name="paginas" class="span3" value="" required placeholder="Paginas" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Capa <input type="text" id="fotocapa" name="fotocapa" class="span3" value="" required placeholder="Fotocapa" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Valor <input type="text" id="valor" name="valor" class="span3" value="" required placeholder="Valor" style=" margin-bottom: -2px; height: 25px;"><br><br>
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

            <h2>Lista de livros: </h2><br>
            <form action="cad_livro.php" method="POST">
                <input type="text" name="titulo" id="titulo" placeholder="titulo ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>Codigo</b></td>
                    <td><b>Titulo</b></td>
                    <td><b>Codcategoria</b></td>
                    <td><b>Codclassificacao</b></td>
                    <td><b>Ano</b></td>
                    <td><b>Edicao</b></td>
                    <td><b>Codautor</b></td>
                    <td><b>Editora</b></td>
                    <td><b>Paginas</b></td>
                    <td><b>Capa</b></td>
                    <td><b>Valor</b></td>
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
						$strdados = $dados['codigo']."*".$dados['titulo']."*".$dados['codcategoria']."*".$dados['codclassificacao']."*".$dados['ano']."*".$dados['edicao']."*".$dados['codautor'];
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
                        <td><?php echo '<img src="fotos/'.$dados['fotocapa'].'"height="100" width="75" />'." "; ?></td>
                        <td><?php echo $dados['valor']; ?></td>
                        <td>
							<?php 
								echo "<a href='deletelivro.php?codigo=".$dados['codigo']."'><button class='btn btn-danger' type='button' name='excluir'>Excluir</button></a>";
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
