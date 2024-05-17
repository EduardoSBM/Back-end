<?php
    $codigo = $_POST['codigo'];
    $titulo   = $_POST['titulo'];
    $codcategoria  = $_POST['codcategoria'];
    $codclassificacao  = $_POST['codclassificacao'];
    $ano  = $_POST['ano'];
    $edicao  = $_POST['edicao'];
    $codautor  = $_POST['codautor'];
    $editora  = $_POST['editora'];
    $paginas  = $_POST['paginas'];
    $fotocapa  = $_FILES['fotocapa'];
    $valor  = $_POST['valor'];

    $diretorio = "fotos/";
    $extensao = strtolower(substr($_FILES['fotocapa']['name'], -4));
    $novo_nome = md5(time()).$extensao;
    move_uploaded_file($_FILES['fotocapa']['tmp_name'], $diretorio.$novo_nome);
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "insert into livro (codigo,titulo,codcategoria,codclassificacao,ano,edicao,codautor,editora,paginas,fotocapa,valor) values ('$codigo','$titulo','$codcategoria','$codclassificacao','$ano','$edicao','$codautor','$editora','$paginas','$novo_nome','$valor')";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Adicionado com Sucesso!');
            <?php
                echo "location.href='cad_livro.php'";
            ?>
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Não foi possivel adicionar!');
            <?php
                echo "location.href='cad_livro.php'";
            ?>
        </script>
        <?php
    }
?>

