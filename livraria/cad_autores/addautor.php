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
    $sql       = "insert into autor (codigo,nome,endereco,cidade,estado,pais,nacionalidade) values ('$codigo','$nome','$endereco','$cidade','$estado','$pais','$nacionalidade')";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Adicionado com Sucesso!');
            <?php
                echo "location.href='cad_autor.php'";
            ?>
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Não foi possivel adicionar!');
            <?php
                echo "location.href='cad_autor.php'";
            ?>
        </script>
        <?php
    }
?>

