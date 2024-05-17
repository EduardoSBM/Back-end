<?php

session_start();

$conectar = mysql_connect('localhost', 'root', '');

$banco = mysql_select_db('revenda');

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];


if(isset($_POST['gravar']))
{
    $sql = "insert into usuario (codigo, nome, login, senha) values ('$codigo', '$nome', '$login', '$senha')";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE)
    {
        echo "Dados gravados com sucesso";
    }
    else
    {
        echo "Erro ao gravar os dados";
    }
}

if (isset($_POST['excluir']))
{
    $sql = "delete from usuario where codigo = ('$codigo')";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE)
    {
        echo "Dados excluidos com sucesso";
    }
    else
    {
        echo "Erro ao excluir os dados";
    }
}

if (isset($_POST['alterar']))
{
    $sql = "update usuario set login = '$login', senha = '$senha' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE)
    {
        echo "Dados editados com sucesso";
    }
    else
    {
        echo "Erro ao editar os dados";
    }
}

if (isset($_POST['pesquisar']))
{
    $sql = mysql_query("select codigo, nome, login from usuario");

    echo "<b>usuarios cadastrados:</b><br><br>";

    while ($dados = mysql_fetch_object($sql))
    {
        echo "Codigo: ".$dados->codigo."; ";
        echo "Nome:   ".$dados->nome."; ";
        echo "Login: ".$dados->login.";<br><br>";
    }
}

?>