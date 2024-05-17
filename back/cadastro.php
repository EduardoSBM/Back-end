<?php

//iniciar sessão php
session_start();

// coomando para iniciar o mysql
$conectar = mysql_connect('localhost','root','');

//selecionar o BD revenda
$banco = mysql_select_db('revenda');

//comandos para verificar as opçoes
// GRAVAR EXCLUIR ALTERAR PESQUISAR

if (isset($_POST['gravar']))// erro aqui!
{
    // capturar as variaveis do html
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "insert into marca (codigo, nome) values ('$codigo','$nome')";

    // executar o comando BD
    $resultado = mysql_query($sql);

    //verificar resultado
    if ($resultado === TRUE)
    {

        echo "Dados gravados com sucesso.";
    }
    else
    {
        echo "erro ao gravar os dados";
    }
}

if (isset($_POST['excluir']))// erro aqui!
{
    // capturar as variaveis do html
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "delete from marca WHERE codigo = $codigo";

    // executar o comando BD
    $resultado = mysql_query($sql);

    //verificar resultado
    if ($resultado === TRUE)
    {

        echo "Dados deletados com sucesso.";
    }
    else
    {
        echo "Erro ao deletar os dados";
    }
}

if (isset($_POST['alterar']))// erro aqui!
{
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "update marca set nome = '$nome'
     where codigo = '$codigo'";

    // executar o comando BD
    $resultado = mysql_query($sql);

    //verificar resultado
    if ($resultado === TRUE)
    {

        echo "Dados gravados com sucesso.";
    }
    else
    {
        echo "Erro ao gravar os dados";
    }
}

if (isset($_POST['pesquisar']))
{
//Seleciona todas as informacoes da tabela
$sql = mysql_query("SELECT * FROM veiculo");

echo "<b>Marcas Cadastradas: </b><br><br>";

//mostrar as informacoes selecionadadas da tabela (vetor)
while ($dados = mysql_fetch_object($sql))
    {

        echo "Codigo: ".$dados->codigo."<br>";
        echo "Descricao  : ".$dados->descricao."<br>";
        echo "codmodelo  : ".$dados->codmodelo."<br>";
        echo "ano  : ".$dados->ano."<br>";
        echo "cor  : ".$dados->cor."<br>";
        echo "placa  : ".$dados->placa."<br>";
        echo "opcionais  : ".$dados->opcionais."<br>";
        echo "Valor  : ".$dados->valor."<br>";
        echo '<img src="fotos/'.$dados->foto1.'"height="100" width="150"/>'." ";
        echo '<img src="fotos/'.$dados->foto2.'"height="100" width="150"/>'." ";
    }
}