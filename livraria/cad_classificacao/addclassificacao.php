<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "insert into classificacao (codigo,nome) values ('$codigo','$nome')";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Adicionado com Sucesso!');
            <?php
                echo "location.href='cad_classificacao.php'";
            ?>
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Não foi possivel adicionar!');
            <?php
                echo "location.href='cad_classificacao.php'";
            ?>
        </script>
        <?php
    }
?>

