<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "update classificacao set nome = '$nome'
    where codigo = '$codigo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='tabela_classificacao.php'";
	?>
</script>