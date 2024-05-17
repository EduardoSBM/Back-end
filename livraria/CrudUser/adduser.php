<?php
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];
    
    $conectar  = mysql_connect('localhost','root','');
    $db        = mysql_select_db('livraria');
    $sql       = "insert into usuario (codigo,nome,login,senha) values ('$codigo','$nome','$login','$senha')";
    $resultado = mysql_query($sql);

    if ($resultado === True){
        ?>
        <script>
            alert('Adicionado com Sucesso!');
            <?php
                echo "location.href='cad_usuarios.php'";
            ?>
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Não foi possivel adicionar!');
            <?php
                echo "location.href='cad_usuarios.php'";
            ?>
        </script>
        <?php
    }
?>

