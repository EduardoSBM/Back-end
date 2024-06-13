<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "update usuario set nome = '$nome', login = '$login', senha = '$senha'
    where codigo = '$codigo';";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
	<?php
		echo "location.href='tabela_usuario.php'";
	?>
</script>