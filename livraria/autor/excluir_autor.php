<?php
    $codigo = $_GET['codigo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "delete from autor WHERE
    codigo = '$codigo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('excluido com Sucesso!');
	<?php
		echo "location.href='tabela_autor.php'";
	?>
</script>