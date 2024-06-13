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

    $fotocapa   = $_FILES['fotocapa'];

    $diretorio = "fotos/";

   //esta função é usada para converter caracteres em string
   $extensao1 = strtolower(substr($_FILES['fotocapa']['name'], -4));

   //faz md5 para não ter nomes repetidos nas fotos
   $novo_nome1 = md5(time()).$extensao1;

   //mover aquivo da foto para a pasta FOTOS no computador
    move_uploaded_file($_FILES['fotocapa'] ['tmp_name'], $diretorio.$novo_nome1);
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql = "insert into livro (codigo,titulo,codcategoria,codclassificacao,ano,edicao,codautor,editora,paginas,fotocapa,valor) values ('$codigo','$titulo','$codcategoria','$codclassificacao', '$ano','$edicao','$codautor','$editora','$paginas','$novo_nome1','$valor')";
    $resultado = mysql_query($sql);
?>

<script>
	alert('Adicionado com Sucesso!');
    <?php
		echo "location.href='tabela_livro.php'";
	?>
</script>