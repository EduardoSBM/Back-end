<?php
    $codigo = $_POST['codigo'];
    $titulo   = $_POST['titulo'];
    $codcategoria  = $_POST['codcategoria'];
    $codclassificacao  = $_POST['codclassificacao'];
    $ano = $_POST['ano'];
    $edicao   = $_POST['edicao'];
    $codautor  = $_POST['codautor'];
    $editora  = $_POST['editora'];
    $paginas   = $_POST['paginas'];
    $valor  = $_POST['valor'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "update livro set  titulo = '$titulo', codcategoria = '$codcategoria', codclassificacao = '$codclassificacao', ano = '$ano', edicao = '$edicao', codautor = '$codautor', editora = '$editora', paginas = '$paginas',  valor = '$valor'
    where codigo = '$codigo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='tabela_livro.php'";
	?>
</script>