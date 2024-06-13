<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $endereco  = $_POST['endereco'];
    $cidade  = $_POST['cidade'];
    $estado  = $_POST['estado'];
    $pais  = $_POST['pais'];
    $nacionalidade  = $_POST['nacionalidade'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "update autor set nome = '$nome', endereco = '$endereco', cidade = '$cidade', estado = '$estado', pais = '$pais', nacionalidade = '$nacionalidade'
    where codigo = '$codigo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='tabela_autor.php'";
	?>
</script>