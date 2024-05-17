<html>

<head>
    <title> Login Usuarios </title>
    <link rel="stylesheet" href="Login.css">
    </title>
</head>

<body>

    <div id="container">
    <br><br><br>
        <div class="print">
            <?php
            $connect = mysql_connect('localhost', 'root', '');
            $db = mysql_select_db('loja');

            if (isset($_POST['conectar'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];

                $sql = mysql_query("select * from usuario where login='$login' and senha='$senha'");

                $resultado = mysql_num_rows($sql);

                if ($resultado == 0) {
                    echo "login ou senha invalidos";
                } else {
                    session_start();
                    $_SESSION['login'] = $login;
                    header("Location:menu.html");
                }
            }
            ?>
        </div>
        <br><br><br><br><br><br>
        <form name='formulario' method='post' action='login.php'>
            <label>Login: </label>
            <input type='text' name='login' id='login' size=20 required>
            <br><br>
            <label>Senha: </label>
            <input type='password' name='senha' id='senha' size=20 required>
            <br><br>
            <input class='botao' type='submit' value='Conectar' id='conectar' name='conectar'>
        </form>
        <br><br>


    </div>
</body>

</html>