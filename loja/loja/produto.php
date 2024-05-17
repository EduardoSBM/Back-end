<?php

session_start();

$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('loja');

$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$codcategoria = $_POST['codcategoria'];
$codclassificacao = $_POST['codclassificacao'];
$codmarca = $_POST['codmarca'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];
$preco = $_POST['preco'];

$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];


if(isset($_POST['gravar']))
{

    $diretorio = "fotos/";

    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time()).$extensao1;
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time()).$extensao2;
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

    $extensao3 = strtolower(substr($_FILES['foto3']['name'], -2));
    $novo_nome3 = md5(time()).$extensao3;
    move_uploaded_file($_FILES['foto3']['tmp_name'], $diretorio.$novo_nome3);


    $sql = "insert into produto (codigo, descricao, codcategoria, codclassificacao, codmarca, cor, tamanho, preco, foto1, foto2, foto3) values ('$codigo', '$descricao', '$codcategoria', '$codclassificacao', '$codmarca', '$cor', '$tamanho', '$preco', '$novo_nome1', '$novo_nome2', '$novo_nome3')";
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
    $sql = "delete from marca where codigo = ('$codigo')";

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
    $sql = "update produto set descricao = '$descricao', codcategoria = '$codcategoria', codclassificacao = '$codclassificacao', codmarca = '$codmarca', cor = '$cor', tamanho = '$tamanho', preco = '$preco' where codigo = '$codigo'";

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
    $sql = mysql_query("select codigo, descricao, cor, tamanho, preco, foto1, foto2, foto3 from produto");

    echo "<b>produtos cadastrados:</b><br><br>";

    while ($dados = mysql_fetch_object($sql))
    {
        echo "Codigo: ".$dados->codigo."; ";
        echo "Descricao: ".$dados->descricao."; ";
        echo "Cor: ".$dados->cor."; ";
        echo "Tamanho: ".$dados->tamanho."; ";
        echo "Preco: ".$dados->preco."; <br><br>";
        echo '<img src="produtos/'.$dados->foto1.'"height="200" width="200" />'." ";
        echo '<img src="produtos/'.$dados->foto2.'"height="200" width="200" />'." ";
        echo '<img src="produtos/'.$dados->foto3.'"height="200" width="200" />'."<br><br><br>";
    }
}

?>