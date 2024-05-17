<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "update classificacao set nome = '$nome' where codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Alterado com Sucesso!');
            <?php
                echo "location.href='cad_classificacao.php'";
            ?>
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Não foi possivel alterar!');
            <?php
                echo "location.href='cad_classificacao.php'";
            ?>
        </script>
        <?php
    }
?>

