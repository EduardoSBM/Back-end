<?php
$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('revenda');

if (isset($_POST['conectar']))
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = mysql_query("select * from usuario where login='$login' and senha='$senha'");

    $resultado = mysql_num_rows($sql);

    if ($resultado == 0)
    {
        echo "login ou senha invalidos";
    }

    else
    {
        session_start();
        $_SESSION['login'] = $login;
        header("Location:menu.html");
    }
}
?>

<html>
<head>
    <title> Login Usuarios </title>
</title>
</head>
<body>
    <h2> Login de usuario: </h2>
    <form name='formulario' method='post' action='login.php'>
        <label>Login: </label>
        <input type='text' name='login' id='login' size=20 required>
        <br><br>
        <label>Senha: </label>
        <input type='password' name='senha' id='senha' size=20 required>
        <br><br>
        <input type='submit' value='conectar' id='conectar' name='conectar'>
    </form>
</body>
</html>


