<?php
    $codigo = $_GET['codigo'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "delete from classificacao where codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Excluido com Sucesso!');
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

