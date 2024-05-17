<?php
$conectar = mysql_connect('localhost','root','');
$db       = mysql_select_db('livraria');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html">
    <title>Pesquisa Autores </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body >


    <script>
        
        /*
        Use o poder do jquery! 
        document.getElementById('codigo').value vira simplesmente $("#codigo").val() ;-)
        */

        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('codigo').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('endereco').value = retorno[2];
            document.getElementById('cidade').value = retorno[3];
            document.getElementById('estado').value = retorno[4];
            document.getElementById('pais').value = retorno[5];
            document.getElementById('nacionalidade').value = retorno[6];
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
                    <form class="form-group well" action="addautor.php" method="POST">
                        <input type="text" id="codigo" name="codigo" class="span3" value="" required placeholder="Codigo" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="nome" name="nome" class="span3" value="" required placeholder="Nome" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="endereco" name="endereco" class="span3" value="" required placeholder="Endereco" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="cidade" name="cidade" class="span3" value="" required placeholder="Cidade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="estado" name="estado" class="span3" value="" required placeholder="Estado" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="pais" name="pais" class="span3" value="" required placeholder="Pais" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" id="nacionalidade" name="nacionalidade" class="span3" value="" required placeholder="Nacionalidade" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <form class="form-group well" action="alterautor.php" method="POST">
                        Cod   <input id="codigo" type="text" name="codigo" value="" required>
                        Nome  <input id="nome" type="text" name="nome" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Endereco <input id="endereco" type="text" name="endereco" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;">
                        Cidade <input id="cidade" type="text" name="cidade" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Estado <input id="estado" type="text" name="estado" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Pais <input id="pais" type="text" name="pais" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Nacionalidade <input id="nacionalidade" type="text" name="nacionalidade" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
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
                    <form class="form-group well" action="deleteautor.php" method="GET">
                    Cod   <input id="codigo" type="text" name="codigo" value="" required>
                        Nome  <input id="nome" type="text" name="nome" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Endereco <input id="endereco" type="text" name="endereco" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;">
                        Cidade <input id="cidade" type="text" name="cidade" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Estado <input id="estado" type="text" name="estado" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Pais <input id="cidade" type="text" name="cidade" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Nacionalidade <input id="nacionalidade" type="text" name="nacionalidade" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
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

            <h2>Lista de Autores: </h2><br>
            <form action="cad_autor.php" method="POST">
                <input type="text" name="nome" id="nome" placeholder="Nome ..." class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                 <button type="button" name="cadastrar" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="gray" class="table table-stripped">
                <tr>
                    <td><b>Codigo</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Endereco</b></td>
                    <td><b>Cidade</b></td>
                    <td><b>Estado</b></td>
                    <td><b>Pais</b></td>
                    <td><b>Nacionalidade</b></td>
                    <td><b>Operacao</b></td>
                </tr>
                <?php
                if ((isset($_POST['pesquisar'])) or isset($_POST['cadastrar']))
                {
                
              	    $consulta = "select * from autor";
              	    
                   	if ($_POST['nome'] != '')
                   	{
						$consulta = $consulta." where nome like '%".$_POST['nome']."%'";
                    }
					
					$resultado = mysql_query($consulta);

					while ($dados = mysql_fetch_array($resultado))
                    {
						$strdados = $dados['codigo']."*".$dados['nome']."*".$dados['endereco']."*".$dados['cidade']."*".$dados['estado']."*".$dados['pais']."*".$dados['nacionalidade'];
				    ?>
                    <tr>
                        <td><?php echo $dados['codigo']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td><?php echo $dados['estado']; ?></td>
                        <td><?php echo $dados['pais']; ?></td>
                        <td><?php echo $dados['nacionalidade']; ?></td>
                        <td>
							<?php 
								echo "<a href='deleteautor.php?codigo=".$dados['codigo']."'><button class='btn btn-danger' type='button' name='excluir'>Excluir</button></a>";
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
